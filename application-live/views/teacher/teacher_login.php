<!doctype html>
<html lang="en" dir="ltr">
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
    <link rel="icon" href="<?= base_url()?>home_assets/images/favicon.png" type="image/x-icon"/>
   <link rel="shortcut icon" type="png" href="<?= base_url()?>home_assets/images/favicon.png" id="favicon" data-original-href="<?= base_url()?>home_assets/images/favicon.png" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css"> 
    
    <link rel="stylesheet" href="<?= base_url()?>home_assets/css/layout.css?20">
     <link rel="stylesheet" href="<?= base_url()?>home_assets/css/theme.css?19">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext"> -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js?3"></script>
    <script src="<?=base_url()?>assets/js/require.min.js"></script>
    <script>
      var base_url = '<?=base_url()?>';
      requirejs.config({
          baseUrl: '<?=base_url()?>',
          paths: {
            "jquery" : "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min",
            "jquery_ui" : "https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min",
          }
      });
    </script>
    <!-- Dashboard Core -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
   <!--  <link href="<?=base_url()?>assets/css/dashboard.css?11" rel="stylesheet" /> -->
    <script src="<?=base_url()?>assets/js/dashboard.js?11"></script>
    <!-- c3.js Charts Plugin -->
    <!-- <link href="<?=base_url()?>assets/plugins/charts-c3/plugin.css" rel="stylesheet" /> -->
    <script src="<?=base_url()?>assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
   <!--  <link href="<?=base_url()?>assets/plugins/maps-google/plugin.css" rel="stylesheet" /> -->
    <script src="<?=base_url()?>assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="<?=base_url()?>assets/plugins/input-mask/plugin.js"></script>
    <!-- <script src="<?= base_url()?>home_assets/js/jquery-3.2.1.slim.min.js" ></script> -->

    <style>
		.header { display: none !important;  }
	</style>
  </head>
  <body class="">
  	<div class="page-content section">
<div class="container">
	<div class="row align-items-center mt-30p">
		<div class="col-lg-8 col-md-7 col-sm-6 col-12 mt-30p mb-30p">
			<div class="full-block text-center mb-30p" ><img src="<?= base_url()?>home_assets/images/innovate-tagline.png" alt=""  style="width:55%;"></div>
			<div class="full-block text-center"><img src="<?= base_url()?>home_assets/images/letsunfold-tagline.png" alt="" style="width:25%;"></div>
		</div>
		<div class="col-lg-4 col-md-5 col-sm-6 col-12">
			<div class="loginbox">
				<div class="alert mb-20p"></div>
				<form id="teacher-login-form" action="" method="post">
				<div class="full-block text-center"><img src="<?= base_url()?>home_assets/images/logo-text.png" alt="" class="d-inblock"></div>
        <div class="row mobileapp-badges">
                  <div class="col-md-6 col-sm-6 col-12 mb-20p"><input type="checkbox" id="teacher" value="1" checked="checked"> Teacher  </div>
                  <div class="col-md-6 col-sm-6 col-12 mb-20p" > <input onchange="window.location.href='<?=base_url()?>institute'"type="checkbox" id="institute" value="1"> Institute</div>
        </div>
				
				<div class="full-block"><input type="text" id="username" placeholder="Phone Number"></div>
				<div class="full-block"><input type="password" class="form-control" id="password"  placeholder="Password"></div>
				<div class="full-block"><input type="submit" value="Login"></div>
				<div class="full-block"><a href="javascript:void(0)" class="forgot-password-teacher">Forgot password ?</a></div>
				</form>
			</div><!-- /.login box -->
			<div class="full-block text-center mb-30p" style="margin-top: 6%;">
				<div class="row mb-30p mobileapp-badges">
					<div class="col-12"><p class="text-center mb-20p">Get the app</p></div>
					<div class="col-md-6 col-sm-6 col-12 "><a href="https://apps.apple.com/in/app/folldy/id1549625297"><img src="<?= base_url()?>home_assets/images/badge-appstore.png" alt=""></a></div>
					<div class="col-md-6 col-sm-6 col-12 "><a href="https://play.google.com/store/apps/details?id=com.mesoki_edu_app"><img src="<?= base_url()?>home_assets/images/badge-googleplay.png" alt=""></a></div>
				</div>
				
				
			</div>
		</div>
	</div>
</div>
</div>
    
    <script src="<?=base_url()?>assets/js/functions.js?v=<?=time()?>"></script>
  </body>
</html>