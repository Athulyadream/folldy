<!doctype html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="robots" content="index, follow" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta name="keywords" content="screen, recording" />
<meta name="description" content="Screen recording project" />
<meta name="subject" content="" >
<link rel="icon" href="<?=base_url()?>favicon.ico" type="image/x-icon"/>
<title>Mesoki</title>

<!-- Twitter card -->
<meta name="twitter:card" content="Screen Recording">
<meta name="twitter:site" content="https://twitter.com/screen_recording">
<meta name="twitter:title" content="">
<meta name="twitter:description" content="">
<meta name="twitter:image" content="">
<!-- OpenGraph information -->
<meta property="og:title" content="" />
<meta property="og:description" content="" />
<meta property="og:url" content="screen_recording.com" />
<meta property="og:image" content="">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<link rel="stylesheet" href="<?=base_url('assets_main')?>/assets/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<link rel="stylesheet" href="<?=base_url('assets_main')?>/assets/css/style.css">
<link rel="stylesheet" href="<?=base_url('assets_main')?>/assets/css/mins.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

<link rel="stylesheet" href="<?=base_url('assets_main')?>/assets/lightbox/simpleLightbox.min.css">

<?php
    if($this->session->userdata('theme') == 0){
        echo '<link rel="stylesheet" href="'.base_url('assets_main').'/assets/css/theme-green.css">';
    }
    if($this->session->userdata('theme') == 1){
        echo '<link rel="stylesheet" href="'.base_url('assets_main').'/assets/css/theme-blue.css">';
    }
    elseif($this->session->userdata('theme') == 2){
        echo '<link rel="stylesheet" href="'.base_url('assets_main').'/assets/css/theme-pink.css">';
    }
    elseif($this->session->userdata('theme') == 3){
        echo '<link rel="stylesheet" href="'.base_url('assets_main').'/assets/css/theme-gray.css">';
    }
?>




</head>
<body >
<header>
<!-- website header -->
