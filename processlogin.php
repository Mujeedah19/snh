<?php
session_start();


$errorCount = 0;

$email = $_POST['email'] != "" ?$_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;

$_SESSION['email'] = $email;

//saving last login details
date_default_timezone_set("Africa/Lagos");
$logindate= date("y m d h:i:sa");
file_put_contents("db/userlogin/" . $_SESSION['email'] . ".txt", $logindate);

if($errorCount > 0){
    $session_error = "You have " . $errorCount . " error";
    if($errorCount > 1){
        $session_error .= "s";
    }

    $session_error .= " in your form submission";
    $_SESSION['error'] = $session_error;

    header("Location:login.php");
}else{
    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);

    for($counter = 0; $counter < $countAllUsers; $counter++){
        $currentUser = $allUsers[$counter];

        if($currentUser == $email . ".json"){

            $userString = file_get_contents("db/users/". $currentUser);
            $userObject =  json_decode($userString);
            $passwordFromDB = $userObject->password;

            $passwordFromUser = password_verify($password, $passwordFromDB);

            if($passwordFromDB == $passwordFromUser){
                $_SESSION['loggedIn'] = $userObject->id;
                $_SESSION['fullname'] = $userObject->first_name . " " . $userObject->last_name;
                $_SESSION['role'] = $userObject->designation;
                $_SESSION['department'] = $userObject->department;
                $_SESSION['date'] = $userObject->date;

                
                if( $userObject->designation == "Patient"){
                header("Location:patient.php");
                }else if( $userObject->designation == "Super Admin"){
                    header("Location:superadmin.php");
                }else{
                header("Location:medicalteam.php");
                }
                die();
            }
        }

    }
    $_SESSION['error'] = "Invalid Email or Password ";
            header("Location:login.php");
            die();
}
?>