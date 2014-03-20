<?
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_passwd = "";

$mysql_dbname = "remont";
$db = @mysql_connect($mysql_host,$mysql_user,$mysql_passwd);
if (!$db) die("error!");

$result = @mysql_select_db($mysql_dbname,$db);
if (!$result) echo("error!");

if (isset($_GET["open"]))
{   
    $res = mysql_query ("UPDATE `remont` SET `status` = '1' WHERE `id` = '".$_GET["open"]."'",$db);
    echo ("<b>Заявка открыта</b>");
    print "<br><a href = index.html>главная</a>";
    print "<br><a href = view.php>просмотр</a>";
}
elseif (isset($_GET["close"]))
{
    $res = mysql_query ("UPDATE `remont` SET `status` = '0' WHERE `id` = '".$_GET["close"]."'",$db);
    echo ("<b>Заявка закрыта</b>");
    print "<br><a href = index.html>главная</a>";
    print "<br><a href = view.php>просмотр</a>";
}
elseif (isset($_GET["delete"]))
{
    $res = mysql_query ("DELETE from `remont` WHERE `id` = '".$_GET["delete"]."'",$db);
    echo ("<b>Заявка удалена</b>");
    print "<br><a href = index.html>главная</a>";
    print "<br><a href = view.php>просмотр</a>";
    
}
?>

