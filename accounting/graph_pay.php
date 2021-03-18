<?php
$email =filter_input(INPUT_POST,"email");
//$email="eeeee@gmail.com";
$eat=0;$cost=0;$living=0;$traffic=0;$entertainm=0;
$hospital=0;$tax=0;$other=0;$tatol=0;

$db=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($db,"set names utf8") ;
mysqli_select_db($db ,"accounting" );//後端資料庫為accounting

$sql2 = "SELECT m_id FROM member where  m_email='".$email."'";
$result2 = mysqli_query($db,$sql2)or die("<br>SQL error!<br/>");

while($row2 = mysqli_fetch_assoc($result2)){
   $mid=$row2['m_id'];}

$sql ="SELECT pay_mla_id, pay_money ,pay_date FROM `pay` where  m_id='".$mid."'";
$result = mysqli_query($db,$sql)or die("<br>SQL error!<br/>");

while($row = mysqli_fetch_array($result))
{
  if($row['pay_mla_id']==1){
      $eat=$eat+$row['pay_money'];
   }
  elseif($row['pay_mla_id']==2){
      $cost=$cost+$row['pay_money'];
   }
  elseif($row['pay_mla_id']==3){
      $living=$living+$row['pay_money'];
   }
  elseif($row['pay_mla_id']==4){
      $traffic=$traffic+$row['pay_money'];
   }
  elseif($row['pay_mla_id']==5){
      $entertainm=$entertainm+$row['pay_money'];
   }
  elseif($row['pay_mla_id']==6){
      $hospital=$hospital+$row['pay_money'];
   }
  elseif($row['pay_mla_id']==7){
   $tax=$tax+$row['pay_money'];
   }
}	
 /*echo $eat."<br>".$cost."<br>".$living."<br>".$traffic."<br>".$entertainm
  ."<br>".$hospital."<br>".$tax."<br>".$other;*/
  $total=$eat+$cost+$living+$traffic+$entertainm+$hospital+$tax;
  // echo $total;
  $eat=round($eat/$total*100);$cost=round($cost/$total*100);$living=round($living/$total*100);$traffic=round($traffic/$total*100);
  $hospital=round($hospital/$total*100);$entertainm=round($entertainm/$total*100);$tax=round($tax/$total*100);
  if(($eat+$cost+$living+$traffic+$entertainm+$hospital+$tax)!=100){$other=1;}
  
  $arytags = 
  array( 'eat'=>$eat,
         'cost'=>$cost,
         'living'=>$living,
         'traffic'=>$traffic,
         'entertainm'=>$entertainm,
         'hospital'=>$hospital,
         'tax'=>$tax,
         'other'=>$other,
      );
     
    echo json_encode($arytags);

 
  ?>
<!--https://www.youtube.com/watch?v=iS7EgKnyDeY(android 圓餅圖)-->