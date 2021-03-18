<?php
$board = file_get_contents("php://input");//接收會員的email
//$board="";

$db=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($db,"set names utf8") ;
mysqli_select_db($db ,"accounting" );//後端資料庫為accounting

if($board =="理財規劃" or $board =="動物農場" or $board =="其他" or $board =="閒話家常"){
   $sql = "SELECT w_id,w_billboard,w_title,w_aritle,w_like,m_name,m_email
        FROM writing as W , member as M
        WHERE  M.m_id = w_m_id and W.w_billboard = '$board'";//查詢符合的會員
        $result = mysqli_query($db,$sql)or die("SQL error!");//取出資料

        if(mysqli_num_rows($result)){
            while($row = mysqli_fetch_assoc($result)){
                $array[] = $row;
            }
        }
    echo json_encode($array,JSON_UNESCAPED_UNICODE);
}
else{
    $sql = "SELECT w_id,w_billboard,w_title,w_aritle,w_like,m_name,m_email
        FROM writing as W , member as M
        WHERE  M.m_id = w_m_id ";//查詢符合的會員
        $result = mysqli_query($db,$sql)or die("SQL error!");//取出資料
        if(mysqli_num_rows($result)){
             while($row = mysqli_fetch_assoc($result)){
                $array[] = $row;
            }
        }
    echo json_encode($array,JSON_UNESCAPED_UNICODE);
}
mysqli_close($db); 
?> 