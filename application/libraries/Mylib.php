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
}
