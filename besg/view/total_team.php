
<link rel="stylesheet" type="text/css" href="../besg/data/css/total_team.css"/>
<?php require '../model/dataBase.php'	;?>
<?php	require '../model/modelCheck.php';?>
<?php require '../model/names.php' ;?>

<table border='5' width='560' >
<tr class ='total_team_header' >

<?php
$table_width = array(70,130,130,100,130);//固定長度
	for($j=1;$j<4;$j++)//header
		show($team_header[$j],$table_width[$j]);
?>
</tr>
</table>
<hr />
<table border='5' width='560' >
<?php
for($i=1;$i<=73;$i++)//data
{	
	$sql_team = "SELECT 	
											besgTeamId,
											besgTeamName,
											besgTeamAbbr,
											besgPayment
											FROM `besg_team` WHERE besgTeamId='".$i."'";
	$sql = mysql_query($sql_team) or die('DB ERR');
	$team_inf = mysql_fetch_array($sql);

	if($team_inf[0]==NULL||$team_inf[3]==0)
		continue;
	else	
		{
			echo "<tr class ='total_team_data' >";
			for($j=1;$j<4;$j++)
				{
					if($j==3)
						echo show("",$table_width[$j],'unpay');
					else
						show($team_inf[$j],$table_width[$j]);			
				}
			echo"</tr>";
		}
}
?>
</table>
