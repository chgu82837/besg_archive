<?php require '../model/dataBase.php' ;?>
<?php
if(!isset($_POST['show']))
	$_POST['show']=0;
$answer = sprintf("UPDATE `besg_qa` SET 
																					besgQaClass = %d,
																					besgQaAnswer = '%s',
																					besgQaShow = %d,
																					besgQaEditor = '%s'
										WHERE besgQaId = %d
										",
			$_POST['class'],
			$_POST['answer'],
			$_POST['show'],
			$_POST['editor'],
			$_POST['id']
			);
mysql_query($answer) or die("fail to send the answer") ;
header('Location:../view/select_question.php');
?>