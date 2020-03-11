<!doctype html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <title>Document</title>
   <style>
.button {
    
}
       </style>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
<!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
<link href="css/style2.css" rel="stylesheet">
<link href="css/media.css" rel="stylesheet">
</head>
<body style="background-color:darkslategray">
   <div class="main"> <?php include './/menu/header.php';?><br>
    <?php
    session_start();
      
    
    $_SESSION['is_message']=1;
    
    ?>
    ?>
    <br>
<br>
<br>
       
<div class="content">
<div class="content_resize">
<div class="mainbar">
<div align="center">
    
            <label style="font-size: 60px">请上传封面图片</label>
    		<form action="OSS/oss.php" method="post" enctype="multipart/form-data">
			<!--用户名：<input type="text" name="uname"><br><br>-->
			 <input type="file" name="filename[]"><br><br>
			 <input type="submit" value="上传" style="background-color: yellowgreen;height: 40px;width: 80px;background-size:100% 100%;font-size: 25px">
		</form>		
    
  
    <form action="article_send2.php" method="post">
        <label>文章标题</label>
      <input type="text" name="title" size="20%" style="font-size: 25px;width: 400px;height: 30px">
    <br>
        <label>内容</label>
    <br>
        <textarea rows="20" cols="40"    name="text"  style="font-size: 25px">输入你的文章1</textarea>
    <br>    
        <label>文章类型</label>
        <select name="type" style="width: auto;height: 30px">
        <option value="1">开发日志</option>
        <option value="2">情感生活</option>
        <option value="3">Python</option>
        <option value="4">JAVA/Kotlin</option>
        <option value="5">C#/·NET</option>
        <option value="6">CSS/html5</option>
        <option value="7">PHP</option>
        <option value="8">javascript</option>
        <option value="9">计算机网络</option>                   	
        </select>
    <br>
        <label>作者</label>
        <input type="text" name="adduser" style="font-size: 35px; width: 200px;height: 40px">
    <br>
        <button  style="background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;"type="submit" value="">发送</button>
    </form>
    </div>   
    
</body>
</html>