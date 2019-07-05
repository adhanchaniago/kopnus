<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas extends CI_Controller {

	public function __construct() {
	parent::__construct();

	$this->load->model('model_user');
	$this->load->model('model_berkas');
	$this->load->model('model_pinjam');
	}
	public function index()
	{
		$uid=$this->session->uid;
		if (isset($uid)) {
			$data['user'] =$this->model_user->data_user($uid);
			$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo_user($uid);
			$tgl = date('Y-m-d');
			$set = $this->db->query("SELECT * from tb_angsuran where norek='".$uid."' and tanggal='".$tgl."' or tanggal < '".$tgl."' ");
			$data['jumlah'] = $set->num_rows();
			$data['user_berkas'] = $this->model_user->data_user($uid);
			$data['kk'] = $this->model_berkas->data_berkas_kk($uid);
			$data['slip'] = $this->model_berkas->data_berkas_slip($uid);
			$data['npwp'] = $this->model_berkas->data_berkas_npwp($uid);
			$data['karip'] = $this->model_berkas->data_berkas_karip($uid);
			$data['foto_diri'] = $this->model_berkas->data_berkas_foto_diri($uid);
			$data['ktp'] = $this->model_berkas->data_berkas_ktp($uid);
			$data['sk'] = $this->model_berkas->data_berkas_sk($uid);
			$this->load->template('berkas',$data);
			}else {
				redirect(base_url('login'));
			}
	}
	public function admin($id)
	{
		$uid=$this->session->uid;
		if (isset($uid)) {
		$data['user'] =$this->model_user->data_user($uid);
		$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo();
		$tgl = date('Y-m-d');
		$set = $this->db->query("SELECT * from tb_angsuran where tanggal='".$tgl."' or tanggal < '".$tgl."' ");
		$data['jumlah'] = $set->num_rows();
		$data['user_berkas'] = $this->model_user->data_user($id);
		$data['kk'] = $this->model_berkas->data_berkas_kk($id);
		$data['slip'] = $this->model_berkas->data_berkas_slip($id);
		$data['npwp'] = $this->model_berkas->data_berkas_npwp($id);
		$data['karip'] = $this->model_berkas->data_berkas_karip($id);
		$data['foto_diri'] = $this->model_berkas->data_berkas_foto_diri($id);
		$data['ktp'] = $this->model_berkas->data_berkas_ktp($id);
		$data['sk'] = $this->model_berkas->data_berkas_sk($id);
		$this->load->template('berkas',$data);
		}else {
		redirect(base_url('login'));
		}
	}
	public function upload_kk($id){
		$id2 = "1";
		$upload = $this->model_berkas->upload($id2);
		if($upload['result'] == "success"){ // Jika proses upload sukses
			 // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
			$this->model_berkas->save_kk($upload,$id);
			redirect('/'); // Redirect kembali ke halaman awal / halaman view data
		}else{ // Jika proses upload gagal
			$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
		}
	}
	public function upload_slip($id){
		$id2 = "2";
		$upload = $this->model_berkas->upload($id2);
		if($upload['result'] == "success"){ // Jika proses upload sukses
			 // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
			$this->model_berkas->save_slip($upload,$id);
			redirect('/'); // Redirect kembali ke halaman awal / halaman view data
		}else{ // Jika proses upload gagal
			$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
		}
	}
	public function upload_npwp($id){
		$id2 = "3";
		$upload = $this->model_berkas->upload($id2);
		if($upload['result'] == "success"){ // Jika proses upload sukses
			 // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
			$this->model_berkas->save_npwp($upload,$id);
			redirect('/'); // Redirect kembali ke halaman awal / halaman view data
		}else{ // Jika proses upload gagal
			$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
		}
	}
	public function upload_foto_diri($id){
		$id2 = "4";
		$upload = $this->model_berkas->upload($id2);
		if($upload['result'] == "success"){ // Jika proses upload sukses
			 // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
			$this->model_berkas->save_foto_diri($upload,$id);
			redirect('/'); // Redirect kembali ke halaman awal / halaman view data
		}else{ // Jika proses upload gagal
			$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
		}
	}

	public function upload_karip($id){
		$id2 = "5";
		$upload = $this->model_berkas->upload($id2);
		if($upload['result'] == "success"){ // Jika proses upload sukses
			 // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
			$this->model_berkas->save_karip($upload,$id);
			redirect('/'); // Redirect kembali ke halaman awal / halaman view data
		}else{ // Jika proses upload gagal
			$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
		}
	}
	public function upload_ktp($id){
		$id2 = "6";
		$upload = $this->model_berkas->upload($id2);
		if($upload['result'] == "success"){ // Jika proses upload sukses
			 // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
			$this->model_berkas->save_ktp($upload,$id);
			redirect('/'); // Redirect kembali ke halaman awal / halaman view data
		}else{ // Jika proses upload gagal
			$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
		}
	}
	public function upload_sk($id){
		$id2 = "7";
		$upload = $this->model_berkas->upload($id2);
		if($upload['result'] == "success"){ // Jika proses upload sukses
			 // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
			$this->model_berkas->save_sk($upload,$id);
			redirect('/'); // Redirect kembali ke halaman awal / halaman view data
		}else{ // Jika proses upload gagal
			$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
		}
	}
	public function download($id,$id2){
		$this->load->helper('download');
		if ($id2 == "1") {
			$fileinfo = $this->model_berkas->download($id,$id2);
			$file = './asset/upload/berkas/kk/'.$fileinfo	['kk'];
			force_download($file, NULL);
		}elseif ($id2 == "2") {
			$fileinfo = $this->model_berkas->download($id,$id2);
			$file = './asset/upload/berkas/slip/'.$fileinfo	['slip'];
			force_download($file, NULL);
		}elseif ($id2 == "3") {
			$fileinfo = $this->model_berkas->download($id,$id2);
			$file = './asset/upload/berkas/npwp/'.$fileinfo	['npwp'];
			force_download($file, NULL);
		}elseif ($id2 == "4") {
			$fileinfo = $this->model_berkas->download($id,$id2);
			$file = './asset/upload/berkas/foto_diri/'.$fileinfo	['foto_diri'];
			force_download($file, NULL);
		}elseif ($id2 == "5") {
			$fileinfo = $this->model_berkas->download($id,$id2);
			$file = './asset/upload/berkas/karip/'.$fileinfo	['karip'];
			force_download($file, NULL);
		}elseif ($id2 == "6") {
			$fileinfo = $this->model_berkas->download($id,$id2);
			$file = './asset/upload/berkas/ktp/'.$fileinfo	['ktp_suami_istri'];
			force_download($file, NULL);
		}elseif ($id2 == "7") {
			$fileinfo = $this->model_berkas->download($id,$id2);
			$file = './asset/upload/berkas/sk/'.$fileinfo	['sk'];
			force_download($file, NULL);
		}
	}
}
