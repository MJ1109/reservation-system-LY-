<?php
require_once "vendor/autoload.php";
require_once "includes/db.php";

$faker = Faker\Factory::create();

echo 'Fake data is being added to your database';

for ($i=0; $i<15; $i++ ){
    $query="INSERT INTO reserveren_details (fname, lname, datum, tijd, mail, verdieping )
            VALUES ('".$faker -> firstName."',
                    '".$faker -> lastName."',
                    '".$faker -> date('Y-m-d')."',
                    '".$faker -> time ('H:i:s')."',
                    '".$faker -> safeEmail."',
                    '".$faker -> randomDigit."') ";
    mysqli_query($db, $query);
};
?>