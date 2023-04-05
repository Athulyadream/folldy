<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrincipalModel extends CI_Model {
	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
         $query = $this->db->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");


    }
    public function check_login($username,$password){
        $this->db->select('principal_id,role_id,principal_name,principal_status,principal_password,institute_id');
        $this->db->where('principal_phone',$username);
        //$this->db->or_where('admin_email',$username);
        $data = $this->db->get('principal')->row_array();
        if(!empty($data)){
            if(password_verify($password,$data['principal_password'])){
                if($data['principal_status']==1){
                    $out = array('status'=>1,'data'=>array('principal_name'=>$data['principal_name'],'principal_id'=>$data['principal_id'],'institute_id'=>$data['institute_id'],'role_id'=>$data['role_id']));
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
        $this->db->where('batch_principal.principal_id',$this->session->userdata('principal_id'));
        $this->db->join('batch','batch.batch_id = batch_principal.batch_id','left');
        $this->db->join('data','data.data_id=batch.course_id','left');
        return $this->db->count_all_results('batch_principal');
    }

    // public function list_batch($limit,$offset){
    //     $this->db->distinct();
    //     $this->db->select('batch.*,data_name');
    //     $this->db->where('batch_principal.principal_id',$this->session->userdata('principal_id'));
    //     $this->db->where('batch.institute_id',$this->session->userdata('institute_id'));
       
    //     $this->db->join('data','data.data_id=batch.course_id','left');
    //     $this->db->order_by('batch.batch_id','asc');
        
    //     $this->db->limit($limit,$offset);
    //     return $this->db->get('batch_principal')->result_array();
    // }

    public function batch_works(){
        $this->db->select('batch_id,batch_name,batch_periods');
        $this->db->from('batch');
        $this->db->where('batch.institute_id',$this->session->userdata('institute_id'));
        $this->db->where('batch.batch_status',1);
        $result = $this->db->get()->result_array();
        foreach($result as $key => $value){
            // $semester = $this->session->userdata('sem_id');
            // $subject = $this->session->userdata('sub_id');
            // if($filter['name']){
            //     $this->db->where('assignment_title LIKE','%'.$filter['name'].'%');
            // }
            $this->db->where('batch_id',$value['batch_id']);
            $this->db->where('assignment_status >',0);
            $count = $this->db->count_all_results('assignment');
            $result[$key]['count'] = $count;
        }
        // print_r($result);
        // die();
        return $result;
        
    }
    public function count_papers($id){
        
        $this->db->where('batch_principal.batch_id',$id);
        $this->db->where('batch_principal.principal_id',$this->session->userdata('principal_id'));
        return $this->db->count_all_results('batch_principal');
    }

    public function list_papers($id){
        $ar = array();
        $this->db->select('*');
        $this->db->where('principal_id',$this->session->userdata('principal_id'));
        $this->db->where('batch_id',$this->session->userdata('batch_id'));
        $this->db->where('status',1);
        $result1 =  $this->db->get('batch_principal')->result_array();
        foreach ($result1 as $key => $value) {
           $ar[] = $value['subject_id'];
        }
        $result = array();
        if(!empty($ar)){
            $this->db->select('data_id as id,data_name as name,paper_icon as icon,data.updated_on,IF(t.favourite_status, t.favourite_status, 2) as favourite_status');
            //$this->db->where('data_parent',$course);
            $this->db->where('data_status',1);
           
            $this->db->where('ins_semester.sem_id',$id);
            $this->db->where_in('sem_subject.subject_id',$ar);
            $this->db->from('ins_semester');
            $this->db->join('sem_subject','sem_subject.sem_id=ins_semester.sem_id','left');
            $this->db->join('data','data.data_id=sem_subject.subject_id','left');
            $this->db->join('principal_favourite_subject t','t.semester = sem_subject.sem_id AND t.subject_id = sem_subject.subject_id','left');
            $this->db->order_by('data.data_name','asc');
            $query = $this->db->get();
            $result = $query->result_array();

            foreach ($result as $key => $value) {
                if($value['icon'] != ''){
                    $result[$key]['icon'] = base_url().'uploads/paper_icon/'.$value['icon'];
                }
                else{
                    $result[$key]['icon'] = '';
                }
            }

            return $result;

            // $this->db->select('data_id,data_name, data.updated_on,admin_name');
            // $this->db->join('data','data.data_id=batch_principal.subject_id','left');
            // $this->db->join('admins','admins.admin_id=data.updated_by','left');
            // $this->db->where('batch_principal.batch_id',$id);
            // $this->db->where('batch_principal.principal_id',$this->session->userdata('principal_id'));
            // $this->db->order_by('batch_principal.id','desc');
            // $this->db->limit($limit,$offset);
            // return $this->db->get('batch_principal')->result_array();
        }
    }
    public function count_chapters($id){
        $this->db->where('data_status',1);
        $this->db->where('data_type',2);
        $this->db->where('data_parent',$id);
        return $this->db->count_all_results('data');
    }

    public function list_chapters($id,$limit,$offset){
        $principal = $this->session->userdata('principal_id');
        $this->db->select('data_id,data_name,data.updated_on,admin_name,data.updated_by ,chapter_publish.publish_status');
        $this->db->join('admins','admins.admin_id=data.updated_by','left');
        $this->db->join('chapter_publish','chapter_publish.chapter_id = data.data_id AND chapter_publish.principal_id='.$principal,'left');
        $this->db->where('data_status',1);
        $this->db->where('data_type',2);
        $this->db->where('data_parent',$id);
        $this->db->order_by('data_id','desc');
        $this->db->limit($limit,$offset);
        return $this->db->get('data')->result_array();
    }
    public function reset_password($cur_pass,$new_pass){
        //echo $this->session->userdata('principal_id');
        $this->db->select('*');
        $this->db->where('principal_id',$this->session->userdata('principal_id'));
        $data = $this->db->get('principal')->row_array();
        if(password_verify($cur_pass,$data['principal_password']))
        {
            $data = array(
                'principal_password'=>password_hash($new_pass,PASSWORD_DEFAULT),
                );
             $this->db->where('principal_id',$this->session->userdata('principal_id'));
             if($this->db->update('principal',$data)){
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
        $this->db->select('principal_id,principal_phone');
        $this->db->where('principal_phone',$username);
        $this->db->where('principal_status',1);
        //$this->db->or_where('admin_email',$username);
        $data = $this->db->get('principal')->row_array();

        return $data;
    }
    public function update_password($where,$update_data){
        if(!empty($where)){
            $this->db->where($where);
        }
        return $this->db->update('principal',$update_data);
    }
     public function add_data($data,$table){
        if($this->db->insert($table,$data)) {
        // echo $this->db->last_query();exit(); 
              return $this->db->insert_id();

        }
        else {return false;}
    }
    public function check_publish($principal,$chapter){
        $this->db->select('*');
        $this->db->where('principal_id',$principal);
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
        
        
        $this->db->select('chapter_design.id, chapter_design.chapter_id, `type`, `type_id`, `status`, chapter_design.created_on, chapter_design.updated_on, chapter_design.updated_by, `presentation`, `topic_title`, `topic_color`, `topic_backgroundcolor`, `topic_backgroundimage`, `topic_type`, `topic_status`, `topic_bordercolor`, `topic_fontsize`, `topic_position_left`, `topic_position_top`, `topic_width`, `topic_height`, `topic_content_position_left`,publish_status, `topic_content_position_top`,admin_name,principal_id');
        $this->db->where('chapter_design.chapter_id',$id);
        $this->db->where('chapter_design.status >',0);
        $this->db->where('principal_id',$this->session->userdata('principal_id'));
        // $this->db->where("(principal_id=".$this->session->userdata('admin_id')." OR (principal_id='NULL'))");
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
    $this->db->select('chapter_design.id, chapter_design.chapter_id, `type`, `type_id`, `status`, chapter_design.created_on, chapter_design.updated_on, chapter_design.updated_by, `presentation`, `topic_title`, `topic_color`, `topic_backgroundcolor`, `topic_backgroundimage`, `topic_type`, `topic_status`, `topic_bordercolor`, `topic_fontsize`, `topic_position_left`, `topic_position_top`, `topic_width`, `topic_height`, `topic_content_position_left`,publish_status, `topic_content_position_top`,admin_name,principal_id');
        $this->db->where('chapter_design.chapter_id',$id);
        $this->db->where('chapter_design.status >',0);
        if($ids != ""){

                $this->db->where("pc_scr_chapter_design.id NOT IN ($ids)", NULL, FALSE);
        }
        // $this->db->where('principal_id',$this->session->userdata('principal_id'));
        // $this->db->where("(principal_id=".$this->session->userdata('admin_id')." OR (principal_id='NULL'))");
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
             $subject = $this->PrincipalModel->get_chapter_subject($id);
             $type_id = $value['type_id'];
            if($value['type'] == 2){
                
               
                $user_topic_id = $this->PrincipalModel->get_user_topic($type_id,$subject);
                                if($user_topic_id == false){
                        $result[$x]['draft'] = 0;
                    }else{
                        $result[$x]['draft'] = 1;
                        $result[$x]['type_id'] = $user_topic_id;
                        
                    }
                 
            }else{
                $result[$x]['draft'] = 0;
            }
             if($value['type'] == 4){
                    $pr_id = $this->PrincipalModel->check_cloned_practice($type_id,$subject);
                    if($pr_id == 0 || $pr_id == ""){
                        $result[$x]['draft_practice'] = 0;
                    }else{
                        $result[$x]['draft_practice'] = 1;
                    }
             }else{
                    $result[$x]['draft_practice'] = 0;
             }
            $x++;
        }

        return $result;
    }
     public function checkPublish($id){
        $this->db->where('publish_status >',0);
        $this->db->where('chapter_content_id',$id);
        $this->db->where('principal_id',$this->session->userdata('principal_id'));
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
            $this->db->where('principal_id',$this->session->userdata('principal_id'));
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
            $this->db->where('principal_id',$this->session->userdata('principal_id'));
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
    public function principal_details(){
        $principal = $this->session->userdata('principal_id');
        $this->db->select('principal.*,institutes.institute_name');
        $this->db->where('principal_id',$principal);
        $this->db->join('institutes','institutes.institute_id = principal.institute_id','left');
        $this->db->from('principal');
        return $this->db->get()->row_array();

    }
    public function principal_subjects(){
        $principal = $this->session->userdata('principal_id');
        $this->db->select('data.data_name,principal_subjects.subject_id, data.paper_icon,data.data_id');
        $this->db->from('principal_subjects');
        $this->db->where('principal_id',$principal);
        $this->db->where('data.data_status',1);
        $this->db->join('data','data.data_id = principal_subjects.subject_id','left');
        return $this->db->get()->result_array();
        
    }
    public function principal_chapters(){
        $principal = $this->session->userdata('principal_id');
        $this->db->select('data.data_name,data.backgroundimage, data.chapter_thumbnail,data_id');
        $this->db->from('chapter_publish');
        $this->db->where('chapter_publish.principal_id',$principal);
        $this->db->where('chapter_publish.publish_status',1);
        $this->db->where('data.data_status',1);
        $this->db->join('data','data.data_id = chapter_publish.chapter_id','left');
        return $this->db->get()->result_array();
    }
    public function principal_published_video(){
        $principal = $this->session->userdata('principal_id');
        $this->db->select('video.video_id,video.video_link,video.thumb_nail,video.video_title');
        $this->db->where('video.video_status',1);
        $this->db->where('chapter_design.type',1);
        $this->db->where('chapter_content_publish.principal_id',$principal);
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
    
     public function get_user_topic($id,$subject){
         $principal = $this->session->userdata('principal_id');
         $semester = $this->session->userdata('sem_id');

         
        $this->db->select('cloned_id');
        $this->db->where('topic_id',$id);
        $this->db->where('principal_id',$principal);
        $this->db->where('semester',$semester);
        $this->db->where('subject',$subject);
        $result = $this->db->get('cloned_presentations')->row_array();
        if($result){
            return $result['cloned_id'];
        }else{
            return false;
        }

        // $this->db->select('topic_id');
        // $this->db->where('topic_status >',0);
        // $this->db->where('copy_topic',$id);
        // $this->db->where('user_id',$this->session->userdata('principal_id'));
        // $result = $this->db->get('presentation_topic')->row_array();
       
        // if($result['topic_id']){
        //     return $result['topic_id'];
        // }else{
        //     return false;
        // }
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
                $this->db->where('principal_id',$this->session->userdata('principal_id'));
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
                $subject = $this->PrincipalModel->get_chapter_subject($id);
                $utypeid = $this->get_user_topic($typeid,$subject);

                if($utypeid == 0){
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
        $principal = $this->session->userdata('principal_id');
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
    public function batch_principal_subjects(){
        $principal = $this->session->userdata('principal_id');
        $favourite = $this->get_favourite_subject();
        if(!empty($favourite)){
            $this->db->where_in('batch_principal.subject_id',$favourite);
          } 
        $this->db->distinct('principal_subjects.subject_id');
        $this->db->select('batch.*,data.data_name as course,b.data_name as subject,b.paper_icon,b.data_id,batch_principal.id');
        $this->db->where('batch_principal.principal_id',$this->session->userdata('principal_id'));
        $this->db->where('batch_principal.institute_id',$this->session->userdata('institute_id'));
        $this->db->join('batch','batch.batch_id = batch_principal.batch_id','left');
        $this->db->join('data','data.data_id=batch.course_id','left');
        $this->db->join('data b','b.data_id=batch_principal.subject_id','left');
        $this->db->join('principal_subjects c','c.subject_id=batch_principal.subject_id and c.principal_id = batch_principal.principal_id','left');
        //$this->db->group_by('batch_principal.batch_id');
        $this->db->order_by('batch.batch_id','asc');
        $subject = $this->db->get('batch_principal')->result_array();
        //print_r($subject);exit();
        if(!empty($subject)){
            foreach($subject as $key => $row){
                $this->db->select('data_id,data_name, data.updated_on, admin_name,data.updated_by ,chapter_publish.publish_status');
                $this->db->join('admins','admins.admin_id=data.updated_by','left');
                $this->db->join('chapter_publish','chapter_publish.chapter_id = data.data_id AND chapter_publish.principal_id='.$principal,'left');
                $this->db->where('data_status',1);
                $this->db->where('data_type',2);
                $this->db->where('data_parent',$row['data_id']);
                $chapter_count = $this->db->count_all_results('data');
                
                $chapter = $this->db->get('data')->result_array();
                //$chapter = $this->db->get('data')->result_array();
                $subject[$key]['chapter_count'] = $chapter_count;

                $this->db->select('data_id,data_name, data.updated_on, admin_name,data.updated_by ,chapter_publish.publish_status');
                $this->db->join('admins','admins.admin_id=data.updated_by','left');
                $this->db->join('chapter_publish','chapter_publish.chapter_id = data.data_id AND chapter_publish.principal_id='.$principal,'left');
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
    public function principal_published_presentation(){
        $this->db->select('chapter_design.id, chapter_design.chapter_id, `type`, `type_id`, `status`, chapter_design.created_on, chapter_design.updated_on, chapter_design.updated_by, `presentation`,publish_status,admin_name,principal_id,presentation_topic.topic_backgroundcolor as presentation_bg,chapter_design.topic_title,presentation_topic.backgroundimage,data.data_name,presentation_topic.topic_id,presentation_topic.content_slide');
       // $this->db->where('chapter_design.chapter_id',$id);
        $this->db->where('chapter_design.type',2);
        $this->db->where('chapter_design.status >',0);
        $this->db->where('chapter_content_publish.principal_id',$this->session->userdata('principal_id'));
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
        $principal = $this->session->userdata('principal_id');
        $institute = $this->session->userdata('institute_id');
        $favourite = $this->get_favourite_subject();
        $this->db->distinct();
        $this->db->select('batch.*,data_name');
        $this->db->where('batch_principal.principal_id',$this->session->userdata('principal_id'));
        $this->db->join('batch','batch.batch_id = batch_principal.batch_id','left');
        $this->db->join('data','data.data_id=batch.course_id','left');
        $batch =  $this->db->get('batch_principal')->result_array();
        $ar = array();
        $bt =  array();
        $subject = array();
        foreach ($batch as $key => $value) {
            $bt[] = $value['batch_id'];
            
        }
        if(!empty($bt)){
        // $status = array(1,2);
        $where = '(ins_semester.publish_status=1 or ins_semester.publish_status = 2)';
        if(!empty($favourite)){
            $this->db->where_in('sem_subject.subject_id',$favourite);
          }
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
                    $where .= '(batch_principal.subject_id='.$rw['subject'].' and batch_principal.batch_id = '.$rw['batch'].' and batch_principal.institute_id = '.$institute.')';
                
                }
                else{
                    $where .= 'or (pc_scr_batch_principal.subject_id='.$rw['subject'].' and pc_scr_batch_principal.batch_id = '.$rw['batch'].' and pc_scr_batch_principal.institute_id = '.$institute.')';
                }
            }
            if($where != ''){
                $this->db->where($where);
            }
        $this->db->distinct('batch_principal.subject_id');
        $this->db->select('batch.*,data.data_name as course,b.data_name as subject,b.paper_icon,b.data_id,batch_principal.id,batch_principal.subject_id,b.data_name as sub_name');
        $this->db->where('batch_principal.principal_id',$this->session->userdata('principal_id'));
        
        $this->db->join('batch','batch.batch_id = batch_principal.batch_id','left');
        $this->db->join('data','data.data_id=batch.course_id','left');
        $this->db->join('data b','b.data_id=batch_principal.subject_id','left');
        //$this->db->where_in('batch_principal.subject_id',$ar);
        //$this->db->order_by('batch.batch_id','asc');

        //$this->db->get('batch_principal');
        //echo $this->db->last_query();exit();
        $subject = $this->db->get('batch_principal')->result_array();

        if(!empty($subject)){
            foreach($subject as $key => $row){
                $this->db->select('data_id,data_name, data.updated_on, admin_name,data.updated_by ,chapter_publish.publish_status');
                $this->db->join('admins','admins.admin_id=data.updated_by','left');
                $this->db->join('chapter_publish','chapter_publish.chapter_id = data.data_id AND chapter_publish.principal_id='.$principal,'left');
                $this->db->where('data_status',1);
                $this->db->where('data_type',2);
                $this->db->where('data_parent',$row['subject_id']);
                $chapter_count = $this->db->count_all_results('data');
                
                $chapter = $this->db->get('data')->result_array();
                //$chapter = $this->db->get('data')->result_array();
                $subject[$key]['chapter_count'] = $chapter_count;

                $this->db->select('data_id,data_name, data.updated_on, admin_name,data.updated_by ,chapter_publish.publish_status');
                $this->db->join('admins','admins.admin_id=data.updated_by','left');
                $this->db->join('chapter_publish','chapter_publish.chapter_id = data.data_id AND chapter_publish.principal_id='.$principal,'left');
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
        //$this->db->where('batch_principal.principal_id',$this->session->userdata('principal_id'));
        return $this->db->count_all_results('invite_students');
    }

    public function list_invite_students($id,$limit,$offset){
        $this->db->select('*');
        // $this->db->join('data','data.data_id=batch_principal.subject_id','left');
        // $this->db->join('admins','admins.admin_id=data.updated_by','left');
        //$this->db->where('batch_principal.principal_id',$this->session->userdata('principal_id'));
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
    public function list_semester($batch){
        $status =array(1,2,0);
        $this->db->select('sem_id as semester_id,sem_name as semester_name,publish_status,semester_start_date,semester_end_date');
        $this->db->where('ins_semester.batch_id',$batch);
        $this->db->where_in('ins_semester.publish_status',$status);
        $this->db->from('ins_semester');
        $query = $this->db->get();
        $result = $query->result_array();
        // foreach ($result as $key => $value) {
        //     $sem_subjects = $this->get_semester_subject($batch,$value['semester_id']);
        //     $result[$key]['subjects'] =  $sem_subjects;
        // }
        return $result;
    }
    public function remove_favourite($data,$where){
         $this->db->where($where);
            if($this->db->update('principal_favourite_subject',$data)){
                return 1;
            }
            else {return 0;}
    }
    public function subject_already_exist($where){
            $this->db->where($where);
            $this->db->select('*');
            $this->db->from('principal_favourite_subject');
            $query = $this->db->get();
            $result = $query->row_array();
            return  $result;
    }
    //athulay 06/01/2021

     public function get_chapter_subject($chapter){
        $this->db->select('data_parent');
        $this->db->where('data_id',$chapter);
        $this->db->where('data_status',1);
        $this->db->where('data_type',2);
        $this->db->from('data');
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['data_parent'];
    }
     public function check_cloned_practice($id,$subject){
         $principal = $this->session->userdata('principal_id');
         $semester = $this->session->userdata('sem_id');
        $this->db->select('id');
        $this->db->where('practice_id',$id);
        $this->db->where('principal_id',$principal);
        $this->db->where('semester',$semester);
        $this->db->where('subject',$subject);
        $result = $this->db->get('cloned_practice')->row_array();
        if($result['id']){
            return $result['id'];
        }else{
            return 0;
        }
    }
    public function get_favourite_subject(){
       $fav = array();
        $this->db->select('a.subject_id, data.data_name,ins_semester.sem_name as semester_name,ins_semester.sem_id as semester_id, data.paper_icon, data.data_id,a.batch_id');
        $this->db->from('principal_favourite_subject a');
        $this->db->join('data','data.data_id = a.subject_id','left');
        $this->db->join('ins_semester','ins_semester.sem_id = a.semester','left');
        $this->db->where('a.principal_id',$this->session->userdata('principal_id'));
        $this->db->where('a.favourite_status',1);
        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $key => $value) {
            $fav[] = $value['subject_id'];
        }

        return $fav;

    }
    public function principal_time_table($batch,$i){
        
        $this->db->select('*');
        $this->db->where('batch_id',$batch);
        $this->db->where('weekdays',$i);
         $this->db->where('principal_id',$this->session->userdata('principal_id'));
        $this->db->from('time_table');
        $query = $this->db->get();
        //echo $this->db->last_query();
         $result = $query->result_array();
         if(!empty($result)){
            return $result;
         }
         else{
            return false;
         }


    }
    public function get_week(){
        $this->db->select('*');
        $this->db->from('week_days');
        $query = $this->db->get();
        return $result = $query->result_array();

    }
    public function get_course_students_subject($id,$semester){
        $this->db->select('data_parent');
        $this->db->where('data_id',$id);
        $this->db->where('data_status',1);
        $this->db->where('data_type',1);
        $this->db->from('data');
        $query = $this->db->get();
        $result = $query->row_array();
        $courseid =  $result['data_parent'];

        $this->db->select('ins_semester.batch_id');
        $this->db->where('ins_semester.sem_id',$semester);
        $this->db->where('ins_semester.publish_status !=',3);
        $this->db->from('ins_semester');
        $sem_query = $this->db->get();
        $sem_result = $sem_query->row_array();
        $batch =  $sem_result['batch_id'];




        $fields = 'fcm,id';
        $this->db->select($fields);
        $this->db->where('batch_id',$batch);
        $this->db->from('student');
        $query2 = $this->db->get();
        return $result2 = $query2->result_array();

    }
      public function get_chapter_details($chapter){
        $this->db->select('data_id as chapter_id,data_name as chapter_name,chapter_thumbnail,backgroundimage,data_parent');
        $this->db->where('data_id',$chapter);
        $this->db->where('data_status',1);
        $this->db->where('data_type',2);
        $this->db->from('data');
        $query = $this->db->get();
        //echo $this->db->last_query();exit();
        return $result = $query->row_array();

    }
    public function get_topic_images($id){
                $fields = ' `image`, `image_height`, `image_width`, `image_position_left`, `image_position_top`';
                $this->db->select($fields);
                $this->db->where('image_topic_id',$id);
                $this->db->from('presentation_topic_images');
                $query2 = $this->db->get();
                $result2 = $query2->result_array();
                return $result2;
    }

    ////////***********************************************/////////////////////////////////
    ///  Additional 2021 Athulya


     function insert_log($action,$user_id='',$user=0) {
        $CI = & get_instance();
        $CI->load->library('user_agent');
        if ($CI->agent->is_browser())
        {
            $agent = $CI->agent->browser().' '.$CI->agent->version();
        }
        elseif ($CI->agent->is_robot())
        {
            $agent = $CI->agent->robot();
        }
        elseif ($CI->agent->is_mobile())
        {
            $agent = $CI->agent->mobile();
        }
        else
        {
            $agent = 'Unidentified User Agent';
        }
        $platform = $CI->agent->platform();

         $data = array(
                'action' =>$action , 
                'agent' =>$agent , 
                'platform' =>$platform , 
                'IP' =>$CI->input->ip_address() ,
                'type'=>$user,  
                'session' =>session_id() , 
                'date' =>date('Y-m-d H:i:s') , 
                'username' =>$user_id , 
            );

        $this->db->insert('pc_scr_logs', $data);

        $this->db->last_query();

    }


       public function list_assignment($limit,$offset,$filter){
        // print_r($this->session->userdata('admin_role'));
        // die();

        $semester = $this->session->userdata('sem_id');
        $subject = $this->session->userdata('sub_id');

        if($filter['name']){
            $this->db->where('assignment_title LIKE','%'.$filter['name'].'%');
        }
        $this->db->where('assignment_status >',0);
        $this->db->where('semester',$semester);
        $this->db->where('subject',$subject);
        $this->db->where('created_by',$this->session->userdata('principal_id'));
        // $this->db->limit($limit,$offset);
        $result = $this->db->get('assignment')->result_array();
        return $result;
        
    }
    public function count_assignment($filter){
        $semester = $this->session->userdata('sem_id');
        $subject = $this->session->userdata('sub_id');
        if($filter['name']){
            $this->db->where('assignment_title LIKE','%'.$filter['name'].'%');
        }
        $this->db->where('semester',$semester);
        $this->db->where('subject',$subject);
        $this->db->where('updated_by',$this->session->userdata('principal_id'));
        $this->db->where('assignment_status >',0);
        return $this->db->count_all_results('assignment');        
    }
    public function check_title($title){
        $this->db->where('assignment_title',$title);
        $this->db->where('assignment_status >',0);
        return $this->db->count_all_results('assignment');
         // $this->db->get('presentation')->result_array();
    }
    public function get_assignment($id){
        $this->db->where('assignment_id',$id);
        $this->db->where('assignment_status >',0);
        $result  =  $this->db->get('assignment')->row_array();
        return $result;

    }
    public function edit_assignment($id,$data){
        $this->db->where('assignment_id',$id);
        if($this->db->update('assignment',$data)) return true;
        return false;
    }

     public function list_assignment_students($semester,$subject){
        $principal = $this->session->userdata('principal_id');

        $this->db->select('sem_subject.batch_id');
        $this->db->where('sem_id',$semester);
        $this->db->where('subject_id',$subject);
        $batch_stu =  $this->db->get('sem_subject')->row_array();
        $batch =  $batch_stu['batch_id'];

        $this->db->select('student.*');
        $this->db->where('student.batch_id',$batch);
        // $this->db->join('data','data.data_id=student.course_id','left');
        $this->db->where('status',1);
        // $this->db->limit($limit,$offset);
        return $this->db->get('student')->result_array();
    }
     public function assignment_student_view($id,$studentid){
        $principal = $this->session->userdata('principal_id');
        $this->db->select('*');
        $this->db->where('assignment_id',$id);
        $this->db->where('user_id',$studentid);
        $this->db->where('status',1);
        return $this->db->get('assignment_submit')->result_array();
    }

    public function update_assignment_marks($data,$id){
        $this->db->where('marks_id',$id);
        if($this->db->update('assignment_marks',$data)) return true;
        else return false;
    }

    
    public function check_student_marks($student_id,$assignment_id){
        $this->db->where('assignment_id',$assignment_id);
        $this->db->where('student_id',$student_id);
        $result  =  $this->db->get('assignment_marks')->row_array();
        return $result;

    }
    public function edit_assignment_submit($aid,$sid,$data){
        $this->db->where('assignment_id',$aid);
        $this->db->where('user_id',$sid);
        if($this->db->update('assignment_submit',$data)) return true;
        return false;
    }

     public function count_chapters_semester($id){
        $this->db->where('data_status',1);
        $this->db->where('data_type',2);
        $this->db->where('data_parent',$id);
        return $this->db->count_all_results('data');
    }

    public function list_chapters_semester(){
        $principal = $this->session->userdata('principal_id');
        $semester = $this->session->userdata('sem_id');
        $subject = $this->session->userdata('paper_id');


        $this->db->select('data_id,data_name,data.updated_on,admin_name,data.updated_by,start_date,end_date,chapter_plan.id ');
        $this->db->join('admins','admins.admin_id=data.updated_by ','left');
        // $this->db->join('chapter_publish','chapter_publish.chapter_id = data.data_id AND chapter_publish.principal_id='.$principal,'left');
          $this->db->join('chapter_plan','chapter_plan.chapter = data.data_id','left');
        $this->db->where('data_status',1);
        $this->db->where('data_type',2);
        $this->db->where('data_parent',$subject);
        $this->db->where("(semester ='$semester' OR semester is NULL)");
        $this->db->where("(subject ='$subject' OR subject is NULL)");
        $this->db->where("(principal ='$principal' OR principal is NULL)" );
        $this->db->order_by('data_id','desc');
        // $this->db->limit($limit,$offset);
        return $this->db->get('data')->result_array();
    }

public function get_semester_data($semester){
    $this->db->select('ins_semester.batch_id,semester_start_date,semester_end_date');
        $this->db->where('ins_semester.sem_id',$semester);
        $this->db->where('ins_semester.publish_status !=',3);
        $this->db->from('ins_semester');
        $sem_query = $this->db->get();
        $sem_result = $sem_query->row_array();
        return $sem_result;
   }

    public function check_exiry_date($where){
        $this->db->where($where);
        $query = $this->db->get('chapter_plan');
        //echo $this->db->last_query();
        return $query->row_array();
    }
    public function update_expiry_date($data,$id){
        $this->db->where('id ',$id);
        if($this->db->update('chapter_plan',$data)) return true;
        else return false;
    }



    public function count_content_plan($id){
        $this->db->where('status >',0);
        $this->db->where('chapter_id',$id);
        return $this->db->count_all_results('chapter_design');
    }

    public function list_content_plan($id,$limit,$offset){
        
        
        $this->db->select('semester_plan.id as semplanid,chapter_design.id, chapter_design.chapter_id, `type`, `type_id`, `status`, chapter_design.created_on, chapter_design.updated_on, chapter_design.updated_by, `presentation`, `topic_title`, `topic_color`, `topic_backgroundcolor`, `topic_backgroundimage`, `topic_type`, `topic_status`, `topic_bordercolor`, `topic_fontsize`, `topic_position_left`, `topic_position_top`, `topic_width`, `topic_height`, `topic_content_position_left`,publish_status, `topic_content_position_top`,admin_name,principal_id,content_start_date,content_end_date');
        $this->db->where('chapter_design.chapter_id',$id);
        $this->db->where('chapter_design.status >',0);
        // $this->db->where('principal_id',$this->session->userdata('principal_id'));
        // $this->db->where("(principal_id=".$this->session->userdata('admin_id')." OR (principal_id='NULL'))");
        // $this->db->join('presentation_topic','presentation_topic.topic_id = chapter_design.type_id AND chapter_design.type = 1','left');

        // $this->db->join('questions','questions.question_id = chapter_design.type_id AND chapter_design.type = 2','left');
        $this->db->join('semester_plan','semester_plan.content_id=chapter_design.id','left');
        $this->db->join('admins','admins.admin_id=chapter_design.updated_by','left');
        $this->db->join('chapter_content_publish','chapter_content_publish.chapter_content_id=chapter_design.id','left');

        $this->db->from('chapter_design');
        $this->db->order_by('chapter_design.id','desc');
        $this->db->order_by('publish_status','desc');

        // $this->db->group_by('chapter_content_id');

        // $this->db->limit($limit,$offset);
        $query2 = $this->db->get();
        $result2 = $query2->result_array();








         $this->db->select('semester_plan.id as semplanid,content,content_start_date,content_end_date');
        $this->db->where('semester_plan.chapter',$id);
        $this->db->where('semester_plan.content_id',0);

        $this->db->where('semester_plan.principal',$this->session->userdata('principal_id'));
        $this->db->where('semester_plan.content_plan_status !=',3);
        $this->db->from('semester_plan');
        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $key => $value) {
            $result[$key]['type'] = "0";
            $result[$key]['id'] = "0";
            $result[$key]['topic_title'] = $value['content'];
        }
        // print_r($result);
        // die();
        $result = array_merge($result,$result2);












        // if($result2){
        //      $arrayv = array();
        //     foreach ($result2 as $value) {
        //         $arrayv[] = $value['id'];
        //     }
        //         $ids =implode(',', $arrayv);
        // }
       


        //  $this->db->select('response_enquiry_id');
        // $this->db->from('d_item_enquiry_reponse');
        // $this->db->where('response_vendor_id',$vid);
        // $where_clause = $this->db->get_compiled_select(); //print query as string
    // $this->db->select('semester_plan.id as semplanid,chapter_design.id, chapter_design.chapter_id, `type`, `type_id`, `status`, chapter_design.created_on, chapter_design.updated_on, chapter_design.updated_by, `presentation`, `topic_title`, `topic_color`, `topic_backgroundcolor`, `topic_backgroundimage`, `topic_type`, `topic_status`, `topic_bordercolor`, `topic_fontsize`, `topic_position_left`, `topic_position_top`, `topic_width`, `topic_height`, `topic_content_position_left`,publish_status, `topic_content_position_top`,admin_name,principal_id,content_start_date,content_end_date');
    //     $this->db->where('chapter_design.chapter_id',$id);
    //     $this->db->where('chapter_design.status >',0);
    //     if($ids != ""){

    //             $this->db->where("pc_scr_chapter_design.id NOT IN ($ids)", NULL, FALSE);
    //     }
   
    //     $this->db->join('semester_plan','semester_plan.content_id=chapter_design.id','left');
        
    //     $this->db->join('admins','admins.admin_id=chapter_design.updated_by','left');
    //     $this->db->join('chapter_content_publish','chapter_content_publish.chapter_content_id=chapter_design.id','left');

    //     $this->db->from('chapter_design');
    //     $this->db->order_by('chapter_design.id','desc');
    //     $query = $this->db->get();
    //     $result = $query->result_array();
    //     $result = array_merge($result,$result2);
        $x=0;
        foreach ($result as $value) {
            $result[$x]['ttitle'] = strip_tags($value['topic_title']);
            // if($value['type']){
            //         $result[$x]['type'] = "";
            // }

          
            $x++;
        }

        return $result;
    }
    public function check_exiry_date_content($where){
        $this->db->where($where);
        $query = $this->db->get('semester_plan');
        //echo $this->db->last_query();
        return $query->row_array();
    }
     public function update_expiry_date_content($data,$id){
        $this->db->where('id ',$id);
        if($this->db->update('semester_plan',$data)) return true;
        else return false;
    }

}
