<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_passwd = "";
$mysql_dbname = "todo";
$db = mysql_connect ($mysql_host, $mysql_user, $mysql_passwd);
if (!$db) die ("ERROR!!!");
mysql_select_db("todo", $db) or die ("Ошибка подключения к базе данных:".mysql_error());
?>