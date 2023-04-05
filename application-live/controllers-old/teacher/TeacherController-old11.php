<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TeacherController extends CI_Controller{
	function __construct(){
        parent::__construct();
       
		date_default_timezone_set('Asia/Kolkata');
		if(!$this->session->userdata('teacher_id')){
            redirect(base_url('teacher'));
       	}
		$this->load->model('TeacherModel');
		$this->load->model('AdminModel');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
    }
    public function dashboard(){
    	$details = $this->TeacherModel->teacher_details();
		$body_data = array(
					'details'=>$this->TeacherModel->teacher_details(),
					// 'subject'=>$this->TeacherModel->teacher_subjects(),
					// 'subj' => $this->TeacherModel->batch_teacher_subjects(),
					// 'publish_subject' => $this->TeacherModel->publish_batch_subject(),
					'chapter' => $this->TeacherModel->teacher_chapters(),
					'video' => $this->TeacherModel->teacher_published_video(),
					'student' => $this->TeacherModel->institute_students($details['institute_id']),
					'ins_news' => $this->TeacherModel->dashboard_news($details['institute_id']),
					
					'presentation' => $this->TeacherModel->teacher_published_presentation()
				);	
		$publish_subject = $this->TeacherModel->publish_batch_subject();
		if(!empty($publish_subject)){
			$body_data['publish_subject'] = $publish_subject;
		}
		else{
			$body_data['publish_subject'] =$this->TeacherModel->batch_teacher_subjects();
			//print_r($body_data['publish_subject']);exit();
		}
		//print_r($this->TeacherModel->dashboard_news($details['institute_id']));exit();
		$this->load->view('teacher/home_header',$body_data);
		$this->load->view('teacher/home_index',$body_data);
		$this->load->view('teacher/home_footer');
	}
	public function dashboard_chapter(){
		$id = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('paper_id');
		if(!$id) redirect(base_url('teacher-dashboard'));
		$this->session->set_userdata('paper_id',$id);
		$body_data = array(

				'chapter' => $this->TeacherModel->subject_chapter($id)
			);
		$this->load->view('teacher/header');
		$this->load->view('teacher/dashboard_chapter',$body_data);
		$this->load->view('teacher/footer');

	}
	public function teacher_batch(){
		$this->load->library('pagination');

		$config['base_url'] = base_url('teacher-batch');
		$config['total_rows'] = $this->TeacherModel->count_batch();
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
							'batch'=>$this->TeacherModel->list_batch($limit,$offset),
							
							'links'=>$links,
							'offset'=>$offset
						);
		$this->load->view('teacher/header');
		$this->load->view('teacher/batch',$body_data);
		$this->load->view('teacher/footer');
	}
	public function papers(){
		$id = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('batch_id');
		if(!$id) redirect(base_url('teacher-batch'));
		$this->session->set_userdata('batch_id',$id);
		$this->load->library('pagination');

		$config['base_url'] = base_url('teacher-papers');
		$config['total_rows'] = $this->TeacherModel->count_papers($id);
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
							'papers'=>$this->TeacherModel->list_papers($id,$limit,$offset),
							'links'=>$links,
							'offset'=>$offset
						);
		$this->load->view('teacher/header');
		$this->load->view('teacher/papers',$body_data);
		$this->load->view('teacher/footer');
	}
	public function chapters(){
		$id = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('paper_id');
		if(!$id) redirect(base_url('teacher-batch'));
		$this->session->set_userdata('paper_id',$id);
		$this->load->library('pagination');

		$config['base_url'] = base_url('teacher-chapters');
		$config['total_rows'] = $this->TeacherModel->count_chapters($id);
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
				'chapters'=>$this->TeacherModel->list_chapters($id,$limit,$offset),
				'links'=>$links,
				'offset'=>$offset
			);
		$this->load->view('teacher/header');
		$this->load->view('teacher/chapters',$body_data);
		$this->load->view('teacher/footer');
	}
/*athulya*/


public function presentation_edit_slide($tid){
	$this->load->model('PresentationModel');
			$user_topic_id = $this->TeacherModel->get_user_topic($tid);
			if($user_topic_id == false){
				$this->clone_presentation($tid);
				$user_topic_id = $this->TeacherModel->get_user_topic($tid);				
			}
			if($user_topic_id != false){
				$body_data = array(
									'presentation_topic'=>$this->PresentationModel->list_presentation_topic($user_topic_id),
									'presentations'=>$this->PresentationModel->list_presentations($user_topic_id),
									'topic_id'=>$user_topic_id
								);
				// $this->load->view('backend/header1');
				// $this->load->view('backend/presentation_slide',$body_data);
				redirect(base_url().'presentation-slide-teacher/'.$user_topic_id);
			}else{
				$topicid = $this->PresentationModel->get_topic_main_parent($tid);
				if($topicid == 0){
					$tid = $tid;
				}else{
					$tid = $topicid; 
				}
				$body_data = array(
									'presentation_topic'=>$this->PresentationModel->list_presentation_topic($tid),
									'topics'=>$this->PresentationModel->get_topics($tid),
									'topic_id'=>$tid
								);
				// $this->load->view('backend/header1');
				redirect(base_url().'presentation-slide-view-teacher/'.$user_topic_id);

				// $this->load->view('backend/presentation_slide_view',$body_data);
			}
			
	}
		public function chapter_design_teacher(){
		$this->load->model('AdminModel');
		$id = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('chapter_id');
		if(!$id) redirect(base_url('courses'));
		$this->session->set_userdata('chapter_id',$id);
		$this->load->library('pagination');

		$config['base_url'] = base_url('exercise');
		$config['total_rows'] = $this->TeacherModel->count_content($id);
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
				'content'=>$this->TeacherModel->list_content($id,$limit,$offset),
				'question' => $this->AdminModel->get_problem_solving($id),
				'presentation' => $this->AdminModel->get_presentation(),
				'links'=>$links,
				'offset'=>$offset
			);
		$this->load->view('teacher/header');
		$this->load->view('teacher/chapter_design',$body_data);
		$this->load->view('teacher/footer');
	}
	public function chapter_publish($type,$type_id,$content_id,$chapterid){
			
				if($type == 2){
					$user_topic_id = $this->TeacherModel->get_user_topic($type_id);
			
					if($user_topic_id == false){
						$this->clone_presentation($type_id);
					}
				}
				$count_check = $this->TeacherModel->checkPublish($content_id);
				if($count_check == 0){
					$data = array(
						'teacher_id'=>$this->session->userdata('teacher_id'),
						'chapter_id'=>$chapterid,
						'chapter_content_id'=>$content_id,
						'publish_status'=>1,
						'created_on'=>time(),
						'updated_on'=>time(),
						'updated_by'=>$this->session->userdata('teacher_id')
					);
					// $out = $this->PresentationModel->add_data($data,'presentation_topic');
					// echo json_encode($out);
					if($this->TeacherModel->add_data($data,'chapter_content_publish')){
						$this->session->set_flashdata('presentation_created',1);

					}else{
						$this->session->set_flashdata('presentation_created',2);

					}
				}else{
						$this->session->set_flashdata('presentation_created',2);
				}
				
		redirect(base_url('chapter-design-teacher').'?id='.$chapterid);

		
	}
	public function clone_presentation($id){
		 // $id = $this->input->post('id');
		 // $tid = $this->input->post('tid');
				$this->load->model('PresentationModel');

        $topic_data = $this->TeacherModel->get_topic($id);

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
					'user_id'=>$this->session->userdata('teacher_id'),
					'updated_at'=>time(),
					'updated_by'=>$this->session->userdata('teacher_id')
				);
        		$tid = $this->TeacherModel->add_data($data,'presentation_topic');
				if($tid){

						 $cloned_data  = array(
                             			'presentation_id' =>$topic_data['topic_presentation_id'] ,
                                        'topic_id' =>$id , 
                                        'cloned_id' =>$tid , 
                                        'teacher_id' =>$this->session->userdata('teacher_id'), 
                                        'date'=> date("Y-m-d H:i:s")
                        );
                        $this->Api_student->add_data($data,'cloned_presentations');
					// print_r($tid);
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
							// print_r($topic_data['topics']);
							$this->nestedPre($topic_data['topics'],$tid);
						}

						
				}
// die();
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}


 function nestedPre($id,$tid){
 	// echo $tid;
 	// print_r($id);
 	// die();

 	$this->load->model('PresentationModel');
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
					'updated_by'=>$this->session->userdata('teacher_id')
				);
				$tpid = $this->TeacherModel->add_data($data,'presentation_topic');
				$topic_data = $this->TeacherModel->get_topic($value['topic_id']);
				
				$topic_id_or = $value['topic_id'];
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


	public function chapter_view($cid){

				
				$body_data = array(
									'chapter_content'=>$this->TeacherModel->chapter_content_view($cid),
									'chapter_id'=>$cid
								);
				// $this->load->view('backend/header1');
				$this->load->view('teacher/chapter_view',$body_data);
	}
	public function add_chapter_design($id){
		$this->load->model('PresentationModel');
		// $topicid = $this->PresentationModel->get_topic_main_parent($id);
		$body_data = array(
					'questions' => $this->PresentationModel->get_problem_solving($id),
					'exercise' => $this->PresentationModel->get_exercise(),
					'vedio' => $this->PresentationModel->get_vedio(),
					'pdf' => $this->PresentationModel->get_pdf(),
					'presentations'=>$this->PresentationModel->list_presentation_chapter(),
					'chapter_content'=>$this->TeacherModel->chapter_content($id),
					'chapter_id'=>$id
					);
		$this->load->view('teacher/add_chapter_design',$body_data);
	}
	public function get_chapter_teacher(){
        $id = $this->input->post('topicid');
        $data = $this->TeacherModel->get_chapter($id);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}
	public function update_chapter(){
		$this->load->model('PresentationModel');

		$ptopic = trim($this->input->post('id'));
		$cvalue = trim($this->input->post('cval'));
		$topic_id = trim($this->input->post('topic_id'));

		
		$data = array(
					$cvalue=>$ptopic,
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('teacher_id')
				);
		if($this->PresentationModel->update_chapter($topic_id,$data)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}
	public function update_chapter_title(){
		$this->load->model('PresentationModel');

		$ptopic = $this->input->post('id');
		$cvalue = trim($this->input->post('cval'));
		$topic_id = trim($this->input->post('topic_id'));

		
		$data = array(

                    'teacher_id'=>$this->session->userdata('teacher_id'),
                    'content_id'=>$topic_id,
					'title'=>$ptopic,
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('teacher_id')
				);
		if($this->TeacherModel->update_chapter_title($topic_id,$data)){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to delete!');
		echo json_encode($out);
		
	}

	public function presentation_slide($id){
		$this->load->model('PresentationModel');
		$body_data = array(
							'questions' => $this->PresentationModel->get_problem_solving($id),
							'presentation_topic'=>$this->PresentationModel->list_presentation_topic($id),
							'topics'=>$this->PresentationModel->get_topics($id),
							'presentations'=>$this->PresentationModel->list_presentations($id),
							'images'=>$this->PresentationModel->list_images(),

							'topic_id'=>$id
						);
		// $this->load->view('backend/header1');
		$this->load->view('teacher/presentation_slide',$body_data);
		// $this->load->view('backend/footer1');
	}

	public function presentation_slide_view($id){
		$this->load->model('PresentationModel');
		
		$topicid = $this->PresentationModel->get_topic_main_parent($id);
		if($topicid == 0){
			$tid = $id;
		}else{
			$tid = $topicid; 
		}
		$body_data = array(
							'presentation_topic'=>$this->PresentationModel->list_presentation_topic($tid),
							'topics'=>$this->PresentationModel->get_topics($tid),
							'topic_id'=>$tid
						);
		// $this->load->view('backend/header1');
		$this->load->view('teacher/presentation_slide_view',$body_data);
		// $this->load->view('backend/footer1');
	}

	/*athulya*/

	public function teacher_students(){
		$this->load->library('pagination');

		$config['base_url'] = base_url('teacher-students');
		$config['total_rows'] = $this->TeacherModel->count_batch();
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
							'batch'=>$this->TeacherModel->list_batch($limit,$offset),
							
							'links'=>$links,
							'offset'=>$offset
						);
		$this->load->view('teacher/header');
		$this->load->view('teacher/teacher_students',$body_data);
		$this->load->view('teacher/footer');
	}
	public function batch_students(){
		$id = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('batch_id');
		if(!$id) redirect(base_url('teacher-students'));
		$this->session->set_userdata('batch_id',$id);
		$this->load->library('pagination');

		$config['base_url'] = base_url('batch-students');
		$config['total_rows'] = $this->TeacherModel->count_students($id);
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
				'students'=>$this->TeacherModel->list_students($id,$limit,$offset),
				'links'=>$links,
				'offset'=>$offset
			);
		$this->load->view('teacher/header');
		$this->load->view('teacher/students',$body_data);
		$this->load->view('teacher/footer');
	}

	public function presentation_draft_slide($tid){
	$this->load->model('PresentationModel');
			$user_topic_id = $this->TeacherModel->get_user_topic($tid);
			if($user_topic_id == false){
				$this->clone_presentation($tid);
				$user_topic_id = $this->TeacherModel->get_user_topic($tid);				
			}
			if($user_topic_id != false){
				$body_data = array(
									'presentation_topic'=>$this->PresentationModel->list_presentation_topic($user_topic_id),
									'presentations'=>$this->PresentationModel->list_presentations($user_topic_id),
									'topic_id'=>$user_topic_id
								);
				// $this->load->view('backend/header1');
				// $this->load->view('backend/presentation_slide',$body_data);
				redirect(base_url().'presentation-slide-view-teacher/'.$user_topic_id);
			}else{
				$topicid = $this->PresentationModel->get_topic_main_parent($tid);
				if($topicid == 0){
					$tid = $tid;
				}else{
					$tid = $topicid; 
				}
				$body_data = array(
									'presentation_topic'=>$this->PresentationModel->list_presentation_topic($tid),
									'topics'=>$this->PresentationModel->get_topics($tid),
									'topic_id'=>$tid
								);
				// $this->load->view('backend/header1');
				redirect(base_url().'presentation-slide-view-teacher/'.$user_topic_id);

				// $this->load->view('backend/presentation_slide_view',$body_data);
			}
			
	}
	//17-12-2020
	public function invited_student(){
		$id = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('batch_id');
		if(!$id) redirect(base_url('invited-student'));
		$this->session->set_userdata('batch_id',$id);
		$this->load->library('pagination');

		$config['base_url'] = base_url('invited-student');
		$config['total_rows'] = $this->TeacherModel->count_invite_students($id);
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
							'students'=>$this->TeacherModel->list_invite_students($id,$limit,$offset),
							'links'=>$links,
							'offset'=>$offset
						);
		$this->load->view('teacher/header');
		$this->load->view('teacher/invite_student',$body_data);
		$this->load->view('teacher/footer');
	}
	public function approve_students($id){
		$invite_data = $this->TeacherModel->get_invite_student($id);
		$batch = $this->TeacherModel->get_batch($invite_data['batch_id']);
		$update = array(
                        'status' => 2
                    );
        $up_data= $this->TeacherModel->update_student_invite($id,$update);
        if($up_data){
        	$data = array(
					
					'name' => $invite_data['name'],
					'email_id' => $invite_data['email'],
					'phone' => $invite_data['phone'],
					'password' => $invite_data['password'],
					'status'=>1,
					'created_on'=>time(),
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('teacher_id'),
					'course_id' => $batch['course_id'],
					'batch_id' => $invite_data['batch_id'],
					'institute_id' => $batch['institute_id'],
					'invite_status' => 1
				);
				if($this->TeacherModel->add_data($data,'student')){
					$this->session->set_flashdata('paper_created',1);
				}
        }
        else{
        	$this->session->set_flashdata('paper_created',2);
        }
        redirect(base_url('invited-student'));

	}
}