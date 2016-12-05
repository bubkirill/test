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
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_setopt($ch, CURLOPT_URL,$url_reg);
curl_setopt($ch, CURLOPT_POSTFIELDS, array('fio'=>$_POST['fio'],'email'=>$_POST['email'],'password'=>$_POST["password"],'phone'=>$_POST["phone"],'dopinfo'=>$_POST["dopinfo"],'get_token'=>$get_token));
$result = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);


if($status == 200){
	echo "<script type='text/javascript'>alert('Внутренняя ошибка сервера')</script>";
}
else if($status == 201){
	$json = json_decode($result, true);
	if(isset($json['id'])){
		$_SESSION['crf'] = $json['Token'];
	}
	echo "<script type='text/javascript'>alert('Регистрация прошла успешно');
	function redirect() {
	    $('#reg_panel').slideUp();
		$('#auth_panel').slideDown();
		$('#back').slideDown();
	}
	setTimeout(redirect(),1500);
});</script>";
}
else if($status == 400){

echo "<script type='text/javascript'>alert('Ошибка в заполнении формы')</script>";
}
else{
	echo '<script type="text/javascript">$(document).ready(function() {alert("Внутренняя ошибка сервера");});</script>';
	echo $status;
}
curl_close($ch);
session_write_close();
?>