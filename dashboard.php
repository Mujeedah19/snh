<?php
include_once("lib/header.php");
require_once("functions/user.php");
require_once("functions/redirect.php");


if(!isset($_SESSION['loggedIn'])){
    header("Location: login.php");

}else{
    if($userObject->designation == "Super Admin"){
    redirect_to("superadmin.php");
    }else if($userObject->designation == "Patient"){
    redirect_to("patient.php");
    }else{
    redirect_to("medicalteam.php");

    }
}




?>


<?php
include_once("lib/footer.php");
?>