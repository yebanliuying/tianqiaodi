/**
* 登录
*/
var reg_email = /[0-9a-z]+@[0-9a-z]+\.[a-z]+$/;
check_email = '';
check_pass = '';

	$('#signin_email').blur(function(){
		if(!val_is($(this))){
			$("#signin_tips").html('<em class="red">邮箱不能为空</em>');
			check_email = '';
		}else if(!reg_email.test($(this).val())){
			$("#signin_tips").html('<em class="red">请正确输入邮箱格式</em>');
			check_email = '';
		}else{
			$("#signin_tips").html('');
			check_email = 'yes';
		}
	})
	
	$('#signin_pass').blur(function(){
		if(!val_is($(this)) || $(this).val().length < 6 || $(this).val().length > 16){
			$("#signin_tips").html('<em class="red">密码为6-16位数字、字母或常用符号</em>');
			check_pass = '';
		}else{
			$("#signin_tips").html('');
			check_pass = 'yes';
		}
	})
	
	function signin_check(){
		var signin_email = $("#signin_email").val() ? true : false;
		var signin_pass = $("#signin_pass").val() ? true : false;
		
		if((signin_email && signin_pass) || ((check_email == 'yes') && (check_pass == 'yes'))){
			document.getElementById('signin_form').submit();
		}else{
			$("#signin_tips").html('<em class="red">请正确输入邮箱和密码。</em>');
		}
	}
