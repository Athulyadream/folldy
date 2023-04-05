<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');
class Student extends REST_Controller{
    
    function __construct()
    {
        parent::__construct(); 
        $this->session->sess_destroy();
        
    }
    function version_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['platform']) ? $input['platform'] : '';
        $platform = $this->post('platform') ? $this->post('platform') : $value;

        $value = !empty($input['version']) ? $input['version'] : '';
        $version = $this->post('version') ? $this->post('version') : $value;

        $check = $this->Api_student->check_version($version,$platform);
        if($check['status'] == 1){
            $out = array('status'=>1,'message'=>'Success.');
        }
        else{
            $out = array('status'=>0,'message'=>'A new version of App found please update.');
        }
        $this->response($out);


    }
    function login_post(){
           
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);
        if (!$this->post('phone') && json_last_error() != 0)
        {
            $out = array('status'=>0,'type'=>'Input Error','message'=>$this->json_errors[json_last_error()]);
        }
        else{
            $value = !empty($input['phone']) ? $input['phone'] : '';
            $phone = $this->post('phone') ? $this->post('phone') : $value;

            $value = !empty($input['password']) ? $input['password'] : '';
            $password = $this->post('password') ? $this->post('password') : $value;

            $value = !empty($input['platform']) ? $input['platform'] : '';
            $platform = $this->post('platform') ? $this->post('platform') : $value;


            if($phone && $password){
                
                $login = $this->Api_student->getDatas_login($phone,$password);
                if(!empty($login)){
                    $data_update=array('platform' => $platform);

                    $this->Api_student->update_data_by_phone($data_update,$phone);
                    if($login['session_value'] == 0){
                        $session['session_value'] = time().rand(0,10000);
                        $updte_where['id'] = $login['id'];
                        $this->Api_student->update_student_details($session,$login['id']);
                       
                    }
                     $login = $this->Api_student->getDatas($login['id']);
                    //$this->M_log->insert_log("app_login_success", "Consultant login success", $login[0]['id']);
                    $out = array('status'=>1,'message'=>'Successfully logged in','data'=>$login);
                }
                else{
                    //$this->M_log->insert_log("app_login_failure", "Consultant login failure " . $password, 0);
                    $out = array('status'=>0,'message'=>'Invalid username or password','data'=>new stdClass);
                }
            }
            $this->response($out);
        }

    }
    function logout_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $user_id=$this->security->xss_clean(trim($this->post('userid')));
        //exit();
        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value = !empty($input['platform']) ? $input['platform'] : '';
        $platform = $this->post('platform') ? $this->post('platform') : $value;
      
        if (!$this->post('userid') && json_last_error() != 0) {
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{


            $check = $this->Api_student->check_session($user_id,$session);
            if($check['status']== 0){
                
                $out = array('status'=>3,'message'=>'Invalid data.');
            }
            else{
            //if($consultant){
                $logout = $this->Api_student->logout_student($user_id);
                if($logout){ 
                    $out = array('status'=>1,'message'=>'You are successfully logged out','data'=>'');
                    
                }else{
                    $out = array('status'=>0,'message'=>'Logout failed','data'=>new stdClass);
                   
                }
            }
            //}
        }
        
        $this->response($out); 
    }
    function change_password_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        
        $value = !empty($input['new_password']) ? $input['new_password'] : '';
        $new_password = $this->post('new_password') ? $this->post('new_password') : $value;

        $value = !empty($input['userid']) ? $input['userid'] : '';
        $id = $this->post('userid') ? $this->post('userid') : $value;

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value = !empty($input['platform']) ? $input['platform'] : '';
        $platform = $this->post('platform') ? $this->post('platform') : $value;

        $check = $this->Api_student->check_session($id,$session);
        if($check['status']== 0){
            
            $out = array('status'=>3,'message'=>'Session does not match.');
        }
        else{
            
                $user['password'] = password_hash($new_password,PASSWORD_DEFAULT);
                $user['session_value'] = time().rand(0,10000);
                $id_return = $this->Api_student->update_student_details($user,$id);
                if($id_return == 1){
                    $user_data = $this->Api_student->get_student_details($id);

                   // print_r($user_data);exit();
                    $out = array('status'=>1,'message'=>'Password Changed Successfully','data'=>$user_data);
                }
                else{
                    $out = array('status'=>0,'message'=>'Change password failed.');
                }
            
        }
                
        $this->response($out);     
    }
    function forgot_password_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['phone']) ? $input['phone'] : '';
        $phone = $this->post('phone') ? $this->post('phone') : $value;

        

        $active_user = $this->Api_student->get_student_by_phone($phone);
        if(empty($active_user)){
            $out = array('status'=>0,'message'=>'Invalid Phone.');
        }
        else{
                $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";


                $password = substr( str_shuffle( $chars ), 0, 12 );
                $user_where['phone'] = $phone;
                $user_where['status'] = 1;
                $update_data['password'] = password_hash($password,PASSWORD_DEFAULT);

                $this->Api_student->update_student($user_where,$update_data);
                    
                $userdata = $this->Api_student->get_student_by_phone($phone);

                $message = 'Your new password is '.$password.' . Mesoki';
                $this->load->library('sms');
                $resp = $this->sms->sendsms($userdata['phone'],$message);

                
                $out = array('status'=>1,'message'=>'New Password has been send to your phone.');
            
        }
        $this->response($out); 
    }
    function profile_post(){

        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $id = $this->security->xss_clean(trim($this->post('userid'))); 
        
        if (!$this->post('userid') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){
                $check = $this->Api_student->check_session($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    $profile = $this->Api_student->getProfileDetails($id);
                    if(!empty($profile)){ 
                        $out = array('status'=>1,'message'=>'','data'=>$profile);
                    }
                    else{
                        $out = array('status'=>0,'message'=>'There is no consultant','data'=>new stdClass);
                    }
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'student id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);
    }
     function home_post(){

        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $id = $this->security->xss_clean(trim($this->post('userid'))); 
        
        if (!$this->post('userid') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){
                $check = $this->Api_student->check_session($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    
                    $student = $this->Api_student->get_student_by_id($id);
                    $timetable = $this->Api_student->today_timetable($student['batch_id']);
                    $subject = $this->Api_student->get_subject($student['course_id']);
                    $news = $this->Api_student->get_news($student['institute_id']);

                    $events = $this->Api_student->get_events($student['institute_id']);

                    $todays = array();
                    foreach($timetable as $row){
                        $todays[] = $row['subject'];
                    }
                    foreach($news as $key => $value){
                        if($value['img'] != ''){
                            // $news[$key]['img'] = base_url().'assets/images/uploads/'.$value['img'];
                            if($value['institute'] == 0){
                                $news[$key]['type'] = 'admin';
                                $news[$key]['img'] = base_url().'uploads/news/'.$value['img'];
                            }
                            else{
                                $news[$key]['type'] = 'institute';
                                $news[$key]['img'] = base_url().'uploads/news/'.$value['img'];
                            }
                        }
                    }
                    foreach($events as $key => $value){
                        if($value['date'] != '0000-00-00'){
                            $events[$key]['date'] = date('d-m-Y',strtotime($value['date']));
                        }
                        else{
                            $events[$key]['date']= '';
                        }
                        if($value['image'] != ''){
                            $events[$key]['image'] = base_url().'uploads/events/'.$value['image'];
                            
                        }
                        else{
                            $events[$key]['image'] = '';
                        }
                    }
                    if(!empty($student)){ 
                        $out = array('status'=>1,'message'=>'','todays'=>$todays,'subject' => $subject,'news'=>$news,'events' => $events);
                    }
                    else{
                        $out = array('status'=>0,'message'=>'There is no consultant','data'=>new stdClass);
                    }
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'student id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);
    }
    function time_table_post(){

        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $id = $this->security->xss_clean(trim($this->post('userid'))); 
        
        if (!$this->post('userid') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){
                $check = $this->Api_student->check_session($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    
                    $student = $this->Api_student->get_student_by_id($id);
                    $week  = $this->Api_student->get_week();
                    foreach ($week as $key => $value) {
                        $data ='';
                        $data = $this->Api_student->get_timetable($student['batch_id'],$value['id']);
                        if(!empty($data)){
                            foreach($data as $row){
                               $days[$value['week_days']][]= $row['subject'];
                            }
                        }
                        else{
                            $days[$value['week_days']] ='';
                        }

                    }
                    //print_r($days);
                    
                    
                    if(!empty($student)){ 
                        $out = array(
                            'status'=>1,
                            'message'=>'',
                            'mon'=>$days['Monday'],
                            'tue'=>$days['Tuesday'],
                            'wed'=>$days['Wednesday'],
                            'thu'=>$days['Thursday'],
                            'fri'=>$days['Friday'],
                            'sat'=>$days['saturday'],
                            'sun'=>$days['Sunday'],
                        );
                    }
                    else{
                        $out = array('status'=>0,'message'=>'There is no consultant','data'=>new stdClass);
                    }
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'student id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);
    }
    function chapter_post(){

        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value = !empty($input['subject_id']) ? $input['subject_id'] : '';
        $subject = $this->post('subject_id') ? $this->post('subject_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('userid'))); 
        
        if (!$this->post('userid') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){
                $check = $this->Api_student->check_session($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    $teacher = $this->Api_student->get_subject_teacher($subject,$id);
                    
                    
                    //echo $teacher;
                    if($teacher != ''){
                        $chapter = $this->Api_student->get_chapter_list($subject,$teacher);
                    foreach ($chapter as $key => $value) {
                        $part=array();
                       $part = $this->Api_student->get_chapter_details($value['chapter_id'],$teacher);
                       // $imges = $this->Api_student->get_chapter_image($value['chapter_id']);
                       //print_r($imges);
                       // $exercise = $this->Api_student->get_exercise($value['chapter_id']);
                       //print_r($part);
                       $data[$key]['chapter_id'] = $value['chapter_id'];
                       $data[$key]['chapter_name'] = $value['chapter_name'];
                       $detail=array();
                       
                       $cnt = 0;
                       foreach ($part as $key1 => $value1) {
                          // print_r($value1);
                          if($value1['type']==1){
                            $detail[$key1]['part_id'] =$value1['part_id'];
                            $detail[$key1]['part_name'] =$value1['topic_title'];
                            $detail[$key1]['type'] ='video';
                            if(!empty($value1['thumb_nail'])){
                                $detail[$key1]['thumbnail'] = base_url().'uploads/thumbnail/'.$value1['thumb_nail'];
                            }
                            else{
                                $detail[$key1]['thumbnail'] = "";
                            }
                          }
                          elseif($value1['type']==3){
                            $detail[$key1]['part_id'] =$value1['part_id'];
                            $detail[$key1]['part_name'] =$value1['topic_title'];
                            $detail[$key1]['type'] ='pdf';
                          }
                          elseif($value1['type']==2){
                            $detail[$key1]['part_id'] =$value1['part_id'];
                            $detail[$key1]['part_name'] =$value1['topic_title'];
                            $detail[$key1]['type'] ='presentaion';
                          }
                          elseif($value1['type']==4){
                            $part_det = $this->Api_student->get_exercise($value1['part_id']);
                            if(!empty($part_det)){
                                $detail[$key1]['part_id'] =$value1['part_id'];
                                $detail[$key1]['part_name'] =$value1['topic_title'];
                                $detail[$key1]['type'] ='question';
                            }
                          }
                          elseif($value1['type']==5){
                            $part_det = $this->Api_student->get_exercise($value1['part_id']);
                            if(!empty($part_det)){
                            $detail[$key1]['part_id'] =$value1['part_id'];
                            $detail[$key1]['part_name'] =$value1['topic_title'];
                            $detail[$key1]['type'] ='exercise';
                            }
                          }
                          elseif($value1['type'] == 6){
                            
                            //print_r($part_det);exit();
                           
                            $detail[$key1]['part_id'] = $value1['part_id'];
                            $detail[$key1]['part_name'] = $value1['topic_title'];
                            $detail[$key1]['type'] = 'image';
                            $detail[$key1]['image'] = base_url().'uploads/chapter/'.$value1['image'];
                            
                          }
                          // $cnt=$key1+1;
                       }
                       //print_r($detail);
                       if(!empty($detail)){
                        $presentation=array();
                        $video=array();
                        $pdf=array();
                        $exercise=array();
                        $question=array();
                        $image = array();
                       foreach ($detail as  $value) {
                           if($value['type'] == 'video'){
                                $video[] = $value;
                           }
                           elseif($value['type'] == 'pdf'){
                                $pdf[] = $value;
                           }
                           elseif($value['type'] == 'presentaion'){
                                $presentation[]=$value;
                                //$data[$key]['presentaion'] = $value;
                           }
                           elseif($value['type'] == 'question'){
                                $question[] = $value;
                           }
                           elseif($value['type'] == 'exercise'){
                                $exercise[] = $value;
                           }
                           elseif($value['type'] == 'image'){
                                $image[] = $value;
                           }
                           
                           
                       }
                       
                       $data[$key]['presentaion'] =$presentation;
                       $data[$key]['video'] =$video;
                       $data[$key]['exercise'] =$exercise;
                       $data[$key]['pdf'] =$pdf;
                       $data[$key]['question'] =$question;
                       $data[$key]['image'] = $image;
                       }
                       else{
                        $data[$key]['chapters'] =$detail;
                       }
                       
                    }
                    if(!empty($data)){ 
                        $out = array('status'=>1,'message'=>'','data'=>$data);
                    }
                    else{
                        $out = array('status'=>0,'message'=>'There is no data','data'=>new stdClass);
                    }}
                    else{
                        $out = array('status'=>0,'message'=>'There is no data','data'=>new stdClass);
                    }
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'student id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);
    }
    
    function chapter_content_post(){

        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value = !empty($input['part_id']) ? $input['part_id'] : '';
        $part_id = $this->post('part_id') ? $this->post('part_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('userid'))); 
        
        if (!$this->post('userid') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){
                $check = $this->Api_student->check_session($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    $data = $this->Api_student->get_chapter_part($part_id,$id);
                    $content= array();
                    if($data['type'] == 1){
                        $content['type'] = 'video';
                        $content['title'] = $data['topic_title'];
                        $content['content'] = base_url().'uploads/video/'.$data['content'];
                        if(!empty($data['thumb_nail'])){
                            $content['thumbnail'] = base_url().'uploads/thumbnail/'.$data['thumb_nail'];
                        }
                        else{
                            $content['thumbnail'] = "";
                        }
                    }
                    elseif($data['type'] == 3){
                        $content['type'] = 'pdf';
                        $content['title'] = $data['topic_title'];
                        $content['content'] = base_url().'uploads/pdf/'.$data['content'];
                    }
                    elseif($data['type'] == 2){
                        // print_r($data);exit();
                        $content['type'] = 'presentation';
                        $content['title'] = $data['topic_title'];
                        $user_topic_id = $this->Api_student->get_user_topic($data['type_id'],$data['teacher_id']);

                        $topics = $this->Api_student->list_presentation_topic($user_topic_id);
                        
                        // if(!empty($topics['topic_title'])){
                        //     $topics['topic_title'] = strip_tags($topics['topic_title']);
                        // }
                        // if(!empty($topics['topics'])){
                        //    foreach($topics['topics'] as $key => $value){
                        //      $topics['topics'][$key]['topic_title'] = strip_tags($value['topic_title']);
                        //    }
                        // }
                        // if(!empty($topics['topic'])){
                        //    foreach($topics['topic'] as $key1 => $value1){
                        //      $topics['topic'][$key1]['topic_title'] = strip_tags($value1['topic_title']);
                        //    }
                        // }

                        $content['content'] = $topics;
                    }
                    elseif($data['type'] == 6){
                        $content['type'] = 'image';
                        $content['title'] = $data['topic_title'];
                        $content['content'] = base_url().'uploads/chapter/'.$data['image'];
                    }
                    
                    if(!empty($content)){ 
                        $out = array('status'=>1,'message'=>'','data'=>$content);
                    }
                    else{
                        $out = array('status'=>0,'message'=>'There is no data','data'=>new stdClass);
                    }
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'student id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);
    }
     function exercise_post(){

        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value = !empty($input['part_id']) ? $input['part_id'] : '';
        $chapter_id = $this->post('part_id') ? $this->post('part_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('userid'))); 
        
        if (!$this->post('userid') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){
                $check = $this->Api_student->check_session($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    $data = $this->Api_student->get_exercise($chapter_id);
                   
                    //print_r($data);
                    if(!empty($data)){ 
                        $out = array('status'=>1,'message'=>'','data'=>$data);
                    }
                    else{
                        $out = array('status'=>0,'message'=>'There is no data','data'=>new stdClass);
                    }
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'student id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);
    }
    //new api 
    function search_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value = !empty($input['keyword']) ? $input['keyword'] : '';
        $keyword = $this->post('keyword') ? $this->post('keyword') : $value;

        $value = !empty($input['page']) ? $input['page'] : '';
        $page = $this->post('page') ? $this->post('page') : $value;

        $id = $this->security->xss_clean(trim($this->post('userid'))); 
        
        if (!$this->post('userid') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            $check = $this->Api_student->check_session($id,$session);
            if($check['status']== 0){
                $out = array('status'=>3,'message'=>'Session does not match.');
            }
            else{
                $img = array();
                $details = array();
                $details1 = array();
                $images = $this->Api_student->get_search_image($keyword);
                $pg = $page-1;
                $img_count = count($images);
                
                foreach ($images as $key => $value) {
                    $img[$key]['image'] = base_url().'uploads/chapter/'.$value['chapter_image'];
                    $img[$key]['title'] =$value['image_title'];
                }
                $temp_img =array_chunk($img,10);
                //echo ceil($img_count / 10);exit();
                if(ceil($img_count / 10) >= $page ){
                    $details['images'] = $temp_img[$pg];
                }
                else{
                    $details['images'] =array();
                }
                
                $presentation = $this->Api_student->get_search_presentation($keyword);
                $pr_count = count($presentation);
                 // echo ceil($pr_count / 10);
                 // echo $page;exit();
                $temp_prstn =array_chunk($presentation,10);
                //print_r($temp_prstn[$pg]);
                if(ceil($pr_count / 10) >= $page ){
                   // print_r($temp_prstn[$pg]);exit();
                    $details['presentation'] = $temp_prstn[$pg];
                }
                else{
                    $details['presentation'] =array();
                }
                //print_r($details);exit();

                if(!empty($details)){ 
                    $out = array('status'=>1,'message'=>'','data'=>$details);
                }
                else{
                    $out = array('status'=>0,'message'=>'There is no data','data'=>new stdClass);
                }

            }
        }
        $this->response($out);
    }
    function search_content_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        //print_r($input);exit();

        $value = !empty($input['session']) ? $input['session'] : '';
        $value;
        $session = $this->post('session') ? $this->post('session') : $value;

        $value = !empty($input['id']) ? $input['id'] : '';
        $content_id = $this->post('id') ? $this->post('id') : $value;

        $value = !empty($input['userid']) ? $input['userid'] : '';
        $id = $this->post('userid') ? $this->post('userid') : $value;

        //$id = $this->security->xss_clean(trim($this->post('userid'))); 
        //exit();
        if (empty($id)) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            $check = $this->Api_student->check_session($id,$session);
            if($check['status']== 0){
                $out = array('status'=>3,'message'=>'Session does not match.');
            }
            else{

                $topics = $this->Api_student->list_presentation_topic($content_id);
               
                
                //print_r($details);exit();

                if(!empty($topics)){ 
                    $out = array('status'=>1,'message'=>'','data'=>$topics);
                }
                else{
                    $out = array('status'=>0,'message'=>'There is no data','data'=>new stdClass);
                }

            }
        }
        $this->response($out);
    }
}