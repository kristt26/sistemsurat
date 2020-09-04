<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Mahasiswa_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /*
     * Get mahasiswa by Id
     */
    public function get_mahasiswa($Id)
    {
        return $this->db->get_where('mahasiswa', array('Id' => $Id))->row_array();
    }

    /*
     * Get all mahasiswa
     */
    public function get_all_mahasiswa()
    {
        $this->load->library('mylib');

        $this->db->order_by('Id', 'desc');
        $result = $this->db->get('mahasiswa')->result_array();
        if (count($result) == 0) {
            $session = $this->session->userdata();
            $data = json_decode(json_encode($this->mylib->restapi('mahasiswa', $session['Token'])), true);
            $this->db->trans_begin();
            $this->db->insert_batch('mahasiswa', $data);
            if ($this->db->trans_status()) {
                $this->db->trans_commit();
                return $this->db->get("mahasiswa")->result_array();
            } else {
                $this->db->trans_rollback();
                return [];
            }
        } else {
            return $result;
        }

    }

    /*
     * function to add new mahasiswa
     */
    public function add_mahasiswa($params)
    {
        $this->db->insert('mahasiswa', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update mahasiswa
     */
    public function update_mahasiswa($Id, $params)
    {
        $this->db->where('Id', $Id);
        return $this->db->update('mahasiswa', $params);
    }

    /*
     * function to delete mahasiswa
     */
    public function delete_mahasiswa($Id)
    {
        return $this->db->delete('mahasiswa', array('Id' => $Id));
    }
}
