

<!DOCTYPE html>
<html>
<head>
	<title>Add Course Schedule</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>
<body>
<?php

include('./DashBoard_Header.php');
//include('./footer.php');
 include "../Controller/AddData.php" ;           
?>

        <div style="border: 1px solid white; width: 24%; height: 500px;margin-top: 120px; color: white; font-size: 25px; float: left; background: #A1F1A1;" >
                    <ul>
                         <li ><a href='#' style= "color:white;">Dashboard </a></li>
                        <li ><a href='CourseSchedule.php' style= "color:white;">Course Schedule  </a></li>
                        <li ><a href='#' style= "color:white;">Appointment Schedule  </a></li>
                        <li ><a href='#' style= "color:white;">Bookings </a></li>
                        <li ><a href='#' style= "color:white;">Own  Profile  </a></li>
                        <li ><a href='#' style= "color:white;">Log Out  </a></li>
                    </ul> 
                    </div>
         <div style="border: 1px solid white; width: 74%; height: 500px;margin-top: 120px;color: black; font-size: 25px; float: left;background: #F2FFF2; padding-left: 10px">
        <form method= "post" action="../Controller/AddData.php">
        <legend> <h3 class="main-heading">Adding Course Schedule</h3> </legend>
        <label for="Topic">Topic  : </label>
        <select name="Topic">
          <option selected disabled >Select an option</option>
          <option value="Mindfulness meditation">Mindfulness meditation</option>
          <option value="Spiritual meditation">Spiritual meditation</option>
          <option value="Focused meditation">Focused meditation</option>
          <option value="Movement meditation">Movement meditation</option>
          <option value="Transcendental Meditation">Transcendental Meditation</option>
          <option value="Progressive relaxation">Progressive relaxation</option>
          <option value="Visualization meditation">Visualization meditation</option>
          <option value="Loving-kindness meditation">Loving-kindness meditation</option>
          </select><br><br>
        
        <label for="Instructor_ID">Instructor ID  : </label><input type="number" name="Instructor_ID" ><br><br>
        <?php
        $today = date("Y-m-d");
        $mindate = date("Y-m-d",strtotime($today.'+ 3 days'));
        $maxdate = date("Y-m-d",strtotime($today.'+ 9 days')) ;
        ?>
        <label for="Date">Date  : </label><input type="date" name="Date" max ="<?php echo $maxdate?>"  min = "<?php echo $mindate?>"><br><br>
         
       <label for="Time">Time  : </label><input type="Time" name="Time" min = "7:00" ><br><br>
        
        <label for="Status">Status  : </label>        
        <input type="radio" name="Status" value="Active" >Active
        <input type="radio" name="Status" value="Inactive" >Inactive     
        <h6 style="color: red;">  <?php 
          if(isset($_SESSION['Error']))
            {
              echo $_SESSION['Error'];
              unset($_SESSION['Error']);
          }
        ?></h6>
        <input type="submit" name="Submit" value="Submit">
      </form>
        </div>       
</body>
</html>