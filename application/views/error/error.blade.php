<!doctype html>
<html>
	<head>
		<meta charset="utf-8">

		<title>Outman tips</title>

		<style>
			@import url(http://fonts.googleapis.com/css?family=Ubuntu);

			body {
				background: #eee;
				color: #6d6d6d;
				font: normal normal normal 14px/1.253 Ubuntu, sans-serif;
				margin: 0 0 25px 0;
				min-width: 800px;
				padding: 0;
			}

			#main {
				background-clip: padding-box;
				background-color: #fff;
				border:1px solid #ccc;
				border-radius: 5px;
				box-shadow: 0 0 10px #cdcdcd;
				margin: 25px auto 0;
				padding: 30px;
				width: 700px;
				position: relative;
			}

			#main h1 {
				font-family: 'Ubuntu';
				font-size: 38px;
				letter-spacing: 2px;
				margin: 0 0 10px 0;
				padding: 0;
			}

			#main h2 {
				color: #999;
				font-size: 18px;
				letter-spacing: 3px;
				margin: 0 0 25px 0;
				padding: 0 0 0 0;
			}

			#main h3 {
				color: #999;
				margin-top: 24px;
				padding: 0 0 0 0;
			}

			#main h3 {
				font-size: 18px;
			}

			#main p {
				line-height: 25px;
				margin: 10px 0;
			}

			#main pre {
				background-color: #333;
				border-left: 1px solid #d8d8d8;
				border-top: 1px solid #d8d8d8;
				border-radius: 5px;
				color: #eee;
				padding: 10px;
			}

			#main div.warning {
				background-color: #feefb3;
				border: 1px solid;
				border-radius: 5px;
				color: #9f6000;
				padding: 10px;
			}

			#main ul {
				margin: 10px 0;
				padding: 0 30px;
			}

			#main li {
				margin: 5px 0;
			}
		</style>
	</head>
	<body>
		<div id="main">
			<h1> 错误，Error！: </h1>
			{{ Session::get('general-info');}}

			<p>
				返回主页 <?php echo HTML::link_to_action('home@index', '首页'); ?>  
			</p>

			<pre><code>We are cool guys</code></pre>

			<p>If you see this page:</p>

			<pre><code>You are lucky guy</code></pre>

			<h3>Ha Ha Ha......</h3>

			<p>
				世界是扁平的，你的脑袋是高耸的，看到这一页是倒霉的，所以现在就下楼去买彩票吧！！！
			</p>

			<ul>
				<li><a href="http://weibo.com/318381333">@达人汇</a></li>
			</ul>
		</div>
	</body>
</html>