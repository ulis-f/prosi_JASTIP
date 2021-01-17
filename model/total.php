<?php 
class Total {
    public $namaBank;
    public $pendapatan;

    public function __construct($namaBank, $pendapatan)
    {
        $this->namaBank = $namaBank;
        $this->pendapatan = $pendapatan;
    }
}
