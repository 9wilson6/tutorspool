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
        <input type="email" name="email" id="email" placeholder="Email" required />
        <a href="tutor-login.php" class="forgot">Login</a>
        <input type="hidden" name="user" value="student">
        <input type="hidden" name="user_type" value="2">
        <input type="submit" value="RESET NOW" name="submit" />
      </div>
      <div class="shadow"></div>
    </form>

  </div>
</section>