<?php
require_once '../Controller/ShowData.php';  
$name = $n = $e = $g = $db =$im = ""; 
session_start();
if(isset( $_SESSION['uname'])){
	$name = $_SESSION['uname'];
}
if(empty($name)){
    header("location:LoginPage.php");
}
$data = fetchData($name); 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>
<body >
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
        <div style="border: 1px solid white; width: 70%; height: 500px;margin-top: 140px;color: white; font-size: 25px;background: rgba(0,0,0,0.6); float: left; padding-left: 10px">
    <form method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <fieldset>
        <legend> <h2 class="main-heading">Profile</h2> </legend>
        <div div style="border: 1px solid white; width:250px; height:250px; color: white; float:right;">
        <img src="<?php echo $data['Image']?> " alt = "<?php echo "Loading.."?> "width="250"; height="250";>
        <a href="ChangeProfilePicture.php" style= "color:cyan;">Change</a></div>
        <label for="name">Name  : <?php echo $data['Name']?> </label><br>
        <span class="underline">______________________</span><br> 
        <label for="email">Email  : <?php echo $data['Email']?> </label><br>
        <span class="underline">______________________</span><br> 
        <label for="gender">Gender  : <?php echo $data['Gender']?> </label><br>
        <span class="underline">______________________</span><br>
        <label for="dob">Date of Birth  : <?php echo $data['Date_of_Birth']?> </label><br>
        <span class="underline">______________________</span><br><br>          
        <a href="EditProfile.php" style= "color:cyan;">Edit Profile</a>
    </fieldset>

        </div>
 </div>
  <footer>
   <p>Copyright @ 2017</p>
 </footer>           
</body>
</html>