<?php
$email =filter_input(INPUT_POST,"email");//收到帳號
$password =filter_input(INPUT_POST,"password");//密碼

$myData=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($myData,"set names utf8") ;
mysqli_select_db($myData ,"accounting" );//後端資料庫為accounting

$sql = "SELECT * FROM member
        WHERE  m_email='".$email."' and m_pwd ='".$password."' ";//查詢符合的會員
$result = mysqli_query($myData,$sql)or die("<br>SQL error!<br/>");//取出資料

if($data = mysqli_fetch_array($result)){//若資料有錯誤，則回傳錯誤給 android studio
echo '1';	
}

mysqli_close($myData);
?>