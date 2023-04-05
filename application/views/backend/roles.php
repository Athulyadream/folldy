<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
          <?php 
            if($this->session->flashdata('role_created') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Role Created
          </div>
          <?php
            }
            elseif($this->session->flashdata('role_created') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error creating role! Please contact tech support.
          </div>
          <?php
            }
            if($this->session->flashdata('role_updated') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Role Updated
          </div>
          <?php
            }
            elseif($this->session->flashdata('role_updated') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error updating role! Please contact tech support.
          </div>
          <?php
            }
          ?>
      <div id="roles-table" class="col-12">
        <form action="<?=base_url('role-filter')?>" method="post" class="card filter" <?php if(!empty($this->session->userdata('role_filter'))) {?> style="display: block"<?php } else{?>  style="display: none;" <?php } ?> >
          <div class="card-body">
            <div class="row">
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Role Name</label>
                  <input type="text" class="form-control" name="filter_name" id="filter_name" placeholder="eg: Admin" value="<?= $filter_data['name']?>">
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
            <h3 class="card-title">Roles</h3>
            <div class="ml-auto">
              <a href="#" id="filter-btn" class="btn ml-auto" data-toggle="tooltip" title="Filter"><i class="fa fa-filter"></i></a>
            <?php
              if($this->session->userdata('create')){
            ?>
              <a href="#" id="add-role-btn" class="btn btn-primary ml-auto">Add Role</a>
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
                  <th>Role</th>
                  <th width="500px">Privileges</th>
                  <th>Rights</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i=1;
                  foreach($roles as $data){
                ?>
                <tr>
                  <td><span class="text-muted"><?=$i?></span></td>
                  <td><?=$data['role_name']?></td>
                  <td>
                    <?=$data['role_priv']?>
                  </td>
                  <td>
                    <?=$data['role_rights']?>
                  </td>
                  <td class="text-right">
                    <?php
                      if($this->session->userdata('edit')){
                    ?>
                      <a href="javascript:void(0)" data-id="<?=$data['role_id']?>" class="btn btn-info btn-sm edit-role-btn">Edit</a>
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
        <form action="<?=base_url('add-roles')?>" method="post" class="card" onsubmit="return validate_role(this)" >
          <div class="card-header">
            <h3 class="card-title">Add Role</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-4">
                <div class="form-group">
                  <!-- new -->
                  <label class="form-label">Role Name</label>
                  <input type="text" class="form-control" name="role_name" id="role_name" placeholder="Role Name" required pattern="[a-zA-Z][a-zA-Z ]{1,}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-12">
                <div class="form-group">
                  <div class="form-label ">Privileges</div>
                  <div class="custom-controls-stacked privileges-label">
                    <?php
                      foreach($privileges as $data){
                      ?>
                      <label class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input privileges" name="privileges[]" value="<?=$data?>">
                        <span class="custom-control-label" style="text-transform: capitalize;"><?=$data?></span>
                      </label>
                      <?php
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-12">
                <div class="form-group">
                  <div class="form-label ">Rights</div>
                  <div class="custom-controls-stacked rights-label">
                    <?php
                      foreach($rights as $data){
                      ?>
                      <label class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input rights" name="rights[]" value="<?=$data?>">
                        <span class="custom-control-label" style="text-transform: capitalize;"><?=$data?></span>
                      </label>
                      <?php
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('roles')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto add-btn">Add</button>
            </div>
          </div>
        </form>
      </div>

      <!-- edit role -->
      <div id="edit-role-form" class="col-12" style="display: none;">
        <form action="<?=base_url('edit-roles')?>" method="post" class="card" onsubmit="return validate_role(this)">
          <div class="card-header">
            <h3 class="card-title">Edit Role</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-4">
                <div class="form-group">
                  <label class="form-label">Role Name</label>
                  <input type="text" class="form-control" name="edit_role_name" id="edit_role_name" placeholder="Role Name" pattern="[a-zA-Z][a-zA-Z ]{1,}" required>
                  <input type="hidden" name="role_id" id="role_id">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-12">
                <div class="form-group">
                  <div class="form-label ">Privileges</div>
                  <div class="custom-controls-stacked privileges-label">
                    <?php
                      foreach($privileges as $data){
                      ?>
                      <label class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input privileges" name="edit_privileges[]" value="<?=$data?>">
                        <span class="custom-control-label" style="text-transform: capitalize;"><?=$data?></span>
                      </label>
                      <?php
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-12">
                <div class="form-group">
                  <div class="form-label ">Rights</div>
                  <div class="custom-controls-stacked rights-label">
                    <?php
                      foreach($rights as $data){
                      ?>
                      <label class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input rights" name="edit_rights[]" value="<?=$data?>">
                        <span class="custom-control-label" style="text-transform: capitalize;"><?=$data?></span>
                      </label>
                      <?php
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('roles')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto">Edit</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /edit role -->

    </div>
  </div>
</div>
</div>


<script type="text/javascript">
  function validate_role(event){
    var cerr = 1;
    var perr = 1;
    isChecked=false;

    $('.privileges').each(function(){
        if ($(this).prop('checked')){
            isChecked=true;
            
            return false;
        }   
    })
    // alert(isChecked);
    if(isChecked){
      $('form').find('button[type="submit"]').attr('disabled',false);
            $(event).find('.privileges').removeClass('is-invalid');
            var cerr = 1;
            //return true;
    }
    else{
      $(event).find('.invalid-feedback').remove();
      $(event).find('.custom-control-input privileges').addClass('is-invalid');
      alert('Please select privileges!')
      // $(event).find('.privileges-label').before('<div class="invalid-feedback">Please select week days.</div>');
      return false;
    }
    isChecked1=false;

    $('.rights').each(function(){
        if ($(this).prop('checked')){
            isChecked1=true;
            
            return false;
        }   
    })
    // alert(isChecked);
    if(isChecked1){
      $('form').find('button[type="submit"]').attr('disabled',false);
            $(event).find('.rights').removeClass('is-invalid');
             var perr = 1;
            // return true;
    }
    else{
      $(event).find('.invalid-feedback').remove();
      $(event).find('.custom-control-input rights').addClass('is-invalid');
      alert('Please select rights!')
      // $(event).find('.privileges-label').before('<div class="invalid-feedback">Please select week days.</div>');
      return false;
    }
    if(cerr && perr) return true;
    else return false;
    
  }
</script>

<script type="text/javascript">
   function reset_filter(event)
   {
      var id = "role_filter";

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
                  window.location.href = base_url+'roles';
              }
              
          }

      });
   }    

</script>