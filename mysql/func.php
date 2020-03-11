<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
	<?php
		$conn=mysqli_connect("localhost","root","12345678","db_blog");
	if(!conn){
		echo(mysql_error($conn));
	}
		mysqli_query($conn,"set names utf8");
	$result=mysqli_query($conn,"select * from pic_oss where 1");
	$resultrows=mysqli_num_rows($result);
	echo $resultrows."<br>";
	
	while($rows=mysqli_fetch_assoc($result))
	{	echo "<br>";
		echo $rows['URL']."<br>";
		$url=mb_substr($rows['URL'],0,47,'utf-8');
		
		$newURL="139.224.137.150:443/".trim(strrchr($rows['URL'], '/'),'/');
		echo $newURL."<br>";
		$result2=mysqli_query($conn,"update pic_oss set URL='$newURL'");
		
	}	
	
	
	
	
	
	?>
	
</body>
</html>