<?php
require_once "rb.php";
require_once "config.php";
require_once "recaptchalib.php";


?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title>New</title>
    <link href="bootstrap.css" rel="stylesheet">
    <style>

        .navbar{ width: 100%; height: 40px;
            background-color: darkgray;
            position: relative;
        }
        .addpost{
            border-right: 2px outset darkgray;

            height: 45px;
            background-color: #898481;}
        .adminpanel{
            border-left: 2px outset darkgray;
            height: 45px;
            background-color: #898481}

        .foldertext{color: azure; }
        .textfolder{text-align: center;  margin-top: 10px;}
        .inputnamezone{margin-top: 30px; text-align: center; font-size:1.5em; width: 25%;
            margin-left: 37%;}
        .inputtextzone{width: 70%; height: 150px;resize: none;}
        .inputtextblock{margin-top:30px; text-align: center; font-size:1.5em;}
        .comenttext{}
        .buttonenter{text-align: center; width: 15%; height: 50px;}
        .centeredbutton{margin-top:10px; text-align: center;}
        .endmessage{text-align: center; font-size:1.5em; height: 50px; background-color: darkgray; margin-top: 40px; }
        .endmessagetext{margin-top: 10px;}
         .text-xs-center {
             text-align: center;
         }
        .g-recaptcha {
            display: inline-block;
        }

    </style>
    <script src='https://www.google.com/recaptcha/api.js?hl=ru'></script>
</head>

<div class="container-fluid navbar">
    <div class="row">
        <div class="col-md-6 addpost">
            <div class="textfolder "><a href="index.php" class="foldertext">Главная </a></div>
        </div>
        <div class="col-md-6 adminpanel">
            <div class="textfolder ">  <a href="admin.php" class="foldertext">Админ панель </a> </div>
        </div>
    </div>
</div><?php
// ваш секретный ключ
$secret = "6LcePAATAAAAABjXaTsy7gwcbnbaF5XgJKwjSNwT";

// пустой ответ
$response = null;

// проверка секретного ключа
$reCaptcha = new ReCaptcha($secret);
if (!empty($_POST)) {

    //Валидация $_POST['name'] и $_POST['email']
    if ($_POST["g-recaptcha-response"]) {
        $response = $reCaptcha->verifyResponse(
            $_SERVER["REMOTE_ADDR"],
            $_POST["g-recaptcha-response"]
        );
    }

    if ($response != null && $response->success) {


    } else {

    }
}
?>
<form method="post" action="">

<div class="inputnamezone ">
    <p>Введите ваше имя</p>
    <input name="usernamezone" maxlength='20' class="form-control">

</div>
<div class="inputtextblock ">
    <p class="comenttext"  >Введите ваш коментарий</p>
<textarea maxlength='750' class="inputtextzone " name="comentzone" ></textarea>
</div>
    <div class="text-xs-center">
    <div class="g-recaptcha" data-sitekey="6Lfcim8UAAAAADYnhbI0iFmC1yBtoGjQOwnYLYOO"></div>
<div class="centeredbutton">
    <button  class="buttonenter  btn btn-primary" type="submit" >Отправить</button></div>

</form>

<?php
$namezone = $_POST['usernamezone'];
$inputzone = $_POST['comentzone'];
$success=false;

if (($namezone and $inputzone != null)
    and (strlen($inputzone)<=750)
    and (strlen($namezone)<=20)
    and($response != null)) {

    $bindparam1=':namezone';
    $bindparam2=':inputzone';

    $sqltext = ("INSERT INTO `posttable`(`username`, `user_text`)
VALUES ($bindparam1,$bindparam2)");

    executebd($sth,$connection,$sqltext,$namezone,$bindparam1,$inputzone,$bindparam2,$nulvar=null,$nulvar=null);


    echo " 
         <style>
            .inputnamezone{display: none; }
            .inputtextzone{display: none; }
            .inputtextblock{display: none; }
            .comenttext{display: none; }
            .buttonenter{display: none; }
            .centeredbutton{display: none;}
             .g-recaptcha {display: none;}
         </style>
    <div class=\"col-md-4 col-md-offset-4 endmessage\"><p class=\"endmessagetext\"> Коментарий оставлен</p></div>";

}

?>
<?php

?>


</body>

</html>
