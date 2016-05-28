<?php require '../model/dataBase.php' ?>
<?php
if($_POST['question']==NULL)
{
  include 'success_question.html';
  die();
}
$question = sprintf("INSERT INTO `besg_qa` (`besgQaName`,`besgQaQuestion`) 
			VALUES ('%s','%s')",
			$_POST['name'],
			$_POST['question']
			);
			
mysql_query($question) or die("fail to send the question") ;

include 'success_question.html';
?>
