<?php 
session_start();
if(isset($_SESSION['type'])){
	if($_SESSION['type'] == 'admin')
		header('Location: admin.php');
}
?>
<!DOCTYPE html> 
<html>
	<head>
	 	<title>Archive App</title>
  		<meta charset="UTF-8">
  			<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  			<style>
		body{
			margin-top: 50px;
		}
		div label{
			font-size: 15px;
		}
		input.btn{
			width: 100px;
		}
	
		a:visited {
			text-decoration: none;
			color: white;
		}
		a:hover {
			text-decoration: none;
			color: white;
		}
		a:active {
			text-decoration:none;
			color: white;
		}
		button{ width: 120px;}
		.danger{ 
			color:  red;
			font-size: 10%;
		}
	</style>

	</head>
	<body class="container">
			<a href="../controleur/logout.php"><button type="button" class="btn btn-warning  pull-right">Logout</button></a>
	<div class="jumbotron">
		<form action="../controleur/test.php" method="post" enctype="multipart/form-data">
		
			<p>
				<label >Intitulé</label> : <input type="text" name="intitule" class="form-control" required=""/>
			</p>
			<p>
				<label >Domaine</label> : <input type="text" name="domaine" class="form-control" required=""/>
			</p>
			<p>
				<label >Duré</label> : <input type="text" name="dure" class="form-control" required=""/>
			</p>
			<p>
				<label >Entrez les mots clé de votre Projet ou les nom des téchnologie utilisé dans votre projet</label> : <input type="text" name="keyprj" class="form-control" required=""/>
			</p>
			<p class='danger'>Un Espace entre chaque Mot</p>
			<p>
				<label >Description du projet</label><br />
				<textarea name="desc" rows="10" cols="50" class="form-control" required=""></textarea>
			</p>
			<p>
				<label>ajouter fichier contien le projet complet</label><br/>
				<input type="file" name="prj"class="form-control-file" required=""/>
			</p>
			<p>
				<label>ajouter le rapport</label><br/>
				<input type="file" name="rap" class="form-control-file" required=""/>
			</p>
			<p>
				<input type="submit" value="Envoyer" class="btn btn-primary" required=""/>
			</p>
		</form>
		</div>
	</body>
</html>
