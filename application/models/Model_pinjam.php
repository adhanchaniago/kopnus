<?php
class Model_pinjam extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	public function countpinjam(){
		$this->db->select('SUM(pinjaman) as total');
		$this->db->from('tb_pinjaman');
		return $this->db->get()->row()->total;
	}
	public function countangsuran(){
		//	$this->db->select('SUM(angsuran) as total');
		//$this->db->from('tb_angsuran');
		//$this->db->where('status',"1")
		//return $this->db->get()->row()->total;
		$query = $this->db->query("SELECT SUM(angsuran) as total from tb_angsuran where status='1'");
		return $query->row()->total;
	}
	public function simpan($id){
		$d1 = $this->input->post('pinjaman');
		$d2 = $this->input->post('angsuran_kali');
		$tgl1 = date('Y-m-d');
		$total = ($d1 * 0.01 * $d2 + $d1)/$d2;
		$sisa = $total * $d2;
		$tgl2 = $tgl1;
		$data = [
			'norek' => $this->input->post('id'),
			'pinjaman' => $this->input->post('pinjaman'),
			'tanggal' => $tgl1,
			'angsuran' => $total,
			'sisa' => $sisa,
			'status' => "0"
		];
		$this->db->insert( 'tb_pinjaman', $data );
		$query = $this->db->query("SELECT id_pinjaman FROM tb_pinjaman where norek='".$id."' ORDER BY id_pinjaman DESC LIMIT 1");
		$row = $query->row();
		$data1=$row->id_pinjaman;
		$id_pinj = $data1;
		$z=1;
		for ($i=0; $i < $d2 ; $i++) {
			$tgl2 = date('Y-m-d', strtotime('+31 days', strtotime($tgl2)));
			$data = [
				'norek' => $this->input->post('id'),
				'id_pinjaman' => $id_pinj,
				'angsuran_ke' =>$z,
				'angsuran' => $total,
				'tanggal' => $tgl2,
				'status' => '0'
			];
			$this->db->insert( 'tb_angsuran', $data );
			$z++;
		}
	}
	public function list_pinjaman($id){
		$query = $this->db->query("SELECT * from tb_pinjaman where norek='".$id."'");
		return $query->result_array();
	}
	public function list_angsuran($id,$id2){
		$query = $this->db->query("SELECT * from tb_angsuran where norek='".$id2."' and id_pinjaman='".$id."'");
		return $query->result_array();
	}
	function list_pinj1($id,$id2){
		$query = $this->db->query("SELECT * from tb_pinjaman where norek='".$id2."' and id_pinjaman='".$id."'");
		return $query->row_array();
	}
	function sisa($id){
		$query = $this->db->query("SELECT SUM(angsuran) as total from tb_angsuran where id_pinjaman='".$id."' and status='0'");
		return $query->row_array();
	}
	function last_id_pinjaman(){
		$query = $this->db->query("SELECT id_pinjaman FROM tb_pinjaman ORDER BY id_pinjaman DESC LIMIT 1");
		return $query;
	}
	public function bayar($id,$id2){
		$data = array ('status' => $this->input->post('status_angsuran'));
		$array = array('id_angsuran' => $id, 'id_pinjaman' => $id2);
		$this->db->where($array);
		$this->db->update( 'tb_angsuran', $data );
		$query = $this->db->query("SELECT angsuran, sum(angsuran) as total FROM tb_angsuran where id_pinjaman='".$id2."' and status='1'");
		$row = $query->row();
		$data1=$row->total;
		$data2 = $row->angsuran;
		$query = $this->db->query("SELECT sisa FROM tb_pinjaman where id_pinjaman='".$id2."'");
		$row = $query->row();
		$gb=$row->sisa;
		$ttl= $gb-$data2;
		$data = array ('bayar' => $data1, 'sisa' => $ttl);
		$this->db->where('id_pinjaman', $id2);
		$this->db->update( 'tb_pinjaman', $data );
	}
	public function pelunasan($id2){
		$data = array ('status' => '1');
		$this->db->where('id_pinjaman', $id2);
		$this->db->update( 'tb_pinjaman', $data );
	}
	public function last_query_angsuran($id2){
		$query = $this->db->query("SELECT * from tb_angsuran where id_pinjaman='".$id2."' ORDER by id_angsuran desc limit 1 ");
		return $query->row_array();
	}
	public function update_data($id2){
		$data = array ('status' => '1');
		$this->db->where('id_pinjaman', $id2);
		$this->db->update( 'tb_pinjaman', $data );
	}
	public function jatuh_tempo(){
		$tgl = date('Y-m-d');
		$i = "0";
		$query = $this->db->query("SELECT * from tb_angsuran inner join tb_user using(norek) where tb_angsuran.status = '".$i."' and (tb_angsuran.tanggal ='".$tgl."' or tb_angsuran.tanggal < '".$tgl."' or (now() >= DATE_SUB(tb_angsuran.tanggal, INTERVAL 3 DAY))) ");
		return $query->result_array();
	}
	public function jatuh_tempo_user($uid){
		$tgl = date('Y-m-d');
		$i = "0";
		$query = $this->db->query("SELECT * from tb_angsuran inner join tb_user using(norek) where tb_angsuran.status = '".$i."' and tb_user.norek='".$uid."' and (now() >= DATE_SUB(tb_angsuran.tanggal, INTERVAL 3 DAY)) ");
		return $query->result_array();
	}
}
