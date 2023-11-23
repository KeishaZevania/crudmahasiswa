<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kompensasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kompensasi_model');
    }
    public function index()
    {
        $data['judul2'] = "Halaman Pengajuan Kompensasi";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kompensasi'] = $this->Kompensasi_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("kompensasi/vw_kompen", $data);
        $this->load->view("layout/footer", $data);
    }
    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Pengajuan KOMPENSASI";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kompensasi'] = $this->Kompensasi_model->get();
        $this->form_validation->set_rules('nama_mhs', 'Nama Mahasiswa', 'required', [
            'required' => 'Nama Mahasiswa Wajib di isi'
        ]);
        $this->form_validation->set_rules('judul_pelanggaran', 'judul Pelanggaran', 'required', [
            'required' => 'judul pelanggaran Wajib di isi'
        ]);
        $this->form_validation->set_rules('jml_kompen', 'Jumlah Kompen', 'required', [
            'required' => 'Jumlah Kompen Wajib di isi'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("layout/header", $data);
            $this->load->view("kompensasi/vw_tambah_kompen", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'nama_mhs' => $this->input->post('nama_mhs'),
                'judul_pelanggaran' => $this->input->post('judul_pelanggaran'),
                'jml_kompen' => $this->input->post('jml_kompen'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            $ext = pathinfo($upload_image, PATHINFO_EXTENSION);
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/kompensasi/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Kompensasi_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Pengajuan Berhasil Ditambah!</div>');
            redirect('kompensasi');
        }
    }
    public function hapus($id)
    {
        $this->Kompensasi_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon
            fas fa-info-circle"></i>Data Prodi tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i
            class="icon fas fa-check-circle"></i>Data Pengajuan TAK Berhasil Dihapus!</div>');
        }
        redirect('kompensasi');
    }
    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Pengajuan Kompensasi";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kompensasi'] = $this->Kompensasi_model->get();
        $data['kompensasi'] = $this->Kompensasi_model->getById($id);
        $this->form_validation->set_rules('nama_mhs', 'Nama Mahasiswa', 'required', [
            'required' => 'Nama Mahasiswa Wajib di isi'
        ]);
        $this->form_validation->set_rules('judul_pelanggaran', 'Judul Pelanggaran', 'required', [
            'required' => 'Judul Pelanggaran Wajib di isi'
        ]);
        $this->form_validation->set_rules('jml_kompen', 'Jumlah Kompen', 'required', [
            'required' => 'Jumlah Kompen Wajib di isi'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("layout/header", $data);
            $this->load->view("kompensasi/vw_ubah_kompen", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'nama_mhs' => $this->input->post('nama_mhs'),
                'judul_pelanggaran' => $this->input->post('judul_pelanggaran'),
                'jml_kompen' => $this->input->post('jml_kompen'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/kompensasi/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['prodi']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/kompensasi/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id');
            $this->Kompensasi_model->update(['id' => $id], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Pengajuan KOMPENSASI Berhasil Diubah!</div>');
            redirect('kompensasi');
        }
    }
}