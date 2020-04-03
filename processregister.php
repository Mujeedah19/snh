<?php
print_r ($_POST);

// collecting the data

$first_name =$_POST["first_name"];
$last_name =$_POST["last_name"];
$email =$_POST["email"];
$password =$_POST["password"];
$gender =$_POST["gender"];
$designation =$_POST["designation"];
$department =$_POST["department"];
$errorArray=[];

// verifying the data, validation
if($first_name == ""){
    $errorArray = "First name cannot be blank";
}

print_r($errorArray);

// saving the data into database(folder)



// return back to the page with a status message
?>