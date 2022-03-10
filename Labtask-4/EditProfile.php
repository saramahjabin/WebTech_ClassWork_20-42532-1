<?php
$name =""; 
session_start();
if(isset( $_SESSION['uname'])){
	$name = $_SESSION['uname'];
}
if(empty($name)){
    header("location:LoginPage.php");
}
            $info = file_get_contents("data.json");
            $info = json_decode($info);
            foreach ($info as $Info) {
              $un = $Info->User_Name;
            if($un==$name){
               $n = $Info->Name;
               $e = $Info->Email ;
               $g = $Info->Gender ;
               $db =$Info->Date_of_Birth ;
               $im = $Info->Image ;

              }
            }

if(isset ($_POST['Submit'])){
            require("user.class.php");
            $user = new User('data.json');
            $user->updateUser($name,'Name',$_POST['name']);
            $user->updateUser($name,'Email',$_POST['email']);
            $user->updateUser($name,'Gender',$_POST['gender']);
            $user->updateUser($name,'Date_of_Birth',$_POST['dob']);
            header("location:ProfilePage.php");
}            
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
        <div style="border: 1px solid white; width: 74%; height: 500px;margin-top: 140px;color: white; font-size: 25px;background: rgba(0,0,0,0.6); float: left; padding-left: 10px">
    <form method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <fieldset>
        <legend> <h3 class="main-heading">Edit Profile</h3> </legend>
        <label for="name">Name  : </label><input type="text" name="name" value = "<?php echo $n?>" ><br>
        <span class="underline">______________________</span><br> 
        <label for="email">Email  : </label><input type="text" name="email" value = "<?php echo $e?>" ><br>
        <span class="underline">______________________</span><br> 
        <label for="gender">Gender  : </label>        
        <input type="radio" name="gender" value="Male" required <?php if($g=="Male"){echo "checked";}?> >Male
        <input type="radio" name="gender" value="Female" required <?php if($g=="Female"){echo "checked";}?> >Female
        <input type="radio" name="gender" value="Other" required <?php if($g=="Other"){echo "checked";}?> >Other<br>
        <span class="underline">______________________</span><br>
        <label for="dob">Date of Birth  : </label><input type="date" name="dob" value = "<?php echo $db?>" ><br>
        <span class="underline">______________________</span><br><br>          

        <input type="submit" name="Submit" value="Submit">
    </fieldset>

        </div>
 </div>
  <footer>
   <p>Copyright @ 2017</p>
 </footer>           
</body>
</html>