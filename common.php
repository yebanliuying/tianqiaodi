<?php
/**
 * 常用函数库
 */
!defined('IN_Q') && exit('Access denied!');

//模板调用
function display($tpl, $T=array()){
	!empty($T) && extract($T);
	
	$tpl_file = 'template/' . $tpl . '.tpl.php';
	if(!include_once($tpl_file)){
		exit('找不到' . $tpl . '模板文件。');
	}
	exit;
}

//页面跳转
function to_url($url, $time=0) {
	header("refresh:$time; url=$url");
}

//判断cookie是否存在
function cookie_is($cookie_name) {
	$value = $_COOKIE[$cookie_name];
	return !empty($value) ? true : false;
}

//设置cookie
function cookie_set($cookie_name, $value) {
	//判断该cookie是否存在
	if (!cookie_is($cookie_name)) {
		setcookie($cookie_name, $value);
	}else {
		echo 'cookie 已存在';
		return false;
	}
}

//删除cookie
function cookie_del($cookie_name) {
	if (cookie_is($cookie_name)) {
		setcookie($cookie_name,'',time()-3600);
	}
}

//字符串截取
function str_substr($str, $start=0, $end) {
	mb_substr($str, $start, $end, 'UTF-8');
}