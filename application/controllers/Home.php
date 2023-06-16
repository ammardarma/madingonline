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

    public function article_detail() {
        if($this->session->userdata('id') != null){

            $data['id']= $this->session->userdata('id');
            $this->load->view('header', $data);
            $this->load->view('article/article_detail', $data);

        }else{

            $data['id'] = null;
            $this->load->view('header', $data);
            $this->load->view('article/article_home', $data);

        }
    }

}