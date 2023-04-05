/*
* Custom Functions - Admin
* Developer - Jibin Bose
* Version   - 1.0.0
* Created   - 08/04/2018 05:50 pm
* Updated   - 08/18/2018 02:00 pm
*/
var key_tags;

$(document).ready(function(){
    $(document).on('keydown',".numberonly",function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
            // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    require(['jquery', 'selectize'], function ($, selectize) {
        $('#input-tags').selectize({
            delimiter: ';',
            persist: false,
            create: function (input,callback) {
                $.ajax({
                    url: base_url+'add-keywords',
                    type: 'POST',
                    data: {value:input},
                    success: function (result) {
                        if (result) {
                            callback({ value: result, text: input });
                        }
                    }
                });
            },
            onItemRemove: function (item) {
                $.ajax({
                    url: base_url+'delete-keywords',
                    type: 'POST',
                    data: {value:item},
                    success: function (result) {
                        if (result) {
                            console.log($('#input-tags').val());
                        }
                    }
                });
            }
        });


           $('#input-tags1').selectize({
            delimiter: ';',
            persist: false,
            create: function (input,callback) {
                $.ajax({
                    url: base_url+'add-keywords',
                    type: 'POST',
                    data: {value:input},
                    success: function (result) {
                        if (result) {
                            callback({ value: result, text: input });
                        }
                    }
                });
            },
            onItemRemove: function (item) {
                $.ajax({
                    url: base_url+'delete-keywords',
                    type: 'POST',
                    data: {value:item},
                    success: function (result) {
                        if (result) {
                            console.log($('#input-tags').val());
                        }
                    }
                });
            }
        });


            $('#input-tags0').selectize({
            delimiter: ';',
            persist: false,
            create: function (input,callback) {
                $.ajax({
                    url: base_url+'add-keywords',
                    type: 'POST',
                    data: {value:input},
                    success: function (result) {
                        if (result) {
                            callback({ value: result, text: input });
                        }
                    }
                });
            },
            onItemRemove: function (item) {
                $.ajax({
                    url: base_url+'delete-keywords',
                    type: 'POST',
                    data: {value:item},
                    success: function (result) {
                        if (result) {
                            console.log($('#input-tags').val());
                        }
                    }
                });
            }
        });

        $('#input-tags3').selectize({
            delimiter: ';',
            persist: false,
            create: function (input,callback) {
                var id = $('#transaction-edit-btn').attr('data-id');
                $.ajax({
                    url: base_url+'add-keywords',
                    type: 'POST',
                    data: {id:id,value:input},
                    success: function (result) {
                        if (result) {
                            callback({ value: result, text: input });
                        }
                    }
                });
            },
            onItemRemove: function (item) {
                $.ajax({
                    url: base_url+'delete-keywords',
                    type: 'POST',
                    data: {value:item},
                    success: function (result) {
                        if (result) {
                            console.log($('#input-tags').val());
                        }
                    }
                });
            }
        });


          // $('#input-tags4').selectize({
          //   delimiter: ';',
          //   persist: false,
            // create: function (input,callback) {
            //     var id = $('#transaction-edit-btn').attr('data-id');
            //     $.ajax({
            //         url: base_url+'add-keywords',
            //         type: 'POST',
            //         data: {id:id,value:input},
            //         success: function (result) {
            //             if (result) {
            //                 callback({ value: result, text: input });
            //             }
            //         }
            //     });
            // },
            // onItemRemove: function (item) {
            //     $.ajax({
            //         url: base_url+'delete-keywords',
            //         type: 'POST',
            //         data: {value:item},
            //         success: function (result) {
            //             if (result) {
            //                 console.log($('#input-tags').val());
            //             }
            //         }
            //     });
            // }
       // });

        $('#input-tags2').selectize({
            delimiter: ';',
            persist: false,
            create: function (input,callback) {
                $.ajax({
                    url: base_url+'add-keywords',
                    type: 'POST',
                    data: {value:input},
                    success: function (result) {
                        if (result) {
                            callback({ value: result, text: input });
                        }
                    }
                });
            },
            onItemRemove: function (item) {
                $.ajax({
                    url: base_url+'delete-keywords',
                    type: 'POST',
                    data: {value:item},
                    success: function (result) {
                        if (result) {
                            console.log($('#input-tags').val());
                        }
                    }
                });
            }
        });

        key_tags = $('.key-tags').selectize({
                        delimiter: ';',
                       persist: false,
                        create: function(input) {
                            return {
                                value: input,
                                text: input
                            }
                        }
                    });
    })
    
})


$(document).on('click','#filter-btn',function(e){
    e.preventDefault();
    $('.filter').toggle();
})

$(document).on('click','.change-password-btn', function(){
    $('#reset-div').hide();
    var cur_pass = $.trim($('#cur_pass').val());
    var new_pass = $.trim($('#new_pass').val());
    var c_pass = $.trim($('#c_pass').val());
    if(cur_pass && new_pass && c_pass){
        if(new_pass == c_pass){
            $.ajax({
                url: base_url+'reset-password',
                type:'post',
                data: {cur_pass:cur_pass,new_pass:new_pass,c_pass:c_pass},
                success: function(out){
                    var out = JSON.parse(out);
                    if(out.status == 1){
                        window.location.reload();
                    }
                    else if(out.status == 2){
                        $('#reset-div').show();
                        $('#reset-err').html('Current password does not match!');
                    }
                    else{
                        alert('err');
                    }
                }
            })
        }
        else{
            $('#c_pass').addClass('is-invalid');
            $('#reset-div').show();
            $('#reset-err').html('Password does not match!');
        }
    }
    if(!cur_pass){
        $('#cur_pass').addClass('is-invalid');
    }
    if(!new_pass){
        $('#new_pass').addClass('is-invalid');
    }
    if(!c_pass){
        $('#c_pass').addClass('is-invalid');
    }
})

$(document).on('click','#add-role-btn',function(event){
    event.preventDefault();
    $('#roles-table').hide();
    $('#add-role-form').show();
})

function randomPassword(event) {
    var randomstring = Math.random().toString(36).slice(-8);
    $(event).parent().parent().find('input').val(randomstring);
 }

/**
 * Admin Login Ajax Script
 */
$('#admin-login-form').submit(function(event) {
    event.preventDefault();
    var username = $.trim($('#username').val());
    var password = $.trim($('#password').val());
    $('.alert').removeClass('alert-danger');

    if(username && password){
        $.ajax({
            url:base_url+'admin-login',
            data:{username:username,password:password},
            type:'post',
            success: function(out){
                out = JSON.parse(out);
                if(out.status == 1){
                    $('.alert').addClass('alert-success');
                    $('.alert').html('Login successfull! Redirecting...');
                    setTimeout(function(){window.location.href = base_url+'dashboard';},1500);
                }
                else{
                    $('.alert').addClass('alert-danger');
                    $('.alert').html(out.data);
                }
            }
        })
    }
    else{
        $('.alert').addClass('alert-warning');
        $('.alert').html('Please enter credentials!');
    }
});

$(document).on('click','.edit-role-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.ajax({
        url:base_url+'get-role',
        data:{id:id},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            if(out.status == 1){
                $('#role_id').val(out.data.role_id);
                $('#edit_role_name').val(out.data.role_name);
                var priv = out.data.role_priv.split(',');
                $('input[name="edit_privileges[]"]').each(function(){
                    for(var i=0;i<priv.length;i++){
                        if($(this).val() == priv[i]){
                            $(this).prop('checked',true);
                            priv.splice(i, 1);
                        }
                    }
                })
                var rights = out.data.role_rights.split(',');
                $('input[name="edit_rights[]"]').each(function(){
                    for(var i=0;i<rights.length;i++){
                        if($(this).val() == rights[i]){
                            $(this).prop('checked',true);
                            rights.splice(i, 1);
                        }
                    }
                })
                $('#roles-table').hide();
                $('#edit-role-form').show();
            }
            else if(out.status==0){
                alert(out.data);
            }
            else{
                window.location.href = base_url;
            }
        }
    })
})

$(document).on('click','.edit-admin-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.ajax({
        url:base_url+'get-admin',
        data:{id:id},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            if(out.status == 1){
                $('#admin_id').val(out.data.admin_id);
                $('#edit_admin_role').val(out.data.role_id);
                $('#edit_admin_name').val(out.data.admin_name);
                $('#edit_admin_email').val(out.data.admin_email);
                $('#edit_admin_username').val(out.data.admin_username);
                $('#edit_admin_phone').val(out.data.admin_phone);
                if(out.data.admin_status==1) $('#edit_admin_status').attr('checked',true);
                $('#roles-table').hide();
                $('#edit-admin-form').show();
            }
            else if(out.status==0){
                alert(out.data);
            }
            else{
                window.location.href = base_url;
            }
        }
    })
})

$(document).on('click','.edit-table-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.ajax({
        url:base_url+'get-table',
        data:{id:id},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            if(out.status == 1){
                $('#table_id').val(out.data.table_id);
                $('#edit_table_name').val(out.data.table_name);
                $('#edit_table_columns').val(out.data.table_columns);
                $('#edit_table_left_title').val(out.data.table_left_title);
                $('#edit_table_right_title').val(out.data.table_right_title);
                $('#edit_column_one_name').val(out.data.column_one_name);
                $('#edit_column_two_name').val(out.data.column_two_name);
                $('#edit_column_three_name').val(out.data.column_three_name);
                $('#edit_column_four_name').val(out.data.column_four_name);
                $('#edit_column_five_name').val(out.data.column_five_name);
                $('#edit_column_six_name').val(out.data.column_six_name);
                $('#edit_column_seven_name').val(out.data.column_seven_name);
                $('#edit_column_eight_name').val(out.data.column_eight_name);
                $('#edit_column_nine_name').val(out.data.column_nine_name);
                $('#edit_column_ten_name').val(out.data.column_ten_name);
                $('#edit_column_one_width').val(out.data.column_one_width);
                $('#edit_column_two_width').val(out.data.column_two_width);
                $('#edit_column_three_width').val(out.data.column_three_width);
                $('#edit_column_four_width').val(out.data.column_four_width);
                $('#edit_column_five_width').val(out.data.column_five_width);
                $('#edit_column_six_width').val(out.data.column_six_width);
                $('#edit_column_seven_width').val(out.data.column_seven_width);
                $('#edit_column_eight_width').val(out.data.column_eight_width);
                $('#edit_column_nine_width').val(out.data.column_nine_width);
                $('#edit_column_ten_width').val(out.data.column_ten_width);
                if(out.data.column_one_sum==1) $('#edit_column_one_check').attr('checked',true);
                if(out.data.column_two_sum==1) $('#edit_column_two_check').attr('checked',true);
                if(out.data.column_three_sum==1) $('#edit_column_three_check').attr('checked',true);
                if(out.data.column_four_sum==1) $('#edit_column_four_check').attr('checked',true);
                if(out.data.column_five_sum==1) $('#edit_column_five_check').attr('checked',true);
                if(out.data.column_six_sum==1) $('#edit_column_six_check').attr('checked',true);
                if(out.data.column_seven_sum==1) $('#edit_column_seven_check').attr('checked',true);
                if(out.data.column_eight_sum==1) $('#edit_column_eight_check').attr('checked',true);
                if(out.data.column_nine_sum==1) $('#edit_column_nine_check').attr('checked',true);
                if(out.data.column_ten_sum==1) $('#edit_column_ten_check').attr('checked',true);


                 if(out.data.count_one_table!=0) $('#column_sub_one_edit').attr('checked',true);


                 var sub_width=out.data.sub;
                 
                 $('#count_sub1').val(out.data.count_one_table);
 








   
  

                      var html='';
                      var htm='';
                      var val=0;
                    for (var i = 0; i <= sub_width.length-1; i++) {

                        if(sub_width[i].column_id==1){


                              val +=sub_width[i].width+','; 

                            html+='<div class="form-group"><label class="form-label">Column'+i+' width</label>'+
                            '<input type="text" class="form-control col_width'+i+'" name="col_width'+i+'" id="col_width'+i+'" placeholder="Enter No of Columns" data-id="'+id+'" value="'+sub_width[i].width+'">'+
                            '</div>' ;

                        }


                     //    var value_array=[sub_width[i].width,answer[j].column_two_value,answer[j].column_three_value,answer[j].column_four_value,answer[j].column_five_value,
                     //  answer[j].column_six_value,answer[j].column_seven_value,answer[j].column_eight_value,answer[j].column_nine_value,answer[j].column_ten_value,
                     // ];
                      
                    }


                    htm+='<div class="form-group">'+
            '<input type="text" class="form-control col_width1" name="col_width1" id="col_width1" placeholder="Enter No of Columns" value="'+val+'">'+
            '</div>' ;

                   $('.column_width_div1').html(html);
                    $('#sub_width1').html(htm);
                if(out.data.count_two_table!=0) $('#column_sub_two_edit').attr('checked',true);
                 $('#count_sub2').val(out.data.count_two_table);
                  var html='';
                  var j=0;
                   var val=0;
                   var htm='';
                    for (var i = 0; i <= sub_width.length-1; i++) {

                         if(sub_width[i].column_id==2){
                            val +=sub_width[i].width+','; 

                        html+='<div class="form-group"><label class="form-label">Column'+j+' width</label>'+
                            '<input type="text" class="form-control col_width'+j+'" name="col_width'+j+'" id="col_width'+j+'" placeholder="Enter No of Columns" data-id="'+id+'" value="'+sub_width[i].width+'">'+
                            '</div>' ;
                             j++;
                              }
                             
                    }

                    htm+='<div class="form-group">'+
            '<input type="text" class="form-control col_width2" name="col_width2" id="col_width2" placeholder="Enter No of Columns" value="'+val+'">'+
            '</div>' ;
            $('#sub_width2').html(htm);

                   $('.column_width_div2').html(html);
                if(out.data.count_three_table!=0) $('#column_sub_three_edit').attr('checked',true);
                 $('#count_sub3').val(out.data.count_three_table);

                  var html='';
                  var thr=0;
                  var val=0;
                  var htm='';
                    for (var i = 0; i <= sub_width.length-1; i++) {
                        if(sub_width[i].column_id==3){
                             val +=sub_width[i].width+','; 

                        html+='<div class="form-group"><label class="form-label">Column'+thr+' width</label>'+
                            '<input type="text" class="form-control col_width'+thr+'" name="col_width'+thr+'" id="col_width'+thr+'" placeholder="Enter No of Columns" data-id="'+id+'" value="'+sub_width[i].width+'">'+
                            '</div>' ;
                             thr++;
                        }
                    }

                     htm+='<div class="form-group">'+
            '<input type="text" class="form-control col_width3" name="col_width3" id="col_width3" placeholder="Enter No of Columns" value="'+val+'">'+
            '</div>' ;
            $('#sub_width3').html(htm);


                   $('.column_width_div3').html(html);
                if(out.data.count_four_table!=0) $('#column_sub_four_edit').attr('checked',true);
                $('#count_sub4').val(out.data.count_four_table);
                var html='';
                 var f=0;
                 var htm='';
                 var val=0;
                    for (var i = 0; i <= sub_width.length-1; i++) {

                        if(sub_width[i].column_id==4){
                             val +=sub_width[i].width+','; 

                        html+='<div class="form-group"><label class="form-label">Column'+f+' width</label>'+
                            '<input type="text" class="form-control col_width'+f+'" name="col_width'+f+'" id="col_width'+f+'" placeholder="Enter No of Columns" data-id="'+id+'" value="'+sub_width[i].width+'">'+
                            '</div>' ;
                            f++
                        }
                    }

                    htm+='<div class="form-group">'+
            '<input type="text" class="form-control col_width4" name="col_width4" id="col_width4" placeholder="Enter No of Columns" value="'+val+'">'+
            '</div>' ;
            $('#sub_width4').html(htm);
                   $('.column_width_div4').html(html);
                if(out.data.count_five_table!=0) $('#column_sub_five_edit').attr('checked',true);
                 $('#count_sub5').val(out.data.count_five_table);
                  var html='';
                  var fi=0;
                  var val=0;
                  var htm='';
                    for (var i = 0; i <= sub_width.length-1; i++) {
                        if(sub_width[i].column_id==5){

                            val +=sub_width[i].width+','; 

                        html+='<div class="form-group"><label class="form-label">Column'+fi+' width</label>'+
                            '<input type="text" class="form-control col_width'+fi+'" name="col_width'+fi+'" id="col_width'+fi+'" placeholder="Enter No of Columns" data-id="'+id+'" value="'+sub_width[i].width+'">'+
                            '</div>' ;
                            fi++;
                        }
                    }

                    htm+='<div class="form-group">'+
            '<input type="text" class="form-control col_width5" name="col_width5" id="col_width5" placeholder="Enter No of Columns" value="'+val+'">'+
            '</div>' ;
            $('#sub_width5').html(htm);
                   $('.column_width_div5').html(html);
                if(out.data.count_six_table!=0) $('#column_sub_six_edit').attr('checked',true);
                $('#count_sub6').val(out.data.count_six_table);
                     var html='';
                     var s=0;
                     var val=0;
                     var htm='';
                    for (var i = 0; i <= sub_width.length-1; i++) {
                        if(sub_width[i].column_id==6){
                            val +=sub_width[i].width+','; 

                        html+='<div class="form-group"><label class="form-label">Column'+s+' width</label>'+
                            '<input type="text" class="form-control col_width'+s+'" name="col_width'+s+'" id="col_width'+s+'" placeholder="Enter No of Columns" data-id="'+id+'" value="'+sub_width[i].width+'">'+
                            '</div>' ;
                            s++;
                        }
                    }

                    htm+='<div class="form-group">'+
            '<input type="text" class="form-control col_width6" name="col_width6" id="col_width6" placeholder="Enter No of Columns" value="'+val+'">'+
            '</div>' ;
            $('#sub_width6').html(htm);
                   $('.column_width_div6').html(html);
                if(out.data.count_seven_table!=0) $('#column_sub_seven_edit').attr('checked',true);
                $('#count_sub7').val(out.data.count_seven_table);
                  var html='';
                   var s=0;
                   var val=0;
                   var htm='';
                    for (var i = 0; i <= sub_width.length-1; i++) {
                        if(sub_width[i].column_id==7){

                            val +=sub_width[i].width+','; 
                        html+='<div class="form-group"><label class="form-label">Column'+s+' width</label>'+
                            '<input type="text" class="form-control col_width'+s+'" name="col_width'+s+'" id="col_width'+s+'" placeholder="Enter No of Columns" data-id="'+id+'" value="'+sub_width[i].width+'">'+
                            '</div>' ;
                               s++;
                        }
                    }

                    htm+='<div class="form-group">'+
            '<input type="text" class="form-control col_width7" name="col_width7" id="col_width7" placeholder="Enter No of Columns" value="'+val+'">'+
            '</div>' ;
            $('#sub_width7').html(htm);
                   $('.column_width_div7').html(html);
                if(out.data.count_eight_table!=0) $('#column_sub_eight_edit').attr('checked',true);
                  $('#count_sub8').val(out.data.count_eight_table);
                 var html='';
                   var s=0;
                    var val=0;
                    var htm='';
                    for (var i = 0; i <= sub_width.length-1; i++) {
                        if(sub_width[i].column_id==8){
                            val +=sub_width[i].width+','; 

                        html+='<div class="form-group"><label class="form-label">Column'+s+' width</label>'+
                            '<input type="text" class="form-control col_width'+s+'" name="col_width'+s+'" id="col_width'+s+'" placeholder="Enter No of Columns" data-id="'+id+'" value="'+sub_width[i].width+'">'+
                            '</div>' ;
                            s++;
                        }
                    }

                           htm+='<div class="form-group">'+
            '<input type="text" class="form-control col_width8" name="col_width8" id="col_width8" placeholder="Enter No of Columns" value="'+val+'">'+
            '</div>' ;
            $('#sub_width8').html(htm);

                   $('.column_width_div8').html(html);
                if(out.data.count_nine_table!=0) $('#column_sub_nine_edit').attr('checked',true);
                 $('#count_sub9').val(out.data.count_nine_table);
                 var html='';
                  var s=0;
                   var val=0;
                   var htm='';
                    for (var i = 0; i <= sub_width.length-1; i++) {
                         if(sub_width[i].column_id==9){
                             val +=sub_width[i].width+','; 

                        html+='<div class="form-group"><label class="form-label">Column'+s+' width</label>'+
                            '<input type="text" class="form-control col_width'+s+'" name="col_width'+s+'" id="col_width'+s+'" placeholder="Enter No of Columns" data-id="'+id+'" value="'+sub_width[i].width+'">'+
                            '</div>' ;
                            s++;
                        }
                    }

                    htm+='<div class="form-group">'+
            '<input type="text" class="form-control col_width9" name="col_width9" id="col_width9" placeholder="Enter No of Columns" value="'+val+'">'+
            '</div>' ;
            $('#sub_width9').html(htm);
                   $('.column_width_div9').html(html);
                if(out.data.count_ten_table!=0) $('#column_sub_ten_edit').attr('checked',true);
                 $('#count_sub10').val(out.data.count_ten_table);
                 var html='';
                 var s=0;
                 var htm='';
                    for (var i = 0; i <= sub_width.length-1; i++) {
                         if(sub_width[i].column_id==10){

                        html+='<div class="form-group"><label class="form-label">Column'+s+' width</label>'+
                            '<input type="text" class="form-control col_width'+s+'" name="col_width'+s+'" id="col_width'+s+'" placeholder="Enter No of Columns" data-id="'+id+'" value="'+sub_width[i].width+'">'+
                            '</div>' ;
                            s++;
                        }
                    }
                   $('.column_width_div10').html(html);
                $('#roles-table').hide();
                $('#edit-table-form').show();
            }
            else if(out.status==0){
                alert(out.data);
            }
            else{
                window.location.href = base_url;
            }
        }
    })
})

$(document).on('click','.edit-course-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.ajax({
        url:base_url+'get-data',
        data:{id:id},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            if(out.status == 1){
                $('#course_id').val(out.data.data_id);
                $('#edit_course_name').val(out.data.data_name);
                $('#roles-table').hide();
                $('#edit-course-form').show();
            }
            else if(out.status==0){
                alert(out.data);
            }
            else{
                window.location.href = base_url;
            }
        }
    })
})

$(document).on('click','#add-transaction-btn',function(){
          var q_id = $(this).data('id');

    var transaction = $.trim($('#transaction_title'+q_id+'').val());
    var helptext = $.trim($('#transaction_helptext'+q_id+'').val());
    var keywords = $('#input-tags'+q_id+'').val();
    var image = $('#image_name'+q_id+'').val();

    $('#transaction_title'+q_id+'').removeClass('is-invalid');
    $('.selectize-input').css('border','1px solid rgba(0, 40, 100, 0.12)');
    console.log(transaction);
    console.log(keywords);
    if(transaction && keywords){
        $.ajax({
            url: base_url+'add-transaction',
            type: 'POST',
            data: {transaction:transaction,helptext:helptext,keywords:keywords,image:image},
            success: function (out) {
                var out = JSON.parse(out);
                if (out.status == 1) {
                    var htm = $('#transactions'+q_id+'').html();
                    var htm1 = $('.transc'+q_id+'').html();
                    $('#transactions'+q_id+'').html(htm+'<li id="trans_'+out.data+'" data-id="'+out.data+'">'+transaction+' <button type="button" class="btn-sm btn-info edit-transaction-btn" data-id="'+out.data+'"><i class="fa fa-pencil"></i></button> <button type="button" class="btn-sm btn-danger remove-transaction-btn" data-id="'+out.data+'"><i class="fa fa-minus"></i></button></li>');
                    $('.transc'+q_id+'').html(htm1+'<li id="trans_'+out.data+'" data-id="'+out.data+'">'+transaction+' <button type="button" class="btn-sm btn-info edit-transaction-btn" data-id="'+out.data+'"><i class="fa fa-pencil"></i></button> <button type="button" class="btn-sm btn-danger remove-transaction-btn" data-id="'+out.data+'"><i class="fa fa-minus"></i></button></li>');

                    var select = $('#input-tags'+q_id+'').selectize();
                    var control = select[0].selectize;
                    control.clear();
                    control.clearOptions();
                    $('#transaction_title'+q_id+'').val('');
                    var value = $('#transaction_ids'+q_id+'').val();
                    if(value) $('#transaction_ids'+q_id+'').val(value+','+out.data);
                    else $('#transaction_ids'+q_id+'').val(out.data);

                     var value = $('#transaction_ids_edit'+q_id+'').val();
                    if(value) $('#transaction_ids_edit'+q_id+'').val(value+','+out.data);
                    else $('#transaction_ids_edit'+q_id+'').val(out.data);

                    $('#myModal'+q_id+'').modal('hide');
                }
                else if(out.status == 0){
                    alert(out.data);
                }
                else{
                    window.location.href = base_url;
                }

            }
        })
    }
    else{
        if(!transaction){
            $('#transaction_title').addClass('is-invalid');
        }
        if(!keywords){
            $('.selectize-input').css('border','1px solid #cd201f');
        }
    }
})

$(document).on('click','.edit-transaction-btn',function(){
    var id = $(this).attr('data-id');
   

    $.ajax({
        url:base_url+'get-transaction',
        type:'post',
        data:{id:id},
        success: function(out){
            var out =JSON.parse(out);
            if (out.status == 1) {
                $('#getModal').find('.key_tag').attr('id','input-tags-edit'+id+'');
                
                $('#get_transaction_title').val(out.data.transaction_title);
                $('#get_transaction_helptext').val(out.data.transaction_helptext);
                 //var select = $('#input-tags'+q_id+'').selectize();
                var select = $('#input-tags-edit'+id+'').selectize();
                var selectize = select[0].selectize;

                var control = select[0].selectize;
                    control.clear();
                    control.clearOptions();
                var keys = out.data.keywords;
                for(var i=0;i<keys.length;i++){
                    selectize.addOption(out.data.keywords[i]);
                    selectize.addItem(out.data.keywords[i].value,true); 
                }
                if(out.data.transaction_image){
                    $('#getfileupload').hide();
                    $('#get_image_name').val(out.data.transaction_image);
                    $('#get-upload-img').show();
                    $('#get-upload-img').find('img').attr('src',out.data.transaction_image);
                }
                $('#transaction-edit-btn').attr('data-id',id);
                $('#getModal').modal('show');
            }
            else if(out.status == 0){
                alert(out.data);
            }
            else{
                window.location.href = base_url;
            }
        }
    })
})

$(document).on('click','#transaction-edit-btn',function(){
    var id = $(this).attr('data-id');
    var transaction = $.trim($('#get_transaction_title').val());
    var helptext = $.trim($('#get_transaction_helptext').val());
    var keywords = $('#input-tags-edit'+id+'').val();
    var image = $('#get_image_name').val();
    $('#get_transaction_title').removeClass('is-invalid');
    $('.selectize-input').css('border','1px solid rgba(0, 40, 100, 0.12)');
    if(transaction && keywords){
        $.ajax({
            url: base_url+'edit-transaction',
            type: 'POST',
            data: {id:id,transaction:transaction,helptext:helptext,keywords:keywords,image:image},
            success: function (out) {
                var out = JSON.parse(out);
                if (out.status == 1) {
                    var elem = '#trans_'+id;
                    var htm = $(elem).html(transaction+' <button type="button" class="btn-sm btn-info edit-transaction-btn" data-id="'+id+'"><i class="fa fa-pencil"></i></button> <button type="button" class="btn-sm btn-danger remove-transaction-btn" data-id="'+id+'"><i class="fa fa-minus"></i></button>');
                    var select = $('#input-tags3').selectize();
                    var control = select[0].selectize;
                    control.clear();
                    control.clearOptions();
                    $('#get_transaction_title').val('');
                    var value = $('#edit_transaction_ids').val();
                    if(value) $('#edit_transaction_ids').val(value+','+out.data);
                    else $('#edit_transaction_ids').val(out.data);
                    $('#getModal').modal('hide');
                }
                else if(out.status == 0){
                    alert(out.data);
                }
                else{
                    //window.location.href = base_url;
                }

            }
        })
    }
    else{
        if(!transaction){
            $('#edit_transaction_title').addClass('is-invalid');
        }
        if(!keywords){
            $('.selectize-input').css('border','1px solid #cd201f');
        }
    }
})

$(document).on('click','#edit-transaction-btn',function(){
    var transaction = $.trim($('#edit_transaction_title').val());
    var helptext = $.trim($('#transaction_helptext').val());
    var keywords = $('#input-tags2').val();
    var image = $('#edit_image_name').val();
    $('#edit_transaction_title').removeClass('is-invalid');
    $('.selectize-input').css('border','1px solid rgba(0, 40, 100, 0.12)');
    if(transaction && keywords){
        $.ajax({
            url: base_url+'add-transaction',
            type: 'POST',
            data: {transaction:transaction,helptext:helptext,keywords:keywords,image:image},
            success: function (out) {
                var out = JSON.parse(out);
                if (out.status == 1) {
                    var htm = $('#edit_transactions').html();
                    $('#edit_transactions').html(htm+'<li id="trans_'+out.data+'" data-id="'+out.data+'">'+transaction+' <button type="button" class="btn-sm btn-info edit-transaction-btn" data-id="'+out.data+'"><i class="fa fa-pencil"></i></button> <button type="button" class="btn-sm btn-danger remove-transaction-btn" data-id="'+out.data+'"><i class="fa fa-minus"></i></button></li>');
                    var select = $('#input-tags2').selectize();
                    var control = select[0].selectize;
                    control.clear();
                    control.clearOptions();
                    $('#edit_transaction_title').val('');
                    var value = $('#edit_transaction_ids').val();
                    if(value) $('#edit_transaction_ids').val(value+','+out.data);
                    else $('#edit_transaction_ids').val(out.data);
                    $('#editModal').modal('hide');
                }
                else if(out.status == 0){
                    alert(out.data);
                }
                else{
                    window.location.href = base_url;
                }

            }
        })
    }
    else{
        if(!transaction){
            $('#edit_transaction_title').addClass('is-invalid');
        }
        if(!keywords){
            $('.selectize-input').css('border','1px solid #cd201f');
        }
    }
})

$(document).on('click','.remove-transaction-btn',function(){
    var id = $(this).attr('data-id');
    var elem = $(this);
    $.ajax({
        url: base_url+'delete-transaction',
        type: 'POST',
        data: {id:id},
        success: function (out) {
            var out = JSON.parse(out);
            if (out.status == 1) {
                elem.parent().remove();
                change_ids();
            }
            else if(out.status == 0){
                alert(out.data);
            }
            else{
                window.location.href = base_url;
            }
        }
    })
})

$(document).on('click','.sub-tab',function(){
 var id = $(this).attr('data-id');

 $('#editModal'+id+'').modal('show');

})



function change_ids(id){
    var ids = '';
    var i = 0;
    $('#transactions').find('li').each(function(e){
        if(i==0) ids += $(this).attr('data-id');
        else ids += ','+$(this).attr('data-id');
        i++;
    })
    $('#transaction_ids').val(ids);
    
    $('#edit_transactions').find('li').each(function(e){
        if(i==0) ids += $(this).attr('data-id');
        else ids += ','+$(this).attr('data-id');
        i++;
    })
    $('#edit_transaction_ids').val(ids);
}

$(document).on('click','.edit-question-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.ajax({
        url:base_url+'get-question',
        data:{id:id},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            if(out.status == 1){
                $('#question_id').val(out.data.question.question_id);

                var len=out.data.qt_id.length;
                if(len>0){
                   
                    $('#edit-qt-tabl-name').html(out.data.qt_id[0].qt_name);
                    $('#edit-qt-remove-btn').attr('data-id',out.data.qt_id[0].qt_id);
                    $('#edit_qt_table_id').val(out.data.qt_id[0].qt_id);

                    if(len>1){
                        for (var k = 0; k <= len-2; k++) {
                                             $('#rep_div_edit').append('<div class="col-md-4 col-lg-4 repeat_row_edit" ><div class="col-md-12 col-lg-12">'+
                                        '<div class="form-group"><label class="form-label">  Question table</label>'+
                                            '<button type="button" class="qt-btn" data-toggle="modal" data-target="#tableModal'+k+'" style="display:none">Add</button>'+
                                            '<div class="qt-tabl-div'+k+'" style="">'+
                                                                           ' <p><span class="qt-tabl-name'+k+'">'+out.data.qt_id[k].qt_name+'</span>&emsp;<a class="qt-remove-btn'+k+'" href="#">Remove</a>'+
                                                '</p></div><input type="hidden" name="edit_qt_id[]" class="edit_qt_table_id'+k+'" value="'+out.data.qt_id[k].qt_id+'">'+ 
                                        '</div></div>'



                                    );
                        }
                       
                    }
                }
                else{
                    $('.qt-btn').show();
                    $('#edit-qt-remove-btn').parent().parent().hide();
                }



                if(out.data.transactions){
                $('#edit_transactions').html(out.data.html);
                $('#transaction_ids_edit0').val(out.data.ids); 

                var len_t=out.data.transactions.length;

                var trans=out.data.transactions;
                    var myarray = [];

                     for (var t = 0; t< len_t; t++) {
                        var found = jQuery.inArray(trans[t].rows, myarray);
                           if (found >= 0) {
                          
                           }else{
                            myarray.push(out.data.transactions[t].rows);
                           }
                     }

                    
                     var htm='<div class="row">';
                  for (var tr = 0; tr< myarray.length; tr++) {
                    

                    if(myarray[tr]!=0)
                    {

                         htm+=' <div class="col-md-6 col-lg-4"><div class="form-group"><label class="form-label">Transactions</label> <ol id="edit_transactions" class="transc'+t+'">';

                        for (var t = 0; t< len_t; t++) {
                            if(trans[t].rows==myarray[tr]){

                            htm+='<li id="trans_'+trans[t].transaction_id+'" data-id="'+trans[t].transaction_id+'">'+trans[t].transaction_title+' <button type="button" class="btn-sm btn-info edit-transaction-btn" data-id="'+trans[t].transaction_id+'"><i class="fa fa-pencil"></i></button> <button type="button" class="btn-sm btn-danger remove-transaction-btn" data-id="'+trans[t].transaction_id+'"><i class="fa fa-minus"></i></button></li>'

                            }
                             console.log(htm);
                        }
                           htm+='</ol></div><input type="hidden" name="transaction_ids_edit'+t+'" id="transaction_ids_edit">'+
                          '</div>'+
                          '';
                    }
                    console.log(htm);

                  }
                  htm+='</div><button type="button" class="btn btn-bitbucket" data-toggle="modal" data-target="#myModal'+t+'"><i class="fa fa-plus"></i></button>';
                  $('#rep_transaction_edit').html(htm);



               



                 
                }



                $('#edit_question_code').val(out.data.question.question_code);
                $('#edit_question_title').val(out.data.question.question_title);
                $('#edit_table_id1').val(out.data.question.table_id);
                if(out.data.question.table_img1!=""){
                    
                    $('.show_img1').html(' <img src="'+base_url+'uploads/'+out.data.question.table_img1 +'" style="width: 100px;height: 100px;">')
                }
                $('#edit_table_id2').val(out.data.question.table_id2);
                 if(out.data.question.table_img2!=""){
                    
                    $('.show_img2').html(' <img src="'+base_url+'uploads/'+out.data.question.table_img2 +'" style="width: 100px;height: 100px;">')
                }
                $('#edit_table_id3').val(out.data.question.table_id3);
                if(out.data.question.table_img3!=""){
                    
                    $('.show_img3').html(' <img src="'+base_url+'uploads/'+out.data.question.table_img3 +'" style="width: 100px;height: 100px;">')
                }
                $('#edit_table_id4').val(out.data.question.table_id4);
                if(out.data.question.table_img4!=""){
                    
                    $('.show_img4').html(' <img src="'+base_url+'uploads/'+out.data.question.table_img4 +'" style="width: 100px;height: 100px;">')
                }
                $('#edit_table_id5').val(out.data.question.table_id5);
                if(out.data.question.table_img5!=""){
                    
                    $('.show_img5').html(' <img src="'+base_url+'uploads/'+out.data.question.table_img5 +'" style="width: 100px;height: 100px;">')
                }
                $('#edit_table_id6').val(out.data.question.table_id6);
                if(out.data.question.table_img6!=""){
                    
                    $('.show_img6').html(' <img src="'+base_url+'uploads/'+out.data.question.table_img6 +'" style="width: 100px;height: 100px;">')
                }
                $('#edit_table_id7').val(out.data.question.table_id7);

                 if(out.data.question.table_img7!=""){
                    
                    $('.show_img7').html(' <img src="'+base_url+'uploads/'+out.data.question.table_img7 +'" style="width: 100px;height: 100px;">')
                }
                $('#edit_table_id8').val(out.data.question.table_id8);
                 if(out.data.question.table_img8!=""){
                    
                    $('.show_img8').html(' <img src="'+base_url+'uploads/'+out.data.question.table_img8 +'" style="width: 100px;height: 100px;">')
                }
                $('#edit_table_id9').val(out.data.question.table_id9);
                 if(out.data.question.table_img9!=""){
                    
                    $('.show_img9').html(' <img src="'+base_url+'uploads/'+out.data.question.table_img9 +'" style="width: 100px;height: 100px;">')
                }
               
                $('#roles-table').hide();
                $('#edit-table-form').show();
            }
            else if(out.status==0){
                alert(out.data);
            }
            else{
                window.location.href = base_url;
            }
        }
    })
})

$(document).on('click','#add-qt-btn',function(){
      var q_id = $(this).data('id');

    var name = $.trim($('#table_name'+q_id+'').val());
    var nos = $.trim($('#table_cols'+q_id+'').val());
  
   // alert(q_id);
    if( nos && (nos<8)){
        $.ajax({
            url:base_url+'add-question-table',
            type:'post',
            data:{name:name,nos:nos},
            success: function(out){
                var out = JSON.parse(out);
                if(out.status == 1){
                    $('.qt_id'+q_id+'').val(out.data);
                    $('.qt-tabl-name'+q_id+'').html(name);
                    $('#cols'+q_id+'').val(nos);
                    var html = $('#col-div'+q_id+'').html();
                    for(var i=0;i<nos-1;i++){
                        $('#col-div'+q_id+'').after('<div class="col-lg-12" style="display:flex;">'+html+'</div>');
                    }
                    $('#define-table-div'+q_id+'').hide();
                    $('#btn-one'+q_id+'').hide();
                    $('#define-cols-div'+q_id+'').show();
                    $('#btn-two'+q_id+'').show();
                }
                else{
                    alert('Oops something went wrong!');
                }
            }
        })
    }
    
    else if(!nos){
        $('#table_cols').focus();
    }
    else if(nos>=8){
        $('#table_cols').focus();
        alert('Max 8 colomns allowed');
    }
})




$(document).on('click','#add-ans-btn',function(){
     var table = $.trim($('#table_id').val());
      var q_id = $('.qt_id').val();
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
                     $('#tableModal').find('.modal-dialog').css('max-width','1200px');
                     var name_array=[data1.column_one_name,data1.column_two_name,data1.column_three_name,data1.column_four_name,data1.column_five_name,
                     data1.column_six_name,data1.column_seven_name,data1.column_eight_name,data1.column_nine_name,data1.column_ten_name,
                     ];
                        var count_array=[data1.count_one_table,data1.count_two_table,data1.count_three_table,data1.count_four_table,data1.count_five_table,
                     data1.count_six_table,data1.count_seven_table,data1.count_eight_table,data1.count_nine_table,data1.count_ten_table,
                     ];


                    

                    var out = '';
                    var num = 2;
                     var num2 = 1;
                    if(cols>5) num = 1;


                    if(answer.length>0){

//console.log(answer);  
//var out='';
 var out='<p style="">(Please check for underline answers)</p>';
                        for (var j = 0; j <= answer.length-1; j++) {
                            

              
                            out += '<div class="col-lg-12 rows" id="col-div" style="display:flex;">';  
          var html='';
                            for(var i=0;i<cols;i++){
                                 var value_array=[answer[j].column_one_value,answer[j].column_two_value,answer[j].column_three_value,answer[j].column_four_value,answer[j].column_five_value,
                      answer[j].column_six_value,answer[j].column_seven_value,answer[j].column_eight_value,answer[j].column_nine_value,answer[j].column_ten_value,
                     ];

                                    console.log(value_array[i]);
                

                      
                html += '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">'+name_array[i]+'</label><input type="text" class="form-control" name="row_value_'+i+'[]" value="'+value_array[i]+'" placeholder="Enter Value" required>';

                 html += '<input type="checkbox" class="form-control1" name="is_underline'+i+'[]"    id="is_underline" style="margin: 12px;"></div></div>';
                     
                          }
                          out += html;  
  console.log(out);





                    out += '<div class="col-md-'+num2+' col-lg-'+num2+'"><div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-minus-btn-new-pre" data-id="'+answer[j].id+'"><i class="fa fa-minus"></i></button></div></div></div>';
                         }



                         $("#add-ans_tbl-btn").html('Edit');
                    
                     $('.add-ans-save').attr('id','edit-ans-save'); 
                     }

                
                      else{
            out += '<div class="col-lg-12 rows" id="col-div" style="display:flex;">';         
                for(var i=0;i<cols;i++){
                    if(count_array[i]!=0){
                        var html='<div class="col-md-'+num+' col-lg-'+num+'">';
                           for(var k=0;k<count_array[i];k++){

                     html += '<div class="form-group"><label class="form-label row_name">'+name_array[i]+'</label><input type="text" class="form-control" name="row_value_'+i+'[]"  placeholder="Enter Value" required>';
                     html += '<input type="checkbox" class="form-control1" name="is_underline'+i+'[]"    id="is_underline" style="margin: 12px;"></div>';

                    out += html;  
                    }
                    out +='</div>';


                    }else{
                        var html = '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">'+name_array[i]+'</label><input type="text" class="form-control" name="row_value_'+i+'[]"  placeholder="Enter Value" required>';
                     html += '<input type="checkbox" class="form-control1" name="is_underline'+i+'[]"    id="is_underline" style="margin: 12px;"></div></div>';

                    out += html; 
                    }
                 

                    
                       } 

                    out += '<div class="col-md-'+num2+' col-lg-'+num2+'"><div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-plus-btn-new"><i class="fa fa-plus"></i></button></div></div><p style="    margin-top: 38px;">(Please check for underline answers)</p></div>';


                        }
                       
                //  }

                    
                      // var num2 = 1;
                    // out += '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label">Keywords</label><input type="text" class="form-control key-tags" name="val_keys[]" value="" placeholder="Enter Keywords"></div></div><div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-plus-btn"><i class="fa fa-plus"></i></button></div></div></div>';
                    // out += '<div class="col-md-'+num2+' col-lg-'+num2+'"><div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-plus-btn-new"><i class="fa fa-plus"></i></button></div></div><p style="    margin-top: 38px;">(Please check for underline answers)</p></div>';
                    $('#row-data').val(out);
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




$(document).on('click','#add-ans_tbl-btn',function(){
    var id = $('.qt_id').val();
    $.ajax({
        url:base_url+'add-answer-table',
        type:'post',
        data:$('#row-form').serialize(),
        success:function(out){
            var out = JSON.parse(out);
            if(out.status==1){
                $('.qt-btn').hide();
                $('.qt-tabl-div').show();
                $('.qt_table_id').val(id);
                $('.qt-remove-btn').attr('data-id',id);
                $('#tableModal').modal('hide');
                var html = $('#col-div').html();
                $('#define-cols-div').html('<div class="col-lg-12" id="col-div" style="display:flex;">'+html+'</div>');
                $('#col-div').find('.form-control').val('');
                $('#define-table-div').show();
                $('#btn-one').show();
                $('#define-row-div').hide();
                $('#btn-three').hide();
                $('#table_name').val('');
                $('#table_cols').val('');
            }
            else{
                alert('Oops something went wrong!');
            }
        }
    })
})


$(document).on('click','#edit-ans-save',function(){
    var id = $('.qt_id').val();
    $.ajax({
        url:base_url+'edit-answer-table',
        type:'post',
        data:$('#row-form').serialize(),
        success:function(out){
            var out = JSON.parse(out);
            if(out.status==1){
                $('.qt-btn').hide();
                $('.qt-tabl-div').show();
                $('.qt_table_id').val(id);
                $('.qt-remove-btn').attr('data-id',id);
                $('#tableModal').modal('hide');
                var html = $('#col-div').html();
                $('#define-cols-div').html('<div class="col-lg-12" id="col-div" style="display:flex;">'+html+'</div>');
                $('#col-div').find('.form-control').val('');
                $('#define-table-div').show();
                $('#btn-one').show();
                $('#define-row-div').hide();
                $('#btn-three').hide();
                $('#table_name').val('');
                $('#table_cols').val('');
            }
            else{
                alert('Oops something went wrong!');
            }
        }
    })
})




$(document).on('click','#add-col-btn',function(){
     var q_id = $(this).data('id');
    var cols = $(this).parent().parent().parent().parent().parent().find('input[name="col_name[]"]').each(function(){
        return $(this);
        console.log($(this));
    });
    var wids = $(this).parent().parent().parent().parent().parent().find('input[name="col_width[]"]').each(function(){
        return $(this);
    });

    var cols_err = 1;
    var wids_err = 1;
    for(var i=0;i<cols.length;i++){
        // if(!$.trim(cols[i].value)){
        //     cols_err = 0;
        //     cols[i].focus();
        //     break;
        // }
        if(!$.trim(wids[i].value)){
            wids_err = 0;
            wids[i].focus();
            break;
        }
    }


   //console.log(cols);
var formData=$('#col-form'+q_id+'').serialize();
    $.each($('form input[type=checkbox]')
    .filter(function(idx){
        return $(this).prop('checked') === false
    }),
    function(idx, el){
        // attach matched element names to the formData with a chosen value.
        var emptyVal = "1";
        formData += '&' + $(el).attr('name') + '=' + emptyVal;
    }
);
    
    if(wids_err){
        $.ajax({
            url:base_url+'add-table-col',
            type:'post',
            data:formData,
            success: function(out){
                var out = JSON.parse(out);
                if(out.status==1){
                    $('#tableModal'+q_id+'').find('.modal-dialog').css('max-width','1200px');
                    var out = '<div class="col-lg-12 rows" id="col-div'+q_id+'" style="display:flex;">';
                    var num = 2;
                    if(cols.length>5) num = 1;
                    for(var i=0;i<cols.length;i++){

                            
                        var html = '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">'+cols[i].value+'</label>'+
                        '<input type="text" class="form-control" name="row_value[]" placeholder="Enter Value" required></div></div>';
                        out += html;
                    }
                    // out += '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label">Keywords</label><input type="text" class="form-control key-tags" name="val_keys[]" value="" placeholder="Enter Keywords"></div></div><div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-plus-btn"><i class="fa fa-plus"></i></button></div></div></div>';
                    out += '<div class="col-md-'+num+' col-lg-'+num+'">'+
                    '<div class="form-group"><label class="form-label row_name">&nbsp;</label><button class="btn btn-info row-plus-btn" data-id="'+q_id+'">'+
                    '<i class="fa fa-plus"></i></button></div></div></div>';


                 //console.log(html);
                    $('#row-data'+q_id+'').val(out);
                    $('#define-row-div'+q_id+'').html(out);
                    // $(document).find('.key-tags').each(function(){
                    //     $(this).selectize({
                    //         delimiter: ',',
                    //         persist: false,
                    //         create: function(input) {
                    //             return {
                    //                 value: input,
                    //                 text: input
                    //             }
                    //         }
                    //     });
                    // })
                    $('#define-cols-div'+q_id+'').hide();
                    $('#btn-two'+q_id+'').hide();
                    $('#define-row-div'+q_id+'').show();
                    $('#btn-three'+q_id+'').show();
                }
                else{
                    alert('Oops something went wrong!');
                }
            }
        })
    }
})


$(document).on('click','.row-plus-btn-new',function(){
    $(this).removeClass('row-plus-btn-new');
    $(this).addClass('row-minus-btn-new');
    $(this).html('<i class="fa fa-minus"></i>');
    var html = $('#row-data').val();
    var time = new Date().getTime();
    var tag = 'key-tags'+time;
    html = html.replace('key-tags',tag);
    $('.rows:last').after(html);
    $('.'+tag).selectize({
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

$(document).on('click','.row-plus-btn',function(){

     var q_id = $(this).data('id');
    $(this).removeClass('row-plus-btn');
    $(this).addClass('row-minus-btn');
    $(this).html('<i class="fa fa-minus"></i>');
    var html = $('#row-data'+q_id+'').val();
    var time = new Date().getTime();
    var tag = 'key-tags'+time;
    html = html.replace('key-tags',tag);
    $('.rows:last').after(html);
    $('.'+tag).selectize({
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

$(document).on('click','.row-minus-btn',function(){
    $(this).parent().parent().parent().remove();
})

$(document).on('click','.row-minus-btn-new',function(){
    $(this).parent().parent().parent().remove();


    
})


$(document).on('click','.row-minus-btn-new-pre',function(){
    $(this).parent().parent().parent().remove();

    var id = $('.qt_id').val();
    var tab_id = $('.tab_id').val();
    
    
    /*$.ajax({
        url:base_url+'remove-ans-row',
        type:'post',
        data:{id:id,tab_id:tab_id},
        success:function(out){
            var out = JSON.parse(out);
            if(out.status==1){
                $('#tableModal'+q_id+'').find('.modal-dialog').css('max-width','800px');
                $('#define-cols-div'+q_id+'').show();
                $('#btn-two'+q_id+'').show();
                $('#define-row-div'+q_id+'').hide();
                $('#btn-three'+q_id+'').hide();
            }
            else{
                alert('Oops something went wrong!');
            }
        }
    })*/
})

$(document).on('click','#add-row-btn',function(){
    
    var q_id = $(this).data('id');
    var id = $('.qt_id'+q_id+'').val();
    console.log($('#row-form'+q_id+'').serialize());
    $.ajax({
        url:base_url+'add-rows',
        type:'post',
        data:$('#row-form'+q_id+'').serialize(),
        success:function(out){
            var out = JSON.parse(out);
            if(out.status==1){
                $('.qt-btn').hide();
                $('.qt-tabl-div'+q_id+'').show();
                $('.qt_table_id'+q_id+'').val(id);
                $('.qt-remove-btn'+q_id+'').attr('data-id',id);
                $('#tableModal'+q_id+'').modal('hide');
                var html = $('#col-div'+q_id+'').html();
                $('#define-cols-div'+q_id+'').html('<div class="col-lg-12" id="col-div" style="display:flex;">'+html+'</div>');
                $('#col-div').find('.form-control').val('');
                $('#define-table-div'+q_id+'').show();
                $('#btn-one'+q_id+'').show();
                $('#define-row-div'+q_id+'').hide();
                $('#btn-three'+q_id+'').hide();
                $('#table_name'+q_id+'').val('');
                $('#table_cols').val('');
            }
            else{
                alert('Oops something went wrong!');
            }
        }
    })
})

$(document).on('click','.cancel-qt-btn',function(){
     var id = $(this).attr('data-id');
      var q_id = $(this).data('id');
      
    $('#table_name'+q_id+'').val('');
    $('#table_cols'+q_id+'').val('');
    $('#tableModal'+q_id+'').modal('hide');
})

$(document).on('click','#prev-qt-btn',function(){
    var id = $('.qt_id').val();
    var q_id = $(this).data('id');
    $.ajax({
        url:base_url+'remove-qt',
        type:'post',
        data:{id:id},
        success:function(out){
            var out = JSON.parse(out);
            if(out.status==1){
                var html = $('#col-div'+q_id+'').html();
                $('#define-cols-div'+q_id+'').html('<div class="col-lg-12" id="col-div" style="display:flex;">'+html+'</div>');
                $('#col-div'+q_id+'').find('.form-control').val('');
                $('#define-table-div'+q_id+'').show();
                $('#btn-one'+q_id+'').show();
                $('#define-cols-div'+q_id+'').hide();
                $('#btn-two'+q_id+'').hide();
            }
            else{
                alert('Oops something went wrong!');
            }
        }
    })
})

$(document).on('click','#prev-col-btn',function(){
    var id = $('.qt_id').val();
    var q_id = $(this).data('id');
    $.ajax({
        url:base_url+'remove-qt-cols',
        type:'post',
        data:{id:id},
        success:function(out){
            var out = JSON.parse(out);
            if(out.status==1){
                $('#tableModal'+q_id+'').find('.modal-dialog').css('max-width','800px');
                $('#define-cols-div'+q_id+'').show();
                $('#btn-two'+q_id+'').show();
                $('#define-row-div'+q_id+'').hide();
                $('#btn-three'+q_id+'').hide();
            }
            else{
                alert('Oops something went wrong!');
            }
        }
    })
})

$(document).on('click','#remove-qtable-btn',function(){
    $('#prev-col-btn').trigger('click');
    $('#prev-qt-btn').trigger('click');
    $('#table_name').val('');
    $('#table_cols').val('');
    $('#tableModal').modal('hide');
})

$(document).on('click','.qt-remove-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.ajax({
        url:base_url+'remove-qt-table',
        type:'post',
        data:{id:id},
        success:function(out){
            var out = JSON.parse(out);
            if(out.status==1){
                $('.qt-btn').show();
                $('.qt-tabl-div'+id+'').hide();
                $('.qt_table_id').val('');
            }
            else{
                alert('Oops something went wrong!');
            }
        }
    })
})


$(document).on('click','.edit-qt-remove-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.ajax({
        url:base_url+'remove-qt-table',
        type:'post',
        data:{id:id},
        success:function(out){
            var out = JSON.parse(out);
            if(out.status==1){
                $('.qt-btn').show();
                $('.qt-tabl-div'+id+'').hide();
                $('.qt_table_id').val('');
            }
            else{
                alert('Oops something went wrong!');
            }
        }
    })
})

$(document).on('click','.add-qt-keys',function(){
   var id = $(this).attr('data-id');
   $('#qt_val_id').val(id);



   $.ajax({
        url:base_url+'AdminAjaxController/get_qt_key',
        type:'post',
        data:{id:id
        },
        success: function(out){
            var out = JSON.parse(out);
            if(out.status==1){
                // $('#qt_val_id').val('');
                // key_tags[0].selectize.clearOptions();
                // $('#keyModal').modal('hide');
//console.log(out);
                $('#edit_transaction_value').val(out.data.val_value)
                $('#edit_help_text').val(out.data.val_help);
                 var select = $('#input-tags4').selectize();

                  var control = select[0].selectize;
                    control.clear();
                    control.clearOptions();

                var selectize = select[0].selectize;
                var keys = out.data.keywords;
                for(var i=0;i<keys.length;i++){
                    selectize.addOption(out.data.keywords[i]);
                    selectize.addItem(out.data.keywords[i].value,true); 
                }

            }
            else{
                alert('Oops something went wrong!');
            }
        }
    })
   $('#keyModal').modal('show');
})


function add_row_question_edit(){
      var i=0;

    $('.qt-btn').each(function (index, value) {

i++;

    });
    

var k=i-1;

                if(i<7){
                 var html = $('#repeat_quest').html();

                                   
                                   $('#rep_div_qt').css('border-top-width','1px');
                                   $('#rep_div_qt').css('border-top-style','solid');
                                        $('#rep_div_qt').append('<div class="col-md-6 col-lg-6 repeat_row" ><div class="col-md-12 col-lg-12">'+
                                        '<div class="form-group"><label class="form-label"> Add question table</label>'+
                                            '<button type="button" class="qt-btn" data-toggle="modal" data-target="#tableModal'+k+'">Add</button>'+
                                            '<div class="qt-tabl-div'+k+'" style="display:none;">'+
                                                                           ' <p><span class="qt-tabl-name'+k+'"></span>&emsp;<a class="qt-remove-btn'+k+'" href="#">Remove</a>'+
                                                '</p></div><input type="hidden" name="qt_id[]" class="qt_table_id'+k+'">'+ 
                                        '</div></div>'+

                                     '<div class="col-md-12 col-lg-12"> <div class="form-group"><label class="form-label">Transactions</label>'+
                                            '<ol id="transactions'+k+'"> </ol>'+
                                            '<button type="button" class="btn btn-bitbucket" data-toggle="modal" data-target="#myModal'+k+'"><i class="fa fa-plus"></i></button>'+
                                        '</div><input type="hidden" name="transaction_ids_edit'+k+'" id="transaction_ids_edit'+k+'"></div></div>');
                }
                else{
                  alert('Maximum limit exceeded') ; 
                }

               
}


function add_row_question(){


    var i=0;

    $('.qt-btn').each(function (index, value) {

i++;

    });
var k=i-1;

                if(i<7){
                 var html = $('#repeat_quest').html();
                                   
                                        $('#rep_div').append('<div class="col-md-6 col-lg-6 repeat_row" ><div class="col-md-12 col-lg-12">'+
                                        '<div class="form-group"><label class="form-label"> Add question table</label>'+
                                            '<button type="button" class="qt-btn" data-toggle="modal" data-target="#tableModal'+k+'">Add</button>'+
                                            '<div class="qt-tabl-div'+k+'" style="display:none;">'+
                                                                           ' <p><span class="qt-tabl-name'+k+'"></span>&emsp;<a class="qt-remove-btn'+k+'" href="#">Remove</a>'+
                                                '</p></div><input type="hidden" name="qt_id[]" class="qt_table_id'+k+'">'+ 
                                        '</div></div>'+



                                    '<div class="col-md-12 col-lg-12"> <div class="form-group"><label class="form-label">Transactions</label>'+
                                            '<ol id="transactions'+k+'"> </ol>'+
                                            '<button type="button" class="btn btn-bitbucket" data-toggle="modal" data-target="#myModal'+k+'"><i class="fa fa-plus"></i></button>'+
                                        '</div><input type="hidden" name="transaction_ids'+k+'" id="transaction_ids'+k+'"></div></div>');
                }
                else{
                  alert('Maximum limit exceeded') ; 
                }
    
                   
}

$(document).on('click','#add-qt-keys-btn',function(){
    var id = $('#qt_val_id').val();
    var val = $.trim($('#edit_transaction_value').val());
    var help = $.trim($('#edit_help_text').val());
    var keys = $('#input-tags4').val();
  //console.log(keys);
   // var keywords = $('#input-tags3').val();
    $.ajax({
        url:base_url+'add-qt-keys',
        type:'post',
        data:{id:id,val:val,keys:keys,help:help},
        success: function(out){
            var out = JSON.parse(out);
            if(out.status==1){



                // $('#qt_val_id').val('');
                // key_tags[0].selectize.clearOptions();
                // $('#keyModal').modal('hide');
                window.location.reload();
            }
            else{
                alert('Oops something went wrong!');
            }
        }
    })
})


$(document).on('keyup','.count_sub',function(){
    var count = $(this).val();
    var id = $(this).data('id');


     var html='';
    for (var i = 1; i <= count; i++) {

        html+='<div class="form-group"><label class="form-label">Column'+i+' width</label>'+
            '<input type="text" class="form-control col_width'+i+'" name="col_width'+i+'" id="col_width'+i+'" placeholder="Enter No of Columns" data-id="'+id+'">'+
            '</div>' ;
    }
     $('.column_width_div'+id+'').html(html);

 
})

$(document).on('click','.add_subtable_btn',function(){
    var id = $(this).data('id');
    var count=$('.count_sub[data-id="'+id+'"]').val();
   //var htm=$('.column_width_div'+id+'').html();
    var htm='';
    var val='';
   for(var i = 1; i <= count; i++) {
           val +=$('#col_width'+i+'[data-id="'+id+'"] ').val()+','; 

          // var value = $('#transaction_ids'+q_id+'').val();
                    // if(value) $('#transaction_ids'+q_id+'').val(value+','+out.data);
                    // else $('#transaction_ids'+q_id+'').val(out.data);
          
      
    }

      htm+='<div class="form-group">'+
            '<input type="text" class="form-control col_width'+id+'" name="col_width'+id+'" id="col_width'+id+'" placeholder="Enter No of Columns" value="'+val+'">'+
            '</div>' ;

   
     $('.count_sub_col'+id+'').val(count);
   $('#sub_width'+id+'').html(htm);
   $('#editModal'+id+'').modal('hide');

})


