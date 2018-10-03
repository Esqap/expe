<?php
ob_start();

DEFINE("DOCROOT2",$_SERVER['DOCUMENT_ROOT']);
Include("Includes/php/header.php");
?>

<!----View More For More Hash ---->
<?php if(isset($_GET['hashtag']) AND $_GET['hashtag']=='more'){?>

<div class="col-sm-6 col-sm-offset-3">

							<div class="panel panel-default">
								<div class="panel-heading">
									<span class="glyphicon glyphicon-user" style="display:inline-block;"></span>
									<span class="user-about-heading">Trending</span>
								</div>
								
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
						
						

											
<!----View More For More People ---->						
<?php }
elseif(isset($_GET['people']) AND $_GET['people']=='more')
{
	
?>

<div class="col-sm-6 col-sm-offset-3">

							<div class="panel panel-default">
								<div class="panel-heading">
									<span class="glyphicon glyphicon-user" style="display:inline-block;"></span>
									<span class="user-about-heading">People You May Follow</span>
								</div>
								
									<ul class="list-group text-center">
									
							
							<!--Random Users Will Be Displayed On Sidebar Suggested Peoples When user is not Logged In -->
								<?php								
									if(!isset($user_id))
									{
									$user_details=show_suggested_random_users($id);
									foreach($user_details as $userdetail)
									{											
								?>
								<li class="list-group-item">
									<div class="row panel_more">
										<div class="col-md-3 image">
											<img src="<?php echo $userdetail['image']; ?>" width="30" height="30">
										</div>
										<div class="col-md-8  col-md-pull-1 text-left text" >
											<a href="experience.php?id=<?php echo $userdetail['u_id']; ?>" >
												<span style="font-size:90%" class="align-bottom">
													<b><?php echo $userdetail['Name']; ?> </b>
												</span>
											</a>
										</div>
										
									</div>
								</li>
								<?php }} ?>
								<!--END -->
								
								<!--If User Logged In And Interest is set Then People With Same Interest Will Be Displayed-->
								<?php 
									if(isset($user_id))
									{
									$user_details=show_sugested_users_related($user_id);
									//Check is used here to check if the function random user was runned then donont run the show unrelated fun below
									$check=$user_details[1];
									foreach($user_details[0] as $userdetail)
									{
								?>	
								<li class="list-group-item panel_more">
									<div class="row">
										<div class="col-md-3  image">
											<img src="<?php echo $userdetail['image']; ?>" width="30" height="30">
										</div>
										<div class="col-md-8  col-md-pull-1 text-left text" >
											<a href="experience.php?id=<?php echo $userdetail['u_id']; ?>" >
												<span style="font-size:90%" class="align-bottom">
													<b><?php echo $userdetail['Name']; ?> </b>
												</span>
											</a>
										</div>
										
									</div>
								</li>									
								<?php }}?>
								<!--END-->
								
                                                                <!--To Show Unrelated Peoples After Showing Related Peoples-->
								<?php 
								if(isset($user_id)  AND $check==0)
								{
								$user_details1=show_suugested_users_unrelated($user_id);
								foreach($user_details1 as $userdetail)
								{	
								?>
								<li class="list-group-item panel_more">
									<div class="row">
										<div class="col-md-3  image">
											<img src="<?php echo $userdetail['image']; ?>" width="30" height="30">
										</div>
										<div class="col-md-8  col-md-pull-1 text-left text" >
											<a href="experience.php?id=<?php echo $userdetail['u_id']; ?>" >
												<span style="font-size:90%" class="align-bottom">
													<b><?php echo $userdetail['Name']; ?> </b>
												</span>
											</a>
										</div>
										
									</div>
								</li>	
								<?php }} ?>
								<!--END-->
							
							
							
							
							</ul>
								
							</div>
							
							
		</div>

<?php }


elseif(isset($_GET['questions']) AND $_GET['questions'])
{
	
?>


<div class="col-sm-6 col-sm-offset-3">

<?php 

$cat_id=$_GET['id'];
$q="select * from questions_cat where cat_id='$cat_id'";
$result_cat=mysqli_query($con,$q);
$row_cat=mysqli_fetch_array($result_cat);

?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<span class="glyphicon glyphicon-user" style="display:inline-block;"></span>
									<span class="user-about-heading">Questions Related to <?php echo $row_cat['cat']; ?></span>
								</div>
							</div>
</div>
<div class="col-sm-6 col-sm-offset-3">
								
								
								<div class="panel-group" id="accor">
								
								
								
									<?php 
										$cat_id=$_GET['id'];
										$q="select * from  where cat_id='$cat_id'";
										
										$q= "select * from user_questions q JOIN user_answers a on q.q_id=a.question_id";
										$result_qa=mysqli_query($con,$q);
										while($row_qa=mysqli_fetch_array($result_qa))
										{
										?>
										
									<div class="panel panel-default">
									
										

										<div class="panel-heading"><a href="#ac<?php echo $row_qa['q_id']; ?>" data-toggle="collapse" data-parent="#accor"> <?php echo "Q: ".$row_qa['question']."?" ; ?></a></div>

										<div class=	"panel-collapse collapse" id="ac<?php echo $row_qa['q_id']; ?>">
											<div class="panel-body ">
												<?php echo "A: ".$row_qa['answer']."?" ; ?>
											</div>
										</div>
										
										
									</div>
									<?php } ?>
								</div>
								
								
							</div>
							
							
		</div>

<?php }

 
else{ header('location:home.php');}	

?>
</body>
</html>