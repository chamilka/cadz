<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Adv extends CI_Controller {
	var $img_path = "";
	
	public function __contruct() {
		$this->img_path = "images/advertisements/";
	}
	
	public function index() {
		$this->add_new ();
		$this->img_path = "images/advertisements/";
	}
	
	public function add_new() {
		
		$data ['title'] = 'Publish New Advertisement';
		$data ['page'] = 'view_add_new';
		$data ['categories'] = $this->create_category_list ();
		$data ['districts'] = $this->create_district_list ();
		$this->load->model ( 'adv_model' );
		$this->img_path = "images/advertisements/";
		
		// $this->adv_model->getNextImageID();
		// print_r($_POST);
		if (isset ( $_POST ) && ! empty ( $_POST )) {
			$this->load->library ( 'form_validation' );
			$this->form_validation->set_rules ( 'title', 'Title', 'required' );
			/*
			 *
			 * $this->form_validation->set_rules('category','Category','callback_validate_category');
			 * $this->form_validation->set_rules('shortDesc','Short
			 * description','callback_validate_short_desc');
			 * $this->form_validation->set_rules('price','Price','required');
			 * $this->form_validation->set_rules('pubName','Your
			 * name','required');
			 * $this->form_validation->set_rules('email','Your email
			 * address','required');
			 * //$this->form_validation->set_rules('location','Your
			 * city/area','required');
			 * $this->form_validation->set_message('required','%s is required');
			 * $this->form_validation->set_message('shortDesc[]','Short
			 * description is required');
			 * $this->form_validation->set_error_delimiters('<span
			 * class="help-inline alert-error">', '</span>');
			 */
			if ($this->form_validation->run ()) {
				// generate a random key
				$conf_key = md5 ( uniqid () );
				$del_key = md5 ( uniqid () );
				$upd_key = md5 ( uniqid () );
				
				$this->load->library ( 'email' );
				
				// ********config to ceyadz main**********//
				$config ['protocol'] = 'smtp';
				$config ['smtp_host'] = 'ssl://md-43.webhostbox.net';
				$config ['smtp_port'] = '465';
				$config ['smtp_timeout'] = '7';
				$config ['smtp_user'] = 'admin+ceyadz.com';
				$config ['smtp_pass'] = 'ceytrend';
				$config ['charset'] = 'utf-8';
				$config ['newline'] = "\r\n";
				$config ['mailtype'] = 'html'; // or html
				$config ['validation'] = TRUE; // bool whether to validate email or
				                              // not*/
				
				$this->email->initialize ( $config );
				
				// *********************//
				
				$this->email->from ( 'admin@ceyadz.com', 'CeyAdz' );
				$this->email->to ( $this->input->post ( 'email' ) );
				$this->email->subject ( "Confirm your advertisement." );
				
				$message = "<p>Thank you for using CeyAdz to publish your advertisement!</p>";
				$message .= "<p>Please click on the following link to confirm your advertisement. It will be published on our website within 24 hours after your confirmation</p>";
				$message .= "<p><a href='" . base_url () . "adv/pub_conf/$conf_key'>" . base_url () . "adv/pub_conf/" . $conf_key . "</a></p>";
				$message .= "<p><i>Note that</i>: To maintain the quality of our service, CeyAds Advertisements Review Team will review your advertisement before the actual publication</p>";
				$message .= "<p>&nbsp;</p>";
				$message .= "<p>This adversitement will be expired and automatically removed after two weeks from the date of publication. However you can use the link below to disable it before the expiration.</p>";
				$message .= "<p><a href='" . base_url () . "adv/pub_del/$del_key'>" . base_url () . "adv/pub_del/" . $del_key . "</a></p>";
				$message .= "<p>&nbsp;</p>";
				$message .= "<p>If you wish to extend the pulication period of this advertisement use the following link. It is possible to extend the expiration time for 2 weeks.</p>";
				$message .= "<p><a href='" . base_url () . "adv/pub_upd/$upd_key'>" . base_url () . "adv/pub_upd/" . $upd_key . "</a></p>";
				
				$this->email->message ( $message );
				
				if ($id = $this->adv_model->uploadNewAdv ( $conf_key, $del_key, $upd_key )) {
					if ($this->email->send ()) {
						$this->adv_model->setTempAdvStatus ( 'Email Sent', $id );
						echo "The email has been sent!";
					} else {
						$this->adv_model->setTempAdvStatus ( 'Failed', $id );
						echo "failed";
					}
				} else {
					echo "Error";
				}
				
				$data ['errors'] = 'Your advertisement has been added';
			
			} else {
				$data ['errors'] = validation_errors ();
			}
		} else {
			$this->createTempDir ();
			// $this->load->view('content',$data);
		}
		$this->load->view ( 'content', $data );
	}
	
	public function validate_category() {
		if ($this->input->post ( 'category' ) == 'Select Category' || ! isset ( $_POST ['category'] )) {
			$this->form_validation->set_message ( 'validate_category', 'Please select a suitable category and subcategory.' );
			return false;
		} else
			return true;
	}
	
	public function validate_short_desc() {
		/*
		 * $sd=$this->input->post('shortDesc'); if($sd[0]=='') return false;
		 * else return true;
		 */
		return false;
	}
	
	public function validate_adv() {
	
	}
	
	public function upload_image() {
		$temp_dir = $this->session->userdata ( 'img_tmp_dir' );
		$path = APPPATH . 'images/advertisements/temp/' . $temp_dir . "/";
		$view_path = base_url () . 'application/images/advertisements/temp/' . $temp_dir . "/";
		if (! empty ( $path )) {
			$valid_formats = array ("jpg", "jpeg", "png", "gif", "bmp" );
			if (isset ( $_POST ) and $_SERVER ['REQUEST_METHOD'] == "POST") {
				$name = $_FILES ['advimg'] ['name'];
				$size = $_FILES ['advimg'] ['size'];
				
				if (strlen ( $name )) {
					list ( $txt, $ext ) = explode ( ".", $name );
					if (in_array ( $ext, $valid_formats )) {
						if ($size < (1024 * 1024)) {
							$actual_image_name = time () . substr ( str_replace ( " ", "_", $txt ), 5 ) . "." . $ext;
							$tmp = $_FILES ['advimg'] ['tmp_name'];
							if (move_uploaded_file ( $tmp, $path . $actual_image_name )) {
								// mysql_query("UPDATE users SET
								// profile_image='$actual_image_name' WHERE
								// uid='$session_id'");
								// $this->load->model('adv_model');
								// $images=$this->adv_model->getTempImages($path);
								// echo $images;
								// foreach($images as $image)
								// {
								echo "<span>";
								echo "<a style='top:0;right:0' href='adv/remove_image?image=" . urlencode ( $path . $actual_image_name ) . "' class='imgDelete'><i class='icon-remove'></i></a>";
								echo "<img src='" . $view_path . $actual_image_name . "' class=preimage>";
								// echo "<a href='' class='span2 imgDelete'><i
								// class='icon-remove black'></i></a>";
								echo "</span>";
								// }
							} else
								echo "failed";
						} else
							echo "Image file size max 1 MB";
					} else
						echo "Invalid file format..";
				} else
					echo "Please select image..!";
			}
		} else
			echo "Temporary directory does not exist";
	}
	
	private function createTempDir() {
		$temp_dir = rand ( 100000, 999999 );
		$path = APPPATH . $this->img_path . 'temp/' . $temp_dir . "/";
		// echo $path;
		if (! is_dir ( $path )) {
			mkdir ( $path, 0777 );
		} else {
			while ( is_dir ( $path ) ) {
				$temp_dir = rand ( 100000, 999999 );
				$path = APPPATH . $this->img_path . 'temp/' . $temp_dir . "/";
			}
			mkdir ( $path, 0777 );
		}
		$this->session->set_userdata ( array ('img_tmp_dir' => $temp_dir ) );
	}
	
	public function remove_image() {
		$image = $this->input->get ( 'image' );
		$this->load->model ( 'adv_model' );
		echo $this->adv_model->deleteAdvImage ( $image );
	}
	
	public function view_all() {
		$this->load->model ( 'adv_model' );
		$advs = $this->adv_model->getAllAds ();
		$data ['title'] = 'View Advertisements';
		$data ['page'] = 'view_all';
		$data ['advertisements'] = array ();
		
		define ( 'MINUTE', 60, true );
		define ( 'HOUR', MINUTE*60, true );
		define ( 'DAY', HOUR*24, true );
		define ( 'MONTH', DAY * 30, true );
		define ( 'YEAR', DAY * 365, true );
		
		foreach ( $advs as $adv ) {
			$img_path = APPPATH . 'images/advertisements/temp/' . $adv->adv_img_tmp . "/";
			$view_path = base_url () . 'application/images/advertisements/temp/' . $adv->adv_img_tmp . "/";
			$images = $this->adv_model->getAdvImages ( $img_path );
			// echo $view_path.$images[2];
			$short_desc = explode ( ',', $adv->adv_short_desc );
			$def_img = '';
			if ($images)
				$def_img = $view_path . $images [2];
				// $date = new DateTime($adv->adv_sub_date);
			
			$tz = new DateTimeZone ( 'Asia/Colombo' );
			$date = new DateTime ( $adv->adv_sub_date );
			$now = new DateTime ( 'now', $tz );
			$diff = abs ( $date->getTimestamp () - $now->getTimestamp () );
			
			$years = floor ( $diff / (YEAR) );
			$months = floor ( ($diff - $years * YEAR) / (MONTH) );
			$days = floor ( ($diff - $years * YEAR - $months * MONTH) / (DAY) );
			$hours = floor ( ($diff - $years * YEAR - $months * MONTH - $days * DAY) / (HOUR) );
			$minutes = floor ( ($diff - $years * YEAR - $months * MONTH - $days * DAY - $hours * HOUR) / (MINUTE) );
			
			$sub_date = "";
			if ($months > 3) {
				$sub_date = $adv->adv_sub_date;
				$sub_date = date('d/m/Y', strtotime($sub_date));
			} else {
				if ($months > 1) {
					$sub_date = $months . " Months";
				} else if ($months > 0) {
					$sub_date = $months . " Month";
				}
				else {
					if ($days > 1) {
						$sub_date = $days . " Days";
					} else if ($days > 0) {
						$sub_date = $days . " Day";
					}
					else {
						if ($hours > 1) {
							$sub_date = $hours . " Hours";
						} else if ($hours > 0) {
							$sub_date = $hours . " Hour";
						}
						else {
							if ($minutes > 1) {
								$sub_date = $minutes . " Minutes";
							} else if ($hours > 0) {
								$sub_date = $minutes . " Minute";
							}
							else {
								$sub_date = $diff . "Seconds";
							}
						}	
					}
				}
			$sub_date.=" ago.";	
			}
			
			$data ['advertisements'] [] = array (
					'adv_id' => $adv->adv_id, 
					'adv_title' => $adv->adv_title, 
					'adv_price' => $adv->adv_price, 
					'adv_short_desc' => $short_desc, 
					'adv_full_desc' => $adv->adv_long_desc, 
					'adv_city' => $adv->pub_city, 
					'adv_district' => $adv->pub_district, 
					'adv_phone' => $adv->pub_phone, 
					'adv_email' => $adv->pub_email, 
					'adv_uploaded' => $sub_date, 
					'adv_default_img' => $def_img, 
					'adv_img_url' => $view_path, 
					'adv_img_path' => $img_path 
				);
		}
		// print_r($data['advertisements']);
		// $data['images']=
		// $this->adv_model->getAdvImages($advs->adv_img_path);
		
		$data ['cat_list'] = $this->load_categories ();
		
		$this->load->view ( 'content', $data );
		// $this->load->view('view3');
	}
	
	public function load_categories() {
		$this->load->model ( 'adv_model' );
		$cats = $this->adv_model->getCategories ();
		
		$disp = "<ul class='nav nav-list'  id='cat'>";
		foreach ( $cats as $cat ) {
			
			$disp .= "<li><i><b>" . $cat->short_name . "</b></i>";
			$sub_cats = $this->adv_model->getSubCategories ( $cat->cat_id );
			$disp .= "<ul class='sub'>";
			foreach ( $sub_cats as $sub ) {
				$disp .= "<li><a href='" . $sub ['short_name'] . "'>" . $sub ['short_name'] . "</a></li>";
			}
			$disp .= "</ul>";
			$disp .= "<a class='disp' href='#'>More</a>";
			$disp .= "</li>";
		}
		$disp .= "</ul>";
		return $disp;
	}
	
	public function more_images() {
		$path = $this->input->get ( 'path' );
		$this->load->model ( 'adv_model' );
		$images = $this->adv_model->getAdvImages ( $path );
		$view_path = base_url () . $path;
		
		$imgStr = "";
		$imgStr .= "<div id='gallery' class='ad-gallery'>";
		$imgStr .= "<div class='ad-image-wrapper'>";
		$imgStr .= "</div>";
		$imgStr .= "<div class='ad-controls'>";
		$imgStr .= "</div>";
		$imgStr .= "<div class='ad-nav'>";
		$imgStr .= "<div class='ad-thumbs'>";
		$imgStr .= "<ul class='ad-thumb-list'>";
		$count = - 1;
		foreach ( $images as $image ) {
			$count ++;
			$imgStr .= "<li>";
			$imgStr .= "<a href='" . $view_path . $image . "'>";
			$imgStr .= "<img src='" . $view_path . $image . "' width='60px' height='60px' class='image" . $count . "'>";
			$imgStr .= "</a>";
			$imgStr .= "</li>";
		}
		$imgStr .= "</ul>";
		$imgStr .= "</div>";
		$imgStr .= "</div>";
		$imgStr .= "</div>";
		$imgStr .= "<div id='descriptions'>";
		$imgStr .= "</div>";
		$imgStr .= "</div>";
		echo $imgStr;
	}
	
	public function set_adv_images($path) {
		/*
		 * $this->load->model('adv_model'); return
		 * $this->adv_model->getAdvImages($path);
		 */
		// echo $path;
	
	}
	
	public function test() {
		echo 'Test real';
	}
	
	public function pub_conf($conf_key) {
		$this->load->model ( 'adv_model' );
		$data = '';
		if ($this->adv_model->isValidKey ( $conf_key, 'conf_key' )) {
			if ($this->adv_model->confirmAdv ( $conf_key, APPPATH . $this->img_path )) {
				$data ['title'] = 'Successful: confirm advertisement';
				$data ['message'] = '<strong><p>Thank you for using CeyAdz. Your advertisement will be published in our website after the review by the <a href="main/contact_review/">CeyAdz Advertisements Review Team</a> withing 24 hours.</p></strong>';
				$this->load->view ( 'view_success', $data );
			}
		} else {
			$data ['title'] = 'Error: confirm advertisement';
			$data ['message'] = '<h4>Error !</h4><h5><p>Either your advertisement has already been published or the confirmation key has been expired.</p><p>Please contact the <a href="main/contact_review/">CeyAds Advertisements Review Team</a> for further information.</p></h5>';
			$this->load->view ( 'view_error', $data );
		}
	}
	
	public function create_img_dir($name) {
	
	}
	
	public function create_category_list() {
		$this->load->model ( 'adv_model' );
		$cats = $this->adv_model->getCategories ();
		// $cat_list="<div class='dropdown'>";
		$cat_list = "<ul id='category' class='dropdown-menu' role='menu' aria-labelledby='dropdownMenu'>";
		/*
		 * $cat_list.="<li>"; $cat_list.="<a tabindex='-1' href='-1'
		 * class='sel_cat'>Select Category</a>"; $cat_list.="</li>";
		 */
		foreach ( $cats as $cat ) {
			$cat_list .= "<li class='dropdown-submenu'>";
			$cat_list .= "<a tabindex='-1' href='" . $cat->cat_id . "' class='sel_cat'>" . $cat->cat_name . "</a>";
			/*
			 * $sub_cats=$this->adv_model->getSubCategories($cat->cat_id);
			 * $cat_list.="<ul id='sub-category' class='dropdown-menu'>";
			 * foreach($sub_cats as $sub) { $cat_list.="<li><a tabindex='-1'
			 * href='#'>".$sub['sub_cat_name']."</a></li>"; }
			 * $cat_list.="</ul>";
			 */
			$cat_list .= "</li>";
		}
		$cat_list .= "</ul>";
		// $cat_list.="</div>";
		return $cat_list;
	}
	
	public function create_sub_list() {
		$cat_list = "";
		$cat_id = $this->input->get ( 'catid' );
		$this->load->model ( 'adv_model' );
		$sub_cats = $this->adv_model->getSubCategories ( $cat_id );
		$cat_list .= '<a class="dropdown-toggle btn" data-toggle="dropdown" href="#" id="btn_sub_cat" >Select Subcategory</a>';
		$cat_list .= "<ul id='sub-category' class='dropdown-menu' role='menu' aria-labelledby='dropdownSubMenu'>";
		foreach ( $sub_cats as $sub ) {
			$cat_list .= "<li><a tabindex='-1' href='" . $sub ['sub_cat_id'] . "' class='sel_sub_cat'>" . $sub ['sub_cat_name'] . "</a></li>";
		}
		$cat_list .= "</ul>";
		echo $cat_list;
	}
	
	public function create_district_list() {
		$this->load->model ( 'adv_model' );
		$dists = $this->adv_model->getDistricts ();
		
		$dist_list = "<ul id='district' class='dropdown-menu' role='menu' aria-labelledby='dropdownMenu'>";
		foreach ( $dists as $dist ) {
			$dist_list .= "<li class='dropdown-submenu'>";
			$dist_list .= "<a tabindex='-1' href='" . $dist->dist_id . "' class='sel_dist'>" . $dist->dist_name . "</a>";
			$dist_list .= "</li>";
		}
		$dist_list .= "</ul>";
		return $dist_list;
	}
	
	public function create_area_list() {
		$area_list = "";
		$dist_id = $this->input->get ( 'distid' );
		$this->load->model ( 'adv_model' );
		$areas = $this->adv_model->getArea ( $dist_id );
		$area_list .= '<a class="dropdown-toggle btn" data-toggle="dropdown" href="#" id="btn_area" >Select Area</a>';
		$area_list .= "<ul id='area' class='dropdown-menu' role='menu' aria-labelledby='dropdownSubMenu'>";
		foreach ( $areas as $area ) {
			$area_list .= "<li><a tabindex='-1' href='" . $area ['area_id'] . "' class='sel_area'>" . $area ['area_name'] . "</a></li>";
		
		}
		$area_list .= "</ul>";
		echo $area_list;
	}
	
	/*
	 * public function load_categories() { $this->load->model('adv_model');
	 * $cats=$this->adv_model->getCategories(); $disp="<table>"; $count=0;
	 * $disp.="<tr>"; foreach($cats as $cat) { $count++; if(($count-1)%5==0) {
	 * $disp.="</tr>"; $disp.="<tr>"; } $disp.="<td
	 * style='vertical-align:top'>"; $disp.="<dl>";
	 * $disp.="<dt><i><b>".$cat->cat_name."</b></i></dt>";
	 * $sub_cats=$this->adv_model->getSubCategories($cat->cat_id);
	 * foreach($sub_cats as $sub) { $disp.="<dd><a
	 * href='".$sub['sub_cat_name']."'>".$sub['sub_cat_name']."</a></dd>"; }
	 * $disp.="</dl>"; $disp.="</td>"; } $disp.="</tr>"; $disp.="</table>"; echo
	 * $disp; }
	 */
	public function test_ajax() {
		echo "test";
	}

}