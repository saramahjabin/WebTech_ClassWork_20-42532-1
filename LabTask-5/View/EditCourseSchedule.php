<?php
include('./DashBoard_Header.php');
//include('./footer.php');
require_once '../Controller/ShowData.php';
$data = fetchData($_GET['id']);     
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
    
 <div style="border: 1px solid white; width: 24%; height: 500px;margin-top: 100px; color: white; font-size: 25px; float: left; background: #A1F1A1;" >
                    <ul>
                        <li ><a href='#' style= "color:white;">Dashboard </a></li>
                        <li ><a href='CourseSchedule.php' style= "color:white;">Course Schedule  </a></li>
                        <li ><a href='#' style= "color:white;">Appointment Schedule  </a></li>
                        <li ><a href='#' style= "color:white;">Bookings </a></li>
                        <li ><a href='#' style= "color:white;">Own  Profile  </a></li>
                        <li ><a href='#' style= "color:white;">Log Out  </a></li>
                    </ul> 
                    </div>
         <div style="border: 1px solid white; width: 74%; height: 500px;margin-top: 100px;color: black; font-size: 25px; float: left;background: #F2FFF2; padding-left: 10px">
        <form method= "post" action="../Controller/EditData.php">
        <legend> <h3 class="main-heading">Edit Course Schedule</h3> </legend>
        <label for="Topic">Topic  : </label>
        <select name="Topic" >
          <option selected disabled >Select an option</option>
          <option value="Mindfulness meditation" <?php if($data['Topic']=="Mindfulness meditation"){echo "selected";}?>>Mindfulness meditation</option>
          <option value="Spiritual meditation" <?php if($data['Topic']=="Spiritual meditation"){echo "selected";}?>>Spiritual meditation</option>
          <option value="Focused meditation" <?php if($data['Topic']=="Focused meditation"){echo "selected";}?>>Focused meditation</option>
          <option value="Movement meditation" <?php if($data['Topic']=="Movement meditation"){echo "selected";}?>>Movement meditation</option>
          <option value="Transcendental Meditation" <?php if($data['Topic']=="Transcendental Meditation"){echo "selected";}?>>Transcendental Meditation</option>
          <option value="Progressive relaxation" <?php if($data['Topic']=="Progressive relaxation"){echo "selected";}?>>Progressive relaxation</option>
          <option value="Visualization meditation" <?php if($data['Topic']=="Visualization meditation"){echo "selected";}?>>Visualization meditation</option>
          <option value="Loving-kindness meditation" <?php if($data['Topic']=="Loving-kindness meditation"){echo "selected";}?>>Loving-kindness meditation</option>
          </select><br><br>
        
        <label for="Instructor_ID">Instructor ID  : </label><input type="number" name="Instructor_ID" value = "<?php echo $data['Instructor_ID']?>"  ><br><br>
        
        <?php
        $today = date("Y-m-d");
        $mindate = date("Y-m-d",strtotime($today.'+ 3 days'));
        $maxdate = date("Y-m-d",strtotime($today.'+ 9 days')) ;
        ?>
        <label for="Date">Date  : </label><input type="date" name="Date" max ="<?php echo $maxdate?>"  min = "<?php echo $mindate?>" value = "<?php echo $data['Date']?>"><br><br>
         
       <label for="Time">Time  : </label><input type="Time" name="Time" value = "<?php echo $data['Time']?>"><br><br>
        
        <label for="Status">Status  : </label>        
        <input type="radio" name="Status" value="Active" <?php if($data['Status']==1){echo "checked";}?>>Active
        <input type="radio" name="Status" value="Inactive" <?php if($data['Status']==0){echo "checked";}?>>Inactive 
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"><br>   
        <input type="submit" name="Submit" value="Submit" onclick="return confirm('Are you sure want to update this ?')">
      </form>
        </div>                  
</body>
</html>