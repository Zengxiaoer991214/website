<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>

</head>

<body style="background-color:darkslategray">
    <?php
        session_start();
        echo"1";
        $title=$_POST['title'];
        $time=date("Y-m-d H:i:s");
        echo $time;
        $type_id=$_POST['type'];
        $adduser=$_POST['adduser'];
        $type=""; 
        $text=$_POST['text'];
         echo substr($text,0,25,'utf-8');
        $begin_text=mb_substr($text,0,25,'utf-8');
         
            switch($type_id){
            case "1":$type="开发日志";break;
            case "2":$type="情感生活";break;
            case "3":$type="Python";break;
            case "4":$type="JAVA/Kotlin";break;
            case "5":$type="C#/·NET";break;
            case "6":$type="CSS/html5";break;
            case "7":$type="PHP";break;
            case "8":$type="javascript";break;
            case "9":$type="计算机网络";break;
        }
            
    $conn = mysqli_connect("localhost","root","12345678","db_blog");//链接你的数据库
    mysqli_set_charset($conn,"utf8");
    if(!$conn){
        die("can't connect".mysql_error());//如果链接失败输出错误
    }     
    $url=$_SESSION['url'];
    $sql="INSERT INTO article(a_title, a_begin_text, a_text, a_adddate, a_adduser, a_p_type, a_type,a_comment,a_photo,a_state,a_visit)VALUES('$title','$begin_text','$text','$time','$adduser','$type_id','$type','0','$url','0','0')";
    $retval = mysqli_query( $conn, $sql );
      
    if($retval)
    {
       echo "<script>alert('发送博客成功！');location.href='index.php';</script>";
		unset($_SESSION['oss_url']);
        }
   //
    //
    ?>
</body>
</html>