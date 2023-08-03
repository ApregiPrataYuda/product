<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {


    function __construct()  {
        parent::__construct();
        $this->load->model('Category_m');
    }

	public function index()
	{   
        $getdata = $this->Category_m->get();
        $data = [
            'title' => 'Category Data',
            'row'  => $getdata
        ];
		$this->template->load('template','Category/Data',$data);
	}

    public function Add()  {

        $this->form_validation->set_rules('name_category', 'Nama kategori', 'required|is_unique[category.name_category]');
		$this->form_validation->set_message('required', '{field} still empty');
		$this->form_validation->set_message('is_unique', '{field} Already available');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		if ($this->form_validation->run() == FALSE) {
            $Category = new stdClass;
            $Category->id_category = null;
            $Category->name_category = null;

        $data = [
            'title' => 'Category Data Add',
            'page' => 'Add',
            'row' =>  $Category
        ];
		$this->template->load('template','Category/Form',$data);

    }else {
       $post = $this->input->post(null, true);
     if (isset($_POST['Add'])) {
        $this->Category_m->add($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data Successfully Saved");
        }
        redirect('Category');
     }

    }
    }


    public function update($id) {

        $this->form_validation->set_rules('name_category', 'Nama kategori', 'required');
		$this->form_validation->set_message('required', '{field} still empty');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		if ($this->form_validation->run() == FALSE) {
        $getid = $this->Category_m->get($id)->row();
        $data = [
            'title' => 'Category Data update',
            'page' => 'edit',
            'row' => $getid
        ];
		$this->template->load('template','Category/Form',$data);
    }else{
        $post = $this->input->post(null, true);
        if (isset($_POST['edit'])) {
            $this->Category_m->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('pesan', "Data Successfully update");
            }
            redirect('Category');
         }
    }
    }


    public function delete($id)  {
        $this->Category_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data Successfully delete");
        }
        redirect('Category');
    }
}
