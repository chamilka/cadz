<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Controller
{
	public function about_us() {
		echo "test";
		$data['title']='CeyAdz - Sri Lankas best Advertising portal';
		$data['page']='common/about_us';
		$this->load->view('content',$data);
	}
	
	public function contact_us() {
		echo "test";
		$data['title']='CeyAdz - Sri Lankas best Advertising portal';
		$data['page']='common/contact_us';
		$this->load->view('content',$data);
	}
	
	public function terms_of_use() {
		echo "test";
		$data['title']='CeyAdz - Sri Lankas best Advertising portal';
		$data['page']='common/terms_of_use';
		$this->load->view('content',$data);
	}
	
	public function privacy_policy() {
		echo "test";
		$data['title']='CeyAdz - Sri Lankas best Advertising portal';
		$data['page']='common/privacy_policy';
		$this->load->view('content',$data);
	}
	
	public function site_map() {
		echo "test";
		$data['title']='CeyAdz - Sri Lankas best Advertising portal';
		$data['page']='common/site_map';
		$this->load->view('content',$data);
	}
	
	public function help() {
		echo "test";
		$data['title']='CeyAdz - Sri Lankas best Advertising portal';
		$data['page']='common/help';
		$this->load->view('content',$data);
	}
	
}