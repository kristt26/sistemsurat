<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mylib
{
    public function checkmahasiswa($data)
    {
        $status = false;
        foreach ($data as $key => $value) {
            if($value->Nama=="Mahasiswa"){
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
            return $response->data;
        }
    }

    public function restapi($user, $pass, $url)
    {
        $token = $this->session->userdata('Token');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://restsimak.stimiksepnop.ac.id/api/".$url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"Username\": \"$user\", \"Password\": \"$pass\"}",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json",
                "authorization: $token"
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
