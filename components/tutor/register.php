<section class="fom">
  <div class="main">
    <form action="" method="POST" id="form-box">

      <?php if (!empty($error)) { ?>

      <div class="text-danger text-uppercase  text-center"><strong><?php  echo $error; ?></strong></div>
      <?php  } ?>
      <?php if (!empty($success)) { ?>

      <div class="text-success text-uppercase text-center"><strong><?php  echo $success; ?></strong></div>
      <?php  } ?>
      <div class="login">
        <a href="index.php" class="forgot">home</a>
        <input type="text" name="username" id="username" placeholder="Username" required />
        <input type="email" name="email" id="email" placeholder="Email" required />
        <input type="password" name="password" id="password" placeholder="Password" required />
        <input type="password" name="C_password" id="C_password" placeholder="Retype password" required />
        <a href="tutor-login.php" class="forgot">Already registered?</a>
        <input type="hidden" name="user" value="tutor">
        <input type="hidden" name="user_type" value="2">
        <input type="submit" value="REGISTER NOW" name="submit" />
      </div>
      <div class="shadow"></div>
    </form>

  </div>
</section>