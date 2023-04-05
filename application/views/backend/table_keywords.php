<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
      <div id="roles-table" class="col-12">

        <div class="page-header" style="margin:0;">
            <h1 class="page-title">
                <a href="<?=base_url('questions')?>"><i class="fa fa-chevron-left"> Back to questions</i></a>
            </h1>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?=$qt['qt_name']?></h3>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                          <?php
                            $cols = $qt['qt_num_cols'];
                            $cols_name = array();
                            $cols_width = array();
                            foreach($qt_cols as $col){
                                array_push($cols_name,$col['col_name']);
                                array_push($cols_width,$col['col_width']);
                            }
                            foreach($qt_cols as $temp){
                            ?>
                              <th width="<?=$temp['col_width']?>"><?=$temp['col_name']?></th>
                            <?php
                            }
                          ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $r = 0;
                            if(!empty($qt_vals)){
                            for($i=0;$i<count($qt_vals)/$cols;$i++){
                                ?>
                                    <tr>
                                        <?php
                                            for($j=0;$j<$cols;$j++){
                                            ?>
                                                <td width="<?=$cols_width[$j]?>%">
                                                  <?=$qt_vals[$r]['val_value']?>
                                                  (<?=$qt_vals[$r]['val_help']?>)<br/>
                                                  (<?=$qt_vals[$r]['val_keys']?>)
                                                  <a href="javascript:void(0)" class="btn btn-default btn-sm add-qt-keys" data-id="<?=$qt_vals[$r]['val_id']?>">
                                                    <i class="fa fa-pencil"></i>
                                                  </a>
                                                </td>
                                            <?php
                                                $r++;
                                            }
                                        ?>
                                    </tr>
                                <?php
                            }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

      </div>
    </div>
  </div>
</div>

<div id="keyModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Field</h4>
      </div>
       <form name="" method="post" autocomplete="off">
      <div class="modal-body">
        <div class="row">
            <input type="hidden" id="qt_val_id">
            <div class="col-md-12 col-lg-12">
              <div class="form-group">
                  <label class="form-label">Field Value</label>
                  <input type="text" class="form-control" id="edit_transaction_value" name="edit_transaction_value" value="" placeholder="Enter Keywords">
              </div>
            </div>

            <div class="col-md-12 col-lg-12">
              <div class="form-group">
                  <label class="form-label">Help Text</label>
                  <!-- <input type="text" class="form-control" id="edit_help_text" name="edit_help_text" value="" placeholder="Enter Help Text"> -->
                  <textarea class="form-control" name="edit_help_text" id="edit_help_text" placeholder="Enter Text" rows="3"></textarea>
              </div>
            </div>
            <div class="col-md-12 col-lg-12">
              <div class="form-group">
                  <label class="form-label">Keywords</label>
                  <input type="text" class="form-control key-tags" id="input-tags4" name="edit_transaction_keywords"  placeholder="Enter Keywords">
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="add-qt-keys-btn" class="btn btn-info">Add</button>
      </div>
    </div>
  </form>

  </div>
</div>