
<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
      <?php 
      if($this->session->flashdata('admin_created') == 1){
      ?>
        <div class="offset-lg-4 col-md-4 alert alert-success text-center">
          <button type="button" class="close" data-dismiss="alert"></button>
          Semester Added
        </div>
      <?php
      }
      elseif($this->session->flashdata('admin_created') == 2){
      ?>
        <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
          <button type="button" class="close" data-dismiss="alert"></button>
           Error adding semester! Please contact tech support.
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
      <div id="add-role-form" class="col-12" >
        <form action="<?=base_url('add-semester')?>" method="post" class="card" >
          <div class="card-header">
            <h3 class="card-title">Create Semester</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Semester Name</label>
                  <input type="hidden" name="batch_id" value="<?= $batch['batch_id'] ?>">
                  <input type="text" class="form-control" name="semester_name" id="semester_name" placeholder="Enter Name" required>
                </div>
              </div>
              <div class="col-md-4 col-lg-4">
                <div class="form-group">
                  <label class="form-label">Subject</label>
                  <select class="form-control subject js-example-basic-multiple2" name="subject[]" id="subject" required>
                    <option value=""></option>
                    <?php
                      foreach($subject as $data){
                        if(!in_array($data['data_id'], $exist_sub)){
                        echo '<option value="'.$data['data_id'].'" style="text-transform:capitalize">'.$data['data_name'].'</option>';
                        }
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
              <a href="<?=base_url('batch')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto">Add</button>
            </div>
          </div>
        </form>
      </div>

      <div class="card">
          <div class="card-header">
            <h3 class="card-title">Semester Subjects</h3>
            
          </div>
      <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap">
              <thead>
                <tr>
                  <th class="w-1">#</th>
                  <th>Semester Name</th>
                  <th>Subject</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i=1;
                  foreach($semester as $data){
                ?>
                <tr>
                  <td><span class="text-muted"><?=$i?></span></td>
                  <td><?=  $data['sem_name'] ?> </td>
                  <td>
                     <?php $text = $data['subject'];
                        $newtext = wordwrap($text, 50, "<br />\n");
                        echo $newtext; 
                    ?>
                    </td>
                  <td>
                    <?php if($data['publish_status'] == 0){
                     ?>
                     <a href="<?=base_url('publish-semester/'.$data['sem_id'])?>" id="" class="btn btn-info btn-sm" onclick="return confirm('Are you sure you want to publish semester!?')">Publish</a>
                     <?php
                    } 
                    elseif($data['publish_status'] == 1){
                      echo "Currently Active";
                    }
                    else{
                      echo "Published";
                    }

                    ?>
                    
                  </td>
                  <td>
                   <?php if($data['publish_status'] == 0){
                     ?>
                      <a href="<?=base_url('delete-semester/'.$data['sem_id'])?>" class="btn btn-info btn-sm" title="Delete" onclick="return confirm('Are you sure you want to Delete?')">Delete</a>
                    <?php }
                    elseif($data['publish_status'] == 1){ ?>
                    <a href="<?=base_url('disable-semester/'.$data['sem_id'])?>" class="btn btn-info btn-sm" title="Disable" onclick="return confirm('Are you sure you want to disable?')">Disable</a>
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
      </div>
      

      <!-- edit Form -->
      
      <!-- /edit form -->
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
  $(".js-example-basic-multiple").select2({
    multiple: true,
  });
</script>
