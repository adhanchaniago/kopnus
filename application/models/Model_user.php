<?php
class Model_user extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	public function signin($nama,$pass1){
		$sql = "SELECT * FROM tb_user WHERE nama='".$nama."' and password='".$pass1."'";
		$query = $this->db->query( $sql );
		return $query->row_array();
	}
	public function data_user($uid){
		$query = $this->db->query("SELECT * from tb_user where norek='".$uid."'");
		return $query->row_array();
	}
	public function register(){
		$data = [
			'norek'=> $this->input->post('norek'),
			'nama' => $this->input->post('nama'),
			'password' => md5($this->input->post('password')),
			'alamat' => $this->input->post('alamat'),
			'no_tlp' => $this->input->post('no_tlp'),
			'foto' =>"default.png"
		];
		$this->db->insert( 'tb_user', $data );
	}
	public function upload(){
		$config['upload_path'] = './asset/upload/';
		$config['allowed_types'] = 'jpg|png|jpeg|pdf';
		$config['remove_space'] = TRUE;

		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('foto')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('error' => $this->upload->display_errors());
			return $return;
		}
	}
	// Fungsi untuk menyimpan data ke database
	public function save($upload,$nama){
		$this->db->where('norek',$nama);
		$query = $this->db->get('tb_user');
		$row = $query->row();
		unlink("./asset/upload/$row->foto");
		$data = array('foto' => $upload['file']['file_name']);
		$this->db->where('norek',$nama);
		$this->db->update( 'tb_user', $data );
	}
	public function tampil_user($limit,$start,$cari = null){
		$q = "0000000001";
		if ($cari) {
			$query = $this->db->query("SELECT * from tb_user where not norek='".$q."' and nama like '%$cari%' or norek like '%$cari%' limit $start, $limit");
		}else {
			$query = $this->db->query("SELECT * from tb_user where not norek='".$q."' limit $start, $limit");
		}
		return $query->result_array();
	}
	public function dtlpinj($id){
		$query = $this->db->query("SELECT * from tb_user where norek='".$id."'");
		return $query->row_array();
	}
	public function input_pinj($id){
		$query = $this->db->query("SELECT * from tb_user where norek='".$id."'");
		return $query->row_array();
	}
	public function dtl_ang($id){
		$query = $this->db->query("SELECT * from tb_user where norek='".$id."'");
		return $query->row_array();
	}
	public function countuser(){
		$id = "0000000001";
		$query = $this->db->query("SELECT * from tb_user where not norek='".$id."'");
		return $query->num_rows();
	}
	public function cek_norek(){
		$id = $this->input->post('norek');
		$query = $this->db->query("SELECT * from tb_user where norek='".$id."'");
		return $query->row_array();
	}
	public function tampil_laporan(){
		$tgl1 = $this->input->post('date1');
		$tgl2 = $this->input->post('date2');
		$query = $this->db->query("SELECT * from tb_user inner join tb_angsuran using(norek) where status = '0' and tanggal between '$tgl1' and '$tgl2'");
		return $query->result_array();
	}
}
