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

    public function sendmail($to_email, $message)
    {
        $from_email = "sistemsurat@stimiksepnop.ac.id";
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'srv26.niagahoster.com';
        $config['smtp_crypto'] = 'ssl';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = $from_email;
        $config['smtp_pass'] = 'stimik1011';
        $config['charset'] = 'iso-8859-1';
        $config['newline'] = "\r\n";
        $config['smtp_timeout'] = '7';
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = true;
        $this->load->library('email', $config);
        $this->email->from($from_email, 'Sistem Surat STIMIK ');
        $this->email->to($to_email);
        $this->email->subject('Nofication');
        $this->email->message($message);

        //Send mail
        if ($this->email->send()) {
            return true;
        } else {
            $a = show_error($this->email->print_debugger());
            return $a;
        }
    }

    public function sendtelegram($chatid, $message)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.telegram.org/bot673198510:AAGBR3JQ2llSTMnJveQWy-WNneDLbyfcyyE/sendMessage?chat_id='" . $chatid . '&text=' . $message,
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
