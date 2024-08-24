<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_test extends CI_Model {

    public function get_all_data ()
    {
        $this->db->select('*'); 
        $this->db->from('user');
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }

    public function get_num ()
    {
        
        return $this->db->get('user')->num_rows();
    }

    public function getUserPagination($limit, $start) {
        
        $this->db->select('*');
        $this->db->from('user');
        $this->db->limit($limit, $start);
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        return $result = $query->result();
    
}

    public function add($data)
    {   
        $this->db->insert('user',$data);
    }

    public function edit($data)
    {
        //var_dump($data['id']);
        $this->db->where('id', $data['id']);
        $this->db->update('user', $data);
    }

    public function delete($data)
    {
        
        $this->db->where('id', $data['id']);
        $this->db->delete('user', $data);
        redirect('test');
    }

    public function ambil_data($keyword=null){
		$this->db->select('*');
		$this->db->from('user');
		if(!empty($keyword)){
			$this->db->like('nama_user',$keyword);
		}
		return $this->db->get()->result();
	}
}

/* End M_test.php */
