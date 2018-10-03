<?php

$select="select * from user_followers where follower_id='$id'";
$result_following=mysqli_query($con,$select);
if(mysqli_num_rows($result_following)<1)
{
	if(isset($user_email))
	{
		echo "You are not Followed By Anyone";
	}
	else
	{
		echo $name." is not Followed By Anyone";
	}
	
}

while($row=mysqli_fetch_assoc($result_following))
{								

$following_id=$row['user_id'];
$select="select * from users where u_id='$following_id'";
$result_follower=mysqli_query($con,$select);
$result_follower=mysqli_fetch_assoc($result_follower);


$following_name=$result_follower['Name'];
$following_email=$result_follower['email'];
$following_target_path=$result_follower['image'];

?>
									
									
									<li class="list-group-item text-center">
											
											<div class="row text-left" id="following_listgrp" >
												
													<div class="col-md-6 col-md-offset-1" >
															<img class="img-circle" src="<?php echo $following_target_path;?>" width="32" height="32">
														<span style="font-size:90%"><b>
															<a href="experience.php?id=<?php echo $following_id?>"> 
														<?php echo $following_name; ?></b> </span></a>
													</div>
													
													<div class="col-md-5 " >
													<div class="f-btn">
													</div>
													</div>
												
											</div>
										
										</li>
<?php } 


	
	



?>