<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>silitnar_url_write.php</title>
</head>

<body>
	
	
	<?php
	session_start();
	$name=$_POST['name'];
	if(!$_SESSION['name']){
		$addname="nobady";
	}
	else{
		$addname=$_SESSION['name'];
	}
	$url=$_POST['url'];
	$date=date("Y-m-d-h-i-sa") ;
	$conn=mysqli_connect("localhost","root","12345678","db_blog");
	mysqli_query($conn,"set names utf8");
	$sql=" insert into slit_url (name,url,time,owner) values('$name','$url','$date','$addname')";
	mysqli_query($conn,$sql);
	echo"<script>history.go(-1);</script>";  
	?>
</body>
</html>