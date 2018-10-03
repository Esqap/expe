<?php

Include_once ("Includes/php/connection.php");
include_once "timestamp.php";
$ago=new Time();

//Getting Cat
if(isset($_GET['cat'])){
	
	$cat=$_GET['cat'];
	//Getting Experience And the User Who Posted It Where Related To is Equal to Selected Catogery.
	$select_query= "select * from experiences e JOIN users u on e.posted_by=u.email where e.related_to='$cat' order by posted_date desc";
	
	//Showing Selected Catogery Name
	echo '<h4 class="box-heading" style="padding:0; margin:0; padding-bottom:15px;">
			<span>Catogery: '.$cat.'</span>
		</h4>';
}
else{
	//Getting Experience And the User Who Posted It Showing All Categories.
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
<?php } ?>

<?php 
while($row=mysqli_fetch_array($run_query)){
	$exp_id=$row['exp_id'];
	$exp=$row['experience'];
	$by=$row['Name'];
	$by_id=$row['u_id'];
	$date=$row['posted_date'];
	$related=$row['related_to'];
	$conclusion=$row['conclusion'];
	$posted=$ago->convertToAgo($date);
	$email=$row['posted_by'];
	$exp=preg_replace("/#+([a-zA-Z0-9_]+)/","<a href='hashtag.php?tag=$1'>$0</a>",$exp);
	$target_path=$row['image'];
?>		
		
		
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default view_exp_post_box">
									<div class="panel-body post">
										<div class="row post-exp">
											<div class="col-xs-1" >
												<img class="img-circle" style="display:inline-block; margin-top:-3px;" src="<?php if(empty($target_path)){ echo 'images/default.jpeg';}else{echo $target_path;} ?> " width="40" height="40">
											</div>
											<div class="col-xs-10 text-left exp-by ">
												<span style="font-size:95%"><b><a href="experience.php?id=<?php echo $by_id;?>"><?php echo $by;?></b></a>
												<br/> <span style="font-size:90%; color:grey"><?php echo $ago->converts($posted,$date); ?></span>
												</span>
											</div>											
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
					
<?php }  ?>

