
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
$nameErr = $emailErr = $genderErr = $degreeErr = $dobErr = $bloodErr = "";
$n = $e = $dob = $g = $d = $dob = $bd = "";

if(isset ($_POST['Submit'])){
	$n = $_POST['name'];
	$e = $_POST['email'];
	$dob = $_POST['dob'];
    $g = $_POST['gender'];
    $d = $_POST['degree'];
    $bd = $_POST['bd'];   
	if(empty($n)){
		$nameErr = "Please Enter Your Name";
	}
	else{
		if(!preg_match("/^[a-zA-Z- ]*$/", $n)){
		$nameErr =" Can contain a-z, A-Z, period, dash only. Please Re-enter Your Name";
		$n = "";
	     }
	    else{
	     	if(str_word_count($n)<2){
	     		$nameErr = "Name should contains at least two words";
	     		$n = "";
	     	}
	     }
	}
	if(empty($e)){
		$emailErr = "Please Enter Your Email";
	}
	else{
		if(!preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/", $e)){
		$emailErr = "Invalid Email.";
		$e = "";
	     }
	}
	if(empty($dob)){
		$dobErr = "Please choose birth date ";
	}
	else{
		if($dob<1953-01-01 && $dob>1998-12-31){
       $dobErr = "Enter a valid birth date "; 
		}
	}
	

	if(empty($g)){
		$genderErr = "Please select one option";
	}

	if(count($d)<2){ 
        $degreeErr = "Please select two of them ";
 	 }
 	
 	if(empty($bd)){
		$bloodErr = "Please select one option";
	}
 }
	
?>
<form method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<fieldset>
        <legend>  <b>NAME</b> </legend>
        <label for="name"></label>
        <input type="text" name="name">
        <span style="color: red">*<?php echo $nameErr?><br></span>
        <span class="underline">______________________</span><br><br>
    </fieldset>
	<fieldset>
        <legend>  <b>EMAIL</b> </legend>
        <label for="email"></label>
        <input type="text" name="email">
        <span style="color: red">*<?php echo $emailErr?><br></span>
        <span class="underline">______________________</span><br><br>
    </fieldset>
	<fieldset>
        <legend>  <b>DATE OF BIRTH</b> </legend>
        <label for="dob"></label>
        <input type="date" name="dob">
        <span style="color: red">*<?php echo $dobErr?><br></span>
        <span class="underline">______________________</span><br><br>
    </fieldset>
	<fieldset>
        <legend>  <b>GENDER</b> </legend>
        <input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="Female">Female
        <input type="radio" name="gender" value="Other">Other
        <span style="color: red">*<?php echo $genderErr?><br></span>
        <span class="underline">______________________</span><br><br>
    </fieldset>
	<fieldset>
        <legend>  <b>DEGREE</b> </legend>
        <input type="checkbox" name="degree[]" value="SSC">
        <label for="SSC">SSC</label>
        <input type="checkbox" name="degree[]" value="HSC">
        <label for="HSC">HSC</label>
        <input type="checkbox" name="degree[]" value="BSc">
        <label for="BSc">BSc</label>
        <input type="checkbox" name="degree[]" value="MSc">
        <label for="MSc">MSc</label>
        <span style="color: red">*<?php echo $degreeErr?><br></span>
        <span class="underline">______________________</span><br><br>
    </fieldset>
    <fieldset>
        <legend>  <b>BLOOD GROUP</b> </legend>
          <select name="bd">
          <option selected disabled ></option>
          <option value="A+">A+</option>
          <option value="B+">B+</option>
          <option value="AB+">AB+</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
          <option value="A-">A-</option>
          <option value="B-">B-</option>
          <option value="AB-">AB-</option>
          </select>
          <span style="color: red">*<?php echo $bloodErr?><br></span>
        <span class="underline">______________________</span><br><br>
        <input type="submit" name="Submit" value="Submit">
    </fieldset>

</form>
<?php
echo $n;
echo "<br>";
echo $e;
echo "<br>";
echo $dob; 
echo "<br>";
echo $g; 
echo "<br>";
foreach ($d as $key => $value) {
 	echo $value . " ";
 } 
echo "<br>";
echo $bd; 


?>

</body>
</html>