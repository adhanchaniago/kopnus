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
			$status = '0';
			$set = $this->db->query("SELECT * from tb_angsuran where status='".$status."' and norek='".$uid."' and (now() >= DATE_SUB(tanggal, INTERVAL 3 DAY)) ");
			$data['jumlah'] = $set->num_rows();
			$data['user_berkas'] = $this->model_user->data_user($uid);
			$data['berkas'] = $this->model_berkas->data_berkas($uid);
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
			$status = '0';
			$set = $this->db->query("SELECT * from tb_angsuran where status='".$status."' and (tanggal <= now() or (now() >= DATE_SUB(tanggal, INTERVAL 3 DAY))) ");
			$data['jumlah'] = $set->num_rows();
			$data['user_berkas'] = $this->model_user->data_user($id);
			$data['berkas'] = $this->model_berkas->data_berkas($id);
			$data['sk'] = $this->model_berkas->data_berkas_sk($id);
			$this->load->template('berkas',$data);
		}else {
			redirect(base_url('login'));
		}
	}
	public function upload_kk($id,$id1){
		$id2 = "1";
		$upload = $this->model_berkas->upload($id2);
		if($upload['result'] == "success"){ // Jika proses upload sukses
			// Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
			$this->model_berkas->save($upload,$id,$id2);
			if ($id1 == '0000000001') {
				redirect('/berkas_admin/'.$id); // Redirect kembali ke halaman awal / halaman view data
			}else {
				redirect('/berkas/'); // Redirect kembali ke halaman awal / halaman view data
			}
		}else{ // Jika proses upload gagal
			$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
		}
	}
	public function upload_slip($id,$id1){
		$id2 = "2";
		$upload = $this->model_berkas->upload($id2);
		if($upload['result'] == "success"){ // Jika proses upload sukses
			// Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
			$this->model_berkas->save($upload,$id,$id2);
			if ($id1 == '0000000001') {
				redirect('/berkas_admin/'.$id); // Redirect kembali ke halaman awal / halaman view data
			}else {
				redirect('/berkas/'); // Redirect kembali ke halaman awal / halaman view data
			}
		}else{ // Jika proses upload gagal
			$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
		}
	}
	public function upload_npwp($id,$id1){
		$id2 = "3";
		$upload = $this->model_berkas->upload($id2);
		if($upload['result'] == "success"){ // Jika proses upload sukses
			// Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
			$this->model_berkas->save($upload,$id,$id2);
			if ($id1 == '0000000001') {
				redirect('/berkas_admin/'.$id); // Redirect kembali ke halaman awal / halaman view data
			}else {
				redirect('/berkas/'); // Redirect kembali ke halaman awal / halaman view data
			}
		}else{ // Jika proses upload gagal
			$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
		}
	}
	public function upload_foto_diri($id,$id1){
		$id2 = "4";
		$upload = $this->model_berkas->upload($id2);
		if($upload['result'] == "success"){ // Jika proses upload sukses
			// Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
			$this->model_berkas->save($upload,$id,$id2);
			if ($id1 == '0000000001') {
				redirect('/berkas_admin/'.$id); // Redirect kembali ke halaman awal / halaman view data
			}else {
				redirect('/berkas/'); // Redirect kembali ke halaman awal / halaman view data
			}
		}else{ // Jika proses upload gagal
			$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
		}
	}

	public function upload_karip($id,$id1){
		$id2 = "5";
		$upload = $this->model_berkas->upload($id2);
		if($upload['result'] == "success"){ // Jika proses upload sukses
			// Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
			$this->model_berkas->save($upload,$id,$id2);
			if ($id1 == '0000000001') {
				redirect('/berkas_admin/'.$id); // Redirect kembali ke halaman awal / halaman view data
			}else {
				redirect('/berkas/'); // Redirect kembali ke halaman awal / halaman view data
			}
		}else{ // Jika proses upload gagal
			$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			redirect('/berkas_admin/'.$id);
		}
	}
	public function upload_ktp($id,$id1){
		$id2 = "6";
		$upload = $this->model_berkas->upload($id2);
		if($upload['result'] == "success"){ // Jika proses upload sukses
			// Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
			$this->model_berkas->save($upload,$id,$id2);
			if ($id1 == '0000000001') {
				redirect('/berkas_admin/'.$id); // Redirect kembali ke halaman awal / halaman view data
			}else {
				redirect('/berkas/'); // Redirect kembali ke halaman awal / halaman view data
			}
		}else{ // Jika proses upload gagal
			$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
		}
	}
	public function upload_sk($id,$id1){
		$id2 = "7";
		$upload = $this->model_berkas->upload($id2);
		if($upload['result'] == "success"){ // Jika proses upload sukses
			// Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
			$this->model_berkas->save($upload,$id,$id2);
			if ($id1 == '0000000001') {
				redirect('/berkas_admin/'.$id); // Redirect kembali ke halaman awal / halaman view data
			}else {
				redirect('/berkas/'); // Redirect kembali ke halaman awal / halaman view data
			}
		}else{ // Jika proses upload gagal
			$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
		}
	}
	public function upload_perjanjian($id){
		$id2 = "8";
		$upload = $this->model_berkas->upload($id2);
		if($upload['result'] == "success"){ // Jika proses upload sukses
			// Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
			$this->model_berkas->save_perjanjian($upload,$id);
				redirect('/nasabah/'); // Redirect kembali ke halaman awal / halaman view data
		}else{ // Jika proses upload gagal
			$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
		}
	}
	public function download($id,$id2){
		$this->load->helper('download');
		$fileinfo = $this->model_berkas->download($id,$id2);
		if ($id2 == "1") {
			$file = './asset/upload/berkas/kk/'.$fileinfo	['kk'];
			force_download($file, NULL);
		}elseif ($id2 == "2") {
			$file = './asset/upload/berkas/slip/'.$fileinfo	['slip'];
			force_download($file, NULL);
		}elseif ($id2 == "3") {
			$file = './asset/upload/berkas/npwp/'.$fileinfo	['npwp'];
			force_download($file, NULL);
		}elseif ($id2 == "4") {
			$file = './asset/upload/berkas/foto_diri/'.$fileinfo	['foto_diri'];
			force_download($file, NULL);
		}elseif ($id2 == "5") {
			$file = './asset/upload/berkas/karip/'.$fileinfo	['karip'];
			force_download($file, NULL);
		}elseif ($id2 == "6") {
			$file = './asset/upload/berkas/ktp/'.$fileinfo	['ktp_suami_istri'];
			force_download($file, NULL);
		}elseif ($id2 == "7") {
			$file = './asset/upload/berkas/sk/'.$fileinfo	['sk'];
			force_download($file, NULL);
		}elseif ($id2 == "8") {
			$file = './asset/upload/berkas/perjanjian/'.$fileinfo	['berkas'];
			force_download($file, NULL);
		}
	}
}
