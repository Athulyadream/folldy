<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InstituteAjaxController extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(empty($this->session->userdata('ins_user_id'))){
            echo json_encode(array('status'=>404,'data'=>'Session not available!'));
            die();
        }
        $this->load->model('InstituteModel');
        date_default_timezone_set('Asia/Kolkata');
    }
    public function get_teacher_phone(){
        $code = $this->input->post('value'); 
        $id = $this->input->post('id');            
        $count = $this->InstituteModel->get_teacher_phone($code,$id);

        if($count >0)
        {
            echo 1;
        }
        
        else
        {
            echo 0;
        }
    }
    public function get_teacher_email(){

        $code = $this->input->post('value');
        $id = $this->input->post('id');              
        $count = $this->InstituteModel->get_teacher_email($code,$id);

        if($count >0)
        {
            echo 1;
        }
        
        else
        {
            echo 0;
        }
    }
    public function get_teacher(){
        $id = $this->input->post('id');
        $data = $this->InstituteModel->get_teacher($id);
        $subject = $this->InstituteModel->get_teacher_subject($id);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data,'subject'=>$subject);
        else array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
    }
    public function get_batch_code(){
        $code = $this->input->post('value');
        $id = $this->input->post('id');              
        $count = $this->InstituteModel->get_batch_code($code,$id);

        if($count >0)
        {
            echo 1;
        }
        
        else
        {
            echo 0;
        }
    }
    public function get_batch(){
        $id = $this->input->post('id');
        $data = $this->InstituteModel->get_batch($id);
        $data1 = $this->InstituteModel->get_batch_period($id);
         
        if(!empty($data)) $out = array('status'=>1,'data'=>$data,'period' => $data1);
        else array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
    }
    public function get_student_phone(){
        $code = $this->input->post('value'); 
        $id = $this->input->post('id');            
        $count = $this->InstituteModel->get_student_phone($code,$id);

        if($count >0)
        {
            echo 1;
        }
        
        else
        {
            echo 0;
        }
    }
    public function get_student_email(){

        $code = $this->input->post('value');
        $id = $this->input->post('id');              
        $count = $this->InstituteModel->get_student_email($code,$id);

        if($count >0)
        {
            echo 1;
        }
        
        else
        {
            echo 0;
        }
    }
    public function get_student(){
        $id = $this->input->post('id');
        $data = $this->InstituteModel->get_student($id);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
    }
    public function get_batch_course(){
        $code = $this->input->post('value');
        
        $data['batch'] = $this->InstituteModel->get_batch_course($code);
        
        echo json_encode($data);
    }
    public function get_news(){
        $id = $this->input->post('id');
        $data = $this->InstituteModel->get_news($id);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
    }
    public function get_events(){
        $id = $this->input->post('id');
        $data = $this->InstituteModel->get_events($id);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
    }
    public function get_teacher_username(){
        $code = $this->input->post('value');
        $id = $this->input->post('id');              
        $count = $this->InstituteModel->get_teacher_username($code,$id);

        if($count >0)
        {
            echo 1;
        }
        
        else
        {
            echo 0;
        }
    }
    public function reset_filter(){
        $code = $this->input->post('value');
        $this->session->unset_userdata($code);
        $out = array('status'=>1,'data'=>'');
        echo json_encode($out);
    }
    public function institute_reset_password(){
        $cur_pass = $this->input->post('cur_pass');
        $new_pass = $this->input->post('new_pass');
        $data = $this->InstituteModel->reset_password($cur_pass,$new_pass);
        if($data['status'] == 1) $out = array('status'=>1,'data'=>'');
        elseif($data['status'] == 0) $out = array('status'=>0,'data'=>'Invalid request!');
        else $out = array('status'=>2,'data'=>'Invalid request!');
        echo json_encode($out);
    }
    public function delete_semester($id){
        //$id=$this->input->post('id');
        //$out = $this->AdminModel->delete_question($id);
        $batch=$this->InstituteModel->semester_batch_id($id);
        if($this->InstituteModel->delete_semester($id)){
            $this->session->set_flashdata('sem_delete',1);
        }
        else{
            $this->session->set_flashdata('sem_delete',2);
        }
       redirect(base_url('create-semester/'.$batch['batch_id'] ));
       //redirect(base_url('batch'));
   }


   /////////////////////// 2021 additianal athulya//////////////////////////////////////
    public function set_semester_start_date(){
        $start_date = str_replace('/', '-', $this->input->post('start_date'));
        $semid = $this->input->post('semester');

        $start_date1 = date('Y-m-d', strtotime($start_date));
     
            $update = array('semester_start_date' => $start_date1);
            $result=$this->InstituteModel->update_semester_date($update,$semid);
        
        if($result){
            echo 1;
        }
        else{
            echo 0;
        }
       
    }

    public function set_semester_expiry_date(){
       $start_date = str_replace('/', '-', $this->input->post('expiry_date'));
        $start_date1 = date('Y-m-d', strtotime($start_date));
        $semid = $this->input->post('semester');
      
            $update = array('semester_end_date' => $start_date1);
            $result=$this->InstituteModel->update_semester_date($update,$semid);
        
        if($result){
            echo 1;
        }
        else{
            echo 0;
        }
       
       
    }


      public function get_principal_phone(){
        $code = $this->input->post('value'); 
        $id = $this->input->post('id');            
        $count = $this->InstituteModel->get_principal_phone($code,$id);

        if($count >0)
        {
            echo 1;
        }
        
        else
        {
            echo 0;
        }
    }
    public function get_principal_email(){

        $code = $this->input->post('value');
        $id = $this->input->post('id');              
        $count = $this->InstituteModel->get_principal_email($code,$id);

        if($count >0)
        {
            echo 1;
        }
        
        else
        {
            echo 0;
        }
    }
    public function get_principal(){
        $id = $this->input->post('id');
        $data = $this->InstituteModel->get_principal($id);
        // $subject = $this->InstituteModel->get_teacher_subject($id);
        if(!empty($data)) $out = array('status'=>1,'data'=>$data);
        else array('status'=>0,'data'=>'Invalid request!');
        echo json_encode($out);
    }

}
