<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }
    
    public function index()
    {
        if($this->session->userdata('id') != null){

            $data['id']= $this->session->userdata('id');
            $this->load->view('header', $data);
            $this->load->view('home/home', $data);

        }else{

            $data['id'] = null;
            $this->load->view('header', $data);
            $this->load->view('home/home', $data);

        }
    }

    public function login()
    {
        $input = $this->input->post();
        $email = $input['email'];
        $hashPassword = hash('sha512', $input['password']);

        $getUsers = $this->db->where('username', $email)
                    ->where('password', $hashPassword)
                    ->get('users')
                    ->result();
        if (empty($getUsers)){
            echo "true";

        }else{
            $this->session->set_userdata('id', $getUsers[0]->id);
           return redirect('/');
        }

    }

    public function logout()
    {
        session_destroy();
        return redirect('/');

    }

    public function article() {
            
            $data['article'] = $this->db->query("SELECT * FROM artikel")->result_array();
        if($this->session->userdata('id') != null){

            $data['id']= $this->session->userdata('id');
            $this->load->view('header', $data);
            $this->load->view('article/article_home', $data);

        }else{

            $data['id'] = null;
            $this->load->view('header', $data);
            $this->load->view('article/article_home', $data);

        }
    }

    public function article_detail($id) {
        $data['article'] = $this->db->query("SELECT * FROM artikel where id='$id'")->result_array();

        $data['komentar'] = $this->db->query("SELECT * FROM komentar where artikel_id='$id'")->result_array();
        
        if(empty($data['article'])){
            redirect('/');
        }else{

            if($this->session->userdata('id') != null){
                
                $data['id']= $this->session->userdata('id');
                $this->load->view('header', $data);
                $this->load->view('article/article_detail', $data);
                
            }else{
                
                $data['id'] = null;
                $this->load->view('header', $data);
                $this->load->view('article/article_detail', $data);
                
            }
        }
    }

    public function laporan() {
        if($this->session->userdata('id') != null){

            $data['id']= $this->session->userdata('id');
            $data['article']= $this->db->query("SELECT * FROM artikel")->result_array();
            $data['komentar']= $this->db->query("SELECT * FROM komentar")->result_array();
            $this->load->view('header', $data);
            $this->load->view('laporan/laporan_home', $data);

        }else{
            $data['id'] = null;
            $this->load->view('header', $data);
            $this->load->view('laporan/laporan_home', $data);

        }
    }

    public function inputArticle() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('judul', 'Judul', 'required|max_length[30]');
        $this->form_validation->set_rules('konten', 'Konten', 'required');
        $this->form_validation->set_rules('image', 'Image');

        if($this->form_validation->run() === TRUE) {
            $id= $this->session->userdata('id');
            $input = $this->input->post();
            $judul = $input['judul'];
            $konten = $input['konten'];
            $currentTime = date("Y-m-d H:i:s");

            $config['upload_path'] = 'upload/post';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '100000';
            $config['file_ext_tolower'] = true;
            
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('image')) {
                $filename = $this->upload->data('file_name');
                $this->db->query("INSERT INTO artikel(image, judul, content) VALUES('$filename','$judul', '$konten')");
                
            }else{
                $this->db->query("INSERT INTO artikel(judul, content) VALUES('$judul', '$konten')");
              
            }

            if($this->db->affected_rows() != 1){
                $this->session->set_flashdata('warning', "Tambah data artikel gagal!");
            }else{
                $this->session->set_flashdata('success', "Tambah data artikel berhasil!");

            }
            redirect('/home/article');
        
        }
    }

    public function hapusArticle($id) {
        $this->db->query("DELETE FROM artikel WHERE id='$id'");

        if($this->db->affected_rows() != 1){
            $this->session->set_flashdata('warning', "Hapus article gagal!");
        }else{
            $this->session->set_flashdata('success', "Hapus article berhasil!");

        }
        redirect('/home/article');
    }

    public function inputKomentar() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('komentar', 'Komentar', 'required');

        if($this->form_validation->run() === TRUE) {
            //$id= $this->session->userdata('id');
            $input = $this->input->post();
            $id = $input['id'];
            $nama = $input['nama'];
            $email = $input['email'];
            $komentar = $input['komentar'];
            $currentTime = date("Y-m-d H:i:s");

           
            $this->db->query("INSERT INTO komentar(artikel_id, nama, email, isi) VALUES('$id','$nama', '$email', '$komentar')");
                

            if($this->db->affected_rows() != 1){
                $this->session->set_flashdata('warning', "Tambah komentar artikel gagal!");
            }else{
                $this->session->set_flashdata('success', "Tambah komentar artikel berhasil!");

            }
            redirect('/home/article_detail/'.$id);
        
        }
    }

    public function hapusKomentar($id, $art_id){
        $this->db->query("DELETE FROM komentar WHERE id='$id'");

        if($this->db->affected_rows() != 1){
            $this->session->set_flashdata('warning', "Hapus komentar artikel gagal!");
        }else{
            $this->session->set_flashdata('success', "Hapus komentar artikel berhasil!");

        }
        redirect('/home/article_detail/'.$art_id);
    }

}