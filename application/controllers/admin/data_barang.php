<?php
class Data_barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata($this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Anda Belum Login!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>'));
            redirect('auth/login');
        }
    }
    public function index()
    {

        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('tamplates_admin/header');
        $this->load->view('tamplates_admin/sidebar');
        $this->load->view('admin/vw_data_barang', $data);
        $this->load->view('tamplates_admin/footer');
    }

    public function tambah_aksi()
    {
        $nama_brg = $this->input->post('nama_brg');
        $keterangan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $upload_gambar = $_FILES['gambar']['name'];

        if ($upload_gambar) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar Gagal di Upload!";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        } else {
            $gambar = 'default_image.jpg'; // Atur default gambar jika tidak ada gambar yang diupload
        }

        $data = array(
            'nama_brg' => $nama_brg,
            'keterangan' => $keterangan,
            'kategori' => $kategori,
            'harga' => $harga,
            'stok' => $stok,
            'gambar' => $gambar
        );

        $this->model_barang->tambah_barang($data, 'tb_barang');
        redirect('admin/data_barang/index');
    }

    public function edit($id)
    {
        $where = array('id_brg' => $id);
        $data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->result();
        $this->load->view('tamplates_admin/header');
        $this->load->view('tamplates_admin/sidebar');
        $this->load->view('admin/vw_edit_barang', $data);
        $this->load->view('tamplates_admin/footer');
    }

    public function update()
    {
        $id = $this->input->post('id_brg');
        $nama_brg = $this->input->post('nama_brg');
        $keterangan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');

        $data = array(
            'nama_brg' => $nama_brg,
            'keterangan' => $keterangan,
            'kategori' => $kategori,
            'harga' => $harga,
            'stok' => $stok
        );

        $where = array(
            'id_brg' => $id
        );

        $this->model_barang->update_data($where, $data, 'tb_barang');
        redirect('admin/data_barang/index');
    }

    public function hapus($id)
    {
        $where = array('id_brg' => $id);
        $this->model_barang->hapus_data($where, 'tb_barang'); // Perbaikan pada parameter kedua
        redirect('admin/data_barang/index');
    }
}
?>