<?php
	$conn=mysqli_connect("localhost","root","12345678","db_blog");
	if(!$conn)
		echo mysqli_error($conn);
	mysqli_query($conn,'set names utf8');
	$result=mysqli_query($conn,"SELECT * FROM `pic_oss2` WHERE 1");
	
	while($row=mysqli_fetch_array($result)){
		?>

<img src="<?php 
//		$url=$row['URL'];
//	 	$begin_text=mb_substr($url,0,46,'utf-8');
//		$url2="htttps://www.zengxiaoer.net/ossfs".$begin_text;
		$url2="https://www.zengxiaoer.net/ossfs/".trim(strrchr($row['URL'], '/'),'/');
		echo $url2; ?>"></img>
	<?php }
?>
