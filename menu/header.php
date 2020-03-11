<!doctype html>
<?php  session_start();
?>
<html lang="zh">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	  <!------------------------------->
	  <link href="../message_box/css/bootstrap.min.css" rel="stylesheet">
	  <link href="../message_box/css/font-awesome.min.css" rel="stylesheet">
	  <link rel="stylesheet" type="text/css" href="../message_box/css/demo.css">
	  <link rel="stylesheet" href="../message_box/css/style.css">

    <title>Hello, world!</title>
  </head>
  <body>  
  <div class="container">
	  <div>
  <!-- Nav tabs导航页head -->
<ul class="nav nav-tabs font-weight-bolder text-danger" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active text-break" id="home-tab"   href="index.php" role="tab" aria-controls="home" aria-selected="true">首页</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab"  href="article_show_List.php" aria-selected="false" role="tab">文章</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="messages-tab"aria-selected="false" onClick="is_admin()">相册</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="settings-tab" href="up.php" aria-selected="false" role="tab">test</a>
  </li>
  
	<li class='nav-item'>
    <a  id='nav-link' class="nav-link"   onClick="login()" href="#"><?php if(isset($_SESSION['name'])){echo $_SESSION['name'];} 
		else{ echo "登录";} ?></a>
		  </li>
	
	
	
	</ul>
		  
		  <!------------------------退出模态框----------------------------->
 <div class="modal" tabindex="-1" role="dialog" id="exitmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">退出登录</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="control-label fa-lg">你确定要退出吗？</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-danger"><a href="../login/out.php">确认退出</a></button>
      </div>
    </div>
  </div>
</div>
	<!-- 登录注册模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                 
                <h4 class="modal-title" id="myModalLabel">
                    欢迎你登录
                </h4>
            </div>

            <div class="modal-body">
				
				
				
				
				
     <!--    登录框    -->
				
				
				
				
	<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#login_div" role="tab" aria-controls="home" aria-selected="true" name="name">登录</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#design" role="tab" aria-controls="profile" aria-selected="true" name="password">注册</a>
  </li>
</ul>
	
				
				
				
	<!------------------------------------------登录-------------------------------------------->
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="login_div" role="tabpanel" aria-labelledby="home-tab">
	  
	  <form class="form-horizontal" role="form" id="login-form" action="../login/login.php" onsubmit="return my_pswcheck();" method="post">
		  
		  
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">账号</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name"placeholder="请输入账号">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">密码</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox">请记住我
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">                                  
      <button type="submit" class="btn btn-dark" id="login_button">登录</button>
    </div>
  </div>
</form> 
	</div>
	<!--design------------->

	
  <div class="tab-pane fade" id="design" role="tabpanel" aria-labelledby="profile-tab">
	  <form class="form-horizontal" role="form" action="../login/resign.php" method="post" onSubmit="return my_pswcheck2();">
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label" data->账号</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name2" placeholder="请输入账号">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">密码</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password2" placeholder="请输入密码">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-4 control-label">确认密码</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password3" placeholder="请再次输入密码">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="sumbit" class="btn btn-success">注册</button>
    </div>
  </div>
</form>
	</div>
</div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                </button> 
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>	
<!--
	
			<h3>插件特点:</h3>
			<ul>
				<li>三个显示位置: right, center or left.</li>
				<li>六种情景模式: success, info, warning, danger, light, dark.</li>
			</ul>
		</div>
		<div class="col-md-6">
			<h3>示例:</h3>

			<button class="btn btn-success m-2" onclick="$.hulla.send('这是一则成功信息', 'success')">Success</button>
			<button class="btn btn-info m-2" onclick="$.hulla.send('这是一则信息', 'info')">Info</button>
			<button class="btn btn-warning m-2" onclick="$.hulla.send('这是一则警告信息!', 'warning')">Warning</button>
			<button class="btn btn-danger m-2" onclick="$.hulla.send('这是一则危险信息', 'danger')">Danger</button>
			<button class="btn btn-light m-2" onclick="$.hulla.send('这是一则信息（亮色主题）', 'light')">Light</button>
			<button class="btn btn-dark m-2" onclick="$.hulla.send('这是一则信息（暗色主题）', 'dark')">Dark</button>
		</div>
	
		
-->

	 </div> 
</div>
	  <!--------------------登录错误处理------------------->
	
	   <script src="../message_box/js/jquery-1.11.0.min.js" type="text/javascript"></script>
	  <script src="../message_box/js/bootstrap.min.js"></script>
	  <script src="../message_box/js/hullabaloo.js"></script>
<!-------------------------------------js  bootstrap---------------------------------->  
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!------------------------------------------------------------------------------------>
	 
	  
	  
<!-------------------------------------js DIY------------------------------------------>
	<script type="text/javascript">
		function login(){
			<?php 
				if(isset($_SESSION['name'])){
					echo"$('#exitmodal').modal('show');";
				}
			else{
				echo"$('#myModal').modal('show'); ";
			}
			?> 
	  } 			 
	   function my_pswcheck(){
		   
		   //alert ("name1");
		   var name=document.getElementById("name");
		   
		   var password=document.getElementById("password");
		   var form1=document.getElementById("login-form");
		    
		   $.hulla = new hullabaloo();
		    
		if(name.value==""){	
			alert("1");
			$.hulla.send("账号不能为空！", "warning");
			name.focus();
			return false;
		 	}
		 else if(password.value==""){	
			$.hulla.send("密码不能为空！","warning");
			password.focus();
			return false;														
			}
		 else
			return true;   
	  }  
		 
		
		function my_pswcheck2(){
			$.hulla = new hullabaloo();
			var name=document.getElementById("name2");
			var password2=document.getElementById("password2");
			var password3=document.getElementById("password3");
			if(name.value==""||password2.value==""||password3.value==""){		
				$.hulla.send("账号或密码不能为空！", "warning");
				return false;
			}
			else{
				if(password2.value!=password3.value){
					alert("123");
					$.hulla.send("两次密码不一致","warning");
					return false;
					}
				 	else return true;	
				}			
			}
		function is_admin(){
//			var isadmin = sessionStorage.getItem('isadmin');
//			alert(isadmin);
//			if(isadmin!='1'){
//				alert ("无权查看");
//				return;
//			}
			 
				location.href="./pic/index.php";
			 
		}
	  </script>  
  </body>
</html>