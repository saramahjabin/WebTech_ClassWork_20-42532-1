<?php  
require_once ('../Model/Model.php');

if (isset($_POST['Submit'])) {
$data['Name'] = $_POST['name'];
	$data['Email'] = $_POST['email'];
	$data['User_Name'] = $_POST['uname'];
	$data['Password'] = $_POST['pass'];
	$data['Gender'] = $_POST['gender'];
	$data['Date_of_Birth'] = $_POST['dob'];
	$data['Image'] = 'images/images.png';

  if (addData($data)) {
  	session_start();
  	$_SESSION['message'] = "Your account has been created. Please go to login page.";
  	header("location:../View/RegistrationPage.php");
  }
}

else if(isset ($_POST['Reset'])){
        $_POST['name'] = "";
        $_POST['email'] = "";
        $_POST['uname'] = "";
        $_POST['pass'] = "";
        $_POST['cpass'] = "";
        $_POST['gender'] = "";
        $_POST['dob'] = "";  
}
else {
	echo 'You are not allowed to access this page.';
}


?>
