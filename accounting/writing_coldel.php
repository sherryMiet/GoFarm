<?php

// 取得POST的值
$title =filter_input(INPUT_POST,"title");
$email =filter_input(INPUT_POST,"email");
$arr=explode(" ",$title);

/*$email="eeeee@gmail.com";*/

$db=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($db,"set names utf8") ;
mysqli_select_db($db ,"accounting" );//後端資料庫為accounting

$sql = "SELECT m_id FROM member WHERE  m_email='".$email."'";
$result = mysqli_query($db,$sql); 
while ($row = mysqli_fetch_assoc($result)) {				
    $m_id = $row["m_id"];
}
$sql3 = "DELETE FROM col WHERE  m_id='".$m_id."' and col_w_id='".$arr[0]."'";
if (mysqli_query($db, $sql3)) {
    echo "1";
} else {
    echo "2" . mysqli_error($db);
}

mysqli_close($db); 
?>