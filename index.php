<?php
session_start();
echo $_SESSION['crf'];
$reg = '<div class="glass_panel" id="reg_panel">
            <div class="reg_block">
            <button>Регистрация клиента</button>
                <form id="form">
                <input type="text" name="fio" id="fio" placeholder="Ф.И.О"> <br>
                <input type="text" name="email" id="email" placeholder="E-mail"> <br>
                <input type="password" name="password" id ="password" placeholder="Пароль"> <br>
                <input type="text" name="phone" id="phone" placeholder="Мобильный телефон"> <br>
                <input type="text" name="dopinfo" id="dopinfo" placeholder="Дополнительная информация"> <br>
                </form>
                <input type="submit" value="Зарегистрировать" id="reg">
            </div>
        </div>';

$auth = '<div class="glass_panel" id="auth_panel">
        <div class=res_client>Информация о клиенте</div>
        <div class="inf_client" id="result">
        </div>
        </div> ';
?>
<!DOCTYPE html>
<html>

    <head>
        <title>test</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="js.js"></script>
        <link href="css.css" rel="stylesheet" media="all">
    </head>

    <body>
<?if(empty($_SESSION['crf'])){
    echo $reg;
    echo $auth;
}else{
    echo '<script type="text/javascript">$(document).ready(function() {$("#auth_panel").show();});</script>';
    echo $auth;

}?>
    </body>

</html>