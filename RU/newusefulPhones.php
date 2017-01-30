<?php require_once('../Connections/Ekaterina.php'); ?>
<?php
$maxRows_Recordset1 = 30;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = "SELECT * FROM trening WHERE lang = '1' ORDER BY added DESC";
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
$query_Recordset2 = sprintf("SELECT * FROM trening WHERE lang = '1' and id = '%s'", $colname_Recordset2);
$Recordset2 = mysql_query($query_Recordset2, $Ekaterina) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
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
      <tr bgcolor="#B7D6F8">
        <?php include('include/header.php');?>
      </tr>
      
	  <tr bgcolor="#FFFFFF">
        <td width="20%" valign="top" bgcolor="#B7D6F8"><div align="left"><?php include('menu/menu.php');?></div></td>
        <td width="60%" valign="top" bgcolor="#FFFFFF">
          <?php if ($totalRows_Recordset2 == 0) { // Show if recordset empty ?>
		  <?php include('include/phones.php');?>
          <?php } // Show if recordset empty ?>
          <p> <span  class="bodyHeader"><br><?php echo $row_Recordset2['name']; ?></span></p>
          <p ><span class="style39"> <div align="left"> <?php echo $row_Recordset2['text']; ?></div></span></p>
			<p align="right">
			<span class="style35"> <?php echo $row_Recordset2['added']; ?>  </span><br>
			<span class="style35"><?php echo $row_Recordset2['author']; ?> </span></p>
		</td>

        <td width="20%" valign="top" bgcolor="#B7D6F8" height="662">
          <div class="newsHeader">Тренинги</div>
                <?php do { ?>
                    <table align="left" class="news">
                         <tr>
                                <td rowspan="2"><img src="../image/strelka2.jpg" width="7" height="7"></td>
                                <td><a href="trening.php?id=<?php echo $row_Recordset1['id']; ?>"><?php echo $row_Recordset1['name']; ?></a></td>
                         </tr>
                         <tr>
                                <td class="newsDate" align="right"><?php echo $row_Recordset1['added']; ?></td>
                         </tr>
                    </table>
                <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
        </td>
      </tr>
      
	  <tr bgcolor="#B7D6F8">
        <td colspan="6"><?php include('include/footer.php');?>
		</td>
      </tr>
    </table>
	</th>
  </tr>
</table>
</body>
</html>

<?php
mysql_free_result($Recordset1);
mysql_free_result($Recordset2);
?>
