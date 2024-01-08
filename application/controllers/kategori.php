<?php
class Kategori extends CI_Controller{
    public function keripik_kering() {
        $data['keripik_kering'] = $this->model_kategori->data_keripik_kering()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('keripik_kering',$data);
        $this->load->view('templates/footer');
    }
    public function lauk() {
        $data['lauk'] = $this->model_kategori->data_lauk()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('lauk',$data);
        $this->load->view('templates/footer');
    }
    public function kue() {
        $data['kue'] = $this->model_kategori->data_kue()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kue',$data);
        $this->load->view('templates/footer');
    }
}
?>