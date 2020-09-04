
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Telegram extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('mylib');

    }

    public function getpesan()
    {
        $entityBody = file_get_contents('php://input');
        $message = json_decode($entityBody, true);
        $this->mylib->testtelegram($message);
    }

    public function handlemessage()
    {
        $entityBody = file_get_contents('php://input');
        echo json_encode(['test' => 'okokokokokok']);
    }
}

/* End of file Controllername.php */
