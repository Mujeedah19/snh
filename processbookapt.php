<?php
session_start();
require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once("functions/user.php");
 $full_name = $_SESSION['fullname'];


$errorCount= 0;
    
$aptdate = $_POST['aptdate'] != "" ? $_POST['aptdate'] : $errorCount++;
$apttime = $_POST['apttime'] != "" ? $_POST['apttime'] : $errorCount++;
$nature = $_POST['nature'] != "" ? $_POST['nature'] : $errorCount++;
$dept = $_POST['dept'] != "" ? $_POST['dept'] : $errorCount++;
$complaint = $_POST['complaint'] != "" ? $_POST['complaint'] : $errorCount++;

$_SESSION['aptdate'] = $aptdate;
$_SESSION['apttime'] = $apttime;
$_SESSION['nature'] = $nature;
$_SESSION['dept'] = $dept;
// $_SESSION['email'] = $email;
$_SESSION['complaint'] = $complaint;


if($errorCount > 0){

    $session_error = "You have " . $errorCount . " error";
    if($errorCount > 1){
        $session_error .= "s";
    }

    $session_error .= " in your form submission.";
    
    set_alert('error',$session_error);
    redirect_to("bookapt.php");

}else{
    
    // find_appointment();
    $allApt = scandir("db/appointments/");
    $countAllApt = count($allApt);
    $newAptId = ($countAllApt - 1);
    

    $aptObject =[
        "id" => $newAptId,
        "appointment_date" => $aptdate,
        "appointment_time" => $apttime,
        "appointment_nature" => $nature,
        "department" => $dept,
        "complaint" => $complaint,
       "patient_name" => $full_name
    ];

    save_apt($aptObject);
    unset($_SESSION['aptdate']);
    unset($_SESSION['apttime']);
    unset($_SESSION['nature']);
    unset($_SESSION['dept']);
    unset($_SESSION['complaint']);

    set_alert('message', "Your appointment has been successfully booked");
    redirect_to('patient.php');


}