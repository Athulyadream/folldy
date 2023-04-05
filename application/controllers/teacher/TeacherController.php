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
        $this->load->library('dblog');

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
					'ins_' => $this->TeacherModel->dashboard_news($details['institute_id']),
					
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
		$id = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('sem_id');
		if(!$id) redirect(base_url('teacher-semester'));
		$this->session->set_userdata('sem_id',$id);
		// $this->load->library('pagination');

		// $config['base_url'] = base_url('teacher-papers');
		// $config['total_rows'] = $this->TeacherModel->count_papers($id);
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
		$body_data = array(
							'papers'=>$this->TeacherModel->list_papers($id),
							// 'links'=>$links,
							// 'offset'=>$offset
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
		
				$body_data = array(
									'presentation_topic'=>$this->PresentationModel->list_presentation_topic($user_topic_id),
									'presentations'=>$this->PresentationModel->list_presentations($user_topic_id),
									'topic_id'=>$user_topic_id
								);
				redirect(base_url().'presentation-slide-teacher/'.$tid);
			
			
	}

// public function presentation_edit_slide($tid){
// 	$this->load->model('PresentationModel');
// 			$user_topic_id = $this->TeacherModel->get_user_topic($tid);
// 			if($user_topic_id == false){
// 				$this->clone_presentation($tid);
// 				$user_topic_id = $this->TeacherModel->get_user_topic($tid);				
// 			}
// 			if($user_topic_id != false){
// 				$body_data = array(
// 									'presentation_topic'=>$this->PresentationModel->list_presentation_topic($user_topic_id),
// 									'presentations'=>$this->PresentationModel->list_presentations($user_topic_id),
// 									'topic_id'=>$user_topic_id
// 								);
// 				// $this->load->view('backend/header1');
// 				// $this->load->view('backend/presentation_slide',$body_data);
// 				redirect(base_url().'presentation-slide-teacher/'.$user_topic_id);
// 			}else{
// 				$topicid = $this->PresentationModel->get_topic_main_parent($tid);
// 				if($topicid == 0){
// 					$tid = $tid;
// 				}else{
// 					$tid = $topicid; 
// 				}
// 				$body_data = array(
// 									'presentation_topic'=>$this->PresentationModel->list_presentation_topic($tid),
// 									'topics'=>$this->PresentationModel->get_topics($tid),
// 									'topic_id'=>$tid
// 								);
// 				// $this->load->view('backend/header1');
// 				redirect(base_url().'presentation-slide-view-teacher/'.$user_topic_id);

// 				// $this->load->view('backend/presentation_slide_view',$body_data);
// 			}
			
// 	}
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
	public function chapter_publish(){
		$type = $this->input->post('type');
		$type_id = $this->input->post('typeid');
		$content_id = $this->input->post('contentid');
		$chapterid = $this->input->post('chapter');



				$subject = $this->TeacherModel->get_chapter_subject($chapterid);
         		$semester = $this->session->userdata('sem_id');
				
				if($type == 2){
					$user_topic_id = $this->TeacherModel->get_user_topic($type_id,$subject);
					// if($user_topic_id == false){
					// 	$this->clone_presentation($type_id);
					// }
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


                        $chap_details = $this->TeacherModel->get_chapter_details($chapterid);
                        $chaptername = $chap_details['chapter_name'];

                        $students = $this->TeacherModel->get_course_students_subject($subject,$semester);

                        $toks = array();
                        foreach ($students as $value) {
                            $toks[] = $value['fcm'];
                        }
                        
                            $tokens = implode(",", $toks);
                            $this->load->library('Fcm');
                            $title = "A new chapter content published";
                            $message = " A new ".$type." published in chapter ".$chaptername;
                            $var['title'] = $title;
                            $var['message'] = $message;
                            $var['image'] = "";
                            // base_url().'uploads/notifications/'.$upload_data['file_name'];
                            $data2['type'] = "student";
                            $data2['link'] = "";

                            $datan['user_type'] = 'student';
                            $datan['title'] = $title;
                            $datan['message'] = $message;
                            $datan['date'] = date('Y-m-d');
                            $datan['is_read'] = '0';
                            $datan['type'] = 'content_publish';
                            $datan['content_id'] = $chapterid;
                            $datan['created_by'] = $this->session->userdata('teacher_id');
                            $datan['created_on'] = time();

                                             
                            $nid = $this->TeacherModel->add_data($datan,'notifications');

                              ////////////////////// Additional 2021 athulya open////////////////////////////

                            $file_name = $_FILES['publish_audio']['name'];
                            $file_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_name);
                            $ext = pathinfo($_FILES['publish_audio']['name'], PATHINFO_EXTENSION);
                            // change name
                            $imagename = $file_name . time() .$slide_id. "." . $ext;  
                            $target_file = './uploads/wall/'.$imagename;

                             if (move_uploaded_file($_FILES["publish_audio"]["tmp_name"], $target_file)) {
                                $datan['publish_audio'] = $imagename;

                             }else{
                                 $error_msg = $this->upload->display_errors();
                                // audio uploaded error
                                $out = array('status'=>0,'message'=>$error_msg,'data'=>new stdClass);
                             }

                                 $datan['publish_content'] = $publish_content;
                                


                            $wall_id = $this->Api_student->add_data($datan,'wall_notifications');

        ////////////////////// Additional 2021 athulya close////////////////////////////



                            foreach ($students as $value) {
                                $notificationdata['user_id'] = $value['id'];
                                $notificationdata['not_id'] = $nid;
                                $notificationdata['created_on'] = date('Y-m-d');
                                $not_id = $this->TeacherModel->add_data($notificationdata,'notifications_user');
                            }

                            $res1 = $this->fcm->send_bulk_push_message($tokens, $var, $data2);






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
 		if(!empty($topic_data)){
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

						$parent_images = $this->TeacherModel->get_topic_images($id);
						foreach ($parent_images as $ikey => $ivalue) {
							$idata = array(
										'image_topic_id' =>$tid ,
										'image' =>$ivalue['image'] ,
		                				'image_height' =>$ivalue['image_height'] , 
		                				'image_width' =>$ivalue['image_width'] , 
		                				'image_position_left' =>$ivalue['image_position_left'] , 
		                				'image_position_top' =>$ivalue['image_position_top'] ,
		                				'created_at' =>date("Y-m-d") ,
		                				'created_by' =>$this->session->userdata('teacher_id') 
							);

							$this->TeacherModel->add_data($idata,'presentation_topic_images');
							
						}

						 // $cloned_data  = array(
       //                       			'presentation_id' =>$topic_data['topic_presentation_id'] ,
       //                                  'topic_id' =>$id , 
       //                                  'cloned_id' =>$tid , 
       //                                  'teacher_id' =>$this->session->userdata('teacher_id'), 
       //                                  'date'=> date("Y-m-d H:i:s")
       //                  );
							$chapter_id = $this->session->userdata('chapter_id');
         					$subject = $this->TeacherModel->get_chapter_subject($chapter_id);
         					$semester = $this->session->userdata('sem_id');
						  	$cloned_data  = array(
                                        'presentation_id' =>$topic_data['topic_presentation_id'] ,
                                        'topic_id' =>$id , 
                                        'cloned_id' =>$tid , 
                                        'teacher_id' =>$this->session->userdata('teacher_id') , 
                                        'semester' =>$semester , 
                                        'subject' =>$subject , 
                                        'date'=> date("Y-m-d H:i:s")
                        	);
                        $this->TeacherModel->add_data($cloned_data,'cloned_presentations');
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
			}
// die();
        // if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        // else array('status'=>0,'data'=>'Invalid request!');
        // echo json_encode($out);
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

				$parent_images = $this->TeacherModel->get_topic_images($topic_id_or);
						foreach ($parent_images as $ikey => $ivalue) {
							$idata = array(
										'image_topic_id' =>$tpid ,
										'image' =>$ivalue['image'] ,
		                				'image_height' =>$ivalue['image_height'] , 
		                				'image_width' =>$ivalue['image_width'] , 
		                				'image_position_left' =>$ivalue['image_position_left'] , 
		                				'image_position_top' =>$ivalue['image_position_top'] ,
		                				'created_at' =>date("Y-m-d") ,
		                				'created_by' =>$this->session->userdata('teacher_id') 
							);

							$this->TeacherModel->add_data($idata,'presentation_topic_images');
							
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
			
         	$chapter_id = $this->session->userdata('chapter_id');
         	$subject = $this->TeacherModel->get_chapter_subject($chapter_id);
			$user_topic_id = $this->TeacherModel->get_user_topic($tid,$subject);
			if($user_topic_id == false){
				// print_r($tid);
				$this->clone_presentation($tid);
				$user_topic_id = $this->TeacherModel->get_user_topic($tid,$subject);				
			}
			if($user_topic_id != false){
				$body_data = array(
									'presentation_topic'=>$this->PresentationModel->list_presentation_topic($user_topic_id),
									'presentations'=>$this->PresentationModel->list_presentations($user_topic_id),
									'topic_id'=>$user_topic_id
								);
				// $this->load->view('backend/header1');
				// $this->load->view('backend/presentation_slide',$body_data);
				// redirect(base_url().'presentation-slide-view-teacher/'.$user_topic_id);
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
				// redirect(base_url().'presentation-slide-view-teacher/'.$user_topic_id);

				// $this->load->view('backend/presentation_slide_view',$body_data);
			}
				 redirect(base_url('chapter-design-teacher').'?id='.$chapter_id);
			
			
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
	public function semester(){
		$id = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('batch_id');
		if(!$id) redirect(base_url('teacher-semester'));
		$this->session->set_userdata('batch_id',$id);
		// $this->load->library('pagination');

		// $config['base_url'] = base_url('teacher-semester');
		// $config['total_rows'] = $this->TeacherModel->count_papers($id);
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
		$body_data = array(
							'semester'=>$this->TeacherModel->list_semester($id),
							
						);
		$this->load->view('teacher/header');
		$this->load->view('teacher/semester',$body_data);
		$this->load->view('teacher/footer');
	}
	public function add_favourite($id){
		//echo $this->session->userdata('sem_id');exit();
		$where['teacher_id'] = $this->session->userdata('teacher_id');
        $where['subject_id'] = $id;
        $where['semester'] = $this->session->userdata('sem_id');
        $exist_subject = $this->Api_student->subject_already_exist($where);
        if(empty($exist_subject)){
            $insert_data = array(
                        'subject_id' => $id,
                        'teacher_id' => $this->session->userdata('teacher_id'),
                        'semester' => $this->session->userdata('sem_id'),
                        'batch_id' => $this->session->userdata('batch_id'),
                        'favourite_status' => 1

                            );
            $insert = $this->TeacherModel->add_data($insert_data,'teacher_favourite_subject');
        }
        else{
            $update_data = array(
                                
                'favourite_status' => 1

                    );
            $where['teacher_id'] = $this->session->userdata('teacher_id');
            $where['subject_id'] = $id;
            $where['semester'] = $this->session->userdata('sem_id');
            $insert = $this->TeacherModel->remove_favourite($update_data,$where);
        }
        if($insert){
        	$this->session->set_flashdata('paper_updated',1);
        }
        else{
        	$this->session->set_flashdata('paper_updated',2);
        }
        redirect(base_url('teacher-papers'));

	}
	public function remove_favourite($id){
		$update_data = array(
                    
                    'favourite_status' => 2

                        );
        $where['teacher_id'] = $this->session->userdata('teacher_id');
        $where['subject_id'] = $id;
        $where['semester'] = $this->session->userdata('sem_id');
        $insert = $this->TeacherModel->remove_favourite($update_data,$where);
        if($insert){
        	$this->session->set_flashdata('paper_remove',1);
        }
        else{
        	$this->session->set_flashdata('paper_remove',2);
        }
        redirect(base_url('teacher-papers'));
	}
	public function draft_practice($practice){
		$id = $this->session->userdata('teacher_id');
		$chapter_id = $this->session->userdata('chapter_id');
        $subject = $this->TeacherModel->get_chapter_subject($chapter_id);
        $semester = $this->session->userdata('sem_id');
		$check = $this->TeacherModel->check_cloned_practice($practice,$id,$semester,$subject);

                        if($check ==0){
                             $cloned_data  = array(
                                        'practice_id' =>$practice,
                                        'semester' =>$semester , 
                                        'subject' =>$subject , 
                                        'teacher_id' =>$id , 
                                        'date'=> date("Y-m-d H:i:s")
                            );
                        $prac_id = $this->TeacherModel->add_data($cloned_data,'cloned_practice');

                        }else{
                            $prac_id =$check;
                        }
                        redirect(base_url('chapter-design-teacher').'?id='.$chapter_id);
	}
	public function teacher_time_table(){
		$id = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('batch_id');
		if(!$id) redirect(base_url('teacher-batch'));
		$this->session->set_userdata('batch_id',$id);


		$batch = $this->TeacherModel->get_batch($id);
		//$data = $this->TeacherModel->teacher_time_table($id);
		$week  = $this->TeacherModel->get_week();
		//print_r($week);exit();
        foreach ($week as $key => $value) {
            $data ='';
            $data = $this->TeacherModel->teacher_time_table($id,$value['id']);
            //print_r($data);
            if(!empty($data)){
                foreach($data as $row){
                    for($i=0;$i<$batch['batch_periods'];$i++){
                        if($i+1==$row['period']){
                            $days[$value['week_days']][$i]= array('period'=>$row['period'],'subject'=>$row['subject']);
                        }
                        else{
                            $days[$value['week_days']][$i]= array('period'=>'','subject'=>'');
                        }
                    }
                   

                }
            }
            else{
                $days[$value['week_days']] ='';
            }

        }
        //print_r($days);exit();
		$body_data = array(
							'time_table'=>$days,
							'weekdays' => $this->TeacherModel->get_week(),
							'periods' => $batch['batch_periods']
							
						);
		$this->load->view('teacher/header');
		$this->load->view('teacher/time_table',$body_data);
		$this->load->view('teacher/footer');
	}

////////////************************************************************************/////////////////
	//Additional 2021 Athulya
	public function assignment_filter(){
		$filter = array(
						'name' => $this->input->post('filter_name') ? $this->input->post('filter_name') : '',
						
					);
		$this->session->set_userdata('assignment_filter',$filter);
		redirect(base_url('assignment'));
	}
	public function assignment(){
		$subject = $this->input->get('subject') ? $this->input->get('subject') : $this->session->userdata('sub_id');
		 $this->session->set_userdata('sub_id',$subject);
		
		$filter = $this->session->userdata('assignment_filter');
		$filter_data = array(
					'name'=> isset($filter['name'])? $filter['name']:'',
			);

		$this->load->library('pagination');



		$config['base_url'] = base_url('assignment');
		$config['total_rows'] = $this->TeacherModel->count_assignment($filter_data);
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
							'assignment'=>$this->TeacherModel->list_assignment($limit,$offset,$filter_data),
							'links'=>$links,
							'offset'=>$offset,
							'filter_data' => $filter_data,
						);
		// print_r($body_data);
		// die();
		$this->load->view('teacher/header');
		$this->load->view('teacher/assignment',$body_data);
		$this->load->view('teacher/footer');
	}

	public function add_assignment(){
		$assignment_title = trim($this->input->post('assignment_title'));
		$submission_date = $this->input->post('submission_date');
		// print_r($submission_date);
		// die();
		$semester = $this->session->userdata('sem_id');
        $subject = $this->session->userdata('sub_id');
		// $presentation_tags = trim($this->input->post('presentation_tags'));
	// $keywords = explode(',',$this->input->post('presentation_tags'));
		$data = array(
					'assignment_title'=>$assignment_title,
					'submission_date'=>$submission_date,
					'semester'=>$semester,
					'subject'=>$subject,
					'created_on'=>date("Y-m-d"),
					'created_by'=>$this->session->userdata('teacher_id')
				);
		$pid = $this->TeacherModel->add_data($data,'assignment');
		if($pid){
			
			$title = "assignmentq";
			if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0){ 
                $filesCount = count($_FILES['files']['name']); 

                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                    $_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                     
                    // File upload configuration 
                    $uploadPath = 'uploads/assignment_question/'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                    //$config['max_size']    = '100'; 
                    //$config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                    $config['file_name'] = time() .'_'. $_FILES['files']['name'][$i];

                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('file')){ 

                        // Uploaded file data 
                        $fileData = $this->upload->data(); 

                        $fileName = $fileData['file_name'];


                        $data = array(
		                                'assignment_id'=>$pid,
		                                'file'=>$fileName,
		                                'created_on'=>date("Y-m-d"),
		                                'created_by'=>$this->session->userdata('teacher_id')
		                            );
                        
		                $this->TeacherModel->add_data($data,'assignment_question_images');
                        $uploadData[$i]['file_name'] = $fileData['file_name']; 
                        $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s"); 
                    }else{  
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                    } 
                } 
			}

						
			 $students = $this->TeacherModel->get_course_students_subject($subject,$semester);

                        $toks = array();
                        foreach ($students as $value) {
                            $toks[] = $value['fcm'];
                        }
                        
                            $tokens = implode(",", $toks);
                            $this->load->library('Fcm');
                            $title = "A new assignment published";
                            $message = " A new assignment published in chapter ";
                            $var['title'] = $title;
                            $var['message'] = $message;
                            $var['image'] = "";
                            // base_url().'uploads/notifications/'.$upload_data['file_name'];
                            $data2['type'] = "student";
                            $data2['link'] = "";

                            $datan['user_type'] = 'student';
                            $datan['title'] = $title;
                            $datan['message'] = $message;
                            $datan['date'] = date('Y-m-d');
                            $datan['is_read'] = '0';
                            $datan['type'] = 'content_publish';
                            $datan['content_id'] = $pid;
                            $datan['created_by'] = $this->session->userdata('teacher_id');
                            $datan['created_on'] = time();

                                             
                            $nid = $this->TeacherModel->add_data($datan,'notifications');
                            foreach ($students as $value) {
                                $notificationdata['user_id'] = $value['id'];
                                $notificationdata['not_id'] = $nid;
                                $notificationdata['created_on'] = date('Y-m-d');
                                $not_id = $this->TeacherModel->add_data($notificationdata,'notifications_user');
                            }

                            $res1 = $this->fcm->send_bulk_push_message($tokens, $var, $data2);
			
			$this->dblog->logQueries('teacher',$this->session->userdata('teacher_id'));
// $this->Api_student->insert_log("APP - Q and A Question Added".$pid,$id,'Student' );
			$this->session->set_flashdata('assignment_created',1);
		}
		else{
			$this->session->set_flashdata('assignment_created',2);
		}
		
		redirect(base_url('assignment').'?subject='.$subject);


	}




	 private function upload_files($path, $title, $files)
    {
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'jpg|gif|png',
            'overwrite'     => 1,                       
        );

        $this->load->library('upload', $config);

        $images = array();

        foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name']= $files['name'][$key];
            $_FILES['images[]']['type']= $files['type'][$key];
            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['images[]']['error']= $files['error'][$key];
            $_FILES['images[]']['size']= $files['size'][$key];

            $fileName = $title .'_'. $image;

            $images[] = $fileName;

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $this->upload->data();
            } else {
                return false;
            }
        }

        return $images;
    }



	public function edit_assignment(){
		$id = $this->input->post('assignment_id');
		$assignment_title = trim($this->input->post('edit_assignment_title'));
		$submission_date = trim($this->input->post('edit_submission_date'));
		$status = $this->input->post('edit_assignment_status') ? 2: 1;
		$data = array(
					'assignment_title'=>$assignment_title,
					'submission_date'=>$submission_date,
					'assignment_status'=>$status,
					'updated_on'=>date("Y-m-d"),
					'updated_by'=>$this->session->userdata('teacher_id')
				);
		if($this->TeacherModel->edit_assignment($id,$data)){

			if(!empty($_FILES['editfiles']['name']) && count(array_filter($_FILES['editfiles']['name'])) > 0){ 
                $filesCount = count($_FILES['editfiles']['name']); 

                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name']     = $_FILES['editfiles']['name'][$i]; 
                    $_FILES['file']['type']     = $_FILES['editfiles']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['editfiles']['tmp_name'][$i]; 
                    $_FILES['file']['error']     = $_FILES['editfiles']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['editfiles']['size'][$i]; 
                     
                    // File upload configuration 
                    $uploadPath = 'uploads/assignment_question/'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                    //$config['max_size']    = '100'; 
                    //$config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                    $config['file_name'] = time() .'_'. $_FILES['editfiles']['name'][$i];
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('file')){ 

                        // Uploaded file data 
                        $fileData = $this->upload->data(); 

                        $fileName = $fileData['file_name'];


                        $data = array(
		                                'assignment_id'=>$id,
		                                'file'=>$fileName,
		                                'created_on'=>date("Y-m-d"),
		                                'created_by'=>$this->session->userdata('teacher_id')
		                            );
                        
		                $this->TeacherModel->add_data($data,'assignment_question_images');
                        $uploadData[$i]['file_name'] = $fileData['file_name']; 
                        $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s"); 
                    }else{  
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                    } 
                } 
			}
		
			$this->TeacherModel->insert_log("web - assignment updated".$id,$this->session->userdata('teacher_id'),'teacher' );
			$this->session->set_flashdata('assignment_updated',1);
		}
		else{
			$this->session->set_flashdata('assignment_updated',2);
		}
		$data_ass = $this->TeacherModel->get_assignment($id);
						$subject = $data_ass['subject'];
		redirect(base_url('assignment').'?subject='.$subject);
	}
	public function delete_assignment(){
		$id = $this->input->post('id');
		$data = array(
					'assignment_status'=>0,
					'updated_on'=>time(),
					'updated_by'=>$this->session->userdata('teacher_id')
				);
		
		if($this->TeacherModel->edit_assignment($id,$data)){
			$this->session->set_flashdata('assignment_updated',1);
			$this->TeacherModel->insert_log("web - assignment deleted id -".$id,$this->session->userdata('teacher_id'),'admin' );
			$out = array('status'=>1,'data'=>'OK');
		}
		else{
			$this->session->set_flashdata('assignment_updated',2);
			 $out = array('status'=>0,'data'=>'Unable to delete!');
		}
		echo json_encode($out);
	}

	function check_assignment_title(){
		$title = trim($this->input->post('title'));
		$check = $this->TeacherModel->check_title($title);
		
		if($check ==1){
			$out = array('status'=>1,'data'=>'OK');
		}
		else $out = array('status'=>0,'data'=>'Unable to check!');
		echo json_encode($out);
	}


//////////////////////AJAX/////////////////////////////////////

	public function get_assignment(){
        $id = $this->input->post('id');
        $data = $this->TeacherModel->get_assignment($id);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else $out = array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
	}

	public function assignment_publish($id){
				
				$data = array(
					'assignment_publish_status'=>1,
					'updated_on'=>date("Y-m-d"),
					'updated_by'=>$this->session->userdata('teacher_id')
				);
		if($this->TeacherModel->edit_assignment($id,$data)){
					// if($this->TeacherModel->add_data($data,'chapter_content_publish')){

						$data_ass = $this->TeacherModel->get_assignment($id);
						$subject = $data_ass['subject'];
						$semester = $data_ass['semester'];
                        // $chap_details = $this->TeacherModel->get_chapter_details($chapterid);
                        // $chaptername = $chap_details['chapter_name'];
                        // $subject = $chap_details['data_parent'];

                       
						$this->session->set_flashdata('presentation_created',1);

					}else{
						$this->session->set_flashdata('presentation_created',2);

					}
				
				
		redirect(base_url('assignment').'?subject='.$subject);

		
	}

	public function assignment_close($id){
				
				$data = array(
					'assignment_status'=>2,
					'updated_on'=>date("Y-m-d"),
					'updated_by'=>$this->session->userdata('teacher_id')
				);

					if($this->TeacherModel->edit_assignment($id,$data)){
					
						$this->session->set_flashdata('presentation_created',1);

					}else{
						$this->session->set_flashdata('presentation_created',2);

					}
				
				$data_ass = $this->TeacherModel->get_assignment($id);
						$subject = $data_ass['subject'];
		redirect(base_url('assignment').'?subject='.$subject);

		
	}
	public function assignment_view_students($id){
				
				$data_ass = $this->TeacherModel->get_assignment($id);
				$subject = $data_ass['subject'];
				$semester = $data_ass['semester'];

				$body_data = array(
							'students'=>$this->TeacherModel->list_assignment_students($semester,$subject),
							'assignment_id'=>$id,
				);
				$this->load->view('teacher/header');
				$this->load->view('teacher/assignment_view_students',$body_data);
				$this->load->view('teacher/footer');
						

		
	}
	public function assignment_view($id,$studentid){
				
				$data_ass = $this->TeacherModel->get_assignment($id);
				$subject = $data_ass['subject'];
				$semester = $data_ass['semester'];

				$body_data = array(
							'assignment'=>$this->TeacherModel->assignment_student_view($id,$studentid),
							'assignment_id'=>$id,
							'student_id'=>$studentid,
				);
				$this->load->view('teacher/header');
				$this->load->view('teacher/assignment_view',$body_data);
				$this->load->view('teacher/footer');
						

		
	}

	public function add_assignment_marks(){
				$student_id = $this->input->post('student_id');
				$assignment_id = $this->input->post('assignment_id');
				$marks = $this->input->post('marks');

				$marks_check = $this->TeacherModel->check_student_marks($student_id,$assignment_id);
				if(empty($marks_check)){
					$data = array(
						'marks'=>$marks,
						'student_id'=>$student_id,
						'assignment_id'=>$assignment_id,
						'created_at'=>date("Y-m-d"),
						'created_by'=>$this->session->userdata('teacher_id')
					);
					$marks_id = $this->TeacherModel->add_data($data,'assignment_marks');

				}else{
					$marks_id = $marks_check['marks_id'];
					$data = array(
						'marks'=>$marks,
						'updated_at'=>date("Y-m-d"),
						'updated_by'=>$this->session->userdata('teacher_id')
					);
					$this->TeacherModel->update_assignment_marks($data,$marks_id);

				}
				
					if($marks_id){
					
						$this->session->set_flashdata('presentation_created',1);

					}else{
						$this->session->set_flashdata('presentation_created',2);

					}
				
				$data_ass = $this->TeacherModel->get_assignment($id);
						$subject = $data_ass['subject'];
		redirect(base_url('assignment').'?subject='.$subject);

		
	}
	public function assignment_reject($aid,$sid){
				
				$data = array(
					'status'=>0,
					'updated_at'=>date("Y-m-d"),
					'updated_by'=>$this->session->userdata('teacher_id')
				);

					if($this->TeacherModel->edit_assignment_submit($aid,$sid,$data)){
					
						$this->session->set_flashdata('presentation_created',1);

					}else{
						$this->session->set_flashdata('presentation_created',2);

					}
				
				
		redirect(base_url('assignment-view-students').'/'.$aid);

		
	}


	public function semesterplan(){
		$id = $this->session->userdata('paper_id');
		if(!$id) redirect(base_url('teacher-batch'));
		$this->load->library('pagination');

		$config['base_url'] = base_url('teacher-plan');
		$config['total_rows'] = $this->TeacherModel->count_chapters_semester($id);
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
		$sem = $this->session->userdata('sem_id');
		// print_r($sem);
		// print_r($this->TeacherModel->get_semester_data($sem));
		// die();

		$body_data = array(
				'semester'=>$this->TeacherModel->get_semester_data($sem),
				'chapters'=>$this->TeacherModel->list_chapters_semester(),
				'links'=>$links,
				'offset'=>$offset
			);
		$this->load->view('teacher/header');
		$this->load->view('teacher/semesterplan',$body_data);
		$this->load->view('teacher/footer');
	}
	public function set_start_date(){
		$start_date = str_replace('/', '-', $this->input->post('start_date'));
	    $start_date1 = date('Y-m-d', strtotime($start_date));
	    $where['semester'] = $this->session->userdata('sem_id');
	    $where['subject'] = $this->session->userdata('paper_id');
	    $where['teacher'] = $this->session->userdata('teacher_id');
	    $where['chapter'] = $this->input->post('chapter_id');

	    $check_expiry = $this->TeacherModel->check_exiry_date($where);
	    if(empty($check_expiry)){
	     $insert = array(
	              
	                'semester' => $this->session->userdata('sem_id'),
	                'subject' => $this->session->userdata('paper_id'),
	                'chapter' => $this->input->post('chapter_id'),
	                'teacher' =>$this->session->userdata('teacher_id'),
	                'start_date' => $start_date1,
	                );
	        $result=$this->TeacherModel->add_data($insert,'chapter_plan');
	    }
	    else{
	        $update = array('start_date' => $start_date1);
	        $result=$this->TeacherModel->update_expiry_date($update,$check_expiry['id']);
	    }
	    if($result){
	        echo 1;
	    }
	    else{
	        echo 0;
	    }
	   
	}

    public function set_expiry_date(){
	   $start_date = str_replace('/', '-', $this->input->post('expiry_date'));
	    $start_date1 = date('Y-m-d', strtotime($start_date));
	    $where['semester'] = $this->session->userdata('sem_id');
	    $where['subject'] = $this->session->userdata('paper_id');
	    $where['teacher'] = $this->session->userdata('teacher_id');
	    $where['chapter'] = $this->input->post('chapter_id');


	    $check_expiry = $this->TeacherModel->check_exiry_date($where);
	    if(empty($check_expiry)){
	     $insert = array(
	              
	                'semester' => $this->session->userdata('sem_id'),
	                'subject' => $this->session->userdata('paper_id'),
	                'chapter' => $this->input->post('chapter_id'),
	                'teacher' =>$this->session->userdata('teacher_id'),
	                'end_date' => $start_date1,
	                );
	        $result=$this->TeacherModel->add_data($insert,'chapter_plan');
	    }
	    else{
	        $update = array('end_date' => $start_date1);
	        $result=$this->TeacherModel->update_expiry_date($update,$check_expiry['id']);
	    }
	    if($result){
	        echo 1;
	    }
	    else{
	        echo 0;
	    }
	   
	   
	}

	




	public function teacher_plan_contents(){
		$this->load->model('AdminModel');
		$id = $this->input->get('id') ? $this->input->get('id') : $this->session->userdata('chptr_id');
		$plan = $this->input->get('plan') ? $this->input->get('plan') : $this->session->userdata('plan');
		if(!$id) redirect(base_url('courses'));
		$this->session->set_userdata('chptr_id',$id);
		$this->session->set_userdata('plan',$plan);
		$this->load->library('pagination');

		$config['base_url'] = base_url('exercise');
		$config['total_rows'] = $this->TeacherModel->count_content_plan($id);
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
				'content'=>$this->TeacherModel->list_content_plan($id,$limit,$offset),
				'question' => $this->AdminModel->get_problem_solving($id),
				'presentation' => $this->AdminModel->get_presentation(),
				'links'=>$links,
				'offset'=>$offset
			);
		$this->load->view('teacher/header');
		$this->load->view('teacher/chapter_content_plan',$body_data);
		$this->load->view('teacher/footer');
	}


    public function set_expiry_date_content(){
	   $start_date = str_replace('/', '-', $this->input->post('expiry_date'));
	    $start_date1 = date('Y-m-d', strtotime($start_date));
	    $where['semester'] = $this->session->userdata('sem_id');
	    $where['chapter_plan_id'] = $this->session->userdata('plan');

	    //content id will be 0 for content added from plan
	    if($this->input->post('content')){
	    		$where['content_id'] = $this->input->post('content');
	    		$content_id = $this->input->post('content');
	    }else{
	    		$where['content_id'] = 0;
	    		$content_id = 0;
	    }
	    $where['teacher'] = $this->session->userdata('teacher_id');
	    $where['chapter'] = $this->session->userdata('chptr_id');

	    $check_expiry = $this->TeacherModel->check_exiry_date_content($where);
	    if(empty($check_expiry)){
	     $insert = array(
	              
	                'semester' => $this->session->userdata('sem_id'),
	                'chapter' => $this->session->userdata('chptr_id'),
	                'chapter_plan_id' => $this->session->userdata('plan'),
	                'content_id' => $content_id,
	                'teacher' =>$this->session->userdata('teacher_id'),
	                'content_end_date' => $start_date1,
	                );
	        $result=$this->TeacherModel->add_data($insert,'semester_plan');
	    }
	    else{
	        $update = array('content_end_date' => $start_date1);
	        $result=$this->TeacherModel->update_expiry_date_content($update,$check_expiry['id']);
	    }
	    if($result){
	        echo 1;
	    }
	    else{
	        echo 0;
	    }
	   
	   
	}
	
	public function add_chapter_content(){
		$chapter_id = $this->session->userdata('chptr_id');
		$plan = $this->session->userdata('plan');
	    $content = $this->input->post('content');

		$where['semester'] = $this->session->userdata('sem_id');
	    $where['chapter_plan_id'] = $this->session->userdata('plan');
	    $where['teacher'] = $this->session->userdata('teacher_id');
	    $where['chapter'] = $this->session->userdata('chptr_id');
	    $where['content'] = $this->input->post('content');

        $check_expiry = $this->TeacherModel->check_exiry_date_content($where);
	    if(empty($check_expiry)){
	     $insert = array(
	              
	                'semester' => $this->session->userdata('sem_id'),
	                'chapter' => $this->session->userdata('chptr_id'),
	                'chapter_plan_id' => $this->session->userdata('plan'),
	                'content_id' =>"",
	                'content' =>$content,
	                'teacher' =>$this->session->userdata('teacher_id'),
	                );
	        $result=$this->TeacherModel->add_data($insert,'semester_plan');
	        $this->session->set_flashdata('paper_created',1);
	    }
	    else{
	    	$this->session->set_flashdata('paper_created',2);
	        // $update = array('content_end_date' => $start_date1);
	        // $result=$this->TeacherModel->update_expiry_date_content($update,$check_expiry['id']);
	    }

                        redirect(base_url('teacher-plan-contents').'?id='.$chapter_id.'&&plan='.$plan);
	}




}
