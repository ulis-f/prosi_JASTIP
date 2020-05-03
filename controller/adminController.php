<?php
require_once "controller/services/mysqlDB.php";
require_once "controller/services/view.php";
require_once "model/trip.php";

class adminController{
	protected $db;

	public function __construct(){
		$this->db = new MySQLDB("localhost","root","","titipaja");
    }

    public function view_index(){
        $result = $this->getPostTrip();
        return view::createViewAdmin('homeAdmin.php',["result"=>$result]);
    }

    public function getPostTrip(){
        // $nama = $_POST['nama'];
        $result =[];
        $query = "SELECT himpA.namaUser, trip.gambarTrip 
                    FROM trip inner join 
                        (SELECT user.namaUser, transaksi.idTrip 
                        FROM user inner join transaksi on user.idUser = transaksi.idUser1 
                        WHERE user.isTraveller IS NULL) as himpA on trip.idTrip = himpA.idTrip 
                    WHERE trip.statusTrip IS NULL";
        $query_result = $this->db->executeSelectQuery($query);
        foreach($query_result as $key => $value){
            $result[] = new Trip($value['namaUser'], $value['gambarTrip']);
        }
        return $result;

    }
}
?>