<?php
include_once("lib/header.php");
// if(!isset($_GET['token']) && !isset($_SESSION['token'])){
//     $_SESSION['error']= "You are not authorizeed to view that page";
//     header("Location: login.php");
// }
?>
    <h3> Reset Password</h3>
    <p> Reset password associated to your account.  </p>

    <form method="POST" action="processreset.php">
    <?php
    if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
        echo "<span style= 'color:red' >" . $_SESSION['error'] . "</span>";
        session_destroy();
    }
    ?>
    <input 
    <?php
    // if(!isset($_GET['token']) && !isset($_SESSION['token'])){
    //     echo "value='" . $_SESSION['token'] ."'";
    // }else{
    //     echo "value='" . $_GET['token'] ."'";
    // }

    ?>
    type="hidden" name="token" value="<?php echo $_GET['token'] ?>">
    <p>
        <label> Email </label> <br>
        <input type="text" name="email" placeholder="Email" required>
    </p>
    <p>
        <label>Enter New Password </label> <br>
        <input type="password" name="password" placeholder="Password">
    </p>
    <p>
    <button type="submit"> Reset Password </button>
    </p>
    </form>

<?php
include_once("lib/footer.php");
?>