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
    $config['max_size']  = '0';
    $config['remove_space'] = TRUE;
    $this->upload->initialize($config);
    $this->load->library('upload', $config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('foto')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      echo "Gagal";
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }
  public function data_berkas($uid){
    $query = $this->db->query("SELECT * from tb_berkas where norek='".$uid."'");
    return $query->row_array();
  }
  public function data_berkas_sk($uid){
    $query = $this->db->query("SELECT * from tb_pinjaman where norek='".$uid."'");
    return $query->row_array();
  }
  public function save($upload,$id,$var1){
    $query = $this->db->query("SELECT * from tb_berkas where norek='".$id."'");
    $i2 = $query->row_array();
    if (isset($i2)) {
      $this->db->where('norek',$id);
      $query = $this->db->get('tb_berkas');
      $row = $query->row();
      if ($var1 == 1) {
        unlink("./asset/upload/berkas/kk/$row->kk");
        $data = array('kk' => $upload['file']['file_name']);
      }elseif ($var1 == 2) {
        unlink("./asset/upload/berkas/kk/$row->slip");
        $data = array('slip' => $upload['file']['file_name']);
      }elseif ($var1 == 3) {
        unlink("./asset/upload/berkas/kk/$row->npwp");
        $data = array('npwp' => $upload['file']['file_name']);
      }elseif ($var1 == 4) {
        unlink("./asset/upload/berkas/kk/$row->foto_diri");
        $data = array('foto_diri' => $upload['file']['file_name']);
      }elseif ($var1 == 5) {
        unlink("./asset/upload/berkas/kk/$row->karip");
        $data = array('karip' => $upload['file']['file_name']);
      }elseif ($var1 == 6) {
        unlink("./asset/upload/berkas/kk/$row->ktp_suami_istri");
        $data = array('ktp_suami_istri' => $upload['file']['file_name']);
      }elseif ($var1 == 7) {
        unlink("./asset/upload/berkas/kk/$row->sk");
        $data = array('sk' => $upload['file']['file_name']);
      }
      $this->db->where('norek',$id);
      $this->db->update( 'tb_berkas', $data );
    }else {
      if ($var1 == 1) {
        $data = [
          'norek' => $id,
          'kk' => $upload['file']['file_name'],
          'status_kk' => "0"
        ];
      }elseif ($var1 == 2) {
        $data = [
          'norek' => $id,
          'slip' => $upload['file']['file_name'],
          'status_slip' => "0"
        ];
      }elseif ($var1 == 3) {
        $data = [
          'norek' => $id,
          'npwp' => $upload['file']['file_name'],
          'status_npwp' => "0"
        ];
      }elseif ($var1 == 4) {
        $data = [
          'norek' => $id,
          'foto_diri' => $upload['file']['file_name'],
          'status_foto' => "0"
        ];
      }elseif ($var1 == 5) {
        $data = [
          'norek' => $id,
          'karip' => $upload['file']['file_name'],
          'status_karip' => "0"
        ];
      }elseif ($var1 == 6) {
        $data = [
          'norek' => $id,
          'ktp_suami_istri' => $upload['file']['file_name'],
          'status_ktp' => "0"
        ];
      }elseif ($var1 == 7) {
        $data = [
          'norek' => $id,
          'sk' => $upload['file']['file_name'],
          'status_sk' => "0"
        ];
      }
      $this->db->insert( 'tb_berkas', $data );
    }
  }
  public function save_perjanjian($upload,$id){
    $query = $this->db->query("SELECT berkas from tb_pinjaman where id_pinjaman='".$id."'");
    $i2 = $query->row_array();
    if (isset($i2)) {
      $this->db->where('id_pinjaman',$id);
      $query = $this->db->get('tb_pinjaman');
      $row = $query->row();
      unlink("./asset/upload/berkas/perjanjian/$row->berkas");
      $data = array('berkas' => $upload['file']['file_name']);
      $this->db->where('id_pinjaman',$id);
      $this->db->update( 'tb_pinjaman', $data );
    }else {
      $data = array('berkas' => $upload['file']['file_name']);
      $this->db->where('id_pinjaman',$id);
      $this->db->update( 'tb_pinjaman', $data );
    }
  }
  function download($id,$id2){
    if ($id2 == "8") {
      $query = $this->db->query("SELECT * from tb_pinjaman where id_pinjaman='".$id."'");
      return $query->row_array();
    }else {
      $query = $this->db->query("SELECT * from tb_berkas where norek='".$id."'");
      return $query->row_array();
    }
  }
  public function cek_berkas_sk($id){
    $query = $this->db->query("SELECT * from tb_pinjaman where norek='".$id."'");
    return $query->row_array();
  }
}
