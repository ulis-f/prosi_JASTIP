<?php

class Barang{
    public $username;
    public $email;
    public $namaBarang;
    public $market;

    public function __construct($username, $email, $namaBarang, $market){
        $this->username = $username;
        $this->email = $email;
        $this->namaBarang = $namaBarang;
        $this->market = $market;
        
    }

}
?>