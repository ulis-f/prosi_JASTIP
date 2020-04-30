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
        $waktuAwal = $_POST['waktuAsal'];
        $waktuAkhir = $_POST['waktuTujuan'];
        $fotoTiket = $_FILES['fotoTiket']['name'];

        $queryAsal = "SELECT `idKota` FROM `kota` WHERE `namaKota` LIKE '$asal'";
        $queryAsal_result = $this->db->executeSelectQuery($queryAsal);
        $hasilAsal = $queryAsal_result[0];

        $queryTujuan = "SELECT `idKota` FROM `kota` WHERE `namaKota` LIKE '$tujuan'";
        $queryTujuan_result = $this->db->executeSelectQuery($queryTujuan);
        $hasilTujuan = $queryTujuan_result[0];

        $query = "INSERT INTO `trip` (`idTrip`, `waktuAwal`, `waktuAkhir`, `statusTrip`, `gambarTrip`, `idKota1`, `idKota2`) 
        VALUES (NULL, '$waktuAwal', '$waktuAkhir', 'null', $fotoTiket, '$hasilAsal', '$hasilTujuan')";
        $query_result = $this->db->executeNonSelectQuery($query);  

        $oldnametiket = $_FILES['fotoTiket']['tmp_name'];
		    $newnametiket = dirname(__DIR__) . "\\view\image\\" . $fotoTiket;
		    move_uploaded_file($oldnametiket, $newnametiket);   
    }
}
?>