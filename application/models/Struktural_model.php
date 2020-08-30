<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Struktural_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get struktural by idstruktural
     */
    function get_struktural($idstruktural)
    {
        return $this->db->get_where('struktural',array('idstruktural'=>$idstruktural))->row_array();
    }
        
    /*
     * Get all struktural
     */
    function get_all_struktural()
    {
        $this->db->order_by('idstruktural', 'desc');
        return $this->db->get('struktural')->result_array();
    }
        
    /*
     * function to add new struktural
     */
    function add_struktural($params)
    {
        $this->db->insert('struktural',$params);
        $params['idstruktural'] = $this->db->insert_id();
        return $params;
    }
    
    /*
     * function to update struktural
     */
    function update_struktural($idstruktural,$params)
    {
        $this->db->where('idstruktural',$idstruktural);
        return $this->db->update('struktural',$params);
    }
    
    /*
     * function to delete struktural
     */
    function delete_struktural($idstruktural)
    {
        return $this->db->delete('struktural',array('idstruktural'=>$idstruktural));
    }
}
