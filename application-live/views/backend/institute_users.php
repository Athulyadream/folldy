<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
          <?php 
            if($this->session->flashdata('admin_created') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Institute user Added
          </div>
          <?php
            }
            elseif($this->session->flashdata('admin_created') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error adding Institute user! Please contact tech support.
          </div>
          <?php
            }

            if($this->session->flashdata('admin_updated') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Institute user Updated
          </div>
          <?php
            }
            elseif($this->session->flashdata('admin_updated') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error updating Institute user! Please contact tech support.
          </div>
          <?php } ?>
      <div id="roles-table" class="col-12">

        <form action="<?=base_url('user-filter/'. $institute['institute_id'])?>" method="post" class="card filter" <?php if(!empty($this->session->userdata('institute_user_filter'))) {?> style="display: block"<?php } else{?>  style="display: none;" <?php } ?>>
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
        <div class="page-header" style="margin:0;">
            <h1 class="page-title">
                <a href="<?=base_url('institutes')?>"><i class="fa fa-chevron-left"> Back to Institutes</i></a>
            </h1>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Institute Users</h3>
            <div class="ml-auto">
             <a href="#" id="filter-btn" class="btn ml-auto" data-toggle="tooltip" title="Filter"><i class="fa fa-filter"></i></a> 
              <?php
                if($this->session->userdata('create')){
              ?>
                <a href="#" id="add-ins-user-btn" class="btn btn-primary ml-auto">Add Users</a>
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
                  <!-- <th>Role</th> -->
                  <th>Username</th>
                  <th>Email/ Phone</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i=$offset+1;
                  foreach($users as $data){
                ?>
                <tr>
                  <td><span class="text-muted"><?=$i?></span></td>
                  <td><?=$data['name']?></td>
                  <!-- <td>
                    <?=$data['name']?>
                  </td> -->
                  <td>
                    <?=$data['username']?>
                  </td>
                  <td>
                    <?=$data['email'].' / '.$data['phone']?>
                  </td>
                  <td>
                    <?php
                      if($data['status'] == 1){
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
                      <a href="javascript:void(0)" data-id="<?=$data['id']?>" class="btn btn-secondary btn-sm edit-ins-user-btn">Edit</a>
                      <!-- <a href="javascript:void(0)" data-id="<?=$data['id']?>" class="btn btn-secondary btn-sm delete-admin-btn">Delete</a> -->
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
      <div id="add-ins-user-form" class="col-12" style="display: none;">
        <form action="<?=base_url('add-institute-user')?>" method="post" class="card" onsubmit="return checkmobile(this)" id="add-form">
          <div class="card-header">
            <h3 class="card-title">Add Institute User</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Institute Name</label>
                  <input type="text" class="form-control name" name="institute_name" id="institute_name" placeholder="Enter Name" readonly="" value="<?= $institute['institute_name']?>">
                  <input type="hidden" name="institute_id" id="institute_id" value="<?= $institute['institute_id']?>">
                </div>
                <div class="form-group">
                  <label class="form-label"> Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control email" name="email" id="email" placeholder="Enter Email" required onchange="check_institute_email(this)">
                  <input type="hidden" class="error" id="email-error" value="0">
                </div>
                
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label"> Mobile</label>
                  <input type="text" class="form-control mobile numberonly" name="phone" id="phone" placeholder="Enter Mobile Number" required onchange="check_institute_mobile(this)">
                  <input type="hidden" class="error" id="mobile-error" value="0">
                </div>
                <div class="form-group">
                  <label class="form-label">Username</label>
                  <input type="text" class="form-control username" name="username" id="username" placeholder="Enter Username" required onchange="check_username(this)" >
                  <input type="hidden" class="error" id="username-error" value="0">
                </div>
                <div class="form-group">
                  <label class="form-label">Password</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="password" id="password" placeholder="Enter Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                    <span class="input-group-append">
                      <button class="btn btn-primary" type="button" onclick="randomPassword(this)">Generate</button>
                    </span>
                    
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label class="form-label">Role</label>
                  <select class="form-control" name="admin_role" id="admin_role" required>
                    <option selected="selected" disabled selected>Select</option>
                    <?php
                      foreach($roles as $data){
                        echo '<option value="'.$data['role_id'].'" style="text-transform:capitalize">'.$data['role_name'].'</option>';
                      }
                    ?>
                  </select>
                </div> -->
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <input type="hidden" name="stats" id="stats" value="0">
              <a href="<?=base_url('institute-users')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto add-btn">Add</button>
            </div>
          </div>
        </form>
      </div>

      <!-- edit Form -->
      <div id="edit-ins-user-form" class="col-12" style="display: none;">
        <form action="<?=base_url('edit-institute-user')?>" method="post" class="card" onsubmit="return checkmobile(this)">
          <div class="card-header">
            <h3 class="card-title">Edit Institute User</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Institute Name</label>
                  <input type="text" class="form-control name" name="institute_name" id="institute_name" placeholder="Enter Name" readonly="" value="<?= $institute['institute_name']?>">
                  <input type="hidden" name="institute_id" value="<?= $institute['institute_id']?>">
                </div>
                <div class="form-group">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" name="edit_name" id="edit_name" placeholder="Enter Name" required>
                  <input type="hidden" name="ins_id" id="ins_id">
                </div>
                <div class="form-group">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control email" name="edit_email" id="edit_email" placeholder="Enter Email" required onchange="check_institute_email(this)">
                </div>
                <div class="form-group">
                  <label class="form-label">Status</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top: 10px;">
                    <input type="checkbox" class="custom-control-input" name="edit_status" id="edit_status">
                    <span class="custom-control-label">Active</span>
                  </label>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Username</label>
                  <input type="text" class="form-control username" name="edit_username" id="edit_username" placeholder="Enter Username" required onchange="check_username(this)">
                </div>
                
                <div class="form-group">
                  <label class="form-label">Mobile</label>
                  <input type="text" class="form-control mobile numberonly" name="edit_phone" id="edit_phone" placeholder="Enter Mobile Number" required onchange="check_institute_mobile(this)">
                </div>
               
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('institute-users')?>" class="btn btn-link">Cancel</a>
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
    //alert(mobile);
    var id = $('#ins_id').val();
    //alert(id);
        $.ajax({
            type:"post",
            url:base_url+"get-ins-user-phone",
            data:{value:mobile,id : id},
            success:function(data){
                if(data == 1){
                    $(event).addClass('is-invalid');

                    $(event).parent().find('.error').val(1);
                    $('form').find('button[type="submit"]').attr('disabled',true);
                    $(event).focus();
                    alert('Invalid phone number');
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
            url:base_url+"get-ins-user-email",
            data:{value:email,id : id},
            success:function(data){
                if(data == 1){
                    $(event).addClass('is-invalid');

                    $(event).parent().find('.error').val(1);
                    $('form').find('button[type="submit"]').attr('disabled',true);
                    $(event).focus();
                    alert('Invalid email id');
                    $(event).find('.email').after('<div class="invalid-feedback">Invalid phone number</div>');
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
  function check_username(event){
    var username = $.trim($(event).val());
    var id = $('#ins_id').val();
        $.ajax({
            type:"post",
            url:base_url+"get-ins-user-username",
            data:{value:username,id : id},
            success:function(data){
                if(data == 1){
                    $(event).addClass('is-invalid');

                    $(event).parent().find('.error').val(1);
                    $('form').find('button[type="submit"]').attr('disabled',true);
                    $(event).focus();
                    alert('Username already exist');
                    $(event).find('.username').after('<div class="invalid-feedback">Username already exist</div>');
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
   function reset_filter(event)
   {
      var id = "institute_user_filter";
      var institute_id = $('#institute_id').val();
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
                  window.location.href = base_url+'institute_users/'+institute_id;
              }
              
          }

      });
   }    

</script>
