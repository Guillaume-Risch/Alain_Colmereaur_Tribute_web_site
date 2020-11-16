<?php

require_once(__DIR__.'/../App/FormConnexion.php');


if (isset($_SESSION['notification'])) {
    echo $_SESSION['notification']->display();
    unset($_SESSION['notification']);

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alain Colmerauer | Administration</title>

    <link rel="stylesheet" href="../assets/css/signin.css">
    <link rel="stylesheet" href="../assets/css/notification.css">

    <script src="https://kit.fontawesome.com/b18ab37082.js" crossorigin="anonymous"></script> <!-- fontawesome -->
    <script src="./assets/js/notification.js" defer></script>

</head>
<body>

    <main>

        <div class="logosContainer">
            <img src="../assets/images/logo.svg" alt="">
        </div>

        <form action="" method="post" class="form">
            <div class="inputC">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </div>

            <div class="inputC">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>

            <input type="submit" value="Sign in" name="submit">
        </form>
    </main>

    
</body>
</html>
