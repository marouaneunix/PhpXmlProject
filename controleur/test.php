<?php
session_start();
if(require_once ('upfile.php')){	
	
	
	
	$fa = array(new upfile('prj'), new upfile('rap'));
		if($fa[0]->checkExtension($fa[0]->getFile(), upfile::$EXTPRJ) && $fa[1]->checkExtension($fa[1]->getFile(), upfile::$EXTRAP)){

					foreach ($fa as $val){
						if($val->upFichier($val->getFile())){
						
						}}
						
						$lienprj = upfile::$LINKUP.$_FILES[$fa[0]->getFile()]['name'];
						$lientrap = upfile::$LINKUP.$_FILES[$fa[1]->getFile()]['name'];
						$cne = $_SESSION["cne"];
						$email = $_SESSION["email"];
						$nom = $_SESSION["nom"];
						$prenom = $_SESSION["prenom"];
						$codePostale = $_SESSION["codePostale"];
						$ville = $_SESSION["ville"];
						$intitule = $_POST['intitule'];
						$domaine = $_POST['domaine'];
						$dure = $_POST['dure'];
						$desc = $_POST['desc'];
						$keyprj = explode(' ', $_POST['keyprj']);
							
						$xml = new DOMDocument("1.0","UTF-8");
						$xml->load("../xmldb/base.xml");
						$rootTag = $xml->getElementsByTagName("document")->item(0);
						$souRootTag = $xml->createElement("Etudiant");
						$attr_Etud = new DOMAttr('cne', $cne);
						$souRootTag->setAttributeNode($attr_Etud);
						$nomTag = $xml->createElement("nom",$nom);
						$prenomTag = $xml->createElement("prenom",$prenom);
						$intituleTag = $xml->createElement("intitule",$intitule);
						//address elements
						$addr = $xml->createElement("adresse");
						$CodePTag = $xml->createElement("codePostale",$codePostale);
						$villeTag = $xml->createElement("ville",$ville);
						$addr->appendChild($CodePTag);
						$addr->appendChild($villeTag);
						//projet element
						$projet = $xml->createElement("sujet");
						$keyWords = $xml->createElement("key_Words");
						foreach ($keyprj as $key => $val) {
							$keey[$key] = $xml->createElement("key_Word", $val);
						}
						foreach ($keey as $value) {
							$keyWords->appendChild($value);
						}
						$domaineTag = $xml->createElement("domaine",$domaine);
						$dureTag = $xml->createElement("dure",$dure);
						$descTag = $xml->createElement("description",$desc);
						$prjTag = $xml->createElement("projet",$lienprj);
						$rapTag = $xml->createElement("rapport",$lientrap);
						$projet->appendChild($domaineTag);
						$projet->appendChild($dureTag);
						$projet->appendChild($descTag);
						$projet->appendChild($prjTag);
						$projet->appendChild($rapTag);
						$projet->appendChild($keyWords);
						

						$souRootTag->appendChild($nomTag);
						$souRootTag->appendChild($prenomTag);
						$souRootTag->appendChild($intituleTag);
						$souRootTag->appendChild($addr);
						$souRootTag->appendChild($projet);
						$rootTag->appendChild($souRootTag);
				
						$xml->save("../xmldb/base.xml");
						echo '<h1>Enregitrement Terminer<h1>';
						echo '<button type="button" class="btn btn-warning  pull-right"><a href="../controleur/logout.php">Logout</a></button></div>'; 

			}

		else echo "nonon";
}	
	else 
		echo "no";

	
	

	
?>
