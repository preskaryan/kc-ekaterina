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
$currentPage = $_SERVER["PHP_SELF"];

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

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Выбор статьи для удаления</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
</head>

<body>
<p align="center">Сексуальное насилие </p>
<p align="center">Выберите статью для удаления. Щелкните по ссылке- названию статьи. </p>
<p align="center">Всего статей: <?php echo $totalRows_Recordset1 ?> </p>
<form name="form1" method="post" action="">
  <?php do { ?>
  <?php echo $row_Recordset1['added']; ?> <br>
  <em><strong>Название</strong></em> <a href="delete-text.php?name=<?php echo $row_Recordset1['name']; ?>"> <?php echo $row_Recordset1['name']; ?></a><br>
  <em><strong>Автор</strong></em>:<?php echo $row_Recordset1['author']; ?><em><strong><br>
  Краткое содержание</strong></em>: <?php echo $row_Recordset1['kratko']; ?><br>
  <br>  
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</form>
<p>&nbsp;</p>

<div align="center">
<p> 
  <?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
  <a href="<?php printf("../../sex-nasilie/%25s?pageNum_Recordset1=%25d%25s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">&lt;&lt;&lt;Предыдущая страница....</a>
  <?php } // Show if not first page ?> 
  <?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
  <a href="<?php printf("../../sex-nasilie/%25s?pageNum_Recordset1=%25d%25s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>"> .....Следующая страница&gt;&gt;&gt;</a>
  <?php } // Show if not last page ?>
</p>
</div>

<p align="center">&nbsp;</p>
<p align="center">&lt;<a href="../../acsess/adminka.php">&lt;&lt;В администраторскую</a></p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
