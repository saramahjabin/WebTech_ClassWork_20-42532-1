<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Forgot Password</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>
<body>
<?php
require_once '../Controller/ShowData.php';
$pErr = $l = "";
$p = "";
if(isset ($_POST['Submit'])){
	$p = $_POST['email'];

if(empty($p)){
		$pErr = "Please fill up all the informations!";
	}
	else{
		if(!preg_match(	"/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $p)){
		$pErr =" Invalid Email !";
	     }
	       else{
             $data = checkEmail($p);           
            if(!empty($data)){
            $l = "There is an account with this email. ";
             }
        else{
          $l = "Sorry...There is no account with this email!";
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
        <legend> <h3 class="main-heading">Forgot Password</h3> </legend>
        <label><span style="color: red"><?php echo $l ?></span></label><br><br>
        <label for="email"> <b>Email :</b> </label>
        <input type="text" name="email"><span style="color: red">*<?php echo $pErr?><br></span>  
        <span class="underline">______________________</span><br><br> 
        <input type="submit" name="Submit" value="Submit">
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