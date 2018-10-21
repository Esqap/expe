<?php 
ob_start();
require('Includes/php/header.php');  
if(!isset($user_email))
{
    header('location:index.php');
    die();
}
$sel_verify="SELECT verified from users where email='$user_email'";
	$run_verify_query=mysqli_query($con,$sel_verify);
	$row=mysqli_fetch_array($run_verify_query);
	$verify=$row['verified'];
	if($verify!=1){
		echo "<div class='alert alert-danger'>Your account is not verified. Please go to your mail and verify your account</div>";
	}else{ 
if(isset($user_email))
{
    $q="select * from users where email='$user_email' AND expert_verify=0";
    $res=mysqli_query($con,$q);
    if(mysqli_num_rows($res)>0){
?>

    <!---Become an Expert Banner -->
    <div class="container">
        <div class="panel panel-default text-center">
            <div class="jumbotron text-center jumbo" style="background: white;">
                <h3 class="display-3" style="font-family: 'Montserrat', sans-serif">Become an Expert</h3>
                <div class="lead">Become a expert and share your experiences around the globe</div>
                <a href="verify_user.php">
                    <button class="btn btn-primary btn-lg button ">Apply</button>
                </a>
            </div>
        </div>
    </div>
    <!---Become an Expert Banner Closed -->

<?php } ?>
    <section > 
        <div class="container">
            <div class="row">
                <!----Left Sidebars Start -->
                <?php include("Includes/php/left-sidebars.php"); ?>
                <!----Left Sidebars End -->
                
                <div class="col-sm-6">
				
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
                    <div id="post_append"></div>
                    <?php include("php_work/view_home_exp.php"); ?>	
                </div>
                
                <!----Right Sidebars Start -->
                <?php include("Includes/php/right-sidebars.php"); ?>
                <!----Right Sidebars End -->
            </div>
        </div>
    </section>
    <input type="hidden" id="p_useremail" value="<?php echo $user_email; ?>">
    
    <?php 

    } else { header('location:index.php'); }

    }
     ?>

</body>
</html>