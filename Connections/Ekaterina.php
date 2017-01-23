<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Ekaterina = "kc-ekaterina.ru";
$database_Ekaterina = "wwwkcekaterinaru";
$username_Ekaterina = "kcekater";
$password_Ekaterina = "wdi9Vien";
$Ekaterina = mysql_pconnect($hostname_Ekaterina, $username_Ekaterina, $password_Ekaterina) or trigger_error(mysql_error(),E_USER_ERROR); 
?>