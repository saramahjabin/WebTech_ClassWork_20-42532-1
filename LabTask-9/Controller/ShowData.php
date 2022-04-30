<?php 

require_once ('../Model/Model.php');

function fetchAllData(){
	return showAllData();

}
function fetchData($id){
	return showData($id);

}

function checkLogfetchData($username){
    return   LoginCheck($username);

}

?>