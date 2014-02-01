<?php

class Adv_model extends CI_Model
{
	public function index()
	{
		
	}
	
	public function getNextImageID()
	{
		$this->db->select_max('adv_id','max');
		$query=$this->db->get('advertisement');
		if($query->num_rows()>0){
			$row=$query->row();
			$num=str_pad($row->max+1, 6, "0", STR_PAD_LEFT);
			//return intval($num)+1;
			return $num;
		}
	}
	
	public function getTempImages($path)
	{
		$files=scandir($path);
		$files=array_diff($files,array('.','..'));
		//print_r($files);
		/*$images=array();
		foreach($files as $file)
		{
			$images[]=array(
					'url'=>$view_path.$file,
					'thumb_url'=>$path.'thumbs/'.$file
			);
		}
		return $images;*/
		return $files;
	}
	
	public function uploadNewAdv($conf_key,$del_key,$upd_key)
	{
		print_r($_POST);
		$sd=$this->input->post('shortDesc');
		$shortDesc='';
		foreach($sd as $shrd)
		{
			if(isset($shrd) && !empty($shrd)){
				$shortDesc=$shortDesc.','.$shrd;
			}
		}
		
		date_default_timezone_set('Asia/Colombo');
		$date=now();
		$exp_date=$date+1209600; //Advertisement expires in two week from publication
		
		$data=array(
			'adv_title'=>$this->input->post('title'),
			'adv_category'=>$this->input->post('sub_category'),
			'adv_price'=>$this->input->post('price'),
			'adv_short_desc'=>$shortDesc,
			'adv_long_desc'=>$this->input->post('fullDesc'),
			'adv_sub_date'=>date('Y-m-d H:i:s',$date),
			//'adv_exp_date'=>date('Y-m-d H:i:s',$exp_date),
			'pub_name'=>$this->input->post('pubName'),
			'pub_email'=>$this->input->post('email'),
			'pub_phone'=>$this->input->post('phone'),
			'pub_phone_state'=>$this->input->post('phnState'),
			'pub_district'=>$this->input->post('location'),
			'adv_img_tmp'=>$this->session->userdata('img_tmp_dir'),
			//'adv_img_path'=>$this->session->userdata('img_path'),
			//'adv_img_url'=>$this->session->userdata('view_path'),
			'conf_key'=>$conf_key,
			'del_key'=>$del_key,
			'upd_key'=>$upd_key
		);
		
		$query=$this->db->insert('temp_adv',$data);
		if($query){
			return $this->db->insert_id();
		}
		else{
			return false;
		}
	}
	
	public function getAllAds()
	{
		$query=$this->db->get('temp_adv');
		return $query->result();
	}
	public function getAdvImages($path)
	{
		if(empty($path))
				return null;
		
		$files=scandir($path);
		$files=array_diff($files,array('.','..'));
		/*$images=null;
		foreach($files as $file)
		{
			//echo "<img src='".$file."'>";
			$images[]=$file;
		}
		//echo "test";*/
		//print_r($files);
		return $files;
	}
	
	public function deleteAdvImage($image)
	{
		if(empty($image))
			return false;
		else if(is_file($image))
			if(unlink($image))
				return true;
			else 
				return false;
		else
			return false;
	}
	
	public function setTempAdvStatus($state,$id)
	{
		$this->db->where('adv_id',$id);
		$this->db->update('temp_adv',array('adv_status'=>$state));
	}
	
	public function isValidKey($key,$type)
	{
		$this->db->where($type,$key);
		$query=$this->db->get('temp_adv');
		
		if($query->num_rows()==1)
			return true;
		else
			return false;
	}
	
	public function confirmAdv($key)
	{
		$this->db->where('conf_key',$key);
		$temp_adv=$this->db->get('temp_adv');
	
		if($temp_adv)
		{
			$row=$temp_adv->row();
			$id=$row->adv_id;
			$images=$this->getAdvImages($row->adv_img_tmp);
			$data=array(
					'adv_title'=>$row->adv_title,
					'adv_category'=>$row->adv_category,
					'adv_price'=>$row->adv_price,
					'adv_short_desc'=>$row->adv_short_desc,
					'adv_long_desc'=>$row->adv_long_desc,
					'adv_pub_date'=>$row->adv_pub_date,
					'adv_exp_date'=>$row->adv_exp_date,
					'pub_name'=>$row->pub_name,
					'pub_email'=>$row->pub_email,
					'pub_phone'=>$row->pub_phone,
					'pub_phone_state'=>$row->pub_phone_state,
					'pub_district'=>$row->pub_district,
					//'adv_img_tmp'=>$this->session->userdata('img_tmp_dir'),
					//'adv_img_path'=>$this->session->userdata('img_path'),
					//'adv_img_url'=>$this->session->userdata('view_path'),
					//'conf_key'=>$conf_key,
					'del_key'=>$row->del_key,
					'upd_key'=>$row->upd_key
			);
			
			$add_adv=$this->db->insert('advertisement',$data);
		}
		if($add_adv)
		{
			$this->db->where('adv_id',$id);
			$this->db->delete('temp_adv');
						
			return true;
		}else return false;
	}	
	
	public function setImages($path,$images)
	{
		
	}

	public function getCategories()
	{
		$query=$this->db->get('category');
		return $query->result();
	}
	
	public function getSubCategories($cat_id)
	{
		//$this->db->select('sub_cat_name');
		$this->db->where('cat_id',$cat_id);
		$query=$this->db->get('sub_category');
		return $query->result_array();
		
	}
	
	public function getDistricts()
	{
		$query=$this->db->get('district');
		return $query->result();
	}

	public function getArea($dist_id)
	{
		$this->db->select(array('area_id','area_name'));
		$this->db->where('dist_id',$dist_id);
		$query=$this->db->get('area');
		return $query->result_array();
	}
	
	
	public function getCategoryList()
	{
		$cats=$this->getCategories();
		$cat_list=array();
		foreach($cats as $cat)
		{
			$cat_list[$cat->cat_name]=$this->getSubCategories($cat->cat_id);
		}
		return $cat_list;
	}
}