/**
* 常用js函数库
*/

//判断值是否不等于空
function val_is(selector){
	var val_length = $(selector).val().length;
	if (val_length >= 1){
		return true;
	}else{
		return false;
	}
}

//判断值是否过长
function val_max_is(selector, max_num){
	var val_length = $(selector).val().length;
	if (val_length <= max_num){
		return true;
	}else{
		return false;
	}
}

//容器插入值
function insert_val(selector, val){
	$(selector).html(val);
}