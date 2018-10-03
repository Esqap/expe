<?php  
ob_start();


require('Includes/php/header.php'); ?>

<html>
<body>
<head>


</head>



<?php

    
	$id=(int) validateString($_GET['id']);
	$name_email="select * from users where u_id=$id";
	$result=mysqli_query($con, $name_email);
	if(mysqli_num_rows($result)<1 OR !isset($id))
	{

	    
	    header("location:home.php");
	    
	}
	
	
	$result=mysqli_fetch_array($result);
	$name=$result['Name'];
	$email=$result['email'];
	$verifed_check = $result['expert_verify'];
	$image_path=$result['image'];
	$target_path=$image_path;
	
	
	
?>

	<!---Filal ke liye yaha background colr whit diya kuch css me changing krne pare ge wo bad me kaun ga -->

	<section style="background:white; color:black">
	 <div class="container">
		<?php
			if(isset($_SESSION['noti_expert_verify'])){
		?>
		<div class="row">
			<div class="alert alert-success">
				<strong>Success!</strong> <?= $_SESSION['noti_expert_verify'] ?>
			</div>
		</div>
			<?php unset($_SESSION['noti_expert_verify']); } ?>
	</div>
		<div class="container">
			<div class="row">
			
			
			
				<!----Left Sidebars Start -->
				<?php include("Includes/php/left-sidebars.php"); ?>
				
				<!----Left Sidebars End -->
				
				<div class="col-sm-6">
                    
					<?php if(isset($user_email) AND $id==$user_id){ ?>
					<div class="post-box" style="margin-bottom:20px;">
                        <textarea id="p_exp" name="experience" style="  border-bottom: none; border-radius: 0; height:100px;" class="form-control" placeholder="What's Your Experience?"></textarea>
                        <div style="background:white; border:1px solid rgb(200,200,200); padding:10px; ">
							<select id="p_related" name="related" class="form-control" style="display:inline-block; width:35%; border-none; box-shadow:none;">
								<?php 
                                    $q="select * from questions_cat";
                                    $res=mysqli_query($con,$q);
                                    while($row=mysqli_fetch_array($res)){
                                ?>
								    <option><?php echo $row['cat']; ?></option>
                                <?php } ?>
							</select>
							<button style="float:right;" value="comment" id="p_btn" class="btn btn-primary btn-sm">Express</button>
                            <span class="clear" style="clear:  both; display: block;"></span>
                         </div>
                    </div>
					<?php } ?>
                    <div id="post_append"></div>
                    <?php include("php_work/view_exp.php"); ?>	
                </div>
				
					
				
			
		
				<!----Right Sidebars Start -->
				<?php include("Includes/php/right-sidebars.php"); ?>
				<!----Right Sidebars End -->
			</div>
		</div>
	</section>


<input type="hidden" id="p_useremail" value="<?php echo $user_email; ?>">
<input type="hidden" id="p_email" value="<?php echo $email; ?>">
</body>

</html>