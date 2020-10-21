<?php

class Offer{
    public $kotaAwal;
    public $kotaTujuan;
    public $namaBarang;
    public $statusBarang;
    public $deskripsiBarang;
    public $namaKategori;
    public $hargaBarang;
    public $gambarBarang;

    public function __construct($kotaAwal, $kotaTujuan, $namaBarang,  $statusBarang, $deskripsiBarang, $namaKategori, $hargaBarang, $gambarBarang){
        $this->deskripsiBarang = $deskripsiBarang;
        $this->kotaAwal = $kotaAwal;
        $this->kotaTujuan = $kotaTujuan;
        $this->namaBarang = $namaBarang;
        $this->statusBarang = $statusBarang;
        $this->namaKategori = $namaKategori;
        $this->hargaBarang = $hargaBarang;
        $this->gambarBarang = $gambarBarang;
        
    }

}
?>