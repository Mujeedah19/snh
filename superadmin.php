<?php
include_once("lib/header.php");
require_once('functions/user.php');
require_once('functions/redirect.php');
require_once("functions/alert.php");






if(is_user_loggedIn()){

    if($_SESSION['role']=="Super Admin"){

    ?>
        

    <div class="container">
        <div class="row">
            <div class="card mt-5">
                <div class="card-header">
                    <h3> User Dashboard </h3>
                    <?php print_alert(); ?>
                </div>
                <div class="card-body">
                        <p> Welcome, <?php echo $_SESSION['fullname']?>, You are logged in as a <?php
                        echo $_SESSION['role']?>, and your ID is <?php echo $_SESSION['loggedIn']?> </p>
                        <p> Department: <?php echo $_SESSION['department']?></p>
                        <p> Date of Registration: <?php echo $_SESSION['date']?></p>
                        <p> Last Login: <?php if(isset($_SESSION['last_login'])){
                            echo $_SESSION['last_login'];
                        }else{
                            echo "First time here";
                        } ?></p>
                      

                </div>
                <div class="card-footer">
                        <a class="btn btn-sm btn-outline-secondary" href="create.php">Create New Users</a>
                        <a class="btn btn-sm btn-outline-secondary" href="viewpatients.php">View All Patients</a>
                        <a class="btn btn-sm btn-outline-secondary" href="viewstaffs.php">View All Staffs</a>
                </div>
            </div> 
        </div>
    </div>


    <?php
    }else{
        redirect_to("login.php");
    }

}else{
    redirect_to("login.php");
}
?>



