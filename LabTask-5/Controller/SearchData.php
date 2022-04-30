<!DOCTYPE html>
<html>
<head>
	<title></title>
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
	margin-top: 5px;
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
</head>
<body>

<?php 

require_once ('../Model/Model.php');
if (isset($_POST['Search'])) {
$allSearchedData = searchData($_POST['Topic']);
}
?>

<?php
include('../View/DashBoard_Header.php');
//include('./footer.php');
session_start();
?>

<div style="width: 50%; height: 40px;margin-top: 90px; float: right; color: blue; font-size: 20px; text-align: right;">
	<?php 
          if(isset($_SESSION['message']))
          	{
          		echo $_SESSION['message'];
	            unset($_SESSION['message']);
	        }
	      ?>
	  </div>
	}

        <div style="border: 1px solid white; width: 24%; height: 500px;margin-top: 135px; color: white; font-size: 25px; float: left; background: #A1F1A1;" >
                    <ul>
                        <li ><a href='#' style= "color:white;">Dashboard </a></li>
                        <li ><a href='../View/CourseSchedule.php' style= "color:white;">Course Schedule  </a></li>
                        <li ><a href='#' style= "color:white;">Appointment Schedule  </a></li>
                        <li ><a href='#' style= "color:white;">Bookings </a></li>
                        <li ><a href='#' style= "color:white;">My  Profile  </a></li>
                        <li ><a href='#' style= "color:white;">Log Out  </a></li>
                    </ul> 
                    </div>
<table>  <thead>
                          <tr>   
                               <th>Topic</th> 
                               <th>Instructor ID</th>  
                               <th>Date</th>   
                               <th>Time</th>   
                               <th>Status</th>
                               <th>Edit</th>
                               <th>Delete</th>

                          </tr>
                          </thead>
                          <tbody id="output">
                          	<?php if(empty($allSearchedData)){
	echo"<tr><td>0 results</td></tr>";
}
?>
<?php foreach ($allSearchedData as $i => $data): ?>

			               <tr>
				           <td><?php echo $data['Topic'] ?></td>
				           <td><?php echo $data['Instructor_ID'] ?></td>
				           <td><?php echo $data['Date'] ?></td>
				           <td><?php echo $data['Time'] ?></td>
				           <?php
				           if($data['Status'] =='1'){
				           	$st = "Active";
				           }
				           else{
				           	$st = "Inactive";
				           }
				           ?>
				           <td><?php echo $st?></td>
                           <td><a href="../View/EditCourseSchedule.php?id=<?php echo $data['ID'] ?>">Edit</a></td>
                           <td><a href="Controller/DeleteData.php?id=<?php echo $data['ID'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
			               </tr>
		                 <?php endforeach; ?> 

                         </tbody>  
                            
                     </table>     	


</body>
</html>