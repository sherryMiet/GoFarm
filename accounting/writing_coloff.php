<?php

// 取得POST的值
$w_id =filter_input(INPUT_POST,"w_id");
$email =filter_input(INPUT_POST,"email");

/*$email="eeeee@gmail.com";
$w_id=7;
$user ="jj";
$w_title ="test";
$w_billboard="其他";
$w_aritle="test";*/

$db=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($db,"set names utf8") ;
mysqli_select_db($db ,"accounting" );//後端資料庫為accounting

$sql = "SELECT m_id FROM member WHERE  m_email='".$email."'";
$result = mysqli_query($db,$sql); 
while ($row = mysqli_fetch_assoc($result)) {				
    $m_id = $row["m_id"];
}
$sql3 = "DELETE FROM col WHERE  m_id='".$m_id."' and col_w_id='".$w_id."'";
if (mysqli_query($db, $sql3)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($db);
}

mysqli_close($db); 
?>