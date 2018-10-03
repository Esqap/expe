<?php

	//Last Inserted Answer Id
	$last_ans_id=$last_id;

	//Notfication
	$notify=$name." Answered Your Question";

	//Insert Into notify_Discuss with notfication that [Logined User Name] Answered Your Question, Answer Id.
	$q="insert into notify_Discuss(Notification,Q_Id,Ans_Id) values ('$notify','$q_id','$last_ans_id')";

	//Run Query
	$result_notify=mysqli_query($con,$q);

	//If Success
	if($result_notify){

		//Last Inserted Notification Id
		$last_notify_id = mysqli_insert_id($con);

		//Insert Into Notify Discuss_User With the Last Notfication Id and User Who Asked It.
		$q="insert into notify_Discuss_user(Notify_Id,For_User_Id) values ('$last_notify_id','$asked_by')";

		//Run Query
		$result_discuss_notify=mysqli_query($con,$q);

	}
	

?>