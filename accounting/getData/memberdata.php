<?php
$data = file_get_contents("php://input"); //抓資料
$decode = json_decode($data,true);//解析json
$email =$decode['user']['email'];//把email從user抓出來

$myData=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($myData,"set names utf8") ;
mysqli_select_db($myData ,"accounting" );//後端資料庫為accounting

$sql = "SELECT m_id,m_name,m_followers,m_image 
        FROM member 
        WHERE m_email='".$email."' ";
$result = mysqli_query($myData,$sql)or die("SQL error!");

while($row = mysqli_fetch_assoc($result)){
    $array = array("m_id" => $row['m_id'],//將資料城陣列
        "m_name" => $row['m_name'],
        "m_followers" => $row['m_followers'],
        "m_image" => $row['m_image'],
    );
}
echo json_encode( $array );//轉成json格式

mysqli_close($myData);
?>