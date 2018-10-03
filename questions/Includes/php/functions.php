<?php
	
	//Function To Display The Questions After Processing the Query
	function display_questions(){
		global $con,$q;
		$result_questions=mysqli_query($con,$q);
		
		while($row=mysqli_fetch_array($result_questions))
		{
			$email = $row['email'];
			$name=$row['Name'];
			$question=$row['question'];
			$description=$row['description'];
			//To Get Only Limited Description Text of Question
			$description=substr($description,0,200);
			$question_id=$row['q_id'];
			
			//Query to Count How Many Answers Of The Question.
			$q="select count(*) AS total from user_answers where question_id='$question_id'";
			$result=mysqli_query($con,$q);
			$count=mysqli_fetch_array($result);
			$count=$count['total'];
			
			//Including the Question Snippet To Display The Questions
			include("veiw/question_snippet.php");
		}
	}
	
	
	//Function To validate String For SQL Injection,Cross Site Scripting ETC.
    function validateString($var)
    {

            global $con;
            $data = mysqli_real_escape_string($con,$var);
            $data = strip_tags($var);
            return $var;
    }
    //END
?>