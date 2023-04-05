<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
          <?php 
            if($this->session->flashdata('presentation_created') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Presentation Created
          </div>
          <?php
            }
            elseif($this->session->flashdata('presentation_created') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error creating presentation! Please contact tech support.
          </div>
          <?php
            }
            if($this->session->flashdata('presentation_updated') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            presentation Updated
          </div>
          <?php
            }
            elseif($this->session->flashdata('presentation_updated') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error updating presentation! Please contact tech support.
          </div>
          <?php
            }
          ?>
      <div id="presentation-table" class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Slide</h3>
            <?php
              if($this->session->userdata('create')){
            ?>
              <a href="#" id="add-slide-btn" data-id="<?=$presentation_id?>" class="btn btn-primary ml-auto">Add Slide</a>
            <?php
              }
            ?>
          </div>
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap">
              <thead>
                <tr>
                  <th class="w-1">#</th>
                  <th>Slide title</th>
                  <!-- <th width="500px">tags</th> -->
              
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i=1;
                  // print_r($presentation_slide);
                  foreach($presentation_slide as $data){
                ?>
                <tr>
                  <td><span class="text-muted"><?=$i?></span></td>
                  <td><?=$data['topic_title']?></td>
                  <!-- <td>
                    <?=$data['presentation_tags']?>
                  </td> -->
                  
                  <td class="text-right">
                    <?php
                       if($this->session->userdata('create')){
                    ?>
                     
                        <a href="<?=base_url()?>presentation-slide/<?=$data['topic_id']?>" data-id="<?=$data['topic_id']?>" class="btn btn-info btn-sm ">Edit Slide</a>
                      
                    <?php
                    }
                    ?>

                     <a href="<?=base_url()?>presentation-slide-view/<?=$data['topic_id']?>" data-id="<?=$data['topic_id']?>" target="_blank" class="btn btn-info btn-sm ">View Slide</a>
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
      

      <!-- edit presentation -->
      
      <!-- /edit presentation -->

    </div>
  </div>
</div>
</div>