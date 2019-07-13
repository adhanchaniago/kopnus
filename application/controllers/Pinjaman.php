<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman extends CI_Controller {

	public function __construct() {
	parent::__construct();

	$this->load->model('model_user');
	$this->load->model('model_pinjam');
	$this->load->model('model_berkas');
	}

	public function index(){
		$uid=$this->session->uid;
		if (isset($uid)) {
			$data['user'] =$this->model_user->data_user($uid);
			$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo_user($uid);
			$tgl = date('Y-m-d');
			$status = '0';
			$set = $this->db->query("SELECT * from tb_angsuran where norek='".$uid."' and status='".$status."' and (now() >= DATE_SUB(tanggal, INTERVAL 3 DAY)) ");
			$data['jumlah'] = $set->num_rows();
			$data['pinjaman'] = $this->model_pinjam->list_pinjaman($uid);
			$this->load->template('pinjaman',$data);
		}else {
			redirect(base_url('login'));
		}
	}
	public function input($id){
		$uid=$this->session->uid;
		if (isset($uid)) {
			$data['user'] = $this->model_user->data_user($uid);
			$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo();
			$tgl = date('Y-m-d');
			$status = '0';
			$data['info'] = "0";
			$set = $this->db->query("SELECT * from tb_angsuran where status='".$status."' and tanggal <= now() ");
			$data['jumlah'] = $set->num_rows();
			$data['inptpinj'] =$this->model_user->input_pinj($id);
			$this->load->template('admin/input_pinjaman', $data );
		}else {
			redirect(base_url('login'));
		}
	}
	public function admin($id){
		$uid=$this->session->uid;
		if (isset($uid)) {
			$data['user'] = $this->model_user->data_user($uid);
			$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo();
			$tgl = date('Y-m-d');
			$status = '0';
			$set = $this->db->query("SELECT * from tb_angsuran where status='".$status."' and tanggal <= now() ");
			$data['berkas_kk'] = $this->model_berkas->cek_berkas_kk($id);
			$data['berkas_slip'] = $this->model_berkas->cek_berkas_slip($id);
			$data['berkas_karip'] = $this->model_berkas->cek_berkas_karip($id);
			$data['berkas_foto_diri'] = $this->model_berkas->cek_berkas_foto($id);
			$data['berkas_ktp'] = $this->model_berkas->cek_berkas_ktp($id);
			$data['berkas_npwp'] = $this->model_berkas->cek_berkas_npwp($id);
			$data['berkas_sk'] = $this->model_berkas->cek_berkas_sk($id);
			$data['berkas_perjanjian'] = $this->model_berkas->cek_berkas_perjanjian($id);
			$data['jumlah'] = $set->num_rows();
			$data['dtlpinj']= $this->model_user->dtlpinj($id);
			$data['listpinj'] =$this->model_pinjam->list_pinjaman($id);
			$this->load->template('admin/pinjaman',$data);
		}else {
			redirect(base_url('login'));
		}
	}
	public function simpan($id){
			$this->model_pinjam->simpan($id);
			redirect('/nasabah');
	}
}
