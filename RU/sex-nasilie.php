<?php require_once('../Connections/Ekaterina.php'); ?>
<?php
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = "SELECT * FROM sexnasilie ORDER BY added DESC";
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
$query_Recordset2 = sprintf("SELECT * FROM sexnasilie WHERE id = '%s'", $colname_Recordset2);
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
          <p align="center" class="bodyHeader">Что такое сексуальное насилие? </p>
          <p align="justify" class="text">Об этом трудно говорить. Сексуальное насилие над женщиной затрагивает самые глубинные и очень личные чувства. Положение пострадавшей усугубляется предвзятым отношением общества к проблеме насилия и, особенно, к самой женщине. </p>
          <p align="justify" class="text">Однако говорить об этом надо, ведь сексуальное насилие – это глобальная проблема. Оно имеет место во всех странах, независимо от уровня их благополучия. Это преступление против личности совершается чаще, чем Вы можете предположить. </p>
          <p align="justify" class="text">В России 30% старшеклассниц ежегодно подвергаются сексуальному насилию. По данным анонимных опросов, проводимых в России 3 человека из 10 когда-либо в своей жизни подвергались сексуальному насилию (30%). </p>
          <p align="justify" class="text">Если кто-то ПРОТИВ ВАШЕЙ ВОЛИ:
          <ul>
            <li>демонстрировал вам свои половые органы,</li>
            <li>подглядывал за вами в интимные моменты,</li>
            <li>отпускал в ваш адрес пошлые, затрагивающие чувство собственного достоинства замечания, оскорблял  вас,</li>
            <li>втягивал вас во время личного или телефонного разговора в обсуждение сексуальных тем,</li>
            <li>прикасался к интимным частям вашего тела или принуждал Вас прикасаться к нему,</li>
            <li>изнасиловал Вас,</li>
          </ul>
          <span class="text">то можно с полной уверенностью утверждать, что в отношении Вас было совершено <span class="text xBig anotherColor">СЕКСУАЛЬНОЕ НАСИЛИЕ.</span></span></p>
          <p align="left"><span><MM_HIDDENREGION><MM:DECORATION OUTLINE="Show%20If..." OUTLINEID=2>
            <?php } // Show if recordset empty ?>
          </span></p>
          <p align="center" class="bodyHeader"><?php echo $row_Recordset2['name']; ?></p>
          <p align="justify" class="text"><?php echo $row_Recordset2['text']; ?></p>
          <p align="right"><span class="newsDate"> <?php echo $row_Recordset2['added']; ?>  </span><br>
          <span class="style40"><?php echo $row_Recordset2['author']; ?> </span>
          </p> 
      </div>

      <div class="rightmenu">
           <div class="newsHeader">Информация</div>
            <?php do { ?>
              <table width="100%" align="left" class="news" >
                <tr>
                  <td><img src="../image/strelka2.jpg" width="7" height="7"></td>
                  <td><a href="sex-nasilie.php?id=<?php echo $row_Recordset1['id']; ?>"><?php echo $row_Recordset1['name']; ?></a></td>
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
