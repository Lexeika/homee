<?
$mysql_host = "localhost";  
$mysql_user = "root";
$mysql_passwd = "";

$mysql_dbname = "test";
$bodyname = "test.php";
$db = @mysql_connect($mysql_host,$mysql_user,$mysql_passwd);  //������������ mysql
if (!$db) die("error!");  //������� ������ � ������ �������

$result = @mysql_select_db($mysql_dbname,$db);  //�������� ���� ������
if (!$result) echo("error!");  //������� ������ � ������ �������

    $result = mysql_query("select * from guest_book",$db);    //������ ������ SELECT � �������
    while ($myrow = mysql_fetch_array($result))   //� ����� �������� ������ �� ������� � ������
    {
        print "<fieldset>\n";   //������� �����
        print "<legend>���������</legend>\n";  //��������� �����
        if ($myrow['status'] == 0)
        {
            echo ("<b>name:</b> ".$myrow['name']."<br> <b>message:</b> ".$myrow['message']." <br> <b>������: </b>�������\n");
        }
        elseif ($myrow['status'] == 1)
        {
            echo ("<b>name:</b> ".$myrow['name']."<br> <b>message:</b> ".$myrow['message']." <br> <b>����� ��������:</b> ".$myrow['date']." <br> <b>������: </b>�� �������\n");
        }
        print "<br><a href='action.php?open=".$myrow['id']."'>Open the request</a> | <a href='action.php?close=".$myrow['id']."'>Close the request</a>  |  <a href='action.php?delete=".$myrow['id']."'>Delete</a>";
        print "</fieldset>\n";
    }
?>
