<?php //include('header.php'); ?>


<div class="page-content section">
  <div class="container-fluid">
    <div class="row">
      
        
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
                    }
                    ?>
   
     
      <div class="col-lg-12 col-md-8 col-sm-8 col-12 mt-20p mb-20p">
        
        <div class="subjects section">
          <div class="row" style="    margin-right: 15px;
    margin-left: 15px;">
            <div class="col-12"><h4><?php if(!empty($subject)){
                foreach($subject as $sub){ echo $sub['data_name']; break; 
                  }} 

                  if(!empty($batchname)){
                    foreach($batchname as $bat){ echo " - "; echo $bat['batch_name']; break; 
                      }} 
                 
                 ?> </h4></div>
            <div class="col-12">
              
            <div class="row">
            
            
                <?php 
              if(!empty($chapter)){
                foreach($chapter as $row){ ?>
                         <div class="col-md-4 col-sm-6 col-6" style="overflow:hidden;">
                         <figcaption><h5><?= $row['data_name'] ?></h5></figcaption>
                        
                          <a href="<?= base_url('chapter-view-teacher').'/'.$row['data_id'] ?>">
                          
                          
                            <?php if(!empty($row['chapter_thumbnail'])){   ?>
                               
                              <img src="<?= base_url("uploads/chapter_thumbnail/".$row['chapter_thumbnail']) ?>" alt="Avatar" class="avatar" >
                              <?php }else{ ?>
                                <img src="<?= base_url('uploads/paper_icon/default_icon.png') ?>" alt="Avatar" class="avatar" >
                              <?php } ?>
                            
                         
                          
                        </a>
                        <a href="<?= base_url('chapter-design-teacher').'?id='.$row['data_id'] ?>">
                        <div style="float:right"> contents </div>
                        </a>
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
        </div><!-- /.subjects  --->

       
      </div>
    </div>
    
  </div>
</div>



<?php //include('footer.php')?>