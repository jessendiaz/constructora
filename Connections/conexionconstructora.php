<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conexionconstructora = "localhost";
$database_conexionconstructora = "constructorabd";
$username_conexionconstructora = "root";
$password_conexionconstructora = "";
$conexionconstructora = mysql_pconnect($hostname_conexionconstructora, $username_conexionconstructora, $password_conexionconstructora) or trigger_error(mysql_error(),E_USER_ERROR); 
?>