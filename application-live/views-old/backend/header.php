<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="<?=base_url()?>favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>Mesoki</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.28.0/css/jquery.fileupload.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/jquery-confirm.min.css" />
    <link href="<?=base_url()?>assets/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />


     <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/> -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="<?php echo base_url();?>assets/js/jquery-confirm.min.js"></script>
                 <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

                 <!--  <script src="<?=base_url()?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
  
    <script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap-datepicker.min.js"> </script> -->



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.31.0/js/vendor/jquery.ui.widget.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.31.0/js/vendor/jquery.ui.widget.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.fileupload.js"></script>


   
    <script src="<?=base_url()?>assets/js/select2.min.js"></script>
    <script src="<?=base_url()?>assets/js/require.min.js"></script>
    
    

    <script>
      var base_url = '<?=base_url()?>';
      requirejs.config({
          baseUrl: '<?=base_url()?>',
          paths: {
            "jquery" : "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min",
            "jquery_ui" : "https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min",
            "fileupload" : "assets/js/jquery.fileupload",
             "confirm" : "assets/js/jquery-confirm.min",
               "select2" : "https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min",
          }
      });


      require(["jquery","jquery_ui","fileupload","confirm","select2"], function($) {

$(function () {


   // $('.datepicker').datepicker({
   //        dateFormat: 'dd/mm/yy',
   //        changeYear: true,
   //        changeMonth: true,
   //        // minDate: new Date()
   //      });
   var $dp1 = $(".datepicker");
    $dp1.datepicker({
      dateFormat: 'dd/mm/yy',
      changeYear: true,
      changeMonth: true,
      //  minDate:0,
      // dateFormat: "yy-m-dd",
      yearRange: "-100:+20",
    });

    var $dp2 = $(".upcoming");
    $dp2.datepicker({
      changeYear: true,
      changeMonth: true,
      yearRange: "-100:+20",
      dateFormat: 'dd/mm/yy',
      minDate:0,
    });

    var $dp3 = $(".previous");
    $dp3.datepicker({
      changeYear: true,
      changeMonth: true,
      yearRange: "-100:+20",
      dateFormat: 'dd/mm/yy',
      maxDate:0,
    });
    $(".js-example-basic-multiple2").select2({
            placeholder: "Select ",
            closeOnSelect: false,
            multiple: true,
          });
     
});
      });
    </script>



    <!-- Dashboard Core -->
    <link href="<?=base_url()?>assets/css/dashboard.css" rel="stylesheet" />
    <script src="<?=base_url()?>assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="<?=base_url()?>assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="<?=base_url()?>assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="<?=base_url()?>assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="<?=base_url()?>assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="<?=base_url()?>assets/plugins/input-mask/plugin.js"></script>
            <script src="<?php echo base_url();?>assets/js/jquery-confirm.min.js"></script>

  </head>
  <body class="">
    <div class="page">
      <div class="page-main">
        <div class="header py-4">
          <div class="container">
            <div class="d-flex">
              <a class="header-brand" href="<?=base_url('dashboard')?>">
                <!-- <img src="<?=base_url()?>assets/images/logo.png" class="header-brand-img" alt="tabler logo"> -->
                <h2>Mesoki</h2>
              </a>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url(<?=base_url()?>assets/images/admin.jpg)"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default"><?=$this->session->userdata('admin_name')?></span>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item reset-password-btn" href="#" data-toggle="modal" data-target="#myModal">
                      <i class="dropdown-icon fe fe-help-circle"></i> Reset Password
                    </a>
                    <a class="dropdown-item" href="<?=base_url('logout')?>">
                      <i class="dropdown-icon fe fe-log-out"></i> Sign out
                    </a>
                  </div>
                </div>
              </div>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="<?=base_url('dashboard')?>" class="nav-link"><i class="fe fe-home"></i> Dashboard</a>
                  </li>
                  <?php
                    $privileges = $this->session->userdata('priv');

//                                       Array
// (
//     [0] =&gt; roles
//     [1] =&gt; users
//     [2] =&gt; tables
//     [3] =&gt; courses
//     [4] =&gt; presentation
// )
                   // var_dump($privileges);exit();

                    $roles=$users=$tables=$courses=$institutes=$presentation=$video=$exercise=$news=$problemsolving=0;
                    foreach($privileges as $priv){
                      if($priv == 'roles') $roles = 1;
                      if($priv == 'users') $users = 1;
                      if($priv == 'problemsolving') $problemsolving = 1;
                      if($priv == 'tables') $tables = 1;
                      if($priv == 'courses') $courses = 1;
                      if($priv == 'institutes') $institutes = 1;
                       if($priv == 'presentation') $presentation = 1;
                      if($priv == 'video') $video = 1;
                      if($priv == 'exercise') $exercise = 1;
                      if($priv == 'news') $news = 1;
                      $privileges = array_diff($privileges,array($priv));
                    }

                    if($roles){
                  ?>
                    <li class="nav-item">
                      <a href="<?=base_url('roles')?>" class="nav-link"><i class="fa fa-user"></i> Roles</a>
                    </li>
                  <?php
                    }
                    if($users){
                  ?>
                    <li class="nav-item">
                      <a href="<?=base_url('admins')?>" class="nav-link"><i class="fa fa-users"></i> Users</a>
                    </li>
                  <?php
                    }
                    if($tables){
                  ?>
                    <li class="nav-item">
                      <a href="<?=base_url('tables')?>" class="nav-link"><i class="fa fa-table"></i> Tables</a>
                    </li>
                  <?php
                    }
                    if($courses){
                  ?>
                    <li class="nav-item">
                      <a href="<?=base_url('courses')?>" class="nav-link"><i class="fa fa-files-o"></i> Courses</a>
                    </li>
                  <?php
                    }
                    if($institutes){
                      ?>
                      <li class="nav-item">
                      <a href="<?=base_url('institutes')?>" class="nav-link"><i class="fa fa-files-o"></i> Institutes</a>
                    </li>
                   <?php }
                  if($presentation){
                  ?>
                    <li class="nav-item">
                      <a href="<?=base_url('presentation')?>" class="nav-link"><i class="fa fa-files-o"></i> Presentation</a>
                    </li>
                  <?php
                    }
                    if($video){
                        ?>
                        <li class="nav-item">
                        <a href="<?=base_url('video')?>" class="nav-link"><i class="fa fa-file"></i> Uploads</a>
                      </li>
                     <?php }
                     if($exercise){
                        ?>
                        <li class="nav-item">
                        <a href="<?=base_url('exercise-bank')?>" class="nav-link"><i class="fa fa-file"></i> Exercise</a>
                      </li>
                     <?php }
                     if($news){
                        ?>
                        <li class="nav-item">
                        <a href="<?=base_url('admin-news')?>" class="nav-link"><i class="fa fa-file"></i> News</a>
                      </li>
                     <?php }
                     if($problemsolving){
                        ?>
                    <li class="nav-item">
                      <a href="<?=base_url('questions_list')?>" class="nav-link"><i class="fa fa-files-o"></i> Problem Solving</a>
                    </li>
                     <?php }
                  ?>


                   

                  <!-- <li class="nav-item dropdown">
                    <a href="<?=base_url('questions')?>" class="nav-link"><i class="fa fa-question"></i> Questions</a>
                  </li> -->
                  <!-- <li class="nav-item dropdown">
                    <a href="<?=base_url('transactions')?>" class="nav-link"><i class="fa fa-exchange"></i> Transactions</a>
                  </li> -->
                  <!-- <li class="nav-item dropdown">
                    <a href="<?=base_url('setting')?>" class="nav-link"><i class="fa fa-cog"></i> Settings</a>
                  </li> -->
                </ul>
              </div>
            </div>
          </div>
        </div>