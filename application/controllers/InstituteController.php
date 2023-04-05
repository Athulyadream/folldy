<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InstituteController extends CI_Controller{
	function __construct(){
        parent::__construct();
        if(!$this->session->userdata('admin_id')){
            redirect(base_url());
       	}
		date_default_timezone_set('Asia/Kolkata');
		$this->load->model('InstituteModel');
		$this->load->model('AdminModel');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
    }
    public function institute_filter(){
		$filter = array(
						'name' => $this->input->post('filter_name') ? $this->input->post('filter_name') : '',
						'email' => $this->input->post('filter_email') ? $this->input->post('filter_email') : '',
						'phone' => $this->input->post('filter_phone') ? $this->input->post('filter_phone') : '',
						'status' => $this->input->post('filter_status') ? $this->input->post('filter_status') : '',
						
					);
		$this->session->set_userdata('institute_filter',$filter);
		redirect(base_url('institutes'));
	}
    public function institutes(){

    	$filter = $this->session->userdata('institute_filter');
    	$filter_data = array(
					'name'=> isset($filter['name'])? $filter['name']:'',
					'email'=> isset($filter['email'])? $filter['email']:'',
					'phone'=> isset($filter['phone'])? $filter['phone']:'',
					'status'=> isset($filter['status'])? $filter['status']:'',
			);

    	$this->load->library('pagination');
    	$config['base_url'] = base_url('institutes');
		$config['total_rows'] = $this->InstituteModel->count_institutes($filter_data);
		$config['per_page'] = $limit = 10;
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li>';
		$config['cur_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$links = $this->pagination->create_links();
		$offset = $this->uri->segment(2);
		$body_data = array(
							'institutes'=>$this->InstituteModel->list_institutes($limit,$offset,$filter_data),
							'course'=>$this->InstituteModel->list_course_all(),
							'roles'=>$this->AdminModel->list_roles(),
							'links'=>$links,
							'offset'=>$offset,
							'filter_data' => $filter_data,
						);
		$this->load->view('backend/header');
		$this->load->view('backend/institutes',$body_data);
		$this->load->view('backend/footer');
    }
    public function add_institute(){
    	$course = $this->input->post('course');
		$data = array(
					'institute_name'=>$this->input->post('institute_name'),
					'name_abbreviation'=>$this->input->post('abbreviations'),
					'institute_phone'=>$this->input->post('institute_phone'),
					'institute_email'=>$this->input->post('institute_email'),
					'institute_status'=>1,
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		$institute_id = $this->InstituteModel->add_data($data,'institutes');
		if($institute_id){
			if(!empty($course)){
	    		foreach ($course as $value) {
	    			if(!empty($value)){
	    				$insert_course = array(
	    						'institute_id' => $institute_id,
	    						'course_id' => $value
	    						);
	    				$this->InstituteModel->add_data($insert_course,'ins_course');
	    			}
	    		}
	    	}

			// if(!empty($course)){
	  //   		foreach($course as $row){
	  //   			$c_data = $this->InstituteModel->course_details($row);
	  //   			$subjects = $this->InstituteModel->course_subjct($row);
	  //   			$couse_insert = array(
	  //   				'institute_id'  => $institute_id,
	  //   				'course_id' => $c_data['data_id'],
	  //   				'course_name' => $c_data['data_name'],
	  //   				'type' => 'admin',
	  //   				'created_on'=>time(),
			// 			'updated_on'=>time(),
	  //   				'added_by' => $this->session->userdata('admin_id')
	  //   				);

	  //   			$c_id = $this->InstituteModel->add_data($couse_insert,'institute_course');
	  //   			if(!empty($subjects)){
	  //   				foreach($subjects as $sub){
	  //   					$sub_insert = array(
			// 	    				'institute_id'  => $institute_id,
			// 	    				'course_id' => $c_id,
			// 	    				'subject_id' => $sub['data_id'],
			// 	    				'type' => 'admin',
			// 	    				'created_on'=>time(),
			// 						'updated_on'=>time(),
			// 	    				'added_by' => $this->session->userdata('admin_id')
			// 	    			);
	  //   					$this->InstituteModel->add_data($sub_insert,'institute_subject');
	  //   				}
	  //   			}
	  //   		}
	  //   	}
			$this->session->set_flashdata('ins_created',1);
		}
		else{
			$this->session->set_flashdata('ins_created',2);
		}
		redirect(base_url('institutes'));
	}
	public function edit_institute(){
		
		//$course = $this->input->post('edit_ins_course');
		$course = $this->input->post('edit_course');

		$status = $this->input->post('edit_ins_status') ? 1 : 2;
		$id = $this->input->post('ins_id');
		$data = array(
					'institute_name'=>$this->input->post('edit_ins_name'),
					'name_abbreviation'=>$this->input->post('edit_abbreviations'),
					'institute_phone'=>$this->input->post('edit_ins_phone'),
					'institute_email'=>$this->input->post('edit_ins_email'),
					'institute_status'=>$status,
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->InstituteModel->edit_institute($data,$id)){
			$this->InstituteModel->institute_course_delete($id);
			//new bhagya
	    	if(!empty($course)){
	    		foreach ($course as $value) {
	    			if(!empty($value)){
	    				$insert_course = array(
	    						'institute_id' => $id,
	    						'course_id' => $value
	    						);
	    				$this->InstituteModel->add_data($insert_course,'ins_course');
	    			}
	    		}
	    	}
			// $inscourse = $this->InstituteModel->get_institute_course($id);
			// foreach ($inscourse as $key1 => $value1) {
			// 	$check = 0;
			// 	foreach ($course as $row1){
			// 		if($value1['course_id'] == $row1 ){
			// 			$check = 1;
			// 			break;
			// 		}
			// 	}
			// 	if($check == 0){
			// 		$this->InstituteModel->delete_institute_course($value1['id']);
			// 	}
				
			// }
			// foreach ($course as $row) {
			// 	$flag = 0;
			// 	foreach ($inscourse as $key => $value) {
			// 		if($row == $value['course_id']){
			// 			$flag = 1;
			// 			break;
			// 		}
			// 	}
			// 	if($flag == 0){
			// 		$c_data = $this->InstituteModel->course_details($row);
	  //   			$subjects = $this->InstituteModel->course_subjct($row);
	  //   			$couse_insert = array(
	  //   				'institute_id'  => $id,
	  //   				'course_id' => $c_data['data_id'],
	  //   				'course_name' => $c_data['data_name'],
	  //   				'type' => 'admin',
	  //   				'created_on'=>time(),
			// 			'updated_on'=>time(),
	  //   				'added_by' => $this->session->userdata('admin_id')
	  //   				);

	  //   			$c_id = $this->InstituteModel->add_data($couse_insert,'institute_course');
	  //   			if(!empty($subjects)){
	  //   				foreach($subjects as $sub){
	  //   					$sub_insert = array(
			// 	    				'institute_id'  => $id,
			// 	    				'course_id' => $c_id,
			// 	    				'subject_id' => $sub['data_id'],
			// 	    				'type' => 'admin',
			// 	    				'created_on'=>time(),
			// 						'updated_on'=>time(),
			// 	    				'added_by' => $this->session->userdata('admin_id')
			// 	    			);
	  //   					$this->InstituteModel->add_data($sub_insert,'institute_subject');
	  //   				}
	  //   			}
			// 	}
			// }
			

			//foreach($course as)

			$this->session->set_flashdata('ins_updated',1);
		}
		else{
			$this->session->set_flashdata('ins_updated',2);
		}
		redirect(base_url('institutes'));
	}
	public function user_filter($id){
		$filter = array(
						'name' => $this->input->post('filter_name') ? $this->input->post('filter_name') : '',
						'email' => $this->input->post('filter_email') ? $this->input->post('filter_email') : '',
						'phone' => $this->input->post('filter_phone') ? $this->input->post('filter_phone') : '',
						'status' => $this->input->post('filter_status') ? $this->input->post('filter_status') : '',
						
					);
		$this->session->set_userdata('institute_user_filter',$filter);
		redirect(base_url('institute-users'));
	}
	public function institutes_users(){
		//echo $this->input->get('id');exit();
		$filter = $this->session->userdata('institute_user_filter');
    	$filter_data = array(
					'name'=> isset($filter['name'])? $filter['name']:'',
					'email'=> isset($filter['email'])? $filter['email']:'',
					'phone'=> isset($filter['phone'])? $filter['phone']:'',
					'status'=> isset($filter['status'])? $filter['status']:'',
			);

		$institute = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('institute_id');
		if(!$institute) redirect(base_url('institutes'));
		$this->session->set_userdata('institute_id',$institute);

		$this->load->library('pagination');
    	$config['base_url'] = base_url('institutes-users');
		$config['total_rows'] = $this->InstituteModel->count_institute_user($institute);
		$config['per_page'] = $limit = 10;
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li>';
		$config['cur_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$links = $this->pagination->create_links();
		$offset = $this->uri->segment(3);
		$body_data = array(
							'users'=>$this->InstituteModel->list_institute_users($institute,$limit,$offset),
							'roles'=>$this->AdminModel->list_roles(),
							'links'=>$links,
							'offset'=>$offset,
							'institute' => $this->InstituteModel->get_institute_by_id($institute),
							'filter_data' => $filter_data,
						);
		$this->load->view('backend/header');
		$this->load->view('backend/institute_users',$body_data);
		$this->load->view('backend/footer');
	}
	public function add_institute_user(){
		$data = array(
					'role_id'=>4,
					'name'=>$this->input->post('name'),
					'username'=>$this->input->post('username'),
					'phone'=>$this->input->post('phone'),
					'email'=>$this->input->post('email'),
					'password'=>password_hash($this->input->post('password'),PASSWORD_DEFAULT),
					'institute_id' => $this->input->post('institute_id'),
					'status'=>1,
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->InstituteModel->add_data($data,'institute_users')){
			$this->session->set_flashdata('admin_created',1);
		}
		else{
			$this->session->set_flashdata('admin_created',2);
		}
		redirect(base_url('institute-users'));
	}
	public function edit_institute_user(){
		$status = $this->input->post('edit_status') ? 1 : 2;
		$institute = $this->input->post('institute_id');
		$id = $this->input->post('ins_id');
		$data = array(
					//'role_id'=>$this->input->post('edit_admin_role'),
					'name'=>$this->input->post('edit_name'),
					'username'=>$this->input->post('edit_username'),
					'phone'=>$this->input->post('edit_phone'),
					'email'=>$this->input->post('edit_email'),
					'status'=>$status,
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
	
		if($this->InstituteModel->edit_institute_user($data,$id)){
			$this->session->set_flashdata('admin_updated',1);
		}
		else{
			$this->session->set_flashdata('admin_updated',2);
		}
		redirect(base_url('institute-users'));
	}
	public function video(){
		$this->load->library('pagination');

		$config['base_url'] = base_url('video');
		$config['total_rows'] = $this->InstituteModel->count_video();
		$config['per_page'] = $limit = 10;
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li>';
		$config['cur_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$links = $this->pagination->create_links();
		$offset = $this->uri->segment(2);
		$body_data = array(
							'news'=>$this->InstituteModel->list_video($limit,$offset),
							'links'=>$links,
							'offset'=>$offset
						);
		$this->load->view('backend/header');
		$this->load->view('backend/video',$body_data);
		$this->load->view('backend/footer');
	}
	public function add_video(){
         // print_r($this->input->post());exit();
        $file_tag = trim($this->input->post('file_tags'));
        $keywords = explode(';',$this->input->post('file_tags'));
        //print_r($keywords);
        
        if($this->input->post('type') == 1){
	        if(!empty($_FILES['video']['name']))
	        { 
	            //$config['upload_path'] = $this->customer; 
	            $config['upload_path'] = FCPATH . 'uploads/video';
	            $config['allowed_types'] = 'mov|mpeg|mp3|avi|mp4';
	            $config['max_size'] = '0'; // max_size in kb
	            //$config['file_name'] = $_FILES['document']['name'][$j];

	            $img_ext = explode('.', $_FILES['video']['name']);
	            //$img_upl_name = md5(time().rand(0, 100));

	            $img_upl_name = 'Video'.'_'.md5(time().rand(0, 100));
	            $config['file_name'] = $img_upl_name;

	            $this->load->library('upload',$config); 
	            $this->upload->initialize($config);

	            if($this->upload->do_upload('video')){
	                $uploadData = $this->upload->data();
	                $filename = $uploadData['file_name'];

	                
	            }
	            else{
	            	//echo "string";exit();
	                $filename="";
	            }
	        }

	        else{
	        	//echo "string22";exit();
	            $filename="";
	        }
	        if(!empty($filename)){
	        	if(!empty($_FILES['thumbnail']['name']))
		        { 
		            //$config['upload_path'] = $this->customer; 
		            $config['upload_path'] = FCPATH . 'uploads/thumbnail';
		            $config['allowed_types'] = 'png|jpeg|jpg';
		            $config['max_size'] = '0'; // max_size in kb
		            //$config['file_name'] = $_FILES['document']['name'][$j];

		            $img_ext = explode('.', $_FILES['thumbnail']['name']);
		            //$img_upl_name = md5(time().rand(0, 100));

		            $img_upl_name = 'img'.'_'.md5(time().rand(0, 100));
		            $config['file_name'] = $img_upl_name;

		            $this->load->library('upload',$config); 
		            $this->upload->initialize($config);

		            if($this->upload->do_upload('thumbnail')){
		                $uploadData = $this->upload->data();
		                $thumb_img = $uploadData['file_name'];
		            }
		            else{
		            	//echo "string";exit();
		                $thumb_img="";
		            }
		        }

	       		$data = array(
					'type' => $this->input->post('type'),
					'video_title' => $this->input->post('title'),
					'video_link' => $filename,
					'video_status' => 1,
					'thumb_nail' => $thumb_img,
					'updated_by'=>$this->session->userdata('admin_id'),
					
				);
				$insert = $this->InstituteModel->add_data($data,'video');
				if($insert){
					foreach($keywords as $value){
						$data1 = array(
								'file_tag' => $value,
								'file_id' => $insert
							);
						$this->InstituteModel->add_data($data1,'file_tag');
					}
					$this->session->set_flashdata('admin_created',1);
				}
				else{
					$this->session->set_flashdata('admin_created',2);
				}
	       	}

	    }
	    else{
	    	if(!empty($_FILES['video']['name']))
	        { 

	            //$config['upload_path'] = $this->customer; 
	            $config['upload_path'] = FCPATH . 'uploads/pdf';
	            $config['allowed_types'] = 'pdf|doc';
	            $config['max_size'] = '0'; // max_size in kb
	            //$config['file_name'] = $_FILES['document']['name'][$j];

	            $img_ext = explode('.', $_FILES['video']['name']);
	            //$img_upl_name = md5(time().rand(0, 100));

	            $img_upl_name = 'pdf'.'_'.md5(time().rand(0, 100));
	            $config['file_name'] = $img_upl_name;

	            $this->load->library('upload',$config); 
	            $this->upload->initialize($config);

	            if($this->upload->do_upload('video')){
	                $uploadData = $this->upload->data();
	                $filename = $uploadData['file_name'];

	                
	            }
	            else{
	            	//echo "string";exit();
	                $filename="";
	            }
	        }

	        else{
	        	//echo "string22";exit();
	            $filename="";
	        }
	        if(!empty($filename)){
	       		$data = array(
					'type' => $this->input->post('type'),
					'video_title' => $this->input->post('title'),
					'video_link' => $filename,
					'video_status' => 1,
					'updated_by'=>$this->session->userdata('admin_id'),
					
				);
				$insert = $this->InstituteModel->add_data($data,'video');
				if($insert){
					foreach($keywords as $value){
						$data1 = array(
								'file_tag' => $value,
								'file_id' => $insert
							);
						$this->InstituteModel->add_data($data1,'file_tag');
					}
					$this->session->set_flashdata('admin_created',1);
				}
				else{
					$this->session->set_flashdata('admin_created',2);
				}
	       	}
	       	else{
	       		$this->session->set_flashdata('image_upload',2);
	       	}
	    }   
		
		redirect(base_url('video'));
       	
	}
	public function delete_video($id){
		if($this->InstituteModel->delete_video($id)){
			$this->session->set_flashdata('admin_updated',1);
		}
		else{
			$this->session->set_flashdata('admin_updated',2);
		}
		if($this->session->userdata('chapter_id')){
			redirect(base_url('upload-files'));
		}
		else{
			redirect(base_url('video'));
		}
		
	}

	public function delete_image($id){
		if($this->InstituteModel->delete_image($id)){
			$this->session->set_flashdata('admin_updated',1);
		}
		else{
			$this->session->set_flashdata('admin_updated',2);
		}
		if($this->session->userdata('chapter_id')){
			redirect(base_url('upload-files'));
		}
		else{
			redirect(base_url('video'));
		}
		
	}

	public function upload_files(){

		$id = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('chapter_id');
		if(!$id) redirect(base_url('chapter'));
		$this->session->set_userdata('chapter_id',$id);

		$this->load->library('pagination');

		$config['base_url'] = base_url('upload-files');
		$config['total_rows'] = $this->InstituteModel->count_upload_files($id);
		$config['per_page'] = $limit = 10;
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li>';
		$config['cur_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$links = $this->pagination->create_links();
		$offset = $this->uri->segment(2);
		$body_data = array(
							'news'=>$this->InstituteModel->list_upload_files($limit,$offset,$id),
							'images' => $this->InstituteModel->list_chapter_image($id),
							'links'=>$links,
							'offset'=>$offset
						);
		$this->load->view('backend/header');
		$this->load->view('backend/upload_file',$body_data);
		$this->load->view('backend/footer');
	}
	public function add_upload_files(){
         // print_r($this->input->post());exit();
        $file_tag = trim($this->input->post('file_tags'));
        $keywords = explode(';',$this->input->post('file_tags'));
        //print_r($keywords);
        
        if($this->input->post('type') == 1){
	        if(!empty($_FILES['video']['name']))
	        { 

	            //$config['upload_path'] = $this->customer; 
	            $config['upload_path'] = FCPATH . 'uploads/video';
	            $config['allowed_types'] = 'mov|mpeg|mp3|avi|mp4';
	            $config['max_size'] = '0'; // max_size in kb
	            //$config['file_name'] = $_FILES['document']['name'][$j];

	            $img_ext = explode('.', $_FILES['video']['name']);
	            //$img_upl_name = md5(time().rand(0, 100));

	            $img_upl_name = 'Video'.'_'.md5(time().rand(0, 100));
	            $config['file_name'] = $img_upl_name;

	            $this->load->library('upload',$config); 
	            $this->upload->initialize($config);

	            if($this->upload->do_upload('video')){
	                $uploadData = $this->upload->data();
	                $filename = $uploadData['file_name'];

	                
	            }
	            else{
	            	//echo "string";exit();
	                $filename="";
	            }
	        }

	        else{
	        	//echo "string22";exit();
	            $filename="";
	        }
	        if(!empty($filename)){
	        	if(!empty($_FILES['thumbnail']['name']))
		        { 
		            //$config['upload_path'] = $this->customer; 
		            $config['upload_path'] = FCPATH . 'uploads/thumbnail';
		            $config['allowed_types'] = 'png|jpeg|jpg';
		            $config['max_size'] = '0'; // max_size in kb
		            //$config['file_name'] = $_FILES['document']['name'][$j];

		            $img_ext = explode('.', $_FILES['thumbnail']['name']);
		            //$img_upl_name = md5(time().rand(0, 100));

		            $img_upl_name = 'img'.'_'.md5(time().rand(0, 100));
		            $config['file_name'] = $img_upl_name;

		            $this->load->library('upload',$config); 
		            $this->upload->initialize($config);

		            if($this->upload->do_upload('thumbnail')){
		                $uploadData = $this->upload->data();
		                $thumb_img = $uploadData['file_name'];
		            }
		            else{
		            	//echo "string";exit();
		                $thumb_img="";
		            }
		        }

	       		$data = array(
					'type' => $this->input->post('type'),
					'video_title' => $this->input->post('title'),
					'video_link' => $filename,
					'video_status' => 1,
					'thumb_nail' => $thumb_img,
					'chapter_id' => $this->session->userdata('chapter_id'),
					'updated_by'=>$this->session->userdata('admin_id'),
					
				);
				$insert = $this->InstituteModel->add_data($data,'video');
				if($insert){
					foreach($keywords as $value){
						$data1 = array(
								'file_tag' => $value,
								'file_id' => $insert
							);
						$this->InstituteModel->add_data($data1,'file_tag');
					}
					$this->session->set_flashdata('admin_created',1);
				}
				else{
					$this->session->set_flashdata('admin_created',2);
				}
	       	}
	    }
	    elseif($this->input->post('type') == 2){
	    	if(!empty($_FILES['video']['name']))
	        { 

	            //$config['upload_path'] = $this->customer; 
	            $config['upload_path'] = FCPATH . 'uploads/pdf';
	            $config['allowed_types'] = 'pdf|doc';
	            $config['max_size'] = '0'; // max_size in kb
	            //$config['file_name'] = $_FILES['document']['name'][$j];

	            $img_ext = explode('.', $_FILES['video']['name']);
	            //$img_upl_name = md5(time().rand(0, 100));

	            $img_upl_name = 'pdf'.'_'.md5(time().rand(0, 100));
	            $config['file_name'] = $img_upl_name;

	            $this->load->library('upload',$config); 
	            $this->upload->initialize($config);

	            if($this->upload->do_upload('video')){
	                $uploadData = $this->upload->data();
	                $filename = $uploadData['file_name'];

	                
	            }
	            else{
	            	//echo "string";exit();
	                $filename="";
	            }
	        }

	        else{
	        	//echo "string22";exit();
	            $filename="";
	        }
	        if(!empty($filename)){
	       		$data = array(
					'type' => $this->input->post('type'),
					'video_title' => $this->input->post('title'),
					'video_link' => $filename,
					'video_status' => 1,
					'chapter_id' => $this->session->userdata('chapter_id'),
					'updated_by'=>$this->session->userdata('admin_id'),
					
				);
				$insert = $this->InstituteModel->add_data($data,'video');
				if($insert){
					foreach($keywords as $value){
						$data1 = array(
								'file_tag' => $value,
								'file_id' => $insert
							);
						$this->InstituteModel->add_data($data1,'file_tag');
					}
					$this->session->set_flashdata('admin_created',1);
				}
				else{
					$this->session->set_flashdata('admin_created',2);
				}
	       	}
	    }

	    else{
	    	//$file_tag = trim($this->input->post('image_tags'));
        	//$keywords1 = explode(';',$this->input->post('image_tags'));

	    	if(!empty($_FILES['video']['name']))
	        { 

	            //$config['upload_path'] = $this->customer; 
	            $config['upload_path'] = FCPATH . 'uploads/chapter';
	            $config['allowed_types'] = 'jpg|jpeg|png';
	            $config['max_size'] = '0'; // max_size in kb
	            //$config['file_name'] = $_FILES['document']['name'][$j];

	            $img_ext = explode('.', $_FILES['video']['name']);
	            //$img_upl_name = md5(time().rand(0, 100));

	            $img_upl_name = 'image'.'_'.md5(time().rand(0, 100));
	            $config['file_name'] = $img_upl_name;

	            $this->load->library('upload',$config); 
	            $this->upload->initialize($config);

	            if($this->upload->do_upload('video')){
	                $uploadData = $this->upload->data();
	                $filename = $uploadData['file_name'];

	                
	            }
	            else{
	            	//echo "string";exit();
	                $filename="";
	            }
	        }

	        else{
	        	//echo "string22";exit();
	            $filename="";
	        }
	        if(!empty($filename)){
	       		$data = array(
	                			'chapter_id' => $this->session->userdata('chapter_id'),
	                			'chapter_image' => $filename,
	                			'image_status' => 1,
	                			'image_title' => $this->input->post('title')
	                			);
				$insert = $this->InstituteModel->add_data($data,'chapter_image');
				if($insert){
					foreach($keywords as $value){
						$data1 = array(
								'tag' => $value,
								'image_id' => $insert
							);
						$this->InstituteModel->add_data($data1,'image_tags');
					}
					$this->session->set_flashdata('admin_created',1);
				}
				else{
					$this->session->set_flashdata('admin_created',2);
				}
	       	}
	       	else{
	       		$this->session->set_flashdata('image_upload',2);
	       	}

	    	///
	    	
       	  
		}
		redirect(base_url('upload-files'));
	    
       	
	}
	public function exercise(){

		$id = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('exercise_id');
		if(!$id) redirect(base_url('exercise-bank'));
		$this->session->set_userdata('exercise_id',$id);
		
		$this->load->library('pagination');

		$config['base_url'] = base_url('exercise');
		$config['total_rows'] = $this->InstituteModel->count_exercise($id);
		$config['per_page'] = $limit = 10;
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li>';
		$config['cur_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$links = $this->pagination->create_links();
		$offset = $this->uri->segment(2);
		$body_data = array(
							'exercise'=>$this->InstituteModel->list_exercise($limit,$offset,$id),
							'links'=>$links,
							'offset'=>$offset
						);
		$this->load->view('backend/header');
		$this->load->view('backend/exercise',$body_data);
		$this->load->view('backend/footer');
	}
	public function add_exercise(){
		

		$data = array(
					
					'exercise_question'=>$this->input->post('question'),
					'exercise_answer1'=> $this->input->post('option1'),
					'exercise_answer2' => $this->input->post('option2'),
					'exercise_answer3' => $this->input->post('option3'),
					'exercise_answer4' => $this->input->post('option4'),
					'exercise_correct_answer' => $this->input->post('correct_answer') ,
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id'),
					'exercise_status' => 1,
					'exercise_title' => $this->session->userdata('exercise_id'),
				);
		$insert =$this->InstituteModel->add_data($data,'exercise');
		if($insert){
			
			$this->session->set_flashdata('paper_created',1);
		}
		else $this->session->set_flashdata('paper_created',2);
		redirect(base_url('exercise'));
	}
	public function edit_exercise(){
		//print_r($this->input->post());exit();

        $status = $this->input->post('edit_status') ? 1 : 2;
		$id = $this->input->post('edit_id');
		
        $data = array(
				
				'exercise_question'=>$this->input->post('edit_question'),
				'exercise_answer1'=> $this->input->post('edit_option1'),
				'exercise_answer2' => $this->input->post('edit_option2'),
				'exercise_answer3' => $this->input->post('edit_option3'),
				'exercise_answer4' => $this->input->post('edit_option4'),
				'exercise_correct_answer' => $this->input->post('edit_correct_answer') ,
				
				'updated_on'=>time(),
				'updated_by'=>$this->session->userdata('admin_id'),
				'exercise_status' => $status,
				
				
			);
        
		if($this->InstituteModel->edit_exercise($data,$id)){
			$this->session->set_flashdata('paper_updated',1);
		}
		else{
			$this->session->set_flashdata('paper_updated',2);
		}
		redirect(base_url('exercise'));
	}
	public function exercise_bank(){
		$this->session->unset_userdata('chapter_id');
		$this->load->library('pagination');

		$config['base_url'] = base_url('exercise-bank');
		$config['total_rows'] = $this->InstituteModel->count_exercise_bank();
		$config['per_page'] = $limit = 10;
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li>';
		$config['cur_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$links = $this->pagination->create_links();
		$offset = $this->uri->segment(2);
		$body_data = array(
							'exercise'=>$this->InstituteModel->list_exercise_bank($limit,$offset),
							'links'=>$links,
							'offset'=>$offset
						);
		$this->load->view('backend/header');
		$this->load->view('backend/exercise_bank',$body_data);
		$this->load->view('backend/footer');
	}

	public function add_exercise_bank(){
		if($this->session->userdata('chapter_id')){
			$chapter = $this->session->userdata('chapter_id');
		}
		else{
			$chapter = 0;
		}
		
		$file_tag = trim($this->input->post('file_tags'));
        $keywords = explode(';',$this->input->post('file_tags'));

		$data = array(
					'ex_topic_title'=>trim($this->input->post('name')),
					'ex_topic_status'=>1,
					'created_on'=>time(),
					'updated_on'=>time(),
					'chapter_id' => $chapter,
					'updated_by'=>$this->session->userdata('admin_id')
				);
		$insert = $this->AdminModel->add_data($data,'exercise_topic');
		if($insert){
			foreach($keywords as $value){
				$data1 = array(
						'exercise_tag' => $value,
						'exercise_id' => $insert
					);
				$this->InstituteModel->add_data($data1,'exercise_tag');
			}
			$this->session->set_flashdata('course_created',1);
		}
		else $this->session->set_flashdata('course_created',2);
		if($this->session->userdata('chapter_id')){
			redirect(base_url('course-exercise'));
		}
		else{
			redirect(base_url('exercise-bank'));
		}
	}

	public function edit_exercise_bank(){
		$file_tag = trim($this->input->post('edit_file_tags'));
        $keywords = explode(',',$this->input->post('edit_file_tags'));
        // print_r($keywords);exit();
		$id = $this->input->post('edit_id');
		$data = array(
					'ex_topic_title'=>trim($this->input->post('edit_name')),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->InstituteModel->edit_exercise_bank($data,$id)){
			$this->InstituteModel->delete_exercise_tag($id);
			foreach($keywords as $value){
				$data1 = array(
						'exercise_tag' => $value,
						'exercise_id' => $id
					);
				$this->InstituteModel->add_data($data1,'exercise_tag');
			}

			$this->session->set_flashdata('course_updated',1);
		}
		else $this->session->set_flashdata('course_updated',2);
		if($this->session->userdata('chapter_id')){
			redirect(base_url('course-exercise'));
		}
		else{
			redirect(base_url('exercise-bank'));
		}
	}

	public function course_exercise(){

		$id = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('chapter_id');
		if(!$id) redirect(base_url('chapter'));
		$this->session->set_userdata('chapter_id',$id);
		
		$this->load->library('pagination');

		$config['base_url'] = base_url('exercise-bank');
		$config['total_rows'] = $this->InstituteModel->count_exercise_bank($id);
		$config['per_page'] = $limit = 10;
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li>';
		$config['cur_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$links = $this->pagination->create_links();
		$offset = $this->uri->segment(2);
		$body_data = array(
							'exercise'=>$this->InstituteModel->list_exercise_bank($limit,$offset,$id),
							'links'=>$links,
							'offset'=>$offset
						);
		$this->load->view('backend/header');
		$this->load->view('backend/exercise_bank',$body_data);
		$this->load->view('backend/footer');
	}

	// public function add_course_exercise(){
	// 	$file_tag = trim($this->input->post('file_tags'));
 //        $keywords = explode(';',$this->input->post('file_tags'));

	// 	$data = array(
	// 				'ex_topic_title'=>trim($this->input->post('name')),
	// 				'ex_topic_status'=>1,
	// 				'created_on'=>time(),
	// 				'updated_on'=>time(),
	// 				'updated_by'=>$this->session->userdata('admin_id')
	// 			);
	// 	$insert = $this->AdminModel->add_data($data,'exercise_topic');
	// 	if($insert){
	// 		foreach($keywords as $value){
	// 			$data1 = array(
	// 					'exercise_tag' => $value,
	// 					'exercise_id' => $insert
	// 				);
	// 			$this->InstituteModel->add_data($data1,'exercise_tag');
	// 		}
	// 		$this->session->set_flashdata('course_created',1);
	// 	}
	// 	else $this->session->set_flashdata('course_created',2);
	// 	redirect(base_url('exercise-bank'));
	// }

	// public function edit_course_exercise(){
	// 	$id = $this->input->post('edit_id');
	// 	$data = array(
	// 				'ex_topic_title'=>trim($this->input->post('edit_name')),
	// 				'updated_on'=>time(),
	// 				'updated_by'=>$this->session->userdata('admin_id')
	// 			);
	// 	if($this->InstituteModel->edit_exercise_bank($data,$id)){
	// 		$this->session->set_flashdata('course_updated',1);
	// 	}
	// 	else $this->session->set_flashdata('course_updated',2);
	// 	redirect(base_url('exercise-bank'));
	// }


	public function news_filter(){
		$date = str_replace('/', '-', $this->input->post('filter_date'));
        $date1 = date('Y-m-d', strtotime($date));
		$filter = array(
					'name' => $this->input->post('filter_name') ? $this->input->post('filter_name') : '',
					'date' => $this->input->post('filter_date') ? $date1 : '',
					
					'status' => $this->input->post('filter_status') ? $this->input->post('filter_status') : '',
						
				);
		$this->session->set_userdata('news_filter',$filter);
		redirect(base_url('admin-news'));
	}
	public function news(){

		$filter = $this->session->userdata('news_filter');
		$filter_data = array(
					'name'=> isset($filter['name'])? $filter['name']:'',
					'date'=> isset($filter['date'])? $filter['date']:'',
					'status'=> isset($filter['status'])? $filter['status']:'',
			);

		$this->load->library('pagination');

		$config['base_url'] = base_url('admin-news');
		$config['total_rows'] = $this->InstituteModel->count_admin_news($filter_data);
		$config['per_page'] = $limit = 10;
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li>';
		$config['cur_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$links = $this->pagination->create_links();
		$offset = $this->uri->segment(2);
		$body_data = array(
							'news'=>$this->InstituteModel->list_admin_news($limit,$offset,$filter_data),
							'links'=>$links,
							'offset'=>$offset,
							'filter_data' => $filter_data,
						);
		$this->load->view('backend/header');
		$this->load->view('backend/news',$body_data);
		$this->load->view('backend/footer');
	}
	public function add_news(){
		$date = str_replace('/', '-', $this->input->post('date'));
        $date1 = date('Y-m-d', strtotime($date));
			
		 if($_FILES['image']['size'] != 0){
		 	 $image='';
            $config['upload_path'] = FCPATH . 'uploads/news';;
                    //echo $config['upload_path'];exit;
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = '2048';
            $config['file_name'] = md5(time().rand(0, 100));

            $this->load->library('upload',$config);       
            $this->upload->initialize($config);
            if ($this->upload->do_upload('image'))
            {       
                $uploaded_data = $this->upload->data();
                $image = $uploaded_data['file_name'];

                $data = array(
					
					'news_heading' => $this->input->post('heading'),
					'news_description' => $this->input->post('description'),
					'news_date' => $date1,
					'news_image' => $image,
					'news_status'=>1,
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id'),
					'institute_id' => 0,
				);
					if($this->InstituteModel->add_data($data,'news')){
						$this->session->set_flashdata('admin_created',1);
					}
					else{
						$this->session->set_flashdata('admin_created',2);
					}
            }else{
            	
                   $this->session->set_flashdata('image_upload',2);     
            }
        }
       

        //echo $this->input->post('end_time');exit();
		
		redirect(base_url('admin-news'));
	}
	public function edit_news(){
		//print_r($this->input->post());exit();
		$date = str_replace('/', '-', $this->input->post('edit_date'));
        $date1 = date('Y-m-d', strtotime($date));

        $status = $this->input->post('edit_status') ? 1 : 2;
		$id = $this->input->post('edit_id');
		$image ='';	
		 if($_FILES['image']['size'] != 0){
		 	 $image='';
            $config['upload_path'] = FCPATH . 'uploads/news';
                    //echo $config['upload_path'];exit;
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = '2048';
            $config['file_name'] = md5(time().rand(0, 100));

            $this->load->library('upload',$config);       
            $this->upload->initialize($config);
            if ($this->upload->do_upload('image'))
            {       
                $uploaded_data = $this->upload->data();
                $image = $uploaded_data['file_name'];

                
            }
        }
        $data = array(
					
				'news_heading' => $this->input->post('edit_heading'),
				'news_description' => $this->input->post('edit_description'),
				'news_date' => $date1,
				'news_status'=>$status,
				'updated_on'=>time(),
				'updated_by'=>$this->session->userdata('admin_id'),
				
			);
        if(!empty($image)){
        	$data['news_image'] = $image;
        }
		if($this->InstituteModel->edit_news($data,$id)){
			$this->session->set_flashdata('admin_updated',1);
		}
		else{
			$this->session->set_flashdata('admin_updated',2);
		}
		redirect(base_url('admin-news'));
	}
	public function exercise_view($id){
		// $topicid = $this->PresentationModel->get_topic_main_parent($id);
		// if($topicid == 0){
		// 	$tid = $id;
		// }else{
		// 	$tid = $topicid; 
		// }
		$tid = $id;
		$body_data = array(
							'exercise_topic'=>$this->InstituteModel->list_exercise_topic($tid),
							'topics'=>$this->InstituteModel->get_topics($tid),
							'topic_id'=>$tid
						);
		// $this->load->view('backend/header1');
		$this->load->view('backend/exercise_view',$body_data);
		// $this->load->view('backend/footer1');
	}

}