<?PHP

/*
 This file is stripped and reduced and anonymized for testing purposes.
 SB CORE LEGACY via 2012
*/

ini_set("display_errors", false);
error_reporting(E_ERROR);

date_default_timezone_set("America/Detroit");

define("PRODUCT","StockBrokers");
define("VERSION","2.0 2012");
define("PWD",dirname(__FILE__)."/");

function __autoload($className){
	if( file_exists(PWD.$className.".php") ){
			require_once(PWD.$className.".php");
			return true;
	}

	throw new Exception("Class '$className' not found");
}

class brain{
	public function __construct(){
		$this->db = new MongoClient();
		$this->db = $this->db->selectDB("sb");
	}
}