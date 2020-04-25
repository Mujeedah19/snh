<?php
require_once("lib/header.php");
require_once("functions/alert.php");
require_once("functions/user.php");
require_once("functions/redirect.php");


if(is_user_loggedIn() && $_SESSION['role'] == "Super Admin"){

?>

<div class="container">

<h3 class="text-center">All Staffs</h3><br>
<?php 
$staffList = '';
$allUsers = scandir("db/users/");
$countAllUsers = count($allUsers);

for ($counter = 2; $counter < $countAllUsers; $counter++) {
    $userObject = json_decode(file_get_contents('db/users/' . $allUsers[$counter]));
    if($userObject->designation == "Medical Team (MT)"){
    $staffList .= "
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

<?php if(strlen($staffList) > 0) {
    ?>
    <table class='table table-bordered'>
        <thead class='thead-dark'>
            <tr>
            <th scope='col'>Staff ID </th>
            <th scope='col'>Staff Name</th>
            <th scope='col'>Email Address</th>
            <th scope='col'>Gender</th>
            <th scope='col'>Date of Registration  </th>
            <th scope='col'>Department</th>
            </tr>
        </thead>
        <?php echo $staffList; ?>
    </table>
<?php 
    } else { ?>
    <p>No registered Staff</p>
<?php } ?>


















</div>

<?php

}else{
    redirect_to("login.php");

}

?>







