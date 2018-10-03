<?php
 Include ("../includes/php/header.php");
 ?>
 
 <div class="col-sm-6 col-sm-offset-3">

							<div class="panel panel-default">
								<div class="panel-heading">
									<span class="glyphicon glyphicon-user" style="display:inline-block;"></span>
									<span class="user-about-heading">Trending</span>
								</div>
								<div class="panel-body">
									<ul class="list-group text-center">
 
<?php

$pattern="/#+([a-zA-Z0-9_]+)/";
$query="SELECT experience,count(hashtag) as total from experiences group by hashtag order by total desc";
$run_query=mysqli_query($con,$query);
while($row=mysqli_fetch_array($run_query)){
	$exp=$row['experience'];
	preg_match($pattern,$exp,$str);

    if($str!=null){

?>
									<li class="list-group-item">
											<div class="row">
												
												<div class="col-md-12 " >
												<a href="hashtag.php?tag=<?php echo $str[1] ?>"><?php echo $str[0] ?></a>
												
												</div>
												
											</div>
									</li>

					
					
<?php 
} 
}

?>

									</ul>
								</div>
							</div>
						</div>