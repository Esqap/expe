<?php

	include("connection.php");
	include("functions.php");
	if($_POST['task'] == "ques_sess" ){
	    $ques = $_POST['ques'];
	    $cat = $_POST['cat'];
	    $email = $_POST['email'];
	    $desc = $_POST['desc'];
	    
	    $q="insert into user_questions(cat_id,question,description,q_email) values ($cat,'$ques','$desc','$email')";
		$result=mysqli_query($con,$q) or die(mysqli_error($con));
		$last_id = mysqli_insert_id($con);
		echo $last_id;
	}else{
	    $ques = $_POST['ques'];
	    $cat = $_POST['cat'];
	    $email = $_POST['email'];
	    $desc = $_POST['desc'];
	    
	    $q="insert into user_questions(cat_id,question,description,asked_by) values ($cat,'$ques','$desc',$email)";
		$result=mysqli_query($con,$q) or die(mysqli_error($con));
		$last_id = mysqli_insert_id($con);
		echo $last_id;
	}

?>