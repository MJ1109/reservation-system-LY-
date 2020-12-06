<?php
require_once 'header.php';
//check for POST isset, else do nothing
if(isset($_POST['login'])){
    require_once "includes/db.php";

    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    //form validating for errors:
    require_once 'includes/login.inc.php ';

    mysqli_close($db); //Sluit de connectie met database
}
?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>log-in page</title>
</head>
<body>
    <div id="login">
        <div class="text">
            <h1> Welkom!</h1>
            <h3>Log in om een reservering te plaatsen of te wijzigen </h3>
        </div>

        <div class="inlogform">
            <form action="<?= $_SERVER['REQUEST_URI']; ?> " method="post" enctype="multipart/form-data">

                <label for = "username">
                    <input type         = "text"
                        name         = "username"
                        placeholder  = "Gebruikersnaam"
                        value        = "<?= isset($username) ? $username:'' ?>">
                        <span class="errors"><?= isset($errors['username']) ? $errors['username'] : '' ?></span>
                </label>
            <br/>

                <label for          = "password">
                    <input type         = "password"
                        name         = "password"
                        placeholder  = "Wachtwoord"
                        value        = "<?= isset($password) ? $password:'' ?>">
                        <span class="errors"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
                </label>
            <br/>
                <button type="submit" name="login" value="login">Inloggen</button>
            <br/>
        <!--    <a href="sign-up.php">Klik hier als je een nieuwe gebruiker bent!</a>-->
            </form>
        </div>
    </div>
</body>
</html>