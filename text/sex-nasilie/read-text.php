<?php require_once('../../Connections/ekaterina.php'); ?>
<?php
$colname_Recordset1 = "1";
if (isset($_GET['name'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_GET['name'] : addslashes($_GET['name']);
}
mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = sprintf("SELECT * FROM sexnasilie WHERE name = '%s'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $Ekaterina) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>�� &quot;���������&quot;-<?php echo $row_Recordset1['name']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<style type="text/css">
<!--
.style9 {font-size: 36px; color: #009966; }
body {
	background-color: #00FFCC;
}
.style11 {font-size: 36px; color: #000000; }
.style13 {
	font-size: 12px;
	font-style: italic;
}
-->
</style>
<link href="../../style.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" height="100%"  border="0" cellpadding="1" cellspacing="2">
  <tr>
    <th height="53" scope="col"><div align="center">
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div align="center"><span class="style9"><img src="../../images/banner.jpg" width="480" height="60"></span></div></td>
          </tr>
        </table>
    </div></th>
  </tr>
  <tr>
    <td height="311"><div align="center" class="style5 style7">        &nbsp;<span class="style11"><?php echo $row_Recordset1['name']; ?></span></div>      <p align="left">&nbsp;</p>      
      <table width="100%"  border="0">
        <tr>
          <td width="12%">&nbsp;</td>
          <td width="80%"><div align="left"><span class="style2"><?php echo $row_Recordset1['text']; ?></span></div></td>
          <td width="8%">&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>      <p align="right">&nbsp;<span class="style5"><?php echo $row_Recordset1['author']; ?><br>
        <strong><?php echo date("d.m.Y", strtotime($row_Recordset1['added'])); ?></strong>        </span></p>      <p align="center">&nbsp;</p>      
        <p align="center"><a href="../../sex-nasilie.php">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="30" height="10">
  <param name="movie" value="../../images/banners/back-blue.swf">
  <param name=quality value=high>
  <embed src="../../images/banners/back-blue.swf" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="30" height="10"></embed>
</object>
<strong>�����</strong></a></p>      
    </td>
  </tr>
  <tr valign="middle">
    <td height="94" valign="bottom"><p align="center" class="style4  style13">&copy; ������������ ������������ ������������ ����������� <br>
        ���������� ����� ���������� ��� ������ � �����, ���������� ������� � ����� <br>
        �����:620026, �. ������������, ��. �.������,36-48 �������:8(343) 262-46-49, 381-37-38 <br>
    ��� ����� �������� �������. ����������� ���������� �������� ������ ��� ������ �� ���� kc-ekaterina.ru </p></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
