<?php
	$wk = array();
	foreach($time_table as $time){
		if(empty($wk)){
			$wk[]=$time['weekdays'];
		}
		elseif(!in_array($time['weekdays'],$wk) ){
			$wk[]=$time['weekdays'];
		}
	}
	//print_r($wk);
?>
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
      			<form action="<?=base_url('add-time-table')?>" method="post" class="card" >
        		<div class="card">
          			<div class="card-header">
            			<h3 class="card-title">Time Table</h3>
            			<div class="ml-auto">
              				
            			</div>
          			</div>
          			<div class="table-responsive">
            			<table class="table card-table table-vcenter text-nowrap">
              				<thead>
                				<tr>
                  					<th >#</th>
                  					<?php 
                  					for($i=1;$i<=$batch['batch_periods'];$i++){
                  					?>
                  						<th><?= $i ?></th>
                  					<?php } ?>
                				</tr>
              				</thead>
              			<tbody>
                			<?php
                			if(!empty($time_table)){
                				
                					foreach($weekdays as $data){ ?>
                						<tr>
                						<th><?= $data['week_days'] ?></th>
                						<?php  
                						if(!in_array($data['weekdays'], $wk)){
                						 for($i=1;$i<=$batch['batch_periods'];$i++){
		                  				?>
			                				<td>

			                					<input type="text" class="form-control" name="sub_<?= $data['weekdays'] ?>_<?= $i ?>" id="sub_<?= $data['weekdays'] ?>_<?= $i ?>" placeholder="" maxlength="5" required>
			                				</td>
						                	
					                	<?php } 
                						}
                						else{
                						for($i=1;$i<=$batch['batch_periods'];$i++){ 
                							foreach($time_table as $time){ 

                							if($time['period'] == $i && $time['weekdays'] == $data['weekdays']){ ?>
                								<td>
                								<input type="text" class="form-control" name="sub_<?= $data['weekdays'] ?>_<?= $i ?>" id="sub_<?= $data['weekdays'] ?>_<?= $i ?>" value="<?= $time['subject'] ?>" maxlength="5" required>
                								</td>
                							<?php  $cnt =$i;} 

                							} ?>


                							<?php

                						} 
                						for($i=$cnt+1;$i<=$batch['batch_periods'];$i++){
                						?>
			                				<td>

			                					<input type="text" class="form-control" name="sub_<?= $data['weekdays'] ?>_<?= $i ?>" id="sub_<?= $data['weekdays'] ?>_<?= $i ?>" placeholder="" maxlength="5" required>
			                				</td>
						                	
					                	<?php
                						}
                						}
                						?>
                						</tr>
                					<?php } 
                				 

                			}
                			else{
	                  			foreach($weekdays as $data){

	                			?>
		                			<tr>
		                  				<th><?= $data['week_days'] ?></th>
		                  				<?php for($i=1;$i<=$batch['batch_periods'];$i++){
		                  				?>
			                				<td>

			                					<input type="text" class="form-control" name="sub_<?= $data['weekdays'] ?>_<?= $i ?>" id="sub_<?= $data['weekdays'] ?>_<?= $i ?>" placeholder="" maxlength="5" required>
			                				</td>
						                	
					                	<?php } ?>
		                			</tr>
	                			<?php } 
	                		}?>
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
