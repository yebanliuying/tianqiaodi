<!DOCTYPE html>
<html>
<head>
<title>注册-天桥底-博客</title>
<meta name="Keywords" content="天桥底,博客,轻博客,独立博客,社区">
<meta name="Description" content="天桥底是种随性记录生活的方式，让你能简单通过文字，展示来表现你的风格。">
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8">
</head>
<body>
<?php include 'template/class_header.tpl.php'; ?>
<link rel="stylesheet" type="text/css" href="static/css/member.css">
<div class="center_wrap sign_up_in">
	<h2>注册</h2>
	<form artion="#" method="post" id="signup_form">
		<div class="row">
			<span>输入用户名：</span>
			<input type="text" name="username" id="username" value=<?php echo $username;?> >
		</div>
		<p id="user_tips"><?php echo $check_tips_name;?></p>
		<div class="row">
			<span>输入邮箱：</span>
			<input type="text" name="email" id="email" value=<?php echo $email;?> >
		</div>
		<p id="email_tips"><?php echo $check_tips_email;?></p>
		<div class="row">
			<span>输入密码：</span>
			<input type="password" name="password" id="password" value=<?php echo $password;?>>
		</div>
		<p id="password_tips"><?php echo $check_tips_pass;?></p>
		<input type="button" value="注册" name="signup_submit" id="signup_submit" onclick="signup_check_info();" class="btn_gray">
		<p id="signup_mian_tips"></p>
	</form>	
</div>

<script src="static/js/jquery-1.11.2.min.js"></script>
<script src="static/js/common.js"></script>
<script src="static/js/signup.js"></script>
<?php include 'template/foot.tpl.php'; ?>
</body>
</html>