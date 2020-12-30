<?php

class ListPembayaran
{
    public $idPenerima;
    public $idPembeli;
    public $idTrip;
    public $nama;
    public $email;

    public function __construct($idPenerima, $idPembeli, $idTrip, $nama, $email)
    {
        $this->idPenerima = $idPenerima;
        $this->idPembeli = $idPembeli;
        $this->idTrip = $idTrip;
        $this->nama = $nama;
        $this->email = $email;
    }
}
