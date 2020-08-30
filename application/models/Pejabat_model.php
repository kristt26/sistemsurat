<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Pejabat_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get pejabat by idpejabat
     */
    function get_pejabat($idpejabat)
    {
        return $this->db->get_where('pejabat',array('idpejabat'=>$idpejabat))->row_array();
    }
        
    /*
     * Get all pejabat
     */
    function get_all_pejabat()
    {
        $this->db->order_by('idpejabat', 'desc');
        return $this->db->get('pejabat')->result_array();
    }
        
    /*
     * function to add new pejabat
     */
    function add_pejabat($params)
    {
        $this->db->insert('pejabat',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update pejabat
     */
    function update_pejabat($idpejabat,$params)
    {
        $this->db->where('idpejabat',$idpejabat);
        return $this->db->update('pejabat',$params);
    }
    
    /*
     * function to delete pejabat
     */
    function delete_pejabat($idpejabat)
    {
        return $this->db->delete('pejabat',array('idpejabat'=>$idpejabat));
    }
}
