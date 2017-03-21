<?php require_once('../Connections/Ekaterina.php'); ?>
<?php
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = "SELECT * FROM koaliciya WHERE lang = '1' ORDER BY id DESC";
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
if (isset($_GET['id'])) {
  $colname_Recordset2 = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset2 = sprintf("SELECT * FROM koaliciya WHERE lang = '1' and id = '%s'", $colname_Recordset2);
$Recordset2 = mysql_query($query_Recordset2, $Ekaterina) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>«Кризисный центр «Екатерина» для женщин и детей, переживших насилие в семье»</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<script language="JavaScript" src="menu/menu.js"></script>
<link rel="stylesheet" href="menu/menu.css">
</head>

<body onload="initPage()">
<table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col"><table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
      <tr bgcolor="#B7D6F8">
        <th>
            <table class="xbig" border='0'>
                <tr>
                    <td>Наша помощь анонимна и бесплатна!</td>
                </tr>
                <tr>
                      <td>+7 (952) 146-22-23</td>
              </tr>
            </table>
        </th>
        <th scope="col">
              <img src="../image/tablebackground8.jpg" width="100%">
        </th>
        <th>
            <a href="http://www.112.ru/">
                <table height="120" border='0'>
                    <tr>
                        <td width="40%"><img src="../image/frst_logo.png" border="0" align="right"></td>
                        <td>Правоохранительный портал Российской Федерации</td>
                    </tr>
                </table>
            </a>
        </th>
        </tr>
      <tr bgcolor="#B7D6F8">
        </tr>
      <tr bgcolor="#FFFFFF">
        <td width="15%" valign="top" bgcolor="#B7D6F8"><div align="дуае"><?php include('menu/menu.php');?></div></td>
        <td width="70%" valign="top" bgcolor="#FFFFFF">
          <?php if ($totalRows_Recordset2 == 0) { // Show if recordset empty ?>
          <p align="center"><br><span class="bodyHeader">Коалиция кризисных центров Урала и Западной Сибири <br>
    живет и работает </span></p>
          <p align="justify" class="text">В середине декабря прошлого года в Екатеринбурге состоялась межрегиональная конференция, на которой по инициативе кризисного центра «Екатерина» была создана Коалиция Кризисных центров Урало-Сибирского региона «Вместе мы – сила». Представители 20 организаций, вошедших в Коалицию, подписали Соглашение о сотрудничестве.</p>
          <p align="center" font-color="#3399FF">
<a target=_top
href="http://kc-ekaterina.ru/foto/4.jpg"><img
src="http://kc-ekaterina.ru/foto/4.jpg"
border=0 height="300" width="450"
alt="Фотография коалиции"></a><br>
<h4 align="center" color="#3399FF">Совет коалиции: Тюмень, октябрь, 2006</h4></p>

          <p align="justify" class="text">По прошествии 3 месяцев после конференции кризисные отделения с приютами для женщин были
          													открыты в  трех областях региона: в г. Нижневартовске,  в г. Сургуте и в г. Кургане. Женщины, которые ускорили открытие этих очень
          													важных социальных учреждений для женщин, были  делегатами   конференции в г. Екатеринбурге.   Именно здесь они получили
          													дополнительную долю оптимизма  и уверенности   в необходимости  осуществления нового дела.    Поэтому итогом  проведенной
          													конференции можно считать не только создание Коалиции Кризисных центров для женщин Урало-Сибирского региона, но и
          													создание новых кризисных центров для женщин, причем с приютами для временного проживания.   И еще,  что очень важно,  они
          													открылись на площадях  государственных Центров помощи семье и детям, а, значит, будут финансироваться из  бюджетов городов
          													и областей, где они расположены. </p>
          <p align="justify" class="text">Первый Совет Коалиции  «Вместе мы - сила»  собирался 16 августа этого года в Екатеринбурге. </p>
          <p align="justify" class="text">Как и планировалось ранее,  кроме обсуждения  перспектив сотрудничества  членов Коалиции,
          													был организован тренинг для коллег «Екатерины» из  других кризисных центров  Урало-Сибирского региона. На тренинге
          													присутствовали  21 человек, все женщины,  представители кризисных отделений и центров  из Екатеринбурга, Богдановича,
          													Первоуральска, Челябинска и Снежинска. Тема тренинга: «Взаимодействие кризисных центров с органами и учреждениями
          													государственной системы профилактики и судами. Опыт. Проблемы.</p>
          <p align="justify" class="text">Цель тренинга: Совершенствование механизмов межведомственного взаимодействия  в том числе
          													с мировыми судами  в работе по  проблеме домашнего насилия для повышения эффективности оказания правовой и социальной
          													помощи пострадавшим.</p>
          <p align="justify" class="text">Второй Совет Коалиции прошел 13 октября  в Тюмени  на базе областного Центра помощи семье
          													и детям, где раньше всех в Урало-Сибирском  регионе был открыт приют для женщин и детей, переживших насилие в семье.  На
          													Совете присутствовали представители кризисных центров и отделений из Екатеринбурга, Сургута, Снежинска,  Тюмени, Челябинска.
          													Присутствующие, ознакомившись с опытом работы Тюменского  кризисного отделения с временным убежищем для женщин,
          													рассказали о  работе по проблеме насилия в семье в своих регионах, а также  сделали заявки о том,   какой помощи и поддержки
          													они ждут  от  других, более опытных членов Коалиции . </p>
          <p align="justify" class="text">Как было запланировано полгода назад, по просьбе членов Коалиции заместитель директора
          													кризисного центра «Екатерина»,   психолог Ольга Селькова провела  для коллег тренинг   «Основы консультирования  пострадавших
          													от домашнего насилия. Профилактика «профсгорания»».</p>
          <p align="justify" class="text">Следующая встреча Совета Коалиции запланирована  на начало  2007 года. Пройдет она в
          													Сургуте.  </p>
          <?php } // Show if recordset empty ?>
        <br>
          <p align="center"><span class="bodyHeader"> <?php echo $row_Recordset2['name']; ?></span></p>
          <p><?php echo $row_Recordset2['text']; ?></p>
          <p align="right"><span class="newsDate"><?php echo $row_Recordset2['date']; ?></span></span></span> </p>          <p align="right"><br> </p> </td>

        <td width="15%" height="662" valign="top" bgcolor="#B7D6F8">
            <div class="newsHeader">Дополнительная Информация</div>

            <?php do { ?>

			<table class="news">

		<tr><td rowspan="2" width="5%"><img src="../image/strelka2.jpg" width="7" height="7"></td>

		<td><a href="koaliciya.php?id=<?php echo $row_Recordset1['id']; ?>"><?php echo $row_Recordset1['name']; ?></a></td>
		</tr>
		<tr>
		<td class="newsDate"><?php echo $row_Recordset1['date']; ?></td>
		</tr>



			</table>
		<?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>

</div>
	</td>


      </tr>
      <tr bgcolor="#B7D6F8">
        <td colspan="3"><?php include('copyriht.php');?>



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
