<?php
class Api_student extends CI_Model {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();        
    }
    function check_version($version,$platform){
        $this->db->select('*');
        $this->db->where('platform',$platform);
        $this->db->where('version <=',$version);
        $this->db->from('pc_scr_version');
        $query=$this->db->get();
        $result=$query->row_array();
        //$this->db->last_query();exit();
        if($result){
            return array('status'=>1);
        }
        else{
            return array('status'=>0);
        }
    }
    function getDatas($id){

       $fields = 'id as userid,session_value as session,institutes.institute_name as school_name, institutes.name_abbreviation as abbreviation';
        $this->db->select($fields);
        //$this->db->where('status',1);
        $this->db->where('id',$id);
        $this->db->join('institutes','institutes.institute_id=student.institute_id','left');
        $this->db->from('student');
        $query = $this->db->get();
        $result = $query->row_array();
        //echo $this->db->last_query();exit();
        return $result;
    }
    function getDatas_login($phone,$password){

        $fields = '*';
        $this->db->select($fields);
        $this->db->where('status',1);
        $this->db->where('phone',$phone);
        $this->db->from('pc_scr_student');
        $query = $this->db->get();
        $data = $query->row_array();

        if(!empty($data)){
            if(password_verify($password,$data['password'])){
                $result = $data;
            }
            else{
               $result = "";
            }
        }
        else{
            $result = "";
        }
        return $result;
    }
    public function update_data_by_phone($data,$phone)
    {
        $this->db->where('phone', $phone);
        $this->db->update('pc_scr_student', $data);
        if ($this->db->affected_rows() > 0) 
        {  
            return true;
        }
    }
     function update_student_details($update_data,$id){
              
        $this->db->where('id',$id);
        if($this->db->update('pc_scr_student',$update_data)){
          
            return 1;
        }
        else{
            return 0;
        }              
    }
    public function check_session($id,$session){
        
        $this->db->select('*');
        $this->db->where('id',$id);
        $this->db->where('session_value',$session);
        $this->db->from('pc_scr_student');
        $query = $this->db->get();
        $result = $query->row_array();
        
        if($result){
            return array('status'=>1);
        } 
        else{
            return array('status'=>0);
        }
    }
    function logout_student($id) {
        
        $data =  array('session_value' => "");
        //$this->db->where('status',1);
        $this->db->where('id',$id);
        if($this->db->update('pc_scr_student',$data))
        {
            
            return true;
        }
        else{
            return false;
        }
        
   
    }
    // public function check_session($id,$session){
    //     $this->db->select('*');
    //     $this->db->where('id',$id);
    //     $this->db->where('session_value',$session);
    //     $this->db->from('student');
    //     $query = $this->db->get();
    //     $result = $query->row_array();
        
    //     //echo $this->db->last_query();exit();

    //     if($result){
    //         return array('status'=>1);
    //     } 
    //     else{
    //         return array('status'=>0);
    //     }
    // }
    public function get_student_details($id){
         $fields = 'id as userid,session_value as session';
        $this->db->select($fields);
        //$this->db->where('status',1);
        $this->db->where('id',$id);
        $this->db->from('pc_scr_student');
        $query = $this->db->get();
        $result = $query->row_array();
        //echo $this->db->last_query();exit();
        return $result;
    }
    public function get_student_by_phone($phone){
        $fields = '*';
        $this->db->select($fields);
        $this->db->where('phone',$phone);
        $this->db->where('status',1);
        $this->db->from('pc_scr_student');
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    function update_student($where,$update_data){
        if(!empty($where)){
            $this->db->where($where);
        }
        return $this->db->update('student',$update_data);
    }
    public function getProfileDetails($id){
        $fields = 'name,email_id,phone,dob,gender,address,batch_name,institute_name,name_abbreviation as abbreviation';
        $this->db->select($fields);
        $this->db->where('id',$id);
        $this->db->from('student');
        $this->db->join('batch','batch.batch_id = student.batch_id','left');
        $this->db->join('institutes','institutes.institute_id = student.institute_id','left');
        $query = $this->db->get();
        $result = $query->row_array();

        if($result['dob'] != '0000-00-00'){
            $result['dob'] = date('d/m/Y',strtotime($result['dob']));
        }
        else{
            $result['dob'] = '';
        }
        if($result['gender'] == 1){
            $result['gender'] = 'Male';
        }
        elseif($result['gender'] == 2){
            $result['gender'] = 'Female';
        }
        else{
            $result['gender'] = 'Other';
        }

        return $result;
    }
    public function get_student_by_id($id){
        $fields = '*';
        $this->db->select($fields);
        $this->db->where('id',$id);
        $this->db->from('student');
        $query = $this->db->get();
        return $result = $query->row_array();
    }
    public function today_timetable($batch){
        $day = date('w');
        $this->db->select('subject');
        $this->db->where('batch_id',$batch);
        $this->db->where('weekdays',$day);
        $this->db->from('time_table');
        $query = $this->db->get();
        return $result = $query->result_array();


    }
    public function get_subject($course){
        $this->db->select('data_id as id,data_name as name,paper_icon as icon');
        $this->db->where('data_parent',$course);
        $this->db->where('data_status',1);
        $this->db->where('data_type',1);
       
        $this->db->from('data');
        $query = $this->db->get();
        //echo $this->db->last_query();exit();
        $result = $query->result_array();

        foreach ($result as $key => $value) {
            if($value['icon'] != ''){
                $result[$key]['icon'] = base_url().'uploads/paper_icon/'.$value['icon'];
            }
            else{
                $result[$key]['icon'] = '';
            }
        }

        return $result ;

    }
    public function get_news($institute){
        $this->db->select('news_heading as title,news_description as body,news_image as img,institute_id as institute');
        $this->db->where('news_status',1);
        $this->db->where('institute_id',$institute);
        $this->db->or_where('institute_id',0);
        $this->db->order_by('news_date','desc');
        $this->db->from('news');
        $query= $this->db->get();
        return $result = $query->result_array();
    }
    public function get_events($institute){
        $this->db->select('event_title as title,event_date as date ,event_image as image');
        $this->db->where('event_status',1);
        $this->db->where('institute_id',$institute);
        $this->db->where('event_date >=',date('Y-m-d'));
        $this->db->order_by('event_date','asc');
        $this->db->from('event');
        $query= $this->db->get();
        return $result = $query->result_array();
    }
    public function get_timetable($batch,$i){
        
        $this->db->select('*');
        $this->db->where('batch_id',$batch);
        $this->db->where('weekdays',$i);
        $this->db->from('time_table');
        $query = $this->db->get();
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
    public function get_chapter_list($subject,$teacher){
        $this->db->select('data_id as chapter_id,data_name as chapter_name');
        $this->db->join('chapter_publish','chapter_publish.chapter_id = data.data_id AND chapter_publish.teacher_id ='.$teacher,'left');
        $this->db->where('chapter_publish.publish_status',1);
        $this->db->where('data_parent',$subject);
        $this->db->where('data_status',1);
        $this->db->where('data_type',2);
        $this->db->from('data');
        $query = $this->db->get();
        //echo $this->db->last_query();exit();
        return $result = $query->result_array();

    }

    public function get_chapter_details($chapter,$teacher){
        $this->db->select('chapter_design.id as part_id,chapter_design.type,chapter_design.topic_title ,chapter_design.chapter_id,video.thumb_nail,chapter_design.image');

        $this->db->where('chapter_design.chapter_id',$chapter);
        //$this->db->where('chapter_design.type !=',4);
        $this->db->join('chapter_content_publish','chapter_content_publish.chapter_content_id = chapter_design.id AND chapter_content_publish.teacher_id ='.$teacher,'left');
        $this->db->where('chapter_content_publish.publish_status',1);
        $this->db->where('chapter_design.status',1);
        $this->db->join('video','video.video_id = chapter_design.type_id AND chapter_design.type = 1','left');
        $this->db->from('chapter_design');
        $query = $this->db->get();
        $result = $query->result_array();
        foreach($result as $key => $value){
            $title = $this->teacher_topic_title($value['part_id'],$teacher);
            if($title){
                $result[$key]['topic_title'] = $title;
            }
            $result[$key]['topic_title'] = strip_tags( $result[$key]['topic_title']);
        }
        return $result;

    }
    public function get_chapter_part($part,$id){
        $this->db->select('chapter_design.id as part_id,type,type_id,chapter_content_publish.teacher_id,chapter_design.chapter_id,chapter_design.image,chapter_design.topic_title');
        $this->db->where('chapter_design.id',$part);
        $this->db->join('chapter_content_publish','chapter_content_publish.chapter_content_id = chapter_design.id','left');
        $this->db->from('chapter_design');
        $query = $this->db->get();
        $result = $query->row_array();
        //print_r($result);

        $subject = $this->get_chapter_subject($result['chapter_id']);
        $teacher = $this->get_subject_teacher($subject,$id);
        $title = $this->teacher_topic_title($part,$teacher);

        if($result['type'] == 1){
            $this->db->select('chapter_design.id as part_id,chapter_design.type,chapter_design.topic_title,video.video_link as content,chapter_design.type_id,video.thumb_nail');
            $this->db->where('chapter_design.id',$part);
            $this->db->join('video','video.video_id = chapter_design.type_id','left');
            $this->db->from('chapter_design');
            $query1 = $this->db->get();
            $result1 = $query1->row_array();
            if($title){
                $result1['topic_title'] = $title;
            }
           $result1['topic_title'] = strip_tags($result1['topic_title']);

            return $result1;
        }
        elseif($result['type'] == 2){
            $this->db->select('chapter_design.id as part_id,chapter_design.type,chapter_design.topic_title,type_id,chapter_content_publish.teacher_id');
            $this->db->join('chapter_content_publish','chapter_content_publish.chapter_content_id = chapter_design.id','left');
            $this->db->where('chapter_design.id',$part);
            $this->db->from('chapter_design');
            $query1 = $this->db->get();
            $result1 = $query1->row_array();
            if($title){
                $result1['topic_title'] = $title;
            }
           $result1['topic_title'] = strip_tags($result1['topic_title']);

            return $result1;
        }
        elseif($result['type'] == 3){
            $this->db->select('chapter_design.id as part_id,chapter_design.type,chapter_design.topic_title,video.video_link as content');
            $this->db->where('id',$part);
            $this->db->join('video','video.video_id = chapter_design.type_id','left');
            $this->db->from('chapter_design');
            $query1 = $this->db->get();
            $result1 = $query1->row_array();
            if($title){
                $result1['topic_title'] = $title;
            }
           $result1['topic_title'] = strip_tags($result1['topic_title']);

            return $result1;
        }
        elseif($result['type'] == 6){
           $result['topic_title'] = strip_tags($result['topic_title']);
            return $result;
        }
        // elseif($result['type'] == 5){

        //     $this->db->select('chapter_design.id as part_id,chapter_design.type,chapter_design.topic_title,type_id,chapter_content_publish.teacher_id');
        //     $this->db->join('chapter_content_publish','chapter_content_publish.chapter_content_id = chapter_design.id','left');
        //     $this->db->where('chapter_design.id',$part);
        //     $this->db->from('chapter_design');
        //     $query1 = $this->db->get();
        //     return $result1 = $query1->row_array();
        // }
    }
    public function get_exercise($part){
        // echo $part;exit();
        $this->db->select('chapter_design.id as part_id,type,type_id,chapter_content_publish.teacher_id');
        $this->db->where('chapter_design.id',$part);
        $this->db->join('chapter_content_publish','chapter_content_publish.chapter_content_id = chapter_design.id','left');
        $this->db->from('chapter_design');
        $query = $this->db->get();
        $result = $query->row_array();
        // print_r($result);exit();
        if($result['type'] == 5){
            $this->db->select('exercise_id as quest_id,exercise_question as question,exercise_answer1 as option_1, exercise_answer2 as option_2, exercise_answer3 as option_3, exercise_answer4 as option_4, exercise_correct_answer as answer');
            $this->db->where('exercise_status',1);
            $this->db->where('exercise_title',$result['type_id']);

            $this->db->from('exercise');
            $query1 = $this->db->get();
            return $result1 = $query1->result_array();
        }
        elseif($result['type'] == 4){
            //echo $result['type_id'];exit();
            $this->db->select('quest_id,title as question,option_no ,option1, option2, option3, option4, answer_value as answer');
            //$this->db->where('exercise_status',1);
            $this->db->where('question_id',$result['type_id']);
            $this->db->from('interactive_questions');
            $query1 = $this->db->get();
            //echo $this->db->last_query();exit();
            return $result1 = $query1->result_array();
        }
        else{
            return false;
        }

    }

    public function get_user_topic($id,$teacher){
        $this->db->select('topic_id');
        $this->db->where('topic_status >',0);
        $this->db->where('copy_topic',$id);
        $this->db->where('user_id',$teacher);
        $result = $this->db->get('presentation_topic')->row_array();
      
        if($result['topic_id']){
            return $result['topic_id'];
        }else{
            return false;
        }
    }
    //  public function list_presentation_topic($id){
    //     // 
    //     // return $this->db->count_all_results('presentation_topic');
    //     $this->db->select('topic_title,topic_parent');
    //     $this->db->where('topic_status >',0);
    //     $this->db->where('topic_id',$id);
    //     $result = $this->db->get('presentation_topic')->row_array();
    //     // $x=0;
    //     // foreach ($result as $value) {
    //         if($result!=""){

    //         $this->db->select('topic_title');
    //         $this->db->where('topic_status >',0);
    //         $this->db->where('topic_parent',$id);
    //         $result['topics'] = $this->db->get('presentation_topic')->result_array();
    //         // print_r($result);
    //             if($result['topic_parent'] == 0){
    //                 $this->db->select('topic_title');
    //                 $this->db->where('topic_status >',0);
    //                 $this->db->where('topic_id',$id);
    //                 $result['topic'] = $this->db->get('presentation_topic')->result_array();
    //             }else{
    //                     $this->db->select('topic_title');
    //                     $this->db->where('topic_status >',0);
    //                     $this->db->where('topic_parent',$result['topic_parent']);
    //                     $result['topic'] = $this->db->get('presentation_topic')->result_array();
    //             }    
    //         }else{
    //             $result = false;
    //         }
            
                
    //     // }

    //     return $result;
    // }



     public function list_presentation_topic($id){

        $this->db->select('topic_title,topic_id');
        $this->db->from('presentation_topic');
        $this->db->where('topic_id', $id);
        $this->db->where('topic_status >',0);
        $this->db->where('practice_type',0);


        $parent = $this->db->get();
        
        $topics = $parent->row_array();

        
        $i=0;
     
           
        if(!empty($topics)){
             
             $topics['topics'] = $this->get_sub_topics($topics['topic_id']);

            $i++;
        }else{
            $topics = false;
        }
           
        // }
        return $topics;
        
    }
    

    public function get_sub_topics($id){

        $this->db->select('topic_title,topic_id');
        $this->db->from('presentation_topic');
        $this->db->where('topic_status >',0);

        $this->db->where('topic_parent', $id);
        $this->db->where('practice_type',0);
        $child = $this->db->get();
        $topics = $child->result_array();


       
        $i=0;
        
        foreach($topics as $p_cat){
       
            $topics[$i]['topics'] = $this->get_sub_topics($p_cat['topic_id']);

            $i++;
        }
        // print_r($topics);
        return $topics;       
    }

    public function get_subject_teacher($subject,$user){
        $this->db->select('batch_id');
        $this->db->from('student');
        $this->db->where('id',$user);
        $batch = $this->db->get()->row_array();
        $batch_id = $batch['batch_id'];

        $this->db->select('teacher_id');
        $this->db->from('batch_teachers');
        $this->db->where('batch_id',$batch_id);
        $this->db->where('subject_id',$subject);
        $teacher = $this->db->get()->row_array();
        return $teacher['teacher_id'];


    }
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
    public function teacher_topic_title($id,$teacher){
        $this->db->where('status >',0);
        $this->db->where('id',$id);
        $result = $this->db->get('chapter_design')->row_array();
        // print_r($result);
        // $x = 0;
        // foreach ($result as $value) {
        $this->db->where('content_id',$result['id']);
        $this->db->where('teacher_id',$teacher);
        $resultc = $this->db->get('chapter_content_title')->row_array();
        if($resultc){
            return $resultc['title'];
        }
        else{
            return false;
        }    
        
    }
    public function get_search_image($keyword){
    	$this->db->distinct('chapter_image.id');
        $this->db->select('chapter_image.chapter_image,chapter_image.image_title');
        $this->db->like('tag',$keyword);
        $this->db->from('image_tags');
        $this->db->where('chapter_image.image_status',1);
        $this->db->join('chapter_image','chapter_image.id=image_tags.image_id','left');
        $query = $this->db->get();
        //echo $this->db->last_query();exit();
        return $result = $query->result_array();
        //print_r($result);exit();

    }
    public function get_search_presentation($keyword){
        $this->db->distinct('presentation_topic.topic_id');
        $this->db->select('presentation_topic.topic_title,presentation_topic.topic_id');
        $this->db->from('topic_tags');
        $this->db->like('topic_tags.tag',$keyword);
        
        // $this->db->where('presentation_topic.topic_parent',0);
        $this->db->where('presentation_topic.topic_status >',0);
        $this->db->join('presentation_topic','presentation_topic.topic_id=topic_tags.topic_id','left');
        $query = $this->db->get();
        //echo $this->db->last_query();exit();
         $result = $query->result_array();
         $x=0;
          foreach ($result as $value) {
                $result[$x]['topic_title'] = strip_tags($value['topic_title']);
                $x++;
          }
          return $result;
        //print_r($result);exit();

    }
}