<?php

$data = file_get_contents("php://input"); //抓資料
$decode = json_decode($data,true);//解析json
$id =$decode['writing']['id'];//把email從user抓出來

$myData=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($myData,"set names utf8") ;
mysqli_select_db($myData ,"accounting" );//後端資料庫為accounting

$sql = "SELECT m_email,m_name,m_followers,m_email,w_title,w_billboard,w_aritle
        FROM member AS M , writing AS W 
        WHERE W.w_id = $id AND W.w_m_id = M.m_id";
$result = mysqli_query($myData,$sql)or die("SQL error!");

while($row = mysqli_fetch_assoc($result)){
    $array = array("m_email" => $row['m_email'],//將資料城陣列
        "m_name" => $row['m_name'],
        "m_followers" => $row['m_followers'],
        "m_email" => $row['m_email'],
        "w_title" => $row['w_title'],
        "w_billboard" => $row['w_billboard'],
        "w_aritle" => $row['w_aritle'],
    );
}

echo json_encode($array,JSON_UNESCAPED_UNICODE);//轉成json格式

mysqli_close($myData);
?>