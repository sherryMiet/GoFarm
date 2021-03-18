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
    $sql ="SELECT * FROM `inc_plabel_user` where m_id = '0' or m_id='".$mid."'";
    $result = mysqli_query($db,$sql)or die("<br>SQL error!<br/>");
    $arytags = array(); 
    while($row = mysqli_fetch_array($result))
    {
        if($row['inc_mla_id']=='1'){
             $row['inc_mla_id']='一般收入';
          }
        elseif($row['inc_mla_id']=='2'){
             $row['inc_mla_id']='投資';
       }
      $arytags[] = $row;
      }	
    
    echo json_encode($arytags, JSON_UNESCAPED_UNICODE);
     
 ?>

<!--https://ithelp.ithome.com.tw/articles/10205846-->
    