<?php

/**
 * @title : formConnexion.php
 * 
 * @author : Guillaume RISCH
 * @author : Matthis HOULES
 * 
 * @brief : form connexion
 */
require_once(__DIR__.'/Classes/Notification.php');
require_once(__DIR__.'/Classes/User.php');

session_start();

if (!empty($_POST)) {

    if (empty($_POST['username'] || empty($_POST['password']))) {
        $_SESSION['notification'] = new Notification('error', 'Username and password can not be empty.');
        header('location: /admin/signIn.php');
        exit();
    }

    $user = User::isUserExist($_POST['username'], $_POST['password']);
    if (!$user) {
        $_SESSION['notification'] = new Notification('error', 'Username not matching');
        header('location: /admin/signIn.php');
        exit();
    }

    $_SESSION['user'] = $user;
    $_SESSION['notification'] = new Notification('success', 'You\'re now log in !');
    header('location: /admin/panel/registrations.php');
    exit();
}


?>