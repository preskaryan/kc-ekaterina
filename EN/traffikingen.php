<?php require_once('../Connections/Ekaterina.php'); ?>
<?php
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = "SELECT * FROM traffiking WHERE lang = 2 ORDER BY added DESC";
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
$query_Recordset2 = sprintf("SELECT * FROM traffiking WHERE lang = 2 and id = '%s'", $colname_Recordset2);
$Recordset2 = mysql_query($query_Recordset2, $Ekaterina) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>"Ekaterina" - the Sverdlovsk regional crisis center</title>
<meta http-equiv=content-type content=text/html;charset=windows-1251>
<script language="JavaScript" src="menu\toggle.js"></script>
<link rel="stylesheet" href="menu\toggle.css">
</head>

<body onload="initPage()">
<table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th><table width="100%" height="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
      <tr bgcolor="#B7D6F8">
         <tr><?php include('include/headeren.php');?></tr>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td width="15%" valign="top" bgcolor="#B7D6F8"><div align="center"><span class="style49"><?php include('menu/toggle.php');?></span></div></td>
        <td width="70%" valign="top" bgcolor="#FFFFFF"><p align="left"><br>
          <span class="style39">
          <?php if ($totalRows_Recordset2 == 0) { // Show if recordset empty ?>
          </MM:DECORATION></MM_HIDDENREGION></span></p>
          <p align="center" class="style48">According to the United Nations, every year</p>
          <p align="center" class="bodyHeader"><span class="anotherColor">4 million people</span> <span class="style40">are trafficked throughout the world.</span></p>
          <p align="center"> </p>
          <p align="justify" class="text">  Unfortunately, slavery still exists today and many people have personally experienced this reality.
					    People are trafficked across borders, forced to work, intentionally put into financial debt, deprived of
					    freedom of movement, and exposed to perverse forms of physical, sexual, and psychological violence.  Human
					    trafficking affects all countries, including Russia.  The majority of people sold into slavery are women age
					    18-24.</p>
          <p align="center">    </p>
          <p align="justify" class="text">If you have any questions, please feel free to direct them to our informational hotline:</p>
          <p align="center" class="xbig anotherColor">+7 (952) 146-22-23</p>
          <p align="left"><span class="style39"><MM_HIDDENREGION><MM:DECORATION OUTLINE="Show%20If..." OUTLINEID=2>
            <?php } // Show if recordset empty ?>
          </span></p>
          <p align="center"><span class="xbig style39"><?php echo $row_Recordset2['name']; ?><br>
          </span></p>
 <p align="left"><span class="style39"><?php echo $row_Recordset2['text']; ?></span></p>
 <p align="left"></p>
<p align="right"><span class="style35"><?php echo $row_Recordset2['added']; ?></span><br>
   <span class="style40"><?php echo $row_Recordset2['author']; ?></span>
 </p></td>
        <td width="15%" valign="top" bgcolor="#B7D6F8" height="662">

          <div class="newsHeader">Helpful Information</div>

            <?php do { ?>
              <table class="news">
                <tr>
                    <td><img src="../image/strelka2.jpg" width="7" height="7"></td>
                    <td><a href="traffikingen.php?id=<?php echo $row_Recordset1['id']; ?>"><?php echo $row_Recordset1['name']; ?></td></a>
                </tr>
              </table>
            <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
        </td>
      </tr>
      <tr bgcolor="#B7D6F8">
        <td colspan="7"><?php include('copyrihten.php');?>
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
