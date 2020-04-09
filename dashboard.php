<?php
include_once("lib/header.php");
if(!isset($_SESSION['loggedIn'])){
    header("Location: login.php");
   
}else{
$email =$_SESSION['email'];

$allLogin = scandir("db/userlogin/");
$countAllLogin = count($allLogin);

for($counter = 0; $counter < $countAllLogin; $counter++){
    $currentLogin = $allLogin[$counter];

    if($currentLogin == $email . ".txt"){

        $userLogin = file_get_contents("db/userlogin/". $currentLogin);
        // die();
    }
//
// $allUsers = scandir("db/userlogin/");
// $loginDetails = file_get_contents("db/userlogin/". $currentUser);
// file_put_contents("db/userlogin/" . $_SESSION['email'] . ".txt", $logindate);
}
}
?>
<div class="container">
    <div class="col-md-4"> </div>
    <div class="col-md-4">
        <div class="card">
                <div class="card-header">
                    <h3> Dashboard </h3>
                </div>
                <div class="card-body">
                        <p> Welcome, <?php echo $_SESSION['fullname']?>, You are logged in as a <?php
                        echo $_SESSION['role']?>, and your ID is <?php echo $_SESSION['loggedIn']?> </p>
                        <p> Department: <?php echo $_SESSION['department']?></p>
                        <p> Date of Registration: <?php echo $_SESSION['date']?></p>
                        <p> Last Login: <?php echo $userLogin ?></p>
                        <?php
                        if($_SESSION['role']=="Super Admin"){
                        ?>
                        <a href="superadmin.php">Admin Page</a>
                        <?php
                            }
                        ?>

                </div>
        </div> 
        </div>           
    <div class="col-md-4">
       
    </div>
</div>

<?php
include_once("lib/footer.php");
?>