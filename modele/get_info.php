<?php
	include_once ('db.php');

	function get_info($email, $pass){
		$mysql = dbConn::getConnection();
		$resulte = $mysql->prepare("SELECT * FROM etudiant where email = :email AND password = :pass");
		$resulte->execute(array(':email' => $email, 'pass' => $pass));
		return $resulte->fetch(PDO::FETCH_ASSOC);
	}

	function get_All(){
		$mysql = dbConn::getConnection();
		return $mysql->query('SELECT * FROM etudiant where type = \'etudiant\'');

	}

	function get_cne($cne){
		$mysql = dbConn::getConnection();
		$q = $mysql->prepare("SELECT * FROM etudiant WHERE cne = ?");
		$q->execute(array($cne));
		return $q->fetch(PDO::FETCH_ASSOC);
	}

	function addUser($cne,$nom,$prenom,$email,$password,$ville,$codePostale){
		$mysql = dbConn::getConnection();
		$sql = "INSERT INTO etudiant (cne,email,nom,prenom,password,codePostale,ville,type) values(?, ?, ?, ?, ?, ?, ?, ?)";
		$q = $mysql->prepare($sql);
		$type = "etudiant";
		$q->execute(array($cne,$email,$nom,$prenom,$password,$codePostale,$ville,$type));
		$mysql = dbConn::disconnect();
		
	}

	function updateStudent($cne,$nom,$prenom,$email,$password,$ville,$codePostale){
		$mysql = dbConn::getConnection();
		$q = $mysql->prepare("UPDATE etudiant SET nom = ?, prenom = ?, email = ?, password = ?, ville = ?, codePostale = ? WHERE cne = ?");
		$q->execute(array($nom,$prenom,$email,$password,$ville,$codePostale,$cne));
		$mysql = dbConn::disconnect();
	}

	function deleteStudent($cne){
		$mysql = dbConn::getConnection();
		$q = $mysql->prepare("DELETE FROM etudiant WHERE cne = ?");
		$q->execute(array($cne));
		$mysql = dbConn::disconnect();
	}

?>
