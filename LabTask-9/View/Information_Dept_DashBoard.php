<!DOCTYPE html>
<html>
<head>
	<title>Information Department DashBoard</title>
    
        <style>

   .column {
    float: left;
    width: 28%;
    padding: 1%;
    height: 400px; 
    }
   .column2 { 
    float: left;
    width: 68%;
    padding: 1%;
    height: 1665px; 
    }
    h3 {
    font-size: 25px;
    }
    h4 {
    font-size: 20px;
    }
    ul {
    line-height: 1.7;
    }
    div {
    display: block;
    margin-bottom: auto;
    margin-left: auto;
    margin-right: auto;
    }
    legend {
    margin-left: 35%;
    }
    table {
    width: 75%;
    margin-top: 140px;
    border-collapse: collapse;
    float: right;
    }
    th {
    background-color: #A1F1A1;
    padding: 1.5%;
    text-align: left;
    font-size: 20px;
    }
    td {
    background-color: #F2FFF2;
    padding: 1.5%;
    color: black;
    font-size: 15px;
    }
    </style> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
</head>
<body>
<?php

include('./DashBoard_Header.php');
//include('./footer.php');
?>

        <div style="border: 1px solid white; width: 24%; height: 500px;margin-top: 140px; color: white; font-size: 25px; float: left; background: #A1F1A1;" >
                    <ul>
                        <li ><a href='Information_Dept_DashBoard.php' style= "color:white;">Dashboard </a></li>
                        <li ><a href='CourseSchedule.php' style= "color:white;">Course Schedule  </a></li>
                        <li ><a href='Appointment.php' style= "color:white;">Appointment Schedule  </a></li>
                        <li ><a href='Bookings.php' style= "color:white;">Bookings </a></li>
                        <li ><a href='Profile.php' style= "color:white;">Own  Profile  </a></li>
                        <li ><a href='LogOut.php' style= "color:white;">Change Password  </a></li>
                    </ul> 
                    </div> 
                                  <table id="output">  
 
                          <?php   
                          include '../Controller/DataControl.php' ;

                          foreach($noticeInfo->getUsers()  as $row)  
                          {  
                            if($row['Id']>10){
                            break;
                          }
                          else{
                               echo '<tr>
                               <td>'.$row['Date'].'</td>
                               <td>'.$row['Notice'].'</td>
                               </tr>'; 
                               } 

                          }  
                          ?>  
                     </table>
    <div style=" width: 70%; float:left; padding-right: 30px; padding-top: 20px;margin-bottom: 200px; text-align: left;"></div>
 <button id="Btn" style=" width: 12%; float:right; padding-right: 30px; padding-top: 10px;margin-bottom: 300px; text-align: right;">View All</button> 

        <script type="text/javascript">
  $(document).ready(function(){
    $("#Btn").click(function(){
      $.ajax({
        url:'../Controller/ViewAllNotice.php',
        type:'post',
        success:function(data){
          $("#output").html(data);
        }
      });
    });
  });
</script>
</body>
</html>