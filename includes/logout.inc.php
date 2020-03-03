<?php
  session_start();
    unset($_SESSION['username']); //clear $_SESSION
    session_destroy(); //destroy session
    header("location: /LY/login.php");
