<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_passwd = "";
$mysql_dbname = "remont";
$db = mysql_connect ($mysql_host, $mysql_user, $mysql_passwd);
if (!$db) die ("ERROR!!");
mysql_query("SET NAMES cp1251");

$result = mysql_select_db($mysql_dbname, $db);

if ($_POST)
{
    $code = $_POST["newcode"];
}
var_dump($code);
if (!$code)
{
    print "нет кода";
}
else
{
    $result = mysql_query ("insert into ssm (`id`, `code`) values ('','$code')", $db );
    if (!$result)
    {
       echo "error!".mysql_error(); 
    }
    else{
        print ("салон добавлен");
        echo "<meta http-equiv=\"refresh\" content=\"1;url=" . $_SERVER['HTTP_REFERER'] . "\">";
    }
    
}
?>