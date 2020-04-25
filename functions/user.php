<?php
include_once('alert.php');

function is_user_loggedIn(){
    if($_SESSION['loggedIn'] && !empty($_SESSION['loggedIn'])){
        return true;
    }
        return false;
    
}

function is_token_set(){
   return is_token_set_in_get() || is_token_set_in_session();
}

function is_token_set_in_session(){
    return isset($_SESSION['token']);
}

function is_token_set_in_get(){
    return isset($_GET['token']);
}

function find_user($email = ""){
    if(!$email){
        set_alert("error","User Email is not set");
        die();
    }
    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);

    for ($counter = 0; $counter < $countAllUsers ; $counter++) {
       
        $currentUser = $allUsers[$counter];

        if($currentUser == $email . ".json"){
          //check the user password.
            $userString = file_get_contents("db/users/".$currentUser);
            $userObject = json_decode($userString);
                       
            return $userObject;
          
        }        
        
    }

    return false;
}


function get_appointment(){
    
    $allApt = scandir("db/appointments/");
    $countAllApt = count($allApt);
    for ($counter = 0; $counter < $countAllApt; $counter++) {
       
        $currentApt = $allApt[$counter];

            $aptString = file_get_contents("db/appointments/".$currentApt);
            $aptObject = json_decode($aptString);
                       
            return $aptObject;
          
        
    }

    return false;
}

function save_user($userObject){
    file_put_contents("db/users/". $userObject['email'] . ".json", json_encode($userObject));
}

function save_apt($aptObject){

    file_put_contents("db/appointments/". $aptObject['patient_name'] . ".json", json_encode($aptObject));
}

