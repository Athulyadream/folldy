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
<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
          
      <div id="roles-table" class="col-12">

        <div class="page-header" style="margin:0;">
            <h1 class="page-title">
                <a href="<?=base_url('teacher-dashboard')?>"><i class="fa fa-chevron-left"> Back </i></a>
            </h1>
        </div>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Chapters</h3>
            <div class="ml-auto">
              <!-- <a href="#" id="filter-btn" class="btn ml-auto" data-toggle="tooltip" title="Filter"><i class="fa fa-filter"></i></a> -->
              
            </div>
          </div>
          <div class="col-md-12 col-lg-12">
            <div class="row p-3">
            <?php 
              if(!empty($chapter)){
                foreach($chapter as $row){ ?>
                  <div class="col-sm-3 col-lg-3  chapter">
                    <?php if(!empty($row['chapter_thumbnail'])){?>
                      <a href="<?php echo base_url('chapter-view-teacher/'.$row['data_id']); ?>" target="_blank">
                        <figure>
                          <img src="<?= base_url('uploads/chapter_thumbnail/'.$row['chapter_thumbnail']) ?>" style=" height: 10rem;">
                          <figcaption><h4><?= $row['data_name'] ?></h4></figcaption>
                          
                        </figure>
                      
                      <!-- <div class="content">
                        <h4><?= $row['data_name'] ?></h4>
                      </div> -->
                      </a>
                    <?php }else{?>
                      <a href="<?php echo base_url('chapter-view-teacher/'.$row['data_id']); ?>" target="_blank">
                      <div  style="text-align: center; padding-top: 50px;border : 1px solid black;height: 10rem;">
                        <h4 ><?= $row['data_name'] ?></h4>
                      </div>
                    </a>
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
      </div>
      

      <!-- edit Form -->
      
      <!-- /edit form -->
    </div>
  </div>
</div>
</div>


