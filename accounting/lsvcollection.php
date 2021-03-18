<?php
$email = filter_input(INPUT_POST,"email");//接收會員的email

//$email="eeeee@gmail.com";

$db=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($db,"set names utf8") ;
mysqli_select_db($db ,"accounting" );//後端資料庫為accounting

$sql2 = "SELECT * FROM member WHERE m_email = '".$email."'";
$result2 =mysqli_query($db,$sql2)or die("id SQL error!");
while($row2 = mysqli_fetch_assoc($result2)){
    $m_id = $row2['m_id'];
}
$sql ="SELECT col_w_id,col_m_id,col_title,col_billboard,col_aritle FROM col WHERE m_id='".$m_id."'";
     $result =mysqli_query($db,$sql)or die(" SQL error!");
     $arytags = array(); 
     while($row = mysqli_fetch_assoc($result)){
        $col_m_id=$row['col_m_id'];
        $sql3 ="SELECT m_name FROM member WHERE m_id='".$col_m_id."'";
        $result3 =mysqli_query($db,$sql3)or die("id SQL error!");
        while($row3 = mysqli_fetch_assoc($result3)){
         $row['col_m_id']=$row3['m_name'];
        } $arytags[] = $row;
     }	
     echo json_encode($arytags, JSON_UNESCAPED_UNICODE);
mysqli_close($db); 
?> 
