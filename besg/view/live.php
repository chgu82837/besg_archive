<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/besg/data/css/live.css?20130522" />
</head>
<body>
<script type="text/javascript">
	var liveVideoDataAtWikiURL='/wiki/index.php/學生會:黑天鵝盃全校電競聯賽/比賽實況';
	var liveChannelURLCheck='http://zh-tw.twitch.tv/';

	liveVideoDataAtWikiURL='/besg/data/liveData.htm';

	$('a#toWikiLive').button();
	$('#toWikiLive').attr('href',liveVideoDataAtWikiURL);
	pageCompleteCustom=function(){
		$.ajax({
			url:liveVideoDataAtWikiURL,
			cache:false,
			success:function(data){
				$('#liveAccordion').empty();
				$(data).find('#mw-content-text a.external').each(function(index){
					liveVideoTempURL=$(this).attr('href');
					if(liveVideoTempURL.search(liveChannelURLCheck)>=0){
						$('#liveAccordion').append($('<h3>'+$(this).text()+'</h3>'));
						$('#liveAccordion').append($('<div><object type="application/x-shockwave-flash" style="width:100%" height="378" id="live_embed_player_flash" data="http://zh-tw.twitch.tv/widgets/live_embed_player.swf?channel='+$(this).attr('href').replace(liveChannelURLCheck,'')+'" bgcolor="#000000"><param name="allowFullScreen" value="true" /><param name="allowScriptAccess" value="always" /><param name="allowNetworking" value="all" /><param name="movie" value="http://zh-tw.twitch.tv/widgets/live_embed_player.swf" /><param name="flashvars" value="hostname=zh-tw.twitch.tv&channel=besg1&auto_play=true&start_volume=25" /></object><a id="toLiveChannel_'+index+'" class="toLiveChannel" style="width:99%" href="'+$(this).attr('href')+'" target="_blank">'+$(this).text()+'</a></div>'));
						//$('#liveAccordion').append($(''));
					}
					else{
						console.log('"'+$(this).text()+'"按鈕的網址不合法：\n'+$(this).attr('href')+'\n應該要包含以下字串：\n'+liveChannelURLCheck);
					}
				});
				
				$('.toLiveChannel').button().click(function(){
					//$( "#liveAccordion" ).accordion("option","active",false);

					//console.log(parseInt($(this).attr('id').replace('toLiveChannel_','')));
				});
				
				$('#liveAccordion').accordion({
					heightStyle: "content",
					collapsible: true,
					active:0 //設定一開始展開是第幾個accordion bar,從0出發
				});
				$('#disabling').fadeOut('fast');
			},
			error:function(){
				console.log('wiki上比賽轉播位置'+liveVideoDataAtWikiURL+'\n讀取失敗！');
				$('#disabling').fadeOut('fast');
			}
		});

	}
</script>
<h1 id="header">
	比賽實況
</h1>
<div id="liveAccordion">
	<p style="text-align:left">Loading...</p>
	<p style="text-align:right;font-size:12px;">若無法看到內容，請聯絡本活動單位，並可點選下方按鈕前往本活動會誌查看相關資訊</p>
</div>
<a id="toWikiLive" style="width:100%">前往wiki會誌查看實況頻道相關資訊</a>
</body>
</html>
