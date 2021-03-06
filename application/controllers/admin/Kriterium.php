<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Kriterium extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kriterium_model');
    } 

    /*
     * Listing of kriteria
     */
    function index()
    {
        
        
        $data['_view'] = 'kriterium/index';
        $this->load->view('layouts/main',$data);
    }

    public function getdata()
    {
        $data = $this->Kriterium_model->get_all_kriteria();
        echo json_encode($data);
    }

    /*
     * Adding a new kriterium
     */
    function add()
    {   
        $params = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        if(!isset($params['idkriteria'])){
            $result = $this->Kriterium_model->add_kriterium($params);
            echo json_encode($result);
        }else{
            $result = $this->Kriterium_model->update_kriterium($params['idkriteria'],$params);
            echo json_encode($result);
        }
    }  

    /*
     * Editing a kriterium
     */
    function edit($idkriteria)
    {   
        // check if the kriterium exists before trying to edit it
        $data['kriterium'] = $this->Kriterium_model->get_kriterium($idkriteria);
        
        if(isset($data['kriterium']['idkriteria']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'kriteria' => $this->input->post('kriteria'),
                );

                $this->Kriterium_model->update_kriterium($idkriteria,$params);            
                redirect('kriterium/index');
            }
            else
            {
                $data['_view'] = 'kriterium/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The kriterium you are trying to edit does not exist.');
    } 

    /*
     * Deleting kriterium
     */
    function remove($idkriteria)
    {
        $kriterium = $this->Kriterium_model->get_kriterium($idkriteria);

        // check if the kriterium exists before trying to delete it
        if(isset($kriterium['idkriteria']))
        {
            $this->Kriterium_model->delete_kriterium($idkriteria);
            echo json_encode(['message'=>'berhasil']);

        }
        else
            var_dump(http_response_code(400));
            echo json_encode(['message'=>'tidak ada data']);

    }
    
}
