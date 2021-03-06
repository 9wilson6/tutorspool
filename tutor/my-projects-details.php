<?php
require_once "../inc/header_links.php";
require_once "../inc/utilities.php";
#//////////////////////////////////////////////////////////////////////////////////// -->
require_once"../layout/main/header.php";
require_once "../dbconfig/dbconnect.php";

# //////////////////////////////////////////////////////////////////////////////////// -->
$tutor_id = $_SESSION['user_id'];
if (isset($_REQUEST['pid'])) {
    $project_id = convert_uudecode($_REQUEST['pid']);

} else {
    header("location:dashboard.php");
}

$page = "projects";
require_once "../components/top_nav.php";
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
<h2>Project # <?php echo $project_id . " Details"; ?></h2>
</div>
</div>
</div>
<ul class="d_table_1 mb-5">
<?php $query = "SELECT * FROM closed LEFT JOIN projects ON closed.project_id=projects.project_id WHERE closed.project_id='$project_id' ORDER BY closed.project_id desc";
$results = $db->get_row($query);
if ($db->num_rows < 1) {?>

<div class="card-body">
<div class="headingTertiary text-uppercase">
This project Is no longer Available
</div>
</div>
</div>
<?php } else {?>
<table class="table table-sm table-responsive{-sm|-md|-lg|-xl}">
<thead class="table-light">
<tr>
<th class="text-center">Order Id</th>
<th class="text-center">Date Closed</th>
<th class="text-center">Price($)</th>
<th class="text-center"></th>
</tr>
</thead>
<tbody>
<tr>
<th scope="row" class="text-center mt-5">
<?php echo $results->project_id; ?>
</th>
<td class="text-center mt-5">
<?php echo $results->date_closed ?>
</td>
<td class="text-center mt-5">
<?php echo $results->charges; ?>

</td>
<td class="text-center">



</td>
</tr>

</tbody>
</table>
</ul>

<div class="card  mb-5">
<div class="breadcomb-wp mb-5">

<div class="breadcomb-ctn">
    <h1>Order Info</h1>
</div>
</div>
<div class="card-body d_table_1__c ">
<ul class="d_table_1 d_table_1__b mb-5 mt-3">

<div class="row">
<div class="col-sm-12 col-md-12 col-lg-5">
<table class="table table-sm table-responsive{-sm|-md|-lg|-xl}">
<thead class="table-light ml-5">
<tr>
<th class="text-center">Status</th>
<th class="text-center">Paper Format</th>
<th class="text-center">Acadamic level</th>
</tr>

</thead>
<tbody>
<tr>
<td class="text-center">
<?php $Status = $results->status;
    if ($Status == 0) {
        echo "In Progress";
    } else {
        "Not Available";
    }
    ?>
</td>
<td class="text-center"><?php echo $results->style; ?></td>
<td class="text-center"><?php echo $results->academic_level; ?></td>
</tr>
</tbody>
</table>
</div>
<div class="col-sm-12 col-md-12 col-lg-3">
<table class="table table-sm table-responsive{-sm|-md|-lg|-xl}">
<thead class="table-light">
<tr>
<th class="text-center">Slides</th>
<th class="text-center">Problems</th>
<th class="text-center">Pages</th>

</tr>
</thead>
<tbody>
<tr>
<td class="text-center"><?php echo $results->slides; ?></td>
<td class="text-center"><?php echo $results->problems; ?></td>
<td class="text-center"><?php echo $results->pages; ?></td>

</tr>
</tbody>
</table>
</div>

<div class="col-sm-12 col-md-12 col-lg-4">
<table class="table table-sm table-responsive{-sm|-md|-lg|-xl}">

<thead class="table-light">
<tr>
<th class="text-center">Type of paper</th>
<th class="text-center">Sources</th>
</tr>
</thead>
<tbody>
<tr>

<td class="text-center"><?php echo $results->type_of_paper; ?></td>
<td class="text-center">
<?php $sources = $results->sources;
    if ($sources == 0) {
        echo "At least 1";
    } else {
        echo "{$sources}";
    }
    ?>
</td>
</tr>
</tbody>
</div>

</div>

</table>
</ul>
<div class="instrcution text-left">
<p>
<STRONG>Subject:<br></STRONG>
<?php echo $results->subject; ?></p>
<p>
<STRONG>Topic: <br></STRONG>
<?php echo $results->title; ?>
</p>
<p>
<STRONG>Instructions:<br></STRONG>
<div class="pl-5"><?php echo $results->instructions; ?></div>

</p>



</div>
</div>
<div class="card-footer"></div>
<div class="row">
<div class="col-sm-12 col-md-5 col-lg-5">
<div class="card">
<div class="breadcomb-wp mb-5">

<div class="breadcomb-ctn">
    <h1>Files</h1>
</div>
</div>
<div class="card-body files">
<p><?php filesDownload($results->student_id, $results->project_id)?></p>
<p><?php resultsDownload($results->student_id, $results->project_id)?></p>
</div>
</div>

</div>
<div class="col-sm-12 col-md-7 col-lg-7">
<div class="card">
<div class="breadcomb-ctn">
<h2>Messages</h2>
</div>
<div class="card-body messages">
<div class="messages__view " id="messageBox">
<script>
let project_id="<?php echo $results->project_id; ?>";
let user_type="<?php echo $_SESSION['user_type']; ?>";
</script>
</div>

<p class="messages__form" >
Above are the messages for this order
</p>

</div>
</div>
</div>
</div>
</div>
<?php }?>

</div>
</div>

<?php require_once "./section_rate.php";?>
</div>
</div>
</div>
</div>
</div>
<?php
require_once "../inc/footer_links.php"; ?>
<script src="../js/chat.js"></script>
<script src="../js/files.js"></script>
<?php
require_once"../layout/main/footer.php";
?>

