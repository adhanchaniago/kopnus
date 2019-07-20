<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class laporan extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->library('pdf');
		$this->load->model('model_user');
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
		$data = $this->db->query("SELECT * FROM tb_user WHERE norek = '" .$id. "'");
		$ssd = $data->row();
		$upper = strtoupper($ssd->nama);
		$alamat = $ssd->alamat;
		$pdf->SetLeftMargin(28);
		$pdf->SetRightMargin(28);
		$pdf->cell(200,10,'Yang bertanda tangan dibawah ini :',0,1);
		$pdf->cell(5,6,'I.	',0,0);
		$pdf->multicell(0,6,'ANDI BASO SARIPUDIN dalam hal ini bertindak dalam kedudukan selaku Kepala Bisnis KSP Nusantara dari Koperasi Nusantara, Kantor Cabang Utama Makassar oleh karena itu bertindak untuk dan atas nama Koperasi Nusantara, Berkedudukan di Kantor Wilayah.',0,'J',false);
		$pdf->cell(5,6,'II.	',0,0);
		$pdf->multicell(0,6,$upper.', swasta, bertempat tinggal di '.$alamat.' dalam hal ini bertindak untuk diri sendiri, selanjutnya disebut DEBITOR.',0,'J',false);
		$pdf->Output();
	}
}
