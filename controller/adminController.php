<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/trip.php";
require_once "model/user.php";

class adminController{
	protected $db;

	public function __construct(){
		$this->db = new MySQLDB("localhost","root","","titipaja");
    }

    public function view_index(){
        $result = $this->getPostTrip();
        return view::createViewAdmin('homeAdmin.php',["result"=>$result]);
    }

    public function view_persetujuan(){
        $id = $_GET['id'];
        $result = $this->getTrip($id);
        return view::createViewAdmin('persetujuanTrip.php',["result"=>$result]);
    }

    public function view_getProfile(){
        $result = $this->getProfile();
        return view::createViewAdmin('persetujuanPendaftaran.php',["result"=>$result]);
    }

    public function view_getProfileLengkap(){
        $id = $_GET['id'];
        $result = $this->getProfileLengkap($id);
        return view::createViewAdmin('detailPendaftaran.php', ["result"=>$result]);
    }

    public function getPostTrip(){
        // $nama = $_POST['nama'];
        $result =[];
        $query = "SELECT himpA.namaUser, trip.gambarTrip, trip.idTrip
                    FROM trip inner join 
                        (SELECT user.namaUser, transaksi.idTrip 
                        FROM user inner join transaksi on user.idUser = transaksi.idUser1 
                        WHERE user.isTraveller = 'verified') as himpA on trip.idTrip = himpA.idTrip 
                    WHERE trip.statusTrip = 'pending'";
        $query_result = $this->db->executeSelectQuery($query);
        foreach($query_result as $key => $value){
            $result[] = new Trip($value['namaUser'], $value['gambarTrip'], $value['idTrip'],null,null,null,null);
        }
        return $result;

    }

    public function getTrip($id){
        $query = "SELECT himpA.idTrip,himpA.gambarTrip, himpA.waktuAwal,himpA.waktuAkhir,himpA.namaKota as 'kota_Awal', kota.namaKota as 'kota_tujuan' 
                    FROM kota inner join (SELECT * FROM trip inner join kota on trip.idKota1 = kota.idKota WHERE idTrip = '$id') 
                    as himpA on kota.idKota = himpA.idKota2";
        $query_result = $this->db->executeSelectQuery($query);
        $result=[];
        foreach($query_result as $key =>$value){
            $result[] = new Trip($value['idTrip'],$value['gambarTrip'], $value['idTrip'], $value['waktuAwal'], $value['waktuAkhir'], $value['kota_Awal'], $value['kota_tujuan']);
        }   
        return $result;
    }

    public function verifikasi(){
        $idTrip = $_POST['id'];
        $verifikasi = $_POST['verified'];

        $query = "UPDATE trip SET statusTrip = '$verifikasi' WHERE idTrip = '$idTrip'";
        
        $query_result = $this->db->executeNonSelectQuery($query);
    }

    public function getProfile(){
        $result=[];
        $query = "SELECT idUser, namaUser, email FROM user WHERE isTraveller = 'pending' ";
        $query_result = $this->db->executeSelectQuery($query);
        foreach($query_result as $key=>$value){
            $result[] = new User($value['idUser'],$value['namaUser'],null,null,null,$value['email'],null,null,null,null,null,null);
        }
        return $result;
    }

    public function getProfileLengkap($id){
        $query = "SELECT * FROM user WHERE idUser = '$id'";
        $query_result = $this->db->executeSelectQuery($query);
        $result = [];
        foreach($query_result as $key => $value){
            $result[] = new User($value['idUser'], $value['namaUser'], null, null,null,null,$value['swafoto'], $value['gambarKTP'], $value['namaBank'], $value['norek'], $value['noKTP'],null);
        }

        return $result;
    }

    public function verifikasiDaftar(){
        $iduser = $_POST['id'];
        $verifikasi = $_POST['verified'];

        $query = "UPDATE user SET isTraveller = '$verifikasi' WHERE idUser = '$iduser'";
        
        $query_result = $this->db->executeNonSelectQuery($query);
    }
}
?>