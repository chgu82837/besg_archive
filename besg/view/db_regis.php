<?php
require '../model/modelRegis.php' ;
require '../model/dataBase.php' ;

//connect
$t_value=postall('t');
$spw=MD5($t_value[2]);

if(!checkname($t_value[0]))
	die("已經有同樣隊名的人報名了，或是與他人簡稱相同。");
if(!checkname($t_value[1]))
	die("簡稱與他人簡稱或隊名相同。");
if(checkno()==0)
	die("報名組數已額滿(72組)。");
$team = sprintf("INSERT INTO `besg_team` (`besgTeamName`,`besgTeamAbbr`,`besgPassword`) 
			VALUES ('%s','%s','%s')",
			$t_value[0],
			$t_value[1],
			$spw
			);//隊伍

mysql_query($team) or die("err 1") ;

$Teamid =  "SELECT besgTeamId FROM `besg_team` WHERE besgTeamName='".$t_value[0]."'"  ;

$id =mysql_fetch_array(mysql_query($Teamid));//取得ID

$l_value=postall('l');

$leader = sprintf("INSERT INTO `besg_member` (`besgTeamId`,`besgTeamLevel`,`besgName`,`besgDepart`,`besgGrade`,`besgStuId`,`besgGarena`,`besgSummoner`,`besgPhone`,`besgEmail`) 
			VALUES (%d,%d,'%s','%s',%d,'%s','%s','%s','%s','%s')",
			$id[0],
			1,
			$l_value[0],
			$l_value[1],
			$l_value[2],
			$l_value[3],
			$l_value[4],
			$l_value[5],
			$l_value[6],
			$l_value[7]
			);//隊長
mysql_query($leader) or die("err 2") ;

for($i=1;$i<=4;$i++)
{
	$m_value=postall('m',$i);
	$member = sprintf("INSERT INTO `besg_member` (`besgTeamId`,`besgTeamLevel`,`besgName`,`besgDepart`,`besgGrade`,`besgStuId`,`besgGarena`,`besgSummoner`,`besgPhone`,`besgEmail`) 
			VALUES (%d,%d,'%s','%s',%d,'%s','%s','%s','%s','%s')",
			$id[0],
			($i+1),
			$m_value[0],
			$m_value[1],
			$m_value[2],
			$m_value[3],
			$m_value[4],
			$m_value[5],
			$m_value[6],
			$m_value[7]
			);//隊員
	mysql_query($member) or die("err 3") ;			
}

for($i=1;$i<=2;$i++)
{
	$sm_value=postall('sm',$i);
	$submember = sprintf("INSERT INTO `besg_member` (`besgTeamId`,`besgTeamLevel`,`besgName`,`besgDepart`,`besgGrade`,`besgStuId`,`besgGarena`,`besgSummoner`,`besgPhone`,`besgEmail`) 
			VALUES (%d,%d,'%s','%s',%d,'%s','%s','%s','%s','%s')",
			$id[0],
			($i+5),
			$sm_value[0],
			$sm_value[1],
			$sm_value[2],
			$sm_value[3],
			$sm_value[4],
			$sm_value[5],
			$sm_value[6],
			$sm_value[7]
			);//候補隊員
	mysql_query($submember) or die("err 4") ;			
}
header('Location:../view/success_regis.html');
//至主頁

?>