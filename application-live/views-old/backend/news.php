
<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
          <?php 
            if($this->session->flashdata('admin_created') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            News Added
          </div>
          <?php
            }
            elseif($this->session->flashdata('admin_created') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error adding news! Please contact tech support.
          </div>
          <?php
            }

            if($this->session->flashdata('admin_updated') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            News Updated
          </div>
          <?php
            }
            elseif($this->session->flashdata('admin_updated') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error updating news! Please contact tech support.
          </div>
          <?php }
          if($this->session->flashdata('image_upload') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Image upload failed
          </div>
          <?php
            } ?>
      <div id="roles-table" class="col-12">

        <form action="<?=base_url('admin-news-filter')?>" method="post" class="card filter" <?php if(!empty($this->session->userdata('news_filter'))) {?> style="display: block"<?php } else{?>  style="display: none;" <?php } ?>>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">News Heading</label>
                  <input type="text" class="form-control" name="filter_name" id="filter_name" placeholder="" value="<?= $filter_data['name']?>">
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Date</label>
                  <input type="text"  name="filter_date" id="filter_date" class="form-control datepicker" placeholder="MM/DD/YYYY"  autocomplete="off" value="<?php if(!empty($filter_data['date'])) echo date('d/m/Y',strtotime($filter_data['date'])); ?>">
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
            <h3 class="card-title">News</h3>
            <div class="ml-auto">
               <a href="#" id="filter-btn" class="btn ml-auto" data-toggle="tooltip" title="Filter"><i class="fa fa-filter"></i></a> 
              <?php
                if($this->session->userdata('create')){
              ?>
                <a href="#" id="add-role-btn" class="btn btn-primary ml-auto">Add News</a>
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
                  <th>Heading</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i=$offset+1;
                  foreach($news as $data){
                ?>
                <tr>
                  <td><span class="text-muted"><?=$i?></span></td>
                  <td><?=$data['news_heading']?></td>
                  <td>
                    <?php $text = $data['news_description'];
                        $newtext = wordwrap($text, 40, "<br />\n");
                        echo $newtext; 
                    ?>
                    
                  </td>
                  <td>
                    <img src="<?php echo base_url(); ?>uploads/news/<?php echo $data['news_image'] ?>" style="height:50px;width:100px">
                    </td>
                  <td>
                    <?=date('d-m-Y',strtotime($data['news_date']) )?>
                  </td>
                  
                  
                  <td>
                    <?php
                      if($data['news_status'] == 1){
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
                      <a href="javascript:void(0)" data-id="<?=$data['news_id']?>" class="btn btn-secondary btn-sm edit-admin-news-btn">Edit</a>
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
        <form action="<?=base_url('add-admin-news')?>" method="post" class="card" enctype="multipart/form-data" id="add-form">
          <div class="card-header">
            <h3 class="card-title">Add News</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Heading</label>
                  <input type="text" class="form-control" name="heading" id="heading" placeholder="Enter Heading" required>
                  
                  <input type="hidden" class="error" id="code-error" value="0">
                </div>
                <div class="form-group">
                  <label class="form-label">Date</label>
                   <input type="text"  name="date" id="date" class="form-control previous" placeholder="MM/DD/YYYY" required="required" data-date-end-date="0d" autocomplete="off">
                  
                </div>
               
              </div>
              <div class="col-md-6 col-lg-6">
                
                
                <div class="form-group">
                  <label class="form-label">Image</label>
                  <input type="file" name="image" id="image" class="form-control" onchange=" return validateImage(this.id);" required> 
                  <label>Size below 2MB & extension jpg/png/jpeg</label>
                </div>
                
                <div class="form-group">
                  <label class="form-label">Description</label>
                  <textarea cols="3" rows="2" class="form-control"  name="description" id="description" required></textarea>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <input type="hidden" name="stats" id="stats" value="0">
              <a href="<?=base_url('news')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto add-btn">Add</button>
            </div>
          </div>
        </form>
      </div>

      <!-- edit Form -->
      <div id="edit-news-form" class="col-12" style="display: none;">
        <form action="<?=base_url('edit-admin-news')?>" method="post" class="card" enctype="multipart/form-data">
          <div class="card-header">
            <h3 class="card-title">Edit News</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Heading</label>
                  <input type="text" class="form-control" name="edit_heading" id="edit_heading" placeholder="Enter Heading" required>
                  <input type="hidden" name="edit_id" id="edit_id">
                  <input type="hidden" class="error" id="code-error" value="0">
                </div>
                <div class="form-group">
                  <label class="form-label">Date</label>
                   <input type="text"  name="edit_date" id="edit_date" class="form-control previous" placeholder="MM/DD/YYYY" required="required" data-date-end-date="0d" autocomplete="off">
                  
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
                  <label class="form-label">Image</label>
                  <input type="file" name="image" id="image" class="form-control" onchange=" return validateImage(this.id);" > 
                  <label>Size below 2MB & extension jpg/png/jpeg</label>
                </div>
                
                <div class="form-group">
                  <label class="form-label">Description</label>
                  <textarea cols="3" rows="2" class="form-control"  name="edit_description" id="edit_description" required></textarea>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('news')?>" class="btn btn-link">Cancel</a>
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

<!-- <script src="<?=base_url()?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
  
<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap-datepicker.min.js"> </script> -->

<!-- <script type="text/javascript">
  $(document).ready(function () {
      $(".datepicker").datepicker( { dateFormat: 'dd/mm/yy', minDate: 0 });
     
    });
</script> -->
<script type="text/javascript">
  function validateImage(id) 
  {
    var formData = new FormData();

    var file = document.getElementById(id).files[0];
    formData.append("Filedata", file);

    var t = file.type.split('/').pop().toLowerCase();
    
    if (t != "jpeg" && t != "jpg" && t != "png" ) 
    {
      
      alert('Please select a valid image file');
      document.getElementById(id).value = '';
      return false;
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById(id).files[0]);
    var f = document.getElementById(id).files[0];
    var fsize = f.size||f.fileSize;
    if(fsize > 2097152)
    {
      alert("Image File Size is very big");
      document.getElementById(id).value = "";
   
      return false;
    }

  }
</script>
<script type="text/javascript">
   function reset_filter(event)
   {
      var id = "news_filter";

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
                  window.location.href = base_url+'admin-news';
              }
              
          }

      });
   }    

</script>
