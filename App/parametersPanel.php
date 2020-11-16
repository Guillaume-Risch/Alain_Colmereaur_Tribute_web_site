<?php

/**
 *  
 * @title : parametersPanel.php
 * 
 * @author Guillaume RISCH
 * @author Matthis HOULES
 * 
 */
require_once(__DIR__.'/Classes/Notification.php');
require_once(__DIR__.'/Classes/Parameters.php');

session_start();

if (empty($_SESSION['user'])) {
    $_SESSION['notification'] = new Notification('error', '403 access forbidden');
    header('location: /admin/signIn.php');
    exit();
}
 
$listParameters = Parameters::getParameters();

$targetList = array(
    'startDate',
    'endDate',
    'countMorning',
    'countAfternoon',
    'countLunch'
);

if (!empty($_POST)) {
    if (empty($_POST['target']) || !in_array($_POST['target'], $targetList)) {
        $_SESSION['notification'] = new Notification('error', 'Error in form submit');
        header('location: /admin/panel/parameters.php');
        exit();
    }

    if ($_POST['target'] == 'startDate') {

        if ($_POST['value'] >= date('Y-m-d', strtotime(str_replace('/', '-', $listParameters->getEndRegistration())))) {
            $_SESSION['notification'] = new Notification('error', 'start registration date can not be after end registration date');
            header('location: /admin/panel/parameters.php');
            exit();
        }

        $listParameters->setStartRegistration($_POST['value']);
        $_SESSION['notification'] = new Notification('success', 'Start registrations date is now '.$_POST['value'] );
        header('location: /admin/panel/parameters.php');
        exit();
    }

    if ($_POST['target'] == 'endDate') {
        if ($_POST['value'] <= date('Y-m-d', strtotime(str_replace('/', '-', $listParameters->getStartRegistration())))) {
            $_SESSION['notification'] = new Notification('error', 'end registration date can not be before start registration date');
            header('location: /admin/panel/parameters.php');
            exit();
        }

        $listParameters->setEndRegistration($_POST['value']);
        $_SESSION['notification'] = new Notification('success', 'End registrations date is now '.$_POST['value'] );
        header('location: /admin/panel/parameters.php');
        exit();
    }

    if ($_POST['target'] == 'countMorning') {
        $listParameters->setNumberRegistrationMorning($_POST['value']);
        $_SESSION['notification'] = new Notification('success', 'Max number of morning registrations is now '.$_POST['value'] );
        header('location: /admin/panel/parameters.php');
        exit();
    }

    if ($_POST['target'] == 'countAfternoon') {
        $listParameters->setNumberRegistrationAfternoon($_POST['value']);
        $_SESSION['notification'] = new Notification('success', 'Max number of afternoon registrations is now '.$_POST['value'] );
        header('location: /admin/panel/parameters.php');
        exit();
    }

    if ($_POST['target'] == 'countLunch') {
        $listParameters->setNumberRegistrationLunch($_POST['value']);
        $_SESSION['notification'] = new Notification('success', 'Max number of lunch registrations is now '.$_POST['value'] );
        header('location: /admin/panel/parameters.php');
        exit();
    }

}


?>