<?php require_once('../Connections/Ekaterina.php'); ?>

<?php
$maxRows_Recordset1 = 5;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = "SELECT * FROM project WHERE lang = '2' ORDER BY added DESC";
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
$query_Recordset2 = sprintf("SELECT * FROM project WHERE lang = '2' and id = '%s'", $colname_Recordset2);
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
<style type="text/css">
<!--
.style59 {
color: #333333
}

.style39 {
	color: #000000;
	font-size: 16px;
}

.style49 {
	color: #3399FF;
	font-size: 18px;
}
-->
</style>
</head>

<body onload="initPage()">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col"><table width="100%" height="100%" border="0"  cellpadding="0" cellspacing="0">
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
        <td width="70%" valign="top" bgcolor="#FFFFFF">



          <?php if ($totalRows_Recordset2 == 0) { // Show if recordset empty ?>


<p align="center" class="bodyHeader"><br>
            The Crisis Center "Ekaterina" started its work in 1998. </p>

<p align="center"
<a target=_top
href="http://kc-ekaterina.ru/foto/3.jpg"><img
src="http://kc-ekaterina.ru/foto/3.jpg"
border=0 height=300 width=400
alt="Photo from conference"/></a></p>

<p align="justify" class="text">In this time we have completed more than 10 different projects focusing on the problems of
				domestic violence and human trafficking in our community.  In the course of realizing these
				projects, the center's specialists provide direct psychological and legal support to women
				suffering from domestic violence, develop and lead trainings for specialists working on the
				problems of family violence and human trafficking, organize conferences and round tables, and
				publish methodological and informational materials.</p>
          <?php } // Show if recordset empty ?>
          <p> <span  class="style49"><br><?php echo $row_Recordset2['name']; ?></span></p>

          <p ><span class="style39"> <div align="left"> <?php echo $row_Recordset2['text']; ?></div></span></p>
 <p align="right">
   <span class="style59">�<?php echo $row_Recordset2['added']; ?>� </span><br>
     <span class="style59"><?php echo $row_Recordset2['author']; ?>�</span></p>
 </td>


        <td width="15%" height="662" valign="top" bgcolor="#B7D6F8">

            <div class="newsHeader">Our Projects</div>

		<?php do { ?>
			<table width="100%" align="left" class="news">
			    <tr>
					<td rowspan="2"><img src="../image/strelka2.jpg" width="7" height="7"></td>
            		<td><a href="projecten.php?id=<?php echo $row_Recordset1['id'];?>"><?php echo $row_Recordset1['name']?></a></td>
				</tr>
				<tr>
            		<td class="newsDate"><?php echo $row_Recordset1['added']; ?></td>
			    </tr>
            		</table>
            	<?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
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