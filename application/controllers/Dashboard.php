<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
        class Dashboard extends CI_Controller {
            function __construct()
                {
                    parent::__construct();
                    date_default_timezone_set('Asia/Jakarta');
                    // cek session yang login, 
                    // jika session status tidak sama dengan session telah_login, berarti pengguna belum login
                    // maka halaman akan di alihkan kembali ke halaman login.
                        if($this->session->userdata('status')!="telah_login")
                            {redirect(base_url().'login?alert=belum_login');
                        }
                }
                            
                public function index()
                {
                    $this->load->model('m_data');
                    // hitung jumlah artikel
                    $data['jumlah_artikel'] = $this->m_data->get_data('tb_artikel')->num_rows();
                    // hitung jumlah kategori
                    $data['jumlah_penduduk'] = $this->m_data->get_data('tb_penduduk')->num_rows();
                    // hitung jumlah pengguna
                    $data['jumlah_aparat'] = $this->m_data->get_data('tb_aparat')->num_rows();
                    // hitung jumlah halaman
                    // $data['jumlah_halaman'] = $this->m_data->get_data('halaman')->num_rows();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_index', $data);
                    $this->load->view('dashboard/v_footer');
                }

                public function keluar()
                {
                    $this->session->sess_destroy();
                    redirect('login?alert=logout');
                }

                // profil
                public function profil()
                {
                    $data['profil'] = $this->db->query("SELECT * FROM tb_profil WHERE id_profil")->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_profil',$data);
                    $this->load->view('dashboard/v_footer');
                }

                // tambah profil
                public function tambah_profil()
                {
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_tambah_profil');
                    $this->load->view('dashboard/v_footer');
                }

                // aksi tambah profil
                public function aksi_profil()
                {
                    $this->load->model('m_data');
                    // Wajib isi judul,konten dan kategori
                    $this->form_validation->set_rules('profil','Profil','required');
                   
                    // Membuat gambar wajib di isi
                    if (empty($_FILES['foto']['name'])){
                        $this->form_validation->set_rules('foto','Foto','required');
                    }
                    if($this->form_validation->run() != false){
                    $config['upload_path'] = './gambar/website/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('foto')) {

                    // mengambil data tentang gambar
                    $gambar = $this->upload->data();
                    $nama = $this->input->post('profil');
                    $foto = $gambar['file_name'];
                    $data = array(
                    'profil' => $nama,
                    'foto' => $foto,
                    );
                    $this->m_data->insert_data($data,'tb_profil');
                    redirect(base_url().'dashboard/profil');
                    } else {
                    $this->form_validation->set_message('foto', $data['gambar_error'] = $this->upload->display_errors());
                    $data['aparat'] = $this->m_data->get_data('tb_profil')->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_tambah_profil',$data);
                    $this->load->view('dashboard/v_footer');
                    }
                    }else{
                    $data['kategori'] = $this->m_data->get_data('tb_profil')->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_tambah_profil',$data);
                    $this->load->view('dashboard/v_footer');
                    }
                }

                public function profil_edit($id)
                {
                    $this->load->model('m_data');
                    $where = array(
                    'id_profil' => $id
                    );
                    $data['profil'] = $this->m_data->edit_data($where,'tb_profil')->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_profil_edit',$data);
                    $this->load->view('dashboard/v_footer');
                }

                // edit profil
                public function profil_update()
                {
                    $this->load->model('m_data');
                $this->form_validation->set_rules('profil','Profil','required');
                if($this->form_validation->run() != false){
                    $id = $this->input->post('id');
                    $profil = $this->input->post('profil');
                    $where = array(
                    'id_profil' => $id
                    );
                    $data = array(
                    'profil' => $profil
                    );
                    $this->m_data->update_data($where, $data,'tb_profil');
                    redirect(base_url().'dashboard/profil');
                    }else{
                    $id = $this->input->post('id');
                    $where = array(
                    'id_profil' => $id
                    );
                    $data['profil'] = $this->m_data->edit_data($where,'tb_profil')->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_profil_edit',$data);
                    $this->load->view('dashboard/v_footer');
                    }
                }

                // hapus profil
                public function profil_hapus($id)
                {
                    $this->load->model('m_data');
                    $where = array(
                    'id_profil' => $id
                    );
                    $this->m_data->delete_data($where,'tb_profil');
                redirect(base_url().'dashboard/profil');
                }

                // aparat desa
                public function aparat()
                {
                    $data['aparat'] = $this->db->query("SELECT * FROM tb_aparat WHERE id_aparat")->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_aparat',$data);
                    $this->load->view('dashboard/v_footer');
                }

                // tambah aparat
                public function tambah_aparat()
                {
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_tambah_aparat');
                    $this->load->view('dashboard/v_footer');
                }

                // aksi tambah aparat
                public function aksi_tambah_aparat()
                {
                    $this->load->model('m_data');
                    // Wajib isi judul,konten dan kategori
                    $this->form_validation->set_rules('nama','Nama','required');
                    $this->form_validation->set_rules('jabatan','Jabatan','required');
                    
                    $this->form_validation->set_rules('kontak','Kontak','required');
                    // Membuat gambar wajib di isi
                    if (empty($_FILES['foto']['name'])){
                        $this->form_validation->set_rules('foto','Foto','required');
                    }
                    if($this->form_validation->run() != false){
                    $config['upload_path'] = './gambar/aparat/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('foto')) {

                    // mengambil data tentang gambar
                    $gambar = $this->upload->data();
                    $nama = $this->input->post('nama');
                    $jabatan = $this->input->post('jabatan');
                    $foto = $gambar['file_name'];
                    $kontak = $this->input->post('kontak');
                    $data = array(
                    'nama' => $nama,
                    'jabatan' => $jabatan,
                    'foto' => $foto,
                    'kontak' => $kontak,
                    );
                    $this->m_data->insert_data($data,'tb_aparat');
                    redirect(base_url().'dashboard/aparat');
                    } else {
                    $this->form_validation->set_message('foto', $data['gambar_error'] = $this->upload->display_errors());
                    $data['aparat'] = $this->m_data->get_data('tb_aparat')->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_tambah_aparat',$data);
                    $this->load->view('dashboard/v_footer');
                    }
                    }else{
                    $data['kategori'] = $this->m_data->get_data('tb_aparat')->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_tambah_aparat',$data);
                    $this->load->view('dashboard/v_footer');
                    }
                }

                // edit aparat
                public function aparat_edit($id)
                {
                    $this->load->model('m_data');
                    $where = array(
                    'id_aparat' => $id
                    );
                    $data['aparat'] = $this->m_data->edit_data($where,'tb_aparat')->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_aparat_edit',$data);
                    $this->load->view('dashboard/v_footer');
                }

                public function aparat_update()
                {
                    $this->load->model('m_data');
                    // Wajib isi judul,konten dan kategori
                    $this->form_validation->set_rules('nama','Nama','required');
                    $this->form_validation->set_rules('jabatan','Jabatan','required'); 
                    $this->form_validation->set_rules('kontak','Kontak','required');

                    if($this->form_validation->run() != false){

                    // mengambil data tentang gambar
                    $id = $this->input->post('id');
                    $nama = $this->input->post('nama');
                    $jabatan = $this->input->post('jabatan');
                    $foto = $gambar['file_name'];
                    $kontak = $this->input->post('kontak');
                    $where = array(
                        'id_aparat' => $id
                        );
                    $data = array(
                    'nama' => $nama,
                    'jabatan' => $jabatan,
                    'foto' => $foto,
                    'kontak' => $kontak,
                    );
                    $this->m_data->update_data($where,$data,'tb_aparat');

                    if (!empty($_FILES['foto']['name'])){
$config['upload_path'] = './gambar/aparat/';
$config['allowed_types'] = 'gif|jpg|png';
$this->load->library('upload', $config);
if ($this->upload->do_upload('foto')) {
// mengambil data tentang gambar
$gambar = $this->upload->data();
$data = array(
'foto' => $gambar['file_name'],
);
$this->m_data->update_data($where,$data,'tb_aparat');
redirect(base_url().'dashboard/aparat');
} else {
$this->form_validation->set_message('aparat', $data['gambar_error'] = $this->upload->display_errors());
$where = array(
    'id_aparat' => $id
    );
    $data['aparat'] = $this->m_data->edit_data($where,'artikel')->result();
    $this->load->view('dashboard/v_header');
    $this->load->view('dashboard/v_aparat_edit',$data);
    $this->load->view('dashboard/v_footer');
     }
    }else{
    redirect(base_url().'dashboard/aparat');
    }
                        }else{
                        $id = $this->input->post('id');
                        $where = array(
                        'id_aparat' => $id
                        );
                        $data['aparat'] = $this->m_data->edit_data($where,'tb_aparat')->result();
                        $this->load->view('dashboard/v_header');
                        $this->load->view('dashboard/v_aparat_edit',$data);
                        $this->load->view('dashboard/v_footer');
                        }
                        }

                        // hapus aparat
                        public function aparat_hapus($id)
                        {
                            $this->load->model('m_data');
                        $where = array(
                        'id_aparat' => $id
                        );
                        $this->m_data->delete_data($where,'tb_aparat');
                        redirect(base_url().'dashboard/aparat');
                        }

                        // visi & misi
                        public function visimisi()
                {
                    $data['visi'] = $this->db->query("SELECT * FROM tb_visimisi WHERE id_visimisi")->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_visimisi',$data);
                    $this->load->view('dashboard/v_footer');
                }

                // tambah visi misi
                public function tambah_visimisi()
                {
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_tambah_visimisi');
                    $this->load->view('dashboard/v_footer');
                }

                // aksi tambah visi misi
                public function aksi_visimisi()
                {
                    $this->load->model('m_data');

                    $this->form_validation->set_rules('visi','Visi','required');
                    $this->form_validation->set_rules('misi','Misi','required');
                        if($this->form_validation->run() != false){
                            $visi = $this->input->post('visi');
                            $misi = $this->input->post('misi');
                            $data = array(
                                'visi' => $visi,
                                'misi' => $misi
                             );
                            $this->m_data->insert_data($data,'tb_visimisi');
                                redirect(base_url().'dashboard/visimisi');
                        }else{
                            $this->load->view('dashboard/v_header');
                            $this->load->view('dashboard/v_tambah_visimisi');
                            $this->load->view('dashboard/v_footer');
                        }
                }

                // edit visi misi
                public function visimisi_edit($id)
                {
                    $this->load->model('m_data');
                    $where = array(
                    'id_visimisi' => $id
                    );
                    $data['visi'] = $this->m_data->edit_data($where,'tb_visimisi')->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_visimisi_edit',$data);
                    $this->load->view('dashboard/v_footer');
                }

                public function visimisi_update()
                {
                    $this->load->model('m_data');
                $this->form_validation->set_rules('visi','Visi','required');
                $this->form_validation->set_rules('misi','Misi','required');
                if($this->form_validation->run() != false){
                    $id = $this->input->post('id');
                    $visi = $this->input->post('visi');
                    $misi = $this->input->post('misi');
                    $where = array(
                    'id_visimisi' => $id
                    );
                    $data = array(
                    'visi' => $visi,
                    'misi' => $misi
                    );
                    $this->m_data->update_data($where, $data,'tb_visimisi');
                    redirect(base_url().'dashboard/visimisi');
                    }else{
                    $id = $this->input->post('id');
                    $where = array(
                    'id_visimisi' => $id
                    );
                    $data['visi'] = $this->m_data->edit_data($where,'tb_visimisi')->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_visimisi_edit',$data);
                    $this->load->view('dashboard/v_footer');
                    }
                }

                // hapus visi misi
                public function visimisi_hapus($id)
                        {
                            $this->load->model('m_data');
                        $where = array(
                        'id_visimisi' => $id
                        );
                        $this->m_data->delete_data($where,'tb_visimisi');
                        redirect(base_url().'dashboard/visimisi');
                        }

                // kategori
                public function kategori()
                {
                    $data['kategori'] = $this->db->query("SELECT * FROM tb_kategori WHERE id_kategori")->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_kategori',$data);
                    $this->load->view('dashboard/v_footer');
                }

                // tambah kategori
                public function tambah_kategori()
                {
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_tambah_kategori');
                    $this->load->view('dashboard/v_footer');
                }

                public function aksi_kategori()
                {
                    $this->load->model('m_data');

                    $this->form_validation->set_rules('kategori','Kategori','required');
                        if($this->form_validation->run() != false){
                            $kategori = $this->input->post('kategori');
                            $data = array(
                                'kategori' => $kategori,
                                'slug' => strtolower(url_title($kategori))
                             );
                            $this->m_data->insert_data($data,'tb_kategori');
                                redirect(base_url().'dashboard/kategori');
                        }else{
                            $this->load->view('dashboard/v_header');
                            $this->load->view('dashboard/v_tambah_kategori');
                            $this->load->view('dashboard/v_footer');
                        }
                }

                // edit kategori
                public function kategori_edit($id)
                {
                    $this->load->model('m_data');
                    $where = array(
                        'id_kategori' => $id
                        );
                        $data['kategori'] = $this->m_data->edit_data($where,'tb_kategori')->result();
                        $this->load->view('dashboard/v_header');
                        $this->load->view('dashboard/v_kategori_edit',$data);
                        $this->load->view('dashboard/v_footer');
                }

                public function kategori_update()
                {
                    $this->load->model('m_data');
                    $this->form_validation->set_rules('kategori','Kategori','required');
                    if($this->form_validation->run() != false){
                        $id = $this->input->post('id');
                        $kategori = $this->input->post('kategori');
                        $where = array(
                        'id_kategori' => $id
                        );
                        $data = array(
                        'kategori' => $kategori,
                        'slug' => strtolower(url_title($kategori))
                        );
                        $this->m_data->update_data($where, $data,'tb_kategori');
                        redirect(base_url().'dashboard/kategori');
                        }else{
                        $id = $this->input->post('id');
                        $where = array(
                        'id_kategori' => $id
                        );
                        $data['kategori'] = $this->m_data->edit_data($where,'tb_kategori')->result();
                        $this->load->view('dashboard/v_header');
                        $this->load->view('dashboard/v_kategori_edit',$data);
                        $this->load->view('dashboard/v_footer');
                        }
                }

                // hapus kategori
                public function kategori_hapus($id)
                        {
                            $this->load->model('m_data');
                        $where = array(
                        'id_kategori' => $id
                        );
                        $this->m_data->delete_data($where,'tb_kategori');
                        redirect(base_url().'dashboard/kategori');
                        }

                // artikel
                public function artikel()
                {
                    $data['artikel'] = $this->db->query("SELECT * FROM tb_artikel,tb_kategori,tb_user WHERE 
                    kategori_artikel=id_kategori and author=id_user order by id_artikel desc")->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_artikel',$data);
                    $this->load->view('dashboard/v_footer');
                }

                // tambah artikel
                public function tambah_artikel()
                {
                    $this->load->model('m_data');
                    $data['kategori'] = $this->m_data->get_data('tb_kategori')->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_artikel_tambah',$data);
                    $this->load->view('dashboard/v_footer');
                }

                public function aksi_artikel()
                {
                    $this->load->model('m_data');
                    // Wajib isi judul,konten dan kategori
                    $this->form_validation->set_rules('judul','Judul','required|is_unique[tb_artikel.judul]');
                    $this->form_validation->set_rules('konten','Konten','required');
                    $this->form_validation->set_rules('kategori','Kategori','required');
                    // Membuat gambar wajib di isi
                    if (empty($_FILES['sampul']['name'])){
                    $this->form_validation->set_rules('sampul', 'Gambar Sampul', 'required');
                    }
                    if($this->form_validation->run() != false){
                    $config['upload_path'] = './gambar/artikel/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('sampul')) {
                    // mengambil data tentang gambar
                    $gambar = $this->upload->data();
                    $tanggal = date('Y-m-d H:i:s');
                    $judul = $this->input->post('judul');
                    $slug = strtolower(url_title($judul));
                    $konten = $this->input->post('konten');
                    $sampul = $gambar['file_name'];
                    $author = $this->session->userdata('id');
                    $kategori = $this->input->post('kategori');
                    $status = $this->input->post('status');
                    $data = array(
                    'tanggal' => $tanggal,
                    'judul' => $judul,
                    'slug_artikel' => $slug,
                    'konten' => $konten,
                    'sampul' => $sampul,
                    'author' => $author,
                    'kategori_artikel' => $kategori,
                    'status' => $status,
                    );
                    $this->m_data->insert_data($data,'tb_artikel');
                    redirect(base_url().'dashboard/artikel');
                    } else {
                    $this->form_validation->set_message('sampul', $data['gambar_error'] = $this->upload->display_errors());
                    $data['kategori'] = $this->m_data->get_data('tb_kategori')->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_artikel_tambah',$data);
                    $this->load->view('dashboard/v_footer');
                    }
                    }else{
                    $data['kategori'] = $this->m_data->get_data('tb_kategori')->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_artikel_tambah',$data);
                    $this->load->view('dashboard/v_footer');
                    }
                }

                // edit artikel
                public function artikel_edit($id)
                {
                    $this->load->model('m_data');
                    $where = array(
                    'id_artikel' => $id
                    );
                    $data['artikel'] = $this->m_data->edit_data($where,'tb_artikel')->result();
                    $data['kategori'] = $this->m_data->get_data('tb_kategori')->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_artikel_edit',$data);
                    $this->load->view('dashboard/v_footer');
                }

                public function update_artikel()
                {
                    $this->load->model('m_data');
                    // Wajib isi judul,konten dan kategor
                    $this->form_validation->set_rules('judul','Judul','required');
                    $this->form_validation->set_rules('konten','Konten','required');
                    $this->form_validation->set_rules('kategori','Kategori','required');
                    if($this->form_validation->run() != false){
                    $id = $this->input->post('id');
                    $judul = $this->input->post('judul');
                    $slug = strtolower(url_title($judul));
                    $konten = $this->input->post('konten');
                    $kategori = $this->input->post('kategori');
                    $status = $this->input->post('status');
                    $where = array(
                    'id_artikel' => $id
                    );
                    $data = array(
                    'judul' => $judul,
                    'slug_artikel' => $slug,
                    'konten' => $konten,
                    'kategori_artikel' => $kategori,
                    'status' => $status,
                    );
                    $this->m_data->update_data($where,$data,'tb_artikel');
                    if (!empty($_FILES['sampul']['name'])){
                    $config['upload_path'] = './gambar/artikel/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('sampul')) {
                    // mengambil data tentang gambar
                    $gambar = $this->upload->data();
                    $data = array(
                    'sampul' => $gambar['file_name'],
                    );
                    $this->m_data->update_data($where,$data,'tb_artikel');
                    redirect(base_url().'dashboard/artikel');
                    } else {
                    $this->form_validation->set_message('sampul', 
                    $data['gambar_error'] = $this->upload->display_errors());
                    $where = array(
                        'artikel_id' => $id
                    );
                    $data['artikel'] = $this->m_data->edit_data($where,'tb_artikel')->result();
                    $data['kategori'] = $this->m_data->get_data('tb_kategori')->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_artikel_edit',$data);
                    $this->load->view('dashboard/v_footer');
                    }
                    }else{
                    redirect(base_url().'dashboard/artikel');
                    }
                    }else{
                    $id = $this->input->post('id');
                    $where = array(
                    'id_artikel' => $id
                    );
                    $data['artikel'] = $this->m_data->edit_data($where,'tb_artikel')->result();
                    $data['kategori'] = $this->m_data->get_data('tb_kategori')->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_artikel_edit',$data);
                    $this->load->view('dashboard/v_footer');
                    }
                    }

                    // hapus artikel
                    public function artikel_hapus($id)
                        {
                            $this->load->model('m_data');
                        $where = array(
                        'id_artikel' => $id
                        );
                        $this->m_data->delete_data($where,'tb_artikel');
                        redirect(base_url().'dashboard/artikel');
                        }

                    // foto
                    public function foto()
                {
                    $data['foto'] = $this->db->query("SELECT * FROM tb_foto WHERE id_foto")->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_foto',$data);
                    $this->load->view('dashboard/v_footer');
                }

                // tambah foto
                public function tambah_foto()
                {
                    $this->load->model('m_data');
                    $data['foto'] = $this->m_data->get_data('tb_foto')->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_foto_tambah',$data);
                    $this->load->view('dashboard/v_footer');
                }

                public function aksi_foto()
                {
                    $this->load->model('m_data');
                    // Wajib isi judul,konten dan kategori
                    $this->form_validation->set_rules('deskripsi','Deskripsi','required');
                    // Membuat gambar wajib di isi
                    if (empty($_FILES['foto']['name'])){
                    $this->form_validation->set_rules('foto', 'Foto', 'required');
                    }
                    if($this->form_validation->run() != false){
                    $config['upload_path'] = './gambar/foto/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('foto')) {
                    // mengambil data tentang gambar
                    $gambar = $this->upload->data();
                    $tanggal = date('Y-m-d H:i:s');
                    $deskripsi = $this->input->post('deskripsi');
                    
                    $foto = $gambar['file_name'];
                    $data = array(
                    'tanggal' => $tanggal,
                    'deskripsi' => $deskripsi,
                    'foto' => $foto,
                    );
                    $this->m_data->insert_data($data,'tb_foto');
                    redirect(base_url().'dashboard/foto');
                    } else {
                    $this->form_validation->set_message('foto', $data['gambar_error'] = $this->upload->display_errors());
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_foto_tambah',$data);
                    $this->load->view('dashboard/v_footer');
                    }
                    }else{
                   
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_artikel_tambah');
                    $this->load->view('dashboard/v_footer');
                    }
                }

                // foto edit
                public function foto_edit($id)
                {
                    $this->load->model('m_data');
                    $where = array(
                    'id_foto' => $id
                    );
                    $data['foto'] = $this->m_data->edit_data($where,'tb_foto')->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_foto_edit',$data);
                    $this->load->view('dashboard/v_footer');
                }

                public function update_foto()
                {
                    $this->load->model('m_data');
                    // Wajib isi judul,konten dan kategor
                    $this->form_validation->set_rules('deskripsi','Deskripsi','required');
                    if($this->form_validation->run() != false){
                    $id = $this->input->post('id');
                    $deskripsi = $this->input->post('deskripsi');
                    
                    $where = array(
                    'id_foto' => $id
                    );
                    $data = array(
                    'deskripsi' => $deskripsi,
                    
                    );
                    $this->m_data->update_data($where,$data,'tb_foto');
                    if (!empty($_FILES['foto']['name'])){
                    $config['upload_path'] = './gambar/foto/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('foto')) {
                    // mengambil data tentang gambar
                    $gambar = $this->upload->data();
                    $data = array(
                    'foto' => $gambar['file_name'],
                    );
                    $this->m_data->update_data($where,$data,'tb_foto');
                    redirect(base_url().'dashboard/foto');
                    } else {
                    $this->form_validation->set_message('foto', 
                    $data['gambar_error'] = $this->upload->display_errors());
                    $where = array(
                        'foto_id' => $id
                    );
                    $data['foto'] = $this->m_data->edit_data($where,'tb_foto')->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_foto_edit',$data);
                    $this->load->view('dashboard/v_footer');
                    }
                    }else{
                    redirect(base_url().'dashboard/foto');
                    }
                    }else{
                    $id = $this->input->post('id');
                    $where = array(
                    'id_foto' => $id
                    );
                    $data['foto'] = $this->m_data->edit_data($where,'tb_foto')->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_foto_edit',$data);
                    $this->load->view('dashboard/v_footer');
                    }
                    }

                    // hapus foto
                    public function foto_hapus($id)
                    {
                        $this->load->model('m_data');
                    $where = array(
                    'id_foto' => $id
                    );
                    $this->m_data->delete_data($where,'tb_foto');
                    redirect(base_url().'dashboard/foto');
                    }

                    // pengaturan
                    public function pengaturan()
                    {
                        $this->load->model('m_data');
                        $data['pengaturan'] = $this->m_data->get_data('tb_pengaturan')->result();
                        $this->load->view('dashboard/v_header');
                        $this->load->view('dashboard/v_pengaturan',$data);
                        $this->load->view('dashboard/v_footer');
                    }

                    public function pengaturan_update()
{
    $this->load->model('m_data');
// Wajib isi nama dan deskripsi website
$this->form_validation->set_rules('nama','Nama Website','required');
if($this->form_validation->run() != false){
$nama = $this->input->post('nama');
$link_facebook = $this->input->post('fb');
$link_instagram = $this->input->post('ig');
$wa = $this->input->post('wa');
$where = array(
);
$data = array(
'nama' => $nama,
'link_fb' => $link_facebook,
'link_ig' => $link_instagram,
'wa' => $wa
);
// update pengaturan
$this->m_data->update_data($where,$data,'tb_pengaturan');
// Periksa apakah ada gambar logo yang diupload
if (!empty($_FILES['logo']['name'])){
$config['upload_path'] = './gambar/website/';
$config['allowed_types'] = 'jpg|png';
$this->load->library('upload', $config);
if ($this->upload->do_upload('logo')) {
    // mengambil data tentang gambar logo yang diupload
    $gambar = $this->upload->data();
    $logo = $gambar['file_name'];
    $this->db->query("UPDATE tb_pengaturan SET logo='$logo'");
    }
    }
    redirect(base_url().'dashboard/pengaturan/?alert=sukses');
    }else{
    $data['pengaturan'] = $this->m_data->get_data('tb_pengaturan')->result();
    $this->load->view('dashboard/v_header');
    $this->load->view('dashboard/v_pengaturan',$data);
    $this->load->view('dashboard/v_footer');
    }
    }

    // bpd
    public function bpd()
    {
       $this->load->model('m_data');
       $data['bpd'] = $this->db->query("SELECT * FROM tb_bpd WHERE id_bpd")->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_bpd',$data);
        $this->load->view('dashboard/v_footer');

    }

      // tambah bpd
      public function tambah_bpd()
      {
          $this->load->view('dashboard/v_header');
          $this->load->view('dashboard/v_tambah_bpd');
          $this->load->view('dashboard/v_footer');
      }

      // aksi tambah bpd
      public function aksi_tambah_bpd()
      {
          $this->load->model('m_data');
          // Wajib isi judul,konten dan kategori
          $this->form_validation->set_rules('nama','Nama','required');
          $this->form_validation->set_rules('gender','Gender', 'required');
          $this->form_validation->set_rules('jabatan','Jabatan','required');
          $this->form_validation->set_rules('kontak','Kontak','required');
          if($this->form_validation->run() != false){
              $nama = $this->input->post('nama');
              $gender = $this->input->post('gender');
              $jabatan = $this->input->post('jabatan');
              $kontak = $this->input->post('kontak');
              $data = array(
                  'nama' => $nama,
                  'gender' => $gender,
                  'jabatan' => $jabatan,
                  'kontak' => $kontak
               );
              $this->m_data->insert_data($data,'tb_bpd');
                  redirect(base_url().'dashboard/bpd');
          }else{
              $this->load->view('dashboard/v_header');
              $this->load->view('dashboard/v_tambah_bpd');
              $this->load->view('dashboard/v_footer');
          }
  }

  public function bpd_edit($id)
   {
       $this->load->model('m_data');
       $where = array(
       'id_bpd' => $id
       );
       $data['bpd'] = $this->m_data->edit_data($where,'tb_bpd')->result();
       $this->load->view('dashboard/v_header');
       $this->load->view('dashboard/v_bpd_edit',$data);
       $this->load->view('dashboard/v_footer');
   }

   // edit bpd
   public function bpd_update()
   {
       $this->load->model('m_data');
   $this->form_validation->set_rules('nama','Nama','required');
   $this->form_validation->set_rules('gender','Gender','required');
   $this->form_validation->set_rules('jabatan','Jabatan','required');
   $this->form_validation->set_rules('kontak','kontak','required');
   if($this->form_validation->run() != false){
       $id = $this->input->post('id');
       $nama = $this->input->post('nama');
       $gender = $this->input->post('gender');
       $jabatan = $this->input->post('jabatan');
       $kontak = $this->input->post('kontak');
       $where = array(
       'id_bpd' => $id
       );
       $data = array(
       'nama' => $nama,
       'gender' => $gender,
       'jabatan' => $jabatan,
       'kontak' => $kontak
       );
       $this->m_data->update_data($where, $data,'tb_bpd');
       redirect(base_url().'dashboard/bpd');
       }else{
       $id = $this->input->post('id');
       $where = array(
       'id_bpd' => $id
       );
       $data['bpd'] = $this->m_data->edit_data($where,'tb_bpd')->result();
       $this->load->view('dashboard/v_header');
       $this->load->view('dashboard/v_bpd_edit',$data);
       $this->load->view('dashboard/v_footer');
       }
   }

   // hapus bpd
   public function bpd_hapus($id)
   {
       $this->load->model('m_data');
   $where = array(
   'id_bpd' => $id
   );
   $this->m_data->delete_data($where,'tb_bpd');
   redirect(base_url().'dashboard/bpd');
   }

   // seksi karang taruna
   public function seksi_karangtaruna()
   {
       $data['seksi'] = $this->db->query("SELECT * FROM tb_seksi WHERE id_seksi")->result();
       $this->load->view('dashboard/v_header');
       $this->load->view('dashboard/v_seksi',$data);
       $this->load->view('dashboard/v_footer');
   }

   // tambah seksi_karangtaruna
  public function tambah_seksi()
  {
      $this->load->view('dashboard/v_header');
      $this->load->view('dashboard/v_tambah_seksi');
      $this->load->view('dashboard/v_footer');
  }

  // aksi tambah seksi
  public function aksi_tambah_seksi()
  {
      $this->load->model('m_data');
      // Wajib isi judul,konten dan kategori
      $this->form_validation->set_rules('bidang','Bidang','required');
      if($this->form_validation->run() != false){
          $bidang = $this->input->post('bidang');
          $data = array(
              'bidang' => $bidang,
              
           );
          $this->m_data->insert_data($data,'tb_seksi');
              redirect(base_url().'dashboard/seksi_karangtaruna');
      }else{
          $this->load->view('dashboard/v_header');
          $this->load->view('dashboard/v_tambah_seksi');
          $this->load->view('dashboard/v_footer');
      }
}

public function seksi_edit($id)
 {
     $this->load->model('m_data');
     $where = array(
     'id_seksi' => $id
     );
     $data['seksi'] = $this->m_data->edit_data($where,'tb_seksi')->result();
     $this->load->view('dashboard/v_header');
     $this->load->view('dashboard/v_seksi_edit',$data);
     $this->load->view('dashboard/v_footer');
 }

 // edit seksi
 public function seksi_update()
 {
     $this->load->model('m_data');
 $this->form_validation->set_rules('bidang','Bidang','required');
 if($this->form_validation->run() != false){
     $id = $this->input->post('id');
     $bidang = $this->input->post('bidang');
     $where = array(
     'id_seksi' => $id
     );
     $data = array(
     'bidang' => $bidang,
     
     );
     $this->m_data->update_data($where, $data,'tb_seksi');
     redirect(base_url().'dashboard/seksi_karangtaruna');
     }else{
     $id = $this->input->post('id');
     $where = array(
     'id_seksi' => $id
     );
     $data['seksi'] = $this->m_data->edit_data($where,'tb_seksi')->result();
     $this->load->view('dashboard/v_header');
     $this->load->view('dashboard/v_seksi_edit',$data);
     $this->load->view('dashboard/v_footer');
     }
 }

  // hapus seksi
  public function seksi_hapus($id)
  {
      $this->load->model('m_data');
  $where = array(
  'id_seksi' => $id
  );
  $this->m_data->delete_data($where,'tb_seksi');
  redirect(base_url().'dashboard/seksi_karangtaruna');
  }

  // karang taruna
  public function karangtaruna()
  {
     $this->load->model('m_data');
     $data['karangtaruna'] = $this->db->query("SELECT * FROM tb_karangtaruna WHERE id_karangtaruna")->result();
 $data['seksi'] = $this->m_data->get_data('tb_seksi')->result();
      $this->load->view('dashboard/v_header');
      $this->load->view('dashboard/v_karangtaruna',$data);
      $this->load->view('dashboard/v_footer');
  }

  // tambah karangtaruna
  public function tambah_karangtaruna()
  {
     $this->load->model('m_data');
     $data['seksi'] = $this->m_data->get_data('tb_seksi')->result();
      $this->load->view('dashboard/v_header');
      $this->load->view('dashboard/v_tambah_karangtaruna', $data);
      $this->load->view('dashboard/v_footer');
  }

  // aksi tambah karangtaruna
  public function aksi_tambah_karangtaruna()
  {
      $this->load->model('m_data');
      // Wajib isi judul,konten dan kategori
      $this->form_validation->set_rules('nama','Nama','required');
      $this->form_validation->set_rules('jabatan','Jabatan','required');
      $this->form_validation->set_rules('kontak','Kontak','required');
      if($this->form_validation->run() != false){
          $nama = $this->input->post('nama');
          $jabatan = $this->input->post('jabatan');
          $kontak = $this->input->post('kontak');
          $data = array(
              'nama' => $nama,
              'jabatan' => $jabatan,
              'kontak' => $kontak
           );
          $this->m_data->insert_data($data,'tb_karangtaruna');
              redirect(base_url().'dashboard/karangtaruna');
      }else{
          $this->load->view('dashboard/v_header');
          $this->load->view('dashboard/v_tambah_karangtaruna');
          $this->load->view('dashboard/v_footer');
      }
  }

  public function karangtaruna_edit($id)
  {

      $this->load->model('m_data');
      $where = array(
          'id_karangtaruna' => $id
         );
         $data['karangtaruna'] = $this->m_data->edit_data($where,'tb_karangtaruna')->result();
         $data['seksi'] = $this->m_data->get_data('tb_seksi')->result();
      $this->load->view('dashboard/v_header');
      $this->load->view('dashboard/v_karangtaruna_edit',$data);
      $this->load->view('dashboard/v_footer');
  }

  // edit karangtaruna
  public function karangtaruna_update()
  {
      $this->load->model('m_data');
  $this->form_validation->set_rules('nama','Nama','required');
  $this->form_validation->set_rules('jabatan','Jabatan','required');
  $this->form_validation->set_rules('kontak','kontak','required');
  if($this->form_validation->run() != false){
      $id = $this->input->post('id');
      $nama = $this->input->post('nama');
      $jabatan = $this->input->post('jabatan');
      $kontak = $this->input->post('kontak');
      $where = array(
      'id_karangtaruna' => $id
      );
      $data = array(
      'nama' => $nama,
      'jabatan' => $jabatan,
      'kontak' => $kontak
      );
      $this->m_data->update_data($where, $data,'tb_karangtaruna');
      redirect(base_url().'dashboard/karangtaruna');
      }else{
      $id = $this->input->post('id');
      $where = array(
      'id_karangtaruna' => $id
      );
      $data['karangtaruna'] = $this->m_data->edit_data($where,'tb_karangtaruna')->result();
      $this->load->view('dashboard/v_header');
      $this->load->view('dashboard/v_karangtaruna_edit',$data);
      $this->load->view('dashboard/v_footer');
      }
  }

   // hapus karangtaruna
 public function karangtaruna_hapus($id)
 {
     $this->load->model('m_data');
 $where = array(
 'id_karangtaruna' => $id
 );
 $this->m_data->delete_data($where,'tb_karangtaruna');
 redirect(base_url().'dashboard/karangtaruna');
 }

 // data pkk
 public function pkk()
 {
     $data['pkk'] = $this->db->query("SELECT * FROM tb_pkk WHERE id_pkk")->result();
     $this->load->view('dashboard/v_header');
     $this->load->view('dashboard/v_pkk',$data);
     $this->load->view('dashboard/v_footer');
 }

  // tambah pkk
  public function tambah_pkk()
  {
      $this->load->view('dashboard/v_header');
      $this->load->view('dashboard/v_tambah_pkk');
      $this->load->view('dashboard/v_footer');
  }

  // aksi tambah pkk
  public function aksi_tambah_pkk()
  {
      $this->load->model('m_data');
      // Wajib isi judul,konten dan kategori
      $this->form_validation->set_rules('nama','Nama','required');
      $this->form_validation->set_rules('gender','Gender','required');
      $this->form_validation->set_rules('jabatan','Jabatan','required');
      $this->form_validation->set_rules('kontak','Kontak','required');
      if($this->form_validation->run() != false){
          $nama = $this->input->post('nama');
          $gender = $this->input->post('gender');
          $jabatan = $this->input->post('jabatan');
          $kontak = $this->input->post('kontak');
          $data = array(
              'nama' => $nama,
              'gender' => $gender,
              'jabatan' => $jabatan,
              'kontak' => $kontak
           );
          $this->m_data->insert_data($data,'tb_pkk');
              redirect(base_url().'dashboard/pkk');
      }else{
          $this->load->view('dashboard/v_header');
          $this->load->view('dashboard/v_tambah_pkk');
          $this->load->view('dashboard/v_footer');
      }
}

public function pkk_edit($id)
{
   $this->load->model('m_data');
   $where = array(
   'id_pkk' => $id
   );
   $data['pkk'] = $this->m_data->edit_data($where,'tb_pkk')->result();
   $this->load->view('dashboard/v_header');
   $this->load->view('dashboard/v_pkk_edit',$data);
   $this->load->view('dashboard/v_footer');
}

// edit pkk
public function pkk_update()
{
   $this->load->model('m_data');
$this->form_validation->set_rules('nama','Nama','required');
$this->form_validation->set_rules('gender','Gender','required');
$this->form_validation->set_rules('jabatan','Jabatan','required');
$this->form_validation->set_rules('kontak','kontak','required');
if($this->form_validation->run() != false){
   $id = $this->input->post('id');
   $nama = $this->input->post('nama');
   $gender = $this->input->post('gender');
   $jabatan = $this->input->post('jabatan');
   $kontak = $this->input->post('kontak');
   $where = array(
   'id_pkk' => $id
   );
   $data = array(
   'nama' => $nama,
   'gender' => $gender,
   'jabatan' => $jabatan,
   'kontak' => $kontak
   );
   $this->m_data->update_data($where, $data,'tb_pkk');
   redirect(base_url().'dashboard/pkk');
   }else{
   $id = $this->input->post('id');
   $where = array(
   'id_pkk' => $id
   );
   $data['pkk'] = $this->m_data->edit_data($where,'tb_pkk')->result();
   $this->load->view('dashboard/v_header');
   $this->load->view('dashboard/v_pkk_edit',$data);
   $this->load->view('dashboard/v_footer');
   }
}

// hapus pkk
public function pkk_hapus($id)
{
   $this->load->model('m_data');
$where = array(
'id_pkk' => $id
);
$this->m_data->delete_data($where,'tb_pkk');
redirect(base_url().'dashboard/pkk');
}

 // data penduduk
 public function penduduk()
 {
     $data['penduduk'] = $this->db->query("SELECT * FROM tb_penduduk WHERE id_penduduk")->result();
     $this->load->view('dashboard/v_header');
     $this->load->view('dashboard/v_penduduk',$data);
     $this->load->view('dashboard/v_footer');
 }

 // tambah penduduk
 public function tambah_penduduk()
 {
     $this->load->view('dashboard/v_header');
     $this->load->view('dashboard/v_tambah_penduduk');
     $this->load->view('dashboard/v_footer');
 }

 // aksi tambah penduduk
 public function aksi_tambah_penduduk()
 {
     $this->load->model('m_data');
     // Wajib isi judul,konten dan kategori
     $this->form_validation->set_rules('nama','Nama','required');
     $this->form_validation->set_rules('nik','Nik','required');
     $this->form_validation->set_rules('gender','Gender','required');
     $this->form_validation->set_rules('dusun','Dusun','required');
     $this->form_validation->set_rules('status','Status','required');
     $this->form_validation->set_rules('pendidikan','Pendidikan','required');
     $this->form_validation->set_rules('pekerjaan','Pekerjaan','required');
     $this->form_validation->set_rules('agama','Agama','required');
     $this->form_validation->set_rules('kontak','Kontak','required');
     if($this->form_validation->run() != false){
         $nama = $this->input->post('nama');
         $nik = $this->input->post('nik');
         $gender = $this->input->post('gender');
         $dusun = $this->input->post('dusun');
         $status = $this->input->post('status');
         $pendidikan = $this->input->post('pendidikan');
         $pekerjaan = $this->input->post('pekerjaan');
         $agama = $this->input->post('agama');
         $kontak = $this->input->post('kontak');
         $data = array(
             'nama' => $nama,
             'nik' => $nik,
             'gender' => $gender,
             'dusun' => $dusun,
             'status' => $status,
             'pendidikan' => $pendidikan,
             'pekerjaan' => $pekerjaan,
             'agama' => $agama,
             'kontak' => $kontak
          );
         $this->m_data->insert_data($data,'tb_penduduk');
             redirect(base_url().'dashboard/penduduk');
     }else{
         $this->load->view('dashboard/v_header');
         $this->load->view('dashboard/v_tambah_penduduk');
         $this->load->view('dashboard/v_footer');
     }
}
public function penduduk_edit($id)
{
 $this->load->model('m_data');
 $where = array(
 'id_penduduk' => $id
 );
 $data['penduduk'] = $this->m_data->edit_data($where,'tb_penduduk')->result();
 $this->load->view('dashboard/v_header');
 $this->load->view('dashboard/v_penduduk_edit',$data);
 $this->load->view('dashboard/v_footer');
}

// edit penduduk
public function penduduk_update()
{
 $this->load->model('m_data');
 $this->form_validation->set_rules('nama','Nama','required');
 $this->form_validation->set_rules('nik','Nik','required');
 $this->form_validation->set_rules('gender','Gender','required');
 $this->form_validation->set_rules('dusun','Dusun','required');
 $this->form_validation->set_rules('status','Status','required');
 $this->form_validation->set_rules('pendidikan','Pendidikan','required');
 $this->form_validation->set_rules('pekerjaan','Pekerjaan','required');
 $this->form_validation->set_rules('agama','Agama','required');
 $this->form_validation->set_rules('kontak','Kontak','required');
if($this->form_validation->run() != false){
 $id = $this->input->post('id');
 $nama = $this->input->post('nama');
 $nik = $this->input->post('nik');
 $gender = $this->input->post('gender');
 $dusun = $this->input->post('dusun');
 $status = $this->input->post('status');
 $pendidikan = $this->input->post('pendidikan');
 $pekerjaan = $this->input->post('pekerjaan');
 $agama = $this->input->post('agama');
 $kontak = $this->input->post('kontak');
 $where = array(
 'id_penduduk' => $id
 );
 $data = array(
     'nama' => $nama,
     'nik' => $nik,
     'gender' => $gender,
     'dusun' => $dusun,
     'status' => $status,
     'pendidikan' => $pendidikan,
     'pekerjaan' => $pekerjaan,
     'agama' => $agama,
     'kontak' => $kontak
 );
 $this->m_data->update_data($where, $data,'tb_penduduk');
 redirect(base_url().'dashboard/penduduk');
 }else{
 $id = $this->input->post('id');
 $where = array(
 'id_penduduk' => $id
 );
 $data['penduduk'] = $this->m_data->edit_data($where,'tb_penduduk')->result();
 $this->load->view('dashboard/v_header');
 $this->load->view('dashboard/v_penduduk_edit',$data);
 $this->load->view('dashboard/v_footer');
 }
}

// hapus penduduk
public function penduduk_hapus($id)
{
  $this->load->model('m_data');
$where = array(
'id_penduduk' => $id
);
$this->m_data->delete_data($where,'tb_penduduk');
redirect(base_url().'dashboard/penduduk');
}
               
}
           
