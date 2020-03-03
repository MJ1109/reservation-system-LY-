<?php
//connect to the db
require_once "includes/db.php";
require_once 'includes/session_check.inc.php';
require_once 'header.php';

$reservationId = $_GET['id'];

if(isset($_GET['id'])){
    $reservation = [];

    $query = "SELECT * FROM reserveren_details WHERE id =" . $reservationId;
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result)==1){
        $reservation = mysqli_fetch_assoc($result);
        $stamp = $reservation['datum'];
    }else {
        header('Location: results.php');
        exit;
    }

}

if(isset($_POST['edit'])) {
    $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
    $datum = mysqli_real_escape_string($db, $_POST['datum']);
    $time = mysqli_real_escape_string($db, $_POST['time']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $floor = mysqli_real_escape_string($db, $_POST['floor']);
    $realReservationId = mysqli_escape_string($db, $_POST['id']);

    //require form error messages
    require_once "includes/reservering.inc.php";


    if (empty ($errors)) {
        $query = "UPDATE reserveren_details 
                    SET fname = '$firstName', lname = '$lastName', datum = '$datum', tijd = '$time' , mail = '$email', verdieping = '$floor'
                    WHERE id = '$reservationId'";
        $result = mysqli_query($db, $query);

        if ($result) {
            header('Location: results.php');
            exit;
        } else {
            echo "DATABASE: " . mysqli_error($db);
        }
    }

}

mysqli_close($db);

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>reserveringssyteem Lyceum Ypenburg</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <title>wijzig gegevens</title>
</head>
<body>
<h1>
    Gegevens reservering
</h1>

<!--formulier om reservering te editen-->

<form action="<?= $_SERVER['REQUEST_URI']; ?> " method="post" enctype="multipart/form-data">
<label for="voornaam">
    <input  type        ="text"
            name        ="firstName"
            placeholder ="voornaam"
            value       ="<?= isset($reservation['fname']) ? $reservation['fname'] : '' ?>">
    <span class="errors"><?= isset($errors['fname']) ? $errors['fname'] : '' ?></span>
</label>
    <br/>
    <label for="achternaam">
    <input  type        ="text"
            name        ="lastName"
            placeholder ="achternaam"
            value       ="<?= isset($reservation['lname']) ? $reservation['lname'] : '' ?>">
    <span class="errors"><?= isset($errors['lname']) ? $errors['lname'] : '' ?></span>
    </label>
    <br/>
    <!--    #verdieping drop-down :-->
    <select name="floor" size="3" id="verdieping" required>
        <?php if(isset($reservation['verdieping'])): ?>
            <option value="<?= $reservation['verdieping'] ?>" disabled selected>Verdieping nu: <?= $reservation['verdieping'] ?></option>
        <?php else: ?>

        <?php endif; ?>

        <option value="0"> verdieping 1</option>
        <option value="1"> verdieping 2</option>
        <option value="2"> verdieping 3</option>
    </select>
    <span class="errors"><?= isset($errors['floor']) ? $errors['floor'] : '' ?></span>
    <br/>
    <input type="date"
           name="datum"
           min="2020-01-01"
           max="2020-12-31"
           value="<?= isset($stamp) ? $stamp : '' ?>">
    <span class="errors><?= isset($errors['datum'])? $errors['datum'] : ''?>" </form>
<br/>
<input type="time"
       name="time"
       placeholder="tijd"
       value="<?= isset($reservation['tijd']) ? $reservation['tijd'] : '' ?>">
<span class="errors"><?= isset($errors['tijd']) ? $errors['tijd'] : '' ?></span>
<br/>
<input type="email"
       name="email"
       placeholder= "e-mail adres"
       value="<?= isset($reservation['mail']) ? $reservation['mail'] : '' ?>" >
<span class="errors"><?= isset($errors['email']) ? $errors['email'] : ''?></span>
<br/>
<input type="hidden" name="id" value="<?= $reservationId ?>" />
<button type="submit" name="edit" > reservering wijzigen!</button>
</form>
</body>


