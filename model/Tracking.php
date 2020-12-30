<?php
class Tracking
{
    public $namaBarang;
    public $deskripsi;
    public $hargaBarang;
    public $hargaOngkir;
    public $hargaJasa;
    public $hargaTotal;
    public $kodeUnik;
    public $gambarBarang;
    public $idTrip;
    public $kotaAwal;
    public $kotaTujuan;
    public $waktuAwal;
    public $waktuAkhir;

    public function __construct($namaBarang, $deskripsi, $hargaBarang, $hargaOngkir, $hargaJasa, $hargaTotal, $kodeUnik, $gambarBarang, $idTrip, $kotaAwal, $kotaTujuan, $waktuAwal, $waktuAkhir)
    {
        $this->namaBarang = $namaBarang;
        $this->deskripsi = $deskripsi;
        $this->hargaBarang = $hargaBarang;
        $this->hargaOngkir = $hargaOngkir;
        $this->hargaJasa = $hargaJasa;
        $this->hargaTotal = $hargaTotal;
        $this->kodeUnik = $kodeUnik;
        $this->gambarBarang = $gambarBarang;
        $this->idTrip = $idTrip;
        $this->kotaAwal = $kotaAwal;
        $this->kotaTujuan = $kotaTujuan;
        $this->waktuAwal = $waktuAwal;
        $this->waktuAkhir = $waktuAkhir;
    }
}
