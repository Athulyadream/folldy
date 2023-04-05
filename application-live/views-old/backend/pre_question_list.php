
<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
          <?php 
            if($this->session->flashdata('course_created') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Course Added
          </div>
          <?php
            }
            elseif($this->session->flashdata('course_created') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error unable to add course!
          </div>
          <?php
            }

            if($this->session->flashdata('course_updated') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Course Updated
          </div>
          <?php
            }
            elseif($this->session->flashdata('course_updated') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error updating course! Please contact tech support.
          </div>
          <?php } ?>
      <div id="roles-table" class="col-12">

        <form action="<?=base_url('practise-filter')?>" method="post" class="card filter" <?php if(!empty($this->session->userdata('practise_filter'))) {?> style="display: block"<?php } else{?>  style="display: none;" <?php } ?>>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" name="filter_name" id="filter_name" placeholder="eg: Calicut" value="<?= $filter_data['name']?>">
                </div>
              </div>
             <!--  <div class="col-md-2 col-lg-2">
                <div class="form-group">
                  <label class="form-label">Status</label>
                  <select class="form-control" name="filter_status" id="filter_status">
                    <option selected="selected" value="">All</option>
                    <option value="1">Active</option>
                    <option value="2">Suspended</option>
                  </select>
                </div>
              </div> -->
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
            <h3 class="card-title">Questions</h3>
            <div class="ml-auto">
              <a href="#" id="filter-btn" class="btn ml-auto" data-toggle="tooltip" title="Filter"><i class="fa fa-filter"></i></a>
              <?php
                if($this->session->userdata('create')){
              ?>
                <a href="#" id="add-role-btn" class="btn btn-primary ml-auto">Add Questions</a>
              <?php
                }
              ?>
            </div>
          </div>
          <div class="table-responsive">
            <?php
                if(!empty($questions)){
            ?>
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                          <th class="w-1">#</th>
                          <th>Title</th>
<!--                           <th>Tags</th>
 --><!--                           <th>Created By</th>
 -->                          <!-- <th>Papers</th> -->
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>


                       <tbody>
                        <?php
                            $i=$offset+1;
                            foreach($questions as $data){
                            ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$data['question_code']?></td>
<!--                                 <td><?=$data['table_name']?></td>
 -->                                
<!--                             <td><?=$data['tags']?></td>
 -->
                                                    

<!--                                 <td><?=date('d-m-Y',$data['updated_on'])?></td>
 -->                                
<!--  <td><?=$data['admin_name']?></td>
 -->                               
                               
                                <td class="text-right">
                                    <?php
                                      if($this->session->userdata('view')){
                                    ?>
                                    <!--  <a href="<?=base_url('question-edit/'.$data['question_id'])?>" target="_blank" class="btn btn-primary btn-sm ">Edit</a> -->

                                    <a href="javascript:void(0)" data-id="<?=$data['question_id']?>" class="btn btn-info btn-sm edit-problem-btn">Edit</a>


                                    <a href="<?=base_url('view-details/'.$data['question_id'])?>" target="_blank" class="btn btn-primary btn-sm ">View</a>

                                      <a href="<?=base_url('questions_list_add/'.$data['question_id'])?>" data-id="<?=$data['question_id']?>" class="btn btn-success btn-sm ">Edit Problem</a>
                                    <?php
                                      }
                                    ?>
                                    <!-- <?php
                                      if($this->session->userdata('edit') || $this->session->userdata('admin_id')==$data['updated_by']){
                                    ?>
                                      <a href="javascript:void(0)" data-id="<?=$data['question_id']?>" class="btn btn-success btn-sm edit-question-btn">Edit</a>
                                       <a href="javascript:void(0)" style="background: #fd9644" data-id="<?=$data['question_id']?>" class="btn btn-success btn-sm clone-question-btn">Clone</a>
                                      
                                    <?php
                                      }
                                    ?> -->

                                        <?php
                                      if($this->session->userdata('delete')){
                                    ?>
                                    <a href="javascript:void(0)" data-id="<?=$data['question_id']?>" class="btn btn-danger btn-sm delete-question-btn">Delete</a>
                                  <?php } ?>
                                </td>
                            </tr>
                            <?php
                            }
                        ?>
                    </tbody>
                       
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
        <form action="<?=base_url('add-question-new')?>" method="post" class="card">
          <div class="card-header">
            <h3 class="card-title">Add Questions</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Question</label>
                  <input type="text" class="form-control" name="question" id="question" placeholder="Enter Name" required>
                </div>
              </div>

              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Tags</label>
<!--                   <input type="text" class="form-control" name="tags" id="tags" placeholder="Enter Name" required>
 -->

 <input type="text" class="form-control key-tags" id="input-tags4" name="qst_keywords"  placeholder="Enter Keywords">

                 </div>
              </div>

            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('questions_list')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto">Add</button>
            </div>
          </div>
        </form>
      </div>

      <!-- edit Form -->
      <div id="edit-course-form" class="col-12" style="display: none;">
        <form action="<?=base_url('edit-question-title')?>" method="post" class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Questions</h3>
            <input type="hidden" name="course_id" id="course_id" >
          </div>
          <div class="card-body">
          <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Questions</label>
                  <input type="text" class="form-control" name="edit_question" id="edit_question" placeholder="Enter Name" required>

                                    <input type="hidden" name="question_id" id="question_id">

                </div>



              </div>


                    <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Tags</label>
<!--                   <input type="text" class="form-control" name="tags" id="tags" placeholder="Enter Name" required>
 -->

 <input type="text" class="form-control key-tags" id="edit_qst_keywords" name="edit_qst_keywords"  placeholder="Enter Keywords">

                 </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('questions_list')?>" class="btn btn-link">Cancel</a>
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


<script type="text/javascript">
  var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons

    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'align': [] }],

    ['clean']                                         // remove formatting button
  ];

  var quill = new Quill('.editor', {
    theme: 'snow',   // Specify theme in configuration
    modules: {
      // Equivalent to { toolbar: { container: '#toolbar' }}
      toolbar: toolbarOptions
    }
  });

   quill.on('text-change', function(delta, oldDelta, source) {

    var elem = document.querySelector('.editor');
    var html_content=elem.children[0].innerHTML;
    var id=1;
    var order=0;




   // console.log(JSON.stringify(quill.getContents()));
  $(elem).parent().find('.editor_content').val(elem.children[0].innerHTML);
  });

</script>
<script type="text/javascript">
   function reset_filter(event)
   {
      var id = "practise_filter";

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
                  window.location.href = base_url+'questions_list';
              }
          }

      });
   }    

</script>