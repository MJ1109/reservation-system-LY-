<?php
require_once 'includes/db.php';//connect to the db

//start the session
session_start();

//checks if the session has started, else redirects to the login page
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
?>