<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_passwd = "";
$mysql_dbname = "remont";
$db = @mysql_connect($mysql_host,$mysql_user,$mysql_passwd);

if (!$db) die("error!!!");

$result = @mysql_select_db($mysql_dbname,$db);
//�� ������� ������� �������, ������� ��������� SQL ������ 
//� ���������� �������� ������� ����, ������ ������.

function resSQL($s){
$r=mysql_query($s);
if ($row=mysql_fetch_row($r)) 
 return $row[0];
else 
 return false;
}


$mpp=5;	//���������� ������� �� ��������
//������� � ���������� $page ����� ��������� ��������
if (isset($_GET['page']))
{	$page=intval($_GET['page']);
	if ($page<=0)
		return;
}else
	$page=1;
$q=mysql_query('select SQL_CALC_FOUND_ROWS * from remont order by id limit '.(($page-1)*$mpp).','.$mpp);
//���������� ������� SQL �������, ���� �� �� ���� ��������� limit
$fr=resSQL('SELECT FOUND_ROWS()');

while($r=mysql_fetch_assoc($q))
{
        echo $r['id'],'<HR>';
}
//������� ������ �������
$pc=ceil($fr/$mpp);//��������� ���������� �������

if ($pc>1)//������� ������ �������, ���� ������� ����� �����
{
	//���������� $raz �������� ������ ����������� � ������ �������. 
	//����� ������ ��������� ����������� �� �����
	$raz='';
	for($n=1;$n<=$pc;$n++)//�������� �� ���� ���������
	{
		echo $raz;//������ ����������� ����� �������� �������
		if ($page==$n)
			//���� ��������� ����� ������� ��������, 
			//�� �������� ��� ��� ������
			echo $n;
		else
		{//��������� �������� �������� ��� ������
			echo '<A HREF="/?view.php';
			if ($n>1)
			//������� �� 2-� �������� � URL ��������� �������� page
				echo '&page=',$n;
			echo '">',$n,'</A>';
		}
		//������� � ���������� ������ ����������� � ������ �������
		$raz=' | ';
	}
}

?>