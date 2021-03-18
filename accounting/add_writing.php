
<?php

// 取得POST的值
$email =filter_input(INPUT_POST,"email");
$w_title =filter_input(INPUT_POST,"w_title");
$w_billboard =filter_input(INPUT_POST,"w_billboard");
$w_aritle=filter_input(INPUT_POST,"w_aritle");


$db=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($db,"set names utf8") ;
mysqli_select_db($db ,"accounting" );//後端資料庫為accounting

$sql = "SELECT m_id FROM member WHERE  m_email='".$email."'";
$result = mysqli_query($db,$sql); 
while ($row = mysqli_fetch_assoc($result)) {				
    $m_id = $row["m_id"];
    $sql2 = "INSERT INTO writing (w_m_id,w_billboard,w_title,w_aritle) values('".$m_id."', '".$w_billboard."','".$w_title."','".$w_aritle."')";
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



