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
        $this->load->view('login');
    }

    public function login()
    {
        $params = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $data = $this->authhorization($params['username'], $params['password']);
        $result = $this->Auth_model->getdata($data);
        $result->token=$data->Token;
        $result->email=$data->Email;
        $result->logged_in=TRUE;
        
        $this->session->set_userdata((array)$result);
        echo json_encode($result);
    }

    public function authhorization($user, $pass)
    {
        
    }
    

}

/* End of file Controllername.php */
