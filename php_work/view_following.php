<?php


$select="select * from user_followers where user_id='$id'";
$result_followers=mysqli_query($con,$select);
if(mysqli_num_rows($result_followers)<1)
{
	if(isset($user_email))
	{
		echo "You are not Following Anyone";
	}
	else
	{
		echo $name." is not Following Anyone";
	}
	
}
while($row=mysqli_fetch_assoc($result_followers))
{								

$follower_id=$row['follower_id'];
$select="select * from users where u_id='$follower_id'";
$result_follower=mysqli_query($con,$select);
$result_follower=mysqli_fetch_assoc($result_follower);


$follower_name=$result_follower['Name'];
$follower_email=$result_follower['email'];
$follower_target_path=$result_follower['image'];

?>
									
									
									<li class="list-group-item text-center">
											
											<div class="row text-left" id="following_listgrp" >
												
													<div class="col-md-6 col-md-offset-1" >
															<img class="img-circle" src="<?php echo $follower_target_path;?>" width="32" height="32">
														<span style="font-size:90%"><b>
															<a href="experience.php?id=<?php echo $follower_id?>"> 
														<?php echo $follower_name; ?></b> </span></a>
													</div>
													
													<div class="col-md-5 " >
													<div class="f-btn">
													</div>
													</div>
												
											</div>
										
										</li>
<?php } 


	
	



?>