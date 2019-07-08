<?php
require_once "../inc/header_links.php";
$page = "feedback";
require_once "../components/top_nav.php";
require_once "../dbconfig/dbconnect.php";
require_once"../layout/main/header.php";
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
<h2>Complited orders feedback</h2>
</div>
</div>
</div>
<?php $tutor_id = $_SESSION['user_id'];
$query = "SELECT * FROM closed WHERE tutor_id='$tutor_id' order by project_id desc LIMIT 100";
$results = $db->get_results($query);
?>
<?php if ($results > 0): ?>
	<div class="table-responsive" style="overflow-y: hidden;">
<table class="table table-bordered">
<thead>
<tr>
<th>Project id</th>
<th class="wide">Comment</th>
<th >Rating</th>
<th>Date closed</th>
</tr>
</thead>
<tbody>
<?php foreach ($results as $result): ?>
<tr>
<td><a
href="my-projects-details.php?pid=<?php echo urlencode(convert_uuencode($result->project_id)); ?>"><?php echo $result->project_id; ?><i
class="fas fa-external-link-alt icon-r ml-4"></i></a></td>
<td class="wide"><?php echo $result->comment; ?></td>
<td><?php echo $result->rating; ?></td>
<td><?php echo $result->date_closed; ?></td>
</tr>
<?php endforeach?>
</tbody>
</table>
</div>
<?php else: ?>
<div class="headingTertiary">
Nothing To show yet
</div>
<?php endif?>
</div>
</div>
<?php require_once "./section_rate.php";?>
</div>
</div>
</div>
</div>
<?php
require_once "../inc/footer_links.php";
require_once"../layout/main/footer.php";
?>
