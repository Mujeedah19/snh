<?php
session_start();

// collecting the data

$first_name =$_POST["first_name"];
$last_name =$_POST["last_name"];
$email =$_POST["email"];
$gender =$_POST["gender"];
$designation =$_POST["designation"];
$department =$_POST["department"];
$password =$_POST["password"];

$errorCount= 0;

// verifying the data, validation
$first_name = $_POST['first_name'] != "" ? $_POST['first_name'] : $errorCount++;
$flast_name = $_POST['last_name'] != "" ? $_POST['last_name'] : $errorCount++;
$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$gender = $_POST['gender'] != "" ? $_POST['gender'] : $errorCount++;
$designation = $_POST['designation'] != "" ? $_POST['designation'] : $errorCount++;
$department = $_POST['department'] != "" ? $_POST['department'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;

$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['email'] = $email;
$_SESSION['gender'] = $gender;
$_SESSION['designation'] = $designation;
$_SESSION['department'] = $department;


if($errorCount > 0){

    $session_error = "You have " . $errorCount . " error";
    if($errorCount > 1){
        $session_error .= "s";
    }

    $session_error .= " in your form submission";
    $_SESSION['error'] = $session_error;
    
    header("Location:register.php");
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
    $_SESSION['message'] = "You can now log in. Registration Successful " . $first_name;
    header("Location:login.php");
}

// saving the data into database(folder)



// return back to the page with a status message
?>