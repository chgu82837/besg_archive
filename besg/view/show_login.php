
<?php require '../model/dataBase.php'	;?>
<?php	require '../model/modelCheck.php';?>
<?php require '../model/names.php' ;?>

<?php

	$t_name = "SELECT besgTeamAbbr,
										besgPayment
										FROM `besg_team` WHERE besgTeamName='".$_COOKIE['user']."'" ;
	$t_Abbr = mysql_fetch_array(mysql_query($t_name));
	
	echo"歡迎";
	echo "<h1 class=teamName>";
	echo $team_header[1].":".$_COOKIE['user']; //顯示tName
	echo "</h1><h2 class=teamNameAbbr>";
	echo $team_header[2].":".$t_Abbr[0];//顯示tNameAbbr
	echo "</h1><h2 class=teamPayment>";
	if($t_Abbr[1]==0)
		echo $team_header[3].":已繳費";//顯示tPayment已繳
	else
		echo $team_header[3].":未繳費";//顯示tPayment未繳
	echo "</h2><br/>";
	
	//跟post_regis一樣
					
	$table_width = array(100,100,100,130,130,130,130,260);//固定長度
?>					
	<table border="5" width="1120" >	
		<tr>
<?php		
	$Teamid =  "SELECT besgTeamId FROM `besg_team` WHERE besgTeamName='".$_COOKIE['user']."'"  ;
	$id =mysql_fetch_array(mysql_query($Teamid));
	//取得ID	

			for($i=0;$i<8;$i++)
			{
				echo"<td width=$table_width[$i]>$show_member[$i]</td>";
			}		
			echo"</tr><tr>";		
			for($i=0;$i<=6;$i++)
			{
				$m_name = "SELECT besgName,
													besgDepart,
													besgGrade,
													besgStuId,
													besgGarena,
													besgSummoner,
													besgPhone,
													besgEmail
													FROM `besg_member` WHERE besgTeamId='".$id[0]."'AND besgTeamLevel=".($i+1);
				$t_value = mysql_fetch_array(mysql_query($m_name));
				if($t_value[0]==NULL)
					break;//無候補隊員 跳出
				for($j=0;$j<8;$j++)
					{
						show($t_value[$j],$table_width[$j]);
					}
				echo"</tr><tr>";
			}
?>
		</tr>