<?php
//make connection to the db
include_once 'includes/db.php';
require_once 'includes/session_check.inc.php';
require_once 'header.php';

//Get the result set from the database with a SQL query
$query = "SELECT * FROM reserveren_details";
$result = mysqli_query($db, $query) or die ('Error: ' . $query );

//Loop through the result to create a custom array
$details = [];
while ($row = mysqli_fetch_assoc($result)) {
    $details[] = $row;
}

//Close connection
mysqli_close($db);

?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <title>resultaten reserveringen</title>
</head>
<body>
<div id="results"><h1> gegevens reservering:</h1> </div>
<!--place the results in a table-->
    <table>
        <thead>
            <tr>
                <th>#</th> <!--shows the id of the reservation-->
                <th>Voornaam</th>
                <th>Achternaam</th>
                <th>Datum</th>
                <th>Tijd</th>
                <th>Verdieping</th>
                <th colspan="3"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($details as $detail) { ?><!-- loop through the reservations and place them in the tabe-->
            <tr>
                <td><?= $detail['id'] ?> </td>
                <td><?= $detail['fname'] ?></td>
                <td><?= $detail['lname'] ?></td>
                <td><?= $detail['datum'] ?></td>
                <td><?= $detail['tijd'] ?></td>
                <td><?= $detail['verdieping'] ?></td>
                <td><a href="edit.php?id=<?= $detail['id'] ?>">wijzigen</a></td><!--button to the edit page-->
                <td><a href="delete.php?id=<?= $detail['id'] ?><!--">Delete</a></td><!--button to delete the reservation-->
            </tr>
        <?php } ?><!--stop the foreach loop-->
        </tbody>

</body>
</html>
