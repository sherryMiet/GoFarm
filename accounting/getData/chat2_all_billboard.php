<?php

//連線資料庫。
$myData=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($myData,"set names utf8") ;
mysqli_select_db($myData ,"accounting" );//後端資料庫為accounting

$sql = "SELECT w_billboard FROM writing";//查詢資料
$result = mysqli_query($myData,$sql)or die("SQL error!");//取出資料

$arytags = array();

if(mysqli_num_rows($result)){
    while($row = mysqli_fetch_assoc($result)){
        $a = count($arytags);
        $x = 0;
        for($i=0 ; $i<$a ; $i++){
            if($arytags[$i] == $row){
                $x = 1;
            }
        }
        if($x == 0){
            $arytags[] = $row;
        }
    }
}

echo json_encode($arytags, JSON_UNESCAPED_UNICODE);
?>