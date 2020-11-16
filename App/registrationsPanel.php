<?php

/**
 *  @title : registrationsPanel.php
 *  
 *  @author Guillaume RISCH
 *  @author Matthis HOULES
 * 
 *  @brief : registrations admin panel
 * 
 */
require_once(__DIR__.'/Classes/Notification.php');
require_once(__DIR__.'/Classes/Parameters.php');
require_once(__DIR__.'/Classes/Register.php');

session_start();

if (empty($_SESSION['user'])) {
    $_SESSION['notification'] = new Notification('error', '403 access forbidden');
    header('location: /admin/signIn.php');
    exit();
}

// get registrations
$listRegistrations = Register::getAll();

// get parameters
$parameters = Parameters::getParameters();

// get number of registrations
$registrationsCount = Register::getCountRegistrations();


if (!empty($_POST)) {
    header("Content-disposition: attachment; filename=registrations.csv");
    header("Content-Type: text/csv");
    $file = fopen("php://output", 'w');

    fputcsv($file, array(
        'Name',
        'Email',
        'Affiliation',
        'Presence'
    ));

    foreach ($listRegistrations as $key => $value) {
        $presence = '';
        if ($value->getMorning() == 1) {
            $presence .= 'morning, ';
        }
        if ($value->getAfternoon() == 1) {
            $presence .= 'afternoon, ';
        }
        if ($value->getLunch() == 1) {
            $presence .= 'lunch';
        }


        fputcsv($file, array(
            $value->getFirstname().' '.$value->getSurname(),
            $value->getEmail(),
            $value->getAffiliation(),
            $presence
        ));
    }

    fputcsv($file, array(
        'Morning registrations : '.$registrationsCount['morning'].'/'.$parameters->getNumberRegistrationMorning(),
        'Afternoon registrations : '.$registrationsCount['afternoon'].'/'.$parameters->getNumberRegistrationAfternoon(),
        'Lunch registrations : '.$registrationsCount['lunch'].'/'.$parameters->getNumberRegistrationLunch()
    ));

    $currentDate = date("Y-m-d H:i:s");
    fputcsv($file, array());
    fputcsv($file, array(
        'Document generated at : '.$currentDate
    ));

    fclose($file);
    exit();
}



?>