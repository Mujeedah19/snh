<?php
include_once("lib/header.php");
if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){

   if($_SESSION['role']=="Super Admin"){
        // echo"Super Admin";
?>
<div class="container">
    <div class="row col-6">
       <h3> Register </h3>
    </div>
    <div class="row col-6">
        <p> <strong> Welcome, You can register a new user </strong> </p>
    </div>
    <div class="row col-6">            
        <p> All fields are required </p>
    </div>
    <div class="row col-6">            


            <form method="POST" action="processregister.php">
            <?php
            if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
                echo "<span style= 'color:red' >" . $_SESSION['error'] . "</span>";
                session_destroy();
            }
           
        
        
            
            ?>
            <p>
                <label> first Name </label> <br>
                <input
                <?php
                if(isset($_SESSION['first_name'])){
                    echo "value=" . $_SESSION['first_name']; 
                }
                ?>
                type="text" class="form-control" name="first_name" placeholder="First Name" required>
            </p>
            <p>
                <label> Last Name </label> <br>
                <input
                <?php
                if(isset($_SESSION['last_name'])){
                    echo "value=" . $_SESSION['last_name']; 
                }
                ?>
                type="text" class="form-control" name="last_name" placeholder="Last Name" required>
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
                <label> Gender </label> <br>
                <select class="form-control" name="gender" required>
                    <option value=""> Select One </option>
                    <option
                    <?php
                    if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female'){
                        echo "selected"; 
                    }
                    ?>
                    > Female </option>
                    <option
                    <?php
                    if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male'){
                        echo "selected"; 
                    }
                    ?>
                    > Male </option>

                </select>
            </p>
            <p>
                <label> Designation </label> <br>
                <select class="form-control" name="designation" required>
                    <option value=""> Select One </option>
                    <option
                    <?php
                    if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Medical Team (MT)'){
                        echo "selected"; 
                    }
                    ?>
                    > Medical Team (MT) </option>
                    <option
                    <?php
                    if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Patient'){
                        echo "selected"; 
                    }
                    ?>
                    > Patient </option>
                    <option
                    <?php
                    if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Super Admin'){
                        echo "selected"; 
                    }
                    ?>
                    > Super Admin </option>

                </select>
            </p>
            <p>
                <label class="label" for="department"> Department </label> <br>
                <select class="form-control" name="department" required>
                    <option value=""> Select One </option>
                    <option> Xray </option>
                    <option> Neurology </option>
                    <option> Gynaecology  </option>
                    </select>
            </p>
            <p>
                <label> Date of Registration </label> <br>
                <input type="date" class="form-control" name="date" >
            </p>
            <p>
                <label> Password </label> <br>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </p>
            <p>
            <button class="btn btn-sm btn-success" type="submit" > Register </button>
            </p>
            <!-- <p>
                <a href="forgot.php"> Forgot Password </a> <br>
                <a href="login.php"> Already have an account? Login </a>
            </p> -->

            </form>
    </div>
</div>

<?php

        
        //
   }else{
       echo"Patient or Medic";
   }

}else{
    header("Location: login.php");

}
?>