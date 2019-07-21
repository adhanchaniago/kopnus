<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class laporan extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->library('pdf');
		$this->load->model('model_user');
	}
	public function index($id){
		$pdf = new FPDF('p','mm','A4');
		// membuat halaman baru
		$pdf->AddPage();
		// setting jenis font yang akan digunakan
		$pdf->SetFont('Arial','B',16);
		// mencetak string
		$pdf->image(base_url().'asset/img/logo.jpg', 30, 5, 20, 20);
		$pdf->Line(28,28,183,28);
		$pdf->Ln(20);
		$pdf->Cell(190,7,'Surat Perjanjian Kredit',0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(190,7,'Perjanjian Kredit',0,1,'C');
		// Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Ln(4);
		$pdf->SetFont('Arial','',10);
		$data = $this->db->query("SELECT * FROM tb_user inner join tb_pinjaman using(norek) WHERE id_pinjaman = '" .$id. "'");
		$ssd = $data->row();
		$upper = strtoupper($ssd->nama);
		$alamat = $ssd->alamat;
		$angsuran = $ssd->angsuran;
		$jangka = $this->session->kali;
		$ter = $this->terbilang($angsuran);
		$pdf->SetLeftMargin(28);
		$pdf->SetRightMargin(28);
		$pdf->cell(200,10,'Yang bertanda tangan dibawah ini :',0,1);
		$pdf->cell(5,6,'I.	',0,0);
		$pdf->multicell(0,6,'ANDI BASO SARIPUDIN dalam hal ini bertindak dalam kedudukan selaku Kepala Bisnis KSP Nusantara dari Koperasi Nusantara, Kantor Cabang Utama Makassar oleh karena itu bertindak untuk dan atas nama Koperasi Nusantara, Berkedudukan di Kantor Wilayah dan selanjutnya disebut sebagai Koperasi Nusantara.',0,'J',false);
		$pdf->cell(5,6,'II.	',0,0);
		$pdf->multicell(0,6,$upper.', swasta, bertempat tinggal di '.$alamat.' dalam hal ini bertindak untuk diri sendiri, selanjutnya disebut DEBITOR.',0,'J',false);
		$pdf->Ln();
		$pdf->multicell(0,6,'Koperasi Nusantara dan DEBITOR dengan ini telah bersepakat untuk membuat Perjanjian Kredir dengan syarat-syarat dan ketentuan sebagai berikut :',0,'J',false);
		$pdf->Ln(4);
		$pdf->Cell(155,6,'Pasal 1',0,1,'C');
		$pdf->Cell(155,6,'JUMLAH MAKSIMUM KREDIT',0,1,'C');
		$pdf->multicell(0,6,'Jumlah maksimum kredit yang menjadi objek perjanjian ini adalah uang senilai Rp 600.000.000.',0,'J',false);
		$pdf->Ln(4);
		$pdf->cell(155,6,'Pasal 2',0,1,'C');
		$pdf->Cell(155,6,'JANGKA WAKTU KREDIT',0,1,'C');
		$pdf->multicell(0,6,'Jangka waktu kredit dalam perjanjian ini adalah '.$jangka.' bulan yang telah di sepakati oleh kedua belah pihak. DEBITOR wajib melakukan pelunasan pembiayaan kepada Koperasi Nusantara selambat-lambatnya pada saat berakhirnya jangka waktu pembiayaan.',0,'J',false);
		$pdf->Ln(4);
		$pdf->cell(155,6,'Pasal 3',0,1,'C');
		$pdf->Cell(155,6,'CARA PEMBERIAN KREDIT',0,1,'C');
		$pdf->multicell(0,6,'Pembayaran Utang Wajib dilakukan oleh DEBITOR dalam mata uang yang sama dengan Fasilitas Kredit yang diberika oleh Koperasi Nusantara dan harus sudah efektif diterimaoleh Koperasi Nusantara di kantor cabang di Jl.Selamet Riyadi No.10 selambat-lambatnya pukul 17:00 (tujuh belas) waktu setempat.',0,'J',false);
		$pdf->Ln(4);
		$pdf->cell(155,6,'Pasal 4',0,1,'C');
		$pdf->Cell(155,6,'PELUNASAN KREDIT',0,1,'C');
		$pdf->multicell(0,6,'Kredit dilunasi oleh DEBITOR dengan cicilan perbulan sejumlah yang disepakati kedua belah pihak selama jangka waktu kredit sesuai pasal 2 perjanjian ini.',0,'J',false);
		$pdf->Ln(4);
		$pdf->cell(155,6,'Pasal 5',0,1,'C');
		$pdf->Cell(155,6,'HAK DAN KEWAJIBAN PARA PIHAK',0,1,'C');
		$pdf->multicell(0,6,'Koperasi Nusantara wajib memberikan kredit kepada DEBITOR sesuai jumlah yang diperjanjikan, dan berhak mendapatkan kembali pelunasannya.',0,'J',false);
		$pdf->Ln(2);
		$pdf->multicell(0,6,'DEBITOR berhak mendapatkan kredit dari Koperasi Nusantara sesuai jumlah yang diperjanjikan, dan wajib melunasi kredit yang dipinjam beserta bunga.',0,'J',false);
		$pdf->Ln(4);
		$pdf->cell(155,6,'Pasal 6',0,1,'C');
		$pdf->Cell(155,6,'FASILITAS PEMBIAYAAN',0,1,'C');
		$pdf->multicell(0,6,'Atas setiap pinajaman uag yang terutan berdasarkan perjanjian kredit, DEBITOR wajib membayar biaya biaya sebagai berikut:',0,'J',false);
		$pdf->multicell(0,6,'1. Biaya administrasi pembiayaan sebesar Rp 0 (nol Rupiah)',0,'J',false);
		$pdf->multicell(0,6,'2.	Penagihan angsuran perbulan sebesar Rp.'.number_format($angsuran, 0, ".", ".").'('.$ter.')',0,'J',false);
		$pdf->multicell(0,6,'3.	Biaya lain lain yang timbul karna dan untuk pelaksanaan akad ini',0,'J',false);
		$pdf->Ln(4);
		$pdf->cell(155,6,'Pasal 7',0,1,'C');
		$pdf->Cell(155,6,'PEMBUKTIAN UTANG',0,1,'C');
		$pdf->multicell(0,6,'Pembuktian dan catatan-catatan yang telah dan akan dibuat oleh Koperasi Nusantara merupakan bukti yang lengkap dan sempurna mengenai utang dan bukti tersebut akan mengikat DEBITOR, kecuali apabila dapat dibuktikan sebaliknya.',0,'J',false);
		$pdf->Ln(4);
		$pdf->cell(155,6,'Pasal 8',0,1,'C');
		$pdf->Cell(155,6,'LARANGAN BAGI DEBITOR',0,1,'C');
		$pdf->multicell(0,6,'Selama DEBITOR belum membayar lunas utang atau Batas Waktu Penarikan dan/atau Penggunaan Fasilitas Kredit belum berakhir, DEBITOR tidak diperkenankan untuk melakukan hal-hal dibawah ini, tanpa persetujuan tertulis dahulu dari Koperasi Nusantara',0,'J',false);
		$pdf->multicell(0,6,'1.	Memperoleh pinjaman uang/kredit baru dari pihak lain dan/atau mengikatkan diri sebagai penanggung/penjamin dalam bentuk dan dengan nama apa pun dan/atau menggunakan harta kekayaan DEBITOR kepada pihak lain.',0,'J',false);
		$pdf->multicell(0,6,'2.	Meminjam uang, termasuk tetapi tidak terbatas kepada perusahaan afiliasinya, kecuali dalam rangka menjalankan usaha sehari-hari.',0,'J',false);
		$pdf->Ln(4);
		$pdf->cell(155,6,'Pasal 9',0,1,'C');
		$pdf->Cell(155,6,'PERUBAHAN KETENTUAN PERJANJIAN KREDIT',0,1,'C');
		$pdf->multicell(0,6,'Dalam hal dilakukan prubahan atas ketentuan-ketentuan dalam Perjanjian Kredit, maka perusahaan dimaksud akan diatur dalam suaru perjanjian atau surat tersendiri yang ditandatangani oleh para pihak, perjanjian atau surah tersebut merupakan satu kesatuan dan bagia  yang tidak terpisah dari Perjanjian Kredit.',0,'J',false);
		$pdf->Ln(4);
		$pdf->cell(155,6,'Pasal 10',0,1,'C');
		$pdf->Cell(155,6,'KETENTUAN-KETENTUAN KHUSUS',0,1,'C');
		$pdf->multicell(0,6,'Terhadap Fasilitas Kredit berlaku juga syarat-syarat dalm ketentuan-ketentuan sebahaimana diatur lebih lanjut dalam lampiran yang dari waktu ke waktu akan disesuaikan dengan fasilitas kredit yang diberikan Koperasi Nusantara dan diterima DEBITOR, yang merupakan satu kesatuan  dan bagian yang tidak terpisahkan dari perjanjian kredit.',0,'J',false);
		$pdf->Ln(2);
		$pdf->multicell(0,6,'Mengenai Perjanjian Kredit dan segala akibat serta pelaksanaannya, Koperasi Nusantara dan DEBITOR memiliki tempat kediaman hokum yang tetap dan tidak berubah di Jl.R.A.Kartini No. 18/23,Makassar,Sulawesi Selatan tanpa mengurangu hak Koperasi Nusantara untuk menggugat DEBITOR di hadapan pengadilan lain di dalam wilayah Republik Indonesi berdasarkan ketentuan hokum yang berlaku.',0,'J',false);
		$pdf->Ln(2);
		$pdf->multicell(0,6,'Perjanjian Kredit ini dibuat di Koperasi Nusantara Cabang Makassar pada tanggan (tgl-bulan-tahun).',0,'J',false);
		$pdf->Ln(15);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(28);
		$pdf->cell(50,6,'Koperasi Nusantara',0,0);
		$pdf->Cell(32);
		$pdf->cell(50,6,'Debitor',0,0);
		$pdf->Ln(35);
		$pdf->Cell(25);
		$pdf->cell(50,6,'(_________________)',0,0);
		$pdf->Cell(20);
		$pdf->cell(50,6,'(_________________)',0,0);
		$pdf->Output('Perjanjian Kredit '.$upper.'.pdf','D');
	}
	public function terbilang($nilai) {
		$huruf = array( "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
		if($nilai==0){
			return "Kosong";
		}elseif ($nilai < 12&$nilai!=0) {
			return "" . $huruf[$nilai];
		} elseif ($nilai < 20) {
			return $this->terbilang($nilai - 10) . " Belas ";
		} elseif ($nilai < 100) {
			return $this->terbilang($nilai / 10) . " Puluh " . $this->terbilang($nilai % 10);
		} elseif ($nilai < 200) {
			return " Seratus " . $this->terbilang($nilai - 100);
		} elseif ($nilai < 1000) {
			return $this->terbilang($nilai / 100) . " Ratus " . $this->terbilang($nilai % 100);
		} elseif ($nilai < 2000) {
			return " Seribu " . $this->terbilang($nilai - 1000);
		} elseif ($nilai < 1000000) {
			return $this->terbilang($nilai / 1000) . " Ribu " . $this->terbilang($nilai % 1000);
		} elseif ($nilai < 1000000000) {
			return $this->terbilang($nilai / 1000000) . " Juta " . $this->terbilang($nilai % 1000000);
		}
	}
}
