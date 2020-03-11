  <?php      function getOS()
{
$agent = strtolower($_SERVER[‘HTTP_USER_AGENT’]);
 
if(strpos($agent, 'windows nt')) {
$platform = 'windows';
} elseif(strpos($agent, 'macintosh')) {
$platform = 'mac';
} elseif(strpos($agent, 'ipod')) {
$platform = 'ipod';
} elseif(strpos($agent, 'ipad')) {
$platform = 'ipad';
} elseif(strpos($agent, 'iphone')) {
$platform = 'iphone';
} elseif (strpos($agent, 'android')) {
$platform = 'android';
} elseif(strpos($agent, 'unix')) {
$platform = 'unix';
} elseif(strpos($agent, 'linux')) {
$platform = 'linux';
} else {
$platform = 'other';
}
 
return $platform;
}
        
        
        
        
        function getip()
{
        if (isset($_SERVER)) 
        {
                if (isset($_SERVER[HTTP_X_FORWARDED_FOR]) && strcasecmp($_SERVER[HTTP_X_FORWARDED_FOR], "unknown"))//代理
                {
                        $realip = $_SERVER[HTTP_X_FORWARDED_FOR];
                } 
                elseif(isset($_SERVER[HTTP_CLIENT_IP]) && strcasecmp($_SERVER[HTTP_CLIENT_IP], "unknown"))
                {
                        $realip = $_SERVER[HTTP_CLIENT_IP];
                } 
                elseif(isset($_SERVER[REMOTE_ADDR]) && strcasecmp($_SERVER[REMOTE_ADDR], "unknown"))
                {
                        $realip = $_SERVER[REMOTE_ADDR];
                } 
                else
                {
                        $realip = 'unknown';
                }
        } 
        else
        {
                if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
                {
                        $realip = getenv("HTTP_X_FORWARDED_FOR");
                }
                elseif(getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
                {
                        $realip = getenv("HTTP_CLIENT_IP");
                } 
                elseif(getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
                {
                        $realip = getenv("REMOTE_ADDR");
                } 
                else
                {
                        $realip = 'unknown';
                }
        } 
        return $realip;
}
        
        function modifyipcount($ip)
{
        mysql_connect("localhost","root","12345678","db_blog");  
        $query="SELECT * FROM ip where ipdata='".$ip."'";
        $result=mysql_query($query);
        $row=mysql_fetch_array($result);
        $iptime=time();
        $day=date('j');
        if(!$row)
        {
                $query="INSERT INTO ip (ipdata,iptime) VALUES ('".$ip."','".$iptime."')";
                mysql_query($query);
                $query="SELECT day,todayipcount,allipcount FROM count";
                $result=mysql_query($query);
                $row=mysql_fetch_array($result);
                $allipcount=$row['allipcount']+1;
                $todayipcount=$row['todayipcount']+1;
                if($day==$row['day'])
                {
                        $query="UPDATE count SET allipcount='".$allipcount."',todayipcount='".$todayipcount."'";
                }
                else
                {
                        $query="UPDATE count SET allipcount='".$allipcount."',day='".$day."',todayipcount='1'";
                }
                 mysql_query($query);
        }
        else
        {
                $query="SELECT iptime FROM ip WHERE ipdata='".$ip."'";
                $result=mysql_query($query);
                $row=mysql_fetch_array($result);
                $query="SELECT day,todayipcount,allipcount FROM count";
                $result=mysql_query($query);
                $row1=mysql_fetch_array($result);
                if($iptime-$row['iptime']>86400)
                {
                                                $query="UPDATE ip SET iptime='".$iptime."' WHERE ipdata='".$ip."'";
                 mysql_query($query);
                        $allipcount=$row1['allipcount']+1;
                        if($day==$row1['day'])
                        {
                                $query="UPDATE count SET allipcount='".$allipcount."'";
                        }
                        else
                        {
                                $query="UPDATE count SET allipcount='".$allipcount."',day='".$day."',todayipcount='1'";
                        }
                         mysql_query($query);
                }
                if($day!=$row1['day'])
                {
                        $query="UPDATE count SET day='".$day."',todayipcount='1'";
                         mysql_query($query);
                }        
        }
}
        
        
        ?> 