
<link rel="stylesheet" type="text/css" href="/besg/data/css/QApost.css?201305041320"/>
<script>
	$(document).ready(function(){
		$('#askQuestion').button();
		$('#askQuestion').click(function(event){
			event.preventDefault();
			var toBeSubmit={};
			toBeSubmit[$('#askingBox input').attr('name')]=$('input').val();
			toBeSubmit[$('#askingBox textarea').attr('name')]=$('textarea').val();
			$.post('/besg/view/db_question.php',toBeSubmit,function(res){
				$('#disabling').fadeIn(function(){
					$('#askingBox').empty().append(res);
					$('#disabling').fadeOut();
				});
			});
		});
	});
</script>

<form action="/besg/view/db_question.php" method="post" id="">
	<fieldset class='qa'>
		<input 	class='qaNickName'
						placeholder='暱稱(限15字)'
						type='text'
						name='name'
						maxlength='15'
		/>
		<textarea 
						class='qaContent'
						name='question'
						maxlength='200'
						placeholder='問題(限200字)'
		></textarea>
		<a id='askQuestion' type='submit' class='submit'>送出</a>
	</fieldset>


	
</form>