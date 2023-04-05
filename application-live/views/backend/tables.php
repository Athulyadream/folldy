<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
          <?php 
            if($this->session->flashdata('table_created') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Table Added
          </div>
          <?php
            }
            elseif($this->session->flashdata('table_created') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error unable to add table!
          </div>
          <?php
            }

            if($this->session->flashdata('table_updated') == 1){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-success text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Table Updated
          </div>
          <?php
            }
            elseif($this->session->flashdata('table_updated') == 2){
          ?>
          <div class="offset-lg-4 col-md-4 alert alert-danger text-center">
            <button type="button" class="close" data-dismiss="alert"></button>
            Error updating table! Please contact tech support.
          </div>
          <?php } ?>


          <style type="text/css">
            
            .count_sub{
/*   // display: none;
*/
        width: 50%;
          }

          </style>
      <div id="roles-table" class="col-12">

        <form action="<?=base_url('category-filter')?>" method="post" class="card filter" <?php if(!empty($this->session->userdata('category_filter'))) {?> style="display: block"<?php } else{?>  style="display: none;" <?php } ?>>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Table Name</label>
                  <input type="text" class="form-control" name="filter_name" id="filter_name" placeholder="eg: Trial Balance" value="<?= $filter_data['name']?>">
                </div>
              </div>
            <!--   <div class="col-md-2 col-lg-2">
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
            <h3 class="card-title">Tables</h3>
            <div class="ml-auto">
              <a href="#" id="filter-btn" class="btn ml-auto" data-toggle="tooltip" title="Filter"><i class="fa fa-filter"></i></a>
              <?php
                if($this->session->userdata('create')){
              ?>
                <a href="#" id="add-role-btn" class="btn btn-primary ml-auto">Add Table</a>
              <?php
                }
              ?>
            </div>
          </div>
          <div class="table-responsive">
            <?php
                if(!empty($tables)){
            ?>
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                          <th class="w-1">#</th>
                          <th>Name</th>
                          <th>Columns</th>
                          <th>Table width</th>
                          <th>Created On</th>
                          <th>Created By</th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=$offset+1;
                            foreach($tables as $data){
                            ?>
                              <tr>
                                <td><?=$i++?></td>
                                <td><?=$data['table_name']?></td>
                                <td><?=$data['table_columns']?></td>
                                 <td><?=$data['table_single_width']?></td>
                                <td><?=date('d-m-Y',$data['updated_on'])?></td>
                                <td><?=$data['admin_name']?></td>
                                <td class="text-right">
                                  <?php
                                    if($this->session->userdata('create')){
                                  ?>
                                    <a href="javascript:void(0)" data-id="<?=$data['table_id']?>" class="btn btn-success btn-sm edit-table-btn">Edit</a>
                                   
                                  <?php
                                    }
                                  if($this->session->userdata('delete')){
                                  ?>
                                     <a href="javascript:void(0)" data-id="<?=$data['table_id']?>" class="btn btn-danger btn-sm delete-table-btn">Delete</a>
                                  <?php
                                    }
                                    ?>
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
        <form action="<?=base_url('add-table')?>" method="post" class="card">
          <div class="card-header">
            <h3 class="card-title">Add Table</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Table Name <span style="color: red"> *</span></label>
                  <input type="text" class="form-control" name="table_name" id="table_name" placeholder="Enter Name" required>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Columns <span style="color: red"> *</span></label>
                  <input type="text" class="form-control numberonly" name="table_columns" id="table_columns" placeholder="Enter Number" required>
                </div>
              </div>
              <div class="col-md-4 col-lg-4">
                <div class="form-group">
                  <label class="form-label">Table Left Title</label>
                  <input type="text" class="form-control" name="table_left_title" id="table_left_title" placeholder="Enter Title">
                </div>
              </div>
              <div class="col-md-4 col-lg-4">
                <div class="form-group">
                  <label class="form-label">Table Right Title</label>
                  <input type="text" class="form-control" name="table_right_title" id="table_right_title" placeholder="Enter Title">
                </div>
              </div>
              <div class="col-md-4 col-lg-4">
                <div class="form-group">
                  <label class="form-label">Table width(for single preview)</label>
                  <input type="text" class="form-control" name="table_width" id="table_width" placeholder="Enter Table Width">
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Column One Name</label>
                  <input type="text" class="form-control" name="column_one_name" id="column_one_name" placeholder="Enter Column Name">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Two Name</label>
                  <input type="text" class="form-control" name="column_two_name" id="column_two_name" placeholder="Enter Column Name">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Three Name</label>
                  <input type="text" class="form-control" name="column_three_name" id="column_three_name" placeholder="Enter Column Name">
                </div>

                
                <div class="form-group">
                  <label class="form-label">Column Four Name</label>
                  <input type="text" class="form-control" name="column_four_name" id="column_four_name" placeholder="Enter Column Name">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Five Name</label>
                  <input type="text" class="form-control" name="column_five_name" id="column_five_name" placeholder="Enter Column Name">
                </div>

                <div class="form-group">
                  <label class="form-label">Column Six Name</label>
                  <input type="text" class="form-control" name="column_six_name" id="column_six_name" placeholder="Enter Column Name">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Seven Name</label>
                  <input type="text" class="form-control" name="column_seven_name" id="column_seven_name" placeholder="Enter Column Name">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Eight Name</label>
                  <input type="text" class="form-control" name="column_eight_name" id="column_eight_name" placeholder="Enter Column Name">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Nine Name</label>
                  <input type="text" class="form-control" name="column_nine_name" id="column_nine_name" placeholder="Enter Column Name">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Ten Name</label>
                  <input type="text" class="form-control" name="column_ten_name" id="column_ten_name" placeholder="Enter Column Name">
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Column One Width <span style="color: red"> *</span></label>
                  <input type="text" class="form-control numberonly" name="column_one_width" id="column_one_width" placeholder="Enter Column Width" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Column Two Width <span style="color: red"> *</span></label>
                  <input type="text" class="form-control numberonly" name="column_two_width" id="column_two_width" placeholder="Enter Column Width" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Column Three Width</label>
                  <input type="text" class="form-control numberonly" name="column_three_width" id="column_three_width" placeholder="Enter Column Width">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Four Width</label>
                  <input type="text" class="form-control numberonly" name="column_four_width" id="column_four_width" placeholder="Enter Column Width">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Five Width</label>
                  <input type="text" class="form-control numberonly" name="column_five_width" id="column_five_width" placeholder="Enter Column Width">
                </div>

                <div class="form-group">
                  <label class="form-label">Column Six Width</label>
                  <input type="text" class="form-control numberonly" name="column_six_width" id="column_six_width" placeholder="Enter Column Width">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Seven Width</label>
                  <input type="text" class="form-control numberonly" name="column_seven_width" id="column_seven_width" placeholder="Enter Column Width">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Eight Width</label>
                  <input type="text" class="form-control numberonly" name="column_eight_width" id="column_eight_width" placeholder="Enter Column Width">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Nine Width</label>
                  <input type="text" class="form-control numberonly" name="column_nine_width" id="column_nine_width" placeholder="Enter Column Width">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Ten Width</label>
                  <input type="text" class="form-control numberonly" name="column_ten_width" id="column_ten_width" placeholder="Enter Column Width">
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group" style="height:65px">
                  <label class="form-label">Calculate Sum</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input" name="column_one_check" id="column_one_check">
                    <span class="custom-control-label">Check</span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Calculate Sum</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input" name="column_two_check" id="column_two_check">
                    <span class="custom-control-label">Check</span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Calculate Sum</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input" name="column_three_check" id="column_three_check">
                    <span class="custom-control-label">Check</span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Calculate Sum</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input" name="column_four_check" id="column_four_check">
                    <span class="custom-control-label">Check</span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Calculate Sum</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input" name="column_five_check" id="column_five_check">
                    <span class="custom-control-label">Check</span>
                  </label>
                </div>

                <div class="form-group" style="height:65px">
                  <label class="form-label">Calculate Sum</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input" name="column_six_check" id="column_six_check">
                    <span class="custom-control-label">Check</span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Calculate Sum</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input" name="column_seven_check" id="column_seven_check">
                    <span class="custom-control-label">Check</span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Calculate Sum</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input" name="column_eight_check" id="column_eight_check">
                    <span class="custom-control-label">Check</span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Calculate Sum</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input" name="column_nine_check" id="column_nine_check">
                    <span class="custom-control-label">Check</span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Calculate Sum</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input" name="column_ten_check" id="column_ten_check">
                    <span class="custom-control-label">Check</span>
                  </label>
                </div>
              </div>


              <div class="col-md-3 col-lg-3">
                <div class="form-group" style="height:65px">
                  <label class="form-label">Create Sub table</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input sub-tab" name="column_sub_one_check" id="column_sub_one_check"  data-id="1">

                    <input type="hidden" class="form-control count_sub_col1" name="count_sub_one_column" id="count_sub_one_column" placeholder="Enter No of Columns">
                    <div id="sub_width1"></div>
                    <span class="custom-control-label"></span>
                  </label>


                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Create Sub table</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input sub-tab" name="column_sub_two_check" id="column_sub_two_check" data-id="2">
                    <input type="hidden" class="form-control count_sub_col2" name="count_sub_two_column" id="count_sub_two_column" placeholder="Enter No of Columns">
                    <!--  -->
                    <div id="sub_width2"></div>
                    <span class="custom-control-label"></span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Create Sub table</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input sub-tab" name="column_sub_three_check" id="column_sub_three_check" data-id="3">

                      <input type="hidden" class="form-control count_sub_col3" name="count_sub_three_column" id="count_sub_three_column" placeholder="Enter No of Columns">
                      <div id="sub_width3"></div>
                    
                     <span class="custom-control-label"></span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Create Sub table</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input sub-tab" name="column_sub_four_check" id="column_sub_four_check" data-id="4">
                     <input type="hidden" class="form-control count_sub_col4" name="count_sub_four_column" id="count_sub_four_column" placeholder="Enter No of Columns">
                     <div id="sub_width4"></div>
                    
                     <span class="custom-control-label"></span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Create Sub table</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input sub-tab" name="column_sub_five_check" id="column_sub_five_check" data-id="5">
                     <input type="hidden" class="form-control count_sub_col5" name="count_sub_five_column" id="count_sub_five_column" placeholder="Enter No of Columns">
                      <div id="sub_width5"></div>
                    
                     <span class="custom-control-label"></span>
                  </label>
                </div>

                <div class="form-group" style="height:65px">
                  <label class="form-label">Create Sub table</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input sub-tab" name="column_sub_six_check" id="column_sub_six_check" data-id="6">

                     <input type="hidden" class="form-control count_sub_col6" name="count_sub_six_column" id="count_sub_six_column" placeholder="Enter No of Columns">
                     <div id="sub_width6"></div>
                   
                     <span class="custom-control-label"></span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Create Sub table</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input sub-tab" name="column_sub_seven_check" id="column_sub_seven_check" data-id="7 ">
                      <input type="hidden" class="form-control count_sub_col7" name="count_sub_seven_column" id="count_sub_seven_column" placeholder="Enter No of Columns">
                    <div id="sub_width7"></div>

                     <span class="custom-control-label"></span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Create Sub table</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input sub-tab" name="column_sub_eight_check" id="column_sub_eight_check" data-id="8">
                    <input type="hidden" class="form-control count_sub_col7" name="count_sub_eight_column" id="count_sub_eight_column" placeholder="Enter No of Columns">
                    <div id="sub_width8"></div>
                    
                     <span class="custom-control-label"></span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Create Sub table</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input sub-tab" name="column_sub_nine_check" id="column_sub_nine_check" data-id="9">
                    <input type="hidden" class="form-control count_sub_col9" name="count_sub_nine_column" id="count_sub_nine_column" placeholder="Enter No of Columns">
                    <div id="sub_width9"></div>
                     <span class="custom-control-label"></span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Create Sub table</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input sub-tab" name="column_sub_ten_check" id="column_sub_ten_check" data-id="10">
                     <input type="hidden" class="form-control count_sub_col10" name="count_sub_ten_column" id="count_sub_ten_column" placeholder="Enter No of Columns">
                    <div id="sub_width10"></div>
                     <span class="custom-control-label"></span>
                  </label>
                </div>
            </div>



            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('tables')?>" class="btn btn-link">Cancel</a>
              <button type="submit" class="btn btn-primary ml-auto">Add</button>
            </div>
          </div>
        </form>
      </div>



<?php for ($i=0; $i <=10 ; $i++) { 
  ?>
        <div id="editModal<?=$i;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Sub Tables</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="form-group">
                    <label class="form-label">No columns</label>
                    <!-- new -->
                      <input type="text" class="form-control count_sub numberonly" name="count_sub<?=$i;?>" id="count_sub<?=$i;?>" placeholder="Enter No of Columns" data-id="<?=$i;?>">
                </div>

                <div class="column_width_div<?=$i;?>">
                
                </div>
              
            
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <!-- new -->
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="add_subtable_btn" class="btn btn-info add_subtable_btn" data-id="<?=$i;?>">Add</button>
      </div>
    </div>

  </div>
</div> 
<?php }  ?>


      <!-- edit Form -->
      <div id="edit-table-form" class="col-12" style="display: none;">
        <form action="<?=base_url('edit-table')?>" method="post" class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Table</h3>
            <input type="hidden" name="table_id" id="table_id" >
          </div>
          <div class="card-body">
          <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Table Name <span style="color: red"> *</span></label>
                  <input type="text" class="form-control" name="edit_table_name" id="edit_table_name" placeholder="Enter Name" required>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Columns <span style="color: red"> *</span></label>
                  <input type="text" class="form-control numberonly" name="edit_table_columns" id="edit_table_columns" placeholder="Enter Number" required>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Table Left Title</label>
                  <input type="text" class="form-control" name="edit_table_left_title" id="edit_table_left_title" placeholder="Enter Title">
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label class="form-label">Table Right Title</label>
                  <input type="text" class="form-control" name="edit_table_right_title" id="edit_table_right_title" placeholder="Enter Title">
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Column One Name</label>
                  <input type="text" class="form-control" name="edit_column_one_name" id="edit_column_one_name" placeholder="Enter Column Name">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Two Name</label>
                  <input type="text" class="form-control" name="edit_column_two_name" id="edit_column_two_name" placeholder="Enter Column Name">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Three Name</label>
                  <input type="text" class="form-control" name="edit_column_three_name" id="edit_column_three_name" placeholder="Enter Column Number">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Four Name</label>
                  <input type="text" class="form-control" name="edit_column_four_name" id="edit_column_four_name" placeholder="Enter Column Name">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Five Name</label>
                  <input type="text" class="form-control" name="edit_column_five_name" id="edit_column_five_name" placeholder="Enter Column Name">
                </div>

                <div class="form-group">
                  <label class="form-label">Column Six Name</label>
                  <input type="text" class="form-control" name="edit_column_six_name" id="edit_column_six_name" placeholder="Enter Column Name">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Seven Name</label>
                  <input type="text" class="form-control" name="edit_column_seven_name" id="edit_column_seven_name" placeholder="Enter Column Name">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Eight Name</label>
                  <input type="text" class="form-control" name="edit_column_eight_name" id="edit_column_eight_name" placeholder="Enter Column Name">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Nine Name</label>
                  <input type="text" class="form-control" name="edit_column_nine_name" id="edit_column_nine_name" placeholder="Enter Column Name">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Ten Name</label>
                  <input type="text" class="form-control" name="edit_column_ten_name" id="edit_column_ten_name" placeholder="Enter Column Name">
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label class="form-label">Column One Width <span style="color: red"> *</span></label>
                  <input type="text" class="form-control numberonly" name="edit_column_one_width" id="edit_column_one_width" placeholder="Enter Column Width" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Column Two Width <span style="color: red"> *</span></label>
                  <input type="text" class="form-control numberonly" name="edit_column_two_width" id="edit_column_two_width" placeholder="Enter Column Width" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Column Three Width</label>
                  <input type="text" class="form-control numberonly" name="edit_column_three_width" id="edit_column_three_width" placeholder="Enter Column Width">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Four Width</label>
                  <input type="text" class="form-control numberonly" name="edit_column_four_width" id="edit_column_four_width" placeholder="Enter Column Width">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Five Width</label>
                  <input type="text" class="form-control numberonly" name="edit_column_five_width" id="edit_column_five_width" placeholder="Enter Column Width">
                </div>

                <div class="form-group">
                  <label class="form-label">Column Six Width</label>
                  <input type="text" class="form-control numberonly" name="edit_column_six_width" id="edit_column_six_width" placeholder="Enter Column Width">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Seven Width</label>
                  <input type="text" class="form-control numberonly" name="edit_column_seven_width" id="edit_column_seven_width" placeholder="Enter Column Width">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Eight Width</label>
                  <input type="text" class="form-control numberonly" name="edit_column_eight_width" id="edit_column_eight_width" placeholder="Enter Column Width">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Nine Width</label>
                  <input type="text" class="form-control numberonly" name="edit_column_nine_width" id="edit_column_nine_width" placeholder="Enter Column Width">
                </div>
                <div class="form-group">
                  <label class="form-label">Column Ten Width</label>
                  <input type="text" class="form-control numberonly" name="edit_column_ten_width" id="edit_column_ten_width" placeholder="Enter Column Width">
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group" style="height:65px">
                  <label class="form-label">Calculate Sum</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input" name="edit_column_one_check" id="edit_column_one_check">
                    <span class="custom-control-label">Check</span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Calculate Sum</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input" name="edit_column_two_check" id="edit_column_two_check">
                    <span class="custom-control-label">Check</span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Calculate Sum</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input" name="edit_column_three_check" id="edit_column_three_check">
                    <span class="custom-control-label">Check</span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Calculate Sum</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input" name="edit_column_four_check" id="edit_column_four_check">
                    <span class="custom-control-label">Check</span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Calculate Sum</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input" name="edit_column_five_check" id="edit_column_five_check">
                    <span class="custom-control-label">Check</span>
                  </label>
                </div>

                <div class="form-group" style="height:65px">
                  <label class="form-label">Calculate Sum</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input" name="edit_column_six_check" id="edit_column_six_check">
                    <span class="custom-control-label">Check</span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Calculate Sum</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input" name="edit_column_seven_check" id="edit_column_seven_check">
                    <span class="custom-control-label">Check</span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Calculate Sum</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input" name="edit_column_eight_check" id="edit_column_eight_check">
                    <span class="custom-control-label">Check</span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Calculate Sum</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input" name="edit_column_nine_check" id="edit_column_nine_check">
                    <span class="custom-control-label">Check</span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Calculate Sum</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input" name="edit_column_ten_check" id="edit_column_ten_check">
                    <span class="custom-control-label">Check</span>
                  </label>
                </div>

              </div>



              <div class="col-md-3 col-lg-3">
                <div class="form-group" style="height:65px">
                  <label class="form-label">Create Sub table</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input sub-tab" name="column_sub_one_check" id="column_sub_one_edit"  data-id="1">

                    <input type="hidden" class="form-control count_sub_col1" name="count_sub_one_column" id="count_sub_one_column" placeholder="Enter No of Columns">
                    <div id="sub_width_edit1"></div>
                    <span class="custom-control-label"></span>
                  </label>


                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Create Sub table</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input sub-tab" name="column_sub_two_check" id="column_sub_two_edit" data-id="2">
                    <input type="hidden" class="form-control count_sub_col2" name="count_sub_two_column" id="count_sub_two_column" placeholder="Enter No of Columns">
                    <!--  -->
                    <div id="sub_width_edit2"></div>
                    <span class="custom-control-label"></span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Create Sub table</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input sub-tab" name="column_sub_three_check" id="column_sub_three_edit" data-id="3">

                      <input type="hidden" class="form-control count_sub_col3" name="count_sub_three_column" id="count_sub_three_column" placeholder="Enter No of Columns">
                      <div id="sub_width_edit3"></div>
                    
                     <span class="custom-control-label"></span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Create Sub table</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input sub-tab" name="column_sub_four_check" id="column_sub_four_edit" data-id="4">
                     <input type="hidden" class="form-control count_sub_col4" name="count_sub_four_column" id="count_sub_four_column" placeholder="Enter No of Columns">
                     <div id="sub_width_edit4"></div>
                    
                     <span class="custom-control-label"></span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Create Sub table</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input sub-tab" name="column_sub_five_check" id="column_sub_five_edit" data-id="5">
                     <input type="hidden" class="form-control count_sub_col5" name="count_sub_five_column" id="count_sub_five_column" placeholder="Enter No of Columns">
                      <div id="sub_width_edit5"></div>
                    
                     <span class="custom-control-label"></span>
                  </label>
                </div>

                <div class="form-group" style="height:65px">
                  <label class="form-label">Create Sub table</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input sub-tab" name="column_sub_six_check" id="column_sub_sixe_edit" data-id="6">

                     <input type="hidden" class="form-control count_sub_col6" name="count_sub_six_column" id="count_sub_six_column" placeholder="Enter No of Columns">
                     <div id="sub_width_edit6"></div>
                   
                     <span class="custom-control-label"></span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Create Sub table</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input sub-tab" name="column_sub_seven_check" id="column_sub_seven_edit" data-id="7 ">
                      <input type="hidden" class="form-control count_sub_col7" name="count_sub_seven_column" id="count_sub_seven_column" placeholder="Enter No of Columns">
                    <div id="sub_width_edit7"></div>

                     <span class="custom-control-label"></span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Create Sub table</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input sub-tab" name="column_sub_eight_check" id="column_sub_eight_edit" data-id="8">
                    <input type="hidden" class="form-control count_sub_col7" name="count_sub_eight_column" id="count_sub_eight_column" placeholder="Enter No of Columns">
                    <div id="sub_width_edit8"></div>
                    
                     <span class="custom-control-label"></span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Create Sub table</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input sub-tab" name="column_sub_nine_check" id="column_sub_nine_edit" data-id="9">
                    <input type="hidden" class="form-control count_sub_col9" name="count_sub_nine_column" id="count_sub_nine_column" placeholder="Enter No of Columns">
                    <div id="sub_width_edit9"></div>
                     <span class="custom-control-label"></span>
                  </label>
                </div>
                <div class="form-group" style="height:65px">
                  <label class="form-label">Create Sub table</label>
                  <label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">
                    <input type="checkbox" class="custom-control-input sub-tab" name="column_sub_ten_check" id="column_sub_ten_edit" data-id="10">
                     <input type="hidden" class="form-control count_sub_col10" name="count_sub_ten_column" id="count_sub_ten_column" placeholder="Enter No of Columns">
                    <div id="sub_width_edit10"></div>
                     <span class="custom-control-label"></span>
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('tables')?>" class="btn btn-link">Cancel</a>
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
   function reset_filter(event)
   {
      var id = "category_filter";

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
                  window.location.href = base_url+'tables';
              }
              
          }

      });
   }    

</script>
