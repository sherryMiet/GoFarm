<?php
$data = file_get_contents("php://input"); //抓資料
$decode = json_decode($data,true);//解析json
$id =$decode['user']['id'];//把id從user抓出來

$myData=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($myData,"set names utf8") ;
mysqli_select_db($myData ,"accounting" );//後端資料庫為accounting

$sql = "SELECT m_id,m_name,m_followers,m_image 
        FROM member 
        WHERE m_id='".$id."' ";//查詢符合的會員
$result = mysqli_query($myData,$sql)or die("SQL error!");//取出資料

while($r = mysqli_fetch_assoc($result)){

    $array = array(
    "m_image" => $r['m_image'],//將資料寫進陣列
    );
    
    foreach ($array as $img){
        $finally = base64_encode($img);
    }
}
echo json_encode( $array );//轉成json格式

mysqli_close($myData);
?>