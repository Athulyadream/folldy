


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?=base_url('assets_main')?>/assets/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?=base_url('assets_main')?>/assets/js/bootstrap.bundle.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.js"></script>

<script type="text/javascript" src="<?=base_url('assets_main')?>/assets/js/custom.js"></script>

<script src="<?=base_url('assets_main')?>/assets/dragscript/jquery.sortable.js"></script>
<script>
    var sreen_height = 200;
    var sreen_width = 300;
    $(function () {

        //$('.sortable').sortable();

        $('.connected').sortable({
            connectWith: '.connected'

        });
        $('.itemconnect').sortable().bind('dragend', function (e) {
            console.log(Math.random());
//            refresh_result();
        });
//        $(document).on('dragstart','.itemconnect', function(e) {
//		refresh_result();
//		
//	});

        $('.trans').click(function (e) {
            e.preventDefault();
            $('.trans_question').html('' + $(this).html() + '');
            $('#trans_img').attr('src',$('#trans_img_' + $(this).attr('data_id')).html());
            $(this).addClass('tran_inactive');
            $('.trans_tray').html($('#question_spits_' + $(this).attr('data_id')).html());
            $('.connected').sortable({
                connectWith: '.connected'

            });
        });
        
        $('.add_new_row').click(function () {

            //var htm = '<tr><td style="background-color:yellow" class="connected itemconnect value_1"></td><td class="connected value_2"></td><td class="connected value_3"></td></tr>'
            var htm = $('#result > tbody > tr:nth-child(1)').html();
            //alert(htm);
            $('#result > tbody > tr:nth-last-child(2)').after('<tr>' + htm + '</tr>');
            $('#result > tbody > tr:nth-last-child(2) > td').html('');
//            $('.connected').sortable('destroy');

            $('.connected').sortable({
                connectWith: '.connected'

            });
//            $('.itemconnect').sortable('destroy');
            $('.itemconnect').sortable().bind('dragend', function (e) {
                //console.log(Math.random());
                refresh_result();
            });
            refresh_result();
        });
        $('.remove_new_row').click(function () {
            $('#result tr').each(function (i, tr) {
//                alert('tr '+ $(tr).html());
//                alert('tr ' + i);
                var empty_flg = true;
                $(tr).find('td').each(function (j, td) {
                    if ($(td).html() != '') {
                        empty_flg = false;
                    }
                });
                //alert($('#result tr').length);
                if (empty_flg && $('#result tr').length > 2) {
//                    alert('Delete '+i);
                    $(tr).remove();
                }
            });
        });
        $('.show_question').click(function () {
            $('#question-area').removeClass('col-md-6');
            $('#question-area').addClass('col-md-12');
            $('#question-area').removeClass('d-none');
            $('#answer-area').addClass('d-none');
//            $('#question-area').addClass('col-md-12');


        });
        $('.show_answer').click(function () {

            $('#answer-area').removeClass('col-md-6');
            $('#answer-area').addClass('col-md-12');
            $('#answer-area').removeClass('d-none');
            $('#question-area').addClass('d-none');
//            $('#question-area').addClass('col-md-12');


        });
        $('.show_full').click(function () {

            $('#answer-area').removeClass('col-md-12');
            $('#answer-area').addClass('col-md-6');
            $('#answer-area').removeClass('d-none');
            $('#question-area').removeClass('col-md-12');
            $('#question-area').addClass('col-md-6');
            $('#question-area').removeClass('d-none');
        });
        $('.refresh_screen').click(function () {
            refresh_screen();
        });
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
            if (e.keyCode == 78) {
                $(".add_new_row").trigger("click");
                return false;
            }

            if (e.keyCode == 70) {
                $(".show_full").trigger("click");
                return false;
            }
            if (e.keyCode == 81) {
                $(".show_question").trigger("click");
                return false;
            }
            if (e.keyCode == 83) {
                $(".refresh_screen").trigger("click");
                return false;
            }
            if (e.keyCode == 65) {
                $(".show_answer").trigger("click");
                return false;
            }

            if (e.keyCode == 67) {
                $(".refresh_result").trigger("click");
                return false;
            }
            if (e.keyCode == 82) {
                $(".remove_new_row").trigger("click");
                return false;
            }
            if (e.keyCode == 17) {
                $(".operation").show();
                //return false;
            }
            if (e.keyCode == 32) {
                //space key
                $(".theme").toggle();
            }
            if (e.keyCode == 72) {
                //space key
                $(".trans_tray .d-none").each(function(){
                    $(this).removeClass('d-none');
                    return false;;
                });
            }
            //alert('ctrl  Val '+e.keyCode);



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
    
        sreen_height = $(window).height();
        sreen_width = $(window).width();
//        sreen_height 
//        sreen_width 
//        alert(sreen_height);
//        alert($('.question').height());
        $('.transations').height(sreen_height - $('.question').height() - 50);
        $('.result_dv').height(sreen_height - 300);
    }
    function refresh_result() {

        $('#result .results_tr .result').each(function (j, valj) {
            //alert($(valj).attr('data_id'));
            console.log('refresh result ' + Math.random());
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
