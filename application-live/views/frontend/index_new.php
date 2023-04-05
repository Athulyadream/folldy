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

  /*  .border_sum_tot{
        border: 1px solid #17a2b8 !important;
    }  */



</style>

<!-- max-height: 635px;
    overflow-y: scroll; -->

<div class="container-fluid" style="padding:0 !important;">
<div class="row no-gutters">
    <div class="col-12">
            <div class="left-block">
            <div class="left-controls">
                <div class="qtype-control">
                    <h4>Teaching Method</h4>
                    <ul>
                        <li class="show_mode"><a href="#" class="drag_drop">Drag & Drop</a></li>
                        <li class="hide_show show_mode"><a href="#">Hide & Show</a></li>
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

 if(!empty($tab_q['qt'])){
            // foreach ($tab_q['qt']  as  $tab_qt) {
$last_qt=$key_tb;


       // }

           

        ?>


<!-- <?php if($key_tb==0||$key_tb==1){ echo 'class ="table-box quest_table active"'; }else{ echo 'class="table-box quest_table " style="display:none;"'; } ?> -->
           <div id="qt-div<?=$key_tb?>" data-id="<?=$key_tb?>"  data-width="<?=$tab_q['qt']['qt_width'];?>"  class="table-box quest_table active"  style="margin-bottom:20px;<?php if($tab_q['qt']['qt_width']!=0){?>width:<?=$tab_q['qt']['qt_width'];?>% <?php } else{?>width:100%<?php }?>">

            <p class="qt_name_div" style="font-size: 14px;
    text-align: center;
    margin: 3px;
    "><?=$tab_q['qt_name'];?></p>




                <table class="">
                    <tr class="table-header">

                        <?php

                            $cols = $tab_q['qt']['qt_num_cols'];

                            $cols_name = array();

                            $cols_width = array();
                            $amount_array=array();

                            foreach($tab_q['qt_cols'] as $col){

                                array_push($cols_name,$col['col_name']);

                                array_push($cols_width,$col['col_width']);
                                 array_push($amount_array,$col['is_amount']);

                            }

                          //  echo json_encode($amount_array);exit();

                            for($i=0;$i<$cols;$i++){

                            ?>

                                <td width="<?=$cols_width[$i]?>%"><?=$cols_name[$i]?></td>

                            <?php

                            }

                        ?>

                    </tr>

                </table>

                <table class="">

                    <?php

                        $r = 0;

                        for($i=0;$i<count($tab_q['qt_vals'])/$cols;$i++){

                            ?>

                                <tr>

                                    <?php

                                        for($j=0;$j<$cols;$j++){

                                        ?>

                                            <td width="<?=$cols_width[$j]?>%" class="trans-tr" data-name="<?=$tab_q['qt_vals'][$r]['val_value']?>" data_id="<?=$r?>"> 

                                            <!-- class="connected empty itemconnect value_<?=$i.$j?>" -->
                                           <?php  if($amount_array[$j]=='1'){
                                           // echo "nc";
                                            ?>
                                            <li class="disc disc_val" draggable="true" style="text-align: right;" >

                                                    <?=$tab_q['qt_vals'][$r]['val_value']?>

                                                </li>

                                           <?php } 
                                           else{
                                            ?>
                                            <li class="disc disc_val" draggable="true" style="" >

                                                    <?=$tab_q['qt_vals'][$r]['val_value']?>

                                                </li>


                                                <p id="quest_helptext_<?=$r?>" class="d-none">

                                   <?=$tab_q['qt_vals'][$r]['val_help']?>

                                              </p>
                                           <?php }

                                            ?>

                                                

                                                <ul id="question_tr_spits_<?=$r?>" class="d-none">

                                                    <?php

                                                        $val_keys = explode(';',$tab_q['qt_vals'][$r]['val_keys']);

                                                        foreach($val_keys as $temp){

                                                        ?>

                                                            <li class="disc "><?=$temp?></li>

                                                        <?php

                                                        }

                                                    ?>

                                                </ul>

                                                 

                                            </td>

                                        <?php

                                            $r++;

                                        }

                                        $val_keys = explode(';',$tab_q['qt_vals'][$r-1]['val_keys']);

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
                                
                        ?>

                            <li>

                                <a href="#" class="trans" data_id="<?=$tr?>">

                                    <?=$data['transaction_title']?>

                                </a>

                                <ul id="question_spits_<?=$tr?>" class="d-none">

                                    <?php

                                        foreach($data['keywords'] as $temp){

                                        ?>

                                            <li class="disc d-none"><?=$temp['keyword_value']?></li>

                                        <?php

                                        }

                                    ?>

                                </ul>

                                <p id="trans_img_<?=$tr?>" class="d-none">

                                    <?=$data['transaction_image']?>

                                </p>

                                <p id="trans_helptext_<?=$tr?>" class="d-none">

                                    <?=$data['transaction_helptext']?>

                                </p>

                            </li>

                        <?php
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
                <ul class="connected list  transaction-poolQ trans_question" style="width:100%;border: none">
                     
                 </ul>

                <div class="help-text" style="display: none;">

                    <p></p>

                </div>



                <div class="transaction-pool" style="display:flex;margin-bottom:30px;min-height: 47px;">

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



                            $tab2 = 'tableans_sub'.$k;

                        $table_sub = $$tab2;
                         $last3 = $k;

                        if(!empty($table)){

                            $last = $k;
             // print_r($table_width);


                            if($question['table_img'.$k]){

                ?>
               
 
      <div id="<?=$tabimg?>" data-id="<?=$k?>" style="display: none;text-align: center;" class="ans_tab" >

          <div style="" class="answer_img photo-thumb<?=$k?>">
            
  <!--    <a href="<?php echo base_url().'uploads/'.$question['table_img'.$k];  ?>" title=""><img id="ans_img" src="<?php echo base_url().'uploads/'.$question['table_img'.$k];  ?>"    title="" style="height:300px;width:300px;"></a> -->
       <img id="ans_img" src="<?php echo base_url().'uploads/'.$question['table_img'.$k];  ?>"    title="" style="">
 </div>
      
  </div>
<?php }?>





<?php  $single_width = $table['table_single_width'];?>


                <div id="<?=$tab?>" data-id="<?=$k?>" data-width="<?=$single_width;?>"   <?php if($k==1){ echo 'class ="tab active ans_tab"';
 }else{ echo 'class="tab ans_tab" style="display:none;"'; } ?>>

                      
                    <!-- <tr style="display: none">
                               
                            </tr> -->

                    <p class="text-center answer-table-header" style="margin-bottom:0;min-height: 40px;">
                                                <span style="font-size:14px;"><?=$table['table_name']?></span>

                        <span style="float:left"><?=$table['table_left_title']?></span>
                        <span style="float:right"><?=$table['table_right_title']?></span>
                    </p>
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

                                              

                                                 if($table_width[$sub]['column_id']==$i+1){

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

                                                 if($table_width[$sub]['column_id']==$i+1){
                                                    if($table_width[$sub]['is_sum']==1){
                                                 

                                                   ?>                                                           <td width="<?=$table_width[$sub]['width'];?>%" class="sub_table connected text-right">
                                                        
                                                           </td> 
                                                         <?php
                                                 }else{
                                                    ?>
                                                   
                                                     <td width="<?=$table_width[$sub]['width'];?>%" class="sub_table connected ">
                                                        <?php
                                                 }

                                          }          

                                               
                                                        
                                                          
                                                        
                                                               
                                                        
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
                                            $cols_answer = array($tableans[$m]['column_one_value'],$tableans[$m]['column_two_value'],$tableans[$m]['column_three_value'],$tableans[$m]['column_four_value'],$tableans[$m]['column_five_value'],$tableans[$m]['column_six_value'],$tableans[$m]['column_seven_value'],$tableans[$m]['column_eight_value'],$tableans[$m]['column_nine_value'],$tableans[$m]['column_ten_value']);
                                           // print_r($cols_answer);
                                           $cols_underline = array($tableans[$m]['column_one_underline'],$tableans[$m]['column_two_underline'],$tableans[$m]['column_three_underline'],$tableans[$m]['column_four_underline'],$tableans[$m]['column_five_underline'],$tableans[$m]['column_six_underline'],$tableans[$m]['column_seven_underline'],$tableans[$m]['column_eight_underline'],$tableans[$m]['column_nine_underline']);

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
                                             
                                                   
                                            if($cols_sum[$i]){


                                                          if($cols_count[$i]!=0){

                                                            $class="itemconnect  itemconnect value_".$i." text-right ".$cls;
                                                           }else{
                                                            $class="itemconnect empty_fixed itemconnect value_".$i." text-right ".$cls;
                                                           }

                                                ?>
                                                            <td width="<?=$cols_width[$i]?>%"  data-id="<?php echo $m ;?>" class="<?=$class;?>"  style="height: 29px;border-bottom-width: <?php echo $style ;?>;border-bottom-style: solid;border-bottom-color: black;" >
                                                         


                                                        <?php  
                                                        if($cols_count[$i]!=0){



                                            

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

                                                                   

                                                                     if($table_sub[$sub1]['column_id']==$i+1){
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
                                                     
                                                    <td width="<?=$table_width[$sub]['width'];?>%" class="sub_table connected">
                                                        <?php
                                                                          // if($cols_answer[$i]){
                                                                    
                                                                    $ids1=array(); 
                                                                 
                                                                   
                                                          for ($sub1=0; $sub1 <$cols_sub_ans ; $sub1++) { 


                                                        // $cols_sub_width = array($table_sub[$sub]['table_width1'],$table_width[$sub]['table_width2'],$table_width[$sub]['table_width3'],$table_width[$sub]['table_width4'],$table_width[$sub]['table_width5'],$table_width[$sub]['table_width6'],$table_width[$sub]['table_width7'],$table_width[$sub]['table_width8'],$table_width[$sub]['table_width9']);
       
                                                                   

                                                                     if($table_sub[$sub1]['column_id']==$i+1){
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

                                                                        
                                                                            ?>  <li class="disc1 <?=$class;?>" style="display: none;border: none;"><?=$table_sub[$sub1]['ans_values']?></li>


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
                                             }
                                                               

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
                                                            $class="itemconnect  itemconnect value_".$i." ".$cls;
                                                           }else{
                                                            $class="itemconnect empty_fixed itemconnect value_".$i." ".$cls;
                                                           }
                                                    ?>
                                                        <td width="<?=$cols_width[$i]?>%" data-id="<?php echo $m ;?>" class="<?=$class;?>" style="height: 29px;border-bottom-width: <?php echo $style ;?>;border-bottom-style: solid;border-bottom-color: black;">


                                                                     <?php 
                                                                     
                                                        if($cols_count[$i]!=0){

                                                          $width=100/$cols_count[$i];
                                                                ?>


                                                                 <table>
                                                                    <tr>
                                                                        <?php  
                                                                   $id1_new=0;
                                                                // print_r($table_sub) ;     
   
                                                         for ($sub=0; $sub <sizeof($table_width) ; $sub++) {
                                                        

                                                                     
                                                                            // print_r($table_sub[0]['ans_values']);

                                                                            // $cols_sub_width = array($table_width[$sub]['table_width1'],$table_width[$sub]['table_width2'],$table_width[$sub]['table_width3'],$table_width[$sub]['table_width4'],$table_width[$sub]['table_width5'],$table_width[$sub]['table_width6'],$table_width[$sub]['table_width7'],$table_width[$sub]['table_width8'],$table_width[$sub]['table_width9']);
                                                                            
                                                                            if($table_width[$sub]['column_id']==$i+1){

                                                                                if($table_width[$sub]['is_sum']==1){
                                                             

                                                               ?>
                                                                
                                                                       <td width="<?=$table_width[$sub]['width'];?>%" class="sub_table_fixed connected text-right ">


                                       <?php
                                                                  // if($cols_answer[$i]){
                                                                    
                                                                    $ids1=array(); 
                                                                 //print_r($table_sub);
   
                                                                  
                                                          for ($sub1=0; $sub1 <$cols_sub_ans ; $sub1++) { 

                                                        // $cols_sub_width = array($table_sub[$sub]['table_width1'],$table_width[$sub]['table_width2'],$table_width[$sub]['table_width3'],$table_width[$sub]['table_width4'],$table_width[$sub]['table_width5'],$table_width[$sub]['table_width6'],$table_width[$sub]['table_width7'],$table_width[$sub]['table_width8'],$table_width[$sub]['table_width9']);

                                                            
      
 
                                                                     if($table_sub[$sub1]['column_id']==$i+1){
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
                                                                              
                                                                              

                                                                        
                                                                            ?>  <li class="disc1 <?=$class;?>" style="display: none;border: none;"><?=$table_sub[$sub1]['ans_values']?></li>


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
                                                              
                                                                <td width="<?=$table_width[$sub]['width'];?>%" class="sub_table_fixed connected">
                                                                     <?php
                                                                          // if($cols_answer[$i]){
                                                                    
                                                                    $ids1=array(); 
                                                                     // print_r($table_sub); 
                                                                   // print_r($table_sub);

                                                          for ($sub1=0; $sub1 <$cols_sub_ans ; $sub1++) { 
 //print_r($table_sub[$sub1]); 

                                                        // $cols_sub_width = array($table_sub[$sub]['table_width1'],$table_width[$sub]['table_width2'],$table_width[$sub]['table_width3'],$table_width[$sub]['table_width4'],$table_width[$sub]['table_width5'],$table_width[$sub]['table_width6'],$table_width[$sub]['table_width7'],$table_width[$sub]['table_width8'],$table_width[$sub]['table_width9']);
       
                                                                   
                                                                     if($table_sub[$sub1]['column_id']==$i+1){
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
                                                                           
                                                                        
                                                                            ?>  <li class="disc1 <?=$class;?>" style="display: none;border: none;"><?=$table_sub[$sub1]['ans_values']?></li>


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
                                                         }
                                                                           
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

                                               //  print_r($i);

                                                 if($table_width[$sub]['column_id']==$i+1){
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

                </div>



                <?php

                        }

                    }

                ?>

                <input type="hidden" id="tab-last" value="<?=$last?>">

            </div>

            </div><!-- /.answer area -->

        </div>
         </div><!-- /.row -->

         <div class="img_hidden" style="display: none;min-height: 100vh;padding-bottom: 80px;overflow-y: auto;
    max-height: 90vh;"></div>

         <div class="col-12 bottom-controls">
                <a href="#" class="buttons float-left show_image_answer">Problem Format</a>
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







<?php $this->load->view('frontend/template/footer.php'); ?>

<script>
    $('.question-area .table-box table tr td').click(function(){
        $(this).addClass('cellselect');

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