<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller{
	function __construct(){
        parent::__construct();
       
		date_default_timezone_set('Asia/Kolkata');
		$this->load->model('InstituteModel');
		$this->load->model('AdminModel');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
    }
    public function index(){
    	$this->load->view('institute/login');
    }
    public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$out = $this->InstituteModel->check_login($username,$password);
		if($out['status']==1){
			$data = $out['data'];
			$role = $this->AdminModel->get_role($data['role_id']);
			$rights = explode(',',$role['role_rights']);
			$view=$create=$edit=$delete=0;
            foreach($rights as $priv){
              if($priv == 'view') $view = 1;
              if($priv == 'create') $create = 1;
              if($priv == 'edit') $edit = 1;
              if($priv == 'delete') $delete = 1;
              $rights = array_diff($rights,array($priv));
            }
			$this->session->set_userdata('priv',explode(',',$role['role_priv']));
			$this->session->set_userdata('view',$view);
			$this->session->set_userdata('create',$create);
			$this->session->set_userdata('edit',$edit);
			$this->session->set_userdata('delete',$delete);
			$this->session->set_userdata('ins_user_id',$data['ins_user_id']);
			$this->session->set_userdata('ins_user_name',$data['ins_user_name']);
			$this->session->set_userdata('institute_id',$data['ins_id']);
		}
		echo json_encode($out);
	}
	public function institute_logout(){
		$this->session->sess_destroy();
		redirect(base_url('institute'));
	}
	public function forgot_password(){
		$username = $this->input->post('username');
		$data = $this->InstituteModel->forgot_password($username);
		 if(!empty($data)){
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";

            $phone=$data['phone'];
            $password = substr( str_shuffle( $chars ), 0, 12 );
            $user_where['phone'] = $data['phone'];
            $user_where['status'] = 1;
            $update_data['password'] = password_hash($password,PASSWORD_DEFAULT);

            $update=$this->InstituteModel->update_password($user_where,$update_data);
            if($update){
            	$message = 'Your new password is '.$password.' . Mesoki';
                $this->load->library('sms');
                $resp = $this->sms->sendsms($phone,$message);
                $out = array('status'=>1,'data'=>'New Password has been send to your phone.!');
            }
            else{
            	$out = array('status'=>0,'data'=>'Updation error!');
            }
        }
        else{
            $out = array('status'=>0,'data'=>'Invalid Username!');
        }
        echo json_encode($out);

	}
}