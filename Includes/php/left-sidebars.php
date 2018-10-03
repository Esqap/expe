
<!--Show Profile Picture Sidebar-->
<?php 
	if(basename($_SERVER['PHP_SELF'])== 'about.php' 
	OR basename($_SERVER['PHP_SELF'])=='followers.php' 
	OR basename($_SERVER['PHP_SELF'])=='following.php' 
	OR basename($_SERVER['PHP_SELF'])=='setting.php' 
	OR basename($_SERVER['PHP_SELF'])=='experience.php'){ 
?>
	<div class="col-sm-3"> <!--This Left Side bar Div Is Closed at Very Bottom -->
		<div class="panel panel-default text-center">	
			<div class="panel-body sidebar profile_pic">
				<img src="<?php echo $target_path; ?>" class="img-responsive">
			</div>
			
			<!--<div class="panel-footer">-->
			<!--	<b><?php echo $name; ?></b>-->
			<!--</div>-->

            <div class="panel-footer">
				<div class="row">
					<div class=" col-md-12 text-center">
						<b><?php echo $name; ?></b>
					<?php
					if($verifed_check == 1){
					?>
						<img src="images/Logo/verify.png" style="display:inline-block;" title="Verified" alt="Verified" class="img-responsive" height="16px" Width="16px">
					<?php } ?>
					
					</div>
				</div>
			</div>

			<ul class="list-group text-center">

			<?php if(isset($user_email)){if($email!=$user_email){ 
			
			/*Checking if the user is in the following list or not so that Unfollow Button will be displayed if the user profile  being followed by the user and follow Button if not  */
			$select="select * from user_followers where user_id='$user_id'";
			$result_follow=mysqli_query($con,$select);
			$a=true;
			while($row=mysqli_fetch_assoc($result_follow))
			{
			if($row['follower_id']==$id) {  ?>
				<div id="div_unfollow"><button class="btn btn-default" style="margin-top:10px; background:grey; color:white;" value="Unfollow" id="btn_unfollow" name="Unfollow">UnFollow</button></div>
				<div id="div_follow" style="display:none"><button class="btn btn-primary" style="margin-top:10px;" value="follow" id="btn_follow" name="follow">Follow</button></div>
			<?php  
			
			$a=false; break; }}
			if($a==true){
			?>
				<div id="div_follow"><button class="btn btn-primary" style="margin-top:10px;" value="follow" id="btn_follow" name="follow">Follow</button></div>
				<div id="div_unfollow" style="display:none"><button class="btn btn-default" style="margin-top:10px; background:grey; color:white;" value="Unfollow" id="btn_unfollow" name="Unfollow">UnFollow</button></div>

			<?php }}} ?>	
				<li class="list-group-item text-center">
					<a href="experience.php?id=<?php echo $id; ?>">
						<span style="font-size:95%">
							<b>Experience</b>
						</span>
					</a>
				</li>
				<li class="list-group-item">
					<a href="about.php?id=<?php echo $id; ?>">
						<span style="font-size:95%">
							<b>About</b>
						</span>
					</a>
				</li>
				<li class="list-group-item">
					<a href="following.php?id=<?php echo $id ?>">
						<span style="font-size:95%">
							<b>Following</b>
						</span>
					</a>
				</li>

				<li class="list-group-item">
					<a href="followers.php?id=<?php echo $id ?>">
						<span style="font-size:95%">
							<b>Followers</b>
						</span>
					</a>
				</li>
			</ul>
		</div>
    <?php if(isset($user_email)){?>
		<input type="hidden" id="user_id" value="<?php echo $user_id ?>"/>
		<input type="hidden" id="follow_id" value="<?php echo $id?>"/>
	<?php } ?>

				
<!--Show Experience Category Sidebar Here-->
<?php } else{ ?>
	<div class="col-sm-3"> <!--This Left Side bar Div Is Closed at Very Bottom. Any Side bar to add will be placed before its closing tag-->
        <div class="panel panel-default text-center">
            <h4 class="box-heading">
             <div class="panel-heading ">Select Category</div>
            </h4>
            <ul class="list-group">
                <?php 
                $q="select * from questions_cat";
                $result_cat=mysqli_query($con,$q);
                while($row_cat=mysqli_fetch_array($result_cat)){
				$cat=$row_cat['cat'];
                ?>
                <li class="list-group-item text-center">
					<a href="<?php echo $_SERVER['PHP_SELF'].'?cat='.$cat; ?>">
                        <span style="font-size:95%">
                            <b><?php echo $cat; ?></b>
                        </span>
                    </a>
                </li>

                <?php } ?>
				<li class="list-group-item text-center">
					<a href="<?php echo $_SERVER['PHP_SELF']; ?>">
						<span style="font-size:95%">
							<b>Show All</b>
						</span>
					</a>
				</li>
            </ul>
        </div>
<?php } ?>
		

	<!-- Trending Sidebar -->
	<div class="panel panel-default text-center">
		<h4 class="box-heading">
			<div class="panel-heading ">Trending</div>
		</h4>
		<ul class="list-group">
			<?php include("php_work/view_hash.php"); ?>								
			<li class="list-group-item text-center">
				<a href="view_more.php?hashtag=more">
					<span style="font-size:95%">
						<b>View More</b>
					</span>
				</a>
			</li>
		</ul>
	</div>
</div><!--Left Side Bar Div Closed.-->