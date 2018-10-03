
<?php 
$title="Followers";
require('Includes/php/header.php'); 
?>


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
				
						<div class="col-sm-6">
						
					
							<div class="panel panel-default">
							
								
								<h5 class="box-heading">
									<div class="panel-heading ">
										<span class="glyphicon glyphicon-user" style="display:inline-block;"></span>
										<span class="user-about-heading">Followers</span>
									</div>
								</h5>								
								<ul class="list-group text-center">
								<?php include("php_work/view_followers.php"); ?>
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


if(isset($_POST['follow']) )
{
	include("php_work/follow_profile.php ");
	unset($_POST['follow']);


}
if(isset($_POST['Unfollow']))

{
	include("php_work/Unfollow_profile.php");
	unset($_POST['Unfollow']);


}
 ?>	
	

</body>

</html>