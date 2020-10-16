<?php

class Notifikasi{
    public $idUser;
    public $idNotifikasi;
    public $namaNotifikasi;
    public $deskripsi;
    public $statusView;
    public $dateTime;

    public function __construct($idUser, $idNotifikasi, $namaNotifikasi, $deskripsi, $statusView, $dateTime ){
        $this->idUser = $idUser;
        $this->idNotifikasi = $idNotifikasi;
        $this->namaNotifikasi = $namaNotifikasi;
        $this->deskripsi = $deskripsi;
        $this->statusView = $statusView;
        $this->dateTime = $dateTime;
    }

}
?>