<?php
    namespace Controller;
    
    use App\Session;
    use App\Router;
    use Model\Manager\TopicManager;
    use Model\Manager\PostManager;
    use Model\Manager\UserManager;

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
            $user = Session::getUser()->getId();
            var_dump($_SESSION);


            $newTopic = new TopicManager();
            $topic = $newTopic->addTopic($title, $user);

            $newPost = new PostManager();
            $currentTopic = $newTopic->findOneByTitle($title);
            $post = $newPost->addPost($msg, $currentTopic->getId(), $user);            


            Router::redirectTo("Forum", "allTopics");

        }

        public function deleteTopic(){

            
            $id = (isset($_GET['id'])) ? $_GET['id'] : null;
            var_dump($id);
            
            $manTopic = new TopicManager();
            $manTopic->deleteTopic($id);
            
            Router::redirectTo("Forum", "allTopics");
        }


        public function addPost(){

            $msg = filter_input(INPUT_POST, "msg", FILTER_SANITIZE_STRING);
            $id = (isset($_GET['id'])) ? $_GET['id'] : null;
            $user = Session::getUser()->getId();


            $newPost = new PostManager();
            $newPost->addPost($msg, $id, $user);

            Router::redirectTo("Forum", "show", $id);
        }

        // public function deleteTopic($id){
        //     $id = (isset($_GET['id'])) ? $_GET['id'] : null;

        //     $currentTopic = new TopicManager();
        //     $currentTopic->deleteTopic($id);

        //     Router::redirectTo("Forum", "allTopics");


        // }



        // 1 fonction newPost de base qui sera appelé par add topic  et addpost

        public function deletePost(){
            $id = (isset($_GET['id'])) ? $_GET['id'] : null;
            var_dump($id);
            
            $manPost = new PostManager();
            $currentPost = $manPost->findOneById($id);
            
            $idtopic = $currentPost->getTopic()->getId();
            
            $post = $manPost->deletePost($id);
            

            Router::redirectTo("Forum", "show", $idtopic);
        }

        public function formEditPost(){
            $id = (isset($_GET['id'])) ? $_GET['id'] : null;
            $manPost = new PostManager();
            $post = $manPost->findOneById($id);
            return [
                "view" => "forum/editPost.php",
                "data" => [
                    "post" => $post
                ],
                "titrePage" => "FORUM | Edit Post"
            ];  
        }

        public function editPost(){
            $msg = filter_input(INPUT_POST, "msg", FILTER_SANITIZE_STRING); 
            
            $id = (isset($_GET['id'])) ? $_GET['id'] : null;
            var_dump($id);
            $manPost = new PostManager();
            $currentPost = $manPost->findOneById($id);
            $idtopic = $currentPost->getTopic()->getId();
            $manPost->editPost($id, $msg);
            

            Router::redirectTo("Forum", "show", $idtopic);
        }

        public function showProfil(){
            
            if(Session::getUser() !== null){
                $id = Session::getUser()->getId();
                
                $manPost = new PostManager();
                $posts = $manPost->findAllPostsByIdUser($id);
                
                return [
                    "view" => "forum/profil.php",
                    "data" => [
                        "posts" => $posts
                    ],
                    "titrePage" => "FORUM | Profil"
                ];   
            } else {

                Session::addMess('error', 'Veuillez vous connecter pour accéder à votre profil !');
                return [
                    "view" => "security/login.php",
                    "titrePage" => "FORUM | Se connecter"
                ];
            }

        }

        public function resolved(){
            $id = (isset($_GET['id'])) ? $_GET['id'] : null;
            
            $manTopic = new TopicManager();
            $topic = $manTopic->findOneById($id);
            $closeState = ($topic->getClosed() == 1) ? 0 : 1;
            $manTopic->resolved($id, $closeState);

            Router::redirectTo("Forum", "show", $id);
        }
    }