<?php

	//引用資料庫連接檔案
    $db=mysqli_connect( "localhost" ,"root" ,"" );
    mysqli_query($db,"set names utf8") ;
    mysqli_select_db($db ,"accounting" );//後端資料庫為accounting
    
	//查詢分類資料的SQL語法
	//查詢分類資料的SQL語法
	//執行SQL語法，並且將資料轉成array
    $res = $db->query("SELECT * FROM `pay_mlabel_system`");
    
    $arytags = array();

    while ($row = $res->fetch_assoc()) {
    	$arytags[] = $row;
    }   
    
	//輸出成JSON字串，要加JSON_UNESCAPED_UNICODE，中文字才不會變成亂碼	
    echo json_encode($arytags, JSON_UNESCAPED_UNICODE);
?>