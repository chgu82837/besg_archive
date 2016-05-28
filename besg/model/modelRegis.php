<?php
	$time_add =0;
	$t=time()+$time_add; 
	//$t=1363320001
	//測試時取消註解
	$now = date('Y/m/d  H:i:s',$t);
	
	$start_time=1363320000+$time_add;// 2013 3月15日 
	$start = date('Y/m/d  H:i',$start_time);
	
	$end_time=1365177599+$time_add;// 2013 4月5日 
	$end = date('Y/m/d  H:i',$end_time);
	
	$NofTeams=0; //!!!!!!!需要取得目前已報名隊伍的數量
	
//我把人分成隊長 正式隊員 候補隊員 方便修改，太冗再說\
//=====================================================================================================================	
//產生系所選單
	function depart($name,$no){
	
		if($no==NULL){
			echo "<select class='depart validate[required]' name=$name>";
		}
		else{
			echo "<select class='depart validate[required]' name=".$name."_".$no.">";
		}
		$nchu_depart = array(
			
			/*
			  '中文系' => '中文系(U011)',
			  '外文系' => '外文系(U012)',
			  '歷史系' => '歷史系(U013)',
			  '進中文' => '進中文(N11)',
			  '進外文' => '進外文(N12)',
			  '進文創' => '進文創(N01F)',
			  
			  '企管系' => '企管系(U023)',
			  '財金系' => '財金系(U021)',
			  '資管系' => '資管系(U029)',
			  '行銷系' => '行銷系(U044)',
			  '會計系' => '會計系(U028)',
			  '法律系' => '法律系(U024)',


			  '應數系' => '應數系(U053)',
			  '物理系' => '物理系(U054)',
			  '化學系' => '化學系(U051)',
			  '生科系' => '生科系(U052)',
			  '獸醫系' => '獸醫系(U038)',
			  '資工系' => '資工系(U056)',


			  '土木系' => '土木系(U062)',
			  '電機系' => '電機系(U064)',
			  '機械系' => '機械系(U061)',
			  '化工系' => '化工系(U065)',
			  '環工系' => '環工系(U063)',
			  '材料系' => '材料系(U066)',
			  

			  '昆蟲系' => '昆蟲系(U036)',
			  '動科系' => '動科系(U037)',
			  '園藝系' => '園藝系(U032)',
			  '森林系' => '森林系(U033)',
			  '植病系' => '植病系(U035)',
			  '農藝系' => '農藝系(U01)',
			  '國農企學程' => '國農企學程(U030H)',
			

			  '水保系' => '水保系(U042)',
			  '食生系' => '食生系(U043)',
			  '土環系' => '土環系(U039)',
			  '景觀學程' => '景觀學程(U30F)',
			  '應經系' => '應經系(U034)',
			  '生技學程' => '生技學程(U30G)',
			  '生機系' => '生機系(U040)'
			*/
		
		
			"中國文學系學士班"  =>  "U11  中國文學系學士班",
			"外國語文學系學士班"  =>  "U12  外國語文學系學士班",
			"歷史學系學士班"  =>  "U13  歷史學系學士班",
			"財務金融學系學士班"  =>  "U21  財務金融學系學士班",
			"企業管理學系學士班"  =>  "U23  企業管理學系學士班",
			"法律學系學士班"  =>  "U24  法律學系學士班",
			"會計學系學士班"  =>  "U28  會計學系學士班",
			"資訊管理學系學士班"  =>  "U29  資訊管理學系學士班",
			"景觀與遊憩學程學士學位學程"  =>  "U30F  景觀與遊憩學程學士學位學程",
			"生物科技學程學士學位學程"  =>  "U30G  生物科技學程學士學位學程",
			"國際農企業學士學位學程"  =>  "U30H  國際農企業學士學位學程",
			"農藝學系學士班"  =>  "U31  農藝學系學士班",
			"園藝學系學士班"  =>  "U32  園藝學系學士班",
			"森林學系林學組學士班"  =>  "U33A  森林學系林學組學士班",
			"森林學系木材科學組學士班"  =>  "U33B  森林學系木材科學組學士班",
			"應用經濟學系學士班"  =>  "U34  應用經濟學系學士班",
			"植物病理學系學士班"  =>  "U35  植物病理學系學士班",
			"昆蟲學系學士班"  =>  "U36  昆蟲學系學士班",
			"動物科學系學士班"  =>  "U37  動物科學系學士班",
			"獸醫學系學士班"  =>  "U38B  獸醫學系學士班",
			"土壤環境科學系學士班"  =>  "U39  土壤環境科學系學士班",
			"生物產業機電工程學系學士班"  =>  "U40  生物產業機電工程學系學士班",
			"水土保持學系學士班"  =>  "U42  水土保持學系學士班",
			"食品暨應用生物科技學系學士班"  =>  "U43  食品暨應用生物科技學系學士班",
			"行銷學系學士班"  =>  "U44  行銷學系學士班",
			"化學系學士班"  =>  "U51  化學系學士班",
			"生命科學系學士班"  =>  "U52  生命科學系學士班",
			"應用數學系學士班"  =>  "U53B  應用數學系學士班",
			"物理學系一般物理組學士班"  =>  "U54A  物理學系一般物理組學士班",
			"物理學系光電物理組學士班"  =>  "U54B  物理學系光電物理組學士班",
			"資訊科學與工程學系學士班"  =>  "U56  資訊科學與工程學系學士班",
			"學士後太陽能光電系統應用學程學士學位學程"  =>  "U60F  學士後太陽能光電系統應用學程學士學位學程",
			"機械工程學系學士班"  =>  "U61B  機械工程學系學士班",
			"土木工程學系學士班"  =>  "U62B  土木工程學系學士班",
			"環境工程學系學士班"  =>  "U63  環境工程學系學士班",
			"電機工程學系學士班"  =>  "U64B  電機工程學系學士班",
			"化學工程學系學士班"  =>  "U65  化學工程學系學士班",
			"材料科學與工程學系學士班"  =>  "U66  材料科學與工程學系學士班",

			"微生物基因體學學程博士學位學程"  =>  "D01G  微生物基因體學學程博士學位學程",
			"生物科技學研究所國際研究生學程"  =>  "G00  生物科技學研究所國際研究生學程",
			"中國文學系碩士班"  =>  "G11  中國文學系碩士班",
			"外國語文學系碩士班"  =>  "G12  外國語文學系碩士班",
			"歷史學系碩士班"  =>  "G13  歷史學系碩士班",
			"圖書資訊學研究所碩士班"  =>  "G14  圖書資訊學研究所碩士班",
			"台灣文學與跨國文化研究所碩士班"  =>  "G15  台灣文學與跨國文化研究所碩士班",
			"奈米科學研究所碩士班"  =>  "G17  奈米科學研究所碩士班",
			"統計學研究所碩士班"  =>  "G18  統計學研究所碩士班",
			"基因體暨生物資訊學研究所碩士班"  =>  "G19  基因體暨生物資訊學研究所碩士班",
			"財務金融學系碩士班"  =>  "G21  財務金融學系碩士班",
			"國際政治研究所碩士班"  =>  "G22  國際政治研究所碩士班",
			"企業管理學系碩士班"  =>  "G23  企業管理學系碩士班",
			"法律學系科技法律碩士班"  =>  "G24  法律學系科技法律碩士班",
			"科技管理研究所科技管理碩士班"  =>  "G26  科技管理研究所科技管理碩士班",
			"科技管理研究所電子商務碩士班"  =>  "G261  科技管理研究所電子商務碩士班",
			"會計學系碩士班"  =>  "G28  會計學系碩士班",
			"資訊管理學系碩士班"  =>  "G29  資訊管理學系碩士班",
			"景觀與遊憩學程碩士學位學程"  =>  "G30F  景觀與遊憩學程碩士學位學程",
			"國際農學碩士學位學程"  =>  "G30G  國際農學碩士學位學程",
			"農藝學系碩士班"  =>  "G31  農藝學系碩士班",
			"園藝學系碩士班"  =>  "G32  園藝學系碩士班",
			"森林學系碩士班"  =>  "G33  森林學系碩士班",
			"應用經濟學系碩士班"  =>  "G34  應用經濟學系碩士班",
			"植物病理學系碩士班"  =>  "G35  植物病理學系碩士班",
			"昆蟲學系碩士班"  =>  "G36  昆蟲學系碩士班",
			"動物科學系碩士班"  =>  "G37  動物科學系碩士班",
			"獸醫學系碩士班"  =>  "G38  獸醫學系碩士班",
			"土壤環境科學系碩士班"  =>  "G39  土壤環境科學系碩士班",
			"生物產業機電工程學系碩士班"  =>  "G40  生物產業機電工程學系碩士班",
			"生物科技學研究所碩士班"  =>  "G41  生物科技學研究所碩士班",
			"水土保持學系碩士班"  =>  "G42  水土保持學系碩士班",
			"食品暨應用生物科技學系碩士班"  =>  "G43  食品暨應用生物科技學系碩士班",
			"行銷學系碩士班"  =>  "G44  行銷學系碩士班",
			"生物產業管理研究所碩士班"  =>  "G45  生物產業管理研究所碩士班",
			"微生物暨公共衛生學研究所碩士班"  =>  "G46  微生物暨公共衛生學研究所碩士班",
			"獸醫病理生物學研究所碩士班"  =>  "G47  獸醫病理生物學研究所碩士班",
			"化學系碩士班"  =>  "G51  化學系碩士班",
			"生命科學系碩士班"  =>  "G52  生命科學系碩士班",
			"應用數學系碩士班"  =>  "G53  應用數學系碩士班",
			"應用數學系計算科學碩士班"  =>  "G531  應用數學系計算科學碩士班",
			"物理學系碩士班"  =>  "G54  物理學系碩士班",
			"物理學系生物物理學碩士班"  =>  "G541  物理學系生物物理學碩士班",
			"分子生物學研究所碩士班"  =>  "G55  分子生物學研究所碩士班",
			"資訊科學與工程學系碩士班"  =>  "G56  資訊科學與工程學系碩士班",
			"生物化學研究所碩士班"  =>  "G58  生物化學研究所碩士班",
			"生物醫學研究所碩士班"  =>  "G59  生物醫學研究所碩士班",
			"機械工程學系碩士班"  =>  "G61  機械工程學系碩士班",
			"土木工程學系碩士班"  =>  "G62  土木工程學系碩士班",
			"環境工程學系碩士班"  =>  "G63  環境工程學系碩士班",
			"電機工程學系碩士班"  =>  "G64  電機工程學系碩士班",
			"化學工程學系碩士班"  =>  "G65  化學工程學系碩士班",
			"材料科學與工程學系碩士班"  =>  "G66  材料科學與工程學系碩士班",
			"精密工程研究所碩士班"  =>  "G67  精密工程研究所碩士班",
			"生醫工程研究所碩士班"  =>  "G68  生醫工程研究所碩士班",
			"運動與健康管理研究所碩士班"  =>  "G81  運動與健康管理研究所碩士班",
			"教師專業發展研究所碩士班"  =>  "G82  教師專業發展研究所碩士班",
			"國家政策與公共事務研究所碩士班"  =>  "G91  國家政策與公共事務研究所碩士班",
			"通訊工程研究所碩士班"  =>  "G93  通訊工程研究所碩士班",
			"光電工程研究所碩士班"  =>  "G94  光電工程研究所碩士班",

			"組織工程與再生醫學學程博士學位學程"  =>  "D01F  組織工程與再生醫學學程博士學位學程",
			"中國文學系博士班"  =>  "D11  中國文學系博士班",
			"歷史學系博士班"  =>  "D13  歷史學系博士班",
			"財務金融學系博士班"  =>  "D21  財務金融學系博士班",
			"國際政治研究所博士班"  =>  "D22  國際政治研究所博士班",
			"企業管理學系博士班"  =>  "D23  企業管理學系博士班",
			"科技管理研究所科技管理博士班"  =>  "D26  科技管理研究所科技管理博士班",
			"農藝學系博士班"  =>  "D31  農藝學系博士班",
			"園藝學系博士班"  =>  "D32  園藝學系博士班",
			"森林學系博士班"  =>  "D33  森林學系博士班",
			"應用經濟學系博士班"  =>  "D34  應用經濟學系博士班",
			"植物病理學系博士班"  =>  "D35  植物病理學系博士班",
			"昆蟲學系博士班"  =>  "D36  昆蟲學系博士班",
			"動物科學系博士班"  =>  "D37  動物科學系博士班",
			"獸醫學系博士班"  =>  "D38  獸醫學系博士班",
			"土壤環境科學系博士班"  =>  "D39  土壤環境科學系博士班",
			"生物產業機電工程學系博士班"  =>  "D40  生物產業機電工程學系博士班",
			"生物科技學研究所博士班"  =>  "D41  生物科技學研究所博士班",
			"水土保持學系博士班"  =>  "D42  水土保持學系博士班",
			"食品暨應用生物科技學系博士班"  =>  "D43  食品暨應用生物科技學系博士班",
			"微生物暨公共衛生學研究所博士班"  =>  "D46  微生物暨公共衛生學研究所博士班",
			"獸醫病理生物學研究所博士班"  =>  "D47  獸醫病理生物學研究所博士班",
			"化學系博士班"  =>  "D51  化學系博士班",
			"生命科學系博士班"  =>  "D52  生命科學系博士班",
			"應用數學系博士班"  =>  "D53  應用數學系博士班",
			"物理學系博士班"  =>  "D54  物理學系博士班",
			"分子生物學研究所博士班"  =>  "D55  分子生物學研究所博士班",
			"資訊科學與工程學系博士班"  =>  "D56  資訊科學與工程學系博士班",
			"生物化學研究所博士班"  =>  "D58  生物化學研究所博士班",
			"生物醫學研究所博士班"  =>  "D59  生物醫學研究所博士班",
			"機械工程學系博士班"  =>  "D61  機械工程學系博士班",
			"土木工程學系博士班"  =>  "D62  土木工程學系博士班",
			"環境工程學系博士班"  =>  "D63  環境工程學系博士班",
			"電機工程學系博士班"  =>  "D64  電機工程學系博士班",
			"化學工程學系博士班"  =>  "D65  化學工程學系博士班",
			"材料科學與工程學系博士班"  =>  "D66  材料科學與工程學系博士班",
			"精密工程研究所博士班"  =>  "D67  精密工程研究所博士班",
			
			"進修學士班共同學科"=>"N00 進修學士班共同學科",
			"文化創意產業學士學位學程"=>"N01F 文化創意產業學士學位學程",
			"中國文學系進修學士班0"=>"N11 中國文學系進修學士班",
			"中國文學系進修學士班2"=>"N112 中國文學系進修學士班",
			"中國文學系進修學士班1"=>"N111 中國文學系進修學士班",
			"外國語文學系進修學士班"=>"N12 外國語文學系進修學士班",
			"歷史學系進修學士班"=>"N13 歷史學系進修學士班",
			"生物產業管理進修學士學位學程"=>"N46 生物產業管理進修學士學位學程",
			"企業管理學系進修學士班"=>"N79 企業管理學系進修學士班"








		);
		
		foreach($nchu_depart as $i => $val){
			echo "<option value='$i'>$val</option>
			";
		}
		echo "</select";
	}
//=====================================================================================================
//產生年級選單	
function grade($name,$no){
		if($no==NULL){
			echo "<select class='grade' name=$name>";
		}
		else{
			echo "<select class='grade' name='".$name.'_'.$no."'>";
		}
			$nchu_grade = array(

				  '1' => '一年級',
				  '2' => '二年級',
				  '3' => '三年級',
				  '4' => '四年級',	  
			);
		foreach($nchu_grade as $i => $val){
			echo "<option value='".$i."'>".$val."</option>";
		}
		echo "</select";
	}
//=====================================================================================================
//隊伍	
function team($t_name=NULL,$t_sname=NULL,$t_pw=NULL,$type='text')
	{
	$showname=array('隊名','隊伍英文縮寫','隊伍密碼','請再確認密碼') ;
	$name=array('t_name','t_sname','t_pw','t_pwcheck') ;
	$value=array($t_name,$t_sname,$t_pw) ;
	$class=array(
		'tname validate[required]',
		'shortname validate[required,minSize[3],maxSize[6],custom[onlyLetterSp]]',
		'pw validate[required,minSize[6]]',
		'pw validate[required,equals[password]]');
		//validateEngine的規則用以上格式，詳情請見validateEngine之API document
	for($i=0;$i<2;$i++) 
	{	
		
		echo"<input class='$class[$i]' placeholder=$showname[$i]	type=$type name=$name[$i]  " ;
		
		if($type=='hidden')
			echo"value=".$value[$i]." >";
		else
			echo" >" ;
	}
	
	if($type=='hidden')
			echo "<input placeholder=$showname[2] class='$class[2]' type='hidden' name=$name[2] value=$value[2] >";//post_pw in postregis
	else
		{
			echo "<input placeholder=$showname[2] class='$class[2]' id='password' type='password' name=$name[2]>";//pw,id用來給validate比對
			echo "<input placeholder=$showname[3] class='$class[3]' type='password' name=$name[3]>";//check_pw
		}
	}	
//===================================================================================================	
//隊長
function leader($l_name=NULL,$l_depart=NULL,$l_grade=NULL,$l_stuid=NULL,$l_garena=NULL,$l_summoner=NULL,$l_phone=NULL,$l_email=NULL,
				$type='text')
	{
	$showname=array("姓名","系所","年級","學號","競時通帳號","召喚師名稱","手機","E-Mail");
	$name=array('l_name','l_depart','l_grade','l_stuid','l_garena','l_summoner','l_phone','l_email');
	$value=array($l_name,$l_depart,$l_grade,$l_stuid,$l_garena,$l_summoner,$l_phone,$l_email) ;
	$class=array(
		'name validate[required]',
		'depart',
		'grade',
		'stuid validate[required,custom[integer],minSize[10],maxSize[10]]',
		'garena validate[required]',
		'sommoner validate[required]',
		'cellphone validate[required,custom[phone],minSize[10],maxSize[10]]',
		'email validate[required,custom[email]]');
	
	for($i=0;$i<8;$i++) 
	{

		if($i==1&&'text'==$type){
			depart($name[$i],NULL);
		}
		else if($i==2&&'text'==$type){
			grade($name[$i],NULL);
		}
		else{
			echo '<input class="' . $class[$i] . '"' . 
								 ' placeholder="' . $showname[$i] . '"' .
								 ' type="' . $type .'"' . 
								 ' name="' . $name[$i] .'"';
		}
		
		
		if($type=='hidden')
			echo" value=$value[$i] >";
		else
			echo" >" ;
	}	
	}
	
//=====================================================================================================
//正式隊員
function member($no,$m_name=NULL,$m_depart=NULL,$m_grade=NULL,$m_stuid=NULL,$m_garena=NULL,$m_summoner=NULL,$m_phone=NULL,$m_email=NULL,
				$type='text')
				//多了$no 請注意
	{
	$showname=array("姓名","系所","年級","學號","競時通帳號","召喚師名稱","手機","E-Mail");
	$name=array('m_name','m_depart','m_grade','m_stuid','m_garena','m_summoner','m_phone','m_email');
	$value=array($m_name,$m_depart,$m_grade,$m_stuid,$m_garena,$m_summoner,$m_phone,$m_email) ;
	$class=array(
		'name validate[required]',
		'depart',
		'grade',
		'stuid validate[required,custom[integer],minSize[10],maxSize[10]]',
		'garena validate[required]',
		'sommoner validate[required]',
		'cellphone validate[required,custom[phone],minSize[10],maxSize[10]]',
		'email validate[required,custom[email]]');
	
	for($i=0;$i<8;$i++) 
	{

		if(($i==1)&&($type=='text')){
			depart('m_depart',$no);
		}
		else if(($i==2)&&($type=='text')){
			grade('m_grade',$no);
		}
		else{
			echo '<input class="' . $class[$i] . '"' . 
								 ' placeholder="' . $showname[$i] . '"' .
								 ' type="' . $type .'"' . 
								 ' name="' . $name[$i] . '_' . $no .'"';
		}
		
		if($type=='hidden')
			echo"value=".$value[$i]." >";
		else
			echo" >" ;
	}	

	}	
//=====================================================================================================
//候補隊員
function submember($no,$sm_name=NULL,$sm_depart=NULL,$sm_grade=NULL,$sm_stuid=NULL,$sm_garena=NULL,$sm_summoner=NULL,$sm_phone=NULL,$sm_email=NULL,
				$type='text')
				//多了$no 請注意
	{
	$showname=array("姓名","系所","年級","學號","競時通帳號","召喚師名稱","手機","E-Mail");
	$name=array('sm_name','sm_depart','sm_grade','sm_stuid','sm_garena','sm_summoner','sm_phone','sm_email');
	$value=array($sm_name,$sm_depart,$sm_grade,$sm_stuid,$sm_garena,$sm_summoner,$sm_phone,$sm_email) ;
	$class=array(
		'name',
		'depart',
		'grade',
		'stuid validate[custom[integer],minSize[10],maxSize[10]]',
		'garena',
		'sommoner',
		'cellphone validate[custom[phone],minSize[10],maxSize[10]]',
		'email validate[custom[email]]');
	
	for($i=0;$i<8;$i++) 
	{
		if($i==1&&'text'==$type){
			depart($name[$i],$no);
		}
		else if($i==2&&'text'==$type){
			grade($name[$i],$no);
		}
		else{
			echo '<input class="' . $class[$i] . '"' . 
								 ' placeholder="' . $showname[$i] . '"' .
								 ' type="' . $type .'"' . 
								 ' name="' . $name[$i] . '_' . $no .'"';
		}
		
		if($type=='hidden')
			echo"value=".$value[$i]." >";
		else
			echo" >" ;
	}	
	}	
//===================================================================================================	
//用於再確認頁
function postall($kind,$no=1)
	{
	
	switch($kind)
		{
		case 't' :
			$name=array('t_name','t_sname','t_pw') ;
			for($i=0;$i<3;$i++)
				$r[$i]=$_POST[$name[$i]] ;
			return $r;
			break;
		case 'l' :
			$name=array('l_name','l_depart','l_grade','l_stuid','l_garena','l_summoner','l_phone','l_email');
			for($i=0;$i<8;$i++)
				$r[$i]=$_POST[$name[$i]] ;
			return $r;
			break;
		case 'm' :
			$name=array('m_name','m_depart','m_grade','m_stuid','m_garena','m_summoner','m_phone','m_email');
			for($i=0;$i<8;$i++)
				$r[$i]=$_POST[$name[$i]."_$no"] ;
			return $r;
			break;
		case 'sm' :
			$name=array('sm_name','sm_depart','sm_grade','sm_stuid','sm_garena','sm_summoner','sm_phone','sm_email');
			for($i=0;$i<8;$i++)
				$r[$i]=$_POST[$name[$i]."_$no"] ;
			return $r;
			break;
		}
		
	}	
//=====================================================================================================
	function checkname($name)
	{
		$c_TName ="SELECT besgTeamName FROM `besg_team` WHERE besgTeamName= '"."$name'" ;
		$c_TNameAbbr ="SELECT besgTeamAbbr FROM `besg_team` WHERE besgTeamAbbr= '"."$name'" ;
		$a=mysql_fetch_array(mysql_query($c_TName));
		$b=mysql_fetch_array(mysql_query($c_TNameAbbr));
			if($a[0]==NULL&&$b[0]==NULL)
				return 1;//無同名
			else
				return 0;//同名
	
	}
	function checkno()
	{
		$c_No ="SELECT besgTeamId FROM `besg_team` WHERE besgTeamId = 72" ;
		$a=mysql_fetch_array(mysql_query($c_No));
		//$b =count($a);
		//echo $b; die();
		if($a[0]==NULL)
			return 1;//沒超過
		else
			return 0;//超過
	}
?>