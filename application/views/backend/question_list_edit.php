
    <link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.snow.css">


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
.add_question_div{
  background: #607d8b87;
}

.acive-tab{
background: #ff9800ab  !important;
}
.active-main-tab{
background: #5ba015 !important;
}
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


          <div class="col-lg-10 col-md-9 col-sm-8 col-12">
            <ul class="tabs" style="margin-left: 277px;">


                            <li class="active-main-tab"><a  style="color: white;" class="main-tab-qst  "  href="#">Questions</a></li>
                                        

                            <li><a style="color: white;" class="main-tab-pr" href="#">Problem Format</a></li>

                            <li><a style="color: white;" target="_blank"  href="<?=base_url('answers-preview/'.$questionid)?>">Answers</a></li>


            </ul>


 <div class="" style="    border: 1px solid black;">

      <div class="row edit-qst-div" style="margin-right: 76px;">

               <div class="col-lg-12 col-md-12 " style="min-height: 100px;">
                                            </div>
                                              <div class="col-lg-2 col-md-12 " style="">

                        <input type="hidden" name="question_id" id="question_id" value="1">
                                            </div>


<!--               <div class="col-lg-2 col-md-12 " style=""></div>
 -->
    <?php

         foreach($qt_table  as  $tab_q) {

           $table=$tab_q['qt'];

 // print_r($tab_q);exit();

            ?>




                 <div class="col-md-12 col-lg-10 text-box" data-id="0" >
                  <div class="form-group">
                    <label class="form-label">Text</label>
                    <div class="editor" id="product_description_div" data-id="<?=$tab_q['qt_text']['order_id'];?>" style="height: 250px;">
                      <?=$tab_q['qt_text']['text_val'];?>
                    </div>
                    <textarea name="product_description" id="text_qst" class="editor_content" style="display: none;" required><?=$tab_q['qt_text']['text_val'];?></textarea>
                    <input type="hidden" class="order-quill" value="0" >
                  </div>
                </div>




                 <!--  <div class="col-md-12 col-lg-8" class="qst-table" style="display: none">
                  <div class="form-group">
                    <label class="form-label">Description</label>
                    <div class="editor" id="product_description_div" style="height: 250px;"></div>
                    <textarea name="product_description" class="editor_content" data-id="0" style="display: none;" required></textarea>
                  </div>
                </div> -->






                      <div class="col-lg-4 col-md-12 " style=""></div>
                       <div class="col-lg-8 col-md-12 add_table-edit" style="margin-top: 56px;">
                        <div class="col-md-6 col-lg-6" style="display: flex;">
                           <button type="button" class="btn btn-primary ml-auto create-tab" data-id="<?=$tab_q['qt_text']['order_id'];?>"autofocus=" " data-toggle="modal" >Create 
                           
                           </button>
<!--                       <button type="submit" class="btn btn-primary ml-auto create_table" style="">Create new</button>
 -->
                       <select class="form-control choose_type active" name="choose_type" id="choose_type" data-id="<?=$tab_q['qt_text']['order_id'];?>" style="width: 80%;display: inline-block;" onchange="add_quest_table(this)">


<!--                         <option value="0" selected disabled>Select</option>
 -->                                <?php
                                    foreach($tables as $data){
                                      // echo $table['table_id'];
                                      if($data['table_id']==$table['table_id']){
                                        echo '<option value="'.$data['table_id'].'" selected>'.$data['table_name'].'</option>';
                                        }else{
                                        echo '<option value="'.$data['table_id'].'">'.$data['table_name'].'</option>';
                                        }
                                    }
                                ?>
                     <!--  <option value="0">Text box</option>
                      <option value="1">Table</option>
                      <option value="2">Terms-para</option>
                     <option value="3">Terms-sentence</option> -->

                    </select>

                     <a href="javascript:void(0)" data-order="<?=$tab_q['order_id'];?>" data-id="<?=$table['table_id'];?>" class="btn btn-success btn-sm edit-qst-btn"><i class="fa fa-pencil" aria-hidden="true"></i>
</a>
                    </div>

                   <!--    <div class="col-md-6">
                  
                    
                  </div> -->


                       


              </div>

              <div class="col-lg-3 col-md-12 " style=""></div>




                 




              

 <?php } 
 ?>


 
               <div class="row col-lg-8 col-md-12 qst-transaction-row"  style="display: none;margin-top: 56px;">
                                <!-- <input type="hidden" id="row-data" value="
                                "> -->

                           <div class="col-md-12 col-lg-12 hidden-row" class="" style="display: none;" >


                                <div class="col-md-12 col-lg-12 qst-transaction" class="" style="display: flex;" >



                               <div class="col-md-4 col-lg-4" class="" style="">
                                <input type="text" class="form-control trans-input" name="transactions[]" placeholder="Enter Name" data-type="paragrph">


                                </div>
                                <div class="col-md-4 col-lg-4" class="" style="">
                                 <input type="text" class="form-control key-tags trans-key" id="input-tags4" name="edit_transaction_keywords[]"  placeholder="Enter Keywords">

                                </div>
                                <div class="col-md-4 col-lg-4" class="" style="">
                        <button type="button" class="btn btn-bitbucket add-new-trans" data-toggle="modal"><i class="fa fa-plus"></i></button>

                                </div>
                                                                </div>





                        </div>




                           <div class="col-md-12 col-lg-12 hidden-row-sentence" class="" style="display: none;" >


                                <div class="col-md-12 col-lg-12 qst-transaction-sent" class="" style="display: flex;" >



                               <div class="col-md-4 col-lg-4" class="" style="">
                                <input type="text" class="form-control trans-input" name="transactions[]" placeholder="Enter Name" data-type="sentnce">


                                </div>
                                <div class="col-md-4 col-lg-4" class="" style="">
                                 <input type="text" class="form-control key-tags trans-key" id="input-tags4" name="edit_transaction_keywords[]"  placeholder="Enter Keywords">

                                </div>
                                <div class="col-md-4 col-lg-4" class="" style="">
                        <button type="button" class="btn btn-bitbucket add-new-trans-sent" data-toggle="modal"><i class="fa fa-plus"></i></button>

                                </div>
                                                                </div>





                </div>


               <div class="col-md-12 col-lg-12 qst-transaction" class="" style="display: flex;" >



                               <div class="col-md-4 col-lg-4" class="" style="">
                                <input type="text" class="form-control trans-input" name="transactions[]" placeholder="Enter Name" data-id="0">


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


            <div class="row qst-div" style="margin-right: 76px;display: none;">

               <div class="col-lg-12 col-md-12 " style="min-height: 100px;">
                                            </div>
                                              <div class="col-lg-2 col-md-12 " style="">

                        <input type="hidden" name="question_id" id="question_id" value="1">
                                            </div>


<!--               <div class="col-lg-2 col-md-12 " style=""></div>
 -->






                 <div class="col-md-12 col-lg-10 text-box" data-id="0" >
                  <div class="form-group">
                    <label class="form-label">Text</label>
                    <div class="editor" id="product_description_div" data-id="0" style="height: 250px;"></div>
                    <textarea name="product_description" id="text_qst" class="editor_content" style="display: none;" required></textarea>
                    <input type="hidden" class="order-quill" value="0" >
                  </div>
                </div>




                  <div class="col-md-12 col-lg-8" class="qst-table" style="display: none">
                  <div class="form-group">
                    <label class="form-label">Description</label>
                    <div class="editor" id="product_description_div" style="height: 250px;"></div>
                    <textarea name="product_description" class="editor_content" data-id="0" style="display: none;" required></textarea>
                  </div>
                </div>






                      <div class="col-lg-4 col-md-12 " style=""></div>
                       <div class="col-lg-8 col-md-12 add_table" style="display: none;margin-top: 56px;">
                        <div class="col-md-6 col-lg-6" style="display: flex;">
                           <button type="button" class="btn btn-primary ml-auto create-tab" data-id="0"autofocus=" " data-toggle="modal" >Create 
                           
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


               <div class="row col-lg-8 col-md-12 qst-transaction-row"  style="display: none;margin-top: 56px;">
                                <!-- <input type="hidden" id="row-data" value="
                                "> -->

                           <div class="col-md-12 col-lg-12 hidden-row" class="" style="display: none;" >


                                <div class="col-md-12 col-lg-12 qst-transaction" class="" style="display: flex;" >



                               <div class="col-md-4 col-lg-4" class="" style="">
                                <input type="text" class="form-control trans-input" name="transactions[]" placeholder="Enter Name" data-type="paragrph">


                                </div>
                                <div class="col-md-4 col-lg-4" class="" style="">
                                 <input type="text" class="form-control key-tags trans-key" id="input-tags4" name="edit_transaction_keywords[]"  placeholder="Enter Keywords">

                                </div>
                                <div class="col-md-4 col-lg-4" class="" style="">
                        <button type="button" class="btn btn-bitbucket add-new-trans" data-toggle="modal"><i class="fa fa-plus"></i></button>

                                </div>
                                                                </div>





                </div>




                           <div class="col-md-12 col-lg-12 hidden-row-sentence" class="" style="display: none;" >


                                <div class="col-md-12 col-lg-12 qst-transaction-sent" class="" style="display: flex;" >



                               <div class="col-md-4 col-lg-4" class="" style="">
                                <input type="text" class="form-control trans-input" name="transactions[]" placeholder="Enter Name" data-type="sentnce">


                                </div>
                                <div class="col-md-4 col-lg-4" class="" style="">
                                 <input type="text" class="form-control key-tags trans-key" id="input-tags4" name="edit_transaction_keywords[]"  placeholder="Enter Keywords">

                                </div>
                                <div class="col-md-4 col-lg-4" class="" style="">
                        <button type="button" class="btn btn-bitbucket add-new-trans-sent" data-toggle="modal"><i class="fa fa-plus"></i></button>

                                </div>
                                                                </div>





                </div>


               <div class="col-md-12 col-lg-12 qst-transaction" class="" style="display: flex;" >



                               <div class="col-md-4 col-lg-4" class="" style="">
                                <input type="text" class="form-control trans-input" name="transactions[]" placeholder="Enter Name" data-id="0">


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

                    <ul class="tabs" style="margin-left: 124px;">


                            <li class="type-tab acive-tab" style="background: #9E9E9E;"><a  class="add-type" style="color: white;" href="javascript:void(0);" data-id="0">Text Box</a></li>
                                        

                            <li class="type-tab " style="background: #9E9E9E;"><a class="add-type" style="color: white;" href="javascript:void(0);" data-id="1">Table</a></li>

                            <li class="type-tab " style="background: #9E9E9E;"><a class="add-type" style="color: white;" href="javascript:void(0);" data-id="2">Terms Paragraph</a></li>
                            <li class="type-tab " style="background: #9E9E9E;"><a class="add-type" style="color: white;" href="javascript:void(0);" data-id="3">Terms Sentence</a></li>



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
<a href="javascript:void(0)" data-order=""  class="btn btn-success btn-sm add-new-pr-btn"><i class="fa fa-plus" aria-hidden="true"></i>

</a>


                        <?php foreach ($problem_format as $key => $value) {
                          $table_pr=$value['table_id'];
                          ?>


                          <div class="col-md-6 col-lg-6" style="display: inline;">
                           

                       <select class="form-control" name="choose_type" id="choose-table"  onchange="add_problem_format()" style="width: 80%;display: inline-block;margin-bottom: 30px;">

<!--                       <option value="0">Text box</option>
                      <option value="1">Table</option>
                      <option value="2">Terms-para</option>
                     <option value="3">Terms-sentence</option> -->

                     <option value="0" selected disabled>Select</option>
                                <?php
                                    foreach($tables as $data){
                                      if($data['table_id']==$table_pr){
                                      echo '<option value="'.$data['table_id'].'" selected>'.$data['table_name'].'</option>';
                                      }else{
                                  echo '<option value="'.$data['table_id'].'">'.$data['table_name'].'</option>';


                                      }
                                    }
                                ?>

                    </select>

                                      <a href="javascript:void(0)" data-order="" data-id="<?=$table_pr;?>" class="btn btn-success btn-sm edit-prblem-btn"><i class="fa fa-pencil" aria-hidden="true"></i>
</a>
                    </div>


                       <?php }

                       ?>


                           



                        <div class="col-md-6 col-lg-6 new-pr-div" style="display: inline;display: none;">
                           <!-- <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#tableModal">Create 
                           
                           </button> -->
                      <button type="submit" class="btn btn-primary ml-auto create-tab-pr"   style="">Create new</button>

                       <select class="form-control" name="choose_type" id="choose-table"  onchange="add_problem_format(this)" style="width: 80%;display: inline-block;">

<!--                       <option value="0">Text box</option>
                      <option value="1">Table</option>
                      <option value="2">Terms-para</option>
                     <option value="3">Terms-sentence</option> -->

                     <option value="0" selected disabled>Select</option>
                                <?php
                                    foreach($tables as $data){
                                        echo '<option value="'.$data['table_id'].'">'.$data['table_name'].'</option>';
                                    }
                                ?>

                    </select>
                    </div>

                     


              </div>


                                     <div class="col-lg-7 col-md-12 show_table" style="display: none;">

                                      
                                      <input type="hidden" id="table_fr_id" value="0">
                                    <input type="text" id="pr_table_name" value="" class="form-control" >

                                    <div class="card append-table-pr-row" style="display: none;">






                                   
                                    </div>
                                    


                                      <div class="col-lg-12 col-md-12 plus-new-pr" style="margin-top: 17px;" ><button type="button "; style="background: #104861;color: white;float: right"  class="btn-add-rw">Add row</div>



                                    <div class="card append-table" style="margin-top: 17px;">




                                   
                                    </div>



                                     

                                     </div>


                                     <div class="col-lg-3 col-md-4 choose_value_type" style="height: 232px;
    border: 1px solid rgba(0, 0, 0, 0.17);
    border-radius: 3px;display: none;" >

        <select class="form-control" name="choose_add_type" id="choose-add-type"  onchange="add_format_values()" style="width: 105%;">

                      <option value="0">Value/Text</option>
                      <option value="1">Help Text</option>
                      <option value="2">Help Image</option>
                     <option value="3">Keywords</option>

                   </select>
                   <div class="" style="height: 100px">

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
                              
                               <input type="text" name="value_text" id="value_text" class="form-control value_text" data-type="text" onkeyup="insert_values(this)">



<!-- <input type="hidde" name="format_va">
 -->                   </div>



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
                    <div class="col-md-13 col-lg-12" style="display: flex;">
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

                  




                      <div class="col-md-12 col-lg-12" style="display: flex;">

                     <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Table Header</label>
                              <div class="headenote" id="headenote" data-id="0" style="height: 78px;"></div>
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
                        <form id="col-form">



            <div class="row" id="define-cols-div" style="">
                <div class="col-lg-12" id="col-div" style="">
                    <div class="col-md-13 col-lg-12" style="display: flex;">
                      <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Table Name</label>
                            <input type="text" class="form-control" name="table_name" placeholder="Enter Name" required>
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
        <div id="btn-one">
            <button type="button" id="cancel-qt-btn" class="btn btn-default">Cancel</button>
                        <button type="button" id="create-tbl-btn" class="btn btn-info">Create</button>

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
                              


        <button type="button" id="add_qst_table_val" class="btn btn-info add_qst_table_val" data-id="">Add Values</button>
      </div>
    </div>

  </div>
</div> 
<script type="text/javascript">
  var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons

    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'align': [] }],

    ['clean']                                         // remove formatting button
  ];

 

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

     var quill1 = new Quill('.editor', {
    theme: 'snow',   // Specify theme in configuration
    modules: {
      // Equivalent to { toolbar: { container: '#toolbar' }}
      toolbar: toolbarOptions
    }
  });
  
  // for (var i = 0; i <= 8; i++) {
  //                       var quill = new Quill('.editor'+i, {
  //   theme: 'snow',   // Specify theme in configuration
  //   modules: {
  //     // Equivalent to { toolbar: { container: '#toolbar' }}
  //     toolbar: toolbarOptions
  //   }
  // });
    
  // }

  

  

 

  quill1.on('text-change', function(delta, oldDelta, source) {

    var elem = document.querySelector('.editor');
    var html_content=elem.children[0].innerHTML;
    //var id=1;
    var order=elem.getAttribute('data-id');

    // console.log(elem.getAttribute('data-id'));

    //alert(elem.closest('.order-quill').value);


      //  console.log(elem.children[0].innerHTML);


       $.ajax({
            url:base_url+'add-question-text',
            type:'post',
            data:{html_content:html_content,order:order},
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


     $(document).on('click',".plus-new-pr",function (e) {
      var i=0;

        $('.append-div-prblem').find('.tr-problem').each(function(e){
        // if(i==0) ids += $(this).attr('data-id');
        // else ids += ','+$(this).attr('data-id');
        i++;
    })

         $('.append-table-pr-row').find('.add_question_div').attr('data-row',i);
      
      var html=$('.append-table-pr-row').html();


      $('.append-div-prblem').append(html);
      // alert('cxhggxcgc');

      });





  $(document).on('click',".add-new-trans",function (e) {

   // var q_id = $(this).data('id');
    $(this).removeClass('row-plus-btn');
    $(this).addClass('row-minus-btn');
    $(this).html('<i class="fa fa-minus"></i>');
    var html = $('.hidden-row').html();
    var time = new Date().getTime();
    var tag = 'key-tags'+time;
    html = html.replace('key-tags',tag);
    $('.qst-transaction:last').after(html);
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


  $(document).on('click',".add-new-trans-sent",function (e) {

   // var q_id = $(this).data('id');
    $(this).removeClass('row-plus-btn');
    $(this).addClass('row-minus-btn');
    $(this).html('<i class="fa fa-minus"></i>');
    var html = $('.hidden-row-sentence').html();
    var time = new Date().getTime();
    var tag = 'key-tags'+time;
    html = html.replace('key-tags',tag);
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



  $(document).on('click',".add-type",function (e) {



    $('.type-tab').each(function (index1, value1) {
      $(this).removeClass('acive-tab');


    });

    $(this).parent().addClass('acive-tab');

  //alert(document)

  if($(this ).data('id')=="0"){



       var i=0;

    $('.edit-qst-div').find('.text-box').each(function (index, value) {

i++;

    });

           // alert(i);

    // if(i==1){
    //       $('.text-box').show();


    //       }else{
            var html='<div class="col-lg-2 col-md-12 " style=""></div><div class="col-md-12 col-lg-10 text-box" > <div class="form-group"><label class="form-label">Text</label><div class="editor'+i+'" id="product_description_div" data-id="'+i+'" style="height: 250px;"></div><textarea name="product_description" id="text_qst" class="editor_content" style="display: none;" required></textarea><input type="hidden" id="order" value="'+i+'" class="order-quill"></div></div>';




                      $('.append-new').append(html);
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

    // console.log(elem.getAttribute('data-id'));

    //alert(elem.closest('.order-quill').value);


      //  console.log(elem.children[0].innerHTML);


       $.ajax({
            url:base_url+'add-question-text',
            type:'post',
            data:{html_content:html_content,order:order},
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

     $('.edit-qst-div').find('.choose_type').each(function (index, value) {
       $(this).removeClass('active');
       k++;

    });
    //var j=k-1;
   // var k=$('.add_table').length;
   //    alert(k);


   //  if(k==1){
   //        $('.add_table').show();


   //        }else{
            var html='<div class="col-lg-4 col-md-12 " style=""></div><div class="col-lg-8 col-md-12 add_table" style="margin-top:56px;">';
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
      // }

        
        // $('.text-box').hide();
        // $('.qst-transaction-row').hide();

    
    //$('.add_table').show();

  }else if($(this ).data('id')=="2"){


        var m=0;

     $('.append-new').find('.qst-transaction').each(function (index, value) {
       //$(this).removeClass('active');
       m++;

    });
     // var h=m-1;
    
           // $('.qst-transaction-row').show();

             var html='<div class="col-lg-3 col-md-12 " style=""></div><div class="row col-lg-8 col-md-12 qst-transaction-row"  style="margin-top: 56px;" data-order="'+m+'"  data-type="paragrph">';
                         $('.hidden-row').find('.key-tags').addClass('keytag'+m);


             html+=$('.hidden-row').html();
             html+='  </div>';

            console.log(html);

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

     $('.append-new').find('.qst-transaction-sent').each(function (index, value) {
       //$(this).removeClass('active');
       m++;

    });
     // var h=m-1;
    
           // $('.qst-transaction-row').show();

             var html='<div class="col-lg-3 col-md-12 " style=""></div><div class="row col-lg-8 col-md-12 qst-transaction-row"  style="margin-top: 56px;" data-order="'+m+'"  data-type="paragrph">';
                         $('.hidden-row-sentence').find('.key-tags').addClass('keytag'+m);


             html+=$('.hidden-row-sentence').html();
             html+='  </div>';

            console.log(html);

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

    });



    $(document).on('change',".trans-key",function (e){

                var transaction=$(this).val();
                var transid=$(this).data('trns');
                //alert('hgghgh');


                  $.ajax({
            url:base_url+'add-keywords',
            type:'post',
            data:{id:transid,value:transaction},
            success: function(out){
                var out = JSON.parse(out);
                if(out.status == 1){
                    var trans=out.data;

                  //  $(this).parent().find('.trans-key').attr('data-trns',trans);

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
                    // alert('Oops something went wrong! Please try again');
                }
            }
        })







              });


         $(document).on('focusout',".trans-input",function (e){
                var transaction=$(this).val();
                var type=$(this).data('type');
                var obj=$(this);
                var order=$(this).parent().parent().parent().find('.qst-transaction-row').data('order')

                                    // console.log($(this).parent().parent().parent().find('.trans-key').val());



                  $.ajax({
            url:base_url+'add-transaction-nw',
            type:'post',
            data:{transaction:transaction,type:type,order:order},
            success: function(out){
                var out = JSON.parse(out);
                if(out.status == 1){
                    var trans=out.data;

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
                    '<input type="checkbox" class="custom-control-input sub-tab" name="column_sub_check'+i+'" id="column_sub_one_check"  data-id="1">'+

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
                    '<input type="checkbox" class="custom-control-input sub-tab" name="column_sub_check'+i+'" id="column_sub_one_check"  data-id="1">'+

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

  $("#add-ans-btn").click();
                                     $('#getModal').modal('hide');

  


  })



 $(document).on('click','.add-new-pr-btn',function(e){
  //alert('ghdghd');
  $('.new-pr-div').show();
  $('.new-pr-div').css('display','inline');
  //display: inline

  })


 $(document).on('click','.edit-prblem-btn',function(e){

      var table_id1=$(this).data('id');


      $.ajax({
            url:base_url+'add-problem-format',
            type:'post',
            data:{table_id:table_id1},
            success: function(out){
                var out = JSON.parse(out);
                if(out.status==1){
                  var columns=out.data.table_columns;
                  var table_id=out.data.problem_id;
                  var data1=out.data;

                    
                   $('.show_table').show();

                   $('.add_table').hide();




                   var name_array=[data1.column_one_name,data1.column_two_name,data1.column_three_name,data1.column_four_name,data1.column_five_name,
                     data1.column_six_name,data1.column_seven_name,data1.column_eight_name,data1.column_nine_name,data1.column_ten_name,
                     ];


                      var count_array=[data1.count_one_table,data1.count_two_table,data1.count_three_table,data1.count_four_table,data1.count_five_table,
                     data1.count_six_table,data1.count_seven_table,data1.count_eight_table,data1.count_nine_table,data1.count_ten_table,
                     ];



                 var html='<table class="table card-table table-vcenter">';
                 html+='<thead><tr>';

                     for(var i=0;i<columns;i++){



                       html+='<th>'+name_array[i]+'</th>';


                      }


                      html+='</tr></thead><tbody class="append-div-prblem">';




                     for(var j=0;j<2;j++){
                      html+='<tr class="tr-problem">';
                                            var htmlval='<tr class="tr-problem">';




                     for(var i=0;i<columns;i++){


                                           if(count_array[i]!=0){

                                            html+='<td> <table class="table card-table table-vcenter"><tr>';
                                            htmlval+='<td> <table class="table card-table table-vcenter"><tr>';

                    for(var k=0;k<count_array[i];k++){

                      html+='<td><button type="submit" class="btn add_question_div" id="add_question_div"   data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'" style="float: right;padding: 0px;"  onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1.2rem;"></i></button></td>';
                      htmlval+='<td><button type="submit" class="btn add_question_div" id="add_question_div"   data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'" style="float: right;padding: 0px;"  onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1.2rem;"></i></button></td>';

                      }




                                            html+='</tr> </table></td>';
                                            htmlval+='</tr> </table></td>';










                                           }else{


                                            html+='<td><button type="button" class="btn add_question_div" id="add_question_div"  data-column="'+i+'" data-row="'+j+'"  style="float: right;padding: 0px;" onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1.2rem;"></i></button></td>';
                                              htmlval+='<td><button type="button" class="btn add_question_div" id="add_question_div"  data-column="'+i+'" data-row="'+j+'"  style="float: right;padding: 0px;" onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1.2rem;"></i></button></td>';


                                            }






                       


                      }

                                            html+='</tr>';
                                            htmlval+='</tr>';

                    }






                      html+='</tr></tbody></table>';
                                                                                  // console.log(htmlval);

                      
                      
                      $('#table_fr_id').val(table_id1);
                        $('#pr_table_name').val(out.data.table_name);

                      

                      $('.append-table').html(html);
                      $('.append-table-pr-row').html(htmlval);
                      



                      


                 
                }
                else{
                    alert('Oops something went wrong!');
                }
            }
        })




    });



$(document).on('click','.edit-qst-btn',function(e){

            var table = $(this).data('id');
           // alert($('#table_tval').val());
            var dataid = $(this).data('order');
            

 

  $("#tableModal").modal('show');

   $('#add-ans-btn').attr('data-id',table);
  $('#row-form').find('.tab_id').val(table);
   $('#row-form').find('.order-id').val(dataid);

  $("#add-ans-btn").click();
                                    // $('#getModal').modal('hide');

  


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
                     data1.column_six_name,data1.column_seven_name,data1.column_eight_name,data1.column_nine_name,data1.column_ten_name,
                     ];
                        var count_array=[data1.count_one_table,data1.count_two_table,data1.count_three_table,data1.count_four_table,data1.count_five_table,
                     data1.count_six_table,data1.count_seven_table,data1.count_eight_table,data1.count_nine_table,data1.count_ten_table,
                     ];

                     var amnt_array=[data1.column_one_sum,data1.column_two_sum,data1.column_three_sum,data1.column_four_sum,data1.column_five_sum,
                     data1.column_six_sum,data1.column_seven_sum,data1.column_eight_sum,data1.column_nine_sum,data1.column_ten_sum,
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


$(document).on('click','#edit-ans-save',function(){
    var id = $('.qt_id').val();
   $('#row-form').find(':checkbox:not(:checked)').attr('value', '0').prop('checked', true);

    $.ajax({
        url:base_url+'edit-question-table',
        type:'post',
        data:$('#row-form').serialize(),
        success:function(out){
            var out = JSON.parse(out);
            if(out.status==1){
                $('.qt-btn').hide();
                $('.qt-tabl-div').show();
                $('.qt_table_id').val(id);
                $('.qt-remove-btn').attr('data-id',id);
                $('#tableModal').modal('hide');
                var html = $('#col-div').html();
                $('#define-cols-div').html('<div class="col-lg-12" id="col-div" style="display:flex;">'+html+'</div>');
                $('#col-div').find('.form-control').val('');
                $('#define-table-div').show();
                $('#btn-one').show();
                $('#define-row-div').hide();
                $('#btn-three').hide();
                $('#table_name').val('');
                $('#table_cols').val('');
            }
            else{
                alert('Oops something went wrong!');
            }
        }
    })
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
                  // var table_id=out.data.problem_id;
                  var data1=out.data;


                   var name_array=[data1.column_one_name,data1.column_two_name,data1.column_three_name,data1.column_four_name,data1.column_five_name,
                     data1.column_six_name,data1.column_seven_name,data1.column_eight_name,data1.column_nine_name,data1.column_ten_name,
                     ];


                      var count_array=[data1.count_one_table,data1.count_two_table,data1.count_three_table,data1.count_four_table,data1.count_five_table,
                     data1.count_six_table,data1.count_seven_table,data1.count_eight_table,data1.count_nine_table,data1.count_ten_table,
                     ];
                     var width_array=[data1.column_one_width,data1.column_two_width,data1.column_three_width,data1.column_four_width,data1.column_five_width,
                     data1.column_six_width,data1.column_seven_width,data1.column_eight_width,data1.column_nine_width,data1.column_ten_width,
                     ];




                     var html='<div class="col-lg-12" id="col-div" style=""><table class="table card-table table-vcenter"><thead><tr><th>S/No</th><th>Column Name</th><th>Width</th><th>No.Sub columns</th></tr></thead>';
                     html+='<tbody>';
                     var k=0;
                     for (var i =0; i <=columns ; i++){
                      k=i+1;



                      html+='<tr><td>'+k+'</td><td>'+name_array[i]+'</td><td>'+width_array[i]+'</td><td>'+count_array[i]+'</td></tr>';
                     }

                                          html+='</tbody>';
                                         html+='</table></div>';

                                    $('.table-det').html(html);
                                    
                                                                        $('#table_tval').val(table_id);
                                                                        $('#table_torder').val(order);

                                    $('#add_qst_table_val').attr('data-id',table_id);

                                    
                                   $('#getModal').modal('show');











                  


                }
                else{
                    alert('Oops something went wrong!');
                }
            }
        })



                



  


}


function add_problem_format(e){

  var table_id=$(e).val();
 

  $.ajax({
            url:base_url+'add-problem-format',
            type:'post',
            data:{table_id:table_id},
            success: function(out){
                var out = JSON.parse(out);
                if(out.status==1){
                  var columns=out.data.table_columns;
                  var table_id=out.data.problem_id;
                  var data1=out.data;

                    
                   $('.show_table').show();

                   $('.add_table').hide();




                   var name_array=[data1.column_one_name,data1.column_two_name,data1.column_three_name,data1.column_four_name,data1.column_five_name,
                     data1.column_six_name,data1.column_seven_name,data1.column_eight_name,data1.column_nine_name,data1.column_ten_name,
                     ];


                      var count_array=[data1.count_one_table,data1.count_two_table,data1.count_three_table,data1.count_four_table,data1.count_five_table,
                     data1.count_six_table,data1.count_seven_table,data1.count_eight_table,data1.count_nine_table,data1.count_ten_table,
                     ];



                 var html='<table class="table card-table table-vcenter">';
                 html+='<thead><tr>';

                     for(var i=0;i<columns;i++){



                       html+='<th>'+name_array[i]+'</th>';


                      }


                      html+='</tr></thead><tbody class="append-div-prblem">';




                     for(var j=0;j<2;j++){
                      html+='<tr class="tr-problem">';
                                            var htmlval='<tr class="tr-problem">';




                     for(var i=0;i<columns;i++){


                                           if(count_array[i]!=0){

                                            html+='<td> <table class="table card-table table-vcenter"><tr>';
                                            htmlval+='<td> <table class="table card-table table-vcenter"><tr>';

                    for(var k=0;k<count_array[i];k++){

                      html+='<td><button type="submit" class="btn add_question_div" id="add_question_div"   data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'" style="float: right;padding: 0px;"  onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1.2rem;"></i></button></td>';
                      htmlval+='<td><button type="submit" class="btn add_question_div" id="add_question_div"   data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'" style="float: right;padding: 0px;"  onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1.2rem;"></i></button></td>';

                      }




                                            html+='</tr> </table></td>';
                                            htmlval+='</tr> </table></td>';










                                           }else{


                                            html+='<td><button type="button" class="btn add_question_div" id="add_question_div"  data-column="'+i+'" data-row="'+j+'"  style="float: right;padding: 0px;" onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1.2rem;"></i></button></td>';
                                              htmlval+='<td><button type="button" class="btn add_question_div" id="add_question_div"  data-column="'+i+'" data-row="'+j+'"  style="float: right;padding: 0px;" onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1.2rem;"></i></button></td>';


                                            }






                       


                      }

                                            html+='</tr>';
                                            htmlval+='</tr>';

                    }






                      html+='</tr></tbody></table>';
                                                                                  // console.log(htmlval);

                      
                      
                      $('#table_fr_id').val(table_id);
                        $('#pr_table_name').val(out.data.table_name);

                      

                      $('.append-table').html(html);
                      $('.append-table-pr-row').html(htmlval);
                      



                      


                 
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
                $('#value_text').val(out.data.value_text);
                $('#help_text').val(out.data.value_help);
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



function add_format_values(){

  var value_type=$('#choose-add-type').val();

  var text=$('#text_val').val();
                  
               var h_text=$('#help_value').val();
                var col_key=$('#col_vals').val();
  if(value_type==0){
    $('#value_text').focus();



     $('.append_div').html('<input type="text" name="value_text" id="value_text" class="form-control value_text" data-type="text"  value="'+text+'" onkeyup="insert_values(this)">');

  }else if(value_type==1){
        $('.append_div').html('<input type="text" name="help_text" id="help_text" class="form-control value_text" data-type="h_text"  value="'+h_text+'"  onkeyup="insert_values(this)">');


  }
  else if(value_type==2){
        $('.append_div').html('<form id="fileinfo" enctype="multipart/form-data" method="post" name="fileinfo"><input type="file" name="help_img"  data-type="h_img" id="help_img" onchange="insert_values(this)"></form>');


  }
  else if(value_type==3){
        $('.append_div').html(' <input type="text" class="form-control key-tags pr-keys"  onchange="insert_values(this)" id="input-tags4" data-type="h_key"  value="'+col_key+'" name="qst_keywords"  placeholder="Enter Keywords">');


          


  }


}


 function  insert_values(e){



   //  $(document).on('focusout','#value_text',function(e){

  var type=$(e).data('type');


    var col=$('#column_value').val();
        var rows=$('#row_value').val();

    var sub=$('#sub_value').val();

    var table_id=$('#choose-table').val();
        var table_name=$('#pr_table_name').val();

  var q_id=$('#question_id').val();


  if(type!='h_img'){

    var val=$(e).val();




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

        var property = document.getElementById('help_img').files[0];
         var form_data = new FormData();
        form_data.append("file",property);
       form_data.append("type",type);
       form_data.append("col",col);
       form_data.append("rows",rows);
       form_data.append("sub",sub);
       form_data.append("table_id",table_id);


        console.log(form_data);


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


