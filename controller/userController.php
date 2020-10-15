<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/user.php";
require_once "model/trip.php";
require_once "model/transaksi.php";
require_once "model/kategori.php";
require_once "model/notifikasi.php"; 
require_once "model/detailOffer.php"; 
class UserController{
	protected $db;

	public function __construct(){
		$this->db = new MySQLDB("localhost","root","","titipaja");
	}

	public function view_user(){
		$title = "titipaja.com - index";
		$result = $this->getTraveller();
		if(isset($_SESSION['nama']) && !empty($_SESSION['nama'])) {
			$nama = $_SESSION['nama'];
		}
		else{
			$nama = null;
		}
		if(isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {
			$auth = $_SESSION['auth'];
		}
		else{
			$auth = 1;
		}
		$lengkap = $this->cekMelengkapiPendaftaran($nama);  
		
		return view::createView('halamanUtamaMember.php',["nama"=>$nama,"title"=>$title,"auth"=>$auth,"result"=>$result,"lengkap"=>$lengkap]);
	}
	public function view_getPencarian(){
		$title = "titipaja.com - index";
		$result = $this->getPencarian();
		if(isset($_SESSION['nama']) && !empty($_SESSION['nama'])) {
			$nama = $_SESSION['nama'];
		}
		else{
			$nama = null;
		}
		if(isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {
			$auth = $_SESSION['auth'];
		}
		else{
			$auth = 1;
		}
		$lengkap = $this->cekMelengkapiPendaftaran($nama);
		
		return view::createView('halamanUtamaMember.php',["nama"=>$nama,"title"=>$title,"auth"=>$auth,"result"=>$result,"lengkap"=>$lengkap]);
	}

	public function view_lengkap(){
		$nama = $_SESSION['nama'];  
		$title = "titipaja.com - Melengkapi Pendaftaran";
		return view::createView('lengkapiPendaftaran.php',["nama"=>$nama,"title"=>$title]);
	}

	public function view_titipBarang(){
		$nama = $_SESSION['nama'];
		$title = "titipaja.com - Titip Barang";
		return view::createView('titipBarang.php',["nama"=>$nama,"title"=>$title]);   
	}

	public function view_register(){
		return view::createViewRegister('register.php',[]);
	}  

	public function view_Admin(){
		return view::createViewAdmin('homeAdmin.php',[]);
	}

	public function view_Market(){
		$result = $this->getWanted();
		if(isset($_SESSION['nama']) && !empty($_SESSION['nama'])) {
			$nama = $_SESSION['nama'];
		}
		else{
			$nama = null;
		}
		if(isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {
			$auth = $_SESSION['auth'];
		}
		else{
			$auth = 1;
		}
		$title = "titipaja.com - Market";
		return view::createViewMarket('market.php',["nama"=>$nama,"title"=>$title,"auth"=>$auth, "result"=>$result]);    
	}

	public function view_marketWanted(){
		if(isset($_SESSION['nama']) && !empty($_SESSION['nama'])) {
			$nama = $_SESSION['nama'];
		}
		else{
			$nama = null;
		}
		$title = "titipaja.com - Market"; 
		return view::createViewMarket('wantedItem.php',["nama"=>$nama, "title"=>$title]);
	}

	public function view_addWanted(){
		$kategori = $this->getKategori();
		if(isset($_SESSION['nama']) && !empty($_SESSION['nama'])) {
			$nama = $_SESSION['nama'];
		}
		else{
			$nama = null;  
		}
		$title = "titipaja.com - Market";
		return view::createViewMarket('wantedItem.php',["nama"=>$nama, "title"=>$title, "kategori"=>$kategori]);
	}

	public function view_marketOffer(){
		$result = $this->getOffer();
		if(isset($_SESSION['nama']) && !empty($_SESSION['nama'])) {
			$nama = $_SESSION['nama'];
		}
		else{
			$nama = null;
		}
		if(isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {
			$auth = $_SESSION['auth'];
		}
		else{
			$auth = 1;
		}
		$title = "titipaja.com - Market"; 
		return view::createViewMarket('marketOfferItem.php',["nama"=>$nama, "title"=>$title,"auth"=>$auth, "result"=>$result]);
	}

	public function view_addOffer(){
		$result = $this->getTripSendiriOffer();
		$kategori = $this->getKategori();
		if(isset($_SESSION['nama']) && !empty($_SESSION['nama'])) {
			$nama = $_SESSION['nama'];
		}
		else{
			$nama = null;
		}
		$title = "titipaja.com - Market"; 
		return view::createViewMarket('offerItem.php',["nama"=>$nama, "title"=>$title, "result"=>$result, "kategori"=>$kategori]);   
	}  

	public function view_detailBarangMarketWanted(){
		$nama = $_SESSION['nama'];
        $namaBarang = $_GET['namaBarang'];
        $idUser = $_GET['id'];
        $result = $this->getDetailBarangMarket($namaBarang, $idUser);
        return view::createViewMarket("detailBarangWanted.php",["nama"=>$nama, "result"=>$result]);  
    }
	public function view_detailBarangMarketOffer(){
		$nama = $_SESSION['nama'];
        $namaBarang = $_GET['namaBarang'];
        $idUser = $_GET['id'];
        $result = $this->getDetailBarangOffer($namaBarang, $idUser);
        return view::createViewMarket("detailBarangOffer.php",["nama"=>$nama, "result"=>$result]);  
    }

	public function view_profileUser(){
		$nama = $_SESSION['nama'];
		$foto = $this->getFotoProfile();
		$result = $this->getTripSendiri(); 
		$resultA = $this->getProfileSendiri();
		$title = "titipaja.com - Profile User";
		return view::createView('profileUser.php',["nama"=>$nama, "title"=>$title, "result"=>$result, "resultA"=>$resultA, "foto"=>$foto]);
	}

	public function view_profileTraveller(){
		$nama = $_SESSION['nama'];
		$result = $this->getTripSendiri(); 
		$title = "titipaja.com - Profile User";
		return view::createView('profileTraveller.php',["nama"=>$nama, "title"=>$title, "result"=>$result]);
	}

	public function view_profileTraveller1(){
		$nama = $_GET['nama'];
        $result = $this->getProfileTraveller($nama);    
		return view::createView('profileTraveller.php',["title"=>$title, "result"=>$result]);  
	}

	public function getProfileTraveller($nama){
        $query = "SELECT himpA.idTrip,himpA.gambarTrip, himpA.waktuAwal,himpA.waktuAkhir,himpA.namaKota 
			as 'kota_Awal', kota.namaKota as 'kota_tujuan' 
			FROM kota inner join (SELECT * FROM trip inner join kota on trip.idKota1 = kota.idKota ) 
			as himpA on kota.idKota = himpA.idKota2 inner join post on post.idTrip = himpA.idTrip 
			inner join user on user.idUser= post.idUser WHERE user.namaUser = '$nama' "; 
        $query_result = $this->db->executeSelectQuery($query);
        $result=[];
        foreach($query_result as $key =>$value){  
            $result[] = new Trip(null,null, null, $value['waktuAwal'], $value['waktuAkhir'], $value['kota_Awal'], $value['kota_tujuan']);
        }   
        return $result;   
	}
	
	public function getTripSendiri(){
		$nama = $_SESSION['nama'];
        $query = "SELECT himpA.idTrip,himpA.gambarTrip, himpA.waktuAwal,himpA.waktuAkhir,himpA.namaKota 
			as 'kota_Awal', kota.namaKota as 'kota_tujuan' 
			FROM kota inner join (SELECT * FROM trip inner join kota on trip.idKota1 = kota.idKota ) 
			as himpA on kota.idKota = himpA.idKota2 inner join post on post.idTrip = himpA.idTrip 
			inner join user on user.idUser= post.idUser WHERE user.namaUser like '$nama' "; 
        $query_result = $this->db->executeSelectQuery($query);
        $result=[];
        foreach($query_result as $key =>$value){  
            $result[] = new Trip(null,null, $value['idTrip'], $value['waktuAwal'], $value['waktuAkhir'], $value['kota_Awal'], $value['kota_tujuan']);
        }   
        return $result;   
	}
	
	public function getTripSendiriOffer(){
		$nama = $_SESSION['nama'];
        $query = "SELECT himpA.idTrip,himpA.gambarTrip, himpA.waktuAwal,himpA.waktuAkhir,himpA.namaKota 
			as 'kota_Awal', kota.namaKota as 'kota_tujuan' 
			FROM kota inner join (SELECT * FROM trip inner join kota on trip.idKota1 = kota.idKota ) 
			as himpA on kota.idKota = himpA.idKota2 inner join post on post.idTrip = himpA.idTrip 
			inner join user on user.idUser= post.idUser WHERE user.namaUser like '$nama' "; 
        $query_result = $this->db->executeSelectQuery($query);
        $result=[];
        foreach($query_result as $key =>$value){  
            $result[] = new Trip(null,null, $value['idTrip'], $value['waktuAwal'], $value['waktuAkhir'], $value['kota_Awal'], $value['kota_tujuan']);
        }   
        return $result;   
	}

	public function getProfileSendiri(){
		$nama = $_SESSION['nama'];
		$query = "SELECT namaUser,email,nohp,alamat FROM user WHERE namaUser like '$nama' ";
		$query_result = $this->db->executeSelectQuery($query);
		$result=[];
		foreach($query_result as $key =>$value){  
            $result[] = new user(null,$value['namaUser'], null, $value['alamat'], $value['nohp'], $value['email'], null,null,null,null,null,null);
        }   
        return $result; 
	}

	public function getFotoProfile(){
		$nama = $_SESSION['nama'];
		$query = "SELECT gambarProfile FROM user WHERE namaUser LIKE '$nama'";
		$query_result = $this->db->executeSelectQuery($query);
		$result=[];
		foreach($query_result as $key => $value){
			$result[] = new user(null,null, null, null, null, null, null,null,null,null,null,$value['gambarProfile']);
		}
		return $result;
	}
	

	public function getTraveller(){
        $query = "SELECT user.namaUser, himpA.idTrip,himpA.gambarTrip, himpA.waktuAwal,himpA.waktuAkhir,himpA.namaKota 
			as 'kota_Awal', kota.namaKota as 'kota_tujuan' 
			FROM kota inner join (SELECT * FROM trip inner join kota on trip.idKota1 = kota.idKota WHERE statusTrip = 'verified') 
			as himpA on kota.idKota = himpA.idKota2 inner join post on post.idTrip = himpA.idTrip 
			inner join user on user.idUser= post.idUser";
		
		$query_result = $this->db->executeSelectQuery($query);
        $result=[];
        foreach($query_result as $key =>$value){
			$dateAwal = new DateTime($value['waktuAwal']);
			$dateAkhir = new DateTime($value['waktuAkhir']);
			$today = date("Y-m-d H:i:s");
			if($dateAwal->format('Y-m-d H:i:s')>$today && $dateAkhir->format('Y-m-d H:i:s')<$today){
				$result[] = new Trip($value['namaUser'],null, null, $value['waktuAwal'], $value['waktuAkhir'], $value['kota_Awal'], $value['kota_tujuan'],null);
			}
        }   
        return $result;   
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
				$_SESSION['noHp'] = $query_result[0]['nohp'];
				$_SESSION['alamat'] = $query_result[0]['alamat'];    
				$_SESSION['auth'] =1;
			}	
			else{
				$_SESSION['auth'] =0;
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
				SET `isTraveller` = 'pending', `gambarKTP` = '$fotoktp', `swafoto` = '$fotoselfie', `namaBank` = '$namabank', `norek` = '$norek', `noKTP` = '$nik'
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

	public function cekMelengkapiPendaftaran($nama){
		$lengkap = 0;
		if($nama!=null){
			$query = "SELECT isTraveller FROM user WHERE namaUser LIKE '$nama'";
	
			$query_result = $this->db->executeSelectQuery($query);
	
			if($query_result[0]['isTraveller']=='verified'){
				$lengkap = 1;
			}
			else if($query_result[0]['isTraveller']=='pending'){
				$lengkap = 2;
			}
		}
		return $lengkap;
	}

	public function updateProfileUser(){
		$nama = $_SESSION['nama'];
		

		$nama1 = $_POST['updateNama'];
		$telepon1 = $_POST['updateTelepon'];
		$email1 = $_POST['updateEmail'];
		$alamat1 = $_POST['updateAlamat'];
		$foto = $_FILES['updateFoto']['name'];
		
		
		$oldnameprofile = $_FILES['updateFoto']['tmp_name'];
		$newnameprofile = dirname(__DIR__) . "\\view\image\\" . $foto;
		move_uploaded_file($oldnameprofile, $newnameprofile);

		$query = "UPDATE `user` 
				SET `namaUser`='$nama1',`email`='$email1',`nohp`='$telepon1',`alamat`='$alamat1' , `gambarProfile`='$foto'
				WHERE `namaUser` like '$nama' ";
		$query_result =$this->db->executeNonSelectQuery($query);
		$_SESSION['nama'] = $nama1;  
		
	}

	public function getPencarian(){
		$negara = $_GET['country'];

		$query = "SELECT user.namaUser, himpA.idTrip,himpA.gambarTrip, himpA.waktuAwal,himpA.waktuAkhir,himpA.namaKota 
		as 'kota_Awal', kota.namaKota as 'kota_tujuan' 
		FROM kota inner join (SELECT provinsi.namaProvinsi, provinsi.idNegara, himpKota.idTrip, himpKota.waktuAwal, himpKota.waktuAkhir, himpKota.statusTrip, himpKota.gambarTrip, himpKota.idKota1, himpKota.idKota2, himpKota.idKota, himpKota.namaKota FROM provinsi inner join (SELECT * FROM trip inner join kota on trip.idKota1 = kota.idKota WHERE statusTrip = 'verified') 
		as himpKota on provinsi.idProvinsi = himpKota.idProvinsi WHERE idNegara = (SELECT idNegara FROM negara WHERE namaNegara = '$negara'))
		as himpA on kota.idKota = himpA.idKota2 inner join post on post.idTrip = himpA.idTrip 
		inner join user on user.idUser= post.idUser";
        $query_result = $this->db->executeSelectQuery($query);
        $result=[];
        foreach($query_result as $key =>$value){
            $result[] = new Trip($value['namaUser'],null, null, $value['waktuAwal'], $value['waktuAkhir'], $value['kota_Awal'], $value['kota_tujuan'],null);
        }   
        return $result;  
	}

	public function getKategori(){
		$query = "SELECT * FROM kategori";
		$query_result = $this->db->executeSelectQuery($query);
		$result=[];
		foreach($query_result as $key=>$value){
			$result[] = new Kategori($value['idKategori'], $value['namaKategori']);
		}
		return $result;
	}

	public function getOffer(){
		$query = "SELECT * FROM transaksi WHERE statusBarang LIKE 'onMarketOffer'";
		$query_result = $this->db->executeSelectQuery($query);
		$result=[];
		foreach($query_result as $key=>$value){
			$result[]= new transaksi($value['idUser1'],null,null,null,$value['hargaBarang'],null,null,$value['namaBarang'],null,null,$value['gambarBarang'],null,null);
		}
		return $result;
	}

	public function getWanted(){
		$query = "SELECT * FROM transaksi WHERE statusBarang LIKE 'onMarketWanted'";
		$query_result = $this->db->executeSelectQuery($query);
		$result=[];
		foreach($query_result as $key=>$value){
			$result[]= new transaksi($value['idUser1'],null,null,null,null,null,null,$value['namaBarang'],null,null,$value['gambarBarang'],null,null);
		}
		return $result;
	}

	public function insertBarangOffer(){
		$nama = $_SESSION['nama'];
		$idTrip = $_POST['trip'];
		$namaBarang = $_POST['namaBarang'];
		$kategori = $_POST['kartegoriBarang'];
		$hargaDiJual = $_POST['hargaDiJual'];
		$hargaTotal = $_POST['totalHarga'];
		$hargaJasa = $hargaTotal - $hargaDiJual;
		$deskripsiBarang = $_POST['deskripsiBarang'];
		$gambar = $_FILES['gambar']['name'];
		$idKategori = $_POST['kategori'];

		$oldnamegambar = $_FILES['gambar']['tmp_name'];
		$newnamegambar = dirname(__DIR__) . "\\view\image\market\\" . $gambar;
		move_uploaded_file($oldnamegambar, $newnamegambar);

		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama'";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);    

		$fk_idUser = $query_idUser_result[0]['idUser'];

		$query = "INSERT INTO transaksi(idUser1,idTrip,idUser2,jumlahBarang,hargaBarang,hargaOngkir,hargaJasa,namaBarang,statusBarang,deskripsiBarang,gambarBarang,noresi,idKategori) 
		VALUES ('$fk_idUser','$idTrip',null,null,'$hargaDiJual',null,'$hargaJasa','$namaBarang','onPending','$deskripsiBarang','$gambar',null,$idKategori)";
		$query_result = $this->db->executeNonSelectQuery($query);    

		$query_notifikasi = "INSERT INTO Notifikasi(idUser,namaNotifikasi,deskripsi,statusView,dateTime)
		VALUES ('$fk_idUser','Berhasil Upload', 'Anda telah berhasil mengupload barang', '0', '2020-03-03 12:00:00')";
		$query_result1 = $this->db->executeNonSelectQuery($query_notifikasi);   
	}

	public function insertBarangWanted(){
		$nama = $_SESSION['nama'];
		$namaBarang = $_POST['nama'];
		$jumlah = $_POST['jumlah'];
		$deskripsi = $_POST['deskripsi'];
		$idkategori = $_POST['kategori'];
		$gambar = $_FILES['gambar']['name'];

		$oldnamegambar = $_FILES['gambar']['tmp_name'];
		$newnamegambar = dirname(__DIR__) . "\\view\image\market\\" . $gambar;
		move_uploaded_file($oldnamegambar, $newnamegambar);

		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama'";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);     

		$fk_idUser = $query_idUser_result[0]['idUser'];

		$query = "INSERT INTO transaksi(idUser1,idTrip,idUser2,jumlahBarang,hargaBarang,hargaOngkir,hargaJasa,namaBarang,statusBarang,deskripsiBarang,gambarBarang,noresi,idKategori) 
		VALUES ('$fk_idUser',null,null,'$jumlah',null,null,null,'$namaBarang','onPendingWanted','$deskripsi','$gambar',null,$idkategori)";
		$query_result = $this->db->executeNonSelectQuery($query);
	}

	public function getNotifikasi(){
		$nama = $_SESSION['nama'];
		$query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama'";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);  

		$idUser = $query_idUser_result[0]['idUser'];

		$query = "SELECT * FROM notifikasi WHERE idUser = '$idUser'";
		$query_result = $this->db->executeSelectQuery($query);
		$result=[];
		foreach($query_result as $key=>$value){
			$result[]= new notifikasi(null,null,$value['namaNotifikasi'],$value['deskripsi'],null,$value['dateTime']);
		}
		return $result;	 
	}

	public function getDetailBarangMarket($namaBarang, $idUser){
        $query = "SELECT * FROM transaksi inner join kategori on transaksi.idKategori = kategori.idKategori 
		WHERE transaksi.namaBarang LIKE '$namaBarang' AND transaksi.statusBarang LIKE 'onMarketWanted' AND transaksi.idUser1='$idUser'";
         $query_result = $this->db->executeSelectQuery($query);
         $result = [];
         foreach($query_result as $key => $value){
             $result[] = new Transaksi(null,null,null,$value['jumlahBarang'],null,null,null,$value['namaBarang'],$value['statusBarang'],$value['deskripsiBarang'],$value['gambarBarang'],null,$value['namaKategori']);
         }
         return $result;  
	}
	
	public function getDetailBarangOffer($namaBarang, $idUser){
        $query = "SELECT kota.namaKota, trip.waktuAkhir, jumlahBarang, namaBarang, statusBarang, hargaBarang,gambarBarang,  deskripsiBarang, namaKategori FROM transaksi 
		inner join kategori on transaksi.idKategori = kategori.idKategori inner join trip on trip.idTrip = transaksi.IdTrip inner join kota on kota.idKota = trip.idKota2
		WHERE transaksi.namaBarang LIKE '$namaBarang' AND transaksi.statusBarang LIKE 'onMarketOffer' AND transaksi.idUser1='$idUser'";
         $query_result = $this->db->executeSelectQuery($query);
         $result = [];
         foreach($query_result as $key => $value){
             $result[] = new Offer($value['deskripsiBarang'],$value['namaKota'],$value['waktuAkhir'],$value['namaBarang'],$value['statusBarang'],$value['namaKategori'],$value['hargaBarang'],$value['gambarBarang']);
         }
         return $result;  
    }
	
}


?>
