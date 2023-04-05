<?php

require_once __DIR__ . '/fcm/firebase.php';
require_once __DIR__ . '/fcm/push.php';

class Fcm extends push {

    protected $ci;

    function __construct() {
        $this->ci = & get_instance();
    }

    function send_push_message($regId, $var = array(), $payload = array()) {

        if (!empty($var)) {
            $this->setTitle($var['title']);
            $this->setMessage($var['message']);
        } else {
            $this->setTitle(FCM_TITLE);
            $this->setMessage('');
        }

        $this->setImage('');
        $this->setIsBackground(FALSE);       
        $this->setPayload($payload);
        $json = '';
        $response = '';
        $json = $this->getPush();
        $response = $this->send($regId, $json);
    // print_r($json);exit();
        
        return $response;
    }


    function send_push_message_delivery($regId, $var = array(), $payload = array()) {

        if (!empty($var)) {
            $this->setTitle($var['title']);
            $this->setMessage($var['message']);
        } else {
            $this->setTitle(FCM_TITLE);
            $this->setMessage('');
        }

        $this->setImage('');
        $this->setIsBackground(FALSE);       
        $this->setPayload($payload);
        $json = '';
        $response = '';
        $json = $this->getPush();
    //print_r($json);exit();
        $response = $this->send_customer($regId, $json);
        return $response;
    }


     function send_push_message_region($regId, $var = array(), $payload = array()) {

        if (!empty($var)) {
            $this->setTitle($var['title']);
            $this->setMessage($var['message']);
        } else {
            $this->setTitle(FCM_TITLE);
            $this->setMessage('');
        }

        $this->setImage($var['image']);
        $this->setIsBackground(FALSE);       
        $this->setPayload($payload);
        $json = '';
        $response = '';
        $json = $this->getPush_region();
     //print_r($json);exit();
        $response = $this->send_customer($regId, $json);
        return $response;
    }
    
    
    
        function sendpush_notification()
        {
         //$imageurl = $base_url.'pub/media/'.$imagepath;
                $params['data']['title'] = 'hii';
                $params['data']['is_background'] = "";
                $params['data']['message'] = "gfhdgfd";
                $params['data']['payload'] = array(
                    'type' => 'web_link',
                    'link' => 34,
                  //  'image' => $imageurl
                );
                $params['data']['timestamp'] = date('Y-m-d G:i:s');
               // print_r(json_encode($params));exit();
                $androidAuthKey = "AAAArYLoKgU:APA91bExDgzaTd0lNkFo9RK6Aq1zUAVhes8qIb4BV31KzeTcH_A7knWZIfKrcvmANMrFuhRQIqbVXye8P_UBl73DHHTuL0PZkLjIcFMDzeVkNOJCmsN5rbDOIctJBnxczp4Ofk6M3UCa";

                $params['notification'] = $params;
                // $data_noti = array(
                //     'data' => $params,
                //     'notification' => $params
                // );
                $data = array(
                    'to' => '/topics/general_topic ',
                    'data' => $params
                    //'notification' => $params
                );
           // print_r(json_encode($data));exit();
                $headers = array(
                    "Content-Type:application/json",
                    "Authorization:key=".$androidAuthKey
                );
                

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://fcm.googleapis.com/fcm/send");
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                $result = curl_exec($ch);
                 curl_close($ch);
            return $result;
    }

    function send_bulk_push_message($regIds, $var = array(),$payload = array()) {

        if (!empty($var)) {
            $this->setTitle($var['title']);
            $this->setMessage($var['message']);
        } else {
            $this->setTitle(FCM_COMMON_TITLE);
            $this->setMessage(FCM_COMMON_MESSAGE);
        }

        $this->setImage('');
        $this->setIsBackground(FALSE);
        $this->setPayload($payload);
        $json = '';
        $response = '';
        $json = $this->getPush();
        $response = $this->sendMultiple($regIds, $json);
        return $response;
    }




}
