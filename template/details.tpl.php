<!DOCTYPE html>
<html>
<head>
<title><?php echo $article_datails['article_content_title']; ?>-天桥底-博客</title>
<meta name="Keywords" content="天桥底,博客,轻博客,独立博客,社区">
<meta name="Description" content="天桥底是种随性记录生活的方式，让你能简单通过文字，展示来表现你的风格。">
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8">
</head>
<body>
<?php include 'template/class_header.tpl.php';?>
<link rel="stylesheet" type="text/css" href="static/css/article.css">
<div class="ar_details_wrap">
	<div class="ar_details_main">
		<h1><?php echo $article_datails['article_content_title']; ?></h1>
		<div class="info">
			<span><?php echo $article_datails['article_content_author']; ?></span> |
			<span><?php echo $article_datails['article_content_date']; ?></span>
		</div>
		<div class="con"><?php echo html_entity_decode($article_datails['article_content_txt']); ?></div>
	</div>
	<div class="ar_details_aside">
		
	</div>
</div>

<?php include 'template/foot.tpl.php'; ?>
</body>
</html>