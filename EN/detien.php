<?php require_once('../Connections/Ekaterina.php'); ?>
<?php
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = "SELECT * FROM deti WHERE lang = '2' ORDER BY added DESC";
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
$query_Recordset2 = sprintf("SELECT * FROM deti WHERE lang = '2' and name = '%s'", $colname_Recordset2);
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
    <div id="wrapper">
        
        <div id="header"><?php include('include/headeren.php');?></div>
        
    <div id="content">
      <div id="menu"><?php include('menu/toggle.php');?></div>
      
      <div id="mainpage">
        <div class="information">
            <?php if ($totalRows_Recordset2 == 0) { // Show if recordset empty ?>
                      <p class="bodyHeader" align="center">Violence against children</p>
			                   <p align="justify" class="text">According to official statistics about 2 million children are
							           subjected to cruel and violent treatment every year.  Of these
							           2 million, every tenth child is killed; two thousand commit suicide,
							           and more than 50,000 run away from home.</p>
			                   <p align="justify" class="text">About 60% of children who witness or experience family violence cannot
							           escape this violence in their adult life.  Sometimes they again become
							           victims of violence and other times they themselves commit violence
							           within their family.</p>
			                   <p align="justify" class="text">Children are defenseless under the tyranny of adults.  They are at
							           once trusting and vulnerable.  Unfortunately, adults all too often
							           use their authority and power in order to harass and abuse children.
							           This is both immoral and illegal.</p>
                         <p>
                         <span class="text"><br>
                          <br>
                          <?php } // Show if recordset empty ?>
                          </span></p>
                          <p align="center"> <span class="bodyHeader"><?php echo $row_Recordset2['name']; ?><br>
                          </span></p>
                          <p align="left"><span class="text"><?php echo $row_Recordset2['text']; ?></span></p>
                          <p align="right"><br>
                            <span class="newsDate"> <?php echo $row_Recordset2['added']; ?>  </span><br>
                            <span class="newsDate"><?php echo $row_Recordset2['author']; ?> </span></p>
        </div>

        <div class="rightmenu">
        </div>
        
        <div id="footer"><?php include('include/footer.php');?></div>
        </div>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
