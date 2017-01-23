<?php require_once('../../Connections/ekaterina.php'); ?>
<?php
session_start();
$MM_authorizedUsers = "m";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../../vhod.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "Добавить статью")) {
  $insertSQL = sprintf("INSERT INTO partners (orgname, dirname, adress, telephone, opisanie, added, text) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['orgname'], "text"),
                       GetSQLValueString($_POST['dirname'], "text"),
                       GetSQLValueString($_POST['adress'], "text"),
                       GetSQLValueString($_POST['telephone'], "text"),
                       GetSQLValueString($_POST['opisanie'], "text"),
                       GetSQLValueString($_POST['added'], "date"),
                       GetSQLValueString($_POST['text'], "text"));

  mysql_select_db($database_Ekaterina, $Ekaterina);
  $Result1 = mysql_query($insertSQL, $Ekaterina) or die(mysql_error());

  $insertGoTo = "add_text.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Информация о партнерах</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<style type="text/css">
<!--
.style3 {color: #FF0000; font-size: 10px; }
.style4 {color: #FF0000}
-->
</style>
</head>

<body><form action="<?php echo $editFormAction; ?>" method="POST" name="Добавить статью" id="Добавить статью" lang="ru">
  <p align="center"><strong>Организации- партнеры <br>
    <span class="style4">Обязательно заполните все поля
  </span></strong></p>
  <p>Дата 
    <input name="added" type="text" value="<?php echo date ("Y-m-d"); ?>" size="8" maxlength="8">
  </p>
  <p> Название организации 
    <input name="orgname" type="text" id="orgname" size="55" maxlength="255"> 
    <span class="style3">название  не более 255 знаков
  </span></p>
  <p>Директор 
    <input name="dirname" type="text" id="dirname" value="" size="70" maxlength="200">
    <span class="style3">не более 255 знаков </span></p>
  <p>Адрес
    <input name="adress" type="text" id="adress" value="" size="73" maxlength="255"> 
    <span class="style3">не более 255 знаков</span> </p>
  <p>Контактные телефоны 
    <input name="telephone" type="text" id="telephone" size="37" maxlength="255">
</p>
  <p>Вид деятельности 
    <input name="opisanie" type="text" id="opisanie" size="43" maxlength="255">
    <span class="style3">255 знаков</span> </p>
  <p>Что сделали для КЦ &quot;Екатерина&quot; </p>
  <p>
    <textarea name="text" cols="80" rows="19" wrap="VIRTUAL" id="text"></textarea>
</p>
  <p>примечания: если вы хотите добавить электронную почту то добавьте текст: <br>
  &lt;a href=&quot;mailto:<span class="style4">mail@mail.ru</span>&quot;&gt; <span class="style4">mail@mail.ru</span> &lt;/a&gt; </p>
  <p>если требуется добавить ссылку на сайт:<br> 
    &lt;a href=&quot;<span class="style4">сайт.ru</span>&quot;&gt;<span class="style4">сайт.ru</span>&lt;/a&gt;<br>
  </p>
  <p>      <input type="submit" name="Submit" value="Добавить">
  </p>
  <div align="center">
    <input type="hidden" name="MM_insert" value="Добавить статью">
    <table width="20%"  border="1" cellspacing="0" cellpadding="0">
   <tr>
     <td><div align="center"><a href="../../acsess/adminka.php">&lt;&lt;&lt;назад</a></div></td>
   </tr>
 </table>
  </div>
</form>

</body>
</html>
