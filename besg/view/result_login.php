<?php

require '../model/dataBase.php';

$sq_name = "SELECT besgPassword FROM `besg_team` WHERE besgTeamName='".$_POST["t_name"]."'" ;
$check_pw = mysql_fetch_array(mysql_query($sq_name)) or die("查無隊名或密碼錯誤");//查無隊名
if($check_pw[0]==MD5($_POST["t_pw"]))
	{	
		setcookie("user",$_POST["t_name"], time()+3600);//cookie 1hour
		header('Location:../view/show_login.php') ;
	}
else die("查無隊名或密碼錯誤");//密碼錯誤

?>