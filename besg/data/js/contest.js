//程式---------------------------------------------------------------
//初始點置中:
$.fn.myCenterPosition=function(){
	this.clone().addClass('myCenterPositionTemp').appendTo('body');
	var myCenterPositionTemp=$('.myCenterPositionTemp');
	var myCenterPosition_h=$('.myCenterPositionTemp').height();
	var myCenterPosition_w=$('.myCenterPositionTemp').width();
	$('.myCenterPositionTemp').remove();
	if(this.is('div')){
		this.css({
			'margin-left':-myCenterPosition_w/2+'px',
			'margin-top':-myCenterPosition_h/2+'px'
		});
		return this;
	}
	else{
		if(myCenterPositionTemp.attr('id')==undefined)
			var myCenterPositionTemp=$('<div class="myCenterPositionWrapping"></div>');
		else
			var myCenterPositionTemp=$('<div id="'+this.attr('id')+'_myCenterPositionWrap" class="myCenterPositionWrapping"></div>');
		myCenterPositionTemp.append(this);
		myCenterPositionTemp.css({
			'position':'absolute',
			'width':myCenterPosition_w+'px',
			'height':myCenterPosition_h+'px',
			'margin-left':(-myCenterPosition_w/2)+'px',
			'margin-top':(-myCenterPosition_h/2)+'px'
		});
		return myCenterPositionTemp;
	}
	
}
//定義環繞旋轉:
$.fn.myCircle=function(theArray,radius,rotation,startDegree){
	if(theArray==undefined){
		console.log('theArray is empty');
		return;
	}
	if(startDegree==undefined)
		startDegree=0;
	if(radius==undefined)
		radius=50;
	var myCircle_d=2*Math.PI/theArray.length;
	var oneInTheArray;
	var myCircle_i=0;
	var myCircleTemp;
	var oneInTheArrayWrap;
	for(var myCircle_j in theArray){
		oneInTheArray=theArray[myCircle_j];
		myCircleTemp=oneInTheArray.clone().css({
			'position':'absolute',
			'left':radius*Math.sin(myCircle_d*myCircle_i+startDegree)+'px',
			'bottom':radius*Math.cos(myCircle_d*myCircle_i+startDegree)+'px'
		});
		if(rotation)
			myCircleTemp.rotate((myCircle_d*myCircle_i+startDegree)*180/Math.PI);
		this.append(myCircleTemp);
		myCircle_i++;
	}
	return this;
}
//定義環繞旋轉(文字版):
$.fn.myCircleForText=function(theString,radius,fontSize){
	if(theString==undefined)
		theString='test';
	if(radius==undefined)
		radius=50;
	if(fontSize==undefined)
		fontSize=20;
	var myCircleForTextTempS=theString;
	var myCircleForTextTemp;
	var myCircleForText_d=2*Math.PI/myCircleForTextTempS.length;
	for(var myCircleForText_i=0;myCircleForText_i<myCircleForTextTempS.length;myCircleForText_i++){
		//console.log(radius*Math.sin(myCircleForText_d*myCircleForText_i));
		myCircleForTextTemp=$('<div><span class="circleText">'+myCircleForTextTempS.charAt(myCircleForText_i)+'</span></div>');
		myCircleForTextTemp.children().css({
			'display':'block',
			'text-align':'center',
			'font-size':fontSize+'px'	
		});
		myCircleForTextTemp.css({
			'width':fontSize+'px',
			'height':fontSize+'px',
			'margin-top':-fontSize/2+'px',
			'margin-left':-fontSize/2+'px',
			'position':'absolute',
			'left':radius*Math.sin(myCircleForText_d*myCircleForText_i)+'px',
			'bottom':(radius*Math.cos(myCircleForText_d*myCircleForText_i)-fontSize/2)+'px'
		});
		myCircleForTextTemp.rotate(myCircleForText_d*myCircleForText_i*180/Math.PI);	
		this.append(myCircleForTextTemp);
	}
	return this;
}
//讓每隊簡稱長度一樣，並回傳調整之後的字體大小:
$.fn.myMakeTextFit=function(w){
	this.clone().addClass('myMakeTextFitTemp').appendTo('body');
	var myMakeTextFitTemp=$('.myMakeTextFitTemp');
	if(w==undefined)
		w=myMakeTextFitTemp.width();
	if(myMakeTextFitTemp.width()>w){
		while((myMakeTextFitTemp.width()>w)){
			myMakeTextFitTemp.css('font-size',(parseInt(myMakeTextFitTemp.css('font-size').replace('px',''))-1)+'px');	
			if((parseInt(myMakeTextFitTemp.css('font-size').replace('px','')))<=12){
				this.css('font-size','12px');
				myMakeTextFitTemp.remove();
				return 12;			
			}
		}
	}
	else if(myMakeTextFitTemp.width()<w){
		while((myMakeTextFitTemp.width()<w)){
			myMakeTextFitTemp.css('font-size',(parseInt(myMakeTextFitTemp.css('font-size').replace('px',''))+1)+'px');
		}
	}
	this.css('font-size',myMakeTextFitTemp.css('font-size'));
	myMakeTextFitTemp.remove();
	return parseFloat(this.css('font-size').replace('px',''));
}


//偵測日期是否合理
function isValidDate(d) {
	if ( Object.prototype.toString.call(d) !== "[object Date]" )
		return false;
	return !isNaN(d.getTime());
}


//建立資料類別:
function levelClass(levelName){
	this.name=levelName;
	this.group=new Array;
	var parentObject=this;
	this.addTeamToGroup=function(groupName,team){
		if(parentObject.group[groupName]==undefined)
			parentObject.group[groupName]=new groupClass();
		parentObject.group[groupName].addTeam(team);
	}
}
function groupClass(){
	this.win=new Array;
	this.lose=new Array;
	this.team=new Array;
	var parentObject=this;
	this.addTeam=function(team){
		parentObject.team.push(team);
	}
}
function teamClass(sname,fullName){
	this.shortName=sname;
	this.name=fullName;
	this.status=new Array;
	this.gamePlayed=new Array();
}

function matchClass(matchTime,matchTeam,matchLevel,matchGroup){
	matchClass.NofMatch++;
	this.matchN=matchClass.NofMatch;
	this.time=matchTime;
	this.team=matchTeam;
	this.level=matchLevel;
	this.group=matchGroup;
	this.result='';
	for(var key in this.team){
		team[this.team[key]].gamePlayed.push(NofMatch);
	}
}
matchClass.NofMatch=0;

//初始化資料:
var contestLevel;
var team;
var match;

//從total_team.html蒐集隊伍列表:
function loadTeamList(){
	team=new Array;
	console.log('開始蒐集隊伍列表');
	$('.total_team_data').each(function(){
		if(team[$(this).find('td').eq(1).text().toLowerCase()]==undefined){
			team[$(this).find('td').eq(1).text().toLowerCase()]=new teamClass($(this).find('td').eq(1).text(),$(this).find('td').eq(0).text());
		}
		else{
			console.log('隊伍'+$(this).find('td').eq(1).text().toLowerCase()+"已經被建立！");
		}
	});
	if(team==undefined){
		alert("loadTeamList failed!");	
	}
	var teamCounter=0;
	for(teamCounter_i in team){
		teamCounter++;
	}
	console.log('隊伍蒐集完成，共有'+teamCounter+'隊，隊伍列表:');
	console.log(team);
}

//從wiki賽程葉面蒐集資料:
function loadContestFromWiki(data){
	console.log('開始蒐集比賽場次和賽程分級分組狀態');

	function errorReport(Pthis,tableCounter,index){
		return 'wiki中的第'+(tableCounter)+'個表格，表格中的第'+(index+1)+'行:'+$(Pthis).html().replace(/\n/g,'')+'\n問題:';
	}
	data=$(data);
	data.find('.editsection').each(function(){
		$(this).remove();
	});

	contestLevel=new Array;
	match=new Array;
	matchClass.NofMatch=0;
	NofMatch=0;
	
	var tableCounter=-1;
	var level=-1;
	var scanner="";
	var temp=new Array;
	data.find('#mw-content-text').children().each(function(){
		if($(this).is('h2')){
			level++;
			contestLevel[level]=new levelClass($(this).text().replace(/ /g,''));
		}
		if($(this).is('h3')){
			scanner=$(this).find('span').text();
		}
		//console.log(scanner.search('隊伍')>=0);
		//console.log(scanner);
		if($(this).is('table')){
			tableCounter++;
			if(scanner.search('隊伍')>=0){

				if(($(this).find('tbody').children().eq(0).children().eq(0).text().search('組別')<0)||($(this).find('tbody').children().eq(0).children().eq(1).text().search('比賽隊伍')<0)){
					console.log('隊伍表格格式錯誤！');
					return;
				}

				$(this).find('tbody').children().each(function(index){
					
					var tempGroup;
					if(index>0){
						tempGroup=$(this).children().eq(0).text().replace(/ /g,'').toUpperCase();

						if(tempGroup.length!=1){
							console.log(errorReport(this,tableCounter,index)+'隊伍表格內有錯誤的組別:'+tempGroup);
							return;
						}

						temp=$(this).children().eq(1).text().split('／');
						for(var i=0;i<temp.length;i++){
							temp[i]=temp[i].replace(/ /g,'').toLowerCase();
							if(team[temp[i]]==undefined){
								if(temp[i]!='')
									console.log(errorReport(this,tableCounter,index)+"找不到"+temp[i]+"這個隊伍");
							}
							else{
								team[temp[i]].status[level]=tempGroup;
								contestLevel[level].addTeamToGroup(tempGroup,temp[i]);
							}
						}
						temp=$(this).children().eq(2).text().split('／');
						for(var i=0;i<temp.length;i++){
							temp[i]=temp[i].replace(/\W/g,'').toLowerCase();
							if(team[temp[i]]==undefined){
								if(temp[i]!='')
									console.log(errorReport(this,tableCounter,index)+"找不到"+temp[i]+"這個隊伍");
							}
							else{
								team[temp[i]].status[level]+='+';
								contestLevel[level].group[tempGroup].win.push(temp[i]);
							}
						}
						/*確定淘汰:
						temp=$(this).children().eq(3).text().split('／');
						for(var i=0;i<temp.length;i++){
							temp[i]=temp[i].replace(/\W/g,'').toLowerCase();
							if(team[temp[i]]==undefined){
								if(temp[i]!='')
									console.log(errorReport(this,tableCounter,index)+"找不到"+temp[i]+"這個隊伍");
							}
							else{
								team[temp[i]].status[level]+='-';
								contestLevel[level].group[tempGroup].lose.push(temp[i]);
							}
						}
						*/
					}
				});
				
			}
			
			if(scanner.search('比賽場次')>=0){
				var temp=new Array('','');
				var tempGroup;
				var tempDate;
				var tempDateUntil=1;
				var timeClassTest=new Date();
				var tempTime;
				var tempTimeUntil=1;
				var j;

				if(($(this).find('tbody').children().eq(0).children().eq(0).text().search('日期')<0)||($(this).find('tbody').children().eq(0).children().eq(1).text().search('時間')<0)||($(this).find('tbody').children().eq(0).children().eq(2).text().search('組別')<0)||($(this).find('tbody').children().eq(0).children().eq(3).text().search('隊伍')<0)){
					console.log(errorReport(this,wikiEle_i,index)+'比賽場次表格格式錯誤！');
					return;
				}

				$(this).find('tbody').children().each(function(index){
					if(index>0){
						//console.log('index='+index+' tempDateUntil='+tempDateUntil+' tempTimeUntil='+tempTimeUntil);
						//console.log('this.html='+$(this).html());
						j=0;
						if(index>=tempDateUntil){
							if($(this).children().eq(j).attr('rowspan')==undefined){
								tempDateUntil+=1;
							}
							else{
								tempDateUntil+=(parseInt($(this).children().eq(j).attr('rowspan')));
							}
							tempDate=$(this).children().eq(j).text();
							j++;
						}
						if(index>=tempTimeUntil){
							if($(this).children().eq(j).attr('rowspan')==undefined){
								tempTimeUntil+=1;
							}
							else{
								tempTimeUntil+=(parseInt($(this).children().eq(j).attr('rowspan')));
							}
							tempTime=$(this).children().eq(j).text();
							j++;
						}
						temp=$(this).children().eq(j+1).text().split('vs');
						if(temp.length==2){	
							for(var i=0;i<2;i++){
								temp[i]=temp[i].replace(/\W/g,'').toLowerCase();
								if(team[temp[i]]==undefined){
									console.log(errorReport(this,tableCounter,index)+"找不到"+temp[i]+"這個隊伍");
									temp[0]='';
								}
							}
						
							if((temp[0]!='')){
								timeClassTest=new Date("2013/"+tempDate+' '+tempTime);
								
								if(!isValidDate(timeClassTest)){
									console.log(errorReport(this,tableCounter,index)+'不是合理的時間:'+tempDate+' '+tempTime);
									return;
								}

								tempGroup=$(this).children().eq(j).text().replace(/\W/g,'').toUpperCase();
								/*
								if(tempGroup.length!=1){
									console.log(errorReport(this,tableCounter,index)+'比賽場次內有錯誤的組別:'+tempGroup);
									return;
								}
								*/
								match[NofMatch]=new matchClass(timeClassTest,temp,level,tempGroup);
								match[NofMatch].result=$(this).children().eq(j+2).text();
								NofMatch++;
							}
						}
						else{
							if($(this).children().eq(j+1).text().replace(/\W/g,'').length!=0){
								console.log(errorReport(this,tableCounter,index)+'錯誤的對戰隊伍:'+$(this).children().eq(j+1).text());
							}
							return;
						}
					}
				});
			}
		}
	});
	console.log('比賽場次和賽程分級分組狀態蒐集完成，共有'+match.length+'場比賽');
	console.log('比賽場次:');
	console.log(match);
	console.log('分組情況:');
	console.log(contestLevel);
}


//動態標題:
var NotificationTimer;
var NotificationN;
var NotificationText;
function setNotification(id){
	NotificationText=$('#'+id).html().split('<br>');
	$('#'+id).empty();
		$('#'+id).append('<span>'+NotificationText[0]+'</span>');
	NotificationN=1;
	if(NotificationTimer!=undefined){
		window.clearInterval(NotificationTimer);
	}
	NotificationTimer=setInterval(function(){
		$('#'+id).find('span').animate({'opacity':'0'},function(){
			if(NotificationN>=NotificationText.length)
				NotificationN=0;
			$('#'+id).find('span').text(NotificationText[NotificationN]).animate({'opacity':'1'});
			NotificationN++;
		})
	}, 5000);
}

//原始賽程圖(放大觀看):
function showContestTableImg(showContestTableImgCompleted){
	$('#popContent').empty();
	$('#popContent').append('<h1 id="contestHeader">賽程表<br>按下右上角的X回到賽程表頁面可觀看說明</h1>');
	makeHeader('contestHeader');
	setNotification('contestHeader');
	var contestTableImg=$('<img id="contestTableImg" style="height:500px" />').attr('src',contestTableImgURL).load(function(){
		$('#popContent').append(contestTableImg);
		$('#contestTableImg')
			.wrap('<span id="contestTableWrap" style="display:inline-block;left:248px"></span>')
				.css('display', 'block')
				.parent()
			.zoom();
		$('#contestTableWrap').hover(function(){
			$('#contestTableWrap').css('overflow','visible');
		});
		showContestTableImgCompleted();
	});
}

function dataCheck(functionName){
	var keyCheck;
	if(functionName===undefined){
		console.log('dataCheck Error:functionName undefined!');
		return false;
	}
	if(levelPosition==undefined){
		console.log(functionName+' Error:levelPosition undefined!');
		return false;
	}
	else{
		for(keyCheck in levelPosition){
			//console.log('dataChecking...');
			//console.log(levelPosition[keyCheck].constructor);
			//console.log(levelPositionClass);
			//console.log('levelPosition[keyCheck].constructor==levelPositionClass :'+(levelPosition[keyCheck].constructor==levelPositionClass));
			
			if(levelPosition[keyCheck].constructor!=levelPositionClass){
				console.log(functionName+' Error:wrong levelPosition:');
				console.log(levelPosition[keyCheck]);
				return false;
			}
		}
	}
	for(var keyCheck1=0;keyCheck1<=keyCheck;keyCheck1++){
		if(contestLevel[keyCheck1]==undefined){
			console.log(functionName+' warning:contestLevel['+keyCheck1+']==undefined,set its name to 比賽');
			contestLevel[keyCheck1]=new levelClass('比賽');
		}
	}
	if(team==undefined)
		return false;
	if(match==undefined)
		return false;
	return true;
}

//把隊伍放到圓形賽程表上:
function initTeamOnTable(){
	if(!dataCheck('initTeamOnTable'))
		return;

	var levelTemp;
	var teamBackArrayTemp;
	var teamBackTemp;
	var groupTemp;
	var groupArrayTemp;
	var totalTemp;
	for(var i in levelPosition){						
		groupArrayTemp=new Array;
		for(var j=0;j<levelPosition[i].NofGroup;j++){
			
			teamBackArrayTemp=new Array;
			for(var k=0;k<levelPosition[i].NofTeam;k++){
				teamBackTemp=$('<div id="'+i+'_'+String.fromCharCode(65+j)+'_'+k+'" class="aTeamBack"></div>');
				teamBackTemp.css({
					//'width':'2px',
					//'height':'2px',
					//'background-color':'green'
				});
				
				teamBackArrayTemp.push(teamBackTemp);
			}
			groupTemp=$('<div id="'+i+'_'+String.fromCharCode(65+j)+'" class="aGroupBack"></div>');
			groupTemp.css({
				//'width':'2px',
				//'height':'2px',
				//'background-color':'blue'
			});
			groupTemp.myCircle(teamBackArrayTemp,levelPosition[i].groupRadius*contestTableBackRes,false,levelPosition[i].teamStartDegree);
			groupArrayTemp.push(groupTemp);
		}
		levelTemp=$('<div id="'+i+'" class="aLevelBack"></div>').css({
			'position':'absolute',
			'top':'50%',
			'left':'50%',
			'width':'2px',
			'height':'2px'
		});
		levelTemp.myCircle(groupArrayTemp,levelPosition[i].levelRadius*contestTableBackRes,true,levelPosition[i].startDegree);
		$('#'+contestTableBackWrapId).append(levelTemp);
	}
	
	var textTemp;
	var teamTemp;
	var level;
	var theLevel;
	var NofGroup;
	var theGroup;
	var wrapping;
	var NofTeamInGroup;
	var theTeamInGroup;
	var teamBackTemp;
	if(contestLevel==undefined){
		alert('資料有誤，請聯絡管理員！');
		return;
	}
	else{
		var level=0;
		for(var key0 in contestLevel){
			theLevel=contestLevel[key0];
			NofGroup=0;
			for(var key1 in theLevel.group){
				theGroup=theLevel.group[key1];

				NofTeamInGroup=0;
				for(var key2 in theGroup.team){
					theTeamInGroup=theGroup.team[key2];
					
					//console.log(theTeamInGroup+" Group="+String.fromCharCode(NofGroup+65));

					if(theLevel.name=="準決賽"){
						$('.'+theTeamInGroup).each(function(){
							$(this).addClass('semiFinal');
						});
						$('.'+theGroup.win[0]).addClass('semiFinalWinner');
					}
					else if(theLevel.name=="總決賽"){
						$('.'+theTeamInGroup).each(function(){
							$(this).addClass('Final');
						});
						$('.'+theGroup.win[0]).addClass('FinalWinner');
					}
					else{
						teamTemp=$('<div class="aTeam '+theTeamInGroup+'" id="aTeamAt_'+key0+'_'+key1+'_'+key2+'"></div>');
						//teamTemp.addClass(level+'_'+String.fromCharCode(NofGroup+65)+'_'+NofTeamInGroup);
						teamTemp.css({
							'height':'1px',
							'width':'1px',
							'top':'0%',
							'left':'0%',
							'position':'absolute'
						});

						textTemp=$('<span class="aTeamShortName" id="'+theTeamInGroup+'_shortName">'+team[theTeamInGroup].shortName+'</span>');
						
						textTemp.css({
							'position':'absolute',
							'left':'-30px',
							'top':-textTemp.myMakeTextFit(60)/2+'px'
						});
						if(theGroup.win.length!=0){
							for(win_i in theGroup.win){
								if(theGroup.win[win_i].toLowerCase()==(theTeamInGroup)){
									textTemp.addClass('winner');
								}
							}
						}

						if(theGroup.lose.length!=0){
							for(lose_i in theGroup.lose){
								if(theGroup.lose[lose_i].toLowerCase()==theTeamInGroup){
									textTemp.addClass('loser');
								}
							}
						}

						teamTemp.append(textTemp);
						teamTemp=teamTemp.myCenterPosition();
						$('#'+contestTableId).append(teamTemp);
						NofTeamInGroup++;
					}
				}
				NofGroup++;
			}
			level++;
		}
	}
}

//更新隊伍位置:
function teamPosition(doOnAll){
	var teamPositionTemp;
	if(doOnAll==undefined){
		console.log('doOnAll undefined');
		doOnAll=false;
	}
	$('.aTeam').each(function(){
		teamPositionTemp=$('#'+$(this).attr('id').replace('aTeamAt_','').replace(/ /g,''));
		//console.log(teamPositionTemp.offset().top);
		//console.log($(window).height()+30);
		if((teamPositionTemp.offset().top<($(window).height()+70))&&(teamPositionTemp.offset().left>-50)||(doOnAll)){
			$(this).offset(teamPositionTemp.offset());
		}
	});	
}

//切換layout時，產生賽程圖表的位置:
function contestTableCSSGen(focus){
	if(focus==undefined){
		console.log('contestTableCSSGen no parameter!');
	}
	if(focus){//若滑鼠移到賽程圖表上時
		if($(window).width()>=1180){
			//螢幕寬度大於1366px的顯示方法
			return {
				'left':($(window).width()-1720)+'px',
				'bottom':'-500px'
			};
		}
		else{
			//螢幕寬度小於1366px的顯示方法
			return {
				'left':'-500px',
				'bottom':'-500px'
			};
		}
	}
	else{
		//一般狀態
		return {
			'left':'-640px',
			'bottom':'-640px'
		};
	}
}

//切換layout時，產生賽程資訊的大小和位置(針對不同螢幕有不同輸出方法):
function contestInfoCSSGen(focus){
	if(focus==undefined){
		console.log('contestInfoCSSGen no parameter!');
	}
	if(focus){//若滑鼠移到賽程圖表上時
		if($(window).width()>=1100){
			//螢幕寬度大於1100px的顯示方法
			return {
				'top':'60px',
				'width':'350px',
				'bottom':($(window).height()*0.05)+'px'
			};
		}
		else{
			//螢幕寬度小於1100px的顯示方法
			return {
				'top':'60px',
				'width':($(window).width()-660)+'px',
				'bottom':($(window).height()*0.5)+'px'
			};
		}
	}
	else{
		//一般狀態
		return {
			'top':'60px',
			'right':'20px',
			'width':(900)+'px',
			'bottom':'0px'
		};
	}
}

//標題(根據螢幕長度更改):
function contestHeaderCSSGen(){
		if($(window).width()>=1366){
			return {
				'left':($(window).width()*0.5-683)+'px',
				'width':'1366px',
				'top':'3px'
			};
		}
		else{
			return {
				'top':'3px',
				'width':$(window).width()+'px',
				'left':'0px'
			};
		}
}

//使物件符合視窗大小:
function makeItFit(){
	if((contestTableId==undefined)||(contestHeaderId==undefined)||(contestInfoWrapId==undefined)){
		console.log('makeItFit Failed!');
		return;
	}
	
	//$('#'+contestHeaderId).parent().css(contestHeaderCSSGen());
	$('#'+contestTableId).css(contestTableCSSGen(false));
	$('#'+contestInfoWrapId).css(contestInfoCSSGen(false));
	 
}

//設定滾輪事件:
var contestTableDegree=0;
var contestTableDegreeNow=0;
var contestTableRotationActivated=false;
var contestTableRotationActivate;
function contestTableRotation(toDisable){
	//console.log(toDisable);
	contestTableRotationActivate=function(event){
		var delta = 0;
		if (!event) event = window.event;
		// normalize the delta
		if (event.wheelDelta) {
		// IE and Opera
			delta = event.wheelDelta / 60;
		}
		else if(event.detail){
		// W3C
			delta = -event.detail / 2;
		}

		if(((contestTableDegree-contestTableDegreeNow)>10)||((contestTableDegree-contestTableDegreeNow)<-10))
			contestTableDegree=contestTableDegreeNow;
		if(delta>0)
			contestTableDegree-=9;
		else if(delta<0)
			contestTableDegree+=9;

		if(contestTableRotation.contestTableRotating==undefined){
			//console.log('contestTableRotating init');
			$('.groupText').each(function(){
				$(this).addClass('groupTextWrapShowGroupText');
			});
			contestTableRotation.contestTableRotating=setInterval(function(){
				//console.log(contestTableRotating);
				if(contestTableDegree>contestTableDegreeNow){
					contestTableDegreeNow+=3;
					$('#'+contestTableBackWrapId).rotate(contestTableDegreeNow);
					teamPosition(false);
				}
				else if(contestTableDegree<contestTableDegreeNow){
					contestTableDegreeNow-=3;
					$('#'+contestTableBackWrapId).rotate(contestTableDegreeNow);
					teamPosition(false);
				}
				else{
					clearInterval(contestTableRotation.contestTableRotating);
					contestTableRotation.contestTableRotating=undefined;
					$('.groupTextWrapShowGroupText').each(function(){
						$(this).removeClass('groupTextWrapShowGroupText');
					});
				}
				//console.log('rotate!');
			},100);
		}
	}

	if(toDisable==undefined){
		console.log('contestTableRotation warning:toDisable undefined');
		toDisable=true;
	}

	if(toDisable){
		//removing the event listerner for Mozilla,but no use and don't know why
		if(window.addEventListener){
			window.removeEventListener('DOMMouseScroll', contestTableRotationActivate, false);
			if((window.onmousewheel==null)&&(document.onmousewheel==null))
				contestTableRotationActivated=false;
		}
		//for IE,chrome,OPERA...etc
		window.onmousewheel=document.onmousewheel=null;

		clearInterval(contestTableRotation.contestTableRotating);

		contestTableRotation.contestTableRotating=undefined;
		contestTableDegree=contestTableDegreeNow;
		$('.groupTextWrapShowGroupText').each(function(){
			$(this).removeClass('groupTextWrapShowGroupText');
		});
	}
	else{				
		//adding the event listerner for Mozilla
		if(window.addEventListener&&(!contestTableRotationActivated)){
			window.addEventListener('DOMMouseScroll', contestTableRotationActivate, false);
			contestTableRotationActivated=true;
		}
		//for IE,chrome,OPERA...etc
		window.onmousewheel=document.onmousewheel=contestTableRotationActivate;
		
		clearInterval(contestTableRotation.contestTableRotating);
		contestTableRotation.contestTableRotating=undefined;
		$('.groupTextWrapShowGroupText').each(function(){
			$(this).removeClass('groupTextWrapShowGroupText');
		});
	}

}


//賽程資訊顯示隊伍資訊:
function contestInfoShowTeam(teamName){
	if(!dataCheck('contestInfoShowTeam'))
		return;
	//console.log('contestInfoShowTeam');
	if(teamName==undefined){
		console.log('contestInfoShowTeam failed: teamName==undefined');
		return;
	}

	$('#'+teamInfoId).empty();
	var contestInfoShowTeamTemp=$('<tbody id="teamInfoBody"></tbody>');
	contestInfoShowTeamTemp.append('<tr class="teamInfoNameH"><td>隊伍全名：</td></tr>');
	contestInfoShowTeamTextTemp=$('<tr class="teamInfoName"><td>'+team[teamName.toLowerCase()].name+'</td></tr>');
	contestInfoShowTeamTextTemp.myMakeTextFit(320);
	contestInfoShowTeamTemp.append(contestInfoShowTeamTextTemp);
	contestInfoShowTeamTemp.append('<tr class="teamInfoSNameH"><td>隊伍簡稱：</td></tr>');
	
	contestInfoShowTeamTemp.append('<tr class="teamInfoSName"><td>'+team[teamName.toLowerCase()].shortName+'</td></tr>');
	contestInfoShowTeamTemp.append('<tr class="teamInfoHL_GH"><td>級別/組別：</td></tr>');
	for(contestInfo_i in team[teamName.toLowerCase()].status){
		contestInfoShowTeamTemp.append('<tr class="teamInfoL_G"><td>'+contestLevel[contestInfo_i].name+team[teamName.toLowerCase()].status[contestInfo_i].replace('+','').replace('-','')+'組</td></tr>');
	}
	$('#'+teamInfoId).append(contestInfoShowTeamTemp);
}

//賽程資訊顯示場次:
$.fn.contestInfoShowMatch=function(filter){
	//console.log('contestInfoShowMatch called!');
	if(!dataCheck('contestInfoShowMatch'))
		return;
	
	if(filter==undefined){
		var filter='';
		console.log('contestInfoShowMatch warning:filter undefined');
	}

	$(this).empty();

	var contestInfoShowMatchTemp;
	var contestInfoShowMatchEle;
	var contestInfoShowMatchTotal;
	
	contestInfoShowMatchTotal=$('<tbody></tbody>');
	
	
	for(contestInfoShowAllMatch_i in match){
		contestInfoShowMatchEle=match[contestInfoShowAllMatch_i];
		contestInfoShowMatchTemp=$('<tr></tr>');
		contestInfoShowMatchTemp.append('<td class="matchN">#'+(contestInfoShowMatchEle.matchN)+'</td>');
		contestInfoShowMatchTemp.append('<td class="matchTeam">'+team[contestInfoShowMatchEle.team[0]].name+'(<a class="contestInfoSearch">'+team[contestInfoShowMatchEle.team[0]].shortName+'</a>) vs '+team[contestInfoShowMatchEle.team[1]].name+'(<a class="contestInfoSearch">'+team[contestInfoShowMatchEle.team[1]].shortName+'</a>)</td>');
		contestInfoShowMatchTemp.append('<td class="matchTime">'+((contestInfoShowMatchEle.time.getMonth()+1)/10).toFixed(1).replace('.','')+'/'+(contestInfoShowMatchEle.time.getDate()/10).toFixed(1).replace('.','')+' '+(contestInfoShowMatchEle.time.getHours()/10).toFixed(1).replace('.','')+':'+(contestInfoShowMatchEle.time.getMinutes()/10).toFixed(1).replace('.','')+'</td>');
		contestInfoShowMatchTemp.append('<td class="matchLevel" level="'+contestInfoShowMatchEle.level+'"><a class="contestInfoSearch">'+contestLevel[contestInfoShowMatchEle.level].name+'</a></td>');
		contestInfoShowMatchTemp.append('<td class="matchGroup"><a class="contestInfoSearch">'+contestLevel[contestInfoShowMatchEle.level].name+contestInfoShowMatchEle.group+'組</a></td>');
		contestInfoShowMatchTemp.append('<td class="matchResult">'+contestInfoShowMatchEle.result+'</td>');

		if((contestInfoShowMatchTemp.html().search(filter))>=0){
			contestInfoShowMatchTotal.prepend(contestInfoShowMatchTemp);	
		}
		 
	}

	contestInfoShowMatchTotal.prepend('<tr><td>場次</td><td>隊伍</td><td>比賽時間</td><td>級別</td><td>組別</td><td>勝方</td></tr>');

	$(this).append(contestInfoShowMatchTotal);


	var contestInfoShowMatchTempId=$(this).attr('id');
	$('.contestInfoSearch').click(function(){
		$('#'+contestInfoShowMatchTempId).contestInfoShowMatch($(this).text());
		$('.nano').nanoScroller();
	}).hover(function(){
		$(this).addClass('contestInfoSearchHovered');
	},function(){
		$(this).removeClass('contestInfoSearchHovered');
	});
}

function contestShowGroup(){
	if(!dataCheck('contestInfoShowTeam'))
		return;
	if(contestTableBackWrapId==undefined){
		console.log('contestShowGroup warning: contestTableBackWrapId==undefined');
		contestTableBackWrapId='contestTableBackWrap';
	}
	if(contestTableId==undefined){
		console.log('contestShowGroup warning: contestTableId==undefined');
		contestTableId='contestTable';
	}

	var contestShowGroupTemp;
	$('#'+contestTableBackWrapId+' .aGroupBack').each(function(){
		contestShowGroupTemp=$('<span class="groupText">'+contestLevel[$(this).attr('id').split('_')[0]].name+$(this).attr('id').split('_')[1]+'組</span>');
		contestShowGroupTemp.myMakeTextFit(70);
		contestShowGroupTemp=contestShowGroupTemp.myCenterPosition();

		//console.log(contestShowGroupTemp);
		$(this).append(contestShowGroupTemp);
	});

	$('#'+contestTableId+' .aTeamShortName').each(function(){
		//可能是父元素已經是fixed的原因，z-index完全沒有作用
		//$(this).css('z-index','99');
		contestShowGroupTemp=$('<span class="whatGroupTheTeamIn">'+contestLevel[$(this).parent().attr('id').replace('aTeamAt_','').split('_')[0]].name+$(this).parent().attr('id').replace('aTeamAt_','').split('_')[1]+'組</span>');
		contestShowGroupTemp.myMakeTextFit(60);
		contestShowGroupTemp.css({
			'width':'80px',
			//'z-index':'9',
		});
		$(this).append(contestShowGroupTemp);
	});
}

//說明資料
function contestTableIntro(contestTableIntroStarting,contestTableIntroCompleted){
	if(contestTableIntroStarting==undefined){
		console.log('contestTableIntro warning:contestTableIntroStarting undefined');
		contestTableIntroStarting=function(){};
	}
	if(contestTableIntroCompleted==undefined){
		console.log('contestTableIntro warning:contestTableIntroCompleted undefined');
		contestTableIntroCompleted=function(){};
	}
	if(contestHeaderId==undefined)
		contestHeaderId="contestHeader";
	if(contestTableId==undefined)
		contestTableId="contestTable";
	if(contestInfoWrapId==undefined)
		contestInfoWrapId="contestInfoWrap";
	if(matchInfoId==undefined)
		matchInfoId="matchInfo";

	var contestTableIntroTemp=$('#'+contestHeaderId);
	contestTableIntroTemp.attr('data-intro','歡迎使用賽程表功能，按next了解如何使用此功能，或者按skip跳過教學。<br>*建議使用最新版Chrome以獲得最佳體驗。');
	contestTableIntroTemp.attr('data-step','1');
	contestTableIntroTemp.attr('data-position','bottom');


	contestTableIntroTemp=$('<img class="docImg" src="/besg/data/images/Doc0.gif"/>').load(function(){
		contestTableIntroTemp.css({
			'position':'absolute',
			'top':'30%',
			'left':'40%',
		});
		contestTableIntroTemp.attr('data-intro','原本賽程圖在左下角，滑鼠移動到賽程圖上後將移動到螢幕中間');
		contestTableIntroTemp.attr('data-step','2');
		contestTableIntroTemp.attr('data-position','bottom');
		$('body').prepend(contestTableIntroTemp);
		contestTableIntroTemp=$('<img class="docImg" src="/besg/data/images/Doc1.gif"/>').load(function(){
			contestTableIntroTemp.css({
				'position':'absolute',
				'top':'30%',
				'left':'60%',
			});
			contestTableIntroTemp.attr('data-intro','游標在賽程圖上時使用滑鼠滾輪轉動賽程圖');
			contestTableIntroTemp.attr('data-step','3');
			contestTableIntroTemp.attr('data-position','bottom');
			$('body').prepend(contestTableIntroTemp);
			contestTableIntroTemp=$('<img class="docImg" src="/besg/data/images/Doc2.gif"/>').load(function(){
				contestTableIntroTemp.css({
					'position':'absolute',
					'top':'30%',
					'right':'60%',
				});
				contestTableIntroTemp.attr('data-intro','點選賽程表上的隊伍以及比賽場次上的黃色按鈕可以觀看相關的比賽');
				contestTableIntroTemp.attr('data-step','4');
				contestTableIntroTemp.attr('data-position','bottom');
				$('body').prepend(contestTableIntroTemp);

				if($('#contestDocImg').is('img')){
					contestTableIntroTemp=$('#contestDocImg').clone();
					contestTableIntroTemp=contestTableIntroTemp.css({
						'width':'auto',
					}).myCenterPosition().addClass('docImg');
					contestTableIntroTemp.css({
						'position':'absolute',
						'top':'40%',
						'left':'50%',
					});
					contestTableIntroTemp.attr('data-intro','<p style="width:'+(contestTableIntroTemp.width()-10)+'px">賽程圖之晉級規則如上方所示</p>');
					contestTableIntroTemp.attr('data-step','5');
					contestTableIntroTemp.attr('data-position','bottom');
					contestTableIntroTemp.prependTo('body');
				}
				
				contestTableIntroStarting();
				introJs().start().onexit(function(){
					$('.docImg').each(function(){
						$(this).remove();
					})
					contestTableIntroCompleted();
				});
			});
		});
	});
}

//將重點轉到賽程圖
function toContestTable(){
	//console.log('toContestTable');

	$('#'+contestTableId).unbind('mouseenter');

	$('#'+contestTableId).clearQueue().animate(contestTableCSSGen(true));
	$('#'+contestInfoWrapId).clearQueue().animate(contestInfoCSSGen(true));
	$('#'+contestInfoId).clearQueue().animate({'opacity':'0'},'fast',function(){
		$('#'+matchInfoId).hide();
		$('#'+teamInfoId).show();
		$('#'+contestInfoId).clearQueue().animate({'opacity':'1'},'fast',function(){
			$('.nano').nanoScroller();	
			$('#'+contestInfoWrapId).bind('mouseenter',toNormal);
			contestTableRotation(false);
			$('.aTeamShortName').bind('mouseenter',function(){
				contestInfoShowTeam(team[$(this).attr('id').replace('_shortName','')].shortName);
			});
			$('.aTeamShortName').bind('click',function(){
				$('#'+matchInfoId).contestInfoShowMatch(team[$(this).attr('id').replace('_shortName','')].shortName);
				toNormal();
			});
			teamPosition(true);
		});
	});
}

//將重點轉到賽程資訊
function toNormal(){
	//console.log('toNormal');
	contestTableRotation(contestTableBackWrapId,true);
	$('#'+contestInfoWrapId).unbind('mouseenter');
	$('.aTeamShortName').unbind('mouseenter click');
	//teamHoverDisable();

	$('#'+contestTableId).clearQueue().animate(contestTableCSSGen(false));
	$('#'+contestInfoWrapId).clearQueue().animate(contestInfoCSSGen(false));

	$('#'+contestInfoId).clearQueue().animate({'opacity':'0'},'fast',function(){
			$('#'+matchInfoId).show();
			$('#'+teamInfoId).hide();
			$('#'+contestInfoId).clearQueue().animate({'opacity':'1'},'fast',function(){
				$('.nano').nanoScroller();
				$('#'+contestTableId).bind('mouseenter',toContestTable);
			});
		});
}


//顯示賽程表(旋轉版本):
$.fn.showContestTable=function(initContestTablecomplete){
	
	$(this).empty();
	var parentThis=$(this);
	var contestTableBack=$('<img id="contestTableBack" style="width:1280px;">').attr('src',contestTableBackURL).load(function(){

		parentThis.parent().css('opacity','0').show();

		//賽程表底圖和包裝:
		parentThis.append(contestTableBack);
		$('#contestTableBack').wrap('<div id="contestTable" style="position:fixed;"></div>').wrap('<div id="contestTableBackWrap"></div>');

		//賽程資訊:
		parentThis.append('<div id="contestInfoWrap"><div id="about" class="nano"><div id="contestInfo" class="content"></div></div></div>');
		$('#contestInfoWrap').css({
			'background':'url(/besg/data/images/UI/ui-bg_diagonals-thick_15_000000_40x40.png) 50% 50% repeat',
			'position':'fixed',
			'right':'20px',
			'top':'0px',
			'border-radius':'5px'
		});
		//$('#contestInfo').append('<div id="contestTableDocOnInfo" style="display:none;"></div>');
		$('#contestInfo').append('<table id="teamInfo" style="display:none;"></table>');
		$('#contestInfo').append('<table id="matchInfo"></table>');
		

		//標題和啟用文字切換:
		//parentThis.append('<h1 id="contestHeader">賽程表<br>按下右上角的X回到賽程表頁面可觀看說明<br>賽程表<br>使用滑鼠滾輪轉動賽程圖<br>賽程表<br>點擊賽程圖上的隊伍可觀看相關對戰<br>賽程表<br>按我顯示所有對戰</h1>');
		parentThis.append('<h1 id="contestHeader">賽程表</h1>');
		makeHeader('contestHeader');
		//setNotification('contestHeader');

		contestHeaderId='contestHeader';
		contestTableId='contestTable';
		contestTableBackWrapId='contestTableBackWrap';
		contestInfoWrapId='contestInfoWrap';
		contestInfoId='contestInfo';
		teamInfoId='teamInfo';
		matchInfoId='matchInfo';
		contestTableDegreeNow=0;


		//套上各個物件的位置和大小:
		makeItFit();
		$(window).resize(function(){
			makeItFit();
			introJs().exit();
			toNormal();
		});

		//放上資料以及啟用互動功能:
		initTeamOnTable();
		//teamPosition(true);
		contestShowGroup();
		$('#'+matchInfoId).contestInfoShowMatch('');
		//toNormal();
		parentThis.parent().animate({'opacity':'1'},function(){
			contestTableIntro(function(){
				initContestTablecomplete();
			},function(){
				teamPosition(true);
				toNormal();
			});
		});
	});
}

function loadContestNew(loadContestNewCompleted){
	$.ajax({
		url:contestDataURL,
		cache:false,
		success:function(data){
			loadTeamList();
			loadContestFromWiki(data);
			$('#popContent').showContestTable(function(){
				$('#disabling').fadeOut();
				loadContestNewCompleted();
			});
		},
		error:function(){
			console.log('wiki賽程資料位置:'+contestDataURL+'\n讀取失敗！');
			$('#disabling').fadeOut();
		}
	});
}

