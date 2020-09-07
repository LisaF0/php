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
        }


    public function login($mail){
        $sql = 'SELECT mail, password, pseudo, id
                FROM user
                WHERE mail = :mail';

        $infoUser = self::select($sql,[
                'mail' => $mail,
                ], 
                false
                );
        return $infoUser;
        
    }
}