<?php

class Laporan extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->library('TesPDF');
  }

    function tes(){
        global $title;
        $fpdf = new TesPDF('P');
        // $title = 'RINCIAN PEMBAYARAN BELUM LUNAS' ;
        // $title2 = 'DPRD KOTA GORONTALO' ;
        // $fpdf->SetTitle($title);
        // $fpdf->SetTitle($title2);
        $fpdf->AliasNbPages();
        $fpdf->AddPage();
        $fpdf->SetFont('Arial','B',16);
        $fpdf->Cell(40,10,'lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet');
        $fpdf->Output();
    }

}
