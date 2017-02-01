<?php 
session_start();
//error_reporting(0);
if(isset($_SESSION['logged-in'])){
	if($_SESSION['logged-in'] == true && $_SESSION['type'] == 'etudiant')
		header('Location: vue/form.php');
	if($_SESSION['logged-in'] == true && $_SESSION['type'] == 'admin')
		header('Location: vue/admin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<style>
		body{
			margin-top: 50px;
		}
		div label{
			font-size: 20px;
		}
		input.btn{
			width: 120px;
		}
	</style>
</head>
<body class="container ">
<div class="jumbotron">
<form method="post" action="controleur/cnx.php" class="">
<div class="page-header">
<h1>Identification</h1>
</div>
<div class="form-group">
<label for="email">Email Address:</label>
<input type="text" name="email" placeholder="Email" class="form-control " required="">
</div>
<div class="form-group">
<label for="pwd">Password:</label>
<input type="password" name="password" placeholder="Password" class="form-control " required="">
</div>
<input type="submit" value="login" name="bttlogin" class="btn btn-success pull-right">
</form>
</div>

</body>
</html>