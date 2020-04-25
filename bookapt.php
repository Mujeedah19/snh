<?php
require_once("lib/header.php");
require_once("functions/alert.php");
require_once("functions/user.php");
require_once("functions/redirect.php");

if(is_user_loggedIn() && $_SESSION['role'] == "Patient"){

     $email = $_SESSION['email'] ;

?>
<div class="container">
    <div class="row p-5">
        <div class="card">
            <div class="card-header">
                <h5> BOOK APPOINTMENT </h5>
                <?php print_alert(); ?>
            </div>
            <div class="card-body">
                <form action="processbookapt.php" method="POST">
                    <div class="form-group">
                        <input type="date" name="aptdate" class="form-control" >
                    </div>
                    <div class="form-group">
                        <input type="time" name="apttime" class="form-control" >
                    </div>
                    <div class="form-group">
                        <input type="text" name="nature" class="form-control" placeholder="Nature of Appointment"  >
                    </div>
                    <div class="form-group">
                    <select class="form-control" name="department" required>
                    <option value=""> Department </option>
                    <option> Xray </option>
                    <option> Neurology </option>
                    <option> Gynaecology  </option>
                    </select>
                    </div>
                    <div class="form-group">
                        <textarea name="complaint" class="form-control" placeholder="Initial Complaint..." cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-sm" name="bookapt_submit"> Book Appointment </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
}else{
    redirect_to("index.php");

}
