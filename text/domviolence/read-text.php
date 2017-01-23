<?php require_once('../../Connections/ekaterina.php'); ?>
<?php
$colname_Recordset1 = "1";
if (isset($_GET['name'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_GET['name'] : addslashes($_GET['name']);
}
mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = sprintf("SELECT * FROM domviolence WHERE name = '%s'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $Ekaterina) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>КЦ &quot;Екатерина&quot;-<?php echo $row_Recordset1['name']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<style type="text/css">
<!--
.style9 {font-size: 36px; color: #009966; }
body {
	background-color: #00FFCC;
	background-image:  url(../../images/house2.jpg);
}
.style11 {font-size: 36px; color: #000000; }
.style13 {
	font-size: 12px;
	font-style: italic;
}
.style14 {
	font-size: 12px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<table width="100%" height="100%"  border="0" cellpadding="1" cellspacing="2">
  <tr>
    <th scope="col"><div align="center">
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div align="center"><img src="../../images/knopki-dom/banner.jpg" width="480" height="60"></div></td>
          </tr>
        </table>
    </div>      <div align="center" class="style5 style7">
        <p>&nbsp;<span class="style11"><?php echo $row_Recordset1['name']; ?></span></p>
      </div></th>
  </tr>
  <tr>
    <td height="236" valign="top"><p>&nbsp;</p>
        <table width="100%"  border="0">
          <tr>
            <td width="13%">&nbsp;</td>
            <td width="79%"><span class="style2"><?php echo $row_Recordset1['text']; ?></span></td>
            <td width="8%">&nbsp;</td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <p align="right">&nbsp;<span class="style5"><?php echo $row_Recordset1['author']; ?><br>
        <strong><?php echo date("d.m.Y", strtotime($row_Recordset1['added'])); ?></strong>        </span></p>
        <p align="center">&nbsp;</p>
        <p align="center">&nbsp;</p>
        <p align="center"><a href="../../domviolence.php" class="style14">
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="30" height="10">
          <param name="movie" value="../../images/banners/back.swf">
          <param name=quality value=high>
          <embed src="../../images/banners/back.swf" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="30" height="10"></embed>
        </object>
        Назад</a></p>
    </td>
  </tr>
  <tr valign="middle">
    <td height="94" valign="bottom"><p align="center" class="style4  style13">&copy; Свердловская региональная общественная организация <br>
        «Кризисный центр «Екатерина» для женщин и детей, переживших насилие в семье» <br>
        Адрес:620026, г. Екатеринбург, ул. К.Маркса,36-48 Телефон:8(343) 262-46-49, 381-37-38 <br>
    Все права защищены законом. Перепечатка материалов возможна только при ссылке на сайт kc-ekaterina.ru </p></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
