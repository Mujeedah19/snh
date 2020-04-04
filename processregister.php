<?php
print_r ($_POST);

// collecting the data

$first_name =$_POST["first_name"];
$last_name =$_POST["last_name"];
$email =$_POST["email"];
$gender =$_POST["gender"];
$designation =$_POST["designation"];
$department =$_POST["department"];
$password =$_POST["password"];

$errorArray=[];

// verifying the data, validation
if($first_name == ""){
    $errorArray = "First name cannot be blank";
}
if($last_name == ""){
    $errorArray = "Last name cannot be blank";
}
if($email == ""){
    $errorArray = "Email cannot be blank";
}
if($gender == ""){
    $errorArray = "Gender cannot be blank";
}
if($designation == ""){
    $errorArray = "Designation cannot be blank";
}
if($department == ""){
    $errorArray = "Department cannot be blank";
}
if($password == ""){
    $errorArray = "Password cannot be blank";
}

print_r($errorArray);

// saving the data into database(folder)



// return back to the page with a status message
?>