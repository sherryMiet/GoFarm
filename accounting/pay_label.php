<?php   

$email =filter_input(INPUT_POST,"email");

 $db=mysqli_connect( "localhost" ,"root" ,"" );
 mysqli_query($db,"set names utf8") ;
 mysqli_select_db($db ,"accounting" );//後端資料庫為accounting

 $sql2 = "SELECT m_id FROM member where  m_email='".$email."'";
 $result2 = mysqli_query($db,$sql2)or die("<br>SQL error!<br/>");

 while($row2 = mysqli_fetch_assoc($result2))
    {
    $mid=$row2['m_id'];
    }
    $sql ="SELECT * FROM `pay_plabel_user` where m_id = '0' or m_id='".$mid."'";
    $result = mysqli_query($db,$sql)or die("<br>SQL error!<br/>");
    $arytags = array(); 
    while($row = mysqli_fetch_array($result))
    {
      if($row['pay_mla_id']==1)
        {$row['pay_mla_id']="eat";}
      elseif($row['pay_mla_id']==2)
        {$row['pay_mla_id']="cost";}
      elseif($row['pay_mla_id']==3)
        {$row['pay_mla_id']="living";}
      elseif($row['pay_mla_id']==4)
        {$row['pay_mla_id']=" traffic";}
      elseif($row['pay_mla_id']==5)
        {$row['pay_mla_id']="entertainm";}
      elseif($row['pay_mla_id']==6)
        {$row['pay_mla_id']="hospital";}
      elseif($row['pay_mla_id']==7)
        {$row['pay_mla_id']="tax";}
      else{$labelmom=8;}
      $arytags[] = $row;
      }	
    
    echo json_encode($arytags, JSON_UNESCAPED_UNICODE);
     
 ?>
    