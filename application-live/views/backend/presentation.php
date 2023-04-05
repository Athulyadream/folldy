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

         <form action="<?=base_url('presentation-filter')?>" method="post" class="card filter" <?php if(!empty($this->session->userdata('presentation_filter'))) {?> style="display: block"<?php } else{?>  style="display: none;" <?php } ?>>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" name="filter_name" id="filter_name" placeholder="eg: Presentation" value="">
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
            <h3 class="card-title">presentation</h3>
               <a href="#" id="filter-btn" class="btn ml-auto" data-toggle="tooltip" title="Filter"><i class="fa fa-filter"></i></a>
            <?php
              if($this->session->userdata('create')){
            ?>
              <a href="#" id="add-presentation-btn" class="btn btn-primary ml-auto">Add presentation</a>
            <?php
              }
            ?>
          </div>
          <div class="table-responsive">
            <table class="table card-table table-vcenter ">
              <thead>
                <tr>
                  <th class="w-1">#</th>
                  <th>presentation title</th>
                  <th width="500px">tags</th>
              
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                // print_r($presentation);
                  $i=$offset+1;
                  foreach($presentation as $data){
                ?>
                <tr>
                  <td><span class="text-muted"><?=$i?></span></td>
                  <td><?=$data['presentation_title']?></td>
                  <td>
                    <?=$data['tags']?>
                  </td>
                  
                  <td class="text-right">
                    <?php
                      if($this->session->userdata('edit')){
                    ?>
                      <a href="javascript:void(0)" data-id="<?=$data['presentation_id']?>" class="btn btn-info btn-sm edit-presentation-btn">Edit</a>

                    <?php
                    } if($this->session->userdata('create')){
                    ?>
                     
                      <!--   <a href="<?=base_url()?>presentation-slide-pre/<?=$data['presentation_id']?>" data-id="<?=$data['presentation_id']?>" class="btn btn-info btn-sm ">List Slide</a> -->
<!-- 
                        <a href="<?=base_url()?>presentation-slide/<?=$data['presentation_id']?>" data-id="<?=$data['presentation_id']?>" class="btn btn-info btn-sm ">Add/Edit Slide</a> -->
                      
                    <?php
                    }
                    ?>

                    <?php
                    
                       if($data['topic_id']){
                         // if($this->session->userdata('edit')){
                    ?>
                     
                        <a href="<?=base_url()?>presentation-slide/<?=$data['topic_id']?>" data-id="<?=$data['topic_id']?>" class="btn btn-info btn-sm ">Edit Presentation</a>
                      
                   <?php
                    // }
                    
                      if($this->session->userdata('view')){
                    ?>
                     <a href="<?=base_url()?>presentation-slide-view/<?=$data['topic_id']?>" data-id="<?=$data['topic_id']?>" target="_blank" class="btn btn-info btn-sm ">View </a>
                       <?php
                    }}
                    ?>
                     <?php
                      if($this->session->userdata('edit')){
                    ?>
                    <a href="javascript:void(0)" data-id="<?=$data['presentation_id']?>" class="btn btn-danger btn-sm delete-presentation-btn">Delete</a>
                  <?php } ?>
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
      <div id="add-presentation-form" class="col-12" style="display: none;">
        <form action="<?=base_url('add-presentation')?>" method="post" class="card">
          <div class="card-header">
            <h3 class="card-title">Add presentation</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-4">
                <div class="form-group">
                  <label class="form-label">Presentation Title</label>
                  <input type="text" class="form-control" name="presentation_title" id="presentation_title" onchange="return checktitle();"  placeholder="presentation Title" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-4">
               <!--  <div class="form-group">
                  <label class="form-label">Presentation Tag</label>
                  <input type="text" class="form-control" name="presentation_tags" id="presentation_tags" placeholder="presentation Tag" required>
                </div> -->


                <div class="form-group">
                    <label class="form-label">Tags</label>
                    <input type="text" class="form-control key-tags" id="presentation_tags" name="presentation_tags"  placeholder="Enter Keywords" required="">
                  </div>
              </div>
            </div>
            
            
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('presentation')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto" >Add</button>
            </div>
          </div>
        </form>
      </div>

      <!-- edit presentation -->
      <div id="edit-presentation-form" class="col-12" style="display: none;">
        <form action="<?=base_url('edit-presentation')?>" method="post" class="card">
          <div class="card-header">
            <h3 class="card-title">Edit presentation</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-4">
                <div class="form-group">
                  <label class="form-label">Presentation Title</label>
                  <input type="text" class="form-control" name="edit_presentation_title" id="edit_presentation_title" placeholder="Presentation Title" required>
                  <input type="hidden" name="presentation_id" id="presentation_id">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-4">
                <div class="form-group">
                  <label class="form-label">Presentation Tag</label>
                  <input type="text" class="form-control " id="edit_presentation_tag" name="edit_presentation_tag"  placeholder="Enter Keywords" required="">


               <!--    <input type="text" class="form-control" name="edit_presentation_tag" id="edit_presentation_tag" placeholder="Presentation Tag" value="vjrjj,frfrf" required> -->
                </div>
              </div>
            </div>
           <!--  <div class="row">
              <div class="col-md-6 col-lg-12">
                <div class="form-group">
                  <div class="form-label">Privileges</div>
                  <div class="custom-controls-stacked">
                    <?php
                      foreach($privileges as $data){
                      ?>
                      <label class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" name="edit_privileges[]" value="<?=$data?>">
                        <span class="custom-control-label" style="text-transform: capitalize;"><?=$data?></span>
                      </label>
                      <?php
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div> -->
             
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('presentation')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto">Edit</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /edit presentation -->

    </div>
  </div>
</div>
</div>
<script type="text/javascript">
  function checktitle(){
    var title =  $("#presentation_title").val();
     $.ajax({
                url:base_url+'check-presentation-title',
                type:'post',
                data:{title:title},
                success: function(out){
                    out = JSON.parse(out);
                    if(out.status == 1){
                      alert('Title already exist');
                     $("#presentation_title").val("");
                       
                    }
                    
                }
              })
  }
</script>
<script type="text/javascript">

  $(document).on('click','.delete-presentation-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
   // var tid = $("#tid").val();

    $.confirm({
        title: 'Confirm delete!',
        content: 'Cant be reversed!',
        buttons: {
            confirm: function () {
                $.ajax({
                   
                    url:base_url+'delete-presentation',
                type:'post',
                data:{presentation_id:id},
                    success: function(out){
                        var out = JSON.parse(out);
                        if(out.status == 404){
                            window.location.href = base_url;
                        }
                        else if(out.status == 1){
                            window.location.reload();
                        }
                        else{

                        }
                    }
                })
            },
            cancel: function () {
                console.log('Cancelled!');
            }
        }
    });
})
</script>

<script type="text/javascript">
   function reset_filter(event)
   {
      var id = "presentation_filter";

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
                  window.location.href = base_url+'presentation';
              }
          }

      });
   }    

</script>