<?php
    namespace Controller;
    
    use App\Session;
    use App\Router;
    use Model\Manager\TopicManager;
    use Model\Manager\PostManager;

    class ForumController {

        public function index(){
            Router::redirectTo("home","index");
        }

        /**
         * Afficher tous les topics
         */
        public function allTopics(){

            $manTopic = new TopicManager();
            $topics = $manTopic->findAll();
          
            return [
                "view" => "forum/listTopics.php", 
                "data" => [
                    "topics" => $topics
                ],
                "titrePage" => "FORUM | Sujets"
            ];
        }

        /**
         * Afficher les posts d'un topic
         */
        public function show($id){

            $id = (isset($_GET['id'])) ? $_GET['id'] : null;
            $manTopic = new TopicManager();
            $manPost = new PostManager();

            $topic = $manTopic->findOneById($id);
            $posts = $manPost->findByTopic($id);
            
            return [
                "view" => "forum/posts.php",
                "data" => [
                    "topic" => $topic,
                    "posts" => $posts,
                ],
                "titrePage" => "FORUM | ".$topic
            ];
        }

        /**
         * Afficher le form d'add topic
         */
        public function formAddTopic(){

            return [
                "view" => "forum/newPost.php",
                "titrePage" => "FORUM | Nouveau sujet"
            ];
        }

        public function addTopic(){

            $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
            $msg = filter_input(INPUT_POST, "msg", FILTER_SANITIZE_STRING);

            $newTopic = new TopicManager();
            $topic = $newTopic->addTopic($title);

            // if(!$newTopic->findOneByTitle($_POST['title'])){
            //     $topic = $newTopic->addTopic($_POST['title']);
            // }

            $newPost = new PostManager();
            $currentTopic = $newTopic->findOneByTitle($title);
            $post = $newPost->addPost($msg, $currentTopic->getId());            


            Router::redirectTo("Forum", "allTopics");

            return [
                "data" => [
                    "topic" => $topic,
                    "posts" => $post,
                ]
            ];
        }

        public function addPost(){

            $msg = filter_input(INPUT_POST, "msg", FILTER_SANITIZE_STRING);
            $id = (isset($_GET['id'])) ? $_GET['id'] : null;

            $newPost = new PostManager();
            $post = $newPost->addPost($msg, $id);

            Router::redirectTo("Forum", "show", $id);
        }

        // public function deleteTopic($id){
        //     $id = (isset($_GET['id'])) ? $_GET['id'] : null;

        //     $currentTopic = new TopicManager();
        //     $currentTopic->deleteTopic($id);

        //     Router::redirectTo("Forum", "allTopics");


        // }

        public function deletePost(){

            
            $id = (isset($_GET['id'])) ? $_GET['id'] : null;
            var_dump($id);
            
            $manPost = new PostManager();
            $currentPost = $manPost->findOneById($id);
            $idtopic = $currentPost->getTopic()->getId();
            var_dump($idtopic);

            $post = $manPost->deletePost($id);
            var_dump($idtopic);

            Router::redirectTo("Forum", "show", $idtopic);
        }
    }