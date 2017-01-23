<?php require_once('../Connections/Ekaterina.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = "SELECT * FROM coalitionMembers ORDER BY id ASC";
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
	<title>Кризисный центр «Екатерина» для женщин и детей, переживших насилие в семье</title>
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

      <tr bgcolor="#FFFFFF">
        <td width="20%" valign="top" bgcolor="#B7D6F8"><div align="center"><?php include('menu/menu.php');?></div></td>
        <td valign="top" bgcolor="#FFFFFF">



 	    <p align="center" class="bodyHeader">Список членов коалиции</p>
       <ol class="ulPartners">
          <?php do { ?>
                <li class="text">
                    <span class="bigItalic anotherColor"><?php echo $row_Recordset1['fullName']; ?></span>
                    <br>
                    <br>
                    <span class="text">Город: <?php echo $row_Recordset1['city']; ?><br></span>
                    <span class="text">Контактное лицо: <?php echo $row_Recordset1['contactPerson']; ?><br></span>
                    <span class="text">Контактный телефон: <?php echo $row_Recordset1['phone']; ?><br></span>
                    <span class="text">Электронная почта: <?php echo $row_Recordset1['email']; ?><br></span>
                    <br>
                </li>
                             <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
        </ol>
          <div align="left">
            <table width="100%" height="50"  border="0" align="center" cellpadding="0" cellspacing="0">
              <tr bgcolor="#0076AE">
                <th height="50" bgcolor="#FFFFFF" scope="col"><div align="left">
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

	        <td width="20%" valign="top" bgcolor="#B7D6F8">            
			<div class="newsHeader">Информация</div>

</td>
        </tr>
      <tr bgcolor="#B7D6F8">
        <td colspan="3"><?php include('include/footer.php');?>
		<br>
		</td>
        </tr>
    </table></th>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
