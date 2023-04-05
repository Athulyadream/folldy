<?php //include('header.php'); ?>

<div class="page-content section">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-8 col-sm-10 col-12">
				<div class="full-block mt-30p mb-30p">
					<div class="row"><div class="col-12"><h1 style="margin-bottom: 0px;"><?=$institute['name_abbreviation'] ?></h1>
        <h4 style="font-size: 1rem;"><?= $institute['institute_name']?></h4></div></div>
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
                    } ?>
					<div class="row">
						<!-- <div class="col-lg-3 col-md-4 col-sm-3 col-6">
							<a class="subject-block" href="#">
								<div class="pic-block"><img src="assets/images/menu-icon1.png" alt=""></div>
								<h6>Courses</h6>
							</a>
						</div> -->
						<?php if($batch){ ?>
						<div class="col-lg-3 col-md-4 col-sm-3 col-6">
							<a class="subject-block" href="<?=base_url('batch')?>">
								<div class="pic-block"><img src="<?= base_url()?>home_assets/images/menu-icon2.png" alt=""></div>
								<h6>Batches</h6>
							</a>
						</div>
						<?php } 
						if($teachers){?>
						<div class="col-lg-3 col-md-4 col-sm-3 col-6">
							<a class="subject-block" href="<?=base_url('teachers')?>">
								<div class="pic-block"><img src="<?= base_url()?>home_assets/images/menu-icon3.png" alt=""></div>
								<h6>Teachers</h6>
							</a>
						</div>
						<?php }
						if($students){ 
						?>
						<div class="col-lg-3 col-md-4 col-sm-3 col-6">
							<a class="subject-block" href="<?=base_url('students')?>">
								<div class="pic-block"><img src="<?= base_url()?>home_assets/images/menu-icon4.png" alt=""></div>
								<h6>Students</h6>
							</a>
						</div>
						<?php }
						if($news){ 
						?>
						<div class="col-lg-3 col-md-4 col-sm-3 col-6">
							<a class="subject-block" href="<?=base_url('news')?>">
								<div class="pic-block"><img src="<?= base_url()?>home_assets/images/menu-icon5.png" alt=""></div>
								<h6>News</h6>
							</a>
						</div>
						<?php }
						if($events){ 
						?>
						<div class="col-lg-3 col-md-4 col-sm-3 col-6">
							<a class="subject-block" href="<?=base_url('events')?>">
								<div class="pic-block"><img src="<?= base_url()?>home_assets/images/menu-icon6.png" alt=""></div>
								<h6>Events</h6>
							</a>
						</div>
						<?php }
						
						?>
						
					</div>
				</div>
			</div>
			
		</div>
		
	</div>
</div>

<?php //include('footer.php'); ?>
