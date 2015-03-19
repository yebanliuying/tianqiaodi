<?php
/**
 * 文章控制器
 */
!defined('IN_Q') && exit('Access denied!');

$ac_article = array(
	'tech',
	'design',
	'food',
	'add',
	'details'
);
!in_array($ac, $ac_article) && exit('Module does not exist!');

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

if ($ac == 'tech'){ //科技分类
	##分页##
	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
	//设置每页条数据
	$num = 5;
	//查询数据的总数total
	$total = mysql_num_rows(mysql_query("SELECT * FROM article_content WHERE article_class_id=2"));
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
	$sql_article = "SELECT * FROM article_content WHERE article_class_id=2 ORDER BY article_content_date DESC LIMIT $offset,$num";
	$article_one = $db_tqd->fetchAll($sql_article);
	
	display('tech', array(
		'user_query' => $user_query, //用户名
		'class_val' => $class_val, //分类名
		'article_one' => $article_one,  //文章列表
		'pagenum' => $pagenum, //最大分页
		'page' => $page	//当前分页
	));

}elseif ($ac == 'design'){ //设计分类
	##分页##
	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
	//设置每页条数据
	$num = 5;
	//查询数据的总数total
	$total = mysql_num_rows(mysql_query("SELECT * FROM article_content WHERE article_class_id=3"));
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
	$sql_article = "SELECT * FROM article_content WHERE article_class_id=3 ORDER BY article_content_date DESC LIMIT $offset,$num";
	$article_one = $db_tqd->fetchAll($sql_article);
	
	display('design', array(
		'user_query' => $user_query, //用户名
		'class_val' => $class_val, //分类名
		'article_one' => $article_one,  //文章列表
		'pagenum' => $pagenum, //最大分页
		'page' => $page	//当前分页
	));
}elseif ($ac == 'food'){ //美食分类
	##分页##
	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
	//设置每页条数据
	$num = 5;
	//查询数据的总数total
	$total = mysql_num_rows(mysql_query("SELECT * FROM article_content WHERE article_class_id=4"));
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
	$sql_article = "SELECT * FROM article_content WHERE article_class_id=4 ORDER BY article_content_date DESC LIMIT $offset,$num";
	$article_one = $db_tqd->fetchAll($sql_article);
	
	display('food', array(
		'user_query' => $user_query, //用户名
		'class_val' => $class_val, //分类名
		'article_one' => $article_one,  //文章列表
		'pagenum' => $pagenum, //最大分页
		'page' => $page	//当前分页
	));
}elseif ($ac == 'add'){ //发布文章
	if ($_COOKIE['user_signin']) {//判断是否登录
		if (IS_POST) {
			
			$article_title = $_POST['article_title'];
			$article_con = htmlentities($_POST['article_con'], ENT_NOQUOTES, 'utf-8');
			
			
			if ((trim($article_title) != '') && (trim($article_con)) != '') {  //表单值是否为空
				$sql_article_add = "INSERT INTO article_content(user_id, article_content_title, article_content_txt, article_content_author, article_content_date) VALUE('$_COOKIE[user_signin]', '$article_title', '$article_con', '$user_query', CURDATE())";
				$article_add = $db_tqd->query($sql_article_add);
	
				if ($article_add) {
					echo "发布成功！稍后自动跳转...<a href='" . INDEX_URL . "/index.php?do=member&ac=article' >立即跳转</a>";
					to_url(INDEX_URL . "/index.php?do=member&ac=article", 3);
				}else{
					echo "发布失败了...请稍后再试或联系网站管理员。--";
				}
			}else {
				$article_tips = '<em class="red">亲，请正确输入内容啊~</em>';
				display('addarticle', array(
					'user_query' => $user_query, //用户名
					'class_val' => $class_val, //分类名
					'article_tips' => $article_tips
				));
			}
		}else{
			display('addarticle', array(
				'user_query' => $user_query, //用户名
				'class_val' => $class_val //分类名
			));
		}
	}else{
		echo "亲~ 你还没登录哦...稍后自动跳转到首页...<a href=" . INDEX_URL . " >立即跳转</a>";
		to_url(INDEX_URL, 3);
	}
	
}elseif ($ac == 'details'){

	//获取文章id
	$aid = $_GET['aid'];
	$sql_article_details = "SELECT * FROM article_content WHERE article_content_id='$aid'";
	$article_datails = $db_tqd->getOne($sql_article_details);

	if ($article_datails) {
		display('details', array(
			'user_query' => $user_query, //用户名
			'class_val' => $class_val, //分类名
			'article_datails' => $article_datails
		));
	}else {
		echo "亲~貌似木有这篇文章吧？稍后自动跳转...<a href=" . INDEX_URL . " >立即跳转</a>";
		to_url(INDEX_URL, 3);
	}
}