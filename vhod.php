<?php require_once('Connections/ekaterina.php'); ?>
<?php
// *** Validate request to login to this site.
session_start();

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($accesscheck)) {
  $GLOBALS['PrevUrl'] = $accesscheck;
  session_register('PrevUrl');
}

if (isset($_POST['name'])) {
  $loginUsername=$_POST['name'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "/acsess/adminka.php";
  $MM_redirectLoginFailed = "acsess/error.htm";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_Ekaterina, $Ekaterina);
  
  $LoginRS__query=sprintf("SELECT name, password FROM users WHERE name='%s' AND password='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $Ekaterina) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $GLOBALS['MM_Username'] = $loginUsername;
    $GLOBALS['MM_UserGroup'] = $loginStrGroup;	      

    //register the session variables
    session_register("MM_Username");
    session_register("MM_UserGroup");

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
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
-->
</style></head>

<body>

<div align="center">
  <table width="100%" height="43"  border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td bgcolor="#0099FF"><div align="center"></div></td>
    </tr>
  </table>
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="19%" bgcolor="#00FFCC">&nbsp;</td>
      <td width="63%"><div align="center">
        <p>&nbsp;</p>
        <p><strong>Введите данные </strong></p>
      </div></td>
      <td width="18%" bgcolor="#00FFCC">&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <form name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
    <p>
      <input name="name" type="text" id="name" size="16" maxlength="20"> 
      <strong>имя пользователя </strong>
      <input name="password" type="password" id="password" size="16" maxlength="20">
      <strong>пароль
      <input type="submit" name="Submit" value="ВХОД">
    </strong> </p>
  </form>
  <form name="form2" method="post" action="">
  </form>
  <p>&nbsp;</p>
  <p align="left">&nbsp;</p>
  <p>&nbsp;</p>
</div>
</body>
</html>
