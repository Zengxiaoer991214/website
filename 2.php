<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>zeng xiao er</title>
</head>
	<style>
	/* table 样式 */
table {
  border-top: 1px solid #ccc;
  border-left: 1px solid #ccc;
}
table td,
table th {
  border-bottom: 1px solid #ccc;
  border-right: 1px solid #ccc;
  padding: 3px 5px;
}
table th {
  border-bottom: 2px solid #ccc;
  text-align: center;
}

/* blockquote 样式 */
blockquote {
  display: block;
  border-left: 8px solid #d0e5f2;
  padding: 5px 10px;
  margin: 10px 0;
  line-height: 1.4;
  font-size: 100%;
  background-color: #f1f1f1;
}

/* code 样式 */
code {
  display: inline-block;
  *display: inline;
  *zoom: 1;
  color: brown;
  background-color:lightslategrey;
  border-radius: 3px;
  padding: 3px 5px;
  margin: 0 3px;
}
pre code {
  display: block;
}

/* ul ol 样式 */
ul, ol {
  margin: 10px 0 10px 20px;
}</style>
<body style="background-color:darkslategray">
<div class="container-xl">
	<div class="main"style="overflow: auto;" >
		<?php
			  
			include 'menu/header.php';
            include 'mysql/conn.php';   
			
        ?>
	</div>
	<div class="spinner-border text-primary" role="status">
  <span class="sr-only">Loading...</span>
	</div>
	<div class="col-4">
		<div class="input-group mb-3">
  <div class="custom-file">
	  <form method="post" enctype="multipart/form-data" action="blog_send/OSS_send.php">
    <input type="file" class="custom-file-input" name="filename[]"  value="" multiple="multiple">
    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">选择图片</label>
  </div>
  <div class="input-group-append">
    <button class="btn btn-success bt-lg" type="submit" >上传</span>
  </div>
	  </form>
</div>
		
	</div>
<!--
<div class="spinner-border text-secondary" role="status">
  <span class="sr-only">Loading...</span>
</div>
<div class="spinner-border text-success" role="status">
  <span class="sr-only">Loading...</span>
</div>
<div class="spinner-border text-danger" role="status">
  <span class="sr-only">Loading...</span>
</div>
<div class="spinner-border text-warning" role="status">
  <span class="sr-only">Loading...</span>
</div>
<div class="spinner-border text-info" role="status">
  <span class="sr-only">Loading...</span>
</div>
<div class="spinner-border text-light" role="status">
  <span class="sr-only">Loading...</span>
</div>
<div class="spinner-border text-dark" role="status">
  <span class="sr-only">Loading...</span>
</div>
-->
	
	
	<form action="blog_send/blog_send.php" method="post">
	<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">文章标题：</span>
  </div>	
  <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
	</div>
	<div class="form-row">
		<div class="col-4">
			<div class="form-group">
    <select class="form-control" id="exampleFormControlSelect1" name="type">
		<option value="0">选择分类</option>
      	<option value="1">开发日志</option>
        <option value="2">情感生活</option>
        <option value="3">Python</option>
        <option value="4">JAVA/Kotlin</option>
        <option value="5">C#/·NET</option>
        <option value="6">CSS/html5</option>
        <option value="7">PHP</option>
        <option value="8">javascript</option>
        <option value="9">计算机网络</option> 
        <option value="10">/占位符/</option> 
    </select>	
  			</div>
		
	</div>
		 <div class="col">
			<div class="input-group">
  <select class="custom-select" id="select04" aria-label="Example select with button addon">
    <option selected>Choose...</option>
	  <?php  
	  for($i=0;$i<count($_SESSION['oss_url']);$i++){
		  	$url=$_SESSION['oss_url'][$i];
			echo " <option >$url</option>";
}?>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
  <div class="input-group-append">
    <button class="btn btn-outline-light" type="button" onClick="url_copy()">复制URL</button>
  </div>
</div>
		</div>
	</div>
		
		
		
		
		<div class="form-row">
			<input type="hidden" name="text" id="text_id">
			<input type="hidden" name="text2" id="text2_id">
			<div class="col">
			<button type="sumbit" class="btn btn-success btn-lg btn-block " id="btn1">发送</button>
			</div>
		</div>
	
		
			
 	<div id="div1" class="container-xl md-4	">
    
		</div>
		<div style="text-align:center">

</div>
	 
		
		
		
		
		</form>
	</div>
</div>
<script type="text/javascript" src="/wangEditor.min.js"></script>
<script type="text/javascript">
     var E = window.wangEditor
    var editor = new E('#div1')
    editor.create()

    document.getElementById('btn1').addEventListener('click', function () {
        // 读取 html
        //alert(editor.txt.html())
		document.getElementById("text_id").value=editor.txt.html()
		document.getElementById("text2_id").value=editor.txt.text()
		//alert(editor.txt.text())
    }, false)
	
 
</script>
	<script type="text/javascript">
		function oss_post(){
			 
			document.getElementById("oss_form").submit();
			}
		function url_copy(){
			
			var myselect=document.getElementById("select04");
			var index=myselect.selectedIndex ;
			var mydata=myselect.options[index].text;
			  
			 var oInput = document.createElement('input');

        oInput.value = mydata;

        document.body.appendChild(oInput);

        oInput.select();// 选择对象

        document.execCommand("Copy");// 执行浏览器复制命令

        oInput.className ='oInput';

        oInput.style.display='none';

       
			}  
		 
		
	
	
	
	</script>
	</div>
	</html>