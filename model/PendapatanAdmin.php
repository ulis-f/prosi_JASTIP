<?php 
class pendapatanAdmin{
    public $bulan;
    public $pendapatan;

    public function __construct($bulan , $pendapatan)
    {
        $this->bulan = $bulan;
        $this->pendapatan = $pendapatan;
    }
}
