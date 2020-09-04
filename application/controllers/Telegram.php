
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Telegram extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('mylib');

    }

    public function handlemessage()
    {
        $TOKEN = "673198510:AAGBR3JQ2llSTMnJveQWy-WNneDLbyfcyyE";
        $apiURL = "https://api.telegram.org/bot$TOKEN";
        $update = json_decode(file_get_contents("php://input"), true);
        $chatID = $update["message"]["chat"]["id"];
        $message = $update["message"]["text"];
        $msgid = $update['message']['message_id'];

        $data = array(
            'chat_id' => $chatID,
            'text' => $message === "getId" ? "Id Chat Anda: " . $chatID : "Perintah yang anda masukkan salah",
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
        $result = file_get_contents("https://api.telegram.org/bot" . $TOKEN . "/" . "sendMessage", false, $context);
    }

}

/* End of file Controllername.php */
