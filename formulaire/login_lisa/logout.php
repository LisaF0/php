<?php
    session_start();
    unset($_SESSION['user']);
    $_SESSION['success'] = "Vous êtes déconnecté";
    header("Location: index.php");