<!-- register/login/logout
register(pseudo mail pass1 pass2) appel le user manager->addUser -->
<?php
    namespace Controller;

    use App\Router;
    use Model\Manager\User;

    class SecurityController{
        public function register(){
            $manUser = new UserManager();
            $manUser->addUser();

            

                        

                        $_SESSION['success'] = "Inscription réussie, connectez-vous !";
                        header("Location:connect.php");
                        die();
                    }
                    catch(Exception $e){
                    echo $e->getMessage();
                    }
                }
                else $_SESSION['error'] = "Les mots de passe ne correspondent pas !";
            }
            else $_SESSION['error'] = "Vous devez remplir TOUS les champs obligatoires !";
        }
        else $_SESSION['error'] = "Vous n'avez pas soumis le formulaire, petit malin !";

    header("Location:inscription.php");
    die();

    }