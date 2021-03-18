<?php

/*	//連線資料庫。
    include("Conexion.clase.php");

	//執行查詢的SQL語法。
    $res = $db->query("select inc_pla_id,inc_pla_label from inc_plabel_user");
*/
$mlabel =filter_input(INPUT_POST,"mlabel2");
$plabel =filter_input(INPUT_POST,"plabel2");
$number =filter_input(INPUT_POST,"number2");
$date =filter_input(INPUT_POST,"date");
$email=filter_input(INPUT_POST,"email");

/*$mlabel =$_REQUEST["mlabel"];
$plabel =$_REQUEST["plabel"];
$number =$_REQUEST["number"];
$date =$_REQUEST["date"];
$email=$_REQUEST["email"];*/
$myData=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($myData,"set names utf8") ;
mysqli_select_db($myData ,"accounting" );//後端資料庫為accounting

$sql2 = "SELECT m_id FROM member where  m_email='".$email."'";
$result2 = mysqli_query($myData,$sql2)or die(mysqli_error($myData));

while($row2 = mysqli_fetch_assoc($result2))
   {
   $mid=$row2['m_id'];
   }

$sql3 = "SELECT inc_mla_id FROM inc_mlabel_system where  inc_mla_label='".$mlabel."'";
$result3 = mysqli_query($myData,$sql3)or die(mysqli_error($myData));
   
   while($row3 = mysqli_fetch_assoc($result3))
      {
      $mlabel_id=$row3['inc_mla_id'];
      }
    
 $sql4 = "SELECT inc_pla_id FROM inc_plabel_user where  inc_pla_label='".$plabel."'";
$result4 = mysqli_query($myData,$sql4)or die(mysqli_error($myData));

while($row4 = mysqli_fetch_assoc($result4))
   {
    $plabel_id=$row4['inc_pla_id'];

   }
echo $plabel;
$sql = "INSERT INTO income (m_id, inc_mla_id, inc_pla_id,inc_money,inc_date)
VALUES ('".$mid."', '".$mlabel_id."', '".$plabel_id."','".$number."','".$date."')";

$result = mysqli_query($myData,$sql)or die(mysqli_error($myData));

    //宣告一個字串陣列。
   
   mysqli_close($myData); 
?>