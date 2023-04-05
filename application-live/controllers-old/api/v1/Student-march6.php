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
            ///////////athulya///////////////////////////////
            $value = !empty($input['fcm']) ? $input['fcm'] : '';
            $fcm = $this->post('fcm') ? $this->post('fcm') : $value;
            ///////////////close/////////////////////////////

            if($phone && $password){
                $login = $this->Api_student->getDatas_login($phone,$password);
                ///////////athulya///////////////////////////////
                // print_r($login);
                // die();
                if(!empty($login)){
                    $data_update=array('platform' => $platform);
                    if($login['user_type'] == 'student'){
                        $this->Api_student->update_data_by_phone($data_update,$phone);
                        if($login['session_value'] == 0){
                            $session['session_value'] = time().rand(0,10000);
                            if($fcm){
                                $session['fcm'] = $fcm;
                            }
                            // $updte_where['id'] = $login['id'];
                            $this->Api_student->update_student_details($session,$login['id']);
                           
                        }
                         $login = $this->Api_student->getDatas($login['id']);
                    }else if($login['user_type'] == 'teacher'){
                        $this->Api_student->update_data_by_phone_teacher($data_update,$phone);
                        if($login['session_value'] == 0){
                            $session['session_value'] = time().rand(0,10000);
                            if($fcm){
                                $session['fcm'] = $fcm;
                            }
                            $updte_where['teacher_id'] = $login['teacher_id'];
                            $this->Api_student->update_teacher_details($session,$login['teacher_id']);
                           
                        }
                        $login = $this->Api_student->getDatas_teacher($login['teacher_id']);
                    }
                        
                    // $this->load->model('M_log');

                    // $this->M_log->insert_log("app_login_success", $login['user_type']." login success", $login['id']);
                    $out = array('status'=>1,'message'=>'Successfully logged in','data'=>$login);
                }
                else{
                    $out = array('status'=>0,'message'=>'Invalid username or password','data'=>new stdClass);
                }
                ///////////////close/////////////////////////////



                // if(!empty($login)){
                //     $data_update=array('platform' => $platform);

                //     $this->Api_student->update_data_by_phone($data_update,$phone);
                //     if($login['session_value'] == 0){
                //         $session['session_value'] = time().rand(0,10000);
                //         $updte_where['id'] = $login['id'];
                //         $this->Api_student->update_student_details($session,$login['id']);
                       
                //     }
                //      $login = $this->Api_student->getDatas($login['id']);
                //     //$this->M_log->insert_log("app_login_success", "Consultant login success", $login[0]['id']);
                //     $out = array('status'=>1,'message'=>'Successfully logged in','data'=>$login);
                // }
                // else{
                //     //$this->M_log->insert_log("app_login_failure", "Consultant login failure " . $password, 0);
                //     $out = array('status'=>0,'message'=>'Invalid username or password','data'=>new stdClass);
                // }



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
                    $this->Api_student->insert_log("APP - Log out",$user_id,'Student' );
                    
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
                    $this->Api_student->insert_log("APP - Password Changed",$id,'Student' );
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

        $c = 0;

        $active_user = $this->Api_student->get_student_by_phone($phone);
        if(empty($active_user)){
            $active_user = $this->Api_student->get_teacher_by_phone($phone);
            if(empty($active_user)){
                $out = array('status'=>0,'message'=>'Invalid Phone.');
            }
            else{
                $c = 1;
            }
        }
        else{
                $c =2;
        }
        if($c !=0){
                $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

                if($c == 2){
                     $password = substr( str_shuffle( $chars ), 0, 12 );
                    $user_where['phone'] = $phone;
                    // $user_where['status'] = 1;
                    $update_data['password'] = password_hash($password,PASSWORD_DEFAULT);

                    $this->Api_student->update_student($user_where,$update_data);
                        
                    $userdata = $this->Api_student->get_student_by_phone($phone);
                    $phone_user = $userdata['phone'];

                }else if($c ==1){
                    $password = substr( str_shuffle( $chars ), 0, 8 );
                    $user_where['teacher_phone'] = $phone;
                    // $user_where['teacher_status'] = 1;
                    $update_data['teacher_password'] = password_hash($password,PASSWORD_DEFAULT);

                    $this->Api_student->update_teacher($user_where,$update_data);
                        
                    $userdata = $this->Api_student->get_teacher_by_phone($phone);
                    $phone_user = $userdata['teacher_phone'];

                }
                if($userdata){
                     $message = 'Mesoki - Your new password is '.$password;
                    $this->load->library('sms');
                    $resp = $this->sms->send_sms($phone_user,$message);
// print_r($resp);
                    
                    $out = array('status'=>1,'message'=>'New Password has been send to your phone.');
                }else{
                    $out = array('status'=>1,'message'=>'Enter valid phonenumber.');

                }
               
            
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

        $value = !empty($input['fcm']) ? $input['fcm'] : '';
        $fcm = $this->post('fcm') ? $this->post('fcm') : $value; 
        // bhagya new update
        $value = !empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value; 
        
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
                    $session = array();
                    if($fcm){
                        $session['fcm'] = $fcm;
                    $this->Api_student->update_student_details($session,$id);

                    }
                            // $updte_where['id'] = $login['id'];
                    $student = $this->Api_student->get_student_by_id($id);
                    $timetable = $this->Api_student->today_timetable($student['batch_id']);
                    // $subject = $this->Api_student->get_subject($student['course_id']);
                    $subject = $this->Api_student->get_subject($student['batch_id']);
                    $news = $this->Api_student->get_news($student['institute_id']);

                    $events = $this->Api_student->get_events($student['institute_id']);

//////////////////***************** New updations-  athulya************///////////
            //*****************Recent Presentation************//
            $recentpresentation = $this->Api_student->get_recentpresentations($id);
                        //*****************Recent Chapter************//
            $recentchapter = $this->Api_student->get_recentchapters($id);
        //////////////////////////close Athulya/////////////////////////////////
             ////////////////////////new update - bhagya ///////////////////
                 if(empty($semester)){
                        $subject = $this->Api_student->get_active_subject($student['batch_id']);
                    }
                    else{
                        $subject = $this->Api_student->get_semester_subject_details($student['batch_id'],$semester);
                    }
                    // $published_subject = $this->Api_student->get_published_semester($student['batch_id']);
                    $published_subject = $this->Api_student->get_current_semester($semester,$student['batch_id']);

                    // $subject = $this->Api_student->get_subject($student['batch_id'],$semester);
// echo $student['batch_id'];
// die();
                    

            ///////////////////////////////////////////////////////////////////////

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
                    // if(!empty($student)){ 
                    //     $out = array('status'=>1,'message'=>'','todays'=>$todays,'subject' => $subject,'news'=>$news,'events' => $events);
                    // }
                    // else{
                    //     $out = array('status'=>0,'message'=>'There is no consultant','data'=>new stdClass);
                    // }

  /////////////***************** New updations-  athulya************///////////
                    foreach($recentpresentation as $key => $value){
                        if($value['date'] != '0000-00-00'){
                            $recentpresentation[$key]['date'] = date('d-m-Y H:i:s',strtotime($value['date']));
                        }
                        else{
                            $recentpresentation[$key]['date']= '';
                        }
                        if($value['thumbnail'] != ''){
                            $recentpresentation[$key]['thumbnail'] = base_url().'uploads/slide/'.$value['thumbnail'];
                            
                        }
                        else{
                            $recentpresentation[$key]['thumbnail'] = '';
                        }
                    }


                    foreach($recentchapter as $key => $value){
                        if($value['date'] != '0000-00-00'){
                            $recentchapter[$key]['date'] = date('d-m-Y H:i:s',strtotime($value['date']));
                        }
                        else{
                            $recentchapter[$key]['date']= '';
                        }
                        if($value['thumbnail'] != ''){
                            $recentchapter[$key]['thumbnail'] = base_url().'uploads/chapter_thumbnail/'.$value['thumbnail'];
                            
                        }
                        else{
                            $recentchapter[$key]['thumbnail'] = '';
                        }
                    }

                    $nocount = $this->Api_student->get_notifications_student_count($id);
                    $semester = $this->Api_student->get_semester($student['batch_id']);

                    if(!empty($student)){ 
                        $out = array('status'=>1,'message'=>'','todays'=>$todays,'subject' => $subject,'news'=>$news,'events' => $events,'recent_presentations' => $recentpresentation,'recent_chapter' => $recentchapter, 'notification_count'=> $nocount,'publish_semester' => $published_subject,'semesters'=>$semester);
                    }
                    else{
                        $out = array('status'=>0,'message'=>'There is no consultant','data'=>new stdClass);
                    }

//////////////////////////close Athulya/////////////////////////////////



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
                    //print_r($week);exit();
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
                            'sat'=>$days['Saturday'],
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

          $value = !empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value;

        $id = $this->security->xss_clean(trim($this->post('userid'))); 
        
        if (!$this->post('userid') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){

                // $check = $this->Api_student->check_session($id,$session);
                // if($check['status']== 0){
                //     $out = array('status'=>3,'message'=>'Session does not match.');
                // }
                // else{


                 $c = 0;
                 $t = 0;
                $check = $this->Api_student->check_session($id,$session);
                // print_r($check);
                if($check['status']== 0){
                    $check = $this->Api_student->check_session_teacher($id,$session);
                    if($check['status']== 0){

                        $out = array('status'=>3,'message'=>'Invalid data.');
                    }else{
                        $t =1;
                        $c =1;
                    }
                }else{
                    $c=1;
                }

                if($c== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    if($t==1){
                        $teacher  = $id;
                    }else{
                        $teacher = $this->Api_student->get_subject_teacher($subject,$id);
                    }
                    
                    $batch = $this->Api_student->get_semester_batch($semester);
                    //echo $teacher;
                    if($teacher != ''){
                        $chapter = $this->Api_student->get_chapter_list($subject,$teacher,$batch);
                    foreach ($chapter as $key => $value) {
                        $part=array();
                       $part = $this->Api_student->get_chapter_details_library($value['chapter_id'],$teacher);
                       $chapter_image = $this->Api_student->get_chapter_image($value['chapter_id']);
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
                            $part_det = $this->Api_student->get_exercise($value1['part_id'],$batch);
                            if(!empty($part_det)){
                                $detail[$key1]['part_id'] =$value1['part_id'];
                                $detail[$key1]['part_name'] =$value1['topic_title'];
                                $detail[$key1]['type'] ='question';
                            }
                          }
                          elseif($value1['type']==5){
                            $part_det = $this->Api_student->get_exercise($value1['part_id'],$batch);
                            if(!empty($part_det)){
                            $detail[$key1]['part_id'] =$value1['part_id'];
                            $detail[$key1]['part_name'] =$value1['topic_title'];
                            $detail[$key1]['type'] ='exercise';
                            }
                          }
                          // elseif($value1['type'] == 6){
                            
                          //   //print_r($part_det);exit();
                           
                          //   $detail[$key1]['part_id'] = $value1['part_id'];
                          //   $detail[$key1]['part_name'] = $value1['topic_title'];
                          //   $detail[$key1]['type'] = 'image';
                          //   $detail[$key1]['image'] = base_url().'uploads/chapter/'.$value1['image'];
                            
                          // }
                          // $cnt=$key1+1;
                       }
                       //print_r($detail);
                       $presentation=array();
                        $video=array();
                        $pdf=array();
                        $exercise=array();
                        $question=array();
                       if(!empty($detail)){
                        
                        //$image = array();
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
                           // elseif($value['type'] == 'image'){
                           //      $image[] = $value;
                           // }
                           
                           
                       }
                       
                      
                       }
                       elseif(!empty($chapter_image)){
                        $data[$key]['image'] = $chapter_image;
                       }
                       else{

                        $data[$key]['chapters'] =$detail;
                       }
                       $data[$key]['presentaion'] =$presentation;
                       $data[$key]['video'] =$video;
                       $data[$key]['exercise'] =$exercise;
                       $data[$key]['pdf'] =$pdf;
                       $data[$key]['question'] =$question;
                       $data[$key]['image'] = $chapter_image;
                       
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

        $value = !empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value;

   

        $id = $this->security->xss_clean(trim($this->post('userid'))); 
        
        if (!$this->post('userid') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){
              

                $c =0;
                $check = $this->Api_student->check_session($id,$session);
                // print_r($check);
                if($check['status']== 0){
                    $check = $this->Api_student->check_session_teacher($id,$session);
                    if($check['status']== 0){

                        $out = array('status'=>3,'message'=>'Invalid data.');
                    }else{
                        $c =1;
                    }
                }else{
                    $c=1;
                }

                if($c== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                      $batch = $this->Api_student->get_semester_batch($semester);
                    $data = $this->Api_student->get_chapter_part($part_id,$id,$batch);
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
                        $subject = $this->Api_student->get_chapter_subject($part_id);

                        $user_topic_id = $this->Api_student->get_user_topic($data['type_id'],$data['teacher_id'],$semester,$subject);
                       
                        if($user_topic_id =="" || $user_topic_id ==0){
                          $user_topic_id = $data['type_id'];
                        }
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
            $out = array('status'=>0,'message'=>'user id field is mandatory','data'=>$null);
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



         $value = !empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value;

        $id = $this->security->xss_clean(trim($this->post('userid'))); 
        
        if (!$this->post('userid') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){
                   $c =0;
                $check = $this->Api_student->check_session($id,$session);
                // print_r($check);
                if($check['status']== 0){
                    $check = $this->Api_student->check_session_teacher($id,$session);
                    if($check['status']== 0){

                        $out = array('status'=>3,'message'=>'Invalid data.');
                    }else{
                        $c =1;
                    }
                }else{
                    $c=1;
                }

                if($c== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                
                else{
                     $batch = $this->Api_student->get_semester_batch($semester);
                    $data = $this->Api_student->get_exercise($chapter_id,$batch);
                   
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
        $keyword = trim($this->post('keyword')) ? trim($this->post('keyword')) : $value;

        $value = !empty($input['page']) ? $input['page'] : '';
        $page = $this->post('page') ? $this->post('page') : $value;

        $id = $this->security->xss_clean(trim($this->post('userid'))); 
        $keyword = trim($keyword);
        
        if (!$this->post('userid') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            
            $keyword = str_replace("'","\'",$keyword);
        	$c =0;
            $check = $this->Api_student->check_session($id,$session);
            if($check['status']== 0){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){

                    $out = array('status'=>3,'message'=>'Invalid data.');


                }else{
                    $c =1;
                }
            }else{
                $c=1;

               
            }
            if($c ==1){
                $img = array();
                $details = array();
                $details1 = array();
                //16-12-2020
                $pg = $page-1;
                $limit = 10;
                $offset = ($pg*10);

                $images = $this->Api_student->get_search_image($keyword,$limit,$offset);
                //$pg = $page-1;
                $img_count = count($images);
                foreach ($images as $key => $value) {
                    $img[$key]['image'] = base_url().'uploads/chapter/'.$value['chapter_image'];
                    $img[$key]['title'] =$value['image_title'];
                }
                $details['images'] = $img;
                // $temp_img =array_chunk($img,10);
                // //echo ceil($img_count / 10);exit();
                // if(ceil($img_count / 10) >= $page ){
                //     $details['images'] = $temp_img[$pg];
                // }
                // else{
                //     $details['images'] =array();
                // }
                
                $topics = $this->Api_student->get_search_topics($keyword,$limit,$offset);
                
                // $pr_count = count($topics);
                //  // echo ceil($pr_count / 10);
                //  // echo $page;exit();
                // $temp_prstn =array_chunk($topics,10);
                // //print_r($temp_prstn[$pg]);
                // if(ceil($pr_count / 10) >= $page ){
                //    // print_r($temp_prstn[$pg]);exit();
                //     $details['topics'] = $temp_prstn[$pg];

                // }
                // else{
                //     $details['topics'] =array();
                // }
                $details['topics'] = $topics;



                 $presentation = $this->Api_student->get_search_presentation($keyword,$limit,$offset);
                 $details['presentation'] = $presentation;


                $practice = $this->Api_student->get_search_practice($keyword,$limit,$offset);
                $details['practice'] = $practice;

                $exercise = $this->Api_student->get_search_exercise($keyword,$limit,$offset);
                $details['exercise'] = $exercise;
                
                
                // $prs_count = count($presentation);
                
                // $temp_prstns =array_chunk($presentation,10);
                // if(ceil($prs_count / 10) >= $page ){
                //     $details['presentation'] = $temp_prstns[$pg];
                // }
                // else{
                //     $details['presentation'] =array();
                // }
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










    ///////////////Athulya Student new code implementation/////////////////////////


    /////////********************RECENT CHAPTER**********************///////////////
    // function recent_chapter_post(){
    //     $this->benchmark->mark('start');
    //     $json = file_get_contents('php://input');
    //     $input = json_decode($json,true);


    //     $value = !empty($input['session']) ? $input['session'] : '';
    //     $value;
    //     $session = $this->post('session') ? $this->post('session') : $value;

    //     $value = !empty($input['id']) ? $input['id'] : '';
    //     $content_id = $this->post('id') ? $this->post('id') : $value;

    //     $value = !empty($input['userid']) ? $input['userid'] : '';
    //     $id = $this->post('userid') ? $this->post('userid') : $value;

       
    //     if (empty($id)) {
     
    //         $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
    //     }
    //     else{
    //         $check = $this->Api_student->check_session($id,$session);
    //         if($check['status']== 0){
    //             $out = array('status'=>3,'message'=>'Session does not match.');
    //         }
    //         else{

    //             $topics = $this->Api_student->list_presentation_topic($content_id);
               
                

    //             if(!empty($topics)){ 
    //                 $out = array('status'=>1,'message'=>'','data'=>$topics);
    //             }
    //             else{
    //                 $out = array('status'=>0,'message'=>'There is no data','data'=>new stdClass);
    //             }

    //         }
    //     }
    //     $this->response($out);
    // }

  
    // function recent_presentation_post(){
    //     $this->benchmark->mark('start');
    //     $json = file_get_contents('php://input');
    //     $input = json_decode($json,true);

    //     $value = !empty($input['session']) ? $input['session'] : '';
    //     $value;
    //     $session = $this->post('session') ? $this->post('session') : $value;

    //     $value = !empty($input['id']) ? $input['id'] : '';
    //     $content_id = $this->post('id') ? $this->post('id') : $value;

    //     $value = !empty($input['userid']) ? $input['userid'] : '';
    //     $id = $this->post('userid') ? $this->post('userid') : $value;

    //     if (empty($id)) {
     
    //         $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
    //     }
    //     else{
    //         $check = $this->Api_student->check_session($id,$session);
    //         if($check['status']== 0){
    //             $out = array('status'=>3,'message'=>'Session does not match.');
    //         }
    //         else{

    //             $topics = $this->Api_student->list_presentation_topic($content_id);
               

    //             if(!empty($topics)){ 
    //                 $out = array('status'=>1,'message'=>'','data'=>$topics);
    //             }
    //             else{
    //                 $out = array('status'=>0,'message'=>'There is no data','data'=>new stdClass);
    //             }

    //         }
    //     }
    //     $this->response($out);
    // }

    //Chapters View
    public function interactive_view_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value = !empty($input['subject_id']) ? $input['subject_id'] : '';
        $subject = $this->post('subject_id') ? $this->post('subject_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('student_id'))); 
        
       if (!$this->post('student_id') && json_last_error() != 0) {
     
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
                     $teachers = $this->Api_student->get_subject_teachers($subject,$id);
                    $chapter1=array();
                    $chapter2=array();


                      $student = $this->Api_student->get_student_by_id($id);
                        $batch = $student['batch_id'];
                    if(!empty($teachers)){
                        foreach ($teachers as $key => $value) {
                            $tid = $value['teacher_id'];
                            $chapter1 = $this->Api_student->get_chapter_list($subject,$tid,$batch);
                            foreach ($chapter1 as $key2 => $value1) {
                               $chapter2[] =  $value1;
                            }
                        }

                    }

                    $chapter =  $chapter2;

                    if(!empty($teachers)){
                        // $chapter = $this->Api_student->get_chapter_list($subject,$teacher);
                     
                    foreach ($chapter as $key => $value) {
                       $part=array();
                       $part = $this->Api_student->get_chapter_details($value['chapter_id'],$teacher,$batch);
                        if($value['chapter_thumbnail'] !=""){
                            $path = base_url().'uploads/chapter_thumbnail/';
                        }else{
                             $path = "";
                        }
                       $data[$key]['id'] = $value['chapter_id'];
                       $data[$key]['title'] = $value['chapter_name'];
                       if($value['chapter_thumbnail'] != ''){
                            $data[$key]['thumbnail'] = $path.$value['chapter_thumbnail'];
                            
                        }
                        else{
                            $data[$key]['thumbnail'] = '';
                        }
                       
                       
                       
                    }
                    if(!empty($data)){ 
                        $out = array('status'=>1,'message'=>'','data'=>$data);
                    }
                    else{
                        $out = array('status'=>0,'message'=>'There is no data','data'=>new stdClass);
                    }}
                    else{
                        $out = array('status'=>0,'message'=>'There is no datas','data'=>new stdClass);
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



//Chapters View
    public function chapter_view_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value = !empty($input['subject_id']) ? $input['subject_id'] : '';
        $subject = $this->post('subject_id') ? $this->post('subject_id') : $value;

        $value = !empty($input['chapter_id']) ? $input['chapter_id'] : '';
        $chapter = $this->post('chapter_id') ? $this->post('chapter_id') : $value;

        $value = !empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value;

        $id = $this->security->xss_clean(trim($this->post('student_id'))); 
        
       if (!$this->post('student_id') && json_last_error() != 0) {
     
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
                        $chapter_details = $this->Api_student->get_chapter($chapter);
                        if($chapter_details['backgroundimage'] != ''){
                           $backgroundimage = base_url().'uploads/'.$chapter_details['backgroundimage'];
                        }
                        else{
                            $backgroundimage = '';
                        }
                        $part=array();

                        $part = $this->Api_student->get_chapter_details_webview($chapter,$teacher,$semester);
                    if(!empty($part)){ 
                        $out = array('status'=>1,'message'=>'','background_image'=>$backgroundimage,'data'=>$part);
                        $this->Api_student->insert_log("APP - Chapter view".$chapter,$id,'Student' );
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




 public function presentation_view_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['presentation_id']) ? $input['presentation_id'] : '';
        $presentation_id = $this->post('presentation_id') ? $this->post('presentation_id') : $value;

        // $value =!empty($input['subject_id']) ? $input['subject_id'] : '';
        // $subject_id = $this->post('subject_id') ? $this->post('subject_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('student_id'))); 
        
        if (!$this->post('student_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $check = $this->Api_student->check_session($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                    // $newtopic = new stdClass();
                    // $teacher = $this->Api_student->get_subject_teacher($subject_id,$id);
                    //   if($teacher !=""){
                    //     $publish_status = $this->Api_student->check_content_publish($presentation_id,$teacher);

                    // }else{
                        $publish_status  =1;
                    // }
                    $presentation = $this->Api_student->get_childs($presentation_id);
                    $presentation_flow = $this->Api_student->get_childs_flow($presentation_id);
              
                    if(!empty($presentation)){ 
                        $out = array('status'=>1,'message'=>'','publish_status'=>$publish_status,'data'=>$presentation,'flow'=>$presentation_flow);
                        $this->Api_student->insert_log("APP - Presentation view".$presentation_id,$id,'Student' );
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


    //////////////////Questionnaire ///////////////////////////////////////////
     public function questionnaire_list_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['slide_id']) ? $input['slide_id'] : '';
        $slide = $this->post('slide_id') ? $this->post('slide_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('student_id'))); 
        
        if (!$this->post('student_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $check = $this->Api_student->check_session($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                    $questions = $this->Api_student->get_topic_questions($slide);
                    if(!empty($questions)){ 
                        $out = array('status'=>1,'message'=>'','data'=>$questions);
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

////////////////////////question and answer list///////////////////////
     public function qanda_question_list_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['slide_id']) ? $input['slide_id'] : '';
        $slide = $this->post('slide_id') ? $this->post('slide_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('student_id'))); 
        
        if (!$this->post('student_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $check = $this->Api_student->check_session($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                    // print_r($slide);
                    // die();
                    $questions = $this->Api_student->get_topic_qanda_questions($slide,$id,'student');
                     // print_r($questions);
                     // die();
                    if(!empty($questions)){ 
                        $out = array('status'=>1,'message'=>'','data'=>$questions);
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


     public function qanda_answer_list_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['slide_id']) ? $input['slide_id'] : '';
        $slide = $this->post('slide_id') ? $this->post('slide_id') : $value;

        $value =!empty($input['question_id']) ? $input['question_id'] : '';
        $question_id = $this->post('question_id') ? $this->post('question_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('student_id'))); 
        
        if (!$this->post('student_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $check = $this->Api_student->check_session($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                    $answers = $this->Api_student->get_topic_qanda_answer($slide,$question_id);

                    if(!empty($answers)){ 
                        $out = array('status'=>1,'message'=>'','data'=>$answers);
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

    public function add_qanda_question_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['slide_id']) ? $input['slide_id'] : '';
        $slide = $this->post('slide_id') ? $this->post('slide_id') : $value;

        $value =!empty($input['question_id']) ? $input['question_id'] : '';
        $question_id = $this->post('question_id') ? $this->post('question_id') : $value;
        
        $value =!empty($input['question']) ? $input['question'] : '';
        $question = $this->post('question') ? $this->post('question') : $value;
       
        $value =!empty($input['type']) ? $input['type'] : '';
        $type = $this->post('type') ? $this->post('type') : $value;

        $value =!empty($input['subject']) ? $input['subject'] : '';
        $subject = $this->post('subject') ? $this->post('subject') : $value;

        $id = $this->security->xss_clean(trim($this->post('student_id'))); 
        
        if (!$this->post('student_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $type){
                $check = $this->Api_student->check_session($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                        $data = array();
                        if($type == 'audio'){

                        	$file_name = $_FILES['question']['name'];
		                    $file_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_name);
		                    $ext = pathinfo($_FILES['question']['name'], PATHINFO_EXTENSION);
							// change name
							$imagename = $file_name . time() .$slide. "." . $ext;  
		                    $target_file = './uploads/qanda/'.$imagename;

                           
                             if (move_uploaded_file($_FILES["question"]["tmp_name"], $target_file)) {
                                $data['audio'] = $imagename;

                             }else{
                                 $error_msg = $this->upload->display_errors();
                                // audio uploaded error
                                $out = array('status'=>0,'message'=>$error_msg,'data'=>new stdClass);
                             }

                            // $config['upload_path']          = './uploads/qanda/';
                            // $config['allowed_types']        = 'mp3|wav';
                            // $config['max_size']             = 5*1024;
                            // // $config['max_width']            = 745;
                            // // $config['max_height']           = 278;
                            // // $config['min_width']            = 740;
                            // // $config['min_height']           = 270;
                            // $new_name = time();
                            // $config['file_name'] = $new_name;
                            // $this->load->library('upload', $config);

                            // if ( ! $this->upload->do_upload('question'))
                            // {
                            //     $error_msg = $this->upload->display_errors();
                            //     // audio uploaded error
                            //     $out = array('status'=>0,'message'=>$error_msg,'data'=>new stdClass);
                            // }
                            // else{
                            //     $upload_data = $this->upload->data();
                            //     $data['audio'] = $upload_data['file_name'];
                            // }
                        }else if($type == 'text'){
                            $data['text'] = $question;
                        }else if($type == 'image'){
                            $config['upload_path']          = './uploads/qanda/';
                            $config['allowed_types']        = 'jpg|png|jpeg';
                            $config['max_size']             = 5*1024;
                            // $config['max_width']            = 745;
                            // $config['max_height']           = 278;
                            // $config['min_width']            = 740;
                            // $config['min_height']           = 270;
                            $new_name = time();
                            $config['file_name'] = $new_name;
                            $this->load->library('upload', $config);

                            if ( ! $this->upload->do_upload('question'))
                            {
                                $error_msg = $this->upload->display_errors();
                                // audio uploaded error
                                $out = array('status'=>0,'message'=>$error_msg,'data'=>new stdClass);
                            }
                            else{
                                $upload_data = $this->upload->data();
                                $data['image'] = $upload_data['file_name'];
                            }
                        }
                    if($question_id){
                         $data['qanda_question_id'] = $question_id;
                        $data['user_id'] = $id;
                        $data['user_type'] = 0;
                        $data['created_at'] = date("Y-m-d H:i:s");  
                                         
                        $pid = $this->Api_student->add_data($data,'presentation_qanda_answers');
                        $cnid = $question_id;

                    }else{
                        $data['student_id'] = $id;
                        $data['topic_id'] = $slide;
                        $data['created_at'] = date("Y-m-d H:i:s");  
                        $pid = $this->Api_student->add_data($data,'presentation_qanda_questions');
                        $cnid = $pid;
                    }
                    // $this->load->model('M_log');
                    
                    if($pid){ 
                        $out = array('status'=>1,'message'=>'Question Added','data'=>$pid);
                           $this->Api_student->insert_log("APP - Q and A Question Added".$pid,$id,'Student' );
                        // $this->M_log->insert_log("question_added", "student question added", $id);
                            // $sub = $this->Api_student->get_presentationsubject($slide);
                            // $subject = $sub['data_id'];
                            $token_data = $this->Api_student->get_subject_teacher_token($subject,$id);
                            // print_r($subject);
                            // echo "subject";
                            // print_r($id);
                            // echo "id";

                            // print_r($token_data);
                            // echo "tda";

                            // die();
                            if(!empty($token_data)){
                            	$tkid = $token_data['id'];
                            	$token = $token_data['fcm'];
                            }else{
                            	$tkid = "";
                            	$token = "";
                            }
                            
                            $presentation_name = $this->Api_student->get_topic_main_parent_name($slide);
                            $st_name = $this->Api_student->get_student_details($id);
                            $subname = $this->Api_student->get_subject_data($subject);
                            $this->load->library('Fcm');
                            $title = "A new question asked from ".$subname;
                            $message = $st_name['name']." asked a question in ".$presentation_name;
                            $var['title'] = $title;
                            $var['message'] = $message;
                            $var['image'] = "";
                            // base_url().'uploads/notifications/'.$upload_data['file_name'];
                            $data2['type'] = "question_reply";
                            $data2['link'] = "";

                            $datan['user_type'] = 'teacher';
                            $datan['title'] = $title;
                            $datan['message'] = $message;
                            $datan['date'] = date('Y-m-d');
                            $datan['is_read'] = '0';
                            $datan['type'] = 'question_reply';
                            $datan['content_id'] = $cnid;
                            $datan['created_by'] = $id;
                            $datan['created_on'] = time();;

                                             
                            $nid = $this->Api_student->add_data($datan,'notifications');

                            $notificationdata['user_id'] = $tkid;
                            $notificationdata['not_id'] = $nid;
                            $notificationdata['created_on'] = date('Y-m-d');
                            $not_id = $this->Api_student->add_data($notificationdata,'notifications_user');

                            $res1 = $this->fcm->send_push_message($token, $var, $data2);
                    }
                    else{
                        $out = array('status'=>0,'message'=>'Question Add Failed','data'=>new stdClass);
                    } 
                }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Student id field is mandatory','data'=>$null);
            }elseif(!$type){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Type field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }




////////////////////////Teacher API/////////////////////////////////////////




//Chapters View
    public function chapter_view_teacher_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value = !empty($input['subject_id']) ? $input['subject_id'] : '';
        $subject = $this->post('subject_id') ? $this->post('subject_id') : $value;

        $value = !empty($input['chapter_id']) ? $input['chapter_id'] : '';
        $chapter = $this->post('chapter_id') ? $this->post('chapter_id') : $value;

         $value = !empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value;

        $id = $this->security->xss_clean(trim($this->post('id'))); 
        
       if (!$this->post('id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                    if($id != ''){
                        $chapter_details = $this->Api_student->get_chapter($chapter);
                        if($chapter_details['chapter_thumbnail'] != ''){
                           $backgroundimage = base_url().'uploads/chapter_thumbnail/'.$chapter_details['chapter_thumbnail'];
                        }
                        else{
                            $backgroundimage = '';
                        }
                        $part=array();

                    $part = $this->Api_student->get_chapter_details_view($chapter_details['chapter_id'],$id,$semester);
                    if(!empty($part)){ 
                        $out = array('status'=>1,'message'=>'','background_image'=>$backgroundimage,'data'=>$part);
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
            $out = array('status'=>0,'message'=>'teacher id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);

    }




 public function presentation_view_teacher_post(){
            $this->load->model('PresentationModel');
            $this->load->model('TeacherModel');
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['presentation_id']) ? $input['presentation_id'] : '';
        $presentation_id = $this->post('presentation_id') ? $this->post('presentation_id') : $value;

        $value =!empty($input['subject']) ? $input['subject'] : '';
        $subject = $this->post('subject') ? $this->post('subject') : $value;

        $value =!empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value;
        $id = $this->security->xss_clean(trim($this->post('id'))); 
        
        if (!$this->post('id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                   
                    $batch = $this->Api_student->get_semester_batch($semester);
// print_r($batch);
// echo "d";
                    $topic_parent_id = $this->PresentationModel->get_topic_main_parent($presentation_id);
                    $user_topic_id = $this->Api_student->get_user_topic($topic_parent_id,$id,$semester,$subject);

                    $parent_topic_status = $this->Api_student->get_user_topic_parent_check($topic_parent_id,$id,$semester,$subject);
                    if($parent_topic_status == false || $parent_topic_status == ""){
                        if($user_topic_id == false || $user_topic_id ==""){
                            $publish_status = 2;
                        }else{
                            $publish_status = $this->Api_student->check_content_publish($presentation_id,$id,$batch);
                           
                        }
                    }else{
                        $publish_status = $this->Api_student->check_content_publish($presentation_id,$id,$batch);
                    }
                    

                    $presentation = $this->Api_student->get_childs($presentation_id);
                    $presentation_flow = $this->Api_student->get_childs_flow($presentation_id);
                    // }else{
                        // $publish_status  = 1;
                    // }
                    
              
                    if(!empty($presentation)){ 
                        $out = array('status'=>1,'message'=>'','publish_status'=>$publish_status,'data'=>$presentation,'flow'=>$presentation_flow);
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

    //kavya//




    public function logout_teacher_post(){

              $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $user_id=$this->security->xss_clean(trim($this->post('teacher_id')));
        //exit();
        $value = !empty($input['session_id']) ? $input['session_id'] : '';
        $session = $this->post('session_id') ? $this->post('session_id') : $value;

        $value = !empty($input['platform']) ? $input['platform'] : '';
        $platform = $this->post('platform') ? $this->post('platform') : $value;
      
        if (!$this->post('teacher_id') && json_last_error() != 0) {
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{


            $check = $this->Api_student->check_session_teacher($user_id,$session);
            if($check['status']== 0){
                
                $out = array('status'=>3,'message'=>'Invalid data.');
            }
            else{
            //if($consultant){
                $logout = $this->Api_student->logout_teacher($user_id);
                if($logout){ 
                    $out = array('status'=>1,'message'=>'You are successfully logged out','data'=>'');
                       $this->Api_student->insert_log("APP - Logout",$user_id,'teacher' );
                    
                }else{
                    $out = array('status'=>0,'message'=>'Logout failed','data'=>new stdClass);
                   
                }
            }
            //}
        }
        
        $this->response($out); 



    }


      function change_password_teacher_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        
        $value = !empty($input['new_password']) ? $input['new_password'] : '';
        $new_password = $this->post('new_password') ? $this->post('new_password') : $value;


        $value = !empty($input['old_password']) ? $input['old_password'] : '';
        $old_password = $this->post('old_password') ? $this->post('old_password') : $value;


        $value = !empty($input['teacher_id']) ? $input['teacher_id'] : '';
        $id = $this->post('teacher_id') ? $this->post('teacher_id') : $value;

        $value = !empty($input['session_id']) ? $input['session_id'] : '';
        $session = $this->post('session_id') ? $this->post('session_id') : $value;

        $value = !empty($input['platform']) ? $input['platform'] : '';
        $platform = $this->post('platform') ? $this->post('platform') : $value;

        $check = $this->Api_student->check_session_teacher($id,$session);
        // print_r();
        if($check['status']== 0){
            
            $out = array('status'=>3,'message'=>'Session does not match.');
        }
        else{
            
                $user['teacher_password'] = password_hash($new_password,PASSWORD_DEFAULT);
                $user['session_value'] = time().rand(0,10000);
                $id_return = $this->Api_student->update_teacher_details($user,$id);
                // print_r($id_return);
                // exit();
                if($id_return == 1){
                    $user_data = $this->Api_student->get_teacher_details($id);

                   // print_r($user_data);exit();
                    $out = array('status'=>1,'message'=>'Password Changed Successfully','data'=>$user_data);
                       $this->Api_student->insert_log("APP - Teacher Password Changed",$id,'teacher' );
                }
                else{
                    $out = array('status'=>0,'message'=>'Change password failed.');
                }
            
        }
                
        $this->response($out);     
    }



public function batch_details_teacher_post(){



                 $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value = !empty($input['batch_id']) ? $input['batch_id'] : '';
        $batch_id = $this->post('batch_id') ? $this->post('batch_id') : $value;

        // $value = !empty($input['chapter_id']) ? $input['chapter_id'] : '';
        // $chapter = $this->post('chapter_id') ? $this->post('chapter_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('teacher_id'))); 
        
       if (!$this->post('teacher_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                      

                    //echo $teacher;
                    if($id != ''){
                        $batch = $this->Api_student->get_batch($batch_id);

                         $start = date('d-m-Y',strtotime($batch['batch_start_date']));
                       $end = date('d-m-Y',strtotime($batch['batch_end_date']));

                        $time1 = date('h:i a',strtotime($batch['batch_start_time']));
                       $time2 = date('h:i a',strtotime($batch['batch_end_time']));


                        $batch['date_time']=$start.' to '.$end.' - '.$time1.' to '.$time2;

                        //$batch['date_time']='';

                        if(!empty($batch)){
                            
                            $invite_student = $this->Api_student->get_invite_students($batch_id);
                            $batch['pending'] = $invite_student;
                            $student = $this->Api_student->get_batch_students($batch_id);
                            $arraystudent = array_merge($invite_student,$student);
                            $batch['students']=$arraystudent;

                            //////// 02-01-2020 ///////////
                            $semester = $this->Api_student->get_semester_teacher($batch_id,$id);
                            $batch['semester'] = $semester;
                          
                        }else{
                        $out = array('status'=>0,'message'=>'There is no data','data'=>new stdClass);

                        }
                        
                        $part=array();

                        
                    if(!empty($batch)){ 
                        $out = array('status'=>1,'message'=>'','data'=>$batch);
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
            $out = array('status'=>0,'message'=>'teacher id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);







                }


public function batch_details_teacher2_post(){



                 $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value = !empty($input['batch_id']) ? $input['batch_id'] : '';
        $batch_id = $this->post('batch_id') ? $this->post('batch_id') : $value;

        // $value = !empty($input['chapter_id']) ? $input['chapter_id'] : '';
        // $chapter = $this->post('chapter_id') ? $this->post('chapter_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('teacher_id'))); 
        
       if (!$this->post('teacher_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                      

                    //echo $teacher;
                    if($id != ''){
                        $batch = $this->Api_student->get_batch($batch_id);

                         $start = date('d-m-Y',strtotime($batch['batch_start_date']));
                       $end = date('d-m-Y',strtotime($batch['batch_end_date']));

                        $time1 = date('h:i a',strtotime($batch['batch_start_time']));
                       $time2 = date('h:i a',strtotime($batch['batch_end_time']));


                        $batch['date_time']=$start.' to '.$end.' - '.$time1.' to '.$time2;

                        //$batch['date_time']='';

                        if(!empty($batch)){
                            
                            $invite_student = $this->Api_student->get_invite_students($batch_id);
                            $batch['pending'] = $invite_student;
                            $student = $this->Api_student->get_batch_students($batch_id);
                            $arraystudent = array_merge($invite_student,$student);
                            $batch['students']=$arraystudent;

                            //////// 02-01-2020 ///////////
                            $semester = $this->Api_student->get_semester_teacher2($batch_id,$id);
                            $batch['semester'] = $semester;
                          
                        }else{
                        $out = array('status'=>0,'message'=>'There is no data','data'=>new stdClass);

                        }
                        
                        $part=array();

                        
                    if(!empty($batch)){ 
                        $out = array('status'=>1,'message'=>'','data'=>$batch);
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
            $out = array('status'=>0,'message'=>'teacher id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);







                }

    


         public function chapter_list_teacher_post(){


        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

         $value = !empty($input['teacher_id']) ? $input['teacher_id'] : '';
        $teacher_id = $this->post('teacher_id') ? $this->post('teacher_id') : $value;

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value = !empty($input['subject_id']) ? $input['subject_id'] : '';
        $subject = $this->post('subject_id') ? $this->post('subject_id') : $value;

         $value = !empty($input['batch_id']) ? $input['batch_id'] : '';
        $batch_id = $this->post('batch_id') ? $this->post('batch_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('teacher_id'))); 
        
        if (!$this->post('teacher_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                  //  $teacher = $this->Api_student->get_subject_teacher($subject,$id,$batch_id);
                    
                    
                    //echo $teacher;
                    if($teacher_id != ''){
                        $chapter = $this->Api_student->get_chapter_list_teacher($subject,$teacher_id,$batch_id);
                    foreach ($chapter as $key => $value) {
                        if($value['publish_status'] != ''){

$publish_status=$value['publish_status'];
                            }else{
                                $publish_status=0;



                            }

                        
                        $part=array();
                      // $part = $this->Api_student->get_chapter_details_teacher($value['chapter_id'],$teacher_id);
                       // $imges = $this->Api_student->get_chapter_image($value['chapter_id']);
                       //print_r($imges);
                       // $exercise = $this->Api_student->get_exercise($value['chapter_id']);
                       //print_r($part);

                        if($value['chapter_thumbnail'] !=""){
                            $path = base_url().'uploads/chapter_thumbnail/';
                        }else{
                             $path = "";
                        }
                       $data[$key]['chapter_id'] = $value['chapter_id'];
                       $data[$key]['chapter_name'] = $value['chapter_name'];
                        $data[$key]['thumbnail'] = $path.$value['chapter_thumbnail'];
                     $data[$key]['publish_status'] = $publish_status;
                                                               $data[$key]['created'] = 'primalcodes/23/09/2020';




                                              // $data[$key]['chapter_name'] = $value['chapter_name'];

                       $detail=array();
                       
                       // $cnt = 0;
                       // foreach ($part as $key1 => $value1) {
                       //    // print_r($value1);
                       //    if($value1['type']==1){
                       //      $detail[$key1]['part_id'] =$value1['part_id'];
                       //      $detail[$key1]['part_name'] =$value1['topic_title'];
                       //      $detail[$key1]['type'] ='video';
                       //      if(!empty($value1['thumb_nail'])){
                       //          $detail[$key1]['thumbnail'] = base_url().'uploads/thumbnail/'.$value1['thumb_nail'];
                       //      }
                       //      else{
                       //          $detail[$key1]['thumbnail'] = "";
                       //      }
                       //    }
                       //    elseif($value1['type']==3){
                       //      $detail[$key1]['part_id'] =$value1['part_id'];
                       //      $detail[$key1]['part_name'] =$value1['topic_title'];
                       //      $detail[$key1]['type'] ='pdf';
                       //    }
                       //    elseif($value1['type']==2){
                       //      $detail[$key1]['part_id'] =$value1['part_id'];
                       //      $detail[$key1]['part_name'] =$value1['topic_title'];
                       //      $detail[$key1]['type'] ='presentaion';
                       //    }
                       //    elseif($value1['type']==4){
                       //      $part_det = $this->Api_student->get_exercise($value1['part_id']);
                       //      if(!empty($part_det)){
                       //          $detail[$key1]['part_id'] =$value1['part_id'];
                       //          $detail[$key1]['part_name'] =$value1['topic_title'];
                       //          $detail[$key1]['type'] ='question';
                       //      }
                       //    }
                       //    elseif($value1['type']==5){
                       //      $part_det = $this->Api_student->get_exercise($value1['part_id']);
                       //      if(!empty($part_det)){
                       //      $detail[$key1]['part_id'] =$value1['part_id'];
                       //      $detail[$key1]['part_name'] =$value1['topic_title'];
                       //      $detail[$key1]['type'] ='exercise';
                       //      }
                       //    }
                       //    elseif($value1['type'] == 6){
                            
                       //      //print_r($part_det);exit();
                           
                       //      $detail[$key1]['part_id'] = $value1['part_id'];
                       //      $detail[$key1]['part_name'] = $value1['topic_title'];
                       //      $detail[$key1]['type'] = 'image';
                       //      $detail[$key1]['image'] = base_url().'uploads/chapter/'.$value1['image'];
                            
                       //    }
                       //    // $cnt=$key1+1;
                       // }
                       //print_r($detail);
                       // if(!empty($detail)){
                       //  $presentation=array();
                       //  $video=array();
                       //  $pdf=array();
                       //  $exercise=array();
                       //  $question=array();
                       //  $image = array();
                       // foreach ($detail as  $value) {
                       //     if($value['type'] == 'video'){
                       //          $video[] = $value;
                       //     }
                       //     elseif($value['type'] == 'pdf'){
                       //          $pdf[] = $value;
                       //     }
                       //     elseif($value['type'] == 'presentaion'){
                       //          $presentation[]=$value;
                       //          //$data[$key]['presentaion'] = $value;
                       //     }
                       //     elseif($value['type'] == 'question'){
                       //          $question[] = $value;
                       //     }
                       //     elseif($value['type'] == 'exercise'){
                       //          $exercise[] = $value;
                       //     }
                       //     elseif($value['type'] == 'image'){
                       //          $image[] = $value;
                       //     }
                           
                           
                       // }
                       
                       // $data[$key]['presentaion'] =$presentation;
                       // $data[$key]['video'] =$video;
                       // $data[$key]['exercise'] =$exercise;
                       // $data[$key]['pdf'] =$pdf;
                       // $data[$key]['question'] =$question;
                       // $data[$key]['image'] = $image;
                       // }
                       // else{
                       //  $data[$key]['chapters'] =$detail;
                       // }
                       
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



    public function chapter_content_teacher_post(){


         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value = !empty($input['chapter_id']) ? $input['chapter_id'] : '';
        $chapter_id = $this->post('chapter_id') ? $this->post('chapter_id') : $value;

        $value = !empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value;

        $id = $this->security->xss_clean(trim($this->post('teacher_id'))); 
        
        if (!$this->post('teacher_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    $data2 = $this->Api_student->get_chapter_details_teacher($chapter_id,$id,$semester);
//print_r($data);exit();
               
                    

                    if(!empty($data2)){ 
                        $out = array('status'=>1,'message'=>'','data'=>$data2);
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






    public function publish_chapter_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['chapter_id']) ? $input['chapter_id'] : '';
        $chapter_id = $this->post('chapter_id') ? $this->post('chapter_id') : $value;

        $value =!empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value;

          ////////////////////// Additional 2021 athulya open////////////////////////////

        $value =!empty($input['publish_content']) ? $input['publish_content'] : '';
        $publish_content = $this->post('publish_content') ? $this->post('publish_content') : $value;

        // $value =!empty($input['publish_audio']) ? $input['publish_audio'] : '';
        // $publish_audio = $this->post('publish_audio') ? $this->post('publish_audio') : $value;
        ////////////////////// Additional 2021 athulya close////////////////////////////



        $id = $this->security->xss_clean(trim($this->post('teacher_id'))); 
        
        if (!$this->post('teacher_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                        $batch = $this->Api_student->get_semester_batch($semester);

                        $check = $this->Api_student->check_publish($id,$chapter_id,$batch);
                            if(!empty($check)){
                                $data = array(
                                    'publish_status' => 1,
                                    'updated_on' => time(),
                                    'updated_by' => $id
                                    );
                                $result = $this->Api_student->update_publish($data,$check['id']);
                            }
                            else{

                            $data = array(
                                    'teacher_id' => $id,
                                    'chapter_id' => $chapter_id,
                                    'batch_id' => $batch,
                                    'publish_status' => 1,
                                    'created_on' => time(),
                                    'updated_on' => time(),
                                    'updated_by' => $id
                                    );
                            $result = $this->Api_student->add_data($data,'chapter_publish');
                        }
                    if($result){ 

                         ////////////////////// Additional 2021 athulya open////////////////////////////

                        $subject = $this->Api_student->get_chapter_subject($chapter_id);
                        $subjectname = $this->Api_student->get_subject_data($subject);
                        $chap_details = $this->Api_student->get_chapter($chapter_id);
                        $chaptername = $chap_details['chapter_name'];
                        $chapterThumbnail = $chap_details['chapter_thumbnail'];
                        $batch = $this->Api_student->get_semester_batch($semester);
                      if(isset($_FILES['publish_audio']['name'])){
                        $file_name = $_FILES['publish_audio']['name'];
                        $file_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_name);
                        $ext = pathinfo($_FILES['publish_audio']['name'], PATHINFO_EXTENSION);
                        // change name
                        $imagename = $file_name . time() . "." . $ext;  
                        $target_file = './uploads/wall/'.$imagename;

                        if (move_uploaded_file($_FILES["publish_audio"]["tmp_name"], $target_file)) {

                        }}else{
                            $imagename ="";
                        }
                                $title = "A new chapter published";
                                $message = " A new chapter ".$chaptername." is published ";
                                 $teachern = $this->Api_student->getProfileDetails_teacher($id);
                                $teachername = $teachern['teacher_name'];
                                if(!$publish_content){
                                    $publish_content = '';
                                }
                                $datan = array(
                                        'batch_id' => $batch,
                                        'title'=> $title,
                                        'message' => $message, 
                                        'image' => $chapterThumbnail,
                                        'type'  => 'chapter',
                                        'chapter_name'  => $chaptername, 
                                        'chapter_id'  => $chapter_id,
                                        'subject_name'  => $subjectname,
                                        'subject_id'  => $subject,
                                        'type_id'  => '',
                                        'presentation_name'  => '',
                                        'submission_date'  => '0000-00-00',
                                        'publish_content'  => $publish_content,
                                        'publish_audio'  => $imagename,
                                        'created_user'  => $teachername,
                                        'created_by'  => $id,
                                        'created_at'  => date('Y-m-d H:i:s')
                                );
                                
                                $wall_id = $this->Api_student->add_data($datan,'wall_notifications');
                              
                                $out = array('status'=>1,'message'=>'Chapter pubished successfully ','data'=>new stdClass);
                                $this->Api_student->insert_log("APP - Chapter published id".$chapter_id,$id,'teacher' );
                        // }else{
                        //        $out = array('status'=>1,'message'=>'Chapter pubished successfully ','data'=>new stdClass);
                        //         $this->Api_student->insert_log("APP - Chapter published id".$chapter_id,$id,'teacher' );
                        // }
                    ////////////////////// Additional 2021 athulya close////////////////////////////


                        //  $subject = $this->Api_student->get_chapter_subject($chapter_id);
                        // $chap_details = $this->Api_student->get_chapter($chapter_id);
                        // $chaptername = $chap_details['chapter_name'];

                        // $students = $this->Api_student->get_course_students_subject($subject,$semester);

                        // $toks = array();
                        // foreach ($students as $value) {
                        //     $toks[] = $value['fcm'];
                        // }

                        // $tokens = implode(",", $toks);
                        //  $this->load->library('Fcm');
                        //     $title = "A new chapter published";
                        //     $message = " A new chapter ".$chaptername." is published ";
                        //     $var['title'] = $title;
                        //     $var['message'] = $message;
                        //     $var['image'] = "";
                        //     // base_url().'uploads/notifications/'.$upload_data['file_name'];
                        //     $data2['type'] = "student";
                        //     $data2['link'] = "";

                        //     $datan['user_type'] = 'student';
                        //     $datan['title'] = $title;
                        //     $datan['message'] = $message;
                        //     $datan['date'] = date('Y-m-d');
                        //     $datan['is_read'] = '0';
                        //     $datan['type'] = 'chapter_publish';
                        //     $datan['content_id'] = $chapter_id;
                        //     $datan['created_by'] = $id;
                        //     $datan['created_on'] = time();;

                                             
                        //     $nid = $this->Api_student->add_data($datan,'notifications');
                        //     foreach ($students as $value) {
                        //         $notificationdata['user_id'] = $value['id'];
                        //         $notificationdata['not_id'] = $nid;
                        //         $notificationdata['created_on'] = date('Y-m-d');
                        //         $not_id = $this->Api_student->add_data($notificationdata,'notifications_user');
                        //     }

                        //     $res1 = $this->fcm->send_bulk_push_message($tokens, $var, $data2);
                       //  $out = array('status'=>1,'message'=>'Chapter pubished successfully ','data'=>new stdClass);
                       //     $this->Api_student->insert_log("APP - Chapter published id".$chapter_id,$id,'teacher' );
                       // $this->M_log->insert_log("chapter_publish", "chapter published", $id);
                    }
                    else{
                       $out = array('status'=>0,'message'=>'Chapter publish failed','data'=>new stdClass);
                    } 
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);

    }






  public function publish_chapter_content_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['chapter_id']) ? $input['chapter_id'] : '';
        $chapter_id = $this->post('chapter_id') ? $this->post('chapter_id') : $value;


        $value =!empty($input['content_id']) ? $input['content_id'] : '';
        $content_id = $this->post('content_id') ? $this->post('content_id') : $value;

        $value =!empty($input['type']) ? $input['type'] : '';
        $type = $this->post('type') ? $this->post('type') : $value;
        
        $value =!empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value;

         ////////////////////// Additional 2021 athulya open////////////////////////////

        $value =!empty($input['publish_content']) ? $input['publish_content'] : '';
        $publish_content = $this->post('publish_content') ? $this->post('publish_content') : $value;

        // $value =!empty($input['publish_audio']) ? $input['publish_audio'] : '';
        // $publish_audio = $this->post('publish_audio') ? $this->post('publish_audio') : $value;
        ////////////////////// Additional 2021 athulya close////////////////////////////


        //        $value =!empty($input['content_id']) ? $input['type'] : '';
        // $type = $this->post('type') ? $this->post('type') : $value;


        $id = $this->security->xss_clean(trim($this->post('teacher_id'))); 
        
        if (!$this->post('teacher_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{

                        $type = $this->Api_student->get_contentid_type($content_id);
                        if($type == 2){
                            $subject = $this->Api_student->get_chapter_subject($chapter_id);
                            $utypecontent = $this->Api_student->get_content_type($content_id);
                            $type_id = $utypecontent['type_id'];
                    $user_topic_id = $this->Api_student->get_user_topic($type_id,$id,$semester,$subject);
            
                    if($user_topic_id == 0 || $user_topic_id == "" ){
                        $this->clone_presentation($type_id,$id,$semester,$subject);
                    }
                }

  $batch = $this->Api_student->get_semester_batch($semester);
                        $count_check = $this->Api_student->checkPublish($content_id,$id,$batch);
                        // $count_check = $this->Api_student->checkPublish($content_id,$id);
                        
                if($count_check == 0){
                    $data = array(
                        'teacher_id'=>$id,
                        'chapter_id'=>$chapter_id,
                        'chapter_content_id'=>$content_id,
                        'batch_id'=>$batch,

                        'publish_status'=>1,
                        'created_on'=>time(),
                        'updated_on'=>time(),
                        'updated_by'=>$id
                    );


                    // $out = $this->PresentationModel->add_data($data,'presentation_topic');
                    // echo json_encode($out);
                    if($this->Api_student->add_data($data,'chapter_content_publish')){






                         ////////////////////// Additional 2021 athulya open////////////////////////////
                            $subject = $this->Api_student->get_chapter_subject($chapter_id);
                            $subjectname = $this->Api_student->get_subject_data($subject);
                            $chap_details = $this->Api_student->get_chapter($chapter_id);
                            $chaptername = $chap_details['chapter_name'];
                            $chapterThumbnail = $chap_details['chapter_thumbnail'];
                            $batch = $this->Api_student->get_semester_batch($semester);
                            $pname='';
$typ = '';

                            if($type =='1'){
                                //vedio
                                $typ='vedio';
                            }
                            else if($type =='2'){
                                //presentation
                                $typ='presentation';
                            }
                            else if($type =='3'){
                                //pdf
                                $typ='pdf';
                            } else if($type =='4'){
                                //question
                                $typ='question';
                            } else if($type =='5'){
                                //exercise
                                $typ='exercise';
                            }
                            else if($type =='6'){
                                //image
                                $typ='image';
                            }
if(isset($_FILES['publish_audio']['name'])){
                            $file_name = $_FILES['publish_audio']['name'];
                            $file_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_name);
                            $ext = pathinfo($_FILES['publish_audio']['name'], PATHINFO_EXTENSION);
                            // change name
                            $imagename = $file_name . time() .$slide_id. "." . $ext;  
                            $target_file = './uploads/wall/'.$imagename;

                            if (move_uploaded_file($_FILES["publish_audio"]["tmp_name"], $target_file)) {
$imagename = $imagename;
                            }}else{
                                $imagename = "";
                            }
                                    $title = "A new chapter content published";
                                    $message = " A new ".$typ." published in chapter ".$chaptername;
                                    $teachern = $this->Api_student->getProfileDetails_teacher($id);
                                    $teachername = $teachern['teacher_name'];
                                    $datan = array(
                                            'batch_id' => $batch,
                                            'title'=> $title,
                                            'message' => $message, 
                                            'image' => $chapterThumbnail,
                                            'type'  => 'content',
                                            'content_type'  => $typ,
                                            'chapter_name'  => $chaptername, 
                                            'chapter_id'  => $chapter_id,
                                            'subject_name'  => $subjectname,
                                            'subject_id'  => $subject,
                                            'type_id'  => $content_id,
                                            'presentation_name'  => $pname,
                                            'submission_date'  => '0000-00-00',
                                            'publish_content'  => $publish_content,
                                            'publish_audio'  => $imagename,
                                            'created_user'  => $teachername,
                                            'created_by'  => $id,
                                            'created_at'  => date('Y-m-d H:i:s')
                                    );
                                    $wall_id = $this->Api_student->add_data($datan,'wall_notifications');
                                   
                                    $out = array('status'=>1,'message'=>'Chapter content pubished successfully ','data'=>new stdClass);
                                    $this->Api_student->insert_log("APP - Chapter content published content id - ".$content_id.", chapter id".$chapter_id,$id,'teacher' );


                       
                            // }else{
                            //         $error_msg = $this->upload->display_errors();
                            //         // audio uploaded error
                            //         $out = array('status'=>0,'message'=>$error_msg,'data'=>new stdClass);
                            // }
                    ////////////////////// Additional 2021 athulya close////////////////////////////














                        // $subject = $this->Api_student->get_chapter_subject($chapter_id);
                        // $chap_details = $this->Api_student->get_chapter($chapter_id);
                        // $chaptername = $chap_details['chapter_name'];

                        // $students = $this->Api_student->get_course_students_subject($subject,$semester);

                        // $toks = array();
                        // foreach ($students as $value) {
                        //     $toks[] = $value['fcm'];
                        // }
                        
                        // $tokens = implode(",", $toks);
                        //  $this->load->library('Fcm');
                        //     $title = "A new chapter content published";
                        //     $message = " A new ".$type." published in chapter ".$chaptername;
                        //     $var['title'] = $title;
                        //     $var['message'] = $message;
                        //     $var['image'] = "";
                        //     // base_url().'uploads/notifications/'.$upload_data['file_name'];
                        //     $data2['type'] = "student";
                        //     $data2['link'] = "";

                        //     $datan['user_type'] = 'student';
                        //     $datan['title'] = $title;
                        //     $datan['message'] = $message;
                        //     $datan['date'] = date('Y-m-d');
                        //     $datan['is_read'] = '0';
                        //     $datan['type'] = 'content_publish';
                        //     $datan['content_id'] = $chapter_id;
                        //     $datan['created_by'] = $id;
                        //     $datan['created_on'] = time();;

                                             
                        //     $nid = $this->Api_student->add_data($datan,'notifications');
                        //     foreach ($students as $value) {
                        //         $notificationdata['user_id'] = $value['id'];
                        //         $notificationdata['not_id'] = $nid;
                        //         $notificationdata['created_on'] = date('Y-m-d');
                        //         $not_id = $this->Api_student->add_data($notificationdata,'notifications_user');
                        //     }

                        //     $res1 = $this->fcm->send_bulk_push_message($tokens, $var, $data2);

            //             //$this->session->set_flashdata('presentation_created',1);
            // $out = array('status'=>1,'message'=>'Chapter content pubished successfully ','data'=>new stdClass);
            //    $this->Api_student->insert_log("APP - Chapter content published content id - ".$content_id.", chapter id".$chapter_id,$id,'teacher' );


                    }else{
                       $out = array('status'=>0,'message'=>'Chapter content publish failed','data'=>new stdClass);

                    }
                }else{
                    $out = array('status'=>0,'message'=>'Chapter publish failed','data'=>new stdClass);

                        //$this->session->set_flashdata('presentation_created',2);
                }

                        //  $check = $this->TeacherModel->check_publish($id,$chapter);
                        //     if(!empty($check)){
                        //         $data = array(
                        //             'publish_status' => 1,
                        //             'updated_on' => time(),
                        //             'updated_by' => $id
                        //             );
                        //         $result = $this->TeacherModel->update_publish($data,$check['id']);
                        //     }
                        //     else{
                        //     $data = array(
                        //             'teacher_id' => $teacher,
                        //             'chapter_id' => $chapter_id,
                        //             'publish_status' => 1,
                        //             'created_on' => time(),
                        //             'updated_on' => time(),
                        //             'updated_by' => $id
                        //             );
                        //     $result = $this->TeacherModel->add_data($data,'chapter_publish');
                        // }
                   
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);

    }



    public function clone_presentation($id,$uid,$semester,$subject){
         // $id = $this->input->post('id');
         // $tid = $this->input->post('tid');
                $this->load->model('PresentationModel');
                $this->load->model('TeacherModel');


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
                    // 'display_parent'=>$topic_data['display_parent'],
                    'user_id'=>$uid,
                    'updated_at'=>time(),
                    'updated_by'=>$uid
                );
                $tid = $this->Api_student->add_data($data,'presentation_topic');
                if($tid){
                    // print_r($tid);
                    $parent_images = $this->Api_student->get_topic_images($id);
                        foreach ($parent_images as $ikey => $ivalue) {
                            $idata = array(
                                        'image_topic_id' =>$tid ,
                                        'image' =>$ivalue['image'] ,
                                        'image_height' =>$ivalue['image_height'] , 
                                        'image_width' =>$ivalue['image_width'] , 
                                        'image_position_left' =>$ivalue['image_position_left'] , 
                                        'image_position_top' =>$ivalue['image_position_top'] ,
                                        'created_at' =>date("Y-m-d") ,
                                        'created_by' =>$uid 
                            );

                            $this->Api_student->add_data($idata,'presentation_topic_images');
                            
                        }

                      $cloned_data  = array(
                                        'presentation_id' =>$topic_data['topic_presentation_id'] ,
                                        'topic_id' =>$id , 
                                        'cloned_id' =>$tid , 
                                        'teacher_id' =>$uid , 
                                        'semester' =>$semester , 
                                        'subject' =>$subject , 
                                        'date'=> date("Y-m-d H:i:s")
                        );
                        $this->Api_student->add_data($cloned_data,'cloned_presentations');
                        

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
    $this->load->model('TeacherModel');
    $this->load->model('PresentationModel');

    // echo $tid;
    // print_r($id);
    // die();
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
                    // 'display_parent'=>$value['display_parent'],
                    'topic_position_top'=>$value['topic_position_top'],
                    'topic_content_position_left'=>$value['topic_content_position_left'],
                    'topic_content_position_top'=>$value['topic_content_position_top'],
                    'topic_width'=>$value['topic_width'],
                    'topic_height'=>$value['topic_height'],
                    'updated_at'=>time(),
                    'updated_by'=>0
                );
                $tpid = $this->Api_student->add_data($data,'presentation_topic');
                $topic_data = $this->TeacherModel->get_topic($value['topic_id']);

                $topic_id_or = $value['topic_id'];

                $parent_images = $this->Api_student->get_topic_images($topic_id_or);
                        foreach ($parent_images as $ikey => $ivalue) {
                            $idata = array(
                                        'image_topic_id' =>$tpid ,
                                        'image' =>$ivalue['image'] ,
                                        'image_height' =>$ivalue['image_height'] , 
                                        'image_width' =>$ivalue['image_width'] , 
                                        'image_position_left' =>$ivalue['image_position_left'] , 
                                        'image_position_top' =>$ivalue['image_position_top'] ,
                                        'created_at' =>date("Y-m-d") ,
                                        'created_by' =>0 
                            );

                            $this->Api_student->add_data($idata,'presentation_topic_images');
                            
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


    public function notification_teacher_post(){

		$this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $id = $this->security->xss_clean(trim($this->post('teacher_id')));

      
        
        if (!$this->post('teacher_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    $data = $this->Api_student->get_notifications_teacher($id);
                    
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
            $out = array('status'=>0,'message'=>'teacher id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);




        }






 public function notification_read_post(){
       

        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;
        $value = !empty($input['notification_id']) ? $input['notification_id'] : '';
        $notification_id = $this->post('notification_id') ? $this->post('notification_id') : $value;
        $id = $this->security->xss_clean(trim($this->post('id')));

        if (!$this->post('id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                 $c =0;
                $check = $this->Api_student->check_session($id,$session);
                // print_r($check);
                if($check['status']== 0){
                    $check = $this->Api_student->check_session_teacher($id,$session);
                    if($check['status']== 0){

                        $out = array('status'=>3,'message'=>'Invalid data.');
                    }else{
                        $c =1;
                    }
                }else{
                    $c=1;
                }

                if($c== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    $data = array(
                            'is_read'=>1,
                            'updated_on'=>date('Y-m-d')
                    );
                    $where = array(
                        'not_id'=>$notification_id,
                        'user_id'=>$id
                    );
                    $questions = $this->Api_student->update_notification($where,$data);
                    if($questions){ 
                        $out = array('status'=>1,'message'=>'Notification read  successfully ','data'=>new stdClass);
                           $this->Api_student->insert_log("APP - Notification read".$notification_id,$id,'teacher' );
                        // $this->M_log->insert_log("question_added", "student question added", $id);
                    }
                    else{
                       $out = array('status'=>0,'message'=>'Notification read failed','data'=>new stdClass);
                    } 
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);

    }



    public function notification_student_post(){


        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $id = $this->security->xss_clean(trim($this->post('id')));

      
        
        if (!$this->post('teacher_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){
                $check = $this->Api_student->check_session($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    $data = $this->Api_student->get_notifications_student($id);
                  
                    
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
            $out = array('status'=>0,'message'=>'Student id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);




        }




    ////////////////


    public function remove_slide_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['slide_id']) ? $input['slide_id'] : '';
        $slide = $this->post('slide_id') ? $this->post('slide_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('id'))); 
        
        if (!$this->post('id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    $data = array(
                            'topic_status'=>0,
                            'updated_at'=>time()
                    );
                    // $this->load->model('M_log');

                    $questions = $this->Api_student->update_topic($slide,$data);
                    if($questions){ 
                        $out = array('status'=>1,'message'=>'Slide deleted successfully ','data'=>new stdClass);
                           $this->Api_student->insert_log("APP - Slide Removed id".$slide,$id,'teacher' );
                        // $this->M_log->insert_log("question_added", "student question added", $id);
                    }
                    else{
                       $out = array('status'=>0,'message'=>'Slide delete failed','data'=>new stdClass);
                    } 
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);

    }



    public function questionnaire_list_teacher_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['slide_id']) ? $input['slide_id'] : '';
        $slide = $this->post('slide_id') ? $this->post('slide_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('id'))); 
        
        if (!$this->post('id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                    $questions = $this->Api_student->get_topic_questions($slide);
                    if(!empty($questions)){ 
                        $out = array('status'=>1,'message'=>'','data'=>$questions);
                    }
                    else{
                        $out = array('status'=>0,'message'=>'There is no data','data'=>new stdClass);
                    } 
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);

    }

    public function qanda_question_teacher_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['slide_id']) ? $input['slide_id'] : '';
        $slide = $this->post('slide_id') ? $this->post('slide_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('id'))); 
        
        if (!$this->post('id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                    $questions = $this->Api_student->get_topic_qanda_questions($slide,$id,'teacher');
                    if(!empty($questions)){ 
                        $out = array('status'=>1,'message'=>'','data'=>$questions);
                    }
                    else{
                        $out = array('status'=>0,'message'=>'There is no data','data'=>new stdClass);
                    } 
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);

    }


     public function qanda_answer_teacher_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['slide_id']) ? $input['slide_id'] : '';
        $slide = $this->post('slide_id') ? $this->post('slide_id') : $value;

        $value =!empty($input['question_id']) ? $input['question_id'] : '';
        $question_id = $this->post('question_id') ? $this->post('question_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('id'))); 
        
        if (!$this->post('id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                    $answers = $this->Api_student->get_topic_qanda_answer($slide,$question_id);
                    if(!empty($answers)){ 
                        $out = array('status'=>1,'message'=>'','data'=>$answers);
                    }
                    else{
                        $out = array('status'=>0,'message'=>'There is no data','data'=>new stdClass);
                    } 
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);

    }

    public function add_qanda_question_teacher_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['slide_id']) ? $input['slide_id'] : '';
        $slide = $this->post('slide_id') ? $this->post('slide_id') : $value;

        $value =!empty($input['question_id']) ? $input['question_id'] : '';
        $question_id = $this->post('question_id') ? $this->post('question_id') : $value;
        
        $value =!empty($input['question']) ? $input['question'] : '';
        $question = $this->post('question') ? $this->post('question') : $value;
       
        $value =!empty($input['type']) ? $input['type'] : '';
        $type = $this->post('type') ? $this->post('type') : $value;

        $value =!empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value;

        $value =!empty($input['subject']) ? $input['subject'] : '';
        $subject = $this->post('subject') ? $this->post('subject') : $value;

        $id = $this->security->xss_clean(trim($this->post('id'))); 
        
        if (!$this->post('id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $type){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                        $data = array();
                        if($type == 'audio'){


                           	$file_name = $_FILES['question']['name'];
		                    $file_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_name);
		                    $ext = pathinfo($_FILES['question']['name'], PATHINFO_EXTENSION);
							// change name
							$imagename = $file_name . time() .$slide. "." . $ext;  
		                    $target_file = './uploads/qanda/'.$imagename;

                             if (move_uploaded_file($_FILES["question"]["tmp_name"], $target_file)) {
                                $data['audio'] = $imagename;

                             }else{
                                 $error_msg = $this->upload->display_errors();
                                // audio uploaded error
                                $out = array('status'=>0,'message'=>$error_msg,'data'=>new stdClass);
                             }

                            // $config['upload_path']          = './uploads/qanda/';
                            // $config['allowed_types']        = 'mp3|wav';
                            // $config['max_size']             = 5*1024;
                            // $new_name = time();
                            // $config['file_name'] = $new_name;
                            // $this->load->library('upload', $config);

                            // if ( ! $this->upload->do_upload('question'))
                            // {
                            //     $error_msg = $this->upload->display_errors();
                            //     // audio uploaded error
                            //     $out = array('status'=>0,'message'=>$error_msg,'data'=>new stdClass);
                            // }
                            // else{
                            //     $upload_data = $this->upload->data();
                            //     $data['audio'] = $upload_data['file_name'];
                            // }
                        }else if($type == 'text'){
                            $data['text'] = $question;
                        }else if($type == 'image'){
                            $config['upload_path']          = './uploads/qanda/';
                            $config['allowed_types']        = 'jpg|png|jpeg';
                            $config['max_size']             = 5*1024;
                            // $config['max_width']            = 745;
                            // $config['max_height']           = 278;
                            // $config['min_width']            = 740;
                            // $config['min_height']           = 270;
                            $new_name = "teacher".time();
                            $config['file_name'] = $new_name;
                            $this->load->library('upload', $config);

                            if ( ! $this->upload->do_upload('question'))
                            {
                                $error_msg = $this->upload->display_errors();
                                // audio uploaded error
                                $out = array('status'=>0,'message'=>$error_msg,'data'=>new stdClass);
                            }
                            else{
                                $upload_data = $this->upload->data();
                                $data['image'] = $upload_data['file_name'];
                            }
                        }
                       
                    if($question_id){
                        $data['qanda_question_id'] = $question_id;
                        $data['user_id'] = $id;
                        $data['user_type'] = 1;
                        $data['created_at'] = date("Y-m-d H:i:s");
                        
                        $pid = $this->Api_student->add_data($data,'presentation_qanda_answers');
                        if($slide == ""){
                            $slide = $this->Api_student->getslide_id($question_id);
                        }
                        $conid = $question_id;
                       

                    }
                    // else{
                    //     $data['student_id'] = $id;
                    //     $data['topic_id'] = $slide;
                    //     $data['created_at'] = date("Y-m-d H:i:s");  
                    //     $pid = $this->Api_student->add_data($data,'presentation_qanda_questions');
                    //     $conid = $pid;
                    // }


                    // $this->load->model('M_log');
                
                    if($pid){ 


                         // $sub = $this->Api_student->get_presentationsubject($slide);
                         //    $subject = $sub['data_id'];
                           
                            $presentation_name = $this->Api_student->get_topic_main_parent_name($slide);
                           

                      

                        // $students = $this->Api_student->get_course_students_subject($subject,$semester);

                        // $toks = array();
                        // foreach ($students as $value) {
                        //     $toks[] = $value['fcm'];
                        // }
                        $stdid= $this->Api_student->getquestion_student_id($question_id);
                        $student_v = $this->Api_student->get_student_by_id($stdid);
                        $token  = $student_v['fcm'];
                        $subname = $this->Api_student->get_subject_data($subject);
// print_r($token);
                        // $tokens = implode(",", $toks);
                         $this->load->library('Fcm');
                            $title = "Teacher answered to a question in ".$subname;
                            $message = " Teacher answered to a question in presentation  ".$presentation_name;
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
                            $datan['type'] = 'question_reply';
                            $datan['content_id'] = $question_id;
                            $datan['created_by'] = $id;
                            $datan['created_on'] = time();

                                             
                            $nid = $this->Api_student->add_data($datan,'notifications');

// print_r($students);
                            // foreach ($students as $value) {
                                $notificationdata['user_id'] = $stdid;
                                $notificationdata['not_id'] = $nid;
                                $notificationdata['created_on'] = date('Y-m-d');
                                $not_id = $this->Api_student->add_data($notificationdata,'notifications_user');
                            // }
                        
                            $res1 = $this->fcm->send_push_message($token, $var, $data2);

                            // print_r($res1);

                            // $res1 = $this->fcm->send_bulk_push_message($tokens, $var, $data2);
                        $out = array('status'=>1,'message'=>'Question Added','data'=>$conid);
                           $this->Api_student->insert_log("APP - Q and A Question Added id".$conid,$id,'teacher' );
                        // $this->M_log->insert_log("question_added", "Teacher added answer", $id);
                    }
                    else{
                        $out = array('status'=>0,'message'=>'There is no data','data'=>new stdClass);
                    } 
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }   
            // elseif(!$question){
         
            // $null = new stdClass;
            // $out = array('status'=>0,'message'=>'Question field is mandatory','data'=>$null);
            // }
            elseif(!$type){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Type field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }

    public function remove_questionaire_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['topic_id']) ? $input['topic_id'] : '';
        $slide = $this->post('topic_id') ? $this->post('topic_id') : $value;

        $value =!empty($input['question_id']) ? $input['question_id'] : '';
        $question = $this->post('question_id') ? $this->post('question_id') : $value;


        $id = $this->security->xss_clean(trim($this->post('id'))); 
        
        if (!$this->post('id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    $data = array(
                            'status'=>0,
                            'updated_at'=>time()
                    );
                    $questions = $this->Api_student->update_questionaire($question,$data);
                    // $this->load->model('M_log');

                    if($questions){ 
                        $out = array('status'=>1,'message'=>'Question deleted successfully ','data'=>new stdClass);
                           $this->Api_student->insert_log("APP - Questionnaire removed".$question,$id,'teacher' );
                        // $this->M_log->insert_log("question_added", "student question added", $id);
                    }
                    else{
                        $out = array('status'=>0,'message'=>'Question delete failed','data'=>new stdClass);
                    } 
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);

    }

    public function remove_qanda_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['slide_id']) ? $input['slide_id'] : '';
        $slide = $this->post('slide_id') ? $this->post('slide_id') : $value;

        $value =!empty($input['question_id']) ? $input['question_id'] : '';
        $question = $this->post('question_id') ? $this->post('question_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('id'))); 
        
        if (!$this->post('id') && json_last_error() != 0) {
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    $data = array(
                            'qanda_status'=>0,
                            'created_at'=>time()
                    );
                    $data2 = array(
                            'status'=>0,
                            'created_at'=>time()
                    );
                    $questions = $this->Api_student->update_qanda($question,$data,$data2);
                    // $this->load->model('M_log');

                    if($questions){ 
                        $out = array('status'=>1,'message'=>'Q and A deleted successfully ','data'=>new stdClass);
                           $this->Api_student->insert_log("APP - Q and A Removed for question".$question,$id,'teacher' );
                        // $this->M_log->insert_log("question_added", "student question added", $id);
                    }
                    else{
                       $out = array('status'=>0,'message'=>'Q and A delete failed','data'=>new stdClass);
                    } 
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);

    }



public function add_audio_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['slide_id']) ? $input['slide_id'] : '';
        $slide_id = $this->post('slide_id') ? $this->post('slide_id') : $value;

        $value =!empty($input['audio']) ? $input['audio'] : '';
        $audio = $this->post('audio') ? $this->post('audio') : $value;

        $value =!empty($input['title']) ? $input['title'] : '';
        $title = $this->post('title') ? $this->post('title') : $value;

          $value =!empty($input['type']) ? $input['type'] : '';
        $type = $this->post('type') ? $this->post('type') : $value;

        $id = $this->security->xss_clean(trim($this->post('id'))); 
        
        if (!$this->post('id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{    


                    // $pub = $this->Api_student->check_audio_publish($slide_id,$id);
                    // if($pub!=0){

                    $file_name = $_FILES['audio']['name'];
                    $file_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_name);
                    $ext = pathinfo($_FILES['audio']['name'], PATHINFO_EXTENSION);
					// change name
					$imagename = $file_name . time() .$slide_id. "." . $ext;  
                    $target_file = './uploads/audio/'.$imagename;
                         if (move_uploaded_file($_FILES["audio"]["tmp_name"], $target_file)) {
                            if($type ==0){
                                $data = array(
                                    'audio' => $imagename,
                                    'title' => $title,
                                    'usertype' => 'teacher',
                                    'user_id' => $id,
                                    'created_on' => date('Y-m-d H:i:s'),
                                    'audio_topic_id' => $slide_id,
                                    'updated_by' => $id
                                );
                           
                                $pid = $this->Api_student->add_data($data,'presentation_audio');
                                 if($pid){ 
                                    $out = array('status'=>1,'message'=>'Audio added successfully ','data'=>new stdClass);
                                       $this->Api_student->insert_log("APP - Presentation Audio Added id".$pid,$id,'teacher' );
                                    // $this->M_log->insert_log("question_added", "student question added", $id);
                                }
                                else{
                                   $out = array('status'=>0,'message'=>'Audio added failed','data'=>new stdClass);
                                } 
                            }else{

                                $data = array(
                                    'audio' => $imagename,
                                    'title' => $title,
                                    'usertype' => 'teacher',
                                    'user_id' => $id,
                                    'created_on' => date('Y-m-d H:i:s'),
                                    'audio_practice_id' => $slide_id,
                                    'updated_by' => $id
                                );
                           
                                $pid = $this->Api_student->add_data($data,'practice_audio');
                                 if($pid){ 
                                    $out = array('status'=>1,'message'=>'Audio added successfully ','data'=>new stdClass);
                                       $this->Api_student->insert_log("APP - practice Audio Added id".$pid,$id,'teacher' );
                                    // $this->M_log->insert_log("question_added", "student question added", $id);
                                }
                                else{
                                   $out = array('status'=>0,'message'=>'Audio added failed','data'=>new stdClass);
                                } 

                            }
                                
   
  } else {
    // $error_msg = $this->upload->display_errors();
                                // audio uploaded error
                                $out = array('status'=>0,'message'=>'uploaded error','data'=>new stdClass);
    
  }
                   
                       


                    
// }else{

//  $out = array('status'=>0,'message'=>'Audio added failed, content not published','data'=>new stdClass);
// }// checking published
                    
                    
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);

    }




    public function remove_audio_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['audio_id']) ? $input['audio_id'] : '';
        $audio = $this->post('audio_id') ? $this->post('audio_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('id'))); 
        
        if (!$this->post('id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    $data = array(
                            'audio_status'=>0,
                            'updated_on'=>time()
                    );
                    // $this->load->model('M_log');

                    $questions = $this->Api_student->update_audio($audio,$data);
                    if($questions){ 
                        $out = array('status'=>1,'message'=>'Audio deleted successfully ','data'=>new stdClass);
                           $this->Api_student->insert_log("APP - Presentation Audio Deleted id".$audio,$id,'teacher' );
                        // $this->M_log->insert_log("question_added", "student question added", $id);
                    }
                    else{
                       $out = array('status'=>0,'message'=>'Audio delete failed','data'=>new stdClass);
                    } 
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);

    }

 function home_teacher_post(){

        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $id = $this->security->xss_clean(trim($this->post('userid')));

        $value = !empty($input['fcm']) ? $input['fcm'] : '';
        $fcm = $this->post('fcm') ? $this->post('fcm') : $value; 
        
        if (!$this->post('userid') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    $session = array();
                    if($fcm){
                        $session['fcm'] = $fcm;
                        $this->Api_student->update_teacher_details($session,$id);
                    }
                            // $updte_where['id'] = $login['id'];
                    
                    $profile = $this->Api_student->getProfileDetails_teacher($id);
                    // $student = $this->Api_student->get_student_by_id($id);
                  
                    $subjects = $this->Api_student->teacherSubjects($id);
                    $chapters = $this->Api_student->teacherBatch($id);
                    foreach ($subjects as $key => $value) {
                        $subjects[$key]['paper_icon'] = base_url().'uploads/paper_icon/'.$value['paper_icon'];
                    }

                    $data = array();
                    $data['school_name'] = $profile['institute_name'];
                    $data['school_name_last '] = $profile['abbreviation'];


                     $news = $this->Api_student->get_news($profile['institute_id']);

                    $events = $this->Api_student->get_events($profile['institute_id']);

                   
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
                    // $data['banner '] = $profile['abbreviation'];

                      



                    $count = 0;

                    $profiles = array();
                    $profiles['name'] = $profile['teacher_name'];
                    $profiles['email'] = $profile['teacher_email'];
                    $profiles['phone'] = $profile['teacher_phone'];
                    $data['profile'] = $profiles;

                    $data['batch'] = $chapters;
                    $data['paper'] = $subjects;
                    $data['events'] = $events;
                    $data['news'] = $news;
                    $data['notification_count'] = $this->Api_student->get_notifications_teacher_count($id);
                  
                    ////////////02-01-2021/////////////////////
                    $data['favourite'] = $this->Api_student->get_favourite_subject($id);

                    $fvsubjects = $this->Api_student->get_favourite_subject($id);
                     
                    if(empty($fvsubjects)){

                        $fvsubjects = $this->Api_student->get_current_subject_teachers($id);
                        // if($id == '35'){
                            // print_r($fvsubjects);
                            $data['favourite'] =$fvsubjects;
                        // }
                    }
                    
                   
                    if(!empty($data)){ 
                        $out = array('status'=>1,'message'=>'','data'=>$data);
                    }
                    else{
                        $out = array('status'=>0,'message'=>'There is no consultant','data'=>new stdClass);
                    }

//////////////////////////close Athulya/////////////////////////////////



                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);
    }












 function home_teacher2_post(){

        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $id = $this->security->xss_clean(trim($this->post('userid')));

        $value = !empty($input['fcm']) ? $input['fcm'] : '';
        $fcm = $this->post('fcm') ? $this->post('fcm') : $value; 
        
        if (!$this->post('userid') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    $session = array();
                    if($fcm){
                        $session['fcm'] = $fcm;
                        $this->Api_student->update_teacher_details($session,$id);
                    }
                            // $updte_where['id'] = $login['id'];
                    
                    $profile = $this->Api_student->getProfileDetails_teacher($id);
                    // $student = $this->Api_student->get_student_by_id($id);
                  
                    $subjects = $this->Api_student->teacherSubjects($id);
                    $chapters = $this->Api_student->teacherBatch($id);
                    foreach ($subjects as $key => $value) {
                        $subjects[$key]['paper_icon'] = base_url().'uploads/paper_icon/'.$value['paper_icon'];
                    }

                    $data = array();
                    $data['school_name'] = $profile['institute_name'];
                    $data['school_name_last '] = $profile['abbreviation'];


                     $news = $this->Api_student->get_news($profile['institute_id']);

                    $events = $this->Api_student->get_events($profile['institute_id']);

                   
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
                    // $data['banner '] = $profile['abbreviation'];

                      



                    $count = 0;

                    $profiles = array();
                    $profiles['name'] = $profile['teacher_name'];
                    $profiles['email'] = $profile['teacher_email'];
                    $profiles['phone'] = $profile['teacher_phone'];
                    $data['profile'] = $profiles;

                    $data['batch'] = $chapters;
                    $data['paper'] = $subjects;
                    $data['events'] = $events;
                    $data['news'] = $news;
                    $data['notification_count'] = $this->Api_student->get_notifications_teacher_count($id);
                  
                    ////////////02-01-2021/////////////////////
                    $data['favourite'] = $this->Api_student->get_favourite_subject2($id);

                     $fvsubjects = $this->Api_student->get_favourite_subject2($id);
                     
                    if(empty($fvsubjects)){

                        $fvsubjects = $this->Api_student->get_current_subject_teachers($id);
                        // if($id == '35'){
                            // print_r($fvsubjects);
                            $data['favourite'] =$fvsubjects;
                        // }
                    }
                    
                   
                    if(!empty($data)){ 
                        $out = array('status'=>1,'message'=>'','data'=>$data);
                    }
                    else{
                        $out = array('status'=>0,'message'=>'There is no consultant','data'=>new stdClass);
                    }

//////////////////////////close Athulya/////////////////////////////////



                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);
    }

////////////////////////////////// Athulya Close////////////////////////////////


 function keywords_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        // $value = !empty($input['session']) ? $input['session'] : '';
        // $session = $this->post('session') ? $this->post('session') : $value;

        $value = !empty($input['key']) ? $input['key'] : '';
        $keyword = $this->post('key') ? $this->post('key') : $value;

        // $value = !empty($input['page']) ? $input['page'] : '';
        // $page = $this->post('page') ? $this->post('page') : $value;

        // $id = $this->security->xss_clean(trim($this->post('userid'))); 
        
        if (!$this->post('key') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            // $check = $this->Api_student->check_session($id,$session);
            // if($check['status']== 0){
            //     $out = array('status'=>3,'message'=>'Session does not match.');
            // }
            // else{
              
                $keys = array();
                // $images = $this->Api_student->get_search_image($keyword);

                // foreach ($images as $key => $value) {
                   
                //     $keys[] = $value['image_title'];
                // }
                
                
                $topics = $this->Api_student->get_keywords_topics($keyword);
                foreach ($topics as $key => $value) {
                     // $keys[] = $value['topic_title'];
                     $keys[] = $value['topic_tags'];

                }
               
                if(!empty($keys)){ 
                    $out = array('status'=>1,'message'=>'','data'=>$keys);
                }
                else{
                    $out = array('status'=>0,'message'=>'There is no data','data'=>new stdClass);
                }

            // }
        }
        $this->response($out);
    }




// public function add_audio_practice_post(){
//          $this->benchmark->mark('start');
//         $json = file_get_contents('php://input');
//         $input = json_decode($json,true);

//         $value = !empty($input['session']) ? $input['session'] : '';
//         $session = $this->post('session') ? $this->post('session') : $value;

//         $value =!empty($input['practice_id']) ? $input['practice_id'] : '';
//         $slide = $this->post('practice_id') ? $this->post('practice_id') : $value;

//         // $value =!empty($input['practice_audio']) ? $input['practice_audio'] : '';
//         // $audio = $this->post('practice_audio') ? $this->post('practice_audio') : $value;

//         $value =!empty($input['title']) ? $input['title'] : '';
//         $title = $this->post('title') ? $this->post('title') : $value;

//         $id = $this->security->xss_clean(trim($this->post('id'))); 
        
//         if (!$this->post('id') && json_last_error() != 0) {
     
//             $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
//         }
//         else{
//             if($id){
//                 $check = $this->Api_student->check_session_teacher($id,$session);
//                 if($check['status']== 0){
//                     $out = array('status'=>3,'message'=>'Session does not match.');
//                 }else{    
                   
//                     $_FILES['md']['name'] = $_FILES['audio']['name'];
//                     $_FILES['md']['type'] = $_FILES['audio']['type'];
//                     $_FILES['md']['tmp_name'] = $_FILES['audio']['tmp_name'];
//                     $_FILES['md']['error'] = $_FILES['audio']['error'];
//                     $_FILES['md']['size'] = $_FILES['audio']['size'];

                  

//                     $img_ext = explode('.', $_FILES['md']['name']);
//                     $img_upl_name = 'Audio'.'_'.time().'.'.end($img_ext);
//                    $target_file = './uploads/practiceaudio/'.$img_upl_name;
                        
//                            if (!move_uploaded_file($_FILES['md']['name'], $target_file)) {
//                                 $error_msg = $this->upload->display_errors();
//                                 // audio uploaded error
//                                 $out = array('status'=>0,'message'=>"upload error",'data'=>new stdClass);
//                             }
//                             else{
//                                 $uploadData = $this->upload->data();
//                         $filename = $uploadData['file_name'];
//                                 // $data['audio'] = $upload_data['file_name'];
                            
//                                 $data = array(
//                                     'audio' => $filename,
//                                     'title' => $title,
//                                     'usertype' => 'teacher',
//                                     'user_id' => $id,
//                                     'created_on' => date('Y-m-d H:i:s'),
//                                     'audio_practice_id' => $slide,
//                                     'updated_by' => $id
//                                 );
                           
//                                 $pid = $this->Api_student->add_data($data,'practice_audio');
//                                  if($pid){ 
//                                     $out = array('status'=>1,'message'=>'Audio added successfully ','data'=>new stdClass);
//                                        $this->Api_student->insert_log("APP - Practice Audio Added id".$pid,$id,'teacher' );
//                                     // $this->M_log->insert_log("question_added", "student question added", $id);
//                                 }
//                                 else{
//                                    $out = array('status'=>0,'message'=>'Audio added failed','data'=>new stdClass);
//                                 }  
   
//   } 
                   

                    
                    
//                 }




                 
//             }
       
//             elseif(!$id){
         
//             $null = new stdClass;
//             $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
//             }   
//         }
//         $this->response($out);

//     }




    public function remove_audio_practice_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['audio_id']) ? $input['audio_id'] : '';
        $audio = $this->post('audio_id') ? $this->post('audio_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('id'))); 
        
        if (!$this->post('id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    $data = array(
                            'audio_status'=>0,
                            'updated_on'=>time()
                    );
                    // $this->load->model('M_log');

                    $questions = $this->Api_student->update_audio_practice($audio,$data);
                    if($questions){ 
                        $out = array('status'=>1,'message'=>'Audio deleted successfully ','data'=>new stdClass);
                        $this->Api_student->insert_log("APP - Practice Audio Removed audio id -".$audio,$id,'teacher' );
                    }
                    else{
                       $out = array('status'=>0,'message'=>'Audio delete failed','data'=>new stdClass);
                    } 
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);

    }


    public function edit_audio_practice_post(){
         $this->load->model('PresentationModel');
            $this->load->model('TeacherModel');
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['practice_id']) ? $input['practice_id'] : '';
        $practice_id = $this->post('practice_id') ? $this->post('practice_id') : $value;

        $value =!empty($input['subject_id']) ? $input['subject_id'] : '';
        $subject_id = $this->post('subject_id') ? $this->post('subject_id') : $value;

        $value =!empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value;

        $id = $this->security->xss_clean(trim($this->post('id'))); 
        
        if (!$this->post('id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $c =0;
            $check = $this->Api_student->check_session($id,$session);
            // print_r($check);
            if($check['status']== 0){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){

                    $out = array('status'=>3,'message'=>'Invalid data.');


                }else{
                    $type = 'teacher';
                    $c =1;
                }
            }else{
                $type = 'student';
                $c=1;

               
            }
               if($c ==1){
                    // $teacher = $this->Api_student->get_subject_teacher($subject_id,$id);
                    if($type =="teacher"){
                    $batch = $this->Api_student->get_semester_batch($semester);

                        $check = $this->Api_student->check_cloned_practice($practice_id,$id,$semester,$subject_id);
                        $check_cloned_status = $this->Api_student->check_cloned_practice_parent($practice_id,$id,$semester,$subject_id);

                        if($check_cloned_status ==0){
                            if($check == 0){
                                    $publish_status = 2;
                            }else{
                                $publish_status = $this->Api_student->check_content_publish($practice_id,$id,$batch);
                            }
                        }else{
                            
                            // $practice_id = $check_cloned_status;
                             $publish_status = $this->Api_student->check_content_publish($practice_id,$id,$batch);
                        }
                        

                    }else{
                        $publish_status  = 1;
                    }
             
                    $audios = $this->Api_student->practice_audio($practice_id,$id,$type,$semester,$subject_id);
                    // if($audios){ 
                        $out = array('status'=>1,'message'=>'','publish_status'=>$publish_status,'data'=>$audios);
                         $this->Api_student->insert_log("APP - Practice Audio Listing practice id".$practice_id,$id,'teacher' );
                    // }
                    // else{
                    //    $out = array('status'=>0,'message'=>'No data','data'=>new stdClass);
                    // } 
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);

    }

    // public function 


	public function presentation_view_flow_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['presentation_id']) ? $input['presentation_id'] : '';
        $presentation_id = $this->post('presentation_id') ? $this->post('presentation_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('student_id'))); 
        
        if (!$this->post('student_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $check = $this->Api_student->check_session($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                    // $newtopic = new stdClass();
                    $presentation = $this->Api_student->get_childs_flow($presentation_id);
                    if(!empty($presentation)){ 
                        $out = array('status'=>1,'message'=>'','data'=>$presentation);
                        $this->Api_student->insert_log("APP - Presentation view".$presentation_id,$id,'Student' );
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
public function publish_qanda_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['slide_id']) ? $input['slide_id'] : '';
        $slide = $this->post('slide_id') ? $this->post('slide_id') : $value;

        $value =!empty($input['question_id']) ? $input['question_id'] : '';
        $question = $this->post('question_id') ? $this->post('question_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('id'))); 
        
        if (!$this->post('id') && json_last_error() != 0) {
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    $data = array(
                            'qanda_status'=>2,
                            'created_at'=>time()
                    );
                   
                    $questions = $this->Api_student->publish_qanda($question,$data);
                    // $this->load->model('M_log');

                    if($questions){ 
                        $out = array('status'=>1,'message'=>'Q and A published successfully ','data'=>new stdClass);
                           $this->Api_student->insert_log("APP - Q and A published for question".$question,$id,'teacher' );
                        // $this->M_log->insert_log("question_added", "student question added", $id);
                    }
                    else{
                       $out = array('status'=>0,'message'=>'Q and A publish failed','data'=>new stdClass);
                    } 
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);

    }

    //17-12-2020

    function student_register_post(){
           
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);
        if (!$this->post('phone') && json_last_error() != 0)
        {

            $out = array('status'=>0,'type'=>'Input Error','message'=>'Please enter phone number');

        }
        else{
            //echo "string";exit();
            $value = !empty($input['phone']) ? $input['phone'] : '';
            $phone = $this->post('phone') ? $this->post('phone') : $value;

            $value = !empty($input['password']) ? $input['password'] : '';
            $password = $this->post('password') ? $this->post('password') : $value;

            $value = !empty($input['platform']) ? $input['platform'] : '';
            $platform = $this->post('platform') ? $this->post('platform') : $value;

            $value = !empty($input['batch_code']) ? $input['batch_code'] : '';
            $batch_code = $this->post('batch_code') ? $this->post('batch_code') : $value;

            $value = !empty($input['name']) ? $input['name'] : '';
            $name = $this->post('name') ? $this->post('name') : $value;

            $value = !empty($input['email']) ? $input['email'] : '';
            $email = $this->post('email') ? $this->post('email') : $value;

            $check_student_phone = $this->Api_student->check_student_phone($phone);
            $check_student_email = $this->Api_student->check_student_email($email);
            $batch = $this->Api_student->get_batch_code($batch_code);
            if(empty($batch)){
                $out = array('status'=>0,'type'=>' Error','message'=>'Invalid batch code');
            }

            elseif($check_student_phone > 0){
                 $out = array('status'=>0,'type'=>'Input Error','message'=>'Phone number already exist');
            }
           
            elseif($check_student_email > 0){
                 $out = array('status'=>0,'type'=>'Input Error','message'=>'Email id already exist');
            }
            else{
                $otp = rand(pow(10, 3), pow(10, 4)-1);
                $insert = array(
                            'batch_id' => $batch_code,
                            'name' => $name,
                            'phone' => $phone,
                            'email' => $email,
                            'password' => password_hash($password,PASSWORD_DEFAULT),
                            'platform' => $platform,
                            'otp' => $otp ,
                            'status' => 0,
                            'otp_time' =>time()
                        );
                 $ins_data = $this->Api_student->insert_invite_student($insert);
                if($ins_data){

                    // $datan['user_type'] = 'teacher';
                    // $datan['title'] = 'Student registration';
                    // $datan['message'] = 'Invited student registered';
                    // $datan['date'] = date('Y-m-d');
                    // $datan['is_read'] = '0';
                    // $datan['type'] = 'invite';
                    // $datan['content_id'] = $batch_id;
                    // $datan['created_by'] = $ins_data;
                    // $datan['created_on'] = time();;

                                             
                    // $nid = $this->Api_student->add_data($datan,'notifications');

                    $this->load->library('sms');
                    $msg = "Folldy register verification OTP is ". $otp ." and batch code is ".$batch_code;
                    $message = $this->sms->send_sms($phone,$msg);
                    
                    $out = array('status'=>1,'message'=>'An otp send to your phone number, please verify','data'=>'');
                }
                else{
                    $out = array('status'=>0,'message'=>'Registration failed','data'=>new stdClass);
                }


            }
            
            
        }
        $this->response($out);
    }
    function otp_verification_post(){
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);
        if (!$this->post('phone_number') && json_last_error() != 0)
        {

            $out = array('status'=>0,'type'=>'Input Error','message'=>'Please enter phone number');

        }
        else{
            $value = !empty($input['phone_number']) ? $input['phone_number'] : '';
            $phone_number = $this->post('phone_number') ? $this->post('phone_number') : $value;
            $value = !empty($input['OTP']) ? $input['OTP'] : '';
            $otp = $this->post('OTP') ? $this->post('OTP') : $value;

            $check = $this->Api_student->verify_otp($phone_number,$otp);
            if($check){
                $batch = $this->Api_student->get_batch_code($check['batch_id']);
                $endTime = date('Y-m-d H:i:s',strtotime("+10 minutes",$check['otp_time']));
                if($endTime < date('Y-m-d H:i:s')){
                    $out = array('status'=>0,'message'=>'Your OTP expired','data'=>new stdClass);
                }
                else{
                    $update = array(
                        'status' => 1
                    );
                    $this->Api_student->update_student_invite($check['invite_id'],$update);

                    $token_data = $this->Api_student->get_batch_teacher_token($check['batch_id']);
                    
                    if(!empty($token_data)){
                        //     $title = "A new student registered ";
                        //     $message = $check['name']." registered and waiting for approval ";
                        //     $var['title'] = $title;
                        //     $var['message'] = $message;
                        //     $var['image'] = "";
                        //     // base_url().'uploads/notifications/'.$upload_data['file_name'];
                        //     $data2['type'] = "invite_student";
                        //     $data2['link'] = "";

                        //     $datan['user_type'] = 'teacher';
                        //     $datan['title'] = $title;
                        //     $datan['message'] = $message;
                        //     $datan['date'] = date('Y-m-d');
                        //     $datan['is_read'] = '0';
                        //     $datan['type'] = 'invite_student';
                        //     $datan['content_id'] = $batch['batch_id'];
                        //     $datan['created_by'] =0;
                        //     $datan['created_on'] = time();;

                                             
                        //     $nid = $this->Api_student->add_data($datan,'notifications');
                        // foreach ($token_data as $key => $value) {
                        //     $tkid = $value['id'];
                        //     $token = $value['fcm'];
                        //     $this->load->library('Fcm');
                           

                        //     $notificationdata['user_id'] = $tkid;
                        //     $notificationdata['not_id'] = $nid;
                        //     $notificationdata['created_on'] = date('Y-m-d');
                        //     $not_id = $this->Api_student->add_data($notificationdata,'notifications_user');

                        //     $res1 = $this->fcm->send_push_message($token, $var, $data2);
                        // }
                        
                    }else{
                        $tkid = "";
                        $token = "";
                    }


                    $this->load->library('sms');
                    $msg = "Registration completed successfully. Please wait for teacher confirmation.";
                    $message = $this->sms->send_sms($phone_number,$msg);

                    $out = array('status'=>1,'message'=>'You have registered successfully. And waiting for approval','data'=>new stdClass);
                }
            }
            else{
                $out = array('status'=>0,'message'=>'Invalid OTP','data'=>new stdClass);
            }
        }
        $this->response($out);
    }

    function approve_invite_student_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value = !empty($input['batch_code']) ? $input['batch_code'] : '';
        $batch_code = $this->post('batch_code') ? $this->post('batch_code') : $value;

        $value = !empty($input['student_id']) ? $input['student_id'] : '';
        $student_id = $this->post('student_id') ? $this->post('student_id') : $value;

        // $value = !empty($input['chapter_id']) ? $input['chapter_id'] : '';
        // $chapter = $this->post('chapter_id') ? $this->post('chapter_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('teacher_id'))); 
        
       if (!$this->post('teacher_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    $invite_data = $this->Api_student->get_invite_student($student_id);
                    $batch = $this->Api_student->get_batch_code($batch_code);
                    $update = array(
                                    'status' => 2
                                );
                    $up_data= $this->Api_student->update_student_invite($student_id,$update);
                    if($up_data){

                        $stud = $this->Api_student->get_student_by_phone($invite_data['phone']);
                        if(empty($stud)){
                                $data = array(
                                        
                                        'name' => $invite_data['name'],
                                        'email_id' => $invite_data['email'],
                                        'phone' => $invite_data['phone'],
                                        'password' => $invite_data['password'],
                                        'status'=>1,
                                        'created_on'=>time(),
                                        'updated_on'=>time(),
                                        'updated_by'=>$this->post('teacher_id'),
                                        'course_id' => $batch['course_id'],
                                        'batch_id' => $batch['batch_id'],
                                        'institute_id' => $batch['institute_id'],
                                        'invite_status' => 1
                                    );
                                    $this->Api_student->add_data($data,'student');

                                    $this->load->library('sms');
                                    $msg = "Hi ".$invite_data['name'].", teacher verified your account.Your batch code is ".$batch_code ." Welcome to Folldy.";
                                    $message = $this->sms->send_sms($invite_data['phone'],$msg);
                                    
                                    $out = array('status'=>1,'message'=>'Student approved succesfully ','data'=>'');
                            
                        }else{
                            $out = array('status'=>0,'message'=>'Student already exist','data'=>new stdClass);
                        }
                    }
                    else{
                         $out = array('status'=>0,'message'=>'Student approval failed','data'=>new stdClass);
                    }
                }
            }
        }
        $this->response($out);

    }

    function resend_otp_post(){
           
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);
        if (!$this->post('phone') && json_last_error() != 0)
        {

            $out = array('status'=>0,'type'=>'Input Error','message'=>'Please enter phone number');

        }
        else{
            //echo "string";exit();
            $value = !empty($input['phone']) ? $input['phone'] : '';
            $phone = $this->post('phone') ? $this->post('phone') : $value;

            $value = !empty($input['password']) ? $input['password'] : '';
            $password = $this->post('password') ? $this->post('password') : $value;

            $value = !empty($input['platform']) ? $input['platform'] : '';
            $platform = $this->post('platform') ? $this->post('platform') : $value;

            $value = !empty($input['batch_code']) ? $input['batch_code'] : '';
            $batch_code = $this->post('batch_code') ? $this->post('batch_code') : $value;

            $value = !empty($input['name']) ? $input['name'] : '';
            $name = $this->post('name') ? $this->post('name') : $value;

            $value = !empty($input['email']) ? $input['email'] : '';
            $email = $this->post('email') ? $this->post('email') : $value;

            // $check_student_phone = $this->Api_student->check_student_phone($phone);
            // $check_student_email = $this->Api_student->check_student_email($email);
            // if($check_student_phone > 0){
            //      $out = array('status'=>0,'type'=>'Input Error','message'=>'Phone number already exist');
            // }
           
            // elseif($check_student_email > 0){
            //      $out = array('status'=>0,'type'=>'Input Error','message'=>'Email id already exist');
            // }
            // else{
            $invite_data = $this->Api_student->get_invite_data_by_phone($phone);
            if(!empty($invite_data)){
                $otp = rand(pow(10, 3), pow(10, 4)-1);
                $insert = array(
                            'batch_id' => $batch_code,
                            'name' => $name,
                            // 'phone' => $phone,
                            'email' => $email,
                            'password' => password_hash($password,PASSWORD_DEFAULT),
                            'platform' => $platform,
                            'otp' => $otp ,
                            'otp_time' =>time()
                        );
                if($this->Api_student->update_student_invite($invite_data['invite_id'],$insert)){

                    $this->load->library('sms');
                    $msg = "Folldy register verification OTP is ". $otp." and batch code is ".$batch_code;
                    $message = $this->sms->send_sms($phone,$msg);

                    $out = array('status'=>1,'message'=>'An otp send to your phone number, please verify','data'=>'');
                }
                
            }
            else{
                $out = array('status'=>0,'message'=>'Please register with phone number','data'=>new stdClass);
            }


            // }
            
            
        }
        $this->response($out);
    }


    function reject_invite_student_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value = !empty($input['batch_id']) ? $input['batch_id'] : '';
        $batch_id = $this->post('batch_id') ? $this->post('batch_id') : $value;

        $value = !empty($input['student_id']) ? $input['student_id'] : '';
        $student_id = $this->post('student_id') ? $this->post('student_id') : $value;

        // $value = !empty($input['chapter_id']) ? $input['chapter_id'] : '';
        // $chapter = $this->post('chapter_id') ? $this->post('chapter_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('teacher_id'))); 
        
       if (!$this->post('teacher_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    $invite_data = $this->Api_student->get_invite_student($student_id);
                    $batch = $this->Api_student->get_batch($batch_id);
                    $update = array(
                                    'status' => 3
                                );
                    $up_data= $this->Api_student->update_student_invite($student_id,$update);
                    if($up_data){
                        

                            $this->load->library('sms');
                            $msg = "Hi ".$invite_data['name'].", teacher rejected your account. Please contact administrator for further details.";
                            $message = $this->sms->send_sms($invite_data['phone'],$msg);

                            $out = array('status'=>1,'message'=>'Student rejected ','data'=>'');
                    }
                    else{
                         $out = array('status'=>0,'message'=>'Student rejection failed','data'=>new stdClass);
                    }
                }
            }
        }
        $this->response($out);

    }



    public function draft_presentation($id,$uid,$semester,$subject){
         // $id = $this->input->post('id');
         // $tid = $this->input->post('tid');
                $this->load->model('PresentationModel');
                $this->load->model('TeacherModel');


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
                    // 'display_parent'=>$topic_data['display_parent'],
                    'user_id'=>$uid,
                    'updated_at'=>time(),
                    'updated_by'=>$uid
                );
                $tid = $this->Api_student->add_data($data,'presentation_topic');
                if($tid){
                    // print_r($tid);

                        $cloned_data  = array(
                                        'presentation_id' =>$topic_data['topic_presentation_id'] ,
                                        'topic_id' =>$id , 
                                        'cloned_id' =>$tid , 
                                        'teacher_id' =>$uid , 
                                        'semester' =>$semester , 
                                        'subject' =>$subject , 
                                        'date'=> date("Y-m-d H:i:s")
                        );
                        $this->Api_student->add_data($cloned_data,'cloned_presentations');
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
       
    }



public function draft_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['slide_id']) ? $input['slide_id'] : '';
        $slide = $this->post('slide_id') ? $this->post('slide_id') : $value;

        $value =!empty($input['type']) ? $input['type'] : '';
        $type = $this->post('type') ? $this->post('type') : $value;

        $value =!empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value;

        $value =!empty($input['subject']) ? $input['subject'] : '';
        $subject = $this->post('subject') ? $this->post('subject') : $value;
       
        $id = $this->security->xss_clean(trim($this->post('id'))); 
        
        if (!$this->post('id') && json_last_error() != 0) {
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){

                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    if($type == "presentation"){
                    	$user_topic_id = $this->Api_student->get_user_topic($slide,$id,$semester,$subject);
                    	if($user_topic_id =="" || $user_topic_id ==0){
                    		$this->draft_presentation($slide,$id,$semester,$subject);
	                        $user_topic_id = $this->Api_student->get_user_topic($slide,$id,$semester,$subject);
	                        $out = array('status'=>1,'message'=>'Presentation drafted successfully ','data'=>$user_topic_id);
	                        $this->Api_student->insert_log("APP - Presentation draft -slide".$slide,$id,'teacher' );
                    	}else{
                            $out = array('status'=>1,'message'=>'Presentation already drafted ','data'=>$user_topic_id);
                        }
                       
                    }else if($type == "practice"){

                    	$check = $this->Api_student->check_cloned_practice($slide,$id,$semester,$subject);
                        if($check ==0){
                             $cloned_data  = array(
                                        'practice_id' =>$slide,
                                        'semester' =>$semester , 
                                        'subject' =>$subject , 
                                        'teacher_id' =>$id , 
                                        'date'=> date("Y-m-d H:i:s")
                            );
                        $prac_id = $this->Api_student->add_data($cloned_data,'cloned_practice');

                        }else{
                            $prac_id =$check;
                        }
                        $out = array('status'=>1,'message'=>'Practice drafted successfully ','data'=>$slide);
                        $this->Api_student->insert_log("APP - Practice draft - slide".$slide,$id,'teacher' );
                    }
                    
                   
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);

    }
    ////// 02-01-2021 bhagya /////////////
    public function add_favourite_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value = !empty($input['batch_id']) ? $input['batch_id'] : '';
        $batch_id = $this->post('batch_id') ? $this->post('batch_id') : $value;

        $value = !empty($input['subject_id']) ? $input['subject_id'] : '';
        $subject_id = $this->post('subject_id') ? $this->post('subject_id') : $value;

        $value = !empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value;

        $id = $this->security->xss_clean(trim($this->post('teacher_id'))); 
        
        if (!$this->post('teacher_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    $where['teacher_id'] = $id;
                    $where['subject_id'] = $subject_id;
                    $where['semester'] = $semester;
                    $exist_subject = $this->Api_student->subject_already_exist($where);
                    if(empty($exist_subject)){
                    $insert_data = array(
                                'subject_id' => $subject_id,
                                'teacher_id' => $id,
                                'semester' => $semester,
                                'batch_id' => $batch_id,
                                'favourite_status' => 1

                                    );
                    $insert = $this->Api_student->add_data($insert_data,'teacher_favourite_subject');
                   }
                   else{
                        $update_data = array(
                                
                                'favourite_status' => 1

                                    );
                    $where['teacher_id'] = $id;
                    $where['subject_id'] = $subject_id;
                    $where['semester'] = $semester;
                    $insert = $this->Api_student->remove_favourite($update_data,$where);
                   }
                    if($insert){

                            $out = array('status'=>1,'message'=>'Subject added  to favourite ','data'=>'');
                    }
                    else{
                         $out = array('status'=>0,'message'=>'Subject added  to favourite failed','data'=>new stdClass);
                    }
                }
            }
        }
        $this->response($out);
    }
    public function remove_favourite_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value = !empty($input['batch_id']) ? $input['batch_id'] : '';
        $batch_id = $this->post('batch_id') ? $this->post('batch_id') : $value;

        $value = !empty($input['subject_id']) ? $input['subject_id'] : '';
        $subject_id = $this->post('subject_id') ? $this->post('subject_id') : $value;

        $value = !empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value;

        $id = $this->security->xss_clean(trim($this->post('teacher_id'))); 
        
        if (!$this->post('teacher_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    $update_data = array(
                                
                                'favourite_status' => 2

                                    );
                    $where['teacher_id'] = $id;
                    $where['subject_id'] = $subject_id;
                    $where['semester'] = $semester;
                    $insert = $this->Api_student->remove_favourite($update_data,$where);
                   
                    if($insert){

                            $out = array('status'=>1,'message'=>'Subject removed from favourite ','data'=>'');
                    }
                    else{
                         $out = array('status'=>0,'message'=>'Subject removed from favourite failed','data'=>new stdClass);
                    }
                }
            }
        }
        $this->response($out);
    }

    function teacher_time_table_post(){

        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value = !empty($input['batch_id']) ? $input['batch_id'] : '';
        $batch_id = $this->post('batch_id') ? $this->post('batch_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('userid'))); 
        
        if (!$this->post('userid') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        
        
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    
                    $batch = $this->Api_student->get_batch($batch_id);
                    $week  = $this->Api_student->get_week();
                    foreach ($week as $key => $value) {
                        $data ='';
                        $data = $this->Api_student->get_timetable_teacher($batch_id,$value['id'],$id);
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
                               // $days[$value['week_days']][]= array('period'=>$row['period'],'subject'=>$row['subject']);

                            }
                        }
                        else{
                            $days[$value['week_days']] ='';
                        }

                    }
                    //print_r($days);exit();
                    
                    
                    if(!empty($days)){ 
                        $out = array(
                            'status'=>1,
                            'message'=>'',
                            'mon'=>$days['Monday'],
                            'tue'=>$days['Tuesday'],
                            'wed'=>$days['Wednesday'],
                            'thu'=>$days['Thursday'],
                            'fri'=>$days['Friday'],
                            'sat'=>$days['Saturday'],
                            'sun'=>$days['Sunday'],
                        );
                    }
                    else{
                        $out = array('status'=>0,'message'=>'There is no time table','data'=>new stdClass);
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









//////////////////////////Athulya Folldy Additional 2021////////////////////////////////////////

    // changes - added new table for pc_scr_wall_notifications

    public function add_wall_comment_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['wall_id']) ? $input['wall_id'] : '';
        $wall_id = $this->post('wall_id') ? $this->post('wall_id') : $value;
        
        $value =!empty($input['comment']) ? $input['comment'] : '';
        $comment = $this->post('comment') ? $this->post('comment') : $value;
       
        $value =!empty($input['type']) ? $input['type'] : '';
        $type = $this->post('type') ? $this->post('type') : $value;

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $type){
               $c = 0;
                 $t = 0;
                $check = $this->Api_student->check_session($id,$session);
                // print_r($check);
                if($check['status']== 0){
                    $check = $this->Api_student->check_session_teacher($id,$session);
                    if($check['status']== 0){

                        $out = array('status'=>3,'message'=>'Invalid data.');
                    }else{
                        $t =1;
                        $c =1;
                    }
                }else{
                    $c=1;
                }

                if($c== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                      if($t==1){
                        $usertype ='teacher';
                      }else{
                        $usertype ='student'; 
                      }
                    //echo $teacher;
                        $data = array();
                        if($type == 'audio'){

                            $file_name = $_FILES['comment']['name'];
                            $file_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_name);
                            $ext = pathinfo($_FILES['comment']['name'], PATHINFO_EXTENSION);
                            // change name
                            $imagename = $file_name . time() .$wall_id. "." . $ext;  
                            $target_file = './uploads/comments_wall/'.$imagename;

                           
                             if (move_uploaded_file($_FILES["comment"]["tmp_name"], $target_file)) {
                                $data['audio'] = $imagename;

                             }else{
                                 $error_msg = $this->upload->display_errors();
                                // audio uploaded error
                                $out = array('status'=>0,'message'=>$error_msg,'data'=>new stdClass);
                             }

                          
                        }else if($type == 'text'){
                            $data['text'] = $comment;
                        }else if($type == 'image'){
                            $config['upload_path']          = './uploads/comments_wall/';
                            $config['allowed_types']        = 'jpg|png|jpeg';
                            $config['max_size']             = 5*1024;
                           
                            $new_name = time();
                            $config['file_name'] = $new_name;
                            $this->load->library('upload', $config);

                            if ( ! $this->upload->do_upload('question'))
                            {
                                $error_msg = $this->upload->display_errors();
                                $out = array('status'=>0,'message'=>$error_msg,'data'=>new stdClass);
                            }
                            else{
                                $upload_data = $this->upload->data();
                                $data['image'] = $upload_data['file_name'];
                            }
                        }

                        $data['wall_id'] = $wall_id;
                        $data['user_id'] = $id;
                        $data['user_type'] = $usertype;
                        $data['created_at'] = date("Y-m-d H:i:s");  
                                         
                        $pid = $this->Api_student->add_data($data,'wall_comment');
                   
                    // $this->load->model('M_log');
                    
                    if($pid){ 
                        $out = array('status'=>1,'message'=>'Comment added','data'=>$pid);
                           $this->Api_student->insert_log("APP - ".$usertype." added comment to wall id".$wall_id,$id,$usertype );
                       
                            
                    }
                    else{
                        $out = array('status'=>0,'message'=>'comment Add Failed','data'=>new stdClass);
                    } 
                }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }elseif(!$type){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Type field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }

    // public function add_wall_comment2_post(){
    //      $this->benchmark->mark('start');
    //     $json = file_get_contents('php://input');
    //     $input = json_decode($json,true);

    //     $value = !empty($input['session']) ? $input['session'] : '';
    //     $session = $this->post('session') ? $this->post('session') : $value;

    //     $value =!empty($input['wall_id']) ? $input['wall_id'] : '';
    //     $wall_id = $this->post('wall_id') ? $this->post('wall_id') : $value;
        
    //     $value =!empty($input['comment']) ? $input['comment'] : '';
    //     $comment = $this->post('comment') ? $this->post('comment') : $value;
       
    //     $value =!empty($input['type']) ? $input['type'] : '';
    //     $type = $this->post('type') ? $this->post('type') : $value;

    //     $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
    //     if (!$this->post('user_id') && json_last_error() != 0) {
     
    //         $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
    //     }
    //     else{
    //         if($id && $type){
    //             $check = $this->Api_student->check_session($id,$session);
    //         // print_r($check);
    //         if($check['status']== 0){
    //             $check = $this->Api_student->check_session_teacher($id,$session);
    //             if($check['status']== 0){

    //                 $out = array('status'=>3,'message'=>'Invalid data.');


    //             }else{
    //                 $type = 'teacher';
    //                 $c =1;
    //             }
    //         }else{
    //             $type = 'student';
    //             $c=1;

               
    //         }
    //            if($c ==1){
    //                 //echo $teacher;
                        
    //                     $data['text'] = $comment;
    //                     $data['wall_id'] = $wall_id;
    //                     $data['user_id'] = $id;
    //                     $data['user_type'] = $type;
    //                     $data['created_at'] = date("Y-m-d H:i:s");  
                                         
    //                     $pid = $this->Api_student->add_data($data,'wall_comment');
                   
    //                 // $this->load->model('M_log');
                    
    //                 if($pid){ 
    //                     $out = array('status'=>1,'message'=>'Comment added','data'=>$pid);
    //                        $this->Api_student->insert_log("APP - teacher added comment to wall id".$wall_id,$id,'Teacher' );
                       
                            
    //                 }
    //                 else{
    //                     $out = array('status'=>0,'message'=>'comment Add Failed','data'=>new stdClass);
    //                 } 
    //             }
    //         }
    //         elseif(!$id){
         
    //         $null = new stdClass;
    //         $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
    //         }elseif(!$type){
         
    //         $null = new stdClass;
    //         $out = array('status'=>0,'message'=>'Type field is mandatory','data'=>$null);
    //         }
    //     }
    //     $this->response($out);

    // }

///////////////////assignment/////////////////////////////////////

public function list_assignment_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

                                                  
       

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{

            if($id){
                 $check = $this->Api_student->check_session($id,$session);
            // print_r($check);
            if($check['status']== 0){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){

                    $out = array('status'=>3,'message'=>'Invalid data.');


                }else{
                    $type = 'teacher';
                    $c =1;
                }
            }else{
                $type = 'student';
                $c=1;

               
            }
               if($c ==1){
                    $assignment = array();
                   
                    // echo $uid." - ".$type;


                    if($type =="student"){
                        $student = $this->Api_student->get_student_by_id($id);
                        $batch = $student['batch_id'];
                        $assignment['pending'] = $this->Api_student->list_assignment($batch);
                        $assignment['closed'] = $this->Api_student->list_closed_assignment($batch,$id);
                    }else{
                        $assignment['pending'] = $this->Api_student->list_assignment_teacher($id);
                        $assignment['closed'] = $this->Api_student->list_closed_assignment_teacher($id);   
                    }
                   

                    
                    // $this->load->model('M_log');
                    
                    if($assignment){ 
                        $out = array('status'=>1,'message'=>'','data'=>$assignment);
                           
                            
                    }
                    else{
                        $out = array('status'=>0,'message'=>'comment Add Failed','data'=>new stdClass);
                    } 
                }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }



    //add assignment

      public function add_assignment_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['question']) ? $input['question'] : '';
        $question = $this->post('question') ? $this->post('question') : $value;
        
        $value =!empty($input['files']) ? $input['files'] : '';
        $files = $this->post('files') ? $this->post('files') : $value;
       
        $value =!empty($input['date']) ? $input['date'] : '';
        $date = $this->post('date') ? $this->post('date') : $value;


        $value =!empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value;
        
        $value =!empty($input['subject']) ? $input['subject'] : '';
        $subject = $this->post('subject') ? $this->post('subject') : $value;

        $value =!empty($input['batch']) ? $input['batch'] : '';
        $batch = $this->post('batch') ? $this->post('batch') : $value;
        

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $question && $files && $date && $semester && $subject){
             $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                   
                        $data = array(
                            'assignment_title'=>$question,
                            'submission_date'=>$date,
                            'semester'=>$semester,
                            'batch'=>$batch,
                            'subject'=>$subject,
                            'created_on'=>date("Y-m-d"),
                            'updated_on'=>date("Y-m-d"),
                            'created_by'=>$id,
                            'updated_by'=>$id
                        );
                        // $pid = 1;
                    $pid = $this->Api_student->add_data($data,'assignment');
                    if($pid){
// print_r($files);
                        $fil = explode(",", $files);
                        foreach ($fil as $value) {
                            $data = array(
                                'assignment_id'=>$pid,
                                'file'=>$value,
                                'created_on'=>date("Y-m-d"),
                                'created_by'=>$id
                            );
                           $this->Api_student->add_data($data,'assignment_question_images');
                        }
// die();
                        // $students = $this->Api_student->get_course_students_subject($subject,$semester);

                        // $toks = array();
                        // foreach ($students as $value) {
                        //     $toks[] = $value['fcm'];
                        // }
                        
                            // $tokens = implode(",", $toks);
                            // $this->load->library('Fcm');
                           
                            $subjectname = $this->Api_student->get_subject_data($subject);
                            $batch = $this->Api_student->get_semester_batch($semester);


                                $title = "A new assignment added";
                                $message = " A new assignment added in ".$subjectname;
                                $teachern = $this->Api_student->getProfileDetails_teacher($id);
                                $teachername = $teachern['teacher_name'];
                                $datan = array(
                                        'batch_id' => $batch,
                                        'title'=> $title,
                                        'message' => $question, 
                                        'image' => '',
                                        'type'  => 'assignment',
                                        'chapter_name'  => '', 
                                        'chapter_id'  => '',
                                        'subject_name'  => $subjectname,
                                        'subject_id'  => $subject,
                                        'type_id'  => '',
                                        'presentation_name'  => '',
                                        'submission_date'  => $date,
                                        'publish_content'  => '',
                                        'publish_audio'  => '',
                                        'created_user'  => $teachername,
                                        'created_by'  => $id,
                                        'created_at'  => date('Y-m-d H:i:s')
                                );
                                $wall_id = $this->Api_student->add_data($datan,'wall_notifications');
                                $out = array('status'=>1,'message'=>'Assignment added');
                                            $this->Api_student->insert_log("APP - Assignment added id".$pid,$id,'student' );
                                   }     
                    else{
                        $out = array('status'=>0,'message'=>'Assignment add Failed','data'=>new stdClass);
                    } 
                }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'student id field is mandatory','data'=>$null);
            }elseif(!$question){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Question field is mandatory','data'=>$null);
            }elseif(!$files){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Files field is mandatory','data'=>$null);
            }elseif(!$semester){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Semester field is mandatory','data'=>$null);
            }elseif(!$subject){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Subject field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }

// upload file only for add assignment


    public function upload_assignment_question_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['file']) ? $input['file'] : '';
        $file = $this->post('file') ? $this->post('file') : $value;

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $type){
             $check = $this->Api_student->check_session($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                        
                            $config['upload_path']          = './uploads/assignment_question/';
                            $config['allowed_types']        = 'jpg|png|jpeg';
                            $config['max_size']             = 5*1024;
                            // $config['max_width']            = 745;
                            // $config['max_height']           = 278;
                            // $config['min_width']            = 740;
                            // $config['min_height']           = 270;
                            $new_name = time();
                            $config['file_name'] = $new_name;
                            $this->load->library('upload', $config);

                            if ( ! $this->upload->do_upload('question'))
                            {
                                $error_msg = $this->upload->display_errors();
                                // audio uploaded error
                                $out = array('status'=>0,'message'=>$error_msg,'data'=>new stdClass);
                            }
                            else{
                                $upload_data = $this->upload->data();
                                $filename = $upload_data['file_name'];
                            }


                    if($filename){ 
                        $out = array('status'=>1,'message'=>'Comment added','data'=>$filename);
                           $this->Api_student->insert_log("APP - file submit ",$id,'Teacher' );
                       
                            
                    }
                    else{
                        $out = array('status'=>0,'message'=>'comment Add Failed','data'=>new stdClass);
                    } 
                }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }elseif(!$file){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Type field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }




// submit assignment file- upload only file for submit assignment

    public function upload_assignment_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['file']) ? $input['file'] : '';
        $file = $this->post('file') ? $this->post('file') : $value;

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id ){
             $check = $this->Api_student->check_session($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                        
                            $config['upload_path']          = './uploads/assignment/';
                            $config['allowed_types']        = 'jpg|png|jpeg|pdf';
                            $config['max_size']             = 5*1024;
                            // $config['max_width']            = 745;
                            // $config['max_height']           = 278;
                            // $config['min_width']            = 740;
                            // $config['min_height']           = 270;
                            $new_name = time();
                            $config['file_name'] = $new_name;
                            $this->load->library('upload', $config);

                            if ( ! $this->upload->do_upload('file'))
                            {
                                $error_msg = $this->upload->display_errors();
                                // audio uploaded error
                                $out = array('status'=>0,'message'=>$error_msg,'data'=>new stdClass);
                            }
                            else{
                                $upload_data = $this->upload->data();
                                $filename = $upload_data['file_name'];
                            }


                    if(!empty($filename)){ 
                        $fil = base_url().'uploads/assignment/'.$filename;
                        $out = array('status'=>1,'message'=>'Comment added','data'=>$fil,'files'=>$filename);
                           $this->Api_student->insert_log("APP - file submit ",$id,'Teacher' );
                       
                            
                    }
                    else{
                        $out = array('status'=>0,'message'=>'comment Add Failed','data'=>new stdClass);
                    } 
                }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }





     public function submit_assignment_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['assignment_id']) ? $input['assignment_id'] : '';
        $assignment_id = $this->post('assignment_id') ? $this->post('assignment_id') : $value;
        
        $value =!empty($input['files']) ? $input['files'] : '';
        $files = $this->post('files') ? $this->post('files') : $value;
       
       

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $assignment_id && $files){
             $check = $this->Api_student->check_session($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;

                    $assignment =$this->Api_student->get_assignment($assignment_id);
                    $close_status = $assignment['assignment_status'];
                    if($close_status == 2){
                        $out = array('status'=>0,'message'=>'Assignment submission closed','data'=>new stdClass);
                    }else{
                        // $fil = explode(",", $files);
                        foreach ($files as $key => $value) {
                            $userfile_extn = substr($value, strrpos($value, '.')+1);
                            $data['file'] = $value;
                            $data['assignment_id'] = $assignment_id;
                            $data['user_id'] = $id;
                            $data['file_type'] = $userfile_extn;
                            $data['created_at'] = date("Y-m-d H:i:s");  
                                             
                            $pid = $this->Api_student->add_data($data,'assignment_submit');
                        }
                       
                   
                        // $this->load->model('M_log');
                        
                        if($pid){ 
                            $out = array('status'=>1,'message'=>'Assignment submited');
                               $this->Api_student->insert_log("APP - Assignment submited id".$assignment_id,$id,'student' );
                           
                                
                        }
                        else{
                            $out = array('status'=>0,'message'=>'Assignment submit Failed','data'=>new stdClass);
                        } 
                    }
                }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'student id field is mandatory','data'=>$null);
            }elseif(!$assignment_id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Type field is mandatory','data'=>$null);
            }elseif(!$files){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Type field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }


   

    public function publish_marks_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['assignment_id']) ? $input['assignment_id'] : '';
        $assignment_id = $this->post('assignment_id') ? $this->post('assignment_id') : $value;
        
        

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $assignment_id){
             $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                   
                    $data = array(
                        'assignment_publish_status'=>1,
                        'updated_on'=>date("Y-m-d"),
                        'updated_by'=>$id
                    );
                if($this->Api_student->edit_assignment($assignment_id,$data)){
                        
                    
                   
                        $out = array('status'=>1,'message'=>'Assignment marks published');
                           $this->Api_student->insert_log("APP - Assignment marks published id".$assignment_id,$id,'teacher' );
                    }
                    else{
                        $out = array('status'=>0,'message'=>'Assignment  marks publish Failed','data'=>new stdClass);
                    } 
                }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'student id field is mandatory','data'=>$null);
            }elseif(!$assignment_id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'assignment id field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }

    public function close_assignment_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['assignment_id']) ? $input['assignment_id'] : '';
        $assignment_id = $this->post('assignment_id') ? $this->post('assignment_id') : $value;
        
        

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $assignment_id){
             $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                   
                    $data = array(
                        'assignment_status'=>2,
                        'updated_on'=>date("Y-m-d"),
                        'updated_by'=>$id
                    );
                if($this->Api_student->edit_assignment($assignment_id,$data)){
                        
                    
                   
                        $out = array('status'=>1,'message'=>'Assignment closed');
                           $this->Api_student->insert_log("APP - Assignment closed id".$assignment_id,$id,'teacher' );
                    }
                    else{
                        $out = array('status'=>0,'message'=>'Assignment closed','data'=>new stdClass);
                    } 
                }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'student id field is mandatory','data'=>$null);
            }elseif(!$assignment_id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'assignment id field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }


      public function view_assignment_students_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['assignment_id']) ? $input['assignment_id'] : '';
        $assignment_id = $this->post('assignment_id') ? $this->post('assignment_id') : $value;
        
        

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $assignment_id){
             $check = $this->Api_student->check_session($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{


                $data_ass = $this->Api_student->get_assignment_view($assignment_id,$id);
                // print_r($data_ass);
                // die();
                // $subject = $data_ass['subject'];
                // $semester = $data_ass['semester'];
                //     $marks_publish = $data_ass['assignment_publish_status'];
                //     $students = $this->Api_student->list_assignment_students($semester,$subject,$assignment_id);
                    if($data_ass){
                    
                   
                        $out = array('status'=>1,'message'=>'','data'=>$data_ass);
                           $this->Api_student->insert_log("APP - assignment view".$assignment_id,$id,'student' );
                    }
                    else{
                        $out = array('status'=>0,'message'=>'There is no students','data'=>new stdClass);
                    } 
                }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'student id field is mandatory','data'=>$null);
            }elseif(!$assignment_id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'assignment id field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }

    public function add_assignment_marks_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['assignment_id']) ? $input['assignment_id'] : '';
        $assignment_id = $this->post('assignment_id') ? $this->post('assignment_id') : $value;
        
        $value =!empty($input['student_id']) ? $input['student_id'] : '';
        $student_id = $this->post('student_id') ? $this->post('student_id') : $value;

        $value =!empty($input['marks']) ? $input['marks'] : '';
        $marks = $this->post('marks') ? $this->post('marks') : $value;

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $assignment_id && $student_id && $marks){
             $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                   
                    $marks_check = $this->Api_student->check_student_marks($student_id,$assignment_id);
                    if(empty($marks_check)){
                        $data = array(
                            'marks'=>$marks,
                            'student_id'=>$student_id,
                            'assignment_id'=>$assignment_id,
                            'created_at'=>date("Y-m-d"),
                            'created_by'=>$id
                        );
                        $marks_id = $this->Api_student->add_data($data,'assignment_marks');

                    }else{
                        $marks_id = $marks_check['marks_id'];
                        $data = array(
                            'marks'=>$marks,
                            'updated_at'=>date("Y-m-d"),
                            'updated_by'=>$this->session->userdata('teacher_id')
                        );
                        $this->Api_student->update_assignment_marks($data,$marks_id);

                    }
                    if($marks_id){
                            $out = array('status'=>1,'message'=>'Assignment marks added');
                               $this->Api_student->insert_log("APP - Assignment marks added for assignment".$assignment_id." , student-".$student_id,$id,'teacher' );
                        }
                        else{
                            $out = array('status'=>0,'message'=>'Assignment marks add failed','data'=>new stdClass);
                        } 
                    }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Student id field is mandatory','data'=>$null);
            }elseif(!$assignment_id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Assignment id field is mandatory','data'=>$null);
            }elseif(!$student_id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Student id field is mandatory','data'=>$null);
            }elseif(!$marks){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Marks field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }

     public function reject_assignment_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['assignment_id']) ? $input['assignment_id'] : '';
        $assignment_id = $this->post('assignment_id') ? $this->post('assignment_id') : $value;

        $value =!empty($input['student_id']) ? $input['student_id'] : '';
        $student_id = $this->post('student_id') ? $this->post('student_id') : $value;
        
        

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $assignment_id){
             $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                   
                    $data = array(
                        'status'=>0,
                        'updated_at'=>date("Y-m-d"),
                        'updated_by'=>$id
                    );
                if($this->Api_student->edit_assignment_submit($assignment_id,$student_id,$data)){
                        
                    
                   
                        $out = array('status'=>1,'message'=>'Assignment rejected');
                           $this->Api_student->insert_log("APP - Assignment rejected id".$assignment_id." for student -".$student_id,$id,'teacher' );
                    }
                    else{
                        $out = array('status'=>0,'message'=>'Assignment reject failed','data'=>new stdClass);
                    } 
                }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'student id field is mandatory','data'=>$null);
            }elseif(!$assignment_id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'assignment id field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }
    public function delete_assignment_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['assignment_id']) ? $input['assignment_id'] : '';
        $assignment_id = $this->post('assignment_id') ? $this->post('assignment_id') : $value;
        
        

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $assignment_id){
             $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                   
                    $data = array(
                        'assignment_status'=>0,
                        'updated_on'=>date("Y-m-d"),
                        'updated_by'=>$id
                    );
                    if($this->Api_student->edit_assignment($assignment_id,$data)){
                        $out = array('status'=>1,'message'=>'Assignment deleted');
                        $this->Api_student->insert_log("APP - Assignment deleted id".$assignment_id,$id,'teacher' );
                    }
                    else{
                        $out = array('status'=>0,'message'=>'Assignment delete failed','data'=>new stdClass);
                    } 
                }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'student id field is mandatory','data'=>$null);
            }elseif(!$assignment_id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'assignment id field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }
//******************************Testing api from- need to test *********************************//
////////////////////////////////////////semester plan/////////////////////////////////////////////

    public function plan_chapter_listing_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

       

        $value =!empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value;

        $value =!empty($input['subject']) ? $input['subject'] : '';
        $subject = $this->post('subject') ? $this->post('subject') : $value;

       

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $chapter_plan_id && $date){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                   
                    // $where['semester'] = $semester;
                    // $where['subject'] = $subject;
                    // $where['teacher'] = $id;
                    // $check_expiry = $this->Api_student->check_expiry_date($where);
                    // if(empty($check_expiry)){
                        
                    // }
                    // else{
                        
                    // }

                    $plan = $this->Api_student->semester_plan_chapter($semester,$subject,$id);
                    if($plan){
                            $out = array('status'=>1,'message'=>'','data'=>$plan);
                            $this->Api_student->insert_log("APP -chapterlisting ".$subject,$id,'teacher' );
                        }
                        else{
                            $out = array('status'=>0,'message'=>'chapterlisting failed','data'=>new stdClass);
                        } 
                    }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'teacher id field is mandatory','data'=>$null);
            }elseif(!$chapter){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'chapter id field is mandatory','data'=>$null);
            }elseif(!$semester){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'semester id field is mandatory','data'=>$null);
            }elseif(!$subject){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'subject id field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }


     public function add_chapterplan_date_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['chapter_id']) ? $input['chapter_id'] : '';
        $chapterar = $this->post('chapter_id') ? $this->post('chapter_id') : $value;

         $value =!empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value;

         $value =!empty($input['subject']) ? $input['subject'] : '';
        $subject = $this->post('subject') ? $this->post('subject') : $value;

       
        $value =!empty($input['startdate']) ? $input['startdate'] : '';
        $startdatear = $this->post('startdate') ? $this->post('startdate') : $value;
        
        $value =!empty($input['enddate']) ? $input['enddate'] : '';
        $enddatear = $this->post('enddate') ? $this->post('enddate') : $value;

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $chapter_plan_id && $date){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                   $x = 0;
                   foreach ($chapterar as $key => $value) {
                        $enddate = $enddatear[$key];
                        $startdate = $startdatear[$key];

                        $where['semester'] = $semester;
                        $where['subject'] = $subject;
                        $where['teacher'] = $id;
                        $where['chapter'] = $chapter;
                        $where['chapter_plan_status'] = 0;


                        $check_expiry = $this->Api_student->check_expiry_date($where);
                        if(empty($check_expiry)){
                            $insert = array(
                                'semester' => $semester,
                                'subject' => $subject,
                                'chapter' => $value,
                                'teacher' =>$id,
                                'end_date' => $enddate,
                                'start_date' => $startdate,
                            );
                            $result=$this->Api_student->add_data($insert,'chapter_plan');
                        }
                        else{
                            $update = array('start_date' => $startdate,'end_date' => $enddate);
                            $result=$this->Api_student->update_expiry_date($update,$check_expiry['id']);
                        }
                         if($result){
                            $x==1;
                         }
                   }
                    
                    if($x == 1){
                            $out = array('status'=>1,'message'=>'end date updated for Chapter ');
                               $this->Api_student->insert_log("APP - end date added for ".$result,$id,'teacher' );
                    }
                    else{
                            $out = array('status'=>0,'message'=>'end date update failed','data'=>new stdClass);
                    } 
                }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }elseif(!$chapter){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Chapter plan id field is mandatory','data'=>$null);
            }elseif(!$date){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Date field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }




    // public function reset_chapterplan_post(){
    //     $this->benchmark->mark('start');
    //     $json = file_get_contents('php://input');
    //     $input = json_decode($json,true);

    //     $value = !empty($input['session']) ? $input['session'] : '';
    //     $session = $this->post('session') ? $this->post('session') : $value;

    //     $value =!empty($input['chapter_id']) ? $input['chapter_id'] : '';
    //     $chapter = $this->post('chapter_id') ? $this->post('chapter_id') : $value;

    //     $value =!empty($input['semester']) ? $input['semester'] : '';
    //     $semester = $this->post('semester') ? $this->post('semester') : $value;

    //     $value =!empty($input['subject']) ? $input['subject'] : '';
    //     $subject = $this->post('subject') ? $this->post('subject') : $value;

       

    //     $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
    //     if (!$this->post('user_id') && json_last_error() != 0) {
     
    //         $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
    //     }
    //     else{
    //         if($id && $chapter_plan_id && $date){
    //             $check = $this->Api_student->check_session_teacher($id,$session);
    //             if($check['status']== 0){
    //                 $out = array('status'=>3,'message'=>'Session does not match.');
    //             }
    //             else{
                   

    //                 $plan = $this->Api_student->reset_plan_chapter($chapter,$semester,$subject);
    //                 if($plan){
    //                         $out = array('status'=>1,'message'=>'','data'=>$plan);
    //                         $this->Api_student->insert_log("APP -chapterlisting ".$subject,$id,'teacher' );
    //                     }
    //                     else{
    //                         $out = array('status'=>0,'message'=>'chapterlisting failed','data'=>new stdClass);
    //                     } 
    //                 }
    //         }
    //         elseif(!$id){
         
    //         $null = new stdClass;
    //         $out = array('status'=>0,'message'=>'teacher id field is mandatory','data'=>$null);
    //         }elseif(!$chapter){
         
    //         $null = new stdClass;
    //         $out = array('status'=>0,'message'=>'chapter id field is mandatory','data'=>$null);
    //         }elseif(!$semester){
         
    //         $null = new stdClass;
    //         $out = array('status'=>0,'message'=>'semester id field is mandatory','data'=>$null);
    //         }elseif(!$subject){
         
    //         $null = new stdClass;
    //         $out = array('status'=>0,'message'=>'subject id field is mandatory','data'=>$null);
    //         }
    //     }
    //     $this->response($out);

    // }








     public function plan_content_listing_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['chapter_id']) ? $input['chapter_id'] : '';
        $chapter = $this->post('chapter_id') ? $this->post('chapter_id') : $value;

        $value =!empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value;

        $value =!empty($input['subject']) ? $input['subject'] : '';
        $subject = $this->post('subject') ? $this->post('subject') : $value;

       

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $chapter_plan_id && $date){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                   
                    // $where['semester'] = $semester;
                    // $where['subject'] = $subject;
                    // $where['teacher'] = $id;
                    // $check_expiry = $this->Api_student->check_expiry_date($where);
                    // if(empty($check_expiry)){
                        
                    // }
                    // else{
                        
                    // }

                    $plan = $this->Api_student->semester_plan_content($chapter,$id,$semester);
                    if($plan){
                            $out = array('status'=>1,'message'=>'','data'=>$plan);
                            $this->Api_student->insert_log("APP -chapterlisting ".$subject,$id,'teacher' );
                        }
                        else{
                            $out = array('status'=>0,'message'=>'chapterlisting failed','data'=>new stdClass);
                        } 
                    }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'teacher id field is mandatory','data'=>$null);
            }elseif(!$chapter){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'chapter id field is mandatory','data'=>$null);
            }elseif(!$semester){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'semester id field is mandatory','data'=>$null);
            }elseif(!$subject){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'subject id field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }



       public function add_contentplan_date_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['chapter_id']) ? $input['chapter_id'] : '';
        $chapter = $this->post('chapter_id') ? $this->post('chapter_id') : $value;

         $value =!empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value;

      

        // $value =!empty($input['chapter_id']) ? $input['chapter_id'] : '';
        // $chapter = $this->post('chapter_id') ? $this->post('chapter_id') : $value;

        $value =!empty($input['chapter_plan_id']) ? $input['chapter_plan_id'] : '';
        $planid = $this->post('chapter_plan_id') ? $this->post('chapter_plan_id') : $value;

        $value =!empty($input['content_id']) ? $input['content_id'] : '';
        $content_idar = $this->post('content_id') ? $this->post('content_id') : $value;
         
        $value =!empty($input['startdate']) ? $input['startdate'] : '';
        $startdatear = $this->post('startdate') ? $this->post('startdate') : $value;
        
        $value =!empty($input['enddate']) ? $input['enddate'] : '';
        $enddatear = $this->post('enddate') ? $this->post('enddate') : $value;
        
        

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $chapter_plan_id && $date){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    foreach ($startdatear as $key => $value) {
                        $enddate = $enddatear[$key];
                        $content_id = $content_idar[$key];

                        $where['semester'] = $semester;
                        $where['chapter_plan_id'] = $planid;
                        if($content_id){
                            $where['content_id'] = $content_id;
                        }else{
                            $where['content_id'] = 0;
                            $content_id = 0;
                        }
                        $where['teacher'] = $id;
                        $where['chapter'] = $chapter;

                        $check_expiry = $this->Api_student->check_expiry_date_content($where);
                        if(empty($check_expiry)){
                            $insert = array(
                                'semester' => $semester,
                                'chapter' => $chapter,
                                'chapter_plan_id' => $planid,
                                'content_id' => $content_id,
                                'teacher' =>$id,
                                'content_end_date' => $enddate,
                                'content_start_date' => $value,
                            );
                            $result=$this->Api_student->add_data($insert,'semester_plan');
                        }
                        else{
                            $update = array('content_end_date' => $enddate,'content_start_date' => $value);
                            $result=$this->Api_student->update_expiry_date_content($update,$check_expiry['id']);
                        }
                    }
                    if($result){
                        $out = array('status'=>1,'message'=>'end date updated for content ');
                            $this->Api_student->insert_log("APP - end date added for content ".$result,$id,'teacher' );
                    }
                    else{
                        $out = array('status'=>0,'message'=>'end date update failed','data'=>new stdClass);
                    } 
                }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }elseif(!$chapter_id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'chapter plan id field is mandatory','data'=>$null);
            }elseif(!$date){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Date field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }








///////////////////////////student exercise data saved to db/////////////////////////////////////

    public function add_exercise_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['exercise_id']) ? $input['exercise_id'] : '';
        $exercise_id = $this->post('exercise_id') ? $this->post('exercise_id') : $value;
        
        $value =!empty($input['question_id']) ? $input['question_id'] : '';
        $question_id = $this->post('question_id') ? $this->post('question_id') : $value;
       
        $value =!empty($input['option']) ? $input['option'] : '';
        $option = $this->post('option') ? $this->post('option') : $value;

        // $value =!empty($input['answer']) ? $input['answer'] : '';
        // $answer = $this->post('answer') ? $this->post('answer') : $value;

        $value =!empty($input['attendid']) ? $input['attendid'] : '';
        $attendid = $this->post('attendid') ? $this->post('attendid') : $value;

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $type){
                $check = $this->Api_student->check_session($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                        $data['attend_id'] = $attendid;
                        $data['student_id'] = $id;
                        $data['excercise_topic'] = $exercise_id;
                        $data['excercise_question'] = $question_id;
                        $data['answered_option'] = $option;
                        // $data['answered_value'] = $answer;
                        $data['created_at'] = date("Y-m-d H:i:s");  
                        $pid = $this->Api_student->add_data($data,'exercise_attend_answers');
                   
                    // $this->load->model('M_log');
                    
                    if($pid){ 
                        $out = array('status'=>1,'message'=>'exercise question attend','data'=>$pid);
                           $this->Api_student->insert_log("APP - exercise question attend".$pid,$id,'student' );                            
                    }
                    else{
                        $out = array('status'=>0,'message'=>'exercise question attend','data'=>new stdClass);
                    } 
                }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'student id field is mandatory','data'=>$null);
            }elseif(!$type){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Type field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }

///////////////////////////student total view time/////////////////////////////////////

    public function add_student_viewtime_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['subject']) ? $input['subject'] : '';
        $subject = $this->post('subject') ? $this->post('subject') : $value;
        
        $value =!empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value;
       
        $value =!empty($input['chapter']) ? $input['chapter'] : '';
        $chapter = $this->post('chapter') ? $this->post('chapter') : $value;

        $value =!empty($input['slide_id']) ? $input['slide_id'] : '';
        $slide_id = $this->post('slide_id') ? $this->post('slide_id') : $value;

        $value =!empty($input['presentationid']) ? $input['presentationid'] : '';
        $presentationid = $this->post('presentationid') ? $this->post('presentationid') : $value;

        $value =!empty($input['timetaken']) ? $input['timetaken'] : '';
        $timetaken = $this->post('timetaken') ? $this->post('timetaken') : $value;

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $type){
                $check = $this->Api_student->check_session($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                        $data['subject'] = $attendid;
                        $data['semester'] = $id;
                        $data['chapter'] = $exercise_id;
                        $data['slide_id'] = $question_id;
                        $data['presentationid'] = $option;
                        $data['timetaken'] = $answer;
                        $data['created_at'] = date("Y-m-d H:i:s");  
                        $data['student_id'] = $id;  

                        $pid = $this->Api_student->add_data($data,'studentview_time');
                   
                    // $this->load->model('M_log');
                    
                    if($pid){ 
                        $out = array('status'=>1,'message'=>'studentview time added','data'=>$pid);
                           $this->Api_student->insert_log("APP -studentview time added".$pid,$id,'student' );                            
                    }
                    else{
                        $out = array('status'=>0,'message'=>'exercise question attend','data'=>new stdClass);
                    } 
                }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'student id field is mandatory','data'=>$null);
            }elseif(!$type){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Type field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }
//////////////////////////////////////Add new wall///////////////////////////////////////////////////


    public function add_wall_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        
        $value =!empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value;
       
        $value =!empty($input['batch']) ? $input['batch'] : '';
        $batch = $this->post('batch') ? $this->post('batch') : $value;

        
        $value =!empty($input['title']) ? $input['title'] : '';
        $title = $this->post('title') ? $this->post('title') : $value;

        $value =!empty($input['message']) ? $input['message'] : '';
        $message = $this->post('message') ? $this->post('message') : $value;

      

        // $value =!empty($input['publish_audio']) ? $input['publish_audio'] : '';
        // $publish_audio = $this->post('publish_audio') ? $this->post('publish_audio') : $value;

        // $value =!empty($input['publish_content']) ? $input['publish_content'] : '';
        // $publish_content = $this->post('publish_content') ? $this->post('publish_content') : $value;

        // $value =!empty($input['timetaken']) ? $input['timetaken'] : '';
        // $timetaken = $this->post('timetaken') ? $this->post('timetaken') : $value;

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $type){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                            // $subject = $this->Api_student->get_chapter_subject($chapter_id);
                            // $chap_details = $this->Api_student->get_chapter($chapter_id);
                            // $chaptername = $chap_details['chapter_name'];

                            $config['upload_path']          = './uploads/qanda/';
                            $config['allowed_types']        = 'jpg|png|jpeg';
                            $config['max_size']             = 5*1024;
                            // $config['max_width']            = 745;
                            // $config['max_height']           = 278;
                            // $config['min_width']            = 740;
                            // $config['min_height']           = 270;
                            $new_name = time();
                            $config['file_name'] = $new_name;
                            $this->load->library('upload', $config);

                            if ( ! $this->upload->do_upload('question'))
                            {
                                $error_msg = $this->upload->display_errors();
                                // audio uploaded error
                                $out = array('status'=>0,'message'=>$error_msg,'data'=>new stdClass);
                            }
                            else{
                                // $upload_data = $this->upload->data();
                                // $file_name = $_FILES['publish_audio']['name'];
                                // $file_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_name);
                                // $ext = pathinfo($_FILES['publish_audio']['name'], PATHINFO_EXTENSION);
                                // // change name
                                // $audioname = $file_name . time() .$slide_id. "." . $ext;  
                                // $target_file = './uploads/wall/'.$audioname;

                                //  if (move_uploaded_file($_FILES["publish_audio"]["tmp_name"], $target_file)) {

                                    $teachern = $this->Api_student->getProfileDetails_teacher($id);
                                    $teachername = $teachern['teacher_name'];


                                        $datan = array(
                                        'batch_id' => $batch,
                                        'title'=> $title,
                                        'message' => $message, 
                                        'image' =>  $upload_data['file_name'],
                                        'type'  => 'wallpost',
                                        'chapter_name'  => '', 
                                        'chapter_id'  => '',
                                        'subject_name'  => '',
                                        'subject_id'  => '',
                                        'type_id'  => '',
                                        'presentation_name'  => '',
                                        'submission_date'  => '',
                                        'publish_content'  => "",
                                        'publish_audio'  => '',
                                        'created_user'  => $teachername,
                                        'created_by'  => $id,
                                        'created_at'  => date('Y-m-d H:i:s')
                                );
                                $wall_id = $this->Api_student->add_data($datan,'wall_notifications');
                                        // $datan['publish_audio'] = $audioname;
                                        // $datan['image'] = $upload_data['file_name'];
                                        // $datan['title'] = $title;
                                        // $datan['message'] = $message;
                                        // $datan['date'] = date('Y-m-d H:i:s');
                                        // $datan['type'] = 'wallpost';
                                        // $datan['created_user'] = $teachername;
                                        // $datan['created_by'] = $id;
                                        // $datan['created_on'] = time();
                                        // $datan['publish_content'] = $publish_content;
                                        // $datan['batch'] = $batch;

                                        // $wall_id = $this->Api_student->add_data($datan,'wall_notifications');
                                        if($pid){ 
                                            $out = array('status'=>1,'message'=>'wall post added','data'=>$pid);
                                               $this->Api_student->insert_log("APP - wall post added".$pid,$id,'student' );
                                        }
                                        else{
                                            $out = array('status'=>0,'message'=>'all post add failed','data'=>new stdClass);
                                        } 
                                // }else{
                                //     $error_msg = $this->upload->display_errors();
                                //     // audio uploaded error
                                //     $out = array('status'=>0,'message'=>$error_msg,'data'=>new stdClass);
                                //  }

                            }
                }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'teacher id field is mandatory','data'=>$null);
            }elseif(!$type){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Type field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }






  //////////////////wall_list_post///////////////////////////////////////////
     public function wall_list_student_post(){
        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value = !empty($input['offset']) ? $input['offset'] : '';
        $offset = $this->post('offset') ? $this->post('offset') : $value;

        // $value =!empty($input['batch']) ? $input['batch'] : '';
        // $batch = $this->post('batch') ? $this->post('batch') : $value;

        $id = $this->security->xss_clean(trim($this->post('student_id'))); 
        
        if (!$this->post('student_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $offset){
                $check = $this->Api_student->check_session($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                    $student = $this->Api_student->get_student_by_id($id);
                    $batch = $student['batch_id'];

                    $limit = 10;
                    $offset = $offset-1; 
                    $offset = ($offset*10);
                    $wall = $this->Api_student->get_wall($batch,$limit,$offset,$id);
                    if(!empty($wall)){ 
                        $out = array('status'=>1,'message'=>'','data'=>$wall);
                    }
                    else{
                        $out = array('status'=>1,'message'=>'There is no data','data'=>array());
                    } 
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'student id field is mandatory','data'=>$null);
            } elseif(!$offset){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'offset field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);

    }

      public function wall_list_teacher_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value = !empty($input['offset']) ? $input['offset'] : '';
        $offset = $this->post('offset') ? $this->post('offset') : $value;

        // $value =!empty($input['batch']) ? $input['batch'] : '';
        // $batch = $this->post('batch') ? $this->post('batch') : $value;

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $check = $this->Api_student->check_session_teacher($id,$session);
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                     $limit = 10;
                    $offset = $offset-1; 
                    $offset = ($offset*10);
                    $wall = $this->Api_student->get_wall_teacher($batch,$limit,$offset,$id);
                    if(!empty($wall)){ 
                        $out = array('status'=>1,'message'=>'','data'=>$wall);
                    }
                    else{
                        $out = array('status'=>0,'message'=>'There is no data','data'=>new stdClass);
                    } 
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Teacher id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);

    }

    public function wall_like_unlike_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['wall_id']) ? $input['wall_id'] : '';
        $wall_id = $this->post('wall_id') ? $this->post('wall_id') : $value;
        
        $value =!empty($input['like']) ? $input['like'] : '';
        $like = $this->post('like') ? $this->post('like') : $value;


        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $wall_id){
               $c = 0;
                 $t = 0;
                $check = $this->Api_student->check_session($id,$session);
                // print_r($check);
                if($check['status']== 0){
                    $check = $this->Api_student->check_session_teacher($id,$session);
                    if($check['status']== 0){

                        $out = array('status'=>3,'message'=>'Invalid data.');
                    }else{
                        $t =1;
                        $c =1;
                    }
                }else{
                    $c=1;
                }

                if($c== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                      if($t==1){
                        $usertype ='teacher';
                      }else{
                        $usertype ='student'; 
                      }

                      if($like == 1){

                            $data['user_id'] = $id;
                            $data['user_type'] = $usertype;
                            $data['wall_id'] = $wall_id;
                            $data['created_at'] = date('Y-m-d H:i:s');

                            $pid = $this->Api_student->add_data($data,'wall_like');
                            if($pid){ 
                                $out = array('status'=>1,'message'=>'wall liked successfully','data'=>$pid);
                                   $this->Api_student->insert_log("APP -wall liked".$wall_id,$id,$usertype );                            
                            }
                            else{
                                $out = array('status'=>0,'message'=>'wall like failed','data'=>new stdClass);
                            } 

                      }else{


                            $pid = $this->Api_student->delete_wall_like($id,$wall_id,$usertype);
                            if($pid){ 
                                $out = array('status'=>1,'message'=>'wall unliked','data'=>$pid);
                                   $this->Api_student->insert_log("APP -wall unliked".$wall_id,$id,$usertype );                              
                            }
                            else{
                                $out = array('status'=>0,'message'=>'wall unlike failed','data'=>new stdClass);
                            } 


                      }

                   
                    // $this->load->model('M_log');
                    
                   
                }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'student id field is mandatory','data'=>$null);
            }elseif(!$wall_id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'wall id field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }

    public function delete_comment_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['comment_id']) ? $input['comment_id'] : '';
        $comment_id = $this->post('comment_id') ? $this->post('comment_id') : $value;
  
        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $comment_id){
                $c = 0;
                 $t = 0;
                $check = $this->Api_student->check_session($id,$session);
                // print_r($check);
                if($check['status']== 0){
                    $check = $this->Api_student->check_session_teacher($id,$session);
                    if($check['status']== 0){

                        $out = array('status'=>3,'message'=>'Invalid data.');
                    }else{
                        $t =1;
                        $c =1;
                    }
                }else{
                    $c=1;
                }

                if($c== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                     

                            $data = array(
                                'status' => 0
                            );
                            $pid = $this->Api_student->delete_comment_user($comment_id,$id,$data);
                            // print_r($pid);
                            // echo"ff";
                            if($pid == 1){ 
                                $out = array('status'=>1,'message'=>'comment deleted','data'=>$comment_id);
                                   $this->Api_student->insert_log("APP -comment deleted".$comment_id,$id,'teacher' );                              
                            }
                            else{
                                $out = array('status'=>0,'message'=>'comment delete failed','data'=>new stdClass);
                            } 

                   
                    // $this->load->model('M_log');
                    
                   
                }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'teacher id field is mandatory','data'=>$null);
            }elseif(!$comment_id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Comment id field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }

    public function report_comment_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['comment_id']) ? $input['comment_id'] : '';
        $comment_id = $this->post('comment_id') ? $this->post('comment_id') : $value;
  
        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id && $comment_id){
               $c = 0;
                 $t = 0;
                $check = $this->Api_student->check_session($id,$session);
                // print_r($check);
                if($check['status']== 0){
                    $check = $this->Api_student->check_session_teacher($id,$session);
                    if($check['status']== 0){

                        $out = array('status'=>3,'message'=>'Invalid data.');
                    }else{
                        $t =1;
                        $c =1;
                    }
                }else{
                    $c=1;
                }

                if($c== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                      if($t==1){
                        $usertype ='teacher';
                      }else{
                        $usertype ='student'; 
                      }
                        $total_report_count = $this->Api_student->check_total_comment_report($comment_id,$usertype);
                        if($total_report_count <= 3){
                            $total_user_report = $this->Api_student->check_total_user_report($id,$usertype);
                            if( $total_user_report <2){
                                $total_user_comment_report = $this->Api_student->checktotal_user_comment_report($comment_id,$id,$usertype);
                                if($total_user_comment_report==0){
                                    $data['user_id'] = $id;
                                    $data['user_type'] = $usertype;
                                    $data['comment_id'] = $comment_id;
                                    $data['created_at'] = date('Y-m-d H:i:s');

                                    $pid = $this->Api_student->add_data($data,'report_comment');
                                    if($pid){ 
                                        $out = array('status'=>1,'message'=>'Comment reported successfully','data'=>$pid);
                                           $this->Api_student->insert_log("APP -Comment reported".$comment_id,$id,$usertype );                            
                                    }
                                    else{
                                        $out = array('status'=>0,'message'=>'wall like failed','data'=>new stdClass);
                                    } 
                                }else{
                                    $out = array('status'=>0,'message'=>'wall like failed already reorted','data'=>new stdClass);
                                }

                            }else{
                                $out = array('status'=>0,'message'=>'wall like failed, more than report for this comment','data'=>new stdClass);
                            }
                        }else{
                            $data = array(
                                'status' => 0
                            );
                            $pid = $this->Api_student->delete_comment($comment_id,$data);
                             $out = array('status'=>0,'message'=>'wall report failed comment deleted','data'=>$null);
                        }
                    // $this->load->model('M_log');
                    
                   
                }
            }
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'student id field is mandatory','data'=>$null);
            }elseif(!$comment_id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'Comment id field is mandatory','data'=>$null);
            }
        }
        $this->response($out);

    }


public function comment_list_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $value =!empty($input['wall_id']) ? $input['wall_id'] : '';
        $wall_id = $this->post('wall_id') ? $this->post('wall_id') : $value;

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $c = 0;
                $t = 0;
                $check = $this->Api_student->check_session($id,$session);
                // print_r($check);
                if($check['status']== 0){
                    $check = $this->Api_student->check_session_teacher($id,$session);
                    if($check['status']== 0){

                        $out = array('status'=>3,'message'=>'Invalid data.');
                    }else{
                        $t =1;
                        $c =1;
                    }
                }else{
                    $c=1;
                }

                if($c== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                    $wall = $this->Api_student->get_comments($wall_id);
                    if(!empty($wall)){ 
                        $out = array('status'=>1,'message'=>'','data'=>$wall);
                    }
                    else{
                        $out = array('status'=>0,'message'=>'There is no data','data'=>new stdClass);
                    } 
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'user id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);

    }


 function student_mainpage_post(){

        $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $id = $this->security->xss_clean(trim($this->post('userid')));

        $value = !empty($input['fcm']) ? $input['fcm'] : '';
        $fcm = $this->post('fcm') ? $this->post('fcm') : $value; 
        // bhagya new update
        $value = !empty($input['semester']) ? $input['semester'] : '';
        $semester = $this->post('semester') ? $this->post('semester') : $value; 
        
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
                    $session = array();
                    if($fcm){
                        $session['fcm'] = $fcm;
                    $this->Api_student->update_student_details($session,$id);

                    }
                            // $updte_where['id'] = $login['id'];
                    $student = $this->Api_student->get_student_by_id($id);
                    $timetable = $this->Api_student->today_timetable($student['batch_id']);
                    // $subject = $this->Api_student->get_subject($student['course_id']);
                    $subject = $this->Api_student->get_subject($student['batch_id']);
                   
                 if(empty($semester)){
                        $subject = $this->Api_student->get_active_subject($student['batch_id']);
                    }
                    else{
                        $subject = $this->Api_student->get_semester_subject($student['batch_id'],$semester);
                    }
                    // $published_subject = $this->Api_student->get_published_semester($student['batch_id']);
                    $published_subject = $this->Api_student->get_current_semester($semester,$student['batch_id']);

                    // $subject = $this->Api_student->get_subject($student['batch_id'],$semester);
// echo $student['batch_id'];
// die();
                    

            ///////////////////////////////////////////////////////////////////////

                    // $todays = array();
                    // foreach($timetable as $row){
                    //     $todays[] = $row['subject'];
                    // }
                  


                    $week  = $this->Api_student->get_week();
                    //print_r($week);exit();
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
                        $timetable = array();

                        $timetable[] = array('name'=>'mon','subject'=> $days['Monday'] ? $days['Monday'] : array());
                        $timetable[] = array('name'=>'Tuesday','subject'=> $days['Tuesday'] ? $days['Tuesday'] : array() );
                        $timetable[] = array('name'=>'Wednesday','subject'=> $days['Wednesday'] ? $days['Wednesday'] : array());
                        $timetable[] = array('name'=>'Thursday','subject'=> $days['Thursday'] ? $days['Thursday'] : array());
                        $timetable[] = array('name'=>'Friday','subject'=> $days['Friday'] ? $days['Friday'] : array());
                        $timetable[] = array('name'=>'Saturday','subject'=> $days['Saturday'] ? $days['Saturday'] : array());
                        $timetable[] = array('name'=>'Sunday','subject'=> $days['Sunday'] ? $days['Sunday'] : array());



                        // $todays = array(
                        //     'mon'=>$days['Monday'],
                        //     'tue'=>$days['Tuesday'],
                        //     'wed'=>$days['Wednesday'],
                        //     'thu'=>$days['Thursday'],
                        //     'fri'=>$days['Friday'],
                        //     'sat'=>$days['Saturday'],
                        //     'sun'=>$days['Sunday'],
                        // );
                    }

                    $nocount = $this->Api_student->get_notifications_student_count($id);
                    $semester = $this->Api_student->get_semester($student['batch_id']);

                    if(!empty($student)){ 
                        $out = array('status'=>1,'message'=>'','timetable'=>$timetable, 'notification_count'=> $nocount,'semesters'=>$semester,'profile'=>$student,'publish_semester' => $published_subject);
                    }
                    else{
                        $out = array('status'=>0,'message'=>'There is no consultant','data'=>new stdClass);
                    }

                    //////////////////////////close Athulya/////////////////////////////////



                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'student id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);
    }




public function academics_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $c = 0;
                $t = 0;
                $check = $this->Api_student->check_session($id,$session);
                // print_r($check);
                if($check['status']== 0){
                    $check = $this->Api_student->check_session_teacher($id,$session);
                    if($check['status']== 0){

                        $out = array('status'=>3,'message'=>'Invalid data.');
                    }else{
                        $t =1;
                        $c =1;
                    }
                }else{
                    $c=1;
                }

                if($c== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                    $count = '1% Submit';
                    $count1 = '1% Learned';
                    $count2 = 'Batch 2020-2023';

                    $academics[] = array('name'=>'Works','count'=>$count);
                    $academics[] = array('name'=>'Analysis','count'=>$count1);
                    $academics[] = array('name'=>'Time Table','count'=>$count2);

                    if(!empty($academics)){ 
                        $out = array('status'=>1,'message'=>'','data'=>$academics);
                    }
                    else{
                        $out = array('status'=>0,'message'=>'There is no data','data'=>new stdClass);
                    } 
                }
            }
       
            elseif(!$id){
         
            $null = new stdClass;
            $out = array('status'=>0,'message'=>'user id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);

    }





public function analysis_post(){
         $this->benchmark->mark('start');
        $json = file_get_contents('php://input');
        $input = json_decode($json,true);

        $value = !empty($input['session']) ? $input['session'] : '';
        $session = $this->post('session') ? $this->post('session') : $value;

        $id = $this->security->xss_clean(trim($this->post('user_id'))); 
        
        if (!$this->post('user_id') && json_last_error() != 0) {
     
            $out = array('status'=>0,'message'=>'Input Error','data'=>new stdClass);
        }
        else{
            if($id){
                $c = 0;
                $t = 0;
                $check = $this->Api_student->check_session($id,$session);
                // print_r($check);
                
                if($check['status']== 0){
                    $out = array('status'=>3,'message'=>'Session does not match.');
                }
                else{
                    //echo $teacher;
                    $student = $this->Api_student->get_student_by_id($id);
                    $subject = $this->Api_student->get_active_subject_percent($student['batch_id']);

                    if(!empty($subject)){ 
                        $out = array('status'=>1,'message'=>'','data'=>$subject);
                    }
                    else{
                        $out = array('status'=>0,'message'=>'There is no data','data'=>new stdClass);
                    } 
                }
            }
       
            elseif(!$id){
         
                $null = new stdClass;
                $out = array('status'=>0,'message'=>'user id field is mandatory','data'=>$null);
            }   
        }
        $this->response($out);

    }
/////////////////////////additional close//////////////////////////////////////////////////////






}