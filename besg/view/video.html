<head>
<title>video</title>
</head>
<script>
    pageCompleteCustom=function(){
        var videoDataAtWikiURL='/wiki/index.php/學生會:黑天鵝盃全校電競聯賽/精彩畫面';
        var videoURLCheck='http://www.youtube.com/watch?v=';
        var videoChannelURLCheck='http://www.youtube.com/channel/';

        videoDataAtWikiURL='/besg/data/videoData.htm';

        $('a#toWikivideo').button();
        $('a#toWikivideo').attr('href',videoDataAtWikiURL);

        $.ajax({
            url:videoDataAtWikiURL,
            cache:false,
            success:function(data){
                $('#videoAccordion').empty();
                $(data).find('#mw-content-text a.external').each(function(index){
                    var videoTempURL=$(this).attr('href');

                    //console.log(videoTempURL);
                    //console.log(videoURLCheck);
                    //console.log(videoChannelURLCheck);
                    //console.log('!?='+(videoTempURL.replace(videoURLCheck,'')!=videoTempURL));

                    if(videoTempURL.search(videoChannelURLCheck)>=0){
                        $('#toChannel').append($('<a class="toVideoChannel JQBtn" href="'+videoTempURL+'" target="_blank" style="width:100%">'+$(this).text()+'</a>'));
                    }
                    else if(videoTempURL.replace(videoURLCheck,'')!=videoTempURL){
                        $('#videoAccordion').prepend($('<div><iframe height="360" style="width:99%;" src="http://www.youtube.com/embed/'+videoTempURL.replace(videoURLCheck,'')+'" frameborder="0" allowfullscreen></iframe></div>'));
                        $('#videoAccordion').prepend($('<h3>'+$(this).text()+'</h3>'));
                    }
                    else{
                        console.log('Warning:wiki上的連結"'+$(this).text()+'"網址不符合規則：\n'+$(this).attr('href'));
                    }
                });
                
                $('#videoAccordion').accordion({
                    heightStyle: "content",
                    collapsible: true,
                    active:0 //設定一開始展開是第幾個accordion bar,從0出發
                });
                $('.toVideoChannel').button().click(function(){
                    //$( "#videoAccordion" ).accordion("option","active",false);
                    //console.log(parseInt($(this).attr('id').replace('toLiveChannel_','')));
                });

                $('#disabling').fadeOut('fast');
            },
            error:function(){
                console.log('wiki上精彩畫面位置：'+videoDataAtWikiURL+'\n讀取失敗！');
                $('#disabling').fadeOut('fast');
            }
        });
    }
</script>
<body>
	<h1 id="header">
		精彩畫面
    </h1>
    <div id="toChannel">
    </div>
    <div id="videoAccordion">
        <p style="text-align:left">Loading...</p>
        <p style="text-align:right;font-size:12px;">若無法看到內容，請聯絡本活動單位，並可點選下方按鈕前往本活動會誌查看相關資訊</p>
    </div>
    <a id="toWikivideo" class="JQBtn" style="width:100%" target="_blank">前往wiki會誌查看精彩畫面相關資訊</a>
</body>
</html>
