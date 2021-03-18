<?PHP /*抓網頁資料*/ 
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
else {//月份
	preg_match_all ('/<strong style=(.*)>(.*)<\/strong>/U', $text, $match);
	foreach ($match[0] as $key => $value) {
		$num[0]= substr($value,33,6);
	}
	preg_match_all ('/<span class=(.*)>(.*)<\/span>/U', $text, $match);
	foreach ($match[0] as $key => $value) {
		if($key==5){
			$num[1]=substr($value,26,3);//特別獎
		}
		elseif($key==6){
            $num[2]=substr($value,26,3);//特獎
		}
		elseif($key==7){//頭獎
			$num[3]=substr($value,26,3);
			$num[4]=substr($value,37,3);
			$num[5]=substr($value,48,3);
        }
		elseif($key==8){//增開六獎
			$num[6]=substr($value,21,3);
			$num[7]=substr($value,27,3);
		}
	}	
}
/*foreach($num as $key => $value){
		echo $key." =>". $value."<br>";}*/
?>
<?php	/*android */

$email =filter_input(INPUT_POST,"email");
$invoice3=filter_input(INPUT_POST,"invoice3");

//$email="eeeee@gmail.com";
//$invoice3="602";

$today = getdate();
 date("Y-m-d");  //日期格式化
 $year = $today["year"]; //年
 $month = $today["mon"]; //月
 $day = $today["mday"];  //日
  
 //這兩串資料分別為資料庫欄位中日期, 及時間的資料
  $today_date=$year."-".$month."-".$day;


$db=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($db,"set names utf8") ;
mysqli_select_db($db ,"accounting" );//後端資料庫為accounting

$sql = "SELECT m_id FROM member WHERE  m_email='".$email."'";
	$result = mysqli_query($db,$sql)or die("<br>SQL error mid !<br/>");
	while ($row = mysqli_fetch_assoc($result)) {				
		$m_id = $row["m_id"];
	}

if($invoice3==$num[6] or $invoice3==$num[7]){ //增開六獎
	$sql2="INSERT INTO `invoice2`( `m_id`, `inv_month`, `inv_date`, `inv_no`, `inv_award`, `pay_id`) VALUES ($m_id,'$num[0]','$today_date',$invoice3,'增開六獎',$m_id)";
    $result2 = mysqli_query($db,$sql2)or die("<br>SQL error invoice !<br/>");
	echo json_encode("2"); exit();
}
elseif($invoice3==$num[1] or $invoice3==$num[2] or $invoice3==$num[3] or $invoice3==$num[4] or $invoice3==$num[5]){ //待確認中獎與否
	echo json_encode("1");exit();} 
else{ 
	$sql2="INSERT INTO `invoice2`( `m_id`, `inv_month`, `inv_date`, `inv_no`, `inv_award`, `pay_id`) VALUES ($m_id,'$num[0]','$today_date',$invoice3,'未中獎',$m_id)";
    $result2 = mysqli_query($db,$sql2)or die("<br>SQL error invoice !<br/>");
	echo json_encode("3"); exit();}
?>

<!--https://www.javaworld.com.tw/jute/post/view?bid=26&id=321923-->


