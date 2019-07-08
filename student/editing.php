<?php
ob_start();
require_once "../inc/header_links.php";
$page = "revision";
require_once "../components/top_nav.php";
require_once "../inc/utilities.php";
require_once "../inc/header_links.php";
require_once "../dbconfig/dbconnect.php";
require_once("../layout/main/header.php");
ob_flush();
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM revisions LEFT JOIN projects ON revisions.project_id=projects.project_id WHERE revisions.student_id='$user_id'";
$results = $db->get_results($query);
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
                                    <h2>Homeworks being edited</h2>
                                    

                                </div>
                            </div>
                       </div>
<?php if ($db->num_rows < 1) {?>
<div class="headingSecondary text-light text-dark">There is nothing to show Yet</div>
<?php } else {?>
<div class="card-body">
	<div class="table-responsive" style="overflow-y: hidden;">
<table class="table table-bordered">
<thead>
<tr>
<th>Order id</th>
<th class="wide">Topic</th>
<th class="smalll">Price($)</th>
<th class="medium">Deadline</th>
</tr>
</thead>
<tbody>
<?php foreach ($results as $result): ?>
<tr>
<td class="smalll"><a href="editing-details.php?pid=<?php echo urlencode(convert_uuencode($result->project_id)); ?>"><?php echo $result->project_id; ?><i
class="fas fa-external-link-alt icon-r ml-4"></i></a></td>
<td><?php echo $result->title; ?></td>
<td><?php echo $result->cost; ?></td>
<td class="bg-light">
<?php $time = getDateTimeDiff($date_global, $result->revision_deadline);
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
</tr>
<?php endforeach?>
</tbody>
</table>
</div>
</div>
<?php }?>
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

