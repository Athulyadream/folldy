
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.28.0/css/jquery.fileupload.css" rel="stylesheet"/>
        <link rel="stylesheet" href="<?=base_url()?>assets/css/jquery-confirm.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="<?php echo base_url();?>assets/js/jquery-confirm.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  

  



    <!-- Dashboard Core -->
    <link href="<?=base_url()?>assets/css/dashboard.css" rel="stylesheet" />
 
 
    <link rel="stylesheet" type='text/css' media='all' href="<?=base_url()?>static/css/webslides.css">

  

    

  </head>
  <body>
 



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

.practice a{
  text-decoration: none;
  color: #000 !important;
}
 .hover-item:hover {
        cursor: pointer;
      }
.circle{
    
    height: calc(68vh - 25vmax);
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
<input type="hidden" name="width"  id="width" > 
<input type="hidden" name="height"  id="height" > 


<?php












function nested($id){
  foreach ($id as $value) { 

if(!empty($value['image']) || !empty($value['sub']) || $value['content'] !=""){
$pvalue = 1;
$hvalue = 1;
    ?> 

    <section class="<?=$value['topic_id']?>" data-parent="<?=$value['topic_parent']?>">
          <!--.wrap = container (width: 90%) -->
          <span class="background " style="background-image:url('<?php echo base_url().'uploads/background/'.$value['backgroundimage']?>'); background-color:<?=$value["backgroundcolor"]?>;"></span>
          <div class="wrap size-100  ">

    

             <!-- <div class="ppage " id="ppage" > -->
                    <div class=" topics">
                      <?php

                   
                      if($value['position_top']!=0){
                         $topc = ($value['position_top']*$hvalue);
                        $topc = $topc."px";
                      }else{
                        $topc = 0;
                      }
                       if($value['position_left']!=0){
                      $leftc = ($value['position_left']*$pvalue);
                        $leftc = $leftc."px";
                      }else{
                        $leftc = 0;
                      }
 
                       //   $topc = $value['position_top']."px";
                       // $leftc = $value['position_left']."px";
                       foreach ($value['sub'] as $tpcs) {

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
                       //  $top = $tpcs['topic_position_top']."px";
                       // $left = $tpcs['topic_position_left']."px";
                          if($tpcs['practice_id']!=0 && $tpcs['practice_type']==1 ){
                        echo '<a href="'.base_url().'view-details/'.$tpcs['practice_id'].'" target="_blank">';
                      }
                                  echo '<div class="circle plus pos ';
                                  if(!empty($tpcs['sub'])){
                                    echo 'hover-item';
                                  }else{
                                    echo ' last-child';
                                  }
                                  echo'" id="ci'.$tpcs['topic_id'].'" data-id="'.$tpcs['topic_id'].'" style="background-color:'.$tpcs['topic_backgroundcolor'].'; color:'.$tpcs['topic_color'].';  top:'.$top.'; left:'.$left.';   background-image:url('.$tpcs["topic_backgroundimage"].'); position:absolute;font-size:'.$font.'; height:'.$topic_height.';width:'.$topic_width.';  " > <div class="tcontent post" id="t'.$tpcs['topic_id'].'" style="top:'.$ttop.';left:'.$tleft.'; position:absolute;">'.$tpcs['topic_title'].'</div></div>';
                                } 
  if($tpcs['practice_id']!=0 && $tpcs['practice_type']==1 ){
                        echo '<a/>';
                      }

                                ?>



                                <?php


if($value['image']){
 foreach ($value['image'] as $img) {

                                 if($img['image_position_left'] != ""){
                                      $lefti = ($img['image_position_left']*$pvalue);
                                  }else{
                                      $lefti = (250*$pvalue);
                                  }

                                  if($img['image_position_top'] != ""){
                                      $topi = ($img['image_position_top']*$hvalue);
                                  }else{
                                      $topi = (250*$pvalue);
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
                    <div class=" contents pos" id="cc<?=$value['topic_id']?>" style="  left: <?=$leftc?>; top: <?=$topc?> ; position:absolute; height:<?=$value["content_height"]?>px; width:<?=$value["content_width"]?>px;">
                          <?= $value['content'] ?>
                    </div>
                <!-- </div> -->


            <!-- .end .content-right -->
          </div>
          <!-- .end .wrap -->
        </section>
    <?php }
    if(!empty($value['sub'])){
          nested($value['sub']);
        }
  }
}

?>
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
  <span class="background fl" onclick="return goToSlideId('section-1')" style="background-image:url('<?=base_url()?>static/images/playbutton.jpg')"></span>
  <div class="wrap size-100  " style="position: absolute;
    top: 1%;
    left: 12%; color: #fff;"> <h5><?php echo $presentation_name; ?></h5></div>

  
</section>
<!-- <section class="bg-apple aligncenter slide current" id="section-1" style="">
          <div class="wrap">
            <h1><img  id="btnFullscreen" onClick="goToSlideId('section-1')" src="<?=base_url()?>static/images/logos/apple.svg" style="width:100px;height: 100px;" alt="Apple Logo"></h1>
          </div>
        </section> -->





        <?php 
        if($topics!=false){
if(!empty($topics['image']) || !empty($topics['sub']) || $topics['content'] !=""){
          ?>
        <section class="<?=$topics['topic_id']?>" >
          <!--.wrap = container (width: 90%) -->
                    <span class="background " style="background-image:url('<?php echo base_url().'uploads/background/'.$topics['backgroundimage']?>'); background-color:<?=$topics["backgroundcolor"]?>;"  ></span>
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
                        echo '<a href="'.base_url().'view-details/'.$tpcs['practice_id'].'" target="_blank">';
                      }
                                                   
                                  echo '<div class="circle plus pos ';
                                  if(!empty($tpcs['sub'])){
                                    echo 'hover-item';
                                  }else{
                                    echo ' last-child';
                                  }
                                  echo'" id="ci'.$tpcs['topic_id'].'"  data-id="'.$tpcs['topic_id'].'" style="background-color:'.$tpcs['topic_backgroundcolor'].'; color:'.$tpcs['topic_color'].';  top:'.$top.'; left:'.$left.';   background-image:url('.$tpcs["topic_backgroundimage"].'); position:absolute;font-size:'.$font.'; height:'.$topic_height.';width:'.$topic_width.';  " > <div class="tcontent post" id="t'.$tpcs['topic_id'].'" style="top:'.$ttop.';left:'.$tleft.';position:absolute;">'.$tpcs['topic_title'].'</div></div>';
                                } 



                                  if($tpcs['practice_id']!=0 && $tpcs['practice_type']==1 ){
                        echo '<a/>';
                      }?>


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
                    <div class=" contents pos" id="cc<?=$topics['topic_id']?>" style="  left: <?=$leftc?> ; top: <?=$topc?> ; position:absolute; height:<?=$topics["content_height"]?>px; width:<?=$topics["content_width"]?>px;" >
                          <?= $topics['content'] ?>
                    </div>
                <!-- </div> -->


            <!-- .end .content-right -->
          </div>
          <!-- .end .wrap -->
        </section>


<?php }} foreach($topics['sub'] as $subtop ) {

if(!empty($subtop['image']) || !empty($subtop['sub']) || $subtop['content'] !=""){


  ?>
     <!--    echo $subtop['topic_title']."jjjjjjjjjjjjjjjjj"; -->


         <section  class="<?=$subtop['topic_id']?>" data-parent="<?=$subtop['topic_parent']?>">
          <!--.wrap = container (width: 90%) -->

          <span class="background " style="background-image:url('<?php echo base_url().'uploads/background/'.$subtop['backgroundimage']?>'); background-color:<?=$subtop["backgroundcolor"]?>;"></span>
          <div class="wrap size-100  ">
    

             <!-- <div class="ppage content" id="ppage" > -->
                    <div class=" topics">
                      <?php 

                      if($subtop['position_top']!=0){
                         $topc = ($subtop['position_top']*$hvalue);
                        $topc = $topc."px";
                      }else{
                        $topc = 0;
                      }
                       if($subtop['position_left']!=0){
                      $leftc = ($subtop['position_left']*$pvalue);
                        $leftc = $leftc."px";
                      }else{
                        $leftc = 0;
                      }
                      
                       //   $topc = $subtop['position_top']."px";
                       // $leftc = $subtop['position_left']."px";
                      

                     




                      foreach ($subtop['sub'] as $tpcs) {
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
                      // $top = $tpcs['topic_position_top']."px";
                      //  $left = $tpcs['topic_position_left']."px";
                          if($tpcs['practice_id']!=0 && $tpcs['practice_type']==1 ){
                        echo '<a href="'.base_url().'view-details/'.$tpcs['practice_id'].'" target="_blank">';
                      }

                                  echo '<div class="circle plus pos  ';
                                  if(!empty($tpcs['sub'])){
                                    echo 'hover-item';
                                  }else{
                                    echo ' last-child';
                                  }
                                  echo'" id="ci'.$tpcs['topic_id'].'"  data-id="'.$tpcs['topic_id'].'" style="background-color:'.$tpcs['topic_backgroundcolor'].'; color:'.$tpcs['topic_color'].';  top:'.$top.'; left:'.$left.';   background-image:url('.$tpcs["topic_backgroundimage"].'); position:absolute;font-size:'.$font.'; height:'.$topic_height.';width:'.$topic_width.';  " > <div class="tcontent post" id="t'.$tpcs['topic_id'].'" style="top:'.$ttop.';left:'.$tleft.';position:absolute;">'.$tpcs['topic_title'].'</div></div>';
                                } 
  if($tpcs['practice_id']!=0 && $tpcs['practice_type']==1 ){
                        echo '<a/>';
                      }


                                ?>

                                <?php


if($subtop['image']){
 foreach ($subtop['image'] as $img) {

                                  if($img['image_position_left'] != ""){
                                      $lefti = $img['image_position_left']*$pvalue;
                                  }else{
                                      $lefti = 250;
                                  }

                                  if($img['image_position_top'] != ""){
                                      $topi = $img['image_position_top']*$hvalue;
                                  }else{
                                      $topi = 250;
                                  }

                                  echo '<div class="timage pos" id="im'.$img["image_id"].'" data-id="'.$img["image_id"].'"   style=" position:absolute;top:'.$topi.'px;left:'.$lefti.'px;background-image:url('.base_url().'uploads/chapter/'.$img["image"].'); height:'.$img["image_height"].'px;width:'.$img["image_width"].'px; "></div>';
                                } }?>
                    </div>
                    <div class=" contents pos" id="cc<?=$subtop['topic_id']?>" style="  left: <?=$leftc?> ; top: <?=$topc?> ; position:absolute; height:<?=$subtop["content_height"]?>px; width:<?=$subtop["content_width"]?>px;">


                          <?= $subtop['content'] ?>
                    </div>
                <!-- </div> -->



            <!-- .end .content-right -->
          </div>
          <!-- .end .wrap -->
        </section>



  <?php 
}//if data empty checking end
  if(!empty($subtop['sub'])){
          nested($subtop['sub']);
  }
}
?>




        






      </article>
      <!-- end article -->
    </main>
















  


<!-- Presentation table -->


<!-- Modal -->





<!-- Modal content -->



<!-- Modal Head -->

 <script src="https://cdn.tiny.cloud/1/jrsjj47h3k9y6272lmftp2j56agyzl6a86u1fvt8n8bzbxvw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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

  window.open('fullscreen=yes,titlebar=no');

    // $('p span').each(function() {
    //    var size = $(this).css("font-size");
    //    var val = "<?=$pvalue?>";
    //    var fsize = parseFloat(size)*parseFloat(val);
    //    $(this).css('font-size',fsize);
      
    // });
    //  $("p").each(function() {
    //    var size = $(this).css("font-size");
    //    var val = "<?=$pvalue?>";
    //    var fsize = parseFloat(size)*parseFloat(val);
    //    $(this).css('font-size',fsize);
      
    // });
 });

</script>
    <!-- OPTIONAL - svg-icons.js (fontastic.me - Font Awesome as svg icons) -->
    <!-- <script defer src="<?=base_url()?>static/js/svg-icons.js"></script> -->
  
    <script type="text/javascript">
       $(document).on('click','.plus',function(e){

          did = $(this).attr('data-id');
          // alert(did);
        if ($(this).hasClass('last-child')){
        // alert('dd');  /* missing . before removeClass */
          did = $('.current').attr('data-parent');
         // alert(did);

        // var pid =  $(this).closest('section').attr('id');
        // alert(section);

        }
          section = $("."+did).attr('id');

        // var pid =  $(this).closest('section').attr('id');
        // alert(section);
        goToSlide(section);
    // var tid = $(this).attr('data-id');
    // var tparentid = $("#topic_id").val();
    // window.location.href = base_url+'presentation-slide-view/'+tid;
  })

      
$(document).on('click','#previous',function(e){
        
        did = $('.current').attr('data-parent');
         // alert(did);
        section = $("."+did).attr('id');

        // var pid =  $(this).closest('section').attr('id');
        // alert(section);
        goToSlide(section);
    // var tid = $(this).attr('data-id');
    // var tparentid = $("#topic_id").val();
    // window.location.href = base_url+'presentation-slide-view/'+tid;
  })
</script>


    <script type="text/javascript">
      $(document).ready(function(){
          $('#navigation').append(' <img  id="btnFullscreen" src="<?=base_url()?>uploads/full-screen.png" style="width:15%;">');
          // var height =$(window.top).height();
          // var width =$(window.top).width();
           var height = $(window).height();
      var width =$(window).width();
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
        console.log(height+' '+width+"fullres"+' '+pval);
      }
     // alert('h');
      var height = $(window).height();
      var width =$(window).width();
      $("#height").val(height);
      $("#width").val(width);
      size(height,width);
       // size(height,width);

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
      $(".circle").each(function() {
       

         var hei = $(this).height();
         var fheight = parseFloat(hei)*parseFloat(valh);
         $(this).css('height',fheight);
         var widths = $(this).width();
         var fwidth = parseFloat(widths)*parseFloat(valw);
         $(this).css('width',fwidth);

    
        
 var tsizes = $(this).find('.tcontent p').css("font-size");
        var ftsizes = parseFloat(tsizes)*parseFloat(valw);
        $(this).find('.tcontent p').css('font-size',ftsizes);

         var tsizes = $(this).find('.tcontent span').css("font-size");
        var ftsizes = parseFloat(tsizes)*parseFloat(valw);
        $(this).find('.tcontent span').css('font-size',ftsizes);
       
  
    });

    
 // $(".tcontent").each(function() {
 //    var tsizes = $(this).css("font-size");
 //        var ftsizes = parseFloat(tsizes)*parseFloat(valw);
 //        $(this).css('font-size',ftsizes);
 // });


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

       var size = $(this).find('span').css("font-size");
       var fsize = parseFloat(size)*parseFloat(valw);
       $(this).find('span').css('font-size',fsize);
     
       var size = $(this).find('p').css("font-size");
       var fsize = parseFloat(size)*parseFloat(valw);
       $(this).find('p').css('font-size',fsize);
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

      
       // var hei = $(this).height();
       // var fheight = (parseFloat(hei)/parseFloat(valh))+tc;
       $(this).css('height',ch);

       // var widths = $(this).width();
       // var fwidth = (parseFloat(widths)/parseFloat(valw))+rc;
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
      $(".circle").each(function() {
    
       

       var hei = $(this).height();
       var fheight = parseFloat(hei)/parseFloat(valh);
       $(this).css('height',fheight);

       var widths = $(this).width();
       var fwidth = parseFloat(widths)/parseFloat(valw);
       $(this).css('width',fwidth);

      
        // var tsizes = $(this).find('.tcontent p').css("font-size");
        // var ftsizes = parseFloat(tsizes)/parseFloat(valw);
        // $(this).find('.tcontent p').css('font-size',ftsizes);
var tsizes = $(this).find('.tcontent p').css("font-size");
        var ftsizes = parseFloat(tsizes)/parseFloat(valw);
        $(this).find('.tcontent p').css('font-size',ftsizes);

         var tsizes = $(this).find('.tcontent span').css("font-size");
        var ftsizes = parseFloat(tsizes)/parseFloat(valw);
        $(this).find('.tcontent span').css('font-size',ftsizes);

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

       var size = $(this).find('span').css("font-size");
       var fsize = parseFloat(size)/parseFloat(valw);
       $(this).find('span').css('font-size',fsize);

       var size = $(this).find('p').css("font-size");
       var fsize = parseFloat(size)/parseFloat(valw);
       $(this).find('p').css('font-size',fsize);
      
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





function toggleFullscreen(elem) {
  // $("#pval").val('0');

 
    if (!document.fullscreenElement) {
      document.documentElement.requestFullscreen();
     
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen(); 
      
    }
  }

}

$(document).on('click','#btnFullscreen',function(e){
   
  toggleFullscreen();
 
});



$(document).on('click','.fl',function(e){
  toggleFullscreen();
  
});



document.addEventListener('fullscreenchange', (event) => {
  // document.fullscreenElement will point to the element that
  // is in fullscreen mode if there is one. If there isn't one,
  // the value of the property is null.
  if (document.fullscreenElement) {
      pval = $("#pval").val();
      // console.log(pval);
      ppval = pval+1;
      $("#pval").val(ppval);
      if (pval >1) {
        var height = $("#height").val();
        var width = $("#width").val();
        resize(height,width);
        console.log(height+' '+width+"fullres"+' '+pval);
      }
     // alert('h');
      var height = $(window).height();
      var width =$(window).width();
      $("#height").val(height);
      $("#width").val(width);
      size(height,width);

  } else {

        var height = $("#height").val();
        var width = $("#width").val();
        resize(height,width);
        // console.log(height+' '+width+"exres"+' '+pval);

      
     var height = $(window).height();
      var width =$(window).width();
      $("#height").val(height);
      $("#width").val(width);
      size(height,width);

      vvl = width/height;

      if(vvl != 1.7){
         cwidth = height*1.7;
         wvl = width-cwidth;

      }
    // console.log(`Element: ${document.fullscreenElement.id} entered full-screen mode.`);
     // console.log(cwidth+' '+width+' '+wvl+' evntfull');
     // console.log(height+' '+width+' evntex');

  }
});






 
</script>















