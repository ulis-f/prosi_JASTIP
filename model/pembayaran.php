<?php

class pembayaran{
    public $kotaAwal;
    public $kotaTujuan;
    public $waktuAwal;
    public $waktuAkhir;
    public $namaBarang;
    public $deskripsi;
    public $hargaBarang;
    public $tipTraveller;
    public $fee;
    public $kodeUnik;
    public $totalHarga;
    public $gambar;

    public function __construct($kotaAwal,$kotaTujuan,$waktuAwal, $waktuAkhir, $namaBarang, $deskripsi, $hargaBarang, $tipTraveller, $fee, $kodeUnik, $totalHarga, $gambar ){
        $this->kotaAwal = $kotaAwal;
        $this->kotaTujuan = $kotaTujuan;
        $this->waktuAwal = $waktuAwal;
        $this->waktuAkhir = $waktuAkhir;
        $this->namaBarang = $namaBarang;
        $this->deskripsi = $deskripsi;
        $this->hargaBarang = $hargaBarang;
        $this->tipTraveller = $tipTraveller;
        $this->fee = $fee;
        $this->kodeUnik = $kodeUnik;
        $this->totalHarga = $totalHarga;
        $this->gambar = $gambar;
    }
}

?>