<?php

$myData=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($myData,"set names utf8") ;
mysqli_select_db($myData ,"accounting" );//後端資料庫為accounting

$sql = "SELECT pay_mla_label from pay_mlabel_system";
$result = mysqli_query($myData,$sql)or die("<br>SQL error!<br/>");

    //宣告一個字串陣列。
    $arytags = array();

    //將資料加入字串陣列中。
    while ($row = mysqli_fetch_assoc($result)) {   
        if(mysqli_num_rows($result)){
            $arytags[] = $row;
    }   
}

    //再透過json_encode函式，轉成JSON格式的字串。
	//如果是有中文字，要加JSON_UNESCAPED_UNICODE參數。中文字才不會變成亂碼。
   echo json_encode($arytags, JSON_UNESCAPED_UNICODE);
   mysqli_close($myData); 
?>