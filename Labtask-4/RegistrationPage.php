<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registration Page</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>
<body>
<?php
$success = "";
if(isset ($_POST['Submit'])){
 $data = array(
         "Name" =>$_POST['name'],
         "Email" =>$_POST['email'],
         "User_Name" =>$_POST['uname'],
         "Password" =>$_POST['pass'],
         "Gender" =>$_POST['gender'],
         "Date_of_Birth" =>$_POST['dob'],
         "Image" => "images/images.png"
          );
                 require("user.class.php");
            $user = new User('data.json');
            $user->insertNewUser($data);
            $success = "Your account has been created. Please go to login page.";
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

?>	

<div class="full-page">
        <div class="sub-page">
            <header class="navigation-bar">
                <div class="logo">
                    <h1>X <span style="font-size: 30; ">    Company</span></h1>
                </div>>
                <nav>
                    <ul id='MenuItems'>
                        <li><a href='PublicHome.php'>Home | </a></li>
                        <li><a href='LoginPage.php'>Login | </a></li>
                        <li><a href='RegistrationPage.php'>Registration | </a></li>
                    </ul>
                </nav>
                  </header> 
                <div class="row">
                <div class="col-1">
                    <div class="Registrationform-box">
                        <div class="form">   
     <form method= "post" class="register-form"  action="<?php echo $_SERVER['PHP_SELF'];?>">
	<fieldset>
        <legend> <h3 class="main-heading">REGISTRATION</h3> </legend>
        <label for="name">Name  : </label>
        <input type="text" name="name"><br>
        <span class="underline">________________________________</span><br><br> 
        <label for="email">Email  : </label>
        <input type="text" name="email"><br>
        <span class="underline">________________________________</span><br><br> 
        <label for="uname">User Name  : </label>
        <input type="text" name="uname"><br>
        <span class="underline">________________________________</span><br><br> 
        <label for="pass">Password  : </label>
        <input type="text" name="pass"><br>
        <span class="underline">________________________________</span><br><br> 
        <label for="cpass">Conform Password  : </label>
        <input type="text" name="cpass"><br>
        <span class="underline">________________________________</span><br><br>
	<fieldset>
        <legend> Gender </legend>
        <input type="radio" name="gender" value="Male" >Male
        <input type="radio" name="gender" value="Female">Female
        <input type="radio" name="gender" value="Other">Other
    </fieldset>
        <span class="underline">________________________________</span><br><br>
    	<fieldset>
        <legend> Date of Birth </legend>
        <input type="date" name="dob">
    </fieldset>
        <span class="underline">________________________________</span><br><br>
        <input type="submit" name="Submit" value="Submit">
        <input type="reset" name="Reset" value="Reset"><br>
        <label><?php echo $success ?></label>
    </fieldset>
</form>
    </div>
 </div>
 </div>
</div>
              
            </div>

</body>
</html>