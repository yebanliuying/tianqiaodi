/**
 * 注册
 */
signup_name = '';
signup_email = '';
signup_password = '';

$('#username').blur(function(){
	$("#signup_mian_tips").html('');
	//文本框,清除前后空格
	var text = $.trim($(this).val());
	//提示框
	var tips_box = $('#user_tips');
	//表单验证
	if(text == ''){//如果为空
		tips_box.html('<em class="red">请输入用户名</em>');
		signup_name = ''; //提交判断
	}else if(text.length > 0 && text.length <= 14){
		//ajax请求地址
		var check_url = 'index.php?do=member&ac=signup';
		//ajax发送数据
		var check_data = {username:text};
		//ajax请求用户名
		$.ajax({
			type : 'GET',
			url: check_url,
			data: check_data,
			success: function (return_value){
				if(return_value == 1){
					tips_box.html('<em class="red">哎呀~此用户名给人抢先注册了!</em>');
					signup_name = ''; //提交判断
				}else{
					tips_box.html('<em class="green">恭喜~此用户名还未有人使用</em>');
					signup_name = 'yes';  //提交判断
				}
			}
		})
	}else{
		tips_box.html('<em class="red">用户名长度不能超过14个字符哦！</em>');
		signup_name = ''; //提交判断
	}
})
 
$('#email').blur(function(){
	$("#signup_mian_tips").html('');
	//文本框,清除前后空格
	var text = $.trim($(this).val());
	//提示框
	var tips_box = $('#email_tips');
	//正则
	var reg_email = /[0-9a-z]+@[0-9a-z]+\.[a-z]+$/;
	//表单验证
	if(text == ''){//如果为空
		tips_box.html('<em class="red">请输入邮箱</em>');
		signup_email = ''; //提交判断
		
	}else if(!reg_email.test(text)){//判断格式
		tips_box.html('<em class="red">亲~ 这格式不太对吧...例如：xxx@qq.com </em>');
		signup_email = ''; //提交判断
		
	}else if(text.length > 0 && text.length < 50){
		//ajax请求地址
		var check_url = 'index.php?do=member&ac=signup';
		//ajax发送数据
		var check_data = {email:text};
		//ajax请求用户名
		$.ajax({
			type : 'GET',
			url: check_url,
			data: check_data,
			success: function (return_value){
				if(return_value == 1){
					tips_box.html('<em class="red">此邮箱已被注册!</em>');
					signup_email = ''; //提交判断
				}else{
					tips_box.html('<em class="green">此邮箱可以注册</em>');
					signup_email = 'yes';  //提交判断
				}
			}
		})
	}else{
		tips_box.html('<em class="red">你的邮箱有50个字符？....</em>');
		signup_email = ''; //提交判断
	}
})
$('#password').blur(function(){
	$("#signup_mian_tips").html('');
	//文本框,清除前后空格
	var text = $.trim($(this).val());
	//提示框
	var tips_box = $('#password_tips');
	
	if(text == ''){
		tips_box.html('<em class="red">请输入密码</em>');
		signup_password = '';
	}else if(text.length < 6  || text.length > 16){
		
		tips_box.html('<em class="red">请输入6-16位数字、字母或常用符号，字母区分大小写</em>');
		signup_password = '';
	}else{
		tips_box.html('');
		signup_password = 'yes';
	}
})
//提交表单
function signup_check_info(){
	$("#signup_mian_tips").html('');
	if((signup_name == 'yes') && (signup_email == 'yes') && (signup_password = 'yes')){
		document.getElementById("signup_form").submit();
	}else{
		$("#signup_mian_tips").html('<em class="red">请正确输入用户名，登录邮箱和密码。</em>');
	}
	
}
