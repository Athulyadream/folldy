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
  outline: 2px solid #2276d2;
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
</style>
<body class="dashboard-page">

<input type="hidden" name="chapter_id" id="chapter_id" value="<?=$chapter_id?>">
 

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
.timage{
    
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




.topics{
    width: 50%;

}

#ppage{
     border: 2px solid #fdeb10de;
    height: 450px;
    width: 900px;
  background-color: <?=$chapter_content['backgroundcolor']?>;

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













<div class="topbar" style="height: 82px;width: 900px; background-color: #fff; top: 20px; left: 200px; position: absolute;">
	

	<div class="col-md-12" >	<div class="row">
  <div class="col-sm-4" style="padding-top: 3%;" id="topic_title"> </div>
  <div class="col-sm-8 toolbar"></div>
  
</div>  </div>
</div>

  <section class="wrapper scrollable" style="left:200px !important;">
<!-- <div class="demo-inline"></div>  -->

  <div class=" ppage content" id="ppage" style="background-image:url('<?php echo base_url()?>'uploads/background/'<?=$chapter_content['backgroundimage']?>');">
	 
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

					    echo '<div class="circle  task" data-val="c'.$tpcs['id'].'"  data-id="'.$tpcs['id'].'" style="background-color:'.$tpcs['topic_backgroundcolor'].'; color:'.$tpcs['topic_color'].';  top:'.$topp.'px; left:'.$leftp.'px;   background-image:url('.base_url().'uploads/background/'.$tpcs["topic_backgroundimage"].'); position:absolute; height:'.$tpcs['topic_height'].'px;width:'.$tpcs['topic_width'].'px;  " >';




					    // echo' <p class="tcontent"  data-val="p'.$tpcs['id'].'" data-id="'.$tpcs['id'].'"  style="top:'.$tpcs['topic_content_position_top'].'px; left:'.$tpcs['topic_content_position_left'].'px;font-size:'.$tpcs['topic_fontsize'].'px;position:absolute;">'.$tpcs['topic_title'].'</p>';
echo '<div style="top:'.$tpcs['topic_content_position_top'].'px; left:'.$tpcs['topic_content_position_left'].'px; position:absolute;" class="tinymce-body tcontent" data-val="p'.$tpcs['id'].'" data-id="'.$tpcs['id'].'" id="'.$tpcs['id'].'">'.$tpcs['topic_title'].'</div>';


					    echo'</div>';
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




  <!-- <script src="<?=base_url()?>slide/js/bootstrap.js"></script> -->
  <script src="<?=base_url()?>slide/js/proton.js"></script>







 <script src="https://cdn.tiny.cloud/1/jrsjj47h3k9y6272lmftp2j56agyzl6a86u1fvt8n8bzbxvw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  
  <script type="text/javascript">
    


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

tinymce.init(emailBodyConfig);


  </script>


<script type="text/javascript">  
    
	  




$(document).ready(function(){

	$(document).on('keyup','.tcontent',function(e){
	   // alert("hi");
	   var tid = $(this).attr('data-id');
     // alert(tid);
    // var content = $(this).text();
    var content = tinymce.get(tid).getContent();
	  	$.ajax({
		    url:base_url+'update-chapter-title',
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
   	// var tid = $("#tid").val();
 
  
});

</script>

<script type="text/javascript">

$(document).on('click','.circle',function(e){
    var tid = $(this).attr('data-id');
    $("#tid").val(tid);
    getTopic(tid);
 });





function getTopic(tid){

  $.ajax({
		    url:base_url+'get-chapter-teacher',
		    data:{topicid:tid},
		    type:'post',
		    success: function(out){
			  out = JSON.parse(out);
			  if(out.status == 1){
			  	// alert(out.data.topic_title);
			     $("#topic_title").html(out.data.topic_title);
			    
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



</script>
<script type="text/javascript">
  
 




  function getContents(){
    window.location.reload();
  }

  // function getContents(){
  //   window.location.reload();
    // var topicid = $("#topic_id").val();
    // var baseurlim = '<?php //echo base_url() ?>uploads/background/';
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
  // }





</script>



    



   
</body>
</html>