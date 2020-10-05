<?php

class Barang{
    public $username;
    public $email;
    public $namaBarang;
    public $market;
    public $idUser;

    public function __construct($idUser, $username, $email, $namaBarang, $market){
        $this->idUser = $idUser;
        $this->username = $username;
        $this->email = $email;
        $this->namaBarang = $namaBarang;
        $this->market = $market;
        
    }

}
?>