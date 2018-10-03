<div class="col-sm-3">
    <!--Suggested User Side Bar-->
    <div class="panel panel-default">
        <?php
        if(!isset($user_id)){
        ?>
        
        <!--Heading Display on Suggested user sidebar When user not logged in-->
        <h4 class="sug-sidebar-heading">
            <div class="panel-heading">People On Latest Experience</div>
        </h4>
        
        <?php 
        } 
        else{
        ?>
        
        <!---Heading Display on Suggested user sidebar When user is logged in --->
        <h4 class="sug-sidebar-heading">
            <div class="panel-heading">Peoples You May Follow</div>
        </h4>
        <?php } ?>

        <!--Random Users Will Be Displayed On Sidebar Suggested Peoples When user is not Logged In -->
        <ul class="list-group">	
            <?php								
            if(!isset($user_id))
            {
                $user_details=show_suggested_random_users();
                foreach($user_details as $userdetail)
            {											
            ?>
            <li class="list-group-item">
                <div class="row" >
                    <div class="col-xs-1">
                        <img src="<?php if(empty($userdetail['iamge'])){echo "images/default.jpeg";}
                        else{echo $userdetail['image'];}?>" width="30" height="30">
                    </div>
                    <div class="col-xs-9 sidebar col-xs-push-1"  >
                        <a href="experience.php?id=<?php echo $userdetail['u_id']; ?>" >
                            <span style="font-size:90%">
                                <b><?php echo $userdetail['Name']; ?></b>
                            </span>
                        </a>
                    </div>
                </div>	
            </li>
            <?php }} ?>
            <!--END -->

            <!--If User Logged In And Interest is set Then People With Same Interest Will Be Displayed-->
            <?php 
            if(isset($user_id))
            {
                $user_details=show_sugested_users_related($user_id);
                //Check is used here to check if the function random user was runned then donont run the show unrelated fun below
                $check=$user_details[1];
                foreach($user_details[0] as $userdetail)
                {
            ?>	
            <li class="list-group-item">
                <div class="row" >
                    <div class="col-xs-1">
                        <img src="<?php if(empty($userdetail['iamge'])){echo "images/default.jpeg";}
                        else{echo $userdetail['image'];}?>" width="30" height="30">
                    </div>
                    <div class="col-xs-9 sidebar col-xs-push-1"  >
                        <a href="experience.php?id=<?php echo $userdetail['u_id']; ?>" >
                            <span style="font-size:90%">
                                    <b><?php echo $userdetail['Name']; ?></b>
                            </span>
                        </a>
                    </div>
                </div>	
            </li>									
            <?php }}?>
            <!--END-->


            <!--To Show Unrelated Peoples After Showing Related Peoples-->
            <?php 
            if(isset($user_id) AND $check==0)
            {
                $user_details=show_suugested_users_unrelated($user_id);
                foreach($user_details as $userdetail)
                {	
            ?>
            <li class="list-group-item">
                <div class="row" >
                    <div class="col-xs-1">
                        <img src="<?php if(empty($userdetail['iamge'])){echo "images/default.jpeg";}
                        else{echo $userdetail['image'];}?>" width="30" height="30">
                    </div>
                    <div class="col-xs-9 sidebar col-xs-push-1"  >
                        <a href="experience.php?id=<?php echo $userdetail['u_id']; ?>" >
                            <span style="font-size:90%">
                                <b><?php echo $userdetail['Name']; ?></b>
                            </span>
                        </a>
                    </div>
                </div>	
            </li>	
            <?php }} ?>
            <!--END-->
            
            <li class="list-group-item text-center">
                <a href="view_more.php?people=more">
                    <span style="font-size:95%">
                        <b>View More</b>
                    </span>
                </a>
            </li>
        </ul>
    </div>	
</div>