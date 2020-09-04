<?php defined('BASEPATH') or exit('No direct script access allowed');
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Surat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Surat_model');
        $this->load->library('mylib');
        // if (!$this->session->userdata("logged_in")) {
        //     redirect('auth');
        // }
    }

    /*
     * Listing of struktural
     */
    public function index()
    {

        $data['_view'] = 'surat/index';
        $this->load->view('layouts/main', $data);
    }

    public function getdata()
    {
        $data = $this->Surat_model->getdatasurat();
        echo json_encode($data);
    }

    /*
     * Adding a new struktural
     */
    public function add()
    {
        $params = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Surat_model->add_surat($params);
        if ($result !== null) {

        }
        echo json_encode($result);
    }

    public function edit($idstruktural)
    {
        // check if the struktural exists before trying to edit it
        $data['struktural'] = $this->Struktural_model->get_struktural($idstruktural);

        if (isset($data['struktural']['idstruktural'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'nm_struktural' => $this->input->post('nm_struktural'),
                );

                $this->Struktural_model->update_struktural($idstruktural, $params);
                redirect('struktural/index');
            } else {
                $data['_view'] = 'struktural/edit';
                $this->load->view('layouts/main', $data);
            }
        } else {
            show_error('The struktural you are trying to edit does not exist.');
        }
    }

    /*
     * Deleting struktural
     */
    public function remove($idstruktural)
    {
        $struktural = $this->Struktural_model->get_struktural($idstruktural);

        // check if the struktural exists before trying to delete it
        if (isset($struktural['idstruktural'])) {
            $this->Struktural_model->delete_struktural($idstruktural);
            echo json_encode(['message' => true]);
        } else {
            echo json_encode(['message' => false]);
        }

    }
    public function upload()
    {
        $config['upload_path'] = './assets/berkas';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 6096;
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("file")) {
            $data = array('upload_data' => $this->upload->data());
            $image = $data['upload_data']['file_name'];
            // $result = $this->ProfileModel->updategambar($image);
            echo json_encode(array('file' => $image));
        } else {
            echo json_encode(false);
        }
    }

    public function suratmahasiswa($IdUser)
    {
        $data = $this->Surat_model->get_mahasiswa($Id);
        echo json_encode($data);
    }

}
