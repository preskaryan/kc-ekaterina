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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "�������� ������")) {
  $insertSQL = sprintf("INSERT INTO about (text, added, avtor, kratko) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['text'], "text"),
                       GetSQLValueString($_POST['added'], "date"),
                       GetSQLValueString($_POST['avtor'], "text"),
                       GetSQLValueString($_POST['kratko'], "text"));

  mysql_select_db($database_kcekater, $kcekater);
  $Result1 = mysql_query($insertSQL, $kcekater) or die(mysql_error());

  $insertGoTo = "../about/add_text.php";
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
<title>�������� ����- �� �����������</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<style type="text/css">
<!--
.style3 {color: #FF0000; font-size: 10px; }
.style4 {color: #FF0000}
-->
</style>
</head>

<body>
<div align="center"><strong>�� ����������� 
</strong></div>
<form action="<?php echo $editFormAction; ?>" method="POST" name="�������� ������" id="�������� ������" lang="ru"><p align="center"><strong><br>
  <span class="style4">����������� ��������� ��� ���� </span>  </strong></p>
  <p>���� 
    <input name="added" type="text" value="<?php echo date ("Y-m-d"); ?>" size="8" maxlength="8">
  </p>
  <p> ����� 
    <input name="avtor" type="text" id="avtor" size="55" maxlength="30">
</p>
  <p>������ ��������� 
    <input name="kratko" type="text" id="kratko">
</p>
  <p>�����
    <textarea name="text" cols="50" rows="5" wrap="VIRTUAL" id="text"></textarea>
  </p>
  <p> <span class="style3"> </span> </p>
  <p>&nbsp;</p>
  <p>      <input type="submit" name="Submit" value="�������� �����">
  </p>
  <div align="center">
<table width="20%"  border="1" cellspacing="0" cellpadding="0">
   <tr>
     <td><div align="center"><a href="../../acsess/adminka.php">&lt;&lt;&lt;&lt;�����</a></div></td>
   </tr>
 </table>
  </div>
    <input type="hidden" name="MM_insert" value="�������� ������">
</form>

</body>
</html>
