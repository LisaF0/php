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

            $sql = "SELECT *
                    FROM user";

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

        public function addUser($pseudo, $mail, $password){
        
            $sql = "INSERT INTO user (pseudo, password, mail)
                    VALUES (:pseudo, :password, :mail)";
            return self::create($sql, [
                        ":pseudo" => strtolower($pseudo), 
                        ":password" => password_hash($password, PASSWORD_ARGON2I), 
                        ":mail" => $mail
                        ]);
                        
                        // $_SESSION['success'] = "Inscription réussie, connectez-vous !";
                        //     header("Location:connect.php");
                        //     die();
                        // }
                        // catch(Exception $e){
                        // echo $e->getMessage();
                        // }
        }
    //             else $_SESSION['error'] = "Les mots de passe ne correspondent pas !";
    //         }
    //         else $_SESSION['error'] = "Vous devez remplir TOUS les champs obligatoires !";
    //     }
    //     else $_SESSION['error'] = "Vous n'avez pas soumis le formulaire, petit malin !";

    // }


    public function login($mail, $password){
        $sql = "SELECT mail, password
                FROM user
                ";
        return self::select($sql,[
                'mail' => $mail,
                'password' => $password
                ], 
                false
                );
    }
}