<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Zeng Xiao er</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
 
<!-- CuFon ends -->
</head>
<body >
	<div class="container-xl">
 <?php include 'menu/header.php'?>

 
<?php
$a_id = $_GET['a_id'];
session_start();
$_SESSION['a_id']=$a_id;
require_once 'config/article_db.php';
$article_db = new  ARTICLE_DB();
$result = $article_db->mysql_db2($a_id);
$row = mysqli_fetch_array($result);
	$_SESSION['a_state']=$row['a_state'];
	$text=$row['a_text'];
    $conn = mysqli_connect("localhost","root","12345678","db_blog");
    if(!$conn){
        echo "die";
    }
    mysqli_query($conn , "set names utf8");
     
    $nowvisit=$row['a_visit']+1;
    $sql = "UPDATE article
        SET a_visit=$nowvisit
        WHERE a_id=$a_id";
    $retval = mysqli_query( $conn, $sql );
?>
 	
	
		<div class="border-success" style="border:medium; border-color: aqua">
			<div class="media">
  				<div class="media-body bg-white text-dark ">
      				<h5 class="text-center"><?php echo $row['a_title']; ?></h5>
  			 <?php echo $row['a_text'];?>
  				</div>
			</div>
		</div>
		<div class="container-xl text-white bg-dark">
			<div class="row">
 				<div class="col-8"> 
     				<p2 class="card-text"> <?php echo"浏览：". $row['a_visit']; ?> 
       					<?php echo"  评论：". $row['a_state']; ?> </p2>
    			</div>	

				<div class="col align-self-end">
					<div class="btn-group btn-group-sm" role="group">
 						<button type="button" class="btn btn-secondary">评论</button>
  						<button type="button" class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">查看评论</button>
  						<button type="button" class="btn btn-secondary" >点赞</button>   
					</div>
				</div>
			</div>
		</div>
 
	<div class="collapse" id="collapseExample">
  		<div class="card card-body">
	 		 <form action="blog_send/remark_send.php" method="post" if="form1">
    			 <div class="input-group mb-3">
  					<input type="text" class="form-control" placeholder="写下你的评论" aria-label="Recipient's username" aria-describedby="button-addon2" name="text" id="text">
  						<div class="input-group-append">
   							 <button class="btn btn-outline-secondary" type="button" id="button-addon2" onClick="link_blog_send()">发送</button>
 						</div>
				</div> 
	  		</form>
  		</div>
		<?php 
			$result2=mysqli_query($conn,"select * from message where m_id=$a_id ORDER BY id ");
			if (!$result2) {
printf("Error: %s\n", mysqli_error($conn));
exit();
}	
		while($row2= mysqli_fetch_array($result2))
		 {
			$index=1;
			$index++;
			switch($index%2){
				case 0:$loc="pull-right";break;
				case 1:$loc="";break;
					
			}
		?>
		<div class="card ">
  			<div class="card-header <?php echo $loc;?>">
    		<?php echo $row2['m_addtime'];?>
  			</div>
  <div class="card-body">
    <blockquote class="blockquote mb-0 <?php echo $loc;?>t">
      <p2> 	<?php echo $row2['m_text'];?></p2>
	<br>
      <footer class="blockquote-footer <?php echo $loc;?>">来自：<cite title="Source Title"><?php echo $row2['m_name'];?></cite></footer>
    </blockquote>
  </div>
		</div>
		
		<?php }?>
	</div>	
</div>
	<script type="text/javascript">
		function link_blog_send(){
		 
//		 
			var data=document.getElementById("text").value;
			 if(data==""){
				 alert("未输入评论！");
			 }
			else{
				$.ajax({
				type: "post",  //数据提交方式（post/get）
    			url: "blog_send/remark_send.php",  //提交到的url
				data: {text:data},//提交的数据
    			dataType: "json",//返回的数据类型格式	
				success: function(msg){
       					alert("1");
					},
				error:function(msg){
      					//返回失败的回调函数
    				}
				});
			}
			
	}
	</script>
	
</body>
</html>
