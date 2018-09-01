<?php
  class TesPDF extends FPDF{
    public function header(){
      global $title;
      $lebar = $this->w;
      $this->SetFont('Arial','B',15);
      $w = $this->GetStringWidth($title );
      $this->SetX(($lebar -$w)/2);
      $this->Cell($w,9,'lOREM IPSUM',0,0,'C');
      $this->Ln();
      $this->line($this->GetX(), $this->GetY(), $this->GetX()+$lebar-20, $this->GetY());
      $this->Ln(10);
    }

    public function footer() {
        $this->SetY(-15);
        $lebar = $this->w;
        $this->SetFont('Arial','I',8);
        $this->line($this->GetX(), $this->GetY(), $this->GetX()+$lebar-20, $this->GetY());
        $this->SetY(-15);
        $this->SetX(0);
        $this->Ln(1);
        $hal = 'Page : '.$this->PageNo().'/{nb}' ;
        $this->Cell($this->GetStringWidth($hal ),10,$hal );
        $datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
        $tanggal  = 'Printed : '.date('d-m-Y  h:i-a').' ';
        $this->Cell($lebar-$this->GetStringWidth($hal )-$this->GetStringWidth($tanggal)-20);
        $this->Cell($this->GetStringWidth($tanggal),10,$tanggal );
      }
  }
