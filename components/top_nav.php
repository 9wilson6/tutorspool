<?php 
ob_start();
require_once"../inc/sessios.php";
session_gen ();
ob_flush();
?>

<div class="top-nav-container">
  <section class="dashboard_nav">
  <nav class="navbar navbar-expand-lg" >
    <a class="navbar-brand" href="#"><span class="navbar-brand__start"><img src="https://img.icons8.com/dusk/64/000000/text.png" alt="" class="navbar__logo"></span>utorspool</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle nav-link--excemption" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome, 
            <?php $name= explode(" ", $_SESSION['username']);
            echo ucfirst($name[0]);
            if (isset($_SESSION['user_id'])) {
              $user_id=$_SESSION['user_id'];
            }
            ?><i class="far fa-user-circle icon"></i></a>
            <div class="dropdown-menu navbar__toggle" aria-labelledby="navbarDropdown">
              <a class="dropdown-item"  href="my-profile.php?key=<?php echo urlencode(convert_uuencode($user_id)) ?>"><i class="fas fa-user icon-r"></i>Profile</a>
              <a class="dropdown-item "  href="change-pass.php?key=<?php echo urlencode(convert_uuencode($user_id)) ?>"><i class="fas fa-sliders-h icon-r"></i>Change Password</a>
              <a class="dropdown-item " href="../logout.php"><i class="fas fa-sign-out-alt icon-r"></i>Logout</a>
            </div>
          </li>
        </ul>
      </div>

    </nav>
  </section>
</div>