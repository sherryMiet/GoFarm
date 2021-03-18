<?php

$mlabel =filter_input(INPUT_POST,"mlabel");
$email=filter_input(INPUT_POST,"email");
$myData=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($myData,"set names utf8") ;
mysqli_select_db($myData ,"accounting" );//後端資料庫為accounting

$sql2 = "SELECT m_id FROM member where  m_email='".$email."'";
$result2 = mysqli_query($myData,$sql2)or die(mysqli_error($db));

while($row2 = mysqli_fetch_assoc($result2))
   {
   $mid=$row2['m_id'];
   }

$sql = "SELECT * from pay_plabel_user as u join pay_mlabel_system as s on u.pay_mla_id = s.pay_mla_id where s.pay_mla_label ='".$mlabel."' and (u.m_id='".$mid."' or u.m_id=0)";

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