<h3>������ �� ������</h3>
            <p>
<?
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_passwd = "";
$mysql_dbname = "remont";
$db = mysql_connect ($mysql_host, $mysql_user, $mysql_passwd);
if (!$db) die ("error");
mysql_query("SET NAMES cp1251");

$selectdb = mysql_selectdb ($mysql_dbname, $db);
if (!$selectdb) die ("error".mysql_error());

$sql = "select * from ssm";
$result_select = mysql_query("$sql");
?>
            <form action=add.php method=POST>
            ��� ������:<br>
            <?
            echo "<select name = ''>";
            echo "<option>�������� ���</option>";
            while($object = mysql_fetch_object($result_select))
            {
                echo "<option value = '$object->code' > $object->code </option>";
                
            }
            echo "</select>";
            ?>
            
            <!--<input type=text size=50 name=code >-->
            <p>

            ������� ������:<br>
            <input type=text size=50 name=name>
            <p>
            
            ������������:<br>
            <input type=text size=50 name=device>
            <p>
            
            �������:<br>
            <input type=text size=50 name=contact>
            <p>
            
            ��� ��������:<br>
            <textarea rows="5" cols="40" name=message></textarea>
            <p>
                
            
            �����������:<br>
            <textarea rows="5" cols="40" name=comment></textarea>
            <p>
            <input type=hidden name=action value='record_insert'>
        
            <input type=submit value='��������� ������'>
            <input value="����������� ������" onClick="location.href='view.php'" type="button"/>
            </form>