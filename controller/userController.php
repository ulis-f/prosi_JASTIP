<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/user.php";

class UserController{
	protected $db;

	public function __construct(){
		$this->db = new MySQLDB("localhost","root","","titipaja");
	}

	public function view_user(){
		$result = $_SESSION['username'];
		return view::createView('halamanUtamaMember.php',["result"=>$result]);
	}

	public function login(){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$kondisi = false;

		if (isset($username) && isset($password) && $username != "" && $password != "") {
			$query = "SELECT * FROM `user` WHERE `namaUser` LIKE '$username' AND `password` LIKE '$password' ";
			$query_result = $this->db->executeSelectQuery($query);
			if($query_result[0]!=null){
				$kondisi = true;
				$_SESSION['username'] = $query_result[0]['namaUser'];
				$_SESSION['password'] = $query_result[0]['password'];
			}	
		}
		return $kondisi;
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
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
		}

	
	}

	public function hapusAkun(){
		$username = $_SESSION['username'];
		$query = "DELETE FROM user WHERE `namaUser` LIKE '$username' ";
		$query_result =$this->db->executeNonSelectQuery($query);
	}

	public function updatePass(){
		$username = $_SESSION['username'];
		$password = $_POST['password'];
		$passwordBaru = $_POST['PasswordBaru'];
		$query = "UPDATE `user` 
				SET `password` = '$passwordBaru' 
				WHERE `namaUser` LIKE '$username' AND `password` LIKE '$password' ";
		$query_result = $this->db->executeNonSelectQuery($query);
		$_SESSION['password'] = $passwordBaru;
	}
	// UPDATE `user` SET `password`= 12345678 WHERE `namaUser` LIKE 'quadratnp@gmail.com' AND `password` LIKE '1234567878'
	
}


?>