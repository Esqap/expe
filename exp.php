<?php

Include ("Includes/php/header.php");
Include("timestamp.php");
$ago=new Time();
// $con=mysqli_connect("localhost","root","","expe");
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $user_email=$_GET['user'];
    $select_query= "select * from experiences e JOIN users u on e.posted_by=u.email WHERE e.exp_id='$id'";

$run_query=mysqli_query($con,$select_query);

while($row=mysqli_fetch_array($run_query)){
	$exp_id=$row['exp_id'];
	$exp=$row['experience'];
	$by=$row['Name'];
	$date=$row['posted_date'];
	$related=$row['related_to'];
	$conclusion=$row['conclusion'];
	$posted=$ago->convertToAgo($date);
	$email=$row['posted_by'];
	$target_path=$row['image'];
	$exp=preg_replace("/#+([a-zA-Z0-9_]+)/","<a href='php_work/hashtag.php?tag=$1'>$0</a>",$exp);
?>		
		
		<div class="container">
						<div class="row">
							<div class="col-sm-6 col-sm-push-3 ">
								<div class="panel panel-default">
									<div class="panel-body post">
										<div class="row post-exp">
											<div class="col-sm-1" >
												<img src="<?php if(empty($target_path)){ echo 'images/default.jpeg';}else{echo $target_path;} ?> " width="40" height="40">
											</div>
											<div class="col-sm-9 text-left" >
												<span style="font-size:95%"><b><?php echo $by;?></b>
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
												<span class="post-conclusion">
													<b>Conclusion:</b>
													<?php echo $conclusion; ?>
												</span>
											</div>
										</div>
										<hr class="post-divider">
										<!--<div class="row post-reaction">
											<div class="col-xs-2 reaction like" >
												<?php
											$query_for_check="select exp_id,liked_by from likes where exp_id='$exp_id' and liked_by='$user_email' ";
											$sel_like="select count(exp_id) as total from likes where exp_id='$exp_id'";
											$run_it=mysqli_query($con,$query_for_check);
											$run_like=mysqli_query($con,$sel_like);
											$lik=mysqli_fetch_array($run_like);
											$likes=$lik['total'];
											if(mysqli_num_rows($run_it)==1){
												 ?>
												<span>Unlike </a></span><?php echo $likes; ?>
												<?php }else
												{ ?>
													<span>Like </a></span><?php echo $likes; ?>
												<?php } ?>
											</div>
											<div class="col-xs-2 reaction comment">
												<span class="">Comment </span>
											</div>
											<div class="col-xs-2 reaction comment" >
												<span class="">Share</span>
											</div>
										</div>-->
										
										
									</div>
									<div class="panel-footer">

										<!--<div class="row">
										
											<div class="col-sm-1" >
												<img src="https://pbs.twimg.com/profile_images/712382930824392704/GoxxYQzA_400x400.jpg" 
												width="40" height="40">
											</div>
											<div class="col-sm-9 " >
												
												<textarea name="comment" rows="2" style="width:100%;" placeholder="Type Your Comment Here" ></textarea>
												
											</div>
											<button name="btncomment" class="btn btn-primary comment">Comment</button>
										</div>
										</form>
									
										<hr/>
										<div class="row">
										
											<div class="col-sm-1" >
												<img src="https://pbs.twimg.com/profile_images/712382930824392704/GoxxYQzA_400x400.jpg" 
												width="40" height="40">
											</div>
											<div class="col-sm-9 " >
												<?php echo $exp_id; ?>
											</div>
										</div>-->
										<?php include("php_work/view_comment.php"); ?>
									<!--<iframe style="width: 100%; border: none; display: inline;" src="php_work/comment.php?exp_id=<?php echo $exp_id; ?>&user=<?php echo $user_email;?>&email=<?php echo $email; ?>"></iframe>-->
								</div>
								
							
							</div>
							</div>
							
						</div>
				</div>
					
<?php
}

$update_check="UPDATE notification set checked=1 where (exp_id='$exp_id' and email='$user_email')";
$execute_update_query=mysqli_query($con,$update_check);


 } ?>
