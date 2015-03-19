<?php 
define('IN_Q', true); //网站标识
define('IS_POST', $_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST) ? true : false);
ob_start(); //控制缓冲区 针对setcookie
date_default_timezone_set('Asia/Shanghai'); //时区
header('Content-type: text/html; charset=utf8'); //页面编码

include 'config.php';
include 'library/database_class.php';

//初始化数据库
$db_tqd = new Database($db_config_tqd);

//控制器
$do = isset($_GET['do']) ? $_GET['do'] : 'index';
//模块
$ac = isset($_GET['ac']) ? $_GET['ac'] : 'index';

//加载常用函数
include 'common.php';

//加载控制器
$do_list = array(
		'index',
		'article',
		'member'
);

!in_array($do, $do_list) && exit('Module does not exist!');

require 'module/' . $do . '.php';
