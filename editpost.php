<?php
require_once "rb.php";
require_once "config.php";

if (isset($_POST["backbutton"]))
{
    header("Location: adminoptions.php?num=".$_COOKIE["numcookie"]);
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New</title>
    <link href="bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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
        .buttonenter1{text-align: center; width: 15%; height: 50px;
            margin-top: 20px;}
        .buttonenter2{text-align: center; width: 30%; height: 50px;
            margin-top: 20px;display: inline-block;
background-color: azure;
            font-size: 2em;

            text-align: center;
            white-space: nowrap;
            vertical-align: middle;


            border: 1px solid transparent;
            border-radius: 4px;}
        .centeredbutton1{margin-top:10px; text-align: center; width: 100%;}
        .textmessage1 {background-color: azure; }
        .divmessage1 {background-color: azure; margin: 0px;}
        .buttondelete
        {

        text-align: center; width: 15%; height: 50px;
            background-color: crimson;
        }
    </style>

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
</div>
<?php

$useridcookie=$_GET["clickid"];


$bindparam0 = ':deletename';

$sqltext4 = ("SELECT * FROM `posttable` WHERE id_user=$bindparam0");

 executebd($conclusion, $connection, $sqltext4, $useridcookie, $bindparam0,$nulvar=null,$nulvar=null,$nulvar=null,$nulvar=null);


$idstring = $conclusion->fetch(PDO::FETCH_ASSOC);
$usernamerow=$idstring['username'];
$usertextrow= $idstring['user_text'];


    ?>
    <form method="post" action="" class="hideelement">
        <div class="inputnamezone ">
            <p>Имя комментатора</p>
            <input name="usernamezone" class="form-control" value="<?php echo $usernamerow ?>">

        </div>
        <div class="inputtextblock ">
            <p class="comenttext">Текст комментария</p>
            <textarea class="inputtextzone " name="comentzone"><?php echo $usertextrow ?></textarea>
        </div>
        <div class="centeredbutton">
            <button class="buttonenter  btn btn-primary" type="submit" name="renamedbutton">Изменить</button>
        </div>
        <div class="centeredbutton">
            <button class="buttondelete  btn btn-primary" type="submit" name="deletebutton">Удалить</button>
        </div>
    </form>

    <?php
$namezone = $_POST['usernamezone'];
$inputzone = $_POST['comentzone'];

if (isset($_POST["renamedbutton"]) and ($namezone and $inputzone!=null))
{

    $bindparam1 = ':namezone';
    $bindparam2 = ':inputzone';
    $bindparam3x = ':useridcookie';

    $sqltext2 = ("UPDATE `posttable` SET`username` = $bindparam1, `user_text` = $bindparam2
WHERE `id_user` = $bindparam3x");

     executebd
    ($result, $connection, $sqltext2, $namezone, $bindparam1,$inputzone, $bindparam2,$useridcookie,$bindparam3x);


    echo " 
         <style>
            .inputnamezone{display: none; }
            .inputtextzone{display: none; }
            .inputtextblock{display: none; }
            .comenttext{display: none; }
            .buttonenter{display: none; }
            .centeredbutton{display: none; }
            .hideelement{display: none;}
         </style>
         <div class='centeredbutton1'>
             <div class=\"buttonenter2\" type=\"submit\" name=\"backbutton\">Комментарий изменен</div>
         </div></div>
         
   <form method=\"post\" action=\"\">
      <div class='centeredbutton1'>
 
    <button class=\"buttonenter1  btn btn-primary\" type=\"submit\" name=\"backbutton\">Назад</button>
</div>
</form>
      
       
       
       
      
 ";
}
    if (isset($_POST["deletebutton"]))
    {

        $bindparam1 = ':deletename';

        $sqltext = ("DELETE FROM `Evangelion`.`posttable` WHERE `posttable`.`id_user` = :deletename");

       executebd($deletpostid, $connection, $sqltext, $useridcookie, $bindparam1,$nulvar=null,$nulvar=null,$nulvar=null,$nulvar=null);


        echo " 
         <style>
            .inputnamezone{display: none; }
            .inputtextzone{display: none; }
            .inputtextblock{display: none; }
            .comenttext{display: none; }
            .buttonenter{display: none; }
            .centeredbutton{display: none; }
            .hideelement{display: none;}
         </style>
         <div class='centeredbutton1'>
             <div class=\"buttonenter2\" type=\"submit\" name=\"backbutton\">Комментарий Удален</div>
         </div></div>
         
   <form method=\"post\" action=\"\">
      <div class='centeredbutton1'>
 
    <button class=\"buttonenter1  btn btn-primary\" type=\"submit\" name=\"backbutton\">Назад</button>
</div>
</form>
      
       
       
       
      
 ";
    }

?>

</body>

</html>
