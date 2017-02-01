<?php
  include_once ('../modele/get_info.php');

  if(isset($_POST['submit'])){

	$nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $cne = $_POST['cne'];
    $email = $_POST['email'];
    $ville = $_POST['ville'];
    $password = $_POST['password'];
    $codePostale = $_POST['codePostale'];

    $valid = true;
	$errors = array();

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
    }else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
    }

    if($valid) {
            addUser($cne,$nom,$prenom,$email,md5($password),$ville,$codePostale);
            header("Location: ../vue/admin.php");
	}


  }else 
				echo 'Error!';
?>
