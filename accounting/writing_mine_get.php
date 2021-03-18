<?php
 $title =filter_input(INPUT_POST,"pname");
 //$pname = $_POST["pname"];
 //$title="test123";


 $db=mysqli_connect( "localhost" ,"root" ,"" );
 mysqli_query($db,"set names utf8") ;
 mysqli_select_db($db ,"accounting" );//後端資料庫為accounting
	
    //查詢書籍資料的SQL語法
    $sql = "SELECT * FROM writing where  w_title='".$title."'";
			
	//執行SQL語法，並且將資料轉成array
    $res = $db->query($sql);
    $arytags = array();

    while ($row = $res->fetch_assoc()) {
    	$arytags[] = $row;
    }    

	//輸出成JSON字串，要加JSON_UNESCAPED_UNICODE，中文字才不會變成亂碼
    echo json_encode($arytags, JSON_UNESCAPED_UNICODE);
?>