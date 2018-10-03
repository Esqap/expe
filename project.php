<?php  
	ob_start();
	require('Includes/php/header.php'); 
	$id=(int) validateString($_GET['id']);
	$name_email="select * from users where u_id=$id";
	$result=mysqli_query($con, $name_email);
	if(mysqli_num_rows($result)<1 OR !isset($id))
	{
		header("location:home.php");
	}
	$result=mysqli_fetch_array($result);
	$name=$result['Name'];
	$email=$result['email'];
	$image_path=$result['image'];
	$target_path=$image_path;
?>

	<!---Filal ke liye yaha background colr whit diya kuch css me changing krne pare ge wo bad me kaun ga -->

	<section style="background:white; color:black">
		<div class="container">
			<div class="row">
			
				<!----Left Sidebars Start -->
				<?php include("Includes/php/left-sidebars.php"); ?>
				<!----Left Sidebars End -->
				
						<div class="col-sm-6">
							<?php if(isset($user_email)){ if($email==$user_email){ ?>
								<div class="panel panel-default">
									<div class="panel-body">
										<textarea rows="3" maxlength="150" id="p_exp" class="form-control" placeholder="Your Project Detail"  name="experience" ></textarea>
										<input type="website" id="p_con" class="form-control" placeholder="Project Website" name="pro_web"/>
										<input type="file" name="profile_image" class="form-control">
									</div>
									
								</div>
							<?php } ?>
							<div id="post_append">
								<div>
									<?php include("php_work/view_projects.php");} ?> 
								</div>	
							</div>			
						</div>
						
				<!----Right Sidebars Start -->
					<?php include("Includes/php/right-sidebars.php"); ?>
				<!----Right Sidebars End -->
			</div>
		</div>
	</section>
	


	
	<?php 
	if(isset($_POST['follow']))
	{
		include("php_work/follow_profile.php");
		unset($_POST['follow']);
	}

	if(isset($_POST['Unfollow']))
	{
		include("php_work/Unfollow_profile.php");
		unset($_POST['Unfollow']);
	}
	?>

	<input type="hidden" id="p_useremail" value="<?php echo $user_email; ?>">
	<input type="hidden" id="p_email" value="<?php echo $email; ?>">
	
	
	
</body>
</html>