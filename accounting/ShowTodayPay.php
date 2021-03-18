<?php   

$email = filter_input(INPUT_POST,"email2");
// $email = "eeeee@gmail.com";

$date = date("Y-m-d");
 $db=mysqli_connect( "localhost" ,"root" ,"" );
 mysqli_query($db,"set names utf8") ;
 mysqli_select_db($db ,"accounting" );//後端資料庫為accounting

 $sql2 = "SELECT m_id FROM member where  m_email='".$email."'";
 $result2 = mysqli_query($db,$sql2)or die(mysqli_error($db));

 while($row2 = mysqli_fetch_assoc($result2))
    {
    $mid=$row2['m_id'];
    }

    $sql ="SELECT p.pay_text,p.pay_date,p.pay_money,s.pay_mla_label,u.pay_pla_label FROM `pay`as p join `pay_mlabel_system`as s on p.pay_mla_id = s.pay_mla_id join `pay_plabel_user` as u on p.pay_pla_id =u.pay_pla_id  where p.pay_date = '".$date."' and ( p.m_id = '0' or p.m_id='".$mid."')";

    $result = mysqli_query($db,$sql)or die(mysqli_error($db));
    $arytags = array(); 
    while($row = mysqli_fetch_array($result))
    {
        array_push( $arytags, array('mla' => $row['pay_mla_label'],'pla' => $row['pay_pla_label'],'moneyPay' => $row['pay_money'] ));     
      }	
    
    echo json_encode($arytags, JSON_UNESCAPED_UNICODE);
     
 ?>
    