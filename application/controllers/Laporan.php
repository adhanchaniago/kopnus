<?php
class laporan extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->library('pdf');
	}
	function index($id){
		$pdf = new FPDF('p','mm','A4');
		// membuat halaman baru
		$pdf->AddPage();
		// setting jenis font yang akan digunakan
		$pdf->SetFont('Arial','B',16);
		// mencetak string
		$pdf->Cell(190,7,'Surat Perjanjian Kredit',0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(190,7,'Perjanjian Kredit',0,1,'C');
		$pdf->Line(20,3.5,190,3.5);
		// Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Ln(4);
		$pdf->SetFont('Arial','',10);
		$laporan = $this->db->query("SELECT * from tb_user where norek= '".$id."' ")->result();
		foreach ($laporan as $row){
			$upper = strtoupper($row->nama);
			//$pdf->Cell(20,10,'Norek',0,0);
			//$pdf->Cell(20,10,$row->norek,0,1);
			//$pdf->Cell(20,10,'Nama',0,0);
			//$pdf->Cell(20,10,$d,0,1);
			//$pdf->Cell(20,10,'Alamat',0,0);
			//$pdf->Cell(20,10,$row->alamat,0,1);
			$alamat = $row->alamat;
			$pdf->SetLeftMargin(30);
			$pdf->SetRightMargin(30);
			$pdf->Cell(200,10,'Pada hari ini, tanggal '.date('d M Y').', telah terjadi perjanjian kredit antara :',0,1);
			$pdf->cell(200,10,'1. '.$upper.' bertempat tinggal di '.$alamat,0,1);
		}
		$pdf->Output();
	}
}
