<?php

$email =filter_input(INPUT_POST,"email");
$time =filter_input(INPUT_POST,"time");

$myData=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($myData,"set names utf8") ;
mysqli_select_db($myData ,"accounting" );//後端資料庫為accounting


$sql = "SELECT m_id FROM member where  m_email='".$email."'";
$result = mysqli_query($myData,$sql)or die("<br>SQL error!<br/>");
while($row = mysqli_fetch_array($result))
    {
        $mid=$row['m_id'];
        $sql2 = "UPDATE `member` SET `m_time` = '".$time."'  WHERE m_id = '".$row[0]."'";
        $stmt = $myData->prepare($sql2);
        $stmt->bind_param('ii',$time,$mid);
        $result2=$myData->query($sql2);
       echo '1';
    }
 ?>