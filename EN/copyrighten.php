<?php require_once('../Connections/Ekaterina.php'); ?>
<?php
$maxRows_Recordset1 = 5;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = "SELECT * FROM news WHERE lang = 2 ORDER BY id DESC";
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
<title>kc-ekaterina.ru- «Кризисный центр «Екатерина» для женщин и детей, переживших насилие в семье»</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<script language="Javascript" src="menu\toggle.js"></script>
<link rel="stylesheet" href="menu\toggle.css">
</head>

<body onload="initDropMenu()">
<table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col"><table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
      <tr>
        <th width="15%">
            <table border='0'>
                <tr>
                    <td width="40%">Our assistance is<br>anonymous and free!</td>
                </tr>
                <tr>
                      <td>+7 (952) 146-22-23</td>
              </tr>
            </table>
        </th>
        <th scope="col">
              <img src="../image/tablebackground8.jpg" width="100%">
        </th>
        <th width="15%">
            <a href="http://www.112.ru/">
                <table height="120" border='0'>
                    <tr>
                        <td width="40%"><img src="../image/frst_logo.png" border="0" align="right"></td>
                        <td>Russian Federation Law-enforcement Portal</td>
                    </tr>
                </table>
            </a>
        </th>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td width="1%" valign="top" bgcolor="#CCCCCC"><p></p></td>
        <td width="13%" valign="top" bgcolor="#CCCCCC"><div align="left"><?php include('menu/menu.php');?></div></td>
        <td width="1%" valign="top" bgcolor="#CCCCCC"><p></p></td>
        <td width="1%" valign="top" bgcolor="#FFFFFF"><p></p></td>
         <td width="68%" height="462" valign="top" bgcolor="#FFFFFF"><p align="justify">

          <p align="left" class="bodyHeader">Создание сайта кризисного центра &quot;Екатерина&quot; финансируется:</p>
          <p align="justify" class="text"> Kомиссией по демократии посольства США. <br /> <i>Общественная организация
					  Кризисный центр &quot;Екатерина&quot; несет полную ответственность за содержание
					  данного web сайта, которое не может расцениваться как мнение Посольства США и
					  американского правительства.</i></p>
          <p align="left" class="text"> Великобританским Большим Лотерейным Фондом (BIG LOTTERY FUND)</p>
	</td>
        <td width="1%" valign="top" bgcolor="#FFFFFF"><p></p></td>
        <td width="15%" valign="top" bgcolor="#CCCCCC">
         <p align="center" class="news"><span class="newsHeader" font-color="white">Новости</span><br></p>
          <p align="left" class="news">
            <?php do { ?>
            <img src="../image/strelka.jpg" width="7" height="7">
            <a href="<?php echo $row_Recordset1['link']; ?>"><?php echo $row_Recordset1['news']; ?></a><br>
              <span class="newsDate" align="right"><?php echo $row_Recordset1['date']; ?><br>
              <br>
              </span>
            <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?> </p>
          <p align="left" class="news"> </p></p>
          <p align="left"> </p>
          <div align="center">
            <h1 align="left"> </h1>
          </div>
          <div align="left"></div>
          </td>
        </tr>
      <tr bgcolor="#CCCCCC">
        <td colspan="7"><?php include('copyrihten.php');?></td>
        </tr>
    </table></th>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
