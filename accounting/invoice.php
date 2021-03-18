<?php
$year= date('Y')-1911;
$month= date('m');
$month=$month-2;
if($month<=10){
	if($month%2==0){
		$month=$month-1;
		$getDate=$year."0".$month;
	}
	else{
		$getDate=$year."0".$month;
	}
}
else{
	if($month%2==0){
		$month=$month-1;
		$getDate=$year.$month;
	}
	else{
		$getDate=$year.$month;
	}
}
echo $getDate;


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://service.etax.nat.gov.tw/etw-main/front/ETW183W2_'.$getDate.'/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
$text = curl_exec($ch);

if (empty($text)) {echo "no found!!";}
else {
	//月份
	preg_match_all ('/<strong style=(.*)>(.*)<\/strong>/U', $text, $match);
	foreach ($match[0] as $key => $value) {
		$num[0]=substr($value,33,6);
	}
	//獎項
	preg_match_all ('/<span class=(.*)>(.*)<\/span>/U', $text, $match);
	foreach ($match[0] as $key => $value) {
		if($key==5){
			$num[1]=substr($value,21,8);//特別獎
		}
		elseif($key==6){
			$num[2]=substr($value,21,8);//特獎
		}
		elseif($key==7){//頭獎
			$num[3]=substr($value,21,8);
			$num[4]=substr($value,32,8);
			$num[5]=substr($value,43,8);
		}
		elseif($key==8){
			$num[6]=substr($value,21,3);
			$num[7]=substr($value,27,3);
		}
	}	
}
foreach($num as $key => $value){
	echo $key." =>". $value."<br>";
}
?>
<?php


$myData=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($myData,"set names utf8") ;
mysqli_select_db($myData ,"accounting" );//後端資料庫為accounting
$tmp=0;
foreach($num as $key => $value){
        $sql = "UPDATE invoice_month SET inm_num = ?  WHERE inm_id =?";
		$stmt = $myData->prepare($sql);
        $stmt->bind_param('si',$value,$tmp);
		$stmt->execute();
		$tmp= $tmp+1;


		if ($stmt->error) {
			echo "FAILURE!!! " . $stmt->error;
		  }
		  else echo "Updated {$stmt->affected_rows} rows";
		echo json_encode( "1");
	}
?>
<?php
/*$myData=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($myData,"set names utf8") ;
mysqli_select_db($myData ,"accounting" );//後端資料庫為accounting
$j=0;

//
        $sql = "UPDATE `invoice_month` SET `inm_num` ='?' WHERE `inm_id` = ?";
        $stmt = $myData->prepare($sql);
		$stmt->bind_param('si',$num[$j],$j);
		$stmt ->execute();
		$stmt->bind_result($num[$j]);

		$result=$myData->query($sql);
		while($stmt->fetch()){
			echo $num[$j];
		}*/
		//echo json_encode( "1");
//	}
?>

<!--https://www.itread01.com/content/1548929532.html-->



