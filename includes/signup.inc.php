<?php
//Check if data fields are empty & generate error message if they are
$errors = [];
if ($username == "") {
    $errors['username'] = 'gebruikersnaam mag niet leeg zijn';
}elseif($validUsername){
    $errors['username']= 'gebruikersnaam bestaat al';
}
if ($mail == "") {
    $errors['email'] = 'e-mail adres mag niet leeg zijn';
}
if ($password == "") {
    $errors['password'] = 'wachtwoord mag niet leeg zijn';
}
if ($course == "") {
    $errors['course'] = 'vak mag niet leeg zijn';
}
if($passwordRepeat==""){
    $errors['passwordRepeat']='wachtwoord herhaling mag niet leeg zijn';
}
if($password != $passwordRepeat){
    $errors['passwordRepeat']='de twee ingevoerde wachtwoorden komen niet overeen';
}

?>
