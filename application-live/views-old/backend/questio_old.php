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
            <div class="table-responsive">
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
                                    if($data['qt_id'] && ($this->session->userdata('edit') || $this->session->userdata('admin_id')==$data['updated_by']) ){
                                  ?>
                                    <a href="<?=base_url('table-keywords').'/'.$data['qt_id']?>" class="btn btn-default btn-sm">Add/Edit Question Table</a>
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
                                      <a href="javascript:void(0)" data-id="<?=$data['question_id']?>" class="btn btn-danger btn-sm delete-question-btn">Delete</a>
                                    <?php
                                      }
                                    ?>
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
            <p>Use arrow keys left & right to toggle b/w tables</p>
            <p>Click on table to input text, Use enter key to submit.</p>
        </div>
    </div>
    <div id="add-role-form" class="col-12" style="display: none;">
        <form action="<?=base_url('add-question')?>" method="post" class="card">
          <div class="repeat_row">
            <div class="card-header">
                <h3 class="card-title">Add Question</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Question Code</label>
                            <input type="text" class="form-control" name="question_code" id="question_code" placeholder="Enter Question Code" maxlength="20" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Question</label>
                            <textarea class="form-control" name="question_title" id="question_title" placeholder="Enter Question" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Question</label>
                            <button type="button" class="qt-btn" data-toggle="modal" data-target="#tableModal">Add</button>
                            <div class="qt-tabl-div" style="display:none;">
                                <p>
                                    <span class="qt-tabl-name"></span>&emsp;
                                    <a class="qt-remove-btn" href="#">Remove</a>
                                </p>
                            </div>
                            <input type="hidden" name="qt_id" class="qt_table_id"> 
                        </div>
                    </div>
                    <?php
                      for($i=1;$i<=9;$i++){
                    ?>

                    <div class="col-md-12 col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Table <?=$i?></label>
                            <select class="form-control" name="table_id<?=$i?>" id="table_id<?=$i?>" required>
                                <option value="0" selected disabled>Select</option>
                                <?php
                                    foreach($tables as $data){
                                        echo '<option value="'.$data['table_id'].'">'.$data['table_name'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <?php
                      }
                    ?>
                    <div class="col-md-12 col-lg-6"></div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Transactions</label>
                            <ol id="transactions">
                            </ol>
                            <button type="button" class="btn btn-bitbucket" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button>
                        </div>
                        <input type="hidden" name="transaction_ids" id="transaction_ids">
                    </div>
                </div>
            </div>


             </div>
             <div class="col-md-12 col-lg-12" style="text-align: right;">
              <div class="form-group">
            <button type="button" class="btn btn-bitbucket" id="add_question_div" data-toggle="modal" onclick="add_row_question();" data-target="" style="    background-color: #5eba00;
    border-color: #5eba00;"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
            </div></div>
            <div id="rep_div"></div>


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
        <form action="<?=base_url('edit-question')?>" method="post" class="card">
              <div class="card-header">
                  <h3 class="card-title">Edit Question</h3>
                  <input type="hidden" name="question_id" id="question_id">
              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Question Code</label>
                            <input type="text" class="form-control" name="edit_question_code" id="edit_question_code" placeholder="Enter Question Code" maxlength="20" required>
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
                            <button type="button" class="qt-btn" data-toggle="modal" data-target="#tableModal" style="display:none;">Add</button>
                            <div class="qt-tabl-div">
                                <p>
                                    <span id="edit-qt-tabl-name" class="qt-tabl-name"></span>&emsp;
                                    <a id="edit-qt-remove-btn" class="qt-remove-btn" href="#">Remove</a>
                                </p>
                            </div>
                            <input type="hidden" name="qt_id" id="edit_qt_table_id" class="qt_table_id"> 
                        </div>
                      </div>
                      <?php
                        for($i=1;$i<=9;$i++){
                      ?>
                        <div class="col-md-12 col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Table <?=$i?></label>
                                <select class="form-control" name="edit_table_id<?=$i?>" id="edit_table_id<?=$i?>" required>
                                    <option value="0" selected <?php if($i==1) echo 'disabled'; ?>>None</option>
                                    <?php
                                        foreach($tables as $data){
                                            echo '<option value="'.$data['table_id'].'">'.$data['table_name'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                      <?php
                        }
                      ?>
                      <div class="col-md-12 col-lg-6"></div>
                      <div class="col-md-12 col-lg-12">
                          <div class="form-group">
                              <label class="form-label">Transactions</label>
                              <ol id="edit_transactions">
                              </ol>
                              <button type="button" class="btn btn-bitbucket" data-toggle="modal" data-target="#editModal"><i class="fa fa-plus"></i></button>
                          </div>
                          <input type="hidden" name="edit_transaction_ids" id="edit_transaction_ids">
                      </div>
                  </div>
              </div>
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
<div id="myModal" class="modal fade" role="dialog">
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
                    <textarea class="form-control" name="transaction_title" id="transaction_title" placeholder="Enter Transaction" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Help Text</label>
                    <textarea class="form-control" name="transaction_helptext" id="transaction_helptext" placeholder="Enter Text" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Keywords</label>
                    <input type="text" class="form-control" id="input-tags" name="transaction_keywords" value="" placeholder="Enter Keywords">
                </div>
                <div class="form-group">
                    <label class="form-label">Image (optional)</label>
                    <input id="fileupload" type="file" name="file" data-url="<?=base_url('file-upload')?>">
                    <input type="hidden" name="image_name" id="image_name">
                    <div id="upload-img" class="text-center" style="width:100px;height:auto;display:none;">
                        <img src="">
                        <a id="remove-btn" href="javascript:void(0)">remove</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="add-transaction-btn" class="btn btn-info">Add</button>
      </div>
    </div>

  </div>
</div>

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
                    <input type="text" class="form-control" id="input-tags3" name="get_transaction_keywords" value="" placeholder="Enter Keywords">
                </div>
                <div class="form-group">
                    <label class="form-label">Image (optional)</label>
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
                    <input type="text" class="form-control" id="input-tags2" name="edit_transaction_keywords" value="" placeholder="Enter Keywords">
                </div>
                <div class="form-group">
                    <label class="form-label">Image (optional)</label>
                    <input id="editfileupload" type="file" name="file" data-url="<?=base_url('file-upload')?>">
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

<div id="tableModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width:800px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Table</h4>
      </div>
      <div class="modal-body">
        <div class="row" id="define-table-div">
            <div class="col-md-12 col-lg-12">
                <div class="form-group">
                    <label class="form-label">Table Name</label>
                    <input type="text" class="form-control" name="table_name" id="table_name" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <label class="form-label">No of Columns</label>
                    <input type="text" class="form-control numberonly" id="table_cols" name="table_cols" value="" placeholder="Enter Number" required>
                </div>
            </div>
        </div>
        <form id="col-form">
            <input type="hidden" name="qt_id" class="qt_id">
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
        </form>
        <input type="hidden" id="row-data">
        <form id="row-form">
            <input type="hidden" name="cols" id="cols">
            <input type="hidden" name="qt_id" class="qt_id">
            <div class="row" id="define-row-div" style="display:none;">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <div id="btn-one">
            <button type="button" id="cancel-qt-btn" class="btn btn-default">Cancel</button>
            <button type="button" id="add-qt-btn" class="btn btn-info">Next</button>
        </div>
        <div id="btn-two" style="display:none;">
            <button type="button" id="prev-qt-btn" class="btn btn-default">Prev</button>
            <button type="button" id="add-col-btn" class="btn btn-info">Next</button>
        </div>
        <div id="btn-three" style="display:none;">
            <button type="button" id="prev-col-btn" class="btn btn-default">Prev</button>
            <button type="button" id="remove-qtable-btn" class="btn btn-warning">Cancel</button>
            <button type="button" id="add-row-btn" class="btn btn-info">Save</button>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- /Question Table -->

<script>
    $(function () {
        $('#fileupload').fileupload({
            dataType: 'json',
            done: function (e, data) {
                var out = data.result.data;
                if(data.result.status == 1){
                    $('#fileupload').hide();
                    $('#image_name').val(data.result.data);
                    $('#upload-img img').attr('src',data.result.data);
                    $('#upload-img').show();
                }
            }
        });
        $('#getfileupload').fileupload({
            dataType: 'json',
            done: function (e, data) {
                var out = data.result.data;
                if(data.result.status == 1){
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
</script>