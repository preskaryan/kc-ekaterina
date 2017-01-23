<?php
//initialize the session
session_start();

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  session_unregister('MM_Username');
  session_unregister('MM_UserGroup');
	
  $logoutGoTo = "/index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
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

$MM_restrictGoTo = "acsess/error_page.htm";
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Управление содержимым сайта</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<style type="text/css">
<!--
body {
	background-color: #FFFFCC;
}
.style1 {font-weight: bold}
.style2 {
	color: #990000;
	font-weight: bold;
}
.style4 {font-size: 24px}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
</head>

<body>
<div align="center">
  <table width="100%" height="43"  border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td bgcolor="#0099FF"><div align="center"><strong>&quot;ЕКАТЕРИНА&quot;</strong></div></td>
    </tr>
  </table>
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="19%" bgcolor="#00FFCC">&nbsp;</td>
      <td width="63%"><div align="center"><strong>Добро пожаловать. <br>
      На этой странице вы можете управлять содержимым сайта.</strong></div></td>
      <td width="18%" bgcolor="#00FFCC">&nbsp;</td>
    </tr>
  </table>
  
  <p><strong><span class="style4">&nbsp;<a href="<?php echo $logoutAction ?>">ВЫХОД</a></span><br>
  </strong></p>
  <p align="left"><span class="style1"><a href="/6776rtye-cfddf&&c-cxxsddfdddfthvvv/index.php"> Управление опросом
    <!--Добавление опроса, изменение текущего, просмотр результатов. -->
  </a></span></p>
  <p align="left"><strong><a href="/stat-admin/index.php"> </a></strong></p>
  <p align="left">&nbsp;</p>
  <p align="left" class="style2">Управление содержимым страниц по категориям- здесь вы можете добавить/удалить информацию <br>
  </p>
  <table width="412"  border="2" align="left" cellpadding="1" cellspacing="1">
    <tr>
      <td width="65%" height="26" valign="top" scope="col"><div align="left">Статьи по траффику</div></td>
      <th width="35%" scope="col">
            <div align="left">
                  <select name="menu1" onChange="MM_jumpMenu('parent',this,0)">
                    <option value="value" selected>Выберите действие</option>
                    <option value="text/traffiking/add_text.php">Добавить статью</option>
                    <option value="text/traffiking/choose-text.php">Удалить статью</option>
                  </select>
        </div></th></tr>
    <tr>
      <td><div align="left">Домашнее насилие          <br>
      </div></td>
      <td>
            <div align="left">
                  <select name="select" onChange="MM_jumpMenu('parent',this,0)">
                    <option value="value" selected>Выберите действие</option>
                    <option value="text/domviolence/add_text.php">Добавить статью</option>
                    <option value="text/domviolence/choose-text.php">Удалить статью</option>
                  </select>
        </div></td></tr>
    <tr>
      <td><div align="left">Секс насилие</div></td>
      <td>
            <div align="left">
                  <select name="select2" onChange="MM_jumpMenu('parent',this,0)">
                    <option value="value" selected>Выберите действие</option>
                    <option value="text/sex-nasilie/add_text.php">Добавить статью</option>
                    <option value="text/sex-nasilie/choose-text.php">Удалить статью</option>
                  </select>
        </div></td></tr>
    <tr>
      <td><div align="left">Насилие над детьми</div></td>
      <td>
        <div align="left">
          <select name="select3" onChange="MM_jumpMenu('parent',this,0)">
            <option value="value" selected>Выберите действие</option>
            <option value="text/deti/add_text.php">Добавить статью</option>
            <option value="text/deti/choose-text.php">Удалить статью</option>
          </select>  
        </div></td></tr>
    <tr>
      <td><div align="left"> Реальные истории <br>
      </div></td>
      <td><div align="left">
        <select name="select4" onChange="MM_jumpMenu('parent',this,0)">
            <option value="value" selected>Выберите действие</option>
            <option value="text/real/add_text.php">Добавить статью</option>
            <option value="text/real/choose-text.php">Удалить статью</option>
          </select>
      </div></td>
    </tr>
    <tr>
      <td><div align="left">Тренинги <br>
      </div></td>
      <td><div align="left">
        <select name="select5" onChange="MM_jumpMenu('parent',this,0)">
            <option value="value" selected>Выберите действие</option>
            <option value="text/trening/add_text.php">Добавить статью</option>
            <option value="text/trening/choose-text.php">Удалить статью</option>
          </select>
      </div></td>
    </tr>
    <tr>
      <td height="22"><div align="left">Проекты <br>
      </div></td>
      <td><div align="left">
        <select name="select6" onChange="MM_jumpMenu('parent',this,0)">
            <option value="value" selected>Выберите действие</option>
            <option value="text/project/add_text.php">Добавить проект</option>
            <option value="text/project/choose-text.php">Удалить проект</option>
          </select>
      </div></td>
    </tr>
    <tr>
      <td><div align="left">Партнеры <br>
      </div></td>
      <td><div align="left">
        <select name="select7" onChange="MM_jumpMenu('parent',this,0)">
          <option value="value" selected>Выберите действие</option>
          <option value="text/partners/add_text.php">Добавить</option>
          <option value="text/partners/choose-text.php">Удалить</option>
          </select>
      </div></td>
    </tr>
    <tr>
      <td><div align="left">О нас <br>
      </div></td>
      <td><div align="left">
        <select name="select9" onChange="MM_jumpMenu('parent',this,0)">
          <option value="value" selected>Выберите действие</option>
          <option value="text/about/add_text.php">Добавить тест</option>
          <option value="text/about/choose-text.php">Удалить текст</option>
          </select>
      </div></td>
    </tr>
    <tr>
      <td><div align="left">Вопросы- ответы <br>
      </div></td>
      <td><div align="left">
        <select name="select8" onChange="MM_jumpMenu('parent',this,0)">
          <option value="value" selected>Выберите действие</option>
          <option value="text/faq/add_text.php">Добавить</option>
          <option value="text/faq/choose-text.php">Удалить</option>
          </select>
      </div></td>
    </tr>
  </table>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  <p align="left"><strong><a href="/text/traffiking/add_text.php"> </a></strong></p>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
</div>
</body>
</html>
