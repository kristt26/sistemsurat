<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('mylib');

    }

    public function index()
    {
        $this->Auth_model->checkpehawai();
        $this->load->view('login');
    }

    public function login()
    {
        $params = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $data = $this->mylib->restlogin($params['username'], $params['password']);
        if (isset($data->status)) {
            echo json_encode(['message' => 'periksa username dan password']);
        } else {
            $result = $this->Auth_model->getdata($data);
            if (isset($result->message)) {
                echo json_encode($result);
            } else {
                $result->token = $data->Token;
                $result->email = $data->Email;
                $result->logged_in = true;
                $this->session->set_userdata((array) $result);
                echo json_encode($result);
            }
        }
    }
    public function getsession()
    {
        echo json_encode($this->session->userdata());
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }

}

/* End of file Controllername.php */
