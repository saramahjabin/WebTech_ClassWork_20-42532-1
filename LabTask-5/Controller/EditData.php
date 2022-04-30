<?php  
require_once ('../Model/Model.php');
$st = '';

if (isset($_POST['Submit'])) {
	$data['Topic'] = $_POST['Topic'];
	$data['Instructor_ID'] = $_POST['Instructor_ID'];
	$data['Date'] = $_POST['Date'];
	$data['Time'] = $_POST['Time'];
    if($data['Status'] =='Active'){
	$st =1;
  }
  else{
 	$st =0;
  }
	$data['Status'] = $st;

  if (updateData($_POST['id'], $data)) {
	session_start();
  	$_SESSION['message'] = "Record has been updated."; 
    header('location:../View/CourseSchedule.php');
  }
} else {
	echo 'You are not allowed to access this page.';
}


?>