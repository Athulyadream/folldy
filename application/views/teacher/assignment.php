<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
          <?php 
            if($this->session->flashdata('assignment_created') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            assignment Created
          </div>
          <?php
            }
            elseif($this->session->flashdata('assignment_created') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error creating assignment! Please contact tech support.
          </div>
          <?php
            }
            if($this->session->flashdata('assignment_updated') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            assignment Updated
          </div>
          <?php
            }
            elseif($this->session->flashdata('assignment_updated') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error updating assignment! Please contact tech support.
          </div>
          <?php
            }
          ?>
      <div id="assignment-table" class="col-12">

         <form action="<?=base_url('assignment-filter')?>" method="post" class="card filter" <?php if(!empty($this->session->userdata('assignment_filter'))) {?> style="display: block"<?php } else{?>  style="display: none;" <?php } ?> >
          <div class="card-body">
            <div class="row">
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" name="filter_name" id="filter_name" placeholder="eg: assignment" value="">
                </div>
              </div>
              
              <div class="col-md-2 col-lg-2">
                <div class="form-group" style="margin-top: 1.5rem;text-align: right;">
                  <button type="reset" class="btn btn-secondary" data-toggle="tooltip" title="Reset" onclick=" return reset_filter()"><i class="fa fa-refresh"></i></button>
                  <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Apply"><i class="fa fa-check"></i></button>
                </div>
              </div>
            </div>
          </div>
        </form>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">assignment</h3>
               <a href="#" id="filter-btn" class="btn ml-auto" data-toggle="tooltip" title="Filter"><i class="fa fa-filter"></i></a>
            <?php
              if($this->session->userdata('create')){
            ?>
              <a href="#" id="add-assignment-btn" class="btn btn-primary ml-auto">Add assignment</a>
            <?php
              }
            ?>
          </div>
          <div class="table-responsive">
            <table class="table card-table table-vcenter ">
              <thead>
                <tr>
                  <th class="w-1">#</th>
                  <th>Assignment Title</th>
                  <th width="500px">Submission Date</th>
              
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                // print_r($assignment);
                  $i=$offset+1;
                  foreach($assignment as $data){
                ?>
                <tr>
                  <td><span class="text-muted"><?=$i?></span></td>
                  <td><?=$data['assignment_title']?></td>
                  <td>
                    <?=date("d-m-Y", strtotime($data['submission_date']))?>
                  </td>
                  
                  <td class="text-right">
                    <a href="<?=base_url('assignment-view-students')?>/<?=$data['assignment_id']?>" data-id="<?=$data['assignment_id']?>" class="btn btn-success btn-sm ">View</a>
                    <?php
                      if($this->session->userdata('edit') ){
                    
                      if($data['assignment_status'] == 1){?>



                     <a href="<?=base_url('assignment-close')?>/<?=$data['assignment_id']?>" data-id="<?=$data['assignment_id']?>" class="btn btn-warning btn-sm ">Close</a>
                    
                    <?php }else if($data['assignment_status'] == 2){ echo "<span style='color:yellow;'>closed</span>"; } ?>

                     <?php
                      if($data['assignment_publish_status'] == 0){


                    ?>
                    <a href="<?=base_url('assignment-publish')?>/<?=$data['assignment_id']?>" data-id="<?=$data['assignment_id']?>" class="btn btn-success btn-sm ">Publish Marks</a>
                  <?php }else{ echo "<span style='color:green;'>Marks Published</span>"; } ?>

                      <a href="javascript:void(0)" data-id="<?=$data['assignment_id']?>" class="btn btn-info btn-sm edit-assignment-btn">Edit</a>



                    <?php
                    } if($this->session->userdata('create')){
                    ?>
                     
                      <!--   <a href="<?=base_url()?>assignment-slide-pre/<?=$data['assignment_id']?>" data-id="<?=$data['assignment_id']?>" class="btn btn-info btn-sm ">List Slide</a> -->
<!-- 
                        <a href="<?=base_url()?>assignment-slide/<?=$data['assignment_id']?>" data-id="<?=$data['assignment_id']?>" class="btn btn-info btn-sm ">Add/Edit Slide</a> -->
                      
                    <?php
                    }
                    ?>

                 
                     <?php
                      if($this->session->userdata('edit')){
                    ?>
                    <a href="javascript:void(0)" data-id="<?=$data['assignment_id']?>" class="btn btn-danger btn-sm delete-assignment-btn">Delete</a>
                  <?php } ?>
                  </td>
                </tr>
                <?php
                  $i++;
                  }
                ?>
              </tbody>
            </table>
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
      </div>
      <div id="add-assignment-form" class="col-12" style="display: none;">
        <form action="<?=base_url('add-assignment')?>" method="post" class="card" enctype="multipart/form-data">
          <div class="card-header">
            <h3 class="card-title">Add assignment</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-4">
                <div class="form-group">
                  <label class="form-label">assignment Title</label>
                  <!-- <input type="text" class="form-control" name="assignment_title" id="assignment_title" onchange="return checktitle();"  placeholder="assignment Title" required> -->

                   <textarea class="form-control" name="assignment_title" id="assignment_title" placeholder="Assignment Title" onchange="return checktitle();" required cols="5" rows="3"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-4">
               <!--  <div class="form-group">
                  <label class="form-label">assignment Tag</label>
                  <input type="text" class="form-control" name="assignment_tags" id="assignment_tags" placeholder="assignment Tag" required>
                </div> -->


                <div class="form-group">
                    <label class="form-label">Submission Date</label>
                    <input type="date" class="form-control" id="submission_date" name="submission_date"  placeholder="Enter Keywords" required="">
                  </div>
              </div>
            </div>



            <div class="row">
              <div class="col-md-6 col-lg-4">
               <!--  <div class="form-group">
                  <label class="form-label">assignment Tag</label>
                  <input type="text" class="form-control" name="assignment_tags" id="assignment_tags" placeholder="assignment Tag" required>
                </div> -->


                <div class="form-group">
                    <label class="form-label">Images</label>
                     <input type="file" multiple="" name="files[]">      
                  <!--   <input type="file"  id="images" name="images[]"  multiple="multiple"> -->
                  </div>
              </div>
            </div>
            
            
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('assignment')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto" >Add</button>
            </div>
          </div>
        </form>
      </div>

      <!-- edit assignment -->
      <div id="edit-assignment-form" class="col-12" style="display: none;">
        <form action="<?=base_url('edit-assignment')?>" method="post" class="card" enctype="multipart/form-data">
          <div class="card-header">
            <h3 class="card-title">Edit assignment</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-4">
                <div class="form-group">
                  <label class="form-label">Assignment Title</label>
                  <textarea class="form-control" name="edit_assignment_title" id="edit_assignment_title" placeholder="assignment Title" required cols="5" rows="3"></textarea>
                  <!-- <input type="text" > -->
                  <input type="hidden" name="assignment_id" id="assignment_id">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-4">
                <div class="form-group">
                  <label class="form-label">Submission Date</label>
                  <input type="date" class="form-control " id="edit_submission_date" name="edit_submission_date"  placeholder="Enter Date" required="">


               <!--    <input type="text" class="form-control" name="edit_assignment_tag" id="edit_assignment_tag" placeholder="assignment Tag" value="vjrjj,frfrf" required> -->
                </div>
              </div>
            </div>

            <div class="form-group">
                    <label class="form-label">Images</label>
                     <input type="file" multiple="" name="editfiles[]">      
                  <!--   <input type="file"  id="images" name="images[]"  multiple="multiple"> -->
                  </div>

                  <div class="form-group">
                  <label class="form-label">Assignment Status</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top: 10px;">
                    <input type="checkbox" class="custom-control-input" name="edit_assignment_status" id="edit_assignment_status">
                    <span class="custom-control-label">Closed</span>
                  </label>
                </div>
           <!--  <div class="row">
              <div class="col-md-6 col-lg-12">
                <div class="form-group">
                  <div class="form-label">Privileges</div>
                  <div class="custom-controls-stacked">
                    <?php
                      foreach($privileges as $data){
                      ?>
                      <label class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" name="edit_privileges[]" value="<?=$data?>">
                        <span class="custom-control-label" style="text-transform: capitalize;"><?=$data?></span>
                      </label>
                      <?php
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div> -->
             
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('assignment')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto">Edit</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /edit assignment -->

    </div>
  </div>
</div>
</div>
<script type="text/javascript">
  function checktitle(){
    var title =  $("#assignment_title").val();
     $.ajax({
                url:base_url+'check-assignment-title',
                type:'post',
                data:{title:title},
                success: function(out){
                    out = JSON.parse(out);
                    if(out.status == 1){
                      alert('Title already exist');
                     $("#assignment_title").val("");
                       
                    }
                    
                }
              })
  }
</script>
<script type="text/javascript">

</script>

<script type="text/javascript">
   function reset_filter(event)
   {
      var id = "assignment_filter";

      $.ajax({
         type:'post',
         url:base_url+"reset-filter-admin",
         data:{value:id},
         success: function(out){
              var out = JSON.parse(out);
              if(out.status == 404){
                  window.location.href = base_url;
              }
              else if(out.status == 1){
                  $('#filter-btn').show();
                  window.location.href = base_url+'assignment';
              }
          }

      });
   }    

</script>