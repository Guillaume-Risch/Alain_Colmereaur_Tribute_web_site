<?php

    require_once(__DIR__.'/../../App/registrationsPanel.php');

    // notifications modals display
    if (isset($_SESSION['notification'])) {
        echo $_SESSION['notification']->display();
        unset($_SESSION['notification']);
    
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alain Colmerauer - Administration</title>

    <link rel="stylesheet" href="../../assets/css/notification.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <script src="https://kit.fontawesome.com/b18ab37082.js" crossorigin="anonymous"></script> <!-- fontawesome -->

    <script src="../../assets/js/notification.js" defer></script>

</head>
<body>
    <header>
        <img src="../../assets/images/logo.svg" class="headerlogo">
        <nav>
            <a href="/a-colmerauer/admin/panel/registrations.php">Registrations</a>
            <a href="/a-colmerauer/admin/panel/parameters.php">Parameters</a>
            <a href="/a-colmerauer/admin/signOut.php">Sign out</a>
        </nav>
    </header>

    <main>
        <p class="mainTitle">
            Administration panel
        </p>
        <p class="secondTitle">
            Parameters
        </p>
        <div class="stats">
            <p>
                Number of morning registrations : <?= $registrationsCount['morning'] ?>
            </p>
            <p>
                Number of afternoon registrations : <?= $registrationsCount['afternoon'] ?>
            </p>
            <p>
                Number of lunch registrations : <?= $registrationsCount['lunch'] ?>
            </p>

        </div>

        <div class="registrationsContainer">
            <table>
                <thead>
                    <tr>
                        <td>
                            Name
                        </td>
                        <td>
                            Email
                        </td>
                        <td>
                            Affiliation
                        </td>
                        <td>
                            Presence
                        </td>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($listRegistrations as $key => $value) { ?>
                    <tr>
                        <td>
                            <?= $value->getFirstname().' '.$value->getSurname()?>
                        </td>
                        <td>
                            <?=  $value->getEmail() ?>
                        </td>
                        <td>
                            <?= $value->getAffiliation() ?>
                        </td>
                        <td>
                            <?php
                                if ($value->getMorning() == 1) {
                                    echo 'morning, ';
                                }
                                if ($value->getAfternoon() == 1) {
                                    echo 'afternoon, ';
                                }
                                if ($value->getLunch() == 1) {
                                    echo 'lunch';
                                }
                            ?>
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>

        <form action="" method="post">
            <input type="submit" class="exportButton" name="submit" value="Export in CSV">
        </form>

    </main>

    
</body>
