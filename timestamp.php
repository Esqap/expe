<?php
class Time{
    function convertToAgo($d){
    date_default_timezone_set('Asia/Karachi');
    list($date,$time)=explode(" ",$d);
    list($year,$month,$day)=explode("-",$date);
    list($hour,$min,$sec)=explode(":",$time);

    $posted_time=mktime($hour,$min,$sec,$month,$day,$year);
    return $posted_time;
}

        function converts($posted,$b){
        $out="";
        date_default_timezone_set('Asia/Karachi');  
        $diff=time()-$posted;
        $periodString=["sec","min","hr","day","week"];
        $periodTime=["60","60","24","7","4.5"];
        if($diff<60){
            $out="Just Now";
        }
            for($i=0; $diff>=$periodTime[$i];){
                if(2721600<$diff){
                    $out="Expressed at $b";
                    break;
                }
                $diff/=$periodTime[$i];
                $diff=round($diff);
                if($diff != 1){
                    $periodString[$i].="s";
                }
                $i++;
                $out="$diff $periodString[$i]"." Ago";            
            }
       
       return $out;
    }
}

?>