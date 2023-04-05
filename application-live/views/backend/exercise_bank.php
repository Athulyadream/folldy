<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
          <?php 
            if($this->session->flashdata('course_created') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Exercise Added
          </div>
          <?php
            }
            elseif($this->session->flashdata('course_created') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error unable to add exercise!
          </div>
          <?php
            }

            if($this->session->flashdata('course_updated') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Exercise Updated
          </div>
          <?php
            }
            elseif($this->session->flashdata('course_updated') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error updating Exercise! Please contact tech support.
          </div>
          <?php } ?>
      <div id="roles-table" class="col-12">

        <form action="<?=base_url('admin/course-filter')?>" method="post" class="card filter" style="display: none;">
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
        <?php if($this->session->userdata('chapter_id')){ ?>
         <div class="page-header" style="margin:0;">
            <h1 class="page-title">
                <a href="<?=base_url('chapters')?>"><i class="fa fa-chevron-left"> Back to Chapter</i></a>
            </h1>
        </div>
      <?php } ?>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Exercise</h3>
            <div class="ml-auto">
              <!-- <a href="#" id="filter-btn" class="btn ml-auto" data-toggle="tooltip" title="Filter"><i class="fa fa-filter"></i></a> -->
              <?php
                if($this->session->userdata('create')){
              ?>
                <a href="#" id="add-role-btn" class="btn btn-primary ml-auto">Add Exercise</a>
              <?php
                }
              ?>
            </div>
          </div>
          <div class="table-responsive">
            <?php
                if(!empty($exercise)){
            ?>
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                          <th class="w-1">#</th>
                          <th>Title</th>
                          <th>Tags</th>
                          <th>Created On</th>
                          <th>Created By</th>
                          <th>Question</th>
                          <th></th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=$offset+1;
                            foreach($exercise as $data){
                            ?>
                              <tr>
                                <td><?=$i++?></td>
                                <td><?=$data['ex_topic_title']?></td>
                                <td><?=$data['tags']?></td>
                                <td><?=date('d-m-Y',$data['updated_on'])?></td>
                                <td><?=$data['admin_name']?></td>
                                <td><a href="<?=base_url('exercise').'?id='.$data['ex_topic_id']?>" class="btn btn-info btn-sm">View</a></td>
                                <td><a href="<?=base_url()?>exercise-view/<?=$data['ex_topic_id']?>" data-id="<?=$data['ex_topic_id']?>" target="_blank" class="btn btn-info btn-sm ">View exercise</a></td>
                                <td class="text-right">

                                  <?php
                                    if($this->session->userdata('edit') || $this->session->userdata('admin_id')==$data['updated_by']){
                                  ?>
                                    <a href="javascript:void(0)" data-id="<?=$data['ex_topic_id']?>" class="btn btn-success btn-sm edit-exercise-bank-btn">Edit</a>
                                    
                                  <?php
                                    }
                                    if($this->session->userdata('delete')){
                                  ?>
                                  <a href="javascript:void(0)" data-id="<?=$data['ex_topic_id']?>" class="btn btn-danger btn-sm delete-exercise-bank-btn">Delete</a>
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
        <form action="<?=base_url('add-exercise-bank')?>" method="post" class="card" id="add-form">
          <div class="card-header">
            <h3 class="card-title">Add Exercise</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Exercise Title</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    <label class="form-label">Tags</label>
                    <input type="text" class="form-control key-tags" id="file_tags" name="file_tags"  placeholder="Enter Keywords" required="">
                  </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('exercise-bank')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto add-btn">Add</button>
            </div>
          </div>
        </form>
      </div>

      <!-- edit Form -->
      <div id="edit-exercise-bank-form" class="col-12" style="display: none;">
        <form action="<?=base_url('edit-exercise-bank')?>" method="post" class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Exercise</h3>
            <input type="hidden" name="edit_id" id="edit_id" >
          </div>
          <div class="card-body">
          <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Exercise title</label>
                  <input type="text" class="form-control" name="edit_name" id="edit_name" placeholder="Enter Name" required>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    <label class="form-label">Tags</label>
                    <input type="text" class="form-control" id="edit_file_tags" name="edit_file_tags"  placeholder="Enter Keywords" required="">
                  </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('exercise-bank')?>" class="btn btn-link">Cancel</a>
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
  
</script>