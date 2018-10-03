
<?php include('Includes/php/connection.php'); ?>
<?php include('Includes/php/funtions.php'); ?>
<?php session_start(); ?>


<?php

/*User Will Be Redirected to HomePage If His Cookies Has Been Already Created Means If a User Has Checked Remember
me Option Then He Will not be prompt to login again instead he will be redirected to Main Homepage..Same Scenario Also 
Happens In Faceboook ! */ 

if(isset($_COOKIE['email']) AND isset($_COOKIE['pass']) )
{
$_SESSION['email']=$_COOKIE['email'];
header('location:home.php');

}

//User Will Be Redirected To Main HomePage If His Session is active 
if(isset($_SESSION['email']))
{
	header('location:home.php');
	
}

//If User Is Registered Using Referral Link
if(isset($_GET['ref'])){	
	$referrer_id=$_GET["ref"];
}
?>


<html>
<head>
<?php

include('Includes/php/paths.php');
?>

<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<title>ESQAP</title>


</head>

<body id="index">

	<!--Header Start-->
	
	<header>
		<div class="container" class="con">
		<div class="row">
			<!--Logo Portion-->
				<div class="col-md-4 logo" >
					<h2 class="logo-heading"> ESQAP</h2>
				</div>
				
				<!--Login Portion -->
				<div class="col-md-8 login" >
					<form class="form-inline" method="POST" action="index.php">
						<div class="form-group ">
							<input type="text" class="form-control" placeholder="Your Email" name="L_email"/>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Your Password" name="L_pass"/>
						</div>
						<div class="form-group remember-group">
							<input type="checkbox"  class="form-control remember-input" value="1" name="remember"/> 
							Remember
						</div>
						<button class="btn btn-primary button" name="Login">Login</button>
						<div class="clear"></div>
					</form>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</header>
	
	<!--Section Start-->
		
	<section >
		<div class="container">
		    <div id="register_note"></div>
			<div class="row">
				<div class="col-md-6 right-text" >
				
                                    <h2>Welcome to ESQAP</h2>
                                    <p>Connecting peoples to experts, So that they can learn from their experience.</p>
                                    <p class="browse">Browse and Explore Latest Experiences 
                                        <a href="experiences.php">
                                            <button class="btn btn-danger btn-sm">
                                                 Browse
                                            </button>
                                        </a>
                                    </p>
                                    <br>
                                    <img src="connecting.png" class="img-responsive" width="400">
				
				
				</div>
				<div class="col-md-6 sign-up " >
					<h2 class="text-center">Sign Up It's Free ! </h2>
						<div class="form-group">
							<div class="col-md-10 col-md-offset-1 signup-inp" >
								<div class="input-group input-group-lg">
									<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
									<input type="text" id="r_username" class="form-control" placeholder="Full Name" name="username" />
								</div>
								<div id="empty_uname"></div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-md-10 col-md-offset-1 signup-inp">
								<div class="input-group input-group-lg">
									<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
									<input type="email" id="r_email" class="form-control" placeholder="Email or Phone Number" name="email" />
								</div>
								<div id="empty_email"></div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-md-10 col-md-offset-1 signup-inp" style="background:oange">
								<div class="input-group input-group-lg">
									<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
									<input type="password" id="r_pass" class="form-control" placeholder="Password" name="pass" />
								</div>
								<div id="empty_pass"></div>
							</div>
						</div>
						
						<!--<div class="form-group">-->
						<!--	<div class="col-md-10 col-md-offset-1 signup-inp">-->
      <!--                          <select id="occupation"  class="form-control" style="display:inline-block; width:100%; border-none; box-shadow:none;">-->
    		<!--						<option value="null">Occupation</option>-->
    		<!--						<option value="Student">Student</option>-->
    		<!--						<option value="Teacher">Teacher</option>-->
    		<!--						<option value="IT Professional">IT Professional</option>-->
						<!--	    </select>-->
						<!--	    <div id="empty_occu"></div>-->
						<!--	</div>-->
						<!--</div>-->
						
						<input type="hidden" id="referrer_id" value="<?php echo $referrer_id; ?>" class="form-control" />
						
						<div class="form-group">
							<div class="  text-center">
								<button class="btn btn-primary btn-lg" id="btn_register">Sign Up</button>
							</div>
						</div>
						
				</div>
			</div>
		</div>
		
	</section>
	
	
<!--<script src="./Includes/js/jquery.min.js"></script>-->
<script src="Includes/js/register.js?t=<?php echo time(); ?>"></script>

</body>

</html>
<?php



//Login

if(isset($_POST['Login'])){
	include("php_work/User_login.php");
}

require('Includes/php/footer.php');

?>