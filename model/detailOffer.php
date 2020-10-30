<?php

class Offer{
    public $namaUser;
    public $kotaAwal;
    public $kotaTujuan;
    public $waktuAwal;
    public $waktuAkhir;
    public $namaBarang;
    public $statusBarang;
    public $deskripsiBarang;
    public $namaKategori;
    public $hargaBarang;
    public $gambarBarang;

    public function __construct($namaUser, $kotaAwal, $kotaTujuan,$waktuAwal, $waktuAkhir, $namaBarang,  $statusBarang, $deskripsiBarang, $namaKategori, $hargaBarang, $gambarBarang){
        $this->deskripsiBarang = $deskripsiBarang;
        $this->kotaAwal = $kotaAwal;
        $this->kotaTujuan = $kotaTujuan;
        $this->waktuAwal = $waktuAwal;
        $this->waktuAkhir = $waktuAkhir;
        $this->namaBarang = $namaBarang;
        $this->statusBarang = $statusBarang;
        $this->namaKategori = $namaKategori;
        $this->hargaBarang = $hargaBarang;
        $this->gambarBarang = $gambarBarang;
        $this->namaUser = $namaUser;
    }

}
?>