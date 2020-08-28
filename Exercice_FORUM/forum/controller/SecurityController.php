<?php
    namespace Controller;

    use App\Router;
    use Model\Manager\UserManager;

    class SecurityController{

        public function register(){

            var_dump($_POST);
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
                            "view" => "forum/connect.php",
                            "data" => ["user" => $user],
                            "titrePage" => "Forum | Connexion"
                        ];
                    }
                }
            }  
        }

        public function login(){
            if(!empty($_POST)){
                $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
                if($user && $password){
                    $user = new UserManager();
                    $user->login();
                }
            }
        }

    }