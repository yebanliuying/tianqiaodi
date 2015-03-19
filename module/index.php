<?php
/**
 * 首页
 */
!defined('IN_Q') && exit('Access denied!');

$ac_index = array(	
	'index'	
);
!in_array($ac, $ac_index) && exit('Module does not exist!');

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

if ($ac == 'index'){
	##分页##
	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
	//设置每页条数据
	$num = 5;
	//查询数据的总数total
	$total = mysql_num_rows(mysql_query("SELECT * FROM article_content WHERE article_class_id=1"));
	//获得总页数pagenum
	$pagenum = ceil($total/$num);
	//如果传入的页数参数page大于总页数pagenum，则显示错误信息
	if($page > $pagenum || $page == 0){
		to_url(INDEX_URL);
		Exit;
	}
	//获取limit的第一个参数的值 offset
	$offset = ($page - 1)* $num;
	
	//查询分类下文章
	$sql_article = "SELECT * FROM article_content WHERE article_class_id=1 ORDER BY article_content_date DESC LIMIT $offset,$num";
	$article_one = $db_tqd->fetchAll($sql_article);
	
	if ($_COOKIE['user_signin']) {
		//单条用户信息
		$user_query_all = $db_tqd->getOne("SELECT * FROM member_user WHERE member_user_id='$_COOKIE[user_signin]'");
		$user_query = $user_query_all['user_name'];
	}/* else {
		to_url(INDEX_URL);
	} */
	
	display('index',array(
		
		'user_query' => $user_query, //用户名
		'class_val' => $class_val, //分类名
		'article_one' => $article_one, //文章列表
		'pagenum' => $pagenum, //最大分页
		'page' => $page	//当前分页
	));
}