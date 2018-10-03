<?php 
ob_start();

require('Includes/php/header.php'); ?>


<?php

if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$name_email="select * from users where u_id=$id";
	$result=mysqli_query($con, $name_email);
	$result=mysqli_fetch_array($result);
	$name=$result['Name'];
	$email=$result['email'];
	$image_path=$result['image'];
	$target_path=$image_path;

?>

	<section style="background:white; color:black">

		<div class="container">
			<div class="row">
			<!----Left Sidebars Start -->
				<?php include("Includes/php/left-sidebars.php"); ?>
				
			<!----Left Sidebars End -->
				
						<div class="col-sm-6" >
							<div class="panel panel-default" >
								<h5 class="box-heading">
									<div class="panel-heading ">
										<span class="glyphicon glyphicon-user" style="display:inline-block;"></span>
										<span class="user-about-heading">Following</span>
									</div>
								</h5>
								<ul class="list-group text-center">
								<?php include("php_work/view_following.php"); ?>
								</ul>									
							</div>	
						</div>
						
						
			
				<!----Right Sidebars Start -->
				<?php include("Includes/php/right-sidebars.php"); ?>
				<!----Right Sidebars End -->
						
							
						
				
			</div>
			
				
			
		</div>
	</section>
	
<?php }






 ?>	


	

</body>

</html>