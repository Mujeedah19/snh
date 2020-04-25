<?php
require_once("lib/header.php");
require_once("functions/alert.php");
require_once("functions/user.php");
require_once("functions/redirect.php");
// require_once("db/redirect.php");


if(is_user_loggedIn() && $_SESSION['role'] == "Medical Team (MT)"){

?>

<div class="container">

<h3 class="text-center">Appointment List</h3><br>
<?php 
$appointmentList = '';
$allApt = scandir("db/appointments/");
$countAllApt = count($allApt);

for ($counter = 2; $counter < $countAllApt; $counter++) {
    $aptObject = json_decode(file_get_contents('db/appointments/' . $allApt[$counter]));
    $appointmentList .= "
            <tbody>
                <tr>
                    <th scope='row'>$aptObject->id</th>
                    <td>$aptObject->patient_name</td>
                    <td>$aptObject->appointment_nature</td>
                    <td>$aptObject->appointment_date</td>
                    <td>$aptObject->appointment_time</td>
                    <td>$aptObject->department</td>
                    <td>$aptObject->complaint</td>
                </tr>
            </tbody>
        ";
} ?>

<?php if(strlen($appointmentList) > 0 && $_SESSION['department'] == $aptObject->department) {
    ?>
    <table class='table table-bordered'>
        <thead class='thead-dark'>
            <tr>
            <th scope='col'>Patient ID </th>
            <th scope='col'>Patient Name</th>
            <th scope='col'>Nature of Appointment</th>
            <th scope='col'>Date of Appointment</th>
            <th scope='col'>Time of Appointment</th>
            <th scope='col'>Department</th>
            <th scope='col'>Complaint</th>
            </tr>
        </thead>
        <?php echo $appointmentList; ?>
    </table>
<?php 
        // }
    } else { ?>
    <p>You have no pending appointments</p>
<?php } ?>


















</div>

<?php

}else{
    redirect_to("login.php");

}

?>