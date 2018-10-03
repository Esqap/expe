
<nav class="top-nav navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header"> <!----Navbar-Header Start---->
			<button class="navbar-toggle" data-toggle="collapse" data-target="#nav">
				
				<?php for($a=0; $a<3; $a++){?>
				<span class="icon-bar"></span>
				<?php } ?>
				
			</button>
			<a href="#" class="navbar-brand">ESQAP Discussion</a>
			
			<div class="navbar-icons">
				<?php if(isset($_SESSION['email'])){ ?>
					<a href="../home.php"><span style="font-size:150%;" class="glyphicon glyphicon-home icon-nav"></span></a>
					<a href="browse.php" title="Browse Question"><span style="font-size:150%;"  class="glyphicon glyphicon-folder-open icon-nav"></span></a>
					<a href="ask.php" title="Ask Question"><span style="font-size:150%;" class="glyphicon glyphicon-question-sign icon-nav"></span></a>
					<a href="notify.php">
						<i alt="Notification" title="Notification"style="font-size:1.8em;  margin-right: 10px;" class="fas fa-bell"aria-hidden="true">
						</i>
					</a>

					<a href="#setting" data-toggle="collapse" ><span style="font-size:150%;" class="glyphicon glyphicon-menu-hamburger icon-nav"></span></a>
					
				<?php } else {?>
					<a href="browse.php" title="Browse Question"><span style="font-size:150%;"  class="glyphicon glyphicon-folder-open icon-nav not"></span></a>
					<a href="../index.php" title="Log In"><span style="font-size:150%;"  class="glyphicon glyphicon-log-in icon-nav not"></span></a>
					<a href="../index.php" title="Sign Up"><span style="font-size:150%;"  class="glyphicon glyphicon-user icon-nav not"></span></a>


				<?php } ?>
			</div>
			<div class="collapse navbar-collapse" id="setting">
				<ul class="nav navbar-nav set text-center">
					<li><a href="setting.php">Your Questions </a></li>
					<li><a href="setting.php">Your Answers</a></li>
					<li><a href="setting.php">Account Setting</a></li>
					<li><a href="#">Verify</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>

			</div>
		</div><!----End Header --->
		<div class="collapse navbar-collapse" id="nav">

			<!--Showing Navbar Menus -->
			<ul class="nav navbar-nav navbar-menu text-center">
				<?php 
					if(isset($email))
					{
						foreach($nav_menu_texts['Logged_in'] as $key=>$link_text)
						{
				?>
					<li><a href="<?php echo $link_text; ?>"><?php echo $key; ?></a></li>
				<?php	
						}
					}
					else
					{
						foreach($nav_menu_texts['Logged_out'] as $key=>$link_text)
						{
				?>
					<li><a href="<?php echo $link_text; ?>"><?php echo $key; ?></a></li>
				<?php			
						}
					}	
				?>
			</ul>
			<div class="navbar-side">


				<form method="get" class="navbar-form" action="browse.php">
					<div class="input-group">
						<input name="search" type="text" class="search form-control input-sm" placeholder="Search Questions">
						<div class="input-group-btn">
						<button class="search btn btn-danger btn-sm" >Search</button>				
						</div>
					</div>
					<div class="input-group">
					</div>
				</form>
				<a href="notify.php">
					<i alt="Notification" title="Notification"style="font-size:1.8em; float:left; display: block;padding-right:10px; margin-top:12px;" class="fas fa-bell" aria-hidden="true">
					</i>
				</a>


				<!--Show Drop Down Only When User is Logged In-->
				<?php if(isset($email)){?>
					<div class="dropdown" >
						<img src="../<?php echo $image; ?>" width="37" height="37" class="img-circle" data-toggle="dropdown">
						<div class="list-group dropdown-menu" >
							<a class="list-group-item" href="setting.php"><span class="glyphicon glyphicon-log-out"></span> Your Questions</a>
							<a class="list-group-item" href="setting.php"><span class="glyphicon glyphicon-log-out"></span> Your Answers</a>
							<a href="setting.php" class="list-group-item"><span class="glyphicon glyphicon-cog"></span>Account Setting</a>
							<a href="#" class="list-group-item"> <span class="glyphicon glyphicon-user" ></span> Verify Account</a>
							<a href="logout" class="list-group-item"><span class="glyphicon glyphicon-log-out"></span> Log Out</a>
						</div>
					</div>
				<?php } ?>

			</div>
		</div>			
	</div><!----End Container --->
</nav>

	
	