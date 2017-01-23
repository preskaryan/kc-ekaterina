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
<title>"Ekaterina" - the Sverdlovsk regional crisis center</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">

<script language="JavaScript" src="menu\toggle.js"></script>


<link rel="stylesheet" href="menu\toggle.css">
</head>

<body onload="initPage()">
<table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th><table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
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
        <td width="15%" valign="top" bgcolor="#B7D6F8"><span><?php include('menu/toggle.php');?></span></td>
         <td width="70%" height="462" valign="top" bgcolor="#FFFFFF"><p align="justify">

          <p align="center" class="bodyHeader">Who are we?</p>
          <p align="center" class="text">We are "Ekaterina" - the Sverlovsk regional crisis center for women and children
					 suffering from violence within their family. </p>
          <p align="center" class="bodyHeader">How did we get started?</span></p>
          <p align="left" class="text">The women's crisis center "Ekaterina" officially opened in Ekaterinburg on March 6th, 1998, although
					a team of local women began working on the problem of domestic violence in 1996.  The center was founded
					by four women.  Our organization spearheaded the citywide program to fight family violence in Ekaterinburg.
					With our work we have not only reached the general public, but also by the media and government representatives,
					many of whom have become our partners in our movement.</p>
          <p align="center">
              <span class="bodyHeader">Our goals.</span></p>
          <p align="left" class="text">Providing social, psychological, and legal help and support to women suffering from domestic violence;
					raising public awareness about the problem of domestic violence and about the trafficking of Russian
					women and girls.</p>
          <p align="center" class="bodyHeader">What exactly do we do?</p>
          <p align="left" class="text">The center's specialists provide free individual consultations to women suffering from domestic violence
					and/or human trafficking.  We also operate a telephone hotline, organize support groups and individual
					help for women, and when necessary we provide legal assistance for women who are prosecuting or suing
					perpetrators of domestic violence.  We regularly work with the regional, statewide, and local media to
					raise public awareness about domestic violence and human trafficking.</p>
          <p align="justify"><span class="newsHeader"><br>
              </span></p></td>
        <td width="15%" valign="top" bgcolor="#B7D6F8" height="662"><p> </p>
        <!--  <p class="newsHeader">News</p>
	          <p align="left" class="news">
            <?php do { ?>
           	 <img src="../image/strelka2.jpg" width="7" height="7">
            	<a href="<?php echo $row_Recordset1['link']; ?>"><?php echo $row_Recordset1['news']; ?></a><br>
              	<span class="newsDate" align="right"><?php echo $row_Recordset1['date']; ?><br>
              	<br>
              </span>
            <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?></p> -->
        </tr>
      <tr bgcolor="#B7D6F8">
        <td colspan="5"><?php include('copyrihten.php');?><br>










</font>






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
