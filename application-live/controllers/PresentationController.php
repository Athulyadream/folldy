<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PresentationController extends CI_Controller {

	function __construct(){
        parent::__construct();
     //    if((!$this->session->userdata('admin_id'))&&(!$this->session->userdata('teacher_id'))){
     //        redirect(base_url());
     //    }
     //    if($this->session->userdata('admin_id') == "" && $this->session->userdata('teacher_id') != ""){
    	// 		$this->session->set_userdata('admin_id',$this->session->userdata('teacher_id'));
    	// }


    	if(($this->uri->segment(1) != 'presentation-webview') AND ($this->uri->segment(1) != 'chapter-webview') AND ($this->uri->segment(1) != 'chapter-webview-new')){
	        if((!$this->session->userdata('admin_id'))&&(!$this->session->userdata('teacher_id'))){
	            redirect(base_url());
	        }
	        if($this->session->userdata('admin_id') == "" && $this->session->userdata('teacher_id') != ""){
	    			$this->session->set_userdata('admin_id',$this->session->userdata('teacher_id'));
	    	}
    	}

    	$this->output->cache(12);
    
		$this->load->library('dblog');
    	
		date_default_timezone_set('Asia/Kolkata');
		$this->load->model('PresentationModel');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		header('Set-Cookie: cross-site-cookie=name; SameSite=None; Secure');
    }




    

	// public function dashboard(){
	// 	$this->load->view('backend/header');
	// 	$this->load->view('backend/index');
	// 	$this->load->view('backend/footer');
	// }
	public function presentation_filter(){
		$filter = array(
						'name' => $this->input->post('filter_name') ? $this->input->post('filter_name') : '',
						
					);
		$this->session->set_userdata('presentation_filter',$filter);
		redirect(base_url('presentation'));
	}
	public function presentation(){

		$filter = $this->session->userdata('presentation_filter');
		$filter_data = array(
					'name'=> isset($filter['name'])? $filter['name']:'',
			);

		$this->load->library('pagination');



		$config['base_url'] = base_url('presentation');
		$config['total_rows'] = $this->PresentationModel->count_presentation($filter_data);
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
							'presentation'=>$this->PresentationModel->list_presentation($limit,$offset,$filter_data),
							'links'=>$links,
							'offset'=>$offset,
							'filter_data' => $filter_data,
						);
		$this->load->view('backend/header');
		$this->load->view('backend/presentation',$body_data);
		$this->load->view('backend/footer');
	}

	public function add_presentation(){
		$presentation_title = trim($this->input->post('presentation_title'));
		// $presentation_tags = trim($this->input->post('presentation_tags'));
		$keywords = explode(',',$this->input->post('presentation_tags'));
		$data = array(
					'presentation_title'=>$presentation_title,
					'created_on'=>time(),
					'updated_on'=>time(),
					'created_by'=>$this->session->userdata('admin_id'),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		$pid = $this->PresentationModel->add_data($data,'presentation');
		if($pid){
			$count = 1;
			$data = array(
					'topic_title'=>$presentation_title,
					'topic_presentation_id'=>$pid,
					'topic_type'=>'main',
					'color'=>'#000',
					'topic_height'=>'200',
					'topic_width'=>'200',
					'topic_content_position_left'=>'70',
					'topic_content_position_top'=>'70',
					// $value_tit=>$value,
					'created_at'=>time(),
					'updated_at'=>time(),
					'created_by'=>$this->session->userdata('admin_id')
				);
				// $out = $this->PresentationModel->add_data($data,'presentation_topic');
				// echo json_encode($out);
				$sid = $this->PresentationModel->add_data($data,'presentation_topic');


				$keyword_data = array();
				foreach($keywords as $temp){
						$keywords_val = explode(';',$temp);
					foreach($keywords_val as $val_key){

						$pemp = array('tag'=>$val_key,'presentation_id'=>$pid);
					//array_push($keyword_data,$pemp);
					$qry=$this->PresentationModel->add_keywords_presentation($pemp);
						//print_r($pemp);

					}						
				}
			$this->dblog->logQueries('admin',$this->session->userdata('admin_id'));
// $this->Api_student->insert_log("APP - Q and A Question Added".$pid,$id,'Student' );
			$this->session->set_flashdata('presentation_created',1);
		}
		else{
			$this->session->set_flashdata('presentation_created',2);
		}
		redirect(base_url('presentation-slide').'/'.$sid);


	}
	public function edit_presentation(){
		$id = $this->input->post('presentation_id');
		$presentation_title = trim($this->input->post('edit_presentation_title'));
		// $presentation_tags = $this->input->post('edit_presentation_tag');
	$keywords = explode(',',$this->input->post('edit_presentation_tag'));

		$data = array(
					'presentation_title'=>$presentation_title,
					'presentation_tags'=>$presentation_tags,
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->edit_presentation($id,$data)){
			$keyword_data = array();
				$this->PresentationModel->deletePresentationtags($id);
				foreach($keywords as $temp){
						$keywords_val = explode(';',$temp);
					foreach($keywords_val as $val_key){

						$pemp = array('tag'=>$val_key,'presentation_id'=>$id);
					//array_push($keyword_data,$pemp);
					$qry=$this->PresentationModel->add_keywords_presentation($pemp);
						//print_r($pemp);

					}						
				}
				$this->PresentationModel->insert_log("web - presentation updated".$id,$this->session->userdata('admin_id'),'admin' );
			$this->session->set_flashdata('presentation_updated',1);
		}
		else{
			$this->session->set_flashdata('presentation_updated',2);
		}
		redirect(base_url('presentation'));
	}
	public function delete_presentation(){
		$id = $this->input->post('presentation_id');
		$data = array(
					'presentation_status'=>0,
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		$data2 = array(
					'topic_status'=>0,
					'updated_at'=>date('Y_m-d'),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->edit_presentation($id,$data)){
			$this->PresentationModel->edit_topic($id,$data2);
			$this->session->set_flashdata('presentation_updated',1);
			$this->PresentationModel->insert_log("web - presentation deleted id -".$id,$this->session->userdata('admin_id'),'admin' );
			$out = array('status'=>1,'data'=>'OK');
		}
		else{
			$this->session->set_flashdata('presentation_updated',2);
			 $out = array('status'=>0,'data'=>'Unable to delete!');
		}
		echo json_encode($out);
	}
	function check_presentation_title(){
		$title = trim($this->input->post('title'));
		$check = $this->PresentationModel->check_title($title);
		
		if($check ==1){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to check!');
		echo json_encode($out);
	}


	public function presentation_slide($id){
		$topicid = $this->PresentationModel->get_topic_main_parent($id);
		if($this->input->post('searchTermslide')){
			$termslide  = $this->input->post('searchTermslide');
		}else{
			$termslide  = "";

		}
		// print_r($termslide);
		// die();
		$body_data = array(
							'questions' => $this->PresentationModel->get_problem_solving($id),
							'presentation_topic'=>$this->PresentationModel->list_presentation_topic($id),
							'topics'=>$this->PresentationModel->get_topics_slide($topicid,$termslide),
							'presentations'=>$this->PresentationModel->list_presentations($id),
							'images'=>$this->PresentationModel->list_images(),

							'topic_id'=>$id,
							'tags'=>$this->PresentationModel->get_question_tags(),
							'trm'=>$termslide
						);
		// $this->load->view('backend/header1');
		$this->load->view('backend/presentation_slide',$body_data);
		// $this->load->view('backend/footer1');
	}


	public function presentation_slide_copy($id){
		$topicid = $this->PresentationModel->get_topic_main_parent($id);
		if($this->input->post('searchTermslide')){
			$termslide  = $this->input->post('searchTermslide');
		}else{
			$termslide  = "";

		}
		// print_r($termslide);
		// die();
		$body_data = array(
							'questions' => $this->PresentationModel->get_problem_solving($id),
							'presentation_topic'=>$this->PresentationModel->list_presentation_topic($id),
							'topics'=>$this->PresentationModel->get_topics_slide($topicid,$termslide),
							'presentations'=>$this->PresentationModel->list_presentations($id),
							'images'=>$this->PresentationModel->list_images(),

							'topic_id'=>$id,
							'tags'=>$this->PresentationModel->get_question_tags(),
							'trm'=>$termslide
						);
		// $this->load->view('backend/header1');
		$this->load->view('backend/presentation_slide_copy',$body_data);
		// $this->load->view('backend/footer1');
	}

	public function presentation_slide_view_copy($id){
		$topicid = $this->PresentationModel->get_topic_main_parent($id);
		if($topicid == 0){
			$tid = $id;
		}else{
			$tid = $topicid; 
		}
		$body_data = array(
							'presentation_topic'=>$this->PresentationModel->list_presentation_topic($tid),
							'topics'=>$this->PresentationModel->get_topics($tid),
							'topic_id'=>$tid,
							'presentation_name' => $this->PresentationModel->get_presentation_name($tid)
						);
		// $this->load->view('backend/header1');
		$this->load->view('backend/presentation_slide_view-latestoct1',$body_data);
		// $this->load->view('backend/footer1');
	}

	public function presentation_slide_view($id){
		$topicid = $this->PresentationModel->get_topic_main_parent($id);
		if($topicid == 0){
			$tid = $id;
		}else{
			$tid = $topicid; 
		}
		$body_data = array(
							'presentation_topic'=>$this->PresentationModel->list_presentation_topic($tid),
							'topics'=>$this->PresentationModel->get_topics($tid),
							'topic_id'=>$tid,
							'presentation_name' => $this->PresentationModel->get_presentation_name($tid)
						);
		// $this->load->view('backend/header1');
		$this->load->view('backend/presentation_slide_view',$body_data);
		// $this->load->view('backend/footer1');
	}

	public function presentation_slide_pre($id){
	
		$body_data = array(
							'presentation_slide'=>$this->PresentationModel->list_presentation_slide($id),
							'presentation_id'=>$id
						);
		$this->load->view('backend/header');
		$this->load->view('backend/presentation_slide_list',$body_data);
		$this->load->view('backend/footer');
	}
	
	














	//////////////////////////Ajax//////////////////////////////////////////////////
	// public function add_topic(){
	// 	$presentation_sub_id = trim($this->input->post('id'));
	// 	$count = $this->PresentationModel->get_topic_id($topic);
	// 	// $count =
	// 	if($count){
	// 		$count =$count+1;;
	// 	}else{
	// 		$count =1;
	// 	}
		
	// 	$data = array(
	// 				'topic_title'=>'New topic'.$count,
	// 				'topic_type'=>'main',
	// 				'presentation_sub_id'=>$presentation_sub_id,
	// 				'color'=>'#000',
	// 				'backgroundcolor'=>'#fff',
	// 				'height'=>'400',
	// 				'width'=>'500',
	// 				'created_at'=>time(),
	// 				'updated_at'=>time(),
	// 				'created_by'=>$this->session->userdata('admin_id')
	// 			);
	// 	$id_add = $this->PresentationModel->add_data($data,'presentation_topic');
	// 	// print_r($id_add);
	// 	// die();
	// 	if($id_add){
	// 		$out = array('status'=>1,'data'=>$id_add);
	// 	}
	// 	else $out = array('status'=>0,'data'=>'Unable to delete!');
	// 	echo json_encode($out);
		
	// }





	public function update_topic(){
		$ptopic = trim($this->input->post('id'));
		$cvalue = trim($this->input->post('cval'));
		$topic_id = trim($this->input->post('topic_id'));

		// // $count =
		// if($count){
		// 	$count =$count+1;;
		// }else{
		// 	$count =1;
		// }
		
		$data = array(
					$cvalue=>$ptopic,
					'updated_at'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($cvalue == 'backgroundcolor'){
			$data['backgroundimage'] = "";
		}
		if($this->PresentationModel->update_topic($topic_id,$data)){
			// $this->PresentationModel->insert_log("web - presentation updated ".$cvalue." as ".$ptopic." id -".$topic_id,$this->session->userdata('admin_id'),'admin' );
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}
	public function update_topic_style(){
		$ptopic = trim($this->input->post('id'));
		$cvalue = trim($this->input->post('cval'));
		$topic_id = trim($this->input->post('topic_id'));

		// // $count =
		// if($count){
		// 	$count =$count+1;;
		// }else{
		// 	$count =1;
		// }
		
		$data = array(
					$cvalue=>$ptopic,
					'updated_at'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->update_topic_parent($topic_id,$data)){
			$out = array('status'=>1,'data'=>'OK');
			// $this->PresentationModel->insert_log("web - presentation updated ".$cvalue." as ".$ptopic." id - ".$topic_id,$this->session->userdata('admin_id'),'admin' );
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}
	public function update_topic_position(){
		$left = trim($this->input->post('left'));
		$top = trim($this->input->post('top'));
		$topic_id = trim($this->input->post('topicid'));

		// // $count =
		// if($count){
		// 	$count =$count+1;;
		// }else{
		// 	$count =1;
		// }
		
		$data = array(
					'topic_position_left'=>$left,
					'topic_position_top'=>$top,
					'updated_at'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->update_topic($topic_id,$data)){
			// $this->PresentationModel->insert_log("web - presentation topic position updated id - ".$topic_id,$this->session->userdata('admin_id'),'admin' );
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}

	
	public function update_topic_content_position(){
		$left = trim($this->input->post('left'));
		$top = trim($this->input->post('top'));
		$topic_id = trim($this->input->post('topicid'));

		// // $count =
		// if($count){
		// 	$count =$count+1;;
		// }else{
		// 	$count =1;
		// }
		
		$data = array(
					'topic_content_position_left'=>$left,
					'topic_content_position_top'=>$top,
					'updated_at'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->update_topic($topic_id,$data)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}

	public function update_content_position(){
		$left = trim($this->input->post('left'));
		$top = trim($this->input->post('top'));
		$topic_id = trim($this->input->post('topicid'));

		// // $count =
		// if($count){
		// 	$count =$count+1;;
		// }else{
		// 	$count =1;
		// }
		
		$data = array(
					'position_left'=>$left,
					'position_top'=>$top,
					'updated_at'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->update_topic($topic_id,$data)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}
	
	public function add_topic(){
		
		$sid = trim($this->input->post('sid'));
		$title = trim($this->input->post('title'));
		// $tags = trim($this->input->post('topictags'));
		$image = trim($this->input->post('topicimage'));




		// $count = $this->PresentationModel->get_topic_id($sid);
		// // $count =
		// if($count){
		// 	$count =$count+1;;
		// }else{
		// 	$count =1;
		// }
		// $order = $this->PresentationModel->get_topic_order($sid);
		// // $count =
		// if($order){
		// 	$order =$order+1;;
		// }else{
		// 	$order =1;
		// }
		$data = array(
					'topic_title'=>$title,
					'topic_parent'=>$sid,
					'topic_backgroundimage'=>$image,
					'topic_type'=>'main',
					'topic_order'=>0,
					'topic_height'=>'200',
					'topic_width'=>'200',
					'color'=>'#000',
					'created_at'=>time(),
					'updated_at'=>time(),
					'created_by'=>$this->session->userdata('admin_id')
				);
		if($image !=""){
				$data['topic_content_position_left'] = '70';
				$data['topic_content_position_top'] = '70';
			}
		// $out = $this->PresentationModel->add_data($data,'presentation_topic');
		// echo json_encode($out);
		$tpid = $this->PresentationModel->add_data($data,'presentation_topic');
		if($tpid){

			$keywords = explode(',',$this->input->post('topictags'));

				$keyword_data = array();
				foreach($keywords as $temp){
						$keywords_val = explode(';',$temp);
					foreach($keywords_val as $val_key){

						$pemp = array('tag'=>$val_key,'topic_id'=>$tpid);
					//array_push($keyword_data,$pemp);
						$qry=$this->PresentationModel->add_keywords_topics($pemp);
						//print_r($pemp);

					}						
				}
				$this->PresentationModel->insert_log("web - presentation new topic added id - ".$tpid,$this->session->userdata('admin_id'),'admin' );
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}



public function add_topic_practice(){
		
		$sid = trim($this->input->post('sid'));
		$title = trim($this->input->post('title'));
		// $tags = trim($this->input->post('topictags'));
		$qid = trim($this->input->post('qid'));


		$data = array(
					'topic_title'=>$title,
					'topic_parent'=>$sid,
					'practice_id'=>$qid,
					'practice_type'=>'1',
					'topic_order'=>0,
					'topic_height'=>'200',
					'topic_width'=>'200',
					
					'color'=>'#000',
					'created_at'=>time(),
					'updated_at'=>time(),
					'created_by'=>$this->session->userdata('admin_id')
				);
		// $out = $this->PresentationModel->add_data($data,'presentation_topic');
		// echo json_encode($out);
		$tpid = $this->PresentationModel->add_data($data,'presentation_topic');
		if($tpid){

			$keywords = explode(',',$this->input->post('topictags'));

				$keyword_data = array();
				foreach($keywords as $temp){
						$keywords_val = explode(';',$temp);
					foreach($keywords_val as $val_key){

						$pemp = array('tag'=>$val_key,'topic_id'=>$tpid);
					//array_push($keyword_data,$pemp);
						$qry=$this->PresentationModel->add_keywords_topics($pemp);
						//print_r($pemp);

					}						
				}
			$out = array('status'=>1,'data'=>'OK');
			$this->PresentationModel->insert_log("web - presentation new practice topic added id - ".$tpid,$this->session->userdata('admin_id'),'admin' );
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}
	


	public function add_topic_title(){
		
		$sid = trim($this->input->post('tparent'));
		$title = trim($this->input->post('title'));

		$count = $this->PresentationModel->get_topic_id($sid);
		// $count =
		if($count){
			$count =$count+1;;
		}else{
			$count =1;
		}
		// $order = $this->PresentationModel->get_topic_order($sid);
		// // $count =
		// if($order){
		// 	$order =$order+1;;
		// }else{
		// 	$order =1;
		// }
		$data = array(
					'topic_title'=>$title,
					'topic_parent'=>$sid,
					'topic_type'=>'main',
					'topic_height'=>'200',
					'topic_width'=>'200',
					'topic_content_position_left'=>'70',
					'topic_content_position_top'=>'70',
					'color'=>'#000',
					'created_at'=>time(),
					'updated_at'=>time(),
					'created_by'=>$this->session->userdata('admin_id')
				);
		// $out = $this->PresentationModel->add_data($data,'presentation_topic');
		// echo json_encode($out);
		if($this->PresentationModel->add_data($data,'presentation_topic')){
			$this->PresentationModel->insert_log("web - presentation new topic added  ",$this->session->userdata('admin_id'),'admin' );
			$this->session->set_flashdata('image_upload',1);
		}
		else $this->session->set_flashdata('image_upload',2);

		

		
		redirect(base_url('presentation-slide/'.$sid));
		
	}


	
	public function add_topicimage(){
		
		$topicparent = trim($this->input->post('topic_parent_id'));
		$image = trim($this->input->post('image'));
		$height = trim($this->input->post('height'));
		$width = trim($this->input->post('width'));


		$count = $this->PresentationModel->get_topic_id($topicparent);
		// $count =
		if($count){
			$count =$count+1;;
		}else{
			$count =1;
		}
		$data = array(
					'topic_title'=>'New topic'.$count,
					'topic_parent'=>$topicparent,
					'topic_backgroundimage'=>$image,
					'topic_height'=>$height,
					'topic_width'=>$width,
					'topic_type'=>'main',
					'topic_content_position_left'=>'70',
					'topic_content_position_top'=>'70',
					'color'=>'#000',
					'created_at'=>time(),
					'updated_at'=>time(),
					'created_by'=>$this->session->userdata('admin_id')
				);
		// $out = $this->PresentationModel->add_data($data,'presentation_topic');
		// echo json_encode($out);
		if($this->PresentationModel->add_data($data,'presentation_topic')){
			$out = array('status'=>1,'data'=>'OK');
			$this->PresentationModel->insert_log("web - presentation new topic added id ",$this->session->userdata('admin_id'),'admin' );
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}
	public function add_slide(){
		
		$sid = trim($this->input->post('id'));

		$count = 1;
		$data = array(
					'topic_title'=>'New topic'.$count,
					'topic_presentation_id'=>$sid,
					'topic_type'=>'main',
					'color'=>'#000',
					'height'=>'400',
					'width'=>'500',
					'topic_height'=>'200',
					'topic_width'=>'200',
					'topic_content_position_left'=>'70',
					'topic_content_position_top'=>'70',
					// $value_tit=>$value,
					'created_at'=>time(),
					'updated_at'=>time(),
					'created_by'=>$this->session->userdata('admin_id')
				);
		// $out = $this->PresentationModel->add_data($data,'presentation_topic');
		// echo json_encode($out);
		$sid = $this->PresentationModel->add_data($data,'presentation_topic');
		if($sid){
			$this->PresentationModel->insert_log("web - presentation new topic added id - ".$sid,$this->session->userdata('admin_id'),'admin' );
			$out = array('status'=>1,'data'=>$sid);
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}



	public function add_question(){
		
		$topic_id = trim($this->input->post('topic_id'));
		$question = trim($this->input->post('question'));
		$tag_id = trim($this->input->post('questiontags'));


		$count = 1;
		$data = array(
					'question_topic_id'=>$topic_id,
					'question_tag_id'=>$tag_id,
					'question'=>$question,
					'created_at'=>date('Y-m-d'),
					'updated_at'=>date('Y-m-d'),
					'created_by'=>$this->session->userdata('admin_id')
				);
		// $out = $this->PresentationModel->add_data($data,'presentation_topic');
		// echo json_encode($out);
		$sid = $this->PresentationModel->add_data($data,'presentation_topic_questions');
		if($sid){
				
			$out = array('status'=>1,'data'=>'Question added successfully');
			$this->PresentationModel->insert_log("web - presentation Question added id - ".$sid,$this->session->userdata('admin_id'),'admin' );
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}
	// public function add_subtopic(){
	// 	$value = trim($this->input->post('con'));
	// 	$value_tit = trim($this->input->post('heading'));
	// 	$tid = trim($this->input->post('tid'));

	// 	$sid = trim($this->input->post('sid'));

	// 	$count = 1;
	// 	$data = array(
	// 				'topic_title'=>'New topic'.$count,
	// 				'topic_topic_id'=>$sid,
	// 				'topic_parent'=>$tid,

	// 				'topic_type'=>'main',
	// 				'color'=>'#000',
	// 				'backgroundcolor'=>'#fff',
	// 				'height'=>'400',
	// 				'width'=>'500',
	// 				// $value_tit=>$value,
	// 				'created_at'=>time(),
	// 				'updated_at'=>time(),
	// 				'created_by'=>$this->session->userdata('admin_id')
	// 			);
	// 	// $out = $this->PresentationModel->add_data($data,'presentation_topic');
	// 	// echo json_encode($out);
	// 	if($this->PresentationModel->add_data($data,'presentation_topic')){
	// 		$out = array('status'=>1,'data'=>'OK');
	// 	}
	// 	else $out = array('status'=>0,'data'=>'Unable to delete!');
	// 	echo json_encode($out);
		
	// }



//////////////////////AJAX/////////////////////////////////////

	public function get_presentation(){
		$this->load->model('PresentationModel');
        $id = $this->input->post('id');
        $data = $this->PresentationModel->get_presentation($id);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else $out = array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}


	public function get_topic(){
        $id = $this->input->post('topicid');
        $data = $this->PresentationModel->get_topic($id);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else $out = array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}

	// public function get_topic(){
 //        $id = $this->input->post('sid');
 //        $data = $this->PresentationModel->get_topic($id);
 //        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
 //        else array('status'=>0,'data'=>'Invalid request!');
 //        echo json_encode($out);
	// }

	

	

	public function add_image(){
		$topic_id = trim($this->input->post('topic_id'));
		$image = trim($this->input->post('image'));


		
		// $src = $_FILES['file']['tmp_name'];
		// $targ = "./uploads/".$_FILES['file']['name'];
		// $img = base_url()."uploads/".$_FILES['file']['name'];
		// move_uploaded_file($src, $targ);
		$data = array(
					'backgroundimage'=>$image,
					'updated_at'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->update_topic($topic_id,$data)){
			$out = array('status'=>1,'data'=>'ok');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}
	public function add_image_topic(){
		$topic_id = trim($this->input->post('topic_id'));
		$targ = $this->input->post('image');
		// print_r($targ);
		// die();
		$data = array(
					'topic_backgroundimage'=>$targ,
					'updated_at'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->update_topic($topic_id,$data)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}
	public function add_image_gallery(){
		$topicparent = trim($this->input->post('topic_parent_id'));
		$image = trim($this->input->post('image'));
		$height = trim($this->input->post('height'));
		$width = trim($this->input->post('width'));
		// print_r($targ);
		// die();
		$data = array(
					'image_topic_id'=>$topicparent,
					'image'=>$image,
					'image_height'=>$height,
					'image_width'=>$width,
					'image_position_left'=>'70',
					'image_position_top'=>'70',
					'created_at'=>date('Y-m-d'),
					'created_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->add_data($data,'presentation_topic_images')){
			$this->session->set_flashdata('presentation_created',1);
			$out = array('status'=>1,'data'=>'OK');
		}
		else{
			$this->session->set_flashdata('presentation_created',2);
			$out = array('status'=>0,'data'=>'Unable to add!');
		}
		echo json_encode($out);
		
	}

	public function update_image_position(){
		$id = trim($this->input->post('topic_image_id'));
		$left = trim($this->input->post('left'));
		$top = trim($this->input->post('top'));
		// print_r($targ);
		// die();
		$data = array(
					'image_position_left'=>$left,
					'image_position_top'=>$top,
					'created_at'=>date('Y-m-d'),
					'created_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->update_image($data,$id)){
			$out = array('status'=>1,'data'=>'OK');

			$this->session->set_flashdata('presentation_created',1);
		}
		else{
			$this->session->set_flashdata('presentation_created',2);
			$out = array('status'=>0,'data'=>'Unable to update!');

		}
		echo json_encode($out);
		
	}


	public function update_image_size(){
		$id = trim($this->input->post('topicid'));
		$height = trim($this->input->post('height'));
		$width = trim($this->input->post('width'));
		// print_r($targ);
		// die();
		$data = array(
					'image_height'=>$height,
					'image_width'=>$width,
					'updated_at'=>date('Y-m-d'),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->update_image($data,$id)){
			$this->session->set_flashdata('presentation_updated',1);
			$out = array('status'=>1,'data'=>'OK');
		}
		else{
			$this->session->set_flashdata('presentation_updated',2);
			$out = array('status'=>0,'data'=>'Unable to update!');

		}
		echo json_encode($out);
		
	}

	public function update_image(){
		$ptopic = trim($this->input->post('id'));
		$cvalue = trim($this->input->post('cval'));
		$image_id = trim($this->input->post('image_id'));

		// // $count =
		// if($count){
		// 	$count =$count+1;;
		// }else{
		// 	$count =1;
		// }
		
		$data = array(
					$cvalue=>$ptopic,
					'updated_at'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->update_image($data,$image_id)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}

	public function create_folder(){
		$dir = trim($this->input->post('folder'));
		$sid = trim($this->input->post('folder_topic'));


		$structure = './uploads/background/'.$dir;
		if (is_dir($structure)=== false) {
			mkdir($structure,0755, true);

			$structure1 = './uploads/background/'.$dir.'/background';
			$structure2 = './uploads/background/'.$dir.'/elements';
			if (is_dir($structure1)=== false) {
				mkdir($structure1,0755, true);
			}
			if (is_dir($structure2)=== false) {
				mkdir($structure2,0755, true);
			}

			$out = array('status'=>1,'data'=>'OK');
			$this->session->set_flashdata('folder_created',1);
			$this->PresentationModel->insert_log("web - created new folder - ".$dir,$this->session->userdata('admin_id'),'admin' );

		}else{
			$out = array('status'=>0,'data'=>'Unable to create!');
			 $this->session->set_flashdata('folder_created',2);

		}
		

		

		
		redirect(base_url('presentation-slide/'.$sid));
		// echo json_encode($out);

	}
	public function remove_folder(){
		$dir = trim($this->input->post('fol'));

		$structure = './uploads/background/'.$dir;
		if (is_dir($structure)=== true) {
			rmdir($structure);
			$this->PresentationModel->insert_log("web - removed folder - ".$dir,$this->session->userdata('admin_id'),'admin' );
			$out = array('status'=>1,'data'=>'OK');
		}else{
			$out = array('status'=>0,'data'=>'Unable to create!');

		}
		// $path = './background/';
		// if( is_dir(.$dir) === false )
		// {
		//     mkdir($path.$dir,0755,true);
		//     $out = array('status'=>1,'data'=>'OK');
		// }else{
		// 	$out = array('status'=>0,'data'=>'Unable to create!');
		// }
		echo json_encode($out);

	}
	public function add_image_folder(){
		$folder = trim($this->input->post('folder'));
		
		// $src = $_FILES['file']['tmp_name'];
		// $targ = "./uploads/background/".$folder."/elements/".$_FILES['file']['name'];
		
		// if(move_uploaded_file($src, $targ)){
		// 	$out = array('status'=>1,'data'=>'OK');
		// }
		// else $out = array('status'=>0,'data'=>'Unable to upload file!');


		$count=0;
		// foreach($_FILES["image"]["tmp_name"] as $key=>$tmp_name) {
			if($_FILES['image']['size']!= 0){

				$_FILES['img']['name'] = $_FILES['image']['name'];
                $_FILES['img']['type'] = $_FILES['image']['type'];
                $_FILES['img']['tmp_name'] = $_FILES['image']['tmp_name'];
                $_FILES['img']['error'] = $_FILES['image']['error'];
                $_FILES['img']['size'] = $_FILES['image']['size'];

				$image='';
				$config['upload_path'] = FCPATH . 'uploads/background/'.$folder.'/elements';
				$config['allowed_types'] = 'jpeg|jpg|png|gif';
				$config['max_size'] = '0';
            	$config['file_name'] = md5(time().rand(0, 100));
            	$this->load->library('upload',$config);       
            	$this->upload->initialize($config);
            	if($this->upload->do_upload('img')){
            		$count++;
            		$uploaded_data = $this->upload->data();
                	$image = $uploaded_data['file_name'];
                	
            	}
            	else{
            		$error = $_FILES['img']['name'];
            	}
			}


		    
		// }
		if($count == 0){
			$this->session->set_flashdata('image_upload',2);
			 $out = array('status'=>0,'data'=>'Unable to add!');

		}
		else{
			$this->session->set_flashdata('image_upload',1);
			$out = array('status'=>1,'data'=>'OK');

		}



		echo json_encode($out);
		
	}
	public function add_image_folder_back(){
		$folder = trim($this->input->post('folder'));
		
		// $src = $_FILES['file']['tmp_name'];
		// $targ = "./uploads/background/".$folder."/background/".$_FILES['file']['name'];
	
		// if(move_uploaded_file($src, $targ)){
		// 	$out = array('status'=>1,'data'=>'OK');
		// }
		// else $out = array('status'=>0,'data'=>'Unable to upload file!');


		$count=0;
		// foreach($_FILES["image"]["tmp_name"] as $key=>$tmp_name) {
			if($_FILES['image']['size']!= 0){

				$_FILES['img']['name'] = $_FILES['image']['name'];
                $_FILES['img']['type'] = $_FILES['image']['type'];
                $_FILES['img']['tmp_name'] = $_FILES['image']['tmp_name'];
                $_FILES['img']['error'] = $_FILES['image']['error'];
                $_FILES['img']['size'] = $_FILES['image']['size'];

				$image='';
				$config['upload_path'] = FCPATH . 'uploads/background/'.$folder.'/background';
				$config['allowed_types'] = 'jpeg|jpg|png|gif';
				$config['max_size'] = '0';
            	$config['file_name'] = md5(time().rand(0, 100));
            	$this->load->library('upload',$config);       
            	$this->upload->initialize($config);
            	if($this->upload->do_upload('img')){
            		$count++;
            		$uploaded_data = $this->upload->data();
                	$image = $uploaded_data['file_name'];
                	
            	}
            	else{
            		$error = $this->upload->display_errors();
            	}
			}


		    
		// }
		if($count == 0){
			$this->session->set_flashdata('image_upload',2);
			 $out = array('status'=>0,'data'=>$error);

		}
		else{
			$this->session->set_flashdata('image_upload',1);
			$out = array('status'=>1,'data'=>'OK');

		}
		echo json_encode($out);
		
	}
	public function add_image_folder_gallery(){
		$folder = trim($this->input->post('folder'));
		
		 $src = $_FILES['file']['tmp_name'];
		$targ = "./uploads/chapter/".$_FILES['file']['name'];
		// $img = base_url()."uploads/".$_FILES['file']['name'];

		
		// $extension  = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION ); // jpg
		// $filename = time().$extension;
		// $targ = "./uploads/imagegallery/".$filename;
		
		if(move_uploaded_file($src, $targ)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to upload file!');
		echo json_encode($out);
		
	}
	

	public function update_topic_values(){
		$height = trim($this->input->post('height'));
		$width = trim($this->input->post('width'));
		$topic_id = trim($this->input->post('topicid'));

		// // $count =
		// if($count){
		// 	$count =$count+1;;
		// }else{
		// 	$count =1;
		// }
		
				$data = array(
					'topic_height'=>$height,
					'topic_width'=>$width,
					'updated_at'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->update_topic($topic_id,$data)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}

	public function copy_topic(){
		 $id = $this->input->post('id');
		 $tid = $this->input->post('tid');

        $topic_data = $this->PresentationModel->get_topic($id);
        $data = array(
        	'practice_id'=>$topic_data['practice_id'],
        			'practice_type'=>$topic_data['practice_type'],
					'content'=>$topic_data['content'],
					'content_height'=>$topic_data['content_height'],
					'content_width'=>$topic_data['content_width'],
					'content_slide'=>$topic_data['content_slide'],
					'position_left'=>$topic_data['position_left'],
					'position_top'=>$topic_data['position_top'],
					'height'=>$topic_data['height'],
					'width'=>$topic_data['width'],
					'topic_title'=>$topic_data['topic_title'],
					'topic_content'=>$topic_data['topic_content'],
					'color'=>$topic_data['color'],
					'topic_color'=>$topic_data['topic_color'],
					'backgroundcolor'=>$topic_data['backgroundcolor'],
					'topic_backgroundcolor'=>$topic_data['topic_backgroundcolor'],
					'backgroundimage'=>$topic_data['backgroundimage'],
					'topic_backgroundimage'=>$topic_data['topic_backgroundimage'],
					'topic_bordercolor'=>$topic_data['topic_bordercolor'],
					'topic_fontsize'=>$topic_data['topic_fontsize'],
					'topic_position_left'=>$topic_data['topic_position_left'],
					'topic_position_top'=>$topic_data['topic_position_top'],
					'topic_content_position_left'=>$topic_data['topic_content_position_left'],
					'topic_content_position_top'=>$topic_data['topic_content_position_top'],
					'topic_width'=>$topic_data['topic_width'],
					'topic_height'=>$topic_data['topic_height'],
					'updated_at'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
				if($this->PresentationModel->update_topic($tid,$data)){
						
						$copy_topic_parent_id = $this->PresentationModel->get_topic_main_parent($id);
		                $topic_parent_id = $this->PresentationModel->get_topic_main_parent($tid);

		                $copy_data  = array(
		                				'topic_id' =>$tid ,
		                				'copy_topic_id' =>$id , 
		                				'topic_parent_id' =>$topic_parent_id , 
		                				'copy_topic_parent_id' =>$copy_topic_parent_id , 
		                );
		                $pcopyid = $this->PresentationModel->add_data($copy_data,'presentation_copy_topic_details');

		                if($topic_data['display_parent'] !=0 ){
		                	$dparent_copy = $this->PresentationModel->get_topic_main_parent($topic_data['display_parent']);
		                	$dparent = $this->PresentationModel->get_topic_display_parent($topic_data['display_parent'],$dparent_copy,$topic_parent_id);
		                	$display_data = array(
								'display_parent'=>$dparent
		                	);
		                	$this->PresentationModel->update_topic($tid,$display_data);
		                }
		                if(!empty($topic_data['topics'])){
							$this->nestedPre($topic_data['topics'],$tid);
						}
				}
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else $out = array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}



	

 function nestedPre($id,$tid){
 	
  	foreach ($id as $value) {
				$data = array(
					'practice_id'=>$value['practice_id'],
        			'practice_type'=>$value['practice_type'],
					'content'=>$value['content'],
					'content_height'=>$value['content_height'],
					'content_width'=>$value['content_width'],
					'content_slide'=>$value['content_slide'],
					'position_left'=>$value['position_left'],
					'position_top'=>$value['position_top'],
					'height'=>$value['height'],
					'width'=>$value['width'],
					'topic_title'=>$value['topic_title'],
					'topic_content'=>$value['topic_content'],
					'color'=>$value['color'],
					'topic_color'=>$value['topic_color'],
					'backgroundcolor'=>$value['backgroundcolor'],
					'topic_backgroundcolor'=>$value['topic_backgroundcolor'],
					'backgroundimage'=>$value['backgroundimage'],
					'topic_backgroundimage'=>$value['topic_backgroundimage'],
					'topic_bordercolor'=>$value['topic_bordercolor'],
					'topic_fontsize'=>$value['topic_fontsize'],
					'topic_position_left'=>$value['topic_position_left'],
					'topic_parent'=>$tid,
					'topic_position_top'=>$value['topic_position_top'],
					'topic_content_position_left'=>$value['topic_content_position_left'],
					'topic_content_position_top'=>$value['topic_content_position_top'],
					'topic_width'=>$value['topic_width'],
					'topic_height'=>$value['topic_height'],
					'updated_at'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
				$tpid = $this->PresentationModel->add_data($data,'presentation_topic');
				$topic_data = $this->PresentationModel->get_topic($value['topic_id']);
				

				$topic_id_or = $value['topic_id'];

				$parent_images = $this->PresentationModel->get_topic_images($topic_id_or);
						foreach ($parent_images as $ikey => $ivalue) {
							$idata = array(
										'image_topic_id' =>$tpid ,
										'image' =>$ivalue['image'] ,
		                				'image_height' =>$ivalue['image_height'] , 
		                				'image_width' =>$ivalue['image_width'] , 
		                				'image_position_left' =>$ivalue['image_position_left'] , 
		                				'image_position_top' =>$ivalue['image_position_top'] ,
		                				'created_at' =>date("Y-m-d") ,
		                				'created_by' =>$this->session->userdata('admin_id') 
							);

							$this->PresentationModel->add_data($idata,'presentation_topic_images');
							
						}
				
				$copy_topic_parent_id = $this->PresentationModel->get_topic_main_parent($topic_id_or);
		                $topic_parent_id = $this->PresentationModel->get_topic_main_parent($tpid);

		              
		                $copy_data  = array(
		                				'topic_id' =>$tpid ,
		                				'copy_topic_id' =>$topic_id_or , 
		                				'topic_parent_id' =>$topic_parent_id , 
		                				'copy_topic_parent_id' =>$copy_topic_parent_id , 
		                );
		                $pcopyid = $this->PresentationModel->add_data($copy_data,'presentation_copy_topic_details');

		                if($topic_data['display_parent'] !=0 ){
		                	$dparent_copy = $this->PresentationModel->get_topic_main_parent($topic_data['display_parent']);
		                	$dparent = $this->PresentationModel->get_topic_display_parent($topic_data['display_parent'],$dparent_copy,$topic_parent_id);
		                	$display_data = array(
								'display_parent'=>$dparent
		                	);
		                	$this->PresentationModel->update_topic($tpid,$display_data);
		                }

		        if(!empty($topic_data['topics'])){
					$this->nestedPre($topic_data['topics'],$tpid);
					
				}

		}
}



	public function add_chapter_design($id){
		// $topicid = $this->PresentationModel->get_topic_main_parent($id);

		$chapter_paper = $this->PresentationModel->chapter_paper($id);
		$body_data = array(
					'questions' => $this->PresentationModel->get_problem_solving($id),
					'exercise' => $this->PresentationModel->get_exercise(),
					'vedio' => $this->PresentationModel->get_vedio(),
					'pdf' => $this->PresentationModel->get_pdf(),
					'images'=>$this->PresentationModel->list_images(),
					'presentations'=>$this->PresentationModel->list_presentation_chapter(),
					'chapter_content'=>$this->PresentationModel->chapter_content($id),
					'chapter_id'=>$id,
					'paper'=>$chapter_paper
		);
		$this->load->view('backend/add_chapter_design',$body_data);
	}

	public function add_image_chapter(){
		$topic_id = trim($this->input->post('topic_id'));
		$targ = $this->input->post('image');
		// print_r($targ);
		// die();
		$data = array(
					'topic_backgroundimage'=>$targ,
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->update_chapter($topic_id,$data)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}
	public function add_image_chapter_back(){
		$topic_id = trim($this->input->post('topic_id'));
		$image = trim($this->input->post('image'));


		
		// $src = $_FILES['file']['tmp_name'];
		// $targ = "./uploads/".$_FILES['file']['name'];
		// $img = base_url()."uploads/".$_FILES['file']['name'];
		// move_uploaded_file($src, $targ);
		$data = array(
					'backgroundimage'=>$image,
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->update_chapter_background($topic_id,$data)){
			$out = array('status'=>1,'data'=>'ok');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}

	public function update_chapter_data(){
			$ptopic = trim($this->input->post('id'));
		$cvalue = trim($this->input->post('cval'));
		$topic_id = trim($this->input->post('topic_id'));

		// // $count =
		// if($count){
		// 	$count =$count+1;;
		// }else{
		// 	$count =1;
		// }
		
		$data = array(
					$cvalue=>$ptopic,
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);

		if($this->PresentationModel->update_chapter_background($topic_id,$data)){
			$out = array('status'=>1,'data'=>'ok');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}
	public function add_chapterimage(){
		
		// $topicparent = trim($this->input->post('topic_parent_id'));
		$type = trim($this->input->post('type'));
		$title = trim($this->input->post('title'));
		$id = trim($this->input->post('id'));
		$chapter_id = trim($this->input->post('chapterid'));


		$checkdata = $this->PresentationModel->check_data($id,$chapter_id,$type);
		if($checkdata==0){
			$data = array(
					'topic_title'=>$title,
					'chapter_id'=>$chapter_id,
					'type'=>$type,
					'type_id'=>$id,
					'topic_color'=>'#000',
					'topic_height'=>'200',
					'topic_width'=>'200',
					'topic_content_position_left'=>'70',
					'topic_content_position_top'=>'70',
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
			// $out = $this->PresentationModel->add_data($data,'presentation_topic');
			// echo json_encode($out);
			$cid = $this->PresentationModel->add_data($data,'chapter_design');
			if($cid){
				$this->PresentationModel->insert_log("web - add chapter content id - ".$cid,$this->session->userdata('admin_id'),'admin' );
				$out = array('status'=>1,'data'=>'OK');
			}
			else $out = array('status'=>0,'data'=>'Unable to add!');

		}else{
			 $out = array('status'=>0,'data'=>'Unable to adds!');

		}
		
		echo json_encode($out);
		
	}
	public function add_chapterimagegallery(){
		
		// $topicparent = trim($this->input->post('topic_parent_id'));
		$type = trim($this->input->post('type'));
		$title = trim($this->input->post('title'));
		$id = trim($this->input->post('id'));
		$chapter_id = trim($this->input->post('chapterid'));
		$image = trim($this->input->post('image'));





		$checkdata = $this->PresentationModel->check_data($id,$chapter_id,$type);
		if($checkdata==0){
			$data = array(
					'topic_title'=>$title,
					'chapter_id'=>$chapter_id,
					'type'=>$type,
					'type_id'=>$id,
					'image'=>$image,
					'topic_color'=>'#000',
					'topic_height'=>'200',
					'topic_width'=>'200',
					'topic_content_position_left'=>'70',
					'topic_content_position_top'=>'70',
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
			// $out = $this->PresentationModel->add_data($data,'presentation_topic');
			// echo json_encode($out);
			$cid = $this->PresentationModel->add_data($data,'chapter_design');
			if($cid){
				$this->PresentationModel->insert_log("web - add chapter content id - ".$cid,$this->session->userdata('admin_id'),'admin' );
				$out = array('status'=>1,'data'=>'OK');
			
			}
			else $out = array('status'=>0,'data'=>'Unable to add!');

		}else{
			 $out = array('status'=>0,'data'=>'Unable to adds!');

		}
		
		echo json_encode($out);
		
	}

//controller
// 	public function get_user_topic($cid){
// 		$user_topic_id = $this->PresentationModel->get_user_topic($cid);
// 		$topics = $this->PresentationModel->list_presentation_topic($user_topic_id);

        
// 	}

// 	///view
// 	$topics['heading'];
// 	   foreach ($topics['sub'] as $tpcs) {
// 	   		$tpcs['topic_id'];
// 	   }
// 	   foreach($topics['sub'] as $subtop ) {
// 		   	if(!empty($subtop['sub'])){
// 	          nested($subtop['sub']);
// 	  		}
// 	   }
// 	   function nested($id){
// 		  foreach ($id as $value) {
// 				if(!empty($value['sub'])){
// 		          nested($value['sub']);
// 		        }
// 		  }
// 		}

// /////Model

// 	public function get_user_topic($id){
//         $this->db->select('topic_id');
//         $this->db->where('topic_status >',0);
//         $this->db->where('copy_topic',$id);
//         $result = $this->db->get('presentation_topic')->row_array();
      
//         if($result['topic_id']){
//             return $result['topic_id'];
//         }else{
//             return false;
//         }
//     }


//      public function list_presentation_topic($id){
//         // 
//         // return $this->db->count_all_results('presentation_topic');
//         $this->db->select('*');
//         $this->db->where('topic_status >',0);
//         $this->db->where('topic_id',$id);
//         $result = $this->db->get('presentation_topic')->row_array();
//         // $x=0;
//         // foreach ($result as $value) {
//             if($result!=""){

//             $this->db->select('*');
//             $this->db->where('topic_status >',0);
//             $this->db->where('topic_parent',$id);
//             $result['topics'] = $this->db->get('presentation_topic')->result_array();
//             // print_r($result);
//                 if($result['topic_parent'] == 0){
//                     $this->db->select('*');
//                     $this->db->where('topic_status >',0);
//                     $this->db->where('topic_id',$id);
//                     $result['topic'] = $this->db->get('presentation_topic')->result_array();
//                 }else{
//                         $this->db->select('*');
//                         $this->db->where('topic_status >',0);
//                         $this->db->where('topic_parent',$result['topic_parent']);
//                         $result['topic'] = $this->db->get('presentation_topic')->result_array();
//                 }    
//             }else{
//                 $result = false;
//             }
            
                
//         // }

//         return $result;
//     }

public function update_chapter(){
		$ptopic = trim($this->input->post('id'));
		$cvalue = trim($this->input->post('cval'));
		$topic_id = trim($this->input->post('topic_id'));

		// // $count =
		// if($count){
		// 	$count =$count+1;;
		// }else{
		// 	$count =1;
		// }
		
		$data = array(
					$cvalue=>$ptopic,
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->update_chapter($topic_id,$data)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}
public function update_chapter_position(){
		$left = trim($this->input->post('left'));
		$top = trim($this->input->post('top'));
		$topic_id = trim($this->input->post('topicid'));

		// // $count =
		// if($count){
		// 	$count =$count+1;;
		// }else{
		// 	$count =1;
		// }
		
		$data = array(
					'topic_position_left'=>$left,
					'topic_position_top'=>$top,
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->update_chapter($topic_id,$data)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}

	public function update_chapter_content_position(){
		$left = trim($this->input->post('left'));
		$top = trim($this->input->post('top'));
		$topic_id = trim($this->input->post('topicid'));

		// // $count =
		// if($count){
		// 	$count =$count+1;;
		// }else{
		// 	$count =1;
		// }
		
		$data = array(
					'topic_content_position_left'=>$left,
					'topic_content_position_top'=>$top,
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->update_chapter($topic_id,$data)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}

	public function update_chapter_values(){
		$height = trim($this->input->post('height'));
		$width = trim($this->input->post('width'));
		$topic_id = trim($this->input->post('topicid'));

		// // $count =
		// if($count){
		// 	$count =$count+1;;
		// }else{
		// 	$count =1;
		// }
		
				$data = array(
					'topic_height'=>$height,
					'topic_width'=>$width,
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->update_chapter($topic_id,$data)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}
	public function chapter_publish($type,$type_id,$content_id,$chapterid){
		if($type_id == 2){
			$user_topic_id = $this->PresentationModel->get_user_topic($type_id);
			if($user_topic_id == false){
				$this->clone_presentation($type_id);
			}
		}

				$data = array(
					'teacher_id'=>$this->session->userdata('admin_id'),
					'chapter_id'=>$chapterid,

					'chapter_content_id'=>$content_id,
					'publish_status'=>1,
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
				// $out = $this->PresentationModel->add_data($data,'presentation_topic');
				// echo json_encode($out);
				if($this->PresentationModel->add_data($data,'chapter_content_publish')){
					$this->session->set_flashdata('presentation_created',1);

				}else{
					$this->session->set_flashdata('presentation_created',2);

				}
		redirect(base_url('chapter-design').'?id='.$chapterid);

		
	}
	public function clone_presentation($id){
		 // $id = $this->input->post('id');
		 // $tid = $this->input->post('tid');

			
        $topic_data = $this->PresentationModel->get_topic($id);
        $data = array(
        			'practice_id'=>$topic_data['practice_id'],
        			'practice_type'=>$topic_data['practice_type'],
					'content'=>$topic_data['content'],
					'content_height'=>$topic_data['content_height'],
					'content_width'=>$topic_data['content_width'],
					'content_slide'=>$topic_data['content_slide'],
					'position_left'=>$topic_data['position_left'],
					'position_top'=>$topic_data['position_top'],
					'height'=>$topic_data['height'],
					'width'=>$topic_data['width'],
					'topic_title'=>$topic_data['topic_title'],
					'topic_content'=>$topic_data['topic_content'],
					'color'=>$topic_data['color'],
					'topic_color'=>$topic_data['topic_color'],
					'backgroundcolor'=>$topic_data['backgroundcolor'],
					'topic_backgroundcolor'=>$topic_data['topic_backgroundcolor'],
					'backgroundimage'=>$topic_data['backgroundimage'],
					'topic_backgroundimage'=>$topic_data['topic_backgroundimage'],
					'topic_bordercolor'=>$topic_data['topic_bordercolor'],
					'topic_fontsize'=>$topic_data['topic_fontsize'],
					'topic_position_left'=>$topic_data['topic_position_left'],
					'topic_position_top'=>$topic_data['topic_position_top'],
					'topic_content_position_left'=>$topic_data['topic_content_position_left'],
					'topic_content_position_top'=>$topic_data['topic_content_position_top'],
					'topic_width'=>$topic_data['topic_width'],
					'topic_height'=>$topic_data['topic_height'],
					'topic_parent'=>'0',
					'copy_topic'=>$id,
					'user_id'=>$this->session->userdata('admin_id'),
					'updated_at'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
        		$tid = $this->PresentationModel->add_data($data,'presentation_topic');
				if($tid){

					$parent_images = $this->PresentationModel->get_topic_images($id);
						foreach ($parent_images as $ikey => $ivalue) {
							$idata = array(
										'image_topic_id' =>$tid ,
										'image' =>$ivalue['image'] ,
		                				'image_height' =>$ivalue['image_height'] , 
		                				'image_width' =>$ivalue['image_width'] , 
		                				'image_position_left' =>$ivalue['image_position_left'] , 
		                				'image_position_top' =>$ivalue['image_position_top'] ,
		                				'created_at' =>date("Y-m-d") ,
		                				'created_by' =>$this->session->userdata('admin_id') 
							);

							$this->PresentationModel->add_data($idata,'presentation_topic_images');
							
						}
					  $cloned_data  = array(
                                        'presentation_id' =>$topic_data['topic_presentation_id'] ,
                                        'topic_id' =>$id , 
                                        'cloned_id' =>$tid , 
                                        'teacher_id' =>$this->session->userdata('admin_id') , 
                                        'semester' =>$semester , 
                                        'subject' =>$subject , 
                                        'date'=> date("Y-m-d H:i:s")
                        );
                        $this->Api_student->add_data($cloned_data,'cloned_presentations');
                        

                        
						
						$copy_topic_parent_id = $this->PresentationModel->get_topic_main_parent($id);
		                $topic_parent_id = $this->PresentationModel->get_topic_main_parent($tid);

		              
		                $copy_data  = array(
		                				'topic_id' =>$tid ,
		                				'copy_topic_id' =>$id , 
		                				'topic_parent_id' =>$topic_parent_id , 
		                				'copy_topic_parent_id' =>$copy_topic_parent_id , 
		                );
		                $pcopyid = $this->PresentationModel->add_data($copy_data,'presentation_copy_topic_details');

		                if($topic_data['display_parent'] !=0 ){
		                	$dparent_copy = $this->PresentationModel->get_topic_main_parent($topic_data['display_parent']);
		                	$dparent = $this->PresentationModel->get_topic_display_parent($topic_data['display_parent'],$dparent_copy,$topic_parent_id);
		                	$display_data = array(
								'display_parent'=>$dparent
		                	);
		                	$this->PresentationModel->update_topic($tpid,$display_data);
		                }
		                if(!empty($topic_data['topics'])){
							$this->nestedPre($topic_data['topics'],$tid);
						}

				}

        // if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        // else $out =array('status'=>0,'data'=>'Invalid request!');
        // echo json_encode($out);
	}
	
	// public function presentation_edit_slide($tid){
	// 		$user_topic_id = $this->PresentationModel->get_user_topic($tid);
	// 		if($user_topic_id == false){
	// 			$this->clone_presentation($tid);
	// 			$user_topic_id = $this->PresentationModel->get_user_topic($tid);				
	// 		}
	// 		if($user_topic_id != false){
	// 			$body_data = array(
	// 								'presentation_topic'=>$this->PresentationModel->list_presentation_topic($user_topic_id),
	// 								'presentations'=>$this->PresentationModel->list_presentations($user_topic_id),
	// 								'topic_id'=>$user_topic_id
	// 							);
	// 			// $this->load->view('backend/header1');
	// 			// $this->load->view('backend/presentation_slide',$body_data);
	// 			redirect(base_url().'presentation-slide/'.$user_topic_id);
	// 		}else{
	// 			$topicid = $this->PresentationModel->get_topic_main_parent($tid);
	// 			if($topicid == 0){
	// 				$tid = $tid;
	// 			}else{
	// 				$tid = $topicid; 
	// 			}
	// 			$body_data = array(
	// 								'presentation_topic'=>$this->PresentationModel->list_presentation_topic($tid),
	// 								'topics'=>$this->PresentationModel->get_topics($tid),
	// 								'topic_id'=>$tid
	// 							);
	// 			// $this->load->view('backend/header1');
	// 			redirect(base_url().'presentation-slide-view/'.$user_topic_id);

	// 			// $this->load->view('backend/presentation_slide_view',$body_data);
	// 		}
			
	// }
	public function chapter_view($cid){

	
				$body_data = array(
									'chapter_content'=>$this->PresentationModel->chapter_content_view($cid),
									'chapter_id'=>$cid
								);
				// $this->load->view('backend/header1');
				$this->load->view('backend/chapter_view',$body_data);
	}

	public function get_chapter(){
        $id = $this->input->post('topicid');
        $data = $this->PresentationModel->get_chapter($id);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else $out = array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}

	public function upload_image(){
		// print_r($_FILES["image"]["tmp_name"]);
		 $error=array();
		$extension=array("jpeg","jpg","png","gif");
	$topid = $this->input->post('topid');
	$title = $this->input->post('image_title');

			$count=0;
		// foreach($_FILES["image"]["tmp_name"] as $key=>$tmp_name) {
			if($_FILES['image']['size']!= 0){

				$_FILES['img']['name'] = $_FILES['image']['name'];
                $_FILES['img']['type'] = $_FILES['image']['type'];
                $_FILES['img']['tmp_name'] = $_FILES['image']['tmp_name'];
                $_FILES['img']['error'] = $_FILES['image']['error'];
                $_FILES['img']['size'] = $_FILES['image']['size'];

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
                			'chapter_id' => 0,
                			'chapter_image' => $image,
                			'image_title' => $title
                			);
                	$imid = $this->PresentationModel->add_data($data,'chapter_image');

                	$keywords = explode(',',$this->input->post('image_tags'));

				$keyword_data = array();
				foreach($keywords as $temp){
						$keywords_val = explode(';',$temp);
					foreach($keywords_val as $val_key){

						$pemp = array('tag'=>$val_key,'image_id'=>$imid);
					//array_push($keyword_data,$pemp);
					$qry=$this->PresentationModel->add_keywords_image($pemp);
						//print_r($pemp);

					}						
				}
            	}
            	else{
            		$error = $_FILES['img']['name'];
            	}
			}


		    
		// }

		if($count == 0){
			$this->session->set_flashdata('image_upload',2);
			 $out = array('status'=>0,'data'=>$count);

		}
		else{
			$this->session->set_flashdata('image_upload',1);
			$out = array('status'=>1,'data'=>$count);

		}
		

		 echo json_encode($out);
		// redirect(base_url('presentation-slide/'.$topid));
	}


	
	public function get_image(){
        $term = $this->input->post('searchTerm');
        $data = $this->PresentationModel->get_image($term);
      
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else $out =array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}
	public function getchilds(){
        $id = $this->input->post('id');

		$data = $this->PresentationModel->get_topics($id);
		if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else $out = array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);

	}
	public function get_presentation_search(){
        $term = $this->input->post('term');
          $data = $this->PresentationModel->get_presentation_search($term);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else $out = array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}
	public function viewSlide($tid){
		$topicid = $this->PresentationModel->get_topic_main_parent($tid);
		redirect(base_url().'presentation-slide-view/'.$topicid);
	}

	public function unlinkfile($fol,$folele,$img,$tid){
		$filePath = './uploads/background/'.$fol.'/'.$folele.'/'.$img;
		// echo $filePath;
		// die();
			if (file_exists($filePath)) 
               {
                 unlink($filePath);
                  echo "File Successfully Delete."; 
              }
              else
              {
               echo "File does not exists"; 
              }
              redirect(base_url('presentation-slide').'/'.$tid);

	}
	public function update_content_size(){
		$id = trim($this->input->post('topicid'));
		$height = trim($this->input->post('height'));
		$width = trim($this->input->post('width'));
		// print_r($targ);
		// die();
		$data = array(
					'content_height'=>$height,
					'content_width'=>$width,
					'updated_at'=>date('Y-m-d'),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->update_topic($id,$data)){
			$this->session->set_flashdata('presentation_updated',1);
			$out = array('status'=>1,'data'=>'OK');
		}
		else{
			$this->session->set_flashdata('presentation_updated',2);
			$out = array('status'=>0,'data'=>'Unable to update!');

		}
		echo json_encode($out);
		
	}

	public function get_slide(){
		$id = trim($this->input->post('topicid'));
		// $presentation_slide = $this->PresentationModel->list_presentation_topic($id);
		$topics = $this->PresentationModel->get_topics($tid);
		$html = '';
		$html .= '  <div class=" slidenew '.$topics['topic_id'].' plusPresentation"  data-id="'.$topics['topic_id'].'" class=" " id="" style="border: 1px solid #a7a5a5;     height: 150px; width: 294px;  background-image:url(';
        $html .="'".'<?php echo base_url()?>uploads/background/'.$topics['backgroundimage'];
         $html .="'".');background-size: contain ; background-size: 100%;background-position: center;';
        $html .= 'background-repeat: no-repeat;  border: 1px solid #ced0da;  border-radius: 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px;outline: none;">';
        $html .='"   </div>';
        $html .= ' <span class="tspan">'.$topics['topic_title'].'</span><br/> <br/>';
		

		foreach ($topics['sub'] as  $value) {
			$html .= '  <div class=" slidenew '.$value['topic_id'].' plusPresentation"  data-id="'.$value['topic_id'].'" class=" " id="" style="border: 1px solid #a7a5a5;     height: 150px; width: 294px;  background-image:url(';
	        $html .="'".'<?php echo base_url()?>uploads/background/'.$value['backgroundimage'];
	         $html .="'".');background-size: contain ; background-size: 100%;background-position: center;';
	        $html .= 'background-repeat: no-repeat;  border: 1px solid #ced0da;  border-radius: 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px;outline: none;">';
	        $html .='"   </div>';
	        $html .= ' <span class="tspan">'.$value['topic_title'].'</span><br/> <br/>';
		}


		if($presentation_slide){
			$out = array('status'=>1,'data'=>$presentation_slide);
		}else{
			$out = array('status'=>0,'data'=>'There is no data!');
		}
		echo json_encode($out);

	}

	public function renamefolder(){
		$structure1 = './uploads/background/';
		$structure2 = './uploads/background/';
		
        $old_name = $structure1.$this->input->post('old');
        $new_name = $structure1.$this->input->post('new');
        $tid = $this->input->post('ftopic');


		 if(file_exists($new_name)) 
		 {  
			$this->session->set_flashdata('folder_renamed',2);
		  
		 } 
		else
		 { 
		   if(rename( $old_name, $new_name)) 
		     {  
		     	$term = $old_name.'/background';
		     	$term2 = $old_name.'/elements';

		     	$term_replace = $new_name.'/background';
		     	$term2_replace = $new_name.'/elements';
		     	
		     	$this->db->select('*');
	            $this->db->where('topic_status >',0);
	            $this->db->where('backgroundimage LIKE',$term.'%');
	            $results = $this->db->get('presentation_topic')->result_array();
	            foreach ($results as $key => $value) {
	            	$checkterm  = explode('/background/', $value['backgroundimage']);
	            	$checkt = $checkterm[0].'/background';
	            	$back = str_replace($checkt,$term_replace,$value['backgroundimage']);
			     	$data = array(
						'backgroundimage'=>$back,
						'updated_at'=>date('Y-m-d'),
						'updated_by'=>$this->session->userdata('admin_id')
					);
					$this->PresentationModel->update_topic($value['topic_id'],$data);
				}

				$this->db->select('*');
	            $this->db->where('topic_status >',0);
	            $this->db->where('topic_backgroundimage LIKE',$term2.'%');
	            $results = $this->db->get('presentation_topic')->result_array();
	            foreach ($results as $key => $value) {
	            	$checkterm2  = explode('/elements/', $value['topic_backgroundimage']);
	            	$checkt2 = $checkterm[0].'/elements';
	            	$back2 = str_replace($checkt2,$term2_replace,$value['topic_backgroundimage']);
			     	$data2 = array(
						'topic_backgroundimage'=>$back2,
						'updated_at'=>date('Y-m-d'),
						'updated_by'=>$this->session->userdata('admin_id')
					);
					$this->PresentationModel->update_topic($value['topic_id'],$data2);
				}
			    $this->PresentationModel->insert_log("Folder renamed ".$old_name." to ".$new_name,$this->session->userdata('admin_id'),'admin' );
				$this->session->set_flashdata('folder_renamed',1);
		       
		     } 
		     else
		     { 
				$this->session->set_flashdata('folder_renamed',0);
			
		       
		     } 
		  }  
		  // echo base_url('presentation-slide').'/'.$tid
		  redirect(base_url().'presentation-slide/'.$tid);
	}
	public function upload_content_image(){
		$count=0;
		$topic_id = trim($this->input->post('top_id'));

		$filteredData=substr($_POST['imagename'],strpos($_POST['imagename'],',')+1);
	    $DecodeData=base64_decode($filteredData);

	    //Now you can upload image inside the folder
	    $imgg = 'img'.$topic_id.'.jpg';
	    $imgPath='./uploads/slide/'.$imgg;


			
	    $topics=$this->PresentationModel->get_topics($topic_id);
	    if(!empty($topics['image']) || !empty($topics['sub']) || $topics['content'] !=""){
	    	if (file_exists($imgPath)) 
               {
                 unlink($imgPath);
                 
              }
	    	file_put_contents($imgPath,$DecodeData);
	    	$data = array(
					'content_slide'=>$imgg,
					'updated_at'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
			if($this->PresentationModel->update_topic($topic_id,$data)){
				$out = array('status'=>1,'data'=>'OK');
			}
			else $out = array('status'=>0,'data'=>'Unable to delete!');

	    }
	   
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		

		 echo json_encode($out);
	}
public function get_search_folder(){
		$searchTerm = $this->input->post('searchTerm');
		if($searchTerm  != ""){

			$this->session->set_userdata('foldername',$searchTerm);
		}
		if($searchTerm  == ""){
			
			$this->session->unset_userdata('foldername');
		}
		$out = array('status'=>1,'data'=>'OK');
		echo json_encode($out);


		
	}
	public function upload_chapter_thumbnail(){
		$count=0;
		$topic_id = trim($this->input->post('chapter_id'));

		$filteredData=substr($_POST['imagename'],strpos($_POST['imagename'],',')+1);
	    $DecodeData=base64_decode($filteredData);

	    //Now you can upload image inside the folder
	    $imgg = 'img'.$topic_id.'.jpg';
	    $imgPath='./uploads/chapter_thumbnail/'.$imgg;


			
	    
	    	if (file_exists($imgPath)) 
               {
                 unlink($imgPath);
                 
              }
	    	file_put_contents($imgPath,$DecodeData);
	    	$data = array(
					'chapter_thumbnail'=>$imgg
				);
			if($this->PresentationModel->update_chapter_background($topic_id,$data)){
				$out = array('status'=>1,'data'=>'OK');
			}
			else $out = array('status'=>0,'data'=>'Unable to add!');

	    
	  

		 echo json_encode($out);
	}

		public function create_text(){
		
		
		$sid = trim($this->input->post('topic'));
		$title = trim($this->input->post('title'));




		$data = array(
					'topic_title'=>$title,
					'topic_parent'=>$sid,
					'practice_type'=>'2',//for topic without subtopics
					'topic_type'=>'main',
					'topic_order'=>0,
					'topic_height'=>'200',
					'topic_width'=>'200',
					'color'=>'#000',
					'created_at'=>time(),
					'updated_at'=>time(),
					'created_by'=>$this->session->userdata('admin_id')
				);
		
		// $out = $this->PresentationModel->add_data($data,'presentation_topic');
		// echo json_encode($out);
		$tpid = $this->PresentationModel->add_data($data,'presentation_topic');
			if($tpid){
				$out = array('status'=>1,'data'=>'OK');
			}
			else $out = array('status'=>0,'data'=>'Unable to add!');

	    
		echo json_encode($out);
		
	

		
	}








public function loadDirectoryImages(){

        $entry = $this->input->post('folder');
        $id = $this->input->post('id');
        $topic_id = $this->input->post('topicid');

        $elements = "";
       if($id == 1){
            $directory = "./uploads/background/".$entry."/elements";
       
    $files = glob($directory . "/*.*");
     // print_r($directory);
    if(!empty($files)){
  $i = 0;
     foreach($files as $image)
    
{
    // $image = $files[$i];
    $supported_file = array(
        'gif',
        'jpg',
        'jpeg',
        'png'
     );

     $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
     if (in_array($ext, $supported_file)) {
      

$classentrys = str_replace(' ', '', $entry);
   $elements .= '
<div class="col-md-6"><img src="'.base_url().$image.'" style=" width:150px; height:70px; margin-bottom: 5%;" class="'.$entry.$i.'"
       onclick = "addImagetopic(';

       $elements .="'$entry/elements/".basename($image)."','$classentrys.$i')" ;
     
       $elements .='" alt="Random image" style="
    padding: 1%;
"/><span class="tlabel"> </span>';
 if($this->session->userdata('admin_role')==1 || $this->session->userdata('admin_role')==3){ 

$elements .='<span class="resume_create_up_link" style="position: absolute;
top: 10%;
left: 9%;">
   
     <a href="'.base_url().'unlinkfile/'.$entry.'/elements/'.basename($image).'/'. $topic_id.'" >
    <icon class="fa fa-trash" aria-hidden="true"></icon>
    </a>
    </span>';
}
$elements .= '</div>';
       
   
} else {
       continue;
    }
    $i++;
      }
    } 
}else if($id == 0){


          
   $directory = "./uploads/background/".$entry."/background";
    $files = glob($directory . "/*.*");
     // print_r($directory);
    if(!empty($files)){
     foreach($files as $image)
    
{
    // $image = $files[$i];
    $supported_file = array(
        'gif',
        'jpg',
        'jpeg',
        'png'
     );
     $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
     if (in_array($ext, $supported_file)) {
    // echo basename($image)."<br />"; // show only image name if you want to show full path then use this code // echo $image."<br />";
   
$elements .= '<div class="col-md-6"><img src="'.base_url().$image .'"
      onclick = "addImage(';

      $elements .= "'$entry/background/".basename($image)."')" ;
     
      $elements .= '" alt="Random image" style=" width:150px; height:70px; margin-bottom: 5%;" style="padding: 1%;
"/><span class="tlabel"> </span>';
 if($this->session->userdata('admin_role')==1 || $this->session->userdata('admin_role')==3){ 

$elements .=' <span class="resume_create_up_link" style="position: absolute;
top: 10%;
left: 9%;">
   
     <a href="'.base_url().'unlinkfile/'.$entry.'/background/'.basename($image).'/'.$topic_id .'" >
    <icon class="fa fa-trash" aria-hidden="true"></icon>
    </a>
    
    </span>';
   } 
$elements .= "</div>";
   

} else {
       continue;
    }
      }
    }

}
echo $elements;
    }


public function get_practice(){
        $term = $this->input->post('searchTerm');
        $data = $this->PresentationModel->get_practice($term);
      
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else $out =array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}


public function get_slide_search(){
        $term = $this->input->post('term');
        $topic = $this->input->post('topicid');
          $data = $this->PresentationModel->get_slide_search($term,$id);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else $out = array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}





	//webview
	public function presentation_slide_webview($id){

		$user_id = trim($this->input->get('userid'));
		// print_r($user_id);
		$session = trim($this->input->get('session'));
		// $id = trim($this->input->get('slideid'));
		$height = trim($this->input->get('height'));
		$width = trim($this->input->get('width'));
		$semester = trim($this->input->get('semester'));

		if(!$this->input->get('height')){
			$height = '800';
		}
		 if(!$this->input->get('width')){
			$width = '450';
		}

		$c =0;
			$this->load->model('Api_student');
		  	$check = $this->Api_student->check_session($user_id,$session);
		  	// print_r($check);
		  	$slide =  $this->PresentationModel->get_topic_main_parent($id);
          	if($check['status']== 0){
                $check = $this->Api_student->check_session_teacher($user_id,$session);
		        if($check['status']== 0){

		            $out = array('status'=>3,'message'=>'Invalid data.');


		        }else{
		        	$c =1;
		   //      	$user_topic_id = $this->PresentationModel->get_user_topic_webview($slide,$user_id);
					// if($user_topic_id == false){
					// 	$this->clone_presentation($slide);
					// }
		        }
           	}else{
           		$c=1;
        		

           			if(!$semester){
           				$semester = 0;
           			}
           		$data = array(
					'student_id'=>$user_id,
					'presentation_id'=>$slide,
					'semester_id'=>$semester,
					'date'=>date('Y-m-d H:i:s')
				);
				$countrecent  = $this->PresentationModel->countrecentpresentation($user_id);

				$countrecentP_ex  = $this->PresentationModel->countrecentpresentation_exist($slide,$user_id);
				if($countrecentP_ex == 0){
					if($countrecent<8){
						$out = $this->PresentationModel->add_data($data,'recent_presentation_student');

					}else{
						$out = $this->PresentationModel->deleterecentpresentation($user_id);
					}
				}
           	}
		// $topicid = $this->PresentationModel->get_topic_main_parent($id);
           	if($c ==1){
           		$body_data = array(			
						'topics'=>$this->PresentationModel->get_topics_web($id),
						'topic_id'=>$id,
						'presentation_name' => $this->PresentationModel->get_presentation_name($id),
						'height'=>$height,
						'width'=>$width
				);
				$this->load->view('backend/presentation_slide_webview',$body_data);
           	}else{
           		$body_data = array(
							
							'topics'=>"",
							'topic_id'=>"",
							'presentation_name' => "",
							'height'=>"",
						'width'=>""
						);
				$this->load->view('backend/presentation_slide_webview',$body_data);
           	}
		
	}


	public function chapter_webview($cid){
		$user_id = trim($this->input->get('userid'));
		$session = trim($this->input->get('session'));
		$subject = trim($this->input->get('subject'));
		$semester = trim($this->input->get('semester'));

		$height = trim($this->input->get('height'));
		$width = trim($this->input->get('width'));
		$this->load->model('Api_student');
		$c =0;
			$this->load->model('Api_student');
		  	$check = $this->Api_student->check_session($user_id,$session);
		  	// print_r($check);
          	if($check['status']== 0){
                $check = $this->Api_student->check_session_teacher($user_id,$session);
		        if($check['status']== 0){

		            $out = array('status'=>3,'message'=>'Invalid data.');
		        }else{
		        	$c =1;
		        }
           	}else{


           		$c=2;


           		$data = array(
					'student_id'=>$user_id,
					'chapter_id'=>$cid,
					'semester_id'=>$semester,
					'date'=>date('Y-m-d H:i:s')
				);
				$countrecentc  = $this->PresentationModel->countrecentchapter($user_id);
				$countrecentc_ex  = $this->PresentationModel->countrecentchapter_exist($cid,$user_id);
				if($countrecentc_ex ==0 ){

					if($countrecentc<8){
						
						$out = $this->PresentationModel->add_data($data,'recent_chapter_student');

					}else{
						$out = $this->PresentationModel->deleterecentchapter($user_id);
					}
				}
           	}
           	 // print_r($c);
           		// die();
		// $topicid = $this->PresentationModel->get_topic_main_parent($id);
           	if($c !=0){


        //    		$body_data = array(
								// 	'chapter_content'=>$this->PresentationModel->chapter_content_view($cid),
								// 	'chapter_id'=>$cid
								// );


                // echo $c;
           			
           		if($c == 1){
           			$uid = $user_id;

           			$content = $this->PresentationModel->chapter_teachercontent_webview($cid,$uid,$semester,$subject);

           		}else if($c == 2){
           			$uid = $this->Api_student->get_subject_teacher($subject,$user_id); 

        //    			die();
           			$batch = $this->PresentationModel->batch_get($user_id);
           			// $semester = $this->PresentationModel->semester_get($batch,$subject);
           			// print_r($batch);
           			// die();
           			 if($uid){
           			 	$content = $this->PresentationModel->chapter_content_webview($cid,$uid,$semester,$subject);

           			 }else{
           			 	$content ="";
           			 }
           		}

           		// print_r($content);
           		// die();
      			if(empty($content)){
      				$body_data = array(
							
						'chapter_content'=>"",
						'chapter_id'=>"",
						
						'height'=>"",
						'width'=>""
						);
      			}else{
      				$body_data = array(			
						'chapter_content'=>$content,
						'chapter_id'=>$cid,
						
						'height'=>$height,
						'width'=>$width
				);
      			}
           		
				$this->load->view('backend/chapter_webview',$body_data);
           	}else{
           		$body_data = array(
							
						'chapter_content'=>"",
						'chapter_id'=>"",
						
						'height'=>"",
						'width'=>""
						);
				$this->load->view('backend/chapter_webview',$body_data);
           	}
		
				
	}




public function add_sametopic(){
		
		$sid = trim($this->input->post('sid'));
		$tid = trim($this->input->post('tid'));

		$title = trim($this->input->post('title'));
		// $tags = trim($this->input->post('topictags'));
		$image = trim($this->input->post('topicimage'));



				$data = array(
					'topic_title'=>$title,
					'topic_parent'=>$sid,
					'topic_type'=>'main',
					'display_parent'=>$tid,
					'practice_type'=>'3',
					'topic_order'=>0,
					'topic_height'=>'200',
					'topic_width'=>'200',
					'color'=>'#000',
					'created_at'=>time(),
					'updated_at'=>time(),
					'created_by'=>$this->session->userdata('admin_id')
				);
		 if($image !=""){
				$data['topic_backgroundimage']=$image;
				$data['topic_content_position_left'] = '70';
				$data['topic_content_position_top'] = '70';
			}
		// $out = $this->PresentationModel->add_data($data,'presentation_topic');
		// echo json_encode($out);

				// $sametopic_count = $this->PresentationModel->check_sametopic($id);
		$sametopic_count = $this->PresentationModel->check_sametopic($sid);

		if($sametopic_count == 0){
			$tpid = $this->PresentationModel->add_data($data,'presentation_topic');
		    $this->PresentationModel->insert_log("Add sametopic id ".$sametopic_count,$this->session->userdata('admin_id'),'admin' );

		}else{
			$udata = array(
					'topic_title'=>$title,
					'topic_height'=>'200',
					'topic_width'=>'200',
					'color'=>'#000',
					'updated_at'=>time(),
					'created_by'=>$this->session->userdata('admin_id')
				);
			if($image !=""){

				$udata['topic_backgroundimage']=$image;
				
			}
			$this->PresentationModel->update_topic($sametopic_count,$udata);
			$tpid = $sametopic_count;

		}
		if($tpid){
			$keywords = explode(',',$this->input->post('topictags'));

				$keyword_data = array();
				foreach($keywords as $temp){
						$keywords_val = explode(';',$temp);
					foreach($keywords_val as $val_key){

						$pemp = array('tag'=>$val_key,'topic_id'=>$tpid);
					//array_push($keyword_data,$pemp);
						$qry=$this->PresentationModel->add_keywords_topics($pemp);
						//print_r($pemp);

					}						
				}
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}


public function create_sametext(){
		
		
		$sid = trim($this->input->post('topic'));
		$title = trim($this->input->post('title'));




		$data = array(
					// 'topic_title'=>$title,
				
					'topic_type'=>'main',
					'topic_order'=>0,
					'explanation'=>$title,
					'explanation_height'=>'200',
					'explanation_width'=>'200',
					'explanation_left'=>'20',
					'explanation_top'=>'20',
					'updated_at'=>time(),
					'created_by'=>$this->session->userdata('admin_id')
				);
	
			$tpid = $this->PresentationModel->update_topic($sid,$data);
			// $tpid = $sametopic_count;
		
		
			if($tpid){
				$out = array('status'=>1,'data'=>'OK');
			}
			else $out = array('status'=>0,'data'=>'Unable to add!');
	    
		echo json_encode($out);
		
	

		
	}



public function update_topiccontent_position(){
		$left = trim($this->input->post('left'));
		$top = trim($this->input->post('top'));
		$topic_id = trim($this->input->post('topicid'));

		// // $count =
		// if($count){
		// 	$count =$count+1;;
		// }else{
		// 	$count =1;
		// }
		
		$data = array(
					'explanation_left'=>$left,
					'explanation_top'=>$top,
					'updated_at'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->update_topic($topic_id,$data)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}
	public function update_topiccontent_size(){
		$id = trim($this->input->post('topicid'));
		$height = trim($this->input->post('height'));
		$width = trim($this->input->post('width'));
		// print_r($targ);
		// die();
		$data = array(
					'explanation_height'=>$height,
					'explanation_width'=>$width,
					'updated_at'=>date('Y-m-d'),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->update_topic($id,$data)){
			$this->session->set_flashdata('presentation_updated',1);
			$out = array('status'=>1,'data'=>'OK');
		}
		else{
			$this->session->set_flashdata('presentation_updated',2);
			$out = array('status'=>0,'data'=>'Unable to update!');

		}
		echo json_encode($out);
		
	}

	

	public function create_chapterhead(){
		
		
		$sid = trim($this->input->post('topic'));
		$title = trim($this->input->post('title'));




		$data = array(
					'chapter_design_title'=>$title,
					'design_title_left'=>'20',
					'design_title_top'=>'20',//for topic without subtopics
					'design_title_height'=>'200',
					'design_title_width'=>'200',
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		
		if($this->PresentationModel->update_chapter_background($sid,$data)){
				$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to add!');

	    
		echo json_encode($out);
		
	

		
	}
	public function update_chaptertitle_size(){
		$id = trim($this->input->post('topicid'));
		$height = trim($this->input->post('height'));
		$width = trim($this->input->post('width'));
		// print_r($targ);
		// die();
		$data = array(
					'design_title_height'=>$height,
					'design_title_width'=>$width,
					'updated_on'=>date('Y-m-d'),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->update_chapter_background($id,$data)){
			$this->session->set_flashdata('chapter_title_updated',1);
			$out = array('status'=>1,'data'=>'OK');
		}
		else{
			$this->session->set_flashdata('chapter_title_updated',2);
			$out = array('status'=>0,'data'=>'Unable to update!');

		}
		echo json_encode($out);
		
	}

public function update_chaptertitle_position(){
		$left = trim($this->input->post('left'));
		$top = trim($this->input->post('top'));
		$id = trim($this->input->post('topicid'));

		
		$data = array(
					'design_title_left'=>$left,
					'design_title_top'=>$top,
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('admin_id')
				);
		if($this->PresentationModel->update_chapter_background($id,$data)){
			$this->session->set_flashdata('chapter_title_updated',1);
			$out = array('status'=>1,'data'=>'OK');
		}
		else{
			$this->session->set_flashdata('chapter_title_updated',2);
			$out = array('status'=>0,'data'=>'Unable to update!');

		}
		echo json_encode($out);
		
	}
public function get_exercise(){
        $term = $this->input->post('searchTerm');
        $data = $this->PresentationModel->get_exercise_search($term);
      
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else $out =array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}

public function get_pdf(){
        $term = $this->input->post('searchTerm');
        $data = $this->PresentationModel->get_pdf_search($term);
      
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else $out =array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}

public function get_video(){
        $term = $this->input->post('searchTerm');
        $data = $this->PresentationModel->get_video_search($term);
      
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else $out =array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}
		// public function update(){
  //       // 
  //       // return $this->db->count_all_results('presentation_topic');
  //       $this->db->select('`batch_id`,`teacher_id`');
  //       // $this->db->where('topic_status >',0);
  //       // $this->db->where('topic_id',$id);
  //       $this->db->group_by('teacher_id');
  //       $result = $this->db->get('batch_teachers')->result_array();
  //       // $x=0;
  //       foreach ($result as $value) {
  //       	$data = array('batch_id'=>$value['batch_id']);
  //       	$this->db->where('teacher_id',$value['teacher_id']);
  //       	$this->db->where('batch_id',0);
  //       	$this->db->update('chapter_content_publish',$data);

  //       	$data2 = array('batch_id'=>$value['batch_id']);
  //       	$this->db->where('teacher_id',$value['teacher_id']);
  //       	$this->db->where('batch_id',0);
  //       	$this->db->update('chapter_publish',$data2);
  //       }
  //   }


// content id current app
public function chapter_webview_new($cid){
		$user_id = trim($this->input->get('userid'));
		$session = trim($this->input->get('session'));
		$subject = trim($this->input->get('subject'));
		$semester = trim($this->input->get('semester'));

		$height = trim($this->input->get('height'));
		$width = trim($this->input->get('width'));
		$this->load->model('Api_student');
		$c =0;
			$this->load->model('Api_student');
		  	$check = $this->Api_student->check_session($user_id,$session);
		  	// print_r($check);
          	if($check['status']== 0){
                $check = $this->Api_student->check_session_teacher($user_id,$session);
		        if($check['status']== 0){

		            $out = array('status'=>3,'message'=>'Invalid data.');
		        }else{
		        	$c =1;
		        }
           	}else{


           		$c=2;


           		$data = array(
					'student_id'=>$user_id,
					'chapter_id'=>$cid,
					'semester_id'=>$semester,
					'date'=>date('Y-m-d H:i:s')
				);
				$countrecentc  = $this->PresentationModel->countrecentchapter($user_id);
				$countrecentc_ex  = $this->PresentationModel->countrecentchapter_exist($cid,$user_id);
				if($countrecentc_ex ==0 ){

					if($countrecentc<8){
						
						$out = $this->PresentationModel->add_data($data,'recent_chapter_student');

					}else{
						$out = $this->PresentationModel->deleterecentchapter($user_id);
					}
				}
           	}
           	 // print_r($c);
           		// die();
		// $topicid = $this->PresentationModel->get_topic_main_parent($id);
           	if($c !=0){


        //    		$body_data = array(
								// 	'chapter_content'=>$this->PresentationModel->chapter_content_view($cid),
								// 	'chapter_id'=>$cid
								// );


                // echo $c;
           			
           		if($c == 1){
           			$uid = $user_id;

           			$content = $this->PresentationModel->chapter_teachercontent_webview($cid,$uid,$semester,$subject);

           		}else if($c == 2){
           			$uid = $this->Api_student->get_subject_teacher($subject,$user_id); 

        //    			die();
           			$batch = $this->PresentationModel->batch_get($user_id);
           			// $semester = $this->PresentationModel->semester_get($batch,$subject);
           			// print_r($batch);
           			// die();
           			 if($uid){
           			 	$content = $this->PresentationModel->chapter_content_webview($cid,$uid,$semester,$subject);

           			 }else{
           			 	$content ="";
           			 }
           		}

           		// print_r($content);
           		// die();
      			if(empty($content)){
      				$body_data = array(
							
						'chapter_content'=>"",
						'chapter_id'=>"",
						
						'height'=>"",
						'width'=>""
						);
      			}else{
      				$body_data = array(			
						'chapter_content'=>$content,
						'chapter_id'=>$cid,
						
						'height'=>$height,
						'width'=>$width
				);
      			}
           		
				$this->load->view('backend/chapter_webview',$body_data);
           	}else{
           		$body_data = array(
							
						'chapter_content'=>"",
						'chapter_id'=>"",
						
						'height'=>"",
						'width'=>""
						);
				$this->load->view('backend/chapter_webview',$body_data);
           	}
		
				
	}




}