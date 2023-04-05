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
  background-color: white;
  float: left;
  
  outline: none;
  cursor: pointer;
  /*padding: 10px;*/
  margin: 5px;
  transition: 0.3s;
  font-size: 17px;
  width: 100px;
  height: 35px;
  text-align: center;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: black;
  color: white;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: black;
  color: white;

}

.scroll { 
        margin:4px, 4px; 
        padding:4px;  
        width: 100%; 
        height: 400px; 
        overflow-x: auto; 
        overflow-y: auto; 
        text-align:justify;
        border-style:none;

    } 
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
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
              <!-- <h1><?= $institute['institute_name'] ?></h1> -->
              <h1 style="margin-bottom: 0px;"><?=$institute['name_abbreviation'] ?></h1>
        <h4 style="font-size: 1rem;"><?= $institute['institute_name']?></h4>
            </div>
          </div>
        </div>
        <div class="row">
        <?php foreach($course as $row) {?>  
          <div class="col-sm-4 col-lg-4 d-inline-block">
            <div class="card p-2">
              <div  style="text-align: center; padding-top: 10px">
                <h5><?= $row['data_name'] ?></h5>
              </div>
              <!-- <div class="d-flex ">
                <span class=" mr-2">
                   <img src="<?= base_url('assets/images/avatar.jpg') ?>" alt="Avatar" class="avatar"> 
                </span>
                <div>
                  <h5><?= $row['data_name'] ?></h5>
                  
                </div>
              </div> -->
            </div>
          </div>
        <?php } ?>
        </div> 
        <!-- <div class="card">
          <div id="chart-development-activity" >
            <h4 style="margin: 10px;">Recent</h4>
            <div class="row p-3 ">
              <?php 
              if(!empty($chapter)){
                foreach($chapter as $row){ ?>
                  <div class="col-sm-4 col-lg-4  chapter">
                    <img src="<?= base_url('uploads/background/'.$row['backgroundimage']) ?>" style=" height: 10rem;">
                    <div class="content">
                      <h4><?= $row['data_name'] ?></h4>
                    </div>
                  </div>
                <?php } 
                }
                else{?>
                  
                  <h4 style="text-align: center;">No data found!</h4>
                <?php 
              }?>

            </div>
            
          </div>
        </div> -->
        <!-- <div class="card">
          <div id="chart-development-activity" style="height: 15rem;" >
              <h4 style="margin: 10px;">Videos</h4>

              <div class="scrollmenu" >
                <?php 
                if(!empty($video)){
                foreach($video as $row){ ?>
                
                 <div class="d-inline-block video" style="padding-bottom: 10px">
                    <a href="<?php echo base_url('uploads/video/' .$row['video_link'] ) ?>" target="_blank" >
                    <img src="<?= base_url('uploads/thumbnail/'.$row['thumb_nail']) ?>" width = "160px" height="90px">
                    <figcaption><?= $row['video_title'] ?></figcaption>
                    
                  </a>
                    
                  
                </div>
                
                <?php } 
                }
                else{?>
                  
                  <h4 style="text-align: center;">No data found!</h4>
                <?php }?>
              </div>
            
            
            
          </div>
        </div> -->


      </div>
      <div class="col-md-4 col-lg-4">
        <div class="card">
          <div id="chart-development-activity" >
            <div class="tab">
                <button class="tablinks active" onclick="openCity(event, 'News')" >News</button>
                <button class="tablinks" onclick="openCity(event, 'Resources')">Resources</button>
                <button class="tablinks" onclick="openCity(event, 'Timetable')">Time Table</button>
                <button class="tablinks" onclick="openCity(event, 'Students')">Students</button>
                <button class="tablinks" onclick="openCity(event, 'Events')">Events</button>

            </div>
            <div id="News" class="tabcontent" style="display: block;">
              <div class="row scroll" >
                <?php 
                if(!empty($dashboard_news)){
                foreach($dashboard_news as $row){ ?>
                 <div class=""  >
                    <div class="col-md-12 col-lg-12" style="text-align: center;">
                      <h3><?=$row['news_heading'] ?> </h3>
                    </div>
                    
                    <?php if($row['news_image'] != ''){
                      ?>
                    <div class="col-md-12 col-lg-12">
                      <img src="<?php echo base_url(); ?>uploads/news/<?php echo $row['news_image'] ?>" style="height:50px;width:100px">
                    </div>
                  <?php } ?>
                  <div class="col-md-12 col-lg-12">
                      <span><?= date('d-m-Y',strtotime($row['news_date'])) ?></span>
                    </div>
                    <div class="col-md-12 col-lg-12">
                      <p><?=$row['news_description'] ?></p>
                    </div>
                </div>
                
                <?php } 
                }
                else{?>
                  
                  <h4 style="text-align: center;">No data found!</h4>
                <?php }?>
              </div>
            </div>
            <div id="Resources" class="tabcontent" >
              <div class="scroll" >
                <?php 
                if(!empty($teachers)){
                foreach($teachers as $row){ ?>
                 <div class="row"  >
                    <div class="col-md-12 col-lg-12">
                      <h4><?=$row['teacher_name'] ?> </h4>
                    </div>
                    <div class="col-md-12 col-lg-12">
                      <?=$row['teacher_email'] ?> 
                    </div>
                    <div class="col-md-12 col-lg-12">
                      <?=$row['teacher_phone'] ?> 
                    </div>
                    <div class="col-md-12 col-lg-12">
                      <strong>Subjects : </strong>
                      <?=$row['subject'] ?>
                    </div>
                </div><br/>
                
                <?php } 
                }
                else{?>
                  
                  <h4 style="text-align: center;">No data found!</h4>
                <?php }?>
              </div>
            </div>
            <div id="Students" class="tabcontent" >
              <div class="scroll" >
                <?php 
                if(!empty($student)){
                foreach($student as $row){ ?>
                 <div class="row"  >
                    <div class="col-md-12 col-lg-12">
                      <h4><?=$row['name'] ?> </h4>
                    </div>
                    <div class="col-md-12 col-lg-12">
                      <?=$row['email_id'] ?> 
                    </div>
                    <div class="col-md-12 col-lg-12">
                      <?=$row['phone'] ?> 
                    </div>
                    <div class="col-md-12 col-lg-12">
                      <strong>Batch : </strong>
                      <?=$row['batch_name'] ?>
                    </div>
                </div><br/>
                
                <?php } 
                }
                else{?>
                  
                  <h4 style="text-align: center;">No data found!</h4>
                <?php }?>
              </div>
            </div>
            <div id="Events" class="tabcontent" >
              <div class="scroll" >
                <?php 
                if(!empty($event)){
                foreach($event as $row){ ?>
                 <div class=""  >
                    <div class="col-md-12 col-lg-12" >
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
            <div id="Timetable" class="tabcontent" >
              <div class="scroll" >
                <?php 
                if(!empty($time_table)){
                  
                foreach($time_table as $row){ 
                    //print_r($row['timetable']);
  //print_r($row['days']);
                  ?>
                 <div class=""  >
                    <div class="col-md-12 col-lg-12" >
                      <h4><?=$row['batch_name'] ?> </h4>
                    </div>
                    <div class="col-md-12 col-lg-12" >
                      <?php if(!empty($row['timetable'])){ ?>
                      <table class="table table-striped">
                        <tr>
                          <th >#</th>
                          <?php 
                          for($i=1;$i<=$row['batch_periods'];$i++){
                          ?>
                            <th><?= $i ?></th>
                          <?php } ?>
                        </tr>
                        <?php
                          foreach($row['days'] as $data){?>
                            <tr>
                            <th><?= $data['week_days'] ?></th>
                            <?php
                            for($i=1;$i<=$row['batch_periods'];$i++){
                              foreach($row['timetable'] as $time){
                                if($time['weekdays'] == $data['weekdays'] && $time['period'] == $i ){ ?>
                                  <td><?= $time['subject']  ?></td>
                              <?php  }

                              }
                            }?>
                          </tr>
                          <?php }
                        
                        ?>
                      </table>
                      <?php }
                      else{ ?>
                        <h4><small>Not Update Timetable</small></h4>
                        <?php
                      }
                      //print_r($row['timetable']); ?>
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
      <!-- </div> -->
    </div>
  </div>
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>