<!doctype html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="robots" content="index, follow" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta name="keywords" content="screen, recording" />
<meta name="description" content="Screen recording project" />
<meta name="subject" content="" >
<link rel="icon" href="<?=base_url()?>favicon.ico" type="image/x-icon"/>
<title>Mesoki</title>


<!-- Twitter card -->
<meta name="twitter:card" content="Screen Recording">
<meta name="twitter:site" content="https://twitter.com/screen_recording">
<meta name="twitter:title" content="">
<meta name="twitter:description" content="">
<meta name="twitter:image" content="">
<!-- OpenGraph information -->
<meta property="og:title" content="" />
<meta property="og:description" content="" />
<meta property="og:url" content="screen_recording.com" />
<meta property="og:image" content="">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<link rel="stylesheet" href="<?=base_url('assets_main')?>/assets/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<link rel="stylesheet" href="<?=base_url('assets_main')?>/assets/css/style.css">
<link rel="stylesheet" href="<?=base_url('assets_main')?>/assets/css/mins.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

<link rel="stylesheet" href="<?=base_url('assets_main')?>/assets/lightbox/simpleLightbox.min.css">

<?php
    if($this->session->userdata('theme') == 0){
        echo '<link rel="stylesheet" href="'.base_url('assets_main').'/assets/css/theme-green.css">';
    }
    if($this->session->userdata('theme') == 1){
        echo '<link rel="stylesheet" href="'.base_url('assets_main').'/assets/css/theme-blue.css">';
    }
    elseif($this->session->userdata('theme') == 2){
        echo '<link rel="stylesheet" href="'.base_url('assets_main').'/assets/css/theme-pink.css">';
    }
    elseif($this->session->userdata('theme') == 3){
        echo '<link rel="stylesheet" href="'.base_url('assets_main').'/assets/css/theme-gray.css">';
    }
?>




</head>
<body >
<header>
<!-- <style type="text/css">
    .disc_val{
        text-align: right;
    }
</style> -->
<?php $this->load->view('frontend/template/header.php'); ?>

<!-- <style type="text/css">
    .disc_val{
        text-align: right;
    }
</style> -->
<style type="text/css">

    /*.total{
        background: #117a8ba6 !important;

    }*/

    
::-webkit-scrollbar {
display: none;
}





.question-area .table-box {
border: 0px solid #0000000f;
}

.transaction-pool{
  display: none!important;
}


.answer-area {
    padding-top: 2px;
}

.text-right {
    text-align: right!important;
    padding-right: 7px !important;
}

.problem-tr p {

    font-size:1.1em !important;
}


.background {
    z-index: 1;
    background-position: center;
    background-size: cover;

    }

.question-area .table-box table li {
    font-size: 1em;
}

.question-area ul li {
    font-size: 1em;
}



.draw_tools{
        width: 30px !important;
    height: 26px !important;
    line-height: 24px !important;
}
.draw_tools_new{
        width: 19px !important;
            height: 22px !important;
            border: none;
            margin-left: 12px;
   /* height: 26px !important;
    line-height: 24px !important;*/
}

.hide-bottom{
  background: transparent;
}
.oredr-active{
/*  background: rgba(120, 189, 243, 0.41) !important;
*/
opacity: 65%;
}

.accordion-open{
  background: #0000005e;
}

.subnav{
      margin-left: 18px !important;

}


.mr-10p {
    margin-right: 35px !important;
}
.mr-10p1 {
    margin-right: 3px !important;
}


.bottom-controls {
    width: 100%;
    position: fixed;
    bottom: 0;
    left: 0%;
    font-family: 'Roboto', sans-serif;
    background: white;
    opacity: 90%;
    /* min-height: 37px; */
    height: 53px;
}

.table-box table li {
    width: 100%;
    padding: 3px;
    display: inline-block;
    font-size: 1em;
    font-weight: normal;
    color: #474747;
}



.icon-cls{
            height: 18px !important;

}


.right-block {
    width: 100%;
    /* float: right; */
    padding: 0 15px 50px;
    z-index: 1;
    padding-left: 0px;
    padding-right: -26px;
    margin-left: 57px;
}
.question-div {
	float: left;
    width: 100%;
    margin: 19px 0px;
    overflow-y: auto;
    max-height: 90vh;
     padding-left: 5px !important; 
    padding-right: 85px;
}


.answer-table-box {
   
    width: 134%;
    
}

    .answer-area .table-box table tr td:first-child :not(.sub_table){
     border-left: 0px solid rgba(0,0,0,0.3) !important;
    }

.answer-area .table-box table tr td:first-child :not(.sub_table_fixed){
     border-left: 0px solid rgba(0,0,0,0.3) !important;
    }
    .answer-area .table-box table tr td :not(.sub_table_fixed){
        border-right: 1px solid rgba(0,0,0,0.3);
    }
    .answer-area .table-box table tr td :not(.sub_table){
        border-right: 1px solid rgba(0,0,0,0.3);
    }


    .answer-area .table-box table tr td :not(.disc){
        border-right: 0px solid rgba(0,0,0,0.3);
    }
    .answer-area .table-box table tr td :not(.disc1){
        border-right: 0px solid rgba(0,0,0,0.3);
    }

    .bg_blue{
      background: #c799fc   !important;  
    }
     .bg_red{
      background: #66cfff  !important;  
    }

    .bg_black{
      background: #ecd9e9  !important;  
    }

    .bg_black{
      background: #ecd9e9  !important;  
    }
    .bg_trans{
          background: rgba(0,0,0,.075) !important;    
    }

       

    .change_bg_none{
    background: rgba(0,0,0,.075) !important;
    border-color: black;
    border-width: 1px;
    border-style: solid;
     }
    .dim_bg{
        background: #e0efe75c;
    }

    .empty:hover { 
        
  background-color: #118989;
}

 .p-line{
         border-bottom: 3px solid #00000052!important;
    }

.sub_table{
    height: 29px;
        border: none !important;
/*    //background: #cde0b8  !important;
*/}

.sub_table_fixed {
/*    height: 29px;
*/        border: none !important;
/*    //background: #cde0b8  !important;
*/}


.container-radio {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 12px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.container-radio input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 18px;
  width: 18px;
  background-color: #9e9e9e94;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container-radio:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container-radio input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container-radio input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container-radio .checkmark:after {
    top: 5px;
    left: 5px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
}

.qst-line{
    border-bottom-width:2px !important; 
    border-bottom-style:solid !important;
    border-bottom-color:#092035a6 !important;
}

  .d-line {
    border-bottom-width: 6px !important;
    border-bottom-style: double !important;
    border-bottom-color: #092035a6 !important;
}


.td-u-line{
/*            white-space: pre;
*/    text-decoration: underline;
    text-underline-position: under;
}

.pr-u-line{
/*            white-space: pre;
*/    text-decoration: underline;
    text-underline-position: under;
}





.pr-d-line{
    border-bottom-width: 6px !important;
    border-bottom-style: double !important;
    border-bottom-color: #092035a6 !important;
}

.ans-d-line{
    border-bottom-width: 6px !important;
    border-bottom-style: double !important;
    border-bottom-color: #092035a6 !important;
}



.line{
    border-bottom-width:2px !important; 
    border-bottom-style:solid !important;
    border-bottom-color:#092035a6 !important;
}

.d_line{
    border-bottom-width:6px !important;
    border-bottom-style:double !important;
    border-bottom-color:#092035a6 !important;
}
.u_line{
            white-space: pre;
    text-decoration: underline;
    text-underline-position: under;
}
.td_line{
    border-bottom-width: 2px !important;
    border-bottom-style: solid !important;
    border-bottom-color: black !important;
}
.slbCloseBtn,.slbArrow {
    display: none;
}

 .underline_ans{
    border-bottom-width: 2px !important;
    }


    .sub-tab-tr{
      
    border-right: none !important;

    }

    .question-area .table-box table li p{
                font-size: 1em;

    }



.number-controls ul li .show_image_answer.active {
    color: rgba(50,60,80,0.9);
    background: #03A9F4;
}

    .question-area ul span {

    color: #474747;
    font-weight: normal;
    font-size: 1.2em;
    line-height: 1.4em;
    margin: 0 0 10px;
    padding: 0;
    float: left;
/*    clear: both;
*/} 

  /*  .border_sum_tot{
        border: 1px solid #17a2b8 !important;
    }  */



    /* The Modal (background) */
.modal {
 
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */

.modal-content {
 /* position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;*/
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
-webkit-animation:pop-in 0.5s;
-moz-animation:pop-in 0.5s;
-ms-animation:pop-in 0.5s;
}


/* Add Animation */
@-webkit-keyframes pop-in {

0% { opacity: 0; -webkit-transform: scale(0.5); }
100% { opacity: 1; -webkit-transform: scale(1); }
}
@-moz-keyframes pop-in {

0% { opacity: 0; -moz-transform: scale(0.5); }
100% { opacity: 1; -moz-transform: scale(1); }
}
@keyframes pop-in {
0% { opacity: 0; transform: scale(0.5); }
100% { opacity: 1; transform: scale(1); }
}

</style>

<!-- max-height: 635px;
    overflow-y: scroll; -->

<div class="container-fluid" style="padding:0 !important;">
<div class="row no-gutters">
    <div class="col-12">

     <!--    <section>
  <span class="background fl" onclick="return goToSlideId('section-1')" style="background-image:url('<?=base_url()?>static/images/playbutton.jpg');"></span>
  
</section> -->
            <div class="left-block" style="">
            <div class="left-controls">
<!--                     <div class="selected_color">
                    <ul style="    
    margin-top: 0px;
    margin-bottom: 0px;
">

                     <li class="subnav"><a href="" class="refresh_screen  op theme0  icon-cls" style="    width: 31px;
    height: 28px;background: none;border: none;"></a><img src="<?= base_url().'assets_main/assets/images/theme-icon.png';?>">
  <ul class="submenu">
    
            <div class="qtype-control">
                    <ul>
                        <li class=" "><a href="<?=base_url('change-theme-web')?>?theme=0" class="greenbg">Green</a></li>
                         <li class=" "><a href="<?=base_url('change-theme-web')?>?theme=1" class="bluebg"
                          >Blue</a></li>
                      <li class=""><a href="<?=base_url('change-theme-web')?>?theme=2" class="pinkbg">Pink</a></li>
                    <li class=""><a href="<?=base_url('change-theme-web')?>?theme=3" class="graybg">White</a></li>


                    </ul>
                </div>
                 /.qtype-control -->
        <!-- </ul></li>


                    </ul>
                </div> --><!-- /.qtype-control --> 

                      





               
                <!-- /.theme-selector -->

              <!--   <div class="answer-area-controls">
                    <a href="#" class="buttons add_new_row op"><i class="fas fa-plus"></i> New Answer Raw</a>
                    <a href="#" class="buttons view_tray"><i class="far fa-copy"></i> Transaction Tray</a>
                    <a href="#" class="buttons help_txt"><i class="fas fa-align-left"></i> Help Text</a>
                    <a href="#" class="buttons show_help_image"><i class="fas fa-image"></i> Help Image</a>
                </div> -->
                 

                
      
<!-- <div class="selected_color">
   <ul class="logo_name" style="   margin-top: 58px;

    background: white;
    /* margin-bottom: -20px; */
    min-height: 58px;
    /* margin-right: 35px; */
    width: 101%;
    opacity: 90%;
    ">

         <li style="    font-weight: 700;
    margin-left: 10px;font-size: 20px"><a href="" class="refresh_screen  op theme0 greenbg1 icon-cls" style="    width: 31px;
        height: 28px;background: none;border: none;"></a>Folddy</li>

    </ul>
</div> --><!-- /.qtype-control -->

               






            </div>
        </div>


        <!-- 
float: right;width: 90%;float: right;padding: 0 15px 50px;z-index: 1;padding-left: 0px;

         -->
   
        <canvas id="can" width="1400" height="600" style="/* position:absolute; *//* top:10%; *//* left:10%; */display:none;"></canvas>



    
 

            <div class="right-block">
                 <div class="row" style="min-height: 100vh">


                    <div class="col-md-12" >
            <div class="row q_area" style="min-height: 97vh;">

            <div class="col-md-6 col-sm-12 col-12 question-area" id="question-area">

            <div class="question-div" style="float:left;width:100%;margin:19px 0 19px 0;
          overflow-y: auto;
    max-height: 90vh;
    ">


                                <div class="question" style="font-size: .9em;">

                                    <h1>

                                        <?=$question['question_title']?>

                                    </h1>

                                </div><!-- /.question -->



        <?php

$key_tb=0;
$last_qt=0;
        foreach($qt_table  as  $tab_q) {




         //print_r($tab_q['qt']);

 if(!empty($tab_q['qt_vals'])||!empty($tab_q['qt_text']['text_val'])||!empty($tab_q['transactions'])){
            // foreach ($tab_q['qt']  as  $tab_qt) {
$last_qt=$key_tb;

 $table=$tab_q['qt'];

                                    $cols = $table['table_columns'];
                                    $cols_name = array($table['column_one_name'],$table['column_two_name'],$table['column_three_name'],$table['column_four_name'],$table['column_five_name'],$table['column_six_name'],$table['column_seven_name'],$table['column_eight_name'],$table['column_nine_name'],$table['column_ten_name']);
                                    $cols_width = array($table['column_one_width'],$table['column_two_width'],$table['column_three_width'],$table['column_four_width'],$table['column_five_width'],$table['column_six_width'],$table['column_seven_width'],$table['column_eight_width'],$table['column_nine_width'],$table['column_ten_width']);
                                    $cols_sum = array($table['column_one_sum'],$table['column_two_sum'],$table['column_three_sum'],$table['column_four_sum'],$table['column_five_sum'],$table['column_six_sum'],$table['column_seven_sum'],$table['column_eight_sum'],$table['column_nine_sum'],$table['column_ten_sum']);
                                    $cols_count = array($table['count_one_table'],$table['count_two_table'],$table['count_three_table'],$table['count_four_table'],$table['count_five_table'],$table['count_six_table'],$table['count_seven_table'],$table['count_eight_table'],$table['count_nine_table'],$table['count_ten_table']);


       // }

           

        ?>


           
<?php

$old_single=$qt_table[0]['qt']['table_single_width'];

if(!empty($tab_q['qt_vals'])){
    $single_width = $table['table_single_width'];

}else{
  if($old_single!=0){
      $single_width =$old_single;

    }else{
          $single_width = $table['table_single_width'];

    }
}

 // print_r($single_width);



?>


<!-- <?php if($key_tb==0||$key_tb==1){ echo 'class ="table-box quest_table active"'; }else{ echo 'class="table-box quest_table " style="display:none;"'; } ?> -->
           <div id="qt-div<?=$key_tb?>" data-id="<?=$key_tb?>"  data-width="<?=$single_width;?>"  class="table-box quest_table active"  style="margin-bottom:20px;<?php if($single_width!=0){?>width:<?=$single_width;?>% <?php } else{?>width:100%<?php }?>">



 <?php
  if(!empty($tab_q['qt_text']['text_val'])){    ?>




<!--                <div class="question" style="min-height: 20px;background: #fffede">
 -->
                               <div class="question" style="min-height: 20px;font-size: .9em;">


                                    <h5 style="    font-weight: 600;
    color: #000000cf;font-size: 1.2em">

                                        <?=$tab_q['qt_text']['text_val'];?>

                                    </h5>

                                </div><!-- /.question -->

                                <?php }?>


         <!-- <p class="qt_name_div" style="font-size: 1.3em;
    text-align: center;
    margin: 3px;background: #fffede;
    "><?=$tab_q['quest_table_name'];?></p> -->


    <?php
                  if(!empty($tab_q['qt_vals'])){

    ?>

     <?php


$content = str_replace("<p><br></p>","",$tab_q['header_note']);
    ?>



     <p class="qt_name_div" style="font-size: 11px;
    text-align: center;
    margin: 0px;background: #fffede;
    "><?=$content;?></p>


        <p class="qt_name_div" style="font-size: 1em;
    text-align: center;
    margin: 0px;
    "><?=$tab_q['quest_table_name'];?></p>


 <?php
                  if(!empty($tab_q['qt_vals'])){
    ?>


                <table class="">
                    <tr class="table-header" style="    font-size: 0.9em;">

                        <?php

                            $cols = $tab_q['qt']['table_columns'];

                            // $cols_name = array();

                            // $cols_width = array();
                             $amount_array=array();

                            // foreach($tab_q['qt_cols'] as $col){

                            //     array_push($cols_name,$col['col_name']);

                            //     array_push($cols_width,$col['col_width']);
                            //      array_push($amount_array,$col['is_amount']);

                            // }

                          //  echo json_encode($amount_array);exit();

                            for($i=0;$i<$cols;$i++){

                            ?>

                             <td width="<?=$cols_width[$i]?>%"><?=$cols_name[$i]?></td>

                            <?php

                            }

                        ?>

                    </tr>

                </table>

                <?php  if(!empty($tab_q['qt_vals'])){
                          ?>


                <table class="">

                    <?php

                        $r = 0;

                        for($i=0;$i<count($tab_q['qt_vals'])/$cols;$i++){

                            ?>

                                <tr>

                                    <?php

                                        for($j=0;$j<$cols;$j++){

                                        ?>

                                            <td width="<?=$cols_width[$j]?>%" class="trans-tr"  data_id="<?=$r?>" data-qst=""> 

                                            <!-- class="connected empty itemconnect value_<?=$i.$j?>" -->
                                           <?php  if($cols_sum[$j]=='1'){
                                           // echo "nc";
                                            
                                             


                                                          if($cols_count[$j]!=0){

                                                              ?>


                                                     <table style="width: 100%">
                                                        <tr>
                                                            <?php 

                                                         $ids=array();

                                                         

                                                       for ($sub=0; $sub <$cols_count[$j] ; $sub++) {
                                                        ?>

                                                <td width="<?=$cols_width[$j]?>%" class="trans-tr text-right" data-name="" data_id="<?=$r?>" data-qst="" style="border-right: none"> 


                                                         <?php 


                                                            foreach ($tab_q['qt_vals'] as $key => $value1) {
                                                    if($value1['col_no']==$j){
                                                         if($value1['row_no']==$i){
                                                           if(!in_array($value1['val_id'], $ids)){

                                                            array_push($ids,$value1['val_id']);
                                                        

                                           // echo "nc";
                                            ?>
                                            <li style="list-style-type: none;" data_id="<?=$r?>" data-qst="<?=$value1['val_id']?>" class="disc disc_val text-right" draggable="true" style="text-align: right;" >
 
                                                      <?=$value1['val_value']?>
   

                                                </li>

                                                <p id="quest_format_<?=$r?>" class="d-none">

                                   <?=$value1['format_id'];?>

                                              </p>

<!-- <?=$value1['pr_help']?>
 -->                                           <span id="quest_helptext_<?=$r?>" class="d-none">

                                   <?=$value1['pr_help']?>

                                              </span>
                                              <p id="quest_helpimg_<?=$r?>" class="d-none">

                                   <?=$value1['pr_help_img']?>

                                              </p>

                                              <p id="quest_values_all<?=$r?>" class="d-none">

                                   <?=$value1['quest_val_id']?>

                                              </p>

                                               <p id="quest_trans_all<?=$r?>" class="d-none">

                                   <?=$value1['trans_val_id']?>

                                              </p>


                                           

                                               <p id="quest_format_value<?=$r?>" class="d-none">

                                   <?=$value1['problem_val_id']?>

                                              </p>

                                               <p id="quest_format_table<?=$r?>" class="d-none">

                                   <?=$value1['format_table_id']?>

                                              </p>
                                              

                                              <p id="quest_ans_value<?=$r?>" class="d-none">

                                   <?=$value1['ans_val_id']?>

                                              </p>

                                                 <p id="quest_ans_col<?=$r?>" class="d-none">

                                   <?=$value1['ans_col_id']?>

                                              </p>

 
                                           <?php 

                                          break;
                                          } 

                                         } 
                                         }



                                                    }



                                                    ?>
                                              </td>


                                               <?php } ?>
                                                         
                                                           
                                                        </tr>
                                                      </table>



                                                                  

                                                         <?php  }else{


                                                                foreach ($tab_q['qt_vals'] as $key => $value1) {
                                                    if($value1['col_no']==$j){
                                                         if($value1['row_no']==$i){


                                                             if($value1['val_underline']=='1'){


                                                                                     $class="qst-line";
                                                                                    // $style1="display: none;border: none;border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: black;";
                                                                                }else{
                                                                                     $class="";
                                                                                      // $style1="display: none;border: none";
                                                                                }


                                                                                 if($value1['val_double_line']=='1'){


                                                                                     $class1="d-line";
                                                                                    // $style1="display: none;border: none;border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: black;";
                                                                                }else{
                                                                                     $class1="";
                                                                                      // $style1="display: none;border: none";
                                                                                }


                                                                                    if($value1['val_text_line']=='1'){


                                                                                     $class13="td-u-line";
                                                                                    // $style1="display: none;border: none;border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: black;";
                                                                                }else{
                                                                                     $class13="";
                                                                                      // $style1="display: none;border: none";
                                                                                }

                                                        

                                           // echo "nc";
                                            ?>
                                            <li style="list-style-type: none;" data_id="<?=$r?>" data-qst="<?=$value1['val_id']?>" class="disc disc_val text-right <?=$class;?> <?=$class1;?> <?=$class13;?>" draggable="true" style="text-align: right;" >
 
                                                      <?=$value1['val_value']?>
   

                                                </li>


                                                <p id="quest_format_<?=$r?>" class="d-none">

                                   <?=$value1['format_id'];?>

                                              </p>

<!-- <?=$value1['pr_help']?>
 -->                                           <span id="quest_helptext_<?=$r?>" class="d-none">

                                   <?=$value1['pr_help']?>

                                              </span>
                                              <p id="quest_helpimg_<?=$r?>" class="d-none">

                                   <?=$value1['pr_help_img']?>

                                              </p>

                                              <p id="quest_values_all<?=$r?>" class="d-none">

                                   <?=$value1['quest_val_id']?>

                                              </p>

                                               <p id="quest_trans_all<?=$r?>" class="d-none">

                                   <?=$value1['trans_val_id']?>

                                              </p>


                                           

                                               <p id="quest_format_value<?=$r?>" class="d-none">

                                   <?=$value1['problem_val_id']?>

                                              </p>

                                               <p id="quest_format_table<?=$r?>" class="d-none">

                                   <?=$value1['format_table_id']?>

                                              </p>

                                              <p id="quest_ans_value<?=$r?>" class="d-none">

                                   <?=$value1['ans_val_id']?>

                                              </p>

                                                 <p id="quest_ans_col<?=$r?>" class="d-none">

                                   <?=$value1['ans_col_id']?>

                                              </p>


                                                <ul id="question_tr_spits_<?=$r?>" class="d-none">

                                                    <?php

                                                        $val_keys = explode(';',$value1['pr_keys']);

                                                        foreach($val_keys as $temp){

                                                        ?>

                                                            <li class="disc "><?=$temp?></li>

                                                        <?php

                                                        }

                                                    ?>

                                                </ul>
 
                                           <?php } 
                                         }



                                                    }


                                                                  

                                                           }

                                            } 
                                           else{
                                            if($cols_count[$j]!=0){

                                                              ?>


                                                     <table style="width: 100%">
                                                        <tr>
                                                            <?php 

                                                       

                                                            $ids1=array(); 
                                                            $ids=array();  

                                                       for ($sub=0; $sub <$cols_count[$j] ; $sub++) {
                                                        ?>

                                                         <td width="<?=$cols_width[$j]?>%" class="sub-tab trans-tr" data-name="" data_id="<?=$r?>" data-qst="" style="border-right: none"> 

                                                          <?php 
                                                             
                                                       $g=0;
                                                    foreach ($tab_q['qt_vals'] as $key => $value1) {
                                                    if($value1['col_no']==$j){
                                                         if($value1['row_no']==$i){
                                                          if(!in_array($value1['val_id'], $ids)){
                                                          // if($g==$sub){


                                                          array_push($ids,$value1['val_id']);

                                                        

                                           // echo "nc";
                                            ?>
                                            <li style="list-style-type: none;" data_id="<?=$r?>" data-qst="<?=$value1['val_id']?>" class="disc sub-tab-1 disc_val" draggable="true" style="text-align: right;" >
 
                                                      <?=$value1['val_value']?>
   

                                                </li>


                                                <p id="quest_format_<?=$r?>" class="d-none">

                                   <?=$value1['format_id'];?>

                                              </p>

<!-- <?=$value1['pr_help']?>
 -->                                           <span id="quest_helptext_<?=$r?>" class="d-none">

                                   <?=$value1['pr_help']?>

                                              </span>
                                              <p id="quest_helpimg_<?=$r?>" class="d-none">

                                   <?=$value1['pr_help_img']?>

                                              </p>

                                              <p id="quest_values_all<?=$r?>" class="d-none">

                                   <?=$value1['quest_val_id']?>

                                              </p>

                                               <p id="quest_trans_all<?=$r?>" class="d-none">

                                   <?=$value1['trans_val_id']?>

                                              </p>


                                           

                                               <p id="quest_format_value<?=$r?>" class="d-none">

                                   <?=$value1['problem_val_id']?>

                                              </p>

                                               <p id="quest_format_table<?=$r?>" class="d-none">

                                   <?=$value1['format_table_id']?>

                                              </p>

                                              <p id="quest_ans_value<?=$r?>" class="d-none">

                                   <?=$value1['ans_val_id']?>

                                              </p>

                                                 <p id="quest_ans_col<?=$r?>" class="d-none">

                                   <?=$value1['ans_col_id']?>

                                              </p>

 
                                           <?php

                                           break;
                                            }  
                                         } 
                                         }



                                                    }
                                                    ?>

                                                     </td>

                                              <?php  } ?>
                                                         
                                                           
                                                        </tr>
                                                      </table>



                                                                  

                                                         <?php  }else{
                                                            // echo "string";


                                                                foreach ($tab_q['qt_vals'] as $key => $value1) {
                                                    if($value1['col_no']==$j){
                                                         if($value1['row_no']==$i){


                                                              if($value1['val_underline']=='1'){


                                                                                     $class="qst-line";
                                                                                    // $style1="display: none;border: none;border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: black;";
                                                                                }else{
                                                                                     $class="";
                                                                                      // $style1="display: none;border: none";
                                                                                }


                                                                                      if($value1['val_double_line']=='1'){


                                                                                     $class1="d-line";
                                                                                    // $style1="display: none;border: none;border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: black;";
                                                                                }else{
                                                                                     $class1="";
                                                                                      // $style1="display: none;border: none";
                                                                                }


                                                                                   if($value1['val_text_line']=='1'){


                                                                                     $class13="td-u-line";
                                                                                    // $style1="display: none;border: none;border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: black;";
                                                                                }else{
                                                                                     $class13="";
                                                                                      // $style1="display: none;border: none";
                                                                                }

                                                        

                                           // echo "nc";
                                            ?>
<!--                                             <?=$value1['val_value']?>
 -->                                            
                                            <li style="list-style-type: none;" data_id="<?=$r?>" data-qst="<?=$value1['val_id']?>" class="disc disc_val <?=$class;?> <?=$class1;?> <?=$class13;?>" draggable="true" style="text-align: right;" >
 
                                                      <?=$value1['val_value']?></li>


                                                 <p id="quest_format_<?=$r?>" class="d-none">

                                   <?=$value1['format_id'];?>

                                              </p>


                                                          <span id="quest_helptext_<?=$r?>" class="d-none">

                                   <?=$value1['pr_help']?>

                                              </span>

                                               <p id="quest_helpimg_<?=$r?>" class="d-none">

                                   <?=$value1['pr_help_img']?>

                                              </p>

                                              <p id="quest_values_all<?=$r?>" class="d-none">

                                   <?=$value1['quest_val_id']?>

                                              </p>

                                                  <p id="quest_trans_all<?=$r?>" class="d-none">

                                   <?=$value1['trans_val_id']?>

                                              </p>


                                           

                                               <p id="quest_format_value<?=$r?>" class="d-none">

                                   <?=$value1['problem_val_id']?>

                                              </p>

                                               <p id="quest_format_table<?=$r?>" class="d-none">

                                   <?=$value1['format_table_id']?>

                                              </p>

                                              <p id="quest_ans_value<?=$r?>" class="d-none">

                                   <?=$value1['ans_val_id']?>

                                              </p>

                                                 <p id="quest_ans_col<?=$r?>" class="d-none">

                                   <?=$value1['ans_col_id']?>

                                              </p>



                                               <ul id="question_tr_spits_<?=$r?>" class="d-none">

                                                    <?php

                                                        $val_keys = explode(';',$value1['pr_keys']);

                                                        foreach($val_keys as $temp){

                                                        ?>

                                                            <li class="disc "><?=$temp?></li>

                                                        <?php

                                                        }

                                                    ?>

                                                </ul>
 
                                           <?php } 
                                         }



                                                    }


                                                                  

                                                           }

                                            }

                                            ?>




                                    

                                                

                                               

                                                 

                                            </td>

                                        <?php

                                            $r++;

                                        }

                                        // $val_keys = explode(';',$tab_q['qt_vals'][$r-1]['val_keys']);

                                    ?>

                                    <!-- <td id="question_tr_spits_<?=$i?>" class="d-none">

                                        <?php

                                            foreach($val_keys as $temp){

                                            ?>

                                                <li class="disc d-none"><?=$temp?></li>

                                            <?php

                                            }

                                        ?>

                                    </td> -->

                                </tr>

                            <?php

                        }

                    ?>

                </table>

                <?php
                        }

                        }


                        }

                    ?>


                    <div id="tranaction_hidden">
            <!-- <h4>Transactions</h4> -->
            <!--  data-simplebar -->
             <?php
                        $k=0;
                        $tr=0;

               foreach ($tab_q['transactions'] as $key_t => $data_n) {
                            if(!empty($data_n)){


                $last_trans=$key_t;
                        ?>
            <div id="transations_id<?=$key_t?>"    data-id="<?=$key_t?>" <?php if($key_t==0){ echo 'class ="transations active"'; }else{ echo 'class="transations" style="display:none;"'; } ?>  style="max-width:100%;float:left;width:100%;    background: #fffede;">

                <ul style="float: none;">


                    <?php

                        foreach($data_n as $key=>$data){

                                
                  if($data['trans_type']=='sentnce'){
                                
                        ?>

                            <li style="float: none;">

                                <a href="#" class="trans" data_id="<?=$tr?>" data-transaction="<?=$data['transaction_id']?>" style="color: black">

                                   <!--  <?=$data['transaction_title']?> -->
                                   <?php echo nl2br($data['transaction_title']); ?>

                                </a>


                                <p id="trns_format_<?=$tr?>" class="d-none">

                                   <?=$data['format_id'];?>

                                              </p>


                                                          <span id="trns_helptext_<?=$tr?>" class="d-none">

                                   <?=$data['pr_help']?>



                                              </span>

                                              <p id="trns_helpimg_<?=$tr?>" class="d-none">

                                   <?=$data['pr_help_img']?>

                                              </p>

                                              <p id="trns_values_all<?=$tr?>" class="d-none">

                                   <?=$data['quest_val_id']?>

                                              </p>

                                               <p id="trns_trans_all<?=$tr?>" class="d-none">

                                   <?=$data['trans_val_id']?>

                                              </p>


                                           

                                               <p id="trns_format_value<?=$tr?>" class="d-none">

                                   <?=$data['problem_val_id']?>

                                              </p>

                                               <p id="trns_format_table<?=$tr?>" class="d-none">

                                   <?=$data['format_table_id']?>

                                              </p>

                                              <p id="trns_ans_value<?=$tr?>" class="d-none">

                                   <?=$data['ans_val_id']?>

                                              </p>

                                                 <p id="trns_ans_col<?=$tr?>" class="d-none">

                                   <?=$data['ans_col_id']?>

                                              </p>


                                <ul id="question_spits_<?=$tr?>" class="d-none">

                                    <?php

                                        foreach($data['keywords'] as $temp){

                                        ?>



                                            <li class="disc"><?=$temp['keyword_value']?></li>

                                        <?php

                                        }

                                    ?>

                                </ul>

                                <p id="trans_img_<?=$tr?>" class="d-none">

                                    <?=$data['pr_help_img']?>

                                </p>

                                <span id="trans_helptext_<?=$tr?>" class="d-none">


                                    <?=$data['pr_help']?>

                                </span>

                            </li>

                        <?php
                            //$k $key_t;
                         $tr++;
                        }


                        else{





                          ?>

                                <span style="float: none;"><a href="#" class="trans" data_id="<?=$tr?>" style="color: black">

                                    <?=$data['transaction_title']?>

                                </a>




                                <p id="trns_format_<?=$tr?>" class="d-none">

                                   <?=$data['format_id'];?>

                                              </p>



                                                          <span id="trns_helptext_<?=$tr?>" class="d-none">

                                   <?=$data['pr_help']?>

                                              </span>

                                              <!-- <p id="trns_helpimg_<?=$tr?>" class="d-none">

                                   <?=$data['pr_help_img']?>

                                              </p> -->

                                              <p id="trns_values_all<?=$tr?>" class="d-none">

                                   <?=$data['quest_val_id']?>

                                              </p>

                                               <p id="trns_trans_all<?=$tr?>" class="d-none">

                                   <?=$data['trans_val_id']?>

                                              </p>


                                           

                                               <p id="trns_format_value<?=$tr?>" class="d-none">

                                   <?=$data['problem_val_id']?>


                                              </p>

                                               <p id="trns_format_table<?=$tr?>" class="d-none">

                                   <?=$data['format_table_id']?>

                                              </p>

                                              <p id="trns_ans_value<?=$tr?>" class="d-none">

                                   <?=$data['ans_val_id']?>

                                              </p>

                                                 <p id="trns_ans_col<?=$tr?>" class="d-none">

                                   <?=$data['ans_col_id']?>

                                              </p>



                                <ul id="question_spits_<?=$tr?>" class="d-none">

                                    <?php

                                        foreach($data['keywords'] as $temp){

                                        ?>

                                            <li class="disc"><?=$temp['keyword_value']?></li>

                                        <?php

                                        }

                                    ?>

                                </ul>

                                <p id="trans_img_<?=$tr?>" class="d-none">

                                    <?=$data['pr_help_img']?>

                                </p>

                                <span id="trans_helptext_<?=$tr?>" class="d-none">

                                    <?=$data['pr_help']?>

                                </span></span>



                       <?php
                         }
                            //$k $key_t;
                         $tr++;
                        }

                    ?>

                </ul>



            </div><!-- /.transations -->

             <?php

                        }
 ?><input type="hidden" id="trans-tab-last" value="<?=$last_trans?>">
 <?php

                    }

                    ?>

                </div> 

            </div> 

        <?php

            }
            //}
            $key_tb++;

          }

        ?>
<input type="hidden" id="qt-tab-last" value="<?=$last_qt?>">
            
  


            </div>

        </div> <!-- /.question area-->

        <div class="col-md-6 col-sm-12 col-12 " id="answer-area" style="   overflow-y: auto; 
    max-height: 93vh;    margin-top: -30px;">

            



            <div style="" class="photo-thumb-trans trans_help_img">
                      
                         
                        <img id="trans_img" class="help_img" src="" style="display: none;">

                    </div>

            <div class="answer-area">

                <!-- <h4>Transaction</h4> -->

                



             <!--    <div class="transaction-poolQ trans_question" id="draggable">

                  

                </div> -->
                <ul class="connected list  transaction-poolQ trans_question" style="width:100%;border: none;min-height: 0px;display: none">
                     
                 </ul>

                <div class="help-text" style="display: none;">

<!--                     <p>hgggggggh</p>
 -->
                </div>



                <div class="transaction-pool" style="display:flex;margin-bottom:30px;padding: 9px 10px 9px;min-height: 29px">


                    <div style="width:30%;display: none;" class="answer_img photo-thumb "> <?php if(!empty($answer_img)) {
                            foreach ($answer_img as $key => $answer_img1) {
                           ?>
                           <a href="<?php echo base_url().'uploads/'.$answer_img1['answer_image'];  ?>" title=""><img id="quest_img" src="<?php echo base_url().'uploads/'.$answer_img1['answer_image'];  ?>"    title="" style="height: 61px;width: 67px;"></a>
                           <?php
                        } }  ?>
                    </div>


                        

                    <ul class="connected list trans_tray" style="">

                       

                    </ul>

                    
                       <!--   <div style="">
                      
                         
                        <img id="trans_img" class="help_img" src="" style="display: none;">

                       </div> -->

                       
                </div><!-- transaction-pool -->



                


<div class="table_new">
         <?php

                             foreach ($problem_format as $key => $format) {




      $tabimg = 'table_img'.$key;


      ?>





          <div id="<?=$tabimg?>" data-id="<?=$key?>" data-format="<?=$format['p_format_id']?>" data-tableid="<?=$format['table_id']?>" style="display: none;" <?php if($key==0){ echo 'class ="ans_tab1  problme-tab active" '; }else{ echo 'class="ans_tab1  problme-tab"'; } ?>  >

               <div class="col-lg-12 col-md-10  col-sm-10 col-12" id="" style="border: 1px solid rgba(0, 40, 100, 0.1);">



     <?php

                    $last = 1;

                    //for($k=1;$k<=9;$k++){

                                              $tab = 'table-ft'.$key;

//print_r($problem_format);

                        if(!empty($problem_format)){

                       ?>
                       



                       <div id="<?=$tab?>" data-id="<?=$key?>" data-format="<?=$format['p_format_id']?>" data-tableid="<?=$format['table_id']?>" <?php if($key==0){ echo 'class ="tab-format active" '; }else{ echo 'class="tab-format" style="display:none;"'; } ?>>


                             <?php
                      // if($key==0){ 

                       //print_r($format['p_cols']) ;
                        $table=$format['p_cols'];

                      ?>


 <p class="text-center answer-table-header" style="margin-bottom:-11px;min-height: 36px;font-size: 13px;">
                        <span style="float:left"><?=$table['table_left_title']?></span>
                        <span style="font-size:13px;"><?=$format['format_name']?></span>
                        <span style="float:right"><?=$table['table_right_title']?></span>
                    </p>


                     <div class="answer-table-box table-box card">

                    <!-- <div class="table-box"> -->
                        <table>
                            <tr class="table-header" style="    font-size: 11px;">

                              <?php
                                    $cols = $table['table_columns'];
                                    $cols_name = array($table['column_one_name'],$table['column_two_name'],$table['column_three_name'],$table['column_four_name'],$table['column_five_name'],$table['column_six_name'],$table['column_seven_name'],$table['column_eight_name'],$table['column_nine_name'],$table['column_ten_name']);
                                    $cols_width = array($table['column_one_width'],$table['column_two_width'],$table['column_three_width'],$table['column_four_width'],$table['column_five_width'],$table['column_six_width'],$table['column_seven_width'],$table['column_eight_width'],$table['column_nine_width'],$table['column_ten_width']);
                                    $cols_sum = array($table['column_one_sum'],$table['column_two_sum'],$table['column_three_sum'],$table['column_four_sum'],$table['column_five_sum'],$table['column_six_sum'],$table['column_seven_sum'],$table['column_eight_sum'],$table['column_nine_sum'],$table['column_ten_sum']);
                                       $cols_count = array($table['count_one_table'],$table['count_two_table'],$table['count_three_table'],$table['count_four_table'],$table['count_five_table'],$table['count_six_table'],$table['count_seven_table'],$table['count_eight_table'],$table['count_nine_table'],$table['count_ten_table']);

                                   // $cols_ans = sizeof($tableans);
                                    // $cols_answer = array($tableans['column_one_value'],$tableans['column_two_value'],$tableans['column_three_value'],$tableans['column_four_value'],$tableans['column_five_value'],$tableans['column_six_value'],$tableans['column_seven_value'],$tableans['column_eight_value'],$tableans['column_nine_value'],$tableans['column_ten_value']);

                                    for($i=0;$i<$cols;$i++){
                                    ?>
                                        <td width="<?=$cols_width[$i]?>%" style="background: #ff98009c; border-left: none;"><?=$cols_name[$i]?></td>
                                    <?php
                                    }
                                ?>

                            </tr>


                        </table>

<!--                           </div>      
 -->



                             


<!--                                         <div data-simplebar class="table-box result_dv" style="width:100%;max-width:100%">
 -->                        


                        <table id="result1" class="row_data" style="width: 100%;min-height: 20px;">


                                                                                <?php
                                                           // print_r($format['p_vals']) ;  

                                                            $values=$format['p_vals'];                                                              
                                                            if(!empty($values)){
                                                                      for($m=0;$m<sizeof($values);$m++){
                                                              //foreach ($format['p_vals'] as $key1 => $vals) {


                                                           //print_r($cols_sum[$i]);  

                                                              

                                                                      ?>


                                                                                    <tr>
                                <?php
                               for($i=0;$i<$cols;$i++){

                                $cnt1=$cols_count[$i];
                                     //  print_r($cols_count[$i]);


                                        if($cols_sum[$i]){
                                   foreach ($format['p_vals'] as $key1 => $vals) {
                                    if($vals['column_id']==$i){
                                        if($vals['row_id']==$m){

                                            if($vals['sub_status']==1){

                                                      $cls='sub-tab-tr';
                                                      $style1="";
if($cols_count[$i]!=0){

                                                       $width=$cols_width[$i]/$cols_count[$i];
                                                        }else{

                                                          $width=$cols_width[$i];
                                                          }

                                                      }else{
                                                        $cls='';
                                                         $style1="border-left:1px solid rgba(0,0,0,0.3);";
                                                   $width=$cols_width[$i];

                                                      }


                                                       if($vals['val_underline']==1){

                                                      $cls1='p-line';
                                                      //$width=$cols_width[$i]/$cols_count[$i];


                                                      }else{
                                                        $cls1='';
                                                  // $width=$cols_width[$i];

                                                      }

                                                         if($vals['val_double_underline']==1){

                                                      $cls2='pr-d-line';
                                                      //$width=$cols_width[$i]/$cols_count[$i];


                                                      }else{
                                                        $cls2='';
                                                  // $width=$cols_width[$i];

                                                      }

                                                         if($vals['val_text_line']==1){

                                                      $cls23='pr-u-line';
                                                      //$width=$cols_width[$i]/$cols_count[$i];


                                                      }else{
                                                        $cls23='';
                                                  // $width=$cols_width[$i];

                                                      }




                                        ?>
                                            <td width="<?=$width?>%"  data-id="<?=$key1?>" class="   problem-tr  value_<?=$i?> text-right <?=$cls;?> <?=$cls1?> <?=$cls2?> <?=$cls23?>" data-prblem="<?=$vals['format_id']; ?>" style="border-left: 0px solid rgba(0,0,0,0.5);height: 30px;font-size: 1em;    padding: 3px;background: rgb(255, 235, 204); <?=$style1;?>"><?=$vals['col_value']; ?></td>
                                        <?php
                                        }

                                      }
                                      }
                                        }
                                        else{


                                        foreach ($format['p_vals'] as $key1 => $vals) {
                                                                              if($vals['column_id']==$i){

                                                                                if($vals['row_id']==$m){

                                                                                    if($vals['sub_status']==1){

                                                                                      $cls='sub-tab-tr';
                                                                                      $style1='';
                                                                                      if($cols_count[$i]!=0){

                                                       $width=$cols_width[$i]/$cols_count[$i];
                                                        }else{

                                                          $width=$cols_width[$i];
                                                          }



                                                                                      }else{
                                                                      $cls='';
                                                                      $style1='border-left:1px solid rgba(0,0,0,0.3);';
                                                                        $width=$cols_width[$i];

                                                                                      }


                                                       if($vals['val_underline']==1){

                                                      $cls1='p-line';
                                                      //$width=$cols_width[$i]/$cols_count[$i];


                                                      }else{
                                                        $cls1='';
                                                  // $width=$cols_width[$i];

                                                      }
                                                         if($vals['val_double_underline']==1){

                                                      $cls2='pr-d-line';
                                                      //$width=$cols_width[$i]/$cols_count[$i];


                                                      }else{
                                                        $cls2='';
                                                  // $width=$cols_width[$i];

                                                      }

                                                       if($vals['val_text_line']==1){

                                                      $cls23='pr-u-line';
                                                      //$width=$cols_width[$i]/$cols_count[$i];


                                                      }else{
                                                        $cls23='';
                                                  // $width=$cols_width[$i];

                                                      }



                                        ?>
                                            <td width="<?=$width?>%" class="  problem-tr  value_<?=$i?> <?=$cls?> <?=$cls1?> <?=$cls2?> <?=$cls23?>" data-prblem="<?=$vals['format_id']; ?>" style="border-left: 0px solid rgba(0,0,0,0.5);height: 30px;    font-size: 1em;padding: 3px;background: rgb(255, 235, 204);<?=$style1;?>"><?=$vals['col_value']; ?></td>
                                        <?php
                                        }
                                        }



                                        }
                                      }
                                    }
                                ?>
                            </tr>





                                                                                <?php

                                                                                    }
                                                                                   // }

                                                                                ?>





                                                                            </table>


<!--                            </div>                              
 -->



                         </div>







                             <?php


                    }
                     //}



                    ?>

                   </div>

                 <?php
               }

                     // }
                       ?>

                       </div>
      
  </div>


<?php } ?>

  <!-- table image div -->
                <?php

                    $last = 1;
                    $last1 = 1;
                    $last3 = 1;

                    for($k=1;$k<=9;$k++){

                         $tab = 'table'.$k;
  $tabimg = 'table_img'.$k;
                        $table = $$tab;


                                                 $tabf = 'format_name'.$k;
                                                      $format_name = $$tabf;
                                                   // print_r($format_name1);





                         $tab1 = 'tableans'.$k;

                        $tableans = $$tab1;
                         $last1 = $k;



                            $tab2 = 'table_width'.$k;

                        $table_width = $$tab2;
                         $last2 = $k;


                         $tab6 = 'table_header'.$k;
                         $table_header = $$tab6;






                            $tab2 = 'tableans_sub'.$k;

                        $table_sub = $$tab2;
                         $last3 = $k;

                        if(!empty($table)){

                            $last = $k;
             // print_r($table_width);


                           // if($question['table_img'.$k]){

                  $single_width = $table['table_single_width'];?>


                <div id="<?=$tab?>" data-id="<?=$k?>" data-width="<?=$single_width;?>"   <?php if($k==1){ echo 'class ="tab active ans_tab"';
 }else{ echo 'class="tab ans_tab" style="display:none;"'; } ?>>

                      
                    <!-- <tr style="display: none">
                               
                            </tr> -->

                    <p class="text-center answer-table-header" style="margin-bottom:-11px;min-height: 40px;font-size: 13px;">
                                                <span style="font-size:13px;"><?=$format_name?></span>

                        <span style="float:left"><?=$table['table_left_title']?></span>
                        <span style="float:right"><?=$table['table_right_title']?></span>
                    </p>


                    <div style="color: white;text-align: center; font-size: 0.9em"><?=$table_header['header_note']?></div>
                    <div class="answer-table-box">

                    <div class="table-box">
                        <table>
                            <tr class="table-header">
                                <?php
                                    $cols = $table['table_columns'];

                                    $cols_name = array($table['column_one_name'],$table['column_two_name'],$table['column_three_name'],$table['column_four_name'],$table['column_five_name'],$table['column_six_name'],$table['column_seven_name'],$table['column_eight_name'],$table['column_nine_name'],$table['column_ten_name']);
                                    $cols_width = array($table['column_one_width'],$table['column_two_width'],$table['column_three_width'],$table['column_four_width'],$table['column_five_width'],$table['column_six_width'],$table['column_seven_width'],$table['column_eight_width'],$table['column_nine_width'],$table['column_ten_width']);
                                    $cols_sum = array($table['column_one_sum'],$table['column_two_sum'],$table['column_three_sum'],$table['column_four_sum'],$table['column_five_sum'],$table['column_six_sum'],$table['column_seven_sum'],$table['column_eight_sum'],$table['column_nine_sum'],$table['column_ten_sum']);


                                    $cols_count = array($table['count_one_table'],$table['count_two_table'],$table['count_three_table'],$table['count_four_table'],$table['count_five_table'],$table['count_six_table'],$table['count_seven_table'],$table['count_eight_table'],$table['count_nine_table'],$table['count_ten_table']);


                                     // $cols_img = array($table['table_img1'],$table['table_img2'],$table['table_img3'],$table['table_img4'],$table['table_img5'],$table['table_img6'],$table['table_img7'],$table['table_img8'],$table['table_img9']);
                                    $cols_ans = sizeof($tableans1);
                                    $cols_sub_ans = sizeof($table_sub);

                                    //print_r($cols_sub_ans);

                                 

                                    for($i=0;$i<$cols;$i++){
                                    ?>
                                        <td width="<?=$cols_width[$i]?>%"><?=$cols_name[$i]?></td>
                                    <?php
                                    }
                                ?>
                            </tr>
                        </table>

                    </div>

                    <div data-simplebar class="table-box result_dv" style="width:100%;max-width:100%">
                        <table id="result1" class="row_data">
                           <?php
                             ?> 
                            <tr class="hidden" style="display:none;">
                                    <?php
                                    for($i=0;$i<$cols;$i++){

                                       

                                        if($cols_sum[$i]){

                                                if($cols_count[$i]!=0){
                                                    $class="connected  itemconnect value_".$i." text-right";
                                                   }else{
                                                    $class="connected empty itemconnect value_".$i." text-right";
                                                   }

                                        ?>
                                            <td width="<?=$cols_width[$i]?>%" class="<?=$class;?>">
                                        <?php if($cols_count[$i]!=0){
                                                $width=100/$cols_count[$i];
                                                     ?>
                                                
                                                     <table>
                                                        <tr>
                                                            <?php 

                                                       



                                                   for ($sub=0; $sub <sizeof($table_width) ; $sub++) { 

                                              

                                                 // if($table_width[$sub]['column_id']==$i+1){

                                                     if($table_width[$sub]['is_sum']==1){

                                                 

                                                   ?>
                                                   
                                                           <td width="<?=$table_width[$sub]['width'];?>%" class="sub_table connected text-right" >
                                                        
                                                           </td> 
                                                         <?php
                                                 }
                                                 else{
                                                    ?>
                                               
                                                     <td width="<?=$table_width[$sub]['width'];?>%" class="sub_table connected">
                                                        
                                                           </td> 
                                                         <?php

                                                 }

                                             //}

                                               } ?>
                                                         
                                                           
                                                        </tr>
                                                      </table>
                                                   <?php
                                        } ?>

                                            </td>
                                        <?php
                                        }
                                        else{

                                             if($cols_count[$i]!=0){
                                                    $class="connected   itemconnect value_".$i." ";
                                                   }else{
                                                    $class="connected empty itemconnect value_".$i." ";
                                                   }
                                        ?>
                                            <td width="<?=$cols_width[$i]?>%" class="<?=$class;?>">
                                                
                                                <?php if($cols_count[$i]!=0){
                                                     $width=100/$cols_count[$i];
                                        ?>
                                                 <table>
                                                    <tr>
                                                    <!--    <?php for ($sub=0; $sub <$cols_count[$i] ; $sub++) { 
                                                           ?>
                                                           <td width="<?=$width;?>%" class="sub_table connected">
                                                        
                                                      </td> 
                                                         <?php } ?> -->

                                                            <?php 

                                                       

 // $cols_wid = sizeof($table_width[$i]['column_id']);
                                                        // if($table_width[$i]['column_id'])

                                                       for ($sub=0; $sub <sizeof($table_width) ; $sub++) { 

                                               //  print_r($i);
                                                        

                                                 //if($table_width[$sub]['column_id']==$i+1){
                                                    if($table_width[$sub]['is_sum']==1){
                                                 

                                                   ?>                                                           <td width="<?=$table_width[$sub]['width'];?>%" class="sub_table connected text-right">
                                                        
                                                           </td> 
                                                         <?php
                                                 }else{
                                                    ?>
                                                   
                                                     <td width="<?=$table_width[$sub]['width'];?>%" class="sub_table connected ">
                                                        <?php
                                                 }

                                          //}          

                                               
                                                        
                                                          
                                                        
                                                               
                                                        
                                                         } ?>
                                                    </tr>
                                                  </table>

                                                  <?php
                                        }?>
                                            </td>
                                        <?php
                                        }
                                    }
                                ?>
                            </tr>





                            <tr class="hidden_new" style="display: none">
                                <?php
                                    for($i=0;$i<$cols;$i++){

                                       

                                        if($cols_sum[$i]){
                                        ?>
                                            <td width="<?=$cols_width[$i]?>%" class="connected empty itemconnect value_<?=$i?> text-right">
                                        <?php if($cols_count[$i]!=0){
                                                $width=100/$cols_count[$i];
                                                     ?>
                                                
                                                     <table>
                                                        <tr>
                                                            <?php for ($sub=0; $sub <$cols_count[$i] ; $sub++) { 
                                                               ?>
                                                               
                                                               <td width="<?=$width;?>%" class="sub_table connected ">
                                                            
                                                          </td> 
                                                             <?php } ?>
                                                         
                                                           
                                                        </tr>
                                                      </table>
                                                   <?php
                                        } ?>

                                            </td>
                                        <?php
                                        }
                                        else{
                                        ?>
                                            <td width="<?=$cols_width[$i]?>%" class="connected empty itemconnect value_<?=$i?>">
                                                
                                                <?php if($cols_count[$i]!=0){
                                                     $width=100/$cols_count[$i];
                                        ?>
                                                 <table>
                                                    <tr>
                                                       <?php for ($sub=0; $sub <$cols_count[$i] ; $sub++) { 
                                                           ?>
                                                           
                                                           <td width="<?=$width;?>%" class="sub_table connected">
                                                        
                                                      </td> 
                                                         <?php } ?>
                                                    </tr>
                                                  </table>

                                                  <?php
                                        }?>
                                            </td>
                                        <?php
                                        }
                                    }
                                ?>
                            </tr>



                            <?php 
                    if(!empty($tableans))
                    {
                        
                          $ids=array();  
                                    $cols_ans = sizeof($tableans);
                                     $id_new=0;
                                     for($m=0;$m<$cols_ans;$m++){

                                        
                                        //print_r($tableans[$m]['id']);

                                            $cols_answer = array($tableans[$m]['column_one_value'],$tableans[$m]['column_two_value'],$tableans[$m]['column_three_value'],$tableans[$m]['column_four_value'],$tableans[$m]['column_five_value'],$tableans[$m]['column_six_value'],$tableans[$m]['column_seven_value'],$tableans[$m]['column_eight_value'],$tableans[$m]['column_nine_value'],$tableans[$m]['column_ten_value']);
                                           // print_r($cols_answer);
                                           $cols_underline = array($tableans[$m]['column_one_underline'],$tableans[$m]['column_two_underline'],$tableans[$m]['column_three_underline'],$tableans[$m]['column_four_underline'],$tableans[$m]['column_five_underline'],$tableans[$m]['column_six_underline'],$tableans[$m]['column_seven_underline'],$tableans[$m]['column_eight_underline'],$tableans[$m]['column_nine_underline']);

                                            $cols_doubleline = array($tableans[$m]['column_one_doubleline'],$tableans[$m]['column_two_doubleline'],$tableans[$m]['column_three_doubleline'],$tableans[$m]['column_four_doubleline'],$tableans[$m]['column_five_doubleline'],$tableans[$m]['column_six_doubleline'],$tableans[$m]['column_seven_doubleline'],$tableans[$m]['column_eight_doubleline'],$tableans[$m]['column_nine_doubleline']);


                                            $cols_textline = array($tableans[$m]['column_one_textline'],$tableans[$m]['column_two_textline'],$tableans[$m]['column_three_textline'],$tableans[$m]['column_four_textline'],$tableans[$m]['column_five_doubleline'],$tableans[$m]['column_six_textline'],$tableans[$m]['column_seven_textline'],$tableans[$m]['column_eight_textline'],$tableans[$m]['column_nine_textline']); 

                                            ?>
                                 <tr class="ans_tr">
                                  
                                <?php

                            for($i=0;$i<$cols;$i++)
                            {

                                                       if($cols_underline[$i]=='1'){


                                                            $style="0px";
                                                            $cls=' underline';

                                                        }else{
                                                            $style="0px";
                                                            $cls='';
                                                        }

                                                         if($cols_doubleline[$i]=='1'){


                                                            $style="0px";
                                                            $cls222=' ans-d-line';

                                                        }else{
                                                            $style="0px";
                                                            $cls222='';
                                                        }


                                                       if($cols_textline[$i]=='1'){


                                                            $style="0px";
                                                            $cls223=' ans-t-line';

                                                        }else{
                                                            $style="0px";
                                                            $cls223='';
                                                        }
                                             
                                                   
                                            if($cols_sum[$i]){


                                                          if($cols_count[$i]!=0){

                                                            $class="itemconnect  itemconnect value_".$i." text-right ".$cls.$cls222.$cls223;
                                                           }else{
                                                            $class="itemconnect empty_fixed itemconnect value_".$i." text-right ".$cls.$cls222.$cls223;
                                                           }

                                                ?>
                                                            <td width="<?=$cols_width[$i]?>%" data-column="<?php echo $i ;?>"  data-ansid="<?=$tableans[$m]['id'];?>"   data-id="<?php echo $m ;?>" class="<?=$class;?>"  style="height: 29px;border-bottom-width: <?php echo $style ;?>;border-bottom-style: solid;border-bottom-color: black;" >
                                                         



                                                        <?php  
                                                        if($cols_count[$i]!=0){


                                            

                                                                $width=100/$cols_count[$i];
                                                                ?>


                                                      <table>
                                                        <tr>
                                                            <?php for ($sub=0; $sub <sizeof($table_width) ; $sub++) {

                                                             // print_r($sub);

                                                                 // $cols_sub_width = array($table_width[$sub]['table_width1'],$table_width[$sub]['table_width2'],$table_width[$sub]['table_width3'],$table_width[$sub]['table_width4'],$table_width[$sub]['table_width5'],$table_width[$sub]['table_width6'],$table_width[$sub]['table_width7'],$table_width[$sub]['table_width8'],$table_width[$sub]['table_width9']);

                                                                //if($table_width[$sub]['column_id']==$i){



                                                                    if($table_width[$sub]['is_sum']==1){
                                                                      // echo "string";
                                                 

                                                   ?> 
                                                           <td width="<?=$table_width[$sub]['width'];?>%" class="sub_table connected text-right">

                                                           <!--    <?php
                                                              if($cols_answer[$i]){
                                                                ?>  <li class="disc1" style="display: none;"><?=$cols_answer[$i]?></li>


                                                                 <?php  
                                                            } ?> -->
                                                            <?php
                                                                  // if($cols_answer[$i]){
                                                                    
                                                                    $ids1=array(); 
                                                                  
                                                          for ($sub1=0; $sub1 <$cols_sub_ans ; $sub1++) { 

                                                        // $cols_sub_width = array($table_sub[$sub]['table_width1'],$table_width[$sub]['table_width2'],$table_width[$sub]['table_width3'],$table_width[$sub]['table_width4'],$table_width[$sub]['table_width5'],$table_width[$sub]['table_width6'],$table_width[$sub]['table_width7'],$table_width[$sub]['table_width8'],$table_width[$sub]['table_width9']);

                                                                   

                                                                     if($table_sub[$sub1]['column_id']==$i){
                                                                       if($table_sub[$sub1]['rows']==$m){
                                                                        
                                                                        // if (!in_array($table_sub[$sub1]['id'], $ids)){
                                                                         if ($id_new!=$table_sub[$sub1]['id']){

                                                                               $id_new=$table_sub[$sub1]['id'];



                                                                                if($table_sub[$sub1]['is_underline']=='1'){


                                                                                     $class="td_line";
                                                                                    $style1="display: none;border: none;border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: black;";
                                                                                }else{
                                                                                     $class="";
                                                                                      $style1="display: none;border: none";
                                                                                }
                                                                               // style="height: 29px;"

                                                                               if(!in_array($table_sub[$sub1]['id'], $ids)){

                                                                                array_push($ids, $table_sub[$sub1]['id']);
                                                                             
                                                                            // array_push($ids, $table_sub[$sub1]['id']);

                                                                        
                                                                            ?>  <li class="disc1 <?=$class;?> " style="border: none;"><?=$table_sub[$sub1]['ans_values']?></li>


                                                                             <?php 
                                                                             break;
                                                                         }

                                                                   }

                                                                         
                                                                       } 
                                                                    }



                                                                    }?>
                                                        
                                                           </td> 
                                                         <?php
                                                 }
                                                 else{
                                                    ///888///
                                                    ?>
                                                     
                                                    <td width="<?=$table_width[$sub]['width'];?>%" data-ansid="<?=$tableans[$m]['id'];?>" data-column="<?php echo $i ;?>" class="sub_table connected">
                                                        <?php
                                                                          // if($cols_answer[$i]){
                                                                    
                                                                    $ids1=array(); 


                                                                 
                                                                   
                                                          for ($sub1=0; $sub1 <$cols_sub_ans ; $sub1++) { 


                                                        // $cols_sub_width = array($table_sub[$sub]['table_width1'],$table_width[$sub]['table_width2'],$table_width[$sub]['table_width3'],$table_width[$sub]['table_width4'],$table_width[$sub]['table_width5'],$table_width[$sub]['table_width6'],$table_width[$sub]['table_width7'],$table_width[$sub]['table_width8'],$table_width[$sub]['table_width9']);
       
                                                                   

                                                                     if($table_sub[$sub1]['column_id']==$i){
                                                                       if($table_sub[$sub1]['rows']==$m){
                                                                        
                                                                        // if (!in_array($table_sub[$sub1]['id'], $ids)){
                                                                         if ($id_new!=$table_sub[$sub1]['id']){

                                                                               $id_new=$table_sub[$sub1]['id'];


                                                                               if($table_sub[$sub1]['is_underline']=='1'){


                                                                                    $class="td_line";
                                                                                    $style1="display: none;border: none;border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: black;";
                                                                                }else{
                                                                                     $class="";
                                                                                      $style1="display: none;border: none";
                                                                                }


                                                                                if(!in_array($table_sub[$sub1]['id'], $ids)){

                                                                                array_push($ids, $table_sub[$sub1]['id']);
                                                                             
                                                                            // array_push($ids, $table_sub[$sub1]['id']);

                                                                        
                                                                            ?>  <li class="disc1 <?=$class;?>" style="border: none;" data-id="<?=$table_sub[$sub1]['id']?>"><?=$table_sub[$sub1]['ans_values']?></li>


                                                                             <?php 
                                                                             break;
                                                                         }

                                                                      }

                                                                         
                                                                       } 
                                                                    }



                                                                    }?>
                                                    </td>
                                                        <?php
                                                 }
                                             //}
                                                               

                                             } ?>
                                                         
                                                           
                                                        </tr>
                                            </table>

                                                                    
                                                       <?php
                                                              
                                                      }else{
                                                                    


                                                                        if($cols_answer[$i]){
                                                                ?>  <li class="disc1" style=""><?=$cols_answer[$i]?></li>


                                                                 <?php  
                                                                 }



                                                                   
                                                        }
                                                        ?>




                                                    </td>
                                                <?php
                                            }
                                            else{

                                                ////////////////////////////////////hfgjgfgf//////////// 
                                                if($cols_count[$i]!=0){
                                                            $class="itemconnect  itemconnect value_".$i." ".$cls.$cls222;
                                                           }else{
                                                            $class="itemconnect empty_fixed itemconnect value_".$i." ".$cls.$cls222;
                                                           }
                                                    ?>
                                                        <td width="<?=$cols_width[$i]?>%" data-column="<?php echo $i ;?>" data-ansid="<?=$tableans[$m]['id'];?>" data-id="<?php echo $m ;?>" class="<?=$class;?>" style="height: 29px;border-bottom-width: <?php echo $style ;?>;border-bottom-style: solid;border-bottom-color: black;">


                                                                     <?php 
                                                                     
                                                        if($cols_count[$i]!=0){


                                                          $width=100/$cols_count[$i];
                                                                ?>


                                                                 <table>
                                                                    <tr>
                                                                        <?php  
                                                                   $id1_new=0;
                                                                 //print_r($table_sub) ;     
   
                                                         for ($sub=0; $sub <sizeof($table_width) ; $sub++) {
                                                        

                                                                     
                                                                            // print_r($table_sub[0]['ans_values']);

                                                                            // $cols_sub_width = array($table_width[$sub]['table_width1'],$table_width[$sub]['table_width2'],$table_width[$sub]['table_width3'],$table_width[$sub]['table_width4'],$table_width[$sub]['table_width5'],$table_width[$sub]['table_width6'],$table_width[$sub]['table_width7'],$table_width[$sub]['table_width8'],$table_width[$sub]['table_width9']);
                                                                            
                                                                           // if($table_width[$sub]['column_id']==$i){

                                                                                if($table_width[$sub]['is_sum']==1){
                                                             

                                                               ?>
                                                                
                                                                       <td width="<?=$table_width[$sub]['width'];?>%" class="sub_table_fixed connected text-right ">


                                       <?php
                                                                  // if($cols_answer[$i]){
                                                                    
                                                                    $ids1=array(); 
                                                                 //print_r($table_sub);
   
                                                                  
                                                          for ($sub1=0; $sub1 <$cols_sub_ans ; $sub1++) { 

                                                        // $cols_sub_width = array($table_sub[$sub]['table_width1'],$table_width[$sub]['table_width2'],$table_width[$sub]['table_width3'],$table_width[$sub]['table_width4'],$table_width[$sub]['table_width5'],$table_width[$sub]['table_width6'],$table_width[$sub]['table_width7'],$table_width[$sub]['table_width8'],$table_width[$sub]['table_width9']);

                                                            
      
 
                                                                     if($table_sub[$sub1]['column_id']==$i){
                                                                       if($table_sub[$sub1]['rows']==$m){
                                                                      
                                                                        // if (!in_array($table_sub[$sub1]['id'], $ids)){
                                                                         if ($id_new!=$table_sub[$sub1]['id']){

                                                                               $id_new=$table_sub[$sub1]['id'];
                                                                            
                                                                                 if($table_sub[$sub1]['is_underline']=='1'){


                                                                                     $class="td_line";
                                                                                    $style1="display: none;border: none;border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: black;";
                                                                                }else{
                                                                                     $class="";
                                                                                      $style1="display: none;border: none";
                                                                                }


                                                                               if(!in_array($table_sub[$sub1]['id'], $ids)){
                                                                               array_push($ids, $table_sub[$sub1]['id']);
                                                                              
                                                                              

                                                                        
                                                                            ?>  <li class="disc1 <?=$class;?>" style="border: none;" data-id="<?=$table_sub[$sub1]['id']?>"><?=$table_sub[$sub1]['ans_values']?></li>


                                                                             <?php 
                                                                             // unset($table_sub[$sub1]['ans_values']);
                                                                          break;
                                                                      }

                                                                   }

                                                                         
                                                                       } 
                                                                    }



                                                                    }?>
                                                                    
                                                                       </td> 
                                                                     <?php
                                                             }
                                                             else{
                                                                ?>
                                                              
                                                                <td width="<?=$table_width[$sub]['width'];?>%"  class="sub_table_fixed connected">
                                                                     <?php
                                                                          // if($cols_answer[$i]){
                                                                    
                                                                    $ids1=array(); 
                                                                     // print_r($table_sub); 
                                                                   // print_r($table_sub);

                                                          for ($sub1=0; $sub1 <$cols_sub_ans ; $sub1++) { 
 //print_r($table_sub[$sub1]); 

                                                        // $cols_sub_width = array($table_sub[$sub]['table_width1'],$table_width[$sub]['table_width2'],$table_width[$sub]['table_width3'],$table_width[$sub]['table_width4'],$table_width[$sub]['table_width5'],$table_width[$sub]['table_width6'],$table_width[$sub]['table_width7'],$table_width[$sub]['table_width8'],$table_width[$sub]['table_width9']);
       
                                                                   
                                                                     if($table_sub[$sub1]['column_id']==$i){
                                                                       if($table_sub[$sub1]['rows']==$m){
                                                                        
                                                                        // if (!in_array($table_sub[$sub1]['id'], $ids)){
                                                                         if ($id_new!=$table_sub[$sub1]['id']){

                                                                               $id_new=$table_sub[$sub1]['id'];
                                                                           
                                                                               if($table_sub[$sub1]['is_underline']=='1'){


                                                                                     $class="td_line";
                                                                                    $style1="display: none;border: none;border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: black;";
                                                                                }else{
                                                                                     $class="";
                                                                                      $style1="display: none;border: none";
                                                                                }


                                                                              if(!in_array($table_sub[$sub1]['id'], $ids)){

                                                                            array_push($ids, $table_sub[$sub1]['id']);
                                                                           
                                                                        
                                                                            ?>  <li class="disc1 <?=$class;?>" style="
                                                                            border: none;" data-id="<?=$table_sub[$sub1]['id']?>"><?=$table_sub[$sub1]['ans_values']?></li>


                                                                             <?php 
                                                                              // unset($table_sub[$sub1]['ans_values']);
                                                                        break;
                                                                    }

                                                                   }

                                                                         
                                                                       } 
                                                                    }



                                                                    }?>



                                                                </td>
                                                                    <?php
                                                             }
                                                        // }
                                                                           
                                 $id1_new=$id_new;
                                                         } 
                                                         ?>
                                                                     
                                                                       
                                                                    </tr>
                                                        </table>

                                                                    
                                                       <?php
                                                              
                                                                }else{
                                                                    


                                                                        if($cols_answer[$i]){
                                                                ?>  <li class="disc1" style=""><?=$cols_answer[$i]?></li>


                                                                 <?php  
                                                                       }
                                                                }







                                                          

                                                          ?>
                                <!-- <li class="disc1" style="display: none;"><?=$cols_answer[$i]?></li> 
                                 -->

                                                        </td>
                                                    <?php
                                                }
                            }
                                ?>
                                  <input type="hidden" name="" id="predefined" value="1">
                            </tr>
                                            
                                        <?php
                    } 
                } 
                                         else{
                                        ?>
                            <tr class="ans_tr">
                                
                                <?php
                                    for($i=0;$i<$cols;$i++){

                                       

                                        if($cols_sum[$i]){

                                                if($cols_count[$i]!=0){
                                                    $class="connected  itemconnect value_".$i." text-right";
                                                   }else{
                                                    $class="connected empty itemconnect value_".$i." text-right";
                                                   }

                                        ?>
                                            <td width="<?=$cols_width[$i]?>%" class="<?=$class;?>">
                                        <?php if($cols_count[$i]!=0){

                                            

                                                $width=100/$cols_count[$i];
                                                     ?>
                                                
                                                     <table>
                                                        <tr>
                                                            <?php for ($sub=0; $sub <sizeof($table_width) ; $sub++) { 

                                                                 // $cols_sub_width = array($table_width[$sub]['table_width1'],$table_width[$sub]['table_width2'],$table_width[$sub]['table_width3'],$table_width[$sub]['table_width4'],$table_width[$sub]['table_width5'],$table_width[$sub]['table_width6'],$table_width[$sub]['table_width7'],$table_width[$sub]['table_width8'],$table_width[$sub]['table_width9']);

                                                                if($table_width[$sub]['column_id']==$i+1){

                                                                    if($table_width[$sub]['is_sum']==1){
                                                 

                                                   ?> 
                                                           <td width="<?=$table_width[$sub]['width'];?>%" class="sub_table connected text-right">
                                                        
                                                           </td> 
                                                         <?php
                                                 }
                                                 else{
                                                    ?>
                                                     
                                                    <td width="<?=$table_width[$sub]['width'];?>%" class="sub_table connected">
                                                        <?php
                                                 }
                                             }
                                                               

                                             } ?>
                                                         
                                                           
                                                        </tr>
                                                      </table>
                                                   <?php
                                        } ?>

                                            </td>
                                        <?php
                                        }
                                        else{


                                             if($cols_count[$i]!=0){
                                                    $class="connected   itemconnect value_".$i." ";
                                                   }else{
                                                    $class="connected empty itemconnect value_".$i." ";
                                                   }
                                        ?>
                                            <td width="<?=$cols_width[$i]?>%" class="<?=$class;?>">
                                                
                                                <?php if($cols_count[$i]!=0){

                                                    $width=100/$cols_count[$i];
                                        ?>
                                                 <table>
                                                    <tr>


                                                       <?php 


 // $cols_wid = sizeof($table_width[$i]['column_id']);
                                                        // if($table_width[$i]['column_id'])

                                                       for ($sub=0; $sub <sizeof($table_width) ; $sub++) { 
// print_r($i);
                                               //  print_r($i);

                                                 if($table_width[$sub]['column_id']==$i){
                                                        if($table_width[$sub]['is_sum']==1){

                                                   ?>
                                                   
                                                           <td width="<?=$table_width[$sub]['width'];?>%" class="sub_table connected text-right">
                                                        
                                                           </td> 
                                                         <?php

                                                     }else{
                                                        ?>
                                                        
                                                        <td width="<?=$table_width[$sub]['width'];?>%" class="sub_table connected">
                                                            <?php
                                                     }
                                                 }

             

                                               
                                                        
                                                          
                                                        
                                                                  // $cols_sub_column = array($table_width[$sub]['column_id'],$table_width[$sub]['column_id'],$table_width[$sub]['column_id'],$table_width[$sub]['column_id'],$table_width[$sub]['column_id'],$table_width[$sub]['column_id'],$table_width[$sub]['column_id'],$table_width[$sub]['width'],$table_width[$sub]['column_id']);
                                                        
                                                         } ?>
                                                    </tr>
                                                  </table>

                                                  <?php
                                        }?>
                                            </td>
                                        <?php
                                        }
                                    }
                                ?>

                               <input type="hidden" name="" id="predefined" value="0"> 
                            </tr>
                      
<?php
                                        }?>

                            <!-- <tr class="results_tr">
                                <?php
                                    for($i=0;$i<$cols;$i++){
                                        if($cols_sum[$i]){
                                            echo '<td class="result result_'.$i.'" data_id="'.$i.'"></td>';
                                        }
                                        else{
                                            echo '<td class=""></td>';
                                        }
                                    }
                                ?>
                            </tr> -->
                        </table>

                    </div><!-- table box -->
                </div><!-- /.answer table box -->

                <div style="color: white;font-size: 1.1em"><?=$table_header['footer_note']?></div>

                </div>




               
 

<?php }?>









                <?php

                        }

                   // }

                ?>

                <input type="hidden" id="tab-last" value="<?=$last?>">

            </div>

            </div><!-- /.answer area -->

        </div>
         </div><!-- /.row -->
<div class="img_hidden" style="display: none;min-height: 100vh;padding-bottom: 80px;overflow-y: auto;
    max-height: 90vh;"></div>



         <div class="col-12 bottom-controls">




                          <div class="problem-controls"  style="    margin-left: 100px;">

                         <a href="#" class="buttons float-left mr-10p1  draw_tools_new help_txt" id="undo-btn"><img src="<?= base_url().'assets_main/assets/images/help-1.png';?>"><p style="margin-bottom: 2px">Help</p> 
</a>
                         <a href="#" class="buttons float-left mr-10p  draw_tools_new show_help_image" id="undo-btn"><img src="<?= base_url().'assets_main/assets/images/help-2.png';?>"></a>

                         </div>

                         <!--            <div class="problem-controls">

                         <a href="#" class="buttons float-left mr-10p  draw_tools_new" id="undo-btn"><img src="<?= base_url().'assets_main/assets/images/note.png';?>"><p style="margin-bottom: 2px">Note</p> 
</a>
                        

                         </div> -->


                        <!-- <div class="problem-controls">

                         <a href="#" class="buttons float-left mr-10p show_answer_keys  draw_tools_new" id="show_answer_keys"><img src="<?= base_url().'assets_main/assets/images/drop-keys.png';?>"><p style="margin-bottom: 2px"> Keys</p> </a>
                        

                         </div>
 -->



<!--                 <a href="#" class="buttons float-left show_image_answer">Problem Format</a>
 -->
                 <div class="number-controls" style="    margin: 0 1px 0 0;">
                    
                    <ul>

                        <li><a href="#" class="shift_left_pr pr-pag-link"><i class="fas fa-caret-left"></i></a></li>

                        <!-- <li  data-id="1"><a href="#" data-id="1" class="pag_link">1</a></li> -->
                        <li class="" data-id="2"><a href="#" style="width: 23px;    color: #354052;" data-id="2" class="show_image_answer"> <img src="<?= base_url().'assets_main/assets/images/problem-format.png';?>"></a></li>

                         <li  data-id="1"><a href="#" data-id="1" class="pag_link_pr pr-pag-link">1</a></li> 
                         <li  data-id="1"><a href="#" data-id="2" class="pag_link_pr pr-pag-link">2</a></li> 

<!--                         <li data-id="3"><a href="#" data-id="3" class="pag_link">3</a></li>
 -->                        <li><a href="#" class="shift_right_pr pr-pag-link"><i class="fas fa-caret-right"></i></a></li>
                    </ul>
                    <p style="text-align: center;font-size: 11px;">PROBLEM FORMAT</p>
                </div>



                <div class="number-controls ml-20p" style="    margin: 0 3px 0 0;">
                    <ul>
                      <!--   <li><a href="#" style="    width: 18px;" class="horizontal"><img src="<?= base_url().'assets_main/assets/images/top-down-arrow.png';?>"></a></li> -->

                        <li><a href="#" class="q_left"><i class="fas fa-caret-left"></i></a></li>
                        <li class="active" data-id="1"><a href="#" data-id="1" class="q_link active">1</a></li>
                        <li  data-id="2" ><a href="#" data-id="2" class="q_link">2</a></li>
<!--                         <li data-id="3"><a href="#" data-id="3" class="q_link">3</a></li>
 -->                        <li><a href="#" class="q_right"><i class="fas fa-caret-right"></i></a></li>
                    </ul>
                                        <p style="text-align: center;font-size: 11px;">QUESTION</p>

                </div>


                <div class="number-controls" style="    margin: 0 4px 0 0;">

<!--                     <h4></h4>
 -->                    <ul>
                        <li><a href="#" class="ans-pag-link shift_left"><i class="fas fa-caret-left"></i></a></li>
                        <li class="active"  data-id="1"><a href="#" data-id="1" class="ans-pag-link pag_link active">1</a></li>
                        <li  data-id="2"><a href="#" data-id="2" class="ans-pag-link  pag_link">2</a></li>
<!--                         <li data-id="3"><a href="#" data-id="3" class="pag_link">3</a></li>
 -->                        <li><a href="#" class="ans-pag-link shift_right"><i class="fas fa-caret-right"></i></a></li>
<!--  <li><a href="#" style="    width: 18px;" class="horizontal-answer"><img src="<?= base_url().'assets_main/assets/images/top-down-arrow.png';?>"></a></li> -->
                    </ul>

                                        <p style="text-align: center;font-size: 11px">ANSWER</p>

                </div>
                <div class="preview-controls problem-controls" style="    margin: 0 4px 0 0;margin-top: 1px">
<!--                     <h4></h4>
 -->                    <ul style="">
                        <li class="preview"><a href="#" style="padding: 0 1px;min-width: 30px;" class="show_question show_question_new">Q</a></li>
                        <li class="active preview"><a href="#" style="padding: 0 1px;min-width: 30px;"  class="show_full">Q & A</a></li>
                        <li class="preview"><a href="#" style="padding: 0 1px;min-width: 30px;"  class="show_answer">A</a></li>
                    </ul>
                    <p  style="text-align: center;font-size: 11px;">PREVIEW</p>

                </div>
                
                

                <!--  <div class="problem-controls">

                         <a href="#" class="buttons float-left mr-10p  draw_tools_new" id="full-answer-btn"><img src="<?= base_url().'assets_main/assets/images/answer.png';?>"><p style="margin-bottom: 2px">Answer</p> </a>
                        

                </div> -->

                <!--  <div class="problem-controls">

                         <a href="#" class="buttons float-left mr-10p  draw_tools_new" id="full-answer-btn"><img src="<?= base_url().'assets_main/assets/images/answer.png';?>"><p style="margin-bottom: 2px">Answer</p> </a>
                        

                </div> -->

                <!--  <div class="problem-controls">

                         <a href="#" class="buttons float-left mr-10p1 add_new_row draw_tools_new" id="add_new_row"><img src="<?= base_url().'assets_main/assets/images/Row-plus.png';?>"><p style="margin-bottom: 2px">Row</p> </a>
                         <a href="#" class="buttons float-left mr-10p remove_new_row draw_tools_new" id="remove_new_row"><img src="<?= base_url().'assets_main/assets/images/Row-minus.png';?>"><p style="margin-bottom: 2px"></p> </a>
                        

                </div> -->



              <!--     <div class="problem-controls">

                         <a href="javascript:void(0)" class="buttons float-left mr-10p1 minus_input draw_tools_new" id="minus_input"  data-sum="0"><img src="<?= base_url().'assets_main/assets/images/calculations-1.png';?>"><p style="margin-bottom: 2px">Calculations</p> </a>
                         <a href="javascript:void(0)" class="buttons float-left mr-10p1 plus_input draw_tools_new" id="plus_input"><img src="<?= base_url().'assets_main/assets/images/calculations-2.png';?>"><p style="margin-bottom: 2px"></p> </a>
                         <a href="javascript:void(0)" class="buttons float-left mr-10p1 copy_sum draw_tools_new" id="copy_sum"><img src="<?= base_url().'assets_main/assets/images/calculations-3.png';?>"><p style="margin-bottom: 2px"></p> </a>
                         <a href="javascript:void(0)" class="buttons float-left mr-10p equal_result draw_tools_new" id="equal_result"><img src="<?= base_url().'assets_main/assets/images/calculations-4.png';?>"><p style="margin-bottom: 2px"></p> </a>
                        

                </div> -->

<!--                 <a href="#" class="buttons float-left mr-10p show_answer_keys">answer keys</a>
 -->

               

               <!--  <div class="board-color">
                    <h4>Board Color</h4>
                    <div class="selected_color">
                        <ul>
                        <li><a href="#"  class="whitebg wh_board"></a></li>
                        <li><a href="#" class="blackbg b_board"></a></li>
                        <li><a href="#" class="transparent trans_board"></a></li>
                        </ul>
                    </div>
                </div> -->
                <!-- /.boar-color -->
               <!--  <div class="pencil-color">
                    <h4>Pencil Color</h4>
                    <div class="selected_color">
                        <ul>
                        <li><a href="#" id="pen" data-color="white" class="whitebg pen"></a></li>
                        <li><a href="#" id="pen" data-color="red" class="redbg pen"></a></li>
                        <li><a href="#" id="pen" data-color="black" class="blackbg pen"></a></li>
                        </ul>
                    </div>
                </div> -->

    <!--            <a href="#" class="buttons float-left mr-10p  draw_tools" id="eraser"><i class="fas fa-eraser"></i></a>
               <a href="#" class="buttons float-left mr-10p  draw_tools" onclick="clearCanvas()" ><i class="fas fa-sync"></i>
                 <a href="#" class="buttons float-left mr-10p remove_canvas draw_tools"  id="remove_canvas">R</a>


</a> -->

                
               
                <!-- /.boar-color -->

          <!--         <div class="" style="    float: right;background: transparent;
    min-height: 54px;opacity: 90%">

                         <a href="#" class="buttons float-left mr-10p  show_full_screen draw_tools_new" id="" style="margin-top: 5px;background: transparent;"><img src="<?= base_url().'assets_main/assets/images/full-screen.png';?>"> </a>
                         
                        

                </div>
                   <div class="" style="    float: right;background: transparent;
    min-height: 54px;opacity: 90%">

                         <a href="#" class="buttons float-left mr-10p hide-bottom-keys draw_tools_new" id=""  style="margin-top: 5px;background: transparent;"><img src="<?= base_url().'assets_main/assets/images/down-arrow1.png';?>"> </a>
                         
                        

                </div> -->





                

<!--                 <a href="#" class="full-screen show_full_screen">Full Screen</a>
 -->            </div>
           


        </div><!-- left block COL_10 -->

                 </div>
                
            </div>
    </div>
</div>

<div class="op_controll operation ">

        <div class="refresh_screen op " title="Refresh (S)" > <i class="fas fa-sync-alt"></i></div>

        <div class="add_new_row op " title="Insert New Row (N)" > <i class="fas fa-plus-circle"></i></div>

        <div class="remove_new_row op" title="Remove Row(R)" > <i class="fas fa-minus-circle"></i></div>

        <div class="refresh_result op " title="Calculate(C)"> <i class="fas fa-calculator"></i></div>



       

        <div class="show_question op " title="Question(Q)"> <i class="fas fa-dice-one"></i></div>

        <div class="show_answer op " title="Answer(A)"><i class="fas fa-dice-two"></i></div>

        <div class="show_full op " title="Full Screen(F)"><i class="fas fa-dice-three"></i></div>
        <div class="show_image op " title="Image(I)"><i class="fas fa-dice-two"></i></div>
        <div class="show_image_answer op " title="Image(I)"><i class="fas fa-dice-two"></i></div>
         <div class="show_help_image op " title="Help Image(I)"><i class="fas fa-image"></i></div>

    </div>
</div>

<div id="getModal-help" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 800px;    margin-top: 100px;">

    <!-- Modal content-->
    <div class="modal-content" style="border: 3px solid #607d8bdb;">
      <div class="modal-header" style="background-color: #fdeb10de;padding: .6rem;">
        <h4 class="modal-title" style="text-transform: none;color: white">Help Text</h4>

      </div>
      <div class="modal-body">

        <div class="row table-det">
            <div class="col-md-12 col-lg-12 qst-area" style="">
                <p class="help-content">ghdhfjhfj</p>
                </div>

            
            
        </div>
      </div>
      <div class="modal-footer" style="background-color: #fdeb10de;">
                              <input type="hidden" class="" name="" id="table_tval" value="">
                              <input type="hidden" class="" name="" id="table_torder" value="">
                              


      <!--   <button type="button" id="add_qst_table_val" class="btn btn-info add_qst_table_val" data-id="">Add</button> -->
<!--          <button type="button" id="show_quest_table" class="btn btn-info add_qst_table_val" data-id="">Add</button>
 -->      </div>
    </div>

  </div>
</div> 



<div id="getModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 800px;margin-top: 100px;">

    <!-- Modal content-->
    <div class="modal-content" style="border: 4px solid #03A9F4;">
      <div class="modal-header" style="background: #fdeb10de">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="row table-det">
            <div class="col-md-12 col-lg-12 qst-area" style="margin-bottom: 27px">
                <p>ghdhfjhfj     hjjjjjjjjjjjjjjjj dshggggg
                dsgvhgdsvhgdsvdgs hjbdsgdsh dshghgsghsd dgshh     dsyuuuu
            dhhhhhhhhhhhj dhsjdgjfdjsdsj  dshgdshgdsjhdsjdsj djshdsjjdshjds</p>
                </div>

                 <div class="col-md-13 col-lg-10" style="display: flex;">
                      <div class="col-md-6 col-lg-5">
                        <div class="form-group append-option">
                           <!--  <input type="radio" id="male" name="gender" value="male">
      <label for="male">jghhjg</label><br>
      <input type="radio" id="female" name="gender" value="female">
      <label for="female">fyuydf</label><br>
      <input type="radio" id="other" name="gender" value="other">
      <label for="other">fhdghdff</label><br>

          <input type="radio" id="other" name="gender" value="other">
      <label for="other">djjhd</label>
      <input type="hidden" class="form-control" name="table_type" placeholder="Enter Name" value="format" required> -->
                           <label class="container-radio">One
                            <input type="radio" checked="checked" name="radio">
                            <span class="checkmark"></span>
                          </label>
                          <label class="container-radio">Two
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                          </label>
                          <label class="container-radio">Three
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                          </label>
                          <label class="container-radio">Four
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                          </label>

                        </div>
                      </div>


                     <!--    <div class="col-md-6 col-lg-5">

                          <div class="form-group">
                            <label class="form-label">Option 2</label>
                            <input type="text" class="form-control " name="col_no" id="option2" value="" placeholder="Enter Width" required>
                        </div>
                         </div> -->
                    </div>






            
        </div>
      </div>
      <div class="modal-footer" style="background: #fdeb10de">
                              <input type="hidden" class="" name="" id="ans_val" value="">
                              <input type="hidden" class="" name="" id="table_torder" value="">
                              


      <!--   <button type="button" id="add_qst_table_val" class="btn btn-info add_qst_table_val" data-id="">Add</button> -->
<!--          <button type="button" id="show_quest_table" class="btn btn-info add_qst_table_val" data-id="">Add</button>
 -->      </div>
    </div>

  </div>
</div> 



<?php $this->load->view('frontend/template/footer.php'); ?>

<script>


  $(document).ready(function(){






     var divWidth = $(".left-block").width();
     var divHeight = $(".left-block").height();

          var divHeight2 = $(".bottom-controls").height();

          var result=parseFloat(divHeight)-parseFloat(divHeight2);
          // var newheight=result

         //$(".left-controls").css('min-height',result+'px');

       // var elem = document.body; // Make the body go full screen.
       //      var isInFullScreen = (document.fullScreenElement && document.fullScreenElement !== null) ||  (document.mozFullScreen || document.webkitIsFullScreen);



     // logo_name

     $(document).on('click','.fl',function(e){
  toggleFull();
  
});

var height = $(window).height();
      var width =$(window).width();

     //alert(height);

  // $(".background").each(function() {

  //       $(this).css('position','absolute');

      
  //      // var hei = $(this).height();
  //      // var fheight = (parseFloat(hei)/parseFloat(valh))+tc;
  //      $(this).css('height',height);

  //      // var widths = $(this).width();
  //      // var fwidth = (parseFloat(widths)/parseFloat(valw))+rc;
  //      $(this).css('width',width);
  //       // $(this).css('top',tc);
  //       // $(this).css('left',rc);
      
  //   });


   // $('.main-menu').addClass('openup');
  //$('.main-menu ul li:nth-child(2)').addClass('about-accordion-open');
  $(".subnav").click(function(){
      $(this).parent().addClass('accordion-open');
      //$('.main-menu').addClass('openup');
            $(this).find(".qtype-control").toggle();

      $('.subnav').not(this).parent().removeClass('accordion-open');
            $('.subnav').not(this).find(".qtype-control").hide();



  });


    });

    $('.question-area .table-box table tr td').click(function(){


        //            $(".question-area .table-box table tr td").each(function(){
        // $(this).removeClass('cellselect');


        //             })


$(this).toggleClass("cellselect");

        //$(this).addClass('cellselect');

    });

var elem = document.documentElement;

$(document).ready(function(){




   $('.show_question').trigger('click');
  // $('.show_full').trigger('click');
       // toggleFull();
       return false;
});
    


    
        $('.hide-bottom-keys').click(function(){
           $('.problem-controls').toggle();
            $('.number-controls').toggle();
            $('.bottom-controls').toggleClass('hide-bottom');

           
          });
    




    $('.hide_show ').click(function(){
        
       var stat=$('#predefined').val();
       if(stat==1){
        $('.ans_tr').show();
        $('.hidden_new').hide();
        $('.row_data > tbody > tr:not(.ans_tr)').hide();
       }else{
       // $('.hidden_new').show();
        $('.ans_tr').show();
       }


           $(".show_mode").each(function(){
          $(this).removeClass('active');
         });
           
         $(this).addClass('active');

    });

    


    $('.drag_drop ').click(function(){

        var stat=$('#predefined').val();
       if(stat==1){
        $('.ans_tr').hide();
        $('.hidden_new').show();
        $('.row_data > tbody > tr:not(.ans_tr):not(.hidden)').show();
       }else{
        $('.hidden_new').show();
      // $('.ans_tr').show();
       }

        $(".show_mode").each(function(){
          $(this).removeClass('active');
         });
           
         $(this).parent().addClass('active');
         
         

       

    });



    $('.show_interactive ').click(function(){

      var stat=$('#inter-stat').val();
        if(stat==1){
          $('#inter-stat').val(0);
      //   $('.ans_tr').hide();
      //   $('.hidden_new').show();
      //   $('.row_data > tbody > tr:not(.ans_tr):not(.hidden)').show();
       }else{
        $('#inter-stat').val(1);
      //   $('.hidden_new').show();
      // // $('.ans_tr').show();
      }

        $(".show_mode").each(function(){
          $(this).removeClass('active');
         });
           
         $(this).parent().addClass('active');
         
         

       

    });
</script>

<script>
    $('.theme-color-selector .selected_color a').click(function(){
        $('.theme-color-selector .selected_color ul').toggleClass('openlist');
        $('.theme-color-selector .selected_color span').toggleClass('currentcolorfade');
    });





    $('.cell-color-selector .selected_color a').click(function(){
        $('.cell-color-selector .selected_color ul').toggleClass('openlist');
        $('.cell-color-selector .selected_color span').toggleClass('currentcolorfade');
    });
</script>




<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?=base_url('assets_main')?>/assets/js/jquery.min.js"></script>
<!-- <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
 --><script src="<?=base_url('assets_main')?>/assets/js/jquery-ui.min.js"></script>

<script src="<?=base_url('assets_main')?>/assets/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?=base_url('assets_main')?>/assets/js/bootstrap.bundle.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.js"></script>

<script type="text/javascript" src="<?=base_url('assets_main')?>/assets/js/custom.js"></script>

<script src="<?=base_url('assets_main')?>/assets/dragscript/jquery.sortable.js"></script>


<!-- <script src="<?=base_url('assets_main')?>/assets/lightbox/simpleLightbox.min.js"></script>
 --> <script type="text/javascript" src="<?=base_url('assets_main')?>/assets/js/html5-canvas-drawing-app.js"></script>




<script type="text/javascript">



        

        
   // $(document).ready(function(){
       
   //      //$('.show_question').trigger('click');
   //      toggleFull();
   //     return false;

   //         // if (elem.requestFullscreen) {
   //         //    elem.requestFullscreen();
   //         //  } else if (elem.mozRequestFullScreen) { /* Firefox */
   //         //    elem.mozRequestFullScreen();
   //         //  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
   //         //    elem.webkitRequestFullscreen();
   //         //  } else if (elem.msRequestFullscreen) { /* IE/Edge */
   //         //    elem.msRequestFullscreen();
   //         //  }  


   //         //  $(this).removeClass('show_full_screen');
   //         //  $(this).addClass('show_exit_screen');
   //         //  $(this).value='Exit';
   //       });


    function cancelFullScreen(el) {
            var requestMethod = el.cancelFullScreen||el.webkitCancelFullScreen||el.mozCancelFullScreen||el.exitFullscreen;
             var ctx=$('#can')[0].getContext("2d");

             $(".logo_name").css('margin-top','58px');

            ctx.canvas.height  = 600;
            if (requestMethod) { // cancel full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }

        function requestFullScreen(el) {
            //var divHeight = $(".left-block").height();


         var divHeight = $(".left-block").height();
       var  sreen_height = $(window).height();

              //alert(sreen_height);



    $(".logo_name").css('margin-top','168px');

              
            // Supports most browsers and their versions.
            var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullscreen;

            var ctx=$('#can')[0].getContext("2d");

            ctx.canvas.height  = 710;

            if (requestMethod) { // Native full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
            return false;
        }

        function toggleFull() {
           //alert("fdfd");
           $(".fl").css('display','none');

            var elem = document.body; // Make the body go full screen.
            var isInFullScreen = (document.fullScreenElement && document.fullScreenElement !== null) ||  (document.mozFullScreen || document.webkitIsFullScreen);

            if (isInFullScreen){

                 cancelFullScreen(document);
            } else {
                 requestFullScreen(elem);
            }
            return false;
        }
</script>



<script>
  // for (var i = 0; i <= 8; i++) {
  //   $('.photo-thumb'+i+' a').simpleLightbox();
  // }

    

    var sreen_height = 200;
    var sreen_width = 300;

    $(function () {

      var divWidth = $(".right-block").width();
        var divHeight = $(".right-block").height();
        //alert(divWidth);alert(divHeight);


//prepareCanvas();


//       var canvasDiv = document.getElementById('canvasDiv');
// canvas = document.createElement('canvas');
// canvas.setAttribute('width', canvasWidth);
// canvas.setAttribute('height', canvasHeight);
// canvas.setAttribute('id', 'canvas');
// canvasDiv.appendChild(canvas);
// if(typeof G_vmlCanvasManager != 'undefined') {
//   canvas = G_vmlCanvasManager.initElement(canvas);
// }
// context = canvas.getContext("2d");

        //$('.sortable').sortable();

        $('.connected').sortable({
            connectWith: '.connected',
           cursor: 'pointer'
               // cursor: 'url(cursor.cur), default'

        });
        $('.itemconnect').sortable().bind('dragend', function (e) {
            //console.log(Math.random());
            refresh_result();
        });
        
    $( "#draggable" ).draggable({

   cursor: 'pointer'
       //cursor: 'move'
    });
    // $( "#draggable" ).html("cursor : move");


//grid.html("cursor : " + cursor[i]);

//        $(document).on('dragstart','.itemconnect', function(e) {
//    refresh_result();
//    
//  });
   $('input.number').keyup(function(event) {
    alert("Xcxcxc");

  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40) return;

  // format number
  $(this).val(function(index, value) {


    if(!$.isNumeric(value)) {
                             return;
                             }else{
                                return value
    .replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    ;
                             }

    
  });
});
        $('.trans').click(function (e) {

            e.preventDefault();
            $('.trans_question').html('' + $(this).text() + '');
            //$('.trans_question').show();
            if($.trim($('#trans_img_' + $(this).attr('data_id')).html())) {
              $('#trans_img').attr('src',$.trim($('#trans_img_' + $(this).attr('data_id')).html()));
            $('#trans_img_a').attr('href',$.trim($('#trans_img_' + $(this).attr('data_id')).html()));
          }
            
            else {
              $('#trans_img').attr('src','');
            $('#trans_img_a').attr('href','');
          }




          // $('.photo-thumb-trans a').simpleLightbox();


          var id1=$.trim($('#trns_format_' + $(this).attr('data_id')).html());
                       var id2=$.trim($('#trns_format_value'+$(this).attr('data_id')).html());

              var id3=$.trim($('#trns_ans_value' + $(this).attr('data_id')).html());
              var id4=$.trim($('#trns_ans_col' + $(this).attr('data_id')).html());
              var id5=$.trim($('#trns_trans_all' + $(this).attr('data_id')).html());
                            var id6=$.trim($('#trns_format_table' + $(this).attr('data_id')).html());


                             if($.trim($('#trns_format_table' + $(this).attr('data_id')).html())){
                                      $(".tab-format.active").removeClass('active');


                                      $('.tab-format[data-tableid="'+id6+'"]').addClass('active');
                                    
                                    $('.problme-tab[data-tableid="'+id6+'"]').addClass('active');



                                    }



 //alert(id2);

              $('.tab-format[data-tableid="'+id6+'"]').addClass('active');

                                  $(".problem-tr").each(function(){

                                  $(this).css('background','rgb(255, 235, 204)');



                                  });
                                  
                                                   //var myarray = prblem.toString().split(',');



                                      var myarray = id2.toString().split(',');
                                        

                            for(var i = 0; i < myarray.length; i++)
                            {
                              
                           $('.problem-tr[data-prblem="'+myarray[i]+'"]').css('background','rgba(0,123,255,.5)');

                                 // console.log(myarray[i]);

                            }


                             var myarray1 = id3.toString().split(',');
                           var myarraycol = id4.toString().split(',');



                            for(var i = 0; i < myarray1.length; i++)
                            {
                              
                                                        // $('.problem-tr[data-prblem="'+myarray1[i]+'"]').css('background','rgba(0,123,255,.5)');
                                                        // $('.ans_tab').find('.itemconnect[data-ansid="'+myarray1[i]+'"][data-column="'+myarraycol[i]+'"]').css('background','rgba(120, 189, 243, 0.41)');

                                                         $('.ans_tab').find('.itemconnect[data-ansid="'+myarray1[i]+'"][data-column="'+myarraycol[i]+'"]').addClass('oredr-active');

                                 // console.log(myarray[i]);

                            }


                                        var myarraytrans = id5.toString().split(',');


                            for(var i = 0; i < myarraytrans.length; i++)
                            {
                              
                            $('.trans[data-transaction="'+myarraytrans[i]+'"]').css('background','rgba(171, 102, 102, 0.36)');

                                 // console.log(myarray[i]);

                            }







            if($.trim($('#trans_helptext_' + $(this).attr('data_id')).html())){
                $('.help-text').html('<p>'+$('#trans_helptext_' + $(this).attr('data_id')).html()+'</p>');
            }
            else $('.help-text').html('');
            $(this).addClass('tran_inactive');
            $('.trans_tray').html($('#question_spits_' + $(this).attr('data_id')).html());
            $('.connected').sortable({
                connectWith: '.connected',
                cursor: 'move'

            });
            if($('#question-area').hasClass('col-md-12')){
                $('.show_answer').trigger('click');
            }
        });


// $( ".leftdiv" ).hover(function() {
// // alert('hgdsgsdh');
  
//   });


        $('.trans-tr').click(function (e) {
            e.preventDefault();

          // alert('ghghgh');


              //$(this).toggleClass("cellselect");

          $('.trans_question').html($(this).find('.disc_val').text());
         // $('.trans_question').show();

          //$('.trans_question').hide();
        //  $('.trans_question').append('<li class="disc trans_question1">'+$(this).attr('data-name')+'</li>');
            // var tr='<ul class="connected1 list trans_tray" style="width:70%"><li class="disc " draggable="true">'+$(this).attr('data-name')+'</li>'+ '</ul>';

            // //                                                 
            //                                              $('.trans_question').html(tr);
            //                                              console.log(tr);

           // $('#trans_img').attr('src','');

            if($.trim($('#quest_helpimg_' + $(this).attr('data_id')).html())) {
              $('#trans_img').attr('src',$.trim($('#quest_helpimg_' + $(this).attr('data_id')).html()));
            $('#trans_img_a').attr('href',$.trim($('#quest_helpimg_' + $(this).attr('data_id')).html()));
          }
            
            else {
              $('#trans_img').attr('src','');
            $('#trans_img_a').attr('href','');
          }


            if($.trim($('#quest_helptext_' + $(this).attr('data_id')).html())){
                $('.help-text').html('<p>'+$('#quest_helptext_' + $(this).attr('data_id')).html()+'</p>');
            }
            else $('.help-text').html('');


            if($.trim($('#quest_format_' + $(this).attr('data_id')).html())){
              //console.log();
              var id1=$.trim($('#quest_format_' + $(this).attr('data_id')).html());
              var id3=$.trim($('#quest_ans_value' + $(this).attr('data_id')).html());
              var id4=$.trim($('#quest_ans_col' + $(this).attr('data_id')).html());
              var id5=$.trim($('#quest_trans_all' + $(this).attr('data_id')).html());
              var id6=$.trim($('#quest_format_table' + $(this).attr('data_id')).html());


             var id2=$.trim($('#quest_format_value' + $(this).attr('data_id')).html());


                             




                      // $('.tab-format[data-format="'+id1+'"]').addClass('active');

                        // $(".problem-tr").each(function(){

                        //             $(this).css('background','rgba(255, 235, 59, 0.45)');


                        //           });


                                    if($.trim($('#quest_format_table' + $(this).attr('data_id')).html())){
                                      $(".tab-format.active").removeClass('active');


                                      $('.tab-format[data-tableid="'+id6+'"]').addClass('active');
                                    
                                   // $('.problme-tab[data-tableid="'+id6+'"]').addClass('active');




                                    }


                                    

                                   //  $('.tab-format[data-tableid="'+id6+'"]').show();

                                   // $('.ans_tab[data-tableid="'+id6+'"]').show();




                                  $(".problem-tr").each(function(){

                                    $(this).css('background','rgb(255, 235, 204)');


                                  });
                                                   //var myarray = prblem.toString().split(',');



                                      var myarray = id2.toString().split(',');


                            for(var i = 0; i < myarray.length; i++)
                            {
                              
                            $('.problem-tr[data-prblem="'+myarray[i]+'"]').css('background','rgba(0,123,255,.5)');

                                 // console.log(myarray[i]);

                            }


                            var myarray1 = id3.toString().split(',');
                           var myarraycol = id4.toString().split(',');



                            for(var i = 0; i < myarray1.length; i++)
                            {
                              
                                                        // $('.problem-tr[data-prblem="'+myarray1[i]+'"]').css('background','rgba(0,123,255,.5)');
                                                        // $('.ans_tab').find('.itemconnect[data-ansid="'+myarray1[i]+'"][data-column="'+myarraycol[i]+'"]').css('background','rgba(120, 189, 243, 0.41)');

                                                          $('.ans_tab').find('.itemconnect[data-ansid="'+myarray1[i]+'"][data-column="'+myarraycol[i]+'"]').addClass('oredr-active');

                                 // console.log(myarray[i]);

                            }


                                        var myarraytrans = id5.toString().split(',');


                            for(var i = 0; i < myarraytrans.length; i++)
                            {
                              
                            $('.trans[data-transaction="'+myarraytrans[i]+'"]').css('background','rgba(171, 102, 102, 0.36)');

                                 // console.log(myarray[i]);

                            }





                          





                // $('.help-text').html('<p>'+$('#quest_helptext_' + $(this).attr('data_id')).html()+'</p>');
            }





if($('#inter-stat').val()==1){
                        var q_val=$(this).find('.disc_val').data('qst');
      var base_url = '<?=base_url()?>';

                        var type='quest';
                        //alert('dnjhd');

                          $.ajax({
        url:base_url+'get-inter-question',
        type:'post',
        data:{type:type,q_val:q_val},
        success: function(out){
            var out =JSON.parse(out);
            if (out.status == 1) {

var data=out.data;
var option=data.option_no;
$('.qst-area').html('<p>'+data.title+'</p>');
  var htm=''

for(var i=0;i<option;i++){

  var name_array=[data.option1,data.option2,data.option3,data.option4];
  var k=i+1;

   var op='option'+k;
  // var val=data.op;

    console.log(name_array[i]);

  //console.log(data+'.'+op);
  //Things[i]
   htm+='<label class="container-radio">'+name_array[i]+'<input type="radio" name="radio" class="options-val" id="options-val" value="'+op+'"><span class="checkmark"></span></label>';

   // $('.append-option').html('<label class="container-radio">'+name_array[i]+'<input type="radio" name="radio" value="'+op+'"><span class="checkmark"></span></label>');
}

$('.append-option').html(htm);
$('#ans_val').val(data.answer_value);


$('.options-val').change(function() {
      //alert($(this).val());
      var value3=$(this).val();
      if(value3!=data.answer_value){

          $(this).parent().find('.checkmark').css('background','red');
      }else{

          $(this).parent().find('.checkmark').css('background','green');
                          $('#getModal').modal('hide');

      }


      });



             


                $('#getModal').modal('show');
              //  $('#getModal').modal('show');
            }
            else if(out.status == 0){
                //alert(out.data);
            }
            else{
                window.location.href = base_url;
            }
        }
    });
     }
            //else $('.help-text').html('');

//console.log($('.help-text').html());
// <li class="disc trans_question1">'+$(this).attr('data-name')+'</li>'+

            $('.trans_tray').html($('#question_tr_spits_' + $(this).attr('data_id')).html());
           //  $('.trans_tray').append('<li class="disc trans_question1">'+$(this).attr('data-name')+'</li>');

           
           // console.log($('#question_tr_spits_' + $(this).attr('data_id')).html());
            $('.connected').sortable({
                connectWith: '.connected',
                cursor: 'move'

            });




           // $('.help-text').html('');
            if($('#question-area').hasClass('col-md-12')){

                 if($('.show_image_answer').hasClass('active')){
                 // alert('hjjjj');
                  //$('.show_image_answer').addClass('active');

                   $('.show_image_answer').trigger('click');


                 // show_image_answer();



                 }else{
                  $('.show_answer').trigger('click');


                    }


            }
        });


$(document).ready(function() {

    
    });



var lastClicked;


        $('.problem-tr').click(function (e) {
                            $(this).addClass('active');


          e.preventDefault();
           lastClicked=$(this).attr("class");



          var actv=$(".tab-format.active").data("id");
             if($('#table_img'+actv).html()){

                 $('#table_img'+actv).hide();
                 $('.problme-tab').hide();
                 
                 


if($('#inter-stat').val()==1){


                 var q_val=$(this).data('prblem');
      var base_url = '<?=base_url()?>';

                        var type='problem';
                        //alert('dnjhd');

                          $.ajax({
        url:base_url+'get-inter-question',
        type:'post',
        data:{type:type,q_val:q_val},
        success: function(out){
            var out =JSON.parse(out);
            if (out.status == 1) {

var data=out.data;
var option=data.option_no;
$('.qst-area').html('<p>'+data.title+'</p>');
  var htm=''

for(var i=0;i<option;i++){

  var name_array=[data.option1,data.option2,data.option3,data.option4];
  var k=i+1;

   var op='option'+k;
  // var val=data.op;

    console.log(name_array[i]);

  //console.log(data+'.'+op);
  //Things[i]
   htm+='<label class="container-radio">'+name_array[i]+'<input type="radio" name="radio" class="options-val" id="options-val" value="'+op+'"><span class="checkmark"></span></label>';

   // $('.append-option').html('<label class="container-radio">'+name_array[i]+'<input type="radio" name="radio" value="'+op+'"><span class="checkmark"></span></label>');
}

$('.append-option').html(htm);
$('#ans_val').val(data.answer_value);


$('.options-val').change(function() {
      //alert($(this).val());
      var value3=$(this).val();
      if(value3!=data.answer_value){

          $(this).parent().find('.checkmark').css('background','red');
      }else{

          $(this).parent().find('.checkmark').css('background','green');
                          $('#getModal').modal('hide');

      }


      });



             


                $('#getModal').modal('show');
              //  $('#getModal').modal('show');
            }
            else if(out.status == 0){
                //alert(out.data);
            }
            else{
                window.location.href = base_url;
            }
        }
    });
                        }

                 if($('.show_image_answer').hasClass('active')){

                 if($('.show_question_new').parent().hasClass('active')){
                   // alert('hjhhjd');

                    // alert('ddddd');



                  }else{
                  $('.show_image_answer').removeClass('active');

                    }


                 }



                  $('.show_answer').trigger('click');
               }


         


        });







        
        $(document).on('click','.add_new_row',function () {



           if($('#answer-area').hasClass('full')){

               var stat=$('#predefined').val();


              var activeinput=$('.active1 .row_data > tbody > tr > td').find('#input-field').val();
                             var activeinput1=$('.active2 .row_data > tbody > tr > td').find('#input-field').val();

                                           //console.log(activeinput);


        

             var htm = '<tr>'+$('.active1 .row_data > tbody > tr.hidden').html()+'</tr>';
             //if(typeof val === 'undefined')
             if(typeof activeinput!=='undefined'){
               $('.active1 .row_data > tbody > tr:last-child').after(htm);


             }
            var htm = '<tr>'+$('.active2 .row_data > tbody > tr.hidden').html()+'</tr>';
                         if(typeof activeinput1!='undefined'){

            $('.active2 .row_data > tbody > tr:last-child').after(htm);
            }


           //   if(stat==1){
                            
           //                  $('.hidden_new').hide();
           //             }else{
           // // $('.hidden_new').show();
           //             $('.ans_tr').show();
           //            }



           }else{


             var stat=$('#predefined').val();


             var htm = '<tr>'+$('.active .row_data > tbody > tr.hidden').html()+'</tr>';
            $('.active .row_data > tbody > tr:last-child').after(htm);

           }


           // console.log(htm);
            $('.itemconnect').sortable('destroy');
            $('.connected').sortable({
                connectWith: '.connected',
                cursor: 'move'

            });
            $('.itemconnect').sortable().bind('dragend', function (e) {
                //console.log(Math.random());
                refresh_result();
            });
            refresh_result();



        });
        $('.remove_new_row').click(function () {
            $('.tab.active .row_data tr').each(function (i, tr) {

                // console.log('tr '+ $(tr).html());
                // console.log('tr ' + i);
                var empty_flg = true;
                $(tr).find('td').each(function (j, td) {
                   //console.log($(td).html())
                    if ($.trim($(td).html()) != '') {

                        empty_flg = false;
                    }
                });
                // console.log(empty_flg)
                //alert($('#result tr').length);
                if (empty_flg && !$(tr).hasClass('hidden') && $('.tab.active .row_data tr').length > 2) {
//                    alert('Delete '+i);
                    $(tr).remove();
                }
            });
        });
        $('.show_question').click(function () {
            $('#question-area').removeClass('col-md-6');
            $('#question-area').addClass('col-md-12 full_q');
            $('.q_area').addClass('align-items-center');
            $('.question-div').css('padding-left','85px');
            $('.question-div').css('padding-right','85px');
           
            $('#question-area').removeClass('d-none');
            $('#answer-area').addClass('d-none');


            $(".problem-tr").each(function(){

                                  $(this).removeClass('active');



                                  });


           //alert($('.quest_table ').length);
            if($('.quest_table ').length>1){


            if($(".q_link.active").attr('data-id')==1){
             // alert('hjhjdhj');
                  var act = $(".table-box.active").first();
                  
                  var single_wid = act.attr('data-width');
                  // alert(single_wid);
                  if(single_wid!=0){
                     $(act).css('width',single_wid+'%');
                   }else{
                     $(act).css('width','100%');
                   }

            }else{


                $(".quest_table").css('display','none');
               

                var act = $(".table-box.active").first();
                  var id = parseInt(act.attr('data-id'))+1;
                  var single_wid = act.attr('data-width');
                   single_wid=single_wid-20;

                   $(".quest_table").removeClass('active');

                var tab1 = '#qt-div'+id;
                var single_wid2 = $(tab1).attr('data-width');
                                  single_wid2=single_wid2-20;

                $(act).css('display','block');
                $(act).css('float','left');

                //$(act).css('display','block');
                $(tab1).css('display','block');
                $(tab1).css('float','right');
                $(act).addClass('active');
                $(tab1).addClass('active1');
                


                  if(single_wid!=0 && single_wid2!=0){
                    var single_wid1=single_wid-2;
                    var single_width2=single_wid2-2;
                  $(act).css('width',single_wid1+'%');
                  $(tab1).css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){
                  
                  var wid=100-single_wid2;
                   single_wid2=single_wid2-2;
                  $(act).css('width',wid+'%');
                  $(tab1).css('width',single_wid2+'%');
                }
                 else if(single_wid!=0 && single_wid2==0){


                  var wid=100-single_wid;
                     single_wid=single_wid-2;
                                  // alert(wid);


                  $(act).css('width',single_wid+'%');
                   $(tab1).css('width',wid+'%');
                }
                else{
                  $('.quest_table ').css("width","48%");
                }

                }


             //$('.quest_table ').css("width","48%");
            }else{
             
                  var act = $(".table-box.active").first();
                  
                  var single_wid = act.attr('data-width');
                                       //$(act).css('float','left');

                  // alert(single_wid);
                  if(single_wid!=0){
                     $(act).css('width',single_wid+'%');
                   }else{
                     $(act).css('width','100%');
                   }
            }






            $('.transations ').css("display","block");
            var h=0;
           $(".transations").each(function(){

             h+= $(this).height();
              if(h>70)
                {
                    var dataid=$(this).data('id');
                    var bal=dataid%2;
                    if(bal==0){
                       $(this).css("float","none");  
                    }else{
                       $(this).css("float","right");   
                    }

                   $(this).css("width","100%");  
                }
            

           });

         $(".preview").each(function(){
          $(this).removeClass('active');
         });
           
         $(this).parent().addClass('active');
                 
             // $('.transations').height(sreen_height - $('.question').height() - $('#qt-div').height() - 110);


        });


        $('.show_answer').click(function (e) {
             e.preventDefault();
  e.stopImmediatePropagation();

                              //  alert('showans');



                          $('#answer-area').removeClass('col-md-6');

                          $('#answer-area').addClass(' offset-md-2 col-md-8 full');
                          $('#answer-area').removeClass('col-md-12');

                          $('#answer-area').removeClass('d-none');
                          $('#question-area').addClass('d-none');


                        if($('#question-area').hasClass('col-md-6')){


                           $(".show_image_answer").removeClass("active");
                           $("#question-area").removeClass("col-md-6");
                           $("#question-area").addClass("col-md-12 full_q");


                         }




          // show_image_answer 
                 // if($('.show_question_new').parent().hasClass('active')){

                                if($('.show_image_answer').hasClass('active')){

                                 // alert('hhhhh');

                 // if($('.show_question_new').parent().hasClass('active')){


//alert(lastClicked);
    // if (lastClicked.indexOf("problem-tr") > -1) {
    
    // }

//;

// if (!$(this).hasClass("test")) {




                      if($('.show_question_new').parent().hasClass('active')){
// && (!$('.problem-tr').hasClass('active'))

               if($('.problme-tab').hasClass('active')){


                    if($('.problem-tr').hasClass('active')){
                     // alert('ghdd');



                      $('.pr-pag-link').addClass('disabled'); 
              $('.ans-pag-link').removeClass('disabled'); 




          

            // $('#answer-area').addClass('col-md-12');
            
            

            // $(".ans_tab").each(function(){
                //var id=$(this).data('id');


                
                  var htm = $('#answer-area').find('.trans_question').html() ? $('#answer-area').find('.trans_question').html() : '';
                  var tr_html=$('#answer-area').find('.trans_tray').html() ? $('#answer-area').find('.trans_tray').html() : '';
                 //console.log($('#answer-area').find('.trans_tray').html());

                  if($.trim($('#answer-area').find('.trans_question').html())!=''){
                    // modified for hide tranaction tray//
                   // $('#answer-area').find('.trans_question').css('display','block');
                   
                     // $('#answer-area').find('.help-text').show();
                      $('#answer-area').find('.transaction-pool').css('display','none');

                  }
                 else if($.trim($('#answer-area').find('.trans_tray').html())!=''){
                   //alert("hhh");
                    // modified for hide tranaction tray//
                     $('#answer-area').find('.trans_question').css('display','none');
                     // $('#answer-area').find('.help-text').show();
                      $('#answer-area').find('.transaction-pool').css('display','none');
           }
                  else{
                    //alert("cvhv");
                  // $('.q_area').removeClass('align-items-center');
                     $('.answer-area').find('.trans_question').css('display','none');
                     // $('#answer-area').find('.help-text').hide();
                    $('.answer-area').find('.transaction-pool').css('display','none');
                  }


                     var act = $(".ans_tab.active");


                      if($('#answer-area').hasClass('offset-md-2 col-md-8')){

                    //      act.css("display","block");
                    //      act.addClass('active1');
                    //      $('#answer-area').removeClass('col-md-12');
                        
                    // var single_wid2 = $(act).attr('data-width');
                    // if(single_wid2!=0){
                    //    $(act).css('width',single_wid2+'%');
                    // }
// modify//
                       if($("#table2").length != 0) {

                            $(act).css("display","block");
                            var single_wid = $('#table2').attr('data-width');
                            var single_wid2 = $('#table1').attr('data-width');
                        // $('#table2').css("width","48%");
                         if ($('#table2').hasClass('active1')){

                                           }else{
                                            $('#table2').addClass('active2');
                                           }
                         $('#table2').css("display","block");
                          $('#table1').css("display","block");
                         $('#table2').css("float","right");
                         

                          
                           if ($('#table1').hasClass('active2')){

                                           }else{
                                           $('#table1').addClass('active1');
                                           }
                         // $('#table1').css("width","48%");
                          $('#table1').css("display","block");



                          if(single_wid!=0 && single_wid2!=0){
                    var single_wid1=single_wid-2;
                    var single_width2=single_wid2-2;
                  $('#table2').css('width',single_wid1+'%');
                  $('#table1').css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){
                  
                  var wid=100-single_wid2;
                   single_wid2=single_wid2-2;
                  $('#table2').css('width',wid+'%');
                  $('#table1').css('width',single_wid2+'%');
                }
                 else if(single_wid!=0 && single_wid2==0){
                  var wid=100-single_wid;
                     single_wid=single_wid-2;

                  $('#table2').css('width',single_wid+'%');
                   $('#table1').css('width',wid+'%');
                }
                else{
                 $('#table2').css('width','100%');
                   $('#table1').css('width','100%');
                }


                $(".ans_tab").each(function(){



                                                
                                                
                                                // $(this).css('width','100%');
                                                 $(this).css('float','left');
                    // $(this).css('float','left');
                    
                              });
                         
                          $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');

                           //$('#answer-area').removeClass('offset-md-2 col-md-8');
                            //$('#answer-area').addClass('col-md-12');
                    }else{
                      //modify//


                      $('.ans-pag-link[data-id="2"]').addClass('disabled'); 
                       $(act).css("display","block");

                        act.addClass('active1');
                         $('#answer-area').removeClass('col-md-12');
                         $('#answer-area').addClass(' offset-md-2 col-md-8');
                    var single_wid2 = $(act).attr('data-width');
                     if(single_wid2!=0){
                    $(act).css('width',single_wid2+'%');
                  }

                  // modify//




                    }
                   




                       }else{
                     //console.log(act);

                                                                   //  alert("Fdfd");


                    if($("#table2").length != 0) {

                                $('#answer-area').addClass('offset-md-2 col-md-8');
                               $('#answer-area').removeClass('col-md-12');



                        console.log("Fdfd");
                           // $(act).css("display","none");
                            var single_wid = $('#table2').attr('data-width');
                            var single_wid2 = $('#table1').attr('data-width');
                        // $('#table2').css("width","48%");

                                           if ($('#table2').hasClass('active1')){

                                           }else{
                                            $('#table2').addClass('active2');
                                           }

                         
                         $('#table2').css("display","block");
                         $('#table2').css("float","right");
                         

                          
                          

                           if ($('#table1').hasClass('active2')){

                                           }else{
                                           $('#table1').addClass('active1');
                                           }
                         // $('#table1').css("width","48%");
                          $('#table1').css("display","block");



                          if(single_wid!=0 && single_wid2!=0){
                    var single_wid1=single_wid-2;
                    var single_width2=single_wid2-2;
                  $('#table2').css('width',single_wid1+'%');
                  $('#table1').css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){
                  
                  var wid=100-single_wid2;
                   single_wid2=single_wid2-2;
                  $('#table2').css('width',wid+'%');
                  $('#table1').css('width',single_wid2+'%');
                }
                 else if(single_wid!=0 && single_wid2==0){
                  var wid=100-single_wid;
                     single_wid=single_wid-2;

                  $('#table2').css('width',single_wid+'%');
                   $('#table1').css('width',wid+'%');
                }
                else{
                 $('#table2').css('width','100%');
                   $('#table1').css('width','100%');
                }
                         
                          $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');
                    }else{
                      //modify//

                      $('.ans-pag-link[data-id="2"]').addClass('disabled'); 

                        act.addClass('active1');
                       $(act).css("display","block");

                        $('#answer-area').removeClass('col-md-12');
            $('#answer-area').addClass(' offset-md-2 col-md-8');
                    var single_wid2 = $(act).attr('data-width');
                     if(single_wid2!=0){
                    $(act).css('width',single_wid2+'%');
                  }




                    }
                  }

                


                         $(".preview").each(function(){
                          $(this).removeClass('active');
                         });
                           
                         $(this).parent().addClass('active');


                      }else{

             // if($('#table_img0').css('display') == 'block'){
                                 $(".show_image_answer").trigger("click");


                                                           // alert('ret');

if($('#table_img0').is(':visible')){

             // if($('#table_img0').css('display') == 'block'){
                                                                //  alert('hide');

                                 }else{

             // if($('#table_img0').css('display') == 'block'){
                                                                 // alert('hide1');

                                 }  


                                 }  

                // && (!$('.problem-tr').hasClass('active'))

                
                                 //break;

// return false;                               //  }


                                      
                                    }else{

                                       // alert('bbb');


                                    $('.pr-pag-link').addClass('disabled'); 
              $('.ans-pag-link').removeClass('disabled'); 




          

            // $('#answer-area').addClass('col-md-12');
            
            

            // $(".ans_tab").each(function(){
                //var id=$(this).data('id');


                
                  var htm = $('#answer-area').find('.trans_question').html() ? $('#answer-area').find('.trans_question').html() : '';
                  var tr_html=$('#answer-area').find('.trans_tray').html() ? $('#answer-area').find('.trans_tray').html() : '';
                 //console.log($('#answer-area').find('.trans_tray').html());

                  if($.trim($('#answer-area').find('.trans_question').html())!=''){
                    // modified for hide tranaction tray//
                   // $('#answer-area').find('.trans_question').css('display','block');
                   
                     // $('#answer-area').find('.help-text').show();
                      $('#answer-area').find('.transaction-pool').css('display','none');

                  }
                 else if($.trim($('#answer-area').find('.trans_tray').html())!=''){
                   //alert("hhh");
                    // modified for hide tranaction tray//
                     $('#answer-area').find('.trans_question').css('display','none');
                     // $('#answer-area').find('.help-text').show();
                      $('#answer-area').find('.transaction-pool').css('display','none');
           }
                  else{
                    //alert("cvhv");
                  // $('.q_area').removeClass('align-items-center');
                     $('.answer-area').find('.trans_question').css('display','none');
                     // $('#answer-area').find('.help-text').hide();
                    $('.answer-area').find('.transaction-pool').css('display','none');
                  }


                     var act = $(".ans_tab.active");


                      if($('#answer-area').hasClass('offset-md-2 col-md-8')){

                    //      act.css("display","block");
                    //      act.addClass('active1');
                    //      $('#answer-area').removeClass('col-md-12');
                        
                    // var single_wid2 = $(act).attr('data-width');
                    // if(single_wid2!=0){
                    //    $(act).css('width',single_wid2+'%');
                    // }
// modify//
                       if($("#table2").length != 0) {

                            $(act).css("display","block");
                            var single_wid = $('#table2').attr('data-width');
                            var single_wid2 = $('#table1').attr('data-width');
                        // $('#table2').css("width","48%");
                         if ($('#table2').hasClass('active1')){

                                           }else{
                                            $('#table2').addClass('active2');
                                           }
                         $('#table2').css("display","block");
                        //  $('#table1').css("display","block");
                         $('#table2').css("float","left");
                         

                          
                           if ($('#table1').hasClass('active2')){

                                           }else{
                                           $('#table1').addClass('active1');
                                           }
                         // $('#table1').css("width","48%");
                          $('#table1').css("display","block");



                          if(single_wid!=0 && single_wid2!=0){
                    var single_wid1=single_wid-2;
                    var single_width2=single_wid2-2;
                  $('#table2').css('width',single_wid1+'%');
                  $('#table1').css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){
                  
                  var wid=100-single_wid2;
                   single_wid2=single_wid2-2;
                  $('#table2').css('width',wid+'%');
                  $('#table1').css('width',single_wid2+'%');
                }
                 else if(single_wid!=0 && single_wid2==0){
                  var wid=100-single_wid;
                     single_wid=single_wid-2;

                  $('#table2').css('width',single_wid+'%');
                   $('#table1').css('width',wid+'%');
                }
                else{
                 $('#table2').css('width','100%');
                   $('#table1').css('width','100%');
                }


                   $(".ans_tab").each(function(){

                                         // $(this).css('width','100%');
                                                 $(this).css('float','left');
                    // $(this).css('float','left');
                    
                              });
                         
                          $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');

                           //$('#answer-area').removeClass('offset-md-2 col-md-8');
                            //$('#answer-area').addClass('col-md-12');
                    }else{
                      //modify//


                      $('.ans-pag-link[data-id="2"]').addClass('disabled'); 
                       $(act).css("display","block");

                        act.addClass('active1');
                         $('#answer-area').removeClass('col-md-12');
                         $('#answer-area').addClass(' offset-md-2 col-md-8');
                    var single_wid2 = $(act).attr('data-width');
                     if(single_wid2!=0){
                    $(act).css('width',single_wid2+'%');
                  }

                  // modify//




                    }
                   




                       }else{
                     //console.log(act);

                                                                   //  alert("Fdfd");


                    if($("#table2").length != 0) {

                                $('#answer-area').addClass('offset-md-2 col-md-8');
                               $('#answer-area').removeClass('col-md-12');



                        console.log("Fdfd");
                            $(act).css("display","none");
                            var single_wid = $('#table2').attr('data-width');
                            var single_wid2 = $('#table1').attr('data-width');
                        // $('#table2').css("width","48%");

                                           if ($('#table2').hasClass('active1')){

                                           }else{
                                            $('#table2').addClass('active2');
                                           }

                         
                         $('#table2').css("display","block");
                         $('#table2').css("float","left");
                         


                          
                          

                           if ($('#table1').hasClass('active2')){

                                           }else{
                                           $('#table1').addClass('active1');
                                           }
                         // $('#table1').css("width","48%");
                          $('#table1').css("display","block");



                          if(single_wid!=0 && single_wid2!=0){
                    var single_wid1=single_wid-2;
                    var single_width2=single_wid2-2;
                  $('#table2').css('width',single_wid1+'%');
                  $('#table1').css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){
                  
                  var wid=100-single_wid2;
                   single_wid2=single_wid2-2;
                  $('#table2').css('width',wid+'%');
                  $('#table1').css('width',single_wid2+'%');
                }
                 else if(single_wid!=0 && single_wid2==0){
                  var wid=100-single_wid;
                     single_wid=single_wid-2;

                  $('#table2').css('width',single_wid+'%');
                   $('#table1').css('width',wid+'%');
                }
                else{
                 $('#table2').css('width','100%');
                   $('#table1').css('width','100%');
                }
                         
                          $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');
                    }else{
                      //modify//

                      $('.ans-pag-link[data-id="2"]').addClass('disabled'); 

                        act.addClass('active1');
                        $('#answer-area').removeClass('col-md-12');
            $('#answer-area').addClass(' offset-md-2 col-md-8');
                    var single_wid2 = $(act).attr('data-width');
                     if(single_wid2!=0){
                    $(act).css('width',single_wid2+'%');
                  }




                    }
                  }

                


                         $(".preview").each(function(){
                          $(this).removeClass('active');
                         });
                           
                         $(this).parent().addClass('active');


}
                               // $(".show_image_answer").trigger("click");





                           }else{



                               $(".show_image_answer").trigger("click");


                            // alert('ret2');

                                // alert('dgdjjhd');


                           }

                                }else{


                                    $('.pr-pag-link').addClass('disabled'); 
              $('.ans-pag-link').removeClass('disabled'); 




          

            // $('#answer-area').addClass('col-md-12');
            
            

            // $(".ans_tab").each(function(){
                //var id=$(this).data('id');


                
                  var htm = $('#answer-area').find('.trans_question').html() ? $('#answer-area').find('.trans_question').html() : '';
                  var tr_html=$('#answer-area').find('.trans_tray').html() ? $('#answer-area').find('.trans_tray').html() : '';
                 //console.log($('#answer-area').find('.trans_tray').html());

                  if($.trim($('#answer-area').find('.trans_question').html())!=''){
                    // modified for hide tranaction tray//
                   // $('#answer-area').find('.trans_question').css('display','block');
                   
                     // $('#answer-area').find('.help-text').show();
                      $('#answer-area').find('.transaction-pool').css('display','none');

                  }
                 else if($.trim($('#answer-area').find('.trans_tray').html())!=''){
                   //alert("hhh");
                    // modified for hide tranaction tray//
                     $('#answer-area').find('.trans_question').css('display','none');
                     // $('#answer-area').find('.help-text').show();
                      $('#answer-area').find('.transaction-pool').css('display','none');
           }
                  else{
                    //alert("cvhv");
                  // $('.q_area').removeClass('align-items-center');
                     $('.answer-area').find('.trans_question').css('display','none');
                     // $('#answer-area').find('.help-text').hide();
                    $('.answer-area').find('.transaction-pool').css('display','none');
                  }


                     var act = $(".ans_tab.active");


                      if($('#answer-area').hasClass('offset-md-2 col-md-8')){

                    //      act.css("display","block");
                    //      act.addClass('active1');
                    //      $('#answer-area').removeClass('col-md-12');
                        
                    // var single_wid2 = $(act).attr('data-width');
                    // if(single_wid2!=0){
                    //    $(act).css('width',single_wid2+'%');
                    // }
// modify//
                       if($("#table2").length != 0) {

                            $(act).css("display","block");
                            var single_wid = $('#table2').attr('data-width');
                            var single_wid2 = $('#table1').attr('data-width');
                        // $('#table2').css("width","48%");
                         if ($('#table2').hasClass('active1')){

                                           }else{
                                            $('#table2').addClass('active2');
                                           }
                         $('#table2').css("display","block");
                        //  $('#table1').css("display","block");
                         $('#table2').css("float","left");
                         

                          
                           if ($('#table1').hasClass('active2')){

                                           }else{
                                           $('#table1').addClass('active1');
                                           }
                         // $('#table1').css("width","48%");
                          $('#table1').css("display","block");



                          if(single_wid!=0 && single_wid2!=0){
                    var single_wid1=single_wid-2;
                    var single_width2=single_wid2-2;
                  $('#table2').css('width',single_wid1+'%');
                  $('#table1').css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){
                  
                  var wid=100-single_wid2;
                   single_wid2=single_wid2-2;
                  $('#table2').css('width',wid+'%');
                  $('#table1').css('width',single_wid2+'%');
                }
                 else if(single_wid!=0 && single_wid2==0){
                  var wid=100-single_wid;
                     single_wid=single_wid-2;

                  $('#table2').css('width',single_wid+'%');
                   $('#table1').css('width',wid+'%');
                }
                else{
                 $('#table2').css('width','100%');
                   $('#table1').css('width','100%');
                }



                     $(".ans_tab").each(function(){


                                            // if($(this).hasClass('active1')){
                                                
                                            //   $(this).show();
                                            // }else{
                                            //    // $(this).removeClass('active2').hide(); 
                                            //    //  $(this).removeClass('active').hide();
                                            // }

                                                
                                                
                                               // $(this).css('width','100%');
                                                 $(this).css('float','left');
                    // $(this).css('float','left');
                    
                              });
                         
                          $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');

                           //$('#answer-area').removeClass('offset-md-2 col-md-8');
                           // $('#answer-area').addClass('col-md-12');
                    }else{
                      //modify//


                      $('.ans-pag-link[data-id="2"]').addClass('disabled'); 
                       $(act).css("display","block");

                        act.addClass('active1');
                         $('#answer-area').removeClass('col-md-12');
                         $('#answer-area').addClass(' offset-md-2 col-md-8');
                    var single_wid2 = $(act).attr('data-width');
                     if(single_wid2!=0){
                    $(act).css('width',single_wid2+'%');
                  }

                  // modify//




                    }
                   




                       }else{
                     //console.log(act);

                                                                   //  alert("Fdfd");


                    if($("#table2").length != 0) {

                                $('#answer-area').addClass('offset-md-2 col-md-8');
                               $('#answer-area').removeClass('col-md-12');



                        console.log("Fdfd");
                            $(act).css("display","none");
                            var single_wid = $('#table2').attr('data-width');
                            var single_wid2 = $('#table1').attr('data-width');
                        // $('#table2').css("width","48%");

                                           if ($('#table2').hasClass('active1')){

                                           }else{
                                            $('#table2').addClass('active2');
                                           }

                         
                         $('#table2').css("display","block");
                         $('#table2').css("float","left");
                         

                          
                          

                           if ($('#table1').hasClass('active2')){

                                           }else{
                                           $('#table1').addClass('active1');
                                           }
                         // $('#table1').css("width","48%");
                          $('#table1').css("display","block");



                          if(single_wid!=0 && single_wid2!=0){
                    var single_wid1=single_wid-2;
                    var single_width2=single_wid2-2;
                  $('#table2').css('width',single_wid1+'%');
                  $('#table1').css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){
                  
                  var wid=100-single_wid2;
                   single_wid2=single_wid2-2;
                  $('#table2').css('width',wid+'%');
                  $('#table1').css('width',single_wid2+'%');
                }
                 else if(single_wid!=0 && single_wid2==0){
                  var wid=100-single_wid;
                     single_wid=single_wid-2;

                  $('#table2').css('width',single_wid+'%');
                   $('#table1').css('width',wid+'%');
                }
                else{
                 $('#table2').css('width','100%');
                   $('#table1').css('width','100%');
                }
                         
                          $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');
                    }else{
                      //modify//

                      $('.ans-pag-link[data-id="2"]').addClass('disabled'); 

                        act.addClass('active1');
                        $('#answer-area').removeClass('col-md-12');
            $('#answer-area').addClass(' offset-md-2 col-md-8');
                    var single_wid2 = $(act).attr('data-width');
                     if(single_wid2!=0){
                    $(act).css('width',single_wid2+'%');
                  }




                    }
                  }

                


                         $(".preview").each(function(){
                          $(this).removeClass('active');
                         });
                           
                         $(this).parent().addClass('active');


                      } 


                       

        // });
             });




                function show_image_answer(){



                          $('#answer-area').removeClass('col-md-6');
                           $('#answer-area').addClass(' col-md-12 full');
                          $('#answer-area').removeClass('d-none');
                          $('#question-area').addClass('d-none');


                        if($('#question-area').hasClass('col-md-6')){


                           $(".show_image_answer").removeClass("active");
                           $("#question-area").removeClass("col-md-6");
                           $("#question-area").addClass("col-md-12 full_q");


                         }


                  var actv=$(".tab-format.active").data("id");
            $(this).toggleClass('active');

             console.log(actv);



             //var actv=$(".problme-tab.active").data("id");
             if($('#table_img'+actv).html()){

              

               if($('#question-area').hasClass('col-md-12')){
               
                //$('.show_answer').trigger('click');

                  

                // $('#table_img'+actv).toggle();
                     // $(".problme-tab.active1").toggle();
                     // $(".problme-tab.active2").toggle();

                     // //$(".tab-format.active").toggle();
                     // $(".tab-format.active2").toggle();
           

// if($('#answer-area').find('.tab.active').is(':visible')){

//   }

                 //$(".problme-tab.active2").toggle();

                 // $('.tab-format[data-tableid="'+id6+'"]').toggle();

                                 //  $('.ans_tab[data-tableid="'+id6+'"]').toggle();





// 2 div in problem format//

// if($('#answer-area').find('.tab.active').is(':visible')){
                if($('#answer-area').find('.tab.active').is(':visible')){


                var act = $(".problme-tab.active");


                if($('#answer-area').hasClass('offset-md-2 col-md-8')){

                //alert('hggggh');


                act.css("display","block");
                act.addClass('active1');
                // $('#answer-area').removeClass('col-md-12');

                var single_wid2 = $(act).attr('data-width');
                if(single_wid2!=0){

                $(act).css('width',single_wid2+'%');
                }




                if($("#table_img1").length != 0) {

                // console.log("Fdfd");
                //$(act).css("display","none");
                var single_wid = $('#table_img1').attr('data-width');
                var single_wid2 = $('#table_img0').attr('data-width');
                // $('#table2').css("width","48%");
                $('#table_img1').addClass('active2');
                $('#table-ft1').addClass('active2');

                $('#table_img1').css("display","block");
                $('#table-ft1').css("display","block");
                $('#table_img1').css("float","right");



                $('#table_img0').addClass('active1');
                $('#table_img0').css("float","left");
                // $('#table1').css("width","48%");
                $('#table_img0').css("display","block");

                $('#table_img1').css('width','48%');
                $('#table_img0').css('width','48%');

                $('#answer-area').removeClass(' offset-md-2 col-md-8');
                $('#answer-area').removeClass('col-md-12');
                // $('#answer-area').addClass(' col-md-12');



                if(single_wid!=0 && single_wid2!=0){
                var single_wid1=single_wid-2;
                var single_width2=single_wid2-2;
                $('#table_img1').css('width',single_wid1+'%');
                $('#table_img0').css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){

                var wid=100-single_wid2;
                single_wid2=single_wid2-2;
                $('#table_img1').css('width',wid+'%');
                $('#table_img0').css('width',single_wid2+'%');
                }
                else if(single_wid!=0 && single_wid2==0){
                var wid=100-single_wid;
                single_wid=single_wid-2;

                $('#table_img1').css('width',single_wid+'%');
                $('#table_img0').css('width',wid+'%');
                }
                else{
                $('#table_img1').css('width','48%');
                $('#table_img0').css('width','48%');
                }

                $('#answer-area').addClass('col-md-12');


                // $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');
                }else{

                //modify//
                $('.pr-pag-link[data-id="2"]').addClass('disabled');
                act.addClass('active1');
                $('#answer-area').removeClass('col-md-12');
                // $('#answer-area').removeClass('col-md-12');
                //$('#answer-area').addClass(' offset-md-2 col-md-8');
                var single_wid2 = $(act).attr('data-width');
                if(single_wid2!=0){
                $(act).css('width',single_wid2+'%');
                }




                }







                }
                else{



                if($("#table_img1").length != 0) {



                // console.log("Fdfd");
                //$(act).css("display","none");
                var single_wid = $('#table_img1').attr('data-width');
                var single_wid2 = $('#table_img0').attr('data-width');
                // $('#table2').css("width","48%");
                $('#table_img1').addClass('active2');
                $('#table-ft1').addClass('active2');

                $('#table_img1').css("display","block");
                $('#table-ft1').css("display","block");
                $('#table_img1').css("float","right");



                $('#table_img0').addClass('active1');
                $('#table_img0').css("float","left");
                // $('#table1').css("width","48%");
                $('#table_img0').css("display","block");

                $('#table_img1').css('width','48%');
                $('#table_img0').css('width','48%');



                if(single_wid!=0 && single_wid2!=0){
                var single_wid1=single_wid-2;
                var single_width2=single_wid2-2;
                $('#table_img1').css('width',single_wid1+'%');
                $('#table_img0').css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){

                var wid=100-single_wid2;
                single_wid2=single_wid2-2;
                $('#table_img1').css('width',wid+'%');
                $('#table_img0').css('width',single_wid2+'%');
                }
                else if(single_wid!=0 && single_wid2==0){
                var wid=100-single_wid;
                single_wid=single_wid-2;

                $('#table_img1').css('width',single_wid+'%');
                $('#table_img0').css('width',wid+'%');
                }
                else{
                $('#table_img1').css('width','48%');
                $('#table_img0').css('width','48%');
                }

                // $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');
                //modified 24-08//
             $('#answer-area').removeClass(' offset-md-2 col-md-8');
                }else{

                               // alert('aaaa');

                //modify//
                $('.pr-pag-link[data-id="2"]').addClass('disabled');


                act.addClass('active1');
                                $('#table_img0').css("display","block");
                                $('#table_img0').show();


                               


                // $('#answer-area').removeClass('col-md-12');
                //$('#answer-area').addClass(' offset-md-2 col-md-8');
                var single_wid2 = $(act).attr('data-width');
                if(single_wid2!=0){
                $(act).css('width',single_wid2+'%');
                }




                }
                }
                }else{

                    if($('#answer-area').hasClass('offset-md-2 col-md-8')){

                         $("#answer-area").toggleClass("col-md-12 full");
                         $("#answer-area").toggleClass("offset-md-2 col-md-8 full"); 


                      }

                  }



                        $('#answer-area').find('.transaction-pool').toggle();

                                      // $('#answer-area').find('.trans_question').toggle();
                                  $('.trans_question').hide();


                               // $('#answer-area').find('.tab.active1').toggle();
                               // $('#answer-area').find('.tab.active2').toggle();
                               $('.ans-pag-link').toggleClass('disabled'); 
                      $('.pr-pag-link').toggleClass('disabled'); 







          

                                                                //$('.question-area').toggle();

                                


           
           // $('.q_area').toggle();
           
           // $('.img_hidden').html($('#table_img1').html());

           // console.log($('.img_hidden').html());
           //$('.img_hidden').show();
             // $('#table_img'+actv).css('display','none');
              // $('.photo_thumb'+actv).addClass('photo-thumb');
               
            //$('.tab.active').toggle();

             }else{
             

            // $('#answer-area').removeClass('col-md-6');
            //  $('#answer-area').addClass('offset-md-2 col-md-8 full');
// if($('#answer-area').hasClass('col-md-12 full')){
//  // $("#question-area").toggleClass("col-md-6"); 
// }else{
                 
// }

$("#answer-area").toggleClass("col-md-6"); 
               $("#answer-area").toggleClass("col-md-12 full");


                       // $("#answer-area").toggleClass("offset-md-2 col-md-8 full");  



             // $('#table_img'+actv).toggle();
              $(".problme-tab.active1").toggle();
              $(".problme-tab.active2").toggle();

              //$(".tab-format.active").toggle();
              $(".tab-format.active2").toggle();



                          if($('#answer-area').find('.tab.active').is(':visible')){

                          // alert('kkj');


                          var act = $(".problme-tab.active");


                          //   if($('#answer-area').hasClass('offset-md-2 col-md-8')){
                          //      act.css("display","block");
                          //      act.addClass('active1');
                          //     // $('#answer-area').removeClass('col-md-12');

                          // var single_wid2 = $(act).attr('data-width');
                          // if(single_wid2!=0){
                          //    $(act).css('width',single_wid2+'%');
                          // }





                          // }else{
                          //console.log(act);

                          if($("#table_img1").length != 0) {

                          console.log("Fdfd");
                          $(act).css("display","none");
                          var single_wid = $('#table_img1').attr('data-width');
                          var single_wid2 = $('#table_img0').attr('data-width');
                          // $('#table2').css("width","48%");
                          $('#table_img1').addClass('active2');
                          $('#table-ft1').addClass('active2');

                          $('#table_img1').css("display","block");
                          $('#table-ft1').css("display","block");
                          $('#table_img1').css("float","right");



                          $('#table_img0').addClass('active1');
                          $('#table_img0').css("float","left");
                          // $('#table1').css("width","48%");
                          $('#table_img0').css("display","block");

                          $('#table_img1').css('width','48%');
                          $('#table_img0').css('width','48%');



                          if(single_wid!=0 && single_wid2!=0){
                          var single_wid1=single_wid-2;
                          var single_width2=single_wid2-2;
                          $('#table_img1').css('width',single_wid1+'%');
                          $('#table_img0').css('width',single_width2+'%');
                          }
                          else if(single_wid==0 && single_wid2!=0){

                          var wid=100-single_wid2;
                          single_wid2=single_wid2-2;
                          $('#table_img1').css('width',wid+'%');
                          $('#table_img0').css('width',single_wid2+'%');
                          }
                          else if(single_wid!=0 && single_wid2==0){
                          var wid=100-single_wid;
                          single_wid=single_wid-2;

                          $('#table_img1').css('width',single_wid+'%');
                          $('#table_img0').css('width',wid+'%');
                          }
                          else{
                          $('#table_img1').css('width','48%');
                          $('#table_img0').css('width','48%');
                          }

                          // $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');
                          // $('#answer-area').removeClass(' offset-md-2 col-md-8');
                          }else{
                          //modify//
                          $('.pr-pag-link[data-id="2"]').addClass('disabled');
                          act.addClass('active1');
                          ////// $('#answer-area').removeClass('col-md-12');
                          //$('#answer-area').addClass(' offset-md-2 col-md-8');
                          var single_wid2 = $(act).attr('data-width');
                          if(single_wid2!=0){
                          $(act).css('width',single_wid2+'%');
                          }
                          $('#table_img0').css("display","block");
                          //$('#table_img0').css("display","block");


                          }
                          //}
                          }
                  
                $('#answer-area').find('.transaction-pool').toggle();
                 $('.trans_question').hide();

                $('.question-area').toggle();

                               // $('#answer-area').find('.trans_question').toggle();

 //$('#answer-area').find('.tab.active').addClass('active1');
                               // $('#answer-area').find('.tab.active').toggle();
                               //
                               // $('#answer-area').find('.tab.active1').toggle();
                      // $('#answer-area').find('.tab.active2').toggle();





              }
            }

                         
            // return false;


            if($('#table_img0').is(':visible')){

             // if($('#table_img0').css('display') == 'block'){
                                                                 // alert('hide-pr');

                                 }else{

             // if($('#table_img0').css('display') == 'block'){
                                                                 // alert('hide1-pr');

                                 } 



                } 

             $('.show_image_answer').click(function (e) {

   // e.stopPropagation();
    e.preventDefault();
  e.stopImmediatePropagation();
                //alert('hhuuuuuuuu');



                           $('#answer-area').removeClass('d-none');
                          $('#question-area').addClass('d-none');
           
             var actv=$(".tab-format.active").data("id");

                              if($('.show_question_new').parent().hasClass('active')){

                              }else{
                                            $(this).toggleClass('active');

                              }


             console.log(actv);



             //var actv=$(".problme-tab.active").data("id");
             if($('#table_img'+actv).html()){

              

               if($('#question-area').hasClass('col-md-12')){
               
                //$('.show_answer').trigger('click');

                  

                // $('#table_img'+actv).toggle();
                     $(".problme-tab.active1").toggle();
                     $(".problme-tab.active2").toggle();

                     //$(".tab-format.active").toggle();
                     $(".tab-format.active2").toggle();
           

// if($('#answer-area').find('.tab.active').is(':visible')){

//   }

                 //$(".problme-tab.active2").toggle();

                 // $('.tab-format[data-tableid="'+id6+'"]').toggle();

                                 //  $('.ans_tab[data-tableid="'+id6+'"]').toggle();





// 2 div in problem format//

// if($('#answer-area').find('.tab.active').is(':visible')){
                if($('#answer-area').find('.tab.active').is(':visible')){


                var act = $(".problme-tab.active");


                if($('#answer-area').hasClass('offset-md-2 col-md-8')){

                //alert('hggggh');


                act.css("display","block");
                act.addClass('active1');
                // $('#answer-area').removeClass('col-md-12');

                var single_wid2 = $(act).attr('data-width');
                if(single_wid2!=0){

                $(act).css('width',single_wid2+'%');
                }




                if($("#table_img1").length != 0) {

                  $('.pr-pag-link[data-id="2"]').removeClass('disabled');
                  $('.pr-pag-link[data-id="1"]').removeClass('disabled');
                                    $('.pr-pag-link').removeClass('disabled');


                // console.log("Fdfd");
                                 if($('.show_question_new').parent().hasClass('active')){
                $(act).css("display","block");


                                 }else{
                $(act).css("display","none");

                                 }

                var single_wid = $('#table_img1').attr('data-width');
                var single_wid2 = $('#table_img0').attr('data-width');
                // $('#table2').css("width","48%");
                $('#table_img1').addClass('active2');
                $('#table-ft1').addClass('active2');

                $('#table_img1').css("display","block");
                $('#table-ft1').css("display","block");
                $('#table_img1').css("float","left");



                $('#table_img0').addClass('active1');
                $('#table_img0').css("float","left");
                // $('#table1').css("width","48%");
                $('#table_img0').css("display","block");

                 $('#table_img1').css('width','100%');
                 $('#table_img0').css('width','100%');

                $('#answer-area').removeClass(' offset-md-2 col-md-8');
                $('#answer-area').removeClass('col-md-12');
                // $('#answer-area').addClass(' col-md-12');



                if(single_wid!=0 && single_wid2!=0){
                var single_wid1=single_wid-2;
                var single_width2=single_wid2-2;
                $('#table_img1').css('width',single_wid1+'%');
                $('#table_img0').css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){

                var wid=100-single_wid2;
                single_wid2=single_wid2-2;
                $('#table_img1').css('width',wid+'%');
                $('#table_img0').css('width',single_wid2+'%');
                }
                else if(single_wid!=0 && single_wid2==0){
                var wid=100-single_wid;
                single_wid=single_wid-2;

                $('#table_img1').css('width',single_wid+'%');
                $('#table_img0').css('width',wid+'%');
                }
                else{
                $('#table_img1').css('width','100%');
                $('#table_img0').css('width','100%');
                }

                $('#answer-area').addClass('offset-md-2 col-md-8');


                // $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');
                }else{
                 // alert($('.pr-pag-link[data-id="2"]'));

                                


                //modify//
                $('.pr-pag-link[data-id="2"]').addClass('disabled');
                $('.pr-pag-link[data-id="1"]').removeClass('disabled');


                act.addClass('active1');

                if($('.pr-pag-link[data-id="2"]').hasClass('disabled')){
                                        // alert("cjhhjvhjc");

                                    }

                        if($('.show_question_new').parent().hasClass('active')){
$(".problme-tab.active1").toggle();

                                 }else{
               // $(act).css("display","none");

                                 }
                $('#answer-area').removeClass('col-md-12');
                // $('#answer-area').removeClass('col-md-12');
                //$('#answer-area').addClass(' offset-md-2 col-md-8');
                var single_wid2 = $(act).attr('data-width');
                if(single_wid2!=0){
                $(act).css('width',single_wid2+'%');
                }




                }







                }
                else{
                  ///////////



                if($("#table_img1").length != 0) {

                  $('.pr-pag-link').removeClass('disabled');

                  $('.pr-pag-link[data-id="2"]').removeClass('disabled');
                   $('.pr-pag-link[data-id="1"]').removeClass('disabled');

                // console.log("Fdfd");
                if($('.show_question_new').parent().hasClass('active')){

                $(act).css("display","block");

                                 }else{
                $(act).css("display","none");

                                 }
                //$(act).css("display","none");
                var single_wid = $('#table_img1').attr('data-width');
                var single_wid2 = $('#table_img0').attr('data-width');
                // $('#table2').css("width","48%");
                $('#table_img1').addClass('active2');
                $('#table-ft1').addClass('active2');

                $('#table_img1').css("display","block");
                $('#table-ft1').css("display","block");
                $('#table_img1').css("float","left");



                $('#table_img0').addClass('active1');
                $('#table_img0').css("float","left");
                // $('#table1').css("width","48%");
                $('#table_img0').css("display","block");

                $('#table_img1').css('width','100%');
                $('#table_img0').css('width','100%');



                if(single_wid!=0 && single_wid2!=0){
                var single_wid1=single_wid-2;
                var single_width2=single_wid2-2;
                $('#table_img1').css('width',single_wid1+'%');
                $('#table_img0').css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){

                var wid=100-single_wid2;
                single_wid2=single_wid2-2;
                $('#table_img1').css('width',wid+'%');
                $('#table_img0').css('width',single_wid2+'%');
                }
                else if(single_wid!=0 && single_wid2==0){
                var wid=100-single_wid;
                single_wid=single_wid-2;

                $('#table_img1').css('width',single_wid+'%');
                $('#table_img0').css('width',wid+'%');
                }
                else{
                $('#table_img1').css('width','100%');
                $('#table_img0').css('width','100%');
                }

                // $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');
                //modified 24-08//
            // $('#answer-area').removeClass(' offset-md-2 col-md-8');
                }else{

                             //   alert('aaaa');

                //modify//
                $('.pr-pag-link[data-id="2"]').addClass('disabled');
                 $('.pr-pag-link[data-id="1"]').removeClass('disabled');


                act.addClass('active1');
                                         
                                           if($('.show_question_new').parent().hasClass('active')){
                $(".problme-tab.active1").toggle();


                                 }else{
                // $(act).css("display","none");

                                 }          // $(".problme-tab.active1").toggle();



                               


                // $('#answer-area').removeClass('col-md-12');
                $('#answer-area').addClass(' offset-md-2 col-md-8');
                var single_wid2 = $(act).attr('data-width');
                if(single_wid2!=0){
                $(act).css('width',single_wid2+'%');
                }




                }
                }
                }else{

                                   //  alert('rrggg');


                    if($('#answer-area').hasClass('offset-md-2 col-md-8')){

                        // $("#answer-area").toggleClass("col-md-12 full");
                         //$("#answer-area").toggleClass("offset-md-2 col-md-8 full"); 


                      }

                  }



                        $('#answer-area').find('.transaction-pool').toggle();

                                      // $('#answer-area').find('.trans_question').toggle();
                                  $('.trans_question').hide();



                 if($('.show_question_new').parent().hasClass('active')){

                    // alert('jjkkk');
                     $('#answer-area').find('.tab.active1').hide();
                               $('#answer-area').find('.tab.active2').hide();



                  }else{
                              $('#answer-area').find('.tab.active1').toggle();
                               $('#answer-area').find('.tab.active2').toggle();
                    }


                               

                               $('.ans-pag-link').toggleClass('disabled'); 
                      // $('.pr-pag-link').toggleClass('disabled'); 







          

                                                                //$('.question-area').toggle();

                                


           
           // $('.q_area').toggle();
           
           // $('.img_hidden').html($('#table_img1').html());

           // console.log($('.img_hidden').html());
           //$('.img_hidden').show();
             // $('#table_img'+actv).css('display','none');
              // $('.photo_thumb'+actv).addClass('photo-thumb');
               
            //$('.tab.active').toggle();

             }else{
             

            // $('#answer-area').removeClass('col-md-6');
            //  $('#answer-area').addClass('offset-md-2 col-md-8 full');
// if($('#answer-area').hasClass('col-md-12 full')){
//  // $("#question-area").toggleClass("col-md-6"); 
// }else{
                 
// }

$("#answer-area").toggleClass("col-md-6"); 
               $("#answer-area").toggleClass("offset-md-2 col-md-8 full");


                       // $("#answer-area").toggleClass("offset-md-2 col-md-8 full");  



             // $('#table_img'+actv).toggle();
              $(".problme-tab.active1").toggle();
              $(".problme-tab.active2").toggle();

              //$(".tab-format.active").toggle();
              $(".tab-format.active2").toggle();



                          if($('#answer-area').find('.tab.active').is(':visible')){

                          // alert('kkj');


                          var act = $(".problme-tab.active");


                          //   if($('#answer-area').hasClass('offset-md-2 col-md-8')){
                          //      act.css("display","block");
                          //      act.addClass('active1');
                          //     // $('#answer-area').removeClass('col-md-12');

                          // var single_wid2 = $(act).attr('data-width');
                          // if(single_wid2!=0){
                          //    $(act).css('width',single_wid2+'%');
                          // }





                          // }else{
                          //console.log(act);

                          if($("#table_img1").length != 0) {

                          console.log("Fdfd");
                          $(act).css("display","none");
                          var single_wid = $('#table_img1').attr('data-width');
                          var single_wid2 = $('#table_img0').attr('data-width');
                          // $('#table2').css("width","48%");
                          $('#table_img1').addClass('active2');
                          $('#table-ft1').addClass('active2');

                          $('#table_img1').css("display","block");
                          $('#table-ft1').css("display","block");
                          $('#table_img1').css("float","left");



                          $('#table_img0').addClass('active1');
                          $('#table_img0').css("float","left");
                          // $('#table1').css("width","48%");
                          $('#table_img0').css("display","block");

                          $('#table_img1').css('width','100%');
                          $('#table_img0').css('width','100%');



                          if(single_wid!=0 && single_wid2!=0){
                          var single_wid1=single_wid-2;
                          var single_width2=single_wid2-2;
                          $('#table_img1').css('width',single_wid1+'%');
                          $('#table_img0').css('width',single_width2+'%');
                          }
                          else if(single_wid==0 && single_wid2!=0){

                          var wid=100-single_wid2;
                          single_wid2=single_wid2-2;
                          $('#table_img1').css('width',wid+'%');
                          $('#table_img0').css('width',single_wid2+'%');
                          }
                          else if(single_wid!=0 && single_wid2==0){
                          var wid=100-single_wid;
                          single_wid=single_wid-2;

                          $('#table_img1').css('width',single_wid+'%');
                          $('#table_img0').css('width',wid+'%');
                          }
                          else{
                          $('#table_img1').css('width','100%');
                          $('#table_img0').css('width','100%');
                          }

                          // $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');
                          // $('#answer-area').removeClass(' offset-md-2 col-md-8');
                          }else{
                          //modify//
                          $('.pr-pag-link[data-id="2"]').addClass('disabled');
                          act.addClass('active1');
                          ////// $('#answer-area').removeClass('col-md-12');
                          //$('#answer-area').addClass(' offset-md-2 col-md-8');
                          var single_wid2 = $(act).attr('data-width');
                          if(single_wid2!=0){
                          $(act).css('width',single_wid2+'%');
                          }
                          $('#table_img0').css("display","block");
                          //$('#table_img0').css("display","block");


                          }
                          //}
                          }
                  
                $('#answer-area').find('.transaction-pool').toggle();
                 $('.trans_question').hide();

                $('.question-area').toggle();

                               // $('#answer-area').find('.trans_question').toggle();

 //$('#answer-area').find('.tab.active').addClass('active1');


  if($('.show_question_new').parent().hasClass('active')){

                   // alert('rrr');

                                  $('#answer-area').find('.tab.active1').hide();
                               $('#answer-area').find('.tab.active2').hide();

                    // alert('jjkkk');



                  }else{
                              $('#answer-area').find('.tab.active1').toggle();
                               $('#answer-area').find('.tab.active2').toggle();
                    }
                               // $('#answer-area').find('.tab.active').toggle();
                               //
                               // $('#answer-area').find('.tab.active1').toggle();
                       //$('#answer-area').find('.tab.active2').toggle();





              }
            }

                         
            // return false;


            if($('#table_img0').is(':visible')){

             // if($('#table_img0').css('display') == 'block'){
                                                                //  alert('hide-pr');

                                 }else{

             // if($('#table_img0').css('display') == 'block'){
                                                                //  alert('hide1-pr');

                                 } 

                                     return false;

           
         //  $('.photo-thumb'+actv+' a').trigger('click');
          
        });





                $('.pag_link_pr').click(function(){
                  //modify//

                  if ($(this).hasClass('disabled')){
                     return false;
                  }
                    var id=parseInt($(this).attr('data-id'));

                    $('.pag_link_pr').parent().removeClass('active');
                      $(this).parent().addClass('active');
                      $('.pag_link_pr').removeClass('active');
                      $(this).addClass('active');
                    if(id==1){
                     // alert("kkll");


 $('.pr-pag-link[data-id="1"]').removeClass('disabled');
                     $('.shift_right_pr').addClass('disabled');
                        if($('#answer-area').hasClass('full')){
                          


//modify//
                         $('#answer-area').removeClass('col-md-12');
                         $('#answer-area').addClass(' offset-md-2 col-md-8');

                          
                           var act = $(".problme-tab.active1");
                          var id_act = parseInt(act.attr('data-id'));
                          // $(".quest_table").each(function(){
                          //      $(this).css('width','100%');
                          //  });


                             $(".problme-tab").each(function(){

                                            if($(this).hasClass('active1')){
                                                
                                              $(this).show();
                                            }else{
                                               // $(this).removeClass('active2').hide(); 
                                               //  $(this).removeClass('active').hide();
                                            }

                                                
                                                
                                                $(this).css('width','100%');
                                                 $(this).css('float','left');
                    // $(this).css('float','left');
                    
                              });

                        }

                      
                    }else{
                     $('.shift_right_pr').removeClass('disabled');


                      if($('#answer-area').hasClass('full')){

                          $('#answer-area').addClass('col-md-12');
                          $('#answer-area').removeClass(' offset-md-2 col-md-8');
                         //  var act = $(".table-box.active1");
                          //var id_act = parseInt(act.attr('data-id'));
                          // $(".quest_table").each(function(){
                          //      $(this).css('width','100%');
                          //  });

                            var act = $(".problme-tab.active1");
                            var id = parseInt(act.attr('data-id'))+1;

                            var tab1 = '#table_img'+id;


                         //   var act1 = $(".ans_tab.active2");
                     //console.log(act);

                    // if(act1.length != 0) {
                       if($(tab1).html()){


                        var single_wid = act.attr('data-width');
                            var single_wid2 = $(tab1).attr('data-width');
                     
                            //$(act).css("display","none");
                         $(tab1).css("width","48%");
                         $(tab1).addClass('active2');
                         $(tab1).css("display","block");
                         $(tab1).css("float","right");
                         

                          
                          //$('#table1').addClass('active1');
                          act.css("width","48%");
                          act.css("display","block");
                         
                          // $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');
                    }
                    else{

                      $('#table_img0').addClass('active2');
                          $('#table_img0').css("width","48%");
                          $('#table_img0').css("display","block");
                          $('#table_img0').css("float","right");

                           act.css("width","48%");
                          act.css("display","block");

                    }



                        }




                    }


                // var act = $(".tab.active");
                // // var last = parseInt($('#tab-last').val());
                // var id_act = parseInt(act.attr('data-id'));


                // if(id>id_act){
                   
                // var e = jQuery.Event("keydown");
                //       e.keyCode = 39; // m code value
                   
                //       $(this).trigger(e);

                // }else{

                  
                //   // $( ".shift_left" ).trigger( "click" );
                //   var e = jQuery.Event("keydown");
                //       e.keyCode = 37; // m code value
                   
                //       $(this).trigger(e);
                // }
                

                });



          $('.show_help_image').click(function () {
          // $('.help_img').toggle(); 
          //$('.answer-area').toggle(); 
         // console.log($('.trans_help_img').html());

          if($('.help_img').attr('src')!=''){
          // $('#table_img'+actv).toggle();
           
          $('.q_area').toggle();
           $('.img_hidden').html($('.trans_help_img').html());
           $('.img_hidden').show();
          $('.img_hidden').find($('.help_img')).css('display','block');
              // $('.photo_thumb'+actv).addClass('photo-thumb');
               
            //$('.tab.active').toggle(); 
            }

          // $('.photo-thumb-trans a').trigger('click');

        
            // var actv=$(".tab.active").data("id");
            // if( $('#table_img'+actv).html()){
            //    $('#table_img'+actv).toggle();
            // $('.tab.active').toggle(); 
            // }
            
           
          
        });


          
        var elem = document.documentElement;
 

      $('.show_full_screen').click(function () {
         toggleFull();
            //  if (elem.requestFullscreen) {
            //   elem.requestFullscreen();
            // } else if (elem.mozRequestFullScreen) { /* Firefox */
            //   elem.mozRequestFullScreen();
            // } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
            //   elem.webkitRequestFullscreen();
            // } else if (elem.msRequestFullscreen) { /* IE/Edge */
            //   elem.msRequestFullscreen();
            // }  


            // $(this).removeClass('show_full_screen');
            // $(this).addClass('show_exit_screen');
            // $(this).value='Exit';
            


        });

//        $('.show_exit_screen').click(function () {
// alert("gfgf");
//         if (document.exitFullscreen) {
//           document.exitFullscreen();
//         } else if (document.mozCancelFullScreen) {
//           document.mozCancelFullScreen();
//         } else if (document.webkitExitFullscreen) {
//           document.webkitExitFullscreen();
//         } else if (document.msExitFullscreen) {
//           document.msExitFullscreen();
//         }

//         $(this).removeClass('show_exit_screen');
//           $(this).addClass('show_full_screen');
//            $(this).value='Full Screen';


//         });


        

        

                    //  $('.shift_vertical').click(function () {

                      
                    //     if($('#answer-area').hasClass('full')){

                    //       $('#answer-area').removeClass('col-md-12');
                    //       $('#answer-area').addClass(' offset-md-2 col-md-8');

                          
                    //        var act = $(".table-box.active1");
                    //       var id_act = parseInt(act.attr('data-id'));
                    //       // $(".quest_table").each(function(){
                    //       //      $(this).css('width','100%');
                    //       //  });


                    //          $(".ans_tab").each(function(){

                    //                         if($(this).hasClass('active1')){
                                                
                    //                           $(this).show();
                    //                         }else{
                    //                            //$(this).removeClass('active2').hide(); 
                    //                             //$(this).removeClass('active').hide();
                    //                         }

                                                
                                                
                    //                             $(this).css('width','100%');
                    //                              $(this).css('float','left');
                    // // $(this).css('float','left');
                    
                    //           });

                    //     }


                    //    });

             $('.full_answer').click(function () {



                                   $(".ans_tr").find('.disc1').each(function(){

                         $(this).toggleClass('load-full-answer');


                              // $(this).css('display','block');

                                                  });








              });


        $('.show_full').click(function () {

                  if($('#answer-area').hasClass('full')){
                     $(".ans_tab").each(function(){

                if($(this).hasClass('active1')){
                   
                    
                  $(this).removeClass('active1').show();
                }else if($(this).hasClass('active')){
                 $(this).show();

                   }else{
                   $(this).removeClass('active2').hide(); 
                   // $(this).removeClass('active').hide();
                }

                    
                    
                    $(this).css('width','100%');
                     $(this).css('float','left');
                    // $(this).css('float','left');
                    
                });
                  }


                   if($('#question-area').hasClass('full_q')){
                   
                     $(".quest_table").each(function(){
                        $(this).css('width','100%');
                    });

                     

                      $(".transations").each(function(){
                        $(this).css('float','left');
                        $(this).css('width','100%');
                        $(this).css('display','none');
                    });
                      $( ".transations" ).css( "display", "block" );

                   }



                  $(".problme-tab.active1").hide();
                 $(".problme-tab.active2").hide();
                $('.show_image_answer').removeClass('active');

                //     $(".problme-tab.active1").hide();
                //  $(".problme-tab.active2").hide();
                // $('.show_image_answer').removeClass('active');




              $('#answer-area').css('margin-top','-2px')

            $('#answer-area').removeClass(' col-md-12');
             $('#answer-area').removeClass(' offset-md-2 col-md-8');
            $('#answer-area').addClass('col-md-6');
            $('#answer-area').removeClass('d-none');
            $('#answer-area').removeClass('full');
            $('#question-area').removeClass('col-md-12');
            $('#question-area').addClass('col-md-6');
            $('#question-area').removeClass('d-none');
            $('#question-area').show();
            $('#question-area').removeClass('full_q');
             $('.question-div').css('padding-left','20px');
            $('.question-div').css('padding-right','20px');
        $('.q_area').removeClass('align-items-center');




                  var htm = $('#answer-area').find('.trans_question').html() ? $('#answer-area').find('.trans_question').html() : '';
                  var tr_html=$('#answer-area').find('.trans_tray').html() ? $('#answer-area').find('.trans_tray').html() : '';
                 //console.log($('#answer-area').find('.trans_tray').html());

                  if($.trim($('#answer-area').find('.trans_question').html())!=''){
                   // $('#answer-area').find('.trans_question').css('display','block');
                   
                     // $('#answer-area').find('.help-text').show();
                      $('#answer-area').find('.transaction-pool').css('display','block');

                  }else{
                    //$('#answer-area').find('.trans_question').css('display','block');
                     $('#answer-area').find('.transaction-pool').css('display','block');
                  }
             





        // $('#answer-area').find('.transaction-pool').show();
        // $('#answer-area').find('.trans_question').show();



         $(".preview").each(function(){
          $(this).removeClass('active');
         });
           
         $(this).parent().addClass('active');


        });
        $('.refresh_screen').click(function () {
            refresh_screen();
        });



        $(document).on('click','.sub_table',function(){

        

         var e = $.Event( "keydown", { keyCode: 13 } );
            $('#input-field').trigger(e);
           var htm = $(this).find('li').html() ? $(this).find('li').html() : '';
           console.log(htm);
           // var htm=$(this).find('li').html();
            var width = $(this).width();
            var height = $(this).height();

            if($(this).find('li').hasClass('u_line')){
                 var input = '<input type="text" id="input-field"  class="answer-colum-highlight u_line number" style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false">';

            }else{
                  var input = '<input type="text" id="input-field"  class="answer-colum-highlight number" style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false">';
            }


           
            
           // $(this).html(input);
            $(this).removeClass('empty');
            $('#input-field').focus();

       });


        $(document).on('click','.sub_table_fixed',function(){

        

         var e = $.Event( "keydown", { keyCode: 13 } );
            $('#input-field').trigger(e);
           var htm = $(this).find('li').html() ? $(this).find('li').html() : '';
           console.log(htm);
           // var htm=$(this).find('li').html();
            var width = $(this).width();
            var height = $(this).height();

            if($(this).find('li').hasClass('u_line')){

               if($(this).find('li').hasClass('td_line')){
                var input = '<input type="text" id="input-field"  class="answer-colum-highlight u_line td_line" style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false">';
               }else{
                var input = '<input type="text" id="input-field"  class="answer-colum-highlight u_line " style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false">';
               }
                 

            }else{
               if($(this).find('li').hasClass('td_line')){
                var input = '<input type="text" id="input-field"  class="answer-colum-highlight td_line" style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false">';
              }else{

                var input = '<input type="text" id="input-field"  class="answer-colum-highlight " style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false">';

              }
                  
            }


           
            
            //$(this).html(input);
            $(this).removeClass('empty_fixed');
            $('#input-field').focus();

       });

        $(document).on('click','.row_data tr>td.empty',function(){
            var e = $.Event( "keydown", { keyCode: 13 } );
            $('#input-field').trigger(e);
           var htm = $(this).find('li').html() ? $(this).find('li').html() : '';



           // var htm=$(this).find('li').html();


            var width = $(this).width();
            var height = $(this).height();

        var sub_htm = $(this).find('table').html() ? $(this).find('table').html() : '';

            
            if(sub_htm!=''){

             

               
                 var elem=$(this).find('.sub_table');

                 //onsole.log(elem);


                   var width1 = elem.width();
                   var height1 = elem.height();
         
             var htm1 = elem.find('li').html() ? elem.find('li').html() : '';

             
                 var input_new = '<input type="text" id="input-field"  class="answer-colum-highlight number " style="height:'+height1+';width:'+width1+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm1+'" spellcheck="false">';
            
               

          
            // console.log(input_new);
           // elem.html(input_new);

  


          }
      else{

        var td_elem=$(this).find('li');
        if(td_elem.hasClass('td_line')){
          var class1="td_line";
        }else{
          var class1="";
        }


         if($(this).find('li').hasClass('text-right')){
              var cls='number';
             }else{
               var cls='';
             }
            // alert(cls);
       
       if(td_elem.hasClass('u_line')){
            var input = '<input type="text" id="input-field"  class="answer-colum-highlight  u_line'+cls+' '+class1+'" style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false" autocomplete="off">';
            
           }else{
            var input = '<input type="text" id="input-field"  class="answer-colum-highlight '+cls+' '+class1+'" style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false" autocomplete="off">';
           }
       
            
           // $(this).html(input);
            
          }

            $(this).removeClass('empty');
            $('#input-field').focus();
          
        });


         $(document).on('click','.row_data tr>td.empty_fixed',function(){
            //alert("hjhvh");
            var e = $.Event( "keydown", { keyCode: 13 } );
            //$('#input-field').trigger(e);
           var htm = $(this).find('li').html() ? $(this).find('li').html() : '';
           // var htm=$(this).find('li').html();
            var width = $(this).width();
            var height = $(this).height();

          if($(this).hasClass('underline')){
            $(this).addClass('underline_ans')
          }


             var sub_htm = $(this).find('table').html() ? $(this).find('table').html() : '';

            
            if(sub_htm!=''){

              
              var elem=$(this).find('.sub_table');

              if($(this).find('li').hasClass('td_line')){
                var class1="td_line";
              }else{
                var class1="";
              }


                 //onsole.log(elem);


                   var width1 = elem.width();
                   var height1 = elem.height();
         
             var htm1 = elem.find('li').html() ? elem.find('li').html() : '';

             
                 var input_new = '<input type="text" id="input-field"  class="answer-colum-highlight '+class1+'" style="height:'+height1+';width:'+width1+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm1+'" spellcheck="false">';
            
               

          
            // console.log(input_new);
            //elem.html(input_new);


          }else{


              if($(this).find('li').hasClass('u_line')){

               var input = '<input type="text" id="input-field"  class="u_line '+class1+'" style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false">'; 
           }else{
                 var input = '<input type="text" id="input-field" class="'+class1+'"  style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false">'; 
           }




          }


          
            
            $(this).removeClass('empty');
           // $(this).html(input);
            $('#input-field').focus();
        });

  //        $(document).on('click','.row_data tr>td.empty_fixed',function(){
  //           //alert("hjhvh");
  //           var e = $.Event( "keydown", { keyCode: 13 } );
  //           $('#input-field').trigger(e);
  //          var htm = $(this).find('li').html() ? $(this).find('li').html() : '';
  //          // var htm=$(this).find('li').html();
  //           var width = $(this).width();
  //           var height = $(this).height();

  // if($(this).find('li').hasClass('td_line')){
  //   var class1="td_line";
  // }else{
  //   var class1="";
  // }

  //           if($(this).find('li').hasClass('u_line')){
  //               var input = '<input type="text" id="input-field" class="u_line '+class1+'" style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false">';
  //           }else{
  //               var input = '<input type="text" id="input-field" class="'+class1+'" style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false">';
  //           }
            
  //           $(this).removeClass('empty');
  //           $(this).html(input);
  //           $('#input-field').focus();
  //       });

        // $(document).on('click','body',function(e){
        //     console.log($(e).hasClass('connected'));
        //     var e = $.Event( "keydown", { keyCode: 13 } );
        //     $('#input-field').trigger(e);
        // })

        
                $('.wh_board').click(function () {
                  $("#can").hide();
                    $("#can").css('background','#fff');
                    $("#can").css("z-index", '-1');
                    $('#can').css('position','static');

                    $("#can").show();
                    
                  
                });
                $('.b_board').click(function () {
                  $("#can").hide();

                    $("#can").css('background','black');
                    $("#can").css("z-index", '-1');
                    $('#can').css('position','static');

                    $("#can").show();
                    
                  
                });
                $('.trans_board').click(function () {
                  $("#can").hide();
                    $("#can").css('background','transparent');
                    $("#can").css('z-index','1');
                    $("#can").css('position','absolute');
                    
                  

                    $("#can").show();
                    
                  
                });


$('.remove_canvas').click(function () {
                  $("#can").hide();
                    
                    
                  
                });
     

        $('.plus_input').click(function () {
          var sum=$(this).attr("data-sum");
         

          $(this).addClass('active_res');
           $('.minus_input').removeClass('active_res');
           $('.copy_sum').removeClass('active_res');
          
                var a=$('#input-field').val();

                a=a.replace(/\,/g,'');
                a=a.replace(/[{()}]/g, '');
                a=parseFloat(a);
                var sum_new=parseFloat(sum)+parseFloat(a);
           
            $(this).attr('data-sum',sum_new);
     
        });

         $('.minus_input').click(function() {
          var sum=$(this).attr("data-sum");

          $(this).addClass('active_res');
          $('.plus_input').removeClass('active_res');
          $('.copy_sum').removeClass('active_res');

          var a=$('#input-field').val();
          a=a.replace(/\,/g,'');
          a=a.replace(/[{()}]/g, '');
          a=parseFloat(a);
          if(a>parseFloat(sum)){
            var sum_new=parseFloat(a)-parseFloat(sum);


          }else{
            var sum_new=parseFloat(sum)-parseFloat(a);
          }
          
//console.log(sum_new);
           $(this).attr('data-sum',sum_new);

        });

             

        $('.equal_result').click(function () {
          var sum=$('.active_res').attr("data-sum");

           


          var sum_new=sum.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
          $('#input-field').val(sum_new);

            $('.active_res').attr('data-sum',0);

          
        });

         $('.copy_sum').click(function () {
           var a=$('#input-field').val();
           $('.plus_input').removeClass('active_res');
          $('.minus_input').removeClass('active_res');
          a=a.replace(/\,/g,'');
          a=a.replace(/[{()}]/g, '');
          a=parseFloat(a);
           $(this).attr('data-sum',a);
          $(this).addClass('active_res');


          
        });

        



           $('.change_bg_blue').click(function () {

           $('#input-field').css('background','none');
          $('#input-field').parent().addClass('total');
            $('#input-field').parent().addClass('bg_blue');
            //$('.bgcolor_chng').removeClass();
           $('.bgcolor_chng').attr('class','bgcolor_chng');


            $('.bgcolor_chng').addClass('cellBg5 ');
          $('#input-field').parent().removeClass('bg_black');
          $('#input-field').parent().removeClass('bg_red');
          
        });


            $('.change_bg_red').click(function () {
                $('#input-field').css('background','none');
          
            $('#input-field').parent().addClass('total');
            $('#input-field').parent().addClass('bg_red');
            $('#input-field').parent().removeClass('bg_blue');
            $('#input-field').parent().removeClass('bg_black');
             $('.bgcolor_chng').attr('class','bgcolor_chng');
            $('.bgcolor_chng').addClass('cellBg2');
          
        });


            $('.change_bg_black').click(function () {
            $('#input-field').css('background','none');
            $('#input-field').parent().addClass('total');
            $('#input-field').parent().addClass('bg_black');
            $('#input-field').parent().removeClass('bg_red');
            $('#input-field').parent().removeClass('bg_blue');

             $('.bgcolor_chng').attr('class','bgcolor_chng');
            $('.bgcolor_chng').addClass('cellBg3');
          
        });

             $('.change_bg_none').click(function () {
          
            
            $('#input-field').parent().removeClass('bg_black');
            $('#input-field').parent().removeClass('bg_red');
            $('#input-field').parent().removeClass('bg_blue');
            $('#input-field').parent().removeClass('total');
            $('.bgcolor_chng').attr('class','bgcolor_chng');
            $('.bgcolor_chng').addClass('bg_trans');
          
        });


// input field keydown///
        $(document).on('keydown','#input-field',function(e){

          
           // $(this).parent().css('background','#a4c89c');
           //background: rgb(199, 222, 187);
            if(e.keyCode == 13){

                //var val = $.trim($(this).val());
                var val1 = $(this).val();
                var parent = $(this).parent();


                if(parent.hasClass('oredr-active')){


//parent.css('background','rgb(199, 222, 187)');
parent.removeClass('oredr-active');
                }

                  if(!$.isNumeric(val1)) {
                  var val=val1;
                  }else{

                  if($(this).hasClass('number')){

                  var val= val1
                  .replace(/\D/g, "")
                  .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                  ;
                  }else{
                     var val=val1;

                  }
                  }
// alert(val);

                 var width = $(this).width();
                 var height = $(this).height();

                 if($(this).hasClass('td_line')){
                  var class1="td_line";
                 }else{
                  var class1="";
                 }

                if($(this).hasClass('u_line')){

                  if(parent.hasClass('sub_table')){
                  var htm='<li class="disc '+class1+'" draggable="true" style="border:none;text-decoration:underline;text-underline-position: under;white-space:pre">'+val+'</li>' ;


                }else if(parent.hasClass('sub_table_fixed')){
                  var htm='<li class="disc '+class1+'" draggable="true" style="border:none;text-decoration:underline;text-underline-position: under;white-space:pre">'+val+'</li>' ;


                }else{

                 var htm='<li class="disc u_line '+class1+'" draggable="true" style="text-decoration:underline;text-underline-position: under;white-space:pre">'+val+'</li>' ;

                }
                   
                }
                else{
                  if(parent.hasClass('sub_table')){
                  var htm='<li class="disc '+class1+'" draggable="true" style="border:none;white-space:pre">'+val+'</li>' ;


                }else if(parent.hasClass('sub_table_fixed')){
                  var htm='<li class="disc '+class1+'" draggable="true" style="border:none;white-space:pre">'+val+'</li>' ;


                }else{
                  var htm='<li class="disc '+class1+'" draggable="true" style="white-space:pre">'+val+'</li>' ;

                }
  
                }
// 
// interactive question//

if($('#inter-stat').val()==1){


               var q_val=parent.data('ansid');
      var base_url = '<?=base_url()?>';

                        var type='answer';
                        console.log(parent);

                          $.ajax({
        url:base_url+'get-inter-question',
        type:'post',
        data:{type:type,q_val:q_val},
        success: function(out){
            var out =JSON.parse(out);
            if (out.status == 1) {

var data=out.data;
var option=data.option_no;
$('.qst-area').html('<p>'+data.title+'</p>');
  var htm=''

for(var i=0;i<option;i++){

  var name_array=[data.option1,data.option2,data.option3,data.option4];
  var k=i+1;

   var op='option'+k;
  // var val=data.op;

    console.log(name_array[i]);

  //console.log(data+'.'+op);
  //Things[i]
   htm+='<label class="container-radio">'+name_array[i]+'<input type="radio" name="radio" class="options-val" id="options-val" value="'+op+'"><span class="checkmark"></span></label>';

   // $('.append-option').html('<label class="container-radio">'+name_array[i]+'<input type="radio" name="radio" value="'+op+'"><span class="checkmark"></span></label>');
}

$('.append-option').html(htm);
$('#ans_val').val(data.answer_value);


$('.options-val').change(function() {
      //alert($(this).val());
      var value3=$(this).val();
      if(value3!=data.answer_value){

          $(this).parent().find('.checkmark').css('background','red');
      }else{

          $(this).parent().find('.checkmark').css('background','green');
                          $('#getModal').modal('hide');

      }


      });



             


                $('#getModal').modal('show');
              //  $('#getModal').modal('show');
            }
            else if(out.status == 0){
                //alert(out.data);
            }
            else{
                window.location.href = base_url;
            }
        }
    });
                        }


// interactive question//


    if(val) parent.html(htm);
                else parent.html('');
                parent.addClass('empty');
               // parent.addClass('dim_bg');
                

            }


            if(e.altKey && e.keyCode == 85){
              
              $(this).parent().toggleClass('line');
            }

             if(e.altKey&&e.keyCode == 87){
              
              $(this).toggleClass('u_line');
            }

            
           if(e.altKey && e.keyCode == 68){
            if($(this).parent().hasClass('d_line')){

                $(this).parent().removeClass('d_line'); 
            }else{
                 $(this).parent().addClass('d_line');
            }
              // $(this).parent().css('border-bottom-width','6px'); 
              // $(this).parent().css('border-bottom-style','double'); 
              // $(this).parent().css('border-bottom-color','#092035a6');
            
            }


            if(e.altKey && e.keyCode == 66){
                // var val = $.trim($(this).val());
                var parent = $(this).parent();
                //console.log($(this).parent().addClass('total'));
                $(this).css('background','none');

               if($(this).parent().hasClass('bg_blue')) {
                 $(".change_bg_red").trigger("click");
                 return false;
                 }else if($(this).parent().hasClass('bg_red')){
                   $(".change_bg_black").trigger("click");
                   return false; 
                 }
                 else if($(this).parent().hasClass('bg_black')){
                   $(".change_bg_none").trigger("click");
                   return false; 
                 }else{
                    $(".change_bg_blue").trigger("click");
                   return false; 
                 }
                // if(val) parent.html('<li class="disc" draggable="true" style="">'+val+'</li>');
                // else parent.html('');
                // parent.addClass('empty');

             }
            //else{
            //     $(this).css('background','#a4c89c');
            // }
       var container=$(this);




            $('.itemconnect').sortable().bind('dragend', function (e) {
                //console.log(Math.random());
                refresh_result();
            });
        })


// $(document).mouseup(function(e) 
// {
//    var container = $("#input-field");
//     var container2 = $(".row_data tr>td.empty");
//     var container3 = $(".backgnd-color");

//     // if the target of the click isn't the container nor a descendant of the container
//     if (!container2.is(e.target) && container2.has(e.target).length === 0) 
//     {
//         if (!container3.is(e.target)) {  
//             container.css('background','#a4c89c');
//         }
      
//     }
// });


            
            $('.help_txt ').click(function(){


                    // $('.help-text').toggle();;
                     var html=$('.help-text').html();
                     $('#getModal-help').modal('show');
                     $('.help-content').html(html);
                     

                   

                });

             $('.view_tray ').click(function(){
                     // $(".trans_tray .d-none").each(function(){
                     //            $(this).removeClass('d-none');
                     //            return false;;
                     //        });
                   

                   var e = jQuery.Event("keydown");
                      e.keyCode = 84; // m code value
                      e.altKey = true; // Alt key pressed

                   
                      $(".view_tray").trigger(e);


                });

               $('.single_line ').click(function(){
                //alert('ggg');
                    
                     $('#input-field').parent().toggleClass('line');
                   

                });
                 $('.double_line ').click(function(){
                    
                    
                     if($('#input-field').parent().hasClass('d_line')){

                        $('#input-field').parent().removeClass('d_line'); 
                    }else{
                         $('#input-field').parent().addClass('d_line');
                    }
                   

                });

                 $('.text_line ').click(function(){
                    
                     $('#input-field').toggleClass('u_line');
                   

                });


                 
                $('.shift_left').click(function(){


                   if ($(this).hasClass('disabled')){
                     return false;
                  }

                 
                     var e = jQuery.Event("keydown");
                      e.keyCode = 37; // m code value
                   
                      $(this).trigger(e);
                      var id=parseInt($(this).parent().next().attr('data-id'))-1;
                      // if(id>0){
                      //   $(this).parent().after('<li data-id="'+id+'"><a href="#" data-id="'+id+'" class="pag_link">'+id+'</a></li>');
                      //   var first=$(".pag_link").last();
                      // first.parent().remove();
                        
                      // }
                   
                });

                $('.q_link ').click(function(){

                    var id=parseInt($(this).attr('data-id'));
                    if(id==1){
                      $('.q_link').parent().removeClass('active');
                      $(this).parent().addClass('active');
                      $('.q_link').removeClass('active');
                      $(this).addClass('active');



                       if($('#question-area').hasClass('full_q')){
                   
                           $(".quest_table").each(function(){

                              var single_wid=$(this).attr('data-width');
                            if(single_wid!=0){
                              $(this).css('width',single_wid+'%');
                            }else{
                              $(this).css('width','100%');
                            }
                            $(this).css('float','none');
                              //$(this).css('display','none');
                              //$(this).removeClass('active1').hide();
                          });
                           var act = $(".table-box.active").first();
                            $(act).css('display','block');
                            $(act).css('float','none');
                        }


                    }else{
                      $('.q_link').parent().removeClass('active');
                      $(this).parent().addClass('active');
                      $('.q_link').removeClass('active');
                      $(this).addClass('active');


                         if($('.quest_table ').length>1){

                           $(".quest_table").css('display','none');
               


                var act = $(".table-box.active").first();
                  var id = parseInt(act.attr('data-id'))+1;
                var single_wid = $(act).attr('data-width');
                if(single_wid!=0){
                single_wid=single_wid-20;
              }


                   $(".quest_table").removeClass('active');

                var tab1 = '#qt-div'+id;
                var single_wid2 = $(tab1).attr('data-width');

                if(single_wid2!=0){

                                single_wid2=single_wid2-20;
                              }


                $(act).css('display','block');
                $(tab1).css('display','block');
                $(act).addClass('active');
                $(tab1).addClass('active1');
          $(act).css('float','left');
                    $(tab1).css('float','right');

console.log(single_wid);
console.log(single_wid2);


                if(single_wid!=0 && single_wid2!=0){
                    var single_wid1=single_wid-2;
                    var single_width2=single_wid2-2;
                  $(act).css('width',single_wid1+'%');
                  $(tab1).css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){

                  var wid=100-single_wid2;
                   single_wid2=single_wid2-2;
                  $(act).css('width',wid+'%');
                  $(tab1).css('width',single_wid2+'%');


                }
                 else if(single_wid!=0 && single_wid2==0){
                  var wid=100-single_wid;
                     single_wid=single_wid-2;

                  $(act).css('width',single_wid+'%');
                   $(tab1).css('width',wid+'%');


                }
                else{
                  $('.quest_table ').css("width","48%");
                }


            // $('.quest_table ').css("width","48%");
            }else{
              

            }


                    }



                  });
                // $('.q_link'){

                // }


                $('.pag_link ').click(function(){
//modify//
                  if ($(this).hasClass('disabled')){
                     return false;
                  }

                 
                    var id=parseInt($(this).attr('data-id'));

                    $('.pag_link').parent().removeClass('active');
                      $(this).parent().addClass('active');
                      $('.pag_link').removeClass('active');
                      $(this).addClass('active');
                    if(id==1){
                     // alert("kkll");


                     

                        if($('#answer-area').hasClass('full')){

                          $('#answer-area').removeClass('col-md-12');
                          $('#answer-area').addClass(' offset-md-2 col-md-8');

                          
                           var act = $(".table-box.active1");
                          var id_act = parseInt(act.attr('data-id'));


                          // $(".quest_table").each(function(){
                          //      $(this).css('width','100%');
                          //  });


                             $(".ans_tab").each(function(){

                                            if($(this).hasClass('active1')){
                                                
                                              $(this).show();
                                            }else{
                                               // $(this).removeClass('active2').hide(); 
                                               //  $(this).removeClass('active').hide();
                                            }

                                               
                                                var single_wid=$(this).attr('data-width');
                            if(single_wid!=0){
                              $(this).css('width',single_wid+'%');
                            }else{
                              $(this).css('width','100%');
                            } 
                                                
                                               // $(this).css('width','100%');
                                                 $(this).css('float','left');
                    // $(this).css('float','left');
                    
                              });

                        }

                      
                    }else{


                      if($('#answer-area').hasClass('full')){

                           $('#answer-area').addClass('col-md-12');
                          $('#answer-area').removeClass(' offset-md-2 col-md-8');
                         //  var act = $(".table-box.active1");
                          //var id_act = parseInt(act.attr('data-id'));
                          // $(".quest_table").each(function(){
                          //      $(this).css('width','100%');
                          //  });

                            var act = $(".ans_tab.active1");
                            var id = parseInt(act.attr('data-id'))+1;

                            var tab1 = '#table'+id;


                         //   var act1 = $(".ans_tab.active2");
                     //console.log(act);

                    // if(act1.length != 0) {
                       if($(tab1).html()){


                        var single_wid = act.attr('data-width');
                            var single_wid2 = $(tab1).attr('data-width');
                     
                            //$(act).css("display","none");
                         $(tab1).css("width","42%");
                         $(tab1).addClass('active2');
                         $(tab1).css("display","block");
                         $(tab1).css("float","right");
                         

                          
                          //$('#table1').addClass('active1');
                          act.css("width","42%");
                          act.css("display","block");
                         
                          $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');
                    }
                    else{

                      $('#table1').addClass('active2');
                          $('#table1').css("width","48%");
                          $('#table1').css("display","block");
                          $('#table1').css("float","right");

                           act.css("width","48%");
                          act.css("display","block");

                    }



                        }




                    }


                // var act = $(".tab.active");
                // // var last = parseInt($('#tab-last').val());
                // var id_act = parseInt(act.attr('data-id'));


                // if(id>id_act){
                   
                // var e = jQuery.Event("keydown");
                //       e.keyCode = 39; // m code value
                   
                //       $(this).trigger(e);

                // }else{

                  
                //   // $( ".shift_left" ).trigger( "click" );
                //   var e = jQuery.Event("keydown");
                //       e.keyCode = 37; // m code value
                   
                //       $(this).trigger(e);
                // }
                

                });

                

                $('.shift_right_pr ').click(function(){

                  if ($(this).hasClass('disabled')){
                     return false;
                  }



                                             if($('.problme-tab').hasClass('active1')){

                                if($('.problme-tab').hasClass('active2')){


                                        var act1 = $(".problme-tab.active1");
                                        var act2 = $(".problme-tab.active2");

                                        console.log(act1);
                                     console.log(act2);
                                    var id1 = parseInt(act1.attr('data-id'))+1;
                                    var id2 = parseInt(act2.attr('data-id'))+1;
                                    console.log(id1);
                                     console.log(id2);
                                    var tab1 = '#table_img'+id1;
                                    var tab2 = '#table_img'+id2;

                                    var tabft1 = '#table-ft'+id1;
                                    var tabft2 = '#table-ft'+id2;

                                    console.log(tab1);
                                     console.log(tab2);


                                     if($(tab1).html()){
                                        act1.removeClass('active').hide();
                                        act1.removeClass('active1').hide();
                                        $(tab1).addClass('active').show();
                                        $(tab1).addClass('active1').show();
                                         $(tab1).css("width","48%");
                                        $(tab1).css("display","block");
                                       $(tabft1).css("display","block");

                                        $(tab1).css("float","left");
                                    }
                                    else{
                                        act1.removeClass('active');
                                        act1.removeClass('active2');
                                        act1.removeClass('active1').hide();
                                        $('#table_img0').addClass('active').show();
                                        $('#table_img0').addClass('active1').show();
                                        $('#table_img0').css("width","48%");
                                        $('#table_img0').css("display","block");
                                        $('#table_img0').css("float","left");
                                    }

                                     if($(tab2).html()){
                                        // act2.removeClass('active').hide();
                                        
                                        act2.removeClass('active2');
                                        $(tab2).addClass('active').show();
                                        $(tab2).addClass('active2').show();
                                        $(tab2).css("width","48%");
                                        $(tab2).css("display","block");
                                         $(tab2).css("float","right");
                                        $(tabft2).css("display","block");

                                    }
                                    else{
                                       //act2.removeClass('active').hide();
                                      act2.removeClass('active2');
                                        // act2.removeClass('active2');
                                        $('#table_img0').addClass('active').show();
                                        $('#table_img0').addClass('active2').show();
                                        $('#table_img0').css("width","48%");
                                        $('#table_img0').css("display","block");
                                        $('#table_img0').css("float","right");
                                    }


                                }
                                else{

                                  //alert("fgfgg");
                                            var act = $(".problme-tab.active1");
                                              var id = parseInt(act.attr('data-id'))+1;
                                              var tab = '#table_img'+id;
                                             
                                              if($(tab).html()){
                                                  act.removeClass('active1').hide();
                                                  $(tab).addClass('active1').show();
                                              }
                                              else{
                                                  act.removeClass('active1').hide();
                                                  $('#table_img0').addClass('active1').show();
                                              }

                                }



                 

                             }

                 });



                 $('.shift_right ').click(function(){

                  if ($(this).hasClass('disabled')){
                     return false;
                  }
                  
                     
                      var e = jQuery.Event("keydown");
                      e.keyCode = 39; // m code value

                   
                      $(this).trigger(e);
                      
                      var id=parseInt($(this).parent().prev().attr('data-id'))+1;
                      

                     // $(this).parent().before('<li data-id="'+id+'"><a href="#" data-id="'+id+'" class="pag_link">'+id+'</a></li>');
                      // var first=$(".pag_link").first();
                      // first.parent().remove();



                 })

                  $('.q_left ').click(function(){
                     
                      var e = jQuery.Event("keydown");
                      e.keyCode = 37; // m code value
                       e.altKey = true; // Alt key pressed
                   
                      $(this).trigger(e);


                 })

                   $('.q_right ').click(function(){
                     
                      var e = jQuery.Event("keydown");
                      e.keyCode = 39; // m code value
                       e.altKey = true; // Alt key pressed
                   
                      $(this).trigger(e);


                 })

                      $('.show_answer_keys ').click(function(){
                     
                      var e = jQuery.Event("keydown");
                      e.keyCode = 72; // m code value
                       e.altKey = true; // Alt key pressed
                   
                      $(this).trigger(e);


                 })

                 




        $(document).keydown(function (e) {
            // 17 for ctrl
// 78 for n
            // 82 for r
            // 67 for c
            // 
            // 70 for f
            // 81 for q
            // 65 for a
            
            // 83 for s -> screen refresh

            //if (e.keyCode == 78 && e.ctrlKey) {
            if (e.altKey && e.keyCode == 78) {
                $(".add_new_row").trigger("click");
                return false;
            }

            if (e.altKey && e.keyCode == 70) {
                $(".show_full").trigger("click");
                return false;
            }
            if (e.altKey && e.keyCode == 81) {
                $(".show_question").trigger("click");
                return false;
            }
            if (e.altKey && e.keyCode == 83) {
                $(".refresh_screen").trigger("click");
                return false;
            }
            if (e.altKey && e.keyCode == 65) {
                $(".show_answer").trigger("click");
                return false;
            }
            // g

            if (e.altKey && e.keyCode == 71) {


                //space key
                $(".show_image").trigger("click");
                return false;
            }
            // i
            if (e.altKey && e.keyCode == 73) {
                //space key
                $(".show_image_answer").trigger("click");
                return false;
            }

// p
            if (e.altKey && e.keyCode == 80) {

                //space key
                $(".show_help_image").trigger("click");
                return false;
            }

            if (e.altKey && e.keyCode == 67) {
                $(".refresh_result").trigger("click");
                return false;
            }
            if (e.altKey && e.keyCode == 82) {
                $(".remove_new_row").trigger("click");
                return false;
            }
            if (e.altKey && e.keyCode == 17) {
                $(".operation").show();
                //return false;
            }
            if (e.ctrlKey && e.keyCode == 32) {
                //space key
                $(".theme").toggle();
            }
            if (e.altKey && e.keyCode == 72) {
                //space key
                $(".trans_tray .d-none").each(function(){
                    $(this).removeClass('d-none');
                    return false;;
                });
            }









            //alert('ctrl  Val '+e.keyCode);
            if(e.keyCode == 39){


                 if($('#answer-area').hasClass('full')){
                           if($('.ans_tab').hasClass('active1')){

                                if($('.ans_tab').hasClass('active2')){


                                        var act1 = $(".tab.active1");
                                        var act2 = $(".tab.active2");

                                        console.log(act1);
                                     console.log(act2);
                                    var id1 = parseInt(act1.attr('data-id'))+1;
                                    var id2 = parseInt(act2.attr('data-id'))+1;
                                    console.log(id1);
                                     console.log(id2);
                                    var tab1 = '#table'+id1;
                                    var tab2 = '#table'+id2;

                                    console.log(tab1);
                                     console.log(tab2);


                                     if($(tab1).html()){
                                        act1.removeClass('active').hide();
                                        act1.removeClass('active1').hide();
                                        $(tab1).addClass('active').show();
                                        $(tab1).addClass('active1').show();
                                         $(tab1).css("width","42%");
                                        $(tab1).css("display","block");
                                        $(tab1).css("float","left");
                                    }
                                    else{
                                        act1.removeClass('active');
                                        act1.removeClass('active2');
                                        act1.removeClass('active1').hide();
                                        $('#table1').addClass('active').show();
                                        $('#table1').addClass('active1').show();
                                        $('#table1').css("width","42%");
                                        $('#table1').css("display","block");
                                        $('#table1').css("float","left");
                                    }

                                     if($(tab2).html()){
                                        // act2.removeClass('active').hide();
                                        
                                        act2.removeClass('active2');
                                        $(tab2).addClass('active').show();
                                        $(tab2).addClass('active2').show();
                                        $(tab2).css("width","42%");
                                        $(tab2).css("display","block");
                                         $(tab2).css("float","right");
                                    }
                                    else{
                                       //act2.removeClass('active').hide();
                                      act2.removeClass('active2');
                                        // act2.removeClass('active2');
                                        $('#table1').addClass('active').show();
                                        $('#table1').addClass('active2').show();
                                        $('#table1').css("width","42%");
                                        $('#table1').css("display","block");
                                        $('#table1').css("float","right");
                                    }


                                }
                                else{
                                            var act = $(".tab.active1");
                                              var id = parseInt(act.attr('data-id'))+1;
                                              var tab = '#table'+id;
                                             
                                              if($(tab).html()){
                                                  act.removeClass('active1').hide();
                                                  $(tab).addClass('active1').show();
                                              }
                                              else{
                                                  act.removeClass('active1').hide();
                                                  $('#table1').addClass('active1').show();
                                              }

                                }



                 

                             }

                  }else{

                          var act = $(".tab.active");
                var id = parseInt(act.attr('data-id'))+1;
                var tab = '#table'+id;
               
                if($(tab).html()){
                    act.removeClass('active').hide();
                    $(tab).addClass('active').show();
                }
                else{
                    act.removeClass('active').hide();
                    $('#table1').addClass('active').show();
                }
                }
              
            }
            if(e.keyCode == 37){
                 if($('#answer-area').hasClass('full')){
                    if($('.ans_tab').hasClass('active1')){

                          if($('.ans_tab').hasClass('active2')){


                                    var act1 = $(".ans_tab.active1");
                                    var act2 = $(".ans_tab.active2");

                                    //$(".tab-format.active")

                                 

                                        var last = parseInt($('#tab-last').val());
                                        var id1 = parseInt(act1.attr('data-id'))-1;
                                        var id2 = parseInt(act2.attr('data-id'))-1;

                                       
                                        var tab1 = '#table'+id1;
                                        var tab2 = '#table'+id2;
                                        var tab_last = '#table'+last;
                                        var tab_nlast = '#table'+last-1;

                                                                    // alert(tab1);
                                                                    // alert(tab2);



                                            if($(tab1).html()){
                                                                   // alert("lll");

                                                act1.removeClass('active').hide();
                                                act1.removeClass('active1').hide();
                                                $(tab1).addClass('active').show();
                                                $(tab1).addClass('active1').show();
                                               $(tab1).css("float","left");
                                               $(tab1).css("display","block");

                                                $(tab1).css("width","42%");
                                            }
                                            else{
                                                act1.removeClass('active');
                                                     act1.removeClass('active2');

                                                act1.removeClass('active1').hide();
                                                $(tab_last).addClass('active').show();
                                                $(tab_last).addClass('active1').show();
                                                $(tab_last).css("float","left");
                                                $(tab_last).css("width","42%");
                                            }

                                            if($(tab2).html()){
                                              //alert("kkk");
                                                // act2.removeClass('active').hide();
                                                act2.removeClass('active2');
                                                $(tab2).addClass('active').show();
                                                $(tab2).addClass('active2').show();
                                                $(tab2).css("width","42%");
                                                $(tab2).css("display","block");
                                                 $(tab2).css("float","right");
                                            }
                                            else{
                                               // act2.removeClass('active').hide();
                                                act2.removeClass('active2');
                                                $(tab_last).addClass('active').show();
                                                $(tab_last).addClass('active2').show();
                                                $(tab_last).css("width","42%");
                                                $(tab_last).css("display","block");
                                        $(tab_last).css("float","right");

                                        //             act2.removeClass('active2');
                                        // // act2.removeClass('active2');
                                        // $('#table1').addClass('active').show();
                                        // $('#table1').addClass('active2').show();
                                        // $('#table1').css("width","48%");
                                        // $('#table1').css("display","block");
                                        // $('#table1').css("float","right");
                                            }


                          }

                          else{

                                            var act = $(".tab.active1");
                                            var last = parseInt($('#tab-last').val());
                                            var id = parseInt(act.attr('data-id'))-1;
                                            var tab = '#table'+id;
                                            var tab_last = '#table'+last;
                                            var tab_nlast = '#table'+last-1;


                                            if($(tab).html() && id){
                                                act.removeClass('active1').hide();
                                                $(tab).addClass('active1').show();
                                            }
                                            else{
                                                act.removeClass('active1').hide();
                                                $(tab_last).addClass('active1').show();
                                            }


                          }


                           }
                 }else{
                            var act = $(".tab.active");
                        var last = parseInt($('#tab-last').val());
                        var id = parseInt(act.attr('data-id'))-1;
                        var tab = '#table'+id;
                        var tab_last = '#table'+last;
                        var tab_nlast = '#table'+last-1;


                        if($(tab).html() && id){
                            act.removeClass('active').hide();
                            $(tab).addClass('active').show();
                        }
                        else{
                            act.removeClass('active').hide();
                            $(tab_last).addClass('active').show();
                        }
                 }
                
            }




                if(e.shiftKey && e.keyCode == 39){
                   // alert("kkkkl");
                var act = $(".transations.active");
                var id = parseInt(act.attr('data-id'))+1;
 //alert(id);
                var tab = '#transations_id'+id;
                if($(tab).html()){
                    act.removeClass('active').hide();
                    $(tab).addClass('active').show();
                }
                else{
                    act.removeClass('active').hide();
                     act.addClass('active').show();
                }
            }


            if(e.shiftKey && e.keyCode == 37){
                var act = $(".transations.active");
                 //console.log(act.html());
                var last = parseInt($('#trans-tab-last').val());
                var id = parseInt(act.attr('data-id'))-1;

                var tab1 = '#transations_id'+id;

                var tab_last = '#transations_id'+last;
                var tab_nlast = '#transations_id'+last-1;
// alert(id);
// console.log(tab1);

                if(($(tab1).html())){
                    
                    act.removeClass('active').hide();
                    $(tab1).addClass('active').show();
                }
                else{
                    act.removeClass('active').hide();
                    $(tab_last).addClass('active').show();
                }
            }




 //             if(e.altKey && e.keyCode == 39){
 //                 if($('#question-area ').hasClass('full_q')){
 //                          if($('.quest_table').hasClass('active1')){

 //                              var act = $(".table-box.active");
 //                              var act2 = $(".table-box.active1");

                            

 //                              var id_org=parseInt(act.attr('data-id'));
 //                              var id_org2=parseInt(act2.attr('data-id'));

 //                              var id = parseInt(act.attr('data-id'))+1;
 //                              var id2 = parseInt(act2.attr('data-id'))+1;

 //                              var tab = '#qt-div'+id;
 //                              var tab2 = '#qt-div'+id2;

 //                                                                        // alert(tab);
 //                                                                        // alert(tab2);


                    
 //                                    if($(tab).html()){
 //                                        if(id_org!=($(tab2).attr('data-id'))){
 //                                          //alert('hhhh');
 //                                            act.removeClass('active').hide();
 //                                            act.removeClass('active1');
 //                                        }
 //                                        $(tab).addClass('active').show();
 //                                    }
 //                                    else{
 //                                          if(id_org!=($(tab2).attr('data-id'))){
 //                                             act.removeClass('active').hide();
 //                                             act.removeClass('active1');
 //                                            }
                           
 //                                         act.addClass('active').show();
 //                                      }

 //                             if($(tab2).html()){
 //                                if(id_org2!=($(tab).attr('data-id'))){
 //                                                                             //alert('mmm');

 //                                act2.removeClass('active1').hide();
 //                                 act2.removeClass('active');
 //                              }
 //                                $(tab2).addClass('active1').show();
 //                            }
 //                            else{
 //                                   if(id_org2!=($(tab).attr('data-id'))){
 //                                     act2.removeClass('active1').hide();
 //                                      act2.removeClass('active');
 //                                    }
                 
 //                                    $('#qt-div0').addClass('active1').show();
 //                                }


 //                          }else{



 //                               var act = $(".table-box.active");

 //                               console.log(id);
 //                                              var id = parseInt(act.attr('data-id'))+1;
 //                                              var tab = '#qt-div'+id;

                                             
 //                                              if($(tab).html()){
 //                                                  act.removeClass('active').hide();
 //                                                  $(tab).addClass('active').show();
 //                                                  $(tab).css("width","48%");
 //                                        $(tab).css("display","block");
 //                                        $(tab).css("float","left");
 //                                              }
 //                                              else{
 //                                                  act.removeClass('active').hide();
 //                                                  $('#qt-div0').addClass('active').show();
 //                                                     $('#qt-div0').css("width","48%");
 //                                         $('#qt-div0').css("display","block");
 //                                         $('#qt-div0').css("float","left");
 //                                          // $('#qt-div0').addClass('active').show();

 //                                              }




 //                          }



                            


 //                 }
 // //                var act = $(".table-box.active");
 // //                var id = parseInt(act.attr('data-id'))+1;
 // // //alert(id);
 // //                var tab = '#qt-div'+id;
 // //                if($(tab).html()){
 // //                    act.removeClass('active').hide();
 // //                    $(tab).addClass('active').show();
 // //                }
 // //                else{
 // //                    act.removeClass('active').hide();
 // //                    act.addClass('active').show();
 // //                }
 //            }




           if(e.altKey && e.keyCode == 39){
                 if($('#question-area ').hasClass('full_q')){
                          if($('.quest_table').hasClass('active1')){

                              var act = $(".table-box.active");
                              var act2 = $(".table-box.active1");

                            

                              var id_org=parseInt(act.attr('data-id'));
                              var id_org2=parseInt(act2.attr('data-id'));

                              var id = parseInt(act.attr('data-id'))+1;
                              var id2 = parseInt(act2.attr('data-id'))+1;

                              var tab = '#qt-div'+id;
                              var tab2 = '#qt-div'+id2;

                                                                        // alert(tab);
                                                                        // alert(tab2);


                    
                                    if($(tab).html()){
                                        // if(id_org!=($(tab2).attr('data-id'))){
                                          //alert('hhhh');
                                            act.removeClass('active');
                                            act.removeClass('active1');
                                            act.css("display","block");
                                        act.css("float","left");
                                        //}
                                        $(tab).addClass('active').show();

                                    }
                                    else{
                                         //  if(id_org!=($(tab2).attr('data-id'))){
                                              act.removeClass('active');
                                              act.removeClass('active1');
                                         //    }

                                          $('#qt-div0').addClass('active').show();
                                     $('#qt-div0').css("display","block");
                                        $('#qt-div0').css("float","left");
                           
                                         // act.addClass('active').show();

                                      }

                             if($(tab2).html()){
                                // if(id_org2!=($(tab).attr('data-id'))){
                                                                             //alert('mmm');

                                act2.removeClass('active1');
                                 act2.removeClass('active');
                                  act.css("display","block");
                                        act.css("float","right");
                              //}
                                $(tab2).addClass('active1').show();
                            }
                            else{
                                   // if(id_org2!=($(tab).attr('data-id'))){
                                   //   act2.removeClass('active1').hide();
                                       act2.removeClass('active1');
                                              act2.removeClass('active');

                                   //  }
                 
                                    $('#qt-div0').addClass('active1').show();
                                     $('#qt-div0').css("display","block");
                                        $('#qt-div0').css("float","right");
                                }


                          }else{



                               var act = $(".table-box.active");

                               console.log(id);
                                              var id = parseInt(act.attr('data-id'))+1;
                                              var tab = '#qt-div'+id;

                                             
                                              if($(tab).html()){
                                                  act.removeClass('active').hide();
                                                  $(tab).addClass('active').show();
                                                  $(tab).css("width","48%");
                                        $(tab).css("display","block");
                                        $(tab).css("float","left");
                                              }
                                              else{
                                                  act.removeClass('active').hide();
                                                  $('#qt-div0').addClass('active').show();
                                                     $('#qt-div0').css("width","48%");
                                         $('#qt-div0').css("display","block");
                                         $('#qt-div0').css("float","left");
                                          // $('#qt-div0').addClass('active').show();

                                              }




                          }



                            


                 }
 //                var act = $(".table-box.active");
 //                var id = parseInt(act.attr('data-id'))+1;
 // //alert(id);
 //                var tab = '#qt-div'+id;
 //                if($(tab).html()){
 //                    act.removeClass('active').hide();
 //                    $(tab).addClass('active').show();
 //                }
 //                else{
 //                    act.removeClass('active').hide();
 //                    act.addClass('active').show();
 //                }
            }
            if(e.altKey && e.keyCode == 37){


                 if($('#question-area ').hasClass('full_q')){

                     var act = $(".table-box.active");
                var act2 = $(".table-box.active1");


                 //console.log(act.html());
                var last = parseInt($('#qt-tab-last').val());
                var id = parseInt(act.attr('data-id'))-1;
               var id2 = parseInt(act2.attr('data-id'))-1;

                var tab1 = '#qt-div'+id;
                var tab_last = '#qt-div'+last;
                var tab_nlast = '#qt-div'+last-1;

                var tab2 = '#qt-div'+id2;

                if(($(tab1).html())){
                    if(act!=$(tab2)){

                       act.removeClass('active').hide();  
                    }
                    
                   
                    $(tab1).addClass('active').show();
                }
                else{
                  if(act!=$(tab2)){
                    act.removeClass('active').hide();
                    
                }
                $(tab_last).addClass('active').show();
                }


                  if(($(tab2).html())){
                    if(act2!=$(tab1)){
                    
                    act2.removeClass('active1').hide();
                    act2.removeClass('active');
                      }
                    $(tab2).addClass('active1').show();
                }
                else{
                    if(act2!=$(tab1)){
                       act2.removeClass('active1').hide();
                       act2.removeClass('active');
                    
                    }
                    $(tab_last).addClass('active1').show(); 
                    
                }






                 }
               //  var act = $(".table-box.active").first();
               //  var act2 = $(".table-box.active").last();


               //   //console.log(act.html());
               //  var last = parseInt($('#qt-tab-last').val());
               //  var id = parseInt(act.attr('data-id'))-1;
               // var id2 = parseInt(act2.attr('data-id'))-1;

               //  var tab1 = '#qt-div'+id;
               //  var tab_last = '#qt-div'+last;
               //  var tab_nlast = '#qt-div'+last-1;

               //  var tab2 = '#qt-div'+id2;
              
            }

            if(e.altKey && e.keyCode == 84){
              if($('.transaction-poolQ').is(":visible") && $('.transaction-pool').is(":visible")){
                $('.transaction-poolQ, .transaction-pool').toggle();
              } else if($('.transaction-pool').is(":visible")){
                $('.transaction-pool').hide();
                $('.transaction-poolQ').hide();

              }else {


                    if($.trim($('#answer-area').find('.trans_tray').html())!=''){
                      $('.transaction-pool').show();
                   //alert("hhh");
                     // $('#answer-area').find('.trans_question').css('display','block');
                     // // $('#answer-area').find('.help-text').show();
                     //  $('#answer-area').find('.transaction-pool').css('display','block');
                    }else{
                      $('.transaction-poolQ').show();
                      $('.transaction-pool').show();
                    }
                
                
              }
                
                if($('.transaction-poolQ').hasClass('hidden')){
                    $('.transaction-poolQ').removeClass('hidden');
                    $('.result_dv').height($(window).height() - 200);
                }
                else{
                    $('.transaction-poolQ').addClass('hidden');
                 $('.result_dv').height($(window).height() - 100);
                }
            }
            

// u
            // if(e.altKey && e.keyCode == 85){
            //     $(".underline_cell").trigger("click");
            //     return false;
            //  }

            if(e.altKey && e.keyCode == 88){
                $('.help-text').toggle();
            }



            if (e.shiftKey && e.keyCode == 72) {
                //space key
               $(".hide_show").trigger("click");
                return false;
            }

            if (e.shiftKey && e.keyCode == 68) {
                //space key
               $(".drag_drop").trigger("click");
                return false;
            }

        });
        $(document).keyup(function (e) {
            // 78 for n
            // 82 for r
            // 70 for f
            // 81 for q
            // 65 for a



            if (e.keyCode == 17) {
                $(".operation").hide();
                //return false;
            }






        });
//        $(document).on('dragend', '.itemconnect', function (e) {
//            console.log('Dreagging ' + Math.random());
//        });

        
        refresh_screen();
    });
    function refresh_screen() {

        //$(".transations").hide().fadeIn('fast');
   //$(".transations").load(location.href + " .transations");
        sreen_height = $(window).height();
        sreen_width = $(window).width();

//        sreen_height 
//        sreen_width 
        //alert($('#qt-div').height());
       
       /* height of transation pool scrolling
       if($('#qt-div').height()){
          $('.transations').height(sreen_height - $('.question').height() - $('#qt-div').height() - 110);
        }
        else{
         $('.transations').height(sreen_height - $('.question').height() - 100);
        } 
*/
      //$('.result_dv').height(sreen_height - 200);
    }
    function refresh_result() {

        $('#result .results_tr .result').each(function (j, valj) {
            //alert($(valj).attr('data_id'));
            //console.log('refresh result ' + Math.random());
            var sum = 0;
            $('#result tr').each(function (i, val) {
//            console.log('sum '+ Math.random());

                if (typeof $(val).find('.value_' + $(valj).attr('data_id') + ' .disc').html() != 'undefined') {
                    //console.log('sum ' + $(val).find('.disc').html());
                    sum += parseFloat($(val).find('.value_' + $(valj).attr('data_id') + ' .disc').html());
                }
            });
            $('.result_' + $(valj).attr('data_id')).html(sum);
        });
    }





    /*
     $('.itemconnect').sortable().bind('dragend', function(e) {
     var elem = e.currentTarget;
     var htm = '<tr><td class="connected itemconnect"></td><td class="connected"> </td><td class="connected"> </td></tr>'
     $(elem).parent().after(htm);
     console.log(e);
     });
     
     $('.itemconnect').sortable().bind('dragstart', function(e) {
     var elem = e.currentTarget;
     $('tr:last').remove();
     
     });
     
     */




    /*
     
     $('.itemconnect').sortable().bind('dragstart', function(e) {
     var elem = e.currentTarget;
     $('tr:last').remove();
     
     });
     */





//$('.itemconnect').sortable().bind('dragend', function (e) {
//
//
//
//            var htm = '<tr><td style="background-color:red" class="connected itemconnect">3</td><td class="connected"> </td><td class="connected"> </td></tr>'
//            $('#result > tbody:last-child').append(htm);
//
//            $(".itemconnect").unbind();
//
//
//
//            //            
////            $('.connected').sortable({
////                connectWith: '.connected'
////                
////
////            });
////            $('.connected').sortable();
//            console.log(Math.random());
//
//        });

</script>
</body>
</html>
