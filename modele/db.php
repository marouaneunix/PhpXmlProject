<?php

//db connection class using singleton pattern
class dbConn{

//variable to hold connection object.
protected static $db;

//private construct - class cannot be instatiated externally.
private function __construct() {

try {
	// assign PDO object to db variable
	self::$db = new PDO( 'mysql:host=localhost;dbname=xmldb', 'root', 'Marsql1$@' );
	self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
	catch (PDOException $e) {
//Output error - would normally log this to error file rather than output to user.
	echo "Connection Error: " . $e->getMessage();
	}

	}

// get connection function. Static method - accessible without instantiation
public static function getConnection() {

//Guarantees single instance, if no connection object exists then create one.
if (!self::$db) {
//new connection object.
new dbConn();
}

//return connection.
return self::$db;
}

public static function disconnect(){
	self::$db = null;
}

}//end class


?>
