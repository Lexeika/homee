<?
header('Content-Type: text/html; charset=utf-8');
if (!$_POST) die ("Заполните поля");
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_passwd = "";
$mysql_dbname = "remont";
$db = @mysql_connect($mysql_host,$mysql_user,$mysql_passwd);
mysql_query("SET NAMES cp1251");
if (!$db) die("error!!!");

$result = @mysql_select_db($mysql_dbname,$db);
if ($_POST)
{
    $new_code = $_POST["code"];
    $new_name = $_POST["name"];
    $new_device = $_POST["device"];
    $new_contact = $_POST["contact"];
    $new_problem = $_POST["message"];
    $new_comment = $_POST["comment"];
}

if (!$new_code or !$new_name or !$new_device or !$new_contact or !$new_problem or !$new_comment )
{
    if (!$new_code)
    {
        print "заполните код салона";
    }
    elseif (!$new_name)
    {
        print "заполните название салона";
    }
    elseif (!$new_device)
    {
        print "Укажите модель принтера";
    }
    elseif (!$new_contact)
    {
        print "Укажите контакт";
    }
    elseif (!$new_problem)
    {
        print "Опишите проблему";
    }
    
    
}
else
{
    $date = date("Y-m-d H:i:s");
    $result = mysql_query("insert into remont (`date`,`code`,`name`,`device`,`problems`, `contact`, `comment`,`status`) values ('$date','$new_code','$new_name','$new_device','$new_problem','$new_contact','$new_comment','1')",$db);
    
    if (!$result) 
    {
        echo "Ошибка добавления данных".mysql_error();
    }
    else
    {
        printf ("Запись добавлена");
        print "<br><a href = index.html>главная</a>";
        print "<br><a href = view.php>просмотр</a>";
    }
}
mysql_close($db);

?> 