<?php

class ListPembayaran
{
    public $idPenerima;
    public $idPembeli;
    public $idTrip;
    public $nama;
    public $email;
    public $namaBarang;

    public function __construct($idPenerima, $idPembeli, $idTrip, $nama, $email, $namaBarang)
    {
        $this->idPenerima = $idPenerima;
        $this->idPembeli = $idPembeli;
        $this->idTrip = $idTrip;
        $this->nama = $nama;
        $this->email = $email;
        $this->namaBarang = $namaBarang;
    }
}
