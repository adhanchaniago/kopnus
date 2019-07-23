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
		$tanggal= $this->tgl_indo($ssd->tanggal);
		$jangka = $this->session->kali;
		$data = $this->db->query("SELECT * FROM tb_angsuran WHERE id_pinjaman = '" .$id. "' and angsuran_ke='1'");
		$ssd1 = $data->row();
		$ang1= $this->tgl_indo($ssd1->tanggal);
		$ter = $this->kekata($angsuran);
		$hari = date('d');
		$tgl = $this->tgl_indo(date('d-m-Y'));
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
		$pdf->multicell(0,6,'Jumlah maksimum kredit yang menjadi objek perjanjian ini adalah uang senilai Rp 250.000.000,00(dua ratus lima puluh juta).',0,'J',false);
		$pdf->Ln(4);
		$pdf->cell(155,6,'Pasal 2',0,1,'C');
		$pdf->Cell(155,6,'HAK DAN KEWAJIBAN PARA PIHAK',0,1,'C');
		$pdf->multicell(0,6,'KOPERASI NUSANTARA wajib memberikan kredit kepada DEBITOR sesuai jumlah yang diperjanjikan, dan berhak mendapatkan kembali pelunasannya.',0,'J',false);
		$pdf->Ln(2);
		$pdf->multicell(0,6,'DEBITOR berhak mendapatkan kredit dari KOPERASI NUSANTARA sesuai jumlah yang diperjanjikan, dan wajib melunasi kredit yang dipinjam beserta bunga.',0,'J',false);
		$pdf->Ln(4);
		$pdf->cell(155,6,'Pasal 3',0,1,'C');
		$pdf->Cell(155,6,'FASILITAS KREDIT',0,1,'C');
		$pdf->multicell(0,6,'Atas setiap pinajaman uang yang terutang berdasarkan perjanjian kredit, DEBITOR wajib membayar biaya biaya sebagai berikut:',0,'J',false);
		$pdf->multicell(0,6,'1. Biaya administrasi pembiayaan sebesar Rp 0 (nol Rupiah)',0,'J',false);
		$pdf->multicell(0,6,'2.	Penagihan angsuran perbulan sebesar Rp.'.number_format($angsuran, 0, ".", ".").' ('.$ter.')',0,'J',false);
		$pdf->multicell(0,6,'3.	Biaya lain-lain yang timbul karena dan untuk pelaksanaan akad ini',0,'J',false);
		$pdf->Ln(4);
		$pdf->cell(155,6,'Pasal 4',0,1,'C');
		$pdf->Cell(155,6,'JANGKA WAKTU KREDIT DAN JADWAL ANGSURAN',0,1,'C');
		$pdf->cell(5,6,'1. ',0,0);
		$pdf->multicell(0,6,'Jangka waktu fasilitas kredit : '.$jangka.' Bulan terhitung sejak tanggal 23.',0,'J',false);
		$pdf->cell(5,6,'2. ',0,0);
		$pdf->multicell(0,6,'Angsuran bulanan sebesar Rp.'.number_format($angsuran, 0, ".", ".").' ('.$ter.') / bulan sesuai dengan jadwal angsuran yang telah disepakati.',0,'J',false);
		$pdf->cell(5,6,'3. ',0,0);
		$pdf->multicell(0,6,'Angsuran pertama harus dibayar pada tanggal '.$ang1,0,'J',false);
		$pdf->cell(5,6,'4. ',0,0);
		$pdf->multicell(0,6,'Pembayaran angsuran dalam '.$jangka.' kali angsuran yang harus dibayar tiap tanggal '.$hari,0,'J',false);
		$pdf->cell(5,6,'5. ',0,0);
		$pdf->multicell(0,6,'DEBITOR dapat melakukan pelunasan dipercepat dengan memberitahukan secara tertulis kepada Koperasi Nusantara.',0,'J',false);
		$pdf->cell(5,6,'6. ',0,0);
		$pdf->multicell(0,6,'Apabila pembayaran kewajiban yang harus dilakukan DEBITOR kepada Koperasi Nusantara bukan pada hari kerja, maka pembayaran harus dilakukan pada 1 (satu) hari kerja sebelum nya.',0,'J',false);
		$pdf->cell(5,6,'7. ',0,0);
		$pdf->multicell(0,6,'Permbayaran hutang berdasarkan perjanjian ini dilakukan dengan cara memotong uang pensiun yang diterima DEBITOR melalui PT POS Indonesia (Persero) atau dengan cara lain yang ditentukan oleh Koperasi Nusantara DEBITOR wajib memberikan surat kuasa kepada PT POS Indonesia (Persero) untuk melakukan pemotongan uang pensiun tersebut.',0,'J',false);
		$pdf->Ln(4);
		$pdf->cell(155,6,'Pasal 5',0,1,'C');
		$pdf->Cell(155,6,'CARA PEMBERIAN KREDIT',0,1,'C');
		$pdf->multicell(0,6,'Pembayaran Utang Wajib dilakukan oleh DEBITOR dalam mata uang yang sama dengan Fasilitas Kredit yang diberika oleh Koperasi Nusantara dan harus sudah efektif diterimaoleh Koperasi Nusantara di kantor cabang di Jl.Selamet Riyadi No.10 selambat-lambatnya pukul 17:00 (tujuh belas) waktu setempat.',0,'J',false);
		$pdf->Ln(4);
		$pdf->cell(155,6,'Pasal 6',0,1,'C');
		$pdf->Cell(155,6,'PELUNASAN KREDIT',0,1,'C');
		$pdf->multicell(0,6,'Kredit dilunasi oleh DEBITOR dengan cicilan perbulan sejumlah yang disepakati kedua belah pihak selama jangka waktu kredit sesuai pasal 3 perjanjian ini.',0,'J',false);
		$pdf->Ln(4);
		$pdf->cell(155,6,'Pasal 7',0,1,'C');
		$pdf->Cell(155,6,'PEMBUKTIAN UTANG',0,1,'C');
		$pdf->multicell(0,6,'Pembuktian dan catatan-catatan yang telah dan akan dibuat oleh Koperasi Nusantara merupakan bukti yang lengkap dan sempurna mengenai utang dan bukti tersebut akan mengikat DEBITOR, kecuali apabila dapat dibuktikan sebaliknya.',0,'J',false);
		$pdf->Ln(4);
		$pdf->cell(155,6,'Pasal 8',0,1,'C');
		$pdf->Cell(155,6,'LARANGAN BAGI DEBITOR',0,1,'C');
		$pdf->multicell(0,6,'Selama DEBITOR belum membayar lunas utang atau Batas Waktu Penarikan dan/atau Penggunaan Fasilitas Kredit belum berakhir, DEBITOR tidak diperkenankan untuk melakukan hal-hal dibawah ini, tanpa persetujuan tertulis dahulu dari Koperasi Nusantara',0,'J',false);
		$pdf->cell(5,6,'1. ',0,0);
		$pdf->multicell(0,6,'Memperoleh pinjaman uang/kredit baru dari pihak lain dan/atau mengikatkan diri sebagai penanggung/penjamin dalam bentuk dan dengan nama apa pun dan/atau menggunakan harta kekayaan DEBITOR kepada pihak lain.',0,'J',false);
		$pdf->cell(5,6,'2. ',0,0);
		$pdf->multicell(0,6,'Meminjam uang, termasuk tetapi tidak terbatas kepada perusahaan afiliasinya, kecuali dalam rangka menjalankan usaha sehari-hari.',0,'J',false);
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
		$pdf->multicell(0,6,'Perjanjian Kredit ini dibuat di Koperasi Nusantara Cabang Makassar pada tanggan '.$tanggal,0,'J',false);
		$pdf->Ln(15);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(28);
		$pdf->cell(50,6,'Koperasi Nusantara',0,0);
		$pdf->Cell(32);
		$pdf->cell(50,6,'Debitor',0,0);
		$pdf->Ln(20);
		$pdf->cell(100);
		$pdf->SetFont('Arial','',10);
		$pdf->cell(50,6,'Materai Rp.6000,00',0,1);
		$pdf->Ln(20);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(25);
		$pdf->cell(50,6,'ANDI BASO SARIPUDIN ',0,0);
		$pdf->Cell(22);
		$pdf->cell(50,6,'('.$upper.')',0,0);
		$pdf->Output('Perjanjian Kredit '.$upper.'.pdf','D');
	}
	public function kekata($x){
	    $x=abs($x);
	    $angka=array("","satu","dua","tiga","empat","lima",
	    "enam","tujuh","delapan","sembilan","sepuluh","sebelas");
	    $temp="";
	    if($x<12){
	        $temp=" ".$angka[$x];
	    }elseif($x<20){
	        $temp=$this->kekata($x-10)." belas";
	    }elseif($x<100){
	        $temp=$this->kekata($x/10)." puluh".$this->kekata($x%10);
	    }elseif($x<200){
	        $temp=" seratus".$this->kekata($x-100);
	    }elseif($x<1000){
	        $temp=$this->kekata($x/100)." ratus".$this->kekata($x%100);
	    }elseif($x<2000){
	        $temp=" seribu".$this->kekata($x-1000);
	    }elseif($x<1000000){
	        $temp=$this->kekata($x/1000)." ribu".$this->kekata($x%1000);
	    }elseif($x<1000000000){
	        $temp= $this->kekata($x/1000000)." juta".$this->kekata($x%1000000);
	    }elseif($x<1000000000000){
	        $temp=$this->kekata($x/1000000000)." milyar".$this->kekata(fmod($x,1000000000));
	    }elseif($x<1000000000000000){
	        $temp=$this->kekata($x/1000000000000)." trilyun".$this->kekata(fmod($x,1000000000000));
	    }
	        return$temp;
	}
	function tgl_indo($tanggal){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);
		// variabel pecahkan 0 = tanggal
		// variabel pecahkan 1 = bulan
		// variabel pecahkan 2 = tahun
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}
}
