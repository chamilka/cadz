<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function index()
	{
		$this->load->view('admin/view_login');
	}
	
	public function manage()
	{
		if($this->session->userdata('is_logged_in'))
		{
			$this->load->view('admin/view_manage');		
		}
		else {
			redirect('admin');
		}
	}
	
	public function validate_user()
	{
		if(isset($_POST) && !empty($_POST)){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('uname','Username','required|trim|callback_validate_credentials');
			$this->form_validation->set_rules('pword','Password','required|md5|trim');
			
			if($this->form_validation->run()){
				$data=array(
						'uname'=>$this->input->post('uname'),
						'is_logged_in'=> 1
				);
				$this->session->set_userdata($data);
				redirect('admin/manage');
			}
			else{
				$this->load->view('admin/view_login');
			}
		}
		else{
			redirect('admin');
		}
	}
	
	public function validate_credentials()
	{
		$this->load->model('model_admin');
		
		if($this->model_admin->valid_user()){
			return true;
		}
		else{
			$this->form_validation->set_message('validate_credentials','Incorrect username or password.');
			return false;
		}
	}
	
	public function manage_temp_adv()
	{
		$this->load->model('model_admin');
		$advs=$this->model_admin->get_temp_adv();
		$data['advs']=$advs;
		$this->load->view('admin/view_temp_adv',$data);
		
	}
	
	public function view_temp_adv()
	{
		$id=$this->input->get('id');
		$this->load->model('model_admin');
		$adv=$this->model_admin->get_temp($id);
		$data['adv']=$adv;
		$data['adv_type']="Review Advertisement";
		$this->load->view('admin/view_adv',$data);
	}
}