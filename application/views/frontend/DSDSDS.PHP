<div class="container-fluid" style="    ">

    <div class="row" style="height: 100vh;">
<div class="col-md-2 col-sm-2 col-2 left-controls">
            <div class="qtype-control">
                <h4>Teaching Method</h4>
                <ul>
                    <li><a href="#" class="drag_drop">Drag & Drop</a></li>
                    <li ><a href="#" class="hide_show">Hide & Show</a></li>
                </ul>
            </div><!-- /.qtype-control -->

     
   




            <div class="theme-color-selector ">
                <h4>Choose Theme</h4>
                <ul>
                    <li><a href="<?=base_url('change-theme')?>?theme=0" class="refresh_screen  op theme0 greenbg" title="Default"></a></li>
                    <li><a href="<?=base_url('change-theme')?>?theme=1" class="bluebg refresh_screen op theme1"></a></li>
                    <li><a href="<?=base_url('change-theme')?>?theme=2" class=" op theme2 pinkbg"></a></li>
                    <li><a href="<?=base_url('change-theme')?>?theme=3" class="remove_new_row op theme3 graybg"></a></li>
                </ul>
            </div><!-- /.theme-selector -->

            <div class="answer-area-controls">
                <a href="#" class="buttons add_new_row op "><i class="fas fa-plus"></i> Add New Answer Raw</a>
                <a href="#" class="buttons view_tray"><i class="far fa-copy"></i> View Transaction Tray</a>
                <a href="#" class="buttons help_txt"><i class="fas fa-align-left"></i> Show Help Text</a>
                <a href="#" class="buttons show_help_image"><i class="fas fa-image"></i> Show Help Image</a>
            </div>

            <div class="cell-color-selector">
                <h4>Color Cell</h4>
                <ul>
                    <li><a href="#" class="yellowbg change_bg_blue "></a></li>
                    <li><a href="#" class="lpinkbg change_bg_red"></a></li>
                    <li><a href="#" class="rosebg change_bg_black"></a></li>
                    <li><a href="#" class="redbg change_bg_none"></a></li>
                </ul>
            </div><!-- /.theme-selector -->

            <div class="line-color-selector">
                <h4>Underline</h4>
                <i class="fas fa-grip-lines"></i>
                <ul>
                    <li><a href="#" class="single_line"><i class="fas fa-minus"></i> &nbsp;Add Single line</a></li>
                    <li><a href="#" class="double_line"><img src="<?= base_url().'assets_main/assets/images/controls/double-line.svg';?>" width="12" alt="">  &nbsp;Add Double line</a></li>
                    <li><a href="#" class="text_line"><i class="fas fa-text-width"></i> &nbsp;Add Text underline</a></li>
                </ul>
            </div>


        </div>


        

    </div>

    <div class="op_controll operation ">

        <div class="refresh_screen op " title="Refresh (S)" > <i class="fas fa-sync-alt"></i></div>

        <div class="add_new_row op " title="Insert New Row (N)" > <i class="fas fa-plus-circle"></i></div>

        <div class="remove_new_row op" title="Remove Row(R)" > <i class="fas fa-minus-circle"></i></div>

        <div class="refresh_result op " title="Calculate(C)"> <i class="fas fa-calculator"></i></div>



       

        <div class="show_question op " title="Question(Q)"> <i class="fas fa-dice-one"></i></div>

        <div class="show_answer op " title="Answer(A)"><i class="fas fa-dice-two"></i></div>

        <div class="show_full op " title="Full Screen(F)"><i class="fas fa-dice-three"></i></div>
        <div class="show_image op " title="Image(I)"><i class="fas fa-dice-two"></i></div>
        <div class="show_image_answer op " title="Image(I)"><i class="fas fa-dice-two"></i></div>
         <div class="show_help_image op " title="Help Image(I)"><i class="fas fa-image"></i></div>

    </div>

    

    <div class="theme text-center" style="display:none;">

        <a href="<?=base_url('change-theme')?>?theme=0" class="refresh_screen op theme0" title="Default" > <i class="fas fa-square"></i></a>

        <a href="<?=base_url('change-theme')?>?theme=1" class="refresh_screen op theme1" title="Theme One" > <i class="fas fa-square"></i></a>

        <a href="<?=base_url('change-theme')?>?theme=2" class="op theme2" title="Theme Two" > <i class="fas fa-square"></i></a>

        <a href="<?=base_url('change-theme')?>?theme=3" class="remove_new_row op theme3" title="Theme Three" > <i class="fas fa-square"></i></a>

    </div>
<!-- 
   <div class="hide/drag text-center" style="display:none;">

        <a class="bg-blue op hide_show " > Hide/show</a>

        <a class="bg-red op drag_drop"  > Drag/drop</a>

        

    </div> -->


      <div class="backgnd-color text-center" style="display:none;">

        <div class="bg-blue op change_bg_blue " > <i class="fas fa-square" style="color:#2762a282 "></i></div>

        <div class="bg-red op change_bg_red"  > <i class="fas fa-square" style="color:#9c232fa3 "></i></div>

        <div class="bg-black op change_bg_black"  > <i class="fas fa-square" style="color:#a7922f "></i></div>
         <div class="bg-none op change_bg_none"  > <i class="fas fa-times"></i></div>

    </div>

</div>