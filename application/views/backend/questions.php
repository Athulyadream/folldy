<style type="text/css">
  .input-container {
/*  margin: 3em auto;
*/  max-width: 300px;
  background-color: #EDEDED;
  border: 1px solid #DFDFDF;
  border-radius: 5px;
}

.fileinput {
/* // display: none;
*/}

.file-info {
  font-size: 0.9em;
}

.browse-btn {
  background: #03A595;
  color: #fff;
  min-height: 30px;
 padding: 6px;
  border: none;
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
}

.browse-btn:hover {
  background: #4ec0b4;
}

@media (max-width: 300px) {
  button {
    width: 100%;
    border-top-right-radius: 5px;
    border-bottom-left-radius: 0;
  }
  
  .file-info {
    display: block;
    margin: 10px 5px;
  }
}

</style>





<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
          <?php 
            if($this->session->flashdata('table_created') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Question Added
          </div>
          <?php
            }
            elseif($this->session->flashdata('table_created') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error unable to add question!
          </div>
          <?php
            }

            if($this->session->flashdata('table_updated') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Question Updated
          </div>
          <?php
            }
            elseif($this->session->flashdata('table_updated') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error updating question! Please contact tech support.
          </div>
          <?php } ?>
      <div id="roles-table" class="col-12">

        <form action="<?=base_url('admin/category-filter')?>" method="post" class="card filter" style="display: none;">
          <div class="card-body">
            <div class="row">
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" name="filter_name" id="filter_name" placeholder="eg: Calicut">
                </div>
              </div>
              <div class="col-md-2 col-lg-2">
                <div class="form-group">
                  <label class="form-label">Status</label>
                  <select class="form-control" name="filter_status" id="filter_status">
                    <option selected="selected" value="">All</option>
                    <option value="1">Active</option>
                    <option value="2">Suspended</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2 col-lg-2">
                <div class="form-group" style="margin-top: 1.5rem;text-align: right;">
                  <button type="reset" class="btn btn-secondary" data-toggle="tooltip" title="Reset"><i class="fa fa-refresh"></i></button>
                  <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Apply"><i class="fa fa-check"></i></button>
                </div>
              </div>
            </div>
          </div>
        </form>

        <div class="page-header" style="margin:0;">
            <h1 class="page-title">
                <a href="<?=base_url('chapters')?>"><i class="fa fa-chevron-left"> Back to chapters</i></a>
            </h1>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Questions</h3>
                <div class="ml-auto">
                    <!-- <a href="#" id="filter-btn" class="btn ml-auto" data-toggle="tooltip" title="Filter"><i class="fa fa-filter"></i></a> -->
                    <?php
                      if($this->session->userdata('create')){
                    ?>
                      <a href="#" id="add-role-btn" class="btn btn-primary ml-auto">Add Question</a>
                    <?php
                      }
                    ?>
                </div>
            </div>
            <div class="table-responsive" style="overflow-x: unset;">
            <?php
                if(!empty($tables)){
            ?>
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th class="w-1">#</th>
                            <th>Question</th>
                            <th>Table</th>
                            <th>Created On</th>
                            <th>Created By</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=$offset+1;
                            foreach($questions as $data){
                            ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$data['question_code']?></td>
                                <td><?=$data['table_name']?></td>
                                <td><?=date('d-m-Y',$data['updated_on'])?></td>
                                <td><?=$data['admin_name']?></td>
                                <td>
                                  <?php
                                    if(!empty($data['qt_ids']) && ($this->session->userdata('edit') || $this->session->userdata('admin_id')==$data['updated_by']) ){
                                  ?>
                                    <a href="<?=base_url('table-keywords').'/'.$data['question_id']?>" class="btn btn-default btn-sm">Add/Edit Question Table</a>
                                  <?php
                                    }
                                  ?>
                                </td>
                                <td>
                                  <?php
                                    if($this->session->userdata('view')){
                                  ?>
                                    <a href="<?=base_url('answers').'/'.$data['question_id']?>" class="btn btn-default btn-sm">View Answers</a>
                                  <?php
                                    }
                                  ?>
                                </td>
                                <td class="text-right">
                                    <?php
                                      if($this->session->userdata('view')){
                                    ?>
                                      <a href="<?=base_url('view').'?id='.$data['question_id']?>" target="_blank" class="btn btn-primary btn-sm">View</a>
                                    <?php
                                      }
                                    ?>
                                    <?php
                                      if($this->session->userdata('edit') || $this->session->userdata('admin_id')==$data['updated_by']){
                                    ?>
                                      <a href="javascript:void(0)" data-id="<?=$data['question_id']?>" class="btn btn-success btn-sm edit-question-btn">Edit</a>
                                       <a href="javascript:void(0)" style="background: #fd9644" data-id="<?=$data['question_id']?>" class="btn btn-success btn-sm clone-question-btn">Clone</a>
                                      
                                    <?php
                                      }
                                    ?>

                                        <?php
                                      if($this->session->userdata('delete')){
                                    ?>
                                    <a href="javascript:void(0)" data-id="<?=$data['question_id']?>" class="btn btn-danger btn-sm delete-question-btn">Delete</a>
                                  <?php } ?>
                                </td>
                            </tr>
                            <?php
                            }
                        ?>
                    </tbody>
                </table>
            <?php
                }
                else{
                    echo '<h3 class="text-center" style="padding-top:20px;">No data available</h3>';
                }
            ?>
            </div>
            <div class="pagination">
                <ul>
                    <?php
                    if(!empty($links)){
                        echo $links;
                    }
                    ?>
                </ul>  
            </div>
        </div>
        <div>
            <h3>Note</h3>
            <p>Use ALT+CTRL for functions, CTRL+SPACE key for themes</p>
            <p>Use ALT+H to show keywords, ALT+T to toggle transaction tray, ALT+N to add new row, ALT+R to remove rows, ALT+Q for questions, ALT+A for answers, ALT+F for full view.</p>
            <p>Use ALT+X to show or hide help text</p>
            <p>Use ALT+B to show or hide total field bg</p>
            <p>Use ALT+I to show or hide answer images</p>
            <p>Use ALT+X to show or hide help text</p>
            <p>Use arrow keys left & right to toggle b/w tables</p>
            <p>Use ALT + arrow keys left & right to toggle b/w question tables</p>
            <p>Use SHIFT + arrow keys left & right to toggle b/w transactions</p>
            <p>Use ALT + U to underline answer cells</p>
            <p>Use ALT + D to double underline answer cells</p>
            <p>Use ALT + D to double underline answer cells</p>
            <p>Use ALT + W to  underline text input</p>
            <p>Use SHIFT + D to  shift answer table to Drag/Drop mode</p>
            <p>Use SHIFT + H to  shift answer table to Hide/Show mode</p>
            <p>Click on table to input text, Use enter key to submit.</p>
        </div>
    </div>
    <div id="add-role-form" class="col-12" style="display: none;">
        <form action="<?=base_url('add-question')?>" method="post" class="card" enctype="multipart/form-data" >
          <div class="repeat_row">
            <div class="card-header">
                <h3 class="card-title">Add Question</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Question Code</label>
                            <input type="text" class="form-control" name="question_code" id="question_code" placeholder="Enter Question Code" maxlength="20" onfocusout="check_code_exist();">
                        </div>
                        <p style="color: red" id="question_msg"></p>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Question</label>
                            <textarea class="form-control " name="question_title" id="question_title" placeholder="Enter Question" rows="5" ></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Question</label>
                            <button type="button" class="qt-btn" data-toggle="modal" data-target="#tableModal0">Add</button>
                            <div class="qt-tabl-div0" style="display:none;">
                                <p>
                                    <span class="qt-tabl-name0"></span>&emsp;
                                    <a class="qt-remove-btn0" href="#">Remove</a>
                                </p>
                            </div>
                            <input type="hidden" name="qt_id[]" class="qt_table_id0"> 
                        </div>
                    </div>

                    <?php

                      for($i=1;$i<=9;$i++){
                    ?>

                    <div class="col-md-12 col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Table <?=$i?><?php if($i==1){ ?>(  upload images of 1050*600 px size)<?php } ?> </label>
                            
                          
                            <select class="form-control" name="table_id<?=$i?>" id="table_id<?=$i?>" required>
                                <option value="0" selected disabled>Select</option>
                                <?php
                                    foreach($tables as $data){
                                        echo '<option value="'.$data['table_id'].'">'.$data['table_name'].'</option>';
                                    }
                                ?>
                            </select></br>

                           <!--  <div class="input-container">
                              <input type="file" id="real-input<?=$i?>" data-id="<?=$i?>" class="fileinput question_img<?=$i?>" name="question_img<?=$i?>">
                                <button class="browse-btn" data-id="<?=$i?>">
                                  Browse Files
                                </button>
                              <span class="file-info<?=$i?>">Upload a file</span>
                            </div> -->
                            
                             <input type="file" name="question_img<?=$i?>" class="question_img<?=$i?> "  onchange="validateImage('question_img<?=$i?>')" style="border: 2px solid #45aaf2;">
                         
                             
                      </div>
                    </div>

                    <?php
                      }
                    ?>
                    <div class="col-md-12 col-lg-6"></div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Transactions</label>
                            <ol id="transactions0">
                            </ol>
                            <button type="button" class="btn btn-bitbucket" data-toggle="modal" data-target="#myModal0"><i class="fa fa-plus"></i></button>
                        </div>
                        <input type="hidden" name="transaction_ids0" id="transaction_ids0">
                    </div>
                </div>
            </div>


             </div>
             <div class="col-md-12 col-lg-12" style="text-align: right;">
              <div class="form-group">
            <button type="button" class="btn btn-bitbucket" id="add_question_div" data-toggle="modal" onclick="add_row_question();" data-target="" style="    background-color: #5eba00;border-color: #5eba00;"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
            </div></div>

            <div id="repeat_quest" style="display: none;"></div>
            <div id="rep_div" class="col-md-12 col-lg-12">

            </div>


            <div class="card-footer text-right">
                <div class="d-flex">
                    <a href="<?=base_url('questions')?>" class="btn btn-link">Cancel</a>
                    <button type="submit" class="btn btn-primary ml-auto">Add</button>
                </div>
            </div>
        </form>




    </div>

    <!-- edit Form -->
    <div id="edit-table-form" class="col-12" style="display: none;">
        <form action="<?=base_url('edit-question')?>" method="post" class="card" enctype="multipart/form-data">
              <div class="card-header">
                  <h3 class="card-title">Edit Question</h3>
                  <input type="hidden" name="question_id" id="question_id">
              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Question Code</label>
                            <input type="text" class="form-control" name="edit_question_code" id="edit_question_code" placeholder="Enter Question Code" maxlength="20" >
                        </div>
                      </div>
                      <div class="col-md-12 col-lg-12">
                          <div class="form-group">
                              <label class="form-label">Question</label>
                              <textarea class="form-control" name="edit_question_title" id="edit_question_title" placeholder="Enter Question" rows="5" required></textarea>
                          </div>
                      </div>
                      <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Question Table</label>
                            <button type="button" class="qt-btn" data-toggle="modal" data-target="#tableModal0" style="display:none;">Add</button>
                            <div class="qt-tabl-div0">
                                <p>
                                    <span id="edit-qt-tabl-name" class="qt-tabl-name0"></span>&emsp;
                                    <a id="edit-qt-remove-btn" class="qt-remove-btn0" href="#">Remove</a>
                                </p>
                            </div>
                            <input type="hidden" name="qt_id[]" id="edit_qt_table_id" class="qt_table_id0"> 
                        </div>
                      </div>
                      <?php
                        for($i=1;$i<=9;$i++){
                      ?>
                        <div class="col-md-12 col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Table <?=$i?><?php if($i==1){ ?>(  upload images of 1050*600 px size)<?php } ?></label>
                                <select class="form-control" name="edit_table_id<?=$i?>" id="edit_table_id<?=$i?>" required>
                                    <option value="0" selected <?php if($i==1) echo 'disabled'; ?>>None</option>
                                    <?php
                                        foreach($tables as $data){
                                            echo '<option value="'.$data['table_id'].'">'.$data['table_name'].'</option>';
                                        }
                                    ?>
                                </select><br>
                                  <div class="show_img<?=$i?>"></div>
                                 
                                <input type="file" name="edit_question_img<?=$i?>" onchange="validateImage('edit_question_img<?=$i?>')" class="edit_question_img<?=$i?>" style="border: 2px solid #45aaf2;">
                            </div>
                        </div>
                      <?php
                        }
                      ?>
                      <div class="col-md-12 col-lg-6"></div>
                      <div class="col-md-12 col-lg-12">
                          <div class="form-group">
                              <label class="form-label">Transactions</label>
                              <ol id="edit_transactions" class="transc0">
                              </ol>
                              <button type="button" class="btn btn-bitbucket" data-toggle="modal" data-target="#myModal0"><i class="fa fa-plus"></i></button>
                          </div>
                          <input type="hidden" name="transaction_ids_edit0" id="transaction_ids_edit0" >
                      </div>
                  </div>


                  <div id="repeat_quest_edit" style="display: none;"></div>
            <div id="" class="col-md-6 col-lg-6">
              <div class="row" id="rep_div_edit"></div>


              </div>
               <div id="rep_transaction_edit" class="col-md-12 col-lg-12">



              </div>
              <div class="col-md-12 col-lg-12"></div>

                  <div id="rep_div_qt" class="row col-md-12 col-lg-12" style="    margin-top: 20px;">

                  </div>


               <button type="button" class="btn btn-bitbucket" id="add_question_div" data-toggle="modal" onclick="add_row_question_edit();" data-target="" style="    background-color: #5eba00;border-color: #5eba00;float: right;">New </button>

               

            </div></div>
              <div class="card-footer text-right">
                  <div class="d-flex">
                      <a href="<?=base_url('questions')?>" class="btn btn-link">Cancel</a>
                      <button type="submit" class="btn btn-primary ml-auto">Save</button>
                  </div>
              </div>
            </form>
          </div>
        <!-- /edit form -->



      </div>
    </div>
  </div>
</div>

<!-- Modal Popup -->
        <?php for ($m=0; $m < 5; $m++) { ?>

<div id="myModal<?=$m?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Transaction</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="form-group">
                    <label class="form-label">Transaction</label>
                    <textarea class="form-control" name="transaction_title" id="transaction_title<?=$m?>" placeholder="Enter Transaction" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Help Text</label>
                    <textarea class="form-control" name="transaction_helptext" id="transaction_helptext<?=$m?>" placeholder="Enter Text" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Keywords</label>
                    <input type="text" class="form-control  number" id="input-tags<?=$m?>" name="transaction_keywords" value="" placeholder="Enter Keywords">
                </div>
                <div class="form-group">
                    <label class="form-label">Image (optional)( upload images of 1050*600 px size)</label>
                    <input id="fileupload" type="file" name="file" data-url="<?=base_url('file-upload')?>" data-id="<?=$m?>" class="fileupload">
                    <input type="hidden" name="image_name" id="image_name<?=$m?>" class="image_name<?=$m?>">
                    <div id="upload-img<?=$m?>" class="text-center" style="width:100px;height:auto;display:none;">
                        <img src="">
                        <a id="remove-btn" href="javascript:void(0)">remove</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="add-transaction-btn" data-id="<?=$m?>" class="btn btn-info">Add</button>
      </div>
    </div>

  </div>
</div>
<?php } ?>



<div id="getModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Transaction</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="form-group">
                    <label class="form-label">Transaction</label>
                    <textarea class="form-control" name="transaction_title" id="get_transaction_title" placeholder="Enter Transaction" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Help Text</label>
                    <textarea class="form-control" name="transaction_helptext" id="get_transaction_helptext" placeholder="Enter Text" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Keywords</label>
                    <input type="text" class="form-control key_tag key-tags-new"  name="get_transaction_keywords" value="" placeholder="Enter Keywords">
                </div>
                <div class="form-group">
                    <label class="form-label">Image (optional)(  upload images of 1170*702 px size)</label>
                    <input id="getfileupload" type="file" name="file" data-url="<?=base_url('file-upload')?>">
                    <input type="hidden" name="image_name" id="get_image_name">
                    <div id="get-upload-img" class="text-center" style="width:100px;height:auto;display:none;">
                        <img src="">
                        <a id="get-remove-btn" href="javascript:void(0)">remove</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="transaction-edit-btn" class="btn btn-info">Save</button>
      </div>
    </div>

  </div>
</div>



<div id="cloneModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Clone question</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="form-group">
                    <label class="form-label">Courses</label>
                    <select class="form-control" name="c_id" id="cr_id" required>
                                <option value="0" selected disabled>Select</option>
                                <?php
                                    foreach($courses as $data){
                                        echo '<option value="'.$data['data_id'].'">'.$data['data_name'].'</option>';
                                  }
                                ?>
                            </select>
                </div>
               
                <div class="form-group">
                    <label class="form-label">Papers</label>
                     <select class="form-control" name="pr_id" id="pr_id" required>
                                <option value="0" selected disabled>Select</option>
                                <?php
                                    foreach($papers as $data_p){
                                        echo '<option value="'.$data_p['data_id'].'">'.$data_p['data_name'].'</option>';
                                  }
                                ?>
                            </select>
                </div>



                 <div class="form-group">
                    <label class="form-label">Chapters</label>
                    <select class="form-control" name="ch_id" id="ch_id" required>
                                <option value="0" selected disabled>Select</option>
                                <?php
                                    foreach($chapters as $data_c){
                                        echo '<option value="'.$data_c['data_id'].'">'.$data_c['data_name'].'</option>';
                                  }
                                ?>
                            </select>
                </div>
                
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="" class="btn btn-info clone-add-btn">Clone</button>
      </div>
    </div>

  </div>
</div>


 <div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Transaction</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="form-group">
                    <label class="form-label">Transaction</label>
                    <textarea class="form-control" name="edit_transaction_title" id="edit_transaction_title" placeholder="Enter Transaction" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Help Text</label>
                    <textarea class="form-control" name="transaction_helptext" id="edit_transaction_helptext" placeholder="Enter Text" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Keywords</label>
                    <input type="text" class="form-control key-tags number" id="input-tags2" name="edit_transaction_keywords" value="" placeholder="Enter Keywords">
                </div>
                <div class="form-group">
                    <label class="form-label">Image (optional)</label>
                    <input id="editfileupload" type="file" name="file" data-url="<?=base_url('file-upload')?>" >
                    <input type="hidden" name="edit_image_name" id="edit_image_name">
                    <div id="edit-upload-img" class="text-center" style="width:100px;height:auto;display:none;">
                        <img src="">
                        <a id="edit-remove-btn" href="javascript:void(0)">remove</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="edit-transaction-btn" class="btn btn-info">Add</button>
      </div>
    </div>

  </div>
</div>

<!-- /Modal Popup -->

<!-- Question Table -->
        <?php for ($i=0; $i < 5; $i++) { ?>

          <div id="tableModal<?=$i;?>" class="modal fade table_model" role="dialog">
          <div class="modal-dialog" style="max-width:800px;">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Add Table</h4>
              </div>
              <div class="modal-body">
                <div class="row" id="define-table-div<?=$i;?>">
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Table Name</label>
                            <input type="text" class="form-control" name="table_name" id="table_name<?=$i;?>" placeholder="Enter Name" >
                        </div>
                        <div class="form-group">
                            <label class="form-label">No of Columns</label>
                            <input type="text" class="form-control numberonly" id="table_cols<?=$i;?>" name="table_cols" value="" placeholder="Enter Number" >
                        </div>

                                <div class="form-group">
                                    <label class="form-label">Table width(for single preview)</label>
                                    <input type="text" class="form-control" id="single_width" name="single_width" placeholder="Enter Width for table" >
                                </div>

                    </div>
                </div>
                <form id="col-form<?=$i;?>">
                    <input type="hidden" name="qt_id" class="qt_id<?=$i;?>">
                    <div class="row" id="define-cols-div<?=$i;?>" style="display:none;">
                        <div class="col-lg-12" id="col-div<?=$i;?>" style="display:flex;">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Column Name</label>
                                    <input type="text" class="form-control" name="col_name[]" placeholder="Enter Name" >
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label class="form-label">Column Width</label>
                                    <input type="text" class="form-control numberonly" name="col_width[]" value="" placeholder="Enter Width" required>
                                </div>
                            </div>


                            <div class="col-md-2 col-lg-2">
                                <div class="form-group">
                                    <label class="form-label">Amount Type</label>
                                    <input type="checkbox" class="form-control column_one_check" name="column_one_check[]" id="column_one_check" value="1" style="margin-top: 20px;">
                            <!-- <span class="custom-control-label">Check</span> -->
                                </div>
                            </div>

                        </div>


                       

                    </div>
                </form>
                <input type="hidden" id="row-data<?=$i;?>">
                <form id="row-form<?=$i;?>">
                    <input type="hidden" name="cols" id="cols<?=$i;?>">
                    <input type="hidden" name="qt_id" class="qt_id<?=$i;?>">
                    <div class="row" id="define-row-div<?=$i;?>" style="display:none;">
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <div id="btn-one<?=$i;?>">
                    <button type="button" id="cancel-qt-btn" data-id="<?=$i;?>" class="btn cancel-qt-btn btn-default">Cancel</button>
                    <button type="button" id="add-qt-btn" data-id="<?=$i;?>" class="btn btn-info">Next</button>
                </div>
                <div id="btn-two<?=$i;?>" style="display:none;">
                    <button type="button" id="prev-qt-btn" data-id="<?=$i;?>"  class="btn btn-default">Prev</button>
                    <button type="button" id="add-col-btn" data-id="<?=$i;?>" class="btn btn-info">Next</button>
                </div>
                <div id="btn-three<?=$i;?>" style="display:none;">
                    <button type="button" id="prev-col-btn" data-id="<?=$i;?>"  class="btn btn-default">Prev</button>
                    <button type="button" id="remove-qtable-btn" class="btn btn-warning">Cancel</button>
                    
                    <button type="button" id="add-row-btn" data-id="<?=$i;?>" class="btn btn-info">Save</button>
                </div>
              </div>
            </div>

          </div>
        </div>
        <?php } ?>


<!-- /Question Table -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 -->
<script>
    $(function () {


         $('.fileupload').fileupload({
            dataType: 'json',
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
    // The maximum allowed file size in bytes:
        

            done: function (e, data) {
              
              var id=$(this).data('id');
                var out = data.result.data;
                if(data.result.status == 1){
                  console.log("hhh")
                    $('#fileupload'+id+'').hide();
                    $('#image_name'+id+'').val(data.result.data);
                    $('#upload-img'+id+' img').attr('src',data.result.data);
                    $('#upload-img'+id+'').show();
                }
            }
        });
      
        $('#getfileupload').fileupload({
            dataType: 'json',
            done: function (e, data) {
                var out = data.result.data;
                if(data.result.status == 1){
                  alert("fddf");
                    $('#getfileupload').hide();
                    $('#get_image_name').val(data.result.data);
                    $('#get-upload-img img').attr('src',data.result.data);
                    $('#get-upload-img').show();
                }
            }
        });
        $('#editfileupload').fileupload({
            dataType: 'json',
            done: function (e, data) {
                var out = data.result.data;
                if(data.result.status == 1){
                    $('#editfileupload').hide();
                    $('#edit_image_name').val(data.result.data);
                    $('#edit-upload-img img').attr('src',data.result.data);
                    $('#edit-upload-img').show();
                }
            }
        });
    });

    $(document).on('click','#remove-btn',function(){
        $('#fileupload').show();
        $('#image_name').val('');
        $('#upload-img img').attr('src','');
        $('#upload-img').hide();
    })

    $(document).on('click','#get-remove-btn',function(){
        $('#getfileupload').show();
        $('#get_image_name').val('');
        $('#get-upload-img img').attr('src','');
        $('#get-upload-img').hide();
    })

    $(document).on('click','#edit-remove-btn',function(){
        $('#editfileupload').show();
        $('#edit_image_name').val('');
        $('#edit-upload-img img').attr('src','');
        $('#edit-upload-img').hide();
    })


    function check_code_exist(){
          var q_code = document.getElementById("question_code").value;
         // alert(q_code);

     if(q_code) {

          $.ajax({

                    type: 'post',

                    url:  '<?php echo base_url() ?>checkcode_duplicate',

                    data: { q_code:q_code,},

                    success: function (response) {
                       var out = JSON.parse(response);
                   
                             if(out.status == 0){
                                   $('#question_msg').html('');
                                    return true;  


                            }else{   

                                    $( '#question_msg' ).html('Question code already exists');

                                    $('#question_code').val(' '); 

                                    return false;  

                            }

                    }

          });

     } else {

            $( '#question_code' ).html("");

            return false;

     }
    }



//     const uploadButton = document.getElementsByClassName('.browse-btn');
// const fileInfo = document.querySelector('.file-info');
// const realInput = document.getElementsByClassName('fileinput');





    $(document).on('click','.browse-btn',function(){
 // console.log(uploadButton);
  var id=$(this).data('id');
  

  document.getElementById('real-input'+id+'').click();
});


function validateImage(id) 
{
    var formData = new FormData();

    //var file = document.getElementsByClassName(id).files;
    var file = document.getElementsByClassName(id)[0].files[0];
   // console.log(files);
    formData.append("Filedata", file);

    var t = file.type.split('/').pop().toLowerCase();
    ;
    if (t != "jpeg" && t != "jpg" && t != "png" ) 
    {
        alert('Please select a valid image file');
        document.getElementsByClassName(id)[0].value = '';
        return false;
    }
    img = new Image();
    var imgwidth = 0;
    var imgheight = 0;

    img.src = window.URL.createObjectURL( file );
        
        img.onload = function() 
        {
            imgwidth = this.width;
            imgheight = this.height;

            if( imgwidth == 1170 && imgheight == 702 ) 
            {
                return true;
            }
            else
            {
                alert("Width and height must be 1050x600");
                document.getElementsByClassName(id)[0].value = '';
                return false;
            }
        }
    }


    $(document).on('change','.fileinput',function(){

  var id1=$(this).data('id');
  console.log($(this));
  const name = $(this).val().split(/\\|\//).pop();
  const truncated = name.length > 20 
    ? name.substr(name.length - 20) 
    : name;
  
  $('.file-info'+id1+'').innerHTML = truncated;
});



 $('#cr_id').change(function(){

  

   var cr_id = $(this).val();

   

   $('#pr_id').empty();
   $('#ch_id').empty();



   $.ajax({

           type: "POST",

           url: "<?php echo base_url() ?>AdminAjaxController/get_paper_by_course",

           data: {'id': cr_id},

           success: function(data){

         

               var opts = $.parseJSON(data);
                             $('#pr_id').append('<option value="">Select</option>');


               $.each(opts.data, function(i, d) {

                   $('#pr_id').append('<option value="' + d.data_id + '">' + d.data_name + '</option>');

               });

           }

       });

});



 $('#pr_id').change(function(){

  

   var pr_id = $(this).val();

   

  // $('#pr_id').empty();
   $('#ch_id').empty();



   $.ajax({

           type: "POST",

           url: "<?php echo base_url() ?>AdminAjaxController/get_paper_by_course",

           data: {'id': pr_id},

           success: function(data){

         

               var opts = $.parseJSON(data);
              $('#ch_id').append('<option value="">Select</option>');


               $.each(opts.data, function(i, d) {

                   $('#ch_id').append('<option value="' + d.data_id + '">' + d.data_name + '</option>');

               });

           }

       });

});


    $('input.number').keyup(function(event) {

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
</script>