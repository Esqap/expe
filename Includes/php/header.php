<?php  
	session_start();
	DEFINE("DOCROOT",$_SERVER['DOCUMENT_ROOT']);
	require('Includes/php/connection.php');

	if(isset($_SESSION['email']))
	{
		$user_email=$_SESSION['email'];
		$q="select * from users where email='$user_email'";
		$result=mysqli_query($con,$q);
		$row=mysqli_fetch_array($result);
		$name=$row['Name'];
		$user_id=$row['u_id'];
		$veri = $row['expert_verify'];
		$image_path=$row['image'];
		$target_path=$image_path;
		$getId="select u_id from users where email='$user_email'";
		$result=mysqli_query($con,$getId);
		$id=mysqli_fetch_array($result);
		$id=$id['u_id'];
		}
	require('menu_array.php'); //Contain Values For Menu Buttons 
	require('array.php');
	include('Includes/php/funtions.php');// Contain Functon for Differnt Purposes

?>


<html>
<head>
	<?php include('paths.php'); ?>
<title>
	<?php 
		foreach($title as $title_page)
		{
			if(basename($_SERVER['PHP_SELF'])==$title_page['filename']){
				echo $title_page['Title'];
			}
		}
	?>

</title>

</head>

<body class="header">

    <!--Modal For Referal Link Which is in the navbar dropdown-->	
	<div id="mtoggle" class="modal fade" >
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3>ESQAP Referral System</h3>
				</div>
				<div class="modal-body">
					<p style="width:90%; margin:0 auto; padding-top:10px;">
						Refer your friends and receive a gift in your email.<br>
						Whenever someone register on ESQAP.com using your referral link you will receive a gift from us !
					</p>
					<p style="width:90%; margin:0 auto;">Your Referral Link:

						<input id="input1" type="text" value="https://www.esqap.com?ref=<?php echo $id; ?>">
						<button id="btn" class="btn btn-primary">Copy</button>
					</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


	<!---Navbar Start ---->
	<nav class="top-nav navbar navbar-default navbar-fixed-top">
		
		<div class="container" >
			<!----Navbar-Header---->
			<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target="#nav">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
				<a href="#" class="navbar-brand">
					ESQAP
				</a>
				
				<div class="navbar-icons">
					<a href="home.php" title="Home"><span class="glyphicon glyphicon-home icon-nav"></span></a>
                    <a href="experience.php?id=<?php echo $id; ?> " title="Experience"><span class="glyphicon glyphicon-user icon-nav"></span></a>
                    <a href="notify.php"title="Notifications"><span class="glyphicon glyphicon-bell icon-nav"></span></a>
					<a href="questions" title="Discussion"><span class="glyphicon glyphicon-question-sign icon-nav"></span></a>
					<a href="#setting" title="Setting" data-toggle="collapse" ><span class="glyphicon glyphicon-menu-hamburger icon-nav"></span></a>
				</div>
				<div class="collapse navbar-collapse" id="setting">
						<ul class="nav navbar-nav set text-center">
							<li><a href="setting.php">Account Setting</a></li>
							<?php
								if($veri != 1){
							?>
								<li><a href="verify.php">Become an Expert</a></li>
							<?php } ?>
							<li><a href="#mtoggle" data-toggle="modal">Referral Link</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</div>
			</div><!----End Header --->
			
			<div class="collapse navbar-collapse" id="nav">
				<ul class="nav navbar-nav text-center">
				
				<?php
				if(isset($user_email)) //If User is Logged In then Following Buttons in if Condition will be displayed
				{
				
				$a=0;
				foreach($user_login as $links_when_logged_in)
				{
				$a++;
				if($a==5)
				{
					break;
				}
				?>
					
					<li><a href="<?php echo $links_when_logged_in['filename'] ?>"> 
					<?php echo $links_when_logged_in['text']; ?></a></li>

					
				<?php 
				} }
				else //If User is Not Logged In then Following Buttons in else condition will be displayed
				{
				?>
				
				<?php
				
					foreach($user_not_login as $links_when_not_logged_in)
				{
				?>
				
					<li ><a href="<?php echo $links_when_not_logged_in['filename'] ?>"> 
					<?php echo $links_when_not_logged_in['text']; ?></a></li>
					
				<?php 
				} }
				?>
				<form method="get" class="top navbar-form" action="search.php">
				<div class="input-group">
					<input name="search" type="text" class="search form-control" placeholder="Search Peoples" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>">
					<div class="input-group-btn">
					<button class="search btn btn-primary" >Search</button>				
					</div>
				</div>
				</form>		
				</ul>

				<?php if(isset($user_email)){?>
				<div class="dropdown">
					<img  src="<?php echo $target_path?>" width="40" height="40" class="img-responsive img-circle" style="margin-top:4px;" alt="dropdown image" data-toggle="dropdown">
					
					<div class="list-group dropdown-menu" >
						<a href="setting.php" class="list-group-item " ><span class="glyphicon glyphicon-cog" style="margin-right:7px; font-size:13px;"></span>Account Setting</a>
						<!--<a href="#" class="list-group-item "> <span class="glyphicon glyphicon-user" style="margin-right:7px; font-size:13px;"></span> Verify Account</a>-->
                        <?php
						if($veri != 1){
						?>
						<a href="verify_user.php" class="list-group-item "> <span class="glyphicon glyphicon-user" style="margin-right:7px; font-size:13px;"></span> Become an Expert</a>
						<?php } ?>
						<a href="feedback.php" class="list-group-item  "><span class="glyphicon glyphicon-log-out" style="margin-right:7px; font-size:13px;"></span> Feedback</a>
						<a href="#mtoggle" data-toggle="modal" class="list-group-item ">
							<span class="glyphicon glyphicon-log-out" style="margin-right:7px; font-size:13px;"></span> 
							Referral Link
						</a>
						<a href="logout.php" class="list-group-item  "><span class="glyphicon glyphicon-log-out" style="margin-right:7px; font-size:13px;"></span> Log Out</a>
						

					</div>
				</div>
				<?php } ?>
				
			</div>	
				
</div>			
			
			</div>

			
		</div><!----End Container --->
	</nav>

	<?php 
	if(isset($_GET['noti'])){
		$update_query="UPDATE users set notify='0' where email='$user_email'";
		$run=mysqli_query($con,$update_query);
	}


	require('Includes/php/RBlockJSPaths.Php');
	
	
	?>


<!--Instiniate Clipboard Object for Above Library Use-->
<script type="text/javascript">

	function copy() {
  var copyText = document.querySelector("#input1");
  copyText.select();
  document.execCommand("copy");
}

document.querySelector("#btn").addEventListener("click", copy);


</script>

