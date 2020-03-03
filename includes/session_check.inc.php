<?php
require_once 'includes/db.php';

session_start();

if(!isset($_SESSION['username'])){
    header("location:login.php");
}
//https://www.tutorialspoint.com/php/php_mysql_login.htm
?>