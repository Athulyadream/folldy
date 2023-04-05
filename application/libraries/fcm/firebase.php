<?php

/**
 * @author Ravi Tamada
 * @link URL Tutorial link
 */
class Firebase {

    // sending push message to single user by firebase reg id
    public function send($to, $message) {
        $fields = array(
            'to' => $to,
            'data' => $message,
        );
        return $this->sendPushNotification($fields);
    }

        public function send_customer($to, $message) {
        $fields = array(
            'to' => $to,
            'data' => $message,
        );
        return $this->sendPushNotification_customer($fields);
    }


    //   public function send_customer_delivery($to, $message) {
    //     $fields = array(
    //         'to' => $to,
    //         'data' => $message,
    //     );
    //     return $this->sendPushNotification_customer($fields);
    // }

    // Sending message to a topic by topic name
    public function sendToTopic($to, $message) {
        $fields = array(
            'to' => '/topics/' . $to,
            'data' => $message,
        );
        return $this->sendPushNotification($fields);
    }

    // sending push message to multiple users by firebase registration ids
    public function sendMultiple($registration_ids, $message) {
        $fields = array(
            'to' => $registration_ids,
            'data' => $message,
        );

        return $this->sendPushNotification($fields);
    }

    // function makes curl request to firebase servers
    private function sendPushNotification($fields) {


       // echo "fddfdf";exit();
        
        $fields_array=explode(",",$fields['to']);
        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';

        $headers = array(
            'Authorization: key=AAAArYLoKgU:APA91bExDgzaTd0lNkFo9RK6Aq1zUAVhes8qIb4BV31KzeTcH_A7knWZIfKrcvmANMrFuhRQIqbVXye8P_UBl73DHHTuL0PZkLjIcFMDzeVkNOJCmsN5rbDOIctJBnxczp4Ofk6M3UCa',
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        foreach($fields_array as $key =>$value)
        {
            $list_array['data']=$fields['data'];
            $list_array['to']=$value;
            
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($list_array));
        $result = curl_exec($ch);
         //print_r(json_encode($list_array));
  
            
        }
       //exit();

        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        
        // Execute post
         // Close connection
        curl_close($ch);

        return $result;
    }


       private function sendPushNotification_customer($fields) {


       // echo "fddfdf";exit();
        
        $fields_array=explode(",",$fields['to']);
        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';

        $headers = array(
            'Authorization: key=AAAArYLoKgU:APA91bExDgzaTd0lNkFo9RK6Aq1zUAVhes8qIb4BV31KzeTcH_A7knWZIfKrcvmANMrFuhRQIqbVXye8P_UBl73DHHTuL0PZkLjIcFMDzeVkNOJCmsN5rbDOIctJBnxczp4Ofk6M3UCa',
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        foreach($fields_array as $key =>$value)
        {
            $list_array['data']=$fields['data'];
            $list_array['to']=$value;
            
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($list_array));
       $result = curl_exec($ch);
         //print_r(json_encode($list_array));
  
            
        }
       //exit();

        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        
        // Execute post
         // Close connection
        curl_close($ch);

        return $result;
    }

}

?>