





<!doctype html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="<?=base_url()?>favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>Mesoki</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.28.0/css/jquery.fileupload.css" rel="stylesheet"/>
        <link rel="stylesheet" href="<?=base_url()?>assets/css/jquery-confirm.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="<?php echo base_url();?>assets/js/jquery-confirm.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.31.0/js/vendor/jquery.ui.widget.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.31.0/js/vendor/jquery.ui.widget.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.fileupload.js"></script>
    <script src="<?=base_url()?>assets/js/require.min.js"></script>
<script src="<?=base_url()?>slide/js/screenfull.js"></script>

    <script>
      var base_url = '<?=base_url()?>';
      requirejs.config({
          baseUrl: '<?=base_url()?>',
          paths: {
            "jquery" : "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min",
            "jquery_ui" : "https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min",
            "fileupload" : "assets/js/jquery.fileupload",
             "confirm" : "assets/js/jquery-confirm.min"
          }
      });


      require(["jquery","jquery_ui","fileupload","confirm"], function($) {

$(function () {
     
});
      });
    </script>



    <!-- Dashboard Core -->
    <link href="<?=base_url()?>assets/css/dashboard.css" rel="stylesheet" />
    <script src="<?=base_url()?>assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="<?=base_url()?>assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="<?=base_url()?>assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="<?=base_url()?>assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="<?=base_url()?>assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="<?=base_url()?>assets/plugins/input-mask/plugin.js"></script>
            <script src="<?php echo base_url();?>assets/js/jquery-confirm.min.js"></script>
 
    <link rel="stylesheet" type='text/css' media='all' href="<?=base_url()?>static/css/webslides.css">

    <script src="<?=base_url()?>assets/js/functions.js?v=<?=time()?>"></script>
    

    

  </head>
  <body onload="window.open('fullScreenPage.html, '', 'fullscreen=yes, scrollbars=auto');">
 



<!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" /> -->

<style>
  #close {
      float:right;
      display:inline-block;
      padding:2px 5px;
      background:#ccc;
  }

  #close:hover {
        float:right;
        display:inline-block;
        padding:2px 5px;
        background:#ccc;
      color:#fff;
    }

.your-class label, input {
  display: block; /* 1. oh noes, my inputs are styled as block... */
}





/**
 * Circle Styles
 */


.circle{
    
    height: calc(68vh - 25vmax);
    display: flex;
  align-items: center;
  justify-content: center 
  background-size: contain ; background-size: 100%;
  background-position: center;
  background-repeat: no-repeat;
   margin: 10px; width: auto; 
    /*border-radius: 50%;*/
  /*border: 1px solid black;*/
    
}



.contents{
    width: 50%;
    background-color: !important transparent;
    word-wrap: break-word;
}
.topics{
    width: 50%;

}

#ppage{
  /*border: 1px solid #a7a5a5; */
 /* height:600px;
  width: 820px;  
  background-color: #fff;
  
  background-position: center;
  background-repeat: no-repeat;*/
}
.card-header {
  border-color: #ccc;
}
.pstyle .card{
  background-color: #293039;
  color: #fff; 
  margin-bottom:1px;
}
.fold{
  overflow: scroll;
}



#btnFullscreen {
    position: absolute;
    right: -221%;
    bottom: 21%;
}



<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>





</style>
<input type="hidden" name="topic_id"  id="topic_id" value="<?= $chapter_id?>"> 



<!-- <header class="bg-white">
         
<a href="javascript:;" id="btnFullscreen" class="btn btn-primary">Toggle Fullscreen</a>
  
</header> -->
 <main role="main">
      <article id="webslides" >

        <!-- Quick Guide
          - Each parent <section> in the <article id="webslides"> element is an individual slide.
          - Vertical sliding = <article id="webslides" class="vertical">
          - <div class="wrap"> = container 90% / <div class="wrap size-50"> = 45%;
        -->
 <section>
  <span class="background fl" onClick="goToSlideId('section-1')" style="background-image:url('<?=base_url()?>static/images/playbutton.jpg')"></span>
  
</section>

        <?php 
        // print_r($chapter_content);
        // echo "dsssssss";
        if($chapter_content!=false){

          ?>
          <section id="<?=$chapter_content['data_id']?>"> 
          <!-- <section> -->

                    <span class="background " style="background-image:url('<?php echo base_url().'uploads/background/'.$chapter_content['backgroundimage']?>');"  ></span> 
          <div class="wrap size-100  aligncenter">
<?php //print_r($topics); 
 
//    echo $topics['topic_title']."xsxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
//     foreach($topics['sub'] as $subtop ) {
//         echo $subtop['topic_title']."jjjjjjjjjjjjjjjjj";
//         if(!empty($subtop['sub'])){
//           nested($subtop['sub']);
//         }
       
//     }
// function nested($id){
//   foreach ($id as $value) {
//     echo $value['topic_title']."kkkkkkkkkkkkkkkkk";
//     if(!empty($value['sub'])){
//           nested($value['sub']);
//         }
//   }
// }




?>
    

             <!-- <div class="ppage content" id="ppage" > -->
                    <div class="row topics">
                      <?php

                       
                      
                     

                    $pvalue = round(1366/900,2);
$hvalue = round(768/480,2);
                   
                     

                       //   $topc = $value['position_top']."px";
                       // $leftc = $value['position_left']."px";

                       foreach ($chapter_content['contents'] as $tpcs) {

                        if($tpcs['topic_position_top']!=0){
                             $top = ($tpcs['topic_position_top']*$hvalue);
                            $top = $top."px";
                          }else{
                            $top = 0;
                          }
                          if($tpcs['topic_position_left']!=0){
                             $left = ($tpcs['topic_position_left']*$pvalue);
                            $left = $left."px";
                          }else{
                            $left = 0;
                          }

                           if($tpcs['topic_content_position_top']!=0){
                             $ttop = ($tpcs['topic_content_position_top']*$hvalue);
                            $ttop = $ttop."px";
                          }else{
                            $ttop = 0;
                          }
                          if($tpcs['topic_content_position_left']!=0){
                             $tleft = ($tpcs['topic_content_position_left']*$pvalue);
                            $tleft = $tleft."px";
                          }else{
                            $tleft = 0;
                          }



                          
                           if($tpcs['topic_fontsize']!=0){
                          $font = ($tpcs['topic_fontsize']*$pvalue)."px";
                            }else{
                              $font ='';
                            }


                             if($tpcs['topic_height']!=0){
                          $topic_height = ($tpcs['topic_height']*$hvalue)."px";
                            }else{
                              $topic_height ='';
                            }


                             if($tpcs['topic_width']!=0){
                          $topic_width = ($tpcs['topic_width']*$pvalue)."px";
                            }else{
                              $topic_width ='';
                            }
                       //  $top = $tpcs['topic_position_top']."px";
                       // $left = $tpcs['topic_position_left']."px";
                        
                                  // echo '<div class="circle plus" onClick="goToSlideId('.$tpcs['topic_id'].')"  data-id="'.$tpcs['topic_id'].'" style="background-color:'.$tpcs['topic_backgroundcolor'].'; color:'.$tpcs['topic_color'].';  top:'.$top.'; left:'.$left.';   background-image:url('.base_url().'uploads/background/'.$tpcs["topic_backgroundimage"].'); position:absolute;font-size:'.$font.'; height:'.$topic_height.';width:'.$topic_width.';  " > <p class="tcontent" style="top:'.$ttop.';left:'.$tleft.'">'.$tpcs['topic_title'].'</p></div>';

echo '<a href="'.$tpcs['link'].'" target="_blank">';
                            echo'<div class="circle  task" data-val="c'.$tpcs['id'].'"  data-id="'.$tpcs['id'].'" style="background-color:'.$tpcs['topic_backgroundcolor'].'; color:'.$tpcs['topic_color'].';  top:'.$top.'; left:'.$left.';   background-image:url('.base_url().'uploads/background/'.$tpcs["topic_backgroundimage"].'); position:absolute;font-size:'.$font.'; height:'.$topic_height.';width:'.$topic_width.';   " > <p class="tcontent"  data-val="p'.$tpcs['id'].'" data-id="'.$tpcs['id'].'"  style="top:'.$ttop.';left:'.$tleft.';font-size:'.$font.'px;position:absolute;">'.$tpcs['topic_title'].'</p></div>';

                            echo '</a>';
                                } ?>

                               
                    </div>
                    <!-- <div class="row contents" style="  left: <?=$leftc?> ; top: <?=$topc?> ; position:absolute;">
                          <?= $topics['heading'] ?>
                          <?= $topics['content'] ?>
                    </div> -->
                <!-- </div> -->


            <!-- .end .content-right -->
          </div>
          <!-- .end .wrap -->
        </section>


<?php } 
?>




        






      </article>
      <!-- end article -->
    </main>
















  


<!-- Presentation table -->


<!-- Modal -->





<!-- Modal content -->



<!-- Modal Head -->

 <script src="https://cdn.tiny.cloud/1/jrsjj47h3k9y6272lmftp2j56agyzl6a86u1fvt8n8bzbxvw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({ selector:'textarea' });</script> 
 <script src="<?=base_url()?>static/js/webslides.js"></script>
    <script>
      window.ws = new WebSlides();
    </script>

    <!-- OPTIONAL - svg-icons.js (fontastic.me - Font Awesome as svg icons) -->
    <!-- <script defer src="<?=base_url()?>static/js/svg-icons.js"></script> -->
   <script type="text/javascript">
    // var sections = document.getElementsByTagName("section");
    // sections = Array.prototype.slice.call(sections)
    function goToSlideId(this_section_id) {
        // alert(this_section_id);
        gg =parseInt(this_section_id.split('-')[1]);
        ws.goToSlide(gg);
    }

    function goToSlide(this_section_id) {
        // alert(this_section_id);
        gg =parseInt(this_section_id.split('-')[1]);
        gd = parseInt(gg-1);
        ws.goToSlide(gd);
    }

  </script>
  <script type="text/javascript">
  
 $(document).ready(function(){

    // $("p").attr("contenteditable",true);
    $("p span").each(function() {
     // $(this).style.fontSize
       var size = $(this).css("font-size");
       var val = "<?=$pvalue?>";
       var fsize = parseFloat(size)*parseFloat(val);
       $(this).css('font-size',fsize);
// alert(size +" kk " +fsize +" jj " + val);
      
    });
    $("p").each(function() {
     // $(this).style.fontSize
       var size = $(this).css("font-size");
       var val = "<?=$pvalue?>";
       var fsize = parseFloat(size)*parseFloat(val);
       $(this).css('font-size',fsize);
// alert(size +" kk " +fsize +" jj " + val);
      
    });
 });

</script>
    <!-- OPTIONAL - svg-icons.js (fontastic.me - Font Awesome as svg icons) -->
    <!-- <script defer src="<?=base_url()?>static/js/svg-icons.js"></script> -->
  
    <script type="text/javascript">
       $(document).on('click','.plus',function(e){
    var tid = $(this).attr('data-id');
    var tparentid = $("#topic_id").val();
    window.location.href = base_url+'presentation-slide-view/'+tid;
  })

      // var dragposition = '';
      // $('.circle').draggable({
      //    // other options...
      //    drag: function(event,ui){
      //       dragposition = ui.position;
      //       var topicid = $(this).attr('data-id');

           
      //    }
      // });



      // var dragpositions = '';
      // $('.contents').draggable({
      //    // other options...
      //    drag: function(event,ui){
      //       dragpositions = ui.position;
      //       var topicid = $("#topic_id").val();
            

      //       // alert(att);
      //       // alert(dragposition.left+' '+dragposition.top);
             
      //    }
      // });
    </script>
     <script type="text/javascript">
      $(document).ready(function(){
          $('#navigation').append(' <a id="btnFullscreen" type="button" class="fa fa-arrows-alt fa-3x"> </a>');
      });
    </script>
<script>
function toggleFullscreen(elem) {
 
  elem = elem || document.documentElement;

  if (!document.fullscreenElement && !document.mozFullScreenElement &&
    !document.webkitFullscreenElement && !document.msFullscreenElement) {
    if (elem.requestFullscreen) {
      elem.requestFullscreen();
    } else if (elem.msRequestFullscreen) {
      elem.msRequestFullscreen();
    } else if (elem.mozRequestFullScreen) {
      elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) {
      elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
  }
}

$(document).on('click','#btnFullscreen',function(e){
  toggleFullscreen();
});
function FullScreen() {
           var docElm = document.documentElement;
           if (docElm.requestFullscreen) {
               docElm.requestFullscreen();
           }
           else if (docElm.mozRequestFullScreen) {
               docElm.mozRequestFullScreen();
           }
           else if (docElm.webkitRequestFullScreen) {
               docElm.webkitRequestFullScreen();
           }
       }

       $(document).on('click','.fl',function(e){
  toggleFullscreen();
});
</script>















