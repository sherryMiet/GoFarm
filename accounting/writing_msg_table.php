<?php
    $id = filter_input(INPUT_POST,"id");
    $db=mysqli_connect( "localhost" ,"root" ,"" );
    mysqli_query($db,"set names utf8") ;
    mysqli_select_db($db ,"accounting" );//後端資料庫為accounting


     $sql ="SELECT * FROM `writing_msg` where w_id='".$id."'";
    $result = mysqli_query($db,$sql)or die("<br>SQL error!<br/>");
    $arytags = array(); 
    while($row = mysqli_fetch_array($result))
    {
      $arytags[] = $row;
      }	
    
    echo json_encode($arytags, JSON_UNESCAPED_UNICODE);
     
 ?>

?>