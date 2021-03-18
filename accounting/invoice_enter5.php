<?PHP
$myData=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($myData,"set names utf8") ;
mysqli_select_db($myData ,"accounting" );//後端資料庫為accounting

$i=0;

$sql = "SELECT inm_num FROM invoice_month ";
$result = mysqli_query($myData,$sql)or die("<br>SQL error!<br/>");
while($row = mysqli_fetch_array($result))
    {
		$num[$i]=$row['inm_num'];
		$i=$i+1;
	}

	/*foreach($num as $key => $value){
		echo $key." =>". $value."<br>";}*/
	
?>
<?php
$email =filter_input(INPUT_POST,"email");
$invoice3=filter_input(INPUT_POST,"invoice3");
$invoice5=filter_input(INPUT_POST,"invoice5");

$invoice=$invoice5.$invoice3;

$today = getdate();
 date("Y-m-d");  //日期格式化
 $year = $today["year"]; //年
 $month = $today["mon"]; //月
 $day = $today["mday"];  //日
 $today_date=$year."-".$month."-".$day;

$in[1]=substr($invoice,1,7); $num1[1]=substr($num[3],1,7); $num2[1]=substr($num[4],1,7); $num3[1]=substr($num[5],1,7);
$in[2]=substr($invoice,2,6); $num1[2]=substr($num[3],2,7); $num2[2]=substr($num[4],2,6); $num3[2]=substr($num[5],2,6);
$in[3]=substr($invoice,3,5); $num1[3]=substr($num[3],3,7); $num2[3]=substr($num[4],3,5); $num3[3]=substr($num[5],3,5);
$in[4]=substr($invoice,4,4); $num1[4]=substr($num[3],4,7); $num2[4]=substr($num[4],4,4); $num3[4]=substr($num[5],4,4);
$in[5]=substr($invoice,5,3); $num1[5]=substr($num[3],5,7); $num2[5]=substr($num[4],5,3); $num3[5]=substr($num[5],5,3);

$db=mysqli_connect( "localhost" ,"root" ,"" );
mysqli_query($db,"set names utf8") ;
mysqli_select_db($db ,"accounting" );//後端資料庫為accounting

$sql = "SELECT m_id FROM member WHERE  m_email='".$email."'";
$result = mysqli_query($db,$sql); 
while ($row = mysqli_fetch_assoc($result)) {				
	$m_id=$row['m_id'];
}

if($invoice==$num[1]){
	$sql2="INSERT INTO `invoice2`( `m_id`, `inv_month`, `inv_date`, `inv_no`, `inv_award`, `pay_id`) VALUES ($m_id,'$num[0]','$today_date',$invoice,'特別獎',$m_id)";
    $result2 = mysqli_query($db,$sql2)or die("<br>SQL error invoice !<br/>");
	echo json_encode("1");exit();}//特別獎
elseif($invoice==$num[2]){
	$sql2="INSERT INTO `invoice2`( `m_id`, `inv_month`, `inv_date`, `inv_no`, `inv_award`, `pay_id`) VALUES ($m_id,'$num[0]','$today_date',$invoice,'特獎',$m_id)";
    $result2 = mysqli_query($db,$sql2)or die("<br>SQL error invoice !<br/>");
	echo json_encode("2");exit();}//特獎	
elseif($invoice==$num[3] or $invoice==$num[4] or $invoice==$num[5] ){
	$sql2="INSERT INTO `invoice2`( `m_id`, `inv_month`, `inv_date`, `inv_no`, `inv_award`, `pay_id`) VALUES ($m_id,'$num[0]','$today_date',$invoice,'頭獎',$m_id)";
    $result2 = mysqli_query($db,$sql2)or die("<br>SQL error invoice !<br/>");
	echo json_encode("3");exit();}//頭獎
elseif($in[1]==$num1[1] or $in[1]==$num2[1] or $in[1]==$num3[1] ){ 
	$sql2="INSERT INTO `invoice2`( `m_id`, `inv_month`, `inv_date`, `inv_no`, `inv_award`, `pay_id`) VALUES ($m_id,'$num[0]','$today_date',$invoice,'二獎',$m_id)";
    $result2 = mysqli_query($db,$sql2)or die("<br>SQL error invoice !<br/>");
	echo json_encode("4");exit();}//二獎
elseif($in[2]==$num1[2] or $in[2]==$num2[2] or $in[2]==$num3[2] ){
	$sql2="INSERT INTO `invoice2`( `m_id`, `inv_month`, `inv_date`, `inv_no`, `inv_award`, `pay_id`) VALUES ($m_id,'$num[0]','$today_date',$invoice,'三獎',$m_id)";
    $result2 = mysqli_query($db,$sql2)or die("<br>SQL error invoice !<br/>");
	echo json_encode("5");exit();}//三獎
elseif($in[3]==$num1[3] or $in[3]==$num2[3] or $in[3]==$num3[3] ){
	$sql2="INSERT INTO `invoice2`( `m_id`, `inv_month`, `inv_date`, `inv_no`, `inv_award`, `pay_id`) VALUES ($m_id,'$num[0]','$today_date',$invoice,'四獎',$m_id)";
    $result2 = mysqli_query($db,$sql2)or die("<br>SQL error invoice !<br/>");
	echo json_encode("6");exit();}//四獎
elseif($in[4]==$num1[4] or $in[4]==$num2[4] or $in[4]==$num3[4] ){ 
	$sql2="INSERT INTO `invoice2`( `m_id`, `inv_month`, `inv_date`, `inv_no`, `inv_award`, `pay_id`) VALUES ($m_id,'$num[0]','$today_date',$invoice,'五獎',$m_id)";
    $result2 = mysqli_query($db,$sql2)or die("<br>SQL error invoice !<br/>");
	echo json_encode("7");exit();}//五獎
elseif($in[5]==$num1[5] or $in[5]==$num2[5] or $in[5]==$num3[5] ){
	$sql2="INSERT INTO `invoice2`( `m_id`, `inv_month`, `inv_date`, `inv_no`, `inv_award`, `pay_id`) VALUES ($m_id,'$num[0]','$today_date',$invoice,'六獎',$m_id)";
    $result2 = mysqli_query($db,$sql2)or die("<br>SQL error invoice !<br/>");
	echo json_encode("8");exit();}//六獎
else{
	$sql2="INSERT INTO `invoice2`( `m_id`, `inv_month`, `inv_date`, `inv_no`, `inv_award`, `pay_id`) VALUES ($m_id,'$num[0]','$today_date',$invoice,'未中獎',$m_id)";
    $result2 = mysqli_query($db,$sql2)or die("<br>SQL error invoice !<br/>");
	echo json_encode("9");exit();}
?>

