<?php
//$day = "%".filter_input(INPUT_POST,"day")."%";
$day = "%".date("Y-m")."%";
// $email="eeeee@gmail.com";
$email = filter_input(INPUT_POST,"email");
$myData=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($myData,"set names utf8") ;
mysqli_select_db($myData ,"accounting" );


$sql3 = "SELECT m_id FROM member where  m_email='".$email."'";
$result3 = mysqli_query($myData,$sql3)or die(mysqli_error($myData));

while($row3 = mysqli_fetch_assoc($result3))
   {
   $mid=$row3['m_id'];
   }

//$sql = "SELECT id,account,pwd from query_string";
$sql2  = "SELECT p.m_id, SUM(pay_money) as Mon_total_pay , SUM(inc_money) as Mon_total_income , (SUM(inc_money)-SUM(pay_money)) as amount 
,m_budget
from pay as p join income as i on i.m_id = p.m_id join member m on m.m_id = p.m_id where 
pay_date like '$day'  
and p.m_id = '$mid'
and inc_date like '$day'  
and i.m_id = '$mid'
 group by p.m_id,i.m_id";
$result = mysqli_query($myData,$sql2)or die(mysqli_error($myData));

    //宣告一個字串陣列。
    $arytags = array();
    //將資料加入字串陣列中。
    while ($row = mysqli_fetch_assoc($result)) {   
        if(mysqli_num_rows($result)){
            $arytags[] = $row;
    }   
}

   echo json_encode($arytags, JSON_UNESCAPED_UNICODE);
   mysqli_close($myData); 
//mysql_close();

?>    