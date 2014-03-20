<?

$mysql_host = "localhost";  
$mysql_user = "root";
$mysql_passwd = "";

$mysql_dbname = "remont";

$db = @mysql_connect($mysql_host,$mysql_user,$mysql_passwd);  //подключаемся mysql
if (!$db) die("error!");  //выводим ошибку в случае неудачи
mysql_query("SET NAMES cp1251");

$result = @mysql_select_db($mysql_dbname,$db);  //выбираем базу данных
if (!$result) echo("error!");  //выводим ошибку в случае неудачи
    
    
    // задаем кол-во элементов на странице    
    $on_pages = 2;
    // получаем кол-во записей из БД
    $res = mysql_query ("select count(*) from remont", $db);
    $row = mysql_fetch_row ($res);
    $count = $row[0];
    if ($count == 0) echo ("НЕТ НИ ОДНОЙ ЗАПИСИ");
    // вычисляем кол-во страниц
    $num_pages = ceil ($count / $on_pages);
    // переменной задаем номер текущей страницы из параметра "page"
    $current_page = ($_GET["page"]);
    // если текущая страница меньше единицы, то страница равна 1
    if ($current_page < 1)
    {
        $current_page = 1;
    }
    // если текущая страница равна больше общего числа страниц,
    // то текущая страница равна кол-ву страниц
    elseif ($current_page > $num_pages)
    {
        $current_page = $num_pages;
    }
    // вычисляем с какой записи делать выборку данных
    $offset = ($current_page - 1) * $on_pages;
    // делаем запрос SELECT в таблице с оператором limit
    $result = mysql_query("select * from remont limit $offset, $on_pages",$db);
    print "<style>"; 
    ?>
        table td {
            border: 1px solid; width: 100%
        }
    <?
    print "</style>";
    print "<table>\n";
    // в цикле передаем данные из таблицы в массив
    while ($myrow = mysql_fetch_array($result))   
    {
        // создаем рамку
        
        // заголовок рамки
        // выводим данный на страницу 
        if ($myrow['status'] == 0)
        {
            print "<tr>\n";
            echo ("<td width='30%'>".$myrow['code']."</td><td>".
                  $myrow['name']."</td><td>".$myrow['device']."</td><td>".
                  $myrow['problems']."</td><td>".$myrow['contact']."</td><td>".
                  $myrow['comment']."</td><td>".
                  $myrow['date']."</td><td>Закрыта</td>\n"); 
            print "</tr>\n";     
        }
        elseif ($myrow['status'] == 1)
        {
            print "<tr>\n";
            echo ("<td width='30%'>".$myrow['code']."</td><td>".
                  $myrow['name']."</td><td>".
                  $myrow['device']."</td><td>".
                  $myrow['problems']."</td><td>".
                  $myrow['contact']."</td><td>".
                  $myrow['comment']."</td><td>".
                  $myrow['date']."</td><td>Открыта</td>\n");
            print "</tr>\n";      
        }
        
        print "<tr><td colspan=8><a href='action.php?open=".$myrow['id']."'>Открыть</a> | <a href='action.php?close=".$myrow['id']."'>Закрыть</a>  |  <a href='action.php?delete=".$myrow['id']."'>Удалить</a></td></tr>";
        
    }
        print "</table>\n";
         // выводим список страниц и помечаем активную страницу   
echo '<p>';
    
    for ($page = 1; $page <= $num_pages; $page++)
    {
        if ($page == $current_page)
        {
            echo '<strong>'.$page.'</strong> &nbsp;';
        }
        else
        {
            echo '<a href="view.php?page='.$page.'">'.$page.'</a> &nbsp;';
        }
    }
    
    
echo '</p>';

    print "<br><a href = index.html>главная</a>";
        
?>
