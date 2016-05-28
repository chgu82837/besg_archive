<?php
	include '../model/modelRegis.php';
	//為regis.php,error.php準備好需要用的函數
?>

<style>
	img.regis_sponsor{
		margin-left:5%;
		width:225px; 
	}

	/*some CSS are overwritten by besgRule.css*/
	#page #accordion #contestRule #header{
		display:none;
	}
	#page #accordion h3{
		margin-left:0;
	}
	#pageFrame #page #header{
		font-weight:bold;
	}
</style>

<script type="text/javascript">
	var oriTimer;
	$(document).ready(function(){
		$("#accordion").accordion({
			heightStyle: "content",
			collapsible: true,
			active:2
		});
		
		clearInterval(oriTimer);
		oriTimer=setInterval(function(){
			var remain=$("#timer").attr('remain');
			$("#timer").attr('remain',(remain-1));
			var result="";
			result=result+(remain%60)+"秒";
			remain=(remain-(remain%60))/60;
			result=(remain%60)+"分鐘 "+result;
			remain=(remain-(remain%60))/60;
			result=(remain%24)+"小時 "+result;
			remain=(remain-(remain%24))/24;
			result=(remain)+"天 "+result;
			$("#timer").text("還剩下 "+result+"可以報名！");
		},1000);
		//console.log(oriTimer);
	});
</script>

<h1 id='header'>選手專區</h1>

<?php 
	$remain=$end_time-$t;
	if((($t<$start_time)||($t>$end_time))||($NofTeams>72)){
	}
	else{
		echo "<h3 id='timer' remain='".$remain."' style='text-align:center;'>Loading...</h3>";
	}
?>

<div id="accordion">
	<h3>比賽規則</h3>
	<div id="contestRule">
		<?php include 'rule.html';?>
	</div>
	<!--
		<h3>我要報名！！</h3>
		<div>
			<?php 
				if((($t<$start_time)||($t>$end_time))||($NofTeams>72)){
					//include '../view/error.php' ;
				}
				else{
					//include '../view/regis.php' ;
				}
			?>
		</div>
	-->
	<!--
		<h3>狀態查詢、確認</h3>
		<div>
			<?php 
				if($t<$start_time){
					//include '../view/error.php';
				}
				else{
					//登入查詢功能修好之後再開放吧
					//include '../view/login.php';
					//echo "未開放！";
				}
				//include '../view/error.php';
			?>
		</div>
	-->
	<h3>贊助廠商</h3>
	<div>
		<?php 
			for($n=0;$n<=3;$n++){
				$temp=(($n+$t)%15);
				echo "<img class='regis_sponsor' src='/besg/data/images/sponsor_$temp.jpg' style='margin-bottom: 1em;'>";
				//根據時間，每次到此畫面看到的四個廣告都會不同
			}
			?>
	</div>
</div><!--accordion-->
