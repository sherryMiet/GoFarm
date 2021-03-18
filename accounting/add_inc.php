
<?php

// 取得POST的值
$email =filter_input(INPUT_POST,"email");
$labelmom =filter_input(INPUT_POST,"labelmom");
$labelsub =filter_input(INPUT_POST,"labelsub");
echo $email.",". $labelmom.",".$labelsub;

/*$email = $_POST["email"];
$labelmom = $_POST["labelmom"];       		
$labelsub = $_POST["labelsub"];*/

/*$email="eeeee@gmail.com";
$labelmom="一般收入";
$labelsub="test";*/
//$strtag_id = NULL;

if($labelmom=="一般收入")
{$labelmom=1;}
elseif($labelmom=="投資")
{$labelmom=2;}

$db=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($db,"set names utf8") ;
mysqli_select_db($db ,"accounting" );//後端資料庫為accounting



$sql = "SELECT m_id FROM member WHERE  m_email='".$email."'";
$result = mysqli_query($db,$sql); 
while ($row = mysqli_fetch_assoc($result)) {				
    $m_id = $row["m_id"];
    $sql2 = "INSERT INTO inc_plabel_user (m_id, inc_mla_id,inc_pla_label) values('".$m_id."', '". $labelmom."','". $labelsub."')";
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



