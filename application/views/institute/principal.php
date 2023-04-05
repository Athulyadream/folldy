<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
          <?php 
            if($this->session->flashdata('admin_created') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Principal Added
          </div>
          <?php
            }
            elseif($this->session->flashdata('admin_created') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error adding Principal! Please contact tech support.
          </div>
          <?php
            }

            if($this->session->flashdata('admin_updated') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Principal Updated
          </div>
          <?php
            }
            elseif($this->session->flashdata('admin_updated') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error updating principal! Please contact tech support.
          </div>
          <?php } ?>
      <div id="roles-table" class="col-12">

        <form action="<?=base_url('principal-filter')?>" method="post" class="card filter" <?php if(!empty($this->session->userdata('principal_filter'))) {?> style="display: block"<?php } else{?>  style="display: none;" <?php } ?>>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" name="filter_name" id="filter_name" value="<?= $filter_data['name']?>" placeholder="eg: admin">
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
                  <input type="text" class="form-control" name="filter_phone" id="filter_phone" placeholder="eg: 9999999999" value="<?= $filter_data['phone']?>">
                </div>
              </div>
<!-- 
               <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Desgnation</label>
                  <input type="text" class="form-control" name="filter_designation" id="filter_designation" placeholder="eg: teacher" value="<?= $filter_data['principal_designation']?>">
                </div>
              </div> -->
              <!-- <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Username</label>
                  <input type="text" class="form-control" name="filter_username" id="filter_username" placeholder="eg: principal123" value="<?= $filter_data['username']?>">
                </div>
              </div> -->
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
            <h3 class="card-title">Principal</h3>
            <div class="ml-auto">
              <a href="#" id="filter-btn" class="btn ml-auto" data-toggle="tooltip" title="Filter"><i class="fa fa-filter"></i></a> 
              <?php
                if($this->session->userdata('create')){
              ?>
                <a href="#" id="add-role-btn" class="btn btn-primary ml-auto">Add Principal</a>
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
                  <!-- <th>Username</th> -->
                  <th>Email/ Phone</th>
                  <!-- <th>Subject</th> -->
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i=$offset+1;
                  foreach($principal as $data){
                ?>
                <tr>
                  <td><span class="text-muted"><?=$i?></span></td>
                  <td><?=$data['principal_name']?></td>
                  <!-- <td>
                    <?=$data['principal_username']?>
                  </td> -->
                  <td>
                    <?=$data['principal_email'].' / '.$data['principal_phone']?>
                  </td>
                  
                  <td>
                    <?php
                      if($data['principal_status'] == 1){
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
                      <a href="javascript:void(0)" data-id="<?=$data['principal_id']?>" class="btn btn-secondary btn-sm edit-principal-btn">Edit</a>
                     <!--  <a href="javascript:void(0)" data-id="<?=$data['admin_id']?>" class="btn btn-secondary btn-sm delete-admin-btn">Delete</a> -->
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
        <form action="<?=base_url('add-principal')?>" method="post" class="card" onsubmit="return checkmobile_principal(this)" id="add-form">
          <div class="card-header">
            <h3 class="card-title">Add Principal</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Principal Name</label>
                  <input type="text" class="form-control name" name="principal_name" id="principal_name" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Principal Email</label>
                  <input type="email" class="form-control email" name="principal_email" id="principal_email" placeholder="Enter Email" required onchange="check_email(this)">
                  <input type="hidden" class="error" id="email-error" value="0">
                </div>
                
              </div>
              <div class="col-md-6 col-lg-6">
               <!--  <div class="form-group">
                  <label class="form-label">Principal Username</label>
                  <input type="text" class="form-control username" name="Principal_username" id="Principal_username" placeholder="Enter Username" required onchange="return check_username(this)">
                  <input type="hidden" class="error" id="username-error" value="0">
                </div> -->
                <div class="form-group">
                  <label class="form-label">Principal Password</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="principal_password" id="principal_password" placeholder="Enter Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                    <span class="input-group-append">
                      <button class="btn btn-primary" type="button" onclick="randomPassword(this)">Generate</button>
                    </span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="form-label">Principal Mobile</label>
                  <input type="text" class="form-control mobile numberonly" name="principal_phone" id="principal_phone" placeholder="Enter Mobile Number" required onchange="check_mobile(this)">
                  <input type="hidden" class="error" id="mobile-error" value="0">
                </div>

                <div class="form-group">
                  <label class="form-label">Principal Designation</label>
                  <input type="text" class="form-control designation" name="principal_designation" id="principal_designation" placeholder="Enter Designation" required>
                </div>
               
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <input type="hidden" name="stats" id="stats" value="0">
              <a href="<?=base_url('principal')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto add-btn">Add</button>
            </div>
          </div>
        </form>
      </div>

      <!-- edit Form -->
      <div id="edit-principal-form" class="col-12" style="display: none;">
        <form action="<?=base_url('edit-principal')?>" method="post" class="card" onsubmit="return checkmobile_principal(this)">
          <div class="card-header">
            <h3 class="card-title">Edit Principal</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Principal Name</label>
                  <input type="text" class="form-control name" name="edit_principal_name" id="edit_principal_name" placeholder="Enter Name" required>
                  <input type="hidden" name="edit_id" id="edit_id">
                </div>
                <div class="form-group">
                  <label class="form-label">Principal Email</label>
                  <input type="email" class="form-control email" name="edit_principal_email" id="edit_principal_email" placeholder="Enter Email" required onchange="check_email(this)">
                </div>
                
              </div>
              <div class="col-md-6 col-lg-6">
              <!--   <div class="form-group">
                  <label class="form-label">principal Username</label>
                  <input type="text" class="form-control username" name="edit_principal_username" id="edit_principal_username" placeholder="Enter Username" required onchange="return check_username(this)">
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
                  <label class="form-label">Principal Mobile</label>
                  <input type="text" class="form-control mobile numberonly" name="edit_principal_phone" id="edit_principal_phone" placeholder="Enter Mobile Number" required onchange="check_mobile(this)">
                </div>

                 <div class="form-group">
                  <label class="form-label">Principal Designation</label>
                  <input type="text" class="form-control designation" name="edit_principal_designation" id="edit_principal_designation" placeholder="Enter Designation" required>
                </div>
               

                <div class="form-group">
                  <label class="form-label">Admin Status</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top: 10px;">
                    <input type="checkbox" class="custom-control-input" name="edit_principal_status" id="edit_principal_status">
                    <span class="custom-control-label">Active</span>
                  </label>
                </div>
                
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('principal')?>" class="btn btn-link">Cancel</a>
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
  $(".js-example-basic-multiple2").select2({
    multiple: true,
  });
</script> -->

<script type="text/javascript">
  function check_mobile(event){
    var mobile = $.trim($(event).val());
    var id = $('#edit_id').val();
    
        $.ajax({
            type:"post",
            url:base_url+"get-principal-phone",
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
  function check_email(event){
    var email = $.trim($(event).val());
    var id = $('#edit_id').val();
        $.ajax({
            type:"post",
            url:base_url+"get-principal-email",
            data:{value:email,id : id},
            success:function(data){
                if(data == 1){
                    $(event).addClass('is-invalid');

                    $(event).parent().find('.error').val(1);
                    $('form').find('button[type="submit"]').attr('disabled',true);
                    $(event).focus();
                    alert('Invalid email id');
                    $(event).find('.email').after('<div class="invalid-feedback">Invalid email id</div>');
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
    var id = $('#edit_id').val();
        $.ajax({
            type:"post",
            url:base_url+"get-principal-username",
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
      var id = "principal_filter";

      $.ajax({
         type:'post',
         url:base_url+"reset-filter",
         data:{value:id},
         success: function(out){
              var out = JSON.parse(out);
              if(out.status == 404){
                  window.location.href = base_url;
              }
              else if(out.status == 1){
                  $('#filter-btn').show();
                  window.location.href = base_url+'principal';
              }
              
          }

      });
   }    

</script>