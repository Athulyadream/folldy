<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TeacherModel extends CI_Model {
	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
         $query = $this->db->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");


    }
    public function check_login($username,$password){
        $this->db->select('teacher_id,role_id,teacher_name,teacher_status,teacher_password,institute_id');
        $this->db->where('teacher_phone',$username);
        //$this->db->or_where('admin_email',$username);
        $data = $this->db->get('teachers')->row_array();
        if(!empty($data)){
            if(password_verify($password,$data['teacher_password'])){
                if($data['teacher_status']==1){
                    $out = array('status'=>1,'data'=>array('teacher_name'=>$data['teacher_name'],'teacher_id'=>$data['teacher_id'],'institute_id'=>$data['institute_id'],'role_id'=>$data['role_id']));
                }
                else{
                    $out = array('status'=>3,'data'=>'Profile Suspended! Contact Support.');
                }
            }
            else{
                $out = array('status'=>2,'data'=>'Password Mismatch! Try again');
            }
        }
        else{
            $out = array('status'=>0,'data'=>'Invalid login credentials!');
        }
        return $out;
    }
    public function count_batch(){
        $this->db->distinct();
        $this->db->select('batch.*,data_name');
        $this->db->where('batch_teachers.teacher_id',$this->session->userdata('teacher_id'));
        $this->db->join('batch','batch.batch_id = batch_teachers.batch_id','left');
        $this->db->join('data','data.data_id=batch.course_id','left');
        return $this->db->count_all_results('batch_teachers');
    }

    public function list_batch($limit,$offset){
        $this->db->distinct();
        $this->db->select('batch.*,data_name');
        $this->db->where('batch_teachers.teacher_id',$this->session->userdata('teacher_id'));
        $this->db->join('batch','batch.batch_id = batch_teachers.batch_id','left');
        $this->db->join('data','data.data_id=batch.course_id','left');
        $this->db->order_by('batch.batch_id','asc');
        
        $this->db->limit($limit,$offset);
        return $this->db->get('batch_teachers')->result_array();
    }
    public function count_papers($id){
        
        $this->db->where('batch_teachers.batch_id',$id);
        $this->db->where('batch_teachers.teacher_id',$this->session->userdata('teacher_id'));
        return $this->db->count_all_results('batch_teachers');
    }

    public function list_papers($id,$limit,$offset){
        $this->db->select('data_id,data_name, data.updated_on,admin_name');
        $this->db->join('data','data.data_id=batch_teachers.subject_id','left');
        $this->db->join('admins','admins.admin_id=data.updated_by','left');
        $this->db->where('batch_teachers.batch_id',$id);
        $this->db->where('batch_teachers.teacher_id',$this->session->userdata('teacher_id'));
        $this->db->order_by('batch_teachers.id','desc');
        $this->db->limit($limit,$offset);
        return $this->db->get('batch_teachers')->result_array();
    }
    public function count_chapters($id){
        $this->db->where('data_status',1);
        $this->db->where('data_type',2);
        $this->db->where('data_parent',$id);
        return $this->db->count_all_results('data');
    }

    public function list_chapters($id,$limit,$offset){
        $teacher = $this->session->userdata('teacher_id');
        $this->db->select('data_id,data_name,data.updated_on,admin_name,data.updated_by ,chapter_publish.publish_status');
        $this->db->join('admins','admins.admin_id=data.updated_by','left');
        $this->db->join('chapter_publish','chapter_publish.chapter_id = data.data_id AND chapter_publish.teacher_id='.$teacher,'left');
        $this->db->where('data_status',1);
        $this->db->where('data_type',2);
        $this->db->where('data_parent',$id);
        $this->db->order_by('data_id','desc');
        $this->db->limit($limit,$offset);
        return $this->db->get('data')->result_array();
    }
    public function reset_password($cur_pass,$new_pass){
        //echo $this->session->userdata('teacher_id');
        $this->db->select('*');
        $this->db->where('teacher_id',$this->session->userdata('teacher_id'));
        $data = $this->db->get('teachers')->row_array();
        if(password_verify($cur_pass,$data['teacher_password']))
        {
            $data = array(
                'teacher_password'=>password_hash($new_pass,PASSWORD_DEFAULT),
                );
             $this->db->where('teacher_id',$this->session->userdata('teacher_id'));
             if($this->db->update('teachers',$data)){
                $out = array('status'=>1,'data'=>'');
             }
             else{
                $out = array('status'=>2,'data'=>'Updation Failed.');
             }
        }
        else{
            $out = array('status'=>0,'data'=>'Invalid current password!');
        }
        return $out;
    }
    public function forgot_password($username){
        $this->db->select('teacher_id,teacher_phone');
        $this->db->where('teacher_phone',$username);
        $this->db->where('teacher_status',1);
        //$this->db->or_where('admin_email',$username);
        $data = $this->db->get('teachers')->row_array();

        return $data;
    }
    public function update_password($where,$update_data){
        if(!empty($where)){
            $this->db->where($where);
        }
        return $this->db->update('teachers',$update_data);
    }
     public function add_data($data,$table){
        if($this->db->insert($table,$data)) {
        // echo $this->db->last_query();exit(); 
              return $this->db->insert_id();

        }
        else {return false;}
    }
    public function check_publish($teacher,$chapter){
        $this->db->select('*');
        $this->db->where('teacher_id',$teacher);
        $this->db->where('chapter_id',$chapter);
        //$this->db->or_where('admin_email',$username);
        $data = $this->db->get('chapter_publish')->row_array();

        return $data;
    }
    public function update_publish($data,$id){
        $this->db->where('id',$id);
        if($this->db->update('chapter_publish',$data)) return true;
        else return false;
    }
    public function count_content($id){
        $this->db->where('status >',0);
        $this->db->where('chapter_id',$id);
        return $this->db->count_all_results('chapter_design');
    }

    public function list_content($id,$limit,$offset){
        
        
        $this->db->select('chapter_design.id, chapter_design.chapter_id, `type`, `type_id`, `status`, chapter_design.created_on, chapter_design.updated_on, chapter_design.updated_by, `presentation`, `topic_title`, `topic_color`, `topic_backgroundcolor`, `topic_backgroundimage`, `topic_type`, `topic_status`, `topic_bordercolor`, `topic_fontsize`, `topic_position_left`, `topic_position_top`, `topic_width`, `topic_height`, `topic_content_position_left`,publish_status, `topic_content_position_top`,admin_name,teacher_id');
        $this->db->where('chapter_design.chapter_id',$id);
        $this->db->where('chapter_design.status >',0);
        $this->db->where('teacher_id',$this->session->userdata('teacher_id'));
        // $this->db->where("(teacher_id=".$this->session->userdata('admin_id')." OR (teacher_id='NULL'))");
        // $this->db->join('presentation_topic','presentation_topic.topic_id = chapter_design.type_id AND chapter_design.type = 1','left');

        // $this->db->join('questions','questions.question_id = chapter_design.type_id AND chapter_design.type = 2','left');
        
        $this->db->join('admins','admins.admin_id=chapter_design.updated_by','left');
        $this->db->join('chapter_content_publish','chapter_content_publish.chapter_content_id=chapter_design.id','left');

        $this->db->from('chapter_design');
        $this->db->order_by('chapter_design.id','desc');
        $this->db->order_by('publish_status','desc');

        // $this->db->group_by('chapter_content_id');

        // $this->db->limit($limit,$offset);
        $query2 = $this->db->get();
        $result2 = $query2->result_array();
        $ids = "";
        if($result2){
             $arrayv = array();
            foreach ($result2 as $value) {
                $arrayv[] = $value['id'];
            }
                $ids =implode(',', $arrayv);
        }
       


        //  $this->db->select('response_enquiry_id');
        // $this->db->from('d_item_enquiry_reponse');
        // $this->db->where('response_vendor_id',$vid);
        // $where_clause = $this->db->get_compiled_select(); //print query as string
    $this->db->select('chapter_design.id, chapter_design.chapter_id, `type`, `type_id`, `status`, chapter_design.created_on, chapter_design.updated_on, chapter_design.updated_by, `presentation`, `topic_title`, `topic_color`, `topic_backgroundcolor`, `topic_backgroundimage`, `topic_type`, `topic_status`, `topic_bordercolor`, `topic_fontsize`, `topic_position_left`, `topic_position_top`, `topic_width`, `topic_height`, `topic_content_position_left`,publish_status, `topic_content_position_top`,admin_name,teacher_id');
        $this->db->where('chapter_design.chapter_id',$id);
        $this->db->where('chapter_design.status >',0);
        if($ids != ""){

                $this->db->where("pc_scr_chapter_design.id NOT IN ($ids)", NULL, FALSE);
        }
        // $this->db->where('teacher_id',$this->session->userdata('teacher_id'));
        // $this->db->where("(teacher_id=".$this->session->userdata('admin_id')." OR (teacher_id='NULL'))");
        // $this->db->join('presentation_topic','presentation_topic.topic_id = chapter_design.type_id AND chapter_design.type = 1','left');

        // $this->db->join('questions','questions.question_id = chapter_design.type_id AND chapter_design.type = 2','left');
        
        $this->db->join('admins','admins.admin_id=chapter_design.updated_by','left');
        $this->db->join('chapter_content_publish','chapter_content_publish.chapter_content_id=chapter_design.id','left');

        $this->db->from('chapter_design');
        $this->db->order_by('chapter_design.id','desc');
        $query = $this->db->get();
        $result = $query->result_array();
        $result = array_merge($result,$result2);
        $x=0;
        foreach ($result as $value) {
            $result[$x]['ttitle'] = strip_tags($value['topic_title']);
            if($value['type'] == 2){
                $type_id = $value['type_id'];
                $user_topic_id = $this->TeacherModel->get_user_topic($type_id);
            
                    if($user_topic_id == false){
                        $result[$x]['draft'] = 0;
                    }else{
                        $result[$x]['draft'] = 1;
                    }
                 
            }else{
                $result[$x]['draft'] = 0;
            }
            $x++;
        }

        return $result;
    }
     public function checkPublish($id){
        $this->db->where('publish_status >',0);
        $this->db->where('chapter_content_id',$id);
        $this->db->where('teacher_id',$this->session->userdata('teacher_id'));
        return $this->db->count_all_results('chapter_content_publish');
    }
      public function get_chapter($id){
      
        $this->db->where('status >',0);
        $this->db->where('id',$id);
        $result = $this->db->get('chapter_design')->row_array();
        // print_r($result);
        // $x = 0;
        // foreach ($result as $value) {
            $this->db->where('content_id',$result['id']);
            $this->db->where('teacher_id',$this->session->userdata('teacher_id'));
            $resultc = $this->db->get('chapter_content_title')->row_array();
            if($resultc){
                $result['topic_title'] = $resultc['title'];
            }
            // $x++;
        // }
        return $result;

    }


// 04/07/2020
public function chapter_content($id){
        

        $this->db->where('data_status >',0);
        $this->db->where('data_id',$id);
        $this->db->where('data_type','2');

        $result = $this->db->get('data')->row_array();
        //  $this->db->where('data_status >',0);
        // $this->db->where('data_id',$id);
        // $result = $this->db->get('data')->row_array();

        $this->db->where('status >',0);
        $this->db->where('chapter_id',$id);
        $results = $this->db->get('chapter_design')->result_array();
        $x = 0;
        foreach ($results as $value) {
            $this->db->where('content_id',$value['id']);
            $this->db->where('teacher_id',$this->session->userdata('teacher_id'));
            $resultc = $this->db->get('chapter_content_title')->row_array();
            if($resultc){
                $results[$x]['topic_title'] = $resultc['title'];
            }
            $x++;
        }

         $result['contents'] = $results;
        return $result;

    }
    
    public function update_chapter_title($id,$data){
        $this->db->where('content_id',$id);
        $count = $this->db->count_all_results('chapter_content_title');
        if($count == 0){
           
                    if($this->PresentationModel->add_data($data,'chapter_content_title')){
                        $this->session->set_flashdata('presentation_created',1);

                    }else{
                        $this->session->set_flashdata('presentation_created',2);

                    }
        }else{
            $this->db->where('content_id',$id);
            if($this->db->update('chapter_content_title',$data)) return true;
            return false;
        }
       
    }
    public function teacher_details(){
        $teacher = $this->session->userdata('teacher_id');
        $this->db->select('teachers.*,institutes.institute_name');
        $this->db->where('teacher_id',$teacher);
        $this->db->join('institutes','institutes.institute_id = teachers.institute_id','left');
        $this->db->from('teachers');
        return $this->db->get()->row_array();

    }
    public function teacher_subjects(){
        $teacher = $this->session->userdata('teacher_id');
        $this->db->select('data.data_name,teacher_subjects.subject_id, data.paper_icon,data.data_id');
        $this->db->from('teacher_subjects');
        $this->db->where('teacher_id',$teacher);
        $this->db->where('data.data_status',1);
        $this->db->join('data','data.data_id = teacher_subjects.subject_id','left');
        return $this->db->get()->result_array();
        
    }
    public function teacher_chapters(){
        $teacher = $this->session->userdata('teacher_id');
        $this->db->select('data.data_name,data.backgroundimage, data.chapter_thumbnail,data_id');
        $this->db->from('chapter_publish');
        $this->db->where('chapter_publish.teacher_id',$teacher);
        $this->db->where('chapter_publish.publish_status',1);
        $this->db->where('data.data_status',1);
        $this->db->join('data','data.data_id = chapter_publish.chapter_id','left');
        return $this->db->get()->result_array();
    }
    public function teacher_published_video(){
        $teacher = $this->session->userdata('teacher_id');
        $this->db->select('video.video_id,video.video_link,video.thumb_nail,video.video_title');
        $this->db->where('video.video_status',1);
        $this->db->where('chapter_design.type',1);
        $this->db->where('chapter_content_publish.teacher_id',$teacher);
        $this->db->where('chapter_content_publish.publish_status',1);
        $this->db->join('chapter_content_publish','chapter_content_publish.chapter_content_id = chapter_design.id','left');
        $this->db->join('video','video.video_id = chapter_design.type_id','left');
        $this->db->from('chapter_design');
        $query1 = $this->db->get();
        return $result1 = $query1->result_array();
    }
    public function institute_students($id){
        $this->db->select('*');
        $this->db->from('student');
        $this->db->where('institute_id',$id);
        return $this->db->get()->result_array();
        
    }
    
     public function get_user_topic($id){
        $this->db->select('topic_id');
        $this->db->where('topic_status >',0);
        $this->db->where('copy_topic',$id);
        $this->db->where('user_id',$this->session->userdata('teacher_id'));
        $result = $this->db->get('presentation_topic')->row_array();
       
        if($result['topic_id']){
            return $result['topic_id'];
        }else{
            return false;
        }
    }
    public function get_topic($id){
        
        $this->db->select('*');
        $this->db->where('topic_status >',0);
        $this->db->where('topic_id',$id);
        $result = $this->db->get('presentation_topic')->row_array();
            if($result['topic_backgroundimage'] != ""){
                    $word = "chapter";
                    $myimage = $result['topic_backgroundimage'];
                    // $path =  base_url().'uploads/background/';
                       
                    //   // Test if string contains the word 
                    // if(strpos($myimage, $word) !== false){
                    //       $path =  base_url().'uploads/';
                    // } 
                    $path ="";
                    $result['topic_backgroundimage'] = $path.$myimage;
            }

            $result['ttitle'] = strip_tags($result['topic_title']);
            $this->db->select('*');
            $this->db->where('topic_status >',0);
            $this->db->where('topic_parent',$id);
            $results = $this->db->get('presentation_topic')->result_array();
            $x =0;
            foreach ($results as $value) {
                if($value['topic_backgroundimage'] != ""){
                    $word = "chapter";
                    $myimage = $value['topic_backgroundimage'];
                    // $path =  base_url().'uploads/background/';
                       
                    //   // Test if string contains the word 
                    // if(strpos($myimage, $word) !== false){
                    //       $path =  base_url().'uploads/';
                    // } 
                    $path ="";
                    $results[$x]['topic_backgroundimage'] = $path.$myimage;
                }
                $results[$x]['ttitle'] = strip_tags($value['topic_title']);
                $x++;
            }
            $result['topics'] = $results;
            
        return $result;

    }
     public function chapter_content_view($id){
        

        
        $this->db->where('data_status >',0);
        $this->db->where('data_id',$id);
        $this->db->where('data_type','2');
        $result = $this->db->get('data')->row_array();


        //  $this->db->where('data_status >',0);
        // $this->db->where('data_id',$id);
        // $result = $this->db->get('data')->row_array();
        // $this->db->select('topic_id');
        $this->db->where('status >',0);
        $this->db->where('chapter_id',$id);
        $results = $this->db->get('chapter_design')->result_array();
        $x = 0;
        foreach ($results as $value) {


                $this->db->where('content_id',$value['id']);
                $this->db->where('teacher_id',$this->session->userdata('teacher_id'));
                $resultc = $this->db->get('chapter_content_title')->row_array();
                if($resultc){
                    $results[$x]['topic_title'] = $resultc['title'];
                }
            
            $type = $value['type'];
            $typeid = $value['type_id'];
            if($type =='1'){
                //vedio
                    $this->db->select('video_id,video_title,video_link');
                    $this->db->where('video_status',1);
                    $this->db->where('type','1');
                    $this->db->where('video_id',$typeid);
                    $vediolink = $this->db->get('video')->row_array();
                   

                $results[$x]['link'] = base_url().'uploads/video/'.$vediolink['video_link'];
            }
            else if($type =='2'){
                //presentation
                $utypeid = $this->get_user_topic($typeid);

                if($utypeid == ""){
                    $id  = $typeid;
                }else{
                    $id  = $utypeid;
                }
                $results[$x]['link'] = base_url().'presentation-slide-view/'.$id;

            }
            else if($type =='3'){
                //pdf
                    $this->db->select('video_id,video_title,video_link');
                    $this->db->where('video_status',1);
                    $this->db->where('type','2');
                    $this->db->where('video_id',$typeid);
                    $pdflink = $this->db->get('video')->row_array();
                    $results[$x]['link'] = base_url().'uploads/pdf/'.$pdflink['video_link'];
            } else if($type =='4'){
                //question
                    $results[$x]['link'] = base_url().'view-details/'.$typeid;

                
            } else if($type =='5'){
                //exercise
                    $results[$x]['link'] = base_url().'exercise-view/'.$typeid;

            }else if($type =='6'){
                //exercise
                    $results[$x]['link'] = base_url().'uploads/chapter/'.$value['image'];

            }

            $x++;
        }
        $result['contents'] = $results;
        return $result;

    }
    public function count_students($id){
        $this->db->where('status',1);
        $this->db->where('batch_id',$id);
        return $this->db->count_all_results('student');
    }

    public function list_students($id,$limit,$offset){
        $teacher = $this->session->userdata('teacher_id');
        $this->db->select('student.*,data.data_name as data_name');
        $this->db->where('student.batch_id',$id);
        $this->db->join('data','data.data_id=student.course_id','left');
        // $this->db->join('batch','batch.batch_id=student.batch_id','left');
        //$this->db->order_by('admins.updated_on','desc');
        $this->db->where('status',1);
        $this->db->limit($limit,$offset);
        return $this->db->get('student')->result_array();
    }
    public function dashboard_news($id){
        
        $this->db->where('news_status',1);
        $this->db->where('institute_id',$id);
        $this->db->order_by('news_date','desc');
        //$this->db->or_where('institute_id',0);
        return $this->db->get('news')->result_array();
    }
    public function subject_chapter($id){
        $this->db->select('*');
        $this->db->where('data_parent',$id);
        $this->db->where('data_status',1);
        return $this->db->get('data')->result_array();


    }
    public function batch_teacher_subjects(){
        $teacher = $this->session->userdata('teacher_id');
        $this->db->distinct('teacher_subjects.subject_id');
        $this->db->select('batch.*,data.data_name as course,b.data_name as subject,b.paper_icon,b.data_id,batch_teachers.id');
        $this->db->where('batch_teachers.teacher_id',$this->session->userdata('teacher_id'));
        $this->db->where('batch_teachers.institute_id',$this->session->userdata('institute_id'));
        $this->db->join('batch','batch.batch_id = batch_teachers.batch_id','left');
        $this->db->join('data','data.data_id=batch.course_id','left');
        $this->db->join('data b','b.data_id=batch_teachers.subject_id','left');
        $this->db->join('teacher_subjects c','c.subject_id=batch_teachers.subject_id and c.teacher_id = batch_teachers.teacher_id','left');
        //$this->db->group_by('batch_teachers.batch_id');
        $this->db->order_by('batch.batch_id','asc');
        $subject = $this->db->get('batch_teachers')->result_array();
        //print_r($subject);exit();
        if(!empty($subject)){
            foreach($subject as $key => $row){
                $this->db->select('data_id,data_name, data.updated_on, admin_name,data.updated_by ,chapter_publish.publish_status');
                $this->db->join('admins','admins.admin_id=data.updated_by','left');
                $this->db->join('chapter_publish','chapter_publish.chapter_id = data.data_id AND chapter_publish.teacher_id='.$teacher,'left');
                $this->db->where('data_status',1);
                $this->db->where('data_type',2);
                $this->db->where('data_parent',$row['data_id']);
                $chapter_count = $this->db->count_all_results('data');
                
                $chapter = $this->db->get('data')->result_array();
                //$chapter = $this->db->get('data')->result_array();
                $subject[$key]['chapter_count'] = $chapter_count;

                $this->db->select('data_id,data_name, data.updated_on, admin_name,data.updated_by ,chapter_publish.publish_status');
                $this->db->join('admins','admins.admin_id=data.updated_by','left');
                $this->db->join('chapter_publish','chapter_publish.chapter_id = data.data_id AND chapter_publish.teacher_id='.$teacher,'left');
                $this->db->where('data_status',1);
                $this->db->where('data_type',2);
                $this->db->where('chapter_publish.publish_status',1);
                $this->db->where('data_parent',$row['data_id']);
                $publish_count = $this->db->count_all_results('data');
                $subject[$key]['publish_count'] = $publish_count;
            }
        }
        //print_r($subject);exit();
        return $subject;

    }
    public function teacher_published_presentation(){
        $this->db->select('chapter_design.id, chapter_design.chapter_id, `type`, `type_id`, `status`, chapter_design.created_on, chapter_design.updated_on, chapter_design.updated_by, `presentation`,publish_status,admin_name,teacher_id,presentation_topic.topic_backgroundcolor as presentation_bg,chapter_design.topic_title,presentation_topic.backgroundimage,data.data_name,presentation_topic.topic_id,presentation_topic.content_slide');
       // $this->db->where('chapter_design.chapter_id',$id);
        $this->db->where('chapter_design.type',2);
        $this->db->where('chapter_design.status >',0);
        $this->db->where('chapter_content_publish.teacher_id',$this->session->userdata('teacher_id'));
        $this->db->where('chapter_content_publish.publish_status',1);
        $this->db->join('admins','admins.admin_id=chapter_design.updated_by','left');
        $this->db->join('chapter_content_publish','chapter_content_publish.chapter_content_id=chapter_design.id','left');
        $this->db->join('presentation_topic','presentation_topic.topic_id=chapter_design.type_id','left');
        $this->db->join('data','data.data_id=chapter_design.chapter_id','left');
        $this->db->from('chapter_design');
        $this->db->order_by('chapter_design.id','desc');
       // $this->db->order_by('publish_status','desc');

        // $this->db->group_by('chapter_content_id');

        // $this->db->limit($limit,$offset);
        $query2 = $this->db->get();
        $result2 = $query2->result_array();
        //print_r($result2);exit();
        return $result2;
    }
    public function publish_batch_subject(){
        $teacher = $this->session->userdata('teacher_id');
        $institute = $this->session->userdata('institute_id');
        $this->db->distinct();
        $this->db->select('batch.*,data_name');
        $this->db->where('batch_teachers.teacher_id',$this->session->userdata('teacher_id'));
        $this->db->join('batch','batch.batch_id = batch_teachers.batch_id','left');
        $this->db->join('data','data.data_id=batch.course_id','left');
        $batch =  $this->db->get('batch_teachers')->result_array();
        $ar = array();
        $bt =  array();
        $subject = array();
        foreach ($batch as $key => $value) {
            $bt[] = $value['batch_id'];
            
        }
        if(!empty($bt)){
        // $status = array(1,2);
        $where = '(ins_semester.publish_status=1 or ins_semester.publish_status = 2)';
        $this->db->select('sem_subject.subject_id,ins_semester.batch_id, ins_semester.institute_id');
        $this->db->where_in('ins_semester.batch_id',$bt);
        $this->db->where($where);
        // $this->db->where('ins_semester.publish_status',1);
        // $this->db->or_where('ins_semester.publish_status',2);
        $this->db->join('ins_semester','sem_subject.sem_id = ins_semester.sem_id','left');
        $publish =  $this->db->get('sem_subject')->result_array();
        if(!empty($publish)){
            foreach($publish as $key => $row){
                $ar[$key]['subject'] = $row['subject_id'];
                $ar[$key]['batch'] = $row['batch_id'];
                $ar[$key]['ins'] = $row['institute_id'];
            }
        }
        
        $subject = array();
        $where ='';
        if(!empty($ar)){
            foreach($ar as $key1 => $rw){
                
                if($where == '') {
                    $where .= '(batch_teachers.subject_id='.$rw['subject'].' and batch_teachers.batch_id = '.$rw['batch'].' and batch_teachers.institute_id = '.$institute.')';
                
                }
                else{
                    $where .= 'or (pc_scr_batch_teachers.subject_id='.$rw['subject'].' and pc_scr_batch_teachers.batch_id = '.$rw['batch'].' and pc_scr_batch_teachers.institute_id = '.$institute.')';
                }
            }
            if($where != ''){
                $this->db->where($where);
            }
        $this->db->distinct('batch_teachers.subject_id');
        $this->db->select('batch.*,data.data_name as course,b.data_name as subject,b.paper_icon,b.data_id,batch_teachers.id,batch_teachers.subject_id,b.data_name as sub_name');
        $this->db->where('batch_teachers.teacher_id',$this->session->userdata('teacher_id'));
        
        $this->db->join('batch','batch.batch_id = batch_teachers.batch_id','left');
        $this->db->join('data','data.data_id=batch.course_id','left');
        $this->db->join('data b','b.data_id=batch_teachers.subject_id','left');
        //$this->db->where_in('batch_teachers.subject_id',$ar);
        //$this->db->order_by('batch.batch_id','asc');

        //$this->db->get('batch_teachers');
        //echo $this->db->last_query();exit();
        $subject = $this->db->get('batch_teachers')->result_array();

        if(!empty($subject)){
            foreach($subject as $key => $row){
                $this->db->select('data_id,data_name, data.updated_on, admin_name,data.updated_by ,chapter_publish.publish_status');
                $this->db->join('admins','admins.admin_id=data.updated_by','left');
                $this->db->join('chapter_publish','chapter_publish.chapter_id = data.data_id AND chapter_publish.teacher_id='.$teacher,'left');
                $this->db->where('data_status',1);
                $this->db->where('data_type',2);
                $this->db->where('data_parent',$row['subject_id']);
                $chapter_count = $this->db->count_all_results('data');
                
                $chapter = $this->db->get('data')->result_array();
                //$chapter = $this->db->get('data')->result_array();
                $subject[$key]['chapter_count'] = $chapter_count;

                $this->db->select('data_id,data_name, data.updated_on, admin_name,data.updated_by ,chapter_publish.publish_status');
                $this->db->join('admins','admins.admin_id=data.updated_by','left');
                $this->db->join('chapter_publish','chapter_publish.chapter_id = data.data_id AND chapter_publish.teacher_id='.$teacher,'left');
                $this->db->where('data_status',1);
                $this->db->where('data_type',2);
                $this->db->where('chapter_publish.publish_status',1);
                $this->db->where('data_parent',$row['subject_id']);
                $publish_count = $this->db->count_all_results('data');
                $subject[$key]['publish_count'] = $publish_count;
            }
        }
        }
        }
        //print_r($subject);exit();
        return $subject;
        // $result = array(
        //     'batch' => $bt,
        //     'subject' => $ar
        //             );
        // return $result;

    }
    //17-12-2020
    public function count_invite_students($id){
        
        $this->db->where('batch_id',$id);
        $this->db->where('status !=',0);
        //$this->db->where('batch_teachers.teacher_id',$this->session->userdata('teacher_id'));
        return $this->db->count_all_results('invite_students');
    }

    public function list_invite_students($id,$limit,$offset){
        $this->db->select('*');
        // $this->db->join('data','data.data_id=batch_teachers.subject_id','left');
        // $this->db->join('admins','admins.admin_id=data.updated_by','left');
        //$this->db->where('batch_teachers.teacher_id',$this->session->userdata('teacher_id'));
        $this->db->where('batch_id',$id);
        $this->db->where('status !=',0);
        $this->db->order_by('invite_id','desc');
        $this->db->limit($limit,$offset);
        return $this->db->get('invite_students')->result_array();
    }
    public function update_student_invite($id,$data){  
            $this->db->where('invite_id',$id);
            if($this->db->update('invite_students',$data)){
                return 1;
            }
            else {return 0;}
    }
    public function get_invite_student($id){
        $fields = '*';
        $this->db->select($fields);
        $this->db->where('invite_id',$id);
        $this->db->from('invite_students');
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    public function get_batch($id){
        $this->db->where('batch_id',$id);
        return $this->db->get('batch')->row_array();
    }
}