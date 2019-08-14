<?php
require_once "rb.php";
require_once "config.php";

$loginname = $_POST['userloginzone'];
$passwordname = $_POST['userpasswordzone'];
if (isset($_COOKIE["logincookie"]) and isset($_COOKIE["passwordcookie"]) )
{
    header("Location: adminoptions.php");
}
if ($loginname == "odmin" and $passwordname == "123456")
{
setcookie("logincookie","$loginname");
    setcookie("passwordcookie","$passwordname");
    header("Location: adminoptions.php");

}
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>New</title>
        <link href="bootstrap.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
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
            .posts{
                margin-top: 50px;}
            .username{
                margin: auto;width:70%;
                margin-bottom:20px;

                font-size: 1.5em;}

            .usertext {
                height: auto;
                width: 70%;
                background-color: lightgray;
                margin: auto;
                margin-bottom: 50px;
                word-wrap: break-word;
            }
            .usertexttext{
                margin-left: 8px;
                font-size: 1em;
                word-wrap: break-word;

            }


            .saygoobye
            {
                margin-left: 33%;
            }
            .inputlogin{margin-top: 50px; text-align: center; font-size:1.5em; width: 20%;  margin-left: 40%;}
            .inputpassword{margin-top: 10px; text-align: center; font-size:1.5em; width: 20%;
                margin-left: 40%;}
            .centeredbutton{margin-top:20px; text-align: center;}
        </style>
    </head>
    <body>
    <div class="container-fluid navbar">
        <div class="row">
            <div class="col-md-6 addpost">
                <div class="textfolder "><a href="index.php" class="foldertext">Главная</a></div>
            </div>
            <div class="col-md-6 adminpanel">
                <div class="textfolder ">  <a href="admin.php" class="foldertext">Админ панель </a> </div>
            </div>
        </div>
    </div>


          <form method="post" action="">


        <div class="inputlogin">

            <input name="userloginzone" class="form-control" placeholder="Логин">

        </div>

        <div class="inputpassword">

            <input name="userpasswordzone"  class="form-control"  type="password" placeholder="Пороль">

        </div>
        <div class="centeredbutton">
            <button  class="buttonenter btn btn-primary" type="submit"  >Войти</button></div>
    </form>



    </body>
</html>
