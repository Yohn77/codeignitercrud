<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('m_test');
       
    }
    
        

    public function index()
    {
        
            $data = array (
                'title' => 'Test',
                'user' => $this->m_test->get_all_data(),
                
            );

       

        $this->load->library('pagination');
        $config['base_url'] = 'http://localhost/codeigniter/code/index.php/test/index/';
        $config['total_rows'] = $this->m_test->get_num();
        $config['per_page'] = 2;
        $config['uri_segment'] = 3;
        // Membuat Style pagination untuk BootStrap v4
          $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        //close style
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['link'] = $this->pagination->create_links();
        $data['user'] = $this->m_test->getUserPagination($config['per_page'], $page);
        //search
        $this->load->view('test', $data);
    }

    public function add()
    {
        $data = array(
            'nama_user' => $this->input->post('nama_user'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        );
       $this->m_test->add($data); 
       redirect('test');
  
    }

    public function edit($id = NULL)
    {
        //var_dump ($id);
        $data = array(
            'id' => $id,
            'nama_user' => $this->input->post('nama_user'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        );
       $this->m_test->edit($data); 
       redirect('test');

    }
    public function search($keyword = NULL)
    {
      
        $keyword = $this->input->get('keyword');
		$data = array(
			'user' => $this->m_test->ambil_data($keyword),
		);
      
         $this->load->view('search',$data);

    }

    public function delete($id = NULL)
    {
        $data = array ('id' => $id);
        $this->m_test->delete($data);
        //redirect('test');
        
    }
    

}


/* End of file Controllername.php */
