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
    
        $oldnametiket = $_FILES['fotoTiket']['tmp_name'];
		$newnametiket = dirname(__DIR__) . "\\view\image\\" . "\\trip\\" . $fotoTiket;
        move_uploaded_file($oldnametiket, $newnametiket); 

        $query = "INSERT INTO trip (idTrip, waktuAwal, waktuAkhir,statusTrip, gambarTrip, idKota1, idKota2) 
        VALUES (null, $waktuA, $waktuT, null , '$fotoTiket', '$hasilAsal', '$hasilTujuan')";
        $query_result = $this->db->executeNonSelectQuery($query);    

        $queryUser = "SELECT `idUser` FROM `user` WHERE `namaUser` LIKE '$nama'";
        $queryUser_result = $this->db->executeSelectQuery($queryUser);
        $hasilUser = $queryUser_result[0]['idUser'];

        $queryTrip = "SELECT `idTrip` FROM `trip` WHERE `waktuAwal` LIKE '$waktuA' AND  `waktuAkhir` LIKE '$waktuT'";
        $queryTrip_result = $this->db->executeSelectQuery($queryTrip);
        $hasilTrip = $queryTrip_result[0]['idTrip'];
        
        $queryPost = "INSERT INTO post (idUser, idTrip) 
        VALUES ('$hasilUser','$hasilTrip')";
        $query_result = $this->db->executeNonSelectQuery($query);  
   
         
        
        
    }
}
?>