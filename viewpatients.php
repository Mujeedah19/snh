<?php
require_once("lib/header.php");
require_once("functions/alert.php");
require_once("functions/user.php");
require_once("functions/redirect.php");


if(is_user_loggedIn() && $_SESSION['role'] == "Super Admin"){

?>

<div class="container">

<h3 class="text-center">All Patients</h3><br>
<?php 
$patientList = '';
$allUsers = scandir("db/users/");
$countAllUsers = count($allUsers);

for ($counter = 2; $counter < $countAllUsers; $counter++) {
    $userObject = json_decode(file_get_contents('db/users/' . $allUsers[$counter]));
    if($userObject->designation == "Patient"){
    $patientList .= "
            <tbody>
                <tr>
                    <th scope='row'>$userObject->id</th>
                    <td>$userObject->last_name $userObject->first_name </td>
                    <td>$userObject->email</td>
                    <td>$userObject->gender</td>
                    <td>$userObject->date</td>
                    <td>$userObject->department</td>
                </tr>
            </tbody>
        ";
    }
} ?>

<?php if(strlen($patientList) > 0) {
    ?>
    <table class='table table-bordered'>
        <thead class='thead-dark'>
            <tr>
            <th scope='col'>Patient ID </th>
            <th scope='col'>Patient Name</th>
            <th scope='col'>Email Address</th>
            <th scope='col'>Gender</th>
            <th scope='col'>Date of Registration  </th>
            <th scope='col'>Department</th>
            </tr>
        </thead>
        <?php echo $patientList; ?>
    </table>
<?php 
    } else { ?>
    <p>No registered patients</p>
<?php } ?>


















</div>

<?php

}else{
    redirect_to("login.php");

}

?>







