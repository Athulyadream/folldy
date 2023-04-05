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
    // public function publish_chapter($chapter){
    // 	//$chapter=$this->input->post('id');
    // 	// echo $chapter;exit();
    // 	$teacher = $this->session->userdata('teacher_id');
    //     $batch = $this->session->userdata('batch_id');

    // 	$check = $this->TeacherModel->check_publish($teacher,$chapter,$batch);
    //     // print_r($check);
    //     // die();
    // 	if(!empty($check)){
    // 		$data = array(
    // 			'publish_status' => 1,
    // 			'updated_on' => time(),
    // 			'updated_by' => $teacher
    // 			);
    // 		$result = $this->TeacherModel->update_publish($data,$check['id']);
    // 	}
    // 	else{
    // 	$data = array(
    // 			'teacher_id' => $teacher,
    // 			'chapter_id' => $chapter,
    //             'batch_id' => $batch,

    // 			'publish_status' => 1,
    // 			'created_on' => time(),
    // 			'updated_on' => time(),
    // 			'updated_by' => $teacher
    // 			);
    // 	$result = $this->TeacherModel->add_data($data,'chapter_publish');
    // }
    // 	if($result){
    // 		 $this->session->set_userdata('paper_created',1);
    // 	}
    // 	else{
    // 		$this->session->set_userdata('paper_created',1);
    // 	}
    // 	redirect(base_url('teacher-chapters'));
    // }



    public function publish_chapter($chapter){
        //$chapter=$this->input->post('id');
        // echo $chapter;exit();
        $teacher = $this->session->userdata('teacher_id');
        $batch = $this->session->userdata('batch_id');
    //athulya chapter - 11/02/2021
        $subject = $this->TeacherModel->get_chapter_subject($chapter);
        $check = $this->TeacherModel->check_publish($teacher,$chapter,$batch);
        $semester = $this->TeacherModel->get_semester_subjectbatch($batch,$subject);

        if(!empty($check)){
            $data = array(
                'publish_status' => 1,
                'updated_on' => time(),
                'updated_by' => $teacher
                );
            $result = $this->TeacherModel->update_publish($data,$check['id']);
            
               $chap_details = $this->TeacherModel->get_chapter_details($chapter);
                        $chaptername = $chap_details['chapter_name'];
                        $chapterThumbnail = $chap_details['chapter_thumbnail'];
                        // $students = $this->TeacherModel->get_course_students_subject($subject,$semester);

                            $subjectname = $this->Api_student->get_subject_data($subject);

                                    $title = "A new chapter content published";
                                    $message = " A new chapter ".$chaptername." published. ";
                                    $teachern = $this->TeacherModel->getProfileDetails_teacher($teacher);
                                    $teachername = $teachern['teacher_name'];

                                    $datan = array(
                                            'batch_id' => $batch,
                                            'title'=> $title,
                                            'message' => $message, 
                                            'image' => $chapterThumbnail,
                                            'type'  => 'chapter',
                                            'chapter_name'  => $chaptername, 
                                            'chapter_id'  => $chapter,
                                            'subject_name'  => $subjectname,
                                            'subject_id'  => $subject,
                                            'type_id'  => '',
                                            'presentation_name'  => '',
                                            'submission_date'  => '0000-00-00',
                                            'semester' =>$semester,
                                            'publish_content'  => "",
                                            'publish_audio'  => "",
                                            'created_user'  => $teachername,
                                            'created_by'  => $teacher,
                                            'created_at'  => date('Y-m-d H:i:s')
                                    );
                            $wall_id = $this->Api_student->add_data($datan,'wall_notifications');
        }
        else{
    //athulya chapter - 11/02/2021

            $data = array(
                    'teacher_id' => $teacher,
                    'chapter_id' => $chapter,
                    'batch_id' => $batch,
                    'publish_status' => 1,
                    'created_on' => date('Y-m-d'),
                    'updated_on' => date('Y-m-d'),
                    'updated_by' => $teacher
                    );
            $result = $this->TeacherModel->add_data($data,'chapter_publish');

            $chap_details = $this->TeacherModel->get_chapter_details($chapter);
                        $chaptername = $chap_details['chapter_name'];
                        $chapterThumbnail = $chap_details['chapter_thumbnail'];
                        // $students = $this->TeacherModel->get_course_students_subject($subject,$semester);

                            $subjectname = $this->Api_student->get_subject_data($subject);

                                    $title = "A new chapter content published";
                                    $message = " A new type published in chapter ".$chaptername;
                                    $teachern = $this->TeacherModel->getProfileDetails_teacher($teacher);
                                    $teachername = $teachern['teacher_name'];

                                    $datan = array(
                                            'batch_id' => $batch,
                                            'title'=> $title,
                                            'message' => $message, 
                                            'image' => $chapterThumbnail,
                                            'type'  => 'content',
                                            'chapter_name'  => $chaptername, 
                                            'chapter_id'  => $chapter,
                                            'subject_name'  => $subjectname,
                                            'subject_id'  => $subject,
                                            'type_id'  => '',
                                            'presentation_name'  => '',
                                            'semester' =>$semester,
                                            'submission_date'  => '0000-00-00',
                                            'publish_content'  => "",
                                            'publish_audio'  => "",
                                            'created_user'  => $teachername,
                                            'created_by'  => $teacher,
                                            'created_at'  => date('Y-m-d H:i:s')
                                    );
                            $wall_id = $this->Api_student->add_data($datan,'wall_notifications');

        }
        if($result){
             $this->session->set_userdata('paper_created',1);
        }
        else{
            $this->session->set_userdata('paper_created',1);
        }
        redirect(base_url('teacher-chapters'));
    }


    

    public function unpublish_chapter($chapter){
        //$chapter=$this->input->post('id');
        // echo $chapter;exit();
        $teacher = $this->session->userdata('teacher_id');
        $batch = $this->session->userdata('batch_id');
    //athulya chapter - 11/02/2021
        $subject = $this->TeacherModel->get_chapter_subject($chapter);
        $check = $this->TeacherModel->check_publish($teacher,$chapter,$batch);
        if(!empty($check)){
            $data = array(
                'publish_status' => 0,
                'updated_on' => time(),
                'updated_by' => $teacher
                );
            $result = $this->TeacherModel->update_publish($data,$check['id']);
            $datan = array(
                'batch_id' => $batch,
                'type'  => 'chapter',
                'chapter_id'  => $chapter,
                'content_id'  => 0,
            );
            $wall_id = $this->TeacherModel->delete_wall($datan);

        }
        if($result){
             $this->session->set_userdata('paper_created',1);
        }
        else{
            $this->session->set_userdata('paper_created',1);
        }
        redirect(base_url('teacher-chapters'));
    }

}