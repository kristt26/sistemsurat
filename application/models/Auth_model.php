<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('mylib');
    }

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
            `pegawai`.`idpengguna`,
            `pegawai`.`chatid`
        FROM
            `pegawai`
            LEFT JOIN `pejabat` ON `pejabat`.`idpegawai` = `pegawai`.`idpegawai`
            LEFT JOIN `struktural` ON `struktural`.`idstruktural` =
            `pejabat`.`idstruktural`
            LEFT JOIN `pengguna` ON `pegawai`.`idpengguna` = `pengguna`.`idpengguna`
        WHERE `pegawai`.`IdUser`= '$data->IdUser' AND pejabat.status='true'")->result();
        $pegawai = $this->db->get_where('pegawai', ['IdUser' => $data->IdUser])->result();
        if (count($pegawai) == 0) {
            $datapegawai = $this->mylib->restapi("pegawai", $data->Token);
            $this->db->trans_begin();
            $this->db->insert("pengguna", ['jenis' => 'Pegawai']);
            $itempegawai = [
                'Nama' => $datapegawai->Nama,
                'Alamat' => $datapegawai->Alamat,
                'Kontak' => $datapegawai->Kontak,
                'TempatLahir' => $datapegawai->TempatLahir,
                'TanggalLahir' => $datapegawai->TanggalLahir,
                'TahunMasuk' => $datapegawai->TahunMasuk,
                'NIK' => $datapegawai->NIK,
                'IdUser' => $datapegawai->IdUser,
                'photo' => $datapegawai->photo,
                'Status' => $datapegawai->Status,
                'idpengguna' => $this->db->insert_id(),
            ];
            $this->db->insert('pegawai', $itempegawai);
            $this->db->trans_commit();
            return (object) ['message' => 'jabatan anda belum terdaftar silahkan hubungi admin'];
        } else {
            if (count($result) != 0) {
                $item = $result[0];
                $item->role = array();
                foreach ($result as $key => $value) {
                    $a = [
                        'idstruktural' => $value->idstruktural,
                        'nm_struktural' => $value->nm_struktural,
                    ];
                    array_push($item->role, $a);
                }
                if (count($item->role) > 0) {
                    if ($item->idpengguna == 0) {
                        $this->db->trans_begin();
                        $this->db->insert('pengguna', ['jenis' => 'Pegawai']);
                        $id = $this->db->insert_id();
                        $this->db->where('idpegawai', $item->idpegawai);
                        $this->db->update('pegawai', ['idpengguna' => $id]);
                        if ($this->db->trans_status()) {
                            $this->db->trans_commit();
                            $item->idpengguna = $id;
                            $item->jenis = "Pegawai";
                            return $$item;
                        } else {
                            $this->db->trans_rollback();
                            return false;
                        }
                    } else {
                        return $item;
                    }
                } else {
                    return (object) ['message' => 'tidak ada struktural'];
                }
            } else {
                return (object) ['message' => 'Struktural anda belum di daftarkan, hubungi admin'];
            }

        }
    }

    public function checkpehawai()
    {
        $result = $this->db->get("pegawai")->result();
        $Token = $this->mylib->restlogin('kristt26', 'stimik1011')->Token;
        if (count($result) == 0) {
            $pegawai = $this->mylib->restapi("pegawai", $Token);
            $this->db->trans_begin();
            $this->db->insert_batch('pegawai', $pegawai);
            $this->db->insert('struktural', ['nm_struktural' => 'Admin']);
            $idstruktural = $this->db->insert_id();
            $this->db->insert('pejabat', ['idstruktural' => $idstruktural, 'idpegawai' => 1]);
            $idstruktural = $this->db->insert_id();
            if ($this->db->trans_status()) {
                $this->db->trans_commit();
            } else {
                $this->db->trans_rollback();
            }
        }
    }

}

/* End of file ModelName.php */
