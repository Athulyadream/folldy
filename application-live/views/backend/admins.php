<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
          <?php 
            if($this->session->flashdata('admin_created') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Admin Added
          </div>
          <?php
            }
            elseif($this->session->flashdata('admin_created') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error adding admin! Please contact tech support.
          </div>
          <?php
            }

            if($this->session->flashdata('admin_updated') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Admin Updated
          </div>
          <?php
            }
            elseif($this->session->flashdata('admin_updated') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error updating admin! Please contact tech support.
          </div>
          <?php } ?>
      <div id="roles-table" class="col-12">
        <!-- new -->
        <form action="<?=base_url('admin-filter')?>" method="post" class="card filter" <?php if(!empty($this->session->userdata('admin_filter'))) {?> style="display: block"<?php } else{?>  style="display: none;" <?php } ?> >
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
              <div class="col-md-2 col-lg-2">
                <div class="form-group">
                  <label class="form-label">Role</label>
                  <select class="form-control" name="filter_role" id="filter_role">
                    <option selected="selected" value="">All</option>
                    <?php
                      foreach($roles as $data){
                        if($data['role_id'] == $filter_data['role']){
                          echo '<option value="'.$data['role_id'].'" style="text-transform:capitalize" selected>'.$data['role_name'].'</option>';
                        }
                        else{
                          echo '<option value="'.$data['role_id'].'" style="text-transform:capitalize">'.$data['role_name'].'</option>';
                        }
                      }
                    ?>
                  </select>
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
            <h3 class="card-title">Admins</h3>
            <div class="ml-auto">
              <a href="#" id="filter-btn" class="btn ml-auto" data-toggle="tooltip" title="Filter"><i class="fa fa-filter"></i></a>
              <?php
                if($this->session->userdata('create')){
              ?>
                <a href="#" id="add-role-btn" class="btn btn-primary ml-auto">Add Admin</a>
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
                  <th>Role</th>
                  <th>Username</th>
                  <th>Email/ Phone</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i=$offset+1;
                  foreach($admins as $data){
                ?>
                <tr>
                  <td><span class="text-muted"><?=$i?></span></td>
                  <td><?=$data['admin_name']?></td>
                  <td>
                    <?=$data['role_name']?>
                  </td>
                  <td>
                    <?=$data['admin_username']?>
                  </td>
                  <td>
                    <?=$data['admin_email'].' / '.$data['admin_phone']?>
                  </td>
                  <td>
                    <?php
                      if($data['admin_status'] == 1){
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
                      <a href="javascript:void(0)" data-id="<?=$data['admin_id']?>" class="btn btn-secondary btn-sm edit-admin-btn">Edit</a>
                      <a href="javascript:void(0)" data-id="<?=$data['admin_id']?>" class="btn btn-secondary btn-sm delete-admin-btn">Delete</a>
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
      <div id="add-role-form" class="col-12" style="display: none;">
        <form action="<?=base_url('add-admin')?>" method="post" class="card" onsubmit="return checkmobile(this)">
          <div class="card-header">
            <h3 class="card-title">Add Admin</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <!-- new -->
                  <label class="form-label">Admin Name</label>
                  <input type="text" class="form-control" name="admin_name" id="admin_name" placeholder="Enter Name" pattern="[a-zA-Z][a-zA-Z ]{1,}" required>
                </div>
                <!-- new -->
                <div class="form-group">
                  <label class="form-label">Admin Email</label>
                  <input type="email" class="form-control email" name="admin_email" id="admin_email" placeholder="Enter Email" required onchange="checkCreds(this)">
                  <input type="hidden" class="error" id="email-error" value="0">
                </div>
                <div class="form-group">
                  <label class="form-label">Admin Mobile</label>
                  <input type="text" class="form-control mobile numberonly" name="admin_phone" id="admin_phone" placeholder="Enter Mobile Number" required onchange="checkCreds(this)">
                  <input type="hidden" class="error" id="mobile-error" value="0">
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Admin Username</label>
                  <input type="text" class="form-control username" name="admin_username" id="admin_username" placeholder="Enter Username" required onchange="check_username(this)">
                  <input type="hidden" class="error" id="username-error" value="0">
                </div>
                <div class="form-group">
                  <label class="form-label">Admin Password</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="admin_password" id="admin_password" placeholder="Enter Password" required>
                    <span class="input-group-append">
                      <button class="btn btn-primary" type="button" onclick="randomPassword(this)">Generate</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-label">Role</label>
                  <select class="form-control" name="admin_role" id="admin_role" required>
                    <option selected="selected" disabled selected>Select</option>
                    <?php
                      foreach($roles as $data){
                        echo '<option value="'.$data['role_id'].'" style="text-transform:capitalize">'.$data['role_name'].'</option>';
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
              <a href="<?=base_url('admins')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto">Add</button>
            </div>
          </div>
        </form>
      </div>

      <!-- edit Form -->
      <div id="edit-admin-form" class="col-12" style="display: none;">
        <form action="<?=base_url('edit-admin')?>" method="post" class="card" onsubmit="return checkmobile(this)">
          <div class="card-header">
            <h3 class="card-title">Edit Admin</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Admin Name</label>
                  <input type="text" class="form-control" name="edit_admin_name" id="edit_admin_name" placeholder="Enter Name" pattern="[a-zA-Z][a-zA-Z ]{1,}" required>
                  <input type="hidden" name="admin_id" id="admin_id">
                </div>
                <div class="form-group">
                  <label class="form-label">Admin Email</label>
                  <input type="email" class="form-control email" name="edit_admin_email" id="edit_admin_email" placeholder="Enter Email" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Admin Status</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top: 10px;">
                    <input type="checkbox" class="custom-control-input" name="edit_admin_status" id="edit_admin_status">
                    <span class="custom-control-label">Active</span>
                  </label>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Admin Username</label>
                  <input type="text" class="form-control username" name="edit_admin_username" id="edit_admin_username" placeholder="Enter Username" onchange="check_username(this)" required>
                </div>
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
                  <label class="form-label">Admin Mobile</label>
                  <input type="text" class="form-control mobile numberonly" name="edit_admin_phone" id="edit_admin_phone" placeholder="Enter Mobile Number" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Role</label>
                  <select class="form-control" name="edit_admin_role" id="edit_admin_role" required>
                    <option selected="selected" disabled selected>Select</option>
                    <?php
                      foreach($roles as $data){
                        echo '<option value="'.$data['role_id'].'" style="text-transform:capitalize">'.$data['role_name'].'</option>';
                      }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('admins')?>" class="btn btn-link">Cancel</a>
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
      var id = "admin_filter";

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
                  window.location.href = base_url+'admins';
              }
              
          }

      });
   }    

</script>

<script type="text/javascript">
  function check_username(event){
    var username = $.trim($(event).val());
    //alert(username);
    var id = $('#admin_id').val();
        $.ajax({
            type:"post",
            url:base_url+"get-admin-username",
            data:{value:username,id : id},
            success:function(data){
              //console.log(data);
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