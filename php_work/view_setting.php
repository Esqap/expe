<?php


$select_query="select * from users where email='$user_email'";
$run_query=mysqli_query($con,$select_query);


while($rows=mysqli_fetch_array($run_query)){
		$name=$rows['Name'];
		$email=$rows['email'];
		$pass=$rows['pass'];
}

?>



