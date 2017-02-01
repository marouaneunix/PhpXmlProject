<?php

class upfile {
	 
	public static $EXTPRJ = array('.rar', '.zip');
	public static $LOCATION = '../xmldb/dbase/';
	public static $EXTRAP = array('.pdf' , '.docx');
	public static $LINKUP = 'http://localhost/xml/xmldb/dbase/';
	
	private $file ;
	
	public function upfile($file){
		$this->file = $file;
	}
	
	public function getFile(){
		return $this->file;
	}
	
	public function checkExtension($file, $extention) {
		$ext = strrchr($_FILES[$file]['name'], '.');
		if(!in_array($ext,$extention))
			return false;
		else
			return true;
	}
	
	public function upFichier($file) {
		$fichier = basename($_FILES[$file]['name']);
		if(move_uploaded_file($_FILES[$file]['tmp_name'], $this::$LOCATION.$fichier))
			return true;
		else
			return false;
	}
}

?>
