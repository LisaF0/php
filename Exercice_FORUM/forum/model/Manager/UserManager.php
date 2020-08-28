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

            $sql = "SELECT pseudo, mail
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


    public function login($user){
        $sql = "SELECT pseudo, mail, password
                FROM user
                WHERE mail = :user
                OR user = :mail
                ";
        self::create($sql, ['user' => $user])
    }
}