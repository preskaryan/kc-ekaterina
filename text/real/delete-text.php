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

if ((isset($_POST['name'])) && ($_POST['name'] != "")) {
  $deleteSQL = sprintf("DELETE FROM realnoistorii WHERE name=%s",
                       GetSQLValueString($_POST['name'], "text"));

  mysql_select_db($database_Ekaterina, $Ekaterina);
  $Result1 = mysql_query($deleteSQL, $Ekaterina) or die(mysql_error());

  $deleteGoTo = "delete-text.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_Recordset1 = "1";
if (isset($_GET['name'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_GET['name'] : addslashes($_GET['name']);
}
mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = sprintf("SELECT * FROM realnoistorii WHERE name = '%s'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $Ekaterina) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>�������� ������- <?php echo $row_Recordset1['name']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
</head>

<body>
<form action="" method="post" name="delete" id="delete">
  <table width="98%"  border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td width="33%">
        <p><?php echo $row_Recordset1['added']; ?><br>
          <?php echo $row_Recordset1['name']; ?>
          <input name="name" type="hidden" id="name3" value="<?php echo $row_Recordset1['name']; ?>">
          <br>
          <?php echo $row_Recordset1['kratko']; ?><br>
           <input type="submit" name="Submit" value="�������">
</p>      </td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<p align="center">
<a href="choose-text.php"><em><strong>&lt;&lt;&lt;&lt;�����</strong></em></a></a></p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
