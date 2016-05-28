<?php require '../model/dataBase.php' ;?>
<?php require '../model/modelQa.php' ;?>
<?php	require '../model/modelCheck.php';?>
<?php

?>

<?php
show_header($header,$table_width);//顯示標題
$id=1; 
while(1)//開始
{


$data[$id]=getdata($id);//讀取資料

if($data[$id][3]==NUll)
	break;//問題沒有值的的資料
	
show_content($data,$id,$table_width);//顯示內容

$id++;
}//結束
?>

<form action="/besg/view/answer.php" method="post" id="finalFrom">
	<fieldset style='width: 93%;'>
		<legend>觀看內容&修改</legend>
		<input type='text' class='' placeholder='輸入編號' name='id' >
		<button type='submit'>
			送出
		</button>
	</fieldset>
</form>