<?php 

require_once ('../Model/Model.php');

if (deleteData($_GET['id'])) {
	session_start();
  	$_SESSION['message'] = "Record has been deleted."; 
    header('location:../View/CourseSchedule.php');
}

 ?>