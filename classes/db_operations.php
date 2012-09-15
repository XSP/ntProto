<?php

class database_connect {

	private $db_name = DB_NAME;
	private $db_user = DB_USER;
	private $db_password = DB_PASSWORD;
	private $db_host = DB_HOST;
	private $open_connection;

	public function __construct() {
	    $this -> db_connect();
	}

	public function db_connect(){
		$this -> open_connection = mysql_connect($this -> db_host, $this -> db_user, $this -> db_password);
		if($this -> open_connection) {
			$database_select = mysql_select_db($this -> db_name, $this -> open_connection);
			if($database_select){
				$this -> database_select = true;
				return true;
			}
		}
		else {
			die("Unable to connect to database: ".mysql_error());
			return false;
		}
	}

	public function db_disconnect() {
		if(isset($this -> open_connection)) {
			$close_connection = mysql_close($this -> open_connection);
			if($close_connection){
				unset($this -> open_connection);
			}
			else{
			    die("Unable to disconnect from the database: ".mysql_error());
		    }
		}
	}

}

?>