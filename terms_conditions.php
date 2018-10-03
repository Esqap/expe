
<?php include_once('Includes/php/connection.php'); ?>
<?php include_once('Includes/php/funtions.php'); ?>
<script src="./Includes/js/jquery.min.js"></script>
<script src="./Includes/js/register.js?t=<?php echo time(); ?>"></script>
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
					<h2 class="logo-heading"> Latest Experience</h2>
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
			<div class="row">
				<div  class="col-md-12" >

				 <h2>TERMS AND CONIDTION</h2>

				 <ol>
				 	<li>You will not upload viruses or other malicious code.</li>
				 	<li>You will not use ESQAP to do anything unlawful, misleading, malicious, or discriminatory.</br></li>
					<li>You will not facilitate or encourage any violations of this Statement or our policies.</li>
					 <li>You will not post content that: is hate speech, threatening, or pornographic; incites violence; or contains nudity or graphic or gratuitous violence.</li>
				</ol>

					<h3>I.Registration and account security</h3>
				<ol>
					<li>You will not creat more then one personal account.</li>
					<li>You will not share your password.</li>
					<li>You will not share your Experience  if you are under 13</li>
					<li>You will keep your contact information accurate and up-to-date.</li>
					<li>If you use this site, you are responsible for maintaining the confidentiality of your account and password and for restricting access to your computer, and you agree to accept responsibility for all activities that occur under your account or password.</li>
					<li>You will not share spam experience</li>
				</ol>


					<h3>II.Protecting other peoples Rights</h3>
				<ol>

					<li>You will not post content or take any action on latestexperience that infringes or violates someone else's rights or otherwise violates the law.</li>
					<li>You will not post anyone's identification documents, personally identifiable information, or sensitive financial information on latest experience</li>
					<li>If we remove your content for infringing someone else's copyright, and you believe we removed it by mistake, we will provide you with an opportunity to appeal.</li>
				</ol>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
<?php
	//Login

	if(isset($_POST['Login'])){
		include("php_work/User_login.php");
	}
	require('Includes/php/footer.php');
?>

