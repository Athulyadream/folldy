<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
          <?php 
            if($this->session->flashdata('admin_created') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Batch Added
          </div>
          <?php
            }
            elseif($this->session->flashdata('admin_created') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error adding batch! Please contact tech support.
          </div>
          <?php
            }

            if($this->session->flashdata('admin_updated') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Batch Updated
          </div>
          <?php
            }
            elseif($this->session->flashdata('admin_updated') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error updating batch! Please contact tech support.
          </div>
          <?php } ?>
      <div id="roles-table" class="col-12">

        <form action="<?=base_url('admin/admin-filter')?>" method="post" class="card filter" style="display: none;">
          <div class="card-body">
            <div class="row">
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" name="filter_name" id="filter_name" placeholder="eg: admin">
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Email</label>
                  <input type="text" class="form-control" name="filter_email" id="filter_email" placeholder="eg: admin@example.com">
                </div>
              </div>
              <div class="col-md-2 col-lg-2">
                <div class="form-group">
                  <label class="form-label">Role</label>
                  <select class="form-control" name="filter_role" id="filter_role">
                    <option selected="selected" value="">All</option>
                    <?php
                      foreach($roles as $data){
                        echo '<option value="'.$data['role_id'].'" style="text-transform:capitalize">'.$data['role_name'].'</option>';
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

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Batches</h3>
            <div class="ml-auto">
              <!-- <a href="#" id="filter-btn" class="btn ml-auto" data-toggle="tooltip" title="Filter"><i class="fa fa-filter"></i></a> -->
              <?php
                if($this->session->userdata('create')){
              ?>
                <!-- <a href="#" id="add-role-btn" class="btn btn-primary ml-auto">Add batch</a> -->
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
                  <th>Code</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Course</th>
                  <th>Status</th>
                  <th>Subject </th>
                  <th>Invited Student </th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i=$offset+1;
                  foreach($batch as $data){
                ?>
                <tr>
                  <td><span class="text-muted"><?=$i?></span></td>
                  <td><?=$data['batch_name']?></td>
                  <td>
                    <?=$data['batch_code']?>
                  </td>
                  <td>
                    <?=date('d-m-Y',strtotime($data['batch_start_date']) ).' to ' .date('d-m-Y',strtotime($data['batch_end_date']) ) ?>
                  </td>
                  <td>
                    <?=date('h:i a',strtotime($data['batch_start_time']) ).' to ' .date('h:i a',strtotime($data['batch_end_time']) ) ?>
                  </td>
                  <td><?=$data['data_name']?></td>
                  <td>
                    <?php
                      if($data['batch_status'] == 1){
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
                  <td>
                   <a href="<?=base_url('teacher-papers').'?id='.$data['batch_id']?>" class="btn btn-info btn-sm">View</a>
                  </td>
                  <td style="text-align: center;">
                   <a href="<?=base_url('invited-student').'?id='.$data['batch_id']?>" class="btn btn-info btn-sm">List</a>
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
        <form action="<?=base_url('add-batch')?>" method="post" class="card" >
          <div class="card-header">
            <h3 class="card-title">Add Batch</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Batch Name</label>
                  <input type="text" class="form-control" name="batch_name" id="batch_name" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Batch Code</label>
                  <input type="text" class="form-control code" name="batch_code" id="batch_code" placeholder="Enter Batch Code" required onchange="check_batch_code(this)">
                  <input type="hidden" class="error" id="code-error" value="0">
                </div>
                <div class="form-group">
                  <label class="form-label">Start Time</label>
                  <input type="time"  name="start_time" id="start_time" class="form-control" required="required" >
                  
                </div>
                <div class="form-group">
                  <label class="form-label">End Time</label>
                  <input type="time"  name="end_time" id="end_time" class="form-control" required="required" >
                  
                </div>
                <div class="form-group">
                  <label class="form-label">No of periods</label>
                  <input type="text"  name="period_no" id="period_no" class="form-control numberonly" required="required" >
                  
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                
                
                <div class="form-group">
                  <label class="form-label">Course</label>
                  <select class="form-control" name="course" id="course" required >
                    <option selected="selected" disabled selected>Select</option>
                    <?php
                      foreach($course as $data){
                        echo '<option value="'.$data['data_id'].'" style="text-transform:capitalize">'.$data['data_name'].'</option>';
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-label">Start Date</label>
                  <input type="text"  name="start_date" id="start_date" class="form-control date-dob" placeholder="MM/DD/YYYY" required="required" data-date-start-date="0d" autocomplete="off">
                  
                </div>
                <div class="form-group">
                  <label class="form-label">End Date</label>
                  <input type="text"  name="end_date" id="end_date" class="form-control date-dob" placeholder="MM/DD/YYYY" required="required" data-date-start-date="0d" autocomplete="off">
                  
                </div>
                <div class="form-group">
                  <label class="form-label">Week Days</label>
                  
                  <input type="checkbox" id="day1" name="day1" value="1" > &nbsp; Mon &nbsp;
                  <input type="checkbox" id="day2" name="day2" value="2"> &nbsp; Tue &nbsp;
                  <input type="checkbox" id="day3" name="day3" value="3"> &nbsp; Wed &nbsp;
                  <input type="checkbox" id="day4" name="day4" value="4"> &nbsp; Thu &nbsp;
                  <input type="checkbox" id="day5" name="day5" value="5"> &nbsp; Fri &nbsp;
                  <input type="checkbox" id="day6" name="day6" value="6"> &nbsp; Sat &nbsp;

                </div>
                <div class="form-group">
                  <label class="form-label">Batch Description</label>
                  <textarea cols="3" rows="2" class="form-control"  name="description" id="description" required></textarea>
                  
                </div>
              </div>
            </div>
            <div class="row" id="subject-div">
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <input type="hidden" name="stats" id="stats" value="0">
              <a href="<?=base_url('batch')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto">Add</button>
            </div>
          </div>
        </form>
      </div>

      <!-- edit Form -->
      <div id="edit-batch-form" class="col-12" style="display: none;">
        <form action="<?=base_url('edit-batch')?>" method="post" class="card" >
          <div class="card-header">
            <h3 class="card-title">Edit Batch</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Batch Name</label>
                  <input type="text" class="form-control" name="edit_batch_name" id="edit_batch_name" placeholder="Enter Name" required>
                  <input type="hidden" name="edit_id" id="edit_id">
                </div>
                <div class="form-group">
                  <label class="form-label">Batch Code</label>
                  <input type="text" class="form-control code" name="edit_batch_code" id="edit_batch_code" placeholder="Enter Email" required onchange="check_batch_code(this)">
                </div>
                <div class="form-group">
                  <label class="form-label">Start Time</label>
                  <input type="time"  name="edit_start_time" id="edit_start_time" class="form-control" required="required" >
                  
                </div>
                <div class="form-group">
                  <label class="form-label">End Time</label>
                  <input type="time"  name="edit_end_time" id="edit_end_time" class="form-control" required="required" >
                  
                </div>
                <div class="form-group">
                  <label class="form-label">No of periods</label>
                  <input type="text"  name="edit_period_no" id="edit_period_no" class="form-control numberonly" required="required" >
                  
                </div>
                <div class="form-group">
                  <label class="form-label">Batch Status</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top: 10px;">
                    <input type="checkbox" class="custom-control-input" name="edit_batch_status" id="edit_batch_status">
                    <span class="custom-control-label">Active</span>
                  </label>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Course</label>
                  <select class="form-control" name="edit_course" id="edit_course" required>
                    <option selected="selected" disabled selected>Select</option>
                    <?php
                      foreach($course as $data){
                        echo '<option value="'.$data['data_id'].'" style="text-transform:capitalize">'.$data['data_name'].'</option>';
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-label">Start Date</label>
                  <input type="text"  name="edit_start_date" id="edit_start_date" class="form-control date-dob" placeholder="MM/DD/YYYY" required="required" data-date-start-date="0d" autocomplete="off">
                  
                </div>
                <div class="form-group">
                  <label class="form-label">End Date</label>
                  <input type="text"  name="edit_end_date" id="edit_end_date" class="form-control date-dob" placeholder="MM/DD/YYYY" required="required" data-date-start-date="0d" autocomplete="off">
                  
                </div>
                <div class="form-group">
                  <label class="form-label">Week Days</label>
                  
                  <input type="checkbox" id="edit_day1" name="edit_day1" value="1" > &nbsp; Mon &nbsp;
                  <input type="checkbox" id="edit_day2" name="edit_day2" value="2"> &nbsp; Tue &nbsp;
                  <input type="checkbox" id="edit_day3" name="edit_day3" value="3"> &nbsp; Wed &nbsp;
                  <input type="checkbox" id="edit_day4" name="edit_day4" value="4"> &nbsp; Thu &nbsp;
                  <input type="checkbox" id="edit_day5" name="edit_day5" value="5"> &nbsp; Fri &nbsp;
                  <input type="checkbox" id="edit_day6" name="edit_day6" value="6"> &nbsp; Sat &nbsp;
                        
                </div>
                <div class="form-group">
                  <label class="form-label">Batch Description</label>
                  <textarea cols="3" rows="2" class="form-control"  name="edit_description" id="edit_description" required></textarea>
                  
                </div>
                
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('batch')?>" class="btn btn-link">Cancel</a>
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
  function check_batch_code(event){
    var batch = $.trim($(event).val());
    var id = $('#edit_id').val();
    
        $.ajax({
            type:"post",
            url:base_url+"get-batch-code",
            data:{value:batch,id : id},
            success:function(data){
              console.log(data);
                if(data == 1){
                    $(event).addClass('is-invalid');

                    $(event).parent().find('.error').val(1);
                    $('form').find('button[type="submit"]').attr('disabled',true);
                    $(event).focus();
                    alert('Batch code already exist');
                    $(event).find('.code').after('<div class="invalid-feedback">Batch code already exist</div>');
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
  $(document).ready(function () {
      $(".date-dob").datepicker( { dateFormat: 'dd/mm/yy', minDate: 0 });
     
    });
</script>
<script type="text/javascript">
  $("#start_date").change(function () {

    var date = document.getElementById("start_date").value;
    var edate = document.getElementById("end_date").value;

    var startDate = date.split("/").reverse().join("-");
    var endDate = edate.split("/").reverse().join("-");
   

    if ((Date.parse(startDate) > Date.parse(endDate))) {
        alert("End date should be greater than Start date");
        document.getElementById("end_date").value = "";
    }
   
});
  $("#end_date").change(function () {

    var date = document.getElementById("start_date").value;
    var edate = document.getElementById("end_date").value;

    var startDate = date.split("/").reverse().join("-");
    var endDate = edate.split("/").reverse().join("-");

    if ((Date.parse(startDate) > Date.parse(endDate))) {
        alert("End date should be greater than Start date");
        document.getElementById("end_date").value = "";
    }

});
</script>
<script type="text/javascript">
  
$("#start_time").change(function () {
var timefrom = new Date();
temp = $('#start_time').val().split(":");
timefrom.setHours((parseInt(temp[0]) - 1 + 24) % 24);
timefrom.setMinutes(parseInt(temp[1]));

var timeto = new Date();
temp = $('#end_time').val().split(":");
timeto.setHours((parseInt(temp[0]) - 1 + 24) % 24);
timeto.setMinutes(parseInt(temp[1]));

if (timeto < timefrom){
    alert('Start time should be smaller than end time!');
    document.getElementById("start_time").value = "";
}
});

$("#end_time").change(function () {
var timefrom = new Date();
temp = $('#start_time').val().split(":");
timefrom.setHours((parseInt(temp[0]) - 1 + 24) % 24);
timefrom.setMinutes(parseInt(temp[1]));

var timeto = new Date();
temp = $('#end_time').val().split(":");
timeto.setHours((parseInt(temp[0]) - 1 + 24) % 24);
timeto.setMinutes(parseInt(temp[1]));

if (timeto < timefrom){
    alert('End time should be greater than start time!');
    document.getElementById("end_time").value = "";
}
});
</script>
