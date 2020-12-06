<?php
//Check if data fields are empty & generate error message if they are
$errors = [];
if ($firstName == "") {
    $errors['fname'] = 'voornaam mag niet leeg zijn';
}
if ($lastName == "") {
    $errors['lname'] = 'achternaam mag niet leeg zijn';
}
if ($datum == "") {
    $errors['datum'] = 'datum mag niet leeg zijn';
}
if ($time == "") {
    $errors['tijd'] = 'tijd mag niet leeg zijn';
}
if($email==""){
    $errors['email']='e-mail adres mag niet leeg zijn';
}
if($floor==""){
    $errors['verdieping']='verdieping mag niet leeg zijn';
}
