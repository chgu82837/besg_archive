<link rel="stylesheet" type="text/css" href="../besg/data/css/all_data.css"/>
<?php
	$pw=MD5($_GET['pw']);
	if($pw!='f071862c6e616e02046e77ec16c1bea5')
		die('NO right to load this page');
	//加密
?>
<?php require '../model/dataBase.php'	;?>
<?php	require '../model/modelCheck.php';?>
<?php require '../model/names.php' ;?>

<?php
//這個資料只給賽程組用來印製聯絡人資料
//別太認真去調css

$m_header = array("姓名","系所","年級","學號","競時通帳號","召喚師名稱","手機","e-mail");
$table_width = array(100,100,100,130,130,130,130,260);
?>
<?php
function postmember($type,$table_width,$show_member,$id)
{
	//1是書緯的 0是我的
			for($i=0;$i<8;$i++)
			{
				show($show_member[$i],$table_width[$i]);
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
													FROM `besg_member` WHERE besgTeamId='".$id[0]."'AND besgTeamLevel=".($i+$type);
				$t_value = mysql_fetch_array(mysql_query($m_name));
				if($t_value[0]==NULL&&$i>4)
					break;//無候補隊員 跳出
				for($j=0;$j<8;$j++)
					{
						show($t_value[$j],$table_width[$j]);
					}
				echo"</tr><tr>";
			}
}




//不想放model裡了



//===============================================================================
?>


<?php										
for($i=1;$i<=73;$i++):
?>


<?php
$sql_team = "SELECT 
										besgTeamId,
										besgTeamName,
										besgTeamAbbr
										FROM `besg_team` WHERE besgTeamId='".$i."'";
$team_inf = mysql_fetch_array(mysql_query($sql_team));
if($team_inf[0]==NULL)
	continue;
else
	{
	echo"<table border='5' width='840' >";
	$Teamid =  "SELECT besgTeamId FROM `besg_team` WHERE besgTeamId='".$i."'";
	$id =mysql_fetch_array(mysql_query($Teamid));//取得ID
	echo"<tr id=t_data>";
		show("編號:$team_inf[0]",200,'t_name');
		show("隊名:$team_inf[1]",400,'t_name');
		show("隊名縮寫:$team_inf[2]",240,'t_abbr');
	echo"</tr>";

echo "</table>";
echo "<table border='3' width='1120' >";

	$type = "SELECT besgName FROM `besg_member` WHERE besgTeamId='".$id[0]."'AND besgTeamLevel="."0";
	$ans =mysql_fetch_array(mysql_query($type));//
	if($ans[0]==NULL)
		postmember(1,$table_width,$show_member,$id);
	else
		postmember(0,$table_width,$show_member,$id);
echo "</table><br/>";
	}

?>

<?php 
endfor;
?>

