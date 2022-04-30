<?php
include('./HomeHeader.php');
require_once '../Controller/ShowData.php';
 $l = "";

if(isset ($_POST['Submit'])){
  $n = $_POST['uname'];
  $p = $_POST['password'];
  $datas = checkLogfetchData($_POST['uname']);
             $c = "jb";
             if($datas['Username']==$n && $datas['Password']==$p){
               $c = "";
              
            }            
            if(empty($c)){
              session_start();
             $_SESSION['uname']  = $n; 
             if(isset($_POST['remember'])){
              setcookie("uname", $n, time()+60*60*7);
              setcookie("pass", $p, time()+60*60*7);
             }

            header("location:CourseSchedule.php");
             }
        else{
          $l = "Invalid User Name Or Password!";
         }
        }



  ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
<script>  
    function validateform(){  
    var name=document.myform.name.value;  
    var password=document.myform.password.value;  
      
    if (name==null || name==""){  
      alert("User Name can't be blank");  
      return false;  
    }else if(password.length<6){  
      alert("Password must be at least 6 characters long.");  
      return false;  
      }  
    }
    function checkEmpty() {
        if (document.myform.name.value = "") {
          alert("User Name can't be blank");
            return false;  
        }
      }  
    function checkName() {
      if (document.getElementById("name").value == "") {
          document.getElementById("nameErr").innerHTML = " User Name can't be blank";
          document.getElementById("name").style.borderColor = "red";
      }else{
          document.getElementById("nameErr").innerHTML = "";
          document.getElementById("name").style.borderColor = "black";

      }
      
        }
        function checkPass(){
          if (document.getElementById("password").value == "") {
          document.getElementById("passErr").innerHTML = "Password can't be blank";
          document.getElementById("password").style.borderColor = "red";
      }
        }
</script>  
</head>
<body>    
                    <div class="form-box">
                        <div class="form">
                           
    <form name="myform"  method= "post" action="" onsubmit="validateform()">
        <legend> <h1 class="main-heading">Login</h1> </legend>
        <label><span style="color: red"><?php echo $l ?></span></label><br><br>
        <label for="uname"> <b>User Name :</b> </label>
        <input type="text" name="uname" value="<?php if(isset($_COOKIE['uname'])){echo $_COOKIE['uname']; } ?>" id="name" onblur="checkName()" onkeyup="checkName()"><p id="nameErr"></p>
        <br><br>

        <label for="pass"> <b>Password :</b> </label>
        <input type="password" value="<?php if(isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];} ?>" id="password" name="password" onblur="checkPass()"> <p id="passErr"></p><br><br>    
        <span class="underline">____________________________________________________________________</span><br>
        
        <input type="checkbox" name="remember" value =1 class = "check"> <label for="remember"> Remember me</label><br> <br>  
        <button name="Submit" value="Submit"> Submit </button>
        <a href="ForgotPassword.php">Forgot Password?</a>
    </form> 
 </div>
</div>
</body>
</html>

