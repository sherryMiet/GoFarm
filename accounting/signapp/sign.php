<?php
$username =filter_input(INPUT_POST,"username");
$password =filter_input(INPUT_POST,"password");
$email =filter_input(INPUT_POST,"email");

$myData=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($myData,"set names utf8") ;
mysqli_select_db($myData ,"accounting" );//後端資料庫為accounting

$a = 0;

$name_sql = "SELECT * FROM member where  m_name='".$username."'";//查詢 暱稱 是否重複
$name_result = mysqli_query($myData,$name_sql)or die("<br>SQL error!<br/>");//取出資料

$email_sql = "SELECT * FROM member where  m_email='".$email."'";//查詢 email 是否重複
$email_result = mysqli_query($myData,$email_sql)or die("<br>SQL error!<br/>");//取出資料

if($email == ""){//email為空
    $a = 4;
    echo '4';
}elseif($password == ""){//密碼為空
    $a = 3;
    echo '3';
}elseif($email_data = mysqli_fetch_array($email_result)){//email重複
    $a = 1;
    echo '1';	
}elseif($username == ""){//暱稱為空
    $nameid = 0;
    do{
        $nameid = $nameid + 1;
        $Snameid = (String)$nameid;
        $username = "user".$Snameid;
        $m_blank_Name_data = "";

        $blank_Name_sql = "SELECT * FROM member where  m_name='".$username."'";//查詢符合的會員
        $blank_Name_result = mysqli_query($myData,$blank_Name_sql)or die("<br>SQL error!<br/>");//取出資料
        if($blank_Name_data = mysqli_fetch_array($blank_Name_result)){
            $m_blank_Name_data = $blank_Name_data['m_name'];
        }
    }while($m_blank_Name_data == $username);
}elseif($name_data = mysqli_fetch_array($name_result)){//暱稱重複
    $a = 2;
    echo '2';
}

if($a == 0 ){	
    $query = "INSERT INTO `member` (`m_email`,`m_name`,`m_pwd`,`m_followers`,`m_time`,`m_aniqty`,`m_feedqty`,`m_budget`) VALUES ('".$email."','".$username."','".$password."','0','00:00:00','0','0','0')";
    $result = mysqli_query($myData,$query)or die("<br>SQL error!<br/>");
}


mysqli_close($myData);
?>