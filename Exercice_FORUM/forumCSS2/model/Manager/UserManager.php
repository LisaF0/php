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

    public function getUser($mail){
        $sql = 'SELECT mail, pseudo, id, role
                FROM user
                WHERE mail = :mail';

        return self::getOneOrNullResult(
            self::select($sql, 
                ["mail" => $mail], 
                false
            ), 
            self::$classname
        );
    }


    public function login($mail){
        $sql = 'SELECT mail, password, pseudo, id
                FROM user
                WHERE mail = :mail';

        return self::getOneOrNullResult(
            self::select($sql, 
                ["mail" => $mail], 
                false
            ), 
            self::$classname
        );
    }

    public function editMail($id, $mail){
        $sql = "UPDATE user
                SET mail = :mail
                WHERE id = :id";
        
        self::update($sql,
                ["mail" => $mail,
                "id" => $id]
                );
        return $this->getUser($id);
    }

    public function editPassword($id, $password){
        $sql = "UPDATE user
                SET password = :password
                WHERE id = :id";
        return self::update($sql,
                [":password" => password_hash($password, PASSWORD_ARGON2I),
                "id" => $id]
                );
    }

    public function getPass($id){
        $sql = 'SELECT mail, password, pseudo, id
                FROM user
                WHERE id = :id';
        
        return self::getOneOrNullResult(
            self::select($sql, 
                ["id" => $id], 
                false
            ), 
            self::$classname
        );
    }


}