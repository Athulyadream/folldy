 
    <link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.snow.css">


<style type="text/css">

.table thead th, .text-wrap table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
    border-right: 2px solid #dee2e6;
}

.table td, .text-wrap table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
        border-right: 2px solid #dee2e6;

}
  
  .tabs {
  display: flex;
  flex-wrap: wrap; 
}
.tabs li {
  order: 1; 
  display: block;
  padding: 1rem 2rem;
  margin-right: 0.2rem;
  cursor: pointer;
  background: #104861;
  font-weight: bold;
  transition: background ease 0.2s;
  list-style: none;
}
.tabs .tab {
  order: 99; 
/*   Put the tabs last
*/  flex-grow: 1;
  width: 100%;
  display: none;
  padding: 1rem;
  background: #fff;
}
.tabs input[type="radio"] {
  display: none;
}
.tabs input[type="radio"]:checked + label {
  background: #fff;
}
.tabs input[type="radio"]:checked + label + .tab {
  display: block;
}
.add_question_div{
  background: #607d8b87;
}

@media (max-width: 45em) {
  .tabs .tab,
  .tabs label {
    order: initial;
  }
  .tabs label {
    width: 100%;
    margin-right: 0;
    margin-top: 0.2rem;
  }
}

/**
 * Generic Styling
*/

</style>



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

        width: 50%;
          }

          </style>


          <div class="col-lg-12 col-md-9 col-sm-8 col-12">

            <ul class="tabs" style="margin-left: 277px;">
                           <li><a  style="color: white;" href="<?=base_url('questions_list')?>">Questions</a></li>
                                        

                            <li><a style="color: white;" href="<?=base_url('problem-format')?>">Problem format</a></li>

                            <li><a style="color: white;" href="<?=base_url('answers-preview')?>">Answers</a></li>


            </ul>



            <div class="row">

           




 <div class="col-lg-12 col-md-12 " style="min-height: 100px;">
                                            </div>








                       <div class="col-lg-2 col-md-12 " style="">

                        <input type="hidden" name="question_id" id="question_id" value="1">
                                            </div>




                       <div class="col-lg-8 col-md-12 add_table" style="display: block;">
                        <div class="col-md-6 col-lg-6" style="display: inline;">
                           <!-- <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#tableModal">Create 
                           
                           </button> -->
                      <button type="submit" class="btn btn-primary ml-auto create_table" style="">Create new</button>

                       <select class="form-control" name="choose_type" id="choose-table"  onchange="add_problem_format()" style="width: 80%;display: inline-block;">

<!--                       <option value="0">Text box</option>
                      <option value="1">Table</option>
                      <option value="2">Terms-para</option>
                     <option value="3">Terms-sentence</option> -->

                     <option value="0" selected disabled>Select</option>
                                <?php
                                    foreach($tables as $data){
                                        echo '<option value="'.$data['table_id'].'">'.$data['table_name'].'</option>';
                                    }
                                ?>

                    </select>
                    </div>

                   <!--    <div class="col-md-6">
                  
                    
                  </div> -->


                       


              </div>


                                     <div class="col-lg-7 col-md-12 show_table" style="display: none;">
                                      <input type="hidden" id="table_fr_id" value="0">

                                    <div class="card append-table">




                                   
                                    </div>



                                     

                                     </div>


                                     <div class="col-lg-3 col-md-4 choose_value_type" style="height: 232px;
    border: 1px solid rgba(0, 0, 0, 0.17);
    border-radius: 3px;display: none;" >

        <select class="form-control" name="choose_add_type" id="choose-add-type"  onchange="add_format_values()" style="width: 105%;">

                      <option value="0">Value/Text</option>
                      <option value="1">Help Text</option>
                      <option value="2">Help Image</option>
                     <option value="3">Keywords</option>

                   </select>
                   <div class="" style="height: 100px">

                     </div>


                                      <div class="">
                                      </div>


  <input type="hidden" name="column_value" id="column_value">
                               <input type="hidden" name="row_value" id="row_value">
                               <input type="hidden" name="sub_value" id="sub_value">


                   <div class="append_div">
                              
                               <input type="text" name="value_text" id="value_text" class="form-control value_text" data-type="text" onkeyup="insert_values(this)">



<!-- <input type="hidde" name="format_va">
 -->                   </div>



                                     </div>




              



            </div>



            <div>



              


            </div>
          </div>
<!-- 
          <div class="tabs">



   
<input type="radio" name="tabs" id="Questions" checked="checked">
  <label for="<?=$lang['language_code']?>"><?=$lang['language_name'];?></label>
  <label for="1">hjdfhdf</label>

   <div class="tab">
     <div id="roles-table" class="col-12">
        <div class="card">
          <div class="card-header" style="display: block">
          </div>
          
          <div class="row">
            <div class="col-md-6 col-lg-4">
         
            </div>

            <div class="col-md-6 col-lg-8 text-center">
              
          <p>xchjjxchxc</p>
           
          
            </div>
          </div>



          <div class="card-footer text-right">
            <div class="d-flex">
              <a href="<?=base_url('vendor/products')?>" class="btn btn-link">Go Back</a>
            </div>
          </div>
          
        </div>
      </div>



  </div>



   

</div>
    
      





      <!-- edit Form -->
     
      <!-- /edit form -->
    </div>
  </div>
</div>





</div>
<!--     <script src="<?php echo base_url();?>assets/js/quill.js" type="text/javascript" ></script>
 -->



<div id="tableModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width:800px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Table</h4>
      </div>
      <div class="modal-body">
                        <form id="col-form">



            <div class="row" id="define-cols-div" style="">
                <div class="col-lg-12" id="col-div" style="">
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Table Name</label>
                            <input type="text" class="form-control" name="table_name" placeholder="Enter Name" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Columns</label>
                            <input type="text" class="form-control numberonly col_no" name="col_no" value="" placeholder="Enter Width" required>
                        </div>
                    </div>

                      <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Left Name</label>
                            <input type="text" class="form-control " name="left_name" value="" placeholder="Enter Width" required>
                        </div>
                    </div>


                        <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Right Name</label>
                            <input type="text" class="form-control " name="right_name" value="" placeholder="Enter Width" required>
                        </div>
                    </div>

                </div>

                        <div class="col-md-12" id="col_appnd_div" style="">




                       </div>





            </div>
          </form>





<!--  -->
   <!--      <form id="col-form">
            <input type="hidden" name="qt_id" class="qt_id1">
            <div class="row" id="define-cols-div" style="display:none;">
                <div class="col-lg-12" id="col-div" style="display:flex;">
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Column Name</label>
                            <input type="text" class="form-control" name="col_name[]" placeholder="Enter Name" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Column Width</label>
                            <input type="text" class="form-control numberonly" name="col_width[]" value="" placeholder="Enter Width" required>
                        </div>
                    </div>
                </div>
            </div>
        </form> -->
        <input type="hidden" id="row-data">
        <div id="row-data-edit" style="display: none;"></div>
        <form id="row-form">
            <input type="hidden" name="cols" id="cols">
            <!-- <input type="hidden" name="qt_id" class="qt_id"> -->
             <input type="hidden" name="tab_id" class="tab_id">
<!--              <input type="hidden"  value="<?php echo $question['question_id'];?>" name="qt_id" class="qt_id">
 -->             
            <div class="row" id="define-row-div" style="display:none;">

            </div>
        </form>
      </div>
      <div class="modal-footer">
        <div id="btn-one">
            <button type="button" id="cancel-qt-btn" class="btn btn-default">Cancel</button>
                        <button type="button" id="create-tbl-btn" class="btn btn-info">Create</button>

            <button type="button" id="add-ans-btn" class="btn btn-info" data-id="">Add Values</button>
        </div>
        <!-- <div id="btn-two" style="display:none;">
            <button type="button" id="prev-qt-btn" class="btn btn-default">Prev</button>
            <button type="button" id="add-col-btn" class="btn btn-info">Next</button>
        </div> -->
        <div id="btn-three" style="display:none;">
<!--             <button type="button" id="prev-col-btn" class="btn btn-default">Prev</button>
 -->            <button type="button" id="remove-qtable-btn" class="btn btn-warning">Cancel</button>
            <button type="button" id="add-ans_tbl-btn" class="btn btn-info add-ans-save">Save</button>
        </div>
      </div>
    </div>

  </div>
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
                      <input type="text" class="form-control count_sub" name="count_sub<?=$i;?>" id="count_sub<?=$i;?>" placeholder="Enter No of Columns" data-id="<?=$i;?>">
                </div>

                <div class="column_width_div<?=$i;?>">

                
                </div>
              
            
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="add_subtable_btn" class="btn btn-info add_subtable_btn" data-id="<?=$i;?>">Add</button>
      </div>
    </div>

  </div>
</div> 
<?php }  ?>
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


      //  console.log(elem.children[0].innerHTML);


       $.ajax({
            url:base_url+'add-question-text',
            type:'post',
            data:{html_content:html_content,id:id,order:order},
            success: function(out){
                var out = JSON.parse(out);
                if(out.status == 1){

                    // $('.qt_id'+q_id+'').val(out.data);
                    // $('.qt-tabl-name'+q_id+'').html(name);
                    // $('#cols'+q_id+'').val(nos);

                    // var html = $('#col-div'+q_id+'').html();
                    // for(var i=0;i<nos-1;i++){
                    //     $('#col-div'+q_id+'').after('<div class="col-lg-12" style="display:flex;">'+html+'</div>');
                    // }
                    // $('#define-table-div'+q_id+'').hide();
                    // $('#btn-one'+q_id+'').hide();
                    // $('#define-cols-div'+q_id+'').show();
                    // $('#btn-two'+q_id+'').show();
                }
                else{
                    alert('Oops something went wrong! Please try again');
                }
            }
        })


   // console.log(JSON.stringify(quill.getContents()));
  $(elem).parent().find('.editor_content').val(elem.children[0].innerHTML);
  });



  $(document).on('click',".add-type",function (e) {

  alert($("#choose_type option:selected" ).val());
  

  if($("#choose_type option:selected" ).val()=="0"){
       
       
  }else if($( "#choose_type option:selected" ).val()=="1"){
        $('.add_table').show();
        $('.text-box').hide();

    
    $('.add_table').show();

  }else if($( "#choose_type option:selected" ).val()=="2"){

  }



        // Allow: backspace, delete, tab, escape, enter and .
        // if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
        //     // Allow: Ctrl+A, Command+A
        //     (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
        //     // Allow: home, end, left, right, down, up
        //     (e.keyCode >= 35 && e.keyCode <= 40)) {
        //     // let it happen, don't do anything
        //     return;
        // }
        // // Ensure that it is a number and stop the keypress
        // if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        //     e.preventDefault();
        // }
    });


   $('#choose_type').change(function(){

       var cr_id = $(this).val();


       if(table){
        $.ajax({
            url:base_url+'get_answer_table',
            type:'post',
            data:{table:table,q_id:q_id},
            success: function(out){
                var out = JSON.parse(out);
                if(out.status == 1){


                     var data1=out.data.table;
                     var cols=data1.table_columns;
                     
                     var answer=out.data.answer;
                     var answer_sub=out.data.answer_sub;
                     
                     $('#tableModal').find('.modal-dialog').css('max-width','1200px');
                     var name_array=[data1.column_one_name,data1.column_two_name,data1.column_three_name,data1.column_four_name,data1.column_five_name,
                     data1.column_six_name,data1.column_seven_name,data1.column_eight_name,data1.column_nine_name,data1.column_ten_name,
                     ];
                        var count_array=[data1.count_one_table,data1.count_two_table,data1.count_three_table,data1.count_four_table,data1.count_five_table,
                     data1.count_six_table,data1.count_seven_table,data1.count_eight_table,data1.count_nine_table,data1.count_ten_table,
                     ];

                     var amnt_array=[data1.column_one_sum,data1.column_two_sum,data1.column_three_sum,data1.column_four_sum,data1.column_five_sum,
                     data1.column_six_sum,data1.column_seven_sum,data1.column_eight_sum,data1.column_nine_sum,data1.column_ten_sum,
                     ];

                    

                    var out = '';
                                        var edit_html = '';

                    var num = 2;
                     var num2 = 1;
                    if(cols>5) num = 1;

                                                for(var i=0;i<cols;i++){

                                                }



                    

                   
                    

                    
                       

                    


                        //}
                       
                //  }

                    
                      // var num2 = 1;
                    // out += '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label">Keywords</label><input type="text" class="form-control key-tags" name="val_keys[]" value="" placeholder="Enter Keywords"></div></div><div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-plus-btn"><i class="fa fa-plus"></i></button></div></div></div>';
                    // out += '<div class="col-md-'+num2+' col-lg-'+num2+'"><div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-plus-btn-new"><i class="fa fa-plus"></i></button></div></div><p style="    margin-top: 38px;">(Please check for underline answers)</p></div>';
                    $('#row-data').val(out);


                 $('#row-data-edit').html(edit_html);

      
                    $('#define-row-div').html(out);


                    $('#cols').val(cols);
                     $('.tab_id').val(table);

                     $('#define-table-div').hide();
                    $('#btn-one').hide();

                      $('#define-cols-div').hide();
                    $('#btn-two').hide();
                    $('#define-row-div').show();
                    $('#btn-three').show();
                    //$('#add-ans_tbl-btn')
                    

                    
                    // $('.qt_id').val(out.data);
                    // $('.qt-tabl-name').html(name);
                    // $('#cols').val(nos);
                    // var html = $('#col-div').html();
                    // for(var i=0;i<nos-1;i++){
                    //     $('#col-div').after('<div class="col-lg-12" style="display:flex;">'+html+'</div>');
                    // }
                    // $('#define-table-div').hide();
                    // $('#btn-one').hide();
                    // $('#define-cols-div').show();
                    // $('#btn-two').show();
                }
                else{
                    alert('Oops something went wrong!');
                }
            }
        })
    }
    else if(!name){
        $('#table_id').focus();
    }



        });


    $(document).on('click',".create_table",function (e) {

      $('#tableModal').show();

    });



     $(document).on('focusout',".col_no",function (e) {
      var num=$(this).val();

          //  alert(num);

      var html='';

      for (var i = 0; i <
       num; i++) {

        html+='<div class="col-md-12" style="display: flex;" ><div class="col-md-3 col-lg-3"><div class="form-group"><label class="form-label">Column  Name</label> <input type="text" class="form-control col_name" name="column_name'+i+'" id="column_one_name" placeholder="Enter Column Name"></div></div>'+
        '<div class="col-md-3 col-lg-3"><div class="form-group"><label class="form-label">Column  Width</label><input type="text" class="form-control numberonly col_width" name="column_width'+i+'" id="column_width'+i+'" placeholder="Enter Column Width" required></div></div><div class="col-md-3 col-lg-3"><div class="form-group" style="height:65px"><label class="form-label">Calculate Sum</label><label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px"><input type="checkbox" class="custom-control-input column-check" name="column_check'+i+'" id="column_one_check"><span class="custom-control-label">Check</span></label></div></div><div class="col-md-3 col-lg-3">'+
                '<div class="form-group" style="height:65px">'+
                  '<label class="form-label">Create Sub table</label>'+
                  '<label class="custom-control custom-checkbox custom-control-inline" style="margin-top:5px">'+
                    '<input type="checkbox" class="custom-control-input sub-tab" name="column_sub_check'+i+'" id="column_sub_one_check"  data-id="1">'+

                    '<input type="hidden" class="form-control count_sub_col'+i+'" name="count_sub_'+i+'_column" id="count_sub_one_column" placeholder="Enter No of Columns" >'+
                    '<div id="sub_width'+i+'"></div>'+
                    '<span class="custom-control-label"></span>'+
                  '</label></div></div></div>';
        

         


      }

      $('#col_appnd_div').html(html);

      //$('#tableModal').show();



    });



         



     $(document).on('click','.sub-tab',function(){
 var id = $(this).attr('data-id');

 $('#editModal'+id+'').modal('show');

})


     $(document).on('click','.add_subtable_btn',function(){

    var id = $(this).data('id');
    var count=$('.count_sub[data-id="'+id+'"]').val();
   //var htm=$('.column_width_div'+id+'').html();
    var htm='';
    var val='';
    var sum='';
   for(var i = 1; i <= count; i++) {

           val +=$('#col_width'+i+'[data-id="'+id+'"] ').val()+','; 
           //console.log($('#col_sub_sum_check'+i+'[data-id="'+id+'"]').val());
           //if($('#checkMeOut').prop('checked')) {
           if($('#col_sub_sum_check'+i+'[data-id="'+id+'"]').prop('checked')){

            sum +='1'+','; 
           }else{
            sum +='0'+','; 
           }

          // sum +=$('#col_sub_sum_check'+i+'[data-id="'+id+'"] ').val()+','; 

          // var value = $('#transaction_ids'+q_id+'').val();
                    // if(value) $('#transaction_ids'+q_id+'').val(value+','+out.data);
                    // else $('#transaction_ids'+q_id+'').val(out.data);
          
      
    }

      htm+='<div class="form-group">'+
            '<input type="hidden" class="form-control col_width'+id+'" name="col_width'+id+'" id="col_width'+id+'" placeholder="Enter No of Columns" value="'+val+'">'+
            '<input type="hidden" class="form-control col-sub-sum'+id+'" name="col_sub_sum'+id+'" id="col_sub_sum'+id+'" placeholder="Enter No of Columns" value="'+sum+'">'+

            '</div>' ;

   
     $('.count_sub_col'+id+'').val(count);
   $('#sub_width'+id+'').html(htm);
   $('#sub_width_edit'+id+'').html(htm);
   $('#editModal'+id+'').modal('hide');

})





$(document).on('click','#create-tbl-btn',function(){
     var q_id = $(this).data('id');
    var cols = $(this).parent().parent().parent().parent().parent().find('.col_name').each(function(){
        return $(this);
        console.log($(this));
    });
    var wids = $(this).parent().parent().parent().parent().parent().find('.col_width').each(function(){
        return $(this);
    });

var splashArray = new Array();

    //  $(this).parent().parent().parent().parent().parent().find('input[name="column_one_check[]"]').each(function(){
       

    // });


    // var cols_err = 1;
    // var wids_err = 1;
    // for(var i=0;i<cols.length;i++){
    //     // if(!$.trim(cols[i].value)){
    //     //     cols_err = 0;
    //     //     cols[i].focus();
    //     //     break;
    //     // }
    //     if(!$.trim(wids[i].value)){
    //         wids_err = 0;
    //         wids[i].focus();
    //         break;
    //     }
    // }


   console.log(cols.length);

   $('#col-form').find(':checkbox:not(:checked)').attr('value', '0').prop('checked', true);

var formData=$('#col-form').serialize();



//     $.each($('form input[type=checkbox]')
//     .filter(function(idx){
//         return $(this).prop('checked') === false
//     }),
//     function(idx, el){
//         // attach matched element names to the formData with a chosen value.
//         var emptyVal = "1";
//         formData += '&' + $(el).attr('name') + '=' + emptyVal;
//     }
// );



 $('#col-form input:checkbox').each(function(){
         splashArray.push($(this).val());
    });

 console.log(splashArray);


//console.log(splashArray[0]);
    //console.log(formData['column_one_check']) ;

   
   // if(wids_err){

        $.ajax({
            url:base_url+'add-table-ajax',
            type:'post',
            data:formData,
            success: function(out){
                var out = JSON.parse(out);
                if(out.status==1){
                  var table_id=out.data;
console.log(table_id);
                  // $('#add-ans-btn').data(out);
                  // var table_id=out.data;
                  $('#add-ans-btn').data('id', table_id);


                  alert('Table added successfully');
                 //    $('#tableModal').find('.modal-dialog').css('max-width','1200px');
                 //    var out = '<div class="col-lg-12 rows" id="col-div" style="display:flex;">';
                 //    var num = 2;
                 //    if(cols.length>5) num = 1;
                 //    for(var i=0;i<cols.length;i++){

                 //        if(splashArray[i]=='1'){

                 //        var html = '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">'+cols[i].value+'</label>'+
                 //        '<input type="text" class="form-control number" name="row_value[]" placeholder="Enter Value" required></div></div>';

                 //        }else{
                 //            var html = '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">'+cols[i].value+'</label>'+
                 //        '<input type="text" class="form-control " name="row_value[]" placeholder="Enter Value" required></div></div>';
                 //        }

                            

                 //        out += html;
                 //    }
                 //    // out += '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label">Keywords</label><input type="text" class="form-control key-tags" name="val_keys[]" value="" placeholder="Enter Keywords"></div></div><div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-plus-btn"><i class="fa fa-plus"></i></button></div></div></div>';
                 //    out += '<div class="col-md-'+num+' col-lg-'+num+'">'+
                 //    '<div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-plus-btn" data-id="'+q_id+'">'+
                 //    '<i class="fa fa-plus"></i></button></div></div></div>';


                 // console.log(out);
                 //    $('#row-data').val(out);
                 //    $('#define-row-div').html(out);
                 //    // $(document).find('.key-tags').each(function(){
                 //    //     $(this).selectize({
                 //    //         delimiter: ',',
                 //    //         persist: false,
                 //    //         create: function(input) {
                 //    //             return {
                 //    //                 value: input,
                 //    //                 text: input
                 //    //             }
                 //    //         }
                 //    //     });
                 //    // })
                 //    $('#define-cols-div').hide();
                 //    $('#btn-two').hide();
                 //    $('#define-row-div').show();
                 //    $('#btn-three').show();
                }
                else{
                    alert('Oops something went wrong!');
                }
            }
        })
   // }
})



$(document).on('click','#add-ans-btn',function(){
     //var table = $.trim($('#table_id').val());

          var table = $.trim($(this).data('id'));


      var q_id = 0;
   // var nos = $.trim($('#table_cols').val());
    if(table){
        $.ajax({
            url:base_url+'get_answer_table',
            type:'post',
            data:{table:table,q_id:q_id},
            success: function(out){
                var out = JSON.parse(out);
                if(out.status == 1){


                     var data1=out.data.table;
                     var cols=data1.table_columns;
                     
                     var answer=out.data.answer;
                     var answer_sub=out.data.answer_sub;
                     
                     $('#tableModal').find('.modal-dialog').css('max-width','1200px');
                     var name_array=[data1.column_one_name,data1.column_two_name,data1.column_three_name,data1.column_four_name,data1.column_five_name,
                     data1.column_six_name,data1.column_seven_name,data1.column_eight_name,data1.column_nine_name,data1.column_ten_name,
                     ];
                        var count_array=[data1.count_one_table,data1.count_two_table,data1.count_three_table,data1.count_four_table,data1.count_five_table,
                     data1.count_six_table,data1.count_seven_table,data1.count_eight_table,data1.count_nine_table,data1.count_ten_table,
                     ];

                     var amnt_array=[data1.column_one_sum,data1.column_two_sum,data1.column_three_sum,data1.column_four_sum,data1.column_five_sum,
                     data1.column_six_sum,data1.column_seven_sum,data1.column_eight_sum,data1.column_nine_sum,data1.column_ten_sum,
                     ];

                    

                    var out = '';
                                        var edit_html = '';

                    var num = 2;
                     var num2 = 1;
                    if(cols>5) num = 1;


                    if(answer.length>0){

//console.log(answer);  
//var out='';
 var out='<p style="">(Please check for underline answers)</p>';
    var id_new=0;

                        for (var j = 0; j <= answer.length-1; j++) {
                            

              
                            out += '<div class="col-lg-12 rows" id="col-div" style="display:flex;">';  
          var html='';
                            for(var i=0;i<cols;i++){
                                 var value_array=[answer[j].column_one_value,answer[j].column_two_value,answer[j].column_three_value,answer[j].column_four_value,answer[j].column_five_value,
                      answer[j].column_six_value,answer[j].column_seven_value,answer[j].column_eight_value,answer[j].column_nine_value,answer[j].column_ten_value,
                     ];


                        var underline_array=[answer[j].column_one_underline,answer[j].column_two_underline,answer[j].column_three_underline,answer[j].column_four_underline,answer[j].column_five_underline,
                      answer[j].column_six_underline,answer[j].column_seven_underline,answer[j].column_eight_underline,answer[j].column_nine_underline,answer[j].column_ten_underline,
                     ];

                  if(amnt_array[i]==1){
                        var cls='number';
                    }else{
                        var cls=''
                    }

                                      if(count_array[i]!=0){


                                             html='<div class="col-md-'+num+' col-lg-'+num+'"><input type="hidden" class="form-control" name="row_count_'+i+'[]" value="'+count_array[i]+'" placeholder="Enter Value" >';

                                    for(var k=0;k<count_array[i];k++){


                                                for (var b = 0; b <= answer_sub.length-1; b++) {
                                        



                                            if(answer_sub[b].column_id==i+1){
                                                 if(answer_sub[b].rows==j){ 

                                                     if (id_new!=answer_sub[b].id){

                                                        id_new=answer_sub[b].id;
 // console.log(j);

                                                       html += '<div class="form-group"><label class="form-label row_name">'+name_array[i]+'</label><input type="text" class="form-control '+cls+'" name="row_value_'+i+k+'[]"  placeholder="Enter Value" value="'+answer_sub[b].ans_values+'" required>';
                                                        if(answer_sub[b].is_underline=="1"){
                                                     html += '<input type="checkbox" class="form-control1 is_underline" name="is_underline_'+i+k+'[]"    id="is_underline" style="margin: 12px;" value="1" checked="checked"></div>';
                                                         }else{
                                                        html += '<input type="checkbox" class="form-control1 is_underline" name="is_underline_'+i+k+'[]"    id="is_underline" style="margin: 12px;" value="1" ></div>';
 
                                                         }

                                                   b=answer_sub.length-1;

                                                    }

                                                 }

                                            }
                                            
                                       }

                                        // console.log(count_array[i]);

                            //  html += '<div class="form-group"><label class="form-label row_name">'+name_array[i]+'</label><input type="text" class="form-control" name="row_value_'+i+k+'[]"  placeholder="Enter Value" value="" required>';
                            // html += '<input type="checkbox" class="form-control1 is_underline" name="is_underline_'+i+k+'[]"    id="is_underline" style="margin: 12px;" value="1"></div>';

                 
                                    }
                                html+='</div>';

                                    out += html; 

                                      }else{


                var html = '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">'+name_array[i]+'</label><input type="text" class="form-control '+cls+'" name="row_value_'+i+'[]"  placeholder="Enter Value" value="'+value_array[i]+'" required><input type="hidden" class="form-control" name="row_count_'+i+'[]" value="'+count_array[i]+'" placeholder="Enter Value" >';
 if(underline_array[i]=="1"){

                html += '<input type="checkbox" class="form-control1" name="is_underline'+i+'[]"    id="is_underline" style="margin: 12px;" value="1" checked="checked"></div></div>';
            }else{
            html += '<input type="checkbox" class="form-control1" name="is_underline'+i+'[]"    id="is_underline" style="margin: 12px;" value="1"></div></div>';
  
            }                out += html; 

                                      }

                                   // console.log(value_array[i]);
                

                      
                // html += '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">'+name_array[i]+'</label><input type="text" class="form-control" name="row_value_'+i+'[]" value="'+value_array[i]+'" placeholder="Enter Value" required><input type="hidden" class="form-control" name="row_count_'+i+'[]" value="" placeholder="Enter Value" >';

                //  html += '<input type="checkbox" class="form-control1" name="is_underline'+i+'[]"    id="is_underline" style="margin: 12px;"></div></div>';
                     
                          }
                        //  out += html;  





                    out += '<div class="col-md-'+num2+' col-lg-'+num2+'"><div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-minus-btn-new-pre" data-id="'+answer[j].id+'"><i class="fa fa-minus"></i></button></div></div></div>';
                        

                         }
                 out += '<div class="col-md-'+num2+' col-lg-'+num2+'"><button class="btn btn-info row-plus-btn-edit" data-id=""><i class="fa fa-plus"></i></button></div>';


                         $("#add-ans_tbl-btn").html('Edit');
                    
                     $('.add-ans-save').attr('id','edit-ans-save'); 




                     edit_html += '<p >(Please check for underline answers)</p><div class="col-lg-12 rows" id="col-div" style="display:flex;">';         
                for(var i=0;i<cols;i++){


                    if(amnt_array[i]==1){
                        var cls='number';
                    }else{
                        var cls=''
                    }

                     if(count_array[i]!=0){
                        html_edit='<div class="col-md-'+num+' col-lg-'+num+'"><input type="hidden" class="form-control" name="row_count_'+i+'[]" value="'+count_array[i]+'" placeholder="Enter Value" >';

                    for(var k=0;k<count_array[i];k++){
                        // console.log(count_array[i]);

             html_edit += '<div class="form-group"><label class="form-label row_name">'+name_array[i]+'</label><input type="text" class="form-control '+cls+'" name="row_value_'+i+k+'[]"  placeholder="Enter Value" required>';
            html_edit += '<input type="checkbox" class="form-control1 is_underline" name="is_underline_'+i+k+'[]"    id="is_underline" style="margin: 12px;" value="1"></div>';

 
                    }
                html_edit+='</div>';

                    edit_html += html_edit; 
                }

                else{
                var html_edit = '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">'+name_array[i]+'</label><input type="text" class="form-control '+cls+'" name="row_value_'+i+'[]"  placeholder="Enter Value" required><input type="hidden" class="form-control" name="row_count_'+i+'[]" value="'+count_array[i]+'" placeholder="Enter Value" >';
                html_edit += '<input type="checkbox" class="form-control1" name="is_underline'+i+'[]"    id="is_underline" style="margin: 12px;" value="1"></div></div>';
                edit_html += html_edit; 

                }

                   
                    

                    
                       } 

                    edit_html += '<div class="col-md-'+num2+' col-lg-'+num2+'"><div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-minus-btn-new"><i class="fa fa-minus"></i></button></div></div></div>';



////////////////////////////
                     }

                
                      else{
            out += '<p >(Please check for underline answers)</p><div class="col-lg-12 rows" id="col-div" style="display:flex;">';         
                for(var i=0;i<cols;i++){

                    if(amnt_array[i]==1){
                        var cls='number';
                    }else{
                        var cls=''
                    }
                    console.log(cls);
                     if(count_array[i]!=0){
                        html='<div class="col-md-'+num+' col-lg-'+num+'"><input type="hidden" class="form-control" name="row_count_'+i+'[]" value="'+count_array[i]+'" placeholder="Enter Value" >';

                    for(var k=0;k<count_array[i];k++){
                        // console.log(count_array[i]);

             html += '<div class="form-group"><label class="form-label row_name">'+name_array[i]+'</label><input type="text" class="form-control '+cls+'" name="row_value_'+i+k+'[]"  placeholder="Enter Value" required>';
            html += '<input type="checkbox" class="form-control1 is_underline" name="is_underline_'+i+k+'[]"    id="is_underline" style="margin: 12px;" value="1"></div>';

 
                    }
                html+='</div>';

                    out += html; 
                }

                else{
                var html = '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">'+name_array[i]+'</label><input type="text" class="form-control '+cls+'" name="row_value_'+i+'[]"  placeholder="Enter Value" required><input type="hidden" class="form-control" name="row_count_'+i+'[]" value="'+count_array[i]+'" placeholder="Enter Value" >';
                html += '<input type="checkbox" class="form-control1" name="is_underline'+i+'[]"    id="is_underline" style="margin: 12px;" value="1"></div></div>';
                out += html; 

                }

                   
                    

                    
                       } 

                    out += '<div class="col-md-'+num2+' col-lg-'+num2+'"><div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-plus-btn-new"><i class="fa fa-plus"></i></button></div></div></div>';


                        }
                       
                //  }

                    
                      // var num2 = 1;
                    // out += '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label">Keywords</label><input type="text" class="form-control key-tags" name="val_keys[]" value="" placeholder="Enter Keywords"></div></div><div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-plus-btn"><i class="fa fa-plus"></i></button></div></div></div>';
                    // out += '<div class="col-md-'+num2+' col-lg-'+num2+'"><div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-plus-btn-new"><i class="fa fa-plus"></i></button></div></div><p style="    margin-top: 38px;">(Please check for underline answers)</p></div>';
                    $('#row-data').val(out);


                 $('#row-data-edit').html(edit_html);

      
                    $('#define-row-div').html(out);


                    $('#cols').val(cols);
                     $('.tab_id').val(table);

                     $('#define-table-div').hide();
                    $('#btn-one').hide();

                      $('#define-cols-div').hide();
                    $('#btn-two').hide();
                    $('#define-row-div').show();
                    $('#btn-three').show();
                    //$('#add-ans_tbl-btn')
                    

                    
                    // $('.qt_id').val(out.data);
                    // $('.qt-tabl-name').html(name);
                    // $('#cols').val(nos);
                    // var html = $('#col-div').html();
                    // for(var i=0;i<nos-1;i++){
                    //     $('#col-div').after('<div class="col-lg-12" style="display:flex;">'+html+'</div>');
                    // }
                    // $('#define-table-div').hide();
                    // $('#btn-one').hide();
                    // $('#define-cols-div').show();
                    // $('#btn-two').show();
                }
                else{
                    alert('Oops something went wrong!');
                }
            }
        })
    }
    else if(!name){
        $('#table_id').focus();
    }
    
})


function add_problem_format(){

  var table_id=$('#choose-table').val();
 

  $.ajax({
            url:base_url+'add-problem-format',
            type:'post',
            data:{table_id:table_id},
            success: function(out){
                var out = JSON.parse(out);
                if(out.status==1){
                  var columns=out.data.table_columns;
                  var table_id=out.data.problem_id;
                  var data1=out.data;

                    
                   $('.show_table').show();

                   $('.add_table').hide();




                   var name_array=[data1.column_one_name,data1.column_two_name,data1.column_three_name,data1.column_four_name,data1.column_five_name,
                     data1.column_six_name,data1.column_seven_name,data1.column_eight_name,data1.column_nine_name,data1.column_ten_name,
                     ];


                      var count_array=[data1.count_one_table,data1.count_two_table,data1.count_three_table,data1.count_four_table,data1.count_five_table,
                     data1.count_six_table,data1.count_seven_table,data1.count_eight_table,data1.count_nine_table,data1.count_ten_table,
                     ];



                 var html='<table class="table card-table table-vcenter">';
                 html+='<thead><tr>';

                     for(var i=0;i<columns;i++){



                       html+='<th>'+name_array[i]+'</th>';


                      }


                      html+='</tr></thead><tbody>';




                     for(var j=0;j<2;j++){
                      html+='<tr>';



                     for(var i=0;i<columns;i++){


                                           if(count_array[i]!=0){

                                            html+='<td> <table class="table card-table table-vcenter"><tr>';

                    for(var k=0;k<count_array[i];k++){

                      html+='<td><button type="submit" class="btn add_question_div" id="add_question_div"   data-column="'+i+'" data-row="'+j+'" data-sub="'+k+'" style="float: right;padding: 0px;"  onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1.2rem;"></i></button></td>';

                      }




                                            html+='</tr> </table></td>';










                                           }else{


                                            html+='<td><button type="button" class="btn add_question_div" id="add_question_div"  data-column="'+i+'" data-row="'+j+'"  style="float: right;padding: 0px;" onclick="show_format_values(this);"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 1.2rem;"></i></button></td>';

                                            }






                       


                      }

                                            html+='</tr>';

                    }






                      html+='</tr></tbody></table>';
                                                                                   console.log(html);

                      
                      
                      $('#table_fr_id').val(table_id);

                      $('.append-table').html(html);



                      


                 
                }
                else{
                    alert('Oops something went wrong!');
                }
            }
        })

  







}




  function show_format_values(e){

      $('.add_question_div').each(function (index, value) {

           $(this).css('background','#607d8b87');

    });


  //alert("hhhh");


  $(e).css('background','#25b32b');

       var column = $(e).data('column');
          var row = $(e).data('row');
         var sub = $(e).data('sub');

                 var q_id = $('#question_id').val();

                   $('.choose_value_type').show();
                   $('#column_value').val(column);
                   $('#row_value').val(row);
                   $('#sub_value').val(sub);

    }



    //  })



function add_format_values(){

  var value_type=$('#choose-add-type').val();
  if(value_type==0){
    $('#value_text').focus();

    // $('.append_div').append('<input type="text" name="value_text" id="value_text" class="form-control value_text" data-type="text" onkeyup="insert_values(this)">');

  }else if(value_type==1){
        $('.append_div').html('<input type="text" name="help_text" id="help_text" class="form-control value_text" data-type="h_text" onkeyup="insert_values(this)">');


  }
  else if(value_type==2){
        $('.append_div').html('<form id="fileinfo" enctype="multipart/form-data" method="post" name="fileinfo"><input type="file" name="help_img"  data-type="h_img" id="help_img" onchange="insert_values(this)"></form>');


  }
  else if(value_type==3){
        $('.append_div').html(' <input type="text" class="form-control key-tags pr-keys"  onchange="insert_values(this)" id="input-tags4" data-type="h_key" name="qst_keywords"  placeholder="Enter Keywords">');


           $(document).find('.key-tags').each(function(){
                        $(this).selectize({
                            delimiter: ',',
                            persist: false,
                            create: function(input) {
                                return {
                                    value: input,
                                    text: input
                                }
                            }
                        });
                    })


  }


}


 function  insert_values(e){

    alert('ffff');


   //  $(document).on('focusout','#value_text',function(e){

  var type=$(e).data('type');


    var col=$('#column_value').val();
        var rows=$('#row_value').val();

    var sub=$('#sub_value').val();

    var table_id=$('#choose-table').val();
  var q_id=$('#question_id').val();


  if(type!='h_img'){

    var val=$(e).val();




  $.ajax({
            url:base_url+'add-problem-format-values',
            type:'post',
            data:{type:type,col:col,rows:rows,sub:sub,q_id:q_id,table_id:table_id,val:val},
            success: function(out){
                var out = JSON.parse(out);
                if(out.status==1){

                }
              }
            });
    
  }else{

        var property = document.getElementById('help_img').files[0];
         var form_data = new FormData();
        form_data.append("file",property);
       form_data.append("type",type);
       form_data.append("col",col);
       form_data.append("rows",rows);
       form_data.append("sub",sub);
       form_data.append("table_id",table_id);


        console.log(form_data);


  $.ajax({
            url:base_url+'add-problem-format-values',
            type:'post',
          data:form_data,
          contentType:false,
          cache:false,
          processData:false,
            success: function(out){
                var out = JSON.parse(out);
                if(out.status==1){

      $('#help_img').val('');


                }
              }
            });


  }



    




};











  

 
</script>


