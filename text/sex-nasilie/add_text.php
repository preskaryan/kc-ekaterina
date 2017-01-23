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
  $insertSQL = sprintf("INSERT INTO sexnasilie (author, name, added, text, kratko) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['author'], "text"),
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['added'], "date"),
                       GetSQLValueString($_POST['text_statii'], "text"),
                       GetSQLValueString($_POST['kratko'], "text"));

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
<title>Добавить статью- Сексуальное насилие</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<style type="text/css">
<!--
.style3 {color: #FF0000; font-size: 10px; }
.style4 {color: #FF0000}
-->
</style>
</head>

<body><form action="<?php echo $editFormAction; ?>" method="POST" name="Добавить статью" id="Добавить статью" lang="ru">
  <p align="center"><strong>Сексуальное насилие</strong><strong><br>
    <span class="style4">Обязательно заполните все поля
  </span></strong></p>
  <p>Дата 
    <input name="added" type="text" value="<?php echo date ("Y-m-d"); ?>" size="8" maxlength="8">
  </p>
  <p> Автор 
    <input name="author" type="text" id="author" size="55" maxlength="30"> 
    <span class="style3">имя автора не более 30 знаков
  </span></p>
  <p>Название 
    <input name="name" type="text" id="name" value="" size="50" maxlength="200">
    <span class="style3">название не более 255 знаков </span></p>
  <p>Краткое содержание 
    <input name="kratko" type="text" id="kratko" value="" size="37" maxlength="255"> 
    <span class="style3">не более 255 знаков</span> </p>
  <p>Скопируйте статью в текстовое поле </p>
  <p>
    <textarea name="text_statii" cols="80" rows="19" wrap="VIRTUAL" id="text_statii"></textarea>
  </p>
  <p>      <input type="submit" name="Submit" value="Добавить статью">
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
