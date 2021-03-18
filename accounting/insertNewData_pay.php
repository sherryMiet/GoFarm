<?php

$mlabel =filter_input(INPUT_POST,"mlabel");
$plabel =filter_input(INPUT_POST,"plabel");
$number =filter_input(INPUT_POST,"number");
$date =filter_input(INPUT_POST,"date");
$email=filter_input(INPUT_POST,"email");

$myData=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($myData,"set names utf8") ;
mysqli_select_db($myData ,"accounting" );//後端資料庫為accounting

$sql2 = "SELECT m_id FROM member where  m_email='".$email."'";
$result2 = mysqli_query($myData,$sql2)or die(mysqli_error($myData));

while($row2 = mysqli_fetch_assoc($result2))
   {
   $mid=$row2['m_id'];
   }

$sql3 = "SELECT pay_mla_id FROM pay_mlabel_system where  pay_mla_label='".$mlabel."'";
$result3 = mysqli_query($myData,$sql3)or die(mysqli_error($myData));
   
   while($row3 = mysqli_fetch_assoc($result3))
      {
      $mlabel_id=$row3['pay_mla_id'];
      }
    
 $sql4 = "SELECT pay_pla_id FROM pay_plabel_user where  pay_pla_label='".$plabel."'";
$result4 = mysqli_query($myData,$sql4)or die(mysqli_error($myData));

while($row4 = mysqli_fetch_assoc($result4))
   {
    $plabel_id=$row4['pay_pla_id'];

   }

$sql = "INSERT INTO pay (m_id,pay_mla_id,pay_pla_id,pay_money,pay_date)
VALUES ('".$mid."', '".$mlabel_id."', '".$plabel_id."','".$number."','".$date."')";

$result = mysqli_query($myData,$sql)or die(mysqli_error($myData));

    //宣告一個字串陣列。
   
   mysqli_close($myData); 
?>