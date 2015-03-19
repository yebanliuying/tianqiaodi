<!DOCTYPE html>
<html>
<head>
<title>发布文章-天桥底-博客</title>
<meta name="Keywords" content="发布文章,天桥底,博客,轻博客,独立博客,社区">
<meta name="Description" content="天桥底是种随性记录生活的方式，让你能简单通过文字，展示来表现你的风格。">
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8">
</head>
<body>
<?php include 'template/class_header.tpl.php';?>

<div class="center_wrap add_article">
	<h2 class="title">发布文章</h2>
	<form action="#" method="post">
	<h3 class="aside_title">标题</h3>
	<input class="title_txt" type="text" name="article_title" value="<?php echo $article_title;?>">
	<h3 class="aside_title">内容</h3>
	<div class="con">
		<script id="editor" name="article_con" type="text/plain" style="width:1024px;height:500px;" value="<?php echo $article_con;?>">
		</script>
	</div>
	<div><?php echo $article_tips;?></div>
	<input type="submit" value="提交" class="btn_gray">
	</form>
</div>

</body>
<script src="ueditor/ueditor.config.js"></script>
<script src="ueditor/ueditor.all.min.js"></script>
<script>
//实例化编辑器
//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
var ue = UE.getEditor('editor');

/*function getContent() {
    var arr = [];
    arr.push("使用editor.getContent()方法可以获得编辑器的内容");
    arr.push("内容为：");
    arr.push(UE.getEditor('editor').getContent());
    alert(arr.join("\n"));
}*/
function getContentTxt() {
    var arr = [];
    arr.push(UE.getEditor('editor').getContentTxt());
    alert(arr.join("\n"));
}
</script>
<?php include 'template/foot.tpl.php'; ?>
</html>