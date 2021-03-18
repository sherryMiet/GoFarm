<?php

$memail = file_get_contents("php://input");//接收會員的email

$myData=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($myData,"set names utf8") ;
mysqli_select_db($myData ,"accounting" );//後端資料庫為accounting

$idsql = "SELECT * FROM member WHERE m_email = '".$memail."'";
$idresult =mysqli_query($myData,$idsql)or die("id SQL error!");
while($idrow = mysqli_fetch_assoc($idresult)){
    $id = $idrow['m_id'];
}

$sql = "SELECT w_id,w_billboard,w_title,w_aritle,w_like,m_name,m_email
        FROM writing as W , member as M
        WHERE W.w_m_id = $id and M.m_id = w_m_id ";//查詢符合的會員
$result = mysqli_query($myData,$sql)or die("SQL error!");//取出資料


if(mysqli_num_rows($result)){
    while($row = mysqli_fetch_assoc($result)){
        $array[] = $row;
    }
}

echo json_encode($array,JSON_UNESCAPED_UNICODE);

mysqli_close($myData); 
?> 