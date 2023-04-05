<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
		$this->load->model('AdminModel');
		$this->load->model('TeacherModel');
    }

	public function index()
	{
		$this->load->view('backend/login');
	}

	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$out = $this->AdminModel->check_login($username,$password);
		if($out['status']==1){
			$data = $out['data'];
			$role = $this->AdminModel->get_role($data['role_id']);
			$rights = explode(',',$role['role_rights']);
			$view=$create=$edit=$delete=0;
            foreach($rights as $priv){
              if($priv == 'view') $view = 1;
              if($priv == 'create') $create = 1;
              if($priv == 'edit') $edit = 1;
              if($priv == 'delete') $delete = 1;
              $rights = array_diff($rights,array($priv));
            }
			$this->session->set_userdata('priv',explode(',',$role['role_priv']));
			$this->session->set_userdata('view',$view);
			$this->session->set_userdata('create',$create);
			$this->session->set_userdata('edit',$edit);
			$this->session->set_userdata('delete',$delete);
			$this->session->set_userdata('admin_id',$data['admin_id']);
			$this->session->set_userdata('admin_name',$data['admin_name']);
			$this->session->set_userdata('admin_role',$data['role_id']);
			
		}
		echo json_encode($out);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function teacher_login_view()
	{
		$this->load->view('teacher/teacher_login');
	}

	public function teacher_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$out = $this->TeacherModel->check_login($username,$password);
		if($out['status']==1){
			$data = $out['data'];
			$role = $this->AdminModel->get_role($data['role_id']);
			$rights = explode(',',$role['role_rights']);
			$view=$create=$edit=$delete=0;
            foreach($rights as $priv){
              if($priv == 'view') $view = 1;
              if($priv == 'create') $create = 1;
              if($priv == 'edit') $edit = 1;
              if($priv == 'delete') $delete = 1;
              $rights = array_diff($rights,array($priv));
            }
			$this->session->set_userdata('priv',explode(',',$role['role_priv']));
			$this->session->set_userdata('view',$view);
			$this->session->set_userdata('create',$create);
			$this->session->set_userdata('edit',$edit);
			$this->session->set_userdata('delete',$delete);
			$this->session->set_userdata('teacher_id',$data['teacher_id']);
			$this->session->set_userdata('teacher_name',$data['teacher_name']);
			$this->session->set_userdata('institute_id',$data['institute_id']);
		}
		echo json_encode($out);
	}
	public function teacher_logout(){
		$this->session->sess_destroy();
		redirect(base_url('teacher'));
	}
	public function forgot_password_teacher(){
		$username = $this->input->post('username');
		$data = $this->TeacherModel->forgot_password($username);
		 if(!empty($data)){
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";

            $phone=$data['teacher_phone'];
            $password = substr( str_shuffle( $chars ), 0, 12 );
            $user_where['teacher_phone'] = $data['teacher_phone'];
            $user_where['teacher_status'] = 1;
            $update_data['teacher_password'] = password_hash($password,PASSWORD_DEFAULT);

            $update=$this->TeacherModel->update_password($user_where,$update_data);
            if($update){
            	$message = 'Your new password is '.$password.' . Mesoki';
                $this->load->library('sms');
                $resp = $this->sms->sendsms($phone,$message);
                $out = array('status'=>1,'data'=>'New Password has been send to your phone.!');
            }
            else{
            	$out = array('status'=>1,'data'=>'Updation error!');
            }
        }
        else{
            $out = array('status'=>0,'data'=>'Invalid Phonenumber!');
        }
        echo json_encode($out);

	}


	public function view_question_web($id){




			// $id = $this->uri->segment(2) ? $this->uri->segment(2) : $this->session->userdata('qt_id');
		
		//$this->session->set_userdata('qt_id',$id);

		$question = $this->AdminModel->get_question($id);
		//$answer_img=$this->AdminModel->get_answer_img($id);

     


		
		

				//$question_ids=$this->AdminModel->get_question_ids($id);
				$question_ids=$this->AdminModel->get_question_ids_by_id($id);

				//echo json_encode($question_ids);exit();
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
		$qt_ids['qt_vals'] = $this->AdminModel->get_question_vals_view_web($qt_id,$orderid,$id);

// print_r($qt_ids['qt_vals']);
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
	    // 	 echo json_encode($data);
     // exit();

     		$this->load->view('frontend/index_modify_web',$data);

		


		

	          }
}
