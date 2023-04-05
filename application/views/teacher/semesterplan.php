<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
          <?php 
            if($this->session->flashdata('paper_created') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Chapter Published
          </div>
          <?php
            }
            elseif($this->session->flashdata('paper_created') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error unable to publish chapter!
          </div>
          <?php
            }

            if($this->session->flashdata('paper_updated') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Paper Updated
          </div>
          <?php
            }
            elseif($this->session->flashdata('paper_updated') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error updating paper! Please contact tech support.
          </div>
          <?php } ?>
      <div id="roles-table" class="col-12">

        <form action="<?=base_url('admin/paper-filter')?>" method="post" class="card filter" style="display: none;">
          <div class="card-body">
            <div class="row">
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" name="filter_name" id="filter_name" placeholder="eg: Calicut">
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
                <a href="<?=base_url('teacher-chapters').'?id='.$this->session->userdata('paper_id')?>"><i class="fa fa-chevron-left"> Back to chapters</i></a>
            </h1>
        </div>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Semester Plan</h3>
            <div class="ml-auto">
              <!-- <a href="#" id="filter-btn" class="btn ml-auto" data-toggle="tooltip" title="Filter"><i class="fa fa-filter"></i></a> -->
                 <!-- 2021 athulya -->
                                   
              
            </div>
          </div>
          <div class="table-responsive">
            <?php
                if(!empty($chapters)){
            ?>
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                          <th class="w-1">#</th>
                          <th>Name</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                         
                          <th></th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=$offset+1;
                            foreach($chapters as $data){
                            ?>
                              <tr>
                                <td><?=$i++?></td>
                                <td><?=$data['data_name']?></td>
                                <td>
                                   <!-- <form id="expiry_date" > -->
                                    
                                    <input type="text"  name="start_date" id="start_date_<?=$data['data_id']?>" class="form-control upcoming" placeholder="MM/DD/YYYY" required="required"  autocomplete="off" onchange="set_start_date(<?=$data['data_id']?>)" value="<?= $data['start_date'] ?>">
                                  
                                  


                             </td>
                                <td>
                                   <input type="text"  name="expiry_date" id="expiry_date_<?=$data['data_id']?>" class="form-control upcoming" placeholder="MM/DD/YYYY" required="required"  autocomplete="off" onchange="set_expiry_date(<?=$data['data_id']?>)" value="<?= $data['end_date'] ?>"></td>

                                <td>

                               <a href="<?=base_url('teacher-plan-contents').'?id='.$data['data_id'] .'&&plan='.$data['id']?> " class="btn btn-info btn-sm">View</a>

                                   </td>
                           
                                
                              </tr>
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
    

      <!-- edit Form -->
      
      <!-- /edit form -->
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
  var $dp2 = $(".upcoming");
    $dp2.datepicker({
      changeYear: true,
      changeMonth: true,
      dateFormat: 'dd/mm/yy',
      maxDate: new Date('2021-01-26'),
      minDate: new Date('2021-01-26')

    });
</script>
<script type="text/javascript">
  function set_start_date(id){
    var start_date = $('#start_date_'+id).val();
    //alert(expiry_date);
    $.ajax({
            type:"post",
            url:base_url+"set-start-date",
            data:{start_date:start_date,chapter_id:id},
            success:function(data){
              console.log(data);
                if(data == 1){
                   return true;
                }
                else{
                  alert('Something wrong! please try again') ;
                  $('#start_date_'+id).val('');
                }
            }
        });
    
  }


    function set_expiry_date(id){
  
    var expiry_date = $('#expiry_date_'+id).val();
    //alert(expiry_date);
    $.ajax({
            type:"post",
            url:base_url+"set-expiry-date",
            data:{expiry_date:expiry_date,chapter_id:id},
            success:function(data){
              console.log(data);
                if(data == 1){
                   return true;
                }
                else{
                  alert('Something wrong! please try again') ;
                  $('#expiry_date_'+id).val('');
                }
            }
        });
    
  }
</script>

<!-- <script type="text/javascript">
  $(document).on('click','.publish-chapter-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.confirm({
        title: 'Confirm publish!',
        content: 'Cant be reversed!',
        buttons: {
            confirm: function () {
                $.ajax({
                    type:'post',
                    url:base_url+'delete-chapter',
                    data:{id:id},
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

</script> -->