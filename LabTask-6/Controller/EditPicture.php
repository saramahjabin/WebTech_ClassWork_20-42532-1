<?php  
require_once ('../Model/Model.php');
if (isset($_POST['Submit'])) {

	$target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$data['Image'] = "images/".htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
//print_r($data);
  if (updatePicture($_POST['id'], $data)) {
	session_start();
  	$_SESSION['message'] = "Record has been updated."; 
    header('location:../View/ProfilePage.php');
  }
 else {
	echo 'You are not allowed to access this page.';
}
/*function changePicture($username,$data){
    return updatePicture($username, $data);
}*/
}

?>