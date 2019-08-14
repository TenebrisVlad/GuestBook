<?php

require_once "config.php";
if ($_GET["num"] <=0 or ($_GET["num"]%10!=0)){
header("Location: index.php?num=10");}


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
        .saybiggodbye
        {
            text-align: center;
        }

        .saygoobye
        {

        }

    </style>
</head>
<body>
<div class="container-fluid navbar">
    <div class="row">
        <div class="col-md-6 addpost">
 <div class="textfolder "><a href="addcoment.php" class="foldertext">Добавить комментарий</a></div>
        </div>
        <div class="col-md-6 adminpanel">
            <div class="textfolder ">  <a href="admin.php" class="foldertext">Админ панель </a> </div>
        </div>
    </div>
</div>

<?php

$countpost = $connection->prepare("SELECT * FROM posttable ");
$countpost->execute();
$rows = $countpost->rowCount();


$per_page = 10;
$num_pages=ceil($rows/$per_page);
?>

    <?
$p = isset($_GET["num"]) ? (int) $_GET["num"] : 0;
$startlimit = $p-10;
$endlimit = 10;

    $bindparam1=':startlimit';
    $bindparam2=':endlimit';

    $sqltext = ("SELECT * FROM posttable ORDER BY id_user DESC LIMIT $bindparam1,$bindparam2");

    executebd($sth,$connection,$sqltext,$startlimit,$bindparam1,$endlimit,$bindparam2,$nulvar=null,$nulvar=null);


    for ($i=0; $i<$rows; $i++) {
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        $usernamerow=$row['username'];
        $usertextrow= $row['user_text'];
        echo "<div class=\"posts\"> <p class=\"username\">$usernamerow</p>
    <div class=\"usertext\"><p class=\"usertexttext\"></p>$usertextrow</div>
</div>";
}



?>

<div class="saybiggodbye">
<ul class="pagination saygoobye">




    <?

    function eh($numten,$ig,$getnumcss)
    {
        echo '<li><a class="disabled'.$ig.'" href="' . $_SERVER['PHP_SELF'] . '?num=' . $numten .'">' . $ig . "</a><li> \n";

    }
    ?>
    <style type="text/css">
        <? echo 'a.disabled'.$_GET["num"]/10. ?> {
            pointer-events: none;
            cursor: default;
            background-color: #898481 !important;
            color: white !important;
        ;
        }
    </style>
    <?

    $startINT=1;
    $startINTGET=10;
    $endINT=$num_pages*10;
    $pageINT = min($num_pages,10);

    eh($startINTGET,$startINT,$getnumcss);

//start
    if ($_GET["num"]>50 and ($_GET["num"]/10 >= $num_pages-5)==false) {
        for ($i = 2,$getnumcss=$ig, $ig = $_GET["num"] / 10 - 3; $i < 5 and $ig<$num_pages; $i++, $ig++)
        {
            $numten = $ig * 10;
            eh($numten,$ig,$getnumcss);
        }
//middle
        for ($i = 5,$getnumcss=$ig, $ig = $_GET["num"] / 10; $i < 7 and $ig<$num_pages; $i++, $ig++)
        {
            $numten = $ig * 10;
            eh($numten,$ig,$getnumcss);
        }
//end
        for ($i = 7,$getnumcss=$ig, $ig = $_GET["num"] / 10 + 2; $i < 10 and $ig<$num_pages; $i++, $ig++)
        {
            $numten = $ig * 10;
            eh($numten,$ig,$getnumcss);
        }
    }
    elseif ($_GET["num"]/10>=$num_pages-5)
    {
        for ($i=$num_pages-8;$i<$num_pages;$i++)
        {
            $numten = $i * 10;
            eh($numten,$i,$getnumcss);
        }
    }
    else
    {
        for ($i=2;$i<10;$i++)
        {
            $numten = $i * 10;
            eh($numten,$i,$getnumcss);
        }
    }
    eh($endINT,$num_pages,$getnumcss);

        ?>
    </ul>
    </div>

</body>

</html>


