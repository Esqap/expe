
<?php include("veiw/header.php"); ?>

<!--Main Container Which Close in Sidebar.php -->
<div class="container">
	<div class="row">

		<!--Column Of Notification-->
		<div class="col-md-7">
			<!--Total Answer Of the Question-->
					<div class="page-header" style="padding-bottom:0; margin-bottom: 0;">		
						<h4>Notifications</h4>
					</div>


<?php
	//Query To get Notfications For the Logged In User
	$q="select * from notify_discuss_user u JOIN notify_discuss n on u.Notify_id=n.Notify_Id where u.for_user_id='$id' order by u.Notify_USER_Id desc";


	$result_notifications=mysqli_query($con,$q);

	while($row=mysqli_fetch_array($result_notifications)){
		
		$notify_id=$row['Notify_Id'];
		$notification=$row['Notification'];
		$type=$row['Type'];
		$q_id=$row['Q_Id'];
		$ans_id=$row['Ans_Id'];
		$type=$row['Type'];
		$is_checked=$row['Is_Checked'];
		if($type=="q_answered"){
			if($is_checked=="Yes"){
?>
	
			
		<a style="text-decoration: none; color:black;" href="<?php echo 'question.php?qid='.$q_id.'&notify_id='.$notify_id.'#'.$ans_id; ?>">
			<div class="page-header"  style="padding-top:15px; margin:0;" >	
	<?php } else { ?>

		<a style="text-decoration: none; color:black;" href="<?php echo 'Question.php?qid='.$q_id.'&notify_id='.$notify_id.'#'.$ans_id; ?>">
			<div class="page-header" style="background:rgb(230,230,230); padding-top:15px; margin:0;" >


		<a style="text-decoration: none; color:black;" href="<?php echo 'question.php?qid='.$q_id.'&notify_id='.$notify_id.'#'.$ans_id; ?>">
	<?php }?>


			<?php echo  $notification; ?>
		</div>
	</a>

<?php } } 
if(mysqli_num_rows($result_notifications)==0){
?>
		<div class="page-header">
			No Notifications
		</div>
<?php } ?>
		</div>
<?php include("veiw/sidebar.php"); ?>


