
<?php
include_once("lib/header.php");


if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    header("Location: dashboard.php");
}
?>
<div class="container">
    <div class="row col-6">
    <h3> Login </h3>
    </div>
    <div class="row col-6">
    <p>
    <?php
        if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
            echo "<span style= 'color:green' >" . $_SESSION['message'] . "</span>";
            session_destroy();
        }
    ?>
    </p>
    <form method="POST" action="processlogin.php">
    
    <p>
        <?php
            if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
                echo "<span style= 'color:red' >" . $_SESSION['error'] . "</span>";
                session_destroy();
            }
        ?>
    </p>
    <p>
        <label> Email </label> <br>
        <input
            <?php
            if(isset($_SESSION['email'])){
                echo "value=" . $_SESSION['email']; 
            }
            ?>
        type="text" class="form-control" name="email" placeholder="Email" required>
    </p>
    <p>
        <label> Password </label> <br>
        <input type="password" class="form-control" name="password" placeholder="Password">
    </p>
    <p>
        <button class="btn btn-sm btn-primary"type="submit"> Login </button>
    </p>
    <p>
        <a href="forgot.php"> Forgot Password </a> <br>
        <a href="register.php"> Don't have an account? Register </a>
    </p>
    
    </form>
</div>
</div>
<?php
include_once("lib/footer.php");
?>
