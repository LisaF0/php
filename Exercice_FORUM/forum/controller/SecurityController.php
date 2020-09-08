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
                        Session::addMess('success', 'Inscription réussie, veuillez vous connecter');
                        
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
                    $userPass = $manUser->login($mail);
                    // if($user = $manUser->login($mail)){
                        if(password_verify($password, $userPass->getPassword())){
                            
                            $user = $manUser->getUser($mail);
                            Session::addUser($user);
                            // Session::getUser();
                            Session::addMess('success', $user->getPseudo()." est connecté(e) ");
                            Router::redirectTo("Home", "index");                            
                        } else {
                            Session::addMess('error', "erreur dans l'email ou le mdp");
                        }
                        
                    // }     
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

        public function formEditMail(){
            return [
                "view" => "forum/editMail.php",
                "data" => null,
                "titrePage" => "Forum | Edit Mail"
            ];
        }

        public function editMail(){
            if(!empty($_POST)){
                $oldMail = filter_input(INPUT_POST, 'oldMail', FILTER_VALIDATE_EMAIL);
                $newMail = filter_input(INPUT_POST, 'newMail', FILTER_VALIDATE_EMAIL);
                $verifMail = filter_input(INPUT_POST, 'verifMail', FILTER_VALIDATE_EMAIL);
                
                if($oldMail == Session::getUser()->getMail()){
                    if($newMail === $verifMail){
                        $manUser = new UserManager();
                        $manUser->editMail(Session::getUser()->getId(),$newMail);
                        Router::redirectTo('Forum', 'showProfil');
                    }
                }

            }
            //si oldmail == mailuser, and new mail == verifmail alors set mail by newmail
        }

        public function formEditPassword(){
            return [
                "view" => "forum/editPassword.php",
                "data" => null,
                "titrePage" => "Forum | Edit Password"
            ];
        }

        public function EditPassword(){
            if(!empty($_POST)){
                $oldPassword = filter_input(INPUT_POST, 'oldPassword', FILTER_SANITIZE_STRING);
                $newPassword = filter_input(INPUT_POST, 'newPassword', FILTER_SANITIZE_STRING);
                $verifPassword = filter_input(INPUT_POST, 'verifPassword', FILTER_SANITIZE_STRING);
                
                $id = Session::getUser()->getId();
                $manUser = new UserManager();
                $currentUser = $manUser->getPass($id);
                if(password_verify($oldPassword, $currentUser->getPassword())){

                }
            }
        }
    }