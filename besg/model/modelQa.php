<?php
//======================================================================
$header=array('編號','類別','暱稱','問題','答案','顯示','編輯者');
//類別名
//======================================================================
$table_width=array(30,30,100,350,350,30,100);
//表寬  之後用css調完就可以刪掉了
//======================================================================
function show_header($header,$table_width)
{
echo
"
	<table border='3' width='990'>
		<tr>
";
				
					for($j=0;$j<7;$j++)
					 show($header[$j],$table_width[$j]); 
echo					 
"
		</tr>
	</table>
";
}
//顯示標題
//======================================================================
function show_content($data,$id,$table_width)
{
echo
"
	<table border='3' width='990'>
		<tr>
"; 
					for($j=0;$j<7;$j++)
						switch ($j)
						{
							case 2:
								if($data[$id][2]==NULL)
									show('匿名',$table_width[2]);
								else
									show($data[$id][2],$table_width[2]);
								break;
							case 5:
								if($data[$id][5]==0)
									show('N',$table_width[5]);
								else
									show('Y',$table_width[5]);
								break;
							default:
								show($data[$id][$j],$table_width[$j]); 
						}//switch 用來放顯示的值
echo
"
		</tr>
	</table>
";
}
//顯示內容
//======================================================================
function getdata($id)
{
$sql = "SELECT 			besgQaId,
										besgQaClass,
										besgQaName,
										besgQaQuestion,
										besgQaAnswer,
										besgQaShow,
										besgQaEditor
										FROM `besg_qa` WHERE besgQaId='".$id."'" ;
$data= mysql_fetch_array(mysql_query($sql));
return($data);
}
//資料取出
?>