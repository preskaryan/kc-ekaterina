<?php require_once('../Connections/Ekaterina.php'); ?>
<?php require_once('../Connections/Ekaterina.php'); ?>
<?php require_once('../Connections/Ekaterina.php'); ?>
<?php
$maxRows_Recordset1 = 20;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = "SELECT * FROM realnoistorii WHERE lang = '2' ORDER BY id DESC";
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
$query_Recordset2 = sprintf("SELECT * FROM realnoistorii WHERE lang = '2' and id = '%s'", $colname_Recordset2);
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
          <p align="justify" class="text">This section is reserved for the stories of those who can no longer be silent and who do not want to hide the truth.  The frightening truth about their family, about life with the people who are supposed to be dearest and closest, the life that turned into a nightmare.  It is also for the stories of those women, who fell into slavery, but who could escape and survive.</p>
          <p align="justify" class="text">If you want to share your story, you can send it to our email:
<a href=mailto:kc-ekaterina@mail.ru>kc-ekaterina@mail.ru</a><br> with the subject box "Real Stories" and we will put it here on our site.</p>
          <?php } // Show if recordset empty ?>          

          <p align="center" class="bodyHeader"><?php echo $row_Recordset2['name']; ?></p>
          <p><?php echo $row_Recordset2['text']; ?></p>
          <p align="right"><?php echo $row_Recordset2['author']; ?><br>
                           <?php echo $row_Recordset2['added']; ?></p>
         </div>

        <div class="rightmenu">
           <div class="newsHeader">Stories</div>
            <?php do { ?>
             <table class="news">
               <tr>
                 <td width='5%'><img src="../image/strelka2.jpg" width="7" height="7"></td>
                 <td><a href="realen.php?id=<?php echo $row_Recordset1['id']; ?>"><?php echo $row_Recordset1['name']; ?></a></td>
               </tr>
             </table>
            <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>

         </div>  
      </div>
    </div>
    <div id="footer"><?php include('include/footer.php');?></div>
    </div>

</body>
</html>
<?php
mysql_free_result($Recordset1);
mysql_free_result($Recordset2);
?>
