
    <link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.snow.css">
<!--         <link href="<?=base_url()?>assets/css/select2.min.css" rel="stylesheet" />
 -->





<style type="text/css">
  
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


 .tabs-new {
  display: flex;
  flex-wrap: wrap; // make sure it wraps
}

.tabs-new li {
  order: 1; // Put the labels first
  display: block;
  padding: 10px;
/*  padding: 1rem 2rem;
*/  margin-right: 0.2rem;
  cursor: pointer;
  background: #104861;
  font-weight: bold;
  transition: background ease 0.2s;
  list-style: none;
}

.tabs-new .tab {
  order: 99; // Put the tabs last
  flex-grow: 1;
  width: 100%;
  display: none;
  padding: 1rem;
  background: #fff;
}
.tabs-new input[type="radio"] {
  display: none;
}
.tabs-new input[type="radio"]:checked + label {
  background: #fff;
}
.tabs-new input[type="radio"]:checked + label + .tab {
  display: block;
}

.add_question_div{
  background: #607d8b87;
}

.acive-tab{
background: #ff9800ab  !important;
}
.active-main-tab{
background: #5ba015 !important;
}
.no-data{
  color: white;
}

.searchTerm {
  width: 80%;
  border: 3px solid #fdeb10de;
  border-right: none;
  padding: 5px;
  height: 36px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color: #eabb10de;
}

.searchTerm:focus{
  color: #00B4CC;
}


/*.disc{
  mso-number-format:General;
}*/
.excel-input{
  mso-number-format:"\@";/*force text*/
}

.searchButton {
  width: 40px;
  height: 36px;
  border: 1px solid #fdeb10de;
  background: #fdeb10de;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}


div[class*="key-tags-1"] {
  display: none;
}

div[class*="key-tags-2"] {
  display: none;
}

.type-problem{
  list-style-type: none;
}



  .line{
  border-bottom-width: 2px !important;
  border-bottom-style: solid !important;
  border-bottom-color: #000000a6 !important;
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
    }

    .table-header{
text-align: center;
      }

    .table-qst td{
cursor: pointer;
   border-right: 1px solid #999;
    border-bottom: 1px solid #868e96;
    border-left: 1px solid #868e96;
    }

    .select2-container .select2-selection--single {
      height: 35px;
    }


[contenteditable]:focus {
    outline: 0px solid transparent;
}

/*.tox:not([dir=rtl]) {
    direction: ltr;
    text-align: left;
    outline: 0 !important;
    border: none;
}*/

  /*  .select2-container{
      height: 35px;

    }*/
/*.not-full{
  display: none !important;
}*/

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

 <script src="https://cdn.tiny.cloud/1/jrsjj47h3k9y6272lmftp2j56agyzl6a86u1fvt8n8bzbxvw/tinymce/5/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>




<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
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
            <ul class="tabs" style="margin-left: 277px;">


                            <li class="active-main-tab"><a  style="color: white;" class="main-tab-qst  "  href="#">Question</a></li>
                                        

                            <li><a style="color: white;" class="main-tab-pr" href="#">Problem Format</a></li>

                            <li><a style="color: white;" target="_blank" class="main-tab-ans"  href="<?=base_url('answers-preview/'.$questionid)?>">Answer</a></li>


            </ul>


 <div class="" style="    border: 1px solid black;">



      <div class="row edit-qst-div" style="margin-right: 76px;">
        <?php
        $qid = $this->uri->segment(2);
        ?>
                        <input type="hidden" name="question_id" id="question_id" value="<?=$qid;?>">


        
         <!-- <textarea rows="4" cols="6" class="form-control tinymce-body" name="transactions[]" placeholder="Enter Name" data-order="" data-type=""></textarea> -->


               <div class="col-lg-12 col-md-12 " style="min-height: 100px;">
                                            </div>
                                            

                                           


<!--               <div class="col-lg-2 col-md-12 " style=""></div>
 -->
    <?php
    $tcount=0;

         foreach($qt_table  as $key1=> $tab_q) {

           $table=$tab_q['qt'];

            $priorit_idss=$tab_q['priority_vals'];
        


           // print_r($priorit_idss);
        foreach ($priorit_idss as $key => $priorit_ids) {

          //print_r($tab_q['transactions']);exit();


            if($priorit_ids==1){

            if(!empty($tab_q['qt_text']['text_val'])){


            ?>



<div class="col-lg-2 col-md-6 " style=""></div>
                 <div class="col-md-12 col-lg-10 text-box edit-textbox" data-id="0" >
                  <div class="form-group">
                    <label class="form-label">Text</label>
          

                    <div class="editor_<?=$tcount?>" id="product_description_div" data-id="<?=$tab_q['qt_text']['order_id'];?>" style="height: 103px;">
                      <?=$tab_q['qt_text']['text_val'];?>
                    </div>
                    <textarea name="product_description" id="text_qst" class="editor_content" style="display: none;" required><?=$tab_q['qt_text']['text_val'];?></textarea>
                    <input type="hidden" class="order-quill" value="0" >
                  </div>
                </div>



                 <?php
$tcount++;
                   }
                   } ?>




                 <!--  <div class="col-md-12 col-lg-8" class="qst-table" style="display: none">
                  <div class="form-group">
                    <label class="form-label">Description</label>
                    <div class="editor" id="product_description_div" style="height: 250px;"></div>
                    <textarea name="product_description" class="editor_content" data-id="0" style="display: none;" required></textarea>
                  </div>
                </div> -->


               <!--  <table class="table-qst1">
  <thead>
      <tr>
      <th>Product Code</th>
      <th>Item Name</th>
      <th>Long Description></th>
      <th>Material</th>
      <th>Style</th>
      </tr>
  </thead>
  <tbody  id="table">
    <tr id="row">
      <td><textarea id="productId"></textarea></td>
      <td><textarea id="itemname"></textarea></td>
      <td><textarea id="long"></textarea></td>
      <td><textarea id="fabric"></textarea></td>
      <td><textarea id="style"></textarea></td>
      </tr>
    <tr id= "newRow0">
      <td><textarea id="productId0"></textarea></td>
      <td><textarea id="itemname0"></textarea></td>
      <td><textarea id="long0"></textarea></td>
      <td><textarea id="fabric0"></textarea></td>
      <td><textarea id="style0"></textarea></td>
    </tr>
  </tbody>
</table> -->









<?php
  if($priorit_ids==2){
  ?>
                      <div class="col-lg-3 col-md-12 " style=""></div>


                       <div class="col-lg-8 col-md-12 add_table-edit question-area" style="">
                        

                         <?php
                                  $table=$tab_q['qt'];
                                  //$table_id=$tab_q['table_id'];
                                  ?>


                                 

                         <?php



                                    $cols = $table['table_columns'];
                                    $cols_name = array($table['column_one_name'],$table['column_two_name'],$table['column_three_name'],$table['column_four_name'],$table['column_five_name'],$table['column_six_name'],$table['column_seven_name'],$table['column_eight_name'],$table['column_nine_name'],$table['column_ten_name'],$table['column_eleven_name'],$table['column_twelve_name'],$table['column_thirteen_name'],$table['column_fourteen_name'],$table['column_fifteen_name']);
                                    $cols_width = array($table['column_one_width'],$table['column_two_width'],$table['column_three_width'],$table['column_four_width'],$table['column_five_width'],$table['column_six_width'],$table['column_seven_width'],$table['column_eight_width'],$table['column_nine_width'],$table['column_ten_width'],$table['column_eleven_width'],$table['column_twelve_width'],$table['column_thirteen_width'],$table['column_fourteen_width'],$table['column_fifteen_width']);
                                    $cols_sum = array($table['column_one_sum'],$table['column_two_sum'],$table['column_three_sum'],$table['column_four_sum'],$table['column_five_sum'],$table['column_six_sum'],$table['column_seven_sum'],$table['column_eight_sum'],$table['column_nine_sum'],$table['column_ten_sum'],$table['column_eleven_sum'],$table['column_twelve_sum'],$table['column_thirteen_sum'],$table['column_fourteen_sum'],$table['column_fifteen_sum']);
                                     $cols_count = array($table['count_one_table'],$table['count_two_table'],$table['count_three_table'],$table['count_four_table'],$table['count_five_table'],$table['count_six_table'],$table['count_seven_table'],$table['count_eight_table'],$table['count_nine_table'],$table['count_ten_table'],$table['count_eleven_table'],$table['count_twelve_table'],$table['count_thirteen_table'],$table['count_fourteen_table'],$table['count_fifteen_table']);


                                      ?>



   <?php 
                                  // print_r($table); 

    if(!empty($tab_q['qt_vals'])){

  ?>
   <a href="javascript:void(0)" data-order="<?=$tab_q['order_id'];?>" data-id="<?=$table['table_id'];?>" class="btn btn-success btn-sm add_row_quest" style="float: right;margin-bottom: 6px;"><i class="fa fa-plus" aria-hidden="true"></i> </a>

    <a href="javascript:void(0)" data-order="<?=$tab_q['order_id'];?>" data-id="<?=$table['table_id'];?>" class="btn btn-success btn-sm copy-excel" style="float: right;margin-bottom: 6px;margin-right: 9px;    background: #2196F3;">Copy</a>


    <a href="javascript:void(0)" data-order="<?=$tab_q['order_id'];?>" data-id="<?=$table['table_id'];?>" class="btn btn-danger btn-sm delete_quest" style="float: right;margin-bottom: 6px;margin-right: 10px;"><i class="fa fa-trash" aria-hidden="true"></i> </a>

<a href="javascript:void(0)" data-order="<?=$tab_q['order_id'];?>" data-id="<?=$table['table_id'];?>" class="btn btn-success btn-sm add_row_qst_all" style="float: right;margin-bottom: 6px;">Add row</a>

                    <input type="text" class="form-control row-count" id="row-count"  data-order="<?=$tab_q['order_id'];?>" data-id="<?=$table['table_id'];?>"  style="width: 28%;
    float: right;" value="" >





                  <div class="col-sm-9 toolbars<?=$key1;?>"></div>  




                                   




 <p class="qt_name_div" style="font-size: 14px;
    text-align: center;
    margin: 3px;
    "><?=$tab_q['quest_table_name'];?></p>
      <p class="qt_name_div" style="font-size: 14px;
    text-align: center;
    margin: 3px;
    "><?=$tab_q['header_note'];?></p>


        <table class="" style="width: 100%;">
        <tr class="table-header">

              <?php

              $cols = $tab_q['qt']['table_columns'];


              $amount_array=array();






              for($i=0;$i<$cols;$i++){



              ?>

              <td width="<?=$cols_width[$i]?>%"><?=$cols_name[$i]?></td>

              <?php

              }

              ?>

        </tr>

        </table>



<table class="table-qst" data-id="<?=$table['table_id'];?>" data-order="<?=$tab_q['order_id'];?>" style="width: 100%;background: white">

<tr class="hidden" data-table="<?=$table['table_id'];?>" style="display:none;">
                                    <?php
                                    $delbtn1='';
                                    for($t=0;$t<$cols;$t++){


  

                                        // if($cols_sum[$t]){

                                        //         if($cols_count[$t]!=0){
                                        //             $class="connected  itemconnect value_".$i." text-right";
                                        //            }else{
                                        //             $class="connected empty itemconnect value_".$i." text-right";
                                        //            }

                                        ?>
                                           <td width="<?=$cols_width[$t]?>%" class="trans-tr" data-name="" data-qst="" data_column="<?=$t?>" data-row="" style="height: 30px"> 

                                        <?php

                                       if($cols_sum[$t]=='1'){


                                         if($cols_count[$t]!=0){
                                                $width=100/$cols_count[$t];
                                                     ?>
                                                
                                                     <table style="width: 100%;">
                                                        <tr>
                                                            <?php 

                                                       



                                          for ($sub=0; $sub <$cols_count[$t] ; $sub++) {

                                            ?>
                                            <td width="<?=$cols_width[$t]?>%" class="trans-tr text-right" data-name=""  data-qst="" style="height: 30px;border-bottom: none;
    border-right: none;
    border-left: none;"> 

                                              <li style="list-style-type: none;"  data-qst="" data-column="<?=$t?>" data-table="<?=$table['table_id'];?>" data-row="" data-sub="<?=$sub?>" class="disc disc_val quest-edit-type-append sub-tab-1 text-right number no-data" draggable="true" style="text-align: right;color: white" >
                                                No data</li>



                                              </td>

                                             <?php  } ?>
                                                         
                                                           
                                                        </tr>
                                                      </table>
                                                   <?php
                                        }else{

                                          if($t==$cols-1){


                                             $delbtn1='<a href="javascript:void(0)" data-row="0" data-table="'.$table["table_id"].'" data-id="6" class="delte-quest-row-btn-append" style="float: right;margin-right: -18px;"><i class="fa fa-trash" aria-hidden="true"></i></a>';



                                          }

                                          ?>


                                           <li style="list-style-type: none;"  data-table="<?=$table['table_id'];?>" data-column="<?=$t?>" data-row=""  data-qst="" class="disc disc_val quest-edit-type-append text-right number no-data" draggable="true" style="text-align: right;color: white" >No data

                                           </li>

                                              <?php echo $delbtn1; ?>

                                       <?php } ?>

                                            </td>
                                        <?php
                                        }
                                        else{

                                             
                                         if($cols_count[$t]!=0){
                                                     $width=100/$cols_count[$t];
                                        ?>
                                                 <table style="width: 100%;">
                                                    <tr>
                                                    <!--    <?php for ($sub=0; $sub <$cols_count[$i] ; $sub++) { 
                                                           ?>
                                                           <td width="<?=$width;?>%" class="sub_table connected">
                                                        
                                                      </td> 
                                                         <?php } ?> -->

                                                            <?php 

                                                       

 // $cols_wid = sizeof($table_width[$i]['column_id']);
                                                        // if($table_width[$i]['column_id'])

           for ($sub=0; $sub <$cols_count[$t] ; $sub++) {

            ?>

                                           

                                        <td width="<?=$cols_width[$t]?>%" class="sub-tab-tr trans-tr" data-name=""  data-qst="" style="height: 30px;border-bottom: none;border-right: none;border-left: none;"> 

                                            <li style="list-style-type: none;"  data-table="<?=$table['table_id'];?>" data-qst="" data_column="<?=$t?>" data-row="" data-sub="<?=$sub?>" class="disc sub-tab-1 disc_val quest-edit-type-append no-data" draggable="true" style="text-align: right;color: white" >
                                              No data</li>   
                                        </td>       

                                               
                                                        
                                                          
                                                        
                                                               
                                                        
                                                         <?php } ?>
                                                    </tr>
                                                  </table>

                                                  <?php
                                        }
else{

                       if($t==$cols-1){


                      $delbtn1='<a href="javascript:void(0)" data-row="0"  data-id="6" data-table="'.$table["table_id"].'" class="delte-quest-row-btn-append" style="float: right;margin-right: -18px;"><i class="fa fa-trash" aria-hidden="true"></i></a>';



                        }

  ?>
   <li style="list-style-type: none;"  data-table="<?=$table['table_id'];?>" data-qst=""data-column="<?=$t?>" data-row="" class="disc quest-edit-type-append disc_val no-data" draggable="true" style="text-align: right;color: white" >

              No data
              

              </li>
               <?php echo $delbtn1; ?>
<?php }

                                        ?>



                                            </td>
                                        <?php
                                        }
                                    }
                                ?>
                            </tr>


                            <!-- hidden tr end -->





<?php

$r = 0;
$delbtn='';
$order_id=$tab_q['order_id'];

//print_r(count($tab_q['qt_vals'])/$cols);


  $cnt=count($tab_q['qt_vals'])/$cols;
  $count=$tab_q['rows'];


                    //  $total = 0;
                    // for ($f = 0; $f < count($cols_count); $f++) {
                    //     $total += $cols_count[$f];
                    //     }

                    //       print_r($total);


                    //     if($total<=0){
                    //       //8cnt=parseInt(pr_values.length)-parseInt(total);
                    //     }
                    //     else{
                    //       $cnt=count($tab_q['qt_vals'])-($total*$cols);

                    //     }



for($i=0;$i<=$count;$i++){
 //print_r($tab_q['qt_vals']);

?>

<tr class="tr-quest">

<?php

for($j=0;$j<$cols;$j++){



      // if($j==$cols-1){
      //                                                $del_btn='<a href="javascript:void(0)" data-row="'+j+'" data-id="6" class="delte-prblem-row-btn" style="float: right;margin-right: -59px;"><i class="fa fa-trash" aria-hidden="true"></i></a>';
      //                                             }       


?>

<!-- <td width="<?=$cols_width[$j]?>%" class="trans-tr main-td" data-name="" data-qst="" style="height: 30px;"> 
 -->

<!-- class="connected empty itemconnect value_<?=$i.$j?>" -->
<?php  if($cols_sum[$j]=='1'){

if($cols_count[$j]!=0){

        ?>


<!-- <table style="width: 100%">
  <tr> -->
                      <?php 
$ids1=array(); 
                   $idsnew=array();
                    $ids=array();  
                 for ($sub=0; $sub <$cols_count[$j] ; $sub++) {
                  $width=$cols_width[$j]/$cols_count[$j];


                  foreach ($tab_q['qt_vals'] as $key => $value1) {
                         // print_r($value1);
              if($value1['col_no']==$j){
                                 if($value1['row_no']==$i){

                                   if($value1['sub_id']==$sub){


                     if(!in_array($value1['val_id'], $idsnew)){

                      array_push($idsnew,$value1['val_id']);

                                                     if($value1['val_status']==1){

                                                      $style55='display:none';


                      }else{

                                                      $style55='';



                         }


}
}
                                  }
                                  }
                                  }
                  ?>

                  <td width="<?=$width?>%" class="trans-tr sub-tab-tr text-right " data-name="" data_id="<?=$r?>" data-qst="" 
                    <?php if($sub==0){ echo 'style="
    
    border-right: none;'.$style55.'"';  }else{ echo 'style="
    border-left: none;
    border-right: none;'.$style55.'"'; } ?> 
 > 

                   <?php 

                      foreach ($tab_q['qt_vals'] as $key => $value1) {
                if($value1['col_no']==$j){

                   if($value1['row_no']==$i){
                       if($value1['sub_id']==$sub){


                     if(!in_array($value1['val_id'], $ids)){

                      array_push($ids,$value1['val_id']);
                                      if(!empty($value1['val_value'])||$value1['val_value']==0){



                                          $val=nl2br($value1['val_value']);
                                          $class1="";
                                        }else{
                                          // $val='No data';
                                          // $class1="no-data";
                                          $val="";;
                                          $class1="";
                                        }



                                         if($value1['col_no']==$cols-1){ 

                     if($value1['sub_id']==$cols_count[$j]-1){

                      $delbtn='<a href="javascript:void(0)" data-row="'.$i.'" data-order="'.$order_id.'" data-table="'.$table["table_id"].'" data-id="6" class="delte-quest-row-btn" style="float: right;margin-right: -18px;"><i class="fa fa-trash" aria-hidden="true"></i></a>';

                       }else{
                          $delbtn='';
                           } 



                  }else{
                          $delbtn='';
                           }


                     if($value1['val_status']==1){
                      break;
                      }

                  

                // echo "nc";
                ?>

                <li style="list-style-type: none;    min-height: 36px;" data-id="<?=$r?>" data-table="<?=$table['table_id'];?>" data-order="<?=$order_id;?>" data-qst="<?=$value1['val_id']?>" class="disc disc_val quest-edit-type edit-type<?=$key1?> sub-tab-1 text-right number <?=$class1?>" draggable="true" style="text-align: right;" >

                <?=$val?>
                


                </li>
                <?=$delbtn?>


                <?php 

                break;
                } 

                } 
              }
                }



                }



                ?>
                </td>


                <?php } ?>
   
  <!--    
  </tr>
</table> -->



            

   <?php  }else{


     foreach ($tab_q['qt_vals'] as $key => $value1) {
                         // print_r($value1);
              if($value1['col_no']==$j){
                                 if($value1['row_no']==$i){

                                                     if($value1['val_status']==1){

                                                      $style55='display:none';


                      }else{

                                                      $style55='';



                         }



                                  }
                                  }
                                  }
    ?>

     <td width="<?=$cols_width[$j]?>%" class="trans-tr main-td" data-name="" data-qst="" style="height: 30px;<?php echo $style55;?>"> 

      <?php
 



$delbtn='';

                   foreach ($tab_q['qt_vals'] as $key => $value1) {

                       /// print_r($value1); 

                      if($value1['col_no']==$j){
                         if($value1['row_no']==$i){

                          


                         if($value1['val_underline']=='1'){


                                                     $class="line";
                                                    // $style1="display: none;border: none;border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: black;";
                                                }else{
                                                     $class="";
                                                      // $style1="display: none;border: none";
                                                }


                                     if(!empty($value1['val_value'])||$value1['val_value']==0){

                                          $val=nl2br($value1['val_value']);
                                          $class1="";
                                        }else{
                                          // $val='No data';
                                          // $class1="no-data";
                                           $val="";;
                                          $class1="";
                                        }


                                   if($value1['col_no']==$cols-1){  
                                   $delbtn='<a href="javascript:void(0)" data-row="'.$i.'" data-order="'.$order_id.'" data-table="'.$table["table_id"].'" data-id="6" class="delte-quest-row-btn" style="float: right;margin-right: -18px;"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                   } else{
                                          $delbtn='';
                                        }  


 if($value1['val_status']==1){
                      break;
                      }


                      // echo "nc";
                      ?>
                      <li style="list-style-type: none;    min-height: 36px;" data_id="<?=$r?>" data-table="<?=$table['table_id'];?>"  data-qst="<?=$value1['val_id']?>" data-order="<?=$order_id;?>" class="disc disc_val quest-edit-type edit-type<?=$key1?> text-right number <?=$class;?> <?=$class1;?>" draggable="true" style="text-align: right;" >

                      <?=$val?>


                      </li>

                      <?php echo $delbtn;?>

                      <?php } 
                      }



                      }


  ?>          
</td>
    <?php }



} 
else{




// print_r('ggfg');

          if($cols_count[$j]!=0){

      



                  ?>


       <!--    <table style="width: 100%">
            <tr> -->
                <?php 

           //  $style55='';

                $ids1=array(); 
                $ids=array();  
                $idsnew=array();

           for ($sub=0; $sub <$cols_count[$j] ; $sub++) {
            $width=$cols_width[$j]/$cols_count[$j];

                       foreach ($tab_q['qt_vals'] as $key => $value12) {
                         // print_r($value1);
              if($value12['col_no']==$j){
                                 if($value12['row_no']==$i){

                                   if($value12['sub_id']==$sub){


                     if(!in_array($value12['val_id'], $idsnew)){

                      array_push($idsnew,$value12['val_id']);

                                                     if($value12['val_status']==1){

                                                      $style55='display:none';


                      }else{

                                                      $style55='';



                         }


}
}
                                  }
                                  }
                                  }
            ?>

             <td width="<?=$width?>%" class="sub-tab-tr trans-tr" data-name="" data_id="<?=$r?>" data-qst="" <?php if($sub==0){ echo 'style="
    
    border-right: none;'.$style55.'"'; }else{ echo 'style="
    border-left: none;
    border-right: none;'.$style55.'"'; } ?>> 

              <?php 
                 
           $g=0;
           $delbtn='';
          // print_r($tab_q['qt_vals']);
          foreach ($tab_q['qt_vals'] as $key => $value1) {
          if($value1['col_no']==$j){
             if($value1['row_no']==$i){
              if($value1['sub_id']==$sub){
             
               

              if(!in_array($value1['val_id'], $ids)){
              // if($g==$sub){


              array_push($ids,$value1['val_id']);


                       if(!empty($value1['val_value'])||$value1['val_value']==0){

                                          $val=nl2br($value1['val_value']);
                                          $class1="";
                                        }else{
                                          // $val='No data';
                                          // $class1="no-data";

                                           $val="";;
                                          $class1="";
                                        }
                                        
// print_r($delbtn);

                 if($value1['col_no']==$cols-1){ 
                  //print_r($cols-1);

                     if($value1['sub_id']==$cols_count[$j]-1){

                      $delbtn='<a href="javascript:void(0)" data-row="'.$i.'" data-order="'.$order_id.'"  data-table="'.$table["table_id"].'" data-id="6" class="delte-quest-row-btn" style="float: right;margin-right: -18px;"><i class="fa fa-trash" aria-hidden="true"></i></a>';

                     }else{
                          $delbtn='';
                         }  



                  }else{
                                          $delbtn='';
                                        }



                      //                    if($value1['val_status']==1){
                      // break;
                      // } 



            

          // echo "nc";
          ?>
          <li style="list-style-type: none;    min-height: 36px;" data_id="<?=$r?>" data-order="<?=$order_id;?>" data-table="<?=$table['table_id'];?>" data-qst="<?=$value1['val_id']?>" class="disc sub-tab-1 disc_val quest-edit-type edit-type<?=$key1?> <?=$class1?>" draggable="true" style="text-align: right;" >

          <?=$val?>
         



          </li>
           <?=$delbtn?>


          <?php

          break;
          }  
          } 
          }
        }



          }
          ?>

          </td>

          <?php  } ?>
             
               
          <!--   </tr>
          </table> -->



            

   <?php  }else{


    foreach ($tab_q['qt_vals'] as $key => $value1) {
                         // print_r($value1);
              if($value1['col_no']==$j){
                                 if($value1['row_no']==$i){

                                                     if($value1['val_status']==1){

                                                      $style55='display:none';


                      }else{

                                                      $style55='';



                         }



                                  }
                                  }
                                  }



    ?>


     <td width="<?=$cols_width[$j]?>%" class="trans-tr main-td" data-name="" data-qst="" style="height: 30px;<?php echo $style55?>"> 

      <?php
      //modifiii


                        foreach ($tab_q['qt_vals'] as $key => $value1) {
                         // print_r($value1);
              if($value1['col_no']==$j){
                 if($value1['row_no']==$i){

                    if($value1['val_underline']=='1'){



                                             $class="line";

                                            // $style1="display: none;border: none;border-bottom-width: 2px;border-bottom-style: solid;border-bottom-color: black;";
                                        }else{
                                             $class="";
                                              // $style1="display: none;border: none";
                                        }



                                    
                                          if(!empty($value1['val_value'])||$value1['val_value']==0){

                                           

                                          $val=nl2br($value1['val_value']);
                                          $class1="";

                                        }else{
                                          // $val='No data';
                                          // $class1="no-data";
                                           $val="";;
                                          $class1="";
                                        }


                                        if($value1['col_no']==$cols-1){  
                                   $delbtn='<a href="javascript:void(0)" data-row="'.$i.'" data-order="'.$order_id.'"  data-id="6" data-table="'.$table["table_id"].'" class="delte-quest-row-btn" style="float: right;margin-right: -18px;"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                   } else{
                                          $delbtn='';
                                        } 


                                         if($value1['val_status']==1){
                      break;
                      }

                

              // echo "nc";
              ?>
              <li style="list-style-type: none;    min-height: 36px;" data_id="<?=$r?>" data-order="<?=$order_id;?>" data-table="<?=$table['table_id'];?>"  data-qst="<?=$value1['val_id']?>" class="disc quest-edit-type edit-type<?=$key1?> disc_val <?=$class;?> <?=$class1;?>" draggable="true" style="text-align: right;" >

              <?=$val?>

 
              </li>
              <?=$delbtn?>

              <?php } 
              }



              }
?>
</td>
<?php
            

     }


}

?>
 <!-- <script src="https://cdn.tiny.cloud/1/jrsjj47h3k9y6272lmftp2j56agyzl6a86u1fvt8n8bzbxvw/tinymce/5/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script> -->
<script type="text/javascript">
    

// $(".tcontent").click( function() {

var key='<?=$key1;?>';
  var emailBodyConfig = {
  selector: '.edit-type'+key,
   menubar: false,
   inline: true,
  fixed_toolbar_container: ".toolbars"+key,
  inline_boundaries: false,

 
  toolbar: [
    'undo redo | bold italic underline | fontselect fontsizeselect',
    'forecolor backcolor | alignleft aligncenter alignright alignfull | numlist bullist outdent indent'
  ],
  valid_elements: 'p[style],strong,em,span[style],ul,ol,li',
  valid_styles: {
    '*': 'font-size,font-family,color,text-decoration,text-align'
  },
  powerpaste_word_import: 'clean',
  powerpaste_html_import: 'clean',
  // content_css: '//www.tiny.cloud/css/codepen.min.css'
};

// var emailTitleConfig = {
//   selector: '.tinymce-title',
//   menubar: false,
//   inline: true,
//   fixed_toolbar_container: ".tbars",
 
//   toolbar: [
//     'undo redo | bold italic underline | fontselect fontsizeselect',
//     'forecolor backcolor | alignleft aligncenter alignright alignfull | numlist bullist outdent indent'
//   ],
//   valid_elements: 'p[style],strong,em,span[style],ul,ol,li',
//   valid_styles: {
//     '*': 'font-size,font-family,color,text-decoration,text-align'
//   },
//   powerpaste_word_import: 'clean',
//   powerpaste_html_import: 'clean',
//   // content_css: '//www.tiny.cloud/css/codepen.min.css'
// };


tinymce.init(emailBodyConfig);



//tinymce.init(emailTitleConfig);


// });


  </script>





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

<!-- <div class="append-quest-row"></div>
 -->
<?php

}
// }

?>

</table>
<?php


}
// }

?>



                     <!--    <div class="col-md-6 col-lg-6" style="display: flex;">
                           <button type="button" class="btn btn-primary ml-auto create-tab" data-id="<?=$tab_q['qt_text']['order_id'];?>"autofocus=" " data-toggle="modal" >Create 
                           
                           </button>

                       <select class="form-control choose_type active" name="choose_type" id="choose_type" data-id="<?=$tab_q['qt_text']['order_id'];?>" style="width: 80%;display: inline-block;" onchange="add_quest_table(this)">


                                <?php
                                    foreach($tables as $data){
                                      // echo $table['table_id'];
                                      if($data['table_id']==$table['table_id']){
                                        echo '<option value="'.$data['table_id'].'" selected>'.$data['table_name'].'</option>';
                                        }else{
                                        echo '<option value="'.$data['table_id'].'">'.$data['table_name'].'</option>';
                                        }
                                    }
                                ?>
                 

                    </select>

                     <a href="javascript:void(0)" data-order="<?=$tab_q['order_id'];?>" data-id="<?=$table['table_id'];?>" class="btn btn-success btn-sm edit-qst-btn"><i class="fa fa-pencil" aria-hidden="true"></i>
</a>
                    </div> -->

                   <!--    <div class="col-md-6">
                  
                    
                  </div> -->


                       


              </div>

                <?php


                      }
  // }

                  ?>



<!-- <?php  if(!empty($tab_q['qt_vals'])){
  ?>

              <div class="col-lg-2 col-md-12 " style="margin-top: 50px;">(Use enter key to save values)</div>
          <?php } ?> -->

<?php
// print_r($tab_q['transactions']);
             if($priorit_ids==3){
                ?>
              <div class="col-lg-3 col-md-12 " style=""></div>

              <div class="row col-lg-8 col-md-12 qst-transaction-row"  data-order="<?=$tab_q['order_id'];?>" style="margin-top: 20px;">
                                <!-- <input type="hidden" id="row-data" value="
                                "> -->

<!--                            <div class="col-md-12 col-lg-12 hidden-row" class="" style="display: none;" >


 -->

     <?php 
     foreach ($tab_q['transactions'] as $key => $trans) {

                              foreach($trans as $key=>$data){

                              
                                $keyarr=array();

                                foreach ($data['keywords'] as $key => $value_keys) {
                                  array_push($keyarr, $value_keys['keyword_value']);
                                }

                                 $keys= implode(",",$keyarr);


        //print_r($data['keywords']);exit();


                                if($data['trans_type']=='paragrph'){



       ?>

          <div class="col-md-12 col-lg-12 qst-transaction" data-order="<?=$tab_q['order_id'];?>"  class="" style="display: flex;margin-bottom: 20px;" >



                               <div class="col-md-4 col-lg-5" class="" style="">
                                <!-- <input type="text" class="form-control trans-input" name="transactions[]" placeholder="Enter Name" data-type="paragrph" value="<?=$data['transaction_title']?>"> -->
 <textarea rows="4" cols="6" class="form-control trans-input" name="transactions[]" placeholder="Enter Name" data-order="<?=$tab_q['order_id'];?>" data-trns="<?=$data['transaction_id']?>" data-type="paragrph"><?=$data['transaction_title']?></textarea>

                                </div>
                                <div class="col-md-4 col-lg-4" class="" style="">
                                 <input type="text" class="form-control key-tags trans-key" id="input-tags4" name="edit_transaction_keywords[]"  placeholder="Enter Keywords" data-trns="<?=$data['transaction_id']?>" value="<?=$keys?>">

                                </div>
                                <div class="col-md-4 col-lg-4" class="" style="">
                        <button type="button" class="btn btn-bitbucket delete-trans" data-toggle="modal" data-id="<?=$data['transaction_id']?>"><i class="fa fa-minus"></i></button>

                                </div>
                                </div>

    <?php 
  }else{

 ?>

                                <div class="col-md-12 col-lg-12 qst-transaction-sent" class="" style="display: flex;" >



                               <div class="col-md-4 col-lg-5" class="" style="">
                          <!--       <input type="text" class="form-control trans-input" name="transactions[]" placeholder="Enter Name" data-type="sentnce" value="<?=$data['transaction_title']?>"> -->

                                 <textarea rows="4" cols="6" data-order="<?=$tab_q['order_id'];?>" class="form-control trans-input" name="transactions[]" placeholder="Enter Name" data-type="sentnce" data-trns="<?=$data['transaction_id']?>"><?=$data['transaction_title']?></textarea>


                                </div>
                                <div class="col-md-4 col-lg-4" class="" style="">
                                 <input type="text" class="form-control key-tags trans-key" id="input-tags4" data-trns="<?=$data['transaction_id']?>" name="edit_transaction_keywords[]"  placeholder="Enter Keywords" value="<?=$keys?>">

                                </div>
                                <div class="col-md-4 col-lg-4" class="" style="">
                        <button type="button" class="btn btn-bitbucket delete-trans" data-toggle="modal" data-id="<?=$data['transaction_id']?>"><i class="fa fa-minus"></i></button>

                                </div>
                               </div>





 <?php 
  }
     }
     }
     ?>

                             





<!--                         </div>
 -->












              
                                </div>










                 




              

 <?php 
} 
} 
  } 
 ?>


 
               

            </div>



            <div class="row qst-div" style="margin-right: 76px;display: none;">

               <div class="col-lg-12 col-md-12 " style="min-height: 100px;">
                                            </div>
                                              <div class="col-lg-2 col-md-12 " style="">

                        <input type="hidden" name="question_id" id="question_id" value="1">
                                            </div>


<!--               <div class="col-lg-2 col-md-12 " style=""></div>
 -->



               <!--   <div class="col-md-12 col-lg-10 text-box" data-id="0" >
                  <div class="form-group">
                    <label class="form-label">Text</label>
                    <div class="editor" id="product_description_div" data-id="0" style="height: 250px;"></div>
                    <textarea name="product_description" id="text_qst" class="editor_content" style="display: none;" required></textarea>
                    <input type="hidden" class="order-quill" value="0" >
                  </div>
                </div> -->




                  <div class="col-md-12 col-lg-8" class="qst-table" style="display: none">
                  <div class="form-group">
                    <label class="form-label">Description</label>
                    <div class="editor" id="product_description_div" style="height: 103px;"></div>
                    <textarea name="product_description" class="editor_content" data-id="0" style="display: none;" required></textarea>
                  </div>
                </div>






                      <div class="col-lg-4 col-md-12 " style=""></div>
                       <div class="col-lg-8 col-md-12 add_table" style="display: none;">
                        <div class="col-md-6 col-lg-6" style="display: flex;margin-top: 15px;">
                           <button type="button" class="btn btn-primary ml-auto create-tab" data-type="quest" data-id="0"autofocus=" " data-toggle="modal" >Create 
                           
                           </button>
<!--                       <button type="submit" class="btn btn-primary ml-auto create_table" style="">Create new</button>
 -->
                       <select class="form-control choose_type active" name="choose_type" id="choose_type" data-id="0" style="width: 80%;display: inline-block;" onchange="add_quest_table(this)">


                        <option value="0" selected disabled>Select</option>
                                <?php
                                    foreach($tables as $data){
                                        echo '<option value="'.$data['table_id'].'">'.$data['table_name'].'</option>';
                                    }
                                ?>
                     <!--  <option value="0">Text box</option>
                      <option value="1">Table</option>
                      <option value="2">Terms-para</option>
                     <option value="3">Terms-sentence</option> -->

                    </select>
                    </div>

                   <!--    <div class="col-md-6">
                  
                    
                  </div> -->


                       


              </div>

              <div class="col-lg-3 col-md-12 " style=""></div>


               <div class="row col-lg-8 col-md-12 qst-transaction-row"  style="display: none;">
                                <!-- <input type="hidden" id="row-data" value="
                                "> -->

                           <div class="col-md-12 col-lg-12 hidden-row" class="" style="display: none;" >


                                <div class="col-md-12 col-lg-12 qst-transaction" class="" style="display: flex;" >



                               <div class="col-md-4 col-lg-7" class="" style="">
                               <!--  <input type="text" class="form-control trans-input" name="transactions[]" placeholder="Enter Name" data-type="paragrph"> -->

                               <textarea rows="3" cols="6" class="form-control trans-input" name="transactions[]" placeholder="Enter Transaction" data-type="paragrph" data-trns="0"></textarea>


                                </div>
                                <div class="col-md-4 col-lg-4" class="" style="">
                                 <input type="text" class="form-control key-tags-1 trans-key" id="input-tags4" name="edit_transaction_keywords[]"  placeholder="Enter Keywords">

                                </div>
                                <div class="col-md-4 col-lg-4" class="" style="">
                        <button type="button" class="btn btn-bitbucket add-new-trans" data-toggle="modal"><i class="fa fa-plus"></i></button>

                                </div>
                                                                </div>





                </div>




                           <div class="col-md-12 col-lg-12 hidden-row-sentence" class="" style="display: none;" >


                                <div class="col-md-12 col-lg-12 qst-transaction-sent" class="" style="display: flex;" >



                               <div class="col-md-4 col-lg-7" class="" style="">
                               <!--  <input type="text" class="form-control trans-input" name="transactions[]" placeholder="Enter Name" data-type="sentnce"> -->


                                 <textarea  rows="4" cols="6" class="form-control trans-input" name="transactions[]" placeholder="Enter Transaction" data-type="sentnce" data-trns="0"></textarea>


                                </div>
                                <div class="col-md-4 col-lg-4" class="" style="">
                                 <input type="text" class="form-control key-tags-2 trans-key" id="input-tags4" name="edit_transaction_keywords[]"  placeholder="Enter Keywords">

                                </div>
                                <div class="col-md-4 col-lg-4" class="" style="">
                        <button type="button" class="btn btn-bitbucket add-new-trans-sent" data-toggle="modal"><i class="fa fa-plus"></i></button>

                                </div>
                                                                </div>





                </div>


               <div class="col-md-12 col-lg-12 qst-transaction" class="" style="display: flex;" >



                               <div class="col-md-4 col-lg-4" class="" style="">
                                <input type="text" class="form-control trans-input" name="transactions[]" placeholder="Enter Name" data-id="0" data-trns="0">


                                </div>
                                <div class="col-md-4 col-lg-4" class="" style="">
                                 <input type="text" class="form-control key-tags trans-key1" id="input-tags4" name="edit_transaction_keywords[]"  placeholder="Enter Keywords" data-id="0">

                                </div>
                                <div class="col-md-4 col-lg-4" class="" style="">
                        <button type="button" class="btn btn-bitbucket add-new-trans" data-toggle="modal"><i class="fa fa-plus"></i></button>

                                </div>




                  <!-- <div class="form-group">
                    <label class="form-label">Description</label>
                    <div class="editor" id="product_description_div" style="height: 250px;"></div>
                    <textarea name="product_description" class="editor_content" style="display: none;" required></textarea>
                  </div> -->
                </div>
                                </div>


                 




              



            </div>

            <!-- row div -->



                                        <div class="append-new row" style="margin-right: 76px;">  

                                       
                                        </div>



              <div class="col-lg-10 col-md-12 add-type-div" style="margin-top: 30px">

                  
                     <!-- <select class="form-control" name="choose_type" id="choose_type" style="width: 80%">
                      <option value="0">Text box</option>
                      <option value="1">Table</option>
                      <option value="2">Terms-para</option>
                     <option value="3">Terms-sentence</option>

                    </select> -->

                    <ul class="tabs-new" style="margin-left: 229px;">



                            <li class="type-tab add-type" data-id="0" style="background: #9E9E9E;"><a   style="color: white;" href="javascript:void(0);" data-id="0">Text Box</a></li>

                                        

                            <li class="type-tab add-type" data-id="1" style="background: #9E9E9E;"><a  style="color: white;" href="javascript:void(0);" data-id="1">Table</a></li>

                            <li class="type-tab add-type" data-id="2" style="background: #9E9E9E;"><a  style="color: white;" href="javascript:void(0);" data-id="2">Transaction Paragraph</a></li>
                            <li class="type-tab add-type" data-id="3" style="background: #9E9E9E;"><a  style="color: white;" href="javascript:void(0);" data-id="3">Transaction Sentence</a></li>



            </ul>


                       


              </div>
<!-- </div>
 -->





                                        <!-- div row cloce -->


  <div class="row prblem-div" style="display: none;margin-right: 20px;    margin-bottom: 56px;">

           




 <div class="col-lg-12 col-md-12 " style="min-height: 100px;">
                                            </div>








                       <div class="col-lg-2 col-md-12 " style="">

                        <input type="hidden" name="question_id" id="question_id" value="1">
                                            </div>







                         
                       <div class="col-lg-8 col-md-12 add_table" style="display: block;">





                        <?php
                    if(!empty($problem_format)){

                      ?>
                      <a href="javascript:void(0)" data-order="" style=""  class="btn btn-success btn-sm add-new-pr-btn">Add new</a>
 <?php

                         foreach ($problem_format as $key => $format) {
                          $table_pr=$format['table_id'];
                          ?>


                     <?php
                    
                      // if($key==0){ 

                       //print_r($format['p_cols']) ;
                        $table=$format['p_cols'];

                      ?>

                      <div class="table-cls" data-format="<?=$format['p_format_id'];?>">

        

 <p class="text-center answer-table-header" style="margin-bottom:0;">
                        <span style="float:left"><?=$table['table_left_title']?></span>
                        <span style="font-size:14px;"><?=$format['format_name']?></span>
                        <span style="float:right"><?=$table['table_right_title']?></span>
                    </p>

                                  <a href="javascript:void(0)" data-order="" data-id="<?=$table_pr;?>" class="btn btn-success btn-sm edit-prblem-btn" style="float: right;    "><i class="fa fa-pencil" aria-hidden="true"></i>
</a>


<a href="javascript:void(0)" data-order="" data-id="<?=$format['p_format_id'];?>" class="btn btn-danger btn-sm delte-prblem-btn" style="float: right;margin-right: 2px;"><i class="fa fa-trash" aria-hidden="true"></i>

</a>


                     <div class="answer-table-box table-box card" data-format="<?=$format['p_format_id'];?>">

                    <!-- <div class="table-box"> -->
                        <table>
                            <tr class="table-header">

                              <?php
                                    $cols = $table['table_columns'];
                                     $cols_name = array($table['column_one_name'],$table['column_two_name'],$table['column_three_name'],$table['column_four_name'],$table['column_five_name'],$table['column_six_name'],$table['column_seven_name'],$table['column_eight_name'],$table['column_nine_name'],$table['column_ten_name'],$table['column_eleven_name'],$table['column_twelve_name'],$table['column_thirteen_name'],$table['column_fourteen_name'],$table['column_fifteen_name']);
                                    $cols_width = array($table['column_one_width'],$table['column_two_width'],$table['column_three_width'],$table['column_four_width'],$table['column_five_width'],$table['column_six_width'],$table['column_seven_width'],$table['column_eight_width'],$table['column_nine_width'],$table['column_ten_width'],$table['column_eleven_width'],$table['column_twelve_width'],$table['column_thirteen_width'],$table['column_fourteen_width'],$table['column_fifteen_width']);
                                    $cols_sum = array($table['column_one_sum'],$table['column_two_sum'],$table['column_three_sum'],$table['column_four_sum'],$table['column_five_sum'],$table['column_six_sum'],$table['column_seven_sum'],$table['column_eight_sum'],$table['column_nine_sum'],$table['column_ten_sum'],$table['column_eleven_sum'],$table['column_twelve_sum'],$table['column_thirteen_sum'],$table['column_fourteen_sum'],$table['column_fifteen_sum']);
                                     $cols_count = array($table['count_one_table'],$table['count_two_table'],$table['count_three_table'],$table['count_four_table'],$table['count_five_table'],$table['count_six_table'],$table['count_seven_table'],$table['count_eight_table'],$table['count_nine_table'],$table['count_ten_table'],$table['count_eleven_table'],$table['count_twelve_table'],$table['count_thirteen_table'],$table['count_fourteen_table'],$table['count_fifteen_table']);
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


                                                      }else{
                                                        $cls='';
                                                   $width=$cols_width[$i];

                                                      }


                                                     //  if($cols_count[$j]!=0){



                                                     // }







                                        ?>
                                            <td width="<?=$width?>%"  data-id="<?=$key1?>" class="connected empty_fixed  problem-tr itemconnect value_<?=$i?> text-right <?=$cls;?>" data-prblem="<?=$vals['format_id']; ?>" style="height: 30px"><?php echo strip_tags($vals['col_value']); ?></td>
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
                                                      // $width=$cols_width[$i]/$cols_count[$i];
                                                       if($cols_count[$i]!=0){

                                                       $width=$cols_width[$i]/$cols_count[$i];
                                                        }else{

                                                          $width=$cols_width[$i];
                                                          }


                                                      }else{
                                                        $cls='';
                                                   $width=$cols_width[$i];

                                                      }




                                        ?>
                                            <td width="<?=$width?>%" class="connected empty_fixed problem-tr itemconnect value_<?=$i?> <?=$cls?>" data-prblem="<?=$vals['format_id']; ?>" style="height: 30px"><?php echo strip_tags($vals['col_value']); ?></td>
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

</div>





                             <?php


                    //}
                     //}



                    ?>


                       <?php }
                     }
                       else{

                        ?>


                          <div class="col-md-6 col-lg-12 new-pr-div" style="display: flex;">
                           <!-- <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#tableModal">Create 
                           
                           </button> -->
                      <button type="submit" class="btn btn-primary ml-auto create-tab-pr"  data-type="format"  style="">Create new</button>

                       <select class="form-control choose-table" name="choose_type" id="choose-table"  onchange="add_problem_format(this)" style="width: 80%;display: inline-block;">

<!--                       <option value="0">Text box</option>
                      <option value="1">Table</option>
                      <option value="2">Terms-para</option>
                     <option value="3">Terms-sentence</option> -->

                     <option value="0" selected disabled>Select</option>
                                <?php
                                    foreach($tables_format as $data){

                                        echo '<option value="'.$data['table_id'].'">'.$data['table_name'].'</option>';
                                    }
                                ?>

                    </select>
                    </div>

                      
                      <?php }

                       ?>


                           



                        <div class="col-md-6 col-lg-12 new-pr-div" style="display: flex;display: none;">
                           <!-- <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#tableModal">Create 
                           
                           </button> -->
                      <button type="submit" class="btn btn-primary ml-auto create-tab-pr" data-type="format"  
                      style="">Create new</button>

                       <select class="form-control choose-table " name="choose_type" id="choose-table"  onchange="add_problem_format(this)" style="width: 80%;display: inline-block;">

<!--                       <option value="0">Text box</option>
                      <option value="1">Table</option>
                      <option value="2">Terms-para</option>
                     <option value="3">Terms-sentence</option> -->

                     <option value="0" selected disabled>Select</option>
                                <?php
                                    foreach($tables_format as $data){
                                        echo '<option value="'.$data['table_id'].'">'.$data['table_name'].'</option>';
                                    }
                                ?>

                    </select>
                    </div>

                     


              </div>


                                     <div class="col-lg-7 col-md-12 show_table" style="display: none;overflow-y: auto;
    max-height: 75vh;">

                                      
                                      <input type="hidden" id="table_fr_id" value="0">
                                    <input type="text" id="pr_table_name" value="" class="form-control" >

                                    <div class="card append-table-pr-row" style="display: none;">






                                   
                                    </div>
                                    
<a href="javascript:void(0)" data-order="0" data-id="140" class="btn btn-success btn-sm copy-excel-pr" style="float: right;margin-top: 17px;margin-right: 9px;    background: #2196F3;padding: 7px;">Copy Excel</a>


                                      <div class="col-lg-12 col-md-12 plus-new-pr" style="margin-top: 17px;" ><button type="button "; style="background: #104861;color: white;float: right;    margin-right: 10px;"  class="btn-add-rw">Add row</div>



                                    <div class="card append-table" style="margin-top: 17px;">




                                   
                                    </div>



                                     <a href="<?=base_url('questions_list_add/'.$questionid)?>" data-order=""  class="btn btn-success btn-sm " style="background-color: #104861;
    border-color: #104861;float: right;">Finish

                                    </a>



                                     </div>


                                     <div class="col-lg-3 col-md-4 choose_value_type" style="height: 300px;
    " >

        <select class="form-control" name="choose_add_type" id="choose-add-type"  onchange="add_format_values()" style="width: 105%;">

                      <option value="0">Value/Text</option>
                      <option value="1">Help Text</option>
                      <option value="2">Help Image</option>
                     <option value="3">Keywords</option>

                   </select>
                   <div class="" style="height: 40px">

                     </div>


                                      <div class="">
                                      </div>


                               <input type="hidden" name="column_value" id="column_value">
                               <input type="hidden" name="row_value" id="row_value">
                               <input type="hidden" name="sub_value" id="sub_value">

                                <input type="hidden" id="text_val">
                               <input type="hidden"  id="help_value">
                               <input type="hidden"  id="col_vals">


                   <div class="append_div">
                              
                              <!--  <input type="text" name="value_text" id="value_text" class="form-control value_text" data-type="text" onkeyup="insert_values(this)"> -->


                              <div class="value_text" id="value_text" onkeyup="insert_values(this)" data-type="text" style="height: 78px;"></div><textarea name="value_text" id="value_text1" class=" value_text editor_content" data-type="text" style="display: none;"></textarea>

        










<!-- <input type="hidde" name="format_va">
 -->                   </div>


 <div class="card imagegallery" style="height: 450px;; width: 280px; overflow-x: scroll;background-color: rgba(70,80,100,0.8);display: none;background-color: #444;
    margin-top: -39px;
    border: 2px solid black">
      <div class="card-header">
                
      <h4 style="color: white;    padding-top: 5%;
    padding-right: 32%;">Image Gallery</h4>                      
           
 <div class="btn btn-primary-outline"   data-toggle="modal" data-target="#modalImage"><i style="color: white" class="fa fa-plus"></i></div>     


    </div>
<div class="card-body ">

  
        
        <div class="row">


       <div class="col-md-12">
   
 <div class="search">
  <input type="text" id="imagesearch" class="searchTerm" placeholder="What are you looking for?">
  <button type="submit" onclick="return getImage();" class="searchButton">
    <i class="fa fa-search"></i>
     </button>
   </div>
</div>            
  
<!-- <div class="col-md-12"><input type="file" class="style imagegal" data-id="imagegallery"  name="imagegal" id="imagegal"></div> -->
<div id="imgl">

  <?php
   $directory = "./uploads/imagegallery";
    $files = glob($directory . "/*.*");
     // print_r($directory);
    if(!empty($images)){
  $i = 0;
     foreach($images as $image)
    
{
    // $image = $files[$i];
    $supported_file = array(
        'gif',
        'jpg',
        'jpeg',
        'png'
     );

     // $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
     // if (in_array($ext, $supported_file)) {
    // echo basename($image)."<br />"; // show only image name if you want to show full path then use this code // echo $image."<br />";
    ?>                     
<!-- <button class="tablinks" onclick="openCity(event,'<?=$entry?>')"><?=$entry?></button> -->
<div class="col-md-12"><img src="<?=base_url().'uploads/chapter/'.$image['chapter_image'] ?>" class="imagegallery<?=$i?>" style="height:120px;width:300px"
       onclick = "addImagegallery('<?=$image['chapter_image']?>','imagegallery<?=$i?>')" 
     
      alt="Random image" style="
    padding: 1%;
"/><span class="tlabel"> </span></div>
   
<?php
//  } else {
//       continue;
//    }
    $i++;
      }
    } ?>
</div>
          


        </div>
        </div>

</div>

          







                                     </div>




              



            </div>




            <!-- problem div close -->

                        </div>


                        <!-- main div close -->




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




<div id="tableModal" class="modal fade" role="dialog" style="    padding-right: 6px;
   /* display: block;*/
/*    position: relative;
*/    top: 65%;
    margin-top: -400px;
    /* margin-bottom: 52px;">
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
                    <div class="col-md-13 col-lg-12" style="display: flex;">
                      <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Table Name</label>
                            <input type="text" class="form-control" name="table_name" placeholder="Enter Name" required>

                       <input type="hidden" class="form-control" name="table_type" placeholder="Enter Name" value="quest" required>

                       <input type="hidden" name="order_id_new" class="order-id-new">

<!--                             <input type="text" class="form-control" name="table_name" placeholder="Enter Name" required>
 -->
                        </div>
                      </div>


                        <div class="col-md-6 col-lg-6">

                          <div class="form-group">
                            <label class="form-label">Columns</label>
                            <input type="text" class="form-control numberonly col_no" name="col_no" value="" placeholder="Enter Columns" required>
                        </div>
                         </div>
                    </div>
                  <!--   <div class="col-md-6 col-lg-6">
                      
                    </div> -->

                      <div class="col-md-12 col-lg-12" style="display: flex;">
                                              <div class="col-md-6 col-lg-6">

                        <div class="form-group">
                            <label class="form-label">Left Name</label>
                            <input type="text" class="form-control " name="left_name" value="" placeholder="Enter Left Name" required>
                        </div>
                                            </div>

                                                        <div class="col-md-6 col-lg-6">

                        <div class="form-group">
                            <label class="form-label">Right Name</label>
                           <input type="text" class="form-control " name="right_name" value="" placeholder="Enter Right Name" required>
                        </div>
                                            </div>



                    </div>


                        <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                           <label class="form-label">Table width(for single preview)</label>
                                    <input type="text" class="form-control" id="single_width" name="single_width" placeholder="Enter Width for table" >
                        </div>
                    </div>

                  




                      <div class="col-md-12 col-lg-12" style="display: flex;">

                     <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Table Header</label>
                              <div class="headenote" id="headenote" data-id="0" style="height: 78px;">
                                
                              </div>
                    <textarea name="header_note" id="header_note" class="editor_content" style="display: none;" required></textarea>
                        </div>
                        </div>


                         <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Table Footer</label>
                              <div class="footernote" id="footernote" data-id="0" style="height: 78px;"></div>
                    <textarea name="footer_note" id="footernote" class="editor_content" style="display: none;" required></textarea>
                        </div>
                        </div>
                    </div>

                </div>

                        <div class="col-md-12" id="col_appnd_div" style="">




                       </div>

<!-- 
                         <div class="col-md-6 col-lg-8">
                        <div class="form-group">
                            <label class="form-label">Table Footer</label>
                              <div class="footernote" id="footernote" data-id="0" style="height: 78px;"></div>
                    <textarea name="footer_note" id="footernote" class="editor_content" style="display: none;" required></textarea>
                        </div>
                    </div> -->




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
            <input type="hidden" name="order_id" class="order-id">

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
            <button type="button" id="add-qst_tbl-btn" class="btn btn-info add-ans-save">Save</button>
        </div>
      </div>
    </div>

  </div>
</div>


<div id="tableModal1" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width:800px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Table</h4>
      </div>
      <div class="modal-body">




        <div class="row" id="format-table-div" style="">
          <select class="form-control choose-table-format" name="choose_type" id="choose-table-format" onchange="add_problem_format_create(this)" style="width: 61%;margin-left: 47px;">

                                 <option value="0" selected disabled>Select</option>




            <?php
                                    foreach($tables_problem as $data){
                                        echo '<option value="'.$data['table_id'].'">'.$data['table_name'].'</option>';
                                    }
                                ?>

          </select>


        </div>



                        <form id="col-form1">



            <div class="row" id="define-cols-div" style="display: none;">
                <div class="col-lg-12" id="col-div" style="">
                    <div class="col-md-13 col-lg-12" style="display: flex;">
                      <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Table Name</label>
                            <input type="text" class="form-control" name="table_name" id="table_name" placeholder="Enter Name" required>
                          <input type="hidden" class="form-control" name="table_type" placeholder="Enter Name" value="format" required>

                        </div>
                      </div>


                        <div class="col-md-6 col-lg-6">

                          <div class="form-group">
                            <label class="form-label">Columns</label>
                            <input type="text" class="form-control numberonly col_no-pr" name="col_no" value="" placeholder="Enter Width" required>
                        </div>
                         </div>
                    </div>
                  <!--   <div class="col-md-6 col-lg-6">
                      
                    </div> -->

                      <div class="col-md-12 col-lg-12" style="display: flex;">
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


                     <!--    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Right Name</label>
                            <input type="text" class="form-control " name="right_name" value="" placeholder="Enter Width" required>
                        </div>
                    </div> -->

                  




<!-- 
                     <div class="col-md-6 col-lg-8">
                        <div class="form-group">
                            <label class="form-label">Table Header</label>
                              <div class="headenote" id="headenote" data-id="0" style="height: 78px;"></div>
                    <textarea name="header_note" id="header_note" class="editor_content" style="display: none;" required></textarea>
                        </div>
                    </div> -->

                </div>

                        <div class="col-md-12" id="col_appnd_div_pr" style="">




                       </div>


                      <!--    <div class="col-md-6 col-lg-8">
                        <div class="form-group">
                            <label class="form-label">Table Footer</label>
                              <div class="footernote" id="footernote" data-id="0" style="height: 78px;"></div>
                    <textarea name="footer_note" id="footernote" class="editor_content" style="display: none;" required></textarea>
                        </div>
                    </div> -->





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
      
      </div>
      <div class="modal-footer">
        <div id="btn-one" style="display:none;">
            <button type="button" id="cancel-qt-btn" class="btn btn-default">Cancel</button>
                        <button type="button" id="create-tbl-pr-btn" class="btn btn-info">Create</button>

<!--             <button type="button" id="add-ans-btn" class="btn btn-info" data-id="">Add Values</button>
 -->        </div>
        <!-- <div id="btn-two" style="display:none;">
            <button type="button" id="prev-qt-btn" class="btn btn-default">Prev</button>
            <button type="button" id="add-col-btn" class="btn btn-info">Next</button>
        </div> -->
        <div id="btn-three" style="display:none;">
<!--             <button type="button" id="prev-col-btn" class="btn btn-default">Prev</button>
 -->            <button type="button" id="remove-qtable-btn" class="btn btn-warning">Cancel</button>
            <button type="button" id="add-qst_tbl-btn" class="btn btn-info add-ans-save">Save</button>
        </div>
      </div>
    </div>

  </div>
</div>


<div class="modal " id="modalImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle"> Image</h5>
    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
      <!-- <span aria-hidden="true">&times;</span> -->
    <!-- </button> -->
  </div>
  <!-- <form action="<?=base_url('upload-image')?>" method="post" class="card" enctype="multipart/form-data"> -->
    <form>
  <div class="modal-body">
    
      <div class="form-group ">
      <label>Image</label>   
<!--        <input type="hidden" name="topid" id="topid"  value="<?= $topic_id?>"  > 
 -->       <input type="file" name="image" id="image"   > 
      </div>
      <div class="form-group">
            <label class="form-label">Tags</label>
            <input type="text" class="form-control key-tags" id="image_tags" name="image_tags"  placeholder="Enter Tags" required="">
        </div>
      
     
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="imagegalr" class="btn btn-primary ml-auto"  data-dismiss="modal">Upload</button>
    
  </div>
  </form>

    </div>
  </div>
</div>
<!-- Modal Head -->


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


<div id="getModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 800px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Table Details</h4>
      </div>
      <div class="modal-body">
        <div class="row table-det">
            
        </div>
      </div>
      <div class="modal-footer">
                              <input type="hidden" class="" name="" id="table_tval" value="">
                              <input type="hidden" class="" name="" id="table_torder" value="">
                              


      <!--   <button type="button" id="add_qst_table_val" class="btn btn-info add_qst_table_val" data-id="">Add</button> -->
         <button type="button" id="show_quest_table" class="btn btn-info add_qst_table_val" data-id="">Add</button>
      </div>
    </div>

  </div>
</div> 

 

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



  //modules: { toolbar: '#toolbar' },

  //  var quill = new Quill('.input-qst-nw', {
  //   theme: 'snow',   // Specify theme in configuration
  //   modules: {
  //     // Equivalent to { toolbar: { container: '#toolbar' }}
  //        toolbar: '#toolbar-1'
  //   }
  // });



 

  var quill = new Quill('.headenote', {
    theme: 'snow',   // Specify theme in configuration
    modules: {
      // Equivalent to { toolbar: { container: '#toolbar' }}
          toolbar: toolbarOptions

    }
  });


    var quill = new Quill('.footernote', {
    theme: 'snow',   // Specify theme in configuration
    modules: {
      // Equivalent to { toolbar: { container: '#toolbar' }}
      toolbar: toolbarOptions
    }
  });

          if($(".edit-textbox").length > 0){
  
  for (var i =0 ; i <= $(".edit-textbox").length - 1; i++) {
    var qull='quill';
    var k=i;
    var quill=qull+k;

    quill  = new Quill('.editor_'+i, {
    theme: 'snow',   // Specify theme in configuration
    modules: {
      // Equivalent to { toolbar: { container: '#toolbar' }}
       toolbar: toolbarOptions
    }
  });





       quill.on('text-change', function(delta, oldDelta, source) {
        var selector='editor_'+k;

       // '#' + descriptionFieldId

    var elem = document.querySelector('.'+selector);
    console.log(selector);

    var html_content=elem.children[0].innerHTML;
    //var id=1;
    var order=elem.getAttribute('data-id');
               var qstion=$('#question_id').val();
               

    // console.log(elem.getAttribute('data-id'));

    //alert(elem.closest('.order-quill').value);


      //  console.log(elem.children[0].innerHTML);


       $.ajax({
            url:base_url+'add-question-text',
            type:'post',
            data:{html_content:html_content,order:order,qstion:qstion},
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


   // console.log(JSON.stringify(quill.getContents()));
  $(elem).parent().find('.editor_content').val(elem.children[0].innerHTML);
  });



    
  }
     


   }
  
  // for (var i = 0; i <= 8; i++) {
  //                       var quill = new Quill('.editor'+i, {
  //   theme: 'snow',   // Specify theme in configuration
  //   modules: {
  //     // Equivalent to { toolbar: { container: '#toolbar' }}
  //     toolbar: toolbarOptions
  //   }
  // });
    
  // }

  



$(document).on('click',".add_row_qst_all",function (e) {
      var i=0;

      var table=$(this).data('id');
      var order=$(this).data('order');
            var no=$('.row-count[data-id="'+table+'"][data-order="'+order+'"]').val();



        $('.table-qst[data-id="'+table+'"][data-order="'+order+'"]').find('.tr-quest').each(function(e){
        // if(i==0) ids += $(this).attr('data-id');
        // else ids += ','+$(this).attr('data-id');
        i++;
    })

       $(".add_row_quest").attr("disabled", true); 
       $(".add_row_quest").css('cursor', 'not-allowed');

       $(this).removeClass('add_row_qst_all');


          // $('.hidden[data-table="'+table+'"]').find('.quest-edit-type-append').attr('data-row',i);
          // $('.hidden[data-table="'+table+'"]').find('.delte-quest-row-btn-append').attr('data-row',i);

         

        //  var html='<tr class="tr-quest">';
      
        // html+=$('.hidden[data-table="'+table+'"]').html();

        // html+='</tr>';

   //



     //$('.append-quest-row').append(html);
      var table_id = $('#table_fr_id').val();
       var qstion = $('#question_id').val();
      //alert('cxhggxcgc');



                      $.ajax({
        url:base_url+'add-quest-row-all',
        data:{row:no,last:i,table_id:table,order:order,qstion:qstion},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            if(out.status == 1){

                      // $('.hidden[data-table="'+table+'"]').find('.quest-edit-type-append').attr('data-row',i);

window.location.reload();
            // $('.table-qst[data-id="'+table+'"]').find(".tr-quest").last().after(html);


                // $('#value_text').val(out.data.value_text);
                // $('#help_text').val(out.data.value_help);
                // // $('#help_text').val(out.data.value_help);
                // $('.pr-keys').val(out.data.col_keys);

                //                 $('#text_val').val(out.data.value_text);
                //                 $('#help_value').val(out.data.value_help);
                //                 $('#col_vals').val(out.data.col_keys);




                
                
                // $('#roles-table').hide();
                //$('#edit-course-form').show();
            }
            else if(out.status==0){
               
                  //  $('#value_text').val('');
                  
                  // $('#help_text').val('');

                  //  $('#text_val').val('');
                  
                  // $('#help_value').val('');
                  // $('#col_vals').val('');
            }
            else{
               // window.location.href = base_url;
            }
        }
    })



      });
  

 







$(document).on('click',".add_row_quest",function (e) {
      var i=0;

      var table=$(this).data('id');
            var order=$(this).data('order');


        $('.table-qst[data-id="'+table+'"][data-order="'+order+'"]').find('.tr-quest').each(function(e){
        // if(i==0) ids += $(this).attr('data-id');
        // else ids += ','+$(this).attr('data-id');
        i++;
    })

       $(".add_row_quest").attr("disabled", true); 
       $(".add_row_quest").css('cursor', 'not-allowed');

       $(this).removeClass('add_row_quest');


         $('.hidden[data-table="'+table+'"]').find('.quest-edit-type-append').attr('data-row',i);
                  $('.hidden[data-table="'+table+'"]').find('.delte-quest-row-btn-append').attr('data-row',i);

         

         var html='<tr class="tr-quest">';
      
        html+=$('.hidden[data-table="'+table+'"]').html();

        html+='</tr>';

   //



     //$('.append-quest-row').append(html);
      var table_id = $('#table_fr_id').val();
      var qstion = $('#question_id').val();
      //alert('cxhggxcgc');



                      $.ajax({
        url:base_url+'add-quest-row',
        data:{row:i,table_id:table,order:order,qstion:qstion},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            if(out.status == 1){

                      // $('.hidden[data-table="'+table+'"]').find('.quest-edit-type-append').attr('data-row',i);

window.location.reload();
            // $('.table-qst[data-id="'+table+'"]').find(".tr-quest").last().after(html);


                // $('#value_text').val(out.data.value_text);
                // $('#help_text').val(out.data.value_help);
                // // $('#help_text').val(out.data.value_help);
                // $('.pr-keys').val(out.data.col_keys);

                //                 $('#text_val').val(out.data.value_text);
                //                 $('#help_value').val(out.data.value_help);
                //                 $('#col_vals').val(out.data.col_keys);




                
                
                // $('#roles-table').hide();
                //$('#edit-course-form').show();
            }
            else if(out.status==0){
               
                  //  $('#value_text').val('');
                  
                  // $('#help_text').val('');

                  //  $('#text_val').val('');
                  
                  // $('#help_value').val('');
                  // $('#col_vals').val('');
            }
            else{
               // window.location.href = base_url;
            }
        }
    })



      });


     $(document).on('click',".plus-new-pr",function (e) {
      var i=0;

        $('.append-div-prblem').find('.tr-problem').each(function(e){
        // if(i==0) ids += $(this).attr('data-id');
        // else ids += ','+$(this).attr('data-id');
        i++;
    })
 var rw=$('.append-div-prblem').find('.tr-problem:last > td >li').attr('data-row');
 var row_no=parseInt(rw)+parseInt(1);
 
 // console.log(rw);


         $('.append-table-pr-row').find('.add_question_div').attr('data-row',i);
         $('.append-table-pr-row').find('.type-problem').attr('data-row',i);

      
      var html=$('.append-table-pr-row').html();


      $('.append-div-prblem').append(html);
      var table_id = $('#table_fr_id').val();
      // alert('cxhggxcgc');



                      $.ajax({
        url:base_url+'add-problem-row',
        data:{row:i,table_id:table_id},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            if(out.status == 1){
                // $('#value_text').val(out.data.value_text);
                // $('#help_text').val(out.data.value_help);
                // // $('#help_text').val(out.data.value_help);
                // $('.pr-keys').val(out.data.col_keys);

                //                 $('#text_val').val(out.data.value_text);
                //                 $('#help_value').val(out.data.value_help);
                //                 $('#col_vals').val(out.data.col_keys);




                
                
                // $('#roles-table').hide();
                //$('#edit-course-form').show();
            }
            else if(out.status==0){
               
                   $('#value_text').val('');
                  
                  $('#help_text').val('');

                   $('#text_val').val('');
                  
                  $('#help_value').val('');
                  $('#col_vals').val('');
            }
            else{
               // window.location.href = base_url;
            }
        }
    })



      });



   //        tinymce.get('contentHead').setContent(content);



    $(document).on('click','#imagegalr',function(e){
       

      var baseurlim = '<?php echo base_url() ?>uploads/background/';
       
    // var topid = $("#topid").val();
    var imagetags = $("#image_tags").val();
    var file_data = $('#image').prop('files')[0];   

    var form_data = new FormData();                  
    form_data.append('image', file_data);
   // form_data.append('topid', topid);
    form_data.append('image_tags', imagetags);

    $.ajax({
        url: base_url+"upload-image",
        type: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData:false,
        success: function(out){
          $("#modalImage").modal('hide');
       out = JSON.parse(out);
        if(out.status == 1){
          getImage();
            // window.location.reload();
               
        }
       
           
        console.log(out.data);
        }
    });
    

    });






      function getImage(){
      var sid = $("#imagesearch").val();
    // alert(sid);
    $.ajax({

        url: base_url+"get-image",
        type: "POST",
        data:{searchTerm:sid} ,
    
        success: function(out){
       out = JSON.parse(out);
       console.log(out);
        if(out.status == 1){

           if(out.data.length>0){
                html ='';
        for(var i=0;i<out.data.length;i++){

             // alert(out.data[i]['chapter_image']+' '+i);
 
            
             var imagedat="'" + out.data[i]["chapter_image"] + "'";
             var gallery="'"+'imagegallery<?=$i?>'+"'";
             
             
// alert(gallery);


          // html += '<div class="col-md-12"><img src="<?=base_url()?>uploads/chapter/'+out.data[i]['chapter_image']+'" class="imagegallery<?=$i?>" style="height:120px;width:300px" onclick = "addImagegallery('+out.data[i]["chapter_image"]+',imagegallery<?=$i?>)"  alt="Random image" style=" padding: 1%; "/><span class="tlabel"> </span></div>';

            html += '<div class="col-md-12"><img src="<?=base_url()?>uploads/chapter/'+out.data[i]['chapter_image']+'" class="imagegallery<?=$i?>" style="height:120px;width:300px" onclick = "addImagegallery('+imagedat+','+gallery+')"  alt="Random image" style=" padding: 1%; "/><span class="tlabel"> </span></div>';
               
        }
        $('#imgl').html(html);
        // alert(html);

        }else{

        }

        console.log(out.data);
        }
    }
    });
    }



    function addImagegallery(imge,cl) { 
         //alert(imge);
       height =190;
       width =300;
      
    //        var i = new Image();
    // i.src = imge.src;
    // var height = i.height;
    // var width = i.width;
    // alert(document.getElementById("myImg").width);
    // alert(width);

      var baseurlim = '<?php echo base_url() ?>uploads/imagegallery/';
       


    var type='h_img';


    var col=$('#column_value').val();
    var rows=$('#row_value').val();
    var sub=$('#sub_value').val();
    

    var table_id=$('#table_fr_id').val();
        var table_name=$('#pr_table_name').val();
          var q_id=$('#question_id').val();



    // alert(tid);
    
         $.ajax({

          url: base_url+"add-problem-format-values",
          type: "POST",
            data:{type:type,col:col,rows:rows,sub:sub,q_id:q_id,table_id:table_id,image:imge,table_name:table_name},
      
          success: function(out){
         out = JSON.parse(out);

          if(out.status == 1){

             $('.imagegallery').hide();
             


           // getContents();
               // $(".bimage").css("background-image", out.data);
                 
          }
         

          console.log(out.data);
          }
      });         
    
    
    

    

    }  




 $(document).on('click','.add-new-pr-btn',function(e){
  //alert('ghdghd');
  $('.new-pr-div').show();
  $('.new-pr-div').css('display','flex');
  $('#choose-table').select2();
  //display: inline

  })
 



$(document).on('click','.delte-prblem-row-btn',function(e){
    e.preventDefault();
    var row = $(this).attr('data-row');
     var table_id = $('#table_fr_id').val();
     var evnt = $(this);

    $.confirm({
        title: 'Confirm delete!',
        content: 'Cant be reversed!',
        buttons: {
            confirm: function () {
                $.ajax({
                    type:'post',
                    url:base_url+'delete-problem-format-row',
                    data:{row:row,table:table_id},
                    success: function(out){
                        var out = JSON.parse(out);
                        if(out.status == 404){
                            window.location.href = base_url;
                        }
                        else if(out.status == 1){
                            // window.location.reload();
                            evnt.parent().parent().remove();
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



$(document).on('click','.delte-quest-row-btn',function(e){
    e.preventDefault();
    var row = $(this).attr('data-row');
        var order = $(this).attr('data-order');

     var table_id = $(this).attr('data-table');
     var evnt = $(this);

    $.confirm({
        title: 'Confirm delete!',
        content: 'Cant be reversed!',
        buttons: {
            confirm: function () {
                $.ajax({
                    type:'post',
                    url:base_url+'delete-question-row',
                    data:{row:row,table:table_id,order:order},
                    success: function(out){
                        var out = JSON.parse(out);
                        if(out.status == 404){
                            window.location.href = base_url;
                        }
                        else if(out.status == 1){
                            window.location.reload();
                            evnt.parent().parent().remove();
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


$(document).on('click','.delte-quest-row-btn-append',function(e){
    e.preventDefault();
    var row = $(this).attr('data-row');
     var table_id = $(this).attr('data-table');
     var evnt = $(this);

    $.confirm({
        title: 'Confirm delete!',
        content: 'Cant be reversed!',
        buttons: {
            confirm: function () {
                $.ajax({
                    type:'post',
                    url:base_url+'delete-question-row',
                    data:{row:row,table:table_id},
                    success: function(out){
                        var out = JSON.parse(out);
                        if(out.status == 404){
                            window.location.href = base_url;
                        }
                        else if(out.status == 1){
                            // window.location.reload();
                            evnt.parent().parent().remove();
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




$(document).on('click','#cancel-qt-btn',function(){
    //  var id = $(this).attr('data-id');
    //   var q_id = $(this).data('id');
      
    // $('#table_name'+q_id+'').val('');
    // $('#table_cols'+q_id+'').val('');
    window.location.reload();
    $('#tableModal').modal('hide');
})

  $(document).on('click','.delte-prblem-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');

    $.confirm({
        title: 'Confirm delete!',
        content: 'Cant be reversed!',
        buttons: {
            confirm: function () {
                $.ajax({
                    type:'post',
                    url:base_url+'delete-problem-format',
                    data:{id:id},
                    success: function(out){
                        var out = JSON.parse(out);
                        if(out.status == 404){
                            window.location.href = base_url;
                        }
                        else if(out.status == 1){
                            // window.location.reload();
                            $('.table-cls[data-format="'+ id +'"]').remove();
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


  $(document).on('click','.delete-trans',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    var qstion = $('#question_id').val();
    var elem=$(this);

    $.confirm({
        title: 'Confirm delete!',
        content: 'Cant be reversed!',
        buttons: {
            confirm: function () {
                $.ajax({
                    type:'post',
                    url:base_url+'delete-transaction',
                    data:{id:id,qstion:qstion},
                    success: function(out){
                        var out = JSON.parse(out);
                        if(out.status == 404){
                            window.location.href = base_url;
                        }
                        else if(out.status == 1){
                            window.location.reload();
                            elem.parent().parent().remove();
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




 $(document).on('click','.edit-prblem-btn',function(e){


      var table_id1=$(this).data('id');


      $.ajax({
            url:base_url+'edit-problem-format',
            type:'post',
            data:{table_id:table_id1},
            success: function(out){
                var out = JSON.parse(out);
                if(out.status==1){
                  var columns=out.data.tabledet.table_columns;
                  var table_id=out.data.tabledet.problem_id;
                  var data1=out.data.tabledet;
                   var pr_values=out.data.problem_sub;
                   var count=out.data.problem_sub_row.rowcount;

                    var cnt=pr_values.length/columns;

                    
                   $('.show_table').show();


                   $('.add_table').hide();




                   var name_array=[data1.column_one_name,data1.column_two_name,data1.column_three_name,data1.column_four_name,data1.column_five_name,
                     data1.column_six_name,data1.column_seven_name,data1.column_eight_name,data1.column_nine_name,data1.column_ten_name,data1.column_eleven_name,data1.column_twelve_name,data1.column_thirteen_name,data1.column_fourteen_name,data1.column_fifteen_name
                     ];


                      var count_array=[data1.count_one_table,data1.count_two_table,data1.count_three_table,data1.count_four_table,data1.count_five_table,
                     data1.count_six_table,data1.count_seven_table,data1.count_eight_table,data1.count_nine_table,data1.count_ten_table,data1.count_eleven_table,data1.count_twelve_table,data1.count_thirteen_table,data1.count_fourteen_table,data1.count_fifteen_table
                     ];


                     var total = 0;
                    for (var f = 0; f < count_array.length; f++) {
                        total += parseInt(count_array[f]);
                        }

                        if(total<=0){
                          //8cnt=parseInt(pr_values.length)-parseInt(total);
                        }
                        else{
                          cnt=parseInt(pr_values.length)-parseInt(total*columns);

                        }


                        
                      //  cnt=parseInt(pr_values.length)-parseInt(total);

                        console.log(cnt);

                         var id_new1=0;



                    // var sub_cnt=array_sum($count_array)



                 var html='<table class="table card-table table-vcenter problem-table">';
                 html+='<thead><tr>';

                     for(var i=0;i<columns;i++){



                       html+='<th>'+name_array[i]+'</th>';


                      }


                      html+='</tr></thead><tbody class="append-div-prblem">';




                     for(var j=0;j<count;j++){
                      html+='<tr class="tr-problem">';
                                            var htmlval='<tr class="tr-problem">';




var del_btn='';
                     for(var i=0;i<columns;i++){


                                           if(count_array[i]!=0){

                                            //html+='<td> <table class="table card-table table-vcenter"><tr>';
                                            //htmlval+='<td> <table class="table card-table table-vcenter"><tr>';

                    for(var k=0;k<count_array[i];k++){

                      for (var m = 0; m <= pr_values.length-1; m++) {


                        if(pr_values[m].column_id==i){
                                  if(pr_values[m].row_id==j){ 
                                    if(pr_values[m].sub_id==k){ 
                                        if (id_new1!=pr_values[m].format_id){

                                                                id_new1=pr_values[m].format_id;

                                     if(pr_values[m].column_id==columns-1){
                                      if(pr_values[m].sub_id==count_array[i]-1){
                         del_btn='<a href="javascript:void(0)" data-row="'+j+'" data-id="6" class="delte-prblem-row-btn" style="float: right;margin-right: -74px;"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                         }

                                         }



 //var text = $(pr_values[m].col_value).text();
 if(pr_values[m].col_value!=''){
 var text=pr_values[m].col_value; 
 var cls22='';
 }else{
 var text='nodata';
 var cls22='no-data';
 }

  if(pr_values[m].col_help_image!=''){
    var elem1='<i class="fa fa-picture-o" aria-hidden="true" style="float:right;margin-right:5px"></i>';

  }else{
    var elem1='';
  }

  if(pr_values[m].col_help_text!=''){
    var elem2='<i class="fa fa-text-width" aria-hidden="true" style="float:right;margin-right:5px"></i>';

  }else{
    var elem2='';
  }

 //console.log(text);
 // if(text)


                      html+='<td><li class="type-problem '+cls22+'" data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'">'+text+'</li><button type="submit" class="btn add_question_div" id="add_question_div"   data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'" style="float: right;padding: 0px;min-width: 1.375rem;"  onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1rem;"></i></button>'+elem1+elem2+''+del_btn+'</td>';
                      htmlval+='<td><li class="type-problem no-data" data-column="'+i+'" data-row="'+j+'">nodata</li><button type="submit" class="btn add_question_div" id="add_question_div"   data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'" style="float: right;padding: 0px;min-width: 1.375rem;"  onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1rem;"></i></button>'+del_btn+'</td>';

                          }
                           }
                          }
                          }
                        }

                      }





                                            //html+='</tr> </table></td>';
                                            //htmlval+='</tr> </table></td>';










                                           }else{


                                              for (var m = 0; m <= pr_values.length-1; m++) {
                                                //console.log(pr_values[m]);

                                                if(pr_values[m].column_id==i){
                                                      if(pr_values[m].row_id==j){ 
                                                        if (id_new1!=pr_values[m].format_id){

                                                                id_new1=pr_values[m].format_id;

                                                  if(pr_values[m].column_id==columns-1){
                                                     del_btn='<a href="javascript:void(0)" data-row="'+j+'" data-id="6" class="delte-prblem-row-btn" style="float: right;margin-right: -59px;"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                                  }


                                               

 //var text1 = $(pr_values[m].col_value).text();
   if(pr_values[m].col_value!=''){
 var text1=pr_values[m].col_value;
 var cls22='';
  }else{
  var text1='nodata';
  var cls22='no-data';
 }


   if(pr_values[m].col_help_image!=''){
    var elem1='<i class="fa fa-picture-o" aria-hidden="true" style="float:right;margin-right:5px"></i>';

  }else{
    var elem1='';
  }

  if(pr_values[m].col_help_text!=''){
    var elem2='<i class="fa fa-text-width" aria-hidden="true" style="float:right;margin-right:5px"></i>';

  }else{
    var elem2='';
  }


                                            html+='<td><li class="type-problem '+cls22+'" data-sub="0" data-column="'+i+'" data-row="'+j+'">'+text1+'</li><button type="button" class="btn add_question_div" id="add_question_div"  data-column="'+i+'" data-row="'+j+'"  style="float: right;padding: 0px;min-width: 1.375rem;" onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1rem;"></i></button>'+elem1+elem2+''+del_btn+'</td>';

                                              htmlval+='<td><li class="type-problem no-data" data-sub="0" data-column="'+i+'" data-row="'+j+'">nodata</li><button type="button" class="btn add_question_div" id="add_question_div"  data-column="'+i+'" data-row="'+j+'"  style="float: right;padding: 0px;min-width: 1.375rem;" onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1rem;"></i></button>'+del_btn+'</td>';

                                              }
                                              }
                                              }

                                              }


                                            }






                       


                      }

                                            html+='</tr>';
                                            htmlval+='</tr>';

                    }






                      html+='</tr></tbody></table>';
                                                                                  // console.log(htmlval);

                      
                      
                      $('#table_fr_id').val(table_id1);
                        $('#pr_table_name').val(out.data.format_name);

                      

                      $('.append-table').html(html);
                      $('.append-table-pr-row').html(htmlval);





     $('.problem-table').on('paste', 'textarea', function(e){
            //alert('fffss');
      var $this = $(this);
      $.each(e.originalEvent.clipboardData.items, function(i, v){

                     console.log(e.originalEvent.clipboardData.items);

          if (v.type === 'text/plain'){
              v.getAsString(function(text){
                  var x = $this.closest('td').index(),
                      y = $this.closest('.tr-problem').index(),
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

                          $this.closest('table').find('.tr-problem:eq('+row+') td:eq('+col+') textarea').val(v3);
                      });
                  });

              });
          }
      });
      return false;

  });
                      



                      


                 
                }
                else{
                    alert('Oops something went wrong!');
                }
            }
        })




    });


  $(document).on('click',".add-new-trans",function (e) {

   // var q_id = $(this).data('id');
    $(this).removeClass('row-plus-btn');
     $(this).removeClass('add-new-trans');
    $(this).addClass('row-minus-btn');
    $(this).html('<i class="fa fa-minus"></i>');

     var time = new Date().getTime();
    var tag = 'key-tags'+time;

                             //$('.hidden-row').find('.key-tags-1').addClass(tag);

    var html = $('.hidden-row').html();
   
    html = html.replace('key-tags-1',tag);
    $('.qst-transaction:last').after(html);
    $('.'+tag).selectize({
        delimiter: ',',
        persist: false,
       // maxItems: 1,

        create: function(input) {
            return {
                value: input,
                text: input
            }
        }
    });



      });


  $(document).on('click','.row-minus-btn',function(){

    $(this).parent().parent().remove();
})


  $(document).on('click',".add-new-trans-sent",function (e) {

   // var q_id = $(this).data('id');
    $(this).removeClass('row-plus-btn');
    $(this).removeClass('add-new-trans-sent');
    $(this).addClass('row-minus-btn');
    $(this).html('<i class="fa fa-minus"></i>');
    var html = $('.hidden-row-sentence').html();
    var time = new Date().getTime();
    var tag = 'key-tags'+time;
    html = html.replace('key-tags-2',tag);
    $('.qst-transaction-sent:last').after(html);
    $('.'+tag).selectize({
        delimiter: ',',
        persist: false,
        create: function(input) {
            return {
                value: input,
                text: input
            }
        }
    });



      });


  // quest-edit-type

//   $(function(){
//         $(document).on('click','.load-prodblem-div',function(e){

//     // $('.load-prodblem-div').on('click', 'a', function(e){
//          e.preventDefault();// prevent browser from opening url
//          $('#targetDiv').load(this.href);    
//     });
// });

//   $(document).ready(function(){
//    // your on click function here
//    $('.load-prodblem-div').click(function(){
//        $('.prblem-div').load($(this).attr('href'));
//        return false;
//    });
// });


$(document).on('focusout','#pr_table_name',function(e){

  var name=$(this).val();
  var table=$('#table_fr_id').val();



   $.ajax({
                        url:base_url+'edit-problem-format-name',
                        type:'post',
                        data:{name:name,table:table},
                        success: function(out){
                            var out = JSON.parse(out);
                            if(out.status == 1){


                               // if(out.answer_id){

                                    //alert(out.answer_id);
                                    var id=out.data;

                                    form.parent().html('<li style="list-style-type: none;" data_id="0" data-qst="'+id+'" class="disc quest-edit-type disc_val '+class1+class2+'" draggable="true">'+val+'</li>')

                                 // form.attr("data-answer",id);
                                 // parent.attr("data-answer",id);




                                //}

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






  

// alert("gfgfgfgf");
  });




    $(document).on('click','.type-problem',function(e){


       var column = $(this).data('column');

      var row = $(this).data('row');
      var sub = $(this).data('sub');


        var htm1 = $(this).html() ? $(this).html() : '';

          if($.trim(htm1)=="No data"){
           //  alert($.trim(htm1))
            htm1='';

          }
          console.log(htm1);





           $(this).parent().html('<div class="value_text_type" id="value_text_type" data-column="'+column+'" data-row="'+row+'"  data-sub="'+sub+'" data-type="text" style="height: 78px;" onfocusout="save_values_this(this)"></div><textarea name="value_text_type" id="value_text_type1" class=" value_text_type editor_content" data-type="text" style="display: none;" >'+$.trim(htm1)+'</textarea>');






     var quill343422 = new Quill('#value_text_type', {
    theme: 'snow',   // Specify theme in configuration
    modules: {
      // Equivalent to { toolbar: { container: '#toolbar' }}
          toolbar: toolbarOptions

    }
  });

      var elem = document.querySelector('.value_text_type');
                  elem.children[0].innerHTML=htm1;




      // $(this).parent().html('<textarea id="input-field"  class="answer-colum-highlight '+class1+class2+'" style="height:'+height1+';width:'+width1+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;cursor:text;border: 1px solid #999;"  data-qst="'+dataqst+'" spellcheck="false" >'+$.trim(htm1)+'</textarea>');


       


      });


    function save_values_this(e){

        $target = $(e.target);

//          if(!$target.closest('.value_text_type').length){
// alert('hxhjhcjx');
//          } 


    // if(!$(e.target).is('.ql-toolbar')){

      

    // }



          //var container = $(".ql-toolbar");
              // if (container.is(e.target) && container.has(e.target).length !== 0){
              //  alert('hxhjhcjx');
              // } 




       var col=$(e).data('column');
        var rows=$(e).data('row');

        var sub=$(e).data('sub');
        var type='text';


        var table_id=$('#table_fr_id').val();
        var table_name=$('#pr_table_name').val();

        var q_id=0;

         var form = $(e);

        var elem = document.querySelector('.value_text_type');
        var val=elem.children[0].innerHTML;

console.log(col);

         $.ajax({
            url:base_url+'add-problem-format-values',
            type:'post',
            data:{type:type,col:col,rows:rows,sub:sub,q_id:q_id,table_id:table_id,val:val,table_name:table_name},
            success: function(out){
                var out = JSON.parse(out);
                if(out.status==1){

                  var data=out.data[0];
                  

                   if(data.col_help_image!=''){
    var elem1='<i class="fa fa-picture-o" aria-hidden="true" style="float:right;margin-right:5px"></i>';

  }else{
    var elem1='';
  }

   if(data.col_help_text!=''){
    var elem2='<i class="fa fa-text-width" aria-hidden="true" style="float:right;margin-right:5px"></i>';

  }else{
    var elem2='';
  }

                  form.parent().html('<li class="type-problem" data-sub="'+sub+'" data-column="'+col+'" data-row="'+rows+'">'+val+'</li><button type="button" class="btn add_question_div" id="add_question_div" data-column="'+col+'" data-row="'+rows+'" data-sub="'+sub+'" style="float: right;padding: 0px;min-width: 1.375rem;" onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1rem;"></i></button>'+elem1+elem2+'');

                }
              }
            });



    }




$(document).on('click','.delete_quest',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
//alert('hhhhhj');
    $.confirm({
        title: 'Confirm delete!',
        content: 'Cant be reversed!',
        buttons: {
            confirm: function () {
                $.ajax({
                    type:'post',
                    url:base_url+'delete-quest-table',
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

    
        $(document).on('click','.copy-excel',function(e){

          var table = $(this).data('id');
                    var order = $(this).data('order');




         // alert('hhhjhj');

         $('.quest-edit-type[data-table="'+table+'"][data-order="'+order+'"]').each(function(e){
          var qst=$(this).data('qst');
           if($(this).hasClass('number')){
            var cls='number';
          }else{
            var cls='';
          }
          

        // if(i==0) ids += $(this).attr('data-id');

        // else ids += ','+$(this).attr('data-id');

         $(this).parent().html('<textarea id="input-field-excel"  class="answer-colum-highlight excel-input '+cls+'" style=";margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;cursor:text;border: 1px solid #999;    width: 100%;"   data-table="'+table+'"  data-qst="'+qst+'"  spellcheck="false" ></textarea>');


      // })



        i++;
    })

$(this).text('Save');
$(this).removeClass('copy-excel');
$(this).addClass('save-excel');





          });



          $('.table-qst').on('paste', 'textarea', function(e){
      var $this = $(this);
      $.each(e.originalEvent.clipboardData.items, function(i, v){

                     console.log(e.originalEvent.clipboardData.items);

          if (v.type === 'text/plain'){
              v.getAsString(function(text){
                  var x = $this.closest('td').index(),
                      y = $this.closest('.tr-quest').index()-1,
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

                          if($this.closest('table').find('.tr-quest:eq('+row+') td:eq('+col+') textarea').hasClass('number')){

                          //    // v3.replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                          //    // alert(v3)
                            val=v3.toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        //alert("hjjj");
                          $this.closest('table').find('.tr-quest:eq('+row+') td:eq('+col+') textarea').val(val);
                            
                          }else{
                              $this.closest('table').find('.tr-quest:eq('+row+') td:eq('+col+') textarea').val(v3);
                          }

                          // $this.closest('table').find('.tr-quest:eq('+row+') td:eq('+col+') textarea').val(v3);
                      });
                  });

              });
          }
      });
      return false;

  });


    

        $(document).on('click','.save-excel',function(e){
          var table = $(this).data('id');


            var arr = [];

                   $('.excel-input[data-table="'+table+'"]').each(function(e){

                    var input=$(this).val();
                    var qst=$(this).data('qst');

                     arr.push({
                     val: input, 
                    id:  qst
                          });


                    });







                 // console.log(arr);


        $.ajax({
            url:base_url+'add-copy-excel',
            type:'POST',
            data:{array:arr},
            
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

                  window.location.reload();
            
                }
                else{
                    alert('Oops something went wrong!');
                }
            }
        })



            });



        $(document).on('click','.copy-excel-pr',function(e){

          //var table = $(this).data('id');



         // alert('hhhjhj');

         $('.type-problem').each(function(e){
          var column=$(this).data('column');
          var row=$(this).data('row');
          var sub=$(this).data('sub');

        // if(i==0) ids += $(this).attr('data-id');

        // else ids += ','+$(this).attr('data-id');

         $(this).parent().html('<textarea id="input-field-excel-pr"  class="answer-colum-highlight excel-input-pr" style=";margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;cursor:text;border: 1px solid #999;"  data-column="'+column+'"  data-row="'+row+'" data-sub="'+sub+'"  spellcheck="false" ></textarea>');


      // })



        i++;
    })

$(this).text('Save');
$(this).removeClass('copy-excel-pr');
$(this).addClass('save-excel-pr');





          });



         $(document).on('click','.save-excel-pr',function(e){
          var table = $('#table_fr_id').val();


            var arr = [];

                   $('.excel-input-pr').each(function(e){

                    var input=$(this).val();
                    var column=$(this).data('column');
                    var row=$(this).data('row');
                    var sub=$(this).data('sub');

                     arr.push({
                     val: input, 
                    column:  column,
                    row:  row,
                    sub:  sub
                          });


                    });



                 //  console.log(arr);


        $.ajax({
            url:base_url+'add-copy-excel-format',
            type:'POST',
            data:{array:arr,table:table},
            
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

                  window.location.reload();
            
                }
                else{
                    alert('Oops something went wrong!');
                }
            }
        })



            });





      



    $(document).on('click','.quest-edit-type',function(e){

        // var e1 = $.Event( "keydown", { keyCode: 13 } );
        //     $('#input-field').trigger(e1);
           // alert("ghhhgf");


                 $(this).attr('title', 'Press ctrl+enter for new line');


      

      var table = $(this).data('id');

      var dataid = $(this).data('order');
      var dataqst = $(this).data('qst');

       console.log($(this).parent().html());



      var width1 = $(this).width();
                   var height1 = $(this).height();
                                // var htm1 = elem.find('li').html() ? elem.find('li').html() : '';
    var htm1 = $(this).html() ? $(this).html() : '';

  if($.trim(htm1)=="No data"){
   //  alert($.trim(htm1))
htm1='';

  }

 if($(this).hasClass('line')){
                var class1="line";
              }else{
                var class1="";
              }

              if($(this).hasClass('sub-tab-1')){
                var class2="sub-tab-1";
              }else{
                var class2="";
              }

               if($(this).hasClass('number')){
                var class3="number";
              }else{
                var class3="";
              }

       $('#input-field').focus();
       


      // $(this).parent().html(' <textarea id="input-field1"  class="answer-colum-highlight tinymce-body '+class1+class2+class3+'" style="height:'+height1+';width:'+width1+';margin:0px; background:rgba(256,256,256,0.9); text-shadow:0 0 0 #000 !important; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;cursor:text;border: 1px solid #999;"  data-qst="'+dataqst+'" spellcheck="false" >'+$.trim(htm1)+'</textarea>');


       $('#input-field').focus();


       

  //        var toolbarOptions = [
  //   ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  // ['blockquote', 'code-block'],

  // [{ 'header': 1 }, { 'header': 2 }],               // custom button values
  // [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  // [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  // [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  // [{ 'direction': 'rtl' }],                         // text direction

  // [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
  // [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

  // [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  // [{ 'font': [] }],
  // [{ 'align': [] }],

  // ['clean']                                          // remove formatting button
  // ];


  //       var quill566 = new Quill('.input-qst-nw', {
  //   theme: 'snow',   // Specify theme in configuration
  //   modules: {
  //     // Equivalent to { toolbar: { container: '#toolbar' }}
  //       toolbar: toolbarOptions
  //   }

  // });

       //$('#input-field').select();



       })



    $(document).on('click','.quest-edit-type-append',function(e){

        // var e1 = $.Event( "keydown", { keyCode: 13 } );
        //     $('#input-field').trigger(e1);
           // alert("ghhhgf");


      var table = $(this).data('table');

      var dataid = $(this).data('order');
      var datacolumn = $(this).data('column');
     // alert(datacolumn);
      var datarow = $(this).data('row');

      var datasub = $(this).data('sub');

       console.log($(this).parent().html());



      var width1 = $(this).width();
                   var height1 = $(this).height();
                                // var htm1 = elem.find('li').html() ? elem.find('li').html() : '';
    var htm1 = $(this).html() ? $(this).html() : '';
     if($.trim(htm1)=="No data"){
   //  alert($.trim(htm1))
htm1='';

  }
  
 if($(this).hasClass('line')){
                var class1="line";
              }else{
                var class1="";
              }

              if($(this).hasClass('sub-tab-1')){
                var class2="sub-tab-1";
              }else{
                var class2="";
              }

              if($(this).hasClass('number')){
                var class3="number";
              }else{
                var class3="";
              }

// <textarea id="input-field"  class="answer-colum-highlight '+class1+class2+'" style="height:'+height1+';width:'+width1+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;cursor:text;border: 1px solid #999;"  data-qst="'+dataqst+'" spellcheck="false" >'+$.trim(htm1)+'</textarea>




      $(this).parent().html('<textarea id="input-field-new"  class="answer-colum-highlight '+class1+class2+class3+'" style="height:'+height1+';width:'+width1+';margin:0px; background:rgba(256,256,256,0.9);  text-shadow:0 0 0 #000 !important; cursor:text;border: 1px solid #999; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm1+'" data-column="'+datacolumn+'" data-table="'+table+'" data-row="'+datarow+'" data-sub="'+datasub+'" spellcheck="false" >'+$.trim(htm1)+'</textarea>');


       })

          $(document).on('focusout','#input-field-new',function(e){


            // var row=$(this).data('column');

                                 var datacolumn = $(this).data('column');
                                  var datarow = $(this).data('row');
                                  var datatable = $(this).data('table');

                            var parent = $(this).parent();
                    if($(this).hasClass('sub-tab-1')){
                        var sub=1;

                        }else{
                        var sub=0;

                        }

                        if($(this).hasClass('line')){
                var class1="line";
                var underline=1;
              }else{
                var class1="";
                var underline=0;
              }

              if($(this).hasClass('sub-tab-1')){
                var class2="sub-tab-1";
              }else{
                var class2="";
              }

              if($(this).hasClass('number')){
                var class3="number";
              }else{
                var class3="";
              }

                          //  $(this).hasClass


                        // if(e.keyCode == 13){
                              var val=$(this).val();

                           

                var htm='<li class="disc" draggable="true" style="white-space: pre;">'+val+'</li>' ;

                                      var form = $(this);


 


                //if(val) parent.html(htm);



                     $.ajax({
                        url:base_url+'edit-question-table-val-append',
                        type:'post',
                        data:{val:val,column:datacolumn,sub:sub,row:datarow,table:datatable},
                        success: function(out){
                            var out = JSON.parse(out);
                            if(out.status == 1){


                               // if(out.answer_id){

                                    //alert(out.answer_id);
                                    var id=out.data;

                                    form.parent().html('<li style="list-style-type: none;" data_id="0" data-qst="'+id+'" class="disc quest-edit-type disc_val '+class1+class2+class3+'" draggable="true">'+val+'</li>')

                                 // form.attr("data-answer",id);
                                 // parent.attr("data-answer",id);




                                //}

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



                            //}



                      // }
        });



            

            $(document).on('focusout','.quest-edit-type',function(e){


            // var row=$(this).data('column');
//alert("bbvb");
                    var dataqst = $(this).data('qst');

                    var parent = $(this).parent();
                    if($(this).hasClass('sub-tab-1')){
                        var sub=1;

                        }else{
                        var sub=0;

                        }

                        if($(this).hasClass('line')){
                var class1="line";
                var underline=1;
              }else{
                var class1="";
                var underline=0;
              }

              if($(this).hasClass('sub-tab-1')){
                var class2="sub-tab-1";
              }else{
                var class2="";
              }

              if($(this).hasClass('number')){
                var class3="number";
              }else{
                var class3="";
              }

                          //  $(this).hasClass


                      //  if(e.keyCode == 13){
                              var val=$(this).html();

                             //alert(val);
                             

                           

                var htm='<li class="disc" draggable="true" style="white-space: pre;">'+val+'</li>' ;

                                      var form = $(this);


 
                //if(val) parent.html(htm);


                     $.ajax({
                        url:base_url+'edit-question-table-val',
                        type:'post',
                        data:{val:val,dataqst:dataqst,sub:sub,underline:underline },
                        success: function(out){
                            var out = JSON.parse(out);
                            if(out.status == 1){


                               // if(out.answer_id){

                                    //alert(out.answer_id);
                                    var id=out.answer_id;


                                    // form.parent().html('<li style="list-style-type: none;" data_id="0" data-qst="'+dataqst+'" class="disc quest-edit-type disc_val '+class1+class2+class3+'" draggable="true">'+val+'</li>')

                                 // form.attr("data-answer",id);
                                 // parent.attr("data-answer",id);




                                //}

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



                           // }



                      // }
        });



$('.single_line_qst ').click(function(){
                    
                     $('#input-field').parent().toggleClass('line');
                     $('#input-field').toggleClass('line');
                   

                });
  // $(document).on('click','.edit-qst-btn',function(e){

  //           var table = $(this).data('id');
  //          // alert($('#table_tval').val());
  //           var dataid = $(this).data('order');
            

 

  // $("#tableModal").modal('show');

  //  $('#add-ans-btn').attr('data-id',table);
  // $('#row-form').find('.tab_id').val(table);
  //  $('#row-form').find('.order-id').val(dataid);

  // $("#add-ans-btn").click();
  //                                   // $('#getModal').modal('hide');

  


  // })



  $(document).on('click',".add-type",function (e) {
    //alert("fddffd");



    $('.type-tab').each(function (index1, value1) {
      $(this).removeClass('acive-tab');


    });

    $(this).addClass('acive-tab');

  //alert(document)

  if($(this ).data('id')=="0"){



       var i=0;
      if($(".edit-textbox").length > 0){
        


  $('.edit-qst-div').find('.text-box').each(function (index, value) {

i++;

    });
}else{
  //alert("gfgf");

  $('.append-new').find('.text-box').each(function (index, value) {

i++;

    });

}

          //alert(i);

    // if(i==1){
    //       $('.text-box').show();



    //       }else{
            var html='<div class="col-lg-2 col-md-12 " style=""></div><div class="col-md-12 col-lg-10 text-box" > <div class="form-group"><label class="form-label">Text</label><div class="editor'+i+'" id="product_description_div" data-id="'+i+'" style="height: 103px;"></div><textarea name="product_description" id="text_qst" class="editor_content" style="display: none;" required></textarea><input type="hidden" id="order" value="'+i+'" class="order-quill"></div></div>';


console.log(html);

                      $('.append-new').append(html);

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
                      //$('#order-quill').val(i);

                        var quill = new Quill('.editor'+i+'', {
    theme: 'snow',   // Specify theme in configuration
    modules: {
      // Equivalent to { toolbar: { container: '#toolbar' }}
       toolbar: toolbarOptions
    }
  });



   quill.on('text-change', function(delta, oldDelta, source) {

    var elem = document.querySelector('.editor'+i+'');
    var html_content=elem.children[0].innerHTML;
    //var id=1;
    var order=elem.getAttribute('data-id');
                   var qstion=$('#question_id').val();


    // console.log(elem.getAttribute('data-id'));

    //alert(elem.closest('.order-quill').value);


      //  console.log(elem.children[0].innerHTML);


       $.ajax({
            url:base_url+'add-question-text',
            type:'post',
            data:{html_content:html_content,order:order,qstion:qstion},
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


   // console.log(JSON.stringify(quill.getContents()));
  $(elem).parent().find('.editor_content').val(elem.children[0].innerHTML);
  });
                      


   

           // }



     //$('.add_table').hide();
     //$('.qst-transaction-row').hide();

       
       
  }else if($(this ).data('id')=="1"){
    var cnt=$(this ).data('id');


     var k=0;

    $('.edit-qst-div').find('.add_row_quest').each(function (index, value) {
       $(this).removeClass('active');
       k++;

    });
    //var j=k-1;
   // var k=$('.add_table').length;
   //    alert(k);


   //  if(k==1){
   //        $('.add_table').show();


   //        }else{
            var html='<div class="col-lg-4 col-md-12 " style=""></div><div class="col-lg-8 col-md-12 add_table" style="margin-top: 15px;">';
            $('.add_table').find('.choose_type').addClass('active');
              //$('.add_table').find('.choose_type').data('id',k);
              $('.add_table').find('.choose_type').attr('data-id',k);
              $('.add_table').find('.create-tab').attr('data-id',k);




             html+=$('.add_table').html();

             html+='  </div>';
            // html=html.find('.choose_type').html();

              // html = html.addClass('key-tags',choose_type);


            //console.log(html.find('.choose_type').html());

            $('.append-new').append(html);


               $('.choose_type').select2();

      // }

        
        // $('.text-box').hide();
        // $('.qst-transaction-row').hide();

    
    //$('.add_table').show();

  }else if($(this ).data('id')=="2"){


        var m=0;
        var m22=0;
        if($('.append-new').find('.qst-transaction-row[data-type="paragrph"]').length){


     $('.append-new').find('.qst-transaction-row[data-type="paragrph"]').each(function (index, value) {

      var ord=$(this).data('order');
       //$(this).removeClass('active');
       // m++;

        m=ord;
       m22++;

    });
        }else{

        //   var m=0;
        // var m22=0;
         

 if($('.edit-qst-div div:last').html()!=''){
  // console.log($('.edit-qst-div div:last').find('.delete-trans').length);


          if($('.edit-qst-div div:last').find('.delete-trans').length>0){
             //alert("gfgfgf");

            


             $('.edit-qst-div').find('.qst-transaction-row').each(function (index, value) {


       //$(this).removeClass('active');
       // if()
         var ord=$(this).data('order');
                  // console.log(ord);  

       //$(this).removeClass('active');
       // m++;

        m=ord;
       m22++;

    });

          }else{
  // alert(m);
   //alert("jjjj");


                  $('.edit-qst-div').find('.qst-transaction-row').each(function (index, value) {

       //$(this).removeClass('active');
       // if()
       //  var ord=$(this).data('order');
       //$(this).removeClass('active');
        m++;

       // m=ord;
       m22++;

    });



          }
        }else{

                 $('.edit-qst-div').find('.qst-transaction-row').each(function (index, value) {

       //$(this).removeClass('active');
       // if()
       //  var ord=$(this).data('order');
       //$(this).removeClass('active');
        m++;

       // m=ord;
       m22++;

    });

        }

   

     

        }

     // var h=m-1;
    
           // $('.qst-transaction-row').show();

             var html='<div class="col-lg-2 col-md-12 " style=""></div><div class="row col-lg-9 col-md-12 qst-transaction-row"  style="margin-top:20px" data-order="'+m+'"  data-type="paragrph" data-contentorder="'+m22+'">';
                        // $('.hidden-row').find('.key-tags-1').addClass('keytag'+m);
                         $('.hidden-row').find('.trans-input').attr('data-order',m);
                                                  $('.hidden-row').find('.trans-input').attr('data-contentorder',m22);


                             
                     var tag = 'keytag'+m;
 


             html+=$('.hidden-row').html();
             html+='  </div>';

             html = html.replace('key-tags-1',tag);

          // console.log(html);

            $('.append-new').append(html);

            $('.keytag'+m).selectize({
        delimiter: ',',
        persist: false,
        create: function(input) {
            return {
                value: input,
                text: input
            }
        }
    });
            // $('.add_table').hide();
        //$('.text-box').hide();

    

  }else if($(this ).data('id')=="3"){


        var m=0;
        var m22=0;

    //  $('.append-new').find('.qst-transaction-row[data-type="paragrph"]').each(function (index, value) {
    //    //$(this).removeClass('active');
    //    m++;

    // });


       if($('.append-new').find('.qst-transaction-row[data-type="sentnce"]').length){

     $('.append-new').find('.qst-transaction-row[data-type="sentnce"]').each(function (index, value) {
       //$(this).removeClass('active');
       // m++;

       var ord=$(this).data('order');
                  // console.log(ord);  

       //$(this).removeClass('active');
       // m++;

        m=ord;
       m22++;

    });
        }else{

 if($('.edit-qst-div div:last').html()!=''){

                    if($('.edit-qst-div div:last').find('.delete-trans').length>0){


    $('.edit-qst-div').find('.qst-transaction-row').each(function (index, value) {
       //$(this).removeClass('active');
        var ord=$(this).data('order');
                  // console.log(ord);  

       //$(this).removeClass('active');
       // m++;

        m=ord;

    });
  }else{

    $('.edit-qst-div').find('.qst-transaction-row').each(function (index, value) {
       //$(this).removeClass('active');
       m++;

    });

  }
}else{
  $('.edit-qst-div').find('.qst-transaction-row').each(function (index, value) {
       //$(this).removeClass('active');
       m++;

    });

}

     

        }
     // var h=m-1;
    
           // $('.qst-transaction-row').show();

             var html='<div class="col-lg-2 col-md-12 " style=""></div><div class="row col-lg-9 col-md-12 qst-transaction-row"  style="margin-top:20px" data-order="'+m+'"  data-type="sentnce" data-contentorder="'+m22+'">';
                         // $('.hidden-row-sentence').find('.key-tags').addClass('keytag'+m);
                          // $('.hidden-row').find('.key-tags').addClass('keytag'+m);
                         $('.hidden-row-sentence').find('.trans-input').attr('data-order',m);
                         $('.hidden-row-sentence').find('.trans-input').attr('data-contentorder',m22);

                           var tag = 'keytag-'+m;


             html+=$('.hidden-row-sentence').html();
             html+='  </div>';

                          html = html.replace('key-tags-2',tag);


          //  console.log(html);

            $('.append-new').append(html);

            $('.keytag-'+m).selectize({
        delimiter: ',',
        persist: false,
        create: function(input) {
            return {
                value: input,
                text: input
            }
        }
    });
            // $('.add_table').hide();
        //$('.text-box').hide();

    

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

    $(document).on('click',".create_table",function (e) {

      $('#tableModal').show();
      // $('#tableModal').css('position','relative');
      //       $('#tableModal').css('position','relative');


    });



  



         $(document).on('focusout',".trans-input",function (e){
                var transaction=$(this).val();
                var type=$(this).data('type');
                 var tr_id=$(this).attr('data-trns');
                // alert(tr_id);
                var obj=$(this);
                //var order=$(this).parent().parent().parent().find('.qst-transaction-row').data('order');
                var order=$(this).data('order');
               var qstion=$('#question_id').val();
               var cont_order=$(this).data('contentorder');



                                    // console.log($(this).parent().parent().parent().find('.trans-key').val());
                if(transaction!=''){

                  $.ajax({
            url:base_url+'add-transaction-nw',
            type:'post',
            data:{transaction:transaction,type:type,order:order,tr_id:tr_id,qstion:qstion,cont_order:cont_order},
            success: function(out){
                var out = JSON.parse(out);
                if(out.status == 1){
                    var trans=out.data;
                    obj.attr('data-trns',trans);

                    obj.parent().parent().parent().find('.trans-key').attr('data-trns',trans);
                    //console.log($(this).parent().parent().find('.trans-key').html());

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





              });


           $(document).on('focusout',".col_no-pr",function (e) {
      var num=$(this).val();


      var html='';

      for (var i = 0; i <
       num; i++) {

        html+='<div class="col-md-12" style="display: flex;" ><div class="col-md-3 col-lg-3"><div class="form-group"><label class="form-label">Column  Name</label> <input type="text" class="form-control col_name" name="column_name'+i+'" id="column_one_name" placeholder="Enter Column Name"></div></div>'+
        '<div class="col-md-3 col-lg-3"><div class="form-group"><label class="form-label">Column  Width</label><input type="text" class="form-control numberonly col_width" name="column_width'+i+'" id="column_width'+i+'" placeholder="Enter Column Width" required></div></div><div class="col-md-3 col-lg-3"><div class="form-group" style="height:65px"><label class="form-label">Calculate Sum</label><label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px"><input type="checkbox" class="custom-control-input column-check" name="column_check'+i+'" id="column_one_check"><span class="custom-control-label">Check</span></label></div></div><div class="col-md-3 col-lg-3">'+
                '<div class="form-group" style="height:65px">'+
                  '<label class="form-label">Create Sub table</label>'+
                  '<label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">'+
                    '<input type="checkbox" class="custom-control-input sub-tab" name="column_sub_check'+i+'" id="column_sub_one_check"  data-id="'+i+'">'+

                    '<input type="hidden" class="form-control count_sub_col'+i+'" name="count_sub_'+i+'_column" id="count_sub_one_column" placeholder="Enter No of Columns" >'+
                    '<div id="sub_width'+i+'"></div>'+
                    '<span class="custom-control-label"></span>'+
                  '</label></div></div></div>';
        

         
         


      }

      $('#col_appnd_div_pr').html(html);

      //$('#tableModal').show();



    });





     $(document).on('focusout',".col_no",function (e) {
      var num=$(this).val();


      var html='';

      for (var i = 0; i <
       num; i++) {

        html+='<div class="col-md-12" style="display: flex;" ><div class="col-md-3 col-lg-3"><div class="form-group"><label class="form-label">Column  Name</label> <input type="text" class="form-control col_name" name="column_name'+i+'" id="column_one_name" placeholder="Enter Column Name"></div></div>'+
        '<div class="col-md-3 col-lg-3"><div class="form-group"><label class="form-label">Column  Width</label><input type="text" class="form-control numberonly col_width" name="column_width'+i+'" id="column_width'+i+'" placeholder="Enter Column Width" required></div></div><div class="col-md-3 col-lg-3"><div class="form-group" style="height:65px"><label class="form-label">Calculate Sum</label><label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px"><input type="checkbox" class="custom-control-input column-check" name="column_check'+i+'" id="column_one_check"><span class="custom-control-label">Check</span></label></div></div><div class="col-md-3 col-lg-3">'+
                '<div class="form-group" style="height:65px">'+
                  '<label class="form-label">Create Sub table</label>'+
                  '<label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">'+
                    '<input type="checkbox" class="custom-control-input sub-tab" name="column_sub_check'+i+'" id="column_sub_one_check"  data-id="'+i+'">'+

                    '<input type="hidden" class="form-control count_sub_col'+i+'" name="count_sub_'+i+'_column" id="count_sub_one_column" placeholder="Enter No of Columns" >'+
                    '<div id="sub_width'+i+'"></div>'+
                    '<span class="custom-control-label"></span>'+
                  '</label></div></div></div>';
        

         


      }

      $('#col_appnd_div').html(html);

      //$('#tableModal').show();



    });



     $(document).on('click','.sub-tab',function(){
 var id = $(this).attr('data-id');

 $('#editModal'+id+'').modal('show');
 $('#tableModal').css('position','relative');


})


     $(document).on('click','.add_subtable_btn',function(){

    var id = $(this).data('id');
    var count=$('.count_sub[data-id="'+id+'"]').val();
   //var htm=$('.column_width_div'+id+'').html();
    var htm='';
    var val='';
    var sum='';
   for(var i = 1; i <= count; i++) {

           val +=$('#col_width'+i+'[data-id="'+id+'"] ').val()+','; 
           //console.log($('#col_sub_sum_check'+i+'[data-id="'+id+'"]').val());
           //if($('#checkMeOut').prop('checked')) {
           if($('#col_sub_sum_check'+i+'[data-id="'+id+'"]').prop('checked')){

            sum +='1'+','; 
           }else{
            sum +='0'+','; 
           }

          // sum +=$('#col_sub_sum_check'+i+'[data-id="'+id+'"] ').val()+','; 

          // var value = $('#transaction_ids'+q_id+'').val();
                    // if(value) $('#transaction_ids'+q_id+'').val(value+','+out.data);
                    // else $('#transaction_ids'+q_id+'').val(out.data);
          
      
    }

      htm+='<div class="form-group">'+
            '<input type="hidden" class="form-control col_width'+id+'" name="col_width'+id+'" id="col_width'+id+'" placeholder="Enter No of Columns" value="'+val+'">'+
            '<input type="hidden" class="form-control col-sub-sum'+id+'" name="col_sub_sum'+id+'" id="col_sub_sum'+id+'" placeholder="Enter No of Columns" value="'+sum+'">'+

            '</div>' ;

   
     $('.count_sub_col'+id+'').val(count);
   $('#sub_width'+id+'').html(htm);
   $('#sub_width_edit'+id+'').html(htm);
   $('#editModal'+id+'').modal('hide');
    //$('#tableModal').css('position','fixed');


})





$(document).on('click','#create-tbl-btn',function(){
     var q_id = $(this).data('id');
    var cols = $(this).parent().parent().parent().parent().parent().find('.col_name').each(function(){
        return $(this);
        console.log($(this));
    });
    var wids = $(this).parent().parent().parent().parent().parent().find('.col_width').each(function(){
        return $(this);
    });

var splashArray = new Array();

    //  $(this).parent().parent().parent().parent().parent().find('input[name="column_one_check[]"]').each(function(){
       

    // });


    // var cols_err = 1;
    // var wids_err = 1;
    // for(var i=0;i<cols.length;i++){
    //     // if(!$.trim(cols[i].value)){
    //     //     cols_err = 0;
    //     //     cols[i].focus();
    //     //     break;
    //     // }
    //     if(!$.trim(wids[i].value)){
    //         wids_err = 0;
    //         wids[i].focus();
    //         break;
    //     }
    // }


   console.log(cols.length);

   $('#col-form').find(':checkbox:not(:checked)').attr('value', '0').prop('checked', true);

//var formData=$('#col-form').serialize();

var elem = document.querySelector('.headenote');
    var html_content=elem.children[0].innerHTML;


var elem1 = document.querySelector('.footernote');
    var html_content1=elem1.children[0].innerHTML;
       //form_data.append("header_note",html_content);
       // formData.push({name: 'header_note', value: html_content});

       // var formData =$('#col-form').serialize()+'&'+$.param({ 'header_note': html_content });
        var myform = document.getElementById("col-form");
    var form_data = new FormData(myform);

        form_data.append("header_note",html_content);
        form_data.append("footer_note",html_content1);






//     $.each($('form input[type=checkbox]')
//     .filter(function(idx){
//         return $(this).prop('checked') === false
//     }),
//     function(idx, el){
//         // attach matched element names to the formData with a chosen value.
//         var emptyVal = "1";
//         formData += '&' + $(el).attr('name') + '=' + emptyVal;
//     }
// );



 $('#col-form input:checkbox').each(function(){
         splashArray.push($(this).val());
    });

 console.log(splashArray);


//console.log(splashArray[0]);
    //console.log(formData['column_one_check']) ;

   
   // if(wids_err){

        $.ajax({
            url:base_url+'add-table-ajax',
            type:'post',
            data:form_data,
            cache: false,
        processData: false,
        contentType: false,
            success: function(out){
                var out = JSON.parse(out);
                if(out.status==1){
                  var table_id=out.data;
console.log(table_id);
                  // $('#add-ans-btn').data(out);
                  // var table_id=out.data;
                  $('#add-ans-btn').data('id', table_id);
                  // create-tbl-btn
                         $('.tab_id').val(table_id);




                  
                                   // $('#add-ans-btn').data('id', table_id);



                  alert('Table added successfully');

                  window.location.reload();
                 //    $('#tableModal').find('.modal-dialog').css('max-width','1200px');
                 //    var out = '<div class="col-lg-12 rows" id="col-div" style="display:flex;">';
                 //    var num = 2;
                 //    if(cols.length>5) num = 1;
                 //    for(var i=0;i<cols.length;i++){

                 //        if(splashArray[i]=='1'){

                 //        var html = '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">'+cols[i].value+'</label>'+
                 //        '<input type="text" class="form-control number" name="row_value[]" placeholder="Enter Value" required></div></div>';

                 //        }else{
                 //            var html = '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">'+cols[i].value+'</label>'+
                 //        '<input type="text" class="form-control " name="row_value[]" placeholder="Enter Value" required></div></div>';
                 //        }

                            

                 //        out += html;
                 //    }
                 //    // out += '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label">Keywords</label><input type="text" class="form-control key-tags" name="val_keys[]" value="" placeholder="Enter Keywords"></div></div><div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-plus-btn"><i class="fa fa-plus"></i></button></div></div></div>';
                 //    out += '<div class="col-md-'+num+' col-lg-'+num+'">'+
                 //    '<div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-plus-btn" data-id="'+q_id+'">'+
                 //    '<i class="fa fa-plus"></i></button></div></div></div>';


                 // console.log(out);
                 //    $('#row-data').val(out);
                 //    $('#define-row-div').html(out);
                 //    // $(document).find('.key-tags').each(function(){
                 //    //     $(this).selectize({
                 //    //         delimiter: ',',
                 //    //         persist: false,
                 //    //         create: function(input) {
                 //    //             return {
                 //    //                 value: input,
                 //    //                 text: input
                 //    //             }
                 //    //         }
                 //    //     });
                 //    // })
                 //    $('#define-cols-div').hide();
                 //    $('#btn-two').hide();
                 //    $('#define-row-div').show();
                 //    $('#btn-three').show();
                }
                else{
                    alert('Oops something went wrong!');
                }
            }
        })
   // }
})



$(document).on('click','#create-tbl-pr-btn',function(){
     var q_id = $(this).data('id');
    var cols = $(this).parent().parent().parent().parent().parent().find('.col_name').each(function(){
        return $(this);
        console.log($(this));
    });
    var wids = $(this).parent().parent().parent().parent().parent().find('.col_width').each(function(){
        return $(this);
    });

var splashArray = new Array();

    //  $(this).parent().parent().parent().parent().parent().find('input[name="column_one_check[]"]').each(function(){
       

    // });


    // var cols_err = 1;
    // var wids_err = 1;
    // for(var i=0;i<cols.length;i++){
    //     // if(!$.trim(cols[i].value)){
    //     //     cols_err = 0;
    //     //     cols[i].focus();
    //     //     break;
    //     // }
    //     if(!$.trim(wids[i].value)){
    //         wids_err = 0;
    //         wids[i].focus();
    //         break;
    //     }
    // }


   console.log(cols.length);

   $('#col-form1').find(':checkbox:not(:checked)').attr('value', '0').prop('checked', true);

      var tablename = $('#col-form1').find('#table_name').val();


//var formData=$('#col-form').serialize();

var elem = document.querySelector('.headenote');
    var html_content=elem.children[0].innerHTML;


var elem1 = document.querySelector('.footernote');
    var html_content1=elem1.children[0].innerHTML;
       //form_data.append("header_note",html_content);
       // formData.push({name: 'header_note', value: html_content});

       // var formData =$('#col-form').serialize()+'&'+$.param({ 'header_note': html_content });
        var myform = document.getElementById("col-form1");
    var form_data = new FormData(myform);

        form_data.append("header_note",html_content);
                form_data.append("footer_note",html_content1);






//     $.each($('form input[type=checkbox]')
//     .filter(function(idx){
//         return $(this).prop('checked') === false
//     }),
//     function(idx, el){
//         // attach matched element names to the formData with a chosen value.
//         var emptyVal = "1";
//         formData += '&' + $(el).attr('name') + '=' + emptyVal;
//     }
// );



 $('#col-form1 input:checkbox').each(function(){
         splashArray.push($(this).val());
    });

 console.log(splashArray);


//console.log(splashArray[0]);
    //console.log(formData['column_one_check']) ;

   
   // if(wids_err){

        $.ajax({
            url:base_url+'add-table-ajax',
            type:'post',
            data:form_data,
            cache: false,
        processData: false,
        contentType: false,
            success: function(out){
                var out = JSON.parse(out);
                if(out.status==1){
                  var table_id=out.data;
console.log(table_id);
                  // $('#add-ans-btn').data(out);
                  // var table_id=out.data;
                  $('#add-ans-btn').data('id', table_id);
                  // create-tbl-btn
                                    $('.tab_id').val(table_id);

                                      $('.choose-table').append($('<option>', {
                                value: table_id,
                                text: tablename
                            }));


                  
                                   // $('#add-ans-btn').data('id', table_id);



                  alert('Table added successfully');
                 //    $('#tableModal').find('.modal-dialog').css('max-width','1200px');
                 //    var out = '<div class="col-lg-12 rows" id="col-div" style="display:flex;">';
                 //    var num = 2;
                 //    if(cols.length>5) num = 1;
                 //    for(var i=0;i<cols.length;i++){

                 //        if(splashArray[i]=='1'){

                 //        var html = '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">'+cols[i].value+'</label>'+
                 //        '<input type="text" class="form-control number" name="row_value[]" placeholder="Enter Value" required></div></div>';

                 //        }else{
                 //            var html = '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">'+cols[i].value+'</label>'+
                 //        '<input type="text" class="form-control " name="row_value[]" placeholder="Enter Value" required></div></div>';
                 //        }

                            

                 //        out += html;
                 //    }
                 //    // out += '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label">Keywords</label><input type="text" class="form-control key-tags" name="val_keys[]" value="" placeholder="Enter Keywords"></div></div><div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-plus-btn"><i class="fa fa-plus"></i></button></div></div></div>';
                 //    out += '<div class="col-md-'+num+' col-lg-'+num+'">'+
                 //    '<div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-plus-btn" data-id="'+q_id+'">'+
                 //    '<i class="fa fa-plus"></i></button></div></div></div>';


                 // console.log(out);
                 //    $('#row-data').val(out);
                 //    $('#define-row-div').html(out);
                 //    // $(document).find('.key-tags').each(function(){
                 //    //     $(this).selectize({
                 //    //         delimiter: ',',
                 //    //         persist: false,
                 //    //         create: function(input) {
                 //    //             return {
                 //    //                 value: input,
                 //    //                 text: input
                 //    //             }
                 //    //         }
                 //    //     });
                 //    // })
                 //    $('#define-cols-div').hide();
                 //    $('#btn-two').hide();
                 //    $('#define-row-div').show();
                 //    $('#btn-three').show();
                }
                else{
                    alert('Oops something went wrong!');
                }
            }
        })
   // }
})


$(document).on('click','#add_qst_table_val',function(e){

            var table = $('#table_tval').val();
           // alert($('#table_tval').val());
            var dataid = $('#table_torder').val();
            

 

  $("#tableModal").modal('show');

   $('#add-ans-btn').attr('data-id',table);
  $('#row-form').find('.tab_id').val(table);
   $('#row-form').find('.order-id').val(dataid);
      $('#col-form').find('.order-id-new').val(dataid);


  $("#add-ans-btn").click();
                                     $('#getModal').modal('hide');

  


  })



  // $('.choose_type').select2();



  

  $(document).on('click','#show_quest_table',function(){
     //var table = $.trim($('#table_id').val());

          //var table = $.trim($(this).data('id'));

            var table = $('#table_tval').val();
           // alert($('#table_tval').val());
            var dataid = $('#table_torder').val();

              var tablename = $('#quest_table_name').val();
              var qstion=$('#question_id').val();


             //var table = $('.tab_id').val();

 

      var q_id = 0;
   // var nos = $.trim($('#table_cols').val());
    if(table){
        $.ajax({
            url:base_url+'add_quest_values',
            type:'post',
            data:{tab_id:table,q_id:q_id,order_id:dataid,tablename:tablename,qstion:qstion},
            success: function(out){
                var out = JSON.parse(out);
                if(out.status == 1){


                     // var data1=out.data.table;
                     // var cols=data1.table_columns;
                     
                     // var answer=out.data.answer;
                     window.location.reload();
                     // var answer_sub=out.data.answer_sub;
              
                }
                else{
                    alert('Oops something went wrong!');

                }
            }
        })
    }
    else if(!name){
        $('#table_id').focus();
    }
    
})


$(document).on('click','#add-ans-btn',function(){
     //var table = $.trim($('#table_id').val());

         // var table = $.trim($(this).data('id'));
             var table = $('.tab_id').val();

 

      var q_id = 0;
   // var nos = $.trim($('#table_cols').val());
    if(table){
        $.ajax({
            url:base_url+'get_answer_table',
            type:'post',
            data:{table:table,q_id:q_id},
            success: function(out){
                var out = JSON.parse(out);
                if(out.status == 1){


                     var data1=out.data.table;
                     var cols=data1.table_columns;
                     
                     var answer=out.data.answer;
                     // var answer_sub=out.data.answer_sub;
                     
                     $('#tableModal').find('.modal-dialog').css('max-width','1200px');
                     var name_array=[data1.column_one_name,data1.column_two_name,data1.column_three_name,data1.column_four_name,data1.column_five_name,
                     data1.column_six_name,data1.column_seven_name,data1.column_eight_name,data1.column_nine_name,data1.column_ten_name,data1.column_eleven_name,data1.column_twelve_name,data1.column_thirteen_name,data1.column_fourteen_name,data1.column_fifteen_name
                     ];
                        var count_array=[data1.count_one_table,data1.count_two_table,data1.count_three_table,data1.count_four_table,data1.count_five_table,
                     data1.count_six_table,data1.count_seven_table,data1.count_eight_table,data1.count_nine_table,data1.count_ten_table,data1.count_eleven_table,data1.count_twelve_table,data1.count_thirteen_table,data1.count_fourteen_table,data1.count_fifteen_table
                     ];

                     var amnt_array=[data1.column_one_sum,data1.column_two_sum,data1.column_three_sum,data1.column_four_sum,data1.column_five_sum,
                     data1.column_six_sum,data1.column_seven_sum,data1.column_eight_sum,data1.column_nine_sum,data1.column_ten_sum,data1.column_eleven_sum,data1.column_twelve_sum,data1.column_thirteen_sum,data1.column_fourteen_sum,data1.column_fifteen_sum
                     ];

                    

                    var out = '';
                                        var edit_html = '';

                    var num = 2;
                     var num2 = 1;
                    if(cols>5) num = 1;


                    if(answer.length>0){

// console.log(answer);  
//var out='';
 var out='<p style="">(Please check for underline answers)</p>';
    var id_new=0;
    var id_new1=0;

    var value_array=[];
        var underline_array=[];
        var cnt=answer.length/cols;
        // console.log(cnt);

        // $tab_q['qt_vals'])/$cols


                        for (var j = 0; j <= cnt-1; j++) {
                            
              
                            out += '<div class="col-lg-12 rows" id="col-div" style="display:flex;">';  
          var html='';
                            for(var i=0;i<cols;i++){


                              value_array[i]=answer[j].val_value;
                              underline_array[i]=answer[j].val_underline;


                     //             var value_array=[answer[j].column_one_value,answer[j].column_two_value,answer[j].column_three_value,answer[j].column_four_value,answer[j].column_five_value,
                     //  answer[j].column_six_value,answer[j].column_seven_value,answer[j].column_eight_value,answer[j].column_nine_value,answer[j].column_ten_value,
                     // ];


                     //    var underline_array=[answer[j].column_one_underline,answer[j].column_two_underline,answer[j].column_three_underline,answer[j].column_four_underline,answer[j].column_five_underline,
                     //  answer[j].column_six_underline,answer[j].column_seven_underline,answer[j].column_eight_underline,answer[j].column_nine_underline,answer[j].column_ten_underline,
                     // ];

                  if(amnt_array[i]==1){
                        var cls='number';
                    }else{
                        var cls=''
                    }

                                      if(count_array[i]!=0){


                                             html='<div class="col-md-'+num+' col-lg-'+num+'"><input type="hidden" class="form-control" name="row_count_'+i+'[]" value="'+count_array[i]+'" placeholder="Enter Value" >';

                                    for(var k=0;k<count_array[i];k++){


                                                for (var b = 0; b <= answer_sub.length-1; b++) {
                                        



                                            if(answer_sub[b].column_id==i+1){
                                                 if(answer_sub[b].rows==j){ 

                                                     if (id_new!=answer_sub[b].id){

                                                        id_new=answer_sub[b].id;
 // console.log(j);

                                                       html += '<div class="form-group"><label class="form-label row_name">'+name_array[i]+'</label><input type="text" class="form-control '+cls+'" name="row_value_'+i+k+'[]"  placeholder="Enter Value" value="'+answer_sub[b].ans_values+'" required>';
                                                        if(answer_sub[b].is_underline=="1"){
                                                     html += '<input type="checkbox" class="form-control1 is_underline" name="is_underline_'+i+k+'[]"    id="is_underline" style="margin: 12px;" value="1" checked="checked"></div>';
                                                         }else{
                                                        html += '<input type="checkbox" class="form-control1 is_underline" name="is_underline_'+i+k+'[]"    id="is_underline" style="margin: 12px;" value="1" ></div>';
 
                                                         }

                                                   b=answer_sub.length-1;

                                                    }

                                                 }

                                            }
                                            
                                       }

                                        // console.log(count_array[i]);

                            //  html += '<div class="form-group"><label class="form-label row_name">'+name_array[i]+'</label><input type="text" class="form-control" name="row_value_'+i+k+'[]"  placeholder="Enter Value" value="" required>';
                            // html += '<input type="checkbox" class="form-control1 is_underline" name="is_underline_'+i+k+'[]"    id="is_underline" style="margin: 12px;" value="1"></div>';

                 
                                    }
                                html+='</div>';

                                    out += html; 

                                      }else{


                            for (var m = 0; m <= answer.length-1; m++) {





                          if(answer[m].col_no==i){
                              if(answer[m].row_no==j){ 

                                    if (id_new1!=answer[m].val_id){


                                id_new1=answer[m].val_id;


                       

                var html = '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">'+name_array[i]+'</label><input type="text" class="form-control '+cls+'" name="row_value_'+i+'[]"  placeholder="Enter Value" value="'+answer[m].val_value+'" required><input type="hidden" class="form-control" name="row_count_'+i+'[]" value="'+count_array[i]+'" placeholder="Enter Value" >';
 if(answer[m].val_underline=="1"){

                html += '<input type="checkbox" class="form-control1" name="is_underline'+i+'[]"    id="is_underline" style="margin: 12px;" value="1" checked="checked"></div></div>';
            }else{
            html += '<input type="checkbox" class="form-control1" name="is_underline'+i+'[]"    id="is_underline" style="margin: 12px;" value="1"></div></div>';
  
            }                out += html; 

                         }

                              }
                              }

                             }


                                      }

              
                     
                          }
                        //  out += html;  





                    out += '<div class="col-md-'+num2+' col-lg-'+num2+'"><div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-minus-btn-new-pre" data-id="'+answer[j].id+'"><i class="fa fa-minus"></i></button></div></div></div>';
                        

                         }
                 out += '<div class="col-md-'+num2+' col-lg-'+num2+'"><button class="btn btn-info row-plus-btn-edit" data-id=""><i class="fa fa-plus"></i></button></div>';


                         $("#add-ans_tbl-btn").html('Edit');
                    
                     $('.add-ans-save').attr('id','edit-ans-save'); 




                     edit_html += '<p >(Please check for underline answers)</p><div class="col-lg-12 rows" id="col-div" style="display:flex;">';         
                for(var i=0;i<cols;i++){


                    if(amnt_array[i]==1){
                        var cls='number';
                    }else{
                        var cls=''
                    }

                     if(count_array[i]!=0){
                        html_edit='<div class="col-md-'+num+' col-lg-'+num+'"><input type="hidden" class="form-control" name="row_count_'+i+'[]" value="'+count_array[i]+'" placeholder="Enter Value" >';

                    for(var k=0;k<count_array[i];k++){
                        // console.log(count_array[i]);

             html_edit += '<div class="form-group"><label class="form-label row_name">'+name_array[i]+'</label><input type="text" class="form-control '+cls+'" name="row_value_'+i+k+'[]"  placeholder="Enter Value" required>';
            html_edit += '<input type="checkbox" class="form-control1 is_underline" name="is_underline_'+i+k+'[]"    id="is_underline" style="margin: 12px;" value="1"></div>';

 
                    }
                html_edit+='</div>';

                    edit_html += html_edit; 
                }

                else{
                var html_edit = '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">'+name_array[i]+'</label><input type="text" class="form-control '+cls+'" name="row_value_'+i+'[]"  placeholder="Enter Value" required><input type="hidden" class="form-control" name="row_count_'+i+'[]" value="'+count_array[i]+'" placeholder="Enter Value" >';
                html_edit += '<input type="checkbox" class="form-control1" name="is_underline'+i+'[]"    id="is_underline" style="margin: 12px;" value="1"></div></div>';
                edit_html += html_edit; 

                }

                   
                    

                    
                       } 

                    edit_html += '<div class="col-md-'+num2+' col-lg-'+num2+'"><div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-minus-btn-new"><i class="fa fa-minus"></i></button></div></div></div>';



////////////////////////////
                     }

                
                      else{
            out += '<p >(Please check for underline answers)</p><div class="col-lg-12 rows" id="col-div" style="display:flex;">';         
                for(var i=0;i<cols;i++){

                    if(amnt_array[i]==1){
                        var cls='number';
                    }else{
                        var cls=''
                    }
                    console.log(cls);
                     if(count_array[i]!=0){
                        html='<div class="col-md-'+num+' col-lg-'+num+'"><input type="hidden" class="form-control" name="row_count_'+i+'[]" value="'+count_array[i]+'" placeholder="Enter Value" >';

                    for(var k=0;k<count_array[i];k++){
                        // console.log(count_array[i]);

             html += '<div class="form-group"><label class="form-label row_name">'+name_array[i]+'</label><input type="text" class="form-control '+cls+'" name="row_value_'+i+k+'[]"  placeholder="Enter Value" required>';
            html += '<input type="checkbox" class="form-control1 is_underline" name="is_underline_'+i+k+'[]"    id="is_underline" style="margin: 12px;" value="1"></div>';

 
                    }
                html+='</div>';

                    out += html; 
                }

                else{
                var html = '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">'+name_array[i]+'</label><input type="text" class="form-control '+cls+'" name="row_value_'+i+'[]"  placeholder="Enter Value" required><input type="hidden" class="form-control" name="row_count_'+i+'[]" value="'+count_array[i]+'" placeholder="Enter Value" >';
                html += '<input type="checkbox" class="form-control1" name="is_underline'+i+'[]"    id="is_underline" style="margin: 12px;" value="1"></div></div>';
                out += html; 

                }

                   
                    

                    
                       } 

                    out += '<div class="col-md-'+num2+' col-lg-'+num2+'"><div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-plus-btn-new"><i class="fa fa-plus"></i></button></div></div></div>';


                        }
                       
                //  }

                    
                      // var num2 = 1;
                    // out += '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label">Keywords</label><input type="text" class="form-control key-tags" name="val_keys[]" value="" placeholder="Enter Keywords"></div></div><div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-plus-btn"><i class="fa fa-plus"></i></button></div></div></div>';
                    // out += '<div class="col-md-'+num2+' col-lg-'+num2+'"><div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-plus-btn-new"><i class="fa fa-plus"></i></button></div></div><p style="    margin-top: 38px;">(Please check for underline answers)</p></div>';
                    $('#row-data').val(out);


                 $('#row-data-edit').html(edit_html);

      
                    $('#define-row-div').html(out);


                    $('#cols').val(cols);
                     $('.tab_id').val(table);

                     $('#define-table-div').hide();
                    $('#btn-one').hide();

                      $('#define-cols-div').hide();
                    $('#btn-two').hide();
                    $('#define-row-div').show();
                    $('#btn-three').show();
                    //$('#add-ans_tbl-btn')
                    

                    
                    // $('.qt_id').val(out.data);
                    // $('.qt-tabl-name').html(name);
                    // $('#cols').val(nos);
                    // var html = $('#col-div').html();
                    // for(var i=0;i<nos-1;i++){
                    //     $('#col-div').after('<div class="col-lg-12" style="display:flex;">'+html+'</div>');
                    // }
                    // $('#define-table-div').hide();
                    // $('#btn-one').hide();
                    // $('#define-cols-div').show();
                    // $('#btn-two').show();
                }
                else{
                    alert('Oops something went wrong!');
                }
            }
        })
    }
    else if(!name){
        $('#table_id').focus();
    }
    
})

 // $(document).find('.key-tags').each(function(){
 //                        $(this).selectize({
 //                            delimiter: ',',
 //                            persist: false,
 //                            create: function(input) {
 //                                return {
 //                                    value: input,
 //                                    text: input
 //                                }
 //                            }
 //                        });
 //                    })



function add_quest_table(e){



  var order=$(e).data('id');


  //var table_id=$('#choose-table').val();
      var table_id=$(e).val();


  //var q_id=$('#question_id').val();

    // $.ajax({
    //         url:base_url+'add-quest-table',
    //         type:'post',
    //         data:{table_id:table_id,order:order},
    //         success: function(out){
    //             var out = JSON.parse(out);
    //             if(out.status==1){
                  


    //             }
    //             else{
    //                 alert('Oops something went wrong!');
    //             }
    //         }
    //     })


   $.ajax({
             url:base_url+'add-problem-format',
            type:'post',
            data:{table_id:table_id},
            success: function(out){
                var out = JSON.parse(out);
                if(out.status==1){

                   var columns=out.data.table_columns;
                    var name=out.data.table_name;
                  // var table_id=out.data.problem_id;
                  var data1=out.data;


                  var name_array=[data1.column_one_name,data1.column_two_name,data1.column_three_name,data1.column_four_name,data1.column_five_name,
                     data1.column_six_name,data1.column_seven_name,data1.column_eight_name,data1.column_nine_name,data1.column_ten_name,data1.column_eleven_name,data1.column_twelve_name,data1.column_thirteen_name,data1.column_fourteen_name,data1.column_fifteen_name
                     ];
                        var count_array=[data1.count_one_table,data1.count_two_table,data1.count_three_table,data1.count_four_table,data1.count_five_table,
                     data1.count_six_table,data1.count_seven_table,data1.count_eight_table,data1.count_nine_table,data1.count_ten_table,data1.count_eleven_table,data1.count_twelve_table,data1.count_thirteen_table,data1.count_fourteen_table,data1.count_fifteen_table
                     ];

                     // var amnt_array=[data1.column_one_sum,data1.column_two_sum,data1.column_three_sum,data1.column_four_sum,data1.column_five_sum,
                     // data1.column_six_sum,data1.column_seven_sum,data1.column_eight_sum,data1.column_nine_sum,data1.column_ten_sum,data1.column_eleven_sum,data1.column_twelve_sum,data1.column_thirteen_sum,data1.column_fourteen_sum,data1.column_fifteen_sum
                     // ];
                     var width_array=[data1.column_one_width,data1.column_two_width,data1.column_three_width,data1.column_four_width,data1.column_five_width,
                     data1.column_six_width,data1.column_seven_width,data1.column_eight_width,data1.column_nine_width,data1.column_ten_width,data1.column_eleven_width,,data1.column_twelve_width,data1.column_thirteen_width,data1.column_fourteen_width,data1.column_fifteen_width,
                     ];




                     var html='<div class="col-lg-12" id="col-div" style=""><div class="form-group"><label class="form-label">Table Name</label><input type="text" class="form-control  col_no-pr" name="tablename" value="'+name+'" id="quest_table_name"  style="width:50%"></div><table class="table card-table table-vcenter"><thead><tr><th>S/No</th><th>Column Name</th><th>Width</th><th>No.Sub columns</th></tr></thead>';
                     html+='<tbody>';
                     var k=0;
                     for (var i =0; i <columns ; i++){
                      k=i+1;



                      html+='<tr><td>'+k+'</td><td>'+name_array[i]+'</td><td>'+width_array[i]+'</td><td>'+count_array[i]+'</td></tr>';
                     }

                                          html+='</tbody>';
                                         html+='</table></div>';

                                    $('.table-det').html(html);
                                    
                                                                        $('#table_tval').val(table_id);
                                                                        $('#table_torder').val(order);

                                    $('#show_quest_table').attr('data-id',table_id);

                                    
                                   $('#getModal').modal('show');











                  


                }
                else{
                    alert('Oops something went wrong!');
                }
            }
        })



                



  


}


function add_problem_format_create(){

  var table_id=$('#choose-table-format').val();

 

  $.ajax({
            url:base_url+'add-problem-format-exist',
            type:'post',
            data:{table_id:table_id},
            success: function(out){
                var out = JSON.parse(out);
                if(out.status==1){
                  var columns=out.data.tabledet.table_columns;
                  var table_id=out.data.tabledet.problem_id;
                  var pr_values=out.data.problem_sub;
                  var data1=out.data.tabledet;
                  var count=out.data.problem_sub_row.rowcount;



                    
                   $('.show_table').show();

                   $('.add_table').hide();




                 var name_array=[data1.column_one_name,data1.column_two_name,data1.column_three_name,data1.column_four_name,data1.column_five_name,
                     data1.column_six_name,data1.column_seven_name,data1.column_eight_name,data1.column_nine_name,data1.column_ten_name,data1.column_eleven_name,data1.column_twelve_name,data1.column_thirteen_name,data1.column_fourteen_name,data1.column_fifteen_name
                     ];
                        var count_array=[data1.count_one_table,data1.count_two_table,data1.count_three_table,data1.count_four_table,data1.count_five_table,
                     data1.count_six_table,data1.count_seven_table,data1.count_eight_table,data1.count_nine_table,data1.count_ten_table,data1.count_eleven_table,data1.count_twelve_table,data1.count_thirteen_table,data1.count_fourteen_table,data1.count_fifteen_table
                     ];



                 var html='<table class="table card-table table-vcenter problem-table">';
                 html+='<thead><tr>';

                     for(var i=0;i<columns;i++){



                       html+='<th>'+name_array[i]+'</th>';


                      }




                      html+='</tr></thead><tbody class="append-div-prblem">';

                    if(pr_values.length>0){
                        var id_new1=0;

                       var cnt=pr_values.length/columns;


                     var total = 0;
                    for (var f = 0; f < count_array.length; f++) {
                        total += parseInt(count_array[f]);
                        }

                        if(total<=0){
                          //8cnt=parseInt(pr_values.length)-parseInt(total);
                        }
                        else{
                          cnt=parseInt(pr_values.length)-parseInt(total*columns);

                        }



                               for(var j=0;j<count;j++){
                      html+='<tr class="tr-problem">';
                                            var htmlval='<tr class="tr-problem">';



                    var del_btn='';


                     for(var i=0;i<columns;i++){


                                           if(count_array[i]!=0){

                                            // html+='<td> <table class="table card-table table-vcenter"><tr>';
                                            // htmlval+='<td> <table class="table card-table table-vcenter"><tr>';

                    for(var k=0;k<count_array[i];k++){

                      for (var m = 0; m <= pr_values.length-1; m++) {


                        if(pr_values[m].column_id==i){
                                  if(pr_values[m].row_id==j){ 
                                    if(pr_values[m].sub_id==k){ 
                                        if (id_new1!=pr_values[m].format_id){

                                                                id_new1=pr_values[m].format_id;




if(pr_values[m].col_value!=''){
 var text=pr_values[m].col_value; 
 var cls22='';
 }else{
 var text='nodata';
 var cls22='no-data';
 }


                      html+='<td><li class="type-problem '+cls22+'" data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'">'+text+'</li><button type="submit" class="btn add_question_div" id="add_question_div"   data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'" style="float: right;padding: 0px;min-width: 1.375rem;"  onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1rem;"></i></button></td>';
                      htmlval+='<td><li class="type-problem no-data" data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'">nodata</li><button type="submit" class="btn add_question_div" id="add_question_div"   data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'" style="float: right;padding: 0px;min-width: 1.375rem;"  onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1rem;"></i></button></td>';

                          }
                           }
                          }
                          }
                        }

                      }




                                            // html+='</tr> </table></td>';
                                            // htmlval+='</tr> </table></td>';










                                           }else{


                                              for (var m = 0; m <= pr_values.length-1; m++) {
                                                //console.log(pr_values[m]);

                                                if(pr_values[m].column_id==i){
                                                      if(pr_values[m].row_id==j){ 
                                                        if (id_new1!=pr_values[m].format_id){

                                                                id_new1=pr_values[m].format_id;
                                     if(pr_values[m].column_id==columns-1){
                        del_btn='<a href="javascript:void(0)" data-row="'+j+'" data-id="6" class="delte-prblem-row-btn" style="float: right;margin-right: -59px;"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                      }

                if(pr_values[m].col_value!=''){
               var text=pr_values[m].col_value; 
               var cls22='';
               }else{
               var text='nodata';
               var cls22='no-data';
               }



                                               



                                            html+='<td><li class="type-problem '+cls22+'" data-column="'+i+'" data-row="'+j+'" data-sub="0">'+text+'</li><button type="button" class="btn add_question_div" id="add_question_div"  data-column="'+i+'" data-row="'+j+'"  style="float: right;padding: 0px;min-width: 1.375rem;" onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1rem;"></i></button></td>';
                                              htmlval+='<td><li class="type-problem no-data" data-column="'+i+'" data-row="'+j+'" data-sub="0">nodata</li><button type="button" class="btn add_question_div" id="add_question_div"  data-column="'+i+'" data-row="'+j+'"  style="float: right;padding: 0px;min-width: 1.375rem;" onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1rem;"></i></button>'+del_btn+'</td>';

                                              }
                                              }
                                              }

                                              }


                                            }






                       


                      }

                                            html+='</tr>';
                                            htmlval+='</tr>';

                    }


                    }
                    else{


                       for(var j=0;j<1;j++){

                      html+='<tr class="tr-problem">';
                                            var htmlval='<tr class="tr-problem">';



var del_btn='';

                     for(var i=0;i<columns;i++){





                                           if(count_array[i]!=0){

                                            // html+='<td> <table class="table card-table table-vcenter"><tr>';
                                            // htmlval+='<td> <table class="table card-table table-vcenter"><tr>';


                         //                       if(pr_values[m].column_id==columns-1){
                         //              if(pr_values[m].sub_id==count_array[i]-1){
                         // del_btn='<a href="javascript:void(0)" data-row="'+j+'" data-id="6" class="delte-prblem-row-btn" style="float: right;margin-right: -74px;"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                         //                 }

                         //                 }

                    for(var k=0;k<count_array[i];k++){
                                            if(i==columns-1){


                      if(k==count_array[i]-1){
                        del_btn='<a href="javascript:void(0)" data-row="'+j+'" data-id="6" class="delte-prblem-row-btn" style="float: right;margin-right: -59px;"><i class="fa fa-trash" aria-hidden="true"></i></a>';

                      }
                       }




                      var text='nodata';
                      var cls22='no-data';

                      html+='<td><li class="type-problem '+cls22+'" data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'">'+text+'</li><button type="submit" class="btn add_question_div" id="add_question_div"   data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'" style="float: right;padding: 0px;min-width: 1.375rem;"  onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1rem;"></i></button></td>';
                      htmlval+='<td><li class="type-problem '+cls22+'" data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'">'+text+'</li><button type="submit" class="btn add_question_div" id="add_question_div"   data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'" style="float: right;padding: 0px;min-width: 1.375rem;"  onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1rem;"></i></button>'+del_btn+'</td>';

                      }




                                            // html+='</tr> </table></td>';
                                            // htmlval+='</tr> </table></td>';










                                           }else{



                                    if(i==columns-1){


                                       del_btn='<a href="javascript:void(0)" data-row="'+j+'" data-id="6" class="delte-prblem-row-btn" style="float: right;margin-right: -59px;"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                                       }


                      var text='nodata';
                      var cls22='no-data';


                                            html+='<td><li class="type-problem '+cls22+'" data-column="'+i+'" data-row="'+j+'" data-sub="0">'+text+'</li><button type="button" class="btn add_question_div" id="add_question_div"  data-column="'+i+'" data-row="'+j+'"  style="float: right;padding: 0px;min-width: 1.375rem;" onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1rem;"></i></button></td>';
                                              htmlval+='<td><li class="type-problem '+cls22+'" data-column="'+i+'" data-row="'+j+'" data-sub="0">'+text+'</li><button type="button" class="btn add_question_div" id="add_question_div"  data-column="'+i+'" data-row="'+j+'"  style="float: right;padding: 0px;min-width: 1.375rem;" onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1rem;"></i></button>'+del_btn+'</td>';


                                            }






                       


                      }

                                            html+='</tr>';
                                            htmlval+='</tr>';

                    }



                    }





                    






                      html+='</tr></tbody></table>';
                                                                                  // console.log(htmlval);

                      
                      
                      $('#table_fr_id').val(out.data.tabledet.table_id);
                        $('#pr_table_name').val(out.data.tabledet.table_name);


                      

                      $('.append-table').html(html);
                      $('.append-table-pr-row').html(htmlval);
                        $("#tableModal1").modal('hide');


                                  $('.problem-table').on('paste', 'textarea', function(e){
           // alert('fffss');
      var $this = $(this);
      $.each(e.originalEvent.clipboardData.items, function(i, v){

                     console.log(e.originalEvent.clipboardData.items);

          if (v.type === 'text/plain'){
              v.getAsString(function(text){
                  var x = $this.closest('td').index(),
                      y = $this.closest('.tr-problem').index(),
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

                          $this.closest('table').find('.tr-problem:eq('+row+') td:eq('+col+') textarea').val(v3);
                      });
                  });

              });
          }
      });
      return false;

  });

                      



                      


                 
                }
                else{
                    alert('Oops something went wrong!');
                }
            }
        })

}


function add_problem_format(){

  var table_id=$('#choose-table').val();
 

  $.ajax({
            url:base_url+'add-problem-format-exist',
            type:'post',
            data:{table_id:table_id},
            success: function(out){
                var out = JSON.parse(out);
                if(out.status==1){
                  var columns=out.data.tabledet.table_columns;
                  var table_id=out.data.tabledet.problem_id;
                  var pr_values=out.data.problem_sub;
                  var data1=out.data.tabledet;
                                   var count=out.data.problem_sub_row.rowcount;


                    
                   $('.show_table').show();

                   $('.add_table').hide();




                   // var name_array=[data1.column_one_name,data1.column_two_name,data1.column_three_name,data1.column_four_name,data1.column_five_name,
                   //   data1.column_six_name,data1.column_seven_name,data1.column_eight_name,data1.column_nine_name,data1.column_ten_name,
                   //   ];


                   //    var count_array=[data1.count_one_table,data1.count_two_table,data1.count_three_table,data1.count_four_table,data1.count_five_table,
                   //   data1.count_six_table,data1.count_seven_table,data1.count_eight_table,data1.count_nine_table,data1.count_ten_table,
                   //   ];

                    var name_array=[data1.column_one_name,data1.column_two_name,data1.column_three_name,data1.column_four_name,data1.column_five_name,
                     data1.column_six_name,data1.column_seven_name,data1.column_eight_name,data1.column_nine_name,data1.column_ten_name,data1.column_eleven_name,data1.column_twelve_name,data1.column_thirteen_name,data1.column_fourteen_name,data1.column_fifteen_name
                     ];
                        var count_array=[data1.count_one_table,data1.count_two_table,data1.count_three_table,data1.count_four_table,data1.count_five_table,
                     data1.count_six_table,data1.count_seven_table,data1.count_eight_table,data1.count_nine_table,data1.count_ten_table,data1.count_eleven_table,data1.count_twelve_table,data1.count_thirteen_table,data1.count_fourteen_table,data1.count_fifteen_table
                     ];



                 var html='<table class="table card-table table-vcenter problem-table">';
                 html+='<thead><tr>';

                     for(var i=0;i<columns;i++){



                       html+='<th>'+name_array[i]+'</th>';


                      }




                      html+='</tr></thead><tbody class="append-div-prblem">';

                    if(pr_values.length>0){
                        var id_new1=0;

                       var cnt=pr_values.length/columns;


                     var total = 0;
                    for (var f = 0; f < count_array.length; f++) {
                        total += parseInt(count_array[f]);
                        }

                        if(total<=0){
                          //8cnt=parseInt(pr_values.length)-parseInt(total);
                        }
                        else{
                          cnt=parseInt(pr_values.length)-parseInt(total*columns);

                        }



                               for(var j=0;j<count;j++){
                      html+='<tr class="tr-problem">';
                                            var htmlval='<tr class="tr-problem">';





                     for(var i=0;i<columns;i++){


                                           if(count_array[i]!=0){

                                            // html+='<td> <table class="table card-table table-vcenter"><tr>';
                                            // htmlval+='<td> <table class="table card-table table-vcenter"><tr>';

                    for(var k=0;k<count_array[i];k++){

                      for (var m = 0; m <= pr_values.length-1; m++) {


                        if(pr_values[m].column_id==i){
                                  if(pr_values[m].row_id==j){ 
                                    if(pr_values[m].sub_id==k){ 
                                        if (id_new1!=pr_values[m].format_id){

                                                                id_new1=pr_values[m].format_id;


                   if(pr_values[m].col_value!=''){
                   var text=pr_values[m].col_value; 
                   var cls22='';
                   }else{
                   var text='nodata';
                   var cls22='no-data';
                   }






                      html+='<td><li class="type-problem '+cls22+'" data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'">'+text+'</li><button type="submit" class="btn add_question_div" id="add_question_div"   data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'" style="float: right;padding: 0px;min-width: 1.375rem;"  onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1rem;"></i></button></td>';
                      htmlval+='<td><li class="type-problem no-data" data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'">nodata</li><button type="submit" class="btn add_question_div" id="add_question_div"   data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'" style="float: right;padding: 0px;min-width: 1.375rem;"  onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1rem;"></i></button></td>';

                          }
                           }
                          }
                          }
                        }

                      }




                                            // html+='</tr> </table></td>';
                                            // htmlval+='</tr> </table></td>';










                                           }else{


                                              for (var m = 0; m <= pr_values.length-1; m++) {
                                                //console.log(pr_values[m]);

                                                if(pr_values[m].column_id==i){
                                                      if(pr_values[m].row_id==j){ 
                                                        if (id_new1!=pr_values[m].format_id){

                                                                id_new1=pr_values[m].format_id;

                                                                if(pr_values[m].col_value!=''){
                   var text=pr_values[m].col_value; 
                   var cls22='';
                   }else{
                   var text='nodata';
                   var cls22='no-data';
                   }



                                               



                                            html+='<td><li class="type-problem '+cls22+'" data-column="'+i+'" data-row="'+j+'" data-sub="0">'+text+'</li><button type="button" class="btn add_question_div" id="add_question_div"  data-column="'+i+'" data-row="'+j+'"  style="float: right;padding: 0px;min-width: 1.375rem;" onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1rem;"></i></button></td>';
                                              htmlval+='<td><li class="type-problem no-data" data-column="'+i+'" data-row="'+j+'" data-sub="0">nodata</li><button type="button" class="btn add_question_div" id="add_question_div"  data-column="'+i+'" data-row="'+j+'"  style="float: right;padding: 0px;min-width: 1.375rem;" onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1rem;"></i></button></td>';

                                              }
                                              }
                                              }

                                              }


                                            }






                       


                      }

                                            html+='</tr>';
                                            htmlval+='</tr>';

                    }


                    }
                    else{


                       for(var j=0;j<2;j++){
                      html+='<tr class="tr-problem">';
                                            var htmlval='<tr class="tr-problem">';




                     for(var i=0;i<columns;i++){


                                           if(count_array[i]!=0){

                                            // html+='<td> <table class="table card-table table-vcenter"><tr>';
                                            // htmlval+='<td> <table class="table card-table table-vcenter"><tr>';

                    for(var k=0;k<count_array[i];k++){

                      html+='<td><li class="type-problem no-data" data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'">nodata</li><button type="submit" class="btn add_question_div" id="add_question_div"   data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'" style="float: right;padding: 0px;min-width: 1.375rem;"  onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1rem;"></i></button></td>';
                      htmlval+='<td><li class="type-problem no-data" data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'">nodata</li><button type="submit" class="btn add_question_div" id="add_question_div"   data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'" style="float: right;padding: 0px;min-width: 1.375rem;"  onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1rem;"></i></button></td>';

                      }




                                            // html+='</tr> </table></td>';
                                            // htmlval+='</tr> </table></td>';










                                           }else{
                                            


                                            html+='<td><li class="type-problem no-data" data-column="'+i+'" data-row="'+j+'" data-sub="0">nodata</li><button type="button" class="btn add_question_div" id="add_question_div"  data-column="'+i+'" data-row="'+j+'"  style="float: right;padding: 0px;min-width: 1.375rem;" onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1rem;"></i></button></td>';
                                              htmlval+='<td><li class="type-problem no-data" data-column="'+i+'" data-row="'+j+'" data-sub="0">nodata</li><button type="button" class="btn add_question_div" id="add_question_div"  data-column="'+i+'" data-row="'+j+'"  style="float: right;padding: 0px;min-width: 1.375rem;" onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1rem;"></i></button></td>';


                                            }






                       


                      }

                                            html+='</tr>';
                                            htmlval+='</tr>';

                    }



                    }





                    






                      html+='</tr></tbody></table>';
                                                                                  // console.log(htmlval);

                      
                      
                      $('#table_fr_id').val(out.data.tabledet.table_id);
                        $('#pr_table_name').val(out.data.tabledet.table_name);

                      

                      $('.append-table').html(html);
                      $('.append-table-pr-row').html(htmlval);


                                $('.problem-table').on('paste', 'textarea', function(e){
           // alert('fffss');
      var $this = $(this);
      $.each(e.originalEvent.clipboardData.items, function(i, v){

                     console.log(e.originalEvent.clipboardData.items);

          if (v.type === 'text/plain'){
              v.getAsString(function(text){
                  var x = $this.closest('td').index(),
                      y = $this.closest('.tr-problem').index(),
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

                          $this.closest('table').find('.tr-problem:eq('+row+') td:eq('+col+') textarea').val(v3);
                      });
                  });

              });
          }
      });
      return false;

  });
                      



                      


                 
                }
                else{
                    alert('Oops something went wrong!');
                }
            }
        })

  







}




    function show_format_values(e){

      $('.add_question_div').each(function (index, value) {

           $(this).css('background','#607d8b87');

    });

      $('#sub_value').val('');
      $(e).css('background','#25b32b');

       var column = $(e).data('column');
       var row = $(e).data('row');
       var sub = $(e).data('sub');

      var q_id = $('#question_id').val();
            var table_id = $('#table_fr_id').val();

      

                   $('.choose_value_type').show();
                   $('#column_value').val(column);
                   $('#row_value').val(row);
                   $('#sub_value').val(sub);

                      $.ajax({
        url:base_url+'get-problem-val',
        data:{column:column,row:row,sub:sub,table_id:table_id},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            if(out.status == 1){
                $('#value_text1').val(out.data.value_text);

                //var quill = new Quill('#value_text');


                //quill3434.setHTML(out.data.value_text);

                 var elem = document.querySelector('.value_text');
                  elem.children[0].innerHTML=out.data.value_text;

                  //  var elem1 = document.querySelector('.help_text ');
                  // elem1.children[0].innerHTML=out.data.value_help;

                //$('#help_text').val(out.data.value_help);
                // $('#help_text').val(out.data.value_help);
                $('.pr-keys').val(out.data.col_keys);

                                $('#text_val').val(out.data.value_text);
                                $('#help_value').val(out.data.value_help);
                                $('#col_vals').val(out.data.col_keys);




                
                
                // $('#roles-table').hide();
                //$('#edit-course-form').show();
            }
            else if(out.status==0){
               
                   $('#value_text').val('');
                  
                  $('#help_text').val('');

                   $('#text_val').val('');
                  
                  $('#help_value').val('');
                  $('#col_vals').val('');
            }
            else{
               // window.location.href = base_url;
            }
        }
    })











                   

    }



    //  })

// onkeyup="insert_values(this)"


 var quill3434 = new Quill('#value_text', {
    theme: 'snow',   // Specify theme in configuration
    modules: {
      // Equivalent to { toolbar: { container: '#toolbar' }}
          toolbar: toolbarOptions

    }
  });

function add_format_values(){

  var value_type=$('#choose-add-type').val();

   $('.imagegallery').hide();
  if(value_type==0){
    $('#value_text').focus();

    
                    

 $('.choose_value_type').css('height','300px');

     $('.append_div').html('<div class="value_text" id="value_text" data-type="text" style="height: 78px;" onkeyup="insert_values(this)"></div><textarea name="value_text" id="value_text1" class=" value_text editor_content" data-type="text" style="display: none;" ></textarea>');


     var quill3434 = new Quill('#value_text', {
    theme: 'snow',   // Specify theme in configuration
    modules: {
      // Equivalent to { toolbar: { container: '#toolbar' }}
          toolbar: toolbarOptions

    }
  });



    




  }else if(value_type==1){
     $('.choose_value_type').css('height','300px');


    
var vall=$('#help_value').val();


        $('.append_div').html(' <div class="help_text" id="help_text" data-type="h_text" style="height: 78px;" onkeyup="insert_values(this)"></div><textarea name="help_text" id="help_text" class=" value_text editor_content" data-type="h_text" style="display: none;" onkeyup="insert_values(this)"></textarea>');


        var quill3434 = new Quill('#help_text', {
    theme: 'snow',   // Specify theme in configuration
    modules: {
      // Equivalent to { toolbar: { container: '#toolbar' }}
          toolbar: toolbarOptions

    }
  });


        var elem1 = document.querySelector('.help_text ');
                  elem1.children[0].innerHTML=vall;


  }
  else if(value_type==2){
    $('.imagegallery').show();
    $('.append_div').html('');
        // $('.choose_value_type').css('height','228px');

        // $('.append_div').html('<form id="fileinfo" enctype="multipart/form-data" method="post" name="fileinfo"><p>( upload images of 1050*600 px size)</p><input type="file" name="help_img"  data-type="h_img" id="help_img" onchange="insert_values(this)"><img id="blah" src="#" alt="" width="100" height="100" style="max-width: 100%;" /></form>');


  }
  else if(value_type==3){
         $('.choose_value_type').css('height','228px');

        $('.append_div').html(' <input type="text" class="form-control key-tags pr-keys"  onchange="insert_values(this)" id="input-tags4" data-type="h_key" name="qst_keywords"  placeholder="Enter Keywords">');


             $('.pr-keys').selectize({
        delimiter: ',',
        persist: false,
        create: function(input) {
            return {
                value: input,
                text: input
            }
        }
             });





  }


}


// $("#help_img").change(function(){
//   alert("fddf");
//     readURL(this);
// });

function readURL(input) {

  var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("help_img").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("blah").src = oFREvent.target.result;
        };

    // if (input.files && input.files[0]) {
    //     var reader = new FileReader();

    //     reader.onload = function (e) {
    //         $('#blah').attr('src', e.target.result);
    //     }

    //     reader.readAsDataURL(input.files[0]);
    // }
}


 function  insert_values(e){

// alert("ghhgh");

   //  $(document).on('focusout','#value_text',function(e){

  var type=$(e).data('type');


    var col=$('#column_value').val();
        var rows=$('#row_value').val();

    var sub=$('#sub_value').val();

    var table_id=$('#table_fr_id').val();
        var table_name=$('#pr_table_name').val();

  var q_id=$('#question_id').val();


  if(type!='h_img'){

    


if(type=='text'){
  var elem = document.querySelector('.value_text');
    var val=elem.children[0].innerHTML;
}else if(type=='h_text'){
  var elem = document.querySelector('.help_text');
    var val=elem.children[0].innerHTML;
}else{
  var val=$(e).val();
}

// console.log(val);






  $.ajax({
            url:base_url+'add-problem-format-values',
            type:'post',
            data:{type:type,col:col,rows:rows,sub:sub,q_id:q_id,table_id:table_id,val:val,table_name:table_name},
            success: function(out){
                var out = JSON.parse(out);
                if(out.status==1){

                }
              }
            });
    
  }else{

    readURL();

        var property = document.getElementById('help_img').files[0];
         var form_data = new FormData();
        form_data.append("file",property);
       form_data.append("type",type);
       form_data.append("col",col);
       form_data.append("rows",rows);
       form_data.append("sub",sub);
       form_data.append("table_id",table_id);


        //console.log(form_data);



  $.ajax({
            url:base_url+'add-problem-format-values',
            type:'post',
          data:form_data,
          contentType:false,
          cache:false,
          processData:false,
            success: function(out){
                var out = JSON.parse(out);
                if(out.status==1){

      $('#help_img').val('');



                }
              }
            });



  }




    




};

  

 
</script>
