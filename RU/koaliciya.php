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

$colname_Recordset2 = "0";
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
	<title>Кризисный центр «Екатерина» для женщин и детей, переживших насилие в семье</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<script language="JavaScript" src="menu/menu.js"></script>
	<link rel="stylesheet" href="menu/menu.css">
</head>

<body onload="initPage()">
<table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col">
      <tr bgcolor="#B7D6F8"><?php include('include/header.php');?>
      </tr>

      <tr bgcolor="#B7D6F8">
        </tr>
      <tr bgcolor="#FFFFFF">
        <td width="20%" valign="top" bgcolor="#B7D6F8"><div align="left"><?php include('menu/menu.php');?></div></td>
        <td width="60%" valign="top" bgcolor="#FFFFFF">
          <?php if ($totalRows_Recordset2 == 0) { // Show if recordset empty ?>
          <p align="center"><br><span class="bodyHeader">Коалиция кризисных центров Урала и Западной Сибири.</span></p>

          <p align="justify" class="text">В декабре 2005 года кризисные центры Урала и Сибири, зная серьезные  социальные последствия насилия в отношении женщин и детей, объединились в Коалицию кризисных центров Уральского Федерального округа и назвали ее "Вместе мы - сила!".  Директор  кризисного центра  "Екатерина" Людмила Ермакова была избрана первым  председателем Коалиции.</p>
          <p align="justify" class="text">Первоначально Партнерское соглашение между членами Коалиции подписали представители 20 организаций  из Свердловской, Челябинской, Курганской и Тюменской областей, Ханты-Мансийского и Ямало-Ненецкого округов.</p>
          <p align="justify" class="text">Целями Коалиции являются:</p>
          <ol>
                <li align="justify">развитие региональной сети служб для женщин и детей, подвергающихся насилию;</li>
                <li align="justify">улучшение осведомленности общественности о проблемах, связанных со всеми формами насилия в отношении женщин и детей;</li>
                <li align="justify">разработка и продвижение действенных систем реагировании государственных структур и общественных организаций на все случаи насилия в отношении женщин и детей;</li>
                <li align="justify">помощь развитию профессиональной компетенции сотрудников различных государственных служб и кризисных центров, занимающихся проблемой насилия в семье.</li>
          </ol>
          <p align="justify" class="text">Многие из организаций, вступивших в Коалицию, появились или стали работать по теме домашнего насилия  при поддержке кризисного центра "Екатерина". Работать им довольно сложно: не хватает обученных по теме специалистов,  люди быстро "сгорают" на этой работе, опять же по причине невысокого профессионализма. В то время как у давно существующих, опытных  кризисных центов региона накоплен различный  очень нужный опыт работы по теме. Задача созданной Коалиции аккумулировать опыт и найти возможность передать его  молодым организациям.  Молодым нашим коллегам не надо будет нарабатывать все с нуля, тем более, что не у всех  есть возможность пройти стажировку по проблеме насилия над женщинами  в давно работающих кризисных центрах за рубежом, как  повезло специалистам кризисного центра "Екатерина".</p>
          <p align="justify" class="text">Второй аргумент в пользу развития Коалиции наших центров в Урало - Сибирском регионе: многие зарубежные и российские фонды в последнее время изменили приоритеты в своей деятельности в России, гендерная тематика теперь для них стала второстепенной, менее значимой. Встать на ноги новым организациям при поддержке благотворительных фондов сегодня гораздо сложнее. Этим организациям приходится сейчас надеяться прежде всего на поддержку коллег ,работающих по проблеме в своем регионе. Перенимая опыт наших единомышленников из женских общественных организаций за рубежом, необходимо объединиться и работать, помогая друг другу. </p>
          <p align="justify" class="text">Голоса членов Коалиции, объединенных в межрегиональную организацию, будут лучше услышаны руководителями муниципалитетов и областных, и региональных органов власти, что будет способствовать продвижению решения проблемы домашнего насилия на государственный уровень.</p>
          <p align="justify" class="text">В  2009 году мы выпустили первый в России сборник исследований под названием "Домашнее насилие: анализ и мониторинг проблемы на примере Свердловской области и Уральского Федерального округа". Издание наших исследований - небольшой вклад сотрудников центра "Екатерина" и наших добровольных помощников из других центров Коалиции в дело национального движения борьбы против насилия в семье, защиты прав и интересов пострадавших.
</p>
          <p align="justify" class="text">3 марта 2009 года в Екатеринбурге прошла конференция "Домашнее насилие: мониторинг и анализ проблемы на примере Свердловской области и Уральского федерального округа"</p>
          <p align="justify" class="text">В конференции приняли участие представители 23 организаций-членов Коалиции кризисных центров "Вместе мы - сила" из 15 городов страны и региона (Екатеринбурга, Москвы, Челябинска, Кургана, Нижневартовска, Сургута, Тарко-Сале, Салехарда, Тюмени, Нижнего Тагила, Артемовского, Первоуральска, Каменска-Уральского, Тавды, Богдановича). Всего на конференции вместе с сотрудниками кризисного центра "Екатерина" и представителями прессы присутствовало около 100 человек.</p>
          <p align="justify" class="text">Кроме обмена опытом работы и планирования дальнейшего сотрудничества на конференции состоялись выборы нового состава Совета Коалиции и Председателя. По Партнерскому Соглашению, которое подписали все члены Коалиции, выборы проходят на конференции Коалиции один раз в четыре года. Предыдущие выборы проходили в 2005 году. В этот раз Председателем Коалиции вновь избрана президент кризисного центра "Екатерина" Людмила Ермакова.</p>
          <p align="justify" class="text">По итогам конференции выпущена брошюра с выступлениями всех участников. Брошюра будет раздаваться всем членам Коалиции, а также разослана во все правоохранительные ведомства и учреждения судебной системы, которые приняли участие в конференции.</p>
          <p align="justify" class="text">На сегодняшний день Партнерское соглашение о вступлении в Коалицию подписали 24 организации.</p>
          <p align="justify" class="text"></p>

          <p align="center" font-color="#3399FF">
                <a target=_top
                    href="http://kc-ekaterina.ru/foto/image.jpg"><img
                    src="http://kc-ekaterina.ru/foto/image.jpg"
                    border=0 height="491" width="655"
                    alt="Фотография коалиции">
                </a><br>
                <h4 align="center" color="#3399FF">На снимке: участники конференции и члены Коалиции кризисных центров Урало-Сибирского региона в Екатеринбурге 27 марта 2013 года</h4>
          </p>

          <?php } // Show if recordset empty ?>
        <br>
          <p align="center"><span class="bodyHeader"> <?php echo $row_Recordset2['name']; ?></span></p>
          <p><?php echo $row_Recordset2['text']; ?></p>
          <p align="right"><span class="newsDate"><?php echo $row_Recordset2['date']; ?></span></span></span> </p>          <p align="right"><br> </p> </td>

        <td width="20%" height="662" valign="top" bgcolor="#B7D6F8">
            <div class="newsHeader">Информация</div>

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
	</td>


      </tr>
      <tr bgcolor="#B7D6F8">
        <td colspan="3"><?php include('include/footer.php');?>
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
