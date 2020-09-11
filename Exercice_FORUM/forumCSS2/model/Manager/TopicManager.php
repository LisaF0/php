<?php
    namespace Model\Manager;
    
    use App\AbstractManager;
    
    class TopicManager extends AbstractManager
    {
        private static $classname = "Model\Entity\Topic";

        public function __construct(){
            self::connect(self::$classname);
        }

        public function findAll(){

            $sql = "SELECT t.id, title, t.creationdate, closed, resolved, t.user_id, COUNT(msg) AS NBmsg
            FROM topic t, post p
            WHERE t.id = p.topic_id
            GROUP BY t.id
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
                    FROM topic 
                    WHERE id = :id";
            return self::getOneOrNullResult(
                self::select($sql, 
                    ["id" => $id], 
                    false
                ), 
                self::$classname
            );
        }

        public function findOneByTitle($title){
            $sql = "SELECT * 
                    FROM topic 
                    WHERE title = :title";
            return self::getOneOrNullResult(
                self::select($sql, 
                    ["title" => $title], 
                    false
                ), 
                self::$classname
            );
        }

        public function addTopic($title, $user){
            $sql = "INSERT INTO topic(title, user_id) 
                    VALUES(:title, :user_id)
                    ";
            
                self::create($sql, [
                    "title" => $title,
                    "user_id" => $user
            ]);

            // $lastID = self::lastInsertId();

            // $sql2 = "INSERT INTO post(msg, user_id, topic_id)
            //         VALUES(:msgn :user_id, :topic_id)
            //         ";

            //     self::create($sql2,[
            //         "msg" => $msg,
            //         "user_id" => 4,
            //         "topic_id" => $lastID

            //     ]);
        }

        public function deleteTopic($id){

            $sql1 = "DELETE FROM post WHERE topic_id = :id";
                    self::delete($sql1,[":id" => $id]);

            $sql2 = "DELETE FROM topic WHERE id = :id";
                    self::delete($sql2,[":id" => $id]);
        }

        public function resolved($id, $resolved){
            $sql = "UPDATE topic
                    SET resolved = :resolved
                    WHERE id = :id
                    ";
            return self::update($sql, [
                "id" => $id,
                "resolved" => $resolved
            ]);

        }

        public function closed($id, $closed){
            $sql = "UPDATE topic
                    SET closed = :closed
                    WHERE id = :id
                    ";
            return self::update($sql, [
                "id" => $id,
                "closed" => $closed
            ]);

        }
    }