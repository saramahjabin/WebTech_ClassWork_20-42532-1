<?php 

require_once ('../Model/Model.php');
$st='';
$allSearchedData = loginSuggestion($_POST['name']);
?>
<?php foreach ($allSearchedData as $i => $data): ?>
<option ><?php echo $data['Username']?></option>
		                 <?php endforeach; ?>      	

