<?php session_start(); ?>
<html>
<body>


<head>

<?php


// $con=mysqli_connect("localhost","root","","expe");
include('Includes/php/paths.php');

?>

</head>
<?php 

include('Includes/php/funtions.php');
include('Includes/php/connection.php');

?>


<?php


$exp_id=(int) validateString($_GET['exp_id']);
$user_email=$_GET['user'];

if(isset($_SESSION['email']))
{


$email=validateString($_GET['email']);
$q="select image from users where email='$user_email'";
$result=mysqli_query($con,$q);
$result=mysqli_fetch_assoc($result);
$user_target_path=$result['image'];
?>
<div class="container">
    <div class="row post-reaction">
									
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
										
												<span id="unlike" >Unlike</span>
												<span id="like" style="display:none" >Like</span>
												<span class=""><div id="show"><?php echo $likes; ?></div></span>

												<?php 
												}else
												{ 
												?>
												
													<span id="like" >Like</span>
													<span id="unlike" style="display:none" >Unlike</span>
												<span class=""><div id="show"><?php echo $likes; ?></div></span>
											
												<?php } ?>
												</div>
											
											<div class="col-xs-2 reaction comment">
												<span class="">Comment </span>
											</div>
											

											
	</div>
</div>
<hr>
<?php } ?>
<div class="container">
										
									<?php if(isset($_SESSION['email'])){?>
										<div class="row comment-box">
											<div class="col-xs-1" >
												<img src="<?php echo $user_target_path; ?> " width="40" height="40">
											</div>
											<div class="col-xs-10 txtarea"  style="padding-left:15px;">
												<textarea style="width:100%; resize:none;" rows="3" name="comments" id="comments" cols="58" placeholder="Type Your Comment Here"></textarea>		
											</div>
										</div>
										<div class="row comment-btn">
											<div class="col-xs-1" ></div>
											<div class="col-xs-3 col-xs-push-8" style="left:-1px;">
												<button name="btncomment" id="btncomment" class="btn btn-primary ">Comment</button>
											</div>
										</div>

										<div id="append">
									
										</div>
											
									<?php } ?>
																	
									<?php 
										$comment_query="select * from comments where exp_id='$exp_id' order by dated desc";
										$run_comment_query=mysqli_query($con,$comment_query);
										
											while($rows=mysqli_fetch_array($run_comment_query)){
												$comment=$rows['comment'];
												$by=$rows['comment_by'];
											$q="select * from users where email='$by'";
											
											$result=mysqli_query($con,$q);
											$result=mysqli_fetch_assoc($result);
											$target_path=$result['image'];
											$comment_by_name=$result['Name'];
											$comment_by_id=$result['u_id'];
									?>
										
										<hr/>
									
										<div class="row">
										
											<div class="col-xs-1" >
												<img src="<?php echo "../".$target_path; ?> " width="30" height="30">
											</div>
											<div class="col-xs-10 text-left comment-by"  >
											<span style="font-size:95%"><b><a href="experience.php?id=<?php echo $comment_by_id;?>"><?php echo $comment_by_name;?></b></a>

												
												<?php echo $comment; ?>
											</div>
										
										
										</div>
										

										<?php
											} 
											
										
										
										?>
										<hr/>
										<!--<div id="append" class="row">
										</div>-->
									
										
										
									<?php if(isset($_SESSION['email'])){?>
										 <input type="hidden" id="expid" value="<?php echo $exp_id;?>">
										 <input type="hidden" id="useremail" value="<?php echo $user_email;?>">
										 <input type="hidden" id="email" value="<?php echo $email;?>">
										
									<?php } ?>
									

</div>

</body>
</html>


<script>
$(document).ready(function() {

$('#like').click(function() {
	var expid = $('#expid').val();
	var lemail = $('#email').val();
	var user_email = $('#useremail').val();

	$.post("liked.php", {
				task: "like",
				exp_id: expid,
				email: lemail,
				useremail: user_email
			},
			function(data) {
				like(jQuery.parseJSON(data));
			}

		);
});

$('#unlike').click(function() {
	var expid = $('#expid').val();
	var email = $('#email').val();
	var user_email = $('#useremail').val();

	$.post("unlike.php", {
				task: "unlike",
				exp_id: expid,
				email: email,
				useremail: user_email
			},
			function(data) {
				unlike(jQuery.parseJSON(data));
			}

		);
});

function like(data){
	$('#like').css('display','none');
	$('#unlike').css('display','block');
	$('#show').html(data.likes);
}

function unlike(data){
	$('#like').css('display','block');
	$('#unlike').css('display','none');
	$('#show').html(data.likes);
}

});

</script>

<script src="insertcomm.js"></script>

