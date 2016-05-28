<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="/besg/data/js/jquery.zoom-min.js"></script>
<script src="/besg/data/js/intro.js"></script>
<script src="/besg/data/js/jQueryRotateCompressed.2.2.js"></script>
<link rel="stylesheet" type="text/css" href="/besg/data/css/introjs.css?2013051623" />
<link rel="stylesheet" type="text/css" href="/besg/data/css/contest.css?20130605" />
</head>
<body>
<script type="text/javascript">
	//資料以及參考資料---------------------------------------------------------------

	//資料來源在wiki上的位置:
	var contestTableImgURL="/wiki/images/f/f6/%E8%B3%BD%E7%A8%8B%E8%A1%A8.png";
	var contestTableDocURL="/wiki/images/e/ef/ContestDoc.jpg";
	var contestTableBackURL="/wiki/images/f/f2/%E8%B3%BD%E7%A8%8B%E8%A1%A8%E5%BA%95%E5%9C%96.png";
	var contestDataURL="/wiki/index.php/學生會:黑天鵝盃全校電競聯賽/賽程表";
	//用localhost測試時取消註解:
	//
	contestTableImgURL="/besg/data/images/賽程表.png";
	contestTableDocURL="/besg/data/images/ContestDoc.jpg";
	contestTableBackURL="/besg/data/images/賽程表底圖.png";
	contestDataURL="/besg/data/contestData.htm";

	//位置資料(半徑單位為百分比!):
	function levelPositionClass(theLevelRadius,theLevelNofGroup,theGroupRadius,theLevelNofTeamPerGroup,theStartDegree,theTeamStartDegree){
		this.levelRadius=theLevelRadius;
		this.NofGroup=theLevelNofGroup;
		this.groupRadius=theGroupRadius;
		this.NofTeam=theLevelNofTeamPerGroup;
		this.startDegree=theStartDegree;
		this.teamStartDegree=theTeamStartDegree;
		}
	//賽程圖的大小(px*0.01)
	var contestTableBackRes=12.80;
	var levelPosition=new Array(
		new levelPositionClass(44.25,16,2.8437,3,(-3)*Math.PI/16,0),
		new levelPositionClass(34,16,2.76875705416709,2,(-3)*Math.PI/16,-Math.PI/2),
		new levelPositionClass(25.35,8,2.690496149644151,2,-Math.PI/8,-Math.PI/2),
		new levelPositionClass(15.859375,4,6.4453125,2,0,-Math.PI/2),
		new levelPositionClass(4.95,2,5,2,Math.PI/4,-Math.PI/2)
	);
</script>
<script type="text/javascript" src="/besg/data/js/contest.js?20130520" />
<script type="text/javascript">
	pageCompleteCustom=function(){

		$("#contestBoard").accordion({
			heightStyle: "content",
			collapsible: true,
			active:0 //設定一開始展開是第幾個accordion bar,從0出發
		});
		
		var contestDoc=$('<img id="contestDocImg" style="width:100%" />').attr('src',contestTableDocURL).load(function(){
			var theDiv=$('#ContestTableIntro').fadeOut(function(){
				theDiv.empty();
				theDiv.append('<a class="toBeButton" id="ToShowContestTableNew" style="width:50%;">開啟賽程表</a>');
				theDiv.append('<a class="toBeButton" id="ToShowContestTable" style="width:48.5%;">開啟圖片版賽程表</a>');
				theDiv.append('<a class="toBeButton" id="ToShowContestTableNewTest" style="width:99%;display:none;">測試</a>');
				
				theDiv.append(contestDoc);
				$('#contestDocImg')
					.wrap('<span style="display:inline-block;"></span>')
    				.css('display', 'block')
    				.parent()
    				.zoom();

				theDiv.append('<a class="toBeButton" target="_blank" href="/wiki/index.php/學生會:黑天鵝盃全校電競聯賽/賽程表" style="width:100%">前往WIKI觀看比賽場次</a>');
				$(".toBeButton").button();
				$("#ToShowContestTable").click(function(){
					$('#disabling').fadeIn(function(){
						showContestTableImg(function(){
							$('#popWindow').fadeIn(function(){
								$('#disabling').fadeOut();
							});
						});
					});
				});
				$("#ToShowContestTableNew").click(function(){
					$('#disabling').fadeIn(function(){
						contestDataURL="/wiki/index.php/學生會:黑天鵝盃全校電競聯賽/賽程表";
						loadContestNew(function(){});						
					});
				});
				$("#ToShowContestTableNewTest").click(function(){
					$('#disabling').fadeIn(function(){
						contestDataURL="/besg/data/contestData.htm";
						loadContestNew(function(){
							if(contestTableId==undefined)
								contestTableId='contestTable';
							$('#'+contestTableId).addClass('contestTableTestingMode');

						});
					});
				});
				theDiv.fadeIn();
			});
		});

		loadContestNew(function(){
			$('#contestMatch').contestInfoShowMatch('');
		});
	}
</script>
<h1 id="header">
	賽事公告
</h1>
<div id='tempDiv'>
</div>
	<div id="contestBoard">
		<h3>賽程表及說明</h3>
		<div>	
			<div id='ContestTableIntro'>
				<p style="text-align:left; font-size:14px; margin:1em;">
					Loading...
				</p>
				<p style="text-align:right; font-size:14px; margin:1em;">
					若無法顯示，請至<a href='/wiki/index.php/學生會:黑天鵝盃全校電競聯賽/賽程表' target="_blank">賽程表wiki</a>觀看賽程表
				</p>
			</div>
		</div>
		<h3>比賽場次</h3>
		<div>
			<table id="contestMatch"></table>
		</div>
		<h3>隊伍資訊</h3>
		<div>
			<?php
				//include "../view/total_team.php";
				include "../data/total_team_test.php";
			?>
		</div>
	</div>

</body>
</html>
