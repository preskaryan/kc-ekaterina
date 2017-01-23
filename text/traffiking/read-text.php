<?php require_once('../../Connections/ekaterina.php'); ?>
<?php
$colname_Recordset1 = "1";
if (isset($_GET['name'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_GET['name'] : addslashes($_GET['name']);
}
mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = sprintf("SELECT * FROM traffiking WHERE name = '%s'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $Ekaterina) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php echo $row_Recordset1['name']; ?>-КЦ "Екатерина"</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<style type="text/css">
<!--
.style1 {
	font-size: 36px;
	font-weight: bold;
}
body {
	background-color: #59ACFF;
}
.style2 {font-family: "Times New Roman", Times, serif}
.style3 {font-size: 12px}
-->
</style>
</head>

<body>
<table width="100%"  border="0" cellpadding="1" cellspacing="1
">
  <tr>
    <th height="74" scope="col"><img src="../../images/banner.jpg" width="480" height="60"></th>
  </tr>
  <tr>
    <th scope="col"><div align="center">
      <p><img src="../../images/traffik-banner.jpg" width="227" height="57"></p>
      </div>
    <p><span class="style1"><?php echo $row_Recordset1['name']; ?></span></p>      
      <table width="100%"  border="0">
        <tr>
          <td width="15%">&nbsp;</td>
          <td width="77%"><div align="left"><span class="style2"><?php echo $row_Recordset1['text']; ?></span></div></td>
          <td width="8%">&nbsp;</td>
        </tr>
      </table>      <p>&nbsp; </p>      <p align="left" class="style2">&nbsp;</p>      
      <p align="right"><strong> <?php echo date("d.m.Y", strtotime($row_Recordset1['added'])); ?><br>
      </strong><strong><?php echo $row_Recordset1['author']; ?></strong></p>
      <p>&nbsp;</p>      
      <p align="center"><strong><a href="../../traffiking.php">
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="30" height="17">
          <param name="movie" value="../../images/banners/back-blue.swf">
          <param name=quality value=high>
          <embed src="../../images/banners/back-blue.swf" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="30" height="17"></embed>
        </object>
Назад</a></strong></p>
      <p align="left">      <br>
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="119" height="60">
          <param name="movie" value="../../images/banners/traffik/4.swf">
          <param name=quality value=high>
          <embed src="../../images/banners/traffik/4.swf" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="119" height="60"></embed>
        </object>
      </p></th>
  </tr>
  <tr valign="middle">
    <td height="40">
      <p align="center" class="style4 style3"><em>&copy; Свердловская региональная общественная организация <br>
«Кризисный центр «Екатерина» для женщин и детей, переживших насилие в семье» <br>
Адрес:620026, г. Екатеринбург, ул. К.Маркса,36-48 Телефон:8(343) 262-46-49, 381-37-38 <br>
    Все права защищены законом. Перепечатка материалов возможна только при ссылке на сайт kc-ekaterina.ru </em></p></td>
  </tr>
</table>

</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
