<?php require_once('../Connections/Ekaterina.php'); ?>
<?php
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = "SELECT * FROM koaliciya WHERE lang = '1' ORDER BY id DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $Ekaterina) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$colname_Recordset2 = "0";
if (isset($_GET['id'])) {
  $colname_Recordset2 = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset2 = sprintf("SELECT * FROM koaliciya WHERE lang = '1' and id = '%s'", $colname_Recordset2);
$Recordset2 = mysql_query($query_Recordset2, $Ekaterina) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>��������� ����� ���������� ��� ������ � �����, ���������� ������� � �����</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<script language="JavaScript" src="menu/menu.js"></script>
	<link rel="stylesheet" href="menu/menu.css">
</head>

<body onload="initPage()">
<table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col">
      <tr bgcolor="#B7D6F8"><?php include('include/header.php');?>
      </tr>

      <tr bgcolor="#B7D6F8">
        </tr>
      <tr bgcolor="#FFFFFF">
        <td width="20%" valign="top" bgcolor="#B7D6F8"><div align="left"><?php include('menu/menu.php');?></div></td>
        <td width="60%" valign="top" bgcolor="#FFFFFF">
          <?php if ($totalRows_Recordset2 == 0) { // Show if recordset empty ?>
          <p align="center"><br><span class="bodyHeader">�������� ��������� ������� ����� � �������� ������.</span></p>

          <p align="justify" class="text">� ������� 2005 ���� ��������� ������ ����� � ������, ���� ���������  ���������� ����������� ������� � ��������� ������ � �����, ������������ � �������� ��������� ������� ���������� ������������ ������ � ������� �� "������ �� - ����!".  ��������  ���������� ������  "���������" ������� �������� ���� ������� ������  ������������� ��������.</p>
          <p align="justify" class="text">������������� ����������� ���������� ����� ������� �������� ��������� ������������� 20 �����������  �� ������������, �����������, ���������� � ��������� ��������, �����-����������� � �����-��������� �������.</p>
          <p align="justify" class="text">������ �������� ��������:</p>
          <ol>
                <li align="justify">�������� ������������ ���� ����� ��� ������ � �����, �������������� �������;</li>
                <li align="justify">��������� ��������������� �������������� � ���������, ��������� �� ����� ������� ������� � ��������� ������ � �����;</li>
                <li align="justify">���������� � ����������� ����������� ������ ������������ ��������������� �������� � ������������ ����������� �� ��� ������ ������� � ��������� ������ � �����;</li>
                <li align="justify">������ �������� ���������������� ����������� ����������� ��������� ��������������� ����� � ��������� �������, ������������ ��������� ������� � �����.</li>
          </ol>
          <p align="justify" class="text">������ �� �����������, ���������� � ��������, ��������� ��� ����� �������� �� ���� ��������� �������  ��� ��������� ���������� ������ "���������". �������� �� �������� ������: �� ������� ��������� �� ���� ������������,  ���� ������ "�������" �� ���� ������, ����� �� �� ������� ���������� ����������������. � �� ����� ��� � ����� ������������, �������  ��������� ������ ������� �������� ���������  ����� ������ ���� ������ �� ����. ������ ��������� �������� �������������� ���� � ����� ����������� �������� ���  ������� ������������.  ������� ����� �������� �� ���� ����� ������������ ��� � ����, ��� �����, ��� �� � ����  ���� ����������� ������ ���������� �� �������� ������� ��� ���������  � ����� ���������� ��������� ������� �� �������, ���  ������� ������������ ���������� ������ "���������".</p>
          <p align="justify" class="text">������ �������� � ������ �������� �������� ����� ������� � ����� - ��������� �������: ������ ���������� � ���������� ����� � ��������� ����� �������� ���������� � ����� ������������ � ������, ��������� �������� ������ ��� ��� ����� ��������������, ����� ��������. ������ �� ���� ����� ������������ ��� ��������� ����������������� ������ ������� ������� �������. ���� ������������ ���������� ������ ��������� ������ ����� �� ��������� ������ ,���������� �� �������� � ����� �������. ��������� ���� ����� ���������������� �� ������� ������������ ����������� �� �������, ���������� ������������ � ��������, ������� ���� �����. </p>
          <p align="justify" class="text">������ ������ ��������, ������������ � ��������������� �����������, ����� ����� �������� �������������� ��������������� � ���������, � ������������ ������� ������, ��� ����� �������������� ����������� ������� �������� ��������� ������� �� ��������������� �������.</p>
          <p align="justify" class="text">�  2009 ���� �� ��������� ������ � ������ ������� ������������ ��� ��������� "�������� �������: ������ � ���������� �������� �� ������� ������������ ������� � ���������� ������������ ������". ������� ����� ������������ - ��������� ����� ����������� ������ "���������" � ����� ������������ ���������� �� ������ ������� �������� � ���� ������������� �������� ������ ������ ������� � �����, ������ ���� � ��������� ������������.
</p>
          <p align="justify" class="text">3 ����� 2009 ���� � ������������� ������ ����������� "�������� �������: ���������� � ������ �������� �� ������� ������������ ������� � ���������� ������������ ������"</p>
          <p align="justify" class="text">� ����������� ������� ������� ������������� 23 �����������-������ �������� ��������� ������� "������ �� - ����" �� 15 ������� ������ � ������� (�������������, ������, ����������, �������, ��������������, �������, �����-����, ���������, ������, ������� ������, ������������, �������������, ��������-����������, �����, �����������). ����� �� ����������� ������ � ������������ ���������� ������ "���������" � ��������������� ������ �������������� ����� 100 �������.</p>
          <p align="justify" class="text">����� ������ ������ ������ � ������������ ����������� �������������� �� ����������� ���������� ������ ������ ������� ������ �������� � ������������. �� ������������ ����������, ������� ��������� ��� ����� ��������, ������ �������� �� ����������� �������� ���� ��� � ������ ����. ���������� ������ ��������� � 2005 ����. � ���� ��� ������������� �������� ����� ������� ��������� ���������� ������ "���������" ������� ��������.</p>
          <p align="justify" class="text">�� ������ ����������� �������� ������� � ������������� ���� ����������. ������� ����� ����������� ���� ������ ��������, � ����� ��������� �� ��� ������������������ ��������� � ���������� �������� �������, ������� ������� ������� � �����������.</p>
          <p align="justify" class="text">�� ����������� ���� ����������� ���������� � ���������� � �������� ��������� 24 �����������.</p>
          <p align="justify" class="text"></p>

          <p align="center" font-color="#3399FF">
                <a target=_top
                    href="http://kc-ekaterina.ru/foto/image.jpg"><img
                    src="http://kc-ekaterina.ru/foto/image.jpg"
                    border=0 height="491" width="655"
                    alt="���������� ��������">
                </a><br>
                <h4 align="center" color="#3399FF">�� ������: ��������� ����������� � ����� �������� ��������� ������� �����-���������� ������� � ������������� 27 ����� 2013 ����</h4>
          </p>

          <?php } // Show if recordset empty ?>
        <br>
          <p align="center"><span class="bodyHeader"> <?php echo $row_Recordset2['name']; ?></span></p>
          <p><?php echo $row_Recordset2['text']; ?></p>
          <p align="right"><span class="newsDate"><?php echo $row_Recordset2['date']; ?></span></span></span> </p>          <p align="right"><br> </p> </td>

        <td width="20%" height="662" valign="top" bgcolor="#B7D6F8">
            <div class="newsHeader">����������</div>

            <?php do { ?>

			<table class="news">

		<tr><td rowspan="2" width="5%"><img src="../image/strelka2.jpg" width="7" height="7"></td>

		<td><a href="koaliciya.php?id=<?php echo $row_Recordset1['id']; ?>"><?php echo $row_Recordset1['name']; ?></a></td>
		</tr>
		<tr>
		<td class="newsDate"><?php echo $row_Recordset1['date']; ?></td>
		</tr>



			</table>
		<?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
	</td>


      </tr>
      <tr bgcolor="#B7D6F8">
        <td colspan="3"><?php include('include/footer.php');?>
		</td>
        </tr>
    </table></th>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
mysql_free_result($Recordset2);
?>
