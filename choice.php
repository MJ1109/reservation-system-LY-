<?php
require_once 'includes/session_check.inc.php';  //checks if there is a valid session going
require_once 'header.php'; //gets the nav

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
<div class="choices">
    <div class="choice">
        <h1>Maak uw keuze!</h1>
        <p>Hier kunt u uw keuze maken, wat wilt u doen? <br/>
            Wilt u een nieuwe reservering plaatsen? of wilt u uw bestaande reservering bekijken of wijzigen? </p>
    </div>
        <br/>
        <br/>
    <div class="options">
        <div class="option-1">
            <a href="reserveren.php">klik hier om een nieuwe reservering aan te maken</a> <br/>
        </div>
        <div class="option-2">
            <a href="results.php">klik hier om een bestaande reservering te bekijken</a> <br/>
        </div>
    </div>
</div>
</body>