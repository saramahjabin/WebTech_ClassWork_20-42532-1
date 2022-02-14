<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
</head>
<body>
<?php
$Error = $success = "";
if(isset ($_POST['Submit'])){
 $data = array(
         "Name" =>$_POST['name'],
         "Email" =>$_POST['email'],
         "User_Name" =>$_POST['uname'],
         "Password" =>$_POST['pass'],
         "Conform_Password" =>$_POST['cpass'],
         "Gender" =>$_POST['gender'],
         "Date of Birth" =>$_POST['dob']
          );
     if(filesize("data.json")==0){
      $first_record = array($data);
      $data_to_save = $first_record ;
     }
     else{
     	$old_records = json_decode(file_get_contents("data.json"));
     	array_push($old_records,$data );
     	$data_to_save = $old_records ;
     }
     if(!file_put_contents("data.json", json_encode($data_to_save,JSON_PRETTY_PRINT), LOCK_EX)){
      $Error = "Error!! Please try again.";
     }
     else{
     	$success = " Data is stored successfully. ";
     }
}

?>	
    <div class="container" style="width:400px;">   
     <form method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<fieldset>
        <legend> <h3>REGISTRATION</h3> </legend>
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
        <input type="radio" name="gender" value="Male">Male
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
        <input type="reset" name="Reset" value="Reset">
        <label><?php echo $Error ?></label><label><?php echo $success ?></label>
    </fieldset>
</form>
</div>
</body>
</html>