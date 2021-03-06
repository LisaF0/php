<?php 
    namespace App;

    abstract class Session{

        public static function addMess($type, $text){
            if(!isset($_SESSION['mess'][$type])){
                $_SESSION["mess"][$type] = [];
            }
            $_SESSION['mess'][$type][] = $text;
        }

        public static function hasMess(){
            return isset($_SESSION["mess"]);
        }

        public static function getMess($type){
            if(isset($_SESSION["mess"][$type])){
                $messs = $_SESSION["mess"][$type];
                unset($_SESSION["mess"][$type]);
                return $messs;
            }
            else return [];           
        }

        public static function getUser(){
           return isset($_SESSION['user']) ? $_SESSION['user'] : null;
        }

        public static function addUser($user){
                $_SESSION['user'] = $user;
        }

        public static function removeUser(){
            unset($_SESSION["user"]);
        }

        public static function hasRole($role){
            return in_array($role, json_decode($_SESSION['user']->getRole()));
        }

    }
        // public static function getUser(){
        //     if(isset($_SESSION['user'])){
        //         $infoUser = $_SESSION['user'];
        //         return $infoUser;
        //     } 
        //     else return [];
 
        // }

        // public static function addUser($user){
        //     if(!isset($_SESSION['user'])){
        //         $_SESSION['user'] = [];
        //     }
        //     $_SESSION['user'] = $user;
        // }


