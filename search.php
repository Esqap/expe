<?php 
ob_start();


include("Includes/php/header.php") ?>

<html>
<body>
<div class="col-sm-6 col-sm-offset-3">

							<div class="panel panel-default">
								<div class="panel-heading">
									<span class="glyphicon glyphicon-user" style="display:inline-block;"></span>
									<span class="user-about-heading">Your Search Results</span>
								</div>
								
									<ul class="list-group text-center">

<?php

if(empty($_GET['search']))
{
	echo "<script>alert('Please Type to Search');</script>";
	header('location:home.php');
}
if(isset($_GET['search']) AND !empty($_GET['search']))
{
$search=validateString($_GET['search']);
$search_query="SELECT * from users where Name like '%".$search."%'";
$run_query=mysqli_query($con,$search_query);
if(mysqli_num_rows($run_query)<=0)
{
	echo "<br>No Results to Show";
}
while($row=mysqli_fetch_array($run_query)){
    $uid=$row['u_id'];
    $uname=$row['Name'];
	$image_path=$row['image'];

?>



										<li class="list-group-item ">
											<div class="row panel_more">
												<div class="col-md-3 ">
													<img src="<?php if(empty($userdetail['image'])){echo "images/default.jpeg";}
													else{echo $image_path;}?>" width="30" height="30">
												</div>
												<div class="col-md-8  col-md-pull-1 text-left" >
												
													<a href="experience.php?id=<?php echo $uid; ?>" >
													<span style="font-size:90%" class="align-bottom"><b><?php echo $uname; ?> </b>
													
													</a>
													</span>
												</div>
												
											</div>
										</li>
							
							
							
							
							

<?php
}}
?>

</ul>
								
							</div>
							
							
</div>

</html>
</body>