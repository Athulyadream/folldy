<!doctype html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="Presentation" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
   <!--  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes"> -->
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="<?=base_url()?>favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>Mesoki</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  

  



    <!-- Dashboard Core -->
    <!-- <link href="<?=base_url()?>assets/css/dashboard.css" rel="stylesheet" /> -->
 
 
    <link rel="stylesheet" type='text/css' media='all' href="<?=base_url()?>static/css/webslides.css">

  

    

  </head>
  <body>
 



<!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" /> -->

<style>
@media screen and (max-width: 450px) {
  p {
    line-height: 0.8em;
  }
}
@media screen and (max-width: 490px) {
  p {
    line-height: 0.99em;
  }
}
@media screen and (max-width: 200px) {
  p {
    line-height: 0.2em;
  }
}
  .linka {
  color: unset !important;
}
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


 .hover-item:hover {
        cursor: pointer;
      }
.circle{
    
    /*height: calc(68vh - 25vmax);*/
    /*display: flex;
  align-items: center;
  justify-content: center */
  background-size: contain ; background-size: 100%;
  background-position: center;
  background-repeat: no-repeat;
   /*margin: 10px; width: auto; */
    /*border-radius: 50%;*/
  /*border: 1px solid black;*/
    
}
.practice a{
  text-decoration: none;
  color: #000 !important;
}

.timage{
  background-size: contain ; background-size: 100%;
  background-position: center;
  background-repeat: no-repeat;
}

.contents{
    /*width: 50%;*/
    background-color: !important transparent;
    /*word-wrap: break-word;*/
}
.topics{
    /*width: 50%;*/

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




/*#btnFullscreen {
    position: absolute;
    right: -221%;
    bottom: 21%;
}*/

#btnFullscreen {
    position: absolute;
    right: -121%;
    bottom: 30%;
}


</style>



<input type="hidden" name="topic_id"  id="topic_id" value="<?= $topic_id?>"> 


<?php 
$pvalue = 1;
$hvalue = 1;
?>
<input type="hidden" name="pval"  id="pval" value="<?= $pvalue?>"> 
<input type="hidden" name="width"  id="width" value="<?=$width?>"> 
<input type="hidden" name="height"  id="height" value="<?=$height?>"> 

<!-- <header class="bg-white">
         
<a href="javascript:;" id="btnFullscreen" class="btn btn-primary">Toggle Fullscreen</a>
  
</header> -->
 <main role="main">
      <article id="webslides" >

       
        <!-- <section>
  <span class="background fl" onclick="return goToSlideId('section-1')" style="background-image:url('<?=base_url()?>static/images/playbutton.jpg')"></span>
 <div class="wrap size-100  " style="position: absolute;
    top: 1%;
    left: 12%; color: #fff;"> <h5><?= $presentation_name ?></h5></div>
</section> -->




        <?php 
        if($topics!=false){
if(!empty($topics['image']) || !empty($topics['sub']) || $topics['content'] !=""){
          ?>
        <section class="<?=$topics['topic_id']?>" data-topic="<?=$topics['topic_id']?>">
          <!--.wrap = container (width: 90%) -->
                    <span class="background " style="background-image:url('<?php echo base_url().'uploads/background/'.$topics['backgroundimage']?>'); background-color:<?=$topics["backgroundcolor"]?>;  "  ></span>
          <div class="wrap size-100  ">
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
                    <div class=" topics">
                      <?php

                       // $topc = $topics['position_top']."px";
                       // $leftc = $topics['position_left']."px";
                        if($topics['position_top']!=0){
                         $topc = ($topics['position_top']*$hvalue);
                        $topc = $topc."px";
                      }else{
                        $topc = 0;
                      }
                       if($topics['position_left']!=0){
                      $leftc = ($topics['position_left']*$pvalue);
                        $leftc = $leftc."px";
                      }else{
                        $leftc = 0;
                      }
                      
                     

                       foreach ($topics['sub'] as $tpcs) {

                       // $top = $tpcs['topic_position_top']."px";
                       // $left = $tpcs['topic_position_left']."px";
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



                           if($tpcs['topic_content_position_top']!=0 || $tpcs['topic_content_position_top']!=""){
                             $ttop = ($tpcs['topic_content_position_top']*$hvalue);
                            $ttop = $ttop."px";
                          }else{
                            $ttop = 0;
                          }
                          if($tpcs['topic_content_position_left']!=0 || $tpcs['topic_content_position_left']!=""){
                             $tleft = ($tpcs['topic_content_position_left']*$pvalue);
                            $tleft = $tleft."px";
                          }else{
                            $tleft = 0;
                          }



                           if($tpcs['topic_fontsize']!=0){
                          $font = ($tpcs['topic_fontsize']*$pvalue)."pt";
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
                                      if($tpcs['practice_id']!=0 && $tpcs['practice_type']==1 ){
                        echo '<a href="'.base_url().'view-details/'.$tpcs['practice_id'].'" target="_blank" class="practice linka">';
                      }else{
                         echo '<a href="'.$tpcs['topic_id'].'" target="_blank" class="practice linka">';
                      }    


                                  echo '<div class="circle plus pos ';
                                   if((!empty($tpcs['sub'])) || (!empty($tpcs['image'])) || ($tpcs['content']!="") ||($tpcs['sametopcount'] ==1)){
                                    echo 'hover-item';
                                  }else{
                                    echo ' last-child';
                                  }
                                  if($tpcs['sametopicstatus'] ==1){
                                    echo ' sametop st'.$tpcs['sametopid'];
                                  }
                                   echo ' viewtop'.$tpcs['topic_parent'];
                                  echo '"';
                                  if($tpcs['sametopcount'] ==1){
                                    echo ' data-same ="'.$tpcs['topic_id'].'"';
                                  }
                                  echo ' id="ci'.$tpcs['topic_id'].'"  data-id="'.$tpcs['topic_id'].'" style="background-color:'.$tpcs['topic_backgroundcolor'].'; color:'.$tpcs['topic_color'].';  top:'.$top.'; left:'.$left.';   background-image:url('.$tpcs["topic_backgroundimage"].'); position:absolute;font-size:'.$font.'; height:'.$topic_height.';width:'.$topic_width.';  " > <div class="tcontent post" id="t'.$tpcs['topic_id'].'" style="top:'.$ttop.';left:'.$tleft.';position:absolute;">'.$tpcs['topic_title'].'</div></div>';
                                  // if($tpcs['practice_id']!=0 && $tpcs['practice_type']==1 ){
                        echo '<a/>';
                      // }










                              if($tpcs['position_top']!=0){
                                 $topct = ($tpcs['position_top']*$hvalue);
                                $topct = $topct."px";
                              }else{
                                $topct = 0;
                              }
                               if($tpcs['position_left']!=0){
                              $leftct = ($tpcs['position_left']*$pvalue);
                                $leftct = $leftct."px";
                              }else{
                                $leftct = 0;
                              }

                      if( $tpcs['explanation'] !=""){   
                     echo '<div class="exp  pos ';

                                  if($tpcs['sametopicstatus'] ==1){
                                    echo ' sametop st'.$tpcs['sametopid'];
                                  } 
                                echo ' " id="cc'.$tpcs['topic_id'].'" style="  left: '.$tpcs['explanation_left'].'px; top: '.$tpcs['explanation_top'].'px ; position:absolute; height:'.$tpcs["explanation_height"].'px; width:'.$tpcs["explanation_width"].'px;">
                          '. $tpcs['explanation'] .'
                    </div>';

 }




                                } //forech close
  



















                                ?>


                                <?php

if($topics['image']){
 foreach ($topics['image'] as $img) {

                                  if($img['image_position_left'] != ""){
                                      $lefti = ($img['image_position_left']*$pvalue);
                                  }else{
                                      $lefti = (250*$pvalue);
                                  }

                                  if($img['image_position_top'] != ""){
                                      $topi = ($img['image_position_top']*$hvalue);
                                  }else{
                                      $topi = (250*$hvalue);
                                  }


                                  if($img["image_height"] != ""){
                                      $heighti = ($img["image_height"]*$hvalue);
                                  }

                                  if($img["image_width"] != ""){
                                      $widthi = ($img["image_width"]*$pvalue);
                                  }

                                  echo '<div class="timage pos" id="im'.$img["image_id"].'" data-id="'.$img["image_id"].'"   style=" position:absolute;top:'.$topi.'px;left:'.$lefti.'px;background-image:url('.base_url().'uploads/chapter/'.$img["image"].'); height:'.$heighti.'px;width:'.$widthi.'px;"></div>';
                                } }?>
                    </div>
                    <?php if( $topics['content'] !=""){    ?>

                    <div class=" contents pos" id="cc<?=$topics['topic_id']?>" style="  left: <?=$leftc?> ; top: <?=$topc?> ; position:absolute; height:<?=$topics["content_height"]?>px; width:<?=$topics["content_width"]?>px;" >
                          <?= $topics['content'] ?>
                    </div>
                  <?php } ?>
                <!-- </div> -->


            <!-- .end .content-right -->
          </div>
          <!-- .end .wrap -->
        </section>


<?php }} 
?>




        






      </article>
      <!-- end article -->
    </main>
















  


<!-- Presentation table -->


<!-- Modal -->





<!-- Modal content -->



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
        // sections = Array.prototype.slice.call(this_section_id);
        //  alert(sections);
        // index = sections.findIndex(function (x) {
        // return x.accessKey == this_section_id })
        // alert(gg);
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
    $('.sametop').hide();
   
 });

</script>
   
    <script type="text/javascript">


       // $(document).on('click','.plus',function(e){

       //  var stid = $(this).attr('data-same');
       //  if(stid){
       //    $(".st"+stid).show();

       //  }else{

       //    var did = $(this).attr('data-id');
       //    var section = $("."+did).attr('id');

       //    goToSlide(section);
       //  }
   

    </script>

    <script type="text/javascript">
        $(document).ready(function(){
          $('#navigation').hide();
         
           var height = "<?=$height?>";
      var width = "<?=$width?>";
      $("#height").val(height);
      $("#width").val(width);
      pval = $("#pval").val();
      // console.log(pval);
      ppval = pval+1;
      $("#pval").val(ppval);
      if (pval >1) {
        var height = $("#height").val();
        var width = $("#width").val();
        resize(height,width);
      }
     // alert('h');
     
      var height = "<?=$height?>";
      var width = "<?=$width?>";
      $("#height").val(height);
      $("#width").val(width);
      size(height,width);
       size(height,width);

      });
    </script>

<script type="text/javascript">
  function size(height,width){

    var mi = 450/800;
        var rc = 0;
        $("#rc").val(rc);
        var tc = 0;
        $("#tc").val(tc);
        var ch = height;
        var cw = width;
        var vl = 0;
        var cmi = parseFloat(ch)/parseFloat(cw);
  // alert(ch+' '+cw);

        if(mi !=cmi){
          var nw = cw;
          var nh = parseFloat(cw)*parseFloat(mi);
          
         
          if(nh>ch){
            nw = parseFloat(ch)/parseFloat(mi);
            nh = ch;
            rc = (cw-nw)/2;
            $("#rc").val(rc);

          }else{
            tc = (ch-nh)/2;
            $("#tc").val(tc);
          }

          ch = nh;
        cw = nw;
      }
      var valw = parseInt(cw)/parseInt(800);
      var valh = parseInt(ch)/parseInt(450);
        incrAllFontSize(valw);
      
      $(".circle").each(function() {
       

         var hei = $(this).height();
         var fheight = parseFloat(hei)*parseFloat(valh);
         $(this).css('height',fheight);
         var widths = $(this).width();
         var fwidth = parseFloat(widths)*parseFloat(valw);
         $(this).css('width',fwidth);

    
    
    });

      
       $(".tcontent").each(function() {
    
 });

    
    $(".timage").each(function() {
      
       var hei = $(this).height();
       var fheight = parseFloat(hei)*parseFloat(valh);
       $(this).css('height',fheight);

       var widths = $(this).width();
       var fwidth = parseFloat(widths)*parseFloat(valw);
       $(this).css('width',fwidth);
      
    });

    $(".contents").each(function() {

       var hei = $(this).height();
       var fheight = parseFloat(hei)*parseFloat(valh);
       $(this).css('height',fheight);

       var widths = $(this).width();
       var fwidth = parseFloat(widths)*parseFloat(valw);
       $(this).css('width',fwidth);

     
    });






    $(".pos").each(function() {

         
        var id = $(this).attr('id');
        var element = document.getElementById(id),
        style = window.getComputedStyle(element),
        tops = style.getPropertyValue('top');
        lefts = style.getPropertyValue('left');

        var ftop = parseFloat(tops)*parseFloat(valh);
        ftop = parseFloat(ftop)+parseFloat(tc);
        $(this).css('top',ftop);

        var fleft = parseFloat(lefts)*parseFloat(valw);
        fleft = parseFloat(fleft)+parseFloat(rc);
        $(this).css('left',fleft);

    });


    $(".post").each(function() {

         
        var id = $(this).attr('id');
        var element = document.getElementById(id),
        style = window.getComputedStyle(element),
        tops = style.getPropertyValue('top');
        lefts = style.getPropertyValue('left');

        var ftop = parseFloat(tops)*parseFloat(valh);
        // ftop = parseFloat(ftop)+parseFloat(tc);
        $(this).css('top',ftop);

        var fleft = parseFloat(lefts)*parseFloat(valw);
        // fleft = parseFloat(fleft)+parseFloat(rc);
        $(this).css('left',fleft);

    });
    $(".background").each(function() {

      $(this).css('position','absolute');
      $(this).css('height',ch);
      $(this).css('width',cw);
        $(this).css('top',tc);
        $(this).css('left',rc);
      
    });

  

  }






function resize(height,width){
      // alert(height+" "+width);
    var mi = 450/800;
        var rc = 0;
        $("#rc").val(rc);
        var tc = 0;
        $("#tc").val(tc);

        var ch = height;
        var cw = width;
        var vl = 0;
        var cmi = parseFloat(ch)/parseFloat(cw);
  // alert(ch+' '+cw);

        if(mi !=cmi){
          var nw = cw;
          var nh = parseFloat(cw)*parseFloat(mi);
          
         
          if(nh>ch){
            nw = parseFloat(ch)/parseFloat(mi);
            nh = ch;
            rc = (cw-nw)/2;
            $("#rc").val(rc);

          }else{
            tc = (ch-nh)/2;
            $("#tc").val(tc);
          }

          ch = nh;
        cw = nw;
      }
      var valw = parseInt(cw)/parseInt(800);
      var valh = parseInt(ch)/parseInt(450);
        decrAllFontSize(valw);

      $(".circle").each(function() {
    
       

       var hei = $(this).height();
       var fheight = parseFloat(hei)/parseFloat(valh);
       $(this).css('height',fheight);

       var widths = $(this).width();
       var fwidth = parseFloat(widths)/parseFloat(valw);
       $(this).css('width',fwidth);


    });




    $(".timage").each(function() {
      
       var hei = $(this).height();
       var fheight = parseFloat(hei)/parseFloat(valh);
       $(this).css('height',fheight);

       var widths = $(this).width();
       var fwidth = parseFloat(widths)/parseFloat(valw);
       $(this).css('width',fwidth);


      
    });

    $(".contents").each(function() {
    
       var hei = $(this).height();
       var fheight = parseFloat(hei)/parseFloat(valh);
       $(this).css('height',fheight);

       var widths = $(this).width();
       var fwidth = parseFloat(widths)/parseFloat(valw);
       $(this).css('width',fwidth);

      
    });


    $(".pos").each(function() {

         
        var id = $(this).attr('id');
        var element = document.getElementById(id),
        style = window.getComputedStyle(element),
        tops = style.getPropertyValue('top');
        lefts = style.getPropertyValue('left');

        tops = parseFloat(tops)-parseFloat(tc);
        var ftop = parseFloat(tops)/parseFloat(valh);
        $(this).css('top',ftop);

        lefts = parseFloat(lefts)-parseFloat(rc);
        var fleft = parseFloat(lefts)/parseFloat(valw);
        $(this).css('left',fleft);

    });

    $(".post").each(function() {

         
        var id = $(this).attr('id');
        var element = document.getElementById(id),
        style = window.getComputedStyle(element),
        tops = style.getPropertyValue('top');
        lefts = style.getPropertyValue('left');

        // tops = parseFloat(tops)-parseFloat(tc);
        var ftop = parseFloat(tops)/parseFloat(valh);
        $(this).css('top',ftop);

        // lefts = parseFloat(lefts)-parseFloat(rc);
        var fleft = parseFloat(lefts)/parseFloat(valw);
        $(this).css('left',fleft);

    });
    $(".background").each(function() {

        $(this).css('position','absolute');

      
       // var hei = $(this).height();
       // var fheight = (parseFloat(hei)/parseFloat(valh))+tc;
       $(this).css('height',height);

       // var widths = $(this).width();
       // var fwidth = (parseFloat(widths)/parseFloat(valw))+rc;
       $(this).css('width',width);
        $(this).css('top',tc);
        $(this).css('left',rc);
      
    });


  }











function decrAllFontSize(valw){
  $(".circle").find( "*" ).each(function(index, elem){
    // alert(elem.style.fontSize);
    var $this = $(this);//caching for perf. opt.
   
    var curr = $this.css("fontSize");//get the fontSize string
    
    if(curr != "" && curr != undefined && elem.style.fontSize != ""){//check if it exist
      curr = curr.replace(/px$/, "");//get rid of "px" in the string

      var float_curr = parseFloat(curr/valw);//convert string to float
      float_curr = float_curr;//actual incr

      var new_val = "" + float_curr + "px";//back to string
      $this.css("fontSize", new_val);//set the fontSize string
    }
  });


   $(".contents").find( "*" ).each(function(index, elem){

    var $this = $(this);//caching for perf. opt.
    // alert($this.attr('class')+ "class d");

  


    var curr = $this.css("fontSize");//get the fontSize string
    if(curr != "" && curr != undefined && elem.style.fontSize != ""){//check if it exist
      curr = curr.replace(/px$/, "");//get rid of "px" in the string

      var float_curr = parseFloat(curr/valw);//convert string to float
      float_curr = float_curr;//actual incr

      var new_val = "" + float_curr + "px";//back to string
      $this.css("fontSize", new_val);//set the fontSize string
    }
  });
}


function incrAllFontSize(valw){
  $(".circle").find( "*" ).each(function(index, elem){
    

    var $this = $(this);//caching for perf. opt.
    // alert($this.style.fontSize+ "class d");
   
    // alert($this.attr('class')+ "class i");
    var curr = $this.css("fontSize");//get the fontSize string
   
    if(curr != "" && curr != undefined && elem.style.fontSize != ""){//check if it exist
      curr = curr.replace(/px$/, "");//get rid of "px" in the string
    // alert(curr + "cur v");

      var float_curr = parseFloat(curr*valw);//convert string to float
      float_curr = float_curr;//actual incr
    // alert(float_curr + "cv");

      var new_val = "" + float_curr + "px";//back to string
    // alert(new_val + "nv");

      $this.css("fontSize", new_val);//set the fontSize string
    }
  });


  $(".contents").find( "*" ).each(function(index, elem){
    var $this = $(this);//caching for perf. opt.
    // alert($this.attr('class')+ "class i");

   
    var curr = $this.css("fontSize");//get the fontSize string
    // alert(curr + "cur");
    if(curr != "" && curr != undefined && elem.style.fontSize != ""){//check if it exist
      curr = curr.replace(/px$/, "");//get rid of "px" in the string
    // alert(curr + "cur v");

      var float_curr = parseFloat(curr*valw);//convert string to float
      float_curr = float_curr;//actual incr
    // alert(float_curr + "cv");

      var new_val = "" + float_curr + "px";//back to string
    // alert(new_val + "nv");

      $this.css("fontSize", new_val);//set the fontSize string
    }
  });
}




 
</script>















