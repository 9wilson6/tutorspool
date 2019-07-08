<?php
ob_start();
require_once "../dbconfig/dbconnect.php";
require_once "../inc/utilities.php";
require_once "../inc/header_links.php";
$page = "profile";
require_once "../components/top_nav.php";
require_once("../layout/main/header.php");
ob_flush();
$error = null;
$success = null;
if (isset($_REQUEST['key'])) {
    $user_id = convert_uudecode($_REQUEST['key']);

} else {
    header("LOCATION:createpost.php");
}
if (isset($_POST['submit'])) {
    $user_id = convert_uudecode($_REQUEST['key']);
    $query = "SELECT * FROM users WHERE user_id='$user_id'";
    $results = $db->get_row($query);
    $password = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $con_pass = $_POST['con_pass'];
    if ($new_pass === $con_pass) {
        if (strlen($password) > 5) {
            if (password_verify($password, $results->password)) {
                $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
                $query = "UPDATE users SET password='$new_pass' WHERE user_id='$user_id'";
                if ($db->query($query)) {
                    $success = "Password updated successfully";
                }
            } else { $error = "Invalid old password";}
        } else {
            $error = "Passwords should be at least 6 characters in length";}
    } else { $error = "password confirmation didn't match new password";}
}
?>
<div class="display">
    <div class="display__content">
        <?php require_once "../components/stud_leftnav.php"?>
          <div class="notika-email-post-area">
      
        <div class="row">
            
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="email-statis-inner notika-shadow">
                       <div class="account-header">
                            <div class="breadcomb-wp mb-5">
                                
                                <div class="breadcomb-ctn">
                                    <h2>CHANGE ACCOUNT PASSWORD</h2>
                                    

                                </div>
                            </div>
                       </div>
<div class="table-responsive">
<table class="table text-center">
<thead>
<tr>
<?php if (isset($error) & !empty($error)): ?>
<td colspan="2" class="text-danger"><?php echo $error; ?></td>
<?php elseif (isset($success) & !empty($success)): ?>
<td colspan="2" class="text-success"> <?php echo $success; ?></td>
<?php endif?>
</tr>
</thead>
<tbody>
<form action="change-pass.php?key=<?php echo urlencode(convert_uuencode($user_id)) ?>" method="POST">
<tr>
<th><label>Old password</label></td>
<td><input type="password" name="old_pass" class="form-control forms2__input" required></td>
</tr>
<tr>
<th><label>New password</label></td>
<td><input type="password" name="new_pass" class="form-control forms2__input" required></td></tr>
<tr><th><label>confirm password</label></td><td><input type="password" name="con_pass" class="form-control forms2__input" required></td>
<input type="hidden" name="user_id" value="<?php echo $user_id ?>">
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" class="btn btn-block btn-primary" name="submit" value="Submit"></td>
</tr>
</form>
</tbody>
</table>
</div>
</div>
</div>
<?php require_once "section_notes.php"?>
</div>

</div>
</div>
</div>
<?php
require_once "../inc/footer_links.php";
?>
<?php require_once("../layout/main/footer.php"); ?>