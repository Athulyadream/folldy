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
      
      <div class="col-md-12 col-lg-12">

      

        <!-- <div class="card"> -->
          <!-- <div id="chart-development-activity" > -->
           <!--  <div class="tab">
                <button class="tablinks active" onclick="openCity(event, 'News')" >News</button>
                <button class="tablinks" onclick="openCity(event, 'Resources')">Resources</button>
                <button class="tablinks" onclick="openCity(event, 'Timetable')">Time Table</button>
                <button class="tablinks" onclick="openCity(event, 'Students')">Students</button>
                <button class="tablinks" onclick="openCity(event, 'Events')">Events</button>

            </div> -->







            











  <div class=" section">
          <div class="row">
            <div class="col-12"><h4>Time Table</h4></div>
            <div class="col-12">
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
        </div><!-- /.subjects  --->









          <!-- </div> -->
        <!-- </div> -->
      <!-- </div> -->
    </div>
  </div>
</div>
