<?php

class Trip{
    public $namaUser;
    public $fotoTiket;

    public function __construct($namaUser, $fotoTiket){
        $this->$namaUser = $namaUser;
        $this->$fotoTiket = $fotoTiket;
    }
}
?>