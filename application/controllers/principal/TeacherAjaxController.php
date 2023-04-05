<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TeacherAjaxController extends CI_Controller{
	function __construct(){
		parent::__construct();
		//echo $this->session->userdata('teacher_id');exit();
		if(empty($this->session->userdata('teacher_id'))){
			echo json_encode(array('status'=>404,'data'=>'Session not available!'));
			die();
		}
		$this->load->model('TeacherModel');
		date_default_timezone_set('Asia/Kolkata');
	}
	public function check(){
		echo "hi";
	}
	public function teacher_reset_password(){
        $cur_pass = $this->input->post('cur_pass');
        $new_pass = $this->input->post('new_pass');
        $data = $this->TeacherModel->reset_password($cur_pass,$new_pass);
        if($data['status'] == 1) $out = array('status'=>1,'data'=>'');
        elseif($data['status'] == 0) $out = array('status'=>0,'data'=>'Invalid request!');
        else $out = array('status'=>2,'data'=>'Invalid request!');
        echo json_encode($out);
    }
    public function publish_chapter(){
    	$chapter=$this->input->post('pchapter');
        $publish_content=$this->input->post('publish_content');

    	// echo $chapter;exit();
    	$teacher = $this->session->userdata('teacher_id');
    	$check = $this->TeacherModel->check_publish($teacher,$chapter);
    	if(!empty($check)){
    		$data = array(
    			'publish_status' => 1,
    			'updated_on' => time(),
    			'updated_by' => $teacher
    			);
    		$result = $this->TeacherModel->update_publish($data,$check['id']);
    	}
    	else{
    	$data = array(
    			'teacher_id' => $teacher,
    			'chapter_id' => $chapter,
    			'publish_status' => 1,
    			'created_on' => time(),
    			'updated_on' => time(),
    			'updated_by' => $teacher
    			);
    	$result = $this->TeacherModel->add_data($data,'chapter_publish');
    }
    	if($result){

                        $chap_details = $this->TeacherModel->get_chapter_details($chapter);
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
    		 $this->session->set_userdata('paper_created',1);
    	}
    	else{
    		$this->session->set_userdata('paper_created',1);
    	}

    	redirect(base_url('teacher-chapters'));
    }
}