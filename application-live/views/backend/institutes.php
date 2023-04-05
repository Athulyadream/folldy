<link href="<?=base_url()?>assets/css/select2.min.css" rel="stylesheet" />
<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
          <?php //echo $this->session->flashdata('ins_created');
            if($this->session->flashdata('ins_created') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Institute Added
          </div>
          <?php
            }
            elseif($this->session->flashdata('ins_created') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error adding Institute! Please contact tech support.
          </div>
          <?php
            }

            if($this->session->flashdata('ins_updated') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Institute Updated
          </div>
          <?php
            }
            elseif($this->session->flashdata('ins_updated') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error updating Institute! Please contact tech support.
          </div>
          <?php } ?>
      <div id="roles-table" class="col-12">

        <form action="<?=base_url('institute-filter')?>" method="post" class="card filter" <?php if(!empty($this->session->userdata('institute_filter'))) {?> style="display: block"<?php } else{?>  style="display: none;" <?php } ?>>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" name="filter_name" id="filter_name" placeholder="eg: admin" value="<?= $filter_data['name']?>">
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Email</label>
                  <input type="text" class="form-control" name="filter_email" id="filter_email" placeholder="eg: admin@example.com" value="<?= $filter_data['email']?>">
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Phone</label>
                  <input type="text" class="form-control" name="filter_phone" id="filter_phone" placeholder="" value="<?= $filter_data['phone']?>">
                </div>
              </div>
              <div class="col-md-2 col-lg-2">
                <div class="form-group">
                  <label class="form-label">Status</label>
                  <select class="form-control" name="filter_status" id="filter_status">
                    <option selected="selected" value="">All</option>
                    <option value="1" <?php if($filter_data['status']==1)echo 'selected';else echo ''; ?> >Active</option>
                    <option value="2" <?php if($filter_data['status']==2)echo 'selected';else echo ''; ?>>Suspended</option>
                  </select>
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
            <h3 class="card-title">Institutes</h3>
            <div class="ml-auto">
              <a href="#" id="filter-btn" class="btn ml-auto" data-toggle="tooltip" title="Filter"><i class="fa fa-filter"></i></a> 
              <?php
                if($this->session->userdata('create')){
              ?>
                <a href="#" id="add-ins-btn" class="btn btn-primary ml-auto">Add Institute</a>
              <?php
                }
              ?>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap">
              <thead>
                <tr>
                  <th class="w-1">#</th>
                  <th>Name</th>
                  <th>Abbreviation</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Courses</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i=$offset+1;
                  foreach($institutes as $data){
                ?>
                <tr>
                  <td><span class="text-muted"><?=$i?></span></td>
                  <td><?=$data['institute_name']?></td>
                  <td><?=$data['name_abbreviation']?></td>
                  <td>
                    <?=$data['institute_email']?>
                  </td>
                  <td>
                    <?=$data['institute_phone']?>
                  </td>
                  <td>
                    <?php foreach($data['course'] as $row){
                      echo $row['data_name'];
                      echo "<br>";
                    } ?>
                  </td>
                  <td>
                    <?php
                      if($data['institute_status'] == 1){
                      ?>
                        <span class="status-icon bg-success"></span> Active
                      <?php
                      }
                      else{
                      ?>
                        <span class="status-icon bg-warning"></span> Suspended
                      <?php
                      }
                    ?>
                  </td>
                  <td class="text-right">
                    <?php
                      if($this->session->userdata('create')){
                    ?>
                      <a href="javascript:void(0)" data-id="<?=$data['institute_id']?>" class="btn btn-secondary btn-sm edit-ins-btn">Edit</a>
                      <?php if($data['institute_status'] == 1){ ?>
                      <a href="<?=base_url('institute-users').'?id='.$data['institute_id']?>" id="" class="btn btn-secondary btn-sm ml-auto">User List</a>
                    <?php }?>
                      <!-- <a href="javascript:void(0)" data-id="<?=$data['institute_id']?>" class="btn btn-secondary btn-sm delete-admin-btn">Delete</a> -->
                    <?php
                    }
                    ?>
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
      <div id="add-ins-form" class="col-12" style="display: none;">
        <form action="<?=base_url('add-institute')?>" method="post" class="card" onsubmit="return checkmobile(this)" id="add-form">
          <div class="card-header">
            <h3 class="card-title">Add Institutes</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Institute Name</label>
                  <input type="text" class="form-control" name="institute_name" id="institute_name" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Institute Name Abbreviations</label>
                  <input type="text" class="form-control" name="abbreviations" id="abbreviations" placeholder="Enter Name">
                </div>
                
                <div class="form-group">
                  <label class="form-label">Institute Mobile</label>
                  <input type="text" class="form-control mobile numberonly" name="institute_phone" id="institute_phone" placeholder="Enter Mobile Number" required onchange="check_institute_mobile(this)">
                  <input type="hidden" class="error" id="mobile-error" value="0">
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Institute Email</label>
                  <input type="email" class="form-control email" name="institute_email" id="institute_email" placeholder="Enter Email" required onchange="check_institute_email(this)">
                  <input type="hidden" class="error" id="email-error" value="0">
                </div>
                <div class="form-group">
                  <label class="form-label">Course</label>
                  <select class="form-control course js-example-basic-multiple2" name="course[]" id="course" required>
                    <option value=""></option>
                    <?php
                      foreach($course as $data){
                        echo '<option value="'.$data['data_id'].'" style="text-transform:capitalize">'.$data['data_name'].'</option>';
                      }
                    ?>
                  </select>
                </div>
              </div>

            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <input type="hidden" name="stats" id="stats" value="0">
              <a href="<?=base_url('institutes')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto add-btn">Add</button>
            </div>
          </div>
        </form>
      </div>

      <!-- edit Form -->
      <div id="edit-ins-form" class="col-12" style="display: none;">
        <form action="<?=base_url('edit-institute')?>" method="post" class="card" onsubmit="return checkmobile(this)">
          <div class="card-header">
            <h3 class="card-title">Edit Institute</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Institute Name</label>
                  <input type="text" class="form-control " name="edit_ins_name" id="edit_ins_name" placeholder="Enter Name" required>
                  <input type="hidden" name="ins_id" id="ins_id">
                </div>
                <div class="form-group">
                  <label class="form-label">Institute Name Abbreviations</label>
                  <input type="text" class="form-control" name="edit_abbreviations" id="edit_abbreviations" placeholder="Enter Name" >
                </div>
                <div class="form-group">
                  <label class="form-label">Institute Email</label>
                  <input type="email" class="form-control email" name="edit_ins_email" id="edit_ins_email" placeholder="Enter Email" required onchange="check_institute_email(this)">
                   <input type="hidden" class="error" id="edit-mobile-error" value="0">
                </div>
                <div class="form-group">
                  <label class="form-label">Institute Status</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top: 10px;">
                    <input type="checkbox" class="custom-control-input" name="edit_ins_status" id="edit_ins_status">
                    <span class="custom-control-label">Active</span>
                  </label>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <!-- <div class="form-group">
                  <label class="form-label">Admin Username</label>
                  <input type="text" class="form-control" name="edit_admin_username" id="edit_admin_username" placeholder="Enter Username" required>
                </div> -->
                <!-- <div class="form-group">
                  <label class="form-label">Admin Password</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="edit_admin_password" id="edit_admin_password" placeholder="Enter Password" required>
                    <span class="input-group-append">
                      <button class="btn btn-primary" type="button" onclick="randomPassword(this)">Generate</button>
                    </span>
                  </div>
                </div> -->
                <div class="form-group">
                  <label class="form-label">Institute Mobile</label>
                  <input type="text" class="form-control mobile numberonly" name="edit_ins_phone" id="edit_ins_phone" placeholder="Enter Mobile Number"  required onchange="check_institute_mobile(this)">
                  <input type="hidden" class="error" id="edit-email-error" value="0">
                </div>
                <div class="form-group">
                  <label class="form-label">Course</label>
                  <select class="form-control course js-example-basic-multiple-selected" name="edit_course[]" id="edit_course" required >
                    <option selected="" value=""></option>
                    <?php
                      foreach($course as $data){
                        echo '<option value="'.$data['data_id'].'" style="text-transform:capitalize" id="course_'.$data['data_id'].'" >'.$data['data_name'].'</option>';
                      }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('institutes')?>" class="btn btn-link">Cancel</a>
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
  function check_institute_mobile(event){
    var mobile = $.trim($(event).val());
    var id = $('#ins_id').val();
    
        $.ajax({
            type:"post",
            url:base_url+"get-ins-phone",
            data:{value:mobile,id : id},
            success:function(data){
              console.log(data);
                if(data == 1){
                    $(event).addClass('is-invalid');

                    $(event).parent().find('.error').val(1);
                    $('form').find('button[type="submit"]').attr('disabled',true);
                    $(event).focus();
                    alert('Phone number already exist ');
                    $(event).find('.mobile').after('<div class="invalid-feedback">Invalid phone number</div>');
                }
                else{
                  $(event).removeClass('is-invalid');
                  $(event).parent().find('.error').val(0);
                  $('form').find('button[type="submit"]').attr('disabled',false);
                }
            }
        });
    
  }
</script>
<script type="text/javascript">
  function check_institute_email(event){
    var email = $.trim($(event).val());
    var id = $('#ins_id').val();
        $.ajax({
            type:"post",
            url:base_url+"get-ins-email",
            data:{value:email,id : id},
            success:function(data){
                if(data == 1){
                    $(event).addClass('is-invalid');

                    $(event).parent().find('.error').val(1);
                    $('form').find('button[type="submit"]').attr('disabled',true);
                    $(event).focus();
                    alert('Email id already exist ');
                    $(event).find('.email').after('<div class="invalid-feedback">Invalid Email %</div>');
                }
                else{
                  $(event).removeClass('is-invalid');
                  $(event).parent().find('.error').val(0);
                  $('form').find('button[type="submit"]').attr('disabled',false);
                }
            }
        });
    
  }
</script>

<script type="text/javascript">
  $(document).on('click','#add-ins-btn',function(event){
    event.preventDefault();
  //alert('hi');
    $('#roles-table').hide();
    $('#add-ins-form').show();
})
</script>

<script type="text/javascript">
   function reset_filter(event)
   {
      var id = "institute_filter";

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
                  window.location.href = base_url+'institutes';
              }
              
          }

      });
   }    

</script>