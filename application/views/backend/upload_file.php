<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
          <?php 
            if($this->session->flashdata('admin_created') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            File Added
          </div>
          <?php
            }
            elseif($this->session->flashdata('admin_created') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error adding file! Please contact tech support.
          </div>
          <?php
            }

            if($this->session->flashdata('admin_updated') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            File Deleted
          </div>
          <?php
            }
            elseif($this->session->flashdata('admin_updated') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error delete file! Please contact tech support.
          </div>
          <?php }
          if($this->session->flashdata('image_upload') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            File upload failed.
          </div>
          <?php
            }
            elseif($this->session->flashdata('image_upload') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Image uploaded.
          </div>
          <?php }
          
          elseif($this->session->flashdata('chapter_exist') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error please choose chapter.
          </div>
          <?php }
             ?>
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
        <div class="page-header" style="margin:0;">
            <h1 class="page-title">
                <a href="<?=base_url('chapters')?>"><i class="fa fa-chevron-left"> Back to Chapter</i></a>
            </h1>
        </div>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Uploaded Images</h3>
            <div class="ml-auto">
              <!-- <a href="#" id="filter-btn" class="btn ml-auto" data-toggle="tooltip" title="Filter"><i class="fa fa-filter"></i></a> -->
              <?php
                if($this->session->userdata('create')){
              ?>
                <a href="#" id="add-role-btn" class="btn btn-primary ml-auto">Upload File</a>
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
                  <th>Title</th>
                  <th>Image</th>
                  <th>Tag</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i=$offset+1;
                  foreach($images as $data){
                ?>
                <tr>
                  <td><span class="text-muted"><?=$i?></span></td>
                  
                  <td><?=$data['image_title']?></td>
                 
                  <td>
                    <a href="<?php echo base_url('uploads/chapter/' .$data['chapter_image'] ) ?>" target="_blank" >
                    <img src="<?php echo base_url(); ?>uploads/chapter/<?php echo $data['chapter_image'] ?>" style="height:50px;width:100px"></a>
                  </td>
                  <td>
                    <?php //print_r($data['tag']);
                    if(!empty($data['tag'])){
                       $tag =array();
                      foreach($data['tag'] as $row){
                        $tag[]= $row['tag'];
                      }
                    
                    $tagtext = implode(",",$tag);
                  }
                    $text = $tagtext;
                        $newtext = wordwrap($text, 40, "<br />\n");
                        echo $newtext;
                    ?>
                  </td>
                  <td class="text-right">
                    <?php
                      if($this->session->userdata('create')){
                    ?>
                      <a href="<?php echo base_url('delete-image/'.$data['id']); ?>" data-id="<?=$data['id']?>" class="btn btn-secondary btn-sm " onclick="return confirm('Are you sure you want to delete?')">Delete</a>
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
        </div>


        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Uploaded Files</h3>
            <div class="ml-auto">
              <!-- <a href="#" id="filter-btn" class="btn ml-auto" data-toggle="tooltip" title="Filter"><i class="fa fa-filter"></i></a> -->
              
            </div>
          </div>
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap">
              <thead>
                <tr>
                  <th class="w-1">#</th>
                  <th>Type</th>
                  <th>Title</th>
                  <th>File</th>
                  <th>Tag</th>
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
                  <td>
                    <?php if($data['type'] == 1){
                      echo "Video";
                      
                    }
                    else{
                      echo "PDF";
                      
                    }
                    ?>
                  </td>
                  <td><?=$data['video_title']?></td>
                 
                  <td>
                    <?php 
                    if($data['type'] == 1){?>
                      <a href="<?php echo base_url('uploads/video/' .$data['video_link'] ) ?>" target="_blank" > <?php if($data['thumb_nail'] != ''){?> <img src= "<?= base_url('uploads/thumbnail/'.$data['thumb_nail'] ) ?>" style="height:50px;width:100px" > <?php } else{ echo 'View Data';} ?> </a>
                    <?php }
                    else{ ?>
                      <a href="<?php echo base_url('uploads/pdf/' .$data['video_link'] ) ?>" target="_blank" > View Data </a>
                    <?php }
                    ?>
                    
                  </td>
                  <td>
                    <?php //print_r($data['tag']);
                    if(!empty($data['tag'])){
                       $tag =array();
                      foreach($data['tag'] as $row){
                        $tag[]= $row['file_tag'];
                      }
                    
                    $tagtext = implode(",",$tag);
                  }
                    $text = $tagtext;
                        $newtext = wordwrap($text, 40, "<br />\n");
                        echo $newtext;
                    ?>
                  </td>
                  <td class="text-right">
                    <?php
                      if($this->session->userdata('create')){
                    ?>
                      <a href="<?php echo base_url('delete-video/'.$data['video_id']); ?>" data-id="<?=$data['video_id']?>" class="btn btn-secondary btn-sm " onclick="return confirm('Are you sure you want to delete?')">Delete</a>
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
        <form action="<?=base_url('add-upload-files')?>" method="post" class="card" enctype="multipart/form-data" id="add-form">
          <div class="card-header">
            <h3 class="card-title">Add File</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Type</label>
                  <select class="form-control" name="type" id="type" required onchange="return check_type(this)">
                    <option selected="selected" value="">Select</option>
                    <option value="1">Video</option>
                    <option value="2">PDF</option>
                    <option value="3">Image</option>
                    
                  </select>
                   
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-6">
                
                <div class="form-group">
                  <label class="form-label">Title</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" required>
                  
                  <input type="hidden" class="error" id="code-error" value="0">
                </div>
                <div class="form-group">
                    <label class="form-label">Tags</label>
                    <input type="text" class="form-control key-tags" id="file_tags" name="file_tags"  placeholder="Enter Keywords" required="">
                </div>
               
              </div>
              <div class="col-md-6 col-lg-6">
                
                
                <div class="form-group">
                  <label class="form-label">Upload File</label>
                  <input type="file" name="video" id="video" class="form-control" onchange="return video_type_check(this)" required=""> 
                  <label id="size">Size below 2MB</label>
                </div>
                <div class="form-group" id="thumbnail-div" style="display: none">
                  <label class="form-label">Thumbnail Image</label>
                  <input type="file" name="thumbnail" id="thumbnail" class="form-control" onchange="return thumbnail_check(this)" >
                  <label>Width : Height is 16 : 9</label>
                  
                </div>
                
              </div>
            </div>
           <!--  <div class="row" id="image-div" style="display: none;">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Choose Image</label>
                  <input type="file" name="image" id="image" class="form-control" onchange="return video_type_check(this)"> 
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    <label class="form-label">Tags</label>
                    <input type="text" class="form-control key-tags" id="image_tags" name="image_tags"  placeholder="Enter Keywords" >
                </div>
              </div>
            </div> -->
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <input type="hidden" name="stats" id="stats" value="0">
              <a href="<?=base_url('upload-files')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto add-btn">Add</button>
            </div>
          </div>
        </form>
      </div>

      <!-- edit Form -->
     
      <!-- /edit form -->
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
  function check_type(event){
    var type = $(event).val();
    if(type== 1){
      $('#thumbnail-div').show();
      $('#thumbnail').attr('required',true);
      $('#size').html('Size below 2MB & extension mp4/mov/avi/mpeg');
      //'mp4','mov','avi','mpeg'
    }
    else{
      if(type== 2){
        $('#size').html('Size below 2MB & extension pdf');
      }
      else{
        $('#size').html('Size below 2MB & extension png/jpg/jpeg');
      }
      $('#thumbnail-div').hide();
      $('#thumbnail').attr('required',false);
    }
  }
</script>
<!-- <script type="text/javascript">
  function change_type(event){
    var type = $(event).val();
    if(type == 1 || type == 2){
      $('#file-div').show();
      $('#image-div').hide();

      $('#title').attr('required',true);
      $('#file_tags').attr('required',true);
      $('#video').attr('required',true);
      $('#image').attr('required',false);
      $('#image_tags').attr('required',false);
    }
    else if(type == 3){
      $('#file-div').hide();
      $('#image-div').show();
      $('#title').attr('required',false);
      $('#file_tags').attr('required',false);
      $('#video').attr('required',false);
      $('#image').prop('required',true);
      $('#image_tags').attr('required',true);
    }
  }
</script> -->
<script type="text/javascript">
  $(document).ready(function () {
      $(".date-dob").datepicker( { dateFormat: 'dd/mm/yy', minDate: 0 });
     
    });
</script>
<script type="text/javascript">
    function video_type_check(event){
      var type = $('#type').val();
      if(type == null){
        alert('Please choose Type of file!');
        $(event).val('');
        return false;
      }
      else if(type == 1){
      
      var fl = $(event).val();
      var ext = fl.split('.').pop().toLowerCase();
      if($.inArray(ext,['mp4','mov','avi','mpeg']) == -1){
         alert('Invalid extension!');
         $(event).val('');
         return false;
      }
       var size=event.files[0].size;
       //alert(size);
         if(size > 2097152)
         {
            alert("Maximum Image File Size is 2 mb");
            
             $(event).val('');
            return false;
          }
      }
      else if(type == 2){
        var fl = $(event).val();
        var ext = fl.split('.').pop().toLowerCase();
        if($.inArray(ext,['pdf']) == -1){
         alert('Invalid extension!');
         $(event).val('');
         return false;
        }
        var size=event.files[0].size;
        if(size > 2097152)
       {
          alert("Maximum Image File Size is 2 mb");
          
           $(event).val('');
          return false;
        }
      }
      else if(type == 3){
        var fl = $(event).val();
        var ext = fl.split('.').pop().toLowerCase();

        if($.inArray(ext,['png','jpeg','jpg']) == -1){
         alert('Invalid extension!');
         $(event).val('');
         return false;
        }
        var size=event.files[0].size;
        if(size > 2097152)
       {
          alert("Maximum Image File Size is 2 mb");
          
           $(event).val('');
          return false;
        }
      }
   }
</script>
<script type="text/javascript">
  function thumbnail_check(event){
     var fl = $(event).val();
      var ext = fl.split('.').pop().toLowerCase();
      var size=event.files[0].size;
      if($.inArray(ext,['png','jpg','jpeg']) == 1) {

          let img = new Image()
         img.src = window.URL.createObjectURL(event.files[0])
         img.onload = () => {

            if(img.width / img.height != 16 / 9){
                alert("Image size should be 16:9 ratio");
               $(event).val('');
            }
           
      }
    }
    else{
      alert("Invalid image extension");
               $(event).val('');
    }
  }
</script>
