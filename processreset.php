<?php
session_start();

$errorCount= 0;

// verifying the data, validation
$token = $_POST['token'] != "" ? $_POST['token'] : $errorCount++;
$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;

$_SESSION['token'] = $token;
$_SESSION['email'] = $email;

if($errorCount > 0){

    $session_error = "You have " . $errorCount . " error";
    if($errorCount > 1){
        $session_error .= "s";
    }

    $session_error .= " in your form submission";
    $_SESSION['error'] = $session_error;
    
    header("Location:reset.php");
}else{
// TODO do actual reset hrere

$allUsersTokens = scandir("db/tokens/");
$countAllUsersTokens = count($allUsersTokens);

for($counter = 0; $counter < $countAllUsersTokens; $counter++){
    $currentToken = $allUsers[$counter];
    if($currentTokenFile == $email . ".json"){
        $tokenContent = file_get_contents("db/tokens/". $currentToken);
        $tokenObject =  json_decode($tokenContent);
        $tokenFromDB = $tokenObject->token;
        if($tokenFromDB == $token){
            echo"Users can update password";
            die();
        }
    }
}

$_SESSION['error'] = "Password Reset Failed, token/email invalid or expired ";
        header("Location:login.php");
}

?>