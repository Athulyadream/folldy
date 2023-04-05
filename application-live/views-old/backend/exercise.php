<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
          <?php 
            if($this->session->flashdata('paper_created') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Exercise Added
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

        <?php if($this->session->userdata('chapter_id')){ ?>
         <div class="page-header" style="margin:0;">
            <h1 class="page-title">
                <a href="<?=base_url('course-exercise')?>"><i class="fa fa-chevron-left"> Back to Exercise</i></a>
            </h1>
        </div>
      <?php } else{ ?>
        <div class="page-header" style="margin:0;">
            <h1 class="page-title">
                <a href="<?=base_url('exercise-bank')?>"><i class="fa fa-chevron-left"> Back to Exercise</i></a>
            </h1>
        </div>
      <?php } ?>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Exercise</h3>
            <div class="ml-auto">
              <!-- <a href="#" id="filter-btn" class="btn ml-auto" data-toggle="tooltip" title="Filter"><i class="fa fa-filter"></i></a> -->
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
                if(!empty($exercise)){
            ?>
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                          <th class="w-1">#</th>
                          <th>Question</th>
                          <th>Option 1</th>
                          <th>Option 2</th>
                          <th>Option 3</th>
                          <th>Option 4</th>
                          <th>Correct Answer</th>
                          <th>Status</th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=$offset+1;
                            foreach($exercise as $data){
                            ?>
                              <tr>
                                <td><?=$i++?></td>
                                <td>
                                  <?php $text = $data['exercise_question'];
                                  $newtext = wordwrap($text, 40, "<br />\n");
                                  echo $newtext; 
                                  ?>
                                  </td>
                                <td>
                                  <?php $text = $data['exercise_answer1'];
                                  $newtext = wordwrap($text, 20, "<br />\n");
                                  echo $newtext; 
                                  ?>
                                  </td>
                                <td>
                                  <?php $text = $data['exercise_answer2'];
                                  $newtext = wordwrap($text, 20, "<br />\n");
                                  echo $newtext; 
                                  ?>
                                </td>
                                <td>
                                  <?php $text = $data['exercise_answer3'];
                                  $newtext = wordwrap($text, 20, "<br />\n");
                                  echo $newtext; 
                                  ?>
                                </td>
                                <td>
                                  <?php $text = $data['exercise_answer4'];
                                  $newtext = wordwrap($text, 20, "<br />\n");
                                  echo $newtext; 
                                  ?>
                                </td>
                                <td><?= 'Option '.$data['exercise_correct_answer']?></td>
                                <td>
                                  <?php
                                    if($data['exercise_status'] == 1){
                                    ?>
                                      <span class="status-icon bg-success"></span> Active
                                    <?php
                                    }
                                    else{
                                    ?>
                                      <span class="status-icon bg-warning"></span> Suspended
                                    <?php
                                    }
                                  ?>
                                </td>
                                <td>
                                  <a href="javascript:void(0)" data-id="<?=$data['exercise_id']?>" class="btn btn-secondary btn-sm edit-exercise-btn">Edit</a>
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
      <div id="add-role-form" class="col-12" style="display: none;">
        <form action="<?=base_url('add-exercise')?>" method="post" class="card" id="add-form">
          <div class="card-header">
            <h3 class="card-title">Add Exercise Questions</h3>
          </div>
          <div class="card-body">
            <div class="row">
             
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Question</label>
                   <textarea cols="3" rows="2" class="form-control"  name="question" id="question" required></textarea>
                </div>
                
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Option 1</label>
                    <input type="radio" class="custom-control" name="correct_answer" id="opt_1" value="1" required>
                    <input type="text" class="form-control" name="option1" id="option1" placeholder="Enter Option" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Option 3</label>
                    <input type="radio" class="custom-control" name="correct_answer" id="opt_3" value="3">
                    <input type="text" class="form-control" name="option3" id="option3" placeholder="Enter Option" required>
                  </div>
                  
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Option 2
                  <input type="radio" class="custom-control" name="correct_answer" id="opt_2" value="2">
                  <input type="text" class="form-control" name="option2" id="option2" placeholder="Enter Option" required>
                  
                  
                </div>
                <div class="form-group">
                    <label class="form-label">Option 4</label>
                    <input type="radio" class="custom-control" name="correct_answer" id="opt_4" value="4">
                    <input type="text" class="form-control" name="option4" id="option4" placeholder="Enter Option" required>
                  </div>
                
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <h5>NB : Click the correct answer </h5>
            <div class="d-flex">
              <a href="<?=base_url('exercise')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto add-btn">Add</button>
            </div>
          </div>
        </form>
      </div>

      <!-- edit Form -->
      <div id="edit-exercise-form" class="col-12" style="display: none;">
        <form action="<?=base_url('edit-exercise')?>" method="post" class="card">
          <div class="card-header">
            <h3 class="card-title">Exercise Questions</h3>
            <input type="hidden" name="edit_id" id="edit_id" >
          </div>
          <div class="card-body">
              <div class="row">
                

              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Question</label>
                   <textarea cols="3" rows="2" class="form-control"  name="edit_question" id="edit_question" required></textarea>
                </div>
                
              </div>
              
              
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Option 1</label>
                    <input type="radio" class="custom-control edit_correct_answer" name="edit_correct_answer" id="one" value="1" >
                    <input type="text" class="form-control" name="edit_option1" id="edit_option1" placeholder="Enter Option" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Option 3</label>
                    <input type="radio" class="custom-control" name="edit_correct_answer" id="three" value="3">
                    <input type="text" class="form-control" name="edit_option3" id="edit_option3" placeholder="Enter Option" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Status</label>
                    <label class="custom-control custom-checkbox custom-control-inline" style="margin-top: 10px;">
                      <input type="checkbox" class="custom-control-input" name="edit_status" id="edit_status">
                      <span class="custom-control-label">Active</span>
                    </label>
                  </div>
                  
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Option 2</label>
                  <input type="radio" class="custom-control" name="edit_correct_answer" id="two" value="2">
                  <input type="text" class="form-control" name="edit_option2" id="edit_option2" placeholder="Enter Option" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Option 4</label>
                    <input type="radio" class="custom-control" name="edit_correct_answer" id="four" value="4">
                    <input type="text" class="form-control" name="edit_option4" id="edit_option4" placeholder="Enter Option" required>
                  </div>
                
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('exercise')?>" class="btn btn-link">Cancel</a>
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