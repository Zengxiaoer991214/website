<?php
session_start();
	include 'index.html';
require_once '../aliyun-oss-php-sdk-master/autoload.php';
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
	
    <?php
	
    

         //设置编码
if (is_file(__DIR__ . '/../autoload.php')) {
    require_once __DIR__ . '/../autoload.php';
}
if (is_file(__DIR__ . '/../vendor/autoload.php')) {
    require_once __DIR__ . '/../vendor/autoload.php';
}
use OSS\OssClient;
use OSS\Core\OssException;
// 阿里云主账号AccessKey拥有所有API的访问权限，风险很高。强烈建议您创建并使用RAM账号进行API访问或日常运维，请登录 https://ram.console.aliyun.com 创建RAM账号。
$accessKeyId = "";
$accessKeySecret = "";
// Endpoint以杭州为例，其它Region请按实际情况填写。这个先手动上传个图片，复制URL里面就有这个东西
//$endpoint = "https://oss-cn-shanghai.aliyuncs.com/thelasted";
//$endpoint = "https://oss-cn-shenzhen-internal.aliyuncs.com/thelasted";
$endpoint = "https://oss-cn-shanghai-internal.aliyuncs.com";
// 存储空间名称oss-cn-shenzhen-internal.aliyuncs.com
$bucket= "zengxiaoer";//创建的桶名
// 文件名称

 
// 上传文件时设置回调。
// callbackUrl为，如http://oss-demo.aliyuncs.com:23450或http://127.0.0.1:9090。//
// callbackHost为回调请求消息头中Host的值，如oss-cn-hangzhou.aliyuncs.com。//oss-cn-hangzhou.aliyuncs.com
$url =
'{
     "callbackUrl":"可访问的ip地址",
     //"callbackBody" : "{bucket:${bucket}, object:${object}}",//这个是json的写法，如果使用，相应的要改callbackBodyType的类型为application/json
     "callbackBody" : "bucket=${bucket}&object=${object}&etag=${etag}&size=${size}&mimeType=${mimeType}&imageInfo.height=${imageInfo.height}&imageInfo.width=${imageInfo.width}&imageInfo.format=${imageInfo.format}&my_var1=${x:var1}&my_var2=${x:var2}",
     "callbackBodyType" : "application/x-www-form-urlencoded"    
 }';
 
$var =
   '{
       "x:var1":"value1",
       "x:var2":"值2"
    }';
$options = array(
  OssClient::OSS_CALLBACK => $url,
  OssClient::OSS_CALLBACK_VAR => $var
);
	$type=2;
	$type=$_POST['type'];
 	$conn = mysqli_connect("localhost","root","12345678","db_blog");
    if(!$conn){
        echo "die";
    }

 for($i=0; $i<count($_FILES['filename']['name']); $i++) {
	 echo $_FILES['filename']['name'][$i];	
try{
	$object = $_FILES['filename']['name'][$i];
// <yourLocalFile>由本地文件路径加文件名包括后缀组成，例如/users/local/myfile.txt
	$filePath = $_FILES['filename']['tmp_name'][$i];
    $ossClient = new OssClient($accessKeyId, $accessKeySecret, $endpoint);
	$ossClient->uploadFile($bucket, $object, $filePath);//上传文件
 	$ossClient = (array)$ossClient;//对象转换成数组
  	echo '<pre>';
    var_dump($ossClient);//打印所有信息
    var_dump(array_values($ossClient)[4]);//把所有value值取出并按照索引数组排列，取4是你上传的地址
    
    $name=$_FILES['filename']['name'][$i];                      
    $password="http://zengxiaoer.oss-cn-shanghai.aliyuncs.com/".$_FILES['filename']['name'][$i];
	//http://139.224.137.150/
    $_SESSION['url']=$password;
    $time=date("Y-m-d H:i:s");
	$tablename="pic_oss2";
	switch($type){
            case "1":$tablename="pic_oss";break;
            case "2":$tablename="pic_oss2";break;
            case "3":$type="Python";break;
	}
    $sql = "INSERT INTO ".$tablename.
        "(filename,URL,date) ".
        "VALUES ".
        "('$name','$password','$time')";
    $retval = mysqli_query( $conn, $sql );
} catch(OssException $e) {
    printf(__FUNCTION__ . ": FAILED\n");
    printf($e->getMessage() . "\n");
    printf("1111");
    return;
}
 
print(__FUNCTION__ . ": OK" . "\n");
   } 
	
//	
//	if($_SESSION['is_message']==1)
//    {
//    echo "<script>alert('上传成功');history.back();</script>";   
//    }
//    else
//    {
//        echo "<script>alert('上传成功');location.href='up.php';</script>";
//    }
    ?>
</body>
</html>
