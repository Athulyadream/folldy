<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InstituteController extends CI_Controller{
	function __construct(){
        parent::__construct();
       
		date_default_timezone_set('Asia/Kolkata');
		if(!$this->session->userdata('ins_user_id')){
            redirect(base_url('institute'));
       	}
		$this->load->model('InstituteModel');
		$this->load->model('AdminModel');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
    }
    
	public function dashboard(){
		$body_data = array(
					'institute'=>$this->InstituteModel->institute_details(),
					//'course'=>$this->InstituteModel->batch_course(),
					'course'=>$this->InstituteModel->institute_course_list(),
					'dashboard_news'=> $this->InstituteModel->dashboard_news(),
					'teachers' => $this->InstituteModel->dashboard_teacers(),
					'student' => $this->InstituteModel->dashboard_students(),
					'event' => $this->InstituteModel->dashboard_events(),
					'time_table' => $this->InstituteModel->dashboard_time_table(),
					// 'weekdays'=>$this->InstituteModel->get_batch_week_days($id),
					// 'video'=>$this->InstituteModel->get_institute_video(),
					
				);
		$this->load->view('institute/home_header',$body_data);
		$this->load->view('institute/index',$body_data);
		$this->load->view('institute/home_footer');
	}
	public function teacher_filter(){

		$filter = array(
					'name' => $this->input->post('filter_name') ? $this->input->post('filter_name') : '',
					'email' => $this->input->post('filter_email') ? $this->input->post('filter_email') : '',
					'phone' => $this->input->post('filter_phone') ? $this->input->post('filter_phone') : '',
					'username' => $this->input->post('filter_username') ? $this->input->post('filter_username') : '',
					'status' => $this->input->post('filter_status') ? $this->input->post('filter_status') : '',
						
				);
		$this->session->set_userdata('teacher_filter',$filter);
		redirect(base_url('teachers'));
	}
	public function teachers(){
		$filter = $this->session->userdata('teacher_filter');
		$filter_data = array(
					'name'=> isset($filter['name'])? $filter['name']:'',
					'email'=> isset($filter['email'])? $filter['email']:'',
					'phone'=> isset($filter['phone'])? $filter['phone']:'',
					'username'=> isset($filter['username'])? $filter['username']:'',
					'status'=> isset($filter['status'])? $filter['status']:'',
			);
		$this->load->library('pagination');

		$config['base_url'] = base_url('teachers');
		$config['total_rows'] = $this->InstituteModel->count_teachers($filter_data);
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
							'teachers'=>$this->InstituteModel->list_teachers($limit,$offset,$filter_data),
							'subject'=>$this->InstituteModel->list_subjects(),
							'links'=>$links,
							'offset'=>$offset,
							'filter_data' => $filter_data,
						);
		$this->load->view('institute/header');
		$this->load->view('institute/teachers',$body_data);
		$this->load->view('institute/footer');
	}
	public function add_teacher(){
		$subjects = $this->input->post('subject');
		// print_r($subjects);exit();
		$data = array(
					'role_id'=>2,
					'teacher_name'=>$this->input->post('teacher_name'),
					// 'teacher_username'=>$this->input->post('teacher_username'),
					'teacher_phone'=>$this->input->post('teacher_phone'),
					'teacher_email'=>$this->input->post('teacher_email'),
					'teacher_password'=>password_hash($this->input->post('teacher_password'),PASSWORD_DEFAULT),
					'teacher_status'=>1,
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('ins_user_id'),
					//'subject_id' => $this->input->post('subject'),
					'institute_id' => $this->session->userdata('institute_id'),
				);
		$teacher_id = $this->InstituteModel->add_data($data,'teachers');
		if($teacher_id){
			if(!empty($teacher_id)){
				foreach($subjects as $row){
					if(!empty($row)){
						$insert = array(
							'institute_id' => $this->session->userdata('institute_id'),
							'teacher_id' => $teacher_id,
							'subject_id' => $row,
							'status' => 1
						);
						$this->InstituteModel->add_data($insert,'teacher_subjects');
					}
				}
				
			}
			$this->session->set_flashdata('admin_created',1);
		}
		else{
			$this->session->set_flashdata('admin_created',2);
		}
		redirect(base_url('teachers'));
	}
	public function edit_teacher(){
		$subjects = $this->input->post('edit_subject');
		$status = $this->input->post('edit_teacher_status') ? 1 : 2;
		$id = $this->input->post('edit_id');
		$data = array(
					
					'teacher_name'=>$this->input->post('edit_teacher_name'),
					// 'teacher_username'=>$this->input->post('edit_teacher_username'),
					'teacher_phone'=>$this->input->post('edit_teacher_phone'),
					'teacher_email'=>$this->input->post('edit_teacher_email'),
					// 'subject_id' => $this->input->post('edit_subject'),
					'teacher_status'=>$status,
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('ins_user_id')
				);
		if($this->InstituteModel->edit_teacher($data,$id)){
			$this->InstituteModel->delete_teacher_subject($id);
			foreach($subjects as $row){
				$update = array(
					'institute_id' => $this->session->userdata('institute_id'),
					'teacher_id' => $id,
					'subject_id' => $row,
					'status' => 1
				);
				$this->InstituteModel->add_data($update,'teacher_subjects');
			}
			$this->session->set_flashdata('admin_updated',1);
		}
		else{
			$this->session->set_flashdata('admin_updated',2);
		}
		redirect(base_url('teachers'));
	}
	public function batch_filter(){

		$filter = array(
					'name' => $this->input->post('filter_name') ? $this->input->post('filter_name') : '',
					'code' => $this->input->post('filter_code') ? $this->input->post('filter_code') : '',
					'course' => $this->input->post('filter_course') ? $this->input->post('filter_course') : '',
					'status' => $this->input->post('filter_status') ? $this->input->post('filter_status') : '',
						
				);
		$this->session->set_userdata('batch_filter',$filter);
		redirect(base_url('batch'));
	}
	public function batch(){

		$filter = $this->session->userdata('batch_filter');
		$filter_data = array(
					'name'=> isset($filter['name'])? $filter['name']:'',
					'code'=> isset($filter['code'])? $filter['code']:'',
					'course'=> isset($filter['course'])? $filter['course']:'',
					'status'=> isset($filter['status'])? $filter['status']:'',
			);

		$this->load->library('pagination');

		$config['base_url'] = base_url('batch');
		$config['total_rows'] = $this->InstituteModel->count_batch($filter_data);
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
							'batch'=>$this->InstituteModel->list_batch($limit,$offset,$filter_data),
							'course'=>$this->InstituteModel->list_course(),
							'filter_data' => $filter_data,
							'weekdays' => $this->InstituteModel->get_week_days(),
							'links'=>$links,
							'offset'=>$offset
						);
		$this->load->view('institute/header');
		$this->load->view('institute/batch',$body_data);
		$this->load->view('institute/footer');
	}
	public function add_batch(){
		
		
		$start_date = str_replace('/', '-', $this->input->post('start_date'));
        $start_date1 = date('Y-m-d', strtotime($start_date));
        $end_date = str_replace('/', '-', $this->input->post('end_date'));
        $end_date1 = date('Y-m-d', strtotime($end_date));

        //echo $this->input->post('end_time');exit();
		$data = array(
					
					'batch_name' => $this->input->post('batch_name'),
					'batch_code' => $this->input->post('batch_code'),
					'batch_start_date' => $start_date1,
					'batch_end_date' => $end_date1,
					'batch_start_time'=>$this->input->post('start_time'),
					'batch_end_time'=>$this->input->post('end_time'),
					'batch_description'=>$this->input->post('description'),
					'batch_status'=>1,
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('ins_user_id'),
					'course_id' => $this->input->post('course'),
					'institute_id' => $this->session->userdata('institute_id'),
					'batch_periods' => $this->input->post('period_no')
				);
		$batch_id = $this->InstituteModel->add_data($data,'batch');
		if($batch_id){
			for($i=1 ; $i <7 ; $i++){
				if($this->input->post('day'.$i)){
					$days = array(
						'batch_id' => $batch_id,
						'weekdays' => $this->input->post('day'.$i),
					);
					$this->InstituteModel->add_data($days,'batch_days');
				}
			}

			$this->session->set_flashdata('admin_created',1);
		}
		else{
			$this->session->set_flashdata('admin_created',2);
		}
		redirect(base_url('batch'));
	}
	public function edit_batch(){
		$start_date = str_replace('/', '-', $this->input->post('edit_start_date'));
        $start_date1 = date('Y-m-d', strtotime($start_date));
        $end_date = str_replace('/', '-', $this->input->post('edit_end_date'));
        $end_date1 = date('Y-m-d', strtotime($end_date));

		$status = $this->input->post('edit_batch_status') ? 1 : 2;
		$id = $this->input->post('edit_id');
		
		$data = array(
					
					'batch_name' => $this->input->post('edit_batch_name'),
					'batch_code' => $this->input->post('edit_batch_code'),
					'batch_start_date' => $start_date1,
					'batch_end_date' => $end_date1,
					'batch_start_time'=>$this->input->post('edit_start_time'),
					'batch_end_time'=>$this->input->post('edit_end_time'),
					'batch_description'=>$this->input->post('edit_description'),
					'batch_status'=>$status,
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('ins_user_id'),
					'course_id' => $this->input->post('edit_course'),
					'batch_periods' => $this->input->post('edit_period_no')
					
				);
		if($this->InstituteModel->edit_batch($data,$id)){
			$this->InstituteModel->delete_batch_days($id);
			for($i=1 ; $i <7 ; $i++){
				if($this->input->post('edit_day'.$i)){
					$days = array(
						'batch_id' => $id,
						'weekdays' => $this->input->post('edit_day'.$i),
					);
					$this->InstituteModel->add_data($days,'batch_days');
				}
			}
			$this->session->set_flashdata('admin_updated',1);
		}
		else{
			$this->session->set_flashdata('admin_updated',2);
		}
		redirect(base_url('batch'));
	}
	public function student_filter(){

		$filter = array(
					'name' => $this->input->post('filter_name') ? $this->input->post('filter_name') : '',
					'email' => $this->input->post('filter_email') ? $this->input->post('filter_email') : '',
					'phone' => $this->input->post('filter_phone') ? $this->input->post('filter_phone') : '',
					'course' => $this->input->post('filter_course') ? $this->input->post('filter_course') : '',
					'status' => $this->input->post('filter_status') ? $this->input->post('filter_status') : '',
						
				);
		$this->session->set_userdata('student_filter',$filter);
		redirect(base_url('students'));
	}
	public function students(){

		$filter = $this->session->userdata('student_filter');
		$filter_data = array(
					'name'=> isset($filter['name'])? $filter['name']:'',
					'email'=> isset($filter['email'])? $filter['email']:'',
					'phone'=> isset($filter['phone'])? $filter['phone']:'',
					'course'=> isset($filter['course'])? $filter['course']:'',
					'status'=> isset($filter['status'])? $filter['status']:'',
			);

		$this->load->library('pagination');

		$config['base_url'] = base_url('students');
		$config['total_rows'] = $this->InstituteModel->count_students($filter_data);
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
					'students'=>$this->InstituteModel->list_students($limit,$offset,$filter_data),
					'course'=>$this->InstituteModel->list_course(),
					'filter_data' => $filter_data,
					'links'=>$links,
					'offset'=>$offset
				);
		$this->load->view('institute/header');
		$this->load->view('institute/students',$body_data);
		$this->load->view('institute/footer');
	}
	public function add_student(){
		if(!empty($this->input->post('dob'))){
			$dob = str_replace('/', '-', $this->input->post('dob'));
        	$dob1 = date('Y-m-d', strtotime($dob));
		}
		else{
			$dob1 ='';
		}
       

        //echo $this->input->post('end_time');exit();
		$data = array(
					
					'name' => $this->input->post('name'),
					'email_id' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
					'dob' => $dob1,
					'gender'=>$this->input->post('gender'),
					'address'=>$this->input->post('adderss'),
					'status'=>1,
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('ins_user_id'),
					'course_id' => $this->input->post('course'),
					'batch_id' => $this->input->post('batch'),
					'institute_id' => $this->session->userdata('institute_id'),
				);
		if($this->InstituteModel->add_data($data,'student')){
			$this->session->set_flashdata('admin_created',1);
		}
		else{
			$this->session->set_flashdata('admin_created',2);
		}
		redirect(base_url('students'));
	}
	public function edit_student(){
		$dob = str_replace('/', '-', $this->input->post('edit_dob'));
        $dob1 = date('Y-m-d', strtotime($dob));

		$status = $this->input->post('edit_status') ? 1 : 2;
		$id = $this->input->post('edit_id');
		
		$data = array(
					
					'name' => $this->input->post('edit_name'),
					'email_id' => $this->input->post('edit_email'),
					'phone' => $this->input->post('edit_phone'),
					'dob' => $dob1,
					'gender'=>$this->input->post('edit_gender'),
					'address'=>$this->input->post('edit_adderss'),
					'status' => $status,
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('ins_user_id'),
					'course_id' => $this->input->post('edit_course'),
					'batch_id' => $this->input->post('edit_batch'),
				);
		if($this->InstituteModel->edit_student($data,$id)){
			$this->session->set_flashdata('admin_updated',1);
		}
		else{
			$this->session->set_flashdata('admin_updated',2);
		}
		redirect(base_url('students'));
	}
	public function news_filter(){
		$date = str_replace('/', '-', $this->input->post('filter_date'));
        $date1 = date('Y-m-d', strtotime($date));
		$filter = array(
					'name' => $this->input->post('filter_name') ? $this->input->post('filter_name') : '',
					'date' => $this->input->post('filter_date') ? $date1 : '',
					
					'status' => $this->input->post('filter_status') ? $this->input->post('filter_status') : '',
						
				);
		$this->session->set_userdata('news_filter',$filter);
		redirect(base_url('news'));
	}
	public function news(){

		$filter = $this->session->userdata('news_filter');
		$filter_data = array(
					'name'=> isset($filter['name'])? $filter['name']:'',
					'date'=> isset($filter['date'])? $filter['date']:'',
					'status'=> isset($filter['status'])? $filter['status']:'',
			);

		$this->load->library('pagination');

		$config['base_url'] = base_url('news');
		$config['total_rows'] = $this->InstituteModel->count_news($filter_data);
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
							'news'=>$this->InstituteModel->list_news($limit,$offset,$filter_data),
							'links'=>$links,
							'offset'=>$offset,
							'filter_data' => $filter_data,
						);
		$this->load->view('institute/header');
		$this->load->view('institute/news',$body_data);
		$this->load->view('institute/footer');
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
					'updated_by'=>$this->session->userdata('ins_user_id'),
					'institute_id' => $this->session->userdata('institute_id'),
				);
					if($this->InstituteModel->add_data($data,'news')){
						$this->session->set_flashdata('admin_created',1);
						$datan = array(
                                        'batch_id' => 0,
                                        'institute_id' => $this->session->userdata('institute_id'),
                                        'title'=> $this->input->post('heading'),
                                        'message' => $this->input->post('description'), 
                                        'image' => $image,
                                        'type'  => 'news',
                                        'chapter_name'  => "", 
                                        'chapter_id'  => 0,
                                        'subject_name'  => "",
                                        'subject_id'  => 0,
                                        'type_id'  => '',
                                        'presentation_name'  => '',
                                        'submission_date'  => $date1,
                                        'publish_content'  => $this->input->post('description'),
                                        'publish_audio'  => '',
                                        'created_user'  => $this->session->userdata('ins_user_name'),
                                        'created_by'  => $this->session->userdata('ins_user_id'),
                                        'created_at'  => date('Y-m-d H:i:s')
                                );
                                $wall_id = $this->Api_student->add_data($datan,'wall_notifications');
					}
					else{
						$this->session->set_flashdata('admin_created',2);
					}
            }else{
            	
                   $this->session->set_flashdata('image_upload',2);     
            }
        }
       

        //echo $this->input->post('end_time');exit();
		
		redirect(base_url('news'));
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

                
            }
        }
        $data = array(
					
				'news_heading' => $this->input->post('edit_heading'),
				'news_description' => $this->input->post('edit_description'),
				'news_date' => $date1,
				'news_status'=>$status,
				'updated_on'=>time(),
				'updated_by'=>$this->session->userdata('ins_user_id'),
				
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
		redirect(base_url('news'));
	}
	public function event_filter(){
		$date = str_replace('/', '-', $this->input->post('filter_date'));
        $date1 = date('Y-m-d', strtotime($date));
		$filter = array(
					'name' => $this->input->post('filter_name') ? $this->input->post('filter_name') : '',
					'date' => $this->input->post('filter_date') ? $date1 : '',
					
					'status' => $this->input->post('filter_status') ? $this->input->post('filter_status') : '',
						
				);
		$this->session->set_userdata('event_filter',$filter);
		redirect(base_url('events'));
	}
	public function events(){

		$filter = $this->session->userdata('event_filter');
		$filter_data = array(
					'name'=> isset($filter['name'])? $filter['name']:'',
					'date'=> isset($filter['date'])? $filter['date']:'',
					'status'=> isset($filter['status'])? $filter['status']:'',
			);

		$this->load->library('pagination');

		$config['base_url'] = base_url('events');
		$config['total_rows'] = $this->InstituteModel->count_events($filter_data);
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
							'events'=>$this->InstituteModel->list_events($limit,$offset,$filter_data),
							'links'=>$links,
							'offset'=>$offset,
							'filter_data' => $filter_data,
						);
		$this->load->view('institute/header');
		$this->load->view('institute/events',$body_data);
		$this->load->view('institute/footer');
	}
	public function add_event(){
		$date = str_replace('/', '-', $this->input->post('date'));
        $date1 = date('Y-m-d', strtotime($date));

        if($_FILES['image']['size'] != 0){
        	
		 	 $image='';
            $config['upload_path'] = FCPATH . 'uploads/events';;
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
			
					'event_title' => $this->input->post('title'),
					'event_date' => $date1,
					'event_status'=>1,
					'created_on'=>time(),
					'updated_on'=>time(),
					'update_by'=>$this->session->userdata('ins_user_id'),
					'institute_id' => $this->session->userdata('institute_id'),
					'event_image' => $image,
				);
				if($this->InstituteModel->add_data($data,'event')){
					$this->session->set_flashdata('admin_created',1);

					$datan = array(
                                        'batch_id' => 0,
                                        'institute_id' => $this->session->userdata('institute_id'),
                                        'title'=> $this->input->post('title'),
                                        'message' => "", 
                                        'image' => $image,
                                        'type'  => 'events',
                                        'chapter_name'  => "", 
                                        'chapter_id'  => 0,
                                        'subject_name'  => "",
                                        'subject_id'  => 0,
                                        'type_id'  => '',
                                        'presentation_name'  => '',
                                        'submission_date'  => $date1,
                                        'publish_content'  => $this->input->post('title'),
                                        'publish_audio'  => '',
                                        'created_user'  => $this->session->userdata('ins_user_name'),
                                        'created_by'  => $this->session->userdata('ins_user_id'),
                                        'created_at'  => date('Y-m-d H:i:s')
                                );
                                $wall_id = $this->Api_student->add_data($datan,'wall_notifications');
				}
				else{
					$this->session->set_flashdata('admin_created',2);
				}
            }else{
            	
                   $this->session->set_flashdata('image_upload',2);     
            }
        }
        
		
		redirect(base_url('events'));
	}
	public function edit_event(){
		//print_r($this->input->post());exit();
		$date = str_replace('/', '-', $this->input->post('edit_date'));
        $date1 = date('Y-m-d', strtotime($date));

        $status = $this->input->post('edit_status') ? 1 : 2;
		$id = $this->input->post('edit_id');
		$image ='';	
		 if($_FILES['image']['size'] != 0){
		 	 $image='';
            $config['upload_path'] = FCPATH . 'uploads/events';
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
					
				'event_title' => $this->input->post('edit_title'),
				'event_date' => $date1,
				'event_status'=>$status,
				'updated_on'=>time(),
				'update_by'=>$this->session->userdata('ins_user_id'),
				
			);
        if(!empty($image)){
        	$data['event_image'] = $image;
        }
		if($this->InstituteModel->edit_event($data,$id)){
			$this->session->set_flashdata('admin_updated',1);
		}
		else{
			$this->session->set_flashdata('admin_updated',2);
		}
		redirect(base_url('events'));
	}
	public function time_table($id){
		
		$body_data = array(
						'batch'=>$this->InstituteModel->get_no_of_periods($id),
						'weekdays'=>$this->InstituteModel->get_batch_week_days($id),
						'time_table' => $this->InstituteModel->get_time_table($id),
						'teachers' => $this->InstituteModel->batch_teachers($id),
						
					);
		$this->load->view('institute/header');
		$this->load->view('institute/time_table',$body_data);
		$this->load->view('institute/footer');
	}
	public function add_time_table(){
		$batch_id = $this->input->post('batch_id');
		$time_table = $this->InstituteModel->get_time_table($batch_id);
		$batch = $this->InstituteModel->get_no_of_periods($batch_id);
		$weekdays = $this->InstituteModel->get_batch_week_days($batch_id);
		//print_r($time_table);exit();
		if(empty($time_table)){
			foreach($weekdays as $data){
				for($i=1;$i<=$batch['batch_periods'];$i++){
					if($this->input->post('teacher_'.$data['weekdays'].'_'.$i)){
						$insert = array(
								'batch_id' => $batch_id,
								'period' => $i,
								'weekdays' => $data['weekdays'],
								'subject' => $this->input->post('sub_'.$data['weekdays'].'_'.$i),
								'institute_id' => $this->session->userdata('institute_id'),
								'teacher_id' => $this->input->post('teacher_'.$data['weekdays'].'_'.$i)
						);
						$this->InstituteModel->add_data($insert,'time_table');
					}else{
			$this->session->set_flashdata('admin_updated',3);

						redirect(base_url('time-table').'/'.$batch_id);
					}
				}
			}
			$this->session->set_flashdata('admin_created',1);
		}
		else{
			$this->InstituteModel->delete_timetable($batch_id);
			foreach($weekdays as $data){
				for($i=1;$i<=$batch['batch_periods'];$i++){
					if($this->input->post('teacher_'.$data['weekdays'].'_'.$i)){
						$insert = array(
								'batch_id' => $batch_id,
								'period' => $i,
								'weekdays' => $data['weekdays'],
								'subject' => $this->input->post('sub_'.$data['weekdays'].'_'.$i),
								'institute_id' => $this->session->userdata('institute_id'),
								'teacher_id' => $this->input->post('teacher_'.$data['weekdays'].'_'.$i)
						);
						$this->InstituteModel->add_data($insert,'time_table');
					}else{
			$this->session->set_flashdata('admin_updated',2);

						redirect(base_url('time-table').'/'.$batch_id);

					}
				}
			}

			$this->session->set_flashdata('admin_updated',1);
		}
		redirect(base_url('batch'));

	}
	public function assign_teacher($id){
		$batch = $this->InstituteModel->get_batch($id);
		$subject = $this->InstituteModel->get_course_subject($batch['course_id'],$id);
		//print_r($subject);exit();
		foreach($subject as $key => $sub){
			$teachers = $this->InstituteModel->get_subject_teacher($sub['data_id']);
			$assign_teachers = $this->InstituteModel->get_batch_subject_teacher($id,$sub['data_id']);
			
			$ar=array();
			foreach ($assign_teachers as $value) {
				$ar[]=$value['teacher_id'];
			}
			$subject[$key]['teacher'] = $teachers;
			$subject[$key]['assigned'] = $ar;
		}
		
		$body_data = array(
						'batch'=> $batch,
						'subject' => $subject,
						
					);
		//print_r($body_data);exit();
		$this->load->view('institute/header');
		$this->load->view('institute/assign_teacher',$body_data);
		$this->load->view('institute/footer');
	}
	public function add_assigned_teacher(){
		
		$batch_id = $this->input->post('batch_id');
		$batch = $this->InstituteModel->get_batch($batch_id);
		$subject = $this->InstituteModel->get_course_subject($batch['course_id'],$batch_id);
		foreach ($subject as  $value) {
			$teacher = $this->input->post('teacher_'.$value['data_id']);
			$this->InstituteModel->delete_assigned_subject($value['data_id'],$batch_id);
			foreach($teacher as $row){
				if(!empty($row)){
					$data = array(
					'batch_id' => $batch_id,
					'subject_id' => $this->input->post('sub_'.$value['data_id']),
					'teacher_id' => $row,
					'institute_id' => $this->session->userdata('institute_id'),
					'created_on' => time(),
					'updated_on' => time(),
					'update_by' => $this->session->userdata('ins_user_id'),
					'status' => 1
				);
				$insert=$this->InstituteModel->add_data($data,'batch_teachers');
				}
			}
			//print_r($teacher);echo "<br>";
		}
		
		if($insert){
			$this->session->set_flashdata('admin_created',1);
		}
		else{
			$this->session->set_flashdata('admin_created',2);
		}
		redirect(base_url('batch'));
	}
	public function create_semester($id){
		$batch = $this->InstituteModel->get_batch($id);
		$subject = $this->InstituteModel->get_course_subject($batch['course_id'],$id);
		$semester = $this->InstituteModel->get_semester_subject($id);

		//print_r($subject);exit();
		foreach($subject as $key => $sub){
			$teachers = $this->InstituteModel->get_subject_teacher($sub['data_id']);
			$subject[$key]['teacher'] = $teachers;
		}
		$sub_id =array();
		foreach($semester as $row){
			foreach($row['exist_sub'] as $value){
				$sub_id[]=$value;
			}

		}
		
		$body_data = array(
						'batch'=> $batch,
						'subject' => $subject,
						'semester' =>  $semester,
						'exist_sub' => $sub_id
						
					);
		//print_r($body_data);exit();
		$this->load->view('institute/header');
		$this->load->view('institute/create_semester',$body_data);
		$this->load->view('institute/footer');
	}
	public function add_semester(){
		$batch_id = $this->input->post('batch_id');
		$sub = $this->input->post('subject');
		$semester = array(
				'sem_name' => $this->input->post('semester_name'),
				'batch_id' => $this->input->post('batch_id'),
				'institute_id' => $this->session->userdata('institute_id'),
				'publish_status' => 0
					);
		$insert = $this->InstituteModel->add_data($semester,'ins_semester');
		if($insert){
			foreach($sub as $row){
				if(!empty($row)){
					$subject = array(
						'sem_id' => $insert,
						'subject_id' => $row,
						'batch_id' => $this->input->post('batch_id'),
						'publish_status' => 0
						);
					$insert1 = $this->InstituteModel->add_data($subject,'sem_subject');

				}
			}
			$this->session->set_flashdata('admin_created',1);
					
		}
		else{
			$this->session->set_flashdata('admin_created',2);
		}
		redirect(base_url('create-semester/'.$batch_id ));
	}
	public function publish_semester($id){
		$sem_batch = $this->InstituteModel->semester_batch_id($id);
		if($this->InstituteModel->publish_semester($id)){
			$this->session->set_flashdata('sem_publish',1);
		}
		else{
			$this->session->set_flashdata('sem_publish',1);
		}
		redirect(base_url('create-semester/'.$sem_batch['batch_id'] ));
	}
	public function disable_semester($id){
		$sem_batch = $this->InstituteModel->semester_batch_id($id);
		if($this->InstituteModel->disable_semester($id)){
			$this->session->set_flashdata('sem_publish',1);
		}
		else{
			$this->session->set_flashdata('sem_publish',1);
		}
		redirect(base_url('create-semester/'.$sem_batch['batch_id'] ));
	}
}