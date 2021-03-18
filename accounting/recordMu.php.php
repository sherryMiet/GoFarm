<?php
session_start();
$dsn = "mysql:host=rensv.synology.me;dbname=cubemumu";
$dbh = new pdo($dsn,'rockuo','jj088514');
$dbh ->exec("set character set utf8");

$p1= $_POST['p1'];//$_POST 后面的名字是在unity里面需要调用的 
$p2 =$_POST['p2'];
$winner =$_POST['winner'];
$time =$_POST['time'];
$a =$_POST['TimeData'];

$myData=mysqli_connect( "rensv.synology.me" ,"rockuo" ,"jj088514" );
mysqli_query($myData,"set names utf8") ;
mysqli_select_db($myData ,"cubemumu" );//後端資料庫為accounting

$query = "INSERT INTO `2p_game` (`2P_p1`,`2P_p2`,`2P_winner`,`2P_time`,`2P_timeData`) VALUES ('".$p1."','".$p2."','".$winner."','".$time."','".$a."')";
$result = mysqli_query($myData,$query)or die("<br>SQL error!<br/>");


?>