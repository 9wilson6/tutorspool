<?php
ob_start();
$project_id = convert_uudecode($_REQUEST['pid']);
require_once "../dbconfig/dbconnect.php";
require_once "../inc/utilities.php";
require_once("../layout/main/header.php");
require_once "../inc/header_links.php";
require_once "../components/top_nav.php";
$page = "progress";

ob_flush();
if (isset($_POST['submit'])) {
require_once 'stud_functions.php';
filesUpload($_SESSION['user_id'], $_POST['project_id']);
}
$query = ("SELECT * FROM on_progress left join projects on on_progress.project_id=projects.project_id WHERE on_progress.project_id='$project_id'");
$results = $db->get_row($query);
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

<div class="breadcomb-ctn mt-5">
<h2>Order Id <?php echo $project_id; ?></h2>


</div>
</div>
</div>
<?php
if ($db->num_rows < 1) {
echo "Order is no longer available";
} else {?>
<div class="table-responsive">
<table class="table  table-striped table-hover table-bordered">
<tbody>
<tr>
<th scope="row">Subject</th>
<td>
<?php echo $results->subject ?>
</td>
<th scope="row">Academic Level</th>
<td>
<?php echo $results->academic_level; ?>
</td>
</tr>
<tr>
<th scope="row">Style</th>
<td>
<?php echo $results->style; ?>
</td>
<th scope="row">Type Of Paper</th>
<td>
<?php echo $results->type_of_paper ?>
</td>
</tr>
<tr>
<th scope="row">Pages</th>
<td>
<?php echo $results->subject ?>
</td>
<th scope="row">Slides</th>
<td>
<?php echo $results->slides; ?>
</td>
</tr>
<tr>
<th scope="row">Problems</th>
<td>
<?php echo $results->problems; ?>
</td>
<th scope="row">Sources</th>
<td>
<?php echo $results->sources ?>
</td>
</tr>
<tr>
<th scope="row">Cost</th>
<td>
<?php echo $results->cost; ?>
</td>
<th scope="row">Deadline</th>
<td>
<?php $time = getDateTimeDiff($date_global, $results->deadline);
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
<tr>
<th>Title</th>
<td colspan="3">
<?php echo $results->title; ?>
</td>
</tr>
<tr>
<th>Instructions</th>
<td colspan="3" class="pl-5">
<?php echo $results->instructions; ?>
</td>
</tr>
</tbody>
</table>
</div>
<div class="row">
<div class="col-sm-12 col-md-6 col-lg-6">
<div class="card">
<div class="breadcomb-wp mb-5">
<div class="breadcomb-ctn mt-5">
<h2 >Files</h2>
</div>
</div>
<div class="card-body files" id="files">
<p class="assign">
<?php filesDownload($results->student_id, $results->project_id)?>
</p>
<hr>
<h3><STRONG>Results</STRONG></h3>
<hr>
<p class="results">
<?php resultsDownload($results->student_id, $results->project_id)?>
</p>
</div>
</div>
</div>
<div class="col-sm-12 col-md-6 col-lg-6">
<div class="card">
<div class="breadcomb-wp mb-5">
<div class="breadcomb-ctn">
<h2>Messages</h2>
</div>
</div>
<div class="card-body messages">
<div class="messages__view " id="messageBox">
<script>
let project_id="<?php echo $results->project_id; ?>";
let user_type="<?php echo $_SESSION['user_type'] ?>";
</script>
</div>
<form action="" method="POST" id="chat_form">
<p class="messages__form" >
<textarea name="message" placeholder="type a message here......." required></textarea>
</p>
<input type="hidden" name="project_id" value="<?php echo $results->project_id ?>" >
<input type="hidden" name="user_type" value="<?php echo $_SESSION['user_type'] ?>">
<input type="hidden" name="student_id" value="<?php echo $results->student_id ?>">
<input type="hidden" name="tutor_id" value="<?php echo $results->tutor_id ?>">
<p class="send">
<input type="submit" value="Send" id="submit" class="btn btn-sm btn-info">
</p>
</form>                                   </div>
</div>
</div>
</div>
<div class="card">
<div class="breadcomb-ctn mt-5">
<h2>Upload more files here</h2>
</div>

<div class="card-body">
<form action="" enctype="multipart/form-data" method="POST" class="files_edit">

<div class="row">
<div class="col-0 col-sm-0 col-md-3 my-4"><label for="files" class="forms2__label">Add
More Files &rarr;</label></div>
<div class="col-12 col-sm-12 col-md-6 my-4"><input type="file" class="files_edit__input"
name="file[]" class="form-control-file forms2__files" id="files"
required multiple />
<input type="hidden" name="project_id" value="<?php echo $project_id ?>">
</div>
<div class="col-12 col-sm-12 col-md-3 my-4">
	<button type="submit" name="submit"  class="btn btn-submit btn-block ">Upload Files</button>
</div>
</div>

</form>
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

<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<?php
require_once "../inc/footer_links.php";

?>
<script src="../js/chat.js"></script>
<script src="../js/files.js"></script>
<?php require_once("../layout/main/footer.php"); ?>
