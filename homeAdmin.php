<?php
//check if the session is started
require_once 'includes/session_check.inc.php';
?>

<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <title>keuze pagina </title>
</head>
<body>
    <div class="choices"><!--make a container for flexbox-->
        <div class="choice">
<!--            info text to make the intention of the page clear-->
            <h1>maak uw keuze!</h1>
            <p>Hier kunt u uw keuze maken, wat wilt u doen? <br/>
                Wilt u een nieuwe reservering plaatsen? of wilt u uw bestaande reservering bekijken of wijzigen? </p>
        </div>
    <br/>
    <br/>
    <!--    add buttons to link to the designated page the admin wants to see-->
        <div class="options">
            <div class="option-1">
                <a href="results.php">klik hier alle reserveringen te bekijken</a> <br/>
            </div>

            <div class="option-2">
                <a href="sign-up.php">klik hier om een nieuwe gebruiker aan te maken</a> <br/>
            </div>
        </div>
    </div>
</body>

