<?php
/**
 * 用户控制器
 */
!defined('IN_Q') && exit('Access denied!');

$ac_member = array(
	'signin',
	'signup',
	'signout',
	'article'
);
!in_array($ac, $ac_member) && exit('Module does not exist!');

//查询所有分类
$sql_class_name = "SELECT article_class_name FROM article_class";
$class_val = $db_tqd->fetchAll($sql_class_name);

//查询用户名
if ($_COOKIE['user_signin']) {
	$user_id = $_COOKIE['user_signin'];
	//单条用户信息
	$user_query_all = $db_tqd->getOne("SELECT * FROM member_user WHERE member_user_id='$user_id'");
	$user_query = $user_query_all['user_name'];
}

if ($ac == 'signin'){
	cookie_del('user_signin');
	if (IS_POST) {
		$useremail = $_POST['useremail'];
		$password = md5($_POST['password']);
		//单条用户信息
		$user_query = $db_tqd->getOne("SELECT * FROM member_user WHERE user_email='$useremail' AND user_password='$password'");
		if($user_query){
			//写入cookie
			cookie_set('user_signin',$user_query['member_user_id']);
			to_url(INDEX_URL);
		}else{
			$issue = '<em class="red">账号或密码错误。</em>';
			display('signin',array(
				'issue' => $issue,
				'class_val' => $class_val, //分类名
			));
		} 
		
	}else{
		display('signin', array(
			'class_val' => $class_val, //分类名
		));
	}
}elseif ($ac == 'signout'){
	cookie_del('user_signin');
	to_url(INDEX_URL);
}elseif ($ac == 'signup'){
	cookie_del('user_signin');
	if ($_GET['username']) {
		//查询是否已存在用户名
		$db_tqd->getOne("SELECT user_name FROM member_user WHERE user_name='$_GET[username]'") && exit('1');
	} 
	if ($_GET['email']) {
		//查询是否已存在邮箱
		$db_tqd->getOne("SELECT user_name FROM member_user WHERE user_email='$_GET[email]'") && exit('1');
	}
	if (IS_POST) {
		//获取post过来的用户名，email，密码
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		//用户名长度
		$name_length = strlen($username);
		//数据库查询用户名,email
		$user_value = $db_tqd->getOne("SELECT user_name FROM member_user WHERE user_name='$username'");
		$email_value = $db_tqd->getOne("SELECT user_email FROM member_user WHERE user_email='$email'");
		
		if ($username == '' || $name_length >14) {
			$check_tips_name = '<em class="red">用户名不为空，长度不能超过14个字符哦！</em>';
			display('signup', array(
				'username' => $username,
				'email' => $email,
				'password' => $password,
				'check_tips_name' => $check_tips_name, //提示
				'class_val' => $class_val, //分类名
			));
		}elseif ($email == '' || !preg_match("/[0-9a-z]+@[0-9a-z]+\.[a-z]+$/", $email)){
			$check_tips_email = '<em class="red">邮箱不能为空而且格式类似：xxx@qq.com！</em>';
			display('signup', array(
				'username' => $username,
				'email' => $email,
				'password' => $password,
				'check_tips_email' => $check_tips_email, //提示
				'class_val' => $class_val, //分类名
			));
		}elseif ($password == '' || strlen($password) < 6 || strlen($password) > 16){
			$check_tips_pass = '<em class="red">密码不为空，长度不能小于6个字符和超过16个字符哦！</em>';
			display('signup', array(
				'username' => $username,
				'email' => $email,
				'password' => $password,
				'check_tips_pass' => $check_tips_pass, //提示
				'class_val' => $class_val, //分类名
			));
		}else {
			$password = md5($password);
			$insert_ok = $db_tqd->query("INSERT INTO member_user(user_name, user_email, user_password) VALUE('$username', '$email', '$password')");
			if ($insert_ok) {
				$user_query = $db_tqd->getOne("SELECT * FROM member_user WHERE user_name='$username'");
				cookie_set('user_signin',$user_query['member_user_id']);
				display('signup_relay');
			}
		}
		
	}else{
		display('signup',array(
			'class_val' => $class_val, //分类名
		));
	}
}elseif ($ac == 'article'){//该用户文章列表
	
	if ($_COOKIE['user_signin']) {//判断是否登录
		##分页##
		$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
		//每页10条数据
		$num = 5;
		//查询数据的总数total
		$total = mysql_num_rows(mysql_query("SELECT * FROM article_content WHERE user_id=" . $_COOKIE['user_signin']));
		//获得总页数pagenum
		$pagenum = ceil($total/$num);
		//如果传入的页数参数page大于总页数pagenum，则显示错误信息
		if($page > $pagenum || $page == 0){
			to_url(INDEX_URL);
			Exit;
		}
		//获取limit的第一个参数的值 offset
		$offset = ($page - 1)* $num;
		
		//获取相应页数所需要显示的数据
		$info = "SELECT * FROM article_content WHERE user_id='$_COOKIE[user_signin]' ORDER BY article_content_date DESC LIMIT $offset, $num";
		$article_one = $db_tqd->fetchAll($info);
		
		display('member_article_list', array(
			'user_query' => $user_query, //用户名
			'class_val' => $class_val, //分类名
			'article_one' => $article_one,	//文章列表
			'pagenum' => $pagenum, //最大分页
			'page' => $page	//当前分页
		));
	}else {
		echo "亲~貌似你还木有登录吧？稍后自动跳转到首页...<a href=" . INDEX_URL . " >立即跳转</a>";
		to_url(INDEX_URL, 3);
	}

}