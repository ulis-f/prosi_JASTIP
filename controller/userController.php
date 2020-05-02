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

	public function view_lengkap(){
		$nama = $_SESSION['nama'];
		$title = "titipaja.com - Melengkapi Pendaftaran";
		return view::createView('lengkapiPendaftaran.php',["nama"=>$nama,"title"=>$title]);
	}

	public function view_register(){
		return view::createViewRegister('register.php',[]);
	}

	public function view_Admin(){
		return view::createViewRegister('homeAdmin.php',[]);
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
		$queryProvinsi = "SELECT `idProvinsi`, `namaProvinsi` FROM `provinsi` WHERE `namaProvinsi` LIKE '$provinsi' ";
		$queryProvinsi_result = $this->db->executeSelectQuery($queryProvinsi);
		if($queryProvinsi_result[0]['idProvinsi']==null){
			$query = "INSERT INTO provinsi(namaProvinsi,idNegara) VALUES ('$provinsi','$fk_negara')";
			$query_result = $this->db->executeNonSelectQuery($query);
			
		}

		$queryProvinsi2 = "SELECT `idProvinsi`, `namaProvinsi` FROM `provinsi` WHERE `namaProvinsi` LIKE '$provinsi' ";
		$queryProvinsi_result2 = $this->db->executeSelectQuery($queryProvinsi2);

		$fk_provinsi = $queryProvinsi_result2[0]['idProvinsi'];
		$queryKota = "SELECT `idKota`,`namaKota` FROM `kota` WHERE `namaKota` LIKE '$kota' ";
		$queryKota_result = $this->db->executeSelectQuery($queryKota);
		if($queryKota_result[0]['idKota']==null){
			$query = "INSERT INTO kota(namaKota,idProvinsi) VALUES ('$kota','$fk_provinsi')";
			$query_result = $this->db->executeNonSelectQuery($query);    
		}


		$queryKota2 = "SELECT `idKota`,`namaKota` FROM `kota` WHERE `namaKota` LIKE '$kota' ";
		$queryKota_result2 = $this->db->executeSelectQuery($queryKota2);

		$fk_kota = $queryKota_result2[0]['idKota'];
		$queryKecamatan = "SELECT `idKecamatan`, `namaKecamatan` FROM `kecamatan` WHERE `namaKecamatan` LIKE '$kecamatan'";
		$queryKecamatan_result = $this->db->executeSelectQuery($queryKecamatan);
		if($queryKecamatan_result[0]['idKecamatan']==null){
			$query = "INSERT INTO kecamatan(namaKecamatan,idKota) VALUES('$kecamatan','$fk_kota')";
			$query_result = $this->db->executeNonSelectQuery($query);
		}

		$queryKecamatan2 = "SELECT `idKecamatan`, `namaKecamatan` FROM `kecamatan` WHERE `namaKecamatan` LIKE '$kecamatan'";
		$queryKecamatan_result2 = $this->db->executeSelectQuery($queryKecamatan2);

		$fk_kecamatan = $queryKecamatan_result2[0]['idKecamatan'];
		$queryKelurahan = "SELECT `idKelurahan`,`namaKelurahan` FROM `kelurahan` WHERE `namaKelurahan` LIKE '$kelurahan'";
		$queryKelurahan_result = $this->db->executeSelectQuery($queryKelurahan);
		if($queryKelurahan_result[0]['idKelurahan']==null){
			$query = "INSERT INTO kelurahan(namaKelurahan,idKecamatan) VALUES ('$kelurahan','$fk_kecamatan')";
			$query_result = $this->db->executeNonSelectQuery($query);
		}

		$queryKelurahan2 = "SELECT `idKelurahan`,`namaKelurahan` FROM `kelurahan` WHERE `namaKelurahan` LIKE '$kelurahan'";
		$queryKelurahan_result2 = $this->db->executeSelectQuery($queryKelurahan2);

		$fk_kelurahan = $queryKelurahan_result2[0]['idKelurahan'];  
		$query = "INSERT INTO user (namaUser,email,password,nohp,alamat,rating,isTraveller,gambarKTP,swafoto,norek,noKTP,idKelurahan) 
				VALUES ('$nama','$email','$password','$nohp','$alamat',null,null,null,null,null,null,'$fk_kelurahan')";
		$query_result = $this->db->executeNonSelectQuery($query);
		$_SESSION['nama'] = $nama;

	
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
	
	public function lengkapPendaftaran(){
		$nama = $_SESSION['nama'];
		$nik = $_POST['nik'];
		$namabank = $_POST['namaBank'];
		$norek = $_POST['noRek'];
		$fotoktp = $_FILES['fotoKTP']['name'];
		$fotoselfie = $_FILES['fotoSelfie']['name'];
		
		$oldnamektp = $_FILES['fotoKTP']['tmp_name'];
		$newnamektp = dirname(__DIR__) . "\\view\image\\" . $fotoktp;
		move_uploaded_file($oldnamektp, $newnamektp);
		
		$oldnameselfie = $_FILES['fotoSelfie']['tmp_name'];
		$newnameselfie = dirname(__DIR__) . "\\view\image\\" . $fotoselfie;
		move_uploaded_file($oldnameselfie,$newnameselfie);

		$query = "UPDATE `user` 
				SET `gambarKTP` = '$fotoktp', `swafoto` = '$fotoselfie', `namaBank` = '$namabank', `norek` = '$norek', `noKTP` = '$nik'
				WHERE `namaUser` LIKE '$nama'";
		$query_result = $this->db->executeNonSelectQuery($query);


		
		if ($_FILES["fotoKTP"]["size"] > 10000000) {
			echo "Maaf, file anda melebihi batas.";
			$uploadOk = 0;
		}
	
		if ($_FILES["fotoSelfie"]["size"] > 10000000) {
			echo "Maaf, file anda melebihi batas.";
			$uploadOk = 0;
		}
	}
}


?>