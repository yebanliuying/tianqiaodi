<script src="static/js/jquery-1.11.2.min.js"></script>
<!--进度条 start-->
<link rel="stylesheet" type="text/css" href="static/nprogress/nprogress.css">
<script src="static/nprogress/nprogress.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		NProgress.start();
	})
	$(window).ready(function(){
		NProgress.done();
	})
</script>
<!--进度条 end-->
<script>
$(".user_open_btn").click(function(){
		$(".user_open_box").slideToggle(100);
	})
</script>
