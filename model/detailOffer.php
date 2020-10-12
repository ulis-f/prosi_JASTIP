<?php

class Offer{
    public $idKota2;
    public $waktuAkhir;
    public $namaBarang;
    public $statusBarang;
    public $deskripsiBarang;
    public $namaKategori;
    public $hargaBarang;
    public $gambarBarang;

    public function __construct($deskripsiBarang, $idKota2, $waktuAkhir, $namaBarang, $statusBarang, $namaKategori, $hargaBarang, $gambarBarang){
        $this->deskripsiBarang = $deskripsiBarang;
        $this->idKota2 = $idKota2;
        $this->waktuAkhir = $waktuAkhir;
        $this->namaBarang = $namaBarang;
        $this->statusBarang = $statusBarang;
        $this->namaKategori = $namaKategori;
        $this->hargaBarang = $hargaBarang;
        $this->gambarBarang = $gambarBarang;
        
    }

}
?>