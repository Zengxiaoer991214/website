<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style type="text/css">

* { margin:0;
	padding:0;
}

html {height: 100%;}

body{
	position: relative;
	height: 100%;
/*	background: -webkit-gradient(linear, left top, left bottom, from(#ccc), to(#fff));*/
	background-color: darkslategray;
}

.navbox {
	position: relative;
	float: left;
	left: 0px;
}

ul.nav {
	list-style: none;
	display: block;
	width: 200px;
	position: relative;
	top: 60px;
	left: 0px;
	padding: 60px 0 60px 0;
	background: url(images/shad2.png) no-repeat;
	-webkit-background-size: 50% 100%;
}

li {
	margin: 5px 0 0 0;
}

ul.nav li a {
	-webkit-transition: all  0.3s ease-out;
	background: #cbcbcb no-repeat;
	color: #174867;
	padding: 7px 15px 7px 15px;
	-webkit-border-top-right-radius: 13px;
 	-webkit-border-bottom-right-radius: 13px;
	width: 130px;
	display: block;
	text-decoration: none;
	-webkit-box-shadow: 2px 2px 4px #888;
}

ul.nav li a:hover {
	background: #ebebeb  no-repeat;
	color: #67a5cd;
	padding: 7px 15px 7px 30px;
}
#slitbar_add{
	 
	display: none;
	
}
</style>

</head>

<body>
	<?php
//	require './mysql/connect.php';
	session_start();
	$conn=mysqli_connect("localhost","root","12345678","db_blog");
	if(!$conn){
		echo "连接失败";
		return 0;
	}
	
	else{
		mysqli_query($conn,'set names utf8');
	}
//	$name=$_POST['name'];
	$result=mysqli_query($conn,"SELECT * FROM slit_url  order by id");
	?>
<div style="text-align:center;clear:both;">
 
</div>
<div class="navbox">
<ul class="nav">
<!--	php的循环，以创建侧边框-->
	<?php
	
	while($rows=mysqli_fetch_assoc($result)){
		?>
 
<li><a target="_blank" href='<?php echo $rows['url']; ?>'><?php echo $rows['name'];?></a></li>
	<?php }?>
	
	
<li><a onClick="addurl()"><span style="font-size: 90%">添加+</span></a></li>
<li style="width: 500px" id="slitbar_add">
	<form class="bs-example bs-example-form" role="form" action="/menu/slitbar_url_write.php" style="left: 0;" method="post" >
		<div class="input-group input-group-sm col-5">
			
			<input type="text" class="form-control bg-info " placeholder="名称" name="name" style="
border-top-right-radius: 12px; 
border-top-left-radius: 12px; 
border-bottom-right-radius:12px;
border-bottom-left-radius:12px;
height: 30px;
width: 20px"
>
		</div>
		<div class="input-group input-group-sm col-5"
		<tr>
		</tr>
			<input type="text" class="form-control bg-info" placeholder="URL" name="url" style="
border-top-right-radius: 12px; 
border-top-left-radius: 12px; 
border-bottom-right-radius:12px;
border-bottom-left-radius:12px;
height: 30px">
		<br>
			<button type="submit"  class="btn-success"style="
border-top-right-radius: 5px; 
border-top-left-radius: 5px; 
border-bottom-right-radius:5px;
border-bottom-left-radius:5px;
height: 30px">保存</span>
		</div>
	</form>
	
	</li>
</ul>

</div>

</body>
	<script type="text/javascript">
		function addurl(){
		if(document.getElementById("slitbar_add").style.display=="block"){
			   document.getElementById("slitbar_add").style.display="none";
			   }
			else{
				document.getElementById("slitbar_add").style.display="block";
			}
		}
	</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>