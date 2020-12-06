<?php
//start session
session_start();
//check for submit button, else do nothing
if(isset($_POST['login'])) {
    //include de db
    require_once 'includes/db.php';

    //postback with data showed to the user, first retrieve data from 'super global'
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

    //check if the username is in the db, returns FALSE when there is no match in the db
        $checkUsername = mysqli_query($db, "SELECT username FROM user_login WHERE username = '" . $username . "'");

    //fetch the password that's connected to the username
        $getPassword = mysqli_query($db, "SELECT password FROM user_login WHERE username='" . $username . "'");

    //check if the query got any results:
        if (mysqli_num_rows($checkUsername) > 0) {
            //fetch the info from the form and turn the array into a string (implode).
                $hashed_password = implode(mysqli_fetch_assoc($getPassword));
            //check if the password is correct
                $valid_password = password_verify($password, $hashed_password);
            //if you want to login as admin:
            if ($username == 'admin') {
                if ($valid_password) {
                    $_SESSION['username'] = $username;
                    header("Location: homeAdmin.php");//if everything matches, send to admin page
                } else {
                    $passwordErr = "wachtwoord komt niet overeen met de gebruikersnaam";
                    $password = ""; //reset inputfield
                }
            }
            else {
                //if $password matches the correct de-hashed password, send to the location page
                if ($valid_password) {
                    $_SESSION['username'] = $username;
                    header("Location: choice.php");
                } else {
                    $passwordErr = "wachtwoord komt niet overeen met de gebruikersnaam";
                    $password = ""; //reset inputfield
                }
            }
        } else {
            //if user doesn't exist
            $usernameErr = "Niet bestaande gebruiker";
            //reset inputfields
            $username = "";
            $password = "";
        }
}
//errors als invoervelden leeg zijn
$errors = [];
if ($username == "") {
    $errors['username'] = 'voornaam mag niet leeg zijn';
} if($password =="") {
    $errors['password'] = 'wachtwoord mag niet leeg zijn';
}
?>


