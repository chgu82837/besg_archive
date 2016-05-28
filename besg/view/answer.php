<?php require '../model/dataBase.php' ;?>
<?php require '../model/modelQa.php' ;?>
<?php	require '../model/modelCheck.php';?>

<link rel="stylesheet" type="text/css" href="/besg/data/css/QApost.css"/>

<?php
$id=$_POST['id'];
show_header($header,$table_width);//顯示標題
$data[$id]=getdata($id);//讀取資料
show_content($data,$id,$table_width);//顯示內容
?>
<?php if($data[$id][4]!=NULL):?>

<h2 class=''>注意:已有人回答此問題。</h2>
<?php endif;?>
<form action="/besg/view/db_answer.php" method="post" id="">
	<fieldset class='qa' >
		<legend>回答問題</legend>
		<input 	class='qaNickName'
						placeholder='回覆者(限15字，必填)'
						type='text'
						name='editor'
						maxlength='15'
		/>
		<p class='qa_alert'>回答(限200字)</p>
		<textarea 
						class='qaContent'
						name='answer'
						maxlength='200'
						
		>
		<?php echo $data[$id][4]; ?>
		</textarea>
		<br/>
		<select name='class' class='' >
			<optgroup label='問題類型'>
				<option value="0">未定義</option>
			</optgroup>
		</select>
		<p class='qa_alert'>
		<input	class=''
						type='checkbox'
						name='show'
						value='1'
		/>
		是否顯示 </p>
		<?php
		echo "
		<input	class=''
						type='hidden'
						name='id'
						value=".$id."	
		/>
		"//傳id
		?>	
		<input type='submit' value='送出'/>
							
		
	</fieldset>
</form>