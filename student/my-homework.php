<?php ob_start();?>
<meta http-equiv="refresh" content="30000">
<?php
require_once "../dbconfig/dbconnect.php";
require_once "../inc/utilities.php";
require_once "../inc/header_links.php";
$page = "my-homework";
$student_id = $_SESSION['user_id'];
$query = "SELECT * FROM projects WHERE student_id='$student_id' AND status=0 order by project_id desc";
$results = $db->get_results($query);

require_once "../components/top_nav.php";
require_once("../layout/main/header.php");
ob_flush();
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
<h2>Your Assignments</h2>
</div>
</div>
</div>


<div class="card-body">
<?php if ($db->num_rows <= 0): ?>
<div class="headingTertiary">Nothing to Show Yet</div>
<?php elseif ($db->num_rows > 0): ?>
<div class="table-responsive" style="overflow-y: hidden;">
<table class="table table-bordered">
<thead>
<tr>
<th>id</th>
<th>Topic</th>
<th>Budget</th>
<th>Deadline</th>
<th>bids</th>
</tr>
</thead>
<tbody>
<?php foreach ($results as $result) {?>
<tr>
<td class="smalll"><a
href="my-homework-details.php?id=<?php echo urlencode(convert_uuencode($result->project_id)); ?>">
<?php echo $result->project_id . "<i class='fas fa-external-link-alt icon-r ml-4'></i>"; ?></a>
</td>
<td class="wide">
<?php echo (strlen($result->title) > 35) ? substr($result->title, 0, 35) . '...' : $result->title; ?>
</td>
<td>
<?php echo $result->budget; ?>
</td>
<td>
<?php $time = getDateTimeDiff($date_global, $result->deadline);
$period = explode(" ", $time);?>
<?php if ($period[1] == "days"): ?>
<span class="text-dark">
<?php echo "{$time}"; ?></span>
<?php elseif ($period[1] == "day"): ?>
<span class="text-success">
<?php echo "{$time}"; ?></span>
<?php elseif ($period[1] == "hours" || $period[1] == "hour"): ?>
<span class="text-warning">
<?php echo "{$time}"; ?></span>
<?php elseif ($period[1] == "mins" || $period[1] == "min"): ?>
<span class="text-danger">
<?php echo "{$time}"; ?></span>
<?php elseif ($period[1] == "secs" || $period[1] == "sec"): ?>
<span class="text-danger">
<?php echo "{$time}"; ?></span>
<?php else: ?>
<span class="text-danger">
<?php echo "{$time}"; ?></span>
<?php endif?>
</td>
<td class="text-warning">
<?php echo $result->bids ?>
</td>
</tr>
<?php }?>
</tbody>
</table>
</div>
<?php endif?>
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
require_once"../layout/main/footer.php";
?>