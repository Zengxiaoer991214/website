<?php
function db_connect(){
	$conn=mysqli_connect("localhost","root","12345678","db_blog");
	if(!$conn){
		echo "连接失败";
		return 0;
	}
	else{
		mysqli_query($conn,'set names utf8');
		return $conn;
	}
	
	
	
}


?>