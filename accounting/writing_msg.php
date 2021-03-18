<?php   

$email = filter_input(INPUT_POST,"email");
$id = filter_input(INPUT_POST,"write_id");
$msg = filter_input(INPUT_POST,"w_msg");

/*$email="eeeee@gmail.com";
$id=8;
$msg="你好";*/

 $db=mysqli_connect( "localhost" ,"root" ,"" );
 mysqli_query($db,"set names utf8") ;
 mysqli_select_db($db ,"accounting" );//後端資料庫為accounting

 $sql = "SELECT m_id,m_name FROM member WHERE  m_email='".$email."'";
$result = mysqli_query($db,$sql); 
while ($row = mysqli_fetch_assoc($result)) {				
    $m_id = $row["m_id"];
    $m_name=$row["m_name"];
}
    $sql2 = "INSERT INTO writing_msg (w_m_id,w_id,m_name,w_msg_aritle) values('".$m_id."', '". $id."', '". $m_name."','". $msg."')";
    $result2 = mysqli_query($db,$sql2)or die("<br>SQL error!<br/>");
    if (!$result2) {
        printf("Error: %s\n", mysqli_error($db));
        exit();
       }
    else{
        echo'1';
    }

mysqli_close($db); 
?>
    