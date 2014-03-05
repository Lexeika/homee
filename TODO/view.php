<?
$mysql_host = "localhost";  
$mysql_user = "root";
$mysql_passwd = "";

$mysql_dbname = "test";
$bodyname = "test.php";
$db = @mysql_connect($mysql_host,$mysql_user,$mysql_passwd);  //подключаемся mysql
if (!$db) die("error!");  //выводим ошибку в случае неудачи

$result = @mysql_select_db($mysql_dbname,$db);  //выбираем базу данных
if (!$result) echo("error!");  //выводим ошибку в случае неудачи

    $result = mysql_query("select * from guest_book",$db);    //делаем запрос SELECT в таблице
    while ($myrow = mysql_fetch_array($result))   //в цикле передаем данные из таблицы в массив
    {
        print "<fieldset>\n";   //создаем рамку
        print "<legend>Сообщение</legend>\n";  //заголовок рамки
        if ($myrow['status'] == 0)
        {
            echo ("<b>name:</b> ".$myrow['name']."<br> <b>message:</b> ".$myrow['message']." <br> <b>Статус: </b>закрыта\n");
        }
        elseif ($myrow['status'] == 1)
        {
            echo ("<b>name:</b> ".$myrow['name']."<br> <b>message:</b> ".$myrow['message']." <br> <b>Время создания:</b> ".$myrow['date']." <br> <b>Статус: </b>Не закрыта\n");
        }
        print "<br><a href='action.php?open=".$myrow['id']."'>Open the request</a> | <a href='action.php?close=".$myrow['id']."'>Close the request</a>  |  <a href='action.php?delete=".$myrow['id']."'>Delete</a>";
        print "</fieldset>\n";
    }
?>
