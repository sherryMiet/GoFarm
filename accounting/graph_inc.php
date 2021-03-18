<?php
$email =filter_input(INPUT_POST,"email");
//$email="eeeee@gmail.com";
$general=0;$investment=0;$other=0;$tatol=0;

$db=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($db,"set names utf8") ;
mysqli_select_db($db ,"accounting" );//後端資料庫為accounting

$sql2 = "SELECT m_id FROM member where  m_email='".$email."'";
$result2 = mysqli_query($db,$sql2)or die("<br>SQL error!<br/>");

while($row2 = mysqli_fetch_assoc($result2)){
   $mid=$row2['m_id'];}

$sql ="SELECT inc_mla_id, inc_money ,inc_date FROM `inc` where  m_id='".$mid."'";
$result = mysqli_query($db,$sql)or die("<br>SQL error!<br/>");

while($row = mysqli_fetch_array($result))
{
  if($row['inc_mla_id']==1){
      $general=$general+$row['inc_money'];
   }
  elseif($row['inc_mla_id']==2){
      $investment=$investment+$row['inc_money'];
   }
}	

  $total=$general+$investment;
  // echo $total;
  $general=round($general/$total*100);
  $investment=round($investment/$total*100);
  if(($general+$investment)!=100){
      $other=(100-$general+$investment);
    }
  
  $arytags = 
  array( 'general'=>$general,
         'investment'=>$investment,
         'other'=>$other,
      );
     
    echo json_encode($arytags);

 
  ?>
<!--https://www.youtube.com/watch?v=iS7EgKnyDeY(android 圓餅圖)-->