
<?php //include('header.php'); ?>


<div class="page-content section">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 col-md-4 col-sm-4 col-12">
        <div class="left-block-menu-mobile">
          Open Menu
        </div>
        <?php
                    $privileges = $this->session->userdata('priv');

                    $roles=$users=$tables=$courses=$institutes=$teachers=$batch=$students=$news=$events=$video=$course=$university=0;
                    foreach($privileges as $priv){
                      if($priv == 'roles') $roles = 1;
                      if($priv == 'users') $users = 1;
                      if($priv == 'tables') $tables = 1;
                      if($priv == 'courses') $courses = 1;
                      if($priv == 'institute') $institutes = 1;
                      if($priv == 'teachers') $teachers = 1;
                      if($priv == 'batch') $batch = 1;
                      if($priv == 'students') $students = 1;
                      if($priv == 'news') $news = 1;
                      if($priv == 'events') $events = 1;
                      if($priv == 'video') $video = 1;
                      if($priv == 'course') $course = 1;
                      if($priv == 'university') $university = 1;
                      $privileges = array_diff($privileges,array($priv));
                    }?>
        <div class="left-block-menu">
          <ul>
            <li><a href="<?=base_url('teacher-dashboard')?>">Academics</a></li>
            <?php if($roles){ ?>
                        <li class="nav-item">
                            <a href="<?=base_url('roles')?>" class="nav-link"> Roles</a>
                        </li>
                      <?php } if($users){ ?>
                        <li class="nav-item">
                            <a href="<?=base_url('admins')?>" class="nav-link"> Users</a>
                        </li>
                      <?php } if($tables){ ?>
                        <li class="nav-item">
                            <a href="<?=base_url('tables')?>" class="nav-link"> Tables</a>
                        </li>
                      <?php }  if($institutes){  ?>
                          <li class="nav-item">
                            <a href="<?=base_url('institutes')?>" class="nav-link">Institutes</a>
                        </li>
                      <?php } if($teachers){ ?>
                          <li class="nav-item">
                            <a href="<?=base_url('teachers')?>" class="nav-link"> Teachers</a>
                          </li>
                      <?php } if($batch){ ?>
                          <li class="nav-item">
                            <a href="<?=base_url('teacher-batch')?>" class="nav-link"> Batch</a>
                          </li>
                      <?php } if($students){ ?>
                          <li class="nav-item">
                            <a href="<?=base_url('teacher-students')?>" class="nav-link"> Students</a>
                          </li>
                      <?php } if($news){ ?>
                          <li class="nav-item">
                            <a href="<?=base_url('news')?>" class="nav-link">News</a>
                          </li>
                      <?php } if($events){ ?>
                          <li class="nav-item">
                            <a href="<?=base_url('events')?>" class="nav-link"> Events</a>
                          </li>
                      <?php } ?>
                      <li>
                        <a class="dropdown-item" href="<?=base_url('teacher-logout')?>">Sign out</a>
                      </li>
                      <!-- <li>
                        <a class=" reset-password-btn" href="#" data-toggle="modal" data-target="#myModal"> Reset Password
                        </a>
                      </li> -->
            <!-- <li><a href="">Academics</a></li>
            <li><a href="">News</a></li>
            <li><a href="">Events</a></li>
            <li><a href="">Batch</a></li>
            <li><a href="">Students</a></li>
            <li><a href="">Results</a></li>
            <li><a href="">Time Table</a></li>
            <li><a href="">Question Paper</a></li>
            <li><a href="">Plan</a></li>
            <li><a href="">Reports</a></li>
            <li><a href="">Profile</a></li> -->
          </ul>
        </div>
      </div>
      <div class="col-lg-10 col-md-8 col-sm-8 col-12 mt-20p mb-20p">
      <!--   <div class="full-block"><h1 style="margin-bottom: 0px;"><?=$details['name_abbreviation'] ?></h1>
        <h4 style="font-size: 1rem;"><?= $details['institute_name']?></h4></div> -->
        <div class="full-block">
          <div class="row mb-20p">



            <table class="table table-striped table-bordered">
                <?php 

                if(!empty($time_table)){
                  
                foreach($time_table as $row){ 
                    //print_r($row['timetable']);
  //print_r($row['days']);
                  ?>

   <?php if(!empty($row['timetable'])){ ?>
                     
                        <tr>
                          <th >#</th>
                          <?php 
                          for($i=1;$i<=$row['batch_periods'];$i++){
                          ?>
                            <th><?= $i ?></th>
                          <?php } ?>
                        </tr>
                        <?php
                          // foreach($row['days'] as $data){ 

                            ?>
<?php
                         ?>
                            <tr>
                            <th><?= $row['batch_name'] ?></th><!-- date('l') -->
                            <?php
                             foreach($row['days'] as $data){
                              // print_r($time['weekdays']);
                            for($i=1;$i<=$row['batch_periods'];$i++){
                              foreach($row['timetable'] as $time){

                                if($data['week_days'] == date('l')){

                                if($time['weekdays'] == $data['weekdays'] && $time['period'] == $i ){ ?>
                                  <td><?= $time['subject']  ?></td>
                              <?php  }
                            }else{
                              // echo"fff";
                            
                              }
                            }
                            }}?>
                          </tr>
                          <?php
                        
                        ?>
                          
                      <?php }
                      else{ ?>

                        <tr>
                          <th><?=$row['batch_name'] ?></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <!-- <h4><small>Not Update Timetable for <?=$row['batch_name'] ?></small></h4> -->
                        <?php
                      }?>

                <?php } } ?>


           <!--    <div class="subjects-slider">
                <div class="owl-carousel">
                  <?php 
                 if(!empty($dashboard_news)){
                foreach($dashboard_news as $row){ ?>
                        
                        <div class="item">

                    
                          <div class="subject-block">
                            <div class="title-block"><h5><?=$row['news_heading'] ?> </h5></div>
                            <div class="pic-block">
                              <?php if(!empty($row['news_image'])) { ?>
                                <img src="<?php echo base_url(); ?>uploads/news/<?php echo $row['news_image'] ?>" alt="Avatar" class="avatar"> 
                              <?php }else{ ?>
                                <img src="<?= base_url('uploads/paper_icon/default_icon.png') ?>" alt="Avatar" class="avatar">
                              <?php } ?>
                            </div>
                            <h6><?= date('d-m-Y',strtotime($row['news_date'])) ?></h6>
                            <div><?=$row['news_description'] ?></div>
                     
                          </div>
                        </div>
                        <?php
                      }
                    }else{
                    
                    
                      echo "No data found!";
                    
                  }
                  ?>
                </div>
              </div> --><!-- /.recently covered slider -->


                      </table>
            <!-- <div class="col-md-3 col-sm-6 col-6">
              <div class="home-thumb-block"><a href=""><img src="<?= base_url()?>home_assets/images/home-presentation-pic.jpg" alt=""><span>Presentation</span></a></div>
            </div>
            <div class="col-md-3 col-sm-6 col-6">
              <div class="home-thumb-block"><a href=""><img src="<?= base_url()?>home_assets/images/home-practice-pic.jpg" alt=""><span>Practice</span></a></div>
            </div>
            <div class="col-md-3 col-sm-6 col-6">
              <div class="home-thumb-block"><a href=""><img src="<?= base_url()?>home_assets/images/home-infographics-pic.jpg" alt=""><span>Infographics</span></a></div>
            </div>
            <div class="col-md-3 col-sm-6 col-6">
              <div class="home-thumb-block"><a href=""><img src="<?= base_url()?>home_assets/images/home-test-pic.jpg" alt=""><span>Test</span></a></div>
            </div> -->
          </div>
        </div><!-- /. thumb block -->

        <div class="subjects section">
          <div class="row">
            <div class="col-12"><h4>Works</h4></div>
            <div class="col-12">
              <div class="row">
   <?php
            // print_r($batch);
            foreach ($batchs as $key => $value) {?>
              <div class="col-4" > <?= $value['batch_name'] ?> <br/> 
                <?= $value['count'] ?></div>
               
             <?php  } ?>


</div>
            </div>
          </div>
        </div><!-- /.subjects  --->

       
  
        <?php //print_r($ins_news);
                if(!empty($ins_news)){ ?>
        <div class="news-strip">
          <div class="row">
            <div class="col-12"><h4>News</h4></div>
          </div>
          <div class="row">
            <?php 
                if(!empty($ins_news)){
                foreach($ins_news as $row){ ?>
                  <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="news-thumb">
                      <div class="row align-items-center">
                        <div class="col-md-4 col-sm-2 col-3">
                          <?php if($row['news_image'] != ''){
                          ?>
                          <img src="<?php echo base_url(); ?>uploads/news/<?php echo $row['news_image'] ?>" style="height:50px;width:100px" alt="No Image">
                          <?php } ?>
                        </div>
                        <div class="col-md-8 col-sm-10 col-9" style="border-left:1px solid #ccc;">
                          <h5><!-- <?= substr($row['news_heading'],0,70) ?> --><?=$row['news_heading'] ?> </h5>
                          <?php if($row['news_date']!='') {?>
                          <span><?= date('d-m-Y',strtotime($row['news_date'])) ?></span>
                          <?php }?>
                          <p><?php if($row['news_description']!='') {?>
                           
                              <?=$row['news_description'] ?> 
                          <?php }?></p>
                        </div>
                      </div>
                    </div><!-- /. news thumb -->
                  </div>
                 
                <?php } 
                }
                else{?>
                  
                  <p>No data found!</p>
                <?php }?>
            
            
          
          </div>
        </div><!-- /.news strip -->
        <?php }
         ?>


 <div class="news-strip">
          <div class="row">
            <div class="col-12"><h4>Events</h4></div>
          </div>
          <div class="row">


                <?php 
                if(!empty($event)){
                foreach($event as $row){ ?>
                 <div class=""  >
                    <div class="col-md-4 col-lg-12" >
                      <h4><?=$row['event_title'] ?> </h4>
                    </div>
                    
                    <?php if($row['event_image'] != ''){
                      ?>
                    <div class="col-md-12 col-lg-12" >
                      <img src="<?php echo base_url(); ?>uploads/events/<?php echo $row['event_image'] ?>" style="height:50px;width:100px">
                    </div>
                  <?php } ?>
                  <div class="col-md-12 col-lg-12">
                      <?php if($row['event_date']!='') {?>
                      <span><?= date('d-m-Y',strtotime($row['event_date'])) ?></span>
                    <?php }?>
                    </div>
                    
                </div>
                <hr>
                <?php } 
                }
                else{?>
                  
                  <h4 style="text-align: center;">No data found!</h4>
                <?php }?>
              </div>
            </div>





      </div>
    </div>
    
  </div>
</div>



<?php //include('footer.php')?>



























  <!-- barchart open-->
       <!--    <div id="container"></div>

        <div class="subjects section">
          <div class="row">
            <div class="col-12"><h4>Works</h4></div>
              <?php foreach ($batch as $key => $value) {?>
              <div class="col-4" > <?= $value['batch_name'] ?> <br/> 
                <?= $value['count'] ?></div>
               
             <?php  } ?>

           
          </div>
        </div> -->


  <!--       <div class="subjects section">
          <div class="row">
            <div class="col-12"><h4>News</h4></div>
            <div class="col-12">
              <div class="subjects-slider">
                <div class="owl-carousel">
                  <?php 
                 if(!empty($dashboard_news)){
                foreach($dashboard_news as $row){ ?>
                        
                        <div class="item">

                    
                          <div class="subject-block">
                            <div class="title-block"><h5><?=$row['news_heading'] ?> </h5></div>
                            <div class="pic-block">
                              <?php if(!empty($row['news_image'])) { ?>
                                <img src="<?php echo base_url(); ?>uploads/news/<?php echo $row['news_image'] ?>" alt="Avatar" class="avatar"> 
                              <?php }else{ ?>
                                <img src="<?= base_url('uploads/paper_icon/default_icon.png') ?>" alt="Avatar" class="avatar">
                              <?php } ?>
                            </div>
                            <h6><?= date('d-m-Y',strtotime($row['news_date'])) ?></h6>
                            <div><?=$row['news_description'] ?></div>
                     
                          </div>
                        </div>
                        <?php
                      }
                    }else{
                    
                    
                      echo "No data found!";
                    
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>

 -->


<!--         <div class="subjects section">
          <div class="row">
            <div class="col-12"><h4>Events</h4></div>
            <div class="col-12">
              <div class="subjects-slider">
                <div class="owl-carousel">
                  <?php 
                 if(!empty($event)){
                foreach($event as $row){ ?>
                        
                        <div class="item">

                    
                      
                          <div class="subject-block">
                            <div class="title-block"><h5><?=$row['event_title'] ?> </h5></div>
                            <div class="pic-block">
                              <?php if(!empty($row['event_image'])) { ?>
                                <img src="<?php echo base_url(); ?>uploads/events/<?php echo $row['event_image'] ?>" alt="Avatar" class="avatar"> 
                              <?php }else{ ?>
                                <img src="<?= base_url('uploads/paper_icon/default_icon.png') ?>" alt="Avatar" class="avatar">
                              <?php } ?>
                            </div>
                            <h6><?= date('d-m-Y',strtotime($row['event_date'])) ?></h6>
                            
                          </div>
                        </div>
                        <?php
                      }
                    }else{
                    
                    
                      echo "No data found!";
                    
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
 -->
