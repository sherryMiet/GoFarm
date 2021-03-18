<?php

    // 取得POST的值
    $email =filter_input(INPUT_POST,"email");
    $labelmom =filter_input(INPUT_POST,"labelmom");
    $labelsub =filter_input(INPUT_POST,"labelsub");
    //echo $email.",". $labelmom.",".$labelsub;
    
    if($labelmom=="eat"){$labelmom=1;}
    elseif($labelmom=="cost"){$labelmom=2;}
    elseif($labelmom=="living"){$labelmom=3;}
    elseif($labelmom==" traffic"){$labelmom=4;}
    elseif($labelmom=="entertainm"){$labelmom=5;}
    elseif($labelmom=="hospital"){$labelmom=6;}
    elseif($labelmom=="tax"){$labelmom=7;}
    else{$labelmom=8;}
    
    
   
    
	$db=mysqli_connect( "localhost" ,"root" ,"" );
    mysqli_query($db,"set names utf8") ;
    mysqli_select_db($db ,"accounting" );//後端資料庫為accounting

    $sql = "SELECT m_id FROM member WHERE  m_email='".$email."'";
    $result = mysqli_query($db,$sql); 
    while ($row = mysqli_fetch_assoc($result)) {				
        $m_id = $row["m_id"];
        $sql2 = "INSERT INTO pay_plabel_user (m_id, pay_mla_id,pay_pla_label) values('".$m_id."', '". $labelmom."','". $labelsub."')";
        $result2 = mysqli_query($db,$sql2)or die("<br>SQL error!<br/>");
        if (!$result2) {
             printf("Error: %s\n", mysqli_error($db));
                exit();
         }
        else{
             echo'1';
         }
    }
    mysqli_close($db); 
?>

