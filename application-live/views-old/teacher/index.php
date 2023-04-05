<style>
 .content {
  position: absolute;
  bottom: 0;
  background: rgb(0, 0, 0); /* Fallback color */
  background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
  color: #f1f1f1;
  width: 90%;
  padding: 10px;
}
.avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}
.sub{
  max-width: 30%;
}

.video{
  
  margin: 4px;
  

}
.chapter{
  margin-bottom: 10px;
}

div.scrollmenu {
  /*background-color: #333;*/
  padding: 10px;
  overflow: auto;
  white-space: nowrap;
}
.student{
  padding: 10px;
}

.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}
.scroll { 
        margin:4px, 4px; 
        padding:4px;  
        width: 370px; 
        height: 450px; 
        overflow-x: hidden; 
        overflow-y: auto; 
        text-align:justify; 
    } 

/* Change background color of buttons on hover */
/*.tab button:hover {
  background-color: #ddd;
}*/
</style>
<div class="container">
  <div class="page-header">
    <h1 class="page-title">
      WELCOME
    </h1>
  </div>
  <div class="row p-2">
    <!-- <div class="col-md-12 col-lg-12"> -->
      <div class="col-md-8 col-lg-8">
        <div class="card">
          <div id="chart-development-activity" style="height: 20rem;">
            <img src="<?= base_url('assets/images/institute.jpg') ?>" style="width:100%; height: 20rem;">
            <div class="content">
              <h1><?= $details['institute_name'] ?></h1>
              
            </div>
          </div>
        </div>
        <div class="row">
        <?php 
        if(!empty($subject)){
        foreach($subject as $row) {?>  
          <div class="col-sm-4 col-lg-4 d-inline-block">
            <div class="card p-2">
              <div   style=" padding-top: 10px;padding-bottom : 10px;">
                <a href="<?= base_url('dashboard-chapter').'?id='.$row['data_id'] ?>">
                  <div class="row ">
                  <div class="col-sm-4 col-lg-4">
                    <?php if(!empty($row['paper_icon'])) { ?>
                      <img src="<?= base_url('uploads/paper_icon/'.$row['paper_icon']) ?>" alt="Avatar" class="avatar"> 
                    <?php }else{ ?>
                      <img src="<?= base_url('uploads/paper_icon/default_icon.png') ?>" alt="Avatar" class="avatar">
                    <?php } ?>
                  </div>
                  <div class="col-sm-8 col-lg-8" >
                    <span><b><?= $row['data_name'] ?></b></span>
                  </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        <?php } }?>
        </div>
        <?php 
              if(!empty($chapter)){ ?>
        <div class="card">
          <div id="chart-development-activity" >
            <h4 style="margin: 10px;">Recent</h4>
            <div class="row p-3 ">
              <?php 
              if(!empty($chapter)){
                foreach($chapter as $row){ ?>
                  <div class="col-sm-4 col-lg-4  chapter">
                    <?php if(!empty($row['chapter_thumbnail'])){?>
                       <a href="<?php echo base_url('chapter-view-teacher/'.$row['data_id']); ?>" target="_blank">
                      <img src="<?= base_url('uploads/chapter_thumbnail/'.$row['chapter_thumbnail']) ?>" style=" height: 10rem;">
                      <div class="content">
                        <h4><?= $row['data_name'] ?></h4>
                      </div>
                    </a>
                    <?php }else{?>
                       <a href="<?php echo base_url('chapter-view-teacher/'.$row['data_id']); ?>" target="_blank">
                      <div  style="text-align: center; padding-top: 50px;border : 1px solid grey;height: 10rem;">
                        <h4 ><?= $row['data_name'] ?></h4>
                      </div></a>
                    <?php } ?>
                  </div>
                <?php } 
                }
                else{?>
                  <h4 style="text-align: center;">No data found!</h4>
                <?php 
              }?>

            </div>
          </div>
        </div>
      <?php } ?>


        <?php if(!empty($video)){ ?>
        <div class="card">
          <div id="chart-development-activity" style="height: 15rem;" >
              <h4 style="margin: 10px;">Videos</h4>

              <div class="scrollmenu" >
                <?php 
                // if(!empty($video)){
                foreach($video as $row){ ?>
                
                 <div class="d-inline-block video" style="padding-bottom: 10px">
                    <a href="<?php echo base_url('uploads/video/' .$row['video_link'] ) ?>" target="_blank" >
                    <img src="<?= base_url('uploads/thumbnail/'.$row['thumb_nail']) ?>" width = "160px" height="90px">
                    <figcaption><?= $row['video_title'] ?></figcaption>
                    
                  </a>
                    
                  
                </div>
                
                <?php } 
                // }
                ?>
              </div>
            <!-- </div> -->
          </div>
        </div>
      <?php } ?>


      </div>
      <div class="col-md-4 col-lg-4">
        <div class="card">
          <div id="chart-development-activity" style="height: 507px">
            <div class="tab">
               <a href=""> <button class="tablinks" >NEWS</button></a>

            </div>
              <div class="scroll" >
                <?php 
                if(!empty($news)){
                foreach($news as $row){ ?>
                 <div class=""  >
                    <div class="col-md-12 col-lg-12" >
                      <h4><?=$row['news_heading'] ?> </h4>
                    </div>
                    
                    <?php if($row['news_image'] != ''){
                      ?>
                    <div class="col-md-12 col-lg-12" >
                      <img src="<?php echo base_url(); ?>uploads/news/<?php echo $row['news_image'] ?>" style="height:50px;width:100px">
                    </div>
                  <?php } ?>
                  <div class="col-md-12 col-lg-12">
                      <?php if($row['news_date']!='') {?>
                      <span><?= date('d-m-Y',strtotime($row['news_date'])) ?></span>
                    <?php }?>
                    </div>
                    <div class="col-md-12 col-lg-12">
                      <?php if($row['news_description']!='') {?>
                      <span><?= $row['news_description'] ?></span>
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
      <!-- </div> -->
    </div>
  </div>
</div>