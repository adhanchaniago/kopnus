<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Angsuran extends CI_Controller {

	public function __construct() {
	parent::__construct();
	$this->load->model('model_user');
	$this->load->model('model_pinjam');
	}
	public function index($id,$id2)
	{
		$uid=$this->session->uid;
		$data['user'] =$this->model_user->data_user($uid);
		$data['list_angsuran']=$this->model_pinjam->list_angsuran($id,$id2);
		$data['list_pinjaman']=$this->model_pinjam->list_pinj1($id,$id2);
		$this->load->template('angsuran',$data);
	}
	public function admin($id,$id2){
		$uid=$this->session->uid;
		$data['user'] =$this->model_user->data_user($uid);
		$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo();
		$tgl = date('Y-m-d');
		$set = $this->db->query("SELECT * from tb_angsuran where tanggal='".$tgl."' or tanggal < '".$tgl."' ");
		$data['jumlah'] = $set->num_rows();
		$data['usr_angsuran']=$this->model_user->dtl_ang($id2);
			$data['list_pinjaman']=$this->model_pinjam->list_pinj1($id,$id2);
		$data['list_angsuran']=$this->model_pinjam->list_angsuran($id,$id2);
		$this->load->template('admin/angsuran',$data);
	}
	public function bayar($id,$id2){
		$this->model_pinjam->bayar($id,$id2);
		$cek = $this->model_pinjam->last_query_angsuran($id2);
		$data1 = $cek['status'];
		if ($data1 == "1") {
			$this->model_pinjam->update_data($id2);
		}
		redirect('/nasabah');
	}
}
