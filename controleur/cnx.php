<?php
if(isset($_POST['email']) && isset($_POST['password'])){
	require_once('../modele/get_info.php');
	$email = $_POST['email'];
	$pass = md5($_POST['password']);
	$f = get_info($email, $pass);
	if($f['type'] == "etudiant"){
		session_start();
		$_SESSION['logged-in'] = true;
		$_SESSION["cne"] = $f['cne'];
		$_SESSION["email"] = $f['email'];
		$_SESSION["nom"] = $f['nom'];
		$_SESSION["prenom"] = $f['prenom'];
		$_SESSION["codePostale"] = $f['codePostale'];
		$_SESSION["ville"] = $f['ville'];
		$_SESSION["type"] = $f['type'];
		header('Location: ../vue/form.php');
	}elseif($f['type'] == "admin"){
		session_start();
		$_SESSION['logged-in'] = true;
		$_SESSION["cne"] = $f['cne'];
		$_SESSION["type"] = $f['type'];
		header('Location: ../vue/admin.php');
	}else
		//echo "Compte invalide";
		header('Location: ../index.php');
}


?>