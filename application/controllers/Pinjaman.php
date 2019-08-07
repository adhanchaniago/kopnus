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
			$set = $this->db->query("SELECT * from tb_angsuran where status='".$status."' and (tanggal <= now() or (now() >= DATE_SUB(tanggal, INTERVAL 3 DAY))) ");
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
			$set = $this->db->query("SELECT * from tb_angsuran where status='".$status."' and (tanggal <= now() or (now() >= DATE_SUB(tanggal, INTERVAL 3 DAY))) ");
			$querys = $this->db->query("SELECT * from tb_berkas where norek='".$id."'");
			$query = $querys->row();
			if (isset($query)) {
				$kk = $query->kk;
				$slip = $query->slip;
				$karip = $query->karip;
				$foto = $query->foto_diri;
				$ktp = $query->ktp_suami_istri;
				$npwp = $query->npwp;
				$sk = $query->sk;
				if ($kk == "0" && $slip == "0" && $karip == "0" && $foto == "0" && $ktp == "0" && $npwp == "0" && $sk == "0") {
					$data['ada'] = 1;
				}
			}
			$data['jumlah'] = $set->num_rows();
			$data['dtlpinj']= $this->model_user->dtlpinj($id);
			$data['listpinj'] =$this->model_pinjam->list_pinjaman($id);
			$this->load->template('admin/pinjaman',$data);
		}else {
			redirect(base_url('login'));
		}
	}
	public function simpan($id){
		$this->session->kali = $this->input->post('angsuran_kali');
		$this->model_pinjam->simpan($id);
		$query = $this->db->query("SELECT id_pinjaman FROM tb_pinjaman where norek='".$id."' ORDER BY id_pinjaman DESC LIMIT 1");
		$row = $query->row();
		$data1=$row->id_pinjaman;
		redirect('/cetak/'.$data1);
	}
}
