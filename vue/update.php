<?php
session_start();
require ('../modele/get_info.php');

if($_SESSION['logged-in'] == false || $_SESSION['type'] != 'admin')
	header('Location: 404.php');

	$valid=false;

	if(isset($_POST['nom'])){

		$nomError = null;
		$cneError = null;
		$prenomError = null;
		$emailError = null;
		$villeError = null;
		$passwordError = null;
		$codePostaleError = null;
		
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$cne = $_POST['cne'];
		$email = $_POST['email'];
		$ville = $_POST['ville'];
		$password = $_POST['password'];
		$codePostale = $_POST['codePostale'];

		$valid = true;

		if(empty($nom)){
		  $nomError = 'Please enter Name';
		  $valid = false;
		}

		if(empty($codePostale)){
		  $codePostaleError = 'Please enter Code Postale';
		  $valid = false;
		}

		if(empty($prenom)){
		  $prenomError = 'Please enter Prenom';
		  $valid = false;
		}

		if(empty($cne)){
		  $cneError = 'Please enter CNE';
		  $valid = false;
		}

		if(empty($ville)){
		  $villeError = 'Please enter Ville';
		  $valid = false;
		}

		if(empty($password)){
		  $passwordError = 'Please enter Password';
		  $valid = false;
		}
		 if (empty($email)) {
			$emailError = 'Please enter Email Address';
			$valid = false;
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$emailError = 'Please enter a valid Email Address';
			$valid = false;
		}

	}

	if($valid) {  	
		updateStudent($cne,$nom,$prenom,$email,$password,$ville,$codePostale);
		header("Location: admin.php");
	}else {
		$data = get_cne($_GET['cne']);
		$cne = $data['cne'];
		$nom = $data['nom'];
		$prenom = $data['prenom'];
		$email = $data['email'];
		$password = $data['password'];
		$ville = $data['ville'];
		$codePostale = $data['codePostale'];
	}

	$data = get_cne($_GET['cne']);  
?>
<!DOCTYPE html>
<html>
<head>
    <link   href="../bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Update a Student</h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?cne=<?php echo $cne ?>" method="post">
                      <div class="control-group">
                        <label class="control-label">CNE</label>
                        <div class="controls">
                            <input name="cne" type="text"  placeholder="CNE" value="<?php echo $data['cne'];?>">
                            <?php if (!empty($cneError)): ?>
                                <span class="help-inline"></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">Nom</label>
                        <div class="controls">
                            <input name="nom" type="text"  placeholder="Nom" value="<?php echo $data['nom'];?>">
                            <?php if (!empty($nomError)): ?>
                                <span class="help-inline"></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Prenom</label>
                        <div class="controls">
                            <input name="prenom" type="text"  placeholder="Prenom" value="<?php echo $data['prenom'];?>">
                            <?php if (!empty($prenomError)): ?>
                                <span class="help-inline hil"></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Ville</label>
                        <div class="controls">
                            <input name="ville" type="text"  placeholder="Ville" value="<?php echo $data['ville'];?>">
                            <?php if (!empty($villeError)): ?>
                                <span class="help-inline"></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Code Postale</label>
                        <div class="controls">
                            <input name="codePostale" type="text"  placeholder="Code Postale" value="<?php echo $data['codePostale'];?>">
                            <?php if (!empty($codePostaleError)): ?>
                                <span class="help-inline"></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <input name="email" type="text" placeholder="Email Address" value="<?php echo $data['email']?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input name="password" type="password"  placeholder="Password" value="<?php echo $data['password']?>">
                            <?php if (!empty($passwordError)): ?>
                                <span class="help-inline"></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="admin.php">Back</a>
                        </div>
                    
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
