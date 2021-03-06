<?php
ob_start();
require_once "../dbconfig/dbconnect.php";
require_once "../inc/utilities.php";
require_once "../inc/header_links.php";
$page = "profile";
require_once "../components/top_nav.php";
require_once("../layout/main/header.php");
if (isset($_REQUEST['key'])) {
    $user_id = convert_uudecode($_REQUEST['key']);
    $query = "SELECT * FROM users WHERE user_id='$user_id'";
    $results = $db->get_row($query);
} else {
    header("LOCATION:createpost.php");
}
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
                                    <h2>Tutor Profile</h2>
                                    

                                </div>
                            </div>
                       </div>
<div class="table-responsive">
<table class="table table-striped table-hover text-center">
<tr>
	<th>Username</th>
	<td><?php echo $results->username; ?></td>
	<th>Orders Complited</th>
	<td>
		<?php
		 $orders_complited_query="SELECT count(project_id) as complited, sum(rating) as rate FROM `closed` WHERE tutor_id='$user_id'";
		 $orders_complited_results=$db->get_row($orders_complited_query);
		echo $orders_complited_results->complited;
		 ?>
		
	</td>
	<th>Avarage rating</th>
	<td><?php if ($orders_complited_results->complited==0) {
		echo 0;
	}else{
		echo round($orders_complited_results->rate/$orders_complited_results->complited)."/10";
	} ?></td>

</tr>
<tr>
	<th>About Tutor</th>
	<td colspan="5"><?php echo $results->about_me; ?></td>
</tr>
<tr>
	<th>Skills</th>
	<td colspan="5"><?php echo $results->skills; ?></td>
</tr>
</table>
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
?>
<?php require_once("../layout/main/footer.php"); ?>