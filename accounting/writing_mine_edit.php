<?php
    
	// 取得POST的值	
    $strtitle = $_POST["w_title"];
	$straritle = $_POST["w_aritle"];       		
	$strbillboard = $_POST["w_billboard"];
	$strid = "1";
	
	//$id = $_POST["strid"];
	
	$db=mysqli_connect( "localhost" ,"root" ,"" );
    mysqli_query($db,"set names utf8") ;
    mysqli_select_db($db ,"accounting" );//後端資料庫為accounting
	
	// 取得tag_id
	$sql = "SELECT * FROM writing WHERE w_title='".$strtitle."'";

	// 執行SQL指令	
    $rows = mysqli_query($db,$sql); 

	while ($row = $rows->fetch_assoc()) {				
		$w_id = $row["w_id"];
	}	

    // 建立SQL字串	
    $sql = "UPDATE writing SET w_title='".$strtitle.
			"', w_aritle='".$straritle.					
            "', w_title=".$strtitle." WHERE w_id=".$w_id;
							
    //echo $sql;

	// 執行SQL指令	
    mysqli_query($db,$sql); 

	// 關閉連接	
    mysqli_close($db); 
	
	// 回傳值	
	echo "更新資料成功。";
?>