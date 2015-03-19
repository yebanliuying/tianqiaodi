<link rel="stylesheet" type="text/css" href="static/css/base.css">
<link rel="stylesheet" type="text/css" href="static/css/article.css">

<div class="class_head_wrap">
	<div class="class_head">
		<div class="logo">
			<a href="/">天桥底</a>
		</div>
		<div class="nav_tabs">
			<a href="index.php" class=<?php if($_GET['ac'] == 'index' || $_GET['ac'] == '') echo "curr"; ?> ><?php echo $class_val[0][article_class_name];?></a>
			<a href="index.php?do=article&ac=tech" class=<?php if($_GET['ac'] == 'tech') echo "curr"; ?> ><?php echo $class_val[1][article_class_name];?></a>
			<a href="index.php?do=article&ac=design" class=<?php if($_GET['ac'] == 'design') echo "curr"; ?> ><?php echo $class_val[2][article_class_name];?></a>
			<a href="index.php?do=article&ac=food" class=<?php if($_GET['ac'] == 'food') echo "curr"; ?> ><?php echo $class_val[3][article_class_name];?></a>
		</div>
		<div class="meta_bar">
			<?php if(cookie_is('user_signin')){ ?>
				<p>
					<span class="user_open_btn"><?php echo  $user_query; ?><i>▾</i></span> 
					<a href="index.php?do=article&ac=add" class="btn_gray">发布文章</a>
					<div class="user_open_box" style="display:none;">
						<a href="index.php?do=member&ac=article">我的文章</a>
						<a href="index.php?do=member&ac=signout">退出</a>
					</div>
				</p>
			<?php }else{?>
				<a href="index.php?do=member&ac=signin">登录</a> |
				<a href="index.php?do=member&ac=signup">注册</a>
			<?php }?>
		</div>
	</div>
</div>