<?php require_once('../Connections/Ekaterina.php'); ?>
<?php require_once('../Connections/Ekaterina.php'); ?>
<?php require_once('../Connections/Ekaterina.php'); ?>
<?php
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = "SELECT * FROM realnoistorii WHERE lang = '2' ORDER BY added DESC";
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

$colname_Recordset2 = "1";
if (isset($_GET['name'])) {
  $colname_Recordset2 = (get_magic_quotes_gpc()) ? $_GET['name'] : addslashes($_GET['name']);
}
mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset2 = sprintf("SELECT * FROM realnoistorii WHERE lang = '2' and name = '%s'", $colname_Recordset2);
$Recordset2 = mysql_query($query_Recordset2, $Ekaterina) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Crisis Center "Ekaterina"</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<script language="JavaScript" src="menu\toggle.js"></script>
<link rel="stylesheet" href="menu\toggle.css">

<body onload="initPage()">
<table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col"><table width="100%" height="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
      <tr bgcolor="#B7D6F8">
         <tr><?php include('include/headeren.php');?></tr>
        </tr>
      <tr bgcolor="#FFFFFF">
        <td width="15%" valign="top" bgcolor="#B7D6F8"><div align="left"><?php include('menu/toggle.php');?></div></td>
        <td valign="top" bgcolor="#FFFFFF"><?php if ($totalRows_Recordset2 == 0) { // Show if recordset empty ?>
          <p align="justify" class="text">This section is reserved for the stories of those who can no longer be silent and who do not want to hide the truth.  The frightening truth about their family, about life with the people who are supposed to be dearest and closest, the life that turned into a nightmare.  It is also for the stories of those women, who fell into slavery, but who could escape and survive.</p>
          <p align="justify" class="text">If you want to share your story, you can send it to our email:
<a href=mailto:notviolence@etel.ru>notviolence@etel.ru</a><br> with the subject box "Real Stories" and we will put it here on our site.</p>
          <?php } // Show if recordset empty ?>          <p align="left"><span class="text"><MM_HIDDENREGION><MM:DECORATION OUTLINE="Show%20If..." OUTLINEID=2></MM:DECORATION></MM_HIDDENREGION>          </span></p>
          <br><p align="center" class="bodyHeader"><?php echo $row_Recordset2['name']; ?></p>

 <p><div align="left"><span class="style43"><?php echo $row_Recordset2['text']; ?></span></div></p>
 <p align="right"><br>
   <span class="style35"> <?php echo $row_Recordset2['added']; ?>  </span><br>
     <span class="style40"><?php echo $row_Recordset2['author']; ?> </span></p>
 </td>

	<td width="15%" height="662" valign="top" bgcolor="#B7D6F8">
        </td>
      </tr>
      <tr bgcolor="#B7D6F8">
        <td colspan="3"><?php include('copyrihten.php');?>




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


mysql_free_result($Recordset2);
?>
