<?php
    namespace Controller;

    use App\Session;
    use App\Router;
    use Model\Manager\UserManager;

    class SecurityController{

        private $folder = "security".DS;

        public function register(){

            if(!empty($_POST)){
                $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_VALIDATE_REGEXP, 
                        ["options" => ["regexp" => "/^[a-zA-Z0-9]{4,32}/"]]);
                $mail = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
                $mail_r = filter_input(INPUT_POST, 'mail_r', FILTER_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
                $password_r = filter_input(INPUT_POST, 'password_r', FILTER_SANITIZE_STRING);
            

                
                if($pseudo && $mail && $password){

                    if($password == $password_r){
                        $newUser = new UserManager();
                        $user = $newUser->addUser($pseudo, $mail, $password);
                        
                        
                        return [
                            "view" => $this->folder."login.php",
                            "data" => ["user" => $user],
                            "titrePage" => "Forum | Connexion"
                        ];
                    }
                }
            }  
        }

        public function login(){
            
            if(!empty($_POST)){
                $mail = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

                if($mail && $password){
                    $manUser = new UserManager();
                    if($user = $manUser->login($mail)){
                        if(password_verify($password, $user['password'])){

                            Session::addUser($user);
                            Session::getUser();
                            Session::addMess('success', $user['pseudo']." est connecté(e) ");
                            Router::redirectTo("Home", "index");                            
                        } else {
                            Session::addMess('error', "erreur dans l'email ou le mdp");
                        }
                        
                    }     
                } 
            }
            return ['view' => $this->folder.'login.php'];
        }

        public function connect(){
            return [
                "view" => $this->folder."login.php",
                "data" => null,
                "titrePage" => "FORUM | Connexion"
            ];
        }

        public function inscription(){
            return [
                "view" => $this->folder."inscription.php",
                "data" => null,
                "titrePage" => "Forum | Inscription"
            ];
        }

        public function disconnect(){
            Session::removeUser();
            Session::addMess('error', "Vous êtes déconnecté(e)");
            Router::redirectTo("Forum", "allTopics");
            
        }
    }