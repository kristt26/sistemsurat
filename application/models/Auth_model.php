<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
    public function getdata($data)
    {
        $this->load->library('mylib');
        $result = $this->db->query("SELECT
            `pejabat`.`idpejabat`,
            `pejabat`.`NoSK` AS `NoSK1`,
            `struktural`.`idstruktural`,
            `struktural`.`nm_struktural`,
            `pengguna`.`jenis`,
            `pegawai`.`idpegawai`,
            `pegawai`.`Nama`,
            `pegawai`.`Alamat`,
            `pegawai`.`Kontak`,
            `pegawai`.`TempatLahir`,
            `pegawai`.`TanggalLahir`,
            `pegawai`.`TahunMasuk`,
            `pegawai`.`NIK`,
            `pegawai`.`IdUser`,
            `pegawai`.`photo`,
            `pegawai`.`Status`,
            `pegawai`.`idpengguna`
        FROM
            `pegawai`
            LEFT JOIN `pejabat` ON `pejabat`.`idpegawai` = `pegawai`.`idpegawai`
            LEFT JOIN `struktural` ON `struktural`.`idstruktural` =
            `pejabat`.`idstruktural`
            LEFT JOIN `pengguna` ON `pegawai`.`idpengguna` = `pengguna`.`idpengguna`
        WHERE `pegawai`.`IdUser`= '$data->IdUser' AND pejabat.status='true'")->result();
        if(count($item)==0){
            $datapegawai = $this->mylib->restapi("pegawai", $data->Token);
            $this->db->trans_begin();
            $this->db->insert("pegawai", ['jenis'=>'Pegawai']);
            $itempegawai = [
                'Nama'=> $datapegawai->Nama,
                'Alamat'=> $datapegawai->Alamat,
                'Kontak'=> $datapegawai->Kontak,
                'TempatLahir'=> $datapegawai->TempatLahir,
                'TanggalLahir'=> $datapegawai->TanggalLahir,
                'TahunMasuk'=> $datapegawai->TahunMasuk,
                'NIK'=> $datapegawai->NIK,
                'IdUser'=> $datapegawai->IdUser,
                'photo'=> $datapegawai->photo,
                'Status'=> $datapegawai->Status,
                'idpengguna'=> $this->db->insert_id()
            ];
        }
        $item = $result[0];
        $item->role = array();
        foreach ($result as $key => $value) {
            $a = [
                'idstruktural'=>$value->idstruktural,
                'nm_struktural'=>$value->nm_struktural
            ];
            array_push($item->role, $a);
        }
        if($item->idpengguna==0){
            $this->db->trans_begin();
            $this->db->insert('pengguna', ['jenis'=>'Pegawai']);
            $id = $this->db->insert_id();
            $this->db->where('idpegawai', $item->idpegawai);
            $this->db->update('pegawai', ['idpengguna'=>$id]);
            if($this->db->trans_status()){
                $this->db->trans_commit();
                $item->idpengguna=$id;
                $item->jenis="Pegawai";
                return $$item;
            }else{
                $this->db->trans_rollback();
                return false;
            }
        }else{
            return $item;
        }
        
    }    

}

/* End of file ModelName.php */
