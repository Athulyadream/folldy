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

                 if(!$.isNumeric(input)) {
                                var val=input;
                             }else{
                                var val=input
                                .replace(/\D/g, "")
                                .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                                ;
                             }

                $.ajax({
                    url: base_url+'add-keywords',
                    type: 'POST',
                    data: {value:val},
                    success: function (result) {
                        if (result) {
                             


                             
                            callback({ value: result, text: val});
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
                 if(!$.isNumeric(input)) {
                                var val=input;
                             }else{
                                var val=input
                                .replace(/\D/g, "")
                                .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                                ;
                             }
                $.ajax({
                    url: base_url+'add-keywords',
                    type: 'POST',
                    data: {value:val},
                    success: function (result) {
                        if (result) {
                             


                             
                            callback({ value: result, text: val});
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

                if(!$.isNumeric(input)) {
                                var val=input;
                             }else{
                                var val=input
                                .replace(/\D/g, "")
                                .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                                ;
                             }

                $.ajax({
                    url: base_url+'add-keywords',
                    type: 'POST',
                    data: {value:val},
                    success: function (result) {
                        if (result) {
                            console.log(input);
                             // if(event.which >= 37 && event.which <= 40) ;

                             


                             
                            callback({ value: result, text: val});

                            

                             // $(this).val(function(index, value) {
                                
                             //  });
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
                 if(!$.isNumeric(input)) {
                                var val=input;
                             }else{
                                var val=input
                                .replace(/\D/g, "")
                                .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                                ;
                             }
                $.ajax({
                    url: base_url+'add-keywords',
                    type: 'POST',
                    data: {id:id,value:val},
                    success: function (result) {
                         if (result) {

                             
                            callback({ value: result, text: val});
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

                if(!$.isNumeric(input)) {
                                var val=input;
                             }else{
                                var val=input
                                .replace(/\D/g, "")
                                .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                                ;
                             }
                $.ajax({
                    url: base_url+'add-keywords',
                    type: 'POST',
                    data: {value:val},
                    success: function (result) {
                        if (result) {
                              


                             
                            callback({ value: result, text: val});
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


       
          key_tags = $('.key-tags-new').selectize({
                        delimiter: ';',
                       //persist: false,
                       //create:false,
                        create: function(input,callback) {

                             if(!$.isNumeric(input)) {
                                var val=input;
                             }else{
                                var val=input
                                .replace(/\D/g, "")
                                .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                                ;
                             }
                $.ajax({
                    url: base_url+'add-keywords',
                    type: 'POST',
                    data: {value:val},
                    success: function (result) {
                        if (result) {
                              


                             
                            callback({ value: result, text: val});
                        }
                    }
                });


                            // return {
                            //     value: val,
                            //     text: val
                            // }
                        }
                    });


        key_tags = $('.key-tags').selectize({
                        delimiter: ';',
                       //persist: false,
                       //create:false,
                        create: function(input) {

                             if(!$.isNumeric(input)) {
                                var val=input;
                             }else{
                                var val=input
                                .replace(/\D/g, "")
                                .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                                ;
                             }

                            return {
                                value: val,
                                text: val
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
                    else if(out.status == 0){
                        $('#reset-div').show();
                        $('#reset-err').html('Current password does not match!');
                    }
                    else if(out.status == 2){
                        $('#reset-div').show();
                        $('#reset-err').html('Reset password failed!');
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

$(document).on('click','.change-ins-password-btn', function(){
    $('#reset-div').hide();
    var cur_pass = $.trim($('#cur_pass').val());
    var new_pass = $.trim($('#new_pass').val());
    var c_pass = $.trim($('#c_pass').val());
    if(cur_pass && new_pass && c_pass){
        if(new_pass == c_pass){
            $.ajax({
                url: base_url+'institute-reset-password',
                type:'post',
                data: {cur_pass:cur_pass,new_pass:new_pass,c_pass:c_pass},
                success: function(out){
                    var out = JSON.parse(out);
                    if(out.status == 1){
                        window.location.reload();
                    }
                    else if(out.status == 0){
                        $('#reset-div').show();
                        $('#reset-err').html('Current password does not match!');
                    }
                    else if(out.status == 2){
                        $('#reset-div').show();
                        $('#reset-err').html('Reset password failed!');
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

$(document).on('click','.change-teacher-password-btn', function(){
    $('#reset-div').hide();
    var cur_pass = $.trim($('#cur_pass').val());
    var new_pass = $.trim($('#new_pass').val());
    var c_pass = $.trim($('#c_pass').val());
    if(cur_pass && new_pass && c_pass){
        if(new_pass == c_pass){
            $.ajax({
                url: base_url+'teacher-reset-password',
                type:'post',
                data: {cur_pass:cur_pass,new_pass:new_pass,c_pass:c_pass},
                success: function(out){
                    var out = JSON.parse(out);
                    if(out.status == 1){
                        window.location.reload();
                    }
                    else if(out.status == 0){
                        $('#reset-div').show();
                        $('#reset-err').html('Current password does not match!');
                    }
                    else if(out.status == 2){
                        $('#reset-div').show();
                        $('#reset-err').html('Reset password failed!');
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
    $('.alert').hide();
})
$(document).on('click','#add-ins-user-btn',function(event){
    event.preventDefault();

    $('#roles-table').hide();
    $('#add-ins-user-form').show();
    $('.alert').hide();
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
//institute login

$('#institute-login-form').submit(function(event) {
    event.preventDefault();
    var username = $.trim($('#username').val());
    var password = $.trim($('#password').val());
    $('.alert').removeClass('alert-danger');

    if(username && password){
        $.ajax({
            url:base_url+'institute-login',
            data:{username:username,password:password},
            type:'post',
            success: function(out){
                out = JSON.parse(out);
                if(out.status == 1){
                    $('.alert').addClass('alert-success');
                    $('.alert').html('Login successfull! Redirecting...');
                    setTimeout(function(){window.location.href = base_url+'institute-dashboard';},1500);
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

//teacher login

$('#teacher-login-form').submit(function(event) {
    event.preventDefault();
    var username = $.trim($('#username').val());
    var password = $.trim($('#password').val());
    //alert(username);
    $('.alert').removeClass('alert-danger');

    if(username && password){
        $.ajax({
            url:base_url+'teacher-login',
            data:{username:username,password:password},
            type:'post',
            success: function(out){
                out = JSON.parse(out);
                if(out.status == 1){
                    $('.alert').addClass('alert-success');
                    $('.alert').html('Login successfull! Redirecting...');
                    setTimeout(function(){window.location.href = base_url+'teacher-dashboard';},1500);
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
    $('.alert').hide();
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
    $('.alert').hide();
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

$(document).on('click','.edit-ins-btn',function(e){
    e.preventDefault();
    $('.alert').hide();
    var id = $(this).attr('data-id');
    //alert(id);
    $.ajax({
        url:base_url+'get-institute',
        data:{id:id},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            //console.log(out.data.name_abbreviation);
            if(out.status == 1){
                $('#ins_id').val(out.data.institute_id);
                //$('#edit_ins_role').val(out.data.role_id);
                $('#edit_ins_name').val(out.data.institute_name);
                $('#edit_ins_email').val(out.data.institute_email);
                $('#edit_abbreviations').val(out.data.name_abbreviation);
                //$('#edit_admin_username').val(out.data.admin_username);
                $('#edit_ins_phone').val(out.data.institute_phone);
                if(out.data.institute_status==1) $('#edit_ins_status').attr('checked',true);
                scourse = out.course;
                if(scourse.length >0)
                { 
                    for(i=0;i<scourse.length;i++)
                    {     
                        $('#course_'+scourse[i].course_id).attr('selected',true);              
                         course_multiple();
                   }              
                }
                else{
                    course_multiple();
                }

                $('#roles-table').hide();
                $('#edit-ins-form').show();
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
$(document).on('click','.edit-ins-user-btn',function(e){
    e.preventDefault();
    $('.alert').hide();
    var id = $(this).attr('data-id');
    //alert(id);
    $.ajax({
        url:base_url+'get-institute-user',
        data:{id:id},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            //console.log(out.status);
            if(out.status == 1){
                $('#ins_id').val(out.data.id);
                //$('#edit_admin_role').val(out.data.role_id);
                $('#edit_name').val(out.data.name);
                $('#edit_email').val(out.data.email);
                $('#edit_username').val(out.data.username);
                $('#edit_phone').val(out.data.phone);
                if(out.data.status==1) $('#edit_status').attr('checked',true);
                $('#roles-table').hide();
                $('#edit-ins-user-form').show();
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

$(document).on('click','.edit-teacher-btn',function(e){
    e.preventDefault();
    $('.alert').hide();
    var id = $(this).attr('data-id');
    //alert(id);
    $.ajax({
        url:base_url+'get-teacher',
        data:{id:id},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            console.log(out.subject);
            if(out.status == 1){
                $('#edit_id').val(out.data.teacher_id);
                //$('#edit_subject').val(out.data.subject_id);
                $('#edit_teacher_name').val(out.data.teacher_name);
                $('#edit_teacher_email').val(out.data.teacher_email);
                $('#edit_teacher_username').val(out.data.teacher_username);
                $('#edit_teacher_phone').val(out.data.teacher_phone);
                if(out.data.teacher_status==1) $('#edit_teacher_status').attr('checked',true);
                scourse = out.subject;
                if(scourse.length >0)
                { 
                    for(i=0;i<scourse.length;i++)
                    {   
                        
                        //$('#edit_admin_user_zone').val(scourse[i].course_id);
                        //$('#edit_subject option[value=' +scourse[i].subject_id+ ']').attr('selected', true);      
                        $('#crs_'+scourse[i].subject_id).attr('selected',true);              
                         subject_multiple();
                   }              
                }
                else{
                    subject_multiple();
                }
                
                $('#roles-table').hide();
                $('#edit-teacher-form').show();
            }
            else if(out.status==0){
                alert(out.data);
            }
            else{
                window.location.href = base_url+"institute";
            }
        }
    })
})
function course_multiple(){

    $(".js-example-basic-multiple-selected").hide();
    new $(".js-example-basic-multiple-selected").select2({
    multiple: true,
  });
}
function subject_multiple(){

    $(".js-example-basic-multiple2-selected").hide();
    new $(".js-example-basic-multiple2-selected").select2({
    multiple: true,
  });
}

$(document).on('click','.edit-batch-btn',function(e){
    e.preventDefault();
    $('.alert').hide();
    var id = $(this).attr('data-id');
    //alert(id);
    $.ajax({
        url:base_url+'get-batch',
        data:{id:id},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            var start_date = out.data.batch_start_date;
            var newStartDate = start_date.split("-").reverse().join("/");
            

            var end_date = out.data.batch_end_date;
            var newEndDate = end_date.split("-").reverse().join("/");
            

           
            if(out.status == 1){
                $('#edit_id').val(out.data.batch_id);
                $('#edit_course').val(out.data.course_id);
                $('#edit_batch_name').val(out.data.batch_name);
                $('#edit_batch_code').val(out.data.batch_code);
                $('#edit_start_time').val(out.data.batch_start_time);
                $('#edit_end_time').val(out.data.batch_end_time);
                $('#edit_start_date').val(newStartDate);
                $('#edit_end_date').val(newEndDate);
                $('#edit_period_no').val(out.data.batch_periods);
                $('#edit_description').text(out.data.batch_description);

                sbatch = out.period;
                if(sbatch.length >0)
                { 
                    for(i=0;i<sbatch.length;i++)
                    {          
                        $('#edit_day'+sbatch[i].weekdays).attr('checked',true);              
                   }
                                    
                } 
                if(out.data.batch_status==1) $('#edit_batch_status').attr('checked',true);
                
                $('#roles-table').hide();
                $('#edit-batch-form').show();
            }
            else if(out.status==0){
                alert(out.data);
            }
            else{
                window.location.href = base_url+"batch";
            }
        }
    })
})

$(document).on('click','.edit-student-btn',function(e){
    e.preventDefault();
    $('.alert').hide();
    var id = $(this).attr('data-id');
    //alert(id);
    $.ajax({
        url:base_url+'get-student',
        data:{id:id},
        type:'post',
        success: function(out){
            out = JSON.parse(out);

            var date = out.data.dob;
            var dob = date.split("-").reverse().join("/");
            

            
            //console.log(newStartDate);
            if(out.status == 1){
                $('#edit_id').val(out.data.id);
                $('#edit_name').val(out.data.name);
                $('#edit_email').val(out.data.email_id);
                $('#edit_phone').val(out.data.phone);
                if(out.data.gender==1) $('#male').attr('checked',true);
                else if(out.data.gender==2) $('#female').attr('checked',true);
                else $('#other').attr('checked',true);
                $('#edit_dob').val(dob);
                $('#edit_address').text(out.data.address);
                if(out.data.status==1) $('#edit_status').attr('checked',true);
                $('#edit_course').val(out.data.course_id);
                checkcourse_edit(out.data.course_id,out.data.batch_id);
                //$('#edit_batch').val(out.data.batch_id);
                $('#roles-table').hide();
                $('#edit-student-form').show();
            }
            else if(out.status==0){
                alert(out.data);
            }
            else{
                window.location.href = base_url+"students";
            }
        }
    })
})

$(document).on('click','.edit-news-btn',function(e){
    e.preventDefault();
    $('.alert').hide();
    var id = $(this).attr('data-id');
    //alert(id);
    $.ajax({
        url:base_url+'get-news',
        data:{id:id},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            var date = out.data.news_date;
            var newDate = date.split("-").reverse().join("/");

            //console.log(newStartDate);
            if(out.status == 1){
                $('#edit_id').val(out.data.news_id);
                $('#edit_heading').val(out.data.news_heading);
                $('#edit_date').val(newDate);
               
                $('#edit_description').text(out.data.news_description);
                if(out.data.news_status==1) $('#edit_status').attr('checked',true);
                $('#roles-table').hide();
                $('#edit-news-form').show();
            }
            else if(out.status==0){
                alert(out.data);
            }
            else{
                window.location.href = base_url+"news";
            }
        }
    })
})

$(document).on('click','.edit-admin-news-btn',function(e){
    e.preventDefault();
    $('.alert').hide();
    var id = $(this).attr('data-id');
    //alert(id);
    $.ajax({
        url:base_url+'get-admin-news',
        data:{id:id},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            var date = out.data.news_date;
            var newDate = date.split("-").reverse().join("/");

            //console.log(newStartDate);
            if(out.status == 1){
                $('#edit_id').val(out.data.news_id);
                $('#edit_heading').val(out.data.news_heading);
                $('#edit_date').val(newDate);
               
                $('#edit_description').text(out.data.news_description);
                if(out.data.news_status==1) $('#edit_status').attr('checked',true);
                $('#roles-table').hide();
                $('#edit-news-form').show();
            }
            else if(out.status==0){
                alert(out.data);
            }
            else{
                window.location.href = base_url+"news";
            }
        }
    })
})

$(document).on('click','.edit-events-btn',function(e){
    e.preventDefault();
    $('.alert').hide();
    var id = $(this).attr('data-id');
    //alert(id);
    $.ajax({
        url:base_url+'get-events',
        data:{id:id},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            var date = out.data.event_date;
            var newDate = date.split("-").reverse().join("/");

            //console.log(newStartDate);
            if(out.status == 1){
                $('#edit_id').val(out.data.event_id);
                $('#edit_title').val(out.data.event_title);
                $('#edit_date').val(newDate);
                if(out.data.event_status==1) $('#edit_status').attr('checked',true);
                $('#roles-table').hide();
                $('#edit-events-form').show();
            }
            else if(out.status==0){
                alert(out.data);
            }
            else{
                window.location.href = base_url+"events";
            }
        }
    })
})

function checkcourse_edit(id,batch='')
   {
      //var id = $.trim($(event).val());
      //alert(batch);
      $.ajax({
         type:'post',
         url:base_url+"get-batch-course",
         data:{value:id},
         success: function(result){
            //console.log(result);
            var data = jQuery.parseJSON(result);
            var sbatch = data['batch'];    
            categoryS="<option value>--SELECT--</option>";
            if(sbatch.length >0)
            { 
               for(i=0;i<sbatch.length;i++)
               {  
               if(batch == sbatch[i].batch_id) {
                 categoryS +='<option selected value="'+ sbatch[i].batch_id +'">'+sbatch[i].batch_name+'</option>'; 
               }  
               else{          
                  categoryS +='<option value="'+ sbatch[i].batch_id +'">'+sbatch[i].batch_name+'</option>';                
               }
               }
                                
            } 
           $("#edit_batch").removeClass('is-invalid');
            $("#edit_batch").html(categoryS);  

         }.bind(this)

      });
   }    


$(document).on('click','.edit-table-btn',function(e){
    e.preventDefault();
    $('.alert').hide();
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
    $('.alert').hide();
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





$(document).on('click','.clone-question-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.confirm({
        title: 'Confirm clone!',
        content: 'Cant be reversed!',
        buttons: {
            confirm: function () {


                $('#cloneModal').modal('show');
                $('.clone-add-btn').attr('data-id',id);




                // $.ajax({
                //     type:'post',
                //     url:base_url+'clone-question',
                //     data:{id:id},
                //     success: function(out){
                //         var out = JSON.parse(out);
                //         if(out.status == 404){
                //             window.location.href = base_url;
                //         }
                //         else if(out.status == 1){
                //             window.location.reload();
                //         }
                //         else{

                //         }
                //     }
                // })
            },
            cancel: function () {
                console.log('Cancelled!');
            }
        }
    });
})


$(document).on('click','.clone-add-btn',function(e){
    e.preventDefault();
        var course_id = $( "#cr_id option:selected" ).val();
                var papr_id = $( "#pr_id option:selected" ).val();
                    var id = $(this).attr('data-id');


        var chpt_id = $( "#ch_id option:selected" ).val();




   





                 $.ajax({
                    type:'post',
                    url:base_url+'clone-question',
                    data:{course_id:course_id,papr_id:papr_id,chpt_id:chpt_id,id:id},
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
        
            
})




$(document).on('click','#add-qt-btn',function(){
      var q_id = $(this).data('id');

    var name = $.trim($('#table_name'+q_id+'').val());
    var nos = $.trim($('#table_cols'+q_id+'').val());
    var width = $.trim($('#single_width').val());
  
   // alert(q_id);
    if( nos && (nos<8)){
        $.ajax({
            url:base_url+'add-question-table',
            type:'post',
            data:{name:name,nos:nos,width:width},
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




$(document).on('click','#add-ans_tbl-btn',function(){
    var id = $('.qt_id').val();
       $('#row-form').find(':checkbox:not(:checked)').attr('value', '0').prop('checked', true);

    
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
   $('#row-form').find(':checkbox:not(:checked)').attr('value', '0').prop('checked', true);

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
        //console.log($(this));
    });
    var wids = $(this).parent().parent().parent().parent().parent().find('input[name="col_width[]"]').each(function(){
        return $(this);
    });

var splashArray = new Array();

    //  $(this).parent().parent().parent().parent().parent().find('input[name="column_one_check[]"]').each(function(){
       

    // });


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
   $('#col-form'+q_id+'').find(':checkbox:not(:checked)').attr('value', '0').prop('checked', true);

var formData=$('#col-form'+q_id+'').serialize();



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



 $('#col-form'+q_id+' input:checkbox').each(function(){
         splashArray.push($(this).val());
    });

console.log(splashArray[0]);
    //console.log(formData['column_one_check']) ;

   
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

                        if(splashArray[i]=='1'){

                        var html = '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">'+cols[i].value+'</label>'+
                        '<input type="text" class="form-control number" name="row_value[]" placeholder="Enter Value" required></div></div>';

                        }else{
                            var html = '<div class="col-md-'+num+' col-lg-'+num+'"><div class="form-group"><label class="form-label row_name">'+cols[i].value+'</label>'+
                        '<input type="text" class="form-control " name="row_value[]" placeholder="Enter Value" required></div></div>';
                        }

                            

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



// $('input.number').keyup(function(event) {

//   // skip for arrow keys
//   if(event.which >= 37 && event.which <= 40) return;

//   // format number
//   $(this).val(function(index, value) {
//     return value
//     .replace(/\D/g, "")
//     .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
//     ;
//   });
// });

function commaSeparateNumber(val){
    while (/(\d+)(\d{3})/.test(val.toString())){
      val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
    }
    return val;
  }

$(document).on('keyup','.number',function(event){


  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40) return;
  if ((event.shiftKey || (event.keyCode < 48 || event.keyCode > 57)) && (event.keyCode < 96 || event.keyCode > 105)) {
           return;
        }
        else{


            $(this).val(function(index, value) {


    //              while (/(\d+)(\d{3})/.test(value.toString())){
    //   value = value.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
    // }
    // return value;


                // commaSeparateNumber(value);

                //    if (!$.isNumeric(value)) {
                //     return;
                // } else {
                //         return value
                //         .replace(/,/g, "")
                        
                //         .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                //         ;
                // }


                  //  $(this).val(x.toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));


    return value
     .replace(/,/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    ;
  });

        }

  // format number
  

});


$(document).on('click','.row-plus-btn-new',function(){
    $(this).removeClass('row-plus-btn-new');
    $(this).addClass('row-minus-btn-new');
    $(this).html('<i class="fa fa-minus"></i>');



    var html = $('#row-data').val();
    console.log(html);

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


$(document).on('click','.row-plus-btn-edit',function(e){
    e.preventDefault();
     // $(this).removeClass('row-plus-btn-new');
     // $(this).addClass('row-minus-btn-new');
// $(this).html('<i class="fa fa-minus"></i>');
    var val='';


//$("#row-data-edit").find("input").val('');

    $('#row-data-edit').find('input:text,input:checkbox,textarea')
        .each(function() {
           
           $(this).val('');
         //  var gffg =$('#row-data-edit').html();
         var htm= $(this).parent().html();
        // console.log(htm)


         
        //console.log($('#row-data-edit').html());
        }); 
       // $("#row-data-edit").load(location.href+" #row-data-edit>*",""); 

      var html=$('#row-data-edit').html();


  //var gg=$('#row-data-edit').html(html);    
  
  //   //alert("fddfdf");

  //   var time = new Date().getTime();


  //  //  html = html.replace('input','');

   
  $('.rows:last').after(html);
    
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
                 var select = $('#input-tags4').selectize({
                    
                 });
                

                  
//$('#input-tags4').selectize()[0].selectize.destroy();

                  var control = select[0].selectize;
                    control.clear();
                    control.clearOptions();
                    // control.renderCache['option'] = {};
                    //     control.renderCache['item'] = {};
                   //control.refreshOptions();
                   // control.renderCache = {};

                var selectize = select[0].selectize;
                // selectize.clear();
                // selectize.clearOptions();
                // selectize.renderCache['option'] = {};
                //         selectize.renderCache['item'] = {};
               //selectize.refreshOptions();
                // $(".selectize-dropdown-content").html('');
                // $("#input-tags4-selectized").val('');
               
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

        html+='<div  class="row"><div  class="col-md-6 col-lg-6"><div class=" form-group"><label class="form-label">Column'+i+' width</label>'+
            '<input type="text" class="form-control col_width'+i+'" name="col_width'+i+'" id="col_width'+i+'" data-id="'+id+'" style="width:50%">'+
            '</div></div>'+
                '<div class="col-md-6 col-lg-6"><div class=" form-group"><label class="form-label">Calculate Sum</label>'+
            ' <input type="checkbox" class="form-control col-sub-sum'+i+' " name="col-sub-sum-check'+i+'" id="col_sub_sum_check'+i+'" data-id="'+id+'"  value="0" style="width:50%">'+
            '</div></div></div>' ;
    }
     // html+='';
     $('.column_width_div'+id+'').html(html);

 
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




$(document).on('click','.delete-course-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.confirm({
        title: 'Confirm delete!',
        content: 'Whole papers , questions & chapters in this course will be lost!',
        buttons: {
            confirm: function () {
                $.ajax({
                    type:'post',
                    url:base_url+'delete-course',
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



$(document).on('click','.delete-question-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.confirm({
        title: 'Confirm delete!',
        content: 'Cant be reversed!',
        buttons: {
            confirm: function () {
                $.ajax({
                    type:'post',
                    url:base_url+'delete-question',
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


$(document).on('click','.delete-admin-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.confirm({
        title: 'Confirm delete!',
        content: 'Cant be reversed!',
        buttons: {
            confirm: function () {
                $.ajax({
                    type:'post',
                    url:base_url+'delete-admin',
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


$(document).on('click','.delete-table-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.confirm({
        title: 'Confirm delete!',
        content: 'Cant be reversed!',
        buttons: {
            confirm: function () {
                $.ajax({
                    type:'post',
                    url:base_url+'delete-table',
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


$(document).on('click','.delete-paper-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.confirm({
        title: 'Confirm delete!',
        content: 'Cant be reversed!',
        buttons: {
            confirm: function () {
                $.ajax({
                    type:'post',
                    url:base_url+'delete-paper',
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

$(document).on('click','.delete-chapter-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.confirm({
        title: 'Confirm delete!',
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

$(document).on('click','.delete-design-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.confirm({
        title: 'Confirm delete!',
        content: 'Cant be reversed!',
        buttons: {
            confirm: function () {
                $.ajax({
                    type:'post',
                    url:base_url+'delete-chapter-design',
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

$(document).on('click','.forgot-password',function(e){
    e.preventDefault();
    var username = $('#username').val();
    if(username != ''){
    $.ajax({
            url: base_url+'forgot-password',
            type:'post',
            data: {username:username},
            success: function(out){
               out = JSON.parse(out);
                if(out.status == 1){
                    $('.alert').addClass('alert-success');
                    $('.alert').html(out.data);
                    
                }
                else{
                    $('.alert').addClass('alert-danger');
                    $('.alert').html(out.data);
                }
            }
        });
    }
    else{
        $('.alert').addClass('alert-danger');
        $('.alert').html('Enter username!');
    }
})

$(document).on('click','.forgot-password-teacher',function(e){
    e.preventDefault();
    var username = $('#username').val();
    if(username != ''){
    $.ajax({
            url: base_url+'forgot-password-teacher',
            type:'post',
            data: {username:username},
            success: function(out){
               out = JSON.parse(out);
                if(out.status == 1){
                    $('.alert').addClass('alert-success');
                    $('.alert').html(out.data);
                    
                }
                else{
                    $('.alert').addClass('alert-danger');
                    $('.alert').html(out.data);
                }
            }
        });
    }
    else{
        $('.alert').addClass('alert-danger');
        $('.alert').html('Enter username!');
    }
})

//   function checkmobile(event){
//   var phone = $.trim($(event).find('.mobile').val());
//   var uerr =1;
//   var eerr =1;
//   var merr =1;
//   //if($('#username-error').val() == 1) uerr = 0;
//   if($('#email-error').val() == 1) eerr = 0;
//   if($('#mobile-error').val() == 1) merr = 0;
//   $(event).find('.invalid-feedback').remove();
//   var reg = /^\d+$/;
//   if(reg.test(phone) && phone.length==10){
   
//     $(event).find('.mobile').removeClass('is-invalid');
//     $('form').find('button[type="submit"]').attr('disabled',true);
//     var perr = 1;
//   }
//   else{
//     $(event).find('.mobile').addClass('is-invalid');
//     //alert('Invalid phone number');
//     $(event).find('.mobile').after('<div class="invalid-feedback">Invalid phone number</div>');
//     var perr = 0;
//   }
//   if(uerr && eerr && merr && perr) return true;
//   else return false;
// }

function checkmobile(event){
  var username = $.trim($(event).find('.name').val());
  var email = $.trim($(event).find('.email').val());
  var phone = $.trim($(event).find('.mobile').val());
  
  var uerr =1;
  var eerr =1;
  var merr =1;
  var alphaExp = /^[a-zA-Z .,@-]+$/;
    if(username != ''){
        if(!username.match(alphaExp)){
            
            $(event).find('.invalid-feedback').remove();
            $(event).find('.name').addClass('is-invalid');
            
            $(event).find('.name').after('<div class="invalid-feedback">Invalid name</div>');
            var uerr = 0;
            $(".add-btn").attr('disabled',false);
            return false;
        }
    }
    //alert(email);
    var emaile = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    if(!email.match(emaile)){
        
        $(event).find('.invalid-feedback').remove();
        $(event).find('.email').addClass('is-invalid');
        
        $(event).find('.email').after('<div class="invalid-feedback">Invalid email</div>');
        var eerr = 0;
        $(".add-btn").attr('disabled',false);
        return false;
    }
    
  if($('#username-error').val() == 1) uerr = 0;
  if($('#email-error').val() == 1) eerr = 0;
  if($('#mobile-error').val() == 1) merr = 0;
  $(event).find('.invalid-feedback').remove();
  var reg = /^\d+$/;
  if(reg.test(phone) && phone.length==10){
   $('form').find('button[type="submit"]').attr('disabled',false);
    $(event).find('.mobile').removeClass('is-invalid');
    //$(".add-btn").val("Please Wait...").prop('disabled', true);
    //$('#add-form').submit();
    var perr = 1;
  }
  else{
    $(event).find('.invalid-feedback').remove();
    $(event).find('.mobile').addClass('is-invalid');
    
    $(event).find('.mobile').after('<div class="invalid-feedback">Invalid phone number</div>');
    var perr = 0;
  }
  
  if(uerr && eerr && merr && perr){

     $(".add-btn").val("Please Wait...").prop('disabled', true);
     $('#add-form').submit();
    return true;
  } 
  else return false;
}

  function checkmobile_teacher(event){
  var username = $.trim($(event).find('.name').val());
  var subject = $.trim($(event).find('.subject').val());
  var phone = $.trim($(event).find('.mobile').val());
  var email = $.trim($(event).find('.email').val());
  
  if(subject == ''){
    $(event).find('.invalid-feedback').remove();
    $(event).find('.subject').addClass('is-invalid');
        
        $(event).find('.subject').after('<div class="invalid-feedback">Please add subject</div>');
    var perr = 0;
    return false;
  }
    

  var uerr =1;
  var eerr =1;
  var merr =1;
  var alphaExp = /^[a-zA-Z .,@-]+$/;
    if(username != ''){
        if(!username.match(alphaExp)){
            
            $(event).find('.invalid-feedback').remove();
            $(event).find('.name').addClass('is-invalid');
            
            $(event).find('.name').after('<div class="invalid-feedback">Invalid name</div>');
            var perr = 0;
            return false;
        }
    }
    var emaile = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    if(!email.match(emaile)){
        
        $(event).find('.invalid-feedback').remove();
        $(event).find('.email').addClass('is-invalid');
        
        $(event).find('.email').after('<div class="invalid-feedback">Invalid email</div>');
        var perr = 0;
        return false;
    }
    
  if($('#username-error').val() == 1) uerr = 0;
  if($('#email-error').val() == 1) eerr = 0;
  if($('#mobile-error').val() == 1) merr = 0;
  $(event).find('.invalid-feedback').remove();
  var reg = /^\d+$/;
  if(reg.test(phone) && phone.length==10){
   $('form').find('button[type="submit"]').attr('disabled',false);
    $(event).find('.mobile').removeClass('is-invalid');
    var perr = 1;
    $(".add-btn").val("Please Wait...").prop('disabled', true);
    $('#add-form').submit();
  }
  else{
    $(event).find('.invalid-feedback').remove();
    $(event).find('.mobile').addClass('is-invalid');
    
    $(event).find('.mobile').after('<div class="invalid-feedback">Invalid phone number</div>');
    var perr = 0;
  }
  
  if(uerr && eerr && merr && perr){
     $(".add-btn").val("Please Wait...").prop('disabled', true);
    $('#add-form').submit();
    // return true;
  } 
  else return false;
}




$(function()
{
  $('#add-form').submit(function(){
    $(".add-btn").val("Please Wait...").prop('disabled', true);
    $('#add-form').submit();
    return true;
  });
});


$('input.username').keydown(function(e) {
    if (e.keyCode == 32) {
        return false;
    }
});


// problem solving part ///



$(function(){

//               $('.trans-tr').click(function (e) {
//                       e.preventDefault();
//                       if($('#start-order').val()==1){
//                        var q_val=$(this).find('.disc_val').data('qst');
//                        var type='qst';
//                        console.log(q_val);


//                         var vals1=$('#order-qst').val();

//                        if(vals1!=0){
//                             var valsnew1=vals1+','+q_val;
//                         }else{
//                             var valsnew1=q_val;

//                         }
//                        $('#order-qst').val(valsnew1);
//                        $(this).find('.disc_val').css('background','#2196f3b3');

//                        if($(this).find('.sub-tab-tr').length == 1){
//                          alert('hjfghjgf');

//                        }


                                            
 

//                       }else if($('#line_id').val()==1){

//                          if($(this).hasClass('td-line')){ 
//                           var underline=0;

//                         }else{ 

//                             if($(this).find('.disc_val').hasClass('line')){
//                           var underline=0;
//                                 }else{
//                           var underline=1;
//                                 }

//                         }



//                         var q_val=$(this).find('.disc_val').data('qst');
//                        var type='qst';


//                         $(this).toggleClass('td-line');

// // alert(q_val);
//                               $.ajax({
//                         url:base_url+'add-underline-val',
//                         type:'post',
//                         data:{q_val:q_val,type:type,underline:underline},
//                         success: function(out){
//                             var out = JSON.parse(out);
//                             if(out.status == 1){
//                                 $('#line_id').val(0);

//                                 if(out.answer_id){

//                                     //alert(out.answer_id);
//                                     //var id=out.answer_id;
//                                  // form.attr("data-answer",id);
//                                  // parent.attr("data-answer",id);




//                                 }

//                                 // $('.qt_id'+q_id+'').val(out.data);
//                                 // $('.qt-tabl-name'+q_id+'').html(name);
//                                 // $('#cols'+q_id+'').val(nos);

//                                 // var html = $('#col-div'+q_id+'').html();
//                                 // for(var i=0;i<nos-1;i++){
//                                 //     $('#col-div'+q_id+'').after('<div class="col-lg-12" style="display:flex;">'+html+'</div>');
//                                 // }
//                                 // $('#define-table-div'+q_id+'').hide();
//                                 // $('#btn-one'+q_id+'').hide();
//                                 // $('#define-cols-div'+q_id+'').show();
//                                 // $('#btn-two'+q_id+'').show();
//                             }
//                             else{
//                                 alert('Oops something went wrong! Please try again');
//                             }
//                         }
//                     })


                        






//                       }else if($('#double_line_id').val()==1){

//                          if($(this).hasClass('td-d-line')){ 
//                           var underline=0;

//                         }else{ 

//                             if($(this).find('.disc_val').hasClass('d-line')){
//                                 var underline=0;
//                                 }else{
//                                var underline=1;
//                                 }

//                         }



//                         var q_val=$(this).find('.disc_val').data('qst');
//                        var type='qst';


//                         $(this).toggleClass('td-d-line');

// // alert(q_val);
//                               $.ajax({
//                         url:base_url+'add-double-underline-val',
//                         type:'post',
//                         data:{q_val:q_val,type:type,underline:underline},
//                         success: function(out){
//                             var out = JSON.parse(out);
//                             if(out.status == 1){
//                                 $('#double_line_id').val(0);

//                                 if(out.answer_id){

//                                     //alert(out.answer_id);
//                                     //var id=out.answer_id;
//                                  // form.attr("data-answer",id);
//                                  // parent.attr("data-answer",id);




//                                 }

//                                 // $('.qt_id'+q_id+'').val(out.data);
//                                 // $('.qt-tabl-name'+q_id+'').html(name);
//                                 // $('#cols'+q_id+'').val(nos);

//                                 // var html = $('#col-div'+q_id+'').html();
//                                 // for(var i=0;i<nos-1;i++){
//                                 //     $('#col-div'+q_id+'').after('<div class="col-lg-12" style="display:flex;">'+html+'</div>');
//                                 // }
//                                 // $('#define-table-div'+q_id+'').hide();
//                                 // $('#btn-one'+q_id+'').hide();
//                                 // $('#define-cols-div'+q_id+'').show();
//                                 // $('#btn-two'+q_id+'').show();
//                             }
//                             else{
//                                 alert('Oops something went wrong! Please try again');
//                             }
//                         }
//                     })


                        






//                       }else if($('#inter_quest_id').val()==1){



                        
//                         var q_val=$(this).find('.disc_val').data('qst');
//                         var type='quest';

//                         $('#val_id').val(q_val);
//                         $('#type').val(type);

//                        $('#getModal').modal('show');

//                        //  var vals1=$('#order-qst').val();

//                        // if(vals1!=0){
//                        //      var valsnew1=vals1+','+q_val;
//                        //  }else{
//                        //      var valsnew1=q_val;

//                        //  }
//                        // $('#order-qst').val(valsnew1);
//                        // $(this).css('background','#2196f3b3');

//                                            //  alert(q_val);
 

//                       }



//                            if($(this).find('.disc_val').hasClass('active-order')){

//                    $(this).find('.disc_val').removeClass('active-order');
//                    //$(this).removeClass('active-order');
//                    $(this).find('.disc_val').css('background','white');
//                    var orderid=$(this).find('.disc_val').data('orderid');
//                    var type='quest';
//                    var q_val=$(this).find('.disc_val').data('qst');


//                               $.ajax({
//                         url:base_url+'remove-order-val',
//                         type:'post',
//                         data:{q_val:q_val,type:type,orderid:orderid},
//                         success: function(out){
//                             var out = JSON.parse(out);
//                             if(out.status == 1){

//                                    // window.location.reload();

//                                 if(out.answer_id){
//                                     //alert(out.answer_id);
//                                     //var id=out.answer_id;
//                                  // form.attr("data-answer",id);
//                                  // parent.attr("data-answer",id);




//                                 }

//                                 // $('.qt_id'+q_id+'').val(out.data);
//                                 // $('.qt-tabl-name'+q_id+'').html(name);
//                                 // $('#cols'+q_id+'').val(nos);

//                                 // var html = $('#col-div'+q_id+'').html();
//                                 // for(var i=0;i<nos-1;i++){
//                                 //     $('#col-div'+q_id+'').after('<div class="col-lg-12" style="display:flex;">'+html+'</div>');
//                                 // }
//                                 // $('#define-table-div'+q_id+'').hide();
//                                 // $('#btn-one'+q_id+'').hide();
//                                 // $('#define-cols-div'+q_id+'').show();
//                                 // $('#btn-two'+q_id+'').show();
//                             }
//                             else{
//                                 alert('Oops something went wrong! Please try again');
//                             }
//                         }
//                     })









//                    }



//         //$(document).on('click',".disc_val",function (e) {
//              // alert('gggg');

//              });

$(document).ready(function(){
$('.sub-qst-1').click(function (e) {
 alert("gfgg");
                    $(this).addClass('active-sub');

                    });
 });



              $('.trans-tr').click(function (e) {
                      e.preventDefault();
                      var current=$(this);

                     if(current.find('.sub-tab-tr').length> 0){
                    //alert('dddddd');

                        var q_val=$(this).find('.active-sub').data('qst');
                         
                        }
                        else{
                        var q_val=$(this).find('.disc_val').data('qst');
                         
                       }

                      if($('#start-order').val()==1){

// $(this).parent().find('.accordion-body').length == 1; 

                          // if($(this).hasClass('sub-tab-tr')){

               
                       
                       var type='qst';
                       console.log($(this).parent().html());


                        var vals1=$('#order-qst').val();

                       if(vals1!=0){
                            var valsnew1=vals1+','+q_val;
                        }else{
                            var valsnew1=q_val;

                        }
                       $('#order-qst').val(valsnew1);

                          // if($(this).parent().find('.sub-tab-tr').length){
            if($(this).find('.sub-tab-tr').length){
                

                  //alert('dddddd');

                             //var q_val=$(this).find('.active-sub').data('qst');
                     $(this).find('.active-sub').css('background','#2196f3b3');

                         
                        }
                        else{
                             //alert('jjj');
                        $(this).find('.disc_val').css('background','#2196f3b3');

                         
                       }

                       //alert('hjfghjgf');

                      


                                            
 

                      }else if($('#line_id').val()==1){

                         if($(this).hasClass('td-line')){ 
                          var underline=0;

                        }else{ 

                            if($(this).find('.disc_val').hasClass('line')){
                          var underline=0;
                                }else{
                          var underline=1;
                                }

                        }
                         //console.log('hhh');


 // console.log(current.find('.sub-tab-tr').length);


                        //var q_val=$(this).find('.disc_val').data('qst');
                           if(current.find('.sub-tab-tr').length> 0){
                    //alert('dddddd');

                             var q_val=$(this).find('.active-sub').data('qst');
                         
                        }
                        else{
                        var q_val=$(this).find('.disc_val').data('qst');
                         
                       }
                       var type='qst';
console.log(q_val);

                        $(this).toggleClass('td-line');

                              $.ajax({
                        url:base_url+'add-underline-val',
                        type:'post',
                        data:{q_val:q_val,type:type,underline:underline},
                        success: function(out){
                            var out = JSON.parse(out);
                            if(out.status == 1){
                                $('#line_id').val(0);

                                if(out.answer_id){

                                    //alert(out.answer_id);
                                    //var id=out.answer_id;
                                 // form.attr("data-answer",id);
                                 // parent.attr("data-answer",id);




                                }

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


                        






                      }else if($('#under_line_id').val()==1){

                         if($(this).hasClass('u-line')){ 
                          var underline=0;

                        }else{ 

                          //   if($(this).find('.disc_val').hasClass('line')){
                          // var underline=0;
                          //       }else{
                          var underline=1;
                              //  }

                        }
                         //console.log('hhh');


 // console.log(current.find('.sub-tab-tr').length);


                        //var q_val=$(this).find('.disc_val').data('qst');
                           if(current.find('.sub-tab-tr').length> 0){
                    //alert('dddddd');

                             var q_val=$(this).find('.active-sub').data('qst');
                         
                        }
                        else{
                        var q_val=$(this).find('.disc_val').data('qst');
                         
                       }
                       var type='qst';
console.log(q_val);

                        $(this).toggleClass('u-line');

                              $.ajax({
                        url:base_url+'add-qst-text-underline',
                        type:'post',
                        data:{q_val:q_val,type:type,underline:underline},
                        success: function(out){
                            var out = JSON.parse(out);
                            if(out.status == 1){
                                $('#line_id').val(0);

                                if(out.answer_id){

                                    //alert(out.answer_id);
                                    //var id=out.answer_id;
                                 // form.attr("data-answer",id);
                                 // parent.attr("data-answer",id);




                                }

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


                        






                      }else if($('#double_line_id').val()==1){

                         if($(this).hasClass('td-d-line')){ 
                          var underline=0;

                        }else{ 

                            if($(this).find('.disc_val').hasClass('d-line')){
                                var underline=0;
                                }else{
                               var underline=1;
                                }

                        }



                        //var q_val=$(this).find('.disc_val').data('qst');
                           if(current.find('.sub-tab-tr').length> 0){
                    //alert('dddddd');

                             var q_val=$(this).find('.active-sub').data('qst');
                             $(this).find('.active-sub').toggleClass('td-d-line');
                         
                        }
                        else{
                        var q_val=$(this).find('.disc_val').data('qst');
                        $(this).toggleClass('td-d-line');
                         
                       }
                       var type='qst';


                        

// alert(q_val);
                              $.ajax({
                        url:base_url+'add-double-underline-val',
                        type:'post',
                        data:{q_val:q_val,type:type,underline:underline},
                        success: function(out){
                            var out = JSON.parse(out);
                            if(out.status == 1){
                                $('#double_line_id').val(0);

                                if(out.answer_id){

                                    //alert(out.answer_id);
                                    //var id=out.answer_id;
                                 // form.attr("data-answer",id);
                                 // parent.attr("data-answer",id);




                                }

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


                        






                      }else if($('#inter_quest_id').val()==1){



                        
                        //var q_val=$(this).find('.disc_val').data('qst');
                         if(current.find('.sub-tab-tr').length> 0){
                    //alert('dddddd');

                             var q_val=$(this).find('.active-sub').data('qst');
                         
                        }
                        else{
                        var q_val=$(this).find('.disc_val').data('qst');
                         
                       }
                        var type='quest';

                        $('#val_id').val(q_val);
                        $('#type').val(type);

                       $('#getModal').modal('show');

                       //  var vals1=$('#order-qst').val();

                       // if(vals1!=0){
                       //      var valsnew1=vals1+','+q_val;
                       //  }else{
                       //      var valsnew1=q_val;

                       //  }
                       // $('#order-qst').val(valsnew1);
                       // $(this).css('background','#2196f3b3');

                                           //  alert(q_val);
 

                      }


                      else if($('#order-active-list').val()!=0){


                                if($(this).find('.disc_val').hasClass('active-order')){

                   $(this).find('.disc_val').removeClass('active-order');
                   //$(this).removeClass('active-order');
                   $(this).find('.disc_val').css('background','white');
                   var orderid=$(this).find('.disc_val').data('orderid');
                   var type='quest';
                         if(current.find('.sub-tab-tr').length> 0){
                    //alert('dddddd');

                             var q_val=$(this).find('.active-sub').data('qst');
                         
                        }
                        else{
                        var q_val=$(this).find('.disc_val').data('qst');
                         
                       }
                   //var q_val=$(this).find('.disc_val').data('qst');


                              $.ajax({
                        url:base_url+'remove-order-val',
                        type:'post',
                        data:{q_val:q_val,type:type,orderid:orderid},
                        success: function(out){
                            var out = JSON.parse(out);
                            if(out.status == 1){

                                   // window.location.reload();

                                if(out.answer_id){
                                    //alert(out.answer_id);
                                    //var id=out.answer_id;
                                 // form.attr("data-answer",id);
                                 // parent.attr("data-answer",id);




                                }

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









                   }else{


                    var orderid=$('#order-active-list').val();

                      var type='quest';
                         if(current.find('.sub-tab-tr').length> 0){
                    //alert('dddddd');

                             var q_val=$(this).find('.active-sub').data('qst');
                         
                        }
                        else{
                        var q_val=$(this).find('.disc_val').data('qst');
                         
                       }

                         if($(this).find('.sub-tab-tr').length){
                

                  //alert('dddddd');

                             //var q_val=$(this).find('.active-sub').data('qst');
                     $(this).find('.active-sub').css('background','#2196f3b3');

                         
                        }
                        else{
                             //alert('jjj');
                        $(this).find('.disc_val').css('background','#2196f3b3');

                         
                       }


                          
                          $.ajax({
                        url:base_url+'add-problem-order-exist',
                        type:'post',
                        data:{type:type,q_val:q_val,orderid:orderid},
                        success: function(out){
                            var out = JSON.parse(out);
                            if(out.status == 1){



                                if(out.order){

                                  // var htm='<a href="#" class="buttons order-list"  style="background:palegreen;" data-qst="'+qst+'" data-ans="'+ans+'" data-anscol="'+anscol+'"  data-trans="'+trans+'"  data-prblm="'+prblm+'">'+h+'</a>';
                                 // $('.append-order').append(htm);
                                  $('#order-active-list').val(0);
                                  // $('#order-qst').val(0);
                                  // $('#order-prblm').val(0);
                                  // $('#start-order').val(0);


                                        

                                 // f.html('Start');
                                  






                                    //alert(out.answer_id);
                                 //    var id=out.answer_id;
                                 // form.attr("data-answer",id);
                                 // parent.attr("data-answer",id);




                                }

                              
                            }
                            else{
                                alert('Oops something went wrong! Please try again');
                            }
                        }
                    })









                    }
           





                        }




                   



        //$(document).on('click',".disc_val",function (e) {
             // alert('gggg');

             });


         $('.trans').click(function (e) {
                      e.preventDefault();
                      if($('#start-order').val()==1){
                       var q_val=$(this).data('trans');
                        var vals=$('#order-trans').val();

                       if(vals!=0){
                            var valsnew=vals+','+q_val;
                        }else{
                            var valsnew=q_val;
                        }
                       $('#order-trans').val(valsnew);
                       $(this).css('background','#2196f3b3');

                       // $('#order-qst').attr('data-type','trans');

                                           //  alert(q_val);
 

                      }else if($('#inter_quest_id').val()==1){



                        
                        var q_val=$(this).data('trans');
                        var type='trans';

                        $('#val_id').val(q_val);
                        $('#type').val(type);

                       $('#getModal').modal('show');

                       //  var vals1=$('#order-qst').val();

                       // if(vals1!=0){
                       //      var valsnew1=vals1+','+q_val;
                       //  }else{
                       //      var valsnew1=q_val;

                       //  }
                       // $('#order-qst').val(valsnew1);
                       // $(this).css('background','#2196f3b3');

                                           //  alert(q_val);
 

                      }

                       if($(this).hasClass('active-order')){

                   $(this).removeClass('active-order');
                   //$(this).removeClass('active-order');
                   $(this).css('background','white');
                   var orderid=$(this).data('orderid');
                   var type='trans';
                    var q_val=$(this).data('trans');

                              $.ajax({
                        url:base_url+'remove-order-val',
                        type:'post',
                        data:{q_val:q_val,type:type,orderid:orderid},
                        success: function(out){
                            var out = JSON.parse(out);
                            if(out.status == 1){

                                  //  window.location.reload();

                                if(out.answer_id){
                                    //alert(out.answer_id);
                                    //var id=out.answer_id;
                                 // form.attr("data-answer",id);
                                 // parent.attr("data-answer",id);




                                }

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









                   }



        //$(document).on('click',".disc_val",function (e) {
             // alert('gggg');

             });



         $(document).on('click',".add_new_qst",function (e) {

         $('#inter_quest_id').val(1);

     // $('#getModal').modal('show');

    });


         


          $(document).on('click',".add-header",function (e) {

         //$('#inter_quest_id').val(1);
         var table=$('.ans-tab.active').data('table');

          $('#table_id_header').val(table);
           $('#type-header').val('header');
                   $('.custom-title').html('Add Header')

          $('#getModal-header').modal('show');

    });

            $(document).on('click',".add-footer",function (e) {

         //$('#inter_quest_id').val(1);
         var table=$('.ans-tab.active').data('table');
         $('.custom-title').html('Add Footer');
          $('#type-header').val('footer');

          $('#table_id_header').val(table);
          $('#getModal-header').modal('show');

    });




     $(document).on('click','#add_answer_header',function(){
    //alert("fhhf");
     //var table = $.trim($('#table_id').val());

          //var table = $.trim($(this).data('id'));

           

              // var title=$('.quest-input-header').val();

              var elem = document.querySelector('.headenote');
    var title=elem.children[0].innerHTML;

      
              var table=$('#table_id_header').val();
              var type=$('#type-header').val();




             //var table = $('.tab_id').val();

 

      var q_id = 0;
   // var nos = $.trim($('#table_cols').val());
    if(table){
        $.ajax({
            url:base_url+'add_ans_header',
            type:'post',
            data:{title:title,table:table,type:type},
            success: function(out){
                var out = JSON.parse(out);
                if(out.status == 1){
                     alert('Header added succesfully');
                      $('#getModal-header').modal('hide');
                      $('.quest-input-header').val('');
                      elem.children[0].innerHTML = "";




                     // var data1=out.data.table;
                     // var cols=data1.table_columns;
                     
                     // var answer=out.data.answer;
                    // window.location.reload();
                     // var answer_sub=out.data.answer_sub;
              
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



        $(document).on('click','#add_inter_qst',function(){
    //alert("fhhf");
     //var table = $.trim($('#table_id').val());

          //var table = $.trim($(this).data('id'));

            var val = $('#val_id').val();
           // alert($('#table_tval').val());
            //var ty = $('#table_torder').val();

              var type = $('#type').val();

              var title=$('.quest-input').val();

              var option1=$('#option1').val();
              var option2=$('#option2').val();
              var option3=$('#option3').val();
              var option4=$('#option4').val();

              var ans=$('#correct_ans').val();

             //var table = $('.tab_id').val();

 

      var q_id = 0;
   // var nos = $.trim($('#table_cols').val());
    if(val){
        $.ajax({
            url:base_url+'add_inter_question',
            type:'post',
            data:{val:val,type:type,title:title,option1:option1,option2:option2,option3:option3,option4:option4,ans:ans},
            success: function(out){
                var out = JSON.parse(out);
                if(out.status == 1){


                     // var data1=out.data.table;
                     // var cols=data1.table_columns;
                     
                     // var answer=out.data.answer;
                     window.location.reload();
                     // var answer_sub=out.data.answer_sub;
              
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


        

        $('.problem-tr').click(function (e) {
                      e.preventDefault();


                      if($('#start-order').val()==1){
                       var q_val=$(this).data('prblem');
                          var vals=$('#order-prblm').val();
                        if(vals!=0){
                            var valsnew=vals+','+q_val;
                        }else{
                            var valsnew=q_val;
                        }
                          
                       $('#order-prblm').val(valsnew);
                       $(this).css('background','#2196f3b3');



                                          
 

                      }else if($('#line_id').val()==1){

                         if($(this).hasClass('p-line')){ 
                          var underline=0;

                        }else{ 

                            
                          var underline=1;
                               

                        }


                        // console.log(underline);



                        var q_val=$(this).data('prblem');
                       var type='problem';


                        $(this).toggleClass('p-line');

// alert(q_val);
                              $.ajax({
                        url:base_url+'add-underline-val',
                        type:'post',
                        data:{q_val:q_val,type:type,underline:underline},
                        success: function(out){
                            var out = JSON.parse(out);
                            if(out.status == 1){


                                if(out.answer_id){

                                    //alert(out.answer_id);
                                    //var id=out.answer_id;
                                 // form.attr("data-answer",id);
                                 // parent.attr("data-answer",id);




                                }

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


                        






                      }else if($('#under_line_id').val()==1){

                         if($(this).hasClass('p-u-line')){ 
                          var underline=0;

                        }else{ 

                            
                          var underline=1;
                               

                        }


                        // console.log(underline);



                        var q_val=$(this).data('prblem');
                       var type='problem';


                        $(this).toggleClass('p-u-line');

// alert(q_val);
                              $.ajax({
                        url:base_url+'add-qst-text-underline',
                        type:'post',
                        data:{q_val:q_val,type:type,underline:underline},
                        success: function(out){
                            var out = JSON.parse(out);
                            if(out.status == 1){


                                if(out.answer_id){

                                    //alert(out.answer_id);
                                    //var id=out.answer_id;
                                 // form.attr("data-answer",id);
                                 // parent.attr("data-answer",id);




                                }

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


                        






                      }else if($('#double_line_id').val()==1){

                         if($(this).hasClass('pr-d-line')){ 
                          var underline=0;

                        }else{ 

                            
                               var underline=1;
                                

                        }



                        var q_val=$(this).data('prblem');
                       var type='problem';


                        $(this).toggleClass('pr-d-line');

// alert(q_val);
                              $.ajax({
                        url:base_url+'add-double-underline-val',
                        type:'post',
                        data:{q_val:q_val,type:type,underline:underline},
                        success: function(out){
                            var out = JSON.parse(out);
                            if(out.status == 1){
                                $('#double_line_id').val(0);

                                if(out.answer_id){

                                    //alert(out.answer_id);
                                    //var id=out.answer_id;
                                 // form.attr("data-answer",id);
                                 // parent.attr("data-answer",id);




                                }

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


                        






                      }else if($('#inter_quest_id').val()==1){



                        
                        var q_val=$(this).data('prblem');
                        var type='problem';

                        $('#val_id').val(q_val);
                        $('#type').val(type);

                       $('#getModal').modal('show');

                       //  var vals1=$('#order-qst').val();

                       // if(vals1!=0){
                       //      var valsnew1=vals1+','+q_val;
                       //  }else{
                       //      var valsnew1=q_val;

                       //  }
                       // $('#order-qst').val(valsnew1);
                       // $(this).css('background','#2196f3b3');

                                           //  alert(q_val);
 

                      }else if($('#order-active-list').val()!=0){

                                 if($(this).hasClass('active-order')){

                   $(this).removeClass('active-order');
                   //$(this).removeClass('active-order');
                   $(this).css('background','white');
                   var orderid=$(this).data('orderid');
                   var type='problem';
                   var q_val=$(this).data('prblem');


                              $.ajax({
                        url:base_url+'remove-order-val',
                        type:'post',
                        data:{q_val:q_val,type:type,orderid:orderid},
                        success: function(out){
                            var out = JSON.parse(out);
                            if(out.status == 1){

                                    //window.location.reload();

                                if(out.answer_id){
                                    //alert(out.answer_id);
                                    //var id=out.answer_id;
                                 // form.attr("data-answer",id);
                                 // parent.attr("data-answer",id);




                                }

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









                   }else{


                       var orderid=$('#order-active-list').val();

                      var type='problem';
                   var type='problem';
                   var q_val=$(this).data('prblem');

                    
                             //alert('jjj');
                        $(this).css('background','#2196f3b3');

                         
                       


                          
                          $.ajax({
                        url:base_url+'add-problem-order-exist',
                        type:'post',
                        data:{type:type,q_val:q_val,orderid:orderid},
                        success: function(out){
                            var out = JSON.parse(out);
                            if(out.status == 1){



                                if(out.order){

                                  // var htm='<a href="#" class="buttons order-list"  style="background:palegreen;" data-qst="'+qst+'" data-ans="'+ans+'" data-anscol="'+anscol+'"  data-trans="'+trans+'"  data-prblm="'+prblm+'">'+h+'</a>';
                                 // $('.append-order').append(htm);
                                  $('#order-active-list').val(0);
                                  // $('#order-qst').val(0);
                                  // $('#order-prblm').val(0);
                                  // $('#start-order').val(0);


                                        

                                 // f.html('Start');
                                  






                                    //alert(out.answer_id);
                                 //    var id=out.answer_id;
                                 // form.attr("data-answer",id);
                                 // parent.attr("data-answer",id);




                                }

                              
                            }
                            else{
                                alert('Oops something went wrong! Please try again');
                            }
                        }
                    })


                   }



                      }



//https://stackoverflow.com/questions/4587955/jquery-removing-values-from-a-comma-separate-list
          
         



        //$(document).on('click',".disc_val",function (e) {
             // alert('gggg');

             });


             $(document).on('click',".add_row_ans",function (e) {


   var i=0;

      var table=$(this).data('table');

        $('.row_ans[data-table="'+table+'"]').find('.ans-row').each(function(e){
        // if(i==0) ids += $(this).attr('data-id');
        // else ids += ','+$(this).attr('data-id');
        i++;
    })


         $('.hidden[data-table="'+table+'"]').find('.ans-val-new').attr('data-row',i);


                  $('.hidden[data-table="'+table+'"]').find('.ans-val-new').addClass('ans-val');

                  //$('.hidden[data-table="'+table+'"]').find('.delte-quest-row-btn-append').attr('data-row',i);

         

         var html='<tr class="ans-row">';
      
        html+=$('.hidden[data-table="'+table+'"]').html();
        html+='</tr>';

                                //  html = html.replace('ans-val-new','ans-val');


        console.log(html);


                     $('.row_ans[data-table="'+table+'"]').find(".ans-row").last().after(html);


           $('.hidden[data-table="'+table+'"]').find('.ans-val-new').removeClass('ans-val');
           


                     $('.ans-val').click(function (e) {
           //alert('hhhh');

           $(this).css('border','1px solid #00000038');

            });


                                $('.ans-val').focusout(function (e) {

                var table_id=$(this).data('table');


             if($('#copy-excel-stat[data-table="'+table_id+'"]').val()==0){
            // var row=$(this).data('column');

             var column=$(this).data('column');
             var row=$(this).data('row');
            var table_id=$(this).data('table');
            var sub=$(this).data('sub');
                            var parent = $(this).parent();
                    if($(this).hasClass('sub-tab-tr')){
                        var substat=1;

                        }else{
                        var substat=0;

                        }

                          //  $(this).hasClass


                        // if(e.keyCode == 13){
                              var val=$(this).val();

                           

                var htm='<li class="disc" draggable="true" style="white-space: pre;">'+val+'</li>' ;

                                      var form = $(this);

 


                //if(val) parent.html(htm);

                     $.ajax({
                        url:base_url+'add-answer-table-val',
                        type:'post',
                        data:{val:val,column:column,row:row,table_id:table_id,sub:sub,substat:substat },
                        success: function(out){
                            var out = JSON.parse(out);
                            if(out.status == 1){


                                if(out.answer_id){

                                    //alert(out.answer_id);
                                    var id=out.answer_id;
                                 form.attr("data-answer",id);
                                 parent.attr("data-answer",id);




                                }

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



                            }



                      // }
        });



    });


              $(document).on('click','.delte-ans-row-btn',function(e){

             e.preventDefault();
     // alert("hhh");
    var row = $(this).attr('data-row');
     var table_id = $(this).attr('data-table');
     var evnt = $(this);

    $.confirm({
        title: 'Confirm delete!',
        content: 'Cant be reversed!',
        buttons: {
            confirm: function () {
                $.ajax({
                    type:'post',
                    url:base_url+'delete-ans-row',
                    data:{row:row,table:table_id},
                    success: function(out){
                        var out = JSON.parse(out);
                        if(out.status == 404){
                            window.location.href = base_url;

                            


                        }
                        else if(out.status == 1){
                            //window.location.reload();
                            evnt.parent().parent().remove();
                           // $("ul[data-slide='" + current +"']");


                        }
                        else{

                            evnt.parent().parent().remove();

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



$('.sub-qst-2').click(function (e) {
    // alert("cvv");
                    $(this).addClass('active-sub-ans');

                    });

         $('.input-ans').click(function (e) {

                      e.preventDefault();
                    var current1=$(this);


                      if($('#start-order').val()==1){

                       // var q_val=$(this).data('answer');
                       // var q_col=$(this).data('column');

                    //    if(current1.find('.sub-tab-tr').length> 0){
                    // alert('dddddd');

                    //     var q_val=current1.find('.active-sub-ans').data('answer');
                         
                    //     }
                    //     else{
                             //alert('jjj');

                        var q_val=current1.find('.ans-val').data('answer');
                         
                      // }

                        //var q_val=$(this).find('.ans-val').data('answer');
                         //var sub=$(this).find('.ans-val').data('sub');
                         var q_col=current1.find('.ans-val').data('column');

                       var vals=$('#order-answer').val();
                        if(vals!=0){
                            var valsnew2=vals+','+q_val;
                        }else{
                            var valsnew2=q_val;
                        }

                         var vals_column=$('#order-answer-col').val();
                        // alert(vals_column);
                        if(vals_column!=''){
                            var valsnew3=vals_column+','+q_col;
                        }else{
                            var valsnew3=q_col;
                        }
                                                //alert('jhdhjsdh');


                          
                       $('#order-answer').val(valsnew2);
                       $('#order-answer-col').val(valsnew3);


                                       // if($(this).parent().find('.sub-tab-tr').length){
//             if($(this).find('.sub-tab-tr').length){
                

//                   //alert('dddddd');

//                              //var q_val=$(this).find('.active-sub').data('qst');
//                      $(this).find('.active-sub-ans').css('background','#2196f3b3');
//                         $(this).find('.active-sub-ans').parent().css('background','#2196f3b3');

// $(this).find('.active-sub-ans').removeClass('active-sub-ans');

                         
//                         }
//                         else{
                             //alert('jjj');
                        $(this).find('.ans-val').css('background','#2196f3b3');

                         
                      // }


                       // $(this).css('background','#2196f3b3');
                       // $(this).find('.ans-val').css('background','#2196f3b3');

                                          
 

                      }else if($('#line_id').val()==1){

                         if($(this).hasClass('underline')){ 
                          var underline=0;

                        }else{ 

                            if($(this).find('.disc_val').hasClass('line')){
                            var underline=0;
                                }else{
                          var underline=1;
                                }

                        }

                           // var q_val=$(this).data('answer');



                    //           if($(this).find('.sub-tab-tr').length> 0){
                    // //alert('dddddd');

                    //          var q_val=$(this).find('.active-sub-ans').data('answer');
                    //                      $(this).find('.active-sub-ans').toggleClass('td-line');

                         
                    //     }
                    //     else{
                        var q_val=$(this).find('.ans-val').data('answer');
                                                $(this).find('.ans-val').toggleClass('td-line');

                         
                      // }
                           var column=$(this).data('column');

                           if($(this).hasClass('sub-tab-tr')){ 
                          var sub=1;

                        }else{ 
                          var sub=0;

                        }

                        //var q_val=$(this).find('.disc_val').data('qst');
                       var type='ans';



// alert(q_val);
                              $.ajax({
                        url:base_url+'add-underline-val',
                        type:'post',
                        data:{q_val:q_val,type:type,underline:underline,substat:sub,column:column},
                        success: function(out){
                            var out = JSON.parse(out);
                            if(out.status == 1){


                                if(out.answer_id){

                                    //alert(out.answer_id);
                                    //var id=out.answer_id;
                                 // form.attr("data-answer",id);
                                 // parent.attr("data-answer",id);




                                }

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


                        






                      }else if($('#under_line_id').val()==1){

                         if($(this).hasClass('t-underline')){ 
                          var underline=0;

                        }else{ 

                            // if($(this).find('.disc_val').hasClass('line')){
                            // var underline=0;
                            //     }else{
                          var underline=1;
                               // }

                        }

                           // var q_val=$(this).data('answer');

                    //         if($(this).find('.sub-tab-tr').length> 0){
                    // //alert('dddddd');

                    //          var q_val=$(this).find('.active-sub-ans').data('answer');
                    //                      $(this).find('.active-sub-ans').toggleClass('t-underline');

                         
                    //     }
                    //     else{
                        var q_val=$(this).find('.ans-val').data('answer');
                                                $(this).find('.ans-val').toggleClass('t-underline');

                         
                      // }
                           var column=$(this).data('column');

                           if($(this).hasClass('sub-tab-tr')){ 
                          var sub=1;

                        }else{ 
                          var sub=0;

                        }

                        //var q_val=$(this).find('.disc_val').data('qst');
                       var type='ans';


                        // $(this).toggleClass('t-underline');
                        //  $(this).find('.ans-val').toggleClass('t-underline');

// alert(q_val);
                              $.ajax({
                        url:base_url+'add-qst-text-underline',
                        type:'post',
                        data:{q_val:q_val,type:type,underline:underline,substat:sub,column:column},
                        success: function(out){
                            var out = JSON.parse(out);
                            if(out.status == 1){


                                if(out.answer_id){

                                    //alert(out.answer_id);
                                    //var id=out.answer_id;
                                 // form.attr("data-answer",id);
                                 // parent.attr("data-answer",id);




                                }

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


                        






                      }else if($('#double_line_id').val()==1){

                         





                        // var q_val=$(this).find('.ans-val').data('answer');

                    //     if($(this).find('.sub-tab-tr').length> 0){
                    // //alert('dddddd');

                    //          var q_val=$(this).find('.active-sub-ans').data('answer');

                    //         if($(this).find('.active-sub-ans').hasClass('ans-d-line')){ 
                    //       var underline=0;

                    //     }else{ 

                            
                    //            var underline=1;
                                

                    //     }

                    //                                 $(this).find('.active-sub-ans').toggleClass('ans-d-line');


                         
                    //     }
                    //     else{
                        var q_val=$(this).find('.ans-val').data('answer');
                                $(this).find('.ans-val').toggleClass('ans-d-line');

                                if($(this).hasClass('ans-d-line')){ 
                          var underline=0;

                        }else{ 

                            
                               var underline=1;
                                

                        }

                         
                      //}
                         //var sub=$(this).find('.ans-val').data('sub');
                         var column=$(this).data('column');

                           if($(this).hasClass('sub-tab-tr')){ 
                          var sub=1;

                        }else{ 
                          var sub=0;

                        }


                        //var q_val=$(this).data('prblem');
                       var type='answer';


                        // $(this).toggleClass('ans-d-line');

// alert(q_val);
                              $.ajax({
                        url:base_url+'add-double-underline-val',
                        type:'post',
                        data:{q_val:q_val,type:type,underline:underline,substat:sub,column:column},
                        success: function(out){
                            var out = JSON.parse(out);
                            if(out.status == 1){
                                $('#double_line_id').val(0);

                                if(out.answer_id){

                                    //alert(out.answer_id);
                                    //var id=out.answer_id;
                                 // form.attr("data-answer",id);
                                 // parent.attr("data-answer",id);




                                }

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


                        






                      }else if($('#inter_quest_id').val()==1){



                        
                        var q_val=$(this).find('.ans-val').data('answer');
                        var type='answer';

                        $('#val_id').val(q_val);
                        $('#type').val(type);

                       $('#getModal').modal('show');

                       //  var vals1=$('#order-qst').val();

                       // if(vals1!=0){
                       //      var valsnew1=vals1+','+q_val;
                       //  }else{
                       //      var valsnew1=q_val;

                       //  }
                       // $('#order-qst').val(valsnew1);
                       // $(this).css('background','#2196f3b3');

                                           //  alert(q_val);
 

                      }else if($('#order-active-list').val()!=0){


                  if($(this).find('.ans-val').hasClass('active-order')){

                   $(this).find('.ans-val').removeClass('active-order');
                   //$(this).removeClass('active-order');
                   $(this).css('background','white');
                   $(this).find('.ans-val').css('background','white');
                   var orderid=$(this).find('.ans-val').data('orderid');
                   var type='ans';
                   var q_val=$(this).find('.ans-val').data('answer');


                              $.ajax({
                        url:base_url+'remove-order-val',
                        type:'post',
                        data:{q_val:q_val,type:type,orderid:orderid},
                        success: function(out){
                            var out = JSON.parse(out);
                            if(out.status == 1){

                                  //  window.location.reload();

                                if(out.answer_id){
                                    //alert(out.answer_id);
                                    //var id=out.answer_id;
                                 // form.attr("data-answer",id);
                                 // parent.attr("data-answer",id);




                                }

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


                   }else{


                       var orderid=$('#order-active-list').val();

                      var type='ans';
                   // var type='problem';
                   var q_val=$(this).find('.ans-val').data('answer');

                    
                             //alert('jjj');
                        $(this).css('background','#2196f3b3');
                        $(this).find('.ans-val').css('background','#2196f3b3');


                          
                          $.ajax({
                        url:base_url+'add-problem-order-exist',
                        type:'post',
                        data:{type:type,q_val:q_val,orderid:orderid},
                        success: function(out){
                            var out = JSON.parse(out);
                            if(out.status == 1){



                                if(out.order){

                                  // var htm='<a href="#" class="buttons order-list"  style="background:palegreen;" data-qst="'+qst+'" data-ans="'+ans+'" data-anscol="'+anscol+'"  data-trans="'+trans+'"  data-prblm="'+prblm+'">'+h+'</a>';
                                 // $('.append-order').append(htm);
                                  $('#order-active-list').val(0);
                                  // $('#order-qst').val(0);
                                  // $('#order-prblm').val(0);
                                  // $('#start-order').val(0);


                                        

                                 // f.html('Start');
                                  






                                    //alert(out.answer_id);
                                 //    var id=out.answer_id;
                                 // form.attr("data-answer",id);
                                 // parent.attr("data-answer",id);




                                }

                              
                            }
                            else{
                                alert('Oops something went wrong! Please try again');
                            }
                        }
                    })


                   }





                        }






        });



        $(document).on('click','.order-list',function(e){

        // $('.order-list').click(function (e) {
                      e.preventDefault();
                      var orderid=$(this).data('orderid');
                              $('#order-active-list').val(orderid);


  $('.disc_val').each(function (index, value) {
       //$(this).removeClass('active');
      // m++;
      $(this).css('background','white');

     $(this).parent().css('background','white');



    });
  


   $('.problem-tr').each(function (index, value) {
       //$(this).removeClass('active');
      // m++;
      $(this).css('background','white');

    });
    $('.ans-val').each(function (index, value) {
       //$(this).removeClass('active');
      // m++;
      $(this).css('background','white');

    });

    $('.input-ans').each(function (index, value) {
       //$(this).removeClass('active');
      // m++;
      $(this).css('background','white');

    });


     $('.trans').each(function (index, value) {
       //$(this).removeClass('active');
      // m++;
      $(this).css('background','#17a2b81f');

    });




                     // alert('clicked');
                    var ans=$(this).data('ans');
                    var qst=$(this).data('qst');
                    var prblem=$(this).data('prblm');
                    var prblemcol=$(this).data('anscol');
                    var trns=$(this).data('trans');
                    var oid=$(this).data('orderid');

             // if (prblem.indexOf(',') > -1) { 

                 var myarray = prblem.toString().split(',');

                 for(var i = 0; i < myarray.length; i++)
                            {
                              
                         $('.problem-tr[data-prblem="'+myarray[i]+'"]').css('background','#76e576');
                                 // console.log($('.problem-tr[data-prblem="'+myarray[i]+'"]').html());
                                 //  console.log(myarray[i]);

                         $('.problem-tr[data-prblem="'+myarray[i]+'"]').addClass('active-order');
                 $('.problem-tr[data-prblem="'+myarray[i]+'"]').attr('data-orderid', oid);
                 //$('div').attr('data-info', '222');






                            }


                    var myarray1 = qst.toString().split(',');

                 for(var k = 0; k < myarray1.length; k++)
                            {
                $('.disc_val[data-qst="'+myarray1[k]+'"]').css('background','#76e576');
                $('.disc_val[data-qst="'+myarray1[k]+'"]').addClass('active-order');
                 $('.disc_val[data-qst="'+myarray1[k]+'"]').attr('data-orderid', oid);
               // $('.disc_val[data-qst="'+myarray1[k]+'"]').parent().css('background','#76e576');



                // $('.problem-tr[data-prblem="'+myarray1[k]+'"]').css('background','#76e576');
                                 // console.log($('.problem-tr[data-prblem="'+myarray[i]+'"]').html());
                                 //  console.log(myarray[i]);

                            }


                               var myarray2 = ans.toString().split(',');
                               var myarray3 = prblemcol.toString().split(',');

                 for(var d = 0; d < myarray2.length; d++)
                            {

                 $('.input-ans[data-answer="'+myarray2[d]+'"][data-column="'+myarray3[d]+'"]').css('background','#76e576');
                $('.ans-val[data-answer="'+myarray2[d]+'"][data-column="'+myarray3[d]+'"]').css('background','#76e576');
                $('.ans-val[data-answer="'+myarray2[d]+'"][data-column="'+myarray3[d]+'"]').addClass('active-order');
                $('.ans-val[data-answer="'+myarray2[d]+'"][data-column="'+myarray3[d]+'"]').attr('data-orderid', oid);

                // $('.problem-tr[data-prblem="'+myarray1[k]+'"]').css('background','#76e576');
                                 // console.log($('.problem-tr[data-prblem="'+myarray[i]+'"]').html());
                                 //  console.log(myarray[i]);

                            }

              // }else{
              //    $('.problem-tr[data-prblem="'+prblem+'"]').css('background','#76e576');
              // }


                   
                    var myarray4 = trns.toString().split(',');

                 for(var k = 0; k < myarray4.length; k++)
                            {
                $('.trans[data-trans="'+myarray4[k]+'"]').css('background','#76e576');
                $('.trans[data-trans="'+myarray4[k]+'"]').addClass('active-order');
                $('.trans[data-trans="'+myarray4[k]+'"]').attr('data-orderid', oid);

                // $('.problem-tr[data-prblem="'+myarray1[k]+'"]').css('background','#76e576');
                                 // console.log($('.problem-tr[data-prblem="'+myarray[i]+'"]').html());
                                 //  console.log(myarray[i]);

                            }


                            

                   // alert(prblem);
                    // $('.disc_val[data-qst="'+qst+'"]').css('background','#76e576');
                   // $('.trans-tr').find('.disc_val[data-qst="'+qst+'"]')css('background','#76e576');
                    // $('.input-ans[data-answer="'+ans+'"][data-column="'+prblemcol+'"]').css('background','#76e576');
                    // $('.ans-val[data-answer="'+ans+'"][data-column="'+prblemcol+'"]').css('background','#76e576');



                                        //$(this).css('background','#76e576');







                      // if($('#start-order').val()==1){

                      //   alert('jhdhjsdh');
                      //  var q_val=$(this).data('answer');
                          
                      //  $('#order-answer').val(q_val);

                                          
 

                      // }
        });



        $(document).on('click','#add-qst_tbl-btn',function(){
    var id = $('.qt_id').val();
       $('#row-form').find(':checkbox:not(:checked)').attr('value', '0').prop('checked', true);

    
    $.ajax({
        url:base_url+'add-qst-table-value',
        type:'post',
        data:$('#row-form').serialize(),
        success:function(out){
            var out = JSON.parse(out);
            if(out.status==1){
                $('.qt-btn').hide();
                $('.qt-tabl-div').show();
                $('.qt_table_id').val(id);
                $('.qt-remove-btn').attr('data-id',id);
                console.log($('.choose_type.active').html());


                               // $('.choose_type .active').attr('data-id',id);
                                $('.choose_type[data-id="'+out.data.order_id+'"]').append($('<option>', {
                                    value: out.data.table_id,
                                    text: out.data.table_name
                                }));


                            // $('.choose-table').append($('<option>', {
                            //     value: out.data.table_id,
                            //     text: out.data.table_name
                            // }));

                                $('.choose_type[data-id="'+out.data.order_id+'"]').val(out.data.table_id);


                $('#tableModal').modal('hide');
                $('#tableModal1').modal('hide');

                 window.location.reload();

                // var html = $('#col-div').html();
                // $('#define-cols-div').html('<div class="col-lg-12" id="col-div" style="display:flex;">'+html+'</div>');
                $('#col-div').find('.form-control').val('');
                $('#define-table-div').show();
                                $('#define-cols-div').show();

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


           $(document).on('click','.create-tab',function(e){

                          var dataid= $(this).data('id');

                              $('#tableModal').modal('show');
                            $('.order-id').val(dataid);
                             $('#col-form').find('.order-id-new').val(dataid);
                           // $('.order-id').val(dataid);

                              


 
})

                      $(document).on('click','.create-tab-pr',function(e){

                          var dataid= $(this).data('id');

                              $('#tableModal1').modal('show');

                               $('#choose-table-format').select2();

                            $('.order-id').val(dataid);
                           // $('.order-id').val(dataid);

                              


 
})


                       $(document).on('change',".trans-key",function (e){

                var transaction=$(this).val();
                var transid=$(this).data('trns');
                //alert('hgghgh');


                  $.ajax({
            url:base_url+'add-keywords',
            type:'post',
            data:{id:transid,value:transaction},
            success: function(out){
                var out = JSON.parse(out);
                if(out.status == 1){
                    var trans=out.data;

                  //  $(this).parent().find('.trans-key').attr('data-trns',trans);

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
                    // alert('Oops something went wrong! Please try again');
                }
            }
        })







              });
     
                $(document).on('click','.pag_link',function(e){
                            

                          $(".tab").each(function(){

                                            if($(this).hasClass('active')){
                                          $(this).removeClass('active').hide(); 


                                            }

                                                })


                          var dataid= $(this).data('id');
                             $('#table'+dataid).addClass('active');
                          $('#table'+dataid).css('display','block');





                    })


                $(document).on('click','.qpag_link',function(e){
                            

                          $(".quest_table").each(function(){

                                            if($(this).hasClass('active')){
                                          $(this).removeClass('active').hide(); 


                                            }

                                                })


                          var dataid= $(this).data('id');
                             $('#qt-div'+dataid).addClass('active');
                          $('#qt-div'+dataid).css('display','block');

                        })


                $(document).on('click','.ans_link',function(e){
                            

                          $(".ans-tab").each(function(){

                                            if($(this).hasClass('active')){
                                          $(this).removeClass('active').hide(); 


                                            }

                                                })


                          var dataid= $(this).data('id');
                             $('#anstable'+dataid).addClass('active');
                          $('#anstable'+dataid).css('display','block');

                        })


                   $(document).on('click','.main-tab-ans',function(e){

                                    $(this).parent().addClass('active-main-tab');
                                    $('.main-tab-qst').parent().removeClass('active-main-tab');
                                    $('.main-tab-pr').parent().removeClass('active-main-tab');


                                    // $('.qst-div').hide();
                                    // $('.edit-qst-div').hide();
                                    // $('.append-new').hide();
                                    // $('.add-type-div').hide();
                                    
                                    // $('.show_table').hide();
                                    // $('.choose_value_type').hide();
                                    
                                    //                                     $('.prblem-div').hide();
                                    //                                     $('.add_table').hide();
                                                                        

                                    

                                    


                                                            })


                                $(document).on('click','.main-tab-pr',function(e){

                                    $(this).parent().addClass('active-main-tab');
                                    $('.main-tab-qst').parent().removeClass('active-main-tab');

                                    $('.qst-div').hide();
                                    $('.edit-qst-div').hide();
                                    $('.append-new').hide();
                                    $('.add-type-div').hide();
                                    
                                    $('.show_table').hide();
                                    $('.choose_value_type').hide();
                                    
                                                                        $('.prblem-div').show();
                                                                        $('.add_table').show();
                                                                        

                                    

                                    


                                                            })


                                 $('.text_line').click(function (e) {
                                    var value=$('#under_line_id').val();

                                        if(value === "0"){
                                            $('#under_line_id').val(1);
                                        }else{
                                            $('#under_line_id').val(0);
                                        }

                                    });


                                     $('.single_line').click(function (e) {
                                        var value=$('#line_id').val();

                                            if(value === "0"){
                                                $('#line_id').val(1);
                                            }else{
                                                $('#line_id').val(0);
                                            }



                 


                });
                                     

         $('.double_line').click(function (e) {


             //$('#double_line_id').val(1);

             var value=$('#double_line_id').val();

                                        if(value === "0"){
                                            $('#double_line_id').val(1);
                                        }else{
                                            $('#double_line_id').val(0);
                                        }


            });




                                 $(document).on('click','.main-tab-qst',function(e){


                                    $(this).parent().addClass('active-main-tab');
                                    $('.main-tab-pr').parent().removeClass('active-main-tab');
                                    $('.main-tab-ans').parent().removeClass('active-main-tab'); 

 
                                   // $('.qst-div').show();
                                     $('.edit-qst-div').show();

                                    $('.append-new').show();
                                                                        $('.add-type-div').show();

                                                                        $('.prblem-div').hide();
                                                                        $('.show_table').hide();
                                    $('.choose_value_type').hide();

                                    

                                    


                                                            })



                



         $('.ans-val').click(function (e) {
          // alert('hhhh');

           $(this).css('border','1px solid #00000038');

            });


                             $('.ans-val').focusout(function (e) {

            var table_id=$(this).data('table');

             if($('#copy-excel-stat[data-table="'+table_id+'"]').val()==0){

            // var row=$(this).data('column');

             var column=$(this).data('column');
             var row=$(this).data('row');
            var table_id=$(this).data('table');
            var sub=$(this).data('sub');
                            var parent = $(this).parent();
                    if($(this).hasClass('sub-tab-tr')){
                        var substat=1;

                        }else{
                        var substat=0;

                        }

                          //  $(this).hasClass


                        // if(e.keyCode == 13){
                              var val=$(this).val();

                           

                var htm='<li class="disc" draggable="true" style="white-space: pre;">'+val+'</li>' ;

                                      var form = $(this);

 


                //if(val) parent.html(htm);

                     $.ajax({
                        url:base_url+'add-answer-table-val',
                        type:'post',
                        data:{val:val,column:column,row:row,table_id:table_id,sub:sub,substat:substat },
                        success: function(out){
                            var out = JSON.parse(out);
                            if(out.status == 1){


                                if(out.answer_id){

                                    //alert(out.answer_id);
                                    var id=out.answer_id;
                                 form.attr("data-answer",id);
                                 parent.attr("data-answer",id);




                                }

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



                            }



                      // }
        });


          // $(document).on('change',".pr-keys",function (){
          //       var transaction=$(this).val();
          //       console.log(transaction);


          //        });


                     });




////////////////////////Presentation////////////////////////////////////////////

$(document).on('click','#add-presentation-btn',function(event){
    event.preventDefault();
    $('#presentation-table').hide();
    $('#add-presentation-form').show();
})


$(document).on('click','#add-slide-btn',function(event){
    event.preventDefault();
    var id = $(this).attr('data-id');

            $.ajax({
                    type:'post',
                    url:base_url+'add-slide',
                    data:{id:id},
                    success: function(out){
                        var out = JSON.parse(out);
                        if(out.status == 404){
                            window.location.href = base_url;
                        }
                        else if(out.status == 1){
                             window.location.href = base_url+'presentation-slide/'+out.data;
                        }
                        else{

                        }
                    }
                })
})




$(document).on('click','.edit-problem-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.ajax({
        url:base_url+'get-problem-solving',
        data:{id:id},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            if(out.status == 1){
                $('#question_id').val(out.data.question_id);
                $('#edit_question').val(out.data.question_code);

                $('#edit_qst_keywords').val(out.data.tags);
              
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



$(document).on('click','.edit-presentation-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.ajax({
        url:base_url+'get-presentation',
        data:{id:id},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            if(out.status == 1){
                $('#presentation_id').val(out.data.presentation_id);
                $('#edit_presentation_title').val(out.data.presentation_title);

                $('#edit_presentation_tag').val(out.data.tags);
              
                $('#presentation-table').hide();
                $('#edit-presentation-form').show();
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



$(document).on('click','#add-presentation-sub-btn',function(event){
    event.preventDefault();
    $('#presentation-table').hide();
    $('#add-presentation-form').show();
})





$(document).on('click','.edit-presentation-sub-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.ajax({
        url:base_url+'get-presentation-sub',
        data:{id:id},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            if(out.status == 1){
                $('#presentation_id').val(out.data.presentation_id);
                $('#presentation_sub_id').val(out.data.presentation_sub_id);

                $('#edit_presentation_title').val(out.data.presentation_title);

                $('#edit_presentation_tag').val(out.data.presentation_tags);
                
              
                $('#presentation-table').hide();
                $('#edit-presentation-form').show();
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

/////////////////////Presentation////////////////////////////////

$(document).on('click','.upload-image-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $('#img_chapter_id').val(id);
    $('#roles-table').hide();
    $('#upload-image-form').show();
})

//exercise

$(document).on('click','.edit-exercise-btn',function(e){
    e.preventDefault();
    $('.alert').hide();
    var id = $(this).attr('data-id');
    //alert(id);
    $.ajax({
        url:base_url+'get-exercise',
        data:{id:id},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            // var date = out.data.event_date;
            // var newDate = date.split("-").reverse().join("/");

            //console.log(newStartDate);
            if(out.status == 1){
                $('#edit_id').val(out.data.exercise_id);
                $('#edit_question').text(out.data.exercise_question);
                console.log('opt_'+out.data.exercise_correct_answer);
                //$('edit_correct_answer').val(out.data.exercise_correct_answer);
                //$('#opt_'+out.data.exercise_correct_answer).attr('checked',true);
                if(out.data.exercise_correct_answer==1) $('#one').prop('checked',true);
                else if(out.data.exercise_correct_answer==2) $('#two').prop('checked',true);
                else if(out.data.exercise_correct_answer==3) $('#three').prop('checked',true);
                else if(out.data.exercise_correct_answer==4) $('#four').prop('checked',true);
                $('#edit_option1').val(out.data.exercise_answer1);
                $('#edit_option2').val(out.data.exercise_answer2);
                $('#edit_option3').val(out.data.exercise_answer3);
                $('#edit_option4').val(out.data.exercise_answer4);
                $('#edit_title').val(out.data.exercise_title);
                if(out.data.exercise_status==1) $('#edit_status').attr('checked',true);
                $('#roles-table').hide();
                $('#edit-exercise-form').show();
            }
            else if(out.status==0){
                alert(out.data);
            }
            else{
                window.location.href = base_url+"institute";
            }
        }
    })
})

$(document).on('click','.edit-exercise-bank-btn',function(e){
    e.preventDefault();
    $('.alert').hide();
    var id = $(this).attr('data-id');
    $.ajax({
        url:base_url+'get-exercise-bank',
        data:{id:id},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            if(out.status == 1){
                console.log(out.data.tags);
                $('#edit_id').val(out.data.ex_topic_id);
                $('#edit_name').val(out.data.ex_topic_title);
                $('#edit_file_tags').val(out.data.tags);
                $('#roles-table').hide();
                $('#edit-exercise-bank-form').show();
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

$(document).on('click','.delete-exercise-bank-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.confirm({
        title: 'Confirm delete!',
        content: 'Whole questions in this exercise will be lost!',
        buttons: {
            confirm: function () {
                $.ajax({
                    type:'post',
                    url:base_url+'delete-exercise-bank',
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




/////***************************************2021 Additional athulya*********************************************//////

$(document).on('click','.delete-assignment-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.confirm({
        title: 'Confirm delete!',
        content: 'Cant be reversed!',
        buttons: {
            confirm: function () {
                $.ajax({
                    type:'post',
                    url:base_url+'delete-assignment',
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


$(document).on('click','#add-assignment-btn',function(event){
    event.preventDefault();
    $('#assignment-table').hide();
    $('#add-assignment-form').show();
})

$(document).on('click','.edit-assignment-btn',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.ajax({
        url:base_url+'get-assignment',
        data:{id:id},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            if(out.status == 1){
                $('#assignment_id').val(out.data.assignment_id);
                $('#edit_assignment_title').val(out.data.assignment_title);
                $('#edit_submission_date').val(out.data.submission_date);
                // alert(out.data.assignment_status);
                
                if(out.data.assignment_status==2) $('#edit_assignment_status').attr('checked',true);
                // $('#edit_assignment_tag').val(out.data.tags);
              
                $('#assignment-table').hide();
                $('#edit-assignment-form').show();
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




$(document).on('click','.edit-principal-btn',function(e){
    e.preventDefault();
    $('.alert').hide();
    var id = $(this).attr('data-id');
    //alert(id);
    $.ajax({
        url:base_url+'get-principal',
        data:{id:id},
        type:'post',
        success: function(out){
            out = JSON.parse(out);
            console.log(out.subject);
            if(out.status == 1){
                $('#edit_id').val(out.data.principal_id);
                //$('#edit_subject').val(out.data.subject_id);
                $('#edit_principal_name').val(out.data.principal_name);
                $('#edit_principal_email').val(out.data.principal_email);
                $('#edit_principal_username').val(out.data.principal_username);
                $('#edit_principal_phone').val(out.data.principal_phone);
                if(out.data.teacher_status==1) $('#edit_principal_status').attr('checked',true);
                $('#roles-table').hide();
                $('#edit-principal-form').show();
            }
            else if(out.status==0){
                alert(out.data);
            }
            else{
                window.location.href = base_url+"institute";
            }
        }
    })
})


  function publishchapter(id){
        $('#myModal').modal('show');
        $("#pchapter").val(id);

    // alert(base_url);
    // $.confirm({
    //     title: 'Confirm Publish!',
    //     content: 'Cant be reversed!',
    //     buttons: {
    //         confirm: function () {
    //             $("#pchapter").val(id);
    //              $('#myModal').modal('show');

    //         },
    //         cancel: function () {
    //             console.log('Cancelled!');
    //         }
    //     }
    // });
  }

            function publishchaptercontent(type,typeid,contentid,chapter){
                $('#myModal').modal('show');
                $("#type").val(type);
                $("#typeid").val(typeid);
                $("#contentid").val(contentid);
                $("#chapter").val(chapter);
            }


//principal login

$('#principal-login-form').submit(function(event) {
    event.preventDefault();
    var username = $.trim($('#username').val());
    var password = $.trim($('#password').val());
    //alert(username);
    $('.alert').removeClass('alert-danger');

    if(username && password){
        $.ajax({
            url:base_url+'principal-login',
            data:{username:username,password:password},
            type:'post',
            success: function(out){
                out = JSON.parse(out);
                if(out.status == 1){
                    $('.alert').addClass('alert-success');
                    $('.alert').html('Login successfull! Redirecting...');
                    setTimeout(function(){window.location.href = base_url+'principal-dashboard';},1500);
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




$(document).on('click','.forgot-password-principal',function(e){
    e.preventDefault();
    var username = $('#username').val();
    if(username != ''){
    $.ajax({
            url: base_url+'forgot-password-principal',
            type:'post',
            data: {username:username},
            success: function(out){
               out = JSON.parse(out);
                if(out.status == 1){
                    $('.alert').addClass('alert-success');
                    $('.alert').html(out.data);
                    
                }
                else{
                    $('.alert').addClass('alert-danger');
                    $('.alert').html(out.data);
                }
            }
        });
    }
    else{
        $('.alert').addClass('alert-danger');
        $('.alert').html('Enter username!');
    }
})
