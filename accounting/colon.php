<?php

// 取得POST的值
$w_id =filter_input(INPUT_POST,"w_id");
$email =filter_input(INPUT_POST,"email");
$title = filter_input(INPUT_POST,"title");


//$col = fillter_input(INPUT_POST,"col");
$email="eeeee@gmail.com";
$title="5 dfsgfdfgfgxu 動物農場 idhfihgjhsdughjsdbdfhgfhghfjhfjdhjh";

$arr=explode(" ",$title);
echo $arr[0];

$db=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($db,"set names utf8") ;
mysqli_select_db($db ,"accounting" );//後端資料庫為accounting


$sql = "SELECT m_id FROM member WHERE  m_email='".$email."'";
$result = mysqli_query($db,$sql); 
while ($row = mysqli_fetch_assoc($result)) {				
    $m_id = $row["m_id"];
}
if($title!=null){
    $sql2 = "INSERT INTO col (col_w_id,m_id) values('".$arr[0]."', '".$m_id."')";
    $result2 = mysqli_query($db,$sql2)or die("<br>SQL error!<br/>");
    if (!$result2) {
        printf("Error: %s\n", mysqli_error($db));
        exit();
       }
    else{
        echo'3';
    }
    exit;
}
else{
    $sql2 = "INSERT INTO col (col_w_id,m_id) values('".$w_id."', '".$m_id."')";
    $result2 = mysqli_query($db,$sql2)or die("<br>SQL error!<br/>");
    if (!$result2) {
        printf("Error: %s\n", mysqli_error($db));
        exit();
       }
    else{
        echo'1';
    }
   
}
mysqli_close($db); 
?>