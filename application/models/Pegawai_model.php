<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Pegawai_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /*
     * Get pegawai by idpegawai
     */
    public function get_pegawai($idpegawai)
    {
        return $this->db->get_where('pegawai', array('idpegawai' => $idpegawai))->row_array();
    }

    /*
     * Get all pegawai
     */
    public function get_all_pegawai()
    {
        $this->db->order_by('idpegawai', 'desc');
        return $this->db->get('pegawai')->result_array();
    }

    /*
     * function to add new pegawai
     */
    public function add_pegawai($params)
    {
        $this->db->insert('pegawai', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update pegawai
     */
    public function update_pegawai($idpegawai, $params)
    {
        $this->db->where('idpegawai', $idpegawai);
        return $this->db->update('pegawai', $params);
    }

    /*
     * function to delete pegawai
     */
    public function delete_pegawai($idpegawai)
    {
        return $this->db->delete('pegawai', array('idpegawai' => $idpegawai));
    }
}
