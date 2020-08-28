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
            $sql = "SELECT *
                    FROM post
                    WHERE topic_id = :id";
            return self::getResults(
                self::select($sql,
                    ["id" => $id],
                    true
                ),
                self::$classname
            );
        }

        public function addPost($msg, $id){

            $sql = "INSERT INTO post(msg, user_id, topic_id) 
                    VALUES(:msg, :user_id, :topic_id)
                    ";
            return self::create($sql, [
                "msg" => $msg,
                "user_id" => 4,
                "topic_id" => $id
            ]);
        }


        public function deletePost($id){
            $sql = "DELETE FROM post WHERE id = :id";
            return self::delete($sql,[":id" => $id]);
        }
    }
