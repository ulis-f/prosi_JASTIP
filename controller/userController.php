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
		$result = $_SESSION['nama'];
		return view::createView('halamanUtamaMember.php',["result"=>$result]);
	}

	public function view_register(){
		return view::createViewRegister('register.php',[]);
	}

	public function login(){
		$nama = $_POST['nama'];
		$password = $_POST['password'];
		$kondisi = false;

		if (isset($nama) && isset($password) && $nama != "" && $password != "") {
			$query = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama' AND `password` LIKE '$password' ";
			$query_result = $this->db->executeSelectQuery($query);
			if($query_result[0]!=null){
				$kondisi = true;
				$_SESSION['nama'] = $query_result[0]['namaUser'];
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
		$nama = $_POST['nama'];
		$password = $_POST['password'];

		if (isset($nama) && isset($password) && $nama != "" && $password != "") {
			$id = $this->db->escapeString($id);
			$username = $this->db->escapeString($username);
			$query = "INSERT INTO user(namaUser, password) VALUES('$nama','$password')";
			$this->db->executeNonSelectQuery($query);
			$_SESSION['nama'] = $nama;
			$_SESSION['password'] = $password;
		}

	
	}

	public function hapusAkun(){
		$nama = $_SESSION['nama'];
		$query = "DELETE FROM user WHERE `namaUser` LIKE '$nama' ";
		$query_result =$this->db->executeNonSelectQuery($query);
	}

	public function updatePass(){
		$nama = $_SESSION['nama'];
		$password = $_POST['password'];
		$passwordBaru = $_POST['PasswordBaru'];
		$query = "UPDATE `user` 
				SET `password` = '$passwordBaru' 
				WHERE `namaUser` LIKE '$nama' AND `password` LIKE '$password' ";
		$query_result = $this->db->executeNonSelectQuery($query);
		$_SESSION['password'] = $passwordBaru;
	}
	// UPDATE `user` SET `password`= 12345678 WHERE `namaUser` LIKE 'quadratnp@gmail.com' AND `password` LIKE '1234567878'
	
}


?>