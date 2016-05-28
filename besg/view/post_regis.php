<script type="text/javascript">
/* <![CDATA[ */
jQuery(document).ready(function($) {
	makeHeader('teamName');
	$('#finalSubmit').button().click(function(){
		var toPost={};
		term = $('#finalFrom input');
		
		for(i=0; i<term.size(); i++ )
		{
			toPost[term.eq(i).attr('name')]=term.eq(i).val();
		}

		PostPopUp("../besg/view/db_regis.php",toPost,false);
	});
});
//]]>
</script >
<?php require '../model/modelRegis.php' ;?>
<?php require '../model/names.php';?>

<link rel="stylesheet" type="text/css" href="/besg/data/css/post_regis.css"/>
<div id='content' style="width:1024px">

	<form action="/besg/view/db_regis.php" method="post" id="finalFrom">


		<?php 
			$t_value=postall('t');//讀取由POST 來的 team
			$l_value=postall('l');//讀取由POST 來的 leader
			
			$table_width = array(70,200,40,100,100,90,100,300);//固定長度
		?>

		<?php 
					echo "<h1 id='teamName'>";
					echo "隊伍:".$t_value[0]; //顯示tName
					echo "     ".$t_value[1];//顯示tNameAbbr
					echo "</h1>";

		/*	$pw_l=strlen($t_value[2]);//取得長度
			for($i=0;$i<$pw_l;$i++)//顯示密碼
				{
					if($i<($pw_l*0.2))//只顯示前1/5的
						echo$t_value[2][$i];
					else
						echo"*";
				}
			echo"</td>";
		*/
		//不顯示密碼了	
		?>



		

	<table border="5" width="1024" style="table-layout:fixed; text-align:center;" >	
		<tr>
	<?php		
		for($i=0;$i<8;$i++)
			{
				echo"<td width=$table_width[$i]>$show_member[$i]</td>";
			}
		?>
		</tr><tr>
		<?php
		for($i=0;$i<8;$i++)
			{
				echo"<td>$l_value[$i]</td>";//$l_name,$l_depart,$l_grade,$l_stuid,$l_garena,$l_summoner,$l_phone,$l_email
			}
		echo"</tr>";
		for($n=1;$n<=4;$n++) //隊員1~4
			{
				echo"<tr>";
				$m_value=postall('m',$n);//讀取由POST 來的 member
				for($i=0;$i<8;$i++)
				{
					echo"<td>$m_value[$i]</td>" ;//$m_name,$m_depart,$m_grade,$m_stuid,$m_garena,$m_summoner,$m_phone,$m_email
				}
				echo"</tr>";
			}
	?>			
		</tr><tr>
	<?php
		for($n=1;$n<=2;$n++) //候補隊員1~2
			{
				echo"<tr>";
				$sm_value=postall('sm',$n);//讀取由POST 來的 submember
				for($i=0;$i<8;$i++)
				{
					echo"<td>$sm_value[$i]</td>" ;//$sm_name,$m_depart,$m_grade,$sm_stuid,$sm_garena,$sm_summoner,$sm_phone,$sm_mail
				}
				echo"</tr>";
			}
	?>			
		</tr>
	</table>

				
				
			<div  style="display:none;">
				

				<?php
					team($t_value[0],$t_value[1],$t_value[2],'hidden') ;//隊伍
					leader($l_value[0],$l_value[1],$l_value[2],$l_value[3],$l_value[4],$l_value[5],$l_value[6],$l_value[7],'hidden') ;//隊長
					
					for($i=1;$i<=4;$i++)//隊員1~4
					{	
						$m_value=postall('m',$i);
						member($i,$m_value[0],$m_value[1],$m_value[2],$m_value[3],$m_value[4],$m_value[5],$m_value[6],$m_value[7],'hidden') ;
					}	
					for($i=1;$i<=2;$i++) //候補隊員1~2
					{
						$sm_value=postall('sm',$i);
						submember($i,$sm_value[0],$sm_value[1],$sm_value[2],$sm_value[3],$sm_value[4],$sm_value[5],$sm_value[6],$sm_value[7],'hidden') ;
					}
						//用hidden傳值  
				?>
			</div>
	</form>
	<a style="text-align:center; width:100%; margin-top:1em;" id="finalSubmit">已確認完畢，送出！</a>
</div><!--content-->