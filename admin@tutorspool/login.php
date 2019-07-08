<?php 
require_once"../inc/header_links.php";
require_once("../dbconfig/dbconnect.php");
require_once"../inc/global_functions.php";
$error="";
Login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
</head>
<body>
<section class="fom">
 
  <div class="main">
    <form action="" method="POST" id="form-box">
 <center><div class="heading">Admin Login</div></center>
      <?php if (!empty($error)) { ?>

      <div class="text-danger text-uppercase  text-center"><strong><?php  echo $error; ?></strong></div>
      <?php  } ?>
      <?php if (!empty($success)) { ?>

      <div class="text-success text-uppercase text-center"><strong><?php  echo $success; ?></strong></div>
      <?php  } ?>
      <div class="login">
        <a href="index.php" class="forgot">home</a>
       <input type="email" name="email" id="email"  placeholder="E-mail" required>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <input type="hidden" name="user" value="admin">
       <input type="hidden" name="user_type" value="3">
        <input type="submit" value="LOGIN NOW" name="submit" />
      
      </div>
      <div class="shadow"></div>
    </form>

  </div>
</section>
</body>
</html>