<?php
  ob_start();
  require_once "../dbconfig/dbconnect.php";
  require_once "../inc/utilities.php";
  require_once "../inc/header_links.php";
  require_once "../components/top_nav.php";
  $page="profile" ;
  if (isset($_REQUEST['key'])) {
  $user_id =convert_uudecode($_REQUEST['key']);
  $query="SELECT * FROM users WHERE user_id='$user_id'";
  $results=$db->get_row($query);
  $complited_query="SELECT count(project_id) as complited, sum(rating) as rating from closed where student_id='$user_id'";
  $complited=$db->get_row($complited_query);
  }else{ 
  header("LOCATION:dashboard"); 

  }
  ob_flush();
  ?>
  <div class="display">
  <div class="display__content">
  <?php require_once "../components/tutor_leftnav.php";
  require_once"../layout/main/header.php";?>
  <div class="notika-email-post-area">

  <div class="row">

  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
  <div class="email-statis-inner notika-shadow">
  <div class="account-header">
  <div class="breadcomb-wp mb-5">

  <div class="breadcomb-ctn">
  <h2>Student Profile</h2>
  </div>
  </div>
  </div>
  <div class="table-responsive">
  <table class="table table-striped table-hover text-center">
  <tr>
  <th>Student Id</th>
  <td><?php echo $results->user_id; ?></td>
  <th>Username</th>
  <td><?php echo $results->username; ?></td>
  <th>Successful Orders</th>
  <td><?php echo $complited->complited ?></td>
  <th>Average Tutor Rating</th>
  <td> <?php if ($complited->complited==0) {
  echo 0;
  }else{
  echo round( $complited->rating/ $complited->complited)."/10";
  } ?> </td>
  </tr>
  </table>
  </div>
  </div>
  </div>
   <?php require_once("./section_rate.php"); ?>
  </div>
 
  </div>
  </div>
  </div>
  <?php
  require_once"../inc/footer_links.php";
  require_once"../layout/main/footer.php";
  ?>
