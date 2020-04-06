<?php
include_once("lib/header.php");
?>
    <h3> Forgot Password</h3>
    <p> Provide the Email associated to your account </p>

    <form method="POST" action="processforgot.php">
    <?php
    if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
        echo "<span style= 'color:red' >" . $_SESSION['error'] . "</span>";
        session_destroy();
    }
    ?>

    <p>
        <label> Email </label> <br>
        <input
        <?php
        if(isset($_SESSION['email'])){
            echo "value=" . $_SESSION['email']; 
        }
        ?>
        type="text" name="email" placeholder="Email" required>
    </p>
    <p>
    <button type="submit"> Send Reset Code </button>
    </p>
    </form>

<?php
include_once("lib/footer.php");
?>