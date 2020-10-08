<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pegawai_model');
    }

    /*
     * Listing of pegawai
     */
    public function index()
    {
        $data['_view'] = 'pegawai/index';
        $this->load->view('layouts/main', $data);
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

    public function edit($IdUser)
    {
        $params = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $data = $this->Pegawai_model->update_pegawai($IdUser, $params);
        echo json_encode(['pesan' => $data]);
    }

    public function detail($idpegawai)
    {
        $data['_view'] = 'pegawai/edit';
        $this->load->view('layouts/main', $data);
    }
    public function checkidtelegram()
    {
        $id = $this->session->userdata();
        echo json_encode($id);
    }

    public function updatetelegram()
    {
        $params = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $data = $this->Pegawai_model->update_telegram($params);
        echo json_encode($data);
    }
}
