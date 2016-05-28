<?php
	//include '../model/modelRegis.php';
	//在start_regis.php已經include過
	
	if((($t<$start_time)||($t>$end_time))||($NofTeams>72))
	{
		include '../view/error.php';
		exit();
	}
?>
<script src="/besg/data/js/jquery.validationEngine.js"></script>
<script src="/besg/data/js/jquery.validationEngine-zh_TW.js"></script>

<link rel="stylesheet" type="text/css" href="/besg/data/css/regis.css?201305041430"/>
<link rel="stylesheet" type="text/css" href="/besg/data/css/validationEngine.jquery.css"/>

<script type="text/javascript">
/* <![CDATA[ */
jQuery(document).ready(function($) {
	$('#regisSend').button();
	$('#check').button().click(function(){
		if ( $('#regisSend').css('display') == 'none' )
			{
				$('#regisSend').fadeIn('fast');
			}
			else
			{
				$('#regisSend').fadeOut('fast');
			}
		//$('#regisSend').toggle();
	});
	$('button.backup_player').button().click(
		function()
		{
			if ( $('div.backup_player').css('display') == 'none' )
			{
				$('div.backup_player').slideDown('fast');
			}
			else
			{
				$('div.backup_player').slideUp('fast');
			}
			return false;
		});
	$('#regisForm').validationEngine({
		showOneMessage:true,
		autoHidePrompt:true,
		autoHideDelay:3000,
		});
	
	$('#regisSend').click(function(){
		 
		if(!$("#regisForm").validationEngine('validate')){
			//alert("您輸入的資料有誤！");
			return false;
		}
		
		//if(($('#regisForm input[name="t_pw"]').val())!=($('#regisForm input[name="t_pwcheck"]').val())){
		//	alert("密碼驗證錯誤！");
		//	return false;
		//}
		
		var toPost={};
		
		term = $('#regisForm input');
		for(i=0; i<term.size(); i++ )
		{
			toPost[term.eq(i).attr('name')]=term.eq(i).val();
		}
		term = $('#regisForm select');
		for(i=0; i<term.size(); i++ )
		{
			toPost[term.eq(i).attr('name')]=term.eq(i).val();
		}
		PostPopUp("../besg/view/post_regis.php",toPost,true);
	});
});
//]]>
</script >
<html>
	<form action="../besg/view/post_regis.php" method="post" id="regisForm">
		<div id='team' style='width:99%; display:inline-block; text-align:center'>
			
			<?php 	
				echo"<fieldset>		<legend>隊伍</legend>" ;
					team() ;//隊伍
				echo"</fieldset>" ;
				echo"<fieldset>		<legend>隊長</legend>" ;
					leader() ;//隊長
				echo"</fieldset>" ;
			?>
				
		</div><!--team-->
		

		
		<div id="data">
			
			<?php
			for($i=1;$i<=4;$i++) //隊員1~4
				{
				echo"<fieldset>			<legend>正式隊員_$i</legend> " ;
					member($i) ;//後面全省略
				echo"</fieldset>" ;
				}
			?>
			
				<button class='backup_player'>候補隊員</button>
			<br />
			<div class='backup_player'>
			
				<?php
				for($i=1;$i<=2;$i++) //候補隊員1~2
					{
					echo"<fieldset>			<legend>候補隊員_$i</legend> " ;
						submember($i) ;//後面全省略
					echo"</fieldset>" ;
					}
				?>
				
			</div>
		</div><!--data-->
		<div style='height:40px; margin-top:1em;'>
			<input type="checkbox" id="check" name="check"/><label for="check">已同意比賽規則</label>
			<button type='button' id="regisSend" style="display:none; float:right;">送出</button>
		</div>
	</form>
</html>