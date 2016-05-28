
<?php
	//include '../model/modelRegis.php';
	//在start_regis.php已經include過
	echo "<h3 style='text-align:center;'>現在系統時間為<br>$now<br></h3>";
	if($t<$start_time){
		echo "<h3 style='text-align:center;'>報名開始於<br>$start</h3>";
	}
	else if($t>$end_time){
		echo "<h3 style='text-align:center;'>報名已截止於<br>$end</h3>";
	}
	else if($NofTeams>72){
		echo "<h3 style='text-align:center;'>很抱歉！現在已經額滿！</h3>";
	} 
?>
