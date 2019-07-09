<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman extends CI_Controller {

	public function __construct() {
	parent::__construct();

	$this->load->model('model_user');
	$this->load->model('model_pinjam');
	}

	public function index(){
		$uid=$this->session->uid;
		$data['user'] =$this->model_user->data_user($uid);
		$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo_user($uid);
		$tgl = date('Y-m-d');
		$set = $this->db->query("SELECT * from tb_angsuran where norek='".$uid."' and (now() >= DATE_SUB(tanggal, INTERVAL 3 DAY)) ");
		$data['jumlah'] = $set->num_rows();
		$data['pinjaman'] = $this->model_pinjam->list_pinjaman($uid);
		$this->load->template('pinjaman',$data);
	}
	public function input($id){
		$uid=$this->session->uid;
		$data['user'] = $this->model_user->data_user($uid);
		$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo();
		$tgl = date('Y-m-d');
		$set = $this->db->query("SELECT * from tb_angsuran where (now() >= DATE_SUB(tanggal, INTERVAL 3 DAY)) ");
		$data['jumlah'] = $set->num_rows();
		$data['inptpinj'] =$this->model_user->input_pinj($id);
		$this->load->template('admin/input_pinjaman', $data );
	}
	public function admin($id){
		$uid=$this->session->uid;
		$data['user'] = $this->model_user->data_user($uid);
		$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo();
		$tgl = date('Y-m-d');
		$set = $this->db->query("SELECT * from tb_angsuran where tanggal='".$tgl."' or tanggal < '".$tgl."' ");
		$data['jumlah'] = $set->num_rows();
		$data['dtlpinj']= $this->model_user->dtlpinj($id);
		$data['listpinj'] =$this->model_pinjam->list_pinjaman($id);
		$this->load->template('admin/pinjaman',$data);
	}
	public function simpan($id){
		$this->model_pinjam->simpan($id);
		redirect('/nasabah');
	}
}
