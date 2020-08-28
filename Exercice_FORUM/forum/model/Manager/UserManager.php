<?php
    namespace Model\Manager;
    
    use App\AbstractManager;
    
    class UserManager extends AbstractManager
    {
        private static $classname = "Model\Entity\User";

        public function __construct(){
            self::connect(self::$classname);
        }

        public function findAll(){

            $sql = "";

            return self::getResults(
                self::select($sql,
                    null, 
                    true
                ), 
                self::$classname
            );
        }

        public function findOneById($id){
            $sql = "SELECT * 
                        FROM user 
                        WHERE id = :id";
            return self::getOneOrNullResult(
                self::select($sql, 
                    ["id" => $id], 
                    false
                ), 
                self::$classname
            );
        }

        public function addUser($pseudo, $password, $mail){
            if(!empty($_POST)){
                $pseudo = filter_input(INPUT_POST, 'peusdo', FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => "/^[a-zA-Z0-9]{4,32}/"]]);
                $mail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
                $password_r = filter_input(INPUT_POST, 'password_r', FILTER_SANITIZE_STRING);
            

                if($peudo && $mail && $password){
                    if($password === $password_r){
                        
                        try{
                            $sql = "INSERT INTO user (pseudo, password, mail)
                                    VALUES (:pseudo, :password, :mail)";
                                    self::create($sql, [
                                        ":pseudo" => strtolower($pseudo), 
                                        ":password" => password_hash($password, PASSWORD_ARGON2I), 
                                        ":mail" => $mail
                                        ]);
                        
                        $_SESSION['success'] = "Inscription réussie, connectez-vous !";
                            header("Location:connect.php");
                            die();
                        }
                        catch(Exception $e){
                        echo $e->getMessage();
                        }
                }
                else $_SESSION['error'] = "Les mots de passe ne correspondent pas !";
            }
            else $_SESSION['error'] = "Vous devez remplir TOUS les champs obligatoires !";
        }
        else $_SESSION['error'] = "Vous n'avez pas soumis le formulaire, petit malin !";

    header("Location:inscription.php");
    die();

    }




    }