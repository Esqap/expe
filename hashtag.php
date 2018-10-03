<?php
	$tag=$_GET['tag'];
	Include ("Includes/php/header.php");
	Include("timestamp.php");
	$ago=new Time();
	if(!isset($tag) )
	{
?>
		<script>
			location.href="home.php";
		</script>
<?php
    exit();
}

	$query_hash= "select * from experiences e JOIN users u on e.posted_by=u.email WHERE e.experience like '%#".$tag."%'";
	$run_query_hash=mysqli_query($con,$query_hash);
	if(mysqli_num_rows($run_query_hash)<1)
	{
?>
		<script>
			location.href="home.php";
		</script>
<?php
    exit();
}
?>
		<div class="container">
			<div class="row">
				<!----Left Sidebars Start -->
				<?php include("Includes/php/left-sidebars.php"); ?>
				<!----Left Sidebars End -->	
				<div class="col-sm-6">
					<!--Selected Hash tag-->
					<h4 class="box-heading" style="padding:0; margin:0; padding-bottom:15px;">
						<span>Hash Tag: #<?php echo $tag; ?></span>
					</h4>
					
					<!--Loop To Display Experience Containing the Selected Hash tag -->
					<?php
						while($row_hash=mysqli_fetch_array($run_query_hash)){
						$exp_id=$row_hash['exp_id'];
						$exp_hash=$row_hash['experience'];
						$by=$row_hash['Name'];
						$by_id=$row_hash['u_id'];
						$date=$row_hash['posted_date'];
						$related=$row_hash['related_to'];
						$conclusion=$row_hash['conclusion'];
						$posted=$ago->convertToAgo($date);
						$email=$row_hash['posted_by'];
						$target_path=$row_hash['image'];
						$exp_hash=preg_replace("/#+[a-zA-Z0-9_]+/","<a href=''>$0</a>",$exp_hash). "<br/>";
					?>
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
							</div>
							<hr class="post-divider">
							<div class="row post-exp exp">
								<div class="col-xs-12" style="pa">
									<span class="post-status">
										<?php echo $exp_hash; ?>
									</span>
								</div>
							</div>
							<hr class="post-divider">
						</div>
						<div class="panel-footer view_exp_post_box_footer">
							<?php include("php_work/view_comment.php"); ?>									
						</div>
					</div>
					<?php } ?><!--Loop Close -->
				</div> 
				<!----Right Sidebars Start -->
				<?php include("Includes/php/right-sidebars.php"); ?>
				<!----Right Sidebars End -->
			</div>
		</div>