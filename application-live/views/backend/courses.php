<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
          <?php 
            if($this->session->flashdata('course_created') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Course Added
          </div>
          <?php
            }
            elseif($this->session->flashdata('course_created') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error unable to add course!
          </div>
          <?php
            }

            if($this->session->flashdata('course_updated') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Course Updated
          </div>
          <?php
            }
            elseif($this->session->flashdata('course_updated') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error updating course! Please contact tech support.
          </div>
          <?php } ?>
      <div id="roles-table" class="col-12">

        <form action="<?=base_url('course-filter')?>" method="post" class="card filter" <?php if(!empty($this->session->userdata('course_filter'))) {?> style="display: block"<?php } else{?>  style="display: none;" <?php } ?>>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" name="filter_name" id="filter_name" placeholder="eg: Bcom" value="<?= $filter_data['name']?>">
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
            <h3 class="card-title">Courses</h3>
            <div class="ml-auto">
              <a href="#" id="filter-btn" class="btn ml-auto" data-toggle="tooltip" title="Filter"><i class="fa fa-filter"></i></a>
              <?php
                if($this->session->userdata('create')){
              ?>
                <a href="#" id="add-role-btn" class="btn btn-primary ml-auto">Add Course</a>
              <?php
                }
              ?>
            </div>
          </div>
          <div class="table-responsive">
            <?php
                if(!empty($courses)){
            ?>
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                          <th class="w-1">#</th>
                          <th>Name</th>
                          <th>Created On</th>
                          <th>Created By</th>
                          <th>Papers</th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=$offset+1;
                            foreach($courses as $data){
                            ?>
                              <tr>
                                <td><?=$i++?></td>
                                <td><?=$data['data_name']?></td>
                                <td><?=date('d-m-Y',$data['updated_on'])?></td>
                                <td><?=$data['admin_name']?></td>
                                <td><a href="<?=base_url('papers').'?id='.$data['data_id']?>" class="btn btn-info btn-sm">View</a></td>
                                <td class="text-right">
                                  <?php
                                    if($this->session->userdata('edit') || $this->session->userdata('admin_id')==$data['updated_by']){
                                  ?>
                                    <a href="javascript:void(0)" data-id="<?=$data['data_id']?>" class="btn btn-success btn-sm edit-course-btn">Edit</a>
                                    
                                  <?php
                                    }
                                    if($this->session->userdata('delete')){
                                  ?>
                                  <a href="javascript:void(0)" data-id="<?=$data['data_id']?>" class="btn btn-danger btn-sm delete-course-btn">Delete</a>
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
      </div>
      <div id="add-role-form" class="col-12" style="display: none;">
        <form action="<?=base_url('add-course')?>" method="post" class="card" id="add-form" >
          <div class="card-header">
            <h3 class="card-title">Add Course</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Course Name</label>
                  <input type="text" class="form-control" name="course_name" id="course_name" placeholder="Enter Name" required>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('tables')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto add-btn">Add</button>
            </div>
          </div>
        </form>
      </div>

      <!-- edit Form -->
      <div id="edit-course-form" class="col-12" style="display: none;">
        <form action="<?=base_url('edit-course')?>" method="post" class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Course</h3>
            <input type="hidden" name="course_id" id="course_id" >
          </div>
          <div class="card-body">
          <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Table Name</label>
                  <input type="text" class="form-control" name="edit_course_name" id="edit_course_name" placeholder="Enter Name" required>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('courses')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto">Edit</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /edit form -->
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
   function reset_filter(event)
   {
      var id = "course_filter";

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
                  window.location.href = base_url+'courses';
              }
              
          }

      });
   }    

</script>