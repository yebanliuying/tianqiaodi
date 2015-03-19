<!DOCTYPE html>
<html>
<head>
<title>登录-天桥底-博客</title>
<meta name="Keywords" content="天桥底,博客,轻博客,独立博客,社区">
<meta name="Description" content="天桥底是种随性记录生活的方式，让你能简单通过文字，展示来表现你的风格。">
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8">
</head>
<body>
<?php include 'template/class_header.tpl.php'; ?>
<link rel="stylesheet" type="text/css" href="static/css/member.css">
<div class="center_wrap sign_up_in">
	<h2>登录</h2>
	<form action="#" method="post" id="signin_form">
		<div class="row">
			<span>输入邮箱：</span>
			<input name="useremail" type="txt" id="signin_email">
		</div>
		<p></p>
		<div class="row">
			<span>输入密码：</span>
			<input name="password" type="password" id="signin_pass">
		</div>
		<p></p>
		<input type="button" value="登录" onclick="signin_check();" class="btn_gray">
		<p id="signin_tips"><?php echo $issue;?></p>
	</form>	
</div>


<script src="static/js/jquery-1.11.2.min.js"></script>
<script src="static/js/common.js"></script>
<script src="static/js/signin.js"></script>
<?php include 'template/foot.tpl.php'; ?>
</body>
</html>