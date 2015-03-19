<?php
/**
 * 数据库操作类
 */
class Database{
    
	//初始化
	public function __construct($db_config) {
		
		mysql_connect($db_config['server'], $db_config['username'], $db_config['password']);
		
		mysql_select_db($db_config['dbname']);
		//数据库编码
		mysql_query('set names '.$db_config['charset']);
	}
	
	//执行sql
	public function query($sql){
		return mysql_query($sql);
	}
	
	//获取一行数据
	public function getOne($sql){
		return mysql_fetch_assoc($this->query($sql . ' LIMIT 1'));
	}
	
	//获取多行数据
	public function fetchAll($sql){
		$rows = array();
		$result = $this->query($sql);
		while($value = mysql_fetch_array($result, MYSQL_ASSOC)){
			$rows[] = $value;
		}
		return $rows;
	}
}