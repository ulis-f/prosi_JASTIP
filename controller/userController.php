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
		$title = "titipaja.com - index";
		if(isset($_SESSION['nama']) && !empty($_SESSION['nama'])) {
			$nama = $_SESSION['nama'];
		}
		else{
			$nama = null;
		}
		return view::createView('halamanUtamaMember.php',["nama"=>$nama,"title"=>$title]);
	}

	public function view_register(){
		return view::createViewRegister('register.php',[]);
	}

	public function login(){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$kondisi = false;

		if (isset($email) && isset($password) && $email != "" && $password != "") {
			$query = "SELECT * FROM `user` WHERE `email` LIKE '$email' AND `password` LIKE '$password' ";
			$query_result = $this->db->executeSelectQuery($query);
			if($query_result[0]!=null){
				$kondisi = true;
				$_SESSION['email'] = $query_result[0]['email'];
				$_SESSION['password'] = $query_result[0]['password'];
				$_SESSION['nama'] = $query_result[0]['namaUser'];
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
		$email = $_POST['email'];
		$password = $_POST['password'];
		$nohp = $_POST['noHp'];
		$alamat = $_POST['alamat'];
		$kelurahan = $_POST['kelurahan'];
		$kecamatan = $_POST['kecamatan'];
		$kota = $_POST['kota'];
		$provinsi = $_POST['provinsi'];
		
		$queryNegara = "SELECT * FROM `negara` WHERE `namaNegara` LIKE 'Indonesia'";
		$queryNegara_result = $this->db->executeSelectQuery($queryNegara);
		if($queryNegara_result[0]['idNegara']==NULL){
			$query = "INSERT INTO negara(namaNegara) VALUES('Indonesia')";
			$query_result = $this->db->executeNonSelectQuery($queryNegara);
		}
		$fk_negara = $queryNegara_result[0]['idNegara'];
		$queryProvinsi = "SELECT `idProvinsi`, `namaProvinsi` FROM `provinsi` WHERE `namaProvinsi` LIKE '$provinsi'";
		$queryProvinsi_result = $this->db->executeSelectQuery($queryProvinsi);
		if($queryProvinsi_result[0]['idProvinsi']==null){
			$query = "INSERT INTO provinsi(namaProvinsi,idNegara) VALUES ('$provinsi','$fk_negara')";
			$query_result = $this->db->executeNonSelectQuery($query);
			
		}
		$fk_provinsi = $queryProvinsi_result[0]['idProvinsi'];
		$queryKota = "SELECT `idKota`,`namaKota` FROM `kota` WHERE `namaKota` LIKE '$kota'";
		$queryKota_result = $this->db->executeSelectQuery($queryKota);
		if($queryKota_result[0]['idKota']==null){
			$query = "INSERT INTO kota(namaKota,idProvinsi) VALUES ('$kota','$fk_provinsi')";
			$query_result = $this->db->executeNonSelectQuery($query);
		}
		$fk_kota = $queryKota_result[0]['idKota'];
		$queryKecamatan = "SELECT `idKecamatan`, `namaKecamatan` FROM `kecamatan` WHERE `namaKecamatan` LIKE '$kecamatan'";
		$queryKecamatan_result = $this->db->executeSelectQuery($queryKecamatan);
		if($queryKecamatan_result[0]['idKecamatan']==null){
			$query = "INSERT INTO kecamatan(namaKecamatan,idKota) VALUES('$kecamatan','$fk_kota')";
			$query_result = $this->db->executeNonSelectQuery($query);
		}
		$fk_kecamatan = $queryKecamatan_result[0]['idKecamatan'];
		$queryKelurahan = "SELECT `idKelurahan`,`namaKelurahan` FROM `kelurahan` WHERE `namaKelurahan` LIKE '$kelurahan'";
		$queryKelurahan_result = $this->db->executeSelectQuery($queryKelurahan);
		if($queryKelurahan_result[0]['idKelurahan']==null){
			$query = "INSERT INTO kelurahan(namaKelurahan,idKecamatan) VALUES ('$kelurahan','$fk_kecamatan')";
			$query_result = $this->db->executeNonSelectQuery($query);
		}
		$fk_kelurahan = $queryKelurahan_result[0]['idKelurahan'];
		$queryUser = "SELECT `idUser` FROM user WHERE `email` LIKE '$email'";
		$queryUser_result = $this->db->executeSelectQuery($queryUser);
		if($queryUser_result[0]==null){
			
			$query = "INSERT INTO user (namaUser,email,password,nohp,alamat,rating,isTraveller,gambarKTP,swafoto,norek,noKTP,idKelurahan) 
					VALUES ('$nama','$email','$password','$nohp','$alamat',null,null,null,null,null,null,'$fk_kelurahan')";
			$query_result = $this->db->executeNonSelectQuery($query);
			$_SESSION['nama'] = $nama;
			
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