<?

$mysql_host = "localhost";  
$mysql_user = "root";
$mysql_passwd = "";

$mysql_dbname = "remont";

$db = @mysql_connect($mysql_host,$mysql_user,$mysql_passwd);  //������������ mysql
if (!$db) die("error!");  //������� ������ � ������ �������
mysql_query("SET NAMES cp1251");

$result = @mysql_select_db($mysql_dbname,$db);  //�������� ���� ������
if (!$result) echo("error!");  //������� ������ � ������ �������
    
    
    // ������ ���-�� ��������� �� ��������    
    $on_pages = 2;
    // �������� ���-�� ������� �� ��
    $res = mysql_query ("select count(*) from remont", $db);
    $row = mysql_fetch_row ($res);
    $count = $row[0];
    if ($count == 0) echo ("��� �� ����� ������");
    // ��������� ���-�� �������
    $num_pages = ceil ($count / $on_pages);
    // ���������� ������ ����� ������� �������� �� ��������� "page"
    $current_page = ($_GET["page"]);
    // ���� ������� �������� ������ �������, �� �������� ����� 1
    if ($current_page < 1)
    {
        $current_page = 1;
    }
    // ���� ������� �������� ����� ������ ������ ����� �������,
    // �� ������� �������� ����� ���-�� �������
    elseif ($current_page > $num_pages)
    {
        $current_page = $num_pages;
    }
    // ��������� � ����� ������ ������ ������� ������
    $offset = ($current_page - 1) * $on_pages;
    // ������ ������ SELECT � ������� � ���������� limit
    $result = mysql_query("select * from remont limit $offset, $on_pages",$db);
    print "<style>"; 
    ?>
        table td {
            border: 1px solid; width: 100%
        }
    <?
    print "</style>";
    print "<table>\n";
    // � ����� �������� ������ �� ������� � ������
    while ($myrow = mysql_fetch_array($result))   
    {
        // ������� �����
        
        // ��������� �����
        // ������� ������ �� �������� 
        if ($myrow['status'] == 0)
        {
            print "<tr>\n";
            echo ("<td width='30%'>".$myrow['code']."</td><td>".
                  $myrow['name']."</td><td>".$myrow['device']."</td><td>".
                  $myrow['problems']."</td><td>".$myrow['contact']."</td><td>".
                  $myrow['comment']."</td><td>".
                  $myrow['date']."</td><td>�������</td>\n"); 
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
                  $myrow['date']."</td><td>�������</td>\n");
            print "</tr>\n";      
        }
        
        print "<tr><td colspan=8><a href='action.php?open=".$myrow['id']."'>�������</a> | <a href='action.php?close=".$myrow['id']."'>�������</a>  |  <a href='action.php?delete=".$myrow['id']."'>�������</a></td></tr>";
        
    }
        print "</table>\n";
         // ������� ������ ������� � �������� �������� ��������   
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

    print "<br><a href = index.html>�������</a>";
        
?>
