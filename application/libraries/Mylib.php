<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mylib
{

    public function checkmahasiswa($data)
    {
        $status = false;
        foreach ($data as $key => $value) {
            if ($value->Nama == "Mahasiswa") {
                $status = true;
            }
        }
        return $status;
    }

    public function restlogin($user, $pass)
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
            if ($response->status) {
                return $response->data;
            } else {
                return $response;
            }

        }
    }

    public function restapi($url, $token)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://restsimak.stimiksepnop.ac.id/api/" . $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json",
                "authorization: $token",
            ),
        ));
        $response = json_decode(curl_exec($curl));
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }

    public function sendtelegram($chatid, $message)
    {
        $TOKEN = "673198510:AAGBR3JQ2llSTMnJveQWy-WNneDLbyfcyyE";
        $data = array(
            'chat_id' => $chatid,
            'text' => $message,
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
        $set = file_get_contents("https://api.telegram.org/bot" . $TOKEN . "/" . "setWebhook?url=https://surat.stimiksepnop.ac.id/telegram/handlemessage");
        $result = file_get_contents("https://api.telegram.org/bot" . $TOKEN . "/" . "sendMessage", false, $context);
        return $result;
    }

    public function testtelegram($message)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => base_url("telegram/handlemessage"),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($message),
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
            return $response;
        }
    }
}
