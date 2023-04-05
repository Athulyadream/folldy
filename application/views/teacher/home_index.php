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

                    $roles=$users=$tables=$courses=$institutes=$teachers=$batch=$students=$news=$events=$video=$course=$university=$assignment=0;
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
                      if($assignment == 'assignment') $assignment = 1;

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
        <div class="full-block"><h1><?= $details['institute_name'] ?></h1></div>
        <div class="full-block">
          <div class="row mb-20p">
            <div class="col-md-3 col-sm-6 col-6">
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
            </div>
          </div>
        </div><!-- /. thumb block -->

        <div class="subjects section">
          <div class="row">
            <div class="col-12"><h4>Subjects</h4></div>
            <div class="col-12">
              <div class="subjects-slider">
                <div class="owl-carousel">
                  <?php 
                    if(!empty($publish_subject)){
                      foreach($publish_subject as $key1 => $row) {
                        ?>
                        <div class="item">

                    
                          <a href="<?= base_url('dashboard-chapter1').'?id='.$row['data_id'] ?>">
                          <div class="subject-block">
                            <div class="title-block"><h5><?= $row['course'] ?> <?= $row['batch_name'] ?></h5></div>
                            <div class="pic-block">
                              <?php if(!empty($row['paper_icon'])) { ?>
                                <img src="<?= base_url('uploads/paper_icon/'.$row['paper_icon']) ?>" alt="Avatar" class="avatar"> 
                              <?php }else{ ?>
                                <img src="<?= base_url('uploads/paper_icon/default_icon.png') ?>" alt="Avatar" class="avatar">
                              <?php } ?>
                            </div>
                            <h6><?= $row['subject'] ?></h6>
                            <div class="subblock-left"><p><?= $row['chapter_count'] ?> <br><span>Chapters</span></p></div>
                            <div class="subblock-right"><p><?= $row['publish_count'] ?> <br><span>Published</span></p></div>
                            
                          </div>
                        </a>
                        </div>
                        <?php
                      }
                    }else{
                    
                    
                      echo "No data found!";
                    
                  }
                  ?>
                </div>
              </div><!-- /.recently covered slider -->
            </div>
          </div>
        </div><!-- /.subjects  --->

        <div class="recently-covered">
          <div class="row">
            <div class="col-12"><h4>Recently Covered</h4></div>
            <div class="col-12">
              <div class="recently-covered-slider">
                <div class="owl-carousel">
                  <?php 
                  if(!empty($presentation)){
                    foreach($presentation as $row){
                      ?>
                      <div class="item">
                        <a href="<?= base_url()?>presentation-slide-view/<?= $row['topic_id'] ?>" target="_blank" >
                        <div class="recent-covered-thumb">
                          <img src="<?php echo base_url().'uploads/slide/'.$row['content_slide']?>" alt="">
                          <div class="desc">
                            <h5><?=  $row['topic_title'] ?></h5>
                            <h6>Date: <?= date('d-m-Y',$row['created_on']) ?></h6>
                            <p><?= $row['data_name'] ?></p>
                          </div>
                        </div>
                        </a>
                      </div>

                      <?php 
                    }
                  }
                  else{
                    echo "No Data Found";
                  }
                  ?>
                  <!-- /.item -->
                  <!-- /.item -->
                  <!-- /.item -->
                  <!-- /.item -->
                </div>
              </div><!-- /.recently covered slider -->
            </div>
          </div>
        </div><!-- /.recently covered -->

        <div class="recent-chapters">
          <div class="row">
            <div class="col-12"><h4>Recent Chapters</h4></div>
          </div>
          <div class="row">
            <?php 
              if(!empty($chapter)){
                foreach($chapter as $row){ ?>
                  <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-20p">
                    <a href="<?php echo base_url('chapter-view-teacher/'.$row['data_id']); ?>" target="_blank">
                    <div class="recent-chapters-block">
                      
                        <?php if(!empty($row['chapter_thumbnail'])){?>
                      <img src="<?= base_url('uploads/chapter_thumbnail/'.$row['chapter_thumbnail']) ?>" style=" height: 10rem;">
                      
                    <?php }?>
                        <span><?= $row['data_name'] ?></span>
                      
                    </div>
                    </a>
                  </div>
                
                <?php }
              }
              else{ ?>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-20p">
                  No Data Found!
                </div>
               <?php }
              ?>
                  
            <!-- <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-20p">
              <div class="recent-chapters-block">
                <a href="#"><img src="<?= base_url()?>home_assets/images/chapter1.jpg" alt=""><span>Test</span></a>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-20p">
              <div class="recent-chapters-block">
                <a href="#"><img src="<?= base_url()?>home_assets/images/chapter2.jpg" alt=""><span>Test</span></a>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-20p">
              <div class="recent-chapters-block">
                <a href="#"><img src="<?= base_url()?>home_assets/images/chapter3.jpg" alt=""><span>Test</span></a>
              </div>
            </div> -->
          </div>
          
        </div><!-- /.recent chapters -->
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
                          <h5><?=$row['news_heading'] ?> </h5>
                          <?php if($row['news_date']!='') {?>
                          <span><?= date('d-m-Y',strtotime($row['news_date'])) ?></span>
                          <?php }?>
                          <p><?php if($row['news_description']!='') {?>
                              <?= $row['news_description'] ?>
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
      </div>
    </div>
    
  </div>
</div>



<?php //include('footer.php')?>