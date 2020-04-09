<?php
session_start();
$errorCount= 0;

// verifying the data, validation
$first_name = $_POST['first_name'] != "" ? $_POST['first_name'] : $errorCount++;
preg_match('#[0-9]#',$_POST['first_name']) ? $errorCount++ :  $_POST['first_name'];
strlen($_POST['first_name']) < 2 ?  $errorCount++ : $_POST['first_name'];

$last_name = $_POST['last_name'] != "" ? $_POST['last_name'] : $errorCount++;
preg_match('#[0-9]#',$_POST['last_name']) ? $errorCount++ :  $_POST['last_name'];
strlen($_POST['last_name']) < 2 ?  $errorCount++ : $_POST['last_name'];

$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
!filter_var($email,FILTER_VALIDATE_EMAIL) ? $errorCount++ : $_POST['email'];
strlen($_POST['email']) < 5 ?  $errorCount++ : $_POST['email'];

$gender = $_POST['gender'] != "" ? $_POST['gender'] : $errorCount++;
$designation = $_POST['designation'] != "" ? $_POST['designation'] : $errorCount++;
$department = $_POST['department'] != "" ? $_POST['department'] : $errorCount++;
$date = $_POST['date'] != "" ? $_POST['date'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;

$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['email'] = $email;
$_SESSION['gender'] = $gender;
$_SESSION['designation'] = $designation;
$_SESSION['department'] = $department;
$_SESSION['date'] = $date;


if($errorCount > 0){

    $session_error = "You have " . $errorCount . " error";
    if($errorCount > 1){
        $session_error .= "s";
    }

    $session_error .= " in your form submission.";
    $_SESSION['error'] = $session_error;
    
    header("Location:register.php");
    die();
}else{
    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);
    $newUserId = ($countAllUsers-1);

    $userObject =[
        "id" => $newUserId,
        "first_name" => $first_name,
        "last_name" => $last_name,
        "email" => $email,
        "gender" => $gender,
        "designation" => $designation,
        "department" => $department,
        "date" => $date,
        "password" => password_hash($password, PASSWORD_DEFAULT)
    ];

    for($counter = 0; $counter < $countAllUsers; $counter++){
        $currentUser = $allUsers[$counter];
        if($currentUser == $email . ".json"){
            $_SESSION['error'] = "Registration Failed. User already exists ";
            header("Location:register.php");
            die();
        }
    }

    

    file_put_contents("db/users/" . $email . ".json", json_encode($userObject));
    
    $_SESSION['message'] =  $first_name . "'s Registration Successful, you can now log in.";
    header("Location:login.php");
}

// saving the data into database(folder)



// return back to the page with a status message
?>