<?php  
require_once ('../Model/Model.php');
//$Err = "";

if (isset($_POST['Submit'])) {
	if(empty($_POST['Topic']) || empty($_POST['Instructor_ID']) || empty($_POST['Date']) || empty($_POST['Time']) || empty($_POST['Status'])){
		session_start();
         $_SESSION['Error'] = "Please Fill Up All the Informations..";
         header("location:../View/Add_CourseSchedule.php");
	}
	else{	
	$data['Topic'] = $_POST['Topic'];
	$data['Instructor_ID'] = $_POST['Instructor_ID'];
	$data['Date'] = $_POST['Date'];
	$data['Time'] = $_POST['Time'];
	if($_POST['Status']=='Inactive')
	{
    $data['Status'] = 0;
	}
	else if($_POST['Status']=='Active'){
	$data['Status'] = 1;	
	}

  if (addData($data)) {
  	session_start();
  	$_SESSION['message'] = "Record has been added."; 
  header("location:../View/CourseSchedule.php");

  }
}
} else {
	echo 'You are not allowed to access this page.';
}


?>