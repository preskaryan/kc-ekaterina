<?php require_once('../Connections/Ekaterina.php'); ?>

<?php
$maxRows_Recordset1 = 30;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = "SELECT * FROM domviolence WHERE lang = '1' ORDER BY added DESC";
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
$query_Recordset2 = sprintf("SELECT * FROM domviolence WHERE id = '%s'", $colname_Recordset2);
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
    <div id="wrapper">
        
        <div id="header"><?php include('include/header.php');?></div>
        
    <div id="content">
      <div id="menu"><?php include('menu/menu.php');?></div>
      
      <div id="mainpage">
                <div class="information">
          <?php if ($totalRows_Recordset2 == 0) { // Show if recordset empty ?>
          <p align="center">  </p>
          <p align="center" class="big">Вы боитесь идти домой?</p>
          <p align="center" class="big">Там Вас оскорбляют и унижают?</p>
          <p align="center" class="big">А порой Ваша жизнь и жизнь Ваших детей под угрозой? </p>
          <p align="center" class="xxbig">Остановитесь!</p>
          <p align="center" class="big">Задумайтесь!</p>
          <p align="center" class="big">Что с Вами происходит?</p>
          <p align="center" class="xbig">Дом для человека – самое безопасное место. Так должно быть. </p>
          <p align="center" class="xbig anotherColor">А как живете Вы? </p>
          <p align="justify" class="text">Более 25% зафиксированных в России убийств происходят в семье (по данным «Новая газета» 15.10.2015).</p>
          <p align="justify" class="text">Более 50% преступлений в быту совершается в присутствии детей. Они труднее учатся в школе, страдают от депрессий, повышенной возбудимости и других нарушений психики. Более агрессивны, в 3 раза чаще могут затеять драку.</p>
          <p align="justify" class="text">Ежегодно 50000 детей убегают из дома, а около 2000 детей совершают суицид, спасаясь от жестокого обращения в семье (данные из рекомендаций Совета по правам человека при Президенте РФ, 2015 год).</p>
          <p align="justify" class="text">2500 детей в год погибают от домашнего насилия в России (данные российского журнала «Социс» Социологические исследования, №1, 2008).</p>
          <p align="justify" class="text">По мнению экспертов ЮНИСЕФ, среди детей, страдающих от насилия и ставших свидетелями насилия в семье, чаще встречаются случаи алкоголизма и наркомании, беременности в раннем возрасте, подростковой преступности.</p>

          <p align="justify" class="text">За один год в России погибает столько женщин, сколько за 10 лет Афганской войны погибло наших солдат. Вдумайтесь, 1 год мирной жизни равняется 10 годам войны! </p>
          <p align="justify" class="text">Ежедневно в России побоям подвергается <span class="anotherColor">36 тысяч</span> женщин. </p>
          <p align="justify">  </p>
          <p align="justify" class="text"><span class="anotherColor">Домашнее насилие</span> - многогранное социальное явление, проявляющееся в формах физического, эмоционально-психологического, сексуального, экономического принуждения, зависимости и подавления. Это система поведения одного члена семьи для установления и сохранения власти и контроля над другими членами семьи. </p>
          <?php } // Show if recordset empty ?>
          <p align="center"><span class="bodyHeader"><?php echo $row_Recordset2['name']; ?></span></p>
          <div align="justify" class="text"><?php echo $row_Recordset2['text']; ?></div>
        </div>


  <div class="rightmenu">
      <div class="newsHeader">Информация</div>
        <?php do { ?>
          <table align="left" class="news" width='100%'>
            <tr>
                <td><img src="../image/strelka2.jpg" width="7" height="7"></td>
                <td><a href="domviolence.php?id=<?php echo $row_Recordset1['id']; ?>"><?php echo $row_Recordset1['name']; ?></a></td>
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
