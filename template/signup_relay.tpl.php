<!DOCTYPE html>
<html>
<head>
<title>正在跳转..天桥底</title>
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8">
</head>
<body>
<?php include 'template/class_header.tpl.php'; ?>
<div class="center_wrap">
	<p id="show_pour"></p>
</div>
<script src="static/js/jquery-1.11.2.min"></script>
<script>
var t = 5;
function pour_min(){
	if(t == 0){
		location="index.php";
	}
	$("#show_pour").html("恭喜，注册成功。<span>" + t + "</span>秒后自动跳转到首页。也可以<a href='index.php'>立刻跳转</a>");
	t--;
}
$(document).ready(function(){
	
	setInterval("pour_min()", 1000);
})
</script>
<?php include 'template/foot.tpl.php'; ?>
<?php include 'template/foot.tpl.php'; ?>
</body>
</html>