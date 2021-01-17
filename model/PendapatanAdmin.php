<?php
class pendapatanAdmin
{
    public $bulan;
    public $namaBank;
    public $pendapatan;

    public function __construct($bulan, $namaBank, $pendapatan)
    {
        $this->bulan = $bulan;
        $this->namaBank = $namaBank;
        $this->pendapatan = $pendapatan;
    }
}
