<?php   

 $db=mysqli_connect( "localhost" ,"root" ,"" );
 mysqli_query($db,"set names utf8") ;
 mysqli_select_db($db ,"accounting" );//後端資料庫為accounting

 
    $sql ="SELECT * FROM `invoice_month`";
    $result = mysqli_query($db,$sql)or die("<br>SQL error!<br/>");
    $arytags = array(); 
    while($row = mysqli_fetch_array($result))
    {
      $arytags[] = $row;
      }	
    echo json_encode($arytags, JSON_UNESCAPED_UNICODE);
     
 ?>
 <!--https://codeday.me/bug/20170322/7984.html     http更新-->
 <!--http://www.tshopping.com.tw/portal.php?mod=view&aid=435   非同步表格-->
    