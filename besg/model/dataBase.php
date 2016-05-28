<?php
$hostname = 'localhost' ;
$database = 'sgNewCore' ;
$username = 'besg' ;
$password = 'besg5566' ;

if (!mysql_connect($hostname, $username, $password))

  {
  die('資料庫連接失敗，請聯絡管理者' . mysql_error());
  }

mysql_connect($hostname, $username, $password) ;
mysql_query ("SET CHARACTER SET 'utf8'");
mysql_query ("SET NAMES 'utf8'");
mysql_select_db ( $database );

?>