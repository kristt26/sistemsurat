<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        
        
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
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://restsimak.stimiksepnop.ac.id/api/users/login",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"Username\": \"$user\", \"Password\": \"$pass\"}",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json",
            ),
        ));
        $response = json_decode(curl_exec($curl));
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response->data;
        }
    }
    

}

/* End of file Controllername.php */
