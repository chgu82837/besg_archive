<link rel="stylesheet" type="text/css" href="/besg/data/css/QAstyle.css?201305041455"/>
<script type="text/javascript">
	$(document).ready(function(){
		$('#QAboard').accordion({
			heightStyle: "content",
			collapsible: true,
			active:1 //設定一開始展開是第幾個accordion bar,從0出發
		});
		$('.toBeButton').button();
	});
</script>

<h1 id='header'>Q & A</h1>

<?php require '../model/dataBase.php'	;?>
<?php	require '../model/modelQa.php';?>
<div id='QAboard'>
	<h3>我要問問題！</h3>
	<div id="askingBox">
		<?php include 'question.php'; ?>
		<a class="toBeButton" id="ToFB" style="width:100%" href="http://www.facebook.com/nchusg" target="_blank">前往黑天鵝臉書粉絲專頁查詢問題</a>
	</div>
	<h3>以前別人問的問題</h3>
	<div>
<?php 
$id=1; 
while(1) 
{
	$data[$id]=getdata($id);//讀取資料
	if($data[$id][3] == NUll)
	 break;//問題沒有值的的資料
	if($data[$id][2] == NUll)
		$data[$id][2] ='匿名';//匿名的人
	if($data[$id][5] == 1)//show=1
	{
		echo"<h2 class='question'>".$data[$id][3]."</h2>";//問題
		echo"<h5 class='nickname'>"."By:".$data[$id][2]."</h5>";//暱稱
		echo"<br/>";
		echo"<h4 class='answer'>"."Answer:".$data[$id][4]."</p>";//答案
		echo"<br/>";
	}
	$id++;
} //結束
//css 一定要修  他好醜


?>
</div>

</div>
