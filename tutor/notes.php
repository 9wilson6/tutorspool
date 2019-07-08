<?php
require_once "../inc/header_links.php";
$page = "notes";
require_once "../components/top_nav.php";
require_once "../dbconfig/dbconnect.php";
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
<h2>LAtest Events</h2>
</div>
</div>
</div>

<?php
$tutor_id = $_SESSION['user_id'];
$query = "SELECT * FROM notifications where user_id='$tutor_id' ORDER BY note_num desc limit 300";
$results = $db->get_results($query);
if ($db->num_rows > 0) {?>
<?php foreach ($results as $result): ?>
<div class="alert alert-success" role="alert">
<?php echo $result->note; ?>
</div>
<?php endforeach;?>
<?php } else {?>
<div class="text-dark">No Activities</div>
<?php }
?>
</div>
</div>

</div>
</div>
</div>
</div>
<?php
require_once "../inc/footer_links.php";
require_once"../layout/main/footer.php";
?>
