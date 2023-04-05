<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
          <?php 
            if($this->session->flashdata('paper_created') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Chapter Published
          </div>
          <?php
            }
            elseif($this->session->flashdata('paper_created') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error unable to publish chapter!
          </div>
          <?php
            }

            if($this->session->flashdata('paper_updated') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Paper Updated
          </div>
          <?php
            }
            elseif($this->session->flashdata('paper_updated') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error updating paper! Please contact tech support.
          </div>
          <?php } ?>
      <div id="roles-table" class="col-12">

        <form action="<?=base_url('admin/paper-filter')?>" method="post" class="card filter" style="display: none;">
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
                <a href="<?=base_url('teacher-papers')?>"><i class="fa fa-chevron-left"> Back to papers</i></a>
            </h1>
        </div>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Chapters</h3>
            <div class="ml-auto">
              <!-- <a href="#" id="filter-btn" class="btn ml-auto" data-toggle="tooltip" title="Filter"><i class="fa fa-filter"></i></a> -->
              
            </div>
          </div>
          <div class="table-responsive">
            <?php
                if(!empty($chapters)){
            ?>
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                          <th class="w-1">#</th>
                          <th>Name</th>
                          <th>Created On</th>
                          <th>Created By</th>
                          <th>Publish</th>
                          <!-- <th>Exercise</th> -->
                          <th>Chapter Design</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=$offset+1;
                            foreach($chapters as $data){
                            ?>
                              <tr>
                                <td><?=$i++?></td>
                                <td><?=$data['data_name']?></td>
                                <td><?=date('d-m-Y',$data['updated_on'])?></td>
                                <td><?=$data['admin_name']?></td>
                                <td><?php if($data['publish_status']==1){ 
                                  // echo "PUBLISHED";
                                  ?>

                                  <a href="<?php echo base_url('unpublish-chapter/'.$data['data_id']); ?>" data-id="<?=$data['data_id']?>" class="btn btn-primary btn-sm publish-chapter-btn" onclick="return confirm('Are you sure you want to unpublish chapter?')">Unpublish</a>

                             <?php }else{ ?>
                                  <a href="<?php echo base_url('publish-chapter/'.$data['data_id']); ?>" data-id="<?=$data['data_id']?>" class="btn btn-success btn-sm publish-chapter-btn" onclick="return confirm('Are you sure you want to publish chapter?')">Publish</a>
                                <?php } ?>
                                </td>
                                <td>
                                <a href="<?=base_url('chapter-design-teacher').'?id='.$data['data_id']?>" class="btn btn-info btn-sm"> Contents Publish & Edit</a>
   <a href="<?=base_url('add-chapter-design-teacher').'/'.$data['data_id']?>" class="btn btn-info btn-sm">Design Chapter</a> 
                                           <a href="<?=base_url('chapter-view-teacher').'/'.$data['data_id']?>" class="btn btn-info btn-sm">View Chapter</a>
                               
                         
                              

                                   </td>
                                <!-- <td><a href="<?=base_url('exercise').'?id='.$data['data_id']?>" class="btn btn-info btn-sm">View</a></td> -->
                                <!-- <td><a href="<?=base_url('chapter-design').'?id='.$data['data_id']?>" class="btn btn-info btn-sm">View</a></td> -->
                                
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
        <form action="<?=base_url('add-chapter')?>" method="post" class="card">
          <div class="card-header">
            <h3 class="card-title">Add Chapter</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Chapter Name</label>
                  <input type="text" class="form-control" name="course_name" id="course_name" placeholder="Enter Name" required>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('chapters')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto">Add</button>
            </div>
          </div>
        </form>
      </div>

      <!-- edit Form -->
      <div id="edit-course-form" class="col-12" style="display: none;">
        <form action="<?=base_url('edit-chapter')?>" method="post" class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Chapter</h3>
            <input type="hidden" name="course_id" id="course_id" >
          </div>
          <div class="card-body">
          <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Chapter Name</label>
                  <input type="text" class="form-control" name="edit_course_name" id="edit_course_name" placeholder="Enter Name" required>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('papers')?>" class="btn btn-link">Cancel</a>
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

<!-- <script type="text/javascript">
  $(document).on('click','.publish-chapter-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.confirm({
        title: 'Confirm publish!',
        content: 'Cant be reversed!',
        buttons: {
            confirm: function () {
                $.ajax({
                    type:'post',
                    url:base_url+'delete-chapter',
                    data:{id:id},
                    success: function(out){
                        var out = JSON.parse(out);
                        if(out.status == 404){
                            window.location.href = base_url;
                        }
                        else if(out.status == 1){
                            window.location.reload();
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

</script> -->