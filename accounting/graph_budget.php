<?php
$email =filter_input(INPUT_POST,"email");
//$email="eeeee@gmail.com";
$inc=0;$pay=0;$budget=0;$other=0;$tatol=0;

$db=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($db,"set names utf8") ;
mysqli_select_db($db ,"accounting" );//後端資料庫為accounting

$sql2 = "SELECT m_id FROM member where  m_email='".$email."'";
$result2 = mysqli_query($db,$sql2)or die("<br>SQL error!<br/>");
while($row2 = mysqli_fetch_assoc($result2)){
   $mid=$row2['m_id'];}

$sqlbudget ="SELECT m_budget  FROM `member` where  m_id='".$mid."'";
$resultbudget = mysqli_query($db,$sqlbudget)or die("<br>SQL error!<br/>");
while($row = mysqli_fetch_array($resultbudget))
{
    $inc=$inc+$row['m_budget'];
}	

$sqlinc ="SELECT inc_money ,inc_date FROM `inc` where  m_id='".$mid."'";
$resultinc = mysqli_query($db,$sqlinc)or die("<br>SQL error!<br/>");
while($row = mysqli_fetch_array($resultinc))
{
    $inc=$inc+$row['inc_money'];
}	

$sqlpay ="SELECT pay_money ,pay_date FROM `pay` where  m_id='".$mid."'";
$resultpay = mysqli_query($db,$sqlpay)or die("<br>SQL error!<br/>");
while($row = mysqli_fetch_array($resultpay))
{
    $pay=$pay+$row['pay_money'];
}	

  $total=$inc+$pay;
  // echo $total;
  $inc=round($inc/$total*100);
  $pay=round($pay/$total*100);
  if(($inc+$pay)!=100){
      $other=(100-$inc+$pay);
    }
  $arytags = 
  array( 'inc'=>$inc,
         'pay'=>$pay,
         'other'=>$other,
      );
     
    echo json_encode($arytags);

 
  ?>
<!--https://www.youtube.com/watch?v=iS7EgKnyDeY(android 圓餅圖)-->