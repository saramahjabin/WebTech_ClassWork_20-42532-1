<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
</head>
<body>
<?php
$Err = $pErr = $npErr = $cpErr = "";
$p = $np =$cp = "";
if(isset ($_POST['Submit'])){
	$p = $_POST['pass'];
	$np = $_POST['npass'];
	$cp = $_POST['cpass'];

if(empty($p) || empty($np) || empty($cp)){
		$Err = "Please fill up all the informations!";
	}
	else{
		if(!preg_match(	"/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $p)){
		$pErr =" Minimum eight characters, at least one letter, one number and one special character!";
	     }
	    if(!strcmp($p, $np)){
          $npErr = "New Password should not be same as the Current Password!";
	     }
	    if(strcmp($np, $cp))
	     {
	     	$cpErr = "New Password must match with the Retyped Password!";
	     }
	}
}
?>
    <div class="container" style="width:900px;">   
                <form method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<fieldset>
        <legend> <h3>Change Password</h3> </legend>
        <label for="pass"> <b>Current Password :</b> </label>
        <input type="text" name="pass"><span style="color: red">*<?php echo $pErr?><br></span>
        <label for="npass"style="color: green"> <b>New Password :</b> </label>
        <input type="text" name="npass"><span style="color: red">*<?php echo $npErr?><br></span> 
        <label for="cpass" style="color: red"> <b>Retype New Password :</b> </label>
        <input type="text" name="cpass"><span style="color: red">*<?php echo $cpErr?><br></span>     
        <span class="underline">______________________</span><br><br> 
        <label style="color: red"><?php echo $Err ?></label>  <br>
        <input type="submit" name="Submit" value="Submit">
    </fieldset>
    </form> 
        <?php
    echo $p;
echo "<br>";
echo $np;
echo "<br>";
echo $cp;
echo "<br>";
?>
</body>
</html>