<?php
session_start();
if($_SESSION['logged-in'] == false || $_SESSION['type'] != 'admin')
	header('Location: 404.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link   href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<script src="../bootstrap/js/jquery.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>


</head>

<body>
<?php include("navbar.php")?>
<div class="container" style="margin-top: 100px;">
<div class="row">
<h2>Gestion des Etudiants</h2>
</br>
</br>
</br>
</div>
<div class="row">
<p>
     <a href="create.php" class="btn btn-success">Ajouter</a>
	 <a href="../controleur/logout.php"><button type="button" class="btn btn-warning  pull-right">Logout</button></a>
	 </br>
</p>

<table class="table table-striped table-bordered">
<thead>
<tr>
<th>Nom</th>
<th>Prenom</th>
<th>CNE</th>
<th>Adresse Email</th>
<th>Code Postale</th>
<th>Ville</th>
<th>Action</th>

</tr>
</thead>
<tbody>
<?php
include ('../modele/get_info.php');
foreach (get_All() as $row) {
	echo '<tr>';
	echo '<td>'. $row['nom'] . '</td>';
	echo '<td>'. $row['prenom'] . '</td>';
	echo '<td>'. $row['cne'] . '</td>';
	echo '<td>'. $row['email'] . '</td>';
	echo '<td>'. $row['codePostale'] . '</td>';
	echo '<td>'. $row['ville'] . '</td>';
	echo '<td width=170>';
	echo '<a class="btn btn-success" href="update.php?cne='.$row['cne'].'">Update</a>';
	echo '<a class="btn btn-danger" href="delete.php?cne='.$row['cne'].'">Delete</a>';
	echo '</td>';
	echo '</tr>';

}
?>
                  </tbody>
            </table>
        </div>
    </div> 
  </body>
</html>

