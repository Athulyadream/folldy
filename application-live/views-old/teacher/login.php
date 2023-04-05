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
    <link rel="icon" href="<?=base_url()?>favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
  </head>
  <body class="">
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                <!-- <img src="<?=base_url()?>assets/images/logo.png" class="h-8" alt="logo"> -->
                <h1>TEACHER LOGIN</h1>
              </div>
              <div class="alert"></div>
              <form id="teacher-login-form" class="card" action="<?=base_url()?>iteacher-login" method="post">
                <div class="card-body p-6">
                  <!-- <div class="card-title">Login to your account</div> -->
                  <div class="form-group">
                    <label class="form-label">Phonenumber</label>
                    <input type="text" class="form-control" id="username"  placeholder="Enter phonenumber">
                  </div>
                  <div class="form-group">
                    <label class="form-label">
                      Password
                      <a href="javascript:void(0)" class="float-right small forgot-password-teacher" style="color: #FECE00" >I forgot password</a>
                    </label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                  </div>
                  <div class="form-footer">
                    <button type="submit" class="btn btn-block" style="background-color: #FECE00">Sign in</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="<?=base_url()?>assets/js/functions.js?v=<?=time()?>"></script>
  </body>
</html>