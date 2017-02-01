<?php
require_once("../modele/get_info.php");
$cne=0;
if(!empty($_GET['cne'])){
	$cne = $_REQUEST['cne'];
}
if(!empty($_POST)){
	$cne = $_POST['cne'];
	deleteStudent($cne);
	header("Location: admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Supprimer Etudiant</h3>
                    </div>
                     
                    <form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="cne" value="<?php echo $cne;?>"/>
                      <p class="alert alert-error">vous sûr de vouloir supprimer ?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Oui</button>
                          <a class="btn" href="admin.php">Non</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>