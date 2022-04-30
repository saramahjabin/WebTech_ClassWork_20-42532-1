<?php 
 include 'DataControl.php' ;
 foreach($noticeInfo->getUsers()  as $row){
 	                               echo '<tr>
                               <td>'.$row['Date'].'</td>
                               <td>'.$row['Notice'].'</td>
                               </tr>'; 
                               } 
                           
?>     	

