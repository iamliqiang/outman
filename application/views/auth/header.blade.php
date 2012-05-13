<!-- Header Content -->
<header>
	<div class="container" id="login-header">
	
		<div class="row" >
			<div class="three columns">
				<a href="index.php"><img src="http://placehold.it/200x60" /></a>
			</div>
			<div class="nine columns">
				<dl class="login">
		        	<div style="display:inline;" id="noLogin">
		            	<dd><a href="login">登录</a></dd>
		            	<dd><a href="register">注册</a></dd>
		            </div>
		            <dd><a target="_blank" href="http://weibo.com/318381333">+微博</a></dd>
		            <dd><a href="http://www.outman.com">达人汇Blog</a></dd>
		        </dl>
 			</div>
		</div>

		<!-- <div class="row" id="header-hr"> 
			<hr>
		</div> -->

		<div class="row" > 
			<div class="twelve columns" id="sub-nav">
				<dl class="nice tabs">
					<dd><a href="#nice1" class="active">分享家</a></dd>
					<dd><a href="#nice2">活动广场</a></dd>
					<dd><a href="#nice3">开发者星球</a></dd>
					<dd id="search-form" style="float:right;">
					{{Form::open('http://soso.outman.com/soso.php','GET',array('class'=>'nice'));}}
									       
						{{ Form::text('q',Input::old('q'), array('id'=>'q','class'=>'small nice radius input-text',"placeholder"=>"搜索工作，活动...", "style"=>"display:inline; ")) }}
						    					        
						{{ Form::submit('搜索',array("class"=>" small white button","style"=>"display:inline")) }}
				
					{{Form::close();}}
					</dd>
				</dl>

				
			</div>
		</div>


	
	</div>
</header>