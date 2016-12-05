<?php
session_start();
$url_reg = "http://zaochniktest.com/rest/client/";

$fio =  $_POST["fio"];	
$email = $_POST["email"];
$password =  $_POST["password"];
$phone =  $_POST["phone"];
$dopinfo =  $_POST["dopinfo"];
$get_token = "123";

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url_reg);
curl_setopt($ch, CURLOPT_POSTFIELDS, array('fio'=>$_POST['fio'],'email'=>$_POST['email'],'password'=>$_POST["password"],'phone'=>$_POST["phone"],'dopinfo'=>$_POST["dopinfo"],'get_token'=>$get_token));


$result = curl_exec($ch);

curl_close($ch);

$json = json_decode($result, true);
if(isset($json['id'])){
$_SESSION['crf'] = $json['Token'];
}else{
	print_r($result);
}
session_write_close();
?>