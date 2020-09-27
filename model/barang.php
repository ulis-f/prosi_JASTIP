<?php

class Barang{
    public $username;
    public $email;
    public $namaBarang;

    public function __construct($username, $email, $namaBarang){
        $this->username = $username;
        $this->email = $email;
        $this->namaBarang = $namaBarang;
        
    }

}
?>