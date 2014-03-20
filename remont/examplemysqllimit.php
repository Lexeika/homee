<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_passwd = "";
$mysql_dbname = "remont";
$db = @mysql_connect($mysql_host,$mysql_user,$mysql_passwd);

if (!$db) die("error!!!");

$result = @mysql_select_db($mysql_dbname,$db);
//Ќе больша€ удобна€ функци€, котора€ выполн€ет SQL запрос 
//и возвращает значение первого пол€, первой строки.

function resSQL($s){
$r=mysql_query($s);
if ($row=mysql_fetch_row($r)) 
 return $row[0];
else 
 return false;
}


$mpp=5;	// оличество записей на странице
//«анести в переменную $page номер выводимой страницы
if (isset($_GET['page']))
{	$page=intval($_GET['page']);
	if ($page<=0)
		return;
}else
	$page=1;
$q=mysql_query('select SQL_CALC_FOUND_ROWS * from remont order by id limit '.(($page-1)*$mpp).','.$mpp);
// оличество записей SQL запроса, если бы не было параметра limit
$fr=resSQL('SELECT FOUND_ROWS()');

while($r=mysql_fetch_assoc($q))
{
        echo $r['id'],'<HR>';
}
//¬ывести номера страниц
$pc=ceil($fr/$mpp);//¬ычисл€ем количество страниц

if ($pc>1)//¬ыводим номера страниц, если страниц более одной
{
	//ѕеременна€ $raz содержит символ разделител€ в списке страниц. 
	//ѕеред первой страницей разделитель не нужен
	$raz='';
	for($n=1;$n<=$pc;$n++)//ѕроходим по всем страницам
	{
		echo $raz;//ѕечать разделител€ между номерами страниц
		if ($page==$n)
			//≈сли выводитс€ номер текущей страницы, 
			//то печатаем его без ссылки
			echo $n;
		else
		{//ќстальные страницы печатаем как ссылки
			echo '<A HREF="/?view.php';
			if ($n>1)
			//Ќачина€ со 2-й страницы к URL добавл€ем параметр page
				echo '&page=',$n;
			echo '">',$n,'</A>';
		}
		//«аносим в переменную символ разделител€ в списке страниц
		$raz=' | ';
	}
}

?>