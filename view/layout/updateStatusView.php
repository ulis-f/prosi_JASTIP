<?php
    require_once "controller/services/mysqlDB.php";
    require_once "controller/services/view.php";
    require_once "model/user.php";
    require_once "model/notifikasi.php";

    $db = new MySQLDB("localhost","root","","titipaja");  
    $query_idUser = "SELECT idUser FROM `user` WHERE `namaUser` LIKE '$nama'";
    $query_idUser_result = $db->executeSelectQuery($query_idUser);  
    if($nama != null){
        $nama = $_SESSION['nama'];
        $idUser = $query_idUser_result[0]['idUser'];	

        $query4 = "UPDATE `notifikasi` SET `statusView`=1 WHERE idUser='$idUser'";
        $query_result4 = $db->executeNonSelectQuery($query4); 
    }
?>  