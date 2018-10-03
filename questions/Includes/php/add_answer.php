<?php
	
	include("connection.php");
	include("functions.php");
	$ans=mysqli_real_escape_string($con,$_POST['ans']);
	$q_id=$_POST['q_id'];
	$u_id=$_POST['u_id'];
	$name=$_POST['name'];
	
	//Query To Insert Answer Into DB
	$q="insert into user_answers(question_id,answer,ans_by) values ('$q_id','$ans','$u_id')";
	$result=mysqli_query($con,$q) or die(mysqli_error($con));
	$last_id = mysqli_insert_id($con);

 	//Get User_Id of Person Who Asked the Question, This User Id will be Compared to Session User Id, If Both are Same then Do Not Generate Notification
	$q="select asked_by from user_questions where q_id='$q_id'";
	$result_asked_id=mysqli_query($con,$q) or die(mysqli_error($con));
	$row=mysqli_fetch_array($result_asked_id);
	$asked_by=$row['asked_by'];


	//If Answer Insertion is Succesful and Asked id and User Id are not same then Generate a Notification
	if($result AND ($asked_by!=$u_id)){

		//Generate a Notfication for the Question Asking User that Someone Has Answered Your Question
		include('generate_notification.php');
	}
	
	//Query to Reteive the Latest Answer From DB to Display It
	$q="select * from user_answers a JOIN users u on a.ans_by=u.u_id where a.answer_id='$last_id'";
	$result=mysqli_query($con,$q) or die(mysqli_error($con));
	$row=mysqli_fetch_array($result);


?>

	<!--Answered By-->
	<p style="font-size:90%; font-family: 'Montserrat', sans-serif;">
		Answerd By <?php echo $row['Name']; ?>
	</p>
	
	<!--Answer Description-->
	<p style="font-family: 'Roboto', sans-serif;">
		<?php echo $row['answer']; ?>
	</p>
	<hr>
	
