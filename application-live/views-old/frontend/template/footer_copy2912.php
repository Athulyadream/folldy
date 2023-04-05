


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?=base_url('assets_main')?>/assets/js/jquery.min.js"></script>
<!-- <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
 --><script src="<?=base_url('assets_main')?>/assets/js/jquery-ui.min.js"></script>

<script src="<?=base_url('assets_main')?>/assets/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?=base_url('assets_main')?>/assets/js/bootstrap.bundle.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.js"></script>

<script type="text/javascript" src="<?=base_url('assets_main')?>/assets/js/custom.js"></script>

<script src="<?=base_url('assets_main')?>/assets/dragscript/jquery.sortable.js"></script>


<!-- <script src="<?=base_url('assets_main')?>/assets/lightbox/simpleLightbox.min.js"></script>
 --> <script type="text/javascript" src="<?=base_url('assets_main')?>/assets/js/html5-canvas-drawing-app.js"></script>




<script type="text/javascript">



        

        
   // $(document).ready(function(){
       
   //      //$('.show_question').trigger('click');
   //      toggleFull();
   //     return false;

   //         // if (elem.requestFullscreen) {
   //         //    elem.requestFullscreen();
   //         //  } else if (elem.mozRequestFullScreen) { /* Firefox */
   //         //    elem.mozRequestFullScreen();
   //         //  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
   //         //    elem.webkitRequestFullscreen();
   //         //  } else if (elem.msRequestFullscreen) { /* IE/Edge */
   //         //    elem.msRequestFullscreen();
   //         //  }  


   //         //  $(this).removeClass('show_full_screen');
   //         //  $(this).addClass('show_exit_screen');
   //         //  $(this).value='Exit';
   //       });


    function cancelFullScreen(el) {
            var requestMethod = el.cancelFullScreen||el.webkitCancelFullScreen||el.mozCancelFullScreen||el.exitFullscreen;
             var ctx=$('#can')[0].getContext("2d");

             $(".logo_name").css('margin-top','58px');

            ctx.canvas.height  = 600;
            if (requestMethod) { // cancel full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }

        function requestFullScreen(el) {
            //var divHeight = $(".left-block").height();


         var divHeight = $(".left-block").height();
       var  sreen_height = $(window).height();

              //alert(sreen_height);



    $(".logo_name").css('margin-top','168px');

              
            // Supports most browsers and their versions.
            var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullscreen;

            var ctx=$('#can')[0].getContext("2d");

            ctx.canvas.height  = 710;

            if (requestMethod) { // Native full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
            return false;
        }

        function toggleFull() {
           //alert("fdfd");
           $(".fl").css('display','none');

            var elem = document.body; // Make the body go full screen.
            var isInFullScreen = (document.fullScreenElement && document.fullScreenElement !== null) ||  (document.mozFullScreen || document.webkitIsFullScreen);

            if (isInFullScreen){

                 cancelFullScreen(document);
            } else {
                 requestFullScreen(elem);
            }
            return false;
        }
</script>



<script>
  // for (var i = 0; i <= 8; i++) {
  //   $('.photo-thumb'+i+' a').simpleLightbox();
  // }

    

    var sreen_height = 200;
    var sreen_width = 300;

    $(function () {

      var divWidth = $(".right-block").width();
        var divHeight = $(".right-block").height();
        //alert(divWidth);alert(divHeight);


//prepareCanvas();


//       var canvasDiv = document.getElementById('canvasDiv');
// canvas = document.createElement('canvas');
// canvas.setAttribute('width', canvasWidth);
// canvas.setAttribute('height', canvasHeight);
// canvas.setAttribute('id', 'canvas');
// canvasDiv.appendChild(canvas);
// if(typeof G_vmlCanvasManager != 'undefined') {
//   canvas = G_vmlCanvasManager.initElement(canvas);
// }
// context = canvas.getContext("2d");

        //$('.sortable').sortable();

        $('.connected').sortable({
            connectWith: '.connected',
           cursor: 'pointer'
               // cursor: 'url(cursor.cur), default'

        });
        $('.itemconnect').sortable().bind('dragend', function (e) {
            //console.log(Math.random());
            refresh_result();
        });
        
    $( "#draggable" ).draggable({

   cursor: 'pointer'
       //cursor: 'move'
    });
    // $( "#draggable" ).html("cursor : move");


//grid.html("cursor : " + cursor[i]);

//        $(document).on('dragstart','.itemconnect', function(e) {
//    refresh_result();
//    
//  });
   $('input.number').keyup(function(event) {
    alert("Xcxcxc");

  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40) return;

  // format number
  $(this).val(function(index, value) {


    if(!$.isNumeric(value)) {
                             return;
                             }else{
                                return value
    .replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    ;
                             }

    
  });
});
        $('.trans').click(function (e) {

            e.preventDefault();
            $('.trans_question').html('' + $(this).text() + '');
            //$('.trans_question').show();
            if($.trim($('#trans_img_' + $(this).attr('data_id')).html())) {
              $('#trans_img').attr('src',$.trim($('#trans_img_' + $(this).attr('data_id')).html()));
            $('#trans_img_a').attr('href',$.trim($('#trans_img_' + $(this).attr('data_id')).html()));
          }
            
            else {
              $('#trans_img').attr('src','');
            $('#trans_img_a').attr('href','');
          }




          // $('.photo-thumb-trans a').simpleLightbox();


          var id1=$.trim($('#trns_format_' + $(this).attr('data_id')).html());
                       var id2=$.trim($('#trns_format_value'+$(this).attr('data_id')).html());

              var id3=$.trim($('#trns_ans_value' + $(this).attr('data_id')).html());
              var id4=$.trim($('#trns_ans_col' + $(this).attr('data_id')).html());
              var id5=$.trim($('#trns_trans_all' + $(this).attr('data_id')).html());
                            var id6=$.trim($('#trns_format_table' + $(this).attr('data_id')).html());


                             if($.trim($('#trns_format_table' + $(this).attr('data_id')).html())){
                                      $(".tab-format.active").removeClass('active');


                                      $('.tab-format[data-tableid="'+id6+'"]').addClass('active');
                                    
                                    $('.problme-tab[data-tableid="'+id6+'"]').addClass('active');



                                    }



 //alert(id2);

              $('.tab-format[data-tableid="'+id6+'"]').addClass('active');

                                  $(".problem-tr").each(function(){

                                  $(this).css('background','rgb(255, 235, 204)');



                                  });
                                  
                                                   //var myarray = prblem.toString().split(',');



                                      var myarray = id2.toString().split(',');
                                        

                            for(var i = 0; i < myarray.length; i++)
                            {
                              
                           $('.problem-tr[data-prblem="'+myarray[i]+'"]').css('background','rgba(0,123,255,.5)');

                                 // console.log(myarray[i]);

                            }


                             var myarray1 = id3.toString().split(',');
                           var myarraycol = id4.toString().split(',');



                            for(var i = 0; i < myarray1.length; i++)
                            {
                              
                                                        // $('.problem-tr[data-prblem="'+myarray1[i]+'"]').css('background','rgba(0,123,255,.5)');
                                                        // $('.ans_tab').find('.itemconnect[data-ansid="'+myarray1[i]+'"][data-column="'+myarraycol[i]+'"]').css('background','rgba(120, 189, 243, 0.41)');

                                                         $('.ans_tab').find('.itemconnect[data-ansid="'+myarray1[i]+'"][data-column="'+myarraycol[i]+'"]').addClass('oredr-active');

                                 // console.log(myarray[i]);

                            }


                                        var myarraytrans = id5.toString().split(',');


                            for(var i = 0; i < myarraytrans.length; i++)
                            {
                              
                            $('.trans[data-transaction="'+myarraytrans[i]+'"]').css('background','rgba(171, 102, 102, 0.36)');

                                 // console.log(myarray[i]);

                            }







            if($.trim($('#trans_helptext_' + $(this).attr('data_id')).html())){
                $('.help-text').html('<p>'+$('#trans_helptext_' + $(this).attr('data_id')).html()+'</p>');
            }
            else $('.help-text').html('');
            $(this).addClass('tran_inactive');
            $('.trans_tray').html($('#question_spits_' + $(this).attr('data_id')).html());
            $('.connected').sortable({
                connectWith: '.connected',
                cursor: 'move'

            });
            if($('#question-area').hasClass('col-md-12')){
                $('.show_answer').trigger('click');
            }
        });


// $( ".leftdiv" ).hover(function() {
// // alert('hgdsgsdh');
  
//   });


        $('.trans-tr').click(function (e) {
            e.preventDefault();

          // alert('ghghgh');


              //$(this).toggleClass("cellselect");

          $('.trans_question').html($(this).find('.disc_val').text());
         // $('.trans_question').show();

          //$('.trans_question').hide();
        //  $('.trans_question').append('<li class="disc trans_question1">'+$(this).attr('data-name')+'</li>');
            // var tr='<ul class="connected1 list trans_tray" style="width:70%"><li class="disc " draggable="true">'+$(this).attr('data-name')+'</li>'+ '</ul>';

            // //                                                 
            //                                              $('.trans_question').html(tr);
            //                                              console.log(tr);

           // $('#trans_img').attr('src','');

            if($.trim($('#quest_helpimg_' + $(this).attr('data_id')).html())) {
              $('#trans_img').attr('src',$.trim($('#quest_helpimg_' + $(this).attr('data_id')).html()));
            $('#trans_img_a').attr('href',$.trim($('#quest_helpimg_' + $(this).attr('data_id')).html()));
          }
            
            else {
              $('#trans_img').attr('src','');
            $('#trans_img_a').attr('href','');
          }


            if($.trim($('#quest_helptext_' + $(this).attr('data_id')).html())){
                $('.help-text').html('<p>'+$('#quest_helptext_' + $(this).attr('data_id')).html()+'</p>');
            }
            else $('.help-text').html('');


            if($.trim($('#quest_format_' + $(this).attr('data_id')).html())){
              //console.log();
              var id1=$.trim($('#quest_format_' + $(this).attr('data_id')).html());
              var id3=$.trim($('#quest_ans_value' + $(this).attr('data_id')).html());
              var id4=$.trim($('#quest_ans_col' + $(this).attr('data_id')).html());
              var id5=$.trim($('#quest_trans_all' + $(this).attr('data_id')).html());
              var id6=$.trim($('#quest_format_table' + $(this).attr('data_id')).html());


             var id2=$.trim($('#quest_format_value' + $(this).attr('data_id')).html());


                             




                      // $('.tab-format[data-format="'+id1+'"]').addClass('active');

                        // $(".problem-tr").each(function(){

                        //             $(this).css('background','rgba(255, 235, 59, 0.45)');


                        //           });


                                    if($.trim($('#quest_format_table' + $(this).attr('data_id')).html())){
                                      $(".tab-format.active").removeClass('active');


                                      $('.tab-format[data-tableid="'+id6+'"]').addClass('active');
                                    
                                   // $('.problme-tab[data-tableid="'+id6+'"]').addClass('active');




                                    }


                                    

                                   //  $('.tab-format[data-tableid="'+id6+'"]').show();

                                   // $('.ans_tab[data-tableid="'+id6+'"]').show();




                                  $(".problem-tr").each(function(){

                                    $(this).css('background','rgb(255, 235, 204)');


                                  });
                                                   //var myarray = prblem.toString().split(',');



                                      var myarray = id2.toString().split(',');


                            for(var i = 0; i < myarray.length; i++)
                            {
                              
                            $('.problem-tr[data-prblem="'+myarray[i]+'"]').css('background','rgba(0,123,255,.5)');

                                 // console.log(myarray[i]);

                            }



                            var myarray1 = id3.toString().split(',');
                           var myarraycol = id4.toString().split(',');



                            for(var i = 0; i < myarray1.length; i++)
                            {
                              
                              // alert(myarray1[i]);
                              // alert(myarraycol[i]);
                                                        // $('.problem-tr[data-prblem="'+myarray1[i]+'"]').css('background','rgba(0,123,255,.5)');
                                                        // $('.ans_tab').find('.itemconnect[data-ansid="'+myarray1[i]+'"][data-column="'+myarraycol[i]+'"]').css('background','rgba(120, 189, 243, 0.41)');

                                                          $('.ans_tab').find('.itemconnect[data-ansid="'+myarray1[i]+'"][data-column="'+myarraycol[i]+'"]').addClass('oredr-active');

                                 // console.log(myarray[i]);

                            }


                                        var myarraytrans = id5.toString().split(',');


                            for(var i = 0; i < myarraytrans.length; i++)
                            {
                              
                            $('.trans[data-transaction="'+myarraytrans[i]+'"]').css('background','rgba(171, 102, 102, 0.36)');

                                 // console.log(myarray[i]);

                            }





                          





                // $('.help-text').html('<p>'+$('#quest_helptext_' + $(this).attr('data_id')).html()+'</p>');
            }





if($('#inter-stat').val()==1){
                        var q_val=$(this).find('.disc_val').data('qst');
      var base_url = '<?=base_url()?>';

                        var type='quest';
                        //alert('dnjhd');

                          $.ajax({
        url:base_url+'get-inter-question',
        type:'post',
        data:{type:type,q_val:q_val},
        success: function(out){
            var out =JSON.parse(out);
            if (out.status == 1) {

var data=out.data;
var option=data.option_no;
$('.qst-area').html('<p>'+data.title+'</p>');
  var htm=''

for(var i=0;i<option;i++){

  var name_array=[data.option1,data.option2,data.option3,data.option4];
  var k=i+1;

   var op='option'+k;
  // var val=data.op;

    console.log(name_array[i]);

  //console.log(data+'.'+op);
  //Things[i]
   htm+='<label class="container-radio">'+name_array[i]+'<input type="radio" name="radio" class="options-val" id="options-val" value="'+op+'"><span class="checkmark"></span></label>';

   // $('.append-option').html('<label class="container-radio">'+name_array[i]+'<input type="radio" name="radio" value="'+op+'"><span class="checkmark"></span></label>');
}

$('.append-option').html(htm);
$('#ans_val').val(data.answer_value);


$('.options-val').change(function() {
      //alert($(this).val());
      var value3=$(this).val();
      if(value3!=data.answer_value){

          $(this).parent().find('.checkmark').css('background','red');
      }else{

          $(this).parent().find('.checkmark').css('background','green');
                          $('#getModal').modal('hide');

      }


      });



             


                $('#getModal').modal('show');
              //  $('#getModal').modal('show');
            }
            else if(out.status == 0){
                //alert(out.data);
            }
            else{
                window.location.href = base_url;
            }
        }
    });
     }
            //else $('.help-text').html('');

//console.log($('.help-text').html());
// <li class="disc trans_question1">'+$(this).attr('data-name')+'</li>'+

            $('.trans_tray').html($('#question_tr_spits_' + $(this).attr('data_id')).html());
           //  $('.trans_tray').append('<li class="disc trans_question1">'+$(this).attr('data-name')+'</li>');

           
           // console.log($('#question_tr_spits_' + $(this).attr('data_id')).html());
            $('.connected').sortable({
                connectWith: '.connected',
                cursor: 'move'

            });




           // $('.help-text').html('');
            if($('#question-area').hasClass('col-md-12')){

                 if($('.show_image_answer').hasClass('active')){
                 // alert('hjjjj');
                  //$('.show_image_answer').addClass('active');

                   $('.show_image_answer').trigger('click');


                 // show_image_answer();



                 }else{
                  $('.show_answer').trigger('click');


                    }


            }
        });


$(document).ready(function() {

    
    });



var lastClicked;


        $('.problem-tr').click(function (e) {
                            $(this).addClass('active');


          e.preventDefault();
           lastClicked=$(this).attr("class");



          var actv=$(".tab-format.active").data("id");
             if($('#table_img'+actv).html()){

                 $('#table_img'+actv).hide();
                 $('.problme-tab').hide();
                 
                 


if($('#inter-stat').val()==1){


                 var q_val=$(this).data('prblem');
      var base_url = '<?=base_url()?>';

                        var type='problem';
                        //alert('dnjhd');

                          $.ajax({
        url:base_url+'get-inter-question',
        type:'post',
        data:{type:type,q_val:q_val},
        success: function(out){
            var out =JSON.parse(out);
            if (out.status == 1) {

var data=out.data;
var option=data.option_no;
$('.qst-area').html('<p>'+data.title+'</p>');
  var htm=''

for(var i=0;i<option;i++){

  var name_array=[data.option1,data.option2,data.option3,data.option4];
  var k=i+1;

   var op='option'+k;
  // var val=data.op;

    console.log(name_array[i]);

  //console.log(data+'.'+op);
  //Things[i]
   htm+='<label class="container-radio">'+name_array[i]+'<input type="radio" name="radio" class="options-val" id="options-val" value="'+op+'"><span class="checkmark"></span></label>';

   // $('.append-option').html('<label class="container-radio">'+name_array[i]+'<input type="radio" name="radio" value="'+op+'"><span class="checkmark"></span></label>');
}

$('.append-option').html(htm);
$('#ans_val').val(data.answer_value);


$('.options-val').change(function() {
      //alert($(this).val());
      var value3=$(this).val();
      if(value3!=data.answer_value){

          $(this).parent().find('.checkmark').css('background','red');
      }else{

          $(this).parent().find('.checkmark').css('background','green');
                          $('#getModal').modal('hide');

      }


      });



             


                $('#getModal').modal('show');
              //  $('#getModal').modal('show');
            }
            else if(out.status == 0){
                //alert(out.data);
            }
            else{
                window.location.href = base_url;
            }
        }
    });
                        }

                 if($('.show_image_answer').hasClass('active')){

                 if($('.show_question_new').parent().hasClass('active')){
                   // alert('hjhhjd');

                    // alert('ddddd');



                  }else{
                  $('.show_image_answer').removeClass('active');

                    }


                 }



                  $('.show_answer').trigger('click');
               }


         


        });







        
        $(document).on('click','.add_new_row',function () {



           if($('#answer-area').hasClass('full')){

               var stat=$('#predefined').val();


              var activeinput=$('.active1 .row_data > tbody > tr > td').find('#input-field').val();
                             var activeinput1=$('.active2 .row_data > tbody > tr > td').find('#input-field').val();

                                           //console.log(activeinput);


        

             var htm = '<tr>'+$('.active1 .row_data > tbody > tr.hidden').html()+'</tr>';
             //if(typeof val === 'undefined')
             if(typeof activeinput!=='undefined'){
               $('.active1 .row_data > tbody > tr:last-child').after(htm);


             }
            var htm = '<tr>'+$('.active2 .row_data > tbody > tr.hidden').html()+'</tr>';
                         if(typeof activeinput1!='undefined'){

            $('.active2 .row_data > tbody > tr:last-child').after(htm);
            }


           //   if(stat==1){
                            
           //                  $('.hidden_new').hide();
           //             }else{
           // // $('.hidden_new').show();
           //             $('.ans_tr').show();
           //            }



           }else{


             var stat=$('#predefined').val();


             var htm = '<tr>'+$('.active .row_data > tbody > tr.hidden').html()+'</tr>';
            $('.active .row_data > tbody > tr:last-child').after(htm);

           }


           // console.log(htm);
            $('.itemconnect').sortable('destroy');
            $('.connected').sortable({
                connectWith: '.connected',
                cursor: 'move'

            });
            $('.itemconnect').sortable().bind('dragend', function (e) {
                //console.log(Math.random());
                refresh_result();
            });
            refresh_result();



        });
        $('.remove_new_row').click(function () {
            $('.tab.active .row_data tr').each(function (i, tr) {

                // console.log('tr '+ $(tr).html());
                // console.log('tr ' + i);
                var empty_flg = true;
                $(tr).find('td').each(function (j, td) {
                   //console.log($(td).html())
                    if ($.trim($(td).html()) != '') {

                        empty_flg = false;
                    }
                });
                // console.log(empty_flg)
                //alert($('#result tr').length);
                if (empty_flg && !$(tr).hasClass('hidden') && $('.tab.active .row_data tr').length > 2) {
//                    alert('Delete '+i);
                    $(tr).remove();
                }
            });
        });
        $('.show_question').click(function () {
            $('#question-area').removeClass('col-md-6');
            $('#question-area').addClass('col-md-12 full_q');
            $('.q_area').addClass('align-items-center');
            $('.question-div').css('padding-left','85px');
            $('.question-div').css('padding-right','85px');
           
            $('#question-area').removeClass('d-none');
            $('#answer-area').addClass('d-none');


            $(".problem-tr").each(function(){

                                  $(this).removeClass('active');



                                  });


           //alert($('.quest_table ').length);
            if($('.quest_table ').length>1){


            if($(".q_link.active").attr('data-id')==1){
             // alert('hjhjdhj');
                  var act = $(".table-box.active").first();
                  
                  var single_wid = act.attr('data-width');
                  // alert(single_wid);
                  if(single_wid!=0){
                     $(act).css('width',single_wid+'%');
                   }else{
                     $(act).css('width','100%');
                   }

            }else{


                $(".quest_table").css('display','none');
               

                var act = $(".table-box.active").first();
                  var id = parseInt(act.attr('data-id'))+1;
                  var single_wid = act.attr('data-width');
                   single_wid=single_wid-20;

                   $(".quest_table").removeClass('active');

                var tab1 = '#qt-div'+id;
                var single_wid2 = $(tab1).attr('data-width');
                                  single_wid2=single_wid2-20;

                $(act).css('display','block');
                $(act).css('float','left');

                //$(act).css('display','block');
                $(tab1).css('display','block');
                $(tab1).css('float','right');
                $(act).addClass('active');
                $(tab1).addClass('active1');
                


                  if(single_wid!=0 && single_wid2!=0){
                    var single_wid1=single_wid-2;
                    var single_width2=single_wid2-2;
                  $(act).css('width',single_wid1+'%');
                  $(tab1).css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){
                  
                  var wid=100-single_wid2;
                   single_wid2=single_wid2-2;
                  $(act).css('width',wid+'%');
                  $(tab1).css('width',single_wid2+'%');
                }
                 else if(single_wid!=0 && single_wid2==0){


                  var wid=100-single_wid;
                     single_wid=single_wid-2;
                                  // alert(wid);


                  $(act).css('width',single_wid+'%');
                   $(tab1).css('width',wid+'%');
                }
                else{
                  $('.quest_table ').css("width","48%");
                }

                }


             //$('.quest_table ').css("width","48%");
            }else{
             
                  var act = $(".table-box.active").first();
                  
                  var single_wid = act.attr('data-width');
                                       //$(act).css('float','left');

                  // alert(single_wid);
                  if(single_wid!=0){
                     $(act).css('width',single_wid+'%');
                   }else{
                     $(act).css('width','100%');
                   }
            }






            $('.transations ').css("display","block");
            var h=0;
           $(".transations").each(function(){

             h+= $(this).height();
              if(h>70)
                {
                    var dataid=$(this).data('id');
                    var bal=dataid%2;
                    if(bal==0){
                       $(this).css("float","none");  
                    }else{
                       $(this).css("float","right");   
                    }

                   $(this).css("width","100%");  
                }
            

           });

         $(".preview").each(function(){
          $(this).removeClass('active');
         });
           
         $(this).parent().addClass('active');
                 
             // $('.transations').height(sreen_height - $('.question').height() - $('#qt-div').height() - 110);


        });


        $('.show_answer').click(function (e) {
             e.preventDefault();
 			 e.stopImmediatePropagation();

                              //  alert('showans');



                          $('#answer-area').removeClass('col-md-6');

                          $('#answer-area').addClass(' offset-md-2 col-md-8 full');
                          $('#answer-area').removeClass('col-md-12');

                          $('#answer-area').removeClass('d-none');
                          $('#question-area').addClass('d-none');


                        if($('#question-area').hasClass('col-md-6')){


                           $(".show_image_answer").removeClass("active");
                           $("#question-area").removeClass("col-md-6");
                           $("#question-area").addClass("col-md-12 full_q");


                         }




          // show_image_answer 
                 // if($('.show_question_new').parent().hasClass('active')){

                                if($('.show_image_answer').hasClass('active')){

                                 // alert('hhhhh');

                 // if($('.show_question_new').parent().hasClass('active')){


//alert(lastClicked);
    // if (lastClicked.indexOf("problem-tr") > -1) {
    
    // }

//;

// if (!$(this).hasClass("test")) {




                      if($('.show_question_new').parent().hasClass('active')){
// && (!$('.problem-tr').hasClass('active'))

               if($('.problme-tab').hasClass('active')){


                    if($('.problem-tr').hasClass('active')){
                     // alert('ghdd');



                      $('.pr-pag-link').addClass('disabled'); 
              $('.ans-pag-link').removeClass('disabled'); 




          

            // $('#answer-area').addClass('col-md-12');
            
            

            // $(".ans_tab").each(function(){
                //var id=$(this).data('id');


                
                  var htm = $('#answer-area').find('.trans_question').html() ? $('#answer-area').find('.trans_question').html() : '';
                  var tr_html=$('#answer-area').find('.trans_tray').html() ? $('#answer-area').find('.trans_tray').html() : '';
                 //console.log($('#answer-area').find('.trans_tray').html());

                  if($.trim($('#answer-area').find('.trans_question').html())!=''){
                    // modified for hide tranaction tray//
                   // $('#answer-area').find('.trans_question').css('display','block');
                   
                     // $('#answer-area').find('.help-text').show();
                      $('#answer-area').find('.transaction-pool').css('display','none');

                  }
                 else if($.trim($('#answer-area').find('.trans_tray').html())!=''){
                   //alert("hhh");
                    // modified for hide tranaction tray//
                     $('#answer-area').find('.trans_question').css('display','none');
                     // $('#answer-area').find('.help-text').show();
                      $('#answer-area').find('.transaction-pool').css('display','none');
           }
                  else{
                    //alert("cvhv");
                  // $('.q_area').removeClass('align-items-center');
                     $('.answer-area').find('.trans_question').css('display','none');
                     // $('#answer-area').find('.help-text').hide();
                    $('.answer-area').find('.transaction-pool').css('display','none');
                  }


                     var act = $(".ans_tab.active");


                      if($('#answer-area').hasClass('offset-md-2 col-md-8')){

                    //      act.css("display","block");
                    //      act.addClass('active1');
                    //      $('#answer-area').removeClass('col-md-12');
                        
                    // var single_wid2 = $(act).attr('data-width');
                    // if(single_wid2!=0){
                    //    $(act).css('width',single_wid2+'%');
                    // }
// modify//
                       if($("#table2").length != 0) {

                            $(act).css("display","block");
                            var single_wid = $('#table2').attr('data-width');
                            var single_wid2 = $('#table1').attr('data-width');
                        // $('#table2').css("width","48%");
                         if ($('#table2').hasClass('active1')){

                                           }else{
                                            $('#table2').addClass('active2');
                                           }
                         $('#table2').css("display","block");
                          $('#table1').css("display","block");
                         $('#table2').css("float","right");
                         

                          
                           if ($('#table1').hasClass('active2')){

                                           }else{
                                           $('#table1').addClass('active1');
                                           }
                         // $('#table1').css("width","48%");
                          $('#table1').css("display","block");



                          if(single_wid!=0 && single_wid2!=0){
                    var single_wid1=single_wid-2;
                    var single_width2=single_wid2-2;
                  $('#table2').css('width',single_wid1+'%');
                  $('#table1').css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){
                  
                  var wid=100-single_wid2;
                   single_wid2=single_wid2-2;
                  $('#table2').css('width',wid+'%');
                  $('#table1').css('width',single_wid2+'%');
                }
                 else if(single_wid!=0 && single_wid2==0){
                  var wid=100-single_wid;
                     single_wid=single_wid-2;

                  $('#table2').css('width',single_wid+'%');
                   $('#table1').css('width',wid+'%');
                }
                else{
                 $('#table2').css('width','100%');
                   $('#table1').css('width','100%');
                }


                $(".ans_tab").each(function(){



                                                
                                                
                                                // $(this).css('width','100%');
                                                 $(this).css('float','left');
                    // $(this).css('float','left');
                    
                              });
                         
                          $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');

                           //$('#answer-area').removeClass('offset-md-2 col-md-8');
                            //$('#answer-area').addClass('col-md-12');
                    }else{
                      //modify//


                      $('.ans-pag-link[data-id="2"]').addClass('disabled'); 
                       $(act).css("display","block");

                        act.addClass('active1');
                         $('#answer-area').removeClass('col-md-12');
                         $('#answer-area').addClass(' offset-md-2 col-md-8');
                    var single_wid2 = $(act).attr('data-width');
                     if(single_wid2!=0){
                    $(act).css('width',single_wid2+'%');
                  }

                  // modify//




                    }
                   




                       }else{
                     //console.log(act);

                                                                   //  alert("Fdfd");


                    if($("#table2").length != 0) {

                                $('#answer-area').addClass('offset-md-2 col-md-8');
                               $('#answer-area').removeClass('col-md-12');



                        console.log("Fdfd");
                           // $(act).css("display","none");
                            var single_wid = $('#table2').attr('data-width');
                            var single_wid2 = $('#table1').attr('data-width');
                        // $('#table2').css("width","48%");

                                           if ($('#table2').hasClass('active1')){

                                           }else{
                                            $('#table2').addClass('active2');
                                           }

                         
                         $('#table2').css("display","block");
                         $('#table2').css("float","right");
                         

                          
                          

                           if ($('#table1').hasClass('active2')){

                                           }else{
                                           $('#table1').addClass('active1');
                                           }
                         // $('#table1').css("width","48%");
                          $('#table1').css("display","block");



                          if(single_wid!=0 && single_wid2!=0){
                    var single_wid1=single_wid-2;
                    var single_width2=single_wid2-2;
                  $('#table2').css('width',single_wid1+'%');
                  $('#table1').css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){
                  
                  var wid=100-single_wid2;
                   single_wid2=single_wid2-2;
                  $('#table2').css('width',wid+'%');
                  $('#table1').css('width',single_wid2+'%');
                }
                 else if(single_wid!=0 && single_wid2==0){
                  var wid=100-single_wid;
                     single_wid=single_wid-2;

                  $('#table2').css('width',single_wid+'%');
                   $('#table1').css('width',wid+'%');
                }
                else{
                 $('#table2').css('width','100%');
                   $('#table1').css('width','100%');
                }
                         
                          $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');
                    }else{
                      //modify//

                      $('.ans-pag-link[data-id="2"]').addClass('disabled'); 

                        act.addClass('active1');
                       $(act).css("display","block");

                        $('#answer-area').removeClass('col-md-12');
            $('#answer-area').addClass(' offset-md-2 col-md-8');
                    var single_wid2 = $(act).attr('data-width');
                     if(single_wid2!=0){
                    $(act).css('width',single_wid2+'%');
                  }




                    }
                  }

                


                         $(".preview").each(function(){
                          $(this).removeClass('active');
                         });
                           
                         $(this).parent().addClass('active');


                      }else{

             // if($('#table_img0').css('display') == 'block'){
                                 $(".show_image_answer").trigger("click");


                                                           // alert('ret');

if($('#table_img0').is(':visible')){

             // if($('#table_img0').css('display') == 'block'){
                                                                //  alert('hide');

                                 }else{

             // if($('#table_img0').css('display') == 'block'){
                                                                 // alert('hide1');

                                 }  


                                 }  

                // && (!$('.problem-tr').hasClass('active'))

                
                                 //break;

// return false;                               //  }


                                      
                                    }else{

                                       // alert('bbb');


                                    $('.pr-pag-link').addClass('disabled'); 
              $('.ans-pag-link').removeClass('disabled'); 




          

            // $('#answer-area').addClass('col-md-12');
            
            

            // $(".ans_tab").each(function(){
                //var id=$(this).data('id');


                
                  var htm = $('#answer-area').find('.trans_question').html() ? $('#answer-area').find('.trans_question').html() : '';
                  var tr_html=$('#answer-area').find('.trans_tray').html() ? $('#answer-area').find('.trans_tray').html() : '';
                 //console.log($('#answer-area').find('.trans_tray').html());

                  if($.trim($('#answer-area').find('.trans_question').html())!=''){
                    // modified for hide tranaction tray//
                   // $('#answer-area').find('.trans_question').css('display','block');
                   
                     // $('#answer-area').find('.help-text').show();
                      $('#answer-area').find('.transaction-pool').css('display','none');

                  }
                 else if($.trim($('#answer-area').find('.trans_tray').html())!=''){
                   //alert("hhh");
                    // modified for hide tranaction tray//
                     $('#answer-area').find('.trans_question').css('display','none');
                     // $('#answer-area').find('.help-text').show();
                      $('#answer-area').find('.transaction-pool').css('display','none');
           }
                  else{
                    //alert("cvhv");
                  // $('.q_area').removeClass('align-items-center');
                     $('.answer-area').find('.trans_question').css('display','none');
                     // $('#answer-area').find('.help-text').hide();
                    $('.answer-area').find('.transaction-pool').css('display','none');
                  }


                     var act = $(".ans_tab.active");


                      if($('#answer-area').hasClass('offset-md-2 col-md-8')){

                    //      act.css("display","block");
                    //      act.addClass('active1');
                    //      $('#answer-area').removeClass('col-md-12');
                        
                    // var single_wid2 = $(act).attr('data-width');
                    // if(single_wid2!=0){
                    //    $(act).css('width',single_wid2+'%');
                    // }
// modify//
                       if($("#table2").length != 0) {

                            $(act).css("display","block");
                            var single_wid = $('#table2').attr('data-width');
                            var single_wid2 = $('#table1').attr('data-width');
                        // $('#table2').css("width","48%");
                         if ($('#table2').hasClass('active1')){

                                           }else{
                                            $('#table2').addClass('active2');
                                           }
                         $('#table2').css("display","block");
                        //  $('#table1').css("display","block");
                         $('#table2').css("float","left");
                         

                          
                           if ($('#table1').hasClass('active2')){

                                           }else{
                                           $('#table1').addClass('active1');
                                           }
                         // $('#table1').css("width","48%");
                          $('#table1').css("display","block");



                          if(single_wid!=0 && single_wid2!=0){
                    var single_wid1=single_wid-2;
                    var single_width2=single_wid2-2;
                  $('#table2').css('width',single_wid1+'%');
                  $('#table1').css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){
                  
                  var wid=100-single_wid2;
                   single_wid2=single_wid2-2;
                  $('#table2').css('width',wid+'%');
                  $('#table1').css('width',single_wid2+'%');
                }
                 else if(single_wid!=0 && single_wid2==0){
                  var wid=100-single_wid;
                     single_wid=single_wid-2;

                  $('#table2').css('width',single_wid+'%');
                   $('#table1').css('width',wid+'%');
                }
                else{
                 $('#table2').css('width','100%');
                   $('#table1').css('width','100%');
                }


                   $(".ans_tab").each(function(){

                                         // $(this).css('width','100%');
                                                 $(this).css('float','left');
                    // $(this).css('float','left');
                    
                              });
                         
                          $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');

                           //$('#answer-area').removeClass('offset-md-2 col-md-8');
                            //$('#answer-area').addClass('col-md-12');
                    }else{
                      //modify//


                      $('.ans-pag-link[data-id="2"]').addClass('disabled'); 
                       $(act).css("display","block");

                        act.addClass('active1');
                         $('#answer-area').removeClass('col-md-12');
                         $('#answer-area').addClass(' offset-md-2 col-md-8');
                    var single_wid2 = $(act).attr('data-width');
                     if(single_wid2!=0){
                    $(act).css('width',single_wid2+'%');
                  }

                  // modify//




                    }
                   




                       }else{
                     //console.log(act);

                                                                   //  alert("Fdfd");


                    if($("#table2").length != 0) {

                                $('#answer-area').addClass('offset-md-2 col-md-8');
                               $('#answer-area').removeClass('col-md-12');



                        console.log("Fdfd");
                            $(act).css("display","none");
                            var single_wid = $('#table2').attr('data-width');
                            var single_wid2 = $('#table1').attr('data-width');
                        // $('#table2').css("width","48%");

                                           if ($('#table2').hasClass('active1')){

                                           }else{
                                            $('#table2').addClass('active2');
                                           }

                         
                         $('#table2').css("display","block");
                         $('#table2').css("float","left");
                         


                          
                          

                           if ($('#table1').hasClass('active2')){

                                           }else{
                                           $('#table1').addClass('active1');
                                           }
                         // $('#table1').css("width","48%");
                          $('#table1').css("display","block");



                          if(single_wid!=0 && single_wid2!=0){
                    var single_wid1=single_wid-2;
                    var single_width2=single_wid2-2;
                  $('#table2').css('width',single_wid1+'%');
                  $('#table1').css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){
                  
                  var wid=100-single_wid2;
                   single_wid2=single_wid2-2;
                  $('#table2').css('width',wid+'%');
                  $('#table1').css('width',single_wid2+'%');
                }
                 else if(single_wid!=0 && single_wid2==0){
                  var wid=100-single_wid;
                     single_wid=single_wid-2;

                  $('#table2').css('width',single_wid+'%');
                   $('#table1').css('width',wid+'%');
                }
                else{
                 $('#table2').css('width','100%');
                   $('#table1').css('width','100%');
                }
                         
                          $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');
                    }else{
                      //modify//

                      $('.ans-pag-link[data-id="2"]').addClass('disabled'); 

                        act.addClass('active1');
                        $('#answer-area').removeClass('col-md-12');
            $('#answer-area').addClass(' offset-md-2 col-md-8');
                    var single_wid2 = $(act).attr('data-width');
                     if(single_wid2!=0){
                    $(act).css('width',single_wid2+'%');
                  }




                    }
                  }

                


                         $(".preview").each(function(){
                          $(this).removeClass('active');
                         });
                           
                         $(this).parent().addClass('active');


}
                               // $(".show_image_answer").trigger("click");





                           }else{



                               $(".show_image_answer").trigger("click");


                            // alert('ret2');

                                // alert('dgdjjhd');


                           }

                                }else{


                                    $('.pr-pag-link').addClass('disabled'); 
              $('.ans-pag-link').removeClass('disabled'); 




          

            // $('#answer-area').addClass('col-md-12');
            
            

            // $(".ans_tab").each(function(){
                //var id=$(this).data('id');


                
                  var htm = $('#answer-area').find('.trans_question').html() ? $('#answer-area').find('.trans_question').html() : '';
                  var tr_html=$('#answer-area').find('.trans_tray').html() ? $('#answer-area').find('.trans_tray').html() : '';
                 //console.log($('#answer-area').find('.trans_tray').html());

                  if($.trim($('#answer-area').find('.trans_question').html())!=''){
                    // modified for hide tranaction tray//
                   // $('#answer-area').find('.trans_question').css('display','block');
                   
                     // $('#answer-area').find('.help-text').show();
                      $('#answer-area').find('.transaction-pool').css('display','none');

                  }
                 else if($.trim($('#answer-area').find('.trans_tray').html())!=''){
                   //alert("hhh");
                    // modified for hide tranaction tray//
                     $('#answer-area').find('.trans_question').css('display','none');
                     // $('#answer-area').find('.help-text').show();
                      $('#answer-area').find('.transaction-pool').css('display','none');
           }
                  else{
                    //alert("cvhv");
                  // $('.q_area').removeClass('align-items-center');
                     $('.answer-area').find('.trans_question').css('display','none');
                     // $('#answer-area').find('.help-text').hide();
                    $('.answer-area').find('.transaction-pool').css('display','none');
                  }


                     var act = $(".ans_tab.active");


                      if($('#answer-area').hasClass('offset-md-2 col-md-8')){

                    //      act.css("display","block");
                    //      act.addClass('active1');
                    //      $('#answer-area').removeClass('col-md-12');
                        
                    // var single_wid2 = $(act).attr('data-width');
                    // if(single_wid2!=0){
                    //    $(act).css('width',single_wid2+'%');
                    // }
// modify//
                       if($("#table2").length != 0) {

                            $(act).css("display","block");
                            var single_wid = $('#table2').attr('data-width');
                            var single_wid2 = $('#table1').attr('data-width');
                        // $('#table2').css("width","48%");
                         if ($('#table2').hasClass('active1')){

                                           }else{
                                            $('#table2').addClass('active2');
                                           }
                         $('#table2').css("display","block");
                        //  $('#table1').css("display","block");
                         $('#table2').css("float","left");
                         

                          
                           if ($('#table1').hasClass('active2')){

                                           }else{
                                           $('#table1').addClass('active1');
                                           }
                         // $('#table1').css("width","48%");
                          $('#table1').css("display","block");



                          if(single_wid!=0 && single_wid2!=0){
                    var single_wid1=single_wid-2;
                    var single_width2=single_wid2-2;
                  $('#table2').css('width',single_wid1+'%');
                  $('#table1').css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){
                  
                  var wid=100-single_wid2;
                   single_wid2=single_wid2-2;
                  $('#table2').css('width',wid+'%');
                  $('#table1').css('width',single_wid2+'%');
                }
                 else if(single_wid!=0 && single_wid2==0){
                  var wid=100-single_wid;
                     single_wid=single_wid-2;

                  $('#table2').css('width',single_wid+'%');
                   $('#table1').css('width',wid+'%');
                }
                else{
                 $('#table2').css('width','100%');
                   $('#table1').css('width','100%');
                }



                     $(".ans_tab").each(function(){


                                            // if($(this).hasClass('active1')){
                                                
                                            //   $(this).show();
                                            // }else{
                                            //    // $(this).removeClass('active2').hide(); 
                                            //    //  $(this).removeClass('active').hide();
                                            // }

                                                
                                                
                                               // $(this).css('width','100%');
                                                 $(this).css('float','left');
                    // $(this).css('float','left');
                    
                              });
                         
                          $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');

                           //$('#answer-area').removeClass('offset-md-2 col-md-8');
                           // $('#answer-area').addClass('col-md-12');
                    }else{
                      //modify//


                      $('.ans-pag-link[data-id="2"]').addClass('disabled'); 
                       $(act).css("display","block");

                        act.addClass('active1');
                         $('#answer-area').removeClass('col-md-12');
                         $('#answer-area').addClass(' offset-md-2 col-md-8');
                    var single_wid2 = $(act).attr('data-width');
                     if(single_wid2!=0){
                    $(act).css('width',single_wid2+'%');
                  }

                  // modify//




                    }
                   




                       }else{
                     //console.log(act);

                                                                   //  alert("Fdfd");


                    if($("#table2").length != 0) {

                                $('#answer-area').addClass('offset-md-2 col-md-8');
                               $('#answer-area').removeClass('col-md-12');



                        console.log("Fdfd");
                            $(act).css("display","none");
                            var single_wid = $('#table2').attr('data-width');
                            var single_wid2 = $('#table1').attr('data-width');
                        // $('#table2').css("width","48%");

                                           if ($('#table2').hasClass('active1')){

                                           }else{
                                            $('#table2').addClass('active2');
                                           }

                         
                         $('#table2').css("display","block");
                         $('#table2').css("float","left");
                         

                          
                          

                           if ($('#table1').hasClass('active2')){

                                           }else{
                                           $('#table1').addClass('active1');
                                           }
                         // $('#table1').css("width","48%");
                          $('#table1').css("display","block");



                          if(single_wid!=0 && single_wid2!=0){
                    var single_wid1=single_wid-2;
                    var single_width2=single_wid2-2;
                  $('#table2').css('width',single_wid1+'%');
                  $('#table1').css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){
                  
                  var wid=100-single_wid2;
                   single_wid2=single_wid2-2;
                  $('#table2').css('width',wid+'%');
                  $('#table1').css('width',single_wid2+'%');
                }
                 else if(single_wid!=0 && single_wid2==0){
                  var wid=100-single_wid;
                     single_wid=single_wid-2;

                  $('#table2').css('width',single_wid+'%');
                   $('#table1').css('width',wid+'%');
                }
                else{
                 $('#table2').css('width','100%');
                   $('#table1').css('width','100%');
                }
                         
                          $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');
                    }else{
                      //modify//

                      $('.ans-pag-link[data-id="2"]').addClass('disabled'); 

                        act.addClass('active1');
                        $('#answer-area').removeClass('col-md-12');
            $('#answer-area').addClass(' offset-md-2 col-md-8');
                    var single_wid2 = $(act).attr('data-width');
                     if(single_wid2!=0){
                    $(act).css('width',single_wid2+'%');
                  }




                    }
                  }

                


                         $(".preview").each(function(){
                          $(this).removeClass('active');
                         });
                           
                         $(this).parent().addClass('active');


                      } 


                    
                       

        // });
             });




                function show_image_answer(){



                          $('#answer-area').removeClass('col-md-6');
                           $('#answer-area').addClass(' col-md-12 full');
                          $('#answer-area').removeClass('d-none');
                          $('#question-area').addClass('d-none');


                        if($('#question-area').hasClass('col-md-6')){


                           $(".show_image_answer").removeClass("active");
                           $("#question-area").removeClass("col-md-6");
                           $("#question-area").addClass("col-md-12 full_q");


                         }


                  var actv=$(".tab-format.active").data("id");
            $(this).toggleClass('active');

             console.log(actv);



             //var actv=$(".problme-tab.active").data("id");
             if($('#table_img'+actv).html()){

              

               if($('#question-area').hasClass('col-md-12')){
               
                //$('.show_answer').trigger('click');

                  

                // $('#table_img'+actv).toggle();
                     // $(".problme-tab.active1").toggle();
                     // $(".problme-tab.active2").toggle();

                     // //$(".tab-format.active").toggle();
                     // $(".tab-format.active2").toggle();
           

// if($('#answer-area').find('.tab.active').is(':visible')){

//   }

                 //$(".problme-tab.active2").toggle();

                 // $('.tab-format[data-tableid="'+id6+'"]').toggle();

                                 //  $('.ans_tab[data-tableid="'+id6+'"]').toggle();





// 2 div in problem format//

// if($('#answer-area').find('.tab.active').is(':visible')){
                if($('#answer-area').find('.tab.active').is(':visible')){


                var act = $(".problme-tab.active");


                if($('#answer-area').hasClass('offset-md-2 col-md-8')){

                //alert('hggggh');


                act.css("display","block");
                act.addClass('active1');
                // $('#answer-area').removeClass('col-md-12');

                var single_wid2 = $(act).attr('data-width');
                if(single_wid2!=0){

                $(act).css('width',single_wid2+'%');
                }




                if($("#table_img1").length != 0) {

                // console.log("Fdfd");
                //$(act).css("display","none");
                var single_wid = $('#table_img1').attr('data-width');
                var single_wid2 = $('#table_img0').attr('data-width');
                // $('#table2').css("width","48%");
                $('#table_img1').addClass('active2');
                $('#table-ft1').addClass('active2');

                $('#table_img1').css("display","block");
                $('#table-ft1').css("display","block");
                $('#table_img1').css("float","right");



                $('#table_img0').addClass('active1');
                $('#table_img0').css("float","left");
                // $('#table1').css("width","48%");
                $('#table_img0').css("display","block");

                $('#table_img1').css('width','48%');
                $('#table_img0').css('width','48%');

                $('#answer-area').removeClass(' offset-md-2 col-md-8');
                $('#answer-area').removeClass('col-md-12');
                // $('#answer-area').addClass(' col-md-12');



                if(single_wid!=0 && single_wid2!=0){
                var single_wid1=single_wid-2;
                var single_width2=single_wid2-2;
                $('#table_img1').css('width',single_wid1+'%');
                $('#table_img0').css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){

                var wid=100-single_wid2;
                single_wid2=single_wid2-2;
                $('#table_img1').css('width',wid+'%');
                $('#table_img0').css('width',single_wid2+'%');
                }
                else if(single_wid!=0 && single_wid2==0){
                var wid=100-single_wid;
                single_wid=single_wid-2;

                $('#table_img1').css('width',single_wid+'%');
                $('#table_img0').css('width',wid+'%');
                }
                else{
                $('#table_img1').css('width','48%');
                $('#table_img0').css('width','48%');
                }

                $('#answer-area').addClass('col-md-12');


                // $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');
                }else{

                //modify//
                $('.pr-pag-link[data-id="2"]').addClass('disabled');
                act.addClass('active1');
                $('#answer-area').removeClass('col-md-12');
                // $('#answer-area').removeClass('col-md-12');
                //$('#answer-area').addClass(' offset-md-2 col-md-8');
                var single_wid2 = $(act).attr('data-width');
                if(single_wid2!=0){
                $(act).css('width',single_wid2+'%');
                }




                }







                }
                else{



                if($("#table_img1").length != 0) {



                // console.log("Fdfd");
                //$(act).css("display","none");
                var single_wid = $('#table_img1').attr('data-width');
                var single_wid2 = $('#table_img0').attr('data-width');
                // $('#table2').css("width","48%");
                $('#table_img1').addClass('active2');
                $('#table-ft1').addClass('active2');

                $('#table_img1').css("display","block");
                $('#table-ft1').css("display","block");
                $('#table_img1').css("float","right");



                $('#table_img0').addClass('active1');
                $('#table_img0').css("float","left");
                // $('#table1').css("width","48%");
                $('#table_img0').css("display","block");

                $('#table_img1').css('width','48%');
                $('#table_img0').css('width','48%');



                if(single_wid!=0 && single_wid2!=0){
                var single_wid1=single_wid-2;
                var single_width2=single_wid2-2;
                $('#table_img1').css('width',single_wid1+'%');
                $('#table_img0').css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){

                var wid=100-single_wid2;
                single_wid2=single_wid2-2;
                $('#table_img1').css('width',wid+'%');
                $('#table_img0').css('width',single_wid2+'%');
                }
                else if(single_wid!=0 && single_wid2==0){
                var wid=100-single_wid;
                single_wid=single_wid-2;

                $('#table_img1').css('width',single_wid+'%');
                $('#table_img0').css('width',wid+'%');
                }
                else{
                $('#table_img1').css('width','48%');
                $('#table_img0').css('width','48%');
                }

                // $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');
                //modified 24-08//
             $('#answer-area').removeClass(' offset-md-2 col-md-8');
                }else{

                               // alert('aaaa');

                //modify//
                $('.pr-pag-link[data-id="2"]').addClass('disabled');


                act.addClass('active1');
                                $('#table_img0').css("display","block");
                                $('#table_img0').show();


                               


                // $('#answer-area').removeClass('col-md-12');
                //$('#answer-area').addClass(' offset-md-2 col-md-8');
                var single_wid2 = $(act).attr('data-width');
                if(single_wid2!=0){
                $(act).css('width',single_wid2+'%');
                }




                }
                }
                }else{

                    if($('#answer-area').hasClass('offset-md-2 col-md-8')){

                         $("#answer-area").toggleClass("col-md-12 full");
                         $("#answer-area").toggleClass("offset-md-2 col-md-8 full"); 


                      }

                  }



                        $('#answer-area').find('.transaction-pool').toggle();

                                      // $('#answer-area').find('.trans_question').toggle();
                                  $('.trans_question').hide();


                               // $('#answer-area').find('.tab.active1').toggle();
                               // $('#answer-area').find('.tab.active2').toggle();
                               $('.ans-pag-link').toggleClass('disabled'); 
                      $('.pr-pag-link').toggleClass('disabled'); 







          

                                                                //$('.question-area').toggle();

                                


           
           // $('.q_area').toggle();
           
           // $('.img_hidden').html($('#table_img1').html());

           // console.log($('.img_hidden').html());
           //$('.img_hidden').show();
             // $('#table_img'+actv).css('display','none');
              // $('.photo_thumb'+actv).addClass('photo-thumb');
               
            //$('.tab.active').toggle();

             }else{
             

            // $('#answer-area').removeClass('col-md-6');
            //  $('#answer-area').addClass('offset-md-2 col-md-8 full');
// if($('#answer-area').hasClass('col-md-12 full')){
//  // $("#question-area").toggleClass("col-md-6"); 
// }else{
                 
// }

$("#answer-area").toggleClass("col-md-6"); 
               $("#answer-area").toggleClass("col-md-12 full");


                       // $("#answer-area").toggleClass("offset-md-2 col-md-8 full");  



             // $('#table_img'+actv).toggle();
              $(".problme-tab.active1").toggle();
              $(".problme-tab.active2").toggle();

              //$(".tab-format.active").toggle();
              $(".tab-format.active2").toggle();



                          if($('#answer-area').find('.tab.active').is(':visible')){

                          // alert('kkj');


                          var act = $(".problme-tab.active");


                          //   if($('#answer-area').hasClass('offset-md-2 col-md-8')){
                          //      act.css("display","block");
                          //      act.addClass('active1');
                          //     // $('#answer-area').removeClass('col-md-12');

                          // var single_wid2 = $(act).attr('data-width');
                          // if(single_wid2!=0){
                          //    $(act).css('width',single_wid2+'%');
                          // }





                          // }else{
                          //console.log(act);

                          if($("#table_img1").length != 0) {

                          console.log("Fdfd");
                          $(act).css("display","none");
                          var single_wid = $('#table_img1').attr('data-width');
                          var single_wid2 = $('#table_img0').attr('data-width');
                          // $('#table2').css("width","48%");
                          $('#table_img1').addClass('active2');
                          $('#table-ft1').addClass('active2');

                          $('#table_img1').css("display","block");
                          $('#table-ft1').css("display","block");
                          $('#table_img1').css("float","right");



                          $('#table_img0').addClass('active1');
                          $('#table_img0').css("float","left");
                          // $('#table1').css("width","48%");
                          $('#table_img0').css("display","block");

                          $('#table_img1').css('width','48%');
                          $('#table_img0').css('width','48%');



                          if(single_wid!=0 && single_wid2!=0){
                          var single_wid1=single_wid-2;
                          var single_width2=single_wid2-2;
                          $('#table_img1').css('width',single_wid1+'%');
                          $('#table_img0').css('width',single_width2+'%');
                          }
                          else if(single_wid==0 && single_wid2!=0){

                          var wid=100-single_wid2;
                          single_wid2=single_wid2-2;
                          $('#table_img1').css('width',wid+'%');
                          $('#table_img0').css('width',single_wid2+'%');
                          }
                          else if(single_wid!=0 && single_wid2==0){
                          var wid=100-single_wid;
                          single_wid=single_wid-2;

                          $('#table_img1').css('width',single_wid+'%');
                          $('#table_img0').css('width',wid+'%');
                          }
                          else{
                          $('#table_img1').css('width','48%');
                          $('#table_img0').css('width','48%');
                          }

                          // $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');
                          // $('#answer-area').removeClass(' offset-md-2 col-md-8');
                          }else{
                          //modify//
                          $('.pr-pag-link[data-id="2"]').addClass('disabled');
                          act.addClass('active1');
                          ////// $('#answer-area').removeClass('col-md-12');
                          //$('#answer-area').addClass(' offset-md-2 col-md-8');
                          var single_wid2 = $(act).attr('data-width');
                          if(single_wid2!=0){
                          $(act).css('width',single_wid2+'%');
                          }
                          $('#table_img0').css("display","block");
                          //$('#table_img0').css("display","block");


                          }
                          //}
                          }
                  
                $('#answer-area').find('.transaction-pool').toggle();
                 $('.trans_question').hide();

                $('.question-area').toggle();

                               // $('#answer-area').find('.trans_question').toggle();

 //$('#answer-area').find('.tab.active').addClass('active1');
                               // $('#answer-area').find('.tab.active').toggle();
                               //
                               // $('#answer-area').find('.tab.active1').toggle();
                      // $('#answer-area').find('.tab.active2').toggle();





              }
            }

                         
            // return false;


            if($('#table_img0').is(':visible')){

             // if($('#table_img0').css('display') == 'block'){
                                                                 // alert('hide-pr');

                                 }else{

             // if($('#table_img0').css('display') == 'block'){
                                                                 // alert('hide1-pr');

                                 } 



                } 

             $('.show_image_answer').click(function (e) {

   // e.stopPropagation();
    				e.preventDefault();
  					e.stopImmediatePropagation();





                           $('#answer-area').removeClass('d-none');
                          $('#question-area').addClass('d-none');
           
             			var actv=$(".tab-format.active").data("id");

                              if($('.show_question_new').parent().hasClass('active')){

                              }else{
                                            $(this).toggleClass('active');

                              }


             console.log(actv);



             //var actv=$(".problme-tab.active").data("id");
             if($('#table_img'+actv).html()){

              

               if($('#question-area').hasClass('col-md-12')){
               
                //$('.show_answer').trigger('click');

                  

                // $('#table_img'+actv).toggle();
                     $(".problme-tab.active1").toggle();
                     $(".problme-tab.active2").toggle();

                     //$(".tab-format.active").toggle();
                     $(".tab-format.active2").toggle();
           

// if($('#answer-area').find('.tab.active').is(':visible')){

//   }

                 //$(".problme-tab.active2").toggle();

                 // $('.tab-format[data-tableid="'+id6+'"]').toggle();

                                 //  $('.ans_tab[data-tableid="'+id6+'"]').toggle();





// 2 div in problem format//

// if($('#answer-area').find('.tab.active').is(':visible')){
                if($('#answer-area').find('.tab.active').is(':visible')){


                var act = $(".problme-tab.active");


                if($('#answer-area').hasClass('offset-md-2 col-md-8')){




// alert('jhghjgj');


                act.css("display","block");
                act.addClass('active1');
                // $('#answer-area').removeClass('col-md-12');

                var single_wid2 = $(act).attr('data-width');
                if(single_wid2!=0){

                $(act).css('width',single_wid2+'%');
                }




                if($("#table_img1").length != 0) {


                  $('.pr-pag-link[data-id="2"]').removeClass('disabled');
                  $('.pr-pag-link[data-id="1"]').removeClass('disabled');
                  $('.pr-pag-link').removeClass('disabled');


                // console.log("Fdfd");
                  if($('.show_question_new').parent().hasClass('active')){

                    // alert('kjlkhhl');


                      $(act).css("display","block");
                                      $('#table_img1').css("display","block");
                                                     //alert('mmmmmmmm');



					}else{

            // alert('ghgh');


                      $(act).css("display","none");
                                      $('#table_img1').css("display","none");
                                                    // alert('kjjjjjj');



                     }

                var single_wid = $('#table_img1').attr('data-width');
                var single_wid2 = $('#table_img0').attr('data-width');
                // $('#table2').css("width","48%");
                $('#table_img1').addClass('active2');
                $('#table-ft1').addClass('active2');

                $('#table_img1').css("display","block");
                $('#table-ft1').css("display","block");
                $('#table_img1').css("float","left");



                $('#table_img0').addClass('active1');
                $('#table_img0').css("float","left");
                // $('#table1').css("width","48%");
                $('#table_img0').css("display","block");

                 $('#table_img1').css('width','100%');
                 $('#table_img0').css('width','100%');

                $('#answer-area').removeClass(' offset-md-2 col-md-8');
                $('#answer-area').removeClass('col-md-12');
                // $('#answer-area').addClass(' col-md-12');



                if(single_wid!=0 && single_wid2!=0){
                var single_wid1=single_wid-2;
                var single_width2=single_wid2-2;
                $('#table_img1').css('width',single_wid1+'%');
                $('#table_img0').css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){

                var wid=100-single_wid2;
                single_wid2=single_wid2-2;
                $('#table_img1').css('width',wid+'%');
                $('#table_img0').css('width',single_wid2+'%');
                }
                else if(single_wid!=0 && single_wid2==0){
                var wid=100-single_wid;
                single_wid=single_wid-2;

                $('#table_img1').css('width',single_wid+'%');
                $('#table_img0').css('width',wid+'%');
                }
                else{
                $('#table_img1').css('width','100%');
                $('#table_img0').css('width','100%');
                }

                $('#answer-area').addClass('offset-md-2 col-md-8');

                if($('#answer-area').find('.problme-tab.active').is(':visible')){
						// alert('hgghghgh');
                	}

                // $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');
                }else{


                // alert($('hhhhhhhhh'));

     //            if($('.show_question_new').parent().hasClass('active')){

     //                  $(act).css("display","block");
     //                                  $('#table_img1').css("display","block");


					// }else{

     //                  $(act).css("display","none");
     //                                  $('#table_img1').css("display","none");


     //                 }

                                


                //modify//
                $('.pr-pag-link[data-id="2"]').addClass('disabled');
                $('.pr-pag-link[data-id="1"]').removeClass('disabled');


                act.addClass('active1');

                if($('.pr-pag-link[data-id="2"]').hasClass('disabled')){
                                        // alert("cjhhjvhjc");

                                    }

                        if($('.show_question_new').parent().hasClass('active')){
                            $(".problme-tab.active1").toggle();

                                 }else{
               // $(act).css("display","none");

                                 }
                $('#answer-area').removeClass('col-md-12');
                // $('#answer-area').removeClass('col-md-12');
                //$('#answer-area').addClass(' offset-md-2 col-md-8');
                var single_wid2 = $(act).attr('data-width');
                if(single_wid2!=0){
                $(act).css('width',single_wid2+'%');
                }




                }








                }
                else{
                  ///////////
                // alert('gggggggggg');



                if($("#table_img1").length != 0) {

                	               // alert('dfffddf');


                  $('.pr-pag-link').removeClass('disabled');

                  $('.pr-pag-link[data-id="2"]').removeClass('disabled');
                   $('.pr-pag-link[data-id="1"]').removeClass('disabled');

                // console.log("Fdfd");
                if($('.show_question_new').parent().hasClass('active')){

                $(act).css("display","block");

                                 }else{
                $(act).css("display","none");

                                 }
                //$(act).css("display","none");
                var single_wid = $('#table_img1').attr('data-width');
                var single_wid2 = $('#table_img0').attr('data-width');
                // $('#table2').css("width","48%");
                $('#table_img1').addClass('active2');
                $('#table-ft1').addClass('active2');

                $('#table_img1').css("display","block");
                $('#table-ft1').css("display","block");
                $('#table_img1').css("float","left");



                $('#table_img0').addClass('active1');
                $('#table_img0').css("float","left");
                // $('#table1').css("width","48%");
                $('#table_img0').css("display","block");

                $('#table_img1').css('width','100%');
                $('#table_img0').css('width','100%');



                if(single_wid!=0 && single_wid2!=0){
                var single_wid1=single_wid-2;
                var single_width2=single_wid2-2;
                $('#table_img1').css('width',single_wid1+'%');
                $('#table_img0').css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){

                var wid=100-single_wid2;
                single_wid2=single_wid2-2;
                $('#table_img1').css('width',wid+'%');
                $('#table_img0').css('width',single_wid2+'%');
                }
                else if(single_wid!=0 && single_wid2==0){
                var wid=100-single_wid;
                single_wid=single_wid-2;

                $('#table_img1').css('width',single_wid+'%');
                $('#table_img0').css('width',wid+'%');
                }
                else{
                $('#table_img1').css('width','100%');
                $('#table_img0').css('width','100%');
                }

                // $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');
                //modified 24-08//
            // $('#answer-area').removeClass(' offset-md-2 col-md-8');
                }else{

                               // alert('aaaa');

                //modify//
                $('.pr-pag-link[data-id="2"]').addClass('disabled');
                 $('.pr-pag-link[data-id="1"]').removeClass('disabled');


                act.addClass('active1');
                                         
                                           if($('.show_question_new').parent().hasClass('active')){
                $(".problme-tab.active1").toggle();


                                 }else{
                // $(act).css("display","none");

                                 }          // $(".problme-tab.active1").toggle();



                               


                // $('#answer-area').removeClass('col-md-12');
                $('#answer-area').addClass(' offset-md-2 col-md-8');
                var single_wid2 = $(act).attr('data-width');
                if(single_wid2!=0){
                $(act).css('width',single_wid2+'%');
                }




                }
                }
                }else{

                       // alert('rrggg');


                    if($('#answer-area').hasClass('offset-md-2 col-md-8')){

                        // $("#answer-area").toggleClass("col-md-12 full");
                         //$("#answer-area").toggleClass("offset-md-2 col-md-8 full"); 


                      }

                  }




                        $('#answer-area').find('.transaction-pool').toggle();

                                      // $('#answer-area').find('.trans_question').toggle();
                                  $('.trans_question').hide();



                 if($('.show_question_new').parent().hasClass('active')){

                     // alert('2nd');
                     $('#answer-area').find('.tab.active1').hide();
                    $('#answer-area').find('.tab.active2').hide();


                        $(".problme-tab.active1").show();
                       $(".problme-tab.active2").show();
                                              $(".tab-format.active2").show();



                                                            //  $('#answer-area').find('.tab.active').hide();




                  }else{
                                         // alert('not 2nd');

                              $('#answer-area').find('.tab.active1').toggle();
                               $('#answer-area').find('.tab.active2').toggle();
                               //$('#answer-area').find('.tab.active').toggle();
                    }


                               

                               $('.ans-pag-link').toggleClass('disabled'); 
                      // $('.pr-pag-link').toggleClass('disabled'); 







          

                                                                //$('.question-area').toggle();

                                


           
           // $('.q_area').toggle();
           
           // $('.img_hidden').html($('#table_img1').html());

           // console.log($('.img_hidden').html());
           //$('.img_hidden').show();
             // $('#table_img'+actv).css('display','none');
              // $('.photo_thumb'+actv).addClass('photo-thumb');
               
            //$('.tab.active').toggle();

             }else{
             
                	 // alert('gffffffffff');

            // $('#answer-area').removeClass('col-md-6');
            //  $('#answer-area').addClass('offset-md-2 col-md-8 full');
// if($('#answer-area').hasClass('col-md-12 full')){
//  // $("#question-area").toggleClass("col-md-6"); 
// }else{
                 
// }

$("#answer-area").toggleClass("col-md-6"); 
               $("#answer-area").toggleClass("offset-md-2 col-md-8 full");



                                     



                       // $("#answer-area").toggleClass("offset-md-2 col-md-8 full");  



             // $('#table_img'+actv).toggle();
              $(".problme-tab.active1").toggle();
              $(".problme-tab.active2").toggle();

              //$(".tab-format.active").toggle();
              $(".tab-format.active2").toggle();



                          if($('#answer-area').find('.tab.active').is(':visible')){

                          // alert('kkj');


                          var act = $(".problme-tab.active");


                          //   if($('#answer-area').hasClass('offset-md-2 col-md-8')){
                          //      act.css("display","block");
                          //      act.addClass('active1');
                          //     // $('#answer-area').removeClass('col-md-12');

                          // var single_wid2 = $(act).attr('data-width');
                          // if(single_wid2!=0){
                          //    $(act).css('width',single_wid2+'%');
                          // }





                          // }else{
                          //console.log(act);

                          if($("#table_img1").length != 0) {

                          console.log("Fdfd");
                          $(act).css("display","none");
                          var single_wid = $('#table_img1').attr('data-width');
                          var single_wid2 = $('#table_img0').attr('data-width');
                          // $('#table2').css("width","48%");
                          $('#table_img1').addClass('active2');
                          $('#table-ft1').addClass('active2');

                          $('#table_img1').css("display","block");
                          $('#table-ft1').css("display","block");
                          $('#table_img1').css("float","left");



                          $('#table_img0').addClass('active1');
                          $('#table_img0').css("float","left");
                          // $('#table1').css("width","48%");
                          $('#table_img0').css("display","block");

                          $('#table_img1').css('width','100%');
                          $('#table_img0').css('width','100%');



                          if(single_wid!=0 && single_wid2!=0){
                          var single_wid1=single_wid-2;
                          var single_width2=single_wid2-2;
                          $('#table_img1').css('width',single_wid1+'%');
                          $('#table_img0').css('width',single_width2+'%');
                          }
                          else if(single_wid==0 && single_wid2!=0){

                          var wid=100-single_wid2;
                          single_wid2=single_wid2-2;
                          $('#table_img1').css('width',wid+'%');
                          $('#table_img0').css('width',single_wid2+'%');
                          }
                          else if(single_wid!=0 && single_wid2==0){
                          var wid=100-single_wid;
                          single_wid=single_wid-2;

                          $('#table_img1').css('width',single_wid+'%');
                          $('#table_img0').css('width',wid+'%');
                          }
                          else{
                          $('#table_img1').css('width','100%');
                          $('#table_img0').css('width','100%');
                          }

                          // $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');
                          // $('#answer-area').removeClass(' offset-md-2 col-md-8');
                          }else{
                          //modify//
                          $('.pr-pag-link[data-id="2"]').addClass('disabled');
                          act.addClass('active1');
                          ////// $('#answer-area').removeClass('col-md-12');
                          //$('#answer-area').addClass(' offset-md-2 col-md-8');
                          var single_wid2 = $(act).attr('data-width');
                          if(single_wid2!=0){
                          $(act).css('width',single_wid2+'%');
                          }
                          $('#table_img0').css("display","block");
                          //$('#table_img0').css("display","block");


                          }
                          //}
                          }
                  
                $('#answer-area').find('.transaction-pool').toggle();
                 $('.trans_question').hide();

                $('.question-area').toggle();


                               // $('#answer-area').find('.trans_question').toggle();

 //$('#answer-area').find('.tab.active').addClass('active1');




 




                      $('#answer-area').find('.tab.active1').toggle();
                          if($('#answer-area').find('.tab.active1').is(':visible')){
                         $('#answer-area').find('.tab.active2').toggle();

                          }else{
                          	                         $('#answer-area').find('.tab.active2').hide();


                              }

                                                   if($("#table1").hasClass('active1')) {

                                                   }else{
                          	                         $('#answer-area').find('.tab.active').hide();


                              						}



                               //$('#answer-area').find('.tab.active').toggle();


  if($('.show_question_new').parent().hasClass('active')){




                   // alert('rrr');

                               //    $('#answer-area').find('.tab.active1').hide();
                               // $('#answer-area').find('.tab.active2').hide();

                    // alert('jjkkk');



                  }else{
                              //$('#answer-area').find('.tab.active1').toggle();
                              // $('#answer-area').find('.tab.active2').toggle();
                               //$('#answer-area').find('.tab.active').toggle();
                    }


                     if($("#table2").length != 0) {

                                       	if ($('#table2').hasClass('active1')||$('#table2').hasClass('active2')){

                                           }else{
                                            $('#table2').addClass('active2');
                                           }


                                           if ($('#table1').hasClass('active1')||$('#table1').hasClass('active2')){

                                           }else{
                                            $('#table1').addClass('active1');
                                           }


                                            }


                     

                               // $('#answer-area').find('.tab.active').toggle();
                               //
                               // $('#answer-area').find('.tab.active1').toggle();
                       //$('#answer-area').find('.tab.active2').toggle();





              }
            }

                         
            // return false;


            if($('#table_img0').is(':visible')){

             // if($('#table_img0').css('display') == 'block'){
                                                                //  alert('hide-pr');

                                 }else{

             // if($('#table_img0').css('display') == 'block'){
                                                                //  alert('hide1-pr');

                                 } 

                                     return false;

           
         //  $('.photo-thumb'+actv+' a').trigger('click');
          
        });





                $('.pag_link_pr').click(function(){
                  //modify//

                  if ($(this).hasClass('disabled')){
                     return false;
                  }
                    var id=parseInt($(this).attr('data-id'));

                    $('.pag_link_pr').parent().removeClass('active');
                      $(this).parent().addClass('active');
                      $('.pag_link_pr').removeClass('active');
                      $(this).addClass('active');
                    if(id==1){
                     // alert("kkll");


 $('.pr-pag-link[data-id="1"]').removeClass('disabled');
                     $('.shift_right_pr').addClass('disabled');
                        if($('#answer-area').hasClass('full')){
                          


//modify//
                         $('#answer-area').removeClass('col-md-12');
                         $('#answer-area').addClass(' offset-md-2 col-md-8');

                          
                           var act = $(".problme-tab.active1");
                          var id_act = parseInt(act.attr('data-id'));
                          // $(".quest_table").each(function(){
                          //      $(this).css('width','100%');
                          //  });


                             $(".problme-tab").each(function(){

                                            if($(this).hasClass('active1')){
                                                
                                              $(this).show();
                                            }else{
                                               // $(this).removeClass('active2').hide(); 
                                               //  $(this).removeClass('active').hide();
                                            }

                                                
                                                
                                                $(this).css('width','100%');
                                                 $(this).css('float','left');
                    // $(this).css('float','left');
                    
                              });

                        }

                      
                    }else{
                     $('.shift_right_pr').removeClass('disabled');


                      if($('#answer-area').hasClass('full')){

                          $('#answer-area').addClass('col-md-12');
                          $('#answer-area').removeClass(' offset-md-2 col-md-8');
                         //  var act = $(".table-box.active1");
                          //var id_act = parseInt(act.attr('data-id'));
                          // $(".quest_table").each(function(){
                          //      $(this).css('width','100%');
                          //  });

                            var act = $(".problme-tab.active1");
                            var id = parseInt(act.attr('data-id'))+1;

                            var tab1 = '#table_img'+id;


                         //   var act1 = $(".ans_tab.active2");
                     //console.log(act);

                    // if(act1.length != 0) {
                       if($(tab1).html()){


                        var single_wid = act.attr('data-width');
                            var single_wid2 = $(tab1).attr('data-width');
                     
                            //$(act).css("display","none");
                         $(tab1).css("width","48%");
                         $(tab1).addClass('active2');
                         $(tab1).css("display","block");
                         $(tab1).css("float","right");
                         

                          
                          //$('#table1').addClass('active1');
                          act.css("width","48%");
                          act.css("display","block");
                         
                          // $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');
                    }
                    else{

                      $('#table_img0').addClass('active2');
                          $('#table_img0').css("width","48%");
                          $('#table_img0').css("display","block");
                          $('#table_img0').css("float","right");

                           act.css("width","48%");
                          act.css("display","block");

                    }



                        }




                    }


                // var act = $(".tab.active");
                // // var last = parseInt($('#tab-last').val());
                // var id_act = parseInt(act.attr('data-id'));


                // if(id>id_act){
                   
                // var e = jQuery.Event("keydown");
                //       e.keyCode = 39; // m code value
                   
                //       $(this).trigger(e);

                // }else{

                  
                //   // $( ".shift_left" ).trigger( "click" );
                //   var e = jQuery.Event("keydown");
                //       e.keyCode = 37; // m code value
                   
                //       $(this).trigger(e);
                // }
                

                });



          $('.show_help_image').click(function () {
          // $('.help_img').toggle(); 
          //$('.answer-area').toggle(); 
         // console.log($('.trans_help_img').html());

          if($('.help_img').attr('src')!=''){
          // $('#table_img'+actv).toggle();
           
          $('.q_area').toggle();
           $('.img_hidden').html($('.trans_help_img').html());
           $('.img_hidden').show();
          $('.img_hidden').find($('.help_img')).css('display','block');
              // $('.photo_thumb'+actv).addClass('photo-thumb');
               
            //$('.tab.active').toggle(); 
            }

          // $('.photo-thumb-trans a').trigger('click');

        
            // var actv=$(".tab.active").data("id");
            // if( $('#table_img'+actv).html()){
            //    $('#table_img'+actv).toggle();
            // $('.tab.active').toggle(); 
            // }
            
           
          
        });


          
        var elem = document.documentElement;
 

      $('.show_full_screen').click(function () {
         toggleFull();
            //  if (elem.requestFullscreen) {
            //   elem.requestFullscreen();
            // } else if (elem.mozRequestFullScreen) { /* Firefox */
            //   elem.mozRequestFullScreen();
            // } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
            //   elem.webkitRequestFullscreen();
            // } else if (elem.msRequestFullscreen) { /* IE/Edge */
            //   elem.msRequestFullscreen();
            // }  


            // $(this).removeClass('show_full_screen');
            // $(this).addClass('show_exit_screen');
            // $(this).value='Exit';
            


        });

//        $('.show_exit_screen').click(function () {
// alert("gfgf");
//         if (document.exitFullscreen) {
//           document.exitFullscreen();
//         } else if (document.mozCancelFullScreen) {
//           document.mozCancelFullScreen();
//         } else if (document.webkitExitFullscreen) {
//           document.webkitExitFullscreen();
//         } else if (document.msExitFullscreen) {
//           document.msExitFullscreen();
//         }

//         $(this).removeClass('show_exit_screen');
//           $(this).addClass('show_full_screen');
//            $(this).value='Full Screen';


//         });


        

        

                    //  $('.shift_vertical').click(function () {

                      
                    //     if($('#answer-area').hasClass('full')){

                    //       $('#answer-area').removeClass('col-md-12');
                    //       $('#answer-area').addClass(' offset-md-2 col-md-8');

                          
                    //        var act = $(".table-box.active1");
                    //       var id_act = parseInt(act.attr('data-id'));
                    //       // $(".quest_table").each(function(){
                    //       //      $(this).css('width','100%');
                    //       //  });


                    //          $(".ans_tab").each(function(){

                    //                         if($(this).hasClass('active1')){
                                                
                    //                           $(this).show();
                    //                         }else{
                    //                            //$(this).removeClass('active2').hide(); 
                    //                             //$(this).removeClass('active').hide();
                    //                         }

                                                
                                                
                    //                             $(this).css('width','100%');
                    //                              $(this).css('float','left');
                    // // $(this).css('float','left');
                    
                    //           });

                    //     }


                    //    });

             $('.full_answer').click(function () {



                                   $(".ans_tr").find('.disc1').each(function(){

                         $(this).toggleClass('load-full-answer');


                              // $(this).css('display','block');

                                                  });








              });


        $('.show_full').click(function () {

                  if($('#answer-area').hasClass('full')){
                     $(".ans_tab").each(function(){

                if($(this).hasClass('active1')){
                   
                    
                  $(this).removeClass('active1').show();
                }else if($(this).hasClass('active')){
                 $(this).show();

                   }else{
                   $(this).removeClass('active2').hide(); 
                   // $(this).removeClass('active').hide();
                }

                    
                    
                    $(this).css('width','100%');
                     $(this).css('float','left');
                    // $(this).css('float','left');
                    
                });
                  }


                   if($('#question-area').hasClass('full_q')){
                   
                     $(".quest_table").each(function(){
                        $(this).css('width','100%');
                    });

                     

                      $(".transations").each(function(){
                        $(this).css('float','left');
                        $(this).css('width','100%');
                        $(this).css('display','none');
                    });
                      $( ".transations" ).css( "display", "block" );

                   }



                  $(".problme-tab.active1").hide();
                 $(".problme-tab.active2").hide();
                $('.show_image_answer').removeClass('active');

                //     $(".problme-tab.active1").hide();
                //  $(".problme-tab.active2").hide();
                // $('.show_image_answer').removeClass('active');

              

            $('#answer-area').removeClass(' col-md-12');
             $('#answer-area').removeClass(' offset-md-2 col-md-8');
            $('#answer-area').addClass('col-md-6');
            $('#answer-area').removeClass('d-none');
            $('#answer-area').removeClass('full');
            $('#question-area').removeClass('col-md-12');
            $('#question-area').addClass('col-md-6');
            $('#question-area').removeClass('d-none');
            $('#question-area').show();
            $('#question-area').removeClass('full_q');
             $('.question-div').css('padding-left','20px');
            $('.question-div').css('padding-right','20px');
        $('.q_area').removeClass('align-items-center');




                  var htm = $('#answer-area').find('.trans_question').html() ? $('#answer-area').find('.trans_question').html() : '';
                  var tr_html=$('#answer-area').find('.trans_tray').html() ? $('#answer-area').find('.trans_tray').html() : '';
                 //console.log($('#answer-area').find('.trans_tray').html());

                  if($.trim($('#answer-area').find('.trans_question').html())!=''){
                   // $('#answer-area').find('.trans_question').css('display','block');
                   
                     // $('#answer-area').find('.help-text').show();
                      $('#answer-area').find('.transaction-pool').css('display','block');

                  }else{
                    //$('#answer-area').find('.trans_question').css('display','block');
                     $('#answer-area').find('.transaction-pool').css('display','block');
                  }
             





        // $('#answer-area').find('.transaction-pool').show();
        // $('#answer-area').find('.trans_question').show();



         $(".preview").each(function(){
          $(this).removeClass('active');
         });
           
         $(this).parent().addClass('active');


        });
        $('.refresh_screen').click(function () {
            refresh_screen();
        });



        $(document).on('click','.sub_table',function(){

        

         var e = $.Event( "keydown", { keyCode: 13 } );
            $('#input-field').trigger(e);
           var htm = $(this).find('li').html() ? $(this).find('li').html() : '';
           console.log(htm);
           // var htm=$(this).find('li').html();
            var width = $(this).width();
            var height = $(this).height();

            if($(this).find('li').hasClass('u_line')){
                 var input = '<input type="text" id="input-field"  class="answer-colum-highlight u_line number" style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false">';

            }else{
                  var input = '<input type="text" id="input-field"  class="answer-colum-highlight number" style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false">';
            }


           
            
            $(this).html(input);
            $(this).removeClass('empty');
            $('#input-field').focus();

       });


        $(document).on('click','.sub_table_fixed',function(){

        

         var e = $.Event( "keydown", { keyCode: 13 } );
            $('#input-field').trigger(e);
           var htm = $(this).find('li').html() ? $(this).find('li').html() : '';
           console.log(htm);
           // var htm=$(this).find('li').html();
            var width = $(this).width();
            var height = $(this).height();

            if($(this).find('li').hasClass('u_line')){

               if($(this).find('li').hasClass('td_line')){
                var input = '<input type="text" id="input-field"  class="answer-colum-highlight u_line td_line" style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false">';
               }else{
                var input = '<input type="text" id="input-field"  class="answer-colum-highlight u_line " style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false">';
               }
                 

            }else{
               if($(this).find('li').hasClass('td_line')){
                var input = '<input type="text" id="input-field"  class="answer-colum-highlight td_line" style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false">';
              }else{

                var input = '<input type="text" id="input-field"  class="answer-colum-highlight " style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false">';

              }
                  
            }


           
            
            $(this).html(input);
            $(this).removeClass('empty_fixed');
            $('#input-field').focus();

       });

        $(document).on('click','.row_data tr>td.empty',function(){
            var e = $.Event( "keydown", { keyCode: 13 } );
            $('#input-field').trigger(e);
           var htm = $(this).find('li').html() ? $(this).find('li').html() : '';



           // var htm=$(this).find('li').html();


            var width = $(this).width();
            var height = $(this).height();

        var sub_htm = $(this).find('table').html() ? $(this).find('table').html() : '';

            
            if(sub_htm!=''){

             

               
                 var elem=$(this).find('.sub_table');

                 //onsole.log(elem);


                   var width1 = elem.width();
                   var height1 = elem.height();
         
             var htm1 = elem.find('li').html() ? elem.find('li').html() : '';

             
                 var input_new = '<input type="text" id="input-field"  class="answer-colum-highlight number " style="height:'+height1+';width:'+width1+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm1+'" spellcheck="false">';
            
               

          
            // console.log(input_new);
            elem.html(input_new);

  


          }
      else{

        var td_elem=$(this).find('li');
        if(td_elem.hasClass('td_line')){
          var class1="td_line";
        }else{
          var class1="";
        }


         if($(this).find('li').hasClass('text-right')){
              var cls='number';
             }else{
               var cls='';
             }
            // alert(cls);
       
       if(td_elem.hasClass('u_line')){
            var input = '<input type="text" id="input-field"  class="answer-colum-highlight  u_line'+cls+' '+class1+'" style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false" autocomplete="off">';
            
           }else{
            var input = '<input type="text" id="input-field"  class="answer-colum-highlight '+cls+' '+class1+'" style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false" autocomplete="off">';
           }
       
            
            $(this).html(input);
            
          }

            $(this).removeClass('empty');
            $('#input-field').focus();
          
        });


         $(document).on('click','.row_data tr>td.empty_fixed',function(){
            //alert("hjhvh");
            var e = $.Event( "keydown", { keyCode: 13 } );
            $('#input-field').trigger(e);
           var htm = $(this).find('li').html() ? $(this).find('li').html() : '';
           // var htm=$(this).find('li').html();
            var width = $(this).width();
            var height = $(this).height();

          if($(this).hasClass('underline')){
            $(this).addClass('underline_ans')
          }


             var sub_htm = $(this).find('table').html() ? $(this).find('table').html() : '';

            
            if(sub_htm!=''){

              
              var elem=$(this).find('.sub_table');

              if($(this).find('li').hasClass('td_line')){
                var class1="td_line";
              }else{
                var class1="";
              }


                 //onsole.log(elem);


                   var width1 = elem.width();
                   var height1 = elem.height();
         
             var htm1 = elem.find('li').html() ? elem.find('li').html() : '';

             
                 var input_new = '<input type="text" id="input-field"  class="answer-colum-highlight '+class1+'" style="height:'+height1+';width:'+width1+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm1+'" spellcheck="false">';
            
               

          
            // console.log(input_new);
            elem.html(input_new);


          }else{


              if($(this).find('li').hasClass('u_line')){

               var input = '<input type="text" id="input-field"  class="u_line '+class1+'" style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false">'; 
           }else{
                 var input = '<input type="text" id="input-field" class="'+class1+'"  style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false">'; 
           }




          }


          
            
            $(this).removeClass('empty');
            $(this).html(input);
            $('#input-field').focus();
        });

  //        $(document).on('click','.row_data tr>td.empty_fixed',function(){
  //           //alert("hjhvh");
  //           var e = $.Event( "keydown", { keyCode: 13 } );
  //           $('#input-field').trigger(e);
  //          var htm = $(this).find('li').html() ? $(this).find('li').html() : '';
  //          // var htm=$(this).find('li').html();
  //           var width = $(this).width();
  //           var height = $(this).height();

  // if($(this).find('li').hasClass('td_line')){
  //   var class1="td_line";
  // }else{
  //   var class1="";
  // }

  //           if($(this).find('li').hasClass('u_line')){
  //               var input = '<input type="text" id="input-field" class="u_line '+class1+'" style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false">';
  //           }else{
  //               var input = '<input type="text" id="input-field" class="'+class1+'" style="height:'+height+';width:'+width+';margin:0px; background:rgba(256,256,256,0.9); color:transparent !important; text-shadow:0 0 0 #000 !important; border:none; outline:none;border-radius:0;-moz-border-radius:0;-webkit-border-radius:0;font-size: 1.2em;" value="'+htm+'" spellcheck="false">';
  //           }
            
  //           $(this).removeClass('empty');
  //           $(this).html(input);
  //           $('#input-field').focus();
  //       });

        // $(document).on('click','body',function(e){
        //     console.log($(e).hasClass('connected'));
        //     var e = $.Event( "keydown", { keyCode: 13 } );
        //     $('#input-field').trigger(e);
        // })

        
                $('.wh_board').click(function () {
                  $("#can").hide();
                    $("#can").css('background','#fff');
                    $("#can").css("z-index", '-1');
                    $('#can').css('position','static');

                    $("#can").show();
                    
                  
                });
                $('.b_board').click(function () {
                  $("#can").hide();

                    $("#can").css('background','black');
                    $("#can").css("z-index", '-1');
                    $('#can').css('position','static');

                    $("#can").show();
                    
                  
                });
                $('.trans_board').click(function () {
                  $("#can").hide();
                    $("#can").css('background','transparent');
                    $("#can").css('z-index','1');
                    $("#can").css('position','absolute');
                    
                  

                    $("#can").show();
                    
                  
                });


$('.remove_canvas').click(function () {
                  $("#can").hide();
                    
                    
                  
                });
     

        $('.plus_input').click(function () {
          var sum=$(this).attr("data-sum");
         

          $(this).addClass('active_res');
           $('.minus_input').removeClass('active_res');
           $('.copy_sum').removeClass('active_res');
          
                var a=$('#input-field').val();

                a=a.replace(/\,/g,'');
                a=a.replace(/[{()}]/g, '');
                a=parseFloat(a);
                var sum_new=parseFloat(sum)+parseFloat(a);
           
            $(this).attr('data-sum',sum_new);
     
        });

         $('.minus_input').click(function() {
          var sum=$(this).attr("data-sum");

          $(this).addClass('active_res');
          $('.plus_input').removeClass('active_res');
          $('.copy_sum').removeClass('active_res');

          var a=$('#input-field').val();
          a=a.replace(/\,/g,'');
          a=a.replace(/[{()}]/g, '');
          a=parseFloat(a);
          if(a>parseFloat(sum)){
            var sum_new=parseFloat(a)-parseFloat(sum);


          }else{
            var sum_new=parseFloat(sum)-parseFloat(a);
          }
          
//console.log(sum_new);
           $(this).attr('data-sum',sum_new);

        });

             

        $('.equal_result').click(function () {
          var sum=$('.active_res').attr("data-sum");

           


          var sum_new=sum.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
          $('#input-field').val(sum_new);

            $('.active_res').attr('data-sum',0);

          
        });

         $('.copy_sum').click(function () {
           var a=$('#input-field').val();
           $('.plus_input').removeClass('active_res');
          $('.minus_input').removeClass('active_res');
          a=a.replace(/\,/g,'');
          a=a.replace(/[{()}]/g, '');
          a=parseFloat(a);
           $(this).attr('data-sum',a);
          $(this).addClass('active_res');


          
        });

        



           $('.change_bg_blue').click(function () {

           $('#input-field').css('background','none');
          $('#input-field').parent().addClass('total');
            $('#input-field').parent().addClass('bg_blue');
            //$('.bgcolor_chng').removeClass();
           $('.bgcolor_chng').attr('class','bgcolor_chng');


            $('.bgcolor_chng').addClass('cellBg5 ');
          $('#input-field').parent().removeClass('bg_black');
          $('#input-field').parent().removeClass('bg_red');
          
        });


            $('.change_bg_red').click(function () {
                $('#input-field').css('background','none');
          
            $('#input-field').parent().addClass('total');
            $('#input-field').parent().addClass('bg_red');
            $('#input-field').parent().removeClass('bg_blue');
            $('#input-field').parent().removeClass('bg_black');
             $('.bgcolor_chng').attr('class','bgcolor_chng');
            $('.bgcolor_chng').addClass('cellBg2');
          
        });


            $('.change_bg_black').click(function () {
            $('#input-field').css('background','none');
            $('#input-field').parent().addClass('total');
            $('#input-field').parent().addClass('bg_black');
            $('#input-field').parent().removeClass('bg_red');
            $('#input-field').parent().removeClass('bg_blue');

             $('.bgcolor_chng').attr('class','bgcolor_chng');
            $('.bgcolor_chng').addClass('cellBg3');
          
        });

             $('.change_bg_none').click(function () {
          
            
            $('#input-field').parent().removeClass('bg_black');
            $('#input-field').parent().removeClass('bg_red');
            $('#input-field').parent().removeClass('bg_blue');
            $('#input-field').parent().removeClass('total');
            $('.bgcolor_chng').attr('class','bgcolor_chng');
            $('.bgcolor_chng').addClass('bg_trans');
          
        });


// input field keydown///
        $(document).on('keydown','#input-field',function(e){

          
           // $(this).parent().css('background','#a4c89c');
           //background: rgb(199, 222, 187);
            if(e.keyCode == 13){

                //var val = $.trim($(this).val());
                var val1 = $(this).val();
                var parent = $(this).parent();


                if(parent.hasClass('oredr-active')){


//parent.css('background','rgb(199, 222, 187)');
parent.removeClass('oredr-active');
                }

                  if(!$.isNumeric(val1)) {
                  var val=val1;
                  }else{

                  if($(this).hasClass('number')){

                  var val= val1
                  .replace(/\D/g, "")
                  .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                  ;
                  }else{
                     var val=val1;

                  }
                  }
// alert(val);

                 var width = $(this).width();
                 var height = $(this).height();

                 if($(this).hasClass('td_line')){
                  var class1="td_line";
                 }else{
                  var class1="";
                 }

                if($(this).hasClass('u_line')){

                  if(parent.hasClass('sub_table')){
                  var htm='<li class="disc '+class1+'" draggable="true" style="border:none;text-decoration:underline;text-underline-position: under;white-space:pre">'+val+'</li>' ;


                }else if(parent.hasClass('sub_table_fixed')){
                  var htm='<li class="disc '+class1+'" draggable="true" style="border:none;text-decoration:underline;text-underline-position: under;white-space:pre">'+val+'</li>' ;


                }else{

                 var htm='<li class="disc u_line '+class1+'" draggable="true" style="text-decoration:underline;text-underline-position: under;white-space:pre">'+val+'</li>' ;

                }
                   
                }
                else{
                  if(parent.hasClass('sub_table')){
                  var htm='<li class="disc '+class1+'" draggable="true" style="border:none;white-space:pre">'+val+'</li>' ;


                }else if(parent.hasClass('sub_table_fixed')){
                  var htm='<li class="disc '+class1+'" draggable="true" style="border:none;white-space:pre">'+val+'</li>' ;


                }else{
                  var htm='<li class="disc '+class1+'" draggable="true" style="white-space:pre">'+val+'</li>' ;

                }
  
                }
// 
// interactive question//

if($('#inter-stat').val()==1){


               var q_val=parent.data('ansid');
      var base_url = '<?=base_url()?>';

                        var type='answer';
                        console.log(parent);

                          $.ajax({
        url:base_url+'get-inter-question',
        type:'post',
        data:{type:type,q_val:q_val},
        success: function(out){
            var out =JSON.parse(out);
            if (out.status == 1) {

var data=out.data;
var option=data.option_no;
$('.qst-area').html('<p>'+data.title+'</p>');
  var htm=''

for(var i=0;i<option;i++){

  var name_array=[data.option1,data.option2,data.option3,data.option4];
  var k=i+1;

   var op='option'+k;
  // var val=data.op;

    console.log(name_array[i]);

  //console.log(data+'.'+op);
  //Things[i]
   htm+='<label class="container-radio">'+name_array[i]+'<input type="radio" name="radio" class="options-val" id="options-val" value="'+op+'"><span class="checkmark"></span></label>';

   // $('.append-option').html('<label class="container-radio">'+name_array[i]+'<input type="radio" name="radio" value="'+op+'"><span class="checkmark"></span></label>');
}

$('.append-option').html(htm);
$('#ans_val').val(data.answer_value);


$('.options-val').change(function() {
      //alert($(this).val());
      var value3=$(this).val();
      if(value3!=data.answer_value){

          $(this).parent().find('.checkmark').css('background','red');
      }else{

          $(this).parent().find('.checkmark').css('background','green');
                          $('#getModal').modal('hide');

      }


      });



             


                $('#getModal').modal('show');
              //  $('#getModal').modal('show');
            }
            else if(out.status == 0){
                //alert(out.data);
            }
            else{
                window.location.href = base_url;
            }
        }
    });
                        }


// interactive question//


    if(val) parent.html(htm);
                else parent.html('');
                parent.addClass('empty');
               // parent.addClass('dim_bg');
                

            }


            if(e.altKey && e.keyCode == 85){
              
              $(this).parent().toggleClass('line');
            }

             if(e.altKey&&e.keyCode == 87){
              
              $(this).toggleClass('u_line');
            }

            
           if(e.altKey && e.keyCode == 68){
            if($(this).parent().hasClass('d_line')){

                $(this).parent().removeClass('d_line'); 
            }else{
                 $(this).parent().addClass('d_line');
            }
              // $(this).parent().css('border-bottom-width','6px'); 
              // $(this).parent().css('border-bottom-style','double'); 
              // $(this).parent().css('border-bottom-color','#092035a6');
            
            }


            if(e.altKey && e.keyCode == 66){
                // var val = $.trim($(this).val());
                var parent = $(this).parent();
                //console.log($(this).parent().addClass('total'));
                $(this).css('background','none');

               if($(this).parent().hasClass('bg_blue')) {
                 $(".change_bg_red").trigger("click");
                 return false;
                 }else if($(this).parent().hasClass('bg_red')){
                   $(".change_bg_black").trigger("click");
                   return false; 
                 }
                 else if($(this).parent().hasClass('bg_black')){
                   $(".change_bg_none").trigger("click");
                   return false; 
                 }else{
                    $(".change_bg_blue").trigger("click");
                   return false; 
                 }
                // if(val) parent.html('<li class="disc" draggable="true" style="">'+val+'</li>');
                // else parent.html('');
                // parent.addClass('empty');

             }
            //else{
            //     $(this).css('background','#a4c89c');
            // }
       var container=$(this);




            $('.itemconnect').sortable().bind('dragend', function (e) {
                //console.log(Math.random());
                refresh_result();
            });
        })


// $(document).mouseup(function(e) 
// {
//    var container = $("#input-field");
//     var container2 = $(".row_data tr>td.empty");
//     var container3 = $(".backgnd-color");

//     // if the target of the click isn't the container nor a descendant of the container
//     if (!container2.is(e.target) && container2.has(e.target).length === 0) 
//     {
//         if (!container3.is(e.target)) {  
//             container.css('background','#a4c89c');
//         }
      
//     }
// });


            
            $('.help_txt ').click(function(){


                    // $('.help-text').toggle();;
                     var html=$('.help-text').html();
                     $('#getModal-help').modal('show');
                     $('.help-content').html(html);
                     

                   

                });

             $('.view_tray ').click(function(){
                     // $(".trans_tray .d-none").each(function(){
                     //            $(this).removeClass('d-none');
                     //            return false;;
                     //        });
                   

                   var e = jQuery.Event("keydown");
                      e.keyCode = 84; // m code value
                      e.altKey = true; // Alt key pressed

                   
                      $(".view_tray").trigger(e);


                });

               $('.single_line ').click(function(){
                //alert('ggg');
                    
                     $('#input-field').parent().toggleClass('line');
                   

                });
                 $('.double_line ').click(function(){
                    
                    
                     if($('#input-field').parent().hasClass('d_line')){

                        $('#input-field').parent().removeClass('d_line'); 
                    }else{
                         $('#input-field').parent().addClass('d_line');
                    }
                   

                });

                 $('.text_line ').click(function(){
                    
                     $('#input-field').toggleClass('u_line');
                   

                });


                 
                $('.shift_left').click(function(){


                   if ($(this).hasClass('disabled')){
                     return false;
                  }

                 
                     var e = jQuery.Event("keydown");
                      e.keyCode = 37; // m code value
                   
                      $(this).trigger(e);
                      var id=parseInt($(this).parent().next().attr('data-id'))-1;
                      // if(id>0){
                      //   $(this).parent().after('<li data-id="'+id+'"><a href="#" data-id="'+id+'" class="pag_link">'+id+'</a></li>');
                      //   var first=$(".pag_link").last();
                      // first.parent().remove();
                        
                      // }
                   
                });

                $('.q_link ').click(function(){

                    var id=parseInt($(this).attr('data-id'));
                    if(id==1){
                      $('.q_link').parent().removeClass('active');
                      $(this).parent().addClass('active');
                      $('.q_link').removeClass('active');
                      $(this).addClass('active');



                       if($('#question-area').hasClass('full_q')){
                   
                           $(".quest_table").each(function(){

                              var single_wid=$(this).attr('data-width');
                            if(single_wid!=0){
                              $(this).css('width',single_wid+'%');
                            }else{
                              $(this).css('width','100%');
                            }
                            $(this).css('float','none');
                              //$(this).css('display','none');
                              //$(this).removeClass('active1').hide();
                          });
                           var act = $(".table-box.active").first();
                            $(act).css('display','block');
                            $(act).css('float','none');
                        }


                    }else{
                      $('.q_link').parent().removeClass('active');
                      $(this).parent().addClass('active');
                      $('.q_link').removeClass('active');
                      $(this).addClass('active');


                         if($('.quest_table ').length>1){

                           $(".quest_table").css('display','none');
               


                var act = $(".table-box.active").first();
                  var id = parseInt(act.attr('data-id'))+1;
                var single_wid = $(act).attr('data-width');
                if(single_wid!=0){
                single_wid=single_wid-20;
              }


                   $(".quest_table").removeClass('active');

                var tab1 = '#qt-div'+id;
                var single_wid2 = $(tab1).attr('data-width');

                if(single_wid2!=0){

                                single_wid2=single_wid2-20;
                              }


                $(act).css('display','block');
                $(tab1).css('display','block');
                $(act).addClass('active');
                $(tab1).addClass('active1');
          $(act).css('float','left');
                    $(tab1).css('float','right');

console.log(single_wid);
console.log(single_wid2);


                if(single_wid!=0 && single_wid2!=0){
                    var single_wid1=single_wid-2;
                    var single_width2=single_wid2-2;
                  $(act).css('width',single_wid1+'%');
                  $(tab1).css('width',single_width2+'%');
                }
                else if(single_wid==0 && single_wid2!=0){

                  var wid=100-single_wid2;
                   single_wid2=single_wid2-2;
                  $(act).css('width',wid+'%');
                  $(tab1).css('width',single_wid2+'%');


                }
                 else if(single_wid!=0 && single_wid2==0){
                  var wid=100-single_wid;
                     single_wid=single_wid-2;

                  $(act).css('width',single_wid+'%');
                   $(tab1).css('width',wid+'%');


                }
                else{
                  $('.quest_table ').css("width","48%");
                }


            // $('.quest_table ').css("width","48%");
            }else{
              

            }


                    }



                  });
                // $('.q_link'){

                // }


                $('.pag_link ').click(function(){
//modify//
                  if ($(this).hasClass('disabled')){
                     return false;
                  }

                 
                    var id=parseInt($(this).attr('data-id'));

                    $('.pag_link').parent().removeClass('active');
                      $(this).parent().addClass('active');
                      $('.pag_link').removeClass('active');
                      $(this).addClass('active');
                    if(id==1){
                     // alert("kkll");


                     

                        if($('#answer-area').hasClass('full')){

                          $('#answer-area').removeClass('col-md-12');
                          $('#answer-area').addClass(' offset-md-2 col-md-8');

                          
                           var act = $(".table-box.active1");
                          var id_act = parseInt(act.attr('data-id'));


                          // $(".quest_table").each(function(){
                          //      $(this).css('width','100%');
                          //  });


                             $(".ans_tab").each(function(){

                                            if($(this).hasClass('active1')){
                                                
                                              $(this).show();
                                            }else{
                                               // $(this).removeClass('active2').hide(); 
                                               //  $(this).removeClass('active').hide();
                                            }

                                               
                                                var single_wid=$(this).attr('data-width');
                            if(single_wid!=0){
                              $(this).css('width',single_wid+'%');
                            }else{
                              $(this).css('width','100%');
                            } 
                                                
                                               // $(this).css('width','100%');
                                                 $(this).css('float','left');
                    // $(this).css('float','left');
                    
                              });

                        }

                      
                    }else{


                      if($('#answer-area').hasClass('full')){

                           $('#answer-area').addClass('col-md-12');
                          $('#answer-area').removeClass(' offset-md-2 col-md-8');
                         //  var act = $(".table-box.active1");
                          //var id_act = parseInt(act.attr('data-id'));
                          // $(".quest_table").each(function(){
                          //      $(this).css('width','100%');
                          //  });

                            var act = $(".ans_tab.active1");
                            var id = parseInt(act.attr('data-id'))+1;

                            var tab1 = '#table'+id;


                         //   var act1 = $(".ans_tab.active2");
                     //console.log(act);

                    // if(act1.length != 0) {
                       if($(tab1).html()){


                        var single_wid = act.attr('data-width');
                            var single_wid2 = $(tab1).attr('data-width');
                     
                            //$(act).css("display","none");
                         $(tab1).css("width","48%");
                         $(tab1).addClass('active2');
                         $(tab1).css("display","block");
                         $(tab1).css("float","right");
                         

                          
                          //$('#table1').addClass('active1');
                          act.css("width","48%");
                          act.css("display","block");
                         
                          $('#answer-area').append('<input type="hidden" id="tab-last_full1" value="1"><input type="hidden" id="tab-last_full2" value="2">');
                    }
                    else{

                      $('#table1').addClass('active2');
                          $('#table1').css("width","48%");
                          $('#table1').css("display","block");
                          $('#table1').css("float","right");

                           act.css("width","48%");
                          act.css("display","block");

                    }



                        }




                    }


                // var act = $(".tab.active");
                // // var last = parseInt($('#tab-last').val());
                // var id_act = parseInt(act.attr('data-id'));


                // if(id>id_act){
                   
                // var e = jQuery.Event("keydown");
                //       e.keyCode = 39; // m code value
                   
                //       $(this).trigger(e);

                // }else{

                  
                //   // $( ".shift_left" ).trigger( "click" );
                //   var e = jQuery.Event("keydown");
                //       e.keyCode = 37; // m code value
                   
                //       $(this).trigger(e);
                // }
                

                });

                

                $('.shift_right_pr ').click(function(){

                  if ($(this).hasClass('disabled')){
                     return false;
                  }



                                             if($('.problme-tab').hasClass('active1')){

                                if($('.problme-tab').hasClass('active2')){


                                        var act1 = $(".problme-tab.active1");
                                        var act2 = $(".problme-tab.active2");

                                        console.log(act1);
                                     console.log(act2);
                                    var id1 = parseInt(act1.attr('data-id'))+1;
                                    var id2 = parseInt(act2.attr('data-id'))+1;
                                    console.log(id1);
                                     console.log(id2);
                                    var tab1 = '#table_img'+id1;
                                    var tab2 = '#table_img'+id2;

                                    var tabft1 = '#table-ft'+id1;
                                    var tabft2 = '#table-ft'+id2;

                                    console.log(tab1);
                                     console.log(tab2);


                                     if($(tab1).html()){
                                        act1.removeClass('active').hide();
                                        act1.removeClass('active1').hide();
                                        $(tab1).addClass('active').show();
                                        $(tab1).addClass('active1').show();
                                         $(tab1).css("width","48%");
                                        $(tab1).css("display","block");
                                       $(tabft1).css("display","block");

                                        $(tab1).css("float","left");
                                    }
                                    else{
                                        act1.removeClass('active');
                                        act1.removeClass('active2');
                                        act1.removeClass('active1').hide();
                                        $('#table_img0').addClass('active').show();
                                        $('#table_img0').addClass('active1').show();
                                        $('#table_img0').css("width","48%");
                                        $('#table_img0').css("display","block");
                                        $('#table_img0').css("float","left");
                                    }

                                     if($(tab2).html()){
                                        // act2.removeClass('active').hide();
                                        
                                        act2.removeClass('active2');
                                        $(tab2).addClass('active').show();
                                        $(tab2).addClass('active2').show();
                                        $(tab2).css("width","48%");
                                        $(tab2).css("display","block");
                                         $(tab2).css("float","right");
                                        $(tabft2).css("display","block");

                                    }
                                    else{
                                       //act2.removeClass('active').hide();
                                      act2.removeClass('active2');
                                        // act2.removeClass('active2');
                                        $('#table_img0').addClass('active').show();
                                        $('#table_img0').addClass('active2').show();
                                        $('#table_img0').css("width","48%");
                                        $('#table_img0').css("display","block");
                                        $('#table_img0').css("float","right");
                                    }


                                }
                                else{

                                  //alert("fgfgg");
                                            var act = $(".problme-tab.active1");
                                              var id = parseInt(act.attr('data-id'))+1;
                                              var tab = '#table_img'+id;
                                             
                                              if($(tab).html()){
                                                  act.removeClass('active1').hide();
                                                  $(tab).addClass('active1').show();
                                              }
                                              else{
                                                  act.removeClass('active1').hide();
                                                  $('#table_img0').addClass('active1').show();
                                              }

                                }



                 

                             }

                 });



                 $('.shift_right ').click(function(){

                  if ($(this).hasClass('disabled')){
                     return false;
                  }
                  
                     
                      var e = jQuery.Event("keydown");
                      e.keyCode = 39; // m code value

                   
                      $(this).trigger(e);
                      
                      var id=parseInt($(this).parent().prev().attr('data-id'))+1;
                      

                     // $(this).parent().before('<li data-id="'+id+'"><a href="#" data-id="'+id+'" class="pag_link">'+id+'</a></li>');
                      // var first=$(".pag_link").first();
                      // first.parent().remove();



                 })

                  $('.q_left ').click(function(){
                     
                      var e = jQuery.Event("keydown");
                      e.keyCode = 37; // m code value
                       e.altKey = true; // Alt key pressed
                   
                      $(this).trigger(e);


                 })

                   $('.q_right ').click(function(){
                     
                      var e = jQuery.Event("keydown");
                      e.keyCode = 39; // m code value
                       e.altKey = true; // Alt key pressed
                   
                      $(this).trigger(e);


                 })

                      $('.show_answer_keys ').click(function(){
                     
                      var e = jQuery.Event("keydown");
                      e.keyCode = 72; // m code value
                       e.altKey = true; // Alt key pressed
                   
                      $(this).trigger(e);


                 })

                 




        $(document).keydown(function (e) {
            // 17 for ctrl
// 78 for n
            // 82 for r
            // 67 for c
            // 
            // 70 for f
            // 81 for q
            // 65 for a
            
            // 83 for s -> screen refresh

            //if (e.keyCode == 78 && e.ctrlKey) {
            if (e.altKey && e.keyCode == 78) {
                $(".add_new_row").trigger("click");
                return false;
            }

            if (e.altKey && e.keyCode == 70) {
                $(".show_full").trigger("click");
                return false;
            }
            if (e.altKey && e.keyCode == 81) {
                $(".show_question").trigger("click");
                return false;
            }
            if (e.altKey && e.keyCode == 83) {
                $(".refresh_screen").trigger("click");
                return false;
            }
            if (e.altKey && e.keyCode == 65) {
                $(".show_answer").trigger("click");
                return false;
            }
            // g

            if (e.altKey && e.keyCode == 71) {


                //space key
                $(".show_image").trigger("click");
                return false;
            }
            // i
            if (e.altKey && e.keyCode == 73) {
                //space key
                $(".show_image_answer").trigger("click");
                return false;
            }

// p
            if (e.altKey && e.keyCode == 80) {

                //space key
                $(".show_help_image").trigger("click");
                return false;
            }

            if (e.altKey && e.keyCode == 67) {
                $(".refresh_result").trigger("click");
                return false;
            }
            if (e.altKey && e.keyCode == 82) {
                $(".remove_new_row").trigger("click");
                return false;
            }
            if (e.altKey && e.keyCode == 17) {
                $(".operation").show();
                //return false;
            }
            if (e.ctrlKey && e.keyCode == 32) {
                //space key
                $(".theme").toggle();
            }
            if (e.altKey && e.keyCode == 72) {
                //space key
                $(".trans_tray .d-none").each(function(){
                    $(this).removeClass('d-none');
                    return false;;
                });
            }









            //alert('ctrl  Val '+e.keyCode);
            if(e.keyCode == 39){


                 if($('#answer-area').hasClass('full')){
                           if($('.ans_tab').hasClass('active1')){

                                if($('.ans_tab').hasClass('active2')){


                                        var act1 = $(".tab.active1");
                                        var act2 = $(".tab.active2");

                                        console.log(act1);
                                     console.log(act2);
                                    var id1 = parseInt(act1.attr('data-id'))+1;
                                    var id2 = parseInt(act2.attr('data-id'))+1;
                                    console.log(id1);
                                     console.log(id2);
                                    var tab1 = '#table'+id1;
                                    var tab2 = '#table'+id2;

                                    console.log(tab1);
                                     console.log(tab2);


                                     if($(tab1).html()){
                                        act1.removeClass('active').hide();
                                        act1.removeClass('active1').hide();
                                        $(tab1).addClass('active').show();
                                        $(tab1).addClass('active1').show();
                                         $(tab1).css("width","48%");
                                        $(tab1).css("display","block");
                                        $(tab1).css("float","left");
                                    }
                                    else{
                                        act1.removeClass('active');
                                        act1.removeClass('active2');
                                        act1.removeClass('active1').hide();
                                        $('#table1').addClass('active').show();
                                        $('#table1').addClass('active1').show();
                                        $('#table1').css("width","48%");
                                        $('#table1').css("display","block");
                                        $('#table1').css("float","left");
                                    }

                                     if($(tab2).html()){
                                        // act2.removeClass('active').hide();
                                        
                                        act2.removeClass('active2');
                                        $(tab2).addClass('active').show();
                                        $(tab2).addClass('active2').show();
                                        $(tab2).css("width","48%");
                                        $(tab2).css("display","block");
                                         $(tab2).css("float","right");
                                    }
                                    else{
                                       //act2.removeClass('active').hide();
                                      act2.removeClass('active2');
                                        // act2.removeClass('active2');
                                        $('#table1').addClass('active').show();
                                        $('#table1').addClass('active2').show();
                                        $('#table1').css("width","48%");
                                        $('#table1').css("display","block");
                                        $('#table1').css("float","right");
                                    }


                                }
                                else{
                                            var act = $(".tab.active1");
                                              var id = parseInt(act.attr('data-id'))+1;
                                              var tab = '#table'+id;
                                             
                                              if($(tab).html()){
                                                  act.removeClass('active1').hide();
                                                  $(tab).addClass('active1').show();
                                              }
                                              else{
                                                  act.removeClass('active1').hide();
                                                  $('#table1').addClass('active1').show();
                                              }

                                }



                 

                             }

                  }else{

                          var act = $(".tab.active");
                var id = parseInt(act.attr('data-id'))+1;
                var tab = '#table'+id;
               
                if($(tab).html()){
                    act.removeClass('active').hide();
                    $(tab).addClass('active').show();
                }
                else{
                    act.removeClass('active').hide();
                    $('#table1').addClass('active').show();
                }
                }
              
            }
            if(e.keyCode == 37){
                 if($('#answer-area').hasClass('full')){
                    if($('.ans_tab').hasClass('active1')){

                          if($('.ans_tab').hasClass('active2')){


                                    var act1 = $(".ans_tab.active1");
                                    var act2 = $(".ans_tab.active2");

                                    //$(".tab-format.active")

                                 

                                        var last = parseInt($('#tab-last').val());
                                        var id1 = parseInt(act1.attr('data-id'))-1;
                                        var id2 = parseInt(act2.attr('data-id'))-1;

                                       
                                        var tab1 = '#table'+id1;
                                        var tab2 = '#table'+id2;
                                        var tab_last = '#table'+last;
                                        var tab_nlast = '#table'+last-1;

                                                                    // alert(tab1);
                                                                    // alert(tab2);



                                            if($(tab1).html()){
                                                                   // alert("lll");

                                                act1.removeClass('active').hide();
                                                act1.removeClass('active1').hide();
                                                $(tab1).addClass('active').show();
                                                $(tab1).addClass('active1').show();
                                               $(tab1).css("float","left");
                                               $(tab1).css("display","block");

                                                $(tab1).css("width","48%");
                                            }
                                            else{
                                                act1.removeClass('active');
                                                     act1.removeClass('active2');

                                                act1.removeClass('active1').hide();
                                                $(tab_last).addClass('active').show();
                                                $(tab_last).addClass('active1').show();
                                                $(tab_last).css("float","left");
                                                $(tab_last).css("width","48%");
                                            }

                                            if($(tab2).html()){
                                              //alert("kkk");
                                                // act2.removeClass('active').hide();
                                                act2.removeClass('active2');
                                                $(tab2).addClass('active').show();
                                                $(tab2).addClass('active2').show();
                                                $(tab2).css("width","48%");
                                                $(tab2).css("display","block");
                                                 $(tab2).css("float","right");
                                            }
                                            else{
                                               // act2.removeClass('active').hide();
                                                act2.removeClass('active2');
                                                $(tab_last).addClass('active').show();
                                                $(tab_last).addClass('active2').show();
                                                $(tab_last).css("width","48%");
                                                $(tab_last).css("display","block");
                                        $(tab_last).css("float","right");

                                        //             act2.removeClass('active2');
                                        // // act2.removeClass('active2');
                                        // $('#table1').addClass('active').show();
                                        // $('#table1').addClass('active2').show();
                                        // $('#table1').css("width","48%");
                                        // $('#table1').css("display","block");
                                        // $('#table1').css("float","right");
                                            }


                          }

                          else{

                                            var act = $(".tab.active1");
                                            var last = parseInt($('#tab-last').val());
                                            var id = parseInt(act.attr('data-id'))-1;
                                            var tab = '#table'+id;
                                            var tab_last = '#table'+last;
                                            var tab_nlast = '#table'+last-1;


                                            if($(tab).html() && id){
                                                act.removeClass('active1').hide();
                                                $(tab).addClass('active1').show();
                                            }
                                            else{
                                                act.removeClass('active1').hide();
                                                $(tab_last).addClass('active1').show();
                                            }


                          }


                           }
                 }else{
                            var act = $(".tab.active");
                        var last = parseInt($('#tab-last').val());
                        var id = parseInt(act.attr('data-id'))-1;
                        var tab = '#table'+id;
                        var tab_last = '#table'+last;
                        var tab_nlast = '#table'+last-1;


                        if($(tab).html() && id){
                            act.removeClass('active').hide();
                            $(tab).addClass('active').show();
                        }
                        else{
                            act.removeClass('active').hide();
                            $(tab_last).addClass('active').show();
                        }
                 }
                
            }




                if(e.shiftKey && e.keyCode == 39){
                   // alert("kkkkl");
                var act = $(".transations.active");
                var id = parseInt(act.attr('data-id'))+1;
 //alert(id);
                var tab = '#transations_id'+id;
                if($(tab).html()){
                    act.removeClass('active').hide();
                    $(tab).addClass('active').show();
                }
                else{
                    act.removeClass('active').hide();
                     act.addClass('active').show();
                }
            }


            if(e.shiftKey && e.keyCode == 37){
                var act = $(".transations.active");
                 //console.log(act.html());
                var last = parseInt($('#trans-tab-last').val());
                var id = parseInt(act.attr('data-id'))-1;

                var tab1 = '#transations_id'+id;

                var tab_last = '#transations_id'+last;
                var tab_nlast = '#transations_id'+last-1;
// alert(id);
// console.log(tab1);

                if(($(tab1).html())){
                    
                    act.removeClass('active').hide();
                    $(tab1).addClass('active').show();
                }
                else{
                    act.removeClass('active').hide();
                    $(tab_last).addClass('active').show();
                }
            }




 //             if(e.altKey && e.keyCode == 39){
 //                 if($('#question-area ').hasClass('full_q')){
 //                          if($('.quest_table').hasClass('active1')){

 //                              var act = $(".table-box.active");
 //                              var act2 = $(".table-box.active1");

                            

 //                              var id_org=parseInt(act.attr('data-id'));
 //                              var id_org2=parseInt(act2.attr('data-id'));

 //                              var id = parseInt(act.attr('data-id'))+1;
 //                              var id2 = parseInt(act2.attr('data-id'))+1;

 //                              var tab = '#qt-div'+id;
 //                              var tab2 = '#qt-div'+id2;

 //                                                                        // alert(tab);
 //                                                                        // alert(tab2);


                    
 //                                    if($(tab).html()){
 //                                        if(id_org!=($(tab2).attr('data-id'))){
 //                                          //alert('hhhh');
 //                                            act.removeClass('active').hide();
 //                                            act.removeClass('active1');
 //                                        }
 //                                        $(tab).addClass('active').show();
 //                                    }
 //                                    else{
 //                                          if(id_org!=($(tab2).attr('data-id'))){
 //                                             act.removeClass('active').hide();
 //                                             act.removeClass('active1');
 //                                            }
                           
 //                                         act.addClass('active').show();
 //                                      }

 //                             if($(tab2).html()){
 //                                if(id_org2!=($(tab).attr('data-id'))){
 //                                                                             //alert('mmm');

 //                                act2.removeClass('active1').hide();
 //                                 act2.removeClass('active');
 //                              }
 //                                $(tab2).addClass('active1').show();
 //                            }
 //                            else{
 //                                   if(id_org2!=($(tab).attr('data-id'))){
 //                                     act2.removeClass('active1').hide();
 //                                      act2.removeClass('active');
 //                                    }
                 
 //                                    $('#qt-div0').addClass('active1').show();
 //                                }


 //                          }else{



 //                               var act = $(".table-box.active");

 //                               console.log(id);
 //                                              var id = parseInt(act.attr('data-id'))+1;
 //                                              var tab = '#qt-div'+id;

                                             
 //                                              if($(tab).html()){
 //                                                  act.removeClass('active').hide();
 //                                                  $(tab).addClass('active').show();
 //                                                  $(tab).css("width","48%");
 //                                        $(tab).css("display","block");
 //                                        $(tab).css("float","left");
 //                                              }
 //                                              else{
 //                                                  act.removeClass('active').hide();
 //                                                  $('#qt-div0').addClass('active').show();
 //                                                     $('#qt-div0').css("width","48%");
 //                                         $('#qt-div0').css("display","block");
 //                                         $('#qt-div0').css("float","left");
 //                                          // $('#qt-div0').addClass('active').show();

 //                                              }




 //                          }



                            


 //                 }
 // //                var act = $(".table-box.active");
 // //                var id = parseInt(act.attr('data-id'))+1;
 // // //alert(id);
 // //                var tab = '#qt-div'+id;
 // //                if($(tab).html()){
 // //                    act.removeClass('active').hide();
 // //                    $(tab).addClass('active').show();
 // //                }
 // //                else{
 // //                    act.removeClass('active').hide();
 // //                    act.addClass('active').show();
 // //                }
 //            }




           if(e.altKey && e.keyCode == 39){
                 if($('#question-area ').hasClass('full_q')){
                          if($('.quest_table').hasClass('active1')){

                              var act = $(".table-box.active");
                              var act2 = $(".table-box.active1");

                            

                              var id_org=parseInt(act.attr('data-id'));
                              var id_org2=parseInt(act2.attr('data-id'));

                              var id = parseInt(act.attr('data-id'))+1;
                              var id2 = parseInt(act2.attr('data-id'))+1;

                              var tab = '#qt-div'+id;
                              var tab2 = '#qt-div'+id2;

                                                                        // alert(tab);
                                                                        // alert(tab2);


                    
                                    if($(tab).html()){
                                        // if(id_org!=($(tab2).attr('data-id'))){
                                          //alert('hhhh');
                                            act.removeClass('active');
                                            act.removeClass('active1');
                                            act.css("display","block");
                                        act.css("float","left");
                                        //}
                                        $(tab).addClass('active').show();

                                    }
                                    else{
                                         //  if(id_org!=($(tab2).attr('data-id'))){
                                              act.removeClass('active');
                                              act.removeClass('active1');
                                         //    }

                                          $('#qt-div0').addClass('active').show();
                                     $('#qt-div0').css("display","block");
                                        $('#qt-div0').css("float","left");
                           
                                         // act.addClass('active').show();

                                      }

                             if($(tab2).html()){
                                // if(id_org2!=($(tab).attr('data-id'))){
                                                                             //alert('mmm');

                                act2.removeClass('active1');
                                 act2.removeClass('active');
                                  act.css("display","block");
                                        act.css("float","right");
                              //}
                                $(tab2).addClass('active1').show();
                            }
                            else{
                                   // if(id_org2!=($(tab).attr('data-id'))){
                                   //   act2.removeClass('active1').hide();
                                       act2.removeClass('active1');
                                              act2.removeClass('active');

                                   //  }
                 
                                    $('#qt-div0').addClass('active1').show();
                                     $('#qt-div0').css("display","block");
                                        $('#qt-div0').css("float","right");
                                }


                          }else{



                               var act = $(".table-box.active");

                               console.log(id);
                                              var id = parseInt(act.attr('data-id'))+1;
                                              var tab = '#qt-div'+id;

                                             
                                              if($(tab).html()){
                                                  act.removeClass('active').hide();
                                                  $(tab).addClass('active').show();
                                                  $(tab).css("width","48%");
                                        $(tab).css("display","block");
                                        $(tab).css("float","left");
                                              }
                                              else{
                                                  act.removeClass('active').hide();
                                                  $('#qt-div0').addClass('active').show();
                                                     $('#qt-div0').css("width","48%");
                                         $('#qt-div0').css("display","block");
                                         $('#qt-div0').css("float","left");
                                          // $('#qt-div0').addClass('active').show();

                                              }




                          }



                            


                 }
 //                var act = $(".table-box.active");
 //                var id = parseInt(act.attr('data-id'))+1;
 // //alert(id);
 //                var tab = '#qt-div'+id;
 //                if($(tab).html()){
 //                    act.removeClass('active').hide();
 //                    $(tab).addClass('active').show();
 //                }
 //                else{
 //                    act.removeClass('active').hide();
 //                    act.addClass('active').show();
 //                }
            }
            if(e.altKey && e.keyCode == 37){


                 if($('#question-area ').hasClass('full_q')){

                     var act = $(".table-box.active");
                var act2 = $(".table-box.active1");


                 //console.log(act.html());
                var last = parseInt($('#qt-tab-last').val());
                var id = parseInt(act.attr('data-id'))-1;
               var id2 = parseInt(act2.attr('data-id'))-1;

                var tab1 = '#qt-div'+id;
                var tab_last = '#qt-div'+last;
                var tab_nlast = '#qt-div'+last-1;

                var tab2 = '#qt-div'+id2;

                if(($(tab1).html())){
                    if(act!=$(tab2)){

                       act.removeClass('active').hide();  
                    }
                    
                   
                    $(tab1).addClass('active').show();
                }
                else{
                  if(act!=$(tab2)){
                    act.removeClass('active').hide();
                    
                }
                $(tab_last).addClass('active').show();
                }


                  if(($(tab2).html())){
                    if(act2!=$(tab1)){
                    
                    act2.removeClass('active1').hide();
                    act2.removeClass('active');
                      }
                    $(tab2).addClass('active1').show();
                }
                else{
                    if(act2!=$(tab1)){
                       act2.removeClass('active1').hide();
                       act2.removeClass('active');
                    
                    }
                    $(tab_last).addClass('active1').show(); 
                    
                }






                 }
               //  var act = $(".table-box.active").first();
               //  var act2 = $(".table-box.active").last();


               //   //console.log(act.html());
               //  var last = parseInt($('#qt-tab-last').val());
               //  var id = parseInt(act.attr('data-id'))-1;
               // var id2 = parseInt(act2.attr('data-id'))-1;

               //  var tab1 = '#qt-div'+id;
               //  var tab_last = '#qt-div'+last;
               //  var tab_nlast = '#qt-div'+last-1;

               //  var tab2 = '#qt-div'+id2;
              
            }

            if(e.altKey && e.keyCode == 84){
              if($('.transaction-poolQ').is(":visible") && $('.transaction-pool').is(":visible")){
                $('.transaction-poolQ, .transaction-pool').toggle();
              } else if($('.transaction-pool').is(":visible")){
                $('.transaction-pool').hide();
                $('.transaction-poolQ').hide();

              }else {


                    if($.trim($('#answer-area').find('.trans_tray').html())!=''){
                      $('.transaction-pool').show();
                   //alert("hhh");
                     // $('#answer-area').find('.trans_question').css('display','block');
                     // // $('#answer-area').find('.help-text').show();
                     //  $('#answer-area').find('.transaction-pool').css('display','block');
                    }else{
                      $('.transaction-poolQ').show();
                      $('.transaction-pool').show();
                    }
                
                
              }
                
                if($('.transaction-poolQ').hasClass('hidden')){
                    $('.transaction-poolQ').removeClass('hidden');
                    $('.result_dv').height($(window).height() - 200);
                }
                else{
                    $('.transaction-poolQ').addClass('hidden');
                 $('.result_dv').height($(window).height() - 100);
                }
            }
            

// u
            // if(e.altKey && e.keyCode == 85){
            //     $(".underline_cell").trigger("click");
            //     return false;
            //  }

            if(e.altKey && e.keyCode == 88){
                $('.help-text').toggle();
            }



            if (e.shiftKey && e.keyCode == 72) {
                //space key
               $(".hide_show").trigger("click");
                return false;
            }

            if (e.shiftKey && e.keyCode == 68) {
                //space key
               $(".drag_drop").trigger("click");
                return false;
            }

        });
        $(document).keyup(function (e) {
            // 78 for n
            // 82 for r
            // 70 for f
            // 81 for q
            // 65 for a



            if (e.keyCode == 17) {
                $(".operation").hide();
                //return false;
            }






        });
//        $(document).on('dragend', '.itemconnect', function (e) {
//            console.log('Dreagging ' + Math.random());
//        });

        
        refresh_screen();
    });
    function refresh_screen() {

        //$(".transations").hide().fadeIn('fast');
   //$(".transations").load(location.href + " .transations");
        sreen_height = $(window).height();
        sreen_width = $(window).width();

//        sreen_height 
//        sreen_width 
        //alert($('#qt-div').height());
       
       /* height of transation pool scrolling
       if($('#qt-div').height()){
          $('.transations').height(sreen_height - $('.question').height() - $('#qt-div').height() - 110);
        }
        else{
         $('.transations').height(sreen_height - $('.question').height() - 100);
        } 
*/
      //$('.result_dv').height(sreen_height - 200);
    }
    function refresh_result() {

        $('#result .results_tr .result').each(function (j, valj) {
            //alert($(valj).attr('data_id'));
            //console.log('refresh result ' + Math.random());
            var sum = 0;
            $('#result tr').each(function (i, val) {
//            console.log('sum '+ Math.random());

                if (typeof $(val).find('.value_' + $(valj).attr('data_id') + ' .disc').html() != 'undefined') {
                    //console.log('sum ' + $(val).find('.disc').html());
                    sum += parseFloat($(val).find('.value_' + $(valj).attr('data_id') + ' .disc').html());
                }
            });
            $('.result_' + $(valj).attr('data_id')).html(sum);
        });
    }





    /*
     $('.itemconnect').sortable().bind('dragend', function(e) {
     var elem = e.currentTarget;
     var htm = '<tr><td class="connected itemconnect"></td><td class="connected"> </td><td class="connected"> </td></tr>'
     $(elem).parent().after(htm);
     console.log(e);
     });
     
     $('.itemconnect').sortable().bind('dragstart', function(e) {
     var elem = e.currentTarget;
     $('tr:last').remove();
     
     });
     
     */




    /*
     
     $('.itemconnect').sortable().bind('dragstart', function(e) {
     var elem = e.currentTarget;
     $('tr:last').remove();
     
     });
     */






//$('.itemconnect').sortable().bind('dragend', function (e) {
//
//
//
//            var htm = '<tr><td style="background-color:red" class="connected itemconnect">3</td><td class="connected"> </td><td class="connected"> </td></tr>'
//            $('#result > tbody:last-child').append(htm);
//
//            $(".itemconnect").unbind();
//
//
//
//            //            
////            $('.connected').sortable({
////                connectWith: '.connected'
////                
////
////            });
////            $('.connected').sortable();
//            console.log(Math.random());
//
//        });

</script>
</body>
</html>
