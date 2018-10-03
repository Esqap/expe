<!---All Code Related to Home Experience When Logged In -->
<?php
include_once("Includes/php/connection.php");
include_once "timestamp.php";
$ago=new Time();
include_once("php_work/trending_experiences.php");


//Count Followers
	$q="SELECT * FROM user_followers where user_id='$user_id'";
	$result=mysqli_query($con,$q);
	$count=mysqli_num_rows($result);

	if($count==0){
		$run_query4=trending_experiences();
		while ($row=mysqli_fetch_array($run_query4)) {
			$exp_id=$row['exp_id'];
			$exp=$row['experience'];
			$by=$row['Name'];
			$by_id=$row['u_id'];
			$date=$row['posted_date'];
			$related=$row['related_to'];
			$conclusion=$row['conclusion'];
			$posted=$ago->convertToAgo($date);
			$email=$row['posted_by'];
			$exp=preg_replace("/#+([a-zA-Z0-9_]+)/","<a href='php_work/hashtag.php?tag=$1'>$0</a>",$exp);
			$target_path=$row['image'];

	?>

	<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default view_exp_post_box">
									<div class="panel-body post">
										<div class="row post-exp">
											<div class="col-xs-1" >
												<img class="img-circle" src="<?php if(empty($target_path)){ echo 'images/default.jpeg';}else{echo $target_path;} ?> " width="40" height="40">
											</div>
											<div class="col-xs-10 text-left exp-by ">
												<span style="font-size:95%"><b><a href="experience.php?id=<?php echo $by_id;?>"><?php echo $by;?></b></a>
												<br/> <span style="font-size:90%; color:grey"><?php echo $ago->converts($posted,$date); ?></span>
												</span>
											</div>
											
											
										
										</div>
										<hr class="post-divider">
										<div class="row post-exp exp">
											<div class="col-xs-12" style="pa">
												<span class="post-status">
													<?php echo $exp; ?>
												</span>
											</div>
										</div>
										<hr class="post-divider">
									</div>
									<div class="panel-footer view_exp_post_box_footer">
										<?php include("php_work/view_comment.php"); ?>									
									</div>
								
							
							</div>
							</div>
							
						</div>
					<?php 
						} 
				$q="select * from experiences e JOIN users u on e.posted_by=u.email where u.email='$user_email' order by posted_date desc";
						$result7=mysqli_query($con,$q);
							while ($row=mysqli_fetch_array($result7)) {
								$exp_id=$row['exp_id'];
								$exp=$row['experience'];
								$by=$row['Name'];
								$by_id=$row['u_id'];
								$date=$row['posted_date'];
								$related=$row['related_to'];
								$conclusion=$row['conclusion'];
								$posted=$ago->convertToAgo($date);
								$email=$row['posted_by'];
								$exp=preg_replace("/#+([a-zA-Z0-9_]+)/","<a href='php_work/hashtag.php?tag=$1'>$0</a>",$exp);
								$target_path=$row['image'];

					 ?>




<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default view_exp_post_box">
									<div class="panel-body post">
										<div class="row post-exp">
											<div class="col-xs-1" >
												<img class="img-circle" src="<?php if(empty($target_path)){ echo 'images/default.jpeg';}else{echo $target_path;} ?> " width="40" height="40">
											</div>
											<div class="col-xs-10 text-left exp-by ">
												<span style="font-size:95%"><b><a href="experience.php?id=<?php echo $by_id;?>"><?php echo $by;?></b></a>
												<br/> <span style="font-size:90%; color:grey"><?php echo $ago->converts($posted,$date); ?></span>
												</span>
											</div>
											
											
										
										</div>
										<hr class="post-divider">
										<div class="row post-exp exp">
											<div class="col-xs-12" style="pa">
												<span class="post-status">
													<?php echo $exp; ?>
												</span>
											</div>
										</div>
										<hr class="post-divider">
									</div>
									<div class="panel-footer view_exp_post_box_footer">
										<?php include("php_work/view_comment.php"); ?>									
									</div>
								
							
							</div>
							</div>
							
						</div>
	





				<?php } } else { 



//Getting Cat
if(isset($_GET['cat'])){
	
	$cat=$_GET['cat'];
	//Getting Experience And the User Who Posted It - Where Related To is Equal to Selected Category.
	$select_query= "select * from experiences e JOIN users u on e.posted_by=u.email where e.related_to='$cat' order by posted_date desc";
	//Showing Selected Catogery Name
	echo '<h4 class="box-heading" style="padding:0; margin:0; padding-bottom:15px;">
			<span>Catogery: '.$cat.'</span>
		</h4>';
}
else{
	//Getting Experience And the User Who Posted It - Showing All Categories.
	$select_query= "select * from experiences e JOIN users u on e.posted_by=u.email order by posted_date desc";
}

$run_query=mysqli_query($con,$select_query);


if(mysqli_num_rows($run_query)<1)
{

?>
	
						<div class="row">
							<div class="col-sm-12 text-center">
							
								<h4>No Experiences to Show</h4>
							</div>			
						</div>


<?php 
}

while($row=mysqli_fetch_assoc($run_query)){
	$exp_id=$row['exp_id'];
	$exp=$row['experience'];
	$by=$row['Name'];
	$by_id=$row['u_id'];
	$date=$row['posted_date'];
	$related=$row['related_to'];
	$conclusion=$row['conclusion'];
	$posted=$ago->convertToAgo($date);
	$email=$row['posted_by'];
	$exp=preg_replace("/#+([a-zA-Z0-9_]+)/","<a href='php_work/hashtag.php?tag=$1'>$0</a>",$exp);
	$target_path=$row['image'];
	if($user_id==$by_id)
	{
	?>
		<div class="row"  id="hide_exp<?= $exp_id ?>">
							<div class="col-sm-12">
								<div class="panel panel-default view_exp_post_box">
									<div class="panel-body post">
										<div class="row post-exp">
											<div class="col-xs-1" >
												<img class="img-circle" src="<?php if(empty($target_path)){ echo 'images/default.jpeg';}else{echo $target_path;} ?> " " width="42" height="42" style="display:inline-block; margin-top:-3px;">
											</div>
											<div class="col-xs-10 text-left exp-by ">
												<span style="font-size:95%"><b><a href="experience.php?id=<?php echo $by_id;?>"><?php echo $by;?></b></a>
												<br/> <span style="font-size:90%; color:grey"><?php echo $ago->converts($posted,$date); ?></span>
												</span>
											</div>
											
											<?php
											if($user_email == $email){
											?>
											<div class="col-xs-1 delete_post" id="<?= $exp_id; ?>"><span class="ui-icon ui-icon-trash"></span></div>											
											<div style="display: none" title="Experience Delete" id="modal_del_exp<?= $exp_id ?>"><p><span class="ui-icon ui-icon-alert" ></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p></div>
											<?php } ?>
										
										</div>
										<hr class="post-divider">
										<div class="row post-exp exp">
											<div class="col-xs-12">
												<span class="post-status">
													<?php echo $exp; ?>
												</span>
											</div>
										</div>
										<hr class="post-divider">
										
										
										
									</div>
									<div class="panel-footer view_exp_post_box_footer">
										<?php include("php_work/view_comment.php"); ?>									
									</div>
								
							
							</div>
							</div>
							
						</div>
	<?php 
	
	continue;
	}
	
	$select_query1= "select follower_id from user_followers where user_id='$user_id'";
	$run_query1=mysqli_query($con,$select_query1);
	
	while($row1=mysqli_fetch_assoc($run_query1))
	{
	$following_id=$row1['follower_id'];
	
		
		if($by_id==$following_id)
		{
	
?>		
		
<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default view_exp_post_box">
									<div class="panel-body post">
										<div class="row post-exp">
											<div class="col-xs-1" >
												<img class="img-circle" src="<?php if(empty($target_path)){ echo 'images/default.jpeg';}else{echo $target_path;} ?> " width="40" height="40">
											</div>
											<div class="col-xs-10 text-left exp-by ">
												<span style="font-size:95%"><b><a href="experience.php?id=<?php echo $by_id;?>"><?php echo $by;?></b></a>
												<br/> <span style="font-size:90%; color:grey"><?php echo $ago->converts($posted,$date); ?></span>
												</span>
											</div>
											
											
										
										</div>
										<hr class="post-divider">
										<div class="row post-exp exp">
											<div class="col-xs-12" style="pa">
												<span class="post-status">
													<?php echo $exp; ?>
												</span>
											</div>
										</div>
										<hr class="post-divider">
									</div>
									<div class="panel-footer view_exp_post_box_footer">
										<?php include("php_work/view_comment.php"); ?>									
									</div>
								
							
							</div>
							</div>
							
						</div>
					
<?php }?>

<?php } }}?>


</body>
</html>