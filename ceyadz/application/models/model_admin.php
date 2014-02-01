<?php

class Model_admin extends CI_Controller
{
	public function valid_user()
	{
		$this->db->where('username',$this->input->post('uname'));
		$this->db->where('password',md5($this->input->post('pword')));
		
		$query=$this->db->get('user');
		if($query->num_rows()==1)
		{
			return true;
		}
		else 
		{
			return false;
		}				
	}
	
	public function get_temp_adv()
	{
		$this->db->select('adv_id,adv_title,adv_price,adv_catagory,adv_img_tmp,adv_short_desc,adv_long_desc,adv_sub_date,adv_status');
		$query=$this->db->get('temp_adv');
		return $query->result_array();
	}
	
	public function get_temp($id)
	{
		$this->db->select(array('adv_id','adv_title','adv_price','adv_catagory','adv_img_tmp','adv_short_desc','adv_long_desc','adv_sub_date','adv_status'));
		$this->db->where('adv_id',$id);
		$query=$this->db->get('temp_adv');
		$res=$query->row_array();
		return $res;		
	}
	
}