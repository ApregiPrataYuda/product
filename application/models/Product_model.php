<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
 {

	public function get($id = null)
	{
        $this->db->select('product.*, category.name_category');
		$this->db->from('product');
        $this->db->join('category','category.id_category = product.id_category','left');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
	}

    function add($post)  {
        $params = [
            'name' => $post['name'],
            'id_category' => $post['id_category'],
            'price' => $post['price']
        ];
        $this->db->insert('product',$params);
    }

    function up($post)  {
        $params = [
            'name' => $post['name'],
            'id_category' => $post['id_category'],
            'price' => $post['price']
        ];
        $this->db->where('id',$post['id']);
        $this->db->update('product',$params);
    }

   
 }
