<?php
	
	//print_r($teachers);
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
          			<div class="table-responsive mt-3 p-1" >
                  <?php //print_r($time_table); ?>
            			<table class="table card-table table-vcenter text-nowrap" border="1">
              				<thead>
                				<tr>
                  					<th >#</th>
                  					<?php 
                  					for($i=1;$i<=$periods;$i++){
                  					?>
                  						<th><?= $i ?></th>
                  					<?php } ?>
                				</tr>
              				</thead>
              			<tbody>
                			<?php
                			
                				
                					foreach($weekdays as $data){ ?>
                						<tr>
                						<th><?= $data['week_days'] ?></th>
                            
                						<?php  
                            if(!empty($time_table[$data['week_days']])){
                              foreach ($time_table[$data['week_days']] as $key => $value) {
                                echo "<td>".$value['subject']."</td>";
                              }
                               
                             }
                             else{
                              for($i=0;$i<$periods;$i++){
                                echo "<td></td>";
                              }
                             }
                						 
                						
                						?>
                            
                						</tr>
                					<?php } 
                				 

                			
                			?>
              			</tbody>
            		</table>
          		</div>
        	</div>
        	
        	<div class="card-footer text-right">
	            <div class="d-flex">
	              <input type="hidden" name="stats" id="stats" value="0">
	              <a href="<?=base_url('teacher-batch')?>" class="btn btn-link">Cancel</a>
	              
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
