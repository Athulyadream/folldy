<?php
class Api_student extends CI_Model {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();  

    }
    public $topicarray = array();
    public $topicarray_flow = array();

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
          /////athulya/////////
        $result['user_type'] = 'student';
        /////close/////////
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

// print_r($data);exit();



        if(!empty($data)){
            if(password_verify($password,$data['password'])){
                $data['user_type'] = 'student';
                $result = $data;
            }
            else{
               $result = "";
            }

                    

        }else{
            //////////////athulya////////////////
            $fields = '*';
            $this->db->select($fields);
            $this->db->where('teacher_status',1);
            $this->db->where('teacher_phone',$phone);
            $this->db->from('pc_scr_teachers');
            $query = $this->db->get();
            $data = $query->row_array();
            //print_r($data);exit();
            
            if(!empty($data)){
                if(password_verify($password,$data['teacher_password'])){
                     $data['user_type'] = 'teacher';
                    $result = $data;
                }
                else{
                   $result = "";
                }

                           

            }
            else{
                $result = "";
            }
             //////////////close////////////////
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
         $fields = 'id as userid,session_value as session,name';
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
    // public function get_subject($course){
    //     $this->db->select('data_id as id,data_name as name,paper_icon as icon');
    //     $this->db->where('data_parent',$course);
    //     $this->db->where('data_status',1);
    //     $this->db->where('data_type',1);
       
    //     $this->db->from('data');
    //     $query = $this->db->get();
    //     //echo $this->db->last_query();exit();
    //     $result = $query->result_array();

    //     foreach ($result as $key => $value) {
    //         if($value['icon'] != ''){
    //             $result[$key]['icon'] = base_url().'uploads/paper_icon/'.$value['icon'];
    //         }
    //         else{
    //             $result[$key]['icon'] = '';
    //         }
    //     }

    //     return $result ;

    // }
    public function get_subject($batch){
        $ar = array(1,2);
        $this->db->select('data_id as id,data_name as name,paper_icon as icon');
        //$this->db->where('data_parent',$course);
        $this->db->where('data_status',1);
        $this->db->where('ins_semester.batch_id',$batch);
        $this->db->where_in('ins_semester.publish_status',$ar);
        $this->db->from('ins_semester');
        $this->db->join('sem_subject','sem_subject.sem_id=ins_semester.sem_id','left');
        $this->db->join('data','data.data_id=sem_subject.subject_id','left');
        $this->db->order_by('sem_subject.publish_status','asc');
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
    ////athulya chapter_thumbnail changes//////

    public function get_chapter_list($subject,$teacher){
        $this->db->select('data_id as chapter_id,data_name as chapter_name,chapter_thumbnail');
        $this->db->join('chapter_publish','chapter_publish.chapter_id = data.data_id AND chapter_publish.teacher_id ='.$teacher,'left');
        $this->db->where('chapter_publish.publish_status',1);
        $this->db->where('data_parent',$subject);
        $this->db->where('data_status',1);
        $this->db->where('data_type',2);
        $this->db->from('data');
        $query = $this->db->get();
        // echo $this->db->last_query();exit();
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
        $this->db->where('chapter_design.status',1);

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
        $this->db->where('chapter_design.status',1);

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
        $this->db->where('chapter_design.status',1);

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
        $this->db->where('chapter_design.status',1);

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
        $this->db->where('chapter_design.status',1);

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

    public function get_user_topic($id,$teacher,$semester,$subject){
        $this->db->select('cloned_id');
        $this->db->where('topic_id',$id);
        $this->db->where('teacher_id',$teacher);
        $this->db->where('semester',$semester);
        $this->db->where('subject',$subject);
        $result = $this->db->get('cloned_presentations')->row_array();
        if($result){
            return $result['cloned_id'];
        }else{
            return 0;
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
        $this->db->order_by('created_at','desc');

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
        $this->db->order_by('created_at','desc');
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
    public function get_search_image($keyword,$limit,$offset){
    	$this->db->distinct('chapter_image.id');
        $this->db->select('chapter_image.chapter_image,chapter_image.image_title');
        // $this->db->like('tag',$keyword);
        $this->db->where("(tag  LIKE '%".$keyword."%' OR chapter_image.image_title LIKE '%".$keyword."%' )");
        $this->db->from('image_tags');
        $this->db->where('chapter_image.image_status',1);
        $this->db->join('chapter_image','chapter_image.id=image_tags.image_id','left');
        $this->db->order_by('chapter_image.id','desc');

        $this->db->limit($limit,$offset);

        $query = $this->db->get();
        //echo $this->db->last_query();exit();
        return $result = $query->result_array();
        //print_r($result);exit();

    }
    public function get_search_topics($keyword,$limit,$offset){
        $this->db->distinct('presentation_topic.topic_id');
        $this->db->select('presentation_topic.topic_title,presentation_topic.topic_id,presentation_topic.content');
        $this->db->from('topic_tags');
        // $this->db->like('topic_tags.tag',$keyword);
         $this->db->where("(topic_tags.tag  LIKE '%".$keyword."%' OR presentation_tags.tag LIKE '%".$keyword."%' )");
        // $this->db->where("(presentation_topic.topic_title  LIKE '%".$keyword."%' OR presentation.presentation_title LIKE '%".$keyword."%' )");

        
        // $this->db->where('presentation_topic.topic_parent',0);
        $this->db->where('presentation_topic.topic_status >',0);
        $this->db->join('presentation_topic','presentation_topic.topic_id=topic_tags.topic_id','left');
        $this->db->join('presentation','presentation.presentation_id=presentation_topic.topic_presentation_id','left');
        $this->db->join('presentation_tags','presentation_topic.topic_presentation_id=presentation_tags.presentation_id','left');
        $this->db->order_by('presentation_topic.topic_id','desc');

        $this->db->limit($limit,$offset);
        $query = $this->db->get();
        //echo $this->db->last_query();exit();
         $result = $query->result_array();
         $x=0;
          foreach ($result as $value) {
                $result[$x]['topic_title'] = html_entity_decode(strip_tags($value['topic_title']));
                $result[$x]['content'] = html_entity_decode(strip_tags($value['content']));
                $x++;
          }
          return $result;
        //print_r($result);exit();

    }






    
    /////////////***************** New updations-  athulya************///////////

    public function get_search_presentation($keyword,$limit,$offset){
        $this->db->distinct('presentation_topic.topic_id');
        $this->db->select('presentation_topic.topic_title,presentation_topic.topic_id,presentation_topic.content,content_slide,presentation_title');
        $this->db->from('presentation_tags');
         $this->db->where("(presentation.presentation_title  LIKE '%".$keyword."%' OR presentation_tags.tag LIKE '%".$keyword."%' OR topic_tags.tag  LIKE '%".$keyword."%')");

        // $this->db->where("(presentation_topic.topic_title  LIKE '%".$keyword."%'  OR  presentation.presentation_title LIKE '%".$keyword."%' )");

        $this->db->where('presentation_topic.topic_parent',0);
        $this->db->where('presentation_topic.topic_status >',0);
        $this->db->join('presentation_topic','presentation_topic.topic_presentation_id=presentation_tags.presentation_id','left');
        $this->db->join('presentation','presentation.presentation_id=presentation_topic.topic_presentation_id','left');
        $this->db->join('topic_tags','presentation_topic.topic_id=topic_tags.topic_id','left');
        $this->db->order_by('presentation_topic.topic_id','desc');
        $this->db->limit($limit,$offset);
        $query = $this->db->get();
        // 
        
        //echo $this->db->last_query();exit();
        $result = $query->result_array();
         $x=0;

          foreach ($result as $value) {
            $prs = $this->get_presentationchapter($value['topic_id']);
            $sub = $this->get_presentationsubject($value['topic_id']);



                $result[$x]['topic_title'] = html_entity_decode(strip_tags($value['presentation_title']));
                $result[$x]['content'] = html_entity_decode(strip_tags($value['content']));
                 $result[$x]['content_slide'] = base_url().'uploads/slide/'.$value['content_slide'];
                  $result[$x]['chapter_name'] = $prs['title'];
                   $result[$x]['chapter_id'] = $prs['data_id'];
                   $result[$x]['subject_id'] = $sub['data_id'];
                $x++;
          }
          return $result;
        //print_r($result);exit();

    }

     public function get_recentpresentations($id){

        $this->db->select('topic_title as title ,content_slide as thumbnail,recent_presentation_student.presentation_id as id,recent_presentation_student.date,presentation_topic.topic_id');
        $this->db->from('recent_presentation_student');
         $this->db->join('presentation_topic','presentation_topic.topic_id=recent_presentation_student.presentation_id','left');
         $this->db->join('presentation','presentation_topic.topic_presentation_id=presentation.presentation_id','left');
        $this->db->where('recent_presentation_student.student_id', $id);
        $this->db->where('topic_status >',0);
        $this->db->where('presentation_status >',0);
        $this->db->order_by('recent_presentation_student.id','desc');
        $this->db->group_by('recent_presentation_student.presentation_id');


        $parent = $this->db->get();
        
        $topics = $parent->result_array();
        foreach ($topics as $key => $value) {
            $prs = $this->get_presentationchapter($value['topic_id']);
    $sub = $this->get_presentationsubject($value['topic_id']);


             
                  $topics[$key]['chapter_name'] = $prs['title'];
                   $topics[$key]['chapter_id'] = $prs['data_id'];
                   $topics[$key]['subject_id'] = $sub['data_id'];

                // $x++;
          }

        return $topics;
        
    }


    public function get_recentchapters($id){
        // $teacher = $this->get_subject_teacher($subject,$id);
        $this->db->select('data_name as title ,chapter_thumbnail as thumbnail,recent_chapter_student.chapter_id as id,recent_chapter_student.date');
        $this->db->from('recent_chapter_student');
        $this->db->join('data','data.data_id=recent_chapter_student.chapter_id','left');
        $this->db->where('recent_chapter_student.student_id', $id);
        $this->db->where('data_status >',0);
        $this->db->order_by('recent_chapter_student.id','desc');
        $this->db->group_by('recent_chapter_student.chapter_id');
        $parent = $this->db->get();
        $topics = $parent->result_array();
        foreach ($topics as $key => $value) {

            $sub = $this->get_chaptersubject($value['id']);
            $topics[$key]['subject_id'] = $sub['data_parent'];
                   
                // $x++;
          }

        return $topics;
        
    }


     public function update_data_by_phone_teacher($data,$phone)
    {
        $this->db->where('teacher_phone', $phone);
        $this->db->update('pc_scr_teachers', $data);
        if ($this->db->affected_rows() > 0) 
        {  
            return true;
        }
    }
    public function update_teacher_details($update_data,$id){
              
        $this->db->where('teacher_id',$id);
        if($this->db->update('pc_scr_teachers',$update_data)){
          
            return 1;
        }
        else{
            return 0;
        }              
    }
    public function getDatas_teacher($id){

       $fields = 'teacher_id as userid,session_value as session,institutes.institute_name as school_name, institutes.name_abbreviation as abbreviation';
        $this->db->select($fields);
        //$this->db->where('status',1);
        $this->db->where('teacher_id',$id);
        $this->db->join('institutes','institutes.institute_id=teachers.institute_id','left');
        $this->db->from('teachers');
        $query = $this->db->get();
        $result = $query->row_array();
        /////athulya/////////
        $result['user_type'] = 'teacher';
        /////close/////////
        //echo $this->db->last_query();exit();
        return $result;
    }

    public function check_session_teacher($id,$session){
        
        $this->db->select('*');
        $this->db->where('teacher_id',$id);
        $this->db->where('session_value',$session);
        $this->db->from('pc_scr_teachers');
        $query = $this->db->get();
        $result = $query->row_array();
        
        if($result){
            return array('status'=>1);
        } 
        else{
            return array('status'=>0);
        }
    }


    public function get_chapter_details_view($chapter,$teacher,$semester){
       
        $this->db->select(' chapter_design.id, chapter_design.chapter_id, `type`, `type_id`, `image`, `status`, chapter_design.created_on, chapter_design.updated_on, chapter_design.updated_by, `presentation`, `topic_title`, `topic_color`, `topic_backgroundcolor`, `topic_backgroundimage`, `topic_type`, `topic_status`, `topic_bordercolor`, `topic_fontsize`, `topic_position_left`, `topic_position_top`, `topic_width`, `topic_height`, `topic_content_position_left`, `topic_content_position_top`');
        $this->db->join('chapter_content_publish','chapter_content_publish.chapter_content_id = chapter_design.id AND chapter_content_publish.teacher_id ='.$teacher,'left');
        $this->db->join('data','data.data_id = chapter_design.chapter_id','left');

        $this->db->join('chapter_publish','chapter_publish.chapter_id = data.data_id AND chapter_publish.teacher_id='.$teacher,'left');
        $this->db->where('chapter_publish.publish_status',1);        
        $this->db->where('data_status',1);
        
        $this->db->where('chapter_content_publish.publish_status',1);
        $this->db->where('chapter_design.status',1);
        $this->db->where('chapter_design.chapter_id',$chapter);
        $this->db->from('chapter_design');
        $query = $this->db->get();
        $result = $query->result_array();
        // print_r($result);
        // die();

        foreach($result as $key => $value){
              $result[$key]['topic_backgroundimage'] = base_url().'uploads/background/'.$value['topic_backgroundimage'];
            $title = $this->teacher_topic_title($value['id'],$teacher);
            if($title){
                $result[$key]['topic_title'] = $title;
            }
            $result[$key]['topic_title'] = strip_tags( $result[$key]['topic_title']);
            $type = $value['type'];
            $typeid = $value['type_id'];
            if($type =='1'){
                    $results[$key]['type']='vedio';
                //vedio
                    $this->db->select('video_id,video_title,video_link');
                    $this->db->where('video_status',1);
                    $this->db->where('type','1');
                    $this->db->where('video_id',$typeid);
                    $vediolink = $this->db->get('video')->row_array();
                   

                $results[$key]['link'] = base_url().'uploads/video/'.$vediolink['video_link'];
            }
            else if($type =='2'){
                //presentation
                $subject = $this->Api_student->get_chapter_subject($value['content_id']);
                $results[$key]['type']='presentation';
                $utypeid = $typeid;
                if($teacher !=""){
                        $utypeid_t = $this->get_user_topic($typeid,$teacher,$semester,$subject);
                        if($utypeid_t !=0){
                             $utypeid = $utypeid_t;
                        }

                }
                $results[$key]['link'] = base_url().'presentation-slide-view/'.$utypeid;

            }
            else if($type =='3'){
                //pdf
                    $results[$key]['type']='pdf';
                    $this->db->select('video_id,video_title,video_link');
                    $this->db->where('video_status',1);
                    $this->db->where('type','2');
                    $this->db->where('video_id',$typeid);
                    $pdflink = $this->db->get('video')->row_array();
                    $results[$key]['link'] = base_url().'uploads/pdf/'.$pdflink['video_link'];
            } else if($type =='4'){
                //question
                    $results[$key]['type']='question';
                    $results[$key]['link'] = base_url().'view-details/'.$typeid;

                
            } else if($type =='5'){
                //exercise
                    $results[$key]['type']='exercise';
                    $results[$key]['link'] = base_url().'exercise-view/'.$typeid;

            }
            else if($type =='6'){
                //image
                    $results[$key]['type']='image';
                    $results[$key]['link'] = base_url().'uploads/chapter/'.$value['image'];

            }



        }
        return $result;

    }


     public function get_chapter($chapter){
        $this->db->select('data_id as chapter_id,data_name as chapter_name,chapter_thumbnail,backgroundimage');
        $this->db->where('data_id',$chapter);
        $this->db->where('data_status',1);
        $this->db->where('data_type',2);
        $this->db->from('data');
        $query = $this->db->get();
        //echo $this->db->last_query();exit();
        return $result = $query->row_array();

    }


     public function get_topics($id){
        $this->db->select('*');
        $this->db->from('presentation_topic');
        $this->db->join('presentation','presentation_topic.topic_presentation_id=presentation.presentation_id','left');
        $this->db->where('topic_id', $id);
        $this->db->where('topic_status >',0);


        $parent = $this->db->get();
        
        $topics = $parent->row_array();
        if($topics['practice_type'] ==0){
            $topics['practice_type'] ='topic';
            $topics['link'] ='';
        }else if($topics['practice_type'] ==1){
            $topics['practice_type'] ='practice';
            $topics['link'] =base_url().'view-details/'.$topics['practice_id'];
        }else if($topics['practice_type'] ==2){
            $topics['practice_type'] ='text';
            $topics['link'] ='';
        }else{
            $topics['practice_type'] ='0';
            $topics['link'] ='';
        }
        if($topics['topic_backgroundimage'] != ""){
                    $word = "chapter";
                    $myimage = $topics['topic_backgroundimage'];
                     $myimage = str_replace(' ', '%20', $myimage);
                    $path =  base_url().'uploads/background/';
                       
                      // Test if string contains the word 
                    if(strpos($myimage, $word) !== false){
                          $path =  base_url().'uploads/';
                    } 
                    $topics['topic_backgroundimage'] = $path.$myimage;
            }
            $i=0;
            // foreach($topics as $p_cat){
            // $topics['ttitle'] = strip_tags($topics['topic_title']);
            $st =strip_tags($topics['topic_title']);
            $tit = substr($st, 0, 10);
            $topics['ttitle'] =  $tit." ...";;
           
        if(!empty($topics)){
            $this->db->select('*');
            $this->db->where('image_status >',0);
            $this->db->where('image_topic_id',$topics['topic_id']);
            $topics['image'] = $this->db->get('presentation_topic_images')->result_array();
/////////////////////////////////////////////////////////////////////////////////////////////////////////////NEED TO CHANGE////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $this->db->select('*');
            $this->db->where('audio_status >',0);
            $this->db->where('audio_topic_id',$topics['topic_id']);
            $audios = $this->db->get('presentation_audio')->result_array();
            foreach ($audios as $key => $advalue) {
                if($advalue['audio'] != ''){
                        $audios[$key]['audio'] = base_url().'uploads/audio/'.$advalue['audio'];
                }
            }

            $topics['audio']= $audios;
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $topics['sub'] = $this->get_topic_sub($topics['topic_id']);
            $i++;
        }else{
            $topics = false;
        }
           
        // }
        return $topics;
        
    }

    public function get_topic_sub($id){

        $this->db->select('*');
        $this->db->from('presentation_topic');
        $this->db->where('topic_status >',0);

        $this->db->where('topic_parent', $id);

        $child = $this->db->get();
        $topics = $child->result_array();


       
        $i=0;
        
        foreach($topics as $p_cat){

            if($p_cat['topic_backgroundimage'] != ""){
                                $word = "chapter";
                                $myimage = $p_cat['topic_backgroundimage'];
                                 $myimage = str_replace(' ', '%20', $myimage);
                                $path =  base_url().'uploads/background/';
                                   
                                  // Test if string contains the word 
                                if(strpos($myimage, $word) !== false){
                                      $path =  base_url().'uploads/';
                                } 
                                $topics[$i]['topic_backgroundimage'] = $path.$myimage;
                            }
            $st =strip_tags($p_cat['topic_title']);
            $tit = substr($st, 0, 10);
        $topics[$i]['ttitle'] = $tit." ...";

                    $this->db->select('*');
                    $this->db->where('image_status >',0);
                    $this->db->where('image_topic_id',$p_cat['topic_id']);
                    $topics[$i]['image'] = $this->db->get('presentation_topic_images')->result_array();

                    $this->db->select('*');
                    $this->db->where('audio_status >',0);
                    $this->db->where('audio_topic_id',$p_cat['topic_id']);
                    $audios = $this->db->get('presentation_audio')->result_array();
                    foreach ($audios as $key => $advalue) {
                        if($advalue['audio'] != ''){
                                $audios[$key]['audio'] = base_url().'uploads/audio/'.$advalue['audio'];
                        }
                    }

                    $topics[$i]['audio']= $audios;
                    
                    $topics[$i]['sub'] = $this->get_topic_sub($p_cat['topic_id']);

            $i++;
        }
        // print_r($topics);
        return $topics;       
    }



    public function get_topic_questions($id){

        $this->db->select('tag,question_tag_id');
        $this->db->from('pc_scr_presentation_question_tags');
        $child = $this->db->get();
        $question_tags = $child->result_array();
        foreach ($question_tags as $key => $value) {
            $this->db->select('*');
            $this->db->from('pc_scr_presentation_topic_questions');
            $this->db->where('question_topic_id',$id);
            $this->db->where('status',1);

            $this->db->where('question_tag_id',$value['question_tag_id']);
            $child = $this->db->get();
            $qstns = $child->result_array();
            if($qstns){
                $question_tags[$key]['questions'] = $qstns;
            }
        }
        return $question_tags;
    }


     public function get_topic_qanda_questions($id,$uid,$type){

        $this->db->select('student.name as studentname,qanda_id as id,`text` as question, `audio`, `image`,created_at as date');
        $this->db->from('presentation_qanda_questions');
        $this->db->join('student','student.id = presentation_qanda_questions.student_id','left');
        $this->db->where('qanda_status',1);
        $this->db->where("((qanda_status ='1' AND student_id='".$uid."') OR (qanda_status ='2') )");

        $this->db->where('topic_id',$id);
        $child = $this->db->get();
        $question = $child->result_array();
        foreach ($question as $key => $value) {
                $this->db->where('status',1);
                $this->db->where('qanda_question_id',$value['id']);
                $count = $this->db->count_all_results('presentation_qanda_answers');
                $question[$key]['answer_count'] = $count;  
                if($value['date'] != '0000-00-00 00:00:00'){
                    $dt = date('d-m-Y',strtotime($value['date']));
                }else{
                    $dt = '00-00-0000';
                }
                $question[$key]['date'] = $dt;
                if($value['image']){
                    $question[$key]['image'] = base_url().'uploads/qanda/'.$value['image'];
                }else{
                    $question[$key]['image'] = "";
                }
        }
        return $question;
    }


    public function get_topic_qanda_answer($id,$question_id){
        $this->db->select('student.name ,teachers.teacher_name ,presentation_qanda_answers.text as question, presentation_qanda_answers.audio, presentation_qanda_answers.image,presentation_qanda_answers.created_at as date,user_type');
        $this->db->from('presentation_qanda_answers');
        // $this->db->join('presentation_qanda_questions','presentation_qanda_questions.qanda_id = presentation_qanda_answers.qanda_question_id');
        
        $this->db->join('student','student.id = presentation_qanda_answers.user_id AND user_type=0','left');
        $this->db->join('teachers','teachers.teacher_id = presentation_qanda_answers.user_id AND user_type=1','left');
        // $this->db->where('presentation_qanda_questions.topic_id',$id);
        $this->db->where('presentation_qanda_answers.qanda_question_id',$question_id);
        $this->db->group_by('presentation_qanda_answers.id');
         $child = $this->db->get();
        $question = $child->result_array();
        $questions = array();
        foreach ($question as $key => $value) {
                if($value['user_type'] == 1){
                    $questions[$key]['name'] = $value['teacher_name'];
                    $questions[$key]['user_type'] = 'teacher';
                }else{
                    $questions[$key]['name'] = $value['name'];
                    $questions[$key]['user_type'] = 'student';
                }

                $questions[$key]['question'] = $value['question'];
                if($value['audio']){
                        $questions[$key]['audio'] = base_url().'uploads/qanda/'.$value['audio'];
                }else{
                    $questions[$key]['audio'] = "";
                }
                if($value['image']){
                    $questions[$key]['image'] = base_url().'uploads/qanda/'.$value['image'];
                }else{
                    $questions[$key]['image'] = "";
                }
                
                $questions[$key]['date'] = date('d-m-Y',strtotime($value['date']));
        }


        $this->db->select('student.name as studentname,qanda_id as id,`text` as question, `audio`, `image`,created_at as date');
        $this->db->from('presentation_qanda_questions');
        $this->db->join('student','student.id = presentation_qanda_questions.student_id','left');
        // $this->db->where('qanda_status',1);
        // $this->db->where("((qanda_status ='1') OR (qanda_status ='2') )");

        $this->db->where('qanda_id',$question_id);
        $child2 = $this->db->get();
        $question2 = $child2->result_array();
        foreach ($question2 as $key2 => $value2) {
               
                if($value2['date'] != '0000-00-00 00:00:00'){
                    $dt = date('d-m-Y',strtotime($value2['date']));
                }else{
                    $dt = '00-00-0000';
                }
                $question2[$key2]['date'] = $dt;
                if($value2['image']){
                    $question2[$key2]['image'] = base_url().'uploads/qanda/'.$value2['image'];
                }else{
                    $question2[$key2]['image'] = "";
                }
        }
        $questions = array_merge($question2,$questions);
     
        return $questions;

    }

    public function add_data($data,$table){
        if($this->db->insert($table,$data)) {
        // echo $this->db->last_query();exit(); 
              return $this->db->insert_id();

        }
        else {return 0;}
    }
    public function update_topic($id,$data){
        $this->db->where('topic_id',$id);
        if($this->db->update('presentation_topic',$data)) return true;
        return false;
    }
    public function update_questionaire($id,$data){
        $this->db->where('question_id',$id);
        if($this->db->update('presentation_topic_questions',$data)) return true;
        return false;
    }
    public function update_qanda($id,$data,$data2){
        $this->db->where('qanda_id',$id);
        if($this->db->update('presentation_qanda_questions',$data)){
             $this->db->where('qanda_question_id',$id);
             $this->db->update('presentation_qanda_answers',$data2);
            return true;  
        } else{
            return false;
        }
        
    }

    public function publish_qanda($id,$data){
        $this->db->where('qanda_id',$id);
        if($this->db->update('presentation_qanda_questions',$data)){
           
            return true;  
        } else{
            return false;
        }
        
    }

    
    
    //////////////////////////////////Close athulya//////////////////////////////



    // kavya//

function logout_teacher($id) {
        
        $data =  array('session_value' => "");
        //$this->db->where('status',1);
        $this->db->where('teacher_id',$id);
        if($this->db->update('pc_scr_teachers',$data))
        {
            
            return true;
        }
        else{
            return false;
        }
        
   
    }




   public function get_teacher_details($id){
         $fields = 'teacher_id as userid,session_value as session_id';
        $this->db->select($fields);
        //$this->db->where('status',1);
        $this->db->where('teacher_id',$id);
        $this->db->from('pc_scr_teachers');
        $query = $this->db->get();
        $result = $query->row_array();
        //echo $this->db->last_query();exit();
        return $result;
    }



    public function get_chapter_list_teacher($subject,$teacher){
        $this->db->select('data_id as chapter_id,data_name as chapter_name,,chapter_thumbnail,chapter_publish.publish_status');
         $this->db->join('chapter_publish','chapter_publish.chapter_id = data.data_id AND chapter_publish.teacher_id ='.$teacher,'left');
       // $this->db->where('chapter_publish.publish_status',1);
        $this->db->where('data_parent',$subject);
        $this->db->where('data_status',1);
        $this->db->where('data_type',2);
        $this->db->from('data');
        $query = $this->db->get();
        //echo $this->db->last_query();exit();
        return $result = $query->result_array();

    }

    public function get_chapter_details_teacher($chapter,$teacher,$semester){
       //  $this->db->select('chapter_design.id as part_id,chapter_design.type,chapter_design.topic_title ,chapter_design.chapter_id,video.thumb_nail,chapter_design.image,chapter_content_publish.publish_status');

       //  $this->db->where('chapter_design.chapter_id',$chapter);
       //  //$this->db->where('chapter_design.type !=',4);
       //  $this->db->join('chapter_content_publish','chapter_content_publish.chapter_content_id = chapter_design.id AND chapter_content_publish.teacher_id ='.$teacher,'left');
       // // $this->db->where('chapter_content_publish.publish_status',1);
       //  $this->db->where('chapter_design.status',1);
       //  $this->db->join('video','video.video_id = chapter_design.type_id AND chapter_design.type = 1','left');
       //  $this->db->from('chapter_design');
       //  $query = $this->db->get();
       //  $result = $query->result_array();
       //  foreach($result as $key => $value){
       //      $title = $this->teacher_topic_title($value['part_id'],$teacher);
       //      if($title){
       //          $result[$key]['topic_title'] = $title;
       //      }
       //      $result[$key]['topic_title'] = strip_tags( $result[$key]['topic_title']);
       //  }
       //  return $result;



        $this->db->select(' chapter_design.id, chapter_design.chapter_id, `type`, `type_id`, `image`, `status`, DATE(FROM_UNIXTIME(pc_scr_chapter_design.created_on)) as created_on, chapter_design.updated_on, chapter_design.updated_by, `presentation`, `topic_title`, `topic_color`, `topic_backgroundcolor`, `topic_backgroundimage`, `topic_type`, `topic_status`, `topic_bordercolor`, `topic_fontsize`, `topic_position_left`, `topic_position_top`, `topic_width`, `topic_height`, `topic_content_position_left`, `topic_content_position_top`,publish_status,admin_name');
        $this->db->join('chapter_content_publish','chapter_content_publish.chapter_content_id = chapter_design.id AND chapter_content_publish.teacher_id ='.$teacher,'left');
        $this->db->join('data','data.data_id = chapter_design.chapter_id','left');
                $this->db->join('admins','admins.admin_id=chapter_design.updated_by','left');


    
        $this->db->where('data_status',1);


     
        $this->db->where('chapter_design.status',1);
        $this->db->where('chapter_design.chapter_id',$chapter);
        $this->db->from('chapter_design');
        $query = $this->db->get();
        $result = $query->result_array();
        // print_r($result);
        // die();
            $results = array();
        foreach($result as $key => $value){
              $result[$key]['topic_backgroundimage'] = base_url().'uploads/background/'.$value['topic_backgroundimage'];
            $title = $this->teacher_topic_title($value['id'],$teacher);
            if($title){
                $result[$key]['topic_title'] = $title;
            }
            $results[$key]['content_name'] = strip_tags( $result[$key]['topic_title']);
            $type = $value['type'];
            $typeid = $value['type_id'];
                        $results[$key]['id']=$value['id'];

                        if($value['publish_status']){
                            $pval = $value['publish_status'];
                        }else{
                             $pval =0;
                        }
            $results[$key]['publish_status']=$pval;
            $cdate=date('d-m-Y',strtotime($value['created_on']));
             $results[$key]['created']=$value['admin_name'].'-'.$cdate;

 $subject = $this->Api_student->get_chapter_subject($chapter);

            if($type =='1'){
                // $results[$key]['content_name']='vedio';
                    $results[$key]['type']='vedio';
                //vedio
                    $this->db->select('video_id,video_title,video_link');
                    $this->db->where('video_status',1);
                    $this->db->where('type','1');
                    $this->db->where('video_id',$typeid);
                    $vediolink = $this->db->get('video')->row_array();
                   

                // $results[$key]['link'] = base_url().'uploads/video/'.$vediolink['video_link'];
            }
            else if($type =='2'){
                //presentation
                
                $results[$key]['type']='presentation';
                if($teacher !=""){
                        $utypeid = $this->get_user_topic($typeid,$teacher,$semester,$subject);
                        if($utypeid != 0){
                            $typeid=$utypeid;
                        }else{
                             $results[$key]['publish_status']=2;
                        }

                }
            // $results[$key]['content_id']=$utypeid;

                // $results[$key]['link'] = base_url().'presentation-slide-view/'.$utypeid;

            }
            else if($type =='3'){
                //pdf
                    $results[$key]['type']='pdf';
                    $this->db->select('video_id,video_title,video_link');
                    $this->db->where('video_status',1);
                    $this->db->where('type','2');
                    $this->db->where('video_id',$typeid);
                    $pdflink = $this->db->get('video')->row_array();
                    // $results[$key]['link'] = base_url().'uploads/pdf/'.$pdflink['video_link'];
            } else if($type =='4'){
                //question
                    $results[$key]['type']='question';
                    $check = $this->Api_student->check_cloned_practice($typeid,$teacher,$semester,$subject);
                          if($check == 0){
                                    $results[$key]['publish_status']=2;
                            }
                    
                    // $results[$key]['link'] = base_url().'view-details/'.$typeid;

                
            } else if($type =='5'){
                //exercise
                    $results[$key]['type']='exercise';
                    // $results[$key]['link'] = base_url().'exercise-view/'.$typeid;

            }
            else if($type =='6'){
                //image
                    $results[$key]['type']='image';
                    // $results[$key]['link'] = base_url().'uploads/chapter/'.$value['image'];

            }

            $results[$key]['content_id']=$typeid;


    }
    return $results;

}


 public function get_batch($id){
        $fields = 'batch_name,batch_code,batch_start_date,batch_end_date,batch_start_time,
        batch_end_time,course_id,institute_id,batch_periods';
        
        $this->db->select($fields);
        $this->db->where('batch_id',$id);
        $this->db->from('batch');
        $query = $this->db->get();
        return $result = $query->row_array();
    }


     public function get_batch_students($id){
         $fields = 'id as student_id,name as student_name,phone as phone_number,email_id as email';
        $this->db->select($fields);
        $this->db->where('batch_id',$id);
        $this->db->from('student');
        $query = $this->db->get();
         $result = $query->result_array();
         foreach ($result as $key => $value) {
             $result[$key]['register_status'] =1;
         }
         return $result;

    }


    public function get_notifications_teacher($teacher){
        $this->db->select('pc_scr_notifications.notification_id,title,message as body,date,notifications_user.is_read as read_status,type,content_id,student.name,topic_id');
        // $this->db->where('created_by',$teacher);
        $this->db->where('user_type','teacher');
        $this->db->where('user_id',$teacher);
        // $this->db->where('data_status',1);
        // $this->db->where('data_type',2);
        $this->db->from('notifications');
        $this->db->join('notifications_user','notifications_user.not_id = notifications.notification_id','left');
        $this->db->join('student','student.id = notifications.created_by','left');
        $this->db->join('presentation_qanda_questions','presentation_qanda_questions.qanda_id = notifications.content_id','left');

        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $key => $value) {
            if(($value['type'] == 'content_publish') || ($value['type'] == 'chapter_publish')){
                 $subject = $this->Api_student->get_chapter_subject($value['content_id']);
            }else{
                $prtid = $this->Api_student->get_cloned_parentid($value['topic_id'],$teacher);
                $sub = $this->Api_student->get_presentationsubject($prtid);
                $subject = $sub['data_id'];
                // $subject = $this->Api_student->get_chapter_subject($value['topic_id']);
                
            }

                $this->db->select('batch_id');
                $this->db->from('batch_teachers');
                $this->db->where('batch_teachers.teacher_id',$teacher);
                $this->db->where('batch_teachers.subject_id',$subject);
                $teacher_b = $this->db->get()->row_array();
                $btid = $teacher_b['batch_id'];

                $this->db->select('sem_subject.sem_id');
                $this->db->where('sem_subject.batch_id',$btid);
                $this->db->where('sem_subject.subject_id',$subject);
                $this->db->from('sem_subject');
                $sem_query = $this->db->get();
                $sem_result = $sem_query->row_array();
                $semid =  $sem_result['sem_id'];


                 $result[$key]['subject'] = $subject;
                 $result[$key]['semester'] = $semid;
            
        }

        //echo $this->db->last_query();exit();
        return $result;

    }

    public function get_notifications_student($id){
        $this->db->select('pc_scr_notifications.notification_id,title,message as body,date,notifications_user.is_read as read_status,type,content_id,topic_id');
        // $this->db->where('created_by',$teacher);
        $this->db->where('user_type','student');
        $this->db->where('user_id',$id);
        // $this->db->where('data_status',1);
        // $this->db->where('data_type',2);
        $this->db->from('notifications');
        $this->db->join('notifications_user','notifications_user.not_id = notifications.notification_id','left');
        $this->db->join('presentation_qanda_questions','presentation_qanda_questions.qanda_id = notifications.content_id','left');
        
        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $key => $value) {
            if(($value['type'] == 'content_publish') || ($value['type'] == 'chapter_publish')){
                 $subject = $this->Api_student->get_chapter_subject($value['content_id']);


                $fields = 'batch_id';
                $this->db->select($fields);
                $this->db->where('id',$id);
                $this->db->from('student');
                $query2 = $this->db->get();
                $result2 = $query2->row_array();

                $btid = $result2['batch_id'];
                $this->db->select('sem_subject.sem_id');
                $this->db->where('sem_subject.batch_id',$btid);
                $this->db->where('sem_subject.subject_id',$subject);
                $this->db->from('sem_subject');
                $sem_query = $this->db->get();
                $sem_result = $sem_query->row_array();
                $semid =  $sem_result['sem_id'];


                 $result[$key]['subject'] = $subject;
                 $result[$key]['semester'] = $semid;
            }else{
                $result[$key]['subject']="";
                 $result[$key]['semester'] = "";
            }
        }
        //echo $this->db->last_query();exit();
        return $result;

    }

    public function get_notifications_student_count($id){
        $this->db->select('count(pc_scr_notifications.notification_id) as count');
        $this->db->where('notifications_user.is_read',0);
        $this->db->where('user_type','student');
        $this->db->where('user_id',$id);
        $this->db->from('notifications');
        $this->db->join('notifications_user','notifications_user.not_id = notifications.notification_id','left');

        $query = $this->db->get();
         $result = $query->row_array();
        if(!empty($result)){
            return $result['count'];

         }else{
            return 0;
         }
    }

     public function get_notifications_teacher_count($teacher){
       $this->db->select('count(pc_scr_notifications.notification_id) as count');
        $this->db->where('notifications_user.is_read',0);
        $this->db->where('user_type','teacher');
        $this->db->where('user_id',$teacher);
        $this->db->from('notifications');
        $this->db->join('notifications_user','notifications_user.not_id = notifications.notification_id','left');
        $query = $this->db->get(); 
         $result = $query->row_array();
         if(!empty($result)){
            return $result['count'];

         }else{
            return 0;
         }


    }


      function update_notification($where,$update_data){
        if(!empty($where)){
            $this->db->where($where);
        }
        return $this->db->update('notifications_user',$update_data);
    }


    public function checkPublish($id,$uid){
        $this->db->where('publish_status >',0);
        $this->db->where('chapter_content_id',$id);
        $this->db->where('teacher_id',$uid);
        return $this->db->count_all_results('chapter_content_publish');
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


     public function getProfileDetails_teacher($id){
        $fields = 'teacher_name,teacher_email,teachers.institute_id,teacher_phone,institute_name,name_abbreviation as abbreviation';
        $this->db->select($fields);
        $this->db->where('teacher_id',$id);
        $this->db->from('teachers');
        $this->db->join('institutes','institutes.institute_id = teachers.institute_id','left');
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    public function teacherSubjects($id){
        $this->db->distinct('teacher_subjects.subject_id');
        $this->db->select('data.data_name,teacher_subjects.subject_id,data.paper_icon,data.data_id,batch_id');
        $this->db->from('teacher_subjects');
        $this->db->where('teacher_subjects.teacher_id',$id);
        $this->db->where('data.data_status',1);
        $this->db->join('data','data.data_id = teacher_subjects.subject_id','left');
        $this->db->join('batch_teachers','batch_teachers.teacher_id = teacher_subjects.teacher_id','left');
        $this->db->group_by('teacher_subjects.subject_id');
        return $this->db->get()->result_array();
    }
     public function teacherChapters($id){
        $this->db->distinct('data.data_id');
        $this->db->select('data.data_name,data.chapter_thumbnail');
        $this->db->from('chapter_publish');
        $this->db->where('chapter_publish.teacher_id',$id);
        $this->db->where('chapter_publish.publish_status',1);
        $this->db->where('data.data_status',1);

        $this->db->join('data','data.data_id = chapter_publish.chapter_id','left');
        $this->db->group_by('data.data_id');

        return $this->db->get()->result_array();
    }

    public function teacherBatch($id){
        $this->db->distinct('batch.batch_id');
        $this->db->select('batch.*,data_name');
        $this->db->where('data_status',1);
        $this->db->where('batch_teachers.teacher_id',$id);
        $this->db->join('batch','batch.batch_id = batch_teachers.batch_id','left');
        $this->db->join('data','data.data_id=batch.course_id','left');
        $this->db->order_by('batch.batch_id','asc');
        // return $this->db->get('batch_teachers')->result_array();
         $result =  $this->db->get('batch_teachers')->result_array();
        foreach ($result as $key => $value) {
             $result[$key]['invite_student_count'] = $this->Api_student->get_invite_student_count($value['batch_id']);
        }
        return $result;
    }


 // public function get_childs($id){
        

 //       $this->db->select('topic_id,practice_type,practice_id');
 //        $this->db->from('presentation_topic');
 //        $this->db->join('presentation','presentation_topic.topic_presentation_id=presentation.presentation_id','left');
 //        $this->db->where('topic_id', $id);
 //        $this->db->where('topic_status >',0);
 //        $this->db->where("(practice_type ='0' OR practice_type='1')");



 //        $parent = $this->db->get();
        
 //        $topics = $parent->row_array();
 //        $topic = array();
 //        // $topic1 = array();

 //        if($topics['practice_type'] ==0){
 //            $topic['practice_type'] ='topic';
 //            $topic['id'] = $topics['topic_id'];
           
 //        }else if($topics['practice_type'] ==1){
 //            $topic['practice_type'] ='practice';
 //            $topic['id'] = $topics['practice_id'];
 //        }
       
 //            $i=0;
 //            // foreach($topics as $p_cat){
 //            // $topics['ttitle'] = strip_tags($topics['topic_title']);
           
           
 //        if(!empty($topics)){
           

 //            $this->db->select('*');
 //            $this->db->where('audio_status >',0);
 //            $this->db->where('audio_topic_id',$topics['topic_id']);
 //            $topic['audio'] = $this->db->get('presentation_audio')->result_array();

 //            // $topic[]=$topic1;
 //            $topic['sub'] = $this->get_topic_sub_child($topics['topic_id']);
 //            $i++;
 //        }else{
 //            $topics = false;
 //        }
           
 //        // }
 //        return $topic;   
        
 //    }

 //    public function get_topic_sub_child($id){

 //        $this->db->select('topic_id,practice_type');
 //        $this->db->from('presentation_topic');
 //        $this->db->where('topic_status >',0);

 //        $this->db->where('topic_parent', $id);

 //        $child = $this->db->get();
 //        $topicss = $child->result_array();


       
 //        $i=0;
 //        $topics= array();

 //        foreach($topicss as $p_cat){

                    
        
 //                     if($p_cat['practice_type'] ==0){
 //                        $topics['practice_type'] ='topic';
 //                        $topics['id'] = $p_cat['topic_id'];
                       
 //                    }else if($p_cat['practice_type'] ==1){
 //                        $topics['practice_type'] ='practice';
 //                        $topics['id'] = $p_cat['practice_id'];
 //                    }
                              
 //                    $this->db->select('*');
 //                    $this->db->where('audio_status >',0);
 //                    $this->db->where('audio_topic_id',$p_cat['topic_id']);
 //                    $topics['audio'] = $this->db->get('presentation_audio')->result_array();
 //                    $topics['sub'] = $this->get_topic_sub_child($p_cat['topic_id']);

 //            $i++;
 //        }
 //        // print_r($topics);
 //        return $topics;       
 //    }
    public function get_chapter_details_webview($chapter,$teacher,$semester){
       
        $this->db->select(' chapter_design.id, chapter_design.chapter_id, `type`, `type_id`');
        $this->db->join('chapter_content_publish','chapter_content_publish.chapter_content_id = chapter_design.id AND chapter_content_publish.teacher_id ='.$teacher,'left');
        $this->db->join('data','data.data_id = chapter_design.chapter_id','left');

        $this->db->join('chapter_publish','chapter_publish.chapter_id = data.data_id AND chapter_publish.teacher_id='.$teacher,'left');
        $this->db->where('chapter_publish.publish_status',1);        

        $this->db->where('chapter_content_publish.publish_status',1);
        $this->db->where('data_status',1);
        $this->db->where('chapter_design.status',1);
        $this->db->where('chapter_design.chapter_id',$chapter);
        $this->db->from('chapter_design');
        $query = $this->db->get();
        $result = $query->result_array();
        // print_r($result);
        // die();

        foreach($result as $key => $value){
             
            $type = $value['type'];
            $typeid = $value['type_id'];
            if($type =='1'){
                 
                $results[$key]['link'] = 'video/'.$typeid;
            }
            else if($type =='2'){
                $subject = $this->get_chapter_subject($chapter);
                $utypeid = $typeid;
                if($teacher !=""){
                        $utypeid_t = $this->get_user_topic($typeid,$teacher,$semester,$subject);
                        if($utypeid_t != 0){
                            $utypeid=$utypeid_t;
                        }

                }
             
                $results[$key]['link'] = 'presentation/'.$utypeid;;

            }
            else if($type =='3'){
              
                    $results[$key]['link'] = 'pdf/'.$typeid;
            } else if($type =='4'){
               
                    $results[$key]['link'] = 'practice/'.$typeid;

                
            } else if($type =='5'){
                //exercise
                    $results[$key]['link'] ='exercise/'.$typeid;

            }
            else if($type =='6'){
                //image
                    $results[$key]['link'] = 'image/'.$typeid;

            }



        }
        return $result;

    }


    public function get_childs($id){
        $this->db->select('topic_id,practice_type,practice_id');
        $this->db->from('presentation_topic');
        $this->db->join('presentation','presentation_topic.topic_presentation_id=presentation.presentation_id','left');
        $this->db->where('topic_id', $id);
        $this->db->where('topic_status >',0);
        $this->db->where("((practice_type =1) OR (practice_type=0))");



        $parent = $this->db->get();
        
        $topics = $parent->row_array();
        $topic = array();
        if($topics['practice_type'] ==0){
            $topic['practice_type'] ='topic';
            $topic['id'] = $topics['topic_id'];
           
        }else if($topics['practice_type'] ==1){
            $topic['practice_type'] ='practice';
            $topic['id'] = $topics['practice_id'];
        }
      
           
        if(!empty($topics)){
          
            $this->db->select('*');
            $this->db->where('audio_status >',0);
            $this->db->where('audio_topic_id',$topics['topic_id']);
            $audios = $this->db->get('presentation_audio')->result_array();
            foreach ($audios as $key => $advalue) {
                if($advalue['audio'] != ''){
                        $audios[$key]['audio'] = base_url().'uploads/audio/'.$advalue['audio'];
                }
            }

            $topic['audio'] = $audios;

            $obj = new stdClass;
            $obj->practice_type = $topic['practice_type'];
            $obj->id = $topic['id'] ;
            $obj->audio =  $topic['audio'];
            $this->topicarray[] = $obj;
            $topicl = $this->get_topic_sub_child($topics['topic_id']);

        }else{
            $topics = false;
        }
        return $this->topicarray;
        
    }

    public function get_topic_sub_child($id){

        $this->db->select('topic_id,practice_type,practice_id,topic_title');
        $this->db->from('presentation_topic');
        $this->db->where('topic_status >',0);

        $this->db->where('topic_parent', $id);

        $child = $this->db->get();
        $topics = $child->result_array();


       
        $i=0;
        // $topic1 = array();
        foreach($topics as $p_cat){

            
            if($p_cat['practice_type'] ==0){
                $topics[$i]['practice_type'] ='topic';
                $topics[$i]['topic_id'] = $p_cat['topic_id'];
               
            }else if($p_cat['practice_type'] ==1){
                $topics[$i]['practice_type'] ='practice';
                $topics[$i]['topic_id'] = $p_cat['practice_id'];
            }
                    $this->db->select('*');
                    $this->db->where('audio_status >',0);
                    $this->db->where('audio_topic_id',$p_cat['topic_id']);
                    
                    $audios = $this->db->get('presentation_audio')->result_array();
                    foreach ($audios as $key => $advalue) {
                        if($advalue['audio'] != ''){
                                $audios[$key]['audio'] = base_url().'uploads/audio/'.$advalue['audio'];
                        }
                    }
            $topics[$i]['audio']= $audios;


                    $obj1 = new stdClass;
                    $obj1->practice_type = $topics[$i]['practice_type'];
                    $obj1->id = $topics[$i]['topic_id'] ;
                    $obj1->audio =  $topics[$i]['audio'];
                    $this->topicarray[]  = $obj1;
                    $topic = $this->get_topic_sub_child($p_cat['topic_id']);


            $i++;
        }
        // print_r($topics);
        // return $this->topicarray;       
    }

     public function get_keywords_topics($keyword){
        $keyword = $keyword;
        $this->db->distinct('topic_tags.tag');
        $this->db->select('topic_tags.tag');
        $this->db->from('topic_tags');
        $this->db->where("(topic_tags.tag  LIKE '%".$keyword."%')");
        
        // $this->db->where('presentation_topic.topic_parent',0);
        // $this->db->where('presentation_topic.topic_status >',0);
        // $this->db->join('presentation_topic','presentation_topic.topic_id=topic_tags.topic_id','left');
        // $this->db->join('presentation','presentation.presentation_id=presentation_topic.topic_presentation_id','left');
        
        // $this->db->group_by('presentation_topic.topic_title');
        // $this->db->order_by('presentation_topic.topic_id','desc');

        // $this->db->group_by('topic_tags.tag');
        $this->db->limit('6');
        $query = $this->db->get();

        //echo $this->db->last_query();exit();
         $result = $query->result_array();
         $x=0;
          foreach ($result as $value) {
                // $result[$x]['topic_title'] = html_entity_decode(strip_tags($value['topic_title']));
                $result[$x]['topic_tags'] = html_entity_decode(strip_tags($value['tag']));
                $x++;
          }
          $keyword = $keyword;
        $this->db->distinct('presentation_tags.tag');
        $this->db->select('presentation_tags.tag');
        $this->db->from('presentation_tags');
        $this->db->where("(presentation_tags.tag  LIKE '%".$keyword."%')");
        $this->db->limit('6');
        $query2 = $this->db->get();

         $result2 = $query2->result_array();
         $x=0;
          foreach ($result2 as $value2) {
                // $result[$x]['topic_title'] = html_entity_decode(strip_tags($value['topic_title']));
                $result2[$x]['topic_tags'] = html_entity_decode(strip_tags($value2['tag']));
                $x++;
          }
          $result = (array_merge($result,$result2));
          return $result;
        //print_r($result);exit();

    }
    public function get_presentationchapter($id){
        $this->db->select('data_name as title ,data_id');
        $this->db->from('chapter_design');
         $this->db->join('data','data.data_id = chapter_design.chapter_id','left');
        $this->db->where('chapter_design.type', '2');
        $this->db->where('chapter_design.type_id', $id);
        $this->db->where('data_status >',0);
        $parent = $this->db->get();
        $topics = $parent->row_array();
        return $topics;
    }
    public function get_presentationsubject($id){
        // $teacher = $this->get_subject_teacher($subject,$id);
        $slide = $this->get_topic_main_parent($id);

        $this->db->select('data_name as title ,data_id,data_parent');
        $this->db->from('chapter_design');
         $this->db->join('data','data.data_id = chapter_design.chapter_id','left');
        $this->db->where('chapter_design.type', '2');

        $this->db->where('chapter_design.type_id', $slide);
        $this->db->where('data_status >',0);
        $parent = $this->db->get();
        $topics = $parent->row_array();
// print_r($topics);

         $this->db->select('data_name as title ,data_id,data_parent');
        $this->db->from('data');
        $this->db->where('data_id',$topics['data_parent']);
        $this->db->where('data_type',1);

        $this->db->where('data_status >',0);
        $parents = $this->db->get();
        $topicss = $parents->row_array();
// print_r($topicss);

        return $topicss;
    }
     public function get_chaptersubject($id){


       
        // $teacher = $this->get_subject_teacher($subject,$id);
        $this->db->select('data_name as title ,data_id,data_parent');
        $this->db->from('data');
        $this->db->where('data_id',$id);
        $this->db->where('data_type',2);

        $this->db->where('data_status >',0);
        $parent = $this->db->get();
        $topics = $parent->row_array();
return $topics;
        // if($topics){
        //     $this->db->select('data_name as title ,data_id');
        //     $this->db->from('data');
        //     $this->db->where('data_id',$topics['data_parent']);
        //     $this->db->where('data_status >',0);
        //     $parent2 = $this->db->get();
        //     if($parent2){
        //     $topics2 = $parent2->row_array();
        //     return $topics2;

        //     }else{
        //         return false;
        //     }
            
        // }else{
        //         return false;
        //     }
        
    }
    public function update_audio($id,$data){
        $this->db->where('id',$id);
        if($this->db->update('presentation_audio',$data)) return true;
        return false;
    }
    public function update_audio_practice($id,$data){
        $this->db->where('id',$id);
        if($this->db->update('practice_audio',$data)) return true;
        return false;
    }
    public function practice_audio($id,$uid,$type,$semester,$subject){
           

            $this->db->select('*');
            $this->db->where('audio_status >',0);
            $this->db->where('audio_practice_id',$id);
            if($type == 'teacher'){
                    $this->db->where('user_id',$uid);
            }else{
                    $teacher = $this->get_subject_teacher($subject,$uid);
                    $this->db->where('user_id',$teacher);
            }
            $this->db->where('semester',$semester);
            $this->db->where('subject',$subject);
            $this->db->join('cloned_practice','cloned_practice.practice_id = practice_audio.audio_practice_id','left');

            $audios = $this->db->get('practice_audio')->result_array();
            foreach ($audios as $key => $advalue) {
                if($advalue['audio'] != ''){
                        $audios[$key]['audio'] = base_url().'uploads/audio/'.$advalue['audio'];
                }
            }
            return $audios;
    }

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
     public function get_subject_teacher_token($subject,$user){
        $this->db->select('batch_id');
        $this->db->from('student');
        $this->db->where('id',$user);
        $batch = $this->db->get()->row_array();
        $batch_id = $batch['batch_id'];

        $this->db->select('fcm,teachers.teacher_id as id');
        $this->db->from('batch_teachers');
        $this->db->join('teachers','teachers.teacher_id = batch_teachers.teacher_id','left');
        $this->db->where('batch_teachers.batch_id',$batch_id);
        $this->db->where('batch_teachers.subject_id',$subject);
        $teacher = $this->db->get()->row_array();
        return $teacher;


    }

    public function get_topic_main_parent($id){
        
        $this->db->select('topic_parent,topic_id,topic_title');
        $this->db->where('topic_status >',0);
        $this->db->where('topic_id',$id);
        $result = $this->db->get('presentation_topic')->row_array();
                
        if($result['topic_parent'] == 0){
            return $result['topic_id'];
        }else{
            return $this->get_topic_main_parent($result['topic_parent']);
        }

    }
    public function get_topic_main_parent_name($id){
        
        $this->db->select('topic_parent,topic_id,topic_title');
        $this->db->where('topic_status >',0);
        $this->db->where('topic_id',$id);
        $result = $this->db->get('presentation_topic')->row_array();
                
        if($result['topic_parent'] == 0){
            return strip_tags($result['topic_title']);
        }else{
            return $this->get_topic_main_parent($result['topic_title']);
        }

    }


    //  public function get_subject_course($chapter){
       
    // }


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


    public function getslide_id($id){
        $this->db->select('topic_id');
        $this->db->from('presentation_qanda_questions');
        $this->db->where('qanda_status',1);
        $this->db->where('qanda_id',$id);
        $child = $this->db->get();
        $question = $child->row_array();
         if($question){
            return $question['topic_id'];
        }else{
            return 0;
        }
    }

    public function get_childs_flow($id){
        $this->db->select('topic_id,practice_type');
        $this->db->from('presentation_topic');
        $this->db->join('presentation','presentation_topic.topic_presentation_id=presentation.presentation_id','left');
        $this->db->where('topic_id', $id);
        $this->db->where('topic_status >',0);
        $this->db->where("(practice_type =1 OR practice_type=0)");



        $parent = $this->db->get();
        
        $topics = $parent->row_array();
        $topic = array();
        if($topics['practice_type'] ==0){
            // $topic['practice_type'] ='topic';
            $topic['id'] = $topics['topic_id'];
            // $topic['topic_title'] = $topics['topic_title'];
        }else if($topics['practice_type'] ==1){
            // $topic['practice_type'] ='practice';
            $topic['id'] = $topics['topic_id'];
            // $topic['topic_title'] = $topics['topic_title'];
        }
      
           
        if(!empty($topics)){
          
         

            // $topic['audio'] = $audios;
            $objs = new stdClass;
            // $obj->practice_type = $topic['practice_type'];
            $objs->id = $topic['id'] ;
           
            $this->topicarray_flow[] = $objs;
            $topicl = $this->get_topic_sub_child_flow($topics['topic_id']);

        }else{
            $topics = false;
        }
        return $this->topicarray_flow;
        
    }

    public function get_topic_sub_child_flow($id){

        $this->db->select('topic_id,practice_type,practice_id');
        $this->db->from('presentation_topic');
        $this->db->where('topic_status >',0);

        $this->db->where('topic_parent', $id);

        $child = $this->db->get();
        $topics = $child->result_array();


       
        $i=0;
        // $topic1 = array();
        if(empty($topics)){

            $this->db->select('topic_id,topic_parent,practice_id');
            $this->db->from('presentation_topic');
            $this->db->where('topic_status >',0);
            $this->db->where('topic_id', $id);
            $tparent = $this->db->get();
            $topicspar = $tparent->row();

            $this->db->select('topic_id');
            $this->db->from('presentation_topic');
            $this->db->where('topic_status >',0);
            $this->db->where('topic_id', $topicspar->topic_parent);
            $tparent_t = $this->db->get();
            $topicspar_t = $tparent_t->row_array();

                        
                        // $topicspar_t['audio']= $audios;
                        $obj2 = new stdClass;
                        // $obj2->practice_type = $topicspar_t['practice_type'];
                        $obj2->id = $topicspar_t['topic_id'] ;
                        // $obj2->audio =  $topicspar_t['audio'];
                        // $obj2->topic_title =  $topicspar_t['topic_title'];
                        $this->topicarray_flow[]  = $obj2;

                    // $topicl = $this->get_topic_sub_child_flow($topics['topic_id']);

        }else{
            foreach($topics as $p_cat){

             // echo $p_cat['topic_id']."<br/>";
                if($p_cat['practice_type'] ==0){
                    // $topics[$i]['practice_type'] ='topic';
                    $topics[$i]['topic_id'] = $p_cat['topic_id'];
                    // $topics[$i]['topic_title'] = $p_cat['topic_title'];

                   
                }else if($p_cat['practice_type'] ==1){
                    // $topics[$i]['practice_type'] ='practice';
                    $topics[$i]['topic_id'] = $p_cat['practice_id'];
                    // $topics[$i]['topic_title'] = $p_cat['topic_title'];
                }
                       


                        $obj1 = new stdClass;
                        // $obj1->practice_type = $topics[$i]['practice_type'];
                        $obj1->id = $topics[$i]['topic_id'] ;
                        // $obj1->audio =  $topics[$i]['audio'];
                        // $obj1->topic_title =  $topics[$i]['topic_title'];
                        $this->topicarray_flow[]  = $obj1;
                        $topic = $this->get_topic_sub_child_flow($p_cat['topic_id']);

                        // break;
                $i++;
            }
        }
       
        // print_r($topics);
        // return $this->topicarray;       
    }



     public function get_topic_display_parent($copytopicid,$copyparentid,$topicparentid){
        $this->db->select('topic_id');
        $this->db->where('copy_topic_id',$copytopicid);
        $this->db->where('copy_topic_parent_id',$copyparentid);
        $this->db->where('topic_parent_id',$topicparentid);

        $result = $this->db->get('presentation_copy_topic_details')->row_array();
        // if(!empty($result)){
            return $result['topic_id'];
        // }else{
        //     return false;
        // }
    }

    //15-12-2020
    public function get_chapter_image($chapter){
        $this->db->select('id as part_id,image_title as part_name,chapter_image');
        $this->db->where('image_status',1);
        $this->db->where('chapter_id',$chapter);
        $this->db->from('chapter_image');
        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $key => $value) {
            $result[$key]['image'] = base_url().'uploads/chapter/'.$value['chapter_image'];
            $result[$key]['type'] = 'image';
        }
        return $result;

    }

    public function check_audio_publish($content_id,$teacher){
        $slide = $this->get_topic_main_parent($content_id);
        $this->db->select('chapter_design.id');
        $this->db->where('chapter_design.type_id',$slide);
        $this->db->where('chapter_design.type =',2);
        $this->db->join('chapter_content_publish','chapter_content_publish.chapter_content_id = chapter_design.id AND chapter_content_publish.teacher_id ='.$teacher,'left');
        $this->db->where('chapter_content_publish.publish_status',1);
        $this->db->where('chapter_design.status',1);
        
        $this->db->from('chapter_design');
        $query = $this->db->get();
        $result = $query->row_array();
           if($result){
            return $result['id'];
           }else{
            return 0;
           }
            
    }

    public function check_content_publish($content_id,$teacher){
        // $slide = $this->get_topic_main_parent($content_id);
        $this->db->select('chapter_design.id');
        $this->db->where('chapter_design.type_id',$content_id);
        $this->db->join('chapter_content_publish','chapter_content_publish.chapter_content_id = chapter_design.id AND chapter_content_publish.teacher_id ='.$teacher,'left');
        $this->db->where('chapter_content_publish.publish_status',1);
        $this->db->where('chapter_design.status',1);
        
        $this->db->from('chapter_design');
        $query = $this->db->get();
        $result = $query->row_array();
           if($result){
            return 1;
           }else{
            return 0;
           }
            
    }
    public function check_student_phone($phone){
        $fields = '*';
        $this->db->select($fields);
        
        $this->db->where('phone',$phone);

        $this->db->from('student');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        if($rowcount == 0){
            $fields = '*';
            $this->db->select($fields);
            $this->db->where('phone',$phone);
            $this->db->where('status !=',0);
            $this->db->from('invite_students');
            $query = $this->db->get();
            $rowcount = $query->num_rows();
        }
        return $rowcount;
    }
    public function check_student_email($email){
        $fields = '*';
        $this->db->select($fields);
        
        $this->db->where('email_id',$email);
        $this->db->from('student');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        if($rowcount == 0){
            $fields = '*';
            $this->db->select($fields);
            $this->db->where('email',$email);
            $this->db->where('status !=',0);
            $this->db->from('invite_students');
            $query = $this->db->get();
            $rowcount = $query->num_rows();
        }
        //$this->db->last_query();exit();
        return $rowcount;
    }
    public function insert_invite_student($data){
        if($this->db->insert('invite_students',$data)) {
       
              return $this->db->insert_id();

        }
        else {return 0;}
    }
    public function get_invite_student_count($batch){
                // $batches = explode(' OR ', $batch);
                $this->db->where('status',1);
                // $this->db->where("(batch_id)");
                $this->db->where('batch_id',$batch);
                $count = $this->db->count_all_results('invite_students');
                return $count;
    }

    public function verify_otp($phone_number,$otp){
        $fields = '*';
        $this->db->select($fields);
        $this->db->where('phone',$phone_number);
        $this->db->where('otp',$otp);
        $this->db->from('invite_students');
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    public function update_student_invite($id,$data){  
            $this->db->where('invite_id',$id);
            if($this->db->update('invite_students',$data)){
                return 1;
            }
            else {return 0;}
    }
    public function get_invite_students($batch_id){
        $fields = 'invite_id as student_id,name as student_name,phone as phone_number,email';
        $this->db->select($fields);
        $this->db->where('batch_id',$batch_id);
        $this->db->where('status',1);
        $this->db->order_by('invite_id','desc');
        $result =  $this->db->get('invite_students')->result_array();
        foreach ($result as $key => $value) {
            $result[$key]['register_status'] = 0;
        }
        return $result;
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
    public function get_invite_data_by_phone($phone){
        $fields = '*';
        $this->db->select($fields);
        $this->db->where('phone',$phone);
        $this->db->from('invite_students');
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    public function get_batch_teacher_token($batch_id){
        // $this->db->select('batch_id');
        // $this->db->from('student');
        // $this->db->where('id',$user);
        // $batch = $this->db->get()->row_array();
        // $batch_id = $batch['batch_id'];

        $this->db->select('fcm,teachers.teacher_id as id');
        $this->db->from('batch_teachers');
        $this->db->join('teachers','teachers.teacher_id = batch_teachers.teacher_id','left');
        $this->db->where('batch_teachers.batch_id',$batch_id);
        //$this->db->where('batch_teachers.subject_id',$subject);
        $teacher = $this->db->get()->result_array();
        return $teacher;


    }

    //  public function get_user_topic($id,$teacher){
    //     $this->db->select('topic_id');
    //     $this->db->where('topic_status >',0);
    //     $this->db->where('copy_topic',$id);
    //     $this->db->where('user_id',$teacher);
    //     $result = $this->db->get('presentation_topic')->row_array();
       
    //     if($result['topic_id']){
    //         return $result['topic_id'];
    //     }else{
    //         return false;
    //     }
    // }

     public function get_content_type($id){
        $this->db->select('chapter_design.type_id');
        $this->db->from('chapter_design');
        $this->db->where('chapter_design.type', '2');
        $this->db->where('chapter_design.id', $id);
        $parent = $this->db->get();
        $topics = $parent->row_array();
        return $topics;
    }
    // bhagya new update
    public function get_active_subject($batch){
        // $ar = array(1,2);
        $this->db->select('data_id as id,data_name as name,paper_icon as icon');
        //$this->db->where('data_parent',$course);
        $this->db->where('data_status',1);
        $this->db->where('ins_semester.batch_id',$batch);
        $this->db->where('ins_semester.publish_status',1);
        $this->db->from('ins_semester');
        $this->db->join('sem_subject','sem_subject.sem_id=ins_semester.sem_id','left');
        $this->db->join('data','data.data_id=sem_subject.subject_id','left');
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

        return $result ;

    }
    public function get_semester_subject($where,$sub=array(),$teacher=NULL){
        // $ar = array(1,2);
        //print_r($sub);exit();
        if(!empty($sub)){
            $this->db->where_in('sem_subject.subject_id',$sub);
        }
        if(!empty($where)){
            $this->db->where($where);
        }
        $this->db->select('data_id as id,data_name as name,paper_icon as icon');
        //$this->db->where('data_parent',$course);
        $this->db->where('data_status',1);
        // $this->db->where('ins_semester.batch_id',$batch);
        // $this->db->where('ins_semester.sem_id',$semester);
       // $this->db->where('ins_semester.publish_status',1);
        $this->db->from('ins_semester');
        $this->db->join('sem_subject','sem_subject.sem_id=ins_semester.sem_id','left');
        $this->db->join('data','data.data_id=sem_subject.subject_id','left');
        // $this->db->join('teacher_favourite_subject t','t.semester = sem_subject.sem_id AND t.subject_id = sem_subject.subject_id ','right');
        $this->db->order_by('data.data_name','asc');
        $query = $this->db->get();
        //echo $this->db->last_query();exit();
        $result = $query->result_array();

        foreach ($result as $key => $value) {

                $this->db->select('t.favourite_status');
                $this->db->from('teacher_favourite_subject t');
                $this->db->join('data','data.data_id = t.subject_id','left');
                $this->db->join('ins_semester','ins_semester.sem_id = t.semester','left');
                $this->db->where('t.teacher_id',$teacher);
                $query2 = $this->db->get();
                $rowresult = $query2->row_array();
                if($rowresult['favourite_status']){
                    $result[$key]['favourite_status'] = $rowresult['favourite_status'];
                }else{
                    $result[$key]['favourite_status'] = 2;
                }
        
        // return $result;

            if($value['icon'] != ''){
                $result[$key]['icon'] = base_url().'uploads/paper_icon/'.$value['icon'];
            }
            else{
                $result[$key]['icon'] = '';
            }
        }

        return $result ;

    }
    public function get_published_semester($batch){
        $this->db->select('sem_id as semester_id,sem_name as semester_name');
        $this->db->where('ins_semester.batch_id',$batch);
        $this->db->where('ins_semester.publish_status',1);
        $this->db->from('ins_semester');
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    public function get_semester($batch){
        

        $status =  array(1,2,0);
        $this->db->select('sem_id as semester_id,sem_name as semester_name');
        $this->db->where('ins_semester.batch_id',$batch);
        $this->db->where_in('ins_semester.publish_status',$status);
        $this->db->from('ins_semester');
        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $key => $value) {
            $sem_subjects = $this->get_semester_subject($batch,$value['semester_id']);
            $result[$key]['subjects'] =  $sem_subjects;
        }
        //print_r($result);exit();
        return $result;
    }
    public function get_semester_teacher($batch,$id=NULL){
        $ar = array();
        $this->db->select('*');
        // if($id != NULL){
            $this->db->where('teacher_id',$id);
        // }
        $this->db->where('batch_id',$batch);
        $this->db->where('status',1);
        $result1 =  $this->db->get('batch_teachers')->result_array();
        foreach ($result1 as $key => $value) {
           $ar[] = $value['subject_id'];
        }
// print_r($ar);
// die();
        $status =  array(1,2,0);
        $this->db->select('sem_id as semester_id,sem_name as semester_name');
        $this->db->where('ins_semester.batch_id',$batch);
        $this->db->where_in('ins_semester.publish_status',$status);
        $this->db->from('ins_semester');
        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $key => $value) {
            $where['ins_semester.batch_id']=$batch;
            $where['ins_semester.sem_id']=$value['semester_id'];
            // $where['t.teacher_id']=$id;

            $sem_subjects = $this->get_semester_subject($where,$ar,$id);
            $result[$key]['subjects'] =  $sem_subjects;

        }
        //print_r($result);exit();
        return $result;
    }
    public function remove_favourite($data,$where){
         $this->db->where($where);
            if($this->db->update('teacher_favourite_subject',$data)){
                return 1;
            }
            else {return 0;}
    }
    public function get_favourite_subject($id){
       
        $this->db->select('a.subject_id, data.data_name,ins_semester.sem_name as semester_name, data.paper_icon,data.data_id,a.batch_id,a.favourite_status,ins_semester.sem_id as semester_id');
        $this->db->from('teacher_favourite_subject a');
        $this->db->join('data','data.data_id = a.subject_id','left');
        $this->db->join('ins_semester','ins_semester.sem_id = a.semester','left');
        $this->db->where('a.teacher_id',$id);
        $this->db->where('a.favourite_status',1);
        $query = $this->db->get();
        $result = $query->result_array();
        foreach ($result as $key => $value) {
            $result[$key]['paper_icon'] = base_url().'uploads/paper_icon/'.$value['paper_icon'];
        }
        return $result;

    }
    public function subject_already_exist($where){
            $this->db->where($where);
            $this->db->select('*');
            $this->db->from('teacher_favourite_subject');
            $query = $this->db->get();
            $result = $query->row_array();
            return  $result;
    }
    public function get_timetable_teacher($batch,$i,$teacher){
        
        $this->db->select('*');
        $this->db->where('batch_id',$batch);
        $this->db->where('weekdays',$i);
         $this->db->where('teacher_id',$teacher);
        $this->db->from('time_table');
        $query = $this->db->get();
        //echo $this->db->last_query();exit();
         $result = $query->result_array();
         if(!empty($result)){
            return $result;
         }
         else{
            return false;
         }


    }
    
    public function check_cloned_practice($id,$teacher,$semester,$subject){
        $this->db->select('id');
        $this->db->where('practice_id',$id);
        $this->db->where('teacher_id',$teacher);
        $this->db->where('semester',$semester);
        $this->db->where('subject',$subject);
        $result = $this->db->get('cloned_practice')->row_array();
        if($result['id']){
            return $result['id'];
        }else{
            return 0;
        }
    }
    public function get_user_topic_parent_check($id,$teacher,$semester,$subject){
        $this->db->select('topic_id');
        $this->db->where('cloned_id',$id);
        $this->db->where('teacher_id',$teacher);
        $this->db->where('semester',$semester);
        $this->db->where('subject',$subject);
        $result = $this->db->get('cloned_presentations')->row_array();
        if($result){
            return $result['topic_id'];
        }else{
            return false;
        }
    }
    public function get_cloned_parentid($id,$teacher){
        $this->db->select('topic_id');
        $this->db->where('cloned_id',$id);
        $this->db->where('teacher_id',$teacher);
      
        $result = $this->db->get('cloned_presentations')->row_array();
        if($result){
            return $result['topic_id'];
        }else{
            return false;
        }
    }
    public function check_cloned_practice_parent($id,$teacher,$semester,$subject){
        $this->db->select('practice_id');
        $this->db->where('id',$id);
        $this->db->where('teacher_id',$teacher);
        $this->db->where('semester',$semester);
        $this->db->where('subject',$subject);
        $result = $this->db->get('cloned_practice')->row_array();
        if($result){
            return $result['practice_id'];
        }else{
            return 0;
        }
    }
    public function get_current_semester($id,$batch){
        // print_r($id);
        if($id != ""){
            $this->db->select('sem_id as semester_id,sem_name as semester_name');
            $this->db->where('ins_semester.sem_id',$id);
            // $this->db->where('ins_semester.publish_status',1);
            $this->db->from('ins_semester');
            $query = $this->db->get();
            $result = $query->row();
           
        }else{
            $this->db->select('sem_id as semester_id,sem_name as semester_name');
            $this->db->where('ins_semester.batch_id',$batch);
            $this->db->where('ins_semester.publish_status',1);
            $this->db->from('ins_semester');
            $query = $this->db->get();
            $result = $query->row();
           
        }
        if($result){
             return $result;
         }else{
            $result= array();
            return $result;
         }
       
    }


    public function get_search_practice($keyword,$limit,$offset){
        $this->db->distinct('questions.question_id');
        $this->db->select('questions.question_code');
        $this->db->where("(tag  LIKE '%".$keyword."%' OR question_code LIKE '%".$keyword."%' )");
        $this->db->from('questions');
        $this->db->where('questions.question_status',1);
        $this->db->join('questions_tags','questions_tags.question_id=questions.question_id','left');
        $this->db->order_by('questions.question_id','desc');

        $this->db->limit($limit,$offset);

        $query = $this->db->get();
        //echo $this->db->last_query();exit();
        return $result = $query->result_array();
        //print_r($result);exit();

    }

     public function get_search_exercise($keyword,$limit,$offset){
        $this->db->distinct('exercise_topic.ex_topic_id');
        $this->db->select('exercise_topic.ex_topic_title');
        $this->db->where("(exercise_tag  LIKE '%".$keyword."%' OR ex_topic_title LIKE '%".$keyword."%' )");
        $this->db->from('exercise_topic');
        $this->db->where('exercise_topic.ex_topic_status',1);
        $this->db->join('exercise_tag','exercise_tag.exercise_id=exercise_topic.ex_topic_id','left');
        $this->db->order_by('exercise_topic.ex_topic_id','desc');

        $this->db->limit($limit,$offset);

        $query = $this->db->get();
        //echo $this->db->last_query();exit();
        return $result = $query->result_array();
        //print_r($result);exit();

    }
    public function get_subject_data($subject){
        
        $this->db->select('data_id,data_name');
        $this->db->where('data_id',$subject);
        $this->db->where('data_status',1);
        $this->db->from('data');
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['data_name'];
    }
    public function get_batch_code($id){
        $fields = 'batch_name,batch_code,batch_start_date,batch_end_date,batch_start_time,
        batch_end_time,course_id,institute_id,batch_periods';
        
        $this->db->select($fields);
        $this->db->where('batch_code',$id);
        $this->db->from('batch');
        $query = $this->db->get();
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





    // **********************************************************************************************//
    ///////////////////////////Additional 2021///////////////////////////////////////

    public function list_assignment($semester,$subject,$uid){
        // print_r($this->session->userdata('admin_role'));
        // die();


     
        $this->db->where('assignment_status',1);
        $this->db->where('semester',$semester);
        $this->db->where('subject',$subject);
        $this->db->where('created_by',$uid);
        // $this->db->limit($limit,$offset);
        $result = $this->db->get('assignment')->result_array();
    // echo $this->db->last_query();
        return $result;
        
    }
    public function list_closed_assignment($semester,$subject,$uid){
 
        $this->db->where('assignment_status',2);
        $this->db->where('semester',$semester);
        $this->db->where('subject',$subject);
        $this->db->where('created_by',$uid);
        // $this->db->limit($limit,$offset);
        $result = $this->db->get('assignment')->result_array();
        return $result;
        
    }

    public function edit_assignment($id,$data){
        $this->db->where('assignment_id',$id);
        if($this->db->update('assignment',$data)) return true;
        return false;
    }
    public function get_assignment($id){
        $this->db->where('assignment_id',$id);
        $this->db->where('assignment_status >',0);
        $result  =  $this->db->get('assignment')->row_array();
        return $result;

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

    public function list_assignment_students($semester,$subject,$asid){
        $teacher = $this->session->userdata('teacher_id');

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
        $result =  $this->db->get('student')->result_array();
        $pstatus = $this->assignment_mark_publishstatus($asid);
        // print_r($pstatus);
        // die();
            foreach ($result as $key => $value) {
                if($pstatus ==1){

                    $this->db->where('assignment_id',$asid);
                    $this->db->where('student_id',$value['id']);
                    $marks  =  $this->db->get('assignment_marks')->row_array();
                    if(!empty($marks)){
                        $result[$key]['marks'] = $marks['marks'];

                    }else{
                        $result[$key]['marks'] = 0;

                    }
                }

                $assignment_files = $this->assignment_student_view($asid,$value['id']);
                foreach ($assignment_files as $key1 => $value1) {
                    $assignment_files[$key1]['file'] = base_url().'uploads/assignment/'.$value1['file'];
                }
                $result[$key]['assignment_files'] = $assignment_files;


            }
        

        return $result;
    }

    
    public function assignment_mark_publishstatus($id){
        $this->db->where('assignment_id',$id);
        $this->db->where('assignment_status >',0);
        $result  =  $this->db->get('assignment')->row_array();
        return $result['assignment_publish_status'];

        

    }

    public function assignment_student_view($id,$studentid){
        $teacher = $this->session->userdata('teacher_id');
        $this->db->select('*');
        $this->db->where('assignment_id',$id);
        $this->db->where('user_id',$studentid);
        $this->db->where('status',1);
        return $this->db->get('assignment_submit')->result_array();
    }
    public function edit_assignment_submit($aid,$sid,$data){
        $this->db->where('assignment_id',$aid);
        $this->db->where('user_id',$sid);
        if($this->db->update('assignment_submit',$data)) return true;
        return false;
    }
     public function check_expiry_date($where){
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


    /////////////////////semester plan chapter list//////////////////
    public function semester_plan_chapter($semester,$subject,$teacher){
       

        $this->db->select('data_id,data_name,data.updated_on,admin_name,data.updated_by,start_date,end_date,chapter_plan.id ');
        $this->db->join('admins','admins.admin_id=data.updated_by ','left');
        // $this->db->join('chapter_publish','chapter_publish.chapter_id = data.data_id AND chapter_publish.teacher_id='.$teacher,'left');
        $this->db->join('chapter_plan','chapter_plan.chapter = data.data_id','left');
        $this->db->where('data_status',1);
        $this->db->where('data_type',2);
        $this->db->where('data_parent',$subject);
        $this->db->where("(semester ='$semester' OR semester is NULL)");
        $this->db->where("(subject ='$subject' OR subject is NULL)");
        $this->db->where("(teacher ='$teacher' OR teacher is NULL)" );
        $this->db->order_by('data_id','desc');
        return $this->db->get('data')->result_array();
    }

     public function semester_plan_content($chapter,$id,$semester){
        
        
        $this->db->select('semester_plan.id as semplanid,chapter_design.id, chapter_design.chapter_id, `type`, `type_id`, `status`, chapter_design.created_on, chapter_design.updated_on, chapter_design.updated_by, `presentation`, `topic_title`, `topic_color`, `topic_backgroundcolor`, `topic_backgroundimage`, `topic_type`, `topic_status`, `topic_bordercolor`, `topic_fontsize`, `topic_position_left`, `topic_position_top`, `topic_width`, `topic_height`, `topic_content_position_left`,publish_status, `topic_content_position_top`,admin_name,teacher_id,content_start_date,content_end_date');
        $this->db->where('chapter_design.chapter_id',$chapter);
        $this->db->where('chapter_design.status >',0);
       
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
        $this->db->where('semester_plan.chapter',$chapter);
        $this->db->where('semester_plan.content_id',0);

        $this->db->where('semester_plan.teacher',$id);
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



        $x=0;
        foreach ($result as $value) {
            $result[$x]['ttitle'] = strip_tags($value['topic_title']);
           

          
            $x++;
        }

        return $result;
    }

    public function get_semester_btach($semester){

        $this->db->select('ins_semester.batch_id');
        $this->db->where('ins_semester.sem_id',$semester);
        $this->db->where('ins_semester.publish_status !=',3);
        $this->db->from('ins_semester');
        $sem_query = $this->db->get();
        $sem_result = $sem_query->row_array();
        $batch =  $sem_result['batch_id'];
        return $batch;
    }
    public function get_wall($batch){

        $this->db->select('*');
        $this->db->where('batch_id',$batch);
        $this->db->from('wall_notifications');
        $sem_query = $this->db->get();
        $sem_result = $sem_query->result_array();
        return $sem_result;
    }
    public function get_wall_teacher($id){

        $batch = array();
        $this->db->select('*');
        $this->db->where('teacher_id',$id);
        // $this->db->where('batch_id',$batch);
        $this->db->where('status',1);
        $result1 =  $this->db->get('batch_teachers')->result_array();
        foreach ($result1 as $key => $value) {
           $batch[] = $value['batch_id'];
        }

        $this->db->select('*');
        $this->db->where_in('batch_id',$batch);
        $this->db->from('wall_notifications');
        $sem_query = $this->db->get();
        $sem_result = $sem_query->result_array();
        return $sem_result;
    }


    public function delete_wall_like($id,$wallid,$utype){
        $this->db->where('user_id',$id);
        $this->db->where('wall_id',$wallid);
        $this->db->where('user_type',$utype);
        if($this->db->delete('wall_like')) return true;
        else return false;

    }

    public function delete_comment($id,$data){
        $this->db->where('id ',$id);
        if($this->db->update('wall_comment',$data)) return true;
        else return false;

    }

    public function check_total_user_report($id,$usertype){
        $date = date('Y-m-d H');
        $this->db->where('user_id',$id);
        $this->db->where('user_type',$usertype);
        $this->db->where('DATE(created_at)',$date);
        $count = $this->db->count_all_results('report_comment');

    }

    public function checktotal_user_comment_report($comment_id,$id,$usertype){
        $this->db->where('comment_id',$comment_id);
        $this->db->where('user_id',$id);
        $this->db->where('user_type',$usertype);
        $count = $this->db->count_all_results('report_comment');
    }
    
     public function get_comments($wallid){

        
        $this->db->select('*,student.name ,teachers.teacher_name,user_type');
        $this->db->join('student','student.id = wall_comment.user_id AND user_type=0','left');
        $this->db->join('teachers','teachers.teacher_id = wall_comment.user_id AND user_type=1','left');
        $this->db->where_in('wall_id',$batch);
        $this->db->from('wall_comment');
        $query = $this->db->get();
        $comments = $query->result_array();
        return $comments;
    }


   
}