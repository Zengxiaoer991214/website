<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
    <?PHP
   /* header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST["submit"])){
        exit("错误执行");
    }//检测是否有submit操作 
    */
    
	session_start();
    $con = mysqli_connect("localhost","root","12345678","db_blog");
    if(!$con){
        echo "die";
    }
    $name = $_POST['name'];//post获得用户名表单值
    $passowrd = $_POST['password'];//post获得用户密码单值
    
    if ($name && $passowrd){//如果用户名和密码都不为空
             $sql = "select * from user2 where (username = '$name') and (password='$passowrd')";//检测数据库是否有对应的username和password的sql
                $result = $con->query($sql);//执行sql
             $rows=mysqli_num_rows($result);//返回一个数值
                        /*$sql2 = "select * from user2"; //这里login是你要查询的表
                        $obj = mysqli_query($con,$sql2); //执行查询￥
                        $new = mysqli_fetch_all($obj,MYSQLI_ASSOC); //将查询结果翻译成数组
                        var_dump($new);echo "<br/>"; //输出结果 
                        */
            $row = mysqli_fetch_array($result);
             if($rows){//0 false 1 true
                    $_SESSION['name']=$name;
                    $_SESSION['asd']="asd";
                    $_SESSION['password']=$passowrd;
                    $_SESSION['isadmin']=$row['isadmin'];
                    echo "
         
                     <script> alert('欢迎回来！'); </script>"
                     ;
                        header("refresh:0.1;url='../index.php'") ;
                            exit();
             }else{
                
                echo "
                    <script>
                            setTimeout(function(){window.location.href='./index.html';},1000);
                    </script>

                ";//如果错误使用js 1秒后跳转到登录页面重试，让其从新进行输入
             }
             

    }else{//如果用户名或密码有空
                echo "表单填写不完整";
                echo "
                      <script>
                            setTimeout(function(){window.location.href='index.html';},66000);
                      </script>";
                        //如果错误使用js 1秒后跳转到登录页面重试，让其从新进行输入
    }

    mysqli_close();//关闭数据库
?>

</body>
</html>