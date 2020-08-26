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

        public function addTopic($array){
            
            $title = filter_var($array["nom_acteur"], FILTER_SANITIZE_STRING);



            $sql = "INSERT INTO topic(title, user_id) 
                    VALUES(:title, :user_id)
                    ";
                    
            
            return self::create($sql, ["title" => $title,
                                        "user_id" => 4]
            );
        }

    }