<?php
session_start();
$errorCount= 0;

$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;

$_SESSION['email'] = $email;

if($errorCount > 0){

    $session_error = "You have " . $errorCount . " error";
    if($errorCount > 1){
        $session_error .= "s";
    }

    $session_error .= " in your form submission";
    $_SESSION['error'] = $session_error;
    
    header("Location:forgot.php");
}else{

    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);

    for($counter = 0; $counter < $countAllUsers; $counter++){
        $currentUser = $allUsers[$counter];
        if($currentUser == $email . ".json"){

            $subject = "Password Reset Link";
            $message = "A password reset has been initiated from your account, 
            if you did not initiate this reset, please ignore this message. Otherwise, 
            visit: localhost/startng/snh/reset.php ";
            $headers = "From: admin@snh.ng" . "\r\n";
            "CC:seyi@snh.org";

            $try = mail($email,$subject,$message,$headers);
            print_r($try);
            die();

            if($try){
                $_SESSION['error'] = "Password reset has been sent to your mail" . $email;
                header("Location:login.php");
            }else{
                $_SESSION['error'] = "Something went wrong, we could not send password reset to " . $email;
                header("Location:forgot.php");

            }

            die();
            // $_SESSION['error'] = "Registration Failed. User already exists ";
            // header("Location:forgot.php");
            // die();
        }
    }
    $_SESSION['error'] = "Email not registered with us";
    header("Location:forgot.php");

}


?>