<?php require_once('../Connections/Ekaterina.php'); ?>
<?php
$maxRows_Recordset1 = 5;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = "SELECT * FROM news ORDER BY id DESC";
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
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>«Кризисный центр «Екатерина» для женщин и детей, переживших насилие в семье»</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<script language="Javascript" src="menu/menu.js"></script>
<link rel="stylesheet" href="menu/menu.css">
</head>

<body onload="initPage()">
<table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th><table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <th>
            <table border='0'>
                <tr>
                    <td width="40%">Наша помощь анонимна и бесплатна!</td>
                </tr>
                <tr>
                      <td>+7 (952) 146-22-23</td>
              </tr>
            </table>
        </th>
        <th scope="col">
              <img src="../image/tablebackground8.jpg" width="100%">
        </th>
        <th>
            <a href="http://www.112.ru/">
                <table height="120" border='0'>
                    <tr>
                        <td width="40%"><img src="../image/frst_logo.png" border="0" align="right"></td>
                        <td>Правоохранительный портал Российской Федерации</td>
                    </tr>
                </table>
            </a>
        </th>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td width="15%" valign="top" bgcolor="#B7D6F8"><div align="left"><?php include('menu/menu.php');?></div></td>
         <td width="70%" valign="top" bgcolor="#FFFFFF"><p></p><p align="justify">

          <p align="center" class="bodyHeader">Создание сайта кризисного центра &quot;Екатерина&quot; финансируется:</p>

          <p align="left" class="text">Великобританским Большим Лотерейным Фондом (BIG LOTTERY FUND)</p>
	</td>
        <td width="15%" valign="top" bgcolor="#B7D6F8" height="662">          </td>
        </tr>
      <tr bgcolor="#B7D6F8">
        <td colspan="3"><?php include('copyriht.php');?></td>
        </tr>
    </table></th>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
