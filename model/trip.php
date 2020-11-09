<?php

class Trip{
    public $namaUser;
    public $fotoTiket;
    public $idtrip;
    public $waktuAwal;
    public $waktuAkhir;
    public $kotaAwal;
    public $kotaTujuan;

    public function __construct($namaUser, $fotoTiket, $idtrip, $waktuAwal, $waktuAkhir,  $kotaAwal, $kotaTujuan){
        $this->namaUser = $namaUser;
        $this->fotoTiket = $fotoTiket;
        $this->idtrip = $idtrip;
        $this->waktuAwal = $waktuAwal;
        $this->waktuAkhir = $waktuAkhir;
        $this->kotaAwal = $kotaAwal;
        $this->kotaTujuan = $kotaTujuan;  
    }

}
?>