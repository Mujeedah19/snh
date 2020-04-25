<?php
include_once("lib/header.php");
require_once('functions/user.php');
require_once('functions/redirect.php');
require_once("functions/alert.php");






if(is_user_loggedIn()){

    if($_SESSION['role']=="Patient"){

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
                        <?php
                        if($_SESSION['role']=="Super Admin"){
                        ?>
                        <a href="superadmin.php">Admin Page</a>
                        <?php
                            }
                        ?>

                </div>
                <div class="card-footer">
                        <a class="btn btn-sm btn-outline-secondary" href="paybill.php">Pay Bill</a>
                        <a class="btn btn-sm btn-outline-secondary" href="bookapt.php">Book Appointment</a>
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