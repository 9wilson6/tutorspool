<?php
require_once "../inc/header_links.php";
$page = "finance";
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
<h2>Payments History</h2>
</div>
</div>
</div>
<?php $tutor_id = $_SESSION['user_id'];
$query = "SELECT * FROM closed LEFT JOIN projects on closed.project_id=projects.project_id WHERE closed.tutor_id='$tutor_id' and projects.status=5 order by closed.project_id desc LIMIT 100";
$results = $db->get_results($query);
?>
<?php if ($results > 0): ?>
	<div class="table-responsive" style="overflow-y: hidden;">
<table class="table table-bordered">
<thead>
<tr>
<th>Project id</th>
<th>price</th>
<th >Rating</th>
<th>Complition Date</th>
<th>Payment Date</th>
</tr>
</thead>
<tbody>
<?php foreach ($results as $result): ?>
<tr>
<td><a
href="my-projects-details.php?pid=<?php echo urlencode(convert_uuencode($result->project_id)); ?>"><?php echo $result->project_id; ?><i
class="fas fa-external-link-alt icon-r ml-4"></i></a></td>
<td><?php echo $result->charges; ?></td>
<td><?php echo $result->rating; ?></td>
<td><?php echo $result->date_closed; ?></td>
<td><?php echo $result->DATE_PAID; ?></td>
</tr>
<?php endforeach?>
</tbody>
</table>
</div>
<?php else: ?>
<h1 class="headingTertiary">
Nothing To show yet
</h1>
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
