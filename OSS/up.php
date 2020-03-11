<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Zeng Xiao er</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
<script type="text/javascript" src="../js/cufon-yui.js"></script>
<script type="text/javascript" src="../js/cuf_run.js"></script>
<!-- CuFon ends -->
</head>
<body style="background-color:  darkslategray">

<div class="main"><?php include '../menu/head.php';?>  

    <div align="center">
    <form action="oss.php" method="post" enctype="multipart/form-data">
			<!--用户名：<input type="text" name="uname"><br><br>-->
		
			<p align="center" style="font-size: 230%">请选择文件：</p>
			<input 
            <input type="file" name="filename[]"  value="   " multiple="multiple" ><br>
        <label> 用&nbsp;&nbsp;途 </label>
        <select name="type" style="width: auto;height: 30px">
        <option value="1" selected>照片墙</option>
        <option value="2">······</option>
        <option value="3">······</option>
        <option value="4">······</option>
        <option value="5">······</option>
        <option value="6">······</option>
		<option value="7">······</option>                  
        </select>
   			 <br>
             
			<input type="submit" value="上传" style="background-color: yellowgreen;height: 40px;width: 80px;background-size:100% 100%;font-size: 25px">
		</form>	
        </div>
 </div>
</body>
</html>
