<div class="my-3 my-md-5">
  <div class="container">
    <div class="page-header">
      <h1 class="page-title">
        Answers
      </h1>
    </div>
    <div class="row">
      <?php 
        if($this->session->flashdata('answer_updated') == 1){
      ?>
      <div class="offset-lg-4 col-md-4 alert alert-success text-center">
        <button type="button" class="close" data-dismiss="alert"></button>
        Answer Added
      </div>
      <?php
        }
        elseif($this->session->flashdata('answer_updated') == 2){
      ?>
      <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
        <button type="button" class="close" data-dismiss="alert"></button>
        <?=$this->session->flashdata('upload_error')?>
      </div>
      <?php
        }
        elseif($this->session->flashdata('answer_updated') == 3){
        ?>
        <div class="offset-lg-4 col-md-4 alert alert-warning text-center">
          <button type="button" class="close" data-dismiss="alert"></button>
          Answer Deleted
        </div>
        <?php
        }
      ?>
    </div>
    <div class="page-header" style="margin:0;">
        <h1 class="page-title">
            <a href="<?=base_url('questions')?>"><i class="fa fa-chevron-left"> Back to questions</i></a>
        </h1>
    </div>
    <?php
      if($this->session->userdata('edit')){
    ?>
    <div class="row row-cards">
      <div class="col-sm-12 col-lg-12">
        <form action="<?=base_url('add-answer/').$question['question_id']?>" method="post" class="card" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <input type="file" class="form-control" name="answer_file" id="answer_file" placeholder="Enter Name" required>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary ml-auto">Add</button>
                  <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#tableModal">Add/Edit Answer Table</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <?php
      }
    ?>
    
    <div class="row row-cards">
      <?php
        if(!empty($answers)){
          foreach($answers as $data){
          ?>
            <div class="col-sm-6 col-lg-4">
              <div class="card p-3">
                <a href="<?=base_url('uploads/').$data['answer_image']?>" target="_blank" class="mb-3">
                  <img src="<?=base_url('uploads/').$data['answer_image']?>" class="rounded" style="width: 100%;height: 225px;">
                </a>
                <?php
                  if($this->session->userdata('edit')){
                ?>
                  <div class="d-flex align-items-center px-2">
                    <div class="ml-auto text-muted">
                      <a href="<?=base_url('delete-answer/').$data['answer_id'].'/'.$question['question_id']?>" class="icon" style="color:red !important;"><i class="fe fe-trash"></i> Delete</a>
                    </div>
                  </div>
                <?php
                  }
                ?>
              </div>
            </div>
          <?php
          }
        }
        else{
          echo '<h4 style="margin:0 auto;">No answers added!<h4>';
        }
      ?>
    </div>
  </div>
</div>
</div>





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

                    <select class="form-control" name="table_id" id="table_id" required>
                                <option value="0" selected disabled>Select</option>
                                <?php
                                    foreach($answer_table as $data){
                                        echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
                                  }
                                ?>
                            </select>
                   
                </div>
                <!-- <div class="form-group">
                    <label class="form-label">No of Columns</label>
                    <input type="text" class="form-control numberonly" id="table_cols" name="table_cols" value="" placeholder="Enter Number" required>
                </div> -->
            </div>
        </div>
        <form id="col-form">
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
        </form>
        <input type="hidden" id="row-data">
        <div id="row-data-edit" style="display: none;"></div>
        <form id="row-form">
            <input type="hidden" name="cols" id="cols">
            <!-- <input type="hidden" name="qt_id" class="qt_id"> -->
             <input type="hidden" name="tab_id" class="tab_id">
             <input type="hidden"  value="<?php echo $question['question_id'];?>" name="qt_id" class="qt_id">
             
            <div class="row" id="define-row-div" style="display:none;">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <div id="btn-one">
            <button type="button" id="cancel-qt-btn" class="btn btn-default">Cancel</button>
            <button type="button" id="add-ans-btn" class="btn btn-info">Next</button>
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
<script type="text/javascript">
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