<?php
require_once 'includes/db.php';
require_once 'includes/session_check.inc.php';

//Retrieve the id
$reservationId = $_GET['id'];

//Remove from the database
$query = "DELETE FROM reserveren_details WHERE id ='$reservationId'";

mysqli_query($db, $query) or die ('Error: '.mysqli_error($db));

//Close connection
mysqli_close($db);

//Redirect to homepage after deletion & exit script
header("Location: results.php");
exit;

?>