<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/user.php";

class tripController{
	protected $db;

	public function __construct(){
		$this->db = new MySQLDB("localhost","root","","titipaja");
    }

    public function view_posttrip(){
        $title = "titipaja.com - Post Trip";
		if(isset($_SESSION['nama']) && !empty($_SESSION['nama'])) {
			$nama = $_SESSION['nama'];
		}
		else{
			$nama = null;
		}
		return view::createView('postTrip.php',["nama"=>$nama,"title"=>$title]);
    }

    public function insertTrip(){
        $asal = $_POST['asal'];
        $tujuan = $_POST['tujuan'];
        $fotoTiket = $_FILES['fotoTiket']['name'];

        $waktuAwal = new DateTime($_POST['waktuAsal']);
        $waktuA = $waktuAwal->format("Y-m-d H:i:s");

        $waktuTujuan = new DateTime($_POST['waktuTujuan']);
        $waktuT = $waktuTujuan->format("Y-m-d H:i:s");

        $queryAsal = "SELECT `idKota` FROM `kota` WHERE `namaKota` LIKE '$asal'";
        $queryAsal_result = $this->db->executeSelectQuery($queryAsal);
        $hasilAsal = $queryAsal_result[0]['idKota'];
        

        $queryTujuan = "SELECT `idKota` FROM `kota` WHERE `namaKota` LIKE '$tujuan'";
        $queryTujuan_result = $this->db->executeSelectQuery($queryTujuan);
        $hasilTujuan = $queryTujuan_result[0]['idKota'];
    


        $query = "INSERT INTO trip (waktuAwal, waktuAkhir,statusTrip, gambarTrip, idKota1, idKota2) 
        VALUES ('$waktuA', '$waktuT', 'pending' , '$fotoTiket', '$hasilAsal', '$hasilTujuan')";
        $query_result = $this->db->executeNonSelectQuery($query);  

        $oldnametiket = $_FILES['fotoTiket']['tmp_name'];
		    $newnametiket = dirname(__DIR__) . "\\view\image\\" . "\\trip\\" . $fotoTiket;
        move_uploaded_file($oldnametiket, $newnametiket);  
        
        
        if ($_FILES["fotoKTP"]["size"] > 10000000) {
            echo "Maaf, file anda melebihi batas.";
            $uploadOk = 0;
        }

        if ($_FILES["fotoSelfie"]["size"] > 10000000) {
            echo "Maaf, file anda melebihi batas.";
            $uploadOk = 0;
        }

        $nama = $_SESSION['nama'];
        $queryUser = "SELECT `idUser` FROM `user` WHERE `namaUser` LIKE '$nama'";
        $queryUser_result = $this->db->executeSelectQuery($queryUser);

        $queryTrip = "SELECT `idTrip` FROM `trip` WHERE `idKota1` = '$hasilAsal' AND `idKota2` = '$hasilTujuan' AND `waktuAwal` = '$waktuA'
        AND `waktuAkhir` = '$waktuT'";
        $queryTrip_result = $this->db->executeSelectQuery($queryTrip);

        $fk_user = $queryUser_result[0]['idUser'];
        $fk_trip = $queryTrip_result[0]['idTrip'];

        $queryInsert = "INSERT INTO transaksi(idUser1,idTrip) VALUES ('$fk_user','$fk_trip')";
        $queryInsert_result = $this->db->executeNonSelectQuery($queryInsert);

        $queryInsert1 = "INSERT INTO post(idUser,idTrip) VALUES ('$fk_user','$fk_trip')";
        $queryInsert_result1 = $this->db->executeNonSelectQuery($queryInsert1);

        $query_idUser = "SELECT idUser FROM `user` WHERE `namaUser` LIKE '$nama'";
		$query_idUser_result = $this->db->executeSelectQuery($query_idUser);
		$idUser = $query_idUser_result[0]['idUser'];
		$timezone = new DateTimeZone('Asia/Jakarta');
		$date = new DateTime();
		$date->setTimeZone($timezone);
		$now = $date->format('Y-m-d H:i:s');

		$queryNotifikasi = "INSERT INTO notifikasi VALUES('$idUser',null, 'Verifikasi Pending','Trip anda sedang diproses',0,'$now')";
		$queryNotifikasi_result = $this->db->executeNonSelectQuery($queryNotifikasi);
    }
}
?>