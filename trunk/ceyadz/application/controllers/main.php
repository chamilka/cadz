<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{
	public function index()
	{
		/*echo "this is the main page";
		echo "<a href='".base_url()."adv/'>Advertisements page</a>";*/

		$this->load->model('adv_model');
		$cats=$this->adv_model->getCategories();
		$categories=array(''=>'Category');
		foreach($cats as $cat)
		{
			$categories[$cat->cat_id]=$cat->cat_name;
		}
		
		$dists=$this->adv_model->getDistricts();
		$districts=array(''=>'<u>District</u>');
		foreach($dists as $dist)
		{
			$districts[$dist->dist_id]=$dist->dist_name;
		}
		
		$data['cats']=$categories;
		$data['dists']=$districts;
		$data['cat_list']=$this->load_categories();
		$data['title']='CeyAdz - Sri Lankas best Advertising portal';
		$this->load->view('main/view_main',$data);
	}
	
	public function load_categories()
	{
		$this->load->model('adv_model');
		$cats=$this->adv_model->getCategories();
	
		$disp="<ul id='cat'>";
		foreach($cats as $cat)
		{
				
			$disp.="<li><i><b>".$cat->cat_name."</b></i>";
			$sub_cats=$this->adv_model->getSubCategories($cat->cat_id);
			$disp.="<ul class='sub'>";
			foreach($sub_cats as $sub)
			{
				$disp.="<li><a href='".$sub['sub_cat_name']."'>".$sub['sub_cat_name']."</a></li>";
			}
			$disp.="</ul>";
			$disp.="<a class='disp' href='#'>More</a>";
			$disp.="</li>";
		}
		$disp.="</ul>";
		return $disp;
	}
	
	/*public function load_categories()
	{
		$this->load->model('adv_model');
		$cats=$this->adv_model->getCategories();
	
		$disp="<dl>";
		foreach($cats as $cat)
		{
			
			$disp.="<dt><i><b>".$cat->cat_name."</b></i></dt>";
			$sub_cats=$this->adv_model->getSubCategories($cat->cat_id);
			foreach($sub_cats as $sub)
			{
				$disp.="<dd><a href='".$sub['sub_cat_name']."'>".$sub['sub_cat_name']."</a></dd>";
			}
			$disp.="<a id='disp' href='#'>More</a>";
		}
		$disp.="</dl>";
		
		return $disp;
	}
	/*public function load_categories()
	{
		$this->load->model('adv_model');
		$cats=$this->adv_model->getCategories();
	
		$disp="<table>";
		$count=0;
		$disp.="<tr>";
		foreach($cats as $cat)
		{
			$count++;
			if(($count-1)%5==0)
			{
				$disp.="</tr>";
				$disp.="<tr>";
			}
			$disp.="<td style='vertical-align:top'>";
			$disp.="<dl>";
			$disp.="<dt><i><b>".$cat->cat_name."</b></i></dt>";
			$sub_cats=$this->adv_model->getSubCategories($cat->cat_id);
			foreach($sub_cats as $sub)
			{
				$disp.="<dd><a href='".$sub['sub_cat_name']."'>".$sub['sub_cat_name']."</a></dd>";
			}
			$disp.="</dl>";
			$disp.="</td>";
		}
		$disp.="</tr>";
		$disp.="</table>";
		return $disp;
	}*/
}