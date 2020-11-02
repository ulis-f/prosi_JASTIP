<?php

class Wanted{
    public $namaUser;
    public $nohp;
    public $alamat;
    public $fotoProfile;
    public $jumlahBarang;
    public $namaBarang;
    public $statusBarang;
    public $deskripsiBarang;
    public $gambarBarang;
    public $namaKategori;

    public function __construct($namaUser,$nohp,$alamat, $fotoProfile,  $namaBarang,  $statusBarang, $deskripsiBarang, $namaKategori, $gambarBarang, $jumlahBarang){
        $this->deskripsiBarang = $deskripsiBarang;
        $this->jumlahBarang = $jumlahBarang;
        $this->namaBarang = $namaBarang;
        $this->statusBarang = $statusBarang;
        $this->namaKategori = $namaKategori;
        $this->gambarBarang = $gambarBarang;
        $this->namaUser = $namaUser;
        $this->nohp = $nohp;
        $this->alamat = $alamat;
        $this->fotoProfile = $fotoProfile;
    }

}
?>