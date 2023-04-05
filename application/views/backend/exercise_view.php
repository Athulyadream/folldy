<!doctype html>
<html lang="en" prefix="og: http://ogp.me/ns#">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CLEAN MARKUP = GOOD KARMA.
      Hi source code lover,

      you're a curious person and a fast learner ;)
      Let's make something beautiful together. Contribute on Github:
      https://github.com/webslides/webslides

      Thanks,
      @jlantunez.
    -->

    <!-- SEO -->
    <title>Exercise</title>
    <meta name="description" content="WebSlides is the easiest way to make HTML presentations, portfolios, and landings. Just essential features.">

    <!-- URL CANONICAL -->
    <!-- <link rel="canonical" href="http://your-url.com/"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,700,700i%7CMaitree:200,300,400,600,700&amp;subset=latin-ext" rel="stylesheet">

    <!-- CSS WebSlides -->
    <link rel="stylesheet" type='text/css' media='all' href="<?=base_url()?>assets/css/webslides.css">

    <!-- Optional - CSS SVG Icons (Font Awesome) -->
    <link rel="stylesheet" type='text/css' media='all' href="<?=base_url()?>assets/css/svg-icons.css">

    <!-- SOCIAL CARDS (ADD YOUR INFO) -->

    <!-- FACEBOOK -->
    <meta property="og:url" content="http://your-url.com/"> <!-- YOUR URL -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="WebSlides — Making HTML Presentations Easy"> <!-- EDIT -->
    <meta property="og:description" content="WebSlides is about telling stories beautifully. Just the essential features. Good karma."> <!-- EDIT -->
    <meta property="og:updated_time" content="2017-01-04T17:20:50"> <!-- EDIT -->
    <meta property="og:image" content="static/images/share-webslides.jpg"> <!-- EDIT -->

    <!-- TWITTER -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@webslides"> <!-- EDIT -->
    <meta name="twitter:creator" content="@jlantunez"> <!-- EDIT -->
    <meta name="twitter:title" content="WebSlides — Making HTML Presentations Easy"> <!-- EDIT -->
    <meta name="twitter:description" content="WebSlides is about good karma. Just essential features. 120+ free slides ready to use."> <!-- EDIT -->
    <meta name="twitter:image" content="static/images/share-webslides.jpg"> <!-- EDIT -->

    <!-- FAVICONS -->
    <link rel="shortcut icon" sizes="16x16" href="<?=base_url()?>assets/images/favicons/favicon.png">
    <link rel="shortcut icon" sizes="32x32" href="<?=base_url()?>assets/images/favicons/favicon-32.png">
    <link rel="apple-touch-icon icon" sizes="76x76" href="<?=base_url()?>assets/images/favicons/favicon-76.png">
    <link rel="apple-touch-icon icon" sizes="120x120" href="<?=base_url()?>assets/images/favicons/favicon-120.png">
    <link rel="apple-touch-icon icon" sizes="152x152" href="<?=base_url()?>assets/images/favicons/favicon-152.png">
    <link rel="apple-touch-icon icon" sizes="180x180" href="<?=base_url()?>assets/images/favicons/favicon-180.png">
    <link rel="apple-touch-icon icon" sizes="192x192" href="<?=base_url()?>assets/images/favicons/favicon-192.png">

    <!-- Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#333333">

  </head>
  <style type="text/css">
    tr:nth-child(even) > td {
        background: #f7f9fb !important;
    }
  </style>
  <body>
    <header role="banner">
      <nav role="navigation">
       
        
      </nav>
    </header>

    <main role="main">
      <article id="webslides" class="vertical">
        <?php  if(!empty($exercise_topic['exercise'])){
        foreach($exercise_topic['exercise'] as $row){ ?>
        <section>

         <span class="background" style="background-image:url(<?= base_url() ?>'assets/images/gold-background_74945-7.jpg')"></span>
          <!--.wrap = container (width: 90%) -->
          <div class="wrap aligncenter">
            <h3><strong><?php echo $exercise_topic['ex_topic_title']; ?></strong></h3>
            <p class="text-intro">
              <?php echo $row['exercise_question']; ?>
            </p>
            <table border="0">
              <tr>
                <td style="border: none;"><?php echo $row['exercise_answer1']; ?></td>
                <td style="border: none;"><?php echo $row['exercise_answer2']; ?></td>
              </tr>
              <tr>
                <td style="border: none;"><?php echo $row['exercise_answer3']; ?></td>
                <td style="border: none;"><?php echo $row['exercise_answer4']; ?></td>
              </tr>
            </table>
            <p class="text-intro">
              Correct Answer : <?php $no = $row['exercise_correct_answer']; echo $row['exercise_answer'.$no]; ?>
            </p>
          </div>
          <!-- .end .wrap -->
        </section>
        <?php } 
      }
      else{ ?>
        <section>

         <span class="background" style="background-image:url(<?= base_url() ?>'assets/images/gold-background_74945-7.jpg')"></span>
          <!--.wrap = container (width: 90%) -->
          <div class="wrap aligncenter">
            <h3><strong><?php echo $exercise_topic['ex_topic_title']; ?></strong></h3>
            <p class="text-intro">
              No Question Found
            </p>
            
            
          </div>
          <!-- .end .wrap -->
        </section>

      <?php } ?>
        
        
        
        

      </article>
      <!-- end article -->
    </main>
    <!-- end main -->

   <!-- A global footer

     <footer role="contentinfo">
      <div class="wrap">
        <p>An <a href="https://github.com/webslides/webslides">open source solution</a>, by <a href="https://twitter.com/webslides">@webslides</a>.</p>
      </div>
    </footer>  -->

    <!-- Required -->
    <script src="<?=base_url()?>assets/js/webslides.js"></script>
    <script>
      window.ws = new WebSlides();
    </script>

    <!-- OPTIONAL - svg-icons.js (fontastic.me - Font Awesome as svg icons) -->
    <script defer src="<?=base_url()?>assets/js/svg-icons.js"></script>

  </body>
</html>
