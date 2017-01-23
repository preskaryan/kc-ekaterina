<?php require_once('../Connections/Ekaterina.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 15;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = "SELECT * FROM faq WHERE lang = '2' ORDER BY added DESC";
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

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false &&
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Crisis Center "Ekaterina"</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<script language="JavaScript" src="menu\toggle.js"></script>
<link rel="stylesheet" href="menu\toggle.css">
<style type="text/css">
<!--

.style31 {color: #666666}
-->
</style></head>

<body onload="initPage()">
<table width="100%" height="700"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col"><table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
      <tr bgcolor="#B7D6F8">
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
        <td width="15%" valign="top" bgcolor="#B7D6F8"><div align="left"><?php include('menu/toggle.php');?></div></td>
        <td width="70%" height="253" valign="top" bgcolor="#FFFFFF"><p align="center" class="xbig anotherColor">You can send your questions to <a href="mailto:kc-ekaterina@mail.ru>kc-ekaterina@mail.ru</a> </p>
          <ol>
             <?php do { ?>
             <li><div>
          <p align="left" class="questionTitle">Q:</p>
          <p align="justify" class="question"><?php echo $row_Recordset1['vopros']; ?></p>
           <p align="left" class="answerTitle">A:</p>
         <p align="justify" class="answer"><?php echo $row_Recordset1['otvet']; ?></p>
               </div></li>
         <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
          </ol>
          <div align="left">
            <table width="100%" height="21"  border="0" align="center" cellpadding="0" cellspacing="0">
              <tr bgcolor="#0076AE">
                <th height="17" bgcolor="#FFFFFF" scope="col"><div align="left" class="style31">
                  <?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>"><img src="../image/back.jpg" width="100" height="18"></a>
                  <?php } // Show if not first page ?>
                </div></th>
                <td bgcolor="#FFFFFF" scope="col"><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
                  <div align="right"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>"> <img src="../image/next.jpg" width="100" height="18"> </a></div>
                  <?php } // Show if not last page ?></td>
              </tr>
            </table>
          </div></td>
        <td width="15%" valign="top" bgcolor="#B7D6F8"><div> </div></td>
        </tr>
      <tr bgcolor="#B7D6F8">
        <td colspan="3"><?php include('copyrihten.php');?>
		</td>
        </tr>
    </table></th>
  </tr>
</table>
</body>
</html>
<?php mysql_free_result($Recordset1);?>
