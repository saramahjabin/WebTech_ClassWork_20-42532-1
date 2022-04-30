<?php
require_once '../Controller/ShowData.php';
$name =""; 
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
    <title>Edit Profile</title>
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
    <form method= "post" action="../Controller/EditData.php">
    <fieldset>
        <legend> <h3 class="main-heading">Edit Profile</h3> </legend>
        <label for="name">Name  : </label><input type="text" name="name" value = "<?php echo $data['Name']?>" ><br>
        <span class="underline">______________________</span><br> 
        <label for="email">Email  : </label><input type="text" name="email" value = "<?php echo $data['Email']?>" ><br>
        <span class="underline">______________________</span><br> 
        <label for="gender">Gender  : </label>        
        <input type="radio" name="gender" value="Male" required <?php if($data['Gender']=="Male"){echo "checked";}?> >Male
        <input type="radio" name="gender" value="Female" required <?php if($data['Gender']=="Female"){echo "checked";}?> >Female
        <input type="radio" name="gender" value="Other" required <?php if($data['Gender']=="Other"){echo "checked";}?> >Other<br>
        <span class="underline">______________________</span><br>
        <label for="dob">Date of Birth  : </label><input type="date" name="dob" value = "<?php echo $data['Date_of_Birth']?>" ><br>
        <span class="underline">______________________</span><br><br>          
        <input type="hidden" name="id" value="<?php echo $data['User_Name'] ?>"><br>
        <input type="submit" name="Submit" value="Submit">
    </fieldset>

        </div>
 </div>
  <footer>
   <p>Copyright @ 2017</p>
 </footer>           
</body>
</html>