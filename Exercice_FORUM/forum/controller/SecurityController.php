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
            var_dump($_POST);
            if(!empty($_POST)){
                $mail = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

                if($mail && $password){
                    $manUser = new UserManager();
                    $user = $manUser->login($mail, $password);

                    var_dump($password);
                    var_dump($user);

                    if(password_verify($password, $user['password'])){
                        var_dump($user);
                    } else echo "pas connecté";

                }
            }
        }

    }