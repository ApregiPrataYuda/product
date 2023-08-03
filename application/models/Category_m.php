<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_m extends CI_Model
 {

	public function get($id = null)
	{
		$this->db->from('category');
        if ($id != null) {
            $this->db->where('id_category', $id);
        }
        $query = $this->db->get();
        return $query;
	}

    function add($post)  {
        $params = [
            'name_category' => $post['name_category']
        ];
        $this->db->insert('category',$params);
    }


    function update($post)  {
        $params = [
            'name_category' => $post['name_category']
        ];
        $this->db->where('id_category',$post['id_category']);
        $this->db->update('category',$params);
    }

    function delete($id){
        $this->db->where('id_category', $id);
        $this->db->delete('category');
    }
}
