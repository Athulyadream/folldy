<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
          <?php 
            if($this->session->flashdata('paper_created') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Chapter Design Added
          </div>
          <?php
            }
            elseif($this->session->flashdata('paper_created') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error exercise to add paper!
          </div>
          <?php
            }

            if($this->session->flashdata('paper_updated') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Exercise Updated
          </div>
          <?php
            }
            elseif($this->session->flashdata('paper_updated') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error updating exercise! Please contact tech support.
          </div>
          <?php } ?>
      <div id="roles-table" class="col-12">

        <div class="page-header" style="margin:0;">
            <h1 class="page-title">
                <a href="<?=base_url('teacher-plan')?>"><i class="fa fa-chevron-left"> Back to plan</i></a>
            </h1>
        </div>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Semester Content Plan</h3>
            <div class="ml-auto">
              <!-- <a href="#" id="filter-btn" class="btn ml-auto" data-toggle="tooltip" title="Filter"><i class="fa fa-filter"></i></a> -->
              <?php
                if($this->session->userdata('create')){
              ?>
                <a href="#" id="add-role-btn" class="btn btn-primary ml-auto">Add Chaper Content</a>
              <?php
                }
              ?>
              
            </div>
          </div>
          <div class="table-responsive">
            <?php
                if(!empty($content)){
            ?>
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                          <th class="w-1">#</th>
                          <th>Type</th>
                          <th>Title</th>
                          <th>End Date</th>
                         <!--  <th>Created By</th>
                          <th>Status</th> -->
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=$offset+1;
                            // print_r($content);
                            foreach($content as $data){
                              // if($data['teacher_id'] == "" || $data['teacher_id']==$this->session->userdata('teacher_id')){
                            ?>
                              <tr>
                                <td><?=$i++?></td>
                                <td>
                                  <?php
                                  if($data['type'] == 0){
                                        echo "Content";
                                    }else if($data['type'] == 1){
                                        echo "Video";
                                    }else if($data['type'] == 2){
                                        echo "Presentation";
                                    }
                                    else if($data['type'] == 3){
                                        echo "PDF";
                                    }
                                    else if($data['type'] == 4){
                                        echo "Problem Solving";
                                    } else if($data['type'] == 5){
                                        echo "Exercise";
                                    } else if($data['type'] == 6){
                                        echo "Image";
                                    }?>

                                </td>
                                <td>
                                  <?php
                                    echo $data['ttitle'];
                                 
                                  ?>
                                </td>
                                <td> <input type="text"  name="expiry_date" id="expiry_date_<?=$data['semplanid']?>" class="form-control upcoming" placeholder="MM/DD/YYYY" required="required"  autocomplete="off" onchange="set_expiry_date(<?=$data['id']?>,<?=$data['semplanid']?>)" value="<?= $data['content_end_date'] ?>" min></td>
                                <td></td>
                                
                               <!--  <td>
                                </td>
                                <td>
                                  
                                </td>
                                 -->
                                
                              </tr>
                            <?php //} ?>
                            <?php
                            }
                        ?>
                    </tbody>
                </table>
            <?php
                }
                else{
                  echo '<h3 class="text-center" style="padding-top:20px;">No data available</h3>';
                }
            ?>
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
        <form action="<?=base_url('add-chapter-content')?>" method="post" class="card" enctype="multipart/form-data">
          <div class="card-header">
            <h3 class="card-title">Add Chapter Content</h3>
          </div>
          <div class="card-body">
            <div class="row">
               <div class="col-md-6 col-lg-6" >
                  
                  <div class="form-group" >
                    <label class="form-label">Content</label>
                    <input type="text" value="" name="content" id="content" class="form-control">
                  </div>
                  
              </div>
              
            </div>
            
           
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('chapter-design')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto">Add</button>
            </div>
          </div>
        </form>
      </div>

      <!-- edit Form -->
      <div id="edit-exercise-form" class="col-12" style="display: none;">
        <form action="<?=base_url('edit-exercise')?>" method="post" class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Exercise</h3>
            <input type="hidden" name="edit_id" id="edit_id" >
          </div>
          <div class="card-body">
              
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('papers')?>" class="btn btn-link">Cancel</a>
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
<!-- <script src="<?php echo base_url();?>assets/js/jquery-confirm.min.js"></script> -->
<script type="text/javascript">
    function check_content(event){
      var type = $.trim($(event).val());
      if(type == 1){
        $('#presentation_div').show();
        $('#presentation').attr('required',true);
        
        $('#problemsolving_div').hide();
        $('#problem_solving').attr('required',false);
        $('#default_s').prop('selected',true);
      }
      else if(type == 2){
        $('#presentation_div').hide();
        $('#presentation').attr('required',false);
        
        $('#problemsolving_div').show();
        $('#problem_solving').attr('required',true);

        $('#default_p').prop('selected',true);
        $('#default_t').prop('selected',true);
      }
      
      
    }
</script>

<script type="text/javascript">
   function check_topic_presentation(event)
   {
      var id = $.trim($(event).val());
      $.ajax({
         type:'post',
         url:base_url+"get-presentation-topic",
         data:{value:id},
         success: function(result){
            
            var data = jQuery.parseJSON(result);
            var sbatch = data['data'];    
            categoryS="<option selected='selected' id='default_t' disabled selected >--SELECT--</option>";
            if(sbatch.length >0)
            { 
               for(i=0;i<sbatch.length;i++)
               {                
                  categoryS +='<option value="'+ sbatch[i].topic_id +'">'+sbatch[i].topic_title+'</option>';                
               }
                                
            } 
            $(event).removeClass('is-invalid');
            $(event).parent().find('.error').val(0);
            $('form').find('button[type="submit"]').attr('disabled',false);
            $(".presentation_topic").html(categoryS);  

         }.bind(this)

      });
   }    

</script>

<script type="text/javascript">
  var $dp2 = $(".upcoming");
    $dp2.datepicker({
      changeYear: true,
      changeMonth: true,
      yearRange: "-100:+20",
      dateFormat: 'dd/mm/yy',
      minDate: '2013-09-10',
      maxDate: '2013-10-10'

    });
</script>
<script type="text/javascript">
  $(".js-example-basic-multiple2").select2({
    multiple: true,
  });


    function set_expiry_date(id,semplanid){
  
    var expiry_date = $('#expiry_date_'+semplanid).val();
    // alert(expiry_date);
    $.ajax({
            type:"post",
            url:base_url+"set-expiry-date-content",
            data:{expiry_date:expiry_date,content:id},
            success:function(data){
              console.log(data);
                if(data == 1){
                   return true;
                }
                else{
                  alert('Something wrong! please try again') ;
                  $('#expiry_date_'+semplanid).val('');
                }
            }
        });
    
  }

</script>
