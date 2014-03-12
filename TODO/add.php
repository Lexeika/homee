<?
header('Content-Type: text/html; charset=utf-8');
if (!$_POST) die ("Заполните поля");
include("mysqlconnect.php");
//$mysql_host = "localhost";
//$mysql_user = "root";
//$mysql_passwd = "";
//$mysql_dbname = "test";
//$db = @mysql_connect($mysql_host,$mysql_user,$mysql_passwd);
//
//if (!$db) die("error!!!");
//
//$result = @mysql_select_db($mysql_dbname,$db);
if ($_POST)
{
    $new_name = $_POST["new_name"];
    $new_message = $_POST["new_message"];
}

if (!$new_name or !$new_message )
{
    if (!$new_name)
    {
        print "заполните имя";
    }
    elseif (!$new_message)
    {
        print "заполните сообщение";
    }
    
}
else
{
    $date = date("Y-m-d H:i:s");
    $result = mysql_query("insert into new_tbl (`name`,`message`,`status`,`date`) values ('$new_name','$new_message', '1', '$date')",$db);
    if (!$result) 
    {
        echo "error!!!!";
    }
    else
    {
        printf ("Запись добавлена");   
    }
}
mysql_close($db);

?> 