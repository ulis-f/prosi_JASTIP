<?php

class Kategori{
    public $id;
    public $nama;

    public function __construct($id, $nama){
        $this->id = $id;
        $this->nama = $nama;
    }
}
?>