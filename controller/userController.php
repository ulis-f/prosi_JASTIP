<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/user.php";

class UserController{
	protected $db;

	public function __construct(){
		$this->db = new MySQLDB("localhost","root","","titipaja");
	}

	public function login(){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$kondisi = false;

		if (isset($username) && isset($password) && $username != "" && $password != "") {
			$query = "SELECT * FROM user where namaUser = $username AND password = $password";
			$query_result = $this->db->executeSelectQuery($query);
			$cek = mysql_num_rows($query_result);

			if($cek>0){
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				$kondisi = true;
			}
			
			return $kondisi;
		}

	}

	public function logout(){
		session_unset();
		session_destroy();
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

	public function hapusAkun(){
		$username = $_SESSION['username'];
		$query = "DELETE FROM user WHERE namaUser = $username";
		$query_result =$this->db->executeNonSelectQuery($query);
	}

	public function updatePass(){
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		$usernameBaru = $_POST['usernameBaru'];
		$passwordBaru = $_POST['passwordBaru'];
		$query = "UPDATE user 
				SET namaUser = $usernameBaru, password = $passwordBaru 
				WHERE namaUser = $username AND password = $password";
		$query_result = $this->db->executeNonSelectQuery($query);
		$_SESSION['username'] = $usernameBaru;
		$_SESSION['password'] = $passwordBaru;
	}
	
}


?>