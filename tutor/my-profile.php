<?php
ob_start();
require_once "../dbconfig/dbconnect.php";
require_once "../inc/utilities.php";
require_once "../inc/header_links.php";
require_once "../components/top_nav.php";
 require_once"../layout/main/header.php";
$page="profile" ;
if (isset($_REQUEST['key'])) {
  $user_id =convert_uudecode($_REQUEST['key']);
  $query="SELECT * FROM users WHERE user_id='$user_id'";
  $results=$db->get_row($query); }else{ header("LOCATION:dashboard"); }
  ?>
      <div class="display">
<div class="display__content">
<?php require_once "../components/tutor_leftnav.php";?>
<div class="notika-email-post-area">

<div class="row">
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
<div class="email-statis-inner notika-shadow">
<div class="account-header">
<div class="breadcomb-wp mb-5">

<div class="breadcomb-ctn">
<h2>Profile</h2>
</div>
</div>
</div>
 <div class="table-responsive">
                <table class="table table-striped table-hover text-center">
                  <thead>
                    <tr>
                      <th>User Id</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Date Created</th>
                    </tr>

                    <tr></tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td><?php echo $results->user_id; ?></td>
                      <td><?php echo $results->username; ?></td>
                      <td><?php echo $results->email; ?></td>
                      <td><?php echo $results->created_on; ?></td>
                    </tr>
                    <tr><th>About me</th> <td colspan="3"><?php echo $results->about_me; ?></td></tr>
                  </tbody>
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
