<?php
include('./HomeHeader.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
      <link rel="stylesheet" href="RegisterCss.css">
</head>
<body>
<div class="container">
	<div class="header">
		<h2>Create Account</h2>
	</div>
	<form id="form" class="form" action="" onsubmit="validateform()">
		<div class="form-control">
			<label for="username">Username</label>
			<input type="text" placeholder="meditate17" id="username" />
			<small>Error message</small>
		</div>
		<div class="form-control">
			<label for="username">Email</label>
			<input type="email" placeholder="meditate@life.com" id="email" />
			<small>Error message</small>
		</div>
		<div class="form-control">
			<label for="username">Password</label>
			<input type="password" placeholder="Password" id="password"/><br>
			<small>Error message</small>
		</div>
		<div class="form-control">
			<label for="username">Conform Password </label>
			<input type="password" placeholder="Conform Password" id="password2"/>
			<small>Error message</small>
		</div>
		<button>Submit</button>
	</form>
</div>


<script src="RegisterJs.js"></script>

</body>
</html>