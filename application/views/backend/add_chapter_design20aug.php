<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
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
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
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
    <script src="<?=base_url()?>assets/js/require.min.js"></script>

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

.no_print{
    margin: auto;
    position: absolute;
    top: 83%;
    left: 47%;
    right: 0;
    bottom: 0;
  }
.no_print {
    display: none;
}
/*show .ab*/
.circle:hover .no_print {
    display: block;
    
}
.timage:hover .no_print {
    display: block;
    
}
.demo-inline {
  /*box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0.2);*/
  text-align: left;
  color: #000;
  line-height: 1.3;
  font-size: 14px;
  /*background-color: #ffffff;*/
  text-align: left;
  vertical-align: top;
  padding: 20px 20px 20px 20px;
}
.demo-inline .container {
  background-color: #fafafa;
  margin: -20px -20px 0 -20px;
  padding: 20px;
}
.demo-inline p {
  margin: 0 0;
}
.demo-inline h1 {
  color: #1976d2;
  text-align: center;
  font-size: 2em;
  font-weight: bold;
  margin: 0 0;
}
.demo-inline h2 {
  color: #1976d2;
  font-size: 2em;
  margin-bottom: 0;
  margin-top: 0;
  line-height: 40px;
}
.demo-inline h3 {
  font-size: 1.5em;
  color: #403f42;
  margin-bottom: 0;
  margin-top: 0;
  line-height: 40px;
}
.demo-inline ul,
.demo-inline ol {
  padding-left: 20px;
}
.demo-inline ul {
  list-style: disc;
}
.demo-inline ol {
  list-style: decimal;
}
.demo-inline a {
  text-decoration: underline;
}
.demo-inline img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  padding: 0px 10px 10px 10px;
}
.demo-inline textarea {
  display: none;
}
.demo-inline *[contentEditable="true"]:focus,
.demo-inline *[contentEditable="true"]:hover {
  outline: 1px solid #2276d2;
}




















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

.search {
  width: 100%;
  position: relative;
  display: flex;
  padding-bottom: 5%;

}

.searchTerm {
  width: 100%;
  border: 3px solid #fdeb10de;
  border-right: none;
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
  border: 1px solid #fdeb10de;
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

#ppage{
  box-sizing:unset !important;

}
.timage{
  box-sizing:unset !important;

}
.circle{
  box-sizing:unset !important;

}

</style>
<body class="dashboard-page">

<input type="hidden" name="chapter_id" id="chapter_id" value="<?=$chapter_id?>">
  <nav class="main-menu">
    <ul>
	<li class="has-subnav">
	  <a href="javascript:;">
	    <i class="fa fa-question nav_icon"></i>
	    <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
	  </a>
	  <ul>
	    <li>










	    <div class="card" style="height: 657px; width: 350px; overflow-x: scroll;background-color: rgba(70,80,100,0.8);">
	    <div class="card-header">
		
		    <!-- <a href="<?=base_url()?>presentation" id="" class="btn btn-primary-outline"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>  -->

		<h3 class="card-title"> Questions </h3>
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
		  
		    
		   
	 <?php 
	    if(!empty($questions)){
		foreach($questions as $question){?>

	     
		    <div class="row slidenew <?= $question['question_id'] ?>" onclick="return addtopic('<?= $question['question_id'] ?>','<?= $question['question_code'] ?>','4')" data-id="<?= $question['question_id'] ?>" class=" " id="" style="border: 1px solid #a7a5a5;     height: 150px;
    width: 300px;  
    background-size: contain ; background-size: 100%;
    background-position: center;
    background-repeat: no-repeat;  background: linear-gradient(0deg, rgba(236,239,244,1) 0%, rgba(255,255,255,1) 100%);
    border: 1px solid #ced0da;
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

















	<li class="has-subnav">
	  <a href="javascript:;">
	    <i class="fa fa-file-text-o nav_icon"></i>
	    <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
	  </a>
	  <ul>
	    <li>










	    <div class="card" style="height: 657px; width: 350px; overflow-x: scroll;background-color: rgba(70,80,100,0.8);">
	    <div class="card-header">
		
		    <!-- <a href="<?=base_url()?>presentation" id="" class="btn btn-primary-outline"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>  -->

		<h3 class="card-title"> Excercise </h3>
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
		  
		    
		   
	 <?php 
		// print_r($exercise);

	    if(!empty($exercise)){
		foreach($exercise as $exercises){?>

	     
		   
		    <div class="row slidenew <?= $exercises['ex_topic_id'] ?>" onclick="return addtopic('<?= $exercises['ex_topic_id'] ?>','<?= $exercises['ex_topic_title'] ?>','5')" data-id="<?= $exercises['ex_topic_id'] ?>" class=" " id="" style="border: 1px solid #a7a5a5;     height: 150px;
    width: 300px;  
    background-size: contain ; background-size: 100%;
    background-position: center;
    background-repeat: no-repeat;  background: linear-gradient(0deg, rgba(236,239,244,1) 0%, rgba(255,255,255,1) 100%);
    border: 1px solid #ced0da;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    outline: none;">



		    </div>
		     <span class="tspan"><?php echo $exercises['ex_topic_title'] ?></span>
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
	    <i class="fa fa-file-pdf-o nav_icon"></i>
	    <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
	  </a>
	  <ul>
	    <li>

	    <div class="card" style="height: 657px; width: 350px; overflow-x: scroll;background-color: rgba(70,80,100,0.8);">
	    <div class="card-header">
		
		    <!-- <a href="<?=base_url()?>presentation" id="" class="btn btn-primary-outline"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>  -->

		<h3 class="card-title"> Pdf </h3>
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
		  
		    
		   
	 <?php 
	 // print_r($pdf);	
	    if(!empty($pdf)){
		foreach($pdf as $pdfs){?>

		   
		    <div class="row slidenew <?= $pdfs['video_id'] ?>" onclick="return addtopic('<?= $pdfs['video_id'] ?>','<?= $pdfs['video_title'] ?>','3')" data-id="<?= $pdfs['video_id'] ?>" class=" " id="" style="border: 1px solid #a7a5a5;     height: 150px;
    width: 300px;  
    background-size: contain ; background-size: 100%;
    background-position: center;
    background-repeat: no-repeat;  background: linear-gradient(0deg, rgba(236,239,244,1) 0%, rgba(255,255,255,1) 100%);
    border: 1px solid #ced0da;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    outline: none;">



		    </div>
		     <span class="tspan"><?php echo $pdfs['video_title'] ?></span>
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
	    <i class="fa fa-file-video-o nav_icon"></i>
	    <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
	  </a>
	  <ul>
	    <li>

	    <div class="card" style="height: 657px; width: 350px; overflow-x: scroll;background-color: rgba(70,80,100,0.8);">
	    <div class="card-header">
		
		    <!-- <a href="<?=base_url()?>presentation" id="" class="btn btn-primary-outline"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>  -->

		<h3 class="card-title"> Video </h3>
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
		  
		    
		   
	 <?php 
	    if(!empty($vedio)){
		foreach($vedio as $vedios){

			if($vedios['thumb_nail']){ ?>

				<div class="row slidenew <?= $vedios['video_id'] ?>" onclick="return addtopic('<?= $vedios['video_id'] ?>','<?= $vedios['video_title'] ?>','1')" data-id="<?= $vedios['video_id'] ?>" class=" " id="" style="border: 1px solid #a7a5a5;     height: 150px;
    width: 300px;  
    background-size: contain ; background-size: 100%;
    background-position: center;
    background-repeat: no-repeat; 
    background-image:url('<?= base_url('uploads/thumbnail/'.$vedios['thumb_nail'] ) ?>');
    border: 1px solid #ced0da;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    outline: none;">



		    </div>

		<?php	}else{
			?>

	     
		   
		    <div class="row slidenew <?= $vedios['video_id'] ?>" onclick="return addtopic('<?= $vedios['video_id'] ?>','<?= $vedios['video_title'] ?>','1')" data-id="<?= $vedios['video_id'] ?>" class=" " id="" style="border: 1px solid #a7a5a5;     height: 150px;
    width:300px;  
    background-size: contain ; background-size: 100%;
    background-position: center;
    background-repeat: no-repeat;  background: linear-gradient(0deg, rgba(236,239,244,1) 0%, rgba(255,255,255,1) 100%);
    border: 1px solid #ced0da;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    outline: none;">



		    </div>
		<?php } ?>
		     <span class="tspan"><?php echo $vedios['video_title'] ?></span>
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

	

	<!-- images -->
	

	<!-- presentation -->
	<li class="has-subnav">
	  <a href="javascript:;">
	    <i class="fa fa-television nav_icon"></i>
		
	    <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
	  </a>
	  <ul>
	    <li>
		





		  <div class="card" style="height: 657px; width: 350px; overflow-x: scroll;background-color: rgba(70,80,100,0.8);">
	    <div class="card-header">
		  <a href="#" id="" class="btn btn-primary-outline"><i class="fa fa-chevron-left" aria-hidden="true"></i></a> 
	     
		<h3 class="card-title"> Presentations</h3>
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
	<input type="text" class="searchTerm" placeholder="What are you looking for?">
	<button type="submit" class="searchButton">
	  <i class="fa fa-search"></i>
     </button>
   </div>
</div>
		  
		  <div class="col-md-12 col-lg-12 ppres">
		  
		    
		   
		 
	 <?php 
	    if(!empty($presentations)){
		foreach($presentations  as $slide){?>

	     
		   
		    <div class="row slidenew <?= $slide['topic_id'] ?>" onclick="return addtopic('<?= $slide['topic_id'] ?>','<?= $slide['presentation_title'] ?>','2')" data-id="<?= $slide['topic_id'] ?>" class=" " id="" style="border: 1px solid #a7a5a5;     height: 150px;
    width: 300px;  background-image:url('<?php echo base_url().'uploads/background/'.$slide['backgroundimage']?>');
    background-size: contain ; background-size: 100%;
    background-position: center;
    background-repeat: no-repeat;  /*background: linear-gradient(0deg, rgba(236,239,244,1) 0%, rgba(255,255,255,1) 100%);*/
    border: 1px solid #ced0da;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    outline: none;">



<!-- <span class="resume_create_up_link no_print">
	  <span class="spacer"></span>
	
	  <a href="javascript:void(0)" class="plusPresentation" data-id="<?= $slide['topic_id'] ?>">
		<icon class="fa fa-plus icon_size24"></icon>
	  </a>
	   <a href="javascript:void(0)" onclick="return getTopics(<?= $slide['topic_id'] ?>);" data-id="<?= $slide['topic_id'] ?>">
		<icon class="fa fa-clone" aria-hidden="true"></icon>
	  </a>
	  
    </span>
 -->


	    





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

<!-- Image gallery-->
<li class="has-subnav">
    <a href="javascript:void(0)">

    <i class="fa fa-file-image-o nav_icon"></i>
   
    <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
    </a>
    <ul>
      <li>




<div class="card chapter" style="height: 657px; width: 350px; overflow-x: scroll;background-color: rgba(70,80,100,0.8);">
      <div class="card-header">
                
      <h4 style="padding-top:5%;padding-right: 57%; ">Image Gallery</h4>                      
           
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
  
<!-- <div class="col-md-12"><input type="file" class="style imagegal" data-id="chapter"  name="imagegal" id="imagegal"></div> -->
<div id="imgl">

  <?php
   $directory = "./uploads/chapter";
    $files = glob($directory . "/*.*");
     // print_r($directory);
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
<!-- <button class="tablinks" onclick="openCity(event,'<?=$entry?>')"><?=$entry?></button> -->
<div class="col-md-12 " style="margin-bottom: 3%;"><img src="<?=base_url().'uploads/chapter/'.$image['chapter_image'] ?>" class="chapter<?=$i?>" style="height:150px;width:300px"
	onclick="return addtopicImage('<?= $image['id'] ?>','<?= $image['image_title'] ?>','6','<?=$image['chapter_image'] ?>')" 
     
      alt="Random image" style="
    padding: 1%;
"/><span class="tlabel"> </span></div>
  
<?php
//  } else {
//       continue;
//    }
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


<li class="has-subnav">
    <a href="javascript:void(0)">
    <i class="fa fa-folder-open-o nav_icon" aria-hidden="true"></i>
     
    <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
    </a>
    <ul>
      <li>







<div class="card folderdiv" style="height: 657px; width: 350px; overflow-x: scroll;background-color: rgba(70,80,100,0.8);">
      <div class="card-header">
      <h4 style="padding-top:5%;padding-right: 57%; ">Theme</h4>                      
           
 <div class="btn btn-primary-outline"   data-toggle="modal" data-target="#modalFolder"><i class="fa fa-plus"></i></div>

    </div>
<div class="card-body ">

<!-- <div class="container imagediv <?=$entry?>background" style="display: none;"> -->
        
        
        <div class="row" style="overflow-x: scroll;">
<div class="col-md-12">
   
 <div class="search">
  <input type="text" class="searchTerm" placeholder="What are you looking for?">
  <button type="submit" class="searchButton">
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
    $dirs[] = $entry; ?>
<!-- <button class="tablinks" onclick="openCity(event,'<?=$entry?>')"><?=$entry?></button> -->

<?php 
if(count(glob("./uploads/background/".$entry."/background/*"))===0){
?>
 <div class="col-md-6"  onclick="return hideshow('<?=$entry?>');"><img src="<?=base_url()?>uploads/background/pictures-folder.png" style=" width:150px; height:100px;"> 
 
<?php }else{ 
$firstFile = scandir("./uploads/background/".$entry."/background")[2]; 
  ?>

 <div class="col-md-6"  onclick="return hideshow('<?=$entry?>');"><img src="<?=base_url()?>uploads/background/<?=$entry."/background/".$firstFile?>" style=" width:150px; height:70px;"> 
 
<?php }

?>


  <!-- <icon class="fa fa-trash icon_size24 btnrem"></icon> -->
   
<span class="tlabel"> <?=$entry?></span>
</div>
     <?php  }
    }
}
?>




          
        </div>
        </div>
       
</div></div>









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





         


<div class="card imagefolderdiv <?=$entry?>" style="display: none; height: 657px; width: 350px; overflow-x: scroll;background-color: rgba(70,80,100,0.8);">
      <div class="card-header">
     <a href="javascript:void(0)" onclick="return back();" id="" class="btn btn-primary-outline"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
      <h4><?=$entry?> Folders</h4>                      
           


    </div>
<div class="card-body ">





        <div class="row">

        
     
<?php


if(count(glob("./uploads/background/".$entry."/background/*"))!=0){

 $firstFile1 = scandir("./uploads/background/".$entry."/background")[2]; 
?>

  <!-- <div class="col-md-6"  onclick="return hideshow('<?=$entry?>');"><img src="<?=base_url()?>uploads/background/<?=$entry.$firstFile?>" style=" width:150px; height:100px;">  -->
    <div class="col-md-6" onclick="return hideshowimage('<?=$entry?>background',0);"><img src="<?=base_url()?>uploads/background/<?=$entry?>/background/<?=$firstFile1?>"  style=" width:150px; height:70px;"><span class="tlabel"> Background</span></div>
<?php }else{ ?>

           
<!-- <button class="tablinks" onclick="openCity(event,'<?=$entry?>')"><?=$entry?></button> -->
<div class="col-md-6" onclick="return hideshowimage('<?=$entry?>background',0);"><img src="<?=base_url()?>uploads/background/pictures-folder.png"  style=" width:150px; height:70px;"><span class="tlabel"> Background</span></div>
    <?php } ?>

<?php

if(count(glob("./uploads/background/".$entry."/elements/*"))!=0){
 $firstFile2 = scandir("./uploads/background/".$entry."/elements")[2]; 
?>

  <!-- <div class="col-md-6"  onclick="return hideshow('<?=$entry?>');"><img src="<?=base_url()?>uploads/background/<?=$entry.$firstFile?>" style=" width:150px; height:100px;">  -->
<div class="col-md-6" onclick="return hideshowimage('<?=$entry?>elements',1);"><img src="<?=base_url()?>uploads/background/<?=$entry?>/elements/<?=$firstFile2?>"  style=" width:150px; height:70px;"><span class="tlabel"> Elements</span></div>
    
<?php }else{ ?>

<div class="col-md-6" onclick="return hideshowimage('<?=$entry?>elements',1);"><img src="<?=base_url()?>uploads/background/pictures-folder.png"  style=" width:150px; height:70px;"><span class="tlabel"> Elements</span></div>
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
    $dirs[] = $entry; 
?>
  <div class="card imagediv <?=$entry?>background" style="display: none; height: 657px; width: 350px; overflow-x: scroll;background-color: rgba(70,80,100,0.8);">
      <div class="card-header">
       <a href="javascript:void(0)" onclick="return backfolder('<?=$entry?>');" id="" class="btn btn-primary-outline"><i class="fa fa-chevron-left" aria-hidden="true"></i></a><h4><?=$entry?> Background Images</h4>                      
           


    </div>
<div class="card-body ">

<!-- <div class="container imagediv <?=$entry?>background" style="display: none;"> -->
        
        <div class="row">
  
   <div class="col-md-12"><input type="file" class="style imagef" data-id="<?php echo $entry; ?>"  name="imagef" id="imagef">
<!-- <button id="imagesave" class="btn btn-primary">save</button> -->
   </div>

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
     
      alt="Random image" style=" width:150px; height:70px; padding: 5%;" style="
    padding: 1%;
"/><span class="tlabel"> </span></div>
   

<?php } else {
       continue;
    }
      }
    } ?>

          
           


        </div>
        </div>

</div>






  <div class="card imagediv <?=$entry?>elements" style="display: none;height: 657px; width: 350px; overflow-x: scroll;background-color: rgba(70,80,100,0.8);">
      <div class="card-header">

          <a href="javascript:void(0)" onclick="return backfolder('<?=$entry?>');" id="" class="btn btn-primary-outline"><i class="fa fa-chevron-left" aria-hidden="true"></i></a><h4> <?=$entry?> Elements Images</h4>
  

      </div>

<div class="card-body ">

        <!-- <div class="container > -->
        
        <div class="row">

<div class="col-md-12"><input type="file" class="style imageele" data-id="<?php echo $entry; ?>"  name="imageele" id="imageele"></div>
       

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
<div class="col-md-6"><img src="<?=base_url().$image ?>" style=" width:150px; height:70px; padding: 5%;" class="<?=$entry.$i?>"
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

</div>
<?php }}} ?>










      </li>
    
    </ul>
  </li>






	<li class="has-subnav">
	  <a href="javascript:;">
	    <i class="icon-font nav-icon"></i>
	    
	  </a>
	  <ul>
	    <li>
		<div class="card" style="height: 657px; width: 350px; overflow-x: scroll; background-color: rgba(70,80,100,0.8);">
	    <div class="card-header">
		
		<h3 class="card-title"> Topic Styles</h3>
	     
	    </div>
	    <div class="card-body" id="card-newslide">


		<div class="row " >


		  
		  <div class="col-md-12 col-lg-12">

			    <label  class="form-label tlabel">Background color</label> 
			  <input type="color" name="bgcolor" id="bgcolor" class=" buttons tstyle" data-attr="backgroundcolor" style="" value="#eceff4" data-id="" placeholder="Enter background color"> 

			   <!-- <label  class="form-label tlabel">Topic Title</label> 
			  <input type="text" name="topic_title" id="topic_title" class="buttons tstyle styletopic" data-attr="topic_title" style="" value=" " data-id="" placeholder="Enter topic title">  
			     -->

			  <!--   <label  class="form-label tlabel">Topic Font color</label> 
			    <input type="color" name="topiccolor"  id="topiccolor" class="styletopic buttons tstyle" data-attr="topic_color" style="" value="#eceff4" data-id="" placeholder="Enter topic font color"  > -->

			<!--   <label  class="form-label tlabel">Topic Border Color</label> 
			  <input type="color" name="topic_bordercolor" id="topic_bordercolor" class="buttons tstyle styletopic" data-attr="topic_bordercolor" style="" value="#eceff4" data-id="" placeholder="Enter topic border color"> 

 --><!-- 
			   <label  class="form-label tlabel">Topic Background color</label> 
			  <input type="color" name="topic_bgcolor" id="topic_bgcolor" class="buttons tstyle styletopic" data-attr="topic_backgroundcolor" style="" value="#eceff4" data-id="" placeholder="Enter background color"> 

			    <label  class="form-label tlabel">Topic font size</label> 
			  <input type="number" name="topic_fontsize" id="topic_fontsize" class="buttons tstyle styletopic" data-attr="topic_fontsize" style="" value="" data-id="" placeholder="Enter font size"> 
 -->
			    <label  class="form-label tlabel">Topic height</label> 
			  <input type="number" name="topic_height" id="topic_height" class="buttons  styletopic" data-attr="topic_height" style="" value="" data-id="" placeholder="Enter height "> 

			   <label  class="form-label tlabel">Topic Width</label> 
			  <input type="number" name="topic_width" id="topic_width" class="buttons  styletopic" data-attr="topic_width" style="" value="" data-id="" placeholder="Enter height "> 
</div></div></div></div>
			 
	    </li>
	  </ul>
	</li>

	<!-- topic add -->
	<!-- <li>
	  <a href="javascript:;" onclick="addtopic()" data-target="#exampleModalhead" title="Topic Add">
	    <i class="fa fa-plus-square-o nav-icon"></i>
	   
	  </a>
	</li> -->


	<!-- content add -->
	<!-- <li>
	  <a href="#" title="Content Add"  data-toggle="modal" data-target="#exampleModalcontent">
	    <i class="fa fa-text-width nav-icon" aria-hidden="true"></i>
	   
	  </a>
	</li> -->


	<li >
	  <a href="<?=base_url()?>/chapter-view/<?=$chapter_id?>" class="btn btn-primary-outline" target="_blank"  title="Present">
	    <i class="fa fa-eye nav-icon" aria-hidden="true"></i>
	    
	  </a>
	</li>
<li>
	<a href="<?=base_url()?>chapters?id=<?= $paper?>" id="" class="btn btn-primary-outline">
	<i class="fa fa-home nav-icon"></i>
     
	</a>
	</li>



<!-- questions -->
	
	<!-- styles -->

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
    <ul class="logout">
	
    </ul>
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
    
    /*height: calc(68vh - 25vmax);*/
   /* display: flex;
  align-items: center;
  justify-content: center */
  background-size: contain ; background-size: 100%;
  background-position: center;
  background-repeat: no-repeat;
   margin: 10px; width: auto; 
 

}
/*.circle h3{
  position:absolute;
  top:50%; left:50%;
  transform: translate(-50%, -50%);
  margin:0;
  text-align: center;
}*/




.topics{
    /*width: 50%;*/

}

#ppage{
	 background-color: <?=$chapter_content['backgroundcolor']?>;
  background-image:url('<?php echo base_url().'uploads/background/'.$chapter_content['backgroundimage']?>');
     border: 1px solid #fdeb10de;
    height: 450px;
  width: 800px;
  background-size: contain ; 
  background-size: 100%;
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


<input type="hidden" name="topic_id"  id="topic_id" value="<?= $chapter_id?>"> 
<input type="hidden" name="tid"  id="tid" value=""> 













<div class="topbar" style="height: 82px;width: 800px; background-color: #fff; top: 20px; left: 60px; position: absolute;">
	

	<div class="col-md-12" >	<div class="row">
  <div class="col-sm-4" style="padding-top: 3%;" id="topic_title" >
 </div>
  <div class="col-sm-8 toolbar"></div>
  
</div>  </div>
</div>

  <section class="wrapper scrollable">
<!-- <div class="demo-inline"></div>  -->

  <div class=" ppage content" id="ppage" style="">
	 
		    <?php 
			if(!empty($chapter_content)){
			  
		    ?>
		 <!--   topic_content_posiition_left
		   topic_content_posiition_top -->
			  <div class="row topics">
			    <?php 
			    	 // print_r($chapter_content['contents']);
			    foreach ($chapter_content['contents'] as $tpcs) {
			    		// echo $tpcs['topic_position_left']."xxxxxxxxxxxxxxxxxxxxxxx";
					    if($tpcs['topic_position_left']){
						  $leftp = $tpcs['topic_position_left'];
					    }else{
						  $leftp = 150;
					    }

					    if($tpcs['topic_position_top']){
						  $topp = $tpcs['topic_position_top'];
					    }else{
						  $topp = 150;
					    }

if($tpcs['type']==6){
	$imageb = base_url().'uploads/chapter/'.$tpcs['image'];
}else{
	$imageb = base_url().'uploads/background/'.$tpcs["topic_backgroundimage"];
}


if($tpcs["topic_backgroundimage"] ==""){
   echo '<div class="circle tcircle task" data-val="c'.$tpcs['id'].'"  data-id="'.$tpcs['id'].'" style="background-color:'.$tpcs['topic_backgroundcolor'].'; color:'.$tpcs['topic_color'].';  top:'.$topp.'px; left:'.$leftp.'px;   background-image:url('.$imageb.'); position:absolute; height:'.$tpcs['topic_height'].'px;width:'.$tpcs['topic_width'].'px;  " >';

   echo'<div style="top:'.$tpcs['topic_content_position_top'].'px; left:'.$tpcs['topic_content_position_left'].'px; position:absolute;" class="tinymce-body tcontent" id="'.$tpcs['id'].'"  data-val="p'.$tpcs['id'].'" data-id="'.$tpcs['id'].'">';

if($tpcs['type']!=6){
	echo $tpcs['topic_title'];
}
echo '</div>';
   echo'<span class="resume_create_up_link no_print">
	  <span class="spacer"></span>
	  <a href="javascript:void(0)" data-id="'.$tpcs['id'].'" id="delete" class="delete-topic">
		<icon class="fa fa-trash icon_size24"></icon>
	  </a>
    </span>
</div>';
 }else{
      echo '<div class="circle mcircle task" data-val="c'.$tpcs['id'].'"  data-id="'.$tpcs['id'].'" style="background-color:'.$tpcs['topic_backgroundcolor'].'; color:'.$tpcs['topic_color'].';  top:'.$topp.'px; left:'.$leftp.'px;   background-image:url('.$imageb.'); position:absolute; height:'.$tpcs['topic_height'].'px;width:'.$tpcs['topic_width'].'px;  " >';

      echo'<div style="top:'.$tpcs['topic_content_position_top'].'px; left:'.$tpcs['topic_content_position_left'].'px; position:absolute;" class="tinymce-body tcontent tdrag" id="'.$tpcs['id'].'"  data-val="p'.$tpcs['id'].'" data-id="'.$tpcs['id'].'">';
if($tpcs['type']!=6){
	echo $tpcs['topic_title'];
}
echo '</div>';
      echo'<span class="resume_create_up_link no_print">
	  <span class="spacer"></span>
	  <a href="javascript:void(0)" data-id="'.$tpcs['id'].'" id="delete" class="delete-topic">
		<icon class="fa fa-trash icon_size24"></icon>
	  </a>
	 
    </span>


</div>';
 }










// 					    echo '<div class="circle  task" data-val="c'.$tpcs['id'].'"  data-id="'.$tpcs['id'].'" style="background-color:'.$tpcs['topic_backgroundcolor'].'; color:'.$tpcs['topic_color'].';  top:'.$topp.'px; left:'.$leftp.'px;   background-image:url('.base_url().'uploads/background/'.$tpcs["topic_backgroundimage"].'); position:absolute; height:'.$tpcs['topic_height'].'px;width:'.$tpcs['topic_width'].'px;  " ><div style="top:'.$tpcs['topic_content_position_top'].'px; left:'.$tpcs['topic_content_position_left'].'px; position:absolute;" class="tinymce-body tcontent" id="'.$tpcs['id'].'"  data-val="p'.$tpcs['id'].'" data-id="'.$tpcs['id'].'">'.$tpcs['topic_title'].'</div>';


// 					    echo'<span class="resume_create_up_link no_print">
// 	  <span class="spacer"></span>
// 	  <a href="javascript:void(0)" data-id="'.$tpcs['id'].'" id="delete" class="delete-topic">
// 		<icon class="fa fa-trash icon_size24"></icon>
// 	  </a>
	 
//     </span>


// </div>';
					  } ?>













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



<!-- Modal content -->
<div class="modal " id="exampleModalcontent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
       <input type="hidden" name="folder_topic" id="folder_topic"  value="<?= $chapter_id?>"  > 

      <input type="text" name="folder" id="folder" pattern="[A-Za-z]{2,}" title="only accept alphabets" class="form-control" required="">
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
       <input type="hidden" name="chapter_id" id="chapter_id"  value="<?= $chapter_id?>"  > 
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




<style type="text/css">
  .about-accordion-open ul { width: 350px !important; }
  .main-menu { overflow: visible; }
  .openup { overflow: visible !important; }
</style>





  <!-- <script src="<?=base_url()?>slide/js/bootstrap.js"></script> -->
  <script src="<?=base_url()?>slide/js/proton.js"></script>







 <script src="https://cdn.tiny.cloud/1/jrsjj47h3k9y6272lmftp2j56agyzl6a86u1fvt8n8bzbxvw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  
  <script type="text/javascript">
    
var emailHeaderConfig = {
  selector: '.tinymce-heading',
  menubar: false,
  inline: true,
  plugins: [
    'lists',
    'powerpaste',
    'autolink'
  ],
  toolbar: 'undo redo | bold italic underline',
  valid_elements: 'strong,em,span[style],a[href]',
  valid_styles: {
    '*': 'font-size,font-family,color,text-decoration,text-align'
  },
  powerpaste_word_import: 'clean',
  powerpaste_html_import: 'clean',
  content_css: '//www.tiny.cloud/css/codepen.min.css'
};

var emailBodyConfig = {
  selector: '.tinymce-body',
  menubar: false,
  inline: true,
  fixed_toolbar_container: ".toolbar",
  
  toolbar: [
    'undo redo | bold italic underline | fontselect fontsizeselect',
    'forecolor backcolor | alignleft aligncenter alignright alignfull | numlist bullist outdent indent'
  ],
  valid_elements: 'p[style],strong,em,span[style],a[href],ul,ol,li',
  valid_styles: {
    '*': 'font-size,font-family,color,text-decoration,text-align'
  },
  powerpaste_word_import: 'clean',
  powerpaste_html_import: 'clean',
  content_css: '//www.tiny.cloud/css/codepen.min.css'
};

tinymce.init(emailHeaderConfig);
tinymce.init(emailBodyConfig);


  </script>

<script>
  $(document).ready(function(){
	$(".imagediv").hide();
	$(".imagefolderdiv").hide();
	  // $("p").attr("contenteditable",true);

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

 
</script>

<script type="text/javascript">  
    var base_url =  '<?php echo base_url() ?>';
	    
	  function addImage(imge) { 
	     

	    var baseurlim = '<?php echo base_url() ?>uploads/background/';
	     
		var sid = $("#topic_id").val();
		
		$.ajax({

		    url: base_url+"add-image-chapter-back",
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
	    
   
	    var baseurlim = '<?php echo base_url() ?>uploads/background/';
	     


		var sid = $("#topic_id").val();
		var tid = $("#tid").val();
		// alert(tid);
		
		  $.ajax({

		    url: base_url+"add-image-chapter",
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



	 //    function addImagegallery(imge,cl) { 
	 //     height =$('.'+cl).height();
	 //     width =$('.'+cl).width();
	    
	 //    var baseurlim = '<?php echo base_url() ?>uploads/imagegallery/';
	     


		// var sid = $("#topic_id").val();
		// var tid = $("#tid").val();
		// // alert(tid);
		
		//      $.ajax({

		// 	    url: base_url+"add-image-gallery",
		// 	    type: "POST",
		// 	    data:{image:imge,height:height,width:width,topic_parent_id:sid} ,
			
		// 	    success: function(out){
		// 		 out = JSON.parse(out);

		// 			if(out.status == 1){
		// 			  getContents();
		// 			     // $(".bimage").css("background-image", out.data);
						     
		// 			}
		     

		// 		  console.log(out.data);
		// 	    }
		// 	});         
		
		
		

		

	 //  }  


// function addtopic(id) { 
// 		var sid = $("#topic_id").val();
// 		var tid = $("#tid").val();
// 	    $.ajax({

// 			    url: base_url+"add-topicimage",
// 			    type: "POST",
// 			    data:{topic_content_id:id} ,
			
// 			    success: function(out){
// 					out = JSON.parse(out);
// 					if(out.status == 1){
//     					window.location.reload();                           
// 					}
// 				  	console.log(out.data);
// 			    }
// 		});         
// }






$(document).ready(function(){

	$(document).on('keyup','.tcontent',function(e){
	  // alert("hi");
	   var tid = $(this).attr('data-id');
	  // var content = $(this).text();
	  var content = tinymce.get(tid).getContent();
	   // alert(content+' '+tid);

	  	$.ajax({
		    url:base_url+'update-chapter',
		    type:'post',
		    data:{id:content,cval:'topic_title',topic_id:tid},
			  success: function(out){
				var out = JSON.parse(out);
				if(out.status == 404){
				    window.location.href = base_url;
				}
				else if(out.status == 1){
				    // window.location.reload();
				}
				else{

				}
			  }
		 })
	});
   	var tid = $("#tid").val();
    if(tid != ""){
    	getTopic(tid);
    }
  
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

 });

$(document).on('click','.delete-topic-btn',function(e){
    e.preventDefault();
    // var id = $(this).attr('data-id');
   var tid = $("#tid").val();

    
		    $.ajax({
			 
			  url:base_url+'update-chapter',
		    type:'post',
		    data:{id:0,cval:'status',topic_id:tid},
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

$(document).on('click','.delete-topic',function(e){
    e.preventDefault();
    var tid = $(this).attr('data-id');
   // var tid = $("#tid").val();

  
		    $.ajax({
			 
			  url:base_url+'update-chapter',
		    type:'post',
		    data:{id:0,cval:'status',topic_id:tid},
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



function getTopic(tid){
  $.ajax({
		    url:base_url+'get-chapter',
		    data:{topicid:tid},
		    type:'post',
		    success: function(out){
			  out = JSON.parse(out);
			  if(out.status == 1){
			  	 var ll =out.data.ttitle;
          if (ll.length > 20) {
            llc = getWords(ll)+"..";
            // alert(llc);
            $("#topic_title").text(llc);
          }else{
            $("#topic_title").text(ll);
          }
			     // $("#topic_title").html(out.data.topic_title);
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

    <script type="text/javascript">  


	



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
            window.location.reload();
               
        }
       
           
        console.log(out.data);
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
            window.location.reload();
               
        }
       
           
        console.log(out.data);
        }
    });
    });

		
    </script>  
   








<script type="text/javascript">

$(document).ready(function() {

    $(".tcircle").draggable();
    $(".mcircle").draggable();
    $(".tdrag").draggable();

 });
 
</script>
<script type="text/javascript">
  
 




  function getContents(){
    window.location.reload();
  }

 




$(document).on('change','.styletopic',function(e){
	var val = $(this).val();
	var att = $(this).attr('data-attr');
	// alert(att);
	var topic_id = $("#tid").val();
	// alert(topic_id);
	tbcolor = $("#topic_bgcolor").val();
	bcolor = $("#bgcolor").val();
	title = $("#topic_title").html();
	fsize = $("#topic_fontsize").val();
	// alert(fsize);
	color = $("#topiccolor").val();
	theight = $("#topic_height").val();
	twidth = $("#topic_width").val();



	// alert(att);
	  $.ajax({
	    url:base_url+'update-chapter',
	    type:'post',
	    data:{id:val,cval:att,topic_id:topic_id},
	    success: function(out){
		  out = JSON.parse(out);
		  if(out.status == 1){
		    // $('[data-val="p'+topic_id+'"]').css("background-color", tbcolor);
		    if(att == "topic_title"){
			 $('[data-val="p'+topic_id+'"]').text(title);
		    }else if(att == "topic_fontsize"){
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

});


$(document).on('change','.tstyle',function(e){
	var val = $(this).val();
	var att = $(this).attr('data-attr');
	// alert(att);
	var chapter_id = $("#topic_id").val();
	alert(chapter_id);
	// alert(topic_id);
	tbcolor = $("#topic_bgcolor").val();
	bcolor = $("#bgcolor").val();
	title = $("#topic_title").html();
	fsize = $("#topic_fontsize").val();
	// alert(fsize);
	color = $("#topiccolor").val();
	theight = $("#topic_height").val();
	twidth = $("#topic_width").val();



	// alert(att);
	  $.ajax({
	    url:base_url+'update-chapter-data',
	    type:'post',
	    data:{id:val,cval:att,chapter_id:chapter_id},
	    success: function(out){
		  out = JSON.parse(out);
		  if(out.status == 1){
		    // $('[data-val="p'+topic_id+'"]').css("background-color", tbcolor);
		    if(att == "topic_title"){
			 $('[data-val="p'+topic_id+'"]').text(title);
		    }else if(att == "topic_fontsize"){
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

});



</script>

    
    <script type="text/javascript">
  
    </script>

    <script type="text/javascript">

    function addtopic(id,title,type){
	// con = $('#topiccont').html();
	var chapterid = $("#topic_id").val();
	// var tid = $("#tid").val();

	   $.ajax({

			    url: base_url+"add-chapterimage",
			    type: "POST",
			    data:{id:id,title:title,type:type,chapterid:chapterid} ,
			    success: function(out){
				 out = JSON.parse(out);
					if(out.status == 1){
    					window.location.reload();                                   
    					//$(".bimage").css("background-image", out.data);
					}
				  console.log(out.data);
			    }
			});  
    }


    function addtopicImage(id,title,type,image){
	// con = $('#topiccont').html();
	var chapterid = $("#topic_id").val();
	// var tid = $("#tid").val();

	   $.ajax({

			    url: base_url+"add-chapterimagegallery",
			    type: "POST",
			    data:{id:id,title:title,type:type,chapterid:chapterid,image:image} ,
			    success: function(out){
				 out = JSON.parse(out);
					if(out.status == 1){
    					window.location.reload();                                   
    					//$(".bimage").css("background-image", out.data);
					}
				  console.log(out.data);
			    }
			});  
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

    $(document).on('click','.mcircle',function(e){
      $(this).draggable('enable');
   });
   $(document).on('click','.tcircle',function(e){
      $(this).draggable('enable');
   });
   $(document).on('click','.tdrag',function(e){
      $(this).draggable('enable');
   });

  var dragposition = '';
  $('.mcircle').draggable({
     containment: "#ppage",
    cursor: "move",
    disabled: false,
     // other options...
     drag: function(event,ui){
    dragposition = ui.position;
    var topicid = $(this).attr('data-id');
    $(".mcircle").css("border","none");
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
		    url:base_url+'update-chapter-position',
		    type:'post',
		    data:{left:l,top:t,topicid:topicid},
		    success: function(out){
			  out = JSON.parse(out);
			  // alert(2);

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
     },
     stop:function(ev,ui){

         // alert('r');
    // $(this).css("border","none");

            //if(dropped) alert(ui.item.attr("id");
            //else alert("Not dropped");
        }
  });
// });

  // $(document).on('dblclick','.tcircle',function(e){

    var dragpositiont = '';
  $('.tcircle').draggable({
     containment: "#ppage",
    cursor: "move",
    disabled: false,

     // other options...

     drag: function(event,ui){
    dragpositiont = ui.position;
    var topicid = $(this).attr('data-id');
    $(".circle").css("border","none");
    $(this).css("border","2px dashed #999");
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
		    url:base_url+'update-chapter-position',
		    type:'post',
		    data:{left:l,top:t,topicid:topicid},
		    success: function(out){
			  out = JSON.parse(out);
			  // alert(2);

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
		    url:base_url+'update-chapter-content-position',
		    type:'post',
		    data:{left:tl,top:tt,topicid:topicid},
		    success: function(out){
			  out = JSON.parse(out);
			  if(out.status == 1){
			    $(this).css("left", tl);
			    $(this).css("top", tt);
			  
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

       
        }
  });
// });
// $(document).on('dblclick','.tdrag',function(e){

  var dragpos = '';
  $('.tdrag').draggable({
    containment: "#ppage",
    cursor: "move",
    disabled: false,

     // other options...
     drag: function(event,ui){
    dragpos = ui.position;
    var topicid = $(this).attr('data-id');
    $(".tcontent").css("border","none");
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
		    url:base_url+'update-chapter-content-position',
		    type:'post',
		    data:{left:l,top:t,topicid:topicid},
		    success: function(out){
			  out = JSON.parse(out);
			  if(out.status == 1){
			    $(this).css("left", l);
			    $(this).css("top", t);
			    // $(this).css("border","none");

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
     },
     stop:function(ev,ui){

         // alert('r');
    // $(this).css("border","none");

            //if(dropped) alert(ui.item.attr("id");
            //else alert("Not dropped");
        }
  });

// });
</script>
    <script type="text/javascript">
	// var dragposition = '';
	// $('.circle').draggable({
	//    // other options...
	//    drag: function(event,ui){
	// 	dragposition = ui.position;
	// 	var topicid = $(this).attr('data-id');
	// 	$(this).css("border","2px dashed #999");
	// 	 // alert(topicid);
	// 	 // alert(dragposition.left+' '+dragposition.top);
	//   //var l = ( 100 * parseFloat(dragposition.left / 770) ) + "%" ;
	//   // var t = ( 100 * parseFloat(dragposition.top / 500) ) + "%" ;

	//   var l = dragposition.left ;
	//   var t = dragposition.top ;

	//   // $(this).css("left", l);
	//   // $(this).css("top", t);
	//   // alert($(this).position().left+'%%%%%%%'+dragposition.left);
	// 	  $.ajax({
	// 	    url:base_url+'update-chapter-position',
	// 	    type:'post',
	// 	    data:{left:l,top:t,topicid:topicid},
	// 	    success: function(out){
	// 		  out = JSON.parse(out);
	// 		  // alert(2);

	// 		  if(out.status == 1){
	// 		    $(this).css("left", l);
	// 		    $(this).css("top", t);
	// 		  }
	// 		  else if(out.status==0){
	// 			alert(out.data);
	// 		  }
	// 		  else{
	// 			window.location.href = base_url;
	// 		  }
	// 	    }
	// 	  })
	//    },
	//     stop:function(ev,ui){
	//     	// alert('r');
	// 	$(this).css("border","none");

 //            //if(dropped) alert(ui.item.attr("id");
 //            //else alert("Not dropped");
 //        }
	// });


	// var dragpos = '';
	// $('.tcontent').draggable({
	//    // other options...
	//    drag: function(event,ui){
	// 	dragpos = ui.position;
	// 	var topicid = $(this).attr('data-id');
	// 	$(this).css("border","2px dashed #999");
	// 	 // alert(topicid);
	// 	 // alert(dragposition.left+' '+dragposition.top);
	//   //var l = ( 100 * parseFloat(dragposition.left / 770) ) + "%" ;
	//   // var t = ( 100 * parseFloat(dragposition.top / 500) ) + "%" ;

	//   var l = dragpos.left ;
	//   var t = dragpos.top ;

	//   // $(this).css("left", l);
	//   // $(this).css("top", t);
	//   // alert($(this).position().left+'%%%%%%%'+dragposition.left);
	// 	  $.ajax({
	// 	    url:base_url+'update-chapter-content-position',
	// 	    type:'post',
	// 	    data:{left:l,top:t,topicid:topicid},
	// 	    success: function(out){
	// 		  out = JSON.parse(out);
	// 		  if(out.status == 1){
	// 		    $(this).css("left", l);
	// 		    $(this).css("top", t);
	// 		    // $(this).css("border","none");

 // // $(this).css("border","1px solid #fff");

	// 		    // getContents();
	// 		  }
	// 		  else if(out.status==0){
	// 			alert(out.data);
	// 		  }
	// 		  else{
	// 			window.location.href = base_url;
	// 		  }
	// 	    }
	// 	  })
	//    },
	//     stop:function(ev,ui){
	//     	// alert('r');
	// 	$(this).css("border","none");

 //            //if(dropped) alert(ui.item.attr("id");
 //            //else alert("Not dropped");
 //        }
	// });


	



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
	     // var topic_image_id = $(this).attr('data-id');

	   $.ajax({
		    url:base_url+'update-chapter-values',
		    type:'post',
		    data:{height:height,width:width,topicid:topicid},
		    success: function(out){
			  out = JSON.parse(out);
			  if(out.status == 1){

			    $(this).css("height", height);
			    $(this).css("width", width);
			    $(this).css("border","none");

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
// $(".about-accordion-menu .about-accordion-head").click(function(){
//     $(this).parent('.about-accordion-menu').toggleClass('about-accordion-open');
//     $('.about-accordion-menu .about-accordion-head').not(this).parent('.about-accordion-menu').removeClass('about-accordion-open');
// });

// $(".has-subnav a").click(function(){
//     $(this).parent('.has-subnav').toggleClass('about-accordion-open');
//     $('.main-menu').addClass('openup');
//     $('.has-subnav a').not(this).parent('.has-subnav').removeClass('about-accordion-open');
// });
$(document).ready(function(){
  // $(".has-subnav a").hover(function(){
  //     $(this).parent('.has-subnav').addClass('about-accordion-open');
  //     $('.main-menu').addClass('openup');
  //     $('.has-subnav a').not(this).parent('.has-subnav').removeClass('about-accordion-open');

  // });
  $('.main-menu').addClass('openup');
  $('.main-menu ul li:first').addClass('about-accordion-open');
  $(".has-subnav a").click(function(){
      $(this).parent('.has-subnav').addClass('about-accordion-open');
      $('.main-menu').addClass('openup');
      $('.has-subnav a').not(this).parent('.has-subnav').removeClass('about-accordion-open');

  });


  $(".circle").click(function(){
    $('.circle').css("border","none");
    $('.tcontent').css("border","none");
    $('.timage').css("border","none");
    $('.contents').css("border","none");

    $(this).css("border","2px dashed #999");
     $(this).find('.tcontent').css("border","2px dashed #999");


  });

  $(".timage").click(function(){
     $('.circle').css("border","none");
    $('.tcontent').css("border","none");
    $('.timage').css("border","none");
    $('.contents').css("border","none");

    $(this).css("border","2px dashed #726465");
  });

$(".contents").click(function(){
     $('.circle').css("border","none");
    $('.tcontent').css("border","none");
    $('.timage').css("border","none");
    $(this).css("border","2px dashed #726465");
  });



  // $(".circle").hover(function(){
  //   $('.circle').css("border","none");
  //   $(this).css("border","2px dashed #999");
  // });

  $(".timage").hover(function(){
     $('.circle').css("border","none");
    $('.tcontent').css("border","none");
    $('.timage').css("border","none");
    $(this).css("border","2px dashed #726465");
  });
})



</script>

<script type="text/javascript">
  function getImage(){
      var sid = $("#imagesearch").val();
    // alert(sid);
    $.ajax({

        url: base_url+"get-image",
        type: "POST",
        data:{searchTerm:sid} ,
    
        success: function(out){
       out = JSON.parse(out);
       console.log(out);
        if(out.status == 1){

           if(out.data.length>0){
        html ='';
        for(var i=0;i<out.data.length;i++){
             // alert(out.data[i]['chapter_image']+' '+i);
          html += '<div class="col-md-12" style="margin-bottom:3%;"><img src="<?=base_url()?>uploads/chapter/'+out.data[i]['chapter_image']+'" class="chapter<?=$i?>" style="height:150px;width:300px" onclick = "addchapter(';
          html +="'"+out.data[i]['chapter_image']+"','chapter'";
          html +=')"  alt="Random image" style=" padding: 1%; "/><span class="tlabel"> </span></div>';
               
        }
        $('#imgl').html(html);
        // alert(html);

        }

        console.log(out.data);
        }
    }
    });
    }
</script>
      <script type="text/javascript">
      
    $(document).on('click','#imagegalr',function(e){
       

      var baseurlim = '<?php echo base_url() ?>uploads/background/';
       
    var topid = $("#topid").val();
    var imagetags = $("#image_tags").val();
    var file_data = $('#image').prop('files')[0];  
    var imagetitle = $("#image_title").val();


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
       
           
        console.log(out.data);
        }
    });
    

    });

    
</script>



</body>
</html>