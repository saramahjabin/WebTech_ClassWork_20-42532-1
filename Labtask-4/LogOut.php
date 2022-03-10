<?php
session_start();
if(isset( $_SESSION['uname'])){
	session_destroy();
	header("location:LoginPage.php");
}
else{
	header("location:LoginPage.php");
}
?>