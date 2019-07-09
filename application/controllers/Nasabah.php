<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nasabah extends CI_Controller {
	public function __construct() {
	parent::__construct();

	$this->load->model('model_user');
	$this->load->model('model_pinjam');
	}
	public function index(){
		$uid=$this->session->uid;
		if (isset($uid)) {
			$data['user'] =$this->model_user->data_user($uid);
			$data['jatuh_tempo'] = $this->model_pinjam->jatuh_tempo();
			$tgl = date('Y-m-d');
			$set = $this->db->query("SELECT * from tb_angsuran where (now() >= DATE_SUB(tanggal, INTERVAL 3 DAY)) ");
			$data['jumlah'] = $set->num_rows();
			//Pagination
			$this->load->library('pagination');
			if ($this->input->post('submit')) {
				$data['cari'] = $this->input->post('cari');
				$this->session->set_userdata('keyword', $data['cari']);
			}else{
				$data['cari'] = $this->session->set_userdata('keyword');
			}
			$config['base_url'] = 'http://localhost/kopnus/nasabah/index/';
			//$config['total_rows'] = $this->model_user->countuser();
			$this->db->like('nama',$data['cari']);
			$this->db->from('tb_user');
			$config['total_rows'] = $this->db->count_all_results();
			$config['per_page'] = 10;

			$config['full_tag_open']= '<nav aria-label="Page navigation example"><ul class="pagination">';
			$config['full_tag_close']= '</ul></nav>';
			$config['first_link'] = 'First';
			$config['first_tag_open'] = '<li class="page-item">';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li class="page-item">';
			$config['last_tag_close'] = '</li>';
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li class="page-item">';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = 'Prev';
			$config['prev_tag_open'] = '<li class="page-item">';
			$config['prev_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li class="page-item">';
			$config['num_tag_close'] = '</li>';
			$config['attributes'] = array('class' => 'page-link');
			$data['start'] =($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['listusr']= $this->model_user->tampil_user($config['per_page'],$data['start'],$data['cari']);
			$this->pagination->initialize($config);
			$this->load->template('admin/nasabah', $data);
		}else {
			redirect(base_url('login'));
		}
	}

}
