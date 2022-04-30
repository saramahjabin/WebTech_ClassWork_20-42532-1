<?php  
require_once ('../Model/Model.php');

if (isset($_POST['Submit'])) {
	$data['Name'] = $_POST['name'];
	$data['Email'] = $_POST['email'];
	$data['Gender'] = $_POST['gender'];
	$data['Date_of_Birth'] = $_POST['dob'];

  if (updateData($_POST['id'], $data)) {
	session_start();
  	$_SESSION['message'] = "Record has been updated."; 
    header('location:../View/ProfilePage.php');
  }
} else {
	echo 'You are not allowed to access this page.';
}


?>