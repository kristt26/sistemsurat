<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Pegawai extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pegawai_model');
    } 

    /*
     * Listing of pegawai
     */
    function index()
    {
        $data['_view'] = 'pegawai/index';
        $this->load->view('layouts/main',$data);
    }

    public function getdata()
    {
        $data = $this->Pegawai_model->get_all_pegawai();
        echo json_encode($data);
    }

    public function getonedata($idpegawai)
    {
        $data = $this->Pegawai_model->get_pegawai($idpegawai);
        echo json_encode($data);
    }
    public function detail($idpegawai)
    {
        $data['_view'] = 'pegawai/edit';
        $this->load->view('layouts/main',$data);
    }
    
}
