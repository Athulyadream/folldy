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



.draw_tools{
        width: 30px !important;
    height: 26px !important;
    line-height: 24px !important;
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
            <div class="left-block" style="">
            <div class="left-controls">
                <div class="qtype-control">
                    <h4>Teaching Method</h4>
                    <ul>
                        <li class="show_mode"><a href="#" class="drag_drop">Drag & Drop</a></li>
                        <li class="hide_show show_mode"><a href="#">Hide & Show</a></li>
                         <li class=" show_interactive"><a href="#">Interactive</a><input type="hidden" name="interid" id="inter-stat" value="0"></li>
                    </ul>
                </div><!-- /.qtype-control -->

                <div class="theme-color-selector">
                    <h4>Choose Theme</h4>
                    <div class="selected_color">
                        <?php if($theme_id==0){
                            $class="greenbg";
                        }else if($theme_id==1){
                            $class="bluebg";
                        }
                         else if($theme_id==2){
                            $class="pinkbg";
                        }else{
                            $class="graybggraybg";
                        }
                        ?>
                        <!-- <span class=<?=$class;?>></span>
                        <a class="colorchanger" href="#"><i class="fas fa-exchange-alt"></i></a> -->
                        <ul>
                        <li><a href="<?=base_url('change-theme')?>?theme=0" class="refresh_screen  op theme0 greenbg" ></a></li>
                        <li><a href="<?=base_url('change-theme')?>?theme=1" class="bluebg refresh_screen op theme1"></a></li>
                        <li><a href="<?=base_url('change-theme')?>?theme=2" class="op theme2 pinkbg"></a></li>
                        <li><a href="<?=base_url('change-theme')?>?theme=3" class=" op theme3 graybggraybg"></a></li>
                        </ul>
                    </div>
                    
                </div><!-- /.theme-selector -->

              <!--   <div class="answer-area-controls">
                    <a href="#" class="buttons add_new_row op"><i class="fas fa-plus"></i> New Answer Raw</a>
                    <a href="#" class="buttons view_tray"><i class="far fa-copy"></i> Transaction Tray</a>
                    <a href="#" class="buttons help_txt"><i class="fas fa-align-left"></i> Help Text</a>
                    <a href="#" class="buttons show_help_image"><i class="fas fa-image"></i> Help Image</a>
                </div> -->
                 <div class="answer-area-controls">
                    <a href="#" class="buttons add_new_row"><i class="fas fa-plus"></i> Raw</a>
                    <a href="#" class="buttons remove_new_row"><i class="fas fa-minus"></i> Raw</a>
                    <a href="#" class="buttons view_tray"><i class="far fa-copy"></i> Tray</a>
                    <a href="#" class="buttons help_txt"><i class="fas fa-align-left"></i> Help Text</a>
                    <a href="#" class="buttons show_help_image"><i class="fas fa-image"></i> Help Image</a>
                </div>

                <div class="cell-color-selector">
                    <h4>Color Cell</h4>
                    <div class="selected_color">
                       <!--  <span class="cellBg3 bgcolor_chng"></span>
                        <a class="colorchanger" href="#"><i class="fas fa-exchange-alt"></i></a> -->
                        <ul>
                        <li><a href="#" class="cellBg5 yellowbg change_bg_blue"></a></li>
                        <li><a href="#" class="cellBg2 lpinkbg change_bg_red"></a></li>
                        <li><a href="#" class="cellBg3 rosebg change_bg_black"></a></li>
<!--                         <li><a href="#" class="cellBg4 redbg change_bg_none"></a></li>
 -->                        <li><a href="#" class="cellBg4 redbg change_bg_none"></a></li>
                        </ul>
                    </div>
                </div><!-- /.theme-selector -->

                <div class="line-color-selector">
                    <h4>Underline</h4>
                    <i class="fas fa-grip-lines"></i>
                    <ul>
                        <li><a href="#" class="single_line"><i class="fas fa-minus"></i> Single line</a></li>
                        <li><a href="#" class="double_line"><img src="<?= base_url().'assets_main/assets/images/controls/double-line.svg';?>" width="12" alt=""> Double line</a></li>
                        <li><a href="#" class="text_line"><i class="fas fa-text-width"></i> Text underline</a></li>
                    </ul>
                </div>

                      <div class="line-color-selector">
                    <h4>Calculations</h4>
                    <i class="fas fa-grip-lines"></i>
                    <ul style="border: none;    width: 53%;">
                        <li><a href="#" class="minus_input" data-sum="0"><i class="fas fa-minus"></i> minus</a></li>
                        
                        <li><a href="#" class="plus_input" data-sum="0"><i class="fa fa-plus" aria-hidden="true"></i>add</a> </li>
                    </ul>
                    <ul style="border: none;width: 50%;float: left;margin-right: -12px;">
     
                      <li><a href="#" class="copy_sum"><i class="fa fa-clone" aria-hidden="true"></i> copy</a></li>
                      <li><a href="#" class="equal_result"><i class="fas fa-equals"></i> equal</a></li>                

                   </ul>
                </div>      


               






            </div>
        </div>


        <!-- 
float: right;width: 90%;float: right;padding: 0 15px 50px;z-index: 1;padding-left: 0px;

         -->
   
        <canvas id="can" width="1400" height="600" style="/* position:absolute; *//* top:10%; *//* left:10%; */display:none;"></canvas>

            <div class="right-block">
                 <div class="row" style="min-height: 100vh">


                    <div class="col-md-12" >
            <div class="row q_area" style="min-height: 100vh;padding-bottom: 80px;">

            <div class="col-md-6 col-sm-6 col-12 question-area" id="question-area">

            <div class="question-div" style="float:left;width:100%;margin:19px 0 19px 0;
          overflow-y: auto;
    max-height: 90vh;
    ">

                                <div class="question">

                                    <h1>

                                        <?=$question['question_title']?>

                                    </h1>

                                </div><!-- /.question -->



        <?php

$key_tb=0;
$last_qt=0;
        foreach($qt_table  as  $tab_q) {




         //print_r($tab_q['qt']);

 if(!empty($tab_q)){
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


           
<?php  $single_width = $table['table_single_width'];

//print_r($single_width);


?>


<!-- <?php if($key_tb==0||$key_tb==1){ echo 'class ="table-box quest_table active"'; }else{ echo 'class="table-box quest_table " style="display:none;"'; } ?> -->
           <div id="qt-div<?=$key_tb?>" data-id="<?=$key_tb?>"  data-width="<?=$tab_q['qt']['table_single_width'];?>"  class="table-box quest_table active"  style="margin-bottom:20px;<?php if($single_width!=0){?>width:<?=$tab_q['qt']['table_single_width'];?>% <?php } else{?>width:100%<?php }?>">


               <div class="question" style="min-height: 30px">

                                    <h5>

                                        <?=$tab_q['qt_text']['text_val'];?>

                                    </h5>

                                </div><!-- /.question -->

         <p class="qt_name_div" style="font-size: 14px;
    text-align: center;
    margin: 3px;
    "><?=$tab_q['quest_table_name'];?></p>

     <p class="qt_name_div" style="font-size: 14px;
    text-align: center;
    margin: 3px;
    "><?=$tab_q['header_note'];?></p>

 <?php
 if(!empty($tab_q['qt'])){
    ?>


                <table class="">
                    <tr class="table-header">

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

                    ?>

            </div> 

        <?php

            }
            //}
            $key_tb++;

          }

        ?>
<input type="hidden" id="qt-tab-last" value="<?=$last_qt?>">
            
<div id="tranaction_hidden">
            <!-- <h4>Transactions</h4> -->
            <!--  data-simplebar -->
             <?php
                        $k=0;
                        $tr=0;
                        foreach($transaction as $key_t=>$data_n){
                            if(!empty($data_n)){
                $last_trans=$key_t;
                        ?>
            <div id="transations_id<?=$key_t?>"    data-id="<?=$key_t?>" <?php if($key_t==0){ echo 'class ="transations active"'; }else{ echo 'class="transations" style="display:none;"'; } ?>  style="max-width:100%;float:left;width:100%;">

                <ul>

                    <?php

                        foreach($data_n['trans'] as $key=>$data){
                                
                  if($data['trans_type']=='sentnce'){
                                
                        ?>

                            <li>

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

                                <span><a href="#" class="trans" data_id="<?=$tr?>" style="color: black">

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

                                </span>.</span>



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

        </div> <!-- /.question area-->

        <div class="col-md-6 col-sm-6 col-12 " id="answer-area" style="    overflow-y: auto;
    max-height: 86vh;">

            



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




          <div id="<?=$tabimg?>" data-id="<?=$key?>" data-format="<?=$format['p_format_id']?>" data-tableid="<?=$format['table_id']?>" style="display: none;text-align: center;" <?php if($key==0){ echo 'class ="ans_tab1  problme-tab active" '; }else{ echo 'class="ans_tab1  problme-tab"'; } ?>  >

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


 <p class="text-center answer-table-header" style="margin-bottom:-11px;min-height: 36px;">
                        <span style="float:left"><?=$table['table_left_title']?></span>
                        <span style="font-size:14px;"><?=$format['table_name']?></span>
                        <span style="float:right"><?=$table['table_right_title']?></span>
                    </p>


                     <div class="answer-table-box table-box card">

                    <!-- <div class="table-box"> -->
                        <table>
                            <tr class="table-header">

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
                                                      $width=$cols_width[$i]/$cols_count[$i];


                                                      }else{
                                                        $cls='';
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
                                            <td width="<?=$width?>%"  data-id="<?=$key1?>" class="   problem-tr  value_<?=$i?> text-right <?=$cls;?> <?=$cls1?> <?=$cls2?> <?=$cls23?>" data-prblem="<?=$vals['format_id']; ?>" style="border-left: 0px solid rgba(0,0,0,0.5);height: 30px;font-size: 1.2em;    padding: 3px;background: rgb(255, 235, 204);"><?=$vals['col_value']; ?></td>
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
                                                                                      $width=$cols_width[$i]/$cols_count[$i];


                                                                                      }else{
                                                                                        $cls='';
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
                                            <td width="<?=$width?>%" class="  problem-tr  value_<?=$i?> <?=$cls?> <?=$cls1?> <?=$cls2?> <?=$cls23?>" data-prblem="<?=$vals['format_id']; ?>" style="border-left: 0px solid rgba(0,0,0,0.5);height: 30px;    font-size: 1.2em;padding: 3px;background: rgb(255, 235, 204);"><?=$vals['col_value']; ?></td>
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

                    <p class="text-center answer-table-header" style="margin-bottom:-11px;min-height: 40px;">
                                                <span style="font-size:14px;"><?=$table['table_name']?></span>

                        <span style="float:left"><?=$table['table_left_title']?></span>
                        <span style="float:right"><?=$table['table_right_title']?></span>
                    </p>


                    <div style="color: white;text-align: center; font-size: 1.1em"><?=$table_header['header_note']?></div>
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

                                                                        
                                                                            ?>  <li class="disc1 <?=$class;?> " style="display: none;border: none;"><?=$table_sub[$sub1]['ans_values']?></li>


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

                                                                        
                                                                            ?>  <li class="disc1 <?=$class;?>" style="display: none;border: none;" data-id="<?=$table_sub[$sub1]['id']?>"><?=$table_sub[$sub1]['ans_values']?></li>


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
                                                                ?>  <li class="disc1" style="display: none;"><?=$cols_answer[$i]?></li>


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
                                                                              
                                                                              

                                                                        
                                                                            ?>  <li class="disc1 <?=$class;?>" style="display: none;border: none;" data-id="<?=$table_sub[$sub1]['id']?>"><?=$table_sub[$sub1]['ans_values']?></li>


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
                                                                           
                                                                        
                                                                            ?>  <li class="disc1 <?=$class;?>" style="display: none;border: none;" data-id="<?=$table_sub[$sub1]['id']?>"><?=$table_sub[$sub1]['ans_values']?></li>


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
                                                                ?>  <li class="disc1" style="display: none;"><?=$cols_answer[$i]?></li>


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



<!--                 <a href="#" class="buttons float-left show_image_answer">Problem Format</a>
 -->
                 <div class="number-controls">
                    <h4>Problem Format</h4>
                    <ul>

                        <li><a href="#" class="shift_left_pr"><i class="fas fa-caret-left"></i></a></li>

                        <!-- <li  data-id="1"><a href="#" data-id="1" class="pag_link">1</a></li> -->
                        <li class="" data-id="2"><a href="#" style="width: 49px;    color: #354052;" data-id="2" class="show_image_answer"> Format</a></li>

                         <li  data-id="1"><a href="#" data-id="1" class="pag_link_pr">1</a></li> 
                         <li  data-id="1"><a href="#" data-id="2" class="pag_link_pr">2</a></li> 

<!--                         <li data-id="3"><a href="#" data-id="3" class="pag_link">3</a></li>
 -->                        <li><a href="#" class="shift_right_pr"><i class="fas fa-caret-right"></i></a></li>
                    </ul>
                </div>



                <div class="number-controls ml-20p">
                    <h4>Question Table</h4>
                    <ul>
                        <li><a href="#" class="q_left"><i class="fas fa-caret-left"></i></a></li>
                        <li data-id="1"><a href="#" data-id="1" class="q_link">1</a></li>
                        <li class="active" data-id="2" ><a href="#" data-id="2" class="q_link">2</a></li>
<!--                         <li data-id="3"><a href="#" data-id="3" class="q_link">3</a></li>
 -->                        <li><a href="#" class="q_right"><i class="fas fa-caret-right"></i></a></li>
                    </ul>
                </div>
                <div class="preview-controls">
                    <h4>Preview Option</h4>
                    <ul>
                        <li class="preview"><a href="#" class="show_question">Q</a></li>
                        <li class="active preview"><a href="#" class="show_full">Q & A</a></li>
                        <li class="preview"><a href="#" class="show_answer">A</a></li>
                    </ul>
                </div>
                <div class="number-controls">
                    <h4>Answer Table</h4>
                    <ul>
                        <li><a href="#" class="shift_left"><i class="fas fa-caret-left"></i></a></li>
                        <li  data-id="1"><a href="#" data-id="1" class="pag_link">1</a></li>
                        <li class="active" data-id="2"><a href="#" data-id="2" class="pag_link">2</a></li>
<!--                         <li data-id="3"><a href="#" data-id="3" class="pag_link">3</a></li>
 -->                        <li><a href="#" class="shift_right"><i class="fas fa-caret-right"></i></a></li>
                    </ul>
                </div>
                <a href="#" class="buttons float-left mr-10p show_answer_keys">answer keys</a>


               

                <div class="board-color">
                    <h4>Board Color</h4>
                    <div class="selected_color">
                        <ul>
                        <li><a href="#"  class="whitebg wh_board"></a></li>
                        <li><a href="#" class="blackbg b_board"></a></li>
                        <li><a href="#" class="transparent trans_board"></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.boar-color -->
                <div class="pencil-color">
                    <h4>Pencil Color</h4>
                    <div class="selected_color">
                        <ul>
                        <li><a href="#" id="pen" data-color="white" class="whitebg pen"></a></li>
                        <li><a href="#" id="pen" data-color="red" class="redbg pen"></a></li>
                        <li><a href="#" id="pen" data-color="black" class="blackbg pen"></a></li>
                        </ul>
                    </div>
                </div>

               <a href="#" class="buttons float-left mr-10p  draw_tools" id="eraser"><i class="fas fa-eraser"></i></a>
               <a href="#" class="buttons float-left mr-10p  draw_tools" onclick="clearCanvas()" ><i class="fas fa-sync"></i>
                 <a href="#" class="buttons float-left mr-10p remove_canvas draw_tools"  id="remove_canvas">R</a>


</a>

                
               
                <!-- /.boar-color -->
                <a href="#" class="full-screen show_full_screen">Full Screen</a>
            </div>
           

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
   // $('.show_full_screen').trigger('click');
       // toggleFull();
       return false;
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