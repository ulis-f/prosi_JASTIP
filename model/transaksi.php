<?php

class Transaksi{
    public $idUser1;
    public $idTrip;
    public $idUser2;
    public $jumlahBarang;
    public $hargaBarang;
    public $hargaOngkir;
    public $hargaJasa;
    public $namaBarang;
    public $statusBarang;
    public $deskripsiBarang;
    public $gambarBarang;
    public $noresi;
    public $namaKategori;

    public function __construct($idUser1, $idTrip, $idUser2, $jumlahBarang, $hargaBarang, $hargaOngkir, $hargaJasa, $namaBarang,$statusBarang,$deskripsiBarang,$gambarBarang, $noresi, $namaKategori){
        $this->idUser1 = $idUser1;
        $this->idTrip = $idTrip;
        $this->idUser2 = $idUser2;
        $this->jumlahBarang = $jumlahBarang;
        $this->hargaBarang = $hargaBarang;
        $this->hargaOngkir = $hargaOngkir;
        $this->hargaJasa = $hargaJasa;  
        $this->namaBarang = $namaBarang;  
        $this->statusBarang = $statusBarang;  
        $this->deskripsiBarang = $deskripsiBarang;  
        $this->gambarBarang = $gambarBarang;  
        $this->noresi = $noresi;  
        $this->namaKategori = $namaKategori;  
    }

}
?>