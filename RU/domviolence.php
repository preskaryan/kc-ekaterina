<?php require_once('../Connections/Ekaterina.php'); ?>

<?php
$maxRows_Recordset1 = 30;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = "SELECT * FROM domviolence WHERE lang = '1' ORDER BY added DESC";
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
$query_Recordset2 = sprintf("SELECT * FROM domviolence WHERE id = '%s'", $colname_Recordset2);
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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
</head>

<body onload="initPage()">
    <div id="wrapper">
        
        <div id="header"><?php include('include/header.php');?></div>
        
    <div id="content">
      <div id="menu"><?php include('menu/menu.php');?></div>
      
      <div id="mainpage">
                <div class="information">
          <?php if ($totalRows_Recordset2 == 0) { // Show if recordset empty ?>
          <p align="center">  </p>
          <p align="center" class="big">�� ������� ���� �����?</p>
          <p align="center" class="big">��� ��� ���������� � �������?</p>
          <p align="center" class="big">� ����� ���� ����� � ����� ����� ����� ��� �������? </p>
          <p align="center" class="xxbig">������������!</p>
          <p align="center" class="big">�����������!</p>
          <p align="center" class="big">��� � ���� ����������?</p>
          <p align="center" class="xbig">��� ��� �������� � ����� ���������� �����. ��� ������ ����. </p>
          <p align="center" class="xbig anotherColor">� ��� ������ ��? </p>
          <p align="justify" class="text">����� 25% ��������������� � ������ ������� ���������� � ����� (�� ������ ������ ������ 15.10.2015).</p>
          <p align="justify" class="text">����� 50% ������������ � ���� ����������� � ����������� �����. ��� ������� ������ � �����, �������� �� ���������, ���������� ������������ � ������ ��������� �������. ����� ����������, � 3 ���� ���� ����� ������� �����.</p>
          <p align="justify" class="text">�������� 50000 ����� ������� �� ����, � ����� 2000 ����� ��������� ������, �������� �� ��������� ��������� � ����� (������ �� ������������ ������ �� ������ �������� ��� ���������� ��, 2015 ���).</p>
          <p align="justify" class="text">2500 ����� � ��� �������� �� ��������� ������� � ������ (������ ����������� ������� ������ ��������������� ������������, �1, 2008).</p>
          <p align="justify" class="text">�� ������ ��������� ������, ����� �����, ���������� �� ������� � ������� ����������� ������� � �����, ���� ����������� ������ ����������� � ����������, ������������ � ������ ��������, ������������ ������������.</p>

          <p align="justify" class="text">�� ���� ��� � ������ �������� ������� ������, ������� �� 10 ��� ��������� ����� ������� ����� ������. ����������, 1 ��� ������ ����� ��������� 10 ����� �����! </p>
          <p align="justify" class="text">��������� � ������ ������ ������������ <span class="anotherColor">36 �����</span> ������. </p>
          <p align="justify">  </p>
          <p align="justify" class="text"><span class="anotherColor">�������� �������</span> - ������������ ���������� �������, ������������� � ������ �����������, ������������-����������������, ������������, �������������� �����������, ����������� � ����������. ��� ������� ��������� ������ ����� ����� ��� ������������ � ���������� ������ � �������� ��� ������� ������� �����. </p>
          <?php } // Show if recordset empty ?>
          <p align="center"><span class="bodyHeader"><?php echo $row_Recordset2['name']; ?></span></p>
          <div align="justify" class="text"><?php echo $row_Recordset2['text']; ?></div>
        </div>


  <div class="rightmenu">
      <div class="newsHeader">����������</div>
        <?php do { ?>
          <table align="left" class="news" width='100%'>
            <tr>
                <td><img src="../image/strelka2.jpg" width="7" height="7"></td>
                <td><a href="domviolence.php?id=<?php echo $row_Recordset1['id']; ?>"><?php echo $row_Recordset1['name']; ?></a></td>
            </tr>
          </table>
                <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </div>

      </div>
    
    </div>
        
    <div id="footer"><?php include('include/footer.php');?></div>
    </div>

</body>
</html>
<?php
mysql_free_result($Recordset1);
mysql_free_result($Recordset2);
?>
