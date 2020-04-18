<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/user.php";

class UserController{
	protected $db;

	public function __construct(){
		$this->db = new MySQLDB("localhost","root","","titipaja");
	}
	

	public function register(){
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (isset($username) && isset($password) && $username != "" && $password != "") {
			$id = $this->db->escapeString($id);
			$username = $this->db->escapeString($username);
			$query = "INSERT INTO user(namaUser, password) VALUES('$username','$password')";
			$this->db->executeNonSelectQuery($query);
		}
	}

	
}


?>