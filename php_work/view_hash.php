<?php

$pattern="/#+([a-zA-Z0-9_]+)/";
$query="SELECT experience,count(hashtag) as total from experiences group by hashtag order by total desc limit 4";
$run_query=mysqli_query($con,$query);
while($row=mysqli_fetch_array($run_query)){
	$exp=$row['experience'];
	preg_match($pattern,$exp,$str);

    if($str!=null){

?>


					<li class="list-group-item">
						<a href="hashtag.php?tag=<?php echo $str[1] ?>">
						
						<span style="font-size:95%">
							<b>								
								<?php echo $str[0] ?>
							</b>
						</span>
						
						
						
						
						
						</a>
					</li>
					
										
						
											
										
					
<?php 
    }
} 

?>