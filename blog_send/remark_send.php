<?php
	$conn=mysqli_connect("localhost","root","12345678","db_blog") or die(mysqli_error());
    mysqli_query($conn,"set names utf8");
	session_start();
	$date= date("Y-m-d H:i:s");
	$text=$_POST['text'];
	 
	$a_id=$_SESSION['a_id'];
	 
	$count=$_SESSION['a_state'];
//	$result= mysqli_query($conn,"select * from message where m_id=$a_id");
//	$row=mysqli_fetch_array($result); 
//    $resultt=mysqli_num_rows($result);
	  
//		$result2=mysqli_query($conn,"select a_state from article where a_id=$a_id");
//		$row2=mysqli_fetch_array($result2);
//		$count=$row2['a_state'];
//	echo $count;
	 
		if(isset($_SESSION['name']))
			$name=$_SESSION['name'];
		else
			$name="游客";

		$count+=1;
		mysqli_query($conn,"insert into message (m_id,m_name,m_text,m_addtime,id) values ('$a_id','$name','$text','$date',$count)");
		
		 mysqli_query($conn,"update article set a_state=$count where a_id=$a_id");
		
		 	echo"<script>location.href='index.php';</script>";
?>
