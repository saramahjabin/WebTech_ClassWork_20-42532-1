<!DOCTYPE html>
<html>
<head>
	<title>Profile Picture Upload Page</title>
</head>
<body>
<div class="container" style="width:900px;">  
<form action="upload.php" method="post" enctype="multipart/form-data">
  <fieldset>
  <legend> <h3>PROFILE PICTURE</h3> </legend>
  <img src="images.png"><br>
  <input type="file" name="fileToUpload" id="fileToUpload"><br>
  <span class="underline">________________________________</span><br><br> 
  <input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>