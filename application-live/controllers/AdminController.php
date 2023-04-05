<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

	function __construct(){
        parent::__construct();
        // ini_set('memory_limit', '-1');
        
        if($this->uri->segment(1) == 'view-details'){
        	// if((!$this->session->userdata('admin_id'))||(!$this->session->userdata('teacher_id'))){

         //    	redirect(base_url());
	        // }
	        
	        if($this->session->userdata('admin_id') == "" && $this->session->userdata('teacher_id') != ""){
	    		$this->session->set_userdata('admin_id',$this->session->userdata('teacher_id'));
	    	}
        }else{
        	if(!$this->session->userdata('admin_id')){
            	redirect(base_url());
        	}
        }
        
		date_default_timezone_set('Asia/Kolkata');


		$this->load->model('AdminModel');

		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, OPTIONS");
    }

	public function dashboard(){
		$this->load->view('backend/header');
		$this->load->view('backend/index');
		$this->load->view('backend/footer');
	}

	public function role_filter(){
		$filter = array(
						'name' => $this->input->post('filter_name') ? $this->input->post('filter_name') : '',
						
					);
		$this->session->set_userdata('role_filter',$filter);
		redirect(base_url('roles'));
	}
	public function roles(){
		$filter = $this->session->userdata('role_filter');
		$filter_data = array(
					'name'=> isset($filter['name'])? $filter['name']:'',
			);

		$this->load->library('pagination');

		$config['base_url'] = base_url('roles');
		$config['total_rows'] = $this->AdminModel->count_roles($filter_data);
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

		$rights = $this->config->item('rights');
		$privileges = $this->config->item('privileges');
		$body_data = array(
							'roles'=>$this->AdminModel->list_role($limit,$offset,$filter_data),
							'rights'=>$rights,
							'privileges'=>$privileges,
							'links'=>$links,
							'offset'=>$offset,
							'filter_data' => $filter_data,
						);
		$this->load->view('backend/header');
		$this->load->view('backend/roles',$body_data);
		$this->load->view('backend/footer');
	}

	public function add_roles(){
		$role_name = trim($this->input->post('role_name'));
		$priv = $this->input->post('privileges');
		$rights = $this->input->post('rights');
		$data = array(
					'role_name'=>$role_name,
					'role_priv'=>implode(',',$priv),
					'role_rights'=>implode(',',$rights),
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->AdminModel->add_data($data,'roles')){
			$this->session->set_flashdata('role_created',1);
		}
		else{
			$this->session->set_flashdata('role_created',2);
		}
		redirect(base_url('roles'));
	}

	public function edit_roles(){
		$id = $this->input->post('role_id');
		$role_name = trim($this->input->post('edit_role_name'));
		$priv = $this->input->post('edit_privileges');
		$rights = $this->input->post('edit_rights');
		$data = array(
					'role_name'=>$role_name,
					'role_priv'=>implode(',',$priv),
					'role_rights'=>implode(',',$rights),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->AdminModel->edit_role($id,$data)){
			$this->session->set_flashdata('role_updated',1);
		}
		else{
			$this->session->set_flashdata('role_updated',2);
		}
		redirect(base_url('roles'));
	}

	public function admin_filter(){
		$filter = array(
						'name' => $this->input->post('filter_name') ? $this->input->post('filter_name') : '',
						'email' => $this->input->post('filter_email') ? $this->input->post('filter_email') : '',
						'role' => $this->input->post('filter_role') ? $this->input->post('filter_role') : '',
						'status' => $this->input->post('filter_status') ? $this->input->post('filter_status') : '',
						
					);
		$this->session->set_userdata('admin_filter',$filter);
		redirect(base_url('admins'));
	}
	
	public function admins(){
		$filter = $this->session->userdata('admin_filter');
    	$filter_data = array(
					'name'=> isset($filter['name'])? $filter['name']:'',
					'email'=> isset($filter['email'])? $filter['email']:'',
					'role'=> isset($filter['role'])? $filter['role']:'',
					'status'=> isset($filter['status'])? $filter['status']:'',
			);

		$this->load->library('pagination');

		$config['base_url'] = base_url('admins');
		$config['total_rows'] = $this->AdminModel->count_admins($filter_data);
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
							'admins'=>$this->AdminModel->list_admins($limit,$offset,$filter_data),
							'roles'=>$this->AdminModel->list_roles(),
							'links'=>$links,
							'offset'=>$offset,
							'filter_data' => $filter_data,
						);
		$this->load->view('backend/header');
		$this->load->view('backend/admins',$body_data);
		$this->load->view('backend/footer');
	}

	public function add_admin(){

		$data = array(
					'role_id'=>$this->input->post('admin_role'),
					'admin_name'=>$this->input->post('admin_name'),
					'admin_username'=>$this->input->post('admin_username'),
					'admin_phone'=>$this->input->post('admin_phone'),
					'admin_email'=>$this->input->post('admin_email'),
					'admin_password'=>password_hash($this->input->post('admin_password'),PASSWORD_DEFAULT),
					'admin_status'=>1,
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->AdminModel->add_data($data,'admins')){
			$this->session->set_userdata('admin_created',1);
		}
		else{
			$this->session->set_userdata('admin_created',2);
		}
		redirect(base_url('admins'));
	}

	public function edit_admin(){
		$status = $this->input->post('edit_admin_status') ? 1 : 2;
		$id = $this->input->post('admin_id');
		$data = array(
					'role_id'=>$this->input->post('edit_admin_role'),
					'admin_name'=>$this->input->post('edit_admin_name'),
					'admin_username'=>$this->input->post('edit_admin_username'),
					'admin_phone'=>$this->input->post('edit_admin_phone'),
					'admin_email'=>$this->input->post('edit_admin_email'),
					'admin_status'=>$status,
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->AdminModel->edit_admin($data,$id)){
			$this->session->set_userdata('admin_created',1);
		}
		else{
			$this->session->set_userdata('admin_created',2);
		}
		redirect(base_url('admins'));
	}


		public function category_filter(){
		$filter = array(
						'name' => $this->input->post('filter_name') ? $this->input->post('filter_name') : '',
						
					);
		$this->session->set_userdata('category_filter',$filter);
		redirect(base_url('tables'));
	}

	public function tables(){
		$filter = $this->session->userdata('category_filter');
		$filter_data = array(
					'name'=> isset($filter['name'])? $filter['name']:'',
			);
		$this->load->library('pagination');

		$config['base_url'] = base_url('tables');
		$config['total_rows'] = $this->AdminModel->count_tables($filter_data);
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
							'tables'=>$this->AdminModel->list_tables($limit,$offset,$filter_data),
							'links'=>$links,
							'offset'=>$offset,
							'filter_data' => $filter_data,
						);
		$this->load->view('backend/header');
		$this->load->view('backend/tables',$body_data);
		$this->load->view('backend/footer');
	}

	public function add_table(){
		$check_one = $this->input->post('column_one_check') ? 1 : 0;
		$check_two = $this->input->post('column_two_check') ? 1 : 0;
		$check_three = $this->input->post('column_three_check') ? 1 : 0;
		$check_four = $this->input->post('column_four_check') ? 1 : 0;
		$check_five = $this->input->post('column_five_check') ? 1 : 0;
		$check_six = $this->input->post('column_six_check') ? 1 : 0;
		$check_seven = $this->input->post('column_seven_check') ? 1 : 0;
		$check_eight = $this->input->post('column_eight_check') ? 1 : 0;
		$check_nine = $this->input->post('column_nine_check') ? 1 : 0;
		$check_ten = $this->input->post('column_ten_check') ? 1 : 0;
		$data = array(
					'table_name'=>trim($this->input->post('table_name')),
					'table_columns'=>trim($this->input->post('table_columns')),
					'table_single_width'=>trim($this->input->post('table_width')),
					'table_left_title'=>trim($this->input->post('table_left_title')),
					'table_right_title'=>trim($this->input->post('table_right_title')),
					'column_one_name'=>trim($this->input->post('column_one_name')),
					'column_two_name'=>trim($this->input->post('column_two_name')),
					'column_three_name'=>trim($this->input->post('column_three_name')),
					'column_four_name'=>trim($this->input->post('column_four_name')),
					'column_five_name'=>trim($this->input->post('column_five_name')),
					'column_six_name'=>trim($this->input->post('column_six_name')),
					'column_seven_name'=>trim($this->input->post('column_seven_name')),
					'column_eight_name'=>trim($this->input->post('column_eight_name')),
					'column_nine_name'=>trim($this->input->post('column_nine_name')),
					'column_ten_name'=>trim($this->input->post('column_ten_name')),
					'column_one_width'=>trim($this->input->post('column_one_width')),
					'column_two_width'=>trim($this->input->post('column_two_width')),
					'column_three_width'=>trim($this->input->post('column_three_width')),
					'column_four_width'=>trim($this->input->post('column_four_width')),
					'column_five_width'=>trim($this->input->post('column_five_width')),
					'column_six_width'=>trim($this->input->post('column_six_width')),
					'column_seven_width'=>trim($this->input->post('column_seven_width')),
					'column_eight_width'=>trim($this->input->post('column_eight_width')),
					'column_nine_width'=>trim($this->input->post('column_nine_width')),
					'column_ten_width'=>trim($this->input->post('column_ten_width')),
					'column_one_sum'=>$check_one,
					'column_two_sum'=>$check_two,
					'column_three_sum'=>$check_three,
					'column_four_sum'=>$check_four,
					'column_five_sum'=>$check_five,
					'column_six_sum'=>$check_six,
					'column_seven_sum'=>$check_seven,
					'column_eight_sum'=>$check_eight,
					'column_nine_sum'=>$check_nine,
					'column_ten_sum'=>$check_ten,
					'count_one_table'=>trim($this->input->post('count_sub_one_column')),
					'count_two_table'=>trim($this->input->post('count_sub_two_column')),
					'count_three_table'=>trim($this->input->post('count_sub_three_column')),
					'count_four_table'=>trim($this->input->post('count_sub_four_column')),
					'count_five_table'=>trim($this->input->post('count_sub_five_column')),
					'count_six_table'=>trim($this->input->post('count_sub_six_column')),
					'count_seven_table'=>trim($this->input->post('count_sub_seven_column')),
					'count_eight_table'=>trim($this->input->post('count_sub_eight_column')),
					'count_nine_table'=>trim($this->input->post('count_sub_nine_column')),
					'count_ten_table'=>trim($this->input->post('count_sub_ten_column')),
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);


         $t_id=$this->AdminModel->add_data($data,'tables');
		if($t_id){
			for ($i=0; $i <9 ; $i++) { 
						if($this->input->post('col_width'.$i)){
							$wid=rtrim($this->input->post('col_width'.$i), ',');
							$sum_sub=rtrim($this->input->post('col_sub_sum'.$i), ',');
							$colwidth = explode(',',$wid);
							$subsum = explode(',',$sum_sub);
							//print_r($colwidth);exit();

									$width = array();	
									
							// if($question_id){
								foreach($colwidth as $key => $temp){
									$pemp = array('column_id'=>$i,'table_id'=>$t_id,'width'=>$temp,'is_sum'=>$subsum[$key]);
									array_push($width,$pemp);
								}
								$this->AdminModel->insert_table_width($width);
								$this->session->set_flashdata('table_created',1);
							// }
							// else{
							// 	$this->session->set_flashdata('table_created',2);
							// }
						}
					         

						    }
		}
		else{
			$this->session->set_flashdata('table_created',2);
		}
		redirect(base_url('tables'));
	}

	public function edit_table(){
		$id = $this->input->post('table_id');
		$check_one = $this->input->post('edit_column_one_check') ? 1 : 0;
		$check_two = $this->input->post('edit_column_two_check') ? 1 : 0;
		$check_three = $this->input->post('edit_column_three_check') ? 1 : 0;
		$check_four = $this->input->post('edit_column_four_check') ? 1 : 0;
		$check_five = $this->input->post('edit_column_five_check') ? 1 : 0;
		$check_six = $this->input->post('edit_column_six_check') ? 1 : 0;
		$check_seven = $this->input->post('edit_column_seven_check') ? 1 : 0;
		$check_eight = $this->input->post('edit_column_eight_check') ? 1 : 0;
		$check_nine = $this->input->post('edit_column_nine_check') ? 1 : 0;
		$check_ten = $this->input->post('edit_column_ten_check') ? 1 : 0;
		$data = array(
					'table_name'=>trim($this->input->post('edit_table_name')),
					'table_columns'=>trim($this->input->post('edit_table_columns')),
					'column_one_name'=>trim($this->input->post('edit_column_one_name')),
					'column_two_name'=>trim($this->input->post('edit_column_two_name')),
					'column_three_name'=>trim($this->input->post('edit_column_three_name')),
					'column_four_name'=>trim($this->input->post('edit_column_four_name')),
					'column_five_name'=>trim($this->input->post('edit_column_five_name')),
					'column_six_name'=>trim($this->input->post('edit_column_six_name')),
					'column_seven_name'=>trim($this->input->post('edit_column_seven_name')),
					'column_eight_name'=>trim($this->input->post('edit_column_eight_name')),
					'column_nine_name'=>trim($this->input->post('edit_column_nine_name')),
					'column_ten_name'=>trim($this->input->post('edit_column_ten_name')),
					'column_one_width'=>trim($this->input->post('edit_column_one_width')),
					'column_two_width'=>trim($this->input->post('edit_column_two_width')),
					'column_three_width'=>trim($this->input->post('edit_column_three_width')),
					'column_four_width'=>trim($this->input->post('edit_column_four_width')),
					'column_five_width'=>trim($this->input->post('edit_column_five_width')),
					'column_six_width'=>trim($this->input->post('edit_column_six_width')),
					'column_seven_width'=>trim($this->input->post('edit_column_seven_width')),
					'column_eight_width'=>trim($this->input->post('edit_column_eight_width')),
					'column_nine_width'=>trim($this->input->post('edit_column_nine_width')),
					'column_ten_width'=>trim($this->input->post('edit_column_ten_width')),
					'column_one_sum'=>$check_one,
					'column_two_sum'=>$check_two,
					'column_three_sum'=>$check_three,
					'column_four_sum'=>$check_four,
					'column_five_sum'=>$check_five,
					'column_six_sum'=>$check_six,
					'column_seven_sum'=>$check_seven,
					'column_eight_sum'=>$check_eight,
					'column_nine_sum'=>$check_nine,
					'column_ten_sum'=>$check_ten,
					'count_one_table'=>trim($this->input->post('count_sub_one_column')),
					'count_two_table'=>trim($this->input->post('count_sub_two_column')),
					'count_three_table'=>trim($this->input->post('count_sub_three_column')),
					'count_four_table'=>trim($this->input->post('count_sub_four_column')),
					'count_five_table'=>trim($this->input->post('count_sub_five_column')),
					'count_six_table'=>trim($this->input->post('count_sub_six_column')),
					'count_seven_table'=>trim($this->input->post('count_sub_seven_column')),
					'count_eight_table'=>trim($this->input->post('count_sub_eight_column')),
					'count_nine_table'=>trim($this->input->post('count_sub_nine_column')),
					'count_ten_table'=>trim($this->input->post('count_sub_ten_column')),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->AdminModel->edit_table($data,$id)){



			for ($i=0; $i <9 ; $i++) { 
						if($this->input->post('col_width'.$i)){
							$wid=rtrim($this->input->post('col_width'.$i), ',');
							$sum_sub=rtrim($this->input->post('col_sub_sum'.$i), ',');
							$colwidth = explode(',',$wid);
							$subsum = explode(',',$sum_sub);
							//print_r($colwidth);exit();

									$width = array();	
									
							// if($question_id){
								foreach($colwidth as $key => $temp){

									$del=$this->AdminModel->delete_sub_column($i,$id);
									$pemp = array('column_id'=>$i,'table_id'=>$id,'width'=>$temp,'is_sum'=>$subsum[$key]);
									array_push($width,$pemp);
								}
								$this->AdminModel->insert_table_width($width);
								//$this->session->set_flashdata('table_created',1);
							// }
							// else{
							// 	$this->session->set_flashdata('table_created',2);
							// }
						}
					         

						    }



			$this->session->set_flashdata('table_updated',1);
		}
		else{
			$this->session->set_flashdata('table_updated',2);
		}
		redirect(base_url('tables'));
	}

	public function course_filter(){
		$filter = array(
						'name' => $this->input->post('filter_name') ? $this->input->post('filter_name') : '',
						
					);
		$this->session->set_userdata('course_filter',$filter);
		redirect(base_url('courses'));
	}

	public function courses(){
		$filter = $this->session->userdata('course_filter');
		$filter_data = array(
					'name'=> isset($filter['name'])? $filter['name']:'',
			);


		$this->load->library('pagination');

		$config['base_url'] = base_url('courses');
		$config['total_rows'] = $this->AdminModel->count_courses($filter_data);
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
							'courses'=>$this->AdminModel->list_courses($limit,$offset,$filter_data),
							'links'=>$links,
							'offset'=>$offset,
							'filter_data' => $filter_data,
						);
		$this->load->view('backend/header');
		$this->load->view('backend/courses',$body_data);
		$this->load->view('backend/footer');
	}


	public function add_course(){
		$data = array(
					'data_name'=>trim($this->input->post('course_name')),
					'data_type'=>0,
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->AdminModel->add_data($data,'data')){
			$this->session->set_flashdata('course_created',1);
		}
		else $this->session->set_flashdata('course_created',2);
		redirect(base_url('courses'));
	}

	public function edit_course(){
		$id = $this->input->post('course_id');
		$data = array(
					'data_name'=>trim($this->input->post('edit_course_name')),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->AdminModel->update_course($id,$data)){
			$this->session->set_flashdata('course_updated',1);
		}
		else $this->session->set_flashdata('course_updated',2);
		redirect(base_url('courses'));
	}

	public function paper_filter(){
		$filter = array(
						'name' => $this->input->post('filter_name') ? $this->input->post('filter_name') : '',
						
					);
		$this->session->set_userdata('paper_filter',$filter);
		redirect(base_url('papers'));
	}
	public function papers(){
		$id = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('course_id');
		if(!$id) redirect(base_url('courses'));
		$this->session->set_userdata('course_id',$id);

		$filter = $this->session->userdata('paper_filter');
		$filter_data = array(
					'name'=> isset($filter['name'])? $filter['name']:'',
			);

		$this->load->library('pagination');

		$config['base_url'] = base_url('papers');
		$config['total_rows'] = $this->AdminModel->count_papers($id);
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
							'papers'=>$this->AdminModel->list_papers($id,$limit,$offset),
							'links'=>$links,
							'offset'=>$offset,
							'filter_data' => $filter_data,
						);
		$this->load->view('backend/header');
		$this->load->view('backend/papers',$body_data);
		$this->load->view('backend/footer');
	}

	public function add_paper(){

		if(!empty($_FILES['image']['name']))
        { 
            // echo "string";exit();
            $config['upload_path'] = FCPATH . 'uploads/paper_icon';
            $config['allowed_types'] = 'png|jpg';
            $config['max_size'] = '0'; // max_size in kb
            

            $img_ext = explode('.', $_FILES['image']['name']);
            //$img_upl_name = md5(time().rand(0, 100));

            $img_upl_name = 'icon'.'_'.md5(time().rand(0, 100));
            $config['file_name'] = $img_upl_name;

            $this->load->library('upload',$config); 
            $this->upload->initialize($config);

            if($this->upload->do_upload('image')){
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
            }
            else{
            	
                $filename="";
            }
        }
        if(!empty($filename)){
			$data = array(
						'data_name'=>trim($this->input->post('course_name')),
						'data_parent'=>$this->session->userdata('course_id'),
						'paper_icon' => $filename,
						'data_type'=>1,
						'created_on'=>time(),
						'updated_on'=>time(),
						'updated_by'=>$this->session->userdata('admin_id')
					);
			if($this->AdminModel->add_data($data,'data')){
				$this->session->set_flashdata('paper_created',1);
			}
			else $this->session->set_flashdata('paper_created',2);
			
		}
		else{
			$this->session->set_flashdata('image_created',2);
		}
		redirect(base_url('papers'));
	}

	public function edit_paper(){
		$filename="";
		if(!empty($_FILES['image']['name']))
        { 
            
            $config['upload_path'] = FCPATH . 'uploads/paper_icon';
            $config['allowed_types'] = 'png|jpg';
            $config['max_size'] = '0'; // max_size in kb
            

            $img_ext = explode('.', $_FILES['image']['name']);
            //$img_upl_name = md5(time().rand(0, 100));

            $img_upl_name = 'icon'.'_'.md5(time().rand(0, 100));
            $config['file_name'] = $img_upl_name;

            $this->load->library('upload',$config); 
            $this->upload->initialize($config);

            if($this->upload->do_upload('image')){
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
            }
            else{
            	
                $filename="";
            }
        }

		$id = $this->input->post('course_id');
		$data = array(
					'data_name'=>trim($this->input->post('edit_course_name')),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if(!empty($filename)){
			$data['paper_icon'] = $filename;
		}
		if($this->AdminModel->update_course($id,$data)){
			$this->session->set_flashdata('paper_updated',1);
		}
		else $this->session->set_flashdata('paper_updated',2);
		redirect(base_url('papers'));
	}

	public function chapter_filter(){
		$filter = array(
						'name' => $this->input->post('filter_name') ? $this->input->post('filter_name') : '',
						
					);
		$this->session->set_userdata('chapter_filter',$filter);
		redirect(base_url('chapters'));
	}
	public function chapters(){
		$id = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('paper_id');
		if(!$id) redirect(base_url('courses'));
		$this->session->set_userdata('paper_id',$id);

		$filter = $this->session->userdata('chapter_filter');
		$filter_data = array(
					'name'=> isset($filter['name'])? $filter['name']:'',
			);

		$this->load->library('pagination');

		$config['base_url'] = base_url('chapters');
		$config['total_rows'] = $this->AdminModel->count_chapters($id);
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
							'chapters'=>$this->AdminModel->list_chapters($id,$limit,$offset),
							'links'=>$links,
							'offset'=>$offset,
							'filter_data' => $filter_data,
						);
		$this->load->view('backend/header');
		$this->load->view('backend/chapters',$body_data);
		$this->load->view('backend/footer');
	}

	public function add_chapter(){
		$data = array(
					'data_name'=>trim($this->input->post('course_name')),
					'data_parent'=>$this->session->userdata('paper_id'),
					'data_type'=>2,
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->AdminModel->add_data($data,'data')){
			$this->session->set_flashdata('paper_created',1);
		}
		else $this->session->set_flashdata('paper_created',2);
		redirect(base_url('chapters'));
	}

	public function edit_chapter(){
		$id = $this->input->post('course_id');
		$data = array(
					'data_name'=>trim($this->input->post('edit_course_name')),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->AdminModel->update_course($id,$data)){
			$this->session->set_flashdata('paper_updated',1);
		}
		else $this->session->set_flashdata('paper_updated',2);
		redirect(base_url('chapters'));
	}

	public function questions(){
		$id = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('chapter_id');
		if(!$id) redirect(base_url('courses'));
		$this->session->set_userdata('chapter_id',$id);
		$this->load->library('pagination');

		$config['base_url'] = base_url('questions');
		$config['total_rows'] = $this->AdminModel->count_questions($id);
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
		$course=0;
		$chpt=2;
		$papr=1;
		$body_data = array(
							'questions'=>$this->AdminModel->list_questions($id,$limit,$offset),
							// 'qt_ids'=>$this->AdminModel->list_questions_table_ids($id),
							'tables'=>$this->AdminModel->list_all_tables(),
							'courses'=>$this->AdminModel->list_all_data($course),

							'chapters'=>$this->AdminModel->list_all_data($chpt),

							'papers'=>$this->AdminModel->list_all_data($papr),

							'links'=>$links,
							'offset'=>$offset
						);
		$this->load->view('backend/header');
		$this->load->view('backend/questions',$body_data);
		$this->load->view('backend/footer');
	}

	public function add_question(){


		//$a = htmlentities($this->input->post('question_title'));
		//print_r($this->input->post('question_title'));exit();
		//echo $a;exit();
		$data = array(
					'question_code'=>trim($this->input->post('question_code')),
					'question_title'=>$this->input->post('question_title'),
					'chapter_id'=>$this->session->userdata('chapter_id'),
				//	'qt_id'=>$this->input->post('qt_id') ? $this->input->post('qt_id') : 0,
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		for($i=1;$i<=9;$i++){


			if($i!=1){
				$key = 'table_id'.$i;
				$data[$key] = trim($this->input->post($key));


			//echo json_encode($_FILES['question_img'.$i]);exit();


				if($_FILES['question_img'.$i]['size']){
			$config['upload_path']          = './uploads/';
	        $config['allowed_types']        = 'jpeg|jpg|png';
	        $config['max_size']             = 5*1024;
	     //    $config['max_width']            = 1039;
		    // $config['max_height']           = 576;
		    // $config['min_width']            = 1039;
		    // $config['min_height']           = 576;
	        $new_name = time();
			$config['file_name'] = $new_name;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('question_img'.$i))
	        {
					$error = $this->upload->display_errors();
	                $this->session->set_flashdata('upload_error',$error);
	                $this->session->set_flashdata('answer_updated',2);
	        }
	        else
	        {
	                $upload_data = $this->upload->data();
	                $data['table_img'.$i]=$upload_data['file_name'];
	               
	              
	        }
		}



			}
			else {
				$data['table_id'] = trim($this->input->post('table_id1'));


		if($_FILES['question_img'.$i]['size']){
			$config['upload_path']          = './uploads/';
	        $config['allowed_types']        = 'jpeg|jpg|png';
	        $config['max_size']             = 5*1024;
	        $new_name = time();
			$config['file_name'] = $new_name;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('question_img'.$i))
	        {
					$error = $this->upload->display_errors();
	                $this->session->set_flashdata('upload_error',$error);
	                $this->session->set_flashdata('answer_updated',2);
	        }
	        else
	        {
	                $upload_data = $this->upload->data();
	                $data['table_img'.$i]=$upload_data['file_name'];
	               
	              
	        }
		      }
			}






		}
		$question_id = $this->AdminModel->add_data($data,'questions');


		      $q_ids=$this->input->post('qt_id');
		     // print_r($q_ids);exit();
		      foreach($q_ids as $q_id1){
		      	           $qdat=array('question_id'=>$question_id,'qt_id'=>$q_id1);
		      	           $this->AdminModel->add_question_insert($qdat);

		      }




		for ($i=0; $i <5 ; $i++) { 
         $transactions = explode(',',$this->input->post('transaction_ids'.$i));
				$trans_data = array();	
		if($question_id){
			foreach($transactions as $temp){
				$pemp = array('transaction_id'=>$temp,'question_id'=>$question_id,'rows'=>$i);
				array_push($trans_data,$pemp);
			}
			$this->AdminModel->update_trasaction($trans_data);
			$this->session->set_flashdata('table_created',1);
		}
		else{
			$this->session->set_flashdata('table_created',2);
		}

	    }
	
		redirect(base_url('questions'));
	}

	public function edit_question(){
		$id = $this->input->post('question_id');
		$data = array(
					'question_code'=>trim($this->input->post('edit_question_code')),
					'question_title'=>trim($this->input->post('edit_question_title')),
					//'qt_id'=>$this->input->post('qt_id') ? $this->input->post('qt_id') : 0,
					'table_id'=>trim($this->input->post('edit_table_id1')),
					'table_id2'=>trim($this->input->post('edit_table_id2')),
					'table_id3'=>trim($this->input->post('edit_table_id3')),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		for($i=1;$i<=9;$i++){
			if($i!=1){



				$key = 'table_id'.$i;
				$val = 'edit_table_id'.$i;
				$data[$key] = trim($this->input->post($val));


					if($_FILES['edit_question_img'.$i]['size']){
			$config['upload_path']          = './uploads/';
	        $config['allowed_types']        = 'jpeg|jpg|png';
	        $config['max_size']             = 5*1024;
	        $new_name = time();
			$config['file_name'] = $new_name;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('edit_question_img'.$i))
	        {
					$error = $this->upload->display_errors();
	                $this->session->set_flashdata('upload_error',$error);
	                $this->session->set_flashdata('answer_updated',2);
	        }
	        else
	        {
	                $upload_data = $this->upload->data();
	                $data['table_img'.$i]=$upload_data['file_name'];
	               
	              
	        }
		}

			}
			else {
				$data['table_id'] = trim($this->input->post('edit_table_id1'));
				if($_FILES['edit_question_img'.$i]['size']){
			$config['upload_path']          = './uploads/';
	        $config['allowed_types']        = 'jpeg|jpg|png';
	        $config['max_size']             = 5*1024;
	        $new_name = time();
			$config['file_name'] = $new_name;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('edit_question_img'.$i))
	        {
					$error = $this->upload->display_errors();
	                $this->session->set_flashdata('upload_error',$error);
	                $this->session->set_flashdata('answer_updated',2);
	        }
	        else
	        {
	                $upload_data = $this->upload->data();
	                $data['table_img'.$i]=$upload_data['file_name'];
	               
	              
	        }
		      }


			}
		}
		$question_id = $this->AdminModel->edit_question($data,$id);

		$q_ids=$this->input->post('qt_id');

		//print_r($q_ids);exit();
		    $this->AdminModel->delete_qt_table($id); 
		      foreach($q_ids as $q_id1){
		      	           $qdat=array('question_id'=>$id,'qt_id'=>$q_id1);
		      	           $this->AdminModel->add_question_insert($qdat);

		      }



		   


	    	for ($i=0; $i <5 ; $i++) { 
		$transactions = explode(',',$this->input->post('transaction_ids_edit'.$i));
		//print_r($this->input->post('transaction_ids'.$i));
		
		$trans_data = array();
		if($question_id){
			foreach($transactions as $temp){
				$pemp = array('transaction_id'=>$temp,'question_id'=>$id,'rows'=>$i);
				array_push($trans_data,$pemp);
			}
			$this->AdminModel->update_trasaction($trans_data);
			$this->session->set_flashdata('table_updated',1);
		}
		else{
			$this->session->set_flashdata('table_updated',2);
		}
	}
	
		redirect(base_url('questions'));
	}

	public function view_question11(){
		$id = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('q_id');
		$this->session->set_userdata('q_id',$id);
		$question = $this->AdminModel->get_question($id);
		$answer_img=$this->AdminModel->get_answer_img($id);

        $tr_array=array();
					for($k=0;$k<=5;$k++){
						$transactions['trans'] = $this->AdminModel->get_transaction($id,$k);
						if(!empty($transactions['trans'])){
							foreach($transactions['trans'] as $key=>$temp){
						$transactions['trans'][$key]['keywords'] = $this->AdminModel->get_keywords($temp['transaction_id']);
					}

           array_push($tr_array, $transactions);
			}
		

		}
		

				$question_ids=$this->AdminModel->get_question_ids($id);
				//echo json_encode($question_ids);exit();
        $arr=array();
                $arr_t=array();

        $arr_c=array();

        $arr_v=array();

		foreach ($question_ids as  $qt_ids) {
			$qt_id=$qt_ids['qt_id'];
        $qt_ids['qt'] = $this->AdminModel->get_question_table($qt_id);
		$qt_ids['qt_cols'] = $this->AdminModel->get_question_cols($qt_id);
		$qt_ids['qt_vals'] = $this->AdminModel->get_question_vals($qt_id);
		 array_push($arr, $qt_ids);
		 // array_push($arr_t, $question_ids['qt']);				
		 // array_push($arr_c, $question_ids['qt_cols']);				
		 // array_push($arr_v, $question_ids['qt_vals']);				
				
	    }
//$data = array_merge($data, array("cat"=>"wagon","foo"=>"baar"));

	    // $data_qt=array(
	    // 	'q_id'=>$arr,
	    // 	'qt'=>$arr_t,
	    // 	'qt_cols'=>$arr_c,
	    // 	'qt_vals'=>$arr_v

	    // );

		
		$i=0;
		$table = $this->AdminModel->get_table($question['table_id'],$id,$i);

		$table_ans1 = $this->AdminModel->get_answ_table($question['table_id'],$id);
		$table_ans2 = $this->AdminModel->get_answ_table($question['table_id2'],$id);
		$table_ans3 = $this->AdminModel->get_answ_table($question['table_id3'],$id);
		$table_ans4 = $this->AdminModel->get_answ_table($question['table_id4'],$id);
		$table_ans5 = $this->AdminModel->get_answ_table($question['table_id5'],$id);
		$table_ans6 = $this->AdminModel->get_answ_table($question['table_id6'],$id);
		$table_ans7 = $this->AdminModel->get_answ_table($question['table_id7'],$id);
		$table_ans8 = $this->AdminModel->get_answ_table($question['table_id8'],$id);
		$table_ans9 = $this->AdminModel->get_answ_table($question['table_id9'],$id);


		$table_sub_ans1 = $this->AdminModel->get_sub_answ_table($question['table_id'],$id);
		$table_sub_ans2 = $this->AdminModel->get_sub_answ_table($question['table_id2'],$id);
		$table_sub_ans3 = $this->AdminModel->get_sub_answ_table($question['table_id3'],$id);
		$table_sub_ans4 = $this->AdminModel->get_sub_answ_table($question['table_id4'],$id);
		$table_sub_ans5 = $this->AdminModel->get_sub_answ_table($question['table_id5'],$id);
		$table_sub_ans6 = $this->AdminModel->get_answ_table($question['table_id6'],$id);
		$table_sub_ans7 = $this->AdminModel->get_sub_answ_table($question['table_id7'],$id);
		$table_sub_ans8 = $this->AdminModel->get_sub_answ_table($question['table_id8'],$id);
		$table_sub_ans9 = $this->AdminModel->get_sub_answ_table($question['table_id9'],$id);
		
		$i=2;
		$table2 = $this->AdminModel->get_table($question['table_id2'],$id,$i);
		//$table_ans2 = $this->AdminModel->get_answ_table($question['table_id2']);
       
		 $i=3;$table3 = $this->AdminModel->get_table($question['table_id3'],$id,$i);
		$i=4;$table4 = $this->AdminModel->get_table($question['table_id4'],$id,$i);
		$i=5;$table5 = $this->AdminModel->get_table($question['table_id5'],$id,$i);
		$i=6;$table6 = $this->AdminModel->get_table($question['table_id6'],$id,$i);
		$i=7;$table7 = $this->AdminModel->get_table($question['table_id7'],$id,$i);
		$i=8;$table8 = $this->AdminModel->get_table($question['table_id8'],$id,$i);
		$i=9;$table9 = $this->AdminModel->get_table($question['table_id9'],$id,$i);

		if($this->session->userdata('theme')){
					$theme_id=$this->session->userdata('theme');

				}else{
							$theme_id=0;

				}

		$data = array(
					'question'=>$question,
					'transaction'=>$tr_array,
					'table1'=>$table,
					'tableans1'=>$table_ans1,
					'tableans_sub1'=>$table_sub_ans1,
					'table_width1'=>$this->AdminModel->get_table_sub_width($question['table_id']),
					// 'tableans1'=>$table_ans1,
					'table2'=>$table2,
					'tableans2'=>$table_ans2,
					'tableans_sub2'=>$table_sub_ans2,
					'table_width2'=>$this->AdminModel->get_table_sub_width($question['table_id2']),
					'table3'=>$table3,
					'tableans3'=>$table_ans3,
					'tableans_sub3'=>$table_sub_ans3,
					'table_width3'=>$this->AdminModel->get_table_sub_width($question['table_id3']),
					'table4'=>$table4,
					'tableans4'=>$table_ans4,
					'tableans_sub4'=>$table_sub_ans4,
					'table_width4'=>$this->AdminModel->get_table_sub_width($question['table_id4']),
					'table5'=>$table5,
					'tableans5'=>$table_ans5,
					'tableans_sub5'=>$table_sub_ans5,
					'table_width5'=>$this->AdminModel->get_table_sub_width($question['table_id5']),
					'table6'=>$table6,
					'tableans6'=>$table_ans6,
					'tableans_sub6'=>$table_sub_ans6,
					'table_width6'=>$this->AdminModel->get_table_sub_width($question['table_id6']),
					'table7'=>$table7,
					'tableans7'=>$table_ans7,
					'tableans_sub7'=>$table_sub_ans7,
					'table_width7'=>$this->AdminModel->get_table_sub_width($question['table_id7']),
					'table8'=>$table8,
					'tableans8'=>$table_ans8,
					'tableans_sub8'=>$table_sub_ans8,
				    'table_width8'=>$this->AdminModel->get_table_sub_width($question['table_id8']),

					'table9'=>$table9,

					'tableans9'=>$table_ans9,
					'tableans_sub9'=>$table_sub_ans9,
					'table_width9'=>$this->AdminModel->get_table_sub_width($question['table_id9']),
					//'qt'=>$qt,
					'qt_table'=>$arr,
					'theme_id'=>$theme_id,
					//'qt_cols'=>$qt_cols,
					//'qt_vals'=>$qt_vals,
					'answer_img'=>$answer_img
				);
	// 	 echo json_encode($data);
 // exit();
		$this->load->view('frontend/index_new',$data);
	}

	public function change_theme(){
		$qid=$this->session->userdata('qt_id');
		$id = $this->input->get('theme');
		$this->session->set_userdata('theme',$id);
		redirect(base_url('view-details/'.$qid));
	}

	public function table_keywords($id){
		$qt = $this->AdminModel->get_question_table_new($id);
		//print_r($qt);exit();
		$qt_cols = $this->AdminModel->get_question_cols($qt['qt_id']);
		$qt_vals = $this->AdminModel->get_question_vals($qt['qt_id']);
		
		
          $arr=array();
		foreach ($qt_vals as $key => $value) {
           $keywords = explode(';',$value['val_keys']);
           $keywords_new = implode(',',$keywords);
           // $ff=implode(glue, pieces)
        //echo json_encode($keywords_new);exit();
           $value['val_keys']=$keywords_new;
           array_push($arr, $value);
			
		}
		//exit();
		$data = array(
					'qt'=>$qt,
					'qt_cols'=>$qt_cols,
					'qt_vals'=>$arr
				);

		//print_r($data['qt_vals']);exit();
		$this->load->view('backend/header');
		$this->load->view('backend/table_keywords',$data);
		$this->load->view('backend/footer');
	}

	public function answers($id){
		$data['question'] = $this->AdminModel->get_question($id);
		$data['answers'] = $this->AdminModel->list_answers($id);
		$table_list=array();
  		$table1=$data['question']['table_id'];
  		$table_name1=$this->AdminModel->list_answer_table($table1);
  		$temp = array('name'=>$table_name1,'id'=>$table1);
  		array_push($table_list, $temp);
  		$table2=$data['question']['table_id2'];
  		$table_name2=$this->AdminModel->list_answer_table($table2);
  		$temp2 = array('name'=>$table_name2,'id'=>$table2);
  		array_push($table_list, $temp2);
  		$table3=$data['question']['table_id3'];
  		$table_name3=$this->AdminModel->list_answer_table($table3);
  		$temp3 = array('name'=>$table_name3,'id'=>$table3);
  		array_push($table_list, $temp3);
  		$table4=$data['question']['table_id4'];
  		$table_name4=$this->AdminModel->list_answer_table($table4);
  		$temp4 = array('name'=>$table_name4,'id'=>$table4);
  		array_push($table_list, $temp4);
  		$table5=$data['question']['table_id5'];
  		$table_name5=$this->AdminModel->list_answer_table($table5);
  		$temp5 = array('name'=>$table_name5,'id'=>$table5);
  		array_push($table_list, $temp5);
  		$table6=$data['question']['table_id6'];
  		$table_name6=$this->AdminModel->list_answer_table($table6);
  		$temp6 = array('name'=>$table_name6,'id'=>$table6);
  		array_push($table_list, $temp6);
        $table7=$data['question']['table_id7'];
        $table_name7=$this->AdminModel->list_answer_table($table7);
        $temp7= array('name'=>$table_name7,'id'=>$table7);
  		array_push($table_list, $temp7);

  		$data['answer_table']=$table_list;
  		//print_r($data['answer_table=']);



		$this->load->view('backend/header');
		$this->load->view('backend/answers',$data);
		$this->load->view('backend/footer');
	}

	public function add_answer($id){
		if($_FILES['answer_file']['size']){
			$config['upload_path']          = './uploads/';
	        $config['allowed_types']        = 'jpeg|jpg|png';
	        $config['max_size']             = 5*1024;
	        $new_name = time();
			$config['file_name'] = $new_name;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('answer_file'))
	        {
					$error = $this->upload->display_errors();
	                $this->session->set_flashdata('upload_error',$error);
	                $this->session->set_flashdata('answer_updated',2);
	        }
	        else
	        {
	                $upload_data = $this->upload->data();
	                $data = array(
							'answer_image'=>$upload_data['file_name'],
							'question_id'=>$id,
							'updated_by'=>$this->session->userdata('admin_id'),
							'created_on'=>time(),
							'updated_on'=>time()
						);
	                if($this->AdminModel->add_data($data,'answers')){
	                	$this->session->set_flashdata('answer_updated',1);
	                }
	                else{
	                	$this->session->set_flashdata('upload_error','Insertion error! Please contact tech support!');
	                	$this->session->set_flashdata('answer_updated',2);
	                }
	        }
		}
		redirect(base_url('answers/'.$id));
	}

	public function delete_answer($id,$qid){
		if($this->AdminModel->delete_answer($id)){
			$this->session->set_flashdata('answer_updated',3);
		}
		else{
			$this->session->set_flashdata('upload_error','Error! Please contact tech support!');
	        $this->session->set_flashdata('answer_updated',2);
		}
		redirect(base_url('answers/'.$qid));
	}


	



public function practise_filter(){
		$filter = array(
						'name' => $this->input->post('filter_name') ? $this->input->post('filter_name') : '',
						
					);
		$this->session->set_userdata('practise_filter',$filter);
		redirect(base_url('questions_list'));
	}


	public function questions_list(){
		$id = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('chapter_id');
		//if(!$id) redirect(base_url('questions_list'));
		//$this->session->set_userdata('chapter_id',$id);
				$filter = $this->session->userdata('practise_filter');


		$filter_data = array(
					'name'=> isset($filter['name'])? $filter['name']:'',
			);
		$this->load->library('pagination');

		$config['base_url'] = base_url('questions_list');
		//$config['total_rows']=10;
		$config['total_rows'] = $this->AdminModel->count_questions_new($filter_data);
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
		$course=0;
		$chpt=2;
		$papr=1;
		$body_data = array(
							//'questions'=>array(),
							'questions'=>$this->AdminModel->list_questions_new($limit,$offset,$filter_data),

							// 'qt_ids'=>$this->AdminModel->list_questions_table_ids($id),
							'tables'=>$this->AdminModel->list_all_tables(),
							'courses'=>$this->AdminModel->list_all_data($course),

							'chapters'=>$this->AdminModel->list_all_data($chpt),

							'papers'=>$this->AdminModel->list_all_data($papr),

							'links'=>$links,
							'offset'=>$offset,
														'filter_data' => $filter_data,

						);
		//print_r($body_data['questions']);exit();

		$this->load->view('backend/header');
		$this->load->view('backend/pre_question_list',$body_data);
		$this->load->view('backend/footer');
	}



		public function problem_format(){
		//$id = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('chapter_id');
		//if(!$id) redirect(base_url('questions_list'));
		//$this->session->set_userdata('chapter_id',$id);
		$this->load->library('pagination');

		// $config['base_url'] = base_url('questions_list');
		// $config['total_rows']=10;
		// //$config['total_rows'] = $this->AdminModel->count_questions($id);
		// $config['per_page'] = $limit = 10;
		// $config['prev_tag_open'] = '<li>';
		// $config['prev_tag_close'] = '</li>';
		// $config['num_tag_open'] = '<li>';
		// $config['num_tag_close'] = '</li>';
		// $config['next_tag_open'] = '<li>';
		// $config['next_tag_close'] = '</li>';
		// $config['cur_tag_open'] = '<li>';
		// $config['cur_tag_close'] = '</li>';
		// $config['first_tag_open'] = '<li>';
		// $config['first_tag_close'] = '</li>';
		// $config['last_tag_open'] = '<li>';
		// $config['last_tag_close'] = '</li>';

		// $this->pagination->initialize($config);

		// $links = $this->pagination->create_links();
		// $offset = $this->uri->segment(2);
		// $course=0;
		// $chpt=2;
		// $papr=1;
		$body_data = array(
							'questions'=>array(),
							// 'qt_ids'=>$this->AdminModel->list_questions_table_ids($id),
							'tables'=>$this->AdminModel->list_all_tables(),
							// 'courses'=>$this->AdminModel->list_all_data($course),

							// 'chapters'=>$this->AdminModel->list_all_data($chpt),

							// 'papers'=>$this->AdminModel->list_all_data($papr),

							// 'links'=>$links,
							// 'offset'=>$offset
						);
		$this->load->view('backend/header');
		$this->load->view('backend/problem_format',$body_data);
		$this->load->view('backend/footer');
	}



	public function add_question_new(){


//print_r($this->input->post('qst_keywords'));exit();
		$keywords = explode(',',$this->input->post('qst_keywords'));

		$data = array(
					'chapter_id'=>0,
					'question_code'=>$this->input->post('question'),
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);


		$qid=$this->AdminModel->add_data($data,'questions');
		if($qid){


				$keyword_data = array();
			foreach($keywords as $temp){
					$keywords_val = explode(';',$temp);
				foreach($keywords_val as $val_key){

					$pemp = array('tag'=>$val_key,'question_id'=>$qid);
				//array_push($keyword_data,$pemp);
				$qry=$this->AdminModel->add_keywords_question($pemp);
					//print_r($pemp);

				}
					
				
			}



			$this->session->set_flashdata('question_created',1);
		}
		else $this->session->set_flashdata('question_created',2);
		redirect(base_url('questions_list_add/'.$qid));
	}


	


	


function add_table_ajax(){


		//print_r($this->input->post());exit();




		$check_one = $this->input->post('column_check0') ? 1 : 0;
		$check_two = $this->input->post('column_check1') ? 1 : 0;
        $check_three = $this->input->post('column_check2') ? 1 : 0;
		$check_four = $this->input->post('column_check3') ? 1 : 0;
		$check_five = $this->input->post('column_check4') ? 1 : 0;
		$check_six = $this->input->post('column_check5') ? 1 : 0;
		$check_seven = $this->input->post('column_check6') ? 1 : 0;
		$check_eight = $this->input->post('column_check7') ? 1 : 0;
		$check_nine = $this->input->post('column_check8') ? 1 : 0;
		$check_ten = $this->input->post('column_check9') ? 1 : 0;
		$check_11 = $this->input->post('column_check10') ? 1 : 0;
		$check_12 = $this->input->post('column_check11') ? 1 : 0;
		$check_13 = $this->input->post('column_check12') ? 1 : 0;
		$check_14 = $this->input->post('column_check13') ? 1 : 0;
	    $check_15 = $this->input->post('column_check14') ? 1 : 0;
	    $check_16 = $this->input->post('column_check15') ? 1 : 0;




		$data = array(
					'table_name'=>trim($this->input->post('table_name')),
					'table_columns'=>trim($this->input->post('col_no')),
					'table_single_width'=>trim($this->input->post('single_width')),
					'table_left_title'=>trim($this->input->post('left_name')),
					'table_right_title'=>trim($this->input->post('right_name')),
					'header_note'=>$this->input->post('header_note'),
					'footer_note'=>$this->input->post('footer_note'),


					
					'column_one_name'=>trim($this->input->post('column_name0')),
					'column_two_name'=>trim($this->input->post('column_name1')),
					'column_three_name'=>trim($this->input->post('column_name2')),
					'column_four_name'=>trim($this->input->post('column_name3')),
					'column_five_name'=>trim($this->input->post('column_name4')),
					'column_six_name'=>trim($this->input->post('column_name5')),
					'column_seven_name'=>trim($this->input->post('column_name6')),
					'column_eight_name'=>trim($this->input->post('column_name7')),
					'column_nine_name'=>trim($this->input->post('column_name8')),
					'column_ten_name'=>trim($this->input->post('column_name9')),
					'column_eleven_name'=>trim($this->input->post('column_name10')),
										'column_twelve_name'=>trim($this->input->post('column_name11')),

					'column_thirteen_name'=>trim($this->input->post('column_name12')),
					'column_fourteen_name'=>trim($this->input->post('column_name13')),
					'column_fifteen_name'=>trim($this->input->post('column_name14')),


					'column_one_width'=>trim($this->input->post('column_width0')),
					'column_two_width'=>trim($this->input->post('column_width1')),
					'column_three_width'=>trim($this->input->post('column_width2')),
					'column_four_width'=>trim($this->input->post('column_width3')),
					'column_five_width'=>trim($this->input->post('column_width4')),
					'column_six_width'=>trim($this->input->post('column_width5')),
					'column_seven_width'=>trim($this->input->post('column_width6')),
					'column_eight_width'=>trim($this->input->post('column_width7')),
					'column_nine_width'=>trim($this->input->post('column_width8')),
					'column_ten_width'=>trim($this->input->post('column_width9')),
								'column_eleven_width'=>trim($this->input->post('column_width10')),
								'column_twelve_width'=>trim($this->input->post('column_width11')),
								'column_thirteen_width'=>trim($this->input->post('column_width12')),
								'column_fourteen_width'=>trim($this->input->post('column_width13')),

								'column_fifteen_width'=>trim($this->input->post('column_width14')),



					'column_one_sum'=>$check_one,
					'column_two_sum'=>$check_two,
					'column_three_sum'=>$check_three,
					'column_four_sum'=>$check_four,
					'column_five_sum'=>$check_five,
					'column_six_sum'=>$check_six,
					'column_seven_sum'=>$check_seven,
					'column_eight_sum'=>$check_eight,
					'column_nine_sum'=>$check_nine,
					'column_ten_sum'=>$check_ten,
					'column_eleven_sum'=>$check_11,

					'column_twelve_sum'=>$check_12,

					'column_thirteen_sum'=>$check_13,

					'column_fourteen_sum'=>$check_14,
					'column_fifteen_sum'=>$check_15,


					'count_one_table'=>trim($this->input->post('count_sub_0_column')),
					'count_two_table'=>trim($this->input->post('count_sub_1_column')),
					'count_three_table'=>trim($this->input->post('count_sub_2_column')),
					'count_four_table'=>trim($this->input->post('count_sub_3_column')),
					'count_five_table'=>trim($this->input->post('count_sub_4_column')),
					'count_six_table'=>trim($this->input->post('count_sub_5_column')),
					'count_seven_table'=>trim($this->input->post('count_sub_6_column')),
					'count_eight_table'=>trim($this->input->post('count_sub_7_column')),
					'count_nine_table'=>trim($this->input->post('count_sub_8_column')),
					'count_ten_table'=>trim($this->input->post('count_sub_9_column')),
						'count_eleven_table'=>trim($this->input->post('count_sub_10_column')),
					'count_twelve_table'=>trim($this->input->post('count_sub_11_column')),

					'count_thirteen_table'=>trim($this->input->post('count_sub_12_column')),

					'count_fourteen_table'=>trim($this->input->post('count_sub_13_column')),

					'count_fifteen_table'=>trim($this->input->post('count_sub_14_column')),

					// 'count_ten_table'=>trim($this->input->post('count_sub_9_column')),


					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);


// print_r($data);exit();


         $t_id=$this->AdminModel->add_data($data,'tables');

                 // $table=$this->AdminModel->get_table_new($t_id);



		if($t_id){
			for ($i=0; $i <9 ; $i++) { 
						if($this->input->post('col_width'.$i)){
							$wid=rtrim($this->input->post('col_width'.$i), ',');
							$sum_sub=rtrim($this->input->post('col_sub_sum'.$i), ',');
							$colwidth = explode(',',$wid);
							$subsum = explode(',',$sum_sub);
							//print_r($colwidth);exit();

									$width = array();	
									
							// if($question_id){
								foreach($colwidth as $key => $temp){
									$pemp = array('column_id'=>$i,'table_id'=>$t_id,'width'=>$temp,'is_sum'=>$subsum[$key]);
									array_push($width,$pemp);
								}
								$this->AdminModel->insert_table_width($width);
								//$this->session->set_flashdata('table_created',1);

								$out = array('status'=>1,'message'=>'gghhgghhg','data'=>$t_id);
							// }
							// else{
							// 	$this->session->set_flashdata('table_created',2);
							// }
						}
					        
					        			
 

						    }

						    if(trim($this->input->post('table_type'))=='quest'){
						    	$order=trim($this->input->post('order_id_new'));
						    	$qt_id = $this->session->userdata('qt_id');


						    	       $checkorder=$this->AdminModel->check_question_table($order,$qt_id);
						    	                 // $quest_table_name = $this->input->post('tablename') ? $this->input->post('tablename') :$table['table_name'];

										      if(empty($checkorder)){

										      	$data = array(
															'question_id'=>$qt_id,
															'qt_id'=>$t_id,
															'created_on'=>time(),
															'order_id'=>$order,
															'quest_table_name'=>trim($this->input->post('table_name'))
															//'updated_on'=>time(),
															//'created_by'=>$this->session->userdata('admin_id')
														);

										      		$type=2;
      	$check_priority=$this->AdminModel->check_question_priority($order,$qt_id,$type);
      	if($check_priority){
      		$data['priority']=$check_priority;

      	}


												$out1 = $this->AdminModel->add_data($data,'q_table');
														//$out = array('status'=>1);




										      }else{


										      	$data = array(
															//'question_id'=>$id,
															'qt_id'=>$t_id,
															'quest_table_name'=>trim($this->input->post('table_name'))

															//'created_on'=>time(),
															//'order_id'=>$order,
															//'updated_on'=>time(),
															//'created_by'=>$this->session->userdata('admin_id')
														);
										      	      //print_r($data);exit();

										      									      		$type=2;
      	$check_priority=$this->AdminModel->check_question_priority($order,$qt_id,$type);
      	if($check_priority){
      		$data['priority']=$check_priority;

      	}




			$out1 = $this->AdminModel->update_question_table($data,$qt_id,$order);


										      }



										      $table=$this->AdminModel->get_table_new($t_id);

// print_r($table_det);exit();
				        	// foreach ($table_det as $key => $table) {
				        		 $cols_count = array($table['count_one_table'],$table['count_two_table'],$table['count_three_table'],$table['count_four_table'],$table['count_five_table'],$table['count_six_table'],$table['count_seven_table'],$table['count_eight_table'],$table['count_nine_table'],$table['count_ten_table'],$table['count_eleven_table'],$table['count_twelve_table'],$table['count_thirteen_table'],$table['count_fourteen_table'],$table['count_fifteen_table']);

				        	//}



									$cols=$table['table_columns'];
									

									//print_r($cols);exit();

									for ($i=0; $i <$cols ; $i++) {
										// 	$data['row_count'.$i] = $this->input->post('row_count_'.$i);
										// $data['row_value'.$i] = $this->input->post('row_value_'.$i);
										// $data['underline0'.$i] = $this->input->post('is_underline'.$i);
										 $answer_sub=array();

										
										if($cols_count[$i]>0){
											//echo "string";

															//$rows = count($this->input->post('row_count_'.$i));

													


											 	 // for ($j=0; $j <$rows ; $j++) { 
											 	  	$arr=array();

								 for ($k=0; $k <$cols_count[$i] ; $k++) { 
											 	  			           	// $row_value0 = $this->input->post('row_value_'.$i.$k.'');
											 	  			           	// 		 	  $row_line0 = $this->input->post('is_underline_'.$i.$k.'');

											 	  // $row_line0 = $this->input->post('is_underline_0'.$i.'')? 1 : 0;
											 	  //$row_line0 = $this->input->post('is_underline_'.$i.$k.'');


													// 		 	$array = array(
													// 	'qt_id'=>$qt_id,
													// 	'col_no'=>$i,
													// 	'row_no'=>$j,
													// 	'val_value'=>$row_value0,
													// 	//'val_keys'=>$keys[$r]
													// );


											 	   $arr1['col_no']=$i;
											 	  $arr1['val_value']='';
											 	   $arr1['val_underline']=0;
											 	    $arr1['order_id']=$order;
											 	   
											 	   // $arr1['sub_line']=$row_line0;
											 	   $arr1['question_id']=$qt_id;
											 	    $arr1['sub_id']=$k;
											 	  $arr1['row_no']=0;
											 	   $arr1['qt_id']=$t_id;
											 	   array_push($arr,$arr1);

															 	//print_r($row_value0);
															          // $t_id=$this->AdminModel->add_data($array,'vals');
										

															 }

											array_push($answer_sub,$arr);


															 						//print_r($array);


														# code...
													//}
				        	


										}else{


													//$rows = count($this->input->post('row_count_'.$i));
													//for ($j=0; $j <$rows ; $j++) { 

															 	$array = array(
														'qt_id'=>$t_id,
														'question_id'=>$qt_id,
														'col_no'=>$i,
														'order_id'=>$order,
														'val_underline'=>0,

														'row_no'=>0,
														'val_value'=>'',
														//'val_keys'=>$keys[$r]
													);

												 $t_id1=$this->AdminModel->add_data($array,'vals');
										 						//print_r($array);


														# code...
													//}


										}

															// $underline0 = $this->input->post('is_underline0');

 // print_r($answer_sub);
									if(!empty($answer_sub[0])){
														$t_id1 = $this->AdminModel->add_sub_qst_insert($answer_sub[0],'vals');

												}

									}
									//exit();





						    }

						   $out = array('status'=>1,'message'=>'created','data'=>$t_id);



		}
		else{
			$out = array('status'=>0,'message'=>'failed');

			//$this->session->set_flashdata('table_created',2);
		}
        echo json_encode($out);

	}


public function questions_list_add(){

				$qid = $this->uri->segment(2);


		$id = $this->uri->segment(2) ? $this->uri->segment(2) : $this->session->userdata('qt_id');


		//if(!$id) redirect(base_url('questions_list'));
		$this->session->set_userdata('qt_id',$id);


		$question_ids=$this->AdminModel->get_question_ids_by_id($id);

						

				             
								// for($k=0;$k<=5;$k++){
								// 				$transactions['trans'] = $this->AdminModel->get_transaction($id,$k);
								// 				if(!empty($transactions['trans'])){
								// 			// 		foreach($transactions['trans'] as $key=>$temp){
								// 			// 	$transactions['trans'][$key]['keywords'] = $this->AdminModel->get_keywords($temp['transaction_id']);
								// 			// }

						  //          array_push($tr_array, $transactions);
								// 	}
								

								// }



						$arr=array();
						 

						foreach ($question_ids as  $qt_ids) {
						$qt_id=$qt_ids['qt_id'];
						$qid=$qt_ids['id'];
						$orderid=$qt_ids['order_id'];

						$qtext_id=$qt_ids['text_id'];
						$transaction_ids=$qt_ids['transaction_id'];

						$priorities=$qt_ids['priority'];

						$priority_ids1 = explode(',',$priorities);
						//print_r($priority_ids1);

						    if($priority_ids1[0]==''){
$priority_ids1=array('0'=>1,
  '2'=>2,
  '3'=>3);
            }

						$qt_ids['priority_vals'] = $priority_ids1;
       					$qt_ids['qt'] = $this->AdminModel->get_table_by_id($qt_id);

              			$qt_ids['qt_text'] = $this->AdminModel->get_question_text_id($qtext_id);



		$qt_ids['qt_cols'] = $this->AdminModel->get_table_by_id($qt_id);
		$qt_ids['qt_vals'] = $this->AdminModel->get_question_vals($qt_id,$id,$orderid);
		if(!empty($qt_ids['qt_vals'])){
		//$qt_ids['rows']=max(array_column($qt_ids['qt_vals'], 'row_no'));
			$row=$this->AdminModel->get_question_vals_count($qt_id,$id,$orderid);

				$qt_ids['rows']=$row['rowcount']-1;

         }

		//$rownno=
		//echo $rownno;exit();

		$tr_array=array();


					$transaction_ids1 = explode(',',$transaction_ids);

					foreach ($transaction_ids1 as $key => $value_tr) {
						# code...
					

					$transactions = $this->AdminModel->get_transaction_new($id,$value_tr);
					//print_r($transactions);

								if(!empty($transactions)){
											 		foreach($transactions as $key=>$temp){
											 	$transactions[$key]['keywords'] = $this->AdminModel->get_keywords($temp['transaction_id']);
											 }

						           array_push($tr_array, $transactions);
									}

									}
		$qt_ids['transactions'] = $tr_array;



		 array_push($arr, $qt_ids);
		 // array_push($arr_t, $question_ids['qt']);				
		 // array_push($arr_c, $question_ids['qt_cols']);				
		 // array_push($arr_v, $question_ids['qt_vals']);				
				
	    }




   
 //exit();



	    					$p_arr=array();


		$problem_format = $this->AdminModel->get_problem_format($id);


		foreach ($problem_format as $key => $format) {


						$table=$format['table_id'];
						$format['p_cols'] = $this->AdminModel->get_table_by_id($table);
					    $format['p_vals'] = $this->AdminModel->get_problem_values_modify($table,$id);


					    		 array_push($p_arr, $format);


            }
		$this->load->library('pagination');

		$config['base_url'] = base_url('questions_list');
		// $config['total_rows']=10;
		// //$config['total_rows'] = $this->AdminModel->count_questions($id);
		// $config['per_page'] = $limit = 10;
		// $config['prev_tag_open'] = '<li>';
		// $config['prev_tag_close'] = '</li>';
		// $config['num_tag_open'] = '<li>';
		// $config['num_tag_close'] = '</li>';
		// $config['next_tag_open'] = '<li>';
		// $config['next_tag_close'] = '</li>';
		// $config['cur_tag_open'] = '<li>';
		// $config['cur_tag_close'] = '</li>';
		// $config['first_tag_open'] = '<li>';
		// $config['first_tag_close'] = '</li>';
		// $config['last_tag_open'] = '<li>';
		// $config['last_tag_close'] = '</li>';

		// $this->pagination->initialize($config);

		// $links = $this->pagination->create_links();
		// $offset = $this->uri->segment(2);
				$this->load->model('PresentationModel');

		$course=0;
		$chpt=2;
		$papr=1;
		$body_data = array(
							'questions'=>array(),
							// 'qt_ids'=>$this->AdminModel->list_questions_table_ids($id),
							'tables'=>$this->AdminModel->list_all_tables(),
							'tables_problem'=>$this->AdminModel->list_all_tables_problem(),
							


							'tables_format'=>$this->AdminModel->list_all_tables_format(),
							//'courses'=>$this->AdminModel->list_all_data($course),

							//'chapters'=>$this->AdminModel->list_all_data($chpt),

							//'papers'=>$this->AdminModel->list_all_data($papr),
							'questionid'=>$id,
							'qt_table'=>$arr,
							 // 'transactions'=>$tr_array,
							'problem_format'=>$p_arr,
					       //  'images'=>$this->AdminModel->list_images(),


							// 'links'=>$links,
							// 'offset'=>$offset
						);


		//print_r($body_data['tables_problem']);exit();
		$this->load->view('backend/header');
		$this->load->view('backend/question_list',$body_data);
		$this->load->view('backend/footer');
	}

	


	function edit_problem_format(){

		$q_id=$this->session->userdata('qt_id');



		// $data = array(
		// 			'question_id'=>trim($this->session->userdata('qt_id')),
		// 			//'table_single_width'=>trim($this->input->post('table_width')),
		// 			'table_id'=>trim($this->input->post('table_id')),
					
				
		// 			'created_on'=>time(),
		// 			//'updated_on'=>time(),
		// 			'created_by'=>$this->session->userdata('admin_id')
		// 		);


  //        $t_id=$this->AdminModel->add_data($data,'problem_format');
		// if($t_id){

			         $data['tabledet']=$this->AdminModel->get_table_by_id($this->input->post('table_id'));
			         $format_nmae_det=$this->AdminModel->get_checkformat($this->input->post('table_id'),$q_id);
			         $data['format_name']=$format_nmae_det['format_name'];

			         $data['problem_sub'] = $this->AdminModel->get_problem_values_modify($this->input->post('table_id'));

			         $data['problem_sub_row'] = $this->AdminModel->get_problem_values_row_count($this->input->post('table_id'));
// print_r($data['problem_sub_row']);exit();


			
			$out = array('status'=>1,'message'=>'created','data'=>$data);

		// }
		// else{
		// 	$out = array('status'=>0,'message'=>'failed');

		// 	//$this->session->set_flashdata('table_created',2);
		// }
        echo json_encode($out);

	}


	function add_problem_format(){


		// $data = array(
		// 			'question_id'=>trim($this->session->userdata('qt_id')),
		// 			//'table_single_width'=>trim($this->input->post('table_width')),
		// 			'table_id'=>trim($this->input->post('table_id')),
					
				
		// 			'created_on'=>time(),
		// 			//'updated_on'=>time(),
		// 			'created_by'=>$this->session->userdata('admin_id')
		// 		);


  //        $t_id=$this->AdminModel->add_data($data,'problem_format');
		// if($t_id){
			         $tabledet=$this->AdminModel->get_table_by_id($this->input->post('table_id'));

			
			$out = array('status'=>1,'message'=>'created','data'=>$tabledet);

		// }
		// else{
		// 	$out = array('status'=>0,'message'=>'failed');

		// 	//$this->session->set_flashdata('table_created',2);
		// }
        echo json_encode($out);

	}

	function add_problem_format_exist(){
		$q_id=$this->session->userdata('qt_id');

		// if($t_id){
			       $data1['tabledet']=$this->AdminModel->get_table_by_id($this->input->post('table_id'));

			             // $tabledet=$this->AdminModel->get_table_by_id($this->input->post('table_id'));
			      $data1['problem_sub'] = $this->AdminModel->get_problem_values_modify($this->input->post('table_id'));

			      $data1['problem_sub_row'] = $this->AdminModel->get_problem_values_row_count($this->input->post('table_id'));

			  //  print_r($data1['problem_sub']);exit();

			      if(!empty($data1['problem_sub'])){

			      	$checkdet=$this->AdminModel->get_checkformat($this->input->post('table_id'),$q_id);
		   //print_r($checkdet);exit();
		          if(empty($checkdet)){

                         
		          	$data = array(
							'question_id'=>trim($this->session->userdata('qt_id')),
							//'table_single_width'=>trim($this->input->post('table_width')),
							'table_id'=>trim($this->input->post('table_id')),
						 'format_name'=>$data1['tabledet']['table_name'],
							
						
							'created_on'=>time(),
							//'updated_on'=>time(),
							'created_by'=>$this->session->userdata('admin_id')
						);


         $f_id=$this->AdminModel->add_data($data,'problem_format');


    //        $table=$this->AdminModel->get_table_new($this->input->post('table_id'));

		  //      $cols_count = array($table['count_one_table'],$table['count_two_table'],$table['count_three_table'],$table['count_four_table'],$table['count_five_table'],$table['count_six_table'],$table['count_seven_table'],$table['count_eight_table'],$table['count_nine_table'],$table['count_ten_table']);

		  //      	$cols=$table['table_columns'];
		  //      for ($i=0; $i <$cols ; $i++) {
		  //      	        for ($j=0; $j <1 ; $j++) { 
		  //      	        	if($cols_count[$i]<=0){
		       	        		

		  //      	        	$datanew = array(
				// 	// 'question_id'=>trim($this->session->userdata('qt_id')),
				// 	//'table_single_width'=>trim($this->input->post('table_width')),
				// 	'table_id'=>trim($this->input->post('table_id')),
				// 	'column_id'=>$i,
				// 	'row_id'=>$j,
				// 	//'p_format_id'=>$f_id,
				// 	 'sub_id'=>0,
				// 	 'sub_status'=>0,
				// 	 'col_value'=>'',
				// 	 'col_help_text'=>'',
				// 	// 'row_id'=>trim($this->input->post('rows'))

				
				// 	'created_on'=>time(),
				// 	//'updated_on'=>time(),
				// 	'created_by'=>$this->session->userdata('admin_id')
				// );
    //                     $dsffd=$this->AdminModel->add_data($datanew,'problem_format_values');



		  //      	        		}else{

		  //      	             for ($k=0; $k <$cols_count[$i] ; $k++) { 


		  //      	        	$datanew = array(
				// 	// 'question_id'=>trim($this->session->userdata('qt_id')),
				// 	//'table_single_width'=>trim($this->input->post('table_width')),
				// 	'table_id'=>trim($this->input->post('table_id')),
				// 	'column_id'=>$i,
				// 	'row_id'=>$j,
				// 	//'p_format_id'=>$f_id,
				// 	 'sub_id'=>$k,
				// 	 'sub_status'=>1,
				// 	 'col_value'=>'',
				// 	 'col_help_text'=>'',


				// 	// 'row_id'=>trim($this->input->post('rows'))

				
				// 	'created_on'=>time(),
				// 	//'updated_on'=>time(),
				// 	'created_by'=>$this->session->userdata('admin_id')
				// );


    //                     $dsffd=$this->AdminModel->add_data($datanew,'problem_format_values');



		  //      	             	}





		  //      	        		}
		       	        	


		  //      	        }



		  //      }

		    

		          }




			      }




			
			$out = array('status'=>1,'message'=>'created','data'=>$data1);

		// }
		// else{
		// 	$out = array('status'=>0,'message'=>'failed');

		// 	//$this->session->set_flashdata('table_created',2);
		// }
        echo json_encode($out);

	}



	function add_copy_excel_format(){


		        		//print_r($_FILES);exit();
//print_r($this->input->post('array'));exit();


		        $q_id=$this->session->userdata('qt_id');
		        $arr=$this->input->post('array');
		       // echo $q_id;exit();

		       	//$q_id=$this->input->post('q_id');
		       // 	$col=$this->input->post('column');
		       // //	$sub=$this->input->post('sub');


		       // 	$sub = $this->input->post('sub') ? $this->input->post('sub') :0;


		       // 	$row=$this->input->post('rows');

		   $checkdet=$this->AdminModel->get_checkformat($this->input->post('table'),$q_id);
		   //print_r($checkdet);exit();
		          if(empty($checkdet)){

		          	$data = array(
							'question_id'=>trim($this->session->userdata('qt_id')),
							//'table_single_width'=>trim($this->input->post('table_width')),
							'table_id'=>trim($this->input->post('table')),
							// 'format_name'=>trim($this->input->post('table_name')),
							
						
							'created_on'=>time(),
							//'updated_on'=>time(),
							'created_by'=>$this->session->userdata('admin_id')
						);


         $f_id=$this->AdminModel->add_data($data,'problem_format');

         $table=$this->AdminModel->get_table_new($this->input->post('table'));

		       $cols_count = array($table['count_one_table'],$table['count_two_table'],$table['count_three_table'],$table['count_four_table'],$table['count_five_table'],$table['count_six_table'],$table['count_seven_table'],$table['count_eight_table'],$table['count_nine_table'],$table['count_ten_table'],$table['count_eleven_table'],$table['count_twelve_table'],$table['count_thirteen_table'],$table['count_fourteen_table'],$table['count_fifteen_table']);

		       	$cols=$table['table_columns'];
		  //      for ($i=0; $i <$cols ; $i++) {
		  //      	        for ($j=0; $j <1 ; $j++) { 
		  //      	        	if($cols_count[$i]<=0){
		       	        		

		  //      	        	$datanew = array(
				// 	// 'question_id'=>trim($this->session->userdata('qt_id')),
				// 	//'table_single_width'=>trim($this->input->post('table_width')),
				// 	'table_id'=>trim($this->input->post('table')),
				// 	'column_id'=>$i,
				// 	'row_id'=>$j,
				// 	//'p_format_id'=>$f_id,
				// 	 'sub_id'=>0,
				// 	 'sub_status'=>0,
				// 	 'col_value'=>'',
				// 	 'col_help_text'=>'',
				// 	// 'row_id'=>trim($this->input->post('rows'))

				
				// 	'created_on'=>time(),
				// 	//'updated_on'=>time(),
				// 	'created_by'=>$this->session->userdata('admin_id')
				// );
    //                     $dsffd=$this->AdminModel->add_data($datanew,'problem_format_values');



		  //      	        		}else{

		  //      	             for ($k=0; $k <$cols_count[$i] ; $k++) { 


		  //      	        	$datanew = array(
				// 	// 'question_id'=>trim($this->session->userdata('qt_id')),
				// 	//'table_single_width'=>trim($this->input->post('table_width')),
				// 	'table_id'=>trim($this->input->post('table')),
				// 	'column_id'=>$i,
				// 	'row_id'=>$j,
				// 	//'p_format_id'=>$f_id,
				// 	 'sub_id'=>$k,
				// 	 'sub_status'=>1,
				// 	 'col_value'=>'',
				// 	 'col_help_text'=>'',


				// 	// 'row_id'=>trim($this->input->post('rows'))

				
				// 	'created_on'=>time(),
				// 	//'updated_on'=>time(),
				// 	'created_by'=>$this->session->userdata('admin_id')
				// );


    //                     $dsffd=$this->AdminModel->add_data($datanew,'problem_format_values');



		  //      	             	}





		  //      	        		}
		       	        	


		  //      	        }



		  //      }

		          }else{
		          	$f_id=$checkdet['p_format_id'];

		          }

		       
// print_r($arr);exit();

						foreach ($arr as $key => $value) {


								$col=$value['column'];
								$row=$value['row'];
		       //	$sub=$this->input->post('sub');


						       	$sub = $value['sub'] ? $value['sub'] :0;



						       $row=$value['row'];


								if($value['sub']!=''){

		                            $substatus=1;

		         		          }else{
		         		          	$substatus=0; 

		         		          }


         		       $tabledet=$this->AdminModel->get_format_by_table($this->input->post('table'),$q_id,$col,$row,$sub);


         		       if(!empty($tabledet)){


       			          // if(!empty($sub)){ 




       			          // }

				       	$data=array();
				       	$table=$this->input->post('table');



       	// if($this->input->post('type')=='text'){

             			$data['col_value'] = $value['val'];   
        	


        	$t_id=$this->AdminModel->edit_format_values($data,$table,$q_id,$col,$row,$sub);





       }
        else{




        	$data = array(
					//'question_id'=>trim($this->session->userdata('qt_id')),
					//'table_single_width'=>trim($this->input->post('table_width')),
					'table_id'=>trim($this->input->post('table')),
					'column_id'=>$col,
					'row_id'=>$row,
					//'p_format_id'=>$f_id,
					'sub_id'=>$sub,
					'sub_status'=>$substatus,
					// 'row_id'=>trim($this->input->post('rows'))

				
					'created_on'=>time(),
					//'updated_on'=>time(),
					'created_by'=>$this->session->userdata('admin_id')
				);


        

             $data['col_value'] = $value['val'];   
        	



         $t_id=$this->AdminModel->add_data($data,'problem_format_values');

        } 




							
						}

				       	
          		          




 //          		          if($this->input->post('sub')!=''){
 // print_r('hchxhcxc');exit();


 //          		          }

 //          		           print_r('lll');exit();






		//$tabledet=$this->AdminModel->get_format_by_table_sub($this->input->post('table_id'),$q_id,$col,$row);
//
           

		
		if($t_id){
			        // $tabledet=$this->AdminModel->get_table_by_id($this->input->post('table_id'));

			
			$out = array('status'=>1,'message'=>'created','data'=>$tabledet,'problem_id'=>$t_id);

		}
		else{
			$out = array('status'=>0,'message'=>'failed');

			//$this->session->set_flashdata('table_created',2);
		}
        echo json_encode($out);

		



	}

	


	function add_format_values(){

		        		//print_r($_FILES);exit();

		        $q_id=$this->session->userdata('qt_id');
		       // echo $q_id;exit();

		       	//$q_id=$this->input->post('q_id');
		       	$col=$this->input->post('col');
		       //	$sub=$this->input->post('sub');


		       	$sub = $this->input->post('sub') ? $this->input->post('sub') :0;

		       	$row=$this->input->post('rows');

		   $checkdet=$this->AdminModel->get_checkformat($this->input->post('table_id'),$q_id);
		   //print_r($checkdet);exit();
		          if(empty($checkdet)){

		          	$data = array(
							'question_id'=>trim($this->session->userdata('qt_id')),
							//'table_single_width'=>trim($this->input->post('table_width')),
							'table_id'=>trim($this->input->post('table_id')),
							'format_name'=>trim($this->input->post('table_name')),
							
						
							'created_on'=>time(),
							//'updated_on'=>time(),
							'created_by'=>$this->session->userdata('admin_id')
						);


         $f_id=$this->AdminModel->add_data($data,'problem_format');

         $table=$this->AdminModel->get_table_new($this->input->post('table_id'));

		       $cols_count = array($table['count_one_table'],$table['count_two_table'],$table['count_three_table'],$table['count_four_table'],$table['count_five_table'],$table['count_six_table'],$table['count_seven_table'],$table['count_eight_table'],$table['count_nine_table'],$table['count_ten_table'],$table['count_eleven_table'],$table['count_twelve_table'],$table['count_thirteen_table'],$table['count_fourteen_table'],$table['count_fifteen_table']);

		       	$cols=$table['table_columns'];
		       for ($i=0; $i <$cols ; $i++) {
		       	        for ($j=0; $j <1 ; $j++) { 
		       	        	if($cols_count[$i]<=0){
		       	        		

		       	        	$datanew = array(
					// 'question_id'=>trim($this->session->userdata('qt_id')),
					//'table_single_width'=>trim($this->input->post('table_width')),
					'table_id'=>trim($this->input->post('table_id')),
					'column_id'=>$i,
					'row_id'=>$j,
					//'p_format_id'=>$f_id,
					 'sub_id'=>0,
					 'sub_status'=>0,
					 'col_value'=>'',
					 'col_help_text'=>'',
					// 'row_id'=>trim($this->input->post('rows'))

				
					'created_on'=>time(),
					//'updated_on'=>time(),
					'created_by'=>$this->session->userdata('admin_id')
				);
                        $dsffd=$this->AdminModel->add_data($datanew,'problem_format_values');



		       	        		}else{

		       	             for ($k=0; $k <$cols_count[$i] ; $k++) { 


		       	        	$datanew = array(
					// 'question_id'=>trim($this->session->userdata('qt_id')),
					//'table_single_width'=>trim($this->input->post('table_width')),
					'table_id'=>trim($this->input->post('table_id')),
					'column_id'=>$i,
					'row_id'=>$j,
					//'p_format_id'=>$f_id,
					 'sub_id'=>$k,
					 'sub_status'=>1,
					 'col_value'=>'',
					 'col_help_text'=>'',


					// 'row_id'=>trim($this->input->post('rows'))

				
					'created_on'=>time(),
					//'updated_on'=>time(),
					'created_by'=>$this->session->userdata('admin_id')
				);


                        $dsffd=$this->AdminModel->add_data($datanew,'problem_format_values');



		       	             	}





		       	        		}
		       	        	


		       	        }



		       }

		          }else{
		          	$f_id=$checkdet['p_format_id'];

		          }

		       




				       	
          		          if($this->input->post('sub')!=''){

                            $substatus=1; 
         		          }else{
         		          	$substatus=0; 
         		          }




 //          		          if($this->input->post('sub')!=''){
 // print_r('hchxhcxc');exit();


 //          		          }

 //          		           print_r('lll');exit();





		$tabledet=$this->AdminModel->get_format_by_table($this->input->post('table_id'),$q_id,$col,$row,$sub);

		//$tabledet=$this->AdminModel->get_format_by_table_sub($this->input->post('table_id'),$q_id,$col,$row);
//
       if(!empty($tabledet)){


       			          // if(!empty($sub)){ 




       			          // }

       	$data=array();
       	$table=$this->input->post('table_id');



       	if($this->input->post('type')=='text'){

             $data['col_value'] = $this->input->post('val');   
        	}elseif($this->input->post('type')=='h_text'){
             $data['col_help_text'] = $this->input->post('val');   

        	}elseif($this->input->post('type')=='h_key'){
             $data['col_keys'] = $this->input->post('val');   

        	}elseif($this->input->post('type')=='h_img'){


        		//if($_FILES['file']['size']){
			// $config['upload_path']          = './uploads/';
	  //       $config['allowed_types']        = 'jpeg|jpg|png';
	  //       $config['max_size']             = 5*1024;
	  //       $new_name = time();
			// $config['file_name'] = $new_name;

	  //       $this->load->library('upload', $config);

	   //      if ( ! $this->upload->do_upload('file'))
	   //      {
				// 	$error = $this->upload->display_errors();
				// //	print_r($error);exit();
				// 				$out = array('status'=>0,'message'=>'failed');

	   //              // $this->session->set_flashdata('upload_error',$error);
	   //              // $this->session->set_flashdata('answer_updated',2);
	   //      }
	        // else
	        // {
					//print_r('hhh');exit();

	        	//$upload_data = $this->upload->data();
	        	$img=$this->input->post('image'); 

	        	             $data['col_help_image'] = base_url('uploads/chapter/').$img;   


        	//}
       // }
    }


        	$t_id=$this->AdminModel->edit_format_values($data,$table,$q_id,$col,$row,$sub);





       }
        else{




        	$data = array(
					//'question_id'=>trim($this->session->userdata('qt_id')),
					//'table_single_width'=>trim($this->input->post('table_width')),
					'table_id'=>trim($this->input->post('table_id')),
					'column_id'=>trim($this->input->post('col')),
					'row_id'=>trim($this->input->post('rows')),
					//'p_format_id'=>$f_id,
					'sub_id'=>$sub,
					'sub_status'=>$substatus,
					// 'row_id'=>trim($this->input->post('rows'))

				
					'created_on'=>time(),
					//'updated_on'=>time(),
					'created_by'=>$this->session->userdata('admin_id')
				);


        	if($this->input->post('type')=='text'){

             $data['col_value'] = $this->input->post('val');   
        	}elseif($this->input->post('type')=='h_text'){
             $data['col_help_text'] = $this->input->post('val');   

        	}elseif($this->input->post('type')=='h_key'){
             $data['col_keys'] = $this->input->post('val');   

        	}elseif($this->input->post('type')=='h_img'){
        		$img=$this->input->post('image'); 
             $data['col_help_image'] = base_url('uploads/chapter/').$img;    

        	}



         $t_id=$this->AdminModel->add_data($data,'problem_format_values');

        }     

		
		if($t_id){
			        // $tabledet=$this->AdminModel->get_table_by_id($this->input->post('table_id'));

			
			$out = array('status'=>1,'message'=>'created','data'=>$tabledet,'problem_id'=>$t_id);

		}
		else{
			$out = array('status'=>0,'message'=>'failed');

			//$this->session->set_flashdata('table_created',2);
		}
        echo json_encode($out);

		



	}



          	// public function question_details(){
          		
          	// 	//echo "string";exit();

          	// }

	function answers_preview(){




		//$qid = $this->uri->segment(2);

		$id = $this->uri->segment(2) ? $this->uri->segment(2) : $this->session->userdata('qt_id');

		// $id = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('qt_id');


		//$this->session->set_userdata('q_id',1);
		$question = $this->AdminModel->get_question($id);



		//   $tr_array=array();
		// 			for($k=0;$k<=5;$k++){
		// 				$transactions['trans'] = $this->AdminModel->get_transaction($id,$k);
		// 				if(!empty($transactions['trans'])){
		// 					foreach($transactions['trans'] as $key=>$temp){
		// 				$transactions['trans'][$key]['keywords'] = $this->AdminModel->get_keywords($temp['transaction_id']);
		// 			}

  //          array_push($tr_array, $transactions);
		// 	}
		

		// }

  // print_r($tr_array);
	 // exit();

						$question_ids=$this->AdminModel->get_question_ids_by_id($id);

						// print_r($question_ids);exit();


						$arr=array();

						foreach ($question_ids as  $qt_ids) {
			$qt_id=$qt_ids['qt_id'];
			$qid=$qt_ids['id'];
			$order=$qt_ids['order_id'];

						$qtext_id=$qt_ids['text_id'];
					$transaction_ids=$qt_ids['transaction_id'];
							$orderid=$qt_ids['order_id'];


								$priorities=$qt_ids['priority'];

						$priority_ids1 = explode(',',$priorities);

										    if($priority_ids1[0]==''){
$priority_ids1=array('0'=>1,
  '2'=>2,
  '3'=>3);
            }

						$qt_ids['priority_vals'] = $priority_ids1;


       $qt_ids['qt'] = $this->AdminModel->get_table_by_id($qt_id);

              $qt_ids['qt_text'] = $this->AdminModel->get_question_text_id($qtext_id);



		$qt_ids['qt_cols'] = $this->AdminModel->get_table_by_id($qt_id);
		//$qt_ids['qt_vals'] = $this->AdminModel->get_question_vals($qt_id,$id);
		$qt_ids['qt_vals'] = $this->AdminModel->get_question_vals($qt_id,$id,$orderid);


		if(!empty($qt_ids['qt_vals'])){
		//$qt_ids['rows']=max(array_column($qt_ids['qt_vals'], 'row_no'));
			$row=$this->AdminModel->get_question_vals_count($qt_id,$id,$orderid);

				$qt_ids['rows']=$row['rowcount']-1;

         }


         $tr_array=array();
						$tr_id=array();



					$transaction_ids1 = explode(',',$transaction_ids);
					foreach ($transaction_ids1 as $key => $value_tr) {
						# code...
					

					// $transactions = $this->AdminModel->get_transaction_vals($id,$value_tr,$order);
		// if(!empty($qt_ids['qt_vals'])){

		// 			 $transactions = $this->AdminModel->get_transaction_vals($id,$value_tr,$order);


		// 							}else{

		// 			$transactions = $this->AdminModel->get_transaction_vals1($id,$value_tr);


		// 							}

						$transactions = $this->AdminModel->get_transaction_vals($id,$value_tr,$order);

   // print_r($transactions['trans']);
								if(!empty($transactions)){


											 		foreach($transactions as $key=>$temp){

											 	if (!in_array($temp['transaction_id'], $tr_id)){

											 	$transactions[$key]['keywords'] = $this->AdminModel->get_keywords($temp['transaction_id']);

										       array_push($tr_id, $temp['transaction_id']);


											 }else{

											 	unset($transactions[$key]);

											 	}
											 }

						           array_push($tr_array, $transactions);

									//}
// print_r($tr_array);
									}

									}

		$qt_ids['transactions'] = $tr_array;



		 array_push($arr, $qt_ids);
		 // array_push($arr_t, $question_ids['qt']);				
		 // array_push($arr_c, $question_ids['qt_cols']);				
		 // array_push($arr_v, $question_ids['qt_vals']);				
				
	    }




	//print_r($arr);exit();

	    						$p_arr=array();


		$problem_format = $this->AdminModel->get_problem_format($id);


		foreach ($problem_format as $key => $format) {


						$table=$format['table_id'];
						$format['p_cols'] = $this->AdminModel->get_table_by_id($table);
					    $format['p_vals'] = $this->AdminModel->get_problem_values_modify($table,$id);


					    		 array_push($p_arr, $format);


            }

            	 $p_arr_ans=array();


//print_r($problem_format);exit();
            foreach ($problem_format as $key => $formatans) {


						$table=$formatans['table_id'];
											    $formatans['p_vals'] = $this->AdminModel->get_problem_values_modify($table,$id);

						$formatans['ans_cols'] = $this->AdminModel->get_table_by_id($table);
					    $formatans['ans_vals'] = $this->AdminModel->get_answ_table_new($table,$id);
					     $formatans['ans_sub_vals'] = $this->AdminModel->get_ans_sub_table($table,$id);



					    		 array_push($p_arr_ans, $formatans);


            }


            $problem_format_orders = $this->AdminModel->get_problem_format_orders($id);


                        foreach ($problem_format as $key => $formatans) {



          $table_new=$formatans['table_id'];

         
           $tabledet=$this->AdminModel->get_table_new($table_new);

           	 $cols_count1 = array($tabledet['count_one_table'],$tabledet['count_two_table'],$tabledet['count_three_table'],$tabledet['count_four_table'],$tabledet['count_five_table'],$tabledet['count_six_table'],$tabledet['count_seven_table'],$tabledet['count_eight_table'],$tabledet['count_nine_table'],$tabledet['count_ten_table'],$tabledet['count_ten_table'],$tabledet['count_eleven_table'],$tabledet['count_twelve_table'],$tabledet['count_thirteen_table'],$tabledet['count_fourteen_table'],$tabledet['count_fifteen_table']);

				        	//}

				        	//print_r($cols_count);exit();


						$cols1=$tabledet['table_columns'];

				 	 $checkans=$this->AdminModel->check_answer_data($id,$table_new);
				 	  //print_r($checkans);
				 	 	if(empty($checkans)){



				 	 			for ($i=0; $i <$cols1 ; $i++) {
				 	 				 //$answer_sub=array();

				 	 				if($cols_count1[$i]>0){

				 	 					//$arr=array();

		 	  			           				for ($k=0; $k <$cols_count1[$i] ; $k++) { 



											 	   $arr14['column_id']=$i;
											 	  $arr14['ans_values']='';
											 	  // $arr1['val_underline']=0;
											 	    // $arr1['order_id']=$order;
											 	   
											 	   // $arr1['sub_line']=$row_line0;
											 	   $arr14['question_id']=$id;
											 	    $arr14['sub_id']=$k;
											 	  $arr14['rows']=0;
											 	   $arr14['ans_table_id']=$table_new;
											 	  // print_r($arr14);
											 	   //exit();

											 	   $t_id1=$this->AdminModel->add_data($arr14,'answer_table_sub');
											 	  // array_push($arr,$arr1);
		 	  			           				}

		 	  			           				//array_push($answer_sub,$arr);

				 	 				}else{



				 	 					//

				 	 						 	$arraynew = array(
														'table_id'=>$table_new,
														'question_id'=>$id,
														'table_columns'=>$i,
														//'order_id'=>$order,
														//'val_underline'=>0,

														'table_row'=>0,
														//'val_value'=>'',
														//'val_keys'=>$keys[$r]
													);
				 	 						 	//print_r($arraynew);
				 	 						 	//exit();

												

				 	 				}

				 	 				//if(!empty($answer_sub[0])){
														//$t_id1 = $this->AdminModel->add_sub_qst_insert($answer_sub[0],'answer_table_sub');

											//	}

				 	 			}

								if(!empty($arraynew)){

				 	 			 $t_id1=$this->AdminModel->add_data($arraynew,'answer_table');
				 	 			}

				 	 	}
				 	 }

				 	// exit();








		//print_r($p_arr_ans);exit();







		//if(!$id) redirect(base_url('questions_list'));
		//$this->session->set_userdata('chapter_id',$id);
		$this->load->library('pagination');

		$config['base_url'] = base_url('questions_list');
		$config['total_rows']=10;
		//$config['total_rows'] = $this->AdminModel->count_questions($id);
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
		$course=0;
		$chpt=2;
		$papr=1;
		$body_data = array(
							'questions'=>array(),
							// 'qt_ids'=>$this->AdminModel->list_questions_table_ids($id),
							// 'tables'=>$this->AdminModel->list_all_tables(),
							'courses'=>$this->AdminModel->list_all_data($course),

							'chapters'=>$this->AdminModel->list_all_data($chpt),

							'papers'=>$this->AdminModel->list_all_data($papr),
						    'qt_table'=>$arr,
						    'problem_format'=>$p_arr,
						    // 'transaction'=>$tr_array,
						    'tableans'=>$p_arr_ans,
						    'orders'=>$problem_format_orders,


							'questionid'=>$id,

							'links'=>$links,
							'offset'=>$offset
						);
		$this->load->view('backend/header');
		$this->load->view('backend/answer_preview_list',$body_data);
		$this->load->view('backend/footer');

		}

	// function answers_preview(){



	// 	//$qid = $this->uri->segment(2);

	// 	$id = $this->uri->segment(2) ? $this->uri->segment(2) : $this->session->userdata('qt_id');

	// 	// $id = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('qt_id');


	// 	//$this->session->set_userdata('q_id',1);
	// 	$question = $this->AdminModel->get_question($id);



	// 	  $tr_array=array();
	// 				for($k=0;$k<=5;$k++){
	// 					$transactions['trans'] = $this->AdminModel->get_transaction($id,$k);
	// 					if(!empty($transactions['trans'])){
	// 						foreach($transactions['trans'] as $key=>$temp){
	// 					$transactions['trans'][$key]['keywords'] = $this->AdminModel->get_keywords($temp['transaction_id']);
	// 				}

 //           array_push($tr_array, $transactions);
	// 		}
		

	// 	}



	// 					$question_ids=$this->AdminModel->get_question_ids_by_id($id);

	// 					// print_r($question_ids);exit();


	// 					$arr=array();

	// 					foreach ($question_ids as  $qt_ids) {
	// 		$qt_id=$qt_ids['qt_id'];
	// 		$qid=$qt_ids['id'];
	// 					$qtext_id=$qt_ids['text_id'];

 //       $qt_ids['qt'] = $this->AdminModel->get_table_by_id($qt_id);

 //              $qt_ids['qt_text'] = $this->AdminModel->get_question_text_id($qtext_id);



	// 	$qt_ids['qt_cols'] = $this->AdminModel->get_table_by_id($qt_id);
	// 	$qt_ids['qt_vals'] = $this->AdminModel->get_question_vals($qt_id,$id);
	// 	 array_push($arr, $qt_ids);
	// 	 // array_push($arr_t, $question_ids['qt']);				
	// 	 // array_push($arr_c, $question_ids['qt_cols']);				
	// 	 // array_push($arr_v, $question_ids['qt_vals']);				
				
	//     }




	//    // print_r($arr);exit();

	//     						$p_arr=array();


	// 	$problem_format = $this->AdminModel->get_problem_format($id);


	// 	foreach ($problem_format as $key => $format) {


	// 					$table=$format['table_id'];
	// 					$format['p_cols'] = $this->AdminModel->get_table_by_id($table);
	// 				    $format['p_vals'] = $this->AdminModel->get_problem_values($table,$id);


	// 				    		 array_push($p_arr, $format);


 //            }


	// 	//print_r(sizeof($p_arr));exit();







	// 	//if(!$id) redirect(base_url('questions_list'));
	// 	//$this->session->set_userdata('chapter_id',$id);
	// 	$this->load->library('pagination');

	// 	$config['base_url'] = base_url('questions_list');
	// 	$config['total_rows']=10;
	// 	//$config['total_rows'] = $this->AdminModel->count_questions($id);
	// 	$config['per_page'] = $limit = 10;
	// 	$config['prev_tag_open'] = '<li>';
	// 	$config['prev_tag_close'] = '</li>';
	// 	$config['num_tag_open'] = '<li>';
	// 	$config['num_tag_close'] = '</li>';
	// 	$config['next_tag_open'] = '<li>';
	// 	$config['next_tag_close'] = '</li>';
	// 	$config['cur_tag_open'] = '<li>';
	// 	$config['cur_tag_close'] = '</li>';
	// 	$config['first_tag_open'] = '<li>';
	// 	$config['first_tag_close'] = '</li>';
	// 	$config['last_tag_open'] = '<li>';
	// 	$config['last_tag_close'] = '</li>';

	// 	$this->pagination->initialize($config);

	// 	$links = $this->pagination->create_links();
	// 	$offset = $this->uri->segment(2);
	// 	$course=0;
	// 	$chpt=2;
	// 	$papr=1;
	// 	$body_data = array(
	// 						'questions'=>array(),
	// 						// 'qt_ids'=>$this->AdminModel->list_questions_table_ids($id),
	// 						// 'tables'=>$this->AdminModel->list_all_tables(),
	// 						'courses'=>$this->AdminModel->list_all_data($course),

	// 						'chapters'=>$this->AdminModel->list_all_data($chpt),

	// 						'papers'=>$this->AdminModel->list_all_data($papr),
	// 					    'qt_table'=>$arr,
	// 					    'problem_format'=>$p_arr,
	// 					    'transaction'=>$tr_array,


	// 						'questionid'=>$id,

	// 						'links'=>$links,
	// 						'offset'=>$offset
	// 					);
	// 	$this->load->view('backend/header');
	// 	$this->load->view('backend/answer_preview_list',$body_data);
	// 	$this->load->view('backend/footer');

	// 	}



		function add_copy_excel_answer(){




			$array=$this->input->post('array');
			           $table_id=trim($this->input->post('table'));
			            $qst_id=trim($this->input->post('question_id'));

 // print_r($array);exit();

			foreach ($array as $key => $value) {


				$rows= $value['row']; 
           $column_id=$value['column']; 
           $sub = !empty($value['sub']) ? $value['sub'] :0;
          // $sub=$value['sub'];

           $val=$value['val']; 

            $substat=$value['substat']; 



              if($substat!=0){

           		 // $arr1['column_id']=9;
		 	//   $arr1['ans_values']=$row_value8;
		 	//   $arr1['sub_line']=$row_line8;
		 	//   $arr1['table_id']=$this->input->post('tab_id');
		 	//   	  $arr1['table_row']=$j;
		 	//    $arr1['question_id']=$qt_id;
              $checkdata=$this->AdminModel->check_data_sub($qst_id,$this->input->post('table'),$rows,$sub,$column_id);



			$data = array(
					'question_id'=>trim($qst_id),
					//'table_single_width'=>trim($this->input->post('table_width')),
					'ans_table_id'=>trim($this->input->post('table')),
					'column_id'=>$column_id,
					'rows'=>$rows,
					'ans_values'=>$val,
					'sub_id'=>$sub
					//'column_one_value'=>

					
				
					// 'created_on'=>time(),
					// //'updated_on'=>time(),
					// 'created_by'=>$this->session->userdata('admin_id')
				);


						if(empty($checkdata)){

										 $t_id=$this->AdminModel->add_data($data,'answer_table_sub');


							}else{

								$t_id=$checkdata['id'];
			 $this->AdminModel->edit_answer_values_sub($data,$qst_id,$table_id,$rows,$sub,$column_id);
								}


					// 				if($t_id){

					// 	$out = array('status'=>1,'message'=>'created','answer_id'=>$t_id);

					// }
					// else{

					// 	$out = array('status'=>0,'message'=>'failed');

					// 	//$this->session->set_flashdata('table_created',
					// 	//2);
					// }







           }else{


           	 $check=$this->AdminModel->check_data($qst_id,$this->input->post('table'),$rows);

//print_r($check);

			$data = array(
					'question_id'=>trim($qst_id),
					//'table_single_width'=>trim($this->input->post('table_width')),
					'table_id'=>trim($this->input->post('table')),
					'table_columns'=>trim($this->input->post('table')),
					'table_row'=>$rows,
					//'column_one_value'=>

					
				
					'created_on'=>time(),
					//'updated_on'=>time(),
					'created_by'=>$this->session->userdata('admin_id')
				);

			if($column_id!=''){
				      // if(!empty($column_id)){
				       //	echo "string";exit();


				$array_column=['one','two','three','four','five','six','seven','eight','nine','ten'];
				$data['column_'.$array_column[$column_id].'_value']=$val;




			}

		

 //print_r($check);exit();

			if(empty($check)){

		//print_r($data);

			 $t_id=$this->AdminModel->add_data($data,'answer_table');

					// if($t_id){

					// 	$out = array('status'=>1,'message'=>'created','answer_id'=>$t_id);

					// }
					// else{

					// 	$out = array('status'=>0,'message'=>'failed');

					// 	//$this->session->set_flashdata('table_created',
					// 	//2);
					// }



							}else{
								
			 $t_id=$check['id'];
			$this->AdminModel->edit_answer_values($data,$qst_id,$table_id,$rows);

						// 	 if($t_id){

						// 	$out = array('status'=>1,'message'=>'created','answer_id'=>$t_id);

						// }
						// else{

						// 	$out = array('status'=>0,'message'=>'failed');


						// 	//$this->session->set_flashdata('table_created',
						// 	//2);
						// }

							}



           }



				
			 	
			 } 
//exit();

           


	 if($t_id){

							$out = array('status'=>1,'message'=>'created','answer_id'=>$t_id);

						}
						else{

							$out = array('status'=>0,'message'=>'failed');
							



							//$this->session->set_flashdata('table_created',
							//2);
						}
         

          



			//print_r($t_id);exit();

		
        echo json_encode($out);



          	}

				function add_answer_table_val(){



           $rows= $this->input->post('row'); 
           $column_id=$this->input->post('column'); 
           $sub=$this->input->post('sub'); 
           $table_id=trim($this->input->post('table_id'));

           $substat=$this->input->post('substat'); 


           //	$table_new=$this->AdminModel->get_table_new($table_id);

           	 $tabledet=$this->AdminModel->get_table_new($table_id);

           	 $cols_count1 = array($tabledet['count_one_table'],$tabledet['count_two_table'],$tabledet['count_three_table'],$tabledet['count_four_table'],$tabledet['count_five_table'],$tabledet['count_six_table'],$tabledet['count_seven_table'],$tabledet['count_eight_table'],$tabledet['count_nine_table'],$tabledet['count_ten_table'],$tabledet['count_ten_table'],$tabledet['count_eleven_table'],$tabledet['count_twelve_table'],$tabledet['count_thirteen_table'],$tabledet['count_fourteen_table'],$tabledet['count_fifteen_table']);

				        	//}

				        	//print_r($cols_count);exit();


						$cols1=$tabledet['table_columns'];

						 $checkans=$this->AdminModel->check_answer_data_row($this->session->userdata('qt_id'),$table_id,$rows);
				 	  //print_r($checkans);
				 	 	if(empty($checkans)){

				 	 				for ($i=0; $i <$cols1 ; $i++) {
				 	 				 //$answer_sub=array();

				 	 				if($cols_count1[$i]>0){

				 	 					//$arr=array();

		 	  			           				for ($k=0; $k <$cols_count1[$i] ; $k++) { 



											 	   $arr14['column_id']=$i;
											 	  $arr14['ans_values']='';
											 	  // $arr1['val_underline']=0;
											 	    // $arr1['order_id']=$order;
											 	   
											 	   // $arr1['sub_line']=$row_line0;
											 	   $arr14['question_id']=$this->session->userdata('qt_id');
											 	    $arr14['sub_id']=$k;
											 	  $arr14['rows']=$rows;
											 	   $arr14['ans_table_id']=$table_id;
											 	  // print_r($arr14);
											 	   //exit();

											 	   $t_id1=$this->AdminModel->add_data($arr14,'answer_table_sub');
											 	  // array_push($arr,$arr1);
		 	  			           				}

		 	  			           				//array_push($answer_sub,$arr);

				 	 				}else{
				 	 					//

				 	 						 	$arraynew = array(
														'table_id'=>$table_id,
														'question_id'=>$this->session->userdata('qt_id'),
														'table_columns'=>$i,
														//'order_id'=>$order,
														//'val_underline'=>0,

														'table_row'=>$rows,
														//'val_value'=>'',
														//'val_keys'=>$keys[$r]
													);
				 	 						 	//print_r($arraynew);
				 	 						 	//exit();

												 

				 	 				}

				 	 				//if(!empty($answer_sub[0])){
														//$t_id1 = $this->AdminModel->add_sub_qst_insert($answer_sub[0],'answer_table_sub');

										
											//	}

				 	 			}
				 	 				if(!empty($arraynew)){
				 	 			$t_id1=$this->AdminModel->add_data($arraynew,'answer_table');
				 	 		}
				 	 	}








           if($substat!=0){

           		 // $arr1['column_id']=9;
		 	//   $arr1['ans_values']=$row_value8;
		 	//   $arr1['sub_line']=$row_line8;
		 	//   $arr1['table_id']=$this->input->post('tab_id');
		 	//   	  $arr1['table_row']=$j;
		 	//    $arr1['question_id']=$qt_id;



              $checkdata=$this->AdminModel->check_data_sub($this->session->userdata('qt_id'),$this->input->post('table_id'),$rows,$sub,$column_id);
// print_r($checkdata);exit();
					 $data = array(
					'question_id'=>trim($this->session->userdata('qt_id')),
					//'table_single_width'=>trim($this->input->post('table_width')),
					'ans_table_id'=>trim($this->input->post('table_id')),
					'column_id'=>$column_id,
					'rows'=>$rows,
					'ans_values'=>trim($this->input->post('val')),
					'sub_id'=>$sub
					//'column_one_value'=>

					
				
					// 'created_on'=>time(),
					// //'updated_on'=>time(),
					// 'created_by'=>$this->session->userdata('admin_id')
				);


						if(empty($checkdata)){

										 $t_id=$this->AdminModel->add_data($data,'answer_table_sub');


							}else{

								$t_id=$checkdata['id'];
			 $this->AdminModel->edit_answer_values_sub($data,$this->session->userdata('qt_id'),$table_id,$rows,$sub,$column_id);
								}


									if($t_id){

						$out = array('status'=>1,'message'=>'created','answer_id'=>$t_id);

					}
					else{

						$out = array('status'=>0,'message'=>'failed');

						//$this->session->set_flashdata('table_created',
						//2);
					}







           }else{


           	 $check=$this->AdminModel->check_data($this->session->userdata('qt_id'),$this->input->post('table_id'),$rows);


			$data = array(
					'question_id'=>trim($this->session->userdata('qt_id')),
					//'table_single_width'=>trim($this->input->post('table_width')),
					'table_id'=>trim($this->input->post('table_id')),
					'table_columns'=>trim($this->input->post('table_id')),
					'table_row'=>$rows,
					//'column_one_value'=>

					
				
					'created_on'=>time(),
					//'updated_on'=>time(),
					'created_by'=>$this->session->userdata('admin_id')
				);

			if($column_id!=''){
				      // if(!empty($column_id)){
				       //	echo "string";exit();


				$array_column=['one','two','three','four','five','six','seven','eight','nine','ten'];
				$data['column_'.$array_column[$column_id].'_value']=trim($this->input->post('val'));




			}

		

 //print_r($check);exit();

			if(empty($check)){


			 $t_id=$this->AdminModel->add_data($data,'answer_table');

					if($t_id){

						$out = array('status'=>1,'message'=>'created','answer_id'=>$t_id);

					}
					else{

						$out = array('status'=>0,'message'=>'failed');

						//$this->session->set_flashdata('table_created',
						//2);
					}



							}else{
			 $t_id=$check['id'];
			 $this->AdminModel->edit_answer_values($data,$this->session->userdata('qt_id'),$table_id,$rows);

							 if($t_id){

							$out = array('status'=>1,'message'=>'created','answer_id'=>$t_id);

						}
						else{

							$out = array('status'=>0,'message'=>'failed');


							//$this->session->set_flashdata('table_created',
							//2);
						}

							}



           }

          



			//print_r($t_id);exit();

		
        echo json_encode($out);



          	}




         public function view_question_1(){




		$id = $this->uri->segment(2) ? $this->uri->segment(2) : $this->session->userdata('qt_id');
		
		$this->session->set_userdata('qt_id',$id);

		$question = $this->AdminModel->get_question($id);
		//$answer_img=$this->AdminModel->get_answer_img($id);

        $tr_array=array();
					for($k=0;$k<=5;$k++){
						$transactions['trans'] = $this->AdminModel->get_transaction_vals($id,$k);
						if(!empty($transactions['trans'])){
							foreach($transactions['trans'] as $key=>$temp){
			         $transactions['trans'][$key]['keywords'] = $this->AdminModel->get_keywords($temp['transaction_id']);
					}

           array_push($tr_array, $transactions);
			}
		

		}


		//print_r($tr_array);exit();
		

				//$question_ids=$this->AdminModel->get_question_ids($id);
				$question_ids=$this->AdminModel->get_question_ids_by_id($id);

				//echo json_encode($question_ids);exit();
        $arr=array();
                $arr_t=array();

        $arr_c=array();

        $arr_v=array();
        //$tr_array=array();

		foreach ($question_ids as  $qt_ids) {
			$qt_id=$qt_ids['qt_id'];
			$qid=$qt_ids['id'];
			$qtext_id=$qt_ids['text_id'];
									$transaction_ids=$qt_ids['transaction_id'];


        $qt_ids['qt'] = $this->AdminModel->get_table_by_id($qt_id);
        $qt_ids['qt_text'] = $this->AdminModel->get_question_text_id($qtext_id);

		//$qt_ids['qt_cols'] = $this->AdminModel->get_question_cols($qt_id);
		$qt_ids['qt_vals'] = $this->AdminModel->get_question_vals_view($qt_id,$id);


		// 			$transaction_ids1 = explode(',',$transaction_ids);
		// 			foreach ($transaction_ids1 as $key => $value_tr) {
		// 				# code...
					

		// 			$transactions = $this->AdminModel->get_transaction_new($id,$value_tr);

		// 						if(!empty($transactions)){
		// 									 		foreach($transactions as $key=>$temp){
		// 									 	$transactions[$key]['keywords'] = $this->AdminModel->get_keywords($temp['transaction_id']);
		// 									 }

		// 				           array_push($tr_array, $transactions);
		// 							}

		// 							}
		// $qt_ids['transactions'] = $tr_array;
		 array_push($arr, $qt_ids);
		 // array_push($arr_t, $question_ids['qt']);				
		 // array_push($arr_c, $question_ids['qt_cols']);				
		 // array_push($arr_v, $question_ids['qt_vals']);				
				
	    }
	

//$data = array_merge($data, array("cat"=>"wagon","foo"=>"baar"));

	    // $data_qt=array(
	    // 	'q_id'=>$arr,
	    // 	'qt'=>$arr_t,
	    // 	'qt_cols'=>$arr_c,
	    // 	'qt_vals'=>$arr_v

	    // );


	    						$p_arr=array();

           $p_table=array();
		$problem_format = $this->AdminModel->get_problem_format($id);

		foreach ($problem_format as $key => $format) {

-
						$table=$format['table_id'];
						$format['p_cols'] = $this->AdminModel->get_table_by_id($table);
					    $format['p_vals'] = $this->AdminModel->get_problem_values_modify($table);


					    		 array_push($p_arr, $format);
					    		array_push($p_table, $table);



		} 

			  //print_r($p_table);exit();

                   //$i=0;
		 $table_ans='table_ans';
		 		 $table_ans='table_ans';

		// 		$table_sub_ans='table_sub_ans';
		// 						$table_width='table_width';


                   for ($i=0; $i <=9 ; $i++) { 
                   	
               if(!empty($p_table[$i])){

                   
			   	$table_id=$p_table[$i];



			   	}else{
			   $table_id=0;


			   	}



			   	if($i==0){
			   				$tabledata['table'] = $this->AdminModel->get_table_view($table_id,$id);


                 }else{	
                 			 $tabledata['table'.$i] = $this->AdminModel->get_table_view($table_id,$id);

		   

                 }
               $tabledata['table_ans'.$i] = $this->AdminModel->get_answ_table($table_id,$id);
               $tabledata['table_sub_ans'.$i] = $this->AdminModel->get_sub_answ_table($table_id,$id);
               $tabledata['table_width'.$i] = $this->AdminModel->get_table_sub_width($table_id);



	   
			   	
			   }

	 	// 	   print_r($tabledata);
   // exit();


 

		if($this->session->userdata('theme')){
					$theme_id=$this->session->userdata('theme');

				}else{
							$theme_id=0;

				}

		$data = array(
					'question'=>$question,
					'transaction'=>$tr_array,
					'table1'=>$tabledata['table'],
					'tableans1'=>$tabledata['table_ans0'],
					'tableans_sub1'=>$tabledata['table_sub_ans1'],
					'table_width1'=>$tabledata['table_width1'],
					// 'tableans1'=>$table_ans1,
					'table2'=>$tabledata['table1'],
					'tableans2'=>$tabledata['table_ans1'],
					'tableans_sub2'=>$tabledata['table_sub_ans2'],
					'table_width2'=>$tabledata['table_width2'],
					'table3'=>$tabledata['table2'],
					'tableans3'=>$tabledata['table_ans2'],
					'tableans_sub3'=>$tabledata['table_sub_ans3'],
					'table_width3'=>$tabledata['table_width3'],
					'table4'=>$tabledata['table3'],
					'tableans4'=>$tabledata['table_ans3'],
					'tableans_sub4'=>$tabledata['table_sub_ans4'],
					'table_width4'=>$tabledata['table_width4'],
					'table5'=>$tabledata['table4'],
					'tableans5'=>$tabledata['table_ans4'],
					'tableans_sub5'=>$tabledata['table_sub_ans5'],
					'table_width5'=>$tabledata['table_width5'],
					'table6'=>$tabledata['table5'],
					'tableans6'=>$tabledata['table_ans5'],
					'tableans_sub6'=>$tabledata['table_sub_ans6'],
					'table_width6'=>$tabledata['table_width6'],
					'table7'=>$tabledata['table6'],
					'tableans7'=>$tabledata['table_ans6'],
					'tableans_sub7'=>$tabledata['table_sub_ans7'],
					'table_width7'=>$tabledata['table_width7'],
					'table8'=>$tabledata['table7'],
					'tableans8'=>$tabledata['table_ans7'],
					'tableans_sub8'=>$tabledata['table_sub_ans8'],
				    'table_width8'=>$tabledata['table_width8'],

					'table9'=>$tabledata['table8'],

					'tableans9'=>$tabledata['table_ans8'],
					'tableans_sub9'=>$tabledata['table_sub_ans9'],
					'table_width9'=>$tabledata['table_width9'],
					//'qt'=>$qt,
					'qt_table'=>$arr,
					'problem_format'=>$p_arr,

					'theme_id'=>$theme_id,
					//'qt_cols'=>$qt_cols,
					//'qt_vals'=>$qt_vals,
					//'answer_img'=>$answer_img
				);
	    // 	 echo json_encode($data);
     // exit();

     		$this->load->view('frontend/index_modify',$data);

		


		
	          }



          	public function view_question(){




			$id = $this->uri->segment(2) ? $this->uri->segment(2) : $this->session->userdata('qt_id');
		
		$this->session->set_userdata('qt_id',$id);

		$question = $this->AdminModel->get_question($id);
		//$answer_img=$this->AdminModel->get_answer_img($id);

     

//print_r($tr_array);exit();

		
		

				//$question_ids=$this->AdminModel->get_question_ids($id);
				$question_ids=$this->AdminModel->get_question_ids_by_id($id);

				// echo json_encode($question_ids);exit();
        $arr=array();


                $arr_t=array();

        $arr_c=array();

        $arr_v=array();
        //$tr_array=array();
// print_r($question_ids);exit();
		foreach ($question_ids as  $qt_ids) {
			$qt_id=$qt_ids['qt_id'];
			$qid=$qt_ids['id'];
			$qtext_id=$qt_ids['text_id'];
									$order=$qt_ids['order_id'];

									$transaction_ids=$qt_ids['transaction_id'];
							$orderid=$qt_ids['order_id'];


								$priorities=$qt_ids['priority'];

						$priority_ids1 = explode(',',$priorities);


						
										    if($priority_ids1[0]==''){
$priority_ids1=array('0'=>1,
  '2'=>2,
  '3'=>3);
            }

						$qt_ids['priority_vals'] = $priority_ids1;





        $qt_ids['qt'] = $this->AdminModel->get_table_by_id($qt_id);
        $qt_ids['qt_text'] = $this->AdminModel->get_question_text_id($qtext_id);

		//$qt_ids['qt_cols'] = $this->AdminModel->get_question_cols($qt_id);
		$qt_ids['qt_vals'] = $this->AdminModel->get_question_vals_view($qt_id,$orderid);


		// 			$transaction_ids1 = explode(',',$transaction_ids);
		// 			foreach ($transaction_ids1 as $key => $value_tr) {
		// 				# code...
					

		// 			$transactions = $this->AdminModel->get_transaction_new($id,$value_tr);

		// 						if(!empty($transactions)){
		// 									 		foreach($transactions as $key=>$temp){
		// 									 	$transactions[$key]['keywords'] = $this->AdminModel->get_keywords($temp['transaction_id']);
		// 									 }

		// 				           array_push($tr_array, $transactions);
		// 							}

		// 							}
		// $qt_ids['transactions'] = $tr_array;




		$tr_array=array();
						$tr_id=array();



					$transaction_ids1 = explode(',',$transaction_ids);
					foreach ($transaction_ids1 as $key => $value_tr) {
						# code...
					
    //print_r($value_tr);

					$transactions = $this->AdminModel->get_transaction_vals($id,$value_tr,$order);
								if(!empty($transactions)){


											 		foreach($transactions as $key=>$temp){

											 	if (!in_array($temp['transaction_id'], $tr_id)){

											 	$transactions[$key]['keywords'] = $this->AdminModel->get_keywords($temp['transaction_id']);

										       array_push($tr_id, $temp['transaction_id']);


											 }else{

											 	unset($transactions[$key]);

											 	}
											 }

						           array_push($tr_array, $transactions);

									//}
// print_r($tr_array);
									}

									}

		$qt_ids['transactions'] = $tr_array;
		 array_push($arr, $qt_ids);
		 // array_push($arr_t, $question_ids['qt']);				
		 // array_push($arr_c, $question_ids['qt_cols']);				
		 // array_push($arr_v, $question_ids['qt_vals']);				
				
	    }

	 //     print_r($arr);
	 // exit();



//$data = array_merge($data, array("cat"=>"wagon","foo"=>"baar"));

	    // $data_qt=array(
	    // 	'q_id'=>$arr,
	    // 	'qt'=>$arr_t,
	    // 	'qt_cols'=>$arr_c,
	    // 	'qt_vals'=>$arr_v

	    // );


	    						$p_arr=array();
	    						$p_format=array();

           $p_table=array();
		$problem_format = $this->AdminModel->get_problem_format($id);

			foreach ($problem_format as $key => $format) {

-
						$table=$format['table_id'];


						

						$format['p_cols'] = $this->AdminModel->get_table_by_id($table);

						if($format['format_name']!=''){
							$table_name=$format['format_name'];
						}else{
							$table_name='';
						}
						$format['table_name']=$table_name;
					    $format['p_vals'] = $this->AdminModel->get_problem_values_modify($table);


					    		 array_push($p_arr, $format);
					    		array_push($p_table, $table);
					    		array_push($p_format, $format['table_name']);




		} 

			 // print_r($p_table);exit();

                   //$i=0;
		 $table_ans='table_ans';
		 		 $table_ans='table_ans';

		// 		$table_sub_ans='table_sub_ans';
		// 						$table_width='table_width';


                   for ($i=0; $i <=10 ; $i++) { 
                   	
               if(!empty($p_table[$i])){

                   
			   	$table_id=$p_table[$i];



			   	}else{
			   $table_id=0;


			   	}



			   	if($i==0){
			   				$tabledata['table'] = $this->AdminModel->get_table_view($table_id,$id);


                 }else{	
                 			 $tabledata['table'.$i] = $this->AdminModel->get_table_view($table_id,$id);

		   

                 }

                 $k=$i+1;

                 

                                if(!empty($p_table[$i])){

                                 $tabledata['format_name'.$k]=$p_format[$i];
                                 }else{
								$tabledata['format_name'.$k]='';

			   	}

               $tabledata['table_ans'.$i] = $this->AdminModel->get_answ_table($table_id,$id);
               $tabledata['table_sub_ans'.$k] = $this->AdminModel->get_sub_answ_table($table_id,$id);
               $tabledata['table_width'.$k] = $this->AdminModel->get_table_sub_width($table_id);
                 $tabledata['table_header'.$k] = $this->AdminModel->get_table_header($table_id,$id);




	   
			   	
			   }

	 	 // 	   print_r($tabledata);
    // exit();



 

		if($this->session->userdata('theme')){
					$theme_id=$this->session->userdata('theme');

				}else{
							$theme_id=0;

				}

		$data = array(
					'question'=>$question,
					// 'transaction'=>$tr_array,
					'table1'=>$tabledata['table'],
					'tableans1'=>$tabledata['table_ans0'],
					'tableans_sub1'=>$tabledata['table_sub_ans1'],
					'table_width1'=>$tabledata['table_width1'],
					'table_header1'=>$tabledata['table_header1'],
					'format_name1'=>$tabledata['format_name1'],

					// 'tableans1'=>$table_ans1,
					'table2'=>$tabledata['table1'],
					'tableans2'=>$tabledata['table_ans1'],
					'tableans_sub2'=>$tabledata['table_sub_ans2'],
					'table_width2'=>$tabledata['table_width2'],
					'table_header2'=>$tabledata['table_header2'],
										'format_name2'=>$tabledata['format_name2'],


					'table3'=>$tabledata['table2'],
					'tableans3'=>$tabledata['table_ans2'],
					'tableans_sub3'=>$tabledata['table_sub_ans3'],
					'table_width3'=>$tabledata['table_width3'],
					'table_header3'=>$tabledata['table_header3'],
				    'format_name3'=>$tabledata['format_name3'],

					'table4'=>$tabledata['table3'],
					'tableans4'=>$tabledata['table_ans3'],
					'tableans_sub4'=>$tabledata['table_sub_ans4'],
					'table_width4'=>$tabledata['table_width4'],
					'table_header4'=>$tabledata['table_header4'],
					'format_name4'=>$tabledata['format_name4'],

					'table5'=>$tabledata['table4'],
					'tableans5'=>$tabledata['table_ans4'],
					'tableans_sub5'=>$tabledata['table_sub_ans5'],
					'table_width5'=>$tabledata['table_width5'],
					'table_header5'=>$tabledata['table_header5'],
										'format_name5'=>$tabledata['format_name5'],

					'table6'=>$tabledata['table5'],
					'tableans6'=>$tabledata['table_ans5'],
					'tableans_sub6'=>$tabledata['table_sub_ans6'],
					'table_width6'=>$tabledata['table_width6'],
					'table_header6'=>$tabledata['table_header6'],
					'format_name6'=>$tabledata['format_name6'],

					'table7'=>$tabledata['table6'],
					'tableans7'=>$tabledata['table_ans6'],
					'tableans_sub7'=>$tabledata['table_sub_ans7'],
					'table_width7'=>$tabledata['table_width7'],
					'table_header7'=>$tabledata['table_header7'],
					'format_name7'=>$tabledata['format_name7'],

					'table8'=>$tabledata['table7'],
					'tableans8'=>$tabledata['table_ans7'],
					'tableans_sub8'=>$tabledata['table_sub_ans8'],
				    'table_width8'=>$tabledata['table_width8'],
				    'table_header8'=>$tabledata['table_header8'],
				    'format_name8'=>$tabledata['format_name8'],


					'table9'=>$tabledata['table8'],

					'tableans9'=>$tabledata['table_ans8'],
					'tableans_sub9'=>$tabledata['table_sub_ans9'],
					'table_width9'=>$tabledata['table_width9'],
				     'table_header9'=>$tabledata['table_header9'],
					'format_name9'=>$tabledata['format_name9'],


					'table10'=>$tabledata['table7'],
					'tableans10'=>$tabledata['table_ans7'],
					'tableans_sub10'=>$tabledata['table_sub_ans8'],
				    'table_width10'=>$tabledata['table_width8'],
				    'table_header10'=>$tabledata['table_header8'],
				    'format_name10'=>$tabledata['format_name8'],





					//'qt'=>$qt,
					'qt_table'=>$arr,
					'problem_format'=>$p_arr,

					'theme_id'=>$theme_id,
					//'qt_cols'=>$qt_cols,
					//'qt_vals'=>$qt_vals,
					//'answer_img'=>$answer_img
				);
	     //  	 echo json_encode($data['tableans_sub1']);
     

      // exit();


     		$this->load->view('frontend/index_modify',$data);

		


		
	          }





          	public function questions_list_edit(){

				$qid = $this->uri->segment(2);


		$id = $this->uri->segment(2) ? $this->uri->segment(2) : $this->session->userdata('qt_id');


						$question_ids=$this->AdminModel->get_question_ids_by_id($id);

						// print_r($question_ids);exit();

				              $tr_array=array();
								for($k=0;$k<=5;$k++){
												$transactions['trans'] = $this->AdminModel->get_transaction($id,$k);
												if(!empty($transactions['trans'])){
											// 		foreach($transactions['trans'] as $key=>$temp){
											// 	$transactions['trans'][$key]['keywords'] = $this->AdminModel->get_keywords($temp['transaction_id']);
											// }

						           array_push($tr_array, $transactions);
									}
								

								}



						$arr=array();

						foreach ($question_ids as  $qt_ids) {
			$qt_id=$qt_ids['qt_id'];
			$qid=$qt_ids['id'];
						$qtext_id=$qt_ids['text_id'];

       $qt_ids['qt'] = $this->AdminModel->get_table_by_id($qt_id);

              $qt_ids['qt_text'] = $this->AdminModel->get_question_text_id($qtext_id);



		$qt_ids['qt_cols'] = $this->AdminModel->get_table_by_id($qt_id);
		$qt_ids['qt_vals'] = $this->AdminModel->get_question_vals($qt_id,$id);
		 array_push($arr, $qt_ids);
		 // array_push($arr_t, $question_ids['qt']);				
		 // array_push($arr_c, $question_ids['qt_cols']);				
		 // array_push($arr_v, $question_ids['qt_vals']);				
				
	    }


	    					$p_arr=array();


		$problem_format = $this->AdminModel->get_problem_format($id);


		foreach ($problem_format as $key => $format) {


						$table=$format['table_id'];
						$format['p_cols'] = $this->AdminModel->get_table_by_id($table);
					    $format['p_vals'] = $this->AdminModel->get_problem_values($table,$id);


					    		 array_push($p_arr, $format);


            }




		//if(!$id) redirect(base_url('questions_list'));
		$this->session->set_userdata('qt_id',$id);
		$this->load->library('pagination');

		$config['base_url'] = base_url('questions_list');
		$config['total_rows']=10;
		//$config['total_rows'] = $this->AdminModel->count_questions($id);
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
		$course=0;
		$chpt=2;
		$papr=1;
		$body_data = array(
							'questions'=>array(),
							// 'qt_ids'=>$this->AdminModel->list_questions_table_ids($id),
							'tables'=>$this->AdminModel->list_all_tables(),
							'courses'=>$this->AdminModel->list_all_data($course),

							'chapters'=>$this->AdminModel->list_all_data($chpt),

							'papers'=>$this->AdminModel->list_all_data($papr),
							'questionid'=>$id,
							'qt_table'=>$arr,
							'transactions'=>$tr_array,
							'problem_format'=>$p_arr,


							'links'=>$links,
							'offset'=>$offset
						);
		$this->load->view('backend/header');
		$this->load->view('backend/question_list_edit',$body_data);
		$this->load->view('backend/footer');
	}


	public function get_problem_solving(){
		$this->load->model('AdminModel');
        $id = $this->input->post('id');
        $data = $this->AdminModel->get_problem_solving_id($id);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else $out = array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}



		public function edit_question_title(){
		$id = $this->input->post('question_id');
		$q_title = trim($this->input->post('edit_question'));
		// $presentation_tags = $this->input->post('edit_presentation_tag');
	$keywords = explode(',',$this->input->post('edit_qst_keywords'));

		$data = array(
					'question_code'=>$q_title,
					// 'presentation_tags'=>$keywords,
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->AdminModel->edit_question($data,$id)){
			$keyword_data = array();
				$this->AdminModel->delete_question_tags($id);
				foreach($keywords as $temp){
						$keywords_val = explode(';',$temp);
					foreach($keywords_val as $val_key){

						$pemp = array('tag'=>$val_key,'question_id'=>$id);
					//array_push($keyword_data,$pemp);
					$qry=$this->AdminModel->add_keywords_question($pemp);
						//print_r($pemp);

					}						
				}
			$this->session->set_flashdata('question_updated',1);
		}
		else{
			$this->session->set_flashdata('question_updated',2);
		}
		redirect(base_url('questions_list'));
	}

	





    public function chapter_design(){
		$id = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('chapter_id');
		if(!$id) redirect(base_url('courses'));
		$this->session->set_userdata('chapter_id',$id);
		$this->load->library('pagination');

		$config['base_url'] = base_url('chapter-design');
		$config['total_rows'] = $this->AdminModel->count_content($id);
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
				'content'=>$this->AdminModel->list_content($id,$limit,$offset),
				'question' => $this->AdminModel->get_problem_solving($id),
				'presentation' => $this->AdminModel->get_presentation(),
				'links'=>$links,
				'offset'=>$offset
			);
		$this->load->view('backend/header');
		$this->load->view('backend/chapter_design',$body_data);
		$this->load->view('backend/footer');
	}
	public function add_chapter_design(){
		$chapter_id = $this->session->userdata('chapter_id');
		
		if($this->input->post('type') == 1){
			$topic = $this->input->post('presentation_topic');
			foreach($topic as $row){
				$data = array(
					'chapter_id' => $chapter_id,
					'type' => $this->input->post('type'),
					'type_id' => $row,
					'presentation' => $this->input->post('presentation'),
					'created_on' => time(),
					'updated_on' => time(),
					'updated_by' => $this->session->userdata('admin_id'),
					'status' => 1
				);
				$this->AdminModel->add_data($data,'chapter_design');
			}
			
		}
		elseif($this->input->post('type') == 2){
			$problem = $this->input->post('problem_solving');
			foreach($problem as $row){
				$data = array(
					'chapter_id' => $chapter_id,
					'type' => $this->input->post('type'),
					'type_id' => $row,
					'presentation' => 0,
					'created_on' => time(),
					'updated_on' => time(),
					'updated_by' => $this->session->userdata('admin_id'),
					'status' => 1
				);
				$this->AdminModel->add_data($data,'chapter_design');
			}
			
		}
		$this->session->set_flashdata('paper_created',1);
		redirect(base_url('chapter-design'));
	}

	public function upload_chapter_image(){
		// print_r($_FILES["image"]["tmp_name"]);
		 $error=array();
		$extension=array("jpeg","jpg","png","gif");
		if(empty($this->input->post('img_chapter_id'))){
			$this->session->set_flashdata('chapter_exist',2);
		}
		else{
			$count=0;
		foreach($_FILES["image"]["tmp_name"] as $key=>$tmp_name) {
			if($_FILES['image']['size'][$key] != 0){

				$_FILES['img']['name'] = $_FILES['image']['name'][$key];
                $_FILES['img']['type'] = $_FILES['image']['type'][$key];
                $_FILES['img']['tmp_name'] = $_FILES['image']['tmp_name'][$key];
                $_FILES['img']['error'] = $_FILES['image']['error'][$key];
                $_FILES['img']['size'] = $_FILES['image']['size'][$key];

				$image='';
				$config['upload_path'] = FCPATH . 'uploads/chapter';
				$config['allowed_types'] = 'jpeg|jpg|png|gif';
				$config['max_size'] = '0';
            	$config['file_name'] = md5(time().rand(0, 100));
            	$this->load->library('upload',$config);       
            	$this->upload->initialize($config);
            	if($this->upload->do_upload('img')){
            		$count++;
            		$uploaded_data = $this->upload->data();
                	$image = $uploaded_data['file_name'];
                	//echo $image;
                	$data = array(
                			'chapter_id' => $this->input->post('img_chapter_id'),
                			'chapter_image' => $image
                			);
                	$this->AdminModel->add_data($data,'chapter_image');
            	}
            	else{
            		$error = $_FILES['img']['name'];
            	}
			}
		    
		}
		if($count == 0){
			$this->session->set_flashdata('image_upload',2);
		}
		else{
			$this->session->set_flashdata('image_upload',1);
		}
		

		}
		redirect(base_url('chapters'));
	}



}
