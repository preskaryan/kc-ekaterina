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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
</head>

<body onload="initPage()">
    <div id="wrapper">
        
        <div id="header"><?php include('include/headeren.php');?></div>
        
    <div id="content">
      <div id="menu"><?php include('menu/toggle.php');?></div>
      
      <div id="mainpage">
        <div class="information">
          <p align="center" class="bodyHeader">Who are we?</p>
          <p align="center" class="text">We are "Ekaterina" - the Sverlovsk regional crisis center for women and children
           suffering from violence within their family. </p>
          <p align="center" class="bodyHeader">How did we get started?</p>
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

        </div>

        <div class="rightmenu">
         </div>  
      </div>
    </div>
    <div id="footer"><?php include('include/footer.php');?></div>
    </div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
