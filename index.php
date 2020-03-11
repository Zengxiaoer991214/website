<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php session_start();?>
<html lang="ch-cmn-Hans">
<head>
<title>Zeng Xiao er</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="baidu-site-verification" content="YI9qYISe1g" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 
<link href="bootstrap/css/bootstrap-grid.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" type="text/css"/>
 	

</head>
<body style="background-color:darkslategray" onLoad="welcome()">
<div class="container" style="width:100%;">
	<div class="main"style="overflow: auto;" >
		<?php
			 
			include 'cdroot.php';
			include 'menu/header.php';
            include 'mysql/conn.php';   
			
        ?>
	</div>
	<div class="container">
	 <nav class="navbar navbar-expand-sm navbar-light bg-dark mh-70">
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">综合 </a>
      </li>
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         分类
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">A</a>
          <a class="dropdown-item" href="#">B</a>
          
          <a class="dropdown-item" href="#">C</a>
        </div>
      </li>
       <button class="btn btn-outline-success my-2 my-sm-0" type="button" onClick="link_blog_send()">发博客</button>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-1 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
		</div>
<?php  
		$result=mysqli_query($conn,"SELECT * FROM article ORDER BY a_id DESC");
	
		 while($row = mysqli_fetch_array($result))
		 {
			 switch(rand(0, 7)){
				 case 0:$bg="bg-info";break;
				 case 1:$bg="bg-secondary";break;
				 case 2:$bg="bg-success";break;
				 case 3:$bg="bg-danger";break;
				 case 4:$bg="bg-warning";break;
				 case 5:$bg="bg-info";break;		 
				 case 6:$bg="bg-light";break;		 
				 case 7:$bg="bg-info";break;		 
			 }
	?>
	 
  <div class="card mb-2 <?php echo $bg;?>" style="max-width:100%;">
  <div class="row no-gutters">
     
    <div class="col-md-12">
      <div class="card-body ">
        <h5 class="card-title"><?php echo $row['a_title']; ?></h5>
        <p class="card-text c2"><?php echo $row['a_begin_text']; ?></p>
       
		  <div class="row">
			   
			  
		  
    <div class="col-8">
      <p class="card-text"><small class="text-muted 	"><?php echo $row['a_adddate']; ?></small></p>
    </div>
    <div class="col-6 text-dark">
     <p class="card-text text-dark"><small class="text-muted text-dark"><?php echo"浏览：". $row['a_visit']; ?></small>
      <small class="text-muted text-dark"><?php echo"评论：". $row['a_state']; ?></small> </p>
    </div>
    
  </div>
		  <div class="row pull-right">
	<div class="col align-self-end">
      <button type="button" class="btn btn-info text-white bg-dark" ><a href="article_show_All.php?a_id=<?php echo $row['a_id'];?>">查看全文</a></button>
    </div>
		  </div>
      </div>
    </div>
  </div>
</div>
   <?php  }?>   
  </div>
</div>
	 
		 
	</div>
	</div>
	
	</div>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	 <script src="message_box/js/jquery-1.11.0.min.js" type="text/javascript"></script>
	  <script src="message_box/js/bootstrap.min.js"></script>
	  <script src="message_box/js/hullabaloo.js"></script>
	
	<script type="text/javascript">
		function welcome(){
	$.hulla = new hullabaloo();
	setTimeout(function() {
	  $.hulla.send("Hi！这里是一个很酷的网站！", "success");
	}, 1000);

	setTimeout(function() {
	  $.hulla.send("欢迎您的访问！", "info");
	}, 2000);
		
	<?php 
		if(isset($_SESSION['name'])){
			$name=$_SESSION['name'];
			echo "setTimeout(function() {
	  	$.hulla.send('欢迎回来!$name,最近还好吗？','success');
	}, 3000);
		";
		}
		?>
	} 
	function link_blog_send(){
	window.location.href = 'https://www.zengxiaoer.net/2.php';
	}
</script>
</script>
</body>
</html>