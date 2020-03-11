<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
    <?php
    
        $id=$_GET['id'];
        $conn = mysqli_connect("localhost","root","12345678","db_blog");
        mysqli_query($conn,'set names utf8');
            if(!$conn){
                echo "die";}
            $sql="update pic_oss set is_value='2' where id=$id";
            $result=mysqli_query($conn,$sql);
           // $arry=mysql_fetch_assoc($result);
           
            echo "<script>alert('删除成功');location.href='index.php';</script>";
          
          
          
          
    
    ?>
</body>
</html>