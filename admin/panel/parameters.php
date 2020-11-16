<?php
    require_once(__DIR__.'/../../App/parametersPanel.php');  

    
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
        <form action="" method="post">
            <label for="startDate">Start registration date</label>
            <div class="row">
                <input type="hidden" name="target" value="startDate">
                <input type="date" name="value" id="startDate" value="<?=date('Y-m-d', strtotime(str_replace('/', '-', $listParameters->getStartRegistration())))?>" id="">
                <button type="submit"><i class="fas fa-edit"></i></button>
            </div>
        </form>

        <form action="" method="post">
            <label for="endDate">End registration date</label>
            <div class="row">
                <input type="hidden" name="target" value="endDate">
                <input type="date" id="endDate" name="value" value="<?=date('Y-m-d', strtotime(str_replace('/', '-', $listParameters->getEndRegistration())))?>" id="">
                <button type="submit"><i class="fas fa-edit"></i></button>
            </div>

        </form>

        <form action="" method="post">
            <label for="regMor">Number of morning registrations</label>
            <div class="row">
                <input type="hidden" name="target" value="countMorning">
                <input type="number" id="regMor" name="value" value="<?=$listParameters->getNumberRegistrationMorning()?>" id="">
                <button type="submit"><i class="fas fa-edit"></i></button>

            </div>
        </form>
        
        <form action="" method="post">
            <label for="regAft">Number of afternoon registrations</label>
            <div class="row">
                <input type="hidden" name="target" value="countAfternoon">
                <input type="number" id="regAft" name="value" value="<?=$listParameters->getNumberRegistrationAfternoon()?>" id="">
                <button type="submit"><i class="fas fa-edit"></i></button>
            </div>

        </form>

        <form action="" method="post">
            <label for="regLun">Number of lunch registrations</label>
            <div class="row">
                <input type="hidden" name="target" value="countLunch">
                <input type="number" id="regLun" name="value" value="<?=$listParameters->getNumberRegistrationLunch()?>" id="">
                <button type="submit"><i class="fas fa-edit"></i></button>
            </div>

        </form>

    </main>
    
</body>
</html>