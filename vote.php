<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Кризисный центр для женщин и детей перенесших насилие в семье "Екатерина"</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<style type="text/css">
<!--
body,td,th {
	font-family: Times New Roman, Times, serif;
}
.style5 {font-size: 36px; color: #009966; }
.style6 {color: #009966}
body {
	background-color: #59acff;
}
.style13 {	font-size: 12px;
	font-style: italic;
}
.style15 {
	color: #000000;
	font-weight: bold;
	font-size: 18px;
}
.style16 {
	color: #000000;
	font-size: 18px;
}
-->
</style></head>

<body>

<table width="100%" height="100%"  border="0" cellpadding="1" cellspacing="2">
<?php
  $titlepage = "Главная страница";
  require_once("count.php");
?>  
<tr>
    <th height="53" colspan="3" scope="col"><div align="center"><img src="images/banner.jpg" width="480" height="60"></div></th>
</tr>
  <tr>
    <td height="43" colspan="3"><div align="center" class="style5">
      <p align="center">Результаты голосования</p>
      </div></td>
  </tr><tr>
    <td width="19%" height="447" valign="top">
        <div align="center">
          <div align="center">
          <span class="style5">
          <div align="center" class="style14">
          <table width="100%" height="147"  border="1" align="left" cellpadding="0" > 
        </div>
        <p align="center">Большое спасибо нам важны ваши ответы! </p>
      <p>&nbsp;    </p>
      <caption align="top" class="style6">&nbsp;
    </caption>
      <tr>
        <td align="left" valign="top" bordercolor="#000000" bgcolor="#0099FF" ><div align="center"></div></td>
      </tr>
      <tr>
        <td align="left" valign="middle" bordercolor="#000000" >          <table width="31%"  border="1" align="center">
          <tr>
              <td><div align="left" class="style15">Результаты голосования </div></td>
          </tr>
            <tr>
              <td>                <span class="style16">
              <?php
  include "324gyt-ytr.php";
  // Учитываем голос
  if(!empty($_POST['id_answer']))
  {
    $id_answer = $_POST['id_answer'];
    // Получаем ip-адрес посетителя
    $forward = getenv(HTTP_X_FORWARDED_FOR);
    $ip = urldecode(getenv(HTTP_CLIENTIP));
    if (($forward != NULL)&&($forward != $REMOTE_ADDR))  $ip = $ip."/".$forward;
    // Проверяем наличие ip-адреса посетителя в таблице poll_ip
    $isip = "SELECT * FROM poll_ip 
             WHERE ip='$ip' 
             AND puttime>date_sub(now(), interval '2' minute)";
    $ipresult = mysql_query($isip);
    // Удаляем устаревшие записи в таблице
    $delip = "DELETE FROM poll_ip 
              WHERE puttime<date_sub(now(),interval '2' minute)";
    mysql_query($delip);
    if($ipresult)
    {
      if(mysql_num_rows($ipresult)<1)
      {
        // Заносим ip-адрес посетителя в таблицу poll_ip
        mysql_query("INSERT INTO poll_ip VALUES(0,'$ip',now())");
        // Заносим голос в таблицу answer
        $query = "select hit from answer where id_answer=$id_answer";
        $num = mysql_query($query);
        if($num)
        {
          $number = mysql_fetch_array($num);
          $query = "UPDATE answer SET hit=".($number['hit']+1)." WHERE id_answer=$id_answer";
          mysql_query($query);
        } else puterror("Ошибка при обращении к блоку голосования");
      }
    }
  }
  // Отображаем результаты
  $pol = mysql_query("SELECT * FROM poll WHERE archive=0 AND hide=0");
  if ($pol)
  {
    $poll = mysql_fetch_array($pol);
    echo $poll['name']."<br>";
    // Просматриваем вопросы опроса
    $query = "SELECT * FROM answer 
              WHERE id_poll=".$poll['id_poll']." 
              ORDER BY pos";
    $total = "SELECT SUM(hit) FROM answer WHERE id_poll=".$poll['id_poll'];
    $ans = mysql_query($query);
    $tot = mysql_query($total);
    if($ans && $tot)
    {
      $totl = mysql_fetch_array($tot);
      $totalhits = $totl['SUM(hit)'];
      if($totalhits == 0) $totalhits = 1;
      echo "<table>";
      while($answer = mysql_fetch_array($ans))
      {
        echo "<tr>
               <td>".$answer['name']."</td>
               <td>".$answer['hit']."</td>
               <td>".sprintf("%01.1f%s", $answer['hit']/$totalhits*100,'%')."</td>
              </tr>";
      }
      echo "</table>";
      echo "Общее число проголосовавших составляет: ".$totl['SUM(hit)']."<br>";
      
    } else puterror("Ошибка при обращении к блоку голосования");
  } else puterror("Ошибка при обращении к блоку голосования");
?>
              </span>
              <div align="left" class="style16"></div></td>
          </tr>
          </table>         
          <h1 align="center"><a href="/index.php">На главную</a></h1>          </p>
          <div align="center"><span class="style13"><span class="style4"><em><em><a target=_top
href="http://top.mail.ru/jump?from=1084141"><img
src="http://da.c8.b0.a1.top.list.ru/counter?id=1084141;t=56"
border=0 height=38 width=87
alt="Рейтинг@Mail.ru"/></a></em></em></span></span>
          </div>
</body>
</html>
