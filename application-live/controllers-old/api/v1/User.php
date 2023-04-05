<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');
class User extends REST_Controller{
    
    function __construct()
    {
        parent::__construct(); 
        $this->session->sess_destroy();
    }
    function version_post(){
        echo "string";
    }

}