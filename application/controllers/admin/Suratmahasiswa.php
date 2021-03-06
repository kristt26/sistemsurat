<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Suratmahasiswa extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Suratmahasiswa_model');
    } 

    /*
     * Listing of suratmahasiswa
     */
    function index()
    {
        $data['suratmahasiswa'] = $this->Suratmahasiswa_model->get_all_suratmahasiswa();
        
        $data['_view'] = 'suratmahasiswa/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new suratmahasiswa
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'mahasiswa_Id' => $this->input->post('mahasiswa_Id'),
				'pejabat_idpejabat' => $this->input->post('pejabat_idpejabat'),
            );
            
            $suratmahasiswa_id = $this->Suratmahasiswa_model->add_suratmahasiswa($params);
            redirect('suratmahasiswa/index');
        }
        else
        {            
            $data['_view'] = 'suratmahasiswa/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a suratmahasiswa
     */
    function edit($idsuratmahasiswa)
    {   
        // check if the suratmahasiswa exists before trying to edit it
        $data['suratmahasiswa'] = $this->Suratmahasiswa_model->get_suratmahasiswa($idsuratmahasiswa);
        
        if(isset($data['suratmahasiswa']['idsuratmahasiswa']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'mahasiswa_Id' => $this->input->post('mahasiswa_Id'),
					'pejabat_idpejabat' => $this->input->post('pejabat_idpejabat'),
                );

                $this->Suratmahasiswa_model->update_suratmahasiswa($idsuratmahasiswa,$params);            
                redirect('suratmahasiswa/index');
            }
            else
            {
                $data['_view'] = 'suratmahasiswa/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The suratmahasiswa you are trying to edit does not exist.');
    } 

    /*
     * Deleting suratmahasiswa
     */
    function remove($idsuratmahasiswa)
    {
        $suratmahasiswa = $this->Suratmahasiswa_model->get_suratmahasiswa($idsuratmahasiswa);

        // check if the suratmahasiswa exists before trying to delete it
        if(isset($suratmahasiswa['idsuratmahasiswa']))
        {
            $this->Suratmahasiswa_model->delete_suratmahasiswa($idsuratmahasiswa);
            redirect('suratmahasiswa/index');
        }
        else
            show_error('The suratmahasiswa you are trying to delete does not exist.');
    }
    
}
