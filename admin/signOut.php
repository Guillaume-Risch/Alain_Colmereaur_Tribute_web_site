<?php
    /**
     * 
     * @name signOut.php
     * 
     * @author Guillaume RISCH
     * @author Matthis HOULES
     * 
     * @brief Sign out page
     * 
     */


    require_once(__DIR__.'/../App/Classes/Notification.php');

    session_start();

    unset($_SESSION['user']);
    $_SESSION['notification'] = new Notification ('success', 'You\'re now sign out !');
    header('location: /a-colmerauer/admin/signIn.php');
    exit();


?>