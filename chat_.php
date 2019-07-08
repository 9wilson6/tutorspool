<?php 
if(isset($_POST['submit'])) {
	require_once("dbconfig/dbconnect.php");

	$chat=77;
		require_once("inc/utilities.php");
	$project_id=$_POST['project_id'];
	$user_type=$_POST['user_type'];
	$student_id=$_POST['student_id'];
	$tutor_id=$_POST['tutor_id'];
	$message=$db->escape($_POST['message']);
	$query="INSERT INTO chats(user_type, project_id, message, date_sent, student_id, tutor_id) VALUES('$user_type', '$project_id', '$message', '$date_global', '$student_id', '$tutor_id')";
	if ($db->query($query)) {
		
	}
}

 ?>