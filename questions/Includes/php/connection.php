<?php

if( preg_match ("/connection.php/", $_SERVER['PHP_SELF']) )
{
	
	die("Access Denied, You Are Not Authorized to Access This Page");
	
}


define("HOST","localhost");
define("PASS","xt5a16LQw3");
define("DB","esqapcom_esqap");
define("USER","esqapcom_root");

$con=mysqli_connect(HOST,USER,PASS);
$database=mysqli_select_db($con,DB);

if(!$con)
{
	die("Connection Failed <br>".mysqli_connect_error());
}

if(!$database)
{
	die("Database Connection Failed<br>".mysqli_error($con));
}

?>