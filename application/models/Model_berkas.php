<?php
class Model_berkas extends CI_Model {

 public function upload($id2){
   if ($id2 == "1") {
     $config['upload_path'] = './asset/upload/berkas/kk';
   }elseif ($id2 == "2") {
       $config['upload_path'] = './asset/upload/berkas/slip';
   }elseif ($id2 == "3") {
       $config['upload_path'] = './asset/upload/berkas/npwp';
   }elseif ($id2 == "4") {
       $config['upload_path'] = './asset/upload/berkas/foto_diri';
   }elseif ($id2 == "5") {
       $config['upload_path'] = './asset/upload/berkas/karip';
   }elseif ($id2 == "6") {
       $config['upload_path'] = './asset/upload/berkas/ktp';
   }elseif ($id2 == "7") {
       $config['upload_path'] = './asset/upload/berkas/sk';
   }elseif ($id2 == "8") {
       $config['upload_path'] = './asset/upload/berkas/perjanjian';
   }
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
 public function data_berkas_kk($uid){
   $query = $this->db->query("SELECT * from tb_berkas_kk where norek='".$uid."'");
     return $query->row_array();
 }
 public function data_berkas_slip($uid){
   $query = $this->db->query("SELECT * from tb_berkas_slip where norek='".$uid."'");
     return $query->row_array();
 }
 public function data_berkas_npwp($uid){
   $query = $this->db->query("SELECT * from tb_berkas_npwp where norek='".$uid."'");
     return $query->row_array();
 }
 public function data_berkas_karip($uid){
   $query = $this->db->query("SELECT * from tb_berkas_karip where norek='".$uid."'");
     return $query->row_array();
 }
 public function data_berkas_foto_diri($uid){
   $query = $this->db->query("SELECT * from tb_berkas_foto_diri where norek='".$uid."'");
     return $query->row_array();
 }
 public function data_berkas_ktp($uid){
   $query = $this->db->query("SELECT * from tb_berkas_ktp_suami_istri where norek='".$uid."'");
     return $query->row_array();
 }
 public function data_berkas_sk($uid){
   $query = $this->db->query("SELECT * from tb_berkas_sk where norek='".$uid."'");
     return $query->row_array();
 }
 public function data_berkas_perjanjian($uid){
   $query = $this->db->query("SELECT * from tb_berkas_perjanjian where norek='".$uid."'");
     return $query->row_array();
 }
 public function save_kk($upload,$id){
   $query = $this->db->query("SELECT * from tb_berkas_kk where norek='".$id."'");
   $i2 = $query->row_array();
   if (isset($i2)) {
     $this->db->where('norek',$id);
     $query = $this->db->get('tb_berkas_kk');
     $row = $query->row();
     unlink("./asset/upload/berkas/kk/$row->kk");
    $data = array('kk' => $upload['file']['file_name']);
    $this->db->where('norek',$id);
    $this->db->update( 'tb_berkas_kk', $data );
   }else {
	 $data = [
					 'norek' => $id,
					 'kk' => $upload['file']['file_name'],
					 'status' => "0"
			 ];
			 $this->db->insert( 'tb_berkas_kk', $data );
     }
 }
 public function save_foto_diri($upload,$id){
   $query = $this->db->query("SELECT * from tb_berkas_foto_diri where norek='".$id."'");
   $i2 = $query->row_array();
   if (isset($i2)) {
     $this->db->where('norek',$id);
     $query = $this->db->get('tb_berkas_foto_diri');
     $row = $query->row();
     unlink("./asset/upload/berkas/foto_diri/$row->foto_diri");
    $data = array('foto_diri' => $upload['file']['file_name']);
    $this->db->where('norek',$id);
    $this->db->update( 'tb_berkas_foto_diri', $data );
   }else {
   $data = [
					 'norek' => $id,
					 'foto_diri' => $upload['file']['file_name'],
					 'status' => "0"
			 ];
			 $this->db->insert( 'tb_berkas_foto_diri', $data );
     }
 }
 public function save_slip($upload,$id){
   $query = $this->db->query("SELECT * from tb_berkas_slip where norek='".$id."'");
   $i2 = $query->row_array();
   if (isset($i2)) {
     $this->db->where('norek',$id);
     $query = $this->db->get('tb_berkas_slip');
     $row = $query->row();
     unlink("./asset/upload/berkas/slip/$row->foto_diri");
    $data = array('slip' => $upload['file']['file_name']);
    $this->db->where('norek',$id);
    $this->db->update( 'tb_berkas_slip', $data );
   }else {
	 $data = [
					 'norek' => $id,
					 'slip' => $upload['file']['file_name'],
					 'status' => "0"
			 ];
			 $this->db->insert( 'tb_berkas_slip', $data );
     }
 }
 public function save_npwp($upload,$id){
   $query = $this->db->query("SELECT * from tb_berkas_npwp where norek='".$id."'");
   $i2 = $query->row_array();
   if (isset($i2)) {
     $this->db->where('norek',$id);
     $query = $this->db->get('tb_berkas_npwp');
     $row = $query->row();
     unlink("./asset/upload/berkas/npwp/$row->npwp");
    $data = array('npwp' => $upload['file']['file_name']);
    $this->db->where('norek',$id);
    $this->db->update( 'tb_berkas_npwp', $data );
   }else {
	 $data = [
					 'norek' => $id,
					 'npwp' => $upload['file']['file_name'],
					 'status' => "0"
			 ];
			 $this->db->insert( 'tb_berkas_npwp', $data );
 }
}
 public function save_karip($upload,$id){
   $query = $this->db->query("SELECT * from tb_berkas_karip where norek='".$id."'");
   $i2 = $query->row_array();
   if (isset($i2)) {
     $this->db->where('norek',$id);
     $query = $this->db->get('tb_berkas_karip');
     $row = $query->row();
     unlink("./asset/upload/berkas/karip/$row->karip");
    $data = array('karip' => $upload['file']['file_name']);
    $this->db->where('norek',$id);
    $this->db->update( 'tb_berkas_karip', $data );
   }else {
	 $data = [
					 'norek' => $id,
					 'karip' => $upload['file']['file_name'],
					 'status' => "0"
			 ];
			 $this->db->insert( 'tb_berkas_karip', $data );
 }}
 public function save_ktp($upload,$id){
   $query = $this->db->query("SELECT * from tb_berkas_ktp_suami_istri where norek='".$id."'");
   $i2 = $query->row_array();
   if (isset($i2)) {
     $this->db->where('norek',$id);
     $query = $this->db->get('tb_berkas_ktp_suami_istri');
     $row = $query->row();
     unlink("./asset/upload/berkas/ktp/$row->ktp_suami_istri");
    $data = array('ktp_suami_istri' => $upload['file']['file_name']);
    $this->db->where('norek',$id);
    $this->db->update( 'tb_berkas_ktp_suami_istri', $data );
   }else {
	 $data = [
					 'norek' => $id,
					 'ktp_suami_istri' => $upload['file']['file_name'],
					 'status' => "0"
			 ];
			 $this->db->insert( 'tb_berkas_ktp_suami_istri', $data );
 }}
 public function save_sk($upload,$id){
   $query = $this->db->query("SELECT * from tb_berkas_sk where norek='".$id."'");
   $i2 = $query->row_array();
   if (isset($i2)) {
     $this->db->where('norek',$id);
     $query = $this->db->get('tb_berkas_sk');
     $row = $query->row();
     unlink("./asset/upload/berkas/sk/$row->sk");
    $data = array('sk' => $upload['file']['file_name']);
    $this->db->where('norek',$id);
    $this->db->update( 'tb_berkas_sk', $data );
   }else {
	 $data = [
					 'norek' => $id,
					 'sk' => $upload['file']['file_name'],
					 'status' => "0"
			 ];
			 $this->db->insert( 'tb_berkas_sk', $data );
 }}
 public function save_perjanjian($upload,$id){
   $query = $this->db->query("SELECT * from tb_berkas_perjanjian where norek='".$id."'");
   $i2 = $query->row_array();
   if (isset($i2)) {
     $this->db->where('norek',$id);
     $query = $this->db->get('tb_berkas_perjanjian');
     $row = $query->row();
     unlink("./asset/upload/berkas/perjanjian/$row->perjanjian");
    $data = array('perjanjian' => $upload['file']['file_name']);
    $this->db->where('norek',$id);
    $this->db->update( 'tb_berkas_perjanjian', $data );
   }else {
  $data = [
          'norek' => $id,
          'perjanjian' => $upload['file']['file_name'],
          'status' => "0"
      ];
      $this->db->insert( 'tb_berkas_perjanjian', $data );
 }}
 function download($id,$id2){
   if ($id2 == "1") {
     $query = $this->db->query("SELECT * from tb_berkas_kk where norek='".$id."'");
     return $query->row_array();
   }elseif ($id2 == "2") {
     $query = $this->db->query("SELECT * from tb_berkas_slip where norek='".$id."'");
     return $query->row_array();
   }elseif ($id2 == "3") {
     $query = $this->db->query("SELECT * from tb_berkas_npwp where norek='".$id."'");
     return $query->row_array();
   }elseif ($id2 == "4") {
     $query = $this->db->query("SELECT * from tb_berkas_foto_diri where norek='".$id."'");
     return $query->row_array();
   }elseif ($id2 == "5") {
     $query = $this->db->query("SELECT * from tb_berkas_karip where norek='".$id."'");
     return $query->row_array();
   }elseif ($id2 == "6") {
     $query = $this->db->query("SELECT * from tb_berkas_ktp_suami_istri where norek='".$id."'");
     return $query->row_array();
   }elseif ($id2 == "7") {
     $query = $this->db->query("SELECT * from tb_berkas_sk where norek='".$id."'");
     return $query->row_array();
   }elseif ($id2 == "8") {
     $query = $this->db->query("SELECT * from tb_berkas_perjanjian where norek='".$id."'");
     return $query->row_array();
   }
  }
  public function cek_berkas_kk($id){
    $query = $this->db->query("SELECT * from tb_berkas_kk where norek='".$id."'");
    return $query->row_array();
  }
  public function cek_berkas_slip($id){
    $query = $this->db->query("SELECT * from tb_berkas_slip where norek='".$id."'");
    return $query->row_array();
  }
  public function cek_berkas_npwp($id){
    $query = $this->db->query("SELECT * from tb_berkas_npwp where norek='".$id."'");
    return $query->row_array();
  }
  public function cek_berkas_karip($id){
    $query = $this->db->query("SELECT * from tb_berkas_karip where norek='".$id."'");
    return $query->row_array();
  }
  public function cek_berkas_foto($id){
    $query = $this->db->query("SELECT * from tb_berkas_foto_diri where norek='".$id."'");
    return $query->row_array();
  }
  public function cek_berkas_ktp($id){
    $query = $this->db->query("SELECT * from tb_berkas_ktp_suami_istri where norek='".$id."'");
    return $query->row_array();
  }
  public function cek_berkas_sk($id){
    $query = $this->db->query("SELECT * from tb_berkas_sk where norek='".$id."'");
    return $query->row_array();
  }
  public function cek_berkas_perjanjian($id){
    $query = $this->db->query("SELECT * from tb_berkas_perjanjian where norek='".$id."'");
    return $query->row_array();
  }
}
