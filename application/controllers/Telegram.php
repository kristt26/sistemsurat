
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Telegram extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('mylib');

    }

    public function request_url($method)
    {
        $TOKEN = "673198510:AAGBR3JQ2llSTMnJveQWy-WNneDLbyfcyyE";
        return "https://api.telegram.org/bot" . $TOKEN . "/" . $method;
    }

    public function send_reply($chatid, $msgid, $text)
    {
        $data = array(
            'chat_id' => $chatid,
            'text' => $text,
            'reply_to_message_id' => $msgid,

        );
        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
            ),
        );
        $context = stream_context_create($options);
        $result = file_get_contents($this->request_url('sendMessage'), false, $context);
    }

    public function create_response($text)
    {
        return "definisi " . $text;
    }

    public function getpesan()
    {
        $message = json_decode(file_get_contents('php://input'));

        $updateid = $message["update_id"];
        $message_data = $message["message"];
        if (isset($message_data["text"])) {
            $chatid = $message_data["chat"]["id"];
            $message_id = $message_data["message_id"];
            $text = $message_data["text"];
            $response = $this->create_response($text);
            $this->send_reply($chatid, $message_id, $response);
        }
        return $updateid;
    }
}

/* End of file Controllername.php */
