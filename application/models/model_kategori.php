<?php
class Model_kategori extends CI_Model{
    public function data_keripik_kering(){
        return $this->db->get_where("tb_barang",array('kategori' => 'keripik_kering'));
    }
    public function data_lauk(){
        return $this->db->get_where("tb_barang",array('kategori' => 'lauk'));
    }
    public function data_kue(){
        return $this->db->get_where("tb_barang",array('kategori' => 'kue'));
    }
}
?>