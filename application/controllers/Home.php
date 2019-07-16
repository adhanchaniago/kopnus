<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
	parent::__construct();
	$this->load->model('model_user');
	$this->load->model('model_pinjam');
	}
	public function index(){
		if (isset( $this->session->uid )) {
			$uid=$this->session->uid;
			$data['user'] = $this->model_user->data_user($uid);
			if ($uid == "0000000001") {
				$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo();
				$tgl = date('Y-m-d');
				$status = '0';
				$set = $this->db->query("SELECT * from tb_angsuran where status='".$status."' and (tanggal <= now() or (now() >= DATE_SUB(tanggal, INTERVAL 3 DAY)))");
				$data['jumlah'] = $set->num_rows();
			}else {
				$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo_user($uid);
				$tgl = date('Y-m-d');
				$status = '0';
				$set = $this->db->query("SELECT * from tb_angsuran where norek='".$uid."' and status='".$status."' and (now() >= DATE_SUB(tanggal, INTERVAL 3 DAY)) ");
				$data['jumlah'] = $set->num_rows();
			}
			$data['nasabah'] = $this->model_user->countuser();
			$data['pinjaman'] = $this->model_pinjam->countpinjam();
			$data['angsuran'] = $this->model_pinjam->countangsuran();
			$this->load->view('layout/header');
			$this->load->view('layout/nav',$data);
			$this->load->view('index', $data);
			$this->load->view('layout/footer');
		}else {
			$data['nasabah'] = $this->model_user->countuser();
			$data['pinjaman'] = $this->model_pinjam->countpinjam();
			$data['angsuran'] = $this->model_pinjam->countangsuran();
			$this->load->template('index',$data);
		}
	}
	public function login(){
		$data['cek']="0";
		$this->load->template('login',$data);
	}
	public function signin(){
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
	public function signout(){
		$this->session->sess_destroy();
		redirect('/');
	}
	public function register(){
		$uid=$this->session->uid;
		if (isset($uid)) {
			$data['user'] =$this->model_user->data_user($uid);
			$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo();
			$tgl = date('Y-m-d');
			$status = '0';
			$set = $this->db->query("SELECT * from tb_angsuran where status='".$status."' and (tanggal <= now() or (now() >= DATE_SUB(tanggal, INTERVAL 3 DAY))) ");
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
		$norek = $this->model_user->cek_norek();
		if ( empty($norek)) {
			if ($pass1 == $pass2) {
				$this->model_user->register();
					$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo();
					$tgl = date('Y-m-d');
					$status = '0';
					$set = $this->db->query("SELECT * from tb_angsuran where status='".$status."' and (tanggal <= now() or (now() >= DATE_SUB(tanggal, INTERVAL 3 DAY))) ");
					$data['jumlah'] = $set->num_rows();
				$data['info'] = "0";
				$this->load->template('admin/register', $data);
			}else {
				$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo();
				$tgl = date('Y-m-d');
				$status = '0';
				$set = $this->db->query("SELECT * from tb_angsuran where status='".$status."' and (tanggal <= now() or (now() >= DATE_SUB(tanggal, INTERVAL 3 DAY))) ");
				$data['jumlah'] = $set->num_rows();
				$data['info'] = "1";
				$this->load->template('admin/register', $data);
			}
		}else {
			$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo();
			$tgl = date('Y-m-d');
			$status = '0';
			$set = $this->db->query("SELECT * from tb_angsuran where status='".$status."' and (tanggal <= now() or (now() >= DATE_SUB(tanggal, INTERVAL 3 DAY))) ");
			$data['jumlah'] = $set->num_rows();
			$data['info'] = "3";
			$this->load->template('admin/register', $data);
		}
	}
	public function profil(){
		$uid=$this->session->uid;
		if (isset($uid)) {
			$data['user'] =$this->model_user->data_user($uid);
			if ($uid == "0000000001") {
				$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo();
				$tgl = date('Y-m-d');
				$status = '0';
				$set = $this->db->query("SELECT * from tb_angsuran where status='".$status."' and (tanggal <= now() or (now() >= DATE_SUB(tanggal, INTERVAL 3 DAY))) ");
				$data['jumlah'] = $set->num_rows();
			}else {
				$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo_user($uid);
				$tgl = date('Y-m-d');
				$status = '0';
				$set = $this->db->query("SELECT * from tb_angsuran where status='".$status."' and (now() >= DATE_SUB(tanggal, INTERVAL 3 DAY)) ");
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
			 // Panggil function save yang ada di model_user.php untuk menyimpan data ke database
			$this->model_user->save($upload,$nama);
			redirect('/'); // Redirect kembali ke halaman awal / halaman view data
		}else{ // Jika proses upload gagal
			$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
		}
	}
	public function laporan(){
		$uid=$this->session->uid;
		if (isset($uid)) {
			$data['user'] = $this->model_user->data_user($uid);
			$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo();
			$tgl = date('Y-m-d');
			$status = '0';
			$set = $this->db->query("SELECT * from tb_angsuran where status='".$status."' and (tanggal <= now() or (now() >= DATE_SUB(tanggal, INTERVAL 3 DAY))) ");
			$data['jumlah'] = $set->num_rows();
			$jth_tempo = $this->db->query("SELECT * from tb_angsuran inner join tb_user using (norek) where status='".$status."' and tanggal <= now() ");
			$data['laporan'] =$jth_tempo->result_array();
			$this->load->template('admin/laporan', $data);
		}else {
			redirect(base_url('login'));
		}
	}
public function laporan_tampil(){
		$uid=$this->session->uid;
		if (isset($uid)) {
			$data['user'] = $this->model_user->data_user($uid);
			$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo();
			$tgl = date('Y-m-d');
			$status = '0';
			$set = $this->db->query("SELECT * from tb_angsuran where status='".$status."' and (tanggal <= now() or (now() >= DATE_SUB(tanggal, INTERVAL 3 DAY))) ");
			$data['jumlah'] = $set->num_rows();
			$data['laporan']= $this->model_user->tampil_laporan();
			$this->load->template('admin/laporan', $data);
		}else {
			redirect(base_url('login'));
		}
	}
	public function notifikasi(){
		$uid=$this->session->uid;
		if (isset($uid)) {
			$data['user'] = $this->model_user->data_user($uid);
			$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo();
			$tgl = date('Y-m-d');
			$status = '0';
			$set = $this->db->query("SELECT * from tb_angsuran where status='".$status."' and (tanggal <= now() or (now() >= DATE_SUB(tanggal, INTERVAL 3 DAY))) ");
			$set1 = $this->db->query("SELECT * from tb_angsuran inner join tb_user using (norek) where status='".$status."' and (tanggal <= now() or (now() >= DATE_SUB(tanggal, INTERVAL 3 DAY))) ");
			$data['jumlah'] = $set->num_rows();
			$data['data_pesan'] = $set1->result_array();
			$this->load->template('admin/notifikasi', $data);
		}else {
			redirect(base_url('login'));
		}
	}
}
