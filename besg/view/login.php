<!DOCTYPE HTML>
<html lang="en">
<head>
<title>查詢系統</title>
<link rel="stylesheet" type="text/css" href="/besg/data/css/regis.css"/>
</head>
<body>
<script>
	$(document).ready(function(){
		$("#loginBtn").button().click(function(){
			var toLoginPost={};
			
			toLoginPost['t_name']=$('#loginForm input').eq(0).val();
			toLoginPost['t_pw']=$('#loginForm input').eq(1).val();

			PostPopUp("../besg/view/result_login.php",toLoginPost,true);
		});
		
		$('#toManage').button().click(function(){
			PopUpLoad('/besg/view/show_login.php');
		});
		$('#toLogout').button().click(function(){
			PopUpLoad('/besg/view/logout.php');
		});
	});
</script>

<?php 
	if(isset($_COOKIE["user"])==false):
		echo "
			<form id='loginForm' action='../view/result_login.php' method='post'>
					<fieldset style='width: 93%;'>		
						<legend>入口</legend>
						<input type='text' class='input_full' placeholder='隊伍名稱' name='t_name' >
						<input type='password' class='input_full' placeholder='密碼' name='t_pw' >
						<a id='loginBtn' style='width: 98%;'>登入</a>
					</fieldset>
			</form>
		";
?>


<?php
	else:
		echo "
			<a id='toManage' sytle='width:50%;'>管理隊伍資料</a>
			<a id='toLogout' sytle='width:20%;'>登出</a>
		";
	endif;
?>
</body>
</html>