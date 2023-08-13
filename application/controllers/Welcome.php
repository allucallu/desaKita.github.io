<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {
function __construct()
{
parent::__construct();
date_default_timezone_set('Asia/Jakarta');
$this->load->model('m_data');
$this->load->library('email');
}
public function index()
{
// 3 artikel terbaru
$data['artikel'] = $this->db->query("SELECT * FROM tb_artikel,tb_kategori WHERE kategori_artikel=id_kategori ORDER BY 
id_artikel DESC LIMIT 3")->result();
$data['kategori'] = $this->db->query("SELECT * FROM tb_kategori WHERE id_kategori")->result();

$data['aparat'] = $this->db->query("SELECT * FROM tb_aparat WHERE id_aparat")->result();
// data pengaturan website
$data['pengaturan'] = $this->m_data->get_data('tb_pengaturan')->row();

$this->load->model('m_data');
                    // hitung jumlah artikel
                    $data['jumlah_artikel'] = $this->m_data->get_data('tb_artikel')->num_rows();
                    // hitung jumlah kategori
                    $data['jumlah_penduduk'] = $this->m_data->get_data('tb_penduduk')->num_rows();
                    // hitung jumlah pengguna
                    $data['jumlah_aparat'] = $this->m_data->get_data('tb_aparat')->num_rows();
// SEO META
// $data['meta_keyword'] = $data['pengaturan']->nama;
// $data['meta_description'] = $data['pengaturan']->deskripsi;
$this->load->view('frontend/v_header',$data);
$this->load->view('frontend/v_homepage',$data);
$this->load->view('frontend/v_footer',$data);
}

            public function single($slug)
                {
                $data['artikel'] = $this->db->query("SELECT * FROM tb_artikel,tb_user,tb_kategori WHERE 
                author=id_user AND kategori_artikel=id_kategori AND 
                slug_artikel='$slug'")->result();
                $data['kategori'] = $this->db->query("SELECT * FROM tb_kategori WHERE id_kategori")->result();
                // data pengaturan website
                $data['pengaturan'] = $this->m_data->get_data('tb_pengaturan')->row();
                // SEO META
                if(count($data['artikel']) > 0){
                $data['meta_keyword'] = $data['artikel'][0]->judul;
                $data['meta_description'] = substr($data['artikel'][0]->konten, 0,100);
                }else{
                $data['meta_keyword'] = $data['pengaturan']->nama;
                // $data['meta_description'] = $data['pengaturan']->deskripsi;
                }
                $this->load->view('frontend/v_header',$data);
                $this->load->view('frontend/v_single',$data);
                $this->load->view('frontend/v_footer',$data);
            }

public function blog()
{
// data pengaturan website
$data['pengaturan'] = $this->m_data->get_data('tb_pengaturan')->row();
$data['kategori'] = $this->db->query("SELECT * FROM tb_kategori WHERE id_kategori")->result();
// SEO META
$data['meta_keyword'] = $data['pengaturan']->nama;
// $this->load->database();
$jumlah_data = $this->m_data->get_data('tb_artikel')->num_rows();
$this->load->library('pagination');
$config['base_url'] = base_url().'blog/';
$config['total_rows'] = $jumlah_data;
$config['per_page'] = 2;
$config['first_link'] = 'First';
$config['last_link'] = 'Last';
$config['next_link'] = 'Next';
$config['prev_link'] = 'Prev';
$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination 
justify-content-center">';
$config['full_tag_close'] = '</ul></nav></div>';
$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
$config['num_tag_close'] = '</span></li>';
$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
$config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
$config['prev_tagl_close'] = '</span>Next</li>';
$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
$config['first_tagl_close'] = '</span></li>';
$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
$config['last_tagl_close'] = '</span></li>';
$from = $this->uri->segment(2);
if($from==""){
$from = 0;
}
$this->pagination->initialize($config);
$data['artikel'] = $this->db->query("SELECT * FROM tb_artikel,tb_user,tb_kategori WHERE 
author=id_user AND kategori_artikel=id_kategori ORDER BY 
id_artikel DESC LIMIT $config[per_page] OFFSET $from")->result();
$this->load->view('frontend/v_header',$data);
$this->load->view('frontend/v_blog',$data);
$this->load->view('frontend/v_footer',$data);
}

public function profil()
{
$data['profil'] = $this->db->query("SELECT * FROM tb_profil WHERE id_profil")->result();

// data pengaturan website
$data['pengaturan'] = $this->m_data->get_data('tb_pengaturan')->row();
// SEO META

$this->load->view('frontend/v_header',$data);
$this->load->view('frontend/v_profil',$data);
$this->load->view('frontend/v_footer',$data);
}

public function visimisi()
{
$data['visimisi'] = $this->db->query("SELECT * FROM tb_visimisi WHERE id_visimisi")->result();
$data['profil'] = $this->db->query("SELECT * FROM tb_profil WHERE id_profil")->result();
// data pengaturan website
$data['pengaturan'] = $this->m_data->get_data('tb_pengaturan')->row();
// SEO META

$this->load->view('frontend/v_header',$data);
$this->load->view('frontend/v_visi_misi',$data);
$this->load->view('frontend/v_footer',$data);
}

public function foto()
{
$data['foto'] = $this->db->query("SELECT * FROM tb_foto WHERE id_foto")->result();
// data pengaturan website
$data['pengaturan'] = $this->m_data->get_data('tb_pengaturan')->row();
// SEO META

$this->load->view('frontend/v_header',$data);
$this->load->view('frontend/v_foto',$data);
$this->load->view('frontend/v_footer',$data);
}

public function kontak()
{
$data['kontak'] = $this->db->query("SELECT * FROM tb_pengaturan WHERE id_kontak")->result();
// data pengaturan website
$data['pengaturan'] = $this->m_data->get_data('tb_pengaturan')->row();
// SEO META

$this->load->view('frontend/v_header',$data);
$this->load->view('frontend/v_kontak',$data);
$this->load->view('frontend/v_footer',$data);
}

public function send_email() {
    $name = $this->input->post('name');
    $email = $this->input->post('email');
    $message = $this->input->post('message');

    $this->email->from($email, $name);
    $this->email->to('syahrulklk9@gmail.com'); // Ganti dengan alamat email penerima
    $this->email->subject('Pesan dari Form Kontak');
    $this->email->message($message);

    if ($this->email->send()) {
        echo "Pesan telah terkirim!";
    } else {
        echo "Gagal mengirim pesan.";
    }
}

}