
<!DOCTYPE html>
<head>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="theme-color" content="#4188c9">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320"><!-- 
    <link rel="icon" href="<?=base_url()?>favicon.ico" type="image/x-icon"/> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>Mesoki</title>
<!-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> -->
<!-- bootstrap-css -->
<!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="<?=base_url()?>slide/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<!-- <link rel="stylesheet" href="<?=base_url()?>slide/css/font.css" type="text/css"/>
<link href="<?=base_url()?>slide/css/font-awesome.css" rel="stylesheet">  -->
<!-- //font-awesome icons -->
<!-- <script src="http://html2canvas.hertzen.com/build/html2canvas.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>

<script src="<?=base_url()?>slide/js/jquery2.0.3.min.js"></script>
<script src="<?=base_url()?>slide/js/modernizr.js"></script>
<!-- <script src="<?=base_url()?>slide/js/jquery.cookie.js"></script> -->
<!-- <script src="<?=base_url()?>slide/js/screenfull.js"></script> -->








    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    
 


     <link href="<?=base_url()?>assets/css/dashboard.css" rel="stylesheet" />
    <!-- <script src="<?=base_url()?>assets/js/dashboard.js"></script> -->
<script src="<?=base_url()?>slide/js/bootstrap.js"></script>
  <script src="<?=base_url()?>slide/js/proton.js"></script>
 <!-- <script  src="<?=base_url()?>static/js/tinymce.js" referrerpolicy="origin" crossorigin="anonymous"></script> -->
 <script src="https://cdn.tiny.cloud/1/jrsjj47h3k9y6272lmftp2j56agyzl6a86u1fvt8n8bzbxvw/tinymce/5/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
   
    
</head>




<style type="text/css">
.tcontent:hover {
    outline: rgb(41, 105, 171) solid 1px;
}
/*.tcontent:container(width > 1px) {

    width:100px;
}*/

  *:focus {
    outline: 0;
}

  .tinymce-content{
    outline: none;
  }
  .tcontent{
     word-break: break-word !important;
  }
  .tinymce-content{
     word-break: break-word !important;
  }
  .contents{
     word-break: break-word !important;
  }
  .pl a{
    color: #fff !important; 
  }


  .pl{
    background-color: red;
    width:30px;
    border-radius: 50%;
    text-align: center;
  }

  .dl{
    width: 100px;
    left: 0% !important;
    bottom: -27px !important;

  }
  .dl img{
   width:25%;
   border: 1px solid #ffc;
  }
  .no_print{
    margin: auto;
    position: absolute;
    left: 0%;
    right: 0;
    bottom: 0;
    display: none;
  }
   .contlink{
         margin: auto;
    position: absolute;
    top: 83%;
    left: 47%;
    right: 0;
    bottom: 0;
    display: none;
  }
 
  .plus{

  }
  .buttons {
    font-family: 'Roboto', sans-serif;
    font-size:11px; color: #354052;
    background: rgb(236,239,244);
background: linear-gradient(0deg, rgba(236,239,244,1) 0%, rgba(255,255,255,1) 100%);
    outline: 1px solid #ced0da;
    border-radius: 3px; -webkit-border-radius: 3px;
    -moz-border-radius: 3px; outline: none;    
}
.buttons:hover {
    background: #e2f1ff;
}

.search {
  width: 100%;
  position: relative;
  display: flex;
  padding-bottom: 5%;

}

.searchTerm {
  width: 100%;
  outline: 3px solid #fdeb10de;
  outline-right: none;
  padding: 5px;
  height: 36px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color: #eabb10de;
}

.searchTerm:focus{
  color: #00B4CC;
}

.searchButton {
  width: 40px;
  height: 36px;
  outline: 1px solid #fdeb10de;
  background: #fdeb10de;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}
.col-md-6{
  padding-right: 1% !important;
  padding-left: 1% !important;
}









/* Style the tab */
.tab {
  float: left;
  outline: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 50%;
  height: 560px;
  overflow-x: scroll;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  outline: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  outline: 1px solid #ccc;
  width: 50%;
  outline-left: none;
  height: 560px;
  overflow-x: scroll;

}



/* Style the tabs */
.tabs {
  float: left;
  outline: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 50%;
  height: 560px;
  overflow-x: scroll;

}

/* Style the buttons inside the tab */
.tabs button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  outline: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tabs button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tabs button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontents {
  float: left;
  padding: 0px 12px;
  outline: 1px solid #ccc;
  width: 50%;
  outline-left: none;
  height: 560px;
  overflow-x: scroll;
  display: none;

}

 .circle:hover {
    outline: 1px solid #da2626;

      }


 .timage:hover {
        /*cursor: pointer;*/
      outline:  1px solid #2969ab;
      }

.no_print a{
    text-decoration: none;
    color: #000;
}
.arrows{
  position: absolute;
    left: 87%;
    top: 109%;
    border: none !important;
}
/*show .ab*/
.circle:hover .no_print {
    display: block;
    
}
.timage:hover .no_print {
    display: block;
    
}

.circle *[contentEditable="true"]:focus,
.circle *[contentEditable="true"]:hover {
  /*outline:  solid #2276d2;*/
}

.main-menu ul li ul, #topmenu li:hover > ul {
    display: block !important;
}
figure{
  text-align: center;
}
figure img {
  width: 50%;
}
figcaption{
  font-size: 11px;
}
 
.contents:hover .contlink {
    display: block;
    
}
.contents:focus .contlink {
    display: block;
    
}

.contentstopic:hover .contlink {
    display: block;
    
}
.contentstopic:focus .contlink {
    display: block;
    
}

.circle:active .no_print {
    display: block;
    
}
.timage:active .no_print {
    display: block;
    
}
 .circle:active {
    outline: 1px solid #da2626;

      }


 .timage:active {
        /*cursor: pointer;*/
      outline:  1px solid #2969ab;
      }

/*.tox{
  height:500px !important;
}*/
</style>

<?php
$pvalue = 294/800;
$hvalue = 150/450;
function nested($id){
  foreach ($id as $value) { 

if(!empty($value['image']) || !empty($value['sub']) || $value['content'] !=""){
$pvalue = 294/800;
$hvalue = 150/450;
    ?> 

          <a href="<?=base_url();?>presentation-slide/<?=$value['topic_id']?>"><div class=" " style="background-image:url('<?php echo base_url().'uploads/slide/'.$value['content_slide']?>'); background-color:<?=$value["backgroundcolor"]?>; width: 294px; height: 150px;
  background-size: contain ; background-size: 100%;
  background-position: center;
  background-repeat: no-repeat; margin-bottom: 5%;">

    

             <!-- <div class="ppage " id="ppage" > -->
                   
          </div></a>
           <span class="tspan"><?php echo $value['ttitle'] ?></span>
      <br/> <br/>
          <!-- .end .wrap -->
        <!-- </section> -->
    <?php }
   if(!empty($value['image']) || !empty($value['sub']) || $value['content'] !=""){
          nested($value['sub']);
        }
  }
}
?>
<body class="dashboard-page" style="overflow-y: hidden !important;">

<input type="hidden" name="tid" id="tid" value="<?=$presentation_topic['topic_id']?>">
  <nav class="main-menu">
    <ul>
  <li class="has-subnav">
    <a href="javascript:void(0)">
      <figure >
  <img src="<?=base_url();?>uploads/icons/slides.png" alt="presentation" >
  <figcaption>Slide</figcaption>
</figure>
      <!-- <i class="fa fa-television nav_icon"></i> -->
      <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
    </a>
    <ul>
      <li>









      <div class="card" style="height: 697px; width: 350px; overflow-x: scroll;background-color: rgba(70,80,100,0.8);">
      <div class="card-header">
    <?php if($presentation_topic['topic_parent'] !=0){ 
      ?>
      <a href="<?=base_url()?>presentation-slide/<?=$presentation_topic['topic_parent']?>" id="" class="btn btn-primary-outline"><i class="fa fa-chevron-left" aria-hidden="true"></i></a> 
    <?php }
    else{
      ?>
        <a href="<?=base_url()?>presentation-slide/<?=$presentation_topic['topic_id']?>" id="" class="btn btn-primary-outline"><i class="fa fa-chevron-left" aria-hidden="true"></i></a> 

     <?php } 
     ?>
    <h3 class="card-title"> Slide</h3>
    <div class="btn btn-primary-outline" onclick="return getslideRefresh();" ><i class="fa fa-refresh"></i></div>
    <?php
      if($this->session->userdata('create')){
    ?>
      
    <?php
      }
    ?>
      </div>
      <div class="card-body" id="card-newslide">
        <form action="" method="post" id="slideform">
<div class="search">
  <input type="text" name="searchTermslide" id="searchTermslide" class="searchTerm" placeholder="What are you looking for?" value="<?php echo $trm; ?>">
  <button type="submit" class="searchButton" >
    <i class="fa fa-search"></i>
     </button>
   </div>
</form>
      

    <div class="row slidedat" >









  <?php 
        if($topics!=false){
if(!empty($topics['image']) || !empty($topics['sub']) || $topics['content'] !=""){
          ?>
        <!-- <div class="<?=$topics['topic_id']?>"> -->
          <!--.wrap = container (width: 90%) -->
                    <!-- <span class="background "  ></span> -->
          <a href="<?=base_url();?>presentation-slide/<?=$topics['topic_id']?>"><div  style="background-image:url('<?php echo base_url().'uploads/slide/'.$topics['content_slide']?>'); background-color:<?=$topics["backgroundcolor"]?>;width: 294px; height: 150px;
  background-size: contain ; background-size: 100%;
  background-position: center;
  background-repeat: no-repeat; margin-bottom: 5%;" >
<?php 




?> 
          </div></a>
          <span class="tspan"><?php echo $topics['ttitle'] ?></span>
      <br/> <br/>
          <!-- .end .wrap -->
        <!-- </div> -->


<?php } foreach($topics['sub'] as $subtop ) {

if(!empty($subtop['image']) || !empty($subtop['sub']) || $subtop['content'] !=""){


  ?>
     <!--    echo $subtop['topic_title']."jjjjjjjjjjjjjjjjj"; -->


         <!-- <section  class="<?=$subtop['topic_id']?>"> -->
          <!--.wrap = container (width: 90%) -->

          <a href="<?=base_url();?>presentation-slide/<?=$subtop['topic_id']?>"><div style="background-image:url('<?php echo base_url().'uploads/slide/'.$subtop['content_slide']?>'); background-color:<?=$subtop["backgroundcolor"]?>; height: 150px; width: 294px;
  background-size: contain ; background-size: 100%;
  background-position: center;
  background-repeat: no-repeat; margin-bottom: 5%;">
    

             <!-- <div class="ppage content" id="ppage" > -->
                    



            <!-- .end .content-right -->
          </div></a>
          <span class="tspan"><?php echo $subtop['ttitle'] ?></span>
      <br/> <br/>
          <!-- .end .wrap -->
        <!-- </section> -->



  <?php 
}//if data empty checking end
 if(!empty($subtop['image']) || !empty($subtop['sub']) || $subtop['content'] !=""){
          nested($subtop['sub']);
  }
}
}
?>
















      </div>
  </div >





      </li>
     
    </ul>
  </li>
  <li class="has-subnav">
    <a href="javascript:void(0)">
    <!-- <i class="fa fa-folder-open-o nav_icon" aria-hidden="true"></i> -->
    <figure >
  <img src="<?=base_url();?>uploads/icons/background.png" alt="presentation" >
  <figcaption>Theme</figcaption>
</figure>
     
    <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
    </a>
    <ul>
      <li>







<div class="card folderdiv" style="height: 697px; width: 350px; overflow-x: scroll;background-color: rgba(70,80,100,0.8);">
      <div class="card-header">
      <h4 style="padding-top:5%;padding-right: 57%; ">Theme</h4>                      
           
 <div class="btn btn-primary-outline"   data-toggle="modal" data-target="#modalFolder"><i class="fa fa-plus"></i></div>
  <div class="btn btn-primary-outline" onclick="return getfoldRefresh();" ><i class="fa fa-refresh"></i></div>


    </div>
<div class="card-body ">

<!-- <div class="container imagediv <?=$entry?>background" style="display: none;"> -->
        
        
        <div class="row" style="overflow-x: scroll;">
<div class="col-md-12">
   
<div class="search">
  <input type="text" class="searchTerm" id="searchTermFol" value="<?php if($this->session->userdata('foldername')){ echo $this->session->userdata('foldername'); }?>" placeholder="What are you looking for?">
   <button type="button" onclick="return getsearchFol();" class="searchButton">
    <i class="fa fa-search"></i>
     </button>
   </div>
</div>

         <?php
$path = './uploads/background/';

$dirs = array();

// directory handle
$dir = dir($path);
?>
        
           

        <?php
while (false !== ($entry = $dir->read())) {
    if ($entry != '.' && $entry != '..') {
   if (is_dir($path . '/' .$entry)) {
// $classentr = str_replace(' ', '', $entry);
$classentr = $entry;

    $dirs[] = $entry; 


$c =0;
    if($this->session->userdata('foldername')){
      if(strpos($entry, $this->session->userdata('foldername')) !== false){
           $c =1;
      } 
    }else{
      $c =1;
    }

    if($c ==1){
    ?>
<!-- <button class="tablinks" onclick="openCity(event,'<?=$entry?>')"><?=$entry?></button> -->
 <div class="col-md-6"  onclick="return hideshow('<?=$classentr?>');">
<?php 
if(count(glob("./uploads/background/".$entry."/background/*"))===0){
?>
<img src="<?=base_url()?>uploads/background/pictures-folder.png" style=" width:150px; height:70px;"> 
 
<?php }else{ 
$firstFile = scandir("./uploads/background/".$entry."/background")[2]; 
  ?>

 <img src="<?=base_url()?>uploads/background/<?=$entry."/background/".$firstFile?>" style=" width:150px; height:70px;"> 
 
<?php }

?>


  <!-- <icon class="fa fa-trash icon_size24 btnrem"></icon> -->
   
<span class="tlabel"> <?=$entry?></span>
<?php if($this->session->userdata('admin_role')==1 || $this->session->userdata('admin_role')==3){ ?>

<span class="resume_create_up_link" style="position: absolute;
top: 10%;
left: 9%;">
   
     <a href="javascript;" onclick="return addentry('<?=$entry?>');"  data-toggle="modal" data-target="#modalFolderName" >
    <icon class="fa fa-pencil" aria-hidden="true"></icon>
    </a>
    
</span>
<?php } ?>
</div>

     <?php } }
    }
}
?>




          
        </div>
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

// $classentry = str_replace(' ', '', $entry);
$classentry = $entry;
// echo $new_str;

    $dirs[] = $entry; 



//     if(strpos($mystring, $word) !== false){
//     echo "Word Found!";
// } 
    
?>





         


<div class="card imagefolderdiv <?=$classentry?>" style="display: none; height: 697px; width: 350px; overflow-x: scroll;background-color: rgba(70,80,100,0.8);">
      <div class="card-header">
     <a href="javascript:void(0)" onclick="return back();" id="" class="btn btn-primary-outline"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
      <h4><?=$entry?> </h4>                      
           


    </div>
<div class="card-body ">





        <div class="row">

        
     
<?php


if(count(glob("./uploads/background/".$entry."/background/*"))!=0){

 $firstFile1 = scandir("./uploads/background/".$entry."/background")[2]; 
?>

  <!-- <div class="col-md-6"  onclick="return hideshow('<?=$entry?>');"><img src="<?=base_url()?>uploads/background/<?=$entry.$firstFile?>" style=" width:150px; height:100px;">  -->
    <div class="col-md-6" onclick="return hideshowimage('<?=$classentry?>background',0);"><img src="<?=base_url()?>uploads/background/<?=$entry?>/background/<?=$firstFile1?>"  style=" width:150px; height:70px;"><span class="tlabel"> Background</span></div>
<?php }else{ ?>

           
<!-- <button class="tablinks" onclick="openCity(event,'<?=$entry?>')"><?=$entry?></button> -->
<div class="col-md-6" onclick="return hideshowimage('<?=$classentry?>background',0);"><img src="<?=base_url()?>uploads/background/pictures-folder.png"  style=" width:150px; height:70px;"><span class="tlabel"> Background</span></div>
    <?php } ?>

<?php

if(count(glob("./uploads/background/".$entry."/elements/*"))!=0){
 $firstFile2 = scandir("./uploads/background/".$entry."/elements")[2]; 
?>

  <!-- <div class="col-md-6"  onclick="return hideshow('<?=$entry?>');"><img src="<?=base_url()?>uploads/background/<?=$entry.$firstFile?>" style=" width:150px; height:100px;">  -->
<div class="col-md-6" onclick="return hideshowimage('<?=$classentry?>elements',1);"><img src="<?=base_url()?>uploads/background/<?=$entry?>/elements/<?=$firstFile2?>"  style=" width:150px; height:70px;"><span class="tlabel"> Elements</span></div>
    
<?php }else{ ?>

<div class="col-md-6" onclick="return hideshowimage('<?=$classentry?>elements',1);"><img src="<?=base_url()?>uploads/background/pictures-folder.png"  style=" width:150px; height:70px;"><span class="tlabel"> Elements</span></div>
<?php } ?>

        </div>
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
// $classentrys = str_replace(' ', '', $entry);
$classentrys = $entry;

    $dirs[] = $entry; 
?>
  <div class="card imagediv <?=$classentrys?>background" style="display: none; height: 697px; width: 350px; overflow-x: scroll;background-color: rgba(70,80,100,0.8);">
      <div class="card-header">
       <a href="javascript:void(0)" onclick="return backfolder('<?=$classentrys?>');" id="" class="btn btn-primary-outline"><i class="fa fa-chevron-left" aria-hidden="true"></i></a><h4><?=$entry?> Background Images</h4>                      
           


    </div>
<div class="card-body ">

<!-- <div class="container imagediv <?=$entry?>background" style="display: none;"> -->
        
        <div class="row">
  
   <div class="col-md-12"><input type="file" class="style imagef" data-id="<?php echo $entry; ?>"  name="imagef" id="imagef">
<!-- <button id="imagesave" class="btn btn-primary">save</button> -->
   </div>

  </div>

   <div class="row folderappend<?=$classentrys?>background">

        </div>
        </div>

</div>






  <div class="card imagediv <?=$classentrys?>elements" style="display: none;height: 697px; width: 350px; overflow-x: scroll;background-color: rgba(70,80,100,0.8);">
      <div class="card-header">

          <a href="javascript:void(0)" onclick="return backfolder('<?=$classentrys?>');" id="" class="btn btn-primary-outline"><i class="fa fa-chevron-left" aria-hidden="true"></i></a><h4> <?=$entry?> Elements Images</h4>
  

      </div>

<div class="card-body ">

        <!-- <div class="container > -->
        
        <div class="row">

<div class="col-md-12"><input type="file" class="style imageele" data-id="<?php echo $entry; ?>"  name="imageele" id="imageele"></div>
       
</div>
<div class="row elementsappend<?=$classentrys?>elements"></div>
        </div>
</div>
<?php }}} ?>










      </li>
    
    </ul>
  </li>

  <!-- images -->
  <li class="has-subnav">
    <a href="javascript:void(0)">

    <!-- <i class="fa fa-file-image-o nav_icon"></i> -->
    <figure >
  <img src="<?=base_url();?>uploads/icons/image.png" alt="presentation" >
  <figcaption>Gallery</figcaption>
</figure>
     
   
    <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
    </a>
    <ul>
      <li>




<div class="card chapter" style="height: 697px; width: 350px; overflow-x: scroll;background-color: rgba(70,80,100,0.8);">
      <div class="card-header">
                
      <h4 style="padding-top:5%;padding-right: 57%; ">Image Gallery</h4>                      
  <div class="btn btn-primary-outline" onclick="return getImageRefresh();" ><i class="fa fa-refresh"></i></div>
 <div class="btn btn-primary-outline"   data-toggle="modal" data-target="#modalImage"><i class="fa fa-plus"></i></div> 




    </div>
<div class="card-body ">

  
        
        <div class="row">


       <div class="col-md-12">
   
 <div class="search">
  <input type="text" id="imagesearch" class="searchTerm" placeholder="What are you looking for?">
  <button type="submit" onclick="return getImage();" class="searchButton">
    <i class="fa fa-search"></i>
     </button>
   </div>
</div>            
  

<div id="imgl">

  <?php
  
    if(!empty($images)){
  $i = 0;
     foreach($images as $image)
    
{
    // $image = $files[$i];
    $supported_file = array(
        'gif',
        'jpg',
        'jpeg',
        'png'
     );

   
    ?>          
<div class="col-md-12 " style="padding-bottom: 3%;"><img src="<?=base_url().'uploads/chapter/'.$image['chapter_image'] ?>" class="chapter<?=$i?>" style="height:150px;width:300px"
       onclick = "addchapter('<?=$image['chapter_image']?>','chapter<?=$i?>')" 
     
      alt="Random image" style="
    padding: 1%;
"/><span class="tlabel"> </span></div>
  
<?php
    $i++;
      }
    } ?>
</div>
          


        </div>
        </div>

</div>




      </li>
     
    </ul>
  </li>

  <!-- presentation -->
  <li class="has-subnav">
    <a href="javascript:void(0)">

    <!-- <i class="fa fa-file-image-o nav_icon"></i> -->
    <figure >
  <img src="<?=base_url();?>uploads/icons/presentation.png" alt="presentation" >
  <figcaption>Presentation</figcaption>
</figure>
     
   
    <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
    </a>
    <ul>
      <li>
    





      <div class="card" style="height: 697px; width: 350px; overflow-x: scroll;background-color: rgba(70,80,100,0.8);">
      <div class="card-header">
      <a href="#" onclick="return getPres();" class="btn btn-primary-outline"><i class="fa fa-chevron-left" aria-hidden="true"></i></a> 
       
    <h3 class="card-title"> Presentations</h3>
    <div class="btn btn-primary-outline" onclick="return getPresentationRefresh();" ><i class="fa fa-refresh"></i></div>
    <?php
      if($this->session->userdata('create')){
    ?>
      
    <?php
      }
    ?>
      </div>
      <div class="card-body" id="card-newslide">


    <div class="row " >

<div class="col-md-12">
   
 <div class="search">
  <input type="text" id="searchTermPres" class="searchTerm" placeholder="What are you looking for?">
  <button type="submit" class="searchButton" onclick="return getPres();">
    <i class="fa fa-search"></i>
     </button>
   </div>
</div>
      
      <div class="col-md-12 col-lg-12 ppres">
      

     
   <?php 
      if(!empty($presentations)){
    // print_r($presentation_topic['slide']);
    foreach($presentations  as $slide){

      $imgback = str_replace(' ', '%20', $slide['content_slide']);

      ?>

       
       
        <div class=" slidenew <?= $slide['topic_id'] ?> plusPresentation"   data-id="<?= $slide['topic_id'] ?>" class=" " id="" style="outline: 1px solid #a7a5a5;     height: 150px;
    width: 294px;  background-image:url('<?php echo base_url().'uploads/slide/'.$imgback?>');
    background-size: contain ; background-size: 100%;
    background-position: center;
    background-repeat: no-repeat;  /*background: linear-gradient(0deg, rgba(236,239,244,1) 0%, rgba(255,255,255,1) 100%);*/
    outline: 1px solid #ced0da;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    outline: none;">



<span class="resume_create_up_link">
   
     <a href="javascript:void(0)" onclick="return getTopics(<?= $slide['topic_id'] ?>);" data-id="<?= $slide['topic_id'] ?>">
    <icon class="fa fa-clone" aria-hidden="true"></icon>
    </a>
    
    </span>



      





        </div>
         <span class="tspan"><?php echo $slide['presentation_title'] ?></span>
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

<!-- questions -->
  <li class="has-subnav">
    <a href="javascript:void(0)">

    <!-- <i class="fa fa-file-image-o nav_icon"></i> -->
    <figure >
  <img src="<?=base_url();?>uploads/icons/question.png" alt="presentation" >
  <figcaption>Question</figcaption>
</figure>
     
   
    <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
    </a>
    <ul>
      <li>
       

<div class="card " style="height: 697px; width: 350px; overflow-x: scroll;background-color: rgba(70,80,100,0.8);">
      <div class="card-header">
      <h4>Questions</h4>                      
           


    </div>
<div class="card-body ">
         
        <div class="row" style="overflow-x: scroll;">


        
        <!-- <div class="col-md-12 buttons " style="color: #000;"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i><span class="tlabel">New Question</span></div>
 -->
<div class="col-md-12">
  <div class="form-group">
            <label class="form-label">Question </label>
      <input type="text"  name="question" id="question" class="form-control" >
  </div>
  <div class="form-group">
            <label class="form-label">Question Tags</label>
              <select class="form-control" id="question_tags" name="question_tags" required="">
              <?php
// print_r($tags);
               foreach($tags as $value) {?>

                  <option value="<?=$value['question_tag_id']?>"><?=$value["tag"]?></option>
            <?php   } ?>
              
            </select>
    </div>
<input type="button" name="button" value="Save" class="btn btn-primary" onclick="return question();">
</div>

          
        </div>
        </div>
       
</div>




      </li>
     
    </ul>
  </li>

  <!-- styles -->
  <li class="has-subnav">
   <a href="javascript:void(0)">

    <!-- <i class="fa fa-file-image-o nav_icon"></i> -->
    <figure >
  <img src="<?=base_url();?>uploads/icons/style.png" alt="presentation" >
  <figcaption>Style</figcaption>
</figure>
     
   
    <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
    </a>
    <ul>
      <li>
    <div class="card" style="height: 697px; width: 350px; overflow-x: scroll; background-color: rgba(70,80,100,0.8);">
      <div class="card-header">
    
    <h3 class="card-title"> Topic Styles</h3>
       
      </div>
      <div class="card-body" id="card-newslide">


    <div class="row " >


      
      <div class="col-md-12 col-lg-12">

          <label  class="form-label tlabel">Background color</label> 
        <input type="color" name="bgcolor" id="bgcolor" class="styletopic buttons tstyle" data-attr="backgroundcolor" style="" value="#eceff4" data-id="" placeholder="Enter background color"> 
 <?php if($presentation_topic['topic_parent']==0){
  $title = $presentation_topic['topic_title'];
 }else{
  $title = "";

 } 

 if($title != ""){?>
            <label  class="form-label tlabel">Topic Title</label> 
          <input type="text" name="topictitle"  id="topictitle" class=" buttons topictit tstyle" data-attr="topic_title" style="" value="<?=$title?>" data-id="" placeholder="Enter topic title "  >
        <?php } ?>
<!-- 
          <label  class="form-label tlabel">Topic Font color</label> 
          <input type="color" name="topiccolor"  id="topiccolor" class="styletopic buttons tstyle" data-attr="topic_color" style="" value="#eceff4" data-id="" placeholder="Enter topic font color"  > -->

      <!--   <label  class="form-label tlabel">Topic outline Color</label> 
        <input type="color" name="topic_outlinecolor" id="topic_outlinecolor" class="buttons tstyle styletopic" data-attr="topic_outlinecolor" style="" value="#eceff4" data-id="" placeholder="Enter topic outline color"> 

 -->
         <!-- <label  class="form-label tlabel">Topic Background color</label> 
        <input type="color" name="topic_bgcolor" id="topic_bgcolor" class="buttons tstyle styletopic" data-attr="topic_backgroundcolor" style="" value="#eceff4" data-id="" placeholder="Enter background color"> 

          <label  class="form-label tlabel">Topic font size</label> 
        <input type="number" name="topic_fontsize" id="topic_fontsize" class="buttons tstyle styletopic" data-attr="topic_fontsize" style="" value="" data-id="" placeholder="Enter font size">  -->

          <label  class="form-label tlabel">Topic height</label> 
        <input type="number" name="topic_height" id="topic_height" class="buttons tstyle styletopic" data-attr="topic_height" style="" value="" data-id="" placeholder="Enter height "> 

         <label  class="form-label tlabel">Topic Width</label> 
        <input type="number" name="topic_width" id="topic_width" class="buttons tstyle styletopic" data-attr="topic_width" style="" value="" data-id="" placeholder="Enter height "> 
</div></div></div></div>
       
      </li>
    </ul>
  </li>

  <!-- topic add  onclick="addtopic()" -->
  

  <!-- content add -->
  <!-- <li>
    <a href="#" title="Content Add"  data-toggle="modal" data-target="#exampleModalcontent">
      <i class="fa fa-text-width nav-icon" aria-hidden="true"></i>
     
    </a>
  </li> -->

    <li class="has-subnav">
    <a href="javascript:void(0)">
      <!-- <i class="fa fa-text-width nav-icon"></i> -->
      <figure >
  <img src="<?=base_url();?>uploads/icons/text.png" alt="presentation" >
  <figcaption>Text</figcaption>
</figure>
      
    <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
    </a>
    <ul>
      <li>
       

<div class="card " style="height: 697px; width: 350px; overflow-x: scroll;background-color: rgba(70,80,100,0.8);">
      <div class="card-header">
      <h4>Content</h4>                      
           


    </div>
<div class="card-body ">
         
        <div class="row" style="overflow-x: scroll;">


        
        <!-- <div class="col-md-12 buttons " style="color: #000;"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i><span class="tlabel">New Question</span></div>
 -->
<div class="col-md-12">


  <div class="form-group " >
        <!-- <label>Content</label>    -->
        <textarea  name="contented" class="form-control" id="contented" ></textarea>
         <button type="button" class="btn btn-primary" onclick="createcontent();">Create</button>
      </div>
     

</div>

          
        </div>
        </div>
       
</div>




      </li>
     
    </ul>
  </li>

<!-- 
<li >
    <a href="javascript:void(0)"  data-toggle="modal" data-target="#exampleModaltopic" title="Topic Add">
       <figure >
  <img src="<?=base_url();?>uploads/icons/add-topic.png" alt="presentation" >
  <figcaption>Add Topic</figcaption>
</figure>
    <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
     
    </a>
  </li> -->
<li class="has-subnav">
    <!-- <a href="javascript:;">
      <i class="fa fa-question nav_icon"></i>
      <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
    </a> -->
    <a href="javascript:void(0)">
      <!-- <i class="fa fa-text-width nav-icon"></i> -->
      <figure >
  <img src="<?=base_url();?>uploads/icons/practice.png" alt="presentation" >
  <figcaption>Practice</figcaption>
</figure>
      
    <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
    </a>
    <ul>
      <li>






      <div class="card" style="height: 697px; width: 350px; overflow-x: scroll;background-color: rgba(70,80,100,0.8);">
      <div class="card-header">
    
        <!-- <a href="<?=base_url()?>presentation" id="" class="btn btn-primary-outline"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>  -->

    <h3 class="card-title"> Practice </h3>
     <div class="btn btn-primary-outline" onclick="return getPracticeRefresh();" ><i class="fa fa-refresh"></i></div>
    
    <?php
      if($this->session->userdata('create')){
    ?>
      
    <?php
      }
    ?>
      </div>
      <div class="card-body" id="card-newslide">


    <div class="row " >
<div class="col-md-12">
   
 <div class="search">
  <input type="text" id="practicesearch" class="searchTerm" placeholder="What are you looking for?">
  <button type="submit" onclick="return getPractice();" class="searchButton">
    <i class="fa fa-search"></i>
     </button>
   </div>
</div>
      
      <div class="col-md-12 col-lg-12" id="prct">
      
        
       
   <?php 
      if(!empty($questions)){
    foreach($questions as $question){?>

       
        <div class="row slidenew <?= $question['question_id'] ?>" onclick="return addtopic_practice('<?= $question['question_id'] ?>','<?= $question['question_code'] ?>')" data-id="<?= $question['question_id'] ?>" class=" " id="" style="outline: 1px solid #a7a5a5;     height: 150px;
    width: 300px;  
    background-size: contain ; background-size: 100%;
    background-position: center;
    background-repeat: no-repeat;  background: linear-gradient(0deg, rgba(236,239,244,1) 0%, rgba(255,255,255,1) 100%);
    outline: 1px solid #ced0da;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    outline: none;">



        </div>
         <span class="tspan"><?php echo $question['question_code'] ?></span>
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



<li >
    <a href="javascript:void(0)"  data-toggle="modal" data-target="#exampleModaltitle"  title="Text" class="btn btn-primary-outline"><i class="fa fa-header nav-icon" aria-hidden="true"></i>
      <!-- <i class="fa fa-eye nav-icon" aria-hidden="true"></i> -->
      <!--  <figure >
  <img src="<?=base_url();?>uploads/icons/head.png" alt="Text" >
</figure> -->

    <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
      
    </a>
  </li>




  <li >
    <a href="<?=base_url()?>/presentation-slide-view/<?=$presentation_topic['topic_id']?>" class="btn btn-primary-outline present" target="_blank"  title="Present">
      <!-- <i class="fa fa-eye nav-icon" aria-hidden="true"></i> -->
       <figure >
  <img src="<?=base_url();?>uploads/icons/folldy-logo.png" alt="presentation" >
  <!-- <figcaption>Present</figcaption> -->
</figure>

    <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
      
    </a>
  </li>




  <!-- <li class="has-subnav">
    <a href="javascript:void(0)">
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


  <li>
  <a href="<?=base_url()?>presentation" id="" class="btn btn-primary-outline">
  <!-- <i class="fa fa-home nav-icon"></i> -->
   <figure >
  <img src="<?=base_url();?>uploads/icons/home-button.png" alt="presentation" >
  <!-- <figcaption> Home</figcaption> -->
</figure>
    <i class="icon-angle-right"></i><i class="icon-angle-down"></i>

     
  </a>
  </li>

  <li>
  <a href="javascript:void(0)" id="closemenu" class="btn btn-primary-outline">
  <i class="fa fa-close nav-icon"></i>
     
  </a>
  </li>

    </ul>

   <!--  <ul class="logout">

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
  outline: none;
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
    /*display: flex;
  align-items: center;
  justify-content: center */
  background-size: contain ; background-size: 100%;
  background-position: center;
  background-repeat: no-repeat;


}
.timage{
    
    /*height: calc(68vh - 25vmax);*/
   /* display: flex;
  align-items: center;
  justify-content: center */
  background-size: contain ; background-size: 100%;
  background-position: center;
  background-repeat: no-repeat; width: auto; 
 

}



.contents{
  
    background-color: !important transparent;
    position: absolute; 
   
}
.contentstopic{
  
    background-color: !important transparent;
    position: absolute; 
   
}
.topics{
    /*width: 50%;*/

}

#ppage{
  outline: solid #fdeb10de;
  height: 450px;
  width: 800px;
  background-color: <?=$presentation_topic['backgroundcolor']?>;
  background-image:url('<?php echo base_url().'uploads/background/'.$presentation_topic['backgroundimage']?>');
  background-size: contain ; background-size: 100%;
  background-position: center;
  background-repeat: no-repeat;
}
.card-header {
  outline-color: #ccc;
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

#ppage{
  box-sizing:unset !important;

}
.timage{
  box-sizing:unset !important;

}
.circle{
  box-sizing:unset !important;

}

.tox-tinymce{
height: 500px !important;
}


.tox-tinymce-inline .tox-editor-header {
     border: 1px solid #fff !important;
    }

   /*.toolbar-wrapper { position: relative; }*/
    /*.toolbars { position: absolute;     right: 30px; bottom: 30px; }*/
</style>


<input type="hidden" name="topic_id"  id="topic_id" value="<?= $topic_id?>"> 






<div class="topbar" style="height: 82px;width: 800px; background-color: #fff; top: 20px; left: 60px; position: absolute;">
  

  <div class="col-md-12"> <div class="row">
  <div class="col-sm-2"  style="padding-top: 3%;color: #000 !important; font-size: 12px !important;" id="topic_title">   </div>
  <div class="col-sm-8 toolbars" ></div>
  <div class="col-sm-2" style="padding-top: 3%;font-size: 12px !important;"> New Topic <a href="javascript:void(0)"  data-toggle="modal" data-target="#exampleModaltopic" title="Topic Add">
      <i class="fa fa-plus nav-icon"></i>
     
    </a></div>
</div>  </div>
</div>

  <section class="" style="position: absolute;
    display: block;
    vertical-align: top;
    top: 110px;
    left: 60px;
    right: 0;
    bottom: 0;
    padding: 0;">
<?php
// $string="yfSSyfyfy323fde";
// if (!preg_match('/[^A-Za-z0-9]/', $string)) // '/[^a-z\d]/i' should also work.
// {
//   // string contains only english letters & digits
// }else{
//   echo "ssssss";
// }

?>


  <div class="ppage" id="ppage" >
   
        <?php 
        // print_r($presentation_topic);
       if(!empty($presentation_topic['topics']) || !empty($presentation_topic['image'])|| $presentation_topic['content']){
        
        ?>

        <div class=" topics">
          <?php 
          foreach ($presentation_topic['topics'] as $tpcs) {

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
if($tpcs["topic_backgroundimage"] ==""){

   echo '<div class="circle tcircle task" data-val="c'.$tpcs['topic_id'].'"  data-id="'.$tpcs['topic_id'].'" style="background-color:'.$tpcs['topic_backgroundcolor'].'; color:'.$tpcs['topic_color'].';  top:'.$topp.'px; left:'.$leftp.'px;    position:absolute; height:'.$tpcs['topic_height'].'px;width:'.$tpcs['topic_width'].'px;  " >';

    if($tpcs['topic_title'] == ""){
       echo'<div class="tcontent tinymce-body"  id="i'.$tpcs['topic_id'].'"  data-val="p'.$tpcs['topic_id'].'" data-id="'.$tpcs['topic_id'].'"  style="top:'.$tpcs['topic_content_position_top'].'px; left:'.$tpcs['topic_content_position_left'].'px;position:absolute; width:10px; ">'.$tpcs['topic_title'].'</div>';


    }else{
       echo'<div class="tcontent tinymce-body" id="i'.$tpcs['topic_id'].'"  data-val="p'.$tpcs['topic_id'].'" data-id="'.$tpcs['topic_id'].'"  style="top:'.$tpcs['topic_content_position_top'].'px; left:'.$tpcs['topic_content_position_left'].'px;position:absolute;">'.$tpcs['topic_title'].'</div>';

    }
   

    echo'<span data-html2canvas-ignore="true"  class="resume_create_up_link no_print pls'.$tpcs['topic_id'].' pl"><a href="javascript:void(0)" data-id="'.$tpcs['topic_id'].'" class="pla"  ><icon class="fa fa-plus icon_size24"></icon></a></span>
   <span data-html2canvas-ignore="true" id="del'.$tpcs['topic_id'].'"  class="resume_create_up_link no_print  dl">';
   // echo '<a href="javascript:void(0)" data-id="'.$tpcs['topic_id'].'" id="deletei" class="delete-topic"><icon class="fa fa-trash icon_size24"></icon></a>';


   echo '<a href="javascript:void(0)" data-id="'.$tpcs['topic_id'].'" id="deletei" class="delete-topic"><img src="'.base_url().'uploads/icons/delete.png" alt="presentation" ></a>';

if($tpcs["practice_type"] !=1){
  // echo'<a href="javascript:void(0)" class="plus" data-id="'.$tpcs['topic_id'].'">
  //  <icon class="fa fa-plus icon_size24"></icon>
  //  </a>';

  if($tpcs["practice_type"] !=2 && $tpcs["sametopcount"] ==0){
    echo '<a href="javascript:void(0)" class="plus " data-id="'.$tpcs['topic_id'].'"><img src="'.base_url().'uploads/icons/add.png" alt="presentation" ></a>';
  }

  // if($tpcs["sametopcount"] ==0){

    echo '<a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalsamesubtopic" title=" Add Topic" data-id="'.$tpcs['topic_id'].'" class="addsub-topic"><img src="'.base_url().'uploads/icons/topic-icon.png" alt="presentation" ></a>';
    // }


    echo '<a a href="javascript:void(0)"  data-toggle="modal" data-target="#exampleModalsamesubtext" data-id="'.$tpcs['topic_id'].'" class="addsub-topic" title="Text Add"><img src="'.base_url().'uploads/icons/head.png" alt="Text" ></a>';
        // echo '<a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalsubtopic" title=" Add Topic" data-id="'.$tpcs['topic_id'].'" class="addsub-topic"><icon class="fa fa-child icon_size24"></icon></a>';
    }


// echo '<a a href="javascript:void(0)"  data-toggle="modal" data-target="#exampleModaltitle" title="Text Add"><icon class="fa fa-header icon_size24"></icon></a>';
 

   echo '<a href="javascript:void(0)" class="arrows"  data-id="'.$tpcs['topic_id'].'"><icon class="fa fa-arrows icon_size24"></icon></a> </span> </div>';
 }else{

   if($tpcs["topic_backgroundimage"] != ""){
                                $word = "chapter";
                                $myimage = $tpcs["topic_backgroundimage"];
                                 $myimage = str_replace(' ', '%20', $myimage);
                                $path =  base_url().'uploads/background/';
                               
                                  // Test if string contains the word 
                                if(strpos($myimage, $word) !== false){
                                      $path =  base_url().'uploads/';
                                } 

                                $bimage = $path.$myimage;
                                 
                    }
      echo '<div class="circle mcircle task" data-val="c'.$tpcs['topic_id'].'"  data-id="'.$tpcs['topic_id'].'" style="background-color:'.$tpcs['topic_backgroundcolor'].'; color:'.$tpcs['topic_color'].';  top:'.$topp.'px; left:'.$leftp.'px;   background-image:url('.$bimage.'); position:absolute; height:'.$tpcs['topic_height'].'px;width:'.$tpcs['topic_width'].'px;  " >';

if($tpcs['topic_title'] == ""){
       echo'<div class="tcontent tdrag tinymce-body"  id="i'.$tpcs['topic_id'].'"  data-val="p'.$tpcs['topic_id'].'" data-id="'.$tpcs['topic_id'].'"  style="top:'.$tpcs['topic_content_position_top'].'px; left:'.$tpcs['topic_content_position_left'].'px;position:absolute; width:10px; ">'.$tpcs['topic_title'].'</div>';

    }else{
      echo'<div class="tcontent tdrag tinymce-body" id="i'.$tpcs['topic_id'].'"  data-val="p'.$tpcs['topic_id'].'" data-id="'.$tpcs['topic_id'].'"  style="top:'.$tpcs['topic_content_position_top'].'px; left:'.$tpcs['topic_content_position_left'].'px;position:absolute;">'.$tpcs['topic_title'].'</div>';
}

  echo'<span data-html2canvas-ignore="true"  class="resume_create_up_link no_print pls'.$tpcs['topic_id'].' pl"><a href="javascript:void(0)" data-id="'.$tpcs['topic_id'].'" class="pla"  ><icon class="fa fa-plus icon_size24"></icon></a></span>
   <span data-html2canvas-ignore="true" id="del'.$tpcs['topic_id'].'"  class="resume_create_up_link no_print  dl">';

   // echo'<a href="javascript:void(0)" data-id="'.$tpcs['topic_id'].'" id="deletei" class="delete-topic"><icon class="fa fa-trash icon_size24"></icon></a>';

   echo '<a href="javascript:void(0)" data-id="'.$tpcs['topic_id'].'" id="deletei" class="delete-topic"><img src="'.base_url().'uploads/icons/delete.png" alt="presentation" ></a>';
if($tpcs["practice_type"] !=1){

  if($tpcs["practice_type"] !=2 && $tpcs["sametopcount"] ==0){
echo '<a href="javascript:void(0)" class="plus " data-id="'.$tpcs['topic_id'].'"><img src="'.base_url().'uploads/icons/add.png" alt="presentation" ></a>';

  }
  // if($tpcs["sametopcount"] ==0){

echo '<a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalsamesubtopic" title=" Add Topic" data-id="'.$tpcs['topic_id'].'" class="addsub-topic"><img src="'.base_url().'uploads/icons/topic-icon.png" alt="presentation" ></a>';
// }
echo '<a a href="javascript:void(0)"  data-toggle="modal" data-id="'.$tpcs['topic_id'].'" data-target="#exampleModalsamesubtext" class="addsub-topic" title="Text Add"><img src="'.base_url().'uploads/icons/head.png" alt="Text" ></a>';
   
}


   echo '<a href="javascript:void(0)" class="arrows"  data-id="'.$tpcs['topic_id'].'"><icon class="fa fa-arrows icon_size24"></icon></a> </span> </div>';
 }


    if( $tpcs['explanation'] !=""){      
        echo' <div class="contents topiccontent tdragtopiccontent "  id="cont'.$tpcs['topic_id'].'" data-id="'.$tpcs['topic_id'].'" style="height:'.$tpcs["explanation_height"].'px; width:'.$tpcs["explanation_width"].'px;left: '.$tpcs['explanation_left'].'px ; 
    top:'.$tpcs['explanation_top'].'px ;" >
          <div class="tinymce-content">'.$tpcs['explanation'].'</div>
          <span class="resume_create_up_link contlink">
              <span class="spacer"></span>
              <a href="javascript:void(0)" data-id="'.$tpcs['topic_id'].'" id="delete-topiccontent" class="delete-topiccontent">
              <icon class="fa fa-trash icon_size24"></icon>
              </a>
              <a href="javascript:void(0)"  class="arrows" data-id="'.$tpcs['topic_id'].'">
                <icon class="fa fa-arrows icon_size24"></icon>
              </a>
          </span>
        </div>';
      }

    }// forech close ?>





<?php
// echo $presentation_topic['image']."SDdddddddddddd";
if(!empty($presentation_topic['image'])){
 foreach ($presentation_topic['image'] as $img) {

              if($img['image_position_left'] != ""){
              $lefti = $img['image_position_left'];
              }else{
              $lefti = 250;
              }

              if($img['image_position_top'] != ""){
              $topi = $img['image_position_top'];
              }else{
              $topi = 250;
              }

              echo '<div class="timage" data-id="'.$img["image_id"].'"   style=" position:absolute;top:'.$topi.'px;left:'.$lefti.'px;background-image:url('.base_url().'uploads/chapter/'.$img["image"].'); height:'.$img["image_height"].'px;width:'.$img["image_width"].'px;"><span class="resume_create_up_link no_print" data-html2canvas-ignore="true">
    <span class="spacer"></span>
    <a href="javascript:void(0)" data-id="'.$img["image_id"].'" id="delete-image" class="delete-image">
    <icon class="fa fa-trash icon_size24"></icon>
    </a>arrows
    <a href="javascript:void(0)"  class="" data-id="'.$img['image_id'].'"><icon class="fa fa-arrows icon_size24"></icon></a>
    </span>

              </div>';
            } }?>







        </div>
      <?php } ?>
<?php if($presentation_topic['content']){

  ?>
        <div class="contents maincontent tdragcontent "  id="cont<?=$topic_id?>" data-id="<?=$topic_id?>" style="height:<?=$presentation_topic["content_height"]?>px; width:<?=$presentation_topic["content_width"]?>px; left: <?=$presentation_topic['position_left']?>px ; 
    top: <?=$presentation_topic['position_top']?>px ;" >
          <div class="tinymce-content"><?=$presentation_topic['content']?></div>
          <span class="resume_create_up_link contlink">
              <span class="spacer"></span>
              <a href="javascript:void(0)" data-id="<?=$topic_id?>" id="delete-content" class="delete-content">
              <icon class="fa fa-trash icon_size24"></icon>
              </a>
              <a href="javascript:void(0)"  class="arrows" data-id="<?=$topic_id?>">
                <icon class="fa fa-arrows icon_size24"></icon>
              </a>
          </span>
        </div>
         <?php } 
       ?>
    
      </div>

 <form id="imgupload" enctype="multipart/form-data">
     <input type="hidden" name="imagename" id="imghidden">
     <input type="hidden" name="top_id"  id="top_id" value="<?= $topic_id?>"> 
    </form>




 
   
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




<!-- Modal content -->
<div class="modal " id="modalFolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle"> Folder</h5>
    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
      <!-- <span aria-hidden="true">&times;</span> -->
    <!-- </button>
    onclick="createFolder();" -->
  </div>
  <form action="<?=base_url('create-folder')?>" method="post" class="card" enctype="multipart/form-data">
  
  <div class="modal-body">
      <div class="form-group ">
      <label>Folder Name</label>   
       <input type="hidden" name="folder_topic" id="folder_topic"  value="<?= $topic_id?>"  > 

      <input type="text" name="folder" id="folder" pattern="[a-zA-Z0-9\s]{2,}" title="Special characters not allowed" class="form-control" required="">
      <!-- pattern="[A-Za-z]{2,}" title="only accept alphabets" -->
      </div>
     
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" >Create</button>
  </div>
  </form>
    </div>
  </div>
</div>






<!-- Modal content -->
<div class="modal " id="modalFolderName" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle"> Folder Name Change</h5>
    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
      <!-- <span aria-hidden="true">&times;</span> -->
    <!-- </button>
    onclick="createFolder();" -->
  </div>
  <form action="<?=base_url('rename-folder')?>" method="post" class="card" enctype="multipart/form-data">
  
  <div class="modal-body">
      <div class="form-group ">
      <label>Old Name</label>   
       <input type="hidden" name="ftopic" id="ftopic"  value="<?= $topic_id?>"  > 

      <input type="text" readonly="readonly" name="old" id="old"  class="form-control" required="required">
      <!-- pattern="[A-Za-z]{2,}" title="only accept alphabets" -->
      </div>


      <div class="form-group ">
      <label>New Name</label>   
      <input type="text"  name="new" id="new" pattern="[a-zA-Z0-9\s]{2,}" title="special characters not allowed" class="form-control" required="required">
      <!-- pattern="[A-Za-z]{2,}" title="only accept alphabets" -->
      </div>


     
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" >Create</button>
  </div>
  </form>
    </div>
  </div>
</div>






<div class="modal " id="modalImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle"> Image</h5>
    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
      <!-- <span aria-hidden="true">&times;</span> -->
    <!-- </button> -->
  </div>
  <!-- <form action="<?=base_url('upload-image')?>" method="post" class="card" enctype="multipart/form-data"> -->
    <form>
  <div class="modal-body">
    
      <div class="form-group ">
      <label>Image</label>   
       <input type="hidden" name="topid" id="topid"  value="<?= $topic_id?>"  > 
       <input type="file" name="image" id="image"   > 
      </div>
       <div class="form-group ">
      <label>Image Title</label>   
       <input type="text" class="form-control" name="image_title" id="image_title"   > 
      </div>
      <div class="form-group">
            <label class="form-label">Tags</label>
            <input type="text" class="form-control key-tags" id="image_tags" name="image_tags"  placeholder="Enter Tags" required="">
        </div>
      
     
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="imagegalr" class="btn btn-primary ml-auto"  data-dismiss="modal">Upload</button>
    
  </div>
  </form>

    </div>
  </div>
</div>
<!-- Modal Head -->



<!-- Modal content -->
<div class="modal " id="exampleModaltopic" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1000px !important; height: 280px;">
    <div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Topic</h5>
    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
      <!-- <span aria-hidden="true">&times;</span> -->
    <!-- </button> -->
  </div>
  <form  method="post" class="card" enctype="multipart/form-data">
  <div class="modal-body">
    <div class="form-group ">
        <div id="tbars" class="tbars" style="height: 80px;"></div>
    </div>
   
      

              <div class="col-sm-12">

    <div class="row">
              <div class="col-md-6 col-lg-6">
      <div class="form-group ">
        <label>Topic Title</label>   
        <input type="hidden" name="tparent" id="tparent"  value="<?= $topic_id?>"  > 
        <div  id="title"  class="form-control tinymce-title"></div>
      </div></div>
      <div class="col-md-6 col-lg-6">
      <div class="form-group">
            <label class="form-label">Topic Tags</label>
            <input type="text"  class="form-control key-tags" id="topic_tags" name="topic_tags"  placeholder="Enter Topic Tags" required="">
            <input type="hidden" name="topic_image" id="topic_image">
        </div>
</div>
</div>
</div>



<div class="col-sm-12 imagefolderdiv_title" >
  <h3>Folder</h3>
  <div class="row" style="height: 300px; overflow-x: scroll;">



        

<!-- </div> -->




       <?php
$path = './uploads/background/';

$dirs = array();

// directory handle
$dir = dir($path);

while (false !== ($entry = $dir->read())) {
    if ($entry != '.' && $entry != '..') {
   if (is_dir($path . '/' .$entry)) {
    $dirs[] = $entry;

    // $classentrys = str_replace(' ', '', $entry);
$classentrys = $entry;

?>





         





      

        
<?php

if(count(glob("./uploads/background/".$entry."/elements/*"))!=0){
 $firstFile2 = scandir("./uploads/background/".$entry."/elements")[2]; 
?>

  
<div class="col-sm-2" onclick="return hideshowimage_title('<?=$classentrys?>elementstitle',1);"><img src="<?=base_url()?>uploads/background/<?=$entry?>/elements/<?=$firstFile2?>"  style="width:120px; height:100px; "><span class=""> <?=$entry?> </span>

</div>
    
<?php }else{ ?>

<div class="col-sm-2" onclick="return hideshowimage_title('<?=$classentrys?>elementstitle',1);"><img src="<?=base_url()?>uploads/background/pictures-folder.png"  style=" width:120px; height:100px; "><span class=""> <?=$entry?> </span></div>
<?php } ?>

        
        

<?php }}} ?>




       <?php


if(count(glob("./uploads/chapter/*"))!=0){
 $firstFile2 = scandir("./uploads/chapter")[2]; 
?>

  <!-- <div class="col-md-6"  onclick="return hideshow('<?=$entry?>');"><img src="<?=base_url()?>uploads/background/<?=$entry.$firstFile?>" style=" width:150px; height:100px;">  -->
<div class="col-sm-2" onclick="return hideshowimage_title('chapter',1);"><img src="<?=base_url()?>uploads/chapter/<?=$firstFile2?>"  style=" width:120px; height:100px;"><span class=""> Image Gallery </span></div>
    
<?php }else{ ?>

<div class="col-sm-2" onclick="return hideshowimage_title('chapter',1);"><img src="<?=base_url()?>uploads/background/pictures-folder.png"  style=" width:120px; height:100px; "><span class=""> <?=$entry?> </span></div>
<?php } ?>

        




</div>
    </div>






<a href="javascript:void(0)" onclick="return back_title();" id="" class="btn btn-primary btntitle"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>  
       <?php
$path = './uploads/background/';

$dirs = array();

// directory handle
$dir = dir($path);

while (false !== ($entry = $dir->read())) {
    if ($entry != '.' && $entry != '..') {
   if (is_dir($path . '/' .$entry)) {
    $dirs[] = $entry; 
     // $classentry = str_replace(' ', '', $entry);
$classentry = $entry;

?>
 





    
<div class="col-sm-12 <?=$classentry?>elementstitle el" style="display: none;">
<h4 class="btntitle"><?php echo $entry ?> Images</h4>
  
<div class="row" style="height: 300px; overflow-x: scroll;">



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
<div class="col-sm-2"><img src="<?=base_url().$image ?>" style=" width:120px; height:100px; padding: 5%;" class="<?=$entry.$i?> imm"
       onclick = "addImagetopic_title('<?=$entry?>/elements/<?=basename($image)?>','<?=$entry.$i?>')" 
     
      alt="Random image" style="
    padding: 1%;
"/><span class="tlabel"> </span>

</div>
   

<?php } else {
       continue;
    }
    $i++;
      }
    } ?>
   

</div></div>
<?php }}} ?>

<div class="col-sm-12 chapter el" style="display: none;">
<h4 class="btntitle">Gallery Images</h4>
  <div class="search">
  <input type="text" id="imagesearchFol" class="searchTerm" placeholder="What are you looking for?">
  <button type="button" onclick="return getImageFol();" class="searchButton">
    <i class="fa fa-search"></i>
     </button>
   </div>

<div class="row" style="height: 280px; overflow-x: scroll;">


<?php
 
    if(!empty($images)){
  $i = 0;
     foreach($images as $image)
    
{
    // $image = $files[$i];
    $supported_file = array(
        'gif',
        'jpg',
        'jpeg',
        'png'
     );
     // $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
     // if (in_array($ext, $supported_file)) {
    // echo basename($image)."<br />"; // show only image name if you want to show full path then use this code // echo $image."<br />";
    ?>      
<div class="col-sm-6"><img src="<?=base_url().'uploads/chapter/'.$image['chapter_image'] ?>" style=" width: 440px;
    height: 220px; margin-bottom: 5%;" class="<?=$entry.$i?> imm"
       onclick = "addImagetopic_title('<?=$image['chapter_image']?>','<?=$entry.$i?>')" 
     
      alt="Random image" style="
    padding: 1%;
"/><span class="tlabel"> </span>



</div>

  
<?php
    $i++;
      }
    } ?>







   

</div></div>







     
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary"  onclick="return addtopic();">Add</button>
  </div>
</form>
    </div>
  </div>
</div>






<div class="modal " id="exampleModalsamesubtext" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle"> Add Text</h5>
    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
      <!-- <span aria-hidden="true">&times;</span> -->
    <!-- </button>
    onclick="createFolder();" -->
  </div>
  <form action="" method="post" class="card" >
  
  <div class="modal-body">


        <div class="form-group ">
        <div id="tbarText" class="tbarText" style="height: 80px;"></div>
    </div>
   
      
        <input type="hidden" name="tparenttext" id="tparenttext"> 

              <div class="col-sm-12">

    <div class="row">
              <div class="col-md-12 col-lg-12">
      <div class="form-group ">
        <label>Topic Title</label>   
        
        <div  id="title_text"  class="form-control tinymce-title-text"></div>
     
      </div></div>
      <div class="col-md-6 col-lg-6">
      
</div>
</div>
</div>
     <!--  <div class="form-group ">
      <label>Title</label>   
       <input type="hidden" name="folder_topic" id="folder_topic"  value="<?= $topic_id?>"  > 

      <input type="text" name="folder" id="folder"  class="form-control" required="">
      </div> -->
     
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
    <button type="button" class="btn btn-primary" onclick="return addsamesubtext();" >Create</button>
  </div>
  </form>
    </div>
  </div>
</div>





<div class="modal " id="exampleModalsamesubtopic" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 800px !important;">
    <div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Topic</h5>
    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
      <!-- <span aria-hidden="true">&times;</span> -->
    <!-- </button> -->
  </div>
  <form  method="post" class="card" enctype="multipart/form-data">
  <div class="modal-body">
    <div class="form-group ">
        <div id="tbarsub" class="tbarsub" style="height: 80px;"></div>
    </div>
   
      

              <div class="col-sm-12">
    <div class="row">
              <div class="col-md-6 col-lg-6">
      <div class="form-group ">
        <label>Topic Title</label>   
        <input type="hidden" name="tparentsub" id="tparentsub"> 
        <div  id="title_sub"  class="form-control tinymce-title-sub"></div>
      </div></div>
      <div class="col-md-6 col-lg-6">
      <div class="form-group">
            <label class="form-label">Topic Tags</label>
            <input type="text"  class="form-control key-tags" id="topic_tags_sub" name="topic_tags_sub"  placeholder="Enter Topic Tags" required="">
            <input type="hidden" name="topic_image_sub" id="topic_image_sub">
        </div>
</div>
</div>
</div>



<div class="col-sm-12 imagefolderdiv_title" >
  <h3>Folder</h3>
  <div class="row" style="height: 300px; overflow-x: scroll;">



        

<!-- </div> -->




       <?php
$path = './uploads/background/';

$dirs = array();

// directory handle
$dir = dir($path);

while (false !== ($entry = $dir->read())) {
    if ($entry != '.' && $entry != '..') {
   if (is_dir($path . '/' .$entry)) {
    $dirs[] = $entry;

    // $classentrys = str_replace(' ', '', $entry);
$classentrys = $entry;

?>





         





      

        
<?php

if(count(glob("./uploads/background/".$entry."/elements/*"))!=0){
 $firstFile2 = scandir("./uploads/background/".$entry."/elements")[2]; 
?>

  
<div class="col-sm-2" onclick="return hideshowimage_title('<?=$classentrys?>elementstitle',1);"><img src="<?=base_url()?>uploads/background/<?=$entry?>/elements/<?=$firstFile2?>"  style="width:120px; height:100px; "><span class=""> <?=$entry?> </span>

</div>
    
<?php }else{ ?>

<div class="col-sm-2" onclick="return hideshowimage_title('<?=$classentrys?>elementstitle',1);"><img src="<?=base_url()?>uploads/background/pictures-folder.png"  style=" width:120px; height:100px; "><span class=""> <?=$entry?> </span></div>
<?php } ?>

        
        

<?php }}} ?>




       <?php


if(count(glob("./uploads/chapter/*"))!=0){
 $firstFile2 = scandir("./uploads/chapter")[2]; 
?>

  <!-- <div class="col-md-6"  onclick="return hideshow('<?=$entry?>');"><img src="<?=base_url()?>uploads/background/<?=$entry.$firstFile?>" style=" width:150px; height:100px;">  -->
<div class="col-sm-2" onclick="return hideshowimage_title('chapter',1);"><img src="<?=base_url()?>uploads/chapter/<?=$firstFile2?>"  style=" width:120px; height:100px; "><span class=""> Image Gallery </span></div>
    
<?php }else{ ?>

<div class="col-sm-2" onclick="return hideshowimage_title('chapter',1);"><img src="<?=base_url()?>uploads/background/pictures-folder.png"  style=" width:120px; height:100px; "><span class=""> <?=$entry?> </span></div>
<?php } ?>

        




</div>
    </div>






<a href="javascript:void(0)" onclick="return back_title();" id="" class="btn btn-primary btntitle"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>  
       <?php
$path = './uploads/background/';

$dirs = array();

// directory handle
$dir = dir($path);

while (false !== ($entry = $dir->read())) {
    if ($entry != '.' && $entry != '..') {
   if (is_dir($path . '/' .$entry)) {
    $dirs[] = $entry; 
     // $classentry = str_replace(' ', '', $entry);
$classentry = $entry;

?>
 





    
<div class="col-sm-12 <?=$classentry?>elementstitle el" style="display: none;">
<h4 class="btntitle"><?php echo $entry ?> Images</h4>
  
<div class="row" style="height: 300px; overflow-x: scroll;">



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
<div class="col-sm-2"><img src="<?=base_url().$image ?>" style=" width:120px; height:100px; padding: 5%;" class="<?=$entry.$i?> imm"
       onclick = "addImagetopic_title_sub('<?=$entry?>/elements/<?=basename($image)?>','<?=$entry.$i?>')" 
     
      alt="Random image" style="
    padding: 1%;
"/><span class="tlabel"> </span>

</div>
   

<?php } else {
       continue;
    }
    $i++;
      }
    } ?>
   

</div></div>
<?php }}} ?>

<div class="col-sm-12 chapter el" style="display: none;">
<h4 class="btntitle">Gallery Images</h4>
  <div class="search">
  <input type="text" id="imagesearchFol" class="searchTerm" placeholder="What are you looking for?">
  <button type="button" onclick="return getImageFol();" class="searchButton">
    <i class="fa fa-search"></i>
     </button>
   </div>

<div class="row" style="height: 280px; overflow-x: scroll;">



 





<?php
 
    if(!empty($images)){
  $i = 0;
     foreach($images as $image)
    
{
    // $image = $files[$i];
    $supported_file = array(
        'gif',
        'jpg',
        'jpeg',
        'png'
     );
    
    ?>                     
<!-- <button class="tablinks" onclick="openCity(event,'<?=$entry?>')"><?=$entry?></button> -->

<div class="col-sm-6"><img src="<?=base_url().'uploads/chapter/'.$image['chapter_image'] ?>" style=" width: 440px;
    height: 220px; margin-bottom: 5%;" class="<?=$entry.$i?> imm"
       onclick = "addImagetopic_title('<?=$image['chapter_image']?>','<?=$entry.$i?>')" 
     
      alt="Random image" style="
    padding: 1%;
"/><span class="tlabel"> </span>



</div>


  
<?php
    $i++;
      }
    } ?>
   

</div></div>







     
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary"  onclick="return addtopic_samesub();">Add</button>
  </div>
</form>
    </div>
  </div>
</div>

  






<!-- Modal content -->
<div class="modal " id="exampleModaltitle" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle"> Add Text</h5>
    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
      <!-- <span aria-hidden="true">&times;</span> -->
    <!-- </button>
    onclick="createFolder();" -->
  </div>
  <form action="" method="post" class="card" >
  
  <div class="modal-body">


        <div class="form-group ">
        <div id="tbarHead" class="tbarHead" style="height: 80px;"></div>
    </div>
   
      

              <div class="col-sm-12">

    <div class="row">
              <div class="col-md-12 col-lg-12">
      <div class="form-group ">
        <label>Topic Title</label>   
        
        <div  id="title_texts"  class="form-control tinymce-title-head"></div>
        <input type="hidden" name="text_topics" id="text_topics"  value="<?= $topic_id?>"  >
      </div></div>
      <div class="col-md-6 col-lg-6">
      
</div>
</div>
</div>
     
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
    <button type="button" class="btn btn-primary" onclick="return addtext();" >Create</button>
  </div>
  </form>
    </div>
  </div>
</div>


  


<style type="text/css">
  .about-accordion-open ul { width: 350px !important; }
  .main-menu { overflow: visible; }
  .openup { overflow: visible !important; }
</style>


<script type="text/javascript">

  $(document).ready(function(){
    $(".dl").hide();
    });

  $(".pl").click(function(){
      var id = $(this).find('.pla').attr('data-id');
      // $(".dl").css("display","none");      
      $("#del"+id).show();
      // $('.pl').css("display","block;");
      // $('.pl').attr('style', 'display: inline-block');
      $(".pls"+id).css("display","none");

  });

 $(".addsub-topic").click(function(){
     var id = $(this).attr('data-id');
     // alert(id);
      $("#tparentsub").val(id);
      $("#tparenttext").val(id);

      // alert($("#tparentsub").val());
  });

 function addtopic_samesub(){


  con = $('#topiccont').html();
  // head = $('.circle__content').text();
  var tid = "<?= $topic_id?>";
  var sid = $("#tparentsub").val();
  var title = $("#title_sub").html();
  var topictags = $("#topic_tags_sub").val();
  var topicimage = $("#topic_image_sub").val();

// alert(sid);

       $.ajax({
        url:base_url+'add-sametopic',
        data:{sid:sid,title:title,topictags:topictags,topicimage:topicimage,tid:tid},
        type:'post',
        success: function(out){
            $("#exampleModalsamesubtopic").modal('hide');
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


 function addsamesubtext(){

  var title = $("#title_text").html();
  var topic = $("#tparenttext").val();
   // alert(topic);

  
       $.ajax({
        url:base_url+'create-sametext',
        data:{topic:topic,title:title},
        type:'post',
        success: function(out){
          
          $("#exampleModalsamesubtext").modal('hide');
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








 function addtext(){


  var title = $("#title_texts").html();
  var topic = $("#text_topics").val();

  
       $.ajax({
        url:base_url+'create-text',
        data:{topic:topic,title:title},
        type:'post',
        success: function(out){
          
            $("#exampleModaltitle").modal('hide');
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

 <!-- <script src="https://cdn.tiny.cloud/1/jrsjj47h3k9y6272lmftp2j56agyzl6a86u1fvt8n8bzbxvw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
 <script type="text/javascript">
    
// tinymce.init({
//   fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt"
// });
// $(".tcontent").click( function() {
var emailBodyConfig = {
  selector: '.tinymce-body',
  menubar: false,
  inline: true,
  fontsize_formats: "8px 10px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 26px 28px 32px 34px 36px 40px 44px 48px 50px",

init_instance_callback: function (editor) {
    editor.on('change', function (e) {
      // var tid = $(this).attr('data-id');
      // alert(editor.id);
    // var content = $(this).text();
    id=editor.id;
     var tid = $("#"+id).attr('data-id');
      var content = tinymce.get(id).getContent();
     // var content =editor.content;
     // alert(content);
    $.ajax({
        url:base_url+'update-topic',
        type:'post',
        data:{id:content,cval:'topic_title',topic_id:tid},
        success: function(out){
        var out = JSON.parse(out);
        if(out.status == 404){
            window.location.href = base_url;
        }
        else if(out.status == 1){
            // window.location.href=window.location.href
        }
        else{

        }
        }
     })
    });
  },
  fixed_toolbar_container: ".toolbars",
   plugins: [
    'lists',
    'autolink'
  ],
  toolbar: [
    'undo redo | bold italic underline | fontselect fontsizeselect',
    'forecolor backcolor | alignleft aligncenter alignright alignfull | numlist bullist outdent indent'
  ],
  valid_elements: 'p[style],strong,em,span[style],ul,ol,li',
  valid_styles: {
    '*': 'font-size,font-family,color,text-decoration,text-align'
  },
  // powerpaste_word_import: 'clean',
  // powerpaste_html_import: 'clean',
 setup: function (editor) {
    editor.on('init', function () {
    editor.execCommand("fontSize", false, "20px");
     editor.execCommand("fontName", false, "Arial");
    });
    }
};



var emailcotentConfig = {
  selector: '.tinymce-content',
  menubar: false,
  inline: true,
  fontsize_formats: "8px 10px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 26px 28px 32px 34px 36px 40px 44px 48px 50px",
init_instance_callback: function (editor) {
    editor.on('change', function (e) {
      // var tid = $(this).attr('data-id');
      // alert(editor.id);
    // var content = $(this).text();
    id=editor.id;
 
     var tid = "<?= $topic_id?>";
  
    var content = tinymce.get(id).getContent();
     // alert(content+' '+tid);

      $.ajax({
        url:base_url+'update-topic',
        type:'post',
        data:{id:content,cval:'content',topic_id:tid},
        success: function(out){
        var out = JSON.parse(out);
        if(out.status == 404){
            window.location.href = base_url;
        }
        else if(out.status == 1){
            // window.location.href=window.location.href
        }
        else{

        }
        }
     })
    });
  },
  fixed_toolbar_container: ".toolbars",
   plugins: [
    'lists',
    'autolink'
  ],
  toolbar: [
    'undo redo | bold italic underline | fontselect fontsizeselect',
    'forecolor backcolor | alignleft aligncenter alignright alignfull | numlist bullist outdent indent'
  ],
  valid_elements: 'p[style],strong,em,span[style],ul,ol,li',
  valid_styles: {
    '*': 'font-size,font-family,color,text-decoration,text-align'
  },
  // powerpaste_word_import: 'merge',
  // powerpaste_html_import: 'merge',
  setup: function (editor) {
    editor.on('init', function () {
    editor.execCommand("fontSize", false, "20px");
     editor.execCommand("fontName", false, "Arial");
    });
    }
};




var emailTitleConfig = {
  selector: '.tinymce-title',
  menubar: false,
  inline: true,
  fontsize_formats: "8px 10px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 26px 28px 32px 34px 36px 40px 44px 48px 50px",
    
init_instance_callback: function (editor) {
    editor.on('change', function (e) {
      // var tid = $(this).attr('data-id');
      // alert(editor.id);
    // var content = $(this).text();

    id=editor.id;
     var tid = $("#"+id).attr('data-id');
      var content = tinymce.get(id).getContent();
     // var content =editor.content;
     // alert(content);
    $.ajax({
        url:base_url+'update-topic',
        type:'post',
        data:{id:content,cval:'topic_title',topic_id:tid},
        success: function(out){
        var out = JSON.parse(out);
        if(out.status == 404){
            window.location.href = base_url;
        }
        else if(out.status == 1){
            // window.location.href=window.location.href
        }
        else{

        }
        }
     })
    });
    
  },
  fixed_toolbar_container: ".tbars",
 
  toolbar: [
    'undo redo | bold italic underline | fontselect fontsizeselect',
    'forecolor backcolor | alignleft aligncenter alignright alignfull | numlist bullist outdent indent'
  ],
  valid_elements: 'p[style],strong,em,span[style],ul,ol,li',
  valid_styles: {
    '*': 'font-size,font-family,color,text-decoration,text-align'
  },
  // powerpaste_word_import: 'clean',
  // powerpaste_html_import: 'clean',
  setup: function (editor) {
    editor.on('init', function () {
    editor.execCommand("fontSize", false, "20px");
     editor.execCommand("fontName", false, "Arial");
    });
    }

};











var emailTitleConfigsub = {
  selector: '.tinymce-title-sub',
  menubar: false,
  inline: true,
  fontsize_formats: "8px 10px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 26px 28px 32px 34px 36px 40px 44px 48px 50px",
    
init_instance_callback: function (editor) {
    editor.on('change', function (e) {
      // var tid = $(this).attr('data-id');
      // alert(editor.id);
    // var content = $(this).text();

    id=editor.id;
     var tid = $("#"+id).attr('data-id');
     var content = tinymce.get(id).getContent();
     // var content =editor.content;
     // alert(content);
    $.ajax({
        url:base_url+'update-topic',
        type:'post',
        data:{id:content,cval:'topic_title',topic_id:tid},
        success: function(out){
        var out = JSON.parse(out);
        if(out.status == 404){
            window.location.href = base_url;
        }
        else if(out.status == 1){
            // window.location.href=window.location.href
        }
        else{

        }
        }
     })
    });
    
  },
  fixed_toolbar_container: ".tbarsub",
 
  toolbar: [
    'undo redo | bold italic underline | fontselect fontsizeselect',
    'forecolor backcolor | alignleft aligncenter alignright alignfull | numlist bullist outdent indent'
  ],
  valid_elements: 'p[style],strong,em,span[style],ul,ol,li',
  valid_styles: {
    '*': 'font-size,font-family,color,text-decoration,text-align'
  },
  // powerpaste_word_import: 'clean',
  // powerpaste_html_import: 'clean',
  setup: function (editor) {
    editor.on('init', function () {
    editor.execCommand("fontSize", false, "20px");
     editor.execCommand("fontName", false, "Arial");
    });
    }
};






var emailTitleConfigtext = {
  selector: '.tinymce-title-text',
  menubar: false,
  inline: true,
  fontsize_formats: "8px 10px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 26px 28px 32px 34px 36px 40px 44px 48px 50px",
    
// init_instance_callback: function (editor) {
//     editor.on('change', function (e) {
//       // var tid = $(this).attr('data-id');
//       // alert(editor.id);
//     // var content = $(this).text();

//     id=editor.id;
//      var tid = $("#"+id).attr('data-id');
//      var content = tinymce.get(id).getContent();
//      // var content =editor.content;
//      // alert(content);
//     $.ajax({
//         url:base_url+'update-topic',
//         type:'post',
//         data:{id:content,cval:'topic_title',topic_id:tid},
//         success: function(out){
//         var out = JSON.parse(out);
//         if(out.status == 404){
//             window.location.href = base_url;
//         }
//         else if(out.status == 1){
//             // window.location.href=window.location.href
//         }
//         else{

//         }
//         }
//      })
//     });
    
//   },
  fixed_toolbar_container: ".tbarText",
 
  toolbar: [
    'undo redo | bold italic underline | fontselect fontsizeselect',
    'forecolor backcolor | alignleft aligncenter alignright alignfull | numlist bullist outdent indent'
  ],
  valid_elements: 'p[style],strong,em,span[style],ul,ol,li',
  valid_styles: {
    '*': 'font-size,font-family,color,text-decoration,text-align'
  },
  // powerpaste_word_import: 'clean',
  // powerpaste_html_import: 'clean',
  setup: function (editor) {
    editor.on('init', function () {
    editor.execCommand("fontSize", false, "20px");
     editor.execCommand("fontName", false, "Arial");
    });
    }
};





var emailTitleConfighead = {
  selector: '.tinymce-title-head',
  menubar: false,
  inline: true,
  fontsize_formats: "8px 10px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 26px 28px 32px 34px 36px 40px 44px 48px 50px",

  fixed_toolbar_container: ".tbarHead",
 
  toolbar: [
    'undo redo | bold italic underline | fontselect fontsizeselect',
    'forecolor backcolor | alignleft aligncenter alignright alignfull | numlist bullist outdent indent'
  ],
  valid_elements: 'p[style],strong,em,span[style],ul,ol,li',
  valid_styles: {
    '*': 'font-size,font-family,color,text-decoration,text-align'
  },
  // powerpaste_word_import: 'clean',
  // powerpaste_html_import: 'clean',
  setup: function (editor) {
    editor.on('init', function () {
    editor.execCommand("fontSize", false, "20px");
     editor.execCommand("fontName", false, "Arial");
    });
    }
};


tinymce.init(emailBodyConfig);
tinymce.init(emailcotentConfig);
tinymce.init(emailTitleConfig);
tinymce.init(emailTitleConfigsub);
tinymce.init(emailTitleConfigtext);
tinymce.init(emailTitleConfighead);
// tinymce.init(emailcotentConfig);

// tinymce.init(emailTitleConfig);


// });


  </script>


  <script type="text/javascript">
    


  </script>

<script>
  $(document).ready(function(){

    
  $(".imagediv").hide();
   $(".imagefolderdiv").hide();
    $(".btntitle").hide();

     

   });

 


  
  function back(){
    $('.folderdiv').show();
    $('.imagediv').hide();
    $('.imagefolderdiv').hide();
  }

  function back_title(){
   
    $('.imagefolderdiv_title').show();
    $('.el').hide();
  $(".btntitle").hide();


  }
  function backfolder(divcl){
    $('.folderdiv').hide();
    $('.imagediv').hide();
    $('.imagefolderdiv').hide();
     divcl = divcl.replace(/\s+/g, '.');

    $('.'+divcl).show();

  }

  function hideshow(folder){
     folder = folder.replace(/\s+/g, '.');
    $('.folderdiv').hide();
    $('.imagediv').hide();
     $('.imagefolderdiv').hide();
    
    $('.'+folder).show();
  }
  function hideshowimage(folders,id){

    $('.folderdiv').hide();
    $('.imagediv').hide();
     $('.imagefolderdiv').hide();
    
    




 if(id==1){
      var el = "elements";
    }else{
      var el = "background";
    }
    var topicid = '<?=$topic_id?>';
      var elem = folders.split(el);
       folder = elem[0];
       
     $.ajax({
        url: base_url+"load-images",
        type: "POST",
        data: {id:id,folder:folder,topicid:topicid},
        success: function(out){
            folders = folders.replace(/\s+/g, '.');

          $('.'+folders).show();
          if(id == 1){
            $(".elementsappend"+folders).html(out);
          }else{
            $(".folderappend"+folders).html(out);
          }
        
        }
    });
    
  





  }

 function hideshowimage_title(folder){
     
  
    $('.imagefolderdiv_title').hide();
    $('.el').hide();
  $(".btntitle").show();
  folder = folder.replace(/\s+/g, '.');
    $('.'+folder).show();
  }


    function addImagetopic_title(imge,cl) { 
      $('.imm').css("opacity","1");
      $('.'+cl).css("opacity","0.3");
      height =400;
      width =200;
      $("#topic_image").val(imge);
      // var baseurlim = '<?php echo base_url() ?>uploads/background/'; 
      // alert(imge);

  }


  function addImagetopic_title_sub(imge,cl) { 
    // alert(imge)
      $('.imm').css("opacity","1");
      $('.'+cl).css("opacity","0.3");
      height =400;
      width =200;
      $("#topic_image_sub").val(imge);
      // var baseurlim = '<?php echo base_url() ?>uploads/background/'; 
      // alert(imge);
  }

   </script>
   <script>

</script>
   
   <script type="text/javascript">
      
    $(document).on('click','#imagegalr',function(e){
       

      var baseurlim = '<?php echo base_url() ?>uploads/background/';
       
    var topid = $("#topid").val();
    var imagetags = $("#image_tags").val();
    var imagetitle = $("#image_title").val();

    var file_data = $('#image').prop('files')[0];   

    var form_data = new FormData();                  
    form_data.append('image', file_data);
    form_data.append('topid', topid);
    form_data.append('image_tags', imagetags);
    form_data.append('image_title', imagetitle);

    $.ajax({
        url: base_url+"upload-image",
        type: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData:false,
        success: function(out){
          $("#modalImage").modal('hide');
        out = JSON.parse(out);
        if(out.status == 1){
          getImage();
            // window.location.href=window.location.href
               
        }
       
           
        
        }
    });
    

    });

    
</script>
<script type="text/javascript">
  function getImageRefresh(){
   $("#imagesearch").val("");
   getImage();
  }
  function getImage(){
      var sid = $("#imagesearch").val();
    // alert(sid);
    $.ajax({

        url: base_url+"get-image",
        type: "POST",
        data:{searchTerm:sid} ,
    
        success: function(out){
       out = JSON.parse(out);
      
        if(out.status == 1){

           if(out.data.length>0){
        html ='';
        for(var i=0;i<out.data.length;i++){
             // alert(out.data[i]['chapter_image']+' '+i);
          html += '<div class="col-md-12" style="padding-bottom: 3%;"><img src="<?=base_url()?>uploads/chapter/'+out.data[i]['chapter_image']+'" class="chapter<?=$i?>" style="height:150px;width:300px" onclick = "addchapter(';
          html +="'"+out.data[i]['chapter_image']+"','chapter'";
          html +=')"  alt="Random image" style=" padding: 1%; "/><span class="tlabel"> </span></div>';
               
        }
        $('#imgl').html(html);
        // alert(html);

        }

        }
    }
    });
    }


function getImageFol(){
      var sid = $("#imagesearchFol").val();
    // alert(sid);
    $.ajax({

        url: base_url+"get-image",
        type: "POST",
        data:{searchTerm:sid} ,
    
        success: function(out){
       out = JSON.parse(out);
      
        if(out.status == 1){

           if(out.data.length>0){
        html ='';
        for(var i=0;i<out.data.length;i++){
             // alert(out.data[i]['chapter_image']+' '+i);
          html += '<div class="col-md-6"><img src="<?=base_url()?>uploads/chapter/'+out.data[i]['chapter_image']+'" class="chapter<?=$i?>" style="height:220px;width:440px" onclick = "addImagetopic_title(';
          html +="'chapter/"+out.data[i]['chapter_image']+"','chapter"+i+"'";
          html +=')"  alt="Random image" style=" padding: 1%; "/><span class="tlabel"> </span></div>';
               
        }
        $('#imgl').html(html);
        // alert(html);

        }

       
        }
    }
    });
    }


</script>

<script type="text/javascript">  
    var base_url =  '<?php echo base_url() ?>';
      
    function addImage(imge) { 
       
// alert(imge);
      var baseurlim = '<?php echo base_url() ?>uploads/background/';
       
    var sid = $("#topic_id").val();
    
    $.ajax({

        url: base_url+"add-image",
        type: "POST",
        data:{image:imge,topic_id:sid} ,
    
        success: function(out){
       out = JSON.parse(out);
        if(out.status == 1){
           // window.location.href=window.location.href
         $("."+sid).css("background-image", "url(" + baseurlim+imge + ")");
         $("#ppage").css("background-image", "url(" + baseurlim+imge + ")");
         $("#ppage").css("background-size", "100%");
         $("#ppage").css("background-position", "center");
         $("#ppage").css("background-repeat", "no-repeat");
             // $(".bimage").css("background-image", out.data);
               
        }
       

        
        }
    });

    

    }  
    function addImagetopic(imge,cl) { 
       // height =$('.'+cl).height();
       // width =$('.'+cl).width();
        height = 400;
       width = 200;
      
      
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
    // window.location.href=window.location.href   
    window.location.href=window.location.href
                                // $(".bimage").css("background-image", out.data);
                 
          }
         

          
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
       

        
        }
    });
    }
    
    

    

    }  



      function addchapter(imge,cl) { 
        // alert(imge);
       height =190;
       width =300;
      
    //        var i = new Image();
    // i.src = imge.src;
    // var height = i.height;
    // var width = i.width;
    // alert(document.getElementById("myImg").width);
    // alert(width);
      var baseurlim = '<?php echo base_url() ?>uploads/chapter/';
       


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
         

          
          }
      });         
    
    
    

    

    }  
$(document).ready(function(){

// $( ".tcontent" ).mouseout(function() {
//    var tid = $(this).attr('data-id');
//     // var content = $(this).text();
//     id='i'+tid;
//     var content = tinymce.get(id).getContent();
//     $.ajax({
//         url:base_url+'update-topic',
//         type:'post',
//         data:{id:content,cval:'topic_title',topic_id:tid},
//         success: function(out){
//         var out = JSON.parse(out);
//         if(out.status == 404){
//             window.location.href = base_url;
//         }
//         else if(out.status == 1){
//             // window.location.href=window.location.href
//         }
//         else{

//         }
//         }
//      })
// });



  $(document).on('keyup','.tcontent',function(e){
    // alert("hi");
    var tid = $(this).attr('data-id');
    // var content = $(this).text();
    id='i'+tid;
    var content = tinymce.get(id).getContent();
    // alert(content+' '+tid);
      $.ajax({
        url:base_url+'update-topic',
        type:'post',
        data:{id:content,cval:'topic_title',topic_id:tid},
        success: function(out){
        var out = JSON.parse(out);
        if(out.status == 404){
            window.location.href = base_url;
        }
        else if(out.status == 1){
            // window.location.href=window.location.href
        }
        else{

        }
        }
     })
  });
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
    getTopic(tid);
    $(this).css("outline","1px solid #da2626");

 });

$(document).on('click','.delete-topic-btn',function(e){
    e.preventDefault();
    // var id = $(this).attr('data-id');
   var tid = $("#tid").val();

   
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
            // window.location.href=window.location.href
            window.location.href=window.location.href

        }
        else{

        }
        }
        })
  
})

$(document).on('click','.delete-topic',function(e){
    e.preventDefault();
    var tid = $(this).attr('data-id');
   // var tid = $("#tid").val();

  // alert(tid+'jjjjj');
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
            // window.location.reload();
            window.location.href=window.location.href

        }
        else{

        }
        }
        })
    
})


$(document).on('click','.delete-content',function(e){
    e.preventDefault();
    var tid = $(this).attr('data-id');
   // var tid = $("#tid").val();

        var con = "";
        $.ajax({
       
        url:base_url+'update-topic',
        type:'post',
        data:{id:con,cval:'content',topic_id:tid},
        success: function(out){
        var out = JSON.parse(out);
        if(out.status == 404){
            window.location.href = base_url;
        }
        else if(out.status == 1){
            // window.location.reload();
            window.location.href=window.location.href

        }
        else{

        }
        }
        })
  
})


$(document).on('click','.delete-image',function(e){
    e.preventDefault();
    var tid = $(this).attr('data-id');
   // var tid = $("#tid").val();


        $.ajax({
       
        url:base_url+'update-image',
        type:'post',
        data:{id:0,cval:'image_status',image_id:tid},
        success: function(out){
        var out = JSON.parse(out);
        if(out.status == 404){
            window.location.href = base_url;
        }
        else if(out.status == 1){
            // window.location.reload();
            window.location.href=window.location.href

        }
        else{

        }
        }
        })
  
})


function getTopic(tid){
  // $(".timage").css("outline","none");
  // $(".circle").css("outline","none");
// alert($("#topic_title").text());
  $.ajax({
        url:base_url+'get-topic',
        data:{topicid:tid},
        type:'post',
        success: function(out){
        out = JSON.parse(out);
        if(out.status == 1){
          // $("#topic_title").html(out.data.ttitle);
            var ll =out.data.ttitle;

        // var text = jQuery(this).text();
        // alert(ll.length)
          if (ll.length > 20) {
            llc = getWords(ll)+"..";
            // alert(llc);
            $("#topic_title").text(llc);
          }else{
            $("#topic_title").text(ll);
          }


           $("#backgroundcolor").val(out.data.backgroundcolor);
           $("#topic_color").val(out.data.topic_color);
           $("#topic_outlinecolor").val(out.data.topic_outlinecolor);
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

function getWords(str) {
    return str.slice(0, 20);
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

    //   $(document).ready(function(){
    //     var data = document.getElementById('ptr_content_holder').innerHTML;
   
    // $("#contented").innerHTML(data);
   
    // });
  
     function createcontent()
    {
      // alert('f');
       var con= tinymce.get("contented").getContent();
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
       var fol= $('#folder').val();
    
    // alert(topic_id);
      $.ajax({
        url:base_url+'create-folder',
        type:'post',
        data:{fol:fol},
        success: function(out){
        out = JSON.parse(out);
        if(out.status == 1){
        // window.location.reload();
        window.location.href=window.location.href

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
     $('.imageele').change(function(){
  var fol = $(this).attr('data-id');
 // alert(fol);

    var file_data = $(this).prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('image', file_data);
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
            // window.location.reload();
            window.location.href=window.location.href

               
        }
       
           
        
        }
    });
    });
     $('.imagef').change(function(){
  var fol = $(this).attr('data-id');
 // alert(fol);
 // alert(fol);

    var file_data = $(this).prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('image', file_data);
    form_data.append('folder', fol);

    $.ajax({
        url: base_url+"add-image-folder-back",
        type: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData:false,
        success: function(out){
       out = JSON.parse(out);
        if(out.status == 1){
            // window.location.reload();
window.location.href=window.location.href

          }
       
           
        
        }
    });
    });


    $('#imagegal').change(function(){
  var fol = $(this).attr('data-id');
 // alert(fol);

    var file_data = $('#imagegal').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    form_data.append('folder', fol);

    $.ajax({
        url: base_url+"add-image-folder-gallery",
        type: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData:false,
        success: function(out){
       out = JSON.parse(out);
        if(out.status == 1){
            window.location.href=window.location.href
               
        }
       
       
        }
    });
    });
    </script>  
    <script type="text/javascript">  
     
     function createHead()
    {
       var con= tinymce.get("contentHead").getContent();
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
    $(".tcircle").draggable();
    $(".mcircle").draggable();
    $(".tdrag").draggable();
    $(".maincontent").draggable();
    $(".topiccontent").draggable();


 });
  // $(document).ready(function(){
  // });

 
  

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
     // alert(tid);
    var tparentid = $("#topic_id").val();
    window.location.href = base_url+'presentation-slide/'+tid;
  })

function getPresentationRefresh(){
  $("#searchTermPres").val("");
  getPres();
}
function getPres(){
    var term = $("#searchTermPres").val();
      $.ajax({
        url:base_url+'get-presentation-search',
        data:{term:term},
        type:'post',
        success: function(out){
        out = JSON.parse(out);
        if(out.status == 1){
          if(out.data.length>0){
        html ='';
        for(var i=0;i<out.data.length;i++){
          // alert(out.data.topics[0]['backgroundimage']);
      if(out.data[i]['topic_id'] != <?=$topic_id?>){

          html += '  <div class=" slidenew '+out.data[i]['topic_id']+' plusPresentation"  data-id="'+out.data[i]['topic_id']+'" class=" " id="" style="outline: 1px solid #a7a5a5;     height: 150px; width: 294px;  background-image:url(<?php echo base_url()?>uploads/slide/'+out.data[i]['content_slide']+');background-size: contain ; background-size: 100%;background-position: center;'
    html += 'background-repeat: no-repeat;  outline: 1px solid #ced0da;  border-radius: 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px;outline: none;">';



html += '<span class="resume_create_up_link "> <span class="spacer"></span>  <a href="javascript:void(0)" onclick="return getTopics(';
html +="'"+out.data[i]['topic_id']+"'";
html +=');" data-id="'+out.data[i]['topic_id']+'"> <icon class="fa fa-clone" aria-hidden="true"></icon> </a>  </span>';

html +=' </div>';
        html += ' <span class="tspan">'+out.data[i]['presentation_title']+'</span><br/> <br/>';
}

           }
           $(".ppres").html(html);
         }else{
          alert('No data');
         }
          
           // $("#topic_title").val(out.data.topic_title);
           // $("#backgroundcolor").val(out.data.backgroundcolor);
           // $("#topic_color").val(out.data.topic_color);
           // $("#topic_outlinecolor").val(out.data.topic_outlinecolor);
           // $("#topic_backgroundcolor").val(out.data.topic_backgroundcolor);
           // $("#topic_fontsize").val(out.data.topic_fontsize);
           // $("#topic_height").val(out.data.topic_height);
           // $("#topic_width").val(out.data.topic_width);

          

          
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



 $(document).on('click','.plusPresentation',function(e){
    var tid = $(this).attr('data-id');


          $.ajax({
      url:base_url+'getchilds',
      type:'post',
      data:{id:tid},
      success: function(out){
          out = JSON.parse(out);
          if(out.status == 1){
         if(out.data.sub.length>0){
          html ='';
           // console.log(out.data.sub);
          var j=0;
          // html += '<div class="tabs">';
          for(var i=0;i<out.data.sub.length;i++){

            // if(out.data.sub[i].sub.length>0){
            // alert(out.data[i]['chapter_image']+' '+i);
            if(out.data.sub[i].sub.length>0 || out.data.sub[i].image.length>0 || out.data.sub[i]['content']!=""){
                html += '  <div class="  '+out.data.sub[i]['topic_id']+' "  data-id="'+out.data.sub[i]['topic_id']+'" class=" " id="" style="outline: 1px solid #a7a5a5;     height: 150px; width: 294px;  background-image:url(';
               html += "'"+'<?php echo base_url()?>uploads/slide/'+out.data.sub[i]['content_slide']+"'"+');background-size: contain ; background-size: 100%;background-position: center;'
                html += 'background-repeat: no-repeat;  outline: 1px solid #ced0da;  border-radius: 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px;outline: none;" onclick="return gettabs(';
                html +="'"+out.data.sub[i]['topic_id']+"'";
                html +=');" >';
                html += '<span class="resume_create_up_link "> <span class="spacer"></span>  <a href="javascript:void(0)" onclick="return getTopics(';
                html +="'"+out.data.sub[i]['topic_id']+"'";
                html +=');" data-id="'+out.data.sub[i]['topic_id']+'"> <icon class="fa fa-clone" aria-hidden="true"></icon> </a>  </span> </div>';
                html += ' <span class="tspan">'+out.data.sub[i]['ttitle']+'</span><br/> <br/>';
            }




          }
         
          // alert(html);
          if(i!=0 ){
            $('.ppres').html(html);
          }else{
            alert('No subtopic available');
          }

              




          }
          else if(out.status==0){
          alert(out.data);
          }
          else{
          window.location.href.topic_id = base_url;
          }
      }
    }
        })
  })



  $(document).on('click','.topic',function(e){
    // var tid = $(this).attr('data-id');
    var sid = $("#topic_id").val();
    window.location.href = base_url+'topic-add'+sid;
  })



  function getContents(){
    window.location.href=window.location.href
  }



$(document).on('change','#bgcolor',function(e){
    bcolor = $("#bgcolor").val();

    $('#ppage').css("background-image", 'none');
    $('#ppage').css("background-color",bcolor);

});
$(document).on('change','.styletopic',function(e){
  var val = $(this).val();
  var att = $(this).attr('data-attr');
  // alert(att);
  var topic_id = $("#tid").val();
  tbcolor = $("#topic_bgcolor").val();
  bcolor = $("#bgcolor").val();
  fsize = $("#topic_fontsize").val();
  // alert(fsize);
  color = $("#topiccolor").val();
  theight = $("#topic_height").val();
  twidth = $("#topic_width").val();



  // alert(att);
    $.ajax({
      url:base_url+'update-topic',
      type:'post',
      data:{id:val,cval:att,topic_id:topic_id},
      success: function(out){
      out = JSON.parse(out);
      if(out.status == 1){
        // $('[data-val="p'+topic_id+'"]').css("background-color", tbcolor);
       if(att == "topic_fontsize"){
      $('.circle').css("font-size", fsize);
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


</script>
<script type="text/javascript">
  $(document).on('keyup','.topictit',function(e){
  var val = $(this).val();
  var att = $(this).attr('data-attr');
  // alert(val);
  var topic_id = $("#topic_id").val();
 
$.ajax({
      url:base_url+'update-topic',
      type:'post',
      data:{id:val,cval:att,topic_id:topic_id},
      success: function(out){
      out = JSON.parse(out);
      if(out.status == 1){
        $("#topic_title").text(val);
        // $('[data-val="p'+topic_id+'"]').css("background-color", tbcolor);
   
      }
      else if(out.status==0){
      alert(out.data);
      }
      else{
      window.location.href.topic_id = base_url;
      }
      }
    })

  // alert(att);
   

})




</script>


<script type="text/javascript">

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
  var sid = $("#tparent").val();
  var title = $("#title").html();
  var topictags = $("#topic_tags").val();
  var topicimage = $("#topic_image").val();




       $.ajax({
        url:base_url+'add-topic',
        data:{sid:sid,title:title,topictags:topictags,topicimage:topicimage},
        type:'post',
        success: function(out){
            $("#exampleModaltopic").modal('hide');
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



        function addtopic_practice(id,title){

  var sid = "<?php echo $topic_id; ?>";

       $.ajax({
        url:base_url+'add-topic-practice',
        data:{sid:sid,title:title,qid:id},
        type:'post',
        success: function(out){
            $("#exampleModaltopic").modal('hide');
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


       $(document).on('dblclick','.mcircle',function(e){
      $(this).draggable('disable');
   });
   $(document).on('dblclick','.tcircle',function(e){
      $(this).draggable('disable');
   });
   $(document).on('dblclick','.tdrag',function(e){
      $(this).draggable('disable');
   });
    $(document).on('dblclick','.contents',function(e){
      $(this).draggable('disable');
   });


    $(document).on('click','.mcircle',function(e){
      $(this).draggable('enable');
   });
   $(document).on('click','.tcircle',function(e){
      $(this).draggable('enable');
   });
   $(document).on('click','.tdrag',function(e){
      $(this).draggable('enable');
   });
   $(document).on('click','.contents',function(e){
      $(this).draggable('enable');
      $(this).css("outline"," 1px solid #67262a");
   });



  // $(document).on('dblclick','.mcircle',function(e){

  var dragposition = '';
  $('.mcircle').draggable({
     containment: "#ppage",
    cursor: "move",
    disabled: false,
     // other options...
     drag: function(event,ui){
    dragposition = ui.position;
    var topicid = $(this).attr('data-id');
    $(".mcircle").css("outline","none");
    $(this).css("outline","1px solid #da2626");
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
 // $(this).css("outline","1px solid #fff");

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
     },
     stop:function(ev,ui){
      $(this).draggable('disable');

         // alert('r');
    // $(this).css("outline","none");

            //if(dropped) alert(ui.item.attr("id");
            //else alert("Not dropped");
        }
  });
// });

//   $(document).on('dblclick','.tcircle',function(e){

    var dragpositiont = '';
  $('.tcircle').draggable({
     containment: "#ppage",
    cursor: "move",
    disabled: false,

     // other options...

     drag: function(event,ui){
    dragpositiont = ui.position;
    var topicid = $(this).attr('data-id');
    $(".circle").css("outline","none");
    $(this).css("outline","1px solid #da2626");
     // alert(topicid);
     // alert(dragposition.left+' '+dragposition.top);
    //var l = ( 100 * parseFloat(dragposition.left / 770) ) + "%" ;
    // var t = ( 100 * parseFloat(dragposition.top / 500) ) + "%" ;

      var l = dragpositiont.left ;
      var t = dragpositiont.top ;
// alert(l+"dd"+t);
      var viewport =  $(this).find('.tcontent');
      var viewportOffset = viewport.position();
// alert(viewportOffset.left);
      tl =viewportOffset.left;
      tt =viewportOffset.top;

      $.ajax({
        url:base_url+'update-topic-position',
        type:'post',
        data:{left:l,top:t,topicid:topicid},
        success: function(out){
        out = JSON.parse(out);
        if(out.status == 1){
          $(this).css("left", l);
          $(this).css("top", t);
        }
        else if(out.status==0){
        alert(out.data);
        }
        else{
        window.location.href = base_url;
        }
        }
      })


       $.ajax({
        url:base_url+'update-topic-content-position',
        type:'post',
        data:{left:tl,top:tt,topicid:topicid},
        success: function(out){
        out = JSON.parse(out);
        if(out.status == 1){
          $(this).find('.tcontent').css("left", tl);
          $(this).find('.tcontent').css("top", tt);

        }
        else if(out.status==0){
        alert(out.data);
        }
        else{
        window.location.href = base_url;
        }
        }
      })
     },
     stop:function(ev,ui){
      $(this).draggable('disable');

         // alert('r');
    // $(this).css("outline","none");

            //if(dropped) alert(ui.item.attr("id");
            //else alert("Not dropped");
        }
  });
// });
//   $(document).on('dblclick','.tdrag',function(e){

  var dragpos = '';
  $('.tdrag').draggable({
    containment: "#ppage",
    cursor: "move",
    disabled: false,

     // other options...
     drag: function(event,ui){
    dragpos = ui.position;
    var topicid = $(this).attr('data-id');
    $(".tdrag").css("outline","none");
    $(".tdrag").css("outline","1px solid #2969ab");
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
 // $(this).css("outline","1px solid #fff");

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
     },
     stop:function(ev,ui){
      $(this).draggable('disable');

         // alert('r');
    // $(this).css("outline","none");

            //if(dropped) alert(ui.item.attr("id");
            //else alert("Not dropped");
        }
  });

// });

//   $(document).on('dblclick','.contents',function(e){

  var dragpositions = '';
  $('.maincontent').draggable({
     
     containment: "#ppage",
    cursor: "move",
    disabled: false,

     drag: function(event,ui){
    dragpositions = ui.position;
    var topicid = $("#topic_id").val();
    $(".maincontent").css("outline","none");
    $(this).css("outline"," 1px solid #67262a");

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
     },
     stop:function(ev,ui){
      $(this).draggable('disable');
         // alert('r');
    // $(this).css("outline","none");

            //if(dropped) alert(ui.item.attr("id");
            //else alert("Not dropped");
        }
  });



    var dragpositions = '';
  $('.topiccontent').draggable({
     
     containment: "#ppage",
    cursor: "move",
    disabled: false,

     drag: function(event,ui){
    dragpositions = ui.position;
    var topicid = $(this).attr('data-id');
    $(".topiccontent").css("outline","none");
    $(this).css("outline"," 1px solid #67262a");

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
        url:base_url+'update-topiccontent-position',
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
     },
     stop:function(ev,ui){
      $(this).draggable('disable');
         // alert('r');
    // $(this).css("outline","none");

            //if(dropped) alert(ui.item.attr("id");
            //else alert("Not dropped");
        }
  });
// });

 var dragpositionsi = '';
  $('.timage').draggable({
     // other options...
     containment: "#ppage",
    cursor: "move",
     drag: function(event,ui){
    dragpositionsi = ui.position;
    var topicid = $("#topic_id").val();
       var topic_image_id = $(this).attr('data-id');
    $(".timage").css("outline","none");

    $(this).css("outline","1px solid #2969ab");

    // var l = ( 100 * parseFloat(dragpositions.left / 770) ) + "%" ;
    // var t = ( 100 * parseFloat(dragpositions.top / 500) ) + "%" ;

    var l = dragpositionsi.left ;
    var t = dragpositionsi.top ;
       // alert(l+' '+t);
      // alert(dragpositions.left+' '+dragpositions.top);
      //      var l = ( 100 * parseFloat($(this).position().left / parseFloat($(this).parent().width())) ) + "%" ;
      // var t = ( 100 * parseFloat($(this).position().top / parseFloat($(this).parent().height())) ) + "%" ;
      // $(this).css("left", l);
      // $(this).css("top", t);
      // alert(l+t);
      $.ajax({
        url:base_url+'update-image-position',
        type:'post',
        data:{left:l,top:t,topic_image_id:topic_image_id},
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
     },
     stop:function(ev,ui){
         // alert('r');
    // $(this).css("outline","none");

            //if(dropped) alert(ui.item.attr("id");
            //else alert("Not dropped");
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
  handles: "n,s,e,w,ne,se,sw,nw",
  containment: "#ppage",
    cursor: "move",
  resize: function(event, ui) {
        // return value from another function
        // alert('gg')
    $(".circle").css("outline","none");

    $(this).css("outline","1px solid #da2626");

    },
   stop: function(event, ui) {
    // $(this).css("outline"," 1px dashed #999");
    // $(this).css("outline","none");
    var width = $(event.target).width();
    var height = $(event.target).height();
    var topicid = $(this).attr('data-id');
       // var topic_image_id = $(this).attr('data-id');
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



<script type="text/javascript">

var respositioni = '';

$( ".timage" ).resizable({
  handles: "n,s,e,w,ne,se,sw,nw",
 
  containment: "#ppage",
    cursor: "move",
  resize: function(event, ui) {
        // return value from another function
        // alert('gg')
    $(".timage").css("outline","none");

    $(this).css("outline","1px solid #2969ab");
        
    },
   stop: function(event, ui) {
    // $(this).css("outline","none");

    var width = $(event.target).width();
    var height = $(event.target).height();
    var topicid = $(this).attr('data-id');
     $.ajax({
        url:base_url+'update-image-size',
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
});

     function question(){

 var topic_id = $("#tid").val();
 var question = $("#question").val();
  var questiontags = $("#question_tags").val();

     // alert(val);
    $.ajax({
      url:base_url+'add-question',
      type:'post',
      data:{question:question,topic_id:topic_id,questiontags:questiontags},
      success: function(out){
      out = JSON.parse(out);
      if(out.status == 1){
        getContents();
      }
      else if(out.status==0){
      alert(out.data);
      }
      else{
      window.location.href.topic_id = base_url;
      }
      }
    })

     }


    </script>
    <script type="text/javascript">
  
  function getTopics(id){

 var tid = $("#topic_id").val();
  
      // alert(tid);

        $.ajax({
      url:base_url+'copy-topic',
      type:'post',
      data:{id:id,tid:tid},
      success: function(out){
          out = JSON.parse(out);
          if(out.status == 1){
         getContents();
          }
          else if(out.status==0){
          alert(out.data);
          }
          else{
          window.location.href.topic_id = base_url;
          }
      }
        })
  
    

  }
    </script>
<script type="text/javascript">
  
  
    </script>


    <script type="text/javascript">
  
  function gettabs(id){

  
      // alert(tid);

        $.ajax({
      url:base_url+'getchilds',
      type:'post',
      data:{id:id},
      success: function(out){
          out = JSON.parse(out);
          if(out.status == 1){
         if(out.data.sub.length>0){
          html ='';
           // console.log(out.data.sub);
          var j=0;
          // html += '<div class="tabs">';
          for(var i=0;i<out.data.sub.length;i++){

            // if(out.data.sub[i].sub.length>0){
            // alert(out.data[i]['chapter_image']+' '+i);
            if(out.data.sub[i].sub.length>0 || out.data.sub[i].image.length>0 || out.data.sub[i]['content']!=""){
                html += '  <div class="  '+out.data.sub[i]['topic_id']+' "  data-id="'+out.data.sub[i]['topic_id']+'" class=" " id="" style="outline: 1px solid #a7a5a5;     height: 150px; width: 294px;  background-image:url(';
               html += "'"+'<?php echo base_url()?>uploads/slide/'+out.data.sub[i]['content_slide'];
               html += "'"+');background-size: contain ; background-size: 100%;background-position: center;'
                html += 'background-repeat: no-repeat;  outline: 1px solid #ced0da;  border-radius: 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px;outline: none;" onclick="return gettabs(';
                html +="'"+out.data.sub[i]['topic_id']+"'";
                html +=');" >';
                html += '<span class="resume_create_up_link "> <span class="spacer"></span>  <a href="javascript:void(0)" onclick="return getTopics(';
                html +="'"+out.data.sub[i]['topic_id']+"'";
                html +=');" data-id="'+out.data.sub[i]['topic_id']+'"> <icon class="fa fa-clone" aria-hidden="true"></icon> </a>  </span> </div>';
                html += ' <span class="tspan">'+out.data.sub[i]['ttitle']+'</span><br/> <br/>';
            }
          }
         
          if(i!=0 ){
            $('.ppres').html(html);
          }else{
            alert('No subtopic available');
          }

              




          }
          else if(out.status==0){
          alert(out.data);
          }
          else{
          window.location.href.topic_id = base_url;
          }
      }
      }
    });
          
    

  }
    </script>
<script type="text/javascript">

$(document).ready(function(){
 
  $('.main-menu').addClass('openup');
  $('.main-menu ul li:nth-child(2)').addClass('about-accordion-open');
  $(".has-subnav a").click(function(){
      $(this).parent('.has-subnav').addClass('about-accordion-open');
      $('.main-menu').addClass('openup');
      $('.has-subnav a').not(this).parent('.has-subnav').removeClass('about-accordion-open');

  });

 $("#closemenu").click(function(){
    $('.main-menu').removeClass('openup');
    $('.main-menu ul li:nth-child(2)').removeClass('about-accordion-open');
});

  $(".circle").click(function(){
    $('.circle').css("outline","none");
    $('.tcontent').css("outline","none");
    $(this).css("outline","1px solid #da2626");
     $(this).find('.tcontent').css("outline","1px solid #2969ab");
     // $(this).find('.tcontent').css("outline","1px solid #2969ab");
    // 
    $('.timage').css("outline","none");
    $('.contents').css("outline","none");

    

  });

  $(".timage").click(function(){
     $('.circle').css("outline","none");
    $('.tcontent').css("outline","none");
    $('.timage').css("outline","none");
    $('.contents').css("outline","none");
    $(this).css("outline","1px solid #4422c5");
  });

$(".contents").click(function(){
     $('.circle').css("outline","none");
    $('.tcontent').css("outline","none");
    $('.timage').css("outline","none");
    $(this).css("outline"," 1px solid #67262a");
  });


  $(".circle").hover(function(){
    $('.circle').css("outline","none");
    $(this).css("outline","2px 1px dashed #999");
     $(this).find('.tcontent').css("outline","1px solid #2969ab");

  });

  $(".timage").hover(function(){
     $('.circle').css("outline","none");
    $('.tcontent').css("outline","none");
    $('.timage').css("outline","none");
    $(this).css("outline","1px solid #4422c5");
  });
})



</script>
<script type="text/javascript">



var respositioni = '';
$( ".maincontent" ).resizable({
  handles: "n,s,e,w,ne,se,sw,nw",
  containment: "#ppage",
    cursor: "move",
  resize: function(event, ui) {
        // return value from another function
        // alert('gg')
    $(".maincontent").css("outline","none");

    $(this).css("outline","1px solid #67262a");
        
    },
   stop: function(event, ui) {
    // $(this).css("outline","none");

    var width = $(event.target).width();
    var height = $(event.target).height();
    var topicid = $(this).attr('data-id');

     $.ajax({
        url:base_url+'update-content-size',
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
});








    $(document).on('keyup','.maincontent',function(e){
    var tid = "<?= $topic_id?>";
  

       id='cont'+tid;
   
    var content = tinymce.get(id).getContent();
     // alert(content+' '+tid);

      $.ajax({
        url:base_url+'update-topic',
        type:'post',
        data:{id:content,cval:'content',topic_id:tid},
        success: function(out){
        var out = JSON.parse(out);
        if(out.status == 404){
            window.location.href = base_url;
        }
        else if(out.status == 1){
            // window.location.href=window.location.href
        }
        else{

        }
        }
     })
  });

</script>
<script type="text/javascript">



var respositioni = '';
$( ".topiccontent" ).resizable({
  handles: "n,s,e,w,ne,se,sw,nw",
  containment: "#ppage",
    cursor: "move",
  resize: function(event, ui) {
        // return value from another function
        // alert('gg')
    $(".topiccontent").css("outline","none");

    $(this).css("outline","1px solid #67262a");
        
    },
   stop: function(event, ui) {
    // $(this).css("outline","none");

    var width = $(event.target).width();
    var height = $(event.target).height();
    var topicid = $(this).attr('data-id');

     $.ajax({
        url:base_url+'update-topiccontent-size',
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
});








    $(document).on('keyup','.topiccontent',function(e){
    var tid = $(this).attr('data-id');
  

       id='cont'+tid;
   
    var content = tinymce.get(id).getContent();
     // alert(content+' '+tid);

      $.ajax({
        url:base_url+'update-topic',
        type:'post',
        data:{id:content,cval:'explanation',topic_id:tid},
        success: function(out){
        var out = JSON.parse(out);
        if(out.status == 404){
            window.location.href = base_url;
        }
        else if(out.status == 1){
            // window.location.href=window.location.href
        }
        else{

        }
        }
     })
  });


$(document).on('click','.delete-topiccontent',function(e){
    e.preventDefault();
    var tid = $(this).attr('data-id');
   // var tid = $("#tid").val();

        var con = "";
        $.ajax({
       
        url:base_url+'update-topic',
        type:'post',
        data:{id:con,cval:'explanation',topic_id:tid},
        success: function(out){
        var out = JSON.parse(out);
        if(out.status == 404){
            window.location.href = base_url;
        }
        else if(out.status == 1){
            // window.location.reload();
            window.location.href=window.location.href

        }
        else{

        }
        }
        })
  
})

</script>
  <script type="text/javascript">
    var data = '';
    tinymce.init({
  selector: 'textarea',
  fontsize_formats: "8px 10px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 26px 28px 32px 34px 36px 40px 44px 48px 50px",
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
  importcss_append: true,
  height: 400,
  
  templates: [
    { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  outline="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
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
  setup: function (editor) {
    editor.on('init', function () {
    editor.setContent(data);
    editor.execCommand("fontSize", false, "20px");
     editor.execCommand("fontName", false, "Arial");
    });
    }  
 });


</script> 

<script type="text/javascript">
 
function slidedat(){
 
}
 function addentry(fold){
  $("#old").val(fold);
 }


$(document).ready(function(){
    html2canvas($('#ppage'), 
    {
      onrendered: function (canvas) {
        // var a = document.createElement('a');
        // // toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
        // a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
        // a.download = 'somefilename.jpg';
        // a.click();



        var canvasinfo=canvas;
   $("#imghidden").val(canvasinfo.toDataURL('image/png'));
   var formid=$("#imgupload")[0];
   var data=new FormData(formid);


    //   var file_data = $('#imghidden').prop('files');   

    // var form_data = new FormData();                  
    // form_data.append('image', file_data);

   $.ajax({
               type:"post",
               url:base_url+'upload-content-image',
               data:data,
               contentType: false,
               cache: false,
               processData:false,
               success:function (data) {
                // alert(data);
                   
               },error:function(error)
               {
                   
               }
           });
      }
    });



})



function slide_image(){
   html2canvas($('#ppage'), 
    {
      onrendered: function (canvas) {
  



   var canvasinfo=canvas;
   $("#imghidden").val(canvasinfo.toDataURL('image/png'));
   var formid=$("#imgupload")[0];
   var data=new FormData(formid);


    //   var file_data = $('#imghidden').prop('files');   

    // var form_data = new FormData();                  
    // form_data.append('image', file_data);

   $.ajax({
               type:"post",
               url:base_url+'upload-content-image',
               data:data,
               contentType: false,
               cache: false,
               processData:false,
               success:function (data) {
                // alert(data);
                   
               },error:function(error)
               {
                   
               }
           });
      }
    });
}



$(".present").click( function() {

  slide_image();
});
</script>
<script type="text/javascript">
     function getfoldRefresh(){
      $("#searchTermFol").val("");
      getsearchFol();
    }
    function getsearchFol(){
      var sid = $("#searchTermFol").val();
    // alert(sid);
    $.ajax({

        url: base_url+"get-search-folder",
        type: "POST",
        data:{searchTerm:sid} ,
    
        success: function(out){
       out = JSON.parse(out);
     
        if(out.status == 1){

           // if(out.data.length>0){
       // reload();

            window.location.href=window.location.href
        

        }
    }
    });
    }



    function getPracticeRefresh(){
  $("#practicesearch").val("");
  getPractice();
}

    function getPractice(){
      var sid = $("#practicesearch").val();
    // alert(sid);
    $.ajax({

        url: base_url+"get-practice",
        type: "POST",
        data:{searchTerm:sid} ,
    
        success: function(out){
       out = JSON.parse(out);
       
       html ='';
        if(out.status == 1){

           if(out.data.length>0){
        
        for(var i=0;i<out.data.length;i++){
             // alert(out.data[i]['chapter_image']+' '+i);


             html +=' <div class="row slidenew <?= $question['question_id'] ?>" onclick="return addtopic_practice(';
          html +="'"+out.data[i]['question_id']+"','"+out.data[i]['question_code']+"'";

          html +=')" data-id="'+out.data[i]['question_id']+'" class=" " id="" style="outline: 1px solid #a7a5a5;     height: 150px; width: 300px;  background-size: contain ; background-size: 100%;background-position: center;    background-repeat: no-repeat;  background: linear-gradient(0deg, rgba(236,239,244,1) 0%, rgba(255,255,255,1) 100%);   outline: 1px solid #ced0da;  border-radius: 3px;-webkit-border-radius: 3px;-moz-border-radius: 3px;outline: none;"> </div><span class="tspan">'+out.data[i]['question_code']+'</span>    <br/> <br/>'
         
               
        }
        $('#prct').html(html);
        // alert(html);

        }

        
        }else{
           $('#prct').html(html);
        }
    }
    });
    }


        var elem = document.querySelector('.circle');

document.body.addEventListener('click', function(e) {
  if (e.target != elem) {
   
    // alert("d");
    $("#ppage").find('.circle').css("outline","0");
    $("#ppage").find('.timage').css("outline","0");
    $("#ppage").find('.tcontent').css("outline","0");
    $("#ppage").find('.tdrag').css("outline","0");
    $("#ppage").find('.contents').css("outline","0"); 
    // $("#ppage").find('.pl').css("display","none"); 
    // $("#ppage").find('.dl').css("display","none"); 



    // $("#ppage").children("div").css("outline","0");
  }
});
</script>

<script type="text/javascript">
function getslideRefresh(){
  $("#searchTermslide").val("");
 $("#slideform").submit();
}

function getSlidesearch(){
  // alert('e');
    var term = $("#searchTermslide").val();
     var tid = "<?= $topic_id?>";
      $.ajax({
        url:base_url+'get-slide-search',
        data:{term:term,topicid:tid},
        type:'post',
        success: function(out){
        out = JSON.parse(out);
        if(out.status == 1){
          if(out.data.length>0){
        html ='';
        for(var i=0;i<out.data.length;i++){
          // alert(out.data[i]['content_slide']);
          html += '<a href="<?=base_url();?>presentation-slide/'+out.data[i]['content_slide']+'"><div  style=background-image:url(';
          html += "'<?=base_url()?>";
          html +="uploads/slide/";
          html +=out.data[i]['content_slide'];
          html += '); background-color:'+out.data[i]['backgroundcolor']+';width: 294px; height: 150px;background-size: contain ; background-size: 100%;background-position: center;background-repeat: no-repeat; margin-bottom: 5%;" > </div></a>  <span class="tspan">'+out.data[i]['ttitle']+'</span>  <br/> <br/>';


           }
           $(".slidedat").html(html);
         }else{
          alert('No data');
         }
    

          

          
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
   
</body>
</html>

