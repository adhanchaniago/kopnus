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
		if (isset($uid)) {
			$data['user'] =$this->model_user->data_user($uid);
			$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo_user($uid);
			$tgl = date('Y-m-d');
			$status = '0';
			$set = $this->db->query("SELECT * from tb_angsuran where norek='".$uid."' and status='".$status."' and (now() >= DATE_SUB(tanggal, INTERVAL 3 DAY)) ");
			$data['jumlah'] = $set->num_rows();
			$set1 = $this->db->query("SELECT * from tb_pinjaman where id_pinjaman='".$id."' ")->row();
			$data['berkas'] = $set1->berkas;
			$data['id']= $id;
			$data['list_angsuran']=$this->model_pinjam->list_angsuran($id,$id2);
			$data['list_pinjaman']=$this->model_pinjam->list_pinj1($id,$id2);
			$this->load->template('angsuran',$data);
		}else {
			redirect(base_url('login'));
		}
	}
	public function admin($id,$id2){
		$uid=$this->session->uid;
		if (isset($uid)) {
			$data['user'] =$this->model_user->data_user($uid);
			$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo();
			$tgl = date('Y-m-d');
			$status = '0';
			$set = $this->db->query("SELECT * from tb_angsuran where status='".$status."' and (tanggal <= now() or (now() >= DATE_SUB(tanggal, INTERVAL 3 DAY))) ");
			$data['jumlah'] = $set->num_rows();
			$set1 = $this->db->query("SELECT * from tb_pinjaman where id_pinjaman='".$id."' ")->row();
			$data['berkas'] = $set1->berkas;
			$data['usr_angsuran']=$this->model_user->dtl_ang($id2);
			$data['list_pinjaman']=$this->model_pinjam->list_pinj1($id,$id2);
			$data['id']= $id;
			$data['list_angsuran']=$this->model_pinjam->list_angsuran($id,$id2);
			$this->load->template('admin/angsuran',$data);
		}else {
			redirect(base_url('login'));
		}
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
