<html>
<form action="post">
<input type="text" name="code" />
<input type="submit" />
</form>
</html> 
<?php
$mysql_host = "localhost";  
$mysql_user = "root";
$mysql_passwd = "";

$mysql_dbname = "remont";

$db = @mysql_connect($mysql_host,$mysql_user,$mysql_passwd);  //подключаемся mysql
if (!$db) die("error!");  //выводим ошибку в случае неудачи

$result = @mysql_select_db($mysql_dbname,$db);  //выбираем базу данных
if (!$result) echo("error!");  //выводим ошибку в случае неудачи
$result = mysql_query("select * from remont", $db);

echo '<table frame="vsides" align="center" border="1" width="80%">';
	echo '<thead>';
	echo '<tr>';
	echo '<th>data</th>';
	echo '<th>name</th>';       
	echo '<th>SSM</th>';
        echo '<th>Device</th>';
        echo '<th>Trable</th>';
        echo '<th>Contact</th>';
        echo '<th>Comment</th>';
        echo '<th>status</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';

        while($data = mysql_fetch_array($result)){ 
		echo '<tr>';
		echo '<td>' . $data['date'] . '</td>';
		echo '<td>' . $data['code'] . '</td>';
		echo '<td>' . $data['name'] . '</td>';
                echo '<td>' . $data['device'] . '</td>';
                echo '<td>' . $data['problems'] . '</td>';
                echo '<td>' . $data['contact'] . '</td>';
                echo '<td>' . $data['comment'] . '</td>';
                echo '<td>' . $data['status'] . '</td>';
		echo '</tr>';
	}
mysql_select("select * from `remont` where `code` like '%" . mysql_escape_string($_POST['code']) . "%'");
            
?>