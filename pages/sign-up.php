<?php
require "header.php";

//check for POST isset, else do nothing
    if(isset($_POST['registreren'])) {
        require_once  "includes/db.php";

//Postback with the data showed to the user, first retrieve data from 'Super global'
        $username       = mysqli_real_escape_string($db, $_POST['username']);
        $checkUsername  = mysqli_query($db, "SELECT username FROM user_login WHERE username = '".$username." '");
        $validUsername  = mysqli_fetch_assoc($checkUsername);
        $mail           = mysqli_real_escape_string($db, $_POST['email']);
        $course         = mysqli_real_escape_string($db, $_POST['course']);
        $password       = mysqli_real_escape_string($db, $_POST['password']);
        $passwordRepeat = mysqli_real_escape_string($db, $_POST['passwordRepeat']);

//form validating for errors:
        require_once 'includes/signup.inc.php';

//save data to db
        if (empty($errors)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query          = "INSERT INTO user_login(username, email, password, course)
                               VALUES ('$username', '$mail', '$hashedPassword', '$course')";
            $result         = mysqli_query($db, $query)
            or die('Error: ' . $query);

            if ($result) {
                header('Location: choice.php');
                exit;
            } else {
                $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
            }

            mysqli_close($db); //Sluit de connectie met database
        }
    }
?>

<main>
   <h1> Registreren! </h1>

   <form action="<?= $_SERVER['REQUEST_URI']; ?> " method="post" enctype="multipart/form-data">

       <input type          ="text"
              name          ="username"
              placeholder   ="Gebruikersnaam"
              value         ="<?= isset($username) ? $username:'' ?>">
       <span class          ="errors"><?= isset($errors['username']) ? $errors['username'] : '' ?></span>
       <br/>
       <input type          ="email"
              name          ="email"
              placeholder   ="E-mail"
              value         ="<?= isset($mail) ? $mail:'' ?>">
       <span class          ="errors"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
       <br/>
       <input type          ="text"
              name          ="course"
              placeholder   ="vak"
              value         ="<?= isset($course) ? $course:'' ?>">
       <span class          ="errors"><?= isset($errors['course']) ? $errors['course'] : '' ?></span>
       <br/>
       <input type          ="password"
              name          ="password"
              placeholder   ="Wachtwoord"
              value         ="<?= isset($password) ? $password:'' ?>">
       <span class          ="errors"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
       <br/>
       <input type          ="password"
              name          ="passwordRepeat"
              placeholder   ="herhaal wachtwoord"
              value         ="<?= isset($passwordRepeat) ? $passwordRepeat:'' ?>">
       <span class          ="errors"><?= isset($errors['passwordRepeat']) ? $errors['passwordRepeat'] : '' ?></span>
       <br/>
       <button type="submit" name="registreren" > registreren!</button>

   </form>
</main>
