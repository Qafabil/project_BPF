<?php 
class Dashboard_admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        if($this->session->userdata('role_id') != '1'){
            $this->session->set_flashdata($this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Anda Belum Login!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>'));
                redirect('auth/login');
        }
    }
    public function index(){

        $this->load->view('tamplates_admin/header');
        $this->load->view('tamplates_admin/sidebar');
        $this->load->view('admin/vw_dashboard_admin');
        $this->load->view('tamplates_admin/footer');
    }
}
?>