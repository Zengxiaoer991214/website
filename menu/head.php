<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="css/style3.css" rel="stylesheet" type="text/css" />
    <link href="../menu/menu.css" rel="stylesheet" type="text/css" />
 
 
<title>zeng xiaoer</title>    
    <style>
	</style>
</head>
<body>
	
	<div id='slitbar'>
	<?php  
		require(dirname(__FILE__).'/../cdroot.php');
		include  'menu/slitbar.php';
//		include (realpath("./")."menu/slitbar.php");
	?></div>
	
	<div id='weblog'>
	<img src="../images/123.jpg">
	</div>
	
<div class="header "style="background-color:dimgrey">
		<div class="header_resize" >
			<div class="menu_nav">
		    <ul>
		      <li class="active"><a href="../index.php">博客首页</a></li>
		      <li><a href="../article_show_List.php">文章</a></li>
		      <li><a href="../pic/index.php">相册</a></li>
		      <li><a href="../show_Message.php">留言板</a></li>
		      <li><a href="#">更多功能</a></li>
		      <li><a href="../OSS/up.php">测试</a></li>
<?php
             
			
			session_start();
			$name=$_SESSION['name'];
			
            
            $isadmin=$_SESSION['isadmin'];
            echo "<script>

            alert(\'尊敬的$name ,欢迎回来！\');

            </script>"; 
            if($name)
            {
                 echo "
                   <label class='drop' for='_1'>"."<li  class='drop' for='_1'><a>".$name."</a></li>"."</label>
		          <input id='_1' type='checkbox'> 
		          <div  >
			           <p ><a href='../login2/out.php' style='text-decoration:none'>个人信息</a></p>
			         <p><a href='../login2/out.php' style='text-decoration:none'>退出登录</a></p></div>
		          ";
            }
               
            else{
                echo  "<li><a onclick='displaydiv()' >尚未登录</a></li>";
				
            }
            ?>
	        </ul>
	      </div>
	 		 </div>
		</div>
	<div id='login'>
	<?php
		require "./login2/index.html" ;
		?>	
	
	</div>
	
  
	<script type="text/javascript">
		function displaydiv(){
			if(document.getElementById("login").style.display=="block"){
			   document.getElementById("login").style.display="none";
			   }
			else{
				document.getElementById("login").style.display="block";
			}
			
		}
	
	</script>

</body>
</html>





