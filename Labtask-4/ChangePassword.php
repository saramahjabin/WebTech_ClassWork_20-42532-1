<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Change Password</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>
<body>
<?php

$Err = $pErr = $npErr = $cpErr = $h = "";
$p = $np =$cp = "";
$name =""; 
session_start();
if(isset( $_SESSION['uname'])){
	$name = $_SESSION['uname'];
}
if(empty($name)){
	header("location:LoginPage.php");
}
if(isset ($_POST['Submit'])){
	$p = $_POST['pass'];
	$np = $_POST['npass'];
	$cp = $_POST['cpass'];

if(empty($p) || empty($np) || empty($cp)){
		$Err = "Please fill up all the informations!";
	}
	else{ 
		if(!preg_match(	"/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $np)){
		$npErr =" Minimum eight characters, at least one letter, one number and one special character!";
	     }
	     else{  
		    $cu = "jb";
            $info = file_get_contents("data.json");
            $info = json_decode($info);
            foreach ($info as $Info) {
              $un = $Info->User_Name;
              $pn = $Info->Password;
              if($un==$name && $pn==$p){
               $cu = "";
              }
            }
		if(!empty($cu)){
          $pErr ="Password doesn't match with the current password!";
		}
		else{
	    if(!strcmp($p, $np)){
          $npErr = "New Password should not be same as the Current Password!";
	     }
	     else{
	    if(strcmp($np, $cp))
	     {
	     	$cpErr = "New Password must match with the Retyped Password!";
	      }
	      else{
	       require("user.class.php");
           $user = new User('data.json');
           $user->updateUser($name,'Password',$np);
           $h = "Password is changed.";
	      }
	  }
	   }  
	 }
	}
}
?>

<div class="full-page">
            <header class="navigation-bar">
                <div class="logo">
                    <h1>X <span style="font-size: 30; ">	Company</span></h1>
                </div>>
                <nav>
                    <ul id='MenuItems'>
                        <li><a href='ProfilePage.php'>Logged in as <?php echo $name?>   | </a></li>
                        <li><a href='LogOut.php'>Logout | </a></li>
                    </ul>
                </nav>
                </header>
        <div style="border: 1px solid white; width: 25%; height: 500px;margin-top: 140px; color: white; font-size: 30px; float: left">
                    <ul>
                        <li ><a href='Dashboard.php' style= "color:white;">Dashboard </a></li>
                        <li ><a href='ProfilePage.php' style= "color:white;">View Profile  </a></li>
                        <li ><a href='EditProfile.php' style= "color:white;">Edit Profile  </a></li>
                        <li ><a href='ChangeProfilePicture.php' style= "color:white;">Change Profile Picture </a></li>
                        <li ><a href='ChangePassword.php' style= "color:white;">Change Password  </a></li>
                        <li ><a href='LogOut.php' style= "color:white;">Logout  </a></li>
                    </ul>        	
</div>
        <div style="border: 1px solid white; width: 74%; height: 500px;margin-top: 140px;color: white; font-size: 25px;background: rgba(0,0,0,0.6); float: left; padding-left: 10px">    
     <form method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<fieldset>
        <legend> <h3 class="main-heading">Change Password</h3> </legend>
        <label for="pass"> <b>Current Password :</b> </label>
        <input type="text" name="pass"><span style="color: red; font-size: 15px">*<?php echo $pErr?><br></span>
        <label for="npass"style="color: green"> <b>New Password :</b> </label>
        <input type="text" name="npass"><span style="color: red; font-size: 15px">*<?php echo $npErr?><br></span> 
        <label for="cpass" style="color: red"> <b>Retype New Password :</b> </label>
        <input type="text" name="cpass"><span style="color: red; font-size: 15px">*<?php echo $cpErr?><br></span>     
        <span class="underline">______________________</span><br><br> 
        <label style="color: red; font-size: 15px"><?php echo $Err ?></label>  <br>
        <input type="submit" name="Submit" value="Submit">
    </fieldset>
    <h3><?php echo $h ?></h3>
    </form> 
</div>
 </div>
  <footer>
   <p>Copyright @ 2017</p>
 </footer>  
</body>
</html>