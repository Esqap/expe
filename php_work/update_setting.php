<?php

$name=$_POST['a_name'];
$email=$_POST['a_email'];
$pass=$_POST['a_pass'];
$file=$_FILES['profile_image'];
$filename=$file['name'];
$filetype=$file['type'];
$filesize=$file['size'];

if((!empty($_FILES["profile_image"])) && ($_FILES['profile_image']['error'] == 0)) 
{

$ext = substr($filename, strrpos($filename, '.') + 1);
if( ($filetype=="image/jpg" OR  $filetype=="image/jpeg") AND ($ext=="jpg" OR $ext=="jpeg") )
{
	$filetype=".jpg";
}
elseif($filetype=="image/png"  AND $ext=="png" )
{
	$filetype=".png";
}

elseif($filetype=="image/gif" AND $ext=="gif")
{
	$filetype=".gif";
}
else
{
	echo"<script>alert('Picture Format Not Supported')</script>";
	die(header('location:home.php'));
	
}




$target_path="images/".$name.$filetype;
	

move_uploaded_file($file['tmp_name'],$target_path);
}

mysqli_query($con, "UPDATE users SET name='$name',image='$target_path',email='$email', pass='$pass' where email='$user_email'" );

?>



