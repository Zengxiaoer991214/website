<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<title>Zeng Xiao er</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
    
<link href="css/index.css" rel="stylesheet">
<!-- CuFon ends -->
</head>
<body style="background-color:darkslategray">
<div class="main"><?php include 'menu/header.php'?> <br>
<br>
<br>
<br>
<div class="content">
<div class="content_resize">
<div class="mainbar">
<div class="article">
<?php
require_once 'config/article_db.php';
$article_db = new  ARTICLE_DB();
$result = $article_db->mysql_db();
?>
<div style="background-color: aqua"><p style="font-size: 16px;text-align: right"><a href="article_send.php" style='text-decoration:none'>我要发？</a></p></div>

<?php while($row = mysqli_fetch_array($result)){ ?>
<div class="blogs">
    
<h3><a href="article_show_All.php?a_id=<?php echo $row['a_id'];?>" target="_blank"><?php echo $row['a_title']; ?></a></h3>
<figure style="text-align: right"> <img src="<?php echo $row['a_photo'];?>" width="100" height="100"></figure>
<?php echo $row['a_begin_text'];?>
<a href="article_show_All.php?a_id=<?php echo $row['a_id'];?>" target="_blank"
	class="readmore">阅读全文&gt;&gt;</a>
<p class="autor"><span>作者：<?php echo $row['a_adduser'];?></span><span>分类：【<a href="/"><?php echo $row['a_type'];?></a>】
 </span><span>浏览（<?php echo $row['a_visit'];?>） </span><span>评论（<?php echo $row['a_comment'];?>） </span></p>
<div class="dateview" align="center"><?php echo $row['a_adddate'];?></div>
</div>
<?php 
  } 
    
        
?>


   
    
</div>
</div>
</div>
</body>
</html>
