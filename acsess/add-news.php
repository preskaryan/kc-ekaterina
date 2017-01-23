<?php require_once('../Connections/Ekaterina.php'); ?>
<?php
session_start();
$MM_authorizedUsers = "";
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

$MM_restrictGoTo = "../index.php";
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
mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = "SELECT * FROM news";
$Recordset1 = mysql_query($query_Recordset1, $Ekaterina) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset2 = "SELECT * FROM news ORDER BY id DESC";
$Recordset2 = mysql_query($query_Recordset2, $Ekaterina) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO news (news, `date`, link) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['text'], "text"),
                       GetSQLValueString($_POST['data'], "date"),
                       GetSQLValueString($_POST['RadioGroup1'], "text"));

  mysql_select_db($database_Ekaterina, $Ekaterina);
  $Result1 = mysql_query($insertSQL, $Ekaterina) or die(mysql_error());

  $insertGoTo = "adminka.php";
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
<title>Новости</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<style type="text/css">
<!--
body,td,th {
	font-family: Courier New, Courier, mono;
}
.style1 {
	font-size: 18px;
	font-weight: bold;
}
-->
</style></head>

<body>
<div align="center">
  <p class="style1">Добавить новость</p>
  <form name="form1" method="POST" action="<?php echo $editFormAction; ?>">
    <table width="29%"  border="1" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="68%"><p align="left">
            <label>
            <input    <?php if (!(strcmp($row_Recordset1['link'],"traffiking.php"))) {echo "CHECKED";} ?> type="radio" name="RadioGroup1" value="traffiking.php">
        Торговля людьми </label>
            <br>
            <label>
            <input   <?php if (!(strcmp($row_Recordset1['link'],"domviolence.php"))) {echo "CHECKED";} ?> type="radio" name="RadioGroup1" value="domviolence.php">
            </label>
        Домашнее насилие<br>
        <label>
        <input   <?php if (!(strcmp($row_Recordset1['link'],"sex-nasilie.php"))) {echo "CHECKED";} ?> type="radio" name="RadioGroup1" value="sex-nasilie.php">
        Секс насилие </label>
        <br>
        <label>
        <input   <?php if (!(strcmp($row_Recordset1['link'],"deti.php"))) {echo "CHECKED";} ?> type="radio" name="RadioGroup1" value="deti.php">
        Дети</label>
        <br>
        <label>
        <input   <?php if (!(strcmp($row_Recordset1['link'],"real.php"))) {echo "CHECKED";} ?> type="radio" name="RadioGroup1" value="real.php">
        Реальные истории </label>
        <br>
        <label>
        <input   <?php if (!(strcmp($row_Recordset1['link'],"faq.php"))) {echo "CHECKED";} ?> type="radio" name="RadioGroup1" value="faq.php">
        Вопросы и ответы </label>
        <br>
        <label>
        <input   <?php if (!(strcmp($row_Recordset1['link'],"trening.php"))) {echo "CHECKED";} ?> type="radio" name="RadioGroup1" value="trening.php">
        Тренинги</label>
        <br>
        <label>
        <input   <?php if (!(strcmp($row_Recordset1['link'],"koaliciya.php"))) {echo "CHECKED";} ?> type="radio" name="RadioGroup1" value="koaliciya.php">
        Коалиция</label>
        <br>
        </p></td>
      </tr>
    </table>
    <p>Дата :
        <input name="data" type="text" value="<?php echo date ("Y-m-d"); ?>" size="10" maxlength="10">
</p>
    <p>
      <textarea name="text" cols="60" rows="4" wrap="VIRTUAL" id="text"></textarea>
      <br>
      <input type="submit" name="Submit" value="Добавить">
    </p>
    <p>&nbsp;    </p>
      <input name="MM_insert" type="hidden" value="form1">
  </form>
  <p class="style1">Щелкни для удаления</p>
  <?php do { ?>
  <p align="left"><a href="dell-news.php?id=<?php echo $row_Recordset2['id']; ?>"><?php echo $row_Recordset2['news']; ?></a> </p>
  <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>

