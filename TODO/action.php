<?
include("mysqlconnect.php");
//$mysql_host = "localhost";
//$mysql_user = "root";
//$mysql_passwd = "";
//
//$mysql_dbname = "test";
//$db = @mysql_connect($mysql_host,$mysql_user,$mysql_passwd);
//if (!$db) die("error!");

$result = @mysql_select_db($mysql_dbname,$db);
if (!$result) echo("error!");

if (isset($_GET["open"]))
{   
    $res = mysql_query ("UPDATE `new_tbl` SET `status` = '1' WHERE `id` = '".$_GET["open"]."'",$db);
    echo ("<b>������ �������</b>");
}
elseif (isset($_GET["close"]))
{
    $res = mysql_query ("UPDATE `new_tbl` SET `status` = '0' WHERE `id` = '".$_GET["close"]."'",$db);
    echo ("<b>������ �������</b>");
}
elseif (isset($_GET["delete"]))
{
    $res = mysql_query ("DELETE from `new_tbl` WHERE `id` = '".$_GET["delete"]."'",$db);
    echo ("<b>������ �������</b>");
}
?>

