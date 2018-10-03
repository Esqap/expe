<!--<script src="Includes/js/jquery.min.js"></script>
<script src="Includes/js/like.js"></script>-->
<?php

Include_once ("Includes/php/connection.php");
include_once "timestamp.php";
$ago=new Time();


$select_query= "select * from experiences e JOIN users u on e.posted_by=u.email WHERE u.u_id='$id' order by posted_date desc";

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
		
		
						<div class="row"  id="hide_exp<?= $exp_id ?>">
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
					
<?php }  ?>

