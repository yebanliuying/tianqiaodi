<!DOCTYPE html>
<html>
<head>
<title>科技-天桥底-博客</title>
<meta name="Keywords" content="科技,天桥底,博客,轻博客,独立博客,社区">
<meta name="Description" content="天桥底是种随性记录生活的方式，让你能简单通过文字，展示来表现你的风格。">
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8">
</head>
<body>
<?php include 'template/class_header.tpl.php';?>


<div style="overflow:hidden;">

<div class="ar_list_main">
	<div class="posts_wrap">
		<?php foreach ($article_one as $key => $value){ ?>
			<div class="posts">
				<h1><a target='_blank' href=<?php echo INDEX_URL . "/index.php?do=article&ac=details&aid=" . $article_one[$key][article_content_id]; ?>  ><?php echo mb_substr($article_one[$key][article_content_title], 0, 50, 'UTF-8');?></a></h1>
				<!--去除标签  html转码-->
				<p><?php echo mb_substr(strip_tags(html_entity_decode($article_one[$key][article_content_txt])), 0, 100, 'UTF-8'). '...'; ?></p>
				<div class="info">
					<span><?php echo $article_one[$key][article_content_author]; ?></span>发表于：
					<span><?php echo $article_one[$key][article_content_date]; ?></span>
				</div>
			</div>
		<?php } ?>
		<div class="paged">
			<?php 
			//显示分页
			if ($pagenum > 1) {
				$prev = ($page != 1)? "<a class='prev' href='index.php?do=article&ac=tech&page=". ($page-1) . "'>上一页</a>" : "";
				echo $prev;
				for ($i = 1; $i <= $pagenum; $i++){
					$show = ($i != $page)? "<a href='index.php?do=article&ac=tech&page=". $i . "'>$i</a>" : "<b>$i</b>";
					echo $show;
				}
				$next = ($page != $pagenum)? "<a class='next' href='index.php?do=article&ac=tech&page=". ($page+1) . "'>下一页</a>" : "";
				echo $next;
			}
			?>
		</div>
	</div>
</div>

</div>
<?php include 'template/foot.tpl.php'; ?>
</body>
</html>