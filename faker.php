<?php
require_once "vendor/autoload.php"; //load the library in
require_once "includes/db.php"; //connect to the db to put the data in

//the command that needs to be executed
$faker = Faker\Factory::create();

//message to know it's working
echo 'Fake data is being added to your database';

//execute the create command 15 times
for ($i=0; $i<15; $i++ ){
    //insert the generated values in the right columns
    $query="INSERT INTO reserveren_details (fname, lname, datum, tijd, mail, verdieping )  
            VALUES ('".$faker -> firstName."', 
                    '".$faker -> lastName."',
                    '".$faker -> date('Y-m-d')."', 
                    '".$faker -> time ('H:i:s')."',
                    '".$faker -> safeEmail."',
                    '".$faker -> randomDigit."') ";
    mysqli_query($db, $query);
}
//firstName, lastName, date, time, safeEmail & randomDigit are values that can be generated by the faker library.