<?php

	function trending_experiences(){

		global $con;
		$q="select * from users u RIGHT JOIN experiences e on e.posted_by=u.email LEFT JOIN comments c on e.exp_id=c.exp_id LEFT JOIN likes l on e.exp_id=l.exp_id GROUP BY e.exp_id having (l.like_id IS NOT NULL AND COUNT(l.like_id)>=5)  OR (c.comment_id IS NOT NULL AND COUNT(c.comment_id)>=3) ORDER BY (COUNT(e.exp_id)) DESC";

		$result=mysqli_query($con,$q);
		return $result;
	}

?>