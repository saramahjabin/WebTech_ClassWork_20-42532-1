<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>
<body>
<?php
$nameErr = $passErr = $l = "";

if(isset ($_POST['Submit'])){
	$n = $_POST['uname'];
	$p = $_POST['pass'];
	if(empty($n)){
		$nameErr = "Please Enter Your Name";
	}
	else{
		if(strlen($n)<2){
	     		$nameErr = "User Name should contains at least two characters";
	     }
	    else{
	     	if(!preg_match("/^[a-zA-Z0-9_]+([a-zA-Z0-9_]*[.-]?[a-zA-Z0-9_]*)*[a-zA-Z0-9_]+$/", $n)){
		$nameErr =" User Name can contain alpha numeric characters, period, dash or underscore only. Please renter user name.";
	     	}
	     }
	}
	if(empty($p)){
		$passErr = "Please Enter Password";
	}
	
	else{
		if(!preg_match(	"/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $p)){
		$passErr =" Minimum eight characters, at least one letter, one number and one special character";
	     }
         else{
             $cu = $cp = "jb";
            $info = file_get_contents("data.json");
            $info = json_decode($info);
            foreach ($info as $Info) {
              $un = $Info->User_Name;
              if($un==$n){
               $cu = "";
              }
            }
            foreach ($info as $Infos) {
              $pn = $Infos->Password;
              if($pn==$p){
               $cp = "";
              }
            }            
            if(empty($cu) && empty($cp)){
                session_start();
             $_SESSION['uname']  = $n; 
             if(isset($_POST['remember'])){
              setcookie("uname", $n, time()+60*60*7);
              setcookie("pass", $p, time()+60*60*7);
             }
            header("location:DashBoard.php");
             }
        else{
          $l = "Invalid User Name Or Password!";
         }
        }
	}

}

	?>
    <div class="full-page">
        <div class="sub-page">
            <header class="navigation-bar">
                <div class="logo">
                    <h1>X <span style="font-size: 30; ">	Company</span></h1>
                </div>>
                <nav>
                    <ul id='MenuItems'>
                        <li><a href='PublicHome.php'>Home | </a></li>
                        <li><a href='LoginPage.php'>Login | </a></li>
                        <li><a href='RegistrationPage.php'>Registration | </a></li>
                    </ul>
                </nav>
                </header> 
            </div>


	            <div class="row">
                <div class="col-1">
                    <div class="form-box">
                        <div class="form">
                           
    <form class="login-form" method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<fieldset>
        <legend> <h3 class="main-heading">Login</h3> </legend>
        <label><span style="color: red"><?php echo $l ?></span></label><br><br>
        <label for="uname"> <b>User Name :</b> </label>
        <input type="text" name="uname" value="<?php if(isset($_COOKIE['uname'])){echo $_COOKIE['uname']; } ?>"><span style="color: red">*<br><?php echo $nameErr?><br></span><br>
        <label for="pass"> <b>Password :</b> </label>
        <input type="password" name="pass"value="<?php if(isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];} ?>"><span style="color: red">*<br><?php echo $passErr?><br></span><br>    
        <span class="underline">____________________________________________________________________</span><br><br>
        
        <input type="checkbox" name="remember" value =1 > <label for="remember"> Remember me</label><br>   
        <input type="submit" name="Submit" value="Submit">
        <a href="ForgotPassword.php">Forgot Password?</a>
    </fieldset>
    </form> 
    </div>
 </div>
 </div>
</div>
 <footer>
   <p>Copyright @ 2017</p>
 </footer>
</body>
</html>

