<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="-1" />

    <meta name="keywords" content="" />
    <meta name="description" content=""/>
    <meta name="robots" content="index, follow" />
    <link rel="shortcut icon" type="png" href="<?= base_url()?>home_assets/images/favicon.png" id="favicon" data-original-href="<?= base_url()?>home_assets/images/favicon.png" />
    <title><?= $institute['institute_name'] ?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css"> 
    
    <link rel="stylesheet" href="<?= base_url()?>home_assets/css/layout.css?2">
</head>
<body>

<div class="header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-9 col-sm-6 col-5">
                <a href="#" class="logo"><img src="<?= base_url()?>home_assets/images/logo.png" alt=""></a>

            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-5 order-lg-3 order-md-2 order-sm-2 order-2">
                <div class="usermenu-top">
                    <div class="userpic-top" ><i class="fas fa-user"></i></div>
                    <div class="username-top"><span><?=$this->session->userdata('ins_user_name')?></span></div>
                </div>


            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 col-12 order-lg-2 order-md-3 order-sm-3 order-2">
                <div class="menu-button"><i class="fa fa-bars"></i></div>
                <div class="menu-area">
                    <span class="menu-close"><i class="fas fa-times"></i></span>
                    <div class="top-menu">
                        <ul>
                            <li><a href="<?=base_url('institute-dashboard')?>">Home</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="<?=base_url('institute-logout')?>">Sign Out</a></li>
                        </ul>
                    </div>
                </div><!-- /.menu area -->
                

            </div>
            </div>
    </div>
</div>