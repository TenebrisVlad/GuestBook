<?php
require_once "rb.php";
require_once "config.php";
if (empty($_COOKIE["logincookie"]) and empty($_COOKIE["passwordcookie"]) )
{
    header("Location: adminoptions.php");
}
if ($_GET["num"] <=0 or ($_GET["num"]%10!=0)){
    header("Location: adminoptions.php?num=10");}
setcookie("numcookie",($_GET["num"]));



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New</title>
    <link href="bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.cookie.js"></script>
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
.buttonedit
{

}
        .buttondelete
        {

            text-align: center;
background-color: crimson;
        }

        .saybiggodbye
{
    text-align: center;
}
        .saygoobye
        {
            text-align: center;

        }
.element2
{
    text-align: center;
}
      .editlink
      {
          color: white;
      }
        a:hover {
            text-decoration: none;
            color: white;
        }

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
<?php
ini_set('display_errors','Off');

$sqltext = ("SELECT * FROM posttable ");

@ executebd($countpost, $connection, $sqltext);


$rows = $countpost->rowCount();
$constrows = $rows;

$per_page = 10;
$num_pages=ceil($rows/$per_page);
?>

<?
unset($_COOKIE['numcookie']);
$p = isset($_GET["num"]) ? (int) $_GET["num"] : 0;
$startlimit = $p-10;
$endlimit = 11;



$bindparam1=':startlimit';
$bindparam2=':endlimit';


 $sqltext = ("SELECT * FROM posttable ORDER BY id_user DESC LIMIT $bindparam1,$bindparam2");


 executebd($sth,$connection,$sqltext,$startlimit,$bindparam1,$endlimit,$bindparam2,$nulvar=null,$nulvar=null);





$rows = $sth->rowCount();
for ($i=1; $i<$rows; $i++) {
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    $usernamerow=$row['username'];
    $usertextrow= $row['user_text'];
        $deletename=$row['id_user'];
        $editname=$row['id_user']+1;
$getidname=$row['id_user'];
        echo "<div class=\"posts\"> <p class=\"username\">$usernamerow


    <div class=\"usertext\">
        <p class=\"usertexttext\">$usertextrow</p>
        <div class='element2'>
        <form action=\"\" method=\"POST\">
            <button  class='buttonedit  btn btn-primary'name='$editname'><a href='editpost.php?clickid=$getidname' class='editlink'>Редактировать</a></button>
            
    
           
            
            </form>
        </div> </div>
    </div>";

    }

if ($p!=0) {
?>
<div class="saybiggodbye">
    <ul class="pagination saygoobye">
        <?
        //функция echo
        function eh($numten, $ig, $getnumcss)
        {
            echo '<li><a class="disabled' . $ig . '" href="' . $_SERVER['PHP_SELF'] . '?num=' . $numten . '">' . $ig . "</a><li> \n";

        }

        ?>
        <style type="text/css">
            <? echo 'a.disabled'.$_GET["num"]/10. ?>
            {
                pointer-events: none
            ;
                cursor: default
            ;
                background-color: #898481 !important
            ;
                color: white !important
            ;
            ;
            }
        </style>
        <?
        // Переменные
        $startINT = 1;
        $startINTGET = 10;
        $endINT = $num_pages * 10;
        $pageINT = min($num_pages, 10);

        eh($startINTGET, $startINT, $getnumcss);

        //start
        if ($_GET["num"] > 50 and ($_GET["num"] / 10 >= $num_pages - 5) == false) {
            for ($i = 2, $getnumcss = $ig, $ig = $_GET["num"] / 10 - 3; $i < 5 and $ig < $num_pages; $i++, $ig++) {
                $numten = $ig * 10;
                eh($numten, $ig, $getnumcss);
            }
//middle
            for ($i = 5, $getnumcss = $ig, $ig = $_GET["num"] / 10; $i < 7 and $ig < $num_pages; $i++, $ig++) {
                $numten = $ig * 10;
                eh($numten, $ig, $getnumcss);
            }
//end
            for ($i = 7, $getnumcss = $ig, $ig = $_GET["num"] / 10 + 2; $i < 10 and $ig < $num_pages; $i++, $ig++) {
                $numten = $ig * 10;
                eh($numten, $ig, $getnumcss);
            }
        } elseif ($_GET["num"] / 10 >= $num_pages - 5) {
            for ($i = $num_pages - 8; $i < $num_pages; $i++) {
                $numten = $i * 10;
                eh($numten, $i, $getnumcss);
            }
        } else {
            for ($i = 2; $i < 10; $i++) {
                $numten = $i * 10;
                eh($numten, $i, $getnumcss);
            }
        }
        eh($endINT, $num_pages, $getnumcss);
        }
        ?>
</ul></div>

</body>
</html>