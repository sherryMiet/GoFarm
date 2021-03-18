<?php   

$email =filter_input(INPUT_POST,"email");
$date =filter_input(INPUT_POST,"date");
$SqlStr =filter_input(INPUT_POST,"SqlStr");

//$email =$_REQUEST["email"];
//$date=$_REQUEST["date"];
//$SqlStr=$_REQUEST["SqlStr"];

 $db=mysqli_connect( "localhost" ,"root" ,"" );
 mysqli_query($db,"set names utf8") ;
 mysqli_select_db($db ,"accounting" );//後端資料庫為accounting

 $sql2 = "SELECT m_id FROM member where  m_email='".$email."'";
 $result2 = mysqli_query($db,$sql2)or die(mysqli_error($db));

 while($row2 = mysqli_fetch_assoc($result2))
    {
    $mid=$row2['m_id'];
    }
    if($SqlStr=='pay'){
      $sql ="SELECT p.pay_text,p.pay_date,p.pay_money,s.pay_mla_label,u.pay_pla_label FROM `pay`as p join `pay_mlabel_system`as s on p.pay_mla_id = s.pay_mla_id join `pay_plabel_user` as u on p.pay_pla_id =u.pay_pla_id  where p.pay_date = '".$date."' and ( p.m_id = '0' or p.m_id='".$mid."')";
    }
    elseif($SqlStr=='income')
    {
      $sql ="SELECT p.inc_text,p.inc_date,p.inc_money,s.inc_mla_label,u.inc_pla_label FROM `income`as p join `inc_mlabel_system`as s on p.inc_mla_id = s.inc_mla_id join `inc_plabel_user` as u on p.inc_pla_id =u.inc_pla_id  where p.inc_date = '".$date."' and ( p.m_id = '0' or p.m_id='".$mid."')";
    }
    
    $result = mysqli_query($db,$sql)or die(mysqli_error($db));
    $arytags = array(); 
    while($row = mysqli_fetch_array($result))
    {
      if($SqlStr=='pay'){
        array_push( $arytags, array('mla' => $row['pay_mla_label'],'pla' => $row['pay_pla_label'],'moneyPay' => $row['pay_money'] ));
      }
      elseif($SqlStr=='income')
      {
        array_push( $arytags, array('mla' => $row['inc_mla_label'],'pla' => $row['inc_pla_label'],'moneyPay' => $row['inc_money'] ));
      }
      
       
      }	
    
    echo json_encode($arytags, JSON_UNESCAPED_UNICODE);
     
 ?>
    