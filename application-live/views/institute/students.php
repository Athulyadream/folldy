

<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
          <?php 
            if($this->session->flashdata('admin_created') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Student Added
          </div>
          <?php
            }
            elseif($this->session->flashdata('admin_created') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error adding student! Please contact tech support.
          </div>
          <?php
            }

            if($this->session->flashdata('admin_updated') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            student Updated
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

        <form action="<?=base_url('student-filter')?>" method="post" class="card filter" <?php if(!empty($this->session->userdata('student_filter'))) {?> style="display: block"<?php } else{?>  style="display: none;" <?php } ?>>
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
                  <input type="text" class="form-control" name="filter_phone" id="filter_phone" placeholder="eg: 9999999999" value="<?= $filter_data['phone']?>">
                </div>
              </div>
              <div class="col-md-2 col-lg-2">
                <div class="form-group">
                  <label class="form-label">Course</label>
                  <select class="form-control" name="filter_course" id="filter_course">
                    <option selected="selected" value="">All</option>
                    <?php
                      foreach($course as $data){
                        if($filter_data['course'] == $data['data_id']){
                          echo '<option value="'.$data['data_id'].'" style="text-transform:capitalize" selected>'.$data['data_name'].'</option>';
                        }
                        else{
                          echo '<option value="'.$data['data_id'].'" style="text-transform:capitalize">'.$data['data_name'].'</option>';
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
            <h3 class="card-title">Students</h3>
            <div class="ml-auto">
               <a href="#" id="filter-btn" class="btn ml-auto" data-toggle="tooltip" title="Filter"><i class="fa fa-filter"></i></a> 
              <?php
                if($this->session->userdata('create')){
              ?>
                <a href="#" id="add-role-btn" class="btn btn-primary ml-auto">Add Student</a>
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
                  <th>Email/ Phone</th>
                  <th>DOB</th>
                  <th>Gender</th>
                  <th>Course</th>
                  <th>Batch</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i=$offset+1;
                  foreach($students as $data){
                ?>
                <tr>
                  <td><span class="text-muted"><?=$i?></span></td>
                  <td><?=$data['name']?></td>
                  <td>
                    <?=$data['email_id'].' / '.$data['phone']?>
                  </td>
                  <td><?php 
                  if($data['dob'] != '0000-00-00' ){
                  echo date('d-m-Y',strtotime($data['dob']) );
                  }
                  else{
                    echo "";
                  } ?></td>
                  <td>
                    <?php
                      if($data['gender'] == 1){
                      
                        echo "Male";
                    
                      }
                      elseif($data['gender'] == 2){
                         echo "Female";
                      }
                      else{
                      ?>
                        Other
                      <?php
                      }
                    ?>
                  </td>
                  <td>
                    <?=$data['data_name']?>
                  </td>
                  <td>
                    <?=$data['batch_name']?>
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
                      <a href="javascript:void(0)" data-id="<?=$data['id']?>" class="btn btn-secondary btn-sm edit-student-btn">Edit</a>
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
        <form action="<?=base_url('add-student')?>" method="post" class="card" onsubmit="return checkmobile(this)" id="add-form">
          <div class="card-header">
            <h3 class="card-title">Add Student</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Student Name</label>
                  <input type="text" class="form-control name" name="name" id="name" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control email" name="email" id="email" placeholder="Enter Email" required onchange="check_email(this)">
                  <input type="hidden" class="error" id="email-error" value="0">
                </div>
                <div class="form-group">
                  <label class="form-label">Mobile</label>
                  <input type="text" class="form-control mobile numberonly" name="phone" id="phone" placeholder="Enter Mobile Number" required onchange="check_mobile(this)">
                  <input type="hidden" class="error" id="mobile-error" value="0">
                </div>
                <div class="form-group">
                  <label class="form-label">Gender</label>
                
                    <input type="radio" name="gender" value="1"  required>&nbsp; Male &nbsp;
                      <input type="radio" name="gender" value="2" >&nbsp; Female &nbsp;
                      <input type="radio" name="gender" value="3" >&nbsp; Others
                  
                </div>
                <div class="form-group">
                  <label class="form-label">Address</label>
                  <textarea cols="3" rows="2" class="form-control"  name="adderss" id="address" required></textarea>
                  
                </div>
                
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Date of birth</label>
                  <input type="text" name="dob" id="dob" class="form-control previous" value="" placeholder="DD/MM/YYYY" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Password</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="password" id="password" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    <span class="input-group-append">
                      <button class="btn btn-primary" type="button" onclick="randomPassword(this)">Generate</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-label">Course</label>
                  <select class="form-control" name="course" id="course" required onchange="return checkcourse(this);">
                    <option selected="selected" value="" >Select</option>
                    <?php
                      foreach($course as $data){
                        echo '<option value="'.$data['data_id'].'" style="text-transform:capitalize">'.$data['data_name'].'</option>';
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-label">Batch</label>
                  <select  name="batch" id="batch" class="form-control batch" required> 
                    <option value="">SELECT</option>
   
                 </select>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <input type="hidden" name="stats" id="stats" value="0">
              <a href="<?=base_url('students')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto add-btn">Add</button>
            </div>
          </div>
        </form>
      </div>

      <!-- edit Form -->
      <div id="edit-student-form" class="col-12" style="display: none;">
        <form action="<?=base_url('edit-student')?>" method="post" class="card" onsubmit="return checkmobile(this)">
          <div class="card-header">
            <h3 class="card-title">Edit Student</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control name" name="edit_name" id="edit_name" placeholder="Enter Name" required>
                  <input type="hidden" name="edit_id" id="edit_id">
                </div>
                <div class="form-group">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control email" name="edit_email" id="edit_email" placeholder="Enter Email" required onchange="check_email(this)">
                </div>
                <div class="form-group">
                  <label class="form-label">Mobile</label>
                  <input type="text" class="form-control mobile numberonly" name="edit_phone" id="edit_phone" placeholder="Enter Mobile Number" required onchange="check_mobile(this)">
                </div>
                <div class="form-group">
                  <label class="form-label">Gender</label>
                
                    <input type="radio" id="male" name="edit_gender" value="1"  required>&nbsp; Male &nbsp;
                      <input type="radio" id="female" name="edit_gender" value="2" >&nbsp; Female &nbsp;
                      <input type="radio" id="other" name="edit_gender" value="3" >&nbsp; Others
                  
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
                  <label class="form-label">Date of birth</label>
                  <input type="text" name="edit_dob" id="edit_dob" class="form-control previous" value="" placeholder="DD/MM/YYYY" autocomplete="off" required="">
                </div>
               
                <div class="form-group">
                  <label class="form-label">Course</label>
                  <select class="form-control" name="edit_course" id="edit_course" required onchange="return checkcourse_edit(this.value);">
                    <option selected="selected" value="" >Select</option>
                    <?php
                      foreach($course as $data){
                        echo '<option value="'.$data['data_id'].'" style="text-transform:capitalize">'.$data['data_name'].'</option>';
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-label">Batch</label>
                  <select  name="edit_batch" id="edit_batch" class="form-control batch "required> 
                    <option value="">SELECT</option>
   
                 </select>
                </div>
                <div class="form-group">
                  <label class="form-label">Address</label>
                  <textarea cols="3" rows="2" class="form-control"  name="edit_adderss" id="edit_address" required></textarea>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('students')?>" class="btn btn-link">Cancel</a>
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
   function checkcourse(event)
   {
      var id = $.trim($(event).val());
      $.ajax({
         type:'post',
         url:base_url+"get-batch-course",
         data:{value:id},
         success: function(result){
            // console.log(result);
            var data = jQuery.parseJSON(result);
            var sbatch = data['batch'];    
            categoryS="<option value>--SELECT--</option>";
            if(sbatch.length >0)
            { 
               for(i=0;i<sbatch.length;i++)
               {                
                  categoryS +='<option value="'+ sbatch[i].batch_id +'">'+sbatch[i].batch_name+'</option>';                
               }
                                
            } 
            $(event).removeClass('is-invalid');
            $(event).parent().find('.error').val(0);
            $('form').find('button[type="submit"]').attr('disabled',false);
            $(".batch").html(categoryS);  

         }.bind(this)

      });
   }    

</script>
<script type="text/javascript">
  function check_mobile(event){
    var mobile = $.trim($(event).val());
    var id = $('#edit_id').val();
    
        $.ajax({
            type:"post",
            url:base_url+"get-student-phone",
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
            url:base_url+"get-student-email",
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
   function reset_filter(event)
   {
      var id = "student_filter";

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
                  window.location.href = base_url+'students';
              }
              
          }

      });
   }    


</script>
