<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
        //validasi
        $this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'required');	
		$this->form_validation->set_message('required', '{field} field tidak boleh kosong');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
       if($this->form_validation->run() == FALSE){
           $data = [
            'title' => 'Login'
            ];
                  $this->load->view('Authentication/Auth_header',$data);
                  $this->load->view('Authentication/Auth_footer',$data);
                  $this->load->view('Authentication/Login');
                  
	}else {
        if (isset($_POST['signing'])) {
            $this->_login();
        }else {
           echo 'failed';
        }
    }
}



public function _login()  {
    //cek username
   $username = $this->input->post('username');
   //cek password
   $password = $this->input->post('password');

}
}
