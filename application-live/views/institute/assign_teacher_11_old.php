
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
      	<form action="<?=base_url('add-assigned-teacher')?>" method="post" class="card" >
        	<div class="card">
          	<div class="card-header">
            	<h3 class="card-title">Assign Teacher</h3>
            	<div class="ml-auto">
            	</div>
          	</div>
          	<div class="table-responsive">
            	<table class="table card-table table-vcenter text-nowrap">
              	<thead>
                	<tr>
          					
          					<th>Subject Name</th>
                    <th>Teacher</th>
                	</tr>
              	</thead>
              	<tbody>
                	<?php
                	if(!empty($subject)){
                		foreach($subject as $data){ ?>
                			<tr>
                				<th><?= $data['data_name'] ?>
                          <input type="hidden" class="form-control" name="sub_<?= $data['data_id'] ?>" id="sub_<?= $data['data_id'] ?>" value="<?= $data['data_id'] ?>">

                        </th>
	                		  <td>

                          <select class="form-control" name="teacher_<?= $data['data_id'] ?>" id="course_<?= $data['data_id']?>">
                            <option selected="selected" disabled selected>Select</option>
  	                				<?php 
                             foreach($data['teacher'] as $row){
                              if($data['teacher_id'] != "" && $data['teacher_id']==$row['teacher_id']){
                                echo '<option value="'.$row['teacher_id'].'" style="text-transform:capitalize" selected="">'.$row['teacher_name'].'</option>';
                              }
                              else{
                                echo '<option value="'.$row['teacher_id'].'" style="text-transform:capitalize">'.$row['teacher_name'].'</option>';
                              }
                             }
                            ?>
                          </select>
	                			</td>
						                	
					                
                			</tr>
                		<?php } 
                	}
                	?>
              	</tbody>
            	</table>
          	</div>
        	</div>
        	<input type="hidden" name="batch_id" id="batch_id" value="<?= $batch['batch_id'] ?>">
        	<div class="card-footer text-right">
	            <div class="d-flex">
	              <input type="hidden" name="stats" id="stats" value="0">
	              <a href="<?=base_url('batch')?>" class="btn btn-link">Cancel</a>
	              <button type="submit" class="btn btn-primary ml-auto">Submit</button>
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
