<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Suratinternal_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get suratinternal by idarsip_surat
     */
    function get_suratinternal($idarsip_surat)
    {
        return $this->db->get_where('suratinternal',array('idarsip_surat'=>$idarsip_surat))->row_array();
    }
        
    /*
     * Get all suratinternal
     */
    function get_all_suratinternal()
    {
        $this->db->order_by('idarsip_surat', 'desc');
        return $this->db->get('suratinternal')->result_array();
    }
        
    /*
     * function to add new suratinternal
     */
    function add_suratinternal($params)
    {
        $this->db->insert('suratinternal',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update suratinternal
     */
    function update_suratinternal($idarsip_surat,$params)
    {
        $this->db->where('idarsip_surat',$idarsip_surat);
        return $this->db->update('suratinternal',$params);
    }
    
    /*
     * function to delete suratinternal
     */
    function delete_suratinternal($idarsip_surat)
    {
        return $this->db->delete('suratinternal',array('idarsip_surat'=>$idarsip_surat));
    }
}
