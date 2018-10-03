<?php 
ob_start();

require('Includes/php/header.php'); ?>



<?php


if(!isset($user_email))
{
	header('location:https://www.latestexperience.com');
	die();
}


$sel_verify="SELECT verified from users where email='$user_email'";
	$run_verify_query=mysqli_query($con,$sel_verify);
	$row=mysqli_fetch_array($run_verify_query);
	$verify=$row['verified'];
	if($verify!=1){
		echo "Your account is not verified. Please go to your mail and verify your account.";
	}else{ 

require('php_work/view_setting.php'); 

if(isset($_POST['update'])){

require("php_work/update_setting.php");
}

?>

<!---Filal ke liye yaha background colr whit diya kuch css me changing krne pare ge wo bad me kaun ga -->

	<section style="background:white; color:black">
        <div class="container">
            <div class="row">
                
				<!----Left Sidebars Start -->
				<?php include("Includes/php/left-sidebars.php"); ?>
				
				<!----Left Sidebars End -->

                <div class="col-sm-6">


                    <div class="panel panel-default" >

                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-user" style="display:inline-block;"></span>
                            <span class="user-about-heading ">Account Setting</span>
                        </div>
                        <div class="panel-body">

                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" 
							class="form-horizontal about-form" enctype="multipart/form-data">

							
									<div class="form-group">
										<label class="control-label col-xs-4" style="background:gry;">Name: </label>
										<div class="col-xs-6" style="background:ed;">
											<input type="text" name="a_name" class="form-control " value="<?php echo $name ?>">
											
										</div>
										
										

									</div>
								
							
									
								
								<div class="form-group">
                                    <label class="control-label col-xs-4" style="background:gry;">Email: </label>
                                    <div class="col-xs-6" style="background:ed;">
                                        <input type="text" name="a_email" class="form-control " value="<?php echo $email ?>">
                                    </div>
									
									

                                </div>
							
								
								<div class="form-group">
                                    <label class="control-label col-xs-4" style="background:gry;">Password: </label>
                                    <div class="col-xs-6" style="background:ed;">
                                       <input type="password" name="a_pass" class="form-control " value="<?php echo $pass ?>">
                                    </div>
									
									

                                </div>
								
								<div class="form-group">
                                    <label class="control-label col-xs-4" style="background:gry;">Change Picture: </label>
                                    <div class="col-xs-6" style="background:ed;">
								
											<input type="file" name="profile_image" class="form-control " >
										
                                    </div>
									
									

                                </div>
								
								

                                <div class="form-group">
							<div class="  text-center">
									<button class="btn btn-primary btn-lg" name="update">Update</button>
								
							</div>
						</div> 

                            </form>
                        </div>
                    </div>


                </div>


         <!----Right Sidebars Start -->
				<?php include("Includes/php/right-sidebars.php"); ?>
		<!----Right Sidebars End -->
				
		 </div>      
        </div>
    </section>

    <?php } ?>

</body>

</html>

