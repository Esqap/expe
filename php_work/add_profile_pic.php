<?php


$file=$_FILES['profile_image'];
	$filename=$file['name'];
	
	move_uploaded_file($file['tmp_name'],"D:/wamp64/www/photos/$filename");
?>



