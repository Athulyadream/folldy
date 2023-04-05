<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InstituteModel extends CI_Model {
	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
         $query = $this->db->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");


    }

    public function check_login($username,$password){
        $this->db->select('id,role_id,name,status,password,institute_users.institute_id,institutes.institute_status');
        $this->db->where('username',$username);
        $this->db->join('institutes','institutes.institute_id=institute_users.institute_id','left');
        $data = $this->db->get('institute_users')->row_array();
        if(!empty($data)){
            if(password_verify($password,$data['password'])){
                if($data['status']==1 && $data['institute_status'] ==1){
                    $out = array('status'=>1,'data'=>array('ins_user_name'=>$data['name'],'ins_user_id'=>$data['id'],'ins_id'=>$data['institute_id'],'role_id'=>$data['role_id']));
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

    public function count_institutes($filter){
        $this->db->where('institute_status >',0);
        if($filter['name']){
            $this->db->where('institute_name LIKE','%'.$filter['name'].'%');
        }
        if($filter['email']){
            $this->db->where('institute_email LIKE','%'.$filter['email'].'%');
        }
        if($filter['phone']){
            $this->db->where('institute_phone LIKE','%'.$filter['phone'].'%');
        }
        if($filter['status']){
            $this->db->where('institute_status ',$filter['status']);
        } 
        return $this->db->count_all_results('institutes');
    }


    public function list_institutes($limit,$offset,$filter){
        $this->db->select('*');

        if($filter['name']){
            $this->db->where('institute_name LIKE','%'.$filter['name'].'%');
        }
        if($filter['email']){
            $this->db->where('institute_email LIKE','%'.$filter['email'].'%');
        }
        if($filter['phone']){
            $this->db->where('institute_phone LIKE','%'.$filter['phone'].'%');
        }
        if($filter['status']){
            $this->db->where('institute_status ',$filter['status']);
        } 
        
        $this->db->where('institute_status >',0);
        $this->db->limit($limit,$offset);
        $this->db->order_by('institute_id','desc');
        $result = $this->db->get('institutes')->result_array();
        foreach($result as $key => $row){
            $this->db->select('data_name');
            $this->db->where('ins_course.institute_id',$row['institute_id']);
            $this->db->join('data','data.data_id=ins_course.course_id','left');
            $result2 = $this->db->get('ins_course')->result_array();
            // $sub = array();
            // foreach ($result2 as $row2) {
            //     $sub1[] = $row2['data_name'];
            // }
            // $result[$key]['course']  = implode(",", $sub1);
            $result[$key]['course'] = $result2;
        }
        return $result;
    }
    public function add_data($data,$table){
        if($this->db->insert($table,$data)) {
       
              return $this->db->insert_id();

        }
        else {return 0;}
    }
    public function edit_institute($data,$id){
        $this->db->where('institute_id ',$id);
        if($this->db->update('institutes',$data)) return true;
        else return false;
    }
    public function count_institute_user($ins){
        $filter = $this->session->userdata('institute_user_filter');
        if($filter['name']){
            $this->db->where('name LIKE','%'.$filter['name'].'%');
        }
        if($filter['email']){
            $this->db->where('email LIKE','%'.$filter['email'].'%');
        }
        if($filter['phone']){
            $this->db->where('phone LIKE','%'.$filter['phone'].'%');
        }
        if($filter['status']){
            $this->db->where('status ',$filter['status']);
        } 

        $this->db->where('status >',0);
        $this->db->where('institute_id ',$ins);
        return $this->db->count_all_results('institute_users');
    }

    public function list_institute_users($ins,$limit,$offset){

        $filter = $this->session->userdata('institute_user_filter');
        if($filter['name']){
            $this->db->where('name LIKE','%'.$filter['name'].'%');
        }
        if($filter['email']){
            $this->db->where('email LIKE','%'.$filter['email'].'%');
        }
        if($filter['phone']){
            $this->db->where('phone LIKE','%'.$filter['phone'].'%');
        }
        if($filter['status']){
            $this->db->where('status ',$filter['status']);
        } 
        $this->db->select('*');
        $this->db->where('institute_id ',$ins);
        //$this->db->join('roles','roles.role_id=admins.role_id','left');
        //$this->db->order_by('admins.updated_on','desc');
        $this->db->where('status >',0);
        $this->db->limit($limit,$offset);
        return $this->db->get('institute_users')->result_array();
    }
    public function get_institute_by_id($id){
    	$this->db->select('institute_id,institute_name');
    	$this->db->where('institute_id',$id);
    	return $this->db->get('institutes')->row_array();
    }
    public function edit_institute_user($data,$id){
        $this->db->where('id',$id);
        if($this->db->update('institute_users',$data)) return true;
        else return false;
    }
    public function count_teachers($filter){
        if($filter['name']){
            $this->db->where('teacher_name LIKE','%'.$filter['name'].'%');
        }
        if($filter['email']){
            $this->db->where('teacher_email LIKE','%'.$filter['email'].'%');
        }
        if($filter['phone']){
            $this->db->where('teacher_phone LIKE','%'.$filter['phone'].'%');
        }
        if($filter['username']){
            $this->db->where('teacher_username LIKE','%'.$filter['username'].'%');
        }
        if($filter['status']){
            $this->db->where('teacher_status ',$filter['status']);
        } 
        $this->db->where('teacher_status >',0);
        $this->db->where('institute_id ',$this->session->userdata('institute_id'));
        return $this->db->count_all_results('teachers');
    }

    public function list_teachers($limit,$offset,$filter){
        if($filter['name']){
            $this->db->where('teacher_name LIKE','%'.$filter['name'].'%');
        }
        if($filter['email']){
            $this->db->where('teacher_email LIKE','%'.$filter['email'].'%');
        }
        if($filter['phone']){
            $this->db->where('teacher_phone LIKE','%'.$filter['phone'].'%');
        }
        if($filter['username']){
            $this->db->where('teacher_username LIKE','%'.$filter['username'].'%');
        }
        if($filter['status']){
            $this->db->where('teacher_status ',$filter['status']);
        } 
        $this->db->select('teachers.*,roles.role_name');
        $this->db->join('roles','roles.role_id=teachers.role_id','left');
        // $this->db->join('data','data.data_id=teachers.subject_id','left');
        $this->db->order_by('teachers.updated_on','desc');
        $this->db->where('teachers.institute_id ',$this->session->userdata('institute_id'));
        $this->db->where('teacher_status >',0);
        $this->db->limit($limit,$offset);
        $result = $this->db->get('teachers')->result_array();

        foreach($result as $key => $row){
            $this->db->select('data_name');
            $this->db->where('teacher_subjects.teacher_id',$row['teacher_id']);
            $this->db->where('teacher_subjects.institute_id ',$this->session->userdata('institute_id'));
            $this->db->join('data','data.data_id=teacher_subjects.subject_id','left');
            $result1 = $this->db->get('teacher_subjects')->result_array();
            $sub = array();
            foreach ($result1 as $row1) {
                $sub[] = $row1['data_name'];
            }
            $result[$key]['subject']  = implode(",", $sub);

            
        }
        // print_r($result);exit();
        return $result;


    }
    function get_teacher_phone($code,$id) 
    {
        if(!empty($id)){
            $this->db->where('teacher_id != ',$id);
        }
        $fields = '*';
        $this->db->select($fields);
        
        $this->db->where('teacher_phone',$code);
        $this->db->from('teachers');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }
    // ************ bhagya - 04-01-2021 **************
    function get_teacher_code($code,$id) 
    {
        if(!empty($id)){
            $this->db->where('teacher_id != ',$id);
        }
        $fields = '*';
        $this->db->select($fields);
        
        $this->db->where('teacher_code',$code);
        $this->db->from('teachers');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }
     // *********************************
    function get_teacher_email($code,$id) 
    {
        if(!empty($id)){
            $this->db->where('teacher_id != ',$id);
        }
        $fields = '*';
        $this->db->select($fields);
        
        $this->db->where('teacher_email',$code);
        $this->db->from('teachers');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        //$this->db->last_query();exit();
        return $rowcount;
    }
    function get_teacher_username($code,$id) 
    {
        if(!empty($id)){
            $this->db->where('teacher_id != ',$id);
        }
        $fields = '*';
        $this->db->select($fields);
        
        $this->db->where('teacher_username',$code);
        $this->db->from('teachers');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }
    public function get_teacher($id){
        $this->db->where('teacher_id',$id);
        return $this->db->get('teachers')->row_array();
    }
    public function get_teacher_subject($id){
        $this->db->where('teacher_id',$id);
        return $this->db->get('teacher_subjects')->result_array();
    }
    public function edit_teacher($data,$id){
        $this->db->where('teacher_id',$id);
        if($this->db->update('teachers',$data)) return true;
        else return false;
    }
    public function delete_teacher_subject($id){
        $this->db->where('teacher_id',$id);
         if($this->db->delete('teacher_subjects')) return true;
        else return false;

    }
     public function count_batch($filter){
        if($filter['name']){
            $this->db->where('batch_name LIKE','%'.$filter['name'].'%');
        }
        if($filter['code']){
            $this->db->where('batch_code LIKE','%'.$filter['code'].'%');
        }
        if($filter['course']){
            $this->db->where('course_id LIKE','%'.$filter['course'].'%');
        }
        if($filter['status']){
            $this->db->where('batch_status ',$filter['status']);
        } 
        $this->db->where('batch_status >',0);
        $this->db->where('institute_id ',$this->session->userdata('institute_id'));
        return $this->db->count_all_results('batch');
    }

    public function list_batch($limit,$offset,$filter){
        if($filter['name']){
            $this->db->where('batch_name LIKE','%'.$filter['name'].'%');
        }
        if($filter['code']){
            $this->db->where('batch_code LIKE','%'.$filter['code'].'%');
        }
        if($filter['course']){
            $this->db->where('course_id',$filter['course']);
        }
        if($filter['status']){
            $this->db->where('batch_status ',$filter['status']);
        } 
        $this->db->select('batch.*,data.data_name ');
        $this->db->where('batch.institute_id ',$this->session->userdata('institute_id'));
        $this->db->join('data','data.data_id=batch.course_id','left');
        $this->db->order_by('batch.batch_id','desc');
        $this->db->where('batch_status >',0);
        $this->db->limit($limit,$offset);
        return $this->db->get('batch')->result_array();
    }
    public function list_course(){
        $this->db->select('course_id');
        $this->db->where('institute_id',$this->session->userdata('institute_id'));
        $course = $this->db->get('ins_course')->result_array();
        $course_id = array();
        foreach($course as $row){
            $course_id[] = $row['course_id'];
        }
        if(!empty($course_id)){
            $this->db->where_in('data_id',$course_id);
        }
        $this->db->select('data_id,data_name');
        $this->db->where('data_status',1);
        $this->db->where('data_type',0);
        $this->db->order_by('data_name','asc');
        return $this->db->get('data')->result_array();
    }
    public function list_course_all(){
        $this->db->select('*');
        //$this->db->where('institute_id ',$this->session->userdata('institute_id'));
        $this->db->where('data_type',0);
        $this->db->where('data_status',1);
        $this->db->order_by('data_name','asc');
        return $this->db->get('data')->result_array();
    }
     public function list_subjects(){
         $this->db->select('course_id');
        $this->db->where('institute_id',$this->session->userdata('institute_id'));
        $course = $this->db->get('ins_course')->result_array();
        $course_id = array();
        foreach($course as $row){
            $course_id[] = $row['course_id'];
        }
        if(!empty($course_id)){
            $this->db->where_in('data_parent',$course_id);
        }

        $this->db->select('data_id,data_name');
        $this->db->where('data_status',1);
        $this->db->where('data_type',1);
        
        $this->db->order_by('data_name','asc');
        return $this->db->get('data')->result_array();
    }
    public function get_all_subject(){
        $this->db->select('*');
        $this->db->where('data_status',1);
        $this->db->where('data_type',1);
        //$this->db->where('institute_id ',$this->session->userdata('institute_id'));
        $this->db->order_by('data_name','asc');
        return $this->db->get('data')->result_array();
    }
    function get_batch_code($code,$id) 
    {
        if(!empty($id)){
            $this->db->where('batch_id != ',$id);
        }
        $fields = '*';
        $this->db->select($fields);
        
        $this->db->where('batch_code',$code);
        $this->db->from('batch');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        //$this->db->last_query();exit();
        return $rowcount;
    }
    public function get_batch($id){
        $this->db->where('batch_id',$id);
        return $this->db->get('batch')->row_array();
    }
    public function get_batch_period($id){
        $this->db->where('batch_id',$id);
        return $this->db->get('batch_days')->result_array();
    }
    public function edit_batch($data,$id){
        $this->db->where('batch_id',$id);
        if($this->db->update('batch',$data)) return true;
        else return false;
    }
    public function delete_batch_days($id){
        $this->db->where('batch_id',$id);
        if($this->db->delete('batch_days')) return true;
        else return false;

    }
    public function count_course(){
        //$this->db->where('course_status >',0);
        $this->db->where('institute_id ',$this->session->userdata('institute_id'));
        return $this->db->count_all_results('data');
    }
    public function count_students($filter){
        if($filter['name']){
            $this->db->where('name LIKE','%'.$filter['name'].'%');
        }
        if($filter['email']){
            $this->db->where('email_id LIKE','%'.$filter['email'].'%');
        }
        if($filter['phone']){
            $this->db->where('phone LIKE','%'.$filter['phone'].'%');
        }
        if($filter['course']){
            $this->db->where('course_id',$filter['course']);
        }
        if($filter['status']){
            $this->db->where('status ',$filter['status']);
        } 
        $this->db->where('status >',0);
        $this->db->where('institute_id ',$this->session->userdata('institute_id'));
        return $this->db->count_all_results('student');
    }

    public function list_students($limit,$offset,$filter){
        if($filter['name']){
            $this->db->where('name LIKE','%'.$filter['name'].'%');
        }
        if($filter['email']){
            $this->db->where('email_id LIKE','%'.$filter['email'].'%');
        }
        if($filter['phone']){
            $this->db->where('phone LIKE','%'.$filter['phone'].'%');
        }
        if($filter['course']){
            $this->db->where('student.course_id',$filter['course']);
        }
        if($filter['status']){
            $this->db->where('status ',$filter['status']);
        } 
        $this->db->select('student.*,data.data_name as data_name,batch_name');
        $this->db->where('student.institute_id ',$this->session->userdata('institute_id'));
        $this->db->join('data','data.data_id=student.course_id','left');
        $this->db->join('batch','batch.batch_id=student.batch_id','left');
        //$this->db->order_by('admins.updated_on','desc');
        $this->db->where('status >',0);
        $this->db->limit($limit,$offset);
        return $this->db->get('student')->result_array();
    }
    function get_student_phone($code,$id) 
    {
        if(!empty($id)){
            $this->db->where('id != ',$id);
        }
        $fields = '*';
        $this->db->select($fields);
        
        $this->db->where('phone',$code);
        $this->db->from('student');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }
    function get_student_email($code,$id) 
    {
        if(!empty($id)){
            $this->db->where('id != ',$id);
        }
        $fields = '*';
        $this->db->select($fields);
        
        $this->db->where('email_id',$code);
        $this->db->from('student');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        //$this->db->last_query();exit();
        return $rowcount;
    }
    public function get_student($id){
        $this->db->where('id',$id);
        return $this->db->get('student')->row_array();
    }
    public function get_batch_course($id){
        $this->db->select('batch_id,batch_name');
        $this->db->where('course_id',$id);
        $this->db->where('batch_status',1);
        $this->db->where('institute_id ',$this->session->userdata('institute_id'));
        return $this->db->get('batch')->result_array();
    }
    public function edit_student($data,$id){
        $this->db->where('id',$id);
        if($this->db->update('student',$data)) return true;
        else return false;
    }
    public function count_news($filter){
        if($filter['name']){
            $this->db->where('news_heading LIKE','%'.$filter['name'].'%');
        }
        if($filter['date']){
            $this->db->where('news_date',$filter['date']);
        }
        
        if($filter['status']){
            $this->db->where('news_status',$filter['status']);
        } 
        $this->db->where('news_status >',0);
        $this->db->where('institute_id ',$this->session->userdata('institute_id'));
        return $this->db->count_all_results('news');
    }

    public function list_news($limit,$offset,$filter){
        if($filter['name']){
            $this->db->where('news_heading LIKE','%'.$filter['name'].'%');
        }
        if($filter['date']){
            $this->db->where('news_date',$filter['date']);
        }
        
        if($filter['status']){
            $this->db->where('news_status',$filter['status']);
        } 
        $this->db->select('*');
        $this->db->where('institute_id ',$this->session->userdata('institute_id'));
        
        $this->db->where('news_status >',0);
        $this->db->limit($limit,$offset);
        return $this->db->get('news')->result_array();
    }
    public function count_admin_news($filter){
        if($filter['name']){
            $this->db->where('news_heading LIKE','%'.$filter['name'].'%');
        }
        if($filter['date']){
            $this->db->where('news_date',$filter['date']);
        }
        
        if($filter['status']){
            $this->db->where('news_status',$filter['status']);
        } 
        $this->db->where('news_status >',0);
        $this->db->where('institute_id ',0);
        return $this->db->count_all_results('news');
    }

    public function list_admin_news($limit,$offset,$filter){
        if($filter['name']){
            $this->db->where('news_heading LIKE','%'.$filter['name'].'%');
        }
        if($filter['date']){
            $this->db->where('news_date',$filter['date']);
        }
        
        if($filter['status']){
            $this->db->where('news_status',$filter['status']);
        } 
        $this->db->select('*');
        $this->db->where('institute_id ',0);
        
        $this->db->where('news_status >',0);
        $this->db->limit($limit,$offset);
        return $this->db->get('news')->result_array();
    }
    public function get_news($id){
        $this->db->where('news_id',$id);
        return $this->db->get('news')->row_array();
    }
    public function edit_news($data,$id){
        $this->db->where('news_id',$id);
        if($this->db->update('news',$data)) return true;
        else return false;
    }
    public function count_events($filter){
        if($filter['name']){
            $this->db->where('event_title LIKE','%'.$filter['name'].'%');
        }
        if($filter['date']){
            $this->db->where('event_date',$filter['date']);
        }
        
        if($filter['status']){
            $this->db->where('event_status',$filter['status']);
        } 
        $this->db->where('event_status >',0);
        $this->db->where('institute_id ',$this->session->userdata('institute_id'));
        return $this->db->count_all_results('event');
    }

    public function list_events($limit,$offset,$filter){
        if($filter['name']){
            $this->db->where('event_title LIKE','%'.$filter['name'].'%');
        }
        if($filter['date']){
            $this->db->where('event_date',$filter['date']);
        }
        
        if($filter['status']){
            $this->db->where('event_status',$filter['status']);
        }
        $this->db->select('*');
        $this->db->where('institute_id ',$this->session->userdata('institute_id'));
        
        $this->db->where('event_status >',0);

        $this->db->limit($limit,$offset);
        $this->db->order_by('event_date','asc');
        return $this->db->get('event')->result_array();
    }
    public function get_events($id){
        $this->db->where('event_id',$id);
        return $this->db->get('event')->row_array();
    }
    public function edit_event($data,$id){
        $this->db->where('event_id',$id);
        if($this->db->update('event',$data)) return true;
        else return false;
    }
    public function get_week_days(){
         return $this->db->get('week_days')->result_array();
    }
    public function get_no_of_periods($id){
        $this->db->select('batch_id,batch_periods,course_id');
        $this->db->where('batch_id',$id);
        return $this->db->get('batch')->row_array();

    }
    public function get_batch_week_days($id){
        $this->db->select('batch_days.weekdays,week_days.week_days');
        $this->db->where('batch_id',$id);
        $this->db->join('week_days','week_days.id=batch_days.weekdays','left');
        return $this->db->get('batch_days')->result_array();
    }
    public function get_time_table($batch){
        $this->db->select('time_table.*,week_days.week_days');
        $this->db->where('batch_id',$batch);
        $this->db->join('week_days','week_days.id = time_table.weekdays','left');
        return $this->db->get('time_table')->result_array();

    }
    public function delete_timetable($id){
        $this->db->where('batch_id',$id);
        if($this->db->delete('time_table')) return true;
        else return false;

    }
    public function count_video(){
        $this->db->where('video_status >',0);
        $this->db->where('chapter_id',0);
        //$this->db->where('institute_id ',$this->session->userdata('institute_id'));
        return $this->db->count_all_results('video');
    }

    public function list_video($limit,$offset){
        $this->db->select('*');
        //$this->db->where('institute_id ',$this->session->userdata('institute_id'));
        
        $this->db->where('video_status >',0);
        $this->db->where('chapter_id',0);
        $this->db->limit($limit,$offset);
        $result = $this->db->get('video')->result_array();
        foreach($result as $key => $row){
            $this->db->select('file_tag');
            $this->db->where('file_id',$row['video_id']);
            $result1 = $this->db->get('file_tag')->result_array();

            $result[$key]['tag'] =$result1;
        }
        //print_r($result);exit();
        return $result;
    }
    public function delete_video($id){
         $this->db->where('video_id',$id);
         
         $data['video_status'] = 0;
        if($this->db->update('video',$data)){
            return true;
        }
        else return false;
    }
    public function delete_image($id){
         $this->db->where('id',$id);
         
         $data['image_status'] = 0;
        if($this->db->update('chapter_image',$data)){
            return true;
        }
        else return false;
    }
    public function course_details($id){
        $this->db->select('*');
        $this->db->where('data_id ',$id);
        $this->db->where('data_type',0);
        $this->db->where('data_status',1);
        return $this->db->get('data')->row_array();
    }
    public function course_subjct($id){
        $this->db->select('*');
        $this->db->where('data_parent',$id);
        $this->db->where('data_type',1);
        $this->db->where('data_status',1);
        return $this->db->get('data')->result_array();
    }
    public function count_ins_course(){
        $this->db->where('course_status >',0);
        $this->db->where('institute_id ',$this->session->userdata('institute_id'));
        return $this->db->count_all_results('institute_course');
    }
    public function list_ins_course($limit,$offset){
        $this->db->select('*');
        $this->db->where('institute_id ',$this->session->userdata('institute_id'));
        
        $this->db->where('course_status >',0);
        $this->db->limit($limit,$offset);
        return $this->db->get('institute_course')->result_array();
    }
    public function get_course_data($id){
        $this->db->where('id',$id);
        return $this->db->get('institute_course')->row_array();
    }
    public function update_course($id,$data){
        $this->db->where('id',$id);
        if($this->db->update('institute_course',$data)) return true;
        else return false;
    }
    public function delete_ins_course($id){
         $this->db->where('id',$id);
         // $this->db->where('data_type',0);
         $data['course_status'] = 0;
        if($this->db->update('institute_course',$data)){
            return true;
        }
        else return false;
    }
    public function count_papers($id){
        $this->db->where('subject_status >',0);
        $this->db->where('course_id',$id);
        return $this->db->count_all_results('institute_subject');
    }

    public function list_papers($id,$limit,$offset){
        $this->db->select('data_id,data_name, institute_subject.updated_on, institute_subject.type,institute_subject.id');
        $this->db->join('data','data.data_id=institute_subject.subject_id','left');
        $this->db->where('subject_status >',0);
        $this->db->where('course_id',$id);
        $this->db->order_by('id','desc');
        $this->db->limit($limit,$offset);
        return $this->db->get('institute_subject')->result_array();
    }
    public function delete_ins_paper($id){
         $this->db->where('id',$id);
         // $this->db->where('data_type',0);
         $data['subject_status'] = 0;
        if($this->db->update('institute_subject',$data)){
            return true;
        }
        else return false;
    }
    public function get_paper_course($id){
        $this->db->select('course_id');
        $this->db->where('id',$id);
        return $this->db->get('institute_subject')->row_array();
    }
    public function count_chapters($id){
        $this->db->where('chapter_status',1);
        $this->db->where('chapter_paper',$id);
        return $this->db->count_all_results('chapter');
    }

    public function list_chapters($id,$limit,$offset){
        $this->db->select('chapter_id as data_id,chapter_name as data_name ,chapter.updated_on,admin_name,chapter.updated_by');

        $this->db->join('admins','admins.admin_id=chapter.updated_by','left');
        $this->db->where('chapter_status',1);
        //$this->db->where('data_type',2);
        $this->db->where('chapter_paper',$id);
        $this->db->order_by('chapter_id','desc');
        $this->db->limit($limit,$offset);
        return $this->db->get('chapter')->result_array();
    }
    public function count_exercise($id){
        $this->db->where('exercise_title',$id);
        $this->db->where('exercise_status >',0);
        return $this->db->count_all_results('exercise');
    }

    public function list_exercise($limit,$offset,$id){
        $this->db->select('*');
    // $this->db->join('admins','admins.admin_id=exercise.updated_by','left');
        $this->db->where('exercise_status >',0);
        $this->db->where('exercise_title',$id);
        $this->db->order_by('exercise_id','desc');

        $this->db->limit($limit,$offset);
        return $this->db->get('exercise')->result_array();
    }
    public function get_exercise($id){
        $this->db->where('exercise_id',$id);
        return $this->db->get('exercise')->row_array();
    }
    public function edit_exercise($data,$id){
        $this->db->where('exercise_id',$id);
        if($this->db->update('exercise',$data)) return true;
        else return false;
    }
    public function get_video_list(){
        $this->db->select('video_id,video_title');
        $this->db->where('video_status',1);
        return $this->db->get('video')->result_array();
    }
    
    public function delete_institute_course($id){

        $this->db->where('id',$id);
         // $this->db->where('data_type',0);
         $data['course_status'] = 0;
        if($this->db->update('institute_course',$data)){
            return true;
        }
        else return false;

    }
    public function get_institute_course($id){
        $this->db->select('id,course_id');
        $this->db->from('institute_course');
        $this->db->where('institute_id',$id);
        $this->db->where('type','admin');
        return $this->db->get()->result_array();
    }
    public function get_course_subject($course,$id){
        $this->db->select('data_id,data_name');
        $this->db->where('data.data_type',1);
        $this->db->where('data.data_status',1);
        $this->db->where('data.data_parent',$course);
        // $this->db->join('batch_teachers ','batch_teachers.batch_id='.$id.' AND data.data_id = batch_teachers.subject_id','left');
        $this->db->from('data');
        return $this->db->get()->result_array();
    }
    public function get_subject_teacher($sub){
         $this->db->distinct('teachers.teacher_id');
        $this->db->select('teachers.teacher_id,teachers.teacher_name');
        $this->db->where('teacher_subjects.subject_id',$sub);
        $this->db->where('teachers.teacher_status',1);
        $this->db->where('teacher_subjects.institute_id',$this->session->userdata('institute_id'));
        $this->db->join('teachers','teachers.teacher_id = teacher_subjects.teacher_id');
        $this->db->from('teacher_subjects');
        return $this->db->get()->result_array();
    }
    public function get_batch_subject($batch){
        $this->db->select('*');
        $this->db->where('batch_id',$batch);
        $this->db->from('batch_teachers');
        return $this->db->get()->result_array();
    }
    public function delete_batch_teachers($id){

        $this->db->where('batch_id',$id);
         // $this->db->where('data_type',0);
         // $data['course_status'] = 0;
        if($this->db->delete('batch_teachers')){
            return true;
        }
        else return false;

    }
    public function reset_password($cur_pass,$new_pass){
        $this->session->userdata('ins_user_id');
        $this->db->select('*');
        $this->db->where('id',$this->session->userdata('ins_user_id'));
        
        $data = $this->db->get('institute_users')->row_array();
        if(password_verify($cur_pass,$data['password']))
        {
            $data = array(
                'password'=>password_hash($new_pass,PASSWORD_DEFAULT),
                );
             $this->db->where('id',$this->session->userdata('ins_user_id'));
             if($this->db->update('institute_users',$data)){
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
        $this->db->select('id,phone');
        $this->db->where('username',$username);
        $this->db->where('status',1);
        //$this->db->or_where('admin_email',$username);
        $data = $this->db->get('institute_users')->row_array();

        return $data;
    }
    public function update_password($where,$update_data){
        if(!empty($where)){
            $this->db->where($where);
        }
        return $this->db->update('institute_users',$update_data);
    }

    public function count_exercise_bank($id = 0){
        $this->db->where('chapter_id',$id);
        $this->db->where('ex_topic_status >',0);
        if($this->session->userdata('admin_role')==1 || $this->session->userdata('admin_role')==3){ 
        
        }else{
                $this->db->where('exercise_topic.updated_by',$this->session->userdata('admin_id'));
        }
        return $this->db->count_all_results('exercise_topic');
    }

    public function list_exercise_bank($limit,$offset,$id = 0){
        //echo $id;exit();
        $this->db->select('exercise_topic.*,admins.admin_name');
        $this->db->join('admins','admins.admin_id=exercise_topic.updated_by','left');
        $this->db->where('ex_topic_status >',0);
        $this->db->where('chapter_id',$id);
         if($this->session->userdata('admin_role')==1 || $this->session->userdata('admin_role')==3){ 
        
            }else{
                $this->db->where('exercise_topic.updated_by',$this->session->userdata('admin_id'));
            }
        
        $this->db->order_by('ex_topic_id','desc');
        $this->db->limit($limit,$offset);
        $result = $this->db->get('exercise_topic')->result_array();
        foreach($result as $key => $value){
            $this->db->where('exercise_id',$value['ex_topic_id']);
            $tags = $this->db->get('exercise_tag')->result_array();
            $tg = array();
            foreach ($tags as $tag) {
                $tg[] = $tag['exercise_tag'];
            }
            $result[$key]['tags']  = implode(",", $tg);
        }
        return $result;
    }
    public function get_exercise_bank($id){
        $this->db->where('ex_topic_id',$id);
        $this->db->where('ex_topic_status >',0);
        $result = $this->db->get('exercise_topic')->row_array();

        $this->db->where('exercise_id',$id);
        $tags = $this->db->get('exercise_tag')->result_array();
        $tg = array();
        foreach ($tags as $tag) {
            $tg[] = $tag['exercise_tag'];
        }
        $result['tags']  = implode(",", $tg);

        return $result;
    }
    public function get_exercise_tags($id){
        $this->db->where('exercise_id',$id);
        return $this->db->get('exercise_tag')->result_array();
    }
    public function edit_exercise_bank($data,$id){
        $this->db->where('ex_topic_id',$id);
        if($this->db->update('exercise_topic',$data)) return true;
        else return false;
    }
    public function delete_exercise_bank($id){
         $this->db->where('ex_topic_id',$id);
         
         $data['ex_topic_status'] = 0;
        if($this->db->update('exercise_topic',$data)){
            return true;
        }
        else return false;
    }
    public function delete_exercise_tag($id){
        $this->db->where('exercise_id',$id);
        if($this->db->delete('exercise_tag')){
            return true;
        }
        else return false;
    }
    public function count_upload_files($id){
        $this->db->where('video_status >',0);
        $this->db->where('chapter_id',$id);
        //$this->db->where('institute_id ',$this->session->userdata('institute_id'));
        return $this->db->count_all_results('video');
    }

    public function list_upload_files($limit,$offset,$id){
        $this->db->select('*');
        //$this->db->where('institute_id ',$this->session->userdata('institute_id'));
        $this->db->where('chapter_id',$id);
        $this->db->where('video_status >',0);
        $this->db->limit($limit,$offset);
        $result = $this->db->get('video')->result_array();
        foreach($result as $key => $row){
            $this->db->select('file_tag');
            $this->db->where('file_id',$row['video_id']);
            $result1 = $this->db->get('file_tag')->result_array();

            $result[$key]['tag'] =$result1;
        }
        //print_r($result);exit();
        return $result;
    }
    public function list_chapter_image($id){
        $this->db->select('*');
        $this->db->where('chapter_id',$id);
        $this->db->where('image_status >',0);
        $result = $this->db->get('chapter_image')->result_array();
        foreach($result as $key => $row){
            $this->db->select('tag');
            $this->db->where('image_id',$row['id']);
            $result1 = $this->db->get('image_tags')->result_array();

            $result[$key]['tag'] =$result1;
        }
        //print_r($result);exit();
        return $result;
    }
    public function list_exercise_topic($id){
        // 
        // return $this->db->count_all_results('presentation_topic');
        $this->db->select('*');
        $this->db->where('ex_topic_status >',0);
        $this->db->where('ex_topic_id',$id);
        $result = $this->db->get('exercise_topic')->row_array();
        
            
        $this->db->select('*');
        $this->db->where('exercise_status',1);
        $this->db->where('exercise_title',$id);
        $result['exercise'] = $this->db->get('exercise')->result_array();


        return $result;
    }
    public function get_topics($id){

        $this->db->select('*');
        $this->db->from('exercise_topic');
        $this->db->where('ex_topic_id', $id);
        $this->db->where('ex_topic_status >',0);


        $parent = $this->db->get();
        
        $topics = $parent->row_array();
        $i=0;
        // foreach($topics as $p_cat){
        if(!empty($topics)){
              $this->db->select('*');
                    $this->db->where('exercise_status >',0);
                    $this->db->where('exercise_title',$topics['ex_topic_id']);
                    $topics['exercise'] = $this->db->get('exercise')->result_array();
             

            $i++;
        }else{
            $topics = false;
        }
           
        // }
        return $topics;
        
    }
    public function check_subject_assigned($id,$batch){
        $this->db->select('*');
        $this->db->where('subject_id',$id);
        $this->db->where('batch_id',$batch);
        $this->db->where('institute_id',$this->session->userdata('institute_id'));
        $this->db->from('batch_teachers');
        return $this->db->get()->row_array();
    }
    public function edit_assigned_teacher($data,$id){
        $this->db->where('id',$id);
        if($this->db->update('batch_teachers',$data)) return true;
        else return false;
    }
    //dashboard
    public function institute_details(){
        $this->db->select('institute_id,institute_name');
        $this->db->where('institute_id',$this->session->userdata('institute_id'));
        return $this->db->get('institutes')->row_array();
    }
    public function batch_course(){
        $this->db->select('DISTINCT(data_id),data_name');
        $this->db->from('batch');
        $this->db->where('batch.institute_id',$this->session->userdata('institute_id'));
        $this->db->where('batch.batch_status',1);
        $this->db->join('data','data.data_id=batch.course_id','left');
        return $this->db->get()->result_array();
    }
    public function dashboard_news(){
        $this->db->select('*');
        $this->db->where('institute_id',$this->session->userdata('institute_id'));
        $this->db->order_by('news_date','desc');
        return $this->db->get('news')->result_array();
    }
    public function dashboard_teacers(){
        $this->db->select('teachers.*');
        $this->db->order_by('teachers.teacher_name','desc');
        $this->db->where('teachers.institute_id ',$this->session->userdata('institute_id'));
        $this->db->where('teacher_status',1);
        
        $result = $this->db->get('teachers')->result_array();

        foreach($result as $key => $row){
            $this->db->select('data_name');
            $this->db->where('teacher_subjects.teacher_id',$row['teacher_id']);
            $this->db->where('teacher_subjects.institute_id ',$this->session->userdata('institute_id'));
            $this->db->join('data','data.data_id=teacher_subjects.subject_id','left');
            $result1 = $this->db->get('teacher_subjects')->result_array();
            $sub = array();
            foreach ($result1 as $row1) {
                $sub[] = $row1['data_name'];
            }
            $result[$key]['subject']  = implode(",", $sub);

            
        }
        // print_r($result);exit();
        return $result;
    }
    public function dashboard_students(){
        $this->db->select('student.*,batch_name');
        $this->db->from('student');
        $this->db->where('student.institute_id',$this->session->userdata('institute_id'));
        $this->db->join('batch','batch.batch_id = student.batch_id','left');
        return $this->db->get()->result_array();
        
    }
    public function dashboard_events(){
        $this->db->select('*');
        $this->db->where('institute_id',$this->session->userdata('institute_id'));
        $this->db->order_by('event_date','desc');
        return $this->db->get('event')->result_array();
    }
    public function dashboard_time_table(){
        $this->db->select('batch_id,batch_name,batch_periods');
        $this->db->from('batch');
        $this->db->where('batch.institute_id',$this->session->userdata('institute_id'));
        $this->db->where('batch.batch_status',1);
        $result = $this->db->get()->result_array();
        
        foreach($result as $key => $value){
            $this->db->select('time_table.*,week_days');
            $this->db->from('time_table');
            $this->db->where('time_table.batch_id',$value['batch_id']);
            $this->db->join('week_days','week_days.id =time_table.weekdays','left');
            $result1 = $this->db->get()->result_array();
            $result[$key]['timetable'] = $result1;
            $result[$key]['days'] =$this->get_batch_week_days($value['batch_id']);

        }
        return $result;
        //print_r($result);exit();

    }
    public function institute_course_delete($id){

        $this->db->where('institute_id',$id);
         // $this->db->where('data_type',0);
        if($this->db->delete('ins_course')){
            return true;
        }
        else return false;

    }
    public function institute_course_list(){
        $this->db->select('data_id,data_name');
        // $this->db->where('course_id',$id);
        // $this->db->where('batch_status',1);
        $this->db->join('data','data.data_id = ins_course.course_id','left');
        $this->db->where('institute_id ',$this->session->userdata('institute_id'));
        return $this->db->get('ins_course')->result_array();
    }
    public function get_semester_subject($id){
        $this->db->select('*');
        $this->db->where('batch_id',$id);
        $this->db->where('publish_status !=',3);
        $this->db->where('institute_id ',$this->session->userdata('institute_id'));
        $semester = $this->db->get('ins_semester')->result_array();

        foreach($semester as $key => $row){
            $this->db->select('data_id,data_name');
            $this->db->where('sem_id',$row['sem_id']);
            $this->db->join('data','data.data_id = sem_subject.subject_id','left');
            $subject = $this->db->get('sem_subject')->result_array();
            $sub = array();
            $sub_id =array();
            foreach ($subject as  $row1) {
                    $sub[] = $row1['data_name'];
                    $sub_id[]=$row1['data_id'];
            }
            $semester[$key]['subject']  = implode(",", $sub);
            $semester[$key]['exist_sub'] = $sub_id;
        }
        
        return $semester;

    }
    public function delete_semester($id){
        $this->db->where('sem_id',$id);
         $data['publish_status'] = 3;
        if($this->db->update('ins_semester',$data)){
            return true;
        }
        else return false;
    }
    public function publish_semester($id){
        $batch_id = $this->semester_batch_id($id);
        $this->db->where('batch_id',$batch_id['batch_id']);
        $this->db->where('publish_status',1);
        $data1['publish_status'] = 2;
        $this->db->update('ins_semester',$data1);

        $this->db->where('sem_id',$id);
         $data['publish_status'] = 1;
        if($this->db->update('ins_semester',$data)){

            return true;
        }
        else return false;
    }
    public function semester_batch_id($id){
        $this->db->select('batch_id');
        $this->db->where('sem_id',$id);
        $this->db->where('publish_status !=',3);
        $this->db->where('institute_id ',$this->session->userdata('institute_id'));
        return $semester = $this->db->get('ins_semester')->row_array();
    }
    public function disable_semester($id){
        // $batch_id = $this->semester_batch_id($id);
        // $this->db->where('batch_id',$batch_id['batch_id']);
        // $this->db->where('publish_status',1);
        // $data1['publish_status'] = 2;
        // $this->db->update('ins_semester',$data1);

        $this->db->where('sem_id',$id);
         $data['publish_status'] = 0;
        if($this->db->update('ins_semester',$data)){

            return true;
        }
        else return false;
    }
    public function batch_teachers($id){
        $this->db->distinct('batch_teachers.teacher_id');
        $this->db->select('batch_teachers.teacher_id,teachers.teacher_name');
        
        $this->db->where('batch_teachers.batch_id',$id);
        $this->db->join('teachers ','teachers.teacher_id=batch_teachers.teacher_id','left');
        $this->db->from('batch_teachers');
        return $this->db->get()->result_array();
    
    }
    public function delete_assigned_subject($id,$batch){
       
        $this->db->where('subject_id',$id);
        $this->db->where('batch_id',$batch);
        $this->db->where('institute_id',$this->session->userdata('institute_id'));
        
        $this->db->delete('batch_teachers');
        return true;
    }
    public function get_batch_subject_teacher($batch,$sub){
        $this->db->distinct('batch_teachers.teacher_id');
        $this->db->select('batch_teachers.teacher_id,teachers.teacher_name');
        
        $this->db->where('batch_teachers.batch_id',$batch);
        $this->db->where('batch_teachers.subject_id',$sub);
        $this->db->join('teachers ','teachers.teacher_id=batch_teachers.teacher_id','left');
        $this->db->from('batch_teachers');
        return $this->db->get()->result_array();

    }

    ///////////////////2021 additional Athulya///////////////////////////////

    public function update_semester_date($data,$id){
        $this->db->where('sem_id ',$id);
        if($this->db->update('ins_semester',$data)) return true;
        else return false;
    }

    public function count_principal($filter){
        if($filter['name']){
            $this->db->where('principal_name LIKE','%'.$filter['name'].'%');
        }
        if($filter['email']){
            $this->db->where('principal_email LIKE','%'.$filter['email'].'%');
        }
        if($filter['phone']){
            $this->db->where('principal_phone LIKE','%'.$filter['phone'].'%');
        }
        if($filter['username']){
            $this->db->where('principal_username LIKE','%'.$filter['username'].'%');
        }
        if($filter['status']){
            $this->db->where('principal_status ',$filter['status']);
        } 
        $this->db->where('principal_status >',0);
        $this->db->where('institute_id ',$this->session->userdata('institute_id'));
        return $this->db->count_all_results('principal');
    }

    public function list_principal($limit,$offset,$filter){
        if($filter['name']){
            $this->db->where('principal_name LIKE','%'.$filter['name'].'%');
        }
        if($filter['email']){
            $this->db->where('principal_email LIKE','%'.$filter['email'].'%');
        }
        if($filter['phone']){
            $this->db->where('principal_phone LIKE','%'.$filter['phone'].'%');
        }
        if($filter['username']){
            $this->db->where('principal_username LIKE','%'.$filter['username'].'%');
        }
        if($filter['status']){
            $this->db->where('principal_status ',$filter['status']);
        } 
        $this->db->select('principal.*,roles.role_name');
        $this->db->join('roles','roles.role_id=principal.role_id','left');
        // $this->db->join('data','data.data_id=teachers.subject_id','left');
        $this->db->order_by('principal.updated_on','desc');
        $this->db->where('principal.institute_id ',$this->session->userdata('institute_id'));
        $this->db->where('principal_status >',0);
        $this->db->limit($limit,$offset);
        $result = $this->db->get('principal')->result_array();

       
        // print_r($result);exit();
        return $result;


    }
    function get_principal_phone($code,$id) 
    {
        if(!empty($id)){
            $this->db->where('principal_id != ',$id);
        }
        $fields = '*';
        $this->db->select($fields);
        
        $this->db->where('principal_phone',$code);
        $this->db->from('principal');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }
    function get_principal_code($code,$id) 
    {
        if(!empty($id)){
            $this->db->where('principal_id != ',$id);
        }
        $fields = '*';
        $this->db->select($fields);
        
        $this->db->where('principal_code',$code);
        $this->db->from('principal');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }
     // *********************************
    function get_principal_email($code,$id) 
    {
        if(!empty($id)){
            $this->db->where('principal_id != ',$id);
        }
        $fields = '*';
        $this->db->select($fields);
        
        $this->db->where('principal_email',$code);
        $this->db->from('principal');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        //$this->db->last_query();exit();
        return $rowcount;
    }
    function get_principal_username($code,$id) 
    {
        if(!empty($id)){
            $this->db->where('principal_id != ',$id);
        }
        $fields = '*';
        $this->db->select($fields);
        
        $this->db->where('principal_username',$code);
        $this->db->from('principal');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }
    public function get_principal($id){
        $this->db->where('principal_id',$id);
        return $this->db->get('principal')->row_array();
    }
    
    public function edit_principal($data,$id){
        $this->db->where('teacher_id',$id);
        if($this->db->update('principal',$data)) return true;
        else return false;
    }



}