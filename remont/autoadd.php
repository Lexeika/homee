<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_passwd = "";
$mysql_dbname = "remont";
$db = mysql_connect ($mysql_host, $mysql_user, $mysql_passwd);
if (!$db) die ("error");
mysql_query("SET NAMES cp1251");

$selectdb = mysql_selectdb ($mysql_dbname, $db);
if (!$selectdb) die ("error".mysql_error());

$sql = "select * from ssm";
$result_select = mysql_query("$sql");

//echo "<select name = ''>";
while($object = mysql_fetch_object($result_select)){
    echo $object->code;
    echo $object->name;
}
//echo "</select>";
?>