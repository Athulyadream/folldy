<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Messaging\Notification;
use Kreait\Firebase\Messaging\CloudMessage;

class Firebase {

    private $firebase = '';

    function __construct() {
        $serviceAccount = ServiceAccount::fromJsonFile(APPPATH.'vendor/test-14471-9f2cdc8ffdc0.json');
        $this->firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        //error_reporting(0);
    }

    public function test_firebase(){
        // This assumes that you have placed the Firebase credentials in the same directory
        // as this PHP file.
        
        try{
            $database = $this->firebase->getDatabase();

            $newPost = $database
            ->getReference('test')
            ->push([
                'title' => 'Post title',
                'body' => 'This should probably be longer.'
            ]);
            return $newPost->getValue();
        }
        catch(Exception $e){
            $request = $e->getRequest();
            $response = $e->getResponse();

            if ($response) {
                return $e;
            }
        }
    }

    function create_notification($title,$body){
        $notification = Notification::create($title, $body);
        return $notification;
    }

    function validate_message($message){
        $out = new stdClass();
        try {
            $this->firebase->getMessaging()->validate($message);
            $out->status = 1;
            return $out;
        } catch (Exception $e) {
            $out->status = 0;
            $out->error = $e->errors();
            return $out;
        }
    }

    public function send_single_message($token,$data){
        $messaging = $this->firebase->getMessaging();
        $message = CloudMessage::withTarget('token', $token)
        ->withData($data);
        $stat = $this->validate_message($message);
        $out = new stdClass();
        if($stat->status){
            try{
                if($messaging->send($message)){
                    $out->status = 1;
                }
                else{
                    $out->status = 2;
                    $out->error = 'Unable to send notification';
                }
            }
            catch(Exception $e){
                $out->status = 0;
                $out->error = $e;
            }
        }
        else{
            $out->status = 0;
            $out->status = $stat->error;
        }
        return $out;
    }

    public function subscribe_to_topic($token,$topic){
        $regtokens = [$token];
        try{
            $this->firebase->getMessaging()->subscribeToTopic($topic, $token);
            $out = true;
        }
        catch(Exception $e){
            $out = $e;
        }
        return $out;
    }

    public function unsubscribe_to_topic($token,$topic){
        $regtokens = [$token];
        try{
            $this->firebase->getMessaging()->unsubscribeFromTopic ($topic, $regtokens);
            $out = true;
        }
        catch(Exception $e){
            $out = $e;
        }
        return $out;
    }

    public function send_topic_message($topic,$data){
        $messaging = $this->firebase->getMessaging();
        $message = CloudMessage::withTarget('topic', $topic)->withData($data);
        $stat = $this->validate_message($message);
        $out = new stdClass();
        if($stat->status){
            try{
                if($messaging->send($message)){
                    $out->status = 1;
                }
                else{
                    $out->status = 2;
                    $out->error = 'Unable to send notification';
                }
            }
            catch(Exception $e){
                $out->status = 0;
                $out->error = $e;
            }
        }
        else{
            $out->status = 0;
            $out->status = $stat->error;
        }
        return $out;
    }
}

?>