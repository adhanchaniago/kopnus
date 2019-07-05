<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
	parent::__construct();

	$this->load->model('model_user');
	$this->load->model('model_pinjam');
	}
	public function index()
	{
		if (isset( $this->session->uid )) {
			$uid=$this->session->uid;
			$data['user'] = $this->model_user->data_user($uid);
			if ($uid == "1") {
				$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo();
				$tgl = date('Y-m-d');
				$set = $this->db->query("SELECT * from tb_angsuran where tanggal='".$tgl."' or tanggal < '".$tgl."' ");
				$data['jumlah'] = $set->num_rows();
			}else {
				$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo_user($uid);
				$tgl = date('Y-m-d');
				$set = $this->db->query("SELECT * from tb_angsuran where norek='".$uid."' and tanggal='".$tgl."' or tanggal < '".$tgl."' ");
				$data['jumlah'] = $set->num_rows();
			}
			$this->load->view('layout/header');
			$this->load->view('layout/nav',$data);
			$this->load->view('index');
			$this->load->view('layout/footer');
		}else {
			$this->load->template('index');
		}
	}
	public function login()
	{
		$data['cek']="0";
		$this->load->template('login',$data);
	}
	public function signin()
	{
		$nama = $this->input->post('nama');
    $pass = $this->input->post('password');
		$pass1 = md5($pass);
		$user = $this->model_user->signin( $nama,$pass1 );
    if( isset($user)){
        // password cocok, login berhasil
        // simpan data session untuk mengenali user di setiap halaman
        $this->session->uid = $user['norek'];
        $this->session->nama = $user['nama'];
				$data['foto']= $user['foto'];
        // kembali ke halaman depan
				redirect('/', $data);
      } else {
				$data['cek']= "1";
				$this->load->template('login',$data);
      }
	}
	public function Nasabah(){
		$uid=$this->session->uid;
		if (isset($uid)) {
			$data['user'] =$this->model_user->data_user($uid);
			$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo();
			$tgl = date('Y-m-d');
			$set = $this->db->query("SELECT * from tb_angsuran where tanggal='".$tgl."' or tanggal < '".$tgl."' ");
			$data['jumlah'] = $set->num_rows();
			$data['listusr']= $this->model_user->tampil_user();
			$this->load->template('admin/nasabah', $data);
		}else {
			redirect(base_url('login'));
		}
	}
	public function signout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
	public function register(){
		$uid=$this->session->uid;
		if (isset($uid)) {
			$data['user'] =$this->model_user->data_user($uid);
			$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo();
			$tgl = date('Y-m-d');
			$set = $this->db->query("SELECT * from tb_angsuran where tanggal='".$tgl."' or tanggal < '".$tgl."' ");
			$data['jumlah'] = $set->num_rows();
			$data['info'] = "2";
			$this->load->template('admin/register', $data);
		}else {
			redirect(base_url('login'));
		}
	}
	public function req(){
		$uid=$this->session->uid;
		$data['user'] =$this->model_user->data_user($uid);
		$pass1 = $this->input->post('password');
		$pass2 = $this->input->post('confirmPassword');
		if ($pass1 == $pass2) {
			$this->model_user->register();
			$data['info'] = "0";
			$this->load->template('admin/register', $data);
		}else {
			$data['info'] = "1";
			$this->load->template('admin/register', $data);
		}
	}
	public function profil(){
		$uid=$this->session->uid;
		if (isset($uid)) {
			$data['user'] =$this->model_user->data_user($uid);
			if ($uid == "1") {
				$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo();
				$tgl = date('Y-m-d');
				$set = $this->db->query("SELECT * from tb_angsuran where tanggal='".$tgl."' or tanggal < '".$tgl."' ");
				$data['jumlah'] = $set->num_rows();
			}else {
				$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo_user($uid);
				$tgl = date('Y-m-d');
				$set = $this->db->query("SELECT * from tb_angsuran where norek='".$uid."' and tanggal='".$tgl."' or tanggal < '".$tgl."' ");
				$data['jumlah'] = $set->num_rows();
			}
			$this->load->template('profil', $data);
		}else {
			redirect(base_url('login'));
		}
	}
	public function upload(){
		$nama = $this->session->uid;
		$upload = $this->model_user->upload();

		if($upload['result'] == "success"){ // Jika proses upload sukses
			 // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
			$this->model_user->save($upload,$nama);

			redirect('/'); // Redirect kembali ke halaman awal / halaman view data
		}else{ // Jika proses upload gagal
			$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
		}
	}
}
