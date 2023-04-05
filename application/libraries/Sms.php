<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sms{

   public function sendsms($phone,$message) {
       $ch = curl_init();

       $user="shanavas.chaliyath@gmail.com:KKLO10133";

       $receipientno=$phone;

       $senderID="TEST SMS";

      $password = '123456';
 //  $msgtxt='Registration Success';
       $msgtxt= $message;

       curl_setopt($ch,CURLOPT_URL,  "http://api.mVaayoo.com/mvaayooapi/MessageCompose");

       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

       curl_setopt($ch, CURLOPT_POST, 1);

       curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
       try {
           $buffer = curl_exec($ch);
           curl_close($ch);
           return $buffer;
       }
       catch(Exception $e){
           return $e;
       }
   }
   function send_sms($numbers, $mess){
        $message =urlencode("$mess");
        $senderid = 1;
        $dltid = 1;
        $tempid =1;
        // $url="https://primeecart.com/api-sms.php?custcode=GENIAL&scode=222222222&mobile=$numbers&message=$message&senderid=GENIAL";  
        $url="https://app.smsbits.in/api/user?id=Nzk5NDQwNTgwNg&senderid=$senderid&to=$numbers&msg=$message&port=TA&dltid=$dltid&tempid=$tempid";   
// print_r($url); exit();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $data = curl_exec($ch);
       
        curl_close($ch);
        // echo $data; exit();

        return $data;


    }
}
?>