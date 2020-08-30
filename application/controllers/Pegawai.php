<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Pegawai extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pegawai_model');
    } 

    /*
     * Listing of pegawai
     */
    function index()
    {
        $data['pegawai'] = $this->Pegawai_model->get_all_pegawai();
        
        $data['_view'] = 'pegawai/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new pegawai
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'Nama' => $this->input->post('Nama'),
				'Alamat' => $this->input->post('Alamat'),
				'Kontak' => $this->input->post('Kontak'),
				'TempatLahir' => $this->input->post('TempatLahir'),
				'TanggalLahir' => $this->input->post('TanggalLahir'),
				'TahunMasuk' => $this->input->post('TahunMasuk'),
				'NoSK' => $this->input->post('NoSK'),
				'NIK' => $this->input->post('NIK'),
				'IdUser' => $this->input->post('IdUser'),
				'photo' => $this->input->post('photo'),
				'Status' => $this->input->post('Status'),
            );
            
            $pegawai_id = $this->Pegawai_model->add_pegawai($params);
            redirect('pegawai/index');
        }
        else
        {            
            $data['_view'] = 'pegawai/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a pegawai
     */
    function edit($idpegawai)
    {   
        // check if the pegawai exists before trying to edit it
        $data['pegawai'] = $this->Pegawai_model->get_pegawai($idpegawai);
        
        if(isset($data['pegawai']['idpegawai']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'Nama' => $this->input->post('Nama'),
					'Alamat' => $this->input->post('Alamat'),
					'Kontak' => $this->input->post('Kontak'),
					'TempatLahir' => $this->input->post('TempatLahir'),
					'TanggalLahir' => $this->input->post('TanggalLahir'),
					'TahunMasuk' => $this->input->post('TahunMasuk'),
					'NoSK' => $this->input->post('NoSK'),
					'NIK' => $this->input->post('NIK'),
					'IdUser' => $this->input->post('IdUser'),
					'photo' => $this->input->post('photo'),
					'Status' => $this->input->post('Status'),
                );

                $this->Pegawai_model->update_pegawai($idpegawai,$params);            
                redirect('pegawai/index');
            }
            else
            {
                $data['_view'] = 'pegawai/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The pegawai you are trying to edit does not exist.');
    } 

    /*
     * Deleting pegawai
     */
    function remove($idpegawai)
    {
        $pegawai = $this->Pegawai_model->get_pegawai($idpegawai);

        // check if the pegawai exists before trying to delete it
        if(isset($pegawai['idpegawai']))
        {
            $this->Pegawai_model->delete_pegawai($idpegawai);
            redirect('pegawai/index');
        }
        else
            show_error('The pegawai you are trying to delete does not exist.');
    }
    
}
