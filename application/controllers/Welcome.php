<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_welcome', 'model');
        $this->load->helper('url');
        $this->load->library('session');
    }
    
    public function index($id=False)
    {
        if ($id===FALSE) {
			$data['home_post'] = $this->model->read();
			$this->load->view('header');
			$this->load->view('home', $data);
			$this->load->view('footer');
		} else {
			$data['post'] = $this->model->read($id);
			$this->load->view('header');
			$this->load->view('post', $data);
			$this->load->view('footer');
		}
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required|max_length[30]');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('header');
            $this->load->view('create');
            $this->load->view('footer');
        } else {
            $id = uniqid('item', true);

            $config['upload_path'] = 'upload/post';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '100000';
            $config['file_ext_tolower'] = true;
            $config['file_name'] = str_replace('.', '_', $id);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image1')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                echo $this->upload->display_errors();
                // redirect('welcome/create');
            } else {
                $filename = $this->upload->data('file_name');
                $this->model->create($id, $filename);
                redirect();
            }
        }
    }

	public function update($id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required|max_length[30]');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('image', 'Image');

        if ($this->form_validation->run() === FALSE) {
            $data['post'] = $this->model->read($id);
            $this->load->view('header');
            $this->load->view('update',$data);
            $this->load->view('footer');
        } else {

           
                $post = $this->model->read($id);

            $config['upload_path'] = "./upload/post";
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = "100000";
            $config['file_ext_tolower'] = TRUE;
            $config['overwrite'] = TRUE;
            $config['file_name'] = $post->filename;

            $this->load->library('upload', $config);


            if (!$this->upload->do_upload('image')) {
                $config['file_ext_tolower'] = TRUE;
                $this->session->set_flashdata('error', $this->upload->display_errors());
                $this->model->update($id);
                redirect();
               
            } else {
                $this->model->update($id);
                echo "berhasil";
               redirect();
            }

    } 
}

    public function delete($id){
        $post = $this->model->read($id);
        $this->model->delete($id);
        unlink('./upload/post/'.$post->filename);
        redirect('');
    }
    
    public function deleteAll(){
        $post =$this->model->read();
        foreach($post as $p){
            unlink('./upload/post/'.$p['filename']);
        }
        $this->model->deleteAll();
        redirect('');
    }

    public function test(){

    }

    public function addNasabah() {
        $url = "http://nasabah.wika.co.id/index.php/mod_excel/post_json_to_dev";


        $postParam = [
            "nmnasabah" => "zzzzzz", 
            "alamat" => "Jl. Prof. Dr. Latumenten No. 33 Season City Unit A19-20. Jakarta Barat 11320", 
            "kota" => "KOTA JAKARTA BARAT", 
            "email" => "office@victoryutamakarya.com", 
            "kode_pos" => "11320", 
            "ext" => "-", 
            "telepon" => "02129618073", 
            "fax" => "0", 
            "npwp" => "7026367130330000", 
            "nama_kontak" => "chen xioliang", 
            "jenisperusahaan" => "lainnya", 
            "jabatan" => "manajer procuremnet", 
            "email1" => "sv-document@sinohydro-victory.com", 
            "telpon1" => "081213433907", 
            "handphone" => "081213433907", 
            "tipe_perusahaan" => "PT", 
            "tipe_lain_perusahaan" => "-", 
            "cotid" => "11", 
            "entitas" => "WG", 
            "dtsap" => [
                  [
                     "devid" => "YMMI002", 
                     "packageid" => null, 
                     "cocode" => "A000", 
                     "prctr" => null, 
                     "timestamp" => "13910000", 
                     "data" => [
                        [
                           "BPARTNER" => null, 
                           "GROUPING" => "ZN02", 
                           "LVORM" => null, 
                           "TITLE" => "Z001", 
                           "NAME" => null, 
                           "TITLELETTER" => "zzzzzzz", 
                           "SEARCHTERM1" => null, 
                           "SEARCHTERM2" => null, 
                           "STREET" => "Jl. Prof. Dr. Latumenten No. 33 Season City Unit A19-20. Jakarta Barat 11320", 
                           "HOUSE_NO" => null, 
                           "POSTL_COD1" => "11320", 
                           "CITY" => null, 
                           "ADDR_COUNTRY" => "ID", 
                           "REGION" => null, 
                           "PO_BOX" => null, 
                           "POSTL_COD3" => null, 
                           "LANGU" => "E", 
                           "TELEPHONE" => "02129618073", 
                           "PHONE_EXTENSION" => null, 
                           "MOBPHONE" => "02129618073", 
                           "FAX" => "0", 
                           "FAX_EXTENSION" => null, 
                           "E_MAIL" => "office@victoryutamakarya.com", 
                           "VALIDFROMDATE" => "123-4-12", 
                           "VALIDTODATE" => "123-5-12", 
                           "IDENTIFICATION" => [
                              [
                                 "TAXTYPE" => null, 
                                 "TAXNUMBER" => "702636713033000" 
                              ] 
                           ], 
                           "BANK" => [
                                    [
                                       "BANK_DET_ID" => null, 
                                       "BANK_CTRY" => null, 
                                       "BANK_KEY" => null, 
                                       "BANK_ACCT" => null, 
                                       "BK_CTRL_KEY" => null, 
                                       "BANK_REF" => null, 
                                       "EXTERNALBANKID" => null, 
                                       "ACCOUNTHOLDER" => null, 
                                       "BANKACCOUNTNAME" => null 
                                    ] 
                                 ], 
                           "CUST_BUKRS" => null, 
                           "KUNNR" => null, 
                           "CUST_AKONT" => "1104211000", 
                           "CUST_C_ZTERM" => "ZC00", 
                           "CUST_WTAX" => [
                                          [
                                             "WITHT" => "J7", 
                                             "WT_AGENT" => null, 
                                             "WT_AGTDF" => null, 
                                             "WT_AGTDT" => null 
                                          ] 
                                       ], 
                           "VKORG" => null, 
                           "VTWEG" => null, 
                           "SPART" => null, 
                           "KDGRP" => "kdgrp", 
                           "CUST_WAERS" => "IDR", 
                           "KALKS" => null, 
                           "VERSG" => null, 
                           "VSBED" => null, 
                           "INCO1" => null, 
                           "INCO2_L" => null, 
                           "CUST_S_ZTERM" => "ZC00", 
                           "KTGRD" => "Z2", 
                           "TAXKD" => null, 
                           "VEND_BUKRS" => null, 
                           "LIFNR" => null, 
                           "VEND_AKONT" => null, 
                           "VEND_C_ZTERM" => null, 
                           "REPRF" => "X", 
                           "VEND_WTAX" => [
                                                [
                                                ] 
                                             ], 
                           "EKORG" => null, 
                           "VEND_P_ZTERM" => null, 
                           "WEBRE" => null, 
                           "VEND_WAERS" => null, 
                           "LEBRE" => null, 
                           "BRAN2" => "Z23" 
                        ] 
                     ] 
                  ] 
               ] 
         ]; 

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postParam));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);

echo $server_output;

curl_close($ch);
 
 
    }

    
}