<?php require_once('../Connections/Ekaterina.php'); ?>
<?php
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = "SELECT * FROM koaliciya WHERE lang = '2' ORDER BY id DESC";
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
$query_Recordset2 = sprintf("SELECT * FROM koaliciya WHERE lang = '2' and id = '%s'", $colname_Recordset2);
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
          <p align="center"><br><span class="bodyHeader">The Coalition of Crisis Centers of the Urals and Western Siberia<br>is alive and working!</span></p>
          <p align="justify" class="text">In mid-December of 2006 there was an interregional conference where, as a result of the Crisis Center Ekaterina's initiative, a coalition of crisis centers in the Urals and Siberia was created.  The coalition is called "Together We are Strong!".  Representatives from 20 participating organizations signed an official agreement about cooperation and collaboration at this conference.</p>
          <p align="center" font-color="#3399FF">
            <a target=_top
                href="http://kc-ekaterina.ru/foto/image.jpg"><img class="photo"
                src="http://kc-ekaterina.ru/foto/image.jpg"
                border=0 height="491" width="655"
                alt="Coalition"></a><br>
          <h4 align="center" color="#3399FF">Ekaterinburg, March, 2013</h4></p>

          <p align="justify" class="text">Within three months of the conference, women's crisis divisions and/or centers were opened in three oblast regions:  in Nizhnivartovsk, Surgut, and Kurgan.  The women who hastened the opening of these very important social institutions were delegates at the conference in Ekaterinburg. It was here that they received the extra share of optimism and confidence necessary to create these new centers.  Therefore in accomplishments of the conference, we can count not only the establishment of a coalition of crisis centers in the Urals-Siberia region, but also the creation of new crisis centers for women, including shelters that provide temporary housing for women survivors of domestic violence.  It is also important to note that these crisis centers were created within government centers for family and children support, meaning that they will be financed by the local and state government budgets.</p>
          <p align="justify" class="text">The first Council of the Coalition "Together We are Strong" met on August 16, 2006 in Ekaterinburg.</p>
          <p align="justify" class="text">In addition to discussing perspectives and strategies of collaboration between the Coalition's members, a training was organized for "Ekaterina's" colleagues from different crisis centers from the Urals-Siberia region.  The 21 participants in the training were representatives from crisis divisions and centers in Ekaterinburg, Bogdanovich, Pervouralsk, Chelyabinsk, and Snezhinsk.  The topic of the training was "Interactions of Crisis Centers with Organs and Institutions of the State Prevention System and with the Judicial System. Experience.  Problems."</p>
          <p align="justify" class="text">Goal of the training:  development and enhancement of mechanisms for interagency interactions, particularly but not exclusively with judges (who work on domestic violence) in order to increase the effectiveness of legal and social help to people suffering from domestic violence.</p>
          <p align="justify" class="text">The second Council of the Coalition occurred on October 13, 2006 in Tumen at an oblast family and children center; this center was the first in the Urals-Siberia region to provide services and support to women and children who have experienced domestic violence.  At the Coucil there were representatives from crisis centers from Ekaterinburg, Surgut, Sneshinsk, Tumen, and Chelyabinsk.  The participants, after hearing about the experiences of the Tumen crisis center with temporary housing for women, talked about their work on the problem of family violence in their own regions, and also explained about what kind of help and support they are hoping to received from more experienced members of the Coalition.</p>
          <p align="justify" class="text">As was planned half a year ago by the request of the Coalition members, the assistant director of the Crisis Center Ekaterina, psychologist Olga Selkova, led a training called "Basics of Consulting with Victims of Domestic Violence.  Preventative Measures for Professional Burnout."</p>
          <?php } // Show if recordset empty ?>
        <br>
          <p align="center"><?php echo $row_Recordset2['name']; ?></p>
          <p><?php echo $row_Recordset2['text']; ?></p>
          <p align="right"><?php echo $row_Recordset2['date']; ?></p>

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

mysql_free_result($Recordset2);
?>
