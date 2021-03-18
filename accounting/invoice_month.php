<?php

$month= date('m');
$day=date('d');
if($day>=25){$month=$month-2;}
else{$month=$month-4;}

if($month<=10){
	if($month%2==0){
		$getDate=($month-1)."~".$month+1;
	}
	else{
		$getDate=$month."~".($month+1);
	}
}
else{
	if($month%2==0){
		$month=$month-1;
		$getDate=($month-1)."~".$month+1;
	}
	else{
		$getDate=$month."~".($month+1);
	}
}
  $arytags = 
  array( 'month'=>$getDate);
     
    echo json_encode($arytags);

 
  ?>