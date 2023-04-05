<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

    function __construct(){
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
         $query = $this->db->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");

    }

    public function check_login($username,$password){
        $this->db->select('admin_id,role_id,admin_name,admin_status,admin_password');
        $this->db->where('admin_username',$username);
        $this->db->or_where('admin_email',$username);
        $data = $this->db->get('admins')->row_array();
        if(!empty($data)){
            if(password_verify($password,$data['admin_password'])){
                if($data['admin_status']==1){
                    $out = array('status'=>1,'data'=>array('admin_name'=>$data['admin_name'],'admin_id'=>$data['admin_id'],'role_id'=>$data['role_id']));
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



    public function add_question_insert($data){
        if($this->db->insert('pc_scr_q_table',$data)) return $this->db->insert_id();
        else return 0; 
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

    public function count_roles($filter){
        if($filter['name']){
            $this->db->where('role_name LIKE','%'.$filter['name'].'%');
        }
        return $this->db->count_all_results('roles');
    }

    public function list_role($limit,$offset,$filter){
        if($filter['name']){
            $this->db->where('role_name LIKE','%'.$filter['name'].'%');
        }
        $this->db->limit($limit,$offset);
        return $this->db->get('roles')->result_array();
    }

    public function list_roles(){
        return $this->db->get('roles')->result_array();
    }

    public function get_role($id){
        $this->db->where('role_id',$id);
        return $this->db->get('roles')->row_array();
    }

    public function edit_role($id,$data){
        $this->db->where('role_id',$id);
        if($this->db->update('roles',$data)) return true;
        return false;
    }

    public function count_admins($filter){
        if($filter['name']){
            $this->db->where('admin_name LIKE','%'.$filter['name'].'%');
        }
        if($filter['email']){
            $this->db->where('admin_email LIKE','%'.$filter['email'].'%');
        }
        if($filter['role']){
            $this->db->where('admins.role_id',$filter['role']);
        }
        if($filter['status']){
            $this->db->where('admin_status ',$filter['status']);
        } 
        $this->db->where('admin_status >',0);
        return $this->db->count_all_results('admins');
    }

    public function list_admins($limit,$offset,$filter){
        if($filter['name']){
            $this->db->where('admin_name LIKE','%'.$filter['name'].'%');
        }
        if($filter['email']){
            $this->db->where('admin_email LIKE','%'.$filter['email'].'%');
        }
        if($filter['role']){
            $this->db->where('admins.role_id',$filter['role']);
        }
        if($filter['status']){
            $this->db->where('admin_status ',$filter['status']);
        } 
        $this->db->select('admin_id,role_name,admin_name,admin_phone,admin_email,admin_username,admin_status');
        $this->db->join('roles','roles.role_id=admins.role_id','left');
        $this->db->order_by('admins.updated_on','desc');
        $this->db->where('admin_status >',0);
        $this->db->limit($limit,$offset);
        return $this->db->get('admins')->result_array();
    }

    public function get_admin($id){
        $this->db->where('admin_id',$id);
        return $this->db->get('admins')->row_array();
    }

    public function edit_admin($data,$id){
        $this->db->where('admin_id',$id);
        if($this->db->update('admins',$data)) return true;
        else return false;
    }

    public function count_tables($filter){
        $this->db->where('table_status',1);
         if($filter['name']) $this->db->where('table_name LIKE','%'.$filter['name'].'%');
        return $this->db->count_all_results('tables');
    }

    public function list_all_tables(){
        $this->db->select('table_id,table_name');
        $this->db->where('table_status',1);
        $this->db->order_by('table_name','desc');
        return $this->db->get('tables')->result_array();
    }


    
     public function list_all_tables_problem(){
        $this->db->select('table_id');

        //$this->db->join('tables','tables.table_id=problem_format.table_id','left');

        //$this->db->where('table_status',1);

        //$this->db->where('table_type','format');
        $this->db->group_by('problem_format.table_id');
        //$this->db->order_by('table_name','desc');
        $data= $this->db->get('problem_format')->result_array();

//print_r($data);exit();
        $table_array=array();

     if(!empty($data)){

        foreach ($data as $key => $value) {
            $this->db->select('table_id,table_name');
        $this->db->where('table_status',1);
        $this->db->where('table_id!=',$value['table_id']);
        $this->db->order_by('table_name','desc');
        $table_array= $this->db->get('tables')->result_array();


    }
}else{

        //foreach ($data as $key => $value) {
            $this->db->select('table_id,table_name');
        $this->db->where('table_status',1);
        //$this->db->where('table_id!=',$value['table_id']);
        $this->db->order_by('table_name','desc');
        $table_array= $this->db->get('tables')->result_array();


    //}
}

   // $arrImploded = implode( ‘,’ , $table_array);
//print_r($table_array);exit();

    return $table_array;
           
        }
    //}

       public function list_all_tables_format(){
        $this->db->select('tables.table_id,table_name');

        $this->db->join('tables','tables.table_id=problem_format.table_id','left');

        $this->db->where('table_status',1);

        //$this->db->where('table_type','format');
        $this->db->group_by('problem_format.table_id');
        $this->db->order_by('table_name','desc');
        return $this->db->get('problem_format')->result_array();
    }

    public function list_tables($limit,$offset,$filter){
        $this->db->select('table_id,table_name,table_columns,tables.updated_on,admin_name,table_single_width');
        $this->db->join('admins','admins.admin_id=tables.updated_by','left');
        $this->db->where('table_status',1);
           if($filter['name']) $this->db->where('table_name LIKE','%'.$filter['name'].'%');

        $this->db->order_by('table_name','asc');
        $this->db->limit($limit,$offset);
        return $this->db->get('tables')->result_array();
    }

    // public function get_tbl_img($id,$q_id){
    //     $this->db->where('table_id',$id);
    //      $this->db->where('table_id',$id);
    //     return $this->db->get('tables')->row_array();
    // }

    public function get_table($id,$q_id,$i){

       // $img=$this->AdminModel->get_tbl_img($id,$q_id);
        if($i!=0){
     $tab='table_id'.$i;
        }else{
$tab='table_id';
        }
                $this->db->select('tables.*,questions.table_img1,questions.table_img2,questions.table_img3,questions.table_img4,questions.table_img5,questions.table_img6,questions.table_img7,questions.table_img8,questions.table_img9');

             $this->db->join('questions','questions.'.$tab.'=tables.table_id','left');

            $this->db->where('tables.table_id',$id);
            $this->db->where('question_id',$q_id);
        return $this->db->get('tables')->row_array();

        
    }



    public function get_table_new($id){

        $this->db->where('table_id',$id);
        return $this->db->get('tables')->row_array();

    }

    public function get_table_by_id($id){

      $this->db->select('tables.*');
      $this->db->join('table_sub_column_width','tables.table_id=tables.table_id','left');

      $this->db->where('tables.table_id',$id);
      return $this->db->get('tables')->row_array();

    }

    // public function get_table_sub_width($id){
    //     $this->db->select('tables.*GROUP_CONCAT(pc_scr_table_sub_column_width.width) as width1');
    //   $this->db->join('table_sub_column_width','tables.table_id=tables.table_id','left');

    //   $this->db->where('tables.table_id',$id);
    //   return $this->db->get('tables')->row_array(); 
    // }
    public function get_answ_table($id,$q_id){
        $this->db->where('table_id',$id);
        $this->db->where('question_id',$q_id);
       return  $this->db->get('answer_table')->result_array();
         //echo $this->db->last_query();exit();
    }


    public function check_q_code($question_code){
        $this->db->where('question_code',$question_code);
         $data=$this->db->get('questions')->row_array();

         return $data['question_code']; 
    }

       public function get_ans_sub_table($id,$q_id){
        $this->db->where('ans_table_id',$id);
        $this->db->where('question_id',$q_id);
       return  $this->db->get('answer_table_sub')->result_array();
         echo $this->db->last_query();exit();
    }

    
    public function get_sub_answ_table($id,$q_id){
       $this->db->where('ans_table_id',$id);
        $this->db->where('question_id',$q_id);
       return  $this->db->get('answer_table_sub')->result_array();
         //echo $this->db->last_query();exit(); 
    }

      public function get_answ_table_new($id,$q_id){

        $this->db->where('table_id',$id);
        $this->db->where('question_id',$q_id);
       return  $this->db->get('answer_table')->result_array();
         //echo $this->db->last_query();exit();
    }


    public function list_answer_table($id){
        $this->db->where('table_id',$id);
         $data=$this->db->get('tables')->row_array();

         return $data['table_name'];
    }

    public function edit_table($data,$id){
        $this->db->where('table_id',$id);
        if($this->db->update('tables',$data)) return true;
        else return false;
    }

    public function count_courses($filter){
        if($filter['name']){
            $this->db->where('data_name LIKE','%'.$filter['name'].'%');
        }

        $this->db->where('data_status',1);
        $this->db->where('data_type',0);
        return $this->db->count_all_results('data');
    }

    public function list_courses($limit,$offset,$filter){
        if($filter['name']){
            $this->db->where('data_name LIKE','%'.$filter['name'].'%');
        }
        $this->db->select('data_id,data_name,data.updated_on,admin_name,data.updated_by');
        $this->db->join('admins','admins.admin_id=data.updated_by','left');
        $this->db->where('data_status',1);
        $this->db->where('data_type',0);
        $this->db->order_by('data_id','desc');
        $this->db->limit($limit,$offset);
        return $this->db->get('data')->result_array();
    }

    public function get_data($id){
        $this->db->where('data_id',$id);
        return $this->db->get('data')->row_array();
    }

    public function get_data_by_parent($id){
         $this->db->where('data_status',1);
        $this->db->where('data_parent',$id);
        return $this->db->get('data')->result_array();

    }


    public function list_all_data($type){
        //$this->db->where('data_id',$id);
        $this->db->where('data_status',1);
        $this->db->where('data_type',$type);
        return $this->db->get('data')->result_array();
    }

    public function update_course($id,$data){
        $this->db->where('data_id',$id);
        if($this->db->update('data',$data)) return true;
        else return false;
    }

    public function count_papers($id){
        $filter = $this->session->userdata('paper_filter');

        if($filter['name']){
            $this->db->where('data_name LIKE','%'.$filter['name'].'%');
        }

        $this->db->where('data_status',1);
        $this->db->where('data_type',1);
        $this->db->where('data_parent',$id);
        return $this->db->count_all_results('data');
    }

    public function list_papers($id,$limit,$offset){
        $filter = $this->session->userdata('paper_filter');

        if($filter['name']){
            $this->db->where('data_name LIKE','%'.$filter['name'].'%');
        }

        $this->db->select('data_id,data_name,data.updated_on,admin_name,data.updated_by,paper_icon');
        $this->db->join('admins','admins.admin_id=data.updated_by','left');
        $this->db->where('data_status',1);
        $this->db->where('data_type',1);
        $this->db->where('data_parent',$id);
        $this->db->order_by('data_id','desc');
        $this->db->limit($limit,$offset);
        return $this->db->get('data')->result_array();
    }

    public function count_chapters($id){
        $filter = $this->session->userdata('chapter_filter');

        if($filter['name']){
            $this->db->where('data_name LIKE','%'.$filter['name'].'%');
        }
        $this->db->where('data_status',1);
        $this->db->where('data_type',2);
        $this->db->where('data_parent',$id);
        return $this->db->count_all_results('data');
    }

    public function list_chapters($id,$limit,$offset){
        $filter = $this->session->userdata('chapter_filter');

        if($filter['name']){
            $this->db->where('data_name LIKE','%'.$filter['name'].'%');
        }
        $this->db->select('data_id,data_name,data.updated_on,admin_name,data.updated_by');
        $this->db->join('admins','admins.admin_id=data.updated_by','left');
        $this->db->where('data_status',1);
        $this->db->where('data_type',2);
        $this->db->where('data_parent',$id);
        $this->db->order_by('data_id','desc');
        $this->db->limit($limit,$offset);
        return $this->db->get('data')->result_array();
    }

    public function count_questions($id){
        $this->db->where('question_status',1);
        $this->db->where('chapter_id',$id);
        return $this->db->count_all_results('questions');
    }
    public function count_questions_new($filter){


        if($filter['name']){
            $this->db->where('question_code LIKE','%'.$filter['name'].'%');
        }
        // $this->db->where('question_status',1);
        // $this->db->where('chapter_id',$id);
        // return $this->db->count_all_results('questions');


        $this->db->select('question_id,question_code,question_title,qt_id,table_name,questions.updated_on,admin_name,questions.updated_by');
        $this->db->join('tables','tables.table_id=questions.table_id','left');
        $this->db->join('admins','admins.admin_id=tables.updated_by','left');
        $this->db->where('question_status',1);
        //$this->db->where('chapter_id',$id);
       // $this->db->order_by('question_id','desc');
       // $this->db->limit($limit,$offset);
        return $this->db->count_all_results('questions');
         //$data=$this->db->get('questions')->result_array();
    }

    public function list_questions($id,$limit,$offset){
        $this->db->select('question_id,question_code,question_title,qt_id,table_name,questions.updated_on,admin_name,questions.updated_by');
        $this->db->join('tables','tables.table_id=questions.table_id','left');
        $this->db->join('admins','admins.admin_id=tables.updated_by','left');
        $this->db->where('question_status',1);
        $this->db->where('chapter_id',$id);
        $this->db->order_by('question_id','desc');
        $this->db->limit($limit,$offset);
         $data=$this->db->get('questions')->result_array();
        $arr=array();
        foreach ($data as $key => $value) {
           $value['qt_ids']=$this->list_questions_ids($value['question_id']);
           array_push($arr, $value);
        }

        return $arr;
    }


     public function list_questions_ids($id){
        $this->db->select('qt_id');
        
        $this->db->where('question_id',$id);
        
        return $this->db->get('q_table')->result_array();
    }

    public function delete_keyword($id,$type){
        if($type == 'key') $this->db->where('keyword_id',$id);
        else $this->db->where('transaction_id',$id);
        if($this->db->delete('keywords')) return true;
        else return false;
    }


    public function delete_question($id){
         $this->db->where('question_id',$id);
         $data['question_status'] = 0;
        if($this->db->update('questions',$data)){
            return true;
        }
        else return false;
    }

    public function delete_admin($id){
         $this->db->where('admin_id',$id);
         $data['admin_status'] = 0;
        if($this->db->update('admins',$data)){
            return true;
        }
        else return false;
    }


    public function delete_table($id){
         $this->db->where('table_id',$id);
         $data['table_status'] = 0;
        if($this->db->update('tables',$data)){
            return true;
        }
        else return false;
    }

       public function delete_course($id){
         $this->db->where('data_id',$id);
         $this->db->where('data_type',0);
         $data['data_status'] = 0;
        if($this->db->update('data',$data)){
            return true;
        }
        else return false;
    }


    public function delete_paper($id){
        $this->db->where('data_id',$id);
         $this->db->where('data_type',1);
         $data['data_status'] = 0;
        if($this->db->update('data',$data)){
            return true;
        }
        else return false;
    }

      public function delete_chapter($id){
        $this->db->where('data_id',$id);
         $this->db->where('data_type',2);
         $data['data_status'] = 0;
        if($this->db->update('data',$data)){
            return true;
        }
        else return false;
    }


    

    

    public function update_keywords($data){
        // print_r($keyword_data);exit();
        if($this->db->update_batch('keywords', $data, 'keyword_id')) {
           
            return true;
        }
        else {return false; 
        }
    }

       public function update_keywords_by_id($data){
// print_r($data);
        $this->db->where('keyword_id',$data['keyword_id']);
       unset($data['keyword_id']);
        if($this->db->update('questions_tags',$data)) {
            // echo $this->db->last_query();
            return true;}
        else {
            return false;
        }
    }

    

    public function edit_trasaction($id,$data){
        $this->db->where('transaction_id',$id);
        if($this->db->update('transactions',$data)) return true;
        else return false;
    }

    public function delete_trasaction($id){
        $this->db->where('transaction_id',$id);
        if($this->db->delete('transactions')) return true;
        else return false;
    }
     public function delete_answers_rows($id,$table_id){
        $this->db->where('table_id',$table_id);
        $this->db->where('question_id',$id);
        if($this->db->delete('answer_table')) return true;
        else return false;
    }

      public function delete_answers_sub($id,$table_id){
        $this->db->where('ans_table_id',$table_id);
        $this->db->where('question_id',$id);
        if($this->db->delete('answer_table_sub')) return true;
        else return false;
    }




    public function delete_quest_table($table_id,$id){

        $this->db->where('question_id',$id);
        $this->db->where('qt_id',$table_id);
       // $this->db->join('question_table','question_table.qt_id=questions.qt_id','left');
        $res= $this->db->get('q_table')->row_array();

        $text=$res['text_id'];
        $trans=$res['transaction_id'];

        if($text==0 && $trans==''){


  $this->db->where('qt_id',$table_id);
  $this->db->where('question_id',$id);
        //$this->db->where('id',$trans['id']);
          $qry=$this->db->delete('q_table');

            
        }else{

             $data=array('qt_id'=>'0','quest_table_name'=>'');

        $this->db->where('question_id',$id);
            $this->db->where('qt_id',$table_id);
            $qry=$this->db->update('q_table',$data);

        }



       

//print_r(expression)
        if($qry){ 





            $this->db->where('qt_id',$table_id);
        $this->db->where('question_id',$id);
          $this->db->delete('vals');







            return true;
        }
        else{
        return false;
            }
    }

    public function delete_qt_table($id){
      $this->db->where('question_id',$id);
        if($this->db->delete('q_table')) return true;
        else return false;  
    }

    public function update_trasaction($data){
        if($this->db->update_batch('transactions', $data, 'transaction_id')) return true;
        else return false; 
    }

    public function get_question($id){
        $this->db->where('question_id',$id);
        $this->db->join('question_table','question_table.qt_id=questions.qt_id','left');
        return $this->db->get('questions')->row_array();
    }

    public function get_question_ids($id){
       $this->db->where('question_id',$id);
       $this->db->join('question_table','question_table.qt_id=q_table.qt_id','left');
        return $this->db->get('q_table')->result_array(); 
    }


    

    public function get_answer_img($id){
        $this->db->where('question_id',$id);
      //  $this->db->join('question_table','question_table.qt_id=questions.qt_id','left');
        return $this->db->get('answers')->result_array();
    }

    public function get_transaction_by_id($id){
        $this->db->select('transactions.transaction_id,transaction_title,transaction_helptext,transaction_image,GROUP_CONCAT(keyword_value SEPARATOR ";") as keywords, GROUP_CONCAT(keyword_id ) as keyword_ids,transaction_image');
        $this->db->where('transactions.transaction_id',$id);
        $this->db->join('keywords','keywords.transaction_id=transactions.transaction_id','left');
        return $this->db->get('transactions')->row_array();
    }

    public function get_transaction($id,$row){
        $this->db->where('rows',$row);
        $this->db->where('question_id',$id);
        return $this->db->get('transactions')->result_array();
    }



public function get_transaction_vals1($id,$value){
        // $this->db->where('rows',$row);
        // $this->db->where('question_id',$id);
        // $data=$this->db->get('transactions')->result_array();


        $questid=$this->session->userdata('qt_id');
     $this->db->where('pc_scr_transactions.question_id',$id);


        //$this->db->where('rows',$row);
         // $this->db->where('pc_scr_transactions.order_id',$order);
                  // $this->db->where('pc_scr_transactions.transaction_id',$value);


        

                      $this->db->join('problem_order','FIND_IN_SET(`pc_scr_transactions`.`transaction_id`,`pc_scr_problem_order`.`trans_val_id`)>0','left');

       //$this->db->join('problem_order','problem_order.trans_val_id=transactions.transaction_id','left');

        $data= $this->db->get('transactions')->result_array();
        
         // echo $this->db->last_query();

        //print_r(expression)

        foreach ($data as $key => $value) {
            $pid=$value['problem_val_id'];
            $ansid=$value['ans_val_id'];
             $anscolid=$value['ans_col_id'];
                        


            $problem_order=$this->get_problem_id($pid);
            //$ans_val=$this->get_ans_id($ansid);
            $data[$key]['format_id']=$problem_order['p_format_id'];
            $data[$key]['pr_help']=$problem_order['col_help_text'];
            $data[$key]['pr_keys']=$problem_order['col_keys'];
            $data[$key]['pr_help_img']=$problem_order['col_help_image'];




                        // $problem_order=$this->get_problem_format_det($problem_order['p_format_id']);

        $data[$key]['format_table_id']=$problem_order['table_id'];
        






            
        }

        return $data;






    }





      public function get_transaction_vals($id,$value,$order){
        // $this->db->where('rows',$row);
        // $this->db->where('question_id',$id);
        // $data=$this->db->get('transactions')->result_array();


        $questid=$this->session->userdata('qt_id');
     $this->db->where('pc_scr_transactions.question_id',$id);


        //$this->db->where('rows',$row);
         $this->db->where('pc_scr_transactions.order_id',$order);
                  // $this->db->where('pc_scr_transactions.transaction_id',$value);


        

                      $this->db->join('problem_order','FIND_IN_SET(`pc_scr_transactions`.`transaction_id`,`pc_scr_problem_order`.`trans_val_id`)>0','left');

       //$this->db->join('problem_order','problem_order.trans_val_id=transactions.transaction_id','left');

        $data= $this->db->get('transactions')->result_array();
        
         // echo $this->db->last_query();

        //print_r(expression)

        foreach ($data as $key => $value) {
            $pid=$value['problem_val_id'];
            $ansid=$value['ans_val_id'];
             $anscolid=$value['ans_col_id'];
                        


            $problem_order=$this->get_problem_id($pid);
            //$ans_val=$this->get_ans_id($ansid);
            $data[$key]['format_id']=$problem_order['p_format_id'];
            $data[$key]['pr_help']=$problem_order['col_help_text'];
            $data[$key]['pr_keys']=$problem_order['col_keys'];
            $data[$key]['pr_help_img']=$problem_order['col_help_image'];




                        // $problem_order=$this->get_problem_format_det($problem_order['p_format_id']);

        $data[$key]['format_table_id']=$problem_order['table_id'];
        






            
        }

        return $data;






    }

     public function get_transaction_new($id,$row){
        $this->db->where('transaction_id',$row);
        $this->db->where('question_id',$id);
        return $this->db->get('transactions')->result_array();
    }

    



    public function get_transaction_edit($id){
      //$this->db->where('rows',$row);
        $this->db->where('question_id',$id);
        return $this->db->get('transactions')->result_array();  
    }

    public function edit_question($data,$id){
        $this->db->where('question_id',$id);
        if($this->db->update('questions',$data)) return true;
        return false;
    }

    public function get_keywords($id){
        $this->db->where('transaction_id',$id);
        return $this->db->get('keywords')->result_array();
    }


     public function get_keywords_id($id){
        $this->db->where('transaction_id',$id);
        return $this->db->get('keywords')->row_array();
    }


    public function get_question_table_new($id){
         $this->db->where('question_id',$id);


 $this->db->join('question_table','question_table.qt_id=q_table.qt_id','left');
       return $this->db->get('q_table')->row_array();
    }

    public function get_question_table($id){



        $this->db->where('qt_id',$id);
       return $this->db->get('question_table')->row_array();
    }

    public function get_question_cols($id){
        $this->db->where('qt_id',$id);
        return $this->db->get('cols')->result_array();
    }

    // public function get_question_vals($id){
    //     $this->db->where('qt_id',$id);
    //     return $this->db->get('vals')->result_array();
    // }

       public function get_question_vals($id,$q_id,$orderid){
        $this->db->where('qt_id',$id);
                $this->db->where('question_id',$q_id);
                                $this->db->where('order_id',$orderid);


        return $this->db->get('vals')->result_array();
         echo $this->db->last_query();exit();
    }

    public function remove_qt($id,$table){
        $this->db->where('qt_id',$id);
        if($this->db->delete($table)) return true;
        else return false;
    }

    public function update_qt_vals($data,$id){
        $this->db->where('val_id',$id);
        if($this->db->update('vals',$data)) return true;
        else return false;
    }

    public function edit_keyword($id,$data){
        $this->db->where('transaction_id',$id);
        if($this->db->update('keywords',$data)) return true;
        else return false;
    }



    

    public function list_answers($id){
        $this->db->where('question_id',$id);
        return $this->db->get('answers')->result_array();
    }

    public function delete_answer($id){
        $this->db->where('answer_id',$id);
        if($this->db->delete('answers')) return true;
        else return false;
    }

    public function get_qt_by_id($id){

        //  $this->db->select('transactions.transaction_id,transaction_title,transaction_helptext,transaction_image,GROUP_CONCAT(keyword_value) as keywords, GROUP_CONCAT(keyword_id) as keyword_ids,transaction_image');
        // $this->db->where('transactions.transaction_id',$id);
        // $this->db->join('keywords','keywords.transaction_id=transactions.transaction_id','left');
        // return $this->db->get('transactions')->row_array();


        
         $this->db->where('val_id',$id);
        return $this->db->get('vals')->row_array();
    }


     public function insert_table_width($data){
        if($this->db->insert_batch('table_sub_column_width', $data)) return true;
        else return false; 
    }

    public function get_table_sub_width($table){
        $this->db->where('table_id',$table);
        return $this->db->get('table_sub_column_width')->result_array();
    }


    function get_table_header($table,$q_id){
        $this->db->where('answer_table_id',$table);
        $this->db->where('question_id',$q_id);
        return $this->db->get('answer_header')->row_array(); 
    }

    public function delete_sub_column($column,$table){
         $this->db->where('column_id',$column);
           $this->db->where('table_id',$table);
        if($this->db->delete('table_sub_column_width')) return true;
        else return false;
    }


    public function clone_question($course_id,$papr_id,$chpt_id,$id){
        $this->db->select('*');
        $this->db->where('question_id',$id);
        $data= $this->db->get('questions')->row_array();


        $data_table = array(
                    'question_code'=>$data['question_code'].'_copy',
                    'question_title'=>$data['question_title'],
                    'chapter_id'=>$chpt_id,
                //  'qt_id'=>$this->input->post('qt_id') ? $this->input->post('qt_id') : 0,
                    'table_id'=>$data['table_id'],
                    'table_img1'=>$data['table_img1'],
                    'table_id2'=>$data['table_id2'],
                    'table_img2'=>$data['table_img2'],
                    'table_id3'=>$data['table_id3'],
                    'table_img3'=>$data['table_img3'],
                    'table_id4'=>$data['table_id4'],
                    'table_img4'=>$data['table_img4'],
                    'table_id5'=>$data['table_id5'],
                    'table_img5'=>$data['table_img5'],
                    'table_id6'=>$data['table_id6'],
                    'table_img6'=>$data['table_img6'],
                    'table_id7'=>$data['table_id7'],
                    'table_img7'=>$data['table_img7'],

                    'table_id8'=>$data['table_id8'],
                    'table_img8'=>$data['table_img8'],
                    'table_id9'=>$data['table_id9'],
                    'table_img9'=>$data['table_img9'],
                    'question_status'=>$data['question_status'],

                    'created_on'=>time(),
                    'updated_on'=>time(),
                    'updated_by'=>$this->session->userdata('admin_id')
                );


        if($this->db->insert('questions',$data_table)) {
              $inserid= $this->db->insert_id();



               $this->db->select('*');
        $this->db->where('question_id',$id);
        $data_qt= $this->db->get('q_table')->result_array();

       

        foreach ($data_qt as $key => $value) {

        $qdat=array('question_id'=>$inserid,'qt_id'=>$value['qt_id']);
         if($this->db->insert('pc_scr_q_table',$qdat)) return $this->db->insert_id();
        else return 0; 
           
        }

        }
        else {return 0;}


       






    }

    function get_ins_phone($code,$id) 
    {
        if(!empty($id)){
            $this->db->where('institute_id != ',$id);
        }
        $fields = '*';
        $this->db->select($fields);
        
        $this->db->where('institute_phone',$code);
        $this->db->from('pc_scr_institutes');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }
    function get_ins_email($code,$id) 
    {
        if(!empty($id)){
            $this->db->where('institute_id != ',$id);
        }
        $fields = '*';
        $this->db->select($fields);
        
        $this->db->where('institute_email',$code);
        $this->db->from('pc_scr_institutes');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }
    public function get_institute($id){
        $this->db->where('institute_id',$id);
        return $this->db->get('institutes')->row_array();
    }
    function get_ins_user_phone($code,$id) 
    {
        if(!empty($id)){
            $this->db->where('id != ',$id);
        }
        $fields = '*';
        $this->db->select($fields);
        
        $this->db->where('phone',$code);
        $this->db->from('pc_scr_institute_users');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }
    function get_ins_user_email($code,$id) 
    {
        if(!empty($id)){
            $this->db->where('id != ',$id);
        }
        $fields = '*';
        $this->db->select($fields);
        
        $this->db->where('email',$code);
        $this->db->from('pc_scr_institute_users');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }
    function get_ins_user_username($code,$id) 
    {
        if(!empty($id)){
            $this->db->where('id != ',$id);
        }
        $fields = '*';
        $this->db->select($fields);
        
        $this->db->where('username',$code);
        $this->db->from('institute_users');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }
    public function get_institute_user($id){
        $this->db->where('id',$id);
        return $this->db->get('institute_users')->row_array();
    }


     public function get_question_ids_by_id($id){

       $this->db->where('question_id',$id);
       $this->db->join('tables','tables.table_id=q_table.qt_id','left');
       return  $this->db->get('q_table')->result_array(); 
         echo $this->db->last_query();exit();
    }



    function add_question_text($data){

         if($this->db->insert('questions_text',$data)) {
        // echo $this->db->last_query();exit(); 
              return $this->db->insert_id();

        }
        else {return 0;}


        // $this->db->select('*');
        // $this->db->where('question_id',$id);
        // $data= $this->db->get('questions_text')->row_array();


 }

   function update_question_text($data,$id,$order){


        $this->db->where('question_id',$id);
        $this->db->where('order_id',$order);


        if($this->db->update('questions_text',$data)) return true;
        else return false;
    } 

        function check_question_text($order,$id){


        $this->db->select('*');
        $this->db->where('question_id',$id);
                $this->db->where('order_id',$order);

        $data= $this->db->get('questions_text')->row_array();
                // echo $this->db->last_query();exit(); 
 
        return $data;


 }

         function check_question_priority($order,$id,$type){


        $this->db->select('*');
        $this->db->where('question_id',$id);
                $this->db->where('order_id',$order);

        $data= $this->db->get('q_table')->row_array();

       // print_r($data);exit();


        $priority=$data['priority'];
        if($priority!=''){
                $priorityss = explode(',' ,$priority);
                if (in_array($type, $priorityss))
    {
      return false;  
    }else{
       $dats=$priority.','.$type;
    }






        }else{
           $dats=$type;
        }
                // echo $this->db->last_query();exit(); 
 
        return $dats;


        }


 


 function check_question_table($order,$id){


        $this->db->select('*');
        $this->db->where('question_id',$id);
        $this->db->where('order_id',$order);
              
        $data= $this->db->get('q_table')->row_array();
                // echo $this->db->last_query();exit(); 
 
        return $data;


 }

  function update_question_table($data,$id,$order){


        $this->db->where('question_id',$id);
        $this->db->where('order_id',$order);


        if($this->db->update('q_table',$data)) return true;
        else return false;
    } 

    public function get_format_by_table($table,$q_id,$col,$row,$sub){
        $this->db->where('table_id',$table);
                // $this->db->where('question_id',$q_id);
                        $this->db->where('column_id',$col);
                                $this->db->where('row_id',$row);
                     $this->db->where('sub_id',$sub);




        return $this->db->get('problem_format_values')->result_array();
    }

    function edit_format_values($data,$id,$q_id,$col,$row,$sub){

        $this->db->where('table_id',$id);
                // $this->db->where('question_id',$q_id);

                $this->db->where('column_id',$col);
                                $this->db->where('row_id',$row);
                                 $this->db->where('sub_id',$sub);
                                 


        if($this->db->update('problem_format_values',$data)) return true;
        else return false;

    }

      function edit_order($id,$data,$type){

        // $this->db->where('order_id',$id);
        //         // $this->db->where('question_id',$q_id);

        //         // $this->db->where('column_id',$col);
        //         //                 $this->db->where('row_id',$row);
        //         //                  $this->db->where('sub_id',$sub);
                                 


        // if($this->db->update('problem_order',$data)) return true;
        // else return false;


           $this->db->select('quest_val_id,trans_val_id,problem_val_id,ans_val_id');
        $this->db->where('order_id',$id);
           
        $data1= $this->db->get('problem_order')->row_array();


        if($type=='quest'){


        $result_string=$data1['quest_val_id'].','.$data['quest_val_id'];
          $data2=array(
            'quest_val_id'=>$result_string
        );
    }else if($type=='problem'){
               $result_string=$data1['problem_val_id'].','.$data['problem_val_id'];
                 $data2=array(
            'problem_val_id'=>$result_string
        );
 
    }else if($type=='ans'){
               $result_string=$data1['ans_val_id'].','.$data['ans_val_id'];
                 $data2=array(
            'ans_val_id'=>$result_string
        );
 
    }

//print_r($result_string);exit();
      



         $this->db->where('order_id',$id);
        if($this->db->update('problem_order',$data2)) return true;
        else return false;

    }

      public function get_problem_format($q_id){
        //$this->db->where('table_id',$table);
                $this->db->where('question_id',$q_id);
                        //$this->db->where('column_id',$col);
                       // $this->db->where('row_id',$row);



        return $this->db->get('problem_format')->result_array();
    }

     function get_problem_values($table,$q_id){
        $this->db->where('table_id',$table);
        $this->db->where('question_id',$q_id);
                        // $this->db->where('column_id',$col);
                        //         $this->db->where('row_id',$row);



        return $this->db->get('problem_format_values')->result_array();
    }


     function get_problem_format_orders($q_id){
       // $this->db->where('table_id',$table);
        $this->db->where('question_id',$q_id);
                        // $this->db->where('column_id',$col);
                        //         $this->db->where('row_id',$row);



        return $this->db->get('problem_order')->result_array();
    }


    


       function get_problem_values_modify($table){
        $this->db->where('table_id',$table);
        // $this->db->where('question_id',$q_id);
                        // $this->db->where('column_id',$col);
                        //         $this->db->where('row_id',$row);



      return   $this->db->get('problem_format_values')->result_array();
echo $this->db->last_query();exit();
    }


       function get_problem_values_row_count($table){
        $this->db->select('COUNT(DISTINCT row_id) as rowcount');


        
        $this->db->where('table_id',$table);
        // $this->db->where('question_id',$q_id);
                        // $this->db->where('column_id',$col);
                        //         $this->db->where('row_id',$row);



        return $this->db->get('problem_format_values')->row_array();
    }

     function get_question_text_id($id){


         $this->db->where('text_id',$id);
              //  $this->db->where('question_id',$q_id);
                        // $this->db->where('column_id',$col);
                        //         $this->db->where('row_id',$row);



        return $this->db->get('questions_text')->row_array();

    }

      public function get_question_vals_new($id){

        $this->db->where('qt_id',$id);

       // $this->db->where('qt_id',$id);
        return $this->db->get('vals')->result_array();
    }


     public function check_data($qid,$table,$row){

        $this->db->where('question_id',$qid);
        $this->db->where('table_id',$table);

        $this->db->where('table_row',$row);


       // $this->db->where('qt_id',$id);
        return $this->db->get('answer_table')->row_array();
    }




   public function check_answer_data_row($qid,$table,$row){

        $this->db->where('question_id',$qid);
        $this->db->where('table_id',$table);

        $this->db->where('table_row',$row);


       // $this->db->where('qt_id',$id);
        $data= $this->db->get('answer_table')->row_array();

// print_r($data)
         $this->db->where('question_id',$qid);
        $this->db->where('ans_table_id',$table);
        $this->db->where('rows',$row);
        
        

       // $this->db->where('qt_id',$id);
        $data1= $this->db->get('answer_table_sub')->row_array();

        if(!empty($data)||!empty($data1)){
            return true;
        }else{
            return false;
        }
    }
      public function check_answer_data($qid,$table){

        $this->db->where('question_id',$qid);
        $this->db->where('table_id',$table);

        // $this->db->where('table_row',$row);


       // $this->db->where('qt_id',$id);
        $data= $this->db->get('answer_table')->row_array();

// print_r($data)
         $this->db->where('question_id',$qid);
        $this->db->where('ans_table_id',$table);
        
        

       // $this->db->where('qt_id',$id);
        $data1= $this->db->get('answer_table_sub')->row_array();

        if(!empty($data)||!empty($data1)){
            return true;
        }else{
            return false;
        }
    }


    


    public function check_data_header($qid,$table){

        $this->db->where('question_id',$qid);
        $this->db->where('answer_table_id',$table);

       // $this->db->where('table_row',$row);


       // $this->db->where('qt_id',$id);
        return $this->db->get('answer_header')->row_array();
    }


        public function check_data_sub($qid,$table,$row,$sub,$column_id){
        $this->db->where('question_id',$qid);
        $this->db->where('ans_table_id',$table);
        $this->db->where('rows',$row);
        $this->db->where('sub_id',$sub);
             $this->db->where('column_id',$column_id);
        

       // $this->db->where('qt_id',$id);
        return $this->db->get('answer_table_sub')->row_array();
    }




       public function list_questions_new($limit,$offset,$filter){
        $this->db->select('question_id,question_code,question_title,qt_id,table_name,questions.updated_on,admin_name,questions.updated_by');
        $this->db->join('tables','tables.table_id=questions.table_id','left');
        $this->db->join('admins','admins.admin_id=tables.updated_by','left');
        $this->db->where('question_status',1);

         if($filter['name']){
            $this->db->where('question_code LIKE','%'.$filter['name'].'%');
        }

        //$this->db->where('chapter_id',$id);
        $this->db->order_by('question_id','desc');
        $this->db->limit($limit,$offset);
         $data=$this->db->get('questions')->result_array();
         //echo $this->db->last_query();exit(); 
        $arr=array();
        foreach ($data as $key => $value) {
           $value['qt_ids']=$this->list_questions_ids($value['question_id']);

             $this->db->where('question_id',$value['question_id']);
            $tags = $this->db->get('questions_tags')->result_array();
            // echo $this->db->last_query();
            // print_r($tags);
            $ptag = array();
            foreach ($tags as $tag) {
                $ptag[] = $tag['tag'];
            }
            $value['tags']  = implode(',', $ptag);


           array_push($arr, $value);
        }

        return $arr;
    }

        function edit_answer_values($data,$q_id,$id,$row){

        $this->db->where('table_id',$id);
                $this->db->where('question_id',$q_id);
                                $this->db->where('table_row',$row);



        if($this->db->update('answer_table',$data)){
            return true;

           // echo $this->db->last_query();exit(); return true;

        } 
        else {return false;
        }

    }


      function edit_header_data($data,$q_id,$table){

        $this->db->where('answer_table_id',$table);
                $this->db->where('question_id',$q_id);
                             //   $this->db->where('table_row',$row);



        if($this->db->update('answer_header',$data)){
            return true;

           // echo $this->db->last_query();exit(); return true;

        } 
        else {return false;
        }

    }






                  function edit_answer_values_sub($data,$q_id,$id,$row,$sub,$coulumn){
        $this->db->where('ans_table_id',$id);
                $this->db->where('question_id',$q_id);
                                $this->db->where('rows',$row);
                                 $this->db->where('sub_id',$sub);
                                  $this->db->where('sub_id',$sub);
                                  $this->db->where('column_id',$coulumn);
        if($this->db->update('answer_table_sub',$data)){
            return true;
           // echo $this->db->last_query();exit(); return true;
        } 
        else {return false;
        }
    }


      function edit_answer_underline($q_id,$data){

        $this->db->where('id',$q_id);
                // $this->db->where('question_id',$q_id);
                //                 $this->db->where('table_row',$row);



        if($this->db->update('answer_table',$data)){
            return true;

           // echo $this->db->last_query();exit(); return true;

        } 
        else {return false;
        }

    }


    function edit_anssub_vals($q_id,$data){

        $this->db->where('id',$q_id);
                // $this->db->where('question_id',$q_id);
                //                 $this->db->where('table_row',$row);



        if($this->db->update('answer_table_sub',$data)){
            return true;

           // echo $this->db->last_query();exit(); return true;

        } 
        else {return false;
        }

    }



     function edit_format_underline($q_id,$data){

        $this->db->where('format_id',$q_id);
                // $this->db->where('question_id',$q_id);

                
                                 


        if($this->db->update('problem_format_values',$data)) return true;
        else return false;

    }


     public function add_keywords_question($data){
        if($this->db->insert('questions_tags',$data)) return true;
        else return 0; 
    }


     function get_question_vals_count($id,$q_id,$orderid){
        $this->db->select('COUNT(DISTINCT row_no) as rowcount');


        
        $this->db->where('qt_id',$id);
        $this->db->where('question_id',$q_id);
         $this->db->where('order_id',$orderid);
                        // $this->db->where('column_id',$col);
                        //         $this->db->where('row_id',$row);



        return $this->db->get('vals')->row_array();
    }




 public function get_question_vals_view_web($id,$order,$questid){
                // $questid=$this->session->userdata('qt_id');
                $this->db->where('pc_scr_vals.question_id',$questid);


        $this->db->where('qt_id',$id);
                                        $this->db->where('pc_scr_vals.order_id',$order);

              $this->db->join('problem_order','FIND_IN_SET(`pc_scr_vals`.`val_id`,`pc_scr_problem_order`.`quest_val_id`)>0','left');


       //$this->db->join('problem_order','problem_order.quest_val_id=vals.val_id','left');

          $this->db->group_by('val_id');
        $data= $this->db->get('vals')->result_array();
        
       // echo $this->db->last_query();


        //print_r(expression)

        foreach ($data as $key => $value) {
            $pid=$value['problem_val_id'];
            $ansid=$value['ans_val_id'];
             $anscolid=$value['ans_col_id'];
                        


            $problem_order=$this->get_problem_id($pid);
            //$ans_val=$this->get_ans_id($ansid);
            $data[$key]['format_id']=$problem_order['p_format_id'];
            $data[$key]['pr_help']=$problem_order['col_help_text'];
            $data[$key]['pr_keys']=$problem_order['col_keys'];
            $data[$key]['pr_help_img']=$problem_order['col_help_image'];




                        // $problem_order=$this->get_problem_format_det($problem_order['p_format_id']);

        $data[$key]['format_table_id']=$problem_order['table_id'];






            
        }

        return $data;
    }

    public function get_question_vals_view($id,$order){
                $questid=$this->session->userdata('qt_id');
                $this->db->where('pc_scr_vals.question_id',$questid);


        $this->db->where('qt_id',$id);
                                        $this->db->where('pc_scr_vals.order_id',$order);

              $this->db->join('problem_order','FIND_IN_SET(`pc_scr_vals`.`val_id`,`pc_scr_problem_order`.`quest_val_id`)>0','left');


       //$this->db->join('problem_order','problem_order.quest_val_id=vals.val_id','left');

          $this->db->group_by('val_id');
        $data= $this->db->get('vals')->result_array();
        
       // echo $this->db->last_query();


        //print_r(expression)

        foreach ($data as $key => $value) {
            $pid=$value['problem_val_id'];
            $ansid=$value['ans_val_id'];
             $anscolid=$value['ans_col_id'];
                        


            $problem_order=$this->get_problem_id($pid);
            //$ans_val=$this->get_ans_id($ansid);
            $data[$key]['format_id']=$problem_order['p_format_id'];
            $data[$key]['pr_help']=$problem_order['col_help_text'];
            $data[$key]['pr_keys']=$problem_order['col_keys'];
            $data[$key]['pr_help_img']=$problem_order['col_help_image'];




                        // $problem_order=$this->get_problem_format_det($problem_order['p_format_id']);

        $data[$key]['format_table_id']=$problem_order['table_id'];






            
        }

        return $data;
    }




    // function get_problem_format_det($id){

    //        $this->db->select('p_format_id,table_id');


    //      $this->db->where('format_id',$id);
    //    // $this->db->join('problem_order','problem_order.quest_val_id=vals.val_id','left');

    //     $data= $this->db->get('problem_format_values')->row_array();
    //     return $data;



    //       }


   function get_problem_id($id){

                $this->db->select('p_format_id,table_id,col_help_text,col_keys,col_help_image');


         $this->db->where('format_id',$id);
       // $this->db->join('problem_order','problem_order.quest_val_id=vals.val_id','left');

        $data= $this->db->get('problem_format_values')->row_array();
        return $data;


    }


     public function get_table_view($id,$q_id){

       // $img=$this->AdminModel->get_tbl_img($id,$q_id);
//         if($i!=0){
//      $tab='table_id'.$i;
//         }else{
// $tab='table_id';
//         }
                $this->db->select('tables.*');

             // $this->db->join('questions','questions.'.$tab.'=tables.table_id','left');

            $this->db->where('tables.table_id',$id);
           // $this->db->where('question_id',$q_id);
        return $this->db->get('tables')->row_array();

       



    }


  public function get_checkformat($table,$qid){

        $this->db->where('question_id',$qid);
        $this->db->where('table_id',$table);



       // $this->db->where('qt_id',$id);
        return $this->db->get('problem_format')->row_array();
        //echo $this->db->last_query();exit();
    }


      public function list_images(){
        $this->db->order_by('id','desc');
        $results = $this->db->get('chapter_image')->result_array();
        return $results;
    }


    public function remove_order_pr_vals($q_val,$orderid){

           $this->db->select('problem_val_id');
        $this->db->where('order_id',$orderid);
           
        $data1= $this->db->get('problem_order')->row_array();
        $result_string=$this->removeFromString($data1['problem_val_id'],$q_val);

        $data=array(
            'problem_val_id'=>$result_string
        );



         $this->db->where('order_id',$orderid);
        if($this->db->update('problem_order',$data)) return true;
        else return false;
    }

    public function remove_order_qst_vals($q_val,$orderid){

           $this->db->select('quest_val_id');
        $this->db->where('order_id',$orderid);
           
        $data1= $this->db->get('problem_order')->row_array();
        $result_string=$this->removeFromString($data1['quest_val_id'],$q_val);

        $data=array(
            'quest_val_id'=>$result_string
        );



         $this->db->where('order_id',$orderid);
        if($this->db->update('problem_order',$data)) return true;
        else return false;
    }

    public function remove_order_trans_vals($q_val,$orderid){

           $this->db->select('trans_val_id');
        $this->db->where('order_id',$orderid);
           
        $data1= $this->db->get('problem_order')->row_array();
        $result_string=$this->removeFromString($data1['trans_val_id'],$q_val);

        $data=array(
            'trans_val_id'=>$result_string
        );



         $this->db->where('order_id',$orderid);
        if($this->db->update('problem_order',$data)) return true;
        else return false;
    }


    public function remove_order_ans_vals($q_val,$orderid){

           $this->db->select('ans_val_id');
        $this->db->where('order_id',$orderid);
           
        $data1= $this->db->get('problem_order')->row_array();
        $result_string=$this->removeFromString($data1['ans_val_id'],$q_val);

        $data=array(
            'ans_val_id'=>$result_string
        );



         $this->db->where('order_id',$orderid);
        if($this->db->update('problem_order',$data)) return true;
        else return false;
    }

    

    


    


       function removeFromString($str, $item) {
    $parts = explode(',', $str);

    while(($i = array_search($item, $parts)) !== false) {
        unset($parts[$i]);
    }

    return implode(',', $parts);
}





public function delete_answer_row($id,$table_id,$q_id){
        $this->db->where('table_id',$table_id);
        $this->db->where('question_id',$q_id);
        $this->db->where('table_row',$id);
        if($this->db->delete('answer_table')){
            //echo $this->db->last_query();exit();
           return true; 
       }else{
        return false;
       } 
    }

     public function delete_answer_sub_row($id,$table_id,$q_id){
        $this->db->where('ans_table_id',$table_id);
        $this->db->where('question_id',$q_id);
        $this->db->where('rows',$id);
        if($this->db->delete('answer_table_sub')) return true;
        else return false;
    }



       function get_interactive_question($id,$type){
        $this->db->where('type',$type);
        $this->db->where('value_id',$id);
                        // $this->db->where('column_id',$col);
                        //         $this->db->where('row_id',$row);



        return $this->db->get('interactive_questions')->row_array();
    }


     public function add_sub_qst_insert($data,$table){
           $data_sub=array();
          //print_r($data);exit();
        foreach ($data as $key => $value) {

            //foreach ($value['val_value'] as $key1 => $value_val) {
               $value1['val_value']=$value['val_value'];
               $value1['sub_id']=$value['sub_id'];
               // echo json_encode($value['sub_line'][$key1]);

               // $value1['is_underline']=$value['sub_line'][$key1];
               
               $value1['col_no']=$value['col_no'];
               $value1['question_id']=$value['question_id'];

               // $value1['ans_table_id']=$value['table_id'];
               $value1['row_no']=$value['row_no'];
                $value1['order_id']=$value['order_id'];
               $value1['qt_id']=$value['qt_id'];
               array_push($data_sub, $value1);

            //}

           
        }
        // exit();


    
        if($this->db->insert_batch($table,$data_sub)) return $this->db->insert_id();
         else return 0;
    }

     public function add_sub_qst_insert_new($data,$table){
           $data_sub=array();
$cont=sizeof($data);
$key_insert=$cont-1;
        //print_r($data[1]);
           


        foreach ($data[0] as $key => $value) {

            //foreach ($value['val_value'] as $key1 => $value_val) {
               $value1['val_value']=$value['val_value'];
               $value1['sub_id']=$value['sub_id'];
               // echo json_encode($value['sub_line'][$key1]);

               // $value1['is_underline']=$value['sub_line'][$key1];
               $value1['order_id']=$value['order_id'];

               
               $value1['col_no']=$value['col_no'];
               $value1['question_id']=$value['question_id'];

               // $value1['ans_table_id']=$value['table_id'];
               $value1['row_no']=$value['row_no'];
               $value1['qt_id']=$value['qt_id'];
               array_push($data_sub, $value1);

            //}

           
        }
        // exit(); 

    
        if($this->db->insert_batch($table,$data_sub)) return $this->db->insert_id();
         else return 0;


         //return true;
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
        // $this->db->where("(teacher_id=".$this->session->userdata('admin_id')." OR (teacher_id='NULL'))");
        // $this->db->join('presentation_topic','presentation_topic.topic_id = chapter_design.type_id AND chapter_design.type = 1','left');

        // $this->db->join('questions','questions.question_id = chapter_design.type_id AND chapter_design.type = 2','left');
        
        $this->db->join('admins','admins.admin_id=chapter_design.updated_by','left');
        $this->db->join('chapter_content_publish','chapter_content_publish.chapter_content_id=chapter_design.id','left');

        $this->db->from('chapter_design');
        $this->db->order_by('chapter_design.id','desc');
        $this->db->limit($limit,$offset);
        $query = $this->db->get();
         $result = $query->result_array();
       
        // if($this->session->userdata('teacher_id') == '35'){
                // print_r($result);
        // }
        return $result ;
        
    }
    public function get_problem_solving($id){
        $this->db->select('question_id,question_title');
        $this->db->where('question_status',1);
        //$this->db->where('chapter_id',$id);
        return $this->db->get('questions')->result_array();
    }


 public function delete_question_tags($id){
        $this->db->where('question_id',$id);
        if($this->db->delete('questions_tags')) return true;
        else return false;
    }

     public function get_problem_solving_id($id){
        $this->db->where('question_id',$id);
        $this->db->where('question_status >',0);
        $result  =  $this->db->get('questions')->row_array();
        
        $this->db->where('question_id',$id);
        $tags = $this->db->get('questions_tags')->result_array();
        $tg = array();
        foreach ($tags as $tag) {
            $tg[] = $tag['tag'];
        }
      $result['tags']  = implode(",", $tg);

        return $result;



        //   $sql = "SELECT pc_scr_presentation.presentation_id,presentation_title,presentation_status, GROUP_CONCAT(pc_scr_presentation_tags.tag SEPARATOR ',') keywords, GROUP_CONCAT(pc_scr_presentation_tags.presentation_tag_id SEPARATOR ',') keywords_id FROM pc_scr_presentation INNER JOIN pc_scr_presentation_tags ON FIND_IN_SET(pc_scr_presentation_tags.presentation_tag_id, pc_scr_presentation_tags.tag) > 0 where pc_scr_presentation.presentation_id = ? ";
        // return $this->db->query($sql,array($id))->row_array();
    }
    public function get_presentation_topic($id){
        $this->db->select('topic_id,topic_title');
        $this->db->where('topic_status',1);
        $this->db->where('topic_parent',0);
        $this->db->where('user_id',0);
        $this->db->where('topic_presentation_id',$id);
        return $this->db->get('presentation_topic')->result_array();
    }
    public function get_presentation(){
        $this->db->select('presentation_id,presentation_title');
        $this->db->where('presentation_status',1);
        return $this->db->get('presentation')->result_array();
    }

    public function delete_chapter_design($id){
        $this->db->where('id',$id);
         
         $data['status'] = 0;
        if($this->db->update('chapter_design',$data)){
            return true;
        }
        else return false;
    }



        public function get_quest_table_new($id,$q_id){

        $this->db->where('qt_id',$id);
        $this->db->where('question_id',$q_id);
       return  $this->db->get('vals')->result_array();
         //echo $this->db->last_query();exit();
    }

    

     public function delete_question_rows($id,$table_id){
        $this->db->where('qt_id',$table_id);
        $this->db->where('question_id',$id);
        if($this->db->delete('vals')) return true;
        else return false;
    }


    public function edit_qst_values($id,$data){
        $this->db->where('val_id',$id);
        if($this->db->update('vals',$data))  return true;
        return false;
    }


    public function edit_prblem_name($q_id,$table,$data){
        $this->db->where('question_id',$q_id);
        $this->db->where('table_id',$table);
        if($this->db->update('problem_format',$data)) return true;
        return false;
    }

        public function edit_qst_values_new($column,$row,$sub,$table,$data){
             $q_id=$this->session->userdata('qt_id');


        $this->db->select('val_id');
        $this->db->where('question_id',$q_id);
        $this->db->where('col_no',$column);
        $this->db->where('row_no',$row);
        $this->db->where('sub_id',$sub);
        $this->db->where('qt_id',$table);
              
        $data1= $this->db->get('vals')->row_array();

        //print_r($data1);




           
        $this->db->where('question_id',$q_id);
        $this->db->where('col_no',$column);
        $this->db->where('row_no',$row);
        $this->db->where('sub_id',$sub);
        $this->db->where('qt_id',$table);
        if($this->db->update('vals',$data)) return $data1['val_id'];
        return false;
    }


    

     public function delete_problem_format($id){
        $this->db->where('p_format_id',$id);
        if($this->db->delete('problem_format')) return true;
        else return false;
    }
    public function delete_problem_format_row($id,$table){


          $this->db->select('MAX(row_id)as row');
        // $this->db->where('qt_id',$table);
        $this->db->where('table_id',$table);
              
        $data= $this->db->get('problem_format_values')->row_array();

        //print_r($data);exit();


        $this->db->where('row_id',$data['row']);
        // $this->db->where('qt_id',$table);
                $this->db->where('table_id',$table);

        if($this->db->delete('problem_format_values')) return true;
        else return false;


        // $this->db->where('row_id',$id);
        // $this->db->where('table_id',$table);
        // if($this->db->delete('problem_format_values')) return true;
        // else return false;
    }


     public function delete_question_row($id,$table,$qid,$order){





        // $this->db->select('MAX(row_no)as row');
        // $this->db->where('qt_id',$table);
        // $this->db->where('question_id',$qid);
        //                 $this->db->where('order_id',$order);

              
        // $data= $this->db->get('vals')->row_array();

        //print_r($data);exit();


$data=array('val_status'=>1);



        $this->db->where('row_no',$id);
        $this->db->where('qt_id',$table);
                $this->db->where('order_id',$order);

        $this->db->where('question_id',$qid);
       if($this->db->update('vals',$data)) return true;
        return false;
    }




        public function delete_ans_order($order_id,$qid){

        // $data=array('qt_id'=>'0');

        // $this->db->where('table_id',$id);
        //     $this->db->where('qt_id',$table_id);

//print_r(expression)
        //if($this->db->update('q_table',$data)){ 


        //     $this->db->where('table_id',$table_id);
        // $this->db->where('question_id',$id);
        //   $this->db->delete('answer_table');


          $this->db->where('order_id',$order_id);
        $this->db->where('question_id',$qid);
          $this->db->delete('problem_order');

            return true;
        
    }


    public function delete_ans_table($table_id,$id){

        // $data=array('qt_id'=>'0');

        // $this->db->where('table_id',$id);
        //     $this->db->where('qt_id',$table_id);

//print_r(expression)
        //if($this->db->update('q_table',$data)){ 


            $this->db->where('table_id',$table_id);
        $this->db->where('question_id',$id);
          $this->db->delete('answer_table');


          $this->db->where('ans_table_id',$table_id);
        $this->db->where('question_id',$id);
          $this->db->delete('answer_table_sub');







            return true;
        // }
        // else{
        // return false;
        //     }
    }
    

    function check_transaction_table($order,$id){


        $this->db->select('*');
        $this->db->where('question_id',$id);
        $this->db->where('order_id',$order);
              
        $data= $this->db->get('q_table')->row_array();
                // echo $this->db->last_query();exit(); 
 
        return $data;


 }
    public function reset_password($cur_pass,$new_pass){
        $this->session->userdata('admin_id');
        $this->db->select('*');
        $this->db->where('admin_id',$this->session->userdata('admin_id'));
        
        $data = $this->db->get('admins')->row_array();
        if(password_verify($cur_pass,$data['admin_password']))
        {
            $data = array(
                'admin_password'=>password_hash($new_pass,PASSWORD_DEFAULT),
                );
             $this->db->where('admin_id',$this->session->userdata('admin_id'));
             if($this->db->update('admins',$data)){
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
    function get_admin_username($code,$id) 
    {
        if(!empty($id)){
            $this->db->where('admin_id != ',$id);
        }
        $fields = '*';
        $this->db->select($fields);
        
        $this->db->where('admin_username',$code);
        $this->db->from('admins');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }
    public function get_ins_course($id){
        $this->db->where('institute_id',$id);
        return $this->db->get('ins_course')->result_array();
    }


    
}
?>