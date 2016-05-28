<?php
setcookie("user",$_COOKIE["user"], time()-1); //刪除cookie 時間往回調
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>已登出</title><!--網頁名稱-->
<meta http-equiv="refresh"  content="3;url='../besg'">
</head>
<body>
已登出，3秒後自動跳轉。
</body>
</html>