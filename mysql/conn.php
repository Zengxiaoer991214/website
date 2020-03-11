<?php

       	$conn=mysqli_connect("localhost","root","12345678","db_blog") or die(mysqli_error());
      
        mysqli_query($conn,"set names utf8");
        $ses=session_id();
		$ip=$_SERVER["REMOTE_ADDR"];
        $sql="select * from conf where ip='$ip'";
     
		
        $date=date('Y-m-d H:i:s'); 
        
        $result = mysqli_query($conn,$sql) or die( mysqli_error());
        $row=mysqli_fetch_array($result);
         
        $resultt=mysqli_num_rows($result);
		 
		 
		//echo $result2;	
		$id=$row['id'];
        if($resultt==0){
            $sql2="INSERT INTO conf(session_id, request_time, count, ip) VALUES ('$ses','$date',1,'$ip')";
           // echo $sql2;
            mysqli_query($conn,$sql2);
           
         }
        else{
            
            $date=$row['request_time']."--->".$date;
            $count=$row['count']+1;
			$session_id=$row['session_id']."+++".$ses;
            $sql3="UPDATE conf SET request_time='$date',count=$count WHERE ip='$ip'";
            //echo $sql3;
            mysqli_query($conn,$sql3);
			 
            
        }
            
         
?>