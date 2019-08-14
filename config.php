<?php

$justgo = "Go";
session_start();
define("HOST", "localhost");
define("user", "root");
define("password", "");
define("DBNAME", "Evangelion");
define("CHARSET", "utf8");
try {

    $connection = new PDO('mysql:host=127.0.0.1;dbname=Evangelion',
        'root', '');
}catch(PDOException $e){
    echo "connection failed: ".$e->getMessage();//При ошибки соединения.
}

function executebd(&$sth,$connection,&$sqltext,&$varlimit1,&$bind1,&$varlimit2,&$bind2,&$varlimit3,&$bind3)
{

    $sth = $connection->prepare
    ($sqltext);
    $sth->bindParam($bind1,$varlimit1,PDO::PARAM_INPUT_OUTPUT);
    if ($varlimit2 and $bind2 !=null)
    $sth->bindParam($bind2,$varlimit2,PDO::PARAM_INPUT_OUTPUT);
    if ($varlimit3 and $bind3 !=null)
    $sth->bindParam($bind3,$varlimit3,PDO::PARAM_INPUT_OUTPUT);
    $sth->execute();
}
?>