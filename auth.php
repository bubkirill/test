<?php
session_start();
$url_auth = "http://zaochniktest.com/rest/client/?get_token=".$_SESSION['crf'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url_auth);
curl_setopt($ch, CURLOPT_HTTPHEADER,array('Token: '.$_SESSION['crf']));


$result = curl_exec($ch);

curl_close($ch);

$json = json_decode($result, true);
if(empty($json['fio'])){$json['fio'] = 'Не указано';}
if(empty($json['phone'])){$json['phone'] = 'Не указано';}
if(empty($json['mp'])){$json['mp'] = 'Не указано';}
if(empty($json['univer'])){$json['univer'] = 'Не указано';}
if(empty($json['speciality'])){$json['speciality'] = 'Не указано';}
echo "<div class='name'>Идентификатор:</div><div class='result'>".$json['id']."</div><br>";
echo "<div class='name'>Ф.И.О:</div><div class='result'>".$json['fio']."</div><br>";
echo "<div class='name'>Дата рождения:</div><div class='result'>".$json['birthday']."</div><br>";
echo "<div class='name'>Электронная почта:</div><div class='result'>".$json['email']."</div><br>";
echo "<div class='name'>Мобильный телефон:</div><div class='result'>".$json['phone']."</div><br>";
echo "<div class='name'>Баланс:</div><div class='result'>".$json['moneyReal']."</div><br>";
echo "<div class='name'>Бонус:</div><div class='result'>".$json['moneyBonus']."</div><br>";
echo "<div class='name'>Мп:</div><div class='result'>".$json['mp']."</div><br>";
echo "<div class='name'>Универститет:</div><div class='result'>".$json['univer']."</div><br>";
echo "<div class='name'>Специальность:</div><div class='result'>".$json['speciality']."</div><br>";
echo "<div class='name'>Курс:</div><div class='result'>".$json['course']."</div><br>";

session_write_close();
?>