<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Struktural extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Struktural_model');
    } 

    /*
     * Listing of struktural
     */
    function index()
    {
        $data['struktural'] = $this->Struktural_model->get_all_struktural();
        
        $data['_view'] = 'struktural/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new struktural
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'nm_struktural' => $this->input->post('nm_struktural'),
            );
            
            $struktural_id = $this->Struktural_model->add_struktural($params);
            redirect('struktural/index');
        }
        else
        {            
            $data['_view'] = 'struktural/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a struktural
     */
    function edit($idstruktural)
    {   
        // check if the struktural exists before trying to edit it
        $data['struktural'] = $this->Struktural_model->get_struktural($idstruktural);
        
        if(isset($data['struktural']['idstruktural']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'nm_struktural' => $this->input->post('nm_struktural'),
                );

                $this->Struktural_model->update_struktural($idstruktural,$params);            
                redirect('struktural/index');
            }
            else
            {
                $data['_view'] = 'struktural/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The struktural you are trying to edit does not exist.');
    } 

    /*
     * Deleting struktural
     */
    function remove($idstruktural)
    {
        $struktural = $this->Struktural_model->get_struktural($idstruktural);

        // check if the struktural exists before trying to delete it
        if(isset($struktural['idstruktural']))
        {
            $this->Struktural_model->delete_struktural($idstruktural);
            redirect('struktural/index');
        }
        else
            show_error('The struktural you are trying to delete does not exist.');
    }
    
}
