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
        <input type="email" name="email" placeholder="Email" id="email"
          <?php if (isset($_SESSION['email'])): ?>
          value="<?php echo $_SESSION['email'] ?>"
          <?php endif ?>
          required>
         <input type="password" name="password" placeholder="Password" id="password"<?php if (isset($_SESSION['password'])): ?>
          value="<?php echo $_SESSION['password'] ?>"
          <?php
                  session_destroy();
                 endif ?>
           required>
       <a href="tutor-register.php" class="forgot">have no account? </a>
      
        <input type="hidden" name="user" value="tutor">
        <input type="hidden" name="user_type" value="2">
        <input type="submit" value="LOGIN NOW" name="submit" />
         <a href="tutor-pass-reset.php" class="forgot_" >forgot password?</a>
      </div>
      <div class="shadow"></div>
    </form>

  </div>
</section>