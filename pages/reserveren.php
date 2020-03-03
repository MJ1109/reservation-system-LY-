<?php
//require "header.php";
require_once "header.php";
require_once 'includes/session_check.inc.php';
//check for POST isset, else do nothing
    if(isset($_POST['submit'])) {
        require_once "includes/db.php";

//Postback with the data showed to the user, first retrieve data from 'Super global'
    $firstName  = mysqli_real_escape_string($db, $_POST['firstName']);
    $lastName   = mysqli_real_escape_string($db, $_POST['lastName']);
    $datum      = mysqli_real_escape_string($db, $_POST['datum']);
    $time       = mysqli_real_escape_string($db, $_POST['time']);
    $email      = mysqli_real_escape_string($db, $_POST['email']);
    $floor      = mysqli_real_escape_string ($db, $_POST['floor']);

//form validating for errors:
    require_once 'includes/reservering.inc.php ';

//sla gegevens op in de db
        if (empty($errors)) {
            $query = "INSERT INTO reserveren_details(fname, lname, datum, tijd, mail, verdieping )
             VALUES ('$firstName', '$lastName', '$datum', '$time', '$email', '$floor')";
            $result = mysqli_query($db, $query)
            or die('Error: ' . $query);

            if ($result) {
                header('Location: succes.php');
                exit;
            } else {
                $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
            }

            mysqli_close($db); //Sluit de connectie met database
        }
    }

?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>reserveringssyteem Lyceum Ypenburg</title>
</head>
<div class="reservation">
<body>

    <div class="text"> <h1>Gegevens reservering</h1></div>

    <!--formulier om reservering te plaatsen-->
    <div class="form">
        <form action="<?= $_SERVER['REQUEST_URI']; ?> " method="post" enctype="multipart/form-data">
            <label  for         ="voornaam" > Voornaam
                <input  type        ="text"
                        name        ="firstName"
                        placeholder ="voornaam"
                        value       ="<?= isset($fname) ? $fname:'' ?>">
                <span class="errors"><?= isset($errors['fname']) ? $errors['fname'] : '' ?></span>
            </label>
            <br/>
            <label  for         ="achternaam" > Achternaam
                <input  type        ="text"
                        name        ="lastName"
                        placeholder ="achternaam"
                        value       ="<?= isset($lname) ? $lname:'' ?>">
                <span class="errors"><?= isset($errors['lname']) ? $errors['lname'] : '' ?></span>
            </label>
            <br/>
            <!--    #verdieping drop-down :-->
            <label  for         ="floor" > Verdieping
                <select name="floor" size="3" id="verdieping" required>
                    <option value="0"> verdieping 1</option>
                    <option value="1"> verdieping 2</option>
                    <option value="2"> verdieping 3</option>
                </select>
                <span class="errors"><?= isset($errors['floor']) ? $errors['floor'] : '' ?></span>
            </label>
            <br/>
            <label  for  ="datum" > Datum
                <input type="date"
                       name="datum"
                       min="2020-01-01"
                       max="2020-12-31"
                       value="<?= isset($datum)? $datum:''?> ">
                <span class="errors><?= isset($errors['datum'])? $errors['datum'] : ''?>"
        </label>
            <br/>
            <label for="time">
                <input type="time"
                       name="time"
                       placeholder="tijd"
                       value="<?= isset($time) ? $time:'' ?>">
                <span class="errors"><?= isset($errors['tijd']) ? $errors['tijd'] : '' ?></span>
            </label>
            <br/>
            <label  for         ="voornaam" > Voornaam
            <input type="email"
                   name="email"
                   placeholder= "e-mail adres"
                   value="<?=isset($mail) ? $time: '' ?>" >
            <span class="errors"><?= isset($errors['email']) ? $errors['email'] : ''?></span>
            </label>
            <br>
        <br/>
            <button type="submit" name="submit" > reservering plaatsen!</button>
        </form>
    </div>
    <div class="choices">
        <div class="option-1"> <p>klik <a href="index.php">hier</a> om terug te gaan naar de hoofdpagina! </p> </div>
        <div class="option-2"> <p>klik <a href="faker.php"> hier</a> om de faker library toe te voegen </p> </div>

</div>
</body>
</html>