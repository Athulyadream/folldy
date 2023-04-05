<?php

class Dblog {
	
	function __construct() {
		date_default_timezone_set('Asia/Kolkata');
    }

    function userData(){
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

		return "Agent = ".$agent."\n\nPlatform = ".$platform."\n\nIP Address = ".$CI->input->ip_address()."\n\nSession = ".session_id()."\n\nDate = ".date('Y-m-d H:i:s'); 

	}
	
	function logCron($data){
		$CI = & get_instance();
		$filepath = APPPATH . 'logs/admin/cron.log';
		try{
            $handle = fopen($filepath, "a+");
			fwrite($handle, $data . "\n=======\n\n");
			fclose($handle);
			return true;
        }
        catch(Exception $e){
			return false;
        }
	}

    function logQueries($type,$id) {
		$CI = & get_instance();
		//$filepath = APPPATH . 'logs/'.$type.'/Query-log-' . date('Y-m-d') . '.log';
		$filepath = APPPATH . 'logs/'.$type.'/'.date('Y-m-d').'--uid--'.$id.'.log';
		//$handle = fopen($filepath, "a+");
		$times = $CI->db->query_times;
		$queries = $CI->db->queries;
        foreach ($queries as $key => $query) {
        	$log = $this->userData();
        	 $table = 'pc_scr_logs';
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
            $log .= "\n\nQuery = ".$query."\n\nExecution Time = " . $times[$key];
            //fwrite($handle, $log . "\n=======\n\n");
	        $data = array(
	        	'action' =>$query , 
	        	'agent' =>$agent , 
	        	'platform' =>$platform , 
	        	'IP' =>$CI->input->ip_address() ,
	        	'type'=>$type,  
	        	'session' =>session_id() , 
	        	'date' =>date('Y-m-d H:i:s') , 
	        	'username' =>$id , 
        	);
       
			if(!empty($data) && !empty($table)){
				$CI->db->insert($table,$data);
			}
        }
		//fclose($handle);
    }

    function ApiLog($out){
    	$CI = & get_instance();
		//$filepath = APPPATH . 'logs/'.$type.'/Query-log-' . date('Y-m-d') . '.log';
		$filepath = APPPATH . 'logs/api/'.date('Y-m-d').'.log';
		//$handle = fopen($filepath, "a+");
		$times = $CI->db->query_times;
		$queries = $CI->db->queries;
		 $table = 'pc_scr_logs';
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
        foreach ($queries as $key => $query) {
        	$log = $this->userData();
            $log .= "\n\nQuery = ".$query."\n\nExecution Time = " . $times[$key]."\n\n";
            $log .= json_encode($out);
           // fwrite($handle, $log . "\n=======\n\n");

            $data = array(
	        	'action' =>$query , 
	        	'agent' =>$agent , 
	        	'platform' =>$platform , 
	        	'IP' =>$CI->input->ip_address() ,
	        	'type'=>'vendor-api',  
	        	'session' =>session_id() , 
	        	'date' =>date('Y-m-d H:i:s') , 
	        	'username' =>'' , 
        	);
       
			if(!empty($data) && !empty($table)){
				$CI->db->insert($table,$data);
			}
        }
		//fclose($handle);
    }

    function logLogin($type,$username,$id) {
		$CI = & get_instance();
		//$filepath = APPPATH . 'logs/'.$type.'/Query-log-' . date('Y-m-d') . '.log';
		$filepath = APPPATH . 'logs/'.$type.'/'.date('Y-m-d').'--uid--'.$id.'.log';
		//$handle = fopen($filepath, "a+");
    	$log = "*****\nLog In\n\n".$this->userData();
        $log .= "\n\nUsername = ".$username;
        $table = 'pc_scr_logs';
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
        	'action' =>'LogIN' , 
        	'agent' =>$agent , 
        	'platform' =>$platform , 
        	'IP' =>$CI->input->ip_address() ,
        	'type'=>$type,  
        	'session' =>session_id() , 
        	'date' =>date('Y-m-d H:i:s') , 
        	'username' =>$id 
        );
       
			if(!empty($data) && !empty($table)){
				$CI->db->insert($table,$data);
			}
			
		
        //fwrite($handle, $log . "\n=======\n\n");
		//fclose($handle);
    }

    function logLogout($type,$id) {
		$CI = & get_instance();
		//$filepath = APPPATH . 'logs/'.$type.'/Query-log-' . date('Y-m-d') . '.log';
		$filepath = APPPATH . 'logs/'.$type.'/'.date('Y-m-d').'--uid--'.$id.'.log';
		//$handle = fopen($filepath, "a+");
    	$log = "Logout\n\nSession = ".session_id();
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
        	'action' =>'Logout' , 
        	'agent' =>$agent , 
        	'platform' =>$platform, 
        	'IP' =>$CI->input->ip_address() ,
        	'type'=>$type,  
        	'session' =>session_id() , 
        	'date' =>date('Y-m-d H:i:s') , 
        	'username' =>$id  
        );
       
			if(!empty($data) && !empty($table)){
				$CI->db->insert($table,$data);
			}
        //fwrite($handle, $log . "\n\n*******\n\n");
		//fclose($handle);
    }
}

?>