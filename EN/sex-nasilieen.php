<?php require_once('../Connections/Ekaterina.php'); ?>
<?php
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = "SELECT * FROM sexnasilie where lang = '2' ORDER BY added DESC";
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
$query_Recordset2 = sprintf("SELECT * FROM sexnasilie WHERE lang = '2' and name = '%s'", $colname_Recordset2);
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
</head>

<body onload="initPage()">
<table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col"><table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
      <tr bgcolor="#B7D6F8">
         <tr><?php include('include/headeren.php');?></tr>
        </tr>
      <tr bgcolor="#FFFFFF">
        <td width="15%" valign="top" align="left" bgcolor="#B7D6F8"><div align="left" ><?php include('menu/toggle.php');?></div></td>
        <td width="70%" valign="top" bgcolor="#FFFFFF"><p align="left"><br>
          <span class="text">
          <?php if ($totalRows_Recordset2 == 0) { // Show if recordset empty ?>
          </MM:DECORATION></MM_HIDDENREGION></span></p>
          <p align="center" class="bodyHeader">WHAT IS SEXUAL VIOLENCE? </p>
          <p align="justify" class="style47">Sexual violence is difficult to talk about.  Sexual violence against a woman affects her deepest and most private feelings.  The difficult position of a sexual violence survivor is intensified by preconceived public attitudes about sexual violence and especially about women who have experienced it. </p>
          <p align="justify" class="style47">Nevertheless, it is necessary to talk about it:  sexual violence is a universal problem.  It occurs in every country, regardless of the standard of living.  This is a violent crime that happens more often that you might realize. </p>
          <p align="justify" class="style47">In Russia 30% of female college seniors have experienced sexual violence.  According to anonymous surveys taken in Russian, 3 out of every 10 people have experienced some kind of sexual violence at some point in their life. </p>
          <p align="justify" class="style47 style53">If someone AGAINST YOUR WILL: </p>
          <p align="justify" class="style42"><span class="style51">showed</span><span class="style40"> you their sexual organs,</span></p>
          <p align="justify" class="style42"><span class="style40">
            </span><span class="style51">watched </span><span class="style40">you during intimate moments,</span></p>
          <p align="justify" class="style42"><span class="style40">
              </span><span class="style51">addressed </span><span class="style40">you with vulgar or insulting terms that are offensive and compromise your dignity,</span></p>
          <p align="justify" class="style42">
              <span class="style51">forced </span><span class="style40">you during a telephone or face-to-face conversation to discuss sexual topics,</span></p>
          <p align="justify" class="style42">
              <span class="style51">touched </span><span class="style40">your intimate body parts or forced you to touch their body against your will,</span></p>
          <p align="justify" class="style42">
              <span class="style52">raped </span>you,</p>
          <p align="justify" class="style42"><span class="style49"><span class="style40">then you can confidently say that there was </span></span><span class="xBig anotherColor">SEXUAL VIOLENCE</span><span class="style49"><span class="style40"> in your relationship and interactions.</span></span><br>
          </p>
          <p align="left"><span><MM_HIDDENREGION><MM:DECORATION OUTLINE="Show%20If..." OUTLINEID=2>
            <?php } // Show if recordset empty ?>
          </span></p>
          <p align="center"> <span class="bodyHeader"><?php echo $row_Recordset2['name']; ?>
          </span></p>
 <?php echo $row_Recordset2['text']; ?>
 <p align="right"><span class="style35"> <?php echo $row_Recordset2['added']; ?>  </span><br>
   <span class="style40"><?php echo $row_Recordset2['author']; ?> </span>
</p> </td>


	 <td width="15%" height="462" valign="top" bgcolor="#B7D6F8"></td>
      </tr>
      <tr bgcolor="#B7D6F8">
        <td colspan="3"><?php include('copyrihten.php');?></td>
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
