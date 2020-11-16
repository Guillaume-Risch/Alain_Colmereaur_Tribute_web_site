<?php

    /**
     * @title : formulaire.php
     * 
     * @author : Guillaume RISCH
     * @author : Matthis HOULES
     * 
     */
    require_once(__DIR__.'/./App/formTraitment.php');


    // notifications modals display
    if (isset($_SESSION['notification'])) {
        echo $_SESSION['notification']->display();
        unset($_SESSION['notification']);
    
    }

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>Alain COLMERAUER | Inscription</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- css links -->
    <link rel="stylesheet" type="text/css" media="screen" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/Formulaire.css">
    <link rel="stylesheet" href="./assets/css/notification.css">

    <!-- js scripts -->
    <script src="https://kit.fontawesome.com/b18ab37082.js" crossorigin="anonymous"></script> <!-- fontawesome -->
    <script src="./assets/js/main.js" defer></script>
    <script src="./assets/js/notification.js" defer></script>

</head>
<body>
    <?php

    ?>
        <header class="topContainer">
            <div class="navbarContainer">
                <div class="leftC">
                    <a href="/index.html">
                        <img src="./assets/images/logo.svg" class="headerLogo" alt="Alain COLMERAUER">
                    </a>
                    <a href="https://www.lis-lab.fr/" class="lisLink">
                        <img src="./assets/images/lis_logo.png" class="lisheaderLogo" alt="Lis-Lab">
                    </a>
                    
                </div>
                <button id="mobileMenuTrigger">
                    <i class="fas fa-bars"></i>
                </button>
    
                <nav id="navbar">
                    <a href="/en/formulaire.php" class="navLink flagLink deskF">
                        <img src="./assets/images/ukFlag.svg" class="flag" alt="">
                    </a>
                    <a href="" class="navLink flagLink deskF">
                        <img src="./assets/images/frFlag.svg" class="flag" alt="">
                    </a>
                    <a href="/presentation.html" class="navLink">Présentation</a>
                    <a href="/programme.html" class="navLink">Programme</a>
                    <a href="/partenaires.html" class="navLink">Partenaires</a>
                    <a href="/informations.html" class="navLink">Informations</a>
                    <a href="/formulaire.php" class="navButton">Inscription</a>
    
                    <div class="mobileFlagC">
                        <a href="/en/formulaire.php" class="navLink flagLink">
                            <img src="./assets/images/ukFlag.svg" class="flag" alt="">
                        </a>
                        <a href="" class="navLink flagLink">
                            <img src="./assets/images/frFlag.svg" class="flag" alt="">
                        </a>
                    </div>
                </nav>
            </div>
        </header>

    <main id="swup" class="transition-fade">
        <div class="title">
            <h1>Journée Scientifique à la mémoire de Alain Colmerauer</h1>
            <h2>Le 2 octobre 2020</h2>
        </div>
    
        <?php 
            if ((strtotime(str_replace('/', '-', $listParameters->getStartRegistration())) > strtotime(str_replace('/', '-', $date)) 
                || strtotime(str_replace('/', '-', $listParameters->getEndRegistration())) < strtotime(str_replace('/', '-', $date)))
                || $isRegFull
                ) {
        ?>

              
            <p class="title">
                Les inscriptions sont actuellement fermées.
            </p>
        
        <?php
            } else {
        ?>
        <div class="Form">
            <form id="Form" method="post" action="">
                <input name="email" type="email" class="form-control" placeholder="Adresse e-mail" required>
               
                <input name="surname" type="text" class="form-control" placeholder="Nom" required>

                <input name="firstname" type="text" class="form-control" placeholder="Prénom" required>

                <input name="affiliation" type="text" class="form-control" placeholder="Affiliation">

                <div class="container">
                    <?php
                        if ($registrationsCount['morning'] < $listParameters->getNumberRegistrationMorning()) {
                    ?>
                    <div>
                        <input type="checkbox" id="subscribeMorning" name="presence[]" value="morning">
                        <label for="subscribeMorning">J'assisterai le matin</label>
                    </div>
                    <?php } 
                        if ($registrationsCount['afternoon'] < $listParameters->getNumberRegistrationAfternoon()) {                    
                    ?>
                    <div>
                        <input type="checkbox" id="subscribeAfternoon" name="presence[]" value="lunch">
                        <label for="subscribeAfternoon">J'assisterai l'après-midi</label>
                    </div>
                    <?php } 
                        if ($registrationsCount['lunch'] < $listParameters->getNumberRegistrationLunch()) {                    
                    ?>
                    <div>
                        <input type="checkbox" id="subscribeEat" name="presence[]" value="afternoon">
                        <label for="subscribeEat">J'assisterai au buffet sur place à midi</label>
                    </div>
                        <?php } ?>
                </div>
                <input type="submit" class="form-submit" value="Envoyer" name="submit">
            </form>
        </div>
        <?php } ?>
    </main>

    <footer>
        <div class="leftSide">
            <img src="./assets/images/maps.PNG" class="map" alt="">
            <p class="position">
                Polytech Marseille Sud LIS UMR 7020 Campus de Luminy Case 925, 13288
                Marseille
            </p>
        </div>

        <div class="rightSide">
            <div>
                <p class="footerTitleContact">
                    Contact
                </p>
                <a class="footerLinkContact">
                    hommage.colmereaur@lis-lab.fr
                </a>
                <p class="footerTitle">
                    Liens utiles
                </p>
                <a href="/index.html" class="footerLink">
                    Accueil
                </a>
                <a href="/presentation.html" class="footerLink">
                    Présentation
                </a>
                <a href="/programme.html" class="footerLink">
                    Programme
                </a>
                <a href="/partenaires.html" class="footerLink">
                    Partenaires
                </a>
                <a href="/informations.html" class="footerLink">
                    Informations 
                </a>
                <a href="/formulaire.php" class="footerLink">
                    Inscription
                </a>
            </div>
        </div>
    </footer>
</body>
</html>