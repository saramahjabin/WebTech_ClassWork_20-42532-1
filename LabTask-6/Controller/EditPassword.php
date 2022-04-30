<?php  
require_once ('../Model/Model.php');
function changePass($username, $data){
    return   updatePassword($username, $data);

}
?>