<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAjaxController extends CI_Controller {

	function __construct(){
		parent::__construct();
		//ini_set('memory_limit', '-1');
		
		if(empty($this->session->userdata('admin_id'))){
			echo json_encode(array('status'=>404,'data'=>'Session not available!'));
			die();
		}
		$this->load->model('InstituteModel');
		$this->load->model('AdminModel');

		date_default_timezone_set('Asia/Kolkata');
	}

	public function get_role(){
        $id = $this->input->post('id');
        $data = $this->AdminModel->get_role($id);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}

	public function get_admin(){
        $id = $this->input->post('id');
        $data = $this->AdminModel->get_admin($id);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}

    public function get_table(){
        $id = $this->input->post('id');
        $data = $this->AdminModel->get_table_by_id($id);
        $data_width = $this->AdminModel->get_table_sub_width($id);
        $data['sub']=$data_width;
       // $data = $this->AdminModel->get_table_new($id);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}


	public function get_ans_table(){
		//echo "fdnhhf";exit();
		$id = $this->input->post('table');
				$q_id = $this->session->userdata('qt_id');

		// $q_id = $this->input->post('q_id');
        $data['table'] = $this->AdminModel->get_table_new($id);
        $data['answer'] = $this->AdminModel->get_quest_table_new($id,$q_id);
        // $data['answer_sub'] = $this->AdminModel->get_ans_sub_table($id,$q_id);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}

	public function get_data(){
		$id = $this->input->post('id');
		$data = $this->AdminModel->get_data($id);
		if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}


	public function get_paper_by_course(){
		$id = $this->input->post('id');
		$data = $this->AdminModel->get_data_by_parent($id);
		if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else $out =array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}
	
	public function add_keywords(){
		$id = $this->input->post('id') ? $this->input->post('id') : 0;
		$value = $this->input->post('value');
		if(!empty($this->input->post('id'))){


           $check=$this->AdminModel->get_keywords_id($id);
           if(!empty($check)){

            $data = array(
					'keyword_value'=>$value,
					// 'transaction_id'=>$id,
					// 'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);	


		$out = $this->AdminModel->edit_keyword($id,$data);

           }else{


           	$data = array(
					'keyword_value'=>$value,
					'transaction_id'=>$id,
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);	


		$out = $this->AdminModel->add_data($data,'keywords');

           }

		

		}else{
		$out ='';	
		}
		
		
		echo json_encode($out);
	}

	public function delete_keywords(){
		$value = $this->input->post('value');
		$out = $this->AdminModel->delete_keyword($value,'key');
		echo json_encode($out);
	}
	public function delete_question(){
		$id=$this->input->post('id');
		//$out = $this->AdminModel->delete_question($id);

		if($this->AdminModel->delete_question($id)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
	}
	public function clone_question(){
		$course_id=$this->input->post('course_id');
		$papr_id=$this->input->post('papr_id');
		$chpt_id=$this->input->post('chpt_id');
		$id=$this->input->post('id');

		//$out = $this->AdminModel->delete_question($id);

		if($this->AdminModel->clone_question($course_id,$papr_id,$chpt_id,$id)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
	}


	public function delete_admin(){
		$id=$this->input->post('id');
		//$out = $this->AdminModel->delete_question($id);

		if($this->AdminModel->delete_admin($id)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
	}

	public function delete_table(){
		$id=$this->input->post('id');
		//$out = $this->AdminModel->delete_question($id);

		if($this->AdminModel->delete_table($id)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
	}

	public function delete_paper(){
		$id=$this->input->post('id');
		//$out = $this->AdminModel->delete_question($id);

		if($this->AdminModel->delete_paper($id)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
	}

	public function delete_course(){
		$id=$this->input->post('id');
		//$out = $this->AdminModel->delete_question($id);

		if($this->AdminModel->delete_course($id)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
	}

	public function delete_chapter(){
		$id=$this->input->post('id');
		//$out = $this->AdminModel->delete_question($id);

		if($this->AdminModel->delete_chapter($id)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
	}

	




	public function add_transaction(){

		$transaction = $this->input->post('transaction');
		$helptext = $this->input->post('helptext');
		$help1=nl2br($helptext);
		$image = $this->input->post('image');
		$keywords = explode(',',$this->input->post('keywords'));
//print_r($keywords);exit();
		$data = array(
					'transaction_title'=>$transaction,
					'transaction_helptext'=>$help1,
					'transaction_image'=>$image,
					'question_id'=>0,
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		$transaction_id = $this->AdminModel->add_data($data,'transactions');
		if($transaction_id){
			$keyword_data = array();
			foreach($keywords as $temp){
					$keywords_val = explode(';',$temp);
				foreach($keywords_val as $val_key){

					$pemp = array('keyword_id'=>$val_key,'transaction_id'=>$transaction_id);
				//array_push($keyword_data,$pemp);
				$qry=$this->AdminModel->update_keywords_by_id($pemp);
					//print_r($pemp);

				}
					
				
			}



			// foreach($keywords as $temp){
			// 	$keywords_val = explode(';',$temp);
			// 	foreach($keywords_val as $val_key){
			// 		//print_r($val_key);
			// 		$pemp = array('keyword_id'=>$val_key,'transaction_id'=>$transaction_id);
			// 		

			// 	}
				

				
			// 	//array_push($keyword_data,$pemp);
			// //	

			// }exit();
			
			if($qry){
				$out = array('status'=>1,'data'=>$transaction_id);
			}
			else{
				$out = array('status'=>0,'data'=>'Error');
			}
		}
		echo json_encode($out);
	}

	public function get_transaction(){
		$id = $this->input->post('id');
		$data = $this->AdminModel->get_transaction_by_id($id);
		if(!empty($data)){
			$keys = array();
			$keywords = explode(';',$data['keywords']);
			$keyword_ids = explode(',',$data['keyword_ids']);
			foreach ($keywords as $key => $value) {
				$temp = array('text'=>$value,'value'=>$keyword_ids[$key]);
				array_push($keys,$temp);
			}
			$data['keywords'] = $keys;
			$out = array('status'=>1,'data'=>$data);
		}
		else  $out = array('status'=>0);
		echo json_encode($out);
	}

	public function edit_transaction(){
		$id = $this->input->post('id');
		$transaction = $this->input->post('transaction');
		$helptext = $this->input->post('helptext');
		$image = $this->input->post('image');
		$keywords = explode(',',$this->input->post('keywords'));
		$data = array(
					'transaction_title'=>$transaction,
					'transaction_helptext'=>$helptext,
					'transaction_image'=>$image,
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		$transaction_id = $this->AdminModel->edit_trasaction($id,$data);
		if($transaction_id){
			$out = array('status'=>1,'data'=>$transaction_id);
		}
		else{
			$out = array('status'=>0,'data'=>'Error');
		}
		echo json_encode($out);
	}

	public function delete_transaction(){
		$id = $this->input->post('id');
		$qid = $this->input->post('qstion');
		
		if($this->AdminModel->delete_trasaction($id,$qid)){
			$this->AdminModel->delete_keyword($id,'trans');
			$out = array('status'=>1,'data'=>'ok');
		}
		else{
			$out = array('status'=>0,'data'=>'Error');
		}
		echo json_encode($out);
	}

	public function get_question(){
		$id = $this->input->post('id');


		/*  $tr_array=array();
		for($k=0;$k<=5;$k++){
			$transactions['trans'] = $this->AdminModel->get_transaction($id,$k);
			if(!empty($transactions['trans'])){
				foreach($transactions['trans'] as $key=>$temp){
			$transactions['trans'][$key]['keywords'] = $this->AdminModel->get_keywords($temp['transaction_id']);
		         }

           array_push($tr_array, $transactions);
			}
		}*/


		$transactions = $this->AdminModel->get_transaction_edit($id);
		$html = '';
		$ids = '';
		foreach($transactions as $key=>$data){
			if($data['rows']==0){
				$html .= '<li id="trans_'.$data['transaction_id'].'" data-id="'.$data['transaction_id'].'">'.$data['transaction_title'].' <button type="button" class="btn-sm btn-info edit-transaction-btn" data-id="'.$data['transaction_id'].'"><i class="fa fa-pencil"></i></button> <button type="button" class="btn-sm btn-danger remove-transaction-btn" data-id="'.$data['transaction_id'].'"><i class="fa fa-minus"></i></button></li>';
			if($key==0) $ids .= $data['transaction_id'];
			else $ids .= ','.$data['transaction_id'];
			}


			
		}
        $data = array(
					'question'=>$this->AdminModel->get_question($id),
					'qt_id'=>$this->AdminModel->get_question_ids($id),
					'html'=>$html,
					'ids'=>$ids,
					'transactions'=>$transactions
				);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}

	public function file_upload(){
		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 5*1024;
        $new_name = time();
		$config['file_name'] = $new_name;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
                $error = $this->upload->display_errors();
                $out = array('status'=>0,'data'=>$error);
        }
        else
        {
				$upload_data = $this->upload->data();
				$out = array('status'=>1,'data'=>base_url('uploads/').$upload_data['file_name']);
		}
		echo json_encode($out);
	}

	public function add_question_table(){
		$array = array(
					'qt_name'=>$this->input->post('name'),
					'qt_num_cols'=>$this->input->post('nos'),
					'qt_width'=>$this->input->post('width'),
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		$id = $this->AdminModel->add_data($array,'question_table');
		if($id){
			$out = array('status'=>1,'data'=>$id);
		}
		else{
			$out = array('status'=>0);
		}
		echo json_encode($out);
	}

	public function add_col(){
		$data = array();

		$qt_id = $this->input->post('qt_id');
		$col_name = $this->input->post('col_name');
		$col_width = $this->input->post('col_width');
		// $amount_status = $this->input->post('column_one_check') ? 1 : 0;
	$amount_status = $this->input->post('column_one_check');
//echo json_encode($amount_status);exit();

// 		$checkboxes = isset($_POST['column_one_check']) ? $_POST['column_one_check'] : array();
// foreach($checkboxes as $value) {
//     echo json_encode($value);
// }exit();


		for($i=0;$i<count($col_name);$i++){
			//$amount_status = $this->input->post('column_one_check'.$i) ? 1 : 0;
			//echo json_encode($this->input->post('column_one_check'.$i));
			//echo $i;
			
		//  $amount_status1 = $amount_status[$i] ? 0 : 1;
			//  //echo json_encode($amount_status1);
			// // echo json_encode($amount_status1);
			$array = array(
						'qt_id'=>$qt_id,
						'col_name'=>$col_name[$i],
						'col_width'=>$col_width[$i],
						'is_amount'=>$amount_status[$i]
					);
			array_push($data,$array);
		}


		
		$id = $this->AdminModel->add_batch($data,'cols');
		if($id){
			$out = array('status'=>1,'data'=>$id);
		}
		else{
			$out = array('status'=>0);
		}
		echo json_encode($out);
	}

	public function add_row(){
		$data = array();
		$qt_id = $this->input->post('qt_id');
		$row_value = $this->input->post('row_value');
		$keys = $this->input->post('val_keys');
		$cols = (int) $this->input->post('cols');
		$rows = count($row_value);
		$i = $r = 0;
		while($i<$rows){
			for($j=0;$j<$cols;$j++){
				$array = array(
					'qt_id'=>$qt_id,
					'col_no'=>$j,
					'row_no'=>$r,
					'val_value'=>$row_value[$i],
					'val_keys'=>$keys[$r]
				);
				$i++;
				array_push($data,$array);	
			}
			$r++;
		}
		$id = $this->AdminModel->add_batch($data,'vals');
		if($id){
			$out = array('status'=>1,'data'=>$id);
		}
		else{
			$out = array('status'=>0);
		}
		echo json_encode($out);
	}


	public function add_answer_table(){
		$data = array();
		//echo json_encode($this->input->post());exit();
		
		$cols = (int) $this->input->post('cols');


		$qt_id = $this->input->post('qt_id');
		$row_count0 = $this->input->post('row_count_0');
		$row_count1 = $this->input->post('row_count_1');
		$row_count2 = $this->input->post('row_count_2');
		$row_count3 = $this->input->post('row_count_3');
		$row_count4 = $this->input->post('row_count_4');
		$row_count5 = $this->input->post('row_count_5');
		$row_count6 = $this->input->post('row_count_6');
		$row_count7 = $this->input->post('row_count_7');
		$row_count8 = $this->input->post('row_count_8');
		$row_count9 = $this->input->post('row_count_9');
		//$row_count8 = $this->input->post('row_count_8');


	

		


		$row_value0 = $this->input->post('row_value_0');
		$row_value1 = $this->input->post('row_value_1');
		$row_value2 = $this->input->post('row_value_2');
		$row_value3 = $this->input->post('row_value_3');
		$row_value4 = $this->input->post('row_value_4');
		$row_value5 = $this->input->post('row_value_5');
		$row_value6 = $this->input->post('row_value_6');
		$row_value7 = $this->input->post('row_value_7');
		$row_value8 = $this->input->post('row_value_8');
		$row_value9 = $this->input->post('row_value_9');

		$underline0 = $this->input->post('is_underline0');
		$underline1 = $this->input->post('is_underline1');
		$underline2 = $this->input->post('is_underline2');
		$underline3 = $this->input->post('is_underline3');
		$underline4 = $this->input->post('is_underline4');
		$underline5 = $this->input->post('is_underline5');
		$underline6 = $this->input->post('is_underline6');
		$underline7 = $this->input->post('is_underline7');
		$underline8 = $this->input->post('is_underline8');
		$underline9 = $this->input->post('is_underline9');

		$keys = $this->input->post('val_keys');


		$rows = count($row_count0);
		
//print_r($row_value0);exit();
		$i = $r = 0;
		 $data1=array();
		 $answer_sub=array();

		// while($i<$rows){
			for($j=0;$j<$rows;$j++){

                       $arr=array();
                       
                       // print_r($row_count0[$j]);
               if($row_count0[$j]>0){
		           for ($i=0; $i <$row_count0[$j] ; $i++) { 

		 	  $row_value0 = $this->input->post('row_value_0'.$i.'');
		 	  // $row_line0 = $this->input->post('is_underline_0'.$i.'')? 1 : 0;
		 	  $row_line0 = $this->input->post('is_underline_0'.$i.'');
		 	 
		 	   
		 	  $arr1['column_id']=1;
		 	  $arr1['ans_values']=$row_value0;
		 	   $arr1['sub_line']=$row_line0;
		 	  $arr1['table_id']=$this->input->post('tab_id');
		 	  $arr1['table_row']=$j;
		 	   $arr1['question_id']=$qt_id;
		 	   array_push($arr,$arr1);
		 	  $data1['column_one_value']=0;

		      }
		   

	 }else{
			//$row_value0 = $this->input->post('row_value_0');


		   // $underline0 = $underline0 ? 1 : 0;
				// $underline1 = $underline1 ? 1 : 0;
				// $underline2 = $underline2 ? 1 : 0;
				// $underline3 = $underline3 ? 1 : 0;
				// $underline4 = $underline4 ? 1 : 0;
				// $underline5 = $underline5 ? 1 : 0;
				// $underline6 = $underline6 ? 1 : 0;
				// $underline7 = $underline7 ? 1 : 0;
				// $underline8 = $underline8 ? 1 : 0;
				// $underline9 = $underline9 ? 1 : 0;
		 	$data1['column_one_underline']=$underline0[$j];
		 	$data1['column_one_value']=$row_value0[$j];


        }

     

		         if($row_count1[$j]>0){
		           for ($i=0; $i <$row_count1[$j] ; $i++) { 

		 	  $row_value1 = $this->input->post('row_value_1'.$i.'');
		 	   // $row_line1 = $this->input->post('is_underline_1'.$i.'')? 1 : 0;
		 	  $row_line1 = $this->input->post('is_underline_1'.$i.'');
		 	  $arr1['column_id']=2;
		 	  $arr1['ans_values']=$row_value1;
		 	  $arr1['sub_line']=$row_line1;
		 	  $arr1['table_id']=$this->input->post('tab_id');
		 	  	  $arr1['table_row']=$j;
		 	   $arr1['question_id']=$qt_id;
		 	   array_push($arr,$arr1);
		 	  $data1['column_two_value']=0;

		      }
		  }else{
		   // $underline1 = $underline1 ? 1 : 0;
		   $data1['column_two_underline']=$underline1[$j];
		  	$data1['column_two_value']=$row_value1[$j];
		  }


		  if($row_count2[$j]>0){
		       for ($i=0; $i <$row_count2[$j] ; $i++) { 

		 	  $row_value2 = $this->input->post('row_value_2'.$i.'');
		 	   // $row_line2 = $this->input->post('is_underline_2'.$i.'')? 1 : 0;
		 	 $row_line2 = $this->input->post('is_underline_2'.$i.'');

		 	  $arr1['column_id']=3;
		 	  $arr1['ans_values']=$row_value2;
		 	  $arr1['sub_line']=$row_line2;
		 	  $arr1['table_id']=$this->input->post('tab_id');
		 	  $arr1['table_row']=$j;
		 	   $arr1['question_id']=$qt_id;
		 	  array_push($arr,$arr1);
		 	  $data1['column_three_value']=0;

		      }
		  }else{
		  	 // $underline2 = $underline2 ? 1 : 0;
		  	 $data1['column_three_underline']=$underline2[$j];
		  	$data1['column_three_value']=$row_value2[$j];
		  }


		  if($row_count3[$j]>0){
		       for ($i=0; $i <$row_count3[$j] ; $i++) { 

		 	  $row_value3 = $this->input->post('row_value_3'.$i.'');
		 	  // $row_line3 = $this->input->post('is_underline_3'.$i.'')? 1 : 0;
		 	  $row_line3 = $this->input->post('is_underline_3'.$i.'');
		 	  $arr1['column_id']=4;
		 	  $arr1['ans_values']=$row_value3;
		 	  $arr1['sub_line']=$row_line3;
		 	  $arr1['table_id']=$this->input->post('tab_id');
		 	  	  $arr1['table_row']=$j;
		 	   $arr1['question_id']=$qt_id;
		 	  array_push($arr,$arr1);
		 	  $data1['column_four_value']=0;

		      }
		  }else{
		  	// $underline3 = $underline3 ? 1 : 0;
		  	 $data1['column_four_underline']=$underline3[$j];
		  	$data1['column_four_value']=$row_value3[$j];
		  }


		  if($row_count4[$j]>0){
		       for ($i=0; $i <$row_count4[$j] ; $i++) { 

		 	  $row_value4 = $this->input->post('row_value_4'.$i.'');
		 	  // $row_line4 = $this->input->post('is_underline_4'.$i.'')? 1 : 0;
		 	  $row_line4 = $this->input->post('is_underline_4'.$i.'');

		 	  $arr1['column_id']=5;
		 	  $arr1['ans_values']=$row_value4;
		 	  $arr1['sub_line']=$row_line4;
		 	  $arr1['table_id']=$this->input->post('tab_id');
		 	  	  $arr1['table_row']=$j;
		 	   $arr1['question_id']=$qt_id;
		 	  array_push($arr,$arr1);
		 	  $data1['column_five_value']=0;

		      }
		  }else{
		  	// $underline4 = $underline4 ? 1 : 0;
		  	 $data1['column_five_underline']=$underline4[$j];
		  	$data1['column_five_value']=$row_value4[$j];
		  }


		   if($row_count5[$j]>0){
		       for ($i=0; $i <$row_count5[$j] ; $i++) { 

		 	  $row_value5 = $this->input->post('row_value_5'.$i.'');
		 	  // $row_line5 = $this->input->post('is_underline_5'.$i.'')? 1 : 0;
		 	  $row_line5 = $this->input->post('is_underline_5'.$i.'');
		 	  $arr1['column_id']=6;
		 	  $arr1['ans_values']=$row_value5;
		 	  $arr1['sub_line']=$row_line5;
		 	  $arr1['table_id']=$this->input->post('tab_id');
		 	  	  $arr1['table_row']=$j;
		 	   $arr1['question_id']=$qt_id;
		 	  array_push($arr,$arr1);
		 	  $data1['column_six_value']=0;

		      }
		  }else{
		  	// $underline5 = $underline5 ? 1 : 0;
		  	$data1['column_six_underline']=$underline5[$j];
		  	$data1['column_six_value']=$row_value5[$j];
		  }


		   if($row_count6[$j]>0){
		       for ($i=0; $i <$row_count6[$j] ; $i++) { 

		 	  $row_value6 = $this->input->post('row_value_6'.$i.'');
		 	  // $row_line6 = $this->input->post('is_underline_6'.$i.'')? 1 : 0;
		 	  $row_line6 = $this->input->post('is_underline_6'.$i.'');
		 	  $arr1['column_id']=7;
		 	  $arr1['ans_values']=$row_value6;
		 	  $arr1['sub_line']=$row_line6;
		 	  $arr1['table_id']=$this->input->post('tab_id');
		 	  	  $arr1['table_row']=$j;
		 	   $arr1['question_id']=$qt_id;
		 	  array_push($arr,$arr1);
		 	  $data1['column_seven_value']=0;

		      }
		  }else{
		  	// $underline6 = $underline6 ? 1 : 0;
		  	$data1['column_seven_underline']=$underline6[$j];
		  	$data1['column_seven_value']=$row_value6[$j];
		  }


		   if($row_count7[$j]>0){
		       for ($i=0; $i <$row_count7[$j] ; $i++) { 

		 	  $row_value7 = $this->input->post('row_value_7'.$i.'');
		 	  // $row_line7 = $this->input->post('is_underline_7'.$i.'')? 1 : 0;
		 	  $row_line7 = $this->input->post('is_underline_7'.$i.'');
		 	  $arr1['column_id']=8;
		 	  $arr1['ans_values']=$row_value7;
		 	   $arr1['sub_line']=$row_line7;
		 	  $arr1['table_id']=$this->input->post('tab_id');
		 	  	  $arr1['table_row']=$j;
		 	   $arr1['question_id']=$qt_id;
		 	  array_push($arr,$arr1);
		 	  $data1['column_eight_value']=0;

		      }
		  }else{
		  	// $underline7 = $underline7 ? 1 : 0;
		  	$data1['column_eight_underline']=$underline7[$j];
		  	$data1['column_eight_value']=$row_value7[$j];
		  }


		  if($row_count8[$j]>0){
		       for ($i=0; $i <$row_count8[$j] ; $i++) { 

		 	  $row_value8 = $this->input->post('row_value_8'.$i.'');
		 	  // $row_line8 = $this->input->post('is_underline_8'.$i.'')? 1 : 0;
		 	 $row_line8 = $this->input->post('is_underline_8'.$i.'');

		 	  $arr1['column_id']=9;
		 	  $arr1['ans_values']=$row_value8;
		 	  $arr1['sub_line']=$row_line8;
		 	  $arr1['table_id']=$this->input->post('tab_id');
		 	  	  $arr1['table_row']=$j;
		 	   $arr1['question_id']=$qt_id;
		 	  array_push($arr,$arr1);
		 	  $data1['column_nine_value']=0;

		      }
		  }else{
		  	// $underline8 = $underline8 ? 1 : 0;
		  	$data1['column_nine_underline']=$underline8[$j];
		  	$data1['column_nine_value']=$row_value8[$j];
		  }

		         $data1['question_id']=$qt_id;
		         $data1['table_id']=$this->input->post('tab_id');
		         $data1['table_columns']=$cols;
		         $data1['table_row']=$j;


				// $array = array(
				// 	'question_id'=>$qt_id,
				// 	'table_id'=>$this->input->post('tab_id'),
				// 	'table_columns'=>$cols,
				// 	'table_row'=>$j,
				// 	'column_one_value'=>$row_value0[$i],
				// 	'column_one_underline'=>$underline0,
				// 	'column_two_value'=>$row_value1[$i],
				// 	'column_two_underline'=>$underline1,
				// 	'column_three_value'=>$row_value2[$i],
				// 	'column_three_underline'=>$underline3,
				// 	'column_four_value'=>$row_value3[$i],
				// 	'column_four_underline'=>$underline4,
				// 	'column_five_value'=>$row_value5[$i],
				// 	'column_five_underline'=>$underline5,
				// 	'column_six_value'=>$row_value6[$i],
				// 	'column_six_underline'=>$underline6,
				// 	'column_seven_value'=>$row_value7[$i],
				// 	'column_seven_underline'=>$underline7,
				// 	'column_eight_value'=>$row_value8[$i],
				// 	'column_eight_underline'=>$underline8,
				// 	'column_nine_value'=>$row_value9[$i],
				// 	'column_nine_underline'=>$underline9,

				// 	'column_nine_value'=>$row_value9[$i],

				// );

//echo json_encode($arr);
				$i++;
				array_push($data,$data1);
				array_push($answer_sub,$arr);
					

			}
			
			$r++;
		//}

	//echo json_encode($answer_sub[0]);exit();
		//echo json_encode($answer_sub[0]);exit();
	
	$id = $this->AdminModel->add_batch($data,'answer_table');
			if(!empty($answer_sub[0])){
					$sid = $this->AdminModel->add_sub_insert($answer_sub[0],'answer_table_sub');

			}
			if($id || $sid){
				$out = array('status'=>1,'data'=>$id);
			}
			else{
				$out = array('status'=>0);
			}
	//echo json_encode($out);exit();
		echo json_encode($out);
	}


	public function edit_answer_table(){
		$data = array();
		//echo json_encode($this->input->post());exit();
		
		$cols = (int) $this->input->post('cols');


		$qt_id = $this->input->post('qt_id');
		$row_value0 = $this->input->post('row_value_0');
		$row_value1 = $this->input->post('row_value_1');
		$row_value2 = $this->input->post('row_value_2');
		$row_value3 = $this->input->post('row_value_3');
		$row_value4 = $this->input->post('row_value_4');
		$row_value5 = $this->input->post('row_value_5');
		$row_value6 = $this->input->post('row_value_6');
		$row_value7 = $this->input->post('row_value_7');
		$row_value8 = $this->input->post('row_value_8');
		$row_value9 = $this->input->post('row_value_9');

		$underline0 = $this->input->post('is_underline0');
		$underline1 = $this->input->post('is_underline1');
		$underline2 = $this->input->post('is_underline2');
		$underline3 = $this->input->post('is_underline3');
		$underline4 = $this->input->post('is_underline4');
		$underline5 = $this->input->post('is_underline5');
		$underline6 = $this->input->post('is_underline6');
		$underline7 = $this->input->post('is_underline7');
		$underline8 = $this->input->post('is_underline8');
		$underline9 = $this->input->post('is_underline9');




		$row_count0 = $this->input->post('row_count_0');
		$row_count1 = $this->input->post('row_count_1');
		$row_count2 = $this->input->post('row_count_2');
		$row_count3 = $this->input->post('row_count_3');
		$row_count4 = $this->input->post('row_count_4');
		$row_count5 = $this->input->post('row_count_5');
		$row_count6 = $this->input->post('row_count_6');
		$row_count7 = $this->input->post('row_count_7');
		$row_count8 = $this->input->post('row_count_8');
		$row_count9 = $this->input->post('row_count_9');


		$keys = $this->input->post('val_keys');


		$rows = count($row_count0);
		//echo $rows;exit();

		$del=$this->AdminModel->delete_answers_rows($qt_id,$this->input->post('tab_id'));
		$del=$this->AdminModel->delete_answers_sub($qt_id,$this->input->post('tab_id'));
		if($del){


			$i = $r = 0;

			 $data1=array();
		 $answer_sub=array();
		// while($i<$rows){
			for($j=0;$j<$rows;$j++){

				// $underline0 = $underline0 ? 1 : 0;
				// $underline1 = $underline1 ? 1 : 0;
				// $underline2 = $underline2 ? 1 : 0;
				// $underline3 = $underline3 ? 1 : 0;
				// $underline4 = $underline4 ? 1 : 0;
				// $underline5 = $underline5 ? 1 : 0;
				// $underline6 = $underline6 ? 1 : 0;
				// $underline7 = $underline7 ? 1 : 0;
				// $underline8 = $underline8 ? 1 : 0;
				// $underline9 = $underline9 ? 1 : 0;

			// 	$array = array(
			// 		'question_id'=>$qt_id,
			// 		'table_id'=>$this->input->post('tab_id'),
			// 		'table_columns'=>$cols,
			// 		'table_row'=>$j,
			// 		'column_one_value'=>$row_value0[$i],
			// 		'column_one_underline'=>$underline0,
			// 		'column_two_value'=>$row_value1[$i],
			// 		'column_two_underline'=>$underline1,
			// 		'column_three_value'=>$row_value2[$i],
			// 		'column_three_underline'=>$underline3,
			// 		'column_four_value'=>$row_value3[$i],
			// 		'column_four_underline'=>$underline4,
			// 		'column_five_value'=>$row_value5[$i],
			// 		'column_five_underline'=>$underline5,
			// 		'column_six_value'=>$row_value6[$i],
			// 		'column_six_underline'=>$underline6,
			// 		'column_seven_value'=>$row_value7[$i],
			// 		'column_seven_underline'=>$underline7,
			// 		'column_eight_value'=>$row_value8[$i],
			// 		'column_eight_underline'=>$underline8,
			// 		'column_nine_value'=>$row_value9[$i],
			// 		'column_nine_underline'=>$underline9,

			// 		'column_nine_value'=>$row_value9[$i],

			// 	);
			// 	$i++;
			// 	array_push($data,$array);	


				$arr=array();
                       
                       // print_r($row_count0[$j]);
               if($row_count0[$j]>0){
		           for ($i=0; $i <$row_count0[$j] ; $i++) { 

		 	  $row_value0 = $this->input->post('row_value_0'.$i.'');
		 	  // $row_line0 = $this->input->post('is_underline_0'.$i.'')? 1 : 0;
		 	  $row_line0 = $this->input->post('is_underline_0'.$i.'');

		 	 
		 	   
		 	  $arr1['column_id']=1;
		 	  $arr1['ans_values']=$row_value0;
		 	   $arr1['sub_line']=$row_line0;
		 	  $arr1['table_id']=$this->input->post('tab_id');
		 	  $arr1['table_row']=$j;
		 	   $arr1['question_id']=$qt_id;
		 	   array_push($arr,$arr1);
		 	  $data1['column_one_value']=0;

		      }
		   

	 }else{
			//$row_value0 = $this->input->post('row_value_0');


		   // $underline0 = $underline0 ? 1 : 0;
				// $underline1 = $underline1 ? 1 : 0;
				// $underline2 = $underline2 ? 1 : 0;
				// $underline3 = $underline3 ? 1 : 0;
				// $underline4 = $underline4 ? 1 : 0;
				// $underline5 = $underline5 ? 1 : 0;
				// $underline6 = $underline6 ? 1 : 0;
				// $underline7 = $underline7 ? 1 : 0;
				// $underline8 = $underline8 ? 1 : 0;
				// $underline9 = $underline9 ? 1 : 0;
		 	$data1['column_one_underline']=$underline0[$j];
		 	$data1['column_one_value']=$row_value0[$j];


        }

     

		         if($row_count1[$j]>0){
		           for ($i=0; $i <$row_count1[$j] ; $i++) { 

		 	  $row_value1 = $this->input->post('row_value_1'.$i.'');
		 	   // $row_line1 = $this->input->post('is_underline_1'.$i.'')? 1 : 0;
		 	  $row_line1 = $this->input->post('is_underline_1'.$i.'');
		 	  $arr1['column_id']=2;
		 	  $arr1['ans_values']=$row_value1;
		 	  $arr1['sub_line']=$row_line1;
		 	  $arr1['table_id']=$this->input->post('tab_id');
		 	  	  $arr1['table_row']=$j;
		 	   $arr1['question_id']=$qt_id;
		 	   array_push($arr,$arr1);
		 	  $data1['column_two_value']=0;

		      }
		  }else{
		   // $underline1 = $underline1 ? 1 : 0;
		   $data1['column_two_underline']=$underline1[$j];
		  	$data1['column_two_value']=$row_value1[$j];
		  }


		  if($row_count2[$j]>0){
		       for ($i=0; $i <$row_count2[$j] ; $i++) { 

		 	  $row_value2 = $this->input->post('row_value_2'.$i.'');
		 	   // $row_line2 = $this->input->post('is_underline_2'.$i.'')? 1 : 0;
		 	 $row_line2 = $this->input->post('is_underline_2'.$i.'');

		 	  $arr1['column_id']=3;
		 	  $arr1['ans_values']=$row_value2;
		 	  $arr1['sub_line']=$row_line2;
		 	  $arr1['table_id']=$this->input->post('tab_id');
		 	  $arr1['table_row']=$j;
		 	   $arr1['question_id']=$qt_id;
		 	  array_push($arr,$arr1);
		 	  $data1['column_three_value']=0;

		      }
		  }else{
		  	 // $underline2 = $underline2 ? 1 : 0;
		  	 $data1['column_three_underline']=$underline2[$j];
		  	$data1['column_three_value']=$row_value2[$j];
		  }


		  if($row_count3[$j]>0){
		       for ($i=0; $i <$row_count3[$j] ; $i++) { 

		 	  $row_value3 = $this->input->post('row_value_3'.$i.'');
		 	  // $row_line3 = $this->input->post('is_underline_3'.$i.'')? 1 : 0;
		 	  $row_line3 = $this->input->post('is_underline_3'.$i.'');
		 	  $arr1['column_id']=4;
		 	  $arr1['ans_values']=$row_value3;
		 	  $arr1['sub_line']=$row_line3;
		 	  $arr1['table_id']=$this->input->post('tab_id');
		 	  	  $arr1['table_row']=$j;
		 	   $arr1['question_id']=$qt_id;
		 	  array_push($arr,$arr1);
		 	  $data1['column_four_value']=0;

		      }
		  }else{
		  	// $underline3 = $underline3 ? 1 : 0;
		  	 $data1['column_four_underline']=$underline3[$j];
		  	$data1['column_four_value']=$row_value3[$j];
		  }


		  if($row_count4[$j]>0){
		       for ($i=0; $i <$row_count4[$j] ; $i++) { 

		 	  $row_value4 = $this->input->post('row_value_4'.$i.'');
		 	  // $row_line4 = $this->input->post('is_underline_4'.$i.'')? 1 : 0;
		 	  $row_line4 = $this->input->post('is_underline_4'.$i.'');

		 	  $arr1['column_id']=5;
		 	  $arr1['ans_values']=$row_value4;
		 	  $arr1['sub_line']=$row_line4;
		 	  $arr1['table_id']=$this->input->post('tab_id');
		 	  	  $arr1['table_row']=$j;
		 	   $arr1['question_id']=$qt_id;
		 	  array_push($arr,$arr1);
		 	  $data1['column_five_value']=0;

		      }
		  }else{
		  	// $underline4 = $underline4 ? 1 : 0;
		  	 $data1['column_five_underline']=$underline4[$j];
		  	$data1['column_five_value']=$row_value4[$j];
		  }


		   if($row_count5[$j]>0){
		       for ($i=0; $i <$row_count5[$j] ; $i++) { 

		 	  $row_value5 = $this->input->post('row_value_5'.$i.'');
		 	  // $row_line5 = $this->input->post('is_underline_5'.$i.'')? 1 : 0;
		 	  $row_line5 = $this->input->post('is_underline_5'.$i.'');
		 	  $arr1['column_id']=6;
		 	  $arr1['ans_values']=$row_value5;
		 	  $arr1['sub_line']=$row_line5;
		 	  $arr1['table_id']=$this->input->post('tab_id');
		 	  	  $arr1['table_row']=$j;
		 	   $arr1['question_id']=$qt_id;
		 	  array_push($arr,$arr1);
		 	  $data1['column_six_value']=0;

		      }
		  }else{
		  	// $underline5 = $underline5 ? 1 : 0;
		  	$data1['column_six_underline']=$underline5[$j];
		  	$data1['column_six_value']=$row_value5[$j];
		  }


		   if($row_count6[$j]>0){
		       for ($i=0; $i <$row_count6[$j] ; $i++) { 

		 	  $row_value6 = $this->input->post('row_value_6'.$i.'');
		 	  // $row_line6 = $this->input->post('is_underline_6'.$i.'')? 1 : 0;
		 	  $row_line6 = $this->input->post('is_underline_6'.$i.'');
		 	  $arr1['column_id']=7;
		 	  $arr1['ans_values']=$row_value6;
		 	  $arr1['sub_line']=$row_line6;
		 	  $arr1['table_id']=$this->input->post('tab_id');
		 	  	  $arr1['table_row']=$j;
		 	   $arr1['question_id']=$qt_id;
		 	  array_push($arr,$arr1);
		 	  $data1['column_seven_value']=0;

		      }
		  }else{
		  	// $underline6 = $underline6 ? 1 : 0;
		  	$data1['column_seven_underline']=$underline6[$j];
		  	$data1['column_seven_value']=$row_value6[$j];
		  }


		   if($row_count7[$j]>0){
		       for ($i=0; $i <$row_count7[$j] ; $i++) { 

		 	  $row_value7 = $this->input->post('row_value_7'.$i.'');
		 	  // $row_line7 = $this->input->post('is_underline_7'.$i.'')? 1 : 0;
		 	  $row_line7 = $this->input->post('is_underline_7'.$i.'');
		 	  $arr1['column_id']=8;
		 	  $arr1['ans_values']=$row_value7;
		 	   $arr1['sub_line']=$row_line7;
		 	  $arr1['table_id']=$this->input->post('tab_id');
		 	  	  $arr1['table_row']=$j;
		 	   $arr1['question_id']=$qt_id;
		 	  array_push($arr,$arr1);
		 	  $data1['column_eight_value']=0;

		      }
		  }else{
		  	// $underline7 = $underline7 ? 1 : 0;
		  	$data1['column_eight_underline']=$underline7[$j];
		  	$data1['column_eight_value']=$row_value7[$j];
		  }


		  if($row_count8[$j]>0){
		       for ($i=0; $i <$row_count8[$j] ; $i++) { 

		 	  $row_value8 = $this->input->post('row_value_8'.$i.'');
		 	  // $row_line8 = $this->input->post('is_underline_8'.$i.'')? 1 : 0;
		 	 $row_line8 = $this->input->post('is_underline_8'.$i.'');

		 	  $arr1['column_id']=9;
		 	  $arr1['ans_values']=$row_value8;
		 	  $arr1['sub_line']=$row_line8;
		 	  $arr1['table_id']=$this->input->post('tab_id');
		 	  	  $arr1['table_row']=$j;
		 	   $arr1['question_id']=$qt_id;
		 	  array_push($arr,$arr1);
		 	  $data1['column_nine_value']=0;

		      }
		  }else{
		  	// $underline8 = $underline8 ? 1 : 0;
		  	$data1['column_nine_underline']=$underline8[$j];
		  	$data1['column_nine_value']=$row_value8[$j];
		  }

		         $data1['question_id']=$qt_id;
		         $data1['table_id']=$this->input->post('tab_id');
		         $data1['table_columns']=$cols;
		         $data1['table_row']=$j;


				// $array = array(
				// 	'question_id'=>$qt_id,
				// 	'table_id'=>$this->input->post('tab_id'),
				// 	'table_columns'=>$cols,
				// 	'table_row'=>$j,
				// 	'column_one_value'=>$row_value0[$i],
				// 	'column_one_underline'=>$underline0,
				// 	'column_two_value'=>$row_value1[$i],
				// 	'column_two_underline'=>$underline1,
				// 	'column_three_value'=>$row_value2[$i],
				// 	'column_three_underline'=>$underline3,
				// 	'column_four_value'=>$row_value3[$i],
				// 	'column_four_underline'=>$underline4,
				// 	'column_five_value'=>$row_value5[$i],
				// 	'column_five_underline'=>$underline5,
				// 	'column_six_value'=>$row_value6[$i],
				// 	'column_six_underline'=>$underline6,
				// 	'column_seven_value'=>$row_value7[$i],
				// 	'column_seven_underline'=>$underline7,
				// 	'column_eight_value'=>$row_value8[$i],
				// 	'column_eight_underline'=>$underline8,
				// 	'column_nine_value'=>$row_value9[$i],
				// 	'column_nine_underline'=>$underline9,

				// 	'column_nine_value'=>$row_value9[$i],

				// );

//echo json_encode($arr);
				$i++;
				array_push($data,$data1);
				array_push($answer_sub,$arr);

			}

			//echo json_encode($answer_sub[0]);exit();

			$r++;
		//}
		 $id = $this->AdminModel->add_batch($data,'answer_table');
			if(!empty($answer_sub[0])){
					$sid = $this->AdminModel->add_sub_insert($answer_sub[0],'answer_table_sub');

			}
			if($id || $sid){
				$out = array('status'=>1,'data'=>$id);
			}else{
				$out = array('status'=>0);
			}


		}else{
			$out = array('status'=>0);
		}



        


		
		// if($id){
		// 	$out = array('status'=>1,'data'=>$id);
		// }
		// else{
			
		// }
		echo json_encode($out);
	}

// new problem modify//

	


	public function add_doubleline_val(){

		$type=$this->input->post('type');
		$q_id=$this->input->post('q_val');
		$underline=$this->input->post('underline');


		if($type=='qst'){


			$data = array(
					'val_double_line'=>$underline,
					//'val_underline'=>$underline
					// 'transaction_helptext'=>$helptext,
					// 'transaction_image'=>$image,
					// 'updated_on'=>time(),
					// 'updated_by'=>$this->session->userdata('admin_id')
				);
		$transaction_id = $this->AdminModel->edit_qst_values($q_id,$data);
						$out = array('status'=>1);





		}elseif($type=='problem'){


			$data = array(
					'val_double_underline'=>$underline,
					//'val_underline'=>$underline
					// 'transaction_helptext'=>$helptext,
					// 'transaction_image'=>$image,
					// 'updated_on'=>time(),
					// 'updated_by'=>$this->session->userdata('admin_id')
				);
		$transaction_id = $this->AdminModel->edit_format_underline($q_id,$data);
		$out = array('status'=>1);




		}else{
			// column_one_underline


			$substat=$this->input->post('substat');
			$column=$this->input->post('column');
			           if($substat!=0){


			           	$data = array(
					     'is_doubleline'=>$underline
					
						);

			      $transaction_id = $this->AdminModel->edit_anssub_vals($q_id,$data);
			      			$out = array('status'=>1);






			           }else{

			           	$data = array();


				$array_column=['one','two','three','four','five','six','seven','eight','nine','ten'];
				$data['column_'.$array_column[$column].'_doubleline']=$underline;


							     $transaction_id = $this->AdminModel->edit_answer_underline($q_id,$data);
		$out = array('status'=>1);




			           }




		// 	// $data = array(
		// 	// 		'val_underline'=>1,
		// 	// 		//'val_underline'=>$underline
		// 	// 		// 'transaction_helptext'=>$helptext,
		// 	// 		// 'transaction_image'=>$image,
		// 	// 		// 'updated_on'=>time(),
		// 	// 		// 'updated_by'=>$this->session->userdata('admin_id')
		// 	// 	);
		// $transaction_id = $this->AdminModel->edit_problem_vals($q_id,$data);




		}


		echo json_encode($out);



	}
	


	public function add_text_underline_val(){

		$type=$this->input->post('type');
		$q_id=$this->input->post('q_val');
		$underline=$this->input->post('underline');


		if($type=='qst'){


			$data = array(
					'val_text_line'=>$underline,
					//'val_underline'=>$underline
					// 'transaction_helptext'=>$helptext,
					// 'transaction_image'=>$image,
					// 'updated_on'=>time(),
					// 'updated_by'=>$this->session->userdata('admin_id')
				);
		$transaction_id = $this->AdminModel->edit_qst_values($q_id,$data);
						$out = array('status'=>1);





		}elseif($type=='problem'){


			$data = array(
					'val_text_line'=>$underline,
					//'val_underline'=>$underline
					// 'transaction_helptext'=>$helptext,
					// 'transaction_image'=>$image,
					// 'updated_on'=>time(),
					// 'updated_by'=>$this->session->userdata('admin_id')
				);
		$transaction_id = $this->AdminModel->edit_format_underline($q_id,$data);
		$out = array('status'=>1);




		}else{
			// column_one_underline


			$substat=$this->input->post('substat');
			$column=$this->input->post('column');
			           if($substat!=0){


			           	$data = array(
					     'is_textline'=>$underline
					
						);

			     $transaction_id = $this->AdminModel->edit_anssub_vals($q_id,$data);






			           }else{

			           	$data = array();


				$array_column=['one','two','three','four','five','six','seven','eight','nine','ten'];
				$data['column_'.$array_column[$column].'_textline']=$underline;


							     $transaction_id = $this->AdminModel->edit_answer_underline($q_id,$data);




			           }




		// 	// $data = array(
		// 	// 		'val_underline'=>1,
		// 	// 		//'val_underline'=>$underline
		// 	// 		// 'transaction_helptext'=>$helptext,
		// 	// 		// 'transaction_image'=>$image,
		// 	// 		// 'updated_on'=>time(),
		// 	// 		// 'updated_by'=>$this->session->userdata('admin_id')
		// 	// 	);
		// $transaction_id = $this->AdminModel->edit_problem_vals($q_id,$data);




		}


		echo json_encode($out);



	}
	


	public function add_underline_val(){

		$type=$this->input->post('type');
		$q_id=$this->input->post('q_val');
		$underline=$this->input->post('underline');


		if($type=='qst'){


			$data = array(
					'val_underline'=>$underline,
					//'val_underline'=>$underline
					// 'transaction_helptext'=>$helptext,
					// 'transaction_image'=>$image,
					// 'updated_on'=>time(),
					// 'updated_by'=>$this->session->userdata('admin_id')
				);
		$transaction_id = $this->AdminModel->edit_qst_values($q_id,$data);
						$out = array('status'=>1);





		}elseif($type=='problem'){


			$data = array(
					'val_underline'=>$underline,
					//'val_underline'=>$underline
					// 'transaction_helptext'=>$helptext,
					// 'transaction_image'=>$image,
					// 'updated_on'=>time(),
					// 'updated_by'=>$this->session->userdata('admin_id')
				);
		$transaction_id = $this->AdminModel->edit_format_underline($q_id,$data);
		$out = array('status'=>1);




		}else{
			// column_one_underline


			$substat=$this->input->post('substat');
			$column=$this->input->post('column');
			           if($substat!=0){


			           	$data = array(
					     'is_underline'=>$underline
					
						);

			     $transaction_id = $this->AdminModel->edit_anssub_vals($q_id,$data);






			           }else{

			           	$data = array();


				$array_column=['one','two','three','four','five','six','seven','eight','nine','ten'];
				$data['column_'.$array_column[$column].'_underline']=$underline;


							     $transaction_id = $this->AdminModel->edit_answer_underline($q_id,$data);




			           }




		// 	// $data = array(
		// 	// 		'val_underline'=>1,
		// 	// 		//'val_underline'=>$underline
		// 	// 		// 'transaction_helptext'=>$helptext,
		// 	// 		// 'transaction_image'=>$image,
		// 	// 		// 'updated_on'=>time(),
		// 	// 		// 'updated_by'=>$this->session->userdata('admin_id')
		// 	// 	);
		// $transaction_id = $this->AdminModel->edit_problem_vals($q_id,$data);


$out = array('status'=>1);

		}


		echo json_encode($out);



	}


	

	

	public function remove_qt(){
		$id = $this->input->post('id');
		if($this->AdminModel->remove_qt($id,'question_table')) $out=array('status'=>1);
		else $out=array('status'=>0);
		echo json_encode($out);
	}

	public function remove_qt_cols(){
		$id = $this->input->post('id');
		if($this->AdminModel->remove_qt($id,'cols')) $out=array('status'=>1);
		else $out=array('status'=>0);
		echo json_encode($out);
	}

	public function checkcode_duplicate(){
		$q_code = $this->input->post('q_code');
		if($this->AdminModel->check_q_code($q_code)) $out=array('status'=>1);
		else $out=array('status'=>0);
		echo json_encode($out);
	}

	

	public function remove_qt_table(){
		$id = $this->input->post('id');
		if($this->AdminModel->remove_qt($id,'vals')){
			if($this->AdminModel->remove_qt($id,'cols')){
				if($this->AdminModel->remove_qt($id,'question_table')) $out=array('status'=>1);
				else $out=array('status'=>0);
			}
			else $out=array('status'=>0);
		}
		else $out=array('status'=>0);
		echo json_encode($out);
	}

	public function add_qt_keywords(){
		$id = $this->input->post('id');
		$val = $this->input->post('val');
		$help = $this->input->post('help');
         $help1=nl2br($help);
		
		$keys = $this->input->post('keys');

		if($keys!=""){
			$keys1 = $this->input->post('keys');
			$data = array('val_value'=>$val,'val_keys'=>$keys,'val_help'=>$help1);

		}else{
        $data = array('val_value'=>$val,'val_help'=>$help1);
		}
		//echo json_encode($data);exit();
		
		if($this->AdminModel->update_qt_vals($data,$id)) $out=array('status'=>1);
		else $out = array('status'=>0);
		echo json_encode($out);
	}

	public function get_qt_key(){

		$id = $this->input->post('id');
		//echo $id;exit();
		$data = $this->AdminModel->get_qt_by_id($id);
		if(!empty($data)){
			$keys = array();
			$keywords = explode(';',$data['val_keys']);
			$keyword_ids = explode(';',$data['val_id']);
			// unset($keywords[0]);
			//echo json_encode($keywords);exit();
			foreach ($keywords as $value) {
				if($value){
					$temp = array('text'=>$value,'value'=>$value);
					array_push($keys,$temp);
				}
				
				
			}


			$data['keywords'] = $keys;
			$out = array('status'=>1,'data'=>$data);
		}
		else  $out = array('status'=>0);
		echo json_encode($out);                           
	}
	public function get_ins_phone(){
		$code = $this->input->post('value'); 
		$id = $this->input->post('id');            
        $count = $this->AdminModel->get_ins_phone($code,$id);

        if($count >0)
        {
            echo 1;
        }
        
        else
        {
            echo 0;
        }
	}
	public function get_ins_email(){
		$code = $this->input->post('value');
		$id = $this->input->post('id');              
        $count = $this->AdminModel->get_ins_email($code,$id);

        if($count >0)
        {
            echo 1;
        }
        
        else
        {
            echo 0;
        }
	}
	public function get_institute(){
        $id = $this->input->post('id');
        $data = $this->AdminModel->get_institute($id);
        $data2 = $this->AdminModel->get_ins_course($id);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data,'course'=>$data2);
        else array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}
	public function get_ins_user_phone(){
		$code = $this->input->post('value'); 
		$id = $this->input->post('id');            
        $count = $this->AdminModel->get_ins_user_phone($code,$id);

        if($count >0)
        {
            echo 1;
        }
        
        else
        {
            echo 0;
        }
	}
	public function get_ins_user_email(){
		$code = $this->input->post('value');
		$id = $this->input->post('id');              
        $count = $this->AdminModel->get_ins_user_email($code,$id);

        if($count >0)
        {
            echo 1;
        }
        
        else
        {
            echo 0;
        }
	}
	public function get_ins_user_username(){
		$code = $this->input->post('value');
		$id = $this->input->post('id');              
        $count = $this->AdminModel->get_ins_user_username($code,$id);

        if($count >0)
        {
            echo 1;
        }
        
        else
        {
            echo 0;
        }
	}
	public function get_institute_user(){
        $id = $this->input->post('id');
        $data = $this->AdminModel->get_institute_user($id);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}



	public function add_transaction_new(){

		$transaction = $this->input->post('transaction');
		//$id=$this->session->userdata('qt_id');
				$id=$this->input->post('qstion');

		
		$type = $this->input->post('type');
		$order = $this->input->post('order');
		$c_order = $this->input->post('cont_order');
		$tr_id = $this->input->post('tr_id');


		$helptext = $this->input->post('helptext');
		$help1=nl2br($helptext);
		$image = $this->input->post('image');

		if($tr_id!=0){

			$data = array(
					'transaction_title'=>$transaction,
					'trans_type'=>$type,


					// 'transaction_helptext'=>$help1,
					// 'transaction_image'=>$image,
					'question_id'=>$id,
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		$transaction_id = $this->AdminModel->edit_trasaction($tr_id,$data);


			if($transaction_id){
				$out = array('status'=>1,'data'=>$tr_id);
			}
			else{
				$out = array('status'=>0,'data'=>'Error');
			}



		}else{


		//$keywords = explode(',',$this->input->post('keywords'));
//print_r($keywords);exit();
		$data = array(
					'transaction_title'=>$transaction,
		             'trans_type'=>$type,
					 'order_id'=>$order,
					 'content_order_id'=>$c_order,



					// 'transaction_helptext'=>$help1,
					// 'transaction_image'=>$image,
					'question_id'=>$id,
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		$transaction_id = $this->AdminModel->add_data($data,'transactions');
		if($transaction_id){



	   $checkorder=$this->AdminModel->check_transaction_table($order,$id);


			 // print_r($checkorder);exit();
      if(empty($checkorder)){

      	$data = array(
					'question_id'=>$id,
					'transaction_id'=>$transaction_id,
					'created_on'=>time(),
					'order_id'=>$order,
				//	'quest_table_name'=>$quest_table_name
					//'updated_on'=>time(),
					//'created_by'=>$this->session->userdata('admin_id')
				);


      	$type=3;
      	$check_priority=$this->AdminModel->check_question_priority($order,$id,$type);
      	if($check_priority){
      		$data['priority']=$check_priority;

      	}


		$out1 = $this->AdminModel->add_data($data,'q_table');
				//$out = array('status'=>1);





      }else{



          $transaction_id1=$checkorder['transaction_id'];
          if($transaction_id1!=0){
                       $transaction_id_new=$transaction_id1.','.$transaction_id;

          }else{
                       $transaction_id_new=$transaction_id;

          }

          //print_r($transaction_id_new);exit();

      	$data = array(
					//'question_id'=>$id,
					'transaction_id'=>$transaction_id_new,
					//'created_on'=>time(),
					//'order_id'=>$order,
					//'updated_on'=>time(),
					//'created_by'=>$this->session->userdata('admin_id')
				);
      	      //print_r($data);exit();

$type=3;
      	$check_priority=$this->AdminModel->check_question_priority($order,$id,$type);
      	if($check_priority){
      		$data['priority']=$check_priority;

      	}

		$out1 = $this->AdminModel->update_question_table($data,$id,$order);


      }


			// $keyword_data = array();
			// foreach($keywords as $temp){
			// 		$keywords_val = explode(';',$temp);
			// 	foreach($keywords_val as $val_key){

			// 		$pemp = array('keyword_id'=>$val_key,'transaction_id'=>$transaction_id);
			// 	//array_push($keyword_data,$pemp);
			// 	$qry=$this->AdminModel->update_keywords_by_id($pemp);
			// 		//print_r($pemp);

			// 	}
					
				
			// }



			// foreach($keywords as $temp){
			// 	$keywords_val = explode(';',$temp);
			// 	foreach($keywords_val as $val_key){
			// 		//print_r($val_key);
			// 		$pemp = array('keyword_id'=>$val_key,'transaction_id'=>$transaction_id);
			// 		

			// 	}
				

				
			// 	//array_push($keyword_data,$pemp);
			// //	

			// }exit();
			
			if($transaction_id){
				$out = array('status'=>1,'data'=>$transaction_id);
			}
			else{
				$out = array('status'=>0,'data'=>'Error');
			}
		}

		}


		
		echo json_encode($out);
	}


	function add_question_text(){
		//echo 

		$id = $this->input->post('id') ? $this->input->post('id') : $this->input->post('qstion');
		$html_content = $this->input->post('html_content');
		$order = $this->input->post('order') ? $this->input->post('order') : 0;


      $checkorder=$this->AdminModel->check_question_text($order,$id);
      //print_r($checkorder);exit();
      if(empty($checkorder)){
      



      	$data = array(
					'question_id'=>$id,
					'text_val'=>$html_content,
					'created_on'=>time(),
					'order_id'=>$order,
					//'updated_on'=>time(),
					'created_by'=>$this->session->userdata('admin_id')
				);

      

// print_r($data);exit();
		$out1 = $this->AdminModel->add_question_text($data);
		$textid=$out1;
				//$out = array('status'=>1);




      }else{

      	$textid=$checkorder['text_id'];


      	$data = array(
					//'question_id'=>$id,
					'text_val'=>$html_content,
					//'created_on'=>time(),
					//'order_id'=>$order,
					//'updated_on'=>time(),
					//'created_by'=>$this->session->userdata('admin_id')
				);


		$out1 = $this->AdminModel->update_question_text($data,$id,$order);


      }






       $checkorder=$this->AdminModel->check_question_table($order,$id);
      if(empty($checkorder)){

      	$data = array(
					'question_id'=>$id,
					'text_id'=>$textid,
					'created_on'=>time(),
					'order_id'=>$order,
					//'updated_on'=>time(),
					//'created_by'=>$this->session->userdata('admin_id')
				);

	$type=1;
      	$check_priority=$this->AdminModel->check_question_priority($order,$id,$type);
      	if($check_priority){
      		$data['priority']=$check_priority;

      	}


		$out1 = $this->AdminModel->add_data($data,'q_table');
				//$out = array('status'=>1);




      }else{


      	$data = array(
					//'question_id'=>$id,
					'text_id'=>$textid,
					//'created_on'=>time(),
					//'order_id'=>$order,
					//'updated_on'=>time(),
					//'created_by'=>$this->session->userdata('admin_id')
				);
      	      //print_r($data);exit();

      	$type=1;
      	$check_priority=$this->AdminModel->check_question_priority($order,$id,$type);
      	if($check_priority){
      		$data['priority']=$check_priority;

      	}



		$out1 = $this->AdminModel->update_question_table($data,$id,$order);


      }
      if($out1){
      					$out = array('status'=>1);


      	}else{
      	      					$out = array('status'=>0);
	
      	}

		

		echo json_encode($out);



	}


	function add_quest_table(){
		//echo 

		$id = $this->input->post('id') ? $this->input->post('id') : $this->session->userdata('qt_id');
		$table_id = $this->input->post('table_id');
		$order = $this->input->post('order') ? $this->input->post('order') : 0;


      $checkorder=$this->AdminModel->check_question_table($order,$id);
      if(empty($checkorder)){

      	$data = array(
					'question_id'=>$id,
					'qt_id'=>$table_id,
					'created_on'=>time(),
					'order_id'=>$order,
					//'updated_on'=>time(),
					//'created_by'=>$this->session->userdata('admin_id')
				);

      	$type=2;
      	$check_priority=$this->AdminModel->check_question_priority($order,$id,$type);
      	if($check_priority){
      		$data['priority']=$check_priority;

      	}


		$out1 = $this->AdminModel->add_data($data,'q_table');
				//$out = array('status'=>1);




      }else{


      	$data = array(
					//'question_id'=>$id,
					'qt_id'=>$table_id,
					//'created_on'=>time(),
					//'order_id'=>$order,
					//'updated_on'=>time(),
					//'created_by'=>$this->session->userdata('admin_id')
				);
      	      //print_r($data);exit();


      	$type=2;
      	$check_priority=$this->AdminModel->check_question_priority($order,$id,$type);
      	if($check_priority){
      		$data['priority']=$check_priority;

      	} 

		$out1 = $this->AdminModel->update_question_table($data,$id,$order);


      }
      if($out1){
      					$out = array('status'=>1);


      	}else{
      	      					$out = array('status'=>0);
	
      	}

		

		echo json_encode($out);



	}

		function add_problem_order(){

 // $rows= $this->input->post('row'); 
 //           $column_id=$this->input->post('column'); 
 //           $table_id=trim($this->input->post('table_id'));

 //           $check=$this->AdminModel->check_data($this->session->userdata('q_id'),$this->input->post('table_id'),$rows);


			$data = array(
					'question_id'=>trim($this->session->userdata('qt_id')),
					//'table_single_width'=>trim($this->input->post('table_width')),
					'quest_val_id'=>trim($this->input->post('qst')),
					'problem_val_id'=>trim($this->input->post('prblm')),
					'ans_val_id	'=>trim($this->input->post('ans')),
					'ans_col_id	'=>trim($this->input->post('anscol')),
					'trans_val_id'=>trim($this->input->post('trans')),

					//'column_one_value'=>

					
				
					'created_on'=>time(),
					//'updated_on'=>time(),
					'created_by'=>$this->session->userdata('admin_id')
				);

		


			//if(empty($check)){


			 $t_id=$this->AdminModel->add_data($data,'problem_order');
			 // print_r($t_id);exit();


					if($t_id){


						$out = array('status'=>1,'message'=>'created','order'=>$t_id);

					}
					else{

						$out = array('status'=>0,'message'=>'failed');

						//$this->session->set_flashdata('table_created',
						//2);
					}



						//	}


			//print_r($t_id);exit();

		
        echo json_encode($out);


	}



			function add_problem_order_exist(){

  $order= $this->input->post('orderid'); 
   $type=$this->input->post('type'); 
 //           $table_id=trim($this->input->post('table_id'));

 //           $check=$this->AdminModel->check_data($this->session->userdata('q_id'),$this->input->post('table_id'),$rows);
$data=array();
if($type=='quest'){
$data['quest_val_id']=trim($this->input->post('q_val'));

}else if($type=='problem'){
$data['problem_val_id']=trim($this->input->post('q_val'));

}else if($type=='ans'){
$data['ans_val_id']=trim($this->input->post('q_val'));

}
			// $data = array(
			// 		//'question_id'=>trim($this->session->userdata('qt_id')),
			// 		//'table_single_width'=>trim($this->input->post('table_width')),
			// 		'quest_val_id'=>trim($this->input->post('q_val')),
			// 		//'problem_val_id'=>trim($this->input->post('prblm')),
			// 		// 'ans_val_id	'=>trim($this->input->post('ans')),
			// 		// 'ans_col_id	'=>trim($this->input->post('anscol')),
			// 		// 'trans_val_id'=>trim($this->input->post('trans')),

			// 		//'column_one_value'=>

					
				
			// 		//'created_on'=>time(),
			// 		//'updated_on'=>time(),
			// 		//'created_by'=>$this->session->userdata('admin_id')
			// 	);

		


			//if(empty($check)){


			 $t_id=$this->AdminModel->edit_order($order,$data,$type);
			 // print_r($t_id);exit();


					if($t_id){


						$out = array('status'=>1,'message'=>'created','order'=>$t_id);

					}
					else{

						$out = array('status'=>0,'message'=>'failed');

						//$this->session->set_flashdata('table_created',
						//2);
					}



						//	}


			//print_r($t_id);exit();

		
        echo json_encode($out);


	}


	function add_qst_table_values(){


		$data = array();
		
		$cols = (int) $this->input->post('cols');


		$qt_id = $this->session->userdata('qt_id');
				$table_id = $this->input->post('tab_id');

				        	$table=$this->AdminModel->get_table_new($table_id);

// print_r($table_det);exit();
				        	// foreach ($table_det as $key => $table) {
				        		 $cols_count = array($table['count_one_table'],$table['count_two_table'],$table['count_three_table'],$table['count_four_table'],$table['count_five_table'],$table['count_six_table'],$table['count_seven_table'],$table['count_eight_table'],$table['count_nine_table'],$table['count_ten_table'],$table['count_eleven_table'],$table['count_twelve_table'],$table['count_thirteen_table'],$table['count_fourteen_table'],$table['count_fifteen_table']);

				        	//}

				        	//print_r($cols_count);exit();






for ($i=0; $i <$cols ; $i++) {
		$data['row_count'.$i] = $this->input->post('row_count_'.$i);
	$data['row_value'.$i] = $this->input->post('row_value_'.$i);
	$data['underline0'.$i] = $this->input->post('is_underline'.$i);
	if($cols_count[$i]>0){

						$rows = count($this->input->post('row_count_'.$i));

				 $answer_sub=array();


		 	  for ($j=0; $j <$rows ; $j++) { 
		 	  	$arr=array();

		 	  			           for ($k=0; $k <$cols_count[$i] ; $k++) { 
		 	  			           	$row_value0 = $this->input->post('row_value_'.$i.$k.'');
		 	  			           			 	  $row_line0 = $this->input->post('is_underline_'.$i.$k.'');

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
		 	  $arr1['val_value']=$row_value0;
		 	   $arr1['val_underline']=$row_line0;
		 	   // $arr1['sub_line']=$row_line0;
		 	   $arr1['question_id']=$qt_id;
		 	  $arr1['row_no']=$j;
		 	   $arr1['qt_id']=$table_id;
		 	   array_push($arr,$arr1);

						 	//print_r($row_value0);
						          // $t_id=$this->AdminModel->add_data($array,'vals');
	

						 }

						 				array_push($answer_sub,$arr);


						 						//print_r($array);


					# code...
				}



	}else{


				$rows = count($this->input->post('row_count_'.$i));
				for ($j=0; $j <$rows ; $j++) { 

						 	$array = array(
					'qt_id'=>$table_id,
					'question_id'=>$qt_id,
					'col_no'=>$i,
					'val_underline'=>$data['underline0'.$i][$j],

					'row_no'=>$j,
					'val_value'=>$data['row_value'.$i][$j],
					//'val_keys'=>$keys[$r]
				);

			  $t_id=$this->AdminModel->add_data($array,'vals');
	 						//print_r($array);


					# code...
				}


	}

						// $underline0 = $this->input->post('is_underline0');


if(!empty($answer_sub[0])){
					$t_id = $this->AdminModel->add_sub_qst_insert($answer_sub[0],'vals');

			}

}

		//echo json_encode($t_id);exit();

//exit();
		// $row_count1 = $this->input->post('row_count_1');
		// $row_count2 = $this->input->post('row_count_2');
		// $row_count3 = $this->input->post('row_count_3');
		// $row_count4 = $this->input->post('row_count_4');
		// $row_count5 = $this->input->post('row_count_5');
		// $row_count6 = $this->input->post('row_count_6');
		// $row_count7 = $this->input->post('row_count_7');
		// $row_count8 = $this->input->post('row_count_8');
		// $row_count9 = $this->input->post('row_count_9');
		//$row_count8 = $this->input->post('row_count_8');

        $order=$this->input->post('order_id');
	
          $checkorder=$this->AdminModel->check_question_table($order,$qt_id);
           $quest_table_name = $this->input->post('tablename') ? $this->input->post('tablename') :$table['table_name'];

      if(empty($checkorder)){

      	$data = array(
					'question_id'=>$qt_id,
					'qt_id'=>$table_id,
					'created_on'=>time(),
					'order_id'=>$order,
					'quest_table_name'=>$quest_table_name
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
					'qt_id'=>$table_id,
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
		



$tabledet=array(
	'table_id'=>$table['table_id'],
	'table_name'=>$table['table_name'],
		'order_id'=>$order,
		


);

// 			}
			if($t_id || $sid){
				$out = array('status'=>1,'data'=>$tabledet);
			}
			else{
				$out = array('status'=>0);
			}
	//echo json_encode($out);exit();
		echo json_encode($out);

	}



	public function add_copy_excel(){
        // $col = $this->input->post('column');
        // $row = $this->input->post('row');
        //$sub = $this->input->post('sub') ? $this->input->post('sub') :0;
        //$dataqst = $this->input->post('id');
        $val = $this->input->post('array');





         foreach ($val as $key => $value) {

         	$qstval=$value['val'];
         			$qstval1=nl2br($qstval);

         	$qstid=$value['id'];


         	     if(!empty($qstid)){
        	$data = array(
					'val_value'=>$qstval1
					//'val_underline'=>$underline
					// 'transaction_helptext'=>$helptext,
					// 'transaction_image'=>$image,
					// 'updated_on'=>time(),
					// 'updated_by'=>$this->session->userdata('admin_id')
				);


        	        // print_r($data);

		$transaction_id = $this->AdminModel->edit_qst_values($qstid,$data);






        }

         }
         
// exit();

         if($transaction_id){

	       $out = array('status'=>1,'message'=>'updated','data'=>$transaction_id);


			}else{
		       $out = array('status'=>0,'message'=>'failed');

			}

        // $q_id=$this->session->userdata('qt_id');
        // $underline=$this->input->post('underline');

        // $tabledet=$this->AdminModel->get_format_by_table($this->input->post('table_id'),$q_id,$col,$row,$sub);

        //print_r($tabledet);exit();

   



	 // $data['data'] = $this->AdminModel->get_presentation_topic($code);


        
        echo json_encode($out);
    }


	public function edit_question_table(){

		$data = array();
		
		$cols = (int) $this->input->post('cols');


		$qt_id = $this->session->userdata('qt_id');
				$table_id = $this->input->post('tab_id');

				$del=$this->AdminModel->delete_question_rows($qt_id,$this->input->post('tab_id'));
		// if($del){

				        	$table=$this->AdminModel->get_table_new($table_id);

// print_r($table_det);exit();
				        	// foreach ($table_det as $key => $table) {
				        		 $cols_count = array($table['count_one_table'],$table['count_two_table'],$table['count_three_table'],$table['count_four_table'],$table['count_five_table'],$table['count_six_table'],$table['count_seven_table'],$table['count_eight_table'],$table['count_nine_table'],$table['count_ten_table'],$table['count_eleven_table'],$table['count_twelve_table'],$table['count_thirteen_table'],$table['count_fourteen_table'],$table['count_fifteen_table']);

				        	//}

				        	//print_r($cols_count);exit();






for ($i=0; $i <$cols ; $i++) {
		$data['row_count'.$i] = $this->input->post('row_count_'.$i);
	$data['row_value'.$i] = $this->input->post('row_value_'.$i);
	$data['underline0'.$i] = $this->input->post('is_underline'.$i);
	if($cols_count[$i]>0){

						$rows = count($this->input->post('row_count_'.$i));

				 $answer_sub=array();


		 	  for ($j=0; $j <$rows ; $j++) { 
		 	  	$arr=array();

		 	  			           for ($k=0; $k <$cols_count[$i] ; $k++) { 
		 	  			           	$row_value0 = $this->input->post('row_value_'.$i.$k.'');
		 	  			           			 	  $row_line0 = $this->input->post('is_underline_'.$i.$k.'');

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
		 	  $arr1['val_value']=$row_value0;
		 	   $arr1['val_underline']=$row_line0;
		 	   // $arr1['sub_line']=$row_line0;
		 	   $arr1['question_id']=$qt_id;
		 	  $arr1['row_no']=$j;
		 	   $arr1['qt_id']=$table_id;
		 	   array_push($arr,$arr1);

						 	//print_r($row_value0);
						          // $t_id=$this->AdminModel->add_data($array,'vals');
	

						 }

						 				array_push($answer_sub,$arr);


						 						//print_r($array);


					# code...
				}



	}else{


				$rows = count($this->input->post('row_count_'.$i));
				for ($j=0; $j <$rows ; $j++) { 

						 	$array = array(
					'qt_id'=>$table_id,
					'question_id'=>$qt_id,
					'col_no'=>$i,
					'val_underline'=>$data['underline0'.$i][$j],

					'row_no'=>$j,
					'val_value'=>$data['row_value'.$i][$j],
					//'val_keys'=>$keys[$r]
				);

			  $t_id=$this->AdminModel->add_data($array,'vals');
	 						//print_r($array);


					# code...
				}


	}

						// $underline0 = $this->input->post('is_underline0');


if(!empty($answer_sub[0])){
					$t_id = $this->AdminModel->add_sub_qst_insert($answer_sub[0],'vals');

			}

}

		//echo json_encode($t_id);exit();

//exit();
		// $row_count1 = $this->input->post('row_count_1');
		// $row_count2 = $this->input->post('row_count_2');
		// $row_count3 = $this->input->post('row_count_3');
		// $row_count4 = $this->input->post('row_count_4');
		// $row_count5 = $this->input->post('row_count_5');
		// $row_count6 = $this->input->post('row_count_6');
		// $row_count7 = $this->input->post('row_count_7');
		// $row_count8 = $this->input->post('row_count_8');
		// $row_count9 = $this->input->post('row_count_9');
		//$row_count8 = $this->input->post('row_count_8');

        $order=$this->input->post('order_id');
	
          $checkorder=$this->AdminModel->check_question_table($order,$qt_id);

          $quest_table_name = $this->input->post('tablename') ? $this->input->post('tablename') :$table['table_name'];
      if(empty($checkorder)){

      	$data = array(
					'question_id'=>$qt_id,
					'qt_id'=>$table_id,
					'created_on'=>time(),
					'order_id'=>$order,
					'quest_table_name'=>$quest_table_name
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
					'qt_id'=>$table_id,
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
		



$tabledet=array(
	'table_id'=>$table['table_id'],
	'table_name'=>$table['table_name'],
		'order_id'=>$order,
		


);

// 			}
			if($t_id || $sid){
				$out = array('status'=>1,'data'=>$tabledet);
			}
			else{
				$out = array('status'=>0);
			}
	//echo json_encode($out);exit();
		echo json_encode($out);
		
		// echo json_encode($out);
	}



	function add_quest_values(){


		$data = array();
		
		//$cols = (int) $this->input->post('cols');

$qt_id = $this->input->post('qstion');
			   // $qt_id = $this->session->userdata('qt_id');
				$table_id = $this->input->post('tab_id');				
				$order_id = $this->input->post('order_id');


				        	$table=$this->AdminModel->get_table_new($table_id);

// print_r($table_det);exit();
				        	// foreach ($table_det as $key => $table) {
				        		 $cols_count = array($table['count_one_table'],$table['count_two_table'],$table['count_three_table'],$table['count_four_table'],$table['count_five_table'],$table['count_six_table'],$table['count_seven_table'],$table['count_eight_table'],$table['count_nine_table'],$table['count_ten_table'],$table['count_eleven_table'],$table['count_twelve_table'],$table['count_thirteen_table'],$table['count_fourteen_table'],$table['count_fifteen_table']);

				        	//}

				        	//print_r($cols_count);exit();


$cols=$table['table_columns'];

//print_r($cols);exit();

for ($i=0; $i <$cols ; $i++) {
	// 	$data['row_count'.$i] = $this->input->post('row_count_'.$i);
	// $data['row_value'.$i] = $this->input->post('row_value_'.$i);
	// $data['underline0'.$i] = $this->input->post('is_underline'.$i);
	if($cols_count[$i]>0){

						//$rows = count($this->input->post('row_count_'.$i));

				 $answer_sub=array();


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
		 	   $arr1['sub_id']=$k;
		 	   // $arr1['sub_line']=$row_line0;
		 	   $arr1['question_id']=$qt_id;
		 	   $arr1['order_id']=$order_id;

		 	  $arr1['row_no']=0;
		 	   $arr1['qt_id']=$table_id;
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
					'qt_id'=>$table_id,
					'question_id'=>$qt_id,
					'col_no'=>$i,
					'val_underline'=>0,
										'order_id'=>$order_id,


					'row_no'=>0,
					'val_value'=>'',
					//'val_keys'=>$keys[$r]
				);

			  $t_id=$this->AdminModel->add_data($array,'vals');
	 						//print_r($array);

//$t_id=1;
					# code...
				//}


	}

						// $underline0 = $this->input->post('is_underline0');


if(!empty($answer_sub[0])){
					$t_id = $this->AdminModel->add_sub_qst_insert($answer_sub[0],'vals');
	//$t_id=1;

			}

}
//exit();

		//echo json_encode($t_id);exit();

//exit();
		// $row_count1 = $this->input->post('row_count_1');
		// $row_count2 = $this->input->post('row_count_2');
		// $row_count3 = $this->input->post('row_count_3');
		// $row_count4 = $this->input->post('row_count_4');
		// $row_count5 = $this->input->post('row_count_5');
		// $row_count6 = $this->input->post('row_count_6');
		// $row_count7 = $this->input->post('row_count_7');
		// $row_count8 = $this->input->post('row_count_8');
		// $row_count9 = $this->input->post('row_count_9');
		//$row_count8 = $this->input->post('row_count_8');

        $order=$this->input->post('order_id');
	
          $checkorder=$this->AdminModel->check_question_table($order,$qt_id);
          $quest_table_name = $this->input->post('tablename') ? $this->input->post('tablename') :'';
          

      if(empty($checkorder)){

      	$data = array(
					'question_id'=>$qt_id,
					'qt_id'=>$table_id,
					'created_on'=>time(),
					'order_id'=>$order,
					'quest_table_name'=>$quest_table_name,
					//'updated_on'=>time(),
					//'created_by'=>$this->session->userdata('admin_id')
				);


      	$type=2;
      	$check_priority=$this->AdminModel->check_question_priority($order,$qt_id,$type);
      	if($check_priority){
      		$data['priority']=$check_priority;

      	}
      	//print_r($data);exit();


		$out1 = $this->AdminModel->add_data($data,'q_table');
				//$out = array('status'=>1);




      }else{


      	$data = array(
					//'question_id'=>$id,
					'qt_id'=>$table_id,
					'quest_table_name'=>$quest_table_name,
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
		



$tabledet=array(
	'table_id'=>$table['table_id'],
	'table_name'=>$table['table_name'],
		'order_id'=>$order,
		


);


// 			}
			if($t_id || $sid){
				$out = array('status'=>1,'data'=>$tabledet);
			}
			else{
				$out = array('status'=>0);
			}
	//echo json_encode($out);exit();
		echo json_encode($out);

	}




function add_quest_row_all(){


		$data = array();
		
		//$cols = (int) $this->input->post('cols');


		$qt_id = $this->input->post('qstion');
				$table_id = $this->input->post('table_id');
				$row = $this->input->post('row');

								$lastrow = $this->input->post('last');

							$order = $this->input->post('order');


				        	$table=$this->AdminModel->get_table_new($table_id);

// print_r($table_det);exit();
				        	// foreach ($table_det as $key => $table) {
				        		 $cols_count = array($table['count_one_table'],$table['count_two_table'],$table['count_three_table'],$table['count_four_table'],$table['count_five_table'],$table['count_six_table'],$table['count_seven_table'],$table['count_eight_table'],$table['count_nine_table'],$table['count_ten_table'],$table['count_eleven_table'],$table['count_twelve_table'],$table['count_thirteen_table'],$table['count_fourteen_table'],$table['count_fifteen_table']);

				        	//}

				        	//print_r($cols_count);exit();



$cols=$table['table_columns'];


					

for ($i=0; $i <$cols ; $i++) {

	 $answer_sub=array();

	// 	$data['row_count'.$i] = $this->input->post('row_count_'.$i);
	// $data['row_value'.$i] = $this->input->post('row_value_'.$i);
	// $data['underline0'.$i] = $this->input->post('is_underline'.$i);
	if($cols_count[$i]>0){


$arr=array();



				//$rows = count($this->input->post('row_count_'.$i));

             $row1=$lastrow+$row;

		 	  	
		 	  for ($j=$lastrow; $j <=$row1 ; $j++) {

 



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
		 	  $arr1['row_no']=$j;
		 	  $arr1['sub_id']=$k;
		 	   $arr1['qt_id']=$table_id;
		 	   array_push($arr,$arr1);

						 	//print_r($row_value0);
	

						 }

						 // print_r($arr);




			   // array_push($answer_sub,$arr);

 						//print_r($array);

					# code...
				}
			   array_push($answer_sub,$arr);


								//   print_r($answer_sub);



	}else{
             $row1=$lastrow+$row;


				//$rows = count($this->input->post('row_count_'.$i));
				for ($j=$lastrow; $j <=$row1 ; $j++) { 

						 	$array = array(
					'qt_id'=>$table_id,
					'question_id'=>$qt_id,
					'col_no'=>$i,
					'val_underline'=>0,
					'sub_id'=>0,
				    'order_id'=>$order,


					'row_no'=>$j,
					'val_value'=>'',
					//'val_keys'=>$keys[$r]
				);

			   $t_id=$this->AdminModel->add_data($array,'vals');
	 						//print_r($array);



					# code...
				}



	}



						// $underline0 = $this->input->post('is_underline0');
	//print_r($answer_sub);


	if(!empty($answer_sub)){


//print_r($answer_sub);
	
				
					 $t_id = $this->AdminModel->add_sub_qst_insert_new($answer_sub,'vals');

			}




}



 // exit();


		//echo json_encode($t_id);exit();

//exit();
		// $row_count1 = $this->input->post('row_count_1');
		// $row_count2 = $this->input->post('row_count_2');
		// $row_count3 = $this->input->post('row_count_3');
		// $row_count4 = $this->input->post('row_count_4');
		// $row_count5 = $this->input->post('row_count_5');
		// $row_count6 = $this->input->post('row_count_6');
		// $row_count7 = $this->input->post('row_count_7');
		// $row_count8 = $this->input->post('row_count_8');
		// $row_count9 = $this->input->post('row_count_9');
		//$row_count8 = $this->input->post('row_count_8');

  //       $order=$this->input->post('order_id');
	
  //         $checkorder=$this->AdminModel->check_question_table($order,$qt_id);
  //     if(empty($checkorder)){

  //     	$data = array(
		// 			'question_id'=>$qt_id,
		// 			'qt_id'=>$table_id,
		// 			'created_on'=>time(),
		// 			'order_id'=>$order,
		// 			//'updated_on'=>time(),
		// 			//'created_by'=>$this->session->userdata('admin_id')
		// 		);


		// $out1 = $this->AdminModel->add_data($data,'q_table');
		// 		//$out = array('status'=>1);




  //     }else{


  //     	$data = array(
		// 			//'question_id'=>$id,
		// 			'qt_id'=>$table_id,
		// 			//'created_on'=>time(),
		// 			//'order_id'=>$order,
		// 			//'updated_on'=>time(),
		// 			//'created_by'=>$this->session->userdata('admin_id')
		// 		);
  //     	      //print_r($data);exit();



		// $out1 = $this->AdminModel->update_question_table($data,$qt_id,$order);


  //     }
		



// $tabledet=array(
// 	'table_id'=>$table['table_id'],
// 	'table_name'=>$table['table_name'],
// 		'order_id'=>$order,
		


// );

// 			}
			if($t_id || $sid){
				$out = array('status'=>1,'data'=>$table);
			}
			else{
				$out = array('status'=>0);
			}
	//echo json_encode($out);exit();
		echo json_encode($out);

	}

	function add_quest_row(){


		$data = array();
		
		//$cols = (int) $this->input->post('cols');



		$qt_id = $this->input->post('qstion');
				$table_id = $this->input->post('table_id');
				$row = $this->input->post('row');
							$order = $this->input->post('order');


				        	$table=$this->AdminModel->get_table_new($table_id);

// print_r($table_det);exit();
				        	// foreach ($table_det as $key => $table) {
				        		 $cols_count = array($table['count_one_table'],$table['count_two_table'],$table['count_three_table'],$table['count_four_table'],$table['count_five_table'],$table['count_six_table'],$table['count_seven_table'],$table['count_eight_table'],$table['count_nine_table'],$table['count_ten_table'],$table['count_ten_table'],$table['count_eleven_table'],$table['count_twelve_table'],$table['count_thirteen_table'],$table['count_fourteen_table'],$table['count_fifteen_table']);

				        	//}


				        	//print_r($cols_count);exit();


$cols=$table['table_columns'];

//print_r($cols);exit();

for ($i=0; $i <$cols ; $i++) {
					 $answer_sub=array();
	// 	$data['row_count'.$i] = $this->input->post('row_count_'.$i);
	// $data['row_value'.$i] = $this->input->post('row_value_'.$i);
	// $data['underline0'.$i] = $this->input->post('is_underline'.$i);
	if($cols_count[$i]>0){

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
		 	  $arr1['row_no']=$row;
		 	  $arr1['sub_id']=$k;
		 	   $arr1['qt_id']=$table_id;
		 	   array_push($arr,$arr1);

						 	//print_r($row_value0);
						          // $t_id=$this->AdminModel->add_data($array,'vals');
	

						 }

						 				array_push($answer_sub,$arr);


						 						//print_r($answer_sub);


					# code...
				//}



	}else{


				//$rows = count($this->input->post('row_count_'.$i));
				//for ($j=0; $j <$rows ; $j++) { 

						 	$array = array(
					'qt_id'=>$table_id,
					'question_id'=>$qt_id,
					'col_no'=>$i,
					'val_underline'=>0,
					'sub_id'=>0,
				    'order_id'=>$order,


					'row_no'=>$row,
					'val_value'=>'',
					//'val_keys'=>$keys[$r]
				);

			 $t_id=$this->AdminModel->add_data($array,'vals');
	 						//print_r($array);


					# code...
				//}


	}


						// $underline0 = $this->input->post('is_underline0');
	//print_r($answer_sub);


if(!empty($answer_sub)){
					$t_id = $this->AdminModel->add_sub_qst_insert_new($answer_sub,'vals');

			}

}
//exit();

		//echo json_encode($t_id);exit();

//exit();
		// $row_count1 = $this->input->post('row_count_1');
		// $row_count2 = $this->input->post('row_count_2');
		// $row_count3 = $this->input->post('row_count_3');
		// $row_count4 = $this->input->post('row_count_4');
		// $row_count5 = $this->input->post('row_count_5');
		// $row_count6 = $this->input->post('row_count_6');
		// $row_count7 = $this->input->post('row_count_7');
		// $row_count8 = $this->input->post('row_count_8');
		// $row_count9 = $this->input->post('row_count_9');
		//$row_count8 = $this->input->post('row_count_8');

  //       $order=$this->input->post('order_id');
	
  //         $checkorder=$this->AdminModel->check_question_table($order,$qt_id);
  //     if(empty($checkorder)){

  //     	$data = array(
		// 			'question_id'=>$qt_id,
		// 			'qt_id'=>$table_id,
		// 			'created_on'=>time(),
		// 			'order_id'=>$order,
		// 			//'updated_on'=>time(),
		// 			//'created_by'=>$this->session->userdata('admin_id')
		// 		);


		// $out1 = $this->AdminModel->add_data($data,'q_table');
		// 		//$out = array('status'=>1);




  //     }else{


  //     	$data = array(
		// 			//'question_id'=>$id,
		// 			'qt_id'=>$table_id,
		// 			//'created_on'=>time(),
		// 			//'order_id'=>$order,
		// 			//'updated_on'=>time(),
		// 			//'created_by'=>$this->session->userdata('admin_id')
		// 		);
  //     	      //print_r($data);exit();



		// $out1 = $this->AdminModel->update_question_table($data,$qt_id,$order);


  //     }
		



// $tabledet=array(
// 	'table_id'=>$table['table_id'],
// 	'table_name'=>$table['table_name'],
// 		'order_id'=>$order,
		


// );

// 			}
			if($t_id || $sid){
				$out = array('status'=>1,'data'=>$table);
			}
			else{
				$out = array('status'=>0);
			}
	//echo json_encode($out);exit();
		echo json_encode($out);

	}


	

	public function edit_question_table_values_append(){
        // $col = $this->input->post('column');
        // $row = $this->input->post('row');
        $sub = $this->input->post('sub') ? $this->input->post('sub') :0;
        $datacolumn = $this->input->post('column');
        $datarow = $this->input->post('row');
        $datatable = $this->input->post('table');

        $val = $this->input->post('val');
        $q_id=$this->session->userdata('qt_id');
        //$underline=$this->input->post('underline');

        // $tabledet=$this->AdminModel->get_format_by_table($this->input->post('table_id'),$q_id,$col,$row,$sub);

        //print_r($tabledet);exit();

        if(!empty($val)){
        	$data = array(
					'val_value'=>$val,
					//'val_underline'=>$underline
					// 'transaction_helptext'=>$helptext,
					// 'transaction_image'=>$image,
					// 'updated_on'=>time(),
					// 'updated_by'=>$this->session->userdata('admin_id')
				);
		$transaction_id = $this->AdminModel->edit_qst_values_new($datacolumn,$datarow,$sub,$datatable,$data);





if($transaction_id){

	       $out = array('status'=>1,'message'=>'updated','data'=>$transaction_id);


}else{
	       $out = array('status'=>0,'message'=>'failed');

}
        }else{
        	 $out = array('status'=>0,'message'=>'failed');
        }



	 // $data['data'] = $this->AdminModel->get_presentation_topic($code);


        
        echo json_encode($out);
    }

	public function edit_question_table_values(){
        // $col = $this->input->post('column');
        // $row = $this->input->post('row');
        $sub = $this->input->post('sub') ? $this->input->post('sub') :0;
        $dataqst = $this->input->post('dataqst');
        $val = $this->input->post('val');
        $q_id=$this->session->userdata('qt_id');
        $underline=$this->input->post('underline');

        // $tabledet=$this->AdminModel->get_format_by_table($this->input->post('table_id'),$q_id,$col,$row,$sub);

        //print_r($tabledet);exit();

        if(!empty($dataqst)){
        	$data = array(
					'val_value'=>$val,
					'val_underline'=>$underline
					// 'transaction_helptext'=>$helptext,
					// 'transaction_image'=>$image,
					// 'updated_on'=>time(),
					// 'updated_by'=>$this->session->userdata('admin_id')
				);
		$transaction_id = $this->AdminModel->edit_qst_values($dataqst,$data);





if($transaction_id){

	       $out = array('status'=>1,'message'=>'updated','data'=>$dataqst);


}else{
	       $out = array('status'=>0,'message'=>'failed');

}
        }else{
        	 $out = array('status'=>0,'message'=>'failed');
        }



	 // $data['data'] = $this->AdminModel->get_presentation_topic($code);


        
        echo json_encode($out);
    }


    	public function edit_problem_name(){
        // $col = $this->input->post('column');
        // $row = $this->input->post('row');
       // $sub = $this->input->post('sub') ? $this->input->post('sub') :0;
        $name = $this->input->post('name');
        $table = $this->input->post('table');
        $q_id=$this->session->userdata('qt_id');
       // $underline=$this->input->post('underline');

        // $tabledet=$this->AdminModel->get_format_by_table($this->input->post('table_id'),$q_id,$col,$row,$sub);

        //print_r($tabledet);exit();

        // if(!empty($name)){
        	$data = array(
					'format_name'=>$name,
					//'val_underline'=>$underline
					// 'transaction_helptext'=>$helptext,
					// 'transaction_image'=>$image,
					// 'updated_on'=>time(),
					// 'updated_by'=>$this->session->userdata('admin_id')
				);
		$transaction_id = $this->AdminModel->edit_prblem_name($q_id,$table,$data);





if($transaction_id){

	       $out = array('status'=>1,'message'=>'updated','data'=>$table);


}else{
	       $out = array('status'=>0,'message'=>'failed');

}
        // }else{
        // 	 $out = array('status'=>0,'message'=>'failed');
        // }



	 // $data['data'] = $this->AdminModel->get_presentation_topic($code);


        
        echo json_encode($out);
    }



public function delete_ans_order(){


    $id=$this->input->post('id');
    $q_id=$this->session->userdata('qt_id');
   // print_r($q_id);exit();
		//$out = $this->AdminModel->delete_question($id);

		if($this->AdminModel->delete_ans_order($id,$q_id)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);

		}

public function delete_ans_table(){


    $id=$this->input->post('id');
    $q_id=$this->session->userdata('qt_id');
		//$out = $this->AdminModel->delete_question($id);

		if($this->AdminModel->delete_ans_table($id,$q_id)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);

		}


    public function delete_quest_table(){


    $id=$this->input->post('id');
    $q_id=$this->session->userdata('qt_id');
		//$out = $this->AdminModel->delete_question($id);

		if($this->AdminModel->delete_quest_table($id,$q_id)){
			
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);

		}


    
    	public function delete_problem_format(){


    $id=$this->input->post('id');
    $q_id=$this->session->userdata('qt_id');
		//$out = $this->AdminModel->delete_question($id);

		if($this->AdminModel->delete_problem_format($id)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);

		}

		public function delete_problem_format_row(){


    $id=$this->input->post('row');
    $q_id=$this->session->userdata('qt_id');
    $table=$this->input->post('table');
		//$out = $this->AdminModel->delete_question($id);

		if($this->AdminModel->delete_problem_format_row($id,$table)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);

		}



	

			public function delete_question_row(){


    $id=$this->input->post('row');
    $q_id=$this->session->userdata('qt_id');
    $table=$this->input->post('table');
        $order=$this->input->post('order');

		//$out = $this->AdminModel->delete_question($id);

		if($this->AdminModel->delete_question_row($id,$table,$q_id,$order)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);

		}

		public function remove_order_val(){




		$q_val_id = $this->input->post('q_val');
		$type = $this->input->post('type');
		$orderid = $this->input->post('orderid');
		if($type=='problem'){


           $qry=$this->AdminModel->remove_order_pr_vals($q_val_id,$orderid);
		}elseif($type=='quest'){

            $qry=$this->AdminModel->remove_order_qst_vals($q_val_id,$orderid);

		}elseif($type=='trans'){

            $qry=$this->AdminModel->remove_order_trans_vals($q_val_id,$orderid);

		}elseif($type=='ans'){

            $qry=$this->AdminModel->remove_order_ans_vals($q_val_id,$orderid);

		}
		
			if($qry){
				$out=array('status'=>1);
			}
			else $out=array('status'=>0);
		
		echo json_encode($out);
	}


		public function delete_answer_row(){


    $id=$this->input->post('row');
    $q_id=$this->session->userdata('qt_id');
    $table=$this->input->post('table');
    //print_r($q_id);exit();
		//$out = $this->AdminModel->delete_question($id);


		// $del=$this->AdminModel->delete_answers_rows($qt_id,$this->input->post('tab_id'));
		// $del=$this->AdminModel->delete_answers_sub($qt_id,$this->input->post('tab_id'));


		if($this->AdminModel->delete_answer_row($id,$table,$q_id)){

			$del=$this->AdminModel->delete_answer_sub_row($id,$table,$q_id);

			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);

		}


		

			function add_ans_header(){

  
 	$type=$this->input->post('type');

           	$check=$this->AdminModel->check_data_header($this->session->userdata('qt_id'),$this->input->post('table'));
           if(empty($check)){

          



           	$data = array(
					'question_id'=>trim($this->session->userdata('qt_id')),
					//'table_single_width'=>trim($this->input->post('table_width')),
					'answer_table_id'=>trim($this->input->post('table')),
					
					// 'header_note	'=>trim($this->input->post('title')),

				
					'created_on'=>time(),
					//'updated_on'=>time(),
					 'created_by'=>$this->session->userdata('admin_id')
				);

           	if($type=='header'){
           		$data['header_note']=trim($this->input->post('title'));
           	}elseif($type=='footer'){
           		$data['footer_note']=trim($this->input->post('title'));
           	}

		


			//if(empty($check)){


			 $t_id=$this->AdminModel->add_data($data,'answer_header');

           }else{

           	$data=array();


           		if($type=='header'){
           		$data['header_note']=trim($this->input->post('title'));
           	}elseif($type=='footer'){
           		$data['footer_note']=trim($this->input->post('title'));
           	}


          $t_id=$this->AdminModel->edit_header_data($data,$this->session->userdata('qt_id'),$this->input->post('table'));


           }
			
			 // print_r($t_id);exit();


					if($t_id){


						$out = array('status'=>1,'message'=>'created','order'=>$t_id);

					}
					else{

						$out = array('status'=>0,'message'=>'failed');

						//$this->session->set_flashdata('table_created',
						//2);
					}



						//	}


			//print_r($t_id);exit();

		
        echo json_encode($out);


	}



		function add_inter_question(){

 // $rows= $this->input->post('row'); 
 //           $column_id=$this->input->post('column'); 
 //           $table_id=trim($this->input->post('table_id'));

 //           $check=$this->AdminModel->check_data($this->session->userdata('q_id'),$this->input->post('table_id'),$rows);
			$j=0;
           for ($i=0; $i <4 ; $i++) { 
            	$k=$i+1;
            	       if(!empty($this->input->post('option'.$k))){
                         $j=$j+1; 


            	       }


            } 



			$data = array(
					'question_id'=>trim($this->session->userdata('qt_id')),
					//'table_single_width'=>trim($this->input->post('table_width')),
					'type'=>trim($this->input->post('type')),
					'option_no'=>$j,
					'value_id'=>trim($this->input->post('val')),
					'title	'=>trim($this->input->post('title')),
					'option1	'=>trim($this->input->post('option1')),
					'option2'=>trim($this->input->post('option2')),
					'option3'=>trim($this->input->post('option3')),
					'option4'=>trim($this->input->post('option4')),
					'answer_value'=>trim($this->input->post('ans')),

					//'column_one_value'=>

					
				
					'created_on'=>time(),
					//'updated_on'=>time(),
					// 'created_by'=>$this->session->userdata('admin_id')
				);

		


			//if(empty($check)){


			 $t_id=$this->AdminModel->add_data($data,'interactive_questions');
			 // print_r($t_id);exit();


					if($t_id){


						$out = array('status'=>1,'message'=>'created','order'=>$t_id);

					}
					else{

						$out = array('status'=>0,'message'=>'failed');

						//$this->session->set_flashdata('table_created',
						//2);
					}



						//	}


			//print_r($t_id);exit();

		
        echo json_encode($out);


	}


		
	 public function get_inter_question(){
	 	        $val = $this->input->post('q_val');
	 	        $type = $this->input->post('type');
	 	        $det=$this->AdminModel->get_interactive_question($val,$type);


	 	                if(!empty($det)){

        	        						$out = array('status'=>1,'message'=>'created','data'=>$det);

	 	                }else{
        	        						$out = array('status'=>0,'message'=>'no data');


	 	                }



        echo json_encode($out);

			}




		 // public function get_inter_question(){
	 	//         $val = $this->input->post('q_val');
	 	//         $type = $this->input->post('type');
	 	//         $det=$this->AdminModel->get_interactive_question($val,$type);


	 	//                 if(!empty($det)){

   //      	        						$out = array('status'=>1,'message'=>'created','data'=>$det);

	 	//                 }else{
   //      	        						$out = array('status'=>0,'message'=>'no data');


	 	//                 }



   //      echo json_encode($out);

			// }



	public function get_problem_val(){
        $col = $this->input->post('column');
        $row = $this->input->post('row');
        $sub = $this->input->post('sub') ? $this->input->post('sub') :0;
        $table_id = $this->input->post('table_id');
        $q_id=$this->session->userdata('qt_id');

        $tabledet=$this->AdminModel->get_format_by_table($this->input->post('table_id'),$q_id,$col,$row,$sub);

        //print_r($tabledet);exit();

        if(!empty($tabledet)){
        	$data=array(
        		'value_text'=>$tabledet[0]['col_value'],
        		'value_help'=>$tabledet[0]['col_help_text'],
        		'col_keys	'=>$tabledet[0]['col_keys'],


        	);
        	        						$out = array('status'=>1,'message'=>'created','data'=>$data);




        }else{

        	$data=array();
        	        						$out = array('status'=>0,'message'=>'created','data'=>$data);


        }

	 // $data['data'] = $this->AdminModel->get_presentation_topic($code);


        
        echo json_encode($out);
    }


     public function add_problem_row(){
        
        $row = $this->input->post('row');
      
        $table_id = $this->input->post('table_id');
         $q_id=$this->session->userdata('qt_id');








          $checkdet=$this->AdminModel->get_checkformat($this->input->post('table_id'),$q_id);
		   //print_r($checkdet);exit();
		          if(empty($checkdet)){

		          	$data = array(
							'question_id'=>trim($this->session->userdata('qt_id')),
							//'table_single_width'=>trim($this->input->post('table_width')),
							'table_id'=>trim($this->input->post('table_id')),
							// 'format_name'=>trim($this->input->post('table_name')),
							
						
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

		          }
     

                   $table=$this->AdminModel->get_table_new($this->input->post('table_id'));

		       $cols_count = array($table['count_one_table'],$table['count_two_table'],$table['count_three_table'],$table['count_four_table'],$table['count_five_table'],$table['count_six_table'],$table['count_seven_table'],$table['count_eight_table'],$table['count_nine_table'],$table['count_ten_table'],$table['count_eleven_table'],$table['count_twelve_table'],$table['count_thirteen_table'],$table['count_fourteen_table'],$table['count_fifteen_table']);


		            	$cols=$table['table_columns'];
		       for ($i=0; $i <$cols ; $i++) {
		       	        //for ($j=0; $j <2 ; $j++) { 
		       	        	if($cols_count[$i]<=0){
		       	        		

		       	        	$datanew = array(
					// 'question_id'=>trim($this->session->userdata('qt_id')),
					//'table_single_width'=>trim($this->input->post('table_width')),
					'table_id'=>trim($this->input->post('table_id')),
					'column_id'=>$i,
					'row_id'=>$row,
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
					'row_id'=>$row,
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
		       	        	


		       	       // }



		       }

		       if($dsffd){
		       	$out = array('status'=>1,'message'=>'created');
		       }else{
$out = array('status'=>0,'message'=>'failed');
		       }
        //print_r($tabledet);exit();

        // if(!empty($tabledet)){
        // 	$data=array(
        // 		'value_text'=>$tabledet[0]['col_value'],
        // 		'value_help'=>$tabledet[0]['col_help_text'],
        // 		'col_keys	'=>$tabledet[0]['col_keys'],


        // 	);
        // 	        						$out = array('status'=>1,'message'=>'created','data'=>$data);




        // }else{

        // 	$data=array();
        // 	        						$out = array('status'=>0,'message'=>'created','data'=>$data);


        // }

	 // $data['data'] = $this->AdminModel->get_presentation_topic($code);


        
        echo json_encode($out);
    }

    




	public function delete_chapter_design(){
		$id=$this->input->post('id');
		//$out = $this->AdminModel->delete_question($id);

		if($this->AdminModel->delete_chapter_design($id)){
			
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
	}
	public function get_presentation_topic(){
        $code = $this->input->post('value');
        
        $data['data'] = $this->AdminModel->get_presentation_topic($code);
        
        echo json_encode($data);
    }
    public function reset_filter(){
        $code = $this->input->post('value');
        $this->session->unset_userdata($code);
        $out = array('status'=>1,'data'=>'');
        echo json_encode($out);
    }
    public function get_exercise(){
        $id = $this->input->post('id');
        $data = $this->InstituteModel->get_exercise($id);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
    }
    public function get_exercise_bank(){
        $id = $this->input->post('id');
        $data = $this->InstituteModel->get_exercise_bank($id);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
    }
    public function delete_exercise_bank(){
		$id=$this->input->post('id');
		//$out = $this->AdminModel->delete_question($id);

		if($this->InstituteModel->delete_exercise_bank($id)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
	}
	public function get_news(){
        $id = $this->input->post('id');
        $data = $this->InstituteModel->get_news($id);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
    }
    public function reset_password(){
        $cur_pass = $this->input->post('cur_pass');
        $new_pass = $this->input->post('new_pass');
        $data = $this->AdminModel->reset_password($cur_pass,$new_pass);
        if($data['status'] == 1) $out = array('status'=>1,'data'=>'');
        elseif($data['status'] == 0) $out = array('status'=>0,'data'=>'Invalid request!');
        else $out = array('status'=>2,'data'=>'Invalid request!');
        echo json_encode($out);
    }
    
    public function get_admin_username(){
		$code = $this->input->post('value');
		$id = $this->input->post('id');              
        $count = $this->AdminModel->get_admin_username($code,$id);

        if($count >0)
        {
            echo 1;
        }
        
        else
        {
            echo 0;
        }
	}
}

?>