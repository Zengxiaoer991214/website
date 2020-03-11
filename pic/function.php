 <?php   
    function connmysql(){
        $conn = mysqli_connect("localhost","root","12345678","db_blog");
        mysqli_query($conn,'set names utf8');
        if(!$conn){
            echo "die";}
            $sql="SELECT * FROM `pic_oss` WHERE is_value=1";
            $result=mysqli_query($conn,$sql);
           // $arry=mysql_fetch_assoc($result);
            
            return($result);
    }
    
     function getImageinfo($url)
    {
        $result = array(
            'width'=>'',
            'height'=>'',
            'size'=>'',
        );
        $imageInfo = getimagesize($url);
        $result['width']=$imageInfo[0];
        $result['height']=$imageInfo[1];
        
        $headerInfo = get_headers($url,true);
        $result['size']=$headerInfo['Content-Length'];
 
        return $result;
    }
    class pic {
        var $pic_height;
        var $pic_width=200;
        var $pic_date;
        var $pic_URL;
        function getImageInfo($url,$date){
            $imageInfo=getimagesize($url);         
            $this->pic_height=ceil(200*$imageInfo[1]/$imageInfo[0])+100;
            $this->pic_URL=$url;     
        }
   
    }
    class pics{
       var $arr=[0,0,0,0,0];
        function lenth(){
        $temp=$this->arr[0];
            $indexx=0;
            for($index=0;$index<5;$index++){
                if($temp>$this->arr[$index]){
                    $temp=$this->arr[$index];
                    $indexx=$index;
                }
                    
            }
            //print_r($this->arr);
            return $indexx;
        }    
    function lenth_add($index,$num){
        $this->arr[$index]+=$num;
    }
    }




    ?>