<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PresentationModel extends CI_Model {

    function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
         $query = $this->db->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");


    }



    public function add_data($data,$table){
        if($this->db->insert($table,$data)) {
        // echo $this->db->last_query();exit(); 
              return $this->db->insert_id();

        }
        else {return 0;}
    }

    public function add_batch($data,$table){
        if($this->db->insert_batch($table,$data)) return $this->db->insert_id();
        else return 0;
    }

    public function add_sub_insert($data,$table){
           $data_sub=array();
        foreach ($data as $key => $value) {

            foreach ($value['ans_values'] as $key1 => $value_val) {
               $value1['ans_values']=$value_val;
               // echo json_encode($value['sub_line'][$key1]);

               $value1['is_underline']=$value['sub_line'][$key1];
               
               $value1['column_id']=$value['column_id'];
               $value1['ans_table_id']=$value['table_id'];
               $value1['rows']=$key1;
               $value1['question_id']=$value['question_id'];
               array_push($data_sub, $value1);

            }

           
    }
        // exit(); 

    
        if($this->db->insert_batch($table,$data_sub)) return $this->db->insert_id();
         else return 0;
    }

    
    public function list_presentation($limit,$offset,$filter){
        // print_r($this->session->userdata('admin_role'));
        // die();
        if($filter['name']){
            $this->db->where('presentation_title LIKE','%'.$filter['name'].'%');
        }
        $this->db->where('presentation_status >',0);
         if($this->session->userdata('admin_role')==1 || $this->session->userdata('admin_role')==3){ 
        
            }else{
                $this->db->where('updated_by',$this->session->userdata('admin_id'));
            }
        
        $this->db->limit($limit,$offset);
        $result = $this->db->get('presentation')->result_array();
        $x = 0;
        foreach ($result as $value) {
            $this->db->where('topic_presentation_id',$value['presentation_id']);
            $this->db->where('topic_status >',0);
            $this->db->where('topic_parent',0);
            $results = $this->db->get('presentation_topic')->row_array();
            $result[$x]['topic_id']  = $results['topic_id'];

            if($filter['name']){
                // $this->db->where('tag LIKE','%'.$filter['name'].'%');
            }
            $this->db->where('presentation_id',$value['presentation_id']);
            $tags = $this->db->get('presentation_tags')->result_array();
            // echo $this->db->last_query();
            // print_r($tags);
            $ptag = array();
            foreach ($tags as $tag) {
                $ptag[] = $tag['tag'];
            }
            $result[$x]['tags']  = implode(',', $ptag);
            $x++;



        }

        return $result;
        
    }
    public function count_presentation($filter){
        if($filter['name']){
            $this->db->where('presentation_title LIKE','%'.$filter['name'].'%');
        }
        if($this->session->userdata('admin_role')==1 || $this->session->userdata('admin_role')==3){ 
        
            }else{
                $this->db->where('updated_by',$this->session->userdata('admin_id'));
            }
        $this->db->where('presentation_status >',0);
        return $this->db->count_all_results('presentation');        
    }
     

    

    public function get_presentation($id){
        $this->db->where('presentation_id',$id);
        $this->db->where('presentation_status >',0);
        $result  =  $this->db->get('presentation')->row_array();
        
        $this->db->where('presentation_id',$id);
        $tags = $this->db->get('presentation_tags')->result_array();
        $tg = array();
        foreach ($tags as $tag) {
            $tg[] = $tag['tag'];
        }
      $result['tags']  = implode(",", $tg);

        return $result;



        //   $sql = "SELECT pc_scr_presentation.presentation_id,presentation_title,presentation_status, GROUP_CONCAT(pc_scr_presentation_tags.tag SEPARATOR ',') keywords, GROUP_CONCAT(pc_scr_presentation_tags.presentation_tag_id SEPARATOR ',') keywords_id FROM pc_scr_presentation INNER JOIN pc_scr_presentation_tags ON FIND_IN_SET(pc_scr_presentation_tags.presentation_tag_id, pc_scr_presentation_tags.tag) > 0 where pc_scr_presentation.presentation_id = ? ";
        // return $this->db->query($sql,array($id))->row_array();
    }
   

    public function edit_presentation($id,$data){
        $this->db->where('presentation_id',$id);
        if($this->db->update('presentation',$data)) return true;
        return false;
    }
   
     public function get_topic_id($subid){
        // $this->db->where('topic_status >',0);
        // return $this->db->count_all_results('presentation_topic');
        $this->db->select('MAX(topic_id) as id');
        $this->db->where('topic_parent',$subid);
        $this->db->where('topic_status >',0);

        $result = $this->db->get('presentation_topic')->row_array();
        // if(!empty($result)){
          return $result['id'];
        // }else{
        //   return 0;
        // }
    }
     public function get_topic_order($subid){
        // $this->db->where('topic_status >',0);
        // return $this->db->count_all_results('presentation_topic');
        $this->db->select('topic_order');
        $this->db->where('topic_parent',$subid);
        $this->db->where('topic_status >',0);
        $this->db->order_by('topic_order','desc');
        $this->db->limit('1');
        $result = $this->db->get('presentation_topic')->row_array();
        // if(!empty($result)){
          return $result['topic_order'];
        // }else{
        //   return 0;
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
                    // $myimage = str_replace(' ', '%20', $myimage);
                    // $path =  base_url().'uploads/background/';
                       
                    //   // Test if string contains the word 
                    // if(strpos($myimage, $word) !== false){
                    //       $path =  base_url().'uploads/';
                    // } 
                    $path = "";
                    $result['topic_backgroundimage'] = $path.$myimage;
            }

            $result['ttitle'] = html_entity_decode(strip_tags($result['topic_title']));
            $this->db->select('*');
            $this->db->where('topic_status >',0);
            $this->db->where('topic_parent',$id);
            $results = $this->db->get('presentation_topic')->result_array();
            $x =0;
            foreach ($results as $value) {
                if($value['topic_backgroundimage'] != ""){
                    $word = "chapter";
                    $myimage = $value['topic_backgroundimage'];
                    //  $myimage = str_replace(' ', '%20', $myimage);
                    // $path =  base_url().'uploads/background/';
                       
                    //   // Test if string contains the word 
                    // if(strpos($myimage, $word) !== false){
                    //       $path =  base_url().'uploads/';
                    // } 
                    $path = "";
                    $results[$x]['topic_backgroundimage'] = $path.$myimage;
                }
                $results[$x]['ttitle'] = html_entity_decode(strip_tags($value['topic_title']));
                $x++;
            }
            $result['topics'] = $results;
            
        return $result;

    }
    public function list_presentation_slide($id){
        
        $this->db->select('*');
        $this->db->where('topic_presentation_id',$id);
        $this->db->where('topic_parent',0);
        $this->db->where('topic_status >',0);
        $result = $this->db->get('presentation_topic')->result_array();
        $x = 0;
         foreach ($result as $value) {
             if($value['topic_backgroundimage'] != ""){
                    $word = "chapter";
                    $myimage = $value['topic_backgroundimage'];
                     $myimage = str_replace(' ', '%20', $myimage);
                    $path =  base_url().'uploads/background/';
                       
                      // Test if string contains the word 
                    if(strpos($myimage, $word) !== false){
                          $path =  base_url().'uploads/';
                    } 
                    $result[$x]['topic_backgroundimage'] = $path.$myimage;
                }
                $x++;
            }
            // $this->db->select('*');
            // $this->db->where('topic_status >',0);
            // $this->db->where('topic_presentation_id',$id);
            // $this->db->where('topic_parent',0);
            // $result['topics'] = $this->db->get('presentation_topic')->result_array();
        return $result;

    }

    public function list_presentations($id){
        
        $this->db->select('*');
        $this->db->where('topic_parent',0);
        $this->db->where('topic_presentation_id !=',0);

        $this->db->where('topic_id !=',$id);

        $this->db->where('topic_status >',0);
        
        $this->db->order_by('topic_presentation_id','desc');
        $this->db->limit('10');
        $result = $this->db->get('presentation_topic')->result_array();
        $x=0;
        foreach ($result as $value) {
             if($value['topic_backgroundimage'] != ""){
                    $word = "chapter";
                    $myimage = $value['topic_backgroundimage'];
                     $myimage = str_replace(' ', '%20', $myimage);
                    $path =  base_url().'uploads/background/';
                       
                      // Test if string contains the word 
                    if(strpos($myimage, $word) !== false){
                          $path =  base_url().'uploads/';
                    } 
                    $result[$x]['topic_backgroundimage'] = $path.$myimage;
                }
            $this->db->where('presentation_id',$value['topic_presentation_id']);
            $this->db->where('presentation_status >',0);
            $presult = $this->db->get('presentation')->row_array();
            $result[$x]['presentation_title'] = $presult['presentation_title'];
            $x++;
        }
            // $this->db->select('*');
            // $this->db->where('topic_status >',0);
            // $this->db->where('topic_presentation_id',$id);
            // $this->db->where('topic_parent',0);
            // $result['topics'] = $this->db->get('presentation_topic')->result_array();
        return $result;

    }



     public function list_presentation_chapter(){
        
        $this->db->select('*');
        $this->db->where('topic_parent',0);
        $this->db->where('topic_presentation_id !=',0);
        $this->db->where('topic_status >',0);
        $this->db->limit('20');

        $result = $this->db->get('presentation_topic')->result_array();
        $x=0;
        foreach ($result as $value) {
            if($value['topic_backgroundimage'] != ""){
                    $word = "chapter";
                    $myimage = $value['topic_backgroundimage'];
                     $myimage = str_replace(' ', '%20', $myimage);
                    $path =  base_url().'uploads/background/';
                       
                      // Test if string contains the word 
                    if(strpos($myimage, $word) !== false){
                          $path =  base_url().'uploads/';
                    } 
                    $result[$x]['topic_backgroundimage'] = $path.$myimage;
                }
            $this->db->where('presentation_id',$value['topic_presentation_id']);
            $this->db->where('presentation_status >',0);
            $presult = $this->db->get('presentation')->row_array();
            $result[$x]['presentation_title'] = $presult['presentation_title'];
            $x++;
        }
            // $this->db->select('*');
            // $this->db->where('topic_status >',0);
            // $this->db->where('topic_presentation_id',$id);
            // $this->db->where('topic_parent',0);
            // $result['topics'] = $this->db->get('presentation_topic')->result_array();
        return $result;

    }

    public function get_problem_solving($id){
        $this->db->select('question_id,question_title,question_code');
        $this->db->where('question_status',1);
         $this->db->limit('10');
        //$this->db->where('chapter_id',$id);
        return $this->db->get('questions')->result_array();
    }


    public function get_exercise(){
        $this->db->select('ex_topic_id,ex_topic_title');
        $this->db->where('ex_topic_status',1);
        $this->db->join('exercise','exercise.exercise_title=exercise_topic.ex_topic_id','left');
        $this->db->group_by('exercise_topic.ex_topic_id');
        //$this->db->where('chapter_id',$id);
        return $this->db->get('exercise_topic')->result_array();
    }

    public function get_vedio(){
        $this->db->select('video_id,video_title,video_link,thumb_nail');
        $this->db->where('video_status',1);
        $this->db->where('type','1');
        return $this->db->get('video')->result_array();
    }

    public function get_pdf(){
        $this->db->select('video_id,video_title,video_link');
        $this->db->where('video_status',1);
        $this->db->where('type','2');
        return $this->db->get('video')->result_array();
    }


    public function add_keywords_presentation($data){
        if($this->db->insert('presentation_tags',$data)) return true;
        else return 0; 
    }
    public function add_keywords_image($data){
        if($this->db->insert('image_tags',$data)) return true;
        else return 0; 
    }
     public function add_keywords_topics($data){
        if($this->db->insert('topic_tags',$data)) return true;
        else return 0; 
    }
     public function add_keywords_question($data){
        if($this->db->insert('presentation_question_tags',$data)) return true;
        else return 0; 
    }
    
    // add_keywords_topics
    // public function get_topic($id){
    //     // $this->db->where('topic_status >',0);
    //     // return $this->db->count_all_results('presentation_topic');
    //     $this->db->select('*');
    //     $this->db->where('topic_id',$id);
    //     return $this->db->get('presentation_topic')->row_array();
       
    // }
    public function check_title($title){
        $this->db->where('presentation_title',$title);
        $this->db->where('presentation_status >',0);
        return $this->db->count_all_results('presentation');
         // $this->db->get('presentation')->result_array();
    }
    


    // public function list_presentation_topic($id){
    //     // 
    //     // return $this->db->count_all_results('presentation_topic');
    //     $this->db->select('*');
    //     $this->db->where('topic_status >',0);
    //     $this->db->where('topic_id',$id);
    //     $result = $this->db->get('presentation_topic')->row_array();
    //         if($result['topic_backgroundimage'] != ""){
    //                 $word = "chapter";
    //                 $myimage = $result['topic_backgroundimage'];
    //                 $myimage = str_replace(' ', '%20', $myimage);

    //                 $path =  base_url().'uploads/background/';
                       
    //                   // Test if string contains the word 
    //                 if(strpos($myimage, $word) !== false){
    //                       $path =  base_url().'uploads/';
    //                 } 
    //                 $result['topic_backgroundimage'] = $path.$myimage;
    //         }
    //     // $x=0;
    //     // foreach ($result as $value) {
    //         if($result!=""){

    //         $this->db->select('*');
    //         $this->db->where('topic_status >',0);
    //         $this->db->where('topic_parent',$id);
    //         $this->db->where('practice_type !=',3);

    //         $topics = $this->db->get('presentation_topic')->result_array();
    //         $x =0;
    //         foreach ($topics as $value) {
    //             if($value['topic_backgroundimage'] != ""){
    //                 $word = "chapter";
    //                 $myimage = $value['topic_backgroundimage'];
    //                 $myimage = str_replace(' ', '%20', $myimage);

    //                 $path =  base_url().'uploads/background/';
                       
    //                   // Test if string contains the word 
    //                 if(strpos($myimage, $word) !== false){
    //                       $path =  base_url().'uploads/';
    //                 } 
    //                 $topics[$x]['topic_backgroundimage'] = $path.$myimage;
    //             }


    //             $this->db->select('*');
    //             $this->db->where('topic_status >',0);
    //             $this->db->where('topic_parent',$value['topic_id']);
    //             $this->db->where('practice_type',3);
    //             $topicssame = $this->db->get('presentation_topic')->row_array();
                
    //              // foreach ($topicssame as $valuesame) {
    //                 if($topicssame['topic_backgroundimage'] != ""){
    //                     $word = "chapter";
    //                     $myimage = $topicssame['topic_backgroundimage'];
    //                     $myimage = str_replace(' ', '%20', $myimage);

    //                     $path =  base_url().'uploads/background/';
                           
    //                       // Test if string contains the word 
    //                     if(strpos($myimage, $word) !== false){
    //                           $path =  base_url().'uploads/';
    //                     } 
    //                     $topicssame['topic_backgroundimage'] = $path.$myimage;
    //                 }
    //                 // $x++;
    //              // }
    //                 $sametopcount = 0;

    //                     if(!empty($topicssame)){
    //                          $topicssame['sametopcount'] = $sametopcount;
    //                         $sametopcount = 1;
    //                         $topics[] = $topicssame;
    //                     }
    //                 $topics[$x]['sametopcount'] = $sametopcount;




    //             $x++;
    //         }


    //         $result['topics'] = $topics;
    //          // print_r($result);
    //          // die();

    //             if($result['topic_parent'] == 0){
    //                 $this->db->select('*');
    //                 $this->db->where('topic_status >',0);
    //                 $this->db->where('topic_id',$id);
    //                 $topic = $this->db->get('presentation_topic')->result_array();
    //                 $x =0;
    //                 foreach ($topic as $value) {
    //                     if($value['topic_backgroundimage'] != ""){
    //                         $word = "chapter";
    //                         $myimage = $value['topic_backgroundimage'];
    //                         $myimage = str_replace(' ', '%20', $myimage);

    //                         $path =  base_url().'uploads/background/';
                               
    //                           // Test if string contains the word 
    //                         if(strpos($myimage, $word) !== false){
    //                               $path =  base_url().'uploads/';
    //                         } 
    //                         $topic[$x]['topic_backgroundimage'] = $path.$myimage;
    //                     }
    //                     $x++;
    //                 }
    //                $result['topic'] =  $topic ;

    //             }else{
    //                     $this->db->select('*');
    //                     $this->db->where('topic_status >',0);
    //                     $this->db->where('topic_parent',$result['topic_parent']);
    //                     $topic = $this->db->get('presentation_topic')->result_array();
    //                      $x =0;
    //                     foreach ($topics as $value) {
    //                         if($value['topic_backgroundimage'] != ""){
    //                             $word = "chapter";
    //                             $myimage = $value['topic_backgroundimage'];
    //                             $myimage = str_replace(' ', '%20', $myimage);

    //                             $path =  base_url().'uploads/background/';
                                   
    //                               // Test if string contains the word 
    //                             if(strpos($myimage, $word) !== false){
    //                                   $path =  base_url().'uploads/';
    //                             } 
    //                             $topic[$x]['topic_backgroundimage'] = $path.$myimage;
    //                         }
    //                         $x++;
    //                     }
    //                      $result['topic'] = $topic;
    //             }    
    //         }else{
    //             $result = false;
    //         }
    //                 $this->db->select('*');
    //                 $this->db->where('image_status >',0);
    //                 $this->db->where('image_topic_id',$id);
    //                 $result['image'] = $this->db->get('presentation_topic_images')->result_array();
                
    //     // }

    //     return $result;
    // }


    public function list_presentation_topic($id){
            // return $this->db->count_all_results('presentation_topic');
        $this->db->select('*');
        $this->db->where('topic_status >',0);
        $this->db->where('topic_id',$id);
        $result = $this->db->get('presentation_topic')->row_array();
          
        // $x=0;
        // foreach ($result as $value) {
            if($result!=""){

            $this->db->select('*');
            $this->db->where('topic_status >',0);
            $this->db->where('topic_parent',$id);
            $this->db->where('practice_type !=',3);

            $topics = $this->db->get('presentation_topic')->result_array();
            $x =0;


                    $this->db->select('*');
                    $this->db->where('topic_status >',0);
                    $this->db->where('display_parent',$id);
                    $this->db->where('practice_type',3);
                    $topicssame = $this->db->get('presentation_topic')->result_array();
                    if(!empty($topicssame)){
                        foreach ($topicssame as $key => $valuesame) {
                            array_push($topics,$valuesame);                         
                        }
                    }
            foreach ($topics as $value) {
               
                            $topics[$x]['sametopcount'] =0;
                             $topics[$x]['sametopid'] = 0;
                                $topics[$x]['sametopicstatus'] = 0;
                            $this->db->where('topic_status >',0);
                            $this->db->where('topic_parent',$value['topic_id']);
                            $this->db->where('display_parent',$id);
                            $this->db->where('practice_type',3);
                            $smcount = $this->db->count_all_results('presentation_topic');
                            if($smcount>0){
                                $topics[$x]['sametopcount'] =1;

                            }
                                

                            
                            if($value['practice_type']=='3'){
                                $topics[$x]['sametopid'] = $value['topic_parent'];
                                $topics[$x]['sametopicstatus'] = 1;
                            }


             $x++;
            }

            $result['topics'] = $topics;
            $this->db->select('*');
                    $this->db->where('image_status',1);
                    $this->db->where('image_topic_id',$id);
                    $result['image'] = $this->db->get('presentation_topic_images')->result_array();

                 
            }else{
                $result = false;
            }
                   
                
        // }

        return $result;
    }
    



    
  
    public function update_topic($id,$data){
        $this->db->where('topic_id',$id);
        if($this->db->update('presentation_topic',$data)) return true;
        return false;
    }
    public function edit_topic($id,$data){
        $this->db->where('topic_presentation_id',$id);
        if($this->db->update('presentation_topic',$data)) return true;
        return false;
    }
    

    
    public function update_image($data,$id){
        $this->db->where('image_id',$id);
        if($this->db->update('presentation_topic_images',$data)) return true;
        return false;
    }


      public function update_topic_parent($id,$data){
        $this->db->where('topic_parent',$id);
        if($this->db->update('presentation_topic',$data)) return true;
        return false;
    }



     public function get_topics($id){

        $this->db->select('*');
        $this->db->from('presentation_topic');
        $this->db->where('topic_id', $id);
        $this->db->where('topic_status >',0);


        $parent = $this->db->get();
        
        $topics = $parent->row_array();

         $this->db->where('topic_status >',0);
                    $this->db->where('topic_parent',$topics['topic_id']);
                    $this->db->where('display_parent',$id);
                    $this->db->where('practice_type',3);
                    $smcount = $this->db->count_all_results('presentation_topic');
                    if($smcount>0){
                        $topics['sametopcount'] =1;

                    }else{
                        $topics['sametopcount'] =0;

                    }
                    $topics['sametopid'] = 0;
                    $topics['sametopicstatus'] = 0;

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
           $st =html_entity_decode(strip_tags($topics['topic_title']));
            $tit = substr($st, 0, 10);
        $topics['ttitle'] =  $tit." ...";;
           
        if(!empty($topics)){
              $this->db->select('*');
                    $this->db->where('image_status',1);
                    $this->db->where('image_topic_id',$topics['topic_id']);
                    $topics['image'] = $this->db->get('presentation_topic_images')->result_array();
             $topics['sub'] = $this->get_sub_topics($topics['topic_id']);
           

            $i++;
        }else{
            $topics = false;
        }
        
        return $topics;
        
    }

    public function get_sub_topics($id){

        $this->db->select('*');
        $this->db->from('presentation_topic');
        $this->db->where('topic_status >',0);
        $this->db->where('practice_type !=',3);
        $this->db->where('topic_parent', $id);

        $child = $this->db->get();
        $topics = $child->result_array();

          $i=0;
        $sametopcount = 0;
        $sametopid = 0;


                    $this->db->select('*');
                    $this->db->where('topic_status >',0);
                    $this->db->where('display_parent',$id);
                    $this->db->where('practice_type',3);
                    $topicssame = $this->db->get('presentation_topic')->result_array();
                if(!empty($topicssame)){

                    foreach ($topicssame as $key => $valuesame) {
         

                        array_push($topics,$valuesame);
                          
                         
                    }
                    // $topics[] = $topicssame;

                }
       
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


                   
                     $this->db->where('topic_status >',0);
                            $this->db->where('topic_parent',$p_cat['topic_id']);
                            $this->db->where('display_parent',$id);

                            $this->db->where('practice_type',3);
                            $smcount = $this->db->count_all_results('presentation_topic');
                            if($smcount>0){
                                $topics[$i]['sametopcount'] =1;

                            }else{
                                $topics[$i]['sametopcount'] =0;

                            }
                            if($p_cat['practice_type']=='3'){
                                $topics[$i]['sametopid'] = $p_cat['topic_parent'];
                                $topics[$i]['sametopicstatus'] = 1;
                            }else{
                                $topics[$i]['sametopid'] = 0;
                                $topics[$i]['sametopicstatus'] = 0;

                                $this->db->select('*');
                                $this->db->where('image_status',1);
                                $this->db->where('image_topic_id',$p_cat['topic_id']);
                                $topics[$i]['image'] = $this->db->get('presentation_topic_images')->result_array();
                            }
                   

                    $st =html_entity_decode(strip_tags($p_cat['topic_title']));
                    $tit = substr($st, 0, 10);
                    $topics[$i]['ttitle'] = $tit." ...";

                    $this->db->select('*');
                    $this->db->where('image_status',1);
                    $this->db->where('image_topic_id',$p_cat['topic_id']);
                    $topics[$i]['image'] = $this->db->get('presentation_topic_images')->result_array();
            $topics[$i]['sub'] = $this->get_sub_topics($p_cat['topic_id']);
                 if($topics[$i]['sub']){
                $topics[$i]['childhas'] = 1;
             }else{
                $topics[$i]['childhas'] = 0;
             }

            $i++;
        }
        

        return $topics;       
    }

    public function get_topic_main_parent($id){
        
        $this->db->select('topic_parent,topic_id');
        $this->db->where('topic_status >',0);
        $this->db->where('topic_id',$id);
        $result = $this->db->get('presentation_topic')->row_array();
                
        if($result['topic_parent'] == 0){
            return $result['topic_id'];
        }else{
            return $this->get_topic_main_parent($result['topic_parent']);
        }

    }
     public function get_chapter($id){
        $this->db->where('status >',0);
        $this->db->where('id',$id);
        $result = $this->db->get('chapter_design')->row_array();
        $result['ttitle'] = html_entity_decode(strip_tags($result['topic_title']));
        return $result;

    }

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
        $result['contents'] = $this->db->get('chapter_design')->result_array();
        return $result;

    }
    public function update_chapter($id,$data){
        $this->db->where('id',$id);
        if($this->db->update('chapter_design',$data)) return true;
        return false;
    }


    public function check_data($id,$cid,$type){
        
        $this->db->where('type_id',$id);
        $this->db->where('type',$type);
        $this->db->where('chapter_id',$cid);
        $this->db->where('status >',0);
        return $this->db->count_all_results('chapter_design');
    }
    
    public function get_user_topic($id,$teacher,$semester,$subject){
        // $this->db->select('topic_id');
        // $this->db->where('topic_status >',0);
        // $this->db->where('copy_topic',$id);
        // $this->db->where('user_id',$this->session->userdata('admin_id'));
        // $result = $this->db->get('presentation_topic')->row_array();
       
        // if($result['topic_id']){
        //     return $result['topic_id'];
        // }else{
        //     return false;
        // }

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
        if(!empty($results)){
        foreach ($results as $value) {
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
                if($this->session->userdata('teacher_id') !=""){
                        $utypeid = $this->get_user_topic($typeid);

                }else{
                        $utypeid = $typeid;

                }
                $results[$x]['link'] = base_url().'presentation-slide-view/'.$utypeid;

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

            }
            else if($type =='6'){
                //exercise
                    $results[$x]['link'] = base_url().'uploads/chapter/'.$value['image'];

            }

            $x++;
        }
    }
        $result['contents'] = $results;
        return $result;

    }
   
    public function update_chapter_background($id,$data){
        $this->db->where('data_id',$id);
        if($this->db->update('data',$data)) return true;
        return false;
    }
    public function list_images(){
        $this->db->order_by('id','desc');
        $this->db->limit('10');
        $results = $this->db->get('chapter_image')->result_array();
        return $results;
    }
    
    public function get_image($term){
        $this->db->select('chapter_image,chapter_id');
        if($term !=""){
            $this->db->where('tag LIKE','%'.$term.'%');
        }
        $this->db->order_by('id','desc');
        $this->db->join('image_tags','image_tags.image_id=chapter_image.id','left');
        $this->db->group_by('chapter_image.id');
        $results = $this->db->get('chapter_image')->result_array();
        return $results;
    }
    public function deletePresentationtags($id){
         $this->db->where('presentation_id',$id);
        if($this->db->delete('presentation_tags')) return true;
        else return false;
    }
    public function get_presentation_search($term){
        // $this->db->select('chapter_image,chapter_id');

        $this->db->where('presentation_status >',0);
         if($term !=""){
            $this->db->where('(presentation_tags.tag LIKE "%'.$term.'%" OR presentation.presentation_title LIKE "%'.$term.'%")');
        }
        $this->db->order_by('presentation.presentation_id','desc');
        $this->db->join('presentation','presentation_topic.topic_presentation_id=presentation.presentation_id','left');
        $this->db->join('presentation_tags','presentation_tags.presentation_id=presentation.presentation_id','left');
        $this->db->group_by('presentation_topic.topic_presentation_id');

        $result  =  $this->db->get('presentation_topic')->result_array();
          $x =0;
                        foreach ($result as $value) {
                            if($value['topic_backgroundimage'] != ""){
                                $word = "chapter";
                                $myimage = $value['topic_backgroundimage'];
                                 $myimage = str_replace(' ', '%20', $myimage);
                                $path =  base_url().'uploads/background/';
                                   
                                  // Test if string contains the word 
                                if(strpos($myimage, $word) !== false){
                                      $path =  base_url().'uploads/';
                                } 
                                $topic[$x]['topic_backgroundimage'] = $path.$myimage;
                            }
             $topic[$x]['ttitle'] = html_entity_decode(strip_tags($value['topic_title']));
                            
                            $x++;
                        }
        return $result;


    }


    public function chapter_paper($id){
        $this->db->select('data_parent');
         $this->db->where('data_status',1);
        $this->db->where('data_type',2);
        $this->db->where('data_id',$id);
        $result = $this->db->get('data')->row_array();
        if($result){
            return $result['data_parent'];
        }else{
            return false;
        }
    }

    public function get_presentation_name($id){
        $this->db->select('presentation_title');
        $this->db->where('presentation_topic.topic_id',$id);
        $this->db->where('presentation_status >',0);
        $this->db->join('presentation','presentation_topic.topic_presentation_id=presentation.presentation_id','left');
        $result  =  $this->db->get('presentation_topic')->row_array();
        return $result['presentation_title'];

    }
     public function get_practice($term){
        
        
        $this->db->order_by('question_id','desc');
       $this->db->select('question_id,question_title,question_code');
        $this->db->where('question_status',1);
        if($term !=""){
            $this->db->where('question_code LIKE','%'.$term.'%');
        }
        //$this->db->where('chapter_id',$id);
        return $this->db->get('questions')->result_array();
    }

    public function get_question_tags(){
        
        $this->db->select('question_tag_id,tag');
        return $this->db->get('presentation_question_tags')->result_array();
    }

   


     public function get_slide_search($term,$id){

        $this->db->select('*');
        $this->db->from('presentation_topic');
        $this->db->where('topic_id', $id);
        $this->db->where('topic_status >',0);
        if($term !=""){
            $this->db->where('topic_title LIKE','%'.$term.'%');
        }

        $parent = $this->db->get();
        
        $topics = $parent->row_array();

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
           $st =html_entity_decode(strip_tags($topics['topic_title']));
            $tit = substr($st, 0, 10);
        $topics['ttitle'] =  $tit." ...";;
           
        if(!empty($topics)){
              $this->db->select('*');
                    $this->db->where('image_status',1);
                    $this->db->where('image_topic_id',$topics['topic_id']);
                    $topics['image'] = $this->db->get('presentation_topic_images')->result_array();
             $topics['sub'] = $this->get_sub_slidesearch($topics['topic_id']);

            $i++;
        }else{
            $topics = false;
        }
           
        // }
        return $topics;
        
    }

    public function get_sub_slidesearch($id){

        $this->db->select('*');
        $this->db->from('presentation_topic');
        $this->db->where('topic_status >',0);

        $this->db->where('topic_parent', $id);
        if($term !=""){
            $this->db->where('topic_title LIKE','%'.$term.'%');
        }
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
            $st =html_entity_decode(strip_tags($p_cat['topic_title']));
            $tit = substr($st, 0, 10);
        $topics[$i]['ttitle'] = $tit." ...";

                    $this->db->select('*');
                    $this->db->where('image_status',1);
                    $this->db->where('image_topic_id',$p_cat['topic_id']);
                    $topics[$i]['image'] = $this->db->get('presentation_topic_images')->result_array();
            $topics[$i]['sub'] = $this->get_sub_slidesearch($p_cat['topic_id']);

            $i++;
        }
        // print_r($topics);
        return $topics;       
    }












    //webview




    public function get_topics_web($id){



        $this->db->select('*');
        $this->db->from('presentation_topic');
        $this->db->where('topic_id', $id);
        $this->db->where('topic_status >',0);


        $parent = $this->db->get();
        
        $topics = $parent->row_array();

         $this->db->where('topic_status >',0);
                    $this->db->where('topic_parent',$topics['topic_id']);
                    $this->db->where('display_parent',$id);
                    $this->db->where('practice_type',3);
                    $smcount = $this->db->count_all_results('presentation_topic');
                    if($smcount>0){
                        $topics['sametopcount'] =1;

                    }else{
                        $topics['sametopcount'] =0;

                    }
                    $topics['sametopid'] = 0;
                    $topics['sametopicstatus'] = 0;

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
           $st =html_entity_decode(strip_tags($topics['topic_title']));
            $tit = substr($st, 0, 10);
        $topics['ttitle'] =  $tit." ...";;
           
        if(!empty($topics)){
              $this->db->select('*');
                    $this->db->where('image_status',1);
                    $this->db->where('image_topic_id',$topics['topic_id']);
                    $topics['image'] = $this->db->get('presentation_topic_images')->result_array();
             $topics['sub'] = $this->get_sub_topics_web($topics['topic_id']);
           

            $i++;
        }else{
            $topics = false;
        }
        
        return $topics;

        $this->db->select('*');
        $this->db->from('presentation_topic');
        $this->db->where('topic_id', $id);
        $this->db->where('topic_status >',0);


        $parent = $this->db->get();
        
        $topics = $parent->row_array();

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
                    $this->db->where('image_status',1);
                    $this->db->where('image_topic_id',$topics['topic_id']);
                    $topics['image'] = $this->db->get('presentation_topic_images')->result_array();
             $topics['sub'] = $this->get_sub_topics_web($topics['topic_id']);

            $i++;
        }else{
            $topics = false;
        }
           
        // }
        return $topics;
        
    }

    public function get_sub_topics_web($id){

        $this->db->select('*');
        $this->db->from('presentation_topic');
        $this->db->where('topic_status >',0);
        $this->db->where('practice_type !=',3);
        $this->db->where('topic_parent', $id);

        $child = $this->db->get();
        $topics = $child->result_array();

          $i=0;
        $sametopcount = 0;
        $sametopid = 0;


                    $this->db->select('*');
                    $this->db->where('topic_status >',0);
                    $this->db->where('display_parent',$id);
                    $this->db->where('practice_type',3);
                    $topicssame = $this->db->get('presentation_topic')->result_array();
                if(!empty($topicssame)){

                    foreach ($topicssame as $key => $valuesame) {
         

                        array_push($topics,$valuesame);
                          
                         
                    }
                    // $topics[] = $topicssame;

                }
       
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


                   
                     $this->db->where('topic_status >',0);
                            $this->db->where('topic_parent',$p_cat['topic_id']);
                            $this->db->where('display_parent',$id);

                            $this->db->where('practice_type',3);
                            $smcount = $this->db->count_all_results('presentation_topic');
                            if($smcount>0){
                                $topics[$i]['sametopcount'] =1;

                            }else{
                                $topics[$i]['sametopcount'] =0;

                            }
                            if($p_cat['practice_type']=='3'){
                                $topics[$i]['sametopid'] = $p_cat['topic_parent'];
                                $topics[$i]['sametopicstatus'] = 1;
                            }else{
                                $topics[$i]['sametopid'] = 0;
                                $topics[$i]['sametopicstatus'] = 0;

                                $this->db->select('*');
                                $this->db->where('image_status',1);
                                $this->db->where('image_topic_id',$p_cat['topic_id']);
                                $topics[$i]['image'] = $this->db->get('presentation_topic_images')->result_array();
                            }
                   

                    $st =html_entity_decode(strip_tags($p_cat['topic_title']));
                    $tit = substr($st, 0, 10);
                    $topics[$i]['ttitle'] = $tit." ...";

                    $this->db->select('*');
                    $this->db->where('image_status',1);
                    $this->db->where('image_topic_id',$p_cat['topic_id']);
                    $topics[$i]['image'] = $this->db->get('presentation_topic_images')->result_array();
                    $subtp = $this->get_sub_topics($p_cat['topic_id']);
                    if(!empty($subtp)){
                       $topics[$i]['countofcontent'] = 1;
                    }else{
                        $topics[$i]['countofcontent'] = 0;
                    }
            // $topics[$i]['sub'] = $this->get_sub_topics($p_cat['topic_id']);
             //     if($topics[$i]['sub']){
             //    $topics[$i]['childhas'] = 1;
             // }else{
             //    $topics[$i]['childhas'] = 0;
             // }

            $i++;
        }
        

        return $topics;          
    }
    public function chapter_content_webview($chapter,$teacher,$semester,$subject){


        

        $batch = $this->Api_student->get_semester_batch($semester);


        $this->db->where('data_status >',0);
        $this->db->where('data_id',$chapter);
        $this->db->where('data_type','2');
        $result = $this->db->get('data')->row_array();

         $this->db->select(' chapter_design.id, chapter_design.chapter_id, `type`, `type_id`, `image`, `status`, chapter_design.created_on, chapter_design.updated_on, chapter_design.updated_by, `presentation`, `topic_title`, `topic_color`, `topic_backgroundcolor`, `topic_backgroundimage`, `topic_type`, `topic_status`, `topic_bordercolor`, `topic_fontsize`, `topic_position_left`, `topic_position_top`, `topic_width`, `topic_height`, `topic_content_position_left`, `topic_content_position_top`');
        // $this->db->join('chapter_content_publish','chapter_content_publish.chapter_content_id = chapter_design.id ','left');

          $this->db->join('chapter_content_publish','chapter_content_publish.chapter_content_id=chapter_design.id  AND chapter_content_publish.batch_id ='.$batch,'left');
        $this->db->where("(chapter_content_publish.batch_id ='".$batch."' OR chapter_content_publish.batch_id  is NULL)");

        $this->db->join('data','data.data_id = chapter_design.chapter_id','left');

        $this->db->join('chapter_publish','chapter_publish.chapter_id = data.data_id ','left');
        $this->db->where('chapter_publish.publish_status',1);        

        $this->db->where('chapter_content_publish.publish_status',1);
        $this->db->where('chapter_design.status',1);
        $this->db->where('chapter_design.chapter_id',$chapter);
        $this->db->from('chapter_design');
        $this->db->group_by('chapter_design.id');
        $query = $this->db->get();
        $results = $query->result_array();


        //  $this->db->select(' chapter_design.id, chapter_design.chapter_id, `type`, `type_id`, `image`, `status`, chapter_design.created_on, chapter_design.updated_on, chapter_design.updated_by, `presentation`, `topic_title`, `topic_color`, `topic_backgroundcolor`, `topic_backgroundimage`, `topic_type`, `topic_status`, `topic_bordercolor`, `topic_fontsize`, `topic_position_left`, `topic_position_top`, `topic_width`, `topic_height`, `topic_content_position_left`, `topic_content_position_top`');
      
        // $this->db->join('data','data.data_id = chapter_design.chapter_id','left');

        
        // $this->db->where('chapter_design.status',1);
        // $this->db->where('chapter_design.chapter_id',$chapter);
        // $this->db->from('chapter_design');
        // $query = $this->db->get();
        // $results = $query->result_array();


        
        $x = 0;
        foreach ($results as $key => $value) {
            $type = $value['type'];
            $typeid = $value['type_id'];
            $id = $value['id'];
            if($type =='1'){
                //vedio
                    $this->db->select('video_id,video_title,video_link');
                    $this->db->where('video_status',1);
                    $this->db->where('type','1');
                    $this->db->where('video_id',$typeid);
                    $vediolink = $this->db->get('video')->row_array();
                   

                // $results[$x]['link'] = base_url().'uploads/video/'.$vediolink['video_link'];
                     $results[$key]['link'] = 'video/'.$typeid;
            }
            else if($type =='2'){
                //presentation
               
                // die();
                $utypeid = $typeid;
                if($teacher !=""){
                        $utypeidt = $this->get_user_topic($typeid,$teacher,$semester,$subject);
                
                        if($utypeidt != 0){
                                $utypeid = $utypeidt;
                        }

                }
                // $results[$x]['link'] = base_url().'presentation-slide-view/'.$utypeid;
                $results[$key]['link'] = 'presentation/'.$utypeid;


            }
            else if($type =='3'){
                //pdf
                    $this->db->select('video_id,video_title,video_link');
                    $this->db->where('video_status',1);
                    $this->db->where('type','2');
                    $this->db->where('video_id',$typeid);
                    $pdflink = $this->db->get('video')->row_array();
                    // $results[$x]['link'] = base_url().'uploads/pdf/'.$pdflink['video_link'];
                    $results[$key]['link'] = 'pdf/'.$typeid;

            } else if($type =='4'){
                //question
                    // $results[$x]['link'] = base_url().'view-details/'.$typeid;
                    $results[$key]['link'] = 'practice/'.$typeid;


                
            } else if($type =='5'){
                //exercise
                    // $results[$x]['link'] = base_url().'exercise-view/'.$typeid;
                    $results[$key]['link'] ='exercise/'.$id;


            }
            else if($type =='6'){
                //exercise
                    // $results[$x]['link'] = base_url().'uploads/chapter/'.$value['image'];
                    $results[$key]['link'] = 'image/'.$typeid;


            }

            $x++;
        }
        $result['contents'] = $results;
        // print_r($result);
        // die();
        return $result;
       
     

    }







    public function chapter_teachercontent_webview($chapter,$teacher,$semester,$subject){

        $this->db->where('data_status >',0);
        $this->db->where('data_id',$chapter);
        $this->db->where('data_type','2');
        $result = $this->db->get('data')->row_array();

         $this->db->select(' chapter_design.id, chapter_design.chapter_id, `type`, `type_id`, `image`, `status`, chapter_design.created_on, chapter_design.updated_on, chapter_design.updated_by, `presentation`, `topic_title`, `topic_color`, `topic_backgroundcolor`, `topic_backgroundimage`, `topic_type`, `topic_status`, `topic_bordercolor`, `topic_fontsize`, `topic_position_left`, `topic_position_top`, `topic_width`, `topic_height`, `topic_content_position_left`, `topic_content_position_top`');
      
        $this->db->join('data','data.data_id = chapter_design.chapter_id','left');

        
        $this->db->where('chapter_design.status',1);
        $this->db->where('chapter_design.chapter_id',$chapter);
        $this->db->from('chapter_design');
        $query = $this->db->get();
        $results = $query->result_array();


        
        $x = 0;
        foreach ($results as $key => $value) {
            $type = $value['type'];
            $typeid = $value['type_id'];
            if($type =='1'){
                //vedio
                    $this->db->select('video_id,video_title,video_link');
                    $this->db->where('video_status',1);
                    $this->db->where('type','1');
                    $this->db->where('video_id',$typeid);
                    $vediolink = $this->db->get('video')->row_array();
                   

                // $results[$x]['link'] = base_url().'uploads/video/'.$vediolink['video_link'];
                     $results[$key]['link'] = 'video/'.$typeid;
            }
            else if($type =='2'){
                // //presentation
                // if($teacher !=""){
                //         $utypeid = $this->get_user_topic($typeid,$teacher,$semester,$subject);
                //         if($utypeid == 0){
                //             $utypeid = $typeid;
                //         }
                // }else{
                //         $utypeid = $typeid;

                // }

                $utypeid = $typeid;
                if($teacher !=""){
                        $utypeidt = $this->get_user_topic($typeid,$teacher,$semester,$subject);
                        if($utypeidt != 0){
                                $utypeid = $utypeidt;
                        }

                }
                // $results[$x]['link'] = base_url().'presentation-slide-view/'.$utypeid;
                $results[$key]['link'] = 'presentation/'.$utypeid;


            }
            else if($type =='3'){
                //pdf
                    $this->db->select('video_id,video_title,video_link');
                    $this->db->where('video_status',1);
                    $this->db->where('type','2');
                    $this->db->where('video_id',$typeid);
                    $pdflink = $this->db->get('video')->row_array();
                    // $results[$x]['link'] = base_url().'uploads/pdf/'.$pdflink['video_link'];
                    $results[$key]['link'] = 'pdf/'.$typeid;

            } else if($type =='4'){
                //question
                    // $results[$x]['link'] = base_url().'view-details/'.$typeid;
                    $results[$key]['link'] = 'practice/'.$typeid;


                
            } else if($type =='5'){
                //exercise
                    // $results[$x]['link'] = base_url().'exercise-view/'.$typeid;
                    $results[$key]['link'] ='exercise/'.$value['id'];


            }
            else if($type =='6'){
                //exercise
                    // $results[$x]['link'] = base_url().'uploads/chapter/'.$value['image'];
                    $results[$key]['link'] = 'image/'.$typeid;


            }

            $x++;
        }
        $result['contents'] = $results;
        return $result;
       
     

    }

    public function check_sametopic($id){
        $this->db->select('topic_id');
        $this->db->from('presentation_topic');
        $this->db->where('topic_parent', $id);
        $this->db->where('topic_status >',0);
        $this->db->where('practice_type',3);

        $parent = $this->db->get();
        
        $topics = $parent->row_array();
        if($topics){
            return $topics['topic_id'];
        }else{
            return 0;
        }
    }












 public function get_topics_slide($id,$term){

        $this->db->select('*');
        $this->db->from('presentation_topic');
        $this->db->where('topic_id', $id);
        $this->db->where('topic_status >',0);
        if($term !=""){
            $this->db->where('topic_title LIKE','%'.$term.'%');
        }

        $parent = $this->db->get();
        
        $topics = $parent->row_array();
 if(!empty($topics)){
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
           $st =html_entity_decode(strip_tags($topics['topic_title']));
            $tit = substr($st, 0, 10);
        $topics['ttitle'] =  $tit." ...";;
           
       
            // print_r($topics);
              $this->db->select('*');
                    $this->db->where('image_status',1);
                    $this->db->where('image_topic_id',$topics['topic_id']);
                    $topics['image'] = $this->db->get('presentation_topic_images')->result_array();
             $topics['sub'] = $this->get_sub_topics_slide($topics['topic_id'],$term);
           

            $i++;
        }else{
            $topics = false;
        }
        
        return $topics;
        
    }

    public function get_sub_topics_slide($id,$term){

        $this->db->select('*');
        $this->db->from('presentation_topic');
        $this->db->where('topic_status >',0);
        $this->db->where('practice_type !=',3);
        $this->db->where('topic_parent', $id);
         if($term !=""){
            $this->db->where('topic_title LIKE','%'.$term.'%');
        }
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


                    $this->db->select('*');
                    $this->db->where('topic_status >',0);
                    $this->db->where('topic_parent',$p_cat['topic_id']);
                    $this->db->where('practice_type',3);
                    if($term !=""){
                        $this->db->where('topic_title LIKE','%'.$term.'%');
                    }
                    $topicssame = $this->db->get('presentation_topic')->row_array();
                
                 // foreach ($topicssame as $valuesame) {
                    if($topicssame['topic_backgroundimage'] != ""){
                        $word = "chapter";
                        $myimage = $topicssame['topic_backgroundimage'];
                        $myimage = str_replace(' ', '%20', $myimage);

                        $path =  base_url().'uploads/background/';
                           
                          // Test if string contains the word 
                        if(strpos($myimage, $word) !== false){
                              $path =  base_url().'uploads/';
                        } 
                        $topicssame['topic_backgroundimage'] = $path.$myimage;
                    }
                    // $x++;
                 // }
                    $sametopcount = 0;
                    $sametopid = 0;

                        if(!empty($topicssame)){
                            $topicssame['sametopcount'] = $sametopcount;
                            $sametopcount = 1;
                            $sametopid = $topicssame['topic_id'];
                            $topicssame['sametopicstatus'] = 1;
                            $topicssame['sametopid'] = $sametopid;

                            $st =html_entity_decode(strip_tags($topicssame['topic_title']));
                            $tit = substr($st, 0, 10);
                            $topicssame['ttitle'] = $tit." ...";

                            $this->db->select('*');
                            $this->db->where('image_status',1);
                            $this->db->where('image_topic_id',$topicssame['topic_id']);
                            $topicssame['image'] = $this->db->get('presentation_topic_images')->result_array();
                            $topicssame['sub'] = $this->get_sub_topics_slide($topicssame['topic_id'],$term);

                            if($topicssame['sub']){
                                $topicssame['childhas'] = 1;
                             }else{
                                $topicssame['childhas'] = 0;

                             }
                            $topics[] = $topicssame;
                             
                        }
                    $topics[$i]['sametopcount'] = $sametopcount;
                    $topics[$i]['sametopid'] = $sametopid;
                    $topics[$i]['sametopicstatus'] = 0;

                    $st =html_entity_decode(strip_tags($p_cat['topic_title']));
                    $tit = substr($st, 0, 10);
                    $topics[$i]['ttitle'] = $tit." ...";

                    $this->db->select('*');
                    $this->db->where('image_status',1);
                    $this->db->where('image_topic_id',$p_cat['topic_id']);
                    $topics[$i]['image'] = $this->db->get('presentation_topic_images')->result_array();
            $topics[$i]['sub'] = $this->get_sub_topics_slide($p_cat['topic_id'],$term);
                 if($topics[$i]['sub']){
                $topics[$i]['childhas'] = 1;
             }else{
                $topics[$i]['childhas'] = 0;
             }

            $i++;
        }
        

        return $topics;       
    }



    public function countrecentpresentation($uid){
     
        $this->db->where('student_id',$uid);
        return $this->db->count_all_results('recent_presentation_student');        
    }

    public function countrecentpresentation_exist($id,$uid){
     
        $this->db->where('presentation_id',$id);
        $this->db->where('student_id',$uid);
        return $this->db->count_all_results('recent_presentation_student');        
    }
     
    public function countrecentchapter($uid){
     
        $this->db->where('student_id',$uid);
        return $this->db->count_all_results('recent_chapter_student');        
    }

    public function countrecentchapter_exist($id,$uid){
     
        $this->db->where('chapter_id',$id);
        $this->db->where('student_id',$uid);
        return $this->db->count_all_results('recent_chapter_student');        
    }

    public function deleterecentpresentation($uid){

        $this->db->select(' MIN(id) as id');
        $this->db->where('student_id',$uid);
        $this->db->from('recent_presentation_student');
        $query = $this->db->get();
        $topics = $query->row_array();
        

        $this->db->where('id',$topics['id']);
        if($this->db->delete('recent_presentation_student')) return true;
        else return false;
    }
     public function deleterecentchapter($uid){
        $this->db->select(' MIN(id) as id');
        $this->db->where('student_id',$uid);
        $this->db->from('recent_chapter_student');
        $query = $this->db->get();
        $topics = $query->row_array();
        

        $this->db->where('id',$topics['id']);
        if($this->db->delete('recent_chapter_student')) return true;
        else return false;
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
    public function get_exercise_search($term){
        $this->db->select('ex_topic_id,ex_topic_title');
        $this->db->where('ex_topic_status',1);
         if($term !=""){
            $this->db->where('ex_topic_title LIKE','%'.$term.'%');
        }
        $this->db->join('exercise','exercise.exercise_title=exercise_topic.ex_topic_id','left');
        $this->db->group_by('exercise_topic.ex_topic_id');
        //$this->db->where('chapter_id',$id);
        return $this->db->get('exercise_topic')->result_array();
    }
     public function get_video_search($term){
        $this->db->select('video_id,video_title,video_link,thumb_nail');
         if($term !=""){
            $this->db->where('video_title LIKE','%'.$term.'%');
        }
        $this->db->where('video_status',1);
        $this->db->where('type','1');
        return $this->db->get('video')->result_array();
    }

    public function get_pdf_search($term){
        $this->db->select('video_id,video_title,video_link');
         if($term !=""){
            $this->db->where('video_title LIKE','%'.$term.'%');
        }
        $this->db->where('video_status',1);
        $this->db->where('type','2');
        return $this->db->get('video')->result_array();
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

     public function get_user_topic_webview($id,$uid){
        $this->db->select('topic_id');
        $this->db->where('topic_status >',0);
        $this->db->where('copy_topic',$id);
        $this->db->where('user_id',$uid);
        $result = $this->db->get('presentation_topic')->row_array();
       
        if($result['topic_id']){
            return $result['topic_id'];
        }else{
            return false;
        }
    }
    public function semester_get($btid,$subject){
        $this->db->select('sem_subject.sem_id');
                $this->db->where('ins_semester.batch_id',$btid);
                $this->db->where('sem_subject.subject_id',$subject);
                $this->db->from('sem_subject');
                $this->db->join('ins_semester','sem_subject.sem_id=ins_semester.sem_id','left');
                $sem_query = $this->db->get();
                $sem_result = $sem_query->row_array();
                $semid =  $sem_result['sem_id'];
                return $semid;
    }
    public function batch_get($id){
                $fields = 'batch_id';
                $this->db->select($fields);
                $this->db->where('id',$id);
                $this->db->from('student');
                $query2 = $this->db->get();
                $result2 = $query2->row_array();
                return $result2['batch_id'];
    }
    public function get_topic_images($id){
                $fields = ' `image`, `image_height`, `image_width`, `image_position_left`, `image_position_top`';
                $this->db->select($fields);
                $this->db->where('image_status',1);
                $this->db->where('image_topic_id',$id);
                $this->db->from('presentation_topic_images');
                $query2 = $this->db->get();
                $result2 = $query2->result_array();
                return $result2;
    }





        public function chapter_content_webview_new($chapter,$teacher,$semester,$subject){


        

        $batch = $this->Api_student->get_semester_batch($semester);


        $this->db->where('data_status >',0);
        $this->db->where('data_id',$chapter);
        $this->db->where('data_type','2');
        $result = $this->db->get('data')->row_array();

         $this->db->select(' chapter_design.id, chapter_design.chapter_id, `type`, `type_id`, `image`, `status`, chapter_design.created_on, chapter_design.updated_on, chapter_design.updated_by, `presentation`, `topic_title`, `topic_color`, `topic_backgroundcolor`, `topic_backgroundimage`, `topic_type`, `topic_status`, `topic_bordercolor`, `topic_fontsize`, `topic_position_left`, `topic_position_top`, `topic_width`, `topic_height`, `topic_content_position_left`, `topic_content_position_top`');
        // $this->db->join('chapter_content_publish','chapter_content_publish.chapter_content_id = chapter_design.id ','left');

          $this->db->join('chapter_content_publish','chapter_content_publish.chapter_content_id=chapter_design.id  AND chapter_content_publish.batch_id ='.$batch,'left');
        $this->db->where("(chapter_content_publish.batch_id ='".$batch."' OR chapter_content_publish.batch_id  is NULL)");

        $this->db->join('data','data.data_id = chapter_design.chapter_id','left');

        $this->db->join('chapter_publish','chapter_publish.chapter_id = data.data_id ','left');
        $this->db->where('chapter_publish.publish_status',1);        

        $this->db->where('chapter_content_publish.publish_status',1);
        $this->db->where('chapter_design.status',1);
        $this->db->where('chapter_design.chapter_id',$chapter);
        $this->db->from('chapter_design');
        $this->db->group_by('chapter_design.id');
        $query = $this->db->get();
        $results = $query->result_array();


        //  $this->db->select(' chapter_design.id, chapter_design.chapter_id, `type`, `type_id`, `image`, `status`, chapter_design.created_on, chapter_design.updated_on, chapter_design.updated_by, `presentation`, `topic_title`, `topic_color`, `topic_backgroundcolor`, `topic_backgroundimage`, `topic_type`, `topic_status`, `topic_bordercolor`, `topic_fontsize`, `topic_position_left`, `topic_position_top`, `topic_width`, `topic_height`, `topic_content_position_left`, `topic_content_position_top`');
      
        // $this->db->join('data','data.data_id = chapter_design.chapter_id','left');

        
        // $this->db->where('chapter_design.status',1);
        // $this->db->where('chapter_design.chapter_id',$chapter);
        // $this->db->from('chapter_design');
        // $query = $this->db->get();
        // $results = $query->result_array();


        
        $x = 0;
        foreach ($results as $key => $value) {
            $type = $value['type'];
            $typeid = $value['type_id'];
            $id = $value['id'];
            if($type =='1'){
                //vedio
                    $this->db->select('video_id,video_title,video_link');
                    $this->db->where('video_status',1);
                    $this->db->where('type','1');
                    $this->db->where('video_id',$typeid);
                    $vediolink = $this->db->get('video')->row_array();
                   

                // $results[$x]['link'] = base_url().'uploads/video/'.$vediolink['video_link'];
                     $results[$key]['link'] = 'video/'.$id;
            }
            else if($type =='2'){
                //presentation
               
                // die();
                $utypeid = $typeid;
                if($teacher !=""){
                        $utypeidt = $this->get_user_topic($typeid,$teacher,$semester,$subject);
                
                        if($utypeidt != 0){
                                $utypeid = $utypeidt;
                        }

                }
                // $results[$x]['link'] = base_url().'presentation-slide-view/'.$utypeid;
                $results[$key]['link'] = 'presentation/'.$utypeid;


            }
            else if($type =='3'){
                //pdf
                    $this->db->select('video_id,video_title,video_link');
                    $this->db->where('video_status',1);
                    $this->db->where('type','2');
                    $this->db->where('video_id',$typeid);
                    $pdflink = $this->db->get('video')->row_array();
                    // $results[$x]['link'] = base_url().'uploads/pdf/'.$pdflink['video_link'];
                    $results[$key]['link'] = 'pdf/'.$id;

            } else if($type =='4'){
                //question
                    // $results[$x]['link'] = base_url().'view-details/'.$typeid;
                    $results[$key]['link'] = 'practice/'.$typeid;


                
            } else if($type =='5'){
                //exercise
                    // $results[$x]['link'] = base_url().'exercise-view/'.$typeid;
                    $results[$key]['link'] ='exercise/'.$id;


            }
            else if($type =='6'){
                //exercise
                    // $results[$x]['link'] = base_url().'uploads/chapter/'.$value['image'];
                    $results[$key]['link'] = 'image/'.$id;


            }

            $x++;
        }
        $result['contents'] = $results;
        // print_r($result);
        // die();
        return $result;
       
     

    }







    public function chapter_teachercontent_webview_new($chapter,$teacher,$semester,$subject){

        $this->db->where('data_status >',0);
        $this->db->where('data_id',$chapter);
        $this->db->where('data_type','2');
        $result = $this->db->get('data')->row_array();

         $this->db->select(' chapter_design.id, chapter_design.chapter_id, `type`, `type_id`, `image`, `status`, chapter_design.created_on, chapter_design.updated_on, chapter_design.updated_by, `presentation`, `topic_title`, `topic_color`, `topic_backgroundcolor`, `topic_backgroundimage`, `topic_type`, `topic_status`, `topic_bordercolor`, `topic_fontsize`, `topic_position_left`, `topic_position_top`, `topic_width`, `topic_height`, `topic_content_position_left`, `topic_content_position_top`');
      
        $this->db->join('data','data.data_id = chapter_design.chapter_id','left');

        
        $this->db->where('chapter_design.status',1);
        $this->db->where('chapter_design.chapter_id',$chapter);
        $this->db->from('chapter_design');
        $query = $this->db->get();
        $results = $query->result_array();


        
        $x = 0;
        foreach ($results as $key => $value) {
            $type = $value['type'];
            $typeid = $value['type_id'];
            if($type =='1'){
                //vedio
                    $this->db->select('video_id,video_title,video_link');
                    $this->db->where('video_status',1);
                    $this->db->where('type','1');
                    $this->db->where('video_id',$typeid);
                    $vediolink = $this->db->get('video')->row_array();
                   

                // $results[$x]['link'] = base_url().'uploads/video/'.$vediolink['video_link'];
                     $results[$key]['link'] = 'video/'.$id;
            }
            else if($type =='2'){
                // //presentation
                // if($teacher !=""){
                //         $utypeid = $this->get_user_topic($typeid,$teacher,$semester,$subject);
                //         if($utypeid == 0){
                //             $utypeid = $typeid;
                //         }
                // }else{
                //         $utypeid = $typeid;

                // }

                $utypeid = $typeid;
                if($teacher !=""){
                        $utypeidt = $this->get_user_topic($typeid,$teacher,$semester,$subject);
                        if($utypeidt != 0){
                                $utypeid = $utypeidt;
                        }

                }
                // $results[$x]['link'] = base_url().'presentation-slide-view/'.$utypeid;
                $results[$key]['link'] = 'presentation/'.$utypeid;


            }
            else if($type =='3'){
                //pdf
                    $this->db->select('video_id,video_title,video_link');
                    $this->db->where('video_status',1);
                    $this->db->where('type','2');
                    $this->db->where('video_id',$typeid);
                    $pdflink = $this->db->get('video')->row_array();
                    // $results[$x]['link'] = base_url().'uploads/pdf/'.$pdflink['video_link'];
                    $results[$key]['link'] = 'pdf/'.$id;

            } else if($type =='4'){
                //question
                    // $results[$x]['link'] = base_url().'view-details/'.$typeid;
                    $results[$key]['link'] = 'practice/'.$typeid;


                
            } else if($type =='5'){
                //exercise
                    // $results[$x]['link'] = base_url().'exercise-view/'.$typeid;
                    $results[$key]['link'] ='exercise/'.$value['id'];


            }
            else if($type =='6'){
                //exercise
                    // $results[$x]['link'] = base_url().'uploads/chapter/'.$value['image'];
                    $results[$key]['link'] = 'image/'.$id;


            }

            $x++;
        }
        $result['contents'] = $results;
        return $result;
       
     

    }

    

  

}
?>