<?php
    namespace Model\Manager;
    
    use App\AbstractManager;
    
    class PostManager extends AbstractManager
    {
        private static $classname = "Model\Entity\Post";

        public function __construct(){
            self::connect(self::$classname);
        }

        public function findAll(){

            $sql = "SELECT p.id, text, p.creationdate, p.user_id, p.user_id
                    FROM post p
                    ORDER BY creationdate DESC";

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
                    FROM post 
                    WHERE id = :id";
            return self::getOneOrNullResult(
                self::select($sql, 
                    ["id" => $id], 
                    false
                ), 
                self::$classname
            );
        }

        public function findByTopic($id){
            $sql = "SELECT title, text, pseudo, p.creationdate, t.creationdate
                    FROM topic t, post p, user u
                    WHERE t.id = p.id
                    AND t.id = :id
                    AND u.id = p.id";
            return self::getResults(
                self::select($sql,
                    ["id" => $id],
                    false
                ),
                self::$classname
            );
        }

    }