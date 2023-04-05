
    <link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.snow.css">


<style type="text/css">
  ::-webkit-scrollbar {
display: none;
}



body{
  height: 100%; */
    /* height: 100%; */
    /* overflow-y: hidden; */
    position: relative;
    overflow: auto;
    width: 100%;
}

#input-field{
  font-size: 1em !important;
}

.no-data{
  color: white;
}
  
  .tabs {
  display: flex;
  flex-wrap: wrap; // make sure it wraps
}
.tabs li {

  order: 1; // Put the labels first
  display: block;
  padding: 1rem 2rem;
  margin-right: 0.2rem;
  cursor: pointer;
  background: #104861;
  font-weight: bold;
  transition: background ease 0.2s;
  list-style: none;
}
.tabs .tab {
  order: 99; // Put the tabs last
  flex-grow: 1;
  width: 100%;
  display: none;
  padding: 1rem;
  background: #fff;
}
.tabs input[type="radio"] {
  display: none;
}
.tabs input[type="radio"]:checked + label {
  background: #fff;
}
.tabs input[type="radio"]:checked + label + .tab {
  display: block;
}
.question-area .table-header {
    height: 30px;
    font-weight: 500;
   /* background: #e9e8ce;
    color: #000;*/
    background: #104861e6;
    color: white;
}
.answer-table-box .table-header {
    font-weight: 500;
/*    background: #9fad99;
*/    background: #104861e6;
    color: white !important;
}
.row_data td{
cursor: pointer;
    border-right: 2px solid #0000006b;
    border-bottom: 2px solid #00000029;
    border-left: 2px solid #0000006b;
    }

.problem-tr{

    border-left: 2px solid #0000006b;
    }


    .table-header{
text-align: center;
      }

    .table-qst td{
cursor: pointer;
    border-right: 2px solid #00000038;
    border-bottom: 2px solid #00000038;
    }

    .left-block a{
      color: white;
      }
      .pag-div a{
        padding-left: 5px;
                padding-right: 5px;

/*        background: #2744517a;
*/                      color: white;

      }
      .pag-div li{

              background: #2744517a;

      }


           .order-list{
        display: inline-flex;
    background: palegreen !important;
    width: 65% !important;
    padding: 0px 0 0 13px !important;

    }

   /*   .order-list{
        display: inline-flex;
    background: palegreen !important;
    width: 65% !important;
    padding: 0px 0 0 13px;

    }*/


      .order-delete{
        
    width: 34% !important;
    padding: 0px 0 0 12px !important;
    background: #104861 !important;
    color: white !important;

    }
      .sub-tab-tr{
        border-bottom: none !important;
        border-right: none !important;
        border-left: none !important;
/*        border-bottom: none !important;
*/

/*              background: #2744517a;
*/
      }

      .active-main-tab{
background: #03a9f4cc !important;
}



      .line{
      border-bottom-width: 2px !important;
    border-bottom-style: solid !important;
    border-bottom-color: #000000a6;
    }

    .td-line{
      border-bottom: 2px solid #0000004d !important;
    }

    .underline{
       border-bottom: 2px solid #00000082!important;
    }

    .p-line{
     border-bottom: 3px solid #607D8B !important;
    }

    .td-d-line {
    border-bottom-width: 6px !important;
    border-bottom-style: double !important;
    border-bottom-color: #092035a6 !important;
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

   .d-line {
    border-bottom-width: 6px !important;
    border-bottom-style: double !important;
    border-bottom-color: #092035a6 !important;
}



      .left-block .buttons {
    width: 100%;
    height: 25px;
    float: left;
    margin: 0 0 8px;
    padding: 0 0 0 22px;
    line-height: 24px;
    position: relative;
    color: #354052;
    font-size: 10.5px;
    background: #00bcd466;
}


.u-line{
/*            white-space: pre;
*/    text-decoration: underline;
    text-underline-position: under;
}

.p-u-line{
/*            white-space: pre;
*/    text-decoration: underline;
    text-underline-position: under;
}

.t-underline{
/*            white-space: pre;
*/    text-decoration: underline;
    text-underline-position: under;
}


@media (max-width: 45em) {
  .tabs .tab,
  .tabs label {
    order: initial;
  }
  .tabs label {
    width: 100%;
    margin-right: 0;
    margin-top: 0.2rem;
  }
}

/**
 * Generic Styling
*/

</style>



<div class="my-3 my-md-5">
  <div class="container">
    <div class="row" style="">
          <?php 
            if($this->session->flashdata('table_created') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Table Added
          </div>
          <?php
            }
            elseif($this->session->flashdata('table_created') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error unable to add table!
          </div>
          <?php
            }

            if($this->session->flashdata('table_updated') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Table Updated
          </div>
          <?php
            }
            elseif($this->session->flashdata('table_updated') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error updating table! Please contact tech support.
          </div>
          <?php } ?>


          <style type="text/css">
            
            .count_sub{
/*   // display: none;
*/
        width: 50%;
          }

          </style>


          <div class="col-lg-12 col-md-9 col-sm-8 col-12">
            <center>
            <ul class="tabs" style="margin-left: 277px;">


                            <li><a  style="color: white;" href="<?=base_url('questions_list_add/'.$questionid)?>">Question</a></li>
                                        

                            <li><a style="color: white;" href="<?=base_url('questions_list_add/'.$questionid)?>">Problem Format</a></li>

                            <li class="active-main-tab"><a style="color: white;" href="<?=base_url('answers-preview/'.$questionid)?>">Answer</a></li>


            </ul>
                                      </center>



            <div class="row" style="min-height: 62vh;
    overflow: auto;">
               <div class="col-lg-12 col-md-12 " style="min-height: 0px;">
                                            </div>

                <div class="col-md-6 col-sm-6 col-12 col-lg-6 question-area" id="question-area" style="display: inline-flex;">
                                          <input type="hidden" name="question_id" id="question_id" value="<?=$questionid;?>">



              <div class="col-lg-10 col-md-10  col-sm-10 col-12" id="" style="border: 1px solid rgba(0, 40, 100, 0.1);background: #17a2b81f;overflow-y: auto;
    max-height: 60vh;">



            <div class="question-div" style="float:left;width:100%;margin:19px 0 19px 0;
          overflow-y: auto;
    max-height: 45vh;
    ">

         <?php

$key_tb=0;
$last_qt=0;


//print_r($qt_table);
        foreach($qt_table  as  $tab_q) {




                                  $table=$tab_q['qt'];



                                    $cols = $table['table_columns'];
                                    $cols_name = array($table['column_one_name'],$table['column_two_name'],$table['column_three_name'],$table['column_four_name'],$table['column_five_name'],$table['column_six_name'],$table['column_seven_name'],$table['column_eight_name'],$table['column_nine_name'],$table['column_ten_name'],$table['column_eleven_name'],$table['column_twelve_name'],$table['column_thirteen_name'],$table['column_fourteen_name'],$table['column_fifteen_name']);

                                    $cols_width = array($table['column_one_width'],$table['column_two_width'],$table['column_three_width'],$table['column_four_width'],$table['column_five_width'],$table['column_six_width'],$table['column_seven_width'],$table['column_eight_width'],$table['column_nine_width'],$table['column_ten_width'],$table['column_eleven_width'],$table['column_twelve_width'],$table['column_thirteen_width'],$table['column_fourteen_width'],$table['column_fifteen_width']);
                                    $cols_sum = array($table['column_one_sum'],$table['column_two_sum'],$table['column_three_sum'],$table['column_four_sum'],$table['column_five_sum'],$table['column_six_sum'],$table['column_seven_sum'],$table['column_eight_sum'],$table['column_nine_sum'],$table['column_ten_sum'],$table['column_eleven_sum'],$table['column_twelve_sum'],$table['column_thirteen_sum'],$table['column_fourteen_sum'],$table['column_fifteen_sum']);
                                     $cols_count = array($table['count_one_table'],$table['count_two_table'],$table['count_three_table'],$table['count_four_table'],$table['count_five_table'],$table['count_six_table'],$table['count_seven_table'],$table['count_eight_table'],$table['count_nine_table'],$table['count_ten_table'],$table['count_eleven_table'],$table['count_twelve_table'],$table['count_thirteen_table'],$table['count_fourteen_table'],$table['count_fifteen_table']);









            ?>
            


                               


                                   <div id="qt-div<?=$key_tb?>" data-id="<?=$key_tb?>"  data-width="<?=$tab_q['qt']['table_single_width'];?>"    <?php if($key_tb==0){ echo 'class ="table-box quest_table active"'; }else{ echo 'class="table-box quest_table " style="display:none;"'; } ?> style="margin-bottom:20px;width:100%">

                               <?php    
                                $priorit_idss=$tab_q['priority_vals'];
        foreach ($priorit_idss as $key => $priorit_ids) {

          ?>

<?php if($priorit_ids==1){
  ?>
                                     <div class="question">

                                    <p>

                                        <?=$tab_q['qt_text']['text_val'];?>

                                    </p>

                                </div><!-- /.question -->

                              <?php }
                              


                               if($priorit_ids==2){
                                ?>

           

     <p class="qt_name_div" style="font-size: 14px;
    text-align: center;
    margin: 3px;
    "><?=$tab_q['quest_table_name'];?></p>

     <p class="qt_name_div" style="font-size: 14px;
    text-align: center;
    margin: 3px;
    "><?=$tab_q['header_note'];?></p>


                        <?php  if(!empty($tab_q['qt_vals'])){
                          ?>



                <table class="" style="width: 100%;">
                    <tr class="table-header">

                        <?php

                            $cols = $tab_q['qt']['table_columns'];

                          //  $cols_name = array();

                          //  $cols_width = array();
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

                <table class="table-qst" style="width: 100%;background: white">


                    <?php

                        $r = 0;
                        //print_r($tab_q);
 $count=$tab_q['rows'];
                        for($i=0;$i<=$count;$i++){
                               // print_r($tab_q['qt_vals']);

                            ?>

                                <tr>

                                    <?php

                                        for($j=0;$j<$cols;$j++){
                                         


                                                                   


                                        ?>

                                            <td width="<?=$cols_width[$j]?>%" class="trans-tr" data-name="" data_id="<?=$r?>" data-qst="" style="height: 30px"> 


                                            <!-- class="connected empty itemconnect value_<?=$i.$j?>" -->
                                           <?php  if($cols_sum[$j]=='1'){

                                                    if($cols_count[$j]!=0){
                                                         $width=$cols_width[$j]/$cols_count[$j];


                                                              ?>


                                                     <table style="width: 100%">
                                                        <tr>
                                                            <?php 

                                                         $ids=array();

                                                         

                                                       for ($sub=0; $sub <$cols_count[$j] ; $sub++) {
                                                        ?>

                                                        <td width="<?=$width?>%" class=" sub-tab-tr text-right" data-name="" data_id="<?=$r?>" data-qst="" style="height: 30px"> 

                                                         <?php 


                                                            foreach ($tab_q['qt_vals'] as $key => $value1) {
                                                    if($value1['col_no']==$j){
                                                         if($value1['row_no']==$i){
                                                           if(!in_array($value1['val_id'], $ids)){


                                                            array_push($ids,$value1['val_id']);


                                                                    if($value1['val_underline']=='1'){


                                                           $class="line";
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


     if(!empty($value1['val_value'])){

                                          $val=nl2br($value1['val_value']);
                                          $class15="";
                                        
                                        }else{
                                          // $val='No data';
                                         $class15="no-data";
                                          $val="nodata";;
                                         
                                        }



                                                        if($value1['val_text_line']=='1'){


                                                           $class3="u-line";
                                                          // $style1="display: none;border: none;border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: black;";
                                                      }else{
                                                           $class3="";
                                                            // $style1="display: none;border: none";
                                                      }
                                                        

                                           // echo "nc";
                                            ?>
                                            <li style="list-style-type: none;" data_id="<?=$r?>" data-qst="<?=$value1['val_id']?>" class="disc disc_val sub-qst-1 text-right  <?=$class1;?> <?=$class3;?>  <?=$class;?> <?=$class15;?>" draggable="true" style="text-align: right;" >
 
                                     <?php echo $val; ?>

<!--                                                       <?=$value1['val_value']?>
 -->   

                                                </li>

 
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


                                                           $class="line";
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


                                                           $class3="u-line";
                                                          // $style1="display: none;border: none;border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: black;";
                                                      }else{
                                                           $class3="";
                                                            // $style1="display: none;border: none";
                                                      }

                                           // echo "nc";
                                            ?>
                                            <li style="list-style-type: none;" data_id="<?=$r?>" data-qst="<?=$value1['val_id']?>" class="disc disc_val text-right <?=$class1;?> <?=$class3;?>  <?=$class;?>" draggable="true" style="text-align: right;" >
 
<!--                                                       <?=$value1['val_value']?>
 -->                                                      <?php echo nl2br($value1['val_value']); ?>
   

                                                </li>
 
                                           <?php } 
                                         }



                                                    }


                                                                  

                                                           }


                                               
                                         } 
                                           else{




                                                    if($cols_count[$j]!=0){
                                                      $width=$cols_width[$j]/$cols_count[$j];

                                                              ?>


                                                     <table style="width: 100%">
                                                        <tr>
                                                            <?php 

                                                       

                                                            $ids1=array(); 
                                                            $ids=array();  

                                                       for ($sub=0; $sub <$cols_count[$j] ; $sub++) {
                                                        ?>

                                                         <td width="<?=$width?>%" class="sub-tab-tr " data-name="<?=$tab_q['qt_vals'][$r]['val_value']?>" data_id="<?=$r?>" data-qst="<?=$tab_q['qt_vals'][$r]['val_id']?>" style="height: 30px"> 

                                                          <?php 
                                                             
                                                       $g=0;
                                                    foreach ($tab_q['qt_vals'] as $key => $value1) {
                                                    if($value1['col_no']==$j){
                                                         if($value1['row_no']==$i){
                                                          if(!in_array($value1['val_id'], $ids)){
                                                          // if($g==$sub){


                                                          array_push($ids,$value1['val_id']);


                               if($value1['val_underline']=='1'){


                                                           $class="line";
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


                                                           $class3="u-line";
                                                          // $style1="display: none;border: none;border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: black;";
                                                      }else{
                                                           $class3="";
                                                            // $style1="display: none;border: none";
                                                      }


                                                        

                                           // echo "nc";
                                            ?>
                                            <li style="list-style-type: none;" data_id="<?=$r?>" data-qst="<?=$value1['val_id']?>" class="disc sub-qst-1 disc_val <?=$class1;?> <?=$class3;?>  <?=$class;?>" draggable="true" style="text-align: right;" >
 
<!--                                                       <?=$value1['val_value']?>
 -->                                                      <?php echo nl2br($value1['val_value']); ?>
   

                                                </li>

 
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


                                                                foreach ($tab_q['qt_vals'] as $key => $value1) {
                                                    if($value1['col_no']==$j){
                                                         if($value1['row_no']==$i){

                                                            if($value1['val_underline']=='1'){


                                                                                     $class="line";
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


                                                                                     $class3="u-line";
                                                                                    // $style1="display: none;border: none;border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: black;";
                                                                                }else{
                                                                                     $class3="";
                                                                                      // $style1="display: none;border: none";
                                                                                }


                                                                                  if(!empty($value1['val_value'])){

                                          $val=nl2br($value1['val_value']);
                                          $class15="";
                                        
                                        }else{
                                          // $val='No data';
                                         $class15="no-data";
                                          $val="nodata";;
                                         
                                        }

                                                        

                                           // echo "nc";
                                            ?>
                                            <li style="list-style-type: none;" data_id="<?=$r?>" data-qst="<?=$value1['val_id']?>" class="disc disc_val <?=$class;?> <?=$class1;?> <?=$class3;?> <?=$class15;?>" draggable="true" style="text-align: right;" >
 
<!--                                                       <?=$value1['val_value']?>
 -->
                                                      <?php echo $val; ?>
   

                                                </li>
 
                                           <?php } 
                                         }



                                                    }


                                                                  

                                                           }
                                       
                                         }

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

                                        //$val_keys = explode(';',$tab_q['qt_vals'][$r-1]['val_keys']);

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
                       // }

                    ?>

                </table>
                <?php

                        }
                      }

                    ?>

<?php
             if($priorit_ids==3){
                ?>
                <div id="tranaction_hidden">
            <!-- <h4>Transactions</h4> -->
            <!--  data-simplebar -->
             <?php
                        $k=0;
                        $tr=0;
                        foreach($tab_q['transactions'] as $key_t=>$data_n){
                            if(!empty($data_n)){
                $last_trans=$key_t;
                        ?>
            <div id="transations_id<?=$key_t?>"    data-id="<?=$key_t?>" <?php if($key_t==0){ echo 'class ="transations active"'; }else{ echo 'class="transations" style="display:none;"'; } ?>  style="max-width:100%;float:left;width:100%;">
                                   <?php     
                                    ?>


                <ul style="list-style-type: none;">

                    <?php

                                               foreach($data_n as $key=>$data){

                          if($data['trans_type']=='sentnce'){
                                
                        ?>

                            <li>

                                <a href="#" class="trans" data_id="<?=$tr?>" data-trans="<?=$data['transaction_id'];?>" style="color: black">

                                    <!-- <?=$data['transaction_title']?> -->
                                    <?php echo nl2br($data['transaction_title']); ?>


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


                        else{





                          ?>

                                <span><a href="#" class="trans" data_id="<?=$tr?>" data-trans="<?=$data['transaction_id'];?>" style="color: black">

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

                                </p></span>.



                       <?php
                         }
                                                }
                        

                    ?>

                </ul>
                <?php
                            //$k $key_t;
                         // $tr++;
                        
                        ?>
                        



            </div><!-- /.transations -->

             <?php

                        }
 ?><input type="hidden" id="trans-tab-last" value="<?=$last_trans?>">
 <?php

                    }

                    ?>

                </div> 

              <?php
            }

                        }
               ?>     


            </div> 


            <?php

            $key_tb++;

                        }

                    ?>






                                


  <div class="col-md-4 col-lg-4 col-sm-6" style="
    /* float: left; */
    float: right;">


                       <ul class="pag-div" style="display: flex;    list-style-type: none;
    display: inline-flex;
    margin: 0 auto;
}">
<?php

if(!empty($qt_table)){
  if(sizeof($qt_table)>1){




                          foreach ($qt_table as $key => $qtdiv) {

                              if(!empty($tab_q['qt_vals'])){
                          
                            $i=$key+1;
                            ?>
                        <li  data-id="1"><a href="javascript:void(0);" data-id="<?=$key;?>" class="qpag_link"><?=$i;?></a></li>
<!--                         <li class="active" data-id="2"><a href="#" data-id="2" class="pag_link">2</a></li>
 -->                    
<?php }}
}
}?>
                </ul>
                                       </div>



        
<!-- <input type="hidden" id="qt-tab-last" value="<?=$last_qt?>">
 -->            
<div id="tranaction_hidden">
            <!-- <h4>Transactions</h4> -->
            <!--  data-simplebar -->
             

                </div>   


            </div>
            <!-- question div -->
             </div>



             <div class="col-lg-2 col-md-2  col-sm-2 col-12 " id="" style="border: 1px solid rgba(52, 58, 64, 0.42);background: white;    max-height: 60vh;
    overflow: auto;">
                  <input type="hidden" class="form-control" id="start-order" value="0" >
                  <input type="hidden" class="form-control" id="order-active-list" value="0" >

                  
                 <input type="hidden" class="form-control" id="order-qst" value="0" >
                <input type="hidden" class="form-control" id="order-trans" value="0" >
                <input type="hidden" class="form-control" id="order-prblm" value="0" >
                <input type="hidden" class="form-control" id="order-answer" value="0" >
                <input type="hidden" class="form-control" id="order-answer-col" value="" >





                    <div class="left-block" id="" style="background: rgba(70,80,100,0.8);margin-top: 24px">

                      <a href="#" class="buttons add_new_row"> order</a>
                      <?php foreach ($orders as $key => $value_orders) {
                        if(!empty($value_orders)){
                          $cnnt=$key+1;
                        ?>

<!-- <a href="#" class="buttons order-list"  style="background:palegreen;" data-qst="<?=$value_orders['quest_val_id']?>"  data-orderid="<?=$value_orders['order_id']?>"  data-ans="<?=$value_orders['ans_val_id']?>" data-anscol="<?=$value_orders['ans_col_id']?>" data-trans="<?=$value_orders['trans_val_id']?>"   data-prblm="<?=$value_orders['problem_val_id']?>"><?=$cnnt;?></a> -->

   <div class="order-block" id="" style="">

<a href="#" class="buttons order-list"  style="background:palegreen;" data-qst="<?=$value_orders['quest_val_id']?>"  data-orderid="<?=$value_orders['order_id']?>"  data-ans="<?=$value_orders['ans_val_id']?>" data-anscol="<?=$value_orders['ans_col_id']?>" data-trans="<?=$value_orders['trans_val_id']?>"   data-prblm="<?=$value_orders['problem_val_id']?>"><?=$cnnt;?></a>

<a href="#" class="buttons order-delete "  style=""   data-orderid="<?=$value_orders['order_id']?>">X</a>

                                </div>
                       
                      <?php }}
                      ?>
                                          <span class="append-order"></span>

                    <!-- <a href="#" class="buttons remove_new_row">1</a>
                    <a href="#" class="buttons "> 2</a> -->
                                <button type="button" id="add-ans-btn" class="buttons btn-info rec-start" onclick="add_order(this);"   data-id="" style="padding-left: 2px;padding-left: 2px;
    background: #1991eb;
    color: white;
">Start</button>

<!--                                         <a href="#" class="buttons rec-start">Start</a>
 -->


                                </div>



      
          </div>

        </div> <!-- /.question area-->



         

          


        <div class="col-md-6  col-sm-6 col-12 col-lg-6" id="problem-solving" style="    overflow-y: auto;
    max-height: 80vh;    display: inline-flex;">

    <div class="col-lg-2 col-md-2  col-sm-2 col-12" id="" style="border: 1px solid rgba(52, 58, 64, 0.42);background: white">
                    <div class="left-block" id="" style="margin-top: 24px">

                      <a href="javascript:void(0);" class="buttons add_new_qst" style="height: 47px;    padding-left: 10px;">Interactive Question</a>
                      <input type="hidden" name="" id="inter_quest_id" value="0">

                    <a href="javascript:void(0);" class="buttons ">Notes</a>
                    <a href="javascript:void(0);" class="buttons add-header"> Header</a>
                    <a href="javascript:void(0);" class="buttons add-footer"> Footer</a>


                    <span class="">
                    <h4 style="margin: 0 0 5px;
    padding: 0;
    text-transform: uppercase;
    font-size: 9px;
    color: #7f8fa4;
    text-align: center;">Underline</h4>
                    <i class="fas fa-grip-lines"></i>

                    <ul style="background: #00bcd48c;height: 43px;">
                        <li style="list-style-type: none;float: left;
    margin-left: -34px;"><a style="font-size: 10px;color: black;
" href="javascript:void(0);" class="single_line"><i class="fa fa-minus"></i><input type="hidden" name="line_id" id="line_id" value="0">
 </a></li>


                        <li style="list-style-type: none;"><a style="font-size: 10px;color: black" href="javascript:void(0);" class="double_line"><img src="<?=base_url();?>assets_main/assets/images/controls/double-line.svg" width="12" alt=""><input type="hidden" name="double_line_id" id="double_line_id" value="0"></a></li>


                        <li style="list-style-type: none;"><a style="font-size: 10px;color: black" href="javascript:void(0);" class="text_line"><i class="fa fa-text-width"></i> <input type="hidden" name="under_line_id" id="under_line_id" value="0"></a></li>
                    </ul>
                </span>


<!--                 <span class="">
                    <h4 style="margin: 0 0 5px;
    padding: 0;
    text-transform: uppercase;
    font-size: 9px;
    color: #7f8fa4;
    text-align: center;">Calculations</h4>
                    <i class="fas fa-grip-lines"></i>

                    <ul style="background: #00bcd48c;height: 70px;">
                        <li style="list-style-type: none;float: left;
    margin-left: -34px;"><a style="font-size: 10px;color: black;
" href="javascript:void(0);" class=""><i class="fa fa-plus"></i>
 </a></li>

                <li style="list-style-type: none;
    "><a style="font-size: 10px;color: black;
" href="javascript:void(0);" class=""><i class="fa fa-minus"></i>
 </a></li>

 <li style="list-style-type: none;float: left;margin-left: -34px;
    "><a style="font-size: 10px;color: black;
" href="javascript:void(0);" class=""><i class="fa fa-times" aria-hidden="true"></i>
 </a></li>



     <li style="list-style-type: none;
    "><a style="font-size: 10px;color: black;
" href="javascript:void(0);" class=""><img style="width: 14px;" src="https://img.icons8.com/material-sharp/24/000000/divide.png"/>
 </a></li>


        <li style="list-style-type: none;float: left;margin-left: -34px;
    "><a style="font-size: 10px;color: black;
" href="javascript:void(0);" class=""><i class="fa fa-percent" aria-hidden="true"></i>
 </a></li>


                       
                    </ul>
                </span> -->

<!-- 
                        <span class="">
                    <h4 style="margin: 0 0 5px;
    padding: 0;
    text-transform: uppercase;
    font-size: 9px;
    color: #7f8fa4;
    text-align: center;">Underline</h4>
                    <i class="fas fa-grip-lines"></i>

                    <ul style="background: #00bcd48c;">
                        <li style="list-style-type: none;float: left;
    margin-left: -34px;"><a style="font-size: 10px;color: black;
" href="#" class="single_line"><i class="fa fa-minus"></i> </a></li>


                        <li style="list-style-type: none;"><a style="font-size: 10px;color: black" href="#" class="double_line"><i class="fa fa-minus"></i></a></li>


                        <li style="list-style-type: none;"><a style="font-size: 10px;color: black" href="#" class="text_line"><i class="fa fa-text-width"></i> </a></li>
                    </ul>
                </span> -->
<!--                         <a href="#" class="buttons ">Underline</a>
 --><!--                       <a href="#" class="buttons "> Footer</a>
 -->



                                </div>



      
          </div>

              <div class="col-lg-10 col-md-10  col-sm-10 col-12" id="" style="border: 1px solid rgba(0, 40, 100, 0.1);background: #17a2b81f;overflow-y: auto;
    max-height: 60vh;">



     <?php

                    $last = 1;

                    // for($k=1;$k<=9;$k++){


// print_r(sizeof($problem_format));

                        if(!empty($problem_format)){
                          foreach ($problem_format as $key => $format) {
                            $tab = 'table'.$key;


                       ?>
                       


                       <div id="<?=$tab?>" data-id="<?=$key?>" <?php if($key==0){ echo 'class ="tab active" style="margin-top: 20px;"'; }else{ echo 'class="tab" style="display:none;margin-top: 20px;"'; } ?>>


                             <?php
                    
                      // if($key==0){ 

                       //print_r($format['p_cols']) ;
                        $table=$format['p_cols'];
                      ?>

 <p class="text-center answer-table-header" style="margin-bottom:0;">
                        <span style="float:left"><?=$table['table_left_title']?></span>
                        <span style="font-size:14px;"><?=$format['format_name']?></span>
                        <span style="float:right"><?=$table['table_right_title']?></span>
                    </p>


                     <div class="answer-table-box table-box card">

                    <!-- <div class="table-box"> -->
                        <table>
                            <tr class="table-header">

                              <?php
                                    $cols = $table['table_columns'];
                                   $cols_name = array($table['column_one_name'],$table['column_two_name'],$table['column_three_name'],$table['column_four_name'],$table['column_five_name'],$table['column_six_name'],$table['column_seven_name'],$table['column_eight_name'],$table['column_nine_name'],$table['column_ten_name'],$table['column_eleven_name'],$table['column_twelve_name'],$table['column_thirteen_name'],$table['column_fourteen_name'],$table['column_fifteen_name']);

                                    $cols_width = array($table['column_one_width'],$table['column_two_width'],$table['column_three_width'],$table['column_four_width'],$table['column_five_width'],$table['column_six_width'],$table['column_seven_width'],$table['column_eight_width'],$table['column_nine_width'],$table['column_ten_width'],$table['column_eleven_width'],$table['column_twelve_width'],$table['column_thirteen_width'],$table['column_fourteen_width'],$table['column_fifteen_width']);
                                    $cols_sum = array($table['column_one_sum'],$table['column_two_sum'],$table['column_three_sum'],$table['column_four_sum'],$table['column_five_sum'],$table['column_six_sum'],$table['column_seven_sum'],$table['column_eight_sum'],$table['column_nine_sum'],$table['column_ten_sum'],$table['column_eleven_sum'],$table['column_twelve_sum'],$table['column_thirteen_sum'],$table['column_fourteen_sum'],$table['column_fifteen_sum']);
                                     $cols_count = array($table['count_one_table'],$table['count_two_table'],$table['count_three_table'],$table['count_four_table'],$table['count_five_table'],$table['count_six_table'],$table['count_seven_table'],$table['count_eight_table'],$table['count_nine_table'],$table['count_ten_table'],$table['count_eleven_table'],$table['count_twelve_table'],$table['count_thirteen_table'],$table['count_fourteen_table'],$table['count_fifteen_table']);


                                     // $cols_count = array($table['count_one_table'],$table['count_two_table'],$table['count_three_table'],$table['count_four_table'],$table['count_five_table'],$table['count_six_table'],$table['count_seven_table'],$table['count_eight_table'],$table['count_nine_table'],$table['count_ten_table']);
                                     
                                   // $cols_ans = sizeof($tableans);
                                    // $cols_answer = array($tableans['column_one_value'],$tableans['column_two_value'],$tableans['column_three_value'],$tableans['column_four_value'],$tableans['column_five_value'],$tableans['column_six_value'],$tableans['column_seven_value'],$tableans['column_eight_value'],$tableans['column_nine_value'],$tableans['column_ten_value']);

                                    for($i=0;$i<$cols;$i++){
                                    ?>
                                        <td width="<?=$cols_width[$i]?>%"><?=$cols_name[$i]?></td>
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


                                                          // print_r($format['p_vals'][$key1]) ;  

                                                              

                                                                      ?>




                                                                                    <tr>
                                <?php
                                    for($i=0;$i<$cols;$i++){

                                        if($cols_sum[$i]){

                                                    // if($cols_count[$j]!=0){



                                                    //  }
          // 'sub_status'=>$substatus,


                                   foreach ($format['p_vals'] as $key1 => $vals) {
                                    if($vals['column_id']==$i){
                                            if($vals['row_id']==$m){
                                                    if($vals['sub_status']==1){

                                                      $cls='sub-tab-tr';

                                                      if($cols_count[$i]!=0){

                                                       $width=$cols_width[$i]/$cols_count[$i];
                                                        }else{

                                                          $width=$cols_width[$i];
                                                          }
                                                      //$width=$cols_width[$i]/$cols_count[$i];
                                                      //echo $cols_count[$i];

                                                      if($vals['sub_id']==$cols_count[$i]-1){
                                                       $stylenew='    border-right: 2px solid #00000038 !important;height: 30px;';

                                                     }else{
                                                       $stylenew='height: 30px;';
                                                      }


                                                      }else{
                                                        $cls='';
                                                   $width=$cols_width[$i];
                                                   $stylenew='height: 30px;';

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

                                                      $cls3='p-u-line';
                                                      //$width=$cols_width[$i]/$cols_count[$i];


                                                      }else{
                                                        $cls3='';
                                                  // $width=$cols_width[$i];

                                                      }


                                                      


                                                     //  if($cols_count[$j]!=0){



                                                     // }







                                        ?>
                                            <td width="<?=$width?>%"  data-id="<?=$key1?>" class="connected empty_fixed  problem-tr itemconnect value_<?=$i?> text-right <?=$cls;?> <?=$cls1;?> <?=$cls2;?> <?=$cls3;?>" data-prblem="<?=$vals['format_id']; ?>" style="<?=$stylenew?>"><?=$vals['col_value']; ?></td>
                                        <?php
                                      }
                                      }
                                      }
                                        }
                                        else{
                                          //print_r($cols_count[$i]);



                                        foreach ($format['p_vals'] as $key1 => $vals) {
                                          //print_r($cols_count[$i]);
                                                    if($vals['column_id']==$i){
                                                    if($vals['row_id']==$m){


                                                      if($vals['sub_status']==1){

                                                       // print_r($vals);

                                                      $cls='sub-tab-tr';

                                                      if($cols_count[$i]!=0){

                                                       $width=$cols_width[$i]/$cols_count[$i];
                                                        }else{

                                                          $width=$cols_width[$i];
                                                          }

                                                     // $width=$cols_width[$i]/$cols_count[$i];

// echo $cols_count[$i];
                                                       if($vals['sub_id']==$cols_count[$i]-1){
                                                       $stylenew='    border-right: 2px solid #00000038 !important;height: 30px;';

                                                     }else{
                                                       $stylenew='height: 30px;';
                                                      }
                                                         //$width=$cols_width[$i];

                                                      }else{
                                                        $cls='';
                                                   $width=$cols_width[$i];
                                                    $stylenew='height: 30px;';


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

                                                      $cls3='p-u-line';
                                                      //$width=$cols_width[$i]/$cols_count[$i];


                                                      }else{
                                                        $cls3='';
                                                  // $width=$cols_width[$i];

                                                      }





                                        ?>
                                            <td width="<?=$width?>%" class="connected empty_fixed problem-tr itemconnect value_<?=$i?> <?=$cls?> <?=$cls1?> <?=$cls2?> <?=$cls3?>" data-prblem="<?=$vals['format_id']; ?>" style="<?=$stylenew?>"><?=$vals['col_value']; ?></td>
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
                                                                                    }

                                                                                ?>





                                                                            </table>


<!--                            </div>                              
 -->



                         </div>







                             <?php


                    //}
                     //}



                    ?>

                   </div>

                 <?php
                 }

               }

                     // }
                       ?>
                                        <div class="col-md-4 col-lg-4 col-sm-6" style="
  /* float: left; */
  float: right;">


                     <ul class="pag-div" style="display: flex;    list-style-type: none;
  display: inline-flex;
  margin: 0 auto;
}">
<?php

if(!empty($problem_format)){
                        foreach ($problem_format as $key => $format) {
                          $i=$key+1;
                          ?>
                      <li  data-id="1"><a href="javascript:void(0);" data-id="<?=$key;?>" class="pag_link"><?=$i;?></a></li>
<!--                         <li class="active" data-id="2"><a href="#" data-id="2" class="pag_link">2</a></li>
-->                    
<?php }}?>
              </ul>
                                     </div>


                       </div>


</div> <!-- /.problem solving-->


        <div class="col-md-6  col-sm-6 col-12 col-lg-6" id="problem-solving" style="    overflow-y: auto;max-height:45vh;margin-top: 56px;border: 1px solid rgba(0, 40, 100, 0.1);background: #17a2b81f;">


        

              <div class="col-lg-12 col-md-10  col-sm-10 col-12" id="">



     <?php

                    $last = 1;


                    // for($k=1;$k<=9;$k++){


//print_r($problem_format);

                        if(!empty($problem_format)){
                               $tab = 'anstable'.$key;

                            foreach ($tableans as $key => $format) {
                                $tab = 'anstable'.$key;


                       ?>



                       <div id="<?=$tab?>" data-id="<?=$key?>" data-table="<?=$format['ans_cols']['table_id']?>" <?php if($key==0){ echo 'class ="ans-tab active"'; }else{ echo 'class="ans-tab" style="display:none;"'; } ?>>


                             <?php
                      // if($key==0){ 

                       //print_r($format['p_cols']) ;
                        $table=$format['ans_cols'];
                      ?>

 <p class="text-center answer-table-header" style="margin-bottom:0;">
                          <span style="float:left"><?=$table['table_left_title']?></span>

<!--                         <span style="float:left"><?=$format['format_name']?></span>
 -->
                         <span style="font-size:14px;"><?=$format['format_name']?></span>
                        
 <span style="float:right"><?=$table['table_right_title']?></span>
                    </p>

<?php
      if(!empty($format['ans_vals'])){

        ?>


                    <a href="javascript:void(0)" data-order="0" data-table="<?=$table['table_id']?>" class="btn btn-danger btn-sm delete_answer" style="float: right;margin-bottom: 6px;margin-right: 8px;"><i class="fa fa-trash" aria-hidden="true"></i>


                      <?php } ?>

                    <a href="javascript:void(0)" data-order="0" data-table="<?=$table['table_id']?>" class="btn btn-success btn-sm copy-excel" style="float: right;margin-bottom: 6px;margin-right: 3px;">Copy


                      </a>
                      <input type="hidden" class="form-control" data-table="<?=$table['table_id']?>" id="copy-excel-stat" value="0">

                    <a href="javascript:void(0)" data-order="0" data-table="<?=$table['table_id']?>" class="btn btn-success btn-sm add_row_ans" style="float: right;margin-bottom: 6px;    margin-right: 8px;"><i class="fa fa-plus" aria-hidden="true"></i>


                      </a>


                     <div class="answer-table-box table-box card">



                    <!-- <div class="table-box"> -->
                        <table>
                            <tr class="table-header">

                              <?php
                                    $cols = $table['table_columns'];
                                    $table_id = $table['table_id'];

                                       $cols_name = array($table['column_one_name'],$table['column_two_name'],$table['column_three_name'],$table['column_four_name'],$table['column_five_name'],$table['column_six_name'],$table['column_seven_name'],$table['column_eight_name'],$table['column_nine_name'],$table['column_ten_name'],$table['column_eleven_name'],$table['column_twelve_name'],$table['column_thirteen_name'],$table['column_fourteen_name'],$table['column_fifteen_name']);

                                    $cols_width = array($table['column_one_width'],$table['column_two_width'],$table['column_three_width'],$table['column_four_width'],$table['column_five_width'],$table['column_six_width'],$table['column_seven_width'],$table['column_eight_width'],$table['column_nine_width'],$table['column_ten_width'],$table['column_eleven_width'],$table['column_twelve_width'],$table['column_thirteen_width'],$table['column_fourteen_width'],$table['column_fifteen_width']);
                                    $cols_sum = array($table['column_one_sum'],$table['column_two_sum'],$table['column_three_sum'],$table['column_four_sum'],$table['column_five_sum'],$table['column_six_sum'],$table['column_seven_sum'],$table['column_eight_sum'],$table['column_nine_sum'],$table['column_ten_sum'],$table['column_eleven_sum'],$table['column_twelve_sum'],$table['column_thirteen_sum'],$table['column_fourteen_sum'],$table['column_fifteen_sum']);
                                     $cols_count = array($table['count_one_table'],$table['count_two_table'],$table['count_three_table'],$table['count_four_table'],$table['count_five_table'],$table['count_six_table'],$table['count_seven_table'],$table['count_eight_table'],$table['count_nine_table'],$table['count_ten_table'],$table['count_eleven_table'],$table['count_twelve_table'],$table['count_thirteen_table'],$table['count_fourteen_table'],$table['count_fifteen_table']);



                                    $cols_sub_ans = sizeof($format['ans_sub_vals']);
                                   // $cols_ans = sizeof($tableans);
                                    // $cols_answer = array($tableans['column_one_value'],$tableans['column_two_value'],$tableans['column_three_value'],$tableans['column_four_value'],$tableans['column_five_value'],$tableans['column_six_value'],$tableans['column_seven_value'],$tableans['column_eight_value'],$tableans['column_nine_value'],$tableans['column_ten_value']);

                                    for($i=0;$i<$cols;$i++){
                                    ?>
                                        <td width="<?=$cols_width[$i]?>%"><?=$cols_name[$i]?></td>
                                    <?php
                                    }
                                ?>

                            </tr>


                        </table>

<!--                           </div>      
 -->



                             


<!--                                         <div data-simplebar class="table-box result_dv" style="width:100%;max-width:100%">
 -->                        


                              <table id="result1" class="row_data row_ans" data-table="<?=$table_id?>" style="width: 100%;min-height: 20px;">
                                                    <form id="" method="post" action="" autocomplete="off">



  <!-- hidden tr -->


  <tr class="hidden" data-table="<?=$table_id?>" style="display:none;">
                                    <?php
                                    for($i=0;$i<$cols;$i++){


                    //                    if(amnt_array[i]==1){
                    //     var cls='number';
                    // }else{
                    //     var cls=''
                    // }

                                       

                                        if($cols_sum[$i]){

                                                if($cols_count[$i]!=0){
                                            $cls='sub-tab-tr';
                                            $width=$cols_width[$i]/$cols_count[$i];

                                            // if($vals['sub_id']==$cols_count[$i]-1){
                                            //            $stylenew='    border-right: 2px solid #00000038 !important;height: 30px;';

                                            //          }else{
                                            //            $stylenew='';
                                            //           }


                                          }else{
                                             $cls='';
                                             $width=$cols_width[$i];
                                          }
                                          ?>
<!--                                             <td width="<?=$width?>%" class="text-right <?=$cls;?>">
 -->                                        <?php if($cols_count[$i]!=0){
                                                $width=100/$cols_count[$i];
                                                     ?>
                                                
                                                     <!-- <table>
                                                        <tr>
 -->                                                            <?php 

                                                       



                                               for ($sub=0; $sub <$cols_count[$i] ; $sub++) { 

                                              $width=$cols_width[$i]/$cols_count[$i];


                                            if($sub==$cols_count[$i]-1){
                                                       $stylenew='    border-right: 2px solid #00000038 !important;';

                                                     }else{
                                                       $stylenew='';
                                                      }


                                                


                                                 

                                                   ?>
                                                  
                                               
                                                     <td width="<?=$width;?>%" class="sub_table connected <?=$cls?>" style="<?=$stylenew;?>">

                                                      <input type="text" id="input-field" class="answer-colum-highlight   ans-val-new  <?=$cls?>" style="width:100%;margin:0px; background:rgba(256,256,256,0.9);  text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="" spellcheck="false" autocomplete="false"  data-column= "<?=$i?>" data-sub= "<?=$sub?>" data-row="<?=$m?>" data-table="<?=$table_id?>" data-answer="">
                                                        
                                                           </td> 
                                                         <?php

                                               }

                                           

                                                ?>
                                                         
                                                           
                                                        <!-- </tr>
                                                      </table> -->
                                                   <?php
                                        }else{
                                                ?>


                                     <td width="<?=$width?>%" class="text-right <?=$cls;?>">

                                        <?php

                                          if($i==$cols-1){  
                                   $delbtn='<a href="javascript:void(0)" data-row="'.$m.'"  data-column= "<?=$i?>" data-table="'.$table_id.'" data-id="6" class="delte-ans-row-btn" style="float: right;margin-right: -23px;"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                   } else{
                                          $delbtn='';
                                        }  

                                          ?>
                                          


                                          <input type="text" id="input-field" class="answer-colum-highlight  text-right number  ans-val-new  <?=$cls?>" style="width:100%;margin:0px; background:rgba(256,256,256,0.9);  text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="" spellcheck="false" autocomplete="false"  data-column= "<?=$i?>"  data-row="<?=$m?>" data-table="<?=$table_id?>" data-answer="">
                                          <?=$delbtn?>

                                        </td>

                                         <?php } ?>

<!--                                             </td>
 -->                                        <?php
                                        }
                                        else{


                                                if($cols_count[$i]!=0){
                                            $cls='sub-tab-tr ';
                                            $cls444='sub-qst-2';


                                          }else{
                                             $cls='';
                                             $cls444='';
                                          }
                                          
                                        ?>
<!--                                             <td width="<?=$cols_width[$i]?>%" class="<?=$cls;?>">
 -->                                                
                                                <?php if($cols_count[$i]!=0){
                                                    // $width=100/$cols_count[$i];
                                                  $width=$cols_width[$i]/$cols_count[$i];
                                        ?>
                                                 <!-- <table>
                                                    <tr> -->
                                                       <?php for ($sub=0; $sub <$cols_count[$i] ; $sub++) { 
                                                         if($sub==$cols_count[$i]-1){
                                                       $stylenew='    border-right: 2px solid #00000038 !important;';

                                                     }else{
                                                       $stylenew='';
                                                      }
                                                           ?>
                                                           <td width="<?=$width;?>%" class="sub_table connected <?=$cls?>" style="<?=$stylenew;?>">

                                                            <input type="text" id="input-field" class="answer-colum-highlight   ans-val-new <?=$cls?> <?=$cls444?>" style="width:100%;margin:0px; background:rgba(256,256,256,0.9);  text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="" spellcheck="false" autocomplete="false"  data-column= "<?=$i?>" data-sub= "<?=$sub?>" data-row="<?=$m?>" data-table="<?=$table_id?>" data-answer="">
                                                        
                                                      </td> 
                                                         <?php } ?>

                                                            <?php 

                                                       

 // $cols_wid = sizeof($table_width[$i]['column_id']);
                                                        // if($table_width[$i]['column_id'])

                                               // for ($sub=0; $sub <$cols_count[$i] ; $sub++) { 

                                               //  print_r($i);

                                                   
                                                    ?>
                                                   
                                                     <!-- <td width="<?=$width;?>%" class="sub_table connected <?=$cls?>">


                                                       
                                                      </td> -->

                                                        <?php
                                                 

                                                  

                                               
                                                        
                                                          
                                                        
                                                               
                                                        
                                                        // } 
                                                        ?>
                                                    <!-- </tr>
                                                  </table> -->

                                                  <?php
                                        }

                                        else{
                                          ?>

                                  <td width="<?=$cols_width[$i]?>%" class="<?=$cls;?>">

                                        <?php
                                               if($i==$cols-1){  
                                   $delbtn='<a href="javascript:void(0)" data-row="'.$m.'"  data-column= "<?=$i?>" data-table="'.$table_id.'" data-id="6" class="delte-ans-row-btn" style="float: right;margin-right: -23px;"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                   } else{
                                          $delbtn='';
                                        }
                                          ?>

                                          

                                          <input type="text" id="input-field" class="answer-colum-highlight   ans-val-new <?=$cls?>" style="width:100%;margin:0px; background:rgba(256,256,256,0.9);  text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="" spellcheck="false" autocomplete="false"  data-column= "<?=$i?>"  data-row="<?=$m?>" data-table="<?=$table_id?>" data-answer="">
                                          <?=$delbtn?>


                                                                                      </td>


                                       <?php }


                                        ?>

                                        <?php
                                        }
                                    }
                                ?>
                            </tr>


                            <!-- hidden row -->





                                                                                <?php

                                                           // 
                                                          //   if(empty($format['ans_vals'])){ 

                                                          //   $values=$format['p_vals'];
                                                          // }else{
                                                          //   $values=$format['ans_vals'];

                                                          // }

                                                            $ids=array();
// print_r($format['ans_vals']);

                                                     if(!empty($format['ans_vals'])){


                                                         // print_r('dddd') ; 
                                                          $values=$format['ans_vals'];
                                                          $id_new=0;
                                                            // for($m=0;$m<sizeof($values);$m++){
                                                          for($m=0;$m<sizeof($values);$m++){
                                                             // foreach ($format['p_vals'] as $key1 => $vals) {

                                                            if(!empty($format['ans_vals'])){



                                                               $tableansnew=$format['ans_vals'];

                                                               $table_sub=$format['ans_sub_vals'];

                                                               //print_r($table_sub);

                                                             if(!empty($format['ans_vals'])){
                                                               $ansid=$tableansnew[$m]['id']; 
                                                             }else{
                                                              $ansid=0;
                                                             }




                                                           //print_r($format['ans_sub_vals']) ;

                                          $cols_answer = array($tableansnew[$m]['column_one_value'],$tableansnew[$m]['column_two_value'],$tableansnew[$m]['column_three_value'],$tableansnew[$m]['column_four_value'],$tableansnew[$m]['column_five_value'],$tableansnew[$m]['column_six_value'],$tableansnew[$m]['column_seven_value'],$tableansnew[$m]['column_eight_value'],$tableansnew[$m]['column_nine_value'],$tableansnew[$m]['column_ten_value'],$tableansnew[$m]['column_eleven_value'],$tableansnew[$m]['column_twelve_value'],$tableansnew[$m]['column_thirteen_value'],$tableansnew[$m]['column_fourteen_value'],$tableansnew[$m]['column_fifteen_value']);
                                           // print_r($cols_answer);
                                            $cols_underline = array($tableansnew[$m]['column_one_underline'],$tableansnew[$m]['column_two_underline'],$tableansnew[$m]['column_three_underline'],$tableansnew[$m]['column_four_underline'],$tableansnew[$m]['column_five_underline'],$tableansnew[$m]['column_six_underline'],$tableansnew[$m]['column_seven_underline'],$tableansnew[$m]['column_eight_underline'],$tableansnew[$m]['column_nine_underline'],$tableansnew[$m]['column_ten_underline'],$tableansnew[$m]['column_eleven_underline'],$tableansnew[$m]['column_twelve_underline'],$tableansnew[$m]['column_thirteen_underline'],$tableansnew[$m]['column_fourteen_underline'],$tableansnew[$m]['column_fifteen_underline']); 

                                            $cols_doubleline = array($tableansnew[$m]['column_one_doubleline'],$tableansnew[$m]['column_two_doubleline'],$tableansnew[$m]['column_three_doubleline'],$tableansnew[$m]['column_four_doubleline'],$tableansnew[$m]['column_five_doubleline'],$tableansnew[$m]['column_six_doubleline'],$tableansnew[$m]['column_seven_doubleline'],$tableansnew[$m]['column_eight_doubleline'],$tableansnew[$m]['column_nine_doubleline'],$tableansnew[$m]['column_ten_doubleline'],$tableansnew[$m]['column_eleven_doubleline'],$tableansnew[$m]['column_twelve_doubleline'],$tableansnew[$m]['column_thirteen_doubleline'],$tableansnew[$m]['column_fourteen_doubleline'],$tableansnew[$m]['column_fifteen_doubleline']); 

                                            $cols_textline = array($tableansnew[$m]['column_one_textline'],$tableansnew[$m]['column_two_textline'],$tableansnew[$m]['column_three_textline'],$tableansnew[$m]['column_four_textline'],$tableansnew[$m]['column_five_doubleline'],$tableansnew[$m]['column_six_textline'],$tableansnew[$m]['column_seven_textline'],$tableansnew[$m]['column_eight_textline'],$tableansnew[$m]['column_nine_textline'],$tableansnew[$m]['column_ten_textline'],$tableansnew[$m]['column_eleven_textline'],$tableansnew[$m]['column_twelve_textline'],$tableansnew[$m]['column_thirteen_textline'],$tableansnew[$m]['column_fourteen_textline'],$tableansnew[$m]['column_fifteen_textline']); 
                                            }else{

                                              $cols_answer=array();
                                              $cols_underline=array();
                                              $cols_doubleline=array();
                                               $cols_textline=array();

                                            }


                                         //   print_r(expression) 


                                                              

                                                                      ?>


                                                <tr class="ans-row">
                                <?php
                                    for($i=0;$i<$cols;$i++){


                                       if($cols_underline[$i]=='1'){


                                                            $style="0px";
                                                            $cls11='underline';

                                                        }else{
                                                            $style="0px";
                                                            $cls11='';
                                                        }


                                                        if($cols_doubleline[$i]=='1'){


                                                            $style="0px";
                                                            $cls12='ans-d-line';

                                                        }else{
                                                            $style="0px";
                                                            $cls12='';
                                                        }


                                                        if($cols_textline[$i]=='1'){


                                                            $style="0px";
                                                            $cls13='t-underline';

                                                        }else{
                                                            $style="0px";
                                                            $cls13='';
                                                        }

                                                        

                                                                                                    //print_r($cls11);




                                        if($cols_sum[$i]){

                                          if($cols_count[$i]!=0){
                                            $cls='sub-tab-tr ';
                                            $cls444='sub-qst-2';


                                          }else{
                                             $cls='';
                                             $cls444='';
                                          }
                                          ?>



  <?php

  if($cols_count[$i]!=0){
     // $width=100/$cols_count[$i];
                                                    $width=$cols_width[$i]/$cols_count[$i];


  ?>

  <!--  <table>
      <tr> -->

        <?php
        for ($sub=0; $sub <$cols_count[$i] ; $sub++) { 

                                    // if($i==$cols-1){ 
                           if($sub==$cols_count[$i]-1){ 
                            // echo $cols_count[$i]-1;
                            $stylenew='border-right: 2px solid #00000038 !important;border-bottom: none !important;';
                            }else{
                              $stylenew='border-bottom: none !important;';
                              }
                            // }else{
                            //   $stylenew='border-bottom: none !important;';

                            // }


         ?>

         <td width="<?=$width;?>%" class="input-ans sub_table connected text-right <?=$cls?>" style="<?=$stylenew?>">
          <?php
            $ids1=array(); 
                                                                  
      for($sub1=0; $sub1 <$cols_sub_ans ; $sub1++) {
        if($table_sub[$sub1]['column_id']==$i){
            if($table_sub[$sub1]['rows']==$m){

              if ($id_new!=$table_sub[$sub1]['id']){

            $id_new=$table_sub[$sub1]['id'];


                if(!in_array($table_sub[$sub1]['id'], $ids)){

                         array_push($ids, $table_sub[$sub1]['id']);


                          if($i==$cols-1){ 

                           if($sub1==$cols_sub_ans-1){ 
                                   $delbtn='<a href="javascript:void(0)" data-row="'.$m.'"  data-column= "<?=$i?>" data-table="'.$table_id.'" data-id="6" class="delte-ans-row-btn" style="float: right;margin-right: -23px;"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                   } else{
                                          $delbtn='';
                                        } 
                                      } else{
                                          $delbtn='';
                                        } 


                    if($table_sub[$sub1]['is_underline']=='1'){


                             $class="underline";
                            // $style1="display: none;border: none;border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: black;";
                        }else{
                             $class="";
                              // $style1="display: none;border: none";
                        }



                        if($table_sub[$sub1]['is_doubleline']=='1'){


                             $class1="ans-d-line";
                            // $style1="display: none;border: none;border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: black;";
                        }else{
                             $class1="";
                              // $style1="display: none;border: none";
                        }


                            if($table_sub[$sub1]['is_textline']=='1'){


                             $class3="t-underline";
                            // $style1="display: none;border: none;border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: black;";
                        }else{
                             $class3="";
                              // $style1="display: none;border: none";
                        }
                                                                           
                                                                          // array_push($ids, $table_sub[$sub1]['id']);

                                                                      
                     ?> 
                      <!-- <li class="disc1 <?=$class;?> " style="display: none;border: none;"><?=$table_sub[$sub1]['ans_values']?></li> -->


                     <input type="text" id="input-field" class="answer-colum-highlight text-right <?=$cls13?> number ans-val <?=$cls?> <?=$cls444?> <?=$class?> <?=$class1?> <?=$class3?>" style="width:100%;margin:0px; background:rgba(256,256,256,0.9);  text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="<?=$table_sub[$sub1]['ans_values']?>" spellcheck="false" autocomplete="false"  data-column= "<?=$i?>" data-sub= "<?=$sub?>" data-row="<?=$m?>" data-table="<?=$table_id?>" data-answer="<?=$table_sub[$sub1]['id']?>">
                     <?php echo $delbtn;?>


                        <?php


                        break;
                        }



          }






            }
          }



       }

        ?>


         </td>

         <?php 


        }

        ?>



     <!--  </tr>
    </table> -->

  <?php
}else{




                                   if($i==$cols-1){  
                                   $delbtn='<a href="javascript:void(0)" data-row="'.$m.'"  data-column= "<?=$i?>" data-table="'.$table_id.'" data-id="6" class="delte-ans-row-btn" style="float: right;margin-right: -23px;"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                   } else{
                                          $delbtn='';
                                        }  

  ?>
  <td width="<?=$cols_width[$i]?>%"  data-id="" data-column= "<?=$i?>" data-answer="<?=$ansid?>" class="input-ans connected empty_fixed itemconnect <?=$cls11?> <?=$cls12?> <?=$cls13?> value_<?=$i?> text-right <?=$cls?> ">


  <input type="text" id="input-field" class="answer-colum-highlight text-right number  <?=$cls13?> ans-val <?=$cls?>" style="width:100%;margin:0px; background:rgba(256,256,256,0.9);  text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="<?=$cols_answer[$i]?>" spellcheck="false" autocomplete="false"  data-column= "<?=$i?>" data-row="<?=$m?>" data-table="<?=$table_id?>" data-answer="<?=$ansid?>">



  <?php echo $delbtn;?>




<?php

}
  ?>


</td>
                                          <?php

                                             // foreach ($format['p_vals'] as $key1 => $vals) {
                                             //  if($vals['column_id']==$i){
                                             //  if($vals['row_id']==$m){

                                            //    if($vals['sub_status']==1){

                                            //           $cls='sub-tab-tr';
                                            // //         foreach ($format['ans_sub_vals'] as $key1 => $vals_sub) {
                                            // //           if($vals_sub['column_id']==$i){
                                            // // if($vals_sub['rows']==$m){
                                            // //    //print_r($vals_sub);
                                            // //   if(!in_array($vals_sub['id'], $ids)){

                                            // //     array_push($ids, $vals_sub['id']);
                                            // //   $val=$vals_sub['ans_values'];
                                            // //   break;
                                            // //   }


                                            // //   }
                                            // //   }

                                            // //           }

                                            //           //$format['ans_sub_vals']
                                            //           $val='';
                                            //           }else{
                                            //             $cls='';
                                            //             if(!empty($format['ans_vals'])){

                                            //             $val=$cols_answer[$i];
                                            //            $ansid=$tableansnew[$m]['id']; 

                                            //           }else{

                                            //             $val='';
                                            //             $ansid=0;
                                            //           }

                                            //           }

                                        ?>
                                            <!-- <td width="<?=$cols_width[$i]?>%"  data-id="<?=$key1?>" data-column= "<?=$i?>" data-answer="<?=$ansid?>" class="input-ans connected empty_fixed itemconnect value_<?=$i?> text-right <?=$cls?>"><input type="text" id="input-field" class="answer-colum-highlight  ans-val <?=$cls?>" style="width:100px;margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;"  spellcheck="false" autocomplete="off"  data-column= "<?=$i?>" data-row="<?=$m?>" data-table="<?=$table_id?>" data-answer="<?=$ansid?>" value="<?=$val?>"></td> -->
                                        <?php
                                         // }
                                         //  }



                                         //   }
                                        }
                                        else{


                                          if($cols_underline[$i]=='1'){


                                                            $style="0px";
                                                            $cls11='underline';

                                                        }else{
                                                            $style="0px";
                                                            $cls11='';
                                                        }


                                                        if($cols_doubleline[$i]=='1'){


                                                            $style="0px";
                                                            $cls12='ans-d-line';

                                                        }else{
                                                            $style="0px";
                                                            $cls12='';
                                                        }


                                                        if($cols_textline[$i]=='1'){


                                                            $style="0px";
                                                            $cls13='t-underline';

                                                        }else{
                                                            $style="0px";
                                                            $cls13='';
                                                        }


                                          if($cols_count[$i]!=0){
                                            $cls='sub-tab-tr';
                                            $cls444='sub-qst-2 ';


                                          }else{
                                             $cls='';
                                             $cls444='';
                                          }
                                          ?>



                                         

  <?php

  if($cols_count[$i]!=0){
                                              $width=$cols_width[$i]/$cols_count[$i];

  ?>

 <!--   <table>
      <tr> -->

        <?php
        for ($sub=0; $sub <$cols_count[$i] ; $sub++) { 
                      // if($i==$cols-1){ 
                           if($sub==$cols_count[$i]-1){ 
                                                        // echo $cols_count[$i]-1;
                            //modified
                                                        $stylenew='border-bottom: none !important;';


                            // $stylenew='border-right: 2px solid #00000038 !important;border-bottom: none !important;';
                            }else{
                              $stylenew='border-bottom: none !important;';
                              }
                            // }else{
                            //   $stylenew='border-bottom: none !important;';

                            // }
         ?>

         <td width="<?=$width;?>%" class="input-ans sub_table connected <?=$cls?>" style="<?=$stylenew?>">
          <?php
            $ids1=array(); 
                                                                  
      for($sub1=0; $sub1 <$cols_sub_ans ; $sub1++) {
        if($table_sub[$sub1]['column_id']==$i){
            if($table_sub[$sub1]['rows']==$m){

              if ($id_new!=$table_sub[$sub1]['id']){

            $id_new=$table_sub[$sub1]['id'];


                if(!in_array($table_sub[$sub1]['id'], $ids)){

                         array_push($ids, $table_sub[$sub1]['id']);



                         if($i==$cols-1){ 

                           if($sub1==$cols_sub_ans-1){ 
                                   $delbtn='<a href="javascript:void(0)" data-row="'.$m.'"  data-column= "<?=$i?>" data-table="'.$table_id.'" data-id="6" class="delte-ans-row-btn" style="float: right;margin-right: -23px;"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                   } else{
                                          $delbtn='';
                                        } 
                                      } else{
                                          $delbtn='';
                                        }
                                                                           
                              if($table_sub[$sub1]['is_underline']=='1'){


                             $class="underline";
                            // $style1="display: none;border: none;border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: black;";
                        }else{
                             $class="";
                              // $style1="display: none;border: none";
                        }



                        if($table_sub[$sub1]['is_doubleline']=='1'){


                             $class1="ans-d-line";
                            // $style1="display: none;border: none;border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: black;";
                        }else{
                             $class1="";
                              // $style1="display: none;border: none";
                        }


                        if($table_sub[$sub1]['is_textline']=='1'){


                             $class3="t-underline";
                            // $style1="display: none;border: none;border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: black;";
                        }else{
                             $class3="";
                              // $style1="display: none;border: none";
                        }                                            // array_push($ids, $table_sub[$sub1]['id']);

                                                                      
                     ?> 
                      <!-- <li class="disc1 <?=$class;?> " style="display: none;border: none;"><?=$table_sub[$sub1]['ans_values']?></li> -->
                      


                     <input type="text" id="input-field" class="answer-colum-highlight  <?=$cls13?>  ans-val <?=$cls?> <?=$cls444?> <?=$class?> <?=$class1?> <?=$class3?>" style="width:100%;margin:0px; background:rgba(256,256,256,0.9);  text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="<?=$table_sub[$sub1]['ans_values']?>" spellcheck="false" autocomplete="false"  data-column= "<?=$i?>" data-sub= "<?=$sub?>" data-row="<?=$m?>" data-table="<?=$table_id?>" data-answer="<?=$table_sub[$sub1]['id']?>">
<?php echo $delbtn;?>

                        <?php 
                        break;
                        }



          }






            }
          }



       }

        ?>


         </td>

         <?php 


        }

        ?>



     <!--  </tr>
    </table> -->

  <?php
}else{

  ?>

 <td width="<?=$cols_width[$i]?>%"  data-id="" data-column= "<?=$i?>" data-answer="<?=$ansid?>" class="input-ans connected empty_fixed itemconnect <?=$cls11?> <?=$cls12?> <?=$cls13?>  value_<?=$i?> <?=$cls?>">

  <input type="text" id="input-field" class="answer-colum-highlight  <?=$cls13?>  ans-val <?=$cls?>" style="width:100%;margin:0px; background:rgba(256,256,256,0.9);  text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="<?=$cols_answer[$i]?>" spellcheck="false" autocomplete="false"  data-column= "<?=$i?>" data-row="<?=$m?>" data-table="<?=$table_id?>" data-answer="<?=$ansid?>">








<?php

}
  ?>


</td>



                                          
                                 <?php        
                                        }
                                    }
                                ?>
                            </tr>





                                                                               <?php

                                                                                      }
                                                                                      }else{

                                                                                        // empty anser tr//


                                                                                         


                                                                                
                                                            //print_r(sizeof($values)) ; 
                                                           
                                                            $ids=array();

                                                            if(!empty($format['p_vals'])){

                                                              $values=$format['p_vals'];
                                                              // for($m=0;$m<sizeof($values);$m++){
                                                            for($m=0;$m<1;$m++){
                                                             // foreach ($format['p_vals'] as $key1 => $vals) {

                                                                         if(!empty($format['ans_vals'])){



                                                               $tableansnew=$format['ans_vals'];
                                                               

                                                             if(!empty($format['ans_vals'])){
                                                               $ansid=$tableansnew[$m]['id']; 
                                                             }else{
                                                              $ansid=0;
                                                             }




                                                           //print_r($format['ans_sub_vals']) ;

                                                          $cols_answer = array($tableansnew[$m]['column_one_value'],$tableansnew[$m]['column_two_value'],$tableansnew[$m]['column_three_value'],$tableansnew[$m]['column_four_value'],$tableansnew[$m]['column_five_value'],$tableansnew[$m]['column_six_value'],$tableansnew[$m]['column_seven_value'],$tableansnew[$m]['column_eight_value'],$tableansnew[$m]['column_nine_value'],$tableansnew[$m]['column_ten_value']);
                                           // print_r($cols_answer);
                                            $cols_underline = array($tableansnew[$m]['column_one_underline'],$tableansnew[$m]['column_two_underline'],$tableansnew[$m]['column_three_underline'],$tableansnew[$m]['column_four_underline'],$tableansnew[$m]['column_five_underline'],$tableansnew[$m]['column_six_underline'],$tableansnew[$m]['column_seven_underline'],$tableansnew[$m]['column_eight_underline'],$tableansnew[$m]['column_nine_underline']); 
                                            }else{

                                              $cols_answer=array();
                                              $cols_underline=array();

                                            } 

                                                              

                                                                      ?>


                                                                                    <tr class="ans-row">
                                <?php
                                    for($i=0;$i<$cols;$i++){

                                        if($cols_sum[$i]){
                                             foreach ($format['p_vals'] as $key1 => $vals) {
                                              if($vals['column_id']==$i){
                                            if($vals['row_id']==$m){

                                               if($vals['sub_status']==1){

                                                      $cls='sub-tab-tr';

                                                      if($cols_count[$i]!=0){

                                                       $width=$cols_width[$i]/$cols_count[$i];
                                                        }else{

                                                          $width=$cols_width[$i];
                                                          }
                                                      //$width=$cols_width[$i]/$cols_count[$i];
                                                      $ansid=0;

                                                      if($vals['sub_id']==$cols_count[$i]-1){
                                                       $stylenew='    border-right: 2px solid #00000038 !important;height: 30px;';

                                                     }else{
                                                       $stylenew='';
                                                      }
                                            //         foreach ($format['ans_sub_vals'] as $key1 => $vals_sub) {
                                            //           if($vals_sub['column_id']==$i){
                                            // if($vals_sub['rows']==$m){
                                            //    //print_r($vals_sub);
                                            //   if(!in_array($vals_sub['id'], $ids)){

                                            //     array_push($ids, $vals_sub['id']);
                                            //   $val=$vals_sub['ans_values'];
                                            //   break;
                                            //   }


                                            //   }
                                            //   }

                                            //           }

                                                      //$format['ans_sub_vals']
                                                      $val='';
                                                      }else{
                                                        $cls='';
                                                         $width=$cols_width[$i];
                                                         $stylenew='';
                                                        if(!empty($format['ans_vals'])){

                                                        $val=$cols_answer[$i];
                                                       $ansid=$tableansnew[$m]['id']; 

                                                      }else{

                                                        $val='';
                                                        $ansid=0;
                                                      }

                                                      }

                                        ?>
                                            <td width="<?=$width?>%"  data-id="<?=$key1?>" data-column= "<?=$i?>" data-answer="<?=$ansid?>" class="input-ans connected empty_fixed itemconnect value_<?=$i?> text-right <?=$cls?>" style="<?=$stylenew?>"><input type="text" id="input-field" class="answer-colum-highlight text-right number ans-val <?=$cls?>" style="width:100%;margin:0px; background:rgba(256,256,256,0.9); text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;"  spellcheck="false" autocomplete="false"  data-column= "<?=$i?>" data-row="<?=$m?>" data-table="<?=$table_id?>" data-sub="<?=$vals['sub_id']?>" data-answer="<?=$ansid?>" value="<?=$val?>"></td>
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

                                                      $cls='sub-tab-tr ';
                                                       $cls444='sub-qst-2';


                                                      if($cols_count[$i]!=0){

                                                       $width=$cols_width[$i]/$cols_count[$i];
                                                        }else{

                                                          $width=$cols_width[$i];
                                                          }
                                                     // $width=$cols_width[$i]/$cols_count[$i];
                                                       $ansid=0;
                                                       $val='';
                                                          if($vals['sub_id']==$cols_count[$i]-1){
                                                       $stylenew='    border-right: 2px solid #00000038 !important;';

                                                     }else{
                                                       $stylenew='';
                                                      }

                                        foreach ($format['ans_sub_vals'] as $key1 => $vals_sub) {
                                               // print_r($vals_sub);

                                                      if($vals_sub['column_id']==$i){
                                            if($vals_sub['rows']==$m){
                                              if(!in_array($vals_sub['id'], $ids)){

                                                array_push($ids, $vals_sub['id']);
                                                $val=$vals_sub['ans_values'];
                                              //$val='';
                                              break;
                                              }


                                              }
                                              }

                                                      }

                                                      }else{
                                                        $cls='';
                                                        $cls444='';

                                                        $width=$cols_width[$i];
                                                     $stylenew='';

                                                         if(!empty($format['ans_vals'])){

                                                        $val=$cols_answer[$i];
                                                        $ansid=$tableansnew[$m]['id'];
                                                      }else{

                                                        $val='';
                                                        $ansid=0;
                                                      }
                                                      }

                                        ?>
                                            <td width="<?=$width?>%" data-answer="<?=$ansid?>" data-column= "<?=$i?>" class="input-ans connected empty_fixed itemconnect value_<?=$i?> <?=$cls?> " style="<?=$stylenew?>"><input type="text" id="input-field" class="answer-colum-highlight   ans-val <?=$cls?> <?$cls444?>" style="width:100%;margin:0px; background:rgba(256,256,256,0.9);  text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="<?=$val?>" spellcheck="false" autocomplete="false"  data-column= "<?=$i?>" data-row="<?=$m?>" data-sub="<?=$vals['sub_id']?>" data-table="<?=$table_id?>" data-answer="<?=$ansid?>"></td>
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
                                                                                    }

                                                                                ?>





                                                                                <!-- empty answer -->





                                                                            <?php
                                                                                      }

                                                                                  ?>




</form>
                                                                              </table>


<!--                            </div>                              
 -->



                         </div>







                             <?php


                    //}
                    



                    ?>

                   </div>

                 <?php
               }

               }

                     // }
                       ?>
<!-- <span>(Use enter key to save values)</span>
 -->                       </div>


                       <div class="col-md-4 col-lg-4 col-sm-6" style="
  /* float: left; */
  float: right;">


                     <ul class="pag-div" style="display: flex;    list-style-type: none;
  display: inline-flex;
  margin: 0 auto;
}">
<?php

if(!empty($problem_format)){
                        foreach ($problem_format as $key => $format) {
                          $i=$key+1;
                          ?>
                      <li  data-id="1"><a href="javascript:void(0);" data-id="<?=$key;?>" class="ans_link"><?=$i;?></a></li>
<!--                         <li class="active" data-id="2"><a href="#" data-id="2" class="pag_link">2</a></li>
-->                    
<?php }}?>
              </ul>
                                     </div>




                    </div>


                    <div class="col-md-6 col-lg-6 add-div">


                      <div class="col-md-12 col-lg-12"></div>

                       <div class="col-md-4 col-lg-12">

                     <!--  <button type="button" id="add-ans-btn" class="buttons btn-info rec-start" onclick="add_order(this);" data-id="" style="float: right;
    background: #1991eb;
    color: white;
    margin-top: 200px;
">View Question</button> -->
 <a href="<?=base_url('view-details/'.$questionid)?>" target="_blank" class="btn btn-primary btn-sm " style="float: right;
    background: #1991eb;
    color: white;
    margin-top: 200px;
">View Question</a>
                     </div></div>












          

              



            </div>



            <div>



              


            </div>
          </div>
<!-- 
          <div class="tabs">



   
<input type="radio" name="tabs" id="Questions" checked="checked">
  <label for="<?=$lang['language_code']?>"><?=$lang['language_name'];?></label>
  <label for="1">hjdfhdf</label>

   <div class="tab">
     <div id="roles-table" class="col-12">
        <div class="card">
          <div class="card-header" style="display: block">
          </div>
          
          <div class="row">
            <div class="col-md-6 col-lg-4">
         
            </div>

            <div class="col-md-6 col-lg-8 text-center">
              
          <p>xchjjxchxc</p>
           
          
            </div>
          </div>



          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('vendor/products')?>" class="btn btn-link">Go Back</a>
            </div>
          </div>
          
        </div>
      </div>



  </div>



   

</div> -->
    
      





      <!-- edit Form -->
     
      <!-- /edit form -->
    </div>
  </div>
</div>





</div>
<!--     <script src="<?php echo base_url();?>assets/js/quill.js" type="text/javascript" ></script>
 -->



<div id="tableModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width:800px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Table</h4>
      </div>
      <div class="modal-body">
                        <form id="col-form">



            <div class="row" id="define-cols-div" style="">
                <div class="col-lg-12" id="col-div" style="">
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Table Name</label>
                            <input type="text" class="form-control" name="table_name" placeholder="Enter Name" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Columns</label>
                            <input type="text" class="form-control numberonly col_no" name="col_no" value="" placeholder="Enter Width" required>
                        </div>
                    </div>

                      <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Left Name</label>
                            <input type="text" class="form-control " name="left_name" value="" placeholder="Enter Width" required>
                        </div>
                    </div>


                        <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Right Name</label>
                            <input type="text" class="form-control " name="right_name" value="" placeholder="Enter Width" required>
                        </div>
                    </div>

                </div>

                        <div class="col-md-12" id="col_appnd_div" style="">




                       </div>





            </div>
          </form>





<!--  -->
   <!--      <form id="col-form">
            <input type="hidden" name="qt_id" class="qt_id1">
            <div class="row" id="define-cols-div" style="display:none;">
                <div class="col-lg-12" id="col-div" style="display:flex;">
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Column Name</label>
                            <input type="text" class="form-control" name="col_name[]" placeholder="Enter Name" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Column Width</label>
                            <input type="text" class="form-control numberonly" name="col_width[]" value="" placeholder="Enter Width" required>
                        </div>
                    </div>
                </div>
            </div>
        </form> -->
        <input type="hidden" id="row-data">
        <div id="row-data-edit" style="display: none;"></div>
        <form id="row-form">
            <input type="hidden" name="cols" id="cols">
            <!-- <input type="hidden" name="qt_id" class="qt_id"> -->
             <input type="hidden" name="tab_id" class="tab_id">
<!--              <input type="hidden"  value="<?php echo $question['question_id'];?>" name="qt_id" class="qt_id">
 -->             
            <div class="row" id="define-row-div" style="display:none;">

            </div>
        </form>
      </div>
      <div class="modal-footer">
        <div id="btn-one">
            <button type="button" id="cancel-qt-btn" class="btn btn-default">Cancel</button>
                        <button type="button" id="create-tbl-btn" class="btn btn-info">Create</button>

            <button type="button" id="add-ans-btn" class="btn btn-info" data-id="">Add Values</button>
        </div>
        <!-- <div id="btn-two" style="display:none;">
            <button type="button" id="prev-qt-btn" class="btn btn-default">Prev</button>
            <button type="button" id="add-col-btn" class="btn btn-info">Next</button>
        </div> -->
        <div id="btn-three" style="display:none;">
<!--             <button type="button" id="prev-col-btn" class="btn btn-default">Prev</button>
 -->            <button type="button" id="remove-qtable-btn" class="btn btn-warning">Cancel</button>
            <button type="button" id="add-ans_tbl-btn" class="btn btn-info add-ans-save">Save</button>
        </div>
      </div>
    </div>

  </div>
</div>


<div id="getModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 800px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Question</h4>
      </div>
      <div class="modal-body">
        <div class="row ">
                    <div class="col-md-12 col-lg-12" style="">

          <textarea  rows="4" cols="6" class="form-control quest-input" name="question[]" placeholder="Enter Transactions question" ></textarea>

          </div>



          <div class="col-md-13 col-lg-12" style="display: flex;">
                      <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Option 1</label>
                            <input type="text" class="form-control" name="table_name" id="option1" placeholder="Enter Name" >
                          <input type="hidden" class="form-control" name="table_type" placeholder="Enter Name" value="format" required>

                        </div>
                      </div>


                        <div class="col-md-6 col-lg-6">

                          <div class="form-group">
                            <label class="form-label">Option 2</label>
                            <input type="text" class="form-control " name="col_no" id="option2" value="" placeholder="Enter Width" >
                        </div>
                         </div>
                    </div>


                    <div class="col-md-13 col-lg-12" style="display: flex;">
                      <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Option 3</label>
                            <input type="text" class="form-control" name="table_name" id="option3" placeholder="Enter Name" >
                          <input type="hidden" class="form-control" name="table_type" placeholder="Enter Name" value="format" >

                        </div>
                      </div>


                        <div class="col-md-6 col-lg-6">

                          <div class="form-group">
                            <label class="form-label">Option 4</label>
                            <input type="text" class="form-control " name="col_no" id="option4" value="" placeholder="Enter Width" >
                        </div>
                         </div>
                    </div>


                    <div class="col-md-6 col-lg-6">

                          <div class="form-group">
                            <label class="form-label">Answer</label>
                            <select class="form-control " name="col_no" id="correct_ans">
                              <option value="option1">Option1</option>
                               <option value="option2">Option2</option>
                                <option value="option3">Option3</option>
                                 <option value="option4">Option4</option>
                            </select>
                        </div>
                         </div>






            
        </div>
      </div>
      <div class="modal-footer">
                              <input type="hidden" class="" name="" id="type" value="">
                              <input type="hidden" class="" name="" id="val_id" value="">
                              


      <!--   <button type="button" id="add_qst_table_val" class="btn btn-info add_qst_table_val" data-id="">Add</button> -->
         <button type="button" id="add_inter_qst" class="btn btn-info add_inter_qst" data-id="">Save</button>
      </div>
    </div>

  </div>
</div>


<div id="getModal-header" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 800px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title custom-title">Add Header</h4>
      </div>
      <div class="modal-body">
        <div class="row ">
                    <div class="col-md-12 col-lg-12" style="">


                       <div class="headenote quest-input-header" id="headenote" data-id="0" style="height: 150px;">
                                
                              </div>
                    <textarea name="header_note" id="header_note" class="editor_content" style="display: none;" required></textarea>

         <!--  <textarea  rows="4" cols="6" class="form-control quest-input-header" name="question[]" placeholder="Enter  Question" ></textarea> -->

          </div>



         


                    


                   






            
        </div>
      </div>
      <div class="modal-footer">
                              <input type="hidden" class="" name="" id="type-header" value="">
                              <input type="hidden" class="" name="" id="table_id_header" value="">
                              


      <!--   <button type="button" id="add_qst_table_val" class="btn btn-info add_qst_table_val" data-id="">Add</button> -->
         <button type="button" id="add_answer_header" class="btn btn-info add_answer_header" data-id="">Save</button>
      </div>
    </div>

  </div>
</div>


<?php for ($i=0; $i <=10 ; $i++) { 
  ?>
        <div id="editModal<?=$i;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Sub Tables</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="form-group">
                    <label class="form-label">No columns</label>
                      <input type="text" class="form-control count_sub" name="count_sub<?=$i;?>" id="count_sub<?=$i;?>" placeholder="Enter No of Columns" data-id="<?=$i;?>">
                </div>

                <div class="column_width_div<?=$i;?>">

                
                </div>
              
            
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="add_subtable_btn" class="btn btn-info add_subtable_btn" data-id="<?=$i;?>">Add</button>
      </div>
    </div>

  </div>
</div> 
<?php }  ?>
<script type="text/javascript">
 var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote', 'code-block'],

  [{ 'header': 1 }, { 'header': 2 }],               // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  [{ 'direction': 'rtl' }],                         // text direction

  [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  [{ 'font': [] }],
  [{ 'align': [] }],

  ['clean']                                          // remove formatting button
  ];

 

  var quill = new Quill('.headenote', {
    theme: 'snow',   // Specify theme in configuration
    modules: {
      // Equivalent to { toolbar: { container: '#toolbar' }}
          toolbar: toolbarOptions

    }
  });

 

 








  $(document).on('click',".add-type",function (e) {

  alert($("#choose_type option:selected" ).val());
  

  if($("#choose_type option:selected" ).val()=="0"){
       
       
  }else if($( "#choose_type option:selected" ).val()=="1"){
        $('.add_table').show();
        $('.text-box').hide();

    
    $('.add_table').show();

  }else if($( "#choose_type option:selected" ).val()=="2"){

  }



        // Allow: backspace, delete, tab, escape, enter and .
        // if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
        //     // Allow: Ctrl+A, Command+A
        //     (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
        //     // Allow: home, end, left, right, down, up
        //     (e.keyCode >= 35 && e.keyCode <= 40)) {
        //     // let it happen, don't do anything
        //     return;
        // }
        // // Ensure that it is a number and stop the keypress
        // if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        //     e.preventDefault();
        // }
    });


  

//   $(document).on('click',".rec-start",function (e) {

// alert('ggggggg');
//     });

  function add_order(e){


          // var val=$(e).val();
                       //var domElement =$(e.target);
                      // console.log($('.rec-start').html());

          //     //$(this).addClass('row-minus-btn');
          $('.rec-start').attr('onclick','end_order()');
                    $('.rec-start').html('End');




           // $('.rec-start').html('<button type="button" id="add-ans-btn" class="buttons btn-info rec-start" onclick="end_order(this);" data-id="" style="padding-left: 2px;padding-left: 2px;background: #4f8410;color: white;">End</button>');
    $('#start-order').val(1);



    }


    function end_order(e){
      var f=$(e);

       var ans=$('#order-answer').val();
        var anscol=$('#order-answer-col').val();
              var qst=$('#order-qst').val();

       var prblm=$('#order-prblm').val();
       var trans=$('#order-trans').val();
       
       var m=0;
       $('.order-list').each(function (index, value) {
       //$(this).removeClass('active');
       m++;

    });
       var h=m+1;
       //console.log();
   


          $.ajax({
                        url:base_url+'add-problem-order',
                        type:'post',
                        data:{ans:ans,qst:qst,prblm:prblm,anscol:anscol,trans:trans},
                        success: function(out){
                            var out = JSON.parse(out);
                            if(out.status == 1){



                                if(out.order){

                                  var htm='<a href="#" class="buttons order-list"  style="background:palegreen;" data-qst="'+qst+'" data-ans="'+ans+'" data-anscol="'+anscol+'"  data-trans="'+trans+'"  data-prblm="'+prblm+'">'+h+'</a>';
                                  $('.append-order').append(htm);
                                  $('#order-answer').val(0);
                                  $('#order-qst').val(0);
                                  $('#order-prblm').val(0);
                                  $('#start-order').val(0);
                                                                    $('#order-trans').val(0);


                                  $('.rec-start').attr('onclick','add_order()');
                    $('.rec-start').html('Start');


                    $(".problem-tr").each(function(){

                                  $(this).css('background','white');


                                  });
                    $(".trans-tr").each(function(){

                                  $(this).css('background','white');
                                  $(this).find('.disc_val').css('background','white');


                                  });

                    $(".input-ans").each(function(){

                                  $(this).css('background','white');


                                  });
                    $(".trans").each(function(){

                                  $(this).css('background','none');


                                  });

                     $(".ans-val").each(function(){

                                  $(this).css('background','white');


                                  });

                                 // f.html('Start');
                                  






                                    //alert(out.answer_id);
                                 //    var id=out.answer_id;
                                 // form.attr("data-answer",id);
                                 // parent.attr("data-answer",id);




                                }

                              
                            }
                            else{
                                alert('Oops something went wrong! Please try again');
                            }
                        }
                    })


         // $('.rec-start').html('<button type="button" id="add-ans-btn" class="buttons btn-info rec-start" onclick="end_order();" data-id="" style="padding-left: 2px;padding-left: 2px;background: #4f8410;color: white;">End</button>');
    }


    

    $(document).on('click',".create_table",function (e) {

      $('#tableModal').show();

    });

    function autosave_values(e){

      //alert($(e).val());
      var val=$(e).val();
            var row=$(e).data('column');

             var column=$(e).data('column');
             var row=$(e).data('row');
            var table_id=$(e).data('table');




        $.ajax({
            url:base_url+'add-answer-table-val',
            type:'post',
            data:{val:val,column:column,row:row,table_id:table_id },
            success: function(out){
                var out = JSON.parse(out);
                if(out.status == 1){

                    // $('.qt_id'+q_id+'').val(out.data);
                    // $('.qt-tabl-name'+q_id+'').html(name);
                    // $('#cols'+q_id+'').val(nos);

                    // var html = $('#col-div'+q_id+'').html();
                    // for(var i=0;i<nos-1;i++){
                    //     $('#col-div'+q_id+'').after('<div class="col-lg-12" style="display:flex;">'+html+'</div>');
                    // }
                    // $('#define-table-div'+q_id+'').hide();
                    // $('#btn-one'+q_id+'').hide();
                    // $('#define-cols-div'+q_id+'').show();
                    // $('#btn-two'+q_id+'').show();
                }
                else{
                    alert('Oops something went wrong! Please try again');
                }
            }
        })

        }


       // $(document).ready( function() {

            
            // });

   //            $(".table-qst").on("click", "td", function() {
   //   alert($( this ).text());
   // });


   




     $(document).on('focusout',".col_no",function (e) {
      var num=$(this).val();

          //  alert(num);

      var html='';

      for (var i = 0; i <
       num; i++) {

        html+='<div class="col-md-12" style="display: flex;" ><div class="col-md-3 col-lg-3"><div class="form-group"><label class="form-label">Column  Name</label> <input type="text" class="form-control col_name" name="column_name'+i+'" id="column_one_name" placeholder="Enter Column Name"></div></div>'+
        '<div class="col-md-3 col-lg-3"><div class="form-group"><label class="form-label">Column  Width</label><input type="text" class="form-control numberonly col_width" name="column_width'+i+'" id="column_width'+i+'" placeholder="Enter Column Width" required></div></div><div class="col-md-3 col-lg-3"><div class="form-group" style="height:65px"><label class="form-label">Calculate Sum</label><label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px"><input type="checkbox" class="custom-control-input column-check" name="column_check'+i+'" id="column_one_check"><span class="custom-control-label">Check</span></label></div></div><div class="col-md-3 col-lg-3">'+
                '<div class="form-group" style="height:65px">'+
                  '<label class="form-label">Create Sub table</label>'+
                  '<label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">'+
                    '<input type="checkbox" class="custom-control-input sub-tab" name="column_sub_check'+i+'" id="column_sub_one_check"  data-id="1">'+

                    '<input type="hidden" class="form-control count_sub_col'+i+'" name="count_sub_'+i+'_column" id="count_sub_one_column" placeholder="Enter No of Columns" >'+
                    '<div id="sub_width'+i+'"></div>'+
                    '<span class="custom-control-label"></span>'+
                  '</label></div></div></div>';
        

         


      }

      $('#col_appnd_div').html(html);

      //$('#tableModal').show();



    });


     $(document).on('click','.order-delete',function(e){
    e.preventDefault();
    var id = $(this).attr('data-orderid');
   // alert('hhhhhj');
   

//alert('hhhhhj');

    $.confirm({
        title: 'Confirm delete!',
        content: 'Cant be reversed!',
        buttons: {
            confirm: function () {
                $.ajax({
                    type:'post',
                    url:base_url+'delete-ans-order',
                    data:{id:id},
                    success: function(out){
                        var out = JSON.parse(out);
                        if(out.status == 404){
                            window.location.href = base_url;
                        }
                        else if(out.status == 1){
                             window.location.reload();
                            //evnt.parent().parent().remove();
                           // $("ul[data-slide='" + current +"']");


                        }
                        else{

                        }
                    }
                })
            },
            cancel: function () {
                console.log('Cancelled!');
            }
        }
    });
})


          $(document).on('click','.delete_answer',function(e){
    e.preventDefault();
    var id = $(this).attr('data-table');
//alert('hhhhhj');
    $.confirm({
        title: 'Confirm delete!',
        content: 'Cant be reversed!',
        buttons: {
            confirm: function () {
                $.ajax({
                    type:'post',
                    url:base_url+'delete-ans-table',
                    data:{id:id},
                    success: function(out){
                        var out = JSON.parse(out);
                        if(out.status == 404){
                            window.location.href = base_url;
                        }
                        else if(out.status == 1){
                             window.location.reload();
                            //evnt.parent().parent().remove();
                           // $("ul[data-slide='" + current +"']");


                        }
                        else{

                        }
                    }
                })
            },
            cancel: function () {
                console.log('Cancelled!');
            }
        }
    });
})



     $(document).on('click','.copy-excel',function(){
        var table = $(this).data('table');
                        $('#copy-excel-stat[data-table="'+table+'"]').val(1);

                        $(this).text('Save');
$(this).removeClass('copy-excel');
$(this).addClass('save-excel');

               // $('.ans-val[data-table="'+table+'"]').each(function(e){
               //  console.log('dddd');
                
               //      // $(this).removeClass('ans-val'); 
               //      // $(this).addClass('ans-val-excel');



               // })


 

})




          $('.row_ans').on('paste', 'input', function(e){
      var $this = $(this);
      $.each(e.originalEvent.clipboardData.items, function(i, v){

                     console.log(e.originalEvent.clipboardData.items);

          if (v.type === 'text/plain'){
              v.getAsString(function(text){
                  var x = $this.closest('td').index(),
                      y = $this.closest('.ans-row').index()-1,
                      obj = {};


//console.log($this.closest('table').find('tr:eq('+row+') td:eq('+col+')').html());


                  text = text.trim('\r\n');
                  $.each(text.split('\r\n'), function(i2, v2){
                      $.each(v2.split('\t'), function(i3, v3){
                          var row = y+i2, col = x+i3;
                                              console.log(row);
                                               console.log(v2);
                                               console.log(col);


                          obj['cell-'+row+'-'+col] = v3;

                          console.log($this.closest('table').find('.tr-quest:eq('+row+') td:eq('+col+')').html());

                          $this.closest('table').find('.ans-row:eq('+row+') td:eq('+col+') input').val(v3);
                      });
                  });

              });
          }
      });
      return false;

  });


    

        $(document).on('click','.save-excel',function(e){
           var table = $(this).data('table');
             var question_id=$('#question_id').val();


            var arr = [];

                   $('.ans-val[data-table="'+table+'"]').each(function(e){

                    var input=$(this).val();
                    var column=$(this).data('column');
                    var row=$(this).data('row');
                    var sub=$(this).data('sub');
                  


                      if($(this).hasClass('sub-tab-tr')){
                        var substat=1;

                        }else{
                        var substat=0;

                        }

                     arr.push({
                     val: input, 
                    column:  column,
                    row:  row,
                    sub:  sub,
                    substat:substat,
                          });


                    });



                 //  console.log(arr);


        $.ajax({
            url:base_url+'add-copy-excel-answer',
            type:'POST',
            data:{array:arr,table:table,question_id:question_id},
            
            success: function(out){
                var out = JSON.parse(out);
                if(out.status==1){
                  var table_id=out.data;
//console.log(table_id);
                  // $('#add-ans-btn').data(out);
                  // var table_id=out.data;
                 // $('#add-ans-btn').data('id', table_id);
                  // create-tbl-btn
                                   // $('.tab_id').val(table_id);




                  
                                   // $('#add-ans-btn').data('id', table_id);



                  alert('Values added successfully');

                 // window.location.reload();
                 
            
                }
                else{
                    alert('Oops something went wrong!');
                }
            }
        })



            });







   // $(document).on('keypress','#input-field',function(e){

    



      
           // $(this).parent().css('background','#a4c89c');



    //         if(e.keyCode == 13){
    //           alert("hjdhshjds");

    //             //var val = $.trim($(this).val());
    //             var val1 = $(this).val();
    //             var parent = $(this).parent();

    //               if(!$.isNumeric(val1)) {
    //               var val=val1;
    //               }else{

    //               if($(this).hasClass('number')){

    //               var val= val1
    //               .replace(/\D/g, "")
    //               .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    //               ;
    //               }else{
    //                  var val=val1;

    //               }
    //               }


    //              var width = $(this).width();
    //              var height = $(this).height();

    //              if($(this).hasClass('td_line')){
    //               var class1="td_line";
    //              }else{
    //               var class1="";
    //              }

    //             if($(this).hasClass('u_line')){

    //               if(parent.hasClass('sub_table')){
    //               var htm='<li class="disc '+class1+'" draggable="true" style="white-space: pre;border:none;text-decoration:underline;text-underline-position: under;">'+val+'</li>' ;


    //             }else if(parent.hasClass('sub_table_fixed')){
    //               var htm='<li class="disc '+class1+'" draggable="true" style="white-space: pre;border:none;text-decoration:underline;text-underline-position: under;">'+val+'</li>' ;


    //             }else{

    //              var htm='<li class="disc u_line '+class1+'" draggable="true" style="white-space: pre;text-decoration:underline;text-underline-position: under;">'+val+'</li>' ;

    //             }
                   
    //             }
    //             else{
    //               if(parent.hasClass('sub_table')){
    //               var htm='<li class="disc '+class1+'" draggable="true" style="white-space: pre;border:none;">'+val+'</li>' ;


    //             }else if(parent.hasClass('sub_table_fixed')){
    //               var htm='<li class="disc '+class1+'" draggable="true" style="white-space: pre;border:none;">'+val+'</li>' ;


    //             }else{
    //               var htm='<li class="disc '+class1+'" draggable="true" style="white-space: pre;">'+val+'</li>' ;

    //             }
  
    //             }



    // if(val) parent.html(htm);
    //             else parent.html('');
    //             parent.addClass('empty');
    //            // parent.addClass('dim_bg');
                

    //         }


       //      if(e.altKey && e.keyCode == 85){
              
       //        $(this).parent().toggleClass('line');
       //      }

       //       if(e.altKey&&e.keyCode == 87){
              
       //        $(this).toggleClass('u_line');
       //      }

            
       //     if(e.altKey && e.keyCode == 68){
       //      if($(this).parent().hasClass('d_line')){

       //          $(this).parent().removeClass('d_line'); 
       //      }else{
       //           $(this).parent().addClass('d_line');
       //      }
       //        // $(this).parent().css('border-bottom-width','6px'); 
       //        // $(this).parent().css('border-bottom-style','double'); 
       //        // $(this).parent().css('border-bottom-color','#092035a6');
            
       //      }


       //      if(e.altKey && e.keyCode == 66){
       //          // var val = $.trim($(this).val());
       //          var parent = $(this).parent();
       //          //console.log($(this).parent().addClass('total'));
       //          $(this).css('background','none');

       //         if($(this).parent().hasClass('bg_blue')) {
       //           $(".change_bg_red").trigger("click");
       //           return false;
       //           }else if($(this).parent().hasClass('bg_red')){
       //             $(".change_bg_black").trigger("click");
       //             return false; 
       //           }
       //           else if($(this).parent().hasClass('bg_black')){
       //             $(".change_bg_none").trigger("click");
       //             return false; 
       //           }else{
       //              $(".change_bg_blue").trigger("click");
       //             return false; 
       //           }
       //          // if(val) parent.html('<li class="disc" draggable="true" style="">'+val+'</li>');
       //          // else parent.html('');
       //          // parent.addClass('empty');

       //       }
       //      //else{
       //      //     $(this).css('background','#a4c89c');
       //      // }
       // var container=$(this);




       //      $('.itemconnect').sortable().bind('dragend', function (e) {
       //          //console.log(Math.random());
       //          refresh_result();
       //      });
      //  }


  

 
</script>


