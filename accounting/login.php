<?php
$username =filter_input(INPUT_POST,"username");
$password =filter_input(INPUT_POST,"password");

$myData=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($myData,"set names utf8") ;
mysqli_select_db($myData ,"accounting" );//後端資料庫為accounting
$sql = "SELECT m_farmmoney,m_feedqty FROM member where  m_email='".$username."' and m_pwd ='".$password."' ";
$result = mysqli_query($myData,$sql)or die("<br>SQL error!<br/>");
if($data = mysqli_fetch_array($result)){
echo '1';	
}
?>