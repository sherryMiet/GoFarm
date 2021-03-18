<?php

// 取得POST的值
$w_id =filter_input(INPUT_POST,"w_id");
$email =filter_input(INPUT_POST,"email");

/*$email="eeeee@gmail.com";
$w_id=11;
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
$sql3 = "SELECT * FROM writing WHERE  w_id='".$w_id."'";
$result3 = mysqli_query($db,$sql3); 
while ($row3 = mysqli_fetch_assoc($result3)) {				
    $w_billboard= $row3["w_billboard"];
    $w_title=$row3["w_title"];
    $w_aritle=$row3["w_aritle"];
    $w_m_id=$row3["w_m_id"];
}
$sqlch = "SELECT * FROM col WHERE  m_id='".$m_id."' and col_w_id='".$w_id."'";
$resultch = mysqli_query($db,$sqlch); 
while ($rowch = mysqli_fetch_assoc($resultch)) {				
    $ch_title=$rowch["col_title"];
    echo $ch_title;
}

if($ch_title!=null){
    echo'2';
    exit;
}
else{ $sql2 = "INSERT INTO col(m_id,col_w_id,col_m_id,col_billboard,col_title,col_aritle) values('".$m_id."','".$w_id."','".$w_m_id."', '".$w_billboard."','".$w_title."','".$w_aritle."')";
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