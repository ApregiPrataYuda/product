<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model(['Product_model','Category_m']);
    }

	public function index()
	{
        $data = $this->Product_model->get();
  
        $data = [
            'title' => 'Product Data',
            'row' => $data
        ];
		$this->template->load('template','Product/Data',$data);
	}


    public function Add() {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('price', 'price', 'required');
        $this->form_validation->set_rules('id_category', 'kategori', 'required');
		$this->form_validation->set_message('required', '{field} still empty');
		$this->form_validation->set_message('is_unique', '{field} Already available');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		if ($this->form_validation->run() == FALSE) {
            $Prd = new stdClass;
            $Prd->name = null;
            $Prd->price = null;
            $Prd->id_category = null;
        $getdatacat = $this->Category_m->get();
        $data = [
            'title' => 'Product Form',
            'page' => 'Add',
            'datax' => $getdatacat
        ];
		$this->template->load('template','Product/Form',$data);
    }else {
       $post = $this->input->post(null, true);
       if (isset($_POST['Add'])) {
        $this->Product_model->add($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data Successfully Saved");
        }
        redirect('Product');
     }
    }
}

public function update($id){
    $this->form_validation->set_rules('name', 'Nama', 'required');
    $this->form_validation->set_rules('price', 'price', 'required');
    $this->form_validation->set_rules('id_category', 'kategori', 'required');
    $this->form_validation->set_message('required', '{field} still empty');
    $this->form_validation->set_message('is_unique', '{field} Already available');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
    if ($this->form_validation->run() == FALSE) {
    $getdatacat = $this->Category_m->get();
    $getid = $this->Product_model->get($id)->row();
    $data = [
        'title' => 'Product Form update',
        'page' => 'Edit',
        'datax' => $getdatacat,
        'row' =>  $getid
    ];
    $this->template->load('template','Product/Form',$data);
}else {
    $post = $this->input->post(null, true);
    if (isset($_POST['Edit'])) {
        $this->Product_model->up($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data Successfully Saved");
        }
        redirect('Product');
     }
}
}
}
