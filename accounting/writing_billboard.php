<?php   

$w_billboard =filter_input(INPUT_POST,"board");

//$w_billboard="其他";
 $db=mysqli_connect( "localhost" ,"root" ,"" );
 mysqli_query($db,"set names utf8") ;
 mysqli_select_db($db ,"accounting" );//後端資料庫為accounting
if($w_billboard!="理財規劃" or $w_billboard!="動物農場" or $w_billboard!="其他" or $w_billboard!="閒話家常"){
    $sql ="SELECT * FROM `writing`";
    $result = mysqli_query($db,$sql)or die("<br>SQL error!<br/>");
    $arytags = array(); 
    while($row = mysqli_fetch_array($result))
    {
      $arytags[] = $row;
    }	
}
else{
    $sql ="SELECT * FROM `writing` where w_billboard = '".$w_billboard."'";
    $result = mysqli_query($db,$sql)or die("<br>SQL error!<br/>");
    $arytags = array(); 
    while($row = mysqli_fetch_array($result))
    {
      $arytags[] = $row;
    }	
}  
    echo json_encode($arytags, JSON_UNESCAPED_UNICODE);
     
 ?>
    