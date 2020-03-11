<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
    <?php
//    session_start();
    echo session_id();
    $conn = mysqli_connect("localhost","root","12345678","db_blog");
    if(!$conn){
        echo "die";
    }
    mysqli_query($conn , "set names utf8");
    $name=$_POST['name'];
    $password=$_POST['password'];
    $time=date("Y-m-d H:i:s");
    $sql = "INSERT INTO user2 ".
        "(username,password,time) ".
        "VALUES ".
        "('$name','$password','$time')";
    $retval = mysqli_query( $conn, $sql );
    if(! $retval )
        {
        die('注册失败: ' . mysqli_error($conn));
        }
    else{
        echo "
            <script> alert('注册成功！'); </script>"
            
            
            ;
         header("refresh:0.1;url='./index.html'") ;
    }
        
        mysqli_close($conn);

    ?>
</body>
</html>