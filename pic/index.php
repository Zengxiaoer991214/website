<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <style  type="text/css">     
        *{
    margin: 0;
    padding: 0;
}
body{
    background: #ED797B;
        }
    .container{
    width:1000px;
    margin: 40px auto;
    background-color:red;
    
        }
    .items{
    position: relative;
    background-color: blueviolet;
}
    </style>
 
    <title>Document</title>
</head>
<body>
    <div class="box">   
    <?php
		//echo $_SERVER['HTTP_REFERER'];.
        include_once('function.php');
        session_start();
         
        if(!isset($_SESSION['isadmin']))
        {
            echo " <script> alert('请先登录！'); window.history.back(-1); </script>"
                     ;
          
        }
        if($_SESSION['isadmin']!='1'){
            echo " <script> alert('无权查看！'); window.history.back(-1); </script>"
                     ;
        }
    ?>
    <div class="container">
        <div class="items">
             <?php
           // echo"1 ";
            $result=connmysql();
           // echo"2";
            $picsss=new pics;
            while($row = mysqli_fetch_array($result)){
                //echo "3";
                $picccc=new pic;
                // echo"4";
                $picccc->getImageInfo($row['URL'],$row['date']);
               // echo "高：".$picccc->pic_height."宽:   ".$picccc->pic_width;
               // echo"--";
                $item_id=$picsss->lenth();
               // print_r($picccc->arr);
                $item_idd=$item_id*200;
                $height=$picccc->pic_height;
               //echo $height;
                 
                //echo "!!!".$picsss->lenth($picccc->pic_height)."<br>";
               //echo $picsss->lenth($picccc->pic_height);
                  //  echo $picccc->pic_height.$picccc->pic_width;
               // echo"高度".$picsss->arr[$item_id]."<br>";
               ?>
                <div style=" border-bottom-color: darkviolet;border-bottom-width: 2px;width:200px; height: <?php echo $height?>px;
                background-color:#7891AB;
                position: absolute;
                top: <?php echo $picsss->arr[$item_id]?>px;                                   
                left:<?php echo $item_idd?>px">
                    
                <image id="img" style=" width:100%;
                display:block;" src="<?php $url2="https://www.zengxiaoer.net/ossfs/".trim(strrchr($row['URL'], '/'),'/'); echo $url2;?>  ">
                </image>
                  <br>
                <p><?php echo $row['date']?></p>
                <a style="text-decoration : none" href="<?php echo $row['URL'];?>" >下载</a>
                <a style="text-decoration : none" href="pic_del.php?id=<?php echo $row['id'];?>" >删除</a>
           
                 
                 </div> 
            <?php  
                    $picsss->lenth_add($item_id,$picccc->pic_height);
           }
            ?>
           
            
        </div>
    </div>
    </div>
</body>
</html>