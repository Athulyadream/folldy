<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Colored  an Admin Panel Category Flat Bootstrap Responsive Website Template | Blank :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="<?=base_url()?>slide/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="<?=base_url()?>slide/css/font.css" type="text/css"/>
<link href="<?=base_url()?>slide/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="<?=base_url()?>slide/js/jquery2.0.3.min.js"></script>
<script src="<?=base_url()?>slide/js/modernizr.js"></script>
<script src="<?=base_url()?>slide/js/jquery.cookie.js"></script>
<script src="<?=base_url()?>slide/js/screenfull.js"></script>








    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.28.0/css/jquery.fileupload.css" rel="stylesheet"/>
        <link rel="stylesheet" href="<?=base_url()?>assets/css/jquery-confirm.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="<?php echo base_url();?>assets/js/jquery-confirm.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.31.0/js/vendor/jquery.ui.widget.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.31.0/js/vendor/jquery.ui.widget.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.fileupload.js"></script>

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

    <script>
    $(function () {
      $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

      if (!screenfull.enabled) {
        return false;
      }

      

      $('#toggle').click(function () {
        screenfull.toggle($('#container')[0]);
      }); 
    });
    </script>
    
</head>



<style type="text/css">
  .buttons {
    font-family: 'Roboto', sans-serif;
    font-size:11px; color: #354052;
    background: rgb(236,239,244);
background: linear-gradient(0deg, rgba(236,239,244,1) 0%, rgba(255,255,255,1) 100%);
    border: 1px solid #ced0da;
    border-radius: 3px; -webkit-border-radius: 3px;
    -moz-border-radius: 3px; outline: none;    
}
.buttons:hover {
    background: #e2f1ff;
}
</style>
<body class="dashboard-page">

  <nav class="main-menu">
    <ul>
      <li>
        <a href="javascript:;">
          <i class="fa fa-slideshare nav_icon"></i>
          <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
        </a>
        <ul>
          <li>










          <div class="card" style="height: 600px; width: 280px; overflow-x: scroll;background-color: rgba(70,80,100,0.8);">
          <div class="card-header">
            <?php if($presentation_topic['topic_parent'] >0){ ?>
              <a href="<?=base_url()?>presentation-slide/<?=$presentation_topic['topic_parent']?>" id="" class="btn btn-primary-outline"><i class="fa fa-chevron-left" aria-hidden="true"></i></a> 
            <?php }else{?>
                <a href="<?=base_url()?>presentation-slide-pre/<?=$presentation_topic['topic_presentation_id']?>" id="" class="btn btn-primary-outline"><i class="fa fa-chevron-left" aria-hidden="true"></i></a> 

             <?php } ?>
            <h3 class="card-title"> Slide</h3>
            <?php
              if($this->session->userdata('create')){
            ?>
          
            <?php
              }
            ?>
          </div>
          <div class="card-body" id="card-newslide">


            <div class="row " >


              
              <div class="col-md-12 col-lg-12">
              
                <div class="row slidenew <?= $presentation_topic['topic_id'] ?>" data-id="<?= $presentation_topic['topic_id'] ?>" class=" " id="" style="border: 1px solid #a7a5a5; height:50px;width: 100px;  background-image:url('<?php echo base_url().'uploads/background/'.$presentation_topic['backgroundimage']?>');
    background-size: contain ; background-size: 100%;
    background-position: center;
    background-repeat: no-repeat;
    border: 1px solid #ced0da;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    outline: none;">
                
                 


    <span class="resume_create_up_link no_print">
        <span class="spacer"></span>
        <a href="javascript:void(0)" data-id="<?= $presentation_topic['topic_id'] ?>" id="delete" class="delete-topic">
            <icon class="fa fa-trash icon_size24"></icon>
        </a>
         <a href="javascript:void(0)" class="plus" data-id="<?= $presentation_topic['topic_id'] ?>">
            <icon class="fa fa-plus icon_size24"></icon>
        </a>
       
    </span>



                </div>
                 <span class="tspan"><?php echo $presentation_topic['topic_title'] ?></span>
                 <br/> <br/>
             
       <?php 
          if(!empty($presentation_topic)){
            // print_r($presentation_topic['slide']);
            foreach($presentation_topic['topics']  as $slide){?>

           
               
                <div class="row slidenew <?= $slide['topic_id'] ?>" data-id="<?= $slide['topic_id'] ?>" class=" " id="" style="border: 1px solid #a7a5a5; height:50px;width: 100px;  background-image:url('<?php echo base_url().'uploads/background/'.$slide['backgroundimage']?>');
    background-size: contain ; background-size: 100%;
    background-position: center;
    background-repeat: no-repeat;  /*background: linear-gradient(0deg, rgba(236,239,244,1) 0%, rgba(255,255,255,1) 100%);*/
    border: 1px solid #ced0da;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    outline: none;">



<span class="resume_create_up_link no_print">
        <span class="spacer"></span>
        <a href="javascript:void(0)" data-id="<?= $slide['topic_id'] ?>" id="delete" class="delete-topic">
            <icon class="fa fa-trash icon_size24"></icon>
        </a>
        <a href="javascript:void(0)" class="plus" data-id="<?= $slide['topic_id'] ?>">
            <icon class="fa fa-plus icon_size24"></icon>
        </a>
    </span>



          





                </div>
                 <span class="tspan"><?php echo $slide['topic_title'] ?></span>
                  <br/> <br/>
             
         
             <?php }
           } ?>
            </div>
            </div>
          
          </div>
  </div >














          </li>
         
        </ul>
      </li>
      <li class="has-subnav">
        <a href="javascript:;">
        <i class="fa fa-folder-open-o nav_icon" aria-hidden="true"></i>
     
        <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
        </a>
        <ul>
          <li>









                   <div class="container folderdiv" >
                    
                    <div class="row" style="overflow-x: scroll;">


                     <?php
$path = './uploads/background/';

$dirs = array();

// directory handle
$dir = dir($path);
?>
                        
                        <div class="col-md-12"   data-toggle="modal" data-target="#modalFolder"><i class="fa fa-plus"></i><span class="tlabel">New Folder</span></div>

                        <?php
while (false !== ($entry = $dir->read())) {
    if ($entry != '.' && $entry != '..') {
       if (is_dir($path . '/' .$entry)) {
            $dirs[] = $entry; ?>
<!-- <button class="tablinks" onclick="openCity(event,'<?=$entry?>')"><?=$entry?></button> -->
  <div class="col-md-6"  onclick="return hideshow('<?=$entry?>');"><img src="<?=base_url()?>uploads/background/pictures-folder.png" style=" width:150px; height:100px;"> 
      <!-- <icon class="fa fa-trash icon_size24 btnrem"></icon> -->
   
<span class="tlabel"> <?=$entry?></span>
</div>
     <?php  }
    }
}
?>




                      
                    </div>
                </div>
               










                   <?php
$path = './uploads/background/';

$dirs = array();

// directory handle
$dir = dir($path);

while (false !== ($entry = $dir->read())) {
    if ($entry != '.' && $entry != '..') {
       if (is_dir($path . '/' .$entry)) {
            $dirs[] = $entry; 
?>




<div class="container imagefolderdiv <?=$entry?>" style="display: none;">
                    
                    <div class="row">

                        
        <div class="col-md-12">      <a href="javascript:;" onclick="return back();" id="" class="btn btn-primary-outline"><i class="fa fa-chevron-left" aria-hidden="true"></i></a><h3></h3> <?=$entry?> Folders</div>        

                       
<!-- <button class="tablinks" onclick="openCity(event,'<?=$entry?>')"><?=$entry?></button> -->
<div class="col-md-6" onclick="return hideshowimage('<?=$entry?>background',0);"><img src="<?=base_url()?>uploads/background/pictures-folder.png"  style=" width:150px; height:100px;"><span class="tlabel"> Background</span></div>
    
<div class="col-md-6" onclick="return hideshowimage('<?=$entry?>elements',1);"><img src="<?=base_url()?>uploads/background/pictures-folder.png"  style=" width:150px; height:100px;"><span class="tlabel"> Elements</span></div>


                    </div>
                </div>


<?php }}} ?>












                   <?php
$path = './uploads/background/';

$dirs = array();

// directory handle
$dir = dir($path);

while (false !== ($entry = $dir->read())) {
    if ($entry != '.' && $entry != '..') {
       if (is_dir($path . '/' .$entry)) {
            $dirs[] = $entry; 
?>

<div class="container imagediv <?=$entry?>background" style="display: none;">
                    
                    <div class="row">
  
   <div class="col-md-12">      <a href="javascript:;" onclick="return backfolder('<?=$entry?>');" id="" class="btn btn-primary-outline"><i class="fa fa-chevron-left" aria-hidden="true"></i></a><h3></h3> <?=$entry?> Background Images</div>                        
                       
<div class="col-md-12"><input type="file" class="style image" data-id="<?php echo $entry; ?>/background"  name="image" id="image"></div>


  <?php
   $directory = "./uploads/background/".$entry."/background";
    $files = glob($directory . "/*.*");
     // print_r($directory);
    if(!empty($files)){
     foreach($files as $image)
    
{
        // $image = $files[$i];
        $supported_file = array(
                'gif',
                'jpg',
                'jpeg',
                'png'
         );

         $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
         if (in_array($ext, $supported_file)) {
            // echo basename($image)."<br />"; // show only image name if you want to show full path then use this code // echo $image."<br />";
            ?>                     
<!-- <button class="tablinks" onclick="openCity(event,'<?=$entry?>')"><?=$entry?></button> -->
<div class="col-md-6"><img src="<?=base_url().$image ?>"
              onclick = "addImage('<?=$entry?>/background/<?=basename($image)?>')" 
             
              alt="Random image" style=" width:150px; height:70px;" style="
    padding: 1%;
"/><span class="tlabel"> </span></div>
   

<?php } else {
               continue;
            }
          }
        } ?>

                      
                       


                    </div>
                </div>












                <div class="container imagediv <?=$entry?>elements" style="display: none;">
                    
                    <div class="row">


                        <div class="col-md-12">      <a href="javascript:;" onclick="return backfolder('<?=$entry?>');" id="" class="btn btn-primary-outline"><i class="fa fa-chevron-left" aria-hidden="true"></i></a><h3></h3> <?=$entry?> Elements Images</div>   
  
<div class="col-md-12"><input type="file" class="style imageele" data-id="<?php echo $entry; ?>/elements"  name="imageele" id="imageele"></div>

  <?php
   $directory = "./uploads/background/".$entry."/elements";
    $files = glob($directory . "/*.*");
     // print_r($directory);
    if(!empty($files)){
      $i = 0;
     foreach($files as $image)
    
{
        // $image = $files[$i];
        $supported_file = array(
                'gif',
                'jpg',
                'jpeg',
                'png'
         );

         $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
         if (in_array($ext, $supported_file)) {
            // echo basename($image)."<br />"; // show only image name if you want to show full path then use this code // echo $image."<br />";
            ?>                     
<!-- <button class="tablinks" onclick="openCity(event,'<?=$entry?>')"><?=$entry?></button> -->
<div class="col-md-6"><img src="<?=base_url().$image ?>" style=" width:150px; height:70px;" class="<?=$entry.$i?>"
               onclick = "addImagetopic('<?=$entry?>/elements/<?=basename($image)?>','<?=$entry.$i?>')" 
             
              alt="Random image" style="
    padding: 1%;
"/><span class="tlabel"> </span></div>
   

<?php } else {
               continue;
            }
            $i++;
          }
        } ?>

                      


                    </div>
                </div>


<?php }}} ?>










          </li>
        
        </ul>
      </li>

      <!-- images -->
      <li class="has-subnav">
        <a href="javascript:;">

        <i class="fa fa-file-image-o nav_icon"></i>
       
        <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
        </a>
        <ul>
          <li>






                <div class="container imagegallery" >
                    
                    <div class="row">


                       
  
<div class="col-md-12"><input type="file" class="style imageele" data-id="imagegallery"  name="imageele" id="imageele"></div>

  <?php
   $directory = "./uploads/imagegallery";
    $files = glob($directory . "/*.*");
     // print_r($directory);
    if(!empty($files)){
      $i = 0;
     foreach($files as $image)
    
{
        // $image = $files[$i];
        $supported_file = array(
                'gif',
                'jpg',
                'jpeg',
                'png'
         );

         $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
         if (in_array($ext, $supported_file)) {
            // echo basename($image)."<br />"; // show only image name if you want to show full path then use this code // echo $image."<br />";
            ?>                     
<!-- <button class="tablinks" onclick="openCity(event,'<?=$entry?>')"><?=$entry?></button> -->
<div class="col-md-6"><img src="<?=base_url().$image ?>" class="imagegallery<?=$i?>"
               onclick = "addImagegallery('imagegallery','imagegallery<?=$i?>')" 
             
              alt="Random image" style="
    padding: 1%;
"/><span class="tlabel"> </span></div>
   

<?php } else {
               continue;
            }
            $i++;
          }
        } ?>

                      


                    </div>
                </div>






          </li>
         
        </ul>
      </li>

      <!-- presentation -->
      <li class="has-subnav">
        <a href="javascript:;">
          <i class="fa fa-file-text-o nav_icon"></i>
            
          <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
        </a>
        <ul>
          <li>
            <a class="subnav-text" href="gallery.html">
              Image Gallery
            </a>
          </li>
         
        </ul>
      </li>

<!-- questions -->
      <li>
        <a href="javascript:;">
          <i class="fa fa-question nav_icon"></i>
          
        </a>
      </li>

      <!-- styles -->
      <li>
        <a href="javascript:;">
          <i class="icon-font nav-icon"></i>
          
        </a>
        <ul>
          <li>
            <div class="card" style="height: 600px; width: 280px; overflow-x: scroll; background-color: rgba(70,80,100,0.8);">
          <div class="card-header">
            
            <h3 class="card-title"> Topic Styles</h3>
           
          </div>
          <div class="card-body" id="card-newslide">


            <div class="row " >


              
              <div class="col-md-12 col-lg-12">

                      <label  class="form-label tlabel">Background color</label> 
                    <input type="color" name="bgcolor" id="bgcolor" class="styletopic buttons tstyle" data-attr="backgroundcolor" style="" value="#eceff4" data-id="" placeholder="Enter background color"> 

                     <label  class="form-label tlabel">Topic Title</label> 
                    <input type="text" name="topic_title" id="topic_title" class="buttons tstyle styletopic" data-attr="topic_title" style="" value=" <?= $presentation_topic['topic_title'] ?>" data-id="" placeholder="Enter topic title">  
                      

                      <label  class="form-label tlabel">Topic Font color</label> 
                      <input type="color" name="topiccolor"  id="topiccolor" class="styletopic buttons tstyle" data-attr="topic_color" style="" value="#eceff4" data-id="" placeholder="Enter topic font color"  >

                  <!--   <label  class="form-label tlabel">Topic Border Color</label> 
                    <input type="color" name="topic_bordercolor" id="topic_bordercolor" class="buttons tstyle styletopic" data-attr="topic_bordercolor" style="" value="#eceff4" data-id="" placeholder="Enter topic border color"> 

 -->
                     <label  class="form-label tlabel">Topic Background color</label> 
                    <input type="color" name="topic_bgcolor" id="topic_bgcolor" class="buttons tstyle styletopic" data-attr="topic_backgroundcolor" style="" value="#eceff4" data-id="" placeholder="Enter background color"> 

                      <label  class="form-label tlabel">Topic font size</label> 
                    <input type="number" name="topic_fontsize" id="topic_fontsize" class="buttons tstyle styletopic" data-attr="topic_fontsize" style="" value="" data-id="" placeholder="Enter font size"> 

                      <label  class="form-label tlabel">Topic height</label> 
                    <input type="number" name="topic_height" id="topic_height" class="buttons tstyle styletopic" data-attr="topic_height" style="" value="" data-id="" placeholder="Enter height "> 

                     <label  class="form-label tlabel">Topic Width</label> 
                    <input type="number" name="topic_width" id="topic_width" class="buttons tstyle styletopic" data-attr="topic_width" style="" value="" data-id="" placeholder="Enter height "> 
</div></div></div></div>
                   
          </li>
        </ul>
      </li>

      <!-- topic add -->
      <li>
        <a href="javascript:;" onclick="addtopic()" data-target="#exampleModalhead" title="Topic Add">
          <i class="fa fa-plus-square-o nav-icon"></i>
         
        </a>
      </li>


      <!-- content add -->
      <li>
        <a href="javascript:;" title="Content Add"  data-toggle="modal" data-target="#exampleModalcontent">
          <i class="fa fa-text-width nav-icon" aria-hidden="true"></i>
         
        </a>
      </li>


      <li>
        <a href="<?=base_url()?>/presentation-slide-view/<?=$presentation_topic['topic_id']?>" class="btn btn-primary-outline" target="_blank"  title="Present">
          <i class="fa fa-eye nav-icon" aria-hidden="true"></i>
          
        </a>
      </li>
      <!-- <li class="has-subnav">
        <a href="javascript:;">
          <i class="fa fa-list-ul" aria-hidden="true"></i>
         
          <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
        </a>
        <ul>
          <li>
            <a class="subnav-text" href="faq.html">FAQ</a>
          </li>
          <li>
            <a class="subnav-text" href="blank.html">Blank Page</a>
          </li>
        </ul>
      </li> -->
    </ul>
   <!--  <ul class="logout">
      <li>
      <a href="login.html">
      <i class="icon-off nav-icon"></i>
     
      </a>
      </li>
    </ul> -->
  </nav>

<style>

 .btnrem {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #555;
  color: white;
  font-size: 5px;
  padding: 1px 2px;
  border: none;
  cursor: pointer;
  border-radius: 2px;
  text-align: center;
}

.btnrem:hover {
  background-color: black;
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


.primary-footer {
  padding: 24px 0;
  color: #898989;
  font-size: 14px;
  text-align: center;
}





/**
 * Circle Styles
 */

.circle{
    
    /*height: calc(68vh - 25vmax);*/
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
/*.circle h3{
  position:absolute;
  top:50%; left:50%;
  transform: translate(-50%, -50%);
  margin:0;
  text-align: center;
}*/



.contents{
    width: 50%;
    background-color: !important transparent;
    position: absolute; 
    left: <?=$presentation_topic['position_left']?>px ; 
    top: <?=$presentation_topic['position_top']?>px ;
}
.topics{
    width: 50%;

}

#ppage{
  border: 1px solid #a7a5a5; 
  height:500px;
  width:1000px;

  /*width: 770px;  */
  background-color: <?=$presentation_topic['backgroundcolor']?>;
  background-image:url('<?php echo base_url().'uploads/background/'.$presentation_topic['backgroundimage']?>');
  background-size: contain ; background-size: 100%;
  background-position: center;
  background-repeat: no-repeat;
}
.card-header {
  border-color: #ccc;
}
.pstyle .card{
  /*background-color: #293039;*/
  /*color: #fff; */
  margin-bottom:1px;
}
.fold{
  overflow: scroll;
}

.tstyle{
    width:100%;
    line-height: 24px;
    color: #354052;
    font-size: 10.5px;
}
.tlabel{
   width:100%;
    line-height: 24px;
    color: #fff;
    font-size: 10.5px;
}

.tspan{
   width:100%;
    line-height: 24px;
    color: #fff;
    font-size: 10.5px;
}
</style>


<input type="hidden" name="topic_id"  id="topic_id" value="<?= $topic_id?>"> 












  <section class="wrapper scrollable">


  <div class=" ppage content" id="ppage" >
       
                <?php 
                  if(!empty($presentation_topic)){
                    
                ?>
             <!--   topic_content_posiition_left
               topic_content_posiition_top -->
                    <div class="row topics">
                      <?php foreach ($presentation_topic['topics'] as $tpcs) {

                                  if($tpcs['topic_position_left'] != ""){
                                      $leftp = $tpcs['topic_position_left'];
                                  }else{
                                      $leftp = 150;
                                  }

                                  if($tpcs['topic_position_top'] != ""){
                                      $topp = $tpcs['topic_position_top'];
                                  }else{
                                      $topp = 150;
                                  }

                                  echo '<div class="circle  task" data-val="c'.$tpcs['topic_id'].'"  data-id="'.$tpcs['topic_id'].'" style="background-color:'.$tpcs['topic_backgroundcolor'].'; color:'.$tpcs['topic_color'].';  top:'.$topp.'px; left:'.$leftp.'px;   background-image:url('.base_url().'uploads/background/'.$tpcs["topic_backgroundimage"].'); position:absolute;font-size:'.$tpcs['topic_fontsize'].'px; height:'.$tpcs['topic_height'].'px;width:'.$tpcs['topic_width'].'px;  " > <p class="tcontent" data-val="p'.$tpcs['topic_id'].'" data-id="'.$tpcs['topic_id'].'"  style="top:'.$tpcs['topic_content_position_top'].'px; left:'.$tpcs['topic_content_position_left'].'px;">'.$tpcs['topic_title'].'</p><span class="resume_create_up_link no_print">
        <span class="spacer"></span>
        <a href="javascript:void(0)" data-id="'.$tpcs['topic_id'].'" id="delete" class="delete-topic">
            <icon class="fa fa-trash icon_size24"></icon>
        </a>
        <a href="javascript:void(0)" class="plus" data-id="'.$tpcs['topic_id'].'">
            <icon class="fa fa-plus icon_size24"></icon>
        </a>
    </span>


</div>';
                                } ?>
                    </div>
                    <div class="row contents" >
                          <?= $presentation_topic['heading'] ?>
                          <?= $presentation_topic['content'] ?>
                    </div>
                 <?php }
               // } ?>
        
          </div>







 
   
    <div class="main-grid">
      <div class="agile-grids"> 
        <!-- blank-page -->
      
       
      
        <!-- //blank-page -->
      </div>
    </div>
    
    <!-- footer -->
   <!--  <div class="footer">
    
    </div> -->
    <!-- //footer -->
  </section>



  <script src="<?=base_url()?>slide/js/bootstrap.js"></script>
  <script src="<?=base_url()?>slide/js/proton.js"></script>







<!-- Modal content -->
<div class="modal fade" id="exampleModalcontent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal Content</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
          <!-- <span aria-hidden="true">&times;</span> -->
        <!-- </button> -->
      </div>
      <div class="modal-body">
          <div class="form-group ">
                <label>Content</label>   
                <textarea name="contented" class="form-control" id="contented" cols="6" rows="5"></textarea>
          </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="createcontent();">Create</button>
      </div>
    </div>
  </div>
</div>

<!-- modalFolder
 -->

<!-- Modal content -->
<div class="modal fade" id="modalFolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal Content</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
          <!-- <span aria-hidden="true">&times;</span> -->
        <!-- </button> -->
      </div>
      <div class="modal-body">
          <div class="form-group ">
              <label>Folder Name</label>   
              <input type="text" name="folder" id="folder" class="form-control">
          </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="createFolder();">Create</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Head -->

 <script src="https://cdn.tiny.cloud/1/jrsjj47h3k9y6272lmftp2j56agyzl6a86u1fvt8n8bzbxvw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script type="text/javascript">
        var data = '<?php echo $presentation_topic['content']; ?>';

    tinymce.init({
  selector: 'textarea',
  plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
  imagetools_cors_hosts: ['picsum.photos'],
  menubar: 'file edit view insert format tools table help',
  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
  toolbar_sticky: true,
  autosave_ask_before_unload: true,
  autosave_interval: "30s",
  autosave_prefix: "{path}{query}-{id}-",
  autosave_restore_when_empty: false,
  autosave_retention: "2m",
  image_advtab: true,
  content_css: '//www.tiny.cloud/css/codepen.min.css',
  link_list: [
    { title: 'My page 1', value: 'http://www.tinymce.com' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_list: [
    { title: 'My page 1', value: 'http://www.tinymce.com' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_class_list: [
    { title: 'None', value: '' },
    { title: 'Some class', value: 'class-name' }
  ],
  importcss_append: true,
  height: 400,
  file_picker_callback: function (callback, value, meta) {
    /* Provide file and text for the link dialog */
    if (meta.filetype === 'file') {
      callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
    }

    /* Provide image and alt text for the image dialog */
    if (meta.filetype === 'image') {
      callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
    }

    /* Provide alternative source and posted for the media dialog */
    if (meta.filetype === 'media') {
      callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
    }
  },
  templates: [
        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
    { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
    { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
  ],
  template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
  template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
  height: 600,
  image_caption: true,
  quickbars_selection_toolbar: 'bold italic | quicklink h1 h2 h3 blockquote quickimage quicktable',
  noneditable_noneditable_class: "mceNonEditable",
  toolbar_mode: 'sliding',
  contextmenu: "link image imagetools table",
  setup: function (editor) {
        editor.on('init', function () {
            // var content = "<h1>SDADAD</h1>";
            // alert(content);
            // alert(data);
            editor.setContent(data);
        });
    }  
 });</script> 

  <script type="text/javascript">
    


  </script>

<script>
  $(document).ready(function(){
      $(".imagediv").hide();
       $(".imagefolderdiv").hide();

   });
  
  function back(){
    $('.folderdiv').show();
    $('.imagediv').hide();
    $('.imagefolderdiv').hide();
  }
  function backfolder(divcl){
    $('.folderdiv').hide();
    $('.imagediv').hide();
    $('.imagefolderdiv').hide();

    $('.'+divcl).show();

  }

  function hideshow(folder){
    $('.folderdiv').hide();
    $('.imagediv').hide();
     $('.imagefolderdiv').hide();
    
    $('.'+folder).show();
  }
  function hideshowimage(folder){
    $('.folderdiv').hide();
    $('.imagediv').hide();
     $('.imagefolderdiv').hide();
    
    $('.'+folder).show();
  }


function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}


function openCitys(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontents");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

 // $(document).on('click','.tablinks',function(e){
 //        $('.tablinks').hide();
 //        // $('.tabcontent').hide();

 //  });
 // $(document).on('click','.back',function(e){
 //        $('.tabs').show();
 //        $('.tabcontent').hide();
 //  });

   // $(document).ready(function(){
   //         var content = "kkkkkkk";
   //        tinymce.get('contentHead').setContent(content);
         
            
   //      });
</script>

<script type="text/javascript">  
    var base_url =  '<?php echo base_url() ?>';
          
        function addImage(imge) { 
           

          var baseurlim = '<?php echo base_url() ?>uploads/background/';
           
            var sid = $("#topic_id").val();
            
            $.ajax({

                url: base_url+"add-image",
                type: "POST",
                data:{image:imge,topic_id:sid} ,
            
                success: function(out){
                   out = JSON.parse(out);
                        if(out.status == 1){
                       // window.location.reload();
                         $("."+sid).css("background-image", "url(" + baseurlim+imge + ")");
                         $("#ppage").css("background-image", "url(" + baseurlim+imge + ")");
                         $("#ppage").css("background-size", "100%");
                         $("#ppage").css("background-position", "center");
                         $("#ppage").css("background-repeat", "no-repeat");
                             // $(".bimage").css("background-image", out.data);
                                   
                        }
           

                    console.log(out.data);
                }
            });

            

        }  
        function addImagetopic(imge,cl) { 
           height =$('.'+cl).height();
           width =$('.'+cl).width();
          
    //        var i = new Image();
    // i.src = imge.src;
    // var height = i.height;
    // var width = i.width;
    // alert(document.getElementById("myImg").width);
    // alert(width);
          var baseurlim = '<?php echo base_url() ?>uploads/background/';
           


            var sid = $("#topic_id").val();
            var tid = $("#tid").val();
            // alert(tid);
            if(tid == sid){
                 $.ajax({

                      url: base_url+"add-topicimage",
                      type: "POST",
                      data:{image:imge,height:height,width:width,topic_parent_id:sid} ,
                  
                      success: function(out){
                         out = JSON.parse(out);

                              if(out.status == 1){
                                getContents();
                                   // $(".bimage").css("background-image", out.data);
                                         
                              }
                 

                          console.log(out.data);
                      }
                  });         
            }else{
              $.ajax({

                url: base_url+"add-image-topic",
                type: "POST",
                data:{image:imge,topic_id:tid} ,
            
                success: function(out){
                   out = JSON.parse(out);

                        if(out.status == 1){
                           getContents();
                         // $(".circle").css("background-image", "url(" + baseurlim+imge + ")");
                         // $(".circle").css("background-size", "100%");
                         // $(".circle").css("background-position", "center");
                         // $(".circle").css("background-repeat", "no-repeat");
                                   
                        }
           

                    console.log(out.data);
                }
            });
            }
            
            

            

        }  



          function addImagegallery(imge,cl) { 
           height =$('.'+cl).height();
           width =$('.'+cl).width();
          
    //        var i = new Image();
    // i.src = imge.src;
    // var height = i.height;
    // var width = i.width;
    // alert(document.getElementById("myImg").width);
    // alert(width);
          var baseurlim = '<?php echo base_url() ?>uploads/imagegallery/';
           


            var sid = $("#topic_id").val();
            var tid = $("#tid").val();
            // alert(tid);
            
                 $.ajax({

                      url: base_url+"add-image-gallery",
                      type: "POST",
                      data:{image:imge,height:height,width:width,topic_parent_id:sid} ,
                  
                      success: function(out){
                         out = JSON.parse(out);

                              if(out.status == 1){
                                getContents();
                                   // $(".bimage").css("background-image", out.data);
                                         
                              }
                 

                          console.log(out.data);
                      }
                  });         
            
            
            

            

        }  

$(document).ready(function(){
   var tid = $("#tid").val();
    getTopic(tid);
  
});
 // $(".circle").hover(function(){
 //   var tid = $(this).attr('data-id');
 //    $("#tid").val(tid);
 //    getTopic(tid);
 //  });

$(document).on('click','.circle',function(e){
    var tid = $(this).attr('data-id');
    $("#tid").val(tid);
// alert(tid);
    getTopic(tid);

 });

$(document).on('click','.delete-topic-btn',function(e){
    e.preventDefault();
    // var id = $(this).attr('data-id');
   var tid = $("#tid").val();

    $.confirm({
        title: 'Confirm delete!',
        content: 'Cant be reversed!',
        buttons: {
            confirm: function () {
                $.ajax({
                   
                    url:base_url+'update-topic',
                type:'post',
                data:{id:0,cval:'topic_status',topic_id:tid},
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

$(document).on('click','.delete-topic',function(e){
    e.preventDefault();
    var tid = $(this).attr('data-id');
   // var tid = $("#tid").val();

    $.confirm({
        title: 'Confirm delete!',
        content: 'Cant be reversed!',
        buttons: {
            confirm: function () {
                $.ajax({
                   
                    url:base_url+'update-topic',
                type:'post',
                data:{id:0,cval:'topic_status',topic_id:tid},
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

function getTopic(tid){

  $.ajax({
                url:base_url+'get-topic',
                data:{topicid:tid},
                type:'post',
                success: function(out){
                    out = JSON.parse(out);
                    if(out.status == 1){
                       $("#topic_title").val(out.data.topic_title);
                       $("#backgroundcolor").val(out.data.backgroundcolor);
                       $("#topic_color").val(out.data.topic_color);
                       $("#topic_bordercolor").val(out.data.topic_bordercolor);
                       $("#topic_backgroundcolor").val(out.data.topic_backgroundcolor);
                       $("#topic_fontsize").val(out.data.topic_fontsize);
                       $("#topic_height").val(out.data.topic_height);
                       $("#topic_width").val(out.data.topic_width);

                      

                      
                    }
                    else if(out.status==0){
                        alert(out.data);
                    }
                    else{
                        window.location.href = base_url;
                    }
                }
            })
}

        </script>

 <!-- chart add  -->
<!-- <script>
  tinymce.init({
    selector: '#contented',
    init_instance_callback : function(editor) {
    var data = document.getElementById('ptr_content_holder').innerHTML;
    tinymce.get('contented').setContent(data);
  },  
  });
</script> -->
    <script type="text/javascript">  

      $(document).ready(function(){
        var data = document.getElementById('ptr_content_holder').innerHTML;
    // tinymce.get('contented').setContent(data);
    $("#contented").innerHTML(data);
      //  var datas = $("#ptr_content_holder").text();
      //  alert(tinymce.get("contented").getContent());
      //  // tinymce.get("#content").setContent(datas);
          // // alert("x");

          
          
          //  tinymce.get('contented').setContent(datas);
    });
      
         function createcontent()
        {
          // alert('f');
          // con = '<p class="cont" contenteditable="true">'+$("#content").val()+'</p>';
           var con= tinymce.get("contented").getContent();
          // $("p").attr("contenteditable",true);
          //  $('#ppage').append(con); 



           var topic_id = $("#topic_id").val();
            // alert(topic_id);
              $.ajax({
                url:base_url+'update-topic',
                type:'post',
                data:{id:con,cval:'content',topic_id:topic_id},
                success: function(out){
                    out = JSON.parse(out);
                    if(out.status == 1){
                     getContents()
                    }
                    else if(out.status==0){
                        alert(out.data);
                    }
                    else{
                        window.location.href = base_url;
                    }
                }
              })
         
        }



          function createFolder()
        {
          // alert('f');
          // con = '<p class="cont" contenteditable="true">'+$("#content").val()+'</p>';
           var fol= $('#folder').val();
        
            // alert(topic_id);
              $.ajax({
                url:base_url+'create-folder',
                type:'post',
                data:{fol:fol},
                success: function(out){
                    out = JSON.parse(out);
                    if(out.status == 1){
                        window.location.reload();
                    }
                    else if(out.status==0){
                        alert(out.data);
                    }
                    else{
                        window.location.href = base_url;
                    }
                     
                   
                }
              })
         
        }
         $('#imageele').change(function(){
      var fol = $(this).attr('data-id');
 // alert(fol);

            var file_data = $('#imageele').prop('files')[0];   
            var form_data = new FormData();                  
            form_data.append('file', file_data);
            form_data.append('folder', fol);

            $.ajax({
                url: base_url+"add-image-folder",
                type: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData:false,
                success: function(out){
                   out = JSON.parse(out);
                        if(out.status == 1){
                            window.location.reload();
                                   
                        }
           
                       
                    console.log(out.data);
                }
            });
        });
         $('#image').change(function(){
      var fol = $(this).attr('data-id');
 // alert(fol);

            var file_data = $('#image').prop('files')[0];   
            var form_data = new FormData();                  
            form_data.append('file', file_data);
            form_data.append('folder', fol);

            $.ajax({
                url: base_url+"add-image-folder",
                type: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData:false,
                success: function(out){
                   out = JSON.parse(out);
                        if(out.status == 1){
                            window.location.reload();
                                   
                        }
           
                       
                    console.log(out.data);
                }
            });
        });
    </script>  
    <script type="text/javascript">  
     
         function createHead()
        {
           var con= tinymce.get("contentHead").getContent();
          // $("p").attr("contenteditable",true);
           // $('#ppage').append(con); 



           var topic_id = $("#topic_id").val();
            // alert(topic_id);
              $.ajax({
                url:base_url+'update-topic',
                type:'post',
                data:{id:con,cval:'topic_title',topic_id:topic_id},
                success: function(out){
                    out = JSON.parse(out);
                    if(out.status == 1){
                     getContents()
                    }
                    else if(out.status==0){
                        alert(out.data);
                    }
                    else{
                        window.location.href = base_url;
                    }
                }
              })
         
       
            
         
        }
    </script>  








<script type="text/javascript">

$(document).ready(function() {

    $(".circle").draggable().resizable();
    $(".contents").draggable();
     $(".tcontent").draggable();

 });
  // $(document).ready(function(){
  //   $("p").attr("contenteditable",true);
  // });

 
  $(document).on('change','#topictitle',function(e){
      var val = $(this).val();
      var att = $(this).attr('data-attr');
      var topic_id = $(this).attr('data-id');
     // alert(topic_id);
        $.ajax({
          url:base_url+'update-topic',
          type:'post',
          data:{id:val,cval:att,topic_id:topic_id},
          success: function(out){
              out = JSON.parse(out);
              if(out.status == 1){
                getContents();
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



  $(document).on('click','#newslide-btn',function(e){
    var psubid =  $('#psubid').val();
     $.ajax({
          url:base_url+'add-slide',
          type:'post',
          data:{id:psubid},
          success: function(out){
              out = JSON.parse(out);
              if(out.status == 1){
                // alert(out.data);
                  var html = $('#newslide').html();
                  $('#card-newslide').append(html);
                  var html = $('#new-presentation-page').html();
                  $('#ppage').html(html);
                  $("#topic_id").val(out.data);
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
</script>
<script type="text/javascript">
  
 
// $(selector).dblclick(args);
  $(document).on('click','.plus',function(e){
    var tid = $(this).attr('data-id');
    var tparentid = $("#topic_id").val();
    window.location.href = base_url+'presentation-slide/'+tid;
  })

  $(document).on('click','.topic',function(e){
    // var tid = $(this).attr('data-id');
    var sid = $("#topic_id").val();
    window.location.href = base_url+'topic-add'+sid;
  })


 // $(document).on('click','.nslide',function(e){
 //    var html = $(this).html();
 //    $('#presentation-page').html(html);
 //  })

// topicimage
 

  function getContents(){
    window.location.reload();
    // var topicid = $("#topic_id").val();
    // var baseurlim = '<?php echo base_url() ?>uploads/background/';
    // $.ajax({
    //             url:base_url+'get-topic',
    //             data:{topicid:topicid},
    //             type:'post',
    //             success: function(out){
    //                 out = JSON.parse(out);
    //                 if(out.status == 1){
                       // window.location.reload();
                    //    $("#ppage .contents").html(out.data.heading+out.data.content);
                    // // alert(out.data.content);
                    //     for(var i=0;i<out.data.topics.length;i++){

                    //     }

                    //    $("#ppage .contents").text(out.data.content);
                    //    $("#ppage").css("background-image", "url(" + baseurlim+backgroundimage + ")");
                    //      $("#ppage").css("background-size", "100%");
                    //      $("#ppage").css("background-position", "center");
                    //      $("#ppage").css("background-repeat", "no-repeat");
                    //      $("#ppage").css('color',out.data.color);

                 
                      // $('#ppage').html(con).draggable(); 

                      
            //         }
            //         else if(out.status==0){
            //             alert(out.data);
            //         }
            //         else{
            //             window.location.href = base_url;
            //         }
            //     }
            // })
  }




// $(document).on('change','#topic_title',function(e){
//       var val = $(this).val();
//       var att = $(this).attr('data-attr');
//       var topic_id = $("#topic_id").val();
//      // alert(val);
//         $.ajax({
//           url:base_url+'update-topic',
//           type:'post',
//           data:{id:val,cval:att,topic_id:topic_id},
//           success: function(out){
//               out = JSON.parse(out);
//               if(out.status == 1){
//                 getContents();
//               }
//               else if(out.status==0){
//                   alert(out.data);
//               }
//               else{
//                   window.location.href.topic_id = base_url;
//               }
//           }
//         })

// })
$(document).on('change','.styletopic',function(e){
      var val = $(this).val();
      var att = $(this).attr('data-attr');
      // alert(att);
      var topic_id = $("#tid").val();
      tbcolor = $("#topic_bgcolor").val();
      bcolor = $("#bgcolor").val();
      title = $("#topic_title").val();
      fsize = $("#topic_fontsize").val();
      // alert(fsize);
      color = $("#topiccolor").val();
      theight = $("#topic_height").val();
      twidth = $("#topic_width").val();



      // alert(val);
        $.ajax({
          url:base_url+'update-topic',
          type:'post',
          data:{id:val,cval:att,topic_id:topic_id},
          success: function(out){
              out = JSON.parse(out);
              if(out.status == 1){
                // $('[data-val="p'+topic_id+'"]').css("background-color", tbcolor);
                if(att == "topic_title"){
                   $('[data-val="p'+topic_id+'"]').text(title);
                }else if(att == "topic_fontsize"){
                  $('[data-val="p'+topic_id+'"]').css("font-size", fsize);
                }else if(att == "topic_color"){
                  $('[data-val="p'+topic_id+'"]').css("color", color);
                }
                else if(att == "topic_height"){
                  $('[data-val="p'+topic_id+'"]').css("height", theight);
                }else if(att == "topic_width"){
                  $('[data-val="p'+topic_id+'"]').css("width", twidth);
                }
                



                 $('[data-val="c'+topic_id+'"]').css("background-color", tbcolor);
                 $("#ppage").css("background-color", bcolor)
              }
              else if(out.status==0){
                  alert(out.data);
              }
              else{
                  window.location.href.topic_id = base_url;
              }
          }
        })

})


// $(document).on('click','.slidenew',function(e){
//       var topicid = $(this).attr('data-id');
//  window.location.href = base_url+'presentation-slide/'+topicid;
//     });
$(document).on('keyup','.style',function(e){
      var val = $(this).val();
      var att = $(this).attr('data-id');
      $("#ppage").css(att, val);
if(att == 'background-color'){
  attrvalue = 'backgroundcolor';
}else if(att == 'color'){
  attrvalue = 'color';
}else if(att == 'height'){
  attrvalue = 'height';
}else if(att == 'width'){
  attrvalue = 'width';
}else if(att == 'heading'){
  attrvalue = 'heading';
}
      var topic_id = $("#topic_id").val();
     
        $.ajax({
          url:base_url+'update-slide',
          type:'post',
          data:{id:val,cval:attrvalue,topic_id:topic_id},
          success: function(out){
              out = JSON.parse(out);
              if(out.status == 1){
                if(attrvalue == 'heading'){
                  $(".content").append('<h1 >'+val+'</h1>')
                }
                getContents();
                  // var html = $('#newslide').html();
                  // $('#card-newslide').append(html);
                  // var html = $('.'+id).html();
                   // alert(id+' '+html);
                    // alert($('#ppage').html());
                  // $('#ppage').html(html);
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

</script>

  
     <!-- chart add  -->
    
  
     <!-- chart add  -->
  

  
    
    <script type="text/javascript">
  //    window.onload = function(){
    //     document.getElementById('close').onclick = function(){
    //         this.parentNode.parentNode.parentNode
    //         .removeChild(this.parentNode.parentNode);
    //         return false;
    //     };
    // };




    </script>

    <script type="text/javascript">
//       $( ".timage" ).click(function() {
//           height =$(this).height();
//           width =$(this).width();
// });
      
    function addtopic(){



          
      
      con = $('#topiccont').html();
      // head = $('.circle__content').text();
      var sid = $("#topic_id").val();

           $.ajax({
                url:base_url+'add-topic',
                data:{sid:sid},
                type:'post',
                success: function(out){
                    out = JSON.parse(out);
                    if(out.status == 1){
                     
                       getContents();
                               
                    }
                    else if(out.status==0){
                        alert(out.data);
                    }
                    else{
                        window.location.href = base_url;
                    }
                }
            })
            
    }
    </script>
    <script type="text/javascript">
      var dragposition = '';
      $('.circle').draggable({
         // other options...
         drag: function(event,ui){
            dragposition = ui.position;
            var topicid = $(this).attr('data-id');
            $(this).css("border","2px dashed #999");
             // alert(topicid);
             // alert(dragposition.left+' '+dragposition.top);
        //var l = ( 100 * parseFloat(dragposition.left / 770) ) + "%" ;
        // var t = ( 100 * parseFloat(dragposition.top / 500) ) + "%" ;

        var l = dragposition.left ;
        var t = dragposition.top ;

        // $(this).css("left", l);
        // $(this).css("top", t);
        // alert($(this).position().left+'%%%%%%%'+dragposition.left);
              $.ajax({
                url:base_url+'update-topic-position',
                type:'post',
                data:{left:l,top:t,topicid:topicid},
                success: function(out){
                    out = JSON.parse(out);
                    if(out.status == 1){
                      $(this).css("left", l);
                      $(this).css("top", t);
 // $(this).css("border","1px solid #fff");

                      // getContents();
                    }
                    else if(out.status==0){
                        alert(out.data);
                    }
                    else{
                        window.location.href = base_url;
                    }
                }
              })
         }
      });


      var dragpos = '';
      $('.tcontent').draggable({
         // other options...
         drag: function(event,ui){
            dragpos = ui.position;
            var topicid = $(this).attr('data-id');
            $(this).css("border","2px dashed #999");
             // alert(topicid);
             // alert(dragposition.left+' '+dragposition.top);
        //var l = ( 100 * parseFloat(dragposition.left / 770) ) + "%" ;
        // var t = ( 100 * parseFloat(dragposition.top / 500) ) + "%" ;

        var l = dragpos.left ;
        var t = dragpos.top ;

        // $(this).css("left", l);
        // $(this).css("top", t);
        // alert($(this).position().left+'%%%%%%%'+dragposition.left);
              $.ajax({
                url:base_url+'update-topic-content-position',
                type:'post',
                data:{left:l,top:t,topicid:topicid},
                success: function(out){
                    out = JSON.parse(out);
                    if(out.status == 1){
                      $(this).css("left", l);
                      $(this).css("top", t);
 // $(this).css("border","1px solid #fff");

                      // getContents();
                    }
                    else if(out.status==0){
                        alert(out.data);
                    }
                    else{
                        window.location.href = base_url;
                    }
                }
              })
         }
      });


      var dragpositions = '';
      $('.contents').draggable({
         // other options...
         drag: function(event,ui){
            dragpositions = ui.position;
            var topicid = $("#topic_id").val();
            $(this).css("border","2px dashed #999");

            // var l = ( 100 * parseFloat(dragpositions.left / 770) ) + "%" ;
            // var t = ( 100 * parseFloat(dragpositions.top / 500) ) + "%" ;

            var l = dragpositions.left ;
            var t = dragpositions.top ;
              // alert(att);
              // alert(dragpositions.left+' '+dragpositions.top);
              //      var l = ( 100 * parseFloat($(this).position().left / parseFloat($(this).parent().width())) ) + "%" ;
              // var t = ( 100 * parseFloat($(this).position().top / parseFloat($(this).parent().height())) ) + "%" ;
              // $(this).css("left", l);
              // $(this).css("top", t);
              // alert(l+t);
              $.ajax({
                url:base_url+'update-content-position',
                type:'post',
                data:{left:l,top:t,topicid:topicid},
                success: function(out){
                    out = JSON.parse(out);
                    if(out.status == 1){
                     
                       
                    }
                    else if(out.status==0){
                        alert(out.data);
                    }
                    else{
                        window.location.href = base_url;
                    }
                }
              })
         }
      });
    </script>

    
    <script type="text/javascript">
      var resposition = '';

      // $('.circle').resizable({
      //    //options...
      //    resize: function(event,ui){
      //       resposition = ui.position;
      //       alert(resposition.height);
      //       alert(resposition.width);

      //    }
      // });
$( ".circle" ).resizable({

   stop: function(event, ui) {
            $(this).css("border","2px dashed #999");

        var width = $(event.target).width();
        var height = $(event.target).height();
        var topicid = $(this).attr('data-id');
         $.ajax({
                url:base_url+'update-topic-values',
                type:'post',
                data:{height:height,width:width,topicid:topicid},
                success: function(out){
                    out = JSON.parse(out);
                    if(out.status == 1){

                      $(this).css("height", height);
                      $(this).css("width", width);
        getTopic(topicid);

                    }
                    else if(out.status==0){
                        alert(out.data);
                    }
                    else{
                        window.location.href = base_url;
                    }
                }
              })


      }
     // not 100% sure it'll be event.target that you want,
     // inspect in console to double-check
    
     // do stuff with width & height
});

     


    </script>

   
</body>
</html>