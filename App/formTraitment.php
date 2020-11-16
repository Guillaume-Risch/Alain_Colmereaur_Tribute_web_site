<?php

/**
 * @title : formTraitment.php
 * 
 * @author : Guillaume RISCH
 * @author : Matthis HOULES
 * 
 * @brief : register form traitment
 */


// Class imports
require_once(__DIR__.'./Classes/Parameters.php');
require_once(__DIR__.'./Classes/Register.php');
require_once(__DIR__.'./Classes/Notification.php');

session_start();


//get Parameters
$listParameters = Parameters::getParameters();
//get stats
$registrationsCount = Register::getCountRegistrations();

// Current date
date_default_timezone_set('Europe/Paris');
$date = date('d/m/Y', time());

// check if registrations are full
$isRegFull = Register::isRegistrationsFull($registrationsCount, $listParameters);


if (!empty($_POST)) {
    
    // Email
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['notification'] = new Notification('error', 'Your email is not valid.');
        header('location: /formulaire.php');
        exit();
    }
    if (Register::isMailExist($_POST['email'])) {
        $_SESSION['notification'] = new Notification('error', 'Your email is already registered');
        header('location: /formulaire.php');
        exit();
    }

    // name
    if (empty($_POST['surname']) || empty($_POST['firstname'])) {
        $_SESSION['notification'] = new Notification('error', 'Your name is not valid');
        header('location: /formulaire.php');
        exit();
    }

    // participation
    $lunch = 0;
    $morning = 0;
    $afternoon = 0;
    foreach ($_POST['presence'] as $key => $value) {
        $$value = 1;
    }

    if ($lunch == 0 && $morning == 0 && $afternoon == 0) {
        $_SESSION['notification'] = new Notification('error', 'You need to come at least at one moment in the day');
        header('location: /formulaire.php');
        exit();
    }
    if ($lunch == 1 && $morning == 0 && $afternoon == 0) {
        $_SESSION['notification'] = new Notification('error', 'You can\'t eat if you\'re not coming at the morning or at the afternoon');
        header('location: /formulaire.php');
        exit();
    }

    // Check parameters
    $parameters = Parameters::getParameters();



    if (strtotime(str_replace('/', '-', $parameters->getStartRegistration())) > strtotime(str_replace('/', '-', $date)) 
    || strtotime(str_replace('/', '-', $parameters->getEndRegistration())) < strtotime(str_replace('/', '-', $date))) {
        $_SESSION['notification'] = new Notification('error', 'Registrations are closed.');
        header('location: /formulaire.php');
        exit();
    }

    Register::createRegister(
        $_POST['email'],
        $_POST['firstname'],
        $_POST['surname'],
        $_POST['affiliation'],
        $morning,
        $lunch,
        $afternoon
    );

    $_SESSION['notification'] = new Notification('success', 'You\'re now registered');

    header('location: /formulaire.php');
    exit();

}


?>